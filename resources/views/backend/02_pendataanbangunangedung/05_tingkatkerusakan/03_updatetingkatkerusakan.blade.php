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
<br><hr>

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
    <hr class="my-4" style="border-top: 2px dashed #fdd100; width: 60%; margin: auto;">
   <h5 class="text-primary fw-bold mt-2" style="font-size: 16px;">
    <i class="bi bi-file-earmark-text-fill me-2"></i>
    Perbaikan Informasi Data Struktur & Tingkat Kerusakan Bangunan Gedung
</h5>
</h5>
    <hr class="my-4" style="border-top: 2px dashed #0d6efd; width: 60%; margin: auto;">
</div>


{{-- ----------- --}}

    <div class="container my-4">
        {{-- <form id="formPemilik" action="{{ route('bedatabgstrukrrusakcreatenew', $datakerusakan->id, $datastruktur->id) }}" method="POST" enctype="multipart/form-data">
            @csrf --}}

   <form id="formPemilik"
      action="{{ route('bedatabgstrukrrusakupdatenew', ['datakerusakan' => $datakerusakan->id, 'datastruktur' => $datastruktur->id]) }}"
      method="POST"
      enctype="multipart/form-data">
    @csrf
    @method('PUT')
            {{-- <input type="hidden" name="databgkepemilikan_id" value="{{ $databangunan->id }}"> --}}

            <div class="row g-3 mt-2">
                <!-- ===================== BAGIAN 1 ===================== -->
                <div class="col-12">
                    <h6 class="mt-3 fw-bold text-primary"><i class="bi bi-building me-1"></i>Struktur Bangunan Bawah & Atas</h6>
                </div>

              <div class="col-md-4">
    <label class="form-label"><i class="bi bi-box text-primary me-1"></i> Struktur Bangunan Bawah</label>
    <input type="text" name="struktur_bangunan_bawah" class="form-control @error('struktur_bangunan_bawah') is-invalid @enderror" value="{{ $datastruktur->struktur_bangunan_bawah ?? old('struktur_bangunan_bawah') }}">
    @error('struktur_bangunan_bawah')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="col-md-4">
    <label class="form-label"><i class="bi bi-box-seam text-primary me-1"></i> Struktur Bangunan Atas</label>
    <input type="text" name="struktur_bangunan_atas" class="form-control @error('struktur_bangunan_atas') is-invalid @enderror" value="{{ $datastruktur->struktur_bangunan_atas ?? old('struktur_bangunan_atas') }}">
    @error('struktur_bangunan_atas')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

<div class="col-md-4">
    <label class="form-label"><i class="bi bi-house-gear text-primary me-1"></i> Struktur Atap</label>
    <input type="text" name="struktur_atap" class="form-control @error('struktur_atap') is-invalid @enderror" value="{{ $datastruktur->struktur_atap ?? old('struktur_atap') }}">
    @error('struktur_atap')<div class="invalid-feedback">{{ $message }}</div>@enderror
</div>

                <!-- ===================== BAGIAN 2 ===================== -->
                <div class="text-center">
                    <hr class="my-4 section-divider">
                    <h5 class="text-primary fw-bold mt-2 section-title">
                        <i class="bi bi-file-earmark-text-fill me-2"></i>
                        Bagian 1 - Pondasi
                    </h5>
                    <hr class="my-4 section-divider">
                </div>

                <div class="row">

                  <div class="col-md-6">
    <div class="mb-3">
        <label class="form-label"><i class="bi bi-bricks text-primary me-1"></i> Pondasi</label>
        <input type="text" name="pondasi" class="form-control @error('pondasi') is-invalid @enderror" value="{{ $datastruktur->pondasi ?? old('pondasi') }}">
        @error('pondasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-exclamation-circle text-warning me-1"></i> Indikasi Kerusakan</label>
        <select name="indikasi_kerusakan2" class="form-select">
            <option value="">-- Pilih Indikasi --</option>
            <option value="Tidak Ada Indikasi Kerusakan" {{ ($datastruktur->indikasi_kerusakan2 ?? old('indikasi_kerusakan2')) == 'Tidak Ada Indikasi Kerusakan' ? 'selected' : '' }}>Tidak Ada Indikasi Kerusakan</option>
            <option value="Indikasi Kerusakan" {{ ($datastruktur->indikasi_kerusakan2 ?? old('indikasi_kerusakan2')) == 'Indikasi Kerusakan' ? 'selected' : '' }}>Indikasi Kerusakan</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-bar-chart text-primary me-1"></i> Tingkat Kerusakan</label>
        <select name="tingkat_kerusakan2" class="form-select">
            <option value="">-- Pilih Tingkat Kerusakan --</option>
            <option value="Ringan" {{ ($datastruktur->tingkat_kerusakan2 ?? old('tingkat_kerusakan2')) == 'Ringan' ? 'selected' : '' }}>Ringan</option>
            <option value="Sedang" {{ ($datastruktur->tingkat_kerusakan2 ?? old('tingkat_kerusakan2')) == 'Sedang' ? 'selected' : '' }}>Sedang</option>
            <option value="Berat" {{ ($datastruktur->tingkat_kerusakan2 ?? old('tingkat_kerusakan2')) == 'Berat' ? 'selected' : '' }}>Berat</option>
            <option value="Tidak Ada Kerusakan" {{ ($datastruktur->tingkat_kerusakan2 ?? old('tingkat_kerusakan2')) == 'Tidak Ada Kerusakan' ? 'selected' : '' }}>Tidak Ada Kerusakan</option>
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label">
            <i class="bi bi-bricks text-primary me-1"></i> Foto Faktual Pondasi | Max 15 MB
        </label>
        <input
            type="file"
            name="struktur_bawah"
            accept="image/*"
            class="form-control @error('struktur_bawah') is-invalid @enderror"
            onchange="previewStrukturBawah(event)">
        @error('struktur_bawah')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- Foto Lama --}}
        @if(isset($datakerusakan->struktur_bawah) && $datakerusakan->struktur_bawah)
            <div class="mt-3 text-center">
                <p class="fw-bold text-muted mb-1">Foto Faktual Lama</p>
                @if(file_exists(public_path('storage/' . $datakerusakan->struktur_bawah)))
                    <img
                        src="{{ asset('storage/' . $datakerusakan->struktur_bawah) }}"
                        alt="Foto Lama Struktur Bawah"
                        class="img-thumbnail"
                        style="max-height: 200px; display:block; margin:auto;">
                @else
                    <img
                        src="{{ asset($datakerusakan->struktur_bawah) }}"
                        alt="Foto Lama Struktur Bawah"
                        class="img-thumbnail"
                        style="max-height: 200px; display:block; margin:auto;">
                @endif
            </div>
        @endif

        {{-- Foto Baru (Preview Upload) --}}
        <div class="mt-3 text-center">
            <p class="fw-bold text-muted mb-1">Foto Faktual Baru</p>
            <img
                id="preview-struktur-bawah"
                src="#"
                alt="Preview Struktur Bawah"
                class="img-thumbnail"
                style="max-height: 200px; display:none; margin:auto;">
        </div>
    </div>
