FROM php:7.2-cli

# Composer & PHPUnit installation
RUN curl -fsSL https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && composer global require phpunit/phpunit ^7.0 --no-progress --no-scripts --no-interaction

ENV PATH /root/.composer/vendor/bin:$PATH
CMD ["phpunit"]
