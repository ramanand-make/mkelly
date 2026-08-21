<?php
/**
 * Backend Handler for Mkelly Biotech Booking Form
 */
 if (file_exists(__DIR__ . '/vendor/autoload.php')) {
    require_once __DIR__ . '/vendor/autoload.php';
}
require_once __DIR__ . '/PHPMailer/Exception.php';
require_once __DIR__ . '/PHPMailer/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

ini_set('display_errors', 0);
error_reporting(0);

$isPost = $_SERVER['REQUEST_METHOD'] === 'POST';
$data = json_decode(file_get_contents('php://input'), true) ?: $_POST;

$RAZORPAY_KEY = "rzp_live_Rt2YjMUoP3Qt11";
$RAZORPAY_SECRET = "J6nniCqLCPy8Rm6iOr5K9GTo";



if ($isPost && !empty($data['verify_payment'])) {
    header('Content-Type: application/json');
    $razorpay_payment_id = $data['razorpay_payment_id'] ?? '';
    $razorpay_order_id = $data['razorpay_order_id'] ?? '';
    $razorpay_signature = $data['razorpay_signature'] ?? '';
    $booking_id = $data['booking_id'] ?? '';

    // Verify signature
    $generated_signature = hash_hmac('sha256', $razorpay_order_id . "|" . $razorpay_payment_id, $RAZORPAY_SECRET);
    if ($generated_signature === $razorpay_signature) {
        require_once __DIR__ . '/admin/config/database.php';
        $conn = getSashDBConnection();
        if ($conn) {
            $stmt = $conn->prepare("UPDATE astro_bookings SET payment_status = 'Success', payment_ref = ? WHERE id = ?");
            if ($stmt) {
                $stmt->bind_param("ss", $razorpay_payment_id, $booking_id);
                $stmt->execute();
                $stmt->close();
            }

            // Fetch booking to send email
            $fetchStmt = $conn->prepare("SELECT * FROM astro_bookings WHERE id = ?");
            if ($fetchStmt) {
                $fetchStmt->bind_param("s", $booking_id);
                $fetchStmt->execute();
                $result = $fetchStmt->get_result();
                if ($row = $result->fetch_assoc()) {
                    $row['horoscopes'] = json_decode($row['horoscopes'], true) ?: [];
                    $row['timestamp'] = $row['booking_time'];
                    sendBookingEmail($row);
                }
                $fetchStmt->close();
            }
            $conn->close();
        }
        if (ob_get_length()) ob_clean();
        echo json_encode(['status' => 'success']);
    } else {
        if (ob_get_length()) ob_clean();
        echo json_encode(['status' => 'error', 'message' => 'Invalid signature']);
    }
    exit;
}

