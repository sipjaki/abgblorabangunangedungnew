{{-- <div class="card shadow-sm border-0" style="background: #f0f8ff;">
    <div class="card-body" style="overflow-x: auto; white-space: nowrap; padding: 16px;">
        @php
            // Ambil ID kepemilikan (relasi utama)
            $kepemilikanId = $data->databgkepemilikan_id ;

            $buttons = [
                [
                    'label' => 'Data Profil Tanah',
                    'url' => '/bedatabgprofiltanah/' . $kepemilikanId,
                    'icon' => 'bi-geo-alt-fill'
                ],
                [
                    'label' => 'Data Profil Bangunan Gedung',
                    'url' => '/bedatabgprofilbangunan/' . $kepemilikanId,
                    'icon' => 'bi-building-fill'
                ],
                [
                    'label' => 'Klasifikasi Bangunan Gedung',
                    'url' => '/bedatabgklasifikasi/' . $kepemilikanId,
                    'icon' => 'bi-tags-fill'
                ],
                [
                    'label' => 'Data Dokumen Bangunan Gedung',
                    'url' => '/bedatabgdokumen/' . $kepemilikanId,
                    'icon' => 'bi-building'
                ],
                [
                    'label' => 'Data Dokumen MEP Bangunan Gedung',
                    'url' => '/bedatabgmebangunan/' . $kepemilikanId,
                    'icon' => 'bi-tools'
                ],
                [
                    'label' => 'Data Struktur & Tingkat Kerusakan Bangunan Gedung',
                    'url' => '/bedatabgstrukrrusak/' . $kepemilikanId,
                    'icon' => 'bi-building'
                ],
                [
                    'label' => 'Data Status Bangunan Gedung',
                    'url' => '/bedatabgstatusbangunan/' . $kepemilikanId,
                    'icon' => 'bi-file-earmark-check-fill'
                ],
            ];
        @endphp

        @foreach ($buttons as $btn)
            <div class="d-inline-block me-3 mb-2">
                <a href="{{ $btn['url'] }}" onclick="saveScrollPosition()" class="text-decoration-none">
                    <div
                        class="px-3 py-2 rounded shadow-sm d-flex align-items-center justify-content-start"
                        style="
                            background: linear-gradient(145deg, #e1f0ff, #d6e9ff);
                            color: #003366;
                            transition: all 0.3s ease;
                            min-width: max-content;
                            border: 1px solid #c8dfff;
                            border-radius: 12px;
                            cursor: pointer;
                        "
                        onmouseover="this.style.background='white'; this.style.color='black';"
                        onmouseout="this.style.background='linear-gradient(145deg, #e1f0ff, #d6e9ff)'; this.style.color='#003366';"
                    >
                        <i class="bi {{ $btn['icon'] }} me-2"></i> {{ $btn['label'] }}
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>

<script>
// Simpan posisi scroll sebelum pindah halaman
function saveScrollPosition() {
    const scrollY = window.scrollY || window.pageYOffset;
    sessionStorage.setItem('scrollPosition', scrollY);
}

// Kembalikan posisi scroll setelah reload
window.addEventListener('load', () => {
    const scrollY = sessionStorage.getItem('scrollPosition');
    if (scrollY !== null) {
        window.scrollTo(0, parseInt(scrollY));
        sessionStorage.removeItem('scrollPosition');
    }
});
</script> --}}


<div class="card shadow-sm border-0" style="background: #f0f8ff;">
    <div class="card-body" style="overflow-x: auto; white-space: nowrap; padding: 16px;">
        @php
            // $id = $data->id ?? 0;
            // $kepemilikanId = $data->databgkepemilikan_id ?? '0';
              $kepemilikanId = $data->id ?? '0'; // pakai id parent langsung
            $buttons = [
                ['label' => 'Data Profil Tanah', 'url' => '/bedatabgprofiltanah/' . $kepemilikanId, 'icon' => 'bi-geo-alt-fill'],
                ['label' => 'Data Profil Bangunan Gedung', 'url' => '/bedatabgprofilbangunan/' . $kepemilikanId, 'icon' => 'bi-building-fill'],
                ['label' => 'Klasifikasi Bangunan Gedung', 'url' => '/bedatabgklasifikasi/' . $kepemilikanId, 'icon' => 'bi-tags-fill'],
                ['label' => 'Data Dokumen Bangunan Gedung', 'url' => '/bedatabgdokumen/' . $kepemilikanId, 'icon' => 'bi-building'], // INI FITUR MENU BARU

                ['label' => 'Data Dokumen MEP Bangunan Gedung', 'url' => '/bedatabgmebangunan/' . $kepemilikanId, 'icon' => 'bi-tools'],
                ['label' => 'Data Struktur Bangunan Gedung', 'url' => '/bedatabgstruktur/' . $kepemilikanId, 'icon' => 'bi-diagram-3-fill'],
                // ['label' => 'Data Struktur & Tingkat Kerusakan Bangunan Gedung', 'url' => '/bedatabgstrukrrusak/' . $kepemilikanId, 'icon' => 'bi-building'],

                // ['label' => 'Data Status Bangunan Gedung', 'url' => '/bedatabgstatusbangunan/' . $kepemilikanId, 'icon' => 'bi-file-earmark-check-fill'],
            ];
        @endphp

        @foreach ($buttons as $btn)
            <div class="d-inline-block me-3 mb-2">
                <a href="{{ $btn['url'] }}" onclick="saveScrollPosition()" class="text-decoration-none">
                    <div
                        class="px-3 py-2 rounded shadow-sm d-flex align-items-center justify-content-start"
                        style="
                            background: linear-gradient(145deg, #e1f0ff, #d6e9ff);
                            color: #003366;
                            transition: all 0.3s ease;
                            min-width: max-content;
                            border: 1px solid #c8dfff;
                            border-radius: 12px;
                            cursor: pointer;
                        "
                        onmouseover="this.style.background='white'; this.style.color='black';"
                        onmouseout="this.style.background='linear-gradient(145deg, #e1f0ff, #d6e9ff)'; this.style.color='#003366';"
                    >
                        <i class="bi {{ $btn['icon'] }} me-2"></i> {{ $btn['label'] }}
                    </div>
                </a>
            </div>
        @endforeach
    </div>

<div class="mb-2 mt-2 d-flex justify-content-center">
    <a href="{{ route('bangunan.perkecamatan', ['kecamatan_id' => $data->kecamatanblora_id]) }}" class="button-merah">
        <i class="bi bi-arrow-left-circle me-1"></i>
        Kembali Ke Data Dasar Data Perkecamatan
        <i class="bi bi-bar-chart-line-fill ms-1"></i>

        {{-- <i class="bi bi-arrow-right-circle ms-1"></i> --}}
    </a>
</div>

</div>


<script>
// Fungsi simpan posisi scroll sebelum pindah halaman
function saveScrollPosition() {
    const scrollY = window.scrollY || window.pageYOffset;
    sessionStorage.setItem('scrollPosition', scrollY);
}

// Saat halaman selesai load, scroll ke posisi yang disimpan
window.addEventListener('load', () => {
    const scrollY = sessionStorage.getItem('scrollPosition');
    if (scrollY !== null) {
        window.scrollTo(0, parseInt(scrollY));
        sessionStorage.removeItem('scrollPosition');
    }
});
</script>
