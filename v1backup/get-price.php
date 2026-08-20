<?php
session_start();
require 'assets/db.php';

// Get the product ID and quantity from the AJAX request
$productId = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
$quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 0;

if ($productId > 0 && $quantity > 0) {
    // Fetch the product price from the database
    $sql = "SELECT price FROM products WHERE id = ?";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param('i', $productId);
        $stmt->execute();
        $stmt->bind_result($price);
        $stmt->fetch();
        $stmt->close();

        // Calculate the total price
        $totalPrice = $price * $quantity;
        echo number_format($totalPrice, 2); // Return the total price as a formatted number
    } else {
        echo 'Error fetching product price';
    }
} else {
    echo 'Invalid input';
}

$conn->close();
?>
