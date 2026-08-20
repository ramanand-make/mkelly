<style>
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
</style>

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
        <nav class="navbar">
            <a class="nav-link" href="/"><img src="/assets/images/svg/logo.png" alt="Mkelly" /></a>
            <button class="navbar-toggler" type="button">
                <i class="fas fa-bars nav-show"></i>
                <i class="fas fa-times nav-hide"></i>
            </button>
            <div class="navbar-collapse">
                <div class="container">
                    <ul class="navbar-nav custom-padding">
                        <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="/about-us">About Us</a></li>
                        <li class="nav-item"><a class="nav-link" href="/our-products">Our Products</a></li>
                        <li class="nav-item"><a class="nav-link" href="/training-and-internship">Training & Internship</a></li>
                        <li class="nav-item"><a class="nav-link" href="/faq">FAQ</a></li>
                    </ul>
                    <div class="navbar-extra">
                        <ul class="actions-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-show-block="cart" aria-label="Open Cart Sidebar" id="cart-open-button">
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
<div class="cart-sidebar collapse" data-block="cart" data-show-block-class="animation-scale-top-right" data-hide-block-class="animation-unscale-top-right" aria-modal="true" role="dialog" aria-labelledby="cartTitle" aria-hidden="true">
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
          <span class="currency">₹</span>${item.price.toFixed()} / unit
          <span class="entity-quantity">&nbsp;x&nbsp;${item.quantity}</span>
        </div>
        <div class="entity-total">Total: ₹${item.total.toFixed()}</div>
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
                  <span class="list-item-value">₹${data.subtotal.toFixed()}</span>
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