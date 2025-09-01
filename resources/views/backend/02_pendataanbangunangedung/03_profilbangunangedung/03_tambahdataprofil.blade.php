<style>
 body {
        font-family: 'Poppins', sans-serif;
    }
    .zebra-table {
    width: 100%;
    border-collapse: collapse;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    border: 1px solid #e5e7eb;
}

.zebra-table th {
    background-color: #ADD8E6; /* biru muda */
    color: black;
    text-align: center;
    padding: 8px 12px;
    border: 1px solid #e5e7eb;
    white-space: nowrap;
}

.zebra-table td {
    text-align: center;
    padding: 8px 12px;
    border: 1px solid #e5e7eb;
    white-space: nowrap;
}

.zebra-table tbody tr:nth-child(odd) {
    background-color: #ffffff;
}

.zebra-table tbody tr:nth-child(even) {
    background-color: #f1f1f1;
}

.zebra-table tbody tr:hover {
    background-color: #ffd100 !important;
}

th {
    background-color: #ADD8E6;
}

</style>

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
    background: linear-gradient(to bottom, #7de3f1, #ffffff);
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
                    <div style="
                    margin-bottom:10px;
                    font-weight: 900;
                    font-size: 16px;
                    text-align: center;
                    background: linear-gradient(135deg, #000080, #000080);
                    color: white;
                    padding: 10px 25px;
                    border-radius: 10px;
                    display: inline-block;
                    box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
                    width: 100%;
                ">
                <span style="font-family: 'Poppins', sans-serif;">📌 Halaman : {{$title}}</span>
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
                    <div class="col-md-12" style="margin-top: -20px;">
                        <!--begin::Quick Example-->
                  {{-- <form action="{{ route('dokhibahnew.create') }}" method="POST" enctype="multipart/form-data"> --}}
          @csrf
                            <!-- begin::Body -->
                            <div class="card-body">
                                <div class="row">
    <div class="card-header bg-primary text-white d-flex align-items-center gap-2">
        <i class="bi bi-info-circle fs-5"></i>
        <h5 class="mb-0" style="font-size: 16px;">Informasi Data Bangunan Gedung Kabupaten </h5>
    </div>
</div>
<br>

{{-- @include('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.00_fiturstatus') --}}

       <!-- Left Column (6/12) -->

@include('backend.02_pendataanbangunangedung.00_fiturbg.01_status')

<div class="col-12">
    {{-- <div class="mb-3">
        <label class="form-label" for="dokumenproposal">
            <i class="bi bi-file-earmark-arrow-up" style="margin-right: 8px; color: navy;"></i> Upload Dokumen Proposal
        </label>
        <input
            type="file"
            id="dokumenproposal"
            name="dokumenproposal"
            class="form-control @error('dokumenproposal') is-invalid @enderror"
            accept=".pdf,.doc,.docx"
        />
        @error('dokumenproposal')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        @if (!empty($data->dokumenproposal))
            <small class="text-muted">File saat ini:
                <a href="{{ asset('storage/' . $data->dokumenproposal) }}" target="_blank">
                    Lihat dokumen
                </a>
            </small>
        @endif
    </div> --}}
</div>
<br><hr><br>

{{-- @include('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.00_fiturnavigas') --}}
@include('backend.02_pendataanbangunangedung.00_fiturbg.02_datasemuabangunan')

</div>


    <style>
            .custom-radio {
                position: relative;
                padding-left: 35px;
                padding-right: 15px;
                padding-top: 10px;
                padding-bottom: 10px;
                background-color: #fff; /* netral */
                border: 2px solid #cbd5e0; /* netral */
                border-radius: 12px;
                font-weight: 600;
                cursor: pointer;
                user-select: none;
                transition: border-color 0.3s, background-color 0.3s;
                display: inline-block;
                margin-right: 10px;
            }

            .custom-radio input[type="radio"] {
                position: absolute;
                opacity: 0;
        cursor: pointer;
    }

    .custom-box {
        position: absolute;
        top: 10px;
        left: 10px;
        height: 18px;
        width: 18px;
        background-color: #fff; /* netral */
        border: 2px solid #cbd5e0; /* netral */
        border-radius: 4px;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    /* efek checklist muncul saat ter-check */
    .custom-radio input[type="radio"]:checked ~ .custom-box::after {
        content: '';
        position: absolute;
        left: 5px;
        top: 1px;
        width: 5px;
        height: 10px;
        border: solid;
        border-width: 0 2px 2px 0;
        transform: rotate(45deg);
        animation: checkmarkFade 0.3s ease forwards;
    }

    /* Warna khusus untuk value 'sesuai' */
    .custom-radio input[type="radio"]:checked[value="sesuai"] ~ .custom-box {
        border-color: #3b82f6;
        background-color: #bfdbfe;
    }

    .custom-radio input[type="radio"]:checked[value="sesuai"] ~ .custom-box::after {
        border-color: #1d4ed8;
    }

    /* Warna khusus untuk value 'tidak_sesuai' */
    .custom-radio input[type="radio"]:checked[value="tidak_sesuai"] ~ .custom-box {
        border-color: #ef4444;
        background-color: #fecaca;
    }

    .custom-radio input[type="radio"]:checked[value="tidak_sesuai"] ~ .custom-box::after {
        border-color: #b91c1c;
    }

    /* Animasi checklist */
    @keyframes checkmarkFade {
        0% {
            opacity: 0;
            transform: scale(0.5) rotate(45deg);
        }
        100% {
            opacity: 1;
            transform: scale(1) rotate(45deg);
        }
    }
</style>

<div class="text-center">
    <hr class="my-4" style="border-top: 2px dashed #0d6efd; width: 60%; margin: auto;">
   <h5 class="text-primary fw-bold mt-2" style="font-size: 16px;">
    <i class="bi bi-file-earmark-text-fill me-2"></i>
    Informasi Data Profil Bangunan Gedung
</h5>
</h5>
    <hr class="my-4" style="border-top: 2px dashed #0d6efd; width: 60%; margin: auto;">
</div>

<form id="formPemilik" action="{{ route('bedatabgprofilbangunancreatenew') }}" method="POST">
    @csrf
    <input type="hidden" name="databgkepemilikan_id" value="{{ $data->id }}">
    {{-- <input type="hidden" name="id" value="{{ $data->id }}"> --}}
    {{-- <input type="hidden" name="id" value="{{ $data->id }}"> --}}
    <div class="row g-3 mt-2">
{{-- Luas Tanah --}}
<div class="col-md-6">
    <label class="form-label">
        <i class="bi bi-bounding-box text-primary me-1"></i> Luas Tanah
    </label>
    <input type="number" name="luastanah" step="0.01" min="0"
           class="form-control @error('luastanah') is-invalid @enderror"
           placeholder="Masukkan luas tanah">
    @error('luastanah')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- Nama Bangunan Gedung --}}
<div class="col-md-6">
    <label class="form-label"><i class="bi bi-building text-primary me-1"></i> Nama Bangunan Gedung</label>
    <input type="text" name="namabangunan" class="form-control @error('namabangunan') is-invalid @enderror" value="{{ old('namabangunan') }}">
    @error('namabangunan')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- Alamat Bangunan --}}
