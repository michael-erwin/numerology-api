FROM php:7.4-fpm-alpine

ARG UID

RUN chmod -R 7777 /var/www/html

# For production
# COPY [--chown=<user>:<group>] <src>... <dest>

# Install php extensions
RUN docker-php-ext-install pdo_mysql bcmath

# Enable artisan executable alias
RUN echo "#!/bin/ash" >> /usr/bin/artisan && \
    echo "php artisan \$1 \$2" >> /usr/bin/artisan && \
    chmod +x /usr/bin/artisan

# Create non root user
RUN adduser -u ${UID} -G www-data -D user www-data
USER user
