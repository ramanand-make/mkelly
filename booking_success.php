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


$booking_id = isset($_GET['booking_id']) ? htmlspecialchars($_GET['booking_id']) : '';


// echo $order_id;
// exit;


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
    
    <link href="assets/css/style.css?v=<?= time() ?>" rel="stylesheet">
    
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
            color: #000000;
            margin-bottom: 15px;
        }
        .success-text {
            color: #666;
            font-size: 16px;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        .btn-continue {
            background: #054B2C;
            color: #ffffff;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(5, 75, 44, 0.3);
        }
        .btn-continue:hover {
            background: #C11712;
            transform: translateY(-2px);
            color: #ffffff;
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

            <h1 class="success-title">Booking Successful!</h1>

            <p class="success-text">
                Thank you for booking your consultation with
                <strong>Mkelly</strong>.
            </p>

            <?php if (!empty($booking_id)) : ?>
                <p class="success-text">
                    Your Booking ID is:
                    <strong><?php echo $booking_id; ?></strong>
                </p>
            <?php endif; ?>

            <p class="success-text">
                A confirmation email has been sent to your registered email address.
                <br>
                Mkelly will contact you shortly.
            </p>

            <a href="./" class="btn-continue">Back to Home</a>
        </div>
    </div>
</main>
<?php include 'includes/footer.php'; ?>

</body>
</html>