<div class="col-md-6">
    <label class="form-label"><i class="bi bi-geo-alt-fill text-primary me-1"></i> Alamat Bangunan</label>
    <input type="text" name="alamatbangunan" class="form-control @error('alamatbangunan') is-invalid @enderror" value="{{ old('alamatbangunan') }}">
    @error('alamatbangunan')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- Fungsi Bangunan --}}
<div class="col-md-6">
    <label class="form-label">
        <i class="bi bi-diagram-3-fill text-primary me-1"></i> Fungsi Bangunan
    </label>
    <select name="fungsibangunan" class="form-control @error('fungsibangunan') is-invalid @enderror">
        <option value="">-- Pilih Fungsi Bangunan --</option>
        <option value="Fungsi Campuran" {{ old('fungsibangunan') == 'Fungsi Campuran' ? 'selected' : '' }}>Fungsi Campuran</option>
        <option value="Fungsi Hunian" {{ old('fungsibangunan') == 'Fungsi Hunian' ? 'selected' : '' }}>Fungsi Hunian</option>
        <option value="Fungsi Keagamaan" {{ old('fungsibangunan') == 'Fungsi Keagamaan' ? 'selected' : '' }}>Fungsi Keagamaan</option>
        <option value="Fungsi Khusus" {{ old('fungsibangunan') == 'Fungsi Khusus' ? 'selected' : '' }}>Fungsi Khusus</option>
        <option value="Fungsi Sosial Budaya" {{ old('fungsibangunan') == 'Fungsi Sosial Budaya' ? 'selected' : '' }}>Fungsi Sosial Budaya</option>
        <option value="Fungsi Usaha" {{ old('fungsibangunan') == 'Fungsi Usaha' ? 'selected' : '' }}>Fungsi Usaha</option>
    </select>
    @error('fungsibangunan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
{{-- Jumlah Lantai --}}
{{-- Jumlah Lantai --}}
<div class="col-md-6">
    <label class="form-label"><i class="bi bi-stack text-primary me-1"></i> Jumlah Lantai</label>
    <input type="text" name="jumlahlantai" id="jumlahlantai"
           class="form-control @error('jumlahlantai') is-invalid @enderror"
           placeholder="Masukkan jumlah lantai"
           data-suffix="Lantai">
    @error('jumlahlantai')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- Luas Lantai Dasar --}}
