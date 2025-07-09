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
    <img src="/assets/android/pbgslf/PBG_FUNGSI_HUNIAN.jpg" class="object-cover w-full h-full" alt="thumbnail">
  </div>

  <br>
  <!-- Info Teks -->
<div class="flex flex-col gap-3 mt-4">
  <p class="font-semibold text-[16px] leading-[24px] text-[#4041DA]">
    Persetujuan Bangunan Gedung (PBG) - Fungsi Hunian
  </p>
  <p class="text-[15px] text-neutral-700 text-justify">
    Persetujuan Bangunan Gedung (PBG) adalah dokumen resmi yang diperlukan untuk setiap kegiatan pembangunan. Untuk bangunan dengan fungsi hunian, PBG memastikan rencana teknis telah sesuai ketentuan peraturan.
  </p>

  <p class="font-semibold text-[15px] leading-[22px] text-[#4041DA]">Klasifikasi Bangunan Hunian:</p>
  <div class="text-[15px] text-neutral-700 text-justify">
    <ul class="list-disc ml-5">
      <li><span class="font-semibold">Sederhana</span>:
        <ul class="list-disc ml-5">
          <li>1 lantai &lt; 72 m²</li>
          <li>2 lantai &lt; 90 m²</li>
        </ul>
      </li>
      <li><span class="font-semibold">Tidak Sederhana</span>:
        <ul class="list-disc ml-5">
          <li>1 atau 2 lantai ≥ 72 m² / ≥ 90 m²</li>
        </ul>
      </li>
    </ul>
  </div>

  <p class="font-semibold text-[15px] leading-[22px] text-[#4041DA]">Persyaratan Dokumen:</p>
  <ol class="list-decimal ml-5 text-[15px] text-neutral-700 text-justify space-y-1">
    <li><span class="font-semibold">Data Tanah</span>: Sertifikat tanah, izin pemanfaatan tanah (jika nama pemohon tidak sesuai dengan sertifikat).</li>
    <li><span class="font-semibold">Data Umum</span>: KTP/KITAS, dokumen perizinan tata ruang, KRK/KKPR, data penyedia jasa konstruksi (SBU/arsitek berlisensi).</li>
    <li><span class="font-semibold">Data Teknis Arsitektur</span>: Gambar situasi, denah, potongan, tampak.</li>
    <li><span class="font-semibold">Data Teknis Struktur</span>: Gambar pondasi, rangka atap, struktur.</li>
    <li><span class="font-semibold">Data Teknis MEP</span>: Gambar jaringan listrik dan sanitasi.</li>
  </ol>
<div class="flex flex-col gap-2 mt-4">
  {{-- <p class="font-semibold text-[15px] leading-[22px] text-[#4041DA]">
    Tahapan Pengurusan:
  </p> --}}
  <div class="text-[15px] text-neutral-700 text-justify">
   <p class="font-semibold text-[15px] leading-[22px] text-[#4041DA]">
  Tahapan Pengurusan:
</p>
<p class="text-[15px] text-neutral-700 text-justify leading-[22px]">
  1. Menyiapkan dokumen tanah, KRK/KKPR (dokumen tata ruang).<br>
  2. Melakukan pendaftaran dan unggah dokumen di simbg.pu.go.id<br>
  3. Verifikasi dokumen oleh operator Dinas Teknis.<br>
  4. Penjadwalan konsultasi permohonan.<br>
  5. Konsultasi bersama TPA/TPT.<br>
  6. Revisi dokumen sesuai masukan teknis TPA/TPT.<br>
  7. TPA/TPT menyetujui dokumen perencanaan.<br>
  8. Pengunggahan berkas final, validasi, dan perhitungan retribusi.<br>
  9. Pembayaran retribusi melalui bank persepsi atau mobile banking.
</p>

  </div>
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
