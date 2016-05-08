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



