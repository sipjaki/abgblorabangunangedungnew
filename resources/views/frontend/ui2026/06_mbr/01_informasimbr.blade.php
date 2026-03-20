@include('frontend.ui2026.00_fiturmenu.01_header')

<body>
    <!-- Header -->

    @include('frontend.ui2026.00_fiturmenu.03_headermenu')

    <main>
        <!-- Main Service Icons Section - FIRST SECTION (NO HERO BANNER) -->
        <section class="section services-section" id="services">
    <div class="bg-illustration bg-illustration--skyline">
        <img src="assets/2026/assets/illustrations/skyline.png" alt="" aria-hidden="true">
    </div>
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Informasi MBR </h2>
        </div>
        <div class="services-grid">
            @foreach($data->item as $index => $item)
                @foreach(['berkas1','berkas2','berkas3','berkas4'] as $delay => $berkas)
                    @if($item->$berkas)
                    <div class="service-card" data-animate="fade-up" data-delay="{{ ($index * 4 + $delay) * 50 }}">
                        <div class="service-icon">
                            <img src="{{ $item->$berkas }}"
                                 alt="{{ $item->judul1 }}"
                                 style="width: 48px; height: 48px; object-fit: contain;">
                        </div>
                        <h3 class="service-title">
                            {{ $berkas === 'berkas1' || $berkas === 'berkas2' ? $item->judul1 : $item->judul2 }}
                        </h3>
                    </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</section>


    </main>

@include('frontend.ui2026.00_fiturmenu.02_footer')
