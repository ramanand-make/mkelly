<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once dirname(__DIR__, 2) . "/app/init.php";
require_once APP_ROOT . "/app/auth.php";
requireAdminLogin();
require_once APP_ROOT . "/app/module-data.php";
require_once APP_ROOT . "/../includes/functions.php";

$pageTitle = "Edit Product";
$productId = isset($_GET['id']) ? intval($_GET['id']) : 0;

$conn = getSashDBConnection();
$product = null;
$selected_categories = [];
$categories_grouped = [];
$existing_images = [];

if ($conn) {
    // Fetch product details
    $result = $conn->query("SELECT * FROM product WHERE id = $productId");
    if ($result && $result->num_rows > 0) {
        $product = $result->fetch_assoc();
        
        $product['name'] = $product['product_name'] ?? '';
        $product['status'] = $product['is_active'] ?? 1;
        $product['stock'] = $product['is_in_stock'] ?? 1;
        $product['image'] = !empty($product['photo1']) ? 'Product-Photos/' . $product['photo_folder'] . '/' . $product['photo1'] : '';

        // Fetch selected categories
        if (!empty($product['categories'])) {
            $selected_categories = explode(',', $product['categories']);
        }

        // Map existing images from product table
        for ($i=1; $i<=6; $i++) {
            if (!empty($product['photo'.$i])) {
                $existing_images[] = [
                    'id' => $i,
                    'image' => 'Product-Photos/' . $product['photo_folder'] . '/' . $product['photo'.$i]
                ];
            }
        }
    } else {
        header("Location: " . file_url("products/list.php"));
        exit();
    }

    // Fetch all categories for grouping
    $result = $conn->query("SELECT * FROM categories WHERE status = 1 ORDER BY name ASC");
    if ($result) {
        $all_cats = [];
        while ($row = $result->fetch_assoc()) {
            $all_cats[] = $row;
        }
        foreach ($all_cats as $cat) {
            
                $categories_grouped[$cat['id']] = ['name' => $cat['name'], 'sub' => []];
        
                
                    // $categories_grouped[$cat['parent_id']]['sub'][] = $cat;
                
            
        }
    }
    $conn->close();
}

include LAYOUT_PATH . "/head.php";
?>

<body class="app sidebar-mini ltr light-mode">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div id="global-loader">
        <img src="<?= asset_url("images/loader.svg") ?>" class="loader-img" alt="Loader">
    </div>

    <div class="page">
        <div class="page-main">
            <?php include LAYOUT_PATH . "/header.php"; ?>
            <?php include LAYOUT_PATH . "/sidebar.php"; ?>

            <div class="main-content app-content mt-0">
                <div class="side-app">
                    <div class="main-container container-fluid">
                       <div class="page-header bg-primary-gradient p-4 rounded-3 shadow-sm mb-4">
    
    <div class="d-flex align-items-center">
        <div class="me-3">
            <span class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center shadow-sm"
                  style="width:60px; height:60px; font-size:28px;">
                <i class="fe fe-edit"></i>
            </span>
        </div>

        <div>
            <h1 class="page-title text-white fw-bold mb-1">
                Edit Product
            </h1>
            <p class="text-white-50 mb-0">
                Update and manage your product details easily from here
            </p>
        </div>
    </div>

