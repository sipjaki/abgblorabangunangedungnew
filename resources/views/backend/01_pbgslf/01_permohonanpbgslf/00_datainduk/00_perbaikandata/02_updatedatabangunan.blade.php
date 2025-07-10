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
           @include('backend.01_pbgslf.00_fiturtambahannav')


<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white d-flex align-items-center gap-2">
        <i class="bi bi-info-circle fs-5"></i>
        <h5 class="mb-0" style="font-size: 16px;">Informasi Permohonan SIMBG</h5>
    </div>
</div>

@include('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.00_fiturstatus')

       <!-- Left Column (6/12) -->
<div class="row g-4">

    @php
        $infoItems = [
            [
                'icon' => 'bi-file-earmark-text-fill',
                'title' => 'Nomor Registrasi SIM BG',
                'value' => $data->noregissimbg ?? '-',
            ],
            [
                'icon' => 'bi-calendar-date-fill',
                'title' => 'Tanggal Permohonan',
                'value' => \Carbon\Carbon::parse($data->tanggalpermohonan)->translatedFormat('d F Y') ?? '-',
            ],
            [
                'icon' => 'bi-ui-checks-grid',
                'title' => 'Jenis Permohonan',
                'value' => $data->jenispengajuanpbgslfper->jenispengajuan ?? '-',
            ],
            [
                'icon' => 'bi-person-fill-check',
                'title' => 'Pengisi Form',
                'value' => $user->name ?? '-',
            ],
        ];
    @endphp

    @foreach ($infoItems as $item)
        <div class="col-md-6">
            <div class="card shadow-sm border-0 animate__animated animate__fadeInUp">
                <div class="card-body bg-white rounded-3" style="background: linear-gradient(to bottom, #f8faff, #e6f0ff);">
                    <div class="d-flex align-items-start">
                        <div class="me-3">
                            <i class="bi {{ $item['icon'] }} text-primary fs-3"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">{{ $item['title'] }}</h6>
                            <p class="mb-0 text-muted">{{ $item['value'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

</div>

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

@include('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.00_fiturnavigas')

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
    Informasi Data Bangunan Gedung
</h5>
</h5>
    <hr class="my-4" style="border-top: 2px dashed #0d6efd; width: 60%; margin: auto;">
</div>
<form id="formPemilik" action="{{ route('updatedatabangunannew', $data->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="pbgslfbangunan_id" value="{{ $data->pbgslfbangunan_id }}">
    <input type="hidden" name="id" value="{{ $data->id }}">

    <div class="row g-3 mt-2">
        {{-- Jenis Permohonan Konsultasi --}}
        <div class="col-md-6">
            <label class="form-label">
                <i class="bi bi-diagram-3-fill me-1 text-primary"></i> Jenis Permohonan Konsultasi
            </label>
            <select name="jenisperkonsultasi_id" class="form-select @error('jenisperkonsultasi_id') is-invalid @enderror">
                <option value="">-- Pilih Jenis --</option>
                @foreach ($datajenisperkons as $item)
                    <option value="{{ $item->id }}" {{ old('jenisperkonsultasi_id', $data->jenisperkonsultasi_id) == $item->id ? 'selected' : '' }}>
                        {{ $item->jenis }}
                    </option>
                @endforeach
            </select>
            @error('jenisperkonsultasi_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Nama Bangunan Gedung --}}
        <div class="col-md-6">
            <label class="form-label"><i class="bi bi-house-fill text-primary me-1"></i> Nama Bangunan Gedung</label>
            <input type="text" name="namabangunan" class="form-control @error('namabangunan') is-invalid @enderror" value="{{ old('namabangunan', $data->namabangunan) }}">
            @error('namabangunan')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Lokasi Bangunan --}}
        <div class="col-md-6">
            <label class="form-label"><i class="bi bi-geo-alt-fill text-primary me-1"></i> Lokasi Bangunan</label>
            <input type="text" name="lokasibangunan" class="form-control @error('lokasibangunan') is-invalid @enderror" value="{{ old('lokasibangunan', $data->lokasibangunan) }}">
            @error('lokasibangunan')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Klasifikasi Bangunan --}}
        <div class="col-md-6">
            <label class="form-label">
                <i class="bi bi-tags-fill text-primary me-1"></i> Klasifikasi Bangunan
            </label>
            <select name="klasifikasibangunan" class="form-select @error('klasifikasibangunan') is-invalid @enderror">
                <option value="">-- Pilih Klasifikasi --</option>
                <option value="Sederhana" {{ old('klasifikasibangunan', $data->klasifikasibangunan) == 'Sederhana' ? 'selected' : '' }}>Sederhana</option>
                <option value="Tidak Sederhana" {{ old('klasifikasibangunan', $data->klasifikasibangunan) == 'Tidak Sederhana' ? 'selected' : '' }}>Tidak Sederhana</option>
            </select>
            @error('klasifikasibangunan')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Fungsi Bangunan (PBG) --}}
        <div class="col-md-6">
            <label class="form-label">
                <i class="bi bi-building text-primary me-1"></i> Fungsi Bangunan (PBG)
            </label>
            <select name="fungsibangunanpbg_id" class="form-select @error('fungsibangunanpbg_id') is-invalid @enderror">
                <option value="">-- Pilih Fungsi --</option>
                @foreach ($datafungsibgpbg as $item)
                    <option value="{{ $item->id }}" {{ old('fungsibangunanpbg_id', $data->fungsibangunanpbg_id) == $item->id ? 'selected' : '' }}>
                        {{ $item->fungsi }}
                    </option>
                @endforeach
            </select>
            @error('fungsibangunanpbg_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Luas Bangunan (m²) --}}
        <div class="col-md-6">
            <label class="form-label"><i class="bi bi-aspect-ratio text-primary me-1"></i> Luas Bangunan (m²)</label>
            <input type="text" name="luasbangunan" class="form-control @error('luasbangunan') is-invalid @enderror" value="{{ old('luasbangunan', $data->luasbangunan) }}">
            @error('luasbangunan')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        <h5 class="mb-3 mt-3" style="color: navy; font-weight: bold; font-size: 16px;">
            <i class="bi bi-building-check me-2" style="color: navy;"></i> Kesesuaian Data Bangunan Gedung
        </h5>

        {{-- Jenis Permohonan --}}
        <div class="col-md-6 mb-3">
            <label class="form-label d-block" style="color: black; font-weight: 600;">
                <i class="bi bi-pencil-square me-1" style="color: blue;"></i> Jenis Permohonan
            </label>

            <label class="custom-radio">
                <input type="radio" name="jenispermohonan" value="Lengkap" {{ old('jenispermohonan', $data->jenispermohonan) == 'Lengkap' ? 'checked' : '' }}>
                <span class="custom-box"></span> Lengkap
            </label>

            <label class="custom-radio">
                <input type="radio" name="jenispermohonan" value="Tidak Lengkap" {{ old('jenispermohonan', $data->jenispermohonan) == 'Tidak Lengkap' ? 'checked' : '' }}>
                <span class="custom-box"></span> Tidak Lengkap
            </label>

            @error('jenispermohonan')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>

        {{-- Fungsi Bangunan --}}
        <div class="col-md-6 mb-3">
            <label class="form-label d-block" style="color: navy; font-weight: 600;">
                <i class="bi bi-layers-fill me-1" style="color: blue;"></i> Fungsi Bangunan
            </label>

            <label class="custom-radio">
                <input type="radio" name="fungsibangunan" value="Lengkap" {{ old('fungsibangunan', $data->fungsibangunan) == 'Lengkap' ? 'checked' : '' }}>
                <span class="custom-box"></span> Lengkap
            </label>

            <label class="custom-radio">
                <input type="radio" name="fungsibangunan" value="Tidak Lengkap" {{ old('fungsibangunan', $data->fungsibangunan) == 'Tidak Lengkap' ? 'checked' : '' }}>
                <span class="custom-box"></span> Tidak Lengkap
            </label>

            @error('fungsibangunan')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>

        {{-- Tinggi Bangunan (meter) --}}
        <div class="col-md-6">
            <label class="form-label"><i class="bi bi-arrow-up-short text-primary me-1"></i> Tinggi Bangunan (meter)</label>
            <input type="text" name="tinggibangunan" class="form-control @error('tinggibangunan') is-invalid @enderror" value="{{ old('tinggibangunan', $data->tinggibangunan) }}">
            @error('tinggibangunan')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Jumlah Lantai --}}
        <div class="col-md-6">
            <label class="form-label">
                <i class="bi bi-stack text-primary me-1"></i> Jumlah Lantai
            </label>
            <select name="jumlahlantai" class="form-select @error('jumlahlantai') is-invalid @enderror">
                <option value="">-- Pilih Jumlah Lantai --</option>
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" {{ old('jumlahlantai', $data->jumlahlantai) == $i ? 'selected' : '' }}>
                        {{ $i }} Lantai
                    </option>
                @endfor
            </select>
            @error('jumlahlantai')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Kelengkapan Data Intensitas Bangunan --}}
        <div class="col-md-6 mb-3">
            <label class="form-label d-block" style="color: black; font-weight: 600;">
                <i class="bi bi-box-seam me-1" style="color: blue;"></i>Kelengkapan Data Intensitas Bangunan
            </label>

            <label class="custom-radio">
                <input type="radio" name="internsitasbangunan" value="Ada" {{ old('internsitasbangunan', $data->internsitasbangunan) == 'Ada' ? 'checked' : '' }}>
                <span class="custom-box"></span> Ada
            </label>

            <label class="custom-radio">
                <input type="radio" name="internsitasbangunan" value="Tidak Ada" {{ old('internsitasbangunan', $data->internsitasbangunan) == 'Tidak Ada' ? 'checked' : '' }}>
                <span class="custom-box"></span> Tidak Ada
            </label>

            @error('internsitasbangunan')<div class="text-danger mt-2">{{ $message }}</div>@enderror
        </div>

        <h5 class="mb-3 mt-3" style="color: navy; font-weight: bold; font-size: 16px;">
            <i class="bi bi-building-up me-2" style="color: navy;"></i> Intensitas Bangunan Gedung
        </h5>

        {{-- Nomor PKKPR --}}
        <div class="col-md-6 mb-3">
            <label class="form-label"><i class="bi bi-hash text-primary me-1"></i> Nomor PKKPR</label>
            <input type="text" name="nomorpkkpr" class="form-control @error('nomorpkkpr') is-invalid @enderror" value="{{ old('nomorpkkpr', $data->nomorpkkpr) }}">
            @error('nomorpkkpr')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- GSB (Garis Sempadan Bangunan) --}}
        <div class="col-md-6 mb-3">
            <label class="form-label">
                <i class="bi bi-aspect-ratio text-primary me-1"></i> GSB (Garis Sempadan Bangunan)
            </label>
            <div class="input-group">
                <input type="number" step="0.01" id="gsb_value" class="form-control" placeholder="Masukkan nilai" value="{{ old('gsb') ? explode(' ', old('gsb'))[0] : (explode(' ', $data->gsb)[0] ?? '') }}">
                <select id="gsb_unit" class="form-select">
                    <option value="%" {{ (old('gsb') ? explode(' ', old('gsb'))[1] : (explode(' ', $data->gsb)[1] ?? '')) == '%' ? 'selected' : '' }}>Persen (%)</option>
                    <option value="Rasio" {{ (old('gsb') ? explode(' ', old('gsb'))[1] : (explode(' ', $data->gsb)[1] ?? '')) == 'Rasio' ? 'selected' : '' }}>Rasio</option>
                    <option value="Lantai" {{ (old('gsb') ? explode(' ', old('gsb'))[1] : (explode(' ', $data->gsb)[1] ?? '')) == 'Lantai' ? 'selected' : '' }}>Lantai</option>
                    <option value="Meter" {{ (old('gsb') ? explode(' ', old('gsb'))[1] : (explode(' ', $data->gsb)[1] ?? '')) == 'Meter' ? 'selected' : '' }}>Meter</option>
                </select>
            </div>
            <input type="hidden" name="gsb" id="gsb" value="{{ old('gsb', $data->gsb) }}">
            @error('gsb')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- KDB (Koefisien Dasar Bangunan) --}}
        <div class="col-md-6 mb-3">
            <label class="form-label">
                <i class="bi bi-box text-primary me-1"></i> KDB (Koefisien Dasar Bangunan)
            </label>
            <div class="input-group">
                <input type="number" step="0.01" id="kdb_value" class="form-control" placeholder="Masukkan nilai" value="{{ old('kdb') ? explode(' ', old('kdb'))[0] : (explode(' ', $data->kdb)[0] ?? '') }}">
                <select id="kdb_unit" class="form-select">
                    <option value="%" {{ (old('kdb') ? explode(' ', old('kdb'))[1] : (explode(' ', $data->kdb)[1] ?? '')) == '%' ? 'selected' : '' }}>Persen (%)</option>
                    <option value="Rasio" {{ (old('kdb') ? explode(' ', old('kdb'))[1] : (explode(' ', $data->kdb)[1] ?? '')) == 'Rasio' ? 'selected' : '' }}>Rasio</option>
                    <option value="Lantai" {{ (old('kdb') ? explode(' ', old('kdb'))[1] : (explode(' ', $data->kdb)[1] ?? '')) == 'Lantai' ? 'selected' : '' }}>Lantai</option>
                    <option value="Meter" {{ (old('kdb') ? explode(' ', old('kdb'))[1] : (explode(' ', $data->kdb)[1] ?? '')) == 'Meter' ? 'selected' : '' }}>Meter</option>
                </select>
            </div>
            <input type="hidden" name="kdb" id="kdb" value="{{ old('kdb', $data->kdb) }}">
            @error('kdb')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- KLB (Koefisien Lantai Bangunan) --}}
        <div class="col-md-6 mb-3">
            <label class="form-label">
                <i class="bi bi-bar-chart-steps text-primary me-1"></i> KLB (Koefisien Lantai Bangunan)
            </label>
            <div class="input-group">
                <input type="number" step="0.01" id="klb_value" class="form-control" placeholder="Masukkan nilai" value="{{ old('klb') ? explode(' ', old('klb'))[0] : (explode(' ', $data->klb)[0] ?? '') }}">
                <select id="klb_unit" class="form-select">
                    <option value="%" {{ (old('klb') ? explode(' ', old('klb'))[1] : (explode(' ', $data->klb)[1] ?? '')) == '%' ? 'selected' : '' }}>Persen (%)</option>
                    <option value="Rasio" {{ (old('klb') ? explode(' ', old('klb'))[1] : (explode(' ', $data->klb)[1] ?? '')) == 'Rasio' ? 'selected' : '' }}>Rasio</option>
                    <option value="Lantai" {{ (old('klb') ? explode(' ', old('klb'))[1] : (explode(' ', $data->klb)[1] ?? '')) == 'Lantai' ? 'selected' : '' }}>Lantai</option>
                    <option value="Meter" {{ (old('klb') ? explode(' ', old('klb'))[1] : (explode(' ', $data->klb)[1] ?? '')) == 'Meter' ? 'selected' : '' }}>Meter</option>
                </select>
            </div>
            <input type="hidden" name="klb" id="klb" value="{{ old('klb', $data->klb) }}">
            @error('klb')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- KDH (Koefisien Daerah Hijau) --}}
        <div class="col-md-6 mb-3">
            <label class="form-label">
                <i class="bi bi-graph-up text-primary me-1"></i> KDH (Koefisien Daerah Hijau)
            </label>
            <div class="input-group">
                <input type="number" step="0.01" id="kdh_value" class="form-control" placeholder="Masukkan nilai" value="{{ old('kdh') ? explode(' ', old('kdh'))[0] : (explode(' ', $data->kdh)[0] ?? '') }}">
                <select id="kdh_unit" class="form-select">
                    <option value="%" {{ (old('kdh') ? explode(' ', old('kdh'))[1] : (explode(' ', $data->kdh)[1] ?? '')) == '%' ? 'selected' : '' }}>Persen (%)</option>
                    <option value="Rasio" {{ (old('kdh') ? explode(' ', old('kdh'))[1] : (explode(' ', $data->kdh)[1] ?? '')) == 'Rasio' ? 'selected' : '' }}>Rasio</option>
                    <option value="Lantai" {{ (old('kdh') ? explode(' ', old('kdh'))[1] : (explode(' ', $data->kdh)[1] ?? '')) == 'Lantai' ? 'selected' : '' }}>Lantai</option>
                    <option value="Meter" {{ (old('kdh') ? explode(' ', old('kdh'))[1] : (explode(' ', $data->kdh)[1] ?? '')) == 'Meter' ? 'selected' : '' }}>Meter</option>
                </select>
            </div>
            <input type="hidden" name="kdh" id="kdh" value="{{ old('kdh', $data->kdh) }}">
            @error('kdh')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

    </div>

    <div class="row g-3">
        {{-- Provinsi --}}
        <div class="col-md-4">
            <label class="form-label">
                <i class="bi bi-geo-alt-fill text-danger me-1"></i> Provinsi
            </label>
            <input type="text" name="provinsi" readonly class="form-control bg-light" value="{{ old('provinsi', $data->provinsi ?? 'Jawa Tengah') }}">
        </div>

        {{-- Kabupaten --}}
        <div class="col-md-4">
            <label class="form-label">
                <i class="bi bi-geo-alt text-danger me-1"></i> Kabupaten/Kota
            </label>
            <input type="text" name="kabupaten" readonly class="form-control bg-light" value="{{ old('kabupaten', $data->kabupaten ?? 'Kabupaten Blora') }}">
        </div>

        {{-- Kecamatan --}}
        <div class="col-md-4">
            <label class="form-label d-flex align-items-center" for="kecamatanblora_id">
                <i class="fas fa-map-pin me-1" style="color: navy;"></i> Kecamatan
            </label>
            <select name="kecamatanblora_id" id="kecamatanblora_id" class="form-control @error('kecamatanblora_id') is-invalid @enderror">
                <option value="">Pilih Kecamatan</option>
                @foreach($datakecamatan as $kecamatan)
                    <option value="{{ $kecamatan->id }}" {{ old('kecamatanblora_id', $data->kecamatanblora_id) == $kecamatan->id ? 'selected' : '' }}>
                        {{ $kecamatan->kecamatanblora }}
                    </option>
                @endforeach
            </select>
            @error('kecamatanblora_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Kelurahan/Desa --}}
        <div class="col-md-4">
            <label for="kelurahandesa_id" class="form-label d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="blue" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M12 11c1.657 0 3-1.343 3-3S13.657 5 12 5s-3 1.343-3 3 1.343 3 3 3z"/>
                    <path d="M12 22s8-4.5 8-11a8 8 0 10-16 0c0 6.5 8 11 8 11z"/>
                </svg>
                Kelurahan/Desa
            </label>
            <select id="kelurahandesa_id" name="kelurahandesa_id" class="form-control @error('kelurahandesa_id') is-invalid @enderror">
                <option value="">Pilih Kelurahan/Desa</option>
                {{-- Jika ingin load default kelurahan, bisa diisi di sini --}}
            </select>
            @error('kelurahandesa_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Alamat Lengkap --}}
        <div class="col-md-8">
            <label class="form-label">
                <i class="bi bi-geo text-primary me-1"></i> Alamat Lengkap
            </label>
            <input type="text" name="alamatlengkap" class="form-control @error('alamatlengkap') is-invalid @enderror" value="{{ old('alamatlengkap', $data->alamatlengkap) }}">
            @error('alamatlengkap')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>

        {{-- Koordinat --}}
        <div class="col-md-6">
            <label class="form-label">
                <i class="bi bi-crosshair text-success me-1"></i> Koordinat (Latitude, Longitude)
            </label>
            <input type="text" name="koordinat" class="form-control @error('koordinat') is-invalid @enderror" placeholder="-6.969xxx, 111.403xxx" value="{{ old('koordinat', $data->koordinat) }}">
            @error('koordinat')<div class="invalid-feedback">{{ $message }}</div>@enderror
        </div>
    </div>

    {{-- Pilihan Catatan --}}
    <div class="col-md-6 mt-3">
        <label class="form-label d-block" style="color: navy; font-weight: 600;">
            <i class="bi bi-check-circle-fill me-1" style="color: blue"></i> Pilihan Catatan
        </label>

        <label class="custom-radio">
            <input type="radio" name="pilihancatatan" value="lengkap" onchange="toggleCatatan(this)" {{ old('pilihancatatan', $data->pilihancatatan) === 'lengkap' ? 'checked' : '' }}>
            <span class="custom-box"></span> Sesuai
        </label>

        <label class="custom-radio">
            <input type="radio" name="pilihancatatan" value="tidak lengkap" onchange="toggleCatatan(this)" {{ old('pilihancatatan', $data->pilihancatatan) === 'tidak lengkap' ? 'checked' : '' }}>
            <span class="custom-box"></span> Tidak Sesuai
        </label>

        @error('pilihancatatan')<div class="text-danger mt-2">{{ $message }}</div>@enderror
    </div>

    {{-- Catatan --}}
    <div class="col-12 mt-2" id="catatan-field" style="display: {{ (old('pilihancatatan', $data->pilihancatatan) === 'tidak lengkap') ? 'block' : 'none' }};">
        <label class="form-label"><i class="bi bi-journal-text text-navy me-1" style="color: blue"></i> Catatan</label>
        <textarea name="catatan" class="form-control @error('catatan') is-invalid @enderror" rows="3" placeholder="Tuliskan catatan tambahan...">{{ old('catatan', $data->catatan) }}</textarea>
        @error('catatan')<div class="invalid-feedback">{{ $message }}</div>@enderror
    </div>

    {{-- Tombol Submit --}}
    <div class="col-12 text-end mt-3">
        <button type="submit" class="button-baru">
            <i class="bi bi-save me-1"></i> Simpan Perbaikan Data
        </button>
    </div>
</form>

<script>
    function updateCombinedValue(field) {
        const value = document.getElementById(`${field}_value`).value;
        const unit = document.getElementById(`${field}_unit`).value;
        document.getElementById(field).value = value ? `${value} ${unit}` : '';
    }

    ['gsb', 'kdb', 'klb', 'kdh'].forEach(field => {
        document.getElementById(`${field}_value`).addEventListener('input', () => updateCombinedValue(field));
        document.getElementById(`${field}_unit`).addEventListener('change', () => updateCombinedValue(field));
    });

    function toggleCatatan(radio) {
        const catatanField = document.getElementById('catatan-field');
        if (radio.value === 'tidak lengkap') {
            catatanField.style.display = 'block';
        } else {
            catatanField.style.display = 'none';
        }
    }

    // Panggil toggleCatatan saat halaman load untuk menyesuaikan tampilan textarea catatan
    document.addEventListener('DOMContentLoaded', () => {
        const selectedRadio = document.querySelector('input[name="pilihancatatan"]:checked');
        if (selectedRadio) {
            toggleCatatan(selectedRadio);
        }
    });

    // AJAX untuk load kelurahan/desa saat edit halaman (jika data kelurahandesa_id ada)
    $(document).ready(function() {
        var kecamatanID = $('#kecamatanblora_id').val();
        var selectedKelurahan = "{{ old('kelurahandesa_id', $data->kelurahandesa_id) }}";
        if(kecamatanID){
            $.ajax({
                url: '{{ route("getKelurahanByKecamatan") }}',
                type: 'GET',
                data: { kecamatan_id: kecamatanID },
                success: function(data){
                    $('#kelurahandesa_id').empty();
                    $('#kelurahandesa_id').append('<option value="">Pilih Kelurahan/Desa</option>');
                    $.each(data, function(key, value){
                        $('#kelurahandesa_id').append('<option value="'+value.id+'" '+(value.id == selectedKelurahan ? 'selected' : '')+'>'+value.kelurahandesa+'</option>');
                    });
                }
            });
        }
        $('#kecamatanblora_id').change(function(){
            var id = $(this).val();
            $('#kelurahandesa_id').empty();
            if(id){
                $.ajax({
                    url: '{{ route("getKelurahanByKecamatan") }}',
                    type: 'GET',
                    data: { kecamatan_id: id },
                    success: function(data){
                        $('#kelurahandesa_id').append('<option value="">Pilih Kelurahan/Desa</option>');
                        $.each(data, function(key, value){
                            $('#kelurahandesa_id').append('<option value="'+value.id+'">'+value.kelurahandesa+'</option>');
                        });
                    }
                });
            }
        });
    });
</script>

<style>
    .custom-radio {
        position: relative;
        padding-left: 25px;
        margin-right: 15px;
        cursor: pointer;
        font-weight: 500;
        user-select: none;
    }

    .custom-radio input[type="radio"] {
        position: absolute;
        opacity: 0;
        cursor: pointer;
    }

    .custom-box {
        position: absolute;
        top: 2px;
        left: 0;
        height: 18px;
        width: 18px;
        background-color: #e6e6e6;
        border-radius: 50%;
    }

    .custom-radio input[type="radio"]:checked ~ .custom-box {
        background-color: #4041DA;
    }

    .custom-box:after {
        content: "";
        position: absolute;
        display: none;
    }

    .custom-radio input[type="radio"]:checked ~ .custom-box:after {
        display: block;
    }

    .custom-radio .custom-box:after {
        top: 5px;
        left: 5px;
        width: 8px;
        height: 8px;
        border-radius: 50%;
        background: white;
    }
</style>

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
