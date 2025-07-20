
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
                                            <div class="card-img-container"
                                              class="card-img-top img-fluid"
        alt="thumbnail"
        style="object-fit: cover; width: 100%; height: auto;">
                                                <img src="/assets/android/pbgslf/SLF_MENARA_TELEKOMUNIKASI.png" alt="PBG Fungsi Prasarana">
                                            </div>



                                            <!-- Tambahkan ini di bagian <head> -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<!-- Tambahkan link Poppins jika belum -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<!-- Konten PBG Fungsi Prasarana -->
<div style="max-width: 900px; margin: 40px auto; padding: 30px; background: #fff; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); font-family: 'Poppins', sans-serif; font-size: 15px; color: #333; line-height: 1.8;">

  <!-- Judul -->
  <h2 style="font-size: 20px; font-weight: 600; margin-bottom: 20px; color: #1a1a1a;">
    Sertifikat Laik Fungsi (SLF) – Fungsi Menara Telekomunikasi
  </h2>

  <!-- Persyaratan -->
  <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 10px;">1. Persyaratan</h3>

  <p><strong>1. DATA TANAH:</strong></p>
  <ul style="margin-left: 20px;">
    <li>1.1 Dokumen tanah (Sertifikat Tanah)</li>
    <li>1.2 Izin Pemanfaatan tanah (Apabila nama pemohon dengan nama yang disertifikat tidak sama)</li>
    <li>1.3 Gambar Kontur Tanah dan Sondir (Khusus Bangunan tidak sederhana)</li>
  </ul>

  <p><strong>2. DATA UMUM:</strong></p>
  <ul style="margin-left: 20px;">
    <li>2.1 KTP / Profil Perusahaan, NIB (OSS)</li>
    <li>2.2 KRK / KKPR</li>
    <li>2.3 Dokumen Lingkungan sesuai peraturan perundangan (SPPL (OSS), UKL/UPL, AMDAL)</li>
    <li>2.4 Data Penyedia Jasa Perencana Konstruksi: Badan Usaha (SBU) / Arsitek Berlisensi</li>
    <li>2.5 Verifikasi pernyataan mandiri / PKKPR otomatis dari FPR Kab. Blora</li>
    <li>2.6 KKOP (Ketentuan Keselamatan Operasi Penerbangan)</li>
    <li>2.7 Persetujuan warga sekitar yang diketahui Lurah/Kades, dokumentasi & berita acara sosialisasi</li>
  </ul>

  <p><strong>3. DATA TEKNIS ARSITEKTUR:</strong></p>
  <ul style="margin-left: 20px;">
    <li>3.1 Gambar dan perhitungan teknis untuk prasarana</li>
  </ul>

  <p><strong>4. KETENTUAN TEKNIS STRUKTUR:</strong></p>
  <ul style="margin-left: 20px;">
    <li>4.1 Perhitungan teknis sederhana dan gambar rencana struktur lengkap</li>
    <li>4.2 Gambar detail struktur</li>
    <li>4.3 Spesifikasi teknis umum dan khusus (jenis, tipe, karakteristik material struktural)</li>
  </ul>

  <p><strong>5. DATA TEKNIS MEP:</strong></p>
  <ul style="margin-left: 20px;">
    <li>5.1 Laporan Pemeriksaan Kelaikan Fungsi Bangunan Gedung</li>
    <li>5.2 Laporan Pemeriksaan Berkala (khusus bangunan kepentingan umum)</li>
    <li>5.3 Gambar as built drawing bangunan gedung</li>
    <li>5.4 Data tenaga ahli pengkaji teknis bersertifikat</li>
  </ul>

  <!-- Tahapan -->
  <h3 style="font-size: 16px; font-weight: 600; margin-top: 30px; margin-bottom: 10px;">2. Tahapan Pengurusan</h3>
  <ol style="margin-left: 20px;">
    <li>1. Menyiapkan dokumen tanah, KRK/KKPR, dan dokumen lingkungan</li>
    <li>2. Mendaftar, membuat permohonan, dan mengunggah dokumen di website <a href="https://simbg.pu.go.id" target="_blank" style="color: #007bff;">https://simbg.pu.go.id</a></li>
    <li>3. Menindaklanjuti hasil verifikasi operator dinas teknis</li>
    <li>4. Penjadwalan konsultasi permohonan</li>
    <li>5. Melakukan konsultasi bersama TPA/TPT</li>
    <li>6. Merevisi dokumen sesuai masukan dan saran TPA/TPT</li>
    <li>7. Merevisi hingga disetujui TPA/TPT</li>
    <li>8. Mengunggah berkas final, validasi teknis, dan perhitungan retribusi</li>
    <li>9. Pembayaran retribusi melalui bank persepsi / mobile banking</li>
    <li>10. Penerbitan dokumen PBG di DPMPTSP & SLF di DPMPTSP</li>
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
