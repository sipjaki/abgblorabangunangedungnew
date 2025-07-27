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
<form id="signatureForm" action="{{ route('feformbantuangambarcreate') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5 w-full" style="margin-top:-35px;">
    @csrf
    <input type="hidden" name="user_id" value="{{ $dinas_id }}">

    <div class="container-fluid px-0 navy-theme">
        <!-- Main Form -->
        <div class="modern-card">
            <!-- Section 1: Informasi Pemohon -->
            <div class="section-container">
                <div class="alert alert-primary mt-3 mb-2 py-2 d-flex align-items-center" style="margin-top: -100px; margin-bottom: -35px;">
                    <i class="fas fa-info-circle me-2"></i>
                    <div class="button-baru">
                        <strong style="color: black;">Informasi Pemohon</strong>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-user me-2" style="color: navy;"></i> Nama Pemohon
                            </label>
                            <input type="text" name="namapemohon" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-envelope me-2" style="color: navy;"></i> Email
                            </label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-phone me-2" style="color: navy;"></i> Nomor Telepon
                            </label>
                            <input type="text" name="nomortelepon" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-id-card me-2" style="color: navy;"></i> NIK KTP
                            </label>
                            <input type="text" name="nikktp" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label class="form-label">
                        <i class="fas fa-map-marker-alt me-2" style="color: navy;"></i> Alamat Pemohon
                    </label>
                    <textarea name="alamatpemohon" class="form-control" rows="2" required></textarea>
                </div>
            </div>

            <!-- Section 2: Informasi Bangunan -->
            <div class="section-container">
                <div class="alert alert-primary mt-3 mb-2 py-2 d-flex align-items-center">
                    <i class="fas fa-info-circle me-2"></i>
                    <div class="button-baru">
                        <strong style="color: black;">Informasi Bangunan Gedung</strong>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-drafting-compass me-2" style="color: navy;"></i> Jenis Permohonan Gambar
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
                                <i class="fas fa-warehouse me-2" style="color: navy;"></i> Fungsi Bangunan
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
                                <i class="fas fa-ruler-combined me-2" style="color: navy;"></i> Luas Bangunan (m²)
                            </label>
                            <input type="text" name="luasbangunan" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-arrows-alt-v me-2" style="color: navy;"></i> Tinggi Bangunan (m)
                            </label>
                            <input type="text" name="tinggibangunan" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-layer-group me-2" style="color: navy;"></i> Jumlah Lantai
                            </label>
                            <input type="number" name="jumlahlantai" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="form-label">
                                <i class="fas fa-tag me-2" style="color: navy;"></i> Klasifikasi Bangunan
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
                        <i class="fas fa-info-circle me-2" style="color: navy;"></i> Peruntukan Untuk
                    </label>
                    <input type="text" name="peruntukanuntuk" class="form-control" required>
                </div>
            </div>

            <!-- Section 3: Lokasi Bangunan -->
            <div class="section-container">
                <div class="alert alert-primary mt-3 mb-2 py-2 d-flex align-items-center">
                    <i class="fas fa-info-circle me-2"></i>
                    <div class="button-baru">
                        <strong style="color: black;">Lokasi Bangunan Gedung</strong>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">
                        <i class="fas fa-map-marked-alt me-2" style="color: navy;"></i> Alamat Lokasi Bangunan
                    </label>
                    <textarea name="lokasibangunan" class="form-control" rows="2" required></textarea>
                </div>

                <div class="row mt-3">
                    <!-- Kecamatan -->
                    <div class="col-md-6">
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

                    <!-- Koordinat -->
                    <div class="col-md-12 mt-3">
                        <div class="form-group">
                            <label class="form-label d-flex align-items-center">
                                <i class="fas fa-location-arrow me-2" style="color: navy;"></i> Koordinat (Latitude, Longitude)
                            </label>
                            <input type="text" name="koordinat" class="form-control" placeholder="Contoh: -6.969987, 110.606125">
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section 4: Upload Dokumen -->
            <div class="section-container">
                <div class="alert alert-primary mt-3 mb-2 py-2 d-flex align-items-center">
                    <i class="fas fa-info-circle me-2"></i>
                    <div class="button-baru">
                        <strong style="color: black;">Upload Dokumen Persyaratan Bantuan Teknis Gambar</strong>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="document-upload">
                            <label class="form-label">
                                <i class="fas fa-id-card me-2" style="color: navy;"></i> KTP Pemohon
                            </label>
                            <input type="file" name="ktp" class="form-control" accept="image/*,.pdf" required>
                            <small class="text-muted">.Pdf | Max 15MB</small>
                        </div>

                        <div class="document-upload mt-3">
                            <label class="form-label d-block mb-2">
                                <i class="fas fa-file-alt me-2" style="color: navy;"></i>
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
                                <i class="fas fa-file-contract me-2" style="color: navy;"></i> Berkas KRK
                            </label>
                            <input type="file" name="lampiranoss" class="form-control" accept="image/*,.pdf">
                            <small class="text-muted">.pdf | Max 15MB</small>
                        </div>

                        <div class="document-upload mt-3">
                            <label class="form-label">
                                <i class="fas fa-file-signature me-2" style="color: navy;"></i> Surat Sewa Lahan
                            </label>
                            <input type="file" name="dokvalidasi" class="form-control" accept="image/*,.pdf">
                            <small class="text-muted">.pdf | Max 15MB</small>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="document-upload">
                            <label class="form-label">
                                <i class="fas fa-file-certificate me-2" style="color: navy;"></i> Sertifikat Tanah
                            </label>
                            <input type="file" name="sertifikattanah" class="form-control" accept="image/*,.pdf" required>
                            <small class="text-muted">.pdf | Max 15MB</small>
                        </div>

                        <div class="document-upload mt-3">
                            <label class="form-label">
                                <i class="fas fa-receipt me-2" style="color: navy;"></i> Bukti PBB
                            </label>
                            <input type="file" name="buktipbb" class="form-control" accept="image/*,.pdf" required>
                            <small class="text-muted">.pdf | Max 15MB</small>
                        </div>

                        <div class="document-upload mt-3">
                            <label class="form-label">
                                <i class="fas fa-map me-2" style="color: navy;"></i> (NIB) Nomor Induk Berusaha
                            </label>
                            <input type="file" name="siteplan" class="form-control" accept="image/*,.pdf">
                            <small class="text-muted">.pdf | Max 15MB</small>
                        </div>

                        <div class="document-upload mt-3">
                            <label class="form-label">
                                <i class="fas fa-signature me-2" style="color: navy;"></i> Dokumen Kajian Tata Ruang
                            </label>
                            <input type="file" name="tandatangan" class="form-control" accept="image/*,.pdf">
                            <small class="text-muted">.pdf | Max 15MB</small>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-end" style="margin-top: 20px;">
                <button type="button" class="button-baru" onclick="openModal()">
                    <i class="fab fa-telegram-plane w-5 h-5"></i>
                    Kirim Permohonan
                </button>
            </div>
        </div>
    </div>

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
</form>

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
