<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($title) ? $title . ' - ' : '' ?>Bharatpur Foundation</title>

    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@400;500;600;700;800;900&family=Poppins:wght@300;400;500;600;700;800;900&family=Nunito:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Custom Tailwind Configuration -->
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'display': ['Playfair Display', 'serif'],
                        'heading': ['Poppins', 'sans-serif'],
                        'body': ['Inter', 'sans-serif'],
                        'accent': ['Nunito', 'sans-serif'],
                        'mono': ['DM Sans', 'monospace']
                    },
                    colors: {
                        primary: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            200: '#c7d2fe',
                            300: '#a5b4fc',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5',
                            700: '#4338ca',
                            800: '#3730a3',
                            900: '#312e81',
                            950: '#1e1b4d'
                        },
                        accent: {
                            50: '#fdf4ff',
                            100: '#fae8ff',
                            200: '#f5d0fe',
                            300: '#f0abfc',
                            400: '#e879f9',
                            500: '#d946ef',
                            600: '#c026d3',
                            700: '#a21caf',
                            800: '#86198f',
                            900: '#701a75',
                            950: '#4a044e'
                        },
                        navy: {
                            50: '#f8fafc',
                            100: '#f1f5f9',
                            200: '#e2e8f0',
                            300: '#cbd5e1',
                            400: '#94a3b8',
                            500: '#64748b',
                            600: '#475569',
                            700: '#334155',
                            800: '#1e293b',
                            900: '#0f172a',
                            950: '#020617'
                        }
                    },
                    animation: {
                        'fade-in-up': 'fadeInUp 0.6s ease-out',
                        'fade-in': 'fadeIn 0.8s ease-out',
                        'slide-in-right': 'slideInRight 0.7s ease-out',
                        'bounce-subtle': 'bounceSubtle 2s infinite',
                        'pulse-slow': 'pulse 3s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                    },
                    keyframes: {
                        fadeInUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' }
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        slideInRight: {
                            '0%': { opacity: '0', transform: 'translateX(30px)' },
                            '100%': { opacity: '1', transform: 'translateX(0)' }
                        },
                        bounceSubtle: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-5px)' }
                        }
                    }
                }
            }
        }
    </script>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('favicon.ico') ?>">
    <link rel="shortcut icon" type="image/x-icon" href="<?= base_url('favicon.ico') ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('apple-touch-icon.png') ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('favicon-32x32.png') ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('favicon-16x16.png') ?>">

    <!-- Hreflang for multilingual SEO -->
    <?php 
    $page_path = str_replace(base_url(), '', current_url());
    $page_path = str_replace('/en', '', $page_path);
    $page_path = str_replace('/hi', '', $page_path);
    if (empty($page_path) || $page_path === '/') {
        $page_path = '';
    }
    ?>
    <link rel="alternate" hreflang="en" href="<?= base_url('en' . $page_path) ?>">
    <link rel="alternate" hreflang="hi" href="<?= base_url('hi' . $page_path) ?>">
    <link rel="alternate" hreflang="x-default" href="<?= base_url('en' . $page_path) ?>">
</head>

