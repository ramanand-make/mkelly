<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once __DIR__ . '/../admin/config/database.php';

$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http");
$host = $_SERVER['HTTP_HOST'];

$docRoot = isset($_SERVER['DOCUMENT_ROOT']) ? realpath($_SERVER['DOCUMENT_ROOT']) : '';
$projectRoot = realpath(dirname(__DIR__));

if ($docRoot && $projectRoot) {
    $docRoot = str_replace('\\', '/', $docRoot);
    $projectRoot = str_replace('\\', '/', $projectRoot);
    
    $relativePath = '';
    if (strpos($projectRoot, $docRoot) === 0) {
        $relativePath = substr($projectRoot, strlen($docRoot));
    }
    $relativePath = str_replace('\\', '/', $relativePath);
    $relativePath = '/' . trim($relativePath, '/');
    if ($relativePath !== '/') {
        $relativePath = $relativePath . '/';
    }
    $base_url = $protocol . "://" . $host . $relativePath;
} else {
    $base_url = $protocol . "://" . $host . "/";
}

if (!defined('BASE_URL')) {
    define('BASE_URL', $base_url);
}


function getNavbarMenu($conn) {
    $sql = "SELECT * FROM navbar_menu WHERE status = 1 AND parent_id = 0 ORDER BY order_no ASC";
    $result = $conn->query($sql);
    $menu = [];
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $menuItem = $row;
            // Check if it has sub-items in navbar_menu
            $sqlSub = "SELECT * FROM navbar_menu WHERE parent_id = ? AND status = 1 ORDER BY order_no ASC";
            $stmt = $conn->prepare($sqlSub);
            $stmt->bind_param("i", $row['id']);
            $stmt->execute();
            $subResult = $stmt->get_result();
            if ($subResult->num_rows > 0) {
                $menuItem['children'] = $subResult->fetch_all(MYSQLI_ASSOC);
            } else {
                // If no sub-items in navbar_menu, check categories
                $menuItem['children'] = getCategoriesByName($conn, $row['title']);
            }
            $menu[] = $menuItem;
        }
    }
    return $menu;
}
function getProduct($conn, $limit = 4, $category_id = null)
{
    $sql = "SELECT 
    p.*,

    (
        SELECT GROUP_CONCAT(c.name SEPARATOR ', ')
        FROM categories c
        WHERE FIND_IN_SET(c.id, p.categories)
        AND c.status = 1
    ) AS category_name

FROM product p
WHERE p.is_active = 1";

    $types = '';
    $params = [];

    // Category filter
    if (!empty($category_id)) {

        $sql .= " AND FIND_IN_SET(?, p.categories)";

        $types .= 'i';

        $params[] = $category_id;
    }

    // Latest products
    $sql .= " ORDER BY p.id DESC LIMIT ?";

    $types .= 'i';

    $params[] = (int)$limit;

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        return [];
    }

    $stmt->bind_param($types, ...$params);

    $stmt->execute();

    return $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
}
function getCategoriesByName($conn, $name) {
    return [];
}

function getCategoryBySlug($conn, $slug) {
    $sql = "SELECT * FROM categories WHERE slug = ? AND status = 1 LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $slug);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

/**
 * Category id plus all active child category ids (for parent collections).
 */
function getCategoryTreeIds($conn, $category_id) {
    return [(int) $category_id];
}

/**
 * Active products; when $category_id is set, matches product_category (many-to-many).
 */
 $conn = getSashDBConnection();
function getProducts($conn, $limit = 8, $category_id = null, $offset = 0, $sort = '')
{
    $sql = "SELECT 
                p.id,
                p.product_name,
                p.slug,
                p.price,
                p.sale_price,
                p.description,
                p.categories,
                p.photo_folder,

                p.photo1,
                p.photo2,
                p.photo3,
                p.photo4,
                p.photo5,
                p.photo6,

                (
                    SELECT c.name
                    FROM categories c
                    WHERE FIND_IN_SET(c.id, p.categories)
                    AND c.status = 1
                    ORDER BY c.id ASC
                    LIMIT 1
                ) AS category_name

            FROM product p
            WHERE p.is_active = 1";

    $types = '';
    $params = [];

    // Category filter
    if ($category_id !== null) {

        $categoryIds = getCategoryTreeIds($conn, (int)$category_id);

        if (empty($categoryIds)) {
            return [];
        }

        $conditions = [];

        foreach ($categoryIds as $id) {
            $conditions[] = "FIND_IN_SET(?, p.categories)";
            $types .= 'i';
            $params[] = $id;
        }

        $sql .= " AND (" . implode(' OR ', $conditions) . ")";
    }

    // Sort handling
    $orderClause = "ORDER BY p.id DESC";
    if ($sort === 'low_to_high') {
        $orderClause = "ORDER BY IF(p.sale_price > 0, p.sale_price, p.price) ASC";
    } elseif ($sort === 'high_to_low') {
        $orderClause = "ORDER BY IF(p.sale_price > 0, p.sale_price, p.price) DESC";
    }

    // FIXED LIMIT AND OFFSET
    $limit = (int)$limit;
    $offset = (int)$offset;
    $sql .= " $orderClause LIMIT $limit OFFSET $offset";

    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        die($conn->error);
    }

    // Bind only category params
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }

    $stmt->execute();

    $result = $stmt->get_result();

    return $result->fetch_all(MYSQLI_ASSOC);
}
function tableExists($conn, $tableName) {
    $tableName = $conn->real_escape_string($tableName);
    $result = $conn->query("SHOW TABLES LIKE '$tableName'");
    return $result && $result->num_rows > 0;
}
function getProductBySlug($conn, $slug) {
    $sql = "SELECT p.*, 
            (
                SELECT c.name
                FROM categories c
                WHERE FIND_IN_SET(c.id, p.categories)
                AND c.status = 1
                LIMIT 1
            ) AS category_name
            FROM product p 
            WHERE p.slug = ? AND p.is_active = 1 LIMIT 1";
    
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $slug);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

function getProductImages($conn, $product_id) {
    $sql = "SELECT image FROM product_images WHERE product_id = ? ORDER BY id ASC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $images = [];
    while ($row = $result->fetch_assoc()) {
        $images[] = $row['image'];
    }
    return $images;
}

function get_image_url($path) {
    if (empty($path)) return 'assets/images/placeholder.jpg';
    if (filter_var($path, FILTER_VALIDATE_URL)) return $path;
    
    $cleanPath = ltrim($path, '/');
    
    // Check if file exists in root
    if (file_exists(__DIR__ . '/../' . $cleanPath)) {
        return $cleanPath;
    }
    
    // Check if it already has admin prefix
    if (strpos($cleanPath, 'admin/') === 0) return $cleanPath;
    
    // Default to admin path
    return 'admin/' . $cleanPath;
}
