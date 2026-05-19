<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Titan</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <style>
        :root {
            --bg-dark: #0a0a0f;
            --bg-card: rgba(255, 255, 255, 0.03);
            --bg-card-hover: rgba(255, 255, 255, 0.06);
            --accent-gold: #d4af37;
            --accent-gold-light: #f4cf57;
            --accent-gold-dark: #b8962e;
            --text-white: #ffffff;
            --text-muted: rgba(255, 255, 255, 0.6);
            --text-muted-light: rgba(255, 255, 255, 0.4);
            --border-subtle: rgba(255, 255, 255, 0.08);
            --border-gold: rgba(212, 175, 55, 0.3);
            --shadow-glow: 0 0 60px rgba(212, 175, 55, 0.15);
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'DM Sans', sans-serif; background: var(--bg-dark); color: var(--text-white); min-height: 100vh; overflow-x: hidden; }

        .bg-animation { position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: -1; overflow: hidden; }
        .bg-animation::before { content: ''; position: absolute; top: -50%; left: -50%; width: 200%; height: 200%; background: radial-gradient(ellipse at 20% 20%, rgba(212, 175, 55, 0.08) 0%, transparent 50%), radial-gradient(ellipse at 80% 80%, rgba(212, 175, 55, 0.05) 0%, transparent 50%), radial-gradient(ellipse at 50% 50%, rgba(212, 175, 55, 0.03) 0%, transparent 70%); animation: bgPulse 15s ease-in-out infinite; }
        @keyframes bgPulse { 0%, 100% { transform: translate(0, 0) rotate(0deg); } 33% { transform: translate(2%, 2%) rotate(2deg); } 66% { transform: translate(-1%, 1%) rotate(-1deg); } }
        .bg-grid { position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.02) 1px, transparent 1px); background-size: 60px 60px; mask-image: radial-gradient(ellipse at center, black 30%, transparent 70%); -webkit-mask-image: radial-gradient(ellipse at center, black 30%, transparent 70%); }

        .auth-container { min-height: 100vh; display: grid; grid-template-columns: 1fr 1fr; align-items: center; }
        @media (max-width: 1024px) { .auth-container { grid-template-columns: 1fr; } }

        .brand-section { padding: 60px; display: flex; flex-direction: column; justify-content: center; }
        .brand-logo { font-family: 'Playfair Display', serif; font-size: 2.5rem; font-weight: 600; letter-spacing: 0.02em; margin-bottom: 8px; animation: fadeSlideUp 0.8s ease-out; }
        .brand-logo span { color: var(--accent-gold); }
        .brand-tagline { font-size: 1.1rem; color: var(--text-muted); margin-bottom: 40px; animation: fadeSlideUp 0.8s ease-out 0.1s backwards; }
        .hero-content { animation: fadeSlideUp 0.8s ease-out 0.2s backwards; }
        .hero-title { font-family: 'Playfair Display', serif; font-size: 3.5rem; font-weight: 500; line-height: 1.2; margin-bottom: 20px; }
        .hero-title span { background: linear-gradient(135deg, var(--accent-gold) 0%, var(--accent-gold-light) 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; }
        .hero-subtitle { font-size: 1.1rem; color: var(--text-muted); line-height: 1.7; max-width: 480px; }
        .deco-line { width: 60px; height: 2px; background: linear-gradient(90deg, var(--accent-gold), transparent); margin-bottom: 24px; animation: fadeSlideUp 0.8s ease-out 0.15s backwards; }

        .form-section { padding: 60px; display: flex; align-items: center; justify-content: center; background: linear-gradient(135deg, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.2) 100%); backdrop-filter: blur(20px); border-left: 1px solid var(--border-subtle); }
        @media (max-width: 1024px) { .brand-section { padding: 40px 30px; text-align: center; align-items: center; } .form-section { padding: 40px 30px; border-left: none; border-top: 1px solid var(--border-subtle); } .hero-title { font-size: 2.5rem; } }

        .auth-card { width: 100%; max-width: 440px; animation: fadeSlideUp 0.8s ease-out 0.3s backwards; }
        .form-header { margin-bottom: 36px; }
        .form-title { font-family: 'Playfair Display', serif; font-size: 2rem; font-weight: 500; margin-bottom: 8px; }
        .form-subtitle { color: var(--text-muted); font-size: 0.95rem; }

        .form-group { margin-bottom: 20px; animation: fadeSlideUp 0.6s ease-out backwards; }
        .form-group:nth-child(1) { animation-delay: 0.4s; }
        .form-group:nth-child(2) { animation-delay: 0.45s; }
        .form-group:nth-child(3) { animation-delay: 0.5s; }
        .form-group:nth-child(4) { animation-delay: 0.55s; }

        .input-wrapper { position: relative; }
        .input-label { display: block; font-size: 0.85rem; color: var(--text-muted); margin-bottom: 8px; font-weight: 500; letter-spacing: 0.02em; }
        .input-field { width: 100%; padding: 16px 20px; background: var(--bg-card); border: 1px solid var(--border-subtle); border-radius: 12px; color: var(--text-white); font-size: 1rem; font-family: inherit; transition: all 0.3s ease; outline: none; }
        .input-field:focus { border-color: var(--accent-gold); box-shadow: 0 0 0 3px rgba(212, 175, 55, 0.1), var(--shadow-glow); background: var(--bg-card-hover); }
        .input-field::placeholder { color: var(--text-muted-light); }

        .password-toggle { position: absolute; right: 16px; top: 50%; transform: translateY(-50%); background: none; border: none; color: var(--text-muted); cursor: pointer; padding: 4px; transition: color 0.3s ease; }
        .password-toggle:hover { color: var(--accent-gold); }

        .submit-btn { width: 100%; padding: 18px 32px; background: linear-gradient(135deg, var(--accent-gold) 0%, var(--accent-gold-dark) 100%); border: none; border-radius: 12px; color: #0a0a0f; font-size: 1rem; font-weight: 600; font-family: inherit; cursor: pointer; transition: all 0.3s ease; margin-top: 12px; position: relative; overflow: hidden; animation: fadeSlideUp 0.6s ease-out 0.65s backwards; }
        .submit-btn::before { content: ''; position: absolute; top: 0; left: -100%; width: 100%; height: 100%; background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent); transition: left 0.5s ease; }
        .submit-btn:hover { transform: translateY(-2px); box-shadow: 0 10px 30px rgba(212, 175, 55, 0.3); }
        .submit-btn:hover::before { left: 100%; }
        .submit-btn:disabled { opacity: 0.6; cursor: not-allowed; }

        .auth-footer { text-align: center; margin-top: 28px; color: var(--text-muted); font-size: 0.95rem; animation: fadeSlideUp 0.6s ease-out 0.7s backwards; }
        .auth-footer a { color: var(--accent-gold); text-decoration: none; font-weight: 500; transition: color 0.3s ease; }
        .auth-footer a:hover { color: var(--accent-gold-light); }

        .features { display: flex; gap: 24px; margin-top: 40px; animation: fadeSlideUp 0.8s ease-out 0.3s backwards; }
        .feature { display: flex; align-items: center; gap: 8px; font-size: 0.9rem; color: var(--text-muted); }
        .feature svg { color: var(--accent-gold); }
        @media (max-width: 1024px) { .features { justify-content: center; flex-wrap: wrap; } }

        @keyframes fadeSlideUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body>
    <div class="bg-animation"><div class="bg-grid"></div></div>
    <div class="auth-container">
        <div class="brand-section">
            <div class="brand-logo">Titan<span>.</span></div>
            <p class="brand-tagline">Your journey to success starts here</p>
            <div class="deco-line"></div>
            <div class="hero-content">
                <h1 class="hero-title">Join the<br><span>Revolution</span></h1>
                <p class="hero-subtitle">Create your account and start your journey with Titan. Unlock exclusive features and maximize your earning potential.</p>
            </div>
            <div class="features">
                <div class="feature"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>Instant Access</div>
                <div class="feature"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>Secure Platform</div>
                <div class="feature"><svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"></polyline></svg>24/7 Support</div>
            </div>
        </div>
        <div class="form-section">
            <div class="auth-card">
                <div class="form-header">
                    <h2 class="form-title">Create Account</h2>
                    <p class="form-subtitle">Fill in your details to get started</p>
                </div>
                <form id="signupForm" method="POST" action="{{ url('auth/signup') }}">
                    @csrf
                    <div class="form-group">
                        <div class="input-wrapper">
                            <label class="input-label" for="username">Username</label>
                            <input type="text" id="username" name="username" class="input-field" placeholder="Choose a username" required autocomplete="username">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-wrapper">
                            <label class="input-label" for="phone_number">Phone Number</label>
                            <input type="tel" id="phone_number" name="phone_number" class="input-field" placeholder="Enter your phone number" required autocomplete="tel">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-wrapper">
                            <label class="input-label" for="password">Password</label>
                            <input type="password" id="password" name="password" class="input-field" placeholder="Create a password" required autocomplete="new-password">
                            <button type="button" class="password-toggle" id="togglePassword">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                            </button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-wrapper">
                            <label class="input-label" for="invitation_code">Invitation Code</label>
                            <input type="text" id="invitation_code" name="invitation_code" class="input-field" placeholder="Enter invitation code" required value="{{ $code ?? '' }}">
                        </div>
                    </div>
                    <button type="submit" class="submit-btn">Create Account</button>
                </form>
                <div class="auth-footer">
                    Already have an account? <a href="{{ url('auth/login') }}">Sign in</a>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            this.innerHTML = type === 'password' 
                ? '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>'
                : '<svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.15 9.15 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.72a23.1 23.1 0 0 1 1.53 5c-.06.36-.18.71-.35 1.04M1 1l22 22"></path></svg>';
        });
        $(document).ready(function() {
            $('#signupForm').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                var submitBtn = $(this).find('.submit-btn');
                submitBtn.prop('disabled', true).text('Creating account...');
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if(response.status == false){
                            Swal.fire({ icon: 'error', title: 'Error!', text: response.message, confirmButtonColor: '#d4af37', background: '#0a0a0f', color: '#fff' });
                            submitBtn.prop('disabled', false).text('Create Account');
                        }
                        if(response.status == true){
                            Swal.fire({ icon: 'success', title: 'Welcome to Titan!', text: 'Account created successfully', confirmButtonColor: '#d4af37', background: '#0a0a0f', color: '#fff' });
                            setTimeout(function() { window.location.href = '{{ url("auth/login") }}'; }, 2000);
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({ icon: 'error', title: 'Error!', text: 'Something went wrong.', confirmButtonColor: '#d4af37', background: '#0a0a0f', color: '#fff' });
                        submitBtn.prop('disabled', false).text('Create Account');
                    }
                });
            });
        });
    </script>
</body>
</html>
