@include('backend.00_administrator.00_baganterpisah.01_header')

<!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
{{-- ---------------------------------------------------------------------- --}}

@include('backend.00_administrator.00_baganterpisah.04_navbar')
@include('backend.00_administrator.00_baganterpisah.09_button')
@include('frontend.android.00_fiturmenu.06_alert')
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
              <!-- Info boxes -->

{{-- atas  --}}
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load("current", { packages: ["corechart"] });
  google.charts.setOnLoadCallback(drawCharts);

  function drawCharts() {
    var data = google.visualization.arrayToDataTable([
      ['Nama Institusi', 'Jumlah Data'],
      @foreach ($jumlahPerInstitusi as $item)
        ['{{ $item->namainstitusi ?? 'Tidak Diketahui' }}', {{ $item->total }}],
      @endforeach
    ]);

    var barData = google.visualization.arrayToDataTable([
      ['Nama Institusi', 'Jumlah Data', { role: 'style' }],
      @foreach ($jumlahPerInstitusi as $item)
        ['{{ $item->namainstitusi ?? 'Tidak Diketahui' }}', {{ $item->total }}, '#001f3f'],
      @endforeach
    ]);

    var options = {
      title: 'Jumlah Data Berdasarkan Nama Institusi',
      backgroundColor: 'transparent',
      is3D: true,
      legend: { position: 'right', textStyle: { color: '#001f3f' } },
      titleTextStyle: { color: '#001f3f', fontSize: 16, bold: true },
      chartArea: { width: '80%', height: '70%' }
    };

    var barOptions = {
      title: 'Data Institusi',
      backgroundColor: 'transparent',
      legend: 'none',
      chartArea: { width: '80%', height: '70%' },
      hAxis: { textStyle: { color: '#001f3f' } },
      vAxis: { textStyle: { color: '#001f3f' } },
      titleTextStyle: { color: '#001f3f', fontSize: 16, bold: true },
    };

    var pieChart = new google.visualization.PieChart(document.getElementById('piechart'));
    var barChart = new google.visualization.ColumnChart(document.getElementById('barchart'));

    pieChart.draw(data, options);
    barChart.draw(barData, barOptions);
  }
</script>

<style>
  .chart-container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    margin-top: -20px;
  }

  .chart-box {
    flex: 1;
    min-width: 450px;
    max-width: 50%;
    height: 450px;
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

<div id="institusiTableContainer" style="margin-top: 30px; font-family: 'Poppins', sans-serif; color: black;">
  <p style="font-size: 18px; font-weight: bold; margin-bottom: 15px; color: #333;">
    Tabel Jumlah Data Per Nama Institusi/OPD
</p>

<div style="overflow-x: auto;">
  <table id="institusiTable" style="width: 100%; border-collapse: collapse; background-color: #ffffff; box-shadow: 0 2px 8px rgba(0,0,0,0.05); border-radius: 8px; overflow: hidden;">
    <thead>
      <tr style="background-color: #f5f5f5;">
       <th style="padding: 12px; border-bottom: 1px solid #eee; text-align: center;">
      <i class="bi bi-hash"></i> No
    </th>
    <th style="padding: 12px; border-bottom: 1px solid #eee; text-align: left;">
      <i class="bi bi-building"></i> Nama Institusi
    </th>
    <th style="padding: 12px; border-bottom: 1px solid #eee; text-align: center;">
      <i class="bi bi-clipboard-data"></i> Jumlah Aset Bangunan
    </th>
 </tr>
    </thead>
    <tbody id="tableBody">
      @php
        $sortedData = $jumlahPerInstitusi->sortByDesc('total')->values();
      @endphp

      @foreach ($sortedData as $index => $item)
        <tr class="table-row" style="display: {{ $index < 10 ? 'table-row' : 'none' }}; transition: background 0.3s;">
          <td style="padding: 10px; border-bottom: 1px solid #eee; text-align: center;">{{ $index + 1 }}</td>
          <td style="padding: 10px; border-bottom: 1px solid #eee;">{{ $item->namainstitusi ?? 'Tidak Diketahui' }}</td>
          <td style="padding: 10px; border-bottom: 1px solid #eee; text-align: center;">{{ $item->total }} Bangunan Gedung</td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>

<style>
  #institusiTable tbody tr:hover {
    background-color: #f0f8ff; /* warna hover lembut */
  }
