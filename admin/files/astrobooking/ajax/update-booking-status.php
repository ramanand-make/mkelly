<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

header('Content-Type: application/json');

require_once __DIR__ . '/../../../../includes/functions.php';

$conn = getSashDBConnection();



if (!$conn) {
    echo json_encode([
        'success' => false,
        'message' => 'Database connection failed'
    ]);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request'
    ]);
    exit;
}

$bookingId = ($_POST['booking_id'] ?? 0);
$bookingStatus = trim($_POST['booking_status'] ?? '');

$allowedStatuses = [
    'just created',
    'consultent inprocess',
    'consultent complete',
    'cancelled'
];

if (!$bookingId) {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid booking ID'
    ]);
    exit;
}

if (!in_array($bookingStatus, $allowedStatuses, true)) {
    echo json_encode([
        'success' => false,
        'message' => 'Invalid status'
    ]);
    exit;
}

$stmt = $conn->prepare("
    UPDATE astro_bookings
    SET booking_status = ?
    WHERE id = ?
");

$stmt->bind_param("ss", $bookingStatus, $bookingId);

if ($stmt->execute()) {
    echo json_encode([
        'success' => true,
        'message' => 'Booking status updated successfully'
    ]);
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Failed to update booking status'
    ]);
}

$stmt->close();
$conn->close();