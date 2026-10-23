# Deploy e migrazione MariaDB sulla stessa VPS

Lo stack usa Caddy, PHP 8.3 FPM, uno scheduler separato e MariaDB 11.8 LTS.
Il frontend usa Bun con `bun.lock` e installazione `--frozen-lockfile`; il servizio
`frontend` compila client e SSR con `bun run --bun build`.
Occorrono Docker Engine e Compose **2.24.4 o successivo**. Solo Caddy pubblica
porte in produzione; MariaDB e FPM sono accessibili dalla rete Docker.

Questa procedura ammette manutenzione. Installa Laravel 12, Filament 3 e Livewire
aggiornati dal lockfile; non esegue aggiornamenti di dipendenze durante il deploy.
La build PHP fallisce se la base non contiene almeno 8.3.36. Ripetere gli audit PHP
e JavaScript prima della riapertura: un audit pulito non è una garanzia generale
di sicurezza e gli advisory possono cambiare dopo la verifica.

PrimeVue resta sul ramo 4 MIT, con temi PrimeUIX 2 e PrimeIcons 7: i rami successivi
introducono nuove condizioni di licenza e una chiave. TypeScript resta sul ramo 6,
compatibile con typescript-eslint. Non usare `bun update --latest` in produzione:
eventuali passaggi di major vanno provati prima, aggiornando e versionando i lockfile.

## Configurazione

- Compose legge `.env`: selezionare l'ambiente con `cp .env.PROD .env` sul server
  oppure `cp .env.LOCAL .env` in locale. Gli script non forzano un file diverso.
  Conservare il `CONTAINER_NAME` esistente e il nome progetto Compose,
  altrimenti cambiano i nomi dei volumi. Usare password non vuote e distinte per root
  e utente applicativo. I file reali contengono segreti: non pubblicarli in Git.
- Impostare `CADDY_SITE` sui domini reali, per esempio
  `pizzeria.example,www.pizzeria.example`. Compose richiede un valore esplicito;
  il template locale usa `:80`, quello di produzione va compilato prima del deploy.
  I record DNS devono puntare alla VPS e TCP 80/443 devono essere libere;
  UDP 443 permette HTTP/3. Il vecchio proxy serve solo questo sito e verrà fermato.
- `src/.env` contiene la configurazione Laravel. Conservare **la stessa `APP_KEY`**,
  impostare `APP_ENV=production`, `APP_DEBUG=false` e `APP_URL=https://dominio-reale`.
  Compose imposta la connessione al database interno usando `DATABASE_*`.
  Nel collegamento diretto Caddy→PHP-FPM, Caddy passa HTTPS tramite FastCGI e
  `APP_TRUST_PROXY` può rimanere vuoto. Se esiste un ulteriore proxy HTTP, impostare
  solo l'indirizzo effettivamente fidato; la configurazione nativa viene mantenuta
  anche quando si esegue `config:cache`.
- Impostare `HOST_USER_UID` e `HOST_USER_GID` sull'utente proprietario di `src`.
  `storage`, `bootstrap/cache` e `public` devono essere scrivibili da tale utente;
  non usare `chmod 777`. Solo gli upload pubblici vengono montati in Caddy.
- JS e CSS compilati di Filament sono ignorati da Git. Il comando
  `php artisan filament:upgrade` della procedura li rigenera dopo Composer.
- Impostare `NGINX_PHP_PM_MAX_CHILDREN=2`: il nome storico viene mantenuto, ma è
  applicato direttamente al pool FPM. I container non hanno limiti Docker di RAM;
  la memoria viene gestita dal sistema operativo. Il buffer pool DB è 128 MiB.
  Non compilare il frontend mentre tutti i servizi occupano memoria sulla VPS.

Nei comandi seguenti, dalla radice del progetto:

```sh
set -eu
dc() { docker compose "$@"; }
```

Non stampare `docker compose config` completo: contiene le password risolte.
Usare `dc config --quiet` per validarlo.

## 1. Preparazione prima di sostituire il vecchio stack

