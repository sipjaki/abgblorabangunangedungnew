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
                        <h3 style="color: white;">
                            <span class="abg-text" style="color: white;">ABG</span>
                            <span class="blora-text" style="color: white;">BLORA</span>
                        </h3>
                    </div>
                    <div class="subtitle">BANGUNAN GEDUNG</div>
                    <p style="color: white;">Dinas Pekerjaan Umum Dan Penataan Ruang <br> Kabupaten Blora Provinsi Jawa Tengah</p>
                </div>

                <!-- Services Section -->
                <div class="footer-services">
                    <div class="service-column">
                        <h4 class="footer-widget-title" style="color: white;">
                            <i class="bi bi-gear-fill" style="margin-right: 6px;"></i>
                            Layanan Kami
                        </h4>
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
                        <h4 class="footer-widget-title" style="color: white;">
                            <i class="bi bi-file-earmark-text-fill" style="margin-right: 6px;"></i>
                            Jenis Permohonan
                        </h4>
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
                <div class="footer-widget">
                    <h4 class="footer-widget-title" style="color: white;">
                        <i class="bi bi-telephone-fill" style="margin-right: 6px;"></i> Kontak Kami
                    </h4>
                    <div class="contact-info">
                        <p>Jl. Nusantara No.62, Jetis, Kauman, Kec. Blora, Kabupaten Blora 58214, Jawa Tengah</p>
                    </div>
                    <div class="contact-item">
                        <i class="bi bi-envelope-fill"></i>
                        <a href="mailto:bid.bangunan.gedung.blora@gmail.com">bid.bangunan.gedung.blora@gmail.com</a>
                    </div>
                </div>

                <!-- Google Maps -->
                <div class="footer-widget">
                    <h4 class="footer-widget-title" style="color: white;">
                        <i class="bi bi-geo-alt-fill" style="margin-right: 6px;"></i> Lokasi Kami
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

    <!-- Copyright -->
    <div class="footer-copyright">
        © Dinas Pekerjaan Umum Dan Penataan Ruang Kabupaten Blora 58214 Provinsi Jawa Tengah | 2025
    </div>
</footer>

<style>
* {
    font-family: 'Poppins', sans-serif;
    box-sizing: border-box;
}

.footer-section {
    background-color: navy;
    color: white;
    padding: 40px 20px 20px 20px;
}

.footer-content {
    max-width: 1200px;
    margin: 0 auto;
}

.footer-main {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    gap: 30px;
}

.footer-left,
.footer-right {
    flex: 1 1 300px;
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.footer-logo-container {
    display: flex;
    gap: 15px;
    align-items: center;
    flex-wrap: nowrap;
}

.footer-logo-container img {
    height: 50px;
    width: auto;
}

.footer-title h3 {
    margin: 0;
    font-size: 1.5rem;
}

.subtitle {
    font-size: 0.9rem;
    margin-bottom: 10px;
    color: #fff;
}

.footer-services {
    display: flex;
    gap: 40px;
    flex-wrap: wrap;
}

.service-column {
    flex: 1 1 200px;
}

.footer-widget-title {
    font-size: 1.1rem;
    margin-bottom: 10px;
    font-weight: 600;
}

.footer-widget ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-widget ul li {
    margin-bottom: 6px;
}

.footer-widget ul li a {
    text-decoration: none;
    color: white;
    font-size: 0.9rem;
    transition: color 0.3s;
}

.footer-widget ul li a:hover {
    color: #ffd100;
}

.contact-info p, .contact-item a {
    font-size: 0.9rem;
    color: white;
    text-decoration: none;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-top: 5px;
}

.map-container {
    width: 100%;
    height: 200px;
    overflow: hidden;
    border-radius: 8px;
}

.map-iframe {
    width: 100%;
    height: 100%;
    border: 0;
}

/* Copyright */
.footer-copyright {
    text-align: center;
    background-color: #ffd100;
    color: black;
    padding: 12px 20px;
    font-size: 0.9rem;
}

/* Responsif */
@media (max-width: 768px) {
    .footer-main {
        flex-direction: column;
    }

    .footer-services {
        flex-direction: column;
    }

    .footer-logo-container {
        justify-content: flex-start;
    }
}
</style>
