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
        height: 400px;
        overflow: hidden;
        border-radius: 8px;
        margin-bottom: 15px;
        position: relative;
    }

    .card-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .card-img-container img:hover {
        transform: scale(1.03);
    }

    .img-caption {
        position: absolute;
        bottom: 0;
        left: 0;
        right: 0;
        background: rgba(0,0,0,0.7);
        color: white;
        padding: 10px 15px;
        text-align: center;
        font-size: 14px;
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

    /* Info Box Styles */
    .info-box {
        background-color: #f8f9fa;
        border-left: 4px solid #4041DA;
        padding: 15px;
        margin: 20px 0;
        border-radius: 0 8px 8px 0;
    }

    .info-box-title {
        font-weight: 600;
        color: #002366;
        margin-bottom: 10px;
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
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 25px;
        color: #002366;
        text-align: center;
        padding-bottom: 10px;
        border-bottom: 2px solid #f0f0f0;
    }

    .info-subtitle {
        font-size: 18px;
        font-weight: 600;
        margin: 30px 0 15px;
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
        font-weight: 500;
    }

    .info-link:hover {
        color: #0056b3;
        text-decoration: underline;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .card-img-container {
            height: 250px;
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
            font-size: 20px;
        }

        .info-subtitle {
            font-size: 16px;
        }
    }
</style>

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
<div class="main-container" style="margin-top: 75px;">
    <section id="details" class="container-fluid flex flex-col sm:flex-row gap-5">
        <div class="flex flex-col gap-5 w-full" style="margin-top: -20px;">
            <div class="flex flex-col gap-5 p-5 rounded-[20px] w-full">
                <div class="w-full bg-[#030303] flex items-center gap-[10px] p-[10px_14px] rounded-xl">
                    <div class="w-5 h-5 flex shrink-0">
                        <img src="/assets/new/icons/story.svg" alt="icon">
                    </div>
                    <p class="text-white font-normal text-sm">
                        <span class="font-bold">Informasi Permohonan Bantuan Teknis Gambar</span>
                    </p>
                </div>


                {{-- ini informasi bantuan gambar --}}
<div class="container-fluid px-0 navy-theme">
    <!-- Header Section -->
  <!-- Tambahkan link font Poppins di dalam <head> jika belum -->
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

<style>
    .program-header {
        position: relative;
        text-align: center;
        padding: 50px 20px;
        background: #1a1a1a; /* contoh latar gelap agar teks putih terlihat jelas */
    }

    .header-overlay h1,
    .header-overlay h2,
    .header-overlay h3 {
        color: white;
        font-family: 'Poppins', sans-serif;
        margin: 10px 0;
    }

    .program-title {
        font-size: 2rem;
        font-weight: 700;
    }

    .program-subtitle {
        font-size: 1.5rem;
        font-weight: 500;
    }

    .program-year {
        font-size: 1.2rem;
        font-weight: 400;
    }
</style>

<div class="program-header mb-5">
    <div class="header-overlay">
        <h1 class="program-title">PENDAFTARAN PROGRAM PELAYANAN BANTUAN TEKNIS</h1>
        <h2 class="program-subtitle">Pembuatan Gambar untuk Pengajuan PBG Rumah Sederhana</h2>
        <h3 class="program-year">Kabupaten Blora Tahun 2025</h3>
    </div>
</div>

    <!-- Main Content -->
    <div class="row g-4">
        <div class="col-md-12">
            <div class="modern-card">
                <!-- About PBG Section -->
                <div class="section-container">
                    <h3 class="section-title"><i class="bi bi-building"></i> Tentang Persetujuan Bangunan Gedung (PBG)</h3>
                    <div class="section-content">
                        <p>Persetujuan Bangunan Gedung (PBG) adalah perizinan yang dikeluarkan pemerintah kepada pemilik bangunan atau perwakilannya untuk:</p>
                        <ul class="modern-list">
                            <li>Memulai pembangunan baru</li>
                            <li>Merrenovasi bangunan existing</li>
                            <li>Melakukan perawatan bangunan</li>
                            <li>Mengubah fungsi bangunan</li>
                        </ul>
                        <p>PBG diterbitkan setelah rencana teknis memenuhi standar peraturan melalui proses konsultasi dengan tenaga ahli terkait.</p>
                    </div>
                </div>

                <!-- PBG Functions Section -->
                <div class="section-container accent-box">
                    <h3 class="section-title"><i class="bi bi-check-circle"></i> Fungsi PBG</h3>
                    <div class="icon-grid">
                        <div class="icon-item">
                            <i class="bi bi-shield-check"></i>
                            <p>Legalitas pembangunan</p>
                        </div>
                        <div class="icon-item">
                            <i class="bi bi-people"></i>
                            <p>Jaminan keselamatan pengguna</p>
                        </div>
                        <div class="icon-item">
                            <i class="bi bi-clipboard-data"></i>
                            <p>Pendataan bangunan gedung</p>
                        </div>
                        <div class="icon-item">
                            <i class="bi bi-house-heart"></i>
                            <p>Kenyamanan penghuni</p>
                        </div>
                    </div>
                </div>

                <!-- Program Description -->
                <div class="section-container">
                    <h3 class="section-title"><i class="bi bi-info-circle"></i> Deskripsi Program</h3>
                    <div class="section-content">
                        <p>Dinas PUPR Kabupaten Blora memberikan pelayanan gratis berupa:</p>
                        <div class="benefits-box">
                            <div class="benefit-item">
                                <span class="benefit-icon">1</span>
                                <p>Pendampingan pengisian data SIMBG</p>
                            </div>
                            <div class="benefit-item">
                                <span class="benefit-icon">2</span>
                                <p>Pembuatan gambar teknis</p>
                            </div>
                            <div class="benefit-item">
                                <span class="benefit-icon">3</span>
                                <p>Konsultasi teknis bangunan</p>
                            </div>
                        </div>
                        <div class="note-box">
                            <p><strong>Catatan:</strong> Pemohon tetap membayar retribusi PBG sesuai Perda Kabupaten Blora No. 6 Tahun 2023</p>
                        </div>
                    </div>
                </div>

                <!-- Requirements Section -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="section-container">
                            <h3 class="section-title"><i class="bi bi-file-earmark-check"></i> Persyaratan</h3>
                            <ul class="modern-list">
                                <li>Surat pengajuan bantuan gambar teknis</li>
                                <li>Surat pengajuan KRK (dapat diunduh)</li>
                                <li>Scan KTP pemohon</li>
                                <li>Scan KRK (Keterangan Rencana Kabupaten)</li>
                                <li>Scan sertifikat tanah</li>
                                <li>Scan PBB terbaru (untuk pengajuan KRK)</li>
                                <li>Surat sewa/ijin pemanfaatan tanah (jika nama berbeda)</li>
                                <li>Dokumen kajian tata ruang</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="section-container">
                            <h3 class="section-title"><i class="bi bi-clipboard2-pulse"></i> Ketentuan</h3>
                            <ul class="modern-list">
                                <li>Pendaftaran sampai 31 September 2025</li>
                                <li>Lokasi tidak di kawasan lindung tanaman pangan</li>
                                <li>Lokasi tidak di kawasan pertahanan keamanan</li>
                                <li>Lokasi tidak di kawasan hutan produksi</li>
                                <li>Proses hanya untuk pemohon yang memenuhi syarat</li>
                                <li>Berdasarkan ketersediaan kuota</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Timeline Section -->
                <div class="section-container timeline-container">
                    <h3 class="section-title"><i class="bi bi-calendar-event"></i> Timeline Proses</h3>
                    <div class="timeline">
                        <div class="timeline-item">
                            <div class="timeline-date">1-3 Hari</div>
                            <div class="timeline-content">Verifikasi dokumen</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-date">3-5 Hari</div>
                            <div class="timeline-content">Pembuatan gambar teknis</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-date">5-7 Hari</div>
                            <div class="timeline-content">Konsultasi dan revisi</div>
                        </div>
                        <div class="timeline-item">
                            <div class="timeline-date">7-10 Hari</div>
                            <div class="timeline-content">Pengajuan PBG</div>
                        </div>
                    </div>
                </div>

                <!-- Contact Section -->
                <div class="section-container contact-box">
                    <h3 class="section-title"><i class="bi bi-headset"></i> Layanan dan Pengaduan</h3>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="bi bi-telephone"></i>
                            <p>(0296) 531001</p>
                        </div>
                        <div class="contact-item">
                            <i class="bi bi-envelope"></i>
                            <p>dinas.pupr@blorakab.go.id</p>
                        </div>
                        <div class="contact-item">
                            <i class="bi bi-geo-alt"></i>
                            <p>Dinas PUPR Kabupaten Blora, Jl. Pemuda No. 45, Blora</p>
                        </div>
                    </div>
                    <div class="action-buttons">
                        <a href="/assets/abgblora/logo/Surat_Permohonan_Bantuan_Gambar.docx" download class="btn-download inline-flex items-center gap-2 px-4 py-2 bg-blue-600 text-black font-semibold rounded hover:bg-blue-700">
                            <i class="bi bi-download"></i> Unduh Formulir
                        </a>
                        <a href="">
                            <button class="btn-register"><i class="bi bi-pencil-square"></i> Ajukan Permohonan !</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Navy Blue Theme */
.navy-theme {
    --primary-color: #001f3f;
    --secondary-color: #003366;
    --accent-color: #0056b3;
    --light-accent: #e6f0ff;
    --text-color: #333;
    --light-text: #f8f9fa;
}

.program-header {
    background: linear-gradient(rgba(0, 31, 63, 0.8), rgba(0, 31, 63, 0.8)),
                url('https://source.unsplash.com/1200x600/?house,construction');
    background-size: cover;
    background-position: center;
    color: white;
    padding: 4rem 0;
    text-align: center;
    border-radius: 0 0 20px 20px;
}

.program-title {
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
}

.program-subtitle {
    font-size: 1.5rem;
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.program-year {
    font-size: 1.2rem;
    font-weight: 400;
}

.modern-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    padding: 2.5rem;
    margin-top: -50px;
    position: relative;
    z-index: 2;
}

.section-container {
    margin-bottom: 2.5rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #eee;
}

.section-container:last-child {
    border-bottom: none;
}

.section-title {
    color: var(--primary-color);
    font-weight: 600;
    margin-bottom: 1.2rem;
    display: flex;
    align-items: center;
    gap: 10px;
}

.section-title i {
    font-size: 1.3rem;
}

.accent-box {
    background-color: var(--light-accent);
    padding: 1.5rem;
    border-radius: 12px;
    border-left: 5px solid var(--accent-color);
}

.modern-list {
    list-style-type: none;
    padding-left: 0;
}

.modern-list li {
    padding: 0.5rem 0;
    padding-left: 1.8rem;
    position: relative;
}

.modern-list li:before {
    content: "•";
    color: var(--accent-color);
    font-weight: bold;
    position: absolute;
    left: 0;
}

.icon-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
    gap: 1.5rem;
    margin-top: 1.5rem;
}

