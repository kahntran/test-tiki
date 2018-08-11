FROM php:7.2.2-apache

# Composer & PHPUnit installation
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHPUnit
RUN cd /tmp && curl https://phar.phpunit.de/phpunit.phar > phpunit.phar && \
    chmod +x phpunit.phar && \
    mv /tmp/phpunit.phar /usr/local/bin/phpunit

# Set the port to 80
EXPOSE 80

ENV PATH /root/.composer/vendor/bin:$PATH
