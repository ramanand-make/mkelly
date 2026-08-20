<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

ini_set('log_errors', 1);
ini_set('error_log', '/path/to/custom_error.log');

// db connection
require 'assets/db.php';

// fetch products
$sql = "SELECT * FROM products";
$result = $conn->query($sql);

$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
if ($product_id === 0) {
    echo "Invalid product ID!";
    exit;
}

// Fetch product details
$sql = "SELECT name, price, strike_price, weight, description, image_url FROM products WHERE id = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
} else {
    echo "Product not found!";
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/images/parts/favicon.png" />
    <title><?php echo htmlspecialchars($product['name']); ?> - Product Details</title>
    <meta name="description" content="Explore MKelly Biotech Pvt. Ltd., specializing in medicinal mushrooms, herbal health products, and cutting-edge biotech training. Innovating health and wellness with natural, sustainable solutions.">
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/animate.css/animate.min.css" rel="stylesheet" type="text/css">
    <link href="assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="assets/slick/slick.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&amp;display=swap" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;display=swap" rel="stylesheet" type="text/css">
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
  
                </div>
                <div class="z-index-4 position-relative text-center">
                    <h1 class="section-title">Shop</h1>
                    <div class="mt-3">
                        <div class="page-breadcrumbs"><a class="content-link" href="/">Home</a><span
                                class="mx-2">\</span><span>Shop</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section-center section">
        <div class="container">
            <div class="entity">
            <div class="grid col-auto px-0 row">
    <div class="col-md-6">
        <div class="position-relative entity-image">
            <img class="w-100" src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
            <div class="full-block">
            <button type="button"
        class=" add-to-cart-btn position-bottom position-right mr-3 mb-3 btn-icon btn btn-theme"
        data-id="<?php echo $product_id; ?>"
        data-name="<?php echo htmlspecialchars($product['name']); ?>"
        data-price="<?php echo htmlspecialchars($product['price']); ?>">
    <i class="fas fa-heart"></i>
</button>

            </div>
        </div>
    </div>
    <div class="col">
        <h2 class="mb-2 entity-title"><?php echo htmlspecialchars($product['name']); ?></h2>
        <div class="user-rating mb-1">
            <span class="rating-item"><i class="fas fa-star"></i></span>
            <span class="rating-item"><i class="fas fa-star"></i></span>
            <span class="rating-item"><i class="fas fa-star"></i></span>
            <span class="rating-item"><i class="fas fa-star"></i></span>
            <span class="rating-item"><i class="fas fa-star"></i></span>
        </div>
       <div class="mb-3 entity-price">
    <?php if (!empty($product['strike_price']) && $product['strike_price'] > $product['price']): ?>
        <span class="entity-price-current" style="text-decoration: line-through; color: #888; margin-right: 10px;">
            ₹<?php echo number_format($product['strike_price']); ?>
        </span>
    <?php endif; ?>
    <span class="entity-price-current">₹<?php echo number_format($product['price']); ?></span>
</div>
        <div class="entity-action-btns">
            <form autocomplete="off">
                <div class="row grid">
                    <div class="col-auto">
                        <div class="input-view-flat input-gray-shadow input-spin input-group">
                            <input class="form-control" min="1" name="quantity" type="text" value="1">
                            <span class="input-actions">
                                <span class="input-decrement"><i class="fas fa-minus"></i></span>
                                <span class="input-increment"><i class="fas fa-plus"></i></span>
                            </span>
                        </div>
                    </div>
                    <div class="col-auto col-lg">
                        <button class="btn btn-theme" type="submit">Add to Cart</button>
                    </div>
                </div>
            </form>
        </div>
        <ul class="mt-4 entity-list">
            <li><span class="entity-list-title">Weight:</span><span class="entity-list-value"><?php echo htmlspecialchars($product['weight']); ?></span></li>

        </ul>
    </div>
</div>
<div class="mb-4 entity-body">
    <p><?php echo nl2br(htmlspecialchars($product['description'])); ?></p>
</div>
                <ul class="font-weight-semibold entity-details-list" >
                    <li >The powder is shelf-stable, easy to store, and requires no refrigeration.</li>
                    <li >Simply rehydrate or add directly to smoothies, juices, or dishes for quick use.</li>
                    <li >It offers pure, natural benefits without any preservatives or additives.</li>
                </ul>
                <div class="entity-footer">
                    <div class="separator-line mb-3"></div>
                    <!-- <div class="entity-action-icons">
                        <div class="entity-actions-title">Share:</div><a class="content-link" href="https://www.facebook.com/himroots.cordyceps/"><i
                                class="fab fa-facebook-f" aria-hidden="true"></i> </a><a class="content-link"
                            href="https://www.linkedin.com/in/mkelly-biotech-a51a10253/?originalSubdomain=in"><i class="fab fa-linkedin" aria-hidden="true"></i> </a>
                            
                            <a class="content-link"
                            href="https://www.instagram.com/mkellybiotechpvtltd/"><i class="fab fa-instagram" aria-hidden="true"></i></a>
                    </div> -->
                </div>
            </div>

        </div>
    </section>
 
    <div class="scroll-top"><i class="fas fa-long-arrow-alt-up"></i></div>
    
    <?php include 'footer.php'; ?>
    <script src="assets/jquery/jquery-3.3.1.min.js"></script>
    <script>
$(document).ready(function () {
    $('.add-to-cart-btn').click(function () {
        const button = $(this);
        const productId = button.data('id');
        const price = button.data('price');
        const quantity = 1;

        $.ajax({
            url: 'add-to-cart.php',
            method: 'POST',
            data: {
                product_id: productId,
                quantity: quantity,
                price: price
            },
            success: function (response) {
                alert('Product added to cart!');
                loadCartSidebar();
            },
            error: function () {
                alert('Failed to add product to cart.');
            }
        });
    });
});
$(document).ready(function () {
    // Handle form submit to add to cart with quantity
    $('.entity-action-btns form').submit(function (e) {
        e.preventDefault(); // prevent normal form submit

        // Read product ID from the add-to-cart button's data attribute
        const productId = $('.add-to-cart-btn').data('id') || 0;

        // Read quantity from input field, default to 1 if invalid
        let quantity = parseInt($(this).find('input[name="quantity"]').val(), 10);
        if (isNaN(quantity) || quantity < 1) quantity = 1;

        if (productId === 0) {
            alert('Invalid product ID.');
            return;
        }

        $.ajax({
            url: 'add-to-cart.php',
            method: 'POST',
            data: {
                product_id: productId,
                quantity: quantity
            },
            success: function (response) {
                if (response.status === 'success') {
                    alert('Product added to cart!');
                    loadCartSidebar();
                    // Optionally update cart UI/badge here, e.g. call loadCartSidebar() if you have that function
                } else {
                    alert('Failed to add product to cart: ' + response.message);
                }
            },
            error: function () {
                alert('Failed to add product to cart.');
            }
        });
    });
});
</script>



    <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
  
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