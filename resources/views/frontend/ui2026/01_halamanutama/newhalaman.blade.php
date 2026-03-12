@include('frontend.ui2026.00_fiturmenu.01_header')

<body>
    <!-- Header -->
    <header class="header" id="header">
        <div class="container">
            <div class="header-content">
                <!-- Logo -->
                <div class="logo">
                    <div class="logo-icon">
                        <i class="ph ph-buildings"></i>
                    </div>
                    <div class="logo-text">
                        <span class="logo-title">Sistem Informasi</span>
                        <span class="logo-subtitle">Penyelenggaraan Bangunan Gedung</span>
                    </div>
                </div>

                <!-- Navigation -->
                <nav class="nav" id="nav">
                    <ul class="nav-list">
                        <li><a href="#beranda" class="nav-link active">Beranda</a></li>
                        <li><a href="#layanan" class="nav-link">Layanan</a></li>
                        <li><a href="#statistik" class="nav-link">Statistik</a></li>
                        <li><a href="#informasi" class="nav-link">Informasi</a></li>
                        <li><a href="#data-bangunan" class="nav-link">Data Bangunan</a></li>
                        <li><a href="#kontak" class="nav-link">Kontak</a></li>
                    </ul>
                </nav>

                <!-- Header Actions -->
                <div class="header-actions">
                    <button class="btn btn-outline">
                        <i class="ph ph-sign-in"></i>
                        <span>Masuk</span>
                    </button>
                    <button class="btn btn-primary">
                        <i class="ph ph-user-plus"></i>
                        <span>Daftar</span>
                    </button>
                </div>

                <!-- Mobile Menu Toggle -->
                <button class="menu-toggle" id="menuToggle" aria-label="Toggle menu">
                    <i class="ph ph-list"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Mobile Navigation Overlay -->
    <div class="mobile-nav-overlay" id="mobileNavOverlay"></div>
    <div class="mobile-nav" id="mobileNav">
        <div class="mobile-nav-header">
            <div class="logo">
                <div class="logo-icon">
                    <i class="ph ph-buildings"></i>
                </div>
                <div class="logo-text">
                    <span class="logo-title">Sistem Informasi</span>
                </div>
            </div>
            <button class="mobile-nav-close" id="mobileNavClose">
                <i class="ph ph-x"></i>
            </button>
        </div>
        <nav class="mobile-nav-menu">
            <a href="#beranda" class="mobile-nav-link active">
                <i class="ph ph-house"></i>
                <span>Beranda</span>
            </a>
            <a href="#layanan" class="mobile-nav-link">
                <i class="ph ph-squares-four"></i>
                <span>Layanan</span>
            </a>
            <a href="#statistik" class="mobile-nav-link">
                <i class="ph ph-chart-bar"></i>
                <span>Statistik</span>
            </a>
            <a href="#informasi" class="mobile-nav-link">
                <i class="ph ph-info"></i>
                <span>Informasi</span>
            </a>
            <a href="#data-bangunan" class="mobile-nav-link">
                <i class="ph ph-table"></i>
                <span>Data Bangunan</span>
            </a>
            <a href="#kontak" class="mobile-nav-link">
                <i class="ph ph-phone"></i>
                <span>Kontak</span>
            </a>
        </nav>
        <div class="mobile-nav-actions">
            <button class="btn btn-outline w-full">
                <i class="ph ph-sign-in"></i>
                <span>Masuk</span>
            </button>
            <button class="btn btn-primary w-full">
                <i class="ph ph-user-plus"></i>
                <span>Daftar</span>
            </button>
        </div>
    </div>

    <main>
        <!-- Main Service Icons Section - First Section (No Hero Banner) -->
        <section class="section section-services" id="layanan">
            <div class="container">
                <div class="section-header">
                    <span class="section-badge">Layanan Utama</span>
                    <h2 class="section-title">Layanan Penyelenggaraan Bangunan Gedung</h2>
                    <p class="section-description">
                        Akses seluruh layanan administrasi bangunan gedung Kabupaten Blora secara online dan terintegrasi
                    </p>
                </div>

                <div class="services-grid">
                    <!-- Service 1 -->
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="ph ph-file-text"></i>
                        </div>
                        <h3 class="service-title">Pengajuan PBG</h3>
                        <p class="service-description">Persetujuan Bangunan Gedung untuk bangunan baru</p>
                        <div class="service-arrow">
                            <i class="ph ph-arrow-right"></i>
                        </div>
                    </div>

                    <!-- Service 2 -->
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="ph ph-certificate"></i>
                        </div>
                        <h3 class="service-title">Sertifikat Laik Fungsi</h3>
                        <p class="service-description">Pengajuan SLF untuk bangunan yang sudah berdiri</p>
                        <div class="service-arrow">
                            <i class="ph ph-arrow-right"></i>
                        </div>
                    </div>

                    <!-- Service 3 -->
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="ph ph-refresh"></i>
                        </div>
                        <h3 class="service-title">Perpanjangan SLF</h3>
                        <p class="service-description">Perpanjangan masa berlaku Sertifikat Laik Fungsi</p>
                        <div class="service-arrow">
                            <i class="ph ph-arrow-right"></i>
                        </div>
                    </div>

                    <!-- Service 4 -->
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="ph ph-pencil-simple"></i>
                        </div>
                        <h3 class="service-title">Perubahan Data</h3>
                        <p class="service-description">Perubahan data bangunan gedung terdaftar</p>
                        <div class="service-arrow">
                            <i class="ph ph-arrow-right"></i>
                        </div>
                    </div>

                    <!-- Service 5 -->
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="ph ph-magnifying-glass"></i>
                        </div>
                        <h3 class="service-title">Cek Status</h3>
                        <p class="service-description">Pengecekan status pengajuan PBG dan SLF</p>
                        <div class="service-arrow">
                            <i class="ph ph-arrow-right"></i>
                        </div>
                    </div>

                    <!-- Service 6 -->
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="ph ph-credit-card"></i>
                        </div>
                        <h3 class="service-title">Pembayaran</h3>
                        <p class="service-description">Pembayaran retribusi dan biaya layanan</p>
                        <div class="service-arrow">
                            <i class="ph ph-arrow-right"></i>
                        </div>
                    </div>

                    <!-- Service 7 -->
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="ph ph-download-simple"></i>
                        </div>
                        <h3 class="service-title">Unduh Dokumen</h3>
                        <p class="service-description">Unduh dokumen PBG dan SLF yang sudah terbit</p>
                        <div class="service-arrow">
                            <i class="ph ph-arrow-right"></i>
                        </div>
                    </div>

                    <!-- Service 8 -->
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="ph ph-calendar-check"></i>
                        </div>
                        <h3 class="service-title">Jadwal Inspeksi</h3>
                        <p class="service-description">Lihat dan atur jadwal inspeksi bangunan</p>
                        <div class="service-arrow">
                            <i class="ph ph-arrow-right"></i>
                        </div>
                    </div>

                    <!-- Service 9 -->
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="ph ph-file-plus"></i>
                        </div>
                        <h3 class="service-title">Dokumen Tambahan</h3>
                        <p class="service-description">Unggah dokumen persyaratan tambahan</p>
                        <div class="service-arrow">
                            <i class="ph ph-arrow-right"></i>
                        </div>
                    </div>

                    <!-- Service 10 -->
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="ph ph-chat-circle-text"></i>
                        </div>
                        <h3 class="service-title">Konsultasi</h3>
                        <p class="service-description">Konsultasi online dengan petugas teknis</p>
                        <div class="service-arrow">
                            <i class="ph ph-arrow-right"></i>
                        </div>
                    </div>

                    <!-- Service 11 -->
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="ph ph-map-pin"></i>
                        </div>
                        <h3 class="service-title">Peta Bangunan</h3>
                        <p class="service-description">Lihat peta sebaran bangunan gedung</p>
                        <div class="service-arrow">
                            <i class="ph ph-arrow-right"></i>
                        </div>
                    </div>

                    <!-- Service 12 -->
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="ph ph-question"></i>
                        </div>
                        <h3 class="service-title">Bantuan</h3>
                        <p class="service-description">Panduan dan FAQ layanan bangunan gedung</p>
                        <div class="service-arrow">
                            <i class="ph ph-arrow-right"></i>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Building Statistics Section -->
        <section class="section section-stats" id="statistik">
            <div class="container">
                <div class="section-header light">
                    <span class="section-badge">Statistik Data</span>
                    <h2 class="section-title">Data Bangunan Gedung Kabupaten Blora</h2>
                    <p class="section-description">
                        Statistik real-time penyelenggaraan bangunan gedung di wilayah Kabupaten Blora
                    </p>
                </div>

                <div class="stats-grid">
                    <!-- Stat 1 -->
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="ph ph-buildings"></i>
                        </div>
                        <div class="stat-content">
                            <span class="stat-number" data-target="2847">0</span>
                            <span class="stat-label">Total Bangunan Gedung</span>
                        </div>
                        <div class="stat-trend">
                            <i class="ph ph-trend-up"></i>
                            <span>+12% dari tahun lalu</span>
                        </div>
                    </div>

                    <!-- Stat 2 -->
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="ph ph-check-circle"></i>
                        </div>
                        <div class="stat-content">
                            <span class="stat-number" data-target="2156">0</span>
                            <span class="stat-label">Bangunan Terverifikasi</span>
                        </div>
                        <div class="stat-trend">
                            <i class="ph ph-trend-up"></i>
                            <span>+8% dari tahun lalu</span>
                        </div>
                    </div>

                    <!-- Stat 3 -->
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="ph ph-file-text"></i>
                        </div>
                        <div class="stat-content">
                            <span class="stat-number" data-target="1893">0</span>
                            <span class="stat-label">PBG Aktif</span>
                        </div>
                        <div class="stat-trend">
                            <i class="ph ph-trend-up"></i>
                            <span>+15% dari tahun lalu</span>
                        </div>
                    </div>

                    <!-- Stat 4 -->
                    <div class="stat-card">
                        <div class="stat-icon">
                            <i class="ph ph-certificate"></i>
                        </div>
                        <div class="stat-content">
                            <span class="stat-number" data-target="1654">0</span>
                            <span class="stat-label">SLF Aktif</span>
                        </div>
                        <div class="stat-trend">
                            <i class="ph ph-trend-up"></i>
                            <span>+10% dari tahun lalu</span>
                        </div>
                    </div>
                </div>

                <!-- Additional Stats Row -->
                <div class="stats-row">
                    <div class="stat-mini">
                        <div class="stat-mini-icon">
                            <i class="ph ph-clock"></i>
                        </div>
                        <div class="stat-mini-content">
                            <span class="stat-mini-number" data-target="342">0</span>
                            <span class="stat-mini-label">Dalam Proses</span>
                        </div>
                    </div>
                    <div class="stat-mini">
                        <div class="stat-mini-icon">
                            <i class="ph ph-warning-circle"></i>
                        </div>
                        <div class="stat-mini-content">
                            <span class="stat-mini-number" data-target="128">0</span>
                            <span class="stat-mini-label">Menunggu Verifikasi</span>
                        </div>
                    </div>
                    <div class="stat-mini">
                        <div class="stat-mini-icon">
                            <i class="ph ph-calendar"></i>
                        </div>
                        <div class="stat-mini-content">
                            <span class="stat-mini-number" data-target="56">0</span>
                            <span class="stat-mini-label">Jadwal Inspeksi</span>
                        </div>
                    </div>
                    <div class="stat-mini">
                        <div class="stat-mini-icon">
                            <i class="ph ph-users"></i>
                        </div>
                        <div class="stat-mini-content">
                            <span class="stat-mini-number" data-target="892">0</span>
                            <span class="stat-mini-label">Pengguna Terdaftar</span>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Information Section -->
        <section class="section section-info" id="informasi">
            <div class="container">
                <div class="section-header">
                    <span class="section-badge">Informasi Terkini</span>
                    <h2 class="section-title">Pengumuman & Berita</h2>
                    <p class="section-description">
                        Informasi terbaru seputar layanan penyelenggaraan bangunan gedung
                    </p>
                </div>

                <div class="info-grid">
                    <!-- Featured Info -->
                    <div class="info-card info-featured">
                        <div class="info-badge info-badge-important">Penting</div>
                        <div class="info-date">
                            <i class="ph ph-calendar"></i>
                            <span>10 Maret 2026</span>
                        </div>
                        <h3 class="info-title">Perubahan Tarif Retribusi PBG dan SLF Tahun 2026</h3>
                        <p class="info-excerpt">
                            Berdasarkan Peraturan Bupati Blora Nomor 15 Tahun 2026, terdapat penyesuaian tarif retribusi untuk layanan Persetujuan Bangunan Gedung (PBG) dan Sertifikat Laik Fungsi (SLF) yang berlaku mulai 1 April 2026.
                        </p>
                        <a href="#" class="info-link">
                            <span>Baca Selengkapnya</span>
                            <i class="ph ph-arrow-right"></i>
                        </a>
                    </div>

                    <!-- Info List -->
                    <div class="info-list">
                        <div class="info-item">
                            <div class="info-item-date">
                                <span class="date-day">08</span>
                                <span class="date-month">Mar</span>
                            </div>
                            <div class="info-item-content">
                                <span class="info-item-category">Pelayanan</span>
                                <h4 class="info-item-title">Jadwal Pelayanan Selama Bulan Ramadhan</h4>
                                <p class="info-item-excerpt">Informasi jam pelayanan Dinas PUPR selama bulan suci Ramadhan...</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-item-date">
                                <span class="date-day">05</span>
                                <span class="date-month">Mar</span>
                            </div>
                            <div class="info-item-content">
                                <span class="info-item-category">Pengumuman</span>
                                <h4 class="info-item-title">Hasil Seleksi Tenaga Ahli Bangunan Gedung</h4>
                                <p class="info-item-excerpt">Pengumuman hasil seleksi tenaga ahli untuk inspeksi bangunan gedung...</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-item-date">
                                <span class="date-day">01</span>
                                <span class="date-month">Mar</span>
                            </div>
                            <div class="info-item-content">
                                <span class="info-item-category">Regulasi</span>
                                <h4 class="info-item-title">Standar Teknis Bangunan Gedung 2026</h4>
                                <p class="info-item-excerpt">Penerapan standar teknis baru untuk keamanan dan keselamatan bangunan...</p>
                            </div>
                        </div>

                        <div class="info-item">
                            <div class="info-item-date">
                                <span class="date-day">28</span>
                                <span class="date-month">Feb</span>
                            </div>
                            <div class="info-item-content">
                                <span class="info-item-category">Workshop</span>
                                <h4 class="info-item-title">Workshop Pemahaman Standar PBG dan SLF</h4>
                                <p class="info-item-excerpt">Undangan workshop untuk pemilik bangunan gedung dan kontraktor...</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Links -->
                <div class="quick-links">
                    <h3 class="quick-links-title">Tautan Cepat</h3>
                    <div class="quick-links-grid">
                        <a href="#" class="quick-link">
                            <i class="ph ph-download-simple"></i>
                            <span>Formulir PBG</span>
                        </a>
                        <a href="#" class="quick-link">
                            <i class="ph ph-download-simple"></i>
                            <span>Formulir SLF</span>
                        </a>
                        <a href="#" class="quick-link">
                            <i class="ph ph-file-pdf"></i>
                            <span>Peraturan Terkait</span>
                        </a>
                        <a href="#" class="quick-link">
                            <i class="ph ph-video"></i>
                            <span>Tutorial Penggunaan</span>
                        </a>
                        <a href="#" class="quick-link">
                            <i class="ph ph-question"></i>
                            <span>FAQ</span>
                        </a>
                        <a href="#" class="quick-link">
                            <i class="ph ph-envelope"></i>
                            <span>Hubungi Kami</span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <!-- Building Data Table Section -->
        <section class="section section-table" id="data-bangunan">
            <div class="container">
                <div class="section-header">
                    <span class="section-badge">Data Bangunan</span>
                    <h2 class="section-title">Daftar Bangunan Gedung Terdaftar</h2>
                    <p class="section-description">
                        Data lengkap bangunan gedung yang terdaftar di sistem Kabupaten Blora
                    </p>
                </div>

                <!-- Table Controls -->
                <div class="table-controls">
                    <div class="table-search">
                        <i class="ph ph-magnifying-glass"></i>
                        <input type="text" id="tableSearch" placeholder="Cari nama bangunan, alamat, atau status...">
                    </div>
                    <div class="table-filters">
                        <select class="filter-select" id="filterStatus">
                            <option value="">Semua Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="proses">Dalam Proses</option>
                            <option value="pending">Menunggu</option>
                        </select>
                        <select class="filter-select" id="filterYear">
                            <option value="">Semua Tahun</option>
                            <option value="2026">2026</option>
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                        </select>
                        <button class="btn btn-primary btn-sm">
                            <i class="ph ph-download-simple"></i>
                            <span>Export</span>
                        </button>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-container">
                    <table class="data-table" id="dataTable">
                        <thead>
                            <tr>
                                <th class="th-number">No</th>
                                <th class="th-name">Nama Bangunan</th>
                                <th class="th-address">Alamat</th>
                                <th class="th-status">Status PBG</th>
                                <th class="th-status">Status SLF</th>
                                <th class="th-year">Tahun</th>
                                <th class="th-action">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <!-- Rows will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="pagination" id="pagination">
                    <button class="pagination-btn pagination-prev" id="prevBtn" disabled>
                        <i class="ph ph-caret-left"></i>
                        <span>Sebelumnya</span>
                    </button>
                    <div class="pagination-numbers" id="paginationNumbers">
                        <!-- Page numbers will be populated by JavaScript -->
                    </div>
                    <button class="pagination-btn pagination-next" id="nextBtn">
                        <span>Selanjutnya</span>
                        <i class="ph ph-caret-right"></i>
                    </button>
                </div>
            </div>
        </section>

        <!-- Marketplace-style Card Section -->
        <section class="section section-marketplace" id="kontak">
            <div class="container">
                <div class="section-header">
                    <span class="section-badge">Galeri Bangunan</span>
                    <h2 class="section-title">Bangunan Gedung Terbaru</h2>
                    <p class="section-description">
                        Dokumentasi bangunan gedung yang telah mendapatkan persetujuan dan sertifikat laik fungsi
                    </p>
                </div>

                <!-- Category Tabs -->
                <div class="marketplace-tabs">
                    <button class="tab-btn active" data-tab="all">Semua</button>
                    <button class="tab-btn" data-tab="komersial">Komersial</button>
                    <button class="tab-btn" data-tab="perkantoran">Perkantoran</button>
                    <button class="tab-btn" data-tab="pendidikan">Pendidikan</button>
                    <button class="tab-btn" data-tab="kesehatan">Kesehatan</button>
                </div>

                <!-- Cards Grid -->
                <div class="marketplace-grid" id="marketplaceGrid">
                    <!-- Cards will be populated by JavaScript -->
                </div>

                <!-- Load More -->
                <div class="load-more">
                    <button class="btn btn-outline btn-lg" id="loadMoreBtn">
                        <i class="ph ph-plus"></i>
                        <span>Muat Lebih Banyak</span>
                    </button>
                </div>
            </div>
        </section>
    </main>

@include('frontend.ui2026.00_fiturmenu.02_footer')
