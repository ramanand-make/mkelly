<?php

require_once dirname(__DIR__, 2) . "/app/init.php";
require_once APP_ROOT . "/app/auth.php";

require_once APP_ROOT . "/app/module-data.php";

$conn = getSashDBConnection();

$id = $_POST['id'] ?? 0;
$inStock = $_POST['is_in_stock'] ?? 0;

$stmt = $conn->prepare("
    UPDATE product
    SET is_in_stock = ?
    WHERE id = ?
");

$stmt->bind_param("ii", $inStock, $id);

if ($stmt->execute()) {
    echo "success";
} else {
    echo "failed";
}