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
                    <div class="col-md-12" style="margin-top: -20px;">
                        <!--begin::Quick Example-->
                  <form action="{{ route('dokhibahnew.create') }}" method="POST" enctype="multipart/form-data">
          @csrf
                            <!-- begin::Body -->
                            <div class="card-body">
                                <div class="row">

           {{-- @include('backend.04_bantuanteknis.04_akundinas.01_bantekpembongkaran.00_navigasimenubaru.00_fiturtambahannav') --}}

<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white d-flex align-items-center gap-2">
        <i class="bi bi-info-circle fs-5"></i>
        <h5 class="mb-0" style="font-size: 16px;">Informasi Permohonan Berkas Administrasi Pembongkaran Bangunan Gedung Negara </h5>
    </div>
</div>

@include('backend.04_bantuanteknis.04_akundinas.01_bantekpembongkaran.00_navigasimenubaru.01_fiturstatus')

       <!-- Left Column (6/12) -->
<div class="row g-4">

@php
    $infoItems = [
        [
            'icon'  => 'bi-person-fill',
            'title' => 'Nama Pemilik Bangunan',
            'value' => $data->namapemilik ?? '-',
        ],
        [
            'icon'  => 'bi-building',
            'title' => 'Instansi / Dinas',
            'value' => $data->user->name ?? '-',
        ],
        [
            'icon'  => 'bi-house-fill',
            'title' => 'Nama Bangunan',
            'value' => $data->namabangunan ?? '-',
        ],
        [
            'icon'  => 'bi-geo-alt-fill',
            'title' => 'Alamat Bangunan',
            'value' => $data->alamat ?? '-',
        ],

    ];
@endphp

@foreach ($infoItems as $item)
    <div class="col-md-6">
        <div class="card shadow-sm border-0 animate__animated animate__fadeInUp">
            <div class="card-body bg-white rounded-3"
                style="background: linear-gradient(to bottom, #f8faff, #e6f0ff);">
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

<div class="row g-3">

    <!-- Leaflet CSS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

    {{-- Keterangan --}}
    <div class="col-md-12">
        <div class="form-modern mb-3">
            <label class="form-label-modern d-flex align-items-center" for="keterangan">
                <i class="bi bi-info-circle-fill me-2 text-primary" style="font-size: 1.2rem;"></i> Keterangan
            </label>
            <input type="text" class="form-control" id="keterangan" name="keterangan"
                value="{{ $data->keterangan ?? '-' }}" readonly>
        </div>

        {{-- Koordinat (hidden) --}}
        <input type="hidden" id="koordinat" name="koordinat" value="{{ $data->koordinat ?? '' }}">

        {{-- Peta --}}
        <div id="map" style="height: 500px; border-radius: 10px; border: 2px solid #ccc;"></div>
    </div>

</div>

<script>
    // Ambil koordinat awal dari PHP
    var initialCoord = "{{ $data->koordinat ?? '' }}"; // format: "lat,lng"
    var lat = -7.0421; // default Blora
    var lng = 111.4046;
    var zoom = 11;

    if(initialCoord) {
        var parts = initialCoord.split(',');
        if(parts.length === 2) {
            lat = parseFloat(parts[0]);
            lng = parseFloat(parts[1]);
            zoom = 15; // zoom lebih dekat kalau ada koordinat
        }
    }

    // Inisialisasi map
    var map = L.map('map').setView([lat, lng], zoom);

    // Layer peta
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Dinas Pekerjaan Umum Dan Penataan Ruang Kabupaten Blora'
    }).addTo(map);

    // Marker non-draggable
    L.marker([lat, lng], {draggable: false}).addTo(map)
        .bindPopup("Koordinat: " + lat.toFixed(6) + ", " + lng.toFixed(6))
        .openPopup();

    // Hapus event klik, jadi marker tidak bisa berpindah
</script>

</div>

<br><hr>

@include('backend.04_bantuanteknis.04_akundinas.01_bantekpembongkaran.00_navigasimenubaru.03_fiturmenunavigasi')
</div>


</div>
    <a href="/bebantekpembongkaran" class="button-berkas">
    <strong style="color: black;"><i class="bi bi-arrow-left me-2"></i>
    Kembali Ke Data Awal</strong>
</a>
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

