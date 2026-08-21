<?php 
require_once 'includes/functions.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Products - Mkelly Biotech</title>
    <base href="<?= BASE_URL ?>">
    <meta name="description" content="Explore our premium range of organic food powders, mushroom atta, and wellness products at Mkelly Biotech.">
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
        <h1 class="display-4 fw-bold font-serif mb-3" data-aos="fade-up">Our Products</h1>
        <p class="lead mb-0" data-aos="fade-up" data-aos-delay="100">All the best items for you, crafted with science and nature.</p>
    </div>
</section>

<!-- Content -->
<section class="py-5 my-5">
    <div class="container">
        
        <div class="row text-center mb-5">
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="p-4 bg-white rounded shadow-sm h-100 border-top border-primary border-4">
                    <i class="fas fa-leaf fa-3x text-primary mb-3"></i>
                    <h3 class="h5 fw-bold">Rich Flavour Powders</h3>
                    <p class="text-muted small">Enhance the flavor and nutrition of snacks, soups, stews, and fast foods effortlessly.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="p-4 bg-white rounded shadow-sm h-100 border-top border-primary border-4">
                    <i class="fas fa-box fa-3x text-primary mb-3"></i>
                    <h3 class="h5 fw-bold">Efficient Storage</h3>
                    <p class="text-muted small">Our products have a longer shelf life, ensuring less wastage, lightweight storage, and more value.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="p-4 bg-white rounded shadow-sm h-100 border-top border-primary border-4">
                    <i class="fas fa-heartbeat fa-3x text-primary mb-3"></i>
                    <h3 class="h5 fw-bold">Nutrient Powders</h3>
                    <p class="text-muted small">Dried under controlled conditions, keeping nutrients intact and blending easily into any meal.</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-5" data-aos="fade-up">
            <h2 class="font-serif fw-bold mb-4">Discover Our Full Range</h2>
            <a href="collection/all" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold" style="background-color: #054B2C; border: none;">
                Shop All Products <i class="fas fa-arrow-right ms-2"></i>
            </a>
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
