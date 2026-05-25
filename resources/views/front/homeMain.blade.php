<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Crownbridge Laravel - Premium Smart Asset Growth</title>
    <meta name="description" content="Experience high-performance digital asset expansion with Crownbridge Laravel. The ultimate choice for intelligent global financial operations.">
    
    <!-- Google Fonts & Bootstrap Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- SweetAlert2 CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
    
    <!-- Custom Premium Vanilla CSS -->
    <style>
        :root {
            --bg-color: #07090e;
            --card-bg: rgba(18, 22, 33, 0.65);
            --card-border: rgba(255, 255, 255, 0.08);
            --text-primary: #ffffff;
            --text-secondary: #8f9cae;
            --accent-primary: #00f2fe;
            --accent-secondary: #4facfe;
            --glow-primary: rgba(0, 242, 254, 0.15);
            --glow-secondary: rgba(79, 172, 254, 0.15);
            --gradient-text: linear-gradient(135deg, #00f2fe 0%, #4facfe 100%);
            --font-family: 'Plus Jakarta Sans', sans-serif;
            --transition-smooth: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-primary);
            font-family: var(--font-family);
            line-height: 1.6;
            overflow-x: hidden;
            position: relative;
        }

        /* Glowing Background Blobs */
        .glowing-blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(140px);
            z-index: -1;
            opacity: 0.6;
            pointer-events: none;
        }

        .blob-1 {
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, var(--accent-primary) 0%, transparent 70%);
            top: -100px;
            right: -100px;
        }

        .blob-2 {
            width: 500px;
            height: 500px;
            background: radial-gradient(circle, var(--accent-secondary) 0%, transparent 70%);
            bottom: -150px;
            left: -150px;
        }

        /* Container Layout */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* Header Style */
        header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            backdrop-filter: blur(16px);
            background: rgba(7, 9, 14, 0.7);
            border-bottom: 1px solid var(--card-border);
            padding: 18px 0;
            transition: var(--transition-smooth);
        }

        .header-content {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 24px;
            font-weight: 800;
            background: var(--gradient-text);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            text-decoration: none;
            letter-spacing: -0.5px;
        }

        .logo i {
            font-size: 26px;
            background: var(--gradient-text);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 10px 22px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 12px;
            cursor: pointer;
            transition: var(--transition-smooth);
            text-decoration: none;
            outline: none;
        }

        .btn-outline {
            border: 1px solid var(--card-border);
            background: transparent;
            color: var(--text-primary);
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.05);
            border-color: var(--accent-primary);
            color: var(--accent-primary);
            box-shadow: 0 0 15px rgba(0, 242, 254, 0.2);
        }

        .btn-primary {
            background: var(--gradient-text);
            color: #07090e;
            border: none;
            box-shadow: 0 4px 20px rgba(0, 242, 254, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 25px rgba(0, 242, 254, 0.55);
        }

        /* Hero Section */
        .hero {
            padding: 180px 0 100px;
            text-align: center;
            position: relative;
        }

        .hero-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 6px 16px;
            background: rgba(0, 242, 254, 0.08);
            border: 1px solid rgba(0, 242, 254, 0.2);
            color: var(--accent-primary);
            border-radius: 100px;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 24px;
            animation: pulseGlow 3s infinite alternate;
        }

        .hero h1 {
            font-size: 56px;
            font-weight: 800;
            line-height: 1.15;
            letter-spacing: -1.5px;
            margin-bottom: 20px;
            background: linear-gradient(180deg, #ffffff 40%, #a5b3c6 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero h1 span {
            background: var(--gradient-text);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .hero p {
            font-size: 18px;
            color: var(--text-secondary);
            max-width: 650px;
            margin: 0 auto 36px;
        }

        /* Feature Cards */
        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
            gap: 24px;
            margin-top: 60px;
        }

        .feature-card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 20px;
            padding: 36px;
            text-align: left;
            transition: var(--transition-smooth);
            backdrop-filter: blur(10px);
            position: relative;
            overflow: hidden;
        }

        .feature-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: var(--gradient-text);
            opacity: 0;
            transition: var(--transition-smooth);
        }

        .feature-card:hover {
            transform: translateY(-8px);
            border-color: rgba(0, 242, 254, 0.25);
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.5), 0 0 20px rgba(0, 242, 254, 0.05);
        }

        .feature-card:hover::before {
            opacity: 1;
        }

        .feature-icon {
            width: 56px;
            height: 56px;
            border-radius: 14px;
            background: rgba(0, 242, 254, 0.08);
            border: 1px solid rgba(0, 242, 254, 0.15);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 24px;
            transition: var(--transition-smooth);
        }

        .feature-card:hover .feature-icon {
            background: var(--gradient-text);
            color: #07090e;
            transform: scale(1.05);
        }

        .feature-icon i {
            font-size: 24px;
            background: var(--gradient-text);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            transition: var(--transition-smooth);
        }

        .feature-card:hover .feature-icon i {
            -webkit-text-fill-color: #07090e;
        }

        .feature-card h3 {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 12px;
        }

        .feature-card p {
            color: var(--text-secondary);
            font-size: 14px;
            line-height: 1.6;
        }

        /* Interactive Statistics Segment */
        .stats-section {
            padding: 80px 0;
            border-top: 1px solid var(--card-border);
            margin-top: 80px;
        }

        .stats-glass-card {
            background: radial-gradient(120% 120% at 50% 0%, rgba(255, 255, 255, 0.05) 0%, rgba(255, 255, 255, 0.01) 100%);
            border: 1px solid var(--card-border);
            backdrop-filter: blur(20px);
            border-radius: 24px;
            padding: 48px;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            text-align: center;
            position: relative;
        }

        .stat-item h2 {
            font-size: 40px;
            font-weight: 800;
            margin-bottom: 8px;
            background: var(--gradient-text);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .stat-item p {
            color: var(--text-secondary);
            font-size: 14px;
            font-weight: 500;
        }

        /* Modals Structure */
        .custom-modal {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }

        .custom-modal.active {
            opacity: 1;
            pointer-events: auto;
        }

        .modal-overlay {
            position: absolute;
            width: 100%;
            height: 100%;
            background: rgba(4, 6, 10, 0.85);
            backdrop-filter: blur(8px);
        }

        .modal-content {
            background: #0f121d;
            border: 1px solid var(--card-border);
            width: 100%;
            max-width: 460px;
            border-radius: 24px;
            padding: 40px;
            z-index: 2;
            transform: translateY(20px);
            transition: transform 0.4s cubic-bezier(0.16, 1, 0.3, 1);
            position: relative;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6);
        }

        .custom-modal.active .modal-content {
            transform: translateY(0);
        }

        .modal-close {
            position: absolute;
            top: 24px;
            right: 24px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid var(--card-border);
            width: 32px;
            height: 32px;
            border-radius: 50%;
            color: var(--text-secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: var(--transition-smooth);
        }

        .modal-close:hover {
            color: var(--text-primary);
            background: rgba(255, 255, 255, 0.15);
            transform: rotate(90deg);
        }

        .modal-title {
            font-size: 26px;
            font-weight: 800;
            margin-bottom: 8px;
            background: var(--gradient-text);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .modal-subtitle {
            color: var(--text-secondary);
            font-size: 14px;
            margin-bottom: 28px;
        }

        .form-group {
            margin-bottom: 20px;
            text-align: left;
            position: relative;
        }

        .form-group label {
            display: block;
            font-size: 13px;
            font-weight: 600;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }

        .input-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-wrapper i {
            position: absolute;
            left: 16px;
            color: var(--text-secondary);
            font-size: 16px;
        }

        .form-control {
            width: 100%;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid var(--card-border);
            padding: 14px 16px 14px 44px;
            border-radius: 12px;
            color: var(--text-primary);
            font-family: var(--font-family);
            font-size: 14px;
            transition: var(--transition-smooth);
        }

        .form-control:focus {
            outline: none;
            border-color: var(--accent-primary);
            background: rgba(255, 255, 255, 0.05);
            box-shadow: 0 0 15px rgba(0, 242, 254, 0.1);
        }

        .toggle-password-btn {
            position: absolute;
            right: 16px;
            background: none;
            border: none;
            color: var(--text-secondary);
            cursor: pointer;
            font-size: 16px;
            display: flex;
            align-items: center;
            height: 100%;
        }

        .toggle-password-btn:hover {
            color: var(--text-primary);
        }

        .modal-footer-link {
            text-align: center;
            margin-top: 24px;
            font-size: 14px;
            color: var(--text-secondary);
        }

        .modal-footer-link a {
            color: var(--accent-primary);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition-smooth);
        }

        .modal-footer-link a:hover {
            color: var(--accent-secondary);
            text-decoration: underline;
        }

        /* Footer */
        footer {
            border-top: 1px solid var(--card-border);
            padding: 40px 0;
            text-align: center;
            color: var(--text-secondary);
            font-size: 14px;
            margin-top: 80px;
        }

        /* Animations */
        @keyframes pulseGlow {
            0% {
                box-shadow: 0 0 10px rgba(0, 242, 254, 0.1);
            }
            100% {
                box-shadow: 0 0 20px rgba(0, 242, 254, 0.3);
            }
        }

        /* Responsive Breakpoints */
        @media (max-width: 992px) {
            .stats-glass-card {
                grid-template-columns: repeat(2, 1fr);
                padding: 36px;
            }
            .hero h1 {
                font-size: 44px;
            }
            .features-grid {
                grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
                gap: 20px;
            }
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 16px;
            }
            .hero {
                padding: 140px 0 60px;
            }
            .hero h1 {
                font-size: 36px;
                letter-spacing: -1px;
            }
            .hero p {
                font-size: 15px;
                padding: 0 8px;
            }
            .features-grid {
                grid-template-columns: 1fr;
                gap: 16px;
                margin-top: 40px;
            }
            .feature-card {
                padding: 28px;
            }
            .stats-section {
                padding: 50px 0;
                margin-top: 50px;
            }
            .stats-glass-card {
                grid-template-columns: repeat(2, 1fr);
                padding: 24px;
                gap: 16px;
            }
            .stat-item h2 {
                font-size: 28px;
            }
            header {
                padding: 12px 0;
            }
            .logo {
                font-size: 20px;
            }
            .logo img {
                max-width: 120px !important;
            }
            .nav-actions {
                gap: 8px;
            }
            .nav-actions .btn {
                padding: 8px 14px;
                font-size: 12px;
            }
        }

        @media (max-width: 576px) {
            .stats-glass-card {
                grid-template-columns: 1fr;
            }
            .hero {
                padding: 120px 0 40px;
            }
            .hero h1 {
                font-size: 26px;
                letter-spacing: -0.8px;
            }
            .hero p {
                font-size: 13px;
                margin-bottom: 24px;
                padding: 0 4px;
            }
            .hero-badge {
                font-size: 11px;
                padding: 5px 12px;
            }
            .modal-content {
                padding: 24px 16px;
                margin: 0 10px;
                border-radius: 16px;
                max-width: 100%;
            }
            .modal-title {
                font-size: 22px;
            }
            .modal-subtitle {
                font-size: 13px;
            }
            .form-group label {
                font-size: 12px;
            }
            .form-control {
                padding: 12px 14px 12px 40px;
                font-size: 13px;
            }
            .btn {
                padding: 8px 16px;
                font-size: 13px;
            }
            .feature-card {
                padding: 24px;
                border-radius: 16px;
            }
            .feature-icon {
                width: 48px;
                height: 48px;
            }
            .feature-card h3 {
                font-size: 18px;
            }
            footer {
                padding: 30px 0;
                margin-top: 50px;
            }
            footer p {
                font-size: 12px;
                padding: 0 10px;
            }
            .nav-actions span {
                display: none;
            }
            .header-content {
                padding: 0 4px;
            }
        }

        @media (max-width: 380px) {
            .hero h1 {
                font-size: 22px;
            }
            .hero p {
                font-size: 12px;
            }
            .stat-item h2 {
                font-size: 22px;
            }
            .stat-item p {
                font-size: 12px;
            }
            .logo {
                font-size: 16px;
            }
            .logo img {
                max-width: 100px !important;
            }
            .nav-actions .btn {
                padding: 6px 10px;
                font-size: 11px;
            }
            .modal-content {
                padding: 20px 14px;
                margin: 0 8px;
            }
        }

        /* Fix SweetAlert2 popup showing behind the active login/register custom modals */
        .swal2-container {
            z-index: 999999 !important;
        }

        /* Make SweetAlert2 popups responsive on mobile */
        @media (max-width: 576px) {
            .swal2-popup {
                width: 90% !important;
                font-size: 14px !important;
                padding: 20px 16px !important;
            }
            .swal2-title {
                font-size: 18px !important;
            }
            .swal2-html-container {
                font-size: 13px !important;
            }
        }
    </style>
