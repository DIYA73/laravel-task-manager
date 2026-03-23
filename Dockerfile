FROM php:8.4-cli-alpine

WORKDIR /app

# Install system dependencies (Alpine uses apk, not apt-get)
RUN apk add --no-cache \
    git \
    unzip \
    curl \
    libpq-dev \
    postgresql-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

EXPOSE 8000

# Runtime: run artisan commands + start server
CMD php artisan config:clear && \
    php artisan route:clear && \
    php artisan cache:clear && \
    php artisan migrate --force && \
    php artisan serve --host=0.0.0.0 --port=8000