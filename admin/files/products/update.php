<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once dirname(__DIR__, 2) . "/app/init.php";
require_once APP_ROOT . "/app/auth.php";
requireAdminLogin();
require_once APP_ROOT . "/app/module-data.php";
require_once APP_ROOT . "/../includes/functions.php";
function generate_slug($string)
{
    $slug = strtolower(trim($string));
    $slug = preg_replace('/[^a-z0-9-]+/', '-', $slug);
    $slug = preg_replace('/-+/', '-', $slug);
    return trim($slug, '-');
}
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: " . file_url("products/list.php"));
    exit();
}

$conn = getSashDBConnection();
if (!$conn) {
    header("Location: " . file_url("products/list.php") . "?error=db_connection");
    exit();
}

$id = intval($_POST['id']);
$name = $conn->real_escape_string($_POST['name']);
$slug = generate_slug($name);
$description = $conn->real_escape_string($_POST['description'] ?? '');
$gotanyquestion = $conn->real_escape_string($_POST['gotanyquestion'] ?? '');
$returnexchange = $conn->real_escape_string($_POST['returnexchange'] ?? '');
$disclaimer = $conn->real_escape_string($_POST['disclaimer'] ?? '');

$price = floatval($_POST['price']);
$product_review = floatval($_POST['review_rating']);
$sale_price = !empty($_POST['sale_price']) ? floatval($_POST['sale_price']) : "NULL";
// $stock = intval($_POST['stock']);
$status = intval($_POST['status']);
$ratti = intval($_POST['ratti_status']);
$categories = isset($_POST['categories']) ? $_POST['categories'] : [];

// Process deleting selected images
if (!empty($_POST['delete_images'])) {
    $selectCols = [];
    foreach ($_POST['delete_images'] as $del_id) {
        $del_id = intval($del_id);
        if ($del_id >= 1 && $del_id <= 6) {
            $selectCols[] = "photo$del_id";
        }
    }
    if (!empty($selectCols)) {
        $res = $conn->query("SELECT photo_folder, " . implode(', ', $selectCols) . " FROM product WHERE id = $id");
        if ($res && $row = $res->fetch_assoc()) {
            $folder = $row['photo_folder'];
            foreach ($selectCols as $col) {
                if (!empty($row[$col])) {
                    $path = APP_ROOT . "/../Product-Photos/" . $folder . "/" . $row[$col];
                    if (file_exists($path) && is_file($path)) {
                        unlink($path);
                    }
                }
            }
        }
        $updates = array_map(function($c) { return "$c = NULL"; }, $selectCols);
        $conn->query("UPDATE product SET " . implode(', ', $updates) . " WHERE id = $id");
    }
}

// Handle Multiple Image Upload
if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {
    $res = $conn->query("SELECT photo_folder, photo1, photo2, photo3, photo4, photo5, photo6 FROM product WHERE id = $id");
    if ($res && $row = $res->fetch_assoc()) {
        $folder = $row['photo_folder'];
        if (empty($folder)) {
            $folder = $slug;
            $conn->query("UPDATE product SET photo_folder = '$folder' WHERE id = $id");
        }
        $uploadDir = APP_ROOT . "/../Product-Photos/" . $folder . "/";
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0755, true);
        }

        $availableSlots = [];
        for ($i=1; $i<=6; $i++) {
            if (empty($row["photo$i"])) {
                // Also check if we just deleted it in the step above
                $isDeleted = false;
                if (!empty($_POST['delete_images'])) {
                    if (in_array($i, $_POST['delete_images'])) {
                        $isDeleted = true;
                    }
                }
                if ($isDeleted || empty($row["photo$i"])) {
                    $availableSlots[] = $i;
                }
            }
        }
        // Deduplicate slots just in case
        $availableSlots = array_unique($availableSlots);
        sort($availableSlots);

        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            if (empty($availableSlots)) break; // No more slots (max 6)

            if ($_FILES['images']['error'][$key] === 0) {
                $fileName = $_FILES['images']['name'][$key];
                $fileInfo = pathinfo($fileName);
                $extension = strtolower($fileInfo['extension']);
                $newFileName = $slug . "-" . time() . "-" . $key . "." . $extension;
                $targetFile = $uploadDir . $newFileName;

                if (move_uploaded_file($tmp_name, $targetFile)) {
                    $slot = array_shift($availableSlots);
                    $conn->query("UPDATE product SET photo$slot = '$newFileName' WHERE id = $id");
                }
            }
        }
    }
}

$categories_str = implode(',', array_map('intval', $categories));

// Update Product
$query = "UPDATE product SET 
          product_name = '$name', 
          slug = '$slug', 
          description = '$description', 
          how_to_use = '$gotanyquestion',
          return_exchange = '$returnexchange',
          disclaimer = '$disclaimer',
          price = $price, 
          sale_price = $sale_price, 
          product_review = $product_review,
          categories = '$categories_str',
          is_ratti = '$ratti',
          is_active = '$status'
          WHERE id = $id";

if ($conn->query($query)) {
    // Refresh Categories in pivot table
    // $conn->query("DELETE FROM product_category WHERE product_id = $id");
    // if (!empty($categories)) {
    //     foreach ($categories as $catId) {
    //         $catId = intval($catId);
    //         $conn->query("INSERT INTO product_category (product_id, category_id) VALUES ($id, $catId)");
    //     }
    // }
    
    $conn->close();
    header("Location: " . file_url("products/list.php") . "?updated=1");
    exit();
} else {
    $error = $conn->error;
    $conn->close();
    header("Location: " . file_url("products/edit.php?id=$id") . "&error=" . urlencode($error));
    exit();
}
