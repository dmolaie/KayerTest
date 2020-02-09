FROM php:7.3-fpm
RUN apt-get update && apt-get install -y \
        git \
        curl\
        imagemagick\
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        librabbitmq-dev\
        libzip-dev \
        supervisor

RUN docker-php-ext-install -j$(nproc) iconv \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd
RUN apt-get install -y libmongoc-dev libssl-dev libkrb5-dev && git clone https://github.com/mongodb/mongo-php-driver.git \
&& cd mongo-php-driver && git submodule update --init \
 && phpize && ./configure --with-libssl=yes --with--libmongoc=yes && make all && make install
RUN pecl install amqp
RUN apt-get install -y libxml2-dev  && docker-php-ext-install exif gettext mysqli intl  pcntl soap sockets  zip pdo_mysql
#RUN apt-get install -y  libxml2-dev
RUN curl --silent --show-error https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-enable mongodb
RUN chmod -R 777 /tmp

COPY ./supervisor/* /etc/supervisor/conf.d/
RUN service supervisor stop
CMD supervisord --nodaemon --configuration /etc/supervisor/supervisord.conf

