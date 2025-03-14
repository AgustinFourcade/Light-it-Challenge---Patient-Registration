# Load dependencies

To download dependencies for the project, use this command:

`composer install`


# Run the project on local

To run the project, use this command:

`docker-compose up -d --build` <- run docker
`php artisan serve` <- local server
`php artisan queue:work` <- queues for email


# Migration

To run migrations, use this command:

`docker exec laravel-docker bash -c "php artisan migrate"` <- you must have `DB_HOST=mysql_db` in .env and then revert it to `DB_HOST=localhost` for local usage

# Restart Docker containers

To restart all Docker containers, use this command:

`docker-compose down docker-compose up -d`


# Stop Docker containers

To stop all Docker containers, use this command:

`docker-compose stop`