  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary-color: #09146A;
      --secondary-color: #6635F1;
      --accent-color: #4AB7D8;
      --light-bg: #F6F5FA;
      --text-dark: #030303;
      --text-light: #FFFFFF;
      --shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      --transition: all 0.3s ease;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--light-bg);
      color: var(--text-dark);
      padding-top: 140px; /* Space for fixed navbar */
    }

    /* Top Header Section */
    .top-header {
      background-color: var(--primary-color);
      color: var(--text-light);
      padding: 8px 0;
      font-size: 14px;
    }

    .top-header-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .contact-info {
      display: flex;
      gap: 20px;
    }

    .contact-info a {
      color: var(--text-light);
      text-decoration: none;
      display: flex;
      align-items: center;
      gap: 6px;
      transition: var(--transition);
    }

    .contact-info a:hover {
      color: var(--accent-color);
    }

    .social-links {
      display: flex;
      gap: 15px;
    }

    .social-links a {
      color: var(--text-light);
      transition: var(--transition);
    }

    .social-links a:hover {
      color: var(--accent-color);
      transform: translateY(-2px);
    }

    /* Main Navbar */
    .sticky-navbar {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      width: 100%;
      z-index: 9999;
      background-color: white;
      box-shadow: var(--shadow);
      transition: var(--transition);
    }

    .navbar-container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 0 20px;
    }

    .main-navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px 0;
    }

    .logo-group {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .logo-group img {
      height: 50px;
      width: auto;
    }

    .logo-text {
      color: var(--primary-color);
      font-weight: 600;
      line-height: 1.4;
      font-size: 15px;
    }

    /* Desktop Navigation */
    .desktop-nav {
      display: flex;
      align-items: center;
      gap: 30px;
    }

    .nav-links {
      display: flex;
      gap: 20px;
      list-style: none;
    }

    .nav-links > li {
      position: relative;
    }

    .nav-links a {
      color: var(--primary-color);
      text-decoration: none;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 6px;
      padding: 8px 12px;
      border-radius: 6px;
      transition: var(--transition);
    }

    .nav-links a:hover,
    .nav-links .active {
      color: var(--text-light);
      background-color: var(--primary-color);
    }

    .dropdown-menu {
      position: absolute;
      top: 100%;
      left: 0;
      background-color: white;
      min-width: 240px;
      border-radius: 8px;
      box-shadow: var(--shadow);
      padding: 10px 0;
      opacity: 0;
      visibility: hidden;
      transform: translateY(10px);
      transition: var(--transition);
      z-index: 1000;
    }

    .nav-links > li:hover .dropdown-menu {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
    }

    .dropdown-menu li a {
      padding: 10px 20px;
      color: var(--text-dark);
      font-size: 14px;
      white-space: nowrap;
    }

    .dropdown-menu li a:hover {
      color: var(--text-light);
      background-color: var(--secondary-color);
    }

    /* User Section */
    .user-section {
      display: flex;
      align-items: center;
      gap: 15px;
    }

    .auth-buttons {
      display: flex;
      gap: 10px;
    }

    .auth-buttons a {
      text-decoration: none;
      font-weight: 500;
      display: flex;
      align-items: center;
      gap: 6px;
      padding: 8px 16px;
      border-radius: 6px;
      transition: var(--transition);
    }

    .login-btn {
      color: var(--primary-color);
      border: 1px solid var(--primary-color);
    }

    .login-btn:hover {
      background-color: var(--primary-color);
      color: white;
    }

    .register-btn {
      background-color: var(--primary-color);
      color: white;
    }

    .register-btn:hover {
      background-color: var(--secondary-color);
    }

    .profile {
      display: flex;
      align-items: center;
      gap: 10px;
      cursor: pointer;
    }

    .profile-name {
      font-weight: 600;
      color: var(--primary-color);
    }

    .profile-pic {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      overflow: hidden;
      border: 2px solid var(--primary-color);
    }

    .profile-pic img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }

    /* Mobile Navigation */
    .mobile-menu-btn {
      display: none;
      background: none;
      border: none;
      font-size: 24px;
      color: var(--primary-color);
      cursor: pointer;
    }

    .mobile-nav {
      position: fixed;
      top: 0;
      left: -100%;
      width: 80%;
      max-width: 320px;
      height: 100vh;
      background-color: white;
      box-shadow: 2px 0 10px rgba(0, 0, 0, 0.1);
      z-index: 99999;
      transition: var(--transition);
      overflow-y: auto;
      padding: 20px;
    }

    .mobile-nav.active {
      left: 0;
    }

    .mobile-nav-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
      padding-bottom: 15px;
      border-bottom: 1px solid #eee;
    }

    .close-mobile-menu {
      background: none;
      border: none;
      font-size: 24px;
      color: var(--primary-color);
      cursor: pointer;
    }

    .mobile-nav-links {
      list-style: none;
    }

    .mobile-nav-links li {
      margin-bottom: 10px;
    }

    .mobile-nav-links a {
      display: block;
      padding: 12px 15px;
      color: var(--text-dark);
      text-decoration: none;
      border-radius: 6px;
      transition: var(--transition);
    }

    .mobile-nav-links a:hover {
      background-color: var(--primary-color);
      color: white;
    }

    .mobile-dropdown-btn {
      width: 100%;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 12px 15px;
      background: none;
      border: none;
      color: var(--text-dark);
      text-align: left;
      cursor: pointer;
      border-radius: 6px;
      transition: var(--transition);
    }

    .mobile-dropdown-btn:hover {
      background-color: var(--primary-color);
      color: white;
    }

    .mobile-dropdown-menu {
      list-style: none;
      padding-left: 20px;
      max-height: 0;
      overflow: hidden;
      transition: var(--transition);
    }

    .mobile-dropdown-menu.active {
      max-height: 500px;
      padding-top: 10px;
      padding-bottom: 10px;
    }

    .mobile-dropdown-menu li a {
      padding: 10px 15px;
      font-size: 14px;
    }

    .overlay {
      position: fixed;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background-color: rgba(0, 0, 0, 0.5);
      z-index: 9999;
      opacity: 0;
      visibility: hidden;
      transition: var(--transition);
    }

    .overlay.active {
      opacity: 1;
      visibility: visible;
    }

    /* Responsive Styles */
    @media (max-width: 1024px) {
      .desktop-nav {
        gap: 15px;
      }

      .nav-links {
        gap: 10px;
      }
    }

    @media (max-width: 768px) {
      body {
        padding-top: 120px;
      }

      .top-header {
        font-size: 12px;
      }

      .contact-info {
        gap: 10px;
      }

      .social-links {
        gap: 10px;
      }

      .desktop-nav {
        display: none;
      }

      .mobile-menu-btn {
        display: block;
      }

      .logo-text {
        font-size: 13px;
      }

      .logo-group img {
        height: 40px;
      }
    }

    @media (max-width: 480px) {
      .top-header {
        display: none;
      }

      body {
        padding-top: 80px;
      }

      .logo-text {
        display: none;
      }

      .auth-buttons a span {
        display: none;
      }

      .auth-buttons a {
        padding: 8px;
      }
    }

    /* Modal Styles */
    .modal {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5);
      z-index: 99999;
      justify-content: center;
      align-items: center;
    }

    .modal-content {
      background: white;
      width: 90%;
      max-width: 400px;
      padding: 30px;
      border-radius: 10px;
      text-align: center;
      box-shadow: 0 5px 20px rgba(0, 0, 0, 0.2);
      transform: translateY(-20px);
      opacity: 0;
      transition: all 0.3s ease;
    }

    .modal.active .modal-content {
      transform: translateY(0);
      opacity: 1;
    }

    .modal-logo {
      width: 80px;
      height: auto;
      margin-bottom: 20px;
    }

    .modal-text {
      margin-bottom: 25px;
      color: var(--text-dark);
      line-height: 1.6;
    }

    .modal-btn {
      padding: 10px 25px;
      background-color: var(--primary-color);
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: 500;
      transition: var(--transition);
    }

    .modal-btn:hover {
      background-color: var(--secondary-color);
    }
  </style>
  <!-- Top Contact Header -->
  <div class="top-header">
    <div class="top-header-container">
      <div class="contact-info">
        <a href="tel:+628123456789">
          <i class="fas fa-phone-alt"></i>
          <span>+62 812 3456 789</span>
        </a>
        <a href="mailto:info@abgblora.com">
          <i class="fas fa-envelope"></i>
          <span>info@abgblora.com</span>
        </a>
      </div>
      <div class="social-links">
        <a href="#"><i class="fab fa-facebook-f"></i></a>
        <a href="#"><i class="fab fa-twitter"></i></a>
        <a href="#"><i class="fab fa-instagram"></i></a>
        <a href="#"><i class="fab fa-youtube"></i></a>
      </div>
    </div>
  </div>

  <!-- Main Navigation -->
  <div class="sticky-navbar">
    <div class="navbar-container">
      <div class="main-navbar">
        <!-- Logo Group -->
        <div class="logo-group">
          <img src="/assets/abgblora/logo/logokabupatenblora.png" alt="Kabupaten Blora Logo">
          <img src="/assets/abgblora/logo/pupr.png" alt="PUPR Logo">
          <div class="logo-text">
            ABG Blora Bangunan Gedung<br>
            Dinas Pekerjaan Umum Dan Penataan Ruang Kabupaten Blora
          </div>
        </div>

        <!-- Desktop Navigation -->
        <nav class="desktop-nav">
          <ul class="nav-links">
            <li>
              <a href="#">
                <i class="fas fa-file-alt"></i>
                PBG/SLF
              </a>
              <ul class="dropdown-menu">
                <li><a href="/infopbg"><i class="fas fa-info-circle"></i> Informasi PBG & SLF</a></li>
                <li><a href="#" onclick="showLoginModal()"><i class="fas fa-paper-plane"></i> Permohonan PBG & SLF</a></li>
              </ul>
            </li>

            <li>
              <a href="#">
                <i class="fas fa-search-location"></i>
                Tracking
              </a>
              <ul class="dropdown-menu">
                <li><a href="/infotrakingweb"><i class="fas fa-map-marked-alt"></i> Tracking PBG & SLF</a></li>
              </ul>
            </li>

            <li>
              <a href="#">
                <i class="fas fa-database"></i>
                Pendataan
              </a>
              <ul class="dropdown-menu">
                <li><a href="/databangunangedung"><i class="fas fa-building"></i> Bangunan Gedung</a></li>
                <li><a href="/pendataankicbangunangedung"><i class="fas fa-clipboard-check"></i> KIC Gedung & Bangunan</a></li>
              </ul>
            </li>

            <li>
              <a href="#">
                <i class="fas fa-tools"></i>
                Bantek
              </a>
              <ul class="dropdown-menu">
                <li><a href="/infobantek"><i class="fas fa-info-circle"></i> Informasi Bantuan Teknis</a></li>
                <li><a href="/febantuanteknis" onclick="showLoginModal()"><i class="fas fa-paper-plane"></i> Permohonan Bantuan Teknis</a></li>
              </ul>
            </li>

            <li>
              <a href="#">
                <i class="fas fa-map"></i>
                KRK
              </a>
              <ul class="dropdown-menu">
                <li><a href="/infokrkpermohonan"><i class="fas fa-info-circle"></i> Informasi Permohonan KRK</a></li>
                <li><a href="/permohonankrk" onclick="showLoginModal()"><i class="fas fa-paper-plane"></i> Permohonan KRK</a></li>
              </ul>
            </li>

            <li>
              <a href="#">
                <i class="fas fa-home"></i>
                MBR
              </a>
              <ul class="dropdown-menu">
                <li><a href="/infombrgambar"><i class="fas fa-info-circle"></i> Informasi MBR</a></li>
                <li><a href="/bembrpengkajiteknis"><i class="fas fa-list-alt"></i> Daftar Konsultan Pengkaji Teknis</a></li>
              </ul>
            </li>

            <li>
              <a href="#">
                <i class="fas fa-hands-helping"></i>
                Bantuan
              </a>
              <ul class="dropdown-menu">
                <li><a href="/infobantuangambar"><i class="fas fa-info-circle"></i> Informasi Bantuan Gambar</a></li>
                <li><a href="/feformbantuangambar" onclick="showLoginModal()"><i class="fas fa-paper-plane"></i> Permohonan Bantuan Gambar</a></li>
              </ul>
            </li>
          </ul>

          <!-- User Section -->
          <div class="user-section">
            @auth
            <div class="profile">
              <span class="profile-name">Hi, {{ substr(Auth::user()->name, 0, 10) }}..</span>
              <div class="profile-pic">
                <img src="{{ asset($item->avatar ?? 'assets/abgblora/logo/iconabgblora.png') }}" alt="Profile Photo">
              </div>
            </div>
            @endauth

            @guest
            <div class="auth-buttons">
              <a href="/login" class="login-btn">
                <i class="fas fa-sign-in-alt"></i>
                <span>Login</span>
              </a>
              <a href="/register" class="register-btn">
                <i class="fas fa-user-plus"></i>
                <span>Daftar</span>
              </a>
            </div>
            @endguest

            @auth
            <form action="{{ url('/logout') }}" method="POST" style="display: inline;">
              @csrf
              <button type="submit" class="login-btn" style="border: none; cursor: pointer;">
                <i class="fas fa-sign-out-alt"></i>
                <span>Logout</span>
              </button>
            </form>
            @endauth
          </div>
        </nav>

        <!-- Mobile Menu Button -->
        <button class="mobile-menu-btn" id="mobileMenuBtn">
          <i class="fas fa-bars"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Navigation -->
  <div class="mobile-nav" id="mobileNav">
    <div class="mobile-nav-header">
      <div class="logo-group">
        <img src="/assets/abgblora/logo/iconabgblora.png" alt="ABG Blora Logo" style="height: 40px;">
      </div>
      <button class="close-mobile-menu" id="closeMobileMenu">
        <i class="fas fa-times"></i>
      </button>
    </div>

    <ul class="mobile-nav-links">
      <li>
        <button class="mobile-dropdown-btn">
          <span><i class="fas fa-file-alt"></i> PBG/SLF</span>
          <i class="fas fa-chevron-down"></i>
        </button>
        <ul class="mobile-dropdown-menu">
          <li><a href="/infopbg"><i class="fas fa-info-circle"></i> Informasi PBG & SLF</a></li>
          <li><a href="#" onclick="showLoginModal()"><i class="fas fa-paper-plane"></i> Permohonan PBG & SLF</a></li>
        </ul>
      </li>

      <li>
        <button class="mobile-dropdown-btn">
          <span><i class="fas fa-search-location"></i> Tracking</span>
          <i class="fas fa-chevron-down"></i>
        </button>
        <ul class="mobile-dropdown-menu">
          <li><a href="/infotrakingweb"><i class="fas fa-map-marked-alt"></i> Tracking PBG & SLF</a></li>
        </ul>
      </li>

      <li>
        <button class="mobile-dropdown-btn">
          <span><i class="fas fa-database"></i> Pendataan</span>
          <i class="fas fa-chevron-down"></i>
        </button>
        <ul class="mobile-dropdown-menu">
          <li><a href="/databangunangedung"><i class="fas fa-building"></i> Bangunan Gedung</a></li>
          <li><a href="/pendataankicbangunangedung"><i class="fas fa-clipboard-check"></i> KIC Gedung & Bangunan</a></li>
        </ul>
      </li>

      <li>
        <button class="mobile-dropdown-btn">
          <span><i class="fas fa-tools"></i> Bantek</span>
          <i class="fas fa-chevron-down"></i>
        </button>
        <ul class="mobile-dropdown-menu">
          <li><a href="/infobantek"><i class="fas fa-info-circle"></i> Informasi Bantuan Teknis</a></li>
          <li><a href="/febantuanteknis" onclick="showLoginModal()"><i class="fas fa-paper-plane"></i> Permohonan Bantuan Teknis</a></li>
        </ul>
      </li>

      <li>
        <button class="mobile-dropdown-btn">
          <span><i class="fas fa-map"></i> KRK</span>
          <i class="fas fa-chevron-down"></i>
        </button>
        <ul class="mobile-dropdown-menu">
          <li><a href="/infokrkpermohonan"><i class="fas fa-info-circle"></i> Informasi Permohonan KRK</a></li>
          <li><a href="/permohonankrk" onclick="showLoginModal()"><i class="fas fa-paper-plane"></i> Permohonan KRK</a></li>
        </ul>
      </li>

      <li>
        <button class="mobile-dropdown-btn">
          <span><i class="fas fa-home"></i> MBR</span>
          <i class="fas fa-chevron-down"></i>
        </button>
        <ul class="mobile-dropdown-menu">
          <li><a href="/infombrgambar"><i class="fas fa-info-circle"></i> Informasi MBR</a></li>
          <li><a href="/bembrpengkajiteknis"><i class="fas fa-list-alt"></i> Daftar Konsultan Pengkaji Teknis</a></li>
        </ul>
      </li>

      <li>
        <button class="mobile-dropdown-btn">
          <span><i class="fas fa-hands-helping"></i> Bantuan</span>
          <i class="fas fa-chevron-down"></i>
        </button>
        <ul class="mobile-dropdown-menu">
          <li><a href="/infobantuangambar"><i class="fas fa-info-circle"></i> Informasi Bantuan Gambar</a></li>
          <li><a href="/feformbantuangambar" onclick="showLoginModal()"><i class="fas fa-paper-plane"></i> Permohonan Bantuan Gambar</a></li>
        </ul>
      </li>

      @guest
      <li><a href="/login"><i class="fas fa-sign-in-alt"></i> Login</a></li>
      <li><a href="/register"><i class="fas fa-user-plus"></i> Daftar</a></li>
      @endguest

      @auth
      <li>
        <form action="{{ url('/logout') }}" method="POST" style="width: 100%;">
          @csrf
          <button type="submit" style="width: 100%; text-align: left; background: none; border: none; padding: 12px 15px; color: var(--text-dark); cursor: pointer;">
            <i class="fas fa-sign-out-alt"></i> Logout
          </button>
        </form>
      </li>
      @endauth
    </ul>
  </div>

  <div class="overlay" id="overlay"></div>

  <!-- Login Modal -->
  <div class="modal" id="loginModal">
    <div class="modal-content">
      <img src="/assets/abgblora/logo/iconabgblora.png" alt="ABG Blora Logo" class="modal-logo">
      <p class="modal-text">Silakan login atau daftar terlebih dahulu untuk mengakses layanan ini!</p>
      <button class="modal-btn" onclick="redirectToLogin()">OK</button>
    </div>
  </div>

  <script>
    // Mobile Menu Toggle
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const closeMobileMenu = document.getElementById('closeMobileMenu');
    const mobileNav = document.getElementById('mobileNav');
    const overlay = document.getElementById('overlay');

    mobileMenuBtn.addEventListener('click', () => {
      mobileNav.classList.add('active');
      overlay.classList.add('active');
      document.body.style.overflow = 'hidden';
    });

    closeMobileMenu.addEventListener('click', () => {
      mobileNav.classList.remove('active');
      overlay.classList.remove('active');
      document.body.style.overflow = '';
    });

    overlay.addEventListener('click', () => {
      mobileNav.classList.remove('active');
      overlay.classList.remove('active');
      document.body.style.overflow = '';
    });

    // Mobile Dropdown Toggle
    const mobileDropdownBtns = document.querySelectorAll('.mobile-dropdown-btn');
    mobileDropdownBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const menu = btn.nextElementSibling;
        menu.classList.toggle('active');
        const icon = btn.querySelector('.fa-chevron-down');
        icon.classList.toggle('fa-rotate-180');
      });
    });

    // Login Modal Functions
    function showLoginModal() {
      event.preventDefault();
      const modal = document.getElementById('loginModal');
      modal.classList.add('active');
      document.body.style.overflow = 'hidden';
    }

    function hideLoginModal() {
      const modal = document.getElementById('loginModal');
      modal.classList.remove('active');
      document.body.style.overflow = '';
    }

    function redirectToLogin() {
      window.location.href = '/login';
    }

    // Close modal when clicking outside
    window.addEventListener('click', (event) => {
      const modal = document.getElementById('loginModal');
      if (event.target === modal) {
        hideLoginModal();
      }
    });
  </script>

