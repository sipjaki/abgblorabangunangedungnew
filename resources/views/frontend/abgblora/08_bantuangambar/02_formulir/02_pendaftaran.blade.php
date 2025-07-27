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

            <form id="signatureForm" action="{{ route('permohonan.bantekcreate') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5 w-full" style="margin-top:-35px;">
                @csrf


                <input type="hidden" name="user_id" value="{{ $dinas_id }}">
<div class="container-fluid px-0 navy-theme">
    {{-- <!-- Header Section -->
    <div class="program-header mb-5">
        <div class="header-overlay">
            <h1 class="program-title">PENDAFTARAN PROGRAM PELAYANAN BANTUAN TEKNIS</h1>
            <h2 class="program-subtitle">Pembuatan Gambar untuk Pengajuan PBG</h2>
            <h3 class="program-year">Kabupaten Blora</h3>
        </div>
    </div> --}}

    <!-- Main Form -->
    <div class="modern-card">
        <!-- Section 1: Informasi Pemohon -->
        <div class="section-container">

<div class="alert alert-primary mt-3 mb-2 py-2 d-flex align-items-center" style="margin-top: -100px; margin-bottom: -35px;">
    <i class="fas fa-info-circle me-2"></i>
    <div class="button-baru">
        <strong>Informasi Pemohon </strong>
    </div>
</div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-user" style="margin-right: 8px; color: navy;"></i> Nama Pemohon
                        </label>
                        <input type="text" name="namapemohon" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-envelope" style="margin-right: 8px; color: navy;"></i> Email
                        </label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-phone" style="margin-right: 8px; color: navy;"></i> Nomor Telepon
                        </label>
                        <input type="text" name="nomortelepon" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-id-card" style="margin-right: 8px; color: navy;"></i> NIK KTP
                        </label>
                        <input type="text" name="nikktp" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="form-group mt-3">
                <label class="form-label">
                    <i class="fas fa-map-marker-alt" style="margin-right: 8px; color: navy;"></i> Alamat Pemohon
                </label>
                <textarea name="alamatpemohon" class="form-control" rows="2" required></textarea>
            </div>
        </div>

        <!-- Section 2: Informasi Bangunan -->
        <div class="section-container">

<div class="alert alert-primary mt-3 mb-2 py-2 d-flex align-items-center" style="margin-top: -100px; margin-bottom: -35px;">
    <i class="fas fa-info-circle me-2"></i>
    <div class="button-baru">
        <strong>Informasi Bangunan Gedung </strong>
    </div>
