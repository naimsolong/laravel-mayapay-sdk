<?php

// config for Naimsolong/MayaPay
return [
    'key' => [
        'public' => env('MAYAPAY_PUBLIC_KEY', ''),
        'secret' => env('MAYAPAY_SECRET_KEY', ''),
    ],

    'hostname' => [
        'sandbox' => env('MAYAPAY_SANDBOX_HOSTNAME', 'https://pg-sandbox.paymaya.com'),
        'production' => env('MAYAPAY_PRODUCTION_HOSTNAME', 'https://pg.maya.ph'),
    ],

    'production_ready' => false,
];
