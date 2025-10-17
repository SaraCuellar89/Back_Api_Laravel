# Imagen base
FROM php:8.2-cli

# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libxml2-dev libzip-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip

# Instalar Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Directorio de trabajo
WORKDIR /app

# Copiar el proyecto
COPY . .

# Instalar dependencias de Laravel (sin dependencias de desarrollo)
RUN composer install --no-dev --optimize-autoloader

# ❌ No generamos la APP_KEY aquí (Render la usará desde variables de entorno)
# RUN php artisan key:generate --force

# 🔧 Ajustar permisos
RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

# Exponer el puerto 8000 (Render lo detecta automáticamente)
EXPOSE 8000

# Comando para iniciar Laravel
CMD php artisan serve --host=0.0.0.0 --port=8000
