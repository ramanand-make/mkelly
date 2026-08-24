<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
?>
<?php require_once 'includes/functions.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mkelly – Buy Natural Organic Food Powders & Wellness Products</title>
    <base href="<?= BASE_URL ?>">
    <meta name="description" content="Shop natural, scientifically dried food powders, organic tea, beetroot and tomato powders at Mkelly. Premium quality and legacy of wellness.">
    <!-- SWIPER CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>



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
                <a href="collection/all" class="text-decoration-none d-inline-flex align-items-center fw-semibold btn-primary-shop" style="color: ;">
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
    <style>
        .feature-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            border-radius: 1.25rem;
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            position: relative;
            overflow: hidden;
            z-index: 1;
        }
        .feature-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(135deg, rgba(193, 23, 18, 0.15) 0%, transparent 60%);
            opacity: 0;
            transition: opacity 0.4s ease;
            z-index: -1;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
            border-color: rgba(193, 23, 18, 0.4);
        }
        .feature-card:hover::before {
            opacity: 1;
        }
        .feature-icon-wrapper {
            width: 85px;
            height: 85px;
            margin: 0 auto 1.75rem;
            background: linear-gradient(135deg, #C11712, #ff4d4d);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 10px 25px rgba(193, 23, 18, 0.5);
            transition: all 0.4s ease;
        }
        .feature-card:hover .feature-icon-wrapper {
            transform: scale(1.1) rotate(5deg);
            box-shadow: 0 15px 30px rgba(193, 23, 18, 0.7);
        }
        .feature-title {
            font-size: 1.35rem;
            font-weight: 700;
            margin-bottom: 1rem;
            color: #ffffff;
            letter-spacing: 0.5px;
        }
        .feature-desc {
            color: rgba(255, 255, 255, 0.75);
            line-height: 1.7;
            font-size: 1rem;
        }
        .decorative-blob {
            position: absolute;
            background: rgba(193, 23, 18, 0.25);
            filter: blur(80px);
            border-radius: 50%;
            z-index: 0;
            pointer-events: none;
        }
    </style>
    <section class="py-5 position-relative" style="background-color: #054B2C; color: white; overflow: hidden;">
        <!-- Decorative elements -->
        <div class="decorative-blob" style="top: -10%; left: -5%; width: 300px; height: 300px;"></div>
        <div class="decorative-blob" style="bottom: -10%; right: -5%; width: 300px; height: 300px;"></div>
        
        <div class="container position-relative" style="z-index: 2;">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge rounded-pill text-uppercase px-3 py-2 mb-3 shadow-sm" style="background: rgba(193, 23, 18, 0.2); border: 1px solid rgba(193, 23, 18, 0.3); color: #ffcccc; letter-spacing: 1.5px;">Why Choose Us</span>
                <h2 class="display-5 fw-bold font-serif mb-3">Best Features</h2>
                <p class="lead text-white-50 mx-auto" style="max-width: 600px;">Experience the difference with our enhanced everyday meals, crafted to deliver uncompromising nutrition, flavor, and convenience.</p>
            </div>
            
            <div class="row g-4 justify-content-center text-center">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="feature-card p-5 h-100">
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-box-open fa-2x text-white"></i>
                        </div>
                        <h4 class="feature-title">Efficient Storage</h4>
                        <p class="feature-desc mb-0">Our powders dramatically extend shelf life, reduce waste, and remain incredibly lightweight and easy to store anywhere.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="feature-card p-5 h-100">
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-leaf fa-2x text-white"></i>
                        </div>
                        <h4 class="feature-title">Nutrient Powders</h4>
                        <p class="feature-desc mb-0">Dried carefully under controlled conditions, our powders keep nutrients intact and blend easily without roasting.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="feature-card p-5 h-100">
                        <div class="feature-icon-wrapper">
                            <i class="fas fa-utensils fa-2x text-white"></i>
                        </div>
                        <h4 class="feature-title">Flavor Boost</h4>
                        <p class="feature-desc mb-0">Add hidden nutrients to meals effortlessly; even the pickiest eaters won't notice the extra garlic, onions, or ginger!</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Shipping & Payment Section -->
    <style>
        .service-card {
            background: #ffffff;
            border-radius: 1rem;
            padding: 2.5rem 1.5rem;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            transition: all 0.4s ease;
            position: relative;
            z-index: 1;
            overflow: hidden;
            text-align: center;
            border: 1px solid rgba(0,0,0,0.05);
        }
        .service-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; height: 4px;
            background: linear-gradient(90deg, #054B2C, #C11712);
            opacity: 0;
            transition: opacity 0.4s ease;
        }
        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
        }
        .service-card:hover::before {
            opacity: 1;
        }
        .service-icon {
            width: 70px;
            height: 70px;
            margin: 0 auto 1.5rem;
            background: rgba(193, 23, 18, 0.1);
            color: #C11712;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            transition: all 0.4s ease;
        }
        .service-card:hover .service-icon {
            background: #C11712;
            color: #ffffff;
            transform: scale(1.1);
            box-shadow: 0 8px 20px rgba(193, 23, 18, 0.3);
        }
        .service-title {
            font-size: 1.25rem;
            font-weight: 700;
            color: #054B2C;
            margin-bottom: 1rem;
        }
        .service-desc {
            color: #6c757d;
            font-size: 0.95rem;
            line-height: 1.6;
        }
    </style>
    <section class="py-5 bg-white">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up">
                <span class="badge rounded-pill text-uppercase px-3 py-2 mb-3" style="background: rgba(5, 75, 44, 0.1); color: #054B2C; letter-spacing: 1px;">How It Works</span>
                <h2 class="display-6 fw-bold font-serif mb-2" style="color: #054B2C;">Shipping & Payment</h2>
                <p class="text-muted fw-medium">Seamless experience from order to doorstep</p>
            </div>
            <div class="row g-4 justify-content-center">
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="service-card h-100">
                        <div class="service-icon">
                            <i class="fas fa-shopping-basket"></i>
                        </div>
                        <h4 class="service-title">1. Easy Ordering</h4>
                        <p class="service-desc mb-0">A seamless shopping experience—browse, select, and place orders effortlessly with our intuitive platform.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="service-card h-100">
                        <div class="service-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h4 class="service-title">2. Secure Payment</h4>
                        <p class="service-desc mb-0">Safe and secure payment options with 100% encryption to ensure smooth transactions every time.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="service-card h-100">
                        <div class="service-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <h4 class="service-title">3. Fast Delivery</h4>
                        <p class="service-desc mb-0">Reliable and swift delivery on all orders—bringing your favorite nutritional products to your doorstep.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted Brands Section -->
    <section class="py-5" style="background-color: #FAFAFA;">
        <div class="container">
            <div class="d-flex flex-wrap justify-content-center align-items-center gap-5 opacity-75">
                <img src="assets/images/brands/1.png" alt="Partner 1" height="60" data-aos="zoom-in" data-aos-delay="100" style="object-fit: contain;">
                <img src="assets/images/brands/2.png" alt="Partner 2" height="60" data-aos="zoom-in" data-aos-delay="200" style="object-fit: contain;">
                <img src="assets/images/brands/3.png" alt="Partner 3" height="60" data-aos="zoom-in" data-aos-delay="300" style="object-fit: contain;">
                <img src="assets/images/brands/4.png" alt="Partner 4" height="60" data-aos="zoom-in" data-aos-delay="400" style="object-fit: contain;">
                <img src="assets/images/brands/5.png" alt="Partner 5" height="60" data-aos="zoom-in" data-aos-delay="500" style="object-fit: contain;">
                <img src="assets/images/brands/7.png" alt="Partner 6" height="60" data-aos="zoom-in" data-aos-delay="600" style="object-fit: contain;">
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