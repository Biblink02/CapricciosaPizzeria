# Required by maatwebsite/excel
sudo apk add php82-xmlreader

composer install
php artisan migrate

chmod +x /scripts/scheduler.sh
/scripts/scheduler.sh &

sudo chmod +x /usr/local/bin/startup.sh
/usr/local/bin/startup.sh

RUN chown -R www-data:www-data /var/www