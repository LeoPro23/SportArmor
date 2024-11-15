# Usa una imagen base oficial de PHP con Apache
FROM php:8.2-apache

# Instala las dependencias necesarias y herramientas adicionales
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Habilita el módulo de reescritura de Apache
RUN a2enmod rewrite

# Configura el directorio de trabajo
WORKDIR /var/www/html

# Copia los archivos de tu aplicación al contenedor
COPY . /var/www/html/

# Instala Composer desde la imagen oficial
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Permitir que Composer se ejecute como superusuario (solo durante la construcción)
ENV COMPOSER_ALLOW_SUPERUSER=1

# Instala las dependencias de Laravel
RUN composer install --optimize-autoloader --no-dev

# Configura permisos para los directorios de almacenamiento y caché
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copia la configuración personalizada de Apache
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Cambia el puerto de Apache a 8080
RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf

# Exponer el puerto 8080 para Cloud Run
EXPOSE 8080

# Configura el punto de entrada de la aplicación
CMD ["apache2-foreground"]