</div>

{{-- Script Preview --}}
<script>
function previewStrukturBawah(event) {
    const imgPreview = document.getElementById('preview-struktur-bawah');
    const file = event.target.files[0];
    if (file) {
        imgPreview.style.display = "block";
        imgPreview.src = URL.createObjectURL(file);
        imgPreview.onload = () => {
            URL.revokeObjectURL(imgPreview.src);
        }
    }
}
</script>

                </div>

                <!-- ===================== BAGIAN 3 ===================== -->
                <div class="text-center">
                    <hr class="my-4 section-divider">
                    <h5 class="text-primary fw-bold mt-2 section-title">
                        <i class="bi bi-file-earmark-text-fill me-2"></i>
                        Bagian 2 - Struktur
                    </h5>
                    <hr class="my-4 section-divider">
                </div>

                <div class="row">
                   <div class="col-md-6">
    <div class="mb-3">
        <label class="form-label"><i class="bi bi-building text-primary me-1"></i> Struktur</label>
        <input type="text" name="struktur" class="form-control" value="{{ $datastruktur->struktur ?? old('struktur') }}">
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-exclamation-circle text-warning me-1"></i> Indikasi Kerusakan</label>
        <select name="indikasi_kerusakan3" class="form-select">
            <option value="">-- Pilih Indikasi --</option>
            <option value="Tidak Ada Indikasi Kerusakan" {{ ($datastruktur->indikasi_kerusakan3 ?? old('indikasi_kerusakan3')) == 'Tidak Ada Indikasi Kerusakan' ? 'selected' : '' }}>Tidak Ada Indikasi Kerusakan</option>
            <option value="Indikasi Kerusakan" {{ ($datastruktur->indikasi_kerusakan3 ?? old('indikasi_kerusakan3')) == 'Indikasi Kerusakan' ? 'selected' : '' }}>Indikasi Kerusakan</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-bar-chart text-primary me-1"></i> Tingkat Kerusakan</label>
        <select name="tingkat_kerusakan3" class="form-select">
            <option value="">-- Pilih Tingkat Kerusakan --</option>
            <option value="Ringan" {{ ($datastruktur->tingkat_kerusakan3 ?? old('tingkat_kerusakan3')) == 'Ringan' ? 'selected' : '' }}>Ringan</option>
            <option value="Sedang" {{ ($datastruktur->tingkat_kerusakan3 ?? old('tingkat_kerusakan3')) == 'Sedang' ? 'selected' : '' }}>Sedang</option>
            <option value="Berat" {{ ($datastruktur->tingkat_kerusakan3 ?? old('tingkat_kerusakan3')) == 'Berat' ? 'selected' : '' }}>Berat</option>
            <option value="Tidak Ada Kerusakan" {{ ($datastruktur->tingkat_kerusakan3 ?? old('tingkat_kerusakan3')) == 'Tidak Ada Kerusakan' ? 'selected' : '' }}>Tidak Ada Kerusakan</option>
        </select>
    </div>
