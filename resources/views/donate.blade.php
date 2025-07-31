<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>REUSE Hub - Donate Item</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-8px); }
    }
    @keyframes pulse {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.05); }
    }
    @keyframes bounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-5px); }
    }
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
      20%, 40%, 60%, 80% { transform: translateX(5px); }
    }
    @keyframes slideIn {
      from { transform: translateX(20px); opacity: 0; }
      to { transform: translateX(0); opacity: 1; }
    }
    .fade-in { animation: fadeIn 0.6s ease-out; }
    .floating { animation: float 3s ease-in-out infinite; }
    .pulse { animation: pulse 2s ease-in-out infinite; }
    .bounce { animation: bounce 1s ease-in-out infinite; }
    .shake { animation: shake 0.5s ease-in-out; }
    .success-animation {
      animation: fadeIn 0.6s ease-out, pulse 1.5s ease-in-out 0.6s infinite;
    }
    .chat-container {
      height: 300px;
      overflow-y: auto;
      scroll-behavior: smooth;
    }
    .chat-message {
      max-width: 80%;
      word-wrap: break-word;
      transition: all 0.3s ease;
    }
    .service-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
    .progress-bar {
      transition: width 0.5s ease-in-out;
    }
    .slide-in {
      animation: slideIn 0.5s ease-out forwards;
    }
    .confetti {
      position: fixed;
      pointer-events: none;
      z-index: 1000;
    }
    .payment-method:hover {
      transform: scale(1.02);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body class="bg-gradient-to-br from-green-50 to-teal-50 min-h-screen">

  <!-- Main Content -->
  <div class="max-w-4xl mx-auto p-4 md:p-6">
    <!-- Floating Eco Impact Counter -->
    <div class="floating bg-white p-4 rounded-xl shadow-md mb-6 flex justify-between items-center">
      <div class="text-center px-4">
        <div class="text-3xl font-bold text-green-600 pulse">♻️</div>
        <p class="text-sm text-gray-600 mt-1">Items donated</p>
        <p class="text-xl font-bold text-green-700">1,247</p>
      </div>
      <div class="text-center px-4 border-l border-r border-gray-200">
        <div class="text-3xl font-bold text-green-600 pulse">🌱</div>
        <p class="text-sm text-gray-600 mt-1">CO2 saved</p>
        <p class="text-xl font-bold text-green-700">8.2 tons</p>
      </div>
      <div class="text-center px-4">
        <div class="text-3xl font-bold text-green-600 pulse">💚</div>
        <p class="text-sm text-gray-600 mt-1">Happy recipients</p>
        <p class="text-xl font-bold text-green-700">932</p>
      </div>
    </div>

    <!-- Donation Form Container -->
    <div id="formContainer" class="bg-white rounded-xl shadow-xl overflow-hidden fade-in">
      <!-- Progress Bar -->
      <div class="h-2 bg-gray-200">
        <div id="progressBar" class="h-full bg-green-500 progress-bar" style="width: 33%"></div>
      </div>

      <!-- Form Steps Indicator -->
      <div class="flex border-b">
        <div class="step-tab w-1/3 py-4 text-center font-medium border-b-2 border-green-500 text-green-600">
          <i class="fas fa-info-circle mr-2"></i> Item Details
        </div>
        <div class="step-tab w-1/3 py-4 text-center font-medium text-gray-500">
          <i class="fas fa-cog mr-2"></i> Services
        </div>
        <div class="step-tab w-1/3 py-4 text-center font-medium text-gray-500">
          <i class="fas fa-credit-card mr-2"></i> Payment
        </div>
      </div>

      <!-- Step 1: Item Details -->
      <div id="step1" class="p-6 md:p-8 step-content">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center slide-in">
          <span class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center mr-3">1</span>
          Tell us about your item
        </h2>
        
        <div class="space-y-5">
          <!-- Item Name -->
          <div class="slide-in" style="animation-delay: 0.1s">
            <label class="block text-sm font-semibold mb-2">Item Name*</label>
            <input type="text" id="itemName" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 transition" placeholder="e.g. Wooden Chair" required />
          </div>

          <!-- Description -->
          <div class="slide-in" style="animation-delay: 0.2s">
            <label class="block text-sm font-semibold mb-2">Description*</label>
            <textarea id="itemDescription" rows="4" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 transition" placeholder="Brief description about the item" required></textarea>
          </div>

          <!-- Category -->
          <div class="slide-in" style="animation-delay: 0.3s">
            <label class="block text-sm font-semibold mb-2">Category*</label>
            <select id="itemCategory" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 transition appearance-none bg-white" required>
              <option value="">Select category</option>
              <option value="furniture">Furniture</option>
              <option value="electronics">Electronics</option>
              <option value="appliances">Appliances</option>
              <option value="clothing">Clothing</option>
              <option value="books">Books</option>
              <option value="others">Others</option>
            </select>
          </div>

          <!-- Condition -->
          <div class="slide-in" style="animation-delay: 0.35s">
            <label class="block text-sm font-semibold mb-2">Item Condition*</label>
            <select id="itemCondition" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-400 transition appearance-none bg-white" required>
              <option value="">Select condition</option>
              <option value="new">New</option>
              <option value="excellent">Excellent</option>
              <option value="good">Good</option>
              <option value="fair">Fair</option>
              <option value="needs-repair">Needs Repair</option>
            </select>
          </div>

          <!-- Price Section -->
          <div class="slide-in" style="animation-delay: 0.4s">
            <label class="block text-sm font-semibold mb-2">Pricing Option*</label>
            <div class="space-y-3">
              <div class="flex items-center">
                <input type="radio" id="freeOption" name="pricingOption" value="free" class="h-5 w-5 text-green-500 focus:ring-green-400" checked>
                <label for="freeOption" class="ml-3 block text-sm font-medium text-gray-700">
                  Free Donation
                  <span class="text-xs text-gray-500">(Item will be given away for free)</span>
                </label>
              </div>
              
              <div class="flex items-center">
                <input type="radio" id="fixedPriceOption" name="pricingOption" value="fixed" class="h-5 w-5 text-green-500 focus:ring-green-400">
                <label for="fixedPriceOption" class="ml-3 block text-sm font-medium text-gray-700">
                  Fixed Price
                </label>
              </div>
              
              <div id="priceInputContainer" class="ml-8 hidden">
                <label class="block text-sm font-medium text-gray-700 mb-1">Price (LKR)</label>
                <div class="relative rounded-md shadow-sm">
                  <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm">Rs.</span>
                  </div>
                  <input type="number" id="itemPrice" min="0" step="100" class="focus:ring-green-500 focus:border-green-500 block w-full pl-12 pr-12 sm:text-sm border-gray-300 rounded-md p-2 border" placeholder="0.00">
                  <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                    <span class="text-gray-500 sm:text-sm">.00</span>
                  </div>
                </div>
                <p class="mt-1 text-xs text-gray-500">Please set a reasonable price to help your item find a new home</p>
              </div>
              
              <div class="flex items-center">
                <input type="radio" id="negotiableOption" name="pricingOption" value="negotiable" class="h-5 w-5 text-green-500 focus:ring-green-400">
                <label for="negotiableOption" class="ml-3 block text-sm font-medium text-gray-700">
                  Negotiable Price
                  <span class="text-xs text-gray-500">(Buyers can make offers)</span>
                </label>
              </div>
            </div>
          </div>

          <!-- Images -->
          <div class="slide-in" style="animation-delay: 0.5s">
            <label class="block text-sm font-semibold mb-2">Upload Item Images*</label>
            <div class="border-2 border-dashed border-green-300 rounded-lg p-6 text-center bg-green-50 cursor-pointer transition hover:bg-green-100 hover:border-green-400">
              <input type="file" id="itemImages" accept="image/*" multiple class="hidden" required />
              <label for="itemImages" class="block cursor-pointer">
                <i class="fas fa-cloud-upload-alt text-3xl text-green-400 mb-2"></i>
                <p class="text-green-600 font-medium">Click to upload photos</p>
                <p class="text-sm text-green-500 mt-1">Max 5 photos (2MB each)</p>
              </label>
            </div>
            <div id="previewContainer" class="flex flex-wrap mt-4 gap-4"></div>
          </div>

          <div class="flex justify-end pt-2 slide-in" style="animation-delay: 0.6s">
            <button type="button" id="nextToStep2" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition transform hover:scale-105 active:scale-95">
              Next: Services <i class="fas fa-arrow-right ml-2 bounce"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Step 2: Services -->
      <div id="step2" class="p-6 md:p-8 step-content hidden">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
          <span class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center mr-3">2</span>
          Select Additional Services
        </h2>
        
        <div class="space-y-5">
          <!-- Donation Type (now moved to Step 1) -->
          
          <!-- Optional Services -->
          <div class="pt-4 border-t slide-in" style="animation-delay: 0.1s">
            <label class="block text-sm font-semibold mb-3">Optional Services</label>
            <div class="space-y-3">
              <label class="service-card flex items-start p-4 border border-gray-200 rounded-lg cursor-pointer transition">
                <input type="checkbox" name="service" value="pickup" class="mt-1 mr-3 h-5 w-5 text-green-500 rounded focus:ring-green-400">
                <div>
                  <span class="font-medium">🚛 Pickup Service</span>
                  <p class="text-gray-500 text-sm mt-1">We'll collect the item from your location</p>
                  <p class="text-green-600 font-bold mt-2">Rs. 300</p>
                </div>
              </label>

              <label class="service-card flex items-start p-4 border border-gray-200 rounded-lg cursor-pointer transition">
                <input type="checkbox" name="service" value="repair" class="mt-1 mr-3 h-5 w-5 text-green-500 rounded focus:ring-green-400">
                <div>
                  <span class="font-medium">🛠 Repair Service</span>
                  <p class="text-gray-500 text-sm mt-1">We'll fix minor damages before donation</p>
                  <p class="text-green-600 font-bold mt-2">Rs. 500</p>
                </div>
              </label>

              <label class="service-card flex items-start p-4 border border-gray-200 rounded-lg cursor-pointer transition">
                <input type="checkbox" name="service" value="cleaning" class="mt-1 mr-3 h-5 w-5 text-green-500 rounded focus:ring-green-400">
                <div>
                  <span class="font-medium">🧼 Cleaning Service</span>
                  <p class="text-gray-500 text-sm mt-1">We'll professionally clean your item</p>
                  <p class="text-green-600 font-bold mt-2">Rs. 400</p>
                </div>
              </label>
            </div>
          </div>

          <div class="flex justify-between pt-4 slide-in" style="animation-delay: 0.2s">
            <button type="button" id="backToStep1" class="text-gray-600 px-6 py-3 rounded-lg border hover:bg-gray-100 transition transform hover:scale-105 active:scale-95">
              <i class="fas fa-arrow-left mr-2"></i> Back
            </button>
            <button type="button" id="nextToStep3" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition transform hover:scale-105 active:scale-95">
              Next: Payment <i class="fas fa-arrow-right ml-2 bounce"></i>
            </button>
          </div>
        </div>
      </div>

      <!-- Step 3: Payment -->
      <div id="step3" class="p-6 md:p-8 step-content hidden">
        <h2 class="text-2xl font-bold text-gray-800 mb-6 flex items-center">
          <span class="w-8 h-8 bg-green-100 text-green-600 rounded-full flex items-center justify-center mr-3">3</span>
          Complete Your Donation
        </h2>
        
        <div class="space-y-6">
          <!-- Order Summary -->
          <div class="bg-gray-50 p-5 rounded-xl border border-gray-200 slide-in">
            <h3 class="font-semibold text-gray-700 mb-3">Order Summary</h3>
            <div id="orderSummary" class="space-y-2 mb-3">
              <!-- Will be populated by JavaScript -->
            </div>
            <div class="pt-3 border-t">
              <div class="flex justify-between font-medium">
                <span>Total:</span>
                <span id="paymentTotal" class="text-green-600">Rs. 0</span>
              </div>
            </div>
          </div>

          <!-- Payment Methods -->
          <div class="slide-in" style="animation-delay: 0.1s">
            <h3 class="block text-sm font-semibold mb-3">Select Payment Method</h3>
            <div class="grid grid-cols-2 gap-4">
              <!-- Visa -->
              <label class="payment-method p-4 border border-gray-200 rounded-lg hover:border-green-400 transition cursor-pointer has-[input:checked]:border-green-500 has-[input:checked]:bg-green-50">
                <input type="radio" name="paymentMethod" value="visa" class="hidden" checked>
                <div class="flex items-center">
                  <div class="w-5 h-5 rounded-full border-2 border-gray-300 mr-3 flex-shrink-0 flex items-center justify-center">
                    <div class="w-3 h-3 rounded-full bg-green-500"></div>
                  </div>
                  <img src="https://upload.wikimedia.org/wikipedia/commons/5/5e/Visa_Inc._logo.svg" alt="Visa" class="h-6">
                </div>
              </label>

              <!-- Mastercard -->
              <label class="payment-method p-4 border border-gray-200 rounded-lg hover:border-green-400 transition cursor-pointer has-[input:checked]:border-green-500 has-[input:checked]:bg-green-50">
                <input type="radio" name="paymentMethod" value="mastercard" class="hidden">
                <div class="flex items-center">
                  <div class="w-5 h-5 rounded-full border-2 border-gray-300 mr-3 flex-shrink-0 flex items-center justify-center">
                    <div class="w-3 h-3 rounded-full bg-green-500 hidden"></div>
                  </div>
                  <img src="https://upload.wikimedia.org/wikipedia/commons/2/2a/Mastercard-logo.svg" alt="Mastercard" class="h-6">
                </div>
              </label>
            </div>
          </div>

          <div class="flex justify-between pt-4 slide-in" style="animation-delay: 0.2s">
            <button type="button" id="backToStep2" class="text-gray-600 px-6 py-3 rounded-lg border hover:bg-gray-100 transition transform hover:scale-105 active:scale-95">
              <i class="fas fa-arrow-left mr-2"></i> Back
            </button>
            <button type="button" id="submitPayment" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition transform hover:scale-105 active:scale-95">
              Complete Payment <i class="fas fa-lock ml-2"></i>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Success Message (Hidden Initially) -->
    <div id="successMessage" class="bg-white rounded-xl shadow-xl p-6 md:p-8 text-center hidden success-animation mt-8">
      <div class="w-24 h-24 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
        <i class="fas fa-check text-4xl text-green-600"></i>
      </div>
      <h2 class="text-2xl font-bold text-gray-800 mb-2">Donation Complete!</h2>
      <p class="text-gray-600 mb-6">Thank you for your generosity. Your item will soon find a new home.</p>
      
      <!-- Impact Visualization -->
      <div class="bg-green-50 p-4 rounded-lg mb-6">
        <div class="flex items-center justify-center mb-3">
          <div class="w-12 h-12 bg-green-200 rounded-full flex items-center justify-center mr-3">
            <i class="fas fa-leaf text-green-600"></i>
          </div>
          <div>
            <p class="text-sm text-gray-600">You've helped reduce waste by</p>
            <p class="text-xl font-bold text-green-700">15 kg</p>
          </div>
        </div>
        <div class="w-full bg-gray-200 rounded-full h-2.5">
          <div class="bg-green-600 h-2.5 rounded-full" style="width: 75%"></div>
        </div>
      </div>
      
      <!-- Chat Section -->
      <div class="bg-gray-50 p-4 rounded-lg mb-6 text-left">
        <h3 class="font-medium text-gray-700 mb-3 flex items-center">
          <i class="fas fa-comments text-green-600 mr-2"></i>
          Chat with Potential Recipients
        </h3>
        <div class="chat-container bg-white p-4 rounded-lg border border-gray-200 mb-3">
          <div class="space-y-3" id="chatMessages">
            <div class="flex justify-start">
              <div class="chat-message bg-gray-100 p-3 rounded-lg">
                <p class="font-medium">REUSE Hub Bot</p>
                <p>Your item is now listed! Recipients can contact you here.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="flex space-x-2">
          <input type="text" id="chatInput" placeholder="Type your message..." class="flex-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-green-400 transition">
          <button id="sendMessage" class="bg-green-600 text-white px-4 py-2 rounded-lg hover:bg-green-700 transition">
            <i class="fas fa-paper-plane"></i>
          </button>
        </div>
      </div>
      
      <button id="newDonationBtn" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition transform hover:scale-105 active:scale-95">
        <i class="fas fa-plus mr-2"></i> Start New Donation
      </button>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // DOM Elements
      const form = document.getElementById('donationForm');
      const stepTabs = document.querySelectorAll('.step-tab');
      const stepContents = document.querySelectorAll('.step-content');
      const progressBar = document.getElementById('progressBar');
      const nextToStep2 = document.getElementById('nextToStep2');
      const nextToStep3 = document.getElementById('nextToStep3');
      const backToStep1 = document.getElementById('backToStep1');
      const backToStep2 = document.getElementById('backToStep2');
      const submitPayment = document.getElementById('submitPayment');
      const newDonationBtn = document.getElementById('newDonationBtn');
      const formContainer = document.getElementById('formContainer');
      const successMessage = document.getElementById('successMessage');
      
      // Form elements
      const pricingOptions = document.querySelectorAll('input[name="pricingOption"]');
      const priceInputContainer = document.getElementById('priceInputContainer');
      const itemPrice = document.getElementById('itemPrice');
      const itemImages = document.getElementById('itemImages');
      const previewContainer = document.getElementById('previewContainer');
      const orderSummary = document.getElementById('orderSummary');
      const paymentTotal = document.getElementById('paymentTotal');
      const serviceCheckboxes = document.querySelectorAll('input[name="service"]');
      
      // Chat elements
      const chatMessages = document.getElementById('chatMessages');
      const chatInput = document.getElementById('chatInput');
      const sendMessage = document.getElementById('sendMessage');

      // Variables
      let currentStep = 1;
      let selectedImages = [];
      let hasPickup = false;
      let hasRepair = false;
      let hasCleaning = false;

      // Initialize
      updateStepIndicator();
      setupEventListeners();

      function setupEventListeners() {
        // Pricing option changes
        pricingOptions.forEach(option => {
          option.addEventListener('change', function() {
            priceInputContainer.classList.toggle('hidden', this.value !== 'fixed');
            updateOrderSummary();
          });
        });

        // Price input changes
        itemPrice.addEventListener('input', updateOrderSummary);

        // Image upload
        itemImages.addEventListener('change', handleImageUpload);

        // Service checkboxes
        serviceCheckboxes.forEach(checkbox => {
          checkbox.addEventListener('change', function() {
            if (this.value === 'pickup') hasPickup = this.checked;
            if (this.value === 'repair') hasRepair = this.checked;
            if (this.value === 'cleaning') hasCleaning = this.checked;
            updateOrderSummary();
            
            // Add visual feedback
            if (this.checked) {
              this.closest('label').classList.add('border-green-400', 'bg-green-50');
            } else {
              this.closest('label').classList.remove('border-green-400', 'bg-green-50');
            }
          });
        });

        // Navigation buttons
        nextToStep2.addEventListener('click', goToStep2);
        nextToStep3.addEventListener('click', goToStep3);
        backToStep1.addEventListener('click', goBackToStep1);
        backToStep2.addEventListener('click', goBackToStep2);
        submitPayment.addEventListener('click', processPayment);
        newDonationBtn.addEventListener('click', resetForm);

        // Chat functionality
        sendMessage.addEventListener('click', sendChatMessage);
        chatInput.addEventListener('keypress', function(e) {
          if (e.key === 'Enter') sendChatMessage();
        });
      }

      function handleImageUpload(event) {
        const files = Array.from(event.target.files);
        selectedImages = [];
        previewContainer.innerHTML = '';
        
        files.slice(0, 5).forEach(file => {
          if (file.type.startsWith('image/')) {
            const reader = new FileReader();
            reader.onload = (e) => {
              selectedImages.push({ file, url: e.target.result });
              renderPreviews();
            };
            reader.readAsDataURL(file);
          }
        });
      }

      function renderPreviews() {
        previewContainer.innerHTML = '';
        selectedImages.forEach((img, index) => {
          const imgBox = document.createElement('div');
          imgBox.className = 'relative w-24 h-24 border border-gray-300 rounded-lg overflow-hidden transition transform hover:scale-105';

          const image = document.createElement('img');
          image.src = img.url;
          image.className = 'object-cover w-full h-full';

          const btn = document.createElement('button');
          btn.className = 'absolute top-1 right-1 bg-red-600 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs transition hover:bg-red-700';
          btn.innerHTML = '✕';
          btn.onclick = () => {
            selectedImages.splice(index, 1);
            
            // Show confirmation animation before removing
            btn.innerHTML = '✓';
            btn.classList.remove('bg-red-600', 'hover:bg-red-700');
            btn.classList.add('bg-green-500', 'hover:bg-green-600');
            setTimeout(() => {
              renderPreviews();
            }, 500);
          };

          imgBox.appendChild(image);
          imgBox.appendChild(btn);
          previewContainer.appendChild(imgBox);
        });
      }

      function updateOrderSummary() {
        const selectedPricingOption = document.querySelector('input[name="pricingOption"]:checked').value;
        let priceText = '';
        
        if (selectedPricingOption === 'free') {
          priceText = 'Free Donation';
        } else if (selectedPricingOption === 'fixed') {
          priceText = itemPrice.value ? `Rs. ${itemPrice.value}` : 'Rs. 0';
        } else if (selectedPricingOption === 'negotiable') {
          priceText = 'Negotiable Price';
        }

        let summaryHTML = `
          <div class="flex justify-between pb-2 border-b">
            <span>${document.getElementById('itemName').value}</span>
            <span>${priceText}</span>
          </div>
        `;

        let total = selectedPricingOption === 'fixed' && itemPrice.value ? parseInt(itemPrice.value) : 0;
        
        if (hasPickup) {
          summaryHTML += `
            <div class="flex justify-between text-sm text-gray-600">
              <span>Pickup Service</span>
              <span>Rs. 300</span>
            </div>
          `;
          total += 300;
        }

        if (hasRepair) {
          summaryHTML += `
            <div class="flex justify-between text-sm text-gray-600">
              <span>Repair Service</span>
              <span>Rs. 500</span>
            </div>
          `;
          total += 500;
        }

        if (hasCleaning) {
          summaryHTML += `
            <div class="flex justify-between text-sm text-gray-600">
              <span>Cleaning Service</span>
              <span>Rs. 400</span>
            </div>
          `;
          total += 400;
        }

        orderSummary.innerHTML = summaryHTML;
        paymentTotal.textContent = `Rs. ${total}`;
      }

      function validateStep1() {
        const requiredFields = [
          document.getElementById('itemName'),
          document.getElementById('itemDescription'),
          document.getElementById('itemCategory'),
          document.getElementById('itemCondition')
        ];

        let isValid = true;
        requiredFields.forEach(field => {
          if (!field.value) {
            field.classList.add('border-red-500', 'shake');
            setTimeout(() => {
              field.classList.remove('shake');
            }, 500);
            isValid = false;
          } else {
            field.classList.remove('border-red-500');
          }
        });

        // Validate fixed price if selected
        const pricingOption = document.querySelector('input[name="pricingOption"]:checked').value;
        if (pricingOption === 'fixed' && (!itemPrice.value || parseInt(itemPrice.value) <= 0)) {
          priceInputContainer.classList.add('shake');
          setTimeout(() => {
            priceInputContainer.classList.remove('shake');
          }, 500);
          isValid = false;
        }

        if (!isValid) {
          showErrorMessage('Please fill in all required fields');
          return false;
        }

        if (selectedImages.length === 0) {
          showErrorMessage('Please upload at least one photo');
          // Shake the upload area
          const uploadArea = document.querySelector('[for="itemImages"]');
          uploadArea.classList.add('shake');
          setTimeout(() => {
            uploadArea.classList.remove('shake');
          }, 500);
          return false;
        }

        return true;
      }

      function showErrorMessage(message) {
        // Show error message with animation
        const errorMsg = document.createElement('div');
        errorMsg.className = 'bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4 fade-in';
        errorMsg.innerHTML = `<i class="fas fa-exclamation-circle mr-2"></i> ${message}`;
        formContainer.prepend(errorMsg);
        
        // Remove after 3 seconds
        setTimeout(() => {
          errorMsg.classList.add('opacity-0', 'transition-opacity', 'duration-300');
          setTimeout(() => errorMsg.remove(), 300);
        }, 3000);
      }

      function goToStep2() {
        if (validateStep1()) {
          currentStep = 2;
          updateStepIndicator();
          updateOrderSummary();
          animateElements();
        }
      }

      function goToStep3() {
        currentStep = 3;
        updateStepIndicator();
        updateOrderSummary();
        animateElements();
      }

      function goBackToStep1() {
        currentStep = 1;
        updateStepIndicator();
        animateElements();
      }

      function goBackToStep2() {
        currentStep = 2;
        updateStepIndicator();
        animateElements();
      }

      function updateStepIndicator() {
        // Update progress bar
        progressBar.style.width = `${(currentStep / 3) * 100}%`;
        
        // Update tabs
        stepTabs.forEach((tab, index) => {
          if (index < currentStep - 1) {
            // Completed steps
            tab.classList.remove('text-gray-500');
            tab.classList.add('text-green-600', 'border-green-500');
          } else if (index === currentStep - 1) {
            // Current step
            tab.classList.remove('text-gray-500');
            tab.classList.add('text-green-600', 'border-green-500');
          } else {
            // Future steps
            tab.classList.remove('text-green-600', 'border-green-500');
            tab.classList.add('text-gray-500');
          }
        });

        // Update content visibility
        stepContents.forEach((content, index) => {
          if (index === currentStep - 1) {
            content.classList.remove('hidden');
          } else {
            content.classList.add('hidden');
          }
        });
      }

      function animateElements() {
        // Animate all slide-in elements
        document.querySelectorAll('.slide-in').forEach((el, i) => {
          el.style.animationDelay = `${i * 0.1}s`;
          el.classList.add('slide-in');
        });
      }

      function processPayment() {
        // Show loading state
        submitPayment.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Processing...';
        submitPayment.disabled = true;
        
        // Simulate payment processing
        setTimeout(() => {
          // Hide form, show success message
          formContainer.classList.add('hidden');
          successMessage.classList.remove('hidden');
          
          // Add confetti effect
          addConfetti();
          
          // Reset payment button
          submitPayment.innerHTML = 'Complete Payment <i class="fas fa-lock ml-2"></i>';
          submitPayment.disabled = false;
        }, 2000);
      }

      function addConfetti() {
        // Create confetti container
        const confettiContainer = document.createElement('div');
        confettiContainer.className = 'fixed inset-0 pointer-events-none z-50 overflow-hidden';
        document.body.appendChild(confettiContainer);
        
        const emojis = ['♻️', '🌱', '💚', '🛋️', '📱', '🪑'];
        const colors = ['#10B981', '#059669', '#047857', '#065F46', '#064E3B'];
        
        for (let i = 0; i < 100; i++) {
          const confetti = document.createElement('div');
          confetti.className = 'confetti absolute text-2xl opacity-0';
          confetti.textContent = emojis[Math.floor(Math.random() * emojis.length)];
          confetti.style.left = `${Math.random() * 100}vw`;
          confetti.style.top = '-50px';
          confetti.style.transform = `rotate(${Math.random() * 360}deg)`;
          confetti.style.color = colors[Math.floor(Math.random() * colors.length)];
          confettiContainer.appendChild(confetti);
          
          // Animate each confetti piece
          setTimeout(() => {
            confetti.style.opacity = '1';
            confetti.style.transition = `top ${2 + Math.random() * 3}s linear, transform ${1 + Math.random() * 2}s linear`;
            confetti.style.top = `${100 + Math.random() * 20}vh`;
            confetti.style.transform = `rotate(${Math.random() * 720}deg)`;
          }, i * 30);
        }
        
        // Remove after animation
        setTimeout(() => {
          confettiContainer.remove();
        }, 5000);
      }

      function sendChatMessage() {
        if (chatInput.value.trim()) {
          addMessage(chatInput.value, 'outgoing');
          chatInput.value = '';
          
          // Simulate reply after 1 second
          setTimeout(() => {
            addMessage("Hi! I'm interested in your item. Is it still available?", 'incoming');
          }, 1000);
        }
      }

      function addMessage(text, direction) {
        const messageDiv = document.createElement('div');
        messageDiv.className = `flex ${direction === 'outgoing' ? 'justify-end' : 'justify-start'} fade-in`;
        
        const messageContent = document.createElement('div');
        messageContent.className = `chat-message ${direction === 'outgoing' ? 'bg-green-100 text-gray-800' : 'bg-gray-100'} p-3 rounded-lg`;
        
        if (direction === 'outgoing') {
          messageContent.innerHTML = `<p>${text}</p>`;
        } else {
          messageContent.innerHTML = `
            <p class="font-medium">Potential Recipient</p>
            <p>${text}</p>
          `;
        }
        
        messageDiv.appendChild(messageContent);
        chatMessages.appendChild(messageDiv);
        
        // Scroll to bottom
        chatMessages.scrollTop = chatMessages.scrollHeight;
      }

      function resetForm() {
        // Reset form
        document.getElementById('itemName').value = '';
        document.getElementById('itemDescription').value = '';
        document.getElementById('itemCategory').value = '';
        document.getElementById('itemCondition').value = '';
        document.getElementById('freeOption').checked = true;
        document.getElementById('itemPrice').value = '';
        selectedImages = [];
        previewContainer.innerHTML = '';
        priceInputContainer.classList.add('hidden');
        hasPickup = false;
        hasRepair = false;
        hasCleaning = false;
        chatMessages.innerHTML = `
          <div class="flex justify-start">
            <div class="chat-message bg-gray-100 p-3 rounded-lg">
              <p class="font-medium">REUSE Hub Bot</p>
              <p>Your item is now listed! Recipients can contact you here.</p>
            </div>
          </div>
        `;
        
        // Reset UI
        currentStep = 1;
        updateStepIndicator();
        updateOrderSummary();
        
        // Show form, hide success message
        formContainer.classList.remove('hidden');
        successMessage.classList.add('hidden');
        
        // Reset service checkboxes
        serviceCheckboxes.forEach(checkbox => {
          checkbox.checked = false;
          checkbox.closest('label').classList.remove('border-green-400', 'bg-green-50');
        });
      }
    });
  </script>
</body>
</html>