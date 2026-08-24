<?php 
require_once 'includes/functions.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
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
<section class="position-relative overflow-hidden text-white py-5" style="background: linear-gradient(135deg, #054B2C 0%, #0a7344 100%);">
    <!-- Decorative background elements -->
    <div class="position-absolute" style="top: -20%; right: -5%; width: 300px; height: 300px; background: rgba(255,255,255,0.05); border-radius: 50%; filter: blur(40px);"></div>
    <div class="position-absolute" style="bottom: -20%; left: -5%; width: 250px; height: 250px; background: rgba(193,23,18,0.15); border-radius: 50%; filter: blur(40px);"></div>
    
    <div class="container text-center py-5 position-relative" style="z-index: 2;">
        <span class="badge rounded-pill text-uppercase px-3 py-2 mb-3" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); letter-spacing: 1.5px;">Support Center</span>
        <h1 class="display-3 fw-bold font-serif mb-4" data-aos="fade-up">Frequently Asked Questions</h1>
        <p class="lead mx-auto mb-0 text-white-50" data-aos="fade-up" data-aos-delay="100" style="max-width: 600px;">Find quick answers to common questions about our organic food powders and wellness products.</p>
    </div>
</section>

<!-- Content -->
<style>
    .faq-accordion .accordion-item {
        border: none;
        border-radius: 1rem !important;
        margin-bottom: 1.25rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.03);
        overflow: hidden;
        transition: all 0.3s ease;
    }
    .faq-accordion .accordion-item:hover {
        box-shadow: 0 8px 25px rgba(0,0,0,0.08);
        transform: translateY(-2px);
    }
    .faq-accordion .accordion-button {
        font-weight: 700;
        color: #054B2C;
        background-color: #ffffff;
        padding: 1.5rem;
        font-size: 1.1rem;
        border: none;
        border-radius: 1rem !important;
        box-shadow: none !important;
        transition: all 0.3s ease;
    }
    .faq-accordion .accordion-button:not(.collapsed) {
        background-color: rgba(5, 75, 44, 0.03);
        color: #C11712;
        border-bottom-left-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
    }
    .faq-accordion .accordion-button::after {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23054B2C'%3E%3Cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
        transition: transform 0.3s ease;
    }
    .faq-accordion .accordion-button:not(.collapsed)::after {
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23C11712'%3E%3Cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3E%3C/svg%3E");
    }
    .faq-accordion .accordion-body {
        background-color: #ffffff;
        padding: 0 1.5rem 1.5rem 1.5rem;
        color: #6c757d;
        line-height: 1.7;
        font-size: 1rem;
    }
</style>
<section class="py-5 my-5 bg-background">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8" data-aos="fade-up">
                
                <div class="text-center mb-5">
                    <h2 class="display-6 fw-bold font-serif" style="color: #054B2C;">Any Questions?</h2>
                    <p class="text-muted">Here are some common questions we receive.</p>
                </div>

                <div class="accordion faq-accordion" id="faqAccordion">
                    
                    <!-- FAQ Item 1 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingOne">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                1. What types of products does your company offer?
                            </button>
                        </h2>
                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We offer high-quality products designed to improve your daily life, including health and lifestyle essentials, organic food powders, and specialized wellness items crafted from science and nature.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 2 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                2. How can I inquire about specific product details?
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                For detailed product inquiries, please contact our customer support team via email or phone. We’ll provide all the necessary information and guidance to assist you with your specific needs.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 3 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                3. Can I visit your physical office or store?
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, you can visit our physical office. However, we highly recommend contacting us in advance to confirm your visit and ensure the right personnel are available to address any specific queries you may have.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 4 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                4. Are your products suitable for international customers?
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Currently, our products are available exclusively within India. We are actively exploring logistics and compliance ways to serve international customers in the future.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 5 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFive">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                5. How do I report an issue with my order?
                            </button>
                        </h2>
                        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                If you encounter an issue with your order such as damages or incorrect items, please contact our support team immediately. We’ll work to resolve the matter promptly to ensure your satisfaction.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 6 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSix">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                6. Can I get a refund for a product I am not satisfied with?
                            </button>
                        </h2>
                        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Refunds are processed based on our official return and refund policy. Please refer to the specific terms on our website's policy pages or contact us for further assistance regarding your situation.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 7 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingSeven">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                7. How do I know if a product is in stock?
                            </button>
                        </h2>
                        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Product availability is updated regularly and automatically on our website. If a product shows as in-stock, it is available. If you have specific quantity concerns, feel free to contact our team.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 8 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingEight">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                8. Can I receive updates about new products and offers?
                            </button>
                        </h2>
                        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Yes, absolutely! You can subscribe to our email newsletter or follow us on our official social media channels to stay informed about our latest products, seasonal offers, and promotions.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 9 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingNine">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                                9. How do I contact customer support?
                            </button>
                        </h2>
                        <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                You can reach us via phone at <a href="tel:01604054118" class="text-decoration-none fw-bold" style="color: #C11712;">0160 405 4118</a> or email at <a href="mailto:mkellybiotech@gmail.com" class="text-decoration-none fw-bold" style="color: #C11712;">mkellybiotech@gmail.com</a>. We typically respond within 24 business hours.
                            </div>
                        </div>
                    </div>

                    <!-- FAQ Item 10 -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTen">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTen" aria-expanded="false" aria-controls="collapseTen">
                                10. Are your products eco-friendly?
                            </button>
                        </h2>
                        <div id="collapseTen" class="accordion-collapse collapse" aria-labelledby="headingTen" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                We strive to ensure that our products are produced sustainably using environmentally friendly practices wherever possible, minimizing waste and promoting organic harvesting methods.
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
