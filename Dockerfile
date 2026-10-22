FROM public.ecr.aws/docker/library/php:8.2-fpm-alpine

RUN apk add --no-cache \
    postgresql-dev \
    git \
    unzip \
    curl \
    libzip-dev \
    linux-headers \
    $PHPIZE_DEPS

RUN docker-php-ext-install pdo pdo_pgsql zip \
    && pecl install redis \
    && docker-php-ext-enable redis

ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html

COPY composer.json composer.lock* ./

RUN composer install --no-scripts --no-autoloader --prefer-dist --ignore-platform-reqs

COPY . .

RUN composer dump-autoload --optimize

RUN mkdir -p instance/uploads && chmod -R 777 instance

EXPOSE 9000
CMD ["php-fpm"]