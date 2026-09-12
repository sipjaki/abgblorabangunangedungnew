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

        <p class="font-semibold leading-[28px] text-black text-center" style="font-size: 17px;">Dinas Pekerjaan Umum <br> Dan Penataan Ruang <br> Kabupaten Blora </span></p>

        <div class="w-[42px] h-[42px] flex shrink-0">
            <img src="/assets/abgblora/logo/pupr.png" alt="icon">
          </div>
      </div>
      <form action="success.html" id="Details" class="group result-card-container flex flex-col gap-6">
        <div id="Contact-details" class="bg-white rounded-2xl overflow-hidden flex flex-col mx-[18px] border border-[#E9EDF4] shadow-[0_2px_8px_rgba(0,0,0,0.02)]">
          <div class="flex p-4 items-center gap-4">
            <button type="button" class="contact-name accordion-button flex items-center gap-2 w-full" data-accordion="accordion-1">
              <div class="flex items-center">
                <div class="w-12 h-12 flex shrink-0 rounded-full overflow-hidden bg-[#E6F0FF]">
                  <img src="/assets/android/menunavigasi/07.png" class="object-cover w-full h-full" alt="photo">
                </div>
              </div>
              <div class="flex flex-col flex-1 gap-[2px] text-left">
                <p class="font-semibold text-[#1A2B4A]">{{$title}}</p>
              </div>
            </button>
          </div>

        </div>

<!-- View: resources/views/frontend/android/00_gsb/01_pencariangsb.blade.php -->
<div class="mx-[18px] bg-white rounded-2xl border border-[#E9EDF4] shadow-[0_2px_8px_rgba(0,0,0,0.02)] p-5">

    <h1 class="text-lg font-bold text-[#1A2B4A] mb-4 flex items-center gap-2">
        <i class="fas fa-search text-[#0D6EFD]"></i>
        Pencarian GSB Kabupaten Blora
    </h1>

    <!-- Form pencarian -->
    <div class="mb-5">
        <label for="searchInput" class="block mb-2 text-[0.75rem] font-semibold text-[#6B7A93] uppercase tracking-wide">
            Ketik atau pilih ruas jalan
        </label>
        <div class="relative">
            <input list="jalanOptions" id="searchInput"
                   class="w-full px-4 py-3 border border-[#E9EDF4] rounded-xl bg-[#F8FAFC]
                          focus:outline-none focus:ring-2 focus:ring-[#0D6EFD]/20
                          focus:border-[#0D6EFD] text-sm text-[#1A2B4A] transition-all"
                   placeholder="Contoh: Jl. Pemuda, Jl. Blora-Cepu"
                   oninput="filterGSB()">
            <datalist id="jalanOptions">
                @foreach ($rencanagsb as $item)
                    <option value="{{ $item->ruasjalan }}">
                @endforeach
            </datalist>
        </div>
    </div>

    <!-- Jarak batas hasil -->
    <div class="border-t border-[#F0F0F0] mb-4"></div>

    <!-- Hasil pencarian -->
    <div id="gsbResultList" class="flex flex-col gap-4 hidden">
        @foreach ($rencanagsb as $index => $item)
            <div class="bg-[#F8FAFC] p-4 rounded-xl border border-[#E9EDF4] data-card transition-all hover:border-[#D0D8E3] hover:shadow-[0_4px_12px_rgba(0,0,0,0.04)]">
                <p class="text-sm text-[#4A5A72] flex items-center gap-2 mb-2">
                    <i class="fas fa-road text-[#0D6EFD] w-4"></i>
                    <strong class="text-[#1A2B4A]">Ruas Jalan:</strong>
                    <span class="text-[#1A2B4A]">{{ $item->ruasjalan }}</span>
                </p>
                <p class="text-sm text-[#4A5A72] flex items-center gap-2 mb-2">
                    <i class="fas fa-route text-[#0D6EFD] w-4"></i>
                    <strong class="text-[#1A2B4A]">Jenis Jalan:</strong>
                    <span class="text-[#1A2B4A]">{{ $item->jenisjalan }}</span>
                </p>
                <p class="text-sm text-[#4A5A72] flex items-center gap-2">
                    <i class="fas fa-ruler-combined text-[#0D6EFD] w-4"></i>
                    <strong class="text-[#1A2B4A]">GSB:</strong>
                    <span class="text-[#1A2B4A]">{{ $item->gsb }} meter</span>
                </p>
            </div>
        @endforeach
    </div>

    <!-- Empty state -->
    <div id="gsbEmptyState" class="hidden text-center py-6">
        <div class="text-4xl text-[#D0D8E3] mb-2">
            <i class="fas fa-folder-open"></i>
        </div>
        <p class="text-sm text-[#6B7A93]">Data tidak ditemukan</p>
    </div>
</div>

<script>
    function filterGSB() {
        const searchValue = document.getElementById("searchInput").value.toLowerCase();
        const cards = document.querySelectorAll("#gsbResultList .data-card");
        const resultList = document.getElementById("gsbResultList");
        const emptyState = document.getElementById("gsbEmptyState");
        let found = false;

        cards.forEach(card => {
            const ruas = card.querySelector("p:nth-child(1)").textContent.toLowerCase();
            if (ruas.includes(searchValue)) {
                card.style.display = 'block';
                found = true;
            } else {
                card.style.display = 'none';
            }
        });

        if (searchValue === '') {
            resultList.classList.add('hidden');
            emptyState.classList.add('hidden');
        } else if (found) {
            resultList.classList.remove('hidden');
            emptyState.classList.add('hidden');
        } else {
            resultList.classList.add('hidden');
            emptyState.classList.remove('hidden');
        }
    }
</script>



            <!-- Card 1 -->


      </form>

      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
