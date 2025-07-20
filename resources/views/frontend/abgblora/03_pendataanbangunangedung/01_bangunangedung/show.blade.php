<style>
    table.zebra-table {
        border-collapse: collapse;
        width: 100%;
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        border-radius: 15px;
        overflow: hidden;
    }

    .zebra-table thead {
        background-color: #2E82FE;
        color: white;
    }

    .zebra-table th,
    .zebra-table td {
        padding: 6px 12px;
        text-align: left;
    }

    .zebra-table tbody tr:nth-child(odd) {
        background-color: #ffffff;
    }

    .zebra-table tbody tr:nth-child(even) {
        background-color: #dfdddd;
    }

    .zebra-table tbody tr:hover {
        background-color: #0fb825;
    }
</style>

@include('frontend.abgblora.00_fiturmenu.02_header')
@include('frontend.abgblora.00_fiturmenu.05_menunavigasweb')


<section
style="margin-top:250px;"
 id="header" class="container max-w-[1130px] mx-auto flex flex-col sm:flex-row items-center justify-between gap-2" style="margin-top:10px;">
    <div class="flex items-center gap-3">
      <button class="p-[14px_20px] bg-white rounded-full font-semibold">
        📦 {{$title}}
      </button>
    </div>

  </section>


  <section id="other" class="container max-w-[1130px] mx-auto flex flex-col gap-4" style="margin-top: 20px;">
<!-- WRAPPER GRID -->

<!-- MODAL -->
<!-- MODAL -->

