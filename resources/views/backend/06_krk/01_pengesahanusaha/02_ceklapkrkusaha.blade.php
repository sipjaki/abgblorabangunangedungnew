
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
               style="background: linear-gradient(to bottom, #7de3f1, #ffffff); margin: 0; padding: 0; position: relative; left: 0; margin-top: 0px; margin-bottom: 0px;">
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





                     <div style="display: flex; justify-content: flex-end; margin-bottom:5px;">
                            @can('pemohon')
                        <button class="button-modern"
                        type="button"

                        onclick="location.href='{{ url('/bekrkusahapemohon') }}';"
                        style="cursor: pointer; color:black; margin-left:5px;">
                        <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
                        </button>
                    @endcan
                            @can('dinas')
                        <button class="button-modern"
                        type="button"

                        onclick="location.href='{{ url('/bebantekdinasasistensi') }}';"
                        style="cursor: pointer; color:black; margin-left:5px;">
                        <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
                        </button>
                    @endcan
                            @can('pemohonbantek')
                        <button class="button-modern"
                        type="button"

                        onclick="location.href='{{ url('/bebantekpemohonasistensi') }}';"
                        style="cursor: pointer; color:black; margin-left:5px;">
                        <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
                        </button>
                    @endcan

                        {{-- @canany(['konsultanbantek'])
<button class="button-create" type="button"
    onclick="location.href='/bebantuanteknislapangancreate/{{ $data->id }}';"
    style="cursor: pointer; margin-left:10px; color:black;">
    <i class="bi bi-file-earmark-plus" style="margin-right: 5px;"></i> Buat Dokumentasi
</button>

   <a href="{{ url('/beakunkonsultanasistensi') }}"
   class="button-modern"
   style="cursor: pointer; color:black; margin-left:5px; display: inline-flex; align-items: center; text-decoration: none;">
    <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
</a>


        @endcanany --}}

                        @canany(['superadmin', 'admin'])
<button class="button-modern" type="button"
    onclick="location.href='/doklapkrkusahacreate/{{ $data->id }}';"
    style="cursor: pointer; margin-left:10px; color:black;">
    <i class="bi bi-file-earmark-plus" style="margin-right: 5px;"></i> Buat Dokumentasi
</button>

<a href="{{ url('/bekrkusaha') }}" class="button-newvalidasi" style="cursor: pointer; color:black; margin-left:5px; display: inline-flex; align-items: center; text-decoration: none;">
    <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
</a>
        @endcanany

    </div>
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
                 {{-- </div> --}}

                 <hr>
                 <!-- /.card-header -->
                 <div class="card-body p-0">
                    <div class="table-responsive" style="overflow-x: auto; white-space: nowrap;">
    <style>
    body {
        font-family: 'Poppins', sans-serif;
    }

    .kegiatan-card {
        background: #ffffff;
        border-radius: 16px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.08);
        margin-bottom: 24px;
        overflow: hidden;
        border: 1px solid #dee2e6;
    }

    .kegiatan-header {
        background-color: #0C0A7A;
        color: white;
        padding: 14px 20px;
        font-weight: 600;
        font-size: 18px;
    }

    .kegiatan-body {
        padding: 20px;
    }

    .info-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 20px;
    }

    .info-item {
        flex: 1 1 45%;
    }

    .info-label {
        color: #0d3b66;
        font-weight: 600;
        margin-bottom: 5px;
    }

    iframe {
        border-radius: 8px;
        border: 1px solid #ced4da;
    }

    .berkas-section,
    .foto-section {
        margin-top: 20px;
    }

    .berkas-card,
    .foto-card {
        background: #f8f9fa;
        border-radius: 12px;
        padding: 12px;
        margin-bottom: 16px;
        border: 1px solid #e0e0e0;
    }

    .foto-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 20px;
    }

    .foto-item {
        background: #ffffff;
        border-radius: 12px;
        box-shadow: 0 3px 8px rgba(0, 0, 0, 0.05);
        padding: 12px;
        border: 1px solid #e9ecef;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
    }

    .foto-item img {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 8px;
        border: 1px solid #ddd;
        transition: transform 0.2s ease;
    }

    .foto-item img:hover {
        transform: scale(1.03);
    }

    .foto-item .btn {
        margin-top: 10px;
        width: 100%;
        border-radius: 8px;
    }

    .empty-message {
        text-align: center;
        padding: 40px;
        font-weight: 600;
        color: #6c757d;
        background: #f8f9fa;
        border-radius: 12px;
        border: 2px dashed #ced4da;
        font-size: 16px;
    }
</style>

