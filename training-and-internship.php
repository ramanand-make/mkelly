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

<!-- Courses We Offer Section -->
<section class="py-5 bg-background">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold font-serif" style="color: #054B2C;">Courses We Offer</h2>
            <p class="lead text-muted mx-auto" style="max-width: 700px;">Transforming biotech with hands-on microbiology training.</p>
        </div>
        
        <div class="row g-4">
            <!-- Course 1 -->
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm w-100 rounded-3 overflow-hidden h-100">
                    <div class="card-body p-4 text-center">
                        <div class="mb-4 d-inline-flex justify-content-center align-items-center rounded-circle" style="width: 70px; height: 70px; background-color: rgba(193, 23, 18, 0.1);">
                            <i class="fas fa-chalkboard-teacher fa-2x" style="color: #C11712;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Molecular Biology</h4>
                        <p class="text-muted mb-4">A training program focused on DNA, RNA, and protein principles.</p>
                        <a href="trainings/molecular-biology" class="btn btn-outline-primary px-4 rounded-pill" style="border-color: #054B2C; color: #054B2C;">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Course 2 -->
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm w-100 rounded-3 overflow-hidden h-100">
                    <div class="card-body p-4 text-center">
                        <div class="mb-4 d-inline-flex justify-content-center align-items-center rounded-circle" style="width: 70px; height: 70px; background-color: rgba(193, 23, 18, 0.1);">
                            <i class="fas fa-microscope fa-2x" style="color: #C11712;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Microbiology</h4>
                        <p class="text-muted mb-4">Master microbial techniques through hands-on experience.</p>
                        <a href="trainings/microbiology" class="btn btn-outline-primary px-4 rounded-pill" style="border-color: #054B2C; color: #054B2C;">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Course 3 -->
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm w-100 rounded-3 overflow-hidden h-100">
                    <div class="card-body p-4 text-center">
                        <div class="mb-4 d-inline-flex justify-content-center align-items-center rounded-circle" style="width: 70px; height: 70px; background-color: rgba(193, 23, 18, 0.1);">
                            <i class="fas fa-seedling fa-2x" style="color: #C11712;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Food Biotechnology</h4>
                        <p class="text-muted mb-4">Improve food safety, nutrition, and production with biotechnology.</p>
                        <a href="trainings/food-biotechnology" class="btn btn-outline-primary px-4 rounded-pill" style="border-color: #054B2C; color: #054B2C;">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Course 4 -->
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm w-100 rounded-3 overflow-hidden h-100">
                    <div class="card-body p-4 text-center">
                        <div class="mb-4 d-inline-flex justify-content-center align-items-center rounded-circle" style="width: 70px; height: 70px; background-color: rgba(193, 23, 18, 0.1);">
                            <i class="fas fa-dna fa-2x" style="color: #C11712;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Enzyme Technology</h4>
                        <p class="text-muted mb-4">Explore enzyme production, purification, and applications across industries through training.</p>
                        <a href="trainings/enzyme-technology" class="btn btn-outline-primary px-4 rounded-pill" style="border-color: #054B2C; color: #054B2C;">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Course 5 -->
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm w-100 rounded-3 overflow-hidden h-100">
                    <div class="card-body p-4 text-center">
                        <div class="mb-4 d-inline-flex justify-content-center align-items-center rounded-circle" style="width: 70px; height: 70px; background-color: rgba(193, 23, 18, 0.1);">
                            <i class="fas fa-leaf fa-2x" style="color: #C11712;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Post-Harvest Process of Mushrooms</h4>
                        <p class="text-muted mb-4">Discover preservation, value addition, and packaging techniques for processed mushrooms.</p>
                        <a href="trainings/mushrooms" class="btn btn-outline-primary px-4 rounded-pill" style="border-color: #054B2C; color: #054B2C;">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Course 6 -->
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm w-100 rounded-3 overflow-hidden h-100">
                    <div class="card-body p-4 text-center">
                        <div class="mb-4 d-inline-flex justify-content-center align-items-center rounded-circle" style="width: 70px; height: 70px; background-color: rgba(193, 23, 18, 0.1);">
                            <i class="fas fa-flask fa-2x" style="color: #C11712;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Plant Phytochemistry & Antimicrobial Activity</h4>
                        <p class="text-muted mb-4">Explore plant metabolites and their antimicrobial properties through research using practical lab.</p>
                        <a href="trainings/plant-phytochemistry" class="btn btn-outline-primary px-4 rounded-pill" style="border-color: #054B2C; color: #054B2C;">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Course 7 -->
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="card border-0 shadow-sm w-100 rounded-3 overflow-hidden h-100">
                    <div class="card-body p-4 text-center">
                        <div class="mb-4 d-inline-flex justify-content-center align-items-center rounded-circle" style="width: 70px; height: 70px; background-color: rgba(193, 23, 18, 0.1);">
                            <i class="fas fa-seedling fa-2x" style="color: #C11712;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Cordyceps Militaris Cultivation</h4>
                        <p class="text-muted mb-4">Learn cultivation techniques for Cordyceps militaris to optimize production and quality.</p>
                        <a href="trainings/cordyceps-militaris" class="btn btn-outline-primary px-4 rounded-pill" style="border-color: #054B2C; color: #054B2C;">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Course 8 -->
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="card border-0 shadow-sm w-100 rounded-3 overflow-hidden h-100">
                    <div class="card-body p-4 text-center">
                        <div class="mb-4 d-inline-flex justify-content-center align-items-center rounded-circle" style="width: 70px; height: 70px; background-color: rgba(193, 23, 18, 0.1);">
                            <i class="fas fa-vials fa-2x" style="color: #C11712;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Fermentation Technology</h4>
                        <p class="text-muted mb-4">Master fermentation processes for industrial applications and bioprocessing techniques.</p>
                        <a href="trainings/fermentation-technology" class="btn btn-outline-primary px-4 rounded-pill" style="border-color: #054B2C; color: #054B2C;">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Course 9 -->
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                <div class="card border-0 shadow-sm w-100 rounded-3 overflow-hidden h-100">
                    <div class="card-body p-4 text-center">
                        <div class="mb-4 d-inline-flex justify-content-center align-items-center rounded-circle" style="width: 70px; height: 70px; background-color: rgba(193, 23, 18, 0.1);">
                            <i class="fas fa-laptop-code fa-2x" style="color: #C11712;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Fundamentals of Bioinformatics</h4>
                        <p class="text-muted mb-4">Analyze biological data using bioinformatics tools and computational methods.</p>
                        <a href="trainings/fundamentals-bioinformatics" class="btn btn-outline-primary px-4 rounded-pill" style="border-color: #054B2C; color: #054B2C;">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fundamentals Section -->
