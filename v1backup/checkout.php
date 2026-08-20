<?php
session_start();

require 'assets/db.php';
date_default_timezone_set('Asia/Kolkata');
$session_token = session_id();

$cart_id = null;
$cart_stmt = $conn->prepare("SELECT id FROM cart WHERE session_token = ?");
$cart_stmt->bind_param("s", $session_token);
$cart_stmt->execute();
$cart_result = $cart_stmt->get_result();
if ($cart_row = $cart_result->fetch_assoc()) {
    $cart_id = $cart_row['id'];
}
$cart_stmt->close();

$items = [];
$subtotal = 0;

if ($cart_id) {
    $sql = "
        SELECT ci.quantity, ci.price, (ci.price * ci.quantity) AS total, p.name
        FROM cart_items ci
        JOIN products p ON ci.product_id = p.id
        WHERE ci.cart_id = ?
    ";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cart_id);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $items[] = $row;
        $subtotal += $row['total'];
    }
    $stmt->close();
}

// Fetch shipping charge from shipping_and_payment table
$shipping_charge = 0.00;
$sp_result = $conn->query("SELECT shipping_charge, payment_cod_active, payment_online_active FROM shipping_and_payment LIMIT 1");
if ($sp_result && $sp_result->num_rows > 0) {
    $sp = $sp_result->fetch_assoc();
    $shipping_charge = floatval($sp['shipping_charge']);
    $payment_cod_active = intval($sp['payment_cod_active']);
    $payment_online_active = intval($sp['payment_online_active']);
} else {
    $payment_cod_active = 1;
    $payment_online_active = 1;
}
$shipping = count($items) > 0 ? $shipping_charge : 0;
$total = $subtotal + $shipping;
$conn->close();
?>
<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/images/parts/favicon.png" />
    <title>Mkelly Biotech Pvt. Ltd - Where Innovation Meets Excellence In Biotechnology</title>
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
                    <div class="section-back-text">Checkout</div>
                </div>
                <div class="z-index-4 position-relative text-center">
                    <h1 class="section-title">Shop Checkout</h1>
                    <div class="mt-3">
                        <div class="page-breadcrumbs"><a class="content-link" href="https://www.mkellybiotech.com/">Home</a><span
                                class="mx-2">\</span><a class="content-link"
                                href="https://www.mkellybiotech.com/cart">Cart</a><span class="mx-2">\</span><span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <form class="container" action="process-checkout" method="POST">
            <div class="cols-xl row">
                <div class="col-lg-6">
                    <h2 class="text-title mb-5">Billing details</h2>
                    <div class="grid row">
                        <!-- Country fixed -->
                        <div class="col-12">
                            <div class="input-view-flat input-gray-shadow form-group"><label class="required">Country/Region</label>
                                <div class="input-group">
                                    <select class="form-control" name="country" required>
                                        <option value="India" selected>India</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- First Name -->
                        <div class="col-md-6">
                            <div class="input-view-flat input-gray-shadow form-group"><label class="required">First name</label>
                                <div class="input-group">
                                    <input class="form-control" name="first_name" type="text" placeholder="First name" required>
                                </div>
                            </div>
                        </div>

                        <!-- Last Name -->
                        <div class="col-md-6">
                            <div class="input-view-flat input-gray-shadow form-group"><label>Last name </label>
                                <div class="input-group">
                                    <input class="form-control" name="last_name" type="text" placeholder="Last name">
                                </div>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="col-12">
                            <div class="input-view-flat input-gray-shadow form-group"><label class="required">Email</label>
                                <div class="input-group"><input class="form-control" name="email" type="email" placeholder="Email" required></div>
                            </div>
                        </div>

                        <!-- Address -->
                        <div class="col-12">
                            <div class="input-view-flat input-gray-shadow form-group"><label class="required">Address</label>
                                <div class="input-group"><input class="form-control" name="address1" type="text" placeholder="Address" required></div>
                            </div>
                        </div>

                        <!-- Apartment, suite (optional) -->
                        <div class="col-12">
                            <div class="input-view-flat input-gray-shadow form-group"><label>Apartment, suite, etc. (optional)</label>
                                <div class="input-group"><input class="form-control" name="address2" type="text" placeholder="Apartment, suite, etc."></div>
                            </div>
                        </div>

                        <!-- City -->
                        <div class="col-6">
                            <div class="input-view-flat input-gray-shadow form-group"><label class="required">City</label>
                                <div class="input-group"><input class="form-control" name="city" type="text" placeholder="City" required></div>
                            </div>
                        </div>

                        <!-- State -->
                        <div class="col-6">
                            <div class="input-view-flat input-gray-shadow form-group">
                                <label class="required">State</label>
                                <div class="input-group">
                                    <select class="form-control" name="state" required>
                                        <option value="" disabled selected>Select a state</option>
                                        <option value="Andhra Pradesh">Andhra Pradesh</option>
                                        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                                        <option value="Assam">Assam</option>
                                        <option value="Bihar">Bihar</option>
                                        <option value="Chhattisgarh">Chhattisgarh</option>
                                        <option value="Goa">Goa</option>
                                        <option value="Gujarat">Gujarat</option>
                                        <option value="Haryana">Haryana</option>
                                        <option value="Himachal Pradesh">Himachal Pradesh</option>
                                        <option value="Jharkhand">Jharkhand</option>
                                        <option value="Karnataka">Karnataka</option>
                                        <option value="Kerala">Kerala</option>
                                        <option value="Madhya Pradesh">Madhya Pradesh</option>
                                        <option value="Maharashtra">Maharashtra</option>
                                        <option value="Manipur">Manipur</option>
                                        <option value="Meghalaya">Meghalaya</option>
                                        <option value="Mizoram">Mizoram</option>
                                        <option value="Nagaland">Nagaland</option>
                                        <option value="Odisha">Odisha</option>
                                        <option value="Punjab">Punjab</option>
                                        <option value="Rajasthan">Rajasthan</option>
                                        <option value="Sikkim">Sikkim</option>
                                        <option value="Tamil Nadu">Tamil Nadu</option>
                                        <option value="Telangana">Telangana</option>
                                        <option value="Tripura">Tripura</option>
                                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                                        <option value="Uttarakhand">Uttarakhand</option>
                                        <option value="West Bengal">West Bengal</option>
                                        <!-- Union Territories -->
                                        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                                        <option value="Chandigarh">Chandigarh</option>
                                        <option value="Dadra and Nagar Haveli and Daman and Diu">Dadra and Nagar Haveli and Daman and Diu</option>
                                        <option value="Lakshadweep">Lakshadweep</option>
                                        <option value="Delhi">Delhi</option>
                                        <option value="Puducherry">Puducherry</option>
                                        <option value="Ladakh">Ladakh</option>
                                        <option value="Lakshadweep">Lakshadweep</option>
                                        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <!-- PIN Code -->
                        <div class="col-6">
                            <div class="input-view-flat input-gray-shadow form-group"><label class="required">PIN code</label>
                                <div class="input-group"><input class="form-control" name="pin" type="text" placeholder="PIN code" required></div>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="col-6">
                            <div class="input-view-flat input-gray-shadow form-group"><label class="required">Phone</label>
                                <div class="input-group"><input class="form-control" name="phone" type="text" placeholder="Phone" required></div>
                            </div>
                        </div>



                    </div>
                </div>

                <!-- Order & Payment sections remain the same but with dynamic cart -->

                <div class="col-lg-6">
                    <h2 class="text-title mb-5">Your order</h2>
                    <div class="order-items mb-5">
                        <div class="order-header">
                            <div class="order-line-title">Name</div>
                            <div class="order-line-total">Total</div>
                        </div>

                        <?php if (count($items) === 0): ?>
                            <div class="order-item">Your cart is empty.</div>
                        <?php else: ?>
                            <?php foreach ($items as $item): ?>
                                <div class="order-item">
                                    <div class="order-line-title">
                                        <?php echo htmlspecialchars($item['name']); ?> &times; <?php echo (int)$item['quantity']; ?>
                                    </div>
                                    <div class="order-line-total">
                                        ₹<?php echo number_format($item['total']); ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <div class="order-subtotal">
                            <div class="order-line-title">Sub Total</div>
                            <div class="order-line-total">₹<?php echo number_format($subtotal); ?></div>
                        </div>
                        <div class="order-subtotal">
                            <div class="order-line-title">Shipping</div>
                            <div class="order-line-total">₹<?php echo number_format($shipping); ?></div>
                        </div>
                        <div class="separator-line"></div>
                        <div class="order-total">
                            <div class="order-line-title">Total</div>
                            <div class="order-line-total">₹<?php echo number_format($total); ?></div>
                        </div>
                    </div>
                    <h3 class="text-title mb-4">Payment Details</h3>
                    <div class="grid row">
                        <div class="col-12">
                            <p>Please use your Order ID as the payment reference. Your order won't be shipped until the
                                funds have cleared in our account.</p>
                        </div>
                        <div class="col-12">
                            <div class="form-groups">

                                <?php if ($payment_cod_active) : ?>
                                    <div class="input-view-flat input-gray-shadow form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="cash-on-delivery" name="paymentType" value="Cash On Delivery">
                                            <span class="form-check-icon"></span>
                                            <label class="form-check-label" for="cash-on-delivery">Cash On Delivery</label>
                                        </div>
                                    </div>
                                <?php endif; ?>

                                <?php if ($payment_online_active) : ?>
                                    <div class="input-view-flat input-gray-shadow form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="online-payment" name="paymentType" value="online payment">
                                            <span class="form-check-icon"></span>
                                            <label class="form-check-label" for="online-payment">Online Payment</label>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-view-flat input-gray-shadow form-group">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="terms-and-conditions" name="terms" value="yes">
                                    <span class="form-check-icon"></span>
                                    <label class="form-check-label" for="terms-and-conditions">
                                        I've read &amp; accept the <a href="terms-and-conditions" target="_blank">terms &amp; conditions</a>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12"><button class="btn-wider btn btn-theme" type="submit">Place Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
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