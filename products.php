<?php

require_once 'includes/ProductCatalog.php';

$catalog = new ProductCatalog(); // Initialize product catalog wrapper
$categories = $catalog->getAllCategories(); // Fetch all categories for the sidebar filter
$allProducts = $catalog->getAllProducts(); // Fetch all products to populate the main grid
$activeCategory = isset($_GET['category']) ? $_GET['category'] : 'all'; // Determine active category from URL, default to 'all'

require_once 'header.php';
?>

<div class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Product Catalog</h1>
        <p class="text-gray-500">Browse our comprehensive collection of advanced office solutions.</p>
    </div>
</div>

<section class="py-12 bg-gray-50 flex-grow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row gap-8">


            <div class="w-full md:w-1/4">
                <div class="bg-white rounded-xl shadow-sm border border-gray-100 p-6 sticky top-28">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 pb-2 border-b border-gray-100">Categories</h3>
                    <ul class="space-y-2" id="categoryFilter">
                        <li>
                            <button data-filter="all"
                                class="filter-btn w-full text-left px-3 py-2 rounded-md transition-colors <?= $activeCategory === 'all' ? 'bg-fintek-blue text-white font-medium' : 'text-gray-600 hover:bg-blue-50 hover:text-fintek-blue' ?>">
                                All Products
                            </button>
                        </li>
                        <?php foreach ($categories as $category): ?>
                            <li>
                                <button data-filter="<?= $category->getId() ?>"
                                    class="filter-btn w-full text-left px-3 py-2 rounded-md transition-colors <?= $activeCategory === $category->getId() ? 'bg-fintek-blue text-white font-medium' : 'text-gray-600 hover:bg-blue-50 hover:text-fintek-blue' ?>">
                                    <?= htmlspecialchars($category->getName()) ?>
                                </button>
                            </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>


            <div class="w-full md:w-3/4">
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6" id="productGrid">
                    <?php foreach ($allProducts as $product):
                        // Retrieve the category to display its name inside the product card
                        $cat = $catalog->getCategoryById($product->getCategoryId());
                        ?>
                        <div class="product-item project-card !p-0 overflow-hidden flex flex-col group"
                            data-category="<?= htmlspecialchars($product->getCategoryId()) ?>">
                            <div class="relative h-48 bg-gray-50 p-6 flex items-center justify-center overflow-hidden">
                                <img src="<?= htmlspecialchars($product->getImage()) ?>"
                                    alt="<?= htmlspecialchars($product->getName()) ?>"
                                    class="max-h-full object-contain blur-load group-hover:scale-105 transition-transform duration-500"
                                    data-src="<?= htmlspecialchars($product->getImage()) ?>"
                                    onerror="this.src='https://placehold.co/400x300/f8fafc/94a3b8?text=Image'">
                            </div>
                            <div class="p-6 flex-grow flex flex-col">
                                <div class="text-xs text-gray-400 mb-1 uppercase tracking-wider font-semibold">
                                    <?= htmlspecialchars($cat ? $cat->getName() : 'General') ?>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-2">
                                    <?= htmlspecialchars($product->getName()) ?>
                                </h3>
                                <p class="text-sm text-gray-500 mb-4 flex-grow line-clamp-2">
                                    <?= htmlspecialchars($product->getShortDesc()) ?>
                                </p>

                                <a href="product-detail.php?id=<?= urlencode($product->getId()) ?>"
                                    class="mt-auto w-full inline-flex justify-center items-center px-4 py-2 border border-gray-200 rounded-md text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 hover:text-fintek-blue transition-colors">
                                    View Details
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>


                <div id="emptyState" class="hidden text-center py-16">
                    <svg class="mx-auto h-12 w-12 text-gray-300 mb-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-lg font-medium text-gray-900">No products found</h3>
                    <p class="mt-1 text-gray-500">Try selecting a different category.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    // Pass the initial category from PHP to JavaScript to apply the filter on page load
    window.initialCategory = "<?= htmlspecialchars($activeCategory) ?>";
</script>

<?php
// Load global footer and JavaScript assets
require_once 'footer.php';
?>