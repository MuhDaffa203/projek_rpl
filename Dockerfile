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

# Copy seluruh project ke dalam image
COPY . .

# ✅ Permission untuk database + ownership
RUN chmod -R 775 database && \
    chmod 664 database/database.sqlite && \
    chown -R www-data:www-data database

# ✅ Folder storage dan cache Laravel
RUN mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache && \
    chown -R www-data:www-data storage bootstrap/cache

# Install dependency
RUN composer install --no-dev --optimize-autoloader

# Ganti user ke www-data sebelum menjalankan Artisan
USER www-data

# Laravel cache clear
RUN php artisan config:clear && \
    php artisan cache:clear && \
    php artisan view:clear && \
    php artisan package:discover --ansi

# Kembali ke root user (jika dibutuhkan untuk perintah selanjutnya)
USER root

EXPOSE 8080
CMD php -S 0.0.0.0:8080 -t public

