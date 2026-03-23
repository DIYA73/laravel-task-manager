FROM php:8.4-cli

WORKDIR /app

RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev libpq-dev zip

RUN docker-php-ext-install pdo pdo_pgsql zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=$PORT