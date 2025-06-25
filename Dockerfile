FROM php:8.2-apache

# Install PostgreSQL driver for PHP
RUN apt-get update && \
    apt-get install -y libpq-dev && \
    docker-php-ext-install pgsql

# Copy all app files to Apache's web root
COPY . /var/www/html/

EXPOSE 80