@include('backend.00_administrator.00_baganterpisah.01_header')

<!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
{{-- ---------------------------------------------------------------------- --}}

@include('backend.00_administrator.00_baganterpisah.04_navbar')
@include('frontend.android.00_fiturmenu.06_alert')
{{-- ---------------------------------------------------------------------- --}}

      @include('backend.00_administrator.00_baganterpisah.03_sidebar')

      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
           @include('backend.00_administrator.00_baganterpisah.10_selamatdatang')
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                              </div>
              <!--end::Row-->
            </div>
            <!--end::Container-->
          </div>
          <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">



@can('konsultanbantek')
<div class="row">
    @php
        $boxes = [
            ['title' => 'BANTUAN ASISTENSI PERENCANAAN', 'jumlah' => $jumlahdataasistensi1],
            // ['title' => 'PENELITI KONTRAK', 'jumlah' => $jumlahdatadinas2],
            // ['title' => 'PERHITUNGAN PENYUSUTAN', 'jumlah' => $jumlahdatadinas3],
            // ['title' => 'PERHITUNGAN TINGKAT KERUSAKAN', 'jumlah' => $jumlahdatadinas4],
            // ['title' => 'PERHITUNGAN BIAYA PEMELIHARAAN BGN', 'jumlah' => $jumlahdatadinas5],
            // ['title' => 'BIAYA KONSTRUKSI PEMBANGUNAN BGN', 'jumlah' => $jumlahdatadinas6],
            // ['title' => 'PENGELOLA TEKNIS', 'jumlah' => $jumlahdatadinas7],
            // ['title' => 'PENDAMPINGAN SERAH TERIMA PEKERJAAN', 'jumlah' => $jumlahdatadinas8],
            // ['title' => 'PERMINTAAN PERSONIL TIM TEKNIS', 'jumlah' => $jumlahdatadinas9],
        ];
    @endphp

    @foreach ($boxes as $index => $box)
        <div class="col-12 col-sm-6 col-md-3 mb-4" data-aos="zoom-out" data-aos-delay="{{ $index * 100 }}">
            <div class="info-box shadow-lg rounded-3 p-4 transition-custom" style="background: #000080; color: white;">
                <span class="info-box-icon d-flex justify-content-center align-items-center p-3 shadow-sm rounded" style="background-color: #ffd100; width: 60px; height: 60px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                        <path fill="green" d="M14 4V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h-2V2H4v12h8V6h2z"/>
                    </svg>
                </span>
                <div class="info-box-content mt-3 text-center" style="font-family: 'Poppins', sans-serif;">
                    <span class="info-box-text" style="color: white; font-size: 14px;">{{ $box['title'] }}</span>
                    <span class="info-box-number fw-bold" style="font-size: 16px;">{{ $box['jumlah'] }} Permohonan</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endcan

@can('dinas')

<div class="container">


    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number"> {{
        ($jumlahdatadinas1 ?? 0) +
        ($jumlahdatadinas2 ?? 0) +
        ($jumlahdatadinas3 ?? 0) +
        ($jumlahdatadinas4 ?? 0) +
        ($jumlahdatadinas5 ?? 0) +
        ($jumlahdatadinas6 ?? 0) +
        ($jumlahdatadinas7 ?? 0) +
        ($jumlahdatadinas8 ?? 0)
    }}</div>
            <div class="stat-label">Total Permohonan</div>
            <div class="stat-change positive">Permohonan</div>
        </div>
        <div class="stat-card">
            {{-- <div class="stat-number">{{ $datajumlahdinas_dikembalikan['jumlahdatadinas_dikembalikan1'] }}</div> --}}
           {{-- <div class="stat-number">{{ $jumlahdatadinas_dikembalikan1 ?? 0 }}</div> --}}
         <div class="stat-number">
    {{
        ($jumlahdatadinas_dikembalikan1 ?? 0) +
        ($jumlahdatadinas_dikembalikan2 ?? 0) +
        ($jumlahdatadinas_dikembalikan3 ?? 0) +
        ($jumlahdatadinas_dikembalikan4 ?? 0) +
        ($jumlahdatadinas_dikembalikan5 ?? 0) +
        ($jumlahdatadinas_dikembalikan6 ?? 0) +
        ($jumlahdatadinas_dikembalikan7 ?? 0) +
        ($jumlahdatadinas_dikembalikan8 ?? 0)
    }}
