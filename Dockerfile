# Use the official PHP image with Apache
FROM php:8.1-apache

# Copy application files to the container
COPY . /var/www/html

# Set permissions for the working directory
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Install dependencies (e.g., extensions required by your PHP project)
RUN docker-php-ext-install mysqli

# Enable Apache mod_rewrite for pretty URLs
RUN a2enmod rewrite

# Set working directory
WORKDIR /var/www/html
