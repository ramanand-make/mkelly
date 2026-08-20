<?php
require_once '../assets/db.php';

$order_id = $_GET['order_id'] ?? 0;
$order_id = (int)$order_id;

if ($order_id <= 0) {
    die("Invalid order ID");
}

// Fetch order details (optional, to personalize message)
$stmt = $conn->prepare("SELECT id, name, total_amount FROM orders WHERE id = ?");
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();
$stmt->close();

if (!$order) {
    die("Order not found");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment Failed</title>
    <style>
        body { font-family: Arial, sans-serif; max-width:600px; margin: 40px auto; }
        .container { border: 1px solid #f44336; padding: 20px; border-radius: 5px; background-color: #ffe6e6; }
        h2 { color: #f44336; }
        a.retry-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        a.retry-button:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Payment Failed</h2>
        <p>Sorry, your payment for order <strong>#<?= htmlspecialchars($order['id']) ?></strong> amounting to <strong>₹<?= number_format($order['total_amount'], 2) ?></strong> could not be processed.</p>
        <p>Please try again or use a different payment method.</p>
        <a class="retry-button" href="razorpay-payment?order_id=<?= htmlspecialchars($order['id']) ?>">Retry Payment</a>
    </div>
</body>
</html>