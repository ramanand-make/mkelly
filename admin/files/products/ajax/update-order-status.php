<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header('Content-Type: application/json');

require_once __DIR__ . '/../../../../includes/functions.php';

$conn = getSashDBConnection();

if (!$conn) {
    echo json_encode(['success' => false, 'message' => 'Database connection failed']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['success' => false, 'message' => 'Invalid request']);
    exit;
}

$orderId = ($_POST['order_id'] ?? 0);
$orderStatus = trim($_POST['order_status'] ?? '');

$allowedStatuses = ['pending', 'packed', 'shipped', 'delivered', 'cancelled'];

if (!$orderId) {
    echo json_encode(['success' => false, 'message' => 'Invalid order ID']);
    exit;
}

if (!in_array($orderStatus, $allowedStatuses, true)) {
    echo json_encode(['success' => false, 'message' => 'Invalid status']);
    exit;
}

// Make sure order_status column exists in the orders table
$checkCol = $conn->query("SHOW COLUMNS FROM orders LIKE 'order_status'");
if ($checkCol->num_rows == 0) {
    $conn->query("ALTER TABLE orders ADD COLUMN order_status VARCHAR(50) DEFAULT 'pending'");
}

$stmt = $conn->prepare("UPDATE orders SET order_status = ? WHERE id = ?");
$stmt->bind_param("si", $orderStatus, $orderId);

if ($stmt->execute()) {
    echo json_encode(['success' => true, 'message' => 'Order status updated successfully']);
} else {
    echo json_encode(['success' => false, 'message' => 'Failed to update order status']);
}

$stmt->close();
$conn->close();
