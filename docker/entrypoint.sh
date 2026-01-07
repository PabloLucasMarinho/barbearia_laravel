#!/bin/sh
set -e

cd /var/www

# Garantir .env
if [ ! -f .env ]; then
  cp .env.example .env
fi

# Garantir estrutura necessária
mkdir -p storage/framework/{cache,views,sessions}
mkdir -p storage/logs

# Ajustar permissões FINAL (antes do PHP-FPM)
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

exec php-fpm
