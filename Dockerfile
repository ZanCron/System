# Use PHP with Apache
FROM php:8.2-apache

# Enable directory listing
RUN a2enmod autoindex

# Copy files to server root
COPY . /var/www/html/

# Set correct permissions
RUN chmod -R 755 /var/www/html/

# Expose port 80 for web access
EXPOSE 80
