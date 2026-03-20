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

        <div class="services-grid">
            @foreach($data as $item)
            <div class="service-card" data-animate="fade-up" data-delay="{{ $loop->index * 50 }}">
                <!-- Gambar dari berkas -->
                @if($item->berkas)
                <div class="service-image-wrapper">
                    <img src="{{ $item->berkas }}" alt="{{ $item->judul }}" class="service-image">
                    <a href="{{ $item->berkas }}" download class="service-download-overlay">
                        <i data-lucide="download"></i>
                        <span>Unduh</span>
                    </a>
                </div>
                @else
                <div class="service-image-placeholder">
                    <i data-lucide="image"></i>
                    <span>No Image</span>
                </div>
                @endif

                <div class="service-content">
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
                    <a href="{{ $item->berkas }}" download class="service-download-btn">
                        <i data-lucide="download"></i>
                        <span>Unduh Dokumen</span>
                    </a>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <style>
        /* ========== MODERN STYLE - FULL WIDTH & RESPONSIVE ========== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .services-section {
            width: 100%;
            padding: 80px 0;
            position: relative;
            background: linear-gradient(135deg, #ffffff 0%, #f8fcff 100%);
            overflow-x: hidden;
        }

        /* Background effects */
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

        /* Container - FULL WIDTH */
        .container {
            width: 100%;
            max-width: 100%;
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
            font-size: 42px;
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
            width: 70px;
            height: 4px;
            background: linear-gradient(90deg, #2a73c4, #7bc4f7);
            border-radius: 99px;
        }

        /* Grid - FULL 12 COLUMN SYSTEM */
        .services-grid {
            display: grid;
            grid-template-columns: repeat(12, 1fr);
            gap: 28px;
            width: 100%;
        }

        /* Service Card Modern */
        .service-card {
            grid-column: span 3;
            background: #ffffff;
            border-radius: 24px;
            transition: all 0.4s cubic-bezier(0.2, 0.85, 0.4, 1);
            border: 1px solid rgba(74,144,217,0.12);
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.04);
            position: relative;
            overflow: hidden;
            display: flex;
            flex-direction: column;
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
            z-index: 2;
        }

        .service-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 24px 48px -12px rgba(42,115,196,0.2);
            border-color: rgba(74,144,217,0.3);
        }

        .service-card:hover::before {
            transform: scaleX(1);
        }

        /* Image Wrapper */
        .service-image-wrapper {
            position: relative;
            width: 100%;
            height: 220px;
            overflow: hidden;
            background: #f0f7ff;
            border-radius: 20px 20px 0 0;
        }

        .service-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s cubic-bezier(0.25, 0.46, 0.45, 0.94);
        }

        .service-card:hover .service-image {
            transform: scale(1.08);
        }

        .service-download-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(42,115,196,0.85), rgba(30,90,156,0.9));
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            opacity: 0;
            transition: opacity 0.3s ease;
            text-decoration: none;
            color: white;
            font-weight: 600;
            font-size: 14px;
            backdrop-filter: blur(4px);
        }

        .service-image-wrapper:hover .service-download-overlay {
            opacity: 1;
        }

        .service-download-overlay i {
            width: 20px;
            height: 20px;
        }

        /* Image Placeholder */
        .service-image-placeholder {
            width: 100%;
            height: 220px;
            background: linear-gradient(135deg, #eef3fc, #e2effa);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 12px;
            color: #9bb7d4;
            border-radius: 20px 20px 0 0;
        }

        .service-image-placeholder i {
            width: 48px;
            height: 48px;
            stroke-width: 1.2;
        }

        .service-image-placeholder span {
            font-size: 14px;
            font-weight: 500;
        }

        /* Service Content */
        .service-content {
            padding: 24px;
            display: flex;
            flex-direction: column;
            gap: 12px;
            flex: 1;
        }

        /* Service Title */
        .service-title {
            font-size: 20px;
            font-weight: 700;
            color: #0a2b44;
            margin: 0;
            transition: color 0.3s ease;
            line-height: 1.3;
        }

        .service-card:hover .service-title {
            color: #2a73c4;
        }

        /* Service Description */
        .service-desc {
            font-size: 14px;
            color: #5a6e8a;
            line-height: 1.6;
            margin: 0;
        }

        /* Info Section */
        .service-info {
            background: linear-gradient(120deg, #f0f7ff, #ffffff);
            border-radius: 14px;
            padding: 12px 14px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
            border-left: 3px solid #2a73c4;
            margin-top: 4px;
        }

        .info-icon {
            width: 16px;
            height: 16px;
            color: #2a73c4;
            flex-shrink: 0;
            margin-top: 2px;
        }

        .info-text {
            font-size: 13px;
            color: #3a6b9e;
            line-height: 1.5;
        }

        /* Features List */
        .service-features {
            list-style: none;
            padding: 0;
            margin: 8px 0 0;
        }

        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 10px;
            font-size: 13px;
            color: #4a627a;
            padding: 8px 0;
            border-bottom: 1px solid #f0f4fa;
        }

        .feature-item:last-child {
            border-bottom: none;
        }

        .feature-icon {
            width: 16px;
            height: 16px;
            color: #2a73c4;
            flex-shrink: 0;
            margin-top: 2px;
        }

        /* Download Button */
        .service-download-btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            background: linear-gradient(135deg, #2a73c4, #1e5a9c);
            color: white;
            text-decoration: none;
            padding: 12px 24px;
            border-radius: 40px;
            font-size: 13px;
            font-weight: 600;
            margin-top: 16px;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            width: fit-content;
        }

        .service-download-btn i {
            width: 18px;
            height: 18px;
        }

        .service-download-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(42,115,196,0.35);
            background: linear-gradient(135deg, #1e5a9c, #0f4578);
        }

        /* ========== RESPONSIVE - FULL WIDTH MONITOR & RESPONSIVE HP ========== */

        /* Desktop 4K+ (≥ 1920px) - Full width */
        @media (min-width: 1920px) {
            .container {
                padding: 0 80px;
            }
            .service-card {
                grid-column: span 3;
            }
            .services-grid {
                gap: 32px;
            }
            .section-title {
                font-size: 48px;
            }
        }

        /* Desktop Large (1440px - 1919px) - 4 kolom */
        @media (min-width: 1440px) and (max-width: 1919px) {
            .container {
                padding: 0 60px;
            }
            .service-card {
                grid-column: span 3;
            }
            .services-grid {
                gap: 30px;
            }
            .section-title {
                font-size: 42px;
            }
        }

        /* Desktop (1200px - 1439px) - 4 kolom */
        @media (min-width: 1200px) and (max-width: 1439px) {
            .container {
                padding: 0 48px;
            }
            .service-card {
                grid-column: span 3;
            }
            .services-grid {
                gap: 26px;
            }
        }

        /* Desktop Small (992px - 1199px) - 3 kolom */
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
                font-size: 36px;
            }
            .service-title {
                font-size: 18px;
            }
        }

        /* Tablet (768px - 991px) - 2 kolom */
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
                font-size: 32px;
            }
            .service-image-wrapper,
            .service-image-placeholder {
                height: 200px;
            }
        }

        /* Mobile Landscape (576px - 767px) - 2 kolom */
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
                gap: 20px;
            }
            .section-title {
                font-size: 28px;
            }
            .service-title {
                font-size: 17px;
            }
            .service-desc,
            .info-text,
            .feature-item {
                font-size: 12px;
            }
            .service-image-wrapper,
            .service-image-placeholder {
                height: 180px;
            }
            .service-content {
                padding: 18px;
            }
        }

        /* Mobile Portrait (≤ 575px) - 1 kolom FULL WIDTH */
        @media (max-width: 575px) {
            .services-section {
                padding: 40px 0;
            }
            .container {
                padding: 0 16px;
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
                font-size: 26px;
            }
            .service-title {
                font-size: 18px;
            }
            .service-desc,
            .info-text,
            .feature-item {
                font-size: 13px;
            }
            .service-image-wrapper,
            .service-image-placeholder {
                height: 200px;
            }
            .service-content {
                padding: 20px;
            }
            .service-download-btn {
                width: 100%;
                justify-content: center;
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
        // Untuk lucide icons
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
