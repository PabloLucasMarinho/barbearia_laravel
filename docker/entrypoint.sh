#!/bin/sh
set -e

cd /var/www

echo "Aguardando MySQL ficar disponível..."

until php artisan migrate:status >/dev/null 2>&1; do
  sleep 2
done

echo "MySQL disponível."

if [ ! -f .env ]; then
  cp .env.example .env
fi

git config --global --add safe.directory /var/www

composer install --no-interaction --prefer-dist

php artisan key:generate --force

exec php-fpm
