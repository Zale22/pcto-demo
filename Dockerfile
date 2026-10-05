FROM php:8.3-apache

RUN docker-php-ext-install pdo_mysql

COPY index.php aggiungi.php db.php style.css /var/www/html/
