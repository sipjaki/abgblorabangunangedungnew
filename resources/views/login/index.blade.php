<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ABG Blora Bangunan Gedung</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" href="/assets/abgblora/logo/logokabupatenblora.png" type="image/x-icon">
    <style>
        :root {
            --navy-dark: #001233;
            --navy-primary: #002855;
            --navy-light: #023E7D;
            --accent-blue: #0466C8;
            --accent-light: #5C9DFF;
            --white: #FFFFFF;
            --gray-light: #F8F9FA;
            --gray-border: #E0E0E0;
            --gray-text: #6C757D;
            --error-red: #E63946;
            --success-green: #2A9D8F;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: var(--white);
            color: var(--navy-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
        }

        /* Background dengan pola geometris minimalis */
        .background-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -2;
            overflow: hidden;
        }

        .background-shapes {
            position: absolute;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, var(--navy-dark) 0%, var(--navy-primary) 100%);
        }

        .shape {
            position: absolute;
            background: rgba(255, 255, 255, 0.03);
            border-radius: 50%;
        }

        .shape-1 {
            width: 300px;
            height: 300px;
            top: -150px;
            right: -100px;
        }

        .shape-2 {
            width: 200px;
            height: 200px;
            bottom: -80px;
            left: -80px;
        }

        .shape-3 {
            width: 150px;
            height: 150px;
            top: 40%;
            left: 10%;
        }

        .shape-4 {
            width: 100px;
            height: 100px;
            bottom: 20%;
            right: 15%;
        }

        /* Login Container */
        .login-container {
            width: 100%;
            max-width: 450px;
            background-color: var(--white);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 40, 85, 0.1);
            overflow: hidden;
            margin: 20px;
            z-index: 10;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-container:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0, 40, 85, 0.15);
        }

        /* Header dengan gradient navy */
        .login-header {
            background: linear-gradient(135deg, var(--navy-primary) 0%, var(--navy-dark) 100%);
            padding: 30px 40px;
            text-align: center;
            color: var(--white);
            position: relative;
            overflow: hidden;
        }

        .login-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, var(--accent-blue) 0%, var(--accent-light) 100%);
        }

        .logo-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 25px;
            margin-bottom: 20px;
        }

        .logo {
            height: 70px;
            width: auto;
            /* filter: brightness(0) invert(1); */
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .title {
            font-size: 1.8rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            margin-bottom: 5px;
        }

        .subtitle {
            font-size: 0.9rem;
            opacity: 0.8;
            font-weight: 300;
        }

        /* Form Container */
        .form-container {
            padding: 40px;
        }

        .form-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--navy-dark);
            margin-bottom: 30px;
            text-align: center;
            position: relative;
        }

        .form-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 3px;
            background: var(--accent-blue);
            border-radius: 2px;
        }

        /* Form Styling */
        .form-group {
            margin-bottom: 25px;
            position: relative;
        }

        .form-label {
            display: block;
            font-size: 0.9rem;
            font-weight: 500;
            color: var(--navy-dark);
            margin-bottom: 8px;
            padding-left: 5px;
        }

        .input-with-icon {
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 15px 45px 15px 15px;
            border: 2px solid var(--gray-border);
            border-radius: 10px;
            font-size: 1rem;
            color: var(--navy-dark);
            background-color: var(--white);
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 3px rgba(4, 102, 200, 0.1);
        }

        .input-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--gray-text);
            font-size: 1.1rem;
        }

        .password-toggle {
            cursor: pointer;
            color: var(--navy-light);
            transition: color 0.2s ease;
        }

        .password-toggle:hover {
            color: var(--accent-blue);
        }

        .error-message {
            color: var(--error-red);
            font-size: 0.85rem;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .error-message i {
            font-size: 0.9rem;
        }

        /* Login Button */
        .login-button {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, var(--navy-primary) 0%, var(--navy-dark) 100%);
            color: var(--white);
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            letter-spacing: 0.5px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        .login-button:hover {
            background: linear-gradient(135deg, var(--navy-light) 0%, var(--navy-primary) 100%);
            transform: translateY(-2px);
            box-shadow: 0 7px 15px rgba(0, 40, 85, 0.2);
        }

        .login-button:active {
            transform: translateY(0);
        }

        /* Register Link */
        .register-link {
            text-align: center;
            margin-top: 25px;
            font-size: 0.95rem;
            color: var(--gray-text);
        }

        .register-link a {
            color: var(--accent-blue);
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s ease;
            margin-left: 5px;
        }

        .register-link a:hover {
            color: var(--navy-dark);
            text-decoration: underline;
        }

        /* Footer */
        .footer {
            margin-top: 40px;
            padding: 25px 30px;
            background-color: var(--navy-dark);
            color: var(--white);
            border-radius: 15px;
            text-align: center;
            max-width: 500px;
            width: 90%;
            z-index: 10;
            margin-bottom: 20px;
        }

        .footer-logos {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-bottom: 15px;
        }

        .footer-logo {
            height: 40px;
            width: auto;
            filter: brightness(0) invert(1);
            transition: transform 0.3s ease;
        }

        .footer-logo:hover {
            transform: scale(1.1);
        }

        .footer-text {
            font-size: 0.9rem;
            line-height: 1.5;
            opacity: 0.9;
        }

        .footer-text strong {
            color: var(--accent-light);
            font-weight: 600;
        }

        /* Responsive Design */
        @media (max-width: 576px) {
            .login-container {
                max-width: 90%;
                margin: 15px;
            }

            .login-header {
                padding: 25px 20px;
            }

            .logo-container {
                gap: 15px;
            }

            .logo {
                height: 55px;
            }

            .form-container {
                padding: 30px 25px;
            }

            .title {
                font-size: 1.5rem;
            }

            .footer {
                padding: 20px;
                font-size: 0.85rem;
            }

            .footer-logos {
                gap: 15px;
            }

            .footer-logo {
                height: 35px;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .login-container, .footer {
            animation: fadeIn 0.6s ease forwards;
        }

        .shape {
            animation: float 20s ease-in-out infinite;
        }

        .shape-1 {
            animation-delay: 0s;
        }

        .shape-2 {
            animation-delay: 5s;
        }

        .shape-3 {
            animation-delay: 10s;
        }

        .shape-4 {
            animation-delay: 15s;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(0deg); }
            50% { transform: translateY(-20px) rotate(5deg); }
        }
    </style>
</head>
<body>
    <!-- Background dengan pola geometris -->
    <div class="background-container">
        <div class="background-shapes">
            <div class="shape shape-1"></div>
            <div class="shape shape-2"></div>
            <div class="shape shape-3"></div>
            <div class="shape shape-4"></div>
        </div>
    </div>

    <!-- Login Container -->
    <div class="login-container">
        <!-- Header -->
        <div class="login-header">
            <div class="logo-container">
                <img src="/assets/abgblora/logo/logobangunangedungblora.png" alt="ABG Blora" class="logo">
            </div>
            <h1 class="title">App Bangunan Gedung</h1>
            <p class="subtitle">Dinas Pekerjaan Umum Dan Penataan Ruang
                <br> Kabupaten Blora</p>
        </div>

        <!-- Form -->
        <div class="form-container">
            <h2 class="form-title">Silahkan Login !</h2>

            <form action="/login" method="POST">
                @csrf

                <!-- Error Message -->
                @if ($errors->has('loginError'))
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i>
                        <span>{{ $errors->first('loginError') }}</span>
                    </div>
                @endif

                <!-- Email Input -->
                <div class="form-group">
                    <label class="form-label" for="email">Email</label>
                    <div class="input-with-icon">
                        <input
                            type="text"
                            id="email"
                            name="email"
                            class="form-input"
                            placeholder="Masukkan email Anda"
                            value="{{ old('email') }}"
                            required
                        >
                        <i class="fas fa-user input-icon"></i>
                    </div>
                    @error('email')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Password Input -->
                <div class="form-group">
                    <label class="form-label" for="password">Kata Sandi</label>
                    <div class="input-with-icon">
                        <input
                            type="password"
                            id="password"
                            name="password"
                            class="form-input"
                            placeholder="Masukkan kata sandi Anda"
                            required
                        >
                        <i class="fas fa-eye password-toggle input-icon" id="togglePassword"></i>
                    </div>
                    @error('password')
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Login Button -->
                <button type="submit" class="login-button">
                    <i class="fas fa-sign-in-alt"></i>
                    <span>Masuk</span>
                </button>

                <!-- Register Link -->
                <div class="register-link">
                    <span>Belum punya akun?</span>
                    <a href="/daftar">Daftar sekarang</a>
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <div class="footer-logos">
            <img src="/assets/abgblora/logo/logokabupatenblora.png" alt="Kabupaten Blora" class="footer-logo">
            <img src="/assets/abgblora/logo/pupr.png" alt="PUPR" class="footer-logo">
        </div>
        <div class="footer-text">
            <strong>ABG Blora Bangunan Gedung</strong><br>
            Dinas Pekerjaan Umum dan Penataan Ruang<br>
            Kabupaten Blora, Provinsi Jawa Tengah
        </div>
    </div>

    <script>
        // Toggle Password Visibility
        document.getElementById('togglePassword').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const icon = this;

            // Toggle password visibility
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);

            // Toggle icon
            if (type === 'text') {
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        });

        // Form validation on submit
        document.querySelector('form').addEventListener('submit', function(e) {
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;

            // Simple validation
            if (!email || !password) {
                e.preventDefault();
                alert('Harap isi email dan kata sandi!');
                return false;
            }

            // Email format validation
            const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailPattern.test(email)) {
                e.preventDefault();
                alert('Format email tidak valid!');
                return false;
            }

            return true;
        });

        // Add focus effect to inputs
        const inputs = document.querySelectorAll('.form-input');
        inputs.forEach(input => {
            // Add focus effect
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });

            // Remove focus effect
            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>
