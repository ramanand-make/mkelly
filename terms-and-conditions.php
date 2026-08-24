<?php 
require_once 'includes/functions.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms & Conditions - Mkelly Biotech</title>
    <base href="<?= BASE_URL ?>">
    <meta name="description" content="Terms and Conditions for Mkelly Biotech services and products.">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#054B2C',
                        secondary: '#000000',
                        accent: '#C11712',
                        background: '#FAFAFA',
                        surface: '#FFFFFF',
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                    }
                }
            }
        }
    </script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css?v=<?= time() ?>" rel="stylesheet">
</head>
<body class="bg-background">

<?php include('includes/header.php') ?>

<section class="position-relative overflow-hidden text-white py-5" style="background: linear-gradient(135deg, #054B2C 0%, #0a7344 100%);">
    <!-- Decorative background elements -->
    <div class="position-absolute" style="top: -20%; right: -5%; width: 300px; height: 300px; background: rgba(255,255,255,0.05); border-radius: 50%; filter: blur(40px);"></div>
    <div class="position-absolute" style="bottom: -20%; left: -5%; width: 250px; height: 250px; background: rgba(193,23,18,0.15); border-radius: 50%; filter: blur(40px);"></div>
    
    <div class="container text-center py-5 position-relative" style="z-index: 2;">
        <span class="badge rounded-pill text-uppercase px-3 py-2 mb-3" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); letter-spacing: 1.5px;">Legal</span>
        <h1 class="display-4 fw-bold font-serif mb-3">Terms & Conditions</h1>
        <p class="lead mx-auto mb-0 text-white-50" style="max-width: 600px;">Please read these terms carefully before using our website.</p>
    </div>
</section>

<section class="py-5 my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 p-5 bg-white rounded shadow-sm">
                <h3 class="fw-bold mb-4" style="color: #054B2C;">1. Acceptance of Terms</h3>
                <p class="text-muted mb-4">By accessing and using the Mkelly Biotech website, you accept and agree to be bound by the terms and provision of this agreement.</p>

                <h3 class="fw-bold mb-4" style="color: #054B2C;">2. Products and Services</h3>
                <p class="text-muted mb-4">We reserve the right to modify or discontinue any product or service without notice at any time. We shall not be liable to you or to any third-party for any modification, price change, suspension or discontinuance of the service.</p>

                <h3 class="fw-bold mb-4" style="color: #054B2C;">3. Accuracy of Information</h3>
                <p class="text-muted mb-4">We are not responsible if information made available on this site is not accurate, complete or current. The material on this site is provided for general information only.</p>

                <h3 class="fw-bold mb-4" style="color: #054B2C;">4. Payment terms</h3>
                <p class="text-muted mb-4">All prices are subject to change without notice. We reserve the right at any time to modify or discontinue the Service (or any part or content thereof) without notice at any time.</p>

                <h3 class="fw-bold mb-4" style="color: #054B2C;">5. Contact Information</h3>
                <p class="text-muted mb-0">Questions about the Terms of Service should be sent to us at <a href="mailto:mkellybiotech@gmail.com" class="text-primary">mkellybiotech@gmail.com</a>.</p>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php') ?>
</body>
</html>
