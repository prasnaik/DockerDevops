FROM wordpress:latest
COPY bluemix-entrypoint.sh /entrypoint.sh
COPY data.php /var/www/html
COPY data_new.php /var/www/html
COPY data_fresh.php /var/www/html
RUN chmod u+x /var/www/html/data_fresh.php
RUN chmod u+x /var/www/html/data.php
RUN chmod u+x /var/www/html/data_new.php
RUN chmod u+x /entrypoint.sh
RUN usermod -a -G root www-data
ENTRYPOINT ["/entrypoint.sh"]
CMD ["apache2-foreground"]

