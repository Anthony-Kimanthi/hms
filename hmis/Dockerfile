# Use official PHP + Apache image
FROM php:8.2-apache

# Install PHP extensions you need
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Enable Apache mod_rewrite (useful for clean URLs later)
RUN a2enmod rewrite

# Copy your project files into Apache web directory
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html/

# Expose Apache port
EXPOSE 80