<div class="col-md-6">
    <label class="form-label"><i class="bi bi-arrows-collapse text-primary me-1"></i> Luas Lantai Dasar</label>
    <input type="text" name="luaslantaildasar" id="luaslantaildasar"
           class="form-control @error('luaslantaildasar') is-invalid @enderror"
           placeholder="Masukkan luas lantai dasar"
           data-suffix="M²">
    @error('luaslantaildasar')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- Total Luas Lantai Gedung --}}
<div class="col-md-6">
    <label class="form-label"><i class="bi bi-fullscreen text-primary me-1"></i> Total Luas Lantai Gedung</label>
    <input type="text" name="totalluaslantai" id="totalluaslantai"
           class="form-control @error('totalluaslantai') is-invalid @enderror"
           placeholder="Masukkan total luas lantai"
           data-suffix="M²">
    @error('totalluaslantai')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- Tinggi Bangunan --}}
<div class="col-md-6">
    <label class="form-label"><i class="bi bi-arrows-expand-vertical text-primary me-1"></i> Tinggi Bangunan</label>
    <input type="text" name="tinggibangunan" id="tinggibangunan"
           class="form-control @error('tinggibangunan') is-invalid @enderror"
           placeholder="Masukkan tinggi bangunan"
           data-suffix="M">
    @error('tinggibangunan')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- Luas Basement --}}
<div class="col-md-6">
    <label class="form-label"><i class="bi bi-layers-fill text-primary me-1"></i> Luas Basement</label>
    <input type="text" name="luasbasement" id="luasbasement"
           class="form-control @error('luasbasement') is-invalid @enderror"
           placeholder="Masukkan luas basement"
           data-suffix="M²">
    @error('luasbasement')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<script>
function setupFieldWithSuffix(id) {
    const input = document.getElementById(id);
    const suffix = input.dataset.suffix || '';

    input.addEventListener('input', function() {
        // Ambil angka saja
        let numbers = this.value.replace(/\D/g, '');
        this.dataset.rawValue = numbers; // simpan angka murni
        this.value = numbers ? numbers + (suffix ? ' ' + suffix : '') : '';
    });

    // Sebelum submit, kirim angka murni
    input.form.addEventListener('submit', function() {
        input.value = input.dataset.rawValue || '';
    });

    // Saat fokus, tampilkan angka murni untuk mudah hapus/edit
    input.addEventListener('focus', function() {
        this.value = this.dataset.rawValue || '';
    });

    // Saat blur, tampilkan dengan suffix
    input.addEventListener('blur', function() {
        const val = this.dataset.rawValue || '';
        this.value = val ? val + (suffix ? ' ' + suffix : '') : '';
    });
}