</div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-drafting-compass" style="margin-right: 8px; color: navy;"></i> Jenis Permohonan Gambar
                        </label>
                        <select name="jenispermohonangambar_id" class="form-control" required>
                            <option value="">-- Pilih Jenis Permohonan --</option>
                            @foreach($jenispermohonan as $jenis)
                                <option value="{{ $jenis->id }}">{{ $jenis->jenis }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-warehouse" style="margin-right: 8px; color: navy;"></i> Fungsi Bangunan
                        </label>
                        <select name="fungsibangunangambar_id" class="form-control" required>
                            <option value="">-- Pilih Fungsi Bangunan --</option>
                            @foreach($fungsibangunan as $fungsi)
                                <option value="{{ $fungsi->id }}">{{ $fungsi->fungsibangunan }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-ruler-combined" style="margin-right: 8px; color: navy;"></i> Luas Bangunan (m²)
                        </label>
                        <input type="text" name="luasbangunan" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-arrows-alt-v" style="margin-right: 8px; color: navy;"></i> Tinggi Bangunan (m)
                        </label>
                        <input type="text" name="tinggibangunan" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">
                            <i class="fas fa-layer-group" style="margin-right: 8px; color: navy;"></i> Jumlah Lantai
                        </label>
                        <input type="number" name="jumlahlantai" class="form-control" required>
                    </div>
                </div>

               <div class="col-md-6">
    <div class="form-group">
        <label class="form-label">
            <i class="fas fa-tag" style="margin-right: 8px; color: navy;"></i> Klasifikasi Bangunan
        </label>
        <select name="klasifikasibangunan" class="form-control" required>
            <option value="">-- Pilih Klasifikasi --</option>
            <option value="Sederhana">Sederhana</option>
            <option value="Tidak Sederhana">Tidak Sederhana</option>
        </select>
    </div>
</div>

            </div>

            <div class="form-group mt-3">
                <label class="form-label">
                    <i class="fas fa-info-circle" style="margin-right: 8px; color: navy;"></i> Peruntukan Untuk
                </label>
                <input type="text" name="peruntukanuntuk" class="form-control" required>
            </div>
        </div>

        <!-- Section 3: Lokasi Bangunan -->
        <div class="section-container">

<div class="alert alert-primary mt-3 mb-2 py-2 d-flex align-items-center" style="margin-top: -100px; margin-bottom: -35px;">
    <i class="fas fa-info-circle me-2"></i>
    <div class="button-baru">
        <strong>Lokasi Bangunan Gedung</strong>
    </div>
</div>
            <div class="form-group">
                <label class="form-label">
                    <i class="fas fa-map-marked-alt" style="margin-right: 8px; color: navy;"></i> Alamat Lokasi Bangunan
                </label>
                <textarea name="lokasibangunan" class="form-control" rows="2" required></textarea>
            </div>

            <div class="row mt-3">
                <div class="row">
    <!-- Kecamatan -->
        <div class="form-group">
            <label class="form-label d-flex align-items-center">
                <i class="fas fa-map-pin me-2" style="color: navy;"></i> Kecamatan
            </label>
            <select name="kecamatanblora_id" id="kecamatanblora_id" class="form-control @error('kecamatanblora_id') is-invalid @enderror" required>
                <option value="">-- Pilih Kecamatan --</option>
                @foreach($datakecamatan as $kec)
                    <option value="{{ $kec->id }}" {{ old('kecamatanblora_id') == $kec->id ? 'selected' : '' }}>
                        {{ $kec->kecamatanblora }}
                    </option>
                @endforeach
            </select>
            @error('kecamatanblora_id')
                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <!-- Kelurahan/Desa -->
    <div class="col-md-6">
        <div class="form-group">
            <label class="form-label d-flex align-items-center">
                <i class="fas fa-map-marker-alt me-2" style="color: navy;"></i> Kelurahan/Desa
            </label>
            <select name="kelurahandesa_id" id="kelurahandesa_id" class="form-control @error('kelurahandesa_id') is-invalid @enderror" required>
                <option value="">-- Pilih Kelurahan/Desa --</option>
            </select>
            @error('kelurahandesa_id')
                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
            @enderror
        </div>
    </div>

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

            <div class="form-group mt-3">
                <label class="form-label">
                    <i class="fas fa-location-arrow" style="margin-right: 8px; color: navy;"></i> Koordinat (Latitude, Longitude)
                </label>
                <input type="text" name="koordinat" class="form-control" placeholder="Contoh: -6.969987, 110.606125">
            </div>
        </div>

        <!-- Section 4: Upload Dokumen -->
        <div class="section-container">

<div class="alert alert-primary mt-3 mb-2 py-2 d-flex align-items-center" style="margin-top: -100px; margin-bottom: -35px;">
    <i class="fas fa-info-circle me-2"></i>
    <div class="button-baru">
        <strong>Upload Dokumen Persyaratan Bantuan Teknis Gambar </strong>
    </div>
</div>
            <div class="row">
                <div class="col-md-6">
                    <div class="document-upload">
                        <label class="form-label">
                            <i class="fas fa-id-card" style="margin-right: 8px; color: navy;"></i> KTP Pemohon
                        </label>
                        <input type="file" name="ktp" class="form-control" accept="image/*,.pdf" required>
                        <small class="text-muted">.Pdf | Max 15MB</small>
                    </div>

<div class="document-upload mt-3">
    <label class="form-label d-block mb-2">
        <i class="fas fa-file-alt" style="margin-right: 8px; color: navy;"></i>
        Surat Permohonan Bantuan Gambar
    </label>

    <div class="mb-2">
        <span class="text-muted">Contoh Surat Permohonan:</span><br>
        <a href="/assets/abgblora/logo/Surat_Permohonan_Bantuan_Gambar.docx" download class="button-baru mt-1 d-inline-flex align-items-center">
            <i class="bi bi-download me-2"></i> Unduh Formulir
        </a>
    </div>

    <input type="file" name="npwp" class="form-control" accept="image/*,.pdf">
    <small class="text-muted">Format .pdf atau gambar | Maksimal 15MB</small>
</div>

                    <div class="document-upload mt-3">
                        <label class="form-label">
                            <i class="fas fa-file-contract" style="margin-right: 8px; color: navy;"></i> Berkas KRK
                        </label>
                        <input type="file" name="lampiranoss" class="form-control" accept="image/*,.pdf">
                        <small class="text-muted">.pdf | Max 15MB</small>
                    </div>

                    <div class="document-upload mt-3">
                        <label class="form-label">
                            <i class="fas fa-file-signature" style="margin-right: 8px; color: navy;"></i> Surat Sewa Lahan
                        </label>
                        <input type="file" name="dokvalidasi" class="form-control" accept="image/*,.pdf">
                        <small class="text-muted">.pdf | Max 15MB</small>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="document-upload">
                        <label class="form-label">
                            <i class="fas fa-file-certificate" style="margin-right: 8px; color: navy;"></i> Sertifikat Tanah
                        </label>
                        <input type="file" name="sertifikattanah" class="form-control" accept="image/*,.pdf" required>
                        <small class="text-muted">.pdf | Max 15MB</small>
                    </div>

                    <div class="document-upload mt-3">
                        <label class="form-label">
                            <i class="fas fa-receipt" style="margin-right: 8px; color: navy;"></i> Bukti PBB
                        </label>
                        <input type="file" name="buktipbb" class="form-control" accept="image/*,.pdf" required>
                        <small class="text-muted">.pdf | Max 15MB</small>
                    </div>

                    <div class="document-upload mt-3">
                        <label class="form-label">
                            <i class="fas fa-map" style="margin-right: 8px; color: navy;"></i> (NIB) Nomor Induk Berusaha
                        </label>
                        <input type="file" name="siteplan" class="form-control" accept="image/*,.pdf">
                        <small class="text-muted">.pdf | Max 15MB</small>
                    </div>

                    <div class="document-upload mt-3">
                        <label class="form-label">
                            <i class="fas fa-signature" style="margin-right: 8px; color: navy;"></i> Dokumen Kajian Tata Ruang
                        </label>
                        <input type="file" name="tandatangan" class="form-control" accept="image/*,.pdf">
                        <small class="text-muted">.pdf | Max 15MB</small>
                    </div>
                </div>
            </div>
{{--
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="document-upload">
                        <label class="form-label">
                            <i class="fas fa-file-image" style="margin-right: 8px; color: navy;"></i> Foto Kondisi 1
                        </label>
                        <input type="file" name="foto1" class="form-control" accept="image/*,.pdf" required>
                        <small class="text-muted">Format: JPG/PNG/PDF, Max 2MB</small>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="document-upload">
                        <label class="form-label">
                            <i class="fas fa-file-image" style="margin-right: 8px; color: navy;"></i> Foto Kondisi 2
                        </label>
                        <input type="file" name="foto2" class="form-control" accept="image/*,.pdf">
                        <small class="text-muted">Format: JPG/PNG/PDF, Max 2MB</small>
                    </div>
                </div>
            </div> --}}

            {{-- <div class="row mt-3">
                <div class="col-md-6">
                    <div class="document-upload">
                        <label class="form-label">
                            <i class="fas fa-file-pdf" style="margin-right: 8px; color: navy;"></i> Dokumen Gambar
                        </label>
                        <input type="file" name="dokumengambar" class="form-control" accept=".pdf,.dwg">
                        <small class="text-muted">Format: PDF/DWG, Max 5MB</small>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="document-upload">
                        <label class="form-label">
                            <i class="fas fa-file-alt" style="margin-right: 8px; color: navy;"></i> Berita Acara Sidang
                        </label>
                        <input type="file" name="beritaacarasidang" class="form-control" accept="image/*,.pdf">
                        <small class="text-muted">Format: JPG/PNG/PDF, Max 2MB</small>
                    </div>
                </div>
            </div> --}}
        </div>


    <div class="flex justify-end" style="margin-top: 20px;">
        <button type="button" class="button-baru" onclick="openModal()">
            <i class="fab fa-telegram-plane w-5 h-5"></i>
            Kirim Permohonan
        </button>
    </div>

        <!-- Submit Section -->
        {{-- <div class="section-container text-center">
            <button type="submit" class="btn-submit">
                <i class="fas fa-paper-plane"></i> Kirim Permohonan
            </button>
        </div> --}}
    </div>
</div>

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

.program-header {
    background: linear-gradient(rgba(0, 31, 63, 0.8), rgba(0, 31, 63, 0.8)),
                url('https://source.unsplash.com/1200x600/?construction,house');
    background-size: cover;
    background-position: center;
    color: white;
    padding: 4rem 0;
    text-align: center;
    border-radius: 0 0 20px 20px;
    margin-bottom: 30px;
}

.program-title {
    font-size: 2.2rem;
    font-weight: 700;
    margin-bottom: 0.5rem;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.5);
}

.program-subtitle {
    font-size: 1.5rem;
    font-weight: 500;
    margin-bottom: 0.5rem;
}

.program-year {
    font-size: 1.2rem;
    font-weight: 400;
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

.section-title {
    color: var(--primary-color);
    font-weight: 600;
    margin-bottom: 1.5rem;
    display: flex;
    align-items: center;
    gap: 10px;
    font-size: 1.3rem;
}

.section-title i {
    font-size: 1.3rem;
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

.btn-submit {
    background-color: var(--accent-color);
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 600;
    font-size: 1.1rem;
    cursor: pointer;
    transition: all 0.3s;
    display: inline-flex;
    align-items: center;
    gap: 10px;
}

.btn-submit:hover {
    background-color: #004494;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0, 86, 179, 0.3);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .program-title {
        font-size: 1.8rem;
    }
    .program-subtitle {
        font-size: 1.2rem;
    }
    .modern-card {
        padding: 1.5rem;
        margin-top: -30px;
    }
    .section-title {
        font-size: 1.1rem;
    }
}
</style>

<script>
// AJAX untuk mendapatkan kelurahan/desa berdasarkan kecamatan
// document.getElementById('kecamatanblora_id').addEventListener('change', function() {
//     const kecamatanId = this.value;
//     const kelurahanSelect = document.getElementById('kelurahandesa_id');

//     if (kecamatanId) {
//         fetch(`/api/kelurahan?kecamatan_id=${kecamatanId}`)
//             .then(response => response.json())
//             .then(data => {
//                 kelurahanSelect.innerHTML = '<option value="">-- Pilih Kelurahan/Desa --</option>';
//                 data.forEach(kelurahan => {
//                     const option = document.createElement('option');
//                     option.value = kelurahan.id;
//                     option.textContent = kelurahan.nama;
//                     kelurahanSelect.appendChild(option);
//                 });
//             });
//     } else {
//         kelurahanSelect.innerHTML = '<option value="">-- Pilih Kelurahan/Desa --</option>';
//     }
// });

// Format input angka untuk luas dan tinggi bangunan
document.querySelectorAll('input[name="luasbangunan"], input[name="tinggibangunan"]').forEach(input => {
    input.addEventListener('input', function(e) {
        this.value = this.value.replace(/[^0-9.]/g, '');
    });
});
</script>

<!-- Modal Konfirmasi -->
<div id="confirmModal" style="display: none; position: fixed; inset: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px 30px; border-radius: 12px; max-width: 400px; width: 90%; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
      <p style="font-size: 16px; font-weight: 600; margin-bottom: 20px;">
        Apakah Anda yakin dengan permohonan Anda?
      </p>

      <!-- Checkbox -->
      <div style="display: flex; align-items: center; margin-bottom: 16px;">
        <input type="checkbox" id="dataConfirm" style="margin-right: 8px;" onchange="toggleSubmitButton()">
        <label for="dataConfirm" style="font-size: 14px; color: #6b7280; flex-grow: 1; text-align: justify;">
          Saya menyatakan bahwa data persyaratan yang saya kirim adalah sebenar-benarnya dan dapat dipertanggungjawabkan.
        </label>
      </div>

      <!-- Tombol -->
      <div style="display: flex; justify-content: center; gap: 12px;">
        <button id="confirmSubmitBtn"
                onclick="submitForm()"
                disabled
                class="btn-kirim"
                style="background-color: #f97316; color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: not-allowed;">
          Ya, Kirim
        </button>
        <button type="button"
                onclick="closeModal()"
                class="btn-cancel-hover"
                style="background-color: #9CA3AF; color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer;">
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

    function submitForm() {
    // Cek apakah checkbox dicentang
    const dataConfirm = document.getElementById("dataConfirm");
    if (!dataConfirm.checked) {
    alert("Anda harus menyatakan bahwa data yang Anda kirim adalah benar.");
    return;
    }
    // Ganti ID form sesuai dengan form kamu
    document.getElementById("formKRK").submit();
    }
    </script>

<script>
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
    </script>



        <div class="flex justify-end w-full gap-4" style="margin-top: -20px;">
        <style>
        .btn-reset, .btn-submit {
            display: flex;
            align-items: center;
            padding: 10px 16px;
            border-radius: 10px;
            font-weight: 500;
            font-size: 14px;
            cursor: pointer;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-reset {
            background-color: #dc2626; /* merah */
            color: white;
        }

        .btn-reset:hover {
            background-color: white;
            color: #dc2626;
            border: 1px solid #dc2626;
        }

        .btn-submit {
            background-color: #2563eb; /* biru */
            color: white;
        }

        .btn-submit:hover {
            background-color: white;
            color: #2563eb;
            border: 1px solid #2563eb;
        }

        .btn-reset i,
        .btn-submit i {
            margin-right: 8px;
        }
        </style>



</div>
</div>


<script>
function previewFile(input, previewId) {
    const file = input.files[0];
    const preview = document.getElementById(previewId);
    preview.innerHTML = ""; // kosongkan preview sebelumnya

    if (file) {
        const reader = new FileReader();

        reader.onload = function (e) {
            if (file.type.includes("image")) {
                preview.innerHTML = `<img src="${e.target.result}" class="w-full max-h-[150px] object-contain border rounded" />`;
            } else if (file.type === "application/pdf") {
                // Menggunakan iframe dan mengatur zoom out lebih jauh
                preview.innerHTML = `
                    <iframe src="${e.target.result}#toolbar=0&zoom=35"
                            class="w-full"
                            style="height: 400px; border: 1px solid #ccc; border-radius: 8px;"
                            frameborder="0">
                    </iframe>
                `;
            } else {
                preview.innerText = "File tidak bisa dipreview";
            }
        };

        reader.readAsDataURL(file);
    }
}

    </script>


                {{-- <button type="submit" class="bg-blue-600 px-4 py-2 rounded" style="color: black;">Kirim Permohonan</button> --}}

            </form>

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
