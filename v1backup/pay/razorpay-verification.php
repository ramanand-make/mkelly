<?php
session_start();
require_once '../razorpay-php/Razorpay.php';

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

require '../assets/db.php';  // DB connection/config

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: checkout');
    exit;
}

$input = $_POST;
$razorpay_payment_id = $input['razorpay_payment_id'] ?? '';
$razorpay_order_id = $input['razorpay_order_id'] ?? '';
$razorpay_signature = $input['razorpay_signature'] ?? '';
$order_id = intval($input['order_id'] ?? 0);

if (!$razorpay_payment_id || !$razorpay_order_id || !$razorpay_signature || !$order_id) {
    die("Invalid request");
}

$keyId = 'rzp_live_2eyU9c73EPESGc';       // Replace with your Razorpay Key ID
$keySecret = 'IthUYAuWaSseKWbVBTGp1gCc';  // Replace Your Razorpay Secret

$api = new Api($keyId, $keySecret);

$data = [
    'razorpay_order_id' => $razorpay_order_id,
    'razorpay_payment_id' => $razorpay_payment_id,
    'razorpay_signature' => $razorpay_signature
];


try {
    // Verify signature
    $api->utility->verifyPaymentSignature($data);

    // Signature valid, update order status to paid
    $stmt = $conn->prepare("UPDATE orders SET payment_status = 'paid', payment_id = ? WHERE id = ?");
    $stmt->bind_param("si", $razorpay_payment_id, $order_id);
    $stmt->execute();
    $stmt->close();

    // Redirect to success / order confirmation page
    header("Location: order-confirmation?order_id=" . $order_id);
    exit;

} catch (SignatureVerificationError $e) {
    // Signature verification failed
    error_log('Razorpay Signature Verification Failed: ' . $e->getMessage());

    // Optionally update order status to payment_failed
    $stmt = $conn->prepare("UPDATE orders SET payment_status = 'payment_failed' WHERE id = ?");
    $stmt->bind_param("i", $order_id);
    $stmt->execute();
    $stmt->close();

    // Redirect to failure page or show error
    header("Location: payment-failed?order_id=" . $order_id);
    exit;
}
// Sample: clear cart after successful payment verification

$session_token = session_id();

$cart_stmt = $conn->prepare("SELECT id FROM cart WHERE session_token = ?");
$cart_stmt->bind_param("s", $session_token);
$cart_stmt->execute();
$cart_result = $cart_stmt->get_result();

if ($cart_row = $cart_result->fetch_assoc()) {
    $cart_id = $cart_row['id'];

    $del_items = $conn->prepare("DELETE FROM cart_items WHERE cart_id = ?");
    $del_items->bind_param("i", $cart_id);
    $del_items->execute();
    $del_items->close();

    $del_cart = $conn->prepare("DELETE FROM cart WHERE id = ?");
    $del_cart->bind_param("i", $cart_id);
    $del_cart->execute();
    $del_cart->close();
}
$cart_stmt->close();