<?php
/**
 * PayPal Setting & API Credentials
 * Created by Raza Mehdi <srmk@outlook.com>.
 */

return [
    'mode'    => env('PAYPAL_MODE', 'sandbox'), // Can only be 'sandbox' Or 'live'. If empty or invalid, 'live' will be used.
    'sandbox' => [
        'username'    => env('PAYPAL_SANDBOX_API_USERNAME', 'sb-gysn56709670_api1.business.example.com'),
        'password'    => env('PAYPAL_SANDBOX_API_PASSWORD', 'VGSNX5FMNKZ469E7'),
        'secret'      => env('PAYPAL_SANDBOX_API_SECRET', 'A4D9ggHpDo6JZ4c9dQRWbEpDreiKAMg-.2PPInFNUZwKKpHjuQEhpa28'),
        'certificate' => env('PAYPAL_SANDBOX_API_CERTIFICATE', ''),
        // 'client_id'         => env('PAYPAL_SANDBOX_CLIENT_ID', 'AbHz8AIltl5-1CpG3I72TzRp78_Xi8rpSb3jVCHuYmto-_zSEx2_0gB2bf3YO7Ks2_B3anSp1X4zH-fw'),
        // 'client_secret'     => env('PAYPAL_SANDBOX_CLIENT_SECRET', 'EPYYrk2cCWxW_7gAhg06Q8HGr--dBy2GQJkJCpm3gFRY5ixmH0ce_JwdpsdxUCR3gV61yd6d4_khzv9q'),
        'app_id'            => 'APP-80W284485P519543T',
    ],
    'live' => [
        'client_id'         => env('PAYPAL_LIVE_CLIENT_ID', ''),
        'client_secret'     => env('PAYPAL_LIVE_CLIENT_SECRET', ''),
        'app_id'            => '',
    ],

    'payment_action' => env('PAYPAL_PAYMENT_ACTION', 'Sale'), // Can only be 'Sale', 'Authorization' or 'Order'
    'currency'       => env('PAYPAL_CURRENCY', 'USD'),
    'notify_url'     => env('PAYPAL_NOTIFY_URL', ''), // Change this accordingly for your application.
    'locale'         => env('PAYPAL_LOCALE', 'en_US'), // force gateway language  i.e. it_IT, es_ES, en_US ... (for express checkout only)
    'validate_ssl'   => env('PAYPAL_VALIDATE_SSL', true), // Validate SSL when creating api client.
];
