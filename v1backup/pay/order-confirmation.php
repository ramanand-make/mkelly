<?php
require_once '../assets/db.php'; // Your DB connection

$order_id = $_GET['order_id'] ?? 0;
$order_id = (int)$order_id;

if ($order_id <= 0) {
    die("Invalid order ID");
}

// Fetch order details
$stmt = $conn->prepare("SELECT id, name, email, payment_status, total_amount, paymentType, created_at FROM orders WHERE id = ?");
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();
$order = $result->fetch_assoc();
$stmt->close();

if (!$order) {
    die("Order not found");
}
date_default_timezone_set('Asia/Kolkata');
?>

<!DOCTYPE html>
<html>
<head>
<link rel="shortcut icon" href="../assets/images/parts/favicon.png" />
    <title>Order Confirmation</title>
    <style>
        body { font-family: Arial, sans-serif; max-width:600px; margin: 40px auto; }
        .container { border: 1px solid #ddd; padding: 20px; border-radius: 5px; }
        h2 { color: #4CAF50; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Thank you for your order!</h2>
        <p><strong>Order ID:</strong> <?= htmlspecialchars($order['id']) ?></p>
        <p><strong>Name:</strong> <?= htmlspecialchars($order['name']) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($order['email']) ?></p>
        <p><strong>Payment Status:</strong> <?= htmlspecialchars(ucfirst($order['payment_status'])) ?></p>
        <p><strong>Total Amount Paid:</strong> ₹<?= number_format($order['total_amount'], 2) ?></p>
        <p><strong>Payment Method:</strong> <?= htmlspecialchars($order['paymentType'] ?? 'N/A') ?></p>
        <p><strong>Order Date:</strong> <?php echo date('d M Y', strtotime($order['created_at'])); ?></p>

        <p>Your payment was successful. We will notify you when your order is shipped.</p>
        <a href="https://www.mkellybiotech.com/">Back to Home</a>
    </div>
</body>
</html>