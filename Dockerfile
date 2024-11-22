FROM ubuntu
WORKDIR /app
COPY . .
COPY composer.json composer.lock ./
RUN apt-get update
RUN apt-get install curl
RUN curl -sS https://getcomposer.org/installer -o composer-setup.php
RUN php composer-setup.php --install-dir=/usr/local/bin --filename=composer
RUN composer self-update

RUN wget https://get.symfony.com/cli/installer -O - | bash

RUN composer install 
RUN symfony server:start
