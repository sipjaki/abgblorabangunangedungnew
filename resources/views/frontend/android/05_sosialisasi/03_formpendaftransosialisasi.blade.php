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
<form action="{{ route('pendaftaranpesertanew') }}" method="POST" class="mobile-form" id="pendaftaranForm">
    @csrf

    <!-- Hidden ID Agenda Pelatihan -->
    <input type="hidden" name="agendapelatihanabg_id" value="{{ $agendapelatihan->id }}">

    <div class="form-section">
        <div class="section-header">
            <i class="fas fa-user-plus"></i>
            <strong>Formulir Pendaftaran Peserta</strong>
        </div>

        <!-- Nama Lengkap -->
        <div class="form-row">
            <div class="form-group">
                <label for="namalengkap" class="form-label">
                    <i class="fas fa-user"></i> Nama Lengkap <span class="required">*</span>
                </label>
                <input type="text" name="namalengkap" id="namalengkap" class="form-control @error('namalengkap') is-invalid @enderror"
                       value="{{ old('namalengkap') }}" required>
                @error('namalengkap')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Jenjang Pendidikan -->
        <div class="form-row">
            <div class="form-group">
                <label for="jenjangpendidikan_id" class="form-label">
                    <i class="fas fa-graduation-cap"></i> Jenjang Pendidikan <span class="required">*</span>
                </label>
                <select name="jenjangpendidikan_id" id="jenjangpendidikan_id"
                        class="form-control @error('jenjangpendidikan_id') is-invalid @enderror" required>
                    <option value="">-- Pilih Jenjang Pendidikan --</option>
                    @foreach ($jenjangpendidikan as $item)
                        <option value="{{ $item->id }}" {{ old('jenjangpendidikan_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->jenjangpendidikan }}
                        </option>
                    @endforeach
                </select>
                @error('jenjangpendidikan_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- NIK -->
        <div class="form-row">
            <div class="form-group">
                <label for="nik" class="form-label">
                    <i class="fas fa-id-card"></i> Nomor Induk Kependudukan (NIK) <span class="required">*</span>
                </label>
                <input type="text" name="nik" id="nik" class="form-control @error('nik') is-invalid @enderror"
                       value="{{ old('nik') }}" required minlength="16" maxlength="16">
                @error('nik')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Jenis Kelamin -->
        <div class="form-row">
            <div class="form-group">
                <label for="jeniskelamin" class="form-label">
                    <i class="fas fa-venus-mars"></i> Jenis Kelamin <span class="required">*</span>
                </label>
                <select name="jeniskelamin" id="jeniskelamin"
                        class="form-control @error('jeniskelamin') is-invalid @enderror" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki" {{ old('jeniskelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jeniskelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                @error('jeniskelamin')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Tanggal Lahir -->
        <div class="form-row">
            <div class="form-group">
                <label for="tanggallahir" class="form-label">
                    <i class="fas fa-calendar-alt"></i> Tanggal Lahir <span class="required">*</span>
                </label>
                <input type="date" name="tanggallahir" id="tanggallahir"
                       class="form-control @error('tanggallahir') is-invalid @enderror"
                       value="{{ old('tanggallahir') }}" required>
                @error('tanggallahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- No Telepon -->
        <div class="form-row">
            <div class="form-group">
                <label for="notelepon" class="form-label">
                    <i class="fas fa-phone"></i> Nomor Telepon <span class="required">*</span>
                </label>
                <input type="tel" name="notelepon" id="notelepon"
                       class="form-control @error('notelepon') is-invalid @enderror"
                       value="{{ old('notelepon') }}" required>
                @error('notelepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <!-- Instansi -->
        <div class="form-row">
            <div class="form-group">
                <label for="instansi" class="form-label">
                    <i class="fas fa-building"></i> Instansi/Asal <span class="required">*</span>
                </label>
                <input type="text" name="instansi" id="instansi"
                       class="form-control @error('instansi') is-invalid @enderror"
                       value="{{ old('instansi') }}" required>
                @error('instansi')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>
    </div>

    <!-- Tombol Submit -->
    <div class="form-buttons">
        <button type="button" class="button-baru" onclick="validateAndSubmit()">
            <i class="fab fa-telegram-plane"></i> Kirim Permohonan
        </button>
    </div>
</form>

<script>
function validateAndSubmit() {
    const form = document.getElementById('pendaftaranForm');
    const requiredFields = form.querySelectorAll('[required]');
    let isValid = true;

    // Validasi client-side
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            field.classList.add('is-invalid');
            isValid = false;
        }
    });

    // Validasi khusus NIK
    const nikField = document.getElementById('nik');
    if (nikField.value.length !== 16) {
        nikField.classList.add('is-invalid');
        isValid = false;
    }

    if (isValid) {
        // Jika valid, tampilkan modal konfirmasi
        openModal();
    } else {
        // Scroll ke field pertama yang error
        const firstInvalid = form.querySelector('.is-invalid');
        if (firstInvalid) {
            firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }
}

function submitForm() {
    document.getElementById('pendaftaranForm').submit();
}
</script>

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

.form-label .required {
    color: #e53e3e;
    margin-left: 4px;
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
    box-shadow: 0 0 0 2px rgba(66, 153, 225, 0.2);
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

.form-buttons {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.button-baru {
    background-color: #3182ce;
    color: white;
    padding: 12px 24px;
    border: none;
    border-radius: 6px;
    font-weight: 500;
    font-size: 16px;
    cursor: pointer;
    transition: background-color 0.3s;
    display: flex;
    align-items: center;
    justify-content: center;
}

.button-baru:hover {
    background-color: #2c5282;
}

.button-baru i {
    margin-right: 8px;
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


