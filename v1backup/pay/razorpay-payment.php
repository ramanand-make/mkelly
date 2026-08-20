<?php
session_start();
require '../assets/db.php'; // DB connection, config etc.

$order_id = $_GET['order_id'] ?? null;
if (!$order_id) {
    die("Invalid order");
}

// Fetch order info
$stmt = $conn->prepare("SELECT total_amount, name, email, razorpay_order_id FROM orders WHERE id=?");
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();
$stmt->close();

if (!$order || !$order['razorpay_order_id']) {
    die("Order not found or Razorpay order id missing.");
}

$amount = $order['total_amount'];  // In INR, decimal format
$razorpayOrderId = $order['razorpay_order_id'];
$name = htmlspecialchars($order['name']);
$email = htmlspecialchars($order['email']);

// Your Razorpay key ID
$keyId = 'rzp_live_2eyU9c73EPESGc'; 

?>
<!DOCTYPE html>
<html>
<head>
    <title>Pay with Razorpay</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <h3>Hello, <?= $name ?></h3>
    <p>Amount to pay: ₹<?= number_format($amount, 2) ?></p>
    
    <button id="rzp-button">Pay Now</button>

    <script>
    var options = {
        "key": "<?= $keyId ?>",
        "amount": <?= $amount * 100 ?>, // Amount in paise
        "currency": "INR",
        "name": "MKelly Biotech",
        "description": "Order #<?= $order_id ?>",
        "order_id": "<?= $razorpayOrderId ?>",
        "handler": function (response) {
            // On payment success, submit data to verification page
            var form = document.createElement('form');
            form.method = "POST";
            form.action = "razorpay-verification.php";

            var fields = {
                razorpay_payment_id: response.razorpay_payment_id,
                razorpay_order_id: response.razorpay_order_id,
                razorpay_signature: response.razorpay_signature,
                order_id: <?= $order_id ?>
            };

            for (var name in fields) {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = name;
                input.value = fields[name];
                form.appendChild(input);
            }

            document.body.appendChild(form);
            form.submit();
        },
        "prefill": {
            "name": "<?= $name ?>",
            "email": "<?= $email ?>"
        },
        "theme": {
            "color": "#3399cc"
        }
    };

    var rzp1 = new Razorpay(options);
    document.getElementById('rzp-button').onclick = function(e){
        rzp1.open();
        e.preventDefault();
    }
    </script>
</body>
</html>