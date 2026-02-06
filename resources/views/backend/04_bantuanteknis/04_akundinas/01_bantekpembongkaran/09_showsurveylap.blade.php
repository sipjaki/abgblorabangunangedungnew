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

<style>
    .card {
        border-radius: 12px;
    }

    .card-header {
        background: #f8f9fa;
        border-bottom: 1px dashed #dee2e6;
    }

    img {
        transition: transform .2s ease-in-out;
    }

    img:hover {
        transform: scale(1.05);
    }
</style>

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

                    <div class="row g-4">

@php
    $infoItems = [
        [
            'icon'  => 'bi-person-fill',
            'title' => 'Nama Pemilik Bangunan',
            'value' => $data->fotobongkarlap->namapemilik ?? '-',
        ],
        [
            'icon'  => 'bi-building',
            'title' => 'Instansi / Dinas',
            'value' => $data->fotobongkarlap->user->name ?? '-',
        ],
        [
            'icon'  => 'bi-house-fill',
            'title' => 'Nama Bangunan',
            'value' => $data->fotobongkarlap->namabangunan ?? '-',
        ],
        [
            'icon'  => 'bi-geo-alt-fill',
            'title' => 'Alamat Bangunan',
            'value' => $data->fotobongkarlap->alamat ?? '-',
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

        {{-- ======================================================= --}}
                    <div class="col-md-12">
                        <!--begin::Quick Example-->
        <form action="{{ route('basurveylapfotopembongkaran.uploadlap') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('POST')

                            <!-- begin::Body -->

        <!-- Hidden Input untuk ID Data Awal -->
<input type="hidden" name="id_awal" value="{{ $data->id }}">

<!-- Hidden Input untuk Nama Pemilik Data Awal -->
<input type="hidden" name="namapemilik_awal" value="{{ $data->namapemilik }}">


<input type="hidden" name="bantekpembongkaraninduk_id" value="{{ $data->id }}">

        <input type="hidden" name="user_id" value="{{ $user->id ?? '' }}">

                            <div class="card-body">
                                <div class="row">
                                    <!-- Left Column (6/12) -->
<h5 class="mt-4 mb-3 fw-bold text-primary d-flex align-items-center"
    style="font-size:16px; border-left: 4px solid #0d6efd; padding-left: 14px; background-color: #f0f8ff; border-radius: 6px; height: 45px;">
  <i class="bi bi-house-door-fill me-3" style="font-size: 18px;"></i>
  Dokumentasi Survey Lapangan Kajian Pembongkaran Bangunan Gedung
</h5>
<div class="row">
    {{-- KETERANGAN --}}
    <div class="col-md-8">
        <div class="card shadow-sm border-0 mb-3">
            <div class="card-body">
                <label class="fw-semibold text-primary mb-2">
                    <i class="bi bi-chat-text-fill me-2"></i>Keterangan
                </label>
                <div class="p-3 bg-light rounded border">
                    {{ $data->keterangan ?? '-' }}
                </div>
            </div>
        </div>
    </div>

    {{-- TANGGAL --}}
    <div class="col-md-4">
        <div class="card shadow-sm border-0 mb-3">
            <div class="card-body">
                <label class="fw-semibold text-success mb-2">
                    <i class="bi bi-calendar-event-fill me-2"></i>Tanggal
                </label>
                <div class="p-3 bg-light rounded border text-center">
                    {{ $data->tanggal ? \Carbon\Carbon::parse($data->tanggal)->translatedFormat('d F Y') : '-' }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    @for ($i = 1; $i <= 8; $i++)
        @php
            $foto = 'foto'.$i;
        @endphp

        <div class="col-md-3 mb-4">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-header text-center fw-semibold
                    {{ $i <= 4 ? 'text-info' : 'text-warning' }}">
                    <i class="bi bi-image-fill me-2"></i> Foto {{ $i }}
                </div>

                <div class="card-body d-flex align-items-center justify-content-center bg-light">
                    @if(!empty($data->$foto))
                        <a href="{{ asset($data->$foto) }}" target="_blank">
                            <img
                                src="{{ asset($data->$foto) }}"
                                class="img-fluid rounded shadow-sm"
                                style="max-height:180px; object-fit:cover;">
                        </a>
                    @else
                        <span class="text-muted fst-italic">Tidak tersedia</span>
                    @endif
                </div>
            </div>
        </div>
    @endfor
</div>

<!-- =========================== -->
    <!-- ALAMAT BANGUNAN GEDUNG -->
    <!-- =========================== -->


{{-- ======================================================================================================================= --}}


{{-- ======================================================================================================================= --}}



                                    </div>
                                </div>
<br><br>
                                <div class="flex justify-end">

                               <button class="button-berkas" type="button" onclick="openModal()">
                                    <i class="bi bi-save" style="margin-right: 5px;"></i> Upload Survey Lapangan
                                    </button>

                                    <a href="{{ route('bebantekpembongkaran') }}" class="button-modern">
                                        <i class="bi bi-arrow-left-circle me-1"></i>
                                        <strong style="color: black">Kembali</strong>
                                    </a>

                                </div>



                                <!-- End row -->
                            </div>
                            <!-- end::Body -->

                            <div style="display: flex; justify-content: flex-end; margin-bottom:20px;">

                                <!-- Modal Konfirmasi -->
                                <div id="confirmModal" style="display: none; position: fixed; inset: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
                                    <div style="background: white; padding: 24px 30px; border-radius: 12px; max-width: 400px; width: 90%; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
                                      <p style="font-size: 16px; font-weight: 600; margin-bottom: 20px;">
                                        Upload Dokumentasi Survey Lapangan ?
                                    </p>

                                      <!-- Tombol -->
                                      <div style="display: flex; justify-content: center; gap: 12px;">
                                        <button id="confirmSubmitBtn"
                                        onclick="submitForm()"
                                        style="background-color: #10B981; color: white; padding: 8px 16px; border-radius: 8px; border: none; transition: 0.3s; display: flex; align-items: center; gap: 6px;"
                                        onmouseover="this.style.backgroundColor='white'; this.style.color='black'; this.querySelector('svg').style.fill='black';"
                                        onmouseout="this.style.backgroundColor='#10B981'; this.style.color='white'; this.querySelector('svg').style.fill='white';">
                                    <!-- Telegram SVG -->
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 448 512" fill="white">
                                        <path d="M446.7 68.8c-5.7-4.8-13.8-5.7-20.3-2.2L26.1 263.5c-7.2 3.7-11.4 11.5-10.4 19.5s6.7 14.5 14.4 16.5l85.1 23.3 40.6 98.8c2.9 7.1 9.6 11.7 17.1 11.7h.4c7.7-.2 14.4-5.1 16.8-12.3l33.2-96.5 109.7 88.1c3.5 2.8 7.9 4.3 12.3 4.3 2.5 0 5-.5 7.4-1.4 6.4-2.5 11.2-8.2 12.7-15.1L448 89.4c1.3-7.6-1.6-15.3-7.3-20.6z"/>
                                    </svg>
                                    Ya
                                </button>

                                <!-- Tombol Batal dengan ikon X (SVG) -->
                                <button type="button"
                                        onclick="closeModal()"
                                        style="background-color: #EF4444; color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer; transition: 0.3s; display: flex; align-items: center; gap: 6px;"
                                        onmouseover="this.style.backgroundColor='white'; this.style.color='black'; this.querySelector('svg').style.fill='black';"
                                        onmouseout="this.style.backgroundColor='#EF4444'; this.style.color='white'; this.querySelector('svg').style.fill='white';">
                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 384 512" fill="white">
                                        <path d="M231.6 256l142.7-142.7c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L186.3 210.7 43.6 68c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L141 256 0 397.7c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L186.3 301.3l142.7 142.7c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L231.6 256z"/>
                                    </svg>
                                    Batal
                                </button>

                                      </div>
                                    </div>
                                </div>

                                <!-- Script -->
                                <script>
                                function openModal() {
                                    const modal = document.getElementById("confirmModal");
                                    if (modal) modal.style.display = "flex";
                                }

                                function closeModal() {
                                    const modal = document.getElementById("confirmModal");
                                    if (modal) modal.style.display = "none";
                                }

                                </script>

                            </div>


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