</div>


            <div class="stat-label">Dikembalikan</div>
            <div class="stat-change positive">Permohonan</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">
    {{
        ($jumlahdatadinas_selesai1 ?? 0) +
        ($jumlahdatadinas_selesai2 ?? 0) +
        ($jumlahdatadinas_selesai3 ?? 0) +
        ($jumlahdatadinas_selesai4 ?? 0) +
        ($jumlahdatadinas_selesai5 ?? 0) +
        ($jumlahdatadinas_selesai6 ?? 0) +
        ($jumlahdatadinas_selesai7 ?? 0) +
        ($jumlahdatadinas_selesai8 ?? 0)
    }}
</div>
            {{-- <div class="stat-number">17</div> --}}
            <div class="stat-label">Pengolahan Data</div>
                <div class="stat-change positive">Permohonan Sedang Di Kaji</div>
            </div>
            <div class="stat-card">
            <div class="stat-number">
    {{
        ($jumlahdatadinas_terbit1 ?? 0) +
        ($jumlahdatadinas_terbit2 ?? 0) +
        ($jumlahdatadinas_terbit3 ?? 0) +
        ($jumlahdatadinas_terbit4 ?? 0) +
        ($jumlahdatadinas_terbit5 ?? 0) +
        ($jumlahdatadinas_terbit6 ?? 0) +
        ($jumlahdatadinas_terbit7 ?? 0) +
        ($jumlahdatadinas_terbit8 ?? 0)
    }}
</div>
                {{-- <div class="stat-number">1.345</div> --}}
                <div class="stat-label">Berkas Bantek Terbit</div>
                <div class="stat-change positive">Surat Terbit</div>
            </div>
        </div>

    </div>

<div class="row">
    @php
        $boxes = [
            ['title' => 'BANTUAN ASISTENSI PERENCANAAN', 'jumlah' => $jumlahdatadinas1],
            ['title' => 'PENELITI KONTRAK', 'jumlah' => $jumlahdatadinas2],
            ['title' => 'PERHITUNGAN PENYUSUTAN', 'jumlah' => $jumlahdatadinas3],
            ['title' => 'PERHITUNGAN TINGKAT KERUSAKAN', 'jumlah' => $jumlahdatadinas4],
            ['title' => 'PERHITUNGAN BIAYA PEMELIHARAAN BGN', 'jumlah' => $jumlahdatadinas5],
            ['title' => 'BIAYA KONSTRUKSI PEMBANGUNAN BGN', 'jumlah' => $jumlahdatadinas6],
            ['title' => 'PENGELOLA TEKNIS', 'jumlah' => $jumlahdatadinas7],
            ['title' => 'PENDAMPINGAN SERAH TERIMA PEKERJAAN', 'jumlah' => $jumlahdatadinas8],
            ['title' => 'PERMINTAAN PERSONIL TIM TEKNIS', 'jumlah' => $jumlahdatadinas9],
        ];
    @endphp

    @foreach ($boxes as $index => $box)
        <div class="col-12 col-sm-6 col-md-3 mb-4" data-aos="zoom-out" data-aos-delay="{{ $index * 100 }}">
            <div class="info-box shadow-lg rounded-3 p-4 transition-custom" style="background: #000080; color: white;">
                <span class="info-box-icon d-flex justify-content-center align-items-center p-3 shadow-sm rounded" style="background-color: #ffd100; width: 60px; height: 60px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                        <path fill="green" d="M14 4V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h-2V2H4v12h8V6h2z"/>
                    </svg>
                </span>
                <div class="info-box-content mt-3 text-center" style="font-family: 'Poppins', sans-serif;">
                    <span class="info-box-text" style="color: white; font-size: 14px;">{{ $box['title'] }}</span>
                    <span class="info-box-number fw-bold" style="font-size: 16px;">{{ $box['jumlah'] }} Permohonan</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endcan

