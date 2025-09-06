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

     <div class="container-fluid" style="margin-bottom: 150px;">
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
                                    <div class="card shadow-sm border-0">

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

@php
    use Illuminate\Support\Str;
@endphp

<div class="row g-4">
    @forelse ($subdatapemilik as $pemilik)
    @php
        $bagianList = [
            [
                'title' => 'Struktur Bangunan Bawah & Atas',
                'items' => [
                    ['label' => 'Struktur Bangunan Bawah', 'field' => $pemilik->struktur_bangunan_bawah ?? '-', 'icon' => 'bi-house-door'],
                    ['label' => 'Struktur Bangunan Atas', 'field' => $pemilik->struktur_bangunan_atas ?? '-', 'icon' => 'bi-house'],
                    ['label' => 'Struktur Atap', 'field' => $pemilik->struktur_atap ?? '-', 'icon' => 'bi-house-add'],
                ],
            ],
            [
                'title' => 'Bagian 1 - Pondasi',
                'items' => [
                    ['label' => 'Pondasi', 'field' => $pemilik->pondasi ?? '-', 'icon' => 'bi-box'],
                    ['label' => 'Indikasi Kerusakan 1', 'field' => $pemilik->indikasi_kerusakan2 ?? '-', 'icon' => 'bi-exclamation-triangle'],
                    ['label' => 'Tingkat Kerusakan 1', 'field' => $pemilik->tingkat_kerusakan2 ?? '-', 'icon' => 'bi-activity'],
                    ['label' => 'Foto Faktual Pondasi', 'field' => $datastruktur->struktur_bawah ?? null, 'icon' => 'bi-image'],
                ],
            ],
            [
                'title' => 'Bagian 2 - Struktur',
                'items' => [
                    ['label' => 'Struktur', 'field' => $pemilik->struktur ?? '-', 'icon' => 'bi-diagram-3'],
                    ['label' => 'Indikasi Kerusakan 2', 'field' => $pemilik->indikasi_kerusakan3 ?? '-', 'icon' => 'bi-exclamation-triangle'],
                    ['label' => 'Tingkat Kerusakan 2', 'field' => $pemilik->tingkat_kerusakan3 ?? '-', 'icon' => 'bi-activity'],
                    ['label' => 'Foto Faktual Struktur', 'field' => $datastruktur->struktur_atas ?? null, 'icon' => 'bi-image'],
                ],
            ],
            [
                'title' => 'Bagian 3 - Atap',
                'items' => [
                    ['label' => 'Atap', 'field' => $pemilik->atap ?? '-', 'icon' => 'bi-cloud'],
                    ['label' => 'Indikasi Kerusakan 3', 'field' => $pemilik->indikasi_kerusakan4 ?? '-', 'icon' => 'bi-exclamation-triangle'],
                    ['label' => 'Tingkat Kerusakan 4', 'field' => $pemilik->tingkat_kerusakan4 ?? '-', 'icon' => 'bi-activity'],
                    ['label' => 'Foto Faktual Atap', 'field' => $datastruktur->genteng ?? null, 'icon' => 'bi-image'],
                ],
            ],
            [
                'title' => 'Bagian 4 - Lantai',
                'items' => [
                    ['label' => 'Lantai', 'field' => $pemilik->lantai ?? '-', 'icon' => 'bi-grid-1x2'],
                    ['label' => 'Indikasi Kerusakan 4', 'field' => $pemilik->indikasi_kerusakan5 ?? '-', 'icon' => 'bi-exclamation-triangle'],
                    ['label' => 'Tingkat Kerusakan 4', 'field' => $pemilik->tingkat_kerusakan5 ?? '-', 'icon' => 'bi-activity'],
                    ['label' => 'Foto Faktual Lantai', 'field' => $datastruktur->rangka_atap ?? null, 'icon' => 'bi-image'],
                ],
            ],
            [
                'title' => 'Bagian 5 - Dinding',
                'items' => [
                    ['label' => 'Dinding', 'field' => $pemilik->dinding ?? '-', 'icon' => 'bi-bricks'],
                    ['label' => 'Indikasi Kerusakan 5', 'field' => $pemilik->indikasi_kerusakan6 ?? '-', 'icon' => 'bi-exclamation-triangle'],
                    ['label' => 'Tingkat Kerusakan 6', 'field' => $pemilik->tingkat_kerusakan6 ?? '-', 'icon' => 'bi-activity'],
                    ['label' => 'Foto Faktual Dinding', 'field' => $datastruktur->pintu ?? null, 'icon' => 'bi-image'],
                ],
            ],
            [
                'title' => 'Bagian 6 - Plafon',
                'items' => [
                    ['label' => 'Plafon', 'field' => $pemilik->plafond ?? '-', 'icon' => 'bi-menu-button-wide'],
                    ['label' => 'Indikasi Kerusakan 6', 'field' => $pemilik->indikasi_kerusakan7 ?? '-', 'icon' => 'bi-exclamation-triangle'],
                    ['label' => 'Tingkat Kerusakan 6', 'field' => $pemilik->tingkat_kerusakan7 ?? '-', 'icon' => 'bi-activity'],
                    ['label' => 'Foto Faktual Plafon', 'field' => $datastruktur->jendela ?? null, 'icon' => 'bi-image'],
                ],
            ],
            [
                'title' => 'Bagian 7 - Utilitas',
                'items' => [
                    ['label' => 'Utilitas', 'field' => $pemilik->utilitas ?? '-', 'icon' => 'bi-lightning'],
                    ['label' => 'Indikasi Kerusakan 7', 'field' => $pemilik->indikasi_kerusakan8 ?? '-', 'icon' => 'bi-exclamation-triangle'],
                    ['label' => 'Tingkat Kerusakan 7', 'field' => $pemilik->tingkat_kerusakan8 ?? '-', 'icon' => 'bi-activity'],
                    ['label' => 'Foto Faktual Utilitas', 'field' => $datastruktur->balok ?? null, 'icon' => 'bi-image'],
                ],
            ],
            [
                'title' => 'Bagian 8 - Finishing',
                'items' => [
                    ['label' => 'Finishing', 'field' => $pemilik->finishing ?? '-', 'icon' => 'bi-palette'],
                    ['label' => 'Indikasi Kerusakan 8', 'field' => $pemilik->indikasi_kerusakan1 ?? '-', 'icon' => 'bi-exclamation-triangle'],
                    ['label' => 'Tingkat Kerusakan 8', 'field' => $pemilik->tingkat_kerusakan1 ?? '-', 'icon' => 'bi-activity'],
                    ['label' => 'Foto Faktual Finishing', 'field' => $datastruktur->kolom ?? null, 'icon' => 'bi-image'],
                ],
            ],
            [
                'title' => 'Total Nilai Kerusakan',
                'items' => [
                    ['label' => 'Total Nilai Kerusakan', 'field' => $pemilik->total_nilai_kerusakan ?? '-', 'icon' => 'bi-percent'],
                ],
            ],
        ];
    @endphp

