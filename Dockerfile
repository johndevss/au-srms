FROM dunglas/frankenphp:php8.4

# Install required PHP extensions (mysqli)
RUN install-php-extensions mysqli

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Ensure FrankenPHP serves plain HTTP without TLS/Caddy features interfering
ENV SERVER_NAME=":80"
ENV FRANKENPHP_CONFIG="root /app/public"

EXPOSE 80

CMD ["frankenphp", "php-server", "-r", "/app/public", "-l", ":80"]