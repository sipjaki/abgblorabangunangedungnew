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

<button class="button-newvalidasi" type="button"
    onclick="window.location.href='{{ url()->previous() }}';"
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
                  <form action="{{ route('beagendapelatihanabgcreatenew') }}" method="POST" enctype="multipart/form-data">
          @csrf
                            <!-- begin::Body -->
                            <div class="card-body">


    {{-- <input type="hidden" name="user_id" value="{{ $user->id }}"> --}}
<input type="hidden" name="user_id" value="{{ $user->id }}">

    <div class="row">
        {{-- Kategori --}}
        <div class="mb-3 col-md-6">
            <label class="form-label" for="kategoripelatihan_id">
                <i class="bi bi-tags text-primary me-1"></i> Kategori Pelatihan
            </label>
            <select id="kategoripelatihan_id" name="kategoripelatihan_id" class="form-select @error('kategoripelatihan_id') is-invalid @enderror">
                <option value="">-- Pilih Kategori --</option>
                @foreach ($kategori as $item)
                    <option value="{{ $item->id }}" {{ old('kategoripelatihan_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->kategoripelatihan }}
                    </option>
                @endforeach
            </select>
            @error('kategoripelatihan_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Nama Kegiatan --}}
        <div class="mb-3 col-md-6">
            <label class="form-label" for="namakegiatan">
                <i class="bi bi-pencil-square text-primary me-1"></i> Nama Kegiatan
            </label>
            <input type="text" name="namakegiatan" class="form-control @error('namakegiatan') is-invalid @enderror" placeholder="Masukkan nama kegiatan" value="{{ old('namakegiatan') }}">
            @error('namakegiatan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Penutupan --}}
        <div class="mb-3 col-md-6">
            <label class="form-label" for="penutupan">
                <i class="bi bi-calendar-x text-primary me-1"></i> Tanggal Penutupan
            </label>
            <input type="date" name="penutupan" class="form-control @error('penutupan') is-invalid @enderror" value="{{ old('penutupan') }}">
            @error('penutupan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Waktu Pelaksanaan --}}
        <div class="mb-3 col-md-6">
            <label class="form-label" for="waktupelaksanaan">
                <i class="bi bi-calendar-event text-primary me-1"></i> Waktu Pelaksanaan
            </label>
            <input type="date" name="waktupelaksanaan" class="form-control @error('waktupelaksanaan') is-invalid @enderror" value="{{ old('waktupelaksanaan') }}">
            @error('waktupelaksanaan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Jumlah Peserta --}}
        <div class="mb-3 col-md-6">
            <label class="form-label" for="jumlahpeserta">
                <i class="bi bi-people-fill text-primary me-1"></i> Jumlah Peserta
            </label>
            <input type="number" name="jumlahpeserta" class="form-control @error('jumlahpeserta') is-invalid @enderror" placeholder="Masukkan jumlah peserta" value="{{ old('jumlahpeserta') }}">
            @error('jumlahpeserta')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Lokasi --}}
        <div class="mb-3 col-md-6">
            <label class="form-label" for="lokasi">
                <i class="bi bi-geo-alt text-primary me-1"></i> Lokasi
            </label>
            <input type="text" name="lokasi" class="form-control @error('lokasi') is-invalid @enderror" placeholder="Masukkan lokasi kegiatan" value="{{ old('lokasi') }}">
            @error('lokasi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Keterangan --}}
        <div class="mb-3 col-md-6">
            <label class="form-label" for="keterangan">
                <i class="bi bi-info-circle text-primary me-1"></i> Keterangan
            </label>
            <input type="text" name="keterangan" class="form-control @error('keterangan') is-invalid @enderror" placeholder="Tambahan keterangan" value="{{ old('keterangan') }}">
            @error('keterangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Barcode Pelatihan --}}
        <div class="mb-3 col-md-6">
            <label class="form-label" for="barcodepelatihan">
                <i class="bi bi-upc text-primary me-1"></i> Barcode Pelatihan
            </label>
            <input type="text" name="barcodepelatihan" class="form-control @error('barcodepelatihan') is-invalid @enderror" value="{{ old('barcodepelatihan') }}">
            @error('barcodepelatihan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Isi Agenda --}}
        <div class="mb-3 col-md-12">
            <label class="form-label" for="isiagenda">
                <i class="bi bi-file-earmark-text text-primary me-1"></i> Isi Agenda
            </label>
            <textarea name="isiagenda" rows="4" class="form-control @error('isiagenda') is-invalid @enderror" placeholder="Tulis detail agenda">{{ old('isiagenda') }}</textarea>
            @error('isiagenda')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Upload Foto --}}
{{-- Upload Poster / Gambar --}}
<div class="mb-3 col-md-6">
    <label class="form-label" for="foto">
        <i class="bi bi-image text-primary me-1"></i> Upload Poster / Gambar
    </label>
    <input type="file" name="foto" id="foto" class="form-control @error('foto') is-invalid @enderror" accept="image/*" onchange="previewFoto(event)">
    @error('foto')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    {{-- Preview Gambar --}}
    <div class="mt-2">
        @if (!empty($data->foto))
            <img id="preview-foto" src="{{ asset('storage/' . $data->foto) }}" style="max-height: 200px;" class="img-fluid border rounded">
        @else
            <img id="preview-foto" style="display:none; max-height:200px;" class="img-fluid border rounded">
        @endif
    </div>
</div>

{{-- Upload Surat Undangan (PDF) --}}
<div class="mb-3 col-md-6">
    <label class="form-label" for="suratundangan">
        <i class="bi bi-file-earmark-pdf text-primary me-1"></i> Upload Surat Undangan (PDF)/ * Jika Ada
    </label>
    <input type="file" name="suratundangan" id="suratundangan" class="form-control @error('suratundangan') is-invalid @enderror" accept=".pdf" onchange="previewPDF(event)">
    @error('suratundangan')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror

    {{-- Preview PDF --}}
    <div class="mt-2">
        @if (!empty($data->suratundangan))
            <iframe id="preview-pdf" src="{{ asset('storage/' . $data->suratundangan) }}" style="width:100%; height:200px;" frameborder="0"></iframe>
        @else
            <iframe id="preview-pdf" style="display:none; width:100%; height:200px;" frameborder="0"></iframe>
        @endif
    </div>
</div>

<script>
    function previewFoto(event) {
        const input = event.target;
        const preview = document.getElementById('preview-foto');
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                preview.src = e.target.result;
                preview.style.display = 'block';
            };
            reader.readAsDataURL(input.files[0]);
        }
    }

    function previewPDF(event) {
        const input = event.target;
        const preview = document.getElementById('preview-pdf');
        if (input.files && input.files[0]) {
            const fileURL = URL.createObjectURL(input.files[0]);
            preview.src = fileURL;
            preview.style.display = 'block';
        }
    }
</script>

</div>


                  <!-- End row -->
                            </div>
                            <!-- end::Body -->

                            <div style="display: flex; justify-content: flex-end; margin-bottom:20px;">
                                <div class="flex justify-end">
                               <button class="button-baru" type="button" onclick="openModal()">
                                    <i class="bi bi-save" style="margin-right: 5px;"></i>
                                    <span style="font-family: 'Poppins', sans-serif;">Simpan</span>
                                    </button>

                                </div>
                                <!-- Modal Konfirmasi -->
                                <div id="confirmModal" style="display: none; position: fixed; inset: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
                                    <div style="background: white; padding: 24px 30px; border-radius: 12px; max-width: 400px; width: 90%; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
                                      <p style="font-size: 16px; font-weight: 600; margin-bottom: 20px;">
                                        Apakah Anda ingin menambahkan konsultan bantek ?
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
