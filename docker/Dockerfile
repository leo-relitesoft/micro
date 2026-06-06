FROM composer/composer:2-bin AS composer

FROM dunglas/frankenphp:1.12.4-php8 AS base


RUN apt update && apt -y install \
    unzip

#
# Development
#

FROM base AS dev

RUN install-php-extensions xdebug

COPY --from=composer /composer /usr/bin/composer

#
# Production
#

FROM base AS prod-builder
COPY --from=composer /composer /usr/bin/composer
COPY .. /app
RUN --mount=type=cache,target=/tmp/cache \
    composer install --no-dev --no-progress --no-interaction --classmap-authoritative && \
    rm composer.lock composer.json

FROM base AS prod
ENV APP_ENV=prod
COPY --from=prod-builder --chown=www-data:www-data /app /app
USER www-data
