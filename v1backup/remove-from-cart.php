<?php
session_start();
require 'assets/db.php';
if (isset($_GET['id'])) {
    $item_id = (int)$_GET['id'];
    
    // Verify the item belongs to the current user's cart
    $verify_query = $conn->prepare("
        SELECT ci.id 
        FROM cart_items ci
        JOIN cart c ON ci.cart_id = c.id
        WHERE ci.id = ? AND c.session_token = ?
    ");
    $session_token = session_id();
    $verify_query->bind_param("is", $item_id, $session_token);
    $verify_query->execute();
    $verify_result = $verify_query->get_result();
    
    if ($verify_result->num_rows > 0) {
        $delete_query = $conn->prepare("DELETE FROM cart_items WHERE id = ?");
        $delete_query->bind_param("i", $item_id);
        $delete_query->execute();
        $delete_query->close();
    }
    
    $verify_query->close();
}

header('Location: cart');
exit();
?>