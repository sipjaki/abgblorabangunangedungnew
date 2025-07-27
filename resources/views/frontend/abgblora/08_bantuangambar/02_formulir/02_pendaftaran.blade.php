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

@include('frontend.abgblora.00_fiturmenu.02_header')
@include('frontend.abgblora.00_fiturmenu.05_menunavigasweb')
@include('backend.00_administrator.00_baganterpisah.09_button')

<section
    id="breadcrumb"
  style="
    background: linear-gradient(to bottom, #7de3f1, #ffffff);
    width: 100vw;
    margin: 0;
    padding: 0;
    position: relative;
    left: 0;
    margin-top: -50px;
    margin-bottom: -45px;
  "
    {{-- style="
        background-image: url('/assets/abgblora/logo/gambarabgblora.jpg');
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        width: 100vw;
        margin: 0;
        padding: 0;
        position: relative;
        left: 0;
        margin-top:-30px;
        margin-bottom:-45px;
    " --}}
>

<section id="breadcrumb" class="container max-w-[1130px] mx-auto" style="margin-top: 200px;">
    {{-- <br><br>
    <div class="flex items-center gap-[20px]">
      <!-- Gambar di kiri -->
      <img src="/assets/abgblora/logo/iconabgblora.png" alt="" class="w-[60px] -my-[15px]" width="10%" style="margin-right: 20px;">

      <!-- Breadcrumb di kanan -->
      <div class="flex gap-[30px] items-center flex-wrap">
        <span>/</span>
        <a href="/permohonankrk" class="last-of-type:font-bold transition-all duration-300 text-blue-600" style="color: blue;">
         {{$title}}
        </a>
      </div>
    </div> --}}

  </section>




 <section id="details" class="container max-w-[1130px] mx-auto flex flex-col sm:flex-row gap-5">

    {{-- @include('frontend.abgblora.06_permohonankrk.02_permohonankrkpemohon.00_menufungsibangunan') --}}


            <div class="flex flex-col gap-5 w-full" style="margin-top: 75px;">
            <div class="bg-white flex flex-col gap-5 p-5 rounded-[20px] w-full">
                    <div class="w-full bg-[#030303] flex items-center gap-[10px] p-[10px_14px] rounded-xl">
                <div class="w-5 h-5 flex shrink-0">
                    <img src="/assets/new/icons/story.svg" alt="icon">
                </div>
                <p class="text-white font-normal text-sm">
                    <span class="font-bold">Form Permohonan Bantuan Teknis | Bangunan Gedung </span>
                </p>
            </div>

<form id="signatureForm" action="{{ route('feformbantuangambarcreate') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5 w-full">
    @csrf
    <input type="hidden" name="user_id" value="{{ $dinas_id }}">

    <div class="container-fluid px-0">
        <!-- Main Form Card -->
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-6xl mx-auto relative" style="margin-top: -50px;">

            <!-- Section 1: Informasi Pemohon -->
            <div class="mb-8 pb-6 border-b border-gray-200">
                <div class="bg-blue-50 text-blue-800 rounded-md p-3 mb-4 flex items-center">
                    <i class="fas fa-info-circle mr-2"></i>
                    <span class="font-semibold">Informasi Pemohon</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Nama Pemohon -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                            <i class="fas fa-user mr-2 text-blue-600"></i> Nama Pemohon
                        </label>
                        <input type="text" name="namapemohon" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                            <i class="fas fa-envelope mr-2 text-blue-600"></i> Email
                        </label>
                        <input type="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <!-- Nomor Telepon -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                            <i class="fas fa-phone mr-2 text-blue-600"></i> Nomor Telepon
                        </label>
                        <input type="text" name="nomortelepon" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <!-- NIK KTP -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                            <i class="fas fa-id-card mr-2 text-blue-600"></i> NIK KTP
                        </label>
                        <input type="text" name="nikktp" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <!-- Alamat Pemohon -->
                    <div class="form-group col-span-full">
                        <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                            <i class="fas fa-map-marker-alt mr-2 text-blue-600"></i> Alamat Pemohon
                        </label>
                        <textarea name="alamatpemohon" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                    </div>
                </div>
            </div>

            <!-- Section 2: Informasi Bangunan -->
            <div class="mb-8 pb-6 border-b border-gray-200">
                <div class="bg-blue-50 text-blue-800 rounded-md p-3 mb-4 flex items-center">
                    <i class="fas fa-info-circle mr-2"></i>
                    <span class="font-semibold">Informasi Bangunan Gedung</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Jenis Permohonan Gambar -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                            <i class="fas fa-drafting-compass mr-2 text-blue-600"></i> Jenis Permohonan Gambar
                        </label>
                        <select name="jenispermohonangambar_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">-- Pilih Jenis Permohonan --</option>
                            @foreach($jenispermohonan as $jenis)
                                <option value="{{ $jenis->id }}">{{ $jenis->jenis }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Fungsi Bangunan -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                            <i class="fas fa-warehouse mr-2 text-blue-600"></i> Fungsi Bangunan
                        </label>
                        <select name="fungsibangunangambar_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">-- Pilih Fungsi Bangunan --</option>
                            @foreach($fungsibangunan as $fungsi)
                                <option value="{{ $fungsi->id }}">{{ $fungsi->fungsibangunan }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Luas Bangunan -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                            <i class="fas fa-ruler-combined mr-2 text-blue-600"></i> Luas Bangunan (m²)
                        </label>
                        <input type="text" name="luasbangunan" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <!-- Tinggi Bangunan -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                            <i class="fas fa-arrows-alt-v mr-2 text-blue-600"></i> Tinggi Bangunan (m)
                        </label>
                        <input type="text" name="tinggibangunan" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <!-- Jumlah Lantai -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                            <i class="fas fa-layer-group mr-2 text-blue-600"></i> Jumlah Lantai
                        </label>
                        <input type="number" name="jumlahlantai" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>

                    <!-- Klasifikasi Bangunan -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                            <i class="fas fa-tag mr-2 text-blue-600"></i> Klasifikasi Bangunan
                        </label>
                        <select name="klasifikasibangunan" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                            <option value="">-- Pilih Klasifikasi --</option>
                            <option value="Sederhana">Sederhana</option>
                            <option value="Tidak Sederhana">Tidak Sederhana</option>
                        </select>
                    </div>

                    <!-- Peruntukan Untuk -->
                    <div class="form-group col-span-full">
                        <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                            <i class="fas fa-info-circle mr-2 text-blue-600"></i> Peruntukan Untuk
                        </label>
                        <input type="text" name="peruntukanuntuk" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    </div>
                </div>
            </div>

            <!-- Section 3: Lokasi Bangunan -->
            <div class="mb-8 pb-6 border-b border-gray-200">
                <div class="bg-blue-50 text-blue-800 rounded-md p-3 mb-4 flex items-center">
                    <i class="fas fa-info-circle mr-2"></i>
                    <span class="font-semibold">Lokasi Bangunan Gedung</span>
                </div>

                <div class="grid grid-cols-1 gap-4">
                    <!-- Alamat Lokasi Bangunan -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                            <i class="fas fa-map-marked-alt mr-2 text-blue-600"></i> Alamat Lokasi Bangunan
                        </label>
                        <textarea name="lokasibangunan" rows="2" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required></textarea>
                    </div>

                    <!-- Kecamatan & Kelurahan -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Kecamatan -->
                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                                <i class="fas fa-map-pin mr-2 text-blue-600"></i> Kecamatan
                            </label>
                            <select name="kecamatanblora_id" id="kecamatanblora_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="">-- Pilih Kecamatan --</option>
                                @foreach($datakecamatan as $kec)
                                    <option value="{{ $kec->id }}" {{ old('kecamatanblora_id') == $kec->id ? 'selected' : '' }}>
                                        {{ $kec->kecamatanblora }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kecamatanblora_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Kelurahan/Desa -->
                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                                <i class="fas fa-map-marker-alt mr-2 text-blue-600"></i> Kelurahan/Desa
                            </label>
                            <select name="kelurahandesa_id" id="kelurahandesa_id" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                                <option value="">-- Pilih Kelurahan/Desa --</option>
                            </select>
                            @error('kelurahandesa_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Koordinat -->
                    <div class="form-group">
                        <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                            <i class="fas fa-location-arrow mr-2 text-blue-600"></i> Koordinat (Latitude, Longitude)
                        </label>
                        <input type="text" name="koordinat" class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="Contoh: -6.969987, 110.606125">
                    </div>
                </div>
            </div>

            <!-- Section 4: Upload Dokumen -->
            <div class="mb-8">
                <div class="bg-blue-50 text-blue-800 rounded-md p-3 mb-4 flex items-center">
                    <i class="fas fa-info-circle mr-2"></i>
                    <span class="font-semibold">Upload Dokumen Persyaratan Bantuan Teknis Gambar</span>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Column 1 -->
                    <div class="space-y-4">
                        <!-- KTP Pemohon -->
                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                                <i class="fas fa-id-card mr-2 text-blue-600"></i> KTP Pemohon
                            </label>
                            <input type="file" name="ktp" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" accept="image/*,.pdf" required>
                            <p class="mt-1 text-xs text-gray-500">Format: PDF/JPG/PNG | Maksimal 15MB</p>
                        </div>

                        <!-- Surat Permohonan -->
                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                                <i class="fas fa-file-alt mr-2 text-blue-600"></i> Surat Permohonan Bantuan Gambar
                            </label>
                            <div class="mb-2">
                                <span class="text-xs text-gray-500">Contoh Surat Permohonan:</span><br>
                                <a href="/assets/abgblora/logo/Surat_Permohonan_Bantuan_Gambar.docx" download class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded-md text-sm mt-1 hover:bg-blue-200">
                                    <i class="fas fa-download mr-2"></i> Unduh Formulir
                                </a>
                            </div>
                            <input type="file" name="npwp" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" accept="image/*,.pdf">
                            <p class="mt-1 text-xs text-gray-500">Format: PDF/JPG/PNG | Maksimal 15MB</p>
                        </div>

                        <!-- Berkas KRK -->
                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                                <i class="fas fa-file-contract mr-2 text-blue-600"></i> Berkas KRK
                            </label>
                            <input type="file" name="lampiranoss" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" accept="image/*,.pdf">
                            <p class="mt-1 text-xs text-gray-500">Format: PDF/JPG/PNG | Maksimal 15MB</p>
                        </div>

                        <!-- Surat Sewa Lahan -->
                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                                <i class="fas fa-file-signature mr-2 text-blue-600"></i> Surat Sewa Lahan
                            </label>
                            <input type="file" name="dokvalidasi" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" accept="image/*,.pdf">
                            <p class="mt-1 text-xs text-gray-500">Format: PDF/JPG/PNG | Maksimal 15MB</p>
                        </div>
                    </div>

                    <!-- Column 2 -->
                    <div class="space-y-4">
                        <!-- Sertifikat Tanah -->
                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                                <i class="fas fa-file-certificate mr-2 text-blue-600"></i> Sertifikat Tanah
                            </label>
                            <input type="file" name="sertifikattanah" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" accept="image/*,.pdf" required>
                            <p class="mt-1 text-xs text-gray-500">Format: PDF/JPG/PNG | Maksimal 15MB</p>
                        </div>

                        <!-- Bukti PBB -->
                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                                <i class="fas fa-receipt mr-2 text-blue-600"></i> Bukti PBB
                            </label>
                            <input type="file" name="buktipbb" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" accept="image/*,.pdf" required>
                            <p class="mt-1 text-xs text-gray-500">Format: PDF/JPG/PNG | Maksimal 15MB</p>
                        </div>

                        <!-- NIB -->
                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                                <i class="fas fa-map mr-2 text-blue-600"></i> (NIB) Nomor Induk Berusaha
                            </label>
                            <input type="file" name="siteplan" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" accept="image/*,.pdf">
                            <p class="mt-1 text-xs text-gray-500">Format: PDF/JPG/PNG | Maksimal 15MB</p>
                        </div>

                        <!-- Dokumen Kajian Tata Ruang -->
                        <div class="form-group">
                            <label class="block text-sm font-medium text-gray-700 mb-1 flex items-center">
                                <i class="fas fa-signature mr-2 text-blue-600"></i> Dokumen Kajian Tata Ruang
                            </label>
                            <input type="file" name="tandatangan" class="w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100" accept="image/*,.pdf">
                            <p class="mt-1 text-xs text-gray-500">Format: PDF/JPG/PNG | Maksimal 15MB</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end mt-6">
                <button type="button" onclick="openModal()" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    <i class="fas fa-paper-plane mr-2"></i> Kirim Permohonan
                </button>
            </div>
        </div>
    </div>

    <!-- Confirmation Modal -->
    <div id="confirmModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-lg p-6 max-w-md w-full mx-4">
            <h3 class="text-lg font-medium text-gray-900 mb-4">Konfirmasi Pengajuan</h3>

            <p class="text-sm text-gray-600 mb-4">Apakah Anda yakin dengan permohonan Anda?</p>

            <div class="flex items-start mb-4">
                <div class="flex items-center h-5">
                    <input id="dataConfirm" type="checkbox" class="focus:ring-blue-500 h-4 w-4 text-blue-600 border-gray-300 rounded" onchange="toggleSubmitButton()">
                </div>
                <div class="ml-3 text-sm">
                    <label for="dataConfirm" class="font-medium text-gray-700">Saya menyatakan bahwa data persyaratan yang saya kirim adalah sebenar-benarnya dan dapat dipertanggungjawabkan.</label>
                </div>
            </div>

            <div class="flex justify-end space-x-3">
                <button type="button" onclick="closeModal()" class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Batal
                </button>
                <button id="confirmSubmitBtn" type="button" onclick="submitForm()" disabled class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 disabled:opacity-50 disabled:cursor-not-allowed">
                    Ya, Kirim
                </button>
            </div>
        </div>
    </div>
</form>

<script>
// AJAX untuk mendapatkan kelurahan/desa berdasarkan kecamatan
document.getElementById('kecamatanblora_id').addEventListener('change', function() {
    const kecamatanId = this.value;
    const kelurahanSelect = document.getElementById('kelurahandesa_id');

    if (kecamatanId) {
        fetch(`/api/kelurahan?kecamatan_id=${kecamatanId}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                return response.json();
            })
            .then(data => {
                kelurahanSelect.innerHTML = '<option value="">-- Pilih Kelurahan/Desa --</option>';
                data.forEach(kelurahan => {
                    const option = document.createElement('option');
                    option.value = kelurahan.id;
                    option.textContent = kelurahan.nama || kelurahan.kelurahandesa;
                    kelurahanSelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error('Error fetching kelurahan data:', error);
                kelurahanSelect.innerHTML = '<option value="">-- Gagal memuat data --</option>';
            });
    } else {
        kelurahanSelect.innerHTML = '<option value="">-- Pilih Kelurahan/Desa --</option>';
    }
});

// Format input angka untuk luas dan tinggi bangunan
document.querySelectorAll('input[name="luasbangunan"], input[name="tinggibangunan"]').forEach(input => {
    input.addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9.]/g, '');
    });
});

// Modal functions
function openModal() {
    // Validasi form sebelum menampilkan modal
    const form = document.getElementById('signatureForm');
    let isValid = true;

    // Cek semua field required
    form.querySelectorAll('[required]').forEach(field => {
        if (!field.value.trim()) {
            isValid = false;
            field.classList.add('border-red-500');
        } else {
            field.classList.remove('border-red-500');
        }
    });

    if (!isValid) {
        alert('Harap lengkapi semua field yang wajib diisi!');
        return;
    }

    document.getElementById('confirmModal').classList.remove('hidden');
}

function closeModal() {
    document.getElementById('confirmModal').classList.add('hidden');
}

function toggleSubmitButton() {
    const checkbox = document.getElementById('dataConfirm');
    const btn = document.getElementById('confirmSubmitBtn');

    btn.disabled = !checkbox.checked;
}

function submitForm() {
    const checkbox = document.getElementById('dataConfirm');
    if (!checkbox.checked) {
        alert('Anda harus mencentang pernyataan terlebih dahulu');
        return;
    }

    document.getElementById('signatureForm').submit();
}
</script>


<style>
/* Navy Blue Theme */
.navy-theme {
    --primary-color: #001f3f;
    --secondary-color: #003366;
    --accent-color: #0056b3;
    --light-accent: #e6f0ff;
    --text-color: #333;
    --light-text: #f8f9fa;
}

.modern-card {
    background: white;
    border-radius: 15px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    padding: 2.5rem;
    margin: -50px auto 50px;
    position: relative;
    z-index: 2;
    max-width: 1200px;
}

.section-container {
    margin-bottom: 2.5rem;
    padding-bottom: 1.5rem;
    border-bottom: 1px solid #eee;
}

.section-container:last-child {
    border-bottom: none;
}

.form-label {
    font-weight: 500;
    margin-bottom: 0.5rem;
    color: var(--primary-color);
    display: flex;
    align-items: center;
}

.form-control {
    border: 1px solid #ced4da;
    border-radius: 8px;
    padding: 10px 15px;
    font-size: 15px;
    transition: all 0.3s;
}

.form-control:focus {
    border-color: var(--accent-color);
    box-shadow: 0 0 0 0.2rem rgba(0, 86, 179, 0.25);
}

.document-upload {
    margin-bottom: 1rem;
}

.document-upload small {
    font-size: 0.8rem;
    color: #6c757d;
}

.button-baru {
    background-color: #2563eb;
    color: white;
    padding: 8px 16px;
    border-radius: 8px;
    font-weight: 500;
    display: inline-flex;
    align-items: center;
    transition: all 0.3s;
}

.button-baru:hover {
    background-color: #1d4ed8;
    transform: translateY(-2px);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .modern-card {
        padding: 1.5rem;
        margin-top: -30px;
    }
}
</style>

<script>
// AJAX untuk mendapatkan kelurahan/desa berdasarkan kecamatan
document.getElementById('kecamatanblora_id').addEventListener('change', function() {
    const kecamatanId = this.value;
    const kelurahanSelect = document.getElementById('kelurahandesa_id');

    if (kecamatanId) {
        fetch(`/api/kelurahan?kecamatan_id=${kecamatanId}`)
            .then(response => response.json())
            .then(data => {
                kelurahanSelect.innerHTML = '<option value="">-- Pilih Kelurahan/Desa --</option>';
                data.forEach(kelurahan => {
                    const option = document.createElement('option');
                    option.value = kelurahan.id;
                    option.textContent = kelurahan.nama;
                    kelurahanSelect.appendChild(option);
                });
            });
    } else {
        kelurahanSelect.innerHTML = '<option value="">-- Pilih Kelurahan/Desa --</option>';
    }
});

// Format input angka untuk luas dan tinggi bangunan
document.querySelectorAll('input[name="luasbangunan"], input[name="tinggibangunan"]').forEach(input => {
    input.addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9.]/g, '');
    });
});

// Modal functions
function openModal() {
    const modal = document.getElementById("confirmModal");
    if (modal) modal.style.display = "flex";
}

function closeModal() {
    const modal = document.getElementById("confirmModal");
    if (modal) modal.style.display = "none";
}

function toggleSubmitButton() {
    const checkbox = document.getElementById("dataConfirm");
    const btn = document.getElementById("confirmSubmitBtn");

    if (checkbox.checked) {
        btn.disabled = false;
        btn.style.backgroundColor = "#2563eb";
        btn.style.cursor = "pointer";
    } else {
        btn.disabled = true;
        btn.style.backgroundColor = "#f97316";
        btn.style.cursor = "not-allowed";
    }
}

function submitForm() {
    // Cek apakah checkbox dicentang
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
    <br><br>
</section>



  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


  @include('frontend.abgblora.00_fiturmenu.03_footer')
  <!-- back to top start -->
  <div class="progress-wrap">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
          <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
  </div>
  <!-- back to top end -->

</div>

@include('frontend.abgblora.00_fiturmenu.04_footer')


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#kecamatanblora_id').on('change', function () {
        var kecamatanID = $(this).val();

        $('#kelurahandesa_id').empty().append('<option value="">Memuat data...</option>');

        if (kecamatanID) {
            $.ajax({
                url: '{{ route("permohonan.krkhunian") }}', // Sesuaikan dengan route di web.php
                type: 'GET',
                data: { kecamatan_id: kecamatanID },
                success: function (data) {
                    $('#kelurahandesa_id').empty().append('<option value="">-- Pilih Kelurahan/Desa --</option>');
                    $.each(data, function (key, value) {
                        $('#kelurahandesa_id').append('<option value="' + value.id + '">' + value.desa + '</option>');
                    });
                },
                error: function () {
                    $('#kelurahandesa_id').empty().append('<option value="">Gagal memuat data</option>');
                }
            });
        } else {
            $('#kelurahandesa_id').empty().append('<option value="">-- Pilih Kelurahan/Desa --</option>');
        }
    });
</script>
