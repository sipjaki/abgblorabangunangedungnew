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





                     <div style="display: flex; justify-content: flex-end; margin-bottom: 5px;">
<button class="button-modern" type="button"
    onclick="window.location.href='{{ url('/bepbgslfinformasi') }}';"
    style="cursor: pointer; margin-left:10px; color:black;">
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
<form action="{{ route('beslffungsiusahaupdatenew', $data->id) }}"
{{-- action="{{ route('bepbghunianupdatenew', $data->id) }}"  --}}
method="POST" enctype="multipart/form-data">
    @csrf

    <!-- begin::Body -->
    <div class="card-body">

        <!-- ================= BAGIAN INFORMASI UTAMA ================= -->
        <div class="row">
            {{-- Judul --}}
            <div class="form-modern col-md-6">
                <div class="mb-3">
                    <label class="form-label-modern" for="judul">
                        <i class="bi bi-type me-2 text-primary"></i> Judul
                    </label>
                    <input type="text" id="judul" name="judul"
                           value="{{ old('judul', $data->judul ?? '') }}"
                           class="form-control @error('judul') is-invalid @enderror"
                           placeholder="Masukkan Judul" maxlength="255" />
                    @error('judul') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            {{-- Keterangan --}}
            <div class="form-modern col-md-6">
                <div class="mb-3">
                    <label class="form-label-modern" for="keterangan">
                        <i class="bi bi-card-text me-2 text-primary"></i> Keterangan
                    </label>
                    <textarea id="keterangan" name="keterangan"
                              class="form-control @error('keterangan') is-invalid @enderror"
                              rows="5" maxlength="255" placeholder="Masukkan Keterangan">{{ old('keterangan', $data->keterangan ?? '') }}</textarea>
                    @error('keterangan') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>

            {{-- Info Lanjut --}}
            <div class="form-modern col-md-12">
                <div class="mb-3">
                    <label class="form-label-modern" for="infolanjut">
                        <i class="bi bi-info-circle me-2 text-primary"></i> Info Lanjut
                    </label>
                    <textarea id="infolanjut" name="infolanjut"
                              class="form-control @error('infolanjut') is-invalid @enderror"
                              rows="5" maxlength="255" placeholder="Masukkan Info Tambahan">{{ old('infolanjut', $data->infolanjut ?? '') }}</textarea>
                    @error('infolanjut') <div class="invalid-feedback">{{ $message }}</div> @enderror
                </div>
            </div>
        </div>

        <!-- ================= BAGIAN PARAGRAF CADANGAN ================= -->
        <div class="row">
            @for ($i = 1; $i <= 7; $i++)
                <div class="form-modern col-md-6">
                    <div class="mb-3">
                        <label class="form-label-modern" for="cadangan{{ $i }}">
                            <i class="bi bi-file-text me-2 text-primary"></i> Paragraf {{ $i }}
                        </label>
                        <textarea id="cadangan{{ $i }}" name="cadangan{{ $i }}"
                                  class="form-control @error('cadangan'.$i) is-invalid @enderror"
                                  rows="5" maxlength="255"
                                  placeholder="Masukkan Paragraf {{ $i }}">{{ old('cadangan'.$i, $data->{'cadangan'.$i} ?? '') }}</textarea>
                        @error('cadangan'.$i) <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            @endfor
        </div>

        <!-- ================= SECTION UPLOAD ================= -->
        <div class="text-center my-4">
            <hr class="my-3" style="border-top: 2px dashed #0d6efd; width: 60%; margin: auto;">
            <h5 class="text-primary fw-bold mt-2" style="font-size:16px;">
                <i class="bi bi-upload me-2"></i> Upload Informasi PBG Fungsi Campuran
            </h5>
            <hr class="my-3" style="border-top: 2px dashed #0d6efd; width: 60%; margin: auto;">
        </div>

        <div class="row">
            {{-- Contoh Berkas 4 --}}
            <div class="form-modern col-md-6 mb-3">
                <label class="form-label-modern" for="berkas">
                    <i class="bi bi-file-earmark-pdf text-danger me-2"></i> Upload Berkas | Maksimal 15 MB (PDF/Gambar)
                </label>
                <input type="file" id="berkas" name="berkas"
                       accept="application/pdf,image/*"
                       class="form-control @error('berkas') is-invalid @enderror"
                       onchange="previewMixedFile(event, 'previewContainerB4', 'previewB4', 'msgB4')" />
                @error('berkas') <div class="invalid-feedback">{{ $message }}</div> @enderror

                <!-- Preview Lama -->
                <div class="mt-3" id="previewContainerB4" style="{{ isset($data->berkas) ? '' : 'display: none;' }}">
                    <label class="fw-bold">Data Sebelumnya:</label>
                    @php $ext4 = pathinfo($data->berkas ?? '', PATHINFO_EXTENSION); @endphp
                    @if (in_array(strtolower($ext4), ['jpg','jpeg','png','webp']))
                        <img src="{{ asset($data->berkas) }}" alt="Berkas 4 Lama"
                             style="max-width: 100%; border: 1px solid #ccc; border-radius: 6px;">
                    @elseif (strtolower($ext4) === 'pdf')
                        <iframe src="{{ asset($data->berkas) }}"
                                style="width: 100%; height: 400px; border: 1px solid #ccc; border-radius: 6px;"></iframe>
                    @endif
                </div>

                <!-- Pesan -->
                <div id="msgB4" class="mt-2 text-muted fst-italic" style="{{ isset($data->berkas) ? 'display:none;' : '' }}">
                    Data belum di update. Silahkan upload berkas 4.
                </div>

                <!-- Preview Baru -->
                <div class="mt-3" id="previewB4" style="display: none;"></div>
            </div>
        </div>

        <!-- ================= TOMBOL SIMPAN ================= -->
        <div class="d-flex justify-content-end mt-4">
            <button class="button-berkas" type="button" onclick="openModal()">
                <i class="bi bi-arrow-repeat me-2"></i>
                <span style="font-family: 'Poppins', sans-serif;">Perbaikan Data ?</span>
            </button>
        </div>
    </div>
    <!-- end::Body -->

    <!-- Modal Konfirmasi -->
    <div id="confirmModal" style="display: none; position: fixed; inset: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
        <div style="background: white; padding: 24px 30px; border-radius: 12px; max-width: 400px; width: 90%; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
            <p class="fw-semibold mb-4" style="font-size: 16px;">Apakah Anda ingin memperbaiki informasi ini ?</p>

            <div class="d-flex justify-content-center gap-3">
                <!-- Tombol Ya -->
                <button id="confirmSubmitBtn" onclick="submitForm()"
                        style="background-color: #10B981; color: white; padding: 8px 16px; border-radius: 8px; border: none; transition: 0.3s; display: flex; align-items: center; gap: 6px;">
                    <i class="bi bi-check-circle me-1"></i> Ya
                </button>

                <!-- Tombol Batal -->
                <button type="button" onclick="closeModal()"
                        style="background-color: #EF4444; color: white; padding: 8px 16px; border-radius: 8px; border: none; transition: 0.3s; display: flex; align-items: center; gap: 6px;">
                    <i class="bi bi-x-circle me-1"></i> Batal
                </button>
            </div>
        </div>
    </div>
</form>

<script>
function openModal() {
    document.getElementById("confirmModal").style.display = "flex";
}
function closeModal() {
    document.getElementById("confirmModal").style.display = "none";
}
function submitForm() {
    document.querySelector('form').submit();
}
</script>

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
yy
