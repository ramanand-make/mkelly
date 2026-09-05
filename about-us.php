<?php 
require_once 'includes/functions.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
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
<style>
        /* Custom Modern Enhancements */
        :root {
            --primary: #054B2C;
            --accent: #C11712;
            --surface: #ffffff;
            --bg-light: #f4f7f6;
        }
        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg-light);
            color: #333;
        }
        
        .image-card {
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            transition: transform 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
        }
        .image-card:hover {
            transform: translateY(-10px);
        }
        
        .image-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.8s ease;
        }
        .image-card:hover img {
            transform: scale(1.05);
        }
        
        .badge-pill {
            background: rgba(193, 23, 18, 0.1);
            color: var(--accent);
            padding: 8px 16px;
            border-radius: 50px;
            font-weight: 700;
            letter-spacing: 1px;
            display: inline-block;
            margin-bottom: 20px;
            text-transform: uppercase;
            font-size: 0.85rem;
        }
        
        .content-block h2 {
            font-family: 'Playfair Display', serif;
            color: var(--primary);
            font-weight: 800;
            line-height: 1.2;
        }
        
        .content-block p {
            color: #555;
            font-size: 1.05rem;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 40px 30px;
            transition: all 0.4s ease;
            position: relative;
            overflow: hidden;
        }
        
        .glass-card:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }
        
        .glass-card img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            margin-bottom: 25px;
            border: 3px solid rgba(255,255,255,0.5);
            object-fit: cover;
        }

        .founder-card {
            background: #fff;
            border-radius: 24px;
            padding: 0;
            box-shadow: 0 15px 35px rgba(0,0,0,0.05);
            transition: all 0.4s ease;
            border: none;
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
        }
        
        .founder-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.1);
        }

        .founder-img-wrapper {
            position: relative;
            overflow: hidden;
            height: 350px;
        }
        
        .founder-img-wrapper img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            object-position: center top;
            transition: transform 0.6s ease;
        }
        
        .founder-card:hover .founder-img-wrapper img {
            transform: scale(1.05);
        }

        .founder-info {
            padding: 40px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
        }
        
        .founder-name {
            font-family: 'Playfair Display', serif;
            color: var(--primary);
            font-weight: 800;
            font-size: 1.75rem;
            margin-bottom: 5px;
        }
        
        .founder-role {
            color: var(--accent);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 0.9rem;
            margin-bottom: 20px;
        }
        
        .founder-bio {
            color: #666;
            line-height: 1.7;
            margin-bottom: 25px;
        }
        
        .founder-achievements li {
            position: relative;
            padding-left: 35px;
            margin-bottom: 15px;
            color: #555;
            font-size: 0.95rem;
        }
        
        .founder-achievements li i {
            position: absolute;
            left: 0;
            top: 4px;
            color: var(--accent);
            font-size: 1.1rem;
            background: rgba(193, 23, 18, 0.1);
            width: 24px; height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
        }
        
        @media (max-width: 991px) {
            .founder-img-wrapper { height: 300px; }
            .content-block h2 { font-size: 2.2rem; }
        }
        /* Hallmarks Redesign */
        .hallmark-item {
            background: #ffffff;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 15px 35px rgba(0,0,0,0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            display: flex;
            flex-direction: column;
            position: relative;
        }
        .hallmark-item:hover {
            transform: translateY(-15px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.4);
        }
        .hallmark-img {
            position: relative;
            height: 240px;
            overflow: hidden;
        }
        .hallmark-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.6s ease;
        }
        .hallmark-item:hover .hallmark-img img {
            transform: scale(1.1);
        }
        .hallmark-img::after {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background: linear-gradient(to bottom, transparent 50%, rgba(0,0,0,0.5) 100%);
        }
        .hallmark-icon {
            position: absolute;
            top: 210px; /* Overlap image and content */
            right: 30px;
            width: 65px;
            height: 65px;
            background: var(--accent);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            box-shadow: 0 10px 20px rgba(193, 23, 18, 0.4);
            border: 4px solid #fff;
            transition: transform 0.4s ease;
            z-index: 2;
        }
        .hallmark-item:hover .hallmark-icon {
            transform: scale(1.15) rotate(15deg);
        }
        .hallmark-content {
            padding: 45px 30px 30px;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            background: #fff;
        }
        .hallmark-content h4 {
            color: var(--primary);
            font-weight: 800;
            margin-bottom: 15px;
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
        }
        .hallmark-content p {
            color: #555;
            line-height: 1.7;
            font-size: 0.95rem;
            margin-bottom: 0;
        }
    </style>
