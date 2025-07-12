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
    <img src="/assets/android/bantek/6.jpg" class="object-cover w-full h-full" alt="thumbnail">
  </div>

  <br>
<!-- Info Teks -->
<div class="flex flex-col gap-2 mt-4">
  <p class="font-semibold text-[16px] leading-[24px] text-[#4041DA]">
    Jenis Bantuan Teknis - Peneliti Kontrak
  </p>
  <p class="text-[16px] text-neutral-700" style="text-align: justify;">
    Pemberian bantuan tenaga kepada K/L/OPD sebagai tim peneliti kontrak untuk membantu PA/KPA/PPK
    untuk kepentingan perubahan kontrak pada tahap pelaksanaan kontrak kerja konstruksi.
    Pembentukan tim peneliti kontrak sebagaimana tertuang dalam PERLEM LKPP No. 12 tahun 2021
    tentang perubahan kontrak “25.11”. Untuk kepentingan perubahan kontrak, Pejabat Penandatangan
    Kontrak dapat menetapkan tim peneliti kontrak.
    <br><br>
    <strong>Flow Proses:</strong><br>
    1. Permohonan K/L/OPD (Perihal Permintaan Tenaga Teknis)<br>
    2. Surat Tugas (Pemberian Nama Personil yang Ditugaskan)<br>
    3. SK Penetapan Tim Teknis (Dibuat oleh K/L/OPD tempat penugasan personil)<br>
    4. Laporan (Laporan Pelaksanaan Kegiatan dalam kurun waktu penugasan personil sebagai Tim Teknis)
  </p>
</div>

</a>


      </form>

      <br><br>
      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
