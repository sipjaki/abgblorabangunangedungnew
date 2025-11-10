@include('frontend.android.00_fiturmenu.01_header')
@include('backend.00_administrator.00_baganterpisah.09_button')

<body class="font-poppins text-[#070625]">
  <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[120px] relative">

    <div class="w-full h-[190] absolute top-0 overflow-hidden">
  <img src="/assets/android/iconmenu/halamanabg.jpg" alt="Bangunan Blora" class="w-full h-full object-cover" />

</div>

     <div class="relative z-10 flex flex-col gap-6 mt-[60px]">

<div style="
  width: 100%;
  max-width: 400px;
  margin: 0 auto;
  background-color: rgba(255, 255, 255, 0.7);
  border-radius: 20px;
  padding: 20px;
  backdrop-filter: blur(2px);
  -webkit-backdrop-filter: blur(4px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
">
  <!-- Logo Kiri -->
  <div style="width: 42px; height: 42px; flex-shrink: 0;">
    <img src="/assets/abgblora/logo/logokabupatenblora.png" alt="icon" style="width: 100%; height: 100%; object-fit: contain;">
  </div>

  <!-- Teks Tengah -->
  <p style="
    font-size: 15px;
    font-weight: 500;
    line-height: 22px;
    color: #000;
    text-align: center;
    margin: 0;
    flex: 1;
  ">
    Dinas Pekerjaan Umum <br>
    Dan Penataan Ruang <br>
    Kabupaten Blora
  </p>

  <!-- Logo Kanan -->
  <div style="width: 42px; height: 42px; flex-shrink: 0;">
    <img src="/assets/abgblora/logo/pupr.png" alt="icon" style="width: 100%; height: 100%; object-fit: contain;">
  </div>
</div>

      <form id="Details" class="group result-card-container flex flex-col gap-6">
        <div id="Contact-details" class="bg-white rounded-xl overflow-hidden flex flex-col mx-[18px]">
          <div class="flex p-4 items-center gap-4">
            <button type="button" class="contact-name accordion-button flex items-center gap-2 w-full" data-accordion="accordion-1">
              <div class="flex items-center">
                <div class="w-12 h-12 flex shrink-0 rounded-full overflow-hidden border border-dark shadow-sm">
    <img src="{{ $agendapelatihan->foto ? asset($agendapelatihan->foto) : asset('/assets/abgblora/logo/logobangunangedung.png') }}"
         class="object-cover w-full h-full"
         alt="Foto Agenda">
</div>
              </div>
              <div class="flex flex-col flex-1 gap-[2px] text-left">
                <p class="font-semibold">{{$title}}</p>
                {{-- <p class="font-medium text-xs leading-[18px] text-[#757C98]">Contact Details</p> --}}
              </div>
            </button>
          </div>

        </div>


        <div class="flex flex-col space-y-3 px-[18px]">
<form action="{{ route('pendaftaranpesertanew') }}" method="POST" class="mobile-form" id="pendaftaranForm">
    @csrf
    <input type="hidden" name="agendapelatihanabg_id" value="{{ $agendapelatihan->id }}">

    <div class="form-section">
        <div class="section-header">
            <i class="bi bi-person-plus-fill" style="margin-right:6px; color:navy;"></i>
            <strong>Formulir Pendaftaran Peserta</strong>
        </div>

        <!-- Gaya Form -->
        <style>
            .form-modern {
                width: 100%;
                border: 2px solid black;
                border-radius: 8px;
                padding: 20px;
                margin-bottom: 20px;
                background-color: #fff;
                box-sizing: border-box;
            }

            .form-label-modern {
                display: block;
                font-weight: 600;
                margin-bottom: 8px;
                color: #000;
                font-family: 'Poppins', sans-serif;
            }

            .form-modern input,
            .form-modern select {
                width: 100%;
                border: 1px solid #333;
                border-radius: 6px;
                padding: 10px;
                font-size: 14px;
                font-family: 'Poppins', sans-serif;
            }

            .form-modern input:focus,
            .form-modern select:focus {
                border-color: navy;
                outline: none;
                box-shadow: 0 0 4px rgba(0, 0, 128, 0.3);
            }

            .error-message {
                font-size: 12px;
                color: red;
                margin-top: 4px;
                display: none;
            }

            .required {
                color: red;
            }

            .button-baru {
                width: 100%;
                background-color: navy;
                color: white;
                padding: 12px;
                border: none;
                border-radius: 6px;
                font-size: 16px;
                font-weight: 600;
                cursor: pointer;
                font-family: 'Poppins', sans-serif;
            }

            .button-baru:hover {
                background-color: #003399;
            }

            /* Modal Styles */
            .modal {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.5);
                z-index: 1000;
                justify-content: center;
                align-items: center;
            }

            .modal-content {
                background: white;
                padding: 20px;
                border-radius: 8px;
                width: 90%;
                max-width: 500px;
                max-height: 80vh;
                overflow-y: auto;
            }

            .modal h3 {
                color: #003399;
                margin-bottom: 15px;
            }

            .data-preview div {
                margin-bottom: 8px;
                padding-bottom: 8px;
                border-bottom: 1px solid #eee;
            }

            .modal-footer {
                display: flex;
                justify-content: flex-end;
                margin-top: 20px;
                gap: 10px;
            }

            .btn-cancel,
            .btn-confirm {
                padding: 10px 18px;
                border: none;
                border-radius: 6px;
                color: #fff;
                cursor: pointer;
                font-family: 'Poppins', sans-serif;
            }

            .btn-cancel {
                background-color: #d9534f;
            }

            .btn-confirm {
                background-color: #003399;
            }

            .btn-cancel:hover {
                background-color: #c9302c;
            }

            .btn-confirm:hover {
                background-color: #001a66;
            }

            .error-field {
                border-color: red !important;
            }
        </style>

        <!-- Nama Lengkap -->
        <div class="form-modern">
            <label for="namalengkap" class="form-label-modern">
                <i class="bi bi-person-fill" style="margin-right:6px; color:navy;"></i> Nama Lengkap <span class="required">*</span>
            </label>
            <input type="text" name="namalengkap" id="namalengkap" value="{{ old('namalengkap') }}" required>
            <div class="error-message" id="namalengkap-error"></div>
        </div>

        <div class="form-modern">
            <label for="jenjangpendidikan_id" class="form-label-modern">
                <i class="bi bi-mortarboard-fill" style="margin-right:6px; color:navy;"></i> Jenjang Pendidikan <span class="required">*</span>
            </label>
            <select name="jenjangpendidikan_id" id="jenjangpendidikan_id" required>
                <option value="">-- Pilih Jenjang Pendidikan --</option>
                @foreach ($jenjangpendidikan as $item)
                    <option value="{{ $item->id }}" {{ old('jenjangpendidikan_id') == $item->id ? 'selected' : '' }}>
                        {{ $item->jenjangpendidikan }}
                    </option>
                @endforeach
            </select>
            <div class="error-message" id="jenjangpendidikan_id-error"></div>
        </div>

        <div class="form-modern">
            <label for="nik" class="form-label-modern">
                <i class="bi bi-credit-card-2-front-fill" style="margin-right:6px; color:navy;"></i> NIK <span class="required">*</span>
            </label>
            <input type="text" name="nik" id="nik" value="{{ old('nik') }}" required minlength="16" maxlength="16">
            <div class="error-message" id="nik-error"></div>
        </div>

        <div class="form-modern">
            <label for="jeniskelamin" class="form-label-modern">
                <i class="bi bi-gender-ambiguous" style="margin-right:6px; color:navy;"></i> Jenis Kelamin <span class="required">*</span>
            </label>
            <select name="jeniskelamin" id="jeniskelamin" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki" {{ old('jeniskelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ old('jeniskelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
            <div class="error-message" id="jeniskelamin-error"></div>
        </div>

        <div class="form-modern">
            <label for="tanggallahir" class="form-label-modern">
                <i class="bi bi-calendar-date-fill" style="margin-right:6px; color:navy;"></i> Tanggal Lahir <span class="required">*</span>
            </label>
            <input type="date" name="tanggallahir" id="tanggallahir" value="{{ old('tanggallahir') }}" required>
            <div class="error-message" id="tanggallahir-error"></div>
        </div>

        <div class="form-modern">
            <label for="notelepon" class="form-label-modern">
                <i class="bi bi-telephone-fill" style="margin-right:6px; color:navy;"></i> No Telepon <span class="required">*</span>
            </label>
            <input type="tel" name="notelepon" id="notelepon" value="{{ old('notelepon') }}" required>
            <div class="error-message" id="notelepon-error"></div>
        </div>

        <div class="form-modern">
            <label for="instansi" class="form-label-modern">
                <i class="bi bi-building-fill" style="margin-right:6px; color:navy;"></i> Instansi <span class="required">*</span>
            </label>
            <input type="text" name="instansi" id="instansi" value="{{ old('instansi') }}" required>
            <div class="error-message" id="instansi-error"></div>
        </div>
    </div>

    <div class="form-buttons">
        <button type="button" class="button-baru" id="submitButton">
            <i class="bi bi-send-fill" style="margin-right:6px;"></i> <strong style="color: black">Daftar</strong>
        </button>
    </div>
