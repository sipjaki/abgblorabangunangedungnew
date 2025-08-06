
<!-- Informasi Detail -->
<div class="row g-4 mt-4">
    @php
        $infoItems = [
            [
                'icon' => 'bi-calendar-event',
                'title' => 'Tanggal',
                'value' => $data->tanggal ?  null,
            ],
            [
                'icon' => 'bi-hash',
                'title' => 'Nomor',
                'value' => $data->nomor ?? null,
            ],
            [
                'icon' => 'bi-aspect-ratio',
                'title' => 'Luas (m²)',
                'value' => $data->luas ?? null,
            ],
            [
                'icon' => 'bi-tree',
                'title' => 'Status Tanah',
                'value' => $data->status_tanah ?? null,
            ],
            [
                'icon' => 'bi-file-earmark-bar-graph',
                'title' => 'Nomor Kode Tanah',
                'value' => $data->nomor_kode_tanah ?? null,
            ],
            [
                'icon' => 'bi-box-arrow-in-up-right',
                'title' => 'Asal Usul',
                'value' => $data->asal_usul ?? null,
            ],
          [
    'icon' => 'bi-cash-stack',
    'title' => 'Harga',
    'value' => isset($data->harga) && is_numeric(preg_replace('/[^0-9]/', '', $data->harga))
        ? 'Rp ' . number_format((float) preg_replace('/[^0-9]/', '', $data->harga), 0, ',', '.')
        : 'Data Tidak Valid',
],


            [
                'icon' => 'bi-chat-left-text',
                'title' => 'Keterangan',
                'value' => $data->keterangan ?? null,
            ],
            [
                'icon' => 'bi-patch-check-fill',
                'title' => 'No Sertifikat',
                'value' => $data->nosertifikat ?? null,
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
                            @if ($item['value'])
                                <p class="mb-0 text-muted">{{ $item['value'] }}</p>
                            @else
                                <button class="btn btn-sm btn-outline-secondary" disabled>Data Belum Diupdate</button>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
