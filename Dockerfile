FROM dunglas/frankenphp:php8.4

# Install system utilities needed by Composer (git, unzip) and PHP extensions (mysqli)
RUN apt-get update && apt-get install -y --no-install-recommends \
    git \
    unzip \
    && rm -rf /var/lib/apt/lists/* \
    && install-php-extensions mysqli

# Install Composer CLI
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Ensure FrankenPHP serves plain HTTP without TLS/Caddy features interfering
ENV SERVER_NAME=":80"
ENV FRANKENPHP_CONFIG="root /app/public"

EXPOSE 80

# Auto-install vendor dependencies on container start if missing, then launch FrankenPHP
ENTRYPOINT ["sh", "-c", "if [ ! -f /app/vendor/autoload.php ]; then composer install --no-interaction --prefer-dist; fi && exec frankenphp php-server -r /app/public -l :80"]