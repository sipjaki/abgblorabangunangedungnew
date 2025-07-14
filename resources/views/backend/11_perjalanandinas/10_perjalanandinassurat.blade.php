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
  "
>
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
                        <div style="position: relative; display: inline-block; margin-right:10px;">
                            <input type="search" id="searchInput" placeholder="Cari Pemohon ...." onkeyup="searchTable()" style="border: 1px solid #ccc; padding: 10px 20px; font-size: 14px; border-radius: 10px; width: 300px;">
                            <i class="fas fa-search" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); font-size: 16px; color: #888;"></i>
                        </div>
                        <script>
                            function updateEntries() {
                                let selectedValue = document.getElementById("entries").value;
                                let url = new URL(window.location.href);
                                url.searchParams.set("perPage", selectedValue);
                                window.location.href = url.toString();
                            }

                            function searchTable() {
                            let input = document.getElementById("searchInput").value;

                            fetch(`/dataalldinassurat?search=${input}`)
                                .then(response => response.text())
                                .then(html => {
                                    let parser = new DOMParser();
                                    let doc = parser.parseFromString(html, "text/html");
                                    let newTableBody = doc.querySelector("#tableBody").innerHTML;
                                    document.querySelector("#tableBody").innerHTML = newTableBody;
                                })
                                .catch(error => console.error("Error fetching search results:", error));
                        }

                                </script>


                     {{-- <a href="/bekrkindex" style="text-decoration: none;">
    <button class="button-kembali" style="color: black;">
        <!-- Ikon Kembali -->
        <i class="fa fa-arrow-left" style="margin-right: 8px;"></i> Kembali
    </button>
</a> --}}


                     </div>
                 </div>
                 <!-- /.card-header -->
                 <div class="card-body p-0">
                    <div class="table-responsive" style="overflow-x: auto; white-space: nowrap;">
                        <table class="table zebra-table" style="border-collapse: separate; border-spacing: 0; border-radius: 20px; overflow: hidden;">
                            <thead>
                                <tr>
<th style="background-color: #ADD8E6;">
    <span class="text-danger"></span> No
</th>
        <th style="background-color: #ADD8E6;">
            <i class="bi bi-person text-danger"></i> Nama Petugas
        </th>
        <th style="background-color: #ADD8E6;">
            <i class="bi bi-signpost text-danger"></i> Dinas Luar / Dalam
        </th>
        <th style="background-color: #ADD8E6;">
            <i class="bi bi-calendar-week text-danger"></i> Tanggal Surat Terbit
        </th>
        <th style="background-color: #ADD8E6;">
            <i class="bi bi-journal-text text-danger"></i> Maksud Perjalanan
        </th>
        <th style="background-color: #ADD8E6;">
            <i class="bi bi-truck-front text-danger"></i> Angkutan
        </th>
        <th style="background-color: #ADD8E6;">
            <i class="bi bi-geo-alt text-danger"></i> Tempat Berangkat
        </th>
        <th style="background-color: #ADD8E6;">
            <i class="bi bi-geo-fill text-danger"></i> Tempat Tujuan
        </th>
        <th style="background-color: #ADD8E6;">
            <i class="bi bi-hourglass-split text-danger"></i> Lama Perjalanan
        </th>
        <th style="background-color: #ADD8E6;">
            <i class="bi bi-calendar2-week text-danger"></i> Mulai Perjalanan
        </th>
        <th style="background-color: #ADD8E6;">
            <i class="bi bi-calendar2-check text-danger"></i> Selesai Perjalanan
        </th>
        <th style="background-color: #ADD8E6;">
            <i class="bi bi-person-lines-fill text-danger"></i> Pendamping
        </th>
        {{-- <th style="background-color: #ADD8E6;">
            <i class="bi bi-file-earmark-text text-danger"></i> Keterangan Kegiatan
        </th> --}}


                                    <th style="background-color: #ADD8E6;"><i class="fas fa-tasks"></i> Surat Tugas </th>
                                    <th style="background-color: #ADD8E6;"><i class="fas fa-tasks"></i> Dok Lapangan</th>
                                    {{-- <th style="background-color: #ADD8E6;"><i class="fas fa-tasks"></i> Status Cek Lapangan</th> --}}
{{-- <th style="background-color: #ADD8E6;">
    <i class="bi bi-geo-alt-fill" style="margin-right: 5px;"></i> Status Lapangan
</th> --}}

                             {{-- <th style="background-color: #ADD8E6;">
    <i class="fas fa-database" style="margin-right: 6px;"></i> Status Olah Data
</th> --}}
                             <th style="background-color: #ADD8E6;">
    <i class="fas fa-database" style="margin-right: 6px;"></i> Berita Acara Perjalanan
</th>
                             {{-- <th style="background-color: #ADD8E6;">
    <i class="fas fa-database" style="margin-right: 6px;"></i> Status
</th>
       <th style="background-color: #ADD8E6;">Status Akhir</th> --}}
       <th style="background-color: #ADD8E6;">Aksi</th>
                                </tr>
                            </thead>
                              <tbody id="tableBody">

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>Nama Petugas</th>
            @foreach ([
                'Januari','Februari','Maret','April','Mei','Juni',
                'Juli','Agustus','September','Oktober','November','Desember'
            ] as $bulan)
                <th>{{ $bulan }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($statistik as $nama => $bulanData)
            <tr>
                <td>{{ $nama }}</td>
                @for ($i = 1; $i <= 12; $i++)
                    <td>{{ $bulanData[$i] }}</td>
                @endfor
            </tr>
        @endforeach
    </tbody>
</table>


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
                     var deleteUrl = "/dataalldinassuratdelete/" + encodeURIComponent(id);
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
