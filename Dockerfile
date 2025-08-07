FROM php:8.2-apache
RUN apt-get update -y &&\
    apt-get install -y libbz2-1.0 libicu-dev libcurl4-openssl-dev ca-certificates libreadline-dev zlib1g-dev build-essential  libonig-dev libzip-dev libxml2-dev &&\
    update-ca-certificates && \
    pecl install xdebug &&\
    docker-php-ext-install \
    pdo \
    pdo_mysql \
    mbstring \
    fileinfo \
    curl \
    intl \
    zip \
    xml &&\
    docker-php-ext-enable xdebug && \
    curl -Ss https://getcomposer.org/installer | php &&\
    mv composer.phar /usr/local/bin/composer &&\
    apt-get purge -y --auto-remove build-essential &&\
    apt-get clean &&\
    rm -rf /var/lib/apt/lists/*
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /myapp/web|' /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite
RUN printf '<Directory /myapp/web>\n\
    Options Indexes FollowSymLinks\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>\n' \
  > /etc/apache2/conf-available/myapp-access.conf \
 && a2enconf myapp-access

WORKDIR /myapp

COPY . /myapp

RUN chown -R www-data:www-data /myapp

RUN composer install

USER www-data

EXPOSE 80


