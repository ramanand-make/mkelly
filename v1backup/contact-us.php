<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

$messageSent = false;
$errorMsg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize inputs
    $first_name = trim(htmlspecialchars($_POST['first_name'] ?? ''));
    $last_name = trim(htmlspecialchars($_POST['last_name'] ?? ''));
    $email = trim(htmlspecialchars($_POST['email'] ?? ''));
    $message = trim(htmlspecialchars($_POST['message'] ?? ''));

    // Validate inputs
    if (empty($first_name) || empty($last_name) || empty($email) || empty($message)) {
        $errorMsg = "Please fill in all required fields.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errorMsg = "Please provide a valid email address.";
    } else {
        // Setup PHPMailer
        $mail = new PHPMailer(true);

        try {
            // SMTP configuration
            $mail->isSMTP();
            $mail->Host = 'smtp.hostinger.in';  // Hostinger SMTP server
            $mail->SMTPAuth = true;
            $mail->Username = 'noreply@mkellybiotech.com';
            $mail->Password = '8Z^s*1Se2';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;

            // Sender & recipient
            $mail->setFrom('noreply@mkellybiotech.com', 'Mkelly Biotech Contact Form');
            $mail->addAddress('mkellybiotech@gmail.com', 'Mkelly Biotech');

            // Email content
            $mail->isHTML(true);
            $mail->Subject = 'New Contact Form Message from Website';
            $body = "
                <h2>New Contact Message</h2>
                <p><strong>First Name:</strong> {$first_name}</p>
                <p><strong>Last Name:</strong> {$last_name}</p>
                <p><strong>Email:</strong> {$email}</p>
                <p><strong>Message:</strong><br>" . nl2br($message) . "</p>
            ";
            $mail->Body = $body;

            $mail->send();
            $messageSent = true;
        } catch (Exception $e) {
            $errorMsg = "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
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

<body class="body">

    <?php include 'header.php'; ?>

    <section class="after-head top-block-page with-back white-curve-after section-white-text">
        <div class="overflow-back bg-orange"></div>
        <div class="content-offs-stick my-5 container">
            <div class="section-solid with-back">
                <div class="z-index-4 position-relative text-center">
                    <h1 class="section-title">Contact Us</h1>
                    <div class="mt-3">
                        <div class="page-breadcrumbs"><a href="/" style="text-decoration: none; color: inherit;"
                                onmouseover="this.style.color='grey';" onmouseout="this.style.color='inherit';">
                                Home
                            </a><span class="mx-2">\</span><span>Contact us</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section mt-5">
        <div class="section-head">
            <div class="section-icon"><span class="svg-fill-jazzberry-jam svg-content"
                    data-svg="assets/images/svg/title-rasberry.svg"></span></div>
            <div class="section-head-content">
                <h2 class="section-title">Let’s Get in Touch</h2>
                <p class="section-text">Have a question or need assistance?</p>
            </div>
        </div>
        <div class="container">

            <?php if ($messageSent): ?>
                <div class="alert alert-success" role="alert">
                    Thank you for contacting us. We will get back to you soon!
                </div>
            <?php elseif ($errorMsg): ?>
                <div class="alert alert-danger" role="alert">
                    <?php echo $errorMsg; ?>
                </div>
            <?php endif; ?>

            <form autocomplete="off" method="post" action="">
                <div class="row grid justify-content-center">
                    <div class="col-12 col-sm-6 col-lg-5 col-xl-4">
                        <div class="input-view-flat input-gray-shadow form-group"><label class="required">First
                                Name</label>
                            <div class="input-group"><input class="form-control" name="first_name" type="text"
                                    placeholder="First Name" required value="<?php echo htmlspecialchars($_POST['first_name'] ?? ''); ?>"></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-5 col-xl-4">
                        <div class="input-view-flat input-gray-shadow form-group"><label class="required">Last
                                Name</label>
                            <div class="input-group"><input class="form-control" name="last_name" type="text"
                                    placeholder="Last Name" required value="<?php echo htmlspecialchars($_POST['last_name'] ?? ''); ?>"></div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-10 col-xl-8">
                        <div class="input-view-flat input-gray-shadow form-group"><label class="required">Email
                                Address</label>
                            <div class="input-group"><input class="form-control" name="email" type="email"
                                    placeholder="Email" required value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>"></div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-10 col-xl-8">
                        <div class="input-view-flat input-gray-shadow form-group"><label class="required">Your
                                Message</label>
                            <div class="input-group"><textarea class="form-control" name="message"
                                    placeholder="Message" required><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea></div>
                        </div>
                    </div>
                    <div class="col-12 text-center"><button class="btn-wide mb-0 btn btn-theme" type="submit">Send
                            Message</button></div>
                </div>
            </form>
        </div>
    </section>
    <section class="section-solid-map white-curve-before curve-before-60 white-curve-after curve-after-90"
        style="padding-top:0rem;">
        <div class="container">
            <div class="text-center grid row">
                <div class="col-md-4">
                    <h4 class="entity-title"><i class="fas fa-map-marker-alt"> Address</i></h4>
                    <p class="mb-0 entity-subtext"><a
                            href="https://www.google.com/maps?q=101,+Mata+Gujri+Avenue,+Bhago+Majra,+Kharar,+Mohali+(Punjab)+-+140301">101,
                            Mata Gujri Avenue, Bhago Majra, Kharar, Mohali (Punjab) - 140301</a></p>
                </div>
                <div class="col-md-4">
                    <h4 class="entity-title"><i class="fas fa-envelope"> Email</i>
                    </h4>
                    <p class="mb-0 entity-subtext"><a href="mailto:mkellybiotech@gmail.com"
                            >mkellybiotech@gmail.com</a>
                    </p>
                </div>
                <div class="col-md-4">
                    <h4 class="entity-title"><i class="fas fa-phone"> Support</i>
                    </h4>
                    <p class="mb-0 entity-subtext"><a href="tel:9056555101">+91 9056555101</a></p>
                </div>
            </div>
        </div>
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=YOUR_VALID_API_KEY&callback=initMap"></script>

</body>

</html>