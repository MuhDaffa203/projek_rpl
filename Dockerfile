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

RUN chmod -R 775 database && chmod 664 database/database.sqlite


# 🔥 Buat folder storage + bootstrap/cache + set permission & ownership
RUN mkdir -p \
    storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    bootstrap/cache && \
    chmod -R 775 storage bootstrap/cache && \
    chown -R www-data:www-data storage bootstrap/cache

# Jalankan composer install setelah direktori siap
RUN composer install --no-dev --optimize-autoloader

# Laravel cache clear
RUN php artisan config:clear && \
    php artisan cache:clear && \
    php artisan view:clear && \
    php artisan package:discover --ansi

# Expose port dan jalankan Laravel
EXPOSE 8080
CMD php artisan serve --host=0.0.0.0 --port=8080
