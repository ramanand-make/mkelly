<?php 
require_once 'includes/functions.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
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
<section class="position-relative overflow-hidden text-white py-5" style="background: linear-gradient(135deg, #054B2C 0%, #0a7344 100%);">
    <!-- Decorative background elements -->
    <div class="position-absolute" style="top: -20%; right: -5%; width: 300px; height: 300px; background: rgba(255,255,255,0.05); border-radius: 50%; blur(40px);"></div>
    <div class="position-absolute" style="bottom: -20%; left: -5%; width: 250px; height: 250px; background: rgba(193,23,18,0.15); border-radius: 50%; blur(40px);"></div>
    
    <div class="container text-center py-5 position-relative" style="z-index: 2;">
        <span class="badge rounded-pill text-uppercase px-3 py-2 mb-3" style="background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.2); letter-spacing: 1.5px;">Hands-On Experience</span>
        <h1 class="display-3 fw-bold font-serif mb-4" data-aos="fade-up">Training & Internship</h1>
        <p class="lead mx-auto mb-0 text-white-50" data-aos="fade-up" data-aos-delay="100" style="max-width: 600px;">Build your career in biotechnology with practical, industry-focused programs.</p>
    </div>
</section>

<!-- Courses We Offer Section -->
<style>
    .course-card {
        background: #ffffff;
        border-radius: 1.25rem;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid rgba(0,0,0,0.05);
        box-shadow: 0 10px 25px rgba(0,0,0,0.03);
    }
    .course-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        border-color: rgba(5, 75, 44, 0.2);
    }
    .course-icon-box {
        width: 80px;
        height: 80px;
        border-radius: 50%;
        background: linear-gradient(135deg, rgba(193, 23, 18, 0.1), rgba(193, 23, 18, 0.05));
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 1.5rem;
        transition: all 0.4s ease;
    }
    .course-card:hover .course-icon-box {
        background: linear-gradient(135deg, #C11712, #ff4d4d);
        color: white;
        transform: scale(1.1) rotate(10deg);
        box-shadow: 0 10px 20px rgba(193, 23, 18, 0.3);
    }
    .course-card:hover .course-icon-box i {
        color: white !important;
    }
    .btn-course {
        border: 2px solid #054B2C;
        color: #054B2C;
        font-weight: 600;
        transition: all 0.3s ease;
    }
    .course-card:hover .btn-course {
        background: #054B2C;
        color: white;
    }
</style>
<section class="py-5 bg-background position-relative">
    <div class="container py-5">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge rounded-pill text-uppercase px-3 py-2 mb-3 shadow-sm" style="background: rgba(5, 75, 44, 0.1); color: #054B2C; letter-spacing: 1.5px;">Our Curriculum</span>
            <h2 class="display-5 fw-bold font-serif" style="color: #054B2C;">Courses We Offer</h2>
            <p class="lead text-muted mx-auto" style="max-width: 700px;">Transforming biotech with comprehensive and hands-on microbiology training.</p>
        </div>
        
        <div class="row g-4 justify-content-center">
            <!-- Course 1 -->
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="card course-card w-100 overflow-hidden h-100">
                    <div class="card-body p-5 text-center d-flex flex-column">
                        <div class="course-icon-box">
                            <i class="fas fa-chalkboard-teacher fa-2x" style="color: #C11712;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Molecular Biology</h4>
                        <p class="text-muted mb-4 flex-grow-1">A training program focused on DNA, RNA, and protein principles.</p>
                        <a href="trainings/molecular-biology" class="btn btn-course px-4 py-2 rounded-pill w-100">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Course 2 -->
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="card course-card w-100 overflow-hidden h-100">
                    <div class="card-body p-5 text-center d-flex flex-column">
                        <div class="course-icon-box">
                            <i class="fas fa-microscope fa-2x" style="color: #C11712;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Microbiology</h4>
                        <p class="text-muted mb-4 flex-grow-1">Master microbial techniques through deep hands-on laboratory experience.</p>
                        <a href="trainings/microbiology" class="btn btn-course px-4 py-2 rounded-pill w-100">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Course 3 -->
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                <div class="card course-card w-100 overflow-hidden h-100">
                    <div class="card-body p-5 text-center d-flex flex-column">
                        <div class="course-icon-box">
                            <i class="fas fa-seedling fa-2x" style="color: #C11712;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Food Biotechnology</h4>
                        <p class="text-muted mb-4 flex-grow-1">Improve food safety, nutrition, and mass production with advanced biotechnology.</p>
                        <a href="trainings/food-biotechnology" class="btn btn-course px-4 py-2 rounded-pill w-100">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Course 4 -->
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="card course-card w-100 overflow-hidden h-100">
                    <div class="card-body p-5 text-center d-flex flex-column">
                        <div class="course-icon-box">
                            <i class="fas fa-dna fa-2x" style="color: #C11712;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Enzyme Technology</h4>
                        <p class="text-muted mb-4 flex-grow-1">Explore enzyme production, purification, and diverse applications across industries.</p>
                        <a href="trainings/enzyme-technology" class="btn btn-course px-4 py-2 rounded-pill w-100">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Course 5 -->
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="card course-card w-100 overflow-hidden h-100">
                    <div class="card-body p-5 text-center d-flex flex-column">
                        <div class="course-icon-box">
                            <i class="fas fa-leaf fa-2x" style="color: #C11712;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Mushroom Processing</h4>
                        <p class="text-muted mb-4 flex-grow-1">Discover preservation, value addition, and advanced packaging techniques.</p>
                        <a href="trainings/mushrooms" class="btn btn-course px-4 py-2 rounded-pill w-100">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Course 6 -->
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                <div class="card course-card w-100 overflow-hidden h-100">
                    <div class="card-body p-5 text-center d-flex flex-column">
                        <div class="course-icon-box">
                            <i class="fas fa-flask fa-2x" style="color: #C11712;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Plant Phytochemistry</h4>
                        <p class="text-muted mb-4 flex-grow-1">Explore plant metabolites and their antimicrobial properties through practical labs.</p>
                        <a href="trainings/plant-phytochemistry" class="btn btn-course px-4 py-2 rounded-pill w-100">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Course 7 -->
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="card course-card w-100 overflow-hidden h-100">
                    <div class="card-body p-5 text-center d-flex flex-column">
                        <div class="course-icon-box">
                            <i class="fas fa-seedling fa-2x" style="color: #C11712;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Cordyceps Militaris</h4>
                        <p class="text-muted mb-4 flex-grow-1">Learn precise cultivation techniques to optimize production and quality.</p>
                        <a href="trainings/cordyceps-militaris" class="btn btn-course px-4 py-2 rounded-pill w-100">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Course 8 -->
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="card course-card w-100 overflow-hidden h-100">
                    <div class="card-body p-5 text-center d-flex flex-column">
                        <div class="course-icon-box">
                            <i class="fas fa-vials fa-2x" style="color: #C11712;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Fermentation Tech</h4>
                        <p class="text-muted mb-4 flex-grow-1">Master fermentation processes for extensive industrial bioprocessing applications.</p>
                        <a href="trainings/fermentation-technology" class="btn btn-course px-4 py-2 rounded-pill w-100">Learn More</a>
                    </div>
                </div>
            </div>

            <!-- Course 9 -->
            <div class="col-lg-4 col-md-6 d-flex" data-aos="fade-up" data-aos-delay="300">
                <div class="card course-card w-100 overflow-hidden h-100">
                    <div class="card-body p-5 text-center d-flex flex-column">
                        <div class="course-icon-box">
                            <i class="fas fa-laptop-code fa-2x" style="color: #C11712;"></i>
                        </div>
                        <h4 class="fw-bold mb-3">Bioinformatics</h4>
                        <p class="text-muted mb-4 flex-grow-1">Analyze biological data accurately using leading bioinformatics tools and methods.</p>
                        <a href="trainings/fundamentals-bioinformatics" class="btn btn-course px-4 py-2 rounded-pill w-100">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Fundamentals Section -->
<style>
    .fundamental-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 1.25rem;
        overflow: hidden;
        transition: all 0.4s ease;
    }
    .fundamental-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        border-color: rgba(193, 23, 18, 0.4);
    }
    .fundamental-card img {
        transition: transform 0.6s ease;
    }
    .fundamental-card:hover img {
        transform: scale(1.05);
    }
