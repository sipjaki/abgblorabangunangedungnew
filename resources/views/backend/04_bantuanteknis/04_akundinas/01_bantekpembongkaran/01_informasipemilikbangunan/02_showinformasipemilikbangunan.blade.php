@include('backend.00_administrator.00_baganterpisah.01_header')

<!--begin::Body-->
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
 <!--begin::App Wrapper-->
 <div class="app-wrapper">
{{-- ---------------------------------------------------------------------- --}}

@include('backend.00_administrator.00_baganterpisah.04_navbar')
@include('backend.00_administrator.00_baganterpisah.09_button')
{{-- ---------------------------------------------------------------------- --}}

   @include('backend.00_administrator.00_baganterpisah.03_sidebar')
   @include('frontend.android.00_fiturmenu.06_alert')


   <!--begin::App Main-->
   <main class="app-main"
   style="
    background: linear-gradient(to bottom, #ffffff, #ffffff);
    margin: 0;
    padding: 0;
    position: relative;
    left: 0;
  ">
     <!--begin::App Content Header-->
     <div class="app-content-header">
       <!--begin::Container-->
       <div class="container-fluid">
         <!--begin::Row-->
         <div class="row">

@include('backend.00_administrator.00_baganterpisah.10_selamatdatang')

           {{-- <div class="col-sm-12"><h3 class="mb-0">Selamat datang ! <span style="color: black; font-weight:800;" > {{ Auth::user()->name }}</span> di Dashboard <span style="color: black; font-weight:800;"> {{ Auth::user()->statusadmin->statusadmin }} </span>  Sistem Informasi Pembina Jasa Konstruksi Kab Blora</h3></div> --}}

         </div>
         <!--end::Row-->
       </div>
       <!--end::Container-->
     </div>

     <!-- Menampilkan pesan sukses -->
<br>
     {{-- ======================================================= --}}
     {{-- ALERT --}}

     {{-- @include('backend.00_administrator.00_baganterpisah.06_alert') --}}

     {{-- ======================================================= --}}

     <div class="container-fluid">
         <!--begin::Row-->
         <div class="putih row" style="margin-right: 10px; margin-left:10px;">
             <!-- /.card -->
             <div class="card mb-4">
                 {{-- <div class="card-header">
                    <div style="
                    font-weight: 900;
                    font-size: 16px;
                    text-align: center;
                    background: linear-gradient(135deg, #00378a, #00378a);
                    color: white;
                    padding: 8px 10px;
                    border-radius: 10px;
                    display: inline-block;
                    box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
                ">
                    ⚙️ Setting Database
                </div> --}}

                     {{-- <div style="display: flex; justify-content: flex-end; margin-bottom: 5px;">
                         <a href="/404">
                             <button
                             onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                             onmouseout="this.style.backgroundColor='#00378a'; this.style.color='white';"
                             style="background-color: #00378a; color: white; border: none; margin-right: 10px; padding: 10px 20px; border-radius: 15px; font-size: 16px; cursor: pointer; display: flex; align-items: center; transition: background-color 0.3s, color 0.3s; text-decoration: none;">
                             <!-- Ikon Kembali -->
                             <i class="fa fa-database" style="margin-right: 8px;"></i>
                             Asosiasi
                         </button>
                         </a>

                     </div> --}}
                 </div>
                 <!-- /.card-header -->
                 <div class="card-header">

                    <div>
                    @include('backend.00_administrator.00_baganterpisah.11_judulhalaman')
            </div>





                     <div style="display: flex; justify-content: flex-end; margin-bottom: 5px;">

{{-- <button class="button-kembali" type="button"
    onclick="window.location.href='{{ url()->previous() }}';"
    style="cursor: pointer; margin-left:10px; color:black;">
    <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
</button> --}}



                                <!-- Tombol Create -->
                                {{-- <a href="/settingssekolah/create">
                                    <button
                                        onmouseover="this.style.background='white'; this.style.color='black';"
                                        onmouseout="this.style.background='linear-gradient(to right, #228B22, #d4af37)'; this.style.color='white';"
                                        style="background: linear-gradient(to right, #228B22, #d4af37); color: white; border: none; margin-right: 10px; padding: 10px 20px; border-radius: 15px; font-size: 16px; cursor: pointer; display: flex; align-items: center; transition: background 0.3s, color 0.3s; text-decoration: none;">
                                        <i class="fa fa-plus" style="margin-right: 8px;"></i> Create
                                    </button>
                                </a> --}}



                        {{-- <a href="/bekrkindex">
                             <button
                             onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                             onmouseout="this.style.backgroundColor='#374151'; this.style.color='white';"
                             style="background-color: #374151; color: white; border: none; margin-right: 10px; padding: 10px 20px; border-radius: 15px; font-size: 16px; cursor: pointer; display: flex; align-items: center; transition: background-color 0.3s, color 0.3s; text-decoration: none;">
                             <!-- Ikon Kembali -->
                             <i class="fa fa-arrow-left" style="margin-right: 8px;"></i> Kembali

                         </button>
                         </a> --}}

                     </div>
                 </div>
<br>
                 <hr>
                 <!-- /.card-header -->
                 <div class="card-body p-0">

        {{-- ======================================================= --}}
                    <div class="col-md-12">
                        <!--begin::Quick Example-->
<style>
    /* CSS Modern */
    .doc-grid {
        background: #ffffff;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        border: 1px solid #e3e6f0;
    }

    .doc-card {
        background: #fff;
        border-radius: 12px;
        padding: 25px;
        height: 100%;
        transition: all 0.3s ease;
        border: 2px solid #eef2ff;
        position: relative;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .doc-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(59, 130, 246, 0.15);
        border-color: #3b82f6;
    }

    .doc-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        color: white;
        font-size: 1.8rem;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    .doc-title {
        margin-bottom: 25px;
    }

    .doc-title h4 {
        font-weight: 600;
        color: #1f2937;
        font-size: 1.3rem;
        line-height: 1.4;
        margin-bottom: 5px;
    }

    .doc-title p {
        color: #6b7280;
        font-size: 0.9rem;
        margin: 0;
    }

    /* Button Styles */
    .button-container {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-top: 20px;
    }


    /* Form Styles */
    .form-modern {
        margin-bottom: 1.5rem;
    }

    .form-label-modern {
        display: flex;
        align-items: center;
        font-weight: 500;
        color: #374151;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .form-label-modern i {
        margin-right: 0.5rem;
        font-size: 1.1rem;
    }

    .form-control {
        border: 1px solid #d1d5db;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .form-select {
        border: 1px solid #d1d5db;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: all 0.3s;
    }

    .form-select:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    /* Section Header */
    .section-header {
        font-weight: 600;
        color: #1f2937;
        margin: 2rem 0 1.5rem 0;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #e5e7eb;
        font-size: 1.1rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .doc-card {
            padding: 20px;
        }

        .doc-icon {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }

        .doc-title h4 {
            font-size: 1.1rem;
        }

        .button-container {
            flex-direction: column;
        }
    }
</style>
<!-- FORM UNTUK UPLOAD DOKUMEN (Contoh untuk INFORMASI PEMILIK BANGUNAN) -->


<style>
    /* CSS Modern */
    .doc-grid {
        background: #ffffff;
        border-radius: 15px;
        padding: 25px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        border: 1px solid #e3e6f0;
    }

    .doc-card {
        background: #fff;
        border-radius: 12px;
        padding: 25px;
        height: 100%;
        transition: all 0.3s ease;
        border: 2px solid #eef2ff;
        position: relative;
        overflow: hidden;
        margin-bottom: 20px;
    }

    .doc-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(59, 130, 246, 0.15);
        border-color: #3b82f6;
    }

    .doc-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 20px;
        color: white;
        font-size: 1.8rem;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    .doc-title {
        margin-bottom: 25px;
    }

    .doc-title h4 {
        font-weight: 600;
        color: #1f2937;
        font-size: 1.3rem;
        line-height: 1.4;
        margin-bottom: 5px;
    }

    .doc-title p {
        color: #6b7280;
        font-size: 0.9rem;
        margin: 0;
    }

    /* Button Styles */
    .button-container {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-top: 20px;
    }
    /* Form Styles */
    .form-modern {
        margin-bottom: 1.5rem;
    }

    .form-label-modern {
        display: flex;
        align-items: center;
        font-weight: 500;
        color: #374151;
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .form-label-modern i {
        margin-right: 0.5rem;
        font-size: 1.1rem;
    }

    .form-control {
        border: 1px solid #d1d5db;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: all 0.3s;
    }

    .form-control:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    .form-select {
        border: 1px solid #d1d5db;
        border-radius: 8px;
        padding: 0.75rem 1rem;
        transition: all 0.3s;
    }

    .form-select:focus {
        border-color: #3b82f6;
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
    }

    /* Section Header */
    .section-header {
        font-weight: 600;
        color: #1f2937;
        margin: 2rem 0 1.5rem 0;
        padding-bottom: 0.75rem;
        border-bottom: 2px solid #e5e7eb;
        font-size: 1.1rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .doc-card {
            padding: 20px;
        }

        .doc-icon {
            width: 60px;
            height: 60px;
            font-size: 1.5rem;
        }

        .doc-title h4 {
            font-size: 1.1rem;
        }

        .button-container {
            flex-direction: column;
        }
    }
</style>


<style>
    /* CSS Modern untuk View Data */
    .data-view-container {
        background: #ffffff;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        border: 1px solid #e3e6f0;
        margin-bottom: 30px;
    }

    .data-section {
        margin-bottom: 40px;
        padding-bottom: 20px;
        border-bottom: 2px solid #f3f4f6;
    }

    .section-header {
        display: flex;
        align-items: center;
        margin-bottom: 25px;
        padding-bottom: 15px;
        border-bottom: 2px solid #e5e7eb;
    }

    .section-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-right: 20px;
        color: white;
        font-size: 1.5rem;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    .section-title {
        font-weight: 600;
        color: #1f2937;
        font-size: 1.2rem;
        margin: 0;
    }

    .section-subtitle {
        color: #6b7280;
        font-size: 0.9rem;
        margin: 5px 0 0 0;
    }

    .data-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }

    .data-card {
        background: #f8fafc;
        border-radius: 10px;
        padding: 20px;
        border: 1px solid #e2e8f0;
        transition: all 0.3s ease;
    }

    .data-card:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        border-color: #3b82f6;
    }

    .data-label {
        display: flex;
        align-items: center;
        font-weight: 500;
        color: #6b7280;
        font-size: 0.85rem;
        margin-bottom: 8px;
    }

    .data-label i {
        margin-right: 8px;
        color: #3b82f6;
        font-size: 1rem;
    }

    .data-value {
        font-weight: 600;
        color: #1f2937;
        font-size: 1rem;
        padding: 8px 0;
        word-break: break-word;
    }

    .data-value.empty {
        color: #9ca3af;
        font-style: italic;
    }

    .file-preview-container {
        background: linear-gradient(135deg, #f8fafc 0%, #e2e8f0 100%);
        border-radius: 10px;
        padding: 20px;
        border: 2px solid #d1d5db;
        transition: all 0.3s ease;
    }

    .file-preview-container:hover {
        border-color: #3b82f6;
        background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
    }

    .file-info-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 15px;
    }

    .file-icon-type {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .file-icon {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.2rem;
    }

    .file-icon.pdf {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    }

    .file-icon.image {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
    }

    .file-icon.doc {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
    }

    .file-icon.ktp {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }

    .file-name {
        font-weight: 600;
        color: #1f2937;
        font-size: 0.95rem;
    }

    .file-actions {
        display: flex;
        gap: 8px;
    }

    .btn-file {
        padding: 6px 12px;
        border-radius: 6px;
        border: none;
        font-weight: 500;
        font-size: 0.8rem;
        cursor: pointer;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .btn-view {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
    }

    .btn-view:hover {
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        transform: translateY(-1px);
    }

    .btn-download {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
    }

    .btn-download:hover {
        background: linear-gradient(135deg, #059669 0%, #047857 100%);
        transform: translateY(-1px);
    }

    .file-preview-content {
        margin-top: 15px;
        min-height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: white;
        border-radius: 8px;
        padding: 20px;
        border: 1px solid #e5e7eb;
    }

    .image-preview {
        max-width: 100%;
        max-height: 400px;
        object-fit: contain;
        border-radius: 6px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .pdf-preview {
        width: 100%;
        height: 400px;
        border-radius: 6px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .no-file-message {
        text-align: center;
        color: #9ca3af;
        padding: 30px;
    }

    .no-file-message i {
        font-size: 3rem;
        margin-bottom: 15px;
        color: #d1d5db;
        display: block;
    }

    .no-file-message p {
        margin: 0;
        font-size: 0.9rem;
    }

    /* Modal untuk preview file */
    .preview-modal {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.8);
        z-index: 1000;
        align-items: center;
        justify-content: center;
    }

    .preview-modal-content {
        background: white;
        border-radius: 12px;
        padding: 20px;
        max-width: 90%;
        max-height: 90%;
        position: relative;
    }

    .modal-close {
        position: absolute;
        top: 10px;
        right: 10px;
        background: #ef4444;
        color: white;
        border: none;
        border-radius: 50%;
        width: 30px;
        height: 30px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .data-view-container {
            padding: 20px;
        }

        .data-grid {
            grid-template-columns: 1fr;
        }

        .section-header {
            flex-direction: column;
            align-items: flex-start;
        }

        .section-icon {
            margin-right: 0;
            margin-bottom: 15px;
        }

        .file-info-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 10px;
        }

        .file-actions {
            align-self: stretch;
            justify-content: center;
        }
    }
</style>

<div class="col-md-12">
    <div class="data-view-container">
        <!-- Header Utama -->
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h3 style="color: #1f2937; font-weight: 600; margin-bottom: 5px;">
                    <i class="bi bi-building text-primary me-2"></i>
                    Data Informasi Pemilik Bangunan
                </h3>
                <p style="color: #6b7280; margin: 0;">Detail lengkap informasi pemilik dan bangunan</p>
            </div>


    <!-- BUTTON AKSI -->
    <div class="d-flex gap-2">
        <!-- KEMBALI -->
      <a href="{{ url()->previous() }}" class="button-modern">
    <i class="bi bi-arrow-left me-1"></i> Kembali
</a>



        <!-- KEMBALI KE DATA DASAR -->
        <a href="{{ route('bebantekpembongkaran') }}"
           class="button-baru">
            <i class="bi bi-folder2-open me-1"></i> Data Dasar
        </a>
    </div>
        </div>

        @php
            // Data dari database
            $dataBangunan = $data->bantekPembongkaran ?? null;

            // Helper function untuk mengecek file
            function fileExists($path) {
                if (empty($path)) return false;

                // Cek di storage
                if (strpos($path, 'storage/') === 0 || strpos($path, '/storage/') !== false) {
                    $storagePath = str_replace('storage/', '', $path);
                    $storagePath = str_replace('/storage/', '', $storagePath);
                    return file_exists(storage_path('app/public/' . $storagePath));
                }

                // Cek di public path
                return file_exists(public_path($path));
            }

            // Helper function untuk mendapatkan URL file
            function getFileUrl($path) {
                if (empty($path)) return null;

                if (strpos($path, 'storage/') === 0) {
                    return asset('storage/' . str_replace('storage/', '', $path));
                }

                if (strpos($path, '/storage/') !== false) {
                    return asset($path);
                }

                return asset('storage/' . $path);
            }

            // Helper function untuk mendapatkan ekstensi file
            function getFileExtension($path) {
                if (empty($path)) return null;
                return strtolower(pathinfo($path, PATHINFO_EXTENSION));
            }

            // Helper function untuk menampilkan preview berdasarkan jenis file
            function renderFilePreview($filePath, $fileName = 'File') {
                $fileUrl = getFileUrl($filePath);
                $fileExt = getFileExtension($filePath);

                if (!$fileUrl) {
                    return '<div class="no-file-message">
                        <i class="bi bi-file-earmark-excel"></i>
                        <p>File tidak ditemukan</p>
                    </div>';
                }

                // Preview berdasarkan jenis file
                if (in_array($fileExt, ['jpg', 'jpeg', 'png', 'gif', 'bmp'])) {
                    return '<img src="' . $fileUrl . '" alt="' . $fileName . '" class="image-preview" loading="lazy">';
                } elseif ($fileExt === 'pdf') {
                    return '<iframe src="' . $fileUrl . '" class="pdf-preview" frameborder="0"></iframe>';
                } else {
                    return '<div class="no-file-message">
                        <i class="bi bi-file-earmark-text"></i>
                        <p>Preview tidak tersedia untuk format file ini</p>
                        <a href="' . $fileUrl . '" target="_blank" class="btn btn-primary mt-2">Download untuk melihat</a>
                    </div>';
                }
            }
        @endphp

        <!-- 1. DATA SURAT PERMOHONAN -->
        <div class="data-section">
            <div class="section-header">
                <div class="section-icon">
                    <i class="bi bi-file-earmark-text"></i>
                </div>
                <div>
                    <h4 class="section-title">Data Surat Permohonan</h4>
                    <p class="section-subtitle">Informasi surat permohonan pembongkaran</p>
                              </div>
            </div>

            <div class="data-grid">
                <!-- Nomor Surat -->
                <div class="data-card">
                    <div class="data-label">
                        <i class="bi bi-hash"></i> Nomor Surat
                    </div>
                    <div>
                        {{ $dataBangunan->bantekpembongkarannew1->nosurat ?? 'Belum diisi' }}
                    </div>
                </div>

                <!-- Tanggal Surat -->
                <div class="data-card">
                    <div class="data-label">
                        <i class="bi bi-calendar-date"></i> Tanggal Surat
                    </div>
                  <div class="data-value @if(empty(optional($dataBangunan)->tanggalsurat)) empty @endif">
                        {{ optional($dataBangunan)->tanggalsurat ? \Carbon\Carbon::parse($dataBangunan->tanggalsurat)->format('d F Y') : 'Belum diisi' }}
                    </div>

                </div>
            </div>

            <!-- Surat Permohonan File -->
            <div class="file-preview-container mt-3">
                <div class="file-info-header">
                    <div class="file-icon-type">
                        <div class="file-icon pdf">
                            <i class="bi bi-file-earmark-pdf"></i>
                        </div>
                        <div class="file-name">
                            Surat Permohonan Pembongkaran
                        </div>
                    </div>

                    @if($dataBangunan && $dataBangunan->suratpermohonan)
                        <div class="file-actions">
                            <button class="btn-file btn-view" onclick="openPreviewModal('{{ getFileUrl($dataBangunan->suratpermohonan) }}', 'Surat Permohonan')">
                                <i class="bi bi-eye"></i> View Full
                            </button>
                            <a href="{{ getFileUrl($dataBangunan->suratpermohonan) }}" download class="btn-file btn-download">
                                <i class="bi bi-download"></i> Download
                            </a>
                        </div>
                    @endif
                </div>

                <div class="file-preview-content">
                    @if($dataBangunan && $dataBangunan->suratpermohonan && fileExists($dataBangunan->suratpermohonan))
                        {!! renderFilePreview($dataBangunan->suratpermohonan, 'Surat Permohonan') !!}
                    @else
                        <div class="no-file-message">
                            <i class="bi bi-file-earmark-excel"></i>
                            <p>File Surat Permohonan belum diupload</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- 2. DATA BANGUNAN -->
        <div class="data-section">
            <div class="section-header">
                <div class="section-icon">
                    <i class="bi bi-building"></i>
                </div>
                <div>
                    <h4 class="section-title">Data Bangunan</h4>
                    <p class="section-subtitle">Informasi dasar bangunan</p>
                </div>
            </div>

            <div class="data-grid">
                <!-- Nama Bangunan -->
                <div class="data-card">
                    <div class="data-label">
                        <i class="bi bi-building"></i> Nama Bangunan
                    </div>
                    <div class="data-value @if(empty($dataBangunan->namabangunan)) empty @endif">
                        {{ $dataBangunan->namabangunan ?? 'Belum diisi' }}
                    </div>
                </div>

                <!-- Pilihan Bangunan -->
                <div class="data-card">
                    <div class="data-label">
                        <i class="bi bi-list-check"></i> Pilihan Bangunan
                    </div>
                    <div class="data-value @if(empty($dataBangunan->pilihanbangunan)) empty @endif">
                        {{ $dataBangunan->pilihanbangunan ?? 'Belum diisi' }}
                    </div>
                </div>
            </div>

            <!-- Surat Kelayakan File -->
            <div class="file-preview-container mt-3">
                <div class="file-info-header">
                    <div class="file-icon-type">
                        <div class="file-icon pdf">
                            <i class="bi bi-file-earmark-check"></i>
                        </div>
                        <div class="file-name">
                            Surat Kelayakan
                        </div>
                    </div>

                    @if($dataBangunan && $dataBangunan->suratkelayakan)
                        <div class="file-actions">
                            <button class="btn-file btn-view" onclick="openPreviewModal('{{ getFileUrl($dataBangunan->suratkelayakan) }}', 'Surat Kelayakan')">
                                <i class="bi bi-eye"></i> View Full
                            </button>
                            <a href="{{ getFileUrl($dataBangunan->suratkelayakan) }}" download class="btn-file btn-download">
                                <i class="bi bi-download"></i> Download
                            </a>
                        </div>
                    @endif
                </div>

                <div class="file-preview-content">
                    @if($dataBangunan && $dataBangunan->suratkelayakan && fileExists($dataBangunan->suratkelayakan))
                        {!! renderFilePreview($dataBangunan->suratkelayakan, 'Surat Kelayakan') !!}
                    @else
                        <div class="no-file-message">
                            <i class="bi bi-file-earmark-excel"></i>
                            <p>File Surat Kelayakan belum diupload</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- 3. SURAT KESANGGUPAN -->
        <div class="data-section">
            <div class="section-header">
                <div class="section-icon">
                    <i class="bi bi-file-earmark-check"></i>
                </div>
                <div>
                    <h4 class="section-title">Surat Kesanggupan</h4>
                    <p class="section-subtitle">Dokumen kesanggupan pemilik</p>
                </div>
            </div>

            <div class="data-grid">
                <!-- Pilihan Sanggup -->
                <div class="data-card">
                    <div class="data-label">
                        <i class="bi bi-check-circle"></i> Status Kesanggupan
                    </div>
                    <div class="data-value @if(empty($dataBangunan->pilihansanggup)) empty @endif">
                        @if($dataBangunan && $dataBangunan->pilihansanggup)
                            @if($dataBangunan->pilihansanggup == 'Ya')
                                <span style="color: #10b981; font-weight: 600;">✓ Sanggup</span>
                            @else
                                <span style="color: #ef4444; font-weight: 600;">✗ Tidak Sanggup</span>
                            @endif
                        @else
                            Belum diisi
                        @endif
                    </div>
                </div>
            </div>

            <!-- Surat Kesanggupan File -->
            <div class="file-preview-container mt-3">
                <div class="file-info-header">
                    <div class="file-icon-type">
                        <div class="file-icon pdf">
                            <i class="bi bi-file-text"></i>
                        </div>
                        <div class="file-name">
                            Surat Kesanggupan
                        </div>
                    </div>

                    @if($dataBangunan && $dataBangunan->suratkesanggupan)
                        <div class="file-actions">
                            <button class="btn-file btn-view" onclick="openPreviewModal('{{ getFileUrl($dataBangunan->suratkesanggupan) }}', 'Surat Kesanggupan')">
                                <i class="bi bi-eye"></i> View Full
                            </button>
                            <a href="{{ getFileUrl($dataBangunan->suratkesanggupan) }}" download class="btn-file btn-download">
                                <i class="bi bi-download"></i> Download
                            </a>
                        </div>
                    @endif
                </div>

                <div class="file-preview-content">
                    @if($dataBangunan && $dataBangunan->suratkesanggupan && fileExists($dataBangunan->suratkesanggupan))
                        {!! renderFilePreview($dataBangunan->suratkesanggupan, 'Surat Kesanggupan') !!}
                    @else
                        <div class="no-file-message">
                            <i class="bi bi-file-earmark-excel"></i>
                            <p>File Surat Kesanggupan belum diupload</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- 4. DATA PEMILIK -->
        <div class="data-section">
            <div class="section-header">
                <div class="section-icon">
                    <i class="bi bi-person-badge"></i>
                </div>
                <div>
                    <h4 class="section-title">Data Pemilik</h4>
                    <p class="section-subtitle">Identitas pemilik bangunan</p>
                </div>
            </div>

            <div class="data-grid">
                <!-- Nama Lengkap -->
                <div class="data-card">
                    <div class="data-label">
                        <i class="bi bi-person"></i> Nama Lengkap
                    </div>
                    <div class="data-value @if(empty($dataBangunan->namalengkap)) empty @endif">
                        {{ $dataBangunan->namalengkap ?? 'Belum diisi' }}
                    </div>
                </div>

                <!-- Jabatan -->
                <div class="data-card">
                    <div class="data-label">
                        <i class="bi bi-briefcase"></i> Jabatan
                    </div>
                    <div class="data-value @if(empty($dataBangunan->jabatan)) empty @endif">
                        {{ $dataBangunan->jabatan ?? 'Belum diisi' }}
                    </div>
                </div>

                <!-- Alamat Pemilik -->
                <div class="data-card">
                    <div class="data-label">
                        <i class="bi bi-geo-alt"></i> Alamat Pemilik
                    </div>
                    <div class="data-value @if(empty($dataBangunan->alamatpemilik)) empty @endif">
                        {{ $dataBangunan->alamatpemilik ?? 'Belum diisi' }}
                    </div>
                </div>

                <!-- No. Telepon -->
                <div class="data-card">
                    <div class="data-label">
                        <i class="bi bi-telephone"></i> No. Telepon
                    </div>
                    <div class="data-value @if(empty($dataBangunan->notelepon)) empty @endif">
                        {{ $dataBangunan->notelepon ?? 'Belum diisi' }}
                    </div>
                </div>
            </div>

            <!-- KTP File -->
            <div class="file-preview-container mt-3">
                <div class="file-info-header">
                    <div class="file-icon-type">
                        <div class="file-icon ktp">
                            <i class="bi bi-card-image"></i>
                        </div>
                        <div class="file-name">
                            KTP Pemilik
                        </div>
                    </div>

                    @if($dataBangunan && $dataBangunan->ktp)
                        <div class="file-actions">
                            <button class="btn-file btn-view" onclick="openPreviewModal('{{ getFileUrl($dataBangunan->ktp) }}', 'KTP Pemilik')">
                                <i class="bi bi-eye"></i> View Full
                            </button>
                            <a href="{{ getFileUrl($dataBangunan->ktp) }}" download class="btn-file btn-download">
                                <i class="bi bi-download"></i> Download
                            </a>
                        </div>
                    @endif
                </div>

                <div class="file-preview-content">
                    @if($dataBangunan && $dataBangunan->ktp && fileExists($dataBangunan->ktp))
                        {!! renderFilePreview($dataBangunan->ktp, 'KTP Pemilik') !!}
                    @else
                        <div class="no-file-message">
                            <i class="bi bi-card-image"></i>
                            <p>File KTP belum diupload</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- SK File -->
            <div class="file-preview-container mt-3">
                <div class="file-info-header">
                    <div class="file-icon-type">
                        <div class="file-icon pdf">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <div class="file-name">
                            Surat Kuasa/SK
                        </div>
                    </div>

                    @if($dataBangunan && $dataBangunan->sk)
                        <div class="file-actions">
                            <button class="btn-file btn-view" onclick="openPreviewModal('{{ getFileUrl($dataBangunan->sk) }}', 'Surat Kuasa/SK')">
                                <i class="bi bi-eye"></i> View Full
                            </button>
                            <a href="{{ getFileUrl($dataBangunan->sk) }}" download class="btn-file btn-download">
                                <i class="bi bi-download"></i> Download
                            </a>
                        </div>
                    @endif
                </div>

                <div class="file-preview-content">
                    @if($dataBangunan && $dataBangunan->sk && fileExists($dataBangunan->sk))
                        {!! renderFilePreview($dataBangunan->sk, 'Surat Kuasa/SK') !!}
                    @else
                        <div class="no-file-message">
                            <i class="bi bi-file-earmark-text"></i>
                            <p>File Surat Kuasa/SK belum diupload</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- 5. DATA TANAH -->
        <div class="data-section">
            <div class="section-header">
                <div class="section-icon">
                    <i class="bi bi-geo"></i>
                </div>
                <div>
                    <h4 class="section-title">Data Tanah</h4>
                    <p class="section-subtitle">Informasi kepemilikan tanah</p>
                </div>
            </div>

            <div class="data-grid">
                <!-- Luas Tanah -->
                <div class="data-card">
                    <div class="data-label">
                        <i class="bi bi-rulers"></i> Luas Tanah (m²)
                    </div>
                   <div class="data-value @if(empty(optional($dataBangunan)->luastanah)) empty @endif">
    {{ optional($dataBangunan)->luastanah ? number_format(optional($dataBangunan)->luastanah, 2) : 'Belum diisi' }}
</div>

                </div>

                <!-- Status Tanah -->
                <div class="data-card">
                    <div class="data-label">
                        <i class="bi bi-file-earmark-lock"></i> Status Tanah
                    </div>
                    <div class="data-value @if(empty($dataBangunan->statustanah)) empty @endif">
                        {{ $dataBangunan->statustanah ?? 'Belum diisi' }}
                    </div>
                </div>

                <!-- Nama Pemegang Hak -->
                <div class="data-card">
                    <div class="data-label">
                        <i class="bi bi-person-badge"></i> Nama Pemegang Hak
                    </div>
                    <div class="data-value @if(empty($dataBangunan->namapemeganghak)) empty @endif">
                        {{ $dataBangunan->namapemeganghak ?? 'Belum diisi' }}
                    </div>
                </div>
            </div>

            <!-- Sertifikat Tanah File -->
            <div class="file-preview-container mt-3">
                <div class="file-info-header">
                    <div class="file-icon-type">
                        <div class="file-icon pdf">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                        <div class="file-name">
                            Sertifikat Tanah
                        </div>
                    </div>

                    @if($dataBangunan && $dataBangunan->sertifikattanah)
                        <div class="file-actions">
                            <button class="btn-file btn-view" onclick="openPreviewModal('{{ getFileUrl($dataBangunan->sertifikattanah) }}', 'Sertifikat Tanah')">
                                <i class="bi bi-eye"></i> View Full
                            </button>
                            <a href="{{ getFileUrl($dataBangunan->sertifikattanah) }}" download class="btn-file btn-download">
                                <i class="bi bi-download"></i> Download
                            </a>
                        </div>
                    @endif
                </div>

                <div class="file-preview-content">
                    @if($dataBangunan && $dataBangunan->sertifikattanah && fileExists($dataBangunan->sertifikattanah))
                        {!! renderFilePreview($dataBangunan->sertifikattanah, 'Sertifikat Tanah') !!}
                    @else
                        <div class="no-file-message">
                            <i class="bi bi-file-earmark-text"></i>
                            <p>File Sertifikat Tanah belum diupload</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk preview file fullscreen -->
<div class="preview-modal" id="previewModal">
    <div class="preview-modal-content">
        <button class="modal-close" onclick="closePreviewModal()">
            <i class="bi bi-x"></i>
        </button>
        <div id="modalContent" style="width: 100%; height: 100%;"></div>
    </div>
</div>

<script>
    // Fungsi untuk membuka modal preview
    function openPreviewModal(fileUrl, fileName) {
        const modal = document.getElementById('previewModal');
        const modalContent = document.getElementById('modalContent');

        // Deteksi jenis file
        const fileExt = fileUrl.split('.').pop().toLowerCase();

        if (['jpg', 'jpeg', 'png', 'gif', 'bmp'].includes(fileExt)) {
            modalContent.innerHTML = `<img src="${fileUrl}" alt="${fileName}" style="max-width: 100%; max-height: 90vh; object-fit: contain;">`;
        } else if (fileExt === 'pdf') {
            modalContent.innerHTML = `<iframe src="${fileUrl}" style="width: 100%; height: 90vh;" frameborder="0"></iframe>`;
        } else {
            modalContent.innerHTML = `
                <div style="text-align: center; padding: 50px;">
                    <i class="bi bi-file-earmark-text" style="font-size: 3rem; color: #6b7280;"></i>
                    <h4>${fileName}</h4>
                    <p>Preview tidak tersedia untuk format ini</p>
                    <a href="${fileUrl}" download class="btn btn-primary">
                        <i class="bi bi-download"></i> Download File
                    </a>
                </div>
            `;
        }

        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden'; // Prevent scrolling
    }

    // Fungsi untuk menutup modal preview
    function closePreviewModal() {
        const modal = document.getElementById('previewModal');
        modal.style.display = 'none';
        document.body.style.overflow = 'auto'; // Restore scrolling
    }

    // Close modal dengan ESC key
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closePreviewModal();
        }
    });

    // Close modal ketika klik di luar konten
    document.getElementById('previewModal').addEventListener('click', function(event) {
        if (event.target === this) {
            closePreviewModal();
        }
    });
