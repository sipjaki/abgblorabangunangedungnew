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
        <p class="font-semibold leading-[28px] text-black text-center" style="font-size: 17px;">Dinas Pekerjaan Umum <br> Dan Penataan Ruang <br> Kabupaten Blora </span></p>

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
                  <img src="/assets/android/menunavigasi/04.png" class="object-cover w-full h-full" alt="photo">
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
    <img src="/assets/android/bantek/12.jpg" class="object-cover w-full h-full" alt="thumbnail">
  </div>
<br>
  <div class="w-full h-auto rounded-lg overflow-hidden">
    <img src="/assets/android/bantek/13.jpg" class="object-cover w-full h-full" alt="thumbnail">
  </div>

  <br>
<!-- Info Teks -->
<!-- Info Teks -->
<div class="flex flex-col gap-2 mt-4">
  <p class="font-semibold text-[16px] leading-[24px] text-[#4041DA]">
    6. Pendampingan Serah Terima Pekerjaan
  </p>
  <p class="text-[16px] text-neutral-700" style="text-align: justify;">
    Pemberian bantuan tenaga teknis kepada K/L/OPD untuk membantu pengguna anggaran dalam pendampingan serah terima pekerjaan pembangunan bangunan gedung negara terhadap pekerjaan akhir berupa PHO dan FHO.
  </p>

  <p class="font-semibold text-[16px] leading-[24px] text-[#4041DA] mt-4">
    Serah Terima Sementara Pekerjaan (Provisional Hand Over - PHO)
  </p>
  <p class="text-[16px] text-neutral-700" style="text-align: justify;">
    Adalah suatu kegiatan serah terima seluruh pekerjaan yang dilakukan secara resmi dari penyedia jasa kepada pengguna jasa setelah diteliti terlebih dahulu oleh Tim Teknis dan Konsultan Pengawas.
  </p>

  <p class="font-semibold text-[16px] leading-[24px] text-[#4041DA] mt-4">
    Serah Terima Akhir Pekerjaan (Final Hand Over - FHO)
  </p>
  <p class="text-[16px] text-neutral-700" style="text-align: justify;">
    Adalah suatu kegiatan serah terima akhir pekerjaan yang dilakukan secara resmi dari penyedia jasa kepada pengguna jasa setelah penyedia jasa menyelesaikan semua kewajibannya selama masa pemeliharaan.
  </p>

  <p class="text-[16px] text-neutral-700 italic mt-2">
    Keseluruhan proses di atas membutuhkan tenaga pendamping serah terima pekerjaan.
  </p>

  <p class="font-semibold text-[16px] leading-[24px] text-[#4041DA] mt-6">
    Flow Proses Pendampingan Serah Terima Pekerjaan
  </p>

  <ul class="list-decimal text-[16px] text-neutral-700" style="padding-left: 1.25rem;">
    <li>
      <strong>Permohonan K/L/OPD</strong><br>
      Perihal permintaan tenaga pendamping proses serah terima akhir pekerjaan.
    </li>
    <li>
      <strong>Surat Tugas</strong><br>
      Pemberian nama personil yang ditugaskan.
    </li>
    <li>
      <strong>Pengumpulan Data dan Informasi</strong><br>
      Berkas-berkas yang harus dikumpulkan meliputi:
      <ul class="list-disc" style="padding-left: 1.25rem;">
        <li>As Built Drawing</li>
        <li>Laporan Mingguan/Laporan Bulanan</li>
        <li>Backup Data</li>
        <li>Dokumentasi</li>
        <li>Laporan administrasi pelaksanaan pekerjaan lainnya (hasil uji lab dan lain-lain)</li>
      </ul>
    </li>
    <li>
      <strong>Pemeriksaan Bangunan</strong><br>
      Membantu melakukan pemeriksaan kelengkapan administrasi pekerjaan dan mutu/kualitas pekerjaan.
    </li>
    <li>
      <strong>Kriteria Pekerjaan</strong><br>
      Pekerjaan harus 100% selesai secara kualitas dan kuantitas.
    </li>
    <li>
      <strong>Laporan/Rekomendasi Pendamping Pengawasan</strong><br>
      Menentukan kondisi pekerjaan berdasarkan pemeriksaan:
      <ul class="list-disc" style="padding-left: 1.25rem;">
        <li>Pekerjaan 100% dibutuhkan RAST</li>
        <li>Pekerjaan 100% namun perlu perbaikan</li>
        <li>Pekerjaan belum 100%</li>
      </ul>
    </li>
  </ul>
</div>

</a>


      </form>

      <br><br>
      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
