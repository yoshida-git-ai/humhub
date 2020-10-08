# docker build -t humhub-php8 .
# docker run -dp 3000:80 humhub-php8

FROM composer:1.10.13 as builder-composer

FROM php:8.0.0rc1-apache-buster

RUN apt update && apt-get install -y libzip-dev \
        libpng-dev \
        libicu-dev \
        libldb-dev \
        libldap2-dev \
        nodejs \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        npm

RUN docker-php-ext-install zip
RUN docker-php-ext-install exif
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install gd
RUN docker-php-ext-install ldap
RUN docker-php-ext-install intl
RUN docker-php-ext-install pdo_mysql
    

WORKDIR /var/www/html/humhub


COPY --from=builder-composer /usr/bin/composer /usr/bin/composer
RUN chmod +x /usr/bin/composer

COPY . /var/www/html/humhub

RUN chmod -R 777 /var/www/html/humhub/assets
RUN chmod -R 777 /var/www/html/humhub/protected/config
RUN chmod -R 777 /var/www/html/humhub/protected/modules
RUN chmod -R 777 /var/www/html/humhub/protected/runtime
RUN chmod -R 777 /var/www/html/humhub/uploads/

RUN composer install --no-ansi --no-dev --no-interaction --no-progress --no-scripts --optimize-autoloader && \
    chmod +x protected/yii && \
    chmod +x protected/yii.bat

RUN npm install grunt
RUN npm install -g grunt-cli