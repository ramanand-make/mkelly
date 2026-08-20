<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once 'includes/functions.php';
require_once 'vendor/autoload.php';
require_once __DIR__ . '/PHPMailer/Exception.php';
require_once __DIR__ . '/PHPMailer/PHPMailer.php';
require_once __DIR__ . '/PHPMailer/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
$conn = getSashDBConnection();

$order_id = isset($_GET['order']) ? intval($_GET['order']) : 0;

// echo $order_id;
// exit;

if ($order_id > 0) {

    $stmt = $conn->prepare("
        SELECT *
        FROM orders
        WHERE id = ?
        LIMIT 1
    ");

    $stmt->bind_param("i", $order_id);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows) {

        $order = $result->fetch_assoc();

        // Prevent duplicate email sending
        if (empty($order['email_sent'])) {

            $customer_email = $order['email'];
            $customer_name  = $order['name'];

            $mail = new PHPMailer(true);

            try {

                $mail->isSMTP();
                $mail->Host       = 'smtp.hostinger.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'info@astrologerraajeev.com';
                $mail->Password   = 'A1Jzwge5Ka+';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;

                $mail->setFrom(
                    'info@astrologerraajeev.com',
                    'Astrologer RaajeevG store'
                );

                // Customer
                $mail->addAddress(
                    $customer_email,
                    $customer_name
                );

                // Admin
                $mail->addBCC(
                    'rajeev.yadav0506@gmail.com',
                    'Astrologer RaajeevG'
                );

                $mail->isHTML(true);

                $mail->Subject = "Order Confirmation #".$order_id;

             $mail->Body = '
                        <!DOCTYPE html>
                        <html>
                        <head>
                        <meta charset="UTF-8">
                        <title>Order Confirmation</title>
                        </head>
                        <body style="margin:0;padding:0;background:#f5f5f5;font-family:Arial,Helvetica,sans-serif;">
                        
                        <table width="100%" cellpadding="0" cellspacing="0" style="background:#f5f5f5;padding:30px 0;">
                        <tr>
                        <td align="center">
                        
                        <table width="650" cellpadding="0" cellspacing="0" style="background:#ffffff;border-radius:12px;overflow:hidden;box-shadow:0 5px 20px rgba(0,0,0,0.08);">
                        
                            <!-- Header -->
                            <tr>
                                <td style="background:linear-gradient(135deg,#D4AF37,#F5C518);padding:35px;text-align:center;">
                                    <h1 style="margin:0;color:#222;font-size:30px;">
                                        Astrologer RaajeevG
                                    </h1>
                                    <p style="margin-top:10px;color:#333;font-size:16px;">
                                        Order Successfully Placed
                                    </p>
                                </td>
                            </tr>
                        
                            <!-- Success Icon -->
                            <tr>
                                <td align="center" style="padding:30px 20px 10px;">
                                    <div style="
                                        width:80px;
                                        height:80px;
                                        line-height:80px;
                                        border-radius:50%;
                                        background:#e8f5e9;
                                        color:#28a745;
                                        font-size:40px;
                                        font-weight:bold;">
                                        ✓
                                    </div>
                                </td>
                            </tr>
                        
                            <!-- Message -->
                            <tr>
                                <td style="padding:0 40px 20px;text-align:center;">
                                    <h2 style="color:#222;margin-bottom:10px;">
                                        Thank You For Your Purchase!
                                    </h2>
                        
                                    <p style="color:#666;line-height:1.7;font-size:15px;">
                                        Dear <strong>'.$customer_name.'</strong>,
                                        <br><br>
                                        We have received your order and payment successfully.
                                        Our team will begin processing your order shortly.
                                    </p>
                                </td>
                            </tr>
                        
                            <!-- Order Details -->
                            <tr>
                                <td style="padding:0 40px 30px;">
                        
                                    <table width="100%" cellpadding="12" cellspacing="0"
                                        style="border:1px solid #eee;border-radius:8px;">
                        
                                        <tr style="background:#fafafa;">
                                            <td><strong>Order ID</strong></td>
                                            <td align="right">#'.$order_id.'</td>
                                        </tr>
                        
                                        <tr>
                                            <td><strong>Customer Name</strong></td>
                                            <td align="right">'.$customer_name.'</td>
                                        </tr>
                        
                                        <tr style="background:#fafafa;">
                                            <td><strong>Email Address</strong></td>
                                            <td align="right">'.$customer_email.'</td>
                                        </tr>
                        
                                        <tr>
                                            <td><strong>Payment Status</strong></td>
                                            <td align="right" style="color:#28a745;">
                                                <strong>Paid</strong>
                                            </td>
                                        </tr>
                        
                                        <tr style="background:#fafafa;">
                                            <td><strong>Order Total</strong></td>
                                            <td align="right">
                                                <strong style="font-size:18px;color:#D4AF37;">
                                                    ₹'.$order['total_amount'].'
                                                </strong>
                                            </td>
                                        </tr>
                        
                                    </table>
                        
                                </td>
                            </tr>
                        
                            <!-- Information -->
                            <tr>
                                <td style="padding:0 40px 30px;">
                                    <div style="
                                        background:#fff8e1;
                                        border-left:4px solid #D4AF37;
                                        padding:15px;
                                        color:#555;
                                        font-size:14px;
                                        line-height:1.6;
                                    ">
                                        Your order is now being prepared. You will receive another email
                                        once your order has been processed and shipped.
                                    </div>
                                </td>
                            </tr>
                        
                            <!-- Button -->
                            <tr>
                                <td align="center" style="padding-bottom:30px;">
                                    <a href="https://shop.astrologerraajeev.com/"
                                       style="
                                       background:#D4AF37;
                                       color:#fff;
                                       text-decoration:none;
                                       padding:14px 32px;
                                       border-radius:6px;
                                       display:inline-block;
                                       font-weight:bold;">
                                       Continue Shopping
                                    </a>
                                </td>
                            </tr>
                        
                            <!-- Footer -->
                            <tr>
                                <td style="
                                    background:#222;
                                    color:#ccc;
                                    text-align:center;
                                    padding:25px;
                                    font-size:13px;
                                    line-height:1.8;
                                ">
                                    <strong style="color:#fff;">
                                        Astrologer RaajeevG store
                                    </strong>
                                    <br>
                                    Thank you for choosing our spiritual products and remedies.
                                    <br><br>
                                    Email: info@astrologerraajeev.com
                                    <br>
                                    © '.date('Y').' Astrologer RaajeevG store. All Rights Reserved.
                                </td>
                            </tr>
                        
                        </table>
                        
                        </td>
                        </tr>
                        </table>
                        
                        </body>
                        </html>';

                $mail->send();

                // Mark email as sent
                $update = $conn->prepare("
                    UPDATE orders
                    SET email_sent = 1
                    WHERE id = ?
                ");

                $update->bind_param("i", $order_id);
                $update->execute();

            } catch (Exception $e) {

                error_log(
                    "Mail Error Order #{$order_id}: ".
                    $mail->ErrorInfo
                );
            }
        }
    }
}
?>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Optional: Retrieve order ID if needed to show details
$order_id = isset($_GET['order']) ? htmlspecialchars($_GET['order']) : '';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Successful - AstroRaajeevG</title>
    <base href="<?= BASE_URL ?>">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="assets/css/style.css" rel="stylesheet">
    
    <style>
        .success-page {
            background-color: #FAFAFA;
            padding: 80px 0;
            min-height: 70vh;
            display: flex;
            align-items: center;
        }
        .success-card {
            background: #fff;
            border-radius: 20px;
            padding: 50px 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            text-align: center;
            max-width: 600px;
            margin: 0 auto;
        }
        .success-icon {
            width: 80px;
            height: 80px;
            background: #e8f5e9;
            color: #4CAF50;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin: 0 auto 20px;
        }
        .success-title {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            font-weight: 700;
            color: #1a1a1a;
            margin-bottom: 15px;
        }
        .success-text {
            color: #666;
            font-size: 16px;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        .btn-continue {
            background: #F5C518;
            color: #1a1a1a;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(245, 197, 24, 0.3);
        }
        .btn-continue:hover {
            background: #D4AF37;
            transform: translateY(-2px);
            color: #1a1a1a;
        }
    </style>
</head>
<body>

<?php include 'includes/header.php'; ?>

<main class="success-page">
    <div class="container">
        <div class="success-card">
            <div class="success-icon">
                <i class="fas fa-check"></i>
            </div>
            <h1 class="success-title">Payment Successful!</h1>
            <p class="success-text">
                Thank you for your purchase. Your order <strong>#<?php echo $order_id; ?></strong> has been successfully placed. <br>
                We have sent an order confirmation email to your inbox with all the details.
            </p>
            <a href="./" class="btn-continue">Continue Shopping</a>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>
