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

    .button-baru {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 12px 20px;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-decoration: none;
        text-align: center;
        cursor: pointer;
    }

    .button-baru:hover {
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(37, 99, 235, 0.3);
        color: white;
    }

    .button-berkas {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
        border: none;
        border-radius: 8px;
        padding: 12px 20px;
        font-weight: 500;
        font-size: 0.9rem;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        text-decoration: none;
        text-align: center;
        cursor: pointer;
    }

    .button-berkas:hover {
        background: linear-gradient(135deg, #059669 0%, #047857 100%);
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(16, 185, 129, 0.3);
        color: white;
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

<div class="col-md-12">
    <div class="doc-grid mb-5">
        <!-- Header Section -->
<div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">

    <!-- JUDUL -->
    <div class="d-flex align-items-center mb-3 mb-md-0">
        <div class="me-3">
            <i class="bi bi-clipboard-data-fill text-primary" style="font-size: 2rem;"></i>
        </div>
        <div>
            <h4 class="mb-1" style="color: #1f2937; font-size: 1.5rem;">
                Dokumen Informasi Pemilik Bangunan
            </h4>
        </div>
    </div>

    <!-- BUTTON AKSI -->
    <div class="d-flex gap-2">
        <!-- KEMBALI -->
        <a href="{{ route(
            'bebantekpembongkaranshow',
            [
                urlencode($data->namapemilik),
                $data->id
            ]
        ) }}"
        class="button-modern">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>

        <!-- KEMBALI KE DATA DASAR -->
        <a href="{{ route('bebantekpembongkaran') }}"
           class="button-baru">
            <i class="bi bi-folder2-open me-1"></i> Data Dasar
        </a>
    </div>