</form>

<!-- Modal Konfirmasi -->
<div id="confirmationModal" class="modal">
    <div class="modal-content">
        <h3>Konfirmasi Data</h3>
        <p>Apakah data yang Anda masukkan sudah benar?</p>

        <div class="data-preview">
            <div><strong>Nama:</strong> <span id="preview-nama"></span></div>
            <div><strong>Jenjang Pendidikan:</strong> <span id="preview-pendidikan"></span></div>
            <div><strong>NIK:</strong> <span id="preview-nik"></span></div>
            <div><strong>Jenis Kelamin:</strong> <span id="preview-jk"></span></div>
            <div><strong>Tanggal Lahir:</strong> <span id="preview-tgl"></span></div>
            <div><strong>No Telepon:</strong> <span id="preview-telp"></span></div>
            <div><strong>Instansi:</strong> <span id="preview-instansi"></span></div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn-cancel" id="cancelButton">Periksa Kembali</button>
<!-- Tombol konfirmasi -->
<button type="button" class="btn-confirm" id="confirmButton">
    <i class="bi bi-send-check-fill" style="margin-right: 5px;"></i> Ya, Kirim Data
</button>        </div>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function() {
    const confirmButton = document.getElementById('confirmButton');
    const form = document.getElementById('pendaftaranForm');

    confirmButton.addEventListener('click', function() {
        // Konfirmasi sebelum submit
        if (confirm('Apakah Anda yakin ingin mengirim data pendaftaran ini?')) {
            confirmButton.disabled = true;
            confirmButton.innerHTML = '<i class="bi bi-hourglass-split"></i> Mengirim...';
            form.submit(); // ⬅️ ini yang mengirim langsung ke controller Laravel
        }
    });
});
</script>
<!-- Script Validasi & Modal -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('pendaftaranForm');
    const submitButton = document.getElementById('submitButton');
    const modal = document.getElementById('confirmationModal');
    const cancelButton = document.getElementById('cancelButton');
    const confirmButton = document.getElementById('confirmButton');

    // Klik tombol "Daftar"
    submitButton.addEventListener('click', function() {
        if (validateForm()) {
            showDataPreview();
            modal.style.display = 'flex';
        }
    });

    // Tutup modal
    cancelButton.addEventListener('click', function() {
        modal.style.display = 'none';
    });

    // Konfirmasi kirim data
    confirmButton.addEventListener('click', function() {
        confirmButton.disabled = true;
        confirmButton.textContent = "Mengirim...";
        form.submit();
    });

    // Validasi form
    function validateForm() {
        let isValid = true;
        const fields = ['namalengkap', 'jenjangpendidikan_id', 'nik', 'jeniskelamin', 'tanggallahir', 'notelepon', 'instansi'];

        fields.forEach(field => {
            const input = document.getElementById(field);
            const error = document.getElementById(`${field}-error`);
            error.style.display = 'none';
            input.classList.remove('error-field');

            if (!input.value.trim()) {
                error.textContent = 'Field ini wajib diisi';
                error.style.display = 'block';
                input.classList.add('error-field');
                isValid = false;
            }
        });

        const nik = document.getElementById('nik').value;
        if (nik.length !== 16 || !/^\d+$/.test(nik)) {
            document.getElementById('nik-error').textContent = 'NIK harus 16 digit angka';
            document.getElementById('nik-error').style.display = 'block';
            isValid = false;
        }

        const telp = document.getElementById('notelepon').value;
        if (!/^[0-9]+$/.test(telp)) {
            document.getElementById('notelepon-error').textContent = 'Nomor telepon hanya boleh angka';
            document.getElementById('notelepon-error').style.display = 'block';
            isValid = false;
        }

        return isValid;
    }

    // Isi preview modal
    function showDataPreview() {
        document.getElementById('preview-nama').textContent = document.getElementById('namalengkap').value;
        document.getElementById('preview-pendidikan').textContent = document.getElementById('jenjangpendidikan_id').options[document.getElementById('jenjangpendidikan_id').selectedIndex].text;
        document.getElementById('preview-nik').textContent = document.getElementById('nik').value;
        document.getElementById('preview-jk').textContent = document.getElementById('jeniskelamin').value;
        document.getElementById('preview-tgl').textContent = document.getElementById('tanggallahir').value;
        document.getElementById('preview-telp').textContent = document.getElementById('notelepon').value;
        document.getElementById('preview-instansi').textContent = document.getElementById('instansi').value;
    }
});
</script>


      <br><br>
      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
