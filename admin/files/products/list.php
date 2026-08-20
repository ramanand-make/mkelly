<?php

require_once dirname(__DIR__, 2) . "/app/init.php";
require_once APP_ROOT . "/app/auth.php";
requireAdminLogin();
require_once APP_ROOT . "/app/module-data.php";

$pageTitle = "Product List";

// Fetch products directly from DB for the admin table
$conn = getSashDBConnection();
$products = [];
// Products
$stmt = $conn->prepare("
    SELECT *
    FROM product
    ORDER BY id DESC
");
if ($stmt) {
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result) {
        // Fetch categories to map IDs to names
        $catResult = $conn->query("SELECT id, name FROM categories");
        $categoryMap = [];
        if ($catResult) {
            while ($c = $catResult->fetch_assoc()) {
                $categoryMap[$c['id']] = $c['name'];
            }
        }

        while ($row = $result->fetch_assoc()) {
            $catIds = explode(',', $row['categories'] ?? '');
            $catNames = [];
            foreach ($catIds as $catId) {
                if (isset($categoryMap[trim($catId)])) {
                    $catNames[] = $categoryMap[trim($catId)];
                }
            }
            $row['category_names'] = implode(', ', $catNames);
            $products[] = $row;
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
                        <div class="page-header d-flex justify-content-between align-items-center bg-primary-gradient p-4 rounded-3 shadow-sm mb-4">
    
                                <div>
                                    <h1 class="page-title text-white fw-bold mb-1">
                                        <i class="fe fe-shopping-bag me-2"></i> Products
                                    </h1>
                                    <p class="text-white-50 mb-0">
                                        Manage and organize all your products from here
                                    </p>
                                </div>
                            
                                <div>
                                    <a href="<?= file_url("products/add") ?>" 
                                       class="btn btn-light btn-lg fw-semibold shadow-sm">
                                        <i class="fe fe-plus-circle me-1"></i> Add New Product
                                    </a>
                                </div>
                            
                            </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Manage Products</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-15p border-bottom-0">Image</th>
                                                        <th class="wd-15p border-bottom-0">Name</th>
                                                        <th class="wd-20p border-bottom-0">Categories</th>
                                                        <th class="wd-15p border-bottom-0">Price</th>
                                                        <th class="wd-15p border-bottom-0">Stock</th>
                                                        <th class="wd-10p border-bottom-0">Status</th>
                                                        <th class="wd-25p border-bottom-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($products as $product): ?>
                                                    
                                                    <tr>
                                                        <td>
                                                            <img 
                                                                src="<?= !empty($product['photo1']) 
                                                                    ? BASE_URL . '/../Product-Photos/' . $product['photo_folder'] . '/' . $product['photo1'] 
                                                                    : asset_url('images/no-image.png') ?>" 
                                                                alt=""
                                                                style="width:50px; height:50px; object-fit:cover; border-radius:5px;"
                                                            >
                                                        </td>
                                                        <td><?= htmlspecialchars($product['product_name']) ?></td>
                                                        <td><?= htmlspecialchars($product['category_names'] ?: 'Uncategorized') ?></td>
                                                        <td>
                                                            <?php if ($product['sale_price']): ?>
                                                                <del>₹<?= $product['price'] ?></del> <span class="text-success">₹<?= $product['sale_price'] ?></span>
                                                            <?php else: ?>
                                                                ₹<?= $product['price'] ?>
                                                            <?php endif; ?>
                                                        </td>
                                                        <td>
                                                            <select class="form-control change-stock-status" 
                                                                    data-id="<?= $product['id'] ?>">
                                                                    
                                                                <option value="1" <?= ($product['is_in_stock'] == 1) ? 'selected' : '' ?>>
                                                                    In Stock
                                                                </option>
                                                                
                                                                <option value="0" <?= ($product['is_in_stock'] == 0) ? 'selected' : '' ?>>
                                                                    Out Of Stock
                                                                </option>
                                                                
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-<?= $product['is_active'] ? 'success' : 'danger' ?>">
                                                                <?= $product['is_active'] ? 'Active' : 'Inactive' ?>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="<?= file_url("products/edit.php?id=" . $product['id']) ?>" class="btn btn-sm btn-primary">Edit</a>
                                                            <button class="btn btn-sm btn-danger delete-product" data-id="<?= $product['id'] ?>">Delete</button>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                            

                                        </div>
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

    <!-- Delete Form -->
    <form id="deleteProductForm" action="<?= file_url("products/delete.php") ?>" method="POST" style="display:none;">
        <input type="hidden" name="id" id="deleteProductId">
    </form>

    <?php include LAYOUT_PATH . "/scripts.php"; ?>
    <script>
        $(document).ready(function() {
            $('.delete-product').click(function() {
                if (confirm('Are you sure you want to delete this product?')) {
                    var id = $(this).data('id');
                    $('#deleteProductId').val(id);
                    $('#deleteProductForm').submit();
                }
            });
        });
    </script>
    

<script>
$(document).ready(function () {
    // Destroy existing initialization if any
    if ($.fn.DataTable.isDataTable('#basic-datatable')) {
        $('#basic-datatable').DataTable().destroy();
    }
    
    // Initialize DataTables
    $('#basic-datatable').DataTable({
        pageLength: 20,
        lengthMenu: [[20, 50, 100, -1], [20, 50, 100, "All"]],
        language: {
            searchPlaceholder: 'Search products...',
            sSearch: '',
        }
    });

    $('.change-stock-status').change(function () {

        let productId = $(this).data('id');
        let stockStatus = $(this).val();

        $.ajax({
            url: 'change-stock-status.php',
            type: 'POST',
            data: {
                id: productId,
                is_in_stock: stockStatus
            },

           success: function (response) {

                if (response.includes('success')) {

                    alert('Stock status updated successfully');

                } else {

                    alert('Update failed');

                }
            },
            error: function () {
                alert('Something went wrong');
            }
        });

    });

});
</script>
</body>
</html>