</head>
<body class="bg-background">

<?php include('includes/header.php') ?>

<!-- Page Header -->
<section class="position-relative overflow-hidden text-white py-5" style="background: linear-gradient(135deg, #054B2C 0%, #0a7344 100%);">
    <!-- Decorative background elements -->
    <div class="position-absolute" style="top: -20%; right: -5%; width: 300px; height: 300px; background: rgba(255,255,255,0.05); border-radius: 50%; filter: blur(40px);"></div>
    <div class="position-absolute" style="bottom: -20%; left: -5%; width: 250px; height: 250px; background: rgba(193,23,18,0.15); border-radius: 50%; filter: blur(40px);"></div>
    
    <div class="container text-center py-5 position-relative" style="z-index: 2;">
        <span class="badge rounded-pill text-uppercase px-3 py-2 mb-3" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); letter-spacing: 1.5px;">About Us</span>
        <h1 class="display-3 fw-bold font-serif mb-4" data-aos="fade-up">About Us</h1>
        <p class="lead mx-auto mb-0 text-white-50" data-aos="fade-up" data-aos-delay="100" style="max-width: 600px;">Where Innovation Meets Excellence In Biotechnology. We are committed to revolutionizing organic food and sustainable health.</p>
    </div>
</section>

<!-- Mission & Vision Section -->
<section class="py-5">
    <div class="container py-4">
        
        <!-- Mission -->
        <div class="row align-items-center mb-5 pb-5">
            <div class="col-lg-6 mb-5 mb-lg-0" data-aos="fade-right">
                <div class="image-card">
                    <img src="assets/images/content/720x720/mission.jpg" alt="Our Mission">
                </div>
            </div>
            <div class="col-lg-5 offset-lg-1 content-block" data-aos="fade-left">
                <div class="badge-pill">What is our mission?</div>
                <h2 class="display-5 mb-4">Who we are & What we do</h2>
                <p>Our mission is to create innovative, high-quality food biotechnology solutions that enrich lives. We bring you premium organic items rich in ingredients such as <strong>Cordyceps militaris</strong> and millets, widely known for their profound health benefits.</p>
                <p>We are relentlessly committed to making healthy living simple, delicious, and deeply accessible for modern, fast-paced lifestyles.</p>
                <p>Through pioneering sustainable solutions, we aim to transform healthcare and biotechnology, empowering individuals and communities to foster collaboration and drive impactful, lasting change.</p>
            </div>
        </div>

        <!-- Vision -->
        <div class="row align-items-center pt-5 mt-5 border-top border-light">
            <div class="col-lg-6 order-lg-2 mb-5 mb-lg-0" data-aos="fade-left">
                <div class="image-card">
                    <img src="assets/images/content/720x720/vision.jpg" alt="Our Vision">
                </div>
            </div>
            <div class="col-lg-5 order-lg-1 content-block" data-aos="fade-right">
                <div class="badge-pill">What is our vision?</div>
                <h2 class="display-5 mb-4">Why choose us</h2>
                <p>Our vision is to boldly lead in biotechnology by blending scientific innovation with an entrepreneurial spirit. We aim to tackle the world's greatest challenges in healthcare, agriculture, and sustainability.</p>
                <p>By empowering future innovators, fostering robust collaboration, and driving non-stop progress, we strive to create a world where science genuinely transforms lives and inspires positive change.</p>
                <p>With every product and innovation, we envision a future where the incredible potential of science is fully realized—helping not just businesses thrive, but making life substantially better for everyone.</p>
            </div>
        </div>
    </div>
</section>