@can('pemohonbantek')
<div class="row">
    @php
        $boxes = [
            ['title' => 'BANTUAN ASISTENSI PERENCANAAN', 'jumlah' => $jumlahdata1],
            ['title' => 'PENELITI KONTRAK', 'jumlah' => $jumlahdata2],
            ['title' => 'PERHITUNGAN PENYUSUTAN', 'jumlah' => $jumlahdata3],
            ['title' => 'PERHITUNGAN TINGKAT KERUSAKAN', 'jumlah' => $jumlahdata4],
            ['title' => 'PERHITUNGAN BIAYA PEMELIHARAAN BGN', 'jumlah' => $jumlahdata5],
            ['title' => 'BIAYA KONSTRUKSI PEMBANGUNAN BGN', 'jumlah' => $jumlahdata6],
            ['title' => 'PENGELOLA TEKNIS', 'jumlah' => $jumlahdata7],
            ['title' => 'PENDAMPINGAN SERAH TERIMA PEKERJAAN', 'jumlah' => $jumlahdata8],
            ['title' => 'PERMINTAAN PERSONIL TIM TEKNIS', 'jumlah' => $jumlahdata9],
        ];
    @endphp

    @foreach ($boxes as $index => $box)
        <div class="col-12 col-sm-6 col-md-3 mb-4" data-aos="zoom-out" data-aos-delay="{{ $index * 100 }}">
            <div class="info-box shadow-lg rounded-3 p-4 transition-custom" style="background: #000080; color: white;">
                <span class="info-box-icon d-flex justify-content-center align-items-center p-3 shadow-sm rounded" style="background-color: #ffd100; width: 60px; height: 60px;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
                        <path fill="green" d="M14 4V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h-2V2H4v12h8V6h2z"/>
                    </svg>
                </span>
                <div class="info-box-content mt-3 text-center" style="font-family: 'Poppins', sans-serif;">
                    <span class="info-box-text" style="color: white; font-size: 14px;">{{ $box['title'] }}</span>
                    <span class="info-box-number fw-bold" style="font-size: 16px;">{{ $box['jumlah'] }} Permohonan</span>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endcan

<style>
    .transition-custom {
        transition: all 0.3s ease-in-out;
    }

    .info-box:hover {
        background-color: white !important;
        color: #000080 !important;
        transform: translateY(-10px);
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    }

    .info-box:hover .info-box-text,
    .info-box:hover .info-box-number {
        color: #000080 !important;
    }
</style>

<script>
    AOS.init({
        duration: 800,
        once: true
    });
</script>