Eseguire questa sezione **sulla vecchia release, prima di aggiornare il checkout**.
Conservare la stessa shell e le variabili per i passaggi successivi.

```sh
umask 077
BACKUP_DIR="$HOME/capricciosa-backups/$(date +%Y%m%d-%H%M%S)"
mkdir -p "$BACKUP_DIR"
chmod 700 "$BACKUP_DIR"
PROJECT_DIR="$PWD"
PROJECT_NAME=$(dc config --format json | python3 -c 'import json,sys; print(json.load(sys.stdin)["name"])')
printf '%s\n' "$PROJECT_NAME" > "$BACKUP_DIR/compose-project-name"
git rev-parse HEAD > "$BACKUP_DIR/revision"
cp docker-compose.yml "$BACKUP_DIR/docker-compose.previous.yml"
sudo mariadb --batch --skip-column-names -e 'SELECT VERSION();'
sudo mariadb -e 'SHOW DATABASES;'
df -h . "$BACKUP_DIR"
```

Verificare che MariaDB sia realmente quello dell'host, usato solo da questo sito.
Se la versione sorgente è superiore a 11.8, **fermarsi**: questa guida non effettua
downgrade. Servono spazio per archivio, dump e nuovo volume contemporaneamente.

Impostare il nome esatto del database Laravel, senza includere database di sistema:

```sh
SOURCE_DATABASE=capricciosa_pizzerie
sudo mariadb "$SOURCE_DATABASE" -e 'SHOW TABLE STATUS; SHOW FULL TABLES; SHOW TRIGGERS; SHOW EVENTS;'
sudo mariadb -e 'SHOW VARIABLES LIKE "event_scheduler";'
```

Inventariare eventuali routine, viste, eventi e relativi `DEFINER`. Se esistono
account definer diversi dagli account già previsti nel nuovo DB, prepararne i
privilegi minimi prima dell'importazione e verificarne il funzionamento. Non
importare lo schema `mysql` né eliminare i definer con sostituzioni sul dump.
Se altri siti usano il MariaDB dell'host, non fermarlo o disinstallarlo.

## 2. Manutenzione, backup e dump finale

```sh
dc exec -T app php artisan down
dc stop app
```

Questo ferma anche il vecchio scheduler, che vive dentro `app`. Fermare inoltre
eventuali cron, worker esterni o altri writer. Se `event_scheduler` era `ON`,
registrarlo e disattivarlo con `sudo mariadb -e 'SET GLOBAL event_scheduler=OFF;'`.
Non eseguire modifiche allo schema durante il dump.

```sh
sudo mariadb-dump --single-transaction --quick --routines --events --triggers \
  --hex-blob --default-character-set=utf8mb4 -- "$SOURCE_DATABASE" \
  > "$BACKUP_DIR/database.sql"
test -s "$BACKUP_DIR/database.sql"

sudo mariadb --batch --skip-column-names "$SOURCE_DATABASE" <<'SQL' > "$BACKUP_DIR/counts.sql"
SELECT CONCAT('SELECT ', QUOTE(TABLE_NAME), ', COUNT(*) FROM `', REPLACE(TABLE_NAME, '`', '``'), '`;')
FROM information_schema.TABLES
WHERE TABLE_SCHEMA = DATABASE() AND TABLE_TYPE = 'BASE TABLE'
ORDER BY TABLE_NAME;
SQL
sudo mariadb --batch --skip-column-names "$SOURCE_DATABASE" \
  < "$BACKUP_DIR/counts.sql" > "$BACKUP_DIR/counts.before.tsv"

tar --exclude=./.git --exclude=./src/node_modules --exclude=./backups \
  --exclude=./src/public/hot -czf "$BACKUP_DIR/release.tgz" .
