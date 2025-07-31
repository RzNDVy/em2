FROM php:8.2-apache

# Salin semua file ke /var/www/html (root Apache)
COPY . /var/www/html/

# Install ekstensi PHP yang dibutuhkan (misal mysqli atau lainnya)
RUN docker-php-ext-install mysqli

EXPOSE 80
