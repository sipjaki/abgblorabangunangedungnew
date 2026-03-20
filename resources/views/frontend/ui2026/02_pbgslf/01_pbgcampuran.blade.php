@include('frontend.ui2026.00_fiturmenu.01_header')

<body>
    <!-- Header -->

    @include('frontend.ui2026.00_fiturmenu.03_headermenu')

    <main>
<section class="section infopbg-section" id="services">
    <div class="bg-illustration bg-illustration--skyline">
        <img src="assets/2026/assets/illustrations/skyline.png" alt="" aria-hidden="true">
    </div>
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Layanan Utama</h2>
        </div>

        <div class="infopbg-grid">
            @foreach($data as $item)
            <div class="infopbg-card">

                {{-- Gambar --}}
                @if($item->berkas)
                <a href="{{ $item->berkas }}" download class="infopbg-img-wrap">
                    <img src="{{ $item->berkas }}" alt="{{ $item->judul }}" class="infopbg-img">
                </a>
                @endif

                {{-- Konten Teks --}}
                <div class="infopbg-body">
                    @if($item->judul)
                    <h3 class="infopbg-judul">{{ $item->judul }}</h3>
                    @endif

                    @if($item->keterangan)
                    <p class="infopbg-keterangan">{{ $item->keterangan }}</p>
                    @endif

                    @if($item->infolanjut)
                    <div class="infopbg-infolanjut">{{ $item->infolanjut }}</div>
                    @endif

                    {{-- Cadangan --}}
                    @php
                        $cadangans = array_filter([
                            $item->cadangan1, $item->cadangan2, $item->cadangan3,
                            $item->cadangan4, $item->cadangan5, $item->cadangan6,
                            $item->cadangan7, $item->cadangan8, $item->cadangan9,
                            $item->cadangan10, $item->cadangan11, $item->cadangan12,
                        ]);
                    @endphp

                    @if(count($cadangans) > 0)
                    <ul class="infopbg-cadangan-list">
                        @foreach($cadangans as $cadangan)
                        <li class="infopbg-cadangan-item">{{ $cadangan }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>

            </div>
            @endforeach
        </div>
    </div>


</section>


    </main>

@include('frontend.ui2026.00_fiturmenu.02_footer')
