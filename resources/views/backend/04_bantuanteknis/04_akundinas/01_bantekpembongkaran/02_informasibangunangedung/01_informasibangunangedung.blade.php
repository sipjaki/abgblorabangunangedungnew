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
                Dokumen Informasi Details Data Bangunan Gedung
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
           class="button-berkas">
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
<input type="hidden" name="id_awal" value="{{ $data->id }}">

<!-- Hidden Input untuk Nama Pemilik Data Awal -->
<input type="hidden" name="namapemilik_awal" value="{{ $data->namapemilik }}">


<input type="hidden" name="bantekpembongkaraninduk_id" value="{{ $data->id }}">

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
            {{-- <div class="section-header mt-4">
                <i class="bi bi-building me-2"></i> Data Surat Permohonan Kajian Teknis Bangunan Gedung
            </div> --}}

            <div class="row">
                {{-- <div class="col-md-6">
                    <div class="form-modern">
                        <label class="form-label-modern" for="namabangunan">
                            <i class="bi bi-building me-2 text-primary"></i> Nama Bangunan
                        </label>

                        <input type="text" class="form-control @error('namabangunan') is-invalid @enderror"
                               id="namabangunan" name="namabangunan" value="{{ old('namabangunan') }}">
                        @error('namabangunan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div> --}}

{{-- <div class="col-md-6">
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
</div> --}}
{{-- <div class="col-12">
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
</div> --}}


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


