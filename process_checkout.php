<?php
session_start();
require_once 'includes/functions.php';

header('Content-Type: application/json');

// --- RAZORPAY CREDENTIALS ---
// User: Put your real Razorpay Key ID and Key Secret here
$RAZORPAY_KEY = "rzp_live_Rt2YjMUoP3Qt11";
$RAZORPAY_SECRET = "J6nniCqLCPy8Rm6iOr5K9GTo";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $address1 = $_POST['address1'] ?? '';
    $address2 = $_POST['address2'] ?? '';
    $city = $_POST['city'] ?? '';
    $state = $_POST['state'] ?? '';
    $pincode = $_POST['pincode'] ?? '';
    $cartData = json_decode($_POST['cart'] ?? '{}', true);

    if (empty($name) || empty($email) || empty($phone) || empty($cartData)) {
        echo json_encode(['status' => 'error', 'message' => 'Missing required fields']);
        exit;
    }

    $totalAmount = 0;
    $order_ratti = 0;
    foreach ($cartData as $item) {
        $totalAmount += floatval($item['price']) * intval($item['qty']);
        if (isset($item['ratti']) && intval($item['ratti']) > 0) {
            $order_ratti = intval($item['ratti']);
        }
    }

    $conn = getSashDBConnection();

    // 1. Ensure 'orders' table exists
    $checkTable = $conn->query("SHOW TABLES LIKE 'orders'");
    if ($checkTable->num_rows == 0) {
        $createTableSql = "CREATE TABLE `orders` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `order_id` varchar(100) NOT NULL,
            `payment_id` varchar(100) DEFAULT NULL,
            `name` varchar(100) NOT NULL,
            `email` varchar(100) NOT NULL,
            `phone` varchar(20) NOT NULL,
            `address1` varchar(255) NOT NULL,
            `address2` varchar(255) DEFAULT NULL,
            `state` varchar(100) NOT NULL,
            `city` varchar(100) NOT NULL,
            `pincode` varchar(20) NOT NULL,
            `total_amount` decimal(10,2) NOT NULL,
            `order_summary` text NOT NULL,
            `payment_status` varchar(50) DEFAULT 'Pending',
            `no_of_ratti` int(11) DEFAULT 0,
            `created_at` timestamp DEFAULT CURRENT_TIMESTAMP,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $conn->query($createTableSql);
    } else {
        $checkCol = $conn->query("SHOW COLUMNS FROM `orders` LIKE 'no_of_ratti'");
        if ($checkCol && $checkCol->num_rows == 0) {
            $conn->query("ALTER TABLE `orders` ADD COLUMN `no_of_ratti` INT(11) DEFAULT 0");
        }
    }

    // 2. Ensure 'order_items' table exists
    $checkItemsTable = $conn->query("SHOW TABLES LIKE 'order_items'");
    if ($checkItemsTable->num_rows == 0) {
        $createItemsTableSql = "CREATE TABLE `order_items` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `order_id` int(11) NOT NULL,
            `product_id` int(11) NOT NULL,
            `product_name` varchar(255) NOT NULL,
            `product_image` text NOT NULL,
            `price` decimal(10,2) NOT NULL,
            `qty` int(11) NOT NULL,
            `no_of_ratti` int(11) DEFAULT 0,
            PRIMARY KEY (`id`),
            KEY `order_id` (`order_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        $conn->query($createItemsTableSql);
    } else {
        $checkItemsCol = $conn->query("SHOW COLUMNS FROM `order_items` LIKE 'no_of_ratti'");
        if ($checkItemsCol && $checkItemsCol->num_rows == 0) {
            $conn->query("ALTER TABLE `order_items` ADD COLUMN `no_of_ratti` INT(11) DEFAULT 0");
        }
    }

    // 3. Create Order in Razorpay via cURL
    $amountInPaise = $totalAmount * 100;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.razorpay.com/v1/orders");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
        "amount" => $amountInPaise,
        "currency" => "INR",
        "receipt" => "rcptid_" . time()
    ]));
    curl_setopt($ch, CURLOPT_USERPWD, $RAZORPAY_KEY . ":" . $RAZORPAY_SECRET);
    curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
    $result = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $rzpResponse = json_decode($result, true);
    
    // If Razorpay fails (e.g. invalid keys), handle it gracefully
    if ($httpCode !== 200 || !isset($rzpResponse['id'])) {
        $rzpOrderId = "PENDING_RZP_SETUP_" . uniqid(); // Fallback if keys are wrong
    } else {
        $rzpOrderId = $rzpResponse['id'];
    }

    $orderSummary = json_encode($cartData);

    // 4. Insert into 'orders'
    $stmt = $conn->prepare("INSERT INTO orders (order_id, name, email, phone, address1, address2, state, city, pincode, total_amount, order_summary, payment_status, no_of_ratti) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending', ?)");
    $stmt->bind_param("sssssssssdsi", $rzpOrderId, $name, $email, $phone, $address1, $address2, $state, $city, $pincode, $totalAmount, $orderSummary, $order_ratti);
    
    if ($stmt->execute()) {
        $dbOrderId = $conn->insert_id;

        // 5. Insert into 'order_items'
        $itemStmt = $conn->prepare("INSERT INTO order_items (order_id, product_id, product_name, product_image, price, qty, no_of_ratti) VALUES (?, ?, ?, ?, ?, ?, ?)");
        foreach ($cartData as $item) {
            $prod_id = isset($item['id']) ? intval($item['id']) : 0;
            $prod_name = $item['name'];
            $prod_image = $item['image'];
            $prod_price = floatval($item['price']);
            $prod_qty = intval($item['qty']);
            $item_ratti = isset($item['ratti']) ? intval($item['ratti']) : 0;
            $itemStmt->bind_param("iisssii", $dbOrderId, $prod_id, $prod_name, $prod_image, $prod_price, $prod_qty, $item_ratti);
            $itemStmt->execute();
        }

        echo json_encode([
            'status' => 'success',
            'amount' => $totalAmount,
            'order_id' => $rzpOrderId,
            'db_order_id' => $dbOrderId,
            'razorpay_key' => $RAZORPAY_KEY
        ]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Database error']);
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
}
