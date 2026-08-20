<?php
session_start();
require_once 'includes/functions.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $payment_id = $_POST['payment_id'] ?? '';
    $order_id = $_POST['order_id'] ?? '';
    $signature = $_POST['signature'] ?? '';
    $db_order_id = $_POST['db_order_id'] ?? '';

    if (empty($payment_id) || empty($order_id) || empty($db_order_id)) {
        echo json_encode(['status' => 'error', 'message' => 'Missing data']);
        exit;
    }

    $conn = getSashDBConnection();

    // Verify payment in DB
    $stmt = $conn->prepare("UPDATE orders SET payment_status = 'Success', payment_id = ? WHERE id = ?");
    $stmt->bind_param("si", $payment_id, $db_order_id);
    
    if ($stmt->execute()) {
        
        // Fetch order details for email
        $fetchStmt = $conn->prepare("SELECT * FROM orders WHERE id = ?");
        $fetchStmt->bind_param("i", $db_order_id);
        $fetchStmt->execute();
        $order = $fetchStmt->get_result()->fetch_assoc();
        
        // Send email to admin
        if ($order) {
            $to = "admin@yourdomain.com"; // User should change this to their admin email
            $subject = "New Order Received - Order #" . $order['id'];
            
            $message = "
            <html>
            <head>
            <title>New Order Received</title>
            </head>
            <body>
            <h2>Order Details (ID: " . $order['id'] . ")</h2>
            <p><strong>Name:</strong> " . $order['name'] . "</p>
            <p><strong>Email:</strong> " . $order['email'] . "</p>
            <p><strong>Phone:</strong> " . $order['phone'] . "</p>
            <p><strong>Total Amount:</strong> ₹" . $order['total_amount'] . "</p>
            <p><strong>Payment Status:</strong> " . $order['payment_status'] . " (Payment ID: " . $payment_id . ")</p>
            <h3>Shipping Address</h3>
            <p>" . $order['address1'] . ", " . $order['address2'] . "<br>
            " . $order['city'] . ", " . $order['state'] . " - " . $order['pincode'] . "</p>
            </body>
            </html>
            ";
            
            // Hostinger specific headers
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= "From: no-reply@" . $_SERVER['HTTP_HOST'] . "\r\n";
            
            mail($to, $subject, $message, $headers);
        }
        
        // Clear cart if direct buy wasn't used
        if (isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
