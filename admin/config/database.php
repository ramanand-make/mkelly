<?php
declare(strict_types=1);

// Auto-detect environment (local development vs live production server)
$is_local = (php_sapi_name() === 'cli' && empty(getenv('HOSTINGER_ENV')))
    || in_array($_SERVER['REMOTE_ADDR'] ?? '', ['127.0.0.1', '::1'])
    || (isset($_SERVER['HTTP_HOST']) && (
        strpos($_SERVER['HTTP_HOST'], 'localhost') !== false ||
        strpos($_SERVER['HTTP_HOST'], '127.0.0.1') !== false
    ));

if ($is_local) {
    // Local development (XAMPP)
    $db_host = "127.0.0.1";
    $db_user = "root";
    $db_pass = "";
    $db_name = "mkelly";
    $db_port = 3306;
} else {
    // Live Hostinger server: host is 'localhost' on Hostinger internal network
    $db_host = "localhost";
    $db_user = "u586615155_mkelly_u";
    $db_pass = "FsZc4kk4x=";
    $db_name = "u586615155_mkelly_d";
    $db_port = 3306;
}

// Backward compatibility
$host = $db_host;
$user = $db_user;
$pass = $db_pass;
$db   = $db_name;
$port = $db_port;

function getSashDBConnection(): ?mysqli
{
    global $db_host, $db_user, $db_pass, $db_name, $db_port, $host, $user, $pass, $db, $port;
    static $cachedConn = null;

    $h  = $db_host ?? ($host !== ($_SERVER['HTTP_HOST'] ?? '') ? $host : '127.0.0.1');
    $u  = $db_user ?? $user;
    $p  = $db_pass ?? $pass;
    $d  = $db_name ?? $db;
    $pt = (int)($db_port ?? $port ?? 3306);

    // Reuse existing alive connection to prevent opening multiple DB connections per page
    if ($cachedConn instanceof mysqli && @$cachedConn->ping()) {
        return $cachedConn;
    }

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $conn = mysqli_init();

        // Prevent 504 Gateway Timeout: abort connection attempt after 3 seconds instead of hanging for 60+ seconds
        $conn->options(MYSQLI_OPT_CONNECT_TIMEOUT, 3);

        if (!$conn->real_connect($h, $u, $p, $d, $pt)) {
            throw new mysqli_sql_exception(mysqli_connect_error(), mysqli_connect_errno());
        }

        $conn->set_charset("utf8mb4");
        $cachedConn = $conn;

        return $conn;

    } catch (mysqli_sql_exception $e) {
        error_log("Database connection failed: " . $e->getMessage());

        return null;
    }
}



