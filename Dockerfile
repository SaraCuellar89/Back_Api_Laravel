FROM php:8.2-cli

# Instalar dependencias necesarias para Laravel
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instalar Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Copiar el proyecto
WORKDIR /app
COPY . /app

# Instalar dependencias de Laravel
RUN composer install
RUN php artisan key:generate

# Exponer el puerto que Render usará
EXPOSE 8000

# Comando para iniciar Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
