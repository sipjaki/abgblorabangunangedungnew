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
        {{-- <p class="font-semibold leading-[28px] text-white text-center" style="font-size: 18px;">Dinas Pekerjaan Umum Dan Penataan Ruang <br> Kabupaten Blora Provinsi Jawa Tengah </span></p> --}}
        <p class="font-semibold leading-[28px] text-white text-center" style="font-size: 17px;">Dinas Pekerjaan Umum <br> Dan Penataan Ruang <br> Kabupaten Blora </span></p>
        
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
    <img src="/assets/android/pbgslf/SLF_FUNGSI_USAHA.png" class="object-cover w-full h-full" alt="thumbnail">
  </div>

  <br>
<div class="flex flex-col gap-3 mt-4">
  <p class="font-semibold text-[16px] leading-[24px] text-[#4041DA]">
    Sertifikat Laik Fungsi (SLF) – Fungsi Usaha
  </p>

  <p class="text-[15px] text-neutral-700 text-justify">
    Bangunan Gedung Fungsi Usaha meliputi:<br>
    Perkantoran, perdagangan, perindustrian, perhotelan, wisata dan rekreasi, terminal, bangunan tempat penyimpanan, peternakan.
  </p>

  <p class="font-semibold text-[15px] leading-[22px] text-[#4041DA]">1. Klasifikasi Bangunan Gedung</p>
  <p class="text-[15px] text-neutral-700 text-justify leading-[22px]">
    - Sederhana:<br>
    &nbsp;&nbsp;• 1 lantai &lt; 72m²<br>
    &nbsp;&nbsp;• 2 lantai &lt; 90m²<br>
    - Tidak Sederhana:<br>
    &nbsp;&nbsp;• 1 lantai &gt; 72m²<br>
    &nbsp;&nbsp;• 2 lantai &gt; 90m²
  </p>

  <p class="font-semibold text-[15px] leading-[22px] text-[#4041DA]">2. Persyaratan Dokumen</p>
  <p class="text-[15px] text-neutral-700 text-justify leading-[22px]">
    1. DATA TANAH:<br>
    - Dokumen tanah (Sertifikat Tanah)<br>
    - Izin Pemanfaatan Tanah (Apabila nama pemohon dengan nama yang disertifikat tidak sama)<br>
    - Gambar Kontur Tanah dan Sondir (Khusus Bangunan tidak sederhana)<br><br>

    2. DATA UMUM:<br>
    - KTP / KITAS, NIB (OSS)<br>
    - KRK / KKPR<br>
    - Dokumen Lingkungan sesuai peraturan perundangan (SPPL (OSS), UKL/UPL, AMDAL)<br>
    - Data Penyedia Jasa Perencana Konstruksi: Badan Usaha (SBU) / Arsitek Berlisensi<br><br>

    3. DATA TEKNIS ARSITEKTUR:<br>
    - Konsep arsitektur<br>
    - Gambar situasi, rencana tapak, potongan, tampak dan gambar detail<br>
    - Gambar rencana tata ruang dalam dan luar<br>
    - Spesifikasi teknis arsitektur<br>
    - Rekomendasi peil banjir (bila diperlukan)<br><br>

    4. DATA TEKNIS STRUKTUR:<br>
    - Perhitungan struktur (untuk bangunan tidak sederhana)<br>
    - Gambar detail struktur<br>
    - Spesifikasi teknis struktur<br><br>

    5. DATA TEKNIS MEP:<br>
    - Laporan Pemeriksaan Kelaikan Fungsi Bangunan Gedung<br>
    - Laporan Pemeriksaan Berkala Bangunan Gedung (hanya untuk bangunan gedung kepentingan umum)<br>
    - Gambar bangunan gedung terbangan (as built drawing)<br>
    - Data Tenaga Ahli Pengkaji Teknis bersertifikat
  </p>

  <p class="font-semibold text-[15px] leading-[22px] text-[#4041DA]">3. Tahapan Pengurusan</p>
  <p class="text-[15px] text-neutral-700 text-justify leading-[22px]">
    1. Menyiapkan dokumen tanah, KRK/KKPR (dokumen tata ruang), dan dokumen lingkungan<br>
    2. Mendaftar, membuat permohonan, dan mengunggah dokumen pada website SIMBG.PU<br>
    3. Menindaklanjuti hasil verifikasi operator dinas teknis<br>
    4. Penjadwalan konsultasi permohonan<br>
    5. Melakukan konsultasi bersama TPA/TPT<br>
    6. Merevisi dokumen sesuai masukan dan saran teknis TPA/TPT<br>
    7. Merevisi dokumen hingga TPA/TPT menyetujui dokumen perencanaan<br>
    8. Pengunggahan berkas final, perhitungan retribusi, dan validasi oleh dinas teknis<br>
    9. Pembayaran retribusi melalui bank persepsi / mobile banking<br>
    10. Penerbitan dokumen PBG di DPMPTSP & SLF di DPUPR
  </p>

  {{-- <p class="text-[15px] text-neutral-700 mt-2">
    Untuk informasi mendetail, silakan kunjungi:<br>
    <a href="https://linktr.ee/bidangbangunangedung" class="text-blue-600 underline" target="_blank">
      https://linktr.ee/bidangbangunangedung
    </a>
  </p> --}}
</div>


  <!-- Info Teks -->

</a>


      </form>

      <br><br>
      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
