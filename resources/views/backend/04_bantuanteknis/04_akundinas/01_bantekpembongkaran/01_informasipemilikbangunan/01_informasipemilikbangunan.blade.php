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
                <i class="bi bi-upload me-2"></i> Tampilkan Formulir Berkas Dokumen
            </button>
        </div>

    </div>

    <!-- FORM UPLOAD (Awalnya disembunyikan) -->
    <form action="{{ route('informasipemilikbangunannew.create') }}" method="POST" enctype="multipart/form-data" id="uploadForm" style="display: none; background: #f8fafc; padding: 25px; border-radius: 12px; border: 2px solid #e2e8f0;">
        @csrf

        <!-- Hidden Input untuk ID Data Awal -->
<input  name="id_awal" value="{{ $data->id }}">

<!-- Hidden Input untuk Nama Pemilik Data Awal -->
<input  name="namapemilik_awal" value="{{ $data->namapemilik }}">

        <input type="hidden" name="bantekpembongkaraninduk_id" value="{{ $data->id ?? '' }}">
        <input type="hidden" name="user_id" value="{{ $user->id ?? '' }}">

        <div class="card-body">
            <!-- 1. DATA SURAT PERMOHONAN -->
            <div class="section-header">
                <i class="bi bi-file-earmark-text me-2"></i>Surat Permohonan Izin Pembongkaran
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-modern">
                        <label class="form-label-modern" for="nosurat">
                            <i class="bi bi-hash me-2 text-primary"></i> Nomor Surat Permohonan Izin Pembongkaran
                        </label>
                        <input type="text" class="form-control @error('nosurat') is-invalid @enderror"
                               id="nosurat" name="nosurat" value="{{ old('nosurat') }}">
                        @error('nosurat') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-modern">
                        <label class="form-label-modern" for="tanggalsurat">
                            <i class="bi bi-calendar-date me-2 text-primary"></i> Tanggal Surat Permohonan
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
       class="btn btn-outline-primary btn-sm mb-3"
       download>
        <i class="bi bi-download me-1"></i> Download Template Surat
    </a>

    <!-- PREVIEW FILE -->
    <div id="previewSuratPermohonan" class="mt-3 d-none">
        <label class="form-label-modern mb-2">
            <i class="bi bi-eye me-2 text-success"></i>
            Preview Berkas Yang Diupload
        </label>

        <div class="border rounded-3 p-2 bg-light" id="previewSuratPermohonanBox"></div>
    </div>
</div>