</div>

                 <div class="col-md-6">
    <div class="mb-3">
        <label class="form-label">
            <i class="bi bi-building text-success me-1"></i> Foto Faktual Struktur | Max 15 MB
        </label>
        <input
            type="file"
            name="struktur_atas"
            accept="image/*"
            class="form-control @error('struktur_atas') is-invalid @enderror"
            onchange="previewStrukturAtas(event)">
        @error('struktur_atas')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- Foto Lama --}}
        @if(isset($datakerusakan->struktur_atas) && $datakerusakan->struktur_atas)
            <div class="mt-3 text-center">
                <p class="fw-bold text-muted mb-1">Foto Faktual Lama</p>
                @if(file_exists(public_path('storage/' . $datakerusakan->struktur_atas)))
                    <img
                        src="{{ asset('storage/' . $datakerusakan->struktur_atas) }}"
                        alt="Foto Lama Struktur Atas"
                        class="img-thumbnail"
                        style="max-height: 200px; display:block; margin:auto;">
                @else
                    <img
                        src="{{ asset($datakerusakan->struktur_atas) }}"
                        alt="Foto Lama Struktur Atas"
                        class="img-thumbnail"
                        style="max-height: 200px; display:block; margin:auto;">
                @endif
            </div>
        @endif

        {{-- Foto Baru --}}
        <div class="mt-3 text-center">
            <p class="fw-bold text-muted mb-1">Foto Faktual Baru</p>
            <img
                id="preview-struktur-atas"
                src="#"
                alt="Preview Struktur Atas"
                class="img-thumbnail"
                style="max-height: 200px; display:none; margin:auto;">
        </div>
    </div>
</div>

{{-- Script Preview --}}
<script>
function previewStrukturAtas(event) {
    const imgPreview = document.getElementById('preview-struktur-atas');
    const file = event.target.files[0];
    if (file) {
        imgPreview.style.display = "block";
        imgPreview.src = URL.createObjectURL(file);
        imgPreview.onload = () => {
            URL.revokeObjectURL(imgPreview.src);
        }
    }
}
</script>


                </div>

                <!-- ===================== BAGIAN 4 ===================== -->
                <div class="text-center">
                    <hr class="my-4 section-divider">
                    <h5 class="text-primary fw-bold mt-2 section-title">
                        <i class="bi bi-file-earmark-text-fill me-2"></i>
                        Bagian 3 - Atap
                    </h5>
                    <hr class="my-4 section-divider">
                </div>

                <div class="row">
          <div class="col-md-6">
    <div class="mb-3">
        <label class="form-label"><i class="bi bi-house text-primary me-1"></i> Atap</label>
        <input type="text" name="atap" class="form-control" value="{{ $datastruktur->atap ?? old('atap') }}">
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-exclamation-circle text-warning me-1"></i> Indikasi Kerusakan</label>
        <select name="indikasi_kerusakan4" class="form-select">
            <option value="">-- Pilih Indikasi --</option>
            <option value="Tidak Ada Indikasi Kerusakan" {{ ($datastruktur->indikasi_kerusakan4 ?? old('indikasi_kerusakan4')) == 'Tidak Ada Indikasi Kerusakan' ? 'selected' : '' }}>Tidak Ada Indikasi Kerusakan</option>
            <option value="Indikasi Kerusakan" {{ ($datastruktur->indikasi_kerusakan4 ?? old('indikasi_kerusakan4')) == 'Indikasi Kerusakan' ? 'selected' : '' }}>Indikasi Kerusakan</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-bar-chart text-primary me-1"></i> Tingkat Kerusakan</label>
        <select name="tingkat_kerusakan4" class="form-select">
            <option value="">-- Pilih Tingkat Kerusakan --</option>
            <option value="Ringan" {{ ($datastruktur->tingkat_kerusakan4 ?? old('tingkat_kerusakan4')) == 'Ringan' ? 'selected' : '' }}>Ringan</option>
            <option value="Sedang" {{ ($datastruktur->tingkat_kerusakan4 ?? old('tingkat_kerusakan4')) == 'Sedang' ? 'selected' : '' }}>Sedang</option>
            <option value="Berat" {{ ($datastruktur->tingkat_kerusakan4 ?? old('tingkat_kerusakan4')) == 'Berat' ? 'selected' : '' }}>Berat</option>
            <option value="Tidak Ada Kerusakan" {{ ($datastruktur->tingkat_kerusakan4 ?? old('tingkat_kerusakan4')) == 'Tidak Ada Kerusakan' ? 'selected' : '' }}>Tidak Ada Kerusakan</option>
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label">
            <i class="bi bi-house-door text-warning me-1"></i> Foto Faktual Atap | Max 15 MB
        </label>
        <input
            type="file"
            name="genteng"
            accept="image/*"
            class="form-control @error('genteng') is-invalid @enderror"
            onchange="previewGenteng(event)">
        @error('genteng')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- Foto Lama --}}
        @if(isset($datakerusakan->genteng) && $datakerusakan->genteng)
            <div class="mt-3 text-center">
                <p class="fw-bold text-muted mb-1">Foto Faktual Lama</p>
                @if(file_exists(public_path('storage/' . $datakerusakan->genteng)))
                    <img
                        src="{{ asset('storage/' . $datakerusakan->genteng) }}"
                        alt="Foto Lama Atap"
                        class="img-thumbnail"
                        style="max-height: 200px; display:block; margin:auto;">
                @else
                    <img
                        src="{{ asset($datakerusakan->genteng) }}"
                        alt="Foto Lama Atap"
                        class="img-thumbnail"
                        style="max-height: 200px; display:block; margin:auto;">
                @endif
            </div>
        @endif

        {{-- Foto Baru --}}
        <div class="mt-3 text-center">
            <p class="fw-bold text-muted mb-1">Foto Faktual Baru</p>
            <img
                id="preview-genteng"
                src="#"
                alt="Preview Atap"
                class="img-thumbnail"
                style="max-height: 200px; display:none; margin:auto;">
        </div>
    </div>
</div>

