<?php
    // session_start();
    // require 'functions.php';
    require $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/vendor/stripe/stripe-php/init.php";
    require 'config.php';

    $stripe_secret_key = STRIPE_API_KEY;
    \Stripe\Stripe::setApiKey($stripe_secret_key);

    try {
        $checkout_session = \Stripe\Checkout\Session::create([
            "mode" => "payment",
            // "payment_method_types" => ["card"],
            "success_url" => STRIPE_SUCCESS_URL . "?session_id={CHECKOUT_SESSION_ID}",
            "cancel_url" => STRIPE_CANCEL_URL,
            // "locale" => "ru",
            "line_items" => [
                [
                    "quantity" => 1,
                    "price_data" => [
                        "currency" => $currency,
                        "unit_amount" => $productPrice * 100,
                        "product_data" => [
                            "name" => "Application",
                            "metadata" => [
                                "pro_id" => "01"
                            ]
                        ]
                    ]
                ]
            ]
        ]);
    } catch (Excetpion $e) {
        $api_error = $e->getMessage();
    }

    http_response_code(303);
    header('Location: ' . $checkout_session->url);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Auth</title>
</head>
<body>
    <script src="https://js.stripe.com/v3/"></script>
</body>
</html>