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

@include('frontend.abgblora.01_pbgslf.00_informasi.backendfiturmenupbg')

<br>
                @foreach ($data as $item)
<div style="display: flex; justify-content: flex-end; margin-bottom: 5px;">
    <a href="{{ route('beslffungsiusahaupdate', ['id' => $item->id]) }}"
    {{-- href="{{ route('bepbgkeagamaanupdate', ['id' => $item->id]) }}" --}}
    {{-- href="{{ route('bepbghunianupdate', ['id' => $item->id]) }}" --}}
    class="button-berkas" style="text-decoration: none;">
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
      <i class="bi bi-info-circle me-2"></i> {{ $title }}
    </div>

      <div class="form-modern mb-3">
        <label class="form-label-modern fw-bold d-block mb-2">
          <i class="bi bi-file-earmark-image text-success me-1"></i> Poster Gambar
        </label>
        @php
          $ext = strtolower(pathinfo($item->berkas ?? '', PATHINFO_EXTENSION));
          $filePath = $item->berkas && file_exists(public_path('storage/' . $item->berkas))
                      ? asset('storage/' . $item->berkas)
                      : ($item->berkas ? asset($item->berkas) : null);
        @endphp

        @if ($filePath)
          @if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp']))
            <img src="{{ $filePath }}" alt="Poster Gambar" class="img-fluid rounded border" style="max-height: 300px; object-fit: contain;">
          @else
            <iframe src="{{ $filePath }}" width="100%" height="300px" class="border rounded"></iframe>
          @endif
        @else
          <div class="form-control bg-light">Belum diunggah</div>
        @endif
      </div>
<div class="card-body">
  {{-- Row 1: Judul & Keterangan --}}
  <div class="row">
    <div class="col-md-6 form-modern mb-3">
      <label class="form-label-modern fw-bold">
        <i class="bi bi-card-heading text-primary me-1"></i> Judul
      </label>
      <div class="p-2 bg-light border rounded" style="min-height:120px; white-space:pre-line;">
        {!! nl2br(e($item->judul ?? '-')) !!}
      </div>
    </div>

    <div class="col-md-6 form-modern mb-3">
      <label class="form-label-modern fw-bold">
        <i class="bi bi-info-circle text-warning me-1"></i> Keterangan
      </label>
      <div class="p-2 bg-light border rounded" style="min-height:120px; white-space:pre-line;">
        {!! nl2br(e($item->keterangan ?? '-')) !!}
      </div>
    </div>
  </div>

  {{-- Row 2: Info Lanjut & Paragraf 1 --}}
  <div class="row">
    <div class="col-md-6 form-modern mb-3">
      <label class="form-label-modern fw-bold">
        <i class="bi bi-link-45deg text-info me-1"></i> Info Lanjut
      </label>
      <div class="p-2 bg-light border rounded" style="min-height:120px; white-space:pre-line;">
        {!! nl2br(e($item->infolanjut ?? '-')) !!}
      </div>
    </div>

    <div class="col-md-6 form-modern mb-3">
      <label class="form-label-modern fw-bold">
        <i class="bi bi-file-text text-secondary me-1"></i> Paragraf 1
      </label>
      <div class="p-2 bg-light border rounded" style="min-height:120px; white-space:pre-line;">
        {!! nl2br(e($item->cadangan1 ?? '-')) !!}
      </div>
    </div>
  </div>

  {{-- Row 3: Paragraf 2 & Paragraf 3 --}}
  <div class="row">
    <div class="col-md-6 form-modern mb-3">
      <label class="form-label-modern fw-bold">Paragraf 2</label>
      <div class="p-2 bg-light border rounded" style="min-height:120px; white-space:pre-line;">
        {!! nl2br(e($item->cadangan2 ?? '-')) !!}
      </div>
    </div>

    <div class="col-md-6 form-modern mb-3">
      <label class="form-label-modern fw-bold">Paragraf 3</label>
      <div class="p-2 bg-light border rounded" style="min-height:120px; white-space:pre-line;">
        {!! nl2br(e($item->cadangan3 ?? '-')) !!}
      </div>
    </div>
  </div>

  {{-- Row 4: Paragraf 4 & Paragraf 5 --}}
  <div class="row">
    <div class="col-md-6 form-modern mb-3">
      <label class="form-label-modern fw-bold">Paragraf 4</label>
      <div class="p-2 bg-light border rounded" style="min-height:120px; white-space:pre-line;">
        {!! nl2br(e($item->cadangan4 ?? '-')) !!}
      </div>
    </div>

    <div class="col-md-6 form-modern mb-3">
      <label class="form-label-modern fw-bold">Paragraf 5</label>
      <div class="p-2 bg-light border rounded" style="min-height:120px; white-space:pre-line;">
        {!! nl2br(e($item->cadangan5 ?? '-')) !!}
      </div>
    </div>
  </div>

  {{-- Row 5: Paragraf 6 & Paragraf 7 --}}
  <div class="row">
    <div class="col-md-6 form-modern mb-3">
      <label class="form-label-modern fw-bold">Paragraf 6</label>
      <div class="p-2 bg-light border rounded" style="min-height:120px; white-space:pre-line;">
        {!! nl2br(e($item->cadangan6 ?? '-')) !!}
      </div>
    </div>

    <div class="col-md-6 form-modern mb-3">
      <label class="form-label-modern fw-bold">Paragraf 7</label>
      <div class="p-2 bg-light border rounded" style="min-height:120px; white-space:pre-line;">
        {!! nl2br(e($item->cadangan7 ?? '-')) !!}
      </div>
    </div>
  </div>
</div>


  </div>
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