{{-- Script Preview --}}
<script>
function previewGenteng(event) {
    const imgPreview = document.getElementById('preview-genteng');
    const file = event.target.files[0];
    if (file) {
        imgPreview.style.display = "block";
        imgPreview.src = URL.createObjectURL(file);
        imgPreview.onload = () => {
            URL.revokeObjectURL(imgPreview.src);
        }
    }
}
</script>

                </div>

                <!-- ===================== BAGIAN 5 ===================== -->
                <div class="text-center">
                    <hr class="my-4 section-divider">
                    <h5 class="text-primary fw-bold mt-2 section-title">
                        <i class="bi bi-file-earmark-text-fill me-2"></i>
                        Bagian 4 - Lantai
                    </h5>
                    <hr class="my-4 section-divider">
                </div>

                <div class="row">

                    <div class="col-md-6">
    <div class="mb-3">
        <label class="form-label"><i class="bi bi-square text-primary me-1"></i> Lantai</label>
        <input type="text" name="lantai" class="form-control" value="{{ $datastruktur->lantai ?? old('lantai') }}">
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-exclamation-circle text-warning me-1"></i> Indikasi Kerusakan</label>
        <select name="indikasi_kerusakan5" class="form-select">
            <option value="">-- Pilih Indikasi --</option>
            <option value="Tidak Ada Indikasi Kerusakan" {{ ($datastruktur->indikasi_kerusakan5 ?? old('indikasi_kerusakan5')) == 'Tidak Ada Indikasi Kerusakan' ? 'selected' : '' }}>Tidak Ada Indikasi Kerusakan</option>
            <option value="Indikasi Kerusakan" {{ ($datastruktur->indikasi_kerusakan5 ?? old('indikasi_kerusakan5')) == 'Indikasi Kerusakan' ? 'selected' : '' }}>Indikasi Kerusakan</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-bar-chart text-primary me-1"></i> Tingkat Kerusakan</label>
        <select name="tingkat_kerusakan5" class="form-select">
            <option value="">-- Pilih Tingkat Kerusakan --</option>
            <option value="Ringan" {{ ($datastruktur->tingkat_kerusakan5 ?? old('tingkat_kerusakan5')) == 'Ringan' ? 'selected' : '' }}>Ringan</option>
            <option value="Sedang" {{ ($datastruktur->tingkat_kerusakan5 ?? old('tingkat_kerusakan5')) == 'Sedang' ? 'selected' : '' }}>Sedang</option>
            <option value="Berat" {{ ($datastruktur->tingkat_kerusakan5 ?? old('tingkat_kerusakan5')) == 'Berat' ? 'selected' : '' }}>Berat</option>
            <option value="Tidak Ada Kerusakan" {{ ($datastruktur->tingkat_kerusakan5 ?? old('tingkat_kerusakan5')) == 'Tidak Ada Kerusakan' ? 'selected' : '' }}>Tidak Ada Kerusakan</option>
        </select>
    </div>
</div>

                    <div class="col-md-6">
    <div class="mb-3">
        <label class="form-label">
            <i class="bi bi-house-gear text-danger me-1"></i> Foto Faktual Lantai | Max 15 MB
        </label>
        <input
            type="file"
            name="rangka_atap"
            accept="image/*"
            class="form-control @error('rangka_atap') is-invalid @enderror"
            onchange="previewRangkaAtap(event)">
        @error('rangka_atap')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- Foto Lama --}}
        @if(isset($datakerusakan->rangka_atap) && $datakerusakan->rangka_atap)
            <div class="mt-3 text-center">
                <p class="fw-bold text-muted mb-1">Foto Faktual Lama</p>
                @if(file_exists(public_path('storage/' . $datakerusakan->rangka_atap)))
                    <img
                        src="{{ asset('storage/' . $datakerusakan->rangka_atap) }}"
                        alt="Foto Lama Rangka Atap"
                        class="img-thumbnail"
                        style="max-height: 200px; display:block; margin:auto;">
                @else
                    <img
                        src="{{ asset($datakerusakan->rangka_atap) }}"
                        alt="Foto Lama Rangka Atap"
                        class="img-thumbnail"
                        style="max-height: 200px; display:block; margin:auto;">
                @endif
            </div>
        @endif

        {{-- Foto Baru --}}
        <div class="mt-3 text-center">
            <p class="fw-bold text-muted mb-1">Foto Faktual Baru</p>
            <img
                id="preview-rangka-atap"
                src="#"
                alt="Preview Rangka Atap"
                class="img-thumbnail"
                style="max-height: 200px; display:none; margin:auto;">
        </div>
    </div>
</div>

