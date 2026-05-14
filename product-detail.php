<?php

require_once 'includes/ProductCatalog.php';

$catalog   = new ProductCatalog(); // Initialize product catalog wrapper
$productId = isset($_GET['id']) ? $_GET['id'] : null; // Retrieve the product ID from the query string
$product   = $productId ? $catalog->getProductById($productId) : null; // Fetch the specific product details

// Redirect to catalog if product not found
if (!$product) {
    header('Location: products.php');
    exit;
}

$category = $catalog->getCategoryById($product->getCategoryId()); // Fetch the category for the breadcrumb navigation

require_once 'header.php';
?>

<div class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-4">
        <nav class="flex text-sm text-gray-500 font-medium">
            <a href="index.php" class="hover:text-fintek-blue transition-colors">Home</a>
            <span class="mx-2">/</span>
            <a href="products.php?category=<?= urlencode($product->getCategoryId()) ?>"
               class="hover:text-fintek-blue transition-colors uppercase">
                <?= htmlspecialchars($category ? $category->getName() : 'Products') ?>
            </a>
            <span class="mx-2">/</span>
            <span class="text-gray-900"><?= htmlspecialchars($product->getName()) ?></span>
        </nav>
    </div>
</div>

<section class="py-12 bg-gray-50 flex-grow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            <div class="flex flex-col lg:flex-row">


                <div class="w-full lg:w-2/5 p-8 lg:p-12 border-b lg:border-b-0 lg:border-r border-gray-100">
                    <div class="sticky top-28">
                        <?php if ($product->isNew()): ?>
                            <span class="inline-block bg-fintek-blue text-white text-xs font-bold px-3 py-1 rounded-full mb-6">NEW PRODUCT</span>
                        <?php endif; ?>

                        <div class="bg-gray-50 rounded-xl p-8 mb-8 flex justify-center items-center">
                            <img src="<?= htmlspecialchars($product->getImage()) ?>"
                                 alt="<?= htmlspecialchars($product->getName()) ?>"
                                 class="w-full max-w-sm object-contain blur-load"
                                 data-src="<?= htmlspecialchars($product->getImage()) ?>"
                                 onerror="this.src='https://placehold.co/600x600/f8fafc/94a3b8?text=Product'">
                        </div>

                        <h1 class="text-3xl font-bold text-gray-900 mb-4"><?= htmlspecialchars($product->getName()) ?></h1>
                        <p class="text-gray-600 mb-8 leading-relaxed"><?= htmlspecialchars($product->getShortDesc()) ?></p>

                        <div class="flex flex-col space-y-4">
                            <a href="contact.php?product=<?= urlencode($product->getName()) ?>"
                               class="w-full flex justify-center items-center px-8 py-4 border border-transparent text-lg font-medium rounded-lg text-white bg-fintek-blue hover:bg-fintek-blue-light transition-colors shadow-sm">
                                Get a Quote
                            </a>
                            <button class="w-full flex justify-center items-center px-8 py-4 border border-gray-300 text-lg font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                Download Brochure
                            </button>
                        </div>
                    </div>
                </div>


                <div class="w-full lg:w-3/5 p-8 lg:p-12">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8">Technical Specifications</h2>

                    <?php if ($product->hasSpecs()): ?>


                        <div class="flex overflow-x-auto border-b border-gray-200 mb-8 hide-scrollbar">
                            <?php
                            $first = true; // Track the first tab to set it as active by default
                            foreach ($product->getSpecGroupNames() as $groupName):
                                $tabId = $product->getTabId($groupName);
                            ?>
                                <button class="spec-tab-btn whitespace-nowrap py-4 px-6 font-medium text-sm border-b-2 transition-colors <?= $first ? 'border-fintek-blue text-fintek-blue' : 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300' ?>"
                                        data-target="<?= $tabId ?>">
                                    <?= htmlspecialchars($groupName) ?>
                                </button>
                            <?php
                                $first = false;
                            endforeach;
                            ?>
                        </div>


                        <div class="spec-tab-content-container">
                            <?php
                            $first = true; // Track the first content pane to display it by default
                            foreach ($product->getSpecs() as $groupName => $specData):
                                $tabId = $product->getTabId($groupName);
                            ?>
                                <div id="<?= $tabId ?>" class="spec-pane <?= $first ? 'block' : 'hidden' ?> animate-fadeIn">
                                    <table class="w-full text-sm text-left">
                                        <tbody class="divide-y divide-gray-100">
                                            <?php foreach ($specData as $key => $value): ?>
                                            <tr class="hover:bg-gray-50/50 transition-colors">
                                                <th scope="row" class="px-4 py-4 font-medium text-gray-900 w-1/3 align-top bg-gray-50/30 rounded-l-lg">
                                                    <?= htmlspecialchars($key) ?>
                                                </th>
                                                <td class="px-4 py-4 text-gray-600 align-top rounded-r-lg">
                                                    <?= nl2br(htmlspecialchars($value)) ?>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            <?php
                                $first = false;
                            endforeach;
                            ?>
                        </div>

                    <?php else: ?>
                        <div class="bg-gray-50 p-6 rounded-lg text-gray-500 text-center">
                            No detailed specifications available for this product.
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</section>

<?php 
// Load global footer and JavaScript assets
require_once 'footer.php'; 
?>
