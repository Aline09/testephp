FROM php:7.4-fpm

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

RUN install-php-extensions mysqli pdo_mysql