<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - ABG Blora Bangunan Gedung</title>

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <!-- Favicon -->
    <link rel="icon" href="/assets/abgblora/logo/logokabupatenblora.png" type="image/x-icon">

    <style>
        /* ============================================================
           RESET & VARIABEL
        ============================================================ */
        :root {
            /* Primary SIPD Blue */
            --primary: #0D6EFD;
            --primary-dark: #0B5ED7;
            --primary-light: #E6F0FF;
            --primary-soft: #F0F5FF;

            /* Neutral */
            --white: #FFFFFF;
            --bg-page: #F8FAFC;
            --bg-soft: #F8FAFC;
            --border: #E9EDF4;
            --border-hover: #D0D8E3;

            /* Text */
            --text-dark: #1A2B4A;
            --text-medium: #4A5A72;
            --text-muted: #6B7A93;

            /* Status */
            --error: #DC3545;
            --error-bg: #FEF2F2;
            --success: #198754;

            /* Shadow */
            --shadow-sm: 0 2px 8px rgba(0, 0, 0, 0.02);
            --shadow-md: 0 4px 16px rgba(0, 0, 0, 0.04);
            --shadow-lg: 0 20px 60px rgba(0, 0, 0, 0.08);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        html, body {
            height: 100%;
        }

        body {
            background: var(--bg-page);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }

        /* ============================================================
           BACKGROUND DECORATION (SUBTLE)
        ============================================================ */
        .bg-decoration {
            position: fixed;
            inset: 0;
            z-index: -1;
            overflow: hidden;
            pointer-events: none;
            background: linear-gradient(135deg, #FAFBFD 0%, #F1F5FB 100%);
        }

        .bg-decoration .circle {
            position: absolute;
            border-radius: 50%;
            background: radial-gradient(circle, rgba(13, 110, 253, 0.06) 0%, transparent 70%);
        }

        .bg-decoration .circle-1 {
            width: 500px;
            height: 500px;
            top: -200px;
            right: -150px;
        }

        .bg-decoration .circle-2 {
            width: 400px;
            height: 400px;
            bottom: -150px;
            left: -100px;
        }

        .bg-decoration .circle-3 {
            width: 250px;
            height: 250px;
            top: 40%;
            left: 15%;
            background: radial-gradient(circle, rgba(13, 110, 253, 0.04) 0%, transparent 70%);
        }

        /* ============================================================
           LOGIN CARD
        ============================================================ */
        .login-wrapper {
            width: 100%;
            max-width: 440px;
            z-index: 10;
            animation: fadeUp 0.6s ease forwards;
        }

        .login-card {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 20px;
            box-shadow: var(--shadow-lg);
            overflow: hidden;
        }

        /* --- Header --- */
        .login-header {
            padding: 32px 32px 24px;
            text-align: center;
            background: linear-gradient(135deg, #FAFCFF 0%, #F0F5FF 100%);
            border-bottom: 1px solid var(--border);
            position: relative;
        }

        .login-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            height: 3px;
            width: 100%;
            background: linear-gradient(90deg, var(--primary) 0%, #60A5FA 100%);
        }

        .logo-wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 16px;
            margin-bottom: 16px;
        }

        .logo-wrapper img {
            height: 64px;
            width: auto;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .logo-wrapper img:hover {
            transform: scale(1.05);
        }

        .login-title {
            font-size: 1.15rem;
            font-weight: 700;
            color: var(--text-dark);
            letter-spacing: 0.2px;
            margin-bottom: 4px;
        }

        .login-subtitle {
            font-size: 0.8rem;
            font-weight: 400;
            color: var(--text-muted);
            letter-spacing: 0.2px;
        }

        /* --- Body --- */
        .login-body {
            padding: 32px;
        }

        .form-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .form-title::before {
            content: '';
            width: 4px;
            height: 18px;
            background: var(--primary);
            border-radius: 4px;
        }

        /* --- Form Group --- */
        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 0.75rem;
            font-weight: 600;
            color: var(--text-medium);
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-bottom: 6px;
        }

        .input-wrapper {
            position: relative;
        }

        .form-input {
            width: 100%;
            padding: 0.75rem 2.75rem 0.75rem 1rem;
            border: 1px solid var(--border);
            border-radius: 10px;
            background: var(--bg-soft);
            font-size: 0.875rem;
            font-weight: 500;
            color: var(--text-dark);
            transition: all 0.2s ease;
            outline: none;
        }

        .form-input::placeholder {
            color: #94A3B8;
            font-weight: 400;
        }

        .form-input:focus {
            border-color: var(--primary);
            background: var(--white);
            box-shadow: 0 0 0 3px rgba(13, 110, 253, 0.08);
        }

        .input-icon {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 0.95rem;
            pointer-events: none;
            transition: color 0.2s ease;
        }

        .input-wrapper:focus-within .input-icon {
            color: var(--primary);
        }

        .input-icon.clickable {
            pointer-events: auto;
            cursor: pointer;
        }

        .input-icon.clickable:hover {
            color: var(--primary);
        }

        /* --- Error --- */
        .error-message {
            display: flex;
            align-items: center;
            gap: 6px;
            margin-top: 6px;
            padding: 8px 12px;
            background: var(--error-bg);
            border: 1px solid #FECACA;
            border-radius: 8px;
            font-size: 0.75rem;
            color: var(--error);
            font-weight: 500;
        }

        .error-message i {
            font-size: 0.85rem;
        }

        /* --- Button --- */
        .login-button {
            width: 100%;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 0.75rem 1.5rem;
            margin-top: 8px;
            background: var(--primary);
            color: var(--white);
            border: none;
            border-radius: 10px;
            font-size: 0.875rem;
            font-weight: 600;
            letter-spacing: 0.3px;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .login-button:hover {
            background: var(--primary-dark);
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(13, 110, 253, 0.25);
        }

        .login-button:active {
            transform: translateY(0);
            box-shadow: 0 2px 8px rgba(13, 110, 253, 0.2);
        }

        /* --- Register Link --- */
        .register-link {
            text-align: center;
            margin-top: 20px;
            font-size: 0.8rem;
            color: var(--text-muted);
        }

        .register-link a {
            color: var(--primary);
            font-weight: 600;
            text-decoration: none;
            margin-left: 4px;
            transition: color 0.2s ease;
        }

        .register-link a:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        /* --- Login Footer --- */
        .login-footer {
            margin-top: 24px;
            padding-top: 20px;
            border-top: 1px solid var(--border);
            text-align: center;
        }

        .login-footer .logo-img {
            width: 100px;
            height: 100px;
            object-fit: contain;
            margin-bottom: 8px;
            transition: transform 0.3s ease;
        }

        .login-footer .logo-img:hover {
            transform: scale(1.05);
        }

        .login-footer p {
            font-size: 0.75rem;
            color: var(--text-muted);
            line-height: 1.6;
            margin-bottom: 4px;
        }

        .login-footer .copyright {
            font-size: 0.7rem;
            color: #94A3B8;
            margin-top: 8px;
        }

        /* ============================================================
           ANIMATION
        ============================================================ */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ============================================================
           RESPONSIVE
        ============================================================ */
        @media (max-width: 576px) {
            body {
                padding: 12px;
            }

            .login-card {
                border-radius: 16px;
            }

            .login-header {
                padding: 24px 20px 20px;
            }

            .logo-wrapper img {
                height: 52px;
            }

            .login-title {
                font-size: 1rem;
            }

            .login-body {
                padding: 24px 20px;
            }

            .form-title {
                font-size: 0.9rem;
                margin-bottom: 20px;
            }

            .login-footer .logo-img {
                width: 80px;
                height: 80px;
            }
        }
    </style>
</head>

<body>

    {{-- Background Decoration --}}
    <div class="bg-decoration">
        <div class="circle circle-1"></div>
        <div class="circle circle-2"></div>
        <div class="circle circle-3"></div>
    </div>

    {{-- Login Card --}}
    <div class="login-wrapper">
        <div class="login-card">

            {{-- HEADER --}}
            <div class="login-header">
                <div class="logo-wrapper">
                    <img src="/assets/abgblora/logo/logokabblora.png" alt="Logo Kabupaten Blora">
                </div>
                <h3 class="login-title">Bangunan Gedung</h3>
                <p class="login-subtitle">Dinas Pekerjaan Umum dan Penataan Ruang</p>
            </div>

            {{-- BODY --}}
            <div class="login-body">

                <h2 class="form-title">Halaman Login</h2>

                <form action="/login" method="POST" id="loginForm">
                    @csrf

                    {{-- Login Error --}}
                    @if ($errors->has('loginError'))
                        <div class="error-message">
                            <i class="fas fa-exclamation-circle"></i>
                            <span>{{ $errors->first('loginError') }}</span>
                        </div>
                    @endif

                    {{-- Email --}}
                    <div class="form-group">
                        <label class="form-label" for="email">Email</label>
                        <div class="input-wrapper">
                            <input
                                type="text"
                                id="email"
                                name="email"
                                class="form-input"
                                placeholder="Masukkan email Anda"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email"
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

                    {{-- Password --}}
                    <div class="form-group">
                        <label class="form-label" for="password">Password</label>
                        <div class="input-wrapper">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                class="form-input"
                                placeholder="Masukkan kata sandi Anda"
                                required
                                autocomplete="current-password"
                            >
                            <i class="fas fa-eye input-icon clickable" id="togglePassword"></i>
                        </div>
                        @error('password')
                            <div class="error-message">
                                <i class="fas fa-exclamation-circle"></i>
                                <span>{{ $message }}</span>
                            </div>
                        @enderror
                    </div>

                    {{-- Submit --}}
                    <button type="submit" class="login-button">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Masuk</span>
                    </button>

                    {{-- Register Link --}}
                    <div class="register-link">
                        <span>Belum punya akun?</span>
                        <a href="/daftar">Daftar sekarang</a>
                    </div>

                </form>

                {{-- LOGIN FOOTER --}}
                <div class="login-footer">
                    <img
                        src="{{ asset('/assets/abgblora/logo/dpuprblora.png') }}"
                        alt="Logo DPUPR Blora"
                        class="logo-img"
                    >
                    <p>
                        Dinas Pekerjaan Umum dan Penataan Ruang<br>
                        Kabupaten Blora, Provinsi Jawa Tengah
                    </p>
                    <p class="copyright">
                        &copy; {{ date('Y') }} ABG Blora Bangunan Gedung
                    </p>
                </div>

            </div> {{-- /login-body --}}
        </div> {{-- /login-card --}}
    </div> {{-- /login-wrapper --}}

    {{-- ============================================================
         SCRIPT
    ============================================================ --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // ==========================================
            // Toggle Password Visibility
            // ==========================================
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');

            if (togglePassword && passwordInput) {
                togglePassword.addEventListener('click', function () {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    this.classList.toggle('fa-eye');
                    this.classList.toggle('fa-eye-slash');
                });
            }

            // ==========================================
            // Form Validation
            // ==========================================
            const form = document.getElementById('loginForm');

            if (form) {
                form.addEventListener('submit', function (e) {
                    const email = document.getElementById('email').value.trim();
                    const password = document.getElementById('password').value.trim();

                    // Cek kosong
                    if (!email || !password) {
                        e.preventDefault();
                        alert('Harap isi email dan kata sandi!');
                        return false;
                    }

                    // Cek format email
                    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailPattern.test(email)) {
                        e.preventDefault();
                        alert('Format email tidak valid!');
                        return false;
                    }

                    return true;
                });
            }

        });
    </script>

</body>
</html>