{{-- Script Preview --}}
<script>
function previewRangkaAtap(event) {
    const imgPreview = document.getElementById('preview-rangka-atap');
    const file = event.target.files[0];
    if (file) {
        imgPreview.style.display = "block";
        imgPreview.src = URL.createObjectURL(file);
        imgPreview.onload = () => {
            URL.revokeObjectURL(imgPreview.src);
        }
    }
}
</script>

                </div>

                <!-- ===================== BAGIAN 6 ===================== -->
                <div class="text-center">
                    <hr class="my-4 section-divider">
                    <h5 class="text-primary fw-bold mt-2 section-title">
                        <i class="bi bi-file-earmark-text-fill me-2"></i>
                        Bagian 5 - Dinding
                    </h5>
                    <hr class="my-4 section-divider">
                </div>

                <div class="row">

                   <div class="col-md-6">
    <div class="row">
        <div class="col-md-12 mb-3">
            <label class="form-label"><i class="bi bi-bricks text-primary me-1"></i> Dinding</label>
            <input type="text" name="dinding" class="form-control" value="{{ $datastruktur->dinding ?? old('dinding') }}">
        </div>

        <div class="col-md-12 mb-3">
            <label class="form-label"><i class="bi bi-exclamation-circle text-warning me-1"></i> Indikasi Kerusakan</label>
            <select name="indikasi_kerusakan6" class="form-select">
                <option value="">-- Pilih Indikasi --</option>
                <option value="Tidak Ada Indikasi Kerusakan" {{ ($datastruktur->indikasi_kerusakan6 ?? old('indikasi_kerusakan6')) == 'Tidak Ada Indikasi Kerusakan' ? 'selected' : '' }}>Tidak Ada Indikasi Kerusakan</option>
                <option value="Indikasi Kerusakan" {{ ($datastruktur->indikasi_kerusakan6 ?? old('indikasi_kerusakan6')) == 'Indikasi Kerusakan' ? 'selected' : '' }}>Indikasi Kerusakan</option>
            </select>
        </div>

        <div class="col-md-12 mb-3">
            <label class="form-label"><i class="bi bi-bar-chart text-primary me-1"></i> Tingkat Kerusakan</label>
            <select name="tingkat_kerusakan6" class="form-select">
                <option value="">-- Pilih Tingkat Kerusakan --</option>
                <option value="Ringan" {{ ($datastruktur->tingkat_kerusakan6 ?? old('tingkat_kerusakan6')) == 'Ringan' ? 'selected' : '' }}>Ringan</option>
                <option value="Sedang" {{ ($datastruktur->tingkat_kerusakan6 ?? old('tingkat_kerusakan6')) == 'Sedang' ? 'selected' : '' }}>Sedang</option>
                <option value="Berat" {{ ($datastruktur->tingkat_kerusakan6 ?? old('tingkat_kerusakan6')) == 'Berat' ? 'selected' : '' }}>Berat</option>
                <option value="Tidak Ada Kerusakan" {{ ($datastruktur->tingkat_kerusakan6 ?? old('tingkat_kerusakan6')) == 'Tidak Ada Kerusakan' ? 'selected' : '' }}>Tidak Ada Kerusakan</option>
            </select>
        </div>
    </div>
</div>

                    <div class="col-md-6">
    <div class="mb-3">
        <label class="form-label">
            <i class="bi bi-image text-secondary me-1"></i> Foto Faktual Dinding | Max 15 MB
        </label>
        <input
            type="file"
            name="pintu"
            accept="image/*"
            class="form-control @error('pintu') is-invalid @enderror"
            onchange="previewCadangan1(event)">
        @error('pintu')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- Foto Lama --}}
        @if(isset($datakerusakan->pintu) && $datakerusakan->pintu)
            <div class="mt-3 text-center">
                <p class="fw-bold text-muted mb-1">Foto Faktual Lama</p>
                @if(file_exists(public_path('storage/' . $datakerusakan->pintu)))
                    <img
                        src="{{ asset('storage/' . $datakerusakan->pintu) }}"
                        alt="Foto Lama Dinding"
                        class="img-thumbnail"
                        style="max-height: 200px; display:block; margin:auto;">
                @else
                    <img
                        src="{{ asset($datakerusakan->pintu) }}"
                        alt="Foto Lama Dinding"
                        class="img-thumbnail"
                        style="max-height: 200px; display:block; margin:auto;">
                @endif
            </div>
        @endif

        {{-- Foto Baru --}}
        <div class="mt-3 text-center">
            <p class="fw-bold text-muted mb-1">Foto Faktual Baru</p>
            <img
                id="preview-cadangan1"
                src="#"
                alt="Preview Dinding"
                class="img-thumbnail"
                style="max-height: 200px; display:none; margin:auto;">
        </div>
    </div>
</div>

{{-- Script Preview --}}
<script>
function previewCadangan1(event) {
    const imgPreview = document.getElementById('preview-cadangan1');
    const file = event.target.files[0];
    if (file) {
        imgPreview.style.display = "block";
        imgPreview.src = URL.createObjectURL(file);
        imgPreview.onload = () => {
            URL.revokeObjectURL(imgPreview.src);
        }
    }
}
</script>

                </div>

                <!-- ===================== BAGIAN 7 ===================== -->
                <div class="text-center">
                    <hr class="my-4 section-divider">
                    <h5 class="text-primary fw-bold mt-2 section-title">
                        <i class="bi bi-file-earmark-text-fill me-2"></i>
                        Bagian 6 - Plafond
                    </h5>
                    <hr class="my-4 section-divider">
                </div>

                <div class="row">
