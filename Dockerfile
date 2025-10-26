# Use an official PHP image with Apache
FROM php:8.2-apache

# Copy all files to the Apache web root
COPY . /var/www/html/

# Enable Apache mod_rewrite (useful for URL routing)
RUN a2enmod rewrite

# Enable Apache headers module (for security headers)
RUN a2enmod headers

# Enable Apache expires module (for cache control)
RUN a2enmod expires

# Expose port 80
EXPOSE 80