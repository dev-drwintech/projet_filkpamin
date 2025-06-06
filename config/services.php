<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],




    // 'google' => [
    //     'client_id' => env('GOOGLE_CLIENT_ID'), // Votre Client ID Google
    //     'client_secret' => env('GOOGLE_CLIENT_SECRET'), // Votre Secret Google
    //     'redirect' => env('GOOGLE_REDIRECT_URI'), // URL de redirection
    // ],



    // 'google' => [
    //     'client_id' => env('GOOGLE_CLIENT_ID'),
    //     'client_secret' => env('GOOGLE_CLIENT_SECRET'),
    //     'redirect' => 'http://localhost:8000/login/google/callback',



    //     // 'redirect' => 'http://localhost:8000/laravel-socialite/public/login/google/callback',
    //     // 'redirect' => 'http://example.com/callback-url',
    //     // 'redirect' => env('GOOGLE_CLIENT_CALLBACK_URL'),
    // ],

    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET'),
        'redirect' => env('FACEBOOK_REDIRECT_URI'),


        // 'redirect' => 'http://localhost:8000/login/facebook/callback',
        // 'redirect' => 'http://example.com/callback-url',
        // 'redirect' => env('FACEBOOK_CLIENT_CALLBACK_URL'),
    ],




    'pusher' => [
        'beams_instance_id' => env('BEAM_INSTANCE_ID'),
        'beams_secret_key' => env('BEAMS_SECRET_KEY'),
    ],

    'fcm' => [
        'server_key' => env('FCM_SERVER_KEY')
    ],

    'tmdb' => [
        'token' => env('TMDB_API_TOKEN'),
    ],


    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET'),
        'redirect' => env('GOOGLE_REDIRECT_URI'),

        'analytics' => [
            'view_id' => env('GOOGLE_ANALYTICS_ID'),
            'service_account_credentials_json' => storage_path('app/google/filmkpamin-432716-ee9450ddde7a.json'),
            'verify' => false,
        ],
    ],

    'moneroo' => [
        'secret_key' => env('MONEROO_SECRET_KEY'),
    ],


];