<div class="container-fluid mt-4">
    @forelse ($subdata as $data)
        <div class="kegiatan-card">
            <div class="kegiatan-header">
                <i class="bi bi-journal-text"></i> {{ $data->kegiatan }}
            </div>

            <div class="kegiatan-body">
                <div class="info-row">
                    <div class="info-item">
                        <p class="info-label"><i class="bi bi-calendar-event"></i> Tanggal Kegiatan</p>
                        <p>{{ \Carbon\Carbon::parse($data->tanggalkegiatan)->translatedFormat('d F Y') }}</p>
                    </div>
                </div>

                {{-- BERKAS DUKUNG --}}
                <div class="berkas-section">
                    <h6 class="text-primary fw-bold mb-3"><i class="bi bi-file-earmark-text"></i> Berkas Dukung</h6>
                    <div class="row">
                        @for ($b = 1; $b <= 2; $b++)
                            @php
                                $berkasField = 'berkas' . $b;
                                $berkasPath = $data->$berkasField;
                                $berkasFull = $berkasPath && file_exists(public_path('storage/' . $berkasPath))
                                    ? asset('storage/' . $berkasPath)
                                    : ($berkasPath ? asset($berkasPath) : null);
                            @endphp

                            <div class="col-md-6 mb-3">
                                <div class="berkas-card">
                                    <h6 class="fw-semibold mb-2 text-secondary">Berkas Dukung {{ $b }}</h6>
                                    @if ($berkasFull)
                                        <iframe src="{{ $berkasFull }}" width="100%" height="250px"></iframe>
                                        <div class="text-center mt-2">
                                            <a href="{{ $berkasFull }}" download class="button-modern">
                                                <i class="bi bi-download"></i> Download Berkas {{ $b }}
                                            </a>
                                        </div>
                                    @else
                                        <p class="text-muted text-center">Tidak Ada Berkas Dukung {{ $b }}</p>
                                    @endif
                                </div>
                            </div>
                        @endfor
                    </div>
                </div>

                {{-- FOTO DOKUMENTASI --}}
                <div class="foto-section">
                    <h6 class="text-primary fw-bold mb-3"><i class="bi bi-image"></i> Dokumentasi Lapangan</h6>
                    <div class="foto-grid">
                        @for ($i = 1; $i <= 6; $i++)
                            @php
                                $fotoField = 'foto' . $i;
                                $fotoPath = $data->$fotoField;
                                $fotoFullPath = $fotoPath && file_exists(public_path('storage/' . $fotoPath))
                                    ? asset('storage/' . $fotoPath)
                                    : ($fotoPath ? asset($fotoPath) : null);
                            @endphp

                            @if ($fotoFullPath)
                                <div class="foto-item text-center">
                                    <img src="{{ $fotoFullPath }}" alt="Foto {{ $i }}" loading="lazy">
                                    <button type="button" class="button-modern"
                                        data-bs-toggle="modal" data-bs-target="#modalFoto{{ $data->id }}_{{ $i }}">
                                        <i class="bi bi-eye"></i> Lihat Foto {{ $i }}
                                    </button>
                                </div>

                                <!-- Modal Foto Individual -->
                                <div class="modal fade" id="modalFoto{{ $data->id }}_{{ $i }}" tabindex="-1"
                                    aria-labelledby="modalLabel{{ $data->id }}_{{ $i }}" aria-hidden="true">
                                    <div class="modal-dialog modal-lg modal-dialog-centered">
                                        <div class="modal-content border-0 shadow-lg rounded-3">
                                            <div class="modal-header bg-primary text-white">
                                                <h6 class="modal-title" id="modalLabel{{ $data->id }}_{{ $i }}">
                                                    <i class="bi bi-image"></i> Foto Dokumentasi {{ $i }}
                                                </h6>
                                                <button type="button" class="btn-close btn-close-white"
                                                    data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body text-center p-3">
                                                <div class="card border-0">
                                                    <img src="{{ $fotoFullPath }}" alt="Foto Dokumentasi {{ $i }}"
                                                        style="width: 100%; border-radius: 12px; object-fit: contain;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endfor
                    </div>

                    @php
                        $adaFoto = false;
                        for ($f = 1; $f <= 6; $f++) {
                            if ($data->{'foto' . $f}) {
                                $adaFoto = true;
                                break;
                            }
                        }
                    @endphp

                    @if (!$adaFoto)
                        <p class="text-muted text-center mt-2">Tidak Ada Foto Dokumentasi</p>
                    @endif
                </div>

                {{-- AKSI ADMIN --}}
                @canany(['superadmin', 'admin'])
                    <div class="text-end mt-4">
                        <button class="button-merah" data-bs-toggle="modal" data-bs-target="#deleteModal"
                            data-id="{{ $data->id }}" onclick="setDeleteUrl(this)">
                            <i class="bi bi-trash"></i> Hapus
                        </button>
                    </div>
                @endcanany
            </div>
        </div>
    @empty
        <div class="empty-message">
            <i class="bi bi-folder-x" style="margin-right: 8px; color: #dc3545;"></i>
            Belum Ada Dokumentasi Lapangan!
        </div>
    @endforelse
</div>

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
    var id = button.getAttribute('data-id'); // ✅ fix
    document.getElementById('itemName').innerText = id;
    var deleteUrl = "/doklapkrkusahacreatedelete/" + encodeURIComponent(id);
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
