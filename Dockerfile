FROM php:8.4-cli

WORKDIR /app

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git unzip curl \
    libpq-dev zip \
    && docker-php-ext-install pdo pdo_pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Install PHP dependencies only (NO artisan commands here!)
RUN composer install --no-dev --optimize-autoloader

EXPOSE 8000

# All artisan commands run at RUNTIME when env vars are available
CMD php artisan config:clear && \
    php artisan route:clear && \
    php artisan cache:clear && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=8000