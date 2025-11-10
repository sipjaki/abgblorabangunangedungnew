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
            <input type="text" name="namalengkap" id="namalengkap" value="{{ old('namalengkap') }}" required>
        </div>

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
        </div>

        <div class="form-modern">
            <label for="nik" class="form-label-modern">
                <i class="bi bi-credit-card-2-front-fill" style="margin-right:6px; color:navy;"></i> NIK <span class="required">*</span>
            </label>
            <input type="text" name="nik" id="nik" minlength="16" maxlength="16" required>
        </div>

        <div class="form-modern">
            <label for="jeniskelamin" class="form-label-modern">
                <i class="bi bi-gender-ambiguous" style="margin-right:6px; color:navy;"></i> Jenis Kelamin <span class="required">*</span>
            </label>
            <select name="jeniskelamin" id="jeniskelamin" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="form-modern">
            <label for="tanggallahir" class="form-label-modern">
                <i class="bi bi-calendar-date-fill" style="margin-right:6px; color:navy;"></i> Tanggal Lahir <span class="required">*</span>
            </label>
            <input type="date" name="tanggallahir" id="tanggallahir" required>
        </div>

        <div class="form-modern">
            <label for="notelepon" class="form-label-modern">
                <i class="bi bi-telephone-fill" style="margin-right:6px; color:navy;"></i> No Telepon <span class="required">*</span>
            </label>
            <input type="tel" name="notelepon" id="notelepon" required pattern="[0-9]+" title="Hanya boleh angka">
        </div>

        <div class="form-modern">
            <label for="instansi" class="form-label-modern">
                <i class="bi bi-building-fill" style="margin-right:6px; color:navy;"></i> Instansi <span class="required">*</span>
            </label>
            <input type="text" name="instansi" id="instansi" required>
        </div>
    </div>

    <div class="form-buttons">
        <button type="submit" class="button-baru" id="submitButton">
            <i class="bi bi-send-fill" style="margin-right:6px;"></i> <strong>Daftar</strong>
        </button>
    </div>
</form>
</div>


      <br><br>
      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
