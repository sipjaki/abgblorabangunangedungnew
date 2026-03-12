@include('frontend.ui2026.00_fiturmenu.01_header')

<body>
    <!-- Header -->
    <header class="header" id="header">
        <div class="container header-container">
            <!-- Logo -->
            <a href="#" class="logo">
                <div class="logo-icon">
                    <i data-lucide="building-2"></i>
                </div>
                <div class="logo-text">
                    <span class="logo-title">Sistem Informasi Bangunan</span>
                    <span class="logo-subtitle">Kabupaten Blora</span>
                </div>
            </a>

            <!-- Desktop Navigation -->
            <nav class="nav-desktop">
                <ul class="nav-menu">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">Beranda</a>
                    </li>
                    <li class="nav-item has-dropdown">
                        <button class="nav-link dropdown-toggle" data-dropdown="layanan">
                            Layanan
                            <i data-lucide="chevron-down" class="dropdown-icon"></i>
                        </button>
                        <ul class="dropdown-menu" id="dropdown-layanan">
                            <li><a href="#" class="dropdown-link"><i data-lucide="file-check"></i>Pengajuan PBG</a></li>
                            <li><a href="#" class="dropdown-link"><i data-lucide="shield-check"></i>Pengajuan SLF</a></li>
                            <li><a href="#" class="dropdown-link"><i data-lucide="clipboard-check"></i>Rekomendasi Teknis</a></li>
                            <li><a href="#" class="dropdown-link"><i data-lucide="award"></i>Sertifikasi Ahli</a></li>
                            <li><a href="#" class="dropdown-link"><i data-lucide="message-square"></i>Konsultasi Bangunan</a></li>
                        </ul>
                    </li>
                    <li class="nav-item has-dropdown">
                        <button class="nav-link dropdown-toggle" data-dropdown="data">
                            Data Bangunan
                            <i data-lucide="chevron-down" class="dropdown-icon"></i>
                        </button>
                        <ul class="dropdown-menu" id="dropdown-data">
                            <li><a href="#" class="dropdown-link"><i data-lucide="bar-chart-3"></i>Statistik Bangunan</a></li>
                            <li><a href="#" class="dropdown-link"><i data-lucide="check-circle"></i>Verifikasi Data</a></li>
                            <li><a href="#" class="dropdown-link"><i data-lucide="file-text"></i>Data Perizinan</a></li>
                            <li><a href="#" class="dropdown-link"><i data-lucide="upload"></i>Pelaporan Bangunan</a></li>
                            <li><a href="#" class="dropdown-link"><i data-lucide="eye"></i>Monitoring Proyek</a></li>
                        </ul>
                    </li>
                    <li class="nav-item has-dropdown">
                        <button class="nav-link dropdown-toggle" data-dropdown="informasi">
                            Informasi
                            <i data-lucide="chevron-down" class="dropdown-icon"></i>
                        </button>
                        <ul class="dropdown-menu" id="dropdown-informasi">
                            <li><a href="#" class="dropdown-link"><i data-lucide="bell"></i>Pengumuman</a></li>
                            <li><a href="#" class="dropdown-link"><i data-lucide="newspaper"></i>Berita Terbaru</a></li>
                            <li><a href="#" class="dropdown-link"><i data-lucide="book-open"></i>Regulasi</a></li>
                            <li><a href="#" class="dropdown-link"><i data-lucide="calendar"></i>Jadwal Kegiatan</a></li>
                            <li><a href="#" class="dropdown-link"><i data-lucide="help-circle"></i>FAQ</a></li>
                        </ul>
                    </li>
                    <li class="nav-item has-dropdown">
                        <button class="nav-link dropdown-toggle" data-dropdown="profil">
                            Profil
                            <i data-lucide="chevron-down" class="dropdown-icon"></i>
                        </button>
                        <ul class="dropdown-menu" id="dropdown-profil">
                            <li><a href="#" class="dropdown-link"><i data-lucide="target"></i>Visi & Misi</a></li>
                            <li><a href="#" class="dropdown-link"><i data-lucide="users"></i>Struktur Organisasi</a></li>
                            <li><a href="#" class="dropdown-link"><i data-lucide="briefcase"></i>Tugas & Fungsi</a></li>
                            <li><a href="#" class="dropdown-link"><i data-lucide="history"></i>Sejarah</a></li>
                            <li><a href="#" class="dropdown-link"><i data-lucide="phone"></i>Kontak Kami</a></li>
                        </ul>
                    </li>
                    <li class="nav-item has-dropdown">
                        <button class="nav-link dropdown-toggle" data-dropdown="bantuan">
                            Bantuan
                            <i data-lucide="chevron-down" class="dropdown-icon"></i>
                        </button>
                        <ul class="dropdown-menu" id="dropdown-bantuan">
                            <li><a href="#" class="dropdown-link"><i data-lucide="book"></i>Panduan Penggunaan</a></li>
                            <li><a href="#" class="dropdown-link"><i data-lucide="video"></i>Video Tutorial</a></li>
                            <li><a href="#" class="dropdown-link"><i data-lucide="download"></i>Download Formulir</a></li>
                            <li><a href="#" class="dropdown-link"><i data-lucide="mail"></i>Hubungi Kami</a></li>
                            <li><a href="#" class="dropdown-link"><i data-lucide="message-circle"></i>Live Chat</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="btn btn-primary btn-sm">Login</a>
                    </li>
                </ul>
            </nav>

            <!-- Mobile Menu Button -->
            <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Toggle Menu">
                <i data-lucide="menu"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <nav class="nav-mobile" id="navMobile">
            <ul class="nav-mobile-menu">
                <li><a href="#" class="nav-mobile-link active">Beranda</a></li>
                <li class="nav-mobile-item has-submenu">
                    <button class="nav-mobile-link submenu-toggle">Layanan</button>
                    <ul class="submenu">
                        <li><a href="#">Pengajuan PBG</a></li>
                        <li><a href="#">Pengajuan SLF</a></li>
                        <li><a href="#">Rekomendasi Teknis</a></li>
                        <li><a href="#">Sertifikasi Ahli</a></li>
                        <li><a href="#">Konsultasi Bangunan</a></li>
                    </ul>
                </li>
                <li class="nav-mobile-item has-submenu">
                    <button class="nav-mobile-link submenu-toggle">Data Bangunan</button>
                    <ul class="submenu">
                        <li><a href="#">Statistik Bangunan</a></li>
                        <li><a href="#">Verifikasi Data</a></li>
                        <li><a href="#">Data Perizinan</a></li>
                        <li><a href="#">Pelaporan Bangunan</a></li>
                        <li><a href="#">Monitoring Proyek</a></li>
                    </ul>
                </li>
                <li class="nav-mobile-item has-submenu">
                    <button class="nav-mobile-link submenu-toggle">Informasi</button>
                    <ul class="submenu">
                        <li><a href="#">Pengumuman</a></li>
                        <li><a href="#">Berita Terbaru</a></li>
                        <li><a href="#">Regulasi</a></li>
                        <li><a href="#">Jadwal Kegiatan</a></li>
                        <li><a href="#">FAQ</a></li>
                    </ul>
                </li>
                <li class="nav-mobile-item has-submenu">
                    <button class="nav-mobile-link submenu-toggle">Profil</button>
                    <ul class="submenu">
                        <li><a href="#">Visi & Misi</a></li>
                        <li><a href="#">Struktur Organisasi</a></li>
                        <li><a href="#">Tugas & Fungsi</a></li>
                        <li><a href="#">Sejarah</a></li>
                        <li><a href="#">Kontak Kami</a></li>
                    </ul>
                </li>
                <li class="nav-mobile-item has-submenu">
                    <button class="nav-mobile-link submenu-toggle">Bantuan</button>
                    <ul class="submenu">
                        <li><a href="#">Panduan Penggunaan</a></li>
                        <li><a href="#">Video Tutorial</a></li>
                        <li><a href="#">Download Formulir</a></li>
                        <li><a href="#">Hubungi Kami</a></li>
                        <li><a href="#">Live Chat</a></li>
                    </ul>
                </li>
                <li><a href="#" class="btn btn-primary">Login</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <!-- Main Service Icons Section - FIRST SECTION (NO HERO BANNER) -->
        <section class="section services-section" id="services">
            <div class="bg-illustration bg-illustration--skyline">
                <img src="/assets/2026/assets/illustrations/skyline.png" alt="" aria-hidden="true">
            </div>
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Layanan Utama</h2>
                    <p class="section-subtitle">Akses layanan administrasi bangunan gedung dengan mudah dan cepat</p>
                </div>

                <div class="services-grid">
                    <!-- Service Card 1 -->
                    <div class="service-card" data-animate="fade-up" data-delay="0">
                        <div class="service-icon">
                            <i data-lucide="file-check"></i>
                        </div>
                        <h3 class="service-title">PBG</h3>
                        <p class="service-desc">Persetujuan Bangunan Gedung</p>
                    </div>

                    <!-- Service Card 2 -->
                    <div class="service-card" data-animate="fade-up" data-delay="50">
                        <div class="service-icon">
                            <i data-lucide="shield-check"></i>
                        </div>
                        <h3 class="service-title">SLF</h3>
                        <p class="service-desc">Sertifikat Laik Fungsi</p>
                    </div>

                    <!-- Service Card 3 -->
                    <div class="service-card" data-animate="fade-up" data-delay="100">
                        <div class="service-icon">
                            <i data-lucide="clipboard-check"></i>
                        </div>
                        <h3 class="service-title">Rekomendasi Teknis</h3>
                        <p class="service-desc">Rekomendasi teknis bangunan</p>
                    </div>

                    <!-- Service Card 4 -->
                    <div class="service-card" data-animate="fade-up" data-delay="150">
                        <div class="service-icon">
                            <i data-lucide="award"></i>
                        </div>
                        <h3 class="service-title">Sertifikasi Ahli</h3>
                        <p class="service-desc">Sertifikasi tenaga ahli</p>
                    </div>

                    <!-- Service Card 5 -->
                    <div class="service-card" data-animate="fade-up" data-delay="200">
                        <div class="service-icon">
                            <i data-lucide="message-square"></i>
                        </div>
                        <h3 class="service-title">Konsultasi Bangunan</h3>
                        <p class="service-desc">Konsultasi teknis bangunan</p>
                    </div>

                    <!-- Service Card 6 -->
                    <div class="service-card" data-animate="fade-up" data-delay="250">
                        <div class="service-icon">
                            <i data-lucide="file-search"></i>
                        </div>
                        <h3 class="service-title">Verifikasi Dokumen</h3>
                        <p class="service-desc">Verifikasi dokumen bangunan</p>
                    </div>

                    <!-- Service Card 7 -->
                    <div class="service-card" data-animate="fade-up" data-delay="300">
                        <div class="service-icon">
                            <i data-lucide="upload"></i>
                        </div>
                        <h3 class="service-title">Pelaporan Bangunan</h3>
                        <p class="service-desc">Laporan data bangunan</p>
                    </div>

                    <!-- Service Card 8 -->
                    <div class="service-card" data-animate="fade-up" data-delay="350">
                        <div class="service-icon">
                            <i data-lucide="eye"></i>
                        </div>
                        <h3 class="service-title">Monitoring Proyek</h3>
                        <p class="service-desc">Pemantauan proyek bangunan</p>
                    </div>

                    <!-- Service Card 9 -->
                    <div class="service-card" data-animate="fade-up" data-delay="400">
                        <div class="service-icon">
                            <i data-lucide="calendar-clock"></i>
                        </div>
                        <h3 class="service-title">Perpanjangan Izin</h3>
                        <p class="service-desc">Perpanjangan izin bangunan</p>
                    </div>

                    <!-- Service Card 10 -->
                    <div class="service-card" data-animate="fade-up" data-delay="450">
                        <div class="service-icon">
                            <i data-lucide="refresh-cw"></i>
                        </div>
                        <h3 class="service-title">Perubahan Izin</h3>
                        <p class="service-desc">Perubahan data izin</p>
                    </div>

                    <!-- Service Card 11 -->
                    <div class="service-card" data-animate="fade-up" data-delay="500">
                        <div class="service-icon">
                            <i data-lucide="x-circle"></i>
                        </div>
                        <h3 class="service-title">Pembatalan Izin</h3>
                        <p class="service-desc">Pembatalan izin bangunan</p>
                    </div>

                    <!-- Service Card 12 -->
                    <div class="service-card" data-animate="fade-up" data-delay="550">
                        <div class="service-icon">
                            <i data-lucide="search"></i>
                        </div>
                        <h3 class="service-title">Cek Status Izin</h3>
                        <p class="service-desc">Cek status perizinan</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Building Statistics Section -->
        <section class="section stats-section" id="stats">
            <div class="bg-illustration bg-illustration--blueprint">
                <img src="/assets/2026/assets/illustrations/blueprint.png" alt="" aria-hidden="true">
            </div>
            <div class="container">
                <div class="section-header section-header--light">
                    <h2 class="section-title">Statistik Bangunan Gedung</h2>
                    <p class="section-subtitle">Data terkini penyelenggaraan bangunan gedung di Kabupaten Blora</p>
                </div>

                <div class="stats-grid">
                    <!-- Stat Card 1 -->
                    <div class="stat-card" data-animate="fade-up" data-delay="0">
                        <div class="stat-icon">
                            <i data-lucide="building-2"></i>
                        </div>
                        <div class="stat-number" data-count="12000">0</div>
                        <div class="stat-label">Total Bangunan Gedung</div>
                    </div>

                    <!-- Stat Card 2 -->
                    <div class="stat-card" data-animate="fade-up" data-delay="100">
                        <div class="stat-icon">
                            <i data-lucide="check-circle"></i>
                        </div>
                        <div class="stat-number" data-count="8450">0</div>
                        <div class="stat-label">Bangunan Terverifikasi</div>
                    </div>

                    <!-- Stat Card 3 -->
                    <div class="stat-card" data-animate="fade-up" data-delay="200">
                        <div class="stat-icon">
                            <i data-lucide="file-check"></i>
                        </div>
                        <div class="stat-number" data-count="6230">0</div>
                        <div class="stat-label">PBG Aktif</div>
                    </div>

                    <!-- Stat Card 4 -->
                    <div class="stat-card" data-animate="fade-up" data-delay="300">
                        <div class="stat-icon">
                            <i data-lucide="shield-check"></i>
                        </div>
                        <div class="stat-number" data-count="5890">0</div>
                        <div class="stat-label">SLF Aktif</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Information Section -->
        <section class="section info-section" id="information">
            <div class="bg-illustration bg-illustration--building">
                <img src="/assets/2026/assets/illustrations/building.png" alt="" aria-hidden="true">
            </div>
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Informasi Terbaru</h2>
                    <p class="section-subtitle">Pengumuman dan berita terkini seputar administrasi bangunan gedung</p>
                </div>

                <div class="info-grid">
                    <!-- Info Card 1 -->
                    <article class="info-card" data-animate="fade-left" data-delay="0">
                        <div class="info-date">
                            <span class="date-day">15</span>
                            <span class="date-month">Jan</span>
                        </div>
                        <div class="info-content">
                            <h3 class="info-title">Pemberitahuan Pemutakhiran Data Bangunan Gedung Tahun 2024</h3>
                            <p class="info-excerpt">Seluruh pemilik bangunan gedung dimohon untuk melakukan pemutakhiran data...</p>
                            <a href="#" class="info-link">Baca Selengkapnya <i data-lucide="arrow-right"></i></a>
                        </div>
                    </article>

                    <!-- Info Card 2 -->
                    <article class="info-card" data-animate="fade-left" data-delay="100">
                        <div class="info-date">
                            <span class="date-day">12</span>
                            <span class="date-month">Jan</span>
                        </div>
                        <div class="info-content">
                            <h3 class="info-title">Jadwal Layanan PBG dan SLF Bulan Januari 2025</h3>
                            <p class="info-excerpt">Informasi lengkap jadwal pelayanan PBG dan SLF untuk bulan Januari 2025...</p>
                            <a href="#" class="info-link">Baca Selengkapnya <i data-lucide="arrow-right"></i></a>
                        </div>
                    </article>

                    <!-- Info Card 3 -->
                    <article class="info-card" data-animate="fade-left" data-delay="200">
                        <div class="info-date">
                            <span class="date-day">10</span>
                            <span class="date-month">Jan</span>
                        </div>
                        <div class="info-content">
                            <h3 class="info-title">Pengumuman Hasil Verifikasi Bangunan Gedung Periode Desember 2024</h3>
                            <p class="info-excerpt">Hasil verifikasi bangunan gedung yang telah selesai diproses pada periode...</p>
                            <a href="#" class="info-link">Baca Selengkapnya <i data-lucide="arrow-right"></i></a>
                        </div>
                    </article>

                    <!-- Info Card 4 -->
                    <article class="info-card" data-animate="fade-left" data-delay="300">
                        <div class="info-date">
                            <span class="date-day">08</span>
                            <span class="date-month">Jan</span>
                        </div>
                        <div class="info-content">
                            <h3 class="info-title">Perubahan Persyaratan Pengajuan SLF Terbaru</h3>
                            <p class="info-excerpt">Adanya perubahan persyaratan pengajuan SLF sesuai dengan peraturan terbaru...</p>
                            <a href="#" class="info-link">Baca Selengkapnya <i data-lucide="arrow-right"></i></a>
                        </div>
                    </article>

                    <!-- Info Card 5 -->
                    <article class="info-card" data-animate="fade-left" data-delay="400">
                        <div class="info-date">
                            <span class="date-day">05</span>
                            <span class="date-month">Jan</span>
                        </div>
                        <div class="info-content">
                            <h3 class="info-title">Workshop Sertifikasi Ahli Bangunan Gedung</h3>
                            <p class="info-excerpt">Workshop sertifikasi ahli bangunan gedung akan dilaksanakan pada tanggal...</p>
                            <a href="#" class="info-link">Baca Selengkapnya <i data-lucide="arrow-right"></i></a>
                        </div>
                    </article>

                    <!-- Info Card 6 -->
                    <article class="info-card" data-animate="fade-left" data-delay="500">
                        <div class="info-date">
                            <span class="date-day">03</span>
                            <span class="date-month">Jan</span>
                        </div>
                        <div class="info-content">
                            <h3 class="info-title">Pentingnya Memiliki SLF untuk Bangunan Komersial</h3>
                            <p class="info-excerpt">Sertifikat Laik Fungsi (SLF) menjadi persyaratan wajib bagi bangunan komersial...</p>
                            <a href="#" class="info-link">Baca Selengkapnya <i data-lucide="arrow-right"></i></a>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Building Data Table Section -->
        <section class="section table-section" id="data-table">
            <div class="bg-illustration bg-illustration--cityscape">
                <img src="/assets/2026/assets/illustrations/cityscape.png" alt="" aria-hidden="true">
            </div>
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Data Bangunan Gedung Terdaftar</h2>
                    <p class="section-subtitle">Daftar bangunan gedung yang telah terdaftar dalam sistem</p>
                </div>

                <!-- Search Bar -->
                <div class="table-controls">
                    <div class="search-box">
                        <i data-lucide="search" class="search-icon"></i>
                        <input type="text" class="search-input" id="tableSearch" placeholder="Cari nama bangunan atau alamat...">
                    </div>
                    <div class="table-filters">
                        <select class="filter-select" id="filterStatus">
                            <option value="">Semua Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="proses">Dalam Proses</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
                    </div>
                </div>

                <!-- Table -->
                <div class="table-container">
                    <table class="data-table" id="buildingTable">
                        <thead>
                            <tr>
                                <th class="th-number">No</th>
                                <th class="th-sortable" data-sort="name">
                                    Nama Bangunan
                                    <i data-lucide="chevrons-up-down" class="sort-icon"></i>
                                </th>
                                <th>Alamat</th>
                                <th class="th-sortable" data-sort="pbg">
                                    Status PBG
                                    <i data-lucide="chevrons-up-down" class="sort-icon"></i>
                                </th>
                                <th class="th-sortable" data-sort="slf">
                                    Status SLF
                                    <i data-lucide="chevrons-up-down" class="sort-icon"></i>
                                </th>
                                <th class="th-sortable" data-sort="year">
                                    Tahun
                                    <i data-lucide="chevrons-up-down" class="sort-icon"></i>
                                </th>
                            </tr>
                        </thead>
                        <tbody id="tableBody">
                            <!-- Table rows will be populated by JavaScript -->
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="pagination" id="pagination">
                    <!-- Pagination will be populated by JavaScript -->
                </div>
            </div>
        </section>

        <!-- Marketplace-style Cards Section -->
        <section class="section marketplace-section" id="marketplace">
            <div class="bg-illustration bg-illustration--skyline-right">
                <img src="/assets/2026/assets/illustrations/skyline.png" alt="" aria-hidden="true">
            </div>
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Bangunan Gedung Unggulan</h2>
                    <p class="section-subtitle">Beberapa bangunan gedung yang telah terverifikasi dan memiliki perizinan lengkap</p>
                </div>

                <div class="marketplace-grid">
                    <!-- Marketplace Card 1 -->
                    <div class="marketplace-card" data-animate="scale-up" data-delay="0">
                        <div class="marketplace-image">
                            <img src="/assets/2026/assets/images/buildings/government.jpg" alt="Gedung Perkantoran Pemkab Blora">
                            <div class="marketplace-badges">
                                <span class="badge badge-pbg">PBG Aktif</span>
                                <span class="badge badge-slf">SLF Aktif</span>
                            </div>
                        </div>
                        <div class="marketplace-content">
                            <h3 class="marketplace-title">Gedung Perkantoran Pemkab Blora</h3>
                            <div class="marketplace-location">
                                <i data-lucide="map-pin"></i>
                                <span>Jl. Nusantara No. 10, Blora</span>
                            </div>
                            <div class="marketplace-meta">
                                <span class="marketplace-year">Tahun: 2018</span>
                            </div>
                        </div>
                    </div>

                    <!-- Marketplace Card 2 -->
                    <div class="marketplace-card" data-animate="scale-up" data-delay="80">
                        <div class="marketplace-image">
                            <img src="/assets/2026/assets/images/buildings/hospital.jpg" alt="Rumah Sakit Umum Daerah Blora">
                            <div class="marketplace-badges">
                                <span class="badge badge-pbg">PBG Aktif</span>
                                <span class="badge badge-slf">SLF Aktif</span>
                            </div>
                        </div>
                        <div class="marketplace-content">
                            <h3 class="marketplace-title">Rumah Sakit Umum Daerah Blora</h3>
                            <div class="marketplace-location">
                                <i data-lucide="map-pin"></i>
                                <span>Jl. Dr. Sutomo No. 42, Blora</span>
                            </div>
                            <div class="marketplace-meta">
                                <span class="marketplace-year">Tahun: 2015</span>
                            </div>
                        </div>
                    </div>

                    <!-- Marketplace Card 3 -->
                    <div class="marketplace-card" data-animate="scale-up" data-delay="160">
                        <div class="marketplace-image">
                            <img src="/assets/2026/assets/images/buildings/mall.jpg" alt="Mall Blora Square">
                            <div class="marketplace-badges">
                                <span class="badge badge-pbg">PBG Aktif</span>
                                <span class="badge badge-slf">SLF Aktif</span>
                            </div>
                        </div>
                        <div class="marketplace-content">
                            <h3 class="marketplace-title">Mall Blora Square</h3>
                            <div class="marketplace-location">
                                <i data-lucide="map-pin"></i>
                                <span>Jl. Sudirman No. 88, Blora</span>
                            </div>
                            <div class="marketplace-meta">
                                <span class="marketplace-year">Tahun: 2020</span>
                            </div>
                        </div>
                    </div>

                    <!-- Marketplace Card 4 -->
                    <div class="marketplace-card" data-animate="scale-up" data-delay="240">
                        <div class="marketplace-image">
                            <img src="/assets/2026/assets/images/buildings/hotel.jpg" alt="Hotel Grand Blora">
                            <div class="marketplace-badges">
                                <span class="badge badge-pbg">PBG Aktif</span>
                                <span class="badge badge-slf">SLF Aktif</span>
                            </div>
                        </div>
                        <div class="marketplace-content">
                            <h3 class="marketplace-title">Hotel Grand Blora</h3>
                            <div class="marketplace-location">
                                <i data-lucide="map-pin"></i>
                                <span>Jl. Pemuda No. 25, Blora</span>
                            </div>
                            <div class="marketplace-meta">
                                <span class="marketplace-year">Tahun: 2019</span>
                            </div>
                        </div>
                    </div>

                    <!-- Marketplace Card 5 -->
                    <div class="marketplace-card" data-animate="scale-up" data-delay="320">
                        <div class="marketplace-image">
                            <img src="/assets/2026/assets/images/buildings/convention.jpg" alt="Gedung Serbaguna Bahurekso">
                            <div class="marketplace-badges">
                                <span class="badge badge-pbg">PBG Aktif</span>
                                <span class="badge badge-slf">SLF Aktif</span>
                            </div>
                        </div>
                        <div class="marketplace-content">
                            <h3 class="marketplace-title">Gedung Serbaguna Bahurekso</h3>
                            <div class="marketplace-location">
                                <i data-lucide="map-pin"></i>
                                <span>Jl. Veteran No. 15, Blora</span>
                            </div>
                            <div class="marketplace-meta">
                                <span class="marketplace-year">Tahun: 2017</span>
                            </div>
                        </div>
                    </div>

                    <!-- Marketplace Card 6 -->
                    <div class="marketplace-card" data-animate="scale-up" data-delay="400">
                        <div class="marketplace-image">
                            <img src="/assets/2026/assets/images/buildings/market.jpg" alt="Pasar Tradisional Blora">
                            <div class="marketplace-badges">
                                <span class="badge badge-pbg">PBG Aktif</span>
                                <span class="badge badge-warning">SLF Proses</span>
                            </div>
                        </div>
                        <div class="marketplace-content">
                            <h3 class="marketplace-title">Pasar Tradisional Blora</h3>
                            <div class="marketplace-location">
                                <i data-lucide="map-pin"></i>
                                <span>Jl. Pasar No. 1, Blora</span>
                            </div>
                            <div class="marketplace-meta">
                                <span class="marketplace-year">Tahun: 2016</span>
                            </div>
                        </div>
                    </div>

                    <!-- Marketplace Card 7 -->
                    <div class="marketplace-card" data-animate="scale-up" data-delay="480">
                        <div class="marketplace-image">
                            <img src="/assets/2026/assets/images/buildings/sports.jpg" alt="Gedung Olahraga Blora">
                            <div class="marketplace-badges">
                                <span class="badge badge-pbg">PBG Aktif</span>
                                <span class="badge badge-slf">SLF Aktif</span>
                            </div>
                        </div>
                        <div class="marketplace-content">
                            <h3 class="marketplace-title">Gedung Olahraga Blora</h3>
                            <div class="marketplace-location">
                                <i data-lucide="map-pin"></i>
                                <span>Jl. Sport Center, Blora</span>
                            </div>
                            <div class="marketplace-meta">
                                <span class="marketplace-year">Tahun: 2021</span>
                            </div>
                        </div>
                    </div>

                    <!-- Marketplace Card 8 -->
                    <div class="marketplace-card" data-animate="scale-up" data-delay="560">
                        <div class="marketplace-image">
                            <img src="/assets/2026/assets/images/buildings/library.jpg" alt="Perpustakaan Daerah Blora">
                            <div class="marketplace-badges">
                                <span class="badge badge-pbg">PBG Aktif</span>
                                <span class="badge badge-slf">SLF Aktif</span>
                            </div>
                        </div>
                        <div class="marketplace-content">
                            <h3 class="marketplace-title">Perpustakaan Daerah Blora</h3>
                            <div class="marketplace-location">
                                <i data-lucide="map-pin"></i>
                                <span>Jl. Pendidikan No. 5, Blora</span>
                            </div>
                            <div class="marketplace-meta">
                                <span class="marketplace-year">Tahun: 2022</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

@include('frontend.ui2026.00_fiturmenu.02_footer')
