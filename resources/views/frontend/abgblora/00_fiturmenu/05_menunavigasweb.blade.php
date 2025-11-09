    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #F6F5FA;
            color: #030303;
            padding-top: 180px; /* Untuk mengkompensasi navbar fixed */
        }

        .sticky-navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            z-index: 9999;
            background-color: white;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .navbar-wrapper {
            width: 100%;
            background-color: #09146A;
            padding: 15px 0;
        }

        .custom-navbar {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 15px;
        }
.logo-group {
    display: flex;
    align-items: center;
    gap: 10px;
    flex: 1;
    min-width: 250px;

    flex-wrap: nowrap; /* tetap satu baris */
    overflow-x: auto;  /* scroll horizontal jika layar kecil */
}

.logo-group img {
    height: 40px;
    width: auto;
    flex-shrink: 0; /* jangan mengecil saat container sempit */
}

/* opsional: hide scrollbar di webkit */
.logo-group::-webkit-scrollbar {
    height: 6px;
}

.logo-group::-webkit-scrollbar-thumb {
    background: rgba(0,0,0,0.2);
    border-radius: 3px;
}

        .logo-text {
            color: black;
            font-weight: bold;
            line-height: 1.4;
            font-size: 14px;
        }

        .profile-section {
            display: flex;
            align-items: center;
            gap: 12px;
            font-weight: 600;
            color: black;
            transition: color 0.3s ease;
            flex: 1;
            justify-content: center;
        }

        .profile-section:hover {
            color: #6635F1;
        }

        .profile-pic {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
            border: 2px solid #003afa;
        }

        .profile-pic img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .auth-buttons {
            display: flex;
            gap: 15px;
            flex: 1;
            justify-content: flex-end;
        }

        .auth-buttons a, .auth-buttons button {
            text-decoration: none;
            color: black;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 8px 16px;
            border-radius: 4px;
            background-color: white;
            border: 1px solid #ddd;
            transition: all 0.3s ease;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
        }

        .auth-buttons a:hover, .auth-buttons button:hover {
            background-color: #001f3f;
            color: white;
            transform: translateY(-2px);
        }

        .auth-buttons .logout-btn:hover {
            background-color: #d32f2f;
        }

        /* Menu Navigasi */
        .nav-menu {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 10px 20px;
        }

        .nav-links {
            display: flex;
            gap: 10px;
            list-style: none;
            padding: 0;
            margin: 0;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
        }

        .nav-links a {
            color: white;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s ease;
            padding: 8px 15px;
            border-radius: 4px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .nav-links a:hover,
        .nav-links .active {
            color: #6635F1;
            font-weight: 600;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .dropdown {
            position: relative;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #09146A;
            padding: 10px 0;
            border-radius: 8px;
            top: 100%;
            left: 0;
            min-width: 250px;
            z-index: 999;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .dropdown-menu li {
            padding: 8px 15px;
            font-size: 14px;
        }

        .dropdown-menu li a {
            color: white;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 10px;
            border-radius: 4px;
        }

        .dropdown-menu li a:hover {
            color: #6635F1;
            background-color: rgba(255, 255, 255, 0.1);
        }

        .dropdown.show .dropdown-menu {
            display: block;
        }

        /* Modal */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 10000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            width: 90%;
            max-width: 400px;
            padding: 25px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .modal-logo {
            width: 80px;
            height: auto;
            margin: 0 auto 15px;
        }

        .modal p {
            margin-bottom: 20px;
            line-height: 1.5;
        }

        .modal-button {
            padding: 10px 20px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .modal-button:hover {
            background: white;
            color: #007bff;
            border: 1px solid #007bff;
        }

        /* Mobile Menu Toggle */
        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
            padding: 5px 10px;
            z-index: 10001;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            right: -100%;
            width: 85%;
            max-width: 350px;
            height: 100%;
            background-color: #09146A;
            z-index: 10002;
            transition: right 0.4s ease;
            overflow-y: auto;
            padding: 20px;
            box-shadow: -5px 0 15px rgba(0, 0, 0, 0.2);
        }

        .sidebar.active {
            right: 0;
        }

        .sidebar-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .sidebar-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            color: black;
        }

        .sidebar-logo img {
            height: 35px;
            width: auto;
        }

        .sidebar-logo-text {
            color: white;
            font-weight: bold;
            font-size: 14px;
            line-height: 1.3;
        }

        .close-sidebar {
            background: none;
            border: none;
            color: white;
            font-size: 24px;
            cursor: pointer;
        }

        .sidebar-profile {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 25px;
            padding: 15px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 8px;
        }

        .sidebar-profile-pic {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            overflow: hidden;
            flex-shrink: 0;
        }

        .sidebar-profile-pic img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .sidebar-profile-info {
            color: white;
        }

        .sidebar-profile-name {
            font-weight: 600;
            margin-bottom: 5px;
        }

        .sidebar-links {
            list-style: none;
            margin-bottom: 25px;
        }

        .sidebar-links li {
            margin-bottom: 8px;
        }

        .sidebar-links a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 15px;
            border-radius: 6px;
            transition: all 0.3s ease;
        }

        .sidebar-links a:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: #6635F1;
        }

        .sidebar-dropdown {
            margin-left: 20px;
            margin-top: 5px;
            display: none;
        }

        .sidebar-dropdown.active {
            display: block;
        }

        .sidebar-dropdown a {
            padding: 10px 15px;
            font-size: 14px;
        }

        .sidebar-auth {
            display: flex;
            flex-direction: column;
            gap: 12px;
            margin-top: 20px;
        }

        .sidebar-auth a, .sidebar-auth button {
            text-decoration: none;
            color: #09146A;
            font-weight: 500;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            padding: 12px;
            border-radius: 6px;
            background-color: white;
            border: none;
            transition: all 0.3s ease;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            width: 100%;
        }

        .sidebar-auth a:hover, .sidebar-auth button:hover {
            background-color: #001f3f;
            color: white;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 10001;
            display: none;
        }

        .overlay.active {
            display: block;
        }

        /* Responsive Styles */
        @media (max-width: 1024px) {
            .custom-navbar {
                flex-direction: column;
                gap: 15px;
            }

            .logo-group, .profile-section, .auth-buttons {
                justify-content: center;
                width: 100%;
            }

            .nav-links {
                gap: 5px;
            }

            .nav-links a {
                padding: 6px 10px;
                font-size: 14px;
            }
        }

        @media (max-width: 768px) {
            body {
                padding-top: 150px;
            }

            .navbar-wrapper {
                padding: 10px 0;
            }

            .mobile-toggle {
                display: block;
                position: absolute;
                right: 20px;
                top: 15px;
            }

            .nav-menu {
                display: none;
            }

            .logo-text {
                font-size: 12px;
            }

            .profile-section {
                display: none;
            }

            .auth-buttons {
                display: none;
            }
        }

        @media (max-width: 480px) {
            .logo-group {
                flex-direction: column;
                text-align: center;
            }

            .logo-text {
                font-size: 11px;
            }
        }
    </style>