<!-- Hallmarks of Excellence -->
<section class="py-5 position-relative" style="background-color: var(--primary); color: white;">
    <div class="container py-5">
        <div class="text-center mb-5 pb-3" data-aos="fade-up">
            <h2 class="display-4 fw-bold font-serif mb-3">Our Hallmarks of Excellence</h2>
            <p class="lead opacity-75 mx-auto" style="max-width: 600px;">Innovating through rigorous research and consistent industry recognition.</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="hallmark-item">
                    <div class="hallmark-img">
                        <img src="assets/images/content/720x540/ach1.jpg" alt="Innovation">
                    </div>
                    <div class="hallmark-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <div class="hallmark-content">
                        <h4>Innovation</h4>
                        <p>Pioneering research to discover cutting-edge molecules and technologies that address critical unmet medical needs, driving a future of real impact and progress.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="hallmark-item">
                    <div class="hallmark-img">
                        <img src="assets/images/content/720x540/ach2.jpg" alt="Microversity">
                    </div>
                    <div class="hallmark-icon">
                        <i class="fas fa-microscope"></i>
                    </div>
                    <div class="hallmark-content">
                        <h4>Microversity</h4>
                        <p>Offering specialized training in Microbiology and related sciences, renowned for innovative ideas and excellence, with prestigious honors from Startup Punjab and CGC Landran.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="hallmark-item">
                    <div class="hallmark-img">
                        <img src="assets/images/content/720x540/ach3.jpg" alt="Recognition">
                    </div>
                    <div class="hallmark-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <div class="hallmark-content">
                        <h4>Recognition</h4>
                        <p>Celebrated among the top three startups at TiECON Chandigarh and successfully securing key funding, including ₹5 lacs from the RKEY Scheme and ₹3 lacs from Startup Punjab.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Founders Section -->
<section class="py-5 my-5">
    <div class="container py-4">
        <div class="text-center mb-5 pb-4" data-aos="fade-up">
            <div class="badge-pill mb-3">Leadership</div>
            <h2 class="display-4 fw-bold font-serif" style="color: var(--primary);">Meet Our Founders</h2>
            <p class="lead text-muted mx-auto" style="max-width: 600px;">A visionary duo combining biotechnology expertise with a relentless passion for transformative innovation.</p>
        </div>
        
        <div class="row g-5">
            <!-- Founder 1 -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                <div class="founder-card">
                    <div class="founder-img-wrapper">
                        <img src="assets/images/content/720x480/Dr-Vipasha-Sharma.jpg" alt="Dr. Vipasha Sharma">
                    </div>
                    <div class="founder-info">
                        <h4 class="founder-name">Dr. Vipasha Sharma</h4>
                        <div class="founder-role">Founder</div>
                        <p class="founder-bio">Dr. Vipasha Sharma is a passionate researcher and entrepreneur with a Ph.D. in Biotechnology from Shoolini University. She has been globally recognized for her dedication to innovation and women's empowerment in the sciences.</p>
                        <ul class="list-unstyled founder-achievements mt-auto">
                            <li><i class="fas fa-trophy"></i> Parman Patra awardee, won TiECON Chandigarh Women Chapter & Boot-Camp Women Edition by Innovation Mission Punjab.</li>
                            <li><i class="fas fa-star"></i> Ambassador for the "SHE" campaign by the Punjab State Council for Science and Technology.</li>
                            <li><i class="fas fa-seedling"></i> Selected at national level for AgriMunch accelerator program by FAAD Network Pvt Ltd.</li>
                            <li><i class="fas fa-hand-holding-usd"></i> Top fundraiser at the "Startups Handholding & Empowerment" pitching event.</li>
                        </ul>
                    </div>
                </div>
            </div>
            
            <!-- Founder 2 -->
            <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                <div class="founder-card">
                    <div class="founder-img-wrapper">
                        <img src="assets/images/content/720x480/Dr-Tarun-Kumar.jpg" alt="Dr. Tarun Kumar">
                    </div>
                    <div class="founder-info">
                        <h4 class="founder-name">Dr. Tarun Kumar</h4>
                        <div class="founder-role">Co-Founder & CEO</div>
                        <p class="founder-bio">Dr. Tarun Kumar is an accomplished biotechnology expert with over 16 years of diverse experience spanning pharmaceuticals, academia, intellectual property rights, and scientific content creation.</p>
                        <ul class="list-unstyled founder-achievements mt-auto">
                            <li><i class="fas fa-lightbulb"></i> Co-Founder and CEO of MKelly Biotech Pvt. Ltd., pioneering functional foods and nutraceuticals.</li>
                            <li><i class="fas fa-award"></i> Ph.D. in Biotechnology, specializing in microbiology, molecular biology, and enzyme technology.</li>
                            <li><i class="fas fa-flask"></i> Key roles in research, teaching, and patents at Parexel, Chandigarh University, and Divisa Herbal Care.</li>
                            <li><i class="fas fa-book"></i> Author of peer-reviewed publications, patent holder, and certified in Intellectual Property Rights by WIPO.</li>
                        </ul>
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
        once: true,
        offset: 100
    });
</script>

<?php include('includes/footer.php') ?>
</body>
</html>