<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label"><i class="bi bi-window-dock text-primary me-1"></i> Plafond</label>
        <input type="text" name="plafond" class="form-control" value="{{ $datastruktur->plafond ?? old('plafond') }}">
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-exclamation-circle text-warning me-1"></i> Indikasi Kerusakan</label>
        <select name="indikasi_kerusakan7" class="form-select">
            <option value="">-- Pilih Indikasi --</option>
            <option value="Tidak Ada Indikasi Kerusakan" {{ ($datastruktur->indikasi_kerusakan7 ?? old('indikasi_kerusakan7')) == 'Tidak Ada Indikasi Kerusakan' ? 'selected' : '' }}>Tidak Ada Indikasi Kerusakan</option>
            <option value="Indikasi Kerusakan" {{ ($datastruktur->indikasi_kerusakan7 ?? old('indikasi_kerusakan7')) == 'Indikasi Kerusakan' ? 'selected' : '' }}>Indikasi Kerusakan</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-bar-chart text-primary me-1"></i> Tingkat Kerusakan</label>
        <select name="tingkat_kerusakan7" class="form-select">
            <option value="">-- Pilih Tingkat Kerusakan --</option>
            <option value="Ringan" {{ ($datastruktur->tingkat_kerusakan7 ?? old('tingkat_kerusakan7')) == 'Ringan' ? 'selected' : '' }}>Ringan</option>
            <option value="Sedang" {{ ($datastruktur->tingkat_kerusakan7 ?? old('tingkat_kerusakan7')) == 'Sedang' ? 'selected' : '' }}>Sedang</option>
            <option value="Berat" {{ ($datastruktur->tingkat_kerusakan7 ?? old('tingkat_kerusakan7')) == 'Berat' ? 'selected' : '' }}>Berat</option>
            <option value="Tidak Ada Kerusakan" {{ ($datastruktur->tingkat_kerusakan7 ?? old('tingkat_kerusakan7')) == 'Tidak Ada Kerusakan' ? 'selected' : '' }}>Tidak Ada Kerusakan</option>
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label">
            <i class="bi bi-image text-success me-1"></i> Foto Faktual Plafond | Max 15 MB
        </label>
        <input
            type="file"
            name="jendela"
            accept="image/*"
            class="form-control @error('jendela') is-invalid @enderror"
            onchange="previewCadangan2(event)">
        @error('jendela')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- Foto Lama --}}
        @if(isset($datakerusakan->jendela) && $datakerusakan->jendela)
            <div class="mt-3 text-center">
                <p class="fw-bold text-muted mb-1">Foto Faktual Lama</p>
                @if(file_exists(public_path('storage/' . $datakerusakan->jendela)))
                    <img
                        src="{{ asset('storage/' . $datakerusakan->jendela) }}"
                        alt="Foto Lama Plafond"
                        class="img-thumbnail"
                        style="max-height: 200px; display:block; margin:auto;">
                @else
                    <img
                        src="{{ asset($datakerusakan->jendela) }}"
                        alt="Foto Lama Plafond"
                        class="img-thumbnail"
                        style="max-height: 200px; display:block; margin:auto;">
                @endif
            </div>
        @endif

        {{-- Foto Baru --}}
        <div class="mt-3 text-center">
            <p class="fw-bold text-muted mb-1">Foto Faktual Baru</p>
            <img
                id="preview-cadangan2"
                src="#"
                alt="Preview Plafond"
                class="img-thumbnail"
                style="max-height: 200px; display:none; margin:auto;">
        </div>
    </div>
</div>

{{-- Script Preview --}}
<script>
function previewCadangan2(event) {
    const imgPreview = document.getElementById('preview-cadangan2');
    const file = event.target.files[0];
    if (file) {
        imgPreview.style.display = "block";
        imgPreview.src = URL.createObjectURL(file);
        imgPreview.onload = () => {
            URL.revokeObjectURL(imgPreview.src);
        }
    }
}
</script>
                </div>

                <!-- ===================== BAGIAN 8 ===================== -->
                <div class="text-center">
                    <hr class="my-4 section-divider">
                    <h5 class="text-primary fw-bold mt-2 section-title">
                        <i class="bi bi-file-earmark-text-fill me-2"></i>
                        Bagian 7 - Utilitas
                    </h5>
                    <hr class="my-4 section-divider">
                </div>

                <div class="row">
                    <div class="col-md-6">
    <div class="mb-3">
        <label class="form-label"><i class="bi bi-tools text-primary me-1"></i> Utilitas</label>
        <input type="text" name="utilitas" class="form-control" value="{{ $datastruktur->utilitas ?? old('utilitas') }}">
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-exclamation-circle text-warning me-1"></i> Indikasi Kerusakan</label>
        <select name="indikasi_kerusakan8" class="form-select">
            <option value="">-- Pilih Indikasi --</option>
            <option value="Tidak Ada Indikasi Kerusakan" {{ ($datastruktur->indikasi_kerusakan8 ?? old('indikasi_kerusakan8')) == 'Tidak Ada Indikasi Kerusakan' ? 'selected' : '' }}>Tidak Ada Indikasi Kerusakan</option>
            <option value="Indikasi Kerusakan" {{ ($datastruktur->indikasi_kerusakan8 ?? old('indikasi_kerusakan8')) == 'Indikasi Kerusakan' ? 'selected' : '' }}>Indikasi Kerusakan</option>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-bar-chart text-primary me-1"></i> Tingkat Kerusakan</label>
        <select name="tingkat_kerusakan8" class="form-select">
            <option value="">-- Pilih Tingkat Kerusakan --</option>
            <option value="Ringan" {{ ($datastruktur->tingkat_kerusakan8 ?? old('tingkat_kerusakan8')) == 'Ringan' ? 'selected' : '' }}>Ringan</option>
            <option value="Sedang" {{ ($datastruktur->tingkat_kerusakan8 ?? old('tingkat_kerusakan8')) == 'Sedang' ? 'selected' : '' }}>Sedang</option>
            <option value="Berat" {{ ($datastruktur->tingkat_kerusakan8 ?? old('tingkat_kerusakan8')) == 'Berat' ? 'selected' : '' }}>Berat</option>
            <option value="Tidak Ada Kerusakan" {{ ($datastruktur->tingkat_kerusakan8 ?? old('tingkat_kerusakan8')) == 'Tidak Ada Kerusakan' ? 'selected' : '' }}>Tidak Ada Kerusakan</option>
        </select>
    </div>
