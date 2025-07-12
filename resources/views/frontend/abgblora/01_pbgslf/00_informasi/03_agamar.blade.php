
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
                                                <img src="/assets/android/pbgslf/PBG_FUNGSI_KEAGAMAAN.png" alt="PBG Fungsi Hunian">
                                            </div>
<div class="flex flex-col gap-4 mt-4 text-[15px] text-neutral-800">

  <!-- Judul -->
  <p class="font-bold text-[16px] leading-[24px]">
    Persetujuan Bangunan Gedung (PBG) - Fungsi Keagamaan
  </p>

  <!-- Deskripsi -->
  <p class="text-justify">
    Persetujuan Bangunan Gedung (PBG) adalah dokumen resmi yang dibutuhkan sebelum mendirikan bangunan. Untuk bangunan fungsi keagamaan seperti masjid, gereja, vihara, pura, dan lainnya, PBG diperlukan agar pembangunan sesuai dengan ketentuan teknis, lingkungan, dan tata ruang yang berlaku.
  </p>

  <!-- Klasifikasi -->
  <p class="font-bold leading-[22px]">Klasifikasi Bangunan Keagamaan:</p>
  <ul class="list-disc ml-5 text-justify space-y-1">
    <li><span class="font-bold">Sederhana</span>:
      <ul class="list-disc ml-5">
        <li>1 lantai &lt; 72 m²</li>
        <li>2 lantai &lt; 90 m²</li>
      </ul>
    </li>
    <li><span class="font-bold">Tidak Sederhana</span>:
      <ul class="list-disc ml-5">
        <li>1 lantai ≥ 72 m²</li>
        <li>2 lantai ≥ 90 m²</li>
      </ul>
    </li>
  </ul>

  <!-- Persyaratan Dokumen -->
  <p class="font-bold leading-[22px]">Persyaratan Dokumen:</p>
  <ol class="list-decimal ml-5 space-y-2 text-justify">
    <li>
      <span class="font-bold">Data Tanah:</span>
      <ul class="list-disc ml-5">
        <li>Sertifikat tanah</li>
        <li>Izin Pemanfaatan Tanah (jika nama pemohon tidak sesuai dengan sertifikat)</li>
        <li>Gambar kontur tanah dan sondir (untuk bangunan tidak sederhana)</li>
      </ul>
    </li>
    <li>
      <span class="font-bold">Data Umum:</span>
      <ul class="list-disc ml-5">
        <li>KTP/KITAS (Ketua Yayasan/Ormas/Lembaga)</li>
        <li>KRK/KKPR</li>
        <li>Dokumen lingkungan (SPPL atau dokumen dari DPMPTSP)</li>
        <li>Data penyedia jasa konstruksi (SBU/Arsitek bersertifikat)</li>
        <li>Surat Rekomendasi FKUB (Forum Kerukunan Umat Beragama)</li>
      </ul>
    </li>
    <li>
      <span class="font-bold">Data Teknis Arsitektur:</span>
      <ul class="list-disc ml-5">
        <li>Konsep arsitektur</li>
        <li>Gambar situasi, rencana tapak, potongan, tampak, dan detail</li>
        <li>Rencana tata ruang dalam & luar</li>
        <li>Spesifikasi teknis arsitektur</li>
        <li>Rekomendasi peta banjir (jika diperlukan)</li>
      </ul>
    </li>
    <li>
      <span class="font-bold">Data Teknis Struktur:</span>
      <ul class="list-disc ml-5">
        <li>Perhitungan struktur (untuk bangunan tidak sederhana)</li>
        <li>Gambar detail struktur</li>
        <li>Spesifikasi teknis struktur</li>
      </ul>
    </li>
    <li>
      <span class="font-bold">Data Teknis MEP:</span>
      <ul class="list-disc ml-5">
        <li>Gambar sistem jaringan listrik</li>
        <li>Gambar sistem jaringan sanitasi</li>
        <li>Gambar sistem proteksi kebakaran</li>
        <li>Data teknis MEP lainnya</li>
      </ul>
    </li>
  </ol>

  <!-- Tahapan Pengurusan -->
  <p class="font-bold leading-[22px] mt-3">Tahapan Pengurusan:</p>
  <ol class="list-decimal ml-5 text-justify space-y-1">
    <li>Menyiapkan dokumen tanah, KRK/KKPR, dan dokumen lingkungan</li>
    <li>Mendaftar, membuat permohonan, dan mengunggah dokumen ke <a href="https://simbg.pu.go.id" target="_blank" class="text-blue-600 underline">https://simbg.pu.go.id</a></li>
    <li>Menindaklanjuti hasil verifikasi operator dinas teknis</li>
    <li>Penjadwalan konsultasi permohonan</li>
    <li>Melakukan konsultasi bersama TPA/TPT</li>
    <li>Merevisi dokumen sesuai masukan dari TPA/TPT</li>
    <li>Dokumen disetujui oleh TPA/TPT</li>
    <li>Unggah dokumen final, perhitungan retribusi, dan validasi teknis</li>
    <li>Pembayaran retribusi via bank persepsi atau mobile banking</li>
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
