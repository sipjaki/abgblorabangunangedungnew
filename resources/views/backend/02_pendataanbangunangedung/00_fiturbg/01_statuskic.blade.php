    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <!-- Leaflet JS -->
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>


<!-- Container Form & Peta -->
{{-- <div class="col-md-12">
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
</div> --}}

<!-- Leaflet JS -->
<script>
    // Inisialisasi map dengan fokus ke Kabupaten Blora
    var map = L.map('map').setView([-7.0421, 111.4046], 11); // Koordinat Blora default

    // Tambahkan layer peta dari OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: 'Dinas Pekerjaan Umum Dan Penataan Ruang Kabupaten Blora'
    }).addTo(map);

    var marker;
    var input = document.getElementById('koordinat');

    if (input.value) {
        var coords = input.value.split(',');
        var lat = parseFloat(coords[0].trim());
        var lng = parseFloat(coords[1].trim());
        if (!isNaN(lat) && !isNaN(lng)) {
            // Pasang marker di koordinat yang sudah ada
            marker = L.marker([lat, lng]).addTo(map);
            map.setView([lat, lng], 15);
        }
    }

    // Nonaktifkan klik peta agar marker tidak bisa dipindah/diganti
    // Jadi hapus atau jangan daftarkan event klik di map

    // Jika kamu ada event klik sebelumnya, pastikan dihapus atau tidak ada
    // Contoh, jika mau benar-benar nonaktifkan klik peta:
    map.off('click'); // memastikan tidak ada event click

    // Jika kamu ingin disable zoom juga supaya peta benar-benar "pasif":
    // map.dragging.disable();
    // map.touchZoom.disable();
    // map.doubleClickZoom.disable();
    // map.scrollWheelZoom.disable();
    // map.boxZoom.disable();
    // map.keyboard.disable();

</script>


<div class="row g-4">
@php
    $infoItems = [
        [
            'icon' => 'bi-calendar-event',
            'title' => 'Tanggal',
            'value' => $data->tanggal ? \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') : '-',
        ],
        [
            'icon' => 'bi-hash',
            'title' => 'Nomor',
            'value' => $data->nomor ?? '-',
        ],
        [
            'icon' => 'bi-aspect-ratio',
            'title' => 'Luas (m²)',
            'value' => $data->luas ?? '-',
        ],
        [
            'icon' => 'bi-tree',
            'title' => 'Status Tanah',
            'value' => $data->status_tanah ?? '-',
        ],
        [
            'icon' => 'bi-file-earmark-bar-graph',
            'title' => 'Nomor Kode Tanah',
            'value' => $data->nomor_kode_tanah ?? '-',
        ],
        [
            'icon' => 'bi-box-arrow-in-up-right',
            'title' => 'Asal Usul',
            'value' => $data->asal_usul ?? '-',
        ],
        [
            'icon' => 'bi-cash-stack',
            'title' => 'Harga',
            'value' => $data->harga ?? '-',
        ],
        [
            'icon' => 'bi-chat-left-text',
            'title' => 'Keterangan',
            'value' => $data->keterangan ?? '-',
        ],
        [
            'icon' => 'bi-chat-left-text',
            'title' => 'No Sertifikat',
            'value' => $data->keterangan ?? '-',
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
