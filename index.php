<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>
<?php require_once 'includes/functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mkelly – Buy Natural Organic Food Powders & Wellness Products</title>
    <base href="<?= BASE_URL ?>">
    <meta name="description" content="Shop natural, scientifically dried food powders, organic tea, beetroot and tomato powders at Mkelly. Premium quality and legacy of wellness.">
    <!-- SWIPER CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
<link rel="icon" type="image/x-icon" href="assets/images/logo/logo.png">


<!-- SWIPER JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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
                        muted: '#6B7280',
                        'muted-light': '#9CA3AF',
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
    
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
    
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <link href="assets/css/style.css?v=<?= time() ?>" rel="stylesheet">
</head>
<body>

<?php  include('includes/header.php')?>


<!-- HERO SLIDER -->
<section class="mkelly-hero-section">
    <div class="swiper heroSwiper">
        <div class="swiper-wrapper">

            <!-- Slide 1: Tomato -->
            <div class="swiper-slide">
                <div class="mkelly-hero-slide bg-orange">
                    <div class="mkelly-backdrop-text">Mkelly</div>
                    <img src="assets/images/slider/shpinat-2.png" alt="Spinach Leaf" class="mkelly-floating-leaf leaf-1">
                    <img src="assets/images/slider/shpinat-1.png" alt="Spinach Leaf" class="mkelly-floating-leaf leaf-2">
                    <img src="assets/images/slider/shpinat-3.png" alt="Spinach Leaf" class="mkelly-floating-leaf leaf-3">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6" data-aos="fade-right">
                                <div class="mkelly-hero-content">
                                    <span class="mkelly-hero-subtitle">CRAFTED TO PERFECTION</span>
                                    <h2 class="mkelly-hero-title">Flavor Meets <span class="accent-crimson">Nutrition</span></h2>
                                    <p class="mkelly-hero-desc">Enhance meals with nutrient-rich powders, blending taste and health effortlessly.</p>
                                    <a href="collection/best-seller" class="mkelly-hero-btn">Shop Now</a>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center" data-aos="fade-left">
                                <div class="mkelly-hero-img-wrapper">
                                    <img src="assets/images/slider/tomato.png" alt="Tomato Powder" class="mkelly-hero-main-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 2: Tea -->
            <div class="swiper-slide">
                <div class="mkelly-hero-slide bg-green">
                    <div class="mkelly-backdrop-text">Health</div>
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6" data-aos="fade-right">
                                <div class="mkelly-hero-content">
                                    <span class="mkelly-hero-subtitle">IMMUNITY BOOST</span>
                                    <h2 class="mkelly-hero-title">Health <span class="accent-crimson">Every Day</span></h2>
                                    <p class="mkelly-hero-desc">Boost your energy and immunity with our Cordyceps tea.</p>
                                    <a href="collection/best-seller" class="mkelly-hero-btn">Shop Now</a>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center" data-aos="fade-left">
                                <div class="mkelly-hero-img-wrapper">
                                    <img src="assets/images/slider/tea.png" alt="Cordyceps Tea" class="mkelly-hero-main-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Slide 3: Beetroot -->
            <div class="swiper-slide">
                <div class="mkelly-hero-slide bg-bittersweet">
                    <div class="mkelly-backdrop-text">Enjoy</div>
                    <img src="assets/images/slider/shpinat-3.png" alt="Spinach Leaf" class="mkelly-floating-leaf leaf-1">
                    <img src="assets/images/slider/shpinat-2.png" alt="Spinach Leaf" class="mkelly-floating-leaf leaf-2">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6" data-aos="fade-right">
                                <div class="mkelly-hero-content">
                                    <span class="mkelly-hero-subtitle">FRESHNESS REDEFINED</span>
                                    <h2 class="mkelly-hero-title">Organic Food <span class="accent-orange">Every Day</span></h2>
                                    <p class="mkelly-hero-desc">Scientifically dried products ensure less waste and more value.</p>
                                    <a href="collection/best-seller" class="mkelly-hero-btn">Shop Now</a>
                                </div>
                            </div>
                            <div class="col-lg-6 text-center" data-aos="fade-left">
                                <div class="mkelly-hero-img-wrapper">
                                    <img src="assets/images/slider/beetroot.png" alt="Beetroot Powder" class="mkelly-hero-main-img">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Navigation -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>

        <!-- Pagination -->
        <div class="swiper-pagination"></div>

    </div>
</section>

