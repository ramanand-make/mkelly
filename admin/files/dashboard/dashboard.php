<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
require_once __DIR__ . '/../../app/init.php';
require_once __DIR__ . '/../../app/auth.php';

requireAdminLogin();
require_once __DIR__ . "/../../app/module-data.php";

$pageTitle = "Dashboard";
$dashboardStats = getDashboardMetricsCategories();
// Also get the standard metrics for sales/orders
$salesStats = getDashboardMetrics();

$adminName = htmlspecialchars(
    $_SESSION["admin_username"] ?? "Admin User",
    ENT_QUOTES,
    "UTF-8",
);
include LAYOUT_PATH . "/head.php";
?>

<body class="app sidebar-mini ltr light-mode">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="<?= asset_url("images/loader.svg") ?>" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <?php include LAYOUT_PATH . "/header.php"; ?>
            <?php include LAYOUT_PATH . "/sidebar.php"; ?>

            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">
                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">
                       <div class="page-header">
                            <h1 class="page-title">नमस्ते <?= $adminName ?></h1>
                        </div>

                        <!-- ORDERS STATS -->
                        <div class="row mt-4">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card overflow-hidden" style="cursor:pointer;" onclick="window.location.href='../products/orders'">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <h6 class="mb-2">Total Orders</h6>
                                                <h2 class="mb-0 number-font"><?= $dashboardStats['total_orders'] ?></h2>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="bg-primary text-white rounded-circle p-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fe fe-shopping-bag"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card overflow-hidden" style="cursor:pointer;" onclick="window.location.href='../products/orders'">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <h6 class="mb-2">Success Orders</h6>
                                                <h2 class="mb-0 number-font text-success"><?= $dashboardStats['success_orders'] ?></h2>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="bg-success text-white rounded-circle p-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fe fe-check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card overflow-hidden" style="cursor:pointer;" onclick="window.location.href='../products/orders'">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <h6 class="mb-2">Pending Orders</h6>
                                                <h2 class="mb-0 number-font text-warning"><?= $dashboardStats['pending_orders'] ?></h2>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="bg-warning text-white rounded-circle p-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fe fe-clock"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- ORDER STATUS STATS -->
                        <div class="row mt-4">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card overflow-hidden" style="cursor:pointer;" onclick="window.location.href='../products/orders?status=packed'">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <h6 class="mb-2">Packed Orders</h6>
                                                <h2 class="mb-0 number-font text-info"><?= $dashboardStats['packed_orders'] ?></h2>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="bg-info text-white rounded-circle p-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fe fe-package"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card overflow-hidden" style="cursor:pointer;" onclick="window.location.href='../products/orders?status=shipped'">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <h6 class="mb-2">Shipped Orders</h6>
                                                <h2 class="mb-0 number-font text-primary"><?= $dashboardStats['shipped_orders'] ?></h2>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="bg-primary text-white rounded-circle p-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fe fe-truck"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card overflow-hidden" style="cursor:pointer;" onclick="window.location.href='../products/orders?status=delivered'">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <h6 class="mb-2">Delivered Orders</h6>
                                                <h2 class="mb-0 number-font text-success"><?= $dashboardStats['delivered_orders'] ?></h2>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="bg-success text-white rounded-circle p-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fe fe-check-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- BOOKING STATS -->
                        <div class="row mt-4">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card overflow-hidden" style="cursor:pointer;" onclick="window.location.href='../astrobooking/list'">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <h6 class="mb-2">Total Bookings</h6>
                                                <h2 class="mb-0 number-font"><?= $dashboardStats['total_bookings'] ?></h2>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="bg-info text-white rounded-circle p-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fe fe-calendar"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card overflow-hidden" style="cursor:pointer;" onclick="window.location.href='../astrobooking/list'">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <h6 class="mb-2">Success Bookings</h6>
                                                <h2 class="mb-0 number-font text-success"><?= $dashboardStats['success_bookings'] ?></h2>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="bg-success text-white rounded-circle p-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fe fe-check-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card overflow-hidden" style="cursor:pointer;" onclick="window.location.href='../astrobooking/list'">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <h6 class="mb-2">Pending Bookings</h6>
                                                <h2 class="mb-0 number-font text-warning"><?= $dashboardStats['pending_bookings'] ?></h2>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="bg-warning text-white rounded-circle p-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fe fe-clock"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- CATEGORY STATS -->
                        <div class="row mt-4">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card overflow-hidden" style="cursor:pointer;" onclick="window.location.href='../categories/list'">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <h6 class="mb-2">Total Categories</h6>
                                                <h2 class="mb-0 number-font"><?= $dashboardStats['total_categories'] ?></h2>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="bg-primary text-white rounded-circle p-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fe fe-grid"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card overflow-hidden" style="cursor:pointer;" onclick="window.location.href='../categories/list'">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <h6 class="mb-2">Active Categories</h6>
                                                <h2 class="mb-0 number-font text-success"><?= $dashboardStats['active_categories'] ?></h2>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="bg-success text-white rounded-circle p-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fe fe-check"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card overflow-hidden" style="cursor:pointer;" onclick="window.location.href='../categories/list'">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <h6 class="mb-2">Inactive Categories</h6>
                                                <h2 class="mb-0 number-font text-danger"><?= $dashboardStats['inactive_categories'] ?></h2>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="bg-danger text-white rounded-circle p-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fe fe-x"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- PRODUCT STATS -->
                        <div class="row mt-4">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card overflow-hidden" style="cursor:pointer;" onclick="window.location.href='../products/list'">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <h6 class="mb-2">Total Products</h6>
                                                <h2 class="mb-0 number-font"><?= $dashboardStats['total_products'] ?></h2>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="bg-info text-white rounded-circle p-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fe fe-shopping-bag"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card overflow-hidden" style="cursor:pointer;" onclick="window.location.href='../products/list'">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <h6 class="mb-2">Active Products</h6>
                                                <h2 class="mb-0 number-font text-success"><?= $dashboardStats['active_products'] ?></h2>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="bg-success text-white rounded-circle p-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fe fe-check-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card overflow-hidden" style="cursor:pointer;" onclick="window.location.href='../products/list'">
                                    <div class="card-body">
                                        <div class="d-flex">
                                            <div>
                                                <h6 class="mb-2">Inactive Products</h6>
                                                <h2 class="mb-0 number-font text-danger"><?= $dashboardStats['inactive_products'] ?></h2>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="bg-danger text-white rounded-circle p-3" style="width: 50px; height: 50px; display: flex; align-items: center; justify-content: center;">
                                                    <i class="fe fe-x-circle"></i>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- RECENT ORDERS -->
                        <!--<div class="row mt-4">-->
                        <!--    <div class="col-md-12">-->
                        <!--        <div class="card">-->
                        <!--            <div class="card-header">-->
                        <!--                <h3 class="card-title">Recent Purchases</h3>-->
                        <!--            </div>-->
                        <!--            <div class="card-body">-->
                        <!--                <div class="table-responsive">-->
                        <!--                    <table class="table table-bordered text-nowrap border-bottom">-->
                        <!--                        <thead>-->
                        <!--                            <tr>-->
                        <!--                                <th>ID</th>-->
                        <!--                                <th>Customer</th>-->
                        <!--                                <th>Email</th>-->
                        <!--                                <th>Amount</th>-->
                        <!--                                <th>Status</th>-->
                        <!--                                <th>Date</th>-->
                        <!--                            </tr>-->
                        <!--                        </thead>-->
                        <!--                        <tbody>-->
                        <!--                            <?php if (empty($salesStats['recent_orders'])): ?>-->
                        <!--                                <tr><td colspan="6" class="text-center">No orders found yet.</td></tr>-->
                        <!--                            <?php else: ?>-->
                        <!--                                <?php foreach ($salesStats['recent_orders'] as $order): ?>-->
                        <!--                                <tr>-->
                        <!--                                    <td>#<?= $order['id'] ?></td>-->
                        <!--                                    <td><?= htmlspecialchars($order['customer_name']) ?></td>-->
                        <!--                                    <td><?= htmlspecialchars($order['customer_email']) ?></td>-->
                        <!--                                    <td>₹<?= number_format((float)$order['total_amount'], 2) ?></td>-->
                        <!--                                    <td><span class="badge bg-<?= $order['status'] == 'pending' ? 'warning' : 'success' ?>"><?= ucfirst($order['status']) ?></span></td>-->
                        <!--                                    <td><?= date('d M Y, h:i A', strtotime($order['created_at'])) ?></td>-->
                        <!--                                </tr>-->
                        <!--                                <?php endforeach; ?>-->
                        <!--                            <?php endif; ?>-->
                        <!--                        </tbody>-->
                        <!--                    </table>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->

                    </div>
                    <!-- CONTAINER END -->
                </div>
            </div>
            <!--app-content close-->

        </div>

        <?php include LAYOUT_PATH . "/footer.php"; ?>
    </div>

    <!-- REQUIRED JS COMPONENTS -->
    <?php include LAYOUT_PATH . "/scripts.php"; ?>

</body>
</html>
