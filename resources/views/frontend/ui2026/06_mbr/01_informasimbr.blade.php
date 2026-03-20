@include('frontend.ui2026.00_fiturmenu.01_header')

<body>
    <!-- Header -->

    @include('frontend.ui2026.00_fiturmenu.03_headermenu')

    <main>
          <style>
        .services-section .container > div:last-child {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
        }

        @media (max-width: 768px) {
            .services-section .container > div:last-child {
                grid-template-columns: repeat(1, 1fr);
                gap: 8px;
            }
        }

        @media (min-width: 769px) and (max-width: 1024px) {
            .services-section .container > div:last-child {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }
        }

        @media (min-width: 1025px) {
            .services-section .container > div:last-child {
                grid-template-columns: repeat(2, 1fr);
                gap: 12px;
            }
        }
    </style>

<section class="section services-section" id="services">
    <div class="bg-illustration bg-illustration--skyline">
        <img src="assets/2026/assets/illustrations/skyline.png" alt="" aria-hidden="true">
    </div>
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Informasi MBR</h2>
        </div>
        <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px;">
            @foreach($data as $index => $item)
                @foreach(['berkas1','berkas2','berkas3','berkas4'] as $berkas)
                    @if($item->$berkas)
                    <a href="{{ $item->$berkas }}"
                       download
                       style="display: block; border-radius: 8px; overflow: hidden;">
                        <img src="{{ $item->$berkas }}"
                             alt=""
                             style="width: 100%; height: auto; max-width: 100%; display: block; border-radius: 8px;">
                    </a>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>


</section>

    </main>

@include('frontend.ui2026.00_fiturmenu.02_footer')
