@include('backend.00_administrator.00_baganterpisah.01_header')

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">

    @include('backend.00_administrator.00_baganterpisah.04_navbar')
    @include('backend.00_administrator.00_baganterpisah.09_button')
    @include('backend.00_administrator.00_baganterpisah.03_sidebar')
    @include('frontend.android.00_fiturmenu.06_alert')

    <main class="app-main" style="background: #f4f6fb; min-height: 100vh;">
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    @include('backend.00_administrator.00_baganterpisah.10_selamatdatang')
                </div>
            </div>
        </div>

        <div class="container-fluid pb-4">

            {{-- ============ HEADER ============ --}}
            <div class="card border-0 shadow-sm mb-4" style="border-radius: 14px; overflow: hidden;">
                <div class="card-body d-flex justify-content-between align-items-center flex-wrap"
                     style="background: linear-gradient(135deg, #0a1f44 0%, #123a7a 100%); color: #fff;">
                    <div>
                        <h4 class="mb-1" style="font-weight: 800; letter-spacing: .3px;">
                            📊 Statistik Permohonan Asistensi
                        </h4>
                        <small style="opacity:.85;">Bantuan Teknis Bangunan Gedung — DPUPR Kab. Blora</small>
                    </div>
                    <a href="/bebantuanteknisassistensi" class="btn btn-light btn-sm fw-bold"
                       style="border-radius: 10px;">
                        <i class="bi bi-folder2-open"></i> Data Permohonan
                    </a>
                </div>
            </div>

            {{-- ============ KARTU RINGKASAN ============ --}}
            <div class="row g-3 mb-4">
                @php
                    $cards = [
                        ['label' => 'Total Permohonan', 'value' => $totalPermohonan, 'icon' => 'bi-file-earmark-text', 'bg' => '#0a1f44'],
                        ['label' => 'Total Pemohon',    'value' => $totalPemohon,    'icon' => 'bi-people',            'bg' => '#123a7a'],
                        ['label' => 'Kecamatan',        'value' => $totalKecamatan,  'icon' => 'bi-geo-alt',           'bg' => '#1e4fa3'],
                        ['label' => 'Desa / Kelurahan', 'value' => $totalDesa,       'icon' => 'bi-house-door',        'bg' => '#2a63c4'],
                    ];
                @endphp

                @foreach ($cards as $c)
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm h-100" style="border-radius: 14px;">
                            <div class="card-body d-flex align-items-center">
                                <div class="d-flex justify-content-center align-items-center me-3"
                                     style="width:56px;height:56px;border-radius:14px;background: {{ $c['bg'] }}; color:#fff; font-size:24px;">
                                    <i class="bi {{ $c['icon'] }}"></i>
                                </div>
                                <div>
                                    <div style="font-size:12px;color:#6b7a99;font-weight:600;letter-spacing:.5px;text-transform:uppercase;">
                                        {{ $c['label'] }}
                                    </div>
                                    <div style="font-size:26px;font-weight:800;color:#0a1f44;line-height:1.1;">
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
                        ['label' => 'Total Luas (m²)',      'value' => number_format($luasStats->total ?? 0, 2, ',', '.'), 'icon' => 'bi-rulers',        'bg' => '#0a1f44'],
                        ['label' => 'Rata-rata Luas (m²)',  'value' => number_format($luasStats->rata ?? 0, 2, ',', '.'), 'icon' => 'bi-bar-chart',     'bg' => '#123a7a'],
                        ['label' => 'Luas Terkecil (m²)',   'value' => number_format($luasStats->min ?? 0, 2, ',', '.'),  'icon' => 'bi-arrow-down',    'bg' => '#1e4fa3'],
                        ['label' => 'Luas Terbesar (m²)',   'value' => number_format($luasStats->max ?? 0, 2, ',', '.'),  'icon' => 'bi-arrow-up',      'bg' => '#2a63c4'],
                    ];
                @endphp
                @foreach ($luasCards as $c)
                    <div class="col-md-6 col-lg-3">
                        <div class="card border-0 shadow-sm h-100" style="border-radius: 14px;">
                            <div class="card-body d-flex align-items-center">
                                <div class="d-flex justify-content-center align-items-center me-3"
                                     style="width:56px;height:56px;border-radius:14px;background: {{ $c['bg'] }}; color:#fff; font-size:24px;">
                                    <i class="bi {{ $c['icon'] }}"></i>
                                </div>
                                <div>
                                    <div style="font-size:12px;color:#6b7a99;font-weight:600;letter-spacing:.5px;text-transform:uppercase;">
                                        {{ $c['label'] }}
                                    </div>
                                    <div style="font-size:22px;font-weight:800;color:#0a1f44;line-height:1.1;">
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
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 14px;">
                        <div class="card-header bg-white border-0 pt-3 pb-0">
                            <h6 class="fw-bold mb-0" style="color:#0a1f44;">🏗️ Permohonan per Kategori Bangunan</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="chartKategori" height="140"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 14px;">
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
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 14px;">
                        <div class="card-header bg-white border-0 pt-3 pb-0">
                            <h6 class="fw-bold mb-0" style="color:#0a1f44;">📅 Tren Tahun Pembangunan</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="chartTahun" height="120"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 14px;">
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
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 14px;">
                        <div class="card-header bg-white border-0 pt-3 pb-0">
                            <h6 class="fw-bold mb-0" style="color:#0a1f44;">📍 Top 10 Kecamatan</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="chartKecamatan" height="180"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 14px;">
                        <div class="card-header bg-white border-0 pt-3 pb-0">
                            <h6 class="fw-bold mb-0" style="color:#0a1f44;">🏘️ Top 10 Desa / Kelurahan</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="chartDesa" height="180"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ============ CHART JUMLAH LANTAI & BASEMENT ============ --}}
            <div class="row g-3 mb-4">
                <div class="col-lg-7">
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 14px;">
                        <div class="card-header bg-white border-0 pt-3 pb-0">
                            <h6 class="fw-bold mb-0" style="color:#0a1f44;">🏢 Distribusi Jumlah Lantai</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="chartLantai" height="120"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 14px;">
                        <div class="card-header bg-white border-0 pt-3 pb-0">
                            <h6 class="fw-bold mb-0" style="color:#0a1f44;">⬇️ Ketersediaan Basement</h6>
                        </div>
                        <div class="card-body">
                            <canvas id="chartBasement" height="120"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ============ TABEL: DINAS & KONSULTAN ============ --}}
            <div class="row g-3 mb-4">
                <div class="col-lg-6">
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 14px;">
                        <div class="card-header bg-white border-0 pt-3 pb-0">
                            <h6 class="fw-bold mb-0" style="color:#0a1f44;">🏛️ Permohonan per Dinas</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 align-middle">
                                    <thead style="background:#0a1f44; color:#fff;">
                                        <tr>
                                            <th style="padding:12px 16px;">Dinas</th>
                                            <th class="text-end" style="padding:12px 16px;">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($perDinas as $row)
                                            <tr>
                                                <td style="padding:10px 16px;">{{ $row->nama ?? '-' }}</td>
                                                <td class="text-end fw-bold" style="padding:10px 16px;color:#0a1f44;">
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
                    <div class="card border-0 shadow-sm h-100" style="border-radius: 14px;">
                        <div class="card-header bg-white border-0 pt-3 pb-0">
                            <h6 class="fw-bold mb-0" style="color:#0a1f44;">🧑‍💼 Permohonan per Konsultan</h6>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table table-hover mb-0 align-middle">
                                    <thead style="background:#0a1f44; color:#fff;">
                                        <tr>
                                            <th style="padding:12px 16px;">Konsultan</th>
                                            <th class="text-end" style="padding:12px 16px;">Jumlah</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($perKonsultan as $row)
                                            <tr>
                                                <td style="padding:10px 16px;">{{ $row->nama ?? '-' }}</td>
                                                <td class="text-end fw-bold" style="padding:10px 16px;color:#0a1f44;">
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
    const navyLight = '#2a63c4';
    const palette = ['#0a1f44','#123a7a','#1e4fa3','#2a63c4','#3b7ddd','#5b9bf0','#7fb4f5','#a3cbfa','#c7defc','#e3eefd'];

    Chart.defaults.font.family = "'Segoe UI', Tahoma, sans-serif";
    Chart.defaults.color = '#4a5670';

    // Bar - Kategori
    new Chart(document.getElementById('chartKategori'), {
        type: 'bar',
        data: {
            labels: @json($perKategori->pluck('kategoribangunan')),
            datasets: [{
                label: 'Jumlah',
                data: @json($perKategori->pluck('total')),
                backgroundColor: navy,
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

    // Doughnut - Kepemilikan
    new Chart(document.getElementById('chartKepemilikan'), {
        type: 'doughnut',
        data: {
            labels: @json($perKepemilikan->pluck('kepemilikan')),
            datasets: [{
                data: @json($perKepemilikan->pluck('total')),
                backgroundColor: palette,
                borderWidth: 2,
                borderColor: '#fff'
            }]
        },
        options: {
            plugins: { legend: { position: 'bottom', labels: { boxWidth: 12, padding: 10 } } },
            cutout: '60%'
        }
    });

    // Line - Tahun Pembangunan
    new Chart(document.getElementById('chartTahun'), {
        type: 'line',
        data: {
            labels: @json($perTahun->pluck('tahun')),
            datasets: [{
                label: 'Jumlah',
                data: @json($perTahun->pluck('total')),
                borderColor: navy,
                backgroundColor: 'rgba(10,31,68,0.08)',
                fill: true,
                tension: 0.35,
                pointBackgroundColor: navy,
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
                borderColor: navyLight,
                backgroundColor: 'rgba(42,99,196,0.08)',
                fill: true,
                tension: 0.35,
                pointBackgroundColor: navyLight,
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

    // Horizontal Bar - Kecamatan
    new Chart(document.getElementById('chartKecamatan'), {
        type: 'bar',
        data: {
            labels: @json($perKecamatan->pluck('nama')),
            datasets: [{
                label: 'Jumlah',
                data: @json($perKecamatan->pluck('total')),
                backgroundColor: navyLight,
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

    // Horizontal Bar - Desa
    new Chart(document.getElementById('chartDesa'), {
        type: 'bar',
        data: {
            labels: @json($perDesa->pluck('nama')),
            datasets: [{
                label: 'Jumlah',
                data: @json($perDesa->pluck('total')),
                backgroundColor: navy,
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

    // Bar - Jumlah Lantai
    new Chart(document.getElementById('chartLantai'), {
        type: 'bar',
        data: {
            labels: @json($perLantai->pluck('jumlahlantai')),
            datasets: [{
                label: 'Jumlah',
                data: @json($perLantai->pluck('total')),
                backgroundColor: navy,
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

    // Pie - Basement
    new Chart(document.getElementById('chartBasement'), {
        type: 'pie',
        data: {
            labels: @json($perBasement->map(fn($i) => $i->bassement ? 'Ada Basement' : 'Tanpa Basement')),
            datasets: [{
                data: @json($perBasement->pluck('total')),
                backgroundColor: [navy, '#7fb4f5'],
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