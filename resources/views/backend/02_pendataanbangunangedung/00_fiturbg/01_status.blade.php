<!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
      integrity="sha256-sA+zMJOxZ+2fRZ2E9n+6Rc96ZLoOUod9W/Gc1iR2XYk="
      crossorigin=""/>

<!-- Container Form & Peta -->
<div class="col-md-12">
    <div class="mb-3">
        <label class="form-label d-flex align-items-center" for="koordinat">
            <i class="bi bi-geo-alt-fill me-2 text-danger" style="font-size: 1.2rem;"></i> Koordinat
        </label>
        <input type="text"
               class="form-control"
               id="koordinat"
               name="koordinat"
               value="{{ old('koordinat', $data->koordinat ?? '') }}"
               placeholder="Klik peta untuk mendapatkan koordinat" readonly>
    </div>

    <div id="map" style="height: 500px; border-radius: 10px; border: 2px solid #ccc;"></div>
</div>

<!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-oM1Q+Q4ZcZwwUtzfUavXbR/ExkZry3QQZQ1XCuVyc0I="
        crossorigin=""></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Default lokasi pusat peta (Blora)
        var defaultLat = -7.0421;
        var defaultLng = 111.4046;
        var defaultZoom = 11;

        // Inisialisasi peta
        var map = L.map('map').setView([defaultLat, defaultLng], defaultZoom);

        // Tambahkan OpenStreetMap tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://openstreetmap.org">OpenStreetMap</a> contributors',
            maxZoom: 19
        }).addTo(map);

        var marker;
        var input = document.getElementById('koordinat');

        // Jika sudah ada koordinat dari data, tampilkan marker dan set peta
        if (input.value) {
            var coords = input.value.split(',');
            if (coords.length === 2) {
                var lat = parseFloat(coords[0].trim());
                var lng = parseFloat(coords[1].trim());
                if (!isNaN(lat) && !isNaN(lng)) {
                    marker = L.marker([lat, lng]).addTo(map);
                    map.setView([lat, lng], 15);
                }
            }
        }

        // Event klik peta untuk set koordinat dan marker baru
        map.on('click', function (e) {
            var latlng = e.latlng;

            // Hapus marker lama kalau ada
            if (marker) {
                map.removeLayer(marker);
            }

            // Tambahkan marker baru
            marker = L.marker(latlng).addTo(map);

            // Update input koordinat dengan format 6 digit desimal
            input.value = latlng.lat.toFixed(6) + ', ' + latlng.lng.toFixed(6);
        });
    });
</script>

<div class="row g-4">
    @php
        $infoItems = [
            [
                'icon' => 'bi-person-fill',
                'title' => 'Nama User',
                'value' => optional($data->user)->name ?? '-',
            ],
            [
                'icon' => 'bi-geo-alt-fill',
                'title' => 'Kecamatan Blora',
                'value' => optional($data->kecamatanblora)->kecamatanblora ?? '-',
            ],
            [
                'icon' => 'bi-building',
                'title' => 'Nama Institusi',
                'value' => $data->namainstitusi ?? '-',
            ],
            [
                'icon' => 'bi-card-checklist',
                'title' => 'No. Pengesahan Usaha',
                'value' => $data->nopengesahanusaha ?? '-',
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

