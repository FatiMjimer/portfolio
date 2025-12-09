FROM php:8.2-apache

# Installer extensions PHP
RUN apt-get update && apt-get install -y \
    zip unzip git curl libonig-dev libxml2-dev \
    libzip-dev libpng-dev libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd bcmath

# Activer mod_rewrite
RUN a2enmod rewrite

WORKDIR /var/www/html

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Installer PHP vendor avant d'ajouter tout le projet
COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader

# Copier le reste du projet
COPY . .

# Installer Node + build vite
RUN curl -fsSL https://deb.nodesource.com/setup_20.x | bash -
RUN apt-get install -y nodejs
RUN npm install
RUN npm run build

# Permissions
RUN chmod -R 777 storage bootstrap/cache

# Apache vers public/
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Port
RUN sed -i 's/Listen 80/Listen 8000/' /etc/apache2/ports.conf
RUN sed -i 's/:80/:8000/g' /etc/apache2/sites-available/000-default.conf
EXPOSE 8000

CMD ["apache2-foreground"]
