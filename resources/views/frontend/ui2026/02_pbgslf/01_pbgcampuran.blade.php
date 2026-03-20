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
            {{-- <p class="section-subtitle">Akses layanan administrasi bangunan gedung dengan mudah dan cepat</p> --}}
        </div>

        <div class="services-grid">
            @foreach($data as $item)
            <div class="service-card" data-animate="fade-up" data-delay="{{ $loop->index * 50 }}">
                @if($item->berkas)
                <a href="{{ $item->berkas }}" download class="service-icon-link">
                    <div class="service-icon">
                        <i data-lucide="file-check"></i>
                    </div>
                </a>
                @else
                <div class="service-icon">
                    <i data-lucide="file-check"></i>
                </div>
                @endif

                @if($item->judul)
                <h3 class="service-title">{{ $item->judul }}</h3>
                @endif

                @if($item->keterangan)
                <p class="service-desc">{!! nl2br(e($item->keterangan)) !!}</p>
                @endif

                @if($item->infolanjut)
                <div class="service-info">
                    <i data-lucide="info" class="info-icon"></i>
                    <span class="info-text">{!! nl2br(e($item->infolanjut)) !!}</span>
                </div>
                @endif

                @php
                    $cadangans = array_filter([
                        $item->cadangan1, $item->cadangan2, $item->cadangan3,
                        $item->cadangan4, $item->cadangan5, $item->cadangan6,
                        $item->cadangan7, $item->cadangan8, $item->cadangan9,
                        $item->cadangan10, $item->cadangan11, $item->cadangan12,
                    ]);
                @endphp

                @if(count($cadangans) > 0)
                <ul class="service-features">
                    @foreach($cadangans as $cadangan)
                    <li class="feature-item">
                        <i data-lucide="check-circle-2" class="feature-icon"></i>
                        <span>{!! nl2br(e($cadangan)) !!}</span>
                    </li>
                    @endforeach
                </ul>
                @endif

                @if($item->berkas)
                <a href="{{ $item->berkas }}" download class="service-download">
                    <i data-lucide="download"></i>
                    <span>Unduh Dokumen</span>
                </a>
                @endif
            </div>
            @endforeach
        </div>
    </div>

    <style>
        /* ========== MODERN STYLE - BLUE & WHITE ========== */
        .services-section {
            width: 100%;
            padding: 80px 0;
            position: relative;
            background: linear-gradient(135deg, #ffffff 0%, #f8fcff 100%);
            overflow: hidden;
        }

        /* Background effect */
        .services-section::before {
            content: '';
            position: absolute;
            top: -20%;
            right: -10%;
            width: 60%;
            height: 60%;
            background: radial-gradient(circle, rgba(42,115,196,0.05) 0%, rgba(42,115,196,0) 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .services-section::after {
            content: '';
            position: absolute;
            bottom: -15%;
            left: -5%;
            width: 50%;
            height: 50%;
            background: radial-gradient(ellipse, rgba(123,196,247,0.08) 0%, transparent 70%);
            filter: blur(40px);
            pointer-events: none;
        }

        .bg-illustration--skyline {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            opacity: 0.08;
            pointer-events: none;
            z-index: 0;
        }

        .bg-illustration--skyline img {
            width: 100%;
            height: auto;
            display: block;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 0 40px;
            position: relative;
            z-index: 2;
        }

        /* Section Header */
        .section-header {
            text-align: center;
            margin-bottom: 56px;
        }

        .section-title {
            font-size: 36px;
            font-weight: 800;
            background: linear-gradient(135deg, #0a2b44 0%, #1e5a9c 50%, #2f7fc9 100%);
            background-clip: text;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 16px;
            letter-spacing: -0.5px;
            position: relative;
            display: inline-block;
        }

        .section-title::after {
            content: '';
            position: absolute;
            bottom: -12px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(90deg, #2a73c4, #7bc4f7);
            border-radius: 99px;
        }

        /* Grid - 12 Column System */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 28px;
        }

        /* Service Card Modern */
        .service-card {
            grid-column: span 3;
            background: #ffffff;
            border-radius: 24px;
            padding: 28px 20px;
            text-align: center;
            transition: all 0.4s cubic-bezier(0.2, 0.85, 0.4, 1);
            border: 1px solid rgba(74,144,217,0.12);
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.02);
            position: relative;
            overflow: hidden;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #2a73c4, #7bc4f7, #a2d6fb);
            transform: scaleX(0);
            transition: transform 0.4s ease;
        }

        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px -12px rgba(42,115,196,0.2);
            border-color: rgba(74,144,217,0.25);
        }

        .service-card:hover::before {
            transform: scaleX(1);
        }

        /* Service Icon */
        .service-icon-link {
            text-decoration: none;
            display: inline-block;
        }

        .service-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #eef6fe, #e2effa);
            border-radius: 20px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
            transition: all 0.3s ease;
        }

        .service-icon i {
            width: 32px;
            height: 32px;
            color: #2a73c4;
            stroke-width: 1.5;
            transition: all 0.3s ease;
        }

        .service-card:hover .service-icon {
            background: linear-gradient(135deg, #2a73c4, #1e5a9c);
            transform: scale(1.05);
        }

        .service-card:hover .service-icon i {
            color: white;
        }

        /* Service Title */
        .service-title {
            font-size: 18px;
            font-weight: 700;
            color: #0a2b44;
            margin-bottom: 10px;
            transition: color 0.3s ease;
        }

        .service-card:hover .service-title {
            color: #2a73c4;
        }

        /* Service Description */
        .service-desc {
            font-size: 13px;
            color: #5a6e8a;
            line-height: 1.6;
            margin-bottom: 16px;
        }

        /* Info Section */
        .service-info {
            background: #f0f7ff;
            border-radius: 12px;
            padding: 12px;
            margin-top: 16px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            text-align: left;
            border-left: 3px solid #2a73c4;
        }

        .info-icon {
            width: 16px;
            height: 16px;
            color: #2a73c4;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .info-text {
            font-size: 12px;
            color: #3a6b9e;
            line-height: 1.5;
        }

        /* Features List */
        .service-features {
            list-style: none;
            padding: 0;
            margin: 16px 0 0;
            text-align: left;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            font-size: 12px;
            color: #4a627a;
            padding: 6px 0;
            border-bottom: 1px solid #f0f4fa;
        }

        .feature-item:last-child {
            border-bottom: none;
        }

        .feature-icon {
            width: 14px;
            height: 14px;
            color: #2a73c4;
            flex-shrink: 0;
            margin-top: 2px;
        }

        /* Download Button */
        .service-download {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            background: linear-gradient(135deg, #2a73c4, #1e5a9c);
            color: white;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 40px;
            font-size: 12px;
            font-weight: 600;
            margin-top: 20px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
        }

        .service-download i {
            width: 16px;
            height: 16px;
        }

        .service-download:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(42,115,196,0.3);
            background: linear-gradient(135deg, #1e5a9c, #0f4578);
        }

        /* ========== RESPONSIVE - FULL 12 COLUMN ========== */

        /* Desktop XL ≥ 1400px - 4 kolom */
        @media (min-width: 1400px) {
            .container {
                padding: 0 60px;
            }
            .service-card {
                grid-column: span 3;
            }
            .services-grid {
                gap: 30px;
            }
        }

        /* Desktop 1200px - 1399px - 4 kolom */
        @media (min-width: 1200px) and (max-width: 1399px) {
            .container {
                padding: 0 48px;
            }
            .service-card {
                grid-column: span 3;
            }
        }

        /* Desktop 992px - 1199px - 3 kolom */
        @media (min-width: 992px) and (max-width: 1199px) {
            .container {
                padding: 0 40px;
            }
            .service-card {
                grid-column: span 4;
            }
            .services-grid {
                gap: 24px;
            }
            .section-title {
                font-size: 32px;
            }
        }

        /* Tablet 768px - 991px - 2 kolom */
        @media (min-width: 768px) and (max-width: 991px) {
            .services-section {
                padding: 60px 0;
            }
            .container {
                padding: 0 32px;
            }
            .service-card {
                grid-column: span 6;
            }
            .services-grid {
                gap: 22px;
            }
            .section-title {
                font-size: 28px;
            }
        }

        /* Mobile Landscape 576px - 767px - 2 kolom */
        @media (min-width: 576px) and (max-width: 767px) {
            .services-section {
                padding: 48px 0;
            }
            .container {
                padding: 0 24px;
            }
            .service-card {
                grid-column: span 6;
            }
            .services-grid {
                gap: 18px;
            }
            .section-title {
                font-size: 24px;
            }
            .service-title {
                font-size: 16px;
            }
            .service-desc {
                font-size: 12px;
            }
        }

        /* Mobile Portrait ≤ 575px - 1 kolom */
        @media (max-width: 575px) {
            .services-section {
                padding: 40px 0;
            }
            .container {
                padding: 0 20px;
            }
            .service-card {
                grid-column: span 12;
            }
            .services-grid {
                gap: 20px;
            }
            .section-header {
                margin-bottom: 32px;
            }
            .section-title {
                font-size: 22px;
            }
            .service-title {
                font-size: 17px;
            }
        }

        /* Animasi fade up */
        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .service-card {
            animation: fadeUp 0.6s cubic-bezier(0.2, 0.9, 0.3, 1.1) backwards;
            animation-delay: calc(var(--delay, 0) * 1ms);
        }
    </style>

    <script>
        // Untuk lucide icons (pastikan sudah include lucide)
        document.addEventListener('DOMContentLoaded', function() {
            if (typeof lucide !== 'undefined') {
                lucide.createIcons();
            }

            // Set animation delay untuk setiap card
            document.querySelectorAll('.service-card').forEach((card, index) => {
                card.style.setProperty('--delay', index * 50);
            });
        });
    </script>
</section>

    </main>

@include('frontend.ui2026.00_fiturmenu.02_footer')
