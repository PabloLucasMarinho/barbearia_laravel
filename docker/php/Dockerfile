FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
  git \
  unzip \
  libzip-dev \
  libpng-dev \
  libonig-dev \
  libxml2-dev \
  && docker-php-ext-install pdo pdo_mysql zip

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

COPY docker/entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

RUN chown -R www-data:www-data /var/www && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

ENTRYPOINT ["/entrypoint.sh"]
