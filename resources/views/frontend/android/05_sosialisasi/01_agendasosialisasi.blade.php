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
                            <div class="flex flex-col gap-4 px-4 mt-4">
    @foreach ($data as $item)
    <div class="modern-card w-full border border-[#E1E8F2] flex items-center p-4 gap-4 rounded-2xl bg-white hover:shadow-lg transition-all duration-300">
        <!-- Image Container -->
        <div class="flex-shrink-0 w-20 h-20 rounded-xl overflow-hidden bg-gradient-to-br from-blue-50 to-blue-100 p-2 border border-blue-100">
            <div class="w-full h-full flex items-center justify-center">
                @if($item->foto && file_exists(public_path('storage/' . $item->foto)))
                    <img src="{{ asset('storage/' . $item->foto) }}" alt="Sosialisasi"
                         class="w-full h-full object-contain rounded-lg" loading="lazy">
                @elseif($item->foto)
                    <img src="{{ asset($item->foto) }}" alt="Gambar Peraturan"
                         class="w-full h-full object-contain rounded-lg" loading="lazy">
                @else
                    <div class="w-full h-full flex items-center justify-center bg-blue-50 rounded-lg">
                        <i class="fas fa-calendar-alt text-blue-300 text-2xl"></i>
                    </div>
                @endif
            </div>
        </div>

        <!-- Content Container -->
        <div class="flex flex-col flex-1 gap-2">
            <!-- Title -->
            <p class="font-bold text-lg line-clamp-1 hover:line-clamp-none transition-all"
               style="color: #2196F3; border-bottom: 2px solid #E3F2FD; padding-bottom: 4px;">
                {{$item->namakegiatan}}
            </p>

            <!-- Description -->
            @php
                $text = $item->keterangan;
                $limit = 100;
                $truncatedText = strlen($text) > $limit ? substr($text, 0, $limit) . '...' : $text;
                $hasMore = strlen($text) > $limit;
            @endphp

            <div class="description-container">
                <span class="text-gray-700 text-sm leading-relaxed">
                    {{ $truncatedText }}
                </span>

                @if($hasMore)
                <span class="full-text hidden text-gray-700 text-sm leading-relaxed">
                    {{ $item->keterangan }}
                </span>

                <button class="toggle-btn text-xs font-medium mt-1 px-3 py-1 rounded-full
                              bg-blue-50 text-blue-600 hover:bg-blue-100 transition-colors
                              border border-blue-200 flex items-center gap-1 w-fit"
                        onclick="toggleText(this)">
                    <i class="fas fa-chevron-down text-xs"></i>
                    <span class="btn-text">Selengkapnya</span>
                </button>
                @endif
            </div>

            <!-- Status & Button -->
            @php
                $eventDate = \Carbon\Carbon::parse($item->penutupan);
                $today = \Carbon\Carbon::now();
                $isClosed = $today->greaterThanOrEqualTo($eventDate);
                $daysLeft = $today->diffInDays($eventDate, false);
            @endphp

            <div class="mt-3 w-full">
                @if ($isClosed)
                    <div class="closed-btn w-full bg-gradient-to-r from-red-50 to-red-100 border-2
                               border-red-200 text-red-700 px-4 py-3 rounded-xl font-semibold
                               flex items-center justify-center gap-2 cursor-not-allowed">
                        <i class="fas fa-times-circle text-red-500"></i>
                        <span>Ditutup</span>
                        <span class="text-xs font-normal opacity-75 ml-auto">
                            {{ $eventDate->format('d M Y') }}
                        </span>
                    </div>
                @else
                    <a href="{{ route('ressosialisasishow', $item->id) }}" class="block no-underline">
                        <div class="register-btn w-full bg-gradient-to-r from-blue-500 to-blue-600
                                   border-2 border-blue-500 text-white px-4 py-3 rounded-xl
                                   font-semibold flex items-center justify-center gap-2
                                   transition-all duration-300 hover:shadow-lg hover:shadow-blue-100
                                   hover:translate-y-[-2px] active:translate-y-0">
                            <i class="fas fa-user-check"></i>
                            <span>Daftar Sekarang</span>
                            @if($daysLeft >= 0 && $daysLeft <= 7)
                                <span class="text-xs font-normal bg-white/20 px-2 py-1 rounded-full ml-auto">
                                    {{ $daysLeft }} hari lagi
                                </span>
                            @endif
                        </div>
                    </a>
                @endif
            </div>

        </div>
    </div>
    @endforeach
</div>

<style>
    .modern-card {
        background: linear-gradient(135deg, #ffffff 0%, #f8fbff 100%);
        border-left: 4px solid #2196F3;
        box-shadow: 0 2px 12px rgba(33, 150, 243, 0.05);
        transition: all 0.3s ease;
    }

    .modern-card:hover {
        border-left-color: #1976D2;
        box-shadow: 0 6px 20px rgba(33, 150, 243, 0.12);
        transform: translateY(-2px);
    }

    .register-btn:hover {
        background: linear-gradient(to right, #1976D2, #2196F3) !important;
        color: white !important;
        border-color: #1976D2 !important;
    }

    .toggle-btn.active {
        background: #1976D2 !important;
        color: white !important;
        border-color: #1976D2 !important;
    }

    .toggle-btn.active .fa-chevron-down {
        transform: rotate(180deg);
        transition: transform 0.3s ease;
    }
</style>

<script>
function toggleText(button) {
    const container = button.closest('.description-container');
    const fullText = container.querySelector('.full-text');
    const shortText = container.querySelector('.text-gray-700:not(.full-text)');
    const btnText = container.querySelector('.btn-text');
    const icon = container.querySelector('.fa-chevron-down');

    if (fullText.classList.contains('hidden')) {
        fullText.classList.remove('hidden');
        shortText.classList.add('hidden');
        btnText.textContent = 'Tutup';
        button.classList.add('active');
        icon.style.transform = 'rotate(180deg)';
    } else {
        fullText.classList.add('hidden');
        shortText.classList.remove('hidden');
        btnText.textContent = 'Selengkapnya';
        button.classList.remove('active');
        icon.style.transform = 'rotate(0deg)';
    }
}

// Add smooth scrolling for card hover effects
document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.modern-card');

    cards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>

                 @include('backend.00_administrator.00_baganterpisah.07_paginations')
                 <br><br>
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