</div>

<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label">
            <i class="bi bi-diagram-3 text-info me-1"></i> Foto Faktual Utilitas | Max 15 MB
        </label>
        <input
            type="file"
            name="balok"
            accept="image/*"
            class="form-control @error('balok') is-invalid @enderror"
            onchange="previewBalok(event)">
        @error('balok')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- Foto Lama --}}
        @if(isset($datakerusakan->balok) && $datakerusakan->balok)
            <div class="mt-3 text-center">
                <p class="fw-bold text-muted mb-1">Foto Faktual Lama</p>
                @if(file_exists(public_path('storage/' . $datakerusakan->balok)))
                    <img
                        src="{{ asset('storage/' . $datakerusakan->balok) }}"
                        alt="Foto Lama Balok"
                        class="img-thumbnail"
                        style="max-height: 200px; display:block; margin:auto;">
                @else
                    <img
                        src="{{ asset($datakerusakan->balok) }}"
                        alt="Foto Lama Balok"
                        class="img-thumbnail"
                        style="max-height: 200px; display:block; margin:auto;">
                @endif
            </div>
        @endif

        {{-- Foto Baru --}}
        <div class="mt-3 text-center">
            <p class="fw-bold text-muted mb-1">Foto Faktual Baru</p>
            <img
                id="preview-balok"
                src="#"
                alt="Preview Balok"
                class="img-thumbnail"
                style="max-height: 200px; display:none; margin:auto;">
        </div>
    </div>
</div>

{{-- Script Preview --}}
<script>
function previewBalok(event) {
    const imgPreview = document.getElementById('preview-balok');
    const file = event.target.files[0];
    if (file) {
        imgPreview.style.display = "block";
        imgPreview.src = URL.createObjectURL(file);
        imgPreview.onload = () => {
            URL.revokeObjectURL(imgPreview.src);
        }
    }
}
</script>

                </div>

                <!-- ===================== BAGIAN 9 ===================== -->
                <div class="text-center">
                    <hr class="my-4 section-divider">
                    <h5 class="text-primary fw-bold mt-2 section-title">
                        <i class="bi bi-file-earmark-text-fill me-2"></i>
                        Bagian 8 - Finishing
                    </h5>
                    <hr class="my-4 section-divider">
                </div>

                <div class="row">
                    <div class="col-md-6">
    <div class="mb-3">
        <label class="form-label"><i class="bi bi-paint-bucket text-primary me-1"></i> Finishing </label>
        <input type="text" name="finishing" class="form-control" value="{{ $datastruktur->finishing ?? old('finishing') }}">
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-exclamation-circle text-warning me-1"></i> Indikasi Kerusakan</label>
        <select name="indikasi_kerusakan1" class="form-select @error('indikasi_kerusakan1') is-invalid @enderror">
            <option value="">-- Pilih Indikasi --</option>
            <option value="Tidak Ada Indikasi Kerusakan" {{ ($datastruktur->indikasi_kerusakan1 ?? old('indikasi_kerusakan1')) == 'Tidak Ada Indikasi Kerusakan' ? 'selected' : '' }}>Tidak Ada Indikasi Kerusakan</option>
            <option value="Indikasi Kerusakan" {{ ($datastruktur->indikasi_kerusakan1 ?? old('indikasi_kerusakan1')) == 'Indikasi Kerusakan' ? 'selected' : '' }}>Indikasi Kerusakan</option>
        </select>
        @error('indikasi_kerusakan1')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    <div class="mb-3">
        <label class="form-label"><i class="bi bi-bar-chart text-primary me-1"></i> Tingkat Kerusakan</label>
        <select name="tingkat_kerusakan1" class="form-select @error('tingkat_kerusakan1') is-invalid @enderror">
            <option value="">-- Pilih Tingkat Kerusakan --</option>
            <option value="Ringan" {{ ($datastruktur->tingkat_kerusakan1 ?? old('tingkat_kerusakan1')) == 'Ringan' ? 'selected' : '' }}>Ringan</option>
            <option value="Sedang" {{ ($datastruktur->tingkat_kerusakan1 ?? old('tingkat_kerusakan1')) == 'Sedang' ? 'selected' : '' }}>Sedang</option>
            <option value="Berat" {{ ($datastruktur->tingkat_kerusakan1 ?? old('tingkat_kerusakan1')) == 'Berat' ? 'selected' : '' }}>Berat</option>
            <option value="Tidak Ada Kerusakan" {{ ($datastruktur->tingkat_kerusakan1 ?? old('tingkat_kerusakan1')) == 'Tidak Ada Kerusakan' ? 'selected' : '' }}>Tidak Ada Kerusakan</option>
        </select>
        @error('tingkat_kerusakan1')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>
</div>

