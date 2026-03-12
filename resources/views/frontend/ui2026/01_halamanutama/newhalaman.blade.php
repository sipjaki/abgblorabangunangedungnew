@include('frontend.ui2026.00_fiturmenu.01_header')
<body>
    <!-- Header -->
    <header class="header">
        <div class="header-top">
            <div class="header-top-content">
                <div class="header-top-left">
                    <span><i class="fas fa-phone"></i> (0296) 531333</span>
                    <span><i class="fas fa-envelope"></i> diskominfo@blorakab.go.id</span>
                    <span><i class="fas fa-map-marker-alt"></i> Jl. Nusantara No. 8 Blora</span>
                </div>
                <div class="header-top-right">
                    <span>Senin - Jumat: 08.00 - 16.00 WIB</span>
                </div>
            </div>
        </div>
        <div class="header-main">
            <div class="header-content">
                <div class="logo-section">
                    <div class="logo-icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <div class="logo-text">
                        <h1>Penyelenggaraan Bangunan Gedung</h1>
                        <p>Kabupaten Blora</p>
                    </div>
                </div>
                <nav class="nav-desktop">
                    <ul class="nav-menu">
                        <li class="nav-item">
                            <a class="nav-link">Beranda <i class="fas fa-chevron-down"></i></a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item"><i class="fas fa-home"></i> Halaman Utama</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-info-circle"></i> Tentang Kami</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-bullseye"></i> Visi & Misi</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-users"></i> Struktur Organisasi</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-history"></i> Sejarah</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Layanan <i class="fas fa-chevron-down"></i></a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item"><i class="fas fa-file-alt"></i> Izin Bangunan</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-certificate"></i> Sertifikat Laik Fungsi</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-clipboard-check"></i> Pemeriksaan Bangunan</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-tools"></i> Pemeliharaan Gedung</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-hammer"></i> Renovasi Bangunan</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Regulasi <i class="fas fa-chevron-down"></i></a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item"><i class="fas fa-gavel"></i> Peraturan Pusat</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-balance-scale"></i> Peraturan Daerah</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-file-contract"></i> Keputusan Bupati</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-sticky-note"></i> Surat Edaran</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-book"></i> Pedoman Teknis</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Data <i class="fas fa-chevron-down"></i></a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item"><i class="fas fa-database"></i> Data Bangunan</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-chart-bar"></i> Statistik</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-map"></i> Peta Sebaran</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-download"></i> Unduhan</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-table"></i> Laporan Berkala</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Pengaduan <i class="fas fa-chevron-down"></i></a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item"><i class="fas fa-comment-dots"></i> Formulir Pengaduan</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-question-circle"></i> FAQ</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-headset"></i> Hubungi Kami</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-comments"></i> Live Chat</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-list"></i> Daftar Pengaduan</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Galeri <i class="fas fa-chevron-down"></i></a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item"><i class="fas fa-images"></i> Foto Kegiatan</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-video"></i> Video</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-newspaper"></i> Berita</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-calendar"></i> Agenda</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-bullhorn"></i> Pengumuman</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">Login <i class="fas fa-chevron-down"></i></a>
                            <div class="dropdown-menu">
                                <a href="#" class="dropdown-item"><i class="fas fa-user"></i> Login Pemohon</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-user-tie"></i> Login Petugas</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-user-shield"></i> Login Admin</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-user-plus"></i> Daftar Akun</a>
                                <a href="#" class="dropdown-item"><i class="fas fa-key"></i> Lupa Password</a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <button class="mobile-menu-toggle" onclick="toggleMobileNav()">
                    <i class="fas fa-bars"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Navigation -->
    <div class="mobile-nav" id="mobileNav">
        <div class="mobile-nav-header">
            <div class="logo-section">
                <div class="logo-icon">
                    <i class="fas fa-building"></i>
                </div>
                <div class="logo-text">
                    <h1>Penyelenggaraan Bangunan</h1>
                    <p>Kabupaten Blora</p>
                </div>
            </div>
            <button class="mobile-nav-close" onclick="toggleMobileNav()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <ul class="mobile-nav-menu">
            <li class="mobile-nav-item">
                <a class="mobile-nav-link" onclick="toggleMobileDropdown(this)">
                    Beranda <i class="fas fa-chevron-down"></i>
                </a>
                <div class="mobile-dropdown">
                    <a href="#" class="mobile-dropdown-item">Halaman Utama</a>
                    <a href="#" class="mobile-dropdown-item">Tentang Kami</a>
                    <a href="#" class="mobile-dropdown-item">Visi & Misi</a>
                    <a href="#" class="mobile-dropdown-item">Struktur Organisasi</a>
                    <a href="#" class="mobile-dropdown-item">Sejarah</a>
                </div>
            </li>
            <li class="mobile-nav-item">
                <a class="mobile-nav-link" onclick="toggleMobileDropdown(this)">
                    Layanan <i class="fas fa-chevron-down"></i>
                </a>
                <div class="mobile-dropdown">
                    <a href="#" class="mobile-dropdown-item">Izin Bangunan</a>
                    <a href="#" class="mobile-dropdown-item">Sertifikat Laik Fungsi</a>
                    <a href="#" class="mobile-dropdown-item">Pemeriksaan Bangunan</a>
                    <a href="#" class="mobile-dropdown-item">Pemeliharaan Gedung</a>
                    <a href="#" class="mobile-dropdown-item">Renovasi Bangunan</a>
                </div>
            </li>
            <li class="mobile-nav-item">
                <a class="mobile-nav-link" onclick="toggleMobileDropdown(this)">
                    Regulasi <i class="fas fa-chevron-down"></i>
                </a>
                <div class="mobile-dropdown">
                    <a href="#" class="mobile-dropdown-item">Peraturan Pusat</a>
                    <a href="#" class="mobile-dropdown-item">Peraturan Daerah</a>
                    <a href="#" class="mobile-dropdown-item">Keputusan Bupati</a>
                    <a href="#" class="mobile-dropdown-item">Surat Edaran</a>
                    <a href="#" class="mobile-dropdown-item">Pedoman Teknis</a>
                </div>
            </li>
            <li class="mobile-nav-item">
                <a class="mobile-nav-link" onclick="toggleMobileDropdown(this)">
                    Data <i class="fas fa-chevron-down"></i>
                </a>
                <div class="mobile-dropdown">
                    <a href="#" class="mobile-dropdown-item">Data Bangunan</a>
                    <a href="#" class="mobile-dropdown-item">Statistik</a>
                    <a href="#" class="mobile-dropdown-item">Peta Sebaran</a>
                    <a href="#" class="mobile-dropdown-item">Unduhan</a>
                    <a href="#" class="mobile-dropdown-item">Laporan Berkala</a>
                </div>
            </li>
            <li class="mobile-nav-item">
                <a class="mobile-nav-link" onclick="toggleMobileDropdown(this)">
                    Pengaduan <i class="fas fa-chevron-down"></i>
                </a>
                <div class="mobile-dropdown">
                    <a href="#" class="mobile-dropdown-item">Formulir Pengaduan</a>
                    <a href="#" class="mobile-dropdown-item">FAQ</a>
                    <a href="#" class="mobile-dropdown-item">Hubungi Kami</a>
                    <a href="#" class="mobile-dropdown-item">Live Chat</a>
                    <a href="#" class="mobile-dropdown-item">Daftar Pengaduan</a>
                </div>
            </li>
            <li class="mobile-nav-item">
                <a class="mobile-nav-link" onclick="toggleMobileDropdown(this)">
                    Galeri <i class="fas fa-chevron-down"></i>
                </a>
                <div class="mobile-dropdown">
                    <a href="#" class="mobile-dropdown-item">Foto Kegiatan</a>
                    <a href="#" class="mobile-dropdown-item">Video</a>
                    <a href="#" class="mobile-dropdown-item">Berita</a>
                    <a href="#" class="mobile-dropdown-item">Agenda</a>
                    <a href="#" class="mobile-dropdown-item">Pengumuman</a>
                </div>
            </li>
            <li class="mobile-nav-item">
                <a class="mobile-nav-link" onclick="toggleMobileDropdown(this)">
                    Login <i class="fas fa-chevron-down"></i>
                </a>
                <div class="mobile-dropdown">
                    <a href="#" class="mobile-dropdown-item">Login Pemohon</a>
                    <a href="#" class="mobile-dropdown-item">Login Petugas</a>
                    <a href="#" class="mobile-dropdown-item">Login Admin</a>
                    <a href="#" class="mobile-dropdown-item">Daftar Akun</a>
                    <a href="#" class="mobile-dropdown-item">Lupa Password</a>
                </div>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <main class="main-content">
        <!-- Service Icons Section -->
        <section class="section services-section">
            <div class="section-bg-building">
                <svg viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="currentColor" d="M0,224L48,213.3C96,203,192,181,288,181.3C384,181,480,203,576,224C672,245,768,267,864,261.3C960,256,1056,224,1152,208C1248,192,1344,192,1392,192L1440,192L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
            </div>
            <div class="container">
                <div class="services-grid">
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-file-signature"></i>
                        </div>
                        <h3 class="service-title">Pengajuan PBG</h3>
                        <p class="service-desc">Persetujuan Bangunan Gedung untuk pembangunan baru</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <h3 class="service-title">Sertifikat SLF</h3>
                        <p class="service-desc">Sertifikat Laik Fungsi untuk bangunan yang sudah berdiri</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-sync-alt"></i>
                        </div>
                        <h3 class="service-title">Perpanjangan SLF</h3>
                        <p class="service-desc">Perpanjangan masa berlaku Sertifikat Laik Fungsi</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <h3 class="service-title">Perubahan Data</h3>
                        <p class="service-desc">Pemutakhiran data bangunan gedung terdaftar</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-search"></i>
                        </div>
                        <h3 class="service-title">Cek Status</h3>
                        <p class="service-desc">Pengecekan status pengajuan perizinan bangunan</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-print"></i>
                        </div>
                        <h3 class="service-title">Cetak Dokumen</h3>
                        <p class="service-desc">Cetak ulang dokumen PBG dan SLF</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <h3 class="service-title">Inspeksi Bangunan</h3>
                        <p class="service-desc">Jadwal dan hasil pemeriksaan bangunan gedung</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-tools"></i>
                        </div>
                        <h3 class="service-title">Pemeliharaan</h3>
                        <p class="service-desc">Layanan pemeliharaan berkala bangunan gedung</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-hammer"></i>
                        </div>
                        <h3 class="service-title">Renovasi</h3>
                        <p class="service-desc">Izin untuk renovasi dan perubahan struktur bangunan</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-map-marked-alt"></i>
                        </div>
                        <h3 class="service-title">Peta Sebaran</h3>
                        <p class="service-desc">Peta lokasi bangunan gedung terverifikasi</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-calculator"></i>
                        </div>
                        <h3 class="service-title">Simulasi Retribusi</h3>
                        <p class="service-desc">Hitung estimasi biaya retribusi bangunan gedung</p>
                    </div>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas fa-headset"></i>
                        </div>
                        <h3 class="service-title">Bantuan</h3>
                        <p class="service-desc">Pusat bantuan dan konsultasi layanan</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Statistics Section -->
        <section class="section stats-section">
            <div class="section-bg-building">
                <svg viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="currentColor" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,154.7C960,171,1056,181,1152,165.3C1248,149,1344,107,1392,85.3L1440,64L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
            </div>
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Statistik Bangunan Gedung</h2>
                    <p class="section-subtitle">Data terkini mengenai bangunan gedung di Kabupaten Blora</p>
                </div>
                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-building"></i>
                        </div>
                        <div class="stat-number" data-target="12000">0</div>
                        <div class="stat-label">Total Bangunan Gedung</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="stat-number" data-target="8450">0</div>
                        <div class="stat-label">Bangunan Terverifikasi</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-file-alt"></i>
                        </div>
                        <div class="stat-number" data-target="6230">0</div>
                        <div class="stat-label">PBG Aktif</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="fas fa-certificate"></i>
                        </div>
                        <div class="stat-number" data-target="5890">0</div>
                        <div class="stat-label">SLF Aktif</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Information Section -->
        <section class="section info-section">
            <div class="section-bg-building">
                <svg viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="currentColor" d="M0,160L48,176C96,192,192,224,288,224C384,224,480,192,576,170.7C672,149,768,139,864,154.7C960,171,1056,213,1152,218.7C1248,224,1344,192,1392,176L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
            </div>
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Informasi Terkini</h2>
                    <p class="section-subtitle">Pengumuman dan berita terbaru seputar penyelenggaraan bangunan gedung</p>
                </div>
                <div class="info-grid">
                    <div class="info-card">
                        <span class="info-badge urgent">Penting</span>
                        <h3 class="info-title">Perpanjangan Masa Berlaku SLF Tahun 2024</h3>
                        <p class="info-text">Pemilik bangunan gedung dimohon untuk segera memperpanjang masa berlaku SLF yang akan berakhir pada bulan Desember 2024.</p>
                        <div class="info-meta">
                            <span><i class="fas fa-calendar"></i> 15 Nov 2024</span>
                            <span><i class="fas fa-eye"></i> 1,234 views</span>
                        </div>
                    </div>
                    <div class="info-card">
                        <span class="info-badge success">Info</span>
                        <h3 class="info-title">Sosialisasi Peraturan Baru PBG dan SLF</h3>
                        <p class="info-text">Dinas PUPR Kabupaten Blora akan mengadakan sosialisasi peraturan terbaru mengenai PBG dan SLF pada tanggal 25 November 2024.</p>
                        <div class="info-meta">
                            <span><i class="fas fa-calendar"></i> 12 Nov 2024</span>
                            <span><i class="fas fa-eye"></i> 892 views</span>
                        </div>
                    </div>
                    <div class="info-card">
                        <span class="info-badge">Pengumuman</span>
                        <h3 class="info-title">Pembukaan Layanan Online 24 Jam</h3>
                        <p class="info-text">Kini layanan pengajuan PBG dan SLF dapat diakses secara online selama 24 jam melalui portal resmi Kabupaten Blora.</p>
                        <div class="info-meta">
                            <span><i class="fas fa-calendar"></i> 10 Nov 2024</span>
                            <span><i class="fas fa-eye"></i> 2,156 views</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Data Table Section -->
        <section class="section table-section">
            <div class="section-bg-building">
                <svg viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="currentColor" d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
            </div>
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Data Bangunan Gedung</h2>
                    <p class="section-subtitle">Daftar bangunan gedung terdaftar di Kabupaten Blora</p>
                </div>
                <div class="table-container">
                    <div class="table-header">
                        <h3 class="table-title">Daftar Bangunan</h3>
                        <div class="table-actions">
                            <div class="search-box">
                                <i class="fas fa-search"></i>
                                <input type="text" id="tableSearch" placeholder="Cari bangunan...">
                            </div>
                            <button class="btn btn-primary">
                                <i class="fas fa-plus"></i> Tambah Data
                            </button>
                        </div>
                    </div>
                    <div class="table-wrapper">
                        <table class="data-table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Bangunan</th>
                                    <th>Alamat</th>
                                    <th>Status PBG</th>
                                    <th>Status SLF</th>
                                    <th>Tahun</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                <tr>
                                    <td>1</td>
                                    <td>Gedung Perkantoran Pemda Blora</td>
                                    <td>Jl. Nusantara No. 8, Blora</td>
                                    <td><span class="status-badge status-active"><i class="fas fa-check"></i> Aktif</span></td>
                                    <td><span class="status-badge status-active"><i class="fas fa-check"></i> Aktif</span></td>
                                    <td>2019</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Rumah Sakit Umum Daerah Blora</td>
                                    <td>Jl. Dr. Sutomo No. 42, Blora</td>
                                    <td><span class="status-badge status-active"><i class="fas fa-check"></i> Aktif</span></td>
                                    <td><span class="status-badge status-active"><i class="fas fa-check"></i> Aktif</span></td>
                                    <td>2018</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Mall Blora Square</td>
                                    <td>Jl. Pemuda No. 15, Blora</td>
                                    <td><span class="status-badge status-pending"><i class="fas fa-clock"></i> Proses</span></td>
                                    <td><span class="status-badge status-inactive"><i class="fas fa-times"></i> Belum</span></td>
                                    <td>2023</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Hotel Grand Blora</td>
                                    <td>Jl. Sudirman No. 25, Blora</td>
                                    <td><span class="status-badge status-active"><i class="fas fa-check"></i> Aktif</span></td>
                                    <td><span class="status-badge status-pending"><i class="fas fa-clock"></i> Proses</span></td>
                                    <td>2020</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Gedung Serbaguna Kunden</td>
                                    <td>Jl. Raya Kunden No. 10, Blora</td>
                                    <td><span class="status-badge status-active"><i class="fas fa-check"></i> Aktif</span></td>
                                    <td><span class="status-badge status-active"><i class="fas fa-check"></i> Aktif</span></td>
                                    <td>2017</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Apartemen Blora Residence</td>
                                    <td>Jl. Ahmad Yani No. 88, Blora</td>
                                    <td><span class="status-badge status-active"><i class="fas fa-check"></i> Aktif</span></td>
                                    <td><span class="status-badge status-active"><i class="fas fa-check"></i> Aktif</span></td>
                                    <td>2021</td>
                                </tr>
                                <tr>
                                    <td>7</td>
                                    <td>Pasar Tradisional Blora</td>
                                    <td>Jl. Pasar No. 1, Blora</td>
                                    <td><span class="status-badge status-active"><i class="fas fa-check"></i> Aktif</span></td>
                                    <td><span class="status-badge status-pending"><i class="fas fa-clock"></i> Proses</span></td>
                                    <td>2016</td>
                                </tr>
                                <tr>
                                    <td>8</td>
                                    <td>Gedung Olahraga Blora</td>
                                    <td>Jl. Sport Center No. 5, Blora</td>
                                    <td><span class="status-badge status-active"><i class="fas fa-check"></i> Aktif</span></td>
                                    <td><span class="status-badge status-active"><i class="fas fa-check"></i> Aktif</span></td>
                                    <td>2019</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="table-pagination">
                        <div class="pagination-info">Menampilkan 1-8 dari 12.000 data</div>
                        <div class="pagination-controls">
                            <button class="pagination-btn" disabled><i class="fas fa-chevron-left"></i></button>
                            <button class="pagination-btn active">1</button>
                            <button class="pagination-btn">2</button>
                            <button class="pagination-btn">3</button>
                            <button class="pagination-btn"><i class="fas fa-chevron-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Marketplace Section -->
        <section class="section marketplace-section">
            <div class="section-bg-building">
                <svg viewBox="0 0 1440 320" preserveAspectRatio="none">
                    <path fill="currentColor" d="M0,64L48,80C96,96,192,128,288,128C384,128,480,96,576,90.7C672,85,768,107,864,128C960,149,1056,171,1152,165.3C1248,160,1344,128,1392,112L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                </svg>
            </div>
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Bangunan Gedung Populer</h2>
                    <p class="section-subtitle">Daftar bangunan gedung dengan status terbaik di Kabupaten Blora</p>
                </div>
                <div class="marketplace-grid">
                    <div class="marketplace-card">
                        <div class="marketplace-image">
                            <img src="https://images.unsplash.com/photo-1486406146926-c627a92ad1ab?w=400&h=300&fit=crop" alt="Gedung Perkantoran">
                            <span class="marketplace-badge">Terverifikasi</span>
                            <div class="marketplace-favorite"><i class="far fa-heart"></i></div>
                        </div>
                        <div class="marketplace-content">
                            <h3 class="marketplace-title">Gedung Perkantoran Modern</h3>
                            <div class="marketplace-location">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Kecamatan Blora, Kabupaten Blora</span>
                            </div>
                            <div class="marketplace-meta">
                                <span class="marketplace-status status-active">SLF Aktif</span>
                                <span class="marketplace-year">2022</span>
                            </div>
                        </div>
                    </div>
                    <div class="marketplace-card">
                        <div class="marketplace-image">
                            <img src="https://images.unsplash.com/photo-1545324418-cc1a3fa10c00?w=400&h=300&fit=crop" alt="Apartemen">
                            <span class="marketplace-badge">Terverifikasi</span>
                            <div class="marketplace-favorite"><i class="far fa-heart"></i></div>
                        </div>
                        <div class="marketplace-content">
                            <h3 class="marketplace-title">Apartemen Blora Heights</h3>
                            <div class="marketplace-location">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Kecamatan Blora, Kabupaten Blora</span>
                            </div>
                            <div class="marketplace-meta">
                                <span class="marketplace-status status-active">SLF Aktif</span>
                                <span class="marketplace-year">2023</span>
                            </div>
                        </div>
                    </div>
                    <div class="marketplace-card">
                        <div class="marketplace-image">
                            <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400&h=300&fit=crop" alt="Hotel">
                            <span class="marketplace-badge">Terverifikasi</span>
                            <div class="marketplace-favorite"><i class="far fa-heart"></i></div>
                        </div>
                        <div class="marketplace-content">
                            <h3 class="marketplace-title">Hotel Blora Premium</h3>
                            <div class="marketplace-location">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Kecamatan Blora, Kabupaten Blora</span>
                            </div>
                            <div class="marketplace-meta">
                                <span class="marketplace-status status-active">SLF Aktif</span>
                                <span class="marketplace-year">2021</span>
                            </div>
                        </div>
                    </div>
                    <div class="marketplace-card">
                        <div class="marketplace-image">
                            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=400&h=300&fit=crop" alt="Ruang Usaha">
                            <span class="marketplace-badge">Terverifikasi</span>
                            <div class="marketplace-favorite"><i class="far fa-heart"></i></div>
                        </div>
                        <div class="marketplace-content">
                            <h3 class="marketplace-title">Gedung Perkantoran Swasta</h3>
                            <div class="marketplace-location">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Kecamatan Blora, Kabupaten Blora</span>
                            </div>
                            <div class="marketplace-meta">
                                <span class="marketplace-status status-active">SLF Aktif</span>
                                <span class="marketplace-year">2020</span>
                            </div>
                        </div>
                    </div>
                    <div class="marketplace-card">
                        <div class="marketplace-image">
                            <img src="https://images.unsplash.com/photo-1577495508048-b635879837f1?w=400&h=300&fit=crop" alt="Pusat Perbelanjaan">
                            <span class="marketplace-badge">Terverifikasi</span>
                            <div class="marketplace-favorite"><i class="far fa-heart"></i></div>
                        </div>
                        <div class="marketplace-content">
                            <h3 class="marketplace-title">Pusat Perbelanjaan Blora</h3>
                            <div class="marketplace-location">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Kecamatan Blora, Kabupaten Blora</span>
                            </div>
                            <div class="marketplace-meta">
                                <span class="marketplace-status status-active">SLF Aktif</span>
                                <span class="marketplace-year">2019</span>
                            </div>
                        </div>
                    </div>
                    <div class="marketplace-card">
                        <div class="marketplace-image">
                            <img src="https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=400&h=300&fit=crop" alt="Rumah Sakit">
                            <span class="marketplace-badge">Terverifikasi</span>
                            <div class="marketplace-favorite"><i class="far fa-heart"></i></div>
                        </div>
                        <div class="marketplace-content">
                            <h3 class="marketplace-title">Rumah Sakit Swasta</h3>
                            <div class="marketplace-location">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Kecamatan Blora, Kabupaten Blora</span>
                            </div>
                            <div class="marketplace-meta">
                                <span class="marketplace-status status-active">SLF Aktif</span>
                                <span class="marketplace-year">2018</span>
                            </div>
                        </div>
                    </div>
                    <div class="marketplace-card">
                        <div class="marketplace-image">
                            <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=400&h=300&fit=crop" alt="Sekolah">
                            <span class="marketplace-badge">Terverifikasi</span>
                            <div class="marketplace-favorite"><i class="far fa-heart"></i></div>
                        </div>
                        <div class="marketplace-content">
                            <h3 class="marketplace-title">Gedung Sekolah Tinggi</h3>
                            <div class="marketplace-location">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Kecamatan Blora, Kabupaten Blora</span>
                            </div>
                            <div class="marketplace-meta">
                                <span class="marketplace-status status-active">SLF Aktif</span>
                                <span class="marketplace-year">2021</span>
                            </div>
                        </div>
                    </div>
                    <div class="marketplace-card">
                        <div class="marketplace-image">
                            <img src="https://images.unsplash.com/photo-1554469384-e58fac16e23a?w=400&h=300&fit=crop" alt="Gedung Olahraga">
                            <span class="marketplace-badge">Terverifikasi</span>
                            <div class="marketplace-favorite"><i class="far fa-heart"></i></div>
                        </div>
                        <div class="marketplace-content">
                            <h3 class="marketplace-title">Gedung Olahraga Indoor</h3>
                            <div class="marketplace-location">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>Kecamatan Blora, Kabupaten Blora</span>
                            </div>
                            <div class="marketplace-meta">
                                <span class="marketplace-status status-active">SLF Aktif</span>
                                <span class="marketplace-year">2020</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@include('frontend.ui2026.00_fiturmenu.02_footer')
