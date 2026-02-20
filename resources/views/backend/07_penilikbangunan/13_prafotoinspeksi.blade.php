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





                     <div style="display: flex; justify-content: flex-end; margin-bottom: 5px;">
<!-- Tombol Tambah Foto -->
<button
    type="button"
    class="button-berkas"
    style="cursor: pointer; margin-left:10px; color:black; display: inline-flex; align-items: center;"
    onclick="openUploadModal()"
>
    <i class="bi bi-plus-circle" style="margin-right: 5px;"></i> Tambah Foto
</button>

<!-- Modal Upload Foto -->
<div id="uploadModal" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 20px 30px; border-radius: 12px; max-width: 400px; width: 90%; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
        <h6 style="font-family: 'Poppins', sans-serif; margin-bottom: 15px; color: navy;">Upload Gambar atau PDF</h6>

        <form id="uploadForm" action="{{ route('dokpenilikpascafotoupload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="pascapenilikdok_id" value="{{ $prapenilikdok->id }}">

            <div class="mb-3">
                <input
                    type="file"
                    name="foto"
                    id="foto"
                    accept="image/*,application/pdf"
                    required
                    onchange="previewFile()"
                    class="form-control @error('foto') is-invalid @enderror"
                />
                @error('foto')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- Preview -->
            <div id="previewContainer" style="margin-top: 10px; display: none;">
                <img id="imagePreview" src="#" alt="Preview" style="max-width: 100%; height: auto; display: none; border: 1px solid #ccc; border-radius: 6px;" />
                <p id="pdfInfo" style="font-size: 13px; color: #333;"></p>
            </div>

            <div style="display: flex; justify-content: flex-end; gap: 10px; margin-top: 15px;">
                <button type="button" onclick="closeUploadModal()" style="background-color: #EF4444; color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer;">
                    Batal
                </button>
                <button type="submit" style="background-color: #10B981; color: white; padding: 8px 16px; border-radius: 8px; border: none;">
                    <i class="bi bi-upload" style="margin-right: 5px;"></i> Upload
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Script -->
<script>
function openUploadModal() {
    document.getElementById('uploadModal').style.display = 'flex';
}

function closeUploadModal() {
    document.getElementById('uploadModal').style.display = 'none';
    document.getElementById('previewContainer').style.display = 'none';
    document.getElementById('imagePreview').src = '#';
    document.getElementById('pdfInfo').innerText = '';
}

function previewFile() {
    const file = document.getElementById('foto').files[0];
    const previewContainer = document.getElementById('previewContainer');
    const imagePreview = document.getElementById('imagePreview');
    const pdfInfo = document.getElementById('pdfInfo');

    previewContainer.style.display = 'block';

    if (file && file.type.startsWith('image/')) {
        const reader = new FileReader();
        reader.onload = function(e) {
            imagePreview.src = e.target.result;
            imagePreview.style.display = 'block';
            pdfInfo.innerText = '';
        };
        reader.readAsDataURL(file);
    } else if (file && file.type === 'application/pdf') {
        imagePreview.style.display = 'none';
        pdfInfo.innerText = 'File PDF terpilih: ' + file.name;
    } else {
        imagePreview.style.display = 'none';
        pdfInfo.innerText = 'Format tidak dikenali';
    }
}
</script>

                       <button
    class="button-newvalidasi"
    type="button"
    onclick="window.location.href='{{ route('dataallpenilikbg.index') }}';"
    style="cursor: pointer; margin-left:10px; color:black; display: inline-flex; align-items: center;"
>
    <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
</button>




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
                    <div class="col-md-12">
                        <!--begin::Quick Example-->
<div class="row">
    @forelse ($data as $item)
        <div class="col-6 col-md-3 text-center">
            <div class="foto-box mb-3">
                @if (Str::endsWith(strtolower($item->foto), ['.jpg', '.jpeg', '.png', '.gif', '.svg']))
                    <img src="{{ asset($item->foto) }}" alt="Foto Dokumentasi" class="foto-item" style="max-width: 100%; border-radius: 6px;" />
                @elseif (Str::endsWith(strtolower($item->foto), '.pdf'))
                    <iframe src="{{ asset($item->foto) }}" width="100%" height="400px" style="border: 1px solid #ccc; border-radius: 6px;"></iframe>
                @else
                    <div class="text-danger">Format tidak dikenali</div>
                @endif
            </div>

            <form action="{{ url('/fotopascadelete/' . $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus file ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="button-merah">
                    <i class="bi bi-trash"></i> Hapus
                </button>
            </form>
        </div>
    @empty
        <div style="width: 100%; display: flex; justify-content: center; align-items: center; padding: 30px; font-weight: 600; font-family: 'Poppins', sans-serif; color: #6c757d; background-color: #f8f9fa; border: 2px dashed #ced4da; border-radius: 12px; font-size: 16px; animation: fadeIn 0.5s ease-in-out; margin-top: 1rem;">
            <i class="bi bi-folder-x" style="margin-right: 8px; font-size: 20px; color: #dc3545;"></i>
            Data Tidak Ditemukan !!
        </div>
    @endforelse
</div>

<style>
.foto-box {
    width: 100%;
    aspect-ratio: 1 / 1;
    overflow: hidden;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    margin-bottom: 1rem;
}

.foto-item {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>


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
