@include('frontend.ui2026.00_fiturmenu.01_header')

<body>
    <!-- Header -->

    @include('frontend.ui2026.00_fiturmenu.03_headermenu')

    <main>

<section class="section services-section" id="services">
    <div class="bg-illustration bg-illustration--skyline">
        <img src="assets/2026/assets/illustrations/skyline.png" alt="" aria-hidden="true">
    </div>
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Layanan Utama</h2>
        </div>
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px;">
            @foreach($data as $index => $item)
                @foreach(['berkas1','berkas2','berkas3','berkas4'] as $berkas)
                    @if($item->$berkas)
                    <a href="{{ $item->$berkas }}"
                       download
                       style="border-radius: 8px; overflow: hidden; display: block; cursor: pointer;">
                        <img src="{{ $item->$berkas }}"
                             alt=""
                             style="width: 100%; height: auto; display: block; border-radius: 8px;">
                    </a>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</section>

    </main>

@include('frontend.ui2026.00_fiturmenu.02_footer')
