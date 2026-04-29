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
    margin: 0;
    padding: 0;
    position: relative;
    left: 0;
    "
>

<section id="breadcrumb" class="container max-w-[1130px] mx-auto" style="margin-top: 145px;">
    <div class="flex items-center gap-[20px]">
      <!-- Gambar di kiri -->
      {{-- <img src="/assets/abgblora/logo/iconabgblora.png" alt="" class="w-[60px] -my-[15px]" width="10%" style="margin-right: 20px;"> --}}

      <!-- Breadcrumb di kanan -->
      <div class="flex gap-[30px] items-center flex-wrap">
        <span>/</span>
        {{-- <a href="/permohonankrk" class="last-of-type:font-bold transition-all duration-300 text-blue-600" style="color: blue;">
         {{$title}}
        </a> --}}
      </div>
    </div>

  </section>


 <section id="details" class="container max-w-[1130px] mx-auto flex flex-col sm:flex-row gap-5" style="margin-top: 100px;">

     <div class="flex flex-col gap-5 w-full" style="margin-top: -25px;">

        <form id="signatureForm" action="{{ route('perkonsultanperencanacreate') }}" method="POST" enctype="multipart/form-data" class="flex flex-col gap-5 w-full" style="margin-top:-35px;">
                @csrf

<div class="alert alert-primary mt-3 mb-2 py-2 d-flex align-items-center">
    <i class="bi bi-info-circle me-2"></i>
    <div>
        <strong>Informasi Permohonan Konsultan Perencana Teknis </strong>
    </div>
</div>

<div class="row mt-3" style="margin-top: -25px;">
    <div class="form-modern col-md-6" style="margin-top: -40px;">
        <div>
            <label class="form-label-modern d-flex align-items-center" for="cadangan1">
    <i class="bi bi-person-vcard-fill" style="margin-right: 8px; color: navy;"></i>
    Nama Badan Usaha
</label>
            <input type="text" name="cadangan1" id="cadangan1" placeholder="Nama Badan Usaha"
                class="form-control @error('cadangan1') is-invalid @enderror"
                value="{{ old('cadangan1') }}">
            @error('cadangan1')
                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="form-modern col-md-6" style="margin-top: -40px;">
        <div>
            <label class="form-label-modern d-flex align-items-center" for="rt">
                <i class="bi bi-phone" style="margin-right: 8px; color: navy;"></i> No Whatsapp
            </label>
            <input type="number" name="cadangan3" id="cadangan3" placeholder="No Telepon"
                class="form-control @error('cadangan3') is-invalid @enderror"
                value="{{ old('cadangan3') }}">
            @error('cadangan3')
                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
            @enderror
        </div>
    </div>


</div>
<!-- NIK -->

<!-- RT/RW -->
<div class="row mt-3" style="margin-top: -40px;">

        <div class="form-modern col-md-12" style="margin-top: -40px;">
        <div>
            <label class="form-label-modern d-flex align-items-center" for="rw">
                <i class="bi bi-calendar" style="margin-right: 8px; color: navy;"></i> Nama Direktur Utama
            </label>
            <input type="text" name="cadangan2" id="cadangan2" placeholder="Nama Direktur Utama"
                class="form-control @error('cadangan2') is-invalid @enderror"
                value="{{ old('cadangan2') }}">
            @error('cadangan2')
                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="form-modern col-md-12" style="margin-top: -10px;">
        <div>
            <label class="form-label-modern d-flex align-items-center" for="rw">
                <i class="bi bi-calendar" style="margin-right: 8px; color: navy;"></i> Alamat Badan Usaha
            </label>
            <input type="text" name="cadangan4" id="cadangan4" placeholder="Alamat Badan Usaha"
                class="form-control @error('cadangan4') is-invalid @enderror"
                value="{{ old('cadangan4') }}">
            @error('cadangan4')
                <div class="invalid-feedback" style="color: red;">{{ $message }}</div>
            @enderror
        </div>
    </div>

</div>

<div class="alert alert-primary mt-3 mb-2 py-2 d-flex align-items-center" style="margin-top: -40px;">
    <i class="bi bi-info-circle me-2"></i>
    <div>
        <strong>Berkas Permohonan  </strong>
    </div>
</div>


<div class="flex gap-4 w-full mt-4">
    <!-- KTP -->

                <!-- Sertifikat Tanah -->
    <div class="flex flex-col w-1/2" style="margin-top:-60px;">
        <label for="sertifikattanah" class="font-semibold text-[#030303] flex items-center gap-2 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span class="text-sm">(NIB) Nomor Induk Berusaha | File  <br> .pdf | Max 20 MB</span>
        </label>
        <input id="cadangan5" name="cadangan5" type="file" accept="application/pdf,image/*"
            value="{{ old('cadangan5') }}"
            class="border border-[#ccc] rounded-md p-2 mb-2 @error('cadangan5') border-red-500 @enderror"
            onchange="previewFile(this, 'sertifikatTanahPreview')" />
        <div id="sertifikatTanahPreview" class="mt-1">
            @if(session('sertifikattanah_temp'))
                <div class="mt-1 text-sm text-gray-700">
                    {{-- File sudah diunggah: --}}
                    <a href="{{ Storage::url(session('sertifikattanah_temp')) }}" target="_blank" class="text-blue-500 underline"></a>
                </div>
            @elseif(old('sertifikattanah'))
                <div class="mt-1 text-sm text-gray-700">
                    File sudah dipilih: {{ old('cadangan5') }}
                </div>
            @endif
        </div>
        @error('cadangan5')
            <div class="text-red-600 text-sm mt-1" style="color: red; font-size:14px;">{{ $message }}</div>
        @enderror
    </div>



    <div class="flex flex-col w-1/2" style="margin-top:-60px;">
        <label for="sertifikattanah" class="font-semibold text-[#030303] flex items-center gap-2 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span class="text-sm">SBU Jika (Badan Usaha)/ SKK Jika (Perseorangan) <br> File .pdf | Max 20 MB</span>
        </label>
        <input id="cadangan7" name="cadangan7" type="file" accept="application/pdf,image/*"
            value="{{ old('cadangan7') }}"
            class="border border-[#ccc] rounded-md p-2 mb-2 @error('cadangan7') border-red-500 @enderror"
            onchange="previewFile(this, 'sertifikatBerusaha')" />
        <div id="sertifikatBerusaha" class="mt-1">
            @if(session('cadangan7_temp'))
                <div class="mt-1 text-sm text-gray-700">
                    {{-- File sudah diunggah: --}}
                    <a href="{{ Storage::url(session('cadangan7_temp')) }}" target="_blank" class="text-blue-500 underline"></a>
                </div>
            @elseif(old('cadangan7'))
                <div class="mt-1 text-sm text-gray-700">
                    File sudah dipilih: {{ old('cadangan7') }}
                </div>
            @endif
        </div>
        @error('cadangan7')
            <div class="text-red-600 text-sm mt-1" style="color: red; font-size:14px;">{{ $message }}</div>
        @enderror
    </div>

