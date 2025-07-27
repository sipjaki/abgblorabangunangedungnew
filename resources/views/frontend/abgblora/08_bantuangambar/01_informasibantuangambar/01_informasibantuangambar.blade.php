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
                        <span class="font-bold">Informasi Permohonan (KRK) Keterangan Rencana Kota/Kabupaten</span>
                    </p>
                </div>

                <!-- Information Cards -->
                <div class="container-fluid px-0">
                    <!-- Lampiran Section -->
                    <div class="mb-5">
                        <div class="row g-4">
                            <div class="col-md-12">
                                <div class="info-container" style="margin-top: 10px; ">
                                    {{-- <h2 class="info-title">
                                        KRK (Keterangan Rencana Kabupaten) - Panduan Lengkap
                                    </h2> --}}

                                    <!-- Image Slideshow -->
                                    <div class="card-img-container">
                                        <img id="slideImage" src="https://source.unsplash.com/900x400/?urban,planning" alt="Perencanaan Tata Ruang">
                                        <div class="img-caption" id="captionText">Perencanaan Tata Ruang</div>
                                    </div>

                                    <!-- Main Content -->
                                    <h3 class="info-subtitle">Apa Itu KRK?</h3>
                                    <p>
                                        KRK atau Keterangan Rencana Kabupaten merupakan dokumen resmi yang dikeluarkan oleh pemerintah daerah yang menjelaskan kesesuaian suatu rencana pembangunan dengan peraturan tata ruang yang berlaku di wilayah kabupaten/kota. Dokumen ini menjadi dasar penting dalam proses pengajuan izin mendirikan bangunan (IMB) atau Persetujuan Bangunan Gedung (PBG).
                                    </p>

                                    <div class="info-box">
                                        <div class="info-box-title">Fungsi Utama KRK:</div>
                                        <ul class="info-list">
                                            <li>Menjelaskan status peruntukan lahan sesuai RTRW</li>
                                            <li>Memastikan kesesuaian rencana bangunan dengan zonasi</li>
                                            <li>Menjadi dasar penilaian teknis permohonan PBG</li>
                                            <li>Mencegah pembangunan di kawasan lindung</li>
                                        </ul>
                                    </div>

                                    <h3 class="info-subtitle">Mengapa KRK Penting?</h3>
                                    <p>
                                        KRK memiliki peran strategis dalam pembangunan berkelanjutan karena:
                                    </p>
                                    <ol class="info-list">
                                        <li><strong>Kepastian Hukum:</strong> Memberikan legalitas bahwa lokasi pembangunan sesuai peruntukan</li>
                                        <li><strong>Pencegahan Konflik:</strong> Menghindari sengketa penggunaan lahan di kemudian hari</li>
                                        <li><strong>Perencanaan Terpadu:</strong> Memastikan pembangunan selaras dengan rencana tata ruang wilayah</li>
                                        <li><strong>Perlindungan Lingkungan:</strong> Mencegah pembangunan di kawasan lindung atau rawan bencana</li>
                                    </ol>

                                    <h3 class="info-subtitle">Proses Pengajuan KRK</h3>
                                    <p>
                                        Berikut tahapan pengajuan KRK di Kabupaten Blora:
                                    </p>
                                    <ul class="info-list">
                                        <li>Pemohon mengajukan permohonan melalui sistem online atau langsung ke Dinas PUPR</li>
                                        <li>Melampirkan dokumen persyaratan (sertifikat tanah, KTP, surat kuasa jika dikuasakan)</li>
                                        <li>Tim teknis melakukan verifikasi lapangan</li>
                                        <li>Proses analisis kesesuaian dengan RTRW</li>
                                        <li>Penerbitan KRK jika memenuhi syarat</li>
                                    </ul>

                                    <h3 class="info-subtitle">Persyaratan Dokumen</h3>
                                    <p>
                                        Untuk mengajukan KRK, pemohon perlu menyiapkan:
                                    </p>
                                    <ul class="info-list">
                                        <li>Fotokopi sertifikat tanah atau bukti kepemilikan lahan</li>
                                        <li>Fotokopi KTP pemohon</li>
                                        <li>Surat kuasa bermaterai jika dikuasakan</li>
                                        <li>Gambar situasi lokasi</li>
                                        <li>Dokumen pendukung lain sesuai kebutuhan</li>
                                    </ul>

                                    {{-- <h3 class="info-subtitle">Layanan Online KRK</h3> --}}
                                    {{-- <p>
                                        Pemerintah Kabupaten Blora telah menyediakan layanan online untuk pengajuan KRK melalui:
                                    </p>
                                    <ul class="info-list">
                                        <li>Sistem Informasi Manajemen Bangunan Gedung (<a href="https://simbg.pu.go.id" class="info-link" target="_blank">simbg.pu.go.id</a>)</li>
                                        <li>Aplikasi Pelayanan Perizinan Online Kabupaten Blora</li>
                                        <li>Layanan satu pintu di Kantor Dinas PUPR</li>
                                    </ul> --}}

                                    {{-- <div class="info-box">
                                        <div class="info-box-title">Estimasi Waktu Proses:</div>
                                        <p>
                                            Proses penerbitan KRK biasanya memakan waktu 5-10 hari kerja setelah semua persyaratan lengkap dan verifikasi lapangan selesai dilakukan.
                                        </p>
                                    </div> --}}

                                    {{-- <h3 class="info-subtitle">Biaya dan Retribusi</hb --}}

                                    <!-- Contact Section -->
                                    <div class="contact-section">
                                        <h5 class="fw-semibold mb-3"><i class="bi bi-headset"></i> Layanan dan Pengaduan</h5>
                                        <p class="mb-2">Untuk informasi lebih lanjut tentang KRK, silahkan hubungi:</p>
                                        <p class="mb-1"><i class="bi bi-telephone"></i> (0296) 531001</p>
                                        <p class="mb-1"><i class="bi bi-envelope"></i> dinas.pupr@blorakab.go.id</p>
                                        <p class="mb-0"><i class="bi bi-geo-alt"></i> Dinas PUPR Kabupaten Blora, Jl. Pemuda No. 45, Blora</p>
                                    </div>
                                </div>
                            </div>
                        </div>
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
