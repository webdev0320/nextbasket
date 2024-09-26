FROM php:8.1-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    zip

# Install Composer globally
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy the composer.json and install dependencies
COPY composer.json composer.lock ./
RUN composer update --ignore-platform-req=ext-bcmath
RUN docker-php-ext-install pdo pdo_mysql

# Copy the application code
COPY . .

# Expose the necessary port for your service (e.g., 8000 for users service)
EXPOSE 8000

# Run the Symfony development server
CMD ["php", "-S", "0.0.0.0:8000", "-t", "public"]
