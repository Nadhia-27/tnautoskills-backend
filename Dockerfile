FROM php:8.2-apache

# Install PostgreSQL support
RUN apt-get update && apt-get install -y libpq-dev \
  && docker-php-ext-install pgsql

# Copy your code into Apache web root
COPY . /var/www/html/

EXPOSE 80