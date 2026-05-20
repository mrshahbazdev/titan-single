<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - CrownBridge Travel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
    <style>
        :root {
            --font-sans: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
            --color-bg: #07090e;
            --color-bg-dark: #0a0a0a;
            --color-card: rgba(18, 22, 33, 0.65);
            --color-card-dark: #161615;
            --color-text: #ffffff;
            --color-text-light: #EDEDEC;
            --color-text-muted: #706f6c;
            --color-text-muted-dark: #A1A09A;
            --color-accent: #f53003;
            --color-accent-dark: #FF4433;
            --color-border: #19140035;
            --color-border-light: #e3e3e0;
            --color-border-dark: #3E3E3A;
            --shadow-card: inset 0px 0px 0px 1px rgba(26,26,0,0.16);
            --shadow-card-dark: inset 0px 0px 0px 1px #fffaed2d;
        }
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: var(--font-sans);
            background: var(--color-bg);
            color: var(--color-text);
            min-height: 100vh;
        }
        .container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }
        .card {
            background: var(--color-card);
            box-shadow: var(--shadow-card);
            padding: 1.5rem;
            border-radius: 0.5rem;
            max-width: 420px;
            width: 100%;
        }
        @media (min-width: 1024px) {
            .container { padding: 2rem; }
            .card { padding: 2rem 2.5rem; }
        }
        .logo {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }
        .logo span { color: var(--color-accent); }
        .tagline {
            color: var(--color-text-muted);
            font-size: 0.875rem;
            margin-bottom: 2rem;
        }
        .title {
            font-size: 1.25rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        .subtitle {
            color: var(--color-text-muted);
            font-size: 0.875rem;
            margin-bottom: 1.5rem;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .input-label {
            display: block;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }
        .input-field {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid var(--color-border);
            border-radius: 0.25rem;
            font-size: 1rem;
            font-family: var(--font-sans);
            transition: border-color 0.2s;
            outline: none;
            background: var(--color-card);
        }
        .input-field:focus {
            border-color: var(--color-accent);
        }
        .input-field::placeholder {
            color: var(--color-text-muted);
        }
        .submit-btn {
            width: 100%;
            padding: 0.75rem 1rem;
            background: var(--color-text);
            color: var(--color-card);
            border: 1px solid var(--color-text);
            border-radius: 0.25rem;
            font-size: 1rem;
            font-weight: 500;
            font-family: var(--font-sans);
            cursor: pointer;
            transition: all 0.2s;
            margin-top: 0.5rem;
        }
        .submit-btn:hover {
            opacity: 0.9;
        }
        .submit-btn:disabled {
            opacity: 0.6;
            cursor: not-allowed;
        }
        .footer-link {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 0.875rem;
            color: var(--color-text-muted);
        }
        .footer-link a {
            color: var(--color-accent);
            text-decoration: underline;
            text-underline-offset: 4px;
            font-weight: 500;
        }
        /* Dark mode */
        @media (prefers-color-scheme: dark) {
            body {
                background: var(--color-bg-dark);
                color: var(--color-text-light);
            }
            .card {
                background: var(--color-card-dark);
                box-shadow: var(--shadow-card-dark);
            }
            .input-field {
                border-color: var(--color-border-dark);
                background: var(--color-card-dark);
                color: var(--color-text-light);
            }
            .input-field::placeholder {
                color: var(--color-text-muted-dark);
            }
            .submit-btn {
                background: var(--color-text-light);
                color: var(--color-bg-dark);
                border-color: var(--color-text-light);
            }
            .logo, .title { color: var(--color-text-light); }
            .tagline, .subtitle { color: var(--color-text-muted-dark); }
            .footer-link { color: var(--color-text-muted-dark); }
            .input-label { color: var(--color-text-light); }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="logo">CrownBridge Travel</div>
            <p class="tagline">Your gateway to exclusive travel experiences</p>
            
            <h1 class="title">Create account</h1>
            <p class="subtitle">Sign up to get started</p>

            <form id="signupForm" method="POST" action="{{ url('auth/signup') }}">
                @csrf
                <div class="form-group">
                    <label class="input-label" for="username">Username</label>
                    <input type="text" id="username" name="username" class="input-field" placeholder="Choose a username" required autocomplete="username">
                </div>
                <div class="form-group">
                    <label class="input-label" for="phone_number">Phone Number</label>
                    <input type="tel" id="phone_number" name="phone_number" class="input-field" placeholder="Enter your phone number" required autocomplete="tel">
                </div>
                <div class="form-group">
                    <label class="input-label" for="password">Password</label>
                    <input type="password" id="password" name="password" class="input-field" placeholder="Create a password" required autocomplete="new-password">
                </div>
                <div class="form-group">
                    <label class="input-label" for="invitation_code">Invitation Code</label>
                    <input type="text" id="invitation_code" name="invitation_code" class="input-field" placeholder="Enter invitation code" required value="{{ $code ?? '' }}">
                </div>
                <button type="submit" class="submit-btn">Create Account</button>
            </form>

            <div class="footer-link">
                Already have an account? <a href="{{ url('auth/login') }}">Sign in</a>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#signupForm').on('submit', function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                var submitBtn = $(this).find('.submit-btn');
                submitBtn.prop('disabled', true).text('Creating...');
                $.ajax({
                    url: $(this).attr('action'),
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if(response.status == false){
                            Swal.fire({ icon: 'error', title: 'Error!', text: response.message, confirmButtonColor: '#f53003' });
                            submitBtn.prop('disabled', false).text('Create Account');
                        }
                        if(response.status == true){
                            Swal.fire({ icon: 'success', title: 'Welcome!', text: 'Account created', confirmButtonColor: '#f53003' });
                            setTimeout(function() { window.location.href = '{{ url("auth/login") }}'; }, 2000);
                        }
                    },
                    error: function(xhr, status, error) {
                        Swal.fire({ icon: 'error', title: 'Error!', text: 'Something went wrong.', confirmButtonColor: '#f53003' });
                        submitBtn.prop('disabled', false).text('Create Account');
                    }
                });
            });
        });
    </script>
</body>
</html>