<style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #3b82f6 100%);
            min-height: 100vh;
            color: #ffffff;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
            padding: 30px 0;
        }

        .header h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .header p {
            font-size: 1.2rem;
            opacity: 0.9;
            font-weight: 300;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 30px;
            text-align: center;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s;
        }

        .stat-card:hover::before {
            left: 100%;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
        }

        .stat-number {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(45deg, #60a5fa, #a78bfa);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-label {
            font-size: 1.1rem;
            opacity: 0.9;
            margin-bottom: 15px;
        }

        .stat-change {
            font-size: 0.9rem;
            padding: 5px 12px;
            border-radius: 20px;
            display: inline-block;
        }

        .positive {
            background: rgba(34, 197, 94, 0.2);
            color: #86efac;
        }

        .negative {
            background: rgba(239, 68, 68, 0.2);
            color: #fca5a5;
        }

        .charts-section {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 30px;
            margin-bottom: 40px;
        }

        .chart-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 30px;
        }

        .chart-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
        }

        .bar-chart {
            display: flex;
            align-items: end;
            height: 200px;
            gap: 15px;
            margin-top: 20px;
        }

        .bar {
            flex: 1;
            background: linear-gradient(to top, #1e40af, #60a5fa);
            border-radius: 5px 5px 0 0;
            position: relative;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .bar:hover {
            transform: scaleY(1.1);
            background: linear-gradient(to top, #3b82f6, #93c5fd);
        }

        .bar::after {
            content: attr(data-value);
            position: absolute;
            top: -25px;
            left: 50%;
            transform: translateX(-50%);
            font-size: 0.8rem;
            font-weight: 600;
        }

        .pie-chart {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            background: conic-gradient(
                #60a5fa 0deg 120deg,
                #a78bfa 120deg 200deg,
                #34d399 200deg 280deg,
                #fbbf24 280deg 360deg
            );
            margin: 20px auto;
            position: relative;
            animation: rotate 2s ease-in-out;
        }

        .pie-chart::after {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100px;
            height: 100px;
            background: #1e40af;
            border-radius: 50%;
        }

        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .legend {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
            margin-top: 20px;
        }

        .legend-item {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 0.9rem;
        }

        .legend-color {
            width: 15px;
            height: 15px;
            border-radius: 3px;
        }

        .metrics-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
        }

        .metric-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            padding: 25px;
        }

        .metric-header {
            display: flex;
            justify-content: between;
            align-items: center;
            margin-bottom: 20px;
        }

        .metric-title {
            font-size: 1.2rem;
            font-weight: 600;
        }

        .metric-value {
            font-size: 2rem;
            font-weight: 700;
            color: #60a5fa;
        }

        .progress-bar {
            width: 100%;
            height: 8px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 4px;
            margin-top: 15px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #60a5fa, #a78bfa);
            border-radius: 4px;
            transition: width 2s ease;
        }

        .footer {
            text-align: center;
            margin-top: 50px;
            padding: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 2rem;
            }

            .charts-section {
                grid-template-columns: 1fr;
            }

            .container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>

    @can('superadmin')

    <div class="container">

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">3</div>
                <div class="stat-label">Akun Pemohon</div>
                <div class="stat-change positive">+12.5%</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">23</div>
                <div class="stat-label">Akun Dinas</div>
                <div class="stat-change positive">+8.2%</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">17</div>
                <div class="stat-label">Akun Konsultan</div>
                <div class="stat-change positive">2.1%</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">1.345</div>
                <div class="stat-label">Permohonan</div>
                <div class="stat-change positive">+1.8%</div>
            </div>
        </div>

        <div class="charts-section">
            <div class="chart-container">
                <h3 class="chart-title">Statistik</h3>
               <div class="bar-chart" style="display: flex; align-items: flex-end; gap: 10px; height: 200px;">
    <div class="bar" style="height: 60%;" data-value="60" title="Jan"></div>
    <div class="bar" style="height: 80%;" data-value="80" title="Feb"></div>
    <div class="bar" style="height: 45%;" data-value="45" title="Mar"></div>
    <div class="bar" style="height: 90%;" data-value="90" title="Apr"></div>
    <div class="bar" style="height: 75%;" data-value="75" title="Mei"></div>
    <div class="bar" style="height: 100%;" data-value="100" title="Jun"></div>
    <div class="bar" style="height: 50%;" data-value="50" title="Jul"></div>
    <div class="bar" style="height: 70%;" data-value="70" title="Agu"></div>
    <div class="bar" style="height: 65%;" data-value="65" title="Sep"></div>
    <div class="bar" style="height: 85%;" data-value="85" title="Okt"></div>
    <div class="bar" style="height: 55%;" data-value="55" title="Nov"></div>
    <div class="bar" style="height: 95%;" data-value="95" title="Des"></div>
</div>

            </div>

            <div class="chart-container">
    <h5 class="chart-title">Jumlah Berkas Permohonan </h5>
    <div class="legend">
        <div class="legend-item">
            <div class="legend-color" style="background: #00087c;"></div>
            <span>Berkas PBG SLF</span>
        </div>
        <div class="legend-item">
            <div class="legend-color" style="background: #a78bfa;"></div>
            <span>Berkas KRK</span>
        </div>
        <div class="legend-item">
            <div class="legend-color" style="background: #34d399;"></div>
            <span>Berkas Bantek</span>
        </div>
        <div class="legend-item">
            <div class="legend-color" style="background: #fbbf24;"></div>
            <span>Berkas Penilik</span>
        </div>
        <div class="legend-item">
            <div class="legend-color" style="background: #f472b6;"></div>
            <span>Berkas MBR</span>
        </div>
        <div class="legend-item">
            <div class="legend-color" style="background: #60a5fa;"></div>
            <span>Berkas Hibah Bangunan</span>
        </div>
        <div class="legend-item">
            <div class="legend-color" style="background: #10b981;"></div>
            <span>Berkas Bantuan</span>
        </div>
    </div>
</div>

        </div>

    </div>

    <script>
        // Add some interactivity
        document.addEventListener('DOMContentLoaded', function() {
            // Animate progress bars on load
            const progressBars = document.querySelectorAll('.progress-fill');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = width;
                }, 500);
            });

            // Add hover effects to stat cards
            const statCards = document.querySelectorAll('.stat-card');
            statCards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px) scale(1.02)';
                });
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });
        });
    </script>