if ($isPost && (!empty($data['astro_form_submit']) || !empty($data['astro_form_partial']))) {
    header('Content-Type: application/json');

    $isPartial = !empty($data['astro_form_partial']);

    $booking = [
        'id'          => 'RG-' . strtoupper(substr(md5(uniqid()), 0, 8)),
        'timestamp'   => date('Y-m-d H:i:s'),
        'name'        => htmlspecialchars($data['name'] ?? ''),
        'whatsapp'    => htmlspecialchars($data['whatsapp'] ?? ''),
        'email'       => filter_var($data['email'] ?? '', FILTER_SANITIZE_EMAIL),
        'service'     => htmlspecialchars($data['service'] ?? ''),
        'service_tier'=> htmlspecialchars($data['service_tier'] ?? ''),
        'amount'      => htmlspecialchars($data['amount'] ?? ''),
        'country_group'=> htmlspecialchars($data['country_group'] ?? ''),
        'horoscopes'  => $data['horoscopes'] ?? [],
        'payment_ref' => htmlspecialchars($data['payment_ref'] ?? 'PENDING'),
    ];

    $rzpOrderId = 'PENDING_RZP';
    $amountInt = 0;

    if (!$isPartial) {
        // Parse Amount to integer
        $amountStr = preg_replace('/[^\d]/', '', $booking['amount']);
        $amountInt = (int)$amountStr;
        $amountInPaise = $amountInt * 100;

        // Create Order in Razorpay via cURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://api.razorpay.com/v1/orders");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
            "amount" => $amountInPaise,
            "currency" => "INR",
            "receipt" => $booking['id']
        ]));
        curl_setopt($ch, CURLOPT_USERPWD, $RAZORPAY_KEY . ":" . $RAZORPAY_SECRET);
        curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);
        $result = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        $rzpResponse = json_decode($result, true);
        if ($httpCode !== 200 || !isset($rzpResponse['id'])) {
            $rzpOrderId = "PENDING_RZP_SETUP_" . uniqid();
        } else {
            $rzpOrderId = $rzpResponse['id'];
        }

        $booking['payment_ref'] = $rzpOrderId; // Store RZP Order ID temporarily
    }

    // Save to Database
    require_once __DIR__ . '/admin/config/database.php';
    $conn = getSashDBConnection();
    
    $db_success = false;

    if ($conn) {
        try {
            $horoscopes_json = json_encode($booking['horoscopes']);
            
            $existing_id = null;
            if (!empty($booking['email'])) {
                $checkStmt = $conn->prepare("SELECT id FROM astro_bookings WHERE email = ? AND payment_status = 'Pending' LIMIT 1");
                if ($checkStmt) {
                    $checkStmt->bind_param("s", $booking['email']);
                    $checkStmt->execute();
                    $checkStmt->bind_result($existing_id);
                    $checkStmt->fetch();
                    $checkStmt->close();
                }
            }

            if ($existing_id) {
                $booking['id'] = $existing_id; // Keep the same ID
                $stmt = $conn->prepare("UPDATE astro_bookings SET name=?, whatsapp=?, service=?, service_tier=?, amount=?, country_group=?, horoscopes=?, payment_ref=? WHERE id=?");
                if ($stmt) {
                    $stmt->bind_param("sssssssss", 
                        $booking['name'],
                        $booking['whatsapp'],
                        $booking['service'],
                        $booking['service_tier'],
                        $booking['amount'],
                        $booking['country_group'],
                        $horoscopes_json,
                        $booking['payment_ref'],
                        $booking['id']
                    );
                    if ($stmt->execute()) {
                        $db_success = true;
                    }
                    $stmt->close();
                }
            } else {
                $stmt = $conn->prepare("INSERT INTO astro_bookings (id, booking_time, name, whatsapp, email, service, service_tier, amount, country_group, horoscopes, payment_ref, payment_status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending')");
                if ($stmt) {
                    $stmt->bind_param("sssssssssss", 
                        $booking['id'],
                        $booking['timestamp'],
                        $booking['name'],
                        $booking['whatsapp'],
                        $booking['email'],
                        $booking['service'],
                        $booking['service_tier'],
                        $booking['amount'],
                        $booking['country_group'],
                        $horoscopes_json,
                        $booking['payment_ref']
                    );
                    if ($stmt->execute()) {
                        $db_success = true;
                    }
                    $stmt->close();
                }
            }
            $conn->close();
        } catch (Exception $e) {
            error_log("DB Booking Error: " . $e->getMessage());
        }
    } 
    
    if (!$db_success && !$isPartial) {
        // Fallback to JSON log if DB connection or query fails
        $log_file = __DIR__ . '/includes/bookings.json';
        $bookings = [];
        if (file_exists($log_file)) {
            $bookings = json_decode(file_get_contents($log_file), true) ?: [];
        }
        $bookings[] = $booking;
        file_put_contents($log_file, json_encode($bookings, JSON_PRETTY_PRINT));
    }
    
    if (ob_get_length()) ob_clean();
    if ($isPartial) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode([
            'success' => true, 
            'booking_id' => $booking['id'], 
            'razorpay_key' => $RAZORPAY_KEY,
            'order_id' => $rzpOrderId,
            'amount' => $amountInt
        ]);
    }
    exit;
}





