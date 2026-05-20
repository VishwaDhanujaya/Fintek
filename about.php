<?php

// Load global header, navigation, and CSS assets
require_once 'header.php';
?>


<section class="relative bg-gray-900 py-24">
    <div class="absolute inset-0 overflow-hidden">
        <img src="<?= BASE_URL ?>assets/images/about-us.webp" alt="Fintek Team" class="w-full h-full object-cover opacity-30 blur-sm">
    </div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">About Fintek</h1>
        <p class="text-lg md:text-xl text-gray-300 max-w-2xl mx-auto">Confidence, reliability, service and value for
            money.</p>
    </div>
</section>


<section class="py-16 bg-gray-50 border-b border-gray-100">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center" data-aos="fade-up">
        <p class="text-base md:text-lg text-gray-700 leading-relaxed">
            Fintek managed solutions is recognized as one of the industry’s leading office automation solution
            providers. The marketed are world renowned brands such as Sharp, Scan coin and Vivitek. Other expansive
            portfolio of products comprise of reputable office automation brands. Confidence, reliability, service and
            value for money have been the hallmark of our success. Our expensive network of 22 dealers located island
            wide are geared to provide you with machines, consumers, accessories and the island wide door-to-door
            service ensure that customer needs are addressed promptly and swiftly. Our highly trained technicians based
            in key cities are a call away to offer technical expertise. We at Fintek are poised to passionately serve
            you with premium office automation solutions as we forge ahead offering you the best in quality and a
            passion for service.
        </p>
    </div>
</section>


<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="project-card bg-gray-50 !p-10" data-aos="fade-right">
                <div class="w-12 h-12 bg-fintek-blue rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Vision</h3>
                <p class="text-gray-600 leading-relaxed">To be the leading office automation solutions provider with
                    strong brand identity</p>
            </div>

            <div class="project-card bg-gray-50 !p-10" data-aos="fade-left">
                <div class="w-12 h-12 bg-fintek-blue rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-4">Our Mission</h3>
                <p class="text-gray-600 leading-relaxed">Develop a team of people socially responsible with high
                    standards and integrity, committed to exceed customer expectations. Build value to our customer by
                    providing high quality products and services while ensuring high returns to our stakeholders.</p>
            </div>
        </div>
    </div>
</section>


<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-20" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-900 mb-4 tracking-tight">Meet Our Directors</h2>
            <div class="h-1 w-20 bg-fintek-blue mx-auto rounded-full opacity-20"></div>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-12 lg:gap-8">
            <?php
            $directors = [
                ['name' => 'Mr. S.J.M. Anzsar', 'image' => 'dir-anzsar.webp', 'role' => 'Board Director'],
                ['name' => 'Mr. A.R. Rasiah', 'image' => 'dir-rasiah.webp', 'role' => 'Board Director'],
                ['name' => 'Ms. A. Geethanjalee', 'image' => 'dir-geethanjalee.webp', 'role' => 'Board Director'],
                ['name' => 'Mr. L. Susiri Perera', 'image' => 'dir-perera.webp', 'role' => 'Board Director'],
                ['name' => 'Mr. A. Michael G. Gomez', 'image' => 'dir-gomez.webp', 'role' => 'Board Director'],
            ];
            $delay = 100;
            foreach ($directors as $director) {
                $name = $director['name'];
                $image = $director['image'];
                $role = $director['role'];
                require 'includes/director-card.php';
                $delay += 100;
            }
            ?>
        </div>
    </div>
</section>

<?php
// Load global footer and JavaScript assets
require_once 'footer.php';
?>