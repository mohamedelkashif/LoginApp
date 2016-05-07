<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'mandrill' => [
        'secret' => env('MANDRILL_SECRET'),
    ],

    'ses' => [
        'key'    => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => LoginApp\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

//     'Google' => [
//     'client_id'     => '413720293952-2v8ivhue13493310p95ok4oc22q5a4vl.apps.googleusercontent.com',
//     'client_secret' => 'diCr10I-3td4j1EFh6etJHWR',
//     'redirect' => 'http://localhost:8000/auth/google/callback',
// ] 


    'google' => [
        'client_id' =>  env('GOOGLE_APP_ID'),
        'client_secret' => env('GOOGLE_APP_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT'),
        'auth_provider_x509_cert_url'=>env('GOOGLE_AUTH_PROVIDER'),
        'scope'=>"https://www.googleapis.com/auth/userinfo.profile",
    ]

];
