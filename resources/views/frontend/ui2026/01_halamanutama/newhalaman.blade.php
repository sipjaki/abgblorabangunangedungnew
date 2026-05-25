@include('frontend.ui2026.00_fiturmenu.01_header')

<body>
    <!-- Header -->

    @include('frontend.ui2026.00_fiturmenu.03_headermenu')

    <main>

        <style>
    /* ==================== SERVICES SECTION STYLES ==================== */

    /* Grid layout */
    .services-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 24px;
        padding: 20px 40px;
    }

    /* Card styling - dikurangi opacity biar background keliatan */
    .service-card {
        background: rgba(255, 255, 255, 0.85); /* dari 0.95 jadi 0.85 biar tembus pandang */
        border-radius: 20px;
        padding: 28px 20px;
        text-align: center;
        transition: all 0.4s cubic-bezier(0.2, 0.9, 0.4, 1.1);
        cursor: pointer;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        backdrop-filter: blur(0px); /* HILANGKAN BLUR biar background jelas */
        animation: fadeUp 0.6s ease forwards;
        opacity: 0;
    }

    .service-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 20px 35px -10px rgba(0, 0, 0, 0.2);
        background: rgba(255, 255, 255, 0.95);
    }

    /* Icon wrapper */
    .service-icon {
        width: 80px;
        height: 80px;
        margin: 0 auto 20px;
        background: linear-gradient(135deg, #2563eb, #1e40af);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 8px 20px rgba(37, 99, 235, 0.3);
    }

    .service-card:hover .service-icon {
        transform: scale(1.1) rotate(5deg);
        background: linear-gradient(135deg, #3b82f6, #1e3a8a);
        box-shadow: 0 12px 28px rgba(37, 99, 235, 0.5);
    }

    /* Icon inside */
    .service-icon i {
        width: 42px;
        height: 42px;
        color: white;
        transition: transform 0.3s ease;
    }

    .service-card:hover .service-icon i {
        transform: scale(1.05);
    }

    /* Title */
    .service-title {
        font-size: 1.35rem;
        font-weight: 700;
        margin: 16px 0 8px;
        color: #1e293b;
        transition: color 0.3s ease;
    }

    .service-card:hover .service-title {
        color: #2563eb;
    }

    /* Description */
    .service-desc {
        font-size: 0.9rem;
        color: #64748b;
        line-height: 1.5;
        transition: color 0.3s ease;
    }

    .service-card:hover .service-desc {
        color: #334155;
    }

    /* Section header */
    .section-header {
        text-align: center;
        margin-bottom: 48px;
        padding: 30px 20px 0;
    }

    .section-title {
        font-size: 2.2rem;
        font-weight: 800;
        color: #0f172a;
        position: relative;
        display: inline-block;
        padding-bottom: 16px;
    }

    .section-title:after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        width: 80px;
        height: 4px;
        background: linear-gradient(90deg, #2563eb, #60a5fa);
        border-radius: 4px;
    }

    /* Animations */
    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Animation delays */
    .service-card[data-delay="0"] { animation-delay: 0s; }
    .service-card[data-delay="50"] { animation-delay: 0.05s; }
    .service-card[data-delay="100"] { animation-delay: 0.1s; }
    .service-card[data-delay="150"] { animation-delay: 0.15s; }
    .service-card[data-delay="200"] { animation-delay: 0.2s; }
    .service-card[data-delay="250"] { animation-delay: 0.25s; }
    .service-card[data-delay="300"] { animation-delay: 0.3s; }
    .service-card[data-delay="350"] { animation-delay: 0.35s; }
    .service-card[data-delay="400"] { animation-delay: 0.4s; }
    .service-card[data-delay="450"] { animation-delay: 0.45s; }
    .service-card[data-delay="500"] { animation-delay: 0.5s; }
    .service-card[data-delay="550"] { animation-delay: 0.55s; }

    /* Responsive Styles */
    @media (max-width: 768px) {
        .services-grid {
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 18px;
            padding: 20px;
        }

        .service-icon {
            width: 65px;
            height: 65px;
        }

        .service-icon i {
            width: 32px;
            height: 32px;
        }

        .section-title {
            font-size: 1.8rem;
        }

        .section.services-section {
            min-height: auto;
        }
    }

    @media (max-width: 480px) {
        .services-grid {
            grid-template-columns: 1fr;
            gap: 16px;
            padding: 15px;
        }
    }
</style>

<!-- ==================== SERVICES SECTION ==================== -->
<section class="section services-section" id="services" style="position: relative; overflow: hidden; min-height: 100%;">

    <!-- Layer Background dengan transparansi - OPACITY DIPERBESAR biar keliatan -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: url('{{ asset('assets/abgblora/logo/newversi2abg.png') }}'); background-repeat: no-repeat; background-position: center center; background-size: cover; opacity: 0.35; pointer-events: none; z-index: 0;"></div>

    <!-- Layer gradasi untuk efek halus - DIKECILKAN OPACITY-nya biar ga nutupin gambar -->
    <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: linear-gradient(135deg, rgba(255,255,255,0.15) 0%, rgba(248,250,252,0.05) 100%); pointer-events: none; z-index: 0;"></div>

    <!-- Konten Utama -->
    <div class="container-fluid px-0" style="position: relative; z-index: 1;">

        <!-- Section Header -->
        <div class="section-header">
            <h2 class="section-title">Penyelenggaraan Bangunan Gedung</h2>
        </div>

        <!-- Services Grid -->
        <div class="services-grid">
            <div class="service-card" data-animate="fade-up" data-delay="0">
                <div class="service-icon">
                    <i data-lucide="file-check"></i>
                </div>
                <h3 class="service-title">PBG</h3>
                <p class="service-desc">Persetujuan Bangunan Gedung</p>
            </div>

            <div class="service-card" data-animate="fade-up" data-delay="50">
                <div class="service-icon">
                    <i data-lucide="shield-check"></i>
                </div>
                <h3 class="service-title">SLF</h3>
                <p class="service-desc">Sertifikat Laik Fungsi</p>
            </div>

            <div class="service-card" data-animate="fade-up" data-delay="100">
                <div class="service-icon">
                    <i data-lucide="clipboard-check"></i>
                </div>
                <h3 class="service-title">Rekomendasi Teknis</h3>
                <p class="service-desc">Rekomendasi teknis bangunan</p>
            </div>

            <div class="service-card" data-animate="fade-up" data-delay="150">
                <div class="service-icon">
                    <i data-lucide="award"></i>
                </div>
                <h3 class="service-title">Sertifikasi Ahli</h3>
                <p class="service-desc">Sertifikasi tenaga ahli</p>
            </div>

            <div class="service-card" data-animate="fade-up" data-delay="200">
                <div class="service-icon">
                    <i data-lucide="message-square"></i>
                </div>
                <h3 class="service-title">Konsultasi Bangunan</h3>
                <p class="service-desc">Konsultasi teknis bangunan</p>
            </div>

            <div class="service-card" data-animate="fade-up" data-delay="250">
                <div class="service-icon">
                    <i data-lucide="file-search"></i>
                </div>
                <h3 class="service-title">Verifikasi Dokumen</h3>
                <p class="service-desc">Verifikasi dokumen bangunan</p>
            </div>

            <div class="service-card" data-animate="fade-up" data-delay="300">
                <div class="service-icon">
                    <i data-lucide="upload"></i>
                </div>
                <h3 class="service-title">Pelaporan Bangunan</h3>
                <p class="service-desc">Laporan data bangunan</p>
            </div>

            <div class="service-card" data-animate="fade-up" data-delay="350">
                <div class="service-icon">
                    <i data-lucide="eye"></i>
                </div>
                <h3 class="service-title">Monitoring Proyek</h3>
                <p class="service-desc">Pemantauan proyek bangunan</p>
            </div>

            <div class="service-card" data-animate="fade-up" data-delay="400">
                <div class="service-icon">
                    <i data-lucide="calendar-clock"></i>
                </div>
                <h3 class="service-title">Perpanjangan Izin</h3>
                <p class="service-desc">Perpanjangan izin bangunan</p>
            </div>

            <div class="service-card" data-animate="fade-up" data-delay="450">
                <div class="service-icon">
                    <i data-lucide="refresh-cw"></i>
                </div>
                <h3 class="service-title">Perubahan Izin</h3>
                <p class="service-desc">Perubahan data izin</p>
            </div>

            <div class="service-card" data-animate="fade-up" data-delay="500">
                <div class="service-icon">
                    <i data-lucide="x-circle"></i>
                </div>
                <h3 class="service-title">Pembatalan Izin</h3>
                <p class="service-desc">Pembatalan izin bangunan</p>
            </div>

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

<script>
    // Inisialisasi Lucide Icons
    document.addEventListener('DOMContentLoaded', function() {
        if (typeof lucide !== 'undefined' && lucide.createIcons) {
            lucide.createIcons();
        }
    });
</script>
    </main>

@include('frontend.ui2026.00_fiturmenu.02_footer')
