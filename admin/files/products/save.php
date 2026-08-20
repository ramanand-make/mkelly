<?php

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

$name               = $conn->real_escape_string($_POST['name']);
$slug               = generate_slug($name);
$description        = $conn->real_escape_string($_POST['description']);

$gotanyquestion     = $conn->real_escape_string($_POST['gotanyquestion']);
$returnexchange     = $conn->real_escape_string($_POST['returnexchange']);
$disclaimer         = $conn->real_escape_string($_POST['disclaimer']);
$review_rating      = floatval($_POST['review_rating']);

$price              = floatval($_POST['price']);

$sale_price         = !empty($_POST['sale_price'])
                        ? floatval($_POST['sale_price'])
                        : "NULL";

$stock              = intval($_POST['stock']) ?? NULL;
$status             = intval($_POST['status']);

$categories         = isset($_POST['categories'])
                        ? $_POST['categories']
                        : [];

/* =========================
   INSERT PRODUCT
========================= */

$categories_str = implode(',', array_map('intval', $categories));

$query = "INSERT INTO product (
            product_name,
            slug,
            description,
            how_to_use,
            return_exchange,
            disclaimer,
            price,
            sale_price,
            product_review,
            categories,
            is_active
          ) VALUES (
            '$name',
            '$slug',
            '$description',
            '$gotanyquestion',
            '$returnexchange',
            '$disclaimer',
            $price,
            $sale_price,
            $review_rating,
            '$categories_str',
            $status
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
            mkdir($uploadDir, 0755, true);
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