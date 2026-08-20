<?php
session_start();

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'])) {
    $product_id = (int)$_POST['product_id'];

    // Read quantity parameter, default to 1 if not provided or invalid
    $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : 1;
    if ($quantity < 1) $quantity = 1;

require 'assets/db.php';
    // Use PHP session ID as session_token for consistency
    $session_token = session_id();

    // Get or create cart
    $cart_stmt = $conn->prepare("SELECT id FROM cart WHERE session_token = ?");
    $cart_stmt->bind_param("s", $session_token);
    $cart_stmt->execute();
    $cart_result = $cart_stmt->get_result();

    if ($row = $cart_result->fetch_assoc()) {
        $cart_id = $row['id'];
    } else {
        $create_cart = $conn->prepare("INSERT INTO cart (session_token, created_at, updated_at) VALUES (?, NOW(), NOW())");
        $create_cart->bind_param("s", $session_token);
        $create_cart->execute();
        $cart_id = $create_cart->insert_id;
        $create_cart->close();
    }
    $cart_stmt->close();

    // Get product price
    $product_stmt = $conn->prepare("SELECT price FROM products WHERE id = ?");
    $product_stmt->bind_param("i", $product_id);
    $product_stmt->execute();
    $product_result = $product_stmt->get_result();
    $product = $product_result->fetch_assoc();
    $product_stmt->close();

    if (!$product) {
        echo json_encode(['status' => 'error', 'message' => 'Product not found']);
        $conn->close();
        exit;
    }

    // Check if product already in cart
    $check_stmt = $conn->prepare("SELECT id, quantity FROM cart_items WHERE cart_id = ? AND product_id = ?");
    $check_stmt->bind_param("ii", $cart_id, $product_id);
    $check_stmt->execute();
    $check_result = $check_stmt->get_result();

    $price = (float)$product['price'];

    if ($item = $check_result->fetch_assoc()) {
        // Update quantity by adding posted quantity
        $current_quantity = (int)$item['quantity'];
        $new_quantity = $current_quantity + $quantity;

        $update_stmt = $conn->prepare("UPDATE cart_items SET quantity = ?, price = ? WHERE id = ?");
        $update_stmt->bind_param("idi", $new_quantity, $price, $item['id']);
        $update_stmt->execute();
        $update_stmt->close();
    } else {
        // Insert new cart item with posted quantity
        $insert_stmt = $conn->prepare("INSERT INTO cart_items (cart_id, product_id, quantity, price) VALUES (?, ?, ?, ?)");
        $insert_stmt->bind_param("iiid", $cart_id, $product_id, $quantity, $price);
        $insert_stmt->execute();
        $insert_stmt->close();
    }

    $check_stmt->close();
    $conn->close();

    echo json_encode(['status' => 'success', 'message' => 'Product added to cart']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}