<?php

// Initialize catalog and retrieve data for the homepage
require_once 'includes/ProductCatalog.php';

$catalog = new ProductCatalog();
$categories = $catalog->getAllCategories(); // Populate the Portfolio section
$featured = $catalog->getFeaturedProducts(4); // Limit to 4 featured products for the grid

require_once 'header.php';
?>


<!-- Section 1: Hero Slider -->
<section class="hero-section-wrapper relative w-full overflow-hidden bg-gray-900 group">
    <div id="heroSlider" class="hero-slider-main relative h-[350px] sm:h-[500px] lg:h-[650px]">
        <!-- Slide 1 -->
        <div class="hero-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out z-0">
            <picture>
                <source srcset="<?= BASE_URL ?>assets/images/m-web-slide-01.jpg" media="(max-width: 639px)">
                <img src="<?= BASE_URL ?>assets/images/web-slide-01.jpg" alt="Fintek Solutions 1" class="w-full h-full object-cover">
            </picture>
        </div>
        <!-- Slide 2 -->
        <div class="hero-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out z-0">
            <picture>
                <source srcset="<?= BASE_URL ?>assets/images/m-web-slide-02.jpg" media="(max-width: 639px)">
                <img src="<?= BASE_URL ?>assets/images/web-slide-02.jpg" alt="Fintek Solutions 2" class="w-full h-full object-cover">
            </picture>
            <div class="absolute inset-0 bg-black/5"></div>
        </div>
        <!-- Slide 3 -->
        <div class="hero-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out z-0">
            <picture>
                <source srcset="<?= BASE_URL ?>assets/images/m-web-slide-03.jpg" media="(max-width: 639px)">
                <img src="<?= BASE_URL ?>assets/images/web-slide-03.jpg" alt="Fintek Solutions 3" class="w-full h-full object-cover">
            </picture>
            <div class="absolute inset-0 bg-black/5"></div>
        </div>
    </div>

    <!-- Slider Navigation Arrows -->
    <button id="prevSlide"
        class="absolute left-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 text-white p-3 rounded-full backdrop-blur-md transition-all opacity-0 group-hover:opacity-100 hidden sm:block z-10"
        aria-label="Previous Slide">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
        </svg>
    </button>
    <button id="nextSlide"
        class="absolute right-4 top-1/2 -translate-y-1/2 bg-white/20 hover:bg-white/40 text-white p-3 rounded-full backdrop-blur-md transition-all opacity-0 group-hover:opacity-100 hidden sm:block z-10"
        aria-label="Next Slide">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
        </svg>
    </button>

    <!-- Pagination Dots -->
    <div class="hero-pagination-container absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-3 z-10">
        <button class="slider-dot w-2.5 h-2.5 rounded-full bg-white/40 hover:bg-white transition-all"
            data-index="0"></button>
        <button class="slider-dot w-2.5 h-2.5 rounded-full bg-white/40 hover:bg-white transition-all"
            data-index="1"></button>
        <button class="slider-dot w-2.5 h-2.5 rounded-full bg-white/40 hover:bg-white transition-all"
            data-index="2"></button>
    </div>
</section>


<!-- Section 2: Welcome Introduction -->
<section class="py-24 bg-white border-b border-gray-100">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 text-center" data-aos="fade-up">
        <h2 class="text-2xl sm:text-4xl font-bold text-gray-900 mb-8 tracking-tight">
            Welcome to <span class="text-fintek-blue">Fintek</span>
        </h2>
        <p class="text-base sm:text-lg text-gray-600 leading-relaxed font-light mb-10">
            Fintek Managed Solutions (Pvt) Ltd, a fully incorporated subsidiary of Gestetner of Ceylon PLC, has been
            appointed the authorized distributor for Sharp Office Automation products and solutions, NCR banking
            products and solutions, Scancoin cash counter products and solutions and Vivitek projectors in Sri
            Lanka. Fintek complements Gestetner role as a market leader in Sri Lanka's office, banks automation
            space, and will introduce other business lines in the near future.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="<?= BASE_URL ?>products"
                class="btn-primary px-8 !py-3.5 shadow-md transform hover:-translate-y-1 text-base">
                Explore Catalog
            </a>
            <a href="<?= BASE_URL ?>contact-us"
                class="btn-secondary px-8 !py-3.5 text-base">
                Request a Consultation
            </a>
        </div>
    </div>
</section>


<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Portfolio</h2>
            <p class="text-gray-600">Authorized distributor of Sharp, Scancoin, Vivitek and NCR products in Sri Lanka.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-8">
            <?php
            // Stagger animation delays for portfolio cards
            $delay = 0;
            foreach ($categories as $category): ?>
                <div class="project-card flex flex-col items-center text-center cursor-pointer group"
                    onclick="window.location.href='<?= BASE_URL ?>products?category=<?= $category->getId() ?>'" data-aos="fade-up"
                    data-aos-delay="<?= $delay ?>">
                    <div
                        class="w-16 h-16 rounded-full bg-blue-50 flex items-center justify-center mb-6 group-hover:bg-fintek-blue transition-colors duration-300">
                        <div class="w-8 h-8 text-fintek-blue group-hover:text-white transition-colors">
                            <i data-lucide="<?= $category->getIcon() ?>" class="w-8 h-8"></i>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2"><?= htmlspecialchars($category->getName()) ?></h3>
                    <p class="text-sm text-gray-500"><?= htmlspecialchars($category->getDescription()) ?></p>
                </div>
                <?php
                $delay += 100;
            endforeach; ?>
        </div>
    </div>
</section>


<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-12" data-aos="fade-up">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Featured Products</h2>
                <p class="text-gray-600">The latest additions to our premium collection.</p>
            </div>
            <a href="<?= BASE_URL ?>products"
                class="hidden sm:inline-flex text-fintek-blue font-medium hover:text-fintek-blue-light transition-colors items-center">
                View All <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php
            // Stagger animation delays for featured product cards
            $delay = 0;
            foreach ($featured as $product):
                require 'includes/product-card.php';
                $delay += 100;
            endforeach; ?>
        </div>

        <div class="mt-8 text-center sm:hidden">
            <a href="<?= BASE_URL ?>products"
                class="inline-flex text-fintek-blue font-medium hover:text-fintek-blue-light transition-colors items-center">
                View All Products <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>
</section>


<section class="py-20 bg-gray-50 border-t border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-900 mb-4 tracking-tight">Our Trusted Brands</h2>
            <div class="h-1 w-20 bg-fintek-blue mx-auto rounded-full opacity-20"></div>
        </div>

        <?php require 'includes/brands.php'; ?>
    </div>
</section>

<?php
// Load global footer and JavaScript assets
require_once 'footer.php';
?>

<script>
    // Initialize Lucide icons
    lucide.createIcons();
</script>