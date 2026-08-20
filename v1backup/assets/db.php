<?php
$host = 'localhost';
$user = 'u586615155_mkelly_db_useh';
$password = 'Udfp55rzC=5#';
$dbname = 'u586615155_mkelly_db_nme_';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
date_default_timezone_set('Asia/Kolkata');

?>