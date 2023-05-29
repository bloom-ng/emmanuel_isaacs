<?php

return [
    
    'paystack-secret' => env('PAYSTACK_SECRET_KEY', ''),
    'paystack-public' => env('PAYSTACK_PUBLIC_KEY', ''),
    'paystack-endpoints' => [
        'verify' => 'https://api.paystack.co/transaction/verify/',
    ]


];