<?php 
require_once 'includes/functions.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Refund Policy - Mkelly Biotech</title>
    <base href="<?= BASE_URL ?>">
    <meta name="description" content="Refund Policy for Mkelly Biotech products.">
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
        <h1 class="display-4 fw-bold font-serif mb-3">Refund Policy</h1>
        <p class="lead mb-0">Our policy regarding returns and refunds.</p>
    </div>
</section>

<section class="py-5 my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 p-5 bg-white rounded shadow-sm">
                <h3 class="fw-bold mb-4" style="color: #054B2C;">1. Returns</h3>
                <p class="text-muted mb-4">Our return policy lasts 7 days. If 7 days have gone by since your purchase, unfortunately, we can’t offer you a refund or exchange. To be eligible for a return, your item must be unused and in the same condition that you received it. It must also be in the original packaging.</p>

                <h3 class="fw-bold mb-4" style="color: #054B2C;">2. Refunds</h3>
                <p class="text-muted mb-4">Once your return is received and inspected, we will send you an email to notify you that we have received your returned item. We will also notify you of the approval or rejection of your refund. If you are approved, then your refund will be processed, and a credit will automatically be applied to your credit card or original method of payment, within a certain amount of days.</p>

                <h3 class="fw-bold mb-4" style="color: #054B2C;">3. Late or missing refunds</h3>
                <p class="text-muted mb-4">If you haven’t received a refund yet, first check your bank account again. Then contact your credit card company, it may take some time before your refund is officially posted. Next contact your bank. There is often some processing time before a refund is posted.</p>

                <h3 class="fw-bold mb-4" style="color: #054B2C;">4. Shipping Returns</h3>
                <p class="text-muted mb-4">To return your product, you should mail your product to: 101, Mata Gujri Avenue, Bhago Majra, Kharar, Mohali (Punjab) - 140301. You will be responsible for paying for your own shipping costs for returning your item. Shipping costs are non-refundable.</p>
            </div>
        </div>
    </div>
</section>

<?php include('includes/footer.php') ?>
</body>
</html>
