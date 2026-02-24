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


                @foreach ($data as $item)
<div style="display: flex; justify-content: flex-end; margin-bottom: 5px;">
    <a href="{{ route('mbrgambarupdate', ['id' => $item->id]) }}" class="button-berkas" style="text-decoration: none;">
        <i class="bi bi-arrow-repeat"></i> Update
    </a>
</div>
@endforeach
                    </div>

                 <hr>
                 <!-- /.card-header -->
        @foreach ($data as $item)
  <div class="card mb-4 shadow-sm">
    <div class="card-header bg-primary text-white">
      <i class="bi bi-info-circle me-2"></i> Detail Data Berkas (ID: {{ $item->id }})
    </div>

    <div class="card-body">

      {{-- Row Judul --}}
      <div class="row">
        <div class="col-md-6 form-modern mb-3">
          <label class="form-label-modern fw-bold">
            <i class="bi bi-card-heading text-primary me-1"></i> Judul 1
          </label>
          <div class="form-control bg-light">{{ $item->judul1 ?? '-' }}</div>
        </div>
        <div class="col-md-6 form-modern mb-3">
          <label class="form-label-modern fw-bold">
            <i class="bi bi-card-text text-primary me-1"></i> Judul 2
          </label>
          <div class="form-control bg-light">{{ $item->judul2 ?? '-' }}</div>
        </div>
      </div>

      {{-- Row Berkas 1 & 2 --}}
      <div class="row">
        {{-- Berkas 1 --}}
        <div class="col-md-6 mb-4">
          <label class="form-label-modern fw-bold">
            <i class="bi bi-file-earmark-image text-success me-1"></i> Berkas 1
          </label>
          @php
            $ext1 = strtolower(pathinfo($item->berkas1 ?? '', PATHINFO_EXTENSION));
            $path1 = $item->berkas1 && file_exists(public_path('storage/' . $item->berkas1))
                      ? asset('storage/' . $item->berkas1)
                      : ($item->berkas1 ? asset($item->berkas1) : null);
          @endphp
          @if ($path1)
            @if (in_array($ext1, ['jpg', 'jpeg', 'png', 'webp']))
              <img src="{{ $path1 }}" alt="Preview Berkas 1" class="img-fluid rounded border" style="max-height: 250px; object-fit: contain;">
            @else
              <iframe src="{{ $path1 }}" width="100%" height="300px" class="border rounded"></iframe>
            @endif
          @else
            <div class="form-control bg-light">Belum diunggah</div>
          @endif
        </div>

        {{-- Berkas 2 --}}
        <div class="col-md-6 mb-4">
          <label class="form-label-modern fw-bold">
            <i class="bi bi-file-earmark-image text-success me-1"></i> Berkas 2
          </label>
          @php
            $ext2 = strtolower(pathinfo($item->berkas2 ?? '', PATHINFO_EXTENSION));
            $path2 = $item->berkas2 && file_exists(public_path('storage/' . $item->berkas2))
                      ? asset('storage/' . $item->berkas2)
                      : ($item->berkas2 ? asset($item->berkas2) : null);
          @endphp
          @if ($path2)
            @if (in_array($ext2, ['jpg', 'jpeg', 'png', 'webp']))
              <img src="{{ $path2 }}" alt="Preview Berkas 2" class="img-fluid rounded border" style="max-height: 250px; object-fit: contain;">
            @else
              <iframe src="{{ $path2 }}" width="100%" height="300px" class="border rounded"></iframe>
            @endif
          @else
            <div class="form-control bg-light">Belum diunggah</div>
          @endif
        </div>
      </div>

      {{-- Row Berkas 3 & 4 --}}
      <div class="row">
        {{-- Berkas 3 --}}
        <div class="col-md-6 mb-4">
          <label class="form-label-modern fw-bold">
            <i class="bi bi-file-earmark-image text-success me-1"></i> Berkas 3
          </label>
          @php
            $ext3 = strtolower(pathinfo($item->berkas3 ?? '', PATHINFO_EXTENSION));
            $path3 = $item->berkas3 && file_exists(public_path('storage/' . $item->berkas3))
                      ? asset('storage/' . $item->berkas3)
                      : ($item->berkas3 ? asset($item->berkas3) : null);
          @endphp
          @if ($path3)
            @if (in_array($ext3, ['jpg', 'jpeg', 'png', 'webp']))
              <img src="{{ $path3 }}" alt="Preview Berkas 3" class="img-fluid rounded border" style="max-height: 250px; object-fit: contain;">
            @else
              <iframe src="{{ $path3 }}" width="100%" height="300px" class="border rounded"></iframe>
            @endif
          @else
            <div class="form-control bg-light">Belum diunggah</div>
          @endif
        </div>

        {{-- Berkas 4 --}}
        <div class="col-md-6 mb-4">
          <label class="form-label-modern fw-bold">
            <i class="bi bi-file-earmark-image text-success me-1"></i> Berkas 4
          </label>
          @php
            $ext4 = strtolower(pathinfo($item->berkas4 ?? '', PATHINFO_EXTENSION));
            $path4 = $item->berkas4 && file_exists(public_path('storage/' . $item->berkas4))
                      ? asset('storage/' . $item->berkas4)
                      : ($item->berkas4 ? asset($item->berkas4) : null);
          @endphp
          @if ($path4)
            @if (in_array($ext4, ['jpg', 'jpeg', 'png', 'webp']))
              <img src="{{ $path4 }}" alt="Preview Berkas 4" class="img-fluid rounded border" style="max-height: 250px; object-fit: contain;">
            @else
              <iframe src="{{ $path4 }}" width="100%" height="300px" class="border rounded"></iframe>
            @endif
          @else
            <div class="form-control bg-light">Belum diunggah</div>
          @endif
        </div>
      </div>

    </div>
  </div>
  @break
@endforeach

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
                     var deleteUrl = "/datakecbloradelete/" + encodeURIComponent(id);
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
