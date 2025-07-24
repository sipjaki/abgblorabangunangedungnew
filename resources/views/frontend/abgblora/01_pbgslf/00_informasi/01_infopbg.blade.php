<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Permohonan PBG SLF Bangunan Gedung</title>

    <!-- CSS Libraries -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <style>
        /* Base Styles */
        :root {
            --navy-dark: #001a3a;
            --navy-primary: #002366;
            --navy-light: #1a4b8c;
            --accent-blue: #3d7bb3;
            --accent-light: #5ab1f0;
            --light-bg: #f8fafc;
            --card-bg: #ffffff;
            --text-dark: #2d3748;
            --text-light: #4a5568;
            --success: #38a169;
        }

        body {
            font-family: 'Poppins', sans-serif;
            line-height: 1.6;
            color: var(--text-dark);
            background: linear-gradient(to bottom, #7de3f1, #ffffff);
            margin: 0;
            padding: 0;
            min-height: 100vh;
        }

        /* Header Banner */
        .header-banner {
            background: linear-gradient(to bottom, #7de3f1, #ffffff);
            width: 100%;
            margin: 0;
            padding: 20px 0;
            position: relative;
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

        /* Card Styles */
        .card {
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
            border: none;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
        }

        .card-title {
            color: var(--navy-primary);
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 15px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
        }

        /* Map Container */
        .petablota-map-container {
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

        #map-loader {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            display: none;
        }

        /* Button Styles */
        .btn-primary-custom, .custom-button {
            display: flex;
            align-items: center;
            gap: 8px;
            background-color: #258af0;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 50px;
            border: none;
            font-size: 16px;
            transition: all 0.3s;
            cursor: pointer;
        }

        .btn-primary-custom:hover, .custom-button:hover {
            background-color: white;
            color: #258af0;
            border: 1px solid #258af0;
        }

        .btn-submit-hover:hover {
            background-color: white;
            color: black;
            border: 1px solid #2563eb;
        }

        .btn-cancel-hover:hover {
            background-color: white;
            color: black;
            border: 1px solid #9CA3AF;
        }

        /* Table Styles */
        .zebra-table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Poppins', sans-serif;
            font-size: 12px;
            border-radius: 15px;
            overflow: hidden;
        }

        .zebra-table thead {
            background-color: #2E82FE;
            color: white;
        }

        .zebra-table th,
        .zebra-table td {
            padding: 6px 12px;
            text-align: left;
        }

        .zebra-table tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .zebra-table tbody tr:nth-child(even) {
            background-color: #dfdddd;
        }

        .zebra-table tbody tr:hover {
            background-color: #0fb825;
        }

        /* PDF Preview */
        .pdf-preview-wrapper {
            max-width: 50%;
            overflow-x: auto;
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 8px;
        }

        .pdf-preview-wrapper iframe {
            width: 100%;
            height: 200px;
            border: none;
            border-radius: 6px;
        }

        /* Coordinate Box */
        .koordinat-box {
            margin-top: 10px;
            font-family: Arial, sans-serif;
            background: #f3f3f3;
            padding: 10px;
            border-radius: 10px;
            border: 1px solid #ccc;
        }

        /* Contact Section */
        .contact-section {
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-light));
            color: white;
            padding: 2.5rem;
            border-radius: 12px;
            margin: 20px 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .contact-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path fill="rgba(255,255,255,0.05)" d="M0,0 L100,0 L100,100 L0,100 Z" /></svg>');
            opacity: 0.1;
        }

        /* Info Section */
        .info-section {
            background: white;
            border-radius: 20px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .info-header {
            background: #030303;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 14px;
            border-radius: 12px;
            margin-bottom: 20px;
        }

        /* Hide default Leaflet attribution */
        .leaflet-control-attribution a[href*="leaflet"] {
            display: none !important;
        }

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .petablota-map-container {
                height: 50vh;
            }

            .card {
                padding: 15px;
            }

            .main-container {
                margin: 10px;
                padding: 15px;
            }

            .pdf-preview-wrapper {
                max-width: 100%;
            }
        }

        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in {
            animation: fadeIn 0.6s ease forwards;
        }
    </style>
</head>
<body>
    <!-- Header Includes -->
    @include('frontend.abgblora.00_fiturmenu.02_header')
    @include('frontend.abgblora.00_fiturmenu.05_menunavigasweb')
    @include('backend.00_administrator.00_baganterpisah.09_button')

    <!-- Banner Section -->
    <section class="header-banner" style="margin-top: 65px;">
        <div class="container max-w-[1130px] mx-auto" style="padding-top: 50px;">
            <div class="flex items-center gap-[20px]">
                <!-- Content here -->
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <div class="main-container fade-in">
        <section id="details" class="container-fluid flex flex-col sm:flex-row gap-5">
            <div class="flex flex-col gap-5 w-full">
                <div class="info-section">
                    <div class="info-header">
                        <div class="w-5 h-5 flex shrink-0">
                            <img src="/assets/new/icons/story.svg" alt="icon">
                        </div>
                        <p class="text-white font-normal text-sm">
                            <span class="font-bold">Informasi Permohonan (PBG) Persetujuan Bangunan Gedung & (SLF) Sertifikat Laik Fungsi</span>
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

                        <!-- Contact Section -->
                        <div class="contact-section fade-in">
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

    <script>
        // JavaScript code can go here
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize map or other scripts
        });
    </script>
</body>
</html>
