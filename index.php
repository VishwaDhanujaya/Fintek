<?php
// index.php
require_once 'data.php';
require_once 'header.php';
?>

<!-- Hero Section -->
<section class="relative bg-white overflow-hidden">
    <div class="absolute inset-0">
        <img src="assets/images/hero.jpg" alt="Modern Office" class="w-full h-full object-cover blur-load" data-src="assets/images/hero.jpg" onerror="this.src='https://images.unsplash.com/photo-1497366216548-37526070297c?auto=format&fit=crop&q=80'">
        <div class="absolute inset-0 bg-white/70 backdrop-blur-sm mix-blend-multiply"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-white via-white/80 to-transparent"></div>
    </div>
    
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-24 lg:py-32 flex items-center min-h-[600px]">
        <div class="max-w-2xl" data-aos="fade-right" data-aos-duration="1000">
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold text-gray-900 tracking-tight mb-6">
                Welcome to <span class="text-transparent bg-clip-text bg-gradient-to-r from-fintek-blue to-fintek-blue-light">Fintek</span>
            </h1>
            <p class="text-lg sm:text-xl text-gray-600 mb-8 font-light leading-relaxed">
                Fintek Managed Solutions (Pvt) Ltd, a fully incorporated subsidiary of Gestetner of Ceylon PLC, has been appointed the authorized distributor for Sharp Office Automation products and solutions, NCR banking products and solutions, Scancoin cash counter products and solutions and Vivitek projectors in Sri Lanka. Fintek complements Gestetner role as a market leader in Sri Lanka’s office, banks automation space, and will introduce other business lines in the near future.
            </p>
            <div class="flex flex-col sm:flex-row gap-4">
                <a href="products.php" class="inline-flex justify-center items-center px-8 py-3.5 border border-transparent text-base font-medium rounded-lg shadow-md text-white bg-fintek-blue hover:bg-fintek-blue-light transition-all duration-300 transform hover:-translate-y-1">
                    Explore Catalog
                </a>
                <a href="contact.php" class="inline-flex justify-center items-center px-8 py-3.5 border border-gray-300 text-base font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-all duration-300">
                    Request a Consultation
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Categories Section -->
<section class="py-20 bg-gray-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-900 mb-4">Portfolio</h2>
            <p class="text-gray-600">Authorized distributor of Sharp, Scancoin, Vivitek and NCR products in Sri Lanka.</p>
        </div>
        
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php 
            $delay = 0;
            foreach($categories as $category): ?>
                <div class="bg-white rounded-xl p-8 shadow-sm hover:shadow-md transition-shadow border border-gray-100 flex flex-col items-center text-center cursor-pointer group" onclick="window.location.href='products.php?category=<?= $category['id'] ?>'" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                    <div class="w-16 h-16 rounded-full bg-blue-50 flex items-center justify-center mb-6 group-hover:bg-fintek-blue transition-colors duration-300">
                        <!-- Placeholder icon, styling indicates the icon area -->
                        <div class="w-8 h-8 text-fintek-blue group-hover:text-white transition-colors">
                             <svg fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                            </svg>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2"><?= htmlspecialchars($category['name']) ?></h3>
                    <p class="text-sm text-gray-500"><?= htmlspecialchars($category['description']) ?></p>
                </div>
            <?php 
                $delay += 100;
            endforeach; ?>
        </div>
    </div>
</section>

<!-- What's New Section -->
<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-end mb-12" data-aos="fade-up">
            <div>
                <h2 class="text-3xl font-bold text-gray-900 mb-2">Featured Products</h2>
                <p class="text-gray-600">The latest additions to our premium collection.</p>
            </div>
            <a href="products.php" class="hidden sm:inline-flex text-fintek-blue font-medium hover:text-fintek-blue-light transition-colors items-center">
                View All <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <?php 
            // Display first 4 products
            $featured = array_slice($products, 0, 4);
            $delay = 0;
            foreach($featured as $product): ?>
                <div class="bg-white rounded-2xl overflow-hidden shadow-sm border border-gray-100 hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 flex flex-col group" data-aos="fade-up" data-aos-delay="<?= $delay ?>">
                    <div class="relative h-48 bg-gray-50 p-6 flex items-center justify-center overflow-hidden">
                        <?php if(isset($product['is_new']) && $product['is_new']): ?>
                            <span class="absolute top-4 left-4 bg-fintek-blue text-white text-xs font-bold px-3 py-1 rounded-full z-10">NEW</span>
                        <?php endif; ?>
                        <!-- Image with blur-to-focus class -->
                        <img src="<?= htmlspecialchars($product['image']) ?>" alt="<?= htmlspecialchars($product['name']) ?>" class="max-h-full object-contain blur-load group-hover:scale-110 transition-transform duration-500" data-src="<?= htmlspecialchars($product['image']) ?>" onerror="this.src='https://placehold.co/400x300/f8fafc/94a3b8?text=Product+Image'">
                    </div>
                    <div class="p-6 flex-grow flex flex-col">
                        <div class="text-xs text-gray-500 mb-2 uppercase tracking-wider font-semibold"><?= htmlspecialchars($categories[$product['category']]['name'] ?? 'General') ?></div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2"><?= htmlspecialchars($product['name']) ?></h3>
                        <p class="text-sm text-gray-600 mb-6 flex-grow line-clamp-2"><?= htmlspecialchars($product['short_desc']) ?></p>
                        
                        <div class="mt-auto flex items-center justify-between">
                            <span class="text-fintek-blue font-semibold"><?= htmlspecialchars($product['price']) ?></span>
                            <a href="product-detail.php?id=<?= urlencode($product['id']) ?>" class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center text-gray-400 group-hover:bg-fintek-blue group-hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            <?php 
                $delay += 100;
            endforeach; ?>
        </div>
        <div class="mt-8 text-center sm:hidden">
            <a href="products.php" class="inline-flex text-fintek-blue font-medium hover:text-fintek-blue-light transition-colors items-center">
                View All Products <svg class="ml-1 w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>

<?php require_once 'footer.php'; ?>