.icon-item {
    text-align: center;
    padding: 1rem;
    background: white;
    border-radius: 10px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
}

.icon-item i {
    font-size: 2rem;
    color: var(--accent-color);
    margin-bottom: 0.5rem;
}

.benefits-box {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    margin: 1.5rem 0;
}

.benefit-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    background: white;
    padding: 1rem;
    border-radius: 8px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.05);
}

.benefit-icon {
    background: var(--accent-color);
    color: white;
    width: 30px;
    height: 30px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
}

.note-box {
    background: #fff8e1;
    padding: 1rem;
    border-radius: 8px;
    border-left: 4px solid #ffc107;
    margin-top: 1.5rem;
}

.timeline-container {
    padding: 1.5rem;
}

.timeline {
    position: relative;
    padding-left: 2rem;
    margin-top: 1.5rem;
}

.timeline:before {
    content: '';
    position: absolute;
    left: 7px;
    top: 0;
    bottom: 0;
    width: 2px;
    background: var(--accent-color);
}

.timeline-item {
    position: relative;
    margin-bottom: 1.5rem;
    padding-left: 2rem;
}

.timeline-item:last-child {
    margin-bottom: 0;
}

.timeline-item:before {
    content: '';
    position: absolute;
    left: 0;
    top: 5px;
    width: 14px;
    height: 14px;
    border-radius: 50%;
    background: white;
    border: 3px solid var(--accent-color);
    z-index: 1;
}

