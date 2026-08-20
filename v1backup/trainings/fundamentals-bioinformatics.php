<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    <link rel="shortcut icon" href="../assets/images/parts/favicon.png" />
    <title>Mkelly Biotech Pvt. Ltd - Bioinformatics Training Program</title>
    <meta name="description"
        content="Explore MKelly Biotech's Bioinformatics Training Program offering hands-on experience in sequence analysis, molecular modeling, and genomic data interpretation.">
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


        /* Cart Inner Content */
        .cart-inner {
            padding: 15px;
        }

        .cart-totals {
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }

        .cart-totals li {
            display: flex;
            justify-content: space-between;
        }

        .cart-totals .list-item-title {
            font-weight: bold;
        }

        .cart-totals .list-item-value {
            color: #333;
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
            background-color: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            margin: 40px 0;
        }

        .feature-icon {
            color: #3a94c0;
            font-size: 2rem;
            margin-bottom: 15px;
        }

        .bio-icon {
            color: #3a94c0;
            margin-right: 10px;
        }

        .module-card {
            border-left: 4px solid #3a94c0;
            margin-bottom: 20px;
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
                    <h1 class="section-title" style="font-size: 2.5rem;">Fundamentals of Bioinformatics</h1>
                    <div class="mt-3">
                        <div class="page-breadcrumbs"><a class="content-link" href="/">Home</a><span
                                class="mx-2">\</span><a class="content-link" href="/training-and-internship">Training &
                                Internship</a><span class="mx-2">\</span><span>Bioinformatics</span></div>
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
                        <h2 class="entity-subtitle" style="color:#3a94c0; text-shadow: 0px 2px 5px rgba(0, 0, 0, 0.2);">
                            Overview</h2>
                        <p class="entity-text">The <strong>Fundamentals of Bioinformatics Training Program</strong>
                            provides participants with foundational knowledge and hands-on experience in key
                            bioinformatics tools and techniques. This program combines biology, computer science, and
                            statistics to analyze and interpret biological data, preparing participants for careers in
                            research, healthcare, and biotechnology.</p>

                        <div class="unique-features text-center mt-5">
                            <h2 class="entity-title" style="color:#3a94c0;">Program Highlights</h2>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="feature-icon"><i class="fas fa-dna"></i></div>
                                    <h4>Sequence Analysis</h4>
                                    <p>Master DNA and protein sequence alignment techniques</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="feature-icon"><i class="fas fa-database"></i></div>
                                    <h4>Database Mining</h4>
                                    <p>Learn to navigate and extract data from biological databases</p>
                                </div>
                                <div class="col-md-4">
                                    <div class="feature-icon"><i class="fas fa-atom"></i></div>
                                    <h4>Molecular Modeling</h4>
                                    <p>Visualize and analyze protein structures in 3D</p>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <h3 class="entity-title"><i class="fas fa-graduation-cap bio-icon"></i>Learning Objectives
                            </h3>
                            <ul class="list-unstyled">
                                <li class="topic-item">Understand the core concepts and scope of bioinformatics</li>
                                <li class="topic-item">Gain proficiency in sequence analysis and database mining</li>
                                <li class="topic-item">Master tools like NCBI, BLAST, and Clustal Omega</li>
                                <li class="topic-item">Perform basic genomics and proteomics data analysis</li>
                                <li class="topic-item">Interpret results for biological research applications</li>
                            </ul>
                        </div>

                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="program-card">
                                    <h3 class="program-title"><i class="fas fa-laptop-code mr-2"></i>Course Modules</h3>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="module-card p-3 mb-3">
                                                <h4><i class="fas fa-info-circle bio-icon"></i>Introduction to
                                                    Bioinformatics</h4>
                                                <p>Definition, importance, and connections to genomics, proteomics, and
                                                    drug discovery</p>
                                            </div>
                                            <div class="module-card p-3 mb-3">
                                                <h4><i class="fas fa-database bio-icon"></i>Biological Databases</h4>
                                                <p>GenBank, EMBL, UniProt, KEGG, PDB and practical database navigation
                                                </p>
                                            </div>
                                            <div class="module-card p-3 mb-3">
                                                <h4><i class="fas fa-align-left bio-icon"></i>Sequence Analysis</h4>
                                                <p>DNA/protein sequences, alignment techniques (BLAST, Clustal Omega),
                                                    scoring matrices</p>
                                            </div>
                                            <div class="module-card p-3 mb-3">
                                                <h4><i class="fas fa-gene bio-icon"></i>Gene Prediction</h4>
                                                <p>ORF prediction tools and functional annotation (GO terms, COG, Pfam)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="module-card p-3 mb-3">
                                                <h4><i class="fas fa-project-diagram bio-icon"></i>Phylogenetic Analysis
                                                </h4>
                                                <p>Tree construction methods (Neighbor-Joining, Maximum Likelihood)</p>
                                            </div>
                                            <div class="module-card p-3 mb-3">
                                                <h4><i class="fas fa-atom bio-icon"></i>Structural Bioinformatics</h4>
                                                <p>Protein structure visualization, homology modeling (SWISS-MODEL),
                                                    docking</p>
                                            </div>
                                            <div class="module-card p-3 mb-3">
                                                <h4><i class="fas fa-chart-line bio-icon"></i>Genomics & Proteomics</h4>
                                                <p>Genome assembly overview, RNA-Seq basics, mass spectrometry data</p>
                                            </div>
                                            <div class="module-card p-3 mb-3">
                                                <h4><i class="fas fa-briefcase-medical bio-icon"></i>Applications</h4>
                                                <p>Drug discovery, personalized medicine, agriculture, metagenomics</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-5">
                            <h3 class="entity-title"><i class="fas fa-user-graduate bio-icon"></i>Who Should Enroll?
                            </h3>
                            <ul class="list-unstyled">
                                <li class="topic-item">Students and researchers in life sciences</li>
                                <li class="topic-item">Biotechnology and pharmaceutical professionals</li>
                                <li class="topic-item">Healthcare professionals interested in genomic data</li>
                                <li class="topic-item">Anyone pursuing computational biology careers</li>
                            </ul>
                        </div>

                        <div class="mt-5">
                            <h3 class="entity-title"><i class="fas fa-laptop bio-icon"></i>Practical Training</h3>
                            <ul class="list-unstyled">
                                <li class="topic-item">Hands-on exercises with real biological datasets</li>
                                <li class="topic-item">Access to industry-standard bioinformatics tools</li>
                                <li class="topic-item">Guidance from experienced bioinformaticians</li>
                                <li class="topic-item">Project-based learning approach</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="big section-footer text-center" style="margin-top: 0rem; margin-bottom: 2rem; max-width: 1110px;">
        <h2 class="section-title">Ready to master <span style="color: #3a94c0;">Bioinformatics</span> tools and
            techniques?</h2>
        <p class="mb-4">Join our training program and develop in-demand computational biology skills!</p>
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