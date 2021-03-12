FROM php:7.4-fpm-alpine

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

RUN docker-php-ext-install pdo pdo_pgsql
RUN chown -R www-data:www-data /var/www/html
RUN chmod 755 /var/www/html