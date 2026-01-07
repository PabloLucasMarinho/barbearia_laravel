## How to run the application

`docker compose up -d --build`
after that run
`docker compose exec app php artisan migrate --force`
the application will be running at `http://localhost:8000`

## How to end the application

`docker compose down`

## How to run artisan

`docker compose exec app <command>`
