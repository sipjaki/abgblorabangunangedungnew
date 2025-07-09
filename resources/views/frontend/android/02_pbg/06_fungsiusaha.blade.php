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
<a href="/feinfocampuran" class="bg-white rounded-xl flex flex-col p-4 hover:shadow-md transition">
  <!-- Gambar Thumbnail Penuh -->
  <div class="w-full h-auto rounded-lg overflow-hidden">
    <img src="/assets/android/pbgslf/PBG_FUNGSI_USAHA.jpg" class="object-cover w-full h-full" alt="thumbnail">
  </div>

  <br>

  <div class="flex flex-col gap-4 mt-6">
  <h2 class="font-semibold text-[18px] text-[#4041DA]">Persetujuan Bangunan Gedung (PBG) – Fungsi Usaha</h2>
  <p class="text-[15px] text-neutral-700 text-justify">
    Bangunan Gedung Fungsi Usaha meliputi: <br>
    Perkantoran, perdagangan, perindustrian, wisata dan rekreasi, pertemuan, penginapan, penyimpanan, serta peternakan.
  </p>

  <h3 class="font-semibold text-[16px] text-[#4041DA]">1. Klasifikasi Bangunan Gedung</h3>
  <ul class="text-[15px] text-neutral-700 list-disc pl-5">
    <li><strong>Sederhana</strong>: 1 lantai, luas &lt; 72m²</li>
    <li><strong>Tidak Sederhana</strong>:
      <ul class="list-disc pl-5">
        <li>1 lantai, luas &gt; 72m²</li>
        <li>2 lantai, luas &lt; 90m²</li>
        <li>&gt; 2 lantai, luas &gt; 90m²</li>
      </ul>
    </li>
  </ul>

  <h3 class="font-semibold text-[16px] text-[#4041DA]">2. Persyaratan Dokumen</h3>
  <ol class="text-[15px] text-neutral-700 pl-5 space-y-3 list-decimal">
    <li><strong>Data Tanah</strong>
      <ul class="list-disc pl-5">
        <li>Sertifikat Tanah</li>
        <li>Izin Pemanfaatan Tanah (jika nama pemohon ≠ nama di sertifikat)</li>
        <li>Gambar Kontur Tanah dan Sondir (untuk bangunan tidak sederhana)</li>
      </ul>
    </li>
    <li><strong>Data Umum</strong>
      <ul class="list-disc pl-5">
        <li>KTP / KITAS / NIB (OSS)</li>
        <li>Dokumen Perizinan Tata Ruang</li>
        <li>Dokumen Lingkungan (SPPL, OSS, UKL/UPL, AMDAL)</li>
        <li>KRK (Keterangan Rencana Kabupaten/Kota)</li>
        <li>Data Penyedia Jasa Perencana: SBU / Arsitek Berlisensi</li>
      </ul>
    </li>
    <li><strong>Data Teknis Arsitektur</strong>
      <ul class="list-disc pl-5">
        <li>Konsep Arsitektur</li>
        <li>Gambar situasi, tapak, potongan, tampak, dan gambar detail</li>
        <li>Gambar rencana tata ruang (dalam & luar)</li>
        <li>Spesifikasi teknis arsitektur</li>
        <li>Rekomendasi peil banjir (jika diperlukan)</li>
      </ul>
    </li>
    <li><strong>Data Teknis Struktur</strong>
      <ul class="list-disc pl-5">
        <li>Perhitungan Struktur (untuk bangunan tidak sederhana)</li>
        <li>Gambar Detail Struktur</li>
        <li>Spesifikasi Teknis Struktur</li>
      </ul>
    </li>
    <li><strong>Data Teknis MEP</strong>
      <ul class="list-disc pl-5">
        <li>Gambar sistem jaringan listrik</li>
        <li>Gambar sistem jaringan sanitasi</li>
      </ul>
    </li>
  </ol>

  <h3 class="font-semibold text-[16px] text-[#4041DA]">3. Tahapan Pengurusan</h3>
  <ol class="text-[15px] text-neutral-700 pl-5 space-y-1 list-decimal">
    <li>Menyiapkan dokumen tanah, KRK/KKPR, dan dokumen lingkungan.</li>
    <li>Mendaftar, membuat permohonan, dan mengunggah dokumen di <a href="https://simbg.pu.go.id" class="text-blue-600 underline" target="_blank">https://simbg.pu.go.id</a></li>
    <li>Menindaklanjuti hasil verifikasi oleh operator Dinas Teknis.</li>
    <li>Penjadwalan konsultasi permohonan.</li>
    <li>Konsultasi bersama TPA/TPT.</li>
    <li>Revisi dokumen sesuai masukan teknis dari TPA/TPT.</li>
    <li>TPA/TPT menyetujui dokumen perencanaan.</li>
    <li>Upload berkas final, perhitungan retribusi, dan validasi oleh Dinas Teknis.</li>
    <li>Pembayaran retribusi melalui bank persepsi / mobile banking.</li>
    <li>Penerbitan dokumen PBG oleh DPMPTSP.</li>
  </ol>

  <div class="text-[15px] text-neutral-700 mt-4">
    Untuk informasi mendetail, silakan akses: <br>
    <a href="https://linktr.ee/bidangbangunangedung" class="text-blue-600 underline" target="_blank">
      https://linktr.ee/bidangbangunangedung
    </a>
  </div>
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
