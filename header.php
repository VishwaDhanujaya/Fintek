<?php
require_once 'config.php';
$currentPage = basename($_SERVER['PHP_SELF']);
require_once 'includes/ProductCatalog.php';
$catalog = new ProductCatalog();
$allProducts = $catalog->getAllProducts();
$searchData = [];
foreach ($allProducts as $headerProduct) {
    $searchData[] = [
        'id' => $headerProduct->getId(),
        'name' => $headerProduct->getName(),
        'tags' => $headerProduct->getTags(),
        'desc' => $headerProduct->getShortDesc(),
        'image' => $headerProduct->getImage(),
        'url' => BASE_URL . 'product/' . $headerProduct->getId()
    ];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="<?= BASE_URL ?>assets/images/fintek-logo.png">
    <meta name="description" content="Fintek Managed Solutions - Authorized distributor for Sharp, NCR, Scancoin, and Vivitek in Sri Lanka. Providing world-class office and banking automation solutions.">
    <title>Fintek - <?= ucfirst(str_replace(['.php', '-'], ['', ' '], $currentPage === 'index.php' ? 'Office Automation' : $currentPage)) ?></title>
    <!-- Tailwind CSS (Production-ready) -->
    <link href="<?= BASE_URL ?>assets/css/main.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Custom Styles -->
    <link href="<?= BASE_URL ?>assets/css/style.css" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-gray-50 text-gray-800 antialiased overflow-x-hidden flex flex-col min-h-screen">


    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <!-- Site Logo / Brand -->
                <div class="flex-shrink-0 flex items-center cursor-pointer" onclick="window.location.href='<?= BASE_URL ?>'">
                    <img src="<?= BASE_URL ?>assets/images/fintek-logo.png" alt="Fintek Logo" class="h-12 w-auto object-contain">
                </div>


                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex space-x-8">
                    <a href="<?= BASE_URL ?>"
                        class="nav-link font-medium <?= $currentPage == 'index.php' ? 'active text-fintek-blue' : 'text-gray-600 hover:text-fintek-blue' ?>">Home</a>
                    <a href="<?= BASE_URL ?>about-us"
                        class="nav-link font-medium <?= $currentPage == 'about.php' ? 'active text-fintek-blue' : 'text-gray-600 hover:text-fintek-blue' ?>">About
                        Us</a>
                    <a href="<?= BASE_URL ?>products"
                        class="nav-link font-medium <?= ($currentPage == 'products.php' || $currentPage == 'product-detail.php') ? 'active text-fintek-blue' : 'text-gray-600 hover:text-fintek-blue' ?>">Products</a>
                    <a href="<?= BASE_URL ?>contact-us"
                        class="nav-link font-medium <?= $currentPage == 'contact.php' ? 'active text-fintek-blue' : 'text-gray-600 hover:text-fintek-blue' ?>">Contact
                        Us</a>
                </nav>


                <!-- Search and Mobile Controls -->
                <div class="flex items-center space-x-2 sm:space-x-4">
                    <div id="searchContainer" class="relative flex items-center">
                        <input type="text" id="searchInput" placeholder="Search products..."
                            class="search-input py-2 px-4 rounded-full bg-gray-100 border-none focus:ring-2 focus:ring-fintek-blue/20 text-sm transition-all duration-300 w-0 opacity-0 invisible outline-none">
                        <button id="searchBtn" class="p-2 text-gray-500 hover:text-fintek-blue transition-colors focus:outline-none"
                            aria-label="Search">
                            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                            </svg>
                        </button>
                        <!-- Real-time results dropdown -->
                        <div id="searchResults" class="absolute top-full right-0 mt-2 w-72 bg-white rounded-xl shadow-2xl border border-gray-100 overflow-hidden opacity-0 invisible translate-y-2 transition-all duration-300 z-[70]">
                        </div>
                    </div>

                    <button class="md:hidden p-2 text-gray-500 hover:text-fintek-blue focus:outline-none" id="mobileMenuBtn">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

    <script>
        const BASE_URL = '<?= BASE_URL ?>';
        const SEARCH_DATA = <?= json_encode($searchData) ?>;
    </script>


        <!-- Mobile Navigation Menu (Toggled via JS) -->
        <div class="md:hidden bg-white border-t border-gray-100" id="mobileMenu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 shadow-inner">
                <a href="<?= BASE_URL ?>"
                    class="block px-3 py-2 text-base font-medium rounded-md <?= $currentPage == 'index.php' ? 'bg-blue-50 text-fintek-blue' : 'text-gray-700 hover:text-fintek-blue hover:bg-gray-50' ?>">Home</a>
                <a href="<?= BASE_URL ?>about-us"
                    class="block px-3 py-2 text-base font-medium rounded-md <?= $currentPage == 'about.php' ? 'bg-blue-50 text-fintek-blue' : 'text-gray-700 hover:text-fintek-blue hover:bg-gray-50' ?>">About
                    Us</a>
                <a href="<?= BASE_URL ?>products"
                    class="block px-3 py-2 text-base font-medium rounded-md <?= ($currentPage == 'products.php' || $currentPage == 'product-detail.php') ? 'bg-blue-50 text-fintek-blue' : 'text-gray-700 hover:text-fintek-blue hover:bg-gray-50' ?>">Products</a>
                <a href="<?= BASE_URL ?>contact-us"
                    class="block px-3 py-2 text-base font-medium rounded-md <?= $currentPage == 'contact.php' ? 'bg-blue-50 text-fintek-blue' : 'text-gray-700 hover:text-fintek-blue hover:bg-gray-50' ?>">Contact
                    Us</a>
            </div>
        </div>
    </header>
    <main class="flex-grow">