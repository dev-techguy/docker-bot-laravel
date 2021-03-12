FROM php:7.4-alpine
FROM php:7.4-fpm
FROM php:7.4-cli
FROM php:7.4-mysql

RUN docker-php-ext-install pdo