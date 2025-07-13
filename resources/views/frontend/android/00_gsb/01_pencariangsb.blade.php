@include('frontend.android.00_fiturmenu.01_header')

@include('frontend.android.00_fiturmenu.06_alert')

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
                  <img src="/assets/android/menunavigasi/07.png" class="object-cover w-full h-full" alt="photo">
                </div>
              </div>
              <div class="flex flex-col flex-1 gap-[2px] text-left">
                <p class="font-semibold">{{$title}}</p>
                {{-- <p class="font-medium text-xs leading-[18px] text-[#757C98]">Contact Details</p> --}}
              </div>
            </button>
          </div>

<div class="p-4">
    <h1 class="text-xl font-bold text-blue-800 mb-6 text-center">🔍 Pencarian GSB Kabupaten Blora</h1>

    <!-- Form pencarian -->
    <div class="mb-6">
        <label for="searchInput" class="block mb-2 font-semibold text-sm text-gray-700">Ketik atau pilih ruas jalan / jenis jalan:</label>
        <div class="relative">
            <input list="jalanOptions" id="searchInput" class="w-full px-5 py-4 border border-blue-300 rounded-xl shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent text-base" placeholder="🛣️ Contoh: Jl. Pemuda atau Jalan Nasional..." oninput="filterGSB()">
            <datalist id="jalanOptions">
                @foreach ($rencanagsb as $item)
                    <option value="{{ $item->ruasjalan }}">
                    <option value="{{ $item->jenisjalan }}">
                @endforeach
            </datalist>
        </div>
    </div>

    <!-- Hasil pencarian ke bawah (disembunyikan saat awal) -->
    <div id="gsbResultList" class="flex flex-col gap-4 hidden">
        @foreach ($rencanagsb as $index => $item)
            <div class="bg-white p-5 rounded-xl shadow-md border border-gray-200 data-card transition-transform hover:scale-[1.01]">
                <p class="text-sm text-gray-700 flex items-center gap-2"><i class="fas fa-road text-blue-600"></i> <strong class="text-blue-700">Ruas Jalan:</strong> {{ $item->ruasjalan }}</p>
                <p class="text-sm text-gray-700 flex items-center gap-2"><i class="fas fa-route text-blue-600"></i> <strong class="text-blue-700">Jenis Jalan:</strong> {{ $item->jenisjalan }}</p>
                <p class="text-sm text-gray-700 flex items-center gap-2"><i class="fas fa-ruler-combined text-blue-600"></i> <strong class="text-blue-700">GSB:</strong> {{ $item->gsb }} meter</p>
            </div>
        @endforeach
    </div>
</div>

<script>
    function filterGSB() {
        const searchValue = document.getElementById("searchInput").value.toLowerCase();
        const cards = document.querySelectorAll("#gsbResultList .data-card");
        let found = false;

        cards.forEach(card => {
            const ruas = card.querySelector("p:nth-child(1)").textContent.toLowerCase();
            const jenis = card.querySelector("p:nth-child(2)").textContent.toLowerCase();

            if (ruas.includes(searchValue) || jenis.includes(searchValue)) {
                card.style.display = 'block';
                found = true;
            } else {
                card.style.display = 'none';
            }
        });

        document.getElementById("gsbResultList").classList.toggle("hidden", !found && searchValue === '');
    }
</script>
        </div>



            <!-- Card 1 -->


      </form>

      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
