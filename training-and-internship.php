<?php 
require_once 'includes/functions.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Training & Internship - Mkelly Biotech</title>
    <base href="<?= BASE_URL ?>">
    <meta name="description" content="Join Mkelly Biotech's Training and Internship programs to gain hands-on experience in sustainable biotechnology and organic food processing.">
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
        <h1 class="display-4 fw-bold font-serif mb-3" data-aos="fade-up">Training & Internship</h1>
        <p class="lead mb-0" data-aos="fade-up" data-aos-delay="100">Build your career in biotechnology with hands-on experience.</p>
    </div>
</section>

<!-- Content -->
<section class="py-5 my-5">
    <div class="container">
        <div class="row mb-5 justify-content-center">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <h2 class="font-serif fw-bold mb-4" style="color: #054B2C;">Empowering the Next Generation of Innovators</h2>
                <p class="text-muted">At Mkelly Biotech, we are committed to nurturing talent and fostering innovation in the field of sustainable biotechnology and organic food processing. Our internship and training programs offer a unique opportunity to work with industry experts, utilize state-of-the-art facilities, and gain real-world experience.</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6" data-aos="fade-right">
                <div class="p-5 bg-white rounded shadow-sm h-100 border-start border-primary border-4">
                    <h3 class="h4 fw-bold mb-3">Summer Internships</h3>
                    <p class="text-muted mb-4">A comprehensive 4 to 8-week program designed for undergraduate and graduate students. Gain practical skills in quality control, scientific drying methodologies, and product formulation.</p>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Hands-on lab experience</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Mentorship from senior scientists</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Real-world project involvement</li>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-6" data-aos="fade-left">
                <div class="p-5 bg-white rounded shadow-sm h-100 border-start border-primary border-4">
                    <h3 class="h4 fw-bold mb-3">Professional Training</h3>
                    <p class="text-muted mb-4">Advanced modules for professionals and researchers looking to upgrade their skills in sustainable biotechnology and natural product extraction.</p>
                    <ul class="list-unstyled text-muted">
                        <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Advanced machinery operation</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Industry compliance & standards</li>
                        <li class="mb-2"><i class="fas fa-check-circle text-primary me-2"></i> Certification upon completion</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="text-center mt-5 p-5 bg-white rounded shadow-sm" data-aos="fade-up">
            <h3 class="fw-bold mb-3">Apply Today</h3>
            <p class="text-muted mb-4">Ready to start your journey with Mkelly Biotech? Send your resume and a brief cover letter outlining your area of interest to our HR department.</p>
            <a href="mailto:mkellybiotech@gmail.com" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold" style="background-color: #054B2C; border: none;">
                Email Your Resume <i class="fas fa-envelope ms-2"></i>
            </a>
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
