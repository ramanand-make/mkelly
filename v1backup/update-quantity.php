<?php
session_start();
require 'assets/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    $session_id = session_id();

    // First get the cart ID
    $cart_query = $conn->prepare("SELECT id FROM cart WHERE session_id = ?");
    $cart_query->bind_param("s", $session_id);
    $cart_query->execute();
    $cart_result = $cart_query->get_result();
    
    if ($cart_row = $cart_result->fetch_assoc()) {
        $cart_id = $cart_row['id'];
        
        // Update the quantity in cart_items
        $update_query = $conn->prepare("UPDATE cart_items SET quantity = ? WHERE cart_id = ? AND product_id = ?");
        $update_query->bind_param("iii", $quantity, $cart_id, $product_id);
        
        if ($update_query->execute()) {
            // Get the updated price and calculate totals
            $price_query = $conn->prepare("SELECT price FROM products WHERE id = ?");
            $price_query->bind_param("i", $product_id);
            $price_query->execute();
            $price_result = $price_query->get_result();
            $price_row = $price_result->fetch_assoc();
            $price = $price_row['price'];
            
            $item_total = $price * $quantity;
            
            // Calculate new subtotal
            $subtotal_query = $conn->prepare("
                SELECT SUM(ci.quantity * p.price) as subtotal
                FROM cart_items ci
                JOIN products p ON ci.product_id = p.id
                WHERE ci.cart_id = ?
            ");
            $subtotal_query->bind_param("i", $cart_id);
            $subtotal_query->execute();
            $subtotal_result = $subtotal_query->get_result();
            $subtotal_row = $subtotal_result->fetch_assoc();
            $subtotal = $subtotal_row['subtotal'] ?? 0;
            
            $shipping = 10.00; // Your shipping cost
            $total = $subtotal + $shipping;
            
            header('Content-Type: application/json');
            echo json_encode([
                'success' => true,
                'item_total' => number_format($item_total, 2),
                'subtotal' => number_format($subtotal, 2),
                'total' => number_format($total, 2)
            ]);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'error' => 'Failed to update quantity']);
        }
    } else {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'error' => 'Cart not found']);
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'error' => 'Invalid request']);
}
?>