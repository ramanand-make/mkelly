<?php 
require_once 'includes/functions.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Mkelly Biotech</title>
    <base href="<?= BASE_URL ?>">
    <meta name="description" content="Learn about Mkelly Biotech, driving innovation in sustainable biotechnology and providing premium natural organic food powders.">
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
        <h1 class="display-4 fw-bold font-serif mb-3" data-aos="fade-up">About Us</h1>
        <p class="lead mb-0" data-aos="fade-up" data-aos-delay="100">Where Innovation Meets Excellence In Biotechnology</p>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="py-5 my-5">
    <div class="container">
        <!-- Mission -->
        <div class="row align-items-center mb-5 pb-5 border-bottom">
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                <img src="assets/images/content/720x720/mission.jpg" alt="Our Mission" class="img-fluid rounded shadow-sm">
            </div>
            <div class="col-lg-6 ps-lg-5" data-aos="fade-left">
                <span class="text-uppercase fw-bold tracking-wide" style="color: #C11712;">What is our mission?</span>
                <h2 class="font-serif fw-bold mb-4 display-5" style="color: #054B2C;">Who are we</h2>
                <p class="mb-3 text-muted">Our mission is to create innovative, high-quality food biotechnology solutions that enrich lives. These include items rich in ingredients such as Cordyceps militaris and millets, which are known for their health benefits.</p>
                <p class="mb-3 text-muted">We are committed to making healthy living simple, delicious, and accessible for modern lifestyles.</p>
                <p class="mb-3 text-muted">Our mission is to transform healthcare and biotechnology through innovative and sustainable solutions that enrich lives and promote well-being.</p>
                <p class="mb-0 text-muted">We aim to empower individuals and communities by fostering collaboration and driving impactful change, creating a healthier and more sustainable future for all.</p>
            </div>
        </div>

        <!-- Vision -->
        <div class="row align-items-center mt-5 pt-4">
            <div class="col-lg-6 order-lg-2 mb-4 mb-lg-0" data-aos="fade-left">
                <img src="assets/images/content/720x720/vision.jpg" alt="Our Vision" class="img-fluid rounded shadow-sm">
            </div>
            <div class="col-lg-6 order-lg-1 pe-lg-5" data-aos="fade-right">
                <span class="text-uppercase fw-bold tracking-wide" style="color: #C11712;">What is our vision?</span>
                <h2 class="font-serif fw-bold mb-4 display-5" style="color: #054B2C;">Why choose us</h2>
                <p class="mb-3 text-muted">Our vision is to lead in biotechnology by blending innovation with an entrepreneurial spirit. We aim to tackle global challenges in healthcare, agriculture, and sustainability through science.</p>
                <p class="mb-3 text-muted">By empowering future innovators, fostering collaboration, and driving progress, we strive to create a world where science transforms lives and inspires positive change.</p>
                <p class="mb-3 text-muted">With every innovation, we envision a world where the potential of science is fully realized—helping not just businesses thrive, but also making life better for everyone.</p>
                <p class="mb-0 text-muted">Our vision is rooted in the belief that progress is a collective effort, and together, we can achieve extraordinary things.</p>
            </div>
        </div>
    </div>
</section>

<!-- Hallmarks of Excellence -->
<section class="py-5" style="background-color: #054B2C; color: white;">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold font-serif">Our Hallmarks of Excellence</h2>
            <p class="lead text-white-50">Innovating through research and recognition</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border-0 shadow-sm" style="background: rgba(255,255,255,0.05);">
                    <img src="assets/images/content/720x540/ach1.jpg" class="card-img-top rounded-0" alt="Innovation">
                    <div class="card-body p-4 text-center">
                        <h4 class="fw-bold mb-3">Innovation</h4>
                        <p class="text-white-50 mb-0">Pioneering research to discover cutting-edge molecules and technologies that address critical unmet medical needs, driving a future of impact and progress.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 border-0 shadow-sm" style="background: rgba(255,255,255,0.05);">
                    <img src="assets/images/content/720x540/ach2.jpg" class="card-img-top rounded-0" alt="Microversity">
                    <div class="card-body p-4 text-center">
                        <h4 class="fw-bold mb-3">Microversity</h4>
                        <p class="text-white-50 mb-0">Offering training in Microbiology and related sciences, known for innovative ideas and excellence, with honors from Startup Punjab and CGC Landran.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 border-0 shadow-sm" style="background: rgba(255,255,255,0.05);">
                    <img src="assets/images/content/720x540/ach3.jpg" class="card-img-top rounded-0" alt="Recognition">
                    <div class="card-body p-4 text-center">
                        <h4 class="fw-bold mb-3">Recognition</h4>
                        <p class="text-white-50 mb-0">Celebrated among the top three startups at TiECON Chandigarh and securing funding, including ₹5 lacs from the RKEY Scheme and ₹3 lacs from Startup Punjab.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Founders Section -->
