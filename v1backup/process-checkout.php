<?php
session_start();

// Razorpay SDK files inclusion & namespace import (adjust path to your SDK)
require_once 'razorpay-php/Razorpay.php';

use Razorpay\Api\Api;

require 'assets/db.php';
$conn->query("SET time_zone = '+05:30'");

date_default_timezone_set('Asia/Kolkata');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: checkout');
    exit;
}

// Sanitize and validate input helper function
function sanitize_input($data) {
    return htmlspecialchars(trim($data));
}

$first_name = sanitize_input($_POST['first_name'] ?? '');
$last_name = sanitize_input($_POST['last_name'] ?? '');
$name = trim($first_name . ' ' . $last_name);
$email = sanitize_input($_POST['email'] ?? '');
$address1 = sanitize_input($_POST['address1'] ?? '');
$city = sanitize_input($_POST['city'] ?? '');
$state = sanitize_input($_POST['state'] ?? '');
$pin = sanitize_input($_POST['pin'] ?? '');
$phone = sanitize_input($_POST['phone'] ?? '');
$paymentType = sanitize_input($_POST['paymentType'] ?? '');
$terms = isset($_POST['terms']) && $_POST['terms'] === 'yes' ? 1 : 0;

// Validate required fields
if (empty($name) || empty($email) || empty($address1) || empty($city) || empty($state) || empty($pin) || empty($phone)) {
    header('Location: checkout?error=missing_fields');
    exit;
}

if (!$terms) {
    header('Location: checkout?error=terms_not_accepted');
    exit;
}

$session_token = session_id();

//
// 1. Get cartId for this session
//
$cart_id = null;
$cart_stmt = $conn->prepare("SELECT id FROM cart WHERE session_token = ?");
$cart_stmt->bind_param("s", $session_token);
$cart_stmt->execute();
$cart_result = $cart_stmt->get_result();
if ($cart_row = $cart_result->fetch_assoc()) {
    $cart_id = $cart_row['id'];
}
$cart_stmt->close();

if (!$cart_id) {
    header('Location: checkout?error=empty_cart');
    exit;
}

//
// 2. Fetch shipping charge dynamically
//
$shipping_charge = 0.00;
$sp_result = $conn->query("SELECT shipping_charge FROM shipping_and_payment LIMIT 1");
if ($sp_result && $sp_result->num_rows > 0) {
    $sp = $sp_result->fetch_assoc();
    $shipping_charge = floatval($sp['shipping_charge']);
}

//
// 3. Fetch cart items for the order creation
//
$sql = "
    SELECT ci.quantity, ci.price, p.id AS product_id
    FROM cart_items ci
    JOIN products p ON ci.product_id = p.id
    WHERE ci.cart_id = ?
";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $cart_id);
$stmt->execute();
$result = $stmt->get_result();

$items = [];
$subtotal = 0;
while ($row = $result->fetch_assoc()) {
    $items[] = $row;
    $subtotal += $row['price'] * $row['quantity'];
}
$stmt->close();

if (count($items) === 0) {
    header('Location: checkout?error=empty_cart');
    exit;
}

// Calculate totals including shipping
$shipping = $shipping_charge;
$total_amount = $subtotal + $shipping;

