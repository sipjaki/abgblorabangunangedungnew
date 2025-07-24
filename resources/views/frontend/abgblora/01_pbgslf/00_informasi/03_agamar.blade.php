<!-- CSS Libraries -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
    /* Base Styles */
    body {
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        line-height: 1.6;
        color: #333;
        background: linear-gradient(to bottom, #7de3f1, #ffffff);
        margin: 0;
        padding: 0;
        min-height: 100vh;
    }

    /* Main Content Container */
    .main-container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        margin: 20px auto;
        padding: 20px;
        max-width: 1200px;
    }

    /* Header Styles */
    .header-banner {
        background: linear-gradient(to bottom, #7de3f1, #ffffff);
        width: 100%;
        margin: 0;
        padding: 20px 0;
        position: relative;
    }

    /* Card Styles */
    .card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        padding: 20px;
        margin-bottom: 20px;
        border: none;
    }

    .card-title {
        color: #002366;
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
    }

    .card-img-container {
        width: 100%;
        height: 300px;
        overflow: hidden;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .card-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .card-img-container img:hover {
        transform: scale(1.03);
    }

    /* Content Styles */
    .content-section {
        font-size: 15px;
        color: #333;
    }

    .content-section p {
        margin-bottom: 12px;
        text-align: justify;
    }

    .content-section ul,
    .content-section ol {
        margin-bottom: 12px;
        padding-left: 20px;
    }

    .content-section li {
        margin-bottom: 8px;
    }

    .content-section .font-bold {
        font-weight: 600;
        color: #002366;
    }

    /* Contact Section */
    .contact-section {
        background-color: #4041DA;
        color: white;
        padding: 20px;
        border-radius: 10px;
        margin: 20px 0;
    }

    /* Information Content Styles */
    .info-container {
        max-width: 900px;
        margin: 40px auto;
        padding: 30px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        font-family: 'Poppins', sans-serif;
        font-size: 15px;
        color: #333;
        line-height: 1.8;
    }

    .info-title {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 20px;
        color: #1a1a1a;
    }

    .info-subtitle {
        font-size: 16px;
        font-weight: 600;
        margin: 25px 0 10px;
        color: #002366;
        padding-left: 10px;
        border-left: 4px solid #4041DA;
    }

    .info-list {
        margin-left: 20px;
        margin-bottom: 30px;
    }

    .info-list li {
        margin-bottom: 10px;
        position: relative;
        padding-left: 25px;
    }

    .info-list li:before {
        content: "";
        position: absolute;
        left: 0;
        top: 8px;
        width: 8px;
        height: 8px;
        background-color: #4041DA;
        border-radius: 50%;
    }

    .info-list ol {
        counter-reset: item;
        padding-left: 25px;
    }

    .info-list ol li {
        counter-increment: item;
        margin-bottom: 10px;
    }

    .info-list ol li:before {
        content: counter(item) ".";
        position: absolute;
        left: 0;
        font-weight: bold;
        color: #4041DA;
        background: none;
        width: auto;
        height: auto;
    }

    .info-link {
        color: #007bff;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .info-link:hover {
        color: #0056b3;
        text-decoration: underline;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .card-img-container {
            height: 200px;
        }

        .main-container {
            margin: 10px;
            padding: 15px;
        }

        .content-section {
            font-size: 14px;
        }

        .info-container {
            padding: 20px;
            margin: 20px auto;
        }

        .info-title {
            font-size: 18px;
        }

        .info-subtitle {
            font-size: 15px;
        }
    }
</style>
</head>
<body>

    <!-- Header Includes -->
    @include('frontend.abgblora.00_fiturmenu.02_header')
    @include('frontend.abgblora.00_fiturmenu.05_menunavigasweb')
    @include('backend.00_administrator.00_baganterpisah.09_button')

    <!-- Banner Section -->
    <section class="header-banner" style="margin-top:65px;">
        <div class="container max-w-[1130px] mx-auto" style="padding-top: 50px;">
            <div class="flex items-center gap-[20px]">
                <!-- Content here -->
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <div class="main-container">
        <section id="details" class="container-fluid flex flex-col sm:flex-row gap-5">
            <div class="flex flex-col gap-5 w-full">
                <div class="flex flex-col gap-5 p-5 rounded-[20px] w-full">
                    <div class="w-full bg-[#030303] flex items-center gap-[10px] p-[10px_14px] rounded-xl">
                        <div class="w-5 h-5 flex shrink-0">
                            <img src="/assets/new/icons/story.svg" alt="icon">
                        </div>
                        <p class="text-white font-normal text-sm">
                            <span class="font-bold">Informasi Permohonan PBG SLF Bangunan Gedung </span>
                        </p>
                    </div>

                    <!-- Include Menu -->
                    @include('frontend.abgblora.01_pbgslf.00_informasi.fiturmenupbg')

                    <!-- Information Cards -->
                    <div class="container-fluid px-0">
                        <!-- Lampiran Section -->
                        <div class="mb-5">
                            <h6 class="fw-semibold mb-4" style="font-size: 18px;">
                                <i class="bi bi-paperclip text-primary"></i> Lampiran Informasi
                            </h6>

                            <div class="row g-4">
                                <div class="col-md-12">
                                    <a href="#" class="text-decoration-none">
                                        <div class="card shadow-sm border-0 h-100">
                                            <div class="card-img-container">
                                                <img src="/assets/android/pbgslf/PBG_FUNGSI_KEAGAMAAN.png" alt="PBG Fungsi Keagamaan" class="card-img-top img-fluid" style="object-fit: cover; width: 100%; height: auto;">
                                            </div>

                                            <div class="info-container">
                                                <!-- Judul -->
                                                <h2 class="info-title">
                                                    Persetujuan Bangunan Gedung (PBG) - Fungsi Keagamaan
                                                </h2>

                                                <!-- Deskripsi -->
                                                <p style="text-align: justify; margin-bottom: 30px;">
                                                    Persetujuan Bangunan Gedung (PBG) adalah dokumen resmi yang dibutuhkan sebelum mendirikan bangunan. Untuk bangunan fungsi keagamaan seperti masjid, gereja, vihara, pura, dan lainnya, PBG diperlukan agar pembangunan sesuai dengan ketentuan teknis, lingkungan, dan tata ruang yang berlaku.
                                                </p>

                                                <!-- Klasifikasi -->
                                                <h3 class="info-subtitle">Klasifikasi Bangunan Keagamaan:</h3>
                                                <ul class="info-list">
                                                    <li><strong>Sederhana:</strong>
                                                        <ol>
                                                            <li>1 lantai &lt; 72 m²</li>
                                                            <li>2 lantai &lt; 90 m²</li>
                                                        </ol>
                                                    </li>
                                                    <li><strong>Tidak Sederhana:</strong>
                                                        <ol>
                                                            <li>1 lantai ≥ 72 m²</li>
                                                            <li>2 lantai ≥ 90 m²</li>
                                                        </ol>
                                                    </li>
                                                </ul>

                                                <!-- Persyaratan -->
                                                <h3 class="info-subtitle">Persyaratan Dokumen:</h3>
                                                <ol class="info-list">
                                                    <li><strong>Data Tanah:</strong>
                                                        <ol>
                                                            <li>Sertifikat tanah</li>
                                                            <li>Izin Pemanfaatan Tanah (jika nama pemohon tidak sesuai)</li>
                                                            <li>Gambar kontur tanah & sondir (bangunan tidak sederhana)</li>
                                                        </ol>
                                                    </li>
                                                    <li><strong>Data Umum:</strong>
                                                        <ol>
                                                            <li>KTP/KITAS pemohon</li>
                                                            <li>KRK/KKPR</li>
                                                            <li>SPPL/dokumen lingkungan (DPMPTSP)</li>
                                                            <li>SBU/Arsitek bersertifikat</li>
                                                            <li>Surat Rekomendasi FKUB</li>
                                                        </ol>
                                                    </li>
                                                    <li><strong>Data Teknis Arsitektur:</strong>
                                                        <ol>
                                                            <li>Konsep & gambar lengkap (situasi, potongan, tampak)</li>
                                                            <li>Detail tata ruang dalam & luar</li>
                                                            <li>Spesifikasi teknis & peta banjir (jika perlu)</li>
                                                        </ol>
                                                    </li>
                                                    <li><strong>Data Teknis Struktur:</strong>
                                                        <ol>
                                                            <li>Perhitungan struktur</li>
                                                            <li>Gambar detail & spesifikasi teknis struktur</li>
                                                        </ol>
                                                    </li>
                                                    <li><strong>Data Teknis MEP:</strong>
                                                        <ol>
                                                            <li>Jaringan listrik & sanitasi</li>
                                                            <li>Proteksi kebakaran & sistem MEP lainnya</li>
                                                        </ol>
                                                    </li>
                                                </ol>

                                                <!-- Tahapan -->
                                                <h3 class="info-subtitle">Tahapan Pengurusan:</h3>
                                                <ol class="info-list">
                                                    <li>Menyiapkan dokumen tanah, KRK/KKPR, & dokumen lingkungan</li>
                                                    <li>Mendaftar & unggah dokumen ke <a href="https://simbg.pu.go.id" target="_blank" class="info-link">simbg.pu.go.id</a></li>
                                                    <li>Verifikasi oleh operator Dinas Teknis</li>
                                                    <li>Penjadwalan konsultasi</li>
                                                    <li>Konsultasi bersama TPA/TPT</li>
                                                    <li>Revisi dokumen sesuai arahan</li>
                                                    <li>Dokumen disetujui TPA/TPT</li>
                                                    <li>Unggah final, validasi & retribusi</li>
                                                    <li>Pembayaran retribusi</li>
                                                    <li>Penerbitan PBG oleh DPMPTSP</li>
                                                </ol>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Section -->
                        <div class="contact-section">
                            <h5 class="fw-semibold mb-2"><i class="bi bi-headset"></i> Layanan dan Pengaduan</h5>
                            <p class="mb-1">Untuk permohonan bantuan, pengaduan, saran, atau masukan terkait pelayanan kami:</p>
                            <a href="mailto:bid.bangunan.gedung.blora@gmail.com" class="text-white text-decoration-underline">
                                <i class="bi bi-envelope"></i> bid.bangunan.gedung.blora@gmail.com
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer Includes -->
    @include('frontend.abgblora.00_fiturmenu.03_footer')
    @include('frontend.abgblora.00_fiturmenu.04_footer')

    <!-- Back to Top Button -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
