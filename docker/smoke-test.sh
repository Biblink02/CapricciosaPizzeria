#!/bin/sh
set -eu
cd "$(dirname "$0")/.."

# Compose reads the selected .env; pass -f docker-compose.local.yml for local.
docker compose "$@" exec -T app php <<'PHP'
<?php
if (PHP_VERSION_ID < 80336) {
    throw new RuntimeException('PHP must include the 8.3.36 security fixes.');
}
foreach (['ctype', 'dom', 'fileinfo', 'gd', 'intl', 'mbstring', 'pdo_mysql', 'xmlreader', 'zip'] as $extension) {
    if (!extension_loaded($extension)) {
        throw new RuntimeException("Missing extension: $extension");
    }
}
$image = imagecreatetruecolor(1, 1);
ob_start();
$encoded = imagewebp($image);
$webp = ob_get_clean();
if (!$encoded || substr($webp, 8, 4) !== 'WEBP') {
    throw new RuntimeException('GD cannot encode WebP.');
}
require 'vendor/autoload.php';
$app = require 'bootstrap/app.php';
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();
Illuminate\Support\Facades\DB::select('SELECT 1');
echo 'PHP '.PHP_VERSION.': extensions, WebP and database OK'.PHP_EOL;
PHP

docker compose "$@" exec -T app php-fpm -t
docker compose "$@" exec -T app composer check-platform-reqs --no-dev

smoke_url=${SMOKE_URL:-http://localhost:8100}
curl --fail --silent --show-error "$smoke_url/up" > /dev/null
for path in /.env /.git/config /storage/smoke.php /storage/smoke.PHP; do
    status=$(curl --path-as-is --silent --show-error --output /dev/null --write-out '%{http_code}' "$smoke_url$path")
    if [ "$status" != 404 ]; then
        printf 'Expected 404 for %s, received %s\n' "$path" "$status" >&2
        exit 1
    fi
done
printf 'HTTP health and private path checks OK\n'
