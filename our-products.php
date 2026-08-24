<?php 
require_once 'includes/functions.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
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
<section class="position-relative overflow-hidden text-white py-5" style="background: linear-gradient(135deg, #054B2C 0%, #0a7344 100%);">
    <!-- Decorative background elements -->
    <div class="position-absolute" style="top: -20%; right: -5%; width: 300px; height: 300px; background: rgba(255,255,255,0.05); border-radius: 50%; blur(40px);"></div>
    <div class="position-absolute" style="bottom: -20%; left: -5%; width: 250px; height: 250px; background: rgba(193,23,18,0.15); border-radius: 50%; blur(40px);"></div>
    
    <div class="container text-center py-5 position-relative" style="z-index: 2;">
        <span class="badge rounded-pill text-uppercase px-3 py-2 mb-3" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); letter-spacing: 1.5px;">Premium Quality</span>
        <h1 class="display-3 fw-bold font-serif mb-4" data-aos="fade-up">Our Products</h1>
        <p class="lead mx-auto mb-0 text-white-50" data-aos="fade-up" data-aos-delay="100" style="max-width: 600px;">Crafted with science and nature to bring you the best in organic nutrition and wellness.</p>
    </div>
</section>

<!-- Content -->
<style>
    .product-feature-card {
        background: #ffffff;
        border-radius: 1.5rem;
        padding: 3rem 2rem;
        box-shadow: 0 10px 30px rgba(0,0,0,0.05);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid rgba(0,0,0,0.03);
        position: relative;
        overflow: hidden;
        z-index: 1;
    }
    .product-feature-card::after {
        content: '';
        position: absolute;
        top: 0; left: 0; right: 0; height: 5px;
        background: linear-gradient(90deg, #054B2C, #C11712);
        opacity: 0;
        transition: opacity 0.3s ease;
    }
    .product-feature-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }
    .product-feature-card:hover::after {
        opacity: 1;
    }
    .pf-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 2rem;
        background: rgba(5, 75, 44, 0.05);
        color: #054B2C;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2rem;
        transition: all 0.5s ease;
    }
    .product-feature-card:hover .pf-icon {
        background: #054B2C;
        color: #ffffff;
        transform: rotateY(180deg);
        box-shadow: 0 10px 20px rgba(5, 75, 44, 0.3);
    }
</style>

<section class="py-5 my-5 bg-background">
    <div class="container">
        
        <div class="row text-center mb-5 justify-content-center">
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="product-feature-card h-100">
                    <div class="pf-icon">
                        <i class="fas fa-leaf"></i>
                    </div>
                    <h3 class="h4 fw-bold text-dark mb-3">Rich Flavour Powders</h3>
                    <p class="text-muted">Enhance the flavor and nutrition of snacks, soups, stews, and fast foods effortlessly with our natural blends.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="product-feature-card h-100">
                    <div class="pf-icon">
                        <i class="fas fa-box-open"></i>
                    </div>
                    <h3 class="h4 fw-bold text-dark mb-3">Efficient Storage</h3>
                    <p class="text-muted">Our products have a longer shelf life, ensuring less wastage, lightweight storage, and unbeatable value.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="product-feature-card h-100">
                    <div class="pf-icon">
                        <i class="fas fa-heartbeat"></i>
                    </div>
                    <h3 class="h4 fw-bold text-dark mb-3">Nutrient Powders</h3>
                    <p class="text-muted">Dried under controlled conditions, keeping essential nutrients intact and blending seamlessly into any meal.</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-5" data-aos="zoom-in" data-aos-delay="400">
            <div class="p-5 bg-white rounded-4 shadow-sm border border-light position-relative overflow-hidden">
                <div class="position-absolute opacity-10" style="right: -5%; top: -20%; font-size: 200px; color: #054B2C;">
                    <i class="fas fa-shopping-bag"></i>
                </div>
                <h2 class="font-serif fw-bold mb-3 display-6" style="color: #054B2C;">Discover Our Full Range</h2>
                <p class="text-muted mb-4 mx-auto" style="max-width: 500px;">Browse our extensive collection of high-quality, organic health and wellness products designed for your lifestyle.</p>
                <a href="collection/all" class="btn btn-lg px-5 py-3 rounded-pill fw-bold text-white shadow" style="background: linear-gradient(90deg, #054B2C, #0a7344); border: none; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                    Shop All Products <i class="fas fa-arrow-right ms-2"></i>
                </a>
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