<script>
    /* HERO SWIPER */
var swiper = new Swiper(".heroSwiper", {

    loop: true,

    speed: 1200,

    autoplay: {
        delay: 4000,
        disableOnInteraction: false,
    },

    effect: "fade",

    fadeEffect: {
        crossFade: true,
    },

    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

});
</script>
    <?php  include('includes/trustbar.php')?>₹

    <section class="best-seller-section">
        <div class="container">
                <h2 class="best-seller-title text-center">BEST SELLER</h2>
                <a href="collection/best-seller ">
                    <img class="" src="assets/images/logo/Best Seller.png" style="margin-top:70px;">
                </a>
        </div>
    </section>



    <!-- Best Sellers Section -->
    <section class="best-seller-section bg-dark">
     <div class="container">

   

            
        <div class="row g-4">

            <?php 
                $conn = getSashDBConnection();
            
                $bestSellers = getProduct($conn);
                
              
                foreach ($bestSellers as $index => $prod): 
                    
                    $delay = ($index + 1) * 100;
            
                    // Product Image
                    $image = 'Product-Photos/' . $prod['photo_folder'] . '/' . $prod['photo1'];
                    
                    // print_r($image);
            
                    // Discount Calculation
                    $discount = 0;
            
                    if ($prod['price'] > 0 && $prod['sale_price'] > 0) {
            
                        $discount = round(
                            (($prod['price'] - $prod['sale_price']) / $prod['price']) * 100);
                    }
                
            ?>
    
    <div class="col-6 col-md-4 col-lg-3" 
         data-aos="fade-up" 
         data-aos-delay="<?= $delay ?>">

        <div class="product-card">

            <div class="product-image">

                <?php if ($discount > 0): ?>
                    <span class="product-badge">
                        <?= $discount ?>% OFF
                    </span>
                <?php endif; ?>

                <a href="product/<?= htmlspecialchars($prod['slug']) ?>">

                    <img src="<?= get_image_url('Product-Photos/' . $prod['photo_folder'] . '/' . $prod['photo1']) ?>"
                    alt="<?= htmlspecialchars($prod['product_name']) ?>">

                </a>

                <button class="quick-view-btn">
                    Quick View
                </button>

            </div>

            <div class="product-info">

                <h3 class="product-title">

                    <a href="product/<?= htmlspecialchars($prod['slug']) ?>" 
                       class="text-decoration-none text-dark">

                        <?= htmlspecialchars($prod['product_name']) ?>

                    </a>

                </h3>

                <div class="product-rating">

                    <span class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </span>

                    <span class="rating-text">
                        4.5 
                    </span>

                </div>

                <div class="product-price">

                    <?php if ($prod['sale_price'] > 0): ?>

                        <span class="original-price">
                            ₹<?= number_format($prod['price'], 2) ?>
                        </span>

                        <span class="current-price">
                            ₹<?= number_format($prod['sale_price'], 2) ?>
                        </span>

                    <?php else: ?>

                        <span class="current-price">
                            ₹<?= number_format($prod['price'], 2) ?>
                        </span>

                    <?php endif; ?>

                </div>

                <button class="add-to-cart-btn"
                        data-id="<?= $prod['id'] ?>"
                        data-name="<?= htmlspecialchars($prod['product_name']) ?>"
                        data-price="<?= $prod['sale_price'] > 0 ? $prod['sale_price'] : $prod['price'] ?>"
                        data-image="<?= htmlspecialchars($image) ?>">

                    Add to Cart

                </button>

            </div>

        </div>

    </div>

    <?php endforeach; ?>

</div>
            
            <div class="text-center mt-4">
                <a href="collection/all" class="text-decoration-none d-inline-flex align-items-center fw-semibold btn-primary-shop" style="color: #000000;">
                    View All Products <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>


