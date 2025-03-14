# Load dependencies

To download dependencies for the project, use this command:

`composer install`


# Run the project on local

To run the project, use this command:

`docker-compose up -d --build`
`php artisan serve`


# Migration

To run migrations, use this command:

`docker exec laravel-docker bash -c "php artisan migrate"` <- you must have `DB_HOST=mysql_db` in .env

# Restart Docker containers

To restart all Docker containers, use this command:

`docker-compose down docker-compose up -d`


# Stop Docker containers

To stop all Docker containers, use this command:

`docker-compose stop`