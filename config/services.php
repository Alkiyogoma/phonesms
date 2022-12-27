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
    'github' => [
        'client_id' => 'Iv1.c7f0a6b04d9a3fd6',
        'client_secret' => '355f6ef3960ddfa40bf130e4deb239022dab4ccd',
        'redirect' => 'http://localhost:8000/auth/callback',
    ],

    'google' => [
        'client_id'     => '1019534134504-vgp0no6inkuvdgdhi11i7ihen02pfteg.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect'      =>  'http://localhost:8000/auth/googlecall'
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

];
