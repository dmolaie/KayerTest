FROM registry.arna.ir/nodejs/nodejs as js-files
WORKDIR /app
COPY . .
RUN npm i
RUN npm run prod:site
RUN npm run prod:panel

FROM registry.arna.ir/php/php-composer:7.2-fpm as vendor
RUN docker-php-ext-install mbstring && pecl install mongodb
WORKDIR /app
COPY . .
RUN echo "extension=mongodb.so" > /usr/local/etc/php/conf.d/docker-php-ext-mongo.ini
RUN composer update

FROM registry.arna.ir/php/php:7.3-fpm as ehda
WORKDIR /var/www/
RUN apt-get clean; rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*
COPY . .
COPY --from=js-files /app/public/css /var/www/css
COPY --from=js-files /app/public/js /var/www/js
COPY --from=vendor /app/vendor/ /var/www/vendor

from nginx:alpine
WORKDIR /var/www/
COPY --from=ehda /var/www/* /var/www/
COPY docker-compose/nginx/nginx.conf /etc/nginx/conf.d/default.conf
CMD ["nginx", "-g", "daemon off;"]