<div id="imageModal" class="fixed inset-0 z-50 bg-black bg-opacity-80 hidden items-center justify-center">
    <div class="relative max-w-[90%] max-h-[90%]" style="border-radius: 20px; overflow: hidden;">
      <button onclick="closeModal()" class="absolute -top-4 -right-4 bg-white text-black rounded-full w-8 h-8 flex items-center justify-center text-xl font-bold shadow-lg">&times;</button>
      <img id="modalImage" src="" class="w-full h-full object-contain" style="border-radius: 20px;">
    </div>
  </div>

  <!-- SCRIPT -->
  <script>
    function openModal(src) {
      document.getElementById('modalImage').src = src;
      document.getElementById('imageModal').classList.remove('hidden');
      document.getElementById('imageModal').classList.add('flex');
    }

    function closeModal() {
      document.getElementById('imageModal').classList.remove('flex');
      document.getElementById('imageModal').classList.add('hidden');
    }
  </script>

  </section>



  <section id="details" class="container max-w-[1130px] mx-auto flex flex-col sm:flex-row gap-5">
    <div class="flex flex-col gap-5 w-full">
        <div class="bg-white flex flex-col gap-5 p-5 rounded-[20px] w-full">
            <div class="flex justify-center">
                <img src="/assets/abgblora/logo/iconabgblora.png" alt="" width="15%" style="margin-top: -25px; margin-bottom:-25px;">
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-4 gap-3">
                <!-- CARD 1 -->
                <a href="#" class="card" style="border-radius: 20px;">
                  <div class="p-4 rounded-[20px] bg-white flex flex-col gap-4 hover:ring-2 hover:ring-[#6635F1] transition-all duration-300">
                    <div class="w-full h-[140px] rounded-[20px] overflow-hidden relative">
                      <img onclick="openModal(this.src)" src="/assets/android/iconmenu/bangunan1.jpg" class="w-full h-full object-cover cursor-pointer" alt="thumbnail">
                    </div>
                    <div class="flex flex-col">
                      <p class="title font-semibold text-sm line-clamp-2 hover:line-clamp-none">
                        Tampak Depan
                      </p>
                    </div>
                  </div>
                </a>

                <!-- CARD 2 -->
                <a href="#" class="card" style="border-radius: 20px;">
                  <div class="p-4 rounded-[20px] bg-white flex flex-col gap-4 hover:ring-2 hover:ring-[#6635F1] transition-all duration-300">
                    <div class="w-full h-[140px] rounded-[20px] overflow-hidden relative">
                      <img onclick="openModal(this.src)" src="/assets/android/iconmenu/bangunan1.jpg" class="w-full h-full object-cover cursor-pointer" alt="thumbnail">
                    </div>
                    <div class="flex flex-col">
                      <p class="title font-semibold text-sm line-clamp-2 hover:line-clamp-none">
                        Tampak Samping 1
                      </p>
                    </div>
                  </div>
                </a>

                <!-- CARD 3 -->
                <a href="#" class="card" style="border-radius: 20px;">
                  <div class="p-4 rounded-[20px] bg-white flex flex-col gap-4 hover:ring-2 hover:ring-[#6635F1] transition-all duration-300">
                    <div class="w-full h-[140px] rounded-[20px] overflow-hidden relative">
                      <img onclick="openModal(this.src)" src="/assets/android/iconmenu/bangunan1.jpg" class="w-full h-full object-cover cursor-pointer" alt="thumbnail">
                    </div>
                    <div class="flex flex-col">
                      <p class="title font-semibold text-sm line-clamp-2 hover:line-clamp-none">
                        Tampak Samping 2
                      </p>
                    </div>
                  </div>
                </a>

                <!-- CARD 4 -->
                <a href="#" class="card" style="border-radius: 20px;">
                  <div class="p-4 rounded-[20px] bg-white flex flex-col gap-4 hover:ring-2 hover:ring-[#6635F1] transition-all duration-300">
                      <div class="w-full h-[140px] rounded-[20px] overflow-hidden relative">
                          <img onclick="openModal(this.src)" src="/assets/android/iconmenu/bangunan1.jpg" class="w-full h-full object-cover cursor-pointer" alt="thumbnail">
                        </div>
                        <div class="flex flex-col">
                            <p class="title font-semibold text-sm line-clamp-2 hover:line-clamp-none">
                                Tampak Belakang
                            </p>
                        </div>
                    </div>
                </a>
            </div>

            <div class="w-full bg-[#030303] flex items-center gap-[10px] p-[10px_14px] rounded-xl">
                <div class="w-5 h-5 flex shrink-0">
                    <img src="/assets/new/icons/story.svg" alt="icon">
                </div>
                <p class="text-white font-normal text-sm">
                    <span class="font-bold">Informasi Bangunan Gedung </span>
                </p>
            </div>






        </div>
    </div>
</section>


  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


  @include('frontend.abgblora.00_fiturmenu.03_footer')
  <!-- back to top start -->
  <div class="progress-wrap">
      <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
          <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
      </svg>
  </div>
  <!-- back to top end -->

</div>

@include('frontend.abgblora.00_fiturmenu.04_footer')

<script>
    function toggleDropdown(event) {
      event.preventDefault();
      const dropdown = event.target.closest('.dropdown');
      dropdown.classList.toggle('show');
    }

    // Optional: Tutup dropdown jika klik di luar
    window.addEventListener('click', function(e) {
      document.querySelectorAll('.dropdown').forEach(drop => {
        if (!drop.contains(e.target)) {
          drop.classList.remove('show');
        }
      });
    });


    function updateEntries() {
      let selectedValue = document.getElementById("entries").value;
      let url = new URL(window.location.href);
      url.searchParams.set("perPage", selectedValue);
      window.location.href = url.toString();
    }

    function searchTable() {
      let input = document.getElementById("searchInput").value;

      fetch(`/databangunangedung?search=${input}`)
        .then(response => response.text())
        .then(html => {
          let parser = new DOMParser();
          let doc = parser.parseFromString(html, "text/html");
          let newTableBody = doc.querySelector("#tableBody").innerHTML;
          document.querySelector("#tableBody").innerHTML = newTableBody;
        })
        .catch(error => console.error("Error fetching search results:", error));
    }
  </script>
