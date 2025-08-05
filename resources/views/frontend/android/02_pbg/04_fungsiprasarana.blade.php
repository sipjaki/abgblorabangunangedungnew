@include('frontend.android.00_fiturmenu.01_header')
@include('backend.00_administrator.00_baganterpisah.09_button')

<body class="font-poppins text-[#070625]">
  <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[120px] relative">

    <div class="w-full h-[190] absolute top-0 overflow-hidden">
  <img src="/assets/android/iconmenu/bangunanbarublora.png" alt="Bangunan Blora" class="w-full h-full object-cover" />
</div>

     <div class="relative z-10 flex flex-col gap-6 mt-[60px]">
      <div class="top-menu flex justify-between items-center px-[18px]">
          <div class="w-[42px] h-[42px] flex shrink-0">
            <img src="/assets/abgblora/logo/logokabupatenblora.png" alt="icon">
          </div>
        {{-- <p class="font-semibold leading-[28px] text-white text-center" style="font-size: 18px;">Dinas Pekerjaan Umum Dan Penataan Ruang <br> Kabupaten Blora Provinsi Jawa Tengah </span></p> --}}
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
">
  <p style="
    font-size: 17px;
    font-weight: 600;
    line-height: 28px;
    color: #000;
    text-align: center;
    margin: 0;
  ">
    Dinas Pekerjaan Umum <br>
    Dan Penataan Ruang <br>
    Kabupaten Blora
  </p>
</div>

        <div class="w-[42px] h-[42px] flex shrink-0">
            <img src="/assets/abgblora/logo/pupr.png" alt="icon">
          </div>
      </div>
      <form id="Details" class="group result-card-container flex flex-col gap-6">
        <div id="Contact-details" class="bg-white rounded-xl overflow-hidden flex flex-col mx-[18px]">
          <div class="flex p-4 items-center gap-4">
            <button type="button" class="contact-name accordion-button flex items-center gap-2 w-full" data-accordion="accordion-1">
              <div class="flex items-center">
                <div class="w-12 h-12 flex shrink-0 rounded-full overflow-hidden">
                  <img src="/assets/android/menunavigasi/03.png" class="object-cover w-full h-full" alt="photo">
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
            <!-- Card 1 -->
<div class="flex flex-col space-y-[0px] px-[0px] py-[0px]">
    @foreach ($data as $item)
        <div class="bg-white rounded-xl p-[8px] shadow-sm">
            @if ($item->berkas && file_exists(public_path('storage/' . $item->berkas)))
                <img src="{{ asset('storage/' . $item->berkas) }}" alt="Berkas" style="width: 100%; height: 450px; object-fit: contain; border-radius: 8px;" />
                <div style="text-align: center; margin-top: 2px; margin-bottom: 3px;">
                    <a href="{{ asset('storage/' . $item->berkas) }}" download class="button-baru">Download Informasi</a>
                </div>
            @elseif ($item->berkas)
                <img src="{{ asset($item->berkas) }}" alt="Berkas" style="width: 100%; height: 450px; object-fit: contain; border-radius: 8px;" />
                <div style="text-align: center; margin-top: 2px; margin-bottom: 3px;">
                    <a href="{{ asset($item->berkas) }}" download class="button-baru">Download Informasi</a>
                </div>
            @else
                <p style="font-family: 'Poppins', sans-serif; font-weight: 600; margin: 0;">Data belum diupdate</p>
            @endif
        </div>
    @endforeach
</div>

  <br>
  <!-- Info Teks -->

<style>
  .card-prasarana {
    background-color: #fff;
    border-radius: 12px;
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    /* font-family: 'Segoe UI', sans-serif; */
      font-family: 'Poppins', sans-serif;
    font-size: 15px;
    color: #333;
    line-height: 1.6;
    max-width: 850px;
    margin: auto;
  }

  .card-prasarana .title {
    font-size: 16px;
    font-weight: 600;
    color: #4041DA;
    margin-bottom: 10px;
  }

  .card-prasarana .section {
    margin-bottom: 20px;
  }

  .card-prasarana .manual-number {
    margin-bottom: 10px;
    text-align: justify;
  }

  .card-prasarana .manual-number span {
    font-weight: 600;
  }

  .card-prasarana ul {
    padding-left: 20px;
    margin-top: 5px;
    margin-bottom: 15px;
  }

  .card-prasarana ul li {
    list-style-type: disc;
    margin-bottom: 5px;
  }

  .card-prasarana a {
    color: #1D4ED8;
    text-decoration: underline;
  }
