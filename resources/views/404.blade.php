@include('frontend.android.00_fiturmenu.01_header')

<body class="font-poppins text-[#070625]">
  <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-6 relative">
    <div class="w-full h-[165px] absolute top-0 bg-[linear-gradient(244.6deg,_#7545FB_14.17%,_#2A3FCC_92.43%)]">
    </div>
    <div class="relative z-10 px-[18px] flex flex-col gap-6 mt-[60px]">
      <div class="top-menu flex justify-between items-center">
        <a href="javascript:history.back()" class="">
            <div class="w-[42px] h-[42px] flex shrink-0">
              <img src="/assets/android/icons/back.svg" alt="icon">
            </div>
          </a>
           <p class="font-semibold text-lg leading-[28px] text-white text-center">ABG Bangunan Gedung <span class="tracking-[2%]"><br>DPUPR Kabupaten Blora</span></p>
        <div class="dummy-spacer w-[42px] h-[42px] flex shrink-0">
        </div>
      </div>
      <div id="result" class="result-card-container flex flex-col gap-[18px]">
        <div class="empty-result h-[321px] bg-white rounded-xl overflow-hidden flex flex-col justify-center items-center gap-3">
          <div class="flex shrink-0 w-9 h-9">
            <img src="/assets/android/icons/emoticon.png" alt="icon">
          </div>

          <p class="font-medium text-[#757C98] text-center">🚧 Sorry, the website is under construction. <br> Please wait. ⏳</p>

        </div>
      </div>
    </div>

    @include('frontend.android.00_fiturmenu.03_android')


  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
