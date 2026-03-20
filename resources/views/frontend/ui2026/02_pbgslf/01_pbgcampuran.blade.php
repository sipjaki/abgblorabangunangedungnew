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
            padding: 64px 0;
            box-sizing: border-box;
        }

        .infopbg-container {
            width: 100%;
            max-width: 100%;
            padding: 0 40px;
            box-sizing: border-box;
        }

        /* Header */
        .infopbg-header {
            margin-bottom: 40px;
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .infopbg-title {
            font-size: 28px;
            font-weight: 700;
            color: #1a1a2e;
            margin: 0;
            letter-spacing: -0.3px;
        }

        .infopbg-title-line {
            width: 52px;
            height: 4px;
            background: linear-gradient(90deg, #4a90d9, #7bc4f7);
            border-radius: 99px;
        }

        /* Grid */
        .infopbg-grid {
            width: 100%;
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            box-sizing: border-box;
        }

        /* Card */
        .infopbg-card {
            width: 100%;
            background: #ffffff;
            border-radius: 16px;
            border: 1px solid #f0f0f0;
            box-shadow: 0 1px 6px rgba(0,0,0,0.05);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            box-sizing: border-box;
        }

        .infopbg-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 32px rgba(74,144,217,0.13);
            border-color: #d0e8f8;
        }

        /* Gambar */
        .infopbg-img-wrap {
            display: block;
            width: 100%;
            overflow: hidden;
            position: relative;
        }

        .infopbg-img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.35s ease;
        }

        .infopbg-img-overlay {
            position: absolute;
            inset: 0;
            background: rgba(26, 26, 46, 0.45);
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .infopbg-img-wrap:hover .infopbg-img {
            transform: scale(1.05);
        }

        .infopbg-img-wrap:hover .infopbg-img-overlay {
            opacity: 1;
        }

        .infopbg-download-icon {
            display: flex;
            align-items: center;
            gap: 6px;
            color: #fff;
            font-size: 13px;
            font-weight: 600;
            background: rgba(74,144,217,0.85);
            padding: 8px 16px;
            border-radius: 99px;
            letter-spacing: 0.2px;
        }

        /* Body */
        .infopbg-body {
            padding: 18px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            flex: 1;
            box-sizing: border-box;
        }

        .infopbg-judul {
            font-size: 15px;
            font-weight: 700;
            color: #1a1a2e;
            margin: 0;
            line-height: 1.4;
            letter-spacing: -0.1px;
        }

        .infopbg-keterangan {
            font-size: 13px;
            color: #555;
            margin: 0;
            line-height: 1.7;
        }

        .infopbg-infolanjut {
            font-size: 13px;
            color: #4a6fa5;
            line-height: 1.7;
            padding: 10px 14px;
            background: #eef5fd;
            border-left: 3px solid #4a90d9;
            border-radius: 0 8px 8px 0;
            display: flex;
            gap: 8px;
            align-items: flex-start;
        }

        .infopbg-infolanjut-icon {
            flex-shrink: 0;
            margin-top: 2px;
            color: #4a90d9;
        }

        /* Cadangan list */
        .infopbg-cadangan-list {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .infopbg-cadangan-item {
            font-size: 13px;
            color: #444;
            padding: 8px 14px;
            background: #f8f9fb;
            border-radius: 8px;
            border: 1px solid #ebebeb;
            line-height: 1.6;
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }

        .infopbg-cadangan-item::before {
            content: '';
            display: inline-block;
            flex-shrink: 0;
            width: 6px;
            height: 6px;
            background: #4a90d9;
            border-radius: 50%;
            margin-top: 6px;
        }

        /* ==============================
           RESPONSIVE
        ============================== */

        /* Large Desktop ≥ 1440px */
        @media (min-width: 1440px) {
            .infopbg-container {
                padding: 0 60px;
            }
            .infopbg-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 28px;
            }
        }

        /* Desktop 1025px - 1439px */
        @media (min-width: 1025px) and (max-width: 1439px) {
            .infopbg-container {
                padding: 0 40px;
            }
            .infopbg-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 22px;
            }
        }

        /* Tablet 769px - 1024px */
        @media (min-width: 769px) and (max-width: 1024px) {
            .infopbg-section {
                padding: 48px 0;
            }
            .infopbg-container {
                padding: 0 28px;
            }
            .infopbg-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 18px;
            }
            .infopbg-title {
                font-size: 24px;
            }
        }

        /* HP 481px - 768px */
        @media (min-width: 481px) and (max-width: 768px) {
            .infopbg-section {
                padding: 40px 0;
            }
            .infopbg-container {
                padding: 0 20px;
            }
            .infopbg-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 14px;
            }
            .infopbg-title {
                font-size: 22px;
            }
            .infopbg-body {
                padding: 14px;
            }
            .infopbg-judul {
                font-size: 13px;
            }
            .infopbg-keterangan,
            .infopbg-infolanjut,
            .infopbg-cadangan-item {
                font-size: 12px;
            }
        }

        /* HP kecil ≤ 480px */
        @media (max-width: 480px) {
            .infopbg-section {
                padding: 32px 0;
            }
            .infopbg-container {
                padding: 0 16px;
            }
            .infopbg-grid {
                grid-template-columns: repeat(1, 1fr);
                gap: 14px;
            }
            .infopbg-header {
                margin-bottom: 28px;
            }
            .infopbg-title {
                font-size: 20px;
            }
            .infopbg-body {
                padding: 14px;
            }
            .infopbg-judul {
                font-size: 14px;
            }
            .infopbg-keterangan,
            .infopbg-infolanjut,
            .infopbg-cadangan-item {
                font-size: 13px;
            }
        }
    </style>
</section>

    </main>

@include('frontend.ui2026.00_fiturmenu.02_footer')