tar -tzf "$BACKUP_DIR/release.tgz" > /dev/null
sha256sum "$BACKUP_DIR/database.sql" "$BACKUP_DIR/release.tgz" > "$BACKUP_DIR/SHA256SUMS"
```

L'archivio comprende `.env`, `APP_KEY`, `vendor`, upload, sessioni, vecchi script e
dati/certificati del proxy. Se un file non è leggibile, fermarsi e ripetere il
backup con i permessi necessari. Copiare il backup anche fuori dalla VPS tramite
un canale protetto. Il database e gli upload rimangono fermi fino al collaudo.

```sh
dc down
sudo systemctl stop mariadb
```

Non aggiungere `-v` e non disinstallare MariaDB. Il datadir dell'host è il rollback.
Ora aggiornare il checkout alla nuova release. Conservare `.env`, `.env.PROD`, `src/.env`
e `src/storage`; impostare la configurazione descritta sopra e rimuovere soltanto
l'eventuale file Vite di sviluppo `src/public/hot`.

## 3. Build e importazione

```sh
export COMPOSE_PROJECT_NAME="$PROJECT_NAME"
dc config --quiet
dc build --pull app
dc run --rm --no-deps app php -v
dc run --rm --no-deps app php-fpm -v
dc run --rm --no-deps app composer install --no-dev --prefer-dist --no-interaction --optimize-autoloader --no-scripts
dc run --rm --no-deps frontend
dc run --rm --no-deps app php artisan config:clear
dc up -d --wait database
```

Controllare che CLI e FPM siano almeno **8.3.36**. Le compilazioni sono sequenziali
per lasciare memoria sulla VPS. Prima dell'importazione il volume di destinazione
deve essere nuovo e senza tabelle applicative. Se contiene dati, **fermarsi**:
non cancellarlo né importare sopra un database popolato.

```sh
dc exec -T database sh -c 'MYSQL_PWD="$MARIADB_PASSWORD" exec mariadb --user="$MARIADB_USER" "$MARIADB_DATABASE" -e "SHOW TABLES;"'
dc exec -T database sh -c 'MYSQL_PWD="$MARIADB_ROOT_PASSWORD" exec mariadb --user=root "$MARIADB_DATABASE"' \
  < "$BACKUP_DIR/database.sql"
dc exec -T database sh -c 'MYSQL_PWD="$MARIADB_PASSWORD" exec mariadb --user="$MARIADB_USER" "$MARIADB_DATABASE" --batch --skip-column-names' \
  < "$BACKUP_DIR/counts.sql" > "$BACKUP_DIR/counts.after.tsv"