//
// 4. Insert Order record
//
$order_insert = $conn->prepare("INSERT INTO orders 
    (cart_id, name, email, country, address1, city, state, pin, phone, paymentType, termsAccepted, payment_status, total_amount, shipping_charges, created_at, updated_at) 
    VALUES (?, ?, ?, 'India', ?, ?, ?, ?, ?, ?, ?, 'pending', ?, ?, NOW(), NOW())");

$order_insert->bind_param(
    "issssssssidd",
    $cart_id,
    $name,
    $email,
    $address1,
    $city,
    $state,
    $pin,
    $phone,
    $paymentType,
    $terms,
    $total_amount,
    $shipping
);

if (!$order_insert->execute()) {
    header('Location: checkout?error=db_error');
    exit;
}

$order_id = $conn->insert_id;
$order_insert->close();

//
// 5. Insert each item in order_items table
//
$item_insert = $conn->prepare("INSERT INTO order_items (order_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");

foreach ($items as $item) {
    $item_insert->bind_param("iiid", $order_id, $item['product_id'], $item['quantity'], $item['price']);
    if (!$item_insert->execute()) {
        // Optional rollback logic here if needed
        header('Location: checkout?error=db_error');
        exit;
    }
}
$item_insert->close();

//
// 6. Clear the cart after order is placed (uncomment if you want auto-clear)
//
/*
$del_items = $conn->prepare("DELETE FROM cart_items WHERE cart_id = ?");
$del_items->bind_param("i", $cart_id);
$del_items->execute();
$del_items->close();

$del_cart = $conn->prepare("DELETE FROM cart WHERE id = ?");
$del_cart->bind_param("i", $cart_id);
$del_cart->execute();
$del_cart->close();
*/

//
// 7. Razorpay integration for Online Payment
//
if ($paymentType === 'online payment') {
    $keyId = 'rzp_live_2eyU9c73EPESGc';       // Replace with your Razorpay Key ID
    $keySecret = 'IthUYAuWaSseKWbVBTGp1gCc';   // Replace with your Razorpay Secret

    $api = new Api($keyId, $keySecret);

    try {
        $razorpayOrder = $api->order->create([
            'receipt' => strval($order_id),
            'amount' => $total_amount * 100, // Razorpay expects amount in paise
            'currency' => 'INR',
            'payment_capture' => 1
        ]);
        $rzp_order_id = $razorpayOrder['id'];

        // Update order with Razorpay order ID
        $update = $conn->prepare("UPDATE orders SET razorpay_order_id = ? WHERE id = ?");
        $update->bind_param("si", $rzp_order_id, $order_id);
        $update->execute();
        $update->close();

        // Close connection before redirecting
        $conn->close();

      // Output HTML + JS to open Razorpay modal immediately
?>
<!DOCTYPE html>
<html>
<head>
    <title>Complete Payment</title>
    <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
</head>
<body>
    <h3>Redirecting to payment...</h3>

    <script>
    var options = {
        "key": "<?= htmlspecialchars($keyId) ?>",
        "amount": <?= intval($total_amount * 100) ?>, // amount in paise
        "currency": "INR",
        "name": "MKelly Biotech",
        "description": "Order #<?= intval($order_id) ?>",
        "order_id": "<?= htmlspecialchars($rzp_order_id) ?>",
        "handler": function (response) {
            // On success, submit form to verification script
            var form = document.createElement('form');
            form.method = "POST";
            form.action = "pay/razorpay-verification.php";

            var fields = {
                razorpay_payment_id: response.razorpay_payment_id,
                razorpay_order_id: response.razorpay_order_id,
                razorpay_signature: response.razorpay_signature,
                order_id: <?= intval($order_id) ?>
            };

            for (var key in fields) {
                var input = document.createElement('input');
                input.type = 'hidden';
                input.name = key;
                input.value = fields[key];
                form.appendChild(input);
            }

            document.body.appendChild(form);
            form.submit();
        },
        "modal": {
            "ondismiss": function() {
                // Handle user closing the payment modal, redirect back to checkout or order page
                window.location.href = "checkout?error=payment_cancelled";
            }
        }
    };

    var rzp1 = new Razorpay(options);
    rzp1.open();
    </script>
</body>
</html>
<?php

exit;
    } catch (Exception $e) {
        error_log("Razorpay Order Creation Error: " . $e->getMessage());
        header('Location: checkout?error=payment_gateway_error');
        $conn->close();
        exit;
    }
}


//
// 8. Redirect based on payment type (other than online payment)
//
switch ($paymentType) {

    case 'Cash On Delivery':
    default:
        // Clear the cart for COD orders
        $del_items = $conn->prepare("DELETE FROM cart_items WHERE cart_id = ?");
        $del_items->bind_param("i", $cart_id);
        $del_items->execute();
        $del_items->close();

        $del_cart = $conn->prepare("DELETE FROM cart WHERE id = ?");
        $del_cart->bind_param("i", $cart_id);
        $del_cart->execute();
        $del_cart->close();

        header('Location: order-confirmation?order_id=' . $order_id);
        $conn->close();
        exit;
}