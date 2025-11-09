    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            background-color: #f5f5f5;
        }

        .footer-section {
            background-color: #09146A;
            color: white;
            padding: 60px 0 0;
        }

        .footer-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        .footer-main {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            padding-bottom: 40px;
        }

        .footer-left {
            flex: 0 0 60%;
            display: flex;
            flex-wrap: wrap;
        }

        .footer-about {
            flex: 0 0 40%;
            padding-right: 20px;
        }

        .footer-logo-container {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .footer-logo {
            width: 62px;
            height: auto;
        }

        .footer-title {
            margin-bottom: 15px;
        }

        .footer-title span {
            font-style: italic;
            font-weight: 600;
        }

        .abg-text {
            color: white;
        }

        .blora-text {
            color: #4CAF50;
        }

        .subtitle {
            color: #FFD100;
            font-style: italic;
            font-weight: 600;
            margin-bottom: 15px;
        }

        .footer-about p {
            color: #E0E0E0;
            font-size: 14px;
        }

        .footer-services {
            flex: 0 0 60%;
            display: flex;
            justify-content: space-between;
        }

        .service-column {
            flex: 0 0 48%;
        }

        .footer-right {
            flex: 0 0 38%;
        }

        .footer-widget {
            margin-bottom: 25px;
        }

        .footer-widget-title {
            color: white;
            font-size: 18px;
            margin-bottom: 20px;
            font-weight: 600;
            position: relative;
            padding-bottom: 8px;
        }

        .footer-widget-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 40px;
            height: 2px;
            background-color: #FFD100;
        }

        .footer-widget .link {
            list-style: none;
        }

        .footer-widget .link li {
            margin-bottom: 12px;
        }

        .footer-widget .link a {
            color: #E0E0E0;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
            display: block;
            padding: 5px 0;
        }

        .footer-widget .link a:hover {
            color: #FFD100;
            padding-left: 5px;
        }

        .contact-info {
            color: #E0E0E0;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }

        .contact-item i {
            color: #FFD100;
            margin-right: 10px;
            width: 20px;
        }

        .contact-item a {
            color: #E0E0E0;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .contact-item a:hover {
            color: #FFD100;
        }

        .map-container {
            margin-top: 15px;
        }

        .map-iframe {
            width: 100%;
            height: 250px;
            border: 0;
            border-radius: 10px;
        }

        .footer-copyright {
            background-color: #FFD100;
            padding: 15px 0;
            text-align: center;
        }

        .copyright-text p {
            color: #09146A;
            margin: 0;
            font-size: 14px;
            font-weight: 500;
        }

        /* Responsive */
        @media (max-width: 992px) {
            .footer-left {
                flex: 0 0 100%;
                margin-bottom: 30px;
            }

            .footer-right {
                flex: 0 0 100%;
            }

            .footer-about {
                flex: 0 0 100%;
                margin-bottom: 30px;
                padding-right: 0;
            }

            .footer-services {
                flex: 0 0 100%;
            }
        }

        @media (max-width: 768px) {
            .footer-services {
                flex-direction: column;
            }

            .service-column {
                flex: 0 0 100%;
                margin-bottom: 25px;
            }

            .footer-section {
                padding: 40px 0 0;
            }
        }

        @media (max-width: 576px) {
            .footer-main {
                padding-bottom: 30px;
            }

            .footer-content {
                padding: 0 15px;
            }
        }
    </style>

    <!-- Footer Section Start -->
    <footer class="footer-section">
        <div class="footer-content">
            <div class="footer-main">
                <!-- Bagian Kiri (Logo, Layanan) -->
                <div class="footer-left">
                    <!-- Logo & About Section -->
                    <div class="footer-about">
                        <div class="footer-logo-container">
                            <img src="/assets/abgblora/logo/logokabupatenblora.png" alt="Logo Kabupaten Blora" class="footer-logo">
                            <img src="/assets/abgblora/logo/logopupr.png" alt="Logo PUPR" class="footer-logo">
                        </div>
                        <div class="footer-title">
                            <h3>
                                <span class="abg-text">ABG</span>
                                <span class="blora-text">BLORA</span>
                            </h3>
                        </div>
                        <div class="subtitle">BANGUNAN GEDUNG</div>
                        <p>Dinas Pekerjaan Umum Dan Penataan Ruang Kabupaten Blora Provinsi Jawa Tengah</p>
                    </div>

                    <!-- Services Section -->
                    <div class="footer-services">
                        <div class="service-column">
                            <h4 class="footer-widget-title">Layanan Kami</h4>
                            <div class="footer-widget">
                                <ul class="link">
                                    <li><a href="#">Persetujuan Bangunan Gedung (PBG)</a></li>
                                    <li><a href="#">Sertifikat Laik Fungsi (SLF)</a></li>
                                    <li><a href="#">Tracking PBG</a></li>
                                    <li><a href="#">Pendataan Bangunan Gedung</a></li>
                                </ul>
                            </div>
                        </div>

                        <div class="service-column">
                            <h4 class="footer-widget-title">Layanan Tambahan</h4>
                            <div class="footer-widget">
                                <ul class="link">
                                    <li><a href="#">Bantuan Teknis</a></li>
                                    <li><a href="#">Sosialisasi & Pelatihan</a></li>
                                    <li><a href="#">Keterangan Rencana Kota (KRK)</a></li>
                                    <li><a href="#">Penilik Bangunan Gedung</a></li>
                                    <li><a href="#">SPPD</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bagian Kanan (Kontak & Peta) -->
                <div class="footer-right">
                    <!-- Kontak Kami -->
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">
                            <i class="fas fa-phone-alt" style="margin-right: 8px;"></i>Kontak Kami
                        </h4>
                        <div class="contact-info">
                            <p>Jl. Nusantara No.62, Jetis, Kauman, Kec. Blora, Kabupaten Blora 58214, Jawa Tengah</p>
                        </div>
                        <div class="contact-item">
                            <i class="fa-solid fa-envelope"></i>
                            <a href="mailto:kontraktor@masjakidpuprblora.co.id">kontraktor@masjakidpuprblora.co.id</a>
                        </div>
                    </div>

                    <!-- Google Maps -->
                    <div class="footer-widget">
                        <h4 class="footer-widget-title">
                            <i class="fas fa-map-marker-alt" style="margin-right: 8px;"></i>Lokasi Kami
                        </h4>
                        <div class="map-container">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3958.523764685145!2d111.4188524747965!3d-7.179069792829058!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7712b6c5e5f9d7%3A0x98b939fa9f2c6b88!2sJl.%20Nusantara%20No.62%2C%20Jetis%2C%20Kauman%2C%20Kec.%20Blora%2C%20Kabupaten%20Blora%2C%20Jawa%20Tengah%2058214!5e0!3m2!1sen!2sid!4v1710000000000"
                                class="map-iframe" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade">
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Copyright Section (Terpisah) -->
    <div class="footer-copyright">
        <div class="footer-content">
            <div class="copyright-text">
                <p>© Dinas Pekerjaan Umum Dan Penataan Ruang Kabupaten Blora 58214 Provinsi Jawa Tengah | 2025</p>
            </div>
        </div>
    </div>
    <!-- Footer Section End -->
</body>
</html>
