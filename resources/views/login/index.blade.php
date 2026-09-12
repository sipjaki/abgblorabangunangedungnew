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
            /* --primary: #0D6EFD;
            --primary-dark: #0B5ED7; */
            /* --primary: #0B1F3A;
            --primary-dark: #061426; */
            --primary: #2563B8;
            --primary-dark: #1E40AF;
            --primary-light: #E6F0FF;
            --primary-soft: #F0F5FF;

            --white: #FFFFFF;
            --bg-page: #F8FAFC;
            --bg-soft: #F8FAFC;
            --border: #E9EDF4;
            --border-hover: #D0D8E3;

            --text-dark: #1A2B4A;
            --text-medium: #4A5A72;
            --text-muted: #6B7A93;

            --error: #DC3545;
            --error-bg: #FEF2F2;
            --success: #198754;

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
           BACKGROUND DECORATION – LENGKAP & ELEGAN
        ============================================================ */
        .bg-decoration {
            position: fixed;
            inset: 0;
            z-index: -1;
            overflow: hidden;
            pointer-events: none;
            background:
                linear-gradient(135deg, #F8FAFC 0%, #EEF4FB 50%, #E8F0FE 100%);
        }

        /* --- Pola Grid Halus --- */
        .bg-grid {
            position: absolute;
            inset: 0;
            background-image:
                linear-gradient(rgba(13, 110, 253, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(13, 110, 253, 0.04) 1px, transparent 1px);
            background-size: 40px 40px;
            mask-image: radial-gradient(circle at center, black 40%, transparent 80%);
            -webkit-mask-image: radial-gradient(circle at center, black 40%, transparent 80%);
        }

        /* --- Pola Titik-Titik --- */
        .bg-dots {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle, rgba(13, 110, 253, 0.08) 1px, transparent 1px);
            background-size: 24px 24px;
            opacity: 0.6;
        }

        /* --- Blob / Lingkaran Besar --- */
        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(2px);
        }

        .blob-1 {
            width: 520px;
            height: 520px;
            top: -220px;
            right: -180px;
            background: radial-gradient(circle, rgba(13, 110, 253, 0.12) 0%, rgba(13, 110, 253, 0.02) 60%, transparent 80%);
            animation: floatSlow 20s ease-in-out infinite;
        }

        .blob-2 {
            width: 420px;
            height: 420px;
            bottom: -180px;
            left: -140px;
            background: radial-gradient(circle, rgba(59, 130, 246, 0.10) 0%, rgba(59, 130, 246, 0.02) 60%, transparent 80%);
            animation: floatSlow 25s ease-in-out infinite reverse;
        }

        .blob-3 {
            width: 300px;
            height: 300px;
            top: 45%;
            left: 10%;
            background: radial-gradient(circle, rgba(13, 110, 253, 0.08) 0%, transparent 70%);
            animation: floatSlow 18s ease-in-out infinite;
        }

        .blob-4 {
            width: 260px;
            height: 260px;
            bottom: 15%;
            right: 12%;
            background: radial-gradient(circle, rgba(96, 165, 250, 0.10) 0%, transparent 70%);
            animation: floatSlow 22s ease-in-out infinite reverse;
        }

        /* --- Shape Geometris --- */
        .shape {
            position: absolute;
            opacity: 0.5;
        }

        .shape-circle {
            border: 2px solid rgba(13, 110, 253, 0.12);
            border-radius: 50%;
        }

        .shape-square {
            border: 2px solid rgba(13, 110, 253, 0.10);
            border-radius: 12px;
            transform: rotate(45deg);
        }

        .shape-ring {
            border: 3px dashed rgba(13, 110, 253, 0.10);
            border-radius: 50%;
            animation: spinSlow 40s linear infinite;
        }

        .shape-ring-1 {
            width: 180px;
            height: 180px;
            top: 15%;
            left: 8%;
        }

        .shape-ring-2 {
            width: 120px;
            height: 120px;
            bottom: 20%;
            right: 10%;
            animation-direction: reverse;
        }

        .shape-circle-1 {
            width: 24px;
            height: 24px;
            top: 25%;
            right: 20%;
            background: rgba(13, 110, 253, 0.15);
            border: none;
        }

        .shape-circle-2 {
            width: 16px;
            height: 16px;
            bottom: 30%;
            left: 20%;
            background: rgba(96, 165, 250, 0.2);
            border: none;
        }

        .shape-circle-3 {
            width: 10px;
            height: 10px;
            top: 60%;
            right: 8%;
            background: rgba(13, 110, 253, 0.2);
            border: none;
        }

        .shape-square-1 {
            width: 60px;
            height: 60px;
            top: 70%;
            left: 5%;
        }

        .shape-square-2 {
            width: 40px;
            height: 40px;
            top: 10%;
            right: 30%;
        }

        /* --- Garis Diagonal Dekoratif --- */
        .bg-line {
            position: absolute;
            width: 200%;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(13, 110, 253, 0.08), transparent);
            transform: rotate(-30deg);
        }

        .bg-line-1 {
            top: 20%;
            left: -50%;
        }

        .bg-line-2 {
            bottom: 25%;
            right: -50%;
            transform: rotate(-30deg);
        }

        /* --- Ikon Dekoratif Transparan --- */
        .bg-icon {
            position: absolute;
            color: rgba(13, 110, 253, 0.06);
            font-size: 8rem;
            pointer-events: none;
        }

        .bg-icon-1 {
            top: 8%;
            left: -20px;
            transform: rotate(-15deg);
        }

        .bg-icon-2 {
            bottom: 5%;
            right: -10px;
            transform: rotate(15deg);
            font-size: 10rem;
        }

        .bg-icon-3 {
            top: 45%;
            right: 5%;
            font-size: 5rem;
            opacity: 0.5;
        }

        .bg-icon-4 {
            bottom: 40%;
            left: 2%;
            font-size: 4rem;
            opacity: 0.5;
        }

        /* --- Animasi --- */
        @keyframes floatSlow {
            0%, 100% {
                transform: translate(0, 0) scale(1);
            }
            50% {
                transform: translate(20px, -30px) scale(1.05);
            }
        }

        @keyframes spinSlow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
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
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
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
        @media (max-width: 768px) {
            .bg-icon { font-size: 5rem; }
            .bg-icon-2 { font-size: 6rem; }
            .blob-1 { width: 350px; height: 350px; }
            .blob-2 { width: 300px; height: 300px; }
            .shape-ring-1 { width: 120px; height: 120px; }
            .shape-ring-2 { width: 80px; height: 80px; }
        }

        @media (max-width: 576px) {
            body { padding: 12px; }
            .bg-icon { display: none; }
            .bg-line { display: none; }
            .blob { filter: blur(1px); }
            .blob-1 { width: 280px; height: 280px; top: -120px; right: -100px; }
            .blob-2 { width: 240px; height: 240px; bottom: -100px; left: -80px; }
            .blob-3, .blob-4 { display: none; }

            .login-card { border-radius: 16px; }
            .login-header { padding: 24px 20px 20px; }
            .logo-wrapper img { height: 52px; }
            .login-title { font-size: 1rem; }
            .login-body { padding: 24px 20px; }
            .form-title { font-size: 0.9rem; margin-bottom: 20px; }
            .login-footer .logo-img { width: 80px; height: 80px; }
        }
    </style>
