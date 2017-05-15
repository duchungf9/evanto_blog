<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'google'=>[
        //'client_id'=>'888658177403-cekl2996ad6h4mn05kmo68rmdolldgfo.apps.googleusercontent.com',
        'client_id'=>'1008995111621-43foc84rjhrv7p9dafgv05vkqg934dnm.apps.googleusercontent.com',
        //'client_secret' => 'LaJ361XXGpGnirkvuJ-9sQBY',
        'client_secret' => 'Lhnrqa4z_LveyubB_QOxYIwm',
        'redirect' => 'http://'.$_SERVER['HTTP_HOST'].'/social/handle/google',
    ]

];
