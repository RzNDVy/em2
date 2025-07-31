FROM php:8.3-apache

# Install tools
RUN apt-get update && apt-get install -y unzip git zip curl && docker-php-ext-install pdo pdo_mysql

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy project ke container
COPY . /var/www/html/

# Pindah ke direktori project
WORKDIR /var/www/html/

# Jalankan composer install
RUN composer install

EXPOSE 80
