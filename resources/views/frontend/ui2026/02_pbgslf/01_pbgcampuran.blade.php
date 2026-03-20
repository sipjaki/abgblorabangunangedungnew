@include('frontend.ui2026.00_fiturmenu.01_header')

<body>
    <!-- Header -->

    @include('frontend.ui2026.00_fiturmenu.03_headermenu')

    <main>
<section class="section infopbg-section" id="services">
    <div class="bg-illustration bg-illustration--skyline">
        <img src="assets/2026/assets/illustrations/skyline.png" alt="" aria-hidden="true">
    </div>
    <div class="infopbg-container">
        <div class="infopbg-header">
            <h2 class="infopbg-title">Layanan Utama</h2>
            <div class="infopbg-title-line"></div>
        </div>

        <div class="infopbg-grid">
            @foreach($data as $item)
            <div class="infopbg-card">
                @if($item->berkas)
                <a href="{{ $item->berkas }}" download class="infopbg-img-wrap">
                    <img src="{{ $item->berkas }}" alt="{{ $item->judul }}" class="infopbg-img">
                    <div class="infopbg-img-overlay">
                        <span class="infopbg-download-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                <polyline points="7 10 12 15 17 10"/>
                                <line x1="12" y1="15" x2="12" y2="3"/>
                            </svg>
                            Unduh
                        </span>
                    </div>
                </a>
                @endif

                <div class="infopbg-body">
                    @if($item->judul)
                    <h3 class="infopbg-judul">{{ $item->judul }}</h3>
                    @endif

                    @if($item->keterangan)
                    <p class="infopbg-keterangan">{!! nl2br(e($item->keterangan)) !!}</p>
                    @endif

                    @if($item->infolanjut)
                    <div class="infopbg-infolanjut">
                        <span class="infopbg-infolanjut-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10"/>
                                <line x1="12" y1="8" x2="12" y2="12"/>
                                <line x1="12" y1="16" x2="12.01" y2="16"/>
                            </svg>
                        </span>
                        {!! nl2br(e($item->infolanjut)) !!}
                    </div>
                    @endif

                    @php
                        $cadangans = array_filter([
                            $item->cadangan1,  $item->cadangan2,  $item->cadangan3,
                            $item->cadangan4,  $item->cadangan5,  $item->cadangan6,
                            $item->cadangan7,  $item->cadangan8,  $item->cadangan9,
                            $item->cadangan10, $item->cadangan11, $item->cadangan12,
                        ]);
                    @endphp

                    @if(count($cadangans) > 0)
                    <ul class="infopbg-cadangan-list">
                        @foreach($cadangans as $cadangan)
                        <li class="infopbg-cadangan-item">{!! nl2br(e($cadangan)) !!}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <style>
        .infopbg-section {
            width: 100%;
            padding: 80px 0;
            position: relative;
            background: linear-gradient(135deg, #ffffff 0%, #f0f7ff 100%);
            box-sizing: border-box;
            overflow: hidden;
        }

        /* Efek background modern */
        .infopbg-section::before {
            content: '';
            position: absolute;
            top: -20%;
            right: -10%;
            width: 60%;
            height: 60%;
            background: radial-gradient(circle, rgba(74,144,217,0.08) 0%, rgba(74,144,217,0) 70%);
            border-radius: 50%;
            pointer-events: none;
            z-index: 0;
        }

        .infopbg-section::after {
            content: '';
            position: absolute;
            bottom: -15%;
            left: -5%;
            width: 50%;
            height: 50%;
            background: radial-gradient(ellipse, rgba(123,196,247,0.1) 0%, transparent 70%);
            filter: blur(40px);
            pointer-events: none;
            z-index: 0;
        }

        .infopbg-container {
            width: 100%;
            max-width: 100%;
            padding: 0 40px;
            box-sizing: border-box;
            position: relative;
            z-index: 2;
        }

        /* Header Modern */
        .infopbg-header {
            margin-bottom: 48px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            position: relative;
        }

        .infopbg-title {
            font-size: 32px;
            font-weight: 800;
            margin: 0;
            background: linear-gradient(135deg, #0a2b44 0%, #1e5a9c 50%, #2f7fc9 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }

        .infopbg-title-line {
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #2a73c4, #7bc4f7, #a2d6fb);
            border-radius: 99px;
            transition: width 0.4s ease;
        }

        .infopbg-header:hover .infopbg-title-line {
            width: 100px;
        }

        /* Grid - 12 Column System */
        .infopbg-grid {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 28px;
            box-sizing: border-box;
        }

        /* Card Modern */
        .infopbg-card {
            grid-column: span 3;
            background: #ffffff;
            border-radius: 24px;
            border: 1px solid rgba(74,144,217,0.15);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.04);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: all 0.4s cubic-bezier(0.2, 0.85, 0.4, 1);
            box-sizing: border-box;
            position: relative;
        }

        .infopbg-card::before {
            content: '';
            position: absolute;
            inset: 0;
            border-radius: 24px;
            padding: 1px;
            background: linear-gradient(125deg, rgba(74,144,217,0.2), rgba(123,196,247,0.4), rgba(74,144,217,0.1));
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.4s;
            pointer-events: none;
        }

        .infopbg-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 48px -12px rgba(42, 115, 196, 0.2);
            border-color: rgba(74,144,217,0.3);
        }

        .infopbg-card:hover::before {
            opacity: 1;
        }

        /* Gambar Modern */
        .infopbg-img-wrap {
            display: block;
            width: 100%;
            overflow: hidden;
            position: relative;
            background: linear-gradient(135deg, #eef3fc, #e0eefa);
        }

        .infopbg-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            display: block;
            transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .infopbg-img-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(26, 26, 46, 0.7), rgba(42, 115, 196, 0.75));
            backdrop-filter: blur(2px);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.35s ease;
        }

        .infopbg-img-wrap:hover .infopbg-img {
            transform: scale(1.08);
        }

        .infopbg-img-wrap:hover .infopbg-img-overlay {
            opacity: 1;
        }

        .infopbg-download-icon {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            background: linear-gradient(135deg, #2a73c4, #1e5a9c);
            padding: 10px 20px;
            border-radius: 99px;
            letter-spacing: 0.3px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .infopbg-download-icon:hover {
            transform: scale(1.02);
            box-shadow: 0 6px 16px rgba(0,0,0,0.25);
        }

        /* Body Card */
        .infopbg-body {
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            flex: 1;
            box-sizing: border-box;
        }

        .infopbg-judul {
            font-size: 18px;
            font-weight: 700;
            color: #0a2b44;
            margin: 0;
            line-height: 1.4;
            letter-spacing: -0.2px;
            border-left: 3px solid #2f7fc9;
            padding-left: 12px;
            transition: border-color 0.2s;
        }

        .infopbg-card:hover .infopbg-judul {
            border-left-color: #7bc4f7;
        }

        .infopbg-keterangan {
            font-size: 14px;
            color: #4a5568;
            margin: 0;
            line-height: 1.6;
        }

        .infopbg-infolanjut {
            font-size: 13px;
            color: #1e5a9c;
            line-height: 1.6;
            padding: 12px 14px;
            background: linear-gradient(120deg, #f0f7ff, #ffffff);
            border-left: 3px solid #2f7fc9;
            border-radius: 0 12px 12px 0;
            display: flex;
            gap: 10px;
            align-items: flex-start;
        }

        .infopbg-infolanjut-icon {
            flex-shrink: 0;
            margin-top: 2px;
            color: #2f7fc9;
        }

        /* Cadangan list modern */
        .infopbg-cadangan-list {
            list-style: none;
            padding: 0;
            margin: 4px 0 0;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .infopbg-cadangan-item {
            font-size: 13px;
            color: #2d3e5f;
            padding: 8px 14px;
            background: #fafcff;
            border-radius: 12px;
            border: 1px solid #e9f0f8;
            line-height: 1.5;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            transition: all 0.2s;
        }

        .infopbg-cadangan-item::before {
            content: '✨';
            display: inline-block;
            flex-shrink: 0;
            width: auto;
            height: auto;
            background: none;
            font-size: 12px;
            margin-top: 0;
        }

        .infopbg-cadangan-item:hover {
            background: #eff6fe;
            border-color: #cae0f5;
            transform: translateX(4px);
        }

        /* Animasi fade in untuk card */
        .infopbg-card {
            animation: fadeInUp 0.6s cubic-bezier(0.2, 0.9, 0.3, 1.1) backwards;
            animation-delay: calc(var(--order, 0) * 0.05s);
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ==============================
           RESPONSIVE - FULL 12 COLUMN
        ============================== */

        /* Desktop XL ≥ 1400px - 4 kolom */
        @media (min-width: 1400px) {
            .infopbg-container {
                padding: 0 60px;
            }
            .infopbg-grid {
                gap: 30px;
            }
            .infopbg-card {
                grid-column: span 3;
            }
        }

        /* Desktop 1200px - 1399px - 4 kolom */
        @media (min-width: 1200px) and (max-width: 1399px) {
            .infopbg-container {
                padding: 0 48px;
            }
            .infopbg-grid {
                gap: 26px;
            }
            .infopbg-card {
                grid-column: span 3;
            }
        }

        /* Desktop 992px - 1199px - 3 kolom */
        @media (min-width: 992px) and (max-width: 1199px) {
            .infopbg-container {
                padding: 0 40px;
            }
            .infopbg-grid {
                gap: 24px;
            }
            .infopbg-card {
                grid-column: span 4;
            }
            .infopbg-title {
                font-size: 28px;
            }
        }

        /* Tablet 768px - 991px - 2 kolom */
        @media (min-width: 768px) and (max-width: 991px) {
            .infopbg-section {
                padding: 60px 0;
            }
            .infopbg-container {
                padding: 0 32px;
            }
            .infopbg-grid {
                gap: 22px;
            }
            .infopbg-card {
                grid-column: span 6;
            }
            .infopbg-title {
                font-size: 26px;
            }
            .infopbg-img {
                height: 190px;
            }
        }

        /* Mobile Landscape 576px - 767px - 2 kolom */
        @media (min-width: 576px) and (max-width: 767px) {
            .infopbg-section {
                padding: 48px 0;
            }
            .infopbg-container {
                padding: 0 24px;
            }
            .infopbg-grid {
                gap: 18px;
            }
            .infopbg-card {
                grid-column: span 6;
            }
            .infopbg-title {
                font-size: 24px;
            }
            .infopbg-img {
                height: 170px;
            }
            .infopbg-judul {
                font-size: 16px;
            }
            .infopbg-body {
                padding: 16px;
            }
        }

        /* Mobile Portrait ≤ 575px - 1 kolom */
        @media (max-width: 575px) {
            .infopbg-section {
                padding: 40px 0;
            }
            .infopbg-container {
                padding: 0 20px;
            }
            .infopbg-grid {
                gap: 20px;
            }
            .infopbg-card {
                grid-column: span 12;
            }
            .infopbg-header {
                margin-bottom: 32px;
            }
            .infopbg-title {
                font-size: 22px;
            }
            .infopbg-body {
                padding: 18px;
            }
            .infopbg-judul {
                font-size: 17px;
            }
            .infopbg-img {
                height: 180px;
            }
        }
    </style>
</section>


    </main>

@include('frontend.ui2026.00_fiturmenu.02_footer')
