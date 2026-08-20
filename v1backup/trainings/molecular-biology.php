<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="shortcut icon" href="../assets/images/parts/favicon.png" />
    <title>Mkelly Biotech Pvt. Ltd - Hands-On Molecular Biology Training </title>
    <meta name="description"
        content="Explore MKelly Biotech's Molecular Biology Training Program offering hands-on experience in DNA/RNA techniques, cloning, and genetic analysis.">
    <link href="/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/animate.css/animate.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="/assets/slick/slick.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500;700&amp;display=swap" rel="stylesheet"
        type="text/css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;display=swap" rel="stylesheet"
        type="text/css">
    <link href="/assets/css/theme.min.css" rel="stylesheet" type="text/css">
    <style>
        /* For desktop/laptop view (screen width >= 992px) */
        @media (min-width: 992px) {
            .header-colorfull.header-horizontal .navbar-collapse .navbar-nav .nav-item .nav-link {
                color: white !important;
            }
        }

        /* For mobile view (screen width < 992px) */
        @media (max-width: 991.98px) {
            .header-colorfull.header-horizontal .navbar-collapse .navbar-nav .nav-item .nav-link {
                /* Keep original color for mobile */
                color: inherit;
            }
        }

        /* Hover effect for header text */
        .header-colorfull.header-horizontal .navbar-collapse .navbar-nav .nav-item .nav-link:hover {
            color: rgb(239, 239, 67);
            text-shadow: 0 0 5px rgba(239, 239, 67);
            transition: color 0.3s ease-in-out, text-shadow 0.3s ease-in-out;
        }

        .logo-block img {
            max-width: 120px;
            margin: auto;
        }

        .d-flex {
            display: flex;
            justify-content: space-evenly;
            align-items: center;
            flex-wrap: wrap;
            gap: 70px;
        }

        @media (max-width: 768px) {
            .d-flex {
                justify-content: center;
            }
        }

        @media (min-width: 992px) {
            .custom-padding {
                padding-left: 150px;
            }
        }

        #cart-open-button i.fas.fa-shopping-bag {
            font-size: 1.5rem;
            /* Adjust the value as per your desired size */
        }

        /* Program specific styles */
        .program-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            padding: 25px;
            margin-bottom: 30px;
            transition: transform 0.3s ease;
        }

        .program-card:hover {
            transform: translateY(-5px);
        }

        .program-title {
            color: #3a94c0;
            border-bottom: 2px solid #3a94c0;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .topic-item {
            margin-bottom: 8px;
            position: relative;
            padding-left: 25px;
        }

        .topic-item:before {
            content: "\f00c";
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            color: #3a94c0;
            position: absolute;
            left: 0;
        }

        .unique-features {
            background-color: #e1e7ed;
            padding: 30px;
            border-radius: 10px;
            margin: 100px 0;
        }

        .feature-icon {
            color: #3a94c0;
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .dna-icon {
            color: #3a94c0;
            margin-right: 10px;
        }

        
    </style>
</head>

<body class="body">
    <div class="page-loader cube-loader">
        <div class="loader-wrap">
            <div class="loader-1 loader-element"></div>
            <div class="loader-2 loader-element"></div>
            <div class="loader-4 loader-element"></div>
            <div class="loader-3 loader-element"></div>
        </div>
    </div>

    <header class="header-colorfull header-horizontal header-over header-view-side">
        <div class="container">
            <nav class="navbar" style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
                <a class="nav-link" href="/"><img src="/assets/images/svg/logo.png" alt="Mkelly" /></a>
                <button class="navbar-toggler" type="button">
                    <i class="fas fa-bars nav-show" style="color: #ffffff;"></i>
                    <i class="fas fa-times nav-hide"></i>
                </button>
                <div class="navbar-collapse">
                    <div class="container">
                        <ul class="navbar-nav custom-padding">
                            <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                            <li class="nav-item"><a class="nav-link" href="/about-us">About Us</a></li>
                            <li class="nav-item"><a class="nav-link" href="/our-products">Our Products</a></li>
                            <li class="nav-item"><a class="nav-link" href="/training-and-internship">Training &
                                    Internship</a></li>
                            <li class="nav-item"><a class="nav-link" href="/faq">FAQ</a></li>
                        </ul>
                        <div class="navbar-extra">
                            <ul class="actions-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#" data-show-block="cart" aria-label="Open Cart Sidebar"
                                        id="cart-open-button">
                                        <i class="fas fa-shopping-bag"></i>
                                        <span class="navbar-mobile">&nbsp;&nbsp;Cart</span>
                                        <span class="cart-quantity">
                                            <span class="badge badge-pill badge-cart">0</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <!-- Cart Sidebar -->
    <div class="cart-sidebar collapse" data-block="cart" data-show-block-class="animation-scale-top-right"
        data-hide-block-class="animation-unscale-top-right" aria-modal="true" role="dialog" aria-labelledby="cartTitle"
        aria-hidden="true">
        <a class="close-link" href="#" data-close-block="true" aria-label="Close Cart Sidebar">
            <i class="fas fa-times"></i>
        </a>
        <div class="cart-inner p-3">
            <h4 class="text-title mb-2" id="cartTitle">Cart</h4>
            <div class="separator-line mb-4"></div>
            <p>Loading cart...</p>
        </div>
    </div>

    <script>
        // Function to load and render cart sidebar content dynamically
        function loadCartSidebar() {
            const cartInner = document.querySelector('.cart-sidebar .cart-inner');

            // Show loading message immediately
            cartInner.innerHTML = `
      <h4 class="text-title mb-2" id="cartTitle">Cart</h4>
      <div class="separator-line mb-4"></div>
      <p>Loading cart...</p>
    `;

            // Fetch cart data from server (adjust 'get-cart.php' to your real API endpoint)
            fetch('/get-cart.php')
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Update cart badge quantity
                        const badge = document.querySelector('.badge-cart');
                        if (badge) badge.textContent = data.total_quantity || 0;

                        let html = `
            <h4 class="text-title mb-2" id="cartTitle">Cart</h4>
            <div class="separator-line mb-4"></div>
          `;

                        if (!data.items || data.items.length === 0) {
                            html += `<p>Your cart is empty.</p>`;
                        } else {
                            data.items.forEach(item => {
                                html += `
  <div class="entity mb-3">
    <div class="grid-sm row">
      <div class="col-5">
        <a class="entity-preview-show-up entity-preview" href="/shop?id=${item.product_id}">
          <span class="embed-responsive embed-responsive-4by3">
            <img class="embed-responsive-item" src="/${item.image_url}" alt="${item.name}" />
          </span>
          <span class="with-back entity-preview-content">
            <span class="h3 m-auto text-theme text-center"><i class="fas fa-search"></i></span>
            <span class="overflow-back bg-body-back opacity-70"></span>
          </span>
        </a>
      </div>
      <div class="col">
        <h4 class="h5 mb-1 entity-title">
          <a class="content-link" href="/shop?id=${item.product_id}">${item.name}</a>
        </h4>
        <div class="entity-price">
          <span class="currency">₹</span>${item.price.toFixed(2)} / unit
          <span class="entity-quantity">&nbsp;x&nbsp;${item.quantity}</span>
        </div>
        <div class="entity-total">Total: ₹${item.total.toFixed(2)}</div>
      </div>
    </div>
  </div>
`;
                            });

                            html += `
              <div class="separator-line mt-4 mb-3"></div>
              <ul class="cart-totals list-titled">
                <li>
                  <span class="list-item-title">Sub Total</span>
                  <span class="list-item-value">₹${data.subtotal.toFixed(2)}</span>
                </li>
              </ul>
              <a class="w-100 mb-2 btn btn-theme-bordered" href="/cart" tabindex="0">View Cart&nbsp;&nbsp;&nbsp;<i class="fas fa-shopping-bag"></i></a>
              <a class="w-100 btn btn-theme" href="/process-checkout" tabindex="0">Checkout&nbsp;&nbsp;&nbsp;<i class="fas fa-shopping-cart"></i></a>
            `;
                        }

                        cartInner.innerHTML = html;
                    } else {
                        cartInner.innerHTML = '<p>Failed to load cart. Please try again later.</p>';
                        console.error('Failed to load cart:', data.message);
                    }
                })
                .catch(err => {
                    cartInner.innerHTML = '<p>Error loading cart. Please check your connection.</p>';
                    console.error('Error fetching cart:', err);
                });
        }

        // Handle opening sidebar – load content and manage accessibility
        document.querySelectorAll('[data-show-block="cart"]').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();

                const sidebar = document.querySelector('.cart-sidebar');
                if (!sidebar.classList.contains('show')) {
                    // Show sidebar with your show class and accessibility attributes
                    sidebar.classList.add('show');
                    sidebar.setAttribute('aria-hidden', 'false');
                    sidebar.inert = false;

                    // Focus close button for accessibility
                    const closeBtn = sidebar.querySelector('[data-close-block="true"]');
                    if (closeBtn) closeBtn.focus();

                    // Load dynamic cart content
                    loadCartSidebar();
                }
            });
        });

        // Handle closing sidebar – hide it, reset content, and focus back on open button
        document.querySelectorAll('[data-close-block="true"]').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();

                const sidebar = btn.closest('.cart-sidebar');
                if (!sidebar) return;

                // Hide sidebar and update accessibility
                sidebar.classList.remove('show');
                sidebar.setAttribute('aria-hidden', 'true');
                sidebar.inert = true;

                // Focus open button for accessibility
                const openBtn = document.getElementById('cart-open-button');
                if (openBtn) openBtn.focus();

                // Reset sidebar content to loading placeholder
                const cartInner = sidebar.querySelector('.cart-inner');
                if (cartInner) {
                    cartInner.innerHTML = `
          <h4 class="text-title mb-2" id="cartTitle">Cart</h4>
          <div class="separator-line mb-4"></div>
          <p>Loading cart...</p>
        `;
                }
            });
        });

        // Optionally, update badge count on page load by loading cart (without opening sidebar)
        document.addEventListener('DOMContentLoaded', () => {
            // Just update badge, no need to load full sidebar content yet
            fetch('/get-cart.php')
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        const badge = document.querySelector('.badge-cart');
                        if (badge) badge.textContent = data.total_quantity || 0;
                    }
                })
                .catch(() => {
                    // Silently fail; badge remains zero or last known state
                });
        });
        // Add product to cart via AJAX, then refresh cart sidebar and badge
        function addToCart(productId) {
            fetch('/add-to-cart.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: 'product_id=' + encodeURIComponent(productId)
            })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Refresh cart sidebar and badge count immediately
                        loadCartSidebar();
                        alert('Product added to cart!');
                    } else {
                        alert('Failed to add product to cart: ' + data.message);
                    }
                })
                .catch(() => alert('Network error while adding product to cart'));
        }
    </script>

    <section class="after-head top-block-page with-back white-curve-after section-white-text"
        style="text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);">
        <div class="overflow-back cover-image" data-background="/assets/images/sliders/banner1.jpg"></div>
        <div class="content-offs-stick my-5 container">
            <div class="section-solid with-back">
                <div class="full-block">
                    <!-- <div class="section-back-text">Mkelly</div> -->
                </div>
                <div class="z-index-4 position-relative text-center mt-4">
                    <h1 class="section-title" style="font-size: 2.8rem;">Molecular Biology</h1>
                    <div class="mt-3">
                        <div class="page-breadcrumbs"><a class="content-link" href="/">Home</a><span
                                class="mx-2">\</span><a class="content-link" href="/training-and-internship">Training &
                                Internship</a><span class="mx-2">\</span><span>Molecular Biology</span></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section mt-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="entity-content">
                        <h2 class="entity-subtitle"
                            style="color:#3a94c0; text-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2); font-weight:600">
                            Overview</h2>
                        <p class="entity-text">Molecular Biology is at the heart of modern biotechnology, diagnostics,
                            and research. This comprehensive training program is designed to provide students,
                            researchers, and professionals with <strong>hands-on experience</strong> and a <strong>solid
                                theoretical foundation</strong> in the core techniques and concepts of molecular
                            biology.</p>

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="program-card">
                                    <h3 class="program-title"><i class="far fa-calendar-alt mr-2"></i>15 Days/2 Weeks
                                        Program</h3><br>
                                    <p>An intensive program covering fundamental molecular biology techniques and
                                        applications.</p><br>
                                    <h4>Key Topics Covered:</h4><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="list-unstyled">
                                                <li class="topic-item">Good Laboratory Practices and General Safety
                                                    Instructions</li>
                                                <li class="topic-item">Medium preparation and calculations</li>
                                                <li class="topic-item">Understanding the process of Sterilization
                                                    Techniques</li>
                                                <li class="topic-item">A practical approach towards Luria-Bertani Media
                                                    and culturing of microbes</li>
                                                <li class="topic-item">Isolation of Prokaryotic Bacterial genomic DNA
                                                </li>
                                                <li class="topic-item">Agarose Gel Electrophoresis and visualization
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="list-unstyled">
                                                <li class="topic-item">Isolation & Purification of Genomic DNA from
                                                    Plant sample</li>
                                                <li class="topic-item">Agarose Gel Electrophoresis of Isolated Plant
                                                    Genomic DNA</li>
                                                <li class="topic-item">Isolation & Purification of Plasmid DNA</li>
                                                <li class="topic-item">Agarose Gel Electrophoresis and visualization of
                                                    Isolated Plasmid DNA</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-md-12">
                                <div class="program-card">
                                    <h3 class="program-title"><i class="far fa-calendar-alt mr-2"></i>30 Days/4 Weeks
                                        Program</h3><br>
                                    <p>An advanced program that builds on fundamental techniques and introduces genetic
                                        engineering concepts.</p><br>
                                    <h4>Additional Topics Covered (includes all 2-week topics plus):</h4><br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <ul class="list-unstyled">
                                                <li class="topic-item">RNA Isolation and Agarose Gel Electrophoresis of
                                                    Isolated RNA</li>
                                                <li class="topic-item">Restriction Digestion of DNA</li>
                                                <li class="topic-item">Electrophoresis of Digested DNA Product</li>
                                                <li class="topic-item">Competent Cell Preparation of E. coli</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6">
                                            <ul class="list-unstyled">
                                                <li class="topic-item">cDNA Preparation and Cloning</li>
                                                <li class="topic-item">Cloning of cDNA into Digested Plasmid (cDNA
                                                    Ligation)</li>
                                                <li class="topic-item">Transformation of Ligated Plasmid into Competent
                                                    Cells</li>
                                                <li class="topic-item">Screening of the Transformed Cells (Blue-White
                                                    selection)</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="unique-features text-center">
                            <h2 class="entity-title" style="color:#3a94c0;">Program Highlights</h2>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="feature-icon"><i class="fas fa-dna"></i></div>
                                    <h4>DNA/RNA Techniques</h4>
                                    <p>Master isolation, purification, and analysis of nucleic acids</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="feature-icon"><i class="fas fa-flask"></i></div>
                                    <h4>Genetic Engineering</h4>
                                    <p>Learn cloning, transformation, and recombinant DNA technology</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="feature-icon"><i class="fas fa-microscope"></i></div>
                                    <h4>Lab Proficiency</h4>
                                    <p>Develop skills for academic, clinical, or industrial research</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-0" style="margin-top:-0px;">
                            <h3 class="entity-title"><i class="fas fa-graduation-cap dna-icon"></i>Learning Outcomes
                            </h3>
                            <ul class="list-unstyled">
                                <li class="topic-item">Understand the principles of DNA, RNA, and protein structure and
                                    function</li>
                                <li class="topic-item">Gain practical proficiency in essential molecular techniques</li>
                                <li class="topic-item">Develop critical thinking for experimental design and data
                                    analysis</li>
                                <li class="topic-item">Master genetic engineering techniques including cloning and
                                    transformation</li>
                                <li class="topic-item">Prepare for lab-based roles in biotechnology, pharmaceuticals, or
                                    research</li>
                            </ul>
                        </div>

                        <div class="unique-features" style="margin-top: 90px;">
                        <div class="mt-0">
                            <h3 class="entity-title"><i class="fas fa-user-graduate dna-icon"></i>Who Should Enroll?
                            </h3>
                            <ul class="list-unstyled">
                                <li class="topic-item">Students (B.Sc./M.Sc./Ph.D. in Life Sciences, Biotechnology,
                                    Microbiology)</li>
                                <li class="topic-item">Lab Technicians seeking skill enhancement</li>
                                <li class="topic-item">Researchers preparing for molecular biology projects</li>
                                <li class="topic-item">Industry Professionals entering biotech, pharmaceuticals, or
                                    diagnostics</li>
                            </ul>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <div class="big section-footer text-center" style="margin-top: 0rem; margin-bottom: 2rem; max-width: 1110px;">
        <h2 class="section-title">Ready to advance your career in <span style="color: #3a94c0;">Molecular
                Biology</span>?</h2>
        <p class="mb-4">Join our training program and gain industry-relevant skills!</p>
        <a class="btn btn-theme" style="background-color: #3a94c0;" href="https://docs.google.com/forms/d/1ohSbSx8lmcmud969kVTTrLlfplrkI4ZfG5E8sZ-Q2FA/edit">Enroll Now</a>
    </div>

    

    <div class="scroll-top"><i class="fas fa-long-arrow-alt-up"></i></div>

    <?php include '../footer.php'; ?>

    <script data-cfasync="false" src="/../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="/assets/jquery/jquery-3.3.1.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="/assets/shuffle/shuffle.min.js"></script>
    <script src="/assets/waypoints/jquery.waypoints.min.js"></script>
    <script src="/assets/slick/slick.min.js"></script>
    <script src="/assets/js-cookie/js.cookie.js" type="text/javascript"></script>
    <script src="/assets/js/gmap/silver.js"></script>
    <script src="/assets/js/script.js"></script>
    <script async defer="defer"
        src="/https://maps.googleapis.com/maps/api/js?key=AIzaSyBDBAbNXaCDOzujLCykXUvTylfbL1wUcaM&amp;callback=initMap"></script>
</body>

</html>