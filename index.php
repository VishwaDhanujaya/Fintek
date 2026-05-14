<?php

// Initialize catalog and retrieve data for the homepage
require_once 'includes/ProductCatalog.php';

$catalog = new ProductCatalog();
$categories = $catalog->getAllCategories(); // Populate the Portfolio section
$featured = $catalog->getFeaturedProducts(4); // Limit to 4 featured products for the grid

require_once 'header.php';
?>


<!-- Section 1: Hero Slider -->
<section class="relative w-full overflow-hidden bg-gray-900 group">
    <div id="heroSlider" class="relative h-[350px] sm:h-[500px] lg:h-[650px]">
        <!-- Slide 1 -->
        <div class="hero-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out z-0">
            <img src="assets/images/web-slide-01.jpg" alt="Fintek Solutions 1" class="w-full h-full object-cover">
        </div>
        <!-- Slide 2 -->
        <div class="hero-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out z-0">
            <img src="assets/images/web-slide-02.jpg" alt="Fintek Solutions 2" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/5"></div>
        </div>
        <!-- Slide 3 -->
        <div class="hero-slide absolute inset-0 opacity-0 transition-opacity duration-1000 ease-in-out z-0">
            <img src="assets/images/web-slide-03.jpg" alt="Fintek Solutions 3" class="w-full h-full object-cover">
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
    <div class="absolute bottom-6 left-1/2 -translate-x-1/2 flex space-x-3 z-10">
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
        <h2 class="text-3xl sm:text-4xl font-bold text-gray-900 mb-8 tracking-tight">
            Welcome to <span class="text-fintek-blue">Fintek</span>
        </h2>
        <p class="text-lg text-gray-600 leading-relaxed font-light mb-10">
            Fintek Managed Solutions (Pvt) Ltd, a fully incorporated subsidiary of Gestetner of Ceylon PLC, has been
            appointed the authorized distributor for Sharp Office Automation products and solutions, NCR banking
            products and solutions, Scancoin cash counter products and solutions and Vivitek projectors in Sri
            Lanka. Fintek complements Gestetner role as a market leader in Sri Lanka's office, banks automation
            space, and will introduce other business lines in the near future.
        </p>
        <div class="flex flex-col sm:flex-row justify-center gap-4">
            <a href="products.php"
                class="inline-flex justify-center items-center px-8 py-3.5 border border-transparent text-base font-medium rounded-lg shadow-md text-white bg-fintek-blue hover:bg-fintek-blue-light transition-all duration-300 transform hover:-translate-y-1">
                Explore Catalog
            </a>
            <a href="contact.php"
                class="inline-flex justify-center items-center px-8 py-3.5 border border-gray-300 text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-all duration-300">
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
                    onclick="window.location.href='products.php?category=<?= $category->getId() ?>'" data-aos="fade-up"
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
            <a href="products.php"
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
                // Retrieve the category to display its name on the card
                $cat = $catalog->getCategoryById($product->getCategoryId());
                ?>
                <div onclick="window.location.href='product-detail.php?id=<?= urlencode($product->getId()) ?>'"
                    class="project-card !p-0 overflow-hidden transform hover:-translate-y-2 flex flex-col group border border-gray-100 hover:border-fintek-blue/30 hover:shadow-lg transition-all duration-300 cursor-pointer"
                    data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                    <div class="relative h-48 bg-gray-50 p-6 flex items-center justify-center overflow-hidden">
                        <?php if ($product->isNew()): ?>
                            <span
                                class="absolute top-4 left-4 bg-fintek-blue text-white text-xs font-bold px-3 py-1 rounded-full z-10">NEW</span>
                        <?php endif; ?>
                        <img src="<?= htmlspecialchars($product->getImage()) ?>"
                            alt="<?= htmlspecialchars($product->getName()) ?>"
                            class="max-h-full object-contain blur-load group-hover:scale-110 transition-transform duration-500"
                            data-src="<?= htmlspecialchars($product->getImage()) ?>"
                            onerror="this.src='https://placehold.co/400x300/f8fafc/94a3b8?text=Product+Image'">
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <div class="text-xs text-gray-500 mb-2 uppercase tracking-wider font-semibold">
                            <?= htmlspecialchars($cat ? $cat->getName() : 'General') ?>
                        </div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-fintek-blue transition-colors">
                            <?= htmlspecialchars($product->getName()) ?></h3>
                        <p class="text-sm text-gray-600 mb-6 flex-grow line-clamp-2">
                            <?= htmlspecialchars($product->getShortDesc()) ?>
                        </p>

                        <div class="mt-auto flex items-center justify-between">
                            <span
                                class="text-fintek-blue font-semibold"><?= htmlspecialchars($product->getPrice()) ?></span>
                            <a href="contact.php?product=<?= urlencode($product->getName()) ?>"
                                onclick="event.stopPropagation();"
                                class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-fintek-blue hover:bg-fintek-blue-light transition-colors shadow-sm">
                                Get Quote
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                $delay += 100;
            endforeach; ?>
        </div>

        <div class="mt-8 text-center sm:hidden">
            <a href="products.php"
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

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-8 items-center">
            <?php
            $brands = [
                ['name' => 'Sharp', 'logo' => 'assets/images/brand-sharp.jpg', 'link' => 'https://global.sharp/'],
                ['name' => 'Vivitek', 'logo' => 'assets/images/brand-vivitec.jpg', 'link' => 'https://vivitek.eu/'],
                ['name' => 'Scan Coin', 'logo' => 'assets/images/brand-scancoin.jpg', 'link' => 'https://paycomplete.com/scancoin/'],
                ['name' => 'MIB', 'logo' => 'assets/images/brand-mib.jpg', 'link' => 'https://hyundaimib.com/'],
                ['name' => 'Doculine', 'logo' => 'assets/images/brand-doculine.jpg', 'link' => 'https://doculine.eu/'],
                ['name' => 'Posmart', 'logo' => 'assets/images/brand-posmart.jpg', 'link' => 'https://posmart.lk/'],
            ];
            foreach ($brands as $brand): ?>
                <a href="<?= $brand['link'] ?>" target="_blank" rel="noopener noreferrer"
                    class="flex items-center justify-center p-8 bg-gray-50 rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
                    <img src="<?= $brand['logo'] ?>" alt="<?= $brand['name'] ?>"
                        class="max-h-12 w-auto object-contain">
                </a>
            <?php endforeach; ?>
        </div>
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