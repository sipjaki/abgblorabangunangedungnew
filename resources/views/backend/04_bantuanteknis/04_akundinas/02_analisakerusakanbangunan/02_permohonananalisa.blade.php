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

                        <form action="{{ url('/bebantekanalisabgn/createnewbaru') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- begin::Body -->
    <input type="hidden" name="user_id" value="{{ $user->id ?? auth()->id() }}">

    <div class="card-body">
        <div class="row">

            <!-- ========================================================= -->
            <!-- SECTION 1: DATA PEMOHON & BANGUNAN -->
            <!-- ========================================================= -->
            <h5 class="mt-4 mb-3 fw-bold text-primary d-flex align-items-center"
                style="font-size:16px; border-left: 4px solid #0d6efd; padding-left: 14px; background-color: #f0f8ff; border-radius: 6px; height: 45px;">
                <i class="bi bi-building-fill me-3" style="font-size: 18px;"></i>
                Data Permohonan Bantuan Teknis
            </h5>

            <!-- Nama Gedung -->
            <div class="col-md-6">
                <div class="form-modern mb-3">
                    <label class="form-label-modern" for="namagedung">
                        <i class="bi bi-house-door-fill me-2 text-primary"></i>
                        Nama Gedung / Bangunan
                    </label>
                    <input type="text"
                        class="form-control @error('namagedung') is-invalid @enderror"
                        id="namagedung"
                        name="namagedung"
                        placeholder="Masukkan nama gedung/bangunan"
                        value="{{ old('namagedung', $data->namagedung ?? '') }}">
                    @error('namagedung')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Kabupaten -->
            <div class="col-md-6">
                <div class="form-modern mb-3">
                    <label class="form-label-modern" for="kabupaten">
                        <i class="bi bi-geo-alt-fill me-2 text-success"></i>
                        Kabupaten
                    </label>
                    <input type="text"
                        class="form-control @error('kabupaten') is-invalid @enderror"
                        id="kabupaten"
                        name="kabupaten"
                        placeholder="Masukkan nama kabupaten"
                        value="{{ old('kabupaten', $data->kabupaten ?? 'Kabupaten Blora') }} readonly">
                    @error('kabupaten')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Luas Bangunan -->
            <div class="col-md-6">
                <div class="form-modern mb-3">
                    <label class="form-label-modern" for="luasbangunan">
                        <i class="bi bi-rulers me-2 text-warning"></i>
                        Luas Bangunan (m²)
                    </label>
                    <input type="number"
                        class="form-control @error('luasbangunan') is-invalid @enderror"
                        id="luasbangunan"
                        name="luasbangunan"
                        placeholder="Contoh: 120, Masukan hanya angka"
                        value="{{ old('luasbangunan', $data->luasbangunan ?? '') }}">
                    @error('luasbangunan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Alamat -->
            <div class="col-md-6">
                <div class="form-modern mb-3">
                    <label class="form-label-modern" for="alamat">
                        <i class="bi bi-geo me-2 text-danger"></i>
                        Alamat Lengkap
                    </label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror"
                        id="alamat"
                        name="alamat"
                        rows="3"
                        placeholder="Masukkan alamat lengkap bangunan">{{ old('alamat', $data->alamat ?? '') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 2: KOORDINAT & PETA -->
            <!-- ========================================================= -->
            <h5 class="mt-4 mb-3 fw-bold text-primary d-flex align-items-center"
                style="font-size:16px; border-left: 4px solid #0d6efd; padding-left: 14px; background-color: #f0f8ff; border-radius: 6px; height: 45px;">
                <i class="bi bi-map-fill me-3" style="font-size: 18px;"></i>
                Lokasi & Koordinat Bangunan
            </h5>

            <!-- Koordinat -->
            <div class="col-md-12">
                <div class="form-modern mb-3">
                    <label class="form-label-modern" for="koordinat">
                        <i class="bi bi-geo-alt-fill me-2 text-danger" style="font-size: 1.2rem;"></i>
                        Koordinat Lokasi (Latitude, Longitude)
                    </label>
                    <input type="text"
                        class="form-control @error('koordinat') is-invalid @enderror"
                        id="koordinat"
                        name="koordinat"
                        placeholder="Klik peta untuk mengisi koordinat"
                        value="{{ old('koordinat', $data->koordinat ?? '') }}">
                    @error('koordinat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Peta -->
                <div id="map" style="height: 450px; border-radius: 12px; border: 2px solid #dee2e6; margin-bottom: 20px;"></div>
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 3: BERKAS PERMOHONAN -->
            <!-- ========================================================= -->
            <h5 class="mt-4 mb-3 fw-bold text-primary d-flex align-items-center"
                style="font-size:16px; border-left: 4px solid #0d6efd; padding-left: 14px; background-color: #f0f8ff; border-radius: 6px; height: 45px;">
                <i class="bi bi-file-earmark-text-fill me-3" style="font-size: 18px;"></i>
                Berkas Permohonan
            </h5>

            <!-- Kode Barang - UPLOAD FILE -->
            <div class="col-md-6">
                <div class="form-modern mb-3">
                    <label class="form-label-modern" for="kodebarang">
                        <i class="bi bi-file-earmark-richtext-fill me-2 text-primary"></i>
                        Kode Barang / Berkas Pendukung (Pdf/Word) Max 20Mb
                    </label>
                    <input type="file"
                        class="form-control @error('kodebarang') is-invalid @enderror"
                        id="kodebarang"
                        name="kodebarang"
                        accept=".pdf,.doc,.docx,.xls,.xlsx,.ppt,.pptx,.txt,.zip,.rar"
                        onchange="previewFile(event, 'previewKodeBarang', 'filenameKodeBarang')">
                    @error('kodebarang')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="mt-2">
                        <!-- Preview untuk file -->
                        <div id="previewKodeBarang" style="display: none; padding: 10px; background: #f8f9fa; border-radius: 8px; border: 1px solid #dee2e6;">
                            <i class="bi bi-file-earmark-fill me-2" style="font-size: 20px; color: #0d6efd;"></i>
                            <span id="filenameKodeBarang" style="font-weight: 500;"></span>
                        </div>
                        <!-- Tampilkan file lama jika ada -->
                        @if(!empty($data->kodebarang))
                            <div style="padding: 10px; background: #e7f3ff; border-radius: 8px; border: 1px solid #b6d4fe; margin-top: 5px;">
                                <i class="bi bi-check-circle-fill me-2" style="color: #0d6efd;"></i>
                                <small>File saat ini: <strong>{{ $data->kodebarang }}</strong></small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Surat Permohonan -->
            <div class="col-md-6">
                <div class="form-modern mb-3">
                    <label class="form-label-modern" for="suratpermohonan">
                        <i class="bi bi-file-earmark-pdf-fill me-2 text-danger"></i>
                        Surat Permohonan (Pdf/Word) Max 20Mb

                    </label>
                    <input type="file"
                        class="form-control @error('suratpermohonan') is-invalid @enderror"
                        id="suratpermohonan"
                        name="suratpermohonan"
                        accept=".pdf,.doc,.docx"
                        onchange="previewFile(event, 'previewSurat', 'filenameSurat')">
                    @error('suratpermohonan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <div class="mt-2">
                        <div id="previewSurat" style="display: none; padding: 10px; background: #f8f9fa; border-radius: 8px; border: 1px solid #dee2e6;">
                            <i class="bi bi-file-earmark-fill me-2" style="font-size: 20px; color: #dc3545;"></i>
                            <span id="filenameSurat" style="font-weight: 500;"></span>
                        </div>
                        @if(!empty($data->suratpermohonan))
                            <div style="padding: 10px; background: #e7f3ff; border-radius: 8px; border: 1px solid #b6d4fe; margin-top: 5px;">
                                <i class="bi bi-check-circle-fill me-2" style="color: #0d6efd;"></i>
                                <small>File saat ini: <strong>{{ $data->suratpermohonan }}</strong></small>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- ========================================================= -->
            <!-- SECTION 4: FOTO BANGUNAN DENGAN PREVIEW -->
            <!-- ========================================================= -->
            <h5 class="mt-4 mb-3 fw-bold text-primary d-flex align-items-center"
                style="font-size:16px; border-left: 4px solid #0d6efd; padding-left: 14px; background-color: #f0f8ff; border-radius: 6px; height: 45px;">
                <i class="bi bi-images me-3" style="font-size: 18px;"></i>
                Foto Bangunan Gedung
            </h5>

            <div class="row">
                <!-- Foto 1 -->
                <div class="col-md-3">
                    <div class="form-modern mb-3">
                        <label class="form-label-modern" for="fotocadangan1">
                            <i class="bi bi-image-fill me-2 text-primary"></i>
                            Foto 1
                        </label>
                        <input type="file"
                            class="form-control @error('fotocadangan1') is-invalid @enderror"
                            id="fotocadangan1"
                            name="fotocadangan1"
                            accept="image/*"
                            onchange="previewImage(event, 'preview1')">
                        @error('fotocadangan1')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="mt-2" style="position: relative;">
                            <img id="preview1"
                                 src="{{ !empty($data->fotocadangan1) ? asset('storage/' . $data->fotocadangan1) : '' }}"
                                 alt="Preview Foto 1"
                                 style="width: 100%; height: 150px; object-fit: cover; border-radius: 8px; border: 2px solid #dee2e6; display: {{ !empty($data->fotocadangan1) ? 'block' : 'none' }};">
                            <small id="filename1" class="text-muted" style="display: none;"></small>
                        </div>
                    </div>
                </div>

                <!-- Foto 2 -->
                <div class="col-md-3">
                    <div class="form-modern mb-3">
                        <label class="form-label-modern" for="fotocadangan2">
                            <i class="bi bi-image-fill me-2 text-success"></i>
                            Foto 2
                        </label>
                        <input type="file"
                            class="form-control @error('fotocadangan2') is-invalid @enderror"
                            id="fotocadangan2"
                            name="fotocadangan2"
                            accept="image/*"
                            onchange="previewImage(event, 'preview2')">
                        @error('fotocadangan2')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="mt-2" style="position: relative;">
                            <img id="preview2"
                                 src="{{ !empty($data->fotocadangan2) ? asset('storage/' . $data->fotocadangan2) : '' }}"
                                 alt="Preview Foto 2"
                                 style="width: 100%; height: 150px; object-fit: cover; border-radius: 8px; border: 2px solid #dee2e6; display: {{ !empty($data->fotocadangan2) ? 'block' : 'none' }};">
                            <small id="filename2" class="text-muted" style="display: none;"></small>
                        </div>
                    </div>
                </div>

                <!-- Foto 3 -->
                <div class="col-md-3">
                    <div class="form-modern mb-3">
                        <label class="form-label-modern" for="fotocadangan3">
                            <i class="bi bi-image-fill me-2 text-warning"></i>
                            Foto 3
                        </label>
                        <input type="file"
                            class="form-control @error('fotocadangan3') is-invalid @enderror"
                            id="fotocadangan3"
                            name="fotocadangan3"
                            accept="image/*"
                            onchange="previewImage(event, 'preview3')">
                        @error('fotocadangan3')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="mt-2" style="position: relative;">
                            <img id="preview3"
                                 src="{{ !empty($data->fotocadangan3) ? asset('storage/' . $data->fotocadangan3) : '' }}"
                                 alt="Preview Foto 3"
                                 style="width: 100%; height: 150px; object-fit: cover; border-radius: 8px; border: 2px solid #dee2e6; display: {{ !empty($data->fotocadangan3) ? 'block' : 'none' }};">
                            <small id="filename3" class="text-muted" style="display: none;"></small>
                        </div>
                    </div>
                </div>

                <!-- Foto 4 -->
                <div class="col-md-3">
                    <div class="form-modern mb-3">
                        <label class="form-label-modern" for="fotocadangan4">
                            <i class="bi bi-image-fill me-2 text-danger"></i>
                            Foto 4
                        </label>
                        <input type="file"
                            class="form-control @error('fotocadangan4') is-invalid @enderror"
                            id="fotocadangan4"
                            name="fotocadangan4"
                            accept="image/*"
                            onchange="previewImage(event, 'preview4')">
                        @error('fotocadangan4')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="mt-2" style="position: relative;">
                            <img id="preview4"
                                 src="{{ !empty($data->fotocadangan4) ? asset('storage/' . $data->fotocadangan4) : '' }}"
                                 alt="Preview Foto 4"
                                 style="width: 100%; height: 150px; object-fit: cover; border-radius: 8px; border: 2px solid #dee2e6; display: {{ !empty($data->fotocadangan4) ? 'block' : 'none' }};">
                            <small id="filename4" class="text-muted" style="display: none;"></small>
                        </div>
                    </div>
                </div>
            </div>

        </div> <!-- end row -->
    </div> <!-- end card-body -->

    <br><br>

    <!-- ========================================================= -->
    <!-- BUTTONS -->
    <!-- ========================================================= -->
    <div class="flex justify-end" style="display: flex; justify-content: flex-end; gap: 12px; margin-bottom: 20px;">
        <button class="button-modern" type="button" onclick="openModal()">
            <i class="bi bi-save" style="margin-right: 5px;"></i> Simpan Permohonan
        </button>

        <a href="{{ route('bebantekanalisabgn') }}" class="button-kembali">
            <i class="bi bi-arrow-left-circle me-1"></i>
            Kembali
        </a>
    </div>

    <!-- ========================================================= -->
    <!-- MODAL KONFIRMASI -->
    <!-- ========================================================= -->
    <div id="confirmModal" style="display: none; position: fixed; inset: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
        <div style="background: white; padding: 24px 30px; border-radius: 12px; max-width: 400px; width: 90%; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
            <p style="font-size: 16px; font-weight: 600; margin-bottom: 20px;">
                Apakah Saudara ingin mengajukan permohonan ini?
            </p>

            <div style="display: flex; justify-content: center; gap: 12px;">
                <button type="submit" style="background-color: #10B981; color: white; padding: 8px 16px; border-radius: 8px; border: none; transition: 0.3s; display: flex; align-items: center; gap: 6px;">
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 448 512" fill="white">
                        <path d="M446.7 68.8c-5.7-4.8-13.8-5.7-20.3-2.2L26.1 263.5c-7.2 3.7-11.4 11.5-10.4 19.5s6.7 14.5 14.4 16.5l85.1 23.3 40.6 98.8c2.9 7.1 9.6 11.7 17.1 11.7h.4c7.7-.2 14.4-5.1 16.8-12.3l33.2-96.5 109.7 88.1c3.5 2.8 7.9 4.3 12.3 4.3 2.5 0 5-.5 7.4-1.4 6.4-2.5 11.2-8.2 12.7-15.1L448 89.4c1.3-7.6-1.6-15.3-7.3-20.6z"/>
                    </svg>
                    Ya
                </button>

                <button type="button" onclick="closeModal()" style="background-color: #EF4444; color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer; transition: 0.3s; display: flex; align-items: center; gap: 6px;">
                    <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 384 512" fill="white">
                        <path d="M231.6 256l142.7-142.7c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L186.3 210.7 43.6 68c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L141 256 0 397.7c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L186.3 301.3l142.7 142.7c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L231.6 256z"/>
                    </svg>
                    Batal
                </button>
            </div>
        </div>
    </div>

    <!-- ========================================================= -->
    <!-- SCRIPTS -->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        // ===== PREVIEW FILE (untuk Kode Barang & Surat Permohonan) =====
        function previewFile(event, previewId, filenameId) {
            var file = event.target.files[0];
            var preview = document.getElementById(previewId);
            var filename = document.getElementById(filenameId);

            if (file) {
                // Tampilkan nama file dan icon sesuai tipe
                var fileType = file.type;
                var icon = 'bi bi-file-earmark-fill';

                if (fileType.includes('pdf')) {
                    icon = 'bi bi-file-earmark-pdf-fill';
                } else if (fileType.includes('word') || fileType.includes('document')) {
                    icon = 'bi bi-file-earmark-word-fill';
                } else if (fileType.includes('excel') || fileType.includes('sheet')) {
                    icon = 'bi bi-file-earmark-excel-fill';
                } else if (fileType.includes('powerpoint') || fileType.includes('presentation')) {
                    icon = 'bi bi-file-earmark-ppt-fill';
                } else if (fileType.includes('zip') || fileType.includes('rar')) {
                    icon = 'bi bi-file-earmark-zip-fill';
                } else if (fileType.includes('text')) {
                    icon = 'bi bi-file-earmark-text-fill';
                }

                // Tampilkan preview dengan icon dan nama file
                preview.style.display = 'block';
                preview.innerHTML = `
                    <i class="${icon} me-2" style="font-size: 20px; color: #0d6efd;"></i>
                    <span style="font-weight: 500;">${file.name}</span>
                    <span class="badge bg-secondary ms-2">${(file.size / 1024).toFixed(1)} KB</span>
                `;

            } else {
                // Jika file dihapus
                preview.style.display = 'none';
                preview.innerHTML = '';
            }
        }

        // ===== PREVIEW IMAGE =====
        function previewImage(event, previewId) {
            var reader = new FileReader();
            var file = event.target.files[0];
            var preview = document.getElementById(previewId);
            var filename = document.getElementById(previewId.replace('preview', 'filename'));

            if (file) {
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';

                    if (filename) {
                        filename.textContent = '📄 ' + file.name + ' (' + (file.size / 1024).toFixed(1) + ' KB)';
                        filename.style.display = 'block';
                    }
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.style.display = 'none';
                if (filename) {
                    filename.style.display = 'none';
                }
            }
        }

        // ===== MAP =====
        var map = L.map('map').setView([-7.0421, 111.4046], 11);

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: 'Dinas Pekerjaan Umum Dan Penataan Ruang Kabupaten Blora'
        }).addTo(map);

        var marker;
        var inputKoordinat = document.getElementById('koordinat');

        if (inputKoordinat.value) {
            var coords = inputKoordinat.value.split(',');
            if (coords.length === 2) {
                var lat = parseFloat(coords[0]);
                var lng = parseFloat(coords[1]);
                if (!isNaN(lat) && !isNaN(lng)) {
                    marker = L.marker([lat, lng]).addTo(map);
                    map.setView([lat, lng], 15);
                }
            }
        }

        map.on('click', function(e) {
            var latlng = e.latlng;
            if (marker) {
                map.removeLayer(marker);
            }
            marker = L.marker(latlng).addTo(map);
            document.getElementById('koordinat').value = latlng.lat.toFixed(6) + ',' + latlng.lng.toFixed(6);
        });

        // ===== MODAL =====
        function openModal() {
            document.getElementById("confirmModal").style.display = "flex";
        }

        function closeModal() {
            document.getElementById("confirmModal").style.display = "none";
        }

        document.getElementById("confirmModal").addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // ===== VALIDASI =====
        document.querySelector('form').addEventListener('submit', function(e) {
            var koordinat = document.getElementById('koordinat').value;
            if (!koordinat) {
                e.preventDefault();
                alert('Silakan pilih lokasi di peta terlebih dahulu!');
                return false;
            }
        });
    </script>

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


