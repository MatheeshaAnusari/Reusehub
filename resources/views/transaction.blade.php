<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transaction History | REUSE Hub</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        :root {
            --primary: #10B981;
            --primary-dark: #059669;
            --secondary: #3B82F6;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #f5f7fa 0%, #e4f0f8 100%);
        }
        
        /* Card animations */
        .transaction-card {
            transition: all 0.3s ease;
            transform-origin: top;
            background: white;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05);
        }
        
        .transaction-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }
        
        /* Status badges */
        .status-badge {
            transition: all 0.3s ease;
        }
        
        /* Progress steps */
        .progress-step {
            transition: all 0.5s ease;
        }
        
        .progress-step.active {
            transform: scale(1.1);
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.2);
        }
        
        /* Tab animations */
        .tab-button {
            transition: all 0.3s ease;
            position: relative;
        }
        
        .tab-button.active::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(90deg, var(--primary) 0%, var(--secondary) 100%);
            border-radius: 3px;
            animation: tabUnderline 0.3s ease-out;
        }
        
        @keyframes tabUnderline {
            from { transform: scaleX(0); }
            to { transform: scaleX(1); }
        }
        
        /* Entry animations */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.5s ease-out forwards;
        }
        
        /* Pulse effect */
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0.4); }
            70% { box-shadow: 0 0 0 10px rgba(16, 185, 129, 0); }
            100% { box-shadow: 0 0 0 0 rgba(16, 185, 129, 0); }
        }
        
        /* Modal animations */
        .modal-content {
            transform: translateY(-20px);
            opacity: 0;
            transition: all 0.3s ease;
        }
        
        .modal.active .modal-content {
            transform: translateY(0);
            opacity: 1;
        }
        
        /* Button hover effects */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            transition: all 0.3s ease;
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
        
        /* Loading spinner */
        .spinner {
            animation: spin 1s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>
<body class="min-h-screen">
    <div class="container mx-auto px-4 py-8">
        <!-- Animated Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4 animate__animated animate__fadeInDown">
            <div>
                <h1 class="text-3xl font-bold bg-gradient-to-r from-green-600 to-blue-500 bg-clip-text text-transparent">
                    REUSE Hub Transactions
                </h1>
                <p class="text-gray-500 mt-1">Track your eco-friendly purchases and donations</p>
            </div>
            <div class="flex space-x-3">
                <button id="newDonationBtn" class="btn-primary text-white px-4 py-2 rounded-lg shadow-md">
                    <i class="fas fa-plus mr-2"></i>New Donation
                </button>
                <button class="bg-white hover:bg-gray-100 px-4 py-2 rounded-lg shadow-md transition-all duration-300 transform hover:scale-105 border border-gray-200">
                    <i class="fas fa-filter mr-2"></i>Filter
                </button>
            </div>
        </div>

        <!-- Status Tabs with Animation -->
        <div class="flex overflow-x-auto mb-8 pb-2 animate__animated animate__fadeIn">
            <button onclick="filterTransactions('all')" class="tab-button active px-4 py-2 font-medium text-gray-700 whitespace-nowrap">
                All Transactions
            </button>
            <button onclick="filterTransactions('pending')" class="tab-button px-4 py-2 font-medium text-yellow-600 whitespace-nowrap">
                <i class="fas fa-clock mr-2"></i>Pending
            </button>
            <button onclick="filterTransactions('in-progress')" class="tab-button px-4 py-2 font-medium text-blue-600 whitespace-nowrap">
                <i class="fas fa-truck-moving mr-2"></i>In Progress
            </button>
            <button onclick="filterTransactions('completed')" class="tab-button px-4 py-2 font-medium text-green-600 whitespace-nowrap">
                <i class="fas fa-check-circle mr-2"></i>Completed
            </button>
            <button onclick="filterTransactions('cancelled')" class="tab-button px-4 py-2 font-medium text-red-600 whitespace-nowrap">
                <i class="fas fa-times-circle mr-2"></i>Cancelled
            </button>
        </div>

        <!-- Transaction Cards Container -->
        <div id="transactions-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Transactions will be loaded here with animations -->
        </div>

        <!-- Loading State -->
        <div id="loading-state" class="text-center py-12 hidden">
            <div class="inline-block spinner border-4 border-gray-200 border-t-green-500 rounded-full w-12 h-12 mb-4"></div>
            <p class="text-gray-500">Loading transactions...</p>
        </div>

        <!-- Empty State -->
        <div id="empty-state" class="text-center py-12 hidden">
            <i class="fas fa-box-open text-4xl text-gray-300 mb-4"></i>
            <h3 class="text-xl font-medium text-gray-500">No transactions found</h3>
            <p class="text-gray-400 mt-2">Start by listing an item for donation</p>
            <button id="empty-state-btn" class="btn-primary text-white px-6 py-2 rounded-lg mt-4">
                <i class="fas fa-plus mr-2"></i>New Donation
            </button>
        </div>
    </div>

    <!-- New Donation Modal -->
    <div id="donationModal" class="fixed inset-0 bg-black bg-opacity-50 items-center justify-center hidden z-50">
        <div class="modal-content bg-white rounded-xl shadow-xl w-full max-w-2xl">
            <div class="flex justify-between items-center border-b p-6">
                <h2 class="text-2xl font-bold text-gray-800">List a New Item for Donation</h2>
                <button id="closeModal" class="text-gray-500 hover:text-gray-700 text-xl">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            
            <form id="donationForm" class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div>
                        <div class="mb-6">
                            <label class="block text-gray-700 font-medium mb-2">Item Name</label>
                            <input type="text" class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" placeholder="e.g. Wooden Dining Table" required>
                        </div>
                        
                        <div class="mb-6">
                            <label class="block text-gray-700 font-medium mb-2">Category</label>
                            <select class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" required>
                                <option value="">Select category</option>
                                <option value="furniture">Furniture</option>
                                <option value="electronics">Electronics</option>
                                <option value="clothing">Clothing</option>
                                <option value="books">Books</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                        
                        <div class="mb-6">
                            <label class="block text-gray-700 font-medium mb-2">Condition</label>
                            <div class="grid grid-cols-3 gap-3">
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="condition" class="text-green-500" checked>
                                    <span>Like New</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="condition" class="text-green-500">
                                    <span>Good</span>
                                </label>
                                <label class="flex items-center space-x-2">
                                    <input type="radio" name="condition" class="text-green-500">
                                    <span>Fair</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Column -->
                    <div>
                        <div class="mb-6">
                            <label class="block text-gray-700 font-medium mb-2">Photos</label>
                            <div class="border-2 border-dashed border-gray-300 rounded-lg p-6 text-center cursor-pointer hover:border-green-400 transition-colors">
                                <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-3"></i>
                                <p class="text-gray-600">Click to upload or drag and drop</p>
                                <p class="text-sm text-gray-400 mt-1">PNG, JPG up to 5MB</p>
                                <input type="file" class="hidden" multiple accept="image/*">
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="mb-6">
                    <label class="block text-gray-700 font-medium mb-2">Description</label>
                    <textarea class="w-full p-3 border rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent transition-all" rows="3" placeholder="Describe your item..." required></textarea>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Pricing</label>
                        <div class="flex items-center space-x-4">
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="pricing" class="text-green-500" checked>
                                <span>Free</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="radio" name="pricing" class="text-green-500">
                                <span>Set Price</span>
                            </label>
                        </div>
                        <div id="price-input" class="mt-3 hidden">
                            <label class="block text-gray-700 mb-1">Price (RM)</label>
                            <input type="number" class="w-full p-2 border rounded-lg" placeholder="0.00" min="0" step="0.01">
                        </div>
                    </div>
                    
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Services</label>
                        <div class="space-y-2">
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" class="text-green-500 rounded">
                                <span>Minor Repairs (+RM80)</span>
                            </label>
                            <label class="flex items-center space-x-2">
                                <input type="checkbox" class="text-green-500 rounded">
                                <span>Delivery Service (+RM50-100)</span>
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="flex justify-end space-x-3 pt-4 border-t">
                    <button type="button" id="cancelDonation" class="px-6 py-3 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 transition-colors">
                        Cancel
                    </button>
                    <button type="submit" class="btn-primary text-white px-6 py-3 rounded-lg shadow-md">
                        <i class="fas fa-leaf mr-2"></i> List Item
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Success Toast -->
    <div id="toast" class="fixed bottom-5 right-5 bg-green-500 text-white px-6 py-3 rounded-lg shadow-xl flex items-center transform translate-y-10 opacity-0 transition-all duration-300">
        <i class="fas fa-check-circle mr-3 text-xl"></i>
        <span id="toast-message">Transaction completed successfully!</span>
    </div>

    <script>
        // DOM Elements
        const newDonationBtn = document.getElementById('newDonationBtn');
        const donationModal = document.getElementById('donationModal');
        const closeModal = document.getElementById('closeModal');
        const cancelDonation = document.getElementById('cancelDonation');
        const donationForm = document.getElementById('donationForm');
        const transactionsContainer = document.getElementById('transactions-container');
        const loadingState = document.getElementById('loading-state');
        const emptyState = document.getElementById('empty-state');
        const emptyStateBtn = document.getElementById('empty-state-btn');
        const toast = document.getElementById('toast');

        // Sample transaction data
        const transactions = [
            {
                id: "RH-20250728-001",
                item: "Wooden Dining Table",
                image: "https://images.unsplash.com/photo-1559028012-481c04fa702d?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
                status: "completed",
                seller: "Sarah Johnson",
                sellerRating: 4.8,
                sellerReviews: 24,
                buyer: "Michael Chen",
                date: "July 28, 2025",
                services: ["Delivery (+RM50)"],
                total: 250,
                progress: [
                    { step: "Payment", completed: true, date: "Jul 25, 2025" },
                    { step: "Repairs", completed: true, date: "Jul 26, 2025" },
                    { step: "Shipping", completed: true, date: "Jul 27, 2025" },
                    { step: "Delivered", completed: true, date: "Jul 28, 2025" }
                ],
                environmentalImpact: {
                    co2Saved: "12kg",
                    wasteReduced: "1 furniture item"
                }
            },
            {
                id: "RH-20250725-045",
                item: "Leather Sofa Set",
                image: "https://images.unsplash.com/photo-1555041469-a586c61ea9bc?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
                status: "in-progress",
                seller: "David Wilson",
                sellerRating: 4.5,
                sellerReviews: 12,
                buyer: "You",
                date: "August 2, 2025",
                services: ["Minor Repairs (+RM80)", "Delivery (+RM60)"],
                total: 340,
                progress: [
                    { step: "Payment", completed: true, date: "Jul 25, 2025" },
                    { step: "Repairs", completed: true, date: "Jul 29, 2025" },
                    { step: "Shipping", completed: false, date: "Est. Aug 1, 2025" },
                    { step: "Delivered", completed: false, date: "Est. Aug 2, 2025" }
                ],
                environmentalImpact: {
                    co2Saved: "25kg",
                    wasteReduced: "1 furniture set"
                }
            },
            {
                id: "RH-20250720-012",
                item: "Vintage Bookshelf",
                image: "https://images.unsplash.com/photo-1592078615290-033ee584e267?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60",
                status: "pending",
                seller: "Emma Thompson",
                sellerRating: 4.2,
                sellerReviews: 8,
                buyer: "You",
                date: "July 25, 2025",
                services: [],
                total: 120,
                progress: [
                    { step: "Payment", completed: false, date: "Pending" },
                    { step: "Repairs", completed: false, date: "Pending" },
                    { step: "Shipping", completed: false, date: "Pending" },
                    { step: "Delivered", completed: false, date: "Pending" }
                ],
                environmentalImpact: {
                    co2Saved: "8kg",
                    wasteReduced: "1 wooden item"
                }
            }
        ];

        // Initialize the page
        document.addEventListener('DOMContentLoaded', () => {
            // Load transactions
            loadTransactions();
            
            // Set up tab button animations
            const tabButtons = document.querySelectorAll('.tab-button');
            tabButtons.forEach(button => {
                button.addEventListener('click', function() {
                    tabButtons.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                });
            });
            
            // Set up pricing toggle
            const pricingRadios = document.querySelectorAll('input[name="pricing"]');
            const priceInput = document.getElementById('price-input');
            
            pricingRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    priceInput.style.display = this.value === 'paid' ? 'block' : 'none';
                });
            });
        });

        // Modal functions
        newDonationBtn.addEventListener('click', openDonationModal);
        emptyStateBtn.addEventListener('click', openDonationModal);
        closeModal.addEventListener('click', closeModalHandler);
        cancelDonation.addEventListener('click', closeModalHandler);

        function openDonationModal() {
            donationModal.classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModalHandler() {
            donationModal.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside
        window.addEventListener('click', (e) => {
            if (e.target === donationModal) {
                closeModalHandler();
            }
        });

        // Form submission
        donationForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show loading state
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner spinner mr-2"></i> Processing...';
            submitBtn.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Reset button
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
                
                // Close modal
                closeModalHandler();
                
                // Show success toast
                showToast('Item listed successfully!');
                
                // Reset form
                this.reset();
                
                // Reload transactions (simulated)
                loadTransactions();
            }, 2000);
        });

        // Load transactions with animation
        function loadTransactions(filter = 'all') {
            loadingState.classList.remove('hidden');
            transactionsContainer.innerHTML = '';
            emptyState.classList.add('hidden');
            
            // Simulate API delay
            setTimeout(() => {
                loadingState.classList.add('hidden');
                
                let filteredTransactions = transactions;
                if (filter !== 'all') {
                    filteredTransactions = transactions.filter(t => t.status === filter);
                }
                
                if (filteredTransactions.length === 0) {
                    emptyState.classList.remove('hidden');
                    return;
                }
                
                filteredTransactions.forEach((transaction, index) => {
                    const card = createTransactionCard(transaction, index);
                    transactionsContainer.appendChild(card);
                });
            }, 1000);
        }

        // Create transaction card with animation
        function createTransactionCard(transaction, index) {
            const card = document.createElement('div');
            card.className = `transaction-card bg-white rounded-xl shadow-md overflow-hidden fade-in-up`;
            card.style.animationDelay = `${index * 0.1}s`;
            
            // Status styling
            let statusColor, statusBg, statusIcon, statusText;
            switch (transaction.status) {
                case "completed":
                    statusColor = "text-green-600";
                    statusBg = "bg-green-50";
                    statusIcon = "fa-check-circle";
                    statusText = "Completed";
                    break;
                case "in-progress":
                    statusColor = "text-blue-600";
                    statusBg = "bg-blue-50";
                    statusIcon = "fa-truck-moving";
                    statusText = "In Progress";
                    break;
                case "pending":
                    statusColor = "text-yellow-600";
                    statusBg = "bg-yellow-50";
                    statusIcon = "fa-clock";
                    statusText = "Pending";
                    break;
            }

            // Progress steps
            let progressSteps = "";
            if (transaction.status === "in-progress" || transaction.status === "completed") {
                const completedSteps = transaction.progress.filter(s => s.completed).length;
                const progressPercent = (completedSteps / transaction.progress.length) * 100;
                
                progressSteps = `
                    <div class="mt-6">
                        <div class="flex justify-between items-center mb-3">
                            <p class="text-gray-500 text-sm font-medium">Delivery Progress</p>
                            <p class="text-xs text-gray-400">Estimated completion: ${transaction.date}</p>
                        </div>
                        <div class="relative">
                            <div class="absolute h-1 bg-gray-200 rounded-full w-full top-1/2 transform -translate-y-1/2"></div>
                            <div class="absolute h-1 bg-green-500 rounded-full top-1/2 transform -translate-y-1/2" 
                                style="width: ${progressPercent}%"></div>
                            <div class="flex justify-between relative z-10">
                                ${transaction.progress.map((step, i) => `
                                    <div class="flex flex-col items-center">
                                        <div class="w-8 h-8 rounded-full ${step.completed ? 'bg-green-500' : 'bg-white border-2 border-gray-300'} flex items-center justify-center text-white mb-2 progress-step ${step.completed ? 'active' : ''}">
                                            ${step.completed ? `<i class="fas fa-check text-xs"></i>` : i+1}
                                        </div>
                                        <p class="text-xs text-center font-medium ${step.completed ? 'text-gray-800' : 'text-gray-500'}">${step.step}</p>
                                        <p class="text-xs text-gray-400 mt-1">${step.date}</p>
                                    </div>
                                `).join('')}
                            </div>
                        </div>
                    </div>
                `;
            }

            // Environmental impact
            let environmentalImpact = `
                <div class="mt-4 p-3 bg-teal-50 rounded-lg border border-teal-100">
                    <p class="text-teal-800 font-medium flex items-center">
                        <i class="fas fa-leaf mr-2"></i> Environmental Impact
                    </p>
                    <div class="grid grid-cols-2 gap-3 mt-2">
                        <div class="bg-white p-2 rounded-lg text-center">
                            <p class="text-xs text-gray-500">CO₂ Saved</p>
                            <p class="font-bold text-teal-600">${transaction.environmentalImpact.co2Saved}</p>
                        </div>
                        <div class="bg-white p-2 rounded-lg text-center">
                            <p class="text-xs text-gray-500">Waste Reduced</p>
                            <p class="font-bold text-teal-600">${transaction.environmentalImpact.wasteReduced}</p>
                        </div>
                    </div>
                </div>
            `;

            card.innerHTML = `
                <div class="p-6">
                    <div class="flex justify-between items-start mb-4">
                        <div class="flex items-start">
                            <div class="w-16 h-16 rounded-lg bg-gray-100 overflow-hidden mr-4 flex-shrink-0">
                                <img src="${transaction.image}" alt="${transaction.item}" class="w-full h-full object-cover">
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-800">${transaction.item}</h3>
                                <p class="text-gray-500 text-sm">Transaction ID: ${transaction.id}</p>
                            </div>
                        </div>
                        <span class="${statusBg} ${statusColor} px-3 py-1 rounded-full text-sm font-medium flex items-center status-badge">
                            <i class="fas ${statusIcon} mr-2"></i>${statusText}
                        </span>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-4">
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-gray-500 text-xs font-medium mb-1">SELLER</p>
                            <p class="font-medium text-gray-800">${transaction.seller}</p>
                            <div class="flex items-center mt-1">
                                <div class="flex">
                                    ${[...Array(5)].map((_, i) => `
                                        <i class="fas fa-star text-xs ${i < Math.floor(transaction.sellerRating) ? 'text-yellow-400' : 'text-gray-300'}"></i>
                                    `).join('')}
                                </div>
                                <span class="text-xs text-gray-500 ml-1">(${transaction.sellerReviews} reviews)</span>
                            </div>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-gray-500 text-xs font-medium mb-1">BUYER</p>
                            <p class="font-medium text-gray-800">${transaction.buyer}</p>
                            ${transaction.buyer === "You" ? `
                                <p class="text-xs text-gray-500 mt-1"><i class="fas fa-user-check mr-1"></i>Your purchase</p>
                            ` : ''}
                        </div>
                        <div class="bg-gray-50 p-3 rounded-lg">
                            <p class="text-gray-500 text-xs font-medium mb-1">${transaction.status === "completed" ? "COMPLETED ON" : "EST. COMPLETION"}</p>
                            <p class="font-medium text-gray-800">${transaction.date}</p>
                            <p class="text-xs text-gray-500 mt-1"><i class="fas ${statusIcon} mr-1"></i>${statusText}</p>
                        </div>
                    </div>
                    
                    <div class="bg-gray-50 rounded-lg p-4 mb-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-gray-500 text-xs font-medium mb-2">SERVICES INCLUDED</p>
                                <div class="flex flex-wrap gap-2">
                                    ${transaction.services.length > 0 ? 
                                        transaction.services.map(service => `
                                            <span class="bg-blue-50 text-blue-700 text-xs px-3 py-1 rounded-full">${service}</span>
                                        `).join('') : 
                                        '<span class="text-gray-400 text-sm">No additional services</span>'
                                    }
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="text-gray-500 text-xs font-medium mb-1">TOTAL AMOUNT</p>
                                <p class="text-xl font-bold text-green-500">RM${transaction.total}</p>
                                ${transaction.status === "completed" ? `
                                    <p class="text-xs text-green-600 mt-1"><i class="fas fa-check-circle mr-1"></i>Payment successful</p>
                                ` : ''}
                            </div>
                        </div>
                    </div>
                    
                    ${environmentalImpact}
                    
                    ${progressSteps}
                    
                    <div class="mt-6 flex flex-wrap justify-end gap-3">
                        <button class="bg-white hover:bg-gray-50 text-gray-700 px-4 py-2 rounded-lg border border-gray-200 transition-all transform hover:-translate-y-0.5">
                            <i class="fas fa-file-invoice mr-2"></i>View Receipt
                        </button>
                        ${transaction.status === "completed" ? `
                            <button class="bg-green-50 hover:bg-green-100 text-green-600 px-4 py-2 rounded-lg transition-all transform hover:-translate-y-0.5">
                                <i class="fas fa-star mr-2"></i>Leave Review
                            </button>
                        ` : ''}
                        ${transaction.status === "in-progress" ? `
                            <button class="bg-blue-50 hover:bg-blue-100 text-blue-600 px-4 py-2 rounded-lg transition-all transform hover:-translate-y-0.5">
                                <i class="fas fa-truck mr-2"></i>Track Delivery
                            </button>
                        ` : ''}
                    </div>
                </div>
            `;
            
            return card;
        }

        // Filter transactions
        function filterTransactions(status) {
            loadTransactions(status);
        }

        // Show toast notification
        function showToast(message) {
            const toastMessage = document.getElementById('toast-message');
            toastMessage.textContent = message;
            
            toast.classList.remove('translate-y-10', 'opacity-0');
            toast.classList.add('translate-y-0', 'opacity-100');
            
            setTimeout(() => {
                toast.classList.remove('translate-y-0', 'opacity-100');
                toast.classList.add('translate-y-10', 'opacity-0');
            }, 3000);
        }
    </script>
</body>
</html>