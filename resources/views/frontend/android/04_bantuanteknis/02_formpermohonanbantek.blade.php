@include('frontend.android.00_fiturmenu.01_header')

<body class="font-poppins text-[#070625]">
  <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[120px] relative">
    <div class="w-full h-[184px] absolute top-0 bg-cover bg-center" style="background-image: url('/assets/android/iconmenu/belakangnew.jpg');">
    </div>
     <div class="relative z-10 flex flex-col gap-6 mt-[60px]">
      <div class="top-menu flex justify-between items-center px-[18px]">
          <div class="w-[42px] h-[42px] flex shrink-0">
            <img src="/assets/abgblora/logo/logokabupatenblora.png" alt="icon">
          </div>
        {{-- <p class="font-semibold leading-[28px] text-white text-center" style="font-size: 18px;">Dinas Pekerjaan Umum Dan Penataan Ruang <br> Kabupaten Blora </span></p> --}}

        {{-- <p class="font-semibold leading-[28px] text-black text-center" style="font-size: 17px;">Dinas Pekerjaan Umum <br> Dan Penataan Ruang <br> Kabupaten Blora </span></p> --}}
<p class="font-semibold leading-[28px] text-black text-center" style="font-size: 17px;">Dinas Pekerjaan Umum <br> Dan Penataan Ruang <br> Kabupaten Blora </span></p>


        <div class="w-[42px] h-[42px] flex shrink-0">
            <img src="/assets/abgblora/logo/pupr.png" alt="icon">
          </div>
      </div>
      {{-- <form action="success.html" id="Details" class="group result-card-container flex flex-col gap-6"> --}}
        <div id="Contact-details" class="bg-white rounded-xl overflow-hidden flex flex-col mx-[18px]">
          <div class="flex p-4 items-center gap-4">
            <button type="button" class="contact-name accordion-button flex items-center gap-2 w-full" data-accordion="accordion-1">
              <div class="flex items-center">
                <div class="w-12 h-12 flex shrink-0 rounded-full overflow-hidden">
                  <img src="/assets/android/menunavigasi/004.png" class="object-cover w-full h-full" alt="photo">
                </div>
              </div>
              <div class="flex flex-col flex-1 gap-[2px] text-left">
                <p class="font-semibold">{{$title}}</p>
                {{-- <p class="font-medium text-xs leading-[18px] text-[#757C98]">Contact Details</p> --}}
              </div>
            </button>
          </div>
        </div>

        <div id="Contact-details" class="bg-white rounded-xl overflow-hidden flex flex-col mx-[18px]">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />

<style>
    .petablota {
      position: relative;
      min-height: 500px;
    }
    .petablota-map-container {
      height: 70vh;
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      position: relative;
    }
    #map {
      width: 100%;
      height: 100%;
    }
    #map-loader {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      z-index: 1000;
      display: none;
    }

.btn-submit-hover:hover {
    background-color: white; /* Warna putih */
    color: black; /* Tulisan hitam */
    border: 1px solid #2563eb; /* Border biru */
    transition: all 0.3s ease-in-out;
  }

  .btn-cancel-hover:hover {
    background-color: white; /* Warna putih */
    color: black; /* Tulisan hitam */
    border: 1px solid #9CA3AF; /* Border abu-abu */
    transition: all 0.3s ease-in-out;
  }

.pdf-preview-wrapper {
                max-width: 50%;
                overflow-x: auto;
                border: 1px solid #ccc;
                border-radius: 8px;
                padding: 8px;
                }

                .pdf-preview-wrapper iframe {
                width: 100%;
                height: 200px;
                border: none;
                border-radius: 6px;
                }

              .koordinat-box {
                margin-top: 10px;
                font-family: Arial, sans-serif;
                background: #f3f3f3;
                padding: 10px;
                border-radius: 10px;
                border: 1px solid #ccc;
              }

              /* Sembunyikan default attribution Leaflet */
              .leaflet-control-attribution a[href*="leaflet"] {
                display: none !important;
              }

 body {
      font-family: 'Poppins', sans-serif;
    }

