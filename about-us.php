<?php 
require_once 'includes/functions.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Mkelly Biotech</title>
    <base href="<?= BASE_URL ?>">
    <meta name="description" content="Learn about Mkelly Biotech, driving innovation in sustainable biotechnology and providing premium natural organic food powders.">
    <!-- Tailwind CSS -->
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
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="assets/css/style.css?v=<?= time() ?>" rel="stylesheet">
</head>
<body class="bg-background">

<?php include('includes/header.php') ?>

<!-- Page Header -->
<section class="bg-primary text-white py-5" style="background-color: #054B2C;">
    <div class="container text-center py-5">
        <h1 class="display-4 fw-bold font-serif mb-3" data-aos="fade-up">About Us</h1>
        <p class="lead mb-0" data-aos="fade-up" data-aos-delay="100">Where Innovation Meets Excellence In Biotechnology</p>
    </div>
</section>

<!-- Content -->
<section class="py-5 my-5">
    <div class="container">
        <div class="row align-items-center mb-5">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                <img src="assets/images/slider/tomato.png" alt="Mkelly Biotech" class="img-fluid rounded shadow-sm bg-orange">
            </div>
            <div class="col-lg-6" data-aos="fade-left">
                <h2 class="font-serif fw-bold mb-4" style="color: #054B2C;">Driving Innovation in Sustainable Biotechnology</h2>
                <p class="mb-3 text-muted">At Mkelly Biotech Pvt. Ltd., we believe that health and flavor should go hand in hand. Our mission is to enhance everyday meals with nutrient-rich powders that blend seamlessly into your cooking, offering both taste and vital nutrition effortlessly.</p>
                <p class="mb-3 text-muted">We specialize in scientifically dried products that ensure less waste and more value. By carefully controlling the drying process, we ensure that our powders retain their essential nutrients while offering a smooth flow and even dispersibility.</p>
                <p class="mb-4 text-muted">Skip the time-consuming steps like roasting—simply add our premium powders directly to your dishes for quick, hassle-free cooking. From multi-grain mushroom atta to beetroot, ginger, and garlic powders, we bring the best of nature to your kitchen.</p>
                <div class="d-flex gap-4 mt-4">
                    <div class="text-center">
                        <h3 class="fw-bold text-primary mb-1">100%</h3>
                        <p class="small text-muted mb-0">Organic</p>
                    </div>
                    <div class="text-center">
                        <h3 class="fw-bold text-primary mb-1">25+</h3>
                        <p class="small text-muted mb-0">Years Legacy</p>
                    </div>
                    <div class="text-center">
                        <h3 class="fw-bold text-primary mb-1">Lab</h3>
                        <p class="small text-muted mb-0">Certified</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>

<?php include('includes/footer.php') ?>
</body>
</html>
