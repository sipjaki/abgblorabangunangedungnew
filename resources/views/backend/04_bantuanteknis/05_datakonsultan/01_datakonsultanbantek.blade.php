
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

    body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #3b82f6 100%);
            min-height: 100vh;
            color: #ffffff;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        </style>

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






<div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; margin-bottom: 10px;">

  <!-- Bagian kiri: dropdown entries + search -->
  <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">

    <!-- Dropdown Entries -->
    <div style="display: flex; align-items: center; gap: 8px;">
      <label for="entries" style="font-weight: 600; font-size: 14px;">Tampilkan data :</label>
      <select id="entries" onchange="updateEntries()"
        style="padding: 8px 12px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9; font-size: 14px; cursor: pointer;">
        {{-- <option value="10">10</option> --}}
        <option value="25">25</option>
        <option value="50">50</option>
        <option value="75">75</option>
        <option value="100">100</option>
        <option value="150">150</option>
        <option value="200">200</option>
        <option value="500">500</option>
        <option value="1000">1000</option>
        <option value="2000">2000</option>
      </select>
    </div>

    <!-- Search Box -->
      <div style="position: relative; display: inline-block; margin-right:10px;">
    <input type="search" id="searchInput" placeholder="Cari Konsultan Perencana ...."
           onkeyup="searchTable()"
           style="border: 1px solid #ccc; padding: 10px 20px; font-size: 14px; border-radius: 10px; width: 300px;">
    <i class="bi bi-search"
       style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); font-size: 16px; color: #888;"></i>
</div>


  </div>

  <!-- Bagian kanan: tombol download dan create -->
  <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
    <button onclick="exportTableToExcel('tabelSuratbantuanteknis', 'data_konsultanperencanateknis')"
      class="button-modern"
      style="color: black; display: flex; align-items: center; gap: 5px; padding: 8px 15px; border-radius: 8px; border: 1px solid #ccc; background-color: #f9f9f9; cursor: pointer;">
      <i class="bi bi-download"></i> Download Excel
    </button>

    <a href="/bebantekkonsultannew" style="text-decoration: none;">
      <button class="button-baru"
        style="color: black; display: flex; align-items: center; gap: 5px; padding: 8px 15px; border-radius: 8px; border: 1px solid #ccc; background-color: #f9f9f9; cursor: pointer;">
        <i class="bi bi-plus-circle"></i> Buat Baru
      </button>
    </a>
  </div>

</div>

<script>
  function updateEntries() {
    let selectedValue = document.getElementById("entries").value;
    let url = new URL(window.location.href);
    url.searchParams.set("perPage", selectedValue);
    window.location.href = url.toString();
  }

             let timeout = null;

function searchTable() {
    clearTimeout(timeout);
    timeout = setTimeout(() => {
        let input = document.getElementById("searchInput").value;

        fetch(`/bebantekkonsultan?search=${encodeURIComponent(input)}`)
            .then(response => response.text())
            .then(html => {
                let parser = new DOMParser();
                let doc = parser.parseFromString(html, "text/html");
                let newTableBody = doc.querySelector("#tableBody");

                if (newTableBody) {
                    document.querySelector("#tableBody").innerHTML = newTableBody.innerHTML;
                }
            })
            .catch(error => console.error("Error fetching search results:", error));
    }, 300); // jeda 300ms supaya gak spam request
}
</script>

                <hr>
                 <!-- /.card-header -->
                 <div class="card-body p-0">
           <div class="table-responsive" style="overflow-x: auto; white-space: nowrap;">
                        <table id="tabelSuratbantuanteknis"
                        class="table zebra-table" style="border-collapse: separate; border-spacing: 0; border-radius: 20px; overflow: hidden;"
                        >
                            <thead>
                                  <tr>
     <th style="background-color: #ADD8E6;">No</th>
{{-- <th style="background-color: #ADD8E6;"><i class="fas fa-layer-group"></i> Sub Kualifikasi</th> --}}
{{-- <th style="background-color: #ADD8E6;"><i class="fas fa-users"></i> Asosiasi Masjaki</th> --}}
<th style="background-color: #ADD8E6;"><i class="fas fa-user"></i> Nama Lengkap</th>
<th style="background-color: #ADD8E6;"><i class="fas fa-map-marker-alt"></i> Alamat</th>
<th style="background-color: #ADD8E6;"><i class="fas fa-phone"></i> No Telepon</th>
<th style="background-color: #ADD8E6;"><i class="fas fa-envelope"></i> Email</th>
<th style="background-color: #ADD8E6;"><i class="fas fa-id-card"></i> Nomor Induk Berusaha</th>
<th style="background-color: #ADD8E6;"><i class="fas fa-user-tie"></i> Penanggung Jawab Usaha (PJU)</th>
<th style="background-color: #ADD8E6;"><i class="fas fa-file-signature"></i> No Akta</th>
<th style="background-color: #ADD8E6;"><i class="fas fa-calendar-alt"></i> Tanggal</th>
<th style="background-color: #ADD8E6;"><i class="fas fa-user-edit"></i> Nama Notaris</th>
<th style="background-color: #ADD8E6;"><i class="fas fa-check-circle"></i> No Pengesahan</th>
<th style="background-color: #ADD8E6;"><i class="fas fa-tools"></i> Aksi</th>

    </tr>
                            </thead>
                              <tbody id="tableBody">

                                @forelse ($data as $item )

                                <tr class="align-middle">
                                 <td>{{ $loop->iteration }}</td>
{{-- <td>{{ $item->bujkkonsultansub->namasub ?? '-' }}</td> --}}
{{-- <td>{{ $item->asosiasimasjaki->namaasosiasi ?? '-' }}</td> --}}
<td style="text-align: left;">{{ $item->namalengkap ?? '-' }}</td>
<td style="text-align: left;">{{ $item->alamat ?? '-' }}</td>
<td>{{ $item->no_telepon ?? '-' }}</td>
<td style="text-align: left;">{{ $item->email ?? '-' }}</td>
<td>{{ $item->nomorindukberusaha ?? '-' }}</td>
<td>{{ $item->pju ?? '-' }}</td>
<td>{{ $item->no_akte ?? '-' }}</td>
<td>{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d F Y') ?? '-' }}</td>
<td style="text-align: left;">{{ $item->nama_notaris ?? '-' }}</td>
<td style="text-align: left;">{{ $item->no_pengesahan ?? '-' }}</td>
            @can('superadmin')

            <td style="text-align: center; vertical-align: middle;">
                {{-- <a href="/404" class="btn btn-sm btn-info me-2" title="Show">
                    <i class="bi bi-eye"></i>
                </a> --}}
                                        {{-- <a href="/404" class="btn btn-sm btn-warning me-2" title="Update">
                                            <i class="bi bi-pencil-square"></i>
                                        </a> --}}
                                        <a href="javascript:void(0)" class="button-merah" title="Delete"
                                        data-bs-toggle="modal" data-bs-target="#deleteModal"
                                        data-judul="{{ $item->id }}"
                                        onclick="setDeleteUrl(this)">
                                        <i class="bi bi-trash"></i> Hapus
                                    </a>
                                </td>

                                @endcan

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

                 @include('backend.00_administrator.00_baganterpisah.07_paginations')

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
                     var deleteUrl = "/bebanteklapcekdokcredelete/" + encodeURIComponent(id);
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