</style>

<div class="card-prasarana">
  <div class="section">
    <p class="title">Persetujuan Bangunan Gedung (PBG) - Fungsi Prasarana</p>
    <p class="manual-number">
      Persetujuan Bangunan Gedung (PBG) adalah dokumen resmi yang dibutuhkan untuk mendirikan bangunan prasarana seperti menara telekomunikasi. Dokumen ini memastikan bahwa pembangunan sesuai ketentuan teknis, tata ruang, dan lingkungan yang berlaku.
    </p>
  </div>

  <div class="section">
    <p class="title">Persyaratan Dokumen:</p>

    <p class="manual-number">1. <span>Data Tanah:</span></p>
    <ul>
      <li>Sertifikat tanah</li>
      <li>Izin Pemanfaatan Tanah (jika nama pemohon berbeda dengan sertifikat)</li>
      <li>Gambar kontur tanah dan sondir (khusus bangunan tidak sederhana)</li>
    </ul>

    <p class="manual-number">2. <span>Data Umum:</span></p>
    <ul>
      <li>KTP / Profil Perusahaan, NIB (OSS)</li>
      <li>KRK / KKPR</li>
      <li>Dokumen lingkungan sesuai peraturan perundangan (SPPL, OSS, UKL/UPL, AMDAL)</li>
      <li>Data penyedia jasa konstruksi: Badan Usaha (SBU) / Arsitek berlisensi</li>
      <li>Verifikasi pernyataan mandiri / PKKPR otomatis untuk kegiatan usaha dari FPR (Forum Penataan Ruang) Kabupaten Blora</li>
      <li>KKOP (Ketentuan Keselamatan Operasi Penerbangan)</li>
      <li>Persetujuan warga sekitar menara yang diketahui lurah/kepala desa, disertai dokumentasi dan berita acara sosialisasi</li>
    </ul>

    <p class="manual-number">3. <span>Data Teknis Arsitektur:</span></p>
    <ul>
      <li>Gambar dan perhitungan teknis untuk prasarana</li>
    </ul>
  </div>

  <div class="section">
    <p class="title">Tahapan Pengurusan:</p>

    <p class="manual-number">1. Menyiapkan dokumen tanah, KRK/KKPR, dan dokumen lingkungan</p>
    <p class="manual-number">2. Mendaftar, membuat permohonan, dan mengunggah dokumen ke
      <a href="https://simbg.pu.go.id" target="_blank">https://simbg.pu.go.id</a>
    </p>
    <p class="manual-number">3. Menindaklanjuti hasil verifikasi operator dinas teknis</p>
    <p class="manual-number">4. Penjadwalan konsultasi permohonan</p>
    <p class="manual-number">5. Melakukan konsultasi bersama TPA/TPT</p>
    <p class="manual-number">6. Merevisi dokumen sesuai masukan dari TPA/TPT</p>
    <p class="manual-number">7. TPA/TPT menyetujui dokumen perencanaan</p>
    <p class="manual-number">8. Pengunggahan dokumen final, validasi, dan perhitungan retribusi</p>
    <p class="manual-number">9. Pembayaran retribusi melalui bank persepsi atau mobile banking</p>
    <p class="manual-number">10. Penerbitan dokumen PBG oleh DPMPTSP</p>
  </div>

  <!-- Link Tambahan (jika ingin ditampilkan) -->
  <!--
  <div class="section">
    <p>Untuk informasi lebih lengkap, kunjungi:
      <a href="https://linktr.ee/bidangbangunangedung" target="_blank">https://linktr.ee/bidangbangunangedung</a>
    </p>
  </div>
  -->
</div>


      </form>

      <br><br>
      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
