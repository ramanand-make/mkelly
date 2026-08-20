<?php
session_start();
require_once __DIR__ . '/admin/config/database.php';

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

$action = isset($_POST['action']) ? $_POST['action'] : '';
$conn = getSashDBConnection();

switch ($action) {
    case 'add':
        $id = (int)$_POST['id'];
        $name = $_POST['name'];
        $image = $_POST['image'];
        $qty = isset($_POST['qty']) ? (int)$_POST['qty'] : 1;
        $ratti = isset($_POST['ratti']) ? (int)$_POST['ratti'] : 0;

        // Fetch prices from DB to ensure accuracy
        $original_price = 0;
        $sale_price = 0;
        $is_ratti = '0';
        if ($conn) {
            $stmt = $conn->prepare("SELECT price, sale_price, is_ratti FROM product WHERE id = ?");
            if ($stmt) {
                $stmt->bind_param("i", $id);
                $stmt->execute();
                $res = $stmt->get_result();
                if ($row = $res->fetch_assoc()) {
                    $original_price = (float)$row['price'];
                    $sale_price = (float)$row['sale_price'];
                    $is_ratti = $row['is_ratti'];
                }
            }
        }
        
        // Current price is sale_price if available, else original_price
        $current_price = ($sale_price > 0) ? $sale_price : $original_price;

        $cart_id = (string)$id;
        if ($is_ratti === '1' && $ratti >= 3) {
            $current_price = ($current_price / 3) * $ratti;
            $original_price = ($original_price / 3) * $ratti;
            $name = $name . " - " . $ratti . " Ratti";
            $cart_id = $id . '_' . $ratti;
        }

        // Fallback if DB fetch fails
        if ($current_price == 0 && isset($_POST['price'])) {
            $current_price = (float)$_POST['price'];
            $original_price = $current_price; // No discount known
        }

        if (isset($_SESSION['cart'][$cart_id])) {
            $_SESSION['cart'][$cart_id]['qty'] += $qty;
            $_SESSION['cart'][$cart_id]['price'] = $current_price;
            $_SESSION['cart'][$cart_id]['original_price'] = $original_price;
        } else {
            $_SESSION['cart'][$cart_id] = [
                'id' => $cart_id,
                'real_id' => $id,
                'name' => $name,
                'price' => $current_price,
                'original_price' => $original_price,
                'image' => $image,
                'qty' => $qty,
                'qty' => $qty,
                'ratti' => $ratti,
                'is_ratti' => $is_ratti
            ];
        }
        echo json_encode(['status' => 'success', 'cart' => $_SESSION['cart'], 'count' => array_sum(array_column($_SESSION['cart'], 'qty'))]);
        break;

    case 'update':
        $id = $_POST['id'];
        $qty = (int)$_POST['qty'];
        if ($qty > 0) {
            $_SESSION['cart'][$id]['qty'] = $qty;
        } else {
            unset($_SESSION['cart'][$id]);
        }
        echo json_encode(['status' => 'success', 'cart' => $_SESSION['cart'], 'count' => array_sum(array_column($_SESSION['cart'], 'qty'))]);
        break;

    case 'update_ratti':
        $old_id = $_POST['id'];
        $new_ratti = (int)$_POST['ratti'];
        
        if (isset($_SESSION['cart'][$old_id])) {
            $item = $_SESSION['cart'][$old_id];
            $real_id = $item['real_id'];
            $qty = $item['qty'];
            
            // Fetch prices from DB to recalculate
            $original_price = 0;
            $sale_price = 0;
            if ($conn) {
                $stmt = $conn->prepare("SELECT price, sale_price, product_name FROM product WHERE id = ?");
                if ($stmt) {
                    $stmt->bind_param("i", $real_id);
                    $stmt->execute();
                    $res = $stmt->get_result();
                    if ($row = $res->fetch_assoc()) {
                        $original_price = (float)$row['price'];
                        $sale_price = (float)$row['sale_price'];
                        $base_name = $row['product_name'];
                    }
                }
            }
            
            $current_price = ($sale_price > 0) ? $sale_price : $original_price;
            
            // Calculate new price based on new ratti
            $current_price = ($current_price / 3) * $new_ratti;
            $original_price = ($original_price / 3) * $new_ratti;
            $new_name = $base_name . " - " . $new_ratti . " Ratti";
            $new_cart_id = $real_id . '_' . $new_ratti;
            
            unset($_SESSION['cart'][$old_id]);
            
            if (isset($_SESSION['cart'][$new_cart_id])) {
                $_SESSION['cart'][$new_cart_id]['qty'] += $qty;
                $_SESSION['cart'][$new_cart_id]['price'] = $current_price;
                $_SESSION['cart'][$new_cart_id]['original_price'] = $original_price;
            } else {
                $item['id'] = $new_cart_id;
                $item['name'] = $new_name;
                $item['price'] = $current_price;
                $item['original_price'] = $original_price;
                $item['ratti'] = $new_ratti;
                $_SESSION['cart'][$new_cart_id] = $item;
            }
        }
        echo json_encode(['status' => 'success', 'cart' => $_SESSION['cart'], 'count' => array_sum(array_column($_SESSION['cart'], 'qty'))]);
        break;

    case 'remove':
        $id = $_POST['id'];
        unset($_SESSION['cart'][$id]);
        echo json_encode(['status' => 'success', 'cart' => $_SESSION['cart'], 'count' => array_sum(array_column($_SESSION['cart'], 'qty'))]);
        break;

    case 'get':
        echo json_encode(['status' => 'success', 'cart' => $_SESSION['cart'], 'count' => array_sum(array_column($_SESSION['cart'], 'qty'))]);
        break;
     case 'clear':
        $_SESSION['cart'] = [];
        echo json_encode(['status' => 'success', 'cart' => $_SESSION['cart'], 'count' => 0]);
        break;

    default:
        echo json_encode(['status' => 'error', 'message' => 'Invalid action']);
        break;
}
