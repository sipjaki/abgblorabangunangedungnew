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
                    <div>
                    @include('backend.00_administrator.00_baganterpisah.11_judulhalaman')
                </div>





                     <div style="display: flex; justify-content: flex-end; margin-bottom:5px;">
                            @can('pemohon')
                        <button class="button-newvalidasi"
                        type="button"

                        onclick="location.href='{{ url('/bekrkusahapemohon') }}';"
                        style="cursor: pointer; color:black; margin-left:5px;">
                        <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
                        </button>
                    @endcan
                            @can('dinas')
                        <button class="button-kembali"
                        type="button"

                        onclick="location.href='{{ url('/bebantekdinasasistensi') }}';"
                        style="cursor: pointer; color:black; margin-left:5px;">
                        <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
                        </button>
                    @endcan
                            @can('pemohonbantek')
                        <button class="button-kembali"
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
   class="button-kembali"
   style="cursor: pointer; color:black; margin-left:5px; display: inline-flex; align-items: center; text-decoration: none;">
    <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
</a>


        @endcanany --}}

                        @canany(['superadmin', 'admin'])

                        <button class="button-baru" type="button"
    onclick="location.href='/dokpenilikpracreate/{{ $data->id }}';"
    style="cursor: pointer; margin-left:10px; color:black;">
    <i class="bi bi-file-earmark-plus" style="margin-right: 5px;"></i> Buat Data Kegiatan Pra Inspeksi
</button>

<a href="{{ url('/dataallpenilikbg') }}" class="button-newvalidasi" style="cursor: pointer; color:black; margin-left:5px; display: inline-flex; align-items: center; text-decoration: none;">
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

                     {{-- </div> --}}
                 </div>

                 <hr>
                 <!-- /.card-header -->
                 <div class="card-body p-0">
                    <div class="table-responsive" style="overflow-x: auto; white-space: nowrap;">
    <table id="tabelSuratbantuanteknis" class="zebra-table" style="border-collapse: separate; border-spacing: 0; border-radius: 20px; overflow: hidden;">
                <thead>
                                  <tr>
    <th style="width:50px; text-align: center;">
        <i class="bi bi-hash"></i> No
    </th>
    <th style="width:200px;">
        <i class="bi bi-journal-text"></i> Kegiatan
    </th>
    <th style="width:150px;">
        <i class="bi bi-calendar-event"></i> Tanggal Kegiatan
    </th>
    {{-- <th style="width:200px;">
        <i class="bi bi-list-task"></i> Nama Kegiatan
    </th> --}}
    <th style="width:120px;">
        <i class="bi bi-123"></i> Kegiatan Ke-
    </th>
    <th style="width:300px;">
        <i class="bi bi-card-text"></i> Uraian Kegiatan
    </th>
    <th style="width:300px;">
        <i class="bi bi-journal-check"></i> Catatan Kegiatan
    </th>
    <th style="width:300px;">
        <i class="bi bi-journal-check"></i> Lihat Foto & Berkas
    </th>
    @canany(['superadmin', 'admin'])
    <th style="width:120px;">
        <i class="bi bi-tools"></i> Aksi
    </th>
    @endcanany


    </tr>
                            </thead>

                            <tbody id="tableBody">
                                @forelse ($subdata as $item)
    <tr>
        <td>{{ $loop->iteration }}</td>
<td>{{ $item->kegiatan }}</td>
<td>{{ \Carbon\Carbon::parse($item->tanggalkegiatan)->translatedFormat('d F Y') }}</td>
<td>
    <button class="button-berkas">
        {{ $item->kegiatanke }}
    </button>
</td>
<td>{{ $item->uraiankegiatan }}</td>
<td>{{ $item->catatankegiatan }}</td>

<td>
  <a href="{{ route('dokpenilikprafoto', $item->id) }}" class="button-baru" style="display: inline-flex; align-items: center; text-decoration: none;">
    <i class="bi bi-camera-fill" style="margin-right: 6px;"></i> Lihat Foto & Berkas
  </a>
</td>


@canany(['superadmin', 'admin'])

<td class="text-center align-middle">
    {{-- <a href="/bebujkkonstruksi/show/{{ $item->id }}" class="btn btn-sm btn-info me-2" title="Lihat Detail">
        <i class="bi bi-eye"></i>
    </a>
            <a href="/bebujkkonstruksi/update/{{ $item->id }}" class="btn btn-sm btn-warning me-2" title="Ubah Data">
                <i class="bi bi-pencil-square"></i>
            </a> --}}
            <a href="javascript:void(0)" class="btn btn-sm btn-danger" title="Hapus Data"
            data-bs-toggle="modal" data-bs-target="#deleteModal"
            data-id="{{ $item->id }}"
            onclick="setDeleteUrl(this)">
            <i class="bi bi-trash"></i>
        </a>

        {{-- <a href="javascript:void(0)" class="btn btn-sm btn-danger" title="Hapus Data"
        data-bs-toggle="modal" data-bs-target="#deleteModal"
        data-id="{{ $item->id }}"
        onclick="setDeleteUrl(this)">
        <i class="bi bi-trash"></i>
    </a> --}}
</td>
@endcanany
</tr>

        @empty
    <tr>
        <td colspan="100%"> {{-- Memenuhi semua kolom --}}
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
                Data Tidak Ditemukan !!
            </div>
        </td>
    </tr>
@endforelse

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

</tbody>
                        </table>

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
    var deleteUrl = "/prakegiatanfotopradelete/" + encodeURIComponent(id);
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
