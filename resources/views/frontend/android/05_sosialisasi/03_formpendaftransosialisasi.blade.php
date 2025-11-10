@include('frontend.android.00_fiturmenu.01_header')
@include('backend.00_administrator.00_baganterpisah.09_button')

<body class="font-poppins text-[#070625]">
  <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[120px] relative">

<div class="w-full h-[190px] absolute top-0 overflow-hidden rounded-b-lg border-b border-dark shadow-sm">
    <img
        src="{{ isset($agendapelatihan->foto) && $agendapelatihan->foto ? asset($agendapelatihan->foto) : asset('assets/android/iconmenu/halamanabg.jpg') }}"
        alt="Foto Agenda Pelatihan"
        class="w-full h-full object-cover"
    />
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

        <!-- Nama Lengkap -->
        <div class="form-modern">
            <label for="namalengkap" class="form-label-modern">
                <i class="bi bi-person-fill" style="margin-right:6px; color:navy;"></i> Nama Lengkap <span class="required">*</span>
            </label>
            <input type="text" name="namalengkap" id="namalengkap" required>
            <div class="error-message" id="namalengkap-error"></div>
        </div>

        <!-- Jenjang Pendidikan -->
        <div class="form-modern">
            <label for="jenjangpendidikan_id" class="form-label-modern">
                <i class="bi bi-mortarboard-fill" style="margin-right:6px; color:navy;"></i> Jenjang Pendidikan <span class="required">*</span>
            </label>
            <select name="jenjangpendidikan_id" id="jenjangpendidikan_id" required>
                <option value="">-- Pilih Jenjang Pendidikan --</option>
                @foreach ($jenjangpendidikan as $item)
                    <option value="{{ $item->id }}">{{ $item->jenjangpendidikan }}</option>
                @endforeach
            </select>
            <div class="error-message" id="jenjangpendidikan_id-error"></div>
        </div>

        <!-- NIK -->
        <div class="form-modern">
            <label for="nik" class="form-label-modern">
                <i class="bi bi-credit-card-2-front-fill" style="margin-right:6px; color:navy;"></i> NIK <span class="required">*</span>
            </label>
            <input type="text" name="nik" id="nik" minlength="16" maxlength="16" required>
            <div class="error-message" id="nik-error"></div>
        </div>

        <!-- Jenis Kelamin -->
        <div class="form-modern">
            <label for="jeniskelamin" class="form-label-modern">
                <i class="bi bi-gender-ambiguous" style="margin-right:6px; color:navy;"></i> Jenis Kelamin <span class="required">*</span>
            </label>
            <select name="jeniskelamin" id="jeniskelamin" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
            <div class="error-message" id="jeniskelamin-error"></div>
        </div>

        <!-- Tanggal Lahir -->
        <div class="form-modern">
            <label for="tanggallahir" class="form-label-modern">
                <i class="bi bi-calendar-date-fill" style="margin-right:6px; color:navy;"></i> Tanggal Lahir <span class="required">*</span>
            </label>
            <input type="date" name="tanggallahir" id="tanggallahir" required>
            <div class="error-message" id="tanggallahir-error"></div>
        </div>

        <!-- No Telepon -->
        <div class="form-modern">
            <label for="notelepon" class="form-label-modern">
                <i class="bi bi-telephone-fill" style="margin-right:6px; color:navy;"></i> No Telepon <span class="required">*</span>
            </label>
            <input type="tel" name="notelepon" id="notelepon" required>
            <div class="error-message" id="notelepon-error"></div>
        </div>

        <!-- Instansi -->
        <div class="form-modern">
            <label for="instansi" class="form-label-modern">
                <i class="bi bi-building-fill" style="margin-right:6px; color:navy;"></i> Instansi <span class="required">*</span>
            </label>
            <input type="text" name="instansi" id="instansi" required>
            <div class="error-message" id="instansi-error"></div>
        </div>
    </div>

    <div class="form-buttons">
        <button type="button" class="button-baru" id="submitButton">
            <i class="bi bi-send-fill" style="margin-right:6px;"></i> <strong>Daftar</strong>
        </button>
    </div>
</form>

<!-- Modal Konfirmasi -->
<div id="confirmationModal" class="modal">
    <div class="modal-content">
        <h3>Konfirmasi Data</h3>
        <p>Pastikan semua data sudah benar sebelum dikirim.</p>
        <div class="data-preview">
            <div><strong>Nama:</strong> <span id="preview-nama"></span></div>
            <div><strong>Pendidikan:</strong> <span id="preview-pendidikan"></span></div>
            <div><strong>NIK:</strong> <span id="preview-nik"></span></div>
            <div><strong>Jenis Kelamin:</strong> <span id="preview-jk"></span></div>
            <div><strong>Tanggal Lahir:</strong> <span id="preview-tgl"></span></div>
            <div><strong>No Telp:</strong> <span id="preview-telp"></span></div>
            <div><strong>Instansi:</strong> <span id="preview-instansi"></span></div>
        </div>

        <div class="modal-footer">
            <button type="button" class="btn-cancel" id="cancelButton">Periksa Kembali</button>
            <button type="button" class="btn-confirm" id="confirmButton">
                <i class="bi bi-send-check-fill" style="margin-right: 5px;"></i> Ya, Kirim Data
            </button>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const form = document.getElementById('pendaftaranForm');
    const modal = document.getElementById('confirmationModal');
    const submitButton = document.getElementById('submitButton');
    const cancelButton = document.getElementById('cancelButton');
    const confirmButton = document.getElementById('confirmButton');

    // Buka modal preview
    submitButton.addEventListener('click', () => {
        if (validateForm()) {
            showDataPreview();
            modal.style.display = 'flex';
        }
    });

    // Tutup modal
    cancelButton.addEventListener('click', () => {
        modal.style.display = 'none';
    });

    // Konfirmasi kirim data
    confirmButton.addEventListener('click', () => {
        confirmButton.disabled = true;
        confirmButton.innerHTML = '<i class="bi bi-hourglass-split"></i> Mengirim...';
        form.submit(); // ⬅️ langsung kirim ke controller Laravel
    });

    function validateForm() {
        let valid = true;
        const requiredFields = ['namalengkap', 'jenjangpendidikan_id', 'nik', 'jeniskelamin', 'tanggallahir', 'notelepon', 'instansi'];
        requiredFields.forEach(id => {
            const el = document.getElementById(id);
            const err = document.getElementById(`${id}-error`);
            err.style.display = 'none';
            el.classList.remove('error-field');
            if (!el.value.trim()) {
                err.textContent = 'Wajib diisi';
                err.style.display = 'block';
                el.classList.add('error-field');
                valid = false;
            }
        });
        const nik = document.getElementById('nik').value;
        if (nik.length !== 16 || !/^\d+$/.test(nik)) {
            const err = document.getElementById('nik-error');
            err.textContent = 'NIK harus 16 digit angka';
            err.style.display = 'block';
            valid = false;
        }
        return valid;
    }

    function showDataPreview() {
        document.getElementById('preview-nama').textContent = document.getElementById('namalengkap').value;
        document.getElementById('preview-pendidikan').textContent =
            document.getElementById('jenjangpendidikan_id').selectedOptions[0].text;
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
