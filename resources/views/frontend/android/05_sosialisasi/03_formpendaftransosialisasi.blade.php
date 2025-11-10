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
                <div class="w-12 h-12 flex shrink-0 rounded-full overflow-hidden">
                  <img src="/assets/abgblora/logo/logobangunangedung.png" class="object-cover w-full h-full" alt="photo">
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
            <i class="fas fa-user-plus"></i>
            <strong>Formulir Pendaftaran Peserta</strong>
        </div>

        <!-- Nama Lengkap -->
        <div class="form-row">
            <div class="form-modern">
                <label for="namalengkap" class="form-label-modern">
                    <i class="fas fa-user"></i> Nama Lengkap <span class="required">*</span>
                </label>
                <input type="text" name="namalengkap" id="namalengkap" class="form-control"
                       value="{{ old('namalengkap') }}" required>
                <div class="error-message" id="namalengkap-error"></div>
            </div>
        </div>

        <!-- Jenjang Pendidikan -->
        <div class="form-row">
            <div class="form-group">
                <label for="jenjangpendidikan_id" class="form-label">
                    <i class="fas fa-graduation-cap"></i> Jenjang Pendidikan <span class="required">*</span>
                </label>
                <select name="jenjangpendidikan_id" id="jenjangpendidikan_id" class="form-control" required>
                    <option value="">-- Pilih Jenjang Pendidikan --</option>
                    @foreach ($jenjangpendidikan as $item)
                        <option value="{{ $item->id }}" {{ old('jenjangpendidikan_id') == $item->id ? 'selected' : '' }}>
                            {{ $item->jenjangpendidikan }}
                        </option>
                    @endforeach
                </select>
                <div class="error-message" id="jenjangpendidikan_id-error"></div>
            </div>
        </div>

        <!-- NIK -->
        <div class="form-row">
            <div class="form-group">
                <label for="nik" class="form-label">
                    <i class="fas fa-id-card"></i> NIK <span class="required">*</span>
                </label>
                <input type="text" name="nik" id="nik" class="form-control"
                       value="{{ old('nik') }}" required minlength="16" maxlength="16">
                <div class="error-message" id="nik-error"></div>
            </div>
        </div>

        <!-- Jenis Kelamin -->
        <div class="form-row">
            <div class="form-group">
                <label for="jeniskelamin" class="form-label">
                    <i class="fas fa-venus-mars"></i> Jenis Kelamin <span class="required">*</span>
                </label>
                <select name="jeniskelamin" id="jeniskelamin" class="form-control" required>
                    <option value="">-- Pilih Jenis Kelamin --</option>
                    <option value="Laki-laki" {{ old('jeniskelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                    <option value="Perempuan" {{ old('jeniskelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                </select>
                <div class="error-message" id="jeniskelamin-error"></div>
            </div>
        </div>

        <!-- Tanggal Lahir -->
        <div class="form-row">
            <div class="form-group">
                <label for="tanggallahir" class="form-label">
                    <i class="fas fa-calendar-alt"></i> Tanggal Lahir <span class="required">*</span>
                </label>
                <input type="date" name="tanggallahir" id="tanggallahir" class="form-control"
                       value="{{ old('tanggallahir') }}" required>
                <div class="error-message" id="tanggallahir-error"></div>
            </div>
        </div>

        <!-- No Telepon -->
        <div class="form-row">
            <div class="form-group">
                <label for="notelepon" class="form-label">
                    <i class="fas fa-phone"></i> No Telepon <span class="required">*</span>
                </label>
                <input type="tel" name="notelepon" id="notelepon" class="form-control"
                       value="{{ old('notelepon') }}" required>
                <div class="error-message" id="notelepon-error"></div>
            </div>
        </div>

        <!-- Instansi -->
        <div class="form-row">
            <div class="form-group">
                <label for="instansi" class="form-label">
                    <i class="fas fa-building"></i> Instansi <span class="required">*</span>
                </label>
                <input type="text" name="instansi" id="instansi" class="form-control"
                       value="{{ old('instansi') }}" required>
                <div class="error-message" id="instansi-error"></div>
            </div>
        </div>
    </div>

    <div class="form-buttons">
        <button type="button" class="button-baru" id="submitButton">
            <i class="fab fa-telegram-plane"></i> Kirim Permohonan
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
            <button type="button" class="btn-confirm" id="confirmButton">Ya, Kirim Data</button>
        </div>
    </div>
</div>

<style>
.error-message {
    color: #e53e3e;
    font-size: 12px;
    margin-top: 5px;
    display: none;
}

.modal {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5);
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
    color: #3182ce;
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

.btn-cancel {
    padding: 8px 16px;
    background: #e53e3e;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

.btn-confirm {
    padding: 8px 16px;
    background: #3182ce;
    color: white;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

/* Tambahkan style lainnya dari sebelumnya */
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('pendaftaranForm');
    const submitButton = document.getElementById('submitButton');
    const modal = document.getElementById('confirmationModal');
    const cancelButton = document.getElementById('cancelButton');
    const confirmButton = document.getElementById('confirmButton');

    // Validasi sebelum menampilkan modal
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

    // Konfirmasi pengiriman
    confirmButton.addEventListener('click', function() {
        form.submit();
    });

    // Fungsi validasi
    function validateForm() {
        let isValid = true;
        const fields = [
            'namalengkap', 'jenjangpendidikan_id', 'nik',
            'jeniskelamin', 'tanggallahir', 'notelepon', 'instansi'
        ];

        // Reset error messages
        fields.forEach(field => {
            document.getElementById(`${field}-error`).style.display = 'none';
            document.getElementById(field).classList.remove('error-field');
        });

        // Validasi masing-masing field
        fields.forEach(field => {
            const element = document.getElementById(field);
            const errorElement = document.getElementById(`${field}-error`);

            if (!element.value.trim()) {
                errorElement.textContent = 'Field ini wajib diisi';
                errorElement.style.display = 'block';
                element.classList.add('error-field');
                isValid = false;
            }
        });

        // Validasi khusus NIK
        const nik = document.getElementById('nik').value;
        if (nik.length !== 16 || !/^\d+$/.test(nik)) {
            document.getElementById('nik-error').textContent = 'NIK harus 16 digit angka';
            document.getElementById('nik-error').style.display = 'block';
            document.getElementById('nik').classList.add('error-field');
            isValid = false;
        }

        // Validasi nomor telepon
        const telp = document.getElementById('notelepon').value;
        if (!/^[0-9]+$/.test(telp)) {
            document.getElementById('notelepon-error').textContent = 'Nomor telepon hanya boleh angka';
            document.getElementById('notelepon-error').style.display = 'block';
            document.getElementById('notelepon').classList.add('error-field');
            isValid = false;
        }

        if (!isValid) {
            const firstError = document.querySelector('.error-field');
            if (firstError) {
                firstError.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }

        return isValid;
    }

    // Tampilkan preview data di modal
    function showDataPreview() {
        document.getElementById('preview-nama').textContent = document.getElementById('namalengkap').value;
        document.getElementById('preview-pendidikan').textContent = document.getElementById('jenjangpendidikan_id').options[document.getElementById('jenjangpendidikan_id').selectedIndex].text;
        document.getElementById('preview-nik').textContent = document.getElementById('nik').value;
        document.getElementById('preview-jk').textContent = document.getElementById('jeniskelamin').value;
        document.getElementById('preview-tgl').textContent = document.getElementById('tanggallahir').value;
        document.getElementById('preview-telp').textContent = document.getElementById('notelepon').value;
        document.getElementById('preview-instansi').textContent = document.getElementById('instansi').value;
    }

    // Validasi real-time
    form.addEventListener('input', function(e) {
        const field = e.target.id;
        const errorElement = document.getElementById(`${field}-error`);

        if (errorElement.style.display === 'block') {
            if (e.target.value.trim()) {
                errorElement.style.display = 'none';
                e.target.classList.remove('error-field');
            }
        }
    });
});
</script>

        </div>


      <br><br>
      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