diff -u "$BACKUP_DIR/counts.before.tsv" "$BACKUP_DIR/counts.after.tsv"
```

Un errore nell'importazione o conteggi diversi blocca il passaggio. Non usare
`--force` per ignorare errori. La tabella `migrations` arriva dal dump; niente seed,
`migrate:fresh`, `key:generate` o inizializzazione automatica sul DB importato.

```sh
dc run --rm --no-deps app php artisan package:discover --ansi
dc run --rm --no-deps app php artisan filament:upgrade
dc run --rm --no-deps app php artisan migrate --force
dc run --rm --no-deps app php artisan storage:link
dc run --rm --no-deps app php artisan app:generate-sitemap
dc run --rm --no-deps app php artisan optimize
dc run --rm --no-deps app php artisan filament:cache-components
dc run --rm --no-deps app php artisan icons:cache
dc up -d --wait app caddy
```

Il file di manutenzione è ancora presente. Prima della riapertura controllare
conteggi, log, lettura dei file e accesso HTTPS. Per visitare l'app durante il
collaudo usare un bypass di manutenzione generato con `php artisan down --with-secret`
dal container app e limitato agli amministratori; non pubblicarlo.

## 4. Collaudo, riapertura e rollback

Provare homepage, menu, allergeni, immagini, PDF e login amministrativo. Verificare
upload e conversione WebP con un file di prova, asset e URL HTTPS corretti. Verificare
che richieste a `.env`, `.git` e script sotto `/storage/` restituiscano 404.
Eseguire `dc run --rm --no-deps app composer audit --locked --no-dev` e
`dc run --rm --no-deps frontend bun audit`. Gli advisory non risolti sono un blocco
alla riapertura pubblica. Verificare che GET e POST `/register` restituiscano 404:
gli account esistenti sono amministrativi e la registrazione pubblica è disabilitata.
Controllare che tutti gli utenti importati siano amministratori autorizzati.
Controllare gli eventuali oggetti SQL con definer e riattivare gli eventi del DB
solo se erano necessari e dopo aver escluso writer duplicati.

```sh
dc exec -T app php artisan up
dc up -d scheduler
SMOKE_URL=https://dominio-reale sh docker/smoke-test.sh
dc ps
dc logs --tail=50 app scheduler database caddy
docker stats --no-stream
```

Durante il collaudo iniziale, ricreare app e database e verificare nuovamente dati
e upload: `dc up -d --force-recreate --wait database app`. Verificare che lo scheduler
riparta dopo un arresto inatteso e che l'app rimanga attiva. Controllare consumo
di memoria, eventuali OOM/restart e latenza con il traffico reale.

**Rollback prima della riapertura:** fermare il nuovo stack con `dc down` senza
`-v`; ripristinare la release dall'archivio, compresi vecchi Compose, `.env`,
`vendor`, `storage` e script. Per evitare file nuovi residui, estrarre in una
directory vuota, quindi eseguire il Compose da quella directory con lo stesso
`COMPOSE_PROJECT_NAME`. Riavviare il MariaDB dell'host, riattivare gli eventuali
eventi precedenti e avviare il vecchio stack. Eseguire `php artisan up` nel vecchio
container dopo il controllo. Il rollback ripristina temporaneamente il vecchio
PHP vulnerabile: limitarne l'esposizione e correggere prima di riaprire.

**Dopo nuove scritture sul database Docker non basta riaccendere il vecchio DB.**
Fermare i writer, esportare i dati aggiornati e progettare un ripristino compatibile
con la versione sorgente; conservare anche eventuali nuovi upload. Nessun rollback
automatico o downgrade del nuovo dump viene effettuato da questa guida.

Solo dopo collaudo riuscito, prova del ripristino e backup esterno verificato:

```sh
sudo systemctl disable mariadb
```

Si può quindi disinstallare **solo il server MariaDB dell'host** con il gestore
pacchetti della VPS, senza cancellarne il datadir. Conservare dati originali e
backup per almeno 7 giorni e non rimuovere i client se servono per i backup.
Il volume Docker e i volumi Caddy devono avere backup periodici indipendenti.

## Controlli locali prima del deploy

Installare anche le dipendenze Composer di sviluppo per eseguire PHPUnit. I test
usano esclusivamente `capricciosa_tests` su MariaDB, perché le migrazioni includono
SQL specifico di questo motore. Creare questo database separato e concedere
all'utente applicativo i privilegi solo su di esso. `phpunit.xml` ignora la cache
di configurazione dell'app e il test base rifiuta di avviarsi su un altro database.
Eseguire la suite con `docker compose -f docker-compose.local.yml run --rm --no-deps app php vendor/bin/phpunit`.

Per gli aggiornamenti ordinari usare `docker compose run --rm --no-deps frontend bun update`
e verificare audit e build prima di versionare `bun.lock`. Se si ripresentano errori
di integrità, riprovare dal container con cache temporanea e registro ufficiale:

```sh
dc run --rm --no-deps frontend bun install --frozen-lockfile --force --registry https://registry.npmjs.org
```

Non disabilitare la verifica di integrità né modificare a mano i checksum del lockfile.

## Deploy successivi

Con backup recente, mettere l'app in manutenzione e fermare i servizi
(`dc stop app scheduler caddy database`) per lasciare memoria alle compilazioni
sulla VPS da 2 GB. Ricostruire con
`dc build --pull app`, verificare le versioni, installare Composer dal lockfile,
compilare gli asset, riavviare il database con `dc up -d --wait database` e applicare
esplicitamente migrazioni/cache come sopra.
Ricreare app e scheduler con `dc up -d --force-recreate --wait app scheduler caddy`
e riaprire. `run.sh` avvia/aggiorna i servizi, ma non prepara dipendenze o database
e non sostituisce la procedura di deploy. Un semplice riavvio non aggiorna PHP.
