<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Laravel CORS Configuration
    |--------------------------------------------------------------------------
    */

    'paths' => ['api/*', 'sanctum/csrf-cookie'],

    'allowed_methods' => ['*'],

    // Adiciona também http://127.0.0.1:5173 além de localhost, pois o Vite às vezes usa ambos
    'allowed_origins' => ['http://localhost:5173', 'http://127.0.0.1:5173'],

    'allowed_origins_patterns' => [],

    'allowed_headers' => ['*'],

    'exposed_headers' => [],

    'max_age' => 0,

    // ⚠️ Mantém true se estiver usando autenticação com cookies/token
    'supports_credentials' => true,
];
