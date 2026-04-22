    <style>
        /* RESET & GLOBAL */

        /* ---- FOOTER UTAMA (BACKGROUND BIRU TUA) ---- */
        .footer-main-wrapper {
            background-color: #09146A;  /* biru gelap solid */
            margin-top: auto;
        }

        /* container footer konten */
        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 48px 24px 40px 24px;
        }

        /* FLEX GRID UTAMA */
        .footer-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            gap: 40px;
        }

        /* KOLOM KIRI & KANAN */
        .footer-col {
            flex: 1 1 300px;
            display: flex;
            flex-direction: column;
            gap: 28px;
        }

        /* ---- LOGO & DESKRIPSI ---- */
        .logo-wrapper {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 16px;
        }

        .logo-img {
            height: 52px;
            width: auto;
            object-fit: contain;
            transition: transform 0.2s ease;
        }

        .title-wrapper h3 {
            font-size: 1.8rem;
            font-weight: 700;
            margin: 0;
            line-height: 1.2;
            color: white;
        }

        .title-wrapper h3 span {
            font-weight: 700;
        }

        .subtitle-badge {
            font-size: 0.85rem;
            font-weight: 500;
            letter-spacing: 1px;
            color: #FFD100;
            margin-top: 6px;
            display: inline-block;
        }

        .desc-text {
            color: rgba(255,255,255,0.85);
            font-size: 0.9rem;
            line-height: 1.5;
            margin-top: 6px;
        }

        /* LAYANAN & JENIS PERMOHONAN (dua kolom dalam satu area) */
        .services-row {
            display: flex;
            flex-wrap: wrap;
            gap: 32px;
            margin-top: 8px;
        }

        .service-box {
            flex: 1 1 180px;
        }

        .widget-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 8px;
            border-left: 3px solid #FFD100;
            padding-left: 12px;
        }

        .widget-title i {
            font-size: 1.2rem;
            color: #FFD100;
        }

        .footer-links {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .footer-links li {
            margin-bottom: 10px;
        }

        .footer-links li a {
            color: rgba(255,255,255,0.85);
            text-decoration: none;
            font-size: 0.9rem;
            transition: all 0.2s;
            display: inline-block;
        }

        .footer-links li a:hover {
            color: #FFD100;
            transform: translateX(4px);
        }

        /* ---- KONTAK & PETA (KOLOM KANAN) ---- */
        .contact-block {
            margin-bottom: 8px;
        }

        .contact-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            margin-bottom: 14px;
            color: white;
            font-size: 0.9rem;
        }

        .contact-item i {
            color: #FFD100;
            font-size: 1.1rem;
            margin-top: 2px;
            flex-shrink: 0;
        }

        .contact-item a, .contact-item span {
            color: rgba(255,255,255,0.9);
            text-decoration: none;
            line-height: 1.4;
        }

        .contact-item a:hover {
            color: #FFD100;
            text-decoration: underline;
        }

        /* MAP CONTAINER */
        .map-wrapper {
            margin-top: 6px;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
            border: 1px solid rgba(255,255,255,0.2);
        }

        .map-iframe {
            width: 100%;
            height: 210px;
            border: 0;
            display: block;
        }

        /* COPYRIGHT SECTION (KUNING) */
        .copyright-bar {
            background-color: #FFD100;
            padding: 16px 20px;
            text-align: center;
        }

        .copyright-text {
            font-family: 'Poppins', sans-serif;
            font-size: 0.85rem;
            font-weight: 500;
            color: #0a1a3a;
            letter-spacing: 0.3px;
        }

        .copyright-text a {
            color: #0a1a3a;
            text-decoration: none;
            font-weight: 600;
        }

        .copyright-text a:hover {
            text-decoration: underline;
        }

        /* RESPONSIVE TWEAKS */
        @media (max-width: 850px) {
            .footer-container {
                padding: 40px 20px 32px 20px;
            }
            .footer-grid {
                gap: 36px;
            }
            .services-row {
                gap: 24px;
            }
            .widget-title {
                font-size: 1rem;
            }
        }

        @media (max-width: 650px) {
            .logo-wrapper {
                flex-direction: column;
                align-items: flex-start;
            }
            .services-row {
                flex-direction: column;
                gap: 24px;
            }
            .service-box {
                width: 100%;
            }
            .footer-col {
                flex-basis: 100%;
            }
            .map-iframe {
                height: 190px;
            }
            .title-wrapper h3 {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>

<!-- ========== FOOTER UTAMA (BERSIH & RAPI) ========== -->
<div class="footer-main-wrapper">
    <div class="footer-container">
        <div class="footer-grid">

            <!-- BAGIAN KIRI: Logo, Deskripsi, Layanan & Jenis Permohonan -->
            <div class="footer-col">
                <!-- Logo + ABG BLORA -->
                <div>
                    <div class="logo-wrapper">
                        <img src="/assets/abgblora/logo/logokabupatenblora.png" alt="Logo Kabupaten Blora" class="logo-img" loading="lazy">
                        <img src="/assets/abgblora/logo/logopupr.png" alt="Logo PUPR" class="logo-img" loading="lazy">
                    </div>
                    <div class="title-wrapper" style="margin-top: 14px;">
                        <h3>
                            <span style="color: white;">ABG</span>
                            <span style="color: white;"> BLORA</span>
                        </h3>
                        <div class="subtitle-badge">BANGUNAN GEDUNG</div>
                    </div>
                    <p class="desc-text">
                        Dinas Pekerjaan Umum Dan Penataan Ruang <br> Kabupaten Blora Provinsi Jawa Tengah
                    </p>
                </div>

                <!-- Layanan & Jenis Permohonan (dua kolom) -->
                <div class="services-row">
                    <!-- Kolom Layanan Kami -->
                    <div class="service-box">
                        <div class="widget-title">
                            <i class="bi bi-gear-fill"></i> Layanan Kami
                        </div>
                        <ul class="footer-links">
                            <li><a href="#">Persetujuan Bangunan Gedung (PBG)</a></li>
                            <li><a href="#">Sertifikat Laik Fungsi (SLF)</a></li>
                            <li><a href="#">Tracking PBG</a></li>
                            <li><a href="#">Pendataan Bangunan Gedung</a></li>
                        </ul>
                    </div>

                    <!-- Kolom Jenis Permohonan -->
                    <div class="service-box">
                        <div class="widget-title">
                            <i class="bi bi-file-earmark-text-fill"></i> Jenis Permohonan
                        </div>
                        <ul class="footer-links">
                            <li><a href="#">Bantuan Teknis</a></li>
                            <li><a href="#">Sosialisasi & Pelatihan</a></li>
                            <li><a href="#">Keterangan Rencana Kota (KRK)</a></li>
                            <li><a href="#">Penilik Bangunan Gedung</a></li>
                            <li><a href="#">SPPD</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- BAGIAN KANAN: Kontak & Peta -->
            <div class="footer-col">
                <!-- Kontak -->
                <div>
                    <div class="widget-title">
                        <i class="bi bi-telephone-fill"></i> Kontak Kami
                    </div>
                    <div class="contact-block">
                        <div class="contact-item">
                            <i class="bi bi-geo-alt-fill"></i>
                            <span>Jl. Nusantara No.62, Jetis, Kauman, Kec. Blora, Kabupaten Blora 58214, Jawa Tengah</span>
                        </div>
                        <div class="contact-item">
                            <i class="bi bi-envelope-fill"></i>
                            <a href="mailto:bid.bangunan.gedung.blora@gmail.com">bid.bangunan.gedung.blora@gmail.com</a>
                        </div>
                    </div>
                </div>

                <!-- Google Maps -->
                <div>
                    <div class="widget-title">
                        <i class="bi bi-geo-alt-fill"></i> Lokasi Kami
                    </div>
                    <div class="map-wrapper">
                        <iframe
                            class="map-iframe"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.523764685145!2d111.4188524747965!3d-7.179069792829058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7712b6c5e5f9d7%3A0x98b939fa9f2c6b88!2sJl.%20Nusantara%20No.62%2C%20Jetis%2C%20Kauman%2C%20Kec.%20Blora%2C%20Kabupaten%20Blora%2C%20Jawa%20Tengah%2058214!5e0!3m2!1sen!2sid!4v1710000000000"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade"
                            title="Peta Kantor Dinas PUPR Blora">
                        </iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- COPYRIGHT AREA (KUNING) -->
    <div class="copyright-bar">
        <div class="copyright-text">
            © Dinas Pekerjaan Umum Dan Penataan Ruang Kabupaten Blora 58214 Provinsi Jawa Tengah | 2025
        </div>
    </div>
</div>

<!-- Catatan: Tidak ada elemen menggangu, struktur rapi, semua tautan bersih & ikon menggunakan Bootstrap Icons CDN -->
</body>

