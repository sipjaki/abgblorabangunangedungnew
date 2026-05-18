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
                    <div>
                    @include('backend.00_administrator.00_baganterpisah.11_judulhalaman')
                </div>




<div style="display: flex; justify-content: space-between; align-items: center; flex-wrap: wrap; gap: 10px; margin-bottom: 10px;">

  <!-- Bagian kiri: dropdown entries + search -->
  <div style="display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">

    <!-- Dropdown Entries -->
    <div style="display: flex; align-items: center; gap: 8px;">
      <label for="entries" style="font-weight: 600; font-size: 14px;">Tampilkan data :</label>
      <select id="entries" onchange="updateEntries()"
        style="padding: 8px 12px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9; font-size: 14px; cursor: pointer;">
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
    <div style="position: relative; display: inline-block;">
      <input type="search" id="searchInput" placeholder="Cari Permohonan ...." onkeyup="searchTable()"
        style="border: 1px solid #ccc; padding: 10px 35px 10px 15px; font-size: 14px; border-radius: 10px; width: 300px;" />
      <i class="bi bi-search"
         style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); font-size: 16px; color: #888;">
      </i>
    </div>

  </div>

  <!-- Bagian kanan: tombol download dan create -->
  <div style="display: flex; align-items: center; gap: 10px; flex-wrap: wrap;">
    <a href="/bebantuanteknisassistensi">
        <button class="button-baru" style="margin: 0 5px;">
            <i class="bi bi-folder2-open"></i> Data Permohonan
        </button>
    </a>

    <button onclick="exportTableToExcel('tabelSuratbantuanteknis', 'data_daftarjenispermohonan')"
      class="button-berkas"
      >
      <i class="bi bi-download"></i> Download Excel
    </button>

    @canany(['superadmin', 'admin'])
    <a href="{{ route('bebantuanteknisindexmenu') }}">
        <button class="button-modern" type="button"
            style="cursor: pointer; margin-left:5px; color:black;">
            <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
        </button>
    </a>
@endcanany


  </div>

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

    fetch(`/bebantuanteknisassistensi?search=${input}`)
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




                 <hr>
                 <!-- /.card-header -->
                 <div class="card-body p-0">
                    <div class="table-responsive" style="overflow-x: auto; white-space: nowrap;">
                        <table id="tabelSuratbantuanteknis" class="zebra-table"  class="table zebra-table" style="border-collapse: separate; border-spacing: 0; border-radius: 20px; overflow: hidden;"

                        >
                            <thead>
                                  <tr>
      <th><i class="bi bi-list-ol"></i> No</th>
<th><i class="bi bi-file-earmark-text"></i> Jenis Pengajuan</th>
<th><i class="bi bi-person"></i> Dinas </th>
<th><i class="bi bi-person"></i> Konsultan </th>
<th><i class="bi bi-person"></i> Nama Paket </th>
<th><i class="bi bi-telephone"></i> Telepon</th>
<th><i class="bi bi-telephone"></i> No Surat </th>
<th><i class="bi bi-telephone"></i> No Surat Dinas</th>
<th><i class="bi bi-telephone"></i> Tanggal Surat </th>
<th><i class="bi bi-telephone"></i> Kategori Bangunan  </th>
<th><i class="bi bi-telephone"></i> Luas Bangunan  </th>
<th><i class="bi bi-telephone"></i> Luas Tanah  </th>
<th><i class="bi bi-telephone"></i> Jumlah Lantai  </th>
<th><i class="bi bi-telephone"></i> Tinggi Bangunan  </th>
<th><i class="bi bi-telephone"></i> Bassement  </th>
<th><i class="bi bi-telephone"></i> Kepemilikan  </th>
<th><i class="bi bi-telephone"></i> Tahun Pembangunan   </th>
<th><i class="bi bi-telephone"></i> Tahun Renovasi  </th>
<th><i class="bi bi-telephone"></i> Pengelola  </th>
<th><i class="bi bi-telephone"></i> Alamat Lokasi  </th>
<th><i class="bi bi-telephone"></i> RT  </th>
<th><i class="bi bi-telephone"></i> RW  </th>
<th><i class="bi bi-telephone"></i> Kabupaten  </th>
<th><i class="bi bi-telephone"></i> Kecamatan  </th>
<th><i class="bi bi-telephone"></i> Kelurahan </th>
            @can('superadmin')
            <th><i class="bi bi-tools"></i> Aksi</th>
            @endcan

    </tr>
                            </thead>
                              <tbody id="tableBody">
                                @forelse ($data as $item)

                                <tr class="align-middle">
                                 <td>{{ $loop->iteration }}</td>
            <td>{{ optional($item->jenispengajuanbantek)->jenispengajuan ?? '-' }}</td>
            <td>{{ $item->dinas->name ?? '-' }}</td>

            <td>{{ $item->bujkkonsultan->user->name ?? '-' }}</td>
            <td>{{ $item->namapaket ?? '-' }}</td>
            <td>{{ $item->no_telepon ?? '-' }}</td>
            <td>{{ $item->nosurat ?? '-' }}</td>
            <td>{{ $item->nosuratdinas ?? '-' }}</td>
            <td>{{ \Carbon\Carbon::parse($item->tanggalsurat)->format('d-m-Y') }}</td>
            <td>{{ $item->kategoribangunan ?? '-' }}</td>
            <td>{{ $item->luasbangunan ?? '-' }} M²</td>
            <td>{{ $item->luastanahtotal ?? '-' }} M²</td>
            <td>{{ $item->jumlahlantai ?? '-' }} Lantai </td>
            <td>{{ $item->tinggibangunan ?? '-' }} Meter</td>
            <td>{{ $item->bassement ? 'Ya' : 'Tidak' }}</td>
            <td>{{ $item->kepemilikan ?? '-' }}</td>
            <td>{{ $item->tahunpembangunan ?? '-' }}</td>
            <td>{{ $item->tahunrenovasi ?? '-' }}</td>
            <td>{{ $item->pengelola ?? '-' }}</td>
            <td>{{ $item->alamatlokasi ?? '-' }}</td>
            <td>{{ $item->rt ?? '-' }}</td>
            <td>{{ $item->rw ?? '-' }}</td>
            <td>{{ $item->kabupaten ?? '-' }}</td>
            <td>{{ optional($item->kecamatanblora)->kecamatanblora ?? '-' }}</td>
            <td>{{ optional($item->kelurahandesa)->desa ?? '-' }}</td>


@can('superadmin')

<td style="text-align: center; vertical-align: middle;">
    {{-- <a href="/bebujkkonstruksi/show/{{$item->namalengkap}}" class="btn btn-sm btn-info me-2" title="Show">
        <i class="bi bi-eye"></i>
    </a>
                                        <a href="/bebujkkonstruksi/update/{{$item->id}}" class="btn btn-sm btn-warning me-2" title="Update">
                                            <i class="bi bi-pencil-square"></i>
                                        </a> --}}
                                        <a href="javascript:void(0)" class="button-merah" title="Delete"
                                        data-bs-toggle="modal" data-bs-target="#deleteModal"
                                        data-judul="{{ $item->id }}"
                                           onclick="setDeleteUrl(this)">
                                           <i class="bi bi-trash"></i>
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



                                {{-- @endforeach --}}
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


