FROM php:8.2-apache

# Installer les extensions PHP nécessaires pour Laravel
RUN apt-get update && apt-get install -y \
    zip unzip git curl libonig-dev libxml2-dev \
    libzip-dev libpng-dev libsqlite3-dev \
    && docker-php-ext-install pdo pdo_mysql zip gd

# Activer mod_rewrite Apache
RUN a2enmod rewrite

# Copier le projet dans le conteneur
WORKDIR /var/www/html
COPY . .

# Installer Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader

# Build Vite (Frontend)
RUN apt-get update && apt-get install -y nodejs npm
RUN npm install
RUN npm run build

# Donner permissions au storage
RUN chmod -R 777 storage bootstrap/cache

# Apache document root vers public/
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

EXPOSE 80

CMD ["apache2-foreground"]
