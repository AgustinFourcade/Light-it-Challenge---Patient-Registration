FROM php:8.2-fpm

# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    zip unzip curl git libpng-dev libjpeg-dev libfreetype6-dev libjpeg-dev libpng-dev libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    && docker-php-ext-install pdo pdo_mysql gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Definir directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos de la aplicación
COPY . .

# Instalar dependencias de PHP
RUN composer install --no-dev --optimize-autoloader

# Establecer permisos adecuados
RUN chown -R www-data:www-data /var/www/html 

# Exponer el puerto para PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]