</head>
<body>
    <div class="sticky-navbar">
        <div class="navbar-wrapper">
            <div class="custom-navbar" style="background-color: white; padding: 10px; border-radius:15px;">
                <!-- Kiri: Logo dan Judul -->
                <div class="logo-group">
                    <img src="/assets/abgblora/logo/logokabupatenblora.png" alt="Logo Kabupaten Blora" loading="lazy" />
                    <img src="/assets/abgblora/logo/pupr.png" alt="Logo PUPR" loading="lazy" />
                    <div class="logo-text">
                        ABG Blora Bangunan Gedung <br />
                        Dinas Pekerjaan Umum Dan Penataan Ruang Kabupaten Blora
                    </div>
                </div>

                <!-- Tengah: Info Pengguna -->
                <div class="profile-section">
                    <!-- PHP condition would go here in actual implementation -->
                    <p>Hi, Pengguna</p>
                    <div class="profile-pic">
                        <img src="/assets/abgblora/logo/iconabgblora.png" alt="Profile Photo" />
                    </div>
                </div>

                <!-- Kanan: Tombol Login & Daftar -->
                <div class="auth-buttons">
                    <a href="/register">
                        <i class="fas fa-user-plus"></i>
                        Daftar
                    </a>

                    <!-- For guest users -->
                    <a href="/login">
                        <i class="fas fa-sign-in-alt"></i>
                        Login
                    </a>

                    <!-- For authenticated users -->
                    <!--
                    <form action="{{ url('/logout') }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="logout-btn">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                    -->
                </div>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-toggle" id="mobileToggle">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Menu Navigasi -->
            <nav class="nav-menu" id="navMenu">
                <ul class="nav-links">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">
                            <i class="fas fa-building"></i>
                            PBG/SLF
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/infopbg">
                                    <i class="fas fa-info-circle"></i>
                                    Informasi PBG & SLF
                                </a>
                            </li>
                            <li>
                                <a href="#" onclick="showLoginModal()">
                                    <i class="fas fa-file-alt"></i>
                                    Permohonan PBG & SLF
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">
                            <i class="fas fa-search"></i>
                            Tracking
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/infotrakingweb">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Tracking PBG & SLF
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">
                            <i class="fas fa-database"></i>
                            Pendataan
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/databangunangedung">
                                    <i class="fas fa-building"></i>
                                    Bangunan Gedung
                                </a>
                            </li>
                            <li>
                                <a href="/pendataankicbangunangedung">
                                    <i class="fas fa-tools"></i>
                                    KIC Gedung & Bangunan
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">
                            <i class="fas fa-hands-helping"></i>
                            Bantek
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/infobantek">
                                    <i class="fas fa-info-circle"></i>
                                    Informasi Bantuan Teknis
                                </a>
                            </li>
                            <li>
                                <a href="/febantuanteknis" onclick="showLoginModal()">
                                    <i class="fas fa-file-alt"></i>
                                    Permohonan Bantuan Teknis
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">
                            <i class="fas fa-file-contract"></i>
                            KRK
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/infokrkpermohonan">
                                    <i class="fas fa-info-circle"></i>
                                    Informasi Permohonan KRK
                                </a>
                            </li>
                            <li>
                                <a href="/permohonankrk" onclick="showLoginModal()">
                                    <i class="fas fa-file-alt"></i>
                                    Permohonan KRK
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">
                            <i class="fas fa-home"></i>
                            MBR
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/infombrgambar">
                                    <i class="fas fa-info-circle"></i>
                                    Informasi MBR
                                </a>
                            </li>
                            <li>
                                <a href="/bembrpengkajiteknis">
                                    <i class="fas fa-user-tie"></i>
                                    Daftar Konsultan Pengkaji Teknis
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle">
                            <i class="fas fa-question-circle"></i>
                            Bantuan
                        </a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="/infobantuangambar">
                                    <i class="fas fa-info-circle"></i>
                                    Informasi Bantuan Gambar
                                </a>
                            </li>
                            <li>
                                <a href="/feformbantuangambar" onclick="showLoginModal()">
                                    <i class="fas fa-file-alt"></i>
                                    Permohonan Bantuan Gambar
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>

    <!-- Sidebar untuk Mobile -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-logo">
                <img src="/assets/abgblora/logo/logokabupatenblora.png" alt="Logo Kabupaten Blora" loading="lazy" />
                <div class="sidebar-logo-text">
                    ABG Blora
                </div>
            </div>
            <button class="close-sidebar" id="closeSidebar">
                <i class="fas fa-times"></i>
            </button>
        </div>

        <div class="sidebar-profile">
            <div class="sidebar-profile-pic">
                <img src="/assets/abgblora/logo/iconabgblora.png" alt="Profile Photo" />
            </div>
            <div class="sidebar-profile-info">
                <div class="sidebar-profile-name">Hi, Pengguna</div>
                <div>Status: Online</div>
            </div>
        </div>

        <ul class="sidebar-links">
            <li>
                <a href="#" class="sidebar-dropdown-toggle">
                    <i class="fas fa-building"></i>
                    PBG/SLF
                    <i class="fas fa-chevron-down dropdown-icon" style="margin-left: auto;"></i>
                </a>
                <ul class="sidebar-dropdown">
                    <li><a href="/infopbg"><i class="fas fa-info-circle"></i> Informasi PBG & SLF</a></li>
                    <li><a href="#" onclick="showLoginModal()"><i class="fas fa-file-alt"></i> Permohonan PBG & SLF</a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="sidebar-dropdown-toggle">
                    <i class="fas fa-search"></i>
                    Tracking
                    <i class="fas fa-chevron-down dropdown-icon" style="margin-left: auto;"></i>
                </a>
                <ul class="sidebar-dropdown">
                    <li><a href="/infotrakingweb"><i class="fas fa-map-marker-alt"></i> Tracking PBG & SLF</a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="sidebar-dropdown-toggle">
                    <i class="fas fa-database"></i>
                    Pendataan
                    <i class="fas fa-chevron-down dropdown-icon" style="margin-left: auto;"></i>
                </a>
                <ul class="sidebar-dropdown">
                    <li><a href="/databangunangedung"><i class="fas fa-building"></i> Bangunan Gedung</a></li>
                    <li><a href="/pendataankicbangunangedung"><i class="fas fa-tools"></i> KIC Gedung & Bangunan</a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="sidebar-dropdown-toggle">
                    <i class="fas fa-hands-helping"></i>
                    Bantek
                    <i class="fas fa-chevron-down dropdown-icon" style="margin-left: auto;"></i>
                </a>
                <ul class="sidebar-dropdown">
                    <li><a href="/infobantek"><i class="fas fa-info-circle"></i> Informasi Bantuan Teknis</a></li>
                    <li><a href="/febantuanteknis" onclick="showLoginModal()"><i class="fas fa-file-alt"></i> Permohonan Bantuan Teknis</a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="sidebar-dropdown-toggle">
                    <i class="fas fa-file-contract"></i>
                    KRK
                    <i class="fas fa-chevron-down dropdown-icon" style="margin-left: auto;"></i>
                </a>
                <ul class="sidebar-dropdown">
                    <li><a href="/infokrkpermohonan"><i class="fas fa-info-circle"></i> Informasi Permohonan KRK</a></li>
                    <li><a href="/permohonankrk" onclick="showLoginModal()"><i class="fas fa-file-alt"></i> Permohonan KRK</a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="sidebar-dropdown-toggle">
                    <i class="fas fa-home"></i>
                    MBR
                    <i class="fas fa-chevron-down dropdown-icon" style="margin-left: auto;"></i>
                </a>
                <ul class="sidebar-dropdown">
                    <li><a href="/infombrgambar"><i class="fas fa-info-circle"></i> Informasi MBR</a></li>
                    <li><a href="/bembrpengkajiteknis"><i class="fas fa-user-tie"></i> Daftar Konsultan Pengkaji Teknis</a></li>
                </ul>
            </li>

            <li>
                <a href="#" class="sidebar-dropdown-toggle">
                    <i class="fas fa-question-circle"></i>
                    Bantuan
                    <i class="fas fa-chevron-down dropdown-icon" style="margin-left: auto;"></i>
                </a>
                <ul class="sidebar-dropdown">
                    <li><a href="/infobantuangambar"><i class="fas fa-info-circle"></i> Informasi Bantuan Gambar</a></li>
                    <li><a href="/feformbantuangambar" onclick="showLoginModal()"><i class="fas fa-file-alt"></i> Permohonan Bantuan Gambar</a></li>
                </ul>
            </li>
        </ul>

        <div class="sidebar-auth">
            <a href="/register">
                <i class="fas fa-user-plus"></i>
                Daftar
            </a>
            <a href="/login">
                <i class="fas fa-sign-in-alt"></i>
                Login
            </a>
            <!-- For authenticated users -->
            <!--
            <form action="{{ url('/logout') }}" method="POST" style="display: inline; width: 100%;">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span>
                </button>
            </form>
            -->
        </div>
    </div>

    <!-- Overlay untuk sidebar -->
    <div class="overlay" id="overlay"></div>

    <!-- Modal -->
    <div class="modal" id="loginModal">
        <div class="modal-content">
            <img src="/assets/abgblora/logo/iconabgblora.png" alt="Logo ABG Blora" class="modal-logo">
            <p>Silakan login atau daftar terlebih dahulu untuk mengakses layanan ini!</p>
            <button class="modal-button" onclick="redirectToLogin()">OK</button>
        </div>
    </div>

    <script>
        // Toggle dropdown untuk desktop
        function toggleDropdown(e) {
            e.preventDefault();
            const dropdown = e.target.closest('.dropdown');
            dropdown.classList.toggle('show');

            // Close other dropdowns
            document.querySelectorAll('.dropdown').forEach(el => {
                if (el !== dropdown) el.classList.remove('show');
            });
        }

        // Close dropdown when clicking outside
        window.addEventListener('click', function (e) {
            if (!e.target.closest('.dropdown')) {
                document.querySelectorAll('.dropdown').forEach(el => el.classList.remove('show'));
            }
        });

        // Sidebar functionality
        const mobileToggle = document.getElementById('mobileToggle');
        const sidebar = document.getElementById('sidebar');
        const closeSidebar = document.getElementById('closeSidebar');
        const overlay = document.getElementById('overlay');

        mobileToggle.addEventListener('click', function() {
            sidebar.classList.add('active');
            overlay.classList.add('active');
            document.body.style.overflow = 'hidden';
        });

        closeSidebar.addEventListener('click', function() {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = 'auto';
        });

        overlay.addEventListener('click', function() {
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = 'auto';
        });

        // Toggle sidebar dropdowns
        document.querySelectorAll('.sidebar-dropdown-toggle').forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                const dropdown = this.nextElementSibling;
                const icon = this.querySelector('.dropdown-icon');

                dropdown.classList.toggle('active');

                if (dropdown.classList.contains('active')) {
                    icon.classList.remove('fa-chevron-down');
                    icon.classList.add('fa-chevron-up');
                } else {
                    icon.classList.remove('fa-chevron-up');
                    icon.classList.add('fa-chevron-down');
                }
            });
        });

        // Modal functions
        function showLoginModal() {
            document.getElementById('loginModal').style.display = 'flex';
            // Close sidebar if open
            sidebar.classList.remove('active');
            overlay.classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        function redirectToLogin() {
            window.location.href = '/login';
        }

        // Close modal when clicking outside
        window.addEventListener('click', function(e) {
            if (e.target === document.getElementById('loginModal')) {
                document.getElementById('loginModal').style.display = 'none';
            }
        });

        // Add event listeners to dropdown toggles
        document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
            toggle.addEventListener('click', toggleDropdown);
        });
    </script>

