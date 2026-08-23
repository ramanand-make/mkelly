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
                    $image = !empty($prod['photo1']) ? 'Product-Photos/' . $prod['photo_folder'] . '/' . $prod['photo1'] : '';
                    
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

                    <img src="<?= get_image_url($image) ?>"
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

    <!-- Shop By Categories Section -->
    <section class="py-5" style="background: #FAFAFA;">
        <div class="container">
            <div class="section-header" data-aos="fade-up">
                <h2 class="section-title">Shop by Categories</h2>
            </div>
            
            <div class="row g-4 justify-content-center">
                <div class="col-6 col-md-3 col-lg-3" data-aos="fade-up" data-aos-delay="100">
                    <a href="collection/powder" class="text-decoration-none">
                        <div class="purpose-card">
                            <img src="assets/images/slider/beetroot.png" alt="Powder">
                            <div class="purpose-overlay">
                                <p class="purpose-label">Premium Natural Powders</p>
                                <h3 class="purpose-title">POWDER</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-3" data-aos="fade-up" data-aos-delay="150">
                    <a href="collection/atta" class="text-decoration-none">
                        <div class="purpose-card">
                            <img src="assets/images/slider/tomato.png" alt="Atta">
                            <div class="purpose-overlay">
                                <p class="purpose-label">Nutritious Blends</p>
                                <h3 class="purpose-title">ATTA</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-3" data-aos="fade-up" data-aos-delay="200">
                    <a href="collection/supplements" class="text-decoration-none">
                        <div class="purpose-card">
                            <img src="assets/images/slider/tea.png" alt="Supplements">
                            <div class="purpose-overlay">
                                <p class="purpose-label">Daily Health Support</p>
                                <h3 class="purpose-title">SUPPLEMENTS</h3>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-3" data-aos="fade-up" data-aos-delay="250">
                    <a href="collection/wellness" class="text-decoration-none">
                        <div class="purpose-card">
                            <img src="assets/images/slider/As1.png" alt="Wellness">
                            <div class="purpose-overlay">
                                <p class="purpose-label">Holistic Wellbeing</p>
                                <h3 class="purpose-title">WELLNESS</h3>
                            </div>
                        </div>
                    </a>
                </div>
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

    <!-- Best Features Section -->
    <section class="py-5" style="background-color: #054B2C; color: white;">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="text-white-50 text-uppercase tracking-wide fw-bold">Features</span>
                <h2 class="display-5 fw-bold font-serif">Best Features</h2>
                <p class="lead">Enhanced Everyday Meals</p>
            </div>
            
            <div class="row g-4 justify-content-center text-center">
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="p-4 rounded h-100" style="background: rgba(255,255,255,0.05); border-top: 4px solid #C11712;">
                        <i class="fas fa-box-open fa-3x mb-3 text-white"></i>
                        <h4 class="fw-bold">Efficient Storage</h4>
                        <p class="text-white-50 mb-0">Our powders extend shelf life, reduce waste, and stay lightweight and easy to store.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="p-4 rounded h-100" style="background: rgba(255,255,255,0.05); border-top: 4px solid #C11712;">
                        <i class="fas fa-leaf fa-3x mb-3 text-white"></i>
                        <h4 class="fw-bold">Nutrient Powders</h4>
                        <p class="text-white-50 mb-0">Dried under control, our powders keep nutrients intact and blend easily, skipping roasting.</p>
                    </div>
                </div>
                <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="p-4 rounded h-100" style="background: rgba(255,255,255,0.05); border-top: 4px solid #C11712;">
                        <i class="fas fa-utensils fa-3x mb-3 text-white"></i>
                        <h4 class="fw-bold">Flavor Boost</h4>
                        <p class="text-white-50 mb-0">Add nutrients to meals; even picky eaters won't notice hidden garlic, onions, or ginger!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Shipping & Payment Section -->
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <h2 class="display-6 fw-bold font-serif text-primary" style="color: #054B2C;">Shipping and payment</h2>
                <p class="text-muted fw-medium">We'll do it as fast as possible</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-4" data-aos="fade-right" data-aos-delay="100">
                    <div class="d-flex p-4 shadow-sm rounded h-100 bg-light border-start border-4" style="border-color: #C11712 !important;">
                        <div class="me-3">
                            <i class="fas fa-shopping-basket fa-2x" style="color: #C11712;"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold text-dark">Order</h4>
                            <p class="text-muted mb-0">A seamless shopping experience—browse, select, and place orders effortlessly with our easy-to-use platform.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="d-flex p-4 shadow-sm rounded h-100 bg-light border-start border-4" style="border-color: #C11712 !important;">
                        <div class="me-3">
                            <i class="fas fa-credit-card fa-2x" style="color: #C11712;"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold text-dark">Payment</h4>
                            <p class="text-muted mb-0">Safe and secure payment options to ensure smooth transactions every time you shop.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4" data-aos="fade-left" data-aos-delay="300">
                    <div class="d-flex p-4 shadow-sm rounded h-100 bg-light border-start border-4" style="border-color: #C11712 !important;">
                        <div class="me-3">
                            <i class="fas fa-shipping-fast fa-2x" style="color: #C11712;"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold text-dark">Delivery</h4>
                            <p class="text-muted mb-0">Fast, reliable, and free delivery on all orders—your favorite products brought to your doorstep quickly.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted Brands Section -->
    <section class="py-5" style="background-color: #FAFAFA;">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-center align-items-center gap-5 opacity-75">
                <img src="assets/images/brands/1.png" alt="Partner 1" height="60" data-aos="zoom-in" data-aos-delay="100" style="object-fit: contain; filter: grayscale(100%);">
                <img src="assets/images/brands/2.png" alt="Partner 2" height="60" data-aos="zoom-in" data-aos-delay="200" style="object-fit: contain; filter: grayscale(100%);">
                <img src="assets/images/brands/3.png" alt="Partner 3" height="60" data-aos="zoom-in" data-aos-delay="300" style="object-fit: contain; filter: grayscale(100%);">
                <img src="assets/images/brands/4.png" alt="Partner 4" height="60" data-aos="zoom-in" data-aos-delay="400" style="object-fit: contain; filter: grayscale(100%);">
                <img src="assets/images/brands/5.png" alt="Partner 5" height="60" data-aos="zoom-in" data-aos-delay="500" style="object-fit: contain; filter: grayscale(100%);">
                <img src="assets/images/brands/7.png" alt="Partner 6" height="60" data-aos="zoom-in" data-aos-delay="600" style="object-fit: contain; filter: grayscale(100%);">
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