<?php
declare(strict_types=1);

$host = "localhost";
$user = "root";
$pass = "";
$db   = "mkelly";
$port = 3306;

function getSashDBConnection(): ?mysqli
{
    global $host, $user, $pass, $db, $port;

    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    try {
        $conn = new mysqli($host, $user, $pass, $db, $port);

        $conn->set_charset("utf8mb4");

        

        return $conn;

    } catch (mysqli_sql_exception $e) {

        

        error_log("Database connection failed: " . $e->getMessage());

        return null;
    }
}

