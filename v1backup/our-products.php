<?php
// db connection
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
</head>

<body class="body">

    <?php include 'header.php'; ?>

    <section class="after-head top-block-page with-back white-curve-after section-white-text">
        <div class="overflow-back bg-orange"></div>
        <div class="content-offs-stick my-5 container">
            <div class="section-solid with-back">
                <div class="full-block">
                    <div class="section-back-text">Mkelly</div>
                    <!-- <img class="d-none d-lg-block z-index-3"
                        src="assets/images/content/x/mandarin.png" alt="" data-size="280px"
                        data-at="10%;bottom 35%"><img class="d-none d-lg-block z-index-3"
                        src="assets/images/content/x/kiwi-blur.png" alt="" data-size="137px" data-at="right 5%;35%"><img
                        class="d-none d-lg-block z-index-3" src="assets/images/content/x/shpinat-2.png" alt=""
                        data-size="50px" data-at="65%;0%;-25deg"> -->
                </div>
                <div class="z-index-4 position-relative text-center">
                    <h1 class="section-title">Our Products</h1>
                    <div class="mt-3">
                        <div class="page-breadcrumbs"><a class="content-link" href="/">Home</a><span
                                class="mx-2">\</span><span>Our Products</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
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
                                <div class="text-center mb-3 add-to-cart" data-product-id="<?php echo $row['id']; ?>">
                                    <button class="btn-wide mr-2 btn btn-theme">Add to cart</button>
                                    <button type="button" class="btn-icon btn btn-theme add-to-cart" data-product-id="<?php echo $row['id']; ?>" style="border: none; background: none; padding: 0;">
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
        <!-- <div class="section-footer">
            <div class="paginator"><a class="paginator-nav" href="#"><i class="fas fa-arrow-left"></i></a><a
                    class="paginator-item" href="#">1</a><span class="active paginator-item">2</span><a
                    class="paginator-item" href="#">3</a><span class="paginator-item">...</span><a
                    class="paginator-item" href="#">10</a><a class="paginator-nav" href="#"><i
                        class="fas fa-arrow-right"></i></a></div>
        </div> -->
    </section>
    <!-- <div class="cart-sidebar collapse" data-block="cart" data-show-block-class="animation-scale-top-right"
        data-hide-block-class="animation-unscale-top-right"><a class="close-link" href="#" data-close-block="true"><i
                class="fas fa-times"></i></a>
        <div class="cart-inner">
            <h4 class="text-title mb-2">Cart</h4>
            <div class="separator-line mb-4"></div>
            <div class="entity">
                <div class="grid-sm row">
                    <div class="col-5"><a class="entity-preview-show-up entity-preview"
                            href="shop-product-sidebar-right.html"><span
                                class="embed-responsive embed-responsive-4by3"><img class="embed-responsive-item"
                                    src="assets/images/content/720x540/blueberry.jpg" alt=""></span><span
                                class="with-back entity-preview-content"><span
                                    class="h3 m-auto text-theme text-center"><i class="fas fa-search"></i></span><span
                                    class="overflow-back bg-body-back opacity-70"></span></span></a></div>
                    <div class="col">
                        <h4 class="h5 mb-1 entity-title"><a class="content-link"
                                href="shop-product-sidebar-right.html">Blueberry</a></h4>
                        <div class="entity-price"><span class="currency">$</span>12.50/kg<span
                                class="entity-quantity">&nbsp;x&nbsp;10</span></div>
                        <div class="entity-total">total:&nbsp;&nbsp;&nbsp;$125.00</div>
                    </div>
                </div>
            </div>
            <div class="entity">
                <div class="grid-sm row">
                    <div class="col-5"><a class="entity-preview-show-up entity-preview"
                            href="shop-product-sidebar-right.html"><span
                                class="embed-responsive embed-responsive-4by3"><img class="embed-responsive-item"
                                    src="assets/images/content/720x540/orange.jpg" alt=""></span><span
                                class="with-back entity-preview-content"><span
                                    class="h3 m-auto text-theme text-center"><i class="fas fa-search"></i></span><span
                                    class="overflow-back bg-body-back opacity-70"></span></span></a></div>
                    <div class="col">
                        <h4 class="h5 mb-1 entity-title"><a class="content-link"
                                href="shop-product-sidebar-right.html">Orange</a></h4>
                        <div class="entity-price"><span class="currency">$</span>4.99/kg<span
                                class="entity-quantity">&nbsp;x&nbsp;5</span></div>
                        <div class="entity-total">total:&nbsp;&nbsp;&nbsp;$24.95</div>
                    </div>
                </div>
            </div>
            <div class="separator-line mt-4 mb-3"></div>
            <ul class="cart-totals list-titled">
                <li><span class="list-item-title">Sub Total</span><span class="list-item-value">$149.95</span></li>
                <li><span class="list-item-title">Shipping</span><span class="list-item-value">$10.00</span></li>
                <li class="separator-line"></li>
                <li class="cart-total"><span class="list-item-title">Total</span><span
                        class="list-item-value">$159.95</span></li>
            </ul><a class="w-100 mb-2 btn btn-theme-bordered" href="shop-cart.html">view cart&nbsp;&nbsp;&nbsp;<i
                    class="fas fa-shopping-bag"></i></a><a class="w-100 btn btn-theme"
                href="shop-checkout.html">checkout&nbsp;&nbsp;&nbsp;<i class="fas fa-shopping-cart"></i></a>
        </div>
    </div> -->
    
<script>
    // Add to cart functionality with AJAX
    document.querySelectorAll('.add-to-cart').forEach(button => {
        button.addEventListener('click', function(event) {
            // Prevent the default action (redirect)
            event.preventDefault();

            var productId = this.getAttribute('data-product-id');

            var formData = new FormData();
            formData.append('product_id', productId);

            // Send AJAX request to add the product to cart
            fetch('add-to-cart.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Optionally, update UI or show a message
                alert('Product added to cart');
                loadCartSidebar();
                // You could also dynamically update the cart icon or counter here
            })
            .catch(error => {
                console.error('Error:', error);
                alert('There was an error adding the product to your cart.');
            });
        });
    });
</script>

    <div class="scroll-top"><i class="fas fa-long-arrow-alt-up"></i></div>

    <?php include 'footer.php'; ?>

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