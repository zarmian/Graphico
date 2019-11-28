<?php
$paddleBaseUrl = env('PADDLE_BASE_URL', "https://vendors.paddle.com");
$paddleBaseCheckoutUrl = env('PADDLE_BASE_CHECKOUT_URL', "https://checkout.paddle.com");

$paddle = [
    'vendor' => [
        'vendorId' => env('VENDOR_ID', "104845"),
        'authToken' => env('VENDOR_AUTH', "3681b013510edda6eff4441233c568469e9244d2cec373d0c7")
    ],
    'paddleUrls' => [
        'planListings' => "$paddleBaseUrl/api/2.0/product/get_products",
        'checkout' => "$paddleBaseCheckoutUrl/checkout/product/",
        'generatePayUrl' => "$paddleBaseUrl/api/2.0/product/generate_pay_link"
    ],
    'hookUrlSlack' => "https://hooks.slack.com/services/"
];
return $paddle;