</head>

<body>

    {{-- ============================================================
         BACKGROUND DECORATION
    ============================================================ --}}
    <div class="bg-decoration">

        {{-- Pola Grid --}}
        <div class="bg-grid"></div>

        {{-- Pola Titik --}}
        <div class="bg-dots"></div>

        {{-- Blob / Lingkaran Besar --}}
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
        <div class="blob blob-4"></div>

        {{-- Ring Berputar --}}
        <div class="shape shape-ring shape-ring-1"></div>
        <div class="shape shape-ring shape-ring-2"></div>

        {{-- Kotak Geometris --}}
        <div class="shape shape-square shape-square-1"></div>
        <div class="shape shape-square shape-square-2"></div>

        {{-- Titik Kecil --}}
        <div class="shape shape-circle shape-circle-1"></div>
        <div class="shape shape-circle shape-circle-2"></div>
        <div class="shape shape-circle shape-circle-3"></div>

        {{-- Garis Diagonal --}}
        <div class="bg-line bg-line-1"></div>
        <div class="bg-line bg-line-2"></div>

        {{-- Ikon Dekoratif Transparan --}}
        <i class="fas fa-building bg-icon bg-icon-1"></i>
        <i class="fas fa-city bg-icon bg-icon-2"></i>
        <i class="fas fa-compass-drafting bg-icon bg-icon-3"></i>
        <i class="fas fa-ruler-combined bg-icon bg-icon-4"></i>

    </div>

    {{-- ============================================================
         LOGIN CARD
    ============================================================ --}}
    <div class="login-wrapper">
        <div class="login-card">

            {{-- HEADER --}}
            <div class="login-header">
                <div class="logo-wrapper">
                    <img src="/assets/abgblora/logo/logokabblora.png" alt="Logo Kabupaten Blora">
                </div>
                <h3 class="login-title">ABG Blora Bangunan Gedung</h3>
                {{-- <p class="login-subtitle">Dinas Pekerjaan Umum dan Penataan Ruang</p> --}}
            </div>

            {{-- BODY --}}
            <div class="login-body">

                <h2 class="form-title">Halaman Login !</h2>

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

                    if (!email || !password) {
                        e.preventDefault();
                        alert('Harap isi email dan kata sandi!');
                        return false;
                    }

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
