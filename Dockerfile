FROM php:7.4-fpm-alpine

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

RUN docker-php-ext-install pdo pdo_pgsql
RUN chown -R $USER:www-data /var/www/html/storage && sudo chown -R $USER:www-data /var/www/html/bootstrap/cache && chmod -R 775 /var/www/html/storage && chmod -R 775 /var/www/html/bootstrap/cache