</style>

  <div style="margin-top: 20px; text-align: center; display: flex; justify-content: center; gap: 10px;">
    <button class="button-baru" onclick="prevPage()" id="prevBtn" disabled>
        <i class="bi bi-arrow-left-circle" style="margin-right: 5px;"></i> Sebelumnya
    </button>
    <button class="button-baru" onclick="nextPage()" id="nextBtn">
        Berikutnya <i class="bi bi-arrow-right-circle" style="margin-left: 5px;"></i>
    </button>
</div>

</div>

<script>
  let currentPage = 1;
  const rowsPerPage = 10;
  const rows = document.querySelectorAll('.table-row');
  const totalPages = Math.ceil(rows.length / rowsPerPage);

  function showPage(page) {
    rows.forEach((row, index) => {
      row.style.display = (index >= (page - 1) * rowsPerPage && index < page * rowsPerPage) ? 'table-row' : 'none';
    });

    document.getElementById('prevBtn').disabled = page === 1;
    document.getElementById('nextBtn').disabled = page === totalPages;
  }

  function nextPage() {
    if (currentPage < totalPages) {
      currentPage++;
      showPage(currentPage);
    }
  }

  function prevPage() {
    if (currentPage > 1) {
      currentPage--;
      showPage(currentPage);
    }
  }

  // Inisialisasi
  showPage(currentPage);
</script>

<br><br>

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
<div style="overflow-x: auto;">
  <table class="table rounded-table" style="width: 100%; border-collapse: separate; border-spacing: 0; border: 1px solid #eee; background-color: #fff;">
    <thead>
      <tr>
        <th style="text-align: center; border-bottom: 1px solid #eee;">
          <i class="bi bi-hash"></i> No
        </th>
        <th style="text-align: center; border-bottom: 1px solid #eee;">
          <i class="bi bi-geo-alt"></i> Kecamatan
        </th>
        <th style="text-align: center; border-bottom: 1px solid #eee;">
          <i class="bi bi-building"></i> Jumlah
        </th>
        <th style="text-align: center; border-bottom: 1px solid #eee;">
          <i class="bi bi-check2-circle"></i> Terverifikasi
        </th>
        <th style="text-align: center; border-bottom: 1px solid #eee;">
          <i class="bi bi-x-circle"></i> Belum Terverifikasi
        </th>

         <th style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
    <i class="bi bi-building" style="margin-right: 6px; color: #0a3d62;"></i> Informasi Bangunan
</th>

         <th style="padding: 12px; text-align: center; border-bottom: 1px solid #eee;">
    <i class="bi bi-building" style="margin-right: 6px; color: #0a3d62;"></i> Informasi Statistik