.timeline-date {
    font-weight: 600;
    color: var(--primary-color);
    margin-bottom: 0.3rem;
}

.contact-box {
    background: var(--primary-color);
    color: white;
    padding: 2rem;
    border-radius: 15px;
}

.contact-box .section-title {
    color: white;
}

.contact-info {
    display: flex;
    flex-direction: column;
    gap: 1rem;
    margin: 1.5rem 0;
}

.contact-item {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.contact-item i {
    font-size: 1.2rem;
}

.action-buttons {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
}

.btn-download, .btn-register {
    padding: 0.8rem 1.5rem;
    border-radius: 8px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.3s ease;
}

.btn-download {
    background: white;
    color: var(--primary-color);
}

.btn-register {
    background: var(--accent-color);
    color: white;
}

.btn-download:hover {
    background: #f0f0f0;
}

.btn-register:hover {
    background: #004494;
}

@media (max-width: 768px) {
    .program-title {
        font-size: 1.8rem;
    }
    .program-subtitle {
        font-size: 1.2rem;
    }
    .modern-card {
        padding: 1.5rem;
        margin-top: -30px;
    }
    .icon-grid {
        grid-template-columns: 1fr 1fr;
    }
    .action-buttons {
        flex-direction: column;
    }
}
</style>
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

<!-- Slideshow Script -->
<script>
    const images = [
        {
            url: "https://source.unsplash.com/900x400/?urban,planning",
            caption: "Perencanaan Tata Ruang Wilayah"
        },
        {
            url: "https://source.unsplash.com/900x400/?city,architecture",
            caption: "Zonasi Kawasan Perkotaan"
        },
        {
            url: "https://source.unsplash.com/900x400/?construction,building",
            caption: "Proses Pembangunan Berdasarkan KRK"
        },
        {
            url: "https://source.unsplash.com/900x400/?map,development",
            caption: "Peta Rencana Tata Ruang Kabupaten"
        }
    ];

    let currentIndex = 0;
    const imgElement = document.getElementById('slideImage');
    const captionElement = document.getElementById('captionText');

    function showSlide(index) {
        imgElement.src = images[index].url + "&" + new Date().getTime(); // cache-busting
        imgElement.alt = images[index].caption;
        captionElement.textContent = images[index].caption;
    }

    function nextSlide() {
        currentIndex = (currentIndex + 1) % images.length;
        showSlide(currentIndex);
    }

    // Initial slide
    showSlide(currentIndex);

    // Auto change slide every 5 seconds
    setInterval(nextSlide, 5000);
</script>