<!--https://canva.link/6idh92arez3643f-->

    <!-- Shop By Purpose Section -->
    <section class="py-3" style="background: #FAFAFA;">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Shop By Purpose</h2>
            </div>
            
            <div class="row g-4">
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="100">
                    <a href="collection/love" class="text-decoration-none">
                        <div class="purpose-card">
                            <img src="assets/images/shop-by-purpose/1.jpg" alt="Love">
                            <div class="purpose-overlay">
                                <p class="purpose-label">Energies for deeper bonds.</p>
                                <h3 class="purpose-title">LOVE</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="150">
                    <a href="collection/marrige" class="text-decoration-none">
                        <div class="purpose-card">
                            <img src="assets/images/shop-by-purpose/2.jpg" alt="Marriage">
                            <div class="purpose-overlay">
                                <p class="purpose-label">Sacred Bond for Two</p>
                                <h3 class="purpose-title">MARRIAGE</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <a href="collection/gifting" class="text-decoration-none">
                        <div class="purpose-card">
                            <img src="assets/images/shop-by-purpose/3.jpg" alt="Gifts">
                            <div class="purpose-overlay">
                                <p class="purpose-label">Energy You Can Gift</p>
                                <h3 class="purpose-title">GIFTS</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="250">
                    <a href="collection/career" class="text-decoration-none">
                        <div class="purpose-card">
                            <img src="assets/images/shop-by-purpose/4.jpg" alt="Career">
                            <div class="purpose-overlay">
                                <p class="purpose-label">Fuel Your Ambition</p>
                                <h3 class="purpose-title">CAREER</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="300">
                    <a href="collection/health" class="text-decoration-none">
                        <div class="purpose-card">
                            <img src="assets/images/shop-by-purpose/5.jpg" alt="Health">
                            <div class="purpose-overlay">
                                <p class="purpose-label">Balance Your Energy</p>
                                <h3 class="purpose-title">HEALTH</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-2" data-aos="fade-up" data-aos-delay="350">
                    <a href="collection/money" class="text-decoration-none">
                        <div class="purpose-card">
                            <img src="assets/images/shop-by-purpose/6.jpg" alt="Money">
                            <div class="purpose-overlay">
                                <p class="purpose-label">Freedom Begins Here</p>
                                <h3 class="purpose-title">MONEY</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Spotlight Section -->
    <section class="py-3" style="background: white;">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Spotlight</h2>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100" >
                    <div class="spotlight-card border-3">
                        <img src="assets/images/spotlight/1.png" alt="Evil Eye">
                        <div class="spotlight-content">
                            <h3 class="spotlight-title">Evil eye</h3>
                            <a href="collection/evil-eye" class="explore-btn">Explore</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="spotlight-card border-3">
                        <img src="assets/images/spotlight/2.png" alt="Power of Pyrite">
                        <div class="spotlight-content">
                            <h3 class="spotlight-title">Power of Pyrite</h3>
                            <a href="collection/pyrite" class="explore-btn">Explore</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="spotlight-card border-3">
                        <img src="assets/images/spotlight/3.png" alt="Pendants">
                        <div class="spotlight-content">
                            <h3 class="spotlight-title">Pendants</h3>
                            <a href="collection/pendents" class="explore-btn">Explore</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Combo Deals Section -->
    <section class="py-3" style="background: #FFFDF2;">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Combo Deals</h2>
            </div>
            
        <div class="row g-4">

    <?php 
    $conn = getSashDBConnection();

    $bestSellers = getProducts($conn, 4);

    foreach ($bestSellers as $index => $prod): 
        
        $delay = ($index + 1) * 100;

        // Product Image
        $image = !empty($prod['photo1']) 
            ? get_image_url('Product-Photos/' . $prod['photo_folder'] . '/' . $prod['photo1']) 
            : 'assets/images/default-product.png';

        // Discount Calculation
        $discount = 0;

        if ($prod['price'] > 0 && $prod['sale_price'] > 0) {

            $discount = round(
                (($prod['price'] - $prod['sale_price']) / $prod['price']) * 100
            );
        }
    ?>

    <div class="col-6 col-md-4 col-lg-3" 
         data-aos="fade-up" 
         data-aos-delay="<?= $delay ?>">

        <div class="product-card">

            <div class="product-image">

                <?php if ($discount > 0): ?>
                    <span class="product-badge">
                        <?= $discount ?>% OFF
                    </span>
                <?php endif; ?>

                <a href="product/<?= htmlspecialchars($prod['slug']) ?>">

                    <img src="<?= htmlspecialchars($image) ?>" 
                         alt="<?= htmlspecialchars($prod['product_name']) ?>">

                </a>

                <button class="quick-view-btn">
                    Quick View
                </button>

            </div>

            <div class="product-info">

                <h3 class="product-title">

                    <a href="product/<?= htmlspecialchars($prod['slug']) ?>" 
                       class="text-decoration-none text-dark">

                        <?= htmlspecialchars($prod['product_name']) ?>

                    </a>

                </h3>

                <div class="product-rating">

                    <span class="stars">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </span>

                    <span class="rating-text">
                        4.5 (47)
                    </span>

                </div>

                <div class="product-price">

                    <?php if ($prod['sale_price'] > 0): ?>

                        <span class="original-price">
                            ₹<?= number_format($prod['price'], 2) ?>
                        </span>

                        <span class="current-price">
                            ₹<?= number_format($prod['sale_price'], 2) ?>
                        </span>

                    <?php else: ?>

                        <span class="current-price">
                            ₹<?= number_format($prod['price'], 2) ?>
                        </span>

                    <?php endif; ?>

                </div>

                <button class="add-to-cart-btn"
                        data-id="<?= $prod['id'] ?>"
                        data-name="<?= htmlspecialchars($prod['product_name']) ?>"
                        data-price="<?= $prod['sale_price'] > 0 ? $prod['sale_price'] : $prod['price'] ?>"
                        data-image="<?= htmlspecialchars($image) ?>">

                    Add to Cart

                </button>

            </div>

        </div>

    </div>

    <?php endforeach; ?>

