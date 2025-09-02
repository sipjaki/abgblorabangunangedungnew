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
               placeholder="Koordinat tidak dapat diubah"
               readonly>
    </div>
    <div id="map" style="height: 500px; border-radius: 10px; border: 2px solid #ccc;"></div>
</div>

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
                'icon' => 'bi-person-fill',
                'title' => 'Input Data',
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
<div class="col-md-12 mt-4">
    <div class="row text-center">
        @php
            $fotos = [
                'Tampak Depan' => $data->tampakdepan ?? null,
                'Tampak Belakang' => $data->tampakbelakang ?? null,
                'Tampak Samping 1' => $data->tampaksamping1 ?? null,
                'Tampak Samping 2' => $data->tampaksamping2 ?? null,
            ];
        @endphp

        @foreach($fotos as $index => $foto)
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm">
                <div class="card-header bg-light fw-bold text-dark">{{ $index }}</div>
                <div class="card-body p-2" style="min-height: 200px; display: flex; align-items: center; justify-content: center;">
                    @if($foto)
                        @php
                            $pathStorage = public_path('storage/' . $foto);
                            $pathPublic = public_path($foto);
                        @endphp

                        @if(file_exists($pathStorage))
                            <img src="{{ asset('storage/' . $foto) }}" alt="{{ $index }}" class="img-fluid rounded" style="max-height: 200px; object-fit: cover; cursor:pointer;" data-bs-toggle="modal" data-bs-target="#modalFoto{{ $loop->index }}">
                        @elseif(file_exists($pathPublic))
                            <img src="{{ asset($foto) }}" alt="{{ $index }}" class="img-fluid rounded" style="max-height: 200px; object-fit: cover; cursor:pointer;" data-bs-toggle="modal" data-bs-target="#modalFoto{{ $loop->index }}">
                        @else
                            <div class="berkas-button text-muted" style="padding: 40px 10px;">
                                Dokumentasi Belum Ada
                            </div>
                        @endif
                    @else
                        <div class="berkas-button text-muted" style="padding: 40px 10px;">
                            <button class="button-berkas">
                                Dokumentasi Belum Ada
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        {{-- Modal Foto --}}
        @if($foto && (file_exists($pathStorage) || file_exists($pathPublic)))
        <div class="modal fade" id="modalFoto{{ $loop->index }}" tabindex="-1" aria-labelledby="modalFotoLabel{{ $loop->index }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalFotoLabel{{ $loop->index }}">{{ $index }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <img src="{{ file_exists($pathStorage) ? asset('storage/' . $foto) : asset($foto) }}" alt="{{ $index }}" class="img-fluid rounded" style="max-height: 1200px; object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
        @endif

        @endforeach
    </div>
</div>


