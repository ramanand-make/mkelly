# AstroRaajeevG Store & Booking System

A premium E-Commerce platform and Astrology Booking System built for **Astrologer RaajeevG Store**. It features remedies, crystals, rudrakshas, gemstones, and custom spiritual products, along with a consultations scheduling workflow and an administration dashboard.

---

## 🚀 Key Features

### 🛒 E-Commerce Storefront
- **Dynamic Catalog**: Collection filters for bracelets, karungali, rudraksha, evil eye, pyrite, yantras, gemstones, and puja products.
- **Product Details**: Complete overview of properties, benefits, lab certification status, and photorealistic galleries.
- **AJAX Shopping Cart**: A slide-out drawer cart (`ajax_cart.php`) supporting real-time quantity controls, deletion, customized "Ratti" configuration for gemstones, and automated discount tracking.
- **Razorpay Checkout**: Seamless payment flow (`process_checkout.php` / `verify_payment.php`) integrated with Razorpay gateway.

### 📅 Consultation Booking System
- **Booking Modal** (`includes/booking-form.php`): Easy scheduling flow where clients enter details and pay for their consultations.
- **Validation & Processing** (`process_booking.php`): Secure client input parsing and database booking insertion.

### 🔐 Admin Control Panel (`/admin`)
- **Interactive Dashboard** (`admin/files/dashboard/dashboard.php`): Comprehensive stats, recent orders, and quick actions.
- **Product Management** (`admin/files/products/`): Full CRUD interface to add, edit, and delete products, folders, and images.
- **Category & Order Management**: Organize products into collections and monitor checkout completions.
- **Consultation Tracker**: View and manage customer bookings.

---

## 📁 Directory Structure

```text
mkelly/
├── admin/                     # Admin panel files & backend templates
│   ├── app/                   # App initializer (defines BASE_URL, helper methods)
│   ├── assets/                # Admin CSS, JS, SCSS and plugins
│   ├── config/                # Database connection configuration
│   ├── database/              # DB schemas and migrators
│   ├── files/                 # Admin CRUD controllers & pages
│   └── layout/                # Admin header, footer, sidebar and navigation scripts
├── assets/                    # Public frontend assets
│   ├── css/                   # Stylesheets (style.css, checkout.css, etc.)
│   ├── images/                # Site branding, icons and banners
│   ├── js/                    # jQuery, Swiper, and bootstrap bundles
│   └── sass/                  # Public SASS source files
├── includes/                  # Frontend reusable partials
│   ├── booking-form.php       # Astrology guidance booking modal
│   ├── checkout_model.php     # Cart checkout overlay form
│   ├── footer.php             # Script inclusions & footer layouts
│   ├── functions.php          # Core PHP helper utilities & query definitions
│   └── header.php             # Responsive navigation bar & drawer cart templates
├── vendor/                    # Composer packages (PHPMailer, PhpSpreadsheet, etc.)
├── index.php                  # Homepage storefront template
├── collections.php            # Category collections routing page
├── product.php                # Single product detailed information page
├── process_checkout.php       # Cart payment handler
├── verify_payment.php         # Payment response validator
├── .htaccess                  # Apache mod_rewrite rules (SEO friendly routing)
└── README.md                  # This documentation file
```

---

## ⚙️ Configuration & Setup

### 1. Database Configuration
Open `admin/config/database.php` and configure your credentials:
```php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "mkelly";
$port = 3306;
```

### 2. Base URL Auto-Detection
The project uses `<base href="<?= BASE_URL ?>">` in the `<head>` of user-facing pages to resolve assets. `BASE_URL` is automatically detected in `includes/functions.php` to handle hosting on both root domains (`astrologerraajeev.com`) and subfolders (`http://localhost/mkelly/`).

### 3. SEO-Friendly Routing
Apache rewriting resolves pretty paths:
- `/collection/rudraksha` ➔ `collections.php?category=rudraksha`
- `/product/five-mukhi` ➔ `product.php?slug=five-mukhi`

---

## 🛠️ Troubleshooting

### Asset Loading Errors (404 for style.css / js)
If style and script files are failing to load on localhost (resolving to `http://localhost/assets/css/style.css` instead of `http://localhost/mkelly/assets/css/style.css`), ensure that:
1. `BASE_URL` in `includes/functions.php` accurately detects the subdirectory (see code modifications).
2. The `<base href="<?= BASE_URL ?>">` tag is present and active inside the `<head>` of all page templates.
3. The `.htaccess` file is correctly named `.htaccess` (rather than `.htaccesssgdfg`) and Apache has `AllowOverride All` enabled.
# mkelly
