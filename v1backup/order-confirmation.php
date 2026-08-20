<?php
session_start();

require 'assets/db.php';
date_default_timezone_set('Asia/Kolkata');

$order_id = isset($_GET['order_id']) ? (int)$_GET['order_id'] : 0;
if ($order_id <= 0) {
    die("Invalid order ID.");
}

// Fetch order info from the orders table
$stmt = $conn->prepare("SELECT name, email, total_amount, shipping_charges, payment_status,order_status, created_at FROM orders WHERE id = ?");
$stmt->bind_param("i", $order_id);
$stmt->execute();
$result = $stmt->get_result();

if ($order = $result->fetch_assoc()) {
    // Order exists, show confirmation
} else {
    die("Order not found.");
}

$stmt->close();
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation - Mkelly Biotech</title>
    <link rel="shortcut icon" href="assets/images/parts/favicon.png" />
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/fontawesome/css/all.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f4f8fb;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin-top: 50px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-size: 1.5rem;
            text-align: center;
            padding: 15px;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .card-body {
            background-color: #ffffff;
            padding: 25px;
            border-bottom-left-radius: 10px;
            border-bottom-right-radius: 10px;
        }

        .order-status {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .order-total {
            font-size: 1.3rem;
            color: #007bff;
        }

        .btn-primary {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-primary:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .icon {
            font-size: 5rem;
            color: #007bff;
            margin-bottom: 20px;
        }

        .order-details {
            font-size: 1.1rem;
        }

        .order-info {
            margin-top: 20px;
            font-size: 1.1rem;
        }

        .separator {
            margin: 20px 0;
            height: 1px;
            background-color: #ddd;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Order Confirmation Card -->
        <div class="card">
            <div class="card-header">
                <i class="fas fa-check-circle icon"></i>
                <h3>Thank You for Your Order!</h3>
            </div>
            <div class="card-body">
                <p class="order-details">Hi <strong><?php echo htmlspecialchars($order['name']); ?></strong>,</p>
                <p class="order-details">Your order (Order ID: <strong><?php echo $order_id; ?></strong>) has been received and is currently <strong class="order-status"><?php echo htmlspecialchars($order['order_status']); ?></strong>.</p>
                <p class="order-details">Order total: <span class="order-total">₹<?php echo number_format($order['total_amount'], 2); ?></span> (including shipping ₹<?php echo number_format($order['shipping_charges'], 2); ?>)</p>
                <p class="order-info">Order placed on: <?php echo date('d M Y', strtotime($order['created_at'])); ?></p>
                <p class="order-info">We will notify you via email at <strong><?php echo htmlspecialchars($order['email']); ?></strong> about the next steps.</p>

                <div class="separator"></div>

                <a href="https://www.mkellybiotech.com/" class="btn btn-primary w-100">Continue Shopping</a>
            </div>
        </div>
    </div>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>
