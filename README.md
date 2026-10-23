# CapricciosaPizzerie
_A restaurant website built with Laravel12, Inertia+Vue3 and Filament3_


## ✨ Why this project matters
CapricciosaPizzerie is a full‑stack app with a customer‑facing site and back‑office—built for a pizzeria but adaptable to any SaaS or content‑heavy platform.

* **Domain‑driven modeling** – Suppliers, Ingredients, Dishes, Menus, Events, Allergens and more are first‑class models with UUIDs, validation rules and observers.
* **PHP 8.3** – strict types, enums (e.g. `Lang`) and readonly properties drive safety.
* **Vue3 + PrimeVue + Tailwind4** – typed Single File Components with i18n and accessibility baked in.
* **Filament3 Admin** – a no‑code CMS for content editors, generated resources cover every entity.
* **Clean DevEx** – Pint, ESLint, Prettier, TypeScript, and PHPUnit keep the codebase consistent and green.
* **Hard‑won extras** – JSON‑LD SEO, multilingual content, image optimisation, sitemap generation and real‑time Google Analytics hooks.


## 🏗️  Tech stack

| Layer         | Technology                                        | Highlight                                                      |
|---------------|---------------------------------------------------|----------------------------------------------------------------|
| **Backend**   | Laravel12, PHP8.3, Jetstream(+Fortify+Sanctum)    | Auth, API tokens, two‑factor, rate‑limiting                    |
| **Admin**     | Filament3                                         | Declarative resources, role‑based dashboards                   |
| **Front‑end** | Inertia+Vue3, PrimeVue, TailwindCSS4, Vite        | SSR‑ready SPA with high Lighthouse scores                      |
| **Data**      | MySQL/MariaDB, Eloquent, UUID PKs                 | 30+ migrations & seeders                                       |
| **Tooling**   | Composer, Bun, TypeScript, ESLint, Pint, Prettier | Consistent style across PHP & TS                               |
| **Ops**       | Artisan CLI, Docker‑ready, CI friendly            | Custom commands: `app:convert-to-webp`, `app:generate-sitemap` |


## 🌍  Internationalisation & Accessibility

* **Full i18n** – Italian (_default_) and English JSON catalogs with lazy language detection.
* **Semantic HTML & ARIA** – navigation, dialogs and forms meet WCAG2.1 AAstandards(FE components reference the translations to build correct labels).
* **Structured data** – JSON‑LD Restaurant schema injected at runtime to improve rich‑search results.


## ⚙️ Local setup

Docker Engine and Compose 2.24.4+ are required. The stack uses PHP 8.3 FPM,
Caddy, MariaDB 11.8, and Bun for frontend tooling. No host PHP or MariaDB
installation is required.

```bash
cp .env.LOCAL .env  # select the local Compose settings; adjust values as needed
cp src/.env.example src/.env

docker compose -f docker-compose.local.yml build --pull app
docker compose -f docker-compose.local.yml run --rm --no-deps app composer install
docker compose -f docker-compose.local.yml run --rm --no-deps app php artisan key:generate
docker compose -f docker-compose.local.yml up -d --wait database
docker compose -f docker-compose.local.yml run --rm --no-deps app php artisan migrate
docker compose -f docker-compose.local.yml run --rm --no-deps app php artisan storage:link
docker compose -f docker-compose.local.yml run --rm --no-deps app php artisan app:generate-sitemap
sh run.local.sh
```

Open http://localhost:8100; Vite runs on port 3100. The local database is
published only on 127.0.0.1. Set HOST_USER_UID/HOST_USER_GID to the owner of
`src`; `storage`, `bootstrap/cache` and `public` must be writable by that user.
For a fresh local installation only, `key:generate` creates a new key; always
preserve the existing key when migrating production data.

The frontend uses `bun.lock` with `bun install --frozen-lockfile` in both
environments. Vite runs through Bun; no separate Node installation is required.

Check a running local stack:

```bash
sh docker/smoke-test.sh -f docker-compose.local.yml
```

**Production and migration from host MariaDB:** follow [DEPLOY.md](DEPLOY.md)
**before replacing the old checkout**. It covers maintenance, SQL dump/import,
uploads, HTTPS, validation and rollback. Do not start a new empty database in
place of production or delete Docker volumes.

## 🛠️ Useful artisan commands

| Command                   | Purpose                                                                                   |
|---------------------------|-------------------------------------------------------------------------------------------|
| `app:convert-to-webp`     | Converts every JPEG/PNG attached to **Events** and **Suppliers** to WebP, updating the DB |
| `app:generate-sitemap`    | Builds `public/sitemap.xml` for SEO‑ready deployment                                      |
| `optimize`/`config:cache` | Zero‑downtime cache warm‑ups                                                              |


## 📁  High‑level folder map

```text
app/        Domain logic (Actions, Models, Enums, Observers, Console, Filament)
resources/  Vue3 SFCs, Tailwind, i18n JSON, Blade root
database/   Migrations, Seeders, Factories
routes/     Web, API & CLI entry points
tests/      Feature & Unit test suites
```


## 📜  License

This code is released under the **MIT license** and is free to adapt for educational or commercial use (attribution appreciated).


