
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
                                                <img src="/assets/android/pbgslf/PBG_FUNGSI_SOSIAL_BUDAYA.png" alt="PBG Fungsi Prasarana">
                                            </div>



                                            <!-- Tambahkan ini di bagian <head> -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<!-- Tambahkan link Poppins jika belum -->
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

<!-- Konten PBG Fungsi Prasarana -->
<div style="max-width: 900px; margin: 40px auto; padding: 30px; background: #fff; border-radius: 12px; box-shadow: 0 4px 10px rgba(0,0,0,0.08); font-family: 'Poppins', sans-serif; font-size: 15px; color: #333; line-height: 1.8;">

  <!-- Judul -->
  <h2 style="font-size: 20px; font-weight: 600; margin-bottom: 20px; color: #1a1a1a;">
    Persetujuan Bangunan Gedung (PBG) - Fungsi Sosial Budaya
  </h2>

  <!-- Poster Gambar -->
  <div style="text-align: center; margin-bottom: 30px;">
    <label style="display: block; font-weight: 600; margin-bottom: 10px;">Poster Gambar:</label>
    <img src="poster.jpg" alt="Poster Gambar" style="max-width: 100%; border-radius: 8px; box-shadow: 0 2px 8px rgba(0,0,0,0.1);">
  </div>

  <!-- Deskripsi -->
  <p style="text-align: justify; margin-bottom: 30px;">
    Persetujuan Bangunan Gedung (PBG) adalah dokumen legal yang wajib dimiliki sebelum pembangunan menara telekomunikasi. Dokumen ini memastikan bahwa pembangunan sesuai dengan aspek teknis, ketentuan tata ruang, keselamatan lingkungan, serta mendapat persetujuan masyarakat sekitar.
  </p>

  <!-- Persyaratan -->
  <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 10px;">Persyaratan Dokumen:</h3>
  <p style="margin-bottom: 10px;"><strong>1. Data Tanah:</strong></p>
  <ul style="margin-left: 25px; margin-bottom: 15px;">
    <li>Sertifikat tanah</li>
    <li>Izin Pemanfaatan Tanah (apabila nama pemohon berbeda dengan sertifikat)</li>
    <li>Gambar kontur tanah dan sondir (khusus bangunan tidak sederhana)</li>
  </ul>

  <p style="margin-bottom: 10px;"><strong>2. Data Umum:</strong></p>
  <ul style="margin-left: 25px; margin-bottom: 15px;">
    <li>KTP / Profil Perusahaan, NIB (OSS)</li>
    <li>KRK / KKPR</li>
    <li>Dokumen lingkungan sesuai peraturan (SPPL, OSS, UKL/UPL, AMDAL)</li>
    <li>Data penyedia jasa konstruksi: Badan Usaha (SBU) / Arsitek berlisensi</li>
    <li>Verifikasi pernyataan mandiri atau PKKPR otomatis yang diterbitkan FPR Kab. Blora</li>
    <li>KKOP (Ketentuan Keselamatan Operasi Penerbangan)</li>
    <li>Persetujuan warga sekitar menara yang diketahui lurah/kepala desa, disertai dokumentasi & berita acara sosialisasi</li>
  </ul>

  <p style="margin-bottom: 10px;"><strong>3. Data Teknis Arsitektur:</strong></p>
  <ul style="margin-left: 25px; margin-bottom: 30px;">
    <li>Gambar dan perhitungan teknis bangunan prasarana</li>
  </ul>

  <!-- Tahapan -->
  <h3 style="font-size: 16px; font-weight: 600; margin-bottom: 10px;">Tahapan Pengurusan:</h3>
  <ol style="margin-left: 20px;">
    <li>Menyiapkan dokumen tanah, KRK/KKPR, dan dokumen lingkungan</li>
    <li>Mendaftar, membuat permohonan, dan mengunggah dokumen ke https://simbg.pu.go.id</li>
    <li>Menindaklanjuti hasil verifikasi operator Dinas Teknis</li>
    <li>Penjadwalan konsultasi permohonan</li>
    <li>Melakukan konsultasi bersama TPA/TPT</li>
    <li>Merevisi dokumen sesuai masukan dan saran teknis TPA/TPT</li>
    <li>TPA/TPT menyetujui dokumen perencanaan</li>
    <li>Pengunggahan dokumen final, validasi teknis, dan perhitungan retribusi</li>
    <li>Pembayaran retribusi melalui bank persepsi atau mobile banking</li>
    <li>Penerbitan dokumen PBG oleh DPMPTSP</li>
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
