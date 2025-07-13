<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>REUSE Hub - Give Old Things New Wings</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            transition: all 0.3s ease;
        }

        nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem 0;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 800;
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .logo::before {
            content: "♻️";
            font-size: 1.5rem;
            animation: rotate 3s linear infinite;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 2rem;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem;
            border-radius: 20px;
        }

        .nav-links a:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: translateY(-2px);
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            color: white;
            position: relative;
            overflow: hidden;
        }

        .hero::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><circle cx="200" cy="200" r="3" fill="rgba(255,255,255,0.1)"/><circle cx="400" cy="100" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="600" cy="300" r="4" fill="rgba(255,255,255,0.1)"/><circle cx="800" cy="150" r="2" fill="rgba(255,255,255,0.1)"/><circle cx="100" cy="400" r="3" fill="rgba(255,255,255,0.1)"/><circle cx="900" cy="400" r="3" fill="rgba(255,255,255,0.1)"/></svg>');
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }

        .hero-content {
            z-index: 2;
            position: relative;
            max-width: 800px;
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 900;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #ffffff, #f0f0f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: slideInUp 1s ease-out;
        }

        .hero-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
            animation: slideInUp 1s ease-out 0.2s both;
        }

        @keyframes slideInUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .cta-buttons {
            display: flex;
            gap: 1rem;
            justify-content: center;
            flex-wrap: wrap;
            animation: slideInUp 1s ease-out 0.4s both;
        }

        .btn {
            padding: 1rem 2rem;
            border: none;
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .btn-primary {
            background: linear-gradient(45deg, #4facfe, #00f2fe);
            color: white;
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        }

        .btn:active {
            transform: translateY(-1px);
        }

        /* Features Section */
        .features {
            padding: 4rem 0;
            background: white;
        }

        .section-title {
            text-align: center;
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 3rem;
            color: #333;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .feature-card {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            padding: 2rem;
            border-radius: 20px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
            border: 2px solid transparent;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            border-color: #4facfe;
        }

        .feature-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }

        .feature-card h3 {
            font-size: 1.3rem;
            margin-bottom: 1rem;
            color: #333;
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
        }

        /* Stats Section */
        .stats {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 4rem 0;
            color: white;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            text-align: center;
        }

        .stat-item {
            padding: 1rem;
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 900;
            margin-bottom: 0.5rem;
            background: linear-gradient(45deg, #ffffff, #f0f0f0);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
        }

        /* How It Works */
        .how-it-works {
            padding: 4rem 0;
            background: #f8f9fa;
        }

        .steps-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 3rem;
        }

        .step-card {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            transition: all 0.3s ease;
        }

        .step-card::before {
            content: attr(data-step);
            position: absolute;
            top: -15px;
            left: 30px;
            background: linear-gradient(45deg, #4facfe, #00f2fe);
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 800;
            font-size: 1.2rem;
        }

        .step-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .step-card h3 {
            margin-bottom: 1rem;
            color: #333;
            font-size: 1.3rem;
        }

        .step-card p {
            color: #666;
            line-height: 1.6;
        }

        /* CTA Section */
        .cta-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 4rem 0;
            text-align: center;
            color: white;
        }

        .cta-content {
            max-width: 600px;
            margin: 0 auto;
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 1rem;
        }

        .cta-subtitle {
            font-size: 1.2rem;
            margin-bottom: 2rem;
            opacity: 0.9;
        }

        /* Floating Action Button */
        .floating-btn {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background: linear-gradient(45deg, #4facfe, #00f2fe);
            color: white;
            border: none;
            border-radius: 50%;
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            transition: all 0.3s ease;
            z-index: 1000;
        }

        .floating-btn:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.4);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }
            
            .hero-title {
                font-size: 2.5rem;
            }
            
            .cta-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
            
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        /* Animation utilities */
        .animate-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: all 0.6s ease;
        }

        .animate-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }

        /* Trust badges */
        .trust-badges {
            display: flex;
            justify-content: center;
            gap: 2rem;
            margin-top: 2rem;
            flex-wrap: wrap;
        }

        .trust-badge {
            background: rgba(255, 255, 255, 0.1);
            padding: 0.5rem 1rem;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            backdrop-filter: blur(10px);
        }

        .eco-counter {
            position: fixed;
            top: 100px;
            right: 30px;
            background: rgba(255, 255, 255, 0.9);
            padding: 1rem;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
            text-align: center;
            font-size: 0.9rem;
            z-index: 999;
        }

        .leaf-counter {
            font-size: 1.5rem;
            color: #4caf50;
            font-weight: 800;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <nav class="container">
            <a href="#" class="logo">REUSE Hub</a>
            <ul class="nav-links">
                <li><a href="#home">Home</a></li>
                <li><a href="#donate">Donate</a></li>
                <li><a href="#browse">Browse</a></li>
                <li><a href="#blog">Blog</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </nav>
    </header>

    <!-- Eco Counter -->
    <div class="eco-counter">
        <div class="leaf-counter">🌿 247</div>
        <div>CO₂ Saved Today</div>
    </div>

    <!-- Hero Section -->
    <section class="hero" id="home">
        <div class="hero-content">
            <h1 class="hero-title">Give Old Things New Wings</h1>
            <p class="hero-subtitle">
                REUSE Hub connects people who want to share or buy reusable items in a safe and trusted space. 
                Transform your unwanted furniture into someone else's treasure.
            </p>
            <div class="cta-buttons">
                <a href="#donate" class="btn btn-primary">🎁 Donate Now</a>
                <a href="#browse" class="btn btn-secondary">🛒 Browse Items</a>
            </div>
            <div class="trust-badges">
                <div class="trust-badge">
                    <span>✅</span>
                    <span>Verified Users</span>
                </div>
                <div class="trust-badge">
                    <span>⭐</span>
                    <span>Rated Sellers</span>
                </div>
                <div class="trust-badge">
                    <span>🚚</span>
                    <span>Optional Services</span>
                </div>
                <div class="trust-badge">
                    <span>💬</span>
                    <span>Honest Reviews</span>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <h2 class="section-title animate-on-scroll">Why Choose REUSE Hub?</h2>
            <div class="features-grid">
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">🌱</div>
                    <h3>Eco-Friendly</h3>
                    <p>Every item reused saves resources and reduces waste. Join our sustainability mission!</p>
                </div>
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">🔒</div>
                    <h3>Safe & Trusted</h3>
                    <p>All users are verified, and every transaction is protected by our review system.</p>
                </div>
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">🛠️</div>
                    <h3>Repair Services</h3>
                    <p>Optional repair and restoration services to give items a beautiful second life.</p>
                </div>
                <div class="feature-card animate-on-scroll">
                    <div class="feature-icon">🚚</div>
                    <h3>Delivery Available</h3>
                    <p>Optional pickup and delivery services for your convenience.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="stats">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-item animate-on-scroll">
                    <div class="stat-number">12,500+</div>
                    <div class="stat-label">Items Reused</div>
                </div>
                <div class="stat-item animate-on-scroll">
                    <div class="stat-number">8,200+</div>
                    <div class="stat-label">Happy Users</div>
                </div>
                <div class="stat-item animate-on-scroll">
                    <div class="stat-number">156</div>
                    <div class="stat-label">Tons CO₂ Saved</div>
                </div>
                <div class="stat-item animate-on-scroll">
                    <div class="stat-number">4.9/5</div>
                    <div class="stat-label">User Rating</div>
                </div>
            </div>
        </div>
    </section>

    <!-- How It Works -->
    <section class="how-it-works">
        <div class="container">
            <h2 class="section-title animate-on-scroll">How It Works</h2>
            <div class="steps-container">
                <div class="step-card animate-on-scroll" data-step="1">
                    <h3>📸 Upload Your Item</h3>
                    <p>Take a photo, add a description, and set your price. Our one-click posting makes it super easy!</p>
                </div>
                <div class="step-card animate-on-scroll" data-step="2">
                    <h3>🤝 Connect with Buyers</h3>
                    <p>Use our real-time chat to communicate with interested buyers. Safe and secure messaging.</p>
                </div>
                <div class="step-card animate-on-scroll" data-step="3">
                    <h3>✅ Complete the Deal</h3>
                    <p>Arrange pickup/delivery, complete the transaction, and leave a review. Build trust in our community!</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <div class="cta-content animate-on-scroll">
                <h2 class="cta-title">Ready to Make a Difference?</h2>
                <p class="cta-subtitle">Join thousands of users who are already giving old things new life. Start your sustainable journey today!</p>
                <div class="cta-buttons">
                    <a href="#signup" class="btn btn-primary">🌟 Join REUSE Hub</a>
                    <a href="#learn-more" class="btn btn-secondary">📚 Learn More</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Floating Action Button -->
    <button class="floating-btn" onclick="scrollToTop()">↑</button>

    <script>
        // Smooth scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });

        // Scroll to top function
        function scrollToTop() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        // Animation on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.animate-on-scroll').forEach(el => {
            observer.observe(el);
        });

        // Header background change on scroll
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 100) {
                header.style.background = 'rgba(255, 255, 255, 0.95)';
                header.style.color = '#333';
            } else {
                header.style.background = 'rgba(255, 255, 255, 0.1)';
                header.style.color = 'white';
            }
        });

        // Interactive eco counter
        let leafCount = 247;
        const ecoCounter = document.querySelector('.leaf-counter');
        
        setInterval(() => {
            leafCount += Math.floor(Math.random() * 3);
            ecoCounter.textContent = `🌿 ${leafCount}`;
        }, 5000);

        // Add click effects to feature cards
        document.querySelectorAll('.feature-card').forEach(card => {
            card.addEventListener('click', function() {
                this.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    this.style.transform = 'translateY(-10px)';
                }, 100);
            });
        });

        // Add hover sound effect simulation
        document.querySelectorAll('.btn').forEach(btn => {
            btn.addEventListener('mouseenter', function() {
                this.style.boxShadow = '0 15px 40px rgba(79, 172, 254, 0.4)';
            });
            
            btn.addEventListener('mouseleave', function() {
                this.style.boxShadow = '0 10px 30px rgba(0, 0, 0, 0.3)';
            });
        });
    </script>
</body>
</html>