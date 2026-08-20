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
    header("Location: " . file_url("categories/list.php"));
    exit();
}

$conn = getSashDBConnection();
if (!$conn) {
    header("Location: " . file_url("categories/list.php") . "?error=db_connection");
    exit();
}

$name = $conn->real_escape_string($_POST['name']);
$slug = generate_slug($name);
$status = intval($_POST['status']);

$query = "INSERT INTO categories (name, slug, status) VALUES ('$name', '$slug', $status)";

if ($conn->query($query)) {
    $conn->close();
    header("Location: " . file_url("categories/list.php") . "?success=1");
    exit();
} else {
    $error = $conn->error;
    $conn->close();
    header("Location: " . file_url("categories/list.php") . "?error=" . urlencode($error));
    exit();
}
