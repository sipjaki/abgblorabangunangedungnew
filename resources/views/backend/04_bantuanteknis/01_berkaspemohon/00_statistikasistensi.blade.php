@include('backend.00_administrator.00_baganterpisah.01_header')

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">

    @include('backend.00_administrator.00_baganterpisah.04_navbar')
    @include('backend.00_administrator.00_baganterpisah.09_button')
    @include('backend.00_administrator.00_baganterpisah.03_sidebar')
    @include('frontend.android.00_fiturmenu.06_alert')

    <main class="app-main" style="background:#fff; min-height:100vh;">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    @include('backend.00_administrator.00_baganterpisah.10_selamatdatang')
                </div>
            </div>
        </div>

        {{-- CSS COMPACT --}}
        <style>
            .stat-wrap { padding: 10px 14px 20px; }
            .stat-title {
                font-size: 14px; font-weight: 800; color:#0a1f44;
                padding: 8px 12px; border-left: 4px solid #0a1f44;
                background:#fff; border-radius: 6px; margin-bottom: 10px;
                display:flex; justify-content:space-between; align-items:center;
            }
            .stat-title small { font-weight:500; color:#8a94ad; font-size:11px; }

            .mini-card {
                border:1px solid #eef1f7; border-radius:10px; background:#fff;
                padding:8px 10px; height:100%;
            }
            .mini-card .lbl {
                font-size:10px; color:#8a94ad; font-weight:600;
                text-transform:uppercase; letter-spacing:.3px;
            }
            .mini-card .val {
                font-size:16px; font-weight:800; line-height:1.1; margin-top:2px;
            }
            .mini-card .ico {
                width:34px; height:34px; border-radius:9px;
                display:flex; align-items:center; justify-content:center;
                font-size:16px;
            }

            .chart-card {
                border:1px solid #eef1f7; border-radius:10px; background:#fff;
                padding:8px 10px 6px;
            }
            .chart-card h6 {
                font-size:11.5px; font-weight:700; color:#0a1f44;
                margin:0 0 6px 0;
            }
            .chart-card .chart-box { height: 130px; position: relative; }
            .chart-card .chart-box.tall { height: 160px; }
            .chart-card .chart-box.short { height: 110px; }

            .mini-table { font-size:11.5px; margin:0; }
            .mini-table thead th {
                font-size:10.5px; color:#0a1f44; background:#f8fafc;
                border-bottom:2px solid #0a1f44; padding:6px 8px;
                text-transform:uppercase; letter-spacing:.3px;
            }
            .mini-table tbody td { padding:5px 8px; border-color:#f1f4f9; }
        </style>

        <div class="stat-wrap">

            {{-- ============ HEADER COMPACT ============ --}}
            <div class="stat-title">
                <span>📊 Statistik Permohonan Asistensi Bantuan Teknis</span>
                <div class="d-flex align-items-center gap-2">
                    <small>DPUPR Kab. Blora</small>
                    <a href="/bebantuanteknisassistensi"
                       style="background:#0a1f44; color:#fff; font-size:11px; font-weight:600;
                              padding:4px 10px; border-radius:7px; text-decoration:none;">
                        <i class="bi bi-folder2-open"></i> Data
                    </a>
                </div>
            </div>

            {{-- ============ KARTU RINGKASAN ============ --}}
            <div class="row g-2 mb-2">
                @php
                    $cards = [
                        ['Total Permohonan', $totalPermohonan, 'bi-file-earmark-text', '#2563eb'],
                        ['Total Pemohon',    $totalPemohon,    'bi-people',            '#16a34a'],
                        ['Kecamatan',        $totalKecamatan,  'bi-geo-alt',           '#ea580c'],
                        ['Desa/Kelurahan',   $totalDesa,       'bi-house-door',        '#9333ea'],
                    ];
                @endphp
                @foreach ($cards as [$lbl,$val,$ico,$col])
                    <div class="col-6 col-md-3">
                        <div class="mini-card d-flex align-items-center gap-2">
                            <div class="ico" style="background: {{ $col }}15; color: {{ $col }};">
                                <i class="bi {{ $ico }}"></i>
                            </div>
                            <div>
                                <div class="lbl">{{ $lbl }}</div>
                                <div class="val" style="color: {{ $col }};">
                                    {{ number_format($val, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- ============ STATISTIK LUAS ============ --}}
            @if($luasStats && $luasStats->jumlah)
            <div class="row g-2 mb-2">
                @php
                    $luasCards = [
                        ['Total Luas (m²)',     number_format($luasStats->total ?? 0, 2, ',', '.'), 'bi-rulers',     '#0891b2'],
                        ['Rata-rata (m²)',      number_format($luasStats->rata ?? 0, 2, ',', '.'),  'bi-bar-chart',  '#7c3aed'],
                        ['Terkecil (m²)',       number_format($luasStats->min ?? 0, 2, ',', '.'),   'bi-arrow-down', '#dc2626'],
                        ['Terbesar (m²)',       number_format($luasStats->max ?? 0, 2, ',', '.'),   'bi-arrow-up',   '#16a34a'],
                    ];
                @endphp
                @foreach ($luasCards as [$lbl,$val,$ico,$col])
                    <div class="col-6 col-md-3">
                        <div class="mini-card d-flex align-items-center gap-2">
                            <div class="ico" style="background: {{ $col }}15; color: {{ $col }};">
                                <i class="bi {{ $ico }}"></i>
                            </div>
                            <div>
                                <div class="lbl">{{ $lbl }}</div>
                                <div class="val" style="color: {{ $col }};">{{ $val }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif

            {{-- ============ ROW CHART 1 ============ --}}
            <div class="row g-2 mb-2">
                <div class="col-lg-7">
                    <div class="chart-card h-100">
                        <h6>🏗️ Kategori Bangunan</h6>
                        <div class="chart-box"><canvas id="chartKategori"></canvas></div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="chart-card h-100">
                        <h6>🏠 Kepemilikan</h6>
                        <div class="chart-box"><canvas id="chartKepemilikan"></canvas></div>
                    </div>
                </div>
            </div>

            {{-- ============ ROW CHART 2 ============ --}}
            <div class="row g-2 mb-2">
                <div class="col-lg-6">
                    <div class="chart-card h-100">
                        <h6>📅 Tren Tahun Pembangunan</h6>
                        <div class="chart-box short"><canvas id="chartTahun"></canvas></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="chart-card h-100">
                        <h6>🔧 Tren Tahun Renovasi</h6>
                        <div class="chart-box short"><canvas id="chartTahunRenovasi"></canvas></div>
                    </div>
                </div>
            </div>

            {{-- ============ ROW CHART 3 ============ --}}
            <div class="row g-2 mb-2">
                <div class="col-lg-6">
                    <div class="chart-card h-100">
                        <h6>📍 Top 10 Kecamatan</h6>
                        <div class="chart-box tall"><canvas id="chartKecamatan"></canvas></div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="chart-card h-100">
                        <h6>🏘️ Top 10 Desa/Kelurahan</h6>
                        <div class="chart-box tall"><canvas id="chartDesa"></canvas></div>
                    </div>
                </div>
            </div>

            {{-- ============ ROW CHART 4 ============ --}}
            <div class="row g-2 mb-2">
                <div class="col-lg-7">
                    <div class="chart-card h-100">
                        <h6>🏢 Distribusi Jumlah Lantai</h6>
                        <div class="chart-box short"><canvas id="chartLantai"></canvas></div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="chart-card h-100">
                        <h6>⬇️ Ketersediaan Basement</h6>
                        <div class="chart-box short"><canvas id="chartBasement"></canvas></div>
                    </div>
                </div>
            </div>

            {{-- ============ TABEL COMPACT ============ --}}
            <div class="row g-2 mb-2">
                <div class="col-lg-6">
                    <div class="chart-card h-100">
                        <h6>🏛️ Permohonan per Dinas</h6>
                        <div class="table-responsive" style="max-height:220px; overflow:auto;">
                            <table class="table mini-table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>Dinas</th>
                                        <th class="text-end">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($perDinas as $row)
                                        <tr>
                                            <td>{{ $row->nama ?? '-' }}</td>
                                            <td class="text-end fw-bold" style="color:#2563eb;">
                                                {{ number_format($row->total, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="2" class="text-center text-muted py-2">Belum ada data</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="chart-card h-100">
                        <h6>🧑‍💼 Permohonan per Konsultan</h6>
                        <div class="table-responsive" style="max-height:220px; overflow:auto;">
                            <table class="table mini-table table-hover align-middle">
                                <thead>
                                    <tr>
                                        <th>Konsultan</th>
                                        <th class="text-end">Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($perKonsultan as $row)
                                        <tr>
                                            <td>{{ $row->nama ?? '-' }}</td>
                                            <td class="text-end fw-bold" style="color:#16a34a;">
                                                {{ number_format($row->total, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @empty
                                        <tr><td colspan="2" class="text-center text-muted py-2">Belum ada data</td></tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>
</div>

@include('backend.00_administrator.00_baganterpisah.02_footer')

{{-- ============ CHART.JS ============ --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.1/dist/chart.umd.min.js"></script>
<script>
    const rainbow = ['#2563eb','#16a34a','#ea580c','#9333ea','#0891b2','#dc2626','#ca8a04','#db2777','#0d9488','#7c3aed','#f59e0b','#84cc16'];

    Chart.defaults.font.family = "'Segoe UI', Tahoma, sans-serif";
    Chart.defaults.font.size = 10;
    Chart.defaults.color = '#4a5670';

    const opts = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: { legend: { display: false } },
        scales: {
            y: { beginAtZero: true, grid: { color: '#f1f4f9' }, ticks: { font: { size: 9 } } },
            x: { grid: { display: false }, ticks: { font: { size: 9 } } }
        }
    };

    // Kategori
    new Chart(document.getElementById('chartKategori'), {
        type: 'bar',
        data: {
            labels: @json($perKategori->pluck('kategoribangunan')),
            datasets: [{
                data: @json($perKategori->pluck('total')),
                backgroundColor: rainbow,
                borderRadius: 5,
                maxBarThickness: 26
            }]
        },
        options: opts
    });

    // Kepemilikan
    new Chart(document.getElementById('chartKepemilikan'), {
        type: 'doughnut',
        data: {
            labels: @json($perKepemilikan->pluck('kepemilikan')),
            datasets: [{
                data: @json($perKepemilikan->pluck('total')),
                backgroundColor: rainbow,
                borderWidth: 1.5,
                borderColor: '#fff'
            }]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            cutout: '58%',
            plugins: {
                legend: { position:'right', labels:{ boxWidth:9, padding:6, font:{ size:9 } } }
            }
        }
    });

    // Tahun Pembangunan
    new Chart(document.getElementById('chartTahun'), {
        type: 'line',
        data: {
            labels: @json($perTahun->pluck('tahun')),
            datasets: [{
                data: @json($perTahun->pluck('total')),
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37,99,235,0.08)',
                fill: true, tension: 0.35,
                pointBackgroundColor: '#2563eb',
                pointRadius: 3, borderWidth: 2
            }]
        },
        options: opts
    });

    // Tahun Renovasi
    new Chart(document.getElementById('chartTahunRenovasi'), {
        type: 'line',
        data: {
            labels: @json($perTahunRenovasi->pluck('tahun')),
            datasets: [{
                data: @json($perTahunRenovasi->pluck('total')),
                borderColor: '#16a34a',
                backgroundColor: 'rgba(22,163,74,0.08)',
                fill: true, tension: 0.35,
                pointBackgroundColor: '#16a34a',
                pointRadius: 3, borderWidth: 2
            }]
        },
        options: opts
    });

    // Kecamatan
    new Chart(document.getElementById('chartKecamatan'), {
        type: 'bar',
        data: {
            labels: @json($perKecamatan->pluck('nama')),
            datasets: [{
                data: @json($perKecamatan->pluck('total')),
                backgroundColor: rainbow,
                borderRadius: 4
            }]
        },
        options: Object.assign({}, opts, {
            indexAxis: 'y',
            scales: {
                x: { beginAtZero: true, grid: { color: '#f1f4f9' }, ticks: { font: { size: 9 } } },
                y: { grid: { display: false }, ticks: { font: { size: 9 } } }
            }
        })
    });

    // Desa
    new Chart(document.getElementById('chartDesa'), {
        type: 'bar',
        data: {
            labels: @json($perDesa->pluck('nama')),
            datasets: [{
                data: @json($perDesa->pluck('total')),
                backgroundColor: rainbow,
                borderRadius: 4
            }]
        },
        options: Object.assign({}, opts, {
            indexAxis: 'y',
            scales: {
                x: { beginAtZero: true, grid: { color: '#f1f4f9' }, ticks: { font: { size: 9 } } },
                y: { grid: { display: false }, ticks: { font: { size: 9 } } }
            }
        })
    });

    // Lantai
    new Chart(document.getElementById('chartLantai'), {
        type: 'bar',
        data: {
            labels: @json($perLantai->pluck('jumlahlantai')),
            datasets: [{
                data: @json($perLantai->pluck('total')),
                backgroundColor: rainbow,
                borderRadius: 5,
                maxBarThickness: 30
            }]
        },
        options: opts
    });

    // Basement
    new Chart(document.getElementById('chartBasement'), {
        type: 'pie',
        data: {
            labels: @json($perBasement->map(fn($i) => $i->bassement ? 'Ada' : 'Tanpa')),
            datasets: [{
                data: @json($perBasement->pluck('total')),
                backgroundColor: ['#2563eb','#f59e0b'],
                borderWidth: 1.5, borderColor: '#fff'
            }]
        },
        options: {
            responsive: true, maintainAspectRatio: false,
            plugins: { legend: { position:'right', labels:{ boxWidth:9, padding:6, font:{ size:9 } } } }
        }
    });
</script>
</body>
</html>