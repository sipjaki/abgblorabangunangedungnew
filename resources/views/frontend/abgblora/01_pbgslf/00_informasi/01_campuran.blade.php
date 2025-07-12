
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
            background-color: #f8fafc;
        }

        /* Header Styles */
        .header-banner {
            background: linear-gradient(to bottom, #7de3f1, #ffffff);
            width: 100vw;
            margin: 0;
            padding: 0;
            position: relative;
            left: 0;
            margin-top: -50px;
            margin-bottom: -45px;
        }

        /* Card Styles */
        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 20px;
            margin-bottom: 20px;
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

        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .map-container {
                height: 50vh;
            }

            .card {
                padding: 15px;
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
    <section    style="
    background: linear-gradient(to bottom, #7de3f1, #ffffff);
    margin: 0;
    padding: 0;
    position: relative;
    left: 0;
  "
    class="header-banner">
        <section class="container max-w-[1130px] mx-auto" style="margin-top: 165px;">
            <br><br>
            <div class="flex items-center gap-[20px]">
                <!-- Content here -->
            </div>
        </section>
    </section>

    <!-- Main Content Section -->
    <section id="details" class="container max-w-[1130px] mx-auto flex flex-col sm:flex-row gap-5">
        <div class="flex flex-col gap-5 w-full">
            <div class="bg-white flex flex-col gap-5 p-5 rounded-[20px] w-full">
                <div class="w-full bg-[#030303] flex items-center gap-[10px] p-[10px_14px] rounded-xl">
                    <div class="w-5 h-5 flex shrink-0">
                        <img src="/assets/new/icons/story.svg" alt="icon">
                    </div>
                    <p class="text-white font-normal text-sm">
                        <span class="font-bold">Informasi Bantuan Teknis Penyelenggaraan Bangunan Gedung Negara</span>
                    </p>
                </div>

                <!-- Include Menu -->
                @include('frontend.abgblora.01_pbgslf.00_informasi.fiturmenupbg')

                <!-- Information Cards -->
                <div class="container-fluid px-4" style="margin-top: -25px;">
                    <!-- Lampiran Section -->
                    <div class="mb-5">
                        <h6 class="fw-semibold mb-4" style="font-size: 18px;">
                            <i class="bi bi-paperclip text-primary"></i> Lampiran Informasi
                        </h6>

                        <div class="row g-4">
                            <div class="col-md-12">
                                <a href="#" class="text-decoration-none">
                                    <div class="card shadow-sm border-0 h-100">
                                        <img src="/assets/android/pbgslf/PBG_FUNGSI_CAMPURAN.png" class="card-img-top" alt="thumbnail" style="object-fit: cover;">
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
                    <div class="p-4 rounded" style="background-color: #4041DA; color: white;">
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
