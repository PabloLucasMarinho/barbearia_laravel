#!/bin/sh
set -e

cd /var/www

# Garantir .env
if [ ! -f .env ]; then
  cp .env.example .env
fi

# Garantir estrutura necessária
mkdir -p storage/framework/cache
mkdir -p storage/framework/views
mkdir -p storage/framework/sessions
mkdir -p storage/logs

# Ajustar permissões SEM mudar ownership
chmod -R ug+rwX storage bootstrap/cache || true

exec php-fpm
