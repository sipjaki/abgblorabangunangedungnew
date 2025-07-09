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
        <p class="font-semibold leading-[28px] text-white text-center" style="font-size: 18px;">Dinas Pekerjaan Umum Dan Penataan Ruang <br> Kabupaten Blora Provinsi Jawa Tengah </span></p>
        <div class="w-[42px] h-[42px] flex shrink-0">
            <img src="/assets/abgblora/logo/pupr.png" alt="icon">
          </div>
      </div>
      <form action="success.html" id="Details" class="group result-card-container flex flex-col gap-6">
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
<a href="#" class="bg-white rounded-xl flex flex-col p-4 hover:shadow-md transition">
  <!-- Gambar Thumbnail Penuh -->
  <div class="w-full h-auto rounded-lg overflow-hidden">
    <img src="/assets/android/pbgslf/PBG_FUNGSI_KEAGAMAAN.png" class="object-cover w-full h-full" alt="thumbnail">
  </div>

  <br>
  <!-- Info Teks -->
<div class="flex flex-col gap-3 mt-4">
  <p class="font-semibold text-[16px] leading-[24px] text-[#4041DA]">
    Persetujuan Bangunan Gedung (PBG) - Fungsi Keagamaan
  </p>
  <p class="text-[15px] text-neutral-700 text-justify">
    Persetujuan Bangunan Gedung (PBG) adalah dokumen resmi yang dibutuhkan sebelum mendirikan bangunan. Untuk bangunan fungsi keagamaan seperti masjid, gereja, vihara, pura, dan lainnya, PBG diperlukan agar pembangunan sesuai dengan ketentuan teknis, lingkungan, dan tata ruang yang berlaku.
  </p>

  <p class="font-semibold text-[15px] leading-[22px] text-[#4041DA]">Klasifikasi Bangunan Keagamaan:</p>
  <p class="text-[15px] text-neutral-700 text-justify leading-[22px]">
    <span class="font-semibold">Sederhana</span><br>
    - 1 lantai &lt; 72 m²<br>
    - 2 lantai &lt; 90 m²<br><br>

    <span class="font-semibold">Tidak Sederhana</span><br>
    - 1 lantai ≥ 72 m²<br>
    - 2 lantai ≥ 90 m²
  </p>

  <p class="font-semibold text-[15px] leading-[22px] text-[#4041DA]">Persyaratan Dokumen:</p>
  <p class="text-[15px] text-neutral-700 text-justify leading-[22px]">
    1. <span class="font-semibold">Data Tanah</span>:<br>
    - Sertifikat tanah<br>
    - Izin Pemanfaatan Tanah (jika nama pemohon tidak sesuai dengan sertifikat)<br>
    - Gambar kontur tanah dan sondir (untuk bangunan tidak sederhana)<br><br>

    2. <span class="font-semibold">Data Umum</span>:<br>
    - KTP/KITAS (Ketua Yayasan/Ormas/Lembaga)<br>
    - KRK/KKPR<br>
    - Dokumen lingkungan sesuai peraturan (SPPL atau yang dikeluarkan DPMPTSP)<br>
    - Data penyedia jasa konstruksi (SBU/Arsitek bersertifikat)<br>
    - Surat Rekomendasi FKUB (Forum Kerukunan Umat Beragama)<br><br>

    3. <span class="font-semibold">Data Teknis Arsitektur</span>:<br>
    - Konsep arsitektur<br>
    - Gambar situasi, rencana tapak, potongan, tampak, dan gambar detail<br>
    - Gambar rencana tata ruang dalam dan luar<br>
    - Spesifikasi teknis arsitektur<br>
    - Rekomendasi peta banjir (bila diperlukan)<br><br>

    4. <span class="font-semibold">Data Teknis Struktur</span>:<br>
    - Perhitungan struktur (untuk bangunan tidak sederhana)<br>
    - Gambar detail struktur<br>
    - Spesifikasi teknis struktur<br><br>

    5. <span class="font-semibold">Data Teknis MEP</span>:<br>
    - Gambar sistem jaringan listrik<br>
    - Gambar sistem jaringan sanitasi<br>
    - Gambar sistem proteksi kebakaran<br>
    - Data teknis MEP lainnya
  </p>

  <p class="font-semibold text-[15px] leading-[22px] text-[#4041DA]">
    Tahapan Pengurusan:
  </p>
  <p class="text-[15px] text-neutral-700 text-justify leading-[22px]">
    1. Menyiapkan dokumen tanah, KRK/KKPR, dan dokumen lingkungan<br>
    2. Mendaftar, membuat permohonan, dan mengunggah dokumen ke https://simbg.pu.go.id<br>
    3. Menindaklanjuti hasil verifikasi operator dinas teknis<br>
    4. Penjadwalan konsultasi permohonan<br>
    5. Melakukan konsultasi bersama TPA/TPT<br>
    6. Merevisi dokumen sesuai masukan dari TPA/TPT<br>
    7. Merevisi dokumen hingga disetujui oleh TPA/TPT<br>
    8. Mengunggah dokumen final, perhitungan retribusi, dan validasi teknis<br>
    9. Pembayaran retribusi melalui bank persepsi atau mobile banking<br>
    10. Penerbitan dokumen PBG oleh DPMPTSP
  </p>

  {{-- <p class="text-[15px] text-neutral-700 mt-2">
    Untuk informasi lebih lanjut, silakan kunjungi:
    <a href="https://linktr.ee/bidangbangunangedung" target="_blank" class="text-blue-600 underline">https://linktr.ee/bidangbangunangedung</a>
  </p> --}}
</div>

{{--
  <p class="text-[15px] text-neutral-700 mt-2">
    Untuk informasi lebih lengkap, kunjungi:
    <a href="https://linktr.ee/bidangbangunangedung" target="_blank" class="text-blue-600 underline">https://linktr.ee/bidangbangunangedung</a>
  </p> --}}
</div>

</a>


      </form>

      <br><br>
      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
