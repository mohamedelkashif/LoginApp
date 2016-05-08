#!/usr/bin/env bash

apt-get update
apt-get install -y apache2
sudo apt-get install php5
sudo apt-get install -y php5-cli curl > /dev/null
curl -Ss https://getcomposer.org/installer | php > /dev/null
sudo mv composer.phar /usr/bin/composer

