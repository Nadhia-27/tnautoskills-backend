FROM php:8.2-cli

# Install PostgreSQL extension
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pgsql

WORKDIR /var/www/html

COPY . .

EXPOSE 10000

CMD ["php", "-S", "0.0.0.0:10000"]