<!-- Surat Pemberitahuan (2) -->
<div class="d-block">
    @if($data->validasiberkas2 === 'sudah')
        <!-- LOLOS (TIDAK BISA DIKLIK) -->
        <button class="button-hijau"
                type="button"
                disabled
                style="background-color:#10B981;color:black;">
            <i class="bi bi-patch-check-fill me-1"></i> Lolos
        </button>

    @elseif($data->validasiberkas2 === 'belum')
        <!-- DIKEMBALIKAN (BISA DIKLIK UNTUK RESET KE NULL) -->
        <button class="button-merah"
                type="button"
                onclick="openModalPemohon2({{ $data->id }})"
                style="background-color:#0400ff;color:white;cursor:pointer;padding:8px 16px;border-radius:6px;border:none;">
            <i class="bi bi-arrow-clockwise me-1"></i> Permohonan Ulang
        </button>

        <div class="mt-1">
            <small class="text-muted">
                Status : Dikembalikan, Silahkan Klik Kembali Jika Semua Persyaratan Sudah Di Perbaiki !.
            </small>
        </div>

    @else
        <!-- VERIFIKASI DPUPR (NULL - TIDAK BISA DIKLIK KARENA SUDAH NULL) -->
        <button class="button-modern"
                type="button"
                disabled
                style="background-color:#f0f0f0;color:#999;cursor:not-allowed;padding:8px 16px;border-radius:6px;border:1px solid #ddd;">
            <i class="bi bi-hourglass-split me-1"></i> Menunggu Verifikasi DPUPR
        </button>

        <div class="mt-1">
            <small class="text-muted">
                Status: Sedang menunggu verifikasi dari DPUPR
            </small>
        </div>
    @endif
</div>

<script>
function openModalPemohon2(itemId) {
    const modal = document.getElementById('confirmModalPemohon2');
    const form = document.getElementById('validasiFormPemohon2');

    // Set action URL dengan method POST
    form.action = "{{ route('validasipembongkaranpemohon.update', ':id') }}"
                    .replace(':id', itemId);

    modal.style.display = "flex";
    document.body.style.overflow = 'hidden';
}

function closeModalPemohon2() {
    document.getElementById('confirmModalPemohon2').style.display = "none";
    document.body.style.overflow = 'auto';
}
</script>

<!-- Modal Surat Pemberitahuan (2) -->
<div id="confirmModalPemohon2"
     style="display:none;position:fixed;inset:0;
            background-color:rgba(0,0,0,0.5);
            z-index:1000;justify-content:center;align-items:center;">

    <div style="background:white;padding:24px;border-radius:12px;
                width:90%;max-width:400px;text-align:center;">

        <p style="font-size:16px;font-weight:600;">
            Ajukan ulang verifikasi berkas?
        </p>

        <p style="font-size:14px;color:#666;">
            Status akan dikembalikan ke "Menunggu Verifikasi DPUPR"
        </p>

        <form id="validasiFormPemohon2" method="POST">
            @csrf
            <!-- TIDAK PERLU @method('PUT') KARENA ROUTENYA POST -->

            <!-- Hapus document_type jika tidak diperlukan di controller -->
            <!-- <input type="hidden" name="document_type" value="2"> -->

            <!-- Kirim nilai null untuk validasiberkas2 -->
            <input type="hidden" name="validasiberkas2" value="">

            <button type="submit"
                    style="background:#10B981;color:white;
                           padding:8px 16px;margin-right:10px;
                           border-radius:8px;border:none;cursor:pointer;"
                    onmouseover="this.style.backgroundColor='#059669';this.style.color='white';"
                    onmouseout="this.style.backgroundColor='#10B981';this.style.color='white';">
                <i class="bi bi-check2-circle me-1"></i> Ya, Ajukan Ulang
            </button>
        </form>

        <br><br>

        <button type="button"
                onclick="closeModalPemohon2()"
                style="background:#D1D5DB;padding:8px 16px;
                       border-radius:8px;border:none;color:black;cursor:pointer;"
                onmouseover="this.style.backgroundColor='#9CA3AF';this.style.color='white';"
                onmouseout="this.style.backgroundColor='#D1D5DB';this.style.color='black';">
            <i class="bi bi-x-circle me-1"></i> Batal
        </button>
    </div>
</div>


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
 {{-- <div style="margin-top: -50px;"> --}}

     @include('backend.00_administrator.00_baganterpisah.02_footer')
    {{-- </div> --}}



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
