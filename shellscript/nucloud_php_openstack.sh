#INSTALL PHP SERVICE
sudo apt-get install -y php5 libapache2-mod-php5 php5-mcrypt
sudo apt-get -y install php5-curl php5-cli php5-mysqlphp-soap php5-gd

#CREATE ROOT DIRECTORY FOR PHP
mkdir /var/www/php
echo "<?php phpinfo(); ?>" > /var/www/php/index.php

#MODIFY APACHE FOR PHP LISTENING PORTS
echo "Listen 9696" >> /etc/apache2/ports.conf
# ADD "Listen 9696" TO ports.conf

#BACKUP ORIGINAL keystone.conf 
mv /etc/apache2/sites-available/keystone.conf /etc/apache2/sites-available/keystone.conf_orig

#ADD NEW keystone.conf
mv keystone.conf /etc/apache2/sites-available/keystone.conf
chown root:root /etc/apache2/sites-available/keystone.conf

#RESTART APACHE TO UPDATE THE SETTINGS
service apache2 restart

#TEST YOUR PHP WITH THESE URL http://<your-ip>:9696

#DOWNLOAD OpenStack PHP VIA GITHUB
cd /var/www/php
git clone https://github.com/jbaltazar/openstack_horizon.git