</script>

                    </div>
                 </div>

                 {{-- @include('backend.00_administrator.00_baganterpisah.07_paginations') --}}

                 <br><br>


                 <!-- Modal Konfirmasi Hapus -->
                 <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                     <div class="modal-dialog">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <img src="/assets/icon/pupr.png" alt="" width="30" style="margin-right: 10px;">
                                 <h5 class="modal-title" id="deleteModalLabel">DPUPR Kabupaten Blora</h5>
                                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                             </div>
                             <div class="modal-body">
                                 <p>Apakah Anda Ingin Menghapus Data : <span id="itemName"></span>?</p>
                             </div>
                             <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                 <form id="deleteForm" method="POST" action="">
                                     @csrf
                                     @method('DELETE')
                                     <button type="submit" class="btn btn-danger">Hapus</button>
                                 </form>
                             </div>
                         </div>
                     </div>
                 </div>

                 <script>
                 function setDeleteUrl(button) {
                     var id = button.getAttribute('data-judul');
                     document.getElementById('itemName').innerText = id;
                     var deleteUrl = "/bebantuanteknisdelete/" + encodeURIComponent(id);
                     document.getElementById('deleteForm').action = deleteUrl;
                 }
                 </script>

                 <style>
                     .table-responsive {
                         max-width: 100%;
                         overflow-x: auto;
                     }
                 </style>

             </div>
             <!-- /.card -->
         </div>
         <!-- /.col -->
     </div>
     <!--end::Row-->
     </div>
               <!--end::Container-->
     <!--end::App Content Header-->
     <!--begin::App Content-->
       <!--end::App Content-->
   </main>
   <!--end::App Main-->
 </div>
 </div>


   @include('backend.00_administrator.00_baganterpisah.02_footer')

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
   <script>
    function exportTableToExcel(tableID, filename = '') {
        var table = document.getElementById(tableID);
        var wb = XLSX.utils.table_to_book(table, {sheet:"Sheet 1"});
        return XLSX.writeFile(wb, filename + '.xlsx');
    }
    </script>


