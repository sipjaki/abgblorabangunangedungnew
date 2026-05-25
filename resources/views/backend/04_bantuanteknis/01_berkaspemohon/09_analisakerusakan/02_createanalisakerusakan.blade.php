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

{{-- <button class="button-kembali" type="button"
    onclick="window.location.href='{{ url()->previous() }}';"
    style="cursor: pointer; margin-left:10px; color:black;">
    <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
</button> --}}



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
                  {{-- <form action="{{ route('datanewpeniliknew.create') }}" method="POST" enctype="multipart/form-data"> --}}
                  {{-- <form action="{{ route('bantekpembongkarannew') }}" method="POST" enctype="multipart/form-data"> --}}
    <form action="{{ url('/bebantekanalisakerusakan/createbaru') }}" method="POST" enctype="multipart/form-data">
            @csrf
                            <div class="card-body">
                                <div class="row">

                                    <!-- Judul -->
                                    <h5 class="mt-4 mb-3 fw-bold text-primary d-flex align-items-center"
                                        style="font-size:16px; border-left: 4px solid #0d6efd; padding-left: 14px; background-color: #f0f8ff; border-radius: 6px; height: 45px;">
                                        <i class="bi bi-building-fill me-3" style="font-size: 18px;"></i>
                                        Data Informasi Gedung
                                    </h5>

                                   <div class="col-md-12">
                                        <div class="form-modern mb-3">

                                            <label class="form-label-modern" for="catatan1">
                                                <i class="bi bi-bank2 me-2 text-primary"></i>
                                                Nama Dinas
                                            </label>

                                            <select
                                                class="form-select @error('catatan1') is-invalid @enderror"
                                                id="catatan1"
                                                name="catatan1">

                                                <option value="">-- Pilih Nama Dinas --</option>

                                                <option value="BADAN KEPEGAWAIAN DAERAH"
                                                    {{ old('catatan1') == 'BADAN KEPEGAWAIAN DAERAH' ? 'selected' : '' }}>
                                                    BADAN KEPEGAWAIAN DAERAH
                                                </option>

                                                <option value="BADAN PERENCANAAN PEMBANGUNAN DAERAH"
                                                    {{ old('catatan1') == 'BADAN PERENCANAAN PEMBANGUNAN DAERAH' ? 'selected' : '' }}>
                                                    BADAN PERENCANAAN PEMBANGUNAN DAERAH
                                                </option>

                                                <option value="DINAS KEPEMUDAAN, OLAH RAGA, KEBUDAYAAN DAN PARIWISATA"
                                                    {{ old('catatan1') == 'DINAS KEPEMUDAAN, OLAH RAGA, KEBUDAYAAN DAN PARIWISATA' ? 'selected' : '' }}>
                                                    DINAS KEPEMUDAAN, OLAH RAGA, KEBUDAYAAN DAN PARIWISATA
                                                </option>

                                                <option value="DINAS KESEHATAN"
                                                    {{ old('catatan1') == 'DINAS KESEHATAN' ? 'selected' : '' }}>
                                                    DINAS KESEHATAN
                                                </option>

                                                <option value="DINAS KOMUNIKASI DAN INFORMATIKA"
                                                    {{ old('catatan1') == 'DINAS KOMUNIKASI DAN INFORMATIKA' ? 'selected' : '' }}>
                                                    DINAS KOMUNIKASI DAN INFORMATIKA
                                                </option>

                                                <option value="DINAS LINGKUNGAN HIDUP"
                                                    {{ old('catatan1') == 'DINAS LINGKUNGAN HIDUP' ? 'selected' : '' }}>
                                                    DINAS LINGKUNGAN HIDUP
                                                </option>

                                                <option value="DINAS PANGAN, PERTANIAN, PETERNAKAN, DAN PERIKANAN"
                                                    {{ old('catatan1') == 'DINAS PANGAN, PERTANIAN, PETERNAKAN, DAN PERIKANAN' ? 'selected' : '' }}>
                                                    DINAS PANGAN, PERTANIAN, PETERNAKAN, DAN PERIKANAN
                                                </option>

                                                <option value="DINAS PEKERJAAN UMUM DAN PENATAAN RUANG KABUPATEN BLORA"
                                                    {{ old('catatan1') == 'DINAS PEKERJAAN UMUM DAN PENATAAN RUANG KABUPATEN BLORA' ? 'selected' : '' }}>
                                                    DINAS PEKERJAAN UMUM DAN PENATAAN RUANG KABUPATEN BLORA
                                                </option>

                                                <option value="DINAS PENDIDIKAN"
                                                    {{ old('catatan1') == 'DINAS PENDIDIKAN' ? 'selected' : '' }}>
                                                    DINAS PENDIDIKAN
                                                </option>

                                                <option value="DINAS PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA"
                                                    {{ old('catatan1') == 'DINAS PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA' ? 'selected' : '' }}>
                                                    DINAS PENGENDALIAN PENDUDUK DAN KELUARGA BERENCANA
                                                </option>

                                                <option value="DINAS PERDAGANGAN, KOPERASI USAHA KECIL DAN MENENGAH"
                                                    {{ old('catatan1') == 'DINAS PERDAGANGAN, KOPERASI USAHA KECIL DAN MENENGAH' ? 'selected' : '' }}>
                                                    DINAS PERDAGANGAN, KOPERASI USAHA KECIL DAN MENENGAH
                                                </option>

                                                <option value="DINAS PERINDUSTRIAN DAN TENAGA KERJA"
                                                    {{ old('catatan1') == 'DINAS PERINDUSTRIAN DAN TENAGA KERJA' ? 'selected' : '' }}>
                                                    DINAS PERINDUSTRIAN DAN TENAGA KERJA
                                                </option>

                                                <option value="DINAS PERUMAHAN PEMUKIMAN DAN PERHUBUNGAN"
                                                    {{ old('catatan1') == 'DINAS PERUMAHAN PEMUKIMAN DAN PERHUBUNGAN' ? 'selected' : '' }}>
                                                    DINAS PERUMAHAN PEMUKIMAN DAN PERHUBUNGAN
                                                </option>

                                                <option value="DINAS SOSIAL PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK"
                                                    {{ old('catatan1') == 'DINAS SOSIAL PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK' ? 'selected' : '' }}>
                                                    DINAS SOSIAL PEMBERDAYAAN PEREMPUAN DAN PERLINDUNGAN ANAK
                                                </option>

                                                <option value="SEKRETARIAT DAERAH"
                                                    {{ old('catatan1') == 'SEKRETARIAT DAERAH' ? 'selected' : '' }}>
                                                    SEKRETARIAT DAERAH
                                                </option>

                                                <option value="SEKRETARIAT DEWAN"
                                                    {{ old('catatan1') == 'SEKRETARIAT DEWAN' ? 'selected' : '' }}>
                                                    SEKRETARIAT DEWAN
                                                </option>

                                            </select>

                                            @error('catatan1')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror

                                        </div>
                                    </div>
                                    {{-- NAMA GEDUNG --}}
                                    <div class="col-md-6">
                                        <div class="form-modern mb-3">
                                            <label class="form-label-modern" for="cadangan1">
                                                <i class="bi bi-building me-2 text-success"></i>
                                                Nama Gedung
                                            </label>

                                            <input type="text"
                                                class="form-control @error('cadangan1') is-invalid @enderror"
                                                id="cadangan1"
                                                name="cadangan1"
                                                value="{{ old('cadangan1') }}">

                                            @error('cadangan1')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- KODE BARANG --}}
                                    <div class="col-md-6">
                                        <div class="form-modern mb-3">
                                            <label class="form-label-modern" for="cadangan2">
                                                <i class="bi bi-upc-scan me-2 text-dark"></i>
                                                Kode Barang
                                            </label>

                                            <input type="text"
                                                class="form-control @error('cadangan2') is-invalid @enderror"
                                                id="cadangan2"
                                                name="cadangan2"
                                                value="{{ old('cadangan2') }}">

                                            @error('cadangan2')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- ALAMAT --}}
                                    <div class="col-md-12">
                                        <div class="form-modern mb-3">
                                            <label class="form-label-modern" for="cadangan3">
                                                <i class="bi bi-geo-alt-fill me-2 text-danger"></i>
                                                Alamat
                                            </label>

                                            <textarea
                                                class="form-control @error('cadangan3') is-invalid @enderror"
                                                id="cadangan3"
                                                name="cadangan3"
                                                rows="3"
                                                placeholder="Masukkan alamat lengkap">{{ old('cadangan3') }}</textarea>

                                            @error('cadangan3')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- KABUPATEN / KOTA --}}
                                    <div class="col-md-4">
                                        <div class="form-modern mb-3">
                                            <label class="form-label-modern" for="cadangan4">
                                                <i class="bi bi-map-fill me-2 text-warning"></i>
                                                Kabupaten / Kota
                                            </label>

                                            <input type="text"
                                                class="form-control @error('cadangan4') is-invalid @enderror"
                                                id="cadangan4"
                                                name="cadangan4"
                                                value="{{ old('cadangan4') }}">

                                            @error('cadangan4')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- KOORDINAT --}}
                                    <div class="col-md-4">
                                        <div class="form-modern mb-3">
                                            <label class="form-label-modern" for="cadangan5">
                                                <i class="bi bi-crosshair2 me-2 text-info"></i>
                                                Koordinat
                                            </label>

                                            <input type="text"
                                                class="form-control @error('cadangan5') is-invalid @enderror"
                                                id="cadangan5"
                                                name="cadangan5"
                                                value="{{ old('cadangan5') }}"
                                                placeholder="-6.12345, 106.12345">

                                            @error('cadangan5')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- LUAS BANGUNAN --}}
                                    <div class="col-md-4">
                                        <div class="form-modern mb-3">
                                            <label class="form-label-modern" for="cadangan6">
                                                <i class="bi bi-arrows-fullscreen me-2 text-secondary"></i>
                                                Luas Bangunan
                                            </label>

                                            <input type="text"
                                                class="form-control @error('cadangan6') is-invalid @enderror"
                                                id="cadangan6"
                                                name="cadangan6"
                                                value="{{ old('cadangan6') }}"
                                                placeholder="Contoh: 500 m²">

                                            @error('cadangan6')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <h5 class="mt-4 mb-3 fw-bold text-primary d-flex align-items-center"
                                        style="font-size:16px; border-left: 4px solid #0d6efd; padding-left: 14px; background-color: #f0f8ff; border-radius: 6px; height: 45px;">
                                        <i class="bi bi-building-fill me-3" style="font-size: 18px;"></i>
                                        Foto Dokumentasi Bangunan Gedung
                                    </h5>


                                    {{-- FOTO 1 --}}
                                    <div class="col-md-6">
                                        <div class="form-modern mb-3">
                                            <label class="form-label-modern" for="cadangan7">
                                                <i class="bi bi-image-fill me-2 text-primary"></i>
                                                Foto Gedung 1
                                            </label>

                                            <input type="file"
                                                class="form-control @error('cadangan7') is-invalid @enderror"
                                                id="cadangan7"
                                                name="cadangan7">

                                            @error('cadangan7')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- FOTO 2 --}}
                                    <div class="col-md-6">
                                        <div class="form-modern mb-3">
                                            <label class="form-label-modern" for="cadangan8">
                                                <i class="bi bi-image-fill me-2 text-success"></i>
                                                Foto Gedung 2
                                            </label>

                                            <input type="file"
                                                class="form-control @error('cadangan8') is-invalid @enderror"
                                                id="cadangan8"
                                                name="cadangan8">

                                            @error('cadangan8')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- FOTO 3 --}}
                                    <div class="col-md-6">
                                        <div class="form-modern mb-3">
                                            <label class="form-label-modern" for="cadangan9">
                                                <i class="bi bi-image-fill me-2 text-warning"></i>
                                                Foto Gedung 3
                                            </label>

                                            <input type="file"
                                                class="form-control @error('cadangan9') is-invalid @enderror"
                                                id="cadangan9"
                                                name="cadangan9">

                                            @error('cadangan9')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    {{-- FOTO 4 --}}
                                    <div class="col-md-6">
                                        <div class="form-modern mb-3">
                                            <label class="form-label-modern" for="cadangan10">
                                                <i class="bi bi-image-fill me-2 text-danger"></i>
                                                Foto Gedung 4
                                            </label>

                                            <input type="file"
                                                class="form-control @error('cadangan10') is-invalid @enderror"
                                                id="cadangan10"
                                                name="cadangan10">

                                            @error('cadangan10')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                </div>
                            </div>




                    <br><br>
                                <div class="flex justify-end">

                               <button class="button-berkas" type="button" onclick="openModal()">
                                    <i class="bi bi-save" style="margin-right: 5px;"></i> Input Data Bangunan
                                    </button>

                                    <a href="{{ route('bebantekanalisakerusakan') }}" class="button-modern">
                                        <i class="bi bi-arrow-left-circle me-1"></i>
                                        <strong style="color: black">Kembali</strong>
                                    </a>

                                </div>



                                <!-- End row -->
                            </div>
                            <!-- end::Body -->

                            <div style="display: flex; justify-content: flex-end; margin-bottom:20px;">

                                <!-- Modal Konfirmasi -->
                                <div id="confirmModal" style="display: none; position: fixed; inset: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
                                    <div style="background: white; padding: 24px 30px; border-radius: 12px; max-width: 400px; width: 90%; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
                                      <p style="font-size: 16px; font-weight: 600; margin-bottom: 20px;">
                                        Apakah Saudara ingin input data bangunan gedung ini ?
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


