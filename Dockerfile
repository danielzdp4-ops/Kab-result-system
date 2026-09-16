FROM php:8.2-apache
RUN apt-get update && apt-get install -y git zip unzip libzip-dev libpng-dev libonig-dev libxml2-dev && docker-php-ext-install pdo pdo_mysql zip mbstring gd
RUN a2enmod rewrite
WORKDIR /var/www/html
COPY . .
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader
RUN chown -R www-data:www-data storage bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
EXPOSE 80
CMD ["apache2-foreground"]
