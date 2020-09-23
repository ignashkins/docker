FROM davidlemaitre/php54-apache

RUN apt-get update && apt-get install -y --no-install-recommends \
    php5-xsl \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

CMD ["/usr/sbin/apache2ctl", "-DFOREGROUND"]