<div class="row">

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box shadow-lg rounded-3 p-4" style="background: #000080; color: white; transition: all 0.3s ease;">
        <span class="info-box-icon d-flex justify-content-center align-items-center p-3 shadow-sm rounded" style="background-color: #ffd100; width: 60px; height: 60px;">
          <!-- SVG icon for PBG/SLF -->
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green" class="bi bi-file-earmark-text" viewBox="0 0 16 16">
            <path d="M14 4V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h-2V2H4v12h8V6h2z"/>
          </svg>
        </span>
        <div class="info-box-content mt-3 text-center" style="font-family: 'Poppins', sans-serif;">
          <span class="info-box-text" style="color: white;">PBG/SLF</span>
          <span class="info-box-number fw-bold" style="font-size: 16px;">10 Permohonan</span>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box shadow-lg rounded-3 p-4" style="background: #000080; color: white; transition: all 0.3s ease;">
        <span class="info-box-icon d-flex justify-content-center align-items-center p-3 shadow-sm rounded" style="background-color: #ffd100; width: 60px; height: 60px;">
          <!-- SVG icon for Tracking -->
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
            <path d="M14 7l-5 5-5-5h3V2h4v5h3z"/>
          </svg>
        </span>
        <div class="info-box-content mt-3 text-center" style="font-family: 'Poppins', sans-serif;">
          <span class="info-box-text" style="color:white;">Tracking</span>
          <span class="info-box-number fw-bold" style="font-size: 16px;">234 Permohonan</span>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box shadow-lg rounded-3 p-4" style="background: #000080; color: white; transition: all 0.3s ease;">
        <span class="info-box-icon d-flex justify-content-center align-items-center p-3 shadow-sm rounded" style="background-color: #ffd100; width: 60px; height: 60px;">
          <!-- SVG icon for Pendataan -->
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green" class="bi bi-clipboard-data" viewBox="0 0 16 16">
            <path d="M3 0a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V1a1 1 0 0 1 1-1h1zm10 0a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1h-1a1 1 0 0 1-1-1V1a1 1 0 0 1 1-1h1zM7 3h2v10H7V3z"/>
          </svg>
        </span>
        <div class="info-box-content mt-3 text-center" style="font-family: 'Poppins', sans-serif;">
          <span class="info-box-text" style="color: white;">Pendataan</span>
          <span class="info-box-number fw-bold" style="font-size: 16px;">760 Bangunan</span>
        </div>
      </div>
    </div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box shadow-lg rounded-3 p-4" style="background: #000080; color: white; transition: all 0.3s ease;">
          <span class="info-box-icon d-flex justify-content-center align-items-center p-3 shadow-sm rounded" style="background-color: #ffd100; width: 60px; height: 60px;">
            <!-- SVG icon for Surat (Mail) -->
            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="green" viewBox="0 0 16 16">
              <path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h13A1.5 1.5 0 0 1 16 2.5v11A1.5 1.5 0 0 1 14.5 15h-13A1.5 1.5 0 0 1 0 13.5V2.5zM1 2v11h14V2H1zm7 3.5L12 7H4l5-1.5z"/>
            </svg>
          </span>
          <div class="info-box-content mt-3 text-center" style="font-family: 'Poppins', sans-serif;">
            <span class="info-box-text" style="color: white;">Bantek</span>
            <span class="info-box-number fw-bold" style="font-size: 16px;">345 Permohonan</span>
          </div>
        </div>
      </div>


  </div>

  <style>
    .info-box:hover {
      background-color: white !important;
      color: #000080 !important;
      transform: translateY(-10px);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    .info-box-icon svg {
      fill: green; /* Green color for SVG icons */
    }
    .info-box-text, .info-box-number {
      color: white;
    }
    .info-box:hover .info-box-text,
    .info-box:hover .info-box-number {
      color: #000080 !important;
    }
  </style>

              {{-- -------------------------------------------------------- --}}

{{-- -------------------------------------------------------- --}}
<div class="row">

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box shadow-lg rounded-3 p-4" style="background: #000080; color: white; transition: all 0.3s ease;">
        <span class="info-box-icon d-flex justify-content-center align-items-center p-3 shadow-sm rounded" style="background-color: #ffd100; width: 60px; height: 60px;">
          <!-- SVG icon for Sosialisasi -->
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green" class="bi bi-megaphone" viewBox="0 0 16 16">
            <path d="M8 0a1 1 0 0 1 1 1v6.1l2.5-.5a1 1 0 0 1 1 1.3l-3 7a1 1 0 0 1-1.8 0l-3-7a1 1 0 0 1 1-1.3L7 7.1V1a1 1 0 0 1 1-1zM8 9.5l1 2.3 1-2.3V1H7v8.5l1-2.3z"/>
          </svg>
        </span>
        <div class="info-box-content mt-3 text-center" style="font-family: 'Poppins', sans-serif;">
          <span class="info-box-text" style="color: white;">Sosialisasi</span>
          <span class="info-box-number fw-bold" style="font-size: 16px;">50 Permohonan</span>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box shadow-lg rounded-3 p-4" style="background: #000080; color: white; transition: all 0.3s ease;">
        <span class="info-box-icon d-flex justify-content-center align-items-center p-3 shadow-sm rounded" style="background-color: #ffd100; width: 60px; height: 60px;">
          <!-- SVG icon for kRK -->
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green" class="bi bi-clipboard-check" viewBox="0 0 16 16">
            <path d="M12.146 5.854a.5.5 0 0 0-.707 0L8 9.293 5.854 7.146a.5.5 0 1 0-.708.707l2.5 2.5a.5.5 0 0 0 .708 0l4-4a.5.5 0 0 0 0-.707z"/>
            <path d="M3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v11A1.5 1.5 0 0 1 11.5 15h-7A1.5 1.5 0 0 1 3 13.5V2.5zM4 2v11h8V2H4z"/>
          </svg>
        </span>
        <div class="info-box-content mt-3 text-center" style="font-family: 'Poppins', sans-serif;">
          <span class="info-box-text" style="color:white;">kRK</span>
          <span class="info-box-number fw-bold" style="font-size: 16px;">100 Permohonan</span>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box shadow-lg rounded-3 p-4" style="background: #000080; color: white; transition: all 0.3s ease;">
        <span class="info-box-icon d-flex justify-content-center align-items-center p-3 shadow-sm rounded" style="background-color: #ffd100; width: 60px; height: 60px;">
          <!-- SVG icon for Penilik -->
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green" class="bi bi-person-circle" viewBox="0 0 16 16">
            <path d="M8 0a8 8 0 1 0 8 8A8 8 0 0 0 8 0zm0 1a7 7 0 1 1-7 7A7 7 0 0 1 8 1zm0 5a2 2 0 1 1-2 2 2 2 0 0 1 2-2zm0 4a5 5 0 0 0-5 5h10a5 5 0 0 0-5-5z"/>
          </svg>
        </span>
        <div class="info-box-content mt-3 text-center" style="font-family: 'Poppins', sans-serif;">
          <span class="info-box-text" style="color: white;">Penilik</span>
          <span class="info-box-number fw-bold" style="font-size: 16px;">450 Penilaian</span>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box shadow-lg rounded-3 p-4" style="background: #000080; color: white; transition: all 0.3s ease;">
        <span class="info-box-icon d-flex justify-content-center align-items-center p-3 shadow-sm rounded" style="background-color: #ffd100; width: 60px; height: 60px;">
          <!-- SVG icon for MBR Bangunan -->
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="green" viewBox="0 0 16 16">
            <path d="M7 0h2v16H7V0zM0 6h2v8H0V6zm14 0h2v8h-2V6z"/>
          </svg>
        </span>
        <div class="info-box-content mt-3 text-center" style="font-family: 'Poppins', sans-serif;">
          <span class="info-box-text" style="color: white;">MBR Bangunan</span>
          <span class="info-box-number fw-bold" style="font-size: 16px;">200 Bangunan</span>
        </div>
      </div>
    </div>

</div>

              {{-- -------------------------------------------------------- --}}

{{-- -------------------------------------------------------- --}}
<div class="row">

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box shadow-lg rounded-3 p-4" style="background: #000080; color: white; transition: all 0.3s ease;">
        <span class="info-box-icon d-flex justify-content-center align-items-center p-3 shadow-sm rounded" style="background-color: #ffd100; width: 60px; height: 60px;">
          <!-- SVG icon for Bantuan Gambar -->
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green" class="bi bi-image" viewBox="0 0 16 16">
            <path d="M3 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H3zm0 1h10a1 1 0 0 1 1 1v10H2V2a1 1 0 0 1 1-1zm1 3h8a1 1 0 0 1 1 1v6a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5a1 1 0 0 1 1-1z"/>
          </svg>
        </span>
        <div class="info-box-content mt-3 text-center" style="font-family: 'Poppins', sans-serif;">
          <span class="info-box-text" style="color: white;">Bantuan Gambar</span>
          <span class="info-box-number fw-bold" style="font-size: 16px;">120 Permohonan</span>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box shadow-lg rounded-3 p-4" style="background: #000080; color: white; transition: all 0.3s ease;">
        <span class="info-box-icon d-flex justify-content-center align-items-center p-3 shadow-sm rounded" style="background-color: #ffd100; width: 60px; height: 60px;">
          <!-- SVG icon for Hibah Bangunan -->
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green" class="bi bi-house-door" viewBox="0 0 16 16">
            <path d="M7 3V0h2v3h5v8H4V3h3z"/>
            <path d="M7 9v6h2V9H7z"/>
          </svg>
        </span>
        <div class="info-box-content mt-3 text-center" style="font-family: 'Poppins', sans-serif;">
          <span class="info-box-text" style="color: white;">Hibah Bangunan</span>
          <span class="info-box-number fw-bold" style="font-size: 16px;">85 Permohonan</span>
        </div>
      </div>
    </div>

    <div class="col-12 col-sm-6 col-md-3">
      <div class="info-box shadow-lg rounded-3 p-4" style="background: #000080; color: white; transition: all 0.3s ease;">
        <span class="info-box-icon d-flex justify-content-center align-items-center p-3 shadow-sm rounded" style="background-color: #ffd100; width: 60px; height: 60px;">
          <!-- SVG icon for SPPD -->
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green" class="bi bi-file-earmark" viewBox="0 0 16 16">
            <path d="M14 4V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v2h-2V2H4v12h8V6h2z"/>
          </svg>
        </span>
        <div class="info-box-content mt-3 text-center" style="font-family: 'Poppins', sans-serif;">
          <span class="info-box-text" style="color: white;">SPPD</span>
          <span class="info-box-number fw-bold" style="font-size: 16px;">300 Permohonan</span>
        </div>
      </div>
    </div>

</div>
@endcan
              {{-- -------------------------------------------------------- --}}



              {{-- -------------------------------------------------------- --}}

              <!--begin::Row-->

          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->

          <!--end::App Content-->
      </main>
      <!--end::App Main-->


      @include('backend.00_administrator.00_baganterpisah.02_footer')
