FROM dunglas/frankenphp:1.12.4-php8 AS base

RUN apt update && apt -y install unzip

RUN install-php-extensions xdebug
