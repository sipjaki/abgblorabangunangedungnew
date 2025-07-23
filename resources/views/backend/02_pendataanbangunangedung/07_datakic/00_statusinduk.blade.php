
<div class="row g-4">
    @php
    $infoItems = [
        [
            'icon' => 'bi-building',
            'title' => 'Satuan Kerja',
            'value' => $subdatapemilik->satuankerja->satuankerja ?? '-',
        ],
        [
            'icon' => 'bi-geo-alt-fill',
            'title' => 'Kode Lokasi',
            'value' => $subdatapemilik->kodelokasi ?? '-',
        ],
        [
            'icon' => 'bi-diagram-3-fill',
            'title' => 'Bidang',
            'value' => $subdatapemilik->bidang ?? '-',
        ],
     [
    'icon' => 'bi-calendar-date',
    'title' => 'Tanggal Input',
    'value' => $subdatapemilik->tanggalinput ?? '-',
],

    ];
@endphp

    @foreach ($infoItems as $item)
        <div class="col-md-6 col-lg-3">
            <div class="card shadow-sm border-0 animate__animated animate__fadeInUp">
                <div class="card-body bg-white rounded-3" style="background: linear-gradient(to bottom, #f8faff, #e6f0ff);">
                    <div class="d-flex align-items-start">
                        <div class="me-3">
                            <i class="bi {{ $item['icon'] }} text-primary fs-3"></i>
                        </div>
                        <div>
                            <h6 class="fw-bold text-dark mb-1">{{ $item['title'] }}</h6>
                            <p class="mb-0 text-muted">{{ $item['value'] }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