<script>
document.getElementById('suratpermohonan').addEventListener('change', function () {

    const file = this.files[0];
    const previewWrap = document.getElementById('previewSuratPermohonan');
    const previewBox  = document.getElementById('previewSuratPermohonanBox');

    previewBox.innerHTML = '';

    if (!file) {
        previewWrap.classList.add('d-none');
        return;
    }

    const fileURL = URL.createObjectURL(file);

    // PDF
    if (file.type === 'application/pdf') {
        previewBox.innerHTML = `
            <iframe src="${fileURL}"
                    class="w-100 rounded"
                    style="height:400px;"
                    frameborder="0"></iframe>
        `;
    }
    // IMAGE
    else if (file.type.startsWith('image/')) {
        previewBox.innerHTML = `
            <img src="${fileURL}"
                 class="img-fluid rounded shadow-sm"
                 alt="Preview Surat Permohonan">
        `;
    }
    // TIDAK DIDUKUNG
    else {
        previewBox.innerHTML = `
            <p class="text-danger mb-0">
                File tidak bisa dipreview.
            </p>
        `;
    }

    previewWrap.classList.remove('d-none');
});
</script>


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
        <label class="form-label-modern" for="suratkelayakan">
            <i class="bi bi-upload me-2 text-primary"></i>
            Upload Surat Permohonan Kajian Teknis Bangunan Gedung
        </label>

        <input type="file"
               class="form-control @error('suratkelayakan') is-invalid @enderror"
               id="suratkelayakan"
               name="suratkelayakan"
               accept=".pdf,.jpg,.jpeg,.png,.docx">

        @error('suratkelayakan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <small class="text-muted d-block mt-1">
            Format: PDF(Maks. 15MB)
        </small>

        <small class="text-muted d-block mb-2">
            Keterangan: Silahkan download template surat ini, isi, lalu
            <strong class="text-danger">Upload Kembali</strong>.
        </small>

        <!-- BUTTON DOWNLOAD -->
        <a href="/assets/abgblora/00_dokumen/01_bantek/10_pembongkaran/SURAT_KAJIAN_TEKNIS_BANGUNAN_GEDUNG.docx"
           class="btn btn-outline-primary btn-sm mb-3"
           download>
            <i class="bi bi-download me-1"></i> Download Template Surat
        </a>

        <!-- PREVIEW -->
        <div id="previewSuratKajianTeknis" class="mt-3 d-none">
            <label class="form-label-modern mb-2">
                <i class="bi bi-eye me-2 text-success"></i>
                Preview Berkas Yang Diupload
            </label>

            <div class="border rounded-3 p-2 bg-light"
                 id="previewSuratKajianTeknisBox"></div>
        </div>
    </div>
</div>


<script>
(function() {
    // Semua variabel lokal, aman untuk preview lain
    const input = document.getElementById('suratkelayakan');
    const wrapper = document.getElementById('previewSuratKajianTeknis');
    const box = document.getElementById('previewSuratKajianTeknisBox');

    input.addEventListener('change', function () {
        const file = this.files[0];
        box.innerHTML = '';

        if (!file) {
            wrapper.classList.add('d-none');
            return;
        }

        const fileURL = URL.createObjectURL(file);

        // Preview PDF
        if (file.type === 'application/pdf') {
            box.innerHTML = `<iframe src="${fileURL}" class="w-100 rounded" style="height:400px;" frameborder="0"></iframe>`;
        }
        // Preview Image
        else if (file.type.startsWith('image/')) {
            box.innerHTML = `<img src="${fileURL}" class="img-fluid rounded shadow-sm" alt="Preview Surat Kajian Teknis">`;
        }
        // DOCX atau file lain
        else {
            box.innerHTML = `
                <div class="alert alert-warning mb-0">
                    <i class="bi bi-file-earmark-word me-2"></i>
                    <strong>${file.name}</strong><br>
                    File berhasil dipilih (preview tidak tersedia).
                </div>
            `;
        }

        // Tampilkan wrapper preview
        wrapper.classList.remove('d-none');
    });
})();
</script>



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
               accept=".pdf,.docx">

        @error('suratkesanggupan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <small class="text-muted d-block mt-1">
            Format: PDF(Maks. 15MB)
        </small>

        <small class="text-muted d-block mb-2">
            Keterangan: Silahkan download template surat ini, isi, lalu
            <strong class="text-danger">Upload Kembali</strong>.
        </small>

        <!-- BUTTON DOWNLOAD TEMPLATE -->
        <a href="/assets/abgblora/00_dokumen/01_bantek/10_pembongkaran/SURAT_PERNYATAAN_KESANGGUPAN.docx"
           class="btn btn-outline-primary btn-sm mb-3"
           download>
            <i class="bi bi-download me-1"></i> Download Template Surat
        </a>

        <!-- PREVIEW -->
        <div id="previewSuratKesanggupan" class="mt-3 d-none">
            <label class="form-label-modern mb-2">
                <i class="bi bi-eye me-2 text-success"></i>
                Preview Berkas Yang Diupload
            </label>

            <div class="border rounded-3 p-2 bg-light"
                 id="previewSuratKesanggupanBox"></div>
        </div>
    </div>
</div>

<script>
document.getElementById('suratkesanggupan').addEventListener('change', function () {

    const file = this.files[0];
    const previewWrap = document.getElementById('previewSuratKesanggupan');
    const previewBox  = document.getElementById('previewSuratKesanggupanBox');

    previewBox.innerHTML = '';

    if (!file) {
        previewWrap.classList.add('d-none');
        return;
    }

    const fileURL = URL.createObjectURL(file);

    // PDF
    if (file.type === 'application/pdf') {
        previewBox.innerHTML = `
            <iframe src="${fileURL}"
                    class="w-100 rounded"
                    style="height:400px;"
                    frameborder="0"></iframe>
        `;
    }
    // DOCX / lainnya
    else {
        previewBox.innerHTML = `
            <div class="alert alert-warning mb-0">
                <i class="bi bi-file-earmark-word me-2"></i>
                <strong>${file.name}</strong><br>
                File berhasil dipilih (preview isi dokumen tidak tersedia).
            </div>
        `;
    }

    previewWrap.classList.remove('d-none');
});
</script>


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

        <!-- INPUT FILE -->
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
                class="btn btn-outline-primary btn-sm mt-2 me-2"
                data-bs-toggle="modal"
                data-bs-target="#modalContohKTP">
            <i class="bi bi-eye me-1"></i> Lihat Contoh KTP
        </button>

        <!-- PREVIEW UPLOAD -->
        <div id="previewKTPWrapper" class="mt-3 d-none">
            <label class="form-label-modern mb-2">
                <i class="bi bi-eye-fill me-2 text-success"></i>
                Preview KTP Yang Diupload
            </label>

            <div class="border rounded-3 p-2 bg-light"
                 id="previewKTPBox"></div>
        </div>
    </div>
</div>

<!-- MODAL CONTOH KTP -->
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
                     class="img-fluid rounded shadow-sm"
                     alt="Contoh KTP">
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

<script>
document.getElementById('ktp').addEventListener('change', function () {

    const file = this.files[0];
    const previewWrapper = document.getElementById('previewKTPWrapper');
    const previewBox     = document.getElementById('previewKTPBox');

    previewBox.innerHTML = '';

    if (!file) {
        previewWrapper.classList.add('d-none');
        return;
    }

    const fileURL = URL.createObjectURL(file);

    // PDF
    if (file.type === 'application/pdf') {
        previewBox.innerHTML = `
            <iframe src="${fileURL}"
                    class="w-100 rounded"
                    style="height:400px;"
                    frameborder="0"></iframe>
        `;
    }
    // IMAGE
    else if (file.type.startsWith('image/')) {
        previewBox.innerHTML = `
            <img src="${fileURL}"
                 class="img-fluid rounded shadow-sm"
                 alt="Preview KTP">
        `;
    }
    // FILE LAIN
    else {
        previewBox.innerHTML = `
            <div class="alert alert-warning mb-0">
                <i class="bi bi-file-earmark me-2"></i>
                <strong>${file.name}</strong><br>
                File berhasil dipilih.
            </div>
        `;
    }

    previewWrapper.classList.remove('d-none');
});
</script>


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
                class="btn btn-outline-primary btn-sm mt-2 me-2"
                data-bs-toggle="modal"
                data-bs-target="#modalContohSK">
            <i class="bi bi-eye me-1"></i> Lihat Contoh SK
        </button>

        <!-- PREVIEW UPLOAD -->
        <div id="previewSKWrapper" class="mt-3 d-none">
            <label class="form-label-modern mb-2">
                <i class="bi bi-eye-fill me-2 text-success"></i>
                Preview SK Yang Diupload
            </label>

            <div class="border rounded-3 p-2 bg-light"
                 id="previewSKBox"></div>
        </div>
    </div>
</div>

<!-- MODAL CONTOH SK -->
<div class="modal fade" id="modalContohSK" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow">

            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <i class="bi bi-file-earmark-text me-2 text-primary"></i>
                    Contoh SK
                </h5>
                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"></button>
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

<script>
document.getElementById('sk').addEventListener('change', function () {

    const file = this.files[0];
    const previewWrapper = document.getElementById('previewSKWrapper');
    const previewBox     = document.getElementById('previewSKBox');

    previewBox.innerHTML = '';

    if (!file) {
        previewWrapper.classList.add('d-none');
        return;
    }

    const fileURL = URL.createObjectURL(file);

    // PDF
    if (file.type === 'application/pdf') {
        previewBox.innerHTML = `
            <iframe src="${fileURL}"
                    class="w-100 rounded"
                    style="height:400px;"
                    frameborder="0"></iframe>
        `;
    }
    // IMAGE
    else if (file.type.startsWith('image/')) {
        previewBox.innerHTML = `
            <img src="${fileURL}"
                 class="img-fluid rounded shadow-sm"
                 alt="Preview SK">
        `;
    }
    // FILE LAIN
    else {
        previewBox.innerHTML = `
            <div class="alert alert-warning mb-0">
                <i class="bi bi-file-earmark me-2"></i>
                <strong>${file.name}</strong><br>
                File berhasil dipilih.
            </div>
        `;
    }

    previewWrapper.classList.remove('d-none');
});
</script>


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

        <!-- PREVIEW FILE -->
        <div id="previewSertifikatTanahWrapper" class="mt-2 d-none">
            <label class="form-label-modern mb-2">
                <i class="bi bi-eye me-2 text-success"></i>
                Preview Berkas Sertifikat Tanah
            </label>
            <div class="border rounded-3 p-2 bg-light" id="previewSertifikatTanahBox"></div>
        </div>

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

<script>
(function() {
    const input = document.getElementById('sertifikattanah');
    const wrapper = document.getElementById('previewSertifikatTanahWrapper');
    const box = document.getElementById('previewSertifikatTanahBox');

    input.addEventListener('change', function () {
        const file = this.files[0];
        box.innerHTML = '';

        if (!file) {
            wrapper.classList.add('d-none');
            return;
        }

        const fileURL = URL.createObjectURL(file);

        // PDF
        if (file.type === 'application/pdf') {
            box.innerHTML = `<iframe src="${fileURL}" class="w-100 rounded" style="height:400px;" frameborder="0"></iframe>`;
        }
        // IMAGE
        else if (file.type.startsWith('image/')) {
            box.innerHTML = `<img src="${fileURL}" class="img-fluid rounded shadow-sm" alt="Preview Sertifikat Tanah">`;
        }
        // FILE LAIN
        else {
            box.innerHTML = `
                <div class="alert alert-warning mb-0">
                    <i class="bi bi-file-earmark me-2"></i>
                    <strong>${file.name}</strong><br>
                    File berhasil dipilih (preview tidak tersedia).
                </div>
            `;
        }

        wrapper.classList.remove('d-none');
    });
})();
</script>


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

        <select
            class="form-select @error('legalitasbangunan') is-invalid @enderror"
            id="legalitasbangunan"
            name="legalitasbangunan">

            <option value="">-- Pilih Legalitas --</option>
            <option value="Legal" {{ old('legalitasbangunan') == 'Legal' ? 'selected' : '' }}>
                Legal
            </option>
            <option value="Belum Berizin" {{ old('legalitasbangunan') == 'Belum Berizin' ? 'selected' : '' }}>
                Belum Berizin
            </option>
        </select>

        @error('legalitasbangunan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <small class="text-muted d-block mt-1">
            Keterangan: Pilih status legalitas bangunan sesuai kondisi sebenarnya.
        </small>
    </div>
</div>

    <!-- Nomor PBG -->
   <div class="col-md-6">
    <div class="form-modern">
        <label class="form-label-modern" for="nomorpbg">
            <i class="bi bi-hash me-2 text-primary"></i> Nomor PBG
        </label>

        <input type="text"
               class="form-control @error('nomorpbg') is-invalid @enderror"
               id="nomorpbg"
               name="nomorpbg"
               value="{{ old('nomorpbg') }}"
               placeholder="Nomor Persetujuan Bangunan Gedung">

        @error('nomorpbg')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <small class="text-muted d-block mt-1">
            Keterangan: <em>Lewati kolom ini apabila bangunan belum memiliki PBG.</em>
        </small>
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
                <i class="bi bi-tag me-2 text-primary"></i> Kode Inventaris Barang
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
            <i class="bi bi-geo-alt-fill me-2 text-primary"></i>
            Koordinat Bangunan
        </label>

        <input type="text"
               class="form-control @error('koordinatbangunan') is-invalid @enderror"
               id="koordinatbangunan"
               name="koordinatbangunan"
               value="{{ $data->keterangan ?? old('koordinatbangunan') }}"
               data-sumber="keterangan"
               readonly>

        @error('koordinatbangunan')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
<small class="text-muted d-block mt-1">
    Keterangan: Data diisi secara otomatis dari Data Dasar Permohonan.
</small>

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

        <select
            class="form-select @error('jumlahlantai') is-invalid @enderror"
            id="jumlahlantai"
            name="jumlahlantai">

            <option value="">-- Pilih Jumlah Lantai --</option>
            @for ($i = 1; $i <= 8; $i++)
                <option value="{{ $i }}" {{ old('jumlahlantai') == $i ? 'selected' : '' }}>
                    {{ $i }} Lantai
                </option>
            @endfor
        </select>

        @error('jumlahlantai')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
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
<div class="col-md-6">
    <div class="form-modern">
        <label class="form-label-modern" for="nilaibangunanbaru_display">
            <i class="bi bi-cash-coin me-2 text-primary"></i>
            Nilai Bangunan Saat Ini (Rp)
        </label>

        <!-- INPUT TAMPILAN (FORMAT RUPIAH) -->
        <input type="text"
               class="form-control rupiah-display"
               id="nilaibangunanbaru_display"
               data-real="nilaibangunanbaru"
               placeholder="Contoh: 500.000.000">

        <!-- INPUT ASLI (ANGKA MURNI KE DATABASE) -->
        <input type="hidden"
               name="nilaibangunanbaru"
               id="nilaibangunanbaru"
               value="{{ old('nilaibangunanbaru') }}">

        @error('nilaibangunanbaru')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror

    </div>
</div>


<div class="col-md-6">
    <div class="form-modern">
        <label class="form-label-modern" for="nilaibangunanlama_display">
            <i class="bi bi-cash-stack me-2 text-primary"></i>
            Nilai Bangunan Pada Saat Dibangun (Rp)
        </label>

        <!-- INPUT TAMPILAN (FORMAT RUPIAH) -->
        <input type="text"
               class="form-control rupiah-display"
               id="nilaibangunanlama_display"
               data-real="nilaibangunanlama"
               placeholder="Contoh: 300.000.000">

        <!-- INPUT ASLI (ANGKA MURNI KE DATABASE) -->
        <input type="hidden"
               name="nilaibangunanlama"
               id="nilaibangunanlama"
               value="{{ old('nilaibangunanlama') }}">

        @error('nilaibangunanlama')
            <div class="invalid-feedback d-block">{{ $message }}</div>
        @enderror
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {

    document.querySelectorAll('.rupiah-display').forEach(function (displayInput) {

        const realId = displayInput.dataset.real;
        const realInput = document.getElementById(realId);

        if (!realInput) return;

        // isi ulang jika ada old value (edit / gagal validasi)
        if (realInput.value) {
            displayInput.value = formatRupiah(realInput.value);
        }

        displayInput.addEventListener('input', function () {
            let angka = this.value.replace(/[^0-9]/g, '');
            realInput.value = angka;
            this.value = formatRupiah(angka);
        });
    });

    function formatRupiah(angka) {
        if (!angka) return '';
        return angka.replace(/\B(?=(\d{3})+(?!\d))/g, '.');
    }

});
</script>


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
            <i class="bi bi-upload me-2 text-primary"></i>
            Upload Berkas KIB
        </label>

        <!-- INPUT UPLOAD -->
        <input type="file"
               class="form-control @error('kib') is-invalid @enderror"
               id="kib"
               name="kib"
               accept=".pdf,.jpg,.jpeg,.png">

        @error('kib')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <small class="text-muted d-block mt-1">
            Format: PDF, JPG, PNG (Maks. 15MB)
        </small>

        <!-- BUTTON LIHAT CONTOH -->
        <button type="button"
                class="btn btn-outline-primary btn-sm mt-2 me-2"
                data-bs-toggle="modal"
                data-bs-target="#modalContohKIB">
            <i class="bi bi-eye me-1"></i> Lihat Contoh Berkas KIB
        </button>

        <!-- PREVIEW UPLOAD -->
        <div id="previewKIBWrapper" class="mt-3 d-none">
            <label class="form-label-modern mb-2">
                <i class="bi bi-eye-fill me-2 text-success"></i>
                Preview Berkas KIB Yang Diupload
            </label>

            <div class="border rounded-3 p-2 bg-light"
                 id="previewKIBBox"></div>
        </div>
    </div>
</div>

<!-- MODAL CONTOH KIB -->
<div class="modal fade" id="modalContohKIB" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow">

            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <i class="bi bi-file-earmark-text me-2 text-primary"></i>
                    Contoh Berkas KIB
                </h5>
                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <img src="/assets/abgblora/00_dokumen/01_bantek/10_pembongkaran/CONTOH_KIB.png"
                     alt="Contoh Berkas KIB"
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

<script>
document.getElementById('kib').addEventListener('change', function () {

    const file = this.files[0];
    const wrapper = document.getElementById('previewKIBWrapper');
    const box     = document.getElementById('previewKIBBox');

    box.innerHTML = '';

    if (!file) {
        wrapper.classList.add('d-none');
        return;
    }

    const fileURL = URL.createObjectURL(file);

    // PDF
    if (file.type === 'application/pdf') {
        box.innerHTML = `
            <iframe src="${fileURL}"
                    class="w-100 rounded"
                    style="height:400px;"
                    frameborder="0"></iframe>
        `;
    }
    // IMAGE
    else if (file.type.startsWith('image/')) {
        box.innerHTML = `
            <img src="${fileURL}"
                 class="img-fluid rounded shadow-sm"
                 alt="Preview Berkas KIB">
        `;
    }
    // FILE LAIN
    else {
        box.innerHTML = `
            <div class="alert alert-warning mb-0">
                <i class="bi bi-file-earmark me-2"></i>
                <strong>${file.name}</strong><br>
                File berhasil dipilih.
            </div>
        `;
    }

    wrapper.classList.remove('d-none');
});
</script>

<div class="modal fade" id="modalContohKIB" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow">

            <div class="modal-header border-0">
                <h5 class="modal-title">
                    <i class="bi bi-file-earmark-text me-2 text-primary"></i>
                    Contoh Berkas KIB
                </h5>
                <button type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body text-center">
                <img src="/assets/abgblora/00_dokumen/01_bantek/10_pembongkaran/CONTOH_KIB.png"
                     alt="Contoh Berkas KIB"
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
                <i class="bi bi-question-circle me-2 text-primary"></i>
                Apakah Ada PBG?
            </label>

            <select class="form-select @error('apakahadapbg') is-invalid @enderror"
                    id="apakahadapbg"
                    name="apakahadapbg"
                    onchange="togglePBGField()">
                <option value="">-- Pilih --</option>
                <option value="Ya" {{ old('apakahadapbg') == 'Ya' ? 'selected' : '' }}>Ya</option>
                <option value="Tidak" {{ old('apakahadapbg') == 'Tidak' ? 'selected' : '' }}>Tidak</option>
            </select>

            @error('apakahadapbg')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- FIELD DINAMIS -->
    <div class="col-md-6" id="pbgField" style="display:none;">
    <div class="form-modern">
        <label class="form-label-modern" id="pbgLabel">
            <i class="bi bi-upload me-2 text-primary"></i>
            Upload PBG
        </label>

        <input type="file"
               class="form-control @error('pbg') is-invalid @enderror"
               id="pbg"
               name="pbg"
               accept=".pdf,.jpg,.jpeg,.png">

        @error('pbg')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        <!-- PREVIEW FILE -->
        <div id="previewPBGWrapper" class="mt-2 d-none">
            <div id="previewPBGBox"></div>
        </div>

        <small class="text-muted d-block mt-1">
            Format: PDF(Maks. 5MB)
        </small>

        <!-- DOWNLOAD TEMPLATE SURAT -->
        <a href="/assets/abgblora/00_dokumen/01_bantek/10_pembongkaran/SURAT_PERNYATAAN_TIDAK_MEMPUNYAI_PBG.docx"
           id="downloadSuratPBG"
           class="btn btn-outline-primary btn-sm mt-2"
           style="display:none;"
           download>
            <i class="bi bi-download me-1"></i>
            Download Template Surat
        </a>
    </div>
</div>


<script>
const pbgInput = document.getElementById('pbg');
const previewWrapper = document.getElementById('previewPBGWrapper');
const previewBox = document.getElementById('previewPBGBox');
const downloadSurat = document.getElementById('downloadSuratPBG');

// Preview file
pbgInput.addEventListener('change', function () {
    const file = this.files[0];
    previewBox.innerHTML = '';

    if (!file) {
        previewWrapper.classList.add('d-none');
        return;
    }

    const fileURL = URL.createObjectURL(file);

    if (file.type === 'application/pdf') {
        previewBox.innerHTML = `<iframe src="${fileURL}" class="w-100 rounded" style="height:400px;" frameborder="0"></iframe>`;
    } else if (file.type.startsWith('image/')) {
        previewBox.innerHTML = `<img src="${fileURL}" class="img-fluid rounded shadow-sm" alt="Preview Berkas PBG">`;
    } else {
        previewBox.innerHTML = `<div class="alert alert-warning mb-0"><i class="bi bi-file-earmark me-2"></i><strong>${file.name}</strong><br>File berhasil dipilih.</div>`;
    }

    previewWrapper.classList.remove('d-none');

    // Jika ada file, sembunyikan download template
    downloadSurat.style.display = 'none';
});

// Contoh: show template jika user tidak punya PBG (misal checkbox)
function togglePBGField(adaPBG) {
    if (adaPBG) {
        document.getElementById('pbgField').style.display = 'block';
        downloadSurat.style.display = 'none';
    } else {
        document.getElementById('pbgField').style.display = 'block';
        previewWrapper.classList.add('d-none');
        previewBox.innerHTML = '';
        pbgInput.value = '';
        downloadSurat.style.display = 'inline-block';
    }
}
</script>

</div>

<script>
function togglePBGField() {
    const pilihan = document.getElementById('apakahadapbg').value;
    const field   = document.getElementById('pbgField');
    const label   = document.getElementById('pbgLabel');
    const downloadBtn = document.getElementById('downloadSuratPBG');

    if (pilihan === 'Ya') {
        field.style.display = 'block';
        label.innerHTML = '<i class="bi bi-upload me-2 text-primary"></i> Upload PBG';
        downloadBtn.style.display = 'none';
    }
    else if (pilihan === 'Tidak') {
        field.style.display = 'block';
        label.innerHTML = '<i class="bi bi-file-earmark-text me-2 text-primary"></i> Upload Surat Pernyataan Tidak Mempunyai PBG';
        downloadBtn.style.display = 'inline-block';
    }
    else {
        field.style.display = 'none';
    }
}

// auto trigger kalau ada old value
document.addEventListener('DOMContentLoaded', togglePBGField);
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


