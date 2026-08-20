<?php
session_start();
require 'assets/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['update_cart']) && isset($_POST['quantity'])) {
        foreach ($_POST['quantity'] as $item_id => $quantity) {
            $quantity = (int)$quantity;
            if ($quantity > 0) {
                $update_query = $conn->prepare("UPDATE cart_items SET quantity = ? WHERE id = ?");
                $update_query->bind_param("ii", $quantity, $item_id);
                $update_query->execute();
                $update_query->close();
            }
        }
    } elseif (isset($_POST['clear_cart'])) {
        $session_token = session_id();
        $clear_query = $conn->prepare("DELETE ci FROM cart_items ci JOIN cart c ON ci.cart_id = c.id WHERE c.session_token = ?");
        $clear_query->bind_param("s", $session_token);
        $clear_query->execute();
        $clear_query->close();

        $del_cart = $conn->prepare("DELETE FROM cart WHERE session_token = ?");
        $del_cart->bind_param("s", $session_token);
        $del_cart->execute();
        $del_cart->close();
    }
}

header('Location: cart');
exit();
?>