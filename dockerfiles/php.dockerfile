FROM php:8.3-fpm-alpine

RUN chown -R www-data:www-data /var/www/html

WORKDIR /var/www/html
 
COPY src .
 
RUN apk add autoconf zlib g++ make
 
RUN addgroup -g 1000 php_user && adduser -G php_user -g php_user -s /bin/sh -D php_user

USER php_user
