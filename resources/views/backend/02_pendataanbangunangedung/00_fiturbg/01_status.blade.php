{{-- Koordinat dan Peta --}}
<div class="col-md-12">
    <div class="mb-3">
        <label class="form-label d-flex align-items-center" for="koordinat">
            <i class="bi bi-geo-alt-fill me-2 text-danger" style="font-size: 1.2rem;"></i> Koordinat
        </label>
        <input type="text"
               class="form-control @error('koordinat') is-invalid @enderror"
               id="koordinat"
               name="koordinat"
               value="{{ old('koordinat', $data->koordinat ?? 'Segera Update Koordinat') }}">
        @error('koordinat') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    {{-- Peta --}}
    <div id="map" style="height: 500px; border-radius: 10px; border: 2px solid #ccc;"></div>
</div>

{{-- Dokumentasi Tampak Bangunan --}}
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

        @foreach($fotos as $label => $foto)
        <div class="col-md-3 mb-3">
            <div class="card shadow-sm">
                <div class="card-header bg-light fw-bold text-dark">{{ $label }}</div>
                <div class="card-body p-2" style="min-height: 200px; display: flex; align-items: center; justify-content: center;">
                    @if($foto)
                        @php
                            $pathStorage = public_path('storage/' . $foto);
                            $pathPublic = public_path($foto);
                        @endphp

                        @if(file_exists($pathStorage))
                            <img src="{{ asset('storage/' . $foto) }}" alt="{{ $label }}" class="img-fluid rounded" style="max-height: 200px; object-fit: cover;">
                        @elseif(file_exists($pathPublic))
                            <img src="{{ asset($foto) }}" alt="{{ $label }}" class="img-fluid rounded" style="max-height: 200px; object-fit: cover;">
                        @else
                            <div class="berkas-button text-muted" style="padding: 40px 10px;">
                                Dokumentasi Belum Ada
                            </div>
                        @endif
                    @else
                        <div class="berkas-button text-muted" style="padding: 40px 10px;">
                            Dokumentasi Belum Ada
                        </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>



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
