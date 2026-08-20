<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once __DIR__ . '/../../app/init.php';
require_once __DIR__ . '/../../app/auth.php';

requireAdminLogin();
require_once __DIR__ . "/../../app/module-data.php";
require_once __DIR__ . "/../../../includes/functions.php";

$pageTitle = "Orders";


$conn = getSashDBConnection();
$orders = [];
$status_filter = isset($_GET['status']) ? $_GET['status'] : '';

if ($conn) {
    // Fetch all orders
    $query = "SELECT * FROM orders";
    if (!empty($status_filter)) {
        $status_filter_escaped = $conn->real_escape_string($status_filter);
        $query .= " WHERE order_status = '$status_filter_escaped'";
    }
    $query .= " ORDER BY created_at DESC";
    
    $res = $conn->query($query);
    if ($res) {
        while ($row = $res->fetch_assoc()) {
            $order_id = $row['id'];
            // Fetch items
            $item_res = $conn->query("SELECT * FROM order_items WHERE order_id = $order_id");
            $items = [];
            if ($item_res) {
                while ($item_row = $item_res->fetch_assoc()) {
                    $items[] = $item_row;
                }
            }
            $row['items'] = $items;
            $orders[] = $row;
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
                                    <span class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width:60px; height:60px; font-size:28px;">
                                        <i class="fe fe-shopping-cart"></i>
                                    </span>
                                </div>
                                <div>
                                    <h1 class="page-title text-white fw-bold mb-1">
                                        Orders <?= !empty($status_filter) ? ' - ' . ucfirst(htmlspecialchars($status_filter)) : '' ?>
                                    </h1>
                                    <p class="text-white-50 mb-0">View and manage all customer orders</p>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">All Orders</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered text-nowrap border-bottom" id="basic-datatable">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Order ID</th>
                                                        <th>Payment ID</th>
                                                        <th>Customer Details</th>
                                                        <th>Address</th>
                                                        <th>Location</th>
                                                        <th>Products & Images</th>
                                                        <th>Total Amount</th>
                                                        <th>Ratti</th>
                                                        
                                                        <th>Payment Status</th>
                                                        <th>Order Status</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (empty($orders)): ?>
                                                        <tr><td colspan="13" class="text-center">No orders found yet.</td></tr>
                                                    <?php else: ?>
                                                        <?php foreach ($orders as $order): ?>
                                                        <tr>
                                                            <td class="align-middle"><strong><?= htmlspecialchars($order['id']) ?></strong></td>
                                                            <td class="align-middle"><?= htmlspecialchars($order['order_id'] ?? '—') ?></td>
                                                            <td class="align-middle"><?= htmlspecialchars($order['payment_id'] ?? '—') ?></td>
                                                            <td class="align-middle">
                                                                <div class="fw-bold"><?= htmlspecialchars($order['name'] ?? '') ?></div>
                                                                <div class="text-muted small"><?= htmlspecialchars($order['email'] ?? '') ?></div>
                                                                <div class="text-muted small"><?= htmlspecialchars($order['phone'] ?? '') ?></div>
                                                            </td>
                                                            <td class="align-middle text-wrap" style="max-width: 200px;">
                                                                <?= htmlspecialchars($order['address1'] ?? '') ?>
                                                                <?php if(!empty($order['address2'])): ?><br><?= htmlspecialchars($order['address2']) ?><?php endif; ?>
                                                            </td>
                                                            <td class="align-middle">
                                                                <?= htmlspecialchars($order['city'] ?? '') ?>, 
                                                                <?= htmlspecialchars($order['state'] ?? '') ?><br>
                                                                <?= htmlspecialchars($order['pincode'] ?? '') ?>
                                                            </td>
                                                            <td class="align-middle">
                                                                <?php if (!empty($order['items'])): ?>
                                                                    <div class="d-flex flex-column gap-2">
                                                                    <?php foreach ($order['items'] as $item): ?>
                                                                        <div class="d-flex align-items-center gap-2">
                                                                            <img src="<?= BASE_URL . "/../" . htmlspecialchars($item['product_image'] ?? 'assets/images/placeholder.jpg') ?>" 
                                                                                 alt="Product" 
                                                                                 style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px; border: 1px solid #eee;">
                                                                            <div style="max-width:200px;">
                                                                                <div class="text-truncate" title="<?= htmlspecialchars($item['product_name']) ?>">
                                                                                    <?= htmlspecialchars($item['product_name']) ?>
                                                                                </div>
                                                                                <small class="text-muted">Qty: <?= $item['qty'] ?></small>
                                                                            </div>
                                                                        </div>
                                                                    <?php endforeach; ?>
                                                                    </div>
                                                                <?php else: ?>
                                                                    <span class="text-muted">No items</span>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td class="align-middle fw-bold">₹<?= number_format((float)($order['total_amount'] ?? 0), 2) ?></td>
                                                            <td class="align-middle"><?= htmlspecialchars($order['no_of_ratti'] ?? '0') ?></td>
                                                           
                                                            <td class="align-middle">
                                                                <?php
                                                                    $pStatus = strtolower($order['payment_status'] ?? 'pending');
                                                                    $badgeClass = 'warning';
                                                                    if ($pStatus === 'success') $badgeClass = 'success';
                                                                    if ($pStatus === 'failed') $badgeClass = 'danger';
                                                                ?>
                                                                <span class="badge bg-<?= $badgeClass ?>">
                                                                    <?= ucfirst($order['payment_status'] ?? 'Pending') ?>
                                                                </span>
                                                            </td>
                                                            <td class="align-middle">
                                                                <select class="form-select order-status" data-order-id="<?= $order['id'] ?>">
                                                                    <option value="pending" <?= ($order['order_status'] ?? 'pending') == 'pending' ? 'selected' : '' ?>>Pending</option>
                                                                    <option value="packed" <?= ($order['order_status'] ?? '') == 'packed' ? 'selected' : '' ?>>Packed</option>
                                                                    <option value="shipped" <?= ($order['order_status'] ?? '') == 'shipped' ? 'selected' : '' ?>>Shipped</option>
                                                                    <option value="delivered" <?= ($order['order_status'] ?? '') == 'delivered' ? 'selected' : '' ?>>Delivered</option>
                                                                    <option value="cancelled" <?= ($order['order_status'] ?? '') == 'cancelled' ? 'selected' : '' ?>>Cancelled</option>
                                                                </select>
                                                            </td>
                                                            <td class="align-middle">
                                                                <?= date('d M Y, h:i A', strtotime($order['created_at'])) ?>
                                                            </td>
                                                        </tr>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
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
    
    <?php include LAYOUT_PATH . "/scripts.php"; ?>
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
                    searchPlaceholder: 'Search orders...',
                    sSearch: '',
                },
                order: [[12, 'desc']] // Default order by Date column descending
            });
        });
        
        // Mousedown gate fix to prevent DataTables from triggering extra API calls
        var activeOrderSelect = null;
        var previousOrderStatus = null;

        $(document).on('mousedown', '.order-status', function () {
            activeOrderSelect = this;
            previousOrderStatus = this.value;
        });

        $(document).on('change', '.order-status', function () {
            if (this !== activeOrderSelect) return;

            var selectBox = $(this);
            var orderId = selectBox.data('order-id');
            var orderStatus = selectBox.val();

            if (orderStatus === previousOrderStatus) {
                activeOrderSelect = null;
                return;
            }

            activeOrderSelect = null;
            selectBox.prop('disabled', true);

            $.ajax({
                url: 'ajax/update-order-status.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    order_id: orderId,
                    order_status: orderStatus
                },
                success: function (response) {
                    if (response.success) {
                        showStatusToast('Order #' + orderId + ' status updated.', 'success');
                    } else {
                        selectBox.val(previousOrderStatus);
                        showStatusToast(' ' + (response.message || 'Update failed.'), 'danger');
                    }
                },
                error: function (xhr) {
                    console.error(xhr.responseText);
                    selectBox.val(previousOrderStatus);
                    showStatusToast('Network error — please try again.', 'danger');
                },
                complete: function () {
                    selectBox.prop('disabled', false);
                }
            });
        });

        function showStatusToast(msg, type) {
            var toast = $('<div>')
                .addClass('alert alert-' + type + ' alert-dismissible shadow-sm')
                .css({
                    position: 'fixed',
                    bottom: '24px',
                    right: '24px',
                    zIndex: 99999,
                    minWidth: '280px',
                    fontSize: '13px',
                    animation: 'none'
                })
                .html(msg + '<button type="button" class="btn-close" data-bs-dismiss="alert"></button>');
            $('body').append(toast);
            setTimeout(function () { toast.fadeOut(400, function () { toast.remove(); }); }, 3500);
        }
    </script>
</body>
</html>