<div class="col-12 mb-4 mt-5">
    <div class="card shadow-sm border-0 animate__animated animate__fadeInUp">
        <div class="card-header bg-primary text-white d-flex align-items-center">
            <i class="bi bi-building me-2 fs-5"></i>
            <h5 style="font-size: 16px;" class="mb-0">
                Informasi Struktur & Tingkat Kerusakan Bangunan Gedung
            </h5>
        </div>

        <div class="card-body bg-white rounded-3" style="background: linear-gradient(to bottom, #f8faff, #e6f0ff);">
            @foreach ($bagianList as $bagian)
                <div class="text-center">
                    <hr class="my-4" style="border-top: 2px dashed #0d6efd; width: 100%; margin: auto;">
                    <h5 style="color: #0d6efd; font-weight: bold; margin-top: 5px; font-size:16px;">
                        <i class="bi bi-upload" style="margin-right: 6px;"></i>
                        {{ $bagian['title_halaman'] }}
                    </h5>
                    <hr class="my-4" style="border-top: 2px dashed #0d6efd; width: 100%; margin: auto;">
                </div>

                <h6 class="fw-bold text-dark mt-3">{{ $bagian['title'] }}</h6>
                <div class="row g-3 mb-3">
                    @foreach ($bagian['items'] as $item)
                        <div class="col-md-3">
                            <div class="d-flex align-items-start">
                                <div class="me-3">
                                    <i class="bi {{ $item['icon'] }} text-primary fs-3"></i>
                                </div>
                                <div style="width: 100%;">
                                    <h6 class="fw-bold text-dark mb-1">{{ $item['label'] }}</h6>

                                    {{-- Kalau label Foto Faktual tampilkan gambar --}}
                                    @if(Str::contains($item['label'], 'Foto Faktual'))
                                        <div style="margin-top: 10px;">
                                            @if($item['field'] && Storage::disk('public')->exists($item['field']))
                                                <img src="{{ asset('storage/' . $item['field']) }}"
                                                     alt="Foto Faktual"
                                                     style="width: 100%; max-height: 120px; object-fit: contain; cursor:pointer;"
                                                     loading="lazy"
                                                     data-bs-toggle="modal"
                                                     data-bs-target="#fotoModal"
                                                     onclick="showFoto('{{ asset('storage/' . $item['field']) }}')">
                                            @elseif($item['field'])
                                                <img src="{{ asset($item['field']) }}"
                                                     alt="Foto Faktual"
                                                     style="width: 100%; max-height: 120px; object-fit: contain; cursor:pointer;"
                                                     loading="lazy"
                                                     data-bs-toggle="modal"
                                                     data-bs-target="#fotoModal"
                                                     onclick="showFoto('{{ asset($item['field']) }}')">
                                            @else
                                                <p style="font-size: 11px; color:red;">Tidak Ada Foto Faktual!</p>
                                            @endif
                                        </div>
