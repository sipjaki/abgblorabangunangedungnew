<!-- =========================================================== -->
<!-- VIEW: 05_lihatperhitungananalisa.blade.php                   -->
<!-- Menampilkan data hasil penilaian kerusakan bangunan          -->
<!-- =========================================================== -->

<div class="container-fluid mt-4 px-4">
    <div class="card shadow-sm">
        <div class="card-header text-white py-3" style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%); border-bottom: 4px solid #ffc107; border-radius: 0;">
            <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap">
                <i class="bi bi-building fs-2 text-warning"></i>
                <div class="text-center">
                    <h5 class="mb-0 fw-bold" style="letter-spacing: 0.5px;">
                        <i class="bi bi-clipboard-check me-2"></i>HASIL PENILAIAN KERUSAKAN BANGUNAN
                    </h5>
                    <p class="mb-0 small mt-1" style="opacity: 0.9;">
                        <i class="bi bi-geo-alt me-1"></i> Nama Gedung:
                        <span class="fw-semibold text-warning">{{ $data->induk->namagedung ?? '-' }}</span>
                    </p>
                </div>
                <i class="bi bi-clipboard-data fs-2 text-warning"></i>
            </div>
        </div>

        <div class="card-body">

            {{-- Informasi Tanggal & Keterangan --}}
            <div class="row mb-4">
                <div class="col-12 mb-3">
                    <label class="form-label font-weight-bold">Tanggal Terbit</label>
                    <div class="form-control-plaintext">
                        <strong>{{ $data->tanggalterbit ? \Carbon\Carbon::parse($data->tanggalterbit)->format('d-m-Y') : '-' }}</strong>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <label class="form-label font-weight-bold">Keterangan</label>
                    <div class="form-control-plaintext bg-light p-2 rounded" style="min-height: 50px;">
                        {{ $data->cadangan1 ?? '-' }}
                    </div>
                </div>
            </div>

            {{-- Tabel Penilaian --}}
            <div class="table-responsive">
                <table class="table table-bordered align-middle w-100">
                    <thead class="table-light text-center">
                        <tr>
                            <th style="width: 4%;">NO</th>
                            <th style="width: 16%;">KOMPONEN STANDAR</th>
                            <th style="width: 8%;">BOBOT</th>
                            <th style="width: 25%;">TINGKAT KERUSAKAN (SKALA)</th>
                            <th style="width: 11%;">SKALA PILIHAN (%)</th>
                            <th style="width: 11%;">NILAI × BOBOT (%)</th>
                            <th style="width: 25%;">LAMPIRAN BUKTI FOTO</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            // Mapping komponen ke field database
                            $komponenData = [
                                'pondasi'   => ['label' => 'PONDASI', 'bobot' => 0.10, 'nilai' => $data->nilaipondasi, 'foto1' => $data->fotopondasi1, 'foto2' => $data->fotopondasi2],
                                'struktur'  => ['label' => 'STRUKTUR', 'bobot' => 0.33, 'nilai' => $data->nilaistruktur, 'foto1' => $data->fotostruktur1, 'foto2' => $data->fotostruktur2],
                                'atap'      => ['label' => 'ATAP', 'bobot' => 0.10, 'nilai' => $data->nilaiatap, 'foto1' => $data->fotoatap1, 'foto2' => $data->fotoatap2],
                                'lantai'    => ['label' => 'LANTAI', 'bobot' => 0.07, 'nilai' => $data->nilailantai, 'foto1' => $data->fotolantai1, 'foto2' => $data->fotolantai2],
                                'dinding'   => ['label' => 'DINDING', 'bobot' => 0.10, 'nilai' => $data->nilaidinding, 'foto1' => $data->fotodinding1, 'foto2' => $data->fotodinding2],
                                'plafon'    => ['label' => 'PLAFON', 'bobot' => 0.07, 'nilai' => $data->nilaiplafon, 'foto1' => $data->fotoplafon1, 'foto2' => $data->fotoplafon2],
                                'utilitas'  => ['label' => 'UTILITAS', 'bobot' => 0.08, 'nilai' => $data->nilaiutilitas, 'foto1' => $data->fotoutilitas1, 'foto2' => $data->fotoutilitas2],
                                'finishing' => ['label' => 'FINISHING', 'bobot' => 0.15, 'nilai' => $data->nilaifinishing, 'foto1' => $data->fotofinishing1, 'foto2' => $data->fotofinishing2],
                            ];

                            $total = 0;
                        @endphp

                        @foreach($komponenData as $key => $item)
                            @php
                                $nilai = floatval($item['nilai'] ?? 0);
                                $bobot = $item['bobot'];
                                $skalaPersen = $nilai * 100;
                                $hasilPersen = ($nilai * $bobot) * 100;
                                $total += $hasilPersen;
                            @endphp
                            <tr>
                                <td class="text-center">{{ $loop->iteration }}</td>
                                <td class="font-weight-bold">{{ $item['label'] }}</td>
                                <td class="text-center bg-light font-weight-bold">{{ number_format($bobot * 100, 2) }}%</td>
                                <td class="text-center">
                                    @if($nilai == 0) Tidak Rusak
                                    @elseif($nilai == 0.20) Rusak Ringan (0.20)
                                    @elseif($nilai == 0.35) Rusak Ringan (0.35)
                                    @elseif($nilai == 0.50) Rusak Sedang (0.50)
                                    @elseif($nilai == 0.70) Rusak Sedang (0.70)
                                    @elseif($nilai == 0.85) Rusak Berat (0.85)
                                    @elseif($nilai == 1.00) Komponen Tidak Ada
                                    @else {{ $nilai }}
                                    @endif
                                </td>
                                <td class="text-center text-secondary bg-light font-weight-bold">
                                    {{ number_format($skalaPersen, 2) }}%
                                </td>
                                <td class="text-center font-weight-bold text-primary bg-light">
                                    {{ number_format($hasilPersen, 2) }}%
                                </td>
                                <td>
                                    <div class="row g-2">
                                        <div class="col-6 text-center">
                                            @if(!empty($item['foto1']))
                                                <img src="{{ asset($item['foto1']) }}"
                                                     alt="Foto 1"
                                                     class="img-fluid rounded img-trigger-modal"
                                                     style="max-height: 60px; cursor: pointer;">
                                            @else
                                                <small class="text-muted">Tidak ada foto</small>
                                            @endif
                                        </div>
                                        <div class="col-6 text-center">
                                            @if(!empty($item['foto2']))
                                                <img src="{{ asset($item['foto2']) }}"
                                                     alt="Foto 2"
                                                     class="img-fluid rounded img-trigger-modal"
                                                     style="max-height: 60px; cursor: pointer;">
                                            @else
                                                <small class="text-muted">Tidak ada foto</small>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach

                        {{-- Total --}}
                        <tr class="table-warning font-weight-bold">
                            <td colspan="4" class="text-end">TOTAL TINGKAT KERUSAKAN BANGUNAN :</td>
                            <td colspan="2" class="text-center text-danger fs-5">
                                {{ number_format(min($total, 100), 2) }}%
                            </td>
                            <td></td>
                        </tr>

                        {{-- Klasifikasi --}}
                        <tr class="table-light">
                            <td colspan="4" class="small text-muted">
                                <strong>Ketentuan Klasifikasi Kerusakan:</strong><br>
                                - Rusak Ringan : ≤ 30%<br>
                                - Rusak Sedang : ≤ 45%<br>
                                - Rusak Berat  : ≤ 65%<br>
                                - Rusak Sangat Berat : > 65%
                            </td>
                            <td colspan="2" class="text-center align-middle bg-white">
                                <div class="text-muted small font-weight-bold mb-1">STATUS AKHIR:</div>
                                @php
                                    $totalFinal = min($total, 100);
                                    if ($totalFinal == 0) {
                                        $status = 'Tidak Ada Kerusakan';
                                        $badgeClass = 'bg-success';
                                    } elseif ($totalFinal <= 30) {
                                        $status = 'Rusak Ringan';
                                        $badgeClass = 'bg-info text-dark';
                                    } elseif ($totalFinal <= 45) {
                                        $status = 'Rusak Sedang';
                                        $badgeClass = 'bg-warning text-dark';
                                    } elseif ($totalFinal <= 65) {
                                        $status = 'Rusak Berat';
                                        $badgeClass = 'bg-danger';
                                    } else {
                                        $status = 'Rusak Sangat Berat';
                                        $badgeClass = 'bg-dark';
                                    }
                                @endphp
                                <span class="badge {{ $badgeClass }} p-2 fs-6">{{ $status }}</span>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            {{-- Penandatangan --}}
            <div class="row mt-4 pt-3 border-top">
                <div class="col-md-4 mb-3">
                    <label class="form-label font-weight-bold">Kepala Dinas Pekerjaan Umum</label>
                    <div class="form-control-plaintext">
                        <strong>{{ $data->kepaladinas->namalengkap ?? 'Tidak terpilih' }}</strong>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label font-weight-bold">Kepala Bidang Bangunan Gedung</label>
                    <div class="form-control-plaintext">
                        <strong>{{ $data->kabidbangunangedung->namalengkap ?? 'Tidak terpilih' }}</strong>
                    </div>
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label font-weight-bold">Tim Survey (Petugas Dinas)</label>
                    <div class="row g-2">
                        @php
                            $surveys = [
                                1 => $data->timsurvey1,
                                2 => $data->timsurvey2,
                                3 => $data->timsurvey3,
                                4 => $data->timsurvey4,
                            ];
                        @endphp
                        @foreach($surveys as $i => $petugas)
                            <div class="col-6 mb-2">
                                <div class="form-control-plaintext small">
                                    <strong>Petugas {{ $i }}:</strong>
                                    {{ $petugas->namalengkap ?? 'Tidak terpilih' }}
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            {{-- Tombol Kembali --}}
            {{-- <div class="text-end mt-4">
                <a href="{{ route('bebantekanalisarusakshow', ['namagedung' => $data->induk->namagedung ?? 'tanpa-nama', 'id' => $data->induk->id ?? 0]) }}"
                   class="button-baru">
                    <i class="bi bi-arrow-left me-1"></i> Kembali ke Detail
                </a>
            </div> --}}
        </div>
    </div>
</div>

{{-- Modal Preview Foto --}}
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imagePreviewModalLabel">Bukti Foto Kerusakan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center bg-dark rounded-bottom p-2">
                <img id="modalLargeImage" src="" class="img-fluid rounded" alt="Bukti Foto Besar" style="max-height: 80vh;">
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Klik foto → modal besar
    const modalEl = document.getElementById('imagePreviewModal');
    if (typeof bootstrap !== 'undefined') {
        const imageModal = new bootstrap.Modal(modalEl);
        const modalImg = document.getElementById('modalLargeImage');
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('img-trigger-modal')) {
                const src = e.target.getAttribute('src');
                if (src && src !== "") {
                    modalImg.src = src;
                    imageModal.show();
                }
            }
        });
    } else {
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('img-trigger-modal')) {
                const src = e.target.getAttribute('src');
                if (src && src !== "") window.open(src, '_blank');
            }
        });
    }
});
</script>
