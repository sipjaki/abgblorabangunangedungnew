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
@include('backend.00_administrator.00_baganterpisah.09_button')


  <style>
    body {
      font-family: 'Poppins', sans-serif;
    }
  </style>

<section id="breadcrumb" class="container max-w-[1130px] mx-auto" style="margin-top: 160px;" >
    {{-- <div class="flex items-center gap-[20px]">
        <!-- Gambar di kiri -->
        <img src="/assets/abgblora/logo/iconabgblora.png" alt="Logo" class="w-[60px] -my-[15px]" width="10%" style="margin-right: 20px; margin-bottom:10px;" >

        <!-- Breadcrumb di kanan -->
        <div class="flex gap-[30px] items-center flex-wrap">
            <span>/</span>
            <a href="/" class="last-of-type:font-bold transition-all duration-300 text-blue-600" style="color: blue;">
                {{$title}}
            </a>
            <span>/</span>
            <a href="/statistikbg" class="last-of-type:font-bold transition-all duration-300 text-blue-600" style="color: black;">
                Data Statistik
            </a>
        </div>
    </div> --}}

    <!-- Search Bar Section -->
    <div class="flex justify-end w-full sm:w-auto mb-2">
        <div class="flex items-center gap-1.5 px-3 py-1 bg-white rounded-xl border border-gray-300 w-full sm:w-[260px] focus-within:ring-2 focus-within:ring-[#6635F1] transition-all duration-300">
            <input
                type="text"
                id="searchInput"
                placeholder="Cari data..."
                oninput="searchTable()"
                class="w-full appearance-none outline-none text-sm font-medium placeholder:font-normal placeholder:text-[#545768] bg-transparent"
            />
            <button onclick="searchTable()" class="flex items-center justify-center w-7 h-7 shrink-0 ml-2">
                <img src="/assets/new/icons/search.svg" alt="icon" class="w-4 h-4" />
            </button>
        </div>
    </div>
</section>

{{--

  <section id="header" class="container max-w-[1130px] mx-auto flex flex-col sm:flex-row items-center justify-between gap-2" style="margin-top:10px;">
    <div class="flex">
        <img src="/assets/abgblora/logo/iconabgblora.png" alt="" width="25%" style="margin-top: -15px;">
    </div>

      <div class="flex justify-end w-full sm:w-auto mb-2">
        <div class="flex items-center gap-1.5 px-3 py-1 bg-white rounded-xl border border-gray-300 w-full sm:w-[260px] focus-within:ring-2 focus-within:ring-[#6635F1] transition-all duration-300">
            <input
                type="text"
                id="searchInput"
                placeholder="Cari data..."
                oninput="searchTable()"
                class="w-full appearance-none outline-none text-sm font-medium placeholder:font-normal placeholder:text-[#545768] bg-transparent"
            />
            <button onclick="searchTable()" class="flex items-center justify-center w-7 h-7 shrink-0 ml-2">
                <img src="/assets/new/icons/search.svg" alt="icon" class="w-4 h-4" />
            </button>
        </div>
    </div>

  </section>
 --}}
<section id="details" class="container max-w-[1130px] mx-auto flex flex-col sm:flex-row sm:flex-nowrap gap-5 mt-2.5">
    <div class="bg-white flex flex-col gap-5 p-5 rounded-[20px] shadow-md w-full">
        <!-- Table Header -->
        <div class="flex items-center gap-3 -mt-2">
            <button class="p-3.5 bg-white rounded-full font-semibold text-sm">
                📦 {{$title}}
            </button>
        </div>

        <!-- Table Container -->
        <div class="w-full overflow-auto rounded-[15px] mt-4 border border-gray-200">
            <table class="min-w-[1000px] w-full text-sm text-left text-gray-700">
                <thead class="bg-gray-100 text-gray-700 uppercase text-xs sticky top-0">
                    <tr>
                        <th class="px-4 py-3 text-center w-12">No</th>
                        <th class="px-4 py-3 min-w-[120px]">Tanggal Input</th>
                        <th class="px-4 py-3 min-w-[120px]">Nama User</th>
                        <th class="px-4 py-3 min-w-[100px]">Kecamatan</th>
                        <th class="px-4 py-3 min-w-[150px]">Institusi Kepemilikan</th>
                        <th class="px-4 py-3 min-w-[150px]">No Pengesahan Usaha</th>
                        <th class="px-4 py-3 min-w-[180px]">Alamat</th>
                        <th class="px-4 py-3 min-w-[120px]">No Telepon</th>
                        <th class="px-4 py-3 min-w-[150px]">Email</th>
                        <th class="px-4 py-3 min-w-[150px]">Koordinat</th>
                        <th class="px-4 py-3 text-center w-20">View</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($data as $item)
                    <tr class="hover:bg-gray-50">
                        <!-- No Urut -->
                        <td class="px-4 py-3 text-center">
                            {{ $data->firstItem() + $loop->iteration - 1 }}
                        </td>

                        <!-- Tanggal Input -->
                        <td class="px-4 py-3 whitespace-nowrap">{{ $item->tanggalinput ?? '-' }}</td>

                        <!-- Nama User -->
                        <td class="px-4 py-3 whitespace-nowrap">{{ $item->user->name ?? '-' }}</td>

                        <!-- Kecamatan -->
                        <td class="px-4 py-3 whitespace-nowrap">{{ $item->kecamatanblora->nama_kecamatan ?? '-' }}</td>

                        <!-- Institusi Kepemilikan -->
                        <td class="px-4 py-3 uppercase whitespace-nowrap">
                            {{ $item->namainstitusi ?? 'Data Tidak Ditemukan' }}
                        </td>

                        <!-- Nomor Pengesahan Usaha -->
                        <td class="px-4 py-3 whitespace-nowrap">{{ $item->nopengesahanusaha ?? '-' }}</td>

                        <!-- Alamat -->
                        <td class="px-4 py-3">{{ $item->alamat ?? '-' }}</td>

                        <!-- No Telepon -->
                        <td class="px-4 py-3 whitespace-nowrap">{{ $item->notelepon ?? '-' }}</td>

                        <!-- Email -->
                        <td class="px-4 py-3 whitespace-nowrap">{{ $item->email ?? '-' }}</td>

                        <!-- Koordinat -->
                        <td class="px-4 py-3 text-center whitespace-nowrap">
                            @if(!empty($item->koordinat))
                                {{ $item->koordinat }}
                            @else
                                <span class="inline-block px-2 py-1 rounded-md font-semibold bg-navy text-white hover:bg-white hover:text-navy border border-navy transition-all duration-150 text-xs">
                                    Data Belum Diupdate
                                </span>
                            @endif
                        </td>

                        <!-- Aksi (View) -->
                        <td class="px-4 py-3 text-center whitespace-nowrap">
                            <a href="/databangunangedung/{{ $item->id }}" class="text-blue-600 hover:text-blue-900" title="View Details">
                                <i class="bi bi-eye"></i> View
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('frontend.abgblora.00_fiturmenu.06_paginations')
    </div>
</section>

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
