<?php include_once __DIR__ . '/../config/config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= SITE_NAME ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Professional services with excellence and reliability">
<!-- Favicon -->
<link rel="icon" href="<?= BASE_URL ?>images/logo/logo - 1.png" type="image/png">
<link rel="apple-touch-icon" href="<?= BASE_URL ?>images/logo/logo - 1.png">

    <!-- Tailwind CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Custom styles to match logo gradient -->
    <style>
        /* Main background – clean white */
        .gradient-bg {
            background: #ffffff;
        }

        /* Brand gradient only for text */
        .gradient-text {
            background: linear-gradient(135deg, #1e40af 0%, #065f46 100%);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            display: inline-block;
        }

        /* Soft card background */
        .card-gradient {
            background: linear-gradient(
                135deg,
                rgba(30, 64, 175, 0.04) 0%,
                rgba(6, 95, 70, 0.04) 100%
            );
        }

        /* Buttons stay strong */
        .btn-gradient {
            background: linear-gradient(135deg, #1e40af 0%, #065f46 100%);
            transition: all 0.3s ease;
            color: #ffffff;
        }

        .btn-gradient:hover {
            background: linear-gradient(135deg, #1d4ed8 0%, #047857 100%);
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.12);
        }

        /* Mobile Bottom Navigation */
        .mobile-bottom-nav {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: white;
            border-top: 1px solid #e5e7eb;
            padding: 10px 0 5px;
            display: flex;
            justify-content: space-around;
            align-items: center;
            z-index: 1000;
            box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.05);
        }

        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            color: #4b5563;
            padding: 8px 12px;
            border-radius: 12px;
            transition: all 0.2s ease;
            min-width: 64px;
        }

        .nav-item.active {
            color: #1e40af;
            background-color: rgba(30, 64, 175, 0.08);
        }

        .nav-item:hover {
            color: #1e40af;
            transform: translateY(-2px);
        }

        .nav-icon {
            font-size: 1.25rem;
            margin-bottom: 4px;
        }

        .nav-label {
            font-size: 0.75rem;
            font-weight: 500;
        }

        /* Search Bar Styles */
        .search-container {
            position: relative;
            margin: 0 16px 12px;
        }

        .search-bar {
            width: 100%;
            padding: 12px 16px 12px 44px;
            border: 1px solid #d1d5db;
            border-radius: 24px;
            font-size: 0.95rem;
            background-color: #f9fafb;
            transition: all 0.3s ease;
        }

        .search-bar:focus {
            outline: none;
            border-color: #1e40af;
            background-color: white;
            box-shadow: 0 0 0 3px rgba(30, 64, 175, 0.1);
        }

        .search-icon {
            position: absolute;
            left: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            font-size: 1rem;
        }

        /* Main content padding for bottom nav */
        .main-content {
            padding-bottom: 80px;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.3s ease-out;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans">

<header class="bg-white shadow-sm sticky top-0 z-50 border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16 md:h-20">
            <!-- Logo -->
            <a href="<?= BASE_URL ?>" class="flex items-center group">
                <img 
                    src="<?= BASE_URL ?>images/logo/logo - 1.png"
                    alt="<?= SITE_NAME ?>"
                    class="h-10 sm:h-14 md:h-16 w-auto"
                >
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center gap-8">
                <?php
                $navClass = "text-blue-800 hover:text-blue-600 font-semibold px-1 py-2 border-b-2 border-transparent hover:border-blue-600 transition-all";
                ?>
                <a href="<?= BASE_URL ?>" class="<?= $navClass ?>">Home</a>
                <a href="<?= BASE_URL ?>data/services.php" class="<?= $navClass ?>">Services</a>
                <a href="<?= BASE_URL ?>data/dombivli_areas.php" class="<?= $navClass ?>">Areas</a>
                <a href="<?= BASE_URL ?>contact.php" class="<?= $navClass ?>">Contact</a>

                <!-- Desktop Search (Optional) -->
                <div class="relative">
                    <input type="text" 
                           placeholder="Search..." 
                           class="pl-10 pr-4 py-2 border border-gray-300 rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>

                <!-- Call Button -->
                <a href="tel:<?= PHONE ?>" 
                   class="ml-4 bg-blue-700 text-white px-5 py-2.5 rounded-full font-semibold hover:bg-blue-800 hover:shadow-lg transition flex items-center gap-2">
                    <i class="fas fa-phone-alt"></i>
                    Call Now
                </a>
            </nav>

            <!-- Mobile Search Button (Top Right) -->
            <div class="flex items-center gap-4 md:hidden">
                <button id="searchToggle" class="text-blue-800 p-2">
                    <i class="fas fa-search text-lg"></i>
                </button>
               
            </div>
        </div>

        <!-- Mobile Search Bar (Hidden by default) -->
        <div id="mobileSearch" class="hidden md:hidden search-container fade-in">
            <i class="fas fa-search search-icon"></i>
            <input type="text" 
                   placeholder="Search services, areas..." 
                   class="search-bar"
                   id="searchInput">
        </div>
    </div>
</header>

<main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 md:py-8 main-content">
    <!-- Your main content here -->
    <div class="bg-white rounded-2xl shadow-lg p-6 md:p-8 mb-6">
        <h1 class="text-3xl md:text-4xl font-bold mb-4 gradient-text">Welcome to <?= SITE_NAME ?></h1>
        <p class="text-gray-600 mb-6">
            Professional services tailored to meet your needs with excellence and reliability. 
            Explore our wide range of services and discover how we can help you achieve your goals.
        </p>
        
        <!-- Search results placeholder -->
        <div id="searchResults" class="hidden mt-4">
            <div class="border-t pt-4">
                <h3 class="font-semibold text-gray-700 mb-3">Search Results:</h3>
                <div id="resultsList" class="space-y-2">
                    <!-- Search results will appear here -->
                </div>
            </div>
        </div>
    </div>

    <!-- Example Content Sections -->
    <div class="grid md:grid-cols-3 gap-6 mb-8">
        <div class="card-gradient rounded-xl p-6 shadow-md">
            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center mb-4">
                <i class="fas fa-tools text-blue-700 text-xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3 text-gray-800">Our Services</h3>
            <p class="text-gray-600 mb-4">
                Discover our comprehensive range of professional services designed to exceed your expectations.
            </p>
            <a href="<?= BASE_URL ?>data/services.php" class="text-blue-700 font-semibold inline-flex items-center gap-2">
                View Services <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="card-gradient rounded-xl p-6 shadow-md">
            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center mb-4">
                <i class="fas fa-map-marker-alt text-green-700 text-xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3 text-gray-800">Service Areas</h3>
            <p class="text-gray-600 mb-4">
                We proudly serve multiple areas with our reliable and efficient services.
            </p>
            <a href="<?= BASE_URL ?>data/dombivli_areas.php" class="text-blue-700 font-semibold inline-flex items-center gap-2">
                View Areas <i class="fas fa-arrow-right"></i>
            </a>
        </div>

        <div class="card-gradient rounded-xl p-6 shadow-md">
            <div class="w-12 h-12 bg-orange-100 rounded-lg flex items-center justify-center mb-4">
                <i class="fas fa-phone-alt text-orange-700 text-xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-3 text-gray-800">Contact Us</h3>
            <p class="text-gray-600 mb-4">
                Get in touch for a free consultation and personalized service quote.
            </p>
            <a href="<?= BASE_URL ?>contact.php" class="text-blue-700 font-semibold inline-flex items-center gap-2">
                Contact Now <i class="fas fa-arrow-right"></i>
            </a>
        </div>
    </div>

    <!-- Call to Action -->
    <div class="bg-gradient-to-r from-blue-700 to-green-700 rounded-2xl p-6 md:p-8 text-white text-center shadow-xl">
        <h2 class="text-2xl md:text-3xl font-bold mb-4">Ready to Get Started?</h2>
        <p class="mb-6 max-w-2xl mx-auto">
            Call us now for immediate assistance or schedule a consultation at your convenience.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="tel:<?= PHONE ?>" 
               class="bg-white text-blue-900 px-6 py-3 rounded-full font-bold hover:bg-blue-50 transition-colors inline-flex items-center justify-center gap-3 shadow-lg">
                <i class="fas fa-phone-alt"></i>
                <span><?= PHONE ?></span>
            </a>
            <a href="<?= BASE_URL ?>contact.php" 
               class="border-2 border-white px-6 py-3 rounded-full font-bold hover:bg-white/10 transition-colors">
                Send Message
            </a>
        </div>
    </div>
</main>

<!-- Mobile Bottom Navigation -->
<nav class="mobile-bottom-nav md:hidden">
    <a href="<?= BASE_URL ?>" class="nav-item active" data-nav="home">
        <i class="fas fa-home nav-icon"></i>
        <span class="nav-label">Home</span>
    </a>
    <a href="<?= BASE_URL ?>data/services.php" class="nav-item" data-nav="services">
        <i class="fas fa-tools nav-icon"></i>
        <span class="nav-label">Services</span>
    </a>
    <a href="javascript:void(0)" class="nav-item" id="searchMobileBtn">
        <i class="fas fa-search nav-icon"></i>
        <span class="nav-label">Search</span>
    </a>
    <a href="<?= BASE_URL ?>data/dombivli_areas.php" class="nav-item" data-nav="areas">
        <i class="fas fa-map-marker-alt nav-icon"></i>
        <span class="nav-label">Areas</span>
    </a>
    <a href="<?= BASE_URL ?>contact.php" class="nav-item" data-nav="contact">
        <i class="fas fa-phone-alt nav-icon"></i>
        <span class="nav-label">Contact</span>
    </a>
</nav>

<!-- JavaScript -->
<script>
    // Mobile Navigation Active State
    document.querySelectorAll('.nav-item').forEach(item => {
        item.addEventListener('click', function() {
            // Remove active class from all items
            document.querySelectorAll('.nav-item').forEach(nav => {
                nav.classList.remove('active');
            });
            // Add active class to clicked item
            this.classList.add('active');
        });
    });

    // Toggle Mobile Search Bar
    const searchToggle = document.getElementById('searchToggle');
    const mobileSearch = document.getElementById('mobileSearch');
    const searchMobileBtn = document.getElementById('searchMobileBtn');
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');
    const resultsList = document.getElementById('resultsList');

    if (searchToggle) {
        searchToggle.addEventListener('click', function() {
            mobileSearch.classList.toggle('hidden');
            mobileSearch.classList.add('fade-in');
            if (!mobileSearch.classList.contains('hidden')) {
                searchInput.focus();
            }
        });
    }

    if (searchMobileBtn) {
        searchMobileBtn.addEventListener('click', function() {
            mobileSearch.classList.toggle('hidden');
            mobileSearch.classList.add('fade-in');
            if (!mobileSearch.classList.contains('hidden')) {
                searchInput.focus();
            }
        });
    }

    // Sample search functionality
    const sampleResults = [
        { title: "Plumbing Services", link: "<?= BASE_URL ?>services.php#plumbing" },
        { title: "Electrical Services", link: "<?= BASE_URL ?>services.php#electrical" },
        { title: "Downtown Area", link: "<?= BASE_URL ?>areas.php#downtown" },
        { title: "Contact Form", link: "<?= BASE_URL ?>contact.php" },
        { title: "Emergency Services", link: "<?= BASE_URL ?>services.php#emergency" }
    ];

    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.toLowerCase().trim();
            resultsList.innerHTML = '';
            
            if (query.length > 2) {
                searchResults.classList.remove('hidden');
                
                const filteredResults = sampleResults.filter(result => 
                    result.title.toLowerCase().includes(query)
                );
                
                if (filteredResults.length > 0) {
                    filteredResults.forEach(result => {
                        const resultItem = document.createElement('div');
                        resultItem.className = 'p-3 hover:bg-gray-50 rounded-lg cursor-pointer border-b border-gray-100';
                        resultItem.innerHTML = `
                            <a href="${result.link}" class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-search text-gray-400"></i>
                                    <span class="font-medium text-gray-700">${result.title}</span>
                                </div>
                                <i class="fas fa-chevron-right text-gray-400"></i>
                            </a>
                        `;
                        resultsList.appendChild(resultItem);
                    });
                } else {
                    resultsList.innerHTML = `
                        <div class="p-4 text-center text-gray-500">
                            <i class="fas fa-search fa-lg mb-2"></i>
                            <p>No results found for "${query}"</p>
                        </div>
                    `;
                }
            } else {
                searchResults.classList.add('hidden');
            }
        });

        // Hide search when clicking outside
        document.addEventListener('click', function(event) {
            if (!mobileSearch.contains(event.target) && 
                !searchToggle.contains(event.target) && 
                !searchMobileBtn.contains(event.target)) {
                mobileSearch.classList.add('hidden');
                searchResults.classList.add('hidden');
            }
        });
    }

    // Set active nav based on current page
    document.addEventListener('DOMContentLoaded', function() {
        const currentPath = window.location.pathname;
        const navItems = document.querySelectorAll('.nav-item');
        
        navItems.forEach(item => {
            item.classList.remove('active');
            const href = item.getAttribute('href');
            
            if (href === currentPath || 
                (currentPath.includes('services') && href.includes('services')) ||
                (currentPath.includes('areas') && href.includes('areas')) ||
                (currentPath.includes('contact') && href.includes('contact')) ||
                (currentPath.endsWith('/') && href === '<?= BASE_URL ?>')) {
                item.classList.add('active');
            }
        });
    });
</script>