// Terapkan ke semua field
['jumlahlantai','luaslantaildasar','totalluaslantai','tinggibangunan','luasbasement'].forEach(setupFieldWithSuffix);
</script>

{{-- Koordinat Bangunan --}}
<div class="col-md-6">
    <label class="form-label"><i class="bi bi-pin-map-fill text-primary me-1"></i> Koordinat Bangunan</label>
    <input type="text" name="koordinatbangunan" class="form-control @error('koordinatbangunan') is-invalid @enderror" value="{{ old('koordinatbangunan') }}">
    @error('koordinatbangunan')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- Tanggal Mulai Konstruksi --}}
<div class="col-md-6">
    <label class="form-label"><i class="bi bi-calendar-check-fill text-primary me-1"></i> Tanggal Mulai Konstruksi</label>
    <input type="date" name="tanggalmulaikonstruksi" class="form-control @error('tanggalmulaikonstruksi') is-invalid @enderror" value="{{ old('tanggalmulaikonstruksi') }}">
    @error('tanggalmulaikonstruksi')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- Tanggal Selesai Konstruksi --}}
<div class="col-md-6">
    <label class="form-label"><i class="bi bi-calendar2-check-fill text-primary me-1"></i> Tanggal Selesai Konstruksi</label>
    <input type="date" name="tanggalselesaikonstruksi" class="form-control @error('tanggalselesaikonstruksi') is-invalid @enderror" value="{{ old('tanggalselesaikonstruksi') }}">
    @error('tanggalselesaikonstruksi')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

{{-- Tanggal Rehabilitasi --}}
<div class="col-md-6">
    <label class="form-label"><i class="bi bi-tools text-primary me-1"></i> Tanggal Rehabilitasi</label>
    <input type="date" name="tanggalrehabilitasi" class="form-control @error('tanggalrehabilitasi') is-invalid @enderror" value="{{ old('tanggalrehabilitasi') }}">
    @error('tanggalrehabilitasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

        {{-- Tombol Submit --}}
        <div class="col-12 text-end mt-3">
            <button type="button" class="button-baru" onclick="openModal()">
                <i class="bi bi-save me-1"></i> Simpan Data
            </button>
        </div>
    </div>
</form>

{{-- Modal Konfirmasi --}}
<div id="confirmModal" style="display: none; position: fixed; inset: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px 30px; border-radius: 12px; max-width: 400px; width: 90%; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
        <p style="font-size: 16px; font-weight: 600; margin-bottom: 20px;">Apakah Anda ingin menyimpan data profil bangunan gedung?</p>
        <div style="display: flex; justify-content: center; gap: 12px;">
            <button onclick="submitForm()" style="background-color: #10B981; color: white; padding: 8px 16px; border-radius: 8px; border: none;">
                <i class="bi bi-check-circle me-1"></i> Ya
            </button>
            <button onclick="closeModal()" style="background-color: #EF4444; color: white; padding: 8px 16px; border-radius: 8px; border: none;">
                <i class="bi bi-x-circle me-1"></i> Batal
            </button>
        </div>
    </div>
</div>

<script>
    function toggleCatatan(radio) {
        const catatanField = document.getElementById('catatan-field');
        catatanField.style.display = (radio.value === 'tidak lengkap') ? 'block' : 'none';
    }

    function openModal() {
        document.getElementById("confirmModal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("confirmModal").style.display = "none";
    }

    function submitForm() {
        document.getElementById('formPemilik').submit();
    }

    window.addEventListener('DOMContentLoaded', () => {
        const selected = document.querySelector('input[name=\'pilihancatatan\']:checked');
        if (selected) toggleCatatan(selected);
    });
</script>
                    </div>
                 </div>

                 {{-- @include('backend.00_administrator.00_baganterpisah.07_paginations') --}}

                 <br><br>

                 <!-- Modal Konfirmasi Hapus -->
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
