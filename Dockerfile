FROM php:7.4-fpm-alpine

RUN apk add --no-cache nginx wget

RUN mkdir -p /run/nginx

COPY docker/nginx.conf /etc/nginx/nginx.conf

RUN mkdir -p /app
COPY . /app

RUN sh -c "wget http://getcomposer.org/composer.phar && chmod a+x composer.phar && mv composer.phar /usr/bin"
RUN cd /app &&  /usr/bin/composer install --no-dev

RUN chown -R www-data: /app

CMD sh /app/docker/startup.sh