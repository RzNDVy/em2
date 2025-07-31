FROM php:8.2-cli

# Install extensions & tools
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libzip-dev \
    && docker-php-ext-install zip

# Set working directory
WORKDIR /var/www/html

# Copy everything
COPY . .

# Start server
CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]
