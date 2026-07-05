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



                    {{-- Form --}}

                    <form action="{{ route('bebantekkerusakanupdateproses', ['namagedung' => Str::slug($data->namagedung ?? 'tanpa-nama'), 'id' => $data->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="card-body">
                            <div class="row">

                                {{-- Kolom Kiri (6/12) --}}
                                <div class="col-md-6">
                                    <div class="form-modern mb-3">
                                        <label class="form-label-modern" for="namagedung">
                                            <i class="bi bi-building" style="margin-right: 8px; color: navy;"></i> Nama Gedung
                                        </label>
                                        <input type="text" id="namagedung" name="namagedung"
                                            value="{{ old('namagedung', $data->namagedung) }}"
                                            class="form-control @error('namagedung') is-invalid @enderror"
                                            placeholder="Masukkan nama gedung" />
                                        @error('namagedung')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-modern mb-3">
                                        <label class="form-label-modern" for="kabupaten">
                                            <i class="bi bi-geo-alt" style="margin-right: 8px; color: navy;"></i> Kabupaten
                                        </label>
                                        <input type="text" id="kabupaten" name="kabupaten"
                                            value="{{ old('kabupaten', $data->kabupaten) }}"
                                            class="form-control @error('kabupaten') is-invalid @enderror"
                                            placeholder="Masukkan kabupaten" />
                                        @error('kabupaten')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-modern mb-3">
                                        <label class="form-label-modern" for="koordinat">
                                            <i class="bi bi-pin-map" style="margin-right: 8px; color: navy;"></i> Koordinat
                                        </label>
                                        <input type="text" id="koordinat" name="koordinat"
                                            value="{{ old('koordinat', $data->koordinat) }}"
                                            class="form-control @error('koordinat') is-invalid @enderror"
                                            placeholder="Contoh: -6.9667, 110.4167" />
                                        @error('koordinat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-modern mb-3">
                                        <label class="form-label-modern" for="luasbangunan">
                                            <i class="bi bi-rulers" style="margin-right: 8px; color: navy;"></i> Luas Bangunan
                                        </label>
                                        <input type="text" id="luasbangunan" name="luasbangunan"
                                            value="{{ old('luasbangunan', $data->luasbangunan) }}"
                                            class="form-control @error('luasbangunan') is-invalid @enderror"
                                            placeholder="Contoh: 120 m²" />
                                        @error('luasbangunan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Kolom Kanan (6/12) --}}
                                <div class="col-md-6">
                                    <div class="form-modern mb-3">
                                        <label class="form-label-modern" for="alamat">
                                            <i class="bi bi-house" style="margin-right: 8px; color: navy;"></i> Alamat
                                        </label>
                                        <textarea id="alamat" name="alamat" rows="3"
                                            class="form-control @error('alamat') is-invalid @enderror"
                                            placeholder="Masukkan alamat lengkap">{{ old('alamat', $data->alamat) }}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- user_id HIDDEN --}}
                                    <input type="hidden" name="user_id" value="{{ $user->id ?? '' }}">

                                    {{-- Nama User (Readonly) --}}
                                    <div class="form-modern mb-3">
                                        <label class="form-label-modern" for="namauser">
                                            <i class="bi bi-person-badge" style="margin-right: 8px; color: navy;"></i> Pengunduh / Pemohon
                                        </label>
                                        <input type="text" id="namauser"
                                            value="{{ $user->name ?? '-' }}"
                                            class="form-control" readonly />
                                    </div>
                                </div>

                                {{-- ============================================================
                                     UPLOAD BERKAS (Full Width)
                                     ============================================================ --}}
                                <div class="col-12">
                                    <hr class="my-4" style="border-top: 2px dashed #0d6efd; width: 60%; margin: auto;">
                                    <h5 style="color: #0d6efd; font-weight: bold; margin-top: 5px; font-size:16px; text-align:center;">
                                        <i class="bi bi-upload" style="margin-right: 6px;"></i>
                                        Upload Berkas Permohonan
                                    </h5>
                                    <hr class="my-4" style="border-top: 2px dashed #0d6efd; width: 60%; margin: auto;">
                                </div>

                                {{-- Kode Barang (PDF/DOC) --}}
                                <div class="col-md-6">
                                    <div class="form-modern mb-3">
                                        <label class="form-label-modern" for="kodebarang">
                                            <i class="bi bi-file-earmark-pdf" style="color: darkred; margin-right: 8px;"></i> Upload Kode Barang (PDF/DOC)
                                        </label>
                                        <input type="file" id="kodebarang" name="kodebarang"
                                            accept=".pdf,.doc,.docx"
                                            class="form-control @error('kodebarang') is-invalid @enderror"
                                            onchange="previewPDF(event, 'previewContainerKode', 'iframeKode', 'msgKode')" />
                                        @error('kodebarang')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        <div class="mt-3" id="previewContainerKode" style="{{ $data->kodebarang ? '' : 'display: none;' }}">
                                            <label class="fw-bold">Kode Barang Saat Ini</label>
                                            <iframe id="iframeKode" src="{{ $data->kodebarang ? asset($data->kodebarang) : '' }}"
                                                style="width: 100%; height: 400px; border: 1px solid #ccc; border-radius: 6px;"></iframe>
                                        </div>
                                        <div id="msgKode" class="mt-3"
                                            style="color: grey; font-style: italic; {{ $data->kodebarang ? 'display:none;' : '' }}">
                                            Belum ada file kode barang. Silahkan upload file.
                                        </div>
                                    </div>
                                </div>

                                {{-- Surat Permohonan (PDF/DOC) --}}
                                <div class="col-md-6">
                                    <div class="form-modern mb-3">
                                        <label class="form-label-modern" for="suratpermohonan">
                                            <i class="bi bi-file-earmark-pdf" style="color: darkred; margin-right: 8px;"></i> Upload Surat Permohonan (PDF/DOC)
                                        </label>
                                        <input type="file" id="suratpermohonan" name="suratpermohonan"
                                            accept=".pdf,.doc,.docx"
                                            class="form-control @error('suratpermohonan') is-invalid @enderror"
                                            onchange="previewPDF(event, 'previewContainerSurat', 'iframeSurat', 'msgSurat')" />
                                        @error('suratpermohonan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror

                                        <div class="mt-3" id="previewContainerSurat" style="{{ $data->suratpermohonan ? '' : 'display: none;' }}">
                                            <label class="fw-bold">Surat Permohonan Saat Ini</label>
                                            <iframe id="iframeSurat" src="{{ $data->suratpermohonan ? asset($data->suratpermohonan) : '' }}"
                                                style="width: 100%; height: 400px; border: 1px solid #ccc; border-radius: 6px;"></iframe>
                                        </div>
                                        <div id="msgSurat" class="mt-3"
                                            style="color: grey; font-style: italic; {{ $data->suratpermohonan ? 'display:none;' : '' }}">
                                            Belum ada surat permohonan. Silahkan upload file.
                                        </div>
                                    </div>
                                </div>

                                {{-- ============================================================
                                     4 FOTO CADANGAN
                                     ============================================================ --}}
                                <div class="col-12">
                                    <hr class="my-4" style="border-top: 2px dashed #0d6efd; width: 60%; margin: auto;">
                                    <h5 style="color: #0d6efd; font-weight: bold; margin-top: 5px; font-size:16px; text-align:center;">
                                        <i class="bi bi-images" style="margin-right: 6px;"></i>
                                        Foto Cadangan (4 Gambar)
                                    </h5>
                                    <hr class="my-4" style="border-top: 2px dashed #0d6efd; width: 60%; margin: auto;">
                                </div>

                                @for ($i = 1; $i <= 4; $i++)
                                    @php $field = 'fotocadangan' . $i; @endphp
                                    <div class="col-md-3">
                                        <div class="form-modern mb-3" style="background: #f8fafc; border-radius: 12px; padding: 12px; border: 1px solid #e8ecf1;">
                                            <label class="form-label-modern" for="{{ $field }}">
                                                <i class="bi bi-camera" style="color: navy; margin-right: 8px;"></i> Foto {{ $i }}
                                            </label>
                                            @if($data->$field && file_exists(public_path($data->$field)))
                                                <div style="margin-bottom: 8px;">
                                                    <img src="{{ asset($data->$field) }}" alt="Foto {{ $i }}" style="width: 100%; max-height: 120px; object-fit: cover; border-radius: 8px; border: 2px solid #f0f2f5;">
                                                    <p style="font-size: 11px; color: #7a8a9e; margin: 4px 0 0;">Foto saat ini</p>
                                                </div>
                                            @else
                                                <p style="font-size: 12px; color: #b0b8c4; margin-bottom: 8px;">Belum ada foto</p>
                                            @endif
                                            <input type="file" id="{{ $field }}" name="{{ $field }}"
                                                accept="image/*"
                                                class="form-control @error($field) is-invalid @enderror"
                                                style="padding: 6px 12px;" />
                                            @error($field)
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                            <small style="color: #b0b8c4; font-size: 10px;">Format: JPG, PNG. Maks 20 MB</small>
                                        </div>
                                    </div>
                                @endfor

                            </div>
                        </div>

                        {{-- Tombol Simpan --}}
                        <div style="display: flex; justify-content: flex-end; margin-bottom:20px;">
                            <button class="button-baru" type="button" onclick="openModal()">
                                <i class="bi bi-save" style="margin-right: 5px;"></i>
                                <span style="font-family: 'Poppins', sans-serif;">Simpan Perubahan</span>
                            </button>
                        </div>

                        {{-- Modal Konfirmasi --}}
                        <div id="confirmModal" style="display: none; position: fixed; inset: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
                            <div style="background: white; padding: 24px 30px; border-radius: 12px; max-width: 400px; width: 90%; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
                                <p style="font-size: 16px; font-weight: 600; margin-bottom: 20px;">
                                    Apakah Anda yakin ingin memperbaiki data ini?
                                </p>
                                <div style="display: flex; justify-content: center; gap: 12px;">
                                    <button id="confirmSubmitBtn"
                                        onclick="submitForm()"
                                        style="background-color: #10B981; color: white; padding: 8px 16px; border-radius: 8px; border: none; transition: 0.3s; display: flex; align-items: center; gap: 6px; cursor: pointer;">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 448 512" fill="white">
                                            <path d="M446.7 68.8c-5.7-4.8-13.8-5.7-20.3-2.2L26.1 263.5c-7.2 3.7-11.4 11.5-10.4 19.5s6.7 14.5 14.4 16.5l85.1 23.3 40.6 98.8c2.9 7.1 9.6 11.7 17.1 11.7h.4c7.7-.2 14.4-5.1 16.8-12.3l33.2-96.5 109.7 88.1c3.5 2.8 7.9 4.3 12.3 4.3 2.5 0 5-.5 7.4-1.4 6.4-2.5 11.2-8.2 12.7-15.1L448 89.4c1.3-7.6-1.6-15.3-7.3-20.6z"/>
                                        </svg>
                                        Ya
                                    </button>
                                    <button type="button"
                                        onclick="closeModal()"
                                        style="background-color: #EF4444; color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer; transition: 0.3s; display: flex; align-items: center; gap: 6px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 384 512" fill="white">
                                            <path d="M231.6 256l142.7-142.7c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L186.3 210.7 43.6 68c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L141 256 0 397.7c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L186.3 301.3l142.7 142.7c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L231.6 256z"/>
                                        </svg>
                                        Batal
                                    </button>
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

{{-- Script --}}
<script>
    // Preview PDF
    function previewPDF(event, containerId, iframeId, messageId) {
        const file = event.target.files[0];
        const container = document.getElementById(containerId);
        const iframe = document.getElementById(iframeId);
        const message = document.getElementById(messageId);

        if (file && (file.type === "application/pdf" || file.type === "application/msword" || file.type === "application/vnd.openxmlformats-officedocument.wordprocessingml.document")) {
            const fileURL = URL.createObjectURL(file);
            iframe.src = fileURL;
            container.style.display = 'block';
            message.style.display = 'none';
        } else if (file) {
            iframe.src = '';
            container.style.display = 'none';
            message.style.display = 'block';
            message.textContent = 'File harus berupa PDF, DOC, atau DOCX.';
        } else {
            iframe.src = '';
            container.style.display = 'none';
            message.style.display = 'block';
            message.textContent = 'Belum ada file. Silahkan upload file.';
        }
    }

    // Modal Konfirmasi
    function openModal() {
        const modal = document.getElementById("confirmModal");
        if (modal) modal.style.display = "flex";
    }

    function closeModal() {
        const modal = document.getElementById("confirmModal");
        if (modal) modal.style.display = "none";
    }

    function submitForm() {
        document.querySelector('form').submit();
    }

    window.onclick = function(event) {
        const modal = document.getElementById('confirmModal');
        if (event.target === modal) {
            modal.style.display = "none";
        }
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
