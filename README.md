# Load dependencies

To download dependencies for the project, use this command:

`composer install`


# Run the project on local

To run the project, use this command:

`docker-compose up -d --build`
`php artisan serve`

You will have the backend running in port 8000 (declared in docker-compose)


# Migration

To run migrations, use this command:

`docker exec laravel-docker bash -c "php artisan migrate"` <- just for Docker
`php artisan migrate` <- just for Laravel


# Restart Docker containers

To restart all Docker containers, use this command:

`docker-compose down docker-compose up -d`


# Stop Docker containers

To stop all Docker containers, use this command:

`docker-compose stop`