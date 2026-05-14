/**
 * main.js - Fintek Frontend Logic
 * Handles lazy loading, filtering, tab navigation, and mobile menu
 */

document.addEventListener('DOMContentLoaded', () => {

    // 1. Initialize AOS (Animate on Scroll)
    if (typeof AOS !== 'undefined') {
        AOS.init({
            once: true,
            offset: 50,
            duration: 800,
            easing: 'ease-out-cubic',
        });
    }

    // 2. Blur-to-Focus Lazy Loading using Intersection Observer
    const blurImages = document.querySelectorAll('.blur-load');

    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    const src = img.getAttribute('data-src');

                    if (!src) return;

                    // Create a temp image to load the full resolution
                    const tempImg = new Image();
                    tempImg.src = src;

                    tempImg.onload = () => {
                        img.src = src;
                        img.classList.add('loaded'); // Remove blur filter
                    };

                    observer.unobserve(img);
                }
            });
        }, {
            rootMargin: "0px 0px 200px 0px" // Start loading slightly before it comes into view
        });

        blurImages.forEach(img => imageObserver.observe(img));
    } else {
        // Fallback for older browsers
        blurImages.forEach(img => {
            img.src = img.getAttribute('data-src');
            img.classList.add('loaded');
        });
    }

    // 3. Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }

    // 4. Search Icon Toggle
    const searchBtn = document.getElementById('searchBtn');
    const searchContainer = document.getElementById('searchContainer');

    if (searchBtn && searchContainer) {
        searchBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            searchContainer.classList.toggle('hidden');
            if (!searchContainer.classList.contains('hidden')) {
                searchContainer.querySelector('input').focus();
            }
        });

        // Close search when clicking outside
        document.addEventListener('click', (e) => {
            if (!searchContainer.contains(e.target) && e.target !== searchBtn) {
                searchContainer.classList.add('hidden');
            }
        });

        searchContainer.addEventListener('click', (e) => {
            e.stopPropagation();
        });
    }

    // 5. Product Filtering (products.php)
    const filterBtns = document.querySelectorAll('.filter-btn');
    const productItems = document.querySelectorAll('.product-item');
    const emptyState = document.getElementById('emptyState');

    if (filterBtns.length > 0 && productItems.length > 0) {

        const filterProducts = (category) => {
            let visibleCount = 0;

            // Update buttons active state
            filterBtns.forEach(btn => {
                if (btn.getAttribute('data-filter') === category) {
                    btn.classList.add('bg-fintek-blue', 'text-white', 'font-medium');
                    btn.classList.remove('text-gray-600', 'hover:bg-blue-50', 'hover:text-fintek-blue');
                } else {
                    btn.classList.remove('bg-fintek-blue', 'text-white', 'font-medium');
                    btn.classList.add('text-gray-600', 'hover:bg-blue-50', 'hover:text-fintek-blue');
                }
            });

            // Filter items
            productItems.forEach(item => {
                if (category === 'all' || item.getAttribute('data-category') === category) {
                    item.style.display = 'flex';
                    // Re-trigger animation by resetting AOS class slightly
                    item.classList.remove('aos-animate');
                    setTimeout(() => item.classList.add('aos-animate'), 50);
                    visibleCount++;
                } else {
                    item.style.display = 'none';
                }
            });

            // Show empty state if needed
            if (emptyState) {
                emptyState.style.display = visibleCount === 0 ? 'block' : 'none';
            }
        };

        // Attach event listeners
        filterBtns.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const category = btn.getAttribute('data-filter');
                filterProducts(category);

                // Update URL without reload
                if (history.pushState) {
                    const newurl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?category=' + category;
                    window.history.pushState({ path: newurl }, '', newurl);
                }
            });
        });

        // Initialize filtering based on initial active category from PHP
        if (window.initialCategory) {
            filterProducts(window.initialCategory);
        }
    }

    // 6. Tabbed Interface for Product Detail (product-detail.php)
    const tabBtns = document.querySelectorAll('.spec-tab-btn');
    const tabPanes = document.querySelectorAll('.spec-pane');

    if (tabBtns.length > 0 && tabPanes.length > 0) {
        tabBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active classes from all buttons
                tabBtns.forEach(b => {
                    b.classList.remove('border-fintek-blue', 'text-fintek-blue');
                    b.classList.add('border-transparent', 'text-gray-500');
                });

                // Hide all panes
                tabPanes.forEach(p => p.classList.add('hidden'));

                // Activate clicked button
                btn.classList.remove('border-transparent', 'text-gray-500');
                btn.classList.add('border-fintek-blue', 'text-fintek-blue');

                // Show target pane
                const targetId = btn.getAttribute('data-target');
                const targetPane = document.getElementById(targetId);
                if (targetPane) {
                    targetPane.classList.remove('hidden');
                }
            });
        });
    }

    // 7. Hero Slider Functionality
    const heroSlider = document.getElementById('heroSlider');
    const prevBtn = document.getElementById('prevSlide');
    const nextBtn = document.getElementById('nextSlide');
    const dots = document.querySelectorAll('.slider-dot');

    if (heroSlider && dots.length > 0) {
        const slides = document.querySelectorAll('.hero-slide');
        let currentSlide = 0;
        const slideCount = dots.length;
        let slideInterval;

        const updateSlider = () => {
            // Update slides active state
            slides.forEach((slide, index) => {
                if (index === currentSlide) {
                    slide.classList.add('opacity-100', 'z-10');
                    slide.classList.remove('opacity-0', 'z-0');
                } else {
                    slide.classList.remove('opacity-100', 'z-10');
                    slide.classList.add('opacity-0', 'z-0');
                }
            });

            // Update dots active state
            dots.forEach((dot, index) => {
                if (index === currentSlide) {
                    dot.classList.add('bg-white', 'scale-125');
                    dot.classList.remove('bg-white/40');
                } else {
                    dot.classList.remove('bg-white', 'scale-125');
                    dot.classList.add('bg-white/40');
                }
            });
        };

        const nextSlide = () => {
            currentSlide = (currentSlide + 1) % slideCount;
            updateSlider();
        };

        const prevSlide = () => {
            currentSlide = (currentSlide - 1 + slideCount) % slideCount;
            updateSlider();
        };

        const startAutoPlay = () => {
            clearInterval(slideInterval);
            slideInterval = setInterval(nextSlide, 5000); // Change slide every 5 seconds
        };

        // Event Listeners
        if (nextBtn) {
            nextBtn.addEventListener('click', () => {
                nextSlide();
                startAutoPlay();
            });
        }

        if (prevBtn) {
            prevBtn.addEventListener('click', () => {
                prevSlide();
                startAutoPlay();
            });
        }

        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                currentSlide = parseInt(dot.getAttribute('data-index'));
                updateSlider();
                startAutoPlay();
            });
        });

        // Initialize Slider
        updateSlider();
        startAutoPlay();
    }

});
