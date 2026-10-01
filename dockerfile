# Stage 1: Build environment and Composer dependencies
FROM serversideup/php:8.2-cli AS builder

# Switch to root to install PHP extensions
USER root

# Install necessary PHP extensions using the image's built-in helper
# This replaces the manual apt-get and docker-php-ext-install commands
RUN install-php-extensions pdo_mysql pdo_pgsql pgsql intl zip bcmath soap redis

# Set the working directory
WORKDIR /var/www/html

# Copy the entire Laravel application code into the container
COPY . .

ENV CACHE_STORE=array
ENV CACHE_DRIVER=array
ENV SESSION_DRIVER=array
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=:memory:

# Install Composer and dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --no-progress --prefer-dist

# Stage 2: Production environment
FROM serversideup/php:8.2-fpm-nginx-alpine AS production

USER root

# Install only runtime PHP extensions needed in production
RUN install-php-extensions pdo_mysql pdo_pgsql pgsql intl zip bcmath soap redis

# Set working directory
WORKDIR /var/www/html

# Copy the application code and dependencies from the build stage
COPY --from=builder --chown=www-data:www-data /var/www/html /var/www/html

# Copy the initial storage structure[cite: 3]
COPY --chown=www-data:www-data ./storage /var/www/html/storage-init

# Switch to the non-privileged user to run the application[cite: 3]
USER www-data

# Expose port 8080 for the bundled web server
# This replaces the FastCGI port 9000 and the custom CMD ["php-fpm"][cite: 3]
EXPOSE 8080
