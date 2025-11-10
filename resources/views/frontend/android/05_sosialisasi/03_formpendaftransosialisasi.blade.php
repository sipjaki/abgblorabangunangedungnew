@include('frontend.android.00_fiturmenu.01_header')
@include('backend.00_administrator.00_baganterpisah.09_button')

<body class="font-poppins text-[#070625]">
<section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[120px] relative">

    <div class="w-full h-[190px] absolute top-0 overflow-hidden rounded-b-lg border-b border-dark shadow-sm">
        <img src="{{ isset($agendapelatihan->foto) && $agendapelatihan->foto ? asset($agendapelatihan->foto) : asset('assets/android/iconmenu/halamanabg.jpg') }}"
            alt="Foto Agenda Pelatihan" class="w-full h-full object-cover" />
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
            gap: 10px;">
            <div style="width: 42px; height: 42px;">
                <img src="/assets/abgblora/logo/logokabupatenblora.png" alt="icon" style="width:100%; height:100%; object-fit:contain;">
            </div>
            <p style="font-size:15px; font-weight:500; color:#000; text-align:center; margin:0; flex:1;">
                Dinas Pekerjaan Umum <br> Dan Penataan Ruang <br> Kabupaten Blora
            </p>
            <div style="width: 42px; height: 42px;">
                <img src="/assets/abgblora/logo/pupr.png" alt="icon" style="width:100%; height:100%; object-fit:contain;">
            </div>
        </div>

        <div id="Details" class="group result-card-container flex flex-col gap-6">
            <div id="Contact-details" class="bg-white rounded-xl overflow-hidden flex flex-col mx-[18px]">
                <div class="flex p-4 items-center gap-4">
                    <button type="button" class="contact-name accordion-button flex items-center gap-2 w-full">
                        <div class="flex items-center">
                            <div class="w-12 h-12 flex shrink-0 rounded-full overflow-hidden border border-dark shadow-sm">
                                <img src="{{ $agendapelatihan->foto ? asset($agendapelatihan->foto) : asset('/assets/abgblora/logo/logobangunangedung.png') }}"
                                     class="object-cover w-full h-full" alt="Foto Agenda">
                            </div>
                        </div>
                        <div class="flex flex-col flex-1 gap-[2px] text-left">
                            <p class="font-semibold">{{$title}}</p>
                        </div>
                    </button>
                </div>
            </div>

            <div class="flex flex-col space-y-3 px-[18px]">
                <style>
                    .mobile-form {
                        max-width: 600px;
                        margin: 0 auto;
                        padding: 25px;
                        background: #fff;
                        border-radius: 12px;
                        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
                        font-family: 'Poppins', sans-serif;
                    }
                    .form-section { margin-bottom: 25px; }
                    .section-header {
                        font-size: 18px; font-weight: 600; color: #1a237e;
                        display: flex; align-items: center; margin-bottom: 15px;
                    }
                    .form-label-modern {
                        display: flex; align-items: center;
                        font-weight: 500; font-size: 14px; color: #333; margin-bottom: 6px;
                    }
                    .form-modern input, .form-modern select {
                        width: 100%; padding: 10px 12px;
                        border: 1px solid #ccc; border-radius: 8px;
                        font-size: 14px; transition: all 0.2s ease;
                    }
                    .form-modern input:focus, .form-modern select:focus {
                        border-color: #1a237e; outline: none;
                        box-shadow: 0 0 0 3px rgba(26,35,126,0.15);
                    }
                    .form-modern { margin-bottom: 16px; }
                    .required { color: red; margin-left: 3px; }
                    .form-buttons { text-align: center; margin-top: 20px; }
                    .button-baru {
                        background-color: #1a237e; color: white;
                        padding: 12px 25px; border: none; border-radius: 8px;
                        font-weight: 600; font-size: 15px;
                        display: inline-flex; align-items: center; cursor: pointer;
                        transition: all 0.3s ease;
                    }
                    .button-baru:hover {
                        background-color: white; color: #1a237e;
                        border: 1px solid #1a237e; transform: translateY(-1px);
                    }
                </style>

                <form action="{{ route('pendaftaranpesertanew') }}" method="POST" class="mobile-form" id="pendaftaranForm">
                    @csrf
                    <input type="hidden" name="agendapelatihanabg_id" value="{{ $agendapelatihan->id }}">

                    <div class="form-section">
                        <div class="section-header">
                            <i class="bi bi-person-plus-fill" style="margin-right:6px; color:#1a237e;"></i>
                            Formulir Pendaftaran Peserta
                        </div>

                        <div class="form-modern">
                            <label class="form-label-modern" for="namalengkap">
                                <i class="bi bi-person-fill" style="margin-right:6px; color:#1a237e;"></i> Nama Lengkap <span class="required">*</span>
                            </label>
                            <input type="text" name="namalengkap" id="namalengkap" required>
                        </div>

                        <div class="form-modern">
                            <label class="form-label-modern" for="jenjangpendidikan_id">
                                <i class="bi bi-mortarboard-fill" style="margin-right:6px; color:#1a237e;"></i> Jenjang Pendidikan <span class="required">*</span>
                            </label>
                            <select name="jenjangpendidikan_id" id="jenjangpendidikan_id" required>
                                <option value="">-- Pilih Jenjang Pendidikan --</option>
                                @foreach ($jenjangpendidikan as $item)
                                    <option value="{{ $item->id }}">{{ $item->jenjangpendidikan }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-modern">
                            <label class="form-label-modern" for="nik">
                                <i class="bi bi-credit-card-2-front-fill" style="margin-right:6px; color:#1a237e;"></i> NIK <span class="required">*</span>
                            </label>
                            <input type="text" name="nik" id="nik" minlength="16" maxlength="16" required>
                        </div>

                        <div class="form-modern">
                            <label class="form-label-modern" for="jeniskelamin">
                                <i class="bi bi-gender-ambiguous" style="margin-right:6px; color:#1a237e;"></i> Jenis Kelamin <span class="required">*</span>
                            </label>
                            <select name="jeniskelamin" id="jeniskelamin" required>
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-modern">
                            <label class="form-label-modern" for="tanggallahir">
                                <i class="bi bi-calendar-date-fill" style="margin-right:6px; color:#1a237e;"></i> Tanggal Lahir <span class="required">*</span>
                            </label>
                            <input type="date" name="tanggallahir" id="tanggallahir" required>
                        </div>

                        <div class="form-modern">
                            <label class="form-label-modern" for="notelepon">
                                <i class="bi bi-telephone-fill" style="margin-right:6px; color:#1a237e;"></i> No Telepon <span class="required">*</span>
                            </label>
                            <input type="tel" name="notelepon" id="notelepon" required pattern="[0-9]+">
                        </div>

                        <div class="form-modern">
                            <label class="form-label-modern" for="instansi">
                                <i class="bi bi-building-fill" style="margin-right:6px; color:#1a237e;"></i> Instansi <span class="required">*</span>
                            </label>
                            <input type="text" name="instansi" id="instansi" required>
                        </div>
                    </div>

                    <div class="form-buttons">
                        <button type="submit" class="button-baru" id="submitButton">
                            <i class="bi bi-send-fill" style="margin-right:6px;"></i> Kirim Pendaftaran
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <br><br>
        @include('frontend.android.00_fiturmenu.05_keterangan')
    </div>

    @include('frontend.android.00_fiturmenu.03_android')
</section>

@include('frontend.android.00_fiturmenu.02_footer')

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('pendaftaranForm');
    const submitButton = document.getElementById('submitButton');

    form.addEventListener('submit', function() {
        submitButton.disabled = true;
        submitButton.innerHTML = '<i class="bi bi-hourglass-split" style="margin-right:6px;"></i> Mengirim...';
    });
});
</script>
</body>
