FROM php:8.2-apache
RUN apt-get update && apt-get install -y git curl libpng-dev libonig-dev libxml2-dev zip unzip libpq-dev && docker-php-ext-install pdo pdo_mysql pdo_pgsql mbstring exif pcntl bcmath gd
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
COPY . .
RUN composer install --no-dev --optimize-autoloader
RUN rm -rf storage/logs/* && mkdir -p storage/logs bootstrap/cache && chmod -R 777 storage bootstrap/cache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf
RUN a2enmod rewrite
EXPOSE 80
CMD chmod -R 777 /var/www/html/storage /var/www/html/bootstrap/cache && rm -f /var/www/html/storage/logs/laravel.log && php artisan config:clear && php artisan migrate --force || true && php artisan db:seed --force || true && apache2-foreground