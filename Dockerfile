FROM php:fpm-alpine
RUN apk update && apk add libpng-dev
RUN docker-php-ext-install session exif mbstring gd mysqli json zip
EXPOSE 9000
CMD ["php-fpm"]
