<!-- Leaflet CSS dan JS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<!-- Container Form & Peta -->
<div class="col-md-12">
    <div class="mb-3">
        <label class="form-label d-flex align-items-center" for="koordinat">
            <i class="bi bi-geo-alt-fill me-2 text-danger" style="font-size: 1.2rem;"></i> Informasi Bangunan Gedung
        </label>
        <input type="text"
               class="form-control"
               id="koordinat"
               name="koordinat"
               value="{{ old('koordinat', $data->koordinat ?? '') }}"
               placeholder="Koordinat tidak dapat diubah"
               readonly>
    </div>
    <div id="map" style="height: 500px; border-radius: 10px; border: 2px solid #ccc;"></div>
</div>

<script>
    var map = L.map('map').setView([-7.0421, 111.4046], 11); // Default: Blora
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Dinas Pekerjaan Umum Dan Penataan Ruang Kabupaten Blora'
    }).addTo(map);

    var input = document.getElementById('koordinat');
    var marker;

    if (input.value) {
        var coords = input.value.split(',');
        var lat = parseFloat(coords[0].trim());
        var lng = parseFloat(coords[1].trim());

        if (!isNaN(lat) && !isNaN(lng)) {
            marker = L.marker([lat, lng]).addTo(map);
            map.setView([lat, lng], 15);
        }
    }

    // Nonaktifkan semua interaksi peta
    map.dragging.disable();
    map.touchZoom.disable();
    map.doubleClickZoom.disable();
    map.scrollWheelZoom.disable();
    map.boxZoom.disable();
    map.keyboard.disable();
    map.off('click');
</script>

<!-- Informasi Detail -->
<div class="row g-4 mt-4">
    @php
        $infoItems = [
            [
                'icon' => 'bi-calendar-event',
                'title' => 'Tanggal',
                'value' => $data->tanggal ? \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') : null,
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
                'value' => $data->harga ? 'Rp ' . number_format($data->harga, 0, ',', '.') : null,
            ],
            [
                'icon' => 'bi-chat-left-text',
                'title' => 'Keterangan',
                'value' => $data->keterangan ?? null,
            ],
            [
                'icon' => 'bi-patch-check-fill',
                'title' => 'No Sertifikat',
                'value' => $data->nomor_sertifikat ?? null,
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
