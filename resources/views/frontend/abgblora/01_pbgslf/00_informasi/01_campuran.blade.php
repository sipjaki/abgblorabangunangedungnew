<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi PBG SLF Bangunan Gedung - Kabupaten Blora</title>

    <!-- Favicon -->
    <link rel="icon" href="/assets/favicon.ico" type="image/x-icon">

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
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }

        .card-title {
            color: #002366;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        /* Map Container */
        .map-container {
            height: 70vh;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            position: relative;
        }

        #map {
            width: 100%;
            height: 100%;
        }

        /* Button Styles */
        .btn-primary-custom {
            background-color: #258af0;
            color: white;
            border: none;
            border-radius: 50px;
            padding: 10px 20px;
            font-size: 16px;
            transition: all 0.3s;
        }

        .btn-primary-custom:hover {
            background-color: white;
            color: #258af0;
            border: 1px solid #258af0;
        }

        /* Table Styles */
        .zebra-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 16px;
        }

        .zebra-table thead {
            background-color: #2E82FE;
            color: white;
        }

        .zebra-table th,
        .zebra-table td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .zebra-table tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .zebra-table tbody tr:nth-child(even) {
            background-color: #f5f5f5;
        }

        .zebra-table tbody tr:hover {
            background-color: #e6f7ff;
        }

        /* PDF Preview */
        .pdf-preview-wrapper {
            max-width: 100%;
            overflow-x: auto;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 10px;
            margin: 10px 0;
        }

        /* Error Message */
        .error-message {
            color: #e3342f;
            font-size: 14px;
            margin-top: 5px;
        }

        /* Contact Section */
        .contact-section {
            background-color: #4041DA;
            color: white;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
        }

        .contact-section a {
            color: #fff;
            text-decoration: underline;
        }

        .contact-section a:hover {
            color: #e6f7ff;
        }

        /* Navigation Menu */
        .nav-menu {
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        /* Info Banner */
        .info-banner {
            background-color: #030303;
            color: white;
            padding: 10px 14px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .info-banner img {
            width: 20px;
            height: 20px;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .map-container {
                height: 50vh;
            }

            .card {
                padding: 15px;
            }

            .main-container {
                margin: 10px;
                padding: 15px;
            }

            .zebra-table {
                font-size: 14px;
            }

            .zebra-table th,
            .zebra-table td {
                padding: 8px;
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
    {{-- <section class="header-banner" style="margin-top: 65px;">
        <div class="container max-w-[1130px] mx-auto" style="padding-top: 50px;">
            <div class="flex items-center gap-[20px]">
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-gray-800">Persetujuan Bangunan Gedung (PBG)</h1>
                    <p class="text-gray-600 mt-2">Sistem Layanan Fonksional Bangunan Gedung Kabupaten Blora</p>
                </div>
                <div class="hidden md:block">
                    <img src="/assets/new/icons/building-icon.svg" alt="Building Icon" class="h-24">
                </div>
            </div>
        </div>
    </section> --}}

    <!-- Main Content Section -->
    <div class="main-container">
        <section id="details" class="container-fluid flex flex-col sm:flex-row gap-5" style="margin-top:-200px;">
            <div class="flex flex-col gap-5 w-full">
                <div class="flex flex-col gap-5 p-5 rounded-[20px] w-full">
                    <!-- Info Banner -->
                    <div class="info-banner">
                        <img src="/assets/new/icons/story.svg" alt="icon">
                        <p class="text-white font-normal text-sm">
                            <span class="font-bold">Informasi Permohonan PBG SLF Bangunan Gedung</span>
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
                                <!-- PBG Fungsi Campuran Card -->
                                <div class="col-md-12">
                                    <a href="#" class="text-decoration-none">
                                        <div class="card shadow-sm border-0 h-100">
                                            <img src="/assets/android/pbgslf/PBG_FUNGSI_CAMPURAN.png"
                                                class="card-img-top img-fluid"
                                                alt="thumbnail"
                                                style="object-fit: cover; width: 100%; height: auto;">
                                            <div class="card-body">
                                                <h5 class="card-title text-primary fw-semibold">
                                                    Persetujuan Bangunan Gedung (PBG) - Fungsi Campuran
                                                </h5>
                                                <p class="card-text text-secondary" style="text-align: justify;">
                                                    PBG adalah dokumen yang diperlukan untuk bangunan dengan fungsi campuran, seperti pelayanan pendidikan, kesehatan, kebudayaan, laboratorium, dan umum. Syarat pengajuan meliputi dokumen tanah, data umum (KTP, NIB, KRK), serta dokumen teknis arsitektur, struktur, dan MEP. Prosesnya dimulai dari pendaftaran via SIMBG.PU, konsultasi teknis, validasi, pembayaran retribusi, hingga penerbitan dokumen PBG.
                                                </p>

                                                <!-- Additional Information -->
                                                <div class="mt-4">
                                                    <h6 class="fw-semibold">Persyaratan Dokumen:</h6>
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item border-0 ps-0">• Dokumen kepemilikan tanah</li>
                                                        <li class="list-group-item border-0 ps-0">• Fotokopi KTP pemohon</li>
                                                        <li class="list-group-item border-0 ps-0">• Nomor Induk Berusaha (NIB)</li>
                                                        <li class="list-group-item border-0 ps-0">• Kesesuaian Rencana Kota (KRK)</li>
                                                        <li class="list-group-item border-0 ps-0">• Dokumen teknis arsitektur</li>
                                                        <li class="list-group-item border-0 ps-0">• Dokumen teknis struktur</li>
                                                        <li class="list-group-item border-0 ps-0">• Dokumen teknis MEP (Mekanikal, Elektrikal, Plumbing)</li>
                                                    </ul>
                                                </div>

                                                <!-- Process Timeline -->
                                                <div class="mt-4">
                                                    <h6 class="fw-semibold">Proses Pengajuan:</h6>
                                                    <div class="timeline mt-3">
                                                        <div class="d-flex mb-3">
                                                            <div class="bg-primary rounded-circle flex-shrink-0" style="width: 24px; height: 24px;"></div>
                                                            <div class="ms-3">
                                                                <h6 class="mb-0">1. Pendaftaran via SIMBG.PU</h6>
                                                                <p class="text-muted small">Mengisi formulir dan mengunggah dokumen persyaratan</p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mb-3">
                                                            <div class="bg-primary rounded-circle flex-shrink-0" style="width: 24px; height: 24px;"></div>
                                                            <div class="ms-3">
                                                                <h6 class="mb-0">2. Konsultasi Teknis</h6>
                                                                <p class="text-muted small">Verifikasi dan konsultasi dengan tim teknis</p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mb-3">
                                                            <div class="bg-primary rounded-circle flex-shrink-0" style="width: 24px; height: 24px;"></div>
                                                            <div class="ms-3">
                                                                <h6 class="mb-0">3. Validasi Dokumen</h6>
                                                                <p class="text-muted small">Pemeriksaan kelengkapan dan kesesuaian dokumen</p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex mb-3">
                                                            <div class="bg-primary rounded-circle flex-shrink-0" style="width: 24px; height: 24px;"></div>
                                                            <div class="ms-3">
                                                                <h6 class="mb-0">4. Pembayaran Retribusi</h6>
                                                                <p class="text-muted small">Pembayaran sesuai ketentuan yang berlaku</p>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex">
                                                            <div class="bg-primary rounded-circle flex-shrink-0" style="width: 24px; height: 24px;"></div>
                                                            <div class="ms-3">
                                                                <h6 class="mb-0">5. Penerbitan PBG</h6>
                                                                <p class="text-muted small">Penerbitan dokumen PBG yang sah</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Action Button -->
                                                <div class="mt-4">
                                                    <a href="#" class="btn btn-primary-custom me-2">
                                                        <i class="bi bi-download me-1"></i> Unduh Panduan
                                                    </a>
                                                    <a href="#" class="btn btn-outline-primary">
                                                        <i class="bi bi-info-circle me-1"></i> Info Lebih Lanjut
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>

                                <!-- Additional Cards can be added here -->
                            </div>
                        </div>

                        <!-- Frequently Asked Questions -->
                        <div class="mb-5">
                            <h6 class="fw-semibold mb-4" style="font-size: 18px;">
                                <i class="bi bi-question-circle text-primary"></i> Pertanyaan yang Sering Diajukan (FAQ)
                            </h6>

                            <div class="accordion" id="faqAccordion">
                                <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-sm">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            Berapa lama proses penerbitan PBG?
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Proses penerbitan PBG memakan waktu maksimal 14 hari kerja setelah semua persyaratan dinyatakan lengkap dan valid. Waktu ini termasuk proses verifikasi, konsultasi teknis, dan penerbitan dokumen.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-sm">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Apa saja yang perlu disiapkan untuk pengajuan PBG?
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Anda perlu menyiapkan dokumen kepemilikan tanah, identitas pemohon (KTP), NIB, KRK, serta dokumen teknis berupa gambar arsitektur, struktur, dan MEP. Semua dokumen harus dalam format PDF dengan ukuran maksimal 5MB per file.
                                        </div>
                                    </div>
                                </div>

                                <div class="accordion-item border-0 mb-3 rounded-3 overflow-hidden shadow-sm">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Bagaimana cara mengetahui status pengajuan PBG saya?
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
                                        <div class="accordion-body">
                                            Anda dapat memeriksa status pengajuan melalui sistem SIMBG.PU dengan login menggunakan akun yang telah didaftarkan. Notifikasi juga akan dikirim melalui email dan SMS pada setiap tahap proses.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Contact Section -->
                        <div class="contact-section">
                            <h5 class="fw-semibold mb-3"><i class="bi bi-headset me-2"></i> Layanan dan Pengaduan</h5>
                            <p class="mb-3">Untuk permohonan bantuan, pengaduan, saran, atau masukan terkait pelayanan kami:</p>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-envelope fs-5 me-3"></i>
                                        <div>
                                            <p class="mb-0">Email Resmi</p>
                                            <a href="mailto:bid.bangunan.gedung.blora@gmail.com">bid.bangunan.gedung.blora@gmail.com</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-telephone fs-5 me-3"></i>
                                        <div>
                                            <p class="mb-0">Telepon</p>
                                            <a href="tel:+622896123456">(0289) 6123456</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-geo-alt fs-5 me-3"></i>
                                        <div>
                                            <p class="mb-0">Alamat Kantor</p>
                                            <p>Jl. Pemuda No. 59, Blora, Jawa Tengah</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-clock fs-5 me-3"></i>
                                        <div>
                                            <p class="mb-0">Jam Operasional</p>
                                            <p>Senin-Jumat: 08.00-15.00 WIB</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-3">
                                <a href="#" class="btn btn-light me-2">
                                    <i class="bi bi-whatsapp me-1"></i> WhatsApp
                                </a>
                                <a href="#" class="btn btn-light">
                                    <i class="bi bi-telegram me-1"></i> Telegram
                                </a>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });

            // Back to top button functionality
            const progressWrap = document.querySelector('.progress-wrap');
            if (progressWrap) {
                window.addEventListener('scroll', function() {
                    if (window.scrollY > 300) {
                        progressWrap.style.opacity = '1';
                        progressWrap.style.visibility = 'visible';
                    } else {
                        progressWrap.style.opacity = '0';
                        progressWrap.style.visibility = 'hidden';
                    }
                });

                progressWrap.addEventListener('click', function(e) {
                    e.preventDefault();
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }

            // Initialize map if needed
            if (document.getElementById('map')) {
                const map = L.map('map').setView([-6.9698, 111.4186], 13);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);

                // You can add markers or other map features here
            }
        });
    </script>
</body>
</html>
