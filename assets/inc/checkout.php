<?php
    session_start();
    require 'functions.php';
    require $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";
    require $_SERVER['DOCUMENT_ROOT'] . "/vendor/stripe/stripe-php/init.php";
    require 'config.php';

    // $stripe_publishable_key = STRIPE_PUBLISHABLE_KEY;
    $stripe_secret_key = STRIPE_API_KEY;
    \Stripe\Stripe::setApiKey($stripe_secret_key);

    // Default response
    // $response = array(
    //     'status' => 0,
    //     'error' => array(
    //         'message' => 'Invalid Request!'
    //     )
    // );

    // Get request data
    // if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //     $input = file_get_contents('php://input');
    //     $request = json_decode($input);
    // }

    // if(json_last_error() !== JSON_ERROR_NONE) {
    //     http_response_code(400);
    //     echo json_encode($response);
    //     exit;
    // }

    // if (!empty($request->createCheckoutSession)) {
        try {
            $checkout_session = \Stripe\Checkout\Session::create([
                "mode" => "payment",
                // "payment_method_types" => ["card"],
                "success_url" => STRIPE_CANCEL_URL,
                "cancel_url" => STRIPE_CANCEL_URL,
                // "locale" => "ru",
                "line_items" => [
                    [
                        "quantity" => 1,
                        "price_data" => [
                            "currency" => $currency,
                            "unit_amount" => $productPrice * 100,
                            "product_data" => [
                                "name" => $productName,
                                "metadata" => [
                                    'pro_id' => $productId
                                ]
                            ]
                        ]
                    ]
                ]
            ]);
        } catch (Excetpion $e) {
            $api_error = $e->getMessage();
        }

        // if (empty($api_error) && $checkout_session) {
        //     $response = array(
        //         'status' => 1,
        //         'message' => "Checkout session created successfully!",
        //         'sessionId' => $checkout_session->id
        //     );
        // } else {
        //     $response = array(
        //         'status' => 0,
        //         'error' => array(
        //             'message' => 'Checkout session creation failed! '.$api_error
        //         )
        //     );
        // }
    // }

    // Return response
    // echo json_encode($response);

    http_response_code(303);

    $balance = intval(getUserBalance($_SESSION['userId']));
    $paymentAmount = intval($checkout_session->amount_total) / 100;
    updateUserBalance($_SESSION['userId'], $balance, $paymentAmount);

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