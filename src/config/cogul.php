<?php

return [

    'token' => env('COGUL_TOKEN', ''),
    'url' => env('COGUL_URL', '/auth/token/{token}'),
    'redirect' => env('COGUL_REDIRECT', '/'),
    'cookie' => env('COGUL_COOKIE', 'cogul'),
    'expiration' => env('COGUL_EXPIRATION', 2628000), // 5 years.
    'middleware' => env('COGUL_MIDDLEWARE', 'web'),
    'whitelist' => [],

];
