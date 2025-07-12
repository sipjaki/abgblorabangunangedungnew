<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
    /* Base Styles */
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(to bottom, #7de3f1, #ffffff);
        margin: 0;
        padding: 0;
        min-height: 100vh;
    }

    .content-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Header Styles */
    .page-header {
        padding: 20px 0;
        margin-bottom: 30px;
    }

    /* Card Styles */
    .info-card {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
        padding: 25px;
        margin-bottom: 30px;
    }

    .card-title {
        color: #002366;
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #e1e5ea;
        position: relative;
    }

    .card-title:after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 80px;
        height: 2px;
        background: #3A7CA5;
    }

    /* Process Steps */
    .process-steps {
        counter-reset: step;
        padding-left: 0;
    }

    .step {
        position: relative;
        padding: 1.75rem 1.5rem 1.75rem 5.5rem;
        margin-bottom: 1rem;
        background: rgba(58, 123, 181, 0.05);
        border-radius: 8px;
        counter-increment: step;
        transition: all 0.3s ease;
    }

    .step:hover {
        background: rgba(58, 123, 181, 0.1);
        transform: translateX(5px);
    }

    .step::before {
        content: counter(step);
        position: absolute;
        left: 1.5rem;
        top: 50%;
        transform: translateY(-50%);
        background: #3A7CA5;
        color: white;
        width: 3rem;
        height: 3rem;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 1.2rem;
    }

    /* Contact Section */
    .contact-section {
        background: linear-gradient(135deg, #002366, #1a4b8c);
        color: white;
        padding: 2rem;
        border-radius: 12px;
        margin-top: 2rem;
        text-align: center;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .step {
            padding: 1.5rem 1rem 1.5rem 4.5rem;
        }

        .step::before {
            left: 1rem;
            width: 2.5rem;
            height: 2.5rem;
        }
    }
</style>

<!-- Header Section -->
@include('frontend.abgblora.00_fiturmenu.02_header')
@include('frontend.abgblora.00_fiturmenu.05_menunavigasweb')

<!-- Main Content -->
<div class="content-wrapper">
    <section class="page-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12">
                    <h1 class="fw-bold text-primary">Informasi Bantuan Teknis Penyelenggaraan Bangunan Gedung Negara</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="row">
        <!-- Sidebar Menu -->
        <div class="col-md-3">
            @include('frontend.abgblora.01_pbgslf.00_informasi.fiturmenupbg')
        </div>

        <!-- Main Content Area -->
        <div class="col-md-9">
            <div class="info-card">
                <div class="card-title">
                    <i class="fas fa-info-circle me-2"></i>Persetujuan Bangunan Gedung (PBG) - Fungsi Keagamaan
                </div>

                <div class="card-content">
                    <p class="text-justify mb-4">
                        Persetujuan Bangunan Gedung (PBG) adalah dokumen resmi yang diperlukan untuk setiap kegiatan pembangunan.
                        Untuk bangunan dengan fungsi hunian, PBG memastikan rencana teknis telah sesuai ketentuan peraturan.
                    </p>

                    <h5 class="fw-bold mt-4 mb-3">Klasifikasi Bangunan Hunian:</h5>
                    <ul class="list-group list-group-flush mb-4">
                        <li class="list-group-item bg-transparent">
                            <strong>Sederhana:</strong>
                            <ul>
                                <li>1 lantai &lt; 72 m²</li>
                                <li>2 lantai &lt; 90 m²</li>
                            </ul>
                        </li>
                        <li class="list-group-item bg-transparent">
                            <strong>Tidak Sederhana:</strong>
                            <ul>
                                <li>1 atau 2 lantai ≥ 72 m² / ≥ 90 m²</li>
                            </ul>
                        </li>
                    </ul>

                    <h5 class="fw-bold mt-4 mb-3">Persyaratan Dokumen:</h5>
                    <ol class="mb-4">
                        <li><strong>Data Tanah:</strong> Sertifikat tanah, izin pemanfaatan tanah (jika nama pemohon tidak sesuai dengan sertifikat).</li>
                        <li><strong>Data Umum:</strong> KTP/KITAS, dokumen perizinan tata ruang, KRK/KKPR, data penyedia jasa konstruksi (SBU/arsitek berlisensi).</li>
                        <li><strong>Data Teknis Arsitektur:</strong> Gambar situasi, denah, potongan, tampak.</li>
                        <li><strong>Data Teknis Struktur:</strong> Gambar pondasi, rangka atap, struktur.</li>
                        <li><strong>Data Teknis MEP:</strong> Gambar jaringan listrik dan sanitasi.</li>
                    </ol>

                    <h5 class="fw-bold mt-4 mb-3">Tahapan Pengurusan:</h5>
                    <ol class="process-steps">
                        <li class="step">Menyiapkan dokumen tanah, KRK/KKPR (dokumen tata ruang).</li>
                        <li class="step">Melakukan pendaftaran dan unggah dokumen di simbg.pu.go.id</li>
                        <li class="step">Verifikasi dokumen oleh operator Dinas Teknis.</li>
                        <li class="step">Penjadwalan konsultasi permohonan.</li>
                        <li class="step">Konsultasi bersama TPA/TPT.</li>
                        <li class="step">Revisi dokumen sesuai masukan teknis TPA/TPT.</li>
                        <li class="step">TPA/TPT menyetujui dokumen perencanaan.</li>
                        <li class="step">Pengunggahan berkas final, validasi, dan perhitungan retribusi.</li>
                        <li class="step">Pembayaran retribusi melalui bank persepsi atau mobile banking.</li>
                    </ol>
                </div>
            </div>

            <!-- Attachment Card -->
            <div class="info-card">
                <div class="card-title">
                    <i class="fas fa-paperclip me-2"></i>Lampiran Informasi
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card shadow-sm border-0 h-100">
                            <img src="/assets/android/pbgslf/PBG_FUNGSI_KEAGAMAAN.png" class="card-img-top" alt="thumbnail" style="object-fit: cover; height: 200px;">
                            <div class="card-body">
                                <h5 class="card-title text-primary fw-semibold">
                                    Persetujuan Bangunan Gedung (PBG) - Fungsi Keagamaan
                                </h5>
                                <p class="card-text">Dokumen lengkap mengenai PBG untuk bangunan dengan fungsi keagamaan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Contact Section -->
            <div class="contact-section">
                <h4 class="contact-title">
                    <i class="fas fa-headset me-2"></i>Layanan dan Pengaduan
                </h4>
                <p class="mb-3">Untuk permohonan bantuan, pengaduan, saran, atau masukan terkait pelayanan kami:</p>
                <a href="mailto:bid.bangunan.gedung.blora@gmail.com" class="contact-email">
                    <i class="fas fa-envelope me-2"></i>bid.bangunan.gedung.blora@gmail.com
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Footer Section -->
@include('frontend.abgblora.00_fiturmenu.03_footer')

<!-- Back to Top Button -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
