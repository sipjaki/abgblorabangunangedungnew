@include('frontend.android.00_fiturmenu.01_header')

@include('frontend.android.00_fiturmenu.06_alert')

<body class="font-poppins text-[#070625]">
  <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[120px] relative">
@include('frontend.abgblora.00_fiturmenu.07_coverdepan')

      <form  id="Details" class="group result-card-container flex flex-col gap-6">
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

                            <!-- Table Section -->
                            <div class="flex flex-col gap-4 px-4" style="margin-top: -25px;">
                                <br><br>

<div class="flex flex-col gap-4 px-4 mt-4">
    @foreach ($data as $item)
    <div class="w-full border border-[#E8E9EE] flex items-center p-[14px] gap-3 rounded-2xl bg-white">

        <!-- Gambar -->
        <div class="w-20 h-[90px] flex-shrink-0 rounded-2xl overflow-hidden" style="margin-right: 16px;">
            <div style="margin-top: 10px;">
                @if($item->foto && file_exists(public_path('storage/' . $item->foto)))
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="Sosialisasi" style="width: 100%; max-height: 75px; object-fit: contain;" loading="lazy">
                @elseif($item->foto)
                    <img src="{{ asset($item->foto) }}" alt="Gambar Peraturan" style="width: 100%; max-height: 75px; object-fit: contain;" loading="lazy">
                @else
                    <p>Data belum diupdate</p>
                @endif
            </div>
        </div>

        <!-- Info -->
        <div class="flex flex-col gap-1 w-full">
            <p class="font-bold line-clamp-1 hover:line-clamp-none" style="color: #28A745;">{{$item->namakegiatan}}</p>

            @php
                $text = $item->keterangan;
                $limit = 100;
                $truncatedText = strlen($text) > $limit ? substr($text, 0, $limit) . '...' : $text;
            @endphp

            <span class="text-[#000000] text-sm">{{ $truncatedText }}</span>

            <p class="text-xs text-blue-500 cursor-pointer line-clamp-1 hover:line-clamp-none" id="moreText" style="display: none;">
                <span class="text-[#000000]">{{ $item->keterangan }}</span>
            </p>

            <button class="text-xs mt-1" onclick="toggleText()" style="color: navy;">Selengkapnya</button>

            <script>
                function toggleText() {
                    var moreText = document.getElementById("moreText");
                    var button = document.querySelector("button");

                    if (moreText.style.display === "none") {
                        moreText.style.display = "inline";
                        button.innerHTML = "Tutup";
                    } else {
                        moreText.style.display = "none";
                        button.innerHTML = "Selengkapnya";
                    }
                }
            </script>

            @php
                $eventDate = \Carbon\Carbon::parse($item->penutupan);
                $today = \Carbon\Carbon::now();
                $isClosed = $today->greaterThanOrEqualTo($eventDate);
            @endphp
<div class="mt-2 w-full">
    @if ($isClosed)
        <button style="
            background-color: #FF0000;
            color: white;
            border: 2px solid #FF0000;
            padding: 8px 12px;
            font-size: 14px;
            font-weight: bold;
            border-radius: 6px;
            cursor: not-allowed;
            opacity: 0.6;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 6px;
            width: 100%;
        " disabled>
            <i class="fas fa-times-circle"></i> Ditutup
        </button>
    @else
        <a href="{{ route('respesertashow', $item->id) }}" style="text-decoration: none;">
            <div style="
                background-color: #006b1b;
                color: white;
                border: 2px solid #006b1b;
                padding: 8px 12px;
                font-size: 14px;
                font-weight: bold;
                border-radius: 6px;
                opacity: 0.9;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 6px;
                width: 100%;
                transition: 0.2s;
            "
            onmouseover="this.style.backgroundColor='white'; this.style.color='#006b1b';"
            onmouseout="this.style.backgroundColor='#006b1b'; this.style.color='white';">
                <i class="fas fa-user-check"></i> LIhat Peserta
            </div>
        </a>
    @endif
</div>

        </div>
    </div>
    @endforeach

    <!-- Pagination -->
    {{-- <div class="mt-4">
        {{ $data->links() }}
    </div> --}}
</div>
                                </div>

                                <br>

                 @include('backend.00_administrator.00_baganterpisah.07_paginations')
<br>

                            </div>

        </div>



            <!-- Card 1 -->


      </form>
      <br><br>

      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
