<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require_once 'includes/functions.php';

// Optional: Retrieve error message
$error_msg = isset($_GET['error']) ? htmlspecialchars($_GET['error']) : 'An unknown error occurred during payment processing.';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Failed - Mkelly</title>
    <base href="<?= BASE_URL ?>">
    
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="assets/css/style.css?v=<?= time() ?>" rel="stylesheet">
    
    <style>
        .failed-page {
            background-color: #FAFAFA;
            padding: 80px 0;
            min-height: 70vh;
            display: flex;
            align-items: center;
        }
        .failed-card {
            background: #fff;
            border-radius: 20px;
            padding: 50px 30px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            text-align: center;
            max-width: 600px;
            margin: 0 auto;
        }
        .failed-icon {
            width: 80px;
            height: 80px;
            background: #ffebee;
            color: #f44336;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            margin: 0 auto 20px;
        }
        .failed-title {
            font-family: 'Playfair Display', serif;
            font-size: 32px;
            font-weight: 700;
            color: #000000;
            margin-bottom: 15px;
        }
        .failed-text {
            color: #666;
            font-size: 16px;
            margin-bottom: 30px;
            line-height: 1.6;
        }
        .error-reason {
            background: #fdf2f2;
            color: #d32f2f;
            padding: 10px;
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 25px;
            display: inline-block;
        }
        .btn-retry {
            background: #000000;
            color: #fff;
            padding: 12px 30px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            margin: 5px;
        }
        .btn-retry:hover {
            background: #000000;
            transform: translateY(-2px);
            color: #fff;
        }
        .btn-support {
            background: transparent;
            color: #000000;
            border: 2px solid #000000;
            padding: 10px 28px;
            border-radius: 8px;
            font-weight: 600;
            text-decoration: none;
            display: inline-block;
            transition: all 0.3s ease;
            margin: 5px;
        }
        .btn-support:hover {
            background: #f5f5f5;
        }
    </style>
</head>
<body>

<?php include 'includes/header.php'; ?>

<main class="failed-page">
    <div class="container">
        <div class="failed-card">
            <div class="failed-icon">
                <i class="fas fa-times"></i>
            </div>
            <h1 class="failed-title">Payment Failed</h1>
            <p class="failed-text">
                We're sorry, but your transaction could not be completed successfully. Your account has not been charged.
            </p>
            
            <?php if(!empty($error_msg)): ?>
            <div class="error-reason">
                <strong>Reason:</strong> <?php echo $error_msg; ?>
            </div>
            <?php endif; ?>
            
            <div class="mt-2">
                <a href="./" class="btn-retry">Try Again</a>
                <a href="contact.php" class="btn-support">Contact Support</a>
            </div>
        </div>
    </div>
</main>

<?php include 'includes/footer.php'; ?>

</body>
</html>
