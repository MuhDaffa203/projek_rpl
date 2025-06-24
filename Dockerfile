# Gunakan image PHP Laravel yang cocok
FROM php:8.2-cli

# Install dependensi dasar
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    zip \
    && docker-php-ext-install zip pdo pdo_sqlite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Salin semua isi project
COPY . .

# Buat storage path agar tidak error saat package:discover
RUN mkdir -p storage/framework/{views,cache,sessions} \
    && chmod -R 775 storage

# Install dependency Laravel tanpa dev
RUN composer install --no-dev --optimize-autoloader

# Bersihkan cache Laravel
RUN php artisan config:clear && \
    php artisan cache:clear && \
    php artisan view:clear && \
    php artisan package:discover --ansi
