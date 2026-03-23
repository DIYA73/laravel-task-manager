FROM php:8.4-cli

WORKDIR /app

RUN apt-get update && apt-get install -y \
    git unzip curl \
    libpq-dev zip \
    && docker-php-ext-install pdo pdo_pgsql

    RUN php artisan config:clear && \
    php artisan route:clear && \
    php artisan cache:clear
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install --no-interaction --prefer-dist --optimize-autoloader

EXPOSE 10000

CMD php artisan migrate:fresh --force && php artisan serve --host=0.0.0.0 --port=$PORT