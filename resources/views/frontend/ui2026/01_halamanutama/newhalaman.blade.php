@include('frontend.ui2026.00_fiturmenu.01_header')

<body>
    <!-- Header -->

    @include('frontend.ui2026.00_fiturmenu.03_headermenu')

    <main>
        {{-- <section class="section services-section" id="services"> --}}
        <section class="section services-section" id="services"
                style="
                    position: relative;
                    overflow: hidden;

                    background-image: url('{{ asset('assets/abgblora/logo/versi2abg.png') }}');

                    background-repeat: no-repeat;
                    background-position: center center;

                    /* Menyesuaikan luas section */
                    background-size: contain;

                    /* Supaya background mengikuti tinggi section */
                    min-height: 100%;

                    background-attachment: scroll;
                ">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Layanan Utama</h2>
                    {{-- <p class="section-subtitle">Akses layanan administrasi bangunan gedung dengan mudah dan cepat</p> --}}
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



    </main>

@include('frontend.ui2026.00_fiturmenu.02_footer')