.custom-button {
    display: flex;
    align-items: center;
    gap: 8px;
    font-size: 14px;
    background-color: #258af0;
    color: #ffffff;
    padding: 10px 15px;
    border-radius: 9999px;
    transition: all 0.3s;
    border: none;
    cursor: pointer;
  }

  .custom-button:hover {
    background-color: white;
    color: #258af0;
  }

  .custom-button svg {
    transition: all 0.3s;
  }

  .custom-button:hover svg {
    fill: #258af0;
  }

    table.zebra-table {
        border-collapse: collapse;
        width: 100%;
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        border-radius: 15px;
        overflow: hidden;
    }

    .zebra-table thead {
        background-color: #2E82FE;
        color: white;
    }

    .zebra-table th,
    .zebra-table td {
        padding: 6px 12px;
        text-align: left;
    }

    .zebra-table tbody tr:nth-child(odd) {
        background-color: #ffffff;
    }

    .zebra-table tbody tr:nth-child(even) {
        background-color: #dfdddd;
    }

    .zebra-table tbody tr:hover {
        background-color: #0fb825;
    }
</style>

<section
    id="breadcrumb"
  style="
    background: linear-gradient(to bottom, #7de3f1, #ffffff);
    margin: 0;
    padding: 0;
    position: relative;
    left: 0;
    margin-top: -50px;
    margin-bottom: -45px;
  "
>

 <section id="details" class="mx-auto flex flex-col sm:flex-row items-center justify-center text-center">
   {{-- @include('frontend.abgblora.06_permohonankrk.02_permohonankrkpemohon.00_menufungsibangunan') --}}


            <div class="flex flex-col gap-5 w-full">

            <div class="bg-white flex flex-col gap-5 p-5 rounded-[20px] w-full">
                    <div class="w-full bg-[#030303] flex items-center gap-[10px] p-[10px_14px] rounded-xl">
                <div class="w-5 h-5 flex shrink-0">
                    <img src="/assets/new/icons/story.svg" alt="icon">
                </div>
                <p class="text-white font-normal text-sm">
                    <span class="font-bold">Form Permohonan Bantuan Teknis | Bangunan Gedung </span>
                </p>
            </div>
            <form id="signatureForm" action="{{ route('permohonan.bantekcreate') }}" method="POST" enctype="multipart/form-data" class="mobile-form">
    @csrf
    <input type="hidden" name="dinas_id" value="{{ $dinas_id }}">

    <!-- Section 1: Jenis Permohonan -->
    {{-- <div class="form-section"> --}}
        <div class="section-header">
            <i class="fas fa-info-circle"></i>
            <strong>Jenis Permohonan Bantuan Teknis Saudara!</strong>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="jenispengajuanbantek_id">
                    <i class="fas fa-envelope"></i> Jenis Permohonan Bantuan Teknis
                </label>
                <select name="jenispengajuanbantek_id" id="jenispengajuanbantek_id" class="form-control @error('jenispengajuanbantek_id') is-invalid @enderror">
                    <option value="">-- Pilih Jenis Pengajuan --</option>
                    @foreach ($datapilihanpengajuan as $pengajuan)
                        <option value="{{ $pengajuan->id }}" {{ old('jenispengajuanbantek_id') == $pengajuan->id ? 'selected' : '' }}>
                            {{ $pengajuan->jenispengajuan }}
                        </option>
                    @endforeach
                </select>
                @error('jenispengajuanbantek_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row" id="konsultanFormGroup" style="display: none;">
            <div class="form-group">
                <label class="form-label" for="bujkkonsultan_id">
                    <i class="fas fa-map-pin"></i> Pilih Konsultan Asistensi
                </label>
                <select id="bujkkonsultan_id" name="bujkkonsultan_id" class="form-control @error('bujkkonsultan_id') is-invalid @enderror">
                    <option value="">-- Pilih Konsultan Asistensi --</option>
                    @foreach ($datakonsultanbantek as $admin)
                        <option value="{{ $admin->id }}" {{ old('bujkkonsultan_id') == $admin->id ? 'selected' : '' }}>
                            {{ $admin->namalengkap }}
                        </option>
                    @endforeach
                </select>
                @error('bujkkonsultan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- Section 2: Informasi Permohonan -->
    <div class="form-section">
        <div class="section-header">
            <i class="fas fa-info-circle"></i>
            <strong>Informasi Permohonan Bantuan Teknis</strong>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="nosuratdinas">
                    <i class="fas fa-file-alt"></i> Nomor Surat Dinas
                </label>
                <input type="text" name="nosuratdinas" id="nosuratdinas" class="form-control @error('nosuratdinas') is-invalid @enderror" value="{{ old('nosuratdinas') }}">
                @error('nosuratdinas')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="tanggalsurat">
                    <i class="fas fa-calendar"></i> Tanggal Surat
                </label>
                <input type="date" name="tanggalsurat" id="tanggalsurat" class="form-control" value="{{ date('Y-m-d') }}" readonly>
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="nama_pemohon">
                    <i class="fas fa-user"></i> Nama Pemohon
                </label>
                <input type="text" name="nama_pemohon" id="nama_pemohon" class="form-control @error('nama_pemohon') is-invalid @enderror" value="{{ old('nama_pemohon') }}">
                @error('nama_pemohon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="no_telepon">
                    <i class="fas fa-phone"></i> No Telepon
                </label>
                <input type="text" name="no_telepon" id="no_telepon" class="form-control @error('no_telepon') is-invalid @enderror" value="{{ old('no_telepon') }}">
                @error('no_telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- Section 3: Informasi Paket Pekerjaan -->
    <div class="form-section">
        <div class="section-header">
            <i class="fas fa-info-circle"></i>
            <strong>Informasi Paket Pekerjaan Bangunan Gedung</strong>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="namapaket">
                    <i class="fas fa-box"></i> Nama Paket
                </label>
                <input type="text" name="namapaket" id="namapaket" class="form-control @error('namapaket') is-invalid @enderror" value="{{ old('namapaket') }}">
                @error('namapaket')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="kategoribangunan">
                    <i class="fas fa-building"></i> Kategori Bangunan
                </label>
                <select name="kategoribangunan" id="kategoribangunan" class="form-control @error('kategoribangunan') is-invalid @enderror">
                    <option value="" disabled {{ old('kategoribangunan') ? '' : 'selected' }}>-- Pilih Kategori --</option>
                    <option value="GEDUNG KANTOR" {{ old('kategoribangunan') == 'GEDUNG KANTOR' ? 'selected' : '' }}>GEDUNG KANTOR</option>
                    <option value="BANGUNAN NEGARA LAINNYA" {{ old('kategoribangunan') == 'BANGUNAN NEGARA LAINNYA' ? 'selected' : '' }}>BANGUNAN NEGARA LAINNYA</option>
                    <option value="RUMAH NEGARA" {{ old('kategoribangunan') == 'RUMAH NEGARA' ? 'selected' : '' }}>RUMAH NEGARA</option>
                    <option value="PAGAR BANGUNAN GEDUNG KANTOR" {{ old('kategoribangunan') == 'PAGAR BANGUNAN GEDUNG KANTOR' ? 'selected' : '' }}>PAGAR BANGUNAN GEDUNG KANTOR</option>
                    <option value="PAGAR BANGUNAN GEDUNG LAINNYA" {{ old('kategoribangunan') == 'PAGAR BANGUNAN GEDUNG LAINNYA' ? 'selected' : '' }}>PAGAR BANGUNAN GEDUNG LAINNYA</option>
                    <option value="PAGAR RUMAH NEGARA" {{ old('kategoribangunan') == 'PAGAR RUMAH NEGARA' ? 'selected' : '' }}>PAGAR RUMAH NEGARA</option>
                </select>
                @error('kategoribangunan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="luasbangunan">
                    <i class="fas fa-ruler-combined"></i> Luas Bangunan (m²)
                </label>
                <input type="text" name="luasbangunan" id="luasbangunan" class="form-control @error('luasbangunan') is-invalid @enderror" value="{{ old('luasbangunan') ? number_format(old('luasbangunan'), 0, ',', '.') : '' }}" autocomplete="off" inputmode="numeric">
                @error('luasbangunan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="luastanahtotal">
                    <i class="fas fa-ruler"></i> Luas Tanah Total (m²)
                </label>
                <input type="text" name="luastanahtotal" id="luastanahtotal" class="form-control @error('luastanahtotal') is-invalid @enderror" value="{{ old('luastanahtotal') ? number_format(old('luastanahtotal'), 0, ',', '.') : '' }}" autocomplete="off" inputmode="numeric">
                @error('luastanahtotal')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="jumlahlantai">
                    <i class="fas fa-layer-group"></i> Jumlah Lantai
                </label>
                <select name="jumlahlantai" id="jumlahlantai" class="form-control @error('jumlahlantai') is-invalid @enderror">
                    <option value="" disabled {{ old('jumlahlantai') ? '' : 'selected' }}>-- Pilih Jumlah Lantai --</option>
                    @for ($i = 1; $i <= 10; $i++)
                        <option value="{{ $i }}" {{ old('jumlahlantai') == (string)$i ? 'selected' : '' }}>
                            {{ $i }} lantai
                        </option>
                    @endfor
                    <option value="lebih dari 10" {{ old('jumlahlantai') == 'lebih dari 10' ? 'selected' : '' }}>
                        Lebih dari 10 lantai
                    </option>
                </select>
                @error('jumlahlantai')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="tinggibangunan">
                    <i class="fas fa-arrows-alt-v"></i> Tinggi Bangunan (m)
                </label>
                <input type="text" name="tinggibangunan" id="tinggibangunan" class="form-control @error('tinggibangunan') is-invalid @enderror" value="{{ old('tinggibangunan') ? number_format(old('tinggibangunan'), 0, ',', '.') : '' }}" autocomplete="off" inputmode="numeric" pattern="[0-9.]+">
                @error('tinggibangunan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="bassement">
                    <i class="fas fa-warehouse"></i> Ada Bassement?
                </label>
                <select name="bassement" id="bassement" class="form-control @error('bassement') is-invalid @enderror">
                    <option value="">-- Pilih --</option>
                    <option value="1" {{ old('bassement') == 1 ? 'selected' : '' }}>Ya</option>
                    <option value="0" {{ old('bassement') == 0 ? 'selected' : '' }}>Tidak</option>
                </select>
                @error('bassement')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="kepemilikan">
                    <i class="fas fa-id-card"></i> Kepemilikan
                </label>
                <select name="kepemilikan" id="kepemilikan" class="form-control @error('kepemilikan') is-invalid @enderror">
                    <option value="" disabled {{ old('kepemilikan') ? '' : 'selected' }}>-- Pilih Jenis Kepemilikan --</option>
                    <option value="SERTIFIKAT HAK MILIK" {{ old('kepemilikan') == 'SERTIFIKAT HAK MILIK' ? 'selected' : '' }}>SERTIFIKAT HAK MILIK</option>
                    <option value="SERTIFIKAT HAK GUNA BANGUNAN" {{ old('kepemilikan') == 'SERTIFIKAT HAK GUNA BANGUNAN' ? 'selected' : '' }}>SERTIFIKAT HAK GUNA BANGUNAN</option>
                    <option value="SERTIFIKAT HAK PAKAI" {{ old('kepemilikan') == 'SERTIFIKAT HAK PAKAI' ? 'selected' : '' }}>SERTIFIKAT HAK PAKAI</option>
                </select>
                @error('kepemilikan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="tahunpembangunan">
                    <i class="fas fa-calendar-plus"></i> Tahun Pembangunan
                </label>
                <input type="number" name="tahunpembangunan" id="tahunpembangunan" class="form-control @error('tahunpembangunan') is-invalid @enderror" value="{{ old('tahunpembangunan') }}" autocomplete="off">
                @error('tahunpembangunan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="tahunrenovasi">
                    <i class="fas fa-tools"></i> Tahun Renovasi (jika ada)
                </label>
                <input type="number" name="tahunrenovasi" id="tahunrenovasi" class="form-control @error('tahunrenovasi') is-invalid @enderror" value="{{ old('tahunrenovasi') }}" autocomplete="off">
                @error('tahunrenovasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- Section 4: Informasi Lokasi -->
    <div class="form-section">
        <div class="section-header">
            <i class="fas fa-info-circle"></i>
            <strong>Informasi Lokasi Bangunan Gedung Pemohon</strong>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="rt">
                    <i class="fas fa-hashtag"></i> RT
                </label>
                <select name="rt" id="rt" class="form-control @error('rt') is-invalid @enderror">
                    <option value="">-- Pilih RT --</option>
                    @for ($i = 1; $i <= 25; $i++)
                        <option value="{{ $i }}" {{ old('rt') == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
                @error('rt')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="rw">
                    <i class="fas fa-hashtag"></i> RW
                </label>
                <select name="rw" id="rw" class="form-control @error('rw') is-invalid @enderror">
                    <option value="">-- Pilih RW --</option>
                    @for ($i = 1; $i <= 25; $i++)
                        <option value="{{ $i }}" {{ old('rw') == $i ? 'selected' : '' }}>{{ $i }}</option>
                    @endfor
                </select>
                @error('rw')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="kabupaten">
                    <i class="fas fa-map"></i> Kabupaten
                </label>
                <select name="kabupaten" id="kabupaten" class="form-control" readonly disabled>
                    <option value="kabupaten blora" selected>Kabupaten Blora</option>
                </select>
                <input type="hidden" name="kabupaten" value="kabupaten blora">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="kecamatanblora_id">
                    <i class="fas fa-map-pin"></i> Kecamatan
                </label>
                <select name="kecamatanblora_id" id="kecamatanblora_id" class="form-control @error('kecamatanblora_id') is-invalid @enderror">
                    <option value="">Pilih Kecamatan</option>
                    @foreach($datakecamatan as $kecamatan)
                        <option value="{{ $kecamatan->id }}" style="text-transform: capitalize;"
                            {{ old('kecamatanblora_id') == $kecamatan->id ? 'selected' : '' }}>
                            {{ $kecamatan->kecamatanblora }}
                        </option>
                    @endforeach
                </select>
                @error('kecamatanblora_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="kelurahandesa_id" class="form-label">
                    <i class="fas fa-map-marker-alt"></i> Kelurahan/Desa
                </label>
                <select id="kelurahandesa_id" name="kelurahandesa_id" class="form-control @error('kelurahandesa_id') is-invalid @enderror">
                    <option value="">Pilih Kelurahan/Desa</option>
                </select>
                @error('kelurahandesa_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="alamatlokasi">
                    <i class="fas fa-map-pin"></i> Lokasi Bangunan Gedung
                </label>
                <input type="text" id="alamatlokasi" name="alamatlokasi" placeholder="Lokasi Bangunan Gedung" class="form-control @error('alamatlokasi') is-invalid @enderror" value="{{ old('alamatlokasi') }}">
                @error('alamatlokasi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label class="form-label" for="pengelola">
                    <i class="fas fa-user-tie"></i> Pengelola Bangunan Gedung
                </label>
                <input type="text" id="pengelola" name="pengelola" placeholder="Pengelola Bangunan Gedung" class="form-control @error('pengelola') is-invalid @enderror" value="{{ old('pengelola') }}">
                @error('pengelola')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- Section 5: Berkas Dokumen -->
    <div class="form-section">
        <div class="section-header">
            <i class="fas fa-info-circle"></i>
            <strong>Berkas Kelengkapan Dokumen Permohonan Bantuan Teknis</strong>
        </div>

        <div class="form-row">
            <div class="file-upload-group">
                <label for="suratpermohonan">
                    <i class="fas fa-file-alt"></i> Surat Permohonan<br>
                    <span class="file-info">File .pdf Max 10Mb</span>
                </label>
                <input id="suratpermohonan" name="suratpermohonan" type="file" accept="image/*,application/pdf" class="@error('suratpermohonan') is-invalid @enderror" onchange="previewFile(this, 'suratpermohonanPreview')">
                <div id="suratpermohonanPreview" class="file-preview"></div>
                @error('suratpermohonan')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="file-upload-group">
                <label for="kic">
                    <i class="fas fa-file-invoice"></i> Kartu Inventaris Barang<br>
                    <span class="file-info">File .pdf Max 10Mb</span>
                </label>
                <input id="kic" name="kic" type="file" accept="application/pdf,image/*" class="@error('kic') is-invalid @enderror" onchange="previewFile(this, 'kicPreview')">
                <div id="kicPreview" class="file-preview">
                    @if(session('kic_temp'))
                        <div class="file-temp">
                            <a href="{{ Storage::url(session('kic_temp')) }}" target="_blank" class="text-blue-500 underline">Lihat file sebelumnya</a>
                        </div>
                    @elseif(old('kic'))
                        <div class="file-temp">
                            File sudah dipilih: {{ old('kic') }}
                        </div>
                    @endif
                </div>
                @error('kic')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-row">
            <div class="file-upload-group">
                <label for="fotokondisi">
                    <i class="fas fa-camera"></i> Foto Kondisi<br>
                    <span class="file-info">File .pdf Max 10Mb</span>
                </label>
                <input id="fotokondisi" name="fotokondisi" type="file" accept="application/pdf" class="@error('fotokondisi') is-invalid @enderror" onchange="previewFile(this, 'fotokondisiPreview')">
                <div id="fotokondisiPreview" class="file-preview">
                    @if(session('fotokondisi_temp'))
                        <div class="file-temp">
                            <a href="{{ Storage::url(session('fotokondisi_temp')) }}" target="_blank" class="text-blue-500 underline">
                                Lihat File PDF
                            </a>
                        </div>
                    @elseif(old('fotokondisi'))
                        <div class="file-temp">
                            File sudah dipilih: {{ old('fotokondisi') }}
                        </div>
                    @endif
                </div>
                @error('fotokondisi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- Hidden upload section for specific options -->
    <div id="uploadSection" style="display: none;">
        <div class="form-section">
            <div class="form-row">
                <div class="file-upload-group">
                    <label for="rab">
                        <i class="fas fa-file-invoice-dollar"></i> Rencana Anggaran Biaya<br>
                        <span class="file-info">File .pdf Max 10Mb</span>
                    </label>
                    <input id="rab" name="rab" type="file" accept="image/*,application/pdf" class="@error('rab') is-invalid @enderror" onchange="previewFile(this, 'rabPreview')">
                    <div id="rabPreview" class="file-preview"></div>
                    @error('rab')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="form-row">
                <div class="file-upload-group">
                    <label for="asbuilt">
                        <i class="fas fa-drafting-compass"></i> As Built Drawing<br>
                        <span class="file-info">File .pdf Max 10Mb</span>
                    </label>
                    <input id="asbuilt" name="asbuilt" type="file" accept="application/pdf,image/*" class="@error('asbuilt') is-invalid @enderror" onchange="previewFile(this, 'asbuiltPreview')">
                    <div id="asbuiltPreview" class="file-preview">
                        @if(session('asbuilt_temp'))
                            <div class="file-temp">
                                <a href="{{ Storage::url(session('asbuilt_temp')) }}" target="_blank" class="text-blue-500 underline">Lihat file sebelumnya</a>
                            </div>
                        @elseif(old('asbuilt'))
                            <div class="file-temp">
                                File sudah dipilih: {{ old('asbuilt') }}
                            </div>
                        @endif
                    </div>
                    @error('asbuilt')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
    {{-- </div> --}}

    <!-- Form buttons -->
    <div class="form-buttons">
        <button type="button" class="btn-reset">
            <i class="fas fa-redo"></i> Reset
        </button>
        <button type="button" class="btn-submit" onclick="openModal()">
            <i class="fab fa-telegram-plane"></i> Kirim Permohonan
        </button>
    </div>
</form>

<!-- Confirmation Modal -->
<div id="confirmModal" class="modal">
    <div class="modal-content">
        <p>
            Apakah Anda yakin dengan permohonan Anda?
        </p>

        <!-- Checkbox -->
        <div class="confirm-checkbox">
            <input type="checkbox" id="dataConfirm" onchange="toggleSubmitButton()">
            <label for="dataConfirm">
                Saya menyatakan bahwa data persyaratan yang saya kirim adalah sebenar-benarnya dan dapat dipertanggungjawabkan.
            </label>
        </div>

        <!-- Tombol -->
        <div class="modal-buttons">
            <button id="confirmSubmitBtn" onclick="submitForm()" disabled class="btn-kirim">
                Ya, Kirim
            </button>
            <button type="button" onclick="closeModal()" class="btn-cancel">
                Batal
            </button>
        </div>
    </div>
</div>

<style>
.mobile-form {
    width: 100%;
    max-width: 100%;
    padding: 15px;
    box-sizing: border-box;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}

.form-section {
    margin-bottom: 25px;
    background: #fff;
    border-radius: 10px;
    padding: 15px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.05);
}

.section-header {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
    color: #1a365d;
    font-size: 16px;
    padding-bottom: 8px;
    border-bottom: 1px solid #e2e8f0;
}

.section-header i {
    margin-right: 10px;
    color: #4299e1;
}

.form-row {
    margin-bottom: 15px;
}

.form-group {
    width: 100%;
}

.form-label {
    display: flex;
    align-items: center;
    margin-bottom: 8px;
    font-size: 14px;
    color: #4a5568;
    font-weight: 500;
}

.form-label i {
    margin-right: 10px;
    color: #2b6cb0;
    width: 20px;
    text-align: center;
}

.form-control {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #e2e8f0;
    border-radius: 6px;
    font-size: 14px;
    background-color: #fff;
    transition: border-color 0.2s;
}

.form-control:focus {
    border-color: #4299e1;
    outline: none;
}

select.form-control {
    appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 10px center;
    background-size: 16px;
}

.invalid-feedback {
    color: #e53e3e;
    font-size: 12px;
    margin-top: 5px;
}

.is-invalid {
    border-color: #e53e3e;
}

.file-upload-group {
    margin-bottom: 20px;
}

.file-upload-group label {
    display: block;
    margin-bottom: 8px;
    font-size: 14px;
    color: #4a5568;
    font-weight: 500;
}

.file-upload-group label i {
    margin-right: 8px;
    color: #2b6cb0;
}

.file-info {
    font-size: 12px;
    color: #718096;
    display: block;
    margin-top: 3px;
}

.file-preview {
    margin-top: 10px;
}

.file-preview img {
    max-width: 100%;
    max-height: 200px;
    border-radius: 5px;
    border: 1px solid #e2e8f0;
}

.file-temp {
    font-size: 12px;
    color: #4a5568;
    margin-top: 5px;
}

.form-buttons {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
    gap: 15px;
}

.btn-reset, .btn-submit {
    flex: 1;
    padding: 12px;
    border-radius: 8px;
    font-weight: 500;
    font-size: 14px;
    cursor: pointer;
    border: none;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
}

.btn-reset {
    background-color: #e53e3e;
    color: white;
}

.btn-reset:hover {
    background-color: #c53030;
}

.btn-submit {
    background-color: #3182ce;
    color: white;
}

.btn-submit:hover {
    background-color: #2c5282;
}

.btn-reset i, .btn-submit i {
    margin-right: 8px;
}

.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(0,0,0,0.5);
    z-index: 1000;
    align-items: center;
    justify-content: center;
    padding: 15px;
}

.modal-content {
    background: white;
    padding: 20px;
    border-radius: 10px;
    width: 100%;
    max-width: 400px;
}

.modal-content p {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 15px;
    text-align: center;
}

.confirm-checkbox {
    display: flex;
    align-items: flex-start;
    margin-bottom: 15px;
}

.confirm-checkbox input {
    margin-right: 10px;
    margin-top: 3px;
}

.confirm-checkbox label {
    font-size: 14px;
    color: #4a5568;
    text-align: left;
}

.modal-buttons {
    display: flex;
    justify-content: center;
    gap: 10px;
}

.btn-kirim, .btn-cancel {
    padding: 10px 20px;
    border-radius: 6px;
    font-weight: 500;
    cursor: pointer;
    border: none;
}

.btn-kirim {
    background-color: #3182ce;
    color: white;
}

.btn-kirim:disabled {
    background-color: #a0aec0;
    cursor: not-allowed;
}

.btn-cancel {
    background-color: #a0aec0;
    color: white;
}

@media (min-width: 768px) {
    .form-row {
        display: flex;
        gap: 15px;
    }

    .form-group {
        flex: 1;
    }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Toggle konsultan form based on selection
    const jenisSelect = document.getElementById('jenispengajuanbantek_id');
    const konsultanForm = document.getElementById('konsultanFormGroup');

    function toggleKonsultanForm() {
        if (jenisSelect.value === '1') {
            konsultanForm.style.display = 'block';
        } else {
            konsultanForm.style.display = 'none';
        }
    }

    toggleKonsultanForm();
    jenisSelect.addEventListener('change', toggleKonsultanForm);

    // AJAX for Kelurahan/Desa
    $('#kecamatanblora_id').on('change', function () {
        var kecamatanID = $(this).val();
        if (kecamatanID) {
            $.ajax({
                url: '{{ route("permohonan.krkhunian") }}',
                type: 'GET',
                data: { kecamatan_id: kecamatanID },
                success: function (data) {
                    $('#kelurahandesa_id').empty().append('<option value="">Pilih Kelurahan/Desa</option>');
                    $.each(data, function (key, value) {
                        $('#kelurahandesa_id').append('<option value="' + value.id + '">' + value.desa + '</option>');
                    });
                }
            });
        } else {
            $('#kelurahandesa_id').empty().append('<option value="">Pilih Kelurahan/Desa</option>');
        }
    });

    // Format number inputs
    function formatRibuan(input) {
        input.addEventListener('input', () => {
            let cursorPos = input.selectionStart;
            let originalLength = input.value.length;

            let value = input.value.replace(/\D/g, '');
            let formattedValue = value.replace(/\B(?=(\d{3})+(?!\d))/g, ".");

            if (formattedValue !== input.value) {
                input.value = formattedValue;

                let newLength = formattedValue.length;
                cursorPos = cursorPos + (newLength - originalLength);

                if (cursorPos > newLength) cursorPos = newLength;
                if (cursorPos < 0) cursorPos = 0;

                input.setSelectionRange(cursorPos, cursorPos);
            }
        });

        if (input.form) {
            input.form.addEventListener('submit', function () {
                input.value = input.value.replace(/\./g, '');
            });
        }
    }

    formatRibuan(document.getElementById('luasbangunan'));
    formatRibuan(document.getElementById('luastanahtotal'));
    formatRibuan(document.getElementById('tinggibangunan'));

    // Limit year inputs
    function limitLength(input, maxLength) {
        input.addEventListener('input', () => {
            if (input.value.length > maxLength) {
                input.value = input.value.slice(0, maxLength);
            }
        });
    }

    limitLength(document.getElementById('tahunpembangunan'), 4);
    limitLength(document.getElementById('tahunrenovasi'), 4);

    // Toggle additional upload section
    function cekPilihan() {
        const select = document.getElementById('jenispengajuanbantek_id');
        const uploadSection = document.getElementById('uploadSection');
        if (select.value === '4') {
            uploadSection.style.display = 'block';
        } else {
            uploadSection.style.display = 'none';
        }
    }

    cekPilihan();
    document.getElementById('jenispengajuanbantek_id').addEventListener('change', cekPilihan);
});

function previewFile(input, previewId) {
    const file = input.files[0];
    const preview = document.getElementById(previewId);
    preview.innerHTML = '';

    if (file) {
        const fileType = file.type;
        const reader = new FileReader();

        reader.onload = function(e) {
            if (fileType.startsWith('image/')) {
                const img = document.createElement('img');
                img.src = e.target.result;
                img.style.maxWidth = '100%';
                img.style.maxHeight = '200px';
                img.style.borderRadius = '5px';
                img.style.border = '1px solid #e2e8f0';
                preview.appendChild(img);
            } else if (fileType === 'application/pdf') {
                const iframe = document.createElement('iframe');
                iframe.src = e.target.result + '#toolbar=0&zoom=50';
                iframe.style.width = '100%';
                iframe.style.height = '300px';
                iframe.style.border = '1px solid #e2e8f0';
                iframe.style.borderRadius = '5px';
                preview.appendChild(iframe);
            } else {
                preview.innerHTML = '<p style="color: #e53e3e; font-size: 12px;">Format file tidak didukung untuk preview</p>';
            }
        };

        reader.readAsDataURL(file);
    }
}

function openModal() {
    document.getElementById("confirmModal").style.display = "flex";
}

function closeModal() {
    document.getElementById("confirmModal").style.display = "none";
}

function toggleSubmitButton() {
    const checkbox = document.getElementById("dataConfirm");
    const btn = document.getElementById("confirmSubmitBtn");

    btn.disabled = !checkbox.checked;
    btn.style.backgroundColor = checkbox.checked ? "#3182ce" : "#a0aec0";
    btn.style.cursor = checkbox.checked ? "pointer" : "not-allowed";
}

function submitForm() {
    const dataConfirm = document.getElementById("dataConfirm");
    if (!dataConfirm.checked) {
        alert("Anda harus menyatakan bahwa data yang Anda kirim adalah benar.");
        return;
    }
    document.getElementById("signatureForm").submit();
}
</script>

            <style>
                .error-message {
        font-size: 0.875rem;
        color: #e3342f; /* Atau kamu bisa sesuaikan dengan warna branding kamu */
        margin-top: 4px;
        display: block;
    }

            </style>


        </div>
    </div>
    </section>
</section>

        </div>



      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')