<body class="font-body text-gray-900 bg-white">
    <!-- Preloader -->
    <div id="preloader" class="fixed inset-0 bg-white z-50 flex items-center justify-center">
        <div class="text-center">
            <div class="relative">
                <div class="w-20 h-20 border-4 border-indigo-200 border-t-indigo-600 rounded-full animate-spin mx-auto mb-4"></div>
                <div class="absolute inset-0 w-20 h-20 border-4 border-transparent border-r-purple-400 rounded-full animate-spin mx-auto" style="animation-duration: 1.5s; animation-direction: reverse;"></div>
            </div>
            <h3 class="font-display text-xl font-bold text-gray-800 mb-2">Bharatpur Foundation</h3>
            <p class="font-accent text-gray-600">Loading...</p>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="bg-white/95 backdrop-blur-md shadow-xl sticky top-0 z-40 border-b border-indigo-100">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="<?= base_url($language ?? 'en') ?>" class="flex items-center space-x-3">
                        <span class="font-display text-2xl font-bold bg-gradient-to-r from-indigo-600 to-purple-600 bg-clip-text text-transparent">Bharatpur Foundation</span>
                    </a>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="<?= base_url($language ?? 'en') ?>" 
                       class="font-heading font-semibold text-gray-700 hover:text-indigo-600 transition-colors duration-200 px-4 py-2 rounded-xl hover:bg-indigo-50">
                        Home
                    </a>
                    <a href="<?= base_url(($language ?? 'en') . '/beneficiaries') ?>" 
                       class="font-heading font-semibold text-gray-700 hover:text-indigo-600 transition-colors duration-200 px-4 py-2 rounded-xl hover:bg-indigo-50">
                        Beneficiaries
                    </a>
                    <a href="<?= base_url(($language ?? 'en') . '/success-stories') ?>" 
                       class="font-heading font-semibold text-gray-700 hover:text-indigo-600 transition-colors duration-200 px-4 py-2 rounded-xl hover:bg-indigo-50">
                        Success Stories
                    </a>

                    <a href="<?= base_url(($language ?? 'en') . '/founders-members') ?>" 
                       class="font-heading font-semibold text-gray-700 hover:text-indigo-600 transition-colors duration-200 px-4 py-2 rounded-xl hover:bg-indigo-50">
                        Founders
                    </a>

                    <!-- About Dropdown -->
                    <div class="relative group">
                        <button class="font-heading font-semibold text-gray-700 hover:text-indigo-600 transition-colors duration-200 px-4 py-2 rounded-xl hover:bg-indigo-50 flex items-center">
                            About
                            <i class="fas fa-chevron-down ml-1 text-xs group-hover:rotate-180 transition-transform duration-200"></i>
                        </button>
                        <div class="absolute top-full left-0 mt-2 w-56 bg-white rounded-xl shadow-xl border border-gray-100 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                            <div class="py-2">
                                <a href="<?= base_url(($language ?? 'en') . '/media') ?>" 
                                   class="block px-4 py-3 text-sm font-heading font-medium text-gray-700 hover:text-indigo-600 hover:bg-indigo-50 transition-colors duration-200">
                                    <i class="fas fa-newspaper mr-2"></i>
                                    Media
                                </a>
                            </div>
                        </div>
                    </div>

                    <a href="<?= base_url(($language ?? 'en') . '/join-us') ?>" 
                       class="font-heading font-semibold text-gray-700 hover:text-indigo-600 transition-colors duration-200 px-4 py-2 rounded-xl hover:bg-indigo-50">
                        Join Us
                    </a>

                    <!-- Language Switcher -->
                    <div class="flex items-center space-x-2">
                        <a href="<?= base_url('en') ?>" 
                           class="<?= ($language ?? 'en') === 'en' ? 'bg-indigo-600 text-white shadow-lg' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' ?> px-4 py-2 rounded-xl font-accent font-semibold transition-all duration-200">
                            EN
                        </a>
                        <a href="<?= base_url('hi') ?>" 
                           class="<?= ($language ?? 'en') === 'hi' ? 'bg-indigo-600 text-white shadow-lg' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' ?> px-4 py-2 rounded-xl font-accent font-semibold transition-all duration-200">
                            हिं
                        </a>
                    </div>
                </div>

                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-indigo-600 focus:outline-none p-2">
                        <i class="fas fa-bars text-xl"></i>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="md:hidden hidden">
                <div class="px-2 pt-2 pb-3 space-y-1 bg-white border-t border-gray-200 rounded-b-2xl shadow-lg">
                    <a href="<?= base_url($language ?? 'en') ?>" 
                       class="block font-heading font-semibold text-gray-700 hover:text-indigo-600 px-4 py-3 rounded-xl hover:bg-indigo-50">
                        Home
                    </a>
                    <a href="<?= base_url(($language ?? 'en') . '/beneficiaries') ?>" 
                       class="block font-heading font-semibold text-gray-700 hover:text-indigo-600 px-4 py-3 rounded-xl hover:bg-indigo-50">
                        Beneficiaries
                    </a>
                    <a href="<?= base_url(($language ?? 'en') . '/success-stories') ?>" 
                       class="block font-heading font-semibold text-gray-700 hover:text-indigo-600 px-4 py-3 rounded-xl hover:bg-indigo-50">
                        Success Stories
                    </a>
                    <a href="<?= base_url(($language ?? 'en') . '/founders-members') ?>" 
                       class="block font-heading font-semibold text-gray-700 hover:text-indigo-600 px-4 py-3 rounded-xl hover:bg-indigo-50">
                        Founders
                    </a>
                    <div class="px-4 py-2">
                        <p class="text-xs text-gray-500 font-medium mb-2">About</p>
                        <a href="<?= base_url(($language ?? 'en') . '/media') ?>" 
                           class="block font-heading font-medium text-gray-600 hover:text-indigo-600 px-3 py-2 rounded-lg hover:bg-indigo-50 text-sm">
                            <i class="fas fa-newspaper mr-2"></i>
                            Media
                        </a>
                    </div>
                    <a href="<?= base_url(($language ?? 'en') . '/join-us') ?>" 
                       class="block font-heading font-semibold text-gray-700 hover:text-indigo-600 px-4 py-3 rounded-xl hover:bg-indigo-50">
                        Join Us
                    </a>

                    <!-- Mobile Language Switcher -->
                    <div class="flex space-x-2 px-4 py-3">
                        <a href="<?= base_url('en') ?>" 
                           class="<?= ($language ?? 'en') === 'en' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-700' ?> px-4 py-2 rounded-xl font-accent font-semibold">
                            EN
                        </a>
                        <a href="<?= base_url('hi') ?>" 
                           class="<?= ($language ?? 'en') === 'hi' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-700' ?> px-4 py-2 rounded-xl font-accent font-semibold">
                            हिं
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="pt-16">
        <?= isset($yield) ? $yield : $this->renderSection('content') ?>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Foundation Info -->
                <div class="lg:col-span-2">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-primary-500 to-accent-500 rounded-xl flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white text-xl"></i>
                        </div>
                        <span class="font-display text-2xl font-bold">Bharatpur Foundation</span>
                    </div>
                    <p class="text-gray-300 text-lg leading-relaxed mb-6 font-accent">
                        Transforming lives through education and creating sustainable impact in underprivileged communities. 
                        Every contribution creates lasting change.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-primary-600 transition-colors duration-200">
                            <i class="fab fa-facebook text-lg"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-primary-600 transition-colors duration-200">
                            <i class="fab fa-twitter text-lg"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-primary-600 transition-colors duration-200">
                            <i class="fab fa-instagram text-lg"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-lg flex items-center justify-center hover:bg-primary-600 transition-colors duration-200">
                            <i class="fab fa-linkedin text-lg"></i>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h3 class="font-heading text-lg font-semibold mb-6">Quick Links</h3>
                    <ul class="space-y-3">
                        <li><a href="<?= base_url() ?>" class="text-gray-300 hover:text-white transition-colors duration-200 font-accent">Home</a></li>
                        <li><a href="<?= base_url('beneficiaries') ?>" class="text-gray-300 hover:text-white transition-colors duration-200 font-accent">Beneficiaries</a></li>
                        <li><a href="<?= base_url('success-stories') ?>" class="text-gray-300 hover:text-white transition-colors duration-200 font-accent">Success Stories</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h3 class="font-heading text-lg font-semibold mb-6">Contact Info</h3>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-primary-400"></i>
                            <a href="mailto:info@nayantar.org" class="text-gray-300 hover:text-white transition-colors duration-200 font-accent">info@nayantar.org</a>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone text-primary-400"></i>
                            <a href="tel:+919876543210" class="text-gray-300 hover:text-white transition-colors duration-200 font-accent">+91 98765 43210</a>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-map-marker-alt text-primary-400"></i>
                            <span class="text-gray-300 font-accent">Mumbai, Maharashtra, India</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-gray-800 mt-12 pt-8 flex flex-col md:flex-row items-center justify-between">
                <p class="text-gray-400 font-accent">&copy; <?= date('Y') ?> Bharatpur Foundation. All rights reserved.</p>
                <p class="text-gray-400 font-accent mt-4 md:mt-0">
                    Made with <i class="fas fa-heart text-red-500"></i> for education
                </p>
            </div>
        </div>
    </footer>

    <!-- Mobile Menu Script -->
    <script>
        // Hide preloader when page is fully loaded
        window.addEventListener('load', function() {
            const preloader = document.getElementById('preloader');
            preloader.style.opacity = '0';
            preloader.style.transition = 'opacity 0.5s ease';
            setTimeout(() => {
                preloader.style.display = 'none';
            }, 500);
        });

        // Hide preloader after 3 seconds as fallback
        setTimeout(function() {
            const preloader = document.getElementById('preloader');
            if (preloader.style.display !== 'none') {
                preloader.style.opacity = '0';
                preloader.style.transition = 'opacity 0.5s ease';
                setTimeout(() => {
                    preloader.style.display = 'none';
                }, 500);
            }
        }, 3000);

        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            const mobileMenu = document.getElementById('mobile-menu');
            mobileMenu.classList.toggle('hidden');
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>

</html>