<?php
    require "dbh.php";
    require "config.php";

    $payment_id = $statusMsg = '';
    $status = 'error';

    // Check stripe session for emptyness
    if (!empty($_GET['session_id'])) {
        $session_id = $_GET['session_id'];

        // Fetch transaction data from DB
        $sqlQ = "SELECT * FROM transactions WHERE stripe_checkout_session_id = ?;";
        $stmt = $conn->prepare($sqlQ);
        $stmt->bind_param("s", $db_session_id);
        $db_session_id = $session_id;
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Transaction details
            $transData = $result->fetch_assoc();
            $payment_id = $transData['id'];
            $transactionId = $transData['txn_id'];
            $paidAmount = $transData['paid_amount'];
            $paidCurrency = $transData['paid_amount_currency'];
            $payment_status = $transData['payment_status'];

            $customer_name = $transData['customer_name'];
            $customer_email = $transData['customer_email'];
            
            $status = 'success';
            $statusMsg = 'Your Payment has been Successful!';
        } else {
            require $_SERVER['DOCUMENT_ROOT'] . "/vendor/stripe/stripe-php/init.php";

            $stripe_secret_key = STRIPE_API_KEY;
            $stripe = new \Stripe\StripeClient($stripe_secret_key);

            try {
                $checkout_session = $stripe->checkout->sessions->retrieve($session_id);
            } catch (Exception $e) {
                $api_error = $e->getMessage();
            }

            if (empty($api_error) && $checkout_session) {
                // Get customer details
                $customer_details = $checkout_session->customer_details;

                // Retrieve details of the Payment Intent
                try {
                    $paymentIntent = $stripe->paymentIntents->retrieve($checkout_session->payment_intent);
                } catch (\Stripe\Exception\ApiErrorException $e) {
                    $api_error = $e->getMessage();
                }

                if (empty($api_error) && $paymentIntent) {
                    // Check whether the payment is success
                    if (!empty($paymentIntent) && $paymentIntent->status == 'succeeded') {
                        // Transaction details
                        $transactionId = $paymentIntent->id;
                        $paidAmount = $paymentIntent->amount;
                        $paidAmount = ($paidAmount/100);
                        $paidCurrency = $paymentIntent->currency;
                        $payment_status = $paymentIntent->status;

                        // Customer Info
                        $customer_name = $customer_email = '';
                        if (!empty($customer_details)) {
                            $customer_name = !empty($customer_details->name)?$customer_details->name:'';
                            $customer_email = !empty($customer_details->email)?$customer_details->email:'';
                        }

                        // Check if any transaction data is exists already with the same TXN ID
                        $sqlQ = "SELECT id FROM transactions WHERE txn_id = ?;";
                        $stmt = $conn->prepare($sqlQ);
                        $stmt->bind_param("s", $transactionId);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $prevRow = $result->fetch_assoc();

                        if (!empty($prevRow)) {
                            $payment_id = $prevRow['id'];
                        } else {
                            // Insert transaction data into the database 
                            $sqlQ = "INSERT INTO transactions (customer_name,customer_email,item_name,item_number,item_price,item_price_currency,paid_amount,paid_amount_currency,txn_id,payment_status,stripe_checkout_session_id,created,modified) VALUES (?,?,?,?,?,?,?,?,?,?,?,NOW(),NOW())"; 
                            $stmt = $conn->prepare($sqlQ); 
                            $stmt->bind_param("ssssdsdssss", $customer_name, $customer_email, $productName, $productId, $productPrice, $currency, $paidAmount, $paidCurrency, $transactionId, $payment_status, $session_id); 
                            $insert = $stmt->execute(); 
                            
                            if($insert){ 
                                $payment_id = $stmt->insert_id; 
                            } 
                        }

                        $status = 'success';
                        $statusMsg = 'Your Payment has been Successful!';
                    } else {
                        $statusMsg = 'Transaction has been Failed!';
                    }
                } else {
                    $statusMsg = "Unable to fetch the transaction details! $api_error";
                }
            } else {
                $statusMsg = "Invalid transaction! $api_error";
            }
        }
    } else {
        $statusMsg = "Invalid Request!";
    }
?>
<section>
    <div class="container">
        <div class="status">
            <?if (!empty($payment_id)) {?>
                <h2 class="<?php echo $status; ?>"><?php echo $statusMsg; ?></h2>
	
                <h4>Payment Information</h4>
                <p><b>Reference Number:</b> <?php echo $payment_id; ?></p>
                <p><b>Transaction ID:</b> <?php echo $transactionId; ?></p>
                <p><b>Paid Amount:</b> <?php echo $paidAmount.' '.$paidCurrency; ?></p>
                <p><b>Payment Status:</b> <?php echo $payment_status; ?></p>
	
                <h4>Customer Information</h4>
                <p><b>Name:</b> <?php echo $customer_name; ?></p>
                <p><b>Email:</b> <?php echo $customer_email; ?></p>
	
                <h4>Product Information</h4>
                <p><b>Name:</b> <?php echo $productName; ?></p>
                <p><b>Price:</b> <?php echo $productPrice.' '.$currency; ?></p>
            <?} else {?>
                <h2 class="error">Your Payment has been failed!</h2>
                <p class="error"><?php echo $statusMsg; ?></p>
            <?}?>
        </div>
    </div>
</section>