# LoginApp

#.env files

Create a file called it .env like the file found in the project which is called .env.example the copy and paste the folllowing in it:
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
GOOGLE_REDIRECT=http://localhost:8000/auth/google/callback
GOOGLE_AUTH_PROVIDER=https://www.googleapis.com/oauth2/v1/certs
SCOPE=https://www.googleapis.com/auth/userinfo.profile

```
After that open your cmd and go to your project folder and write the following

```
php artisan cache:clear
php artisan config:cache
```