</div>

<div class="flex gap-4 w-full mt-4">

    <div class="flex flex-col w-1/2" style="margin-top:-60px;">
        <label for="sertifikattanah" class="font-semibold text-[#030303] flex items-center gap-2 mb-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
            </svg>
            <span class="text-sm">Riwayat Pekerjaan | File  <br> .pdf | Max 20 MB</span>
        </label>
        <input id="cadangan8" name="cadangan8" type="file" accept="application/pdf,image/*"
            value="{{ old('cadangan8') }}"
            class="border border-[#ccc] rounded-md p-2 mb-2 @error('cadangan8') border-red-500 @enderror"
            onchange="previewFile(this, 'sertifikatDatapersonil')" />
        <div id="sertifikatDatapersonil" class="mt-1">
            @if(session('cadangan8_temp'))
                <div class="mt-1 text-sm text-gray-700">
                    {{-- File sudah diunggah: --}}
                    <a href="{{ Storage::url(session('cadangan8_temp')) }}" target="_blank" class="text-blue-500 underline"></a>
                </div>
            @elseif(old('cadangan8'))
                <div class="mt-1 text-sm text-gray-700">
                    File sudah dipilih: {{ old('cadangan8') }}
                </div>
            @endif
        </div>
        @error('cadangan8')
            <div class="text-red-600 text-sm mt-1" style="color: red; font-size:14px;">{{ $message }}</div>
        @enderror
    </div>


    <div class="flex flex-col w-1/2" style="margin-top:-60px;">

    <label for="cadangan6" class="font-semibold text-[#030303] flex items-start gap-2 mb-2">

        <!-- ICON -->
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600 mt-1" fill="none" viewBox="0 0 24 24"
            stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
        </svg>

        <!-- TEXT + BUTTON -->
        <div class="flex flex-col text-sm font-poppins">
            <span>
                Surat Permohonan | File <br> .pdf | Max 20 MB
            </span>

            <!-- 🔥 BUTTON DOWNLOAD -->
            <a href="/assets/abgblora/logo/NewPermohonan_Konsultan_Perencana_Teknis.docx"
                download
                class="mt-1 inline-block text-red-600 hover:text-black transition"
                style="text-decoration:none;">

                <i class="bi bi-file-earmark-arrow-down" style="margin-right:6px;"></i>
                <span style="color: red">Download Contoh Surat Permohonan</span>
            </a>
        </div>
    </label>

    <!-- INPUT -->
    <input
        id="cadangan6"
        name="cadangan6"
        type="file"
        accept="application/pdf,image/*"
        value="{{ old('cadangan6') }}"
        class="border border-[#ccc] rounded-md p-2 mb-2 @error('cadangan6') border-red-500 @enderror"
        onchange="previewFile(this, 'cadangan6Preview')"
    />

    <!-- PREVIEW -->
    <div id="cadangan6Preview" class="mt-1">
        @if(session('cadangan6_temp'))
            <div class="mt-1 text-sm text-gray-700">
                <a href="{{ Storage::url(session('cadangan6_temp')) }}" target="_blank" class="text-blue-500 underline">
                    Lihat File
                </a>
            </div>
        @elseif(old('cadangan6'))
            <div class="mt-1 text-sm text-gray-700">
                File sudah dipilih: {{ old('cadangan6') }}
            </div>
        @endif
    </div>

    <!-- ERROR -->
    @error('cadangan6')
        <div class="text-red-600 text-sm mt-1" style="color:red; font-size:14px;">
            {{ $message }}
        </div>
    @enderror

</div>

</div>




    <div class="flex justify-end" style="margin-top: -40px;">
<button type="button" class="btn-submit" onclick="openModal()">
    <i class="bi bi-send-fill" style="margin-right: 6px;"></i>
    Kirim Permohonan
</button>
    </div>
<!-- Modal Konfirmasi -->
<div id="confirmModal" style="display: none; position: fixed; inset: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px 30px; border-radius: 12px; max-width: 400px; width: 90%; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
      <p style="font-size: 16px; font-weight: 600; margin-bottom: 20px;">
        Apakah Anda yakin <br> dengan permohonan Anda?
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



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


    @include('frontend.abgblora.00_fiturmenu.03_footer')
</section>
  <!-- back to top start -->
  <div class="progress-wrap">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
          <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
  </div>
  <!-- back to top end -->

</div>

@include('frontend.abgblora.00_fiturmenu.04_footer')
