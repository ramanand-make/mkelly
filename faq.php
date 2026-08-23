<?php 
require_once 'includes/functions.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQ - Mkelly Biotech</title>
    <base href="<?= BASE_URL ?>">
    <meta name="description" content="Frequently Asked Questions about Mkelly Biotech's organic food powders and wellness products.">
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
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="assets/css/style.css?v=<?= time() ?>" rel="stylesheet">
</head>
<body class="bg-background">

<?php include('includes/header.php') ?>

<!-- Page Header -->
<section class="bg-primary text-white py-5" style="background-color: #054B2C;">
    <div class="container text-center py-5">
        <h1 class="display-4 fw-bold font-serif mb-3" data-aos="fade-up">Frequently Asked Questions</h1>
        <p class="lead mb-0" data-aos="fade-up" data-aos-delay="100">Got questions? We've got answers.</p>
    </div>
</section>

<!-- Content -->
<section class="py-5 my-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                <div class="accordion" id="faqAccordion">
                    
                    <!-- FAQ Item 1 -->
                    <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" style="color: #054B2C;">
                                1. What types of products does your company offer?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                We offer high-quality products designed to improve your daily life, including health and lifestyle essentials.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="color: #054B2C;">
                                2. How can I inquire about specific product details?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                For detailed product inquiries, please contact our customer support team. We’ll provide all the necessary information to assist you.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="color: #054B2C;">
                                3. Can I visit your physical office or store?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Yes, you can visit our physical office. However, we recommend contacting us in advance to confirm your visit and address any specific queries.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="color: #054B2C;">
                                4. Are your products suitable for international customers?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Currently, our products are available within India. We are exploring ways to serve international customers in the future.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 5 -->
                    <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" style="color: #054B2C;">
                                5. How do I report an issue with my order?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                If you encounter an issue with your order, please contact our support team. We’ll work to resolve the matter promptly.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 6 -->
                    <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix" style="color: #054B2C;">
                                6. Can I get a refund for a product I am not satisfied with?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Refunds are processed based on our return and refund policy. Please refer to the terms on our website or contact us for further assistance.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 7 -->
                    <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven" style="color: #054B2C;">
                                7. How do I know if a product is in stock?
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Product availability is updated regularly on our website. If you have concerns, feel free to contact our team for real-time updates.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 8 -->
                    <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                        <h2 class="accordion-header" id="headingEight">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight" style="color: #054B2C;">
                                8. Can I receive updates about new products and offers?
                            </button>
                        </h2>
                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                Yes, you can subscribe to our newsletter or follow us on social media to stay informed about our latest products and promotions.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 9 -->
                    <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                        <h2 class="accordion-header" id="headingNine">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine" style="color: #054B2C;">
                                9. How do I contact customer support?
                            </button>
                        </h2>
                        <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                You can reach us via phone at <a href="tel:01604054118" class="text-primary text-decoration-none">0160 405 4118</a> or email at <a href="mailto:mkellybiotech@gmail.com" class="text-primary text-decoration-none">mkellybiotech@gmail.com</a>.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 10 -->
                    <div class="accordion-item border-0 mb-3 shadow-sm rounded">
                        <h2 class="accordion-header" id="headingTen">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen" style="color: #054B2C;">
                                10. Are your products eco-friendly?
                            </button>
                        </h2>
                        <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-muted">
                                We strive to ensure that our products are produced sustainably using environmentally friendly practices wherever possible.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Include Bootstrap JS for accordion to work -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>

<?php include('includes/footer.php') ?>
</body>
</html>
