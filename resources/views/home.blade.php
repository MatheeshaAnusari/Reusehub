<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REUSE Hub - Sustainable Furniture Marketplace</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            scroll-behavior: smooth;
        }
        
        /* Banner Styles */
        .hero-banner {
            height: 100vh;
            width: 100%;
            position: relative;
            overflow: hidden;
        }
        
        .banner-slide {
            position: absolute;
            width: 100%;
            height: 100%;
            background-size: cover;
            background-position: center;
            opacity: 0;
            transition: opacity 1.2s ease-in-out, transform 10s ease-in-out;
            transform: scale(1);
        }
        
        .banner-slide.active {
            opacity: 1;
            transform: scale(1.1);
        }
        
        .banner-slide.fade-out {
            opacity: 0;
        }
        
        /* Animations */
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% {transform: translateY(0);}
            40% {transform: translateY(-20px);}
            60% {transform: translateY(-10px);}
        }
        
        .floating {
            animation: float 6s ease-in-out infinite;
        }
        
        .pulse {
            animation: pulse 4s ease infinite;
        }
        
        .text-shadow {
            text-shadow: 2px 2px 8px rgba(0,0,0,0.3);
        }
        
        .gradient-overlay {
            background: linear-gradient(135deg, rgba(52, 211, 153, 0.3) 0%, rgba(52, 211, 153, 0.1) 100%);
        }
        
        .scroll-indicator {
            animation: bounce 2s infinite;
        }
        
        /* Card Hover Effects */
        .card-hover {
            transition: all 0.3s ease;
        }
        
        .card-hover:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
        
        .btn-pulse {
            animation: pulse 2s infinite;
        }
        
        /* Progress Bar */
        .progress-bar {
            height: 4px;
            width: 0;
            background: #34D399;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            transition: width 0.1s;
        }
        
        /* Item Card Effects */
        .item-card {
            transition: all 0.5s cubic-bezier(0.25, 0.8, 0.25, 1);
        }
        
        .item-card:hover {
            transform: scale(1.03);
        }
        
        /* Counter Animation */
        .counter {
            font-size: 2.5rem;
            font-weight: bold;
            color: #34D399;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-700">
    <!-- Progress Bar -->
    <div class="progress-bar"></div>

    <!-- Navigation Bar -->
    <nav class="bg-white shadow-md sticky top-0 z-50 transform transition-all duration-300" id="navbar">
        <div class="container mx-auto px-6 py-3">
            <div class="flex items-center justify-between">
                <!-- Logo -->
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    <span class="ml-2 text-xl font-semibold text-gray-800">REUSE Hub</span>
                </div>
                
                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#home" class="text-green-500 font-medium hover:text-green-600 transition-all">Home</a>
                    <a href="/donate" class="text-gray-600 hover:text-green-500 transition-all">Donate</a>
                    <a href="/browse" class="text-gray-600 hover:text-green-500 transition-all">Browse</a>
                    <a href="#blog" class="text-gray-600 hover:text-green-500 transition-all">Blog</a>
                    <a href="#about" class="text-gray-600 hover:text-green-500 transition-all">About</a>
                    <a href="#contact" class="text-gray-600 hover:text-green-500 transition-all">Contact</a>
                    <a href="/transaction" class="text-gray-600 hover:text-green-500 transition-all">Transaction</a>
                    <button class="bg-green-400 hover:bg-green-500 text-white px-4 py-2 rounded-lg transition-all transform hover:scale-105 btn-pulse">Login / Register</button>
                </div>
                
                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button class="text-gray-600 focus:outline-none" id="mobile-menu-button">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Mobile Menu -->
    <div class="md:hidden hidden bg-white shadow-lg absolute w-full z-40" id="mobile-menu">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="#" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-500 hover:bg-gray-50">Home</a>
            <a href="#donate" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-500 hover:bg-gray-50">Donate</a>
            <a href="#browse" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-500 hover:bg-gray-50">Browse</a>
            <a href="#blog" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-500 hover:bg-gray-50">Blog</a>
            <a href="#about" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-500 hover:bg-gray-50">About</a>
            <a href="#contact" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-500 hover:bg-gray-50">Contact</a>
            <a href="#transaction" class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-green-500 hover:bg-gray-50">Transaction</a>
            <button class="w-full text-left px-3 py-2 rounded-md text-base font-medium text-white bg-green-400 hover:bg-green-500">Login / Register</button>
        </div>
    </div>

    <!-- Hero Banner with Animated Slideshow -->
    <section class="hero-banner">
        <!-- Slide 1 -->
        <div class="banner-slide active" style="background-image: url('https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2000&q=80');">
            <div class="absolute inset-0 gradient-overlay"></div>
        </div>
        
        <!-- Slide 2 -->
        <div class="banner-slide" style="background-image: url('https://images.unsplash.com/photo-1556228453-efd6c1ff04f6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2000&q=80');">
            <div class="absolute inset-0 gradient-overlay"></div>
        </div>
        
        <!-- Slide 3 -->
        <div class="banner-slide" style="background-image: url('https://images.unsplash.com/photo-1600121848594-d8644e57abab?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2000&q=80');">
            <div class="absolute inset-0 gradient-overlay"></div>
        </div>
        
        <!-- Slide 4 -->
        <div class="banner-slide" style="background-image: url('https://images.unsplash.com/photo-1583845112203-29329902330e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2000&q=80');">
            <div class="absolute inset-0 gradient-overlay"></div>
        </div>
        
        <!-- Slide 5 -->
        <div class="banner-slide" style="background-image: url('https://images.unsplash.com/photo-1600585152220-90363fe7e115?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2000&q=80');">
            <div class="absolute inset-0 gradient-overlay"></div>
        </div>
        
        <!-- Content -->
        <div class="absolute inset-0 flex items-center justify-center text-center px-4">
            <div class="max-w-4xl mx-auto">
                <div class="floating mb-8">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                </div>
                <h1 class="text-4xl md:text-6xl font-bold text-white mb-6 text-shadow pulse">
                    Give Your Furniture <span class="text-green-300">Second Life</span>
                </h1>
                <p class="text-xl md:text-2xl text-white mb-8 text-shadow max-w-2xl mx-auto">
                    Buy, donate or request preloved items in your community
                </p>
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <button class="bg-green-400 hover:bg-green-500 text-white px-8 py-4 rounded-lg font-medium transition-all transform hover:scale-105 shadow-lg">
                        Donate Now
                    </button>
                    <button class="bg-white hover:bg-gray-100 text-green-500 border-2 border-green-400 px-8 py-4 rounded-lg font-medium transition-all transform hover:scale-105 shadow-lg">
                        Browse Items
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 scroll-indicator">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
            </svg>
        </div>
        
        <!-- Slide Indicators -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 flex space-x-2">
            <button class="slide-indicator w-3 h-3 rounded-full bg-white bg-opacity-70 hover:bg-opacity-100 transition-all active" data-slide="0"></button>
            <button class="slide-indicator w-3 h-3 rounded-full bg-white bg-opacity-70 hover:bg-opacity-100 transition-all" data-slide="1"></button>
            <button class="slide-indicator w-3 h-3 rounded-full bg-white bg-opacity-70 hover:bg-opacity-100 transition-all" data-slide="2"></button>
            <button class="slide-indicator w-3 h-3 rounded-full bg-white bg-opacity-70 hover:bg-opacity-100 transition-all" data-slide="3"></button>
            <button class="slide-indicator w-3 h-3 rounded-full bg-white bg-opacity-70 hover:bg-opacity-100 transition-all" data-slide="4"></button>
        </div>
    </section>

    <!-- Stats Counter -->
    <section class="py-12 bg-green-500 text-white">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div class="animate__animated" data-animate="animate__fadeIn">
                    <div class="counter" data-count="1250">0</div>
                    <p class="text-xl">Items Shared</p>
                </div>
                <div class="animate__animated" data-animate="animate__fadeIn">
                    <div class="counter" data-count="850">0</div>
                    <p class="text-xl">Happy Users</p>
                </div>
                <div class="animate__animated" data-animate="animate__fadeIn">
                    <div class="counter" data-count="320">0</div>
                    <p class="text-xl">Tons Saved</p>
                </div>
                <div class="animate__animated" data-animate="animate__fadeIn">
                    <div class="counter" data-count="95">0</div>
                    <p class="text-xl">Cities Covered</p>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="py-16 bg-white" id="how-it-works">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12 animate__animated">How It Works</h2>
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Step 1 -->
                <div class="bg-gray-50 p-6 rounded-xl card-hover animate__animated" data-animate="animate__fadeInUp">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 floating">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-2">Upload Item</h3>
                    <p class="text-gray-600 text-center">List your preloved furniture with photos and details</p>
                </div>
                
                <!-- Step 2 -->
                <div class="bg-gray-50 p-6 rounded-xl card-hover animate__animated" data-animate="animate__fadeInUp" data-animate-delay="100">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 floating" style="animation-delay: 0.5s">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-2">Add Service</h3>
                    <p class="text-gray-600 text-center">Offer optional repair or delivery services</p>
                </div>
                
                <!-- Step 3 -->
                <div class="bg-gray-50 p-6 rounded-xl card-hover animate__animated" data-animate="animate__fadeInUp" data-animate-delay="200">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 floating" style="animation-delay: 1s">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-2">Get Rated</h3>
                    <p class="text-gray-600 text-center">Receive honest reviews from the community</p>
                </div>
                
                <!-- Step 4 -->
                <div class="bg-gray-50 p-6 rounded-xl card-hover animate__animated" data-animate="animate__fadeInUp" data-animate-delay="300">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 floating" style="animation-delay: 1.5s">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-2">Handover Tracked</h3>
                    <p class="text-gray-600 text-center">Complete the transaction with tracking</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Featured Items Section -->
    <section class="py-16 bg-gray-50" id="browse">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                <h2 class="text-3xl font-bold mb-4 md:mb-0">Featured Items</h2>
                <div class="flex flex-wrap gap-2">
                    <button class="px-4 py-2 bg-green-400 text-white rounded-lg transform transition-all hover:scale-105">All</button>
                    <button class="px-4 py-2 bg-white text-gray-700 rounded-lg hover:bg-gray-100 transform transition-all hover:scale-105">Free</button>
                    <button class="px-4 py-2 bg-white text-gray-700 rounded-lg hover:bg-gray-100 transform transition-all hover:scale-105">Top Rated</button>
                    <button class="px-4 py-2 bg-white text-gray-700 rounded-lg hover:bg-gray-100 transform transition-all hover:scale-105">Recently Added</button>
                </div>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Item 1 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md item-card">
                    <div class="relative overflow-hidden h-48">
                        <img src="https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Brown Sofa" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        <div class="absolute top-2 right-2 bg-green-400 text-white text-xs px-2 py-1 rounded-full animate-pulse">New</div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <h3 class="text-xl font-semibold">Brown Sofa Set</h3>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Colombo</span>
                        </div>
                        <div class="flex items-center mt-2">
                            <div class="flex text-yellow-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <span class="ml-1 text-gray-600">4.5 (12)</span>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-xl font-bold text-green-500">Free</span>
                            <button class="text-green-500 hover:text-green-600 font-medium transform hover:scale-110 transition-all">View Details</button>
                        </div>
                    </div>
                </div>
                
                <!-- Item 2 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md item-card">
                    <div class="relative overflow-hidden h-48">
                        <img src="https://images.unsplash.com/photo-1567538096630-e0c55bd6374c?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Wooden Table" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <h3 class="text-xl font-semibold">Wooden Dining Table</h3>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Kandy</span>
                        </div>
                        <div class="flex items-center mt-2">
                            <div class="flex text-yellow-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <span class="ml-1 text-gray-600">4.8 (7)</span>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-xl font-bold text-green-500">LKR 12,000</span>
                            <button class="text-green-500 hover:text-green-600 font-medium transform hover:scale-110 transition-all">View Details</button>
                        </div>
                    </div>
                </div>
                
                <!-- Item 3 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md item-card">
                    <div class="relative overflow-hidden h-48">
                        <img src="https://images.unsplash.com/photo-1598300042247-d088f8ab3a91?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Bookshelf" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                        <div class="absolute top-2 right-2 bg-yellow-400 text-white text-xs px-2 py-1 rounded-full">Popular</div>
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <h3 class="text-xl font-semibold">Vintage Bookshelf</h3>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Galle</span>
                        </div>
                        <div class="flex items-center mt-2">
                            <div class="flex text-yellow-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <span class="ml-1 text-gray-600">4.2 (5)</span>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-xl font-bold text-green-500">Free</span>
                            <button class="text-green-500 hover:text-green-600 font-medium transform hover:scale-110 transition-all">View Details</button>
                        </div>
                    </div>
                </div>
                
                <!-- Item 4 -->
                <div class="bg-white rounded-xl overflow-hidden shadow-md item-card">
                    <div class="relative overflow-hidden h-48">
                        <img src="https://images.unsplash.com/photo-1583845112203-29329902330e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Armchair" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="p-6">
                        <div class="flex justify-between items-start">
                            <h3 class="text-xl font-semibold">Comfy Armchair</h3>
                            <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded">Negombo</span>
                        </div>
                        <div class="flex items-center mt-2">
                            <div class="flex text-yellow-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                </svg>
                                <span class="ml-1 text-gray-600">4.7 (9)</span>
                            </div>
                        </div>
                        <div class="mt-4 flex justify-between items-center">
                            <span class="text-xl font-bold text-green-500">LKR 8,500</span>
                            <button class="text-green-500 hover:text-green-600 font-medium transform hover:scale-110 transition-all">View Details</button>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-10">
                <button class="px-6 py-3 bg-green-400 hover:bg-green-500 text-white rounded-lg font-medium transition-all transform hover:scale-105 shadow-lg btn-pulse">View All Items</button>
            </div>
        </div>
    </section>

    <!-- Why Choose REUSE Hub Section -->
    <section class="py-16 bg-white" id="about">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Why Choose REUSE Hub</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Benefit 1 -->
                <div class="bg-gray-50 p-6 rounded-xl card-hover">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 floating">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-2">Eco-Friendly Living</h3>
                    <p class="text-gray-600 text-center">Help reduce waste by giving furniture a second life instead of sending it to landfills</p>
                </div>
                
                <!-- Benefit 2 -->
                <div class="bg-gray-50 p-6 rounded-xl card-hover">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 floating" style="animation-delay: 0.3s">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-2">Community Driven</h3>
                    <p class="text-gray-600 text-center">Connect with locals who share your values of sustainability and reuse</p>
                </div>
                
                <!-- Benefit 3 -->
                <div class="bg-gray-50 p-6 rounded-xl card-hover">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 floating" style="animation-delay: 0.6s">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-2">Safe & Verified</h3>
                    <p class="text-gray-600 text-center">Our review system helps you identify trustworthy buyers and sellers</p>
                </div>
                
                <!-- Benefit 4 -->
                <div class="bg-gray-50 p-6 rounded-xl card-hover">
                    <div class="bg-green-100 w-16 h-16 rounded-full flex items-center justify-center mx-auto mb-4 floating" style="animation-delay: 0.9s">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-center mb-2">Optional Services</h3>
                    <p class="text-gray-600 text-center">We offer delivery and repair services to make your experience seamless</p>
                </div>
            </div>
        </div>
    </section>

    <!-- User Reviews Section -->
    <section class="py-16 bg-gray-50" id="reviews">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">What Our Community Says</h2>
            <div class="relative">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8" id="review-slider">
                    <!-- Review 1 -->
                    <div class="bg-white p-6 rounded-xl shadow-md review-slide">
                        <div class="flex items-center mb-4">
                            <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Amaya" class="w-12 h-12 rounded-full mr-4">
                            <div>
                                <h4 class="font-semibold">Amaya, Colombo</h4>
                                <div class="flex text-yellow-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600">"Found a perfect dining table for my new apartment at half the price of a new one. The seller even helped arrange delivery!"</p>
                    </div>
                    
                    <!-- Review 2 -->
                    <div class="bg-white p-6 rounded-xl shadow-md review-slide">
                        <div class="flex items-center mb-4">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Rajiv" class="w-12 h-12 rounded-full mr-4">
                            <div>
                                <h4 class="font-semibold">Rajiv, Kandy</h4>
                                <div class="flex text-yellow-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600">"I was moving and didn't want to throw away my perfectly good furniture. REUSE Hub helped me find new homes for everything!"</p>
                    </div>
                    
                    <!-- Review 3 -->
                    <div class="bg-white p-6 rounded-xl shadow-md review-slide">
                        <div class="flex items-center mb-4">
                            <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Nisha" class="w-12 h-12 rounded-full mr-4">
                            <div>
                                <h4 class="font-semibold">Nisha, Galle</h4>
                                <div class="flex text-yellow-400">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                    </svg>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="none" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z" />
                                    </svg>
                                </div>
                            </div>
                        </div>
                        <p class="text-gray-600">"The repair service option is brilliant! Got a slightly damaged cabinet fixed for a fraction of buying new. So happy with my purchase."</p>
                    </div>
                </div>
                
                <!-- Slider Controls -->
                <button class="absolute left-0 top-1/2 transform -translate-y-1/2 -ml-4 bg-white p-2 rounded-full shadow-md hover:bg-gray-100 z-10" id="prev-review">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                    </svg>
                </button>
                <button class="absolute right-0 top-1/2 transform -translate-y-1/2 -mr-4 bg-white p-2 rounded-full shadow-md hover:bg-gray-100 z-10" id="next-review">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
            </div>
        </div>
    </section>

    <!-- Blog Preview Section -->
    <section class="py-16 bg-white" id="blog">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">From Our Blog</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Blog 1 -->
                <div class="bg-gray-50 rounded-xl overflow-hidden shadow-md card-hover">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1600585152220-90363fe7e115?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Upcycling Furniture" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Tips for Upcycling Furniture</h3>
                        <p class="text-gray-600 mb-4">Learn how to transform old furniture into stylish pieces with these creative upcycling ideas.</p>
                        <a href="#" class="text-green-500 hover:text-green-600 font-medium flex items-center group">
                            Read More 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 transform group-hover:translate-x-1 transition-all" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Blog 2 -->
                <div class="bg-gray-50 rounded-xl overflow-hidden shadow-md card-hover">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1583847268964-b28dc8f51f92?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Eco Living" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">Eco Living at Home</h3>
                        <p class="text-gray-600 mb-4">Simple changes you can make to create a more sustainable home environment.</p>
                        <a href="#" class="text-green-500 hover:text-green-600 font-medium flex items-center group">
                            Read More 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 transform group-hover:translate-x-1 transition-all" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
                
                <!-- Blog 3 -->
                <div class="bg-gray-50 rounded-xl overflow-hidden shadow-md card-hover">
                    <div class="relative h-48 overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1600121848594-d8644e57abab?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=800&q=80" alt="Decluttering" class="w-full h-full object-cover transition-transform duration-500 hover:scale-110">
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-semibold mb-2">The Art of Decluttering</h3>
                        <p class="text-gray-600 mb-4">How to let go of items you no longer need in a sustainable way that benefits others.</p>
                        <a href="#" class="text-green-500 hover:text-green-600 font-medium flex items-center group">
                            Read More 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1 transform group-hover:translate-x-1 transition-all" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L12.586 11H5a1 1 0 110-2h7.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Newsletter Section -->
    <section class="py-16 bg-green-50" id="contact">
        <div class="container mx-auto px-6 max-w-4xl text-center">
            <h2 class="text-3xl font-bold mb-4">Stay in the Loop!</h2>
            <p class="text-xl text-gray-600 mb-8">Get reuse tips and item alerts right to your inbox.</p>
            <form class="flex flex-col sm:flex-row gap-4 justify-center">
                <input type="email" placeholder="Your email address" class="px-6 py-3 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-green-400 focus:border-transparent flex-grow max-w-md transition-all duration-300 focus:shadow-lg">
                <button type="submit" class="px-6 py-3 bg-green-400 hover:bg-green-500 text-white rounded-lg font-medium transition-all transform hover:scale-105 shadow-lg">Subscribe</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-gray-300 py-12">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- About -->
                <div>
                    <div class="flex items-center mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                        </svg>
                        <span class="ml-2 text-xl font-semibold text-white">REUSE Hub</span>
                    </div>
                    <p class="text-gray-400">REUSE Hub is your community-driven platform to give household items a second life through sharing and donation.</p>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-white text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-all">Home</a></li>
                        <li><a href="#donate" class="text-gray-400 hover:text-white transition-all">Donate</a></li>
                        <li><a href="#browse" class="text-gray-400 hover:text-white transition-all">Browse</a></li>
                        <li><a href="#contact" class="text-gray-400 hover:text-white transition-all">Contact</a></li>
                        <li><a href="#blog" class="text-gray-400 hover:text-white transition-all">Blog</a></li>
                        <li><a href="#transaction" class="text-gray-400 hover:text-white transition-all">Transaction</a></li>
                    </ul>
                </div>
                
                <!-- Contact -->
                <div>
                    <h3 class="text-white text-lg font-semibold mb-4">Contact Us</h3>
                    <ul class="space-y-2">
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-gray-400">hello@reusehub.com</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span class="text-gray-400">+94 112 345 678</span>
                        </li>
                        <li class="flex items-start">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 mt-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-gray-400">123 Green Lane, Colombo, Sri Lanka</span>
                        </li>
                    </ul>
                </div>
                
                <!-- Social -->
                <div>
                    <h3 class="text-white text-lg font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-400 hover:text-white transition-all transform hover:scale-125">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M22.675 0h-21.35c-.732 0-1.325.593-1.325 1.325v21.351c0 .731.593 1.324 1.325 1.324h11.495v-9.294h-3.128v-3.622h3.128v-2.671c0-3.1 1.893-4.788 4.659-4.788 1.325 0 2.463.099 2.795.143v3.24l-1.918.001c-1.504 0-1.795.715-1.795 1.763v2.313h3.587l-.467 3.622h-3.12v9.293h6.116c.73 0 1.323-.593 1.323-1.325v-21.35c0-.732-.593-1.325-1.325-1.325z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-all transform hover:scale-125">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="#" class="text-gray-400 hover:text-white transition-all transform hover:scale-125">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2025 REUSE Hub. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu toggle
        const mobileMenuButton = document.getElementById('mobile-menu-button');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Scroll progress bar
        window.addEventListener('scroll', () => {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            document.querySelector('.progress-bar').style.width = scrolled + '%';
            
            // Navbar effect on scroll
            if (window.scrollY > 50) {
                document.getElementById('navbar').classList.add('shadow-lg', 'bg-opacity-90');
                document.getElementById('navbar').classList.remove('shadow-md', 'bg-opacity-100');
            } else {
                document.getElementById('navbar').classList.remove('shadow-lg', 'bg-opacity-90');
                document.getElementById('navbar').classList.add('shadow-md', 'bg-opacity-100');
            }
        });

        // Banner Slideshow
        const slides = document.querySelectorAll('.banner-slide');
        const indicators = document.querySelectorAll('.slide-indicator');
        let currentSlide = 0;
        let slideInterval;
        
        // Initialize slideshow
        function startSlideshow() {
            slideInterval = setInterval(nextSlide, 5000);
        }
        
        // Go to specific slide
        function goToSlide(n) {
            slides[currentSlide].classList.remove('active');
            slides[currentSlide].classList.add('fade-out');
            
            // Reset all indicators
            indicators.forEach(ind => ind.classList.remove('active'));
            
            currentSlide = (n + slides.length) % slides.length;
            
            setTimeout(() => {
                slides[currentSlide].classList.remove('fade-out');
                slides[currentSlide].classList.add('active');
                indicators[currentSlide].classList.add('active');
            }, 100);
        }
        
        // Next slide
        function nextSlide() {
            goToSlide(currentSlide + 1);
        }
        
        // Previous slide
        function prevSlide() {
            goToSlide(currentSlide - 1);
        }
        
        // Click on indicator
        indicators.forEach(indicator => {
            indicator.addEventListener('click', () => {
                clearInterval(slideInterval);
                goToSlide(parseInt(indicator.getAttribute('data-slide')));
                startSlideshow();
            });
        });
        
        // Start the slideshow
        startSlideshow();
        
        // Pause on hover
        const banner = document.querySelector('.hero-banner');
        banner.addEventListener('mouseenter', () => {
            clearInterval(slideInterval);
        });
        
        banner.addEventListener('mouseleave', () => {
            startSlideshow();
        });
        
        // Touch events for mobile
        let touchStartX = 0;
        let touchEndX = 0;
        
        banner.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
            clearInterval(slideInterval);
        }, {passive: true});
        
        banner.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
            startSlideshow();
        }, {passive: true});
        
        function handleSwipe() {
            if (touchEndX < touchStartX - 50) {
                nextSlide();
            }
            if (touchEndX > touchStartX + 50) {
                prevSlide();
            }
        }

        // Review slider
        let currentReview = 0;
        const reviews = document.querySelectorAll('.review-slide');
        const totalReviews = reviews.length;
        
        function showReview(index) {
            reviews.forEach((review, i) => {
                review.style.display = i >= index && i < index + 3 ? 'block' : 'none';
            });
        }
        
        document.getElementById('next-review').addEventListener('click', () => {
            currentReview = (currentReview + 1) % (totalReviews - 2);
            showReview(currentReview);
        });
        
        document.getElementById('prev-review').addEventListener('click', () => {
            currentReview = (currentReview - 1 + (totalReviews - 2)) % (totalReviews - 2);
            showReview(currentReview);
        });
        
        // Initialize slider
        showReview(0);

        // Animate elements when they come into view
        const animateOnScroll = () => {
            const elements = document.querySelectorAll('[data-animate]');
            
            elements.forEach(element => {
                const elementPosition = element.getBoundingClientRect().top;
                const screenPosition = window.innerHeight / 1.3;
                
                if (elementPosition < screenPosition) {
                    const animation = element.getAttribute('data-animate');
                    element.classList.add(animation);
                }
            });
        };
        
        window.addEventListener('scroll', animateOnScroll);
        window.addEventListener('load', animateOnScroll);

        // Counter animation
        const counters = document.querySelectorAll('.counter');
        const speed = 200;
        
        function animateCounters() {
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-count');
                const count = +counter.innerText;
                const increment = target / speed;
                
                if (count < target) {
                    counter.innerText = Math.ceil(count + increment);
                    setTimeout(animateCounters, 1);
                } else {
                    counter.innerText = target;
                }
            });
        }
        
        // Start counter animation when counters are in view
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounters();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        counters.forEach(counter => {
            observer.observe(counter);
        });

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>
</html>