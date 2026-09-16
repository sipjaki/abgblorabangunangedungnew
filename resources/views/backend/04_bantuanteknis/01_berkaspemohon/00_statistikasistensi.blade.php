@include('backend.00_administrator.00_baganterpisah.01_header')

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">

    @include('backend.00_administrator.00_baganterpisah.04_navbar')
    @include('backend.00_administrator.00_baganterpisah.09_button')
    @include('backend.00_administrator.00_baganterpisah.03_sidebar')
    @include('frontend.android.00_fiturmenu.06_alert')

    <main class="app-main" style="background: #ffffff; min-height: 100vh;">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    @include('backend.00_administrator.00_baganterpisah.10_selamatdatang')
                </div>
            </div>
        </div>

        <div class="container-fluid pb-4">

            {{-- ============ HEADER (putih + garis biru tipis) ============ --}}
            <div class="card mb-4"
                 style="border-radius: 14px; border: 1px solid #eef1f7; border-left: 5px solid #0a1f44; background:#fff;">
                <div class="card-body d-flex justify-content-between align-items-center flex-wrap">
                    <div>
                        <h4 class="mb-1" style="font-weight: 800; color:#0a1f44; letter-spacing:.3px;">
                            📊 Statistik Permohonan Asistensi
                        </h4>
                        <small style="color:#8a94ad;">Bantuan Teknis Bangunan Gedung — DPUPR Kab. Blora</small>
                    </div>
                    <a href="/bebantuanteknisassistensi" class="btn btn-sm fw-bold"
                       style="border-radius: 10px; background:#0a1f44; color:#fff; border:none;">
                        <i class="bi bi-folder2-open"></i> Data Permohonan
                    </a>
                </div>
            </div>

            {{-- ============ KARTU RINGKASAN (putih, angka warna-warni) ============ --}}
            <div class="row g-3 mb-4">
                @php
                    $cards = [
                        ['label' => 'Total Permohonan', 'value' => $totalPermohonan, 'icon' => 'bi-file-earmark-text', 'color' => '#2563eb'],
                        ['label' => 'Total Pemohon',    'value' => $totalPemohon,    'icon' => 'bi-people',            'color' => '#16a34a'],
                        ['label' => 'Kecamatan',        'value' => $totalKecamatan,  'icon' => 'bi-geo-alt',           'color' => '#ea580c'],
                        ['label' => 'Desa / Kelurahan', 'value' => $totalDesa,       'icon' => 'bi-house-door',        'color' => '#9333ea'],
                    ];
                @endphp

                @foreach ($cards as $c)
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100"
                             style="border-radius: 14px; border: 1px solid #eef1f7; background:#fff; box-shadow: 0 1px 3px rgba(0,0,0,.03);">
                            <div class="card-body d-flex align-items-center">
                                <div class="d-flex justify-content-center align-items-center me-3"
                                     style="width:54px;height:54px;border-radius:14px;background: {{ $c['color'] }}12; color: {{ $c['color'] }}; font-size:24px;">
                                    <i class="bi {{ $c['icon'] }}"></i>
                                </div>
                                <div>
                                    <div style="font-size:12px;color:#8a94ad;font-weight:600;letter-spacing:.5px;text-transform:uppercase;">
                                        {{ $c['label'] }}
                                    </div>
                                    <div style="font-size:26px;font-weight:800;color: {{ $c['color'] }};line-height:1.1;">
                                        {{ number_format($c['value'], 0, ',', '.') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- ============ STATISTIK LUAS BANGUNAN ============ --}}
            @if($luasStats && $luasStats->jumlah)
            <div class="row g-3 mb-4">
                @php
                    $luasCards = [
                        ['label' => 'Total Luas (m²)',     'value' => number_format($luasStats->total ?? 0, 2, ',', '.'), 'icon' => 'bi-rulers',     'color' => '#0891b2'],
                        ['label' => 'Rata-rata Luas (m²)', 'value' => number_format($luasStats->rata ?? 0, 2, ',', '.'),  'icon' => 'bi-bar-chart',  'color' => '#7c3aed'],
                        ['label' => 'Luas Terkecil (m²)',  'value' => number_format($luasStats->min ?? 0, 2, ',', '.'),   'icon' => 'bi-arrow-down', 'color' => '#dc2626'],
                        ['label' => 'Luas Terbesar (m²)',  'value' => number_format($luasStats->max ?? 0, 2, ',', '.'),   'icon' => 'bi-arrow-up',   'color' => '#16a34a'],
                    ];
                @endphp
                @foreach ($luasCards as $c)
                    <div class="col-md-6 col-lg-3">
                        <div class="card h-100"
                             style="border-radius: 14px; border: 1px solid #eef1f7; background:#fff; box-shadow: 0 1px 3px rgba(0,0,0,.03);">
                            <div class="card-body d-flex align-items-center">
                                <div class="d-flex justify-content-center align-items-center me-3"
                                     style="width:54px;height:54px;border-radius:14px;background: {{ $c['color'] }}12; color: {{ $c['color'] }}; font-size:24px;">
                                    <i class="bi {{ $c['icon'] }}"></i>
                                </div>
                                <div>
                                    <div style="font-size:12px;color:#8a94ad;font-weight:600;letter-spacing:.5px;text-transform:uppercase;">
                                        {{ $c['label'] }}
                                    </div>
                                    <div style="font-size:22px;font-weight:800;color: {{ $c['color'] }};line-height:1.1;">
                                        {{ $c['value'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            @endif

            {{-- ============ CHART KATEGORI & KEPEMILIKAN ============ --}}
            <div class="row g-3 mb-4">
                <div class="col-lg-7">
                    <div class="card h-100" style="border-radius: 14px; border: 1px solid #eef1f7; background:#fff;">
                        <div class="card-header bg-white border-0 pt-3 pb-0">
                            <h6 class="fw-bold mb-0" style="color:#0a1f44;">🏗️ Permohonan per Kategori Bangunan</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="chartKategori" height="140"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card h-100" style="border-radius: 14px; border: 1px solid #eef1f7; background:#fff;">
                        <div class="card-header bg-white border-0 pt-3 pb-0">
                            <h6 class="fw-bold mb-0" style="color:#0a1f44;">🏠 Permohonan per Kepemilikan</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="chartKepemilikan" height="140"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ============ CHART TAHUN PEMBANGUNAN & RENOVASI ============ --}}
            <div class="row g-3 mb-4">
                <div class="col-lg-6">
                    <div class="card h-100" style="border-radius: 14px; border: 1px solid #eef1f7; background:#fff;">
                        <div class="card-header bg-white border-0 pt-3 pb-0">
                            <h6 class="fw-bold mb-0" style="color:#0a1f44;">📅 Tren Tahun Pembangunan</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="chartTahun" height="120"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card h-100" style="border-radius: 14px; border: 1px solid #eef1f7; background:#fff;">
                        <div class="card-header bg-white border-0 pt-3 pb-0">
                            <h6 class="fw-bold mb-0" style="color:#0a1f44;">🔧 Tren Tahun Renovasi</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="chartTahunRenovasi" height="120"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ============ TOP KECAMATAN & DESA ============ --}}
            <div class="row g-3 mb-4">
                <div class="col-lg-6">
                    <div class="card h-100" style="border-radius: 14px; border: 1px solid #eef1f7; background:#fff;">
                        <div class="card-header bg-white border-0 pt-3 pb-0">
                            <h6 class="fw-bold mb-0" style="color:#0a1f44;">📍 Top 10 Kecamatan</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="chartKecamatan" height="180"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card h-100" style="border-radius: 14px; border: 1px solid #eef1f7; background:#fff;">
                        <div class="card-header bg-white border-0 pt-3 pb-0">
                            <h6 class="fw-bold mb-0" style="color:#0a1f44;">🏘️ Top 10 Desa / Kelurahan</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="chartDesa" height="180"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ============ CHART LANTAI & BASEMENT ============ --}}
            <div class="row g-3 mb-4">
                <div class="col-lg-7">
                    <div class="card h-100" style="border-radius: 14px; border: 1px solid #eef1f7; background:#fff;">
                        <div class="card-header bg-white border-0 pt-3 pb-0">
                            <h6 class="fw-bold mb-0" style="color:#0a1f44;">🏢 Distribusi Jumlah Lantai</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="chartLantai" height="120"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card h-100" style="border-radius: 14px; border: 1px solid #eef1f7; background:#fff;">
                        <div class="card-header bg-white border-0 pt-3 pb-0">
                            <h6 class="fw-bold mb-0" style="color:#0a1f44;">⬇️ Ketersediaan Basement</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="chartBasement" height="120"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ============ TABEL: DINAS & KONSULTAN (putih) ============ --}}
            <div class="row g-3 mb-4">
                <div class="col-lg-6">
                    <div class="card h-100" style="border-radius: 14px; border: 1px solid #eef1f7; background:#fff;">
                        <div class="card-header bg-white border-0 pt-3 pb-0">
                            <h6 class="fw-bold mb-0" style="color:#0a1f44;">🏛️ Permohonan per Dinas</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 align-middle">
                                    <thead style="background:#f8fafc;">
                                        <tr>
                                            <th style="padding:12px 16px; color:#0a1f44; border-bottom:2px solid #0a1f44;">Dinas</th>
                                            <th class="text-end" style="padding:12px 16px; color:#0a1f44; border-bottom:2px solid #0a1f44;">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($perDinas as $row)
                                            <tr>
                                                <td style="padding:10px 16px;">{{ $row->nama ?? '-' }}</td>
                                                <td class="text-end fw-bold" style="padding:10px 16px; color:#2563eb;">
                                                    {{ number_format($row->total, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="2" class="text-center text-muted py-3">Belum ada data</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card h-100" style="border-radius: 14px; border: 1px solid #eef1f7; background:#fff;">
                        <div class="card-header bg-white border-0 pt-3 pb-0">
                            <h6 class="fw-bold mb-0" style="color:#0a1f44;">🧑‍💼 Permohonan per Konsultan</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 align-middle">
                                    <thead style="background:#f8fafc;">
                                        <tr>
                                            <th style="padding:12px 16px; color:#0a1f44; border-bottom:2px solid #0a1f44;">Konsultan</th>
                                            <th class="text-end" style="padding:12px 16px; color:#0a1f44; border-bottom:2px solid #0a1f44;">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($perKonsultan as $row)
                                            <tr>
                                                <td style="padding:10px 16px;">{{ $row->nama ?? '-' }}</td>
                                                <td class="text-end fw-bold" style="padding:10px 16px; color:#16a34a;">
                                                    {{ number_format($row->total, 0, ',', '.') }}
                                                </td>
                                            </tr>
                                        @empty
                                            <tr><td colspan="2" class="text-center text-muted py-3">Belum ada data</td></tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
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
    const navy = '#0a1f44';
    // Palet warna-warni cerah
    const rainbow = ['#2563eb','#16a34a','#ea580c','#9333ea','#0891b2','#dc2626','#ca8a04','#db2777','#0d9488','#7c3aed','#f59e0b','#84cc16'];

    Chart.defaults.font.family = "'Segoe UI', Tahoma, sans-serif";
    Chart.defaults.color = '#4a5670';

    // Bar - Kategori Bangunan (warna-warni per bar)
    new Chart(document.getElementById('chartKategori'), {
        type: 'bar',
        data: {
            labels: @json($perKategori->pluck('kategoribangunan')),
            datasets: [{
                label: 'Jumlah',
                data: @json($perKategori->pluck('total')),
                backgroundColor: rainbow,
                borderRadius: 8,
                maxBarThickness: 50
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { color: '#eef1f7' } },
                x: { grid: { display: false } }
            }
        }
    });

    // Doughnut - Kepemilikan (warna-warni)
    new Chart(document.getElementById('chartKepemilikan'), {
        type: 'doughnut',
        data: {
            labels: @json($perKepemilikan->pluck('kepemilikan')),
            datasets: [{
                data: @json($perKepemilikan->pluck('total')),
                backgroundColor: rainbow,
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            plugins: { legend: { position: 'bottom', labels: { boxWidth: 12, padding: 10 } } },
            cutout: '60%'
        }
    });

    // Line - Tahun Pembangunan (biru aksen, tipis)
    new Chart(document.getElementById('chartTahun'), {
        type: 'line',
        data: {
            labels: @json($perTahun->pluck('tahun')),
            datasets: [{
                label: 'Jumlah',
                data: @json($perTahun->pluck('total')),
                borderColor: '#2563eb',
                backgroundColor: 'rgba(37,99,235,0.08)',
                fill: true,
                tension: 0.35,
                pointBackgroundColor: '#2563eb',
                pointRadius: 5,
                borderWidth: 3
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { color: '#eef1f7' } },
                x: { grid: { display: false } }
            }
        }
    });

    // Line - Tahun Renovasi
    new Chart(document.getElementById('chartTahunRenovasi'), {
        type: 'line',
        data: {
            labels: @json($perTahunRenovasi->pluck('tahun')),
            datasets: [{
                label: 'Jumlah',
                data: @json($perTahunRenovasi->pluck('total')),
                borderColor: '#16a34a',
                backgroundColor: 'rgba(22,163,74,0.08)',
                fill: true,
                tension: 0.35,
                pointBackgroundColor: '#16a34a',
                pointRadius: 5,
                borderWidth: 3
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { color: '#eef1f7' } },
                x: { grid: { display: false } }
            }
        }
    });

    // Horizontal Bar - Kecamatan (warna-warni)
    new Chart(document.getElementById('chartKecamatan'), {
        type: 'bar',
        data: {
            labels: @json($perKecamatan->pluck('nama')),
            datasets: [{
                label: 'Jumlah',
                data: @json($perKecamatan->pluck('total')),
                backgroundColor: rainbow,
                borderRadius: 6
            }]
        },
        options: {
            indexAxis: 'y',
            plugins: { legend: { display: false } },
            scales: {
                x: { beginAtZero: true, grid: { color: '#eef1f7' } },
                y: { grid: { display: false } }
            }
        }
    });

    // Horizontal Bar - Desa (warna-warni)
    new Chart(document.getElementById('chartDesa'), {
        type: 'bar',
        data: {
            labels: @json($perDesa->pluck('nama')),
            datasets: [{
                label: 'Jumlah',
                data: @json($perDesa->pluck('total')),
                backgroundColor: rainbow,
                borderRadius: 6
            }]
        },
        options: {
            indexAxis: 'y',
            plugins: { legend: { display: false } },
            scales: {
                x: { beginAtZero: true, grid: { color: '#eef1f7' } },
                y: { grid: { display: false } }
            }
        }
    });

    // Bar - Jumlah Lantai (warna-warni)
    new Chart(document.getElementById('chartLantai'), {
        type: 'bar',
        data: {
            labels: @json($perLantai->pluck('jumlahlantai')),
            datasets: [{
                label: 'Jumlah',
                data: @json($perLantai->pluck('total')),
                backgroundColor: rainbow,
                borderRadius: 8,
                maxBarThickness: 60
            }]
        },
        options: {
            plugins: { legend: { display: false } },
            scales: {
                y: { beginAtZero: true, grid: { color: '#eef1f7' } },
                x: { grid: { display: false } }
            }
        }
    });

    // Pie - Basement (warna kontras)
    new Chart(document.getElementById('chartBasement'), {
        type: 'pie',
        data: {
            labels: @json($perBasement->map(fn($i) => $i->bassement ? 'Ada Basement' : 'Tanpa Basement')),
            datasets: [{
                data: @json($perBasement->pluck('total')),
                backgroundColor: ['#2563eb', '#f59e0b'],
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            plugins: { legend: { position: 'bottom', labels: { boxWidth: 12, padding: 10 } } }
        }
    });
</script>
</body>
</html>