</div>

                        <div class="row">
                            <div class="col-md-12 col-sm-12">
                                <div class="card">
                                    <div class="card-header bg-primary text-white py-3">
                                        <h3 class="card-title mb-0 fw-bold fs-4">
                                            <i class="fe fe-shopping-bag me-2"></i>
                                            Product Details:
                                            <span class="text-warning">
                                                <?= htmlspecialchars($product['name']) ?>
                                            </span>
                                        </h3>
                                    </div>
                                    <div class="card-body">
                                        <form id="editProductForm" action="<?= file_url('products/update.php') ?>" method="POST" enctype="multipart/form-data">
                                            <input type="hidden" name="id" value="<?= $product['id'] ?>">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Product Name</label>
                                                    <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($product['name']) ?>" required>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Price (₹)</label>
                                                    <input type="number" id="price" step="0.01" class="form-control" name="price" value="<?= $product['price'] ?>" required>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Sale Price (₹)</label>
                                                    <input type="number" id="sale_price" step="0.01" class="form-control" name="sale_price" value="<?= $product['sale_price'] ?>">
                                                </div>
                                                 <div class="col-md-4 mb-3">
                                                    <label class="form-label">Discount</label>
                                                    <input type="text"
                                                           class="form-control"
                                                           id="discount"
                                                           readonly>
                                                </div>
                                                <script>
                                                    function calculateDiscount() {
                                                    
                                                        let price = parseFloat(document.getElementById('price').value) || 0;
                                                        let salePrice = parseFloat(document.getElementById('sale_price').value) || 0;
                                                    
                                                        let discount = 0;
                                                    
                                                        if (price > 0 && salePrice > 0 && salePrice < price) {
                                                            discount = ((price - salePrice) / price) * 100;
                                                        }
                                                    
                                                        document.getElementById('discount').value =
                                                            discount.toFixed(0) + '%';
                                                    }
                                                    
                                                    document.getElementById('price').addEventListener('input', calculateDiscount);
                                                    document.getElementById('sale_price').addEventListener('input', calculateDiscount);
                                                    
                                                    // Initial load
                                                    calculateDiscount();
                                                    </script>
                                                
                                                
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Categories (Select Multiple)</label>
                                                    <select class="form-control select2" name="categories[]" multiple="multiple">
                                                        <?php foreach ($categories_grouped as $p_id => $p_data): ?>
                                                            <!--<optgroup label="<?= htmlspecialchars($p_data['name']) ?>">-->
                                                                <option value="<?= $p_id ?>" <?= in_array($p_id, $selected_categories) ? 'selected' : '' ?>><?= htmlspecialchars($p_data['name']) ?></option>
                                                                <?php foreach ($p_data['sub'] as $sub): ?>
                                                                    <option value="<?= $sub['id'] ?>" <?= in_array($sub['id'], $selected_categories) ? 'selected' : '' ?>><?= htmlspecialchars($sub['name']) ?></option>
                                                                <?php endforeach; ?>
                                                            </optgroup>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Description</label>
                                                    <textarea class="form-control editor" id="description" name="description" rows="10"><?= htmlspecialchars($product['description'] ?? '') ?></textarea>
                                                </div>
                                                <!--images -->
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Product Images (Add New Images) <small>Size: 400 × 400</small></label>
                                                    <input type="file" class="form-control" name="images[]" accept="image/*" multiple>
                                                    <small class="text-muted">You can select multiple images to add to the existing ones.</small>
                                                    
                                                    <?php if (!empty($existing_images) || !empty($product['image'])): ?>
                                                    <div class="mt-3">
                                                        <label class="form-label">Existing Images</label>
                                                        <div class="d-flex flex-wrap gap-2">
                                                            <?php if (!empty($product['image'])): ?>
                                                            <!--<div class="position-relative">-->
                                                            <!--    <img src="<?= BASE_URL . '/../' . htmlspecialchars($product['image']) ?>" alt="Main Image" style="width:100px; height:100px; object-fit:cover; border-radius:5px; border:1px solid #ccc;">-->
                                                            <!--    <span class="badge bg-primary position-absolute top-0 start-0">Main</span>-->
                                                            <!--</div>-->
                                                            <?php endif; ?>
                                                            
                                                            <?php foreach ($existing_images as $img): ?>
                                                            <div class="position-relative">
                                                                <img src="<?= BASE_URL . '/../' . htmlspecialchars($img['image']) ?>" alt="Image" style="width:200px; height:200px; object-fit:cover; border-radius:5px; border:1px solid #ccc;">
                                                                <div class="position-absolute top-0 end-0">
                                                                    <label class="bg-danger text-white px-1 " style="cursor:pointer; font-size:18px;height:50px;width:50px">
                                                                        <input type="checkbox" name="delete_images[]" value="<?= $img['id'] ?>"><i class="fa-solid fa-x"></i>
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <?php endforeach; ?>
                                                        </div>
                                                    </div>
                                                    <?php endif; ?>
                                                </div>
                                                <!-- Got Any Questions -->
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Got Any Questions</label>
                                                    <textarea class="form-control editor" name="gotanyquestion"><?= htmlspecialchars($product['how_to_use'] ?? '') ?></textarea>
                                                </div>
                                                
                                                <!-- Return & Exchange -->
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Return and Exchange</label>
                                                    <textarea class="form-control editor" name="returnexchange"><?= htmlspecialchars($product['returnexchange'] ?? '') ?></textarea>
                                                </div>
                                                
                                                <!-- Disclaimer -->
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Disclaimer</label>
                                                    <textarea class="form-control editor" name="disclaimer"><?= htmlspecialchars($product['disclaimer'] ?? '') ?></textarea>
                                                </div>

                                                

                                                <!--<div class="col-md-6 mb-3">-->
                                                <!--    <label class="form-label">Stock</label>-->
                                                <!--    <input type="number" class="form-control" name="stock" value="<?= $product['stock'] ?>">-->
                                                <!--</div>-->
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Product Review Rating</label>
                                                
                                                    <select class="form-control" name="review_rating" required>
                                                        <option value="">Select Rating</option>
                                                
                                                        <option value="4"
                                                            <?= ($product['product_review'] == '4') ? 'selected' : '' ?>>
                                                            4 Star
                                                        </option>
                                                
                                                        <option value="4.5"
                                                            <?= ($product['product_review'] == '4.5') ? 'selected' : '' ?>>
                                                            4.5 Star
                                                        </option>
                                                
                                                        <option value="5"
                                                            <?= ($product['product_review'] == '5') ? 'selected' : '' ?>>
                                                            5 Star
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Status</label>
                                                    <select class="form-control" name="status">
                                                        <option value="1" <?= $product['status'] ? 'selected' : '' ?>>Active</option>
                                                        <option value="0" <?= !$product['status'] ? 'selected' : '' ?>>Inactive</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Ratti Status</label>
                                                    <select class="form-control" name="ratti_status">
                                                        <option value="1" <?= (isset($product['is_ratti']) && $product['is_ratti'] == '1') ? 'selected' : '' ?>>Active</option>
                                                        <option value="0" <?= (!isset($product['is_ratti']) || $product['is_ratti'] == '0') ? 'selected' : '' ?>>Inactive</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button type="submit" class="btn btn-primary">Update Product</button>
                                                <a href="<?= file_url("products/list.php") ?>" class="btn btn-light">Cancel</a>
                                            </div>
                                        </form>

                                        <!-- CKEditor CDN -->
                                        <script src="https://cdn.ckeditor.com/ckeditor5/39.0.1/classic/ckeditor.js"></script>

                                        <style>
                                            .ck-editor__editable_inline {
                                                min-height: 200px;
                                            }
                                        </style>

                                        <script>
                                            document.querySelectorAll('.editor').forEach((element) => {
                                                ClassicEditor
                                                    .create(element, {
                                                        toolbar: [
                                                            'heading', '|', 'bold', 'italic', 'underline', '|', 
                                                            'link', 'bulletedList', 'numberedList', '|', 
                                                            'insertTable', 'blockQuote', '|', 'undo', 'redo'
                                                        ]
                                                    })
                                                    .catch(error => {
                                                        console.error(error);
                                                    });
                                            });
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include LAYOUT_PATH . "/footer.php"; ?>
    </div>
    <?php include LAYOUT_PATH . "/scripts.php"; ?>
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                placeholder: "Select Categories",
                width: '100%'
            });
        });
    </script>
</body>
</html>
