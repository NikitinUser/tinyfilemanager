FROM php:8.2.1-fpm as php-service

WORKDIR /var/www/html

ARG UID
ARG PHP_INI=php.ini

ENV LC_ALL C.UTF-8
ENV UID $UID
ENV PHP_INI $PHP_INI
ENV TZ=$TZ

RUN apt-get update && apt-get install -y \
    libzip-dev

RUN docker-php-ext-install \
    zip 

RUN addgroup --gid $UID --system app  \
    && adduser --uid $UID --system --disabled-login --disabled-password --gid $UID app \
    && chown $UID:$UID /var/www/html

COPY docker/php/$PHP_INI /usr/local/etc/php/php.ini
COPY docker/php/www.conf /usr/local/etc/php-fpm.d/www.conf

COPY . .
