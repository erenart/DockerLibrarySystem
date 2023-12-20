FROM php:7.4-apache

RUN apt-get update && apt upgrade -y
RUN docker-php-ext-install mysqli pdo pdo_mysql

ADD ./app /var/www/html
COPY ./app/my-site.conf /etc/apache2/sites-available/my-site.conf

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf &&\
    a2enmod rewrite &&\
    a2enmod headers &&\
    a2enmod rewrite &&\
    a2dissite 000-default &&\
    a2ensite my-site &&\
    service apache2 restart