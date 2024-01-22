<?php
    // // Tuned in Stripe account to be triggered (optional) 

    // require 'functions.php';
    // require $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

    // $stripe = new \Stripe\StripeClient('sk_test_51OVRG8GvRicPy0MgNNhaddts2U0eTBk7UFzV6Z0cPmvlWLrwaf3io8eSvGROI8CB7jBTTmJMUxh2QutsWUpY8OFj00bXrYxO5T');
    // $endpoint_secret = 'whsec_cbc9056d0ea0e7fafdb4197679e31b2aecda67914d77f416449c5c61715aa540';

    // $payload = @file_get_contents("php://input");
    // file_put_contents('event_json.txt', $payload);
    // $sig_header = $_SERVER["HTTP_STRIPE_SIGNATURE"];
    // $event = null;

    // try {
    //     $event = \Stripe\Webhook::constructEvent(
    //       $payload, $sig_header, $endpoint_secret
    //     );
    // } catch(\UnexpectedValueException $e) {
    //     // Invalid payload
    //     http_response_code(400);
    //     exit();
    // } catch(\Stripe\Exception\SignatureVerificationException $e) {
    //       // Invalid signature
    //       http_response_code(400);
    //       exit();
    // }

    // // Handle the event
    // switch ($event->type) {
    //     // case 'payment_intent.payment_failed':
    //     //     http_response_code(200);
    //     // case 'payment_intent.canceled':
    //     //     http_response_code(200);
    //     // case 'payment_intent.created':
    //     //     http_response_code(200);
    //     // case 'charge.succeeded':
    //     //     http_response_code(200);
    //     case 'payment_intent.succeeded':
    //         $balance = intval(getUserBalance(51));
    //         $paymentIntent = $event->data->object;
    //         $paymentAmount = intval($paymentIntent->amount_received / 100);
    //         updateUserBalance(51, $balance, $paymentAmount);
    //         http_response_code(200);
    //         break;
    //     // ... handle other event types
    //     default:
    //         // Unexpected event type
    //         echo 'Received unknown event type ' . $event->type;
    //         http_response_code(400);
    //         exit();
    // }
?>