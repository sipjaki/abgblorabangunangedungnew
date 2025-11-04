@include('backend.00_administrator.00_baganterpisah.01_header')
@include('backend.00_administrator.00_baganterpisah.09_button')

<!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
{{-- ---------------------------------------------------------------------- --}}

@include('backend.00_administrator.00_baganterpisah.04_navbar')
{{-- ---------------------------------------------------------------------- --}}

      @include('backend.00_administrator.00_baganterpisah.03_sidebar')

      <!--begin::App Main-->
      <main class="app-main"
         style="
    background: linear-gradient(to bottom, #7de3f1, #ffffff);
    margin: 0;
    padding: 0;
    position: relative;
    left: 0;
  ">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">

                    @include('backend.00_administrator.00_baganterpisah.10_selamatdatang')

              {{-- <div class="col-sm-12"><h3 class="mb-0">Selamat datang ! <span style="color: black; font-weight:800;" > {{ Auth::user()->name }}</span> di Dashboard <span style="color: black; font-weight:800;"> {{ Auth::user()->statusadmin->statusadmin }} </span>  Sistem Informasi Pembina Jasa Konstruksi Kab Blora</h3></div> --}}

            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <br>

        <!-- Menampilkan pesan sukses -->

        {{-- ======================================================= --}}
        {{-- ALERT --}}

        @include('backend.00_administrator.00_baganterpisah.06_alert')

        {{-- ======================================================= --}}

        <div class="container-fluid">
            <!--begin::Row-->
  <!-- =========================================================== -->
  {{-- <h5 class="mt-4 mb-2">Info Box With <code>bg-*</code></h5> --}}
  <!--begin::Row-->


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", { packages: ["corechart"] });
  google.charts.setOnLoadCallback(drawCharts);

  function drawCharts() {
    // Data PieChart
    var data = google.visualization.arrayToDataTable([
      ['Fungsi', 'Jumlah Permohonan'],
      ['Fungsi Usaha', {{ $datajumlahkrkusaha ?? 0 }}],
      ['Fungsi Hunian', {{ $datajumlahkrkhunian ?? 0 }}],
      ['Fungsi Keagamaan', {{ $datajumlahkrkkeagamaan ?? 0 }}],
      ['Fungsi Sosial Budaya', {{ $datajumlahkrksosbud ?? 0 }}],
      ['Menara Telekomunikasi', {{ $datajumlahkrkmenara ?? 0 }}]
    ]);

    // Data Bar Chart
    var dataBar = google.visualization.arrayToDataTable([
      ['Fungsi', 'Jumlah Permohonan', { role: 'style' }],
      ['Fungsi Usaha', {{ $datajumlahkrkusaha ?? 0 }}, '#006400'],
      ['Fungsi Hunian', {{ $datajumlahkrkhunian ?? 0 }}, '#FFD700'],
      ['Fungsi Keagamaan', {{ $datajumlahkrkkeagamaan ?? 0 }}, '#001f3f'],
      ['Fungsi Sosial Budaya', {{ $datajumlahkrksosbud ?? 0 }}, '#FFA500'],
      ['Menara Telekomunikasi', {{ $datajumlahkrkmenara ?? 0 }}, '#0000FF']
    ]);

    // Opsi PieChart
    var pieOptions = {
      title: 'Persentase Permohonan',
      is3D: true,
      backgroundColor: 'transparent',
      colors: ['#006400', '#FFD700', '#001f3f', '#FFA500', '#0000FF'],
      titleTextStyle: {
        color: '#001f3f',
        fontSize: 16,
        bold: true
      },
      legend: {
        textStyle: {
          color: '#001f3f',
          fontSize: 12
        }
      },
      chartArea: {
        width: '90%',
        height: '75%'
      }
    };

    // Opsi Bar Chart
    var barOptions = {
      title: 'Jumlah Permohonan',
      backgroundColor: 'transparent',
      titleTextStyle: {
        color: '#001f3f',
        fontSize: 16,
        bold: true
      },
      legend: { position: 'none' },
      chartArea: {
        width: '65%',
        height: '70%'
      },
      hAxis: {
        title: 'Jumlah Permohonan',
        titleTextStyle: { color: '#001f3f' },
        textStyle: { color: '#001f3f' }
      },
      vAxis: {
        textStyle: { color: '#001f3f' }
      }
    };

    // Gambar chart
    var pieChart = new google.visualization.PieChart(document.getElementById('piechart'));
    var barChart = new google.visualization.ColumnChart(document.getElementById('barchart'));

    pieChart.draw(data, pieOptions);
    barChart.draw(dataBar, barOptions);
  }
</script>

<style>
  .chart-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    margin-top: -80px;
  }

  .chart-box {
    flex: 1;
    min-width: 450px;
    max-width: 50%;
    height: 400px;
    padding: 10px;
    box-sizing: border-box;
  }

  svg {
    filter: drop-shadow(0 0 6px rgba(0, 0, 0, 0.1));
  }
