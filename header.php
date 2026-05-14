<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fintek - Office Automation</title>
    <!-- Tailwind CSS (CDN for prototype) -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'fintek-blue': '#0056b3',
                        'fintek-blue-light': '#3380cc',
                    },
                    fontFamily: {
                        sans: ['Inter', 'Roboto', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Tailwind Input (for @apply) -->
    <link href="assets/css/input.css" rel="stylesheet" type="text/tailwindcss">
    <!-- Custom Styles -->
    <link href="assets/css/style.css" rel="stylesheet">
    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
</head>

<body class="bg-gray-50 text-gray-800 antialiased overflow-x-hidden flex flex-col min-h-screen">


    <header class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">

                <!-- Site Logo / Brand -->
                <div class="flex-shrink-0 flex items-center cursor-pointer" onclick="window.location.href='index.php'">
                    <img src="assets/images/fintek-logo.png" alt="Fintek Logo" class="h-12 w-auto object-contain">
                </div>


                <!-- Desktop Navigation Links -->
                <nav class="hidden md:flex space-x-8">
                    <a href="index.php" class="text-gray-600 hover:text-fintek-blue nav-link font-medium">Home</a>
                    <a href="about.php" class="text-gray-600 hover:text-fintek-blue nav-link font-medium">About Us</a>
                    <a href="products.php"
                        class="text-gray-600 hover:text-fintek-blue nav-link font-medium">Products</a>
                    <a href="contact.php" class="text-gray-600 hover:text-fintek-blue nav-link font-medium">Contact
                        Us</a>
                </nav>


                <!-- Search Icon and Mobile Menu Toggle (Visible on smaller screens) -->
                <div class="flex items-center space-x-4">
                    <button id="searchBtn" class="text-gray-500 hover:text-fintek-blue transition-colors"
                        aria-label="Search">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </button>
                    <div id="searchContainer"
                        class="hidden absolute top-20 right-4 sm:right-8 bg-white p-4 shadow-lg rounded-lg border border-gray-100">
                        <input type="text" placeholder="Search products..."
                            class="border border-gray-300 rounded-md px-4 py-2 focus:outline-none focus:ring-2 focus:ring-fintek-blue-light focus:border-transparent">
                    </div>

                    <button class="md:hidden text-gray-500 hover:text-fintek-blue" id="mobileMenuBtn">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>


        <!-- Mobile Navigation Menu (Toggled via JS) -->
        <div class="md:hidden hidden bg-white border-t border-gray-100" id="mobileMenu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3 shadow-inner">
                <a href="index.php"
                    class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-fintek-blue hover:bg-gray-50 rounded-md">Home</a>
                <a href="about.php"
                    class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-fintek-blue hover:bg-gray-50 rounded-md">About
                    Us</a>
                <a href="products.php"
                    class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-fintek-blue hover:bg-gray-50 rounded-md">Products</a>
                <a href="contact.php"
                    class="block px-3 py-2 text-base font-medium text-gray-700 hover:text-fintek-blue hover:bg-gray-50 rounded-md">Contact
                    Us</a>
            </div>
        </div>
    </header>
    <main class="flex-grow">