<div class="col-md-6">
    <div class="mb-3">
        <label class="form-label">
            <i class="bi bi-columns-gap text-warning me-1"></i> Foto Faktual Finishing | Max 15 MB
        </label>
        <input
            type="file"
            name="kolom"
            accept="image/*"
            class="form-control @error('kolom') is-invalid @enderror"
            onchange="previewKolom(event)">
        @error('kolom')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror

        {{-- Foto Lama --}}
        @if(isset($datakerusakan->kolom) && $datakerusakan->kolom)
            <div class="mt-3 text-center">
                <p class="fw-bold text-muted mb-1">Foto Faktual Lama</p>
                @if(file_exists(public_path('storage/' . $datakerusakan->kolom)))
                    <img
                        src="{{ asset('storage/' . $datakerusakan->kolom) }}"
                        alt="Foto Lama Kolom"
                        class="img-thumbnail"
                        style="max-height: 200px; display:block; margin:auto;">
                @else
                    <img
                        src="{{ asset($datakerusakan->kolom) }}"
                        alt="Foto Lama Kolom"
                        class="img-thumbnail"
                        style="max-height: 200px; display:block; margin:auto;">
                @endif
            </div>
        @endif

        {{-- Foto Baru --}}
        <div class="mt-3 text-center">
            <p class="fw-bold text-muted mb-1">Foto Faktual Baru</p>
            <img
                id="preview-kolom"
                src="#"
                alt="Preview Kolom"
                class="img-thumbnail"
                style="max-height: 200px; display:none; margin:auto;">
        </div>
    </div>
</div>

{{-- Script Preview --}}
<script>
function previewKolom(event) {
    const imgPreview = document.getElementById('preview-kolom');
    const file = event.target.files[0];
    if (file) {
        imgPreview.style.display = "block";
        imgPreview.src = URL.createObjectURL(file);
        imgPreview.onload = () => {
            URL.revokeObjectURL(imgPreview.src);
        }
    }
}
</script>

                </div>

                <!-- ===================== TOTAL NILAI KERUSAKAN ===================== -->
                <div class="text-center">
                    <hr class="my-4 section-divider">
                    <h5 class="text-primary fw-bold mt-2 section-title">
                        <i class="bi bi-file-earmark-text-fill me-2"></i>
                        Total Nilai Kerusakan Bangunan Gedung
                    </h5>
                    <hr class="my-4 section-divider">
                </div>

                <div class="col-12 mt-4">
                    <h6 class="fw-bold text-primary"><i class="bi bi-brush me-1"></i> Total Nilai Kerusakan</h6>
                </div>

                <div class="col-md-4">
                    <label class="form-label"><i class="bi bi-123 text-primary me-1"></i> Total Nilai Kerusakan</label>
                    <input type="number" step="0.01" name="total_nilai_kerusakan" class="form-control" value="{{ $datastruktur->total_nilai_kerusakan ?? old('total_nilai_kerusakan') }}">
                </div>

                <!-- Tombol Submit -->
                <div class="col-12 text-end mt-3">
                    <button type="button" class="button-berkas" onclick="openModal()">
                        <i class="bi bi-save me-1"></i> Perbaikan Data ?
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Modal Konfirmasi -->
    <div id="confirmModal" style="display: none; position: fixed; inset: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
        <div style="background: white; padding: 24px 30px; border-radius: 12px; max-width: 400px; width: 90%; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
            <p style="font-size: 16px; font-weight: 600; margin-bottom: 20px;">Apakah Anda ingin menyimpan data ini?</p>
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
        // Fungsi untuk preview gambar
        function previewStrukturBawah(event) {
            const preview = document.getElementById('preview-struktur-bawah');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.style.display = 'block';
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
                preview.src = '#';
            }
        }

        function previewStrukturAtas(event) {
            const preview = document.getElementById('preview-struktur-atas');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.style.display = 'block';
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
                preview.src = '#';
            }
        }

        function previewStrukturAtap(event) {
            const preview = document.getElementById('preview-struktur-atap');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.style.display = 'block';
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
                preview.src = '#';
            }
        }

        function previewRangkaAtap(event) {
            const preview = document.getElementById('preview-rangka-atap');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.style.display = 'block';
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
                preview.src = '#';
            }
        }

        function previewCadangan1(event) {
            const preview = document.getElementById('preview-cadangan1');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.style.display = 'block';
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
                preview.src = '#';
            }
        }

        function previewCadangan2(event) {
            const preview = document.getElementById('preview-cadangan2');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.style.display = 'block';
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
                preview.src = '#';
            }
        }

        function previewBalok(event) {
            const preview = document.getElementById('preview-balok');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.style.display = 'block';
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
                preview.src = '#';
            }
        }

        function previewKolom(event) {
            const preview = document.getElementById('preview-kolom');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.style.display = 'block';
                    preview.src = e.target.result;
                };
                reader.readAsDataURL(file);
            } else {
                preview.style.display = 'none';
                preview.src = '#';
            }
        }

        // Fungsi untuk modal konfirmasi
        function openModal() {
            document.getElementById("confirmModal").style.display = "flex";
        }

        function closeModal() {
            document.getElementById("confirmModal").style.display = "none";
        }

        function submitForm() {
            document.getElementById('formPemilik').submit();
        }
    </script>



{{-- ----------- --}}


{{-- Modal Konfirmasi --}}
<div id="confirmModal" style="display: none; position: fixed; inset: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px 30px; border-radius: 12px; max-width: 400px; width: 90%; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
        <p style="font-size: 16px; font-weight: 600; margin-bottom: 20px;">Apakah Anda ingin melakukan perbaikan data ?</p>
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
