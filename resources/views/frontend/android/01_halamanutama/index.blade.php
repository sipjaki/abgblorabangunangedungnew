@include('frontend.android.00_fiturmenu.01_header')
@include('frontend.android.00_fiturmenu.06_alert')

<body class="font-poppins text-[#070625]">
  <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[122px] relative">
    <header class="flex justify-center h-[376px] px-[18px] relative overflow-hidden -mb-[106px]">
      <img src="/assets/android/iconmenu/dashboard999.jpg" class="absolute object-cover w-full h-full" alt="backgrounds">

      <div class="fixed top-0 w-full max-w-[640px] px-[18px] z-30" style="margin-top: -25px;">
<nav class="bg-white p-3 sm:p-[10px_16px] h-fit w-full flex items-center justify-between rounded-full shadow-[0_8px_30px_0_#0A093212] z-10 mt-[60px]">
  <!-- Logo Kiri -->
  <a href="signup.html" class="shrink-0">
    <div class="w-12 h-12 sm:w-[54px] sm:h-[54px] flex overflow-hidden rounded-full items-center justify-center">
      <img src="/assets/abgblora/logo/logokabupatenblora.png" alt="icon" class="w-[80%]">
    </div>
  </a>

  <!-- Teks Tengah -->
 <div class="flex-1 mx-2 sm:mx-4 min-w-0">
  <div class="flex flex-col items-center sm:items-start text-center sm:text-left">
    <p class="font-semibold text-sm sm:text-base leading-tight text-[#4041DA] truncate w-full">
      ABG Blora Bangunan Gedung
    </p>
    <div class="flex items-center justify-center sm:justify-start">
      <p class="font-semibold text-sm sm:text-base leading-tight whitespace-normal">
        Dinas Pekerjaan Umum Dan Penataan Ruang <br> Kabupaten Blora Jawa Tengah
      </p>
    </div>
  </div>
</div>

  <!-- Logo Kanan -->
  <a href="" class="shrink-0">
    <div class="w-12 h-12 sm:w-[54px] sm:h-[54px] flex overflow-hidden rounded-full items-center justify-center">
      <img src="/assets/abgblora/logo/pupr.png" alt="icon" class="w-[80%]">
    </div>
  </a>
</nav>
      </div>
    </header>

    @include('frontend.android.00_fiturmenu.04_menunavigasi')

    {{-- ================================================================== --}}
<div id="Promo" style="
  margin-top: 1.5rem;
  width: 100%;
  background-color: #3B2F63;
  overflow: hidden;
  padding: 2rem 1rem;
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
  box-sizing: border-box;
  color: white;
    border-radius:15px;
  font-family: 'Segoe UI', sans-serif;
">
      <div class="flex justify-between items-center px-[18px]">
        <h1 class="font-semibold leading-[27px]" style="font-size: 16px;">Agenda Sosialisasi</h1>
        <a href="" class="font-semibold text-sm leading-[21px]" style="color: white;">See All</a>
      </div>
      <div class="main-carousel">
        <a href="" class="pl-[18px] last:pr-[18px]">
          <div class="w-fit flex flex-col gap-4">
            <div class="w-[310px] h-[160px] flex shrink-0 overflow-hidden rounded-xl">
              <img src="/assets/android/thumbnails/gambar001.png" class="object-cover w-full h-full" alt="thumbnail">
            </div>
            <div class="flex flex-col gap-1">
              {{-- <p class="font-semibold">Wonderful Indonesia</p> --}}
              {{-- <p class="text-[#757C98] font-semibold text-sm leading-[21px]">Available 9 Promos</p> --}}
            </div>
          </div>
        </a>
        <a href="" class="pl-[18px] last:pr-[18px]">
          <div class="w-fit flex flex-col gap-4">
            <div class="w-[310px] h-[160px] flex shrink-0 overflow-hidden rounded-xl">
              <img src="/assets/android/thumbnails/gambar002.png" class="object-cover w-full h-full" alt="thumbnail">
            </div>
            <div class="flex flex-col gap-1">
              {{-- <p class="font-semibold">Majestic Thailand</p>
              <p class="text-[#757C98] font-semibold text-sm leading-[21px]">Available 25 Promos</p> --}}
            </div>
          </div>
        </a>
        <a href="" class="pl-[18px] last:pr-[18px]">
          <div class="w-fit flex flex-col gap-4">
            <div class="w-[310px] h-[160px] flex shrink-0 overflow-hidden rounded-xl">
              <img src="/assets/android/thumbnails/gambar003.png" class="object-cover w-full h-full" alt="thumbnail">
            </div>
            <div class="flex flex-col gap-1">
              {{-- <p class="font-semibold">Amazing Singapore</p>
              <p class="text-[#757C98] font-semibold text-sm leading-[21px]">Available 22 Promos</p> --}}
            </div>
          </div>
        </a>
      </div>
    </div>

    {{-- ================================================================== --}}

    {{-- ================================================================== --}}
  <div id="Promo" style="
  margin-top: 1.5rem;
  width: 100%;
  background-color: #3B2F63;
  overflow: hidden;
  padding: 2rem 1rem;
  display: flex;
  flex-direction: column;
  gap: 1.5rem;
  box-sizing: border-box;
  color: white;
  border-radius:15px;
  font-family: 'Segoe UI', sans-serif;
">
      <div class="flex justify-between items-center px-[18px]">
        <h1 class="font-semibold leading-[27px]" style="font-size:16px;">Berita Bangunan Gedung</h1>
        <a href="" class="font-semibold text-sm leading-[21px]" style="color: white;">See All</a>
      </div>
      <div class="main-carousel">

        <a href="" class="pl-[18px] last:pr-[18px]">
          <div class="w-fit flex flex-col gap-4">
            <div class="w-[310px] h-[160px] flex shrink-0 overflow-hidden rounded-xl">
              <img src="/assets/android/thumbnails/gambar004.png" class="object-cover w-full h-full" alt="thumbnail">
            </div>
            <div class="flex flex-col gap-1">
              {{-- <p class="font-semibold">Majestic Thailand</p>
              <p class="text-[#757C98] font-semibold text-sm leading-[21px]">Available 25 Promos</p> --}}
            </div>
          </div>
        </a>

        <a href="" class="pl-[18px] last:pr-[18px]">
            <div class="w-fit flex flex-col gap-4">
              <div class="w-[310px] h-[160px] flex shrink-0 overflow-hidden rounded-xl">
                <img src="/assets/android/thumbnails/gambar005.png" class="object-cover w-full h-full" alt="thumbnail">
              </div>
              <div class="flex flex-col gap-1">
                {{-- <p class="font-semibold">Wonderful Indonesia</p>/
                <p class="text-[#757C98] font-semibold text-sm leading-[21px]">Available 9 Promos</p> --}}
              </div>
            </div>
          </a>

          <a href="" class="pl-[18px] last:pr-[18px]">
            <div class="w-fit flex flex-col gap-4">
              <div class="w-[310px] h-[160px] flex shrink-0 overflow-hidden rounded-xl">
                <img src="/assets/android/thumbnails/gambar006.png" class="object-cover w-full h-full" alt="thumbnail">
              </div>
              <div class="flex flex-col gap-1">
                {{-- <p class="font-semibold">Amazing Singapore</p>
                <p class="text-[#757C98] font-semibold text-sm leading-[21px]">Available 22 Promos</p> --}}
              </div>
            </div>
          </a>
      </div>
    </div>

    <br><br>

    @include('frontend.android.00_fiturmenu.05_keterangan')

    {{-- ================================================================== --}}


    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
