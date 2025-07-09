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

  <div class="flex flex-col gap-3 mt-4">
  <p class="font-semibold text-[16px] leading-[24px] text-[#4041DA]">
    Persetujuan Bangunan Gedung (PBG) – Fungsi Usaha
  </p>
  <p class="text-[15px] text-neutral-700 text-justify">
    Bangunan Gedung Fungsi Usaha meliputi: <br>
    Perkantoran, perdagangan, perindustrian, wisata dan rekreasi, pertemuan, penginapan, penyimpanan, peternakan, dan bangunan tempat pelayanan peribadatan.
  </p>

  <p class="font-semibold text-[15px] leading-[22px] text-[#4041DA]">Klasifikasi Bangunan Gedung</p>
  <div class="text-[15px] text-neutral-700 leading-[22px]">
    <ul class="list-disc pl-5">
      <li><strong>Sederhana</strong>: 1 lantai, &lt; 72m²</li>
      <li><strong>Tidak Sederhana</strong>:
        <ul class="list-disc pl-5">
          <li>1 lantai, &gt; 72m²</li>
          <li>2 lantai, &lt; 90m²</li>
          <li>&gt; 2 lantai, &gt; 90m²</li>
        </ul>
      </li>
    </ul>
  </div>

  <p class="font-semibold text-[15px] leading-[22px] text-[#4041DA]">Persyaratan:</p>
  <ol class="text-[15px] text-neutral-700 text-justify leading-[22px] space-y-2 list-decimal pl-5">
    <li><strong>DATA TANAH</strong>
      <ul class="list-disc pl-5">
        <li>Dokumen tanah (Sertifikat Tanah)</li>
        <li>Izin Pemanfaatan Tanah (Apabila nama pemohon dengan nama yang disertifikat tidak sama)</li>
        <li>Gambar Kontur Tanah dan Sondir (Khusus Bangunan tidak sederhana)</li>
      </ul>
    </li>
    <li><strong>DATA UMUM</strong>
      <ul class="list-disc pl-5">
        <li>KTP / KITAS, NIB (OSS)</li>
        <li>Dokumen Perizinan Tata Ruang</li>
        <li>Dokumen Lingkungan sesuai peraturan perundangan (SPPL, OSS, UKL/UPL, AMDAL)</li>
        <li>KRK (Keterangan Rencana Kota/Kabupaten)</li>
        <li>Data Penyedia Jasa Perencana Konstruksi: - Badan Usaha (SBU) / Arsitek Berlisesnsi</li>
      </ul>
    </li>
    <li><strong>DATA TEKNIS ARSITEKTUR</strong>
      <ul class="list-disc pl-5">
        <li>Konsep arsitektur</li>
        <li>Gambar situasi, rencana tapak, potongan, tampak dan gambar detail</li>
        <li>Gambar rencana tata ruang dalam dan luar</li>
        <li>Spesifikasi teknis arsitektur</li>
        <li>Rekomendasi peil banjir (Bila diperlukan)</li>
      </ul>
    </li>
    <li><strong>DATA TEKNIS STRUKTUR</strong>
      <ul class="list-disc pl-5">
        <li>Perhitungan struktur (Untuk Bangunan tidak sederhana)</li>
        <li>Gambar detail struktur</li>
        <li>Spesifikasi teknis struktur</li>
      </ul>
    </li>
    <li><strong>DATA TEKNIS MEP</strong>
      <ul class="list-disc pl-5">
        <li>Gambar sistem jaringan listrik</li>
        <li>Gambar sistem jaringan sanitasi</li>
      </ul>
    </li>
  </ol>

  <p class="font-semibold text-[15px] leading-[22px] text-[#4041DA]">
    Tahapan Pengurusan:
  </p>
  <ol class="text-[15px] text-neutral-700 text-justify leading-[22px] space-y-1 list-decimal pl-5">
    <li>Menyiapkan dokumen tanah, KRK/KKPR (dokumen tata ruang), dan dokumen lingkungan.</li>
    <li>Mendaftar, membuat permohonan, dan mengunggah dokumen pada website SIMBG.PU.GO.ID</li>
    <li>Menindaklanjuti hasil verifikasi operator dinas teknis</li>
    <li>Penjadwalan konsultasi permohonan</li>
    <li>Melakukan konsultasi bersama TPA/TPT</li>
    <li>Merevisi dokumen sesuai masukan dan saran teknis TPA/TPT</li>
    <li>Merevisi dokumen hingga TPA/TPT menyetujui dokumen perencanaan</li>
    <li>Pengunggahan berkas final, perhitungan retribusi, dan validasi oleh dinas teknis</li>
    <li>Pembayaran retribusi melalui bank persepsi / mobile banking</li>
    <li>Penerbitan dokumen PBG di DPMPTSP</li>
  </ol>

  {{-- <div class="mt-4 text-[15px] text-neutral-700">
    Untuk informasi mendetail, silakan akses link berikut: <br>
    <a href="https://linktr.ee/bidangbangunangedung" class="text-blue-600 underline" target="_blank">
      https://linktr.ee/bidangbangunangedung
    </a>
  </div> --}}
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
