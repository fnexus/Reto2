#!/usr/bin/env bash

apt-get update

# unzip is for composer
apt-get install vim unzip  -y

apt-get install apache2 -y

apt-get install mysql-client libmysqlclient-dev -y
apt-get install libapache2-mod-php7.2 php7.2 php7.2-mysql php7.2-sqlite -y
apt-get install php7.2-mbstring php7.2-curl php7.2-intl php7.2-gd php7.2-zip php7.2-bz2 -y
apt-get install php7.2-dom php7.2-xml php7.2-soap -y
apt-get install --reinstall ca-certificates -y

# install the php xdebug extension (only for dev servers!)
apt-get install php-xdebug -y

# add xdebug settings to php.ini
echo 'xdebug.remote_port=9000' >> /etc/php/7.2/apache2/php.ini
echo 'xdebug.remote_enable=true' >> /etc/php/7.2/apache2/php.ini
echo 'xdebug.remote_connect_back=true' >> /etc/php/7.2/apache2/php.ini
echo 'xdebug.remote_autostart=on' >> /etc/php/7.2/apache2/php.ini
echo 'xdebug.remote_host=' >> /etc/php/7.2/apache2/php.ini
echo 'xdebug.max_nesting_level=1000' >> /etc/php/7.2/apache2/php.ini
echo 'xdebug.idekey=PHPSTORM' >> /etc/php/7.2/apache2/php.ini

# Enable apache mod_rewrite
a2enmod rewrite
a2enmod actions

# Change AllowOverride from None to All (between line 170 and 174)
sed -i '170,174 s/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Start the webserver
service apache2 restart

# Install MySQL (optional)
apt-get install mysql-server -y

# Change mysql root password
service mysql start
mysql -u root --password="" -e "update mysql.user set authentication_string=password(''), plugin='mysql_native_password' where user='root';"
mysql -u root --password="" -e "flush privileges;"
mysql -u root --password='' -e "GRANT ALL PRIVILEGES ON *.* TO 'fnexus'@'localhost' IDENTIFIED BY 'fn3xu5';"
mysql -u fnexus --password="fn3xu5" < /vagrant/base_de_datos/tablas.sql
mysql -u fnexus --password="fn3xu5" < /vagrant/base_de_datos/inserts_demo.sql


# Install composer
cd ~
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php composer-setup.php --install-dir=/usr/local/bin --filename=composer
php -r "unlink('composer-setup.php');"
composer self-update

# Create a symlink
rm -rf /var/www
mkdir /var/www
ln -s /vagrant/ /var/www/html
#chmod 777 /var/www/html/index/img/imagenes_usuarios/
