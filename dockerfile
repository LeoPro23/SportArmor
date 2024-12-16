# Etapa 1: Construir los assets con Node.js
FROM node:16 as node-builder

# Establecer el directorio de trabajo
WORKDIR /app

# Copiar package.json y package-lock.json
COPY package.json package-lock.json ./

# Instalar las dependencias de npm
RUN npm install

# Copiar el resto de los archivos de la aplicación
COPY . .

# Compilar los assets
RUN npm run build
# Si usas Laravel Mix, usa:
# RUN npm run prod

# Etapa 2: Construir la imagen final con PHP y Apache
FROM php:8.2-apache

# Instalar las dependencias necesarias
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip \
    libzip-dev \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath xml zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Habilitar módulos de Apache
RUN a2enmod rewrite

# Configurar el directorio de trabajo
WORKDIR /var/www/html

# Copiar los archivos de la aplicación desde la etapa anterior
COPY --from=node-builder /app ./

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instalar las dependencias de PHP
RUN composer install --optimize-autoloader --no-dev

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Copiar la configuración personalizada de Apache
COPY apache.conf /etc/apache2/sites-available/000-default.conf

# Cambiar el puerto de Apache a 8080
RUN sed -i 's/Listen 80/Listen 8080/' /etc/apache2/ports.conf

# Exponer el puerto 8080
EXPOSE 8080

# Iniciar Apache en primer plano
CMD ["apache2-foreground"]
