<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once dirname(__DIR__, 2) . "/app/init.php";
require_once APP_ROOT . "/app/auth.php";
requireAdminLogin();

require_once APP_ROOT . "/app/module-data.php";
require_once APP_ROOT . "/../includes/functions.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: " . file_url("products/list.php"));
    exit();
}

$conn = getSashDBConnection();

if (!$conn) {
    header("Location: " . file_url("products/add.php") . "?error=db_connection");
    exit();
}

/* =========================
   GET FORM DATA
========================= */

$name               = $conn->real_escape_string($_POST['name'] ?? '');
$slug               = generate_slug($name);
$description        = $conn->real_escape_string($_POST['description'] ?? '');

$benefit            = $conn->real_escape_string($_POST['benefit'] ?? '');
$how_to_use         = $conn->real_escape_string($_POST['how_to_use'] ?? '');
$returnexchange     = $conn->real_escape_string($_POST['returnexchange'] ?? '');
$disclaimer         = $conn->real_escape_string($_POST['disclaimer'] ?? '');
$review_rating      = floatval($_POST['review_rating'] ?? 0);

$price              = floatval($_POST['price'] ?? 0);

$sale_price         = !empty($_POST['sale_price'])
                        ? floatval($_POST['sale_price'])
                        : "NULL";
$unit               = $conn->real_escape_string($_POST['unit'] ?? '');

$stock              = intval($_POST['stock'] ?? 0);
$status             = intval($_POST['status'] ?? 0);

$categories         = isset($_POST['categories'])
                        ? $_POST['categories']
                        : [];
if (!is_array($categories)) {
    $categories = !empty($categories) ? [$categories] : [];
}

/* =========================
   INSERT PRODUCT
========================= */

$categories_str = implode(',', array_map('intval', $categories));

$query = "INSERT INTO product (
            product_name,
            slug,
            description,
            benefit,
            how_to_use,
            return_exchange,
            disclaimer,
            price,
            sale_price,
            unit,
            product_review,
            categories,
            is_active,
            photo1, photo2, photo3, photo4, photo5, photo6, photo_folder
          ) VALUES (
            '$name',
            '$slug',
            '$description',
            '$benefit',
            '$how_to_use',
            '$returnexchange',
            '$disclaimer',
            $price,
            $sale_price,
            '$unit',
            $review_rating,
            '$categories_str',
            $status,
            '', '', '', '', '', '', ''
          )";

if ($conn->query($query)) {

    $productId = $conn->insert_id;

    /* =========================
       MULTIPLE IMAGE UPLOAD
    ========================= */

    if (isset($_FILES['images']) && !empty($_FILES['images']['name'][0])) {

        // Setup folder for photos
        $folder = $slug;
        $conn->query("UPDATE product SET photo_folder = '$folder' WHERE id = $productId");

        $uploadDir = APP_ROOT . "/../Product-Photos/" . $folder . "/";

        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $availableSlots = [1, 2, 3, 4, 5, 6];

        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {

            if (empty($availableSlots)) break;

            if ($_FILES['images']['error'][$key] === 0) {

                $fileName = $_FILES['images']['name'][$key];

                $fileInfo = pathinfo($fileName);

                $extension = strtolower($fileInfo['extension']);

                $newFileName = $slug . "-" . time() . "-" . $key . "." . $extension;

                $targetFile = $uploadDir . $newFileName;

                if (move_uploaded_file($tmp_name, $targetFile)) {

                    $slot = array_shift($availableSlots);
                    $conn->query("UPDATE product SET photo$slot = '$newFileName' WHERE id = $productId");

                }
            }
        }
    }

    $conn->close();

    header("Location: " . file_url("products/list.php") . "?success=1");
    exit();

} else {

    $error = $conn->error;

    $conn->close();

    header("Location: " . file_url("products/add.php") . "?error=" . urlencode($error));
    exit();
}