<br>
                                    <p>
                                    <i class="bi bi-arrows-fullscreen me-1 text-primary"></i>
                                    Klik Foto Untuk Memperbesar
                                    </p>

                                        @else
                                        <p class="mb-0 text-muted">{{ $item['field'] }}</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach

            {{-- Tombol Perbaikan Data --}}
            {{-- <a href="/bedatabgstrukrrusakupdate/{{ $pemilik->databgkepemilikan_id }}">
                <p class="button-berkas">
                    <i class="bi bi-pencil-square" style="margin-right: 6px; color: navy;"></i>
                    Perbaikan Data
                </p>
            </a> --}}

            {{-- Catatan jika tidak lengkap --}}
            @if (strtolower($pemilik->pilihancatatan) === 'tidak lengkap')
                <div class="col-12 mt-3">
                    <div class="p-3 border-start border-4 border-danger bg-light rounded shadow-sm">
                        <div class="d-flex align-items-start">
                            <i class="bi bi-journal-text text-danger fs-4 me-3"></i>
                            <div>
                                <h6 class="fw-bold text-dark mb-1">Catatan</h6>
                                <p class="mb-0 text-muted" style="white-space: pre-wrap; word-wrap: break-word; text-align:justify;">
                                    {{ $pemilik->catatan ?? '-' }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

            {{-- Tombol Hapus --}}
            <a href="javascript:void(0)" title="Delete"
               data-bs-toggle="modal" data-bs-target="#deleteModal"
               data-judul="{{ $pemilik->databgkepemilikan_id }}"
               onclick="setDeleteUrl(this)"
               style="text-decoration: none;">
                <span style="color: white;" class="button-merah">
                    <i class="bi bi-trash" style="color: white; margin-right:4px;"></i>
                    Hapus
                </span>
            </a>
        </div>
    </div>
</div>

{{-- Modal Foto --}}
<div class="modal fade" id="fotoModal" tabindex="-1" aria-labelledby="fotoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content rounded-3 shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="fotoModalLabel">Foto Faktual </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body text-center">
                <img id="fotoPreview" src="" alt="Foto Faktual" class="img-fluid rounded">
            </div>
        </div>
    </div>
</div>

<script>
    function showFoto(src) {
        document.getElementById('fotoPreview').src = src;
    }
</script>

@empty
        <div class="col-12" style="margin-top: 50px;">
            <div style="
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 30px;
                font-weight: 600;
                font-family: 'Poppins', sans-serif;
                color: #6c757d;
                background-color: #f8f9fa;
                border: 2px dashed #ced4da;
                border-radius: 12px;
                font-size: 16px;
                animation: fadeIn 0.5s ease-in-out;
            ">
                <i class="bi bi-folder-x" style="margin-right: 8px; font-size: 20px; color: #dc3545;"></i>
                Data Informasi Struktur & Tingkat Kerusakan Bangunan Gedung Tidak Ditemukan !!
            </div>

            {{-- Tombol Tambah Data --}}
            <div class="text-center mt-4">
                <a href="{{ route('bedatabgstrukrrusakcreate', $data->id) }}" class="button-baru">
                    <i class="bi bi-plus-circle me-1"></i> Tambahkan Data
                </a>
            </div>
        </div>
    @endforelse
</div>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

<!-- Pagination links -->
{{-- <div class="d-flex justify-content-center mt-4">
    {{ $subdatapemilik->links() }}
</div> --}}


</div>
    <script>
function previewPDF(event, containerId, iframeId, messageId) {
    const file = event.target.files[0];
    const container = document.getElementById(containerId);
    const iframe = document.getElementById(iframeId);
    const message = document.getElementById(messageId);

    if (file && file.type === "application/pdf") {
        const fileURL = URL.createObjectURL(file);
        iframe.src = fileURL;
        container.style.display = 'block';
        message.style.display = 'none';
    } else {
        iframe.src = '';
        container.style.display = 'none';
        message.style.display = 'block';
        message.textContent = 'File harus berupa format PDF.';
    }
}
</script>

{{-- <div class="card shadow-sm border-0 mt-5">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Informasi Permohonan Pengajuan</h5>
    </div>
</div> --}}

                                    </div>
                                </div>
                                <!-- End row -->
                            </div>
                            <!-- end::Body -->


                        </form>

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
                     var deleteUrl = "/bedatabgstrukrrusakdelete/" + encodeURIComponent(id);
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
