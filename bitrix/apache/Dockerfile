FROM centos-systemd

RUN yum -y update && \
    yum install -y epel-release && \
    yum install -y http://rpms.remirepo.net/enterprise/remi-release-7.rpm && \
    yum-config-manager -y --enable remi-php72 && \
    yum -y install \
        wget \
        vim \
        net-tools \
        php \
        php-opcache \
        php-bz2 \
        php-curl \
        php-dom \
        php-exif \
        php-fileinfo \
        php-gd \
        php-calendar \
        php-ctype \
        php-filter \
        php-geoip \
        php-gettext \
        php-hash \
        php-iconv \
        php-json \
        php-ldap \
        php-libxml \
        php-mbstring \
        php-mcrypt \
        php-memcache \
        php-mysqli \
        php-mysqlnd \
        php-openssl \
        php-pcntl \
        php-pcre \
        php-phar \
        php-pspell \
        php-readline \
        php-rrd \
        php-session \
        php-shmop \
        php-sockets \
        php-standard \
        php-tokenizer \
        php-xml \
        php-xmlwriter \
        php-zip \
        php-zlib \
        php-pear \
        php-apcu

RUN useradd bitrix --create-home --password bitrix --user-group

ADD php.ini /etc/php.ini

RUN mkdir /tmp/php_sessions && \
    mkdir /tmp/php_sessions/www && \
    mkdir /tmp/php_upload && \
    mkdir /tmp/php_upload/www && \
    chown -R bitrix:bitrix /tmp/php_sessions/www && \
    chown -R bitrix:bitrix /tmp/php_upload/www

EXPOSE 8887 8888 9887

CMD ["httpd", "-D", "FOREGROUND"]