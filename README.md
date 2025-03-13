# Run the project on local

To run the project, use this command:

`docker-compose up -d --build`
`php artisan serve`

You will have the backend running in port {$PORT} (declared in .env) and MYSQL running also in port {$PORT}


# Migration Laravel

To run migrations, use this command:

`docker exec laravel-docker bash -c "php artisan migrate"`
`php artisan migrate`


# Restart Docker containers

To restart all Docker containers, use this command:

`docker-compose down docker-compose up -d`


# Stop Docker containers

To stop all Docker containers, use this command:

`docker-compose stop`