FROM php:8.2-apache

COPY . /var/www/html/

# Aktifin mod_rewrite kalau butuh .htaccess
RUN a2enmod rewrite

# Optional: ganti DocumentRoot kalau kamu *masih* pake folder public/
# RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf
