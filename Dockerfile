FROM php:8.2-cli

# Install dependency OS + PHP extension dev headers
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    zip \
    libzip-dev \
    libsqlite3-dev \
    libpng-dev \
    pkg-config \
    && docker-php-ext-install zip pdo pdo_sqlite gd

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy composer files first (agar layer cache tidak rusak tiap ada perubahan kecil)
COPY composer.json composer.lock ./

# Buat storage folder dulu supaya package:discover tidak error
RUN mkdir -p storage/framework/{views,cache,sessions} bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache

# Install dependency Laravel
RUN composer install --no-dev --optimize-autoloader

# Copy sisanya
COPY . .

# Bersihkan cache Laravel
RUN php artisan config:clear && \
    php artisan cache:clear && \
    php artisan view:clear && \
    php artisan package:discover --ansi

EXPOSE 8080
CMD php artisan serve --host=0.0.0.0 --port=8080
