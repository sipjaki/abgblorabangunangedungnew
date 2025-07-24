<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi PBG SLF Bangunan Gedung</title>

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

        /* Navigation Menu */
        .nav-menu {
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(10px);
            border-radius: 10px;
            padding: 15px;
            margin-bottom: 20px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
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
        }
    </style>
</head>
<body>

    <!-- Header Includes -->
    <header>
        <!-- Your header content here -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="/assets/logo.png" alt="Logo" height="40">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="#">PBG SLF</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Kontak</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!-- Navigation Menu -->
    <div class="nav-menu">
        <div class="container">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="bi bi-info-circle"></i> Informasi</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-file-earmark-text"></i> Persyaratan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-list-check"></i> Prosedur</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-clock-history"></i> Tracking</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Banner Section -->
    <section class="header-banner" style="margin-top: 65px;">
        <div class="container max-w-[1130px] mx-auto" style="padding-top: 50px;">
            <div class="flex items-center gap-[20px]">
                <div class="flex-1">
                    <h1 class="text-3xl font-bold text-gray-800">Persetujuan Bangunan Gedung (PBG)</h1>
                    <p class="text-gray-600 mt-2">Sistem Layanan Fonumen (SLF) - Kabupaten Blora</p>
                </div>
                <div class="w-1/4">
                    <img src="/assets/building-icon.png" alt="Building Icon" class="w-full">
                </div>
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
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Information Section -->
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary fw-semibold">
                                            <i class="bi bi-file-earmark-text"></i> Dokumen yang Diperlukan
                                        </h5>
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item">1. Dokumen kepemilikan tanah</li>
                                            <li class="list-group-item">2. Fotokopi KTP pemohon</li>
                                            <li class="list-group-item">3. Nomor Induk Berusaha (NIB)</li>
                                            <li class="list-group-item">4. Kesesuaian Rencana Kota (KRK)</li>
                                            <li class="list-group-item">5. Dokumen teknis arsitektur</li>
                                            <li class="list-group-item">6. Dokumen teknis struktur</li>
                                            <li class="list-group-item">7. Dokumen teknis MEP</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-primary fw-semibold">
                                            <i class="bi bi-clock-history"></i> Proses Pengajuan
                                        </h5>
                                        <ol class="list-group list-group-flush">
                                            <li class="list-group-item">1. Pendaftaran via SIMBG.PU</li>
                                            <li class="list-group-item">2. Konsultasi teknis</li>
                                            <li class="list-group-item">3. Validasi dokumen</li>
                                            <li class="list-group-item">4. Pembayaran retribusi</li>
                                            <li class="list-group-item">5. Penerbitan PBG</li>
                                            <li class="list-group-item">6. Pengambilan dokumen</li>
                                        </ol>
                                    </div>
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
                            <p class="mt-2 mb-0">
                                <i class="bi bi-telephone"></i> (0296) 531016
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h5>Dinas Pekerjaan Umum</h5>
                    <p>Kabupaten Blora</p>
                    <p>Jl. Pemuda No. 1, Blora</p>
                </div>
                <div class="col-md-4">
                    <h5>Jam Operasional</h5>
                    <p>Senin - Jumat: 08.00 - 16.00 WIB</p>
                    <p>Sabtu - Minggu: Tutup</p>
                </div>
                <div class="col-md-4">
                    <h5>Tautan Cepat</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Beranda</a></li>
                        <li><a href="#" class="text-white">Layanan</a></li>
                        <li><a href="#" class="text-white">Kontak</a></li>
                    </ul>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <p class="mb-0">&copy; 2023 Dinas PU Kabupaten Blora. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize map if needed
            if (document.getElementById('map')) {
                var map = L.map('map').setView([-6.9698, 111.4186], 13);
                L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(map);
            }

            // Back to top button functionality
            const progressWrap = document.querySelector('.progress-wrap');
            if (progressWrap) {
                window.addEventListener('scroll', function() {
                    if (window.pageYOffset > 300) {
                        progressWrap.style.opacity = '1';
                        progressWrap.style.visibility = 'visible';
                    } else {
                        progressWrap.style.opacity = '0';
                        progressWrap.style.visibility = 'hidden';
                    }
                });

                progressWrap.addEventListener('click', function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }
        });
    </script>
</body>
</html>
