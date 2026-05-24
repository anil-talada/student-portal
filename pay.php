<?php

session_start();

$_SESSION['form_data'] = $_POST;

require 'vendor/autoload.php';

use Razorpay\Api\Api;

$keyId = "rzp_test_SsU3XXZ7yur1iQ";
$keySecret = "AWQ2Ow15TeUs6P52GaIWWCLT";

$api = new Api($keyId, $keySecret);

$amount = $_POST['total_amount'] * 100;

$order = $api->order->create([
    'receipt' => 'receipt_' . rand(1000, 9999),
    'amount' => $amount,
    'currency' => 'INR'
]);

$orderId = $order['id'];

?>

<!DOCTYPE html>
<html>

<head>

    <title>Razorpay Payment</title>

    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

</head>

<body>

    <script>
        var options = {


            "key": "<?php echo $keyId; ?>",

            "amount": "<?php echo $amount; ?>",

            "currency": "INR",

            "name": "ABSA TECH FEST",

            "description": "Event Registration Payment",

            "order_id": "<?php echo $orderId; ?>",

            "method": {
                "upi": true,
                "card": true,
                "netbanking": true,
                "wallet": true
            },

            "handler": function(response) {

                window.location.href =
                    "success.php?payment_id=" + response.razorpay_payment_id;

            },

            "theme": {
                "color": "#3399cc"
            }

        };

        var rzp = new Razorpay(options);

        rzp.open();
    </script>

</body>

</html>