<section class="py-5" style="background-color: #054B2C; color: white;">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <h2 class="display-5 fw-bold font-serif">Fundamentals of Antimicrobial Assay Using Plant Extract</h2>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 border-0 shadow-sm" style="background: rgba(255,255,255,0.05);">
                    <img src="assets/images/content/720x540/ach1.jpg" class="card-img-top rounded-0" alt="Understand the Basics">
                    <div class="card-body p-4 text-center">
                        <h4 class="fw-bold mb-3">Understand the Basics</h4>
                        <p class="text-white-50 mb-0">Gain foundational knowledge in microbiology and plant extracts. Learn essential safety protocols and good laboratory practices (GLP).</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 border-0 shadow-sm" style="background: rgba(255,255,255,0.05);">
                    <img src="assets/images/content/720x540/ach2.jpg" class="card-img-top rounded-0" alt="Sample Preparation">
                    <div class="card-body p-4 text-center">
                        <h4 class="fw-bold mb-3">Sample Preparation</h4>
                        <p class="text-white-50 mb-0">Select and sterilize plant samples, extract bioactive compounds, and perform susceptibility tests to assess antimicrobial properties.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 border-0 shadow-sm" style="background: rgba(255,255,255,0.05);">
                    <img src="assets/images/content/720x540/ach3.jpg" class="card-img-top rounded-0" alt="Nanoparticle Formation">
                    <div class="card-body p-4 text-center">
                        <h4 class="fw-bold mb-3">Nanoparticle Formation</h4>
                        <p class="text-white-50 mb-0">Synthesize silver nanoparticles and evaluate their antimicrobial effects. Compare and interpret results between plant extracts and nanoparticles.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-white">
    <div class="container text-center py-5" data-aos="fade-up">
        <h2 class="display-5 fw-bold font-serif mb-4" style="color: #054B2C;">Enroll in Our Summer Training Program</h2>
        <a href="https://docs.google.com/forms/d/1ohSbSx8lmcmud969kVTTrLlfplrkI4ZfG5E8sZ-Q2FA/edit" target="_blank" class="btn btn-primary btn-lg px-5 py-3 rounded-pill fw-bold shadow" style="background-color: #C11712; border: none;">
            Enroll Now <i class="fas fa-arrow-right ms-2"></i>
        </a>
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
