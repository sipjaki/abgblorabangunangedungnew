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
                  <img src="/assets/android/menunavigasi/05.png" class="object-cover w-full h-full" alt="photo">
                </div>
              </div>
              <div class="flex flex-col flex-1 gap-[2px] text-left">
                <p class="font-semibold">{{$title}}</p>
                {{-- <p class="font-medium text-xs leading-[18px] text-[#757C98]">Contact Details</p> --}}
              </div>
            </button>
          </div>

                            <!-- Table Section -->
                            <div class="flex flex-col gap-4 px-4" style="margin-top: -25px;">
                                <br><br>
<div class="flex flex-col gap-4 px-4 mt-4">
    @foreach ($data as $index => $item)
    <div class="w-full border border-[#E8E9EE] flex items-start p-4 gap-4 rounded-2xl bg-white shadow-sm">

        <!-- Gambar -->
        <div class="w-20 h-[75px] rounded-xl overflow-hidden flex-shrink-0">
            @if($item->foto && file_exists(public_path('storage/' . $item->foto)))
                <img src="{{ asset('storage/' . $item->foto) }}" alt="Sosialisasi" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
            @elseif($item->foto)
                <img src="{{ asset($item->foto) }}" alt="Sosialisasi" style="width: 100%; height: 100%; object-fit: cover;" loading="lazy">
            @else
                <div class="flex items-center justify-center w-full h-full bg-gray-100 text-gray-400 text-sm">No Image</div>
            @endif
        </div>

        <!-- Info -->
        <div class="flex flex-col gap-2 w-full">
            <p class="font-bold text-sm text-[#28A745]">{{ $item->namakegiatan }}</p>

            @php
                $text = $item->keterangan;
                $limit = 100;
                $truncatedText = strlen($text) > $limit ? substr($text, 0, $limit) . '...' : $text;
            @endphp

            <p class="text-sm text-gray-700" id="shortText-{{ $index }}">{{ $truncatedText }}</p>
            <p class="text-sm text-gray-600 hidden" id="fullText-{{ $index }}">{{ $item->keterangan }}</p>

            @if(strlen($text) > $limit)
            <button onclick="toggleText({{ $index }})" class="text-xs text-blue-600 w-fit" id="toggleBtn-{{ $index }}">Selengkapnya</button>
            @endif

            <!-- Tombol Aksi -->
            @php
                $eventDate = \Carbon\Carbon::parse($item->penutupan);
                $today = \Carbon\Carbon::now();
                $isClosed = $today->greaterThanOrEqualTo($eventDate);
            @endphp

            @if ($isClosed)
                <button class="bg-red-500 text-white text-sm font-semibold px-4 py-2 rounded-md opacity-60 cursor-not-allowed w-full flex items-center justify-center gap-2" disabled>
                    <i class="fas fa-times-circle"></i> Ditutup
                </button>
            @else
                <a href="/resagendapelatihan/{{ $item->namakegiatan }}" class="block w-full">
                    <button class="bg-[#006b1b] text-white text-sm font-semibold px-4 py-2 rounded-md w-full flex items-center justify-center gap-2 hover:bg-white hover:text-[#006b1b] border border-[#006b1b] transition-all duration-200">
                        <i class="fas fa-user-check"></i> Daftar
                    </button>
                </a>
            @endif
        </div>
    </div>
    @endforeach

    <!-- Pagination -->
    <div class="mt-4">
        {{ $data->links() }}
    </div>
</div>

<!-- Script toggle per item -->
<script>
    function toggleText(index) {
        const shortText = document.getElementById('shortText-' + index);
        const fullText = document.getElementById('fullText-' + index);
        const btn = document.getElementById('toggleBtn-' + index);

        if (fullText.classList.contains('hidden')) {
            fullText.classList.remove('hidden');
            shortText.classList.add('hidden');
            btn.innerText = 'Tutup';
        } else {
            fullText.classList.add('hidden');
            shortText.classList.remove('hidden');
            btn.innerText = 'Selengkapnya';
        }
    }
</script>
                                </div>

                                <br>

                            <p style="color: black; font-weight:bold;">Keterangan : {{$title}} DPUPR Kab Blora Tahun 2025</p>
                            <div class="pagination-info-box" style="margin: 20px 0; padding: 10px; border: 1px solid black; background-color: #f9f9f9; border-radius: 5px; width: 100%; text-align: center;">
                                <div class="pagination-info" style="color: black; font-weight: 500; font-size: 14px; display: inline-block;">
                                    Data Ke {{ $data->firstItem() }} Sampai {{ $data->lastItem() }} Dari {{ $data->total() }} Jumlah {{$title}}
                                </div>
                            </div>
                            <!-- Pagination Section -->
                            <div class="pagination-container" style="display: flex; flex-direction: column; align-items: center;">
                                <ul class="pagination-paginate" style="display: flex; padding-left: 0; list-style: none; margin-top: 10px;">
                                    <li class="page-item {{ $data->onFirstPage() ? 'disabled' : '' }}" style="margin-right: 5px;">
                                        <a class="page-link" href="{{ $data->previousPageUrl() }}" style="padding: 10px 20px; border: 1px solid #ccc; border-radius: 5px; text-decoration: none; color: black; font-size: 14px;">
                                            <i class="fas fa-arrow-left" style="margin-right: 10px;"></i>Previous
                                        </a>
                                    </li>
                                    <li class="page-item {{ $data->hasMorePages() ? '' : 'disabled' }}" style="margin-right: 5px;">
                                        <a class="page-link" href="{{ $data->nextPageUrl() }}" style="padding: 10px 20px; border: 1px solid #ccc; border-radius: 5px; text-decoration: none; color: black; font-size: 14px;">
                                            Next <i class="fas fa-arrow-right" style="margin-left: 10px;"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>


                        </div>

        </div>



            <!-- Card 1 -->


      </form>

      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