function sendBookingEmail($booking)
{
    $subject = "Booking Confirmed – Mkelly (#{$booking['id']})";

    $horoscope_html = '';

    if (!empty($booking['horoscopes'])) {
        foreach ($booking['horoscopes'] as $i => $h) {
            $n = $i + 1;

            $horoscope_html .= "
            <tr style='background:" . ($i % 2 == 0 ? '#f4f6f4' : '#fff') . ";'>
                <td style='padding:8px 12px;border:1px solid #e2eae2;'>{$n}</td>
                <td style='padding:8px 12px;border:1px solid #e2eae2;'>" . htmlspecialchars($h['name'] ?? '') . "</td>
                <td style='padding:8px 12px;border:1px solid #e2eae2;'>" . htmlspecialchars($h['dob'] ?? '') . "</td>
                <td style='padding:8px 12px;border:1px solid #e2eae2;'>" . htmlspecialchars($h['time'] ?? '') . "</td>
                <td style='padding:8px 12px;border:1px solid #e2eae2;'>" . htmlspecialchars($h['place'] ?? '') . "</td>
            </tr>";
        }
    }

    $message = "
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset='UTF-8'>
    </head>
    <body style='font-family:\"Inter\",sans-serif;background:#f4f6f4;color:#333333;margin:0;padding:20px;'>

    <div style='max-width:600px;margin:0 auto;background:#ffffff;border:1px solid #e2eae2;border-radius:12px;overflow:hidden;'>

        <div style='background:linear-gradient(135deg,#054B2C,#C11712);padding:32px;text-align:center;'>
            <h1 style='color:#ffffff;font-size:22px;margin:0;letter-spacing:2px;'>
                MKELLY
            </h1>
            <p style='color:rgba(255,255,255,0.85);margin:8px 0 0;font-size:13px;letter-spacing:1px;'>
                BOOKING CONFIRMED
            </p>
        </div>

        <div style='padding:32px;'>

            <p style='color:#555555;margin:0 0 24px;'>
                Dear <strong style='color:#333333;'>" . htmlspecialchars($booking['name']) . "</strong>,
            </p>

            <p style='color:#555555;line-height:1.7;'>
                Your booking has been received successfully.
                Mkelly will contact you shortly on
                <strong style='color:#C11712;'>" . htmlspecialchars($booking['whatsapp']) . "</strong>.
            </p>

            <div style='background:#f9faf9;border:1px solid #e2eae2;border-radius:8px;padding:20px;margin:24px 0;'>
                <table style='width:100%;border-collapse:collapse;font-size:13px;'>

                    <tr>
                        <td style='color:#a78bfa;padding:6px 0;width:140px;'>Booking ID</td>
                        <td style='color:#f0e6ff;font-weight:bold;'>
                            {$booking['id']}
                        </td>
                    </tr>

                    <tr>
                        <td style='color:#a78bfa;padding:6px 0;'>Service</td>
                        <td style='color:#f0e6ff;'>
                            " . htmlspecialchars($booking['service']) . "
                        </td>
                    </tr>

                    <tr>
                        <td style='color:#a78bfa;padding:6px 0;'>Amount</td>
                        <td style='color:#C11712;font-weight:bold;'>
                            " . htmlspecialchars($booking['amount']) . "
                        </td>
                    </tr>
                    <tr>
                        <td style='color:#a78bfa;padding:6px 0;'>Place</td>
                        <td style='color:#C11712;font-weight:bold;'>
                            " . htmlspecialchars($booking['place']) . "
                        </td>
                    </tr>

                    <tr>
                        <td style='color:#a78bfa;padding:6px 0;'>Date</td>
                        <td style='color:#f0e6ff;'>
                            " . htmlspecialchars($booking['timestamp']) . "
                        </td>
                    </tr>

                </table>
            </div>";

    if (!empty($booking['horoscopes'])) {
        $message .= "
            <h3 style='color:#C11712;font-size:14px;letter-spacing:1px;margin:24px 0 12px;'>
                HOROSCOPE DETAILS SUBMITTED
            </h3>

            <table style='width:100%;border-collapse:collapse;font-size:12px;color:#1a1535;'>

                <thead>
                    <tr style='background:#C11712;'>
                        <th style='padding:8px 12px;text-align:left;'>#</th>
                        <th style='padding:8px 12px;text-align:left;'>Name</th>
                        <th style='padding:8px 12px;text-align:left;'>DOB</th>
                        <th style='padding:8px 12px;text-align:left;'>Time</th>
                        <th style='padding:8px 12px;text-align:left;'>Place</th>
                    </tr>
                </thead>

                <tbody>
                    {$horoscope_html}
                </tbody>

            </table>";
    }

    $message .= "
            <div style='margin-top:32px;padding-top:20px;border-top:1px solid #4a3a7a;text-align:center;'>

                <p style='color:#a78bfa;font-size:13px;margin:0;'>
                    Questions? Reach us on WhatsApp
                </p>

                <a href='https://wa.me/919811294025'
                   style='display:inline-block;margin-top:12px;background:#25d366;color:#fff;text-decoration:none;padding:10px 24px;border-radius:24px;font-size:14px;font-weight:bold;'>
                    💬 +91 98112 94025
                </a>

            </div>

        </div>
    </div>

    </body>
    </html>";

    try {

        $mail = new PHPMailer(true);

        $mail->isSMTP();
        $mail->Host       = 'smtp.hostinger.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'info@mkellybiotech.com';
        $mail->Password   = 'A1Jzwge5Ka+';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->CharSet = 'UTF-8';

        $mail->setFrom(
            'info@mkellybiotech.com',
            'Mkelly Biotech'
        );

        $mail->addAddress(
            $booking['email'],
            $booking['name']
        );

        // Send copy to admin
        $mail->addBCC('developermakes360@gmail.com');
        // $mail->addBCC('rajeev.yadav0506@gmail.com');
        

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body    = $message;

        return $mail->send();

    } catch (\Throwable $e) {

        error_log("Mail Error: " . $e->getMessage());
        return false;
    }
}
?>