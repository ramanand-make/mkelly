<?php
require 'assets/db.php';

// fetch products
$sql = "SELECT * FROM products where is_active = 1";
$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/images/parts/favicon.png" />
    <title>Mkelly Biotech Pvt. Ltd - Where Innovation Meets Excellence In Biotechnology</title>
    <meta name="description"
        content="Explore MKelly Biotech Pvt. Ltd., specializing in medicinal mushrooms, herbal health products, and cutting-edge biotech training. Innovating health and wellness with natural, sustainable solutions.">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/animate.css/animate.min.css" rel="stylesheet" type="text/css">
    <link href="assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/slick/slick.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&amp;display=swap" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;display=swap" rel="stylesheet"
        type="text/css">
    <link href="assets/css/theme.min.css" rel="stylesheet" type="text/css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

</head>

<body class="body">
    <?php include 'header.php'; ?>

    <!-- Hero Section -->
    <section class="white-curve-after after-head slick-top-fix section-white-text">
        <div class="slick-view-banner slick-numeric-navigation slick-carousel" data-slider="top-side-numbers">
            <div class="slick-slides">
                <div class="slick-slide">
                    <div class="section-white-text entity-banner content-offs section-solid justify-content-center bg-orange"
                        style="padding-bottom:7rem;">
                        <div class="container text-center text-lg-left flex-0 entity-content">
                            <div class="my-auto position-relative align-items-lg-center flex-0 row">
                                <div class="full-block">
                                    <div class="section-back-text">Mkelly</div>
                                    <img class="d-none d-lg-block z-index-3" src="assets/images/content/x/shpinat-2.png"
                                        alt="" data-size="51px" data-at="61%;-20%;-25deg">
                                    <img class="d-none d-lg-block z-index-3" src="assets/images/content/x/shpinat-1.png"
                                        alt="" data-size="122px" data-at="29%;21%;-90deg"><img
                                        class="d-none d-lg-block z-index-3" src="assets/images/content/x/shpinat-3.png"
                                        alt="" data-size="95px" data-at="47%;86%">
                                </div>
                                <div class="m-lg-auto d-flex z-index-2 position-relative col"><img
                                        class="px-5 px-lg-0 m-auto col-auto mw-100"
                                        src="assets/images/content/x/tomato.png" alt=""></div>
                                <div
                                    class="col-lg-6 mr-lg-5 mt-5 my-lg-auto order-lg-first z-index-4 position-relative">
                                    <h2 class="h1 entity-title">Flavor Meets <span class="text-crimson">Nutrition</span>
                                    </h2>
                                    <div class="h4 mt-0 text-uppercase font-weight-medium entity-subtitle">Crafted to
                                        Perfection</div>
                                    <p class="mb-4 pb-2 entity-text">Enhance meals with nutrient-rich powders, blending
                                        taste and health effortlessly.</p>
                                    <div class="entity-action-btns"><a class="btn-wide btn btn-theme-white-bordered"
                                            href="our-products">Shop Now</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide">
                    <div
                        class="section-white-text entity-banner content-offs section-solid justify-content-center bg-light-green">
                        <div class="container text-center text-lg-left flex-0 entity-content">
                            <div class="my-auto position-relative align-items-lg-center flex-0 row">
                                <div class="full-block">
                                    <div class="section-back-text">Health</div>
                                </div>
                                <div class="m-lg-auto d-flex z-index-2 position-relative col"><img
                                        class="m-auto col-auto px-5 pr-lg-0 mw-100"
                                        src="assets/images/content/x/tea.png" alt=""></div>
                                <div
                                    class="col-lg-5 mr-lg-5 mt-5 my-lg-auto order-lg-first z-index-4 position-relative">
                                    <h2 class="h1 entity-title">Health <span class="text-bittersweet">Every Day</span>
                                    </h2>
                                    <div class="h4 mt-0 entity-subtitle">Immunity Boost</div>
                                    <p class="mb-4 pb-0 entity-text">Boost your energy and immunity with our Cordyceps
                                        tea.</p>

                                    <div class="entity-action-btns"><a class="btn-wide btn btn-theme-white-bordered"
                                            href="our-products">Shop Now</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide">
                    <div
                        class="section-white-text entity-banner content-offs section-solid justify-content-center bg-bittersweet">
                        <div class="container text-center text-lg-left flex-0 entity-content">
                            <div class="my-auto position-relative align-items-lg-center flex-0 row">
                                <div class="full-block">
                                    <div class="section-back-text">Enjoy</div><img class="d-none d-lg-block z-index-3"
                                        src="assets/images/content/x/shpinat-3.png" alt="" data-size="150px"
                                        data-at="27%;51%;86deg">
                                    <img class="d-none d-lg-block z-index-3" src="assets/images/content/x/shpinat-2.png"
                                        alt="" data-size="51px" data-at="99%;-3%;-26deg">
                                </div>
                                <div class="m-lg-auto d-flex z-index-2 position-relative col"><img
                                        class="px-5 m-auto col-auto mw-100" src="assets/images/content/x/beetroot.png"
                                        alt=""></div>
                                <div
                                    class="col-lg-5 mr-lg-5 mt-5 my-lg-auto order-lg-first z-index-4 position-relative">
                                    <h2 class="h1 entity-title">Organic Food <span class="text-orange">Every Day</span>
                                    </h2>
                                    <div class="h4 mt-0 entity-subtitle">Freshness redefined</div>
                                    <p class="mb-4 pb-0 entity-text">Scientifically dried products ensure less waste and
                                        more value.</p>
                                    <div class="entity-action-btns"><a class="btn-wide btn btn-theme-white-bordered"
                                            href="our-products">Shop Now</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-solid">
        <div class="text-theme section-back-text">Fresh</div>
        <div class="container">
            <div class="entity-simple">
                <div class="cols-lg row">
                    <div class="col-lg-6 d-flex">
                        <div class="m-auto col-auto entity-image"><img class="mw-100"
                                src="assets/images/content/x/combo2.png" alt=""></div>
                    </div>
                    <div class="col">
                        <h4 class="text-theme font-weight-medium h1 entity-title">Rich Flavour Powders</h4>
                        <div class="text-title display-4 font-weight-bold entity-subtitle">Fast & Easy</div>

                        <ul class="spaced my-4 entity-list">
                            <li><i class="fas fa-leaf text-light-green"></i>&nbsp;&nbsp;Our products have a longer shelf
                                life, ensuring less wastage and more value.</li>
                            <li><i class="fas fa-leaf text-light-green"></i>&nbsp;&nbsp;The powders retain their
                                nutrients through controlled drying, offering smooth flow and even dispersibility</li>
                            <li><i class="fas fa-leaf text-light-green"></i>&nbsp;&nbsp;Skip time-consuming steps like
                                roasting and add our powders directly to your dishes for quick, hassle-free cooking</li>
                            <li><i class="fas fa-leaf text-light-green"></i>&nbsp;&nbsp;Enhance the flavor and nutrition
                                of snacks, soups, stews, and fast foods effortlessly.</li>
                        </ul>
                        <div class="entity-action-btns">
                            <a class="ml-4 btn-theme-bordered btn" href="our-products">View Our Products</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="bg-light-green white-curve-before curve-before-0 white-curve-after curve-after-40 section-solid">
        <div class="overflow-back bg-vegetables-pattern opacity-10"></div>
        <div class="full-block">
            <div class="container h-100 position-relative" data-size="50%" style="margin-top: 28px;"><img
                    class="z-index-4 d-none d-xl-block mw-100" src="assets/images/content/x/mintt.png" alt=""
                    data-size="270px" data-at="115%;0"></div>
        </div>
        <div class="section-head container left">
            <div class="section-icon"><span class="svg-fill-dark-lime-green svg-content"
                    data-svg="assets/images/svg/title-kiwi.svg"></span></div>
            <div class="section-head-content">
                <h2 class="section-title" style="color: white;">Our Products</h2>
                <p class="section-text" style="color: white;">All the best items for You</p>
            </div>
        </div>
        <div class="container">
            <div class="grid row">
                <?php
                // Assuming $conn and $result are already defined as per your earlier PHP block
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                        <div class="col-sm-6 col-lg-4">
                            <article class="entity-block entity-hover-shadow text-center entity-preview-show-up">
                                <a href="shop?id=<?php echo $row['id']; ?>" class="entity-preview d-block">
                                    <div class="embed-responsive embed-responsive-4by3">
                                        <img class="embed-responsive-item"
                                            src="<?php echo htmlspecialchars($row['image_url'] ?? 'assets/images/default.jpg'); ?>"
                                            alt="<?php echo htmlspecialchars($row['name']); ?>">
                                    </div>

                                </a>

                                <div class="pb-4 entity-content">
                                    <h4 class="entity-title">
                                        <a class="content-link"
                                            href="shop?id=<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['name']); ?></a>
                                    </h4>
                                    <div class="entity-price">
                                        <?php
                                        if (!empty($row['strike_price']) && $row['strike_price'] > $row['price']) {
                                            echo '<span class="text-muted" style="text-decoration: line-through; margin-right: 0.5em;">₹ ' . number_format($row['strike_price']) . '</span>';
                                        }
                                        ?>
                                        <span class="currency">₹</span><?php echo number_format($row['price']); ?>
                                        <span class="price-unit">/ <?php echo htmlspecialchars($row['weight']); ?></span>
                                    </div>
                                </div>
                                <div class="text-center mb-3">
                                    <button class="btn-wide mr-2 btn btn-theme add-to-cart" data-product-id="<?php echo $row['id']; ?>">Add to cart</button>
                                    <button type="button" class="btn-icon btn btn-theme add-to-wishlist" data-product-id="<?php echo $row['id']; ?>" style="border: none; background: none; padding: 0;">
                                        <span class="btn-icon btn btn-theme"><i class="fas fa-heart"></i></span>
                                    </button>
                                </div>

                            </article>
                        </div>
                <?php
                    }
                } else {
                    echo '<p class="text-center w-100">No products available.</p>';
                }
                ?>
            </div>
        </div>

        <script>
            // Add to cart functionality with AJAX
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    var productId = this.getAttribute('data-product-id');
                    var formData = new FormData();
                    formData.append('product_id', productId);
                    fetch('add-to-cart.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        alert('Product added to cart');
                        loadCartSidebar();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('There was an error adding the product to your cart.');
                    });
                });
            });

            // Wishlist button functionality: also adds to cart
            document.querySelectorAll('.add-to-wishlist').forEach(button => {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    var productId = this.getAttribute('data-product-id');
                    var formData = new FormData();
                    formData.append('product_id', productId);
                    // Add to cart AJAX
                    fetch('add-to-cart.php', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.text())
                    .then(data => {
                        alert('Product added to cart ');
                        loadCartSidebar();
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('There was an error adding the product to your cart.');
                    });
                    // Optionally, add wishlist AJAX here as well
                });
            });
        </script>



        <!-- <div class="section-footer"><a class="btn-theme-white-bordered btn" href="#">view all</a> -->
        </div>
    </section>

    <section class="section">
        <div class="section-head container left">
            <div class="section-icon"><span class="svg-fill-theme svg-content"
                    data-svg="assets/images/svg/title-baracka.svg"></span></div>
            <div class="section-head-content">
                <h2 class="section-title">Shipping and payment</h2>
                <p class="section-text">We'll do it as fast as possible</p>
            </div>
        </div>
        <div class="container">
            <div class="grid row">
                <div class="col-lg-3 d-flex">
                    <div class="entity-block entity-hover-shadow entity-hover-highlight entity-hover-white-icon">
                        <div class="mt-4 mb-0 mr-auto align-self-start p-2 px-4 bradr entity-icon"><img class="mw-100"
                                src="assets/images/parts/icons/50/orange/shopping-basket.png" alt=""></div>
                        <div class="entity-content">
                            <h4 class="entity-title">Order</h4>
                            <p class="mb-0 entity-text">A seamless shopping experience—browse, select, and place orders
                                effortlessly with our easy-to-use platform.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-center">
                    <div class="m-auto">
                        <div class="h2 lg-horizontal separator-dots-arrow"><span class="separator-dot"></span><span
                                class="separator-dot last"></span><span class="separator-arrow"><i
                                    class="fas fa-angle-down separator-show-vertical"></i> <i
                                    class="fas fa-angle-right separator-show-horizontal"></i></span></div>
                    </div>
                </div>
                <div class="col-lg-3 d-flex">
                    <div class="entity-block entity-hover-shadow entity-hover-highlight entity-hover-white-icon">
                        <div class="mt-4 mb-0 mr-auto align-self-start p-2 px-4 bradr entity-icon"><img class="mw-100"
                                src="assets/images/parts/icons/50/orange/card-payment.png" alt=""></div>
                        <div class="entity-content">
                            <h4 class="entity-title">Payment</h4>
                            <p class="mb-0 entity-text">Safe and secure payment options to ensure smooth transactions
                                every time you shop.</p>
                        </div>
                    </div>
                </div>
                <div class="col d-flex align-items-center">
                    <div class="m-auto">
                        <div class="h2 lg-horizontal separator-dots-arrow"><span class="separator-dot"></span><span
                                class="separator-dot last"></span><span class="separator-arrow"><i
                                    class="fas fa-angle-down separator-show-vertical"></i> <i
                                    class="fas fa-angle-right separator-show-horizontal"></i></span></div>
                    </div>
                </div>
                <div class="col-lg-3 d-flex">
                    <div class="entity-block entity-hover-shadow entity-hover-highlight entity-hover-white-icon">
                        <div class="mt-4 mb-0 mr-auto align-self-start p-2 px-4 bradr entity-icon"><img class="mw-100"
                                src="assets/images/parts/icons/50/orange/shipped.png" alt=""></div>
                        <div class="entity-content">
                            <h4 class="entity-title">Delivery</h4>
                            <p class="mb-0 entity-text">Fast, reliable, and free delivery on all orders—your favorite
                                products brought to your doorstep quickly.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section
        class="bg-bittersweet white-curve-before curve-before-50 white-curve-after curve-after-20 section-solid section-white-text">
        <div class="section-back-text">Features</div>
        <div class="full-block">
            <div class="container h-100 position-relative" data-size="60%"><img
                    class="z-index-4 d-none d-xl-block mw-100" src="assets/images/content/x/section-lemon.png" alt=""
                    data-size="205px" data-at="-15%;bottom 70px"><img class="z-index-4 d-none d-xl-block mw-100"
                    src="assets/images/content/x/beetroot-section.png" alt="" data-size="150px"
                    data-at="115%;15px;-17deg"></div>
        </div>
        <div class="section-head container left">
            <div class="section-icon"><span class="svg-fill-white svg-content"
                    data-svg="assets/images/svg/title-beans.svg"></span></div>
            <div class="section-head-content">
                <h2 class="section-title">Best features</h2>
                <p class="section-text">Enhanced Everyday Meals</p>
            </div>
        </div>
        <div class="container">
            <div class="cols-lg row">
                <div class="col-md-4">
                    <div class="entity text-center">
                        <div class="entity-icon"><img class="mw-100"
                                src="assets/images/parts/icons/100/white/jar.png" alt=""></div>
                        <h4 class="entity-title">Efficient Storage</h4>
                        <p class="mb-0 entity-text">Our powders extend shelf life, reduce waste, and stay lightweight
                            and easy to store.</p>
                        <img class="d-none d-lg-block mw-100" src="assets/images/parts/arrow-curved-up.png" alt=""
                            data-size="50px" data-at="right 5px;40px;25deg">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="entity text-center">
                        <div class="entity-icon"><img class="mw-100"
                                src="assets/images/parts/icons/100/white/tomato-transparent.png" alt=""></div>
                        <h4 class="entity-title">Nutrient Powders</h4>
                        <p class="mb-0 entity-text">Dried under control, our powders keep nutrients intact and blend
                            easily, skipping roasting.</p><img class="d-none d-lg-block mw-100"
                            src="assets/images/parts/arrow-curved.png" alt="" data-size="50px"
                            data-at="right -21px;85px;-36deg">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="entity text-center">
                        <div class="entity-icon"><img class="mw-100"
                                src="assets/images/parts/icons/100/white/leafs-transparent.png" alt=""></div>
                        <h4 class="entity-title">Flavor Boost</h4>
                        <p class="mb-0 entity-text">Add nutrients to meals; even picky eaters won’t notice hidden
                            garlic, onions, or ginger!</p><img class="d-none mw-100"
                            src="assets/images/parts/arrow-curved.png" alt="" data-size="50px" data-at="100%;50%">
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="d-flex flex-wrap justify-content-center gap-4">
                        <div class="logo-block text-center">
                            <a href="#"><img src="assets/images/content/brands/1.png" alt="Partner 1"
                                    class="img-fluid"></a>
                        </div>
                        <div class="logo-block text-center">
                            <a href="#"><img src="assets/images/content/brands/2.png" alt="Partner 2"
                                    class="img-fluid"></a>
                        </div>
                        <div class="logo-block text-center">
                            <a href="#"><img src="assets/images/content/brands/3.png" alt="Partner 3"
                                    class="img-fluid"></a>
                        </div>
                        <div class="logo-block text-center">
                            <a href="#"><img src="assets/images/content/brands/4.png" alt="Partner 4"
                                    class="img-fluid"></a>
                        </div>
                        <div class="logo-block text-center">
                            <a href="#"><img src="assets/images/content/brands/5.png" alt="Partner 5"
                                    class="img-fluid"></a>
                        </div>
                        <!--<div class="logo-block text-center">-->
                        <!--    <a href="#"><img src="assets/images/content/brands/6.png" alt="Partner 6"-->
                        <!--            class="img-fluid"></a>-->
                        <!--</div>-->
                        <div class="logo-block text-center">
                            <a href="#"><img src="assets/images/content/brands/7.png" alt="Partner 6"
                                    class="img-fluid"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="scroll-top"><i class="fas fa-long-arrow-alt-up"></i></div>

    <?php include 'footer.php'; ?>

    </script>
    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/shuffle/shuffle.min.js"></script>
    <script src="assets/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/slick/slick.min.js"></script>
    <script src="assets/js-cookie/js.cookie.js" type="text/javascript"></script>
    <script src="assets/js/gmap/silver.js"></script>
    <script src="assets/js/script.js"></script>
    <script async defer="defer"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDBAbNXaCDOzujLCykXUvTylfbL1wUcaM&amp;callback=initMap"></script>
</body>

</html>