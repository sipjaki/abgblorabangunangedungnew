<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<style>
    :root {
        --primary: #002366; /* Navy blue lebih gelap */
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
        background-color: var(--light-bg);
        color: var(--text-dark);
        line-height: 1.6;
    }

    /* Header Styles */
    .header {
        background: linear-gradient(135deg, var(--navy-dark), var(--navy-primary));
        color: white;
        padding: 2rem 0;
        position: relative;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .header::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100" preserveAspectRatio="none"><path fill="rgba(255,255,255,0.05)" d="M0,0 L100,0 L100,100 L0,100 Z" /></svg>');
        opacity: 0.1;
    }

    /* Breadcrumb Section */
    #breadcrumb {
        background: linear-gradient(to bottom, #7de3f1, #ffffff);
        width: 100vw;
        margin: 0;
        padding: 0;
        position: relative;
        left: 0;
        margin-top: -50px;
        margin-bottom: -45px;
    }

    .breadcrumb-container {
        max-width: 1130px;
        margin: 0 auto;
        padding-top: 200px;
    }

    /* Card Styles */
    .card {
        background: var(--card-bg);
        border-radius: 12px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
        padding: 2.5rem;
        margin-bottom: 2.5rem;
        border-left: 6px solid var(--accent-blue);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 12px 28px rgba(0, 0, 0, 0.12);
    }

    .card-title {
        color: var(--navy-primary);
        font-size: 1.5rem;
        margin-bottom: 1.5rem;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid rgba(0, 0, 0, 0.1);
        position: relative;
        display: flex;
        align-items: center;
    }

    .card-title i {
        margin-right: 12px;
        color: var(--accent-blue);
    }

    .card-title::after {
        content: '';
        position: absolute;
        left: 0;
        bottom: -2px;
        width: 80px;
        height: 2px;
        background: var(--accent-blue);
    }

    /* Info Box */
    .info-box {
        background: rgba(90, 177, 240, 0.08);
        border-radius: 8px;
        padding: 1.75rem;
        margin: 1.75rem 0;
        border-left: 4px solid var(--accent-blue);
        transition: all 0.3s ease;
    }

    .info-box:hover {
        background: rgba(90, 177, 240, 0.15);
    }

    /* Button Styles */
    .button-baru {
        background-color: var(--accent-blue);
        color: white;
        border: none;
        padding: 10px 20px;
        border-radius: 50px;
        font-weight: 500;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .button-baru:hover {
        background-color: white;
        color: var(--accent-blue);
        border: 1px solid var(--accent-blue);
    }

    /* Form Styles */
    .form-control {
        border-radius: 8px;
        padding: 10px 15px;
        border: 1px solid var(--gray);
        transition: all 0.3s ease;
    }

    .form-control:focus {
        border-color: var(--accent-blue);
        box-shadow: 0 0 0 0.25rem rgba(58, 123, 181, 0.25);
    }

    /* Alert Styles */
    .alert {
        border-radius: 8px;
        padding: 1rem;
        margin-bottom: 1rem;
    }

    /* Table Styles */
    .zebra-table {
        border-collapse: collapse;
        width: 100%;
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
        border-left: 4px solid transparent;
    }

    .step:hover {
        background: rgba(58, 123, 181, 0.1);
        border-left-color: var(--accent-blue);
        transform: translateX(8px);
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

    /* Responsive */
    @media (max-width: 768px) {
        .breadcrumb-container {
            padding-top: 150px;
        }

        .card {
            padding: 1.75rem;
        }
    }
</style>

@include('frontend.abgblora.00_fiturmenu.02_header')
@include('frontend.abgblora.00_fiturmenu.05_menunavigasweb')
@include('backend.00_administrator.00_baganterpisah.09_button')

<!-- Breadcrumb Section -->
<section id="breadcrumb">
    <div class="breadcrumb-container">
        <div class="flex items-center gap-[20px]">
            <img src="/assets/abgblora/logo/iconabgblora.png" alt="Logo" class="w-[60px] -my-[15px]" style="margin-right: 20px;">
            <div class="flex gap-[30px] items-center flex-wrap">
                <span>/</span>
                <a href="/permohonankrk" class="last-of-type:font-bold transition-all duration-300 text-blue-600">
                    {{$title}}
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Main Content Section -->
<section id="details" class="container max-w-[1130px] mx-auto flex flex-col sm:flex-row gap-5" style="margin-top: 30px;">
    <div class="flex flex-col gap-5 w-full">
        <div class="bg-white flex flex-col gap-5 p-5 rounded-[20px] w-full">
            <div class="w-full bg-[#030303] flex items-center gap-[10px] p-[10px_14px] rounded-xl">
                <div class="w-5 h-5 flex shrink-0">
                    <img src="/assets/new/icons/story.svg" alt="icon">
                </div>
                <p class="text-white font-normal text-sm">
                    <span class="font-bold">Informasi Permohonan (PBG) Persetujuan Bangunan Gedung & (SLF) Sertifikat Laik Fungsi</span>
                </p>
            </div>

            <div class="container-fluid" style="color: black !important;">
                <div class="row" style="margin: 0 10px;">
                    <div class="card mb-4" style="color: black !important;">
                        <div class="card-header" style="
                            font-weight: 600;
                            font-size: 14px;
                            text-align: center;
                            background: linear-gradient(135deg, #000080, #000080);
                            color: white;
                            padding: 10px 25px;
                            border-radius: 10px;
                            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
                            width: 100%;
                        ">
                            <span style="font-family: 'Poppins', sans-serif;">Halaman : Berkas Pencarian Permohonan PBG/SLF</span>
                        </div>

                        <div class="card-body" style="background: white; color: black !important;">
                            <!-- Judul -->
                            <div class="text-center mb-4">
                                <h3 class="fw-bold text-primary" style="color: black !important;">Tracking Berkas Permohonan PBG / SLF</h3>
                                <p class="text-muted" style="color: black !important;">Masukkan Nomor Registrasi SIMBG Saudara</p>
                            </div>

                            <!-- Form -->
                            <form method="GET" action="{{ route('betrackingdatacariweb') }}" class="row g-3 justify-content-center mb-4">
                                <div class="col-md-6">
                                    <input
                                        type="text"
                                        name="noregissimbg"
                                        class="form-control @error('noregissimbg') is-invalid @enderror"
                                        placeholder="Contoh: PBG-2024-XYZ"
                                        value="{{ request('noregissimbg') }}"
                                        required
                                        style="color: black !important;"
                                    >
                                    @error('noregissimbg')
                                        <div class="invalid-feedback" style="color: black !important;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-auto">
                                    <button type="submit" class="button-baru">
                                        <i class="bi bi-search" style="color: black !important;"></i> Cari
                                    </button>
                                </div>
                            </form>

                            <!-- Hasil -->
                            @if(isset($data) && $data)
                                <div class="card shadow border-0 mb-4" style="color: black !important;">
                                    <div class="card-body bg-white text-black">
                                        <h5 class="card-title fw-bold text-center mb-4" style="font-size: 16px;">
                                            Status Permohonan SIMBG
                                        </h5>

                                        <div class="d-flex justify-content-center">
                                            <div class="table-responsive" style="max-width: 600px;">
                                                <table class="table table-bordered table-striped text-start mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th style="width: 200px;">Nomor Registrasi</th>
                                                            <td>{{ $data->noregissimbg }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Nama Pemohon</th>
                                                            <td>{{ $data->namapemohon ?? 'Tidak Tersedia' }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                        <!-- Tambahan fiturstatus -->
                                        <div style="color: black !important;">
                                            @include('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.00_fiturstatus')
                                        </div>
                                    </div>
                                </div>
                            @elseif(request('noregissimbg'))
                                <div class="alert alert-danger text-center" role="alert" style="color: black !important;">
                                    Data tidak ditemukan untuk nomor registrasi: <strong>{{ request('noregissimbg') }}</strong>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process Information Section -->
<section class="container max-w-[1130px] mx-auto">
    <div class="card">
        <div class="card-title">
            <i class="fas fa-info-circle"></i> Proses Permohonan PBG/SLF
        </div>

        <div class="process-steps">
            <div class="step">
                <strong>Pendaftaran Permohonan</strong>
                <p>Pemohon mengisi formulir permohonan dan melengkapi persyaratan dokumen yang diperlukan.</p>
            </div>

            <div class="step">
                <strong>Verifikasi Dokumen</strong>
                <p>Petugas melakukan pemeriksaan kelengkapan dan keabsahan dokumen permohonan.</p>
            </div>

            <div class="step">
                <strong>Pemeriksaan Teknis</strong>
                <p>Tim teknis melakukan pemeriksaan lapangan dan evaluasi kelayakan bangunan.</p>
            </div>

            <div class="step">
                <strong>Persetujuan PBG</strong>
                <p>Penerbitan Persetujuan Bangunan Gedung setelah memenuhi semua persyaratan.</p>
            </div>

            <div class="step">
                <strong>Penerbitan SLF</strong>
                <p>Penerbitan Sertifikat Laik Fungsi setelah bangunan selesai dibangun dan memenuhi persyaratan.</p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Information Section -->
<section class="container max-w-[1130px] mx-auto">
    <div class="contact-section">
        <div class="contact-title">
            <i class="fas fa-headset"></i> Butuh Bantuan?
        </div>
        <p>Jika Anda mengalami kesulitan dalam proses permohonan atau memiliki pertanyaan, silakan hubungi kami melalui:</p>
        <a href="mailto:info@abgblora.go.id" class="contact-email">
            <i class="fas fa-envelope"></i> info@abgblora.go.id
        </a>
    </div>
</section>

<br><br>

@include('frontend.abgblora.00_fiturmenu.03_footer')

<!-- back to top start -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>
<!-- back to top end -->

@include('frontend.abgblora.00_fiturmenu.04_footer')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Fungsi untuk animasi scroll to top
    document.querySelector('.progress-wrap').addEventListener('click', function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // Tampilkan tombol scroll to top ketika halaman di-scroll
    window.addEventListener('scroll', function() {
        const progressWrap = document.querySelector('.progress-wrap');
        if (window.pageYOffset > 300) {
            progressWrap.style.opacity = '1';
            progressWrap.style.visibility = 'visible';
        } else {
            progressWrap.style.opacity = '0';
            progressWrap.style.visibility = 'hidden';
        }
    });
</script>
