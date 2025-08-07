FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libwebp-dev \
    libxpm-dev \
    libgd-dev \
    libmcrypt-dev \
    libicu-dev \
    && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp --with-xpm
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl zip mysqli

# Enable Apache modules
RUN a2enmod rewrite
RUN a2enmod php

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html/

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Configure Apache for PHP
RUN echo '<Directory /var/www/html>\n\
    AllowOverride All\n\
    Require all granted\n\
    AddType application/x-httpd-php .php\n\
    AddType application/x-httpd-php-source .phps\n\
</Directory>' > /etc/apache2/conf-available/docker-php.conf \
    && a2enconf docker-php

# Ensure PHP is properly configured
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf

EXPOSE 80

CMD ["apache2-foreground"] 