<section class="py-5 my-5 bg-background">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold font-serif" style="color: #054B2C;">Meet Our Founders</h2>
            <p class="lead text-muted mx-auto" style="max-width: 700px;">A visionary duo combining biotechnology expertise with a passion for transformative innovation.</p>
        </div>
        
        <div class="row g-5 justify-content-center">
            <!-- Founder 1 -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                <div class="card border-0 shadow h-100 overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="assets/images/content/720x480/Dr-Vipasha-Sharma.jpg" class="img-fluid h-100 w-100" style="object-fit: cover;" alt="Dr. Vipasha Sharma">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body p-4">
                                <h4 class="fw-bold mb-1" style="color: #054B2C;">Dr. Vipasha Sharma</h4>
                                <h6 class="text-uppercase tracking-wide fw-bold mb-4" style="color: #C11712;">Founder</h6>
                                
                                <p class="small text-muted mb-4">Dr. Vipasha Sharma is a passionate researcher and entrepreneur with a Ph.D. in Biotechnology from Shoolini University. She has been recognized for her work and contributions to innovation and women's empowerment.</p>
                                
                                <ul class="list-unstyled small text-muted">
                                    <li class="mb-3 d-flex align-items-start">
                                        <i class="fas fa-trophy mt-1 me-3" style="color: #C11712;"></i>
                                        <span>Parman Patra awardee, won TiECON Chandigarh Women Chapter & Boot-Camp Women Edition by Innovation Mission Punjab.</span>
                                    </li>
                                    <li class="mb-3 d-flex align-items-start">
                                        <i class="fas fa-star mt-1 me-3" style="color: #C11712;"></i>
                                        <span>Ambassador for the "SHE" campaign by the Punjab State Council for Science and Technology.</span>
                                    </li>
                                    <li class="mb-3 d-flex align-items-start">
                                        <i class="fas fa-seedling mt-1 me-3" style="color: #C11712;"></i>
                                        <span>Selected at national level for AgriMunch accelerator program by FAAD Network Pvt Ltd.</span>
                                    </li>
                                    <li class="d-flex align-items-start">
                                        <i class="fas fa-hand-holding-usd mt-1 me-3" style="color: #C11712;"></i>
                                        <span>Top fundraiser at the "Startups Handholding & Empowerment" pitching event.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Founder 2 -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="card border-0 shadow h-100 overflow-hidden">
                    <div class="row g-0 h-100">
                        <div class="col-md-5">
                            <img src="assets/images/content/720x480/Dr-Tarun-Kumar.jpg" class="img-fluid h-100 w-100" style="object-fit: cover;" alt="Dr. Tarun Kumar">
                        </div>
                        <div class="col-md-7">
                            <div class="card-body p-4">
                                <h4 class="fw-bold mb-1" style="color: #054B2C;">Dr. Tarun Kumar</h4>
                                <h6 class="text-uppercase tracking-wide fw-bold mb-4" style="color: #C11712;">Co-Founder & CEO</h6>
                                
                                <p class="small text-muted mb-4">Dr. Tarun Kumar is an accomplished biotechnology expert with over 16 years of diverse experience spanning pharmaceuticals, academia, intellectual property rights, and scientific content creation.</p>
                                
                                <ul class="list-unstyled small text-muted">
                                    <li class="mb-3 d-flex align-items-start">
                                        <i class="fas fa-lightbulb mt-1 me-3" style="color: #C11712;"></i>
                                        <span>Co-Founder and CEO of MKelly Biotech Pvt. Ltd., pioneering functional foods and nutraceuticals.</span>
                                    </li>
                                    <li class="mb-3 d-flex align-items-start">
                                        <i class="fas fa-award mt-1 me-3" style="color: #C11712;"></i>
                                        <span>Ph.D. in Biotechnology, specializing in microbiology, molecular biology, and enzyme technology.</span>
                                    </li>
                                    <li class="mb-3 d-flex align-items-start">
                                        <i class="fas fa-flask mt-1 me-3" style="color: #C11712;"></i>
                                        <span>Key roles in research, teaching, and patents at Parexel, Chandigarh University, and Divisa Herbal Care.</span>
                                    </li>
                                    <li class="d-flex align-items-start">
                                        <i class="fas fa-book mt-1 me-3" style="color: #C11712;"></i>
                                        <span>Author of peer-reviewed publications, patent holder, and certified in Intellectual Property Rights by WIPO.</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

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
