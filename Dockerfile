# Use an official PHP image with Apache
FROM php:8.2-apache

# Copy all files to the Apache web root
COPY . /var/www/html/

# Enable Apache mod_rewrite (useful for URL routing)
RUN a2enmod rewrite

# Expose port 80
EXPOSE 80
