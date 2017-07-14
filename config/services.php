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

    'facebook' => [
        'client_id' => '1440487642708451',
        'client_secret' => '80b95b0000f2b59b29f5833b10f4c633',
        'redirect' => 'http://localhost:8000/auth/facebook/callback',
    ],

    'google' => [
        'client_id' => '205211736399-7a1j112an8u93ufiuav1vpsln8kpsfku.apps.googleusercontent.com',
        'client_secret' => 'y13g-VpCaNrzHTiJhIWxYKSF',
        'redirect' => 'http://localhost:8000/auth/google/callback'
    ],

    'twitter' => [
        'client_id' => 'A1gjBbM4PH5VGoxB1sYOF18PD',
        'client_secret' => '1s3qF7PCHMS2j02R68sBHTM1TswcrnL9bm2XXxS77ZxoDUbhLQ',
        'redirect' => 'http://localhost:8000/auth/twitter/callback'
    ]

];
