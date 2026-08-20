<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once dirname(__DIR__, 2) . "/app/init.php";
require_once APP_ROOT . "/app/auth.php";
requireAdminLogin();
require_once APP_ROOT . "/app/module-data.php";

$pageTitle = "Category List";

$conn = getSashDBConnection();
$categories = [];
if ($conn) {

    $result = $conn->query("
        SELECT *
        FROM categories
        ORDER BY name ASC
    ");

    if ($result) {

        while ($row = $result->fetch_assoc()) {
            $categories[] = $row;
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
                                    <i class="fe fe-grid me-2"></i> Categories & Subcategories
                                </h1>
                                <p class="text-white-50 mb-0">
                                    Manage all categories and subcategories from here
                                </p>
                            </div>
                        
                            <div>
                                <button type="button" 
                                        class="btn btn-light btn-lg fw-semibold shadow-sm"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#addCategoryModal">
                                    <i class="fe fe-plus-circle me-1"></i> Add New Category
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Manage Categories</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                                <thead>
                                                    <tr>
                                                        <th class="wd-10p border-bottom-0">ID</th>
                                                        <th class="wd-25p border-bottom-0">Name</th>
                                                        <th class="wd-25p border-bottom-0">Link</th>
                                                        <th class="wd-20p border-bottom-0">Status</th>
                                                        <th class="wd-20p border-bottom-0">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $count = 1; foreach ($categories as $cat): ?>
                                                    <tr>
                                                        <td><?= $count ?></td>
                                                        <?php $count++ ?>
                                                        <td><?= htmlspecialchars($cat['name']) ?></td>
                                                        <td>
                                                            <?php 
                                                                $catLink = "https://shop.astrologerraajeev.com/collection/" . htmlspecialchars($cat['slug'] ?? '');
                                                            ?>
                                                            <div class="d-flex align-items-center gap-2">
                                                                <a href="<?= $catLink ?>" target="_blank" class="btn btn-sm btn-outline-primary" title="Open Link">
                                                                    <i class="fe fe-external-link"></i> Open
                                                                </a>
                                                                <button type="button" class="btn btn-sm btn-outline-secondary copy-link" data-link="<?= $catLink ?>" title="Copy Link">
                                                                    <i class="fe fe-copy"></i> Copy
                                                                </button>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <span class="badge bg-<?= $cat['status'] ? 'success' : 'danger' ?>">
                                                                <?= $cat['status'] ? 'Active' : 'Inactive' ?>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <button class="btn btn-sm btn-primary edit-category" data-id="<?= $cat['id'] ?>" data-name="<?= htmlspecialchars($cat['name']) ?>"  data-status="<?= $cat['status'] ?>">Edit</button>
                                                            <button class="btn btn-sm btn-danger delete-category" data-id="<?= $cat['id'] ?>">Delete</button>
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

    <!-- Add Category Modal -->
    <div class="modal fade" id="addCategoryModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Category / Subcategory</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="addCategoryForm" action="<?= file_url("categories/save.php") ?>" method="POST">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <!--<div class="mb-3">-->
                        <!--    <label class="form-label">Parent Category (Optional)</label>-->
                        <!--    <select class="form-control" name="parent_id">-->
                        <!--        <option value="0">None (Create as Main Category)</option>-->
                        <!--        <?php foreach ($parent_categories as $pcat): ?>-->
                        <!--            <option value="<?= $pcat['id'] ?>"><?= htmlspecialchars($pcat['name']) ?></option>-->
                        <!--        <?php endforeach; ?>-->
                        <!--    </select>-->
                        <!--</div>-->
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editCategoryForm" action="<?= file_url("categories/update.php") ?>" method="POST">
                    <input type="hidden" name="id" id="edit_cat_id">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Category Name</label>
                            <input type="text" class="form-control" name="name" id="edit_cat_name" required>
                        </div>
                        <!--<div class="mb-3">-->
                        <!--    <label class="form-label">Parent Category</label>-->
                        <!--    <select class="form-control" name="parent_id" id="edit_cat_parent">-->
                        <!--        <option value="0">None (Main Category)</option>-->
                        <!--        <?php foreach ($parent_categories as $pcat): ?>-->
                        <!--            <option value="<?= $pcat['id'] ?>"><?= htmlspecialchars($pcat['name']) ?></option>-->
                        <!--        <?php endforeach; ?>-->
                        <!--    </select>-->
                        <!--</div>-->
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select class="form-control" name="status" id="edit_cat_status">
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update Category</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Form -->
    <form id="deleteCategoryForm" action="<?= file_url("categories/delete.php") ?>" method="POST" style="display:none;">
        <input type="hidden" name="id" id="deleteCatId">
    </form>

    <?php include LAYOUT_PATH . "/scripts.php"; ?>
    <script>
        $(document).ready(function() {
            $('.edit-category').click(function() {
                var id = $(this).data('id');
                var name = $(this).data('name');
                var parent = $(this).data('parent');
                var status = $(this).data('status');

                $('#edit_cat_id').val(id);
                $('#edit_cat_name').val(name);
                $('#edit_cat_parent').val(parent);
                $('#edit_cat_status').val(status);
                
                $('#editCategoryModal').modal('show');
            });

            $('.delete-category').click(function() {
                if (confirm('Are you sure? This will delete the category and its products linkage.')) {
                    var id = $(this).data('id');
                    $('#deleteCatId').val(id);
                    $('#deleteCategoryForm').submit();
                }
            });
        });
    </script>
    
     <script>
        $(document).ready(function() {
            // Destroy any existing initialization
            if ($.fn.DataTable.isDataTable('#basic-datatable')) {
                $('#basic-datatable').DataTable().destroy();
            }
            
            // Initialize DataTables with 15 items per page and search filter
            $('#basic-datatable').DataTable({
                pageLength: 15,
                lengthMenu: [[15, 30, 50, -1], [15, 30, 50, "All"]],
                language: {
                    searchPlaceholder: 'Search categories...',
                    sSearch: '',
                },
                order: [[0, 'asc']] // Default order by ID column
            });

            // Copy Link Functionality
            $(document).on('click', '.copy-link', function() {
                var btn = $(this);
                var link = btn.data('link');
                var originalHtml = btn.html();
                
                if (navigator.clipboard && window.isSecureContext) {
                    navigator.clipboard.writeText(link).then(function() {
                        btn.html('<i class="fe fe-check"></i> Copied!');
                        btn.removeClass('btn-outline-secondary').addClass('btn-success text-white');
                        setTimeout(function() {
                            btn.html(originalHtml);
                            btn.removeClass('btn-success text-white').addClass('btn-outline-secondary');
                        }, 2000);
                    });
                } else {
                    // Fallback for non-secure contexts (http)
                    var textArea = document.createElement("textarea");
                    textArea.value = link;
                    textArea.style.position = "fixed";
                    document.body.appendChild(textArea);
                    textArea.focus();
                    textArea.select();
                    try {
                        document.execCommand('copy');
                        btn.html('<i class="fe fe-check"></i> Copied!');
                        btn.removeClass('btn-outline-secondary').addClass('btn-success text-white');
                        setTimeout(function() {
                            btn.html(originalHtml);
                            btn.removeClass('btn-success text-white').addClass('btn-outline-secondary');
                        }, 2000);
                    } catch (err) {
                        console.error('Fallback: Oops, unable to copy', err);
                    }
                    document.body.removeChild(textArea);
                }
            });
        });
    </script>
</body>
</html>