</th>

    </tr>
    </thead>
    <tbody>
      @foreach($jumlahPerKecamatan as $item)
      <tr>
        <td style="text-align: center; border-bottom: 1px solid #eee;">{{ $loop->iteration }}</td>
        <td style="border-bottom: 1px solid #eee;"><span class="button-berkas">{{ $item->kecamatanblora->kecamatanblora }}</span></td>
        <td style="text-align: center; border-bottom: 1px solid #eee;">
          <a href="{{ url('/bangunan/kecamatan/'.$item->kecamatanblora_id) }}" class="button-newvalidasi">
            {{ $item->total }} Bangunan Gedung
          </a>
        </td>
        <td style="text-align: center; border-bottom: 1px solid #eee;">
          <span class="button-hijau" style="display: inline-flex; align-items: center; gap: 5px;">
            {{ $item->ada }} Bangunan <small>({{ $item->persen_ada }}%)</small>
          </span>
        </td>
        <td style="text-align: center; border-bottom: 1px solid #eee;">
          <span class="button-merah" style="display: inline-flex; align-items: center; gap: 5px;">
            {{ $item->kosong }} Bangunan <small>({{ $item->persen_kosong }}%)</small>
          </span>
        </td>

        <td style="text-align: center; border-bottom: 1px solid #eee;">
          <a href="{{ url('/bangunan/kecamatan/'.$item->kecamatanblora_id) }}" class="button-baru">
                <i class="bi bi-eye" style="margin-right: 5px;"></i> Lihat Informasi
            </a>

        </td>

        <td style="text-align: center; border-bottom: 1px solid #eee;">
          {{-- <a href="{{ url('/bangunan/kecamatan/'.$item->kecamatanblora_id) }}" class="button-baru"> --}}
         <a class="button-newdata">
    <i class="bi bi-bar-chart-line-fill" style="margin-right: 5px;"></i> Lihat Statistik
</a>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<style>
  .rounded-table {
    border-radius: 20px;
    overflow: hidden;
  }

  .rounded-table thead tr:first-child th:first-child {
    border-top-left-radius: 20px;
  }
  .rounded-table thead tr:first-child th:last-child {
    border-top-right-radius: 20px;
  }
  .rounded-table tbody tr:last-child td:first-child {
    border-bottom-left-radius: 20px;
  }
  .rounded-table tbody tr:last-child td:last-child {
    border-bottom-right-radius: 20px;
  }

  .rounded-table th, .rounded-table td {
    border: 1px solid #eee; /* garis tipis */
    padding: 10px;
  }

  /* Hover effect baris */
  .rounded-table tbody tr:hover {
    background-color: #f9f9f9;
  }

  /* Icon spacing */
  .rounded-table th i {
    margin-right: 6px;
    color: #0a3d62; /* biru navy */
  }
</style>

<div class="container" style="margin-top: 20px;">
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number">{{ $jumlahDataTotal ?? 0 }}</div>
            <div class="stat-label">
                <i class="bi bi-building" style="margin-right: 6px;"></i> Bangunan Gedung
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-number">{{ $jumlahDatatanah ?? 0 }}</div>
            <div class="stat-label">
                <i class="bi bi-map-fill" style="margin-right: 6px;"></i> Data Tanah
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-number">{{ $jumlahDataprofil ?? 0 }}</div>
            <div class="stat-label">
                <i class="bi bi-person-badge-fill" style="margin-right: 6px;"></i> Data Profil
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-number">{{ $jumlahDataklasifikasi ?? 0 }}</div>
            <div class="stat-label">
                <i class="bi bi-file-earmark-check-fill" style="margin-right: 6px;"></i> Data Klasifikasi
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-number">{{ $jumlahDatastruktur ?? 0 }}</div>
            <div class="stat-label">
                <i class="bi bi-card-checklist" style="margin-right: 6px;"></i> Data Struktur
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-number">{{ $jumlahDatamep ?? 0 }}</div>
            <div class="stat-label">
                <i class="bi bi-card-checklist" style="margin-right: 6px;"></i> Data MEP
            </div>
        </div>

        <div class="stat-card">
            <div class="stat-number">{{ $jumlahDatakerusakan ?? 0 }}</div>
            <div class="stat-label">
                <i class="bi bi-card-checklist" style="margin-right: 6px;"></i> Data Kerusakan
            </div>
        </div>
    </div>
</div>

<style>
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 16px;
    }

    .stat-card {
        background: #fff;
        border: 1px solid #E8E9EE;
        border-radius: 12px;
        padding: 20px;
        text-align: center;
        box-shadow: 0 2px 6px rgba(0,0,0,0.08);
        transition: transform 0.2s ease, box-shadow 0.2s ease;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.12);
    }

    .stat-number {
        font-size: 28px;
        font-weight: bold;
        color: #1a237e; /* navy */
        margin-bottom: 8px;
    }

    .stat-label {
        font-size: 14px;
        color: navy;
        display: flex;
        align-items: center;
        justify-content: center;
    }
