<!-- CSS Libraries -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
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

    .main-container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        margin: 20px auto;
        padding: 20px;
        max-width: 1200px;
    }

    .header-banner {
        background: linear-gradient(to bottom, #7de3f1, #ffffff);
        padding: 20px 0;
    }

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
        border-bottom: 1px solid #eee;
        padding-bottom: 10px;
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

    .contact-section {
        background-color: #4041DA;
        color: white;
        padding: 20px;
        border-radius: 10px;
        margin: 20px 0;
    }
</style>

<body>
@include('frontend.abgblora.00_fiturmenu.02_header')
@include('frontend.abgblora.00_fiturmenu.05_menunavigasweb')
@include('backend.00_administrator.00_baganterpisah.09_button')

<section class="header-banner" style="margin-top:65px;">
    <div class="container" style="padding-top: 50px;"></div>
</section>

<div class="main-container">
    <section id="details" class="container-fluid">
        <div class="mb-4">
            <div class="w-full bg-dark text-white p-3 rounded">
                <img src="/assets/new/icons/story.svg" alt="icon" style="width: 20px; height: 20px; margin-right: 10px;">
                <span class="fw-bold">Informasi Permohonan PBG SLF Bangunan Gedung</span>
            </div>
        </div>

        @include('frontend.abgblora.01_pbgslf.00_informasi.fiturmenupbg')

        <div class="card">
            <div class="card-img-container">
                <img src="/assets/android/pbgslf/PBG_FUNGSI_PRASARANA.png" alt="PBG Fungsi Prasarana">
            </div>

            <div class="content-section">
                <h2 class="font-bold">Persetujuan Bangunan Gedung (PBG) - Fungsi Prasarana</h2>
                <p>
                    Persetujuan Bangunan Gedung (PBG) adalah dokumen resmi yang dibutuhkan untuk mendirikan bangunan prasarana seperti menara telekomunikasi. Dokumen ini memastikan bahwa pembangunan sesuai ketentuan teknis, tata ruang, dan lingkungan yang berlaku.
                </p>

                <h5 class="font-bold">Persyaratan Dokumen:</h5>
                <ol>
                    <li><span class="font-bold">Data Tanah:</span>
                        <ul>
                            <li>Sertifikat tanah</li>
                            <li>Izin Pemanfaatan Tanah (jika nama pemohon berbeda dengan sertifikat)</li>
                            <li>Gambar kontur tanah dan sondir (khusus bangunan tidak sederhana)</li>
                        </ul>
                    </li>
                    <li><span class="font-bold">Data Umum:</span>
                        <ul>
                            <li>KTP / Profil Perusahaan</li>
                            <li>NIB (OSS)</li>
                            <li>KRK / KKPR</li>
                            <li>Dokumen lingkungan (SPPL / OSS / UKL/UPL / AMDAL)</li>
                            <li>Data penyedia jasa konstruksi (SBU / Arsitek berlisensi)</li>
                            <li>Verifikasi mandiri / PKKPR otomatis (untuk kegiatan usaha dari FPR Kabupaten Blora)</li>
                            <li>KKOP (Ketentuan Keselamatan Operasi Penerbangan)</li>
                            <li>Persetujuan warga sekitar menara (diketahui lurah/kades, disertai dokumentasi & berita acara sosialisasi)</li>
                        </ul>
                    </li>
                    <li><span class="font-bold">Data Teknis Arsitektur:</span>
                        <ul>
                            <li>Gambar dan perhitungan teknis untuk prasarana</li>
                        </ul>
                    </li>
                </ol>

                <h5 class="font-bold">Tahapan Pengurusan:</h5>
                <ol>
                    <li>Menyiapkan dokumen tanah, KRK/KKPR, dan dokumen lingkungan</li>
                    <li>Mendaftar dan mengunggah dokumen ke <a href="https://simbg.pu.go.id" target="_blank">https://simbg.pu.go.id</a></li>
                    <li>Verifikasi oleh operator dinas teknis</li>
                    <li>Penjadwalan konsultasi permohonan</li>
                    <li>Konsultasi bersama TPA/TPT</li>
                    <li>Revisi dokumen sesuai masukan TPA/TPT</li>
                    <li>TPA/TPT menyetujui dokumen perencanaan</li>
                    <li>Unggah dokumen final, validasi, dan perhitungan retribusi</li>
                    <li>Pembayaran retribusi melalui bank persepsi atau mobile banking</li>
                    <li>Penerbitan dokumen PBG oleh DPMPTSP</li>
                </ol>
            </div>
        </div>

        <div class="contact-section">
            <h5 class="fw-semibold mb-2"><i class="bi bi-headset"></i> Layanan dan Pengaduan</h5>
            <p class="mb-1">Untuk permohonan bantuan, pengaduan, saran, atau masukan terkait pelayanan kami:</p>
            <a href="mailto:bid.bangunan.gedung.blora@gmail.com" class="text-white text-decoration-underline">
                <i class="bi bi-envelope"></i> bid.bangunan.gedung.blora@gmail.com
            </a>
        </div>
    </section>
</div>

@include('frontend.abgblora.00_fiturmenu.03_footer')
@include('frontend.abgblora.00_fiturmenu.04_footer')

<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
