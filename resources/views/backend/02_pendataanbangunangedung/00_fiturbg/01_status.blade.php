    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>


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
        <div id="map" style="height: 300px; border-radius: 10px; border: 2px solid #ccc;"></div>

    {{-- <div id="map" style="height: 500px; border-radius: 10px; border: 2px solid #ccc;"></div> --}}
</div>

<!-- Leaflet JS -->
<script>
    // Inisialisasi map dengan fokus ke Kabupaten Blora
    var map = L.map('map').setView([-7.0421, 111.4046], 11); // Koordinat Blora

    // Tambahkan layer peta dari OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Dinas Pekerjaan Umum Dan Penataan Ruang Kabupaten Blora'
    }).addTo(map);

    // Marker (jika sudah ada nilai awal koordinat)
    var marker;
    var input = document.getElementById('koordinat');
    if (input.value) {
        var coords = input.value.split(',');
        marker = L.marker([coords[0], coords[1]]).addTo(map);
        map.setView([coords[0], coords[1]], 15);
    }

    // Event saat klik di peta
    map.on('click', function(e) {
        var latlng = e.latlng;
        // Hapus marker sebelumnya
        if (marker) {
            map.removeLayer(marker);
        }
        // Tambahkan marker baru
        marker = L.marker(latlng).addTo(map);

        // Simpan koordinat ke input
        document.getElementById('koordinat').value = latlng.lat.toFixed(6) + ',' + latlng.lng.toFixed(6);
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