</div>


        <!-- TOMBOL UNTUK MENAMPILKAN FORM -->
        <div class="text-center mb-4">
            <button type="button" class="button-baru" onclick="showUploadForm()" id="showFormBtn">
                <i class="bi bi-upload me-2"></i> Tampilkan Form Upload
            </button>
        </div>

    </div>

    <!-- FORM UPLOAD (Awalnya disembunyikan) -->
    <form action="{{ route('informasipemilikbangunannew.create') }}" method="POST" enctype="multipart/form-data" id="uploadForm" style="display: none; background: #f8fafc; padding: 25px; border-radius: 12px; border: 2px solid #e2e8f0;">
        @csrf
        <input type="hidden" name="bantekpembongkaraninduk_id" value="{{ $data->id ?? '' }}">
        <input type="hidden" name="user_id" value="{{ $user->id ?? '' }}">

        <div class="card-body">
            <!-- 1. DATA SURAT PERMOHONAN -->
            <div class="section-header">
                <i class="bi bi-file-earmark-text me-2"></i> Data Surat Permohonan
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-modern">
                        <label class="form-label-modern" for="nosurat">
                            <i class="bi bi-hash me-2 text-primary"></i> Nomor Surat
                        </label>
                        <input type="text" class="form-control @error('nosurat') is-invalid @enderror"
                               id="nosurat" name="nosurat" value="{{ old('nosurat') }}">
                        @error('nosurat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-modern">
                        <label class="form-label-modern" for="tanggalsurat">
                            <i class="bi bi-calendar-date me-2 text-primary"></i> Tanggal Surat
                        </label>
                        <input type="date" class="form-control @error('tanggalsurat') is-invalid @enderror"
                               id="tanggalsurat" name="tanggalsurat" value="{{ old('tanggalsurat') }}">
                        @error('tanggalsurat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-modern">
                        <label class="form-label-modern" for="suratpermohonan">
                            <i class="bi bi-upload me-2 text-primary"></i> Upload Surat Permohonan
                        </label>
                        <input type="file" class="form-control @error('suratpermohonan') is-invalid @enderror"
                               id="suratpermohonan" name="suratpermohonan" accept=".pdf,.jpg,.jpeg,.png">
                        @error('suratpermohonan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <small class="text-muted">Format: PDF, JPG, PNG (Maks. 5MB)</small>
                    </div>
                </div>
            </div>

            <!-- 2. DATA BANGUNAN -->
            <div class="section-header mt-4">
                <i class="bi bi-building me-2"></i> Data Bangunan
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-modern">
                        <label class="form-label-modern" for="namabangunan">
                            <i class="bi bi-building me-2 text-primary"></i> Nama Bangunan
                        </label>
                        <input type="text" class="form-control @error('namabangunan') is-invalid @enderror"
                               id="namabangunan" name="namabangunan" value="{{ old('namabangunan') }}">
                        @error('namabangunan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-modern">
                        <label class="form-label-modern" for="pilihanbangunan">
                            <i class="bi bi-list-check me-2 text-primary"></i> Pilihan Bangunan
                        </label>
                        <select class="form-select @error('pilihanbangunan') is-invalid @enderror"
                                id="pilihanbangunan" name="pilihanbangunan">
                            <option value="">-- Pilih --</option>
                            <option value="Bangunan Lama" {{ old('pilihanbangunan') == 'Bangunan Lama' ? 'selected' : '' }}>Bangunan Lama</option>
                            <option value="Bangunan Baru" {{ old('pilihanbangunan') == 'Bangunan Baru' ? 'selected' : '' }}>Bangunan Baru</option>
                            <option value="Renovasi" {{ old('pilihanbangunan') == 'Renovasi' ? 'selected' : '' }}>Renovasi</option>
                        </select>
                        @error('pilihanbangunan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-modern">
                        <label class="form-label-modern" for="suratkelayakan">
                            <i class="bi bi-upload me-2 text-primary"></i> Upload Surat Kelayakan
                        </label>
                        <input type="file" class="form-control @error('suratkelayakan') is-invalid @enderror"
                               id="suratkelayakan" name="suratkelayakan" accept=".pdf,.jpg,.jpeg,.png">
                        @error('suratkelayakan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <small class="text-muted">Format: PDF, JPG, PNG (Maks. 5MB)</small>
                    </div>
                </div>
            </div>

            <!-- 3. SURAT KESANGGUPAN -->
            <div class="section-header mt-4">
                <i class="bi bi-file-earmark-check me-2"></i> Surat Kesanggupan
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-modern">
                        <label class="form-label-modern" for="pilihansanggup">
                            <i class="bi bi-check-circle me-2 text-primary"></i> Pilihan Sanggup
                        </label>
                        <select class="form-select @error('pilihansanggup') is-invalid @enderror"
                                id="pilihansanggup" name="pilihansanggup">
                            <option value="">-- Pilih --</option>
                            <option value="Ya" {{ old('pilihansanggup') == 'Ya' ? 'selected' : '' }}>Ya</option>
                            <option value="Tidak" {{ old('pilihansanggup') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
                        </select>
                        @error('pilihansanggup') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-modern">
                        <label class="form-label-modern" for="suratkesanggupan">
                            <i class="bi bi-upload me-2 text-primary"></i> Upload Surat Kesanggupan
                        </label>
                        <input type="file" class="form-control @error('suratkesanggupan') is-invalid @enderror"
                               id="suratkesanggupan" name="suratkesanggupan" accept=".pdf,.jpg,.jpeg,.png">
                        @error('suratkesanggupan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <small class="text-muted">Format: PDF, JPG, PNG (Maks. 5MB)</small>
                    </div>
                </div>
            </div>

            <!-- 4. DATA PEMILIK -->
            <div class="section-header mt-4">
                <i class="bi bi-person-badge me-2"></i> Data Pemilik
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-modern">
                        <label class="form-label-modern" for="namalengkap">
                            <i class="bi bi-person me-2 text-primary"></i> Nama Lengkap
                        </label>
                        <input type="text" class="form-control @error('namalengkap') is-invalid @enderror"
                               id="namalengkap" name="namalengkap" value="{{ old('namalengkap') }}">
                        @error('namalengkap') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-modern">
                        <label class="form-label-modern" for="jabatan">
                            <i class="bi bi-briefcase me-2 text-primary"></i> Jabatan
                        </label>
                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror"
                               id="jabatan" name="jabatan" value="{{ old('jabatan') }}">
                        @error('jabatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-modern">
                        <label class="form-label-modern" for="alamatpemilik">
                            <i class="bi bi-geo-alt me-2 text-primary"></i> Alamat Pemilik
                        </label>
                        <textarea class="form-control @error('alamatpemilik') is-invalid @enderror"
                                  id="alamatpemilik" name="alamatpemilik" rows="3">{{ old('alamatpemilik') }}</textarea>
                        @error('alamatpemilik') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-modern">
                        <label class="form-label-modern" for="notelepon">
                            <i class="bi bi-telephone me-2 text-primary"></i> No. Telepon
                        </label>
                        <input type="text" class="form-control @error('notelepon') is-invalid @enderror"
                               id="notelepon" name="notelepon" value="{{ old('notelepon') }}">
                        @error('notelepon') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-modern">
                        <label class="form-label-modern" for="ktp">
                            <i class="bi bi-card-image me-2 text-primary"></i> Upload KTP
                        </label>
                        <input type="file" class="form-control @error('ktp') is-invalid @enderror"
                               id="ktp" name="ktp" accept=".pdf,.jpg,.jpeg,.png">
                        @error('ktp') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <small class="text-muted">Format: PDF, JPG, PNG (Maks. 5MB)</small>
                    </div>
                </div>

                <div class="col-12">
                    <div class="form-modern">
                        <label class="form-label-modern" for="sk">
                            <i class="bi bi-file-earmark-text me-2 text-primary"></i> Upload SK
                        </label>
                        <input type="file" class="form-control @error('sk') is-invalid @enderror"
                               id="sk" name="sk" accept=".pdf,.jpg,.jpeg,.png">
                        @error('sk') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <small class="text-muted">Format: PDF, JPG, PNG (Maks. 5MB)</small>
                    </div>
                </div>
            </div>

            <!-- 5. DATA TANAH -->
            <div class="section-header mt-4">
                <i class="bi bi-geo me-2"></i> Data Tanah
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-modern">
                        <label class="form-label-modern" for="luastanah">
                            <i class="bi bi-rulers me-2 text-primary"></i> Luas Tanah (m²)
                        </label>
                        <input type="number" step="0.01" class="form-control @error('luastanah') is-invalid @enderror"
                               id="luastanah" name="luastanah" value="{{ old('luastanah') }}">
                        @error('luastanah') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-modern">
                        <label class="form-label-modern" for="statustanah">
                            <i class="bi bi-file-earmark-lock me-2 text-primary"></i> Status Tanah
                        </label>
                        <select class="form-select @error('statustanah') is-invalid @enderror"
                                id="statustanah" name="statustanah">
                            <option value="">-- Pilih Status Tanah --</option>
                            <option value="Hak Milik" {{ old('statustanah') == 'Hak Milik' ? 'selected' : '' }}>Hak Milik</option>
                            <option value="Sewa" {{ old('statustanah') == 'Sewa' ? 'selected' : '' }}>Sewa</option>
                            <option value="Hak Pakai" {{ old('statustanah') == 'Hak Pakai' ? 'selected' : '' }}>Hak Pakai</option>
                            <option value="Hak Guna Bangunan" {{ old('statustanah') == 'Hak Guna Bangunan' ? 'selected' : '' }}>Hak Guna Bangunan</option>
                        </select>
                        @error('statustanah') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-modern">
                        <label class="form-label-modern" for="namapemeganghak">
                            <i class="bi bi-person-badge me-2 text-primary"></i> Nama Pemegang Hak
                        </label>
                        <input type="text" class="form-control @error('namapemeganghak') is-invalid @enderror"
                               id="namapemeganghak" name="namapemeganghak" value="{{ old('namapemeganghak') }}">
                        @error('namapemeganghak') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-modern">
                        <label class="form-label-modern" for="sertifikattanah">
                            <i class="bi bi-file-earmark-text me-2 text-primary"></i> Upload Sertifikat Tanah
                        </label>
                        <input type="file" class="form-control @error('sertifikattanah') is-invalid @enderror"
                               id="sertifikattanah" name="sertifikattanah" accept=".pdf,.jpg,.jpeg,.png">
                        @error('sertifikattanah') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        <small class="text-muted">Format: PDF, JPG, PNG (Maks. 5MB)</small>
                    </div>
                </div>
            </div>

            <!-- Tombol Submit -->
          <div class="mt-4 text-end">

    <button type="button" class="button-baru" data-bs-toggle="modal" data-bs-target="#modalKonfirmasi">
        <i class="bi bi-save me-2"></i> Simpan Data
    </button>
</div>
<div class="modal fade" id="modalKonfirmasi" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 shadow">

            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <i class="bi bi-question-circle text-primary me-2"></i>
                    Konfirmasi Data
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <p class="mb-0 fs-6">
                    Apakah data yang Anda input sudah benar?
                </p>
            </div>

            <div class="modal-footer border-0 justify-content-center">
                <button type="button" class="btn btn-light px-4" data-bs-dismiss="modal">
                    Tidak
                </button>

                <!-- BUTTON SUBMIT ASLI -->
                <button type="submit" class="button-baru px-4">
                    <i class="bi bi-check-circle me-1"></i> Ya, Simpan
                </button>
            </div>

        </div>
    </div>
</div>

        </div>
    </form>
</div>

<script>
    // Fungsi untuk menampilkan form upload
    function showUploadForm() {
        document.getElementById('uploadForm').style.display = 'block';
        document.getElementById('showFormBtn').style.display = 'none';
        window.scrollTo(0, document.getElementById('uploadForm').offsetTop);
    }

    // Fungsi untuk menyembunyikan form upload
    function hideForm() {
        document.getElementById('uploadForm').style.display = 'none';
        document.getElementById('showFormBtn').style.display = 'block';
    }
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


