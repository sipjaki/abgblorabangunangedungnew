
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

    <style>
        :root {
            --primary: #002366;
            --secondary: #1E4B8B;
            --accent: #3A7CA5;
            --light: #F0F4F8;
            --gray: #E1E5EA;
            --dark-gray: #6C757D;
            --white: #FFFFFF;
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

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(to bottom, #7de3f1, #ffffff);
            color: var(--text-dark);
            line-height: 1.6;
            min-height: 100vh;
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, var(--navy-dark), var(--navy-primary));
            color: white;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        /* Main Container */
        .main-container {
            max-width: 1130px;
            margin: 0 auto;
            padding: 20px;
        }

        /* Breadcrumb Section */
        .breadcrumb-section {
            padding: 120px 0 30px;
        }

        .breadcrumb-content {
            display: flex;
            align-items: center;
            gap: 20px;
        }

        .breadcrumb-logo {
            width: 60px;
            height: auto;
        }

        .breadcrumb-links {
            display: flex;
            align-items: center;
            gap: 30px;
        }

        /* Card Styles */
        .card {
            background: var(--card-bg);
            border-radius: 12px;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            padding: 2rem;
            margin-bottom: 2rem;
            border-left: 6px solid var(--accent-blue);
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
        }

        .card-header {
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-light));
            color: white;
            padding: 10px 25px;
            border-radius: 10px;
            font-weight: 600;
            text-align: center;
            margin-bottom: 1.5rem;
        }

        /* Form Styles */
        .search-form {
            max-width: 800px;
            margin: 0 auto;
        }

        .search-input {
            border-radius: 8px;
            padding: 12px 15px;
            border: 1px solid var(--gray);
            transition: all 0.3s ease;
        }

        .search-input:focus {
            border-color: var(--accent-blue);
            box-shadow: 0 0 0 0.25rem rgba(58, 123, 181, 0.25);
        }

        .search-button {
            background-color: var(--accent-blue);
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .search-button:hover {
            background-color: white;
            color: var(--accent-blue);
            border: 1px solid var(--accent-blue);
        }

        /* Results Section */
        .results-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        .results-table th {
            background-color: var(--navy-primary);
            color: white;
            padding: 12px;
            text-align: left;
        }

        .results-table td {
            padding: 12px;
            border-bottom: 1px solid var(--gray);
        }

        .results-table tr:nth-child(even) {
            background-color: rgba(90, 177, 240, 0.05);
        }

        .results-table tr:hover {
            background-color: rgba(90, 177, 240, 0.1);
        }

        /* Process Steps */
        .process-steps {
            counter-reset: step;
            padding-left: 0;
            margin-top: 2rem;
        }

        .step {
            position: relative;
            padding: 1.5rem 1.5rem 1.5rem 5rem;
            margin-bottom: 1rem;
            background: rgba(58, 123, 181, 0.05);
            border-radius: 8px;
            counter-increment: step;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .step:hover {
            background: rgba(58, 123, 181, 0.1);
            border-left-color: var(--accent-blue);
            transform: translateX(8px);
        }

        .step::before {
            content: counter(step);
            position: absolute;
            left: 1.5rem;
            top: 50%;
            transform: translateY(-50%);
            background: var(--accent-blue);
            color: white;
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* Contact Section */
        .contact-section {
            background: linear-gradient(135deg, var(--navy-primary), var(--navy-light));
            color: white;
            padding: 2.5rem;
            border-radius: 12px;
            margin: 3rem 0;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .contact-email {
            display: inline-block;
            background: rgba(255, 255, 255, 0.15);
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            margin-top: 1rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .contact-email:hover {
            background: rgba(255, 255, 255, 0.25);
            text-decoration: none;
            color: white;
        }

        /* Back to Top Button */
        .progress-wrap {
            position: fixed;
            right: 30px;
            bottom: 30px;
            height: 46px;
            width: 46px;
            cursor: pointer;
            display: block;
            border-radius: 50px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            opacity: 0;
            visibility: hidden;
            z-index: 1000;
            background: var(--accent-blue);
            transition: all 0.3s;
        }

        .progress-wrap.active-progress {
            opacity: 1;
            visibility: visible;
        }

        .progress-wrap svg {
            width: 100%;
            height: 100%;
            fill: none;
        }

        .progress-wrap svg path {
            stroke: white;
            stroke-width: 4;
            stroke-linecap: round;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .breadcrumb-section {
                padding: 100px 0 20px;
            }

            .breadcrumb-content {
                flex-direction: column;
                gap: 10px;
                text-align: center;
            }

            .card {
                padding: 1.5rem;
            }

            .step {
                padding: 1.25rem 1rem 1.25rem 4rem;
            }

            .step::before {
                left: 1rem;
            }
        }
    </style>
    <!-- Header Section -->
    @include('frontend.abgblora.00_fiturmenu.02_header')

    <!-- Navigation Menu -->
    @include('frontend.abgblora.00_fiturmenu.05_menunavigasweb')

    <!-- Admin Button (if needed) -->
    @include('backend.00_administrator.00_baganterpisah.09_button')

    <!-- Main Content -->
    <div class="main-container">
        <!-- Breadcrumb Section -->
        <section class="breadcrumb-section">
            <div class="breadcrumb-content">
                <img src="/assets/abgblora/logo/iconabgblora.png" alt="Logo ABGBlorA" class="breadcrumb-logo">
                <div class="breadcrumb-links">
                    <span>/</span>
                    <a href="/permohonankrk" class="text-blue-600">{{$title}}</a>
                </div>
            </div>
        </section>

        <!-- Tracking Form Section -->
        <section class="tracking-section">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-search"></i> Tracking Permohonan PBG/SLF
                </div>

                <div class="card-body">
                    <div class="text-center mb-4">
                        <h3 class="fw-bold">Cari Status Permohonan Anda</h3>
                        <p class="text-muted">Masukkan Nomor Registrasi SIMBG untuk melacak status permohonan</p>
                    </div>

                    <form method="GET" action="{{ route('betrackingdatacariweb') }}" class="search-form row g-3 justify-content-center mb-4">
                        <div class="col-md-8">
                            <input
                                type="text"
                                name="noregissimbg"
                                class="form-control search-input @error('noregissimbg') is-invalid @enderror"
                                placeholder="Contoh: PBG-2024-XYZ"
                                value="{{ request('noregissimbg') }}"
                                required
                            >
                            @error('noregissimbg')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-4 col-auto">
                            <button type="submit" class="btn search-button w-100">
                                <i class="fas fa-search"></i> Cari Status
                            </button>
                        </div>
                    </form>

                    <!-- Results Section -->
                    @if(isset($data) && $data)
                        <div class="card results-card mt-4">
                            <div class="card-body">
                                <h5 class="card-title text-center mb-4">
                                    <i class="fas fa-file-alt"></i> Detail Permohonan
                                </h5>

                                <div class="table-responsive">
                                    <table class="results-table">
                                        <tbody>
                                            <tr>
                                                <th width="30%">Nomor Registrasi</th>
                                                <td>{{ $data->noregissimbg }}</td>
                                            </tr>
                                            <tr>
                                                <th>Nama Pemohon</th>
                                                <td>{{ $data->namapemohon ?? 'Tidak Tersedia' }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Status Section -->
                                <div class="mt-4">
                                    @include('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.00_fiturstatus')
                                </div>
                            </div>
                        </div>
                    @elseif(request('noregissimbg'))
                        <div class="alert alert-danger text-center mt-4" role="alert">
                            <i class="fas fa-exclamation-circle"></i> Data tidak ditemukan untuk nomor registrasi: <strong>{{ request('noregissimbg') }}</strong>
                        </div>
                    @endif
                </div>
            </div>
        </section>

        <!-- Process Information Section -->
        <section class="process-section">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-info-circle"></i> Proses Permohonan PBG/SLF
                </div>

                <div class="card-body">
                    <div class="process-steps">
                        <div class="step">
                            <strong>Pendaftaran Permohonan</strong>
                            <p class="mb-0">Pemohon mengisi formulir permohonan dan melengkapi persyaratan dokumen yang diperlukan.</p>
                        </div>

                        <div class="step">
                            <strong>Verifikasi Dokumen</strong>
                            <p class="mb-0">Petugas melakukan pemeriksaan kelengkapan dan keabsahan dokumen permohonan.</p>
                        </div>

                        <div class="step">
                            <strong>Pemeriksaan Teknis</strong>
                            <p class="mb-0">Tim teknis melakukan pemeriksaan lapangan dan evaluasi kelayakan bangunan.</p>
                        </div>

                        <div class="step">
                            <strong>Persetujuan PBG</strong>
                            <p class="mb-0">Penerbitan Persetujuan Bangunan Gedung setelah memenuhi semua persyaratan.</p>
                        </div>

                        <div class="step">
                            <strong>Penerbitan SLF</strong>
                            <p class="mb-0">Penerbitan Sertifikat Laik Fungsi setelah bangunan selesai dibangun dan memenuhi persyaratan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Contact Information Section -->
        <section class="contact-section">
            <h3 class="contact-title">
                <i class="fas fa-headset"></i> Butuh Bantuan?
            </h3>
            <p>Jika Anda mengalami kesulitan dalam proses permohonan atau memiliki pertanyaan, silakan hubungi kami melalui:</p>
            <a href="mailto:info@abgblora.go.id" class="contact-email">
                <i class="fas fa-envelope"></i> info@abgblora.go.id
            </a>
        </section>
    </div>

    <!-- Footer Section -->
    @include('frontend.abgblora.00_fiturmenu.03_footer')

    <!-- Back to Top Button -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- Additional Footer (if needed) -->
    @include('frontend.abgblora.00_fiturmenu.04_footer')

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        // Back to Top Button Functionality
        document.addEventListener('DOMContentLoaded', function() {
            const progressWrap = document.querySelector('.progress-wrap');

            // Show/hide button on scroll
            window.addEventListener('scroll', function() {
                if (window.pageYOffset > 300) {
                    progressWrap.classList.add('active-progress');
                } else {
                    progressWrap.classList.remove('active-progress');
                }
            });

            // Smooth scroll to top
            progressWrap.addEventListener('click', function() {
                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });
            });
        });
    </script>
