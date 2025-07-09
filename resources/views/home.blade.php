<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>REUSE Hub</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 text-gray-900">

    {{-- Navbar --}}
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 py-5 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-blue-700 tracking-wide">♻ REUSE Hub</h1>
            <div class="space-x-6 text-sm font-medium">
                <a href="#" class="text-gray-600 hover:text-blue-600 transition">Home</a>
                <a href="#" class="text-gray-600 hover:text-blue-600 transition">Donate</a>
                <a href="#" class="text-gray-600 hover:text-blue-600 transition">Browse</a>
                <a href="#" class="text-gray-600 hover:text-blue-600 transition">About</a>
                <a href="#" class="text-gray-600 hover:text-blue-600 transition">Transaction</a>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="bg-gradient-to-r from-blue-600 to-blue-500 text-white py-24 px-6 text-center">
        <h2 class="text-5xl font-extrabold mb-6">Give Old Things a New Life</h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">REUSE Hub is your one-stop eco-friendly platform for donating, sharing, and reusing furniture and household items with review support and service options.</p>
        <div class="flex justify-center gap-4">
            <a href="#" class="bg-white text-blue-600 font-semibold px-6 py-3 rounded-lg shadow hover:bg-gray-100 transition duration-300">Start Donating</a>
            <a href="#" class="border border-white px-6 py-3 rounded-lg hover:bg-white hover:text-blue-600 transition duration-300">Browse Items</a>
        </div>
    </section>

    {{-- Features Section --}}
    <section class="py-20 px-6 bg-white">
        <div class="max-w-6xl mx-auto text-center mb-12">
            <h3 class="text-3xl font-bold mb-2">Why Choose REUSE Hub?</h3>
            <p class="text-gray-600">Empowering sustainable living through technology and trust.</p>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-10 text-center">
            <div class="p-6 rounded-xl bg-blue-50 hover:shadow-lg transition">
                <h4 class="text-xl font-semibold mb-3 text-blue-700">⭐ Verified Reviews</h4>
                <p>All items come with honest reviews and seller ratings to help build trust and confidence.</p>
            </div>
            <div class="p-6 rounded-xl bg-green-50 hover:shadow-lg transition">
                <h4 class="text-xl font-semibold mb-3 text-green-700">🛠 Repair Options</h4>
                <p>Choose to repair your items before reuse using our built-in technician booking feature.</p>
            </div>
            <div class="p-6 rounded-xl bg-yellow-50 hover:shadow-lg transition">
                <h4 class="text-xl font-semibold mb-3 text-yellow-700">🚚 Seamless Delivery</h4>
                <p>Enjoy easy pick-up and delivery service options integrated with your transactions.</p>
            </div>
        </div>
    </section>

    {{-- CTA Banner --}}
    <section class="bg-blue-100 py-16">
        <div class="text-center max-w-4xl mx-auto">
            <h4 class="text-2xl font-bold mb-4">Ready to make an impact?</h4>
            <p class="mb-6 text-gray-700">Join our mission to reduce waste and help communities through reuse. List an item or explore pre-loved products today.</p>
            <a href="#" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold shadow hover:bg-blue-700 transition">Get Started</a>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-gray-800 text-white py-6 text-center mt-12">
        <p class="text-sm">&copy; 2025 REUSE Hub — Promoting Responsible and Sustainable Living.</p>
    </footer>

</body>
</html>
