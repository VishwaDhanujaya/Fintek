<?php

require_once 'header.php';
// Pre-fill the product reference if arriving from a product detail page
$productName = isset($_GET['product']) ? htmlspecialchars($_GET['product']) : '';
?>

<div class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 md:py-12">
        <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-2">Contact Us</h1>
        <p class="text-gray-500">Get in touch with our team for inquiries, support, or consultations.</p>
    </div>
</div>

<section class="py-16 bg-gray-50 flex-grow">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <?php if (isset($_GET['status'])): ?>
            <?php if ($_GET['status'] == 'success'): ?>
                <div class="mb-8 p-4 bg-green-50 border border-green-200 text-green-700 rounded-xl flex items-center" data-aos="fade-down">
                    <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Thank you! Your message has been sent successfully. We will get back to you shortly.</span>
                </div>
            <?php elseif ($_GET['status'] == 'error'): ?>
                <div class="mb-8 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl flex items-center" data-aos="fade-down">
                    <svg class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                    <span>Oops! Something went wrong. <?= htmlspecialchars($_GET['message'] ?? 'Please try again later.') ?></span>
                </div>
            <?php endif; ?>
        <?php endif; ?>

        <div class="flex flex-col lg:flex-row gap-12">


            <div class="w-full lg:w-1/2 space-y-8" data-aos="fade-right">
                <div class="bg-white rounded-2xl p-8 shadow-sm border border-gray-100">
                    <h3 class="text-xl font-bold text-gray-900 mb-6">Our Office</h3>
                    <ul class="space-y-6">
                        <li class="flex items-start">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-blue-50 text-fintek-blue rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Headquarters</p>
                                <p class="text-gray-600 mt-1">No.248, Vauxhall Street,<br>Colombo 02, Sri Lanka.</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-blue-50 text-fintek-blue rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Phone</p>
                                <p class="text-gray-600 mt-1">+94 117 887000<br>+94 112 431172</p>
                            </div>
                        </li>
                        <li class="flex items-start">
                            <div
                                class="flex-shrink-0 w-10 h-10 bg-blue-50 text-fintek-blue rounded-lg flex items-center justify-center mr-4">
                                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <div>
                                <p class="font-medium text-gray-900">Email</p>
                                <p class="text-gray-600 mt-1">fintek@finteksl.com</p>
                            </div>
                        </li>
                    </ul>
                </div>


                <div class="bg-gray-200 rounded-2xl overflow-hidden h-[300px] md:h-[400px] lg:h-[450px] border border-gray-100 shadow-sm relative">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.7413684942785!2d79.85656277390444!3d6.921490318412724!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae2599e05e28d05%3A0xb357be22f7e9b969!2sFintek%20Managed%20Solutions%20(Pvt)%20Ltd!5e0!3m2!1sen!2slk!4v1689569716854!5m2!1sen!2slk"
                        class="absolute inset-0 w-full h-full border-0" allowfullscreen=""
                        loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>


            <div class="w-full lg:w-1/2" data-aos="fade-left">
                <div class="bg-white rounded-2xl p-8 lg:p-10 shadow-sm border border-gray-100">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Send us a message</h3>

                    <form action="process-contact.php" method="POST" class="space-y-6">

                        <div class="relative">
                            <input type="text" id="name" name="name"
                                class="block rounded-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-fintek-blue peer"
                                placeholder=" " required />
                            <label for="name"
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-fintek-blue peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Full
                                Name</label>
                        </div>

                        <div class="relative">
                            <input type="email" id="email" name="email"
                                class="block rounded-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-fintek-blue peer"
                                placeholder=" " required />
                            <label for="email"
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-fintek-blue peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Email
                                Address</label>
                        </div>

                        <div class="relative">
                            <select id="department" name="department"
                                class="block rounded-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-fintek-blue peer">
                                <!-- Pre-select the 'Sales Inquiry' department if a specific product was requested -->
                                <option value="sales" <?= $productName ? 'selected' : '' ?>>Sales Inquiry</option>
                                <option value="support">Technical Support</option>
                                <option value="toner">Toner & Consumables</option>
                                <option value="general">General Information</option>
                            </select>
                            <label for="department"
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-fintek-blue">Department</label>
                            <div
                                class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </div>
                        </div>

                        <?php // If a product was passed in the URL, display a read-only reference field ?>
                        <?php if ($productName): ?>
                            <div class="relative">
                                <input type="text" id="product_ref" name="product_ref" value="<?= $productName ?>"
                                    class="block rounded-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-fintek-blue peer"
                                    placeholder=" " readonly />
                                <label for="product_ref"
                                    class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-fintek-blue">Product
                                    Reference</label>
                            </div>
                        <?php endif; ?>

                        <div class="relative">
                            <textarea id="message" name="message" rows="4"
                                class="block rounded-lg px-2.5 pb-2.5 pt-5 w-full text-sm text-gray-900 bg-gray-50 border border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-fintek-blue peer"
                                placeholder=" " required></textarea>
                            <label for="message"
                                class="absolute text-sm text-gray-500 duration-300 transform -translate-y-4 scale-75 top-4 z-10 origin-[0] left-2.5 peer-focus:text-fintek-blue peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4">Your
                                Message</label>
                        </div>

                        <?php
                        $buttonText = 'Send Message';
                        $buttonType = 'submit';
                        $buttonClass = 'w-full py-3.5 px-4 text-sm';
                        require 'includes/button.php';
                        ?>
                    </form>
                </div>
            </div>

        </div>
    </div>
</section>


<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16" data-aos="fade-up">
            <h2 class="text-3xl font-bold text-gray-900 mb-4 tracking-tight">Get Support From Our Brands</h2>
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