</style>
<section class="py-5 position-relative" style="background-color: #054B2C; color: white; overflow: hidden;">
    <div class="position-absolute" style="top: -10%; left: -5%; width: 300px; height: 300px; background: rgba(193, 23, 18, 0.2); filter: blur(80px); border-radius: 50%;"></div>
    <div class="container py-5 position-relative" style="z-index: 2;">
        <div class="text-center mb-5" data-aos="fade-up">
            <span class="badge rounded-pill text-uppercase px-3 py-2 mb-3" style="background: rgba(193, 23, 18, 0.2); color: #ffcccc; letter-spacing: 1.5px;">Core Expertise</span>
            <h2 class="display-5 fw-bold font-serif">Fundamentals of Antimicrobial Assay Using Plant Extract</h2>
        </div>
        
        <div class="row g-4 justify-content-center">
            <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="100">
                <div class="card fundamental-card h-100">
                    <div class="overflow-hidden">
                        <img src="assets/images/content/720x540/ach1.jpg" class="card-img-top rounded-0 border-bottom border-light border-opacity-10" alt="Understand the Basics">
                    </div>
                    <div class="card-body p-4 text-center">
                        <h4 class="fw-bold mb-3 text-white">Understand the Basics</h4>
                        <p class="text-white-50 mb-0">Gain foundational knowledge in microbiology and plant extracts. Learn essential safety protocols and good laboratory practices (GLP).</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="200">
                <div class="card fundamental-card h-100">
                    <div class="overflow-hidden">
                        <img src="assets/images/content/720x540/ach2.jpg" class="card-img-top rounded-0 border-bottom border-light border-opacity-10" alt="Sample Preparation">
                    </div>
                    <div class="card-body p-4 text-center">
                        <h4 class="fw-bold mb-3 text-white">Sample Preparation</h4>
                        <p class="text-white-50 mb-0">Select and sterilize plant samples, extract bioactive compounds, and perform susceptibility tests to assess antimicrobial properties.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-flex" data-aos="fade-up" data-aos-delay="300">
                <div class="card fundamental-card h-100">
                    <div class="overflow-hidden">
                        <img src="assets/images/content/720x540/ach3.jpg" class="card-img-top rounded-0 border-bottom border-light border-opacity-10" alt="Nanoparticle Formation">
                    </div>
                    <div class="card-body p-4 text-center">
                        <h4 class="fw-bold mb-3 text-white">Nanoparticle Formation</h4>
                        <p class="text-white-50 mb-0">Synthesize silver nanoparticles and evaluate their antimicrobial effects. Compare and interpret results between plant extracts and nanoparticles.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Call to Action -->
<section class="py-5 bg-white position-relative">
    <div class="container text-center py-5" data-aos="zoom-in">
        <div class="p-5 bg-light rounded-4 shadow-sm border border-light">
            <h2 class="display-5 fw-bold font-serif mb-4" style="color: #054B2C;">Enroll in Our Summer Training Program</h2>
            <p class="text-muted mb-4 mx-auto" style="max-width: 600px;">Take the next step in your career with our hands-on summer training program. Gain practical knowledge from industry experts.</p>
            <a href="https://docs.google.com/forms/d/1ohSbSx8lmcmud969kVTTrLlfplrkI4ZfG5E8sZ-Q2FA/edit" target="_blank" class="btn btn-lg px-5 py-3 rounded-pill fw-bold shadow text-white" style="background: linear-gradient(90deg, #C11712, #ff4d4d); border: none; transition: transform 0.3s ease;" onmouseover="this.style.transform='scale(1.05)'" onmouseout="this.style.transform='scale(1)'">
                Enroll Now <i class="fas fa-arrow-right ms-2"></i>
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