</div>
            
            <div class="text-center mt-4">
                <a href="collection/all" class="text-decoration-none d-inline-flex align-items-center fw-semibold btn-primary-shop" style="color: #000000;">
                    View All Products <i class="fas fa-arrow-right ms-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Featured Product Section -->
    <!-- <section class="py-5" style="background: white;">
        <div class="container">
            <?php 
            // Fetch one featured product
            $featuredProducts = getProducts($conn, 1); 
            if (false && !empty($featuredProducts)):
                $feat = $featuredProducts[0];
                $featThumbnails = getProductImages($conn, $feat['id']);
                $featAllImages = array_merge([$feat['image']], $featThumbnails);
                $featDiscount = 0;
                if ($feat['price'] > 0 && $feat['sale_price'] > 0) {
                    $featDiscount = round((($feat['price'] - $feat['sale_price']) / $feat['price']) * 100);
                }
            ?>
            <div class="featured-product" data-aos="fade-up">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="featured-gallery">
                            <div class="featured-thumbnails">
                                <?php foreach ($featAllImages as $idx => $t): ?>
                                    <div class="featured-thumb <?= $idx === 0 ? 'active' : '' ?>" onclick="updateFeaturedImage('<?= get_image_url($t) ?>', this)">
                                        <img src="<?= get_image_url($t) ?>" alt="Thumbnail <?= $idx + 1 ?>">
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="featured-main-image">
                                <img src="<?= get_image_url($feat['image']) ?>" alt="<?= htmlspecialchars($feat['name']) ?>" id="featuredMainImg">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="featured-details">
                            <h2 class="featured-title">
                                <a href="product/<?= htmlspecialchars($feat['slug']) ?>" class="text-decoration-none text-dark">
                                    <?= htmlspecialchars($feat['name']) ?>
                                </a>
                            </h2>
                            <div class="featured-price-box">
                                <?php if ($feat['sale_price'] > 0): ?>
                                    <span class="featured-original-price">₹<?= number_format($feat['price'], 2) ?></span>
                                    <span class="featured-current-price">₹<?= number_format($feat['sale_price'], 2) ?></span>
                                    <?php if ($featDiscount > 0): ?>
                                        <span class="discount-badge"><?= $featDiscount ?>% OFF</span>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <span class="featured-current-price">₹<?= number_format($feat['price'], 2) ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="quantity-selector">
                                <button class="qty-btn" onclick="decreaseQty()">-</button>
                                <input type="text" class="qty-input" value="1" id="qtyInput" readonly>
                                <button class="qty-btn" onclick="increaseQty()">+</button>
                            </div>
                            <button class="btn-primary-custom add-to-cart-btn" 
                                    style="width: 100%; padding: 16px;"
                                    data-id="<?= $feat['id'] ?>" 
                                    data-name="<?= htmlspecialchars($feat['name']) ?>" 
                                    data-price="<?= $feat['sale_price'] > 0 ? $feat['sale_price'] : $feat['price'] ?>" 
                                    data-image="<?= get_image_url($feat['image']) ?>">
                                Add to Cart
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </section> -->

    <script>
    function updateFeaturedImage(src, el) {
        document.getElementById('featuredMainImg').src = src;
        document.querySelectorAll('.featured-thumb').forEach(t => t.classList.remove('active'));
        el.classList.add('active');
    }
    function increaseQty() {
        let input = document.getElementById('qtyInput');
        input.value = parseInt(input.value) + 1;
    }
    function decreaseQty() {
        let input = document.getElementById('qtyInput');
        if(parseInt(input.value) > 1) input.value = parseInt(input.value) - 1;
    }
    </script>


    
        

    <!-- Trust Badges & Contact Section -->
    <!--<section class="py-5" style="-->
    <!--    background: url('assets/images/free_expert.jpg') center center / 100% 100% no-repeat;-->
    <!--    width: 100%;-->
    <!--     background-size: cover;-->
    <!--">-->
    <!--    <div class="container">-->
    <!--        <div class="row g-4 align-items-center">-->
    <!--            <div class="col-lg-6" data-aos="fade-right">-->
    <!--                <div class="d-flex flex-wrap gap-4">-->
    <!--                    <div class="d-flex align-items-center gap-3">-->
    <!--                        <div style="width: 50px; height: 50px; background: #FCE8E6; border-radius: 50%; display: flex; align-items: center; justify-content: center;">-->
    <!--                            <i class="fas fa-check-circle" style="color: #C11712; font-size: 24px;"></i>-->
    <!--                        </div>-->
    <!--                        <span class="fw-medium" style="font-size: 18px !important;">Guarantee of Purity</span>-->
    <!--                    </div>-->
    <!--                    <div class="d-flex align-items-center gap-3">-->
    <!--                        <div style="width: 50px; height: 50px; background: #FCE8E6; border-radius: 50%; display: flex; align-items: center; justify-content: center;">-->
    <!--                            <i class="fas fa-leaf" style="color: #C11712; font-size: 24px;"></i>-->
    <!--                        </div>-->
    <!--                        <span class="fw-medium"  style="font-size: 18px !important;">Ethically Sourced</span>-->
    <!--                    </div>-->
    <!--                    <div class="d-flex align-items-center gap-3">-->
    <!--                        <div style="width: 50px; height: 50px; background: #FCE8E6; border-radius: 50%; display: flex; align-items: center; justify-content: center;">-->
    <!--                            <i class="fas fa-certificate" style="color: #C11712; font-size: 24px;"></i>-->
    <!--                        </div>-->
    <!--                        <span class="fw-medium"  style="font-size: 18px !important;">100% Lab Certified</span>-->
    <!--                    </div>-->
    <!--                    <div class="d-flex align-items-center gap-3">-->
    <!--                        <div style="width: 50px; height: 50px; background: #FCE8E6; border-radius: 50%; display: flex; align-items: center; justify-content: center;">-->
    <!--                            <i class="fas fa-trophy" style="color: #C11712; font-size: 24px;"></i>-->
    <!--                        </div>-->
    <!--                        <span class="fw-medium"  style="font-size: 18px !important;">25 Years of Legacy</span>-->
    <!--                    </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--          <div class="col-lg-6" data-aos="fade-left">-->
    <!--            <div class="contact-form-section">-->

    <!--                <div class="form-badge">-->
    <!--                    ✨ Free Expert Guidance-->
    <!--                </div>-->
            
    <!--                <h3 class="contact-form-title">-->
    <!--                    Not Sure What to Buy?-->
    <!--                </h3>-->
            
    <!--                <p class="contact-form-subtitle">-->
    <!--                    Drop your number and our spiritual experts will help you choose the perfect product for your needs.-->
    <!--                </p>-->
            
    <!--                <form class="contact-form">-->
            
    <!--                    <div class="input-group-custom">-->
    <!--                        <i class="fa-regular fa-user"></i>-->
    <!--                        <input type="text" class="form-input" placeholder="Enter Your Name" required>-->
    <!--                    </div>-->
            
    <!--                    <div class="input-group-custom phone-group">-->
    <!--                        <span class="country-code">+91</span>-->
            
    <!--                        <input -->
    <!--                            type="tel" -->
    <!--                            class="form-input phone-input" -->
    <!--                            placeholder="Enter Mobile Number" -->
    <!--                            required-->
    <!--                        >-->
    <!--                    </div>-->
            
    <!--                    <button type="submit" class="btn-primary-custom">-->
    <!--                        Get Free Consultation-->
    <!--                        <span>→</span>-->
    <!--                    </button>-->
            
    <!--                </form>-->
            
    <!--            </div>-->
    <!--            </div>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </section>-->

    <!-- Why Astroyogi Section -->
    <section class="trust-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title" style="color: white;">Why Mkelly?</h2>
                <p class="text-white-50 mx-auto" style="max-width: 800px;">
                    Trust is our core value at Mkelly, where authenticity is key. We process our products under scientific controls, using premium ingredients free from synthetic chemicals. With a strong legacy of quality and innovation, every product is crafted with care, integrity, and tradition.
                </p>
            </div>
            
            <div class="row g-4">
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="trust-badge-item">
                        <div class="trust-badge-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <h4 class="trust-badge-title">Authenticity is Our Promise</h4>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="trust-badge-item">
                        <div class="trust-badge-icon">
                            <i class="fas fa-trophy"></i>
                        </div>
                        <h4 class="trust-badge-title">25 Years Of Legacy</h4>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="trust-badge-item">
                        <div class="trust-badge-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h4 class="trust-badge-title">Lab Certified</h4>
                    </div>
                </div>
                <div class="col-6 col-md-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="trust-badge-item">
                        <div class="trust-badge-icon">
                            <i class="fas fa-heart"></i>
                        </div>
                        <h4 class="trust-badge-title">Empowered & Ethical</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Celebrities Section -->
    <!-- <section class="celebrities-section">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="section-title">Loved by India's Leading Celebrities</h2>
                <img src="data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='200' height='20'%3E%3Cpath d='M0 10 Q50 0 100 10 T200 10' stroke='%23F5C518' stroke-width='3' fill='none'/%3E%3C/svg%3E" alt="Underline" class="mt-2">
            </div>
            
            <div class="row g-4 justify-content-center">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="celebrity-video-card">
                        <div class="celebrity-video d-flex align-items-center justify-content-center">
                            <i class="fas fa-play-circle" style="font-size: 60px; color: rgba(255,255,255,0.8);"></i>
                        </div>
                        <p class="celebrity-caption">An "Engaged" show couple finds warmth & harmony with Rose Quartz Bracelet</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="celebrity-video-card">
                        <div class="celebrity-video d-flex align-items-center justify-content-center">
                            <i class="fas fa-play-circle" style="font-size: 60px; color: rgba(255,255,255,0.8);"></i>
                        </div>
                        <p class="celebrity-caption">Ankita Lokhande trusts Astroyogi crystals for clarity, balance, and good vibes.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="celebrity-video-card">
                        <div class="celebrity-video d-flex align-items-center justify-content-center">
                            <i class="fas fa-play-circle" style="font-size: 60px; color: rgba(255,255,255,0.8);"></i>
                        </div>
                        <p class="celebrity-caption">Shalini Passi says Amethyst Harmony Tree brings positivity to her home.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <!-- Testimonials Section -->
    <?php include('includes/testimonials.php')?>


    <!-- Publications Section -->
    <!-- <section class="publications-section">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Astroyogi Featured in Leading Publications</h2>
            </div>
            
            <div class="row g-4">
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <div class="publication-card">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0f/The_Economic_Times_logo.svg/200px-The_Economic_Times_logo.svg.png" alt="Economic Times" class="publication-logo">
                        <p class="publication-text">The Economic Times mentions how Astroyogi is scaling digital spiritual services for Gen Z</p>
                        <a href="#" class="read-more-link">Read More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <div class="publication-card">
                        <img src="https://upload.wikimedia.org/wikipedia/en/thumb/3/3a/Financial_Express_India_logo.svg/200px-Financial_Express_India_logo.svg.png" alt="Financial Express" class="publication-logo">
                        <p class="publication-text">Financial Express features how Astroyogi is reshaping spiritual retail experiences</p>
                        <a href="#" class="read-more-link">Read More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="publication-card">
                        <div style="height: 40px; display: flex; align-items: center; margin-bottom: 16px;">
                            <span style="font-weight: 700; font-size: 18px; color: #000000;">ETV Bharat</span>
                        </div>
                        <p class="publication-text">ETV Bharat spotlights how Astroyogi is tapping Gen Z's rising interest in crystals</p>
                        <a href="#" class="read-more-link">Read More</a>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="publication-card">
                        <div style="height: 40px; display: flex; align-items: center; margin-bottom: 16px;">
                            <span style="font-weight: 700; font-size: 18px; color: #000000;">Indian Express</span>
                        </div>
                        <p class="publication-text">Indian Express highlights Astroyogi's blend of astrology, crystals, and modern style</p>
                        <a href="#" class="read-more-link">Read More</a>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

    <?php include('includes/footer.php')?>