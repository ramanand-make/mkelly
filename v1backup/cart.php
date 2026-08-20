<?php
session_start();
require 'assets/db.php';

// Initialize totals at the beginning
$subtotal = 0.00;
$shipping = 0.00;
$total = 0.00;


// Get cart ID for current session
$session_token = session_id();
$cart_id = 0;
$cart_query = $conn->prepare("SELECT id FROM cart WHERE session_token = ?");
$cart_query->bind_param("s", $session_token);
$cart_query->execute();
$cart_result = $cart_query->get_result();

if ($cart_row = $cart_result->fetch_assoc()) {
    $cart_id = $cart_row['id'];
}

// Fetch shipping charge from shipping_and_payment table
$shipping_charge = 0.00;
$sp_result = $conn->query("SELECT shipping_charge FROM shipping_and_payment LIMIT 1");
if ($sp_result && $sp_result->num_rows > 0) {
    $sp = $sp_result->fetch_assoc();
    $shipping_charge = floatval($sp['shipping_charge']);
}
$cart_query->close();

// Initialize totals

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
<style>
    /* Remove arrows from input type number in all browsers */
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    input[type=number] {
        -moz-appearance: textfield;
        appearance: textfield;
    }
</style>

<body class="body">

    <?php include 'header.php'; ?>

    <section class="after-head top-block-page with-back white-curve-after section-white-text">
        <div class="overflow-back bg-orange"></div>
        <div class="content-offs-stick my-5 container">
            <div class="section-solid with-back">
                <div class="full-block">
                    <div class="section-back-text">Shop</div>
                    <!-- <img class="d-none d-lg-block z-index-3"
                        src="assets/images/content/x/mandarin.png" alt="" data-size="280px"
                        data-at="10%;bottom 35%"><img class="d-none d-lg-block z-index-3"
                        src="assets/images/content/x/kiwi-blur.png" alt="" data-size="137px" data-at="right 5%;35%"><img
                        class="d-none d-lg-block z-index-3" src="assets/images/content/x/shpinat-2.png" alt=""
                        data-size="50px" data-at="65%;0%;-25deg"> -->
                </div>
                <div class="z-index-4 position-relative text-center">
                    <h1 class="section-title">Shop Cart</h1>
                    <div class="mt-3">
                        <div class="page-breadcrumbs"><a class="content-link" href="https://www.mkellybiotech.com/">Home</a><span
                                class="mx-2">\</span><span>Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mb-0 section">
        <form class="container" action="update-cart" method="POST">
            <div class="cart-items">
                <div class="cart-header">
                    <h2 class="cart-title">Products in Your Cart</h2>
                    <div class="cart-item-title">Product</div>
                    <div class="cart-item-price">Price</div>
                    <div class="cart-item-quantity">Quantity</div>
                    <div class="cart-item-total">Total</div>
                    <div class="cart-item-remove"></div>
                </div>

                <?php
                $subtotal = 0;
                // Fetch cart items if cart exists
                if ($cart_id > 0) {
                    $items_query = $conn->prepare("
                        SELECT ci.*, p.name, p.image_url, p.strike_price 
                        FROM cart_items ci
                        JOIN products p ON ci.product_id = p.id
                        WHERE ci.cart_id = ?
                    ");
                    $items_query->bind_param("i", $cart_id);
                    $items_query->execute();
                    $items_result = $items_query->get_result();

                    while ($item = $items_result->fetch_assoc()) {
                        $item_total = $item['price'] * $item['quantity'];
                        $subtotal += $item_total;
                ?>
                        <div class="cart-item-entity">
                            <div class="cart-item-image">
                                <a class="entity-preview-show-up entity-preview" href="shop?id=<?= $item['id'] ?>">
                                    <span class="embed-responsive embed-responsive-4by3">
                                        <img class="embed-responsive-item" src="<?= htmlspecialchars($item['image_url']) ?>"
                                            alt="<?= htmlspecialchars($item['name']) ?>">
                                    </span>
                                    <span class="with-back entity-preview-content">
                                        <span class="h3 m-auto text-theme text-center"><i class="fas fa-search"></i></span>
                                        <span class="overflow-back bg-body-back opacity-70"></span>
                                    </span>
                                </a>
                            </div>
                            <div class="cart-item-title">
                                <a class="content-link" href="shop-product-sidebar-right?id=<?= $item['product_id'] ?>">
                                    <?= htmlspecialchars($item['name']) ?>
                                </a>
                            </div>
                            <div class="cart-item-price">
    <?php if (!empty($item['strike_price']) && $item['strike_price'] > $item['price']): ?>
        <span style="text-decoration: line-through; color: #888; margin-right: 6px;">
            ₹<?= number_format($item['strike_price']) ?>
        </span>
    <?php endif; ?>
    ₹<?= number_format($item['price']) ?>
</div>
                            <div class="cart-item-quantity">
                                <div class="input-view-flat input-gray-shadow input-spin input-group">
                                    <input class="form-control" min="1" name="quantity[<?= $item['id'] ?>]" type="number"
                                        value="<?= $item['quantity'] ?>">
                                    <span class="input-actions">
                                        <span class="input-decrement"><i class="fas fa-minus"></i></span>
                                        <span class="input-increment"><i class="fas fa-plus"></i></span>
                                    </span>
                                </div>
                            </div>
                            <div class="cart-item-total">
                                <span class="cart-item-total-text">Item total:</span>
                                ₹<?= number_format($item_total) ?>
                            </div>
                            <div class="cart-item-remove">
                                <a href="remove-from-cart?id=<?= $item['id'] ?>">
                                    <span class="cart-item-remove-text">remove from cart</span>
                                    <i class="fas fa-times"></i>
                                </a>
                            </div>
                        </div>
                <?php
                    }
                    $items_query->close();
  // Calculate shipping and total **after** subtotal is ready
  $shipping = ($subtotal > 0) ? $shipping_charge : 0.00;
  $total = $subtotal + $shipping;
                } else {
                    echo '<div class="text-center py-5"><h4>Your cart is empty</h4></div>';
                }
                ?>

                <div class="separator-line"></div>
                <div class="cart-footer">
                    <div class="grid-sm row">
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <button class="btn btn-theme-bordered" type="submit" name="clear_cart">Clear Shopping
                                Cart</button>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3 mr-auto">
                            <button class="btn btn-theme-bordered" type="submit" name="update_cart">Update Shopping
                                Cart</button>
                        </div>
                        <div class="col-md-4 col-lg-3">
                            <a href="our-products" class="btn btn-theme">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-center" >
                <div class="section-block">
                    <div class="cols-xl row justify-content-center">
                        <div class="col-lg-6 mr-auto">
                            <!-- Coupon and Check Availability forms (unchanged) -->
                        </div>
                        <div class="">
                            <div class="cart-block" style="width: 800px; height: 300px; padding: 20px;">
                                <ul class="cart-totals list-titled">
                                    <li><span class="list-item-title">Sub Total</span><span
                                            class="list-item-value">₹<?= number_format($subtotal) ?></span></li>
                                    <li>
                                        <span class="list-item-title">Shipping </span>
                                        <span class="list-item-value">₹<?= number_format($shipping_charge) ?></span>
                                    </li>
                                    <li class="separator-line"></li>
                                    <li class="cart-total"><span class="list-item-title">Total</span><span
                                            class="list-item-value">₹<?= number_format($total) ?></span></li>
                                </ul>
                                <?php if ($cart_id == 0): ?>
                                    <button class="w-100 btn btn-theme" type="button" disabled>Proceed To Checkout</button>
                                <?php else: ?>
                                    <a href="process-checkout" class="w-100 btn btn-theme">Proceed To Checkout</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </section>

    <section class="section" data-slider="featured-products">
        <div class="section-head container left">
            <div class="section-icon">
                <span class="svg-fill-crimson svg-content" data-svg="assets/images/svg/title-pepper.svg"></span>
            </div>
            <div class="section-head-content">
                <h2 class="section-title">Quick shop</h2>
            </div>
            <div class="slick-arrows">
                <div class="slick-arrow-prev"><i class="fas fa-arrow-left"></i></div>
                <div class="slick-arrow-next"><i class="fas fa-arrow-right"></i></div>
            </div>
        </div>
        <div class="container">
            <div class="slick-view-carousel slick-carousel">
                <div class="slick-slides">
                    <?php
                    // Fetch products from database
                    // include 'db_connection.php';

$products_query = $conn->prepare("SELECT id, name, price, strike_price, weight, description, image_url FROM products LIMIT 10");                    $products_query->execute();
                    $products_result = $products_query->get_result();

                    while ($product = $products_result->fetch_assoc()) {
                        // Format price with 2 decimal places
                        $formatted_price = number_format($product['price']);
                        // Determine price unit (per kg or per piece)
                        $price_unit = (!empty($product['weight']) ? '/ kg' : '/ piece');
                    ?>
                        <div class="slick-slide">
                            <article class="entity-block entity-hover-shadow">
                                <a class="entity-preview-show-up entity-preview" href="shop?id=<?= $product['id'] ?>">
                                    <span class="embed-responsive embed-responsive-4by3">
                                        <img class="embed-responsive-item"
                                            src="<?= htmlspecialchars($product['image_url']) ?>"
                                            alt="<?= htmlspecialchars($product['name']) ?>">
                                    </span>
                                    <span class="with-back entity-preview-content">
                                        <span class="overflow-back bg-body-back opacity-70"></span>
                                        <span class="m-auto h1 text-theme text-center">
                                            <i class="fas fa-shopping-cart"></i>
                                        </span>
                                    </span>
                                </a>
                                <div class="fill-color-line" data-role="fill-line">
                                    <div class="opacity-30 fill-line-segment bg-theme" data-role="fill-line-segment"
                                        data-min-width="10" data-preffered-width="50" data-max-width="80"></div>
                                    <div class="opacity-60 fill-line-segment bg-theme" data-role="fill-line-segment"
                                        data-min-width="10" data-preffered-width="50" data-max-width="80"></div>
                                    <div class="fill-line-segment bg-theme" data-role="fill-line-segment"
                                        data-min-width="10" data-preffered-width="50" data-max-width="80"></div>
                                </div>
                                <div class="entity-content">
                                    <h4 class="entity-title">
                                        <a class="content-link"
                                            href="shop-product-sidebar-right?id=<?= $product['id'] ?>">
                                            <?= htmlspecialchars($product['name']) ?>
                                        </a>
                                    </h4>
                                    <p class="entity-text">
                                        <?= !empty($product['description']) ?
                                            htmlspecialchars($product['description']) :
                                            'Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod te incididunt' ?>
                                    </p>
                                    <div class="entity-bottom-line">
                                        <div class="entity-price">
                                            <span class="currency">₹</span><?= $formatted_price ?>
                                            <span class="price-unit"><?= $price_unit ?></span>
                                        </div>
                                        <div class="entity-action-btns">
                                            <!-- Updated: Add form with ajax handling -->
                                            <form class="add-to-cart-form" data-product-id="<?= $product['id'] ?>" style="display:inline;">
                                                <button type="submit" class="btn-sm btn btn-theme">Add to cart</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>
                    <?php
                    }
                    $products_query->close();
                    $conn->close();
                    ?>
                </div>
            </div>
        </div>
    </section>


    <?php include 'footer.php'; ?>
    <!-- <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script> -->
    <script src="assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/shuffle/shuffle.min.js"></script>
    <script src="assets/waypoints/jquery.waypoints.min.js"></script>
    <script src="assets/slick/slick.min.js"></script>
    <script src="assets/js-cookie/js.cookie.js" type="text/javascript"></script>
    <script src="assets/js/gmap/silver.js"></script>
    <script src="assets/js/script.js"></script>
    <script>
        $(document).ready(function() {
            $('.add-to-cart-form').on('submit', function(e) {
                e.preventDefault();
                var form = $(this);
                var productId = form.data('product-id');

                $.ajax({
                    url: 'add-to-cart.php',
                    type: 'POST',
                    dataType: 'json',
                    data: {
                        product_id: productId,
                        quantity: 1
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            alert(response.message);
                            location.reload();
                            // Optionally refresh cart sidebar etc
                            if (typeof loadCartSidebar === "function") loadCartSidebar();
                        } else {
                            alert('Error: ' + response.message);
                        }
                    },
                    error: function() {
                        alert('Unexpected error occurred.');
                    }
                });
            });
        });
    </script>
    <script async defer="defer"
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDBAbNXaCDOzujLCykXUvTylfbL1wUcaM&amp;callback=initMap"></script>
</body>

</html>