</style>

<div class="chart-container">
  <div id="piechart" class="chart-box"></div>
  <div id="barchart" class="chart-box"></div>
</div>

<div class="container" style="margin-top: -50px;">

        <div class="stats-grid">
    <div class="stat-card">
     <div class="stat-number">
    {{ ($datajumlahkrkusaha ?? 0) + ($datajumlahkrkhunian ?? 0) + ($datajumlahkrkkeagamaan ?? 0) + ($datajumlahkrksosbud ?? 0) + ($datajumlahkrkmenara ?? 0) }}
</div>
        <div class="stat-label" style="color: navy;">
            <i class="bi bi-file-earmark-text-fill" style="margin-right: 6px;"></i> Permohonan
        </div>
    </div>
  <div class="stat-card">
    <div class="stat-number">
        {{
            $datajumlahkrkusaha_dikembalikan +
            $datajumlahkrkhunian_dikembalikan +
            $datajumlahkrkagama_dikembalikan +
            $datajumlahkrksosbud_dikembalikan +
            $datajumlahkrkmenara_dikembalikan
        }}
    </div>
    <div class="stat-label" style="color: navy;">
        <i class="bi bi-arrow-repeat" style="margin-right: 6px;"></i> Dikembalikan
    </div>
</div>

    <div class="stat-card">
         <div class="stat-number">
        {{
            $datajumlahkrkusaha_lapangan +
            $datajumlahkrkhunian_lapangan +
            $datajumlahkrkagama_lapangan +
            $datajumlahkrksosbud_lapangan +
            $datajumlahkrkmenara_lapangan
        }}
    </div>
        <div class="stat-label" style="color: navy;">
            <i class="bi bi-calendar-check" style="margin-right: 6px;"></i> Cek Lapangan
        </div>
    </div>
    <div class="stat-card">
       <div class="stat-number">
        {{
            $datajumlahkrkusaha_terbit +
            $datajumlahkrkhunian_terbit +
            $datajumlahkrkagama_terbit +
            $datajumlahkrksosbud_terbit +
            $datajumlahkrkmenara_terbit
        }}
        <div class="stat-label" style="color: navy;">
            <i class="bi bi-file-earmark-check" style="margin-right: 6px;"></i> Surat Terbit
        </div>
    </div>
</div>


</div>


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
    color: #020075;
    display: inline-block;
    animation: zoomInOut 3s ease-in-out infinite;
}

