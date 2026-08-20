<?php
require_once dirname(__DIR__, 2) . "/app/init.php";
require_once APP_ROOT . "/app/auth.php";
requireAdminLogin();
require_once APP_ROOT . "/app/module-data.php";

$pageTitle = "Add New Product";

// Fetch categories for the multi-select
$conn = getSashDBConnection();
$categories_grouped = [];

if ($conn) {

    $result = $conn->query("
        SELECT id, name 
        FROM categories 
        WHERE status = 1
        ORDER BY name ASC
    ");

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $categories_grouped[] = $row;
        }
    }

    $conn->close();
}

include LAYOUT_PATH . "/head.php";
?>

<body class="app sidebar-mini ltr light-mode">
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
                                    <i class="fe fe-package"></i>
                                </span>
                            </div>
                    
                            <div>
                                <h1 class="page-title text-white fw-bold mb-1">
                                    Add New Product
                                </h1>
                                <p class="text-white-50 mb-0">
                                    Fill in the product details to add a new item to your store
                                </p>
                            </div>
                        </div>
                    
                    </div>

                        <div class="row">
                            <div class="col-md-812col-sm-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Product Details</h3>
                                    </div>
                                    <div class="card-body">
                                        <form id="addProductForm" action="<?= file_url('products/save.php') ?>" method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Product Name</label>
                                                    <input type="text" class="form-control" name="name" required  maxlength="50">
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Price (₹)</label>
                                                    <input type="number" step="0.01" class="form-control" id="price" name="price" required>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Sale Price (₹)</label>
                                                    <input type="number" step="0.01" class="form-control" id="sale_price" name="sale_price">
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
                                                                <option value="<?= $p_id ?>"><?= htmlspecialchars($p_data['name']) ?></option>
                                                                <?php foreach ($p_data['sub'] as $sub): ?>
                                                                    <option value="<?= $sub['id'] ?>"><?= htmlspecialchars($sub['name']) ?></option>
                                                                <?php endforeach; ?>
                                                            <!--</optgroup>-->
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Description</label>
                                        
                                                    <textarea 
                                                        class="form-control editor" 
                                                        id="description" 
                                                        name="description" 
                                                        rows="10">
                                                    </textarea>
                                                </div>
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Product Images <small>Size: 400 × 400</small></label>
                                                
                                                    <input 
                                                        type="file" 
                                                        class="form-control" 
                                                        name="images[]" 
                                                        accept="image/*" 
                                                         id="productImages"
                                                        multiple 
                                                        required>
                                                        
                                                    <small class="text-muted">
                                                        You can select multiple images 
                                                    </small>
                                                    <div id="imageError" class="text-danger mt-2"></div>
                                                    <div id="selectedImages" class="mt-3"></div>
                                                </div>
                                                <script>
                                                    const imageInput = document.getElementById('productImages');
                                                    const errorDiv = document.getElementById('imageError');
                                                    const selectedImagesDiv = document.getElementById('selectedImages');
                                                    
                                                    imageInput.addEventListener('change', function (e) {
                                                    
                                                        errorDiv.innerHTML = "";
                                                        selectedImagesDiv.innerHTML = "";
                                                    
                                                        const files = Array.from(e.target.files);
                                                    
                                                        let dt = new DataTransfer();
                                                        let processedFiles = 0;
                                                    
                                                        if (files.length === 0) {
                                                            imageInput.value = "";
                                                            return;
                                                        }
                                                    
                                                        files.forEach(file => {
                                                    
                                                            // File size validation
                                                            if (file.size > 10 * 1024 * 1024) {
                                                    
                                                                errorDiv.innerHTML += `
                                                                    <div>${file.name} - File size must not exceed 10MB.</div>
                                                                `;
                                                    
                                                                processedFiles++;
                                                    
                                                                checkCompleted();
                                                                return;
                                                            }
                                                    
                                                            const img = new Image();
                                                            const objectUrl = URL.createObjectURL(file);
                                                    
                                                            img.onload = function () {
                                                    
                                                                // 400x400 validation
                                                                if (this.width === 400 && this.height === 400) {
                                                    
                                                                    dt.items.add(file);
                                                    
                                                                    selectedImagesDiv.innerHTML += `
                                                                        <div class="text-success">
                                                                            ✔ ${file.name} selected successfully
                                                                        </div>
                                                                    `;
                                                    
                                                                } else {
                                                    
                                                                    errorDiv.innerHTML += `
                                                                        <div>
                                                                            ${file.name} - Image must be exactly 400 × 400 pixels.
                                                                        </div>
                                                                    `;
                                                                }
                                                    
                                                                processedFiles++;
                                                    
                                                                checkCompleted();
                                                    
                                                                URL.revokeObjectURL(objectUrl);
                                                            };
                                                    
                                                            img.src = objectUrl;
                                                        });
                                                    
                                                        function checkCompleted() {
                                                    
                                                            // Jab sari images process ho jaye
                                                            if (processedFiles === files.length) {
                                                    
                                                                // Sirf valid images select hongi
                                                                imageInput.files = dt.files;
                                                    
                                                                // Minimum 5 valid images validation
                                                                if (dt.files.length < 3) {
                                                    
                                                                    errorDiv.innerHTML += `
                                                                        <div class="mt-2 fw-bold">
                                                                            ⚠ Minimum 5 valid images are required.
                                                                        </div>
                                                                    `;
                                                                }
                                                    
                                                                // Agar ek bhi valid image nahi hai
                                                                if (dt.files.length === 0) {
                                                    
                                                                    imageInput.value = "";
                                                    
                                                                    errorDiv.innerHTML += `
                                                                        <div class="mt-2 fw-bold">
                                                                            No valid images selected.
                                                                        </div>
                                                                    `;
                                                                }
                                                            }
                                                        }
                                                    });
                                                    </script>
                                                <!--<script>-->
                                                <!--    document.getElementById('productImages').addEventListener('change', function () {-->
                                                    
                                                <!--        if (this.files.length !== 5) {-->
                                                    
                                                <!--            alert('Please select exactly 5 images.');-->
                                                    
                                                <!--            this.value = '';-->
                                                <!--        }-->
                                                <!--    });-->
                                                <!--    </script>-->
                                                <!-- Benefit -->
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Benefit</label>
                                                
                                                    <textarea 
                                                        class="form-control editor" 
                                                        name="benefit">
                                                    </textarea>
                                                </div>
                                                
                                                <!-- How To Use -->
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">How to Use</label>
                                                
                                                    <textarea 
                                                        class="form-control editor" 
                                                        name="how_to_use">
                                                    </textarea>
                                                </div>
                                                
                                                <!-- Return & Exchange -->
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Return and Exchange</label>
                                                
                                                    <textarea 
                                                        class="form-control editor" 
                                                        name="returnexchange">
                                                    </textarea>
                                                </div>
                                                
                                                <!-- Disclaimer -->
                                                <div class="col-md-12 mb-3">
                                                    <label class="form-label">Disclaimer</label>
                                                
                                                    <textarea 
                                                        class="form-control editor" 
                                                        name="disclaimer">
                                                    </textarea>
                                                </div>

                                                
                                                
                                                <!--<div class="col-md-6 mb-3">-->
                                                <!--    <label class="form-label">Stock</label>-->
                                                <!--    <input type="number" class="form-control" name="stock" value="100">-->
                                                <!--</div>-->
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Product Review Rating</label>
                                                
                                                    <select class="form-control" name="review_rating" required>
                                                        <option value="">Select Rating</option>
                                                        <option value="4">4 Star</option>
                                                        <option value="4.5">4.5 Star</option>
                                                        <option value="5">5 Star</option>
                                                    </select>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label class="form-label">Status</label>
                                                    <select class="form-control" name="status">
                                                        <option value="1">Active</option>
                                                        <option value="0">Inactive</option>
                                                    </select>
                                                </div>
                                                 <div class="col-md-4 mb-3">
                                                    <label class="form-label">Ratti Status</label>
                                                        <select class="form-control" name="ratti_status">
                                                            <option value="" >Select Ratti</option>
                                                            <option value="1" >Active</option>
                                                            <option value="0">Inactive</option>
                                                        </select>
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                <button type="submit" class="btn btn-primary">Save Product</button>
                                                <a href="<?= file_url("products/list") ?>" class="btn btn-light">Cancel</a>
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
                    'heading',
                    '|',
                    'bold',
                    'italic',
                    'underline',
                    '|',
                    'link',
                    'bulletedList',
                    'numberedList',
                    '|',
                    'insertTable',
                    'blockQuote',
                    '|',
                    'undo',
                    'redo'
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
