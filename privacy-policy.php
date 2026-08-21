<?php 
require_once 'includes/functions.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy Policy - Mkelly Biotech</title>
    <base href="<?= BASE_URL ?>">
    <meta name="description" content="Privacy Policy of Mkelly Biotech. Learn how we handle and protect your personal information.">
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

<section class="bg-primary text-white py-5" style="background-color: #054B2C;">
    <div class="container text-center py-5">
        <h1 class="display-4 fw-bold font-serif mb-3">Privacy Policy</h1>
        <p class="lead mb-0">Your privacy is critically important to us.</p>
    </div>
</section>

<section class="py-5 my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 p-5 bg-white rounded shadow-sm">
                <h3 class="fw-bold mb-4" style="color: #054B2C;">1. Information We Collect</h3>
                <p class="text-muted mb-4">We collect information that you provide directly to us when you create an account, make a purchase, or communicate with us. This may include your name, email address, phone number, shipping address, and payment information.</p>

                <h3 class="fw-bold mb-4" style="color: #054B2C;">2. How We Use Your Information</h3>
                <p class="text-muted mb-4">We use the information we collect to process your orders, deliver products, communicate with you about your order status, and send you promotional materials if you have opted in to receive them.</p>

                <h3 class="fw-bold mb-4" style="color: #054B2C;">3. Data Security</h3>
                <p class="text-muted mb-4">We implement appropriate technical and organizational measures to protect the security of your personal information. However, please note that no method of transmission over the internet or electronic storage is 100% secure.</p>

                <h3 class="fw-bold mb-4" style="color: #054B2C;">4. Sharing of Information</h3>
                <p class="text-muted mb-4">We do not sell, trade, or otherwise transfer your personally identifiable information to outside parties, except to trusted third parties who assist us in operating our website and conducting our business, as long as those parties agree to keep this information confidential.</p>

                <h3 class="fw-bold mb-4" style="color: #054B2C;">5. Contact Us</h3>
                <p class="text-muted mb-0">If you have any questions about this Privacy Policy, please contact us at <a href="mailto:mkellybiotech@gmail.com" class="text-primary">mkellybiotech@gmail.com</a>.</p>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php') ?>
</body>
</html>
