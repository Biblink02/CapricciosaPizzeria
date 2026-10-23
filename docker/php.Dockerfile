FROM php:8.3-fpm-bookworm

RUN php -r 'exit(PHP_VERSION_ID >= 80336 ? 0 : 1);' \
    && apt-get update \
    && apt-get install -y --no-install-recommends \
        git unzip libfreetype6-dev libjpeg62-turbo-dev libpng-dev libwebp-dev \
        libicu-dev libzip-dev \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install -j1 pdo_mysql intl gd zip exif bcmath pcntl

COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer
COPY docker/php.ini /usr/local/etc/php/conf.d/zz-app.ini
COPY docker/php-fpm.conf /usr/local/etc/php-fpm.d/zzzz-app.conf

ENV COMPOSER_HOME=/tmp/composer
WORKDIR /var/www/app
