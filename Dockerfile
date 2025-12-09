# ---- Build PHP + Composer ----
FROM dunglas/frankenphp:1.1-php8.2 AS php

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

# Copy project files
COPY . .

# Install dependencies
RUN composer install --no-dev --optimize-autoloader

# Build assets
FROM node:18 AS node
WORKDIR /app
COPY . .
RUN npm install
RUN npm run build

# ---- Final stage ----
FROM dunglas/frankenphp:1.1-php8.2

WORKDIR /app

# Copy PHP build
COPY --from=php /app /app

# Copy built assets
COPY --from=node /app/public/build /app/public/build

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]

EXPOSE 8080
