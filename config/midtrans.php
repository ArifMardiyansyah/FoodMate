<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Midtrans Configuration
    |--------------------------------------------------------------------------
    |
    | Konfigurasi untuk integrasi Midtrans Payment Gateway
    | Mode: sandbox (untuk testing) atau production
    |
    */

    // Set to true for production, false for sandbox/testing
    'is_production' => env('MIDTRANS_IS_PRODUCTION', false),

    // Merchant ID dari Midtrans Dashboard
    'merchant_id' => env('MIDTRANS_MERCHANT_ID', ''),

    // Client Key dari Midtrans Dashboard
    'client_key' => env('MIDTRANS_CLIENT_KEY', ''),

    // Server Key dari Midtrans Dashboard
    'server_key' => env('MIDTRANS_SERVER_KEY', ''),

    // Enable sanitization (recommended)
    'is_sanitized' => true,

    // Enable 3D Secure
    'is_3ds' => true,

    // Append notification URL (optional)
    'append_notif_url' => env('MIDTRANS_APPEND_NOTIF_URL', ''),

    // Override notification URL (optional)
    'override_notif_url' => env('MIDTRANS_OVERRIDE_NOTIF_URL', ''),

    // Payment types yang diaktifkan
    'enabled_payments' => [
        'credit_card',
        'gopay',
        'shopeepay',
        'qris',
        'bank_transfer',
        'echannel', // Mandiri Bill
        'bca_klikpay',
        'bca_klikbca',
        'bri_epay',
        'cimb_clicks',
        'danamon_online',
        'akulaku',
        'alfamart',
        'indomaret',
    ],
];