</style>


{{-- -------------------------------------------------------- --}}
{{-- <div class="row g-4">
  <!-- Card 1 -->
  <div class="col-12 col-sm-6 col-md-6">
    <a href="/bebangunangedung" style="text-decoration: none;">
      <div class="info-box shadow-lg rounded-3 p-4 d-flex flex-column align-items-center justify-content-center"
           style="background: #000080; color: white; transition: all 0.3s ease; height: 100%;">
        <div class="info-box-icon d-flex justify-content-center align-items-center mb-3 shadow-sm rounded-circle"
             style="background-color: #ffd100; width: 60px; height: 60px;">
          <i class="bi bi-file-earmark-check" style="font-size: 26px; color: green;"></i>
        </div>
        <div class="info-box-content text-center" style="font-family: 'Poppins', sans-serif;">
          <span class="info-box-text d-block text-white fw-semibold" style="font-size: 13px;">
            Data Bangunan Gedung Kabupaten Blora
          </span>
          <span class="info-box-number fw-bold mt-1" style="font-size: 16px;">
Berkas
          </span>
        </div>
      </div>
    </a>
  </div>
  </div>
 --}}
{{-- -------------------------------------------------------- --}}
{{-- <div class="row g-4">
  <div class="col-12 col-sm-6 col-md-6">
    <a href="/bebangunangedung" style="text-decoration: none;">
      <div class="info-box shadow-lg rounded-3 p-4 d-flex flex-column align-items-center justify-content-center"
           style="background: #000080; color: white; transition: all 0.3s ease; height: 100%;">
        <div class="info-box-icon d-flex justify-content-center align-items-center mb-3 shadow-sm rounded-circle"
             style="background-color: #ffd100; width: 60px; height: 60px;">
          <i class="bi bi-file-earmark-check" style="font-size: 26px; color: green;"></i>
        </div>
        <div class="info-box-content text-center" style="font-family: 'Poppins', sans-serif;">
          <span class="info-box-text d-block text-white fw-semibold" style="font-size: 13px;">
            Data Kepemilikan Bangunan Gedung
          </span>
          <span class="info-box-number fw-bold mt-1" style="font-size: 16px;">
Berkas
          </span>
        </div>
      </div>
    </a>
  </div>

  <!-- Card 2 -->
  <div class="col-12 col-sm-6 col-md-6">
    <a href="/bepbgslfindexslfper2" style="text-decoration: none;">
      <div class="info-box shadow-lg rounded-3 p-4 d-flex flex-column align-items-center justify-content-center"
           style="background: #000080; color: white; transition: all 0.3s ease; height: 100%;">
        <div class="info-box-icon d-flex justify-content-center align-items-center mb-3 shadow-sm rounded-circle"
             style="background-color: #ffd100; width: 60px; height: 60px;">
          <i class="bi bi-building" style="font-size: 26px; color: green;"></i>
        </div>
        <div class="info-box-content text-center" style="font-family: 'Poppins', sans-serif;">
          <span class="info-box-text d-block text-white fw-semibold" style="font-size: 13px;">
            Data Profil Tanah Bangunan Gedung
          </span>
          <span class="info-box-number fw-bold mt-1" style="font-size: 16px;">
           Berkas
          </span>
        </div>
      </div>
    </a>
  </div>

  <!-- Card 3 -->
  <div class="col-12 col-sm-6 col-md-6">
    <a href="/bepbgslfindexslfper3" style="text-decoration: none;">
      <div class="info-box shadow-lg rounded-3 p-4 d-flex flex-column align-items-center justify-content-center"
           style="background: #000080; color: white; transition: all 0.3s ease; height: 100%;">
        <div class="info-box-icon d-flex justify-content-center align-items-center mb-3 shadow-sm rounded-circle"
             style="background-color: #ffd100; width: 60px; height: 60px;">
          <i class="bi bi-award" style="font-size: 26px; color: green;"></i>
        </div>
        <div class="info-box-content text-center" style="font-family: 'Poppins', sans-serif;">
          <span class="info-box-text d-block text-white fw-semibold" style="font-size: 13px;">
          Data Profil Bangunan Gedung
          </span>
          <span class="info-box-number fw-bold mt-1" style="font-size: 16px;">
          Berkas
          </span>
        </div>
      </div>
    </a>
  </div>

  <!-- Card 4 -->
  <div class="col-12 col-sm-6 col-md-6">
    <a href="/bepbgslfindexslfper4" style="text-decoration: none;">
      <div class="info-box shadow-lg rounded-3 p-4 d-flex flex-column align-items-center justify-content-center"
           style="background: #000080; color: white; transition: all 0.3s ease; height: 100%;">
        <div class="info-box-icon d-flex justify-content-center align-items-center mb-3 shadow-sm rounded-circle"
             style="background-color: #ffd100; width: 60px; height: 60px;">
          <i class="bi bi-tools" style="font-size: 26px; color: green;"></i>
        </div>
        <div class="info-box-content text-center" style="font-family: 'Poppins', sans-serif;">
          <span class="info-box-text d-block text-white fw-semibold" style="font-size: 13px;">
            Klasifikasi Bangunan Gedung
          </span>
          <span class="info-box-number fw-bold mt-1" style="font-size: 16px;">
      Berkas
        </span>
        </div>
      </div>
    </a>
  </div>

  <!-- Card 5 -->
  <div class="col-12 col-sm-6 col-md-6">
    <a href="/bepbgslfindexslfper5" style="text-decoration: none;">
      <div class="info-box shadow-lg rounded-3 p-4 d-flex flex-column align-items-center justify-content-center"
           style="background: #000080; color: white; transition: all 0.3s ease; height: 100%;">
        <div class="info-box-icon d-flex justify-content-center align-items-center mb-3 shadow-sm rounded-circle"
             style="background-color: #ffd100; width: 60px; height: 60px;">
          <i class="bi bi-house-door" style="font-size: 26px; color: green;"></i>
        </div>
        <div class="info-box-content text-center" style="font-family: 'Poppins', sans-serif;">
          <span class="info-box-text d-block text-white fw-semibold" style="font-size: 13px;">
            Data Struktur Bangunan Gedung
          </span>
          <span class="info-box-number fw-bold mt-1" style="font-size: 16px;">
        Berkas
        </span>
        </div>
      </div>
    </a>
  </div>

  <div class="col-12 col-sm-6 col-md-6">
    <a href="/bepbgslfindexslfper5" style="text-decoration: none;">
      <div class="info-box shadow-lg rounded-3 p-4 d-flex flex-column align-items-center justify-content-center"
           style="background: #000080; color: white; transition: all 0.3s ease; height: 100%;">
        <div class="info-box-icon d-flex justify-content-center align-items-center mb-3 shadow-sm rounded-circle"
             style="background-color: #ffd100; width: 60px; height: 60px;">
          <i class="bi bi-house-door" style="font-size: 26px; color: green;"></i>
        </div>
        <div class="info-box-content text-center" style="font-family: 'Poppins', sans-serif;">
          <span class="info-box-text d-block text-white fw-semibold" style="font-size: 13px;">
            Data Status Bangunan Gedung
          </span>
          <span class="info-box-number fw-bold mt-1" style="font-size: 16px;">
        Berkas
        </span>
        </div>
      </div>
    </a>
  </div>
</div> --}}
  {{-- </div> --}}
<br><br><br><br>
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

              <!--begin::Row-->

          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->

          <!--end::App Content-->
      </main>
      <!--end::App Main-->


      @include('backend.00_administrator.00_baganterpisah.02_footer')
