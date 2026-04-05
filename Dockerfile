FROM php:8.4-fpm

# Install the mysqli extension required by the app's database layer
RUN docker-php-ext-install mysqli

WORKDIR /var/www/html

CMD ["php-fpm"]