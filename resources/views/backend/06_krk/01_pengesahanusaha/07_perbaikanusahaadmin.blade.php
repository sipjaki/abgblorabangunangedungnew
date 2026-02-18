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

<button class="button-modern" type="button"
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
                  <form action="{{ route('bekrkusahaperbaikannewupdate', $data->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
                            <!-- begin::Body -->
                            <div class="card-body">
                                <div class="row">
                                    <!-- Left Column (6/12) -->
<div class="row">


<div class="text-center">
    <hr class="my-4" style="border-top: 2px dashed #0d6efd; width: 60%; margin: auto;">
    <h5 style="color: #0d6efd; font-weight: bold; margin-top: 5px; font-size:16px;">
        <i class="bi bi-upload" style="margin-right: 6px;"></i>
        Informasi Berkas Permohonan Saudara (KRK) Fungsi Usaha
    </h5>
    <hr class="my-4" style="border-top: 2px dashed #0d6efd; width: 60%; margin: auto;">
</div>


    <div class="form-modern col-md-6">
        <div class="mb-3">
            <label class="form-label-modern" for="nomordinasasal">
                <i class="bi bi-file-earmark-text" style="margin-right: 8px; color: navy;"></i> Nomor Surat Dinas Asal (Abaikan Jika Tidak Ada)
            </label>
            <input type="text" id="nomordinasasal" name="nomordinasasal" value="{{ old('nomordinasasal', $data->nomordinasasal ?? '') }}" class="form-control @error('nomordinasasal') is-invalid @enderror" placeholder="Masukkan nomor dinas asal">
            @error('nomordinasasal')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-modern col-md-6">
        <div class="mb-3">
            <label class="form-label-modern" for="perorangan">
                <i class="bi bi-person" style="margin-right: 8px; color: navy;"></i> Perorangan
            </label>
            <input type="text" id="perorangan" name="perorangan" value="{{ old('perorangan', $data->perorangan ?? '') }}" class="form-control @error('perorangan') is-invalid @enderror" placeholder="Masukkan nama perorangan">
            @error('perorangan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-modern col-md-6">
        <div class="mb-3">
            <label class="form-label-modern" for="perusahaan">
                <i class="bi bi-building" style="margin-right: 8px; color: navy;"></i> Perusahaan
            </label>
            <input type="text" id="perusahaan" name="perusahaan" value="{{ old('perusahaan', $data->perusahaan ?? '') }}" class="form-control @error('perusahaan') is-invalid @enderror" placeholder="Masukkan nama perusahaan">
            @error('perusahaan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-modern col-md-6">
        <div class="mb-3">
            <label class="form-label-modern" for="nik">
                <i class="bi bi-card-text" style="margin-right: 8px; color: navy;"></i> NIK
            </label>
            <input type="text" id="nik" name="nik" maxlength="16" value="{{ old('nik', $data->nik ?? '') }}" class="form-control @error('nik') is-invalid @enderror" placeholder="Masukkan NIK">
            @error('nik')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-modern col-md-6">
        <div class="mb-3">
            <label class="form-label-modern" for="koordinatlokasi">
                <i class="bi bi-geo-alt" style="margin-right: 8px; color: navy;"></i> Koordinat Lokasi
            </label>
            <textarea id="koordinatlokasi" name="koordinatlokasi" class="form-control @error('koordinatlokasi') is-invalid @enderror" rows="2" placeholder="Masukkan koordinat lokasi">{{ old('koordinatlokasi', $data->koordinatlokasi ?? '') }}</textarea>
            @error('koordinatlokasi')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-modern col-md-6">
        <div class="mb-3">
            <label class="form-label-modern" for="tanggalpermohonan">
                <i class="bi bi-calendar" style="margin-right: 8px; color: navy;"></i> Tanggal Permohonan
            </label>
            <input type="date" id="tanggalpermohonan" name="tanggalpermohonan" value="{{ old('tanggalpermohonan', $data->tanggalpermohonan ?? '') }}" class="form-control @error('tanggalpermohonan') is-invalid @enderror">
            @error('tanggalpermohonan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-modern col-md-6">
        <div class="mb-3">
            <label class="form-label-modern" for="notelepon">
                <i class="bi bi-telephone" style="margin-right: 8px; color: navy;"></i> No Telepon
            </label>
            <input type="text" id="notelepon" name="notelepon" value="{{ old('notelepon', $data->notelepon ?? '') }}" class="form-control @error('notelepon') is-invalid @enderror" placeholder="Masukkan nomor telepon">
            @error('notelepon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-modern col-md-6">
        <div class="mb-3">
            <label class="form-label-modern" for="luastanah">
                <i class="bi bi-aspect-ratio" style="margin-right: 8px; color: navy;"></i> Luas Tanah (m²)
            </label>
            <input type="number" id="luastanah" name="luastanah" value="{{ old('luastanah', $data->luastanah ?? '') }}" class="form-control @error('luastanah') is-invalid @enderror" placeholder="Masukkan luas tanah">
            @error('luastanah')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-modern col-md-6">
        <div class="mb-3">
            <label class="form-label-modern" for="jumlahlantai">
                <i class="bi bi-layers" style="margin-right: 8px; color: navy;"></i> Jumlah Lantai
            </label>
            <select id="jumlahlantai" name="jumlahlantai" class="form-control @error('jumlahlantai') is-invalid @enderror">
                <option value="">-- Pilih Jumlah Lantai --</option>
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" {{ old('jumlahlantai', $data->jumlahlantai ?? '') == $i ? 'selected' : '' }}>{{ $i }} Lantai</option>
                @endfor
            </select>
            @error('jumlahlantai')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-modern col-md-6">
        <div class="mb-3">
            <label class="form-label-modern" for="rt">
                <i class="bi bi-signpost" style="margin-right: 8px; color: navy;"></i> RT
            </label>
            <input type="text" id="rt" name="rt" value="{{ old('rt', $data->rt ?? '') }}" class="form-control @error('rt') is-invalid @enderror" placeholder="RT">
            @error('rt')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-modern col-md-6">
        <div class="mb-3">
            <label class="form-label-modern" for="rw">
                <i class="bi bi-signpost-2" style="margin-right: 8px; color: navy;"></i> RW
            </label>
            <input type="text" id="rw" name="rw" value="{{ old('rw', $data->rw ?? '') }}" class="form-control @error('rw') is-invalid @enderror" placeholder="RW">
            @error('rw')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-modern col-md-6">
        <div class="mb-3">
            <label class="form-label-modern" for="kabupaten">
                <i class="bi bi-geo-fill" style="margin-right: 8px; color: navy;"></i> Kabupaten
            </label>
            <input type="text" id="kabupaten" name="kabupaten" value="{{ old('kabupaten', $data->kabupaten ?? '') }}" class="form-control @error('kabupaten') is-invalid @enderror" placeholder="Masukkan nama kabupaten">
            @error('kabupaten')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-modern col-md-12">
        <div class="mb-3">
            <label class="form-label-modern" for="lokasibangunan">
                <i class="bi bi-house" style="margin-right: 8px; color: navy;"></i> Lokasi Bangunan
            </label>
            <textarea id="lokasibangunan" name="lokasibangunan" class="form-control @error('lokasibangunan') is-invalid @enderror" rows="2" placeholder="Masukkan lokasi bangunan">{{ old('lokasibangunan', $data->lokasibangunan ?? '') }}</textarea>
            @error('lokasibangunan')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-modern col-md-12">
        <div class="mb-3">
            <label class="form-label-modern" for="alamatpemohon">
                <i class="bi bi-geo-alt-fill" style="margin-right: 8px; color: navy;"></i> Alamat Pemohon
            </label>
            <textarea id="alamatpemohon" name="alamatpemohon" class="form-control @error('alamatpemohon') is-invalid @enderror" rows="2" placeholder="Masukkan alamat pemohon">{{ old('alamatpemohon', $data->alamatpemohon ?? '') }}</textarea>
            @error('alamatpemohon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="text-center">
    <hr class="my-4" style="border-top: 2px dashed #0d6efd; width: 60%; margin: auto;">
    <h5 style="color: #0d6efd; font-weight: bold; margin-top: 5px; font-size:16px;">
        <i class="bi bi-upload" style="margin-right: 6px;"></i>
        Upload Perbaikan Berkas Keterangan Rencana Kota (KRK) Fungsi Usaha
    </h5>
    <hr class="my-4" style="border-top: 2px dashed #0d6efd; width: 60%; margin: auto;">
</div>

<div class="col-md-6">
<div class="form-modern mb-3">
    <label class="form-label-modern" for="ktp">
        <i class="bi bi-file-earmark-pdf" style="color: darkred; margin-right: 8px;"></i> Upload KTP (PDF)
    </label>
    <input type="file" id="ktp" name="ktp" accept="application/pdf"
        class="form-control @error('ktp') is-invalid @enderror"
        onchange="previewPDF(event, 'previewContainerKTP', 'iframeKTP', 'msgKTP')" />
    @error('ktp')<div class="invalid-feedback">{{ $message }}</div>@enderror

    <div class="mt-3" id="previewContainerKTP" style="{{ isset($data->ktp) ? '' : 'display: none;' }}">
        <label class="fw-bold">Data Sebelumnya:</label>
        <iframe id="iframeKTP" src="{{ isset($data->ktp) ? asset($data->ktp) : '' }}"
            style="width: 100%; height: 400px; border: 1px solid #ccc; border-radius: 6px;"></iframe>
    </div>
    <div id="msgKTP" class="mt-3"
        style="color: grey; font-style: italic; {{ isset($data->ktp) ? 'display:none;' : '' }}">
        Data belum di update. Silahkan upload berkas KTP.
    </div>
</div>


<div class="form-modern mb-3">
    <label class="form-label-modern" for="npwp">
        <i class="bi bi-file-earmark-pdf" style="color: darkred; margin-right: 8px;"></i> Upload NPWP (PDF)
    </label>
    <input type="file" id="npwp" name="npwp" accept="application/pdf"
        class="form-control @error('npwp') is-invalid @enderror"
        onchange="previewPDF(event, 'previewContainerNPWP', 'iframeNPWP', 'msgNPWP')" />
    @error('npwp')<div class="invalid-feedback">{{ $message }}</div>@enderror

    <div class="mt-3" id="previewContainerNPWP" style="{{ isset($data->npwp) ? '' : 'display: none;' }}">
        <label class="fw-bold">Data Sebelumnya:</label>
        <iframe id="iframeNPWP" src="{{ isset($data->npwp) ? asset($data->npwp) : '' }}"
            style="width: 100%; height: 400px; border: 1px solid #ccc; border-radius: 6px;"></iframe>
    </div>
    <div id="msgNPWP" class="mt-3"
        style="color: grey; font-style: italic; {{ isset($data->npwp) ? 'display:none;' : '' }}">
        Data belum di update. Silahkan upload berkas NPWP.
    </div>
</div>


</div>

<div class="col-md-6">

    <div class="form-modern mb-3">
    <label class="form-label-modern" for="sertifikattanah">
        <i class="bi bi-file-earmark-pdf" style="color: darkred; margin-right: 8px;"></i> Upload Sertifikat Tanah (PDF)
    </label>
    <input type="file" id="sertifikattanah" name="sertifikattanah" accept="application/pdf"
        class="form-control @error('sertifikattanah') is-invalid @enderror"
        onchange="previewPDF(event, 'previewContainerST', 'iframeST', 'msgST')" />
    @error('sertifikattanah')<div class="invalid-feedback">{{ $message }}</div>@enderror

    <div class="mt-3" id="previewContainerST" style="{{ isset($data->sertifikattanah) ? '' : 'display: none;' }}">
        <label class="fw-bold">Data Sebelumnya:</label>
        <iframe id="iframeST" src="{{ isset($data->sertifikattanah) ? asset($data->sertifikattanah) : '' }}"
            style="width: 100%; height: 400px; border: 1px solid #ccc; border-radius: 6px;"></iframe>
        </div>
        <div id="msgST" class="mt-3"
        style="color: grey; font-style: italic; {{ isset($data->sertifikattanah) ? 'display:none;' : '' }}">
        Data belum di update. Silahkan upload berkas Sertifikat Tanah.
    </div>
</div>

<div class="form-modern mb-3">
    <label class="form-label-modern" for="lampiranoss">
        <i class="bi bi-file-earmark-pdf" style="color: darkred; margin-right: 8px;"></i> Upload Lampiran OSS (PDF)
    </label>
    <input type="file" id="lampiranoss" name="lampiranoss" accept="application/pdf"
    class="form-control @error('lampiranoss') is-invalid @enderror"
    onchange="previewPDF(event, 'previewContainerOSS', 'iframeOSS', 'msgOSS')" />
    @error('lampiranoss')<div class="invalid-feedback">{{ $message }}</div>@enderror

    <div class="mt-3" id="previewContainerOSS" style="{{ isset($data->lampiranoss) ? '' : 'display: none;' }}">
        <label class="fw-bold">Data Sebelumnya:</label>
        <iframe id="iframeOSS" src="{{ isset($data->lampiranoss) ? asset($data->lampiranoss) : '' }}"
            style="width: 100%; height: 400px; border: 1px solid #ccc; border-radius: 6px;"></iframe>
        </div>
        <div id="msgOSS" class="mt-3"
        style="color: grey; font-style: italic; {{ isset($data->lampiranoss) ? 'display:none;' : '' }}">
        Data belum di update. Silahkan upload berkas Lampiran OSS.
    </div>
</div>

</div>
<div class="col-md-6">
    <div class="form-modern mb-3">
        <label class="form-label-modern" for="buktipbb">
            <i class="bi bi-file-earmark-pdf" style="color: darkred; margin-right: 8px;"></i> Upload Bukti PBB (PDF)
        </label>
        <input type="file" id="buktipbb" name="buktipbb" accept="application/pdf"
        class="form-control @error('buktipbb') is-invalid @enderror"
        onchange="previewPDF(event, 'previewContainerPBB', 'iframePBB', 'msgPBB')" />
        @error('buktipbb')<div class="invalid-feedback">{{ $message }}</div>@enderror

        <div class="mt-3" id="previewContainerPBB" style="{{ isset($data->buktipbb) ? '' : 'display: none;' }}">
            <label class="fw-bold">Data Sebelumnya:</label>
            <iframe id="iframePBB" src="{{ isset($data->buktipbb) ? asset($data->buktipbb) : '' }}"
                style="width: 100%; height: 400px; border: 1px solid #ccc; border-radius: 6px;"></iframe>
            </div>
            <div id="msgPBB" class="mt-3"
            style="color: grey; font-style: italic; {{ isset($data->buktipbb) ? 'display:none;' : '' }}">
            Data belum di update. Silahkan upload berkas Bukti PBB.
        </div>
    </div>
    <div class="form-modern mb-3">
        <label class="form-label-modern" for="dokvalidasi">
            <i class="bi bi-file-earmark-pdf" style="color: darkred; margin-right: 8px;"></i> Upload Dokumen Validasi (PDF)
        </label>
        <input type="file" id="dokvalidasi" name="dokvalidasi" accept="application/pdf"
        class="form-control @error('dokvalidasi') is-invalid @enderror"
        onchange="previewPDF(event, 'previewContainerVAL', 'iframeVAL', 'msgVAL')" />
        @error('dokvalidasi')<div class="invalid-feedback">{{ $message }}</div>@enderror

        <div class="mt-3" id="previewContainerVAL" style="{{ isset($data->dokvalidasi) ? '' : 'display: none;' }}">
            <label class="fw-bold">Data Sebelumnya:</label>
            <iframe id="iframeVAL" src="{{ isset($data->dokvalidasi) ? asset($data->dokvalidasi) : '' }}"
                style="width: 100%; height: 400px; border: 1px solid #ccc; border-radius: 6px;"></iframe>
            </div>
            <div id="msgVAL" class="mt-3"
            style="color: grey; font-style: italic; {{ isset($data->dokvalidasi) ? 'display:none;' : '' }}">
            Data belum di update. Silahkan upload berkas Validasi.
        </div>
    </div>

</div>
<div class="col-md-6">

    <div class="form-modern mb-3">
    <label class="form-label-modern" for="siteplan">
        <i class="bi bi-file-earmark-pdf" style="color: darkred; margin-right: 8px;"></i> Upload Siteplan (PDF)
    </label>
    <input type="file" id="siteplan" name="siteplan" accept="application/pdf"
        class="form-control @error('siteplan') is-invalid @enderror"
        onchange="previewPDF(event, 'previewContainerSITE', 'iframeSITE', 'msgSITE')" />
    @error('siteplan')<div class="invalid-feedback">{{ $message }}</div>@enderror

    <div class="mt-3" id="previewContainerSITE" style="{{ isset($data->siteplan) ? '' : 'display: none;' }}">
        <label class="fw-bold">Data Sebelumnya:</label>
        <iframe id="iframeSITE" src="{{ isset($data->siteplan) ? asset($data->siteplan) : '' }}"
            style="width: 100%; height: 400px; border: 1px solid #ccc; border-radius: 6px;"></iframe>
    </div>
    <div id="msgSITE" class="mt-3"
        style="color: grey; font-style: italic; {{ isset($data->siteplan) ? 'display:none;' : '' }}">
        Data belum di update. Silahkan upload berkas Siteplan.
    </div>
</div>
<div class="form-modern mb-3">
    <label class="form-label-modern" for="tandatangan">
        <i class="bi bi-file-earmark-pdf" style="color: darkred; margin-right: 8px;"></i> Upload Surat Permohonan KRK (PDF)
    </label>
    <input type="file" id="tandatangan" name="tandatangan" accept="application/pdf,image/jpeg,image/png,image/jpg"
        class="form-control @error('tandatangan') is-invalid @enderror"
        onchange="previewMixedFile(event, 'previewContainerTTD', 'previewTTD', 'msgTTD')" />
    @error('tandatangan')<div class="invalid-feedback">{{ $message }}</div>@enderror

    {{-- Data Sebelumnya --}}
    <div class="mt-3" id="previewContainerTTD" style="{{ isset($data->tandatangan) ? '' : 'display: none;' }}">
        <label class="fw-bold">Data Sebelumnya:</label>
        @php
            $ext = pathinfo($data->tandatangan ?? '', PATHINFO_EXTENSION);
        @endphp
        @if (in_array(strtolower($ext), ['jpg', 'jpeg', 'png']))
            <img src="{{ asset($data->tandatangan) }}" alt="Tanda Tangan Lama"
                style="max-width: 100%; border: 1px solid #ccc; border-radius: 6px;">
        @elseif ($ext === 'pdf')
            <iframe src="{{ asset($data->tandatangan) }}"
                style="width: 100%; height: 400px; border: 1px solid #ccc; border-radius: 6px;"></iframe>
        @else
            <div style="color: grey; font-style: italic;">Data sebelumnya tidak bisa ditampilkan</div>
        @endif
    </div>

    <div id="msgTTD" class="mt-3"
        style="color: grey; font-style: italic; {{ isset($data->tandatangan) ? 'display:none;' : '' }}">
        Data belum di update. Silahkan upload berkas Tanda Tangan.
    </div>

    {{-- Preview Upload Baru --}}
    <div class="mt-3" id="previewTTD" style="display: none;"></div>
</div>
</div>
    <script>
function previewPDF(event, containerId, iframeId, messageId) {
    const file = event.target.files[0];
    const container = document.getElementById(containerId);
    const iframe = document.getElementById(iframeId);
    const message = document.getElementById(messageId);

    if (file && file.type === "application/pdf") {
        const fileURL = URL.createObjectURL(file);
        iframe.src = fileURL;
        container.style.display = 'block';
        message.style.display = 'none';
    } else {
        iframe.src = '';
        container.style.display = 'none';
        message.style.display = 'block';
        message.textContent = 'File harus berupa format PDF.';
    }
}
</script>


                                    </div>
                                </div>
                                <!-- End row -->
                            </div>
                            <!-- end::Body -->

                            <div style="display: flex; justify-content: flex-end; margin-bottom:20px;">
                                <div class="flex justify-end">
                               <button class="button-berkas" type="button" onclick="openModal()">
                                    <i class="bi bi-save" style="margin-right: 5px;"></i>
                                    <span style="font-family: 'Poppins', sans-serif;">Simpan Perbaikan?</span>
                                    </button>

                                </div>
                                <!-- Modal Konfirmasi -->
                                <div id="confirmModal" style="display: none; position: fixed; inset: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
                                    <div style="background: white; padding: 24px 30px; border-radius: 12px; max-width: 400px; width: 90%; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
                                      <p style="font-size: 16px; font-weight: 600; margin-bottom: 20px;">
                                        Apakah Anda ingin memperbaiki berkas permohonan KRK anda ?
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