@keyframes zoomInOut {
    0%, 100% {
        transform: scale(1);
        opacity: 1;
    }
    50% {
        transform: scale(1.2);
        opacity: 0.8;
    }
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


<div class="row">
    <!-- 1. Permohonan PBG SLF -->
    <div class="col-md-3 col-sm-6 col-12" style="margin-top: 5px; margin-bottom:5px;">
        <a href="/bekrkusaha" style="text-decoration: none;">
            <div class="dashboard-card card-1">
                <div class="card-content">
                    <div class="number-container">
                        <img src="/assets/icon/pupr.png" alt="icon" width="40">
                    </div>
                    <div class="info-content">
                        <p class="info-text">
                            <i class="bi bi-file-earmark-check" style="margin-right: 5px;"></i>
                            <span class="info-number">{{$datajumlahkrkusaha}}</span>
                        </p>
                        <p class="info-text">
                            Permohonan KRK Usaha
                        </p>
                        <p class="small-text">Informasi KRK Usaha</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- 2. Pendataan Bangunan Gedung -->
    <div class="col-md-3 col-sm-6 col-12" style="margin-top: 5px; margin-bottom:5px;">
        <a href="/bekrkhunian" style="text-decoration: none;">
            <div class="dashboard-card card-1">
                <div class="card-content">
                    <div class="number-container">
                        <img src="/assets/icon/pupr.png" alt="icon" width="40">
                    </div>
                    <div class="info-content">
                        <p class="info-text">
                            <i class="bi bi-building-check" style="margin-right: 5px;"></i>
                            <span class="info-number">{{$datajumlahkrkhunian}} </span>
                        </p>
                        <p class="info-text">
                            Permohonan KRK Hunian
                        </p>
                        <p class="small-text">Informasi KRK Hunian</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- 3. Bantuan Teknis -->
    <div class="col-md-3 col-sm-6 col-12" style="margin-top: 5px; margin-bottom:5px;">
        <a href="/bekrkkeagamaan" style="text-decoration: none;">
            <div class="dashboard-card card-1">
                <div class="card-content">
                    <div class="number-container">
                        <img src="/assets/icon/pupr.png" alt="icon" width="40">
                    </div>
                    <div class="info-content">
                        <p class="info-text">
                            <i class="bi bi-tools" style="margin-right: 5px;"></i>
                            <span class="info-number">{{$datajumlahkrkkeagamaan}} </span>
                        </p>
                        <p class="info-text">
                            Permohonan KRK Keagamaan
                        </p>
                        <p class="small-text">Informasi KRK Keagamaan</p>
                    </div>
                </div>
            </div>
        </a>
    </div>

    <!-- 4. Keterangan Rencana Kabupaten -->
    <div class="col-md-3 col-sm-6 col-12" style="margin-top: 5px; margin-bottom:5px;">
        <a href="/bekrksosbud" style="text-decoration: none;">
            <div class="dashboard-card card-1">
                <div class="card-content">
                    <div class="number-container">
                        <img src="/assets/icon/pupr.png" alt="icon" width="40">
                    </div>
                    <div class="info-content">
                        <p class="info-text">
                            <i class="bi bi-geo-alt" style="margin-right: 5px;"></i>
                            <span class="info-number">{{$datajumlahkrksosbud}}</span>
                        </p>
                        <p class="info-text">
                            Permohonan KRK Sosial Budaya
                        </p>
                        <p class="small-text">Informasi KRK Sosial Budaya</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>


<div class="row">
    <!-- 4. Keterangan Rencana Kabupaten -->
    <div class="col-md-3 col-sm-6 col-12" style="margin-top: 5px; margin-bottom:5px;">
        <a href="/bekrkmenaratelkom" style="text-decoration: none;">
            <div class="dashboard-card card-1">
                <div class="card-content">
                    <div class="number-container">
                        <img src="/assets/icon/pupr.png" alt="icon" width="40">
                    </div>
                    <div class="info-content">
                        <p class="info-text">
                            <i class="bi bi-geo-alt" style="margin-right: 5px;"></i>
                            <span class="info-number">{{$datajumlahkrkmenara}}</span>
                        </p>
                        <p class="info-text">
                            Permohonan KRK Menara Telekomunikasi
                        </p>
                        <p class="small-text">Informasi KRK Menara Telekomunikasi</p>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

                <!-- /.col -->

            </div>

  {{-- ================================================================================== --}}
            <!-- /.col -->
        </div>we
        <!--end::Row-->
        </div>
                  <!--end::Container-->
        <!--end::App Content Header-->
        <!--begin::App Content-->
          <!--end::App Content-->
      </main>
      <!--end::App Main-->
    </div>
    </div>


      @include('backend.00_administrator.00_baganterpisah.02_footer')
