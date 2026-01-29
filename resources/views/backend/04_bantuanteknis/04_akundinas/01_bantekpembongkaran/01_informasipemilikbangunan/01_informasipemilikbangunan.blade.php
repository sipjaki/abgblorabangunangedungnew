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
            <button type="button" class="button-berkas" onclick="showUploadForm()" id="showFormBtn">
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
                <i class="bi bi-file-earmark-text me-2"></i> Data Surat Permohonan Izin Pembongkaran
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
            <i class="bi bi-upload me-2 text-primary"></i>
            Upload Surat Permohonan Izin Pembongkaran
        </label>

        <input type="file"
               class="form-control @error('suratpermohonan') is-invalid @enderror"
               id="suratpermohonan"
               name="suratpermohonan"
               accept=".pdf,.jpg,.jpeg,.png">

        @error('suratpermohonan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <small class="text-muted d-block mt-1">
            Format: PDF (Maks. 15MB)
        </small>

        <small class="text-muted d-block mb-2">
            Keterangan: Silahkan download template surat ini, isi, lalu
            <strong class="text-danger">Upload Kembali</strong>.
        </small>

        <!-- BUTTON DOWNLOAD -->
        <a href="/assets/abgblora/00_dokumen/01_bantek/10_pembongkaran/SURAT_PERMOHONAN_IZIN_PEMBONGKARAN_BANGUNAN_GEDUNG.docx"
           class="btn btn-outline-primary btn-sm"
           download>
            <i class="bi bi-download me-1"></i> Download Template Surat
        </a>
    </div>

</div>


            </div>


            <!-- 2. DATA BANGUNAN -->
            <div class="section-header mt-4">
                <i class="bi bi-building me-2"></i> Data Surat Permohonan Kajian Teknis Bangunan Gedung
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
            <i class="bi bi-list-check me-2 text-primary"></i>
            Jenis Kajian Teknis Bangunan Gedung
        </label>

        <select class="form-select @error('pilihanbangunan') is-invalid @enderror"
                id="pilihanbangunan"
                name="pilihanbangunan">
            <option value="">-- Pilih --</option>

            <option value="Kajian Analisa Kerusakan Bangunan Gedung"
                {{ old('pilihanbangunan') == 'Kajian Analisa Kerusakan Bangunan Gedung' ? 'selected' : '' }}>
                Kajian Analisa Kerusakan Bangunan Gedung
            </option>

            <option value="Kajian Rencana Teknis Pembongkaran Bangunan Gedung"
                {{ old('pilihanbangunan') == 'Kajian Rencana Teknis Pembongkaran Bangunan Gedung' ? 'selected' : '' }}>
                Kajian Rencana Teknis Pembongkaran Bangunan Gedung
            </option>

            <option value="Kajian Kelayakan Bangunan Gedung"
                {{ old('pilihanbangunan') == 'Kajian Kelayakan Bangunan Gedung' ? 'selected' : '' }}>
                Kajian Kelayakan Bangunan Gedung
            </option>

            <option value="Bantuan Gambar Teknis"
                {{ old('pilihanbangunan') == 'Bantuan Gambar Teknis' ? 'selected' : '' }}>
                Bantuan Gambar Teknis
            </option>
        </select>

        @error('pilihanbangunan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
</div>


                <div class="col-12">
<div class="form-modern">
    <label class="form-label-modern" for="suratpermohonan">
        <i class="bi bi-upload me-2 text-primary"></i>
        Upload Surat Permohonan Kajian Teknis Bangunan Gedung
    </label>

    <input type="file"
           class="form-control @error('suratpermohonan') is-invalid @enderror"
           id="suratpermohonan"
           name="suratpermohonan"
           accept=".pdf,.jpg,.jpeg,.png,.docx">

    @error('suratpermohonan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    <small class="text-muted d-block mt-1">
        Format: PDF (Maks. 15MB)
    </small>

    <small class="text-muted d-block mb-2">
        Keterangan: Silahkan download template surat ini, isi, lalu
        <strong class="text-danger">Upload Kembali</strong>.
    </small>

    <!-- BUTTON DOWNLOAD -->
    <a href="/assets/abgblora/00_dokumen/01_bantek/10_pembongkaran/SURAT_KAJIAN_TEKNIS_BANGUNAN_GEDUNG.docx"
       class="btn btn-outline-primary btn-sm"
       download>
        <i class="bi bi-download me-1"></i> Download Template Surat
    </a>
</div>

            </div>
            </div>

            <!-- 3. SURAT KESANGGUPAN -->
            <div class="section-header mt-4">
                <i class="bi bi-file-earmark-check me-2"></i> Surat Kesanggupan Pembongkaran Bangunan Gedung
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-modern">
                        <label class="form-label-modern" for="pilihansanggup">
                            <i class="bi bi-check-circle me-2 text-primary"></i> Apakah Saudara Setuju Untuk Dilakukan Pembongkaran ?
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
            <i class="bi bi-upload me-2 text-primary"></i>
            Upload Surat Pernyataan Kesanggupan Pembongkaran Bangunan Gedung
        </label>

        <input type="file"
               class="form-control @error('suratkesanggupan') is-invalid @enderror"
               id="suratkesanggupan"
               name="suratkesanggupan"
               accept=".docx,.pdf">

        @error('suratkesanggupan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <small class="text-muted d-block mt-1">
            Format: PDF (Maks. 15MB)
        </small>

        <small class="text-muted d-block mb-2">
            Keterangan: Silahkan download template surat ini, isi, lalu
            <strong class="text-danger">Upload Kembali</strong>.
        </small>

        <!-- BUTTON DOWNLOAD TEMPLATE -->
        <a href="/assets/abgblora/00_dokumen/01_bantek/10_pembongkaran/SURAT_PERNYATAAN_KESANGGUPAN.docx"
           class="btn btn-outline-primary btn-sm mt-2"
           download>
            <i class="bi bi-download me-1"></i> Download Template Surat
        </a>
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
            <i class="bi bi-card-image me-2 text-primary"></i>
            Upload KTP
        </label>

        <!-- INPUT TETAP ADA -->
        <input type="file"
               class="form-control @error('ktp') is-invalid @enderror"
               id="ktp"
               name="ktp"
               accept=".pdf,.jpg,.jpeg,.png">

        @error('ktp')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <small class="text-muted d-block mt-1">
            Format: PDF, JPG, PNG (Maks. 15MB)
        </small>

        <!-- BUTTON LIHAT CONTOH -->
        <button type="button"
                class="btn btn-outline-primary btn-sm mt-2"
                data-bs-toggle="modal"
                data-bs-target="#modalContohKTP">
            <i class="bi bi-eye me-1"></i> Lihat Contoh KTP
        </button>
    </div>
</div>


<div class="modal fade" id="modalContohKTP" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow">

            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <i class="bi bi-card-image me-2 text-primary"></i>
                    Contoh KTP
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <img src="/assets/abgblora/00_dokumen/01_bantek/10_pembongkaran/CONTOH_KTP.jpg"
                     alt="Contoh KTP"
                     class="img-fluid rounded shadow-sm">
            </div>

            <div class="modal-footer border-0 justify-content-center">
                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Tutup
                </button>
            </div>

        </div>
    </div>
</div>

<div class="col-12">
    <div class="form-modern">
        <label class="form-label-modern" for="sk">
            <i class="bi bi-file-earmark-text me-2 text-primary"></i>
            Upload SK
        </label>

        <!-- INPUT UPLOAD -->
        <input type="file"
               class="form-control @error('sk') is-invalid @enderror"
               id="sk"
               name="sk"
               accept=".pdf,.jpg,.jpeg,.png">

        @error('sk')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <small class="text-muted d-block mt-1">
            Format: PDF, JPG, PNG (Maks. 15MB)
        </small>

        <!-- BUTTON LIHAT CONTOH -->
        <button type="button"
                class="btn btn-outline-primary btn-sm mt-2"
                data-bs-toggle="modal"
                data-bs-target="#modalContohSK">
            <i class="bi bi-eye me-1"></i> Lihat Contoh SK
        </button>
    </div>
</div>


<div class="modal fade" id="modalContohSK" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow">

            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <i class="bi bi-file-earmark-text me-2 text-primary"></i>
                    Contoh SK
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <img src="/assets/abgblora/00_dokumen/01_bantek/10_pembongkaran/CONTOH_SK.png"
                     alt="Contoh SK"
                     class="img-fluid rounded shadow-sm">
            </div>

            <div class="modal-footer border-0 justify-content-center">
                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Tutup
                </button>
            </div>

        </div>
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
            <i class="bi bi-file-earmark-text me-2 text-primary"></i>
            Upload Sertifikat Tanah
        </label>

        <!-- INPUT UPLOAD -->
        <input type="file"
               class="form-control @error('sertifikattanah') is-invalid @enderror"
               id="sertifikattanah"
               name="sertifikattanah"
               accept=".pdf,.jpg,.jpeg,.png">

        @error('sertifikattanah')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <small class="text-muted d-block mt-1">
            Format: PDF, JPG, PNG (Maks. 15MB)
        </small>

        <!-- BUTTON LIHAT CONTOH -->
        <button type="button"
                class="btn btn-outline-primary btn-sm mt-2"
                data-bs-toggle="modal"
                data-bs-target="#modalContohSertifikatTanah">
            <i class="bi bi-eye me-1"></i> Lihat Contoh Sertifikat Tanah
        </button>
    </div>
</div>


<div class="modal fade" id="modalContohSertifikatTanah" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow">

            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <i class="bi bi-file-earmark-text me-2 text-primary"></i>
                    Contoh Sertifikat Tanah
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <img src="/assets/abgblora/00_dokumen/01_bantek/10_pembongkaran/CONTOH_SERTIFIKAT_TANAH.png"
                     alt="Contoh Sertifikat Tanah"
                     class="img-fluid rounded shadow-sm">
            </div>

            <div class="modal-footer border-0 justify-content-center">
                <button type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                    Tutup
                </button>
            </div>

        </div>
    </div>
</div>

            </div>

            <!-- =========================
     * DATA TEKNIS BANGUNAN
     * ========================= -->
<div class="section-header mt-4">
    <i class="bi bi-building-gear me-2"></i> Data Teknis Bangunan
</div>

<div class="row">
    <!-- Legalitas Bangunan -->
    <div class="col-md-6">
        <div class="form-modern">
            <label class="form-label-modern" for="legalitasbangunan">
                <i class="bi bi-file-earmark-check me-2 text-primary"></i> Legalitas Bangunan
            </label>
            <input type="text" class="form-control @error('legalitasbangunan') is-invalid @enderror"
                   id="legalitasbangunan" name="legalitasbangunan" value="{{ old('legalitasbangunan') }}"
                   placeholder="Contoh: IMB/IL">
            @error('legalitasbangunan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <!-- Nomor PBG -->
    <div class="col-md-6">
        <div class="form-modern">
            <label class="form-label-modern" for="nomorpbg">
                <i class="bi bi-hash me-2 text-primary"></i> Nomor PBG
            </label>
            <input type="text" class="form-control @error('nomorpbg') is-invalid @enderror"
                   id="nomorpbg" name="nomorpbg" value="{{ old('nomorpbg') }}"
                   placeholder="Nomor Persetujuan Bangunan Gedung">
            @error('nomorpbg') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <!-- Pemilik Bangunan -->
    <div class="col-md-6">
        <div class="form-modern">
            <label class="form-label-modern" for="pemilikbangunan">
                <i class="bi bi-person-badge me-2 text-primary"></i> Pemilik Bangunan
            </label>
            <input type="text" class="form-control @error('pemilikbangunan') is-invalid @enderror"
                   id="pemilikbangunan" name="pemilikbangunan" value="{{ old('pemilikbangunan') }}"
                   placeholder="Nama pemilik bangunan">
            @error('pemilikbangunan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <!-- Kode Barang -->
    <div class="col-md-6">
        <div class="form-modern">
            <label class="form-label-modern" for="kodebarang">
                <i class="bi bi-tag me-2 text-primary"></i> Kode Barang
            </label>
            <input type="text" class="form-control @error('kodebarang') is-invalid @enderror"
                   id="kodebarang" name="kodebarang" value="{{ old('kodebarang') }}"
                   placeholder="Kode barang inventaris">
            @error('kodebarang') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <!-- Alamat Bangunan -->
    <div class="col-12">
        <div class="form-modern">
            <label class="form-label-modern" for="alamatbangunan">
                <i class="bi bi-geo-alt me-2 text-primary"></i> Alamat Bangunan
            </label>
            <textarea class="form-control @error('alamatbangunan') is-invalid @enderror"
                      id="alamatbangunan" name="alamatbangunan" rows="3"
                      placeholder="Alamat lengkap bangunan">{{ old('alamatbangunan') }}</textarea>
            @error('alamatbangunan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <!-- Koordinat Bangunan -->
    <div class="col-md-6">
        <div class="form-modern">
            <label class="form-label-modern" for="koordinatbangunan">
                <i class="bi bi-geo-alt-fill me-2 text-primary"></i> Koordinat Bangunan
            </label>
            <input type="text" class="form-control @error('koordinatbangunan') is-invalid @enderror"
                   id="koordinatbangunan" name="koordinatbangunan" value="{{ old('koordinatbangunan') }}"
                   placeholder="Format: latitude,longitude">
            @error('koordinatbangunan') <div class="invalid-feedback">{{ $message }}</div> @enderror
            <small class="text-muted">Contoh: -7.0421,111.4046</small>
        </div>
    </div>

    <!-- Fungsi Bangunan -->
    <div class="col-md-6">
        <div class="form-modern">
            <label class="form-label-modern" for="fungsibangunan">
                <i class="bi bi-building me-2 text-primary"></i> Fungsi Bangunan
            </label>
            <select class="form-select @error('fungsibangunan') is-invalid @enderror"
                    id="fungsibangunan" name="fungsibangunan">
                <option value="">-- Pilih Fungsi Bangunan --</option>
                <option value="Perkantoran" {{ old('fungsibangunan') == 'Perkantoran' ? 'selected' : '' }}>Perkantoran</option>
                <option value="Pendidikan" {{ old('fungsibangunan') == 'Pendidikan' ? 'selected' : '' }}>Pendidikan</option>
                <option value="Kesehatan" {{ old('fungsibangunan') == 'Kesehatan' ? 'selected' : '' }}>Kesehatan</option>
                <option value="Perdagangan" {{ old('fungsibangunan') == 'Perdagangan' ? 'selected' : '' }}>Perdagangan</option>
                <option value="Industri" {{ old('fungsibangunan') == 'Industri' ? 'selected' : '' }}>Industri</option>
                <option value="Hunian" {{ old('fungsibangunan') == 'Hunian' ? 'selected' : '' }}>Hunian</option>
                <option value="Ibadah" {{ old('fungsibangunan') == 'Ibadah' ? 'selected' : '' }}>Ibadah</option>
                <option value="Lainnya" {{ old('fungsibangunan') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
            </select>
            @error('fungsibangunan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <!-- Jumlah Lantai -->
    <div class="col-md-4">
        <div class="form-modern">
            <label class="form-label-modern" for="jumlahlantai">
                <i class="bi bi-layers me-2 text-primary"></i> Jumlah Lantai
            </label>
            <input type="number" class="form-control @error('jumlahlantai') is-invalid @enderror"
                   id="jumlahlantai" name="jumlahlantai" value="{{ old('jumlahlantai') }}"
                   min="1" max="100" placeholder="Contoh: 2">
            @error('jumlahlantai') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <!-- Ketinggian Bangunan -->
    <div class="col-md-4">
        <div class="form-modern">
            <label class="form-label-modern" for="ketinggianbangunan">
                <i class="bi bi-arrows-vertical me-2 text-primary"></i> Ketinggian Bangunan (m)
            </label>
            <input type="number" step="0.01" class="form-control @error('ketinggianbangunan') is-invalid @enderror"
                   id="ketinggianbangunan" name="ketinggianbangunan" value="{{ old('ketinggianbangunan') }}"
                   placeholder="Contoh: 8.5">
            @error('ketinggianbangunan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <!-- Luas Bangunan -->
    <div class="col-md-4">
        <div class="form-modern">
            <label class="form-label-modern" for="luasbangunan">
                <i class="bi bi-rulers me-2 text-primary"></i> Luas Bangunan (m²)
            </label>
            <input type="number" step="0.01" class="form-control @error('luasbangunan') is-invalid @enderror"
                   id="luasbangunan" name="luasbangunan" value="{{ old('luasbangunan') }}"
                   placeholder="Contoh: 150.75">
            @error('luasbangunan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <!-- Kompleksitas Bangunan -->
    <div class="col-md-6">
        <div class="form-modern">
            <label class="form-label-modern" for="kompleksitasbangunan">
                <i class="bi bi-diagram-3 me-2 text-primary"></i> Kompleksitas Bangunan
            </label>
            <select class="form-select @error('kompleksitasbangunan') is-invalid @enderror"
                    id="kompleksitasbangunan" name="kompleksitasbangunan">
                <option value="">-- Pilih Kompleksitas --</option>
                <option value="Sederhana" {{ old('kompleksitasbangunan') == 'Sederhana' ? 'selected' : '' }}>Sederhana</option>
                <option value="Sedang" {{ old('kompleksitasbangunan') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                <option value="Kompleks" {{ old('kompleksitasbangunan') == 'Kompleks' ? 'selected' : '' }}>Kompleks</option>
                <option value="Sangat Kompleks" {{ old('kompleksitasbangunan') == 'Sangat Kompleks' ? 'selected' : '' }}>Sangat Kompleks</option>
            </select>
            @error('kompleksitasbangunan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <!-- Tingkat Permanensi -->
    <div class="col-md-6">
        <div class="form-modern">
            <label class="form-label-modern" for="tingkatpermanensi">
                <i class="bi bi-shield-check me-2 text-primary"></i> Tingkat Permanensi
            </label>
            <select class="form-select @error('tingkatpermanensi') is-invalid @enderror"
                    id="tingkatpermanensi" name="tingkatpermanensi">
                <option value="">-- Pilih Tingkat Permanensi --</option>
                <option value="Permanen" {{ old('tingkatpermanensi') == 'Permanen' ? 'selected' : '' }}>Permanen</option>
                <option value="Semi Permanen" {{ old('tingkatpermanensi') == 'Semi Permanen' ? 'selected' : '' }}>Semi Permanen</option>
                <option value="Non Permanen" {{ old('tingkatpermanensi') == 'Non Permanen' ? 'selected' : '' }}>Non Permanen</option>
            </select>
            @error('tingkatpermanensi') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <!-- Kepadatan -->
    <div class="col-md-6">
        <div class="form-modern">
            <label class="form-label-modern" for="kepadatan">
                <i class="bi bi-people-fill me-2 text-primary"></i> Kepadatan
            </label>
            <select class="form-select @error('kepadatan') is-invalid @enderror"
                    id="kepadatan" name="kepadatan">
                <option value="">-- Pilih Kepadatan --</option>
                <option value="Rendah" {{ old('kepadatan') == 'Rendah' ? 'selected' : '' }}>Rendah</option>
                <option value="Sedang" {{ old('kepadatan') == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                <option value="Tinggi" {{ old('kepadatan') == 'Tinggi' ? 'selected' : '' }}>Tinggi</option>
                <option value="Sangat Tinggi" {{ old('kepadatan') == 'Sangat Tinggi' ? 'selected' : '' }}>Sangat Tinggi</option>
            </select>
            @error('kepadatan') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <!-- Tanggal Dibangun -->
    <div class="col-md-6">
        <div class="form-modern">
            <label class="form-label-modern" for="tanggaldibangun">
                <i class="bi bi-calendar-date me-2 text-primary"></i> Tanggal Dibangun
            </label>
            <input type="date" class="form-control @error('tanggaldibangun') is-invalid @enderror"
                   id="tanggaldibangun" name="tanggaldibangun" value="{{ old('tanggaldibangun') }}">
            @error('tanggaldibangun') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <!-- Tanggal Renovasi -->
    <div class="col-md-6">
        <div class="form-modern">
            <label class="form-label-modern" for="tanggalrevovasi">
                <i class="bi bi-tools me-2 text-primary"></i> Tanggal Renovasi
            </label>
            <input type="date" class="form-control @error('tanggalrevovasi') is-invalid @enderror"
                   id="tanggalrevovasi" name="tanggalrevovasi" value="{{ old('tanggalrevovasi') }}">
            @error('tanggalrevovasi') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <!-- Nilai Bangunan Baru -->
    <div class="col-md-6">
        <div class="form-modern">
            <label class="form-label-modern" for="nilaibangunanbaru">
                <i class="bi bi-cash-coin me-2 text-primary"></i> Nilai Bangunan Baru (Rp)
            </label>
            <input type="number" step="0.01" class="form-control @error('nilaibangunanbaru') is-invalid @enderror"
                   id="nilaibangunanbaru" name="nilaibangunanbaru" value="{{ old('nilaibangunanbaru') }}"
                   placeholder="Contoh: 500000000">
            @error('nilaibangunanbaru') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <!-- Nilai Bangunan Lama -->
    <div class="col-md-6">
        <div class="form-modern">
            <label class="form-label-modern" for="nilaibangunanlama">
                <i class="bi bi-cash-stack me-2 text-primary"></i> Nilai Bangunan Lama (Rp)
            </label>
            <input type="number" step="0.01" class="form-control @error('nilaibangunanlama') is-invalid @enderror"
                   id="nilaibangunanlama" name="nilaibangunanlama" value="{{ old('nilaibangunanlama') }}"
                   placeholder="Contoh: 300000000">
            @error('nilaibangunanlama') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>
</div>

<!-- =========================
     * KIB
     * ========================= -->
<div class="section-header mt-4">
    <i class="bi bi-file-text me-2"></i> Kartu Inventaris Barang (KIB)
</div>

<div class="row">
    <div class="col-12">
        <div class="form-modern">
            <label class="form-label-modern" for="kib">
                <i class="bi bi-upload me-2 text-primary"></i> Upload KIB
            </label>
            <input type="file" class="form-control @error('kib') is-invalid @enderror"
                   id="kib" name="kib" accept=".pdf,.jpg,.jpeg,.png">
            @error('kib') <div class="invalid-feedback">{{ $message }}</div> @enderror
            <small class="text-muted">Format: PDF, JPG, PNG (Maks. 5MB)</small>
        </div>
    </div>
</div>

<!-- =========================
     * DATA PBG
     * ========================= -->
<div class="section-header mt-4">
    <i class="bi bi-file-earmark-medical me-2"></i> Data Persetujuan Bangunan Gedung (PBG)
</div>

<div class="row">
    <!-- Apakah Ada PBG -->
    <div class="col-md-6">
        <div class="form-modern">
            <label class="form-label-modern" for="apakahadapbg">
                <i class="bi bi-question-circle me-2 text-primary"></i> Apakah Ada PBG?
            </label>
            <select class="form-select @error('apakahadapbg') is-invalid @enderror"
                    id="apakahadapbg" name="apakahadapbg" onchange="togglePBGField()">
                <option value="">-- Pilih --</option>
                <option value="Ya" {{ old('apakahadapbg') == 'Ya' ? 'selected' : '' }}>Ya</option>
                <option value="Tidak" {{ old('apakahadapbg') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
            </select>
            @error('apakahadapbg') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>
    </div>

    <!-- Upload PBG (Tampilkan jika Ya) -->
    <div class="col-md-6" id="pbgField" style="display: none;">
        <div class="form-modern">
            <label class="form-label-modern" for="pbg">
                <i class="bi bi-upload me-2 text-primary"></i> Upload PBG
            </label>
            <input type="file" class="form-control @error('pbg') is-invalid @enderror"
                   id="pbg" name="pbg" accept=".pdf,.jpg,.jpeg,.png">
            @error('pbg') <div class="invalid-feedback">{{ $message }}</div> @enderror
            <small class="text-muted">Format: PDF, JPG, PNG (Maks. 5MB)</small>
        </div>
    </div>
</div>

<!-- Tombol Submit -->
<div class="mt-4 text-end">
    <button type="button" class="btn btn-secondary me-2" onclick="hideForm()">Batal</button>
    <button type="button" class="button-baru" onclick="showConfirmationModal()">
        <i class="bi bi-save me-2"></i> Simpan Data
    </button>
</div>

<!-- Modal Konfirmasi -->
<div id="confirmationModal" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 30px; border-radius: 12px; max-width: 500px; width: 90%; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
        <div style="display: flex; align-items: center; margin-bottom: 20px; padding-bottom: 15px; border-bottom: 2px solid #e5e7eb;">
            <div style="width: 50px; height: 50px; background: linear-gradient(135deg, #3b82f6, #1d4ed8); border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                <i class="bi bi-question-circle-fill" style="color: white; font-size: 1.5rem;"></i>
            </div>
            <div>
                <h4 style="margin: 0; color: #1f2937; font-weight: 600;">Konfirmasi Penyimpanan</h4>
                <p style="margin: 5px 0 0 0; color: #6b7280; font-size: 0.9rem;">DPUPR Kabupaten Blora</p>
            </div>
        </div>

        <div style="margin-bottom: 25px;">
            <p style="font-size: 16px; line-height: 1.5; color: #374151; margin-bottom: 10px;">
                <i class="bi bi-exclamation-triangle-fill me-2" style="color: #f59e0b;"></i>
                Apakah data yang Anda input sudah benar?
            </p>
            <p style="font-size: 14px; color: #6b7280; background-color: #f9fafb; padding: 12px; border-radius: 8px; border-left: 4px solid #3b82f6;">
                <i class="bi bi-info-circle-fill me-2" style="color: #3b82f6;"></i>
                Pastikan semua data sudah terisi dengan benar sebelum disimpan.
            </p>
        </div>

        <div style="display: flex; justify-content: flex-end; gap: 12px;">
            <button type="button" onclick="closeConfirmationModal()"
                    style="background: #f3f4f6; color: #374151; border: 1px solid #d1d5db; padding: 10px 20px; border-radius: 8px; font-weight: 500; cursor: pointer; transition: all 0.3s; display: flex; align-items: center;"
                    onmouseover="this.style.background='#e5e7eb'; this.style.color='#1f2937';"
                    onmouseout="this.style.background='#f3f4f6'; this.style.color='#374151';">
                <i class="bi bi-x-circle me-2"></i> Tutup
            </button>

            <button type="button" onclick="submitForm()"
                    style="background: linear-gradient(135deg, #10b981, #059669); color: white; border: none; padding: 10px 25px; border-radius: 8px; font-weight: 500; cursor: pointer; transition: all 0.3s; display: flex; align-items: center;"
                    onmouseover="this.style.background='linear-gradient(135deg, #059669, #047857)'; this.style.transform='translateY(-2px)';"
                    onmouseout="this.style.background='linear-gradient(135deg, #10b981, #059669)'; this.style.transform='translateY(0)';">
                <i class="bi bi-check-circle me-2"></i> Ya, Simpan Data
            </button>
        </div>
    </div>
</div>

<script>
    // Fungsi untuk toggle PBG field
    function togglePBGField() {
        const pbgSelect = document.getElementById('apakahadapbg');
        const pbgField = document.getElementById('pbgField');

        if (pbgSelect.value === 'Ya') {
            pbgField.style.display = 'block';
        } else {
            pbgField.style.display = 'none';
            document.getElementById('pbg').value = '';
        }
    }

    // Inisialisasi saat halaman load
    document.addEventListener('DOMContentLoaded', function() {
        togglePBGField(); // Set initial state
    });

    // Fungsi untuk menampilkan modal konfirmasi
    function showConfirmationModal() {
        if (!validateForm()) {
            return;
        }

        document.getElementById('confirmationModal').style.display = 'flex';

        const modalContent = document.querySelector('#confirmationModal > div');
        modalContent.style.opacity = '0';
        modalContent.style.transform = 'scale(0.9)';

        setTimeout(() => {
            modalContent.style.transition = 'all 0.3s ease';
            modalContent.style.opacity = '1';
            modalContent.style.transform = 'scale(1)';
        }, 10);
    }

    // Fungsi untuk menutup modal konfirmasi
    function closeConfirmationModal() {
        const modalContent = document.querySelector('#confirmationModal > div');
        modalContent.style.opacity = '0';
        modalContent.style.transform = 'scale(0.9)';

        setTimeout(() => {
            document.getElementById('confirmationModal').style.display = 'none';
            modalContent.style.opacity = '';
            modalContent.style.transform = '';
        }, 300);
    }

    // Fungsi untuk submit form
    function submitForm() {
        const submitBtn = document.querySelector('#confirmationModal button[onclick="submitForm()"]');
        const originalText = submitBtn.innerHTML;
        submitBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i> Menyimpan...';
        submitBtn.disabled = true;

        closeConfirmationModal();

        setTimeout(() => {
            document.getElementById('uploadForm').submit();
        }, 500);
    }

    // Fungsi validasi form
    function validateForm() {
        let isValid = true;

        // Reset errors
        document.querySelectorAll('.field-error').forEach(el => el.remove());
        document.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));

        // Validasi required fields
        const requiredFields = [
            'legalitasbangunan', 'pemilikbangunan', 'alamatbangunan',
            'fungsibangunan', 'jumlahlantai', 'luasbangunan'
        ];

        requiredFields.forEach(fieldName => {
            const field = document.getElementById(fieldName);
            if (field && !field.value.trim()) {
                isValid = false;
                field.classList.add('is-invalid');

                const errorDiv = document.createElement('div');
                errorDiv.className = 'field-error text-danger mt-1';
                errorDiv.style.fontSize = '0.85rem';
                errorDiv.innerHTML = `<i class="bi bi-exclamation-circle me-1"></i> Field ini harus diisi`;
                field.parentNode.appendChild(errorDiv);
            }
        });

        // Validasi angka positif
        const numberFields = ['jumlahlantai', 'ketinggianbangunan', 'luasbangunan'];
        numberFields.forEach(fieldName => {
            const field = document.getElementById(fieldName);
            if (field && field.value) {
                const value = parseFloat(field.value);
                if (value <= 0) {
                    isValid = false;
                    field.classList.add('is-invalid');

                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'field-error text-danger mt-1';
                    errorDiv.style.fontSize = '0.85rem';
                    errorDiv.innerHTML = `<i class="bi bi-exclamation-circle me-1"></i> Nilai harus lebih dari 0`;
                    field.parentNode.appendChild(errorDiv);
                }
            }
        });

        return isValid;
    }
</script>
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


