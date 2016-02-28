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
        'model'  => App\User::class,
        'key'    => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
      'client_id' => '1561782147447245',
      'client_secret' => '1a1e1ce668315c1ce88037dea17b5b31',
      'redirect' => 'http://popcre.com/auth/facebook/callback',
    ],

    'google' => [
      'client_id' => '335889975103-4vn3ou2mcr3ibdls0opkpag6rqa4oah1.apps.googleusercontent.com',
      'client_secret' => 'T2lv6yyE7s5eUoMGO-EgbGF4',
      'redirect' => 'http://popcre.com/auth/google/callback',
    ],

    'linkedin' => [
      'client_id' => '78ta2ej8q7mxvl',
      'client_secret' => 'AvZ94C1XFUFTwe3r',
      'redirect' => 'http://popcre.com/auth/linkedin/callback',
    ],
];
