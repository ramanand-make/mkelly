<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);

require_once 'includes/functions.php';

$conn = getSashDBConnection();

$categorySlug = isset($_GET['category']) ? trim($_GET['category']) : '';
$sort = isset($_GET['sort']) ? $_GET['sort'] : '';
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 100;
$offset = ($page - 1) * $limit;

$category = null;
$category_id = null;
$categoryNotFound = false;
$title = "All Products";

if ($categorySlug !== '' && strtolower($categorySlug) !== 'all') {
    $category = getCategoryBySlug($conn, $categorySlug);
    if ($category) {
        $category_id = (int) $category['id'];
        $title = $category['name'];
        $products = getProducts($conn, $limit, $category_id, $offset, $sort);
    } else {
        $categoryNotFound = true;
        $title = 'Collection Not Found';
        $products = [];
    }
} else {
    $products = getProducts($conn, $limit, null, $offset, $sort);
}

// Handle AJAX request for infinite scrolling
if (isset($_GET['ajax']) && $_GET['ajax'] == '1') {
    if (empty($products)) {
        echo ''; // Empty response signifies no more products
        exit;
    }
    
    foreach ($products as $index => $prod) {
        $delay = (($index % $limit) + 1) * 100;
        $discount = 0;
        if ($prod['price'] > 0 && $prod['sale_price'] > 0) {
            $discount = round((($prod['price'] - $prod['sale_price']) / $prod['price']) * 100);
        }
        ?>
        <div class="col-6 col-md-4 col-lg-3 product-item" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
            <div class="product-card">
                <div class="product-image">
                    <?php if ($discount > 0): ?>
                        <span class="product-badge"><?= $discount ?>% OFF</span>
                    <?php endif; ?>
                    <a href="product/<?= htmlspecialchars($prod['slug']) ?>">
                        <img src="<?= get_image_url('Product-Photos/' . $prod['photo_folder'] . '/' . $prod['photo2']) ?>" alt="<?= htmlspecialchars($prod['product_name']) ?>">
                    </a>
                    <button class="quick-view-btn">Quick View</button>
                </div>
                <div class="product-info">
                    <h3 class="product-title">
                        <a href="product/<?= htmlspecialchars($prod['slug']) ?>" class="text-decoration-none text-dark">
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
                        <span class="rating-text">4.5 (47)</span>
                    </div>
                    <div class="product-price">
                        <?php if ($prod['sale_price'] > 0): ?>
                            <span class="original-price">₹<?= number_format($prod['price'], 2) ?></span>
                            <span class="current-price">₹<?= number_format($prod['sale_price'], 2) ?></span>
                        <?php else: ?>
                            <span class="current-price">₹<?= number_format($prod['price'], 2) ?></span>
                        <?php endif; ?>
                    </div>
                    <button type="button" class="add-to-cart-btn"
                        data-id="<?= (int) $prod['id'] ?>"
                        data-name="<?= htmlspecialchars($prod['product_name'], ENT_QUOTES) ?>"
                        data-price="<?= $prod['sale_price'] > 0 ? $prod['sale_price'] : $prod['price'] ?>"
                        data-image="<?= htmlspecialchars(get_image_url('Product-Photos/' . $prod['photo_folder'] . '/' . $prod['photo1']), ENT_QUOTES) ?>">Add to Cart</button>
                </div>
            </div>
        </div>
        <?php
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($title) ?> – Mkelly Store</title>
    <base href="<?= BASE_URL ?>">
    <meta name="description" content="Shop authentic organic, natural food powders and biotech products at Mkelly. Scientifically dried, premium quality with a legacy of trust.">
    <!-- SWIPER CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

<!-- SWIPER JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<link rel="icon" type="image/x-icon" href="assets/images/logo/logo-new (1).png">
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
    
    <link href="<?= BASE_URL ?>assets/css/style.css?v=<?= time() ?>" rel="stylesheet">
    <link href="<?= BASE_URL ?>assets/css/checkout.css?v=<?= time() ?>" rel="stylesheet">
</head>
<body>

<?php  include('includes/header.php')?>



    <style>
.sort-box {
    /* width: 180px; */
    margin-right: 170px;
    /* max-width: 100%; */
}
    </style>

    <section class="best-seller-section collection-page " style="padding:10px !important;">
        <div class="container">
            <h1 class="collection-page-title"><?= htmlspecialchars($title) ?></h1>
            <div class="product-topbar d-flex flex-wrap justify-content-between align-items-center mb-4 gap-3">

            <button class="filter-btn d-flex align-items-center gap-2 px-3 py-2 border rounded bg-white">
                <i class="fas fa-sliders-h"></i>
                <span class="fw-medium">Show filter</span>
            </button>

            <div class="topbar-right d-flex align-items-center">
                
               <div class="sort-box d-flex align-items-center gap-2 bg-white px-3 py-2 border rounded" style="margin-right: 202px;">
                    <span class="text-muted small text-nowrap">Sort by:</span>
                    <select onchange="window.location.search = '?sort=' + this.value;" class="border-0 bg-transparent text-dark fw-bold outline-none cursor-pointer" style="width: 155px; text-overflow: ellipsis;">
                        <option value="" <?= empty($sort) ? 'selected' : '' ?>>Best selling</option>
                        <option value="low_to_high" <?= $sort == 'low_to_high' ? 'selected' : '' ?>>Price: Low to High</option>
                        <option value="high_to_low" <?= $sort == 'high_to_low' ? 'selected' : '' ?>>Price: High to Low</option>
                    </select>
                </div>
            </div>

        </div>
            
            <div class="row g-4 mb-3" id="product-list">
                <?php if (empty($products)): ?>
                    <div class="col-12">
                        <div class="collection-empty-state">
                            <i class="fas fa-box-open collection-empty-icon" aria-hidden="true"></i>
                            <?php if ($categoryNotFound): ?>
                                <h3>This collection does not exist</h3>
                                <p>The category you are looking for may have been moved or removed.</p>
                            <?php elseif ($categorySlug !== ''): ?>
                                <h3>No products found</h3>
                                <p>There are no products in this category right now. Check back soon.</p>
                            <?php else: ?>
                                <h3>No products available</h3>
                                <p>Our catalog is being updated. Please check back soon.</p>
                            <?php endif; ?>
                            <a href="<?= BASE_URL ?>" class="btn-primary-custom collection-empty-btn">Back to Home</a>
                        </div>
                    </div>
                <?php else: ?>
                    <?php 
                    foreach ($products as $index => $prod): 
                        $delay = ($index + 1) * 100;
                        $discount = 0;
                        if ($prod['price'] > 0 && $prod['sale_price'] > 0) {
                            $discount = round((($prod['price'] - $prod['sale_price']) / $prod['price']) * 100);
                        }
                    ?>
                    <!-- Product <?= $index + 1 ?> -->
                    <div class="col-6 col-md-4 col-lg-3 product-item" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                        <div class="product-card">
                            <div class="product-image">
                                <?php if ($discount > 0): ?>
                                    <span class="product-badge"><?= $discount ?>% OFF</span>
                                <?php endif; ?>
                                <a href="product/<?= htmlspecialchars($prod['slug']) ?>">
                                    <img src="<?= get_image_url('Product-Photos/' . $prod['photo_folder'] . '/' . $prod['photo1']) ?>" alt="<?= htmlspecialchars($prod['product_name']) ?>">
                                </a>
                                <button class="quick-view-btn">Quick View</button>
                            </div>
                            <div class="product-info">
                                <h3 class="product-title">
                                    <a href="product/<?= htmlspecialchars($prod['slug']) ?>" class="text-decoration-none text-dark">
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
                                    <span class="rating-text">4.5 (47)</span>
                                </div>
                                <div class="product-price">
                                    <?php if ($prod['sale_price'] > 0): ?>
                                        <span class="original-price">₹<?= number_format($prod['price'], 2) ?></span>
                                        <span class="current-price">₹<?= number_format($prod['sale_price'], 2) ?></span>
                                    <?php else: ?>
                                        <span class="current-price">₹<?= number_format($prod['price'], 2) ?></span>
                                    <?php endif; ?>
                                </div>
                                <button type="button" class="add-to-cart-btn"
                                    data-id="<?= (int) $prod['id'] ?>"
                                    data-name="<?= htmlspecialchars($prod['product_name'], ENT_QUOTES) ?>"
                                    data-price="<?= $prod['sale_price'] > 0 ? $prod['sale_price'] : $prod['price'] ?>"
                                    data-image="<?= htmlspecialchars(get_image_url('Product-Photos/' . $prod['photo_folder'] . '/' . $prod['photo1']), ENT_QUOTES) ?>">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
            
        </div>
    </section>

    
    <?php include('includes/text.php')?>
    

    <?php include('includes/footer.php')?>

    <script>
    let page = 1;
    let loading = false;
    let hasMore = true;

    window.addEventListener('scroll', () => {
        if (loading || !hasMore) return;
        
        // Check if we are near the bottom of the page
        if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight - 600) {
            loadMoreProducts();
        }
    });

    function loadMoreProducts() {
        loading = true;
        page++;
        
        const urlParams = new URLSearchParams(window.location.search);
        urlParams.set('page', page);
        urlParams.set('ajax', '1');
        
        // Preserve category query param if it exists in the original URL
        <?php if ($categorySlug !== ''): ?>
        urlParams.set('category', '<?= htmlspecialchars($categorySlug) ?>');
        <?php endif; ?>

        fetch(window.location.pathname + '?' + urlParams.toString())
            .then(response => response.text())
            .then(html => {
                if (html.trim() === '') {
                    hasMore = false; // No more products
                } else {
                    document.getElementById('product-list').insertAdjacentHTML('beforeend', html);
                }
                loading = false;
            })
            .catch(error => {
                console.error('Error fetching products:', error);
                loading = false;
            });
    }
    </script>
</body>
</html>