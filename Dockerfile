FROM php:7.1.3-fpm
RUN apt-get update
RUN apt-get install -y libmcrypt-dev
RUN apt-get install -y mysql-client
RUN apt-get install -y libmagickwand-dev --no-install-recommends
RUN pecl install imagick
RUN docker-php-ext-enable imagick
RUN docker-php-ext-install mcrypt pdo_mysql sockets
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer
RUN apt-get install -y git
RUN apt-get update
RUN apt-get install -y zlib1g-dev
RUN docker-php-ext-install zip
COPY . /app
WORKDIR /app
RUN composer update
