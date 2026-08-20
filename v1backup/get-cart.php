<?php
session_start();
header('Content-Type: application/json');

require 'assets/db.php';

// Use PHP's default session ID for cart identification (consistent with add-to-cart.php and cart.php)
$session_token = session_id();

// Get cart ID for the current session token
$cart_stmt = $conn->prepare("SELECT id FROM cart WHERE session_token = ?");
if (!$cart_stmt) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to prepare statement']);
    exit;
}
$cart_stmt->bind_param("s", $session_token);
$cart_stmt->execute();
$cart_result = $cart_stmt->get_result();

if ($row = $cart_result->fetch_assoc()) {
    $cart_id = $row['id'];
} else {
    // No cart found: return empty cart response with quantity 0
    echo json_encode([
        'status' => 'success',
        'items' => [],
        'subtotal' => 0,
        'total_quantity' => 0
    ]);
    exit;
}
$cart_stmt->close();

// Fetch cart items and join with products table for name and image_url
$sql = "
    SELECT ci.product_id, ci.quantity, ci.price, (ci.price * ci.quantity) AS total, p.name, p.image_url
    FROM cart_items ci
    JOIN products p ON ci.product_id = p.id
    WHERE ci.cart_id = ?
";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo json_encode(['status' => 'error', 'message' => 'Failed to prepare statement']);
    exit;
}
$stmt->bind_param("i", $cart_id);
$stmt->execute();
$result = $stmt->get_result();

$items = [];
$subtotal = 0;
$total_quantity = 0;
while ($row = $result->fetch_assoc()) {
    $items[] = [
        'product_id' => $row['product_id'],
        'name' => $row['name'],
        'image_url' => !empty($row['image_url']) ? $row['image_url'] : 'assets/images/default.jpg',
        'quantity' => (int)$row['quantity'],
        'price' => (float)$row['price'],
        'total' => (float)$row['total'],
    ];
    $subtotal += (float)$row['total'];
    $total_quantity += (int)$row['quantity'];
}

$stmt->close();
$conn->close();

echo json_encode([
    'status' => 'success',
    'items' => $items,
    'subtotal' => round($subtotal, 2),
    'total_quantity' => $total_quantity
]);
exit;