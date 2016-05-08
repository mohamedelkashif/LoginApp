# LoginApp

#.env files


Create a file and  call it .env like the file found in the project which is called .env.example then copy and paste the folllowing in it:
```
APP_ENV=local
APP_DEBUG=true
APP_KEY=qhl1IMkcYuhbwIrwGSPREb9fEU3cMtpK

DB_CONNECTION=sqlite
DB_HOST=127.0.0.1
DB_DATABASE=database
DB_USERNAME=''
DB_PASSWORD=''

CACHE_DRIVER=file
SESSION_DRIVER=file
QUEUE_DRIVER=sync

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=elkashifmohamed92
MAIL_PASSWORD=01064682745abc
MAIL_ENCRYPTION=tls

GOOGLE_APP_ID=413720293952-2v8ivhue13493310p95ok4oc22q5a4vl.apps.googleusercontent.com
GOOGLE_APP_SECRET=diCr10I-3td4j1EFh6etJHWR
GOOGLE_REDIRECT=http://localhost.com:8000/auth/google/callback
GOOGLE_AUTH_PROVIDER=https://www.googleapis.com/oauth2/v1/certs
SCOPE=https://www.googleapis.com/auth/userinfo.profile

```

You have to install composer on your local machine from the following site: https://getcomposer.org/
Navigate to your project folder and wirte the following command:


After that open your cmd or Github shell and go to your project folder and write the following
```
composer install
```

The write the following commands:

```
php artisan key:generate
php artisan cache:clear
php artisan config:cache
```
Now you can run the application by writing the following command :
```
php artisan serve
```
The following link will appear: localhost:8000


In case you want to run the app on a server on virtual machine, you have too do the following:

1- Download and Install vagrant from https://www.vagrantup.com/
2- Download and install Oracle virtual box from https://www.virtualbox.org/
3- Navigate to your project folder using Github shell and write the following commanf
   ```
   vagrant init
   ```
   Then write the following command
   ```
   vagrant box add precise64 http://files.vagrantup.com/precise64.box
   ```
   It will take some time to download and install the Ubuntu server depends on the speed of the internet connection

 4- You have to make sure that Client SSH is found in your Variable PATH, if not you have to add the following to your PATH
 ```
 C:\Program Files\Git\usr\bin\ssh.exe   
```
5- Write the following commands:
    ```
   1- vagrant up
   2- vagrant ssh
   ```
This should log you into the server 
Now you can set up basic configuration for the server by the following commands:

```
sudo apt-get update
sudo apt-get install python-software-properties
add-apt-repository ppa:ondrej/php5-5.6
apt-get -y update
apt-get -y install php5 php5-mhash php5-mcrypt php5-curl php5-cli php5-mysql php5-gd php5-intl php5-xsl php5-bcmath
apt-get install -y apache2
sudo service apache2 restart
sudo apt-get install php5-sqlite
```
To install composer, write the following commands:
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '92102166af5abdb03f49ce52a40591073a7b859a86e8ff13338cf7db58a19f7844fbc0bb79b2773bf30791e935dbd938') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
6- The last thing is that you have to write the following line in that folder C:\Windows\System32\drivers\etc 
```
192.168.33.101  localhost.com
```
To run the application navigate to vagrant so you have something like this
```
vagrant@precise64:~$ cd /vagrant
```
Then write the following:
```
php artisan serve --host 192.168.33.101
```

so you can go to the app through :

http://localhost.com:8000/