</head>
<body>

    <!-- Glowing Blobs -->
    <div class="glowing-blob blob-1"></div>
    <div class="glowing-blob blob-2"></div>

    <!-- Header -->
    <header>
        <div class="container header-content">
            <a href="/" class="logo">
                @if(isset($query) && $query->siteLogo)
                    <img src="{{ $query->siteLogo }}" alt="Logo" style="max-width: 160px; max-height: 50px; object-fit: contain;">
                @else
                    <i class="bi bi-box-seam-fill"></i>
                    Crownbridge
                @endif
            </a>
            
            <div class="nav-actions">
                @if (session('username'))
                    <span style="font-size: 14px; font-weight: 500; color: var(--text-secondary); margin-right: 8px;">
                        Welcome, {{ session('username') }}
                    </span>
                    <a href="/home" class="btn btn-primary">
                        <i class="bi bi-speedometer2" style="margin-right: 8px;"></i>
                        Dashboard
                    </a>
                @else
                    <button class="btn btn-outline" onclick="openModal('loginModal')">Log In</button>
                    <button class="btn btn-primary" onclick="openModal('signupModal')">Get Started</button>
                @endif
            </div>
        </div>
    </header>

    <!-- Main Hero -->
    <main class="container">
        <section class="hero">
            <div class="hero-badge">
                <i class="bi bi-shield-check"></i> Fully Secured Asset Growth System
            </div>
            <h1>Smart Asset Expansion<br>With <span>Crownbridge Laravel</span></h1>
            <p>Elevate your capital using our high-fidelity, intelligent ecosystem configured for seamless global transitions, robust transactions, and elite-tier security.</p>
            
            <div style="display: flex; gap: 16px; justify-content: center; flex-wrap: wrap;">
                @if (session('username'))
                    <a href="/home" class="btn btn-primary" style="padding: 14px 32px; font-size: 16px;">
                        Go to Dashboard <i class="bi bi-arrow-right" style="margin-left: 8px;"></i>
                    </a>
                @else
                    <button class="btn btn-primary" onclick="openModal('signupModal')" style="padding: 14px 32px; font-size: 16px;">
                        Start Growing Assets <i class="bi bi-arrow-right" style="margin-left: 8px;"></i>
                    </button>
                    <button class="btn btn-outline" onclick="openModal('loginModal')" style="padding: 14px 32px; font-size: 16px;">
                        Access Portal
                    </button>
                @endif
            </div>
        </section>

        <!-- Features Cards Grid -->
        <section class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-lightning-charge-fill"></i>
                </div>
                <h3>Accelerated Transfers</h3>
                <p>Execute deposit and withdrawal requests at breakneck speeds, securely processing transactions within milliseconds across all platforms.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-safe-fill"></i>
                </div>
                <h3>Military-Grade Protection</h3>
                <p>Your investments are fortified with sophisticated hash security configurations, dual-layered session controls, and encrypted SQLite storage backend.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">
                    <i class="bi bi-graph-up-arrow"></i>
                </div>
                <h3>Elite Wealth Architecture</h3>
                <p>Harness dynamic tier-based commissions custom-designed to reward consistent operational growth and maximize systemic efficiency.</p>
            </div>
        </section>

        <!-- Dynamic Statistics -->
        <section class="stats-section">
            <div class="stats-glass-card">
                <div class="stat-item">
                    <h2 id="stat-deposits">$2.4M+</h2>
                    <p>Total Assets Under Mgmt</p>
                </div>
                <div class="stat-item">
                    <h2 id="stat-transactions">98.4k+</h2>
                    <p>Transactions Completed</p>
                </div>
                <div class="stat-item">
                    <h2 id="stat-active">12.5k</h2>
                    <p>Global Active Users</p>
                </div>
                <div class="stat-item">
                    <h2 id="stat-uptime">99.99%</h2>
                    <p>Ecosystem Uptime</p>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2026 Crownbridge Laravel. Engineered for optimal performance. All rights reserved.</p>
        </div>
    </footer>

    <!-- Log In Modal -->
    <div class="custom-modal" id="loginModal">
        <div class="modal-overlay" onclick="closeModal('loginModal')"></div>
        <div class="modal-content">
            <button class="modal-close" onclick="closeModal('loginModal')">
                <i class="bi bi-x"></i>
            </button>
            <h3 class="modal-title">Welcome Back</h3>
            <p class="modal-subtitle">Log in to manage your digital assets portfolio.</p>
            
            <form id="loginForm" onsubmit="handleLoginSubmit(event)">
                <div class="form-group">
                    <label for="login_username">Username</label>
                    <div class="input-wrapper">
                        <i class="bi bi-person"></i>
                        <input type="text" id="login_username" name="username" class="form-control" placeholder="Enter username" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="login_password">Password</label>
                    <div class="input-wrapper">
                        <i class="bi bi-lock"></i>
                        <input type="password" id="login_password" name="password" class="form-control" placeholder="Enter password" required>
                        <button type="button" class="toggle-password-btn" onclick="togglePasswordVisibility('login_password')">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 14px; margin-top: 10px;">
                    Log In <i class="bi bi-box-arrow-in-right" style="margin-left: 8px;"></i>
                </button>
            </form>
            
            <div class="modal-footer-link">
                Don't have an account? <a href="#" onclick="switchModal('loginModal', 'signupModal')">Sign Up Now</a>
            </div>
        </div>
    </div>

    <!-- Sign Up Modal -->
    <div class="custom-modal" id="signupModal">
        <div class="modal-overlay" onclick="closeModal('signupModal')"></div>
        <div class="modal-content">
            <button class="modal-close" onclick="closeModal('signupModal')">
                <i class="bi bi-x"></i>
            </button>
            <h3 class="modal-title">Create Account</h3>
            <p class="modal-subtitle">Start your wealth generation journey today.</p>
            
            <form id="signupForm" onsubmit="handleSignupSubmit(event)">
                <div class="form-group">
                    <label for="signup_phone">Phone Number</label>
                    <div class="input-wrapper">
                        <i class="bi bi-telephone"></i>
                        <input type="tel" id="signup_phone" name="phone_number" class="form-control" placeholder="Enter phone number" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="signup_username">Username</label>
                    <div class="input-wrapper">
                        <i class="bi bi-person"></i>
                        <input type="text" id="signup_username" name="username" class="form-control" placeholder="Choose username" required>
                    </div>
                </div>
                
                <div class="form-group">
                    <label for="signup_password">Password</label>
                    <div class="input-wrapper">
                        <i class="bi bi-lock"></i>
                        <input type="password" id="signup_password" name="password" class="form-control" placeholder="Create password" required>
                        <button type="button" class="toggle-password-btn" onclick="togglePasswordVisibility('signup_password')">
                            <i class="bi bi-eye"></i>
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="signup_invite">Referral Code</label>
                    <div class="input-wrapper">
                        <i class="bi bi-ticket-perforated"></i>
                        <input type="text" id="signup_invite" name="invitation_code" class="form-control" placeholder="Enter referral invitation code" required>
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary" style="width: 100%; padding: 14px; margin-top: 10px;">
                    Register Now <i class="bi bi-person-plus" style="margin-left: 8px;"></i>
                </button>
            </form>
            
            <div class="modal-footer-link">
                Already have an account? <a href="#" onclick="switchModal('signupModal', 'loginModal')">Log In Here</a>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

    <script>
        // Set up CSRF token for all jQuery AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Modal Functionality
        function openModal(id) {
            document.getElementById(id).classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(id) {
            document.getElementById(id).classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        function switchModal(closeId, openId) {
            closeModal(closeId);
            setTimeout(() => {
                openModal(openId);
            }, 300);
        }

        function togglePasswordVisibility(id) {
            const input = document.getElementById(id);
            const button = input.nextElementSibling;
            const icon = button.querySelector('i');
            
            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('bi-eye');
                icon.classList.add('bi-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('bi-eye-slash');
                icon.classList.add('bi-eye');
            }
        }

        // AJAX Form Handlers
        function handleLoginSubmit(event) {
            event.preventDefault();
            const formData = $('#loginForm').serialize();

            Swal.fire({
                title: 'Authenticating...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: '/auth/login',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    Swal.close();
                    if (response.status === true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Login Successful',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 1500
                        });
                        setTimeout(() => {
                            window.location.href = '/journey';
                        }, 1500);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Login Failed',
                            text: response.message
                        });
                    }
                },
                error: function(xhr) {
                    Swal.close();
                    let errMsg = 'Something went wrong. Please check your credentials and try again.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errMsg = xhr.responseJSON.message;
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errMsg
                    });
                }
            });
        }

        function handleSignupSubmit(event) {
            event.preventDefault();
            const formData = $('#signupForm').serialize();

            Swal.fire({
                title: 'Creating Account...',
                allowOutsideClick: false,
                didOpen: () => {
                    Swal.showLoading();
                }
            });

            $.ajax({
                url: '/auth/signup',
                type: 'POST',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    Swal.close();
                    if (response.status === true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Registration Successful',
                            text: response.message,
                            showConfirmButton: false,
                            timer: 2000
                        });
                        setTimeout(() => {
                            switchModal('signupModal', 'loginModal');
                        }, 2000);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Registration Failed',
                            text: response.message
                        });
                    }
                },
                error: function(xhr) {
                    Swal.close();
                    let errMsg = 'Something went wrong. Please try again.';
                    if (xhr.responseJSON && xhr.responseJSON.message) {
                        errMsg = xhr.responseJSON.message;
                    }
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: errMsg
                    });
                }
            });
        }

        // Realtime simulated stats movement to make the dashboard feel alive
        setInterval(() => {
            const totalAUM = document.getElementById('stat-deposits');
            const totalTx = document.getElementById('stat-transactions');
            const activeUsers = document.getElementById('stat-active');

            // Slightly increase stats dynamically
            if(totalAUM) {
                let currentVal = parseFloat(totalAUM.innerText.replace('$', '').replace('M+', ''));
                currentVal += (Math.random() * 0.01);
                totalAUM.innerText = '$' + currentVal.toFixed(2) + 'M+';
            }

            if(totalTx) {
                let currentTx = parseFloat(totalTx.innerText.replace('k+', ''));
                currentTx += (Math.random() * 0.05);
                totalTx.innerText = currentTx.toFixed(1) + 'k+';
            }
        }, 4000);
    </script>
</body>
</html>