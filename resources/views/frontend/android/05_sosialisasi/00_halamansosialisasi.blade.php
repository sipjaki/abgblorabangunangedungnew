@include('frontend.android.00_fiturmenu.01_header')

@include('frontend.android.00_fiturmenu.06_alert')

<body class="font-poppins text-[#070625]">
    <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[120px] relative">
      @include('frontend.abgblora.00_fiturmenu.07_coverdepan')

      <form action="success.html" id="Details" class="group result-card-container flex flex-col gap-6">
        <div id="Contact-details" class="bg-white rounded-xl overflow-hidden flex flex-col mx-[18px]">
          <div class="flex p-4 items-center gap-4">
            <button type="button" class="contact-name accordion-button flex items-center gap-2 w-full" data-accordion="accordion-1">
              <div class="flex items-center">
                <div class="w-12 h-12 flex shrink-0 rounded-full overflow-hidden">
                  <img src="/assets/android/menunavigasi/NEW04.png" class="object-cover w-full h-full" alt="photo">
                </div>
              </div>
              <div class="flex flex-col flex-1 gap-[2px] text-left">
                <p class="font-semibold">{{$title}}</p>
                {{-- <p class="font-medium text-xs leading-[18px] text-[#757C98]">Contact Details</p> --}}
              </div>
            </button>
          </div>

              <a href="/ressosialisasiabg" class="bg-white rounded-xl flex flex-col p-4 hover:shadow-md transition">
              <div class="flex items-center gap-3 p-4 rounded-lg border border-[#DCDFE6]">
                <div class="w-[60px] h-[60px] flex shrink-0 rounded-lg overflow-hidden">
                  <img src="/assets/android/menunavigasi/NEW04.png" class="object-cover w-full h-full" alt="thumbnail">
                </div>
                <div class="flex flex-col gap-[2px]">
                  <p class="font-semibold text-sm leading-[21px] text-[#4041DA]">Daftar Agenda Sosialisasi</p>
                  <p class="font-semibold">Silahkan Klik untuk informasi Sosialisasi !</p>
                </div>
              </div>
            </a>

              <a href="/respesertaabg" class="bg-white rounded-xl flex flex-col p-4 hover:shadow-md transition">
              <div class="flex items-center gap-3 p-4 rounded-lg border border-[#DCDFE6]">
                <div class="w-[60px] h-[60px] flex shrink-0 rounded-lg overflow-hidden">
                  <img src="/assets/android/menunavigasi/NEW04.png" class="object-cover w-full h-full" alt="thumbnail">
                </div>
                <div class="flex flex-col gap-[2px]">
                  <p class="font-semibold text-sm leading-[21px] text-[#4041DA]">Daftar Peserta Sosialisasi</p>
                  <p class="font-semibold">Silahkan Klik untuk informasi peserta Sosialisasi !</p>
                </div>
              </div>
            </a>

        </div>



            <!-- Card 1 -->


      </form>

      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
