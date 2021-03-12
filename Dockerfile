# FROM php:7.4-alpine

# RUN docker-php-ext-install pdo fpm

FROM php:7.4-alpine

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions gd xdebug bcmath fpm pgsql pdo