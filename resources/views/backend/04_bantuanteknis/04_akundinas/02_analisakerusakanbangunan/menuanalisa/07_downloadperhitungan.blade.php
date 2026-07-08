<div class="container-fluid mt-4 px-4 m-print-0 p-print-0">

    <div class="d-flex justify-content-end gap-2 mb-4 d-print-none">
        <button onclick="window.print()" class="btn btn-success shadow-sm fw-bold">
            <i class="bi bi-download me-1"></i> Cetak / Save PDF (A4 Landscape)
        </button>
    </div>

    <div class="cetak-wrapper">

        <div class="halaman-cetak-landscape">

            <div class="text-center mb-3">
                <h4 class="fw-bold text-uppercase mb-2" style="font-family: Arial, sans-serif; letter-spacing: 0.5px;">
                    FORMULIR PENILAIAN KERUSAKAN BANGUNAN
                </h4>
                <div style="border-bottom: 2px solid #000; width: 100%; margin-top: 5px;"></div>
            </div>

            <table class="table table-borderless info-table mb-2 w-100" style="font-size: 11px; line-height: 1.2;">
                <tr>
                    <td style="width: 12%; padding: 1px 0;">Nama Gedung</td>
                    <td style="width: 1%; padding: 1px 0;">:</td>
                    <td style="width: 47%; padding: 1px 0;" class="fw-bold">{{ $data->induk->namagedung ?? '-' }}</td>
                    <td style="width: 12%; padding: 1px 0;">Provinsi</td>
                    <td style="width: 1%; padding: 1px 0;">:</td>
                    <td style="width: 27%; padding: 1px 0;">Jawa Tengah</td>
                </tr>
                <tr>
                    <td style="padding: 1px 0;">Kode Barang</td>
                    <td style="padding: 1px 0;">:</td>
                    <td style="padding: 1px 0;">{{ $data->induk->kodebarang ?? '-' }}</td>
                    <td style="padding: 1px 0;">Kabupaten/Kota</td>
                    <td style="padding: 1px 0;">:</td>
                    <td style="padding: 1px 0;">Blora</td>
                </tr>
                <tr>
                    <td style="padding: 1px 0;">Alamat</td>
                    <td style="padding: 1px 0;">:</td>
                    <td style="padding: 1px 0;">{{ $data->induk->alamat ?? '-' }}</td>
                    <td style="padding: 1px 0;">Jumlah Lantai</td>
                    <td style="padding: 1px 0;">:</td>
                    <td style="padding: 1px 0;">{{ $data->induk->jumlah_lantai ?? '-' }}</td>
                </tr>
                <tr>
                    <td style="padding: 1px 0;">Tanggal Terbit</td>
                    <td style="padding: 1px 0;">:</td>
                    <td style="padding: 1px 0;" class="fw-bold">{{ $data->tanggalterbit ? \Carbon\Carbon::parse($data->tanggalterbit)->format('d-m-Y') : '-' }}</td>
                    <td style="padding: 1px 0;">Keterangan</td>
                    <td style="padding: 1px 0;">:</td>
                    <td style="padding: 1px 0;">{{ $data->cadangan1 ?? '-' }}</td>
                </tr>
            </table>

            <div class="dasar-hukum mb-3" style="font-size: 10px; line-height: 1.3;">
                <table class="table table-borderless m-0 p-0">
                    <tr class="align-top">
                        <td style="width: 5%; padding: 0;">Dasar :</td>
                        <td style="width: 2%; padding: 0;">1.</td>
                        <td style="padding: 0 0 2px 0;">Peraturan Menteri Pekerjaan Umum Dan Perumahan Rakyat Republik Indonesia Nomor 22/PRT/M/2018 Tentang Pembangunan Bangunan Gedung Negara</td>
                    </tr>
                    <tr class="align-top">
                        <td></td>
                        <td>2.</td>
                        <td style="padding: 0;">Keputusan Menteri Pekerjaan Umum Dan Perumahan Rakyat Nomor 943/KPTS/M/2024 Tentang Pedoman Perhitungan Standar Harga Satuan Tertinggi Dan Tabel Daftar Komponen Biaya Pembangunan Bangunan Gedung Negara</td>
                    </tr>
                </table>
            </div>

            <table class="table table-bordered border-dark align-middle w-100 tabel-form mb-3" style="font-size: 11px;">
                <thead class="text-center text-uppercase fw-bold align-middle bg-light">
                    <tr>
                        <th rowspan="3" style="width: 3%;">NO</th>
                        <th rowspan="3" style="width: 14%;">KOMPONEN STANDAR</th>
                        <th rowspan="3" style="width: 6%;">BOBOT</th>
                        <th colspan="5">KLASIFIKASI KERUSAKAN BERDASARKAN VISUAL</th>
                        <th colspan="2">PERHITUNGAN TINGKAT KERUSAKAN KOMPONEN</th>
                    </tr>
                    <tr>
                        <th style="width: 6%;">Tidak Rusak</th>
                        <th style="width: 6%;">Ringan</th>
                        <th style="width: 6%;">Sedang</th>
                        <th style="width: 6%;">Berat</th>
                        <th style="width: 8%;">Komponen Tdk Ada</th>
                        <th style="width: 10%;">Skala Pilihan (%)</th>
                        <th style="width: 10%;">Nilai x Bobot (%)</th>
                    </tr>
                    <tr class="text-muted text-center" style="font-size: 9px;">
                        <th>0.00</th>
                        <th>0.20 / 0.35</th>
                        <th>0.50 / 0.70</th>
                        <th>0.85</th>
                        <th>1.00</th>
                        <th>(Skala &times; 100)</th>
                        <th>(Skala &times; Bobot)</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $komponenData = [
                            'pondasi'   => ['label' => 'PONDASI', 'bobot' => 0.10, 'nilai' => $data->nilaipondasi],
                            'struktur'  => ['label' => 'STRUKTUR', 'bobot' => 0.33, 'nilai' => $data->nilaistruktur],
                            'atap'      => ['label' => 'ATAP', 'bobot' => 0.10, 'nilai' => $data->nilaiatap],
                            'lantai'    => ['label' => 'LANTAI', 'bobot' => 0.07, 'nilai' => $data->nilailantai],
                            'dinding'   => ['label' => 'DINDING', 'bobot' => 0.10, 'nilai' => $data->nilaidinding],
                            'plafon'    => ['label' => 'PLAFON', 'bobot' => 0.07, 'nilai' => $data->nilaiplafon],
                            'utilitas'  => ['label' => 'UTILITAS', 'bobot' => 0.08, 'nilai' => $data->nilaiutilitas],
                            'finishing' => ['label' => 'FINISHING', 'bobot' => 0.15, 'nilai' => $data->nilaifinishing],
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
                            <td class="fw-bold">{{ $item['label'] }}</td>
                            <td class="text-center fw-bold">{{ number_format($bobot * 100, 2) }}%</td>

                            <td class="text-center fw-bold">{{ $nilai == 0.00 ? '✓' : '-' }}</td>
                            <td class="text-center fw-bold">{{ ($nilai == 0.20 || $nilai == 0.35) ? '✓' : '-' }}</td>
                            <td class="text-center fw-bold">{{ ($nilai == 0.50 || $nilai == 0.70) ? '✓' : '-' }}</td>
                            <td class="text-center fw-bold">{{ $nilai == 0.85 ? '✓' : '-' }}</td>
                            <td class="text-center fw-bold">{{ $nilai == 1.00 ? '✓' : '-' }}</td>

                            <td class="text-center text-secondary fw-semibold">{{ number_format($skalaPersen, 2) }}%</td>
                            <td class="text-center text-primary fw-bold">{{ number_format($hasilPersen, 2) }}%</td>
                        </tr>
                    @endforeach

                    @php $totalFinal = min($total, 100); @endphp
                    <tr class="fw-bold border-dark">
                        <td colspan="3" class="text-end text-uppercase py-2">TOTAL NILAI KERUSAKAN BANGUNAN :</td>
                        <td colspan="5" class="bg-light"></td>
                        <td colspan="2" class="text-center text-danger fs-6 py-2 bg-light fw-bold" style="border: 2px solid red !important;">
                            {{ number_format($totalFinal, 2) }}%
                        </td>
                    </tr>
                </tbody>
            </table>

            <div class="row align-items-start" style="font-size: 11px;">
                <div class="col-4">
                    <table class="table table-sm table-bordered border-dark m-0" style="font-size: 10px; width: 100%;">
                        <thead>
                            <tr class="bg-light text-center fw-bold">
                                <th colspan="2" style="padding: 2px;">Tingkat Kerusakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td style="padding: 1px 4px;">Ringan</td><td style="padding: 1px 4px;">: maksimal 30%</td></tr>
                            <tr><td style="padding: 1px 4px;">Sedang</td><td style="padding: 1px 4px;">: maksimal 45%</td></tr>
                            <tr><td style="padding: 1px 4px;">Berat</td><td style="padding: 1px 4px;">: maksimal 65%</td></tr>
                            <tr><td style="padding: 1px 4px;">Sangat Berat</td><td style="padding: 1px 4px;">: lebih dari 65%</td></tr>
                            <tr class="bg-dark text-white fw-bold">
                                <td style="padding: 2px 4px;">STATUS AKHIR</td>
                                <td class="text-center text-uppercase style-status" style="padding: 2px 4px;">
                                    @if ($totalFinal == 0) Tidak Ada
                                    @elseif ($totalFinal <= 30) Rusak Ringan
                                    @elseif ($totalFinal <= 45) Rusak Sedang
                                    @elseif ($totalFinal <= 65) Rusak Berat
                                    @else Rusak Sangat Berat
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-8">
                    <div class="d-flex justify-content-end text-center gap-4">
                        <div style="min-width: 180px;">
                            <p class="mb-0">Plt. Kepala Dinas Pekerjaan Umum<br>dan Penataan Ruang Kabupaten Blora</p>
                            <div style="height: 45px;"></div>
                            <p class="fw-bold mb-0 text-decoration-underline">{{ $data->kepaladinas->namalengkap ?? '.......................................' }}</p>
                        </div>
                        <div style="min-width: 180px;">
                            <p class="mb-0">Kepala Bidang<br>Bangunan Gedung</p>
                            <div style="height: 45px;"></div>
                            <p class="fw-bold mb-0 text-decoration-underline">{{ $data->kabidbangunangedung->namalengkap ?? '.......................................' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-2 pt-2 border-top border-secondary" style="font-size: 10px;">
                <p class="fw-bold mb-1">Tim Survey / Petugas Teknis Dinas :</p>
                <div class="row">
                    @php
                        $surveys = [
                            1 => $data->timsurvey1,
                            2 => $data->timsurvey2,
                            3 => $data->timsurvey3,
                            4 => $data->timsurvey4,
                        ];
                    @endphp
                    @foreach($surveys as $i => $petugas)
                        <div class="col-3">
                            {{ $i }}. {{ $petugas->namalengkap ?? '.......................................' }}
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="halaman-cetak-landscape pemisah-halaman">

            <div class="text-center mb-3">
                <h4 class="fw-bold text-uppercase mb-1" style="font-family: Arial, sans-serif;">
                    LAMPIRAN DOKUMENTASI BUKTI VISUAL KERUSAKAN
                </h4>
                <p class="mb-1 small text-muted">Nama Gedung: <strong>{{ $data->induk->namagedung ?? '-' }}</strong></p>
                <div style="border-bottom: 2px solid #000; width: 100%;"></div>
            </div>

            @php
                $komponenFoto = [
                    'PONDASI'   => ['f1' => $data->fotopondasi1, 'f2' => $data->fotopondasi2, 'nilai' => $data->nilaipondasi],
                    'STRUKTUR'  => ['f1' => $data->fotostruktur1, 'f2' => $data->fotostruktur2, 'nilai' => $data->nilaistruktur],
                    'ATAP'      => ['f1' => $data->fotoatap1, 'f2' => $data->fotoatap2, 'nilai' => $data->nilaiatap],
                    'LANTAI'    => ['f1' => $data->fotolantai1, 'f2' => $data->fotolantai2, 'nilai' => $data->nilailantai],
                    'DINDING'   => ['f1' => $data->fotodinding1, 'f2' => $data->fotodinding2, 'nilai' => $data->nilaidinding],
                    'PLAFON'    => ['f1' => $data->fotoplafon1, 'f2' => $data->fotoplafon2, 'nilai' => $data->nilaiplafon],
                    'UTILITAS'  => ['f1' => $data->fotoutilitas1, 'f2' => $data->fotoutilitas2, 'nilai' => $data->nilaiutilitas],
                    'FINISHING' => ['f1' => $data->fotofinishing1, 'f2' => $data->fotofinishing2, 'nilai' => $data->nilaifinishing],
                ];
            @endphp

            <div class="row g-2">
                @foreach($komponenFoto as $label => $foto)
                    @if(!empty($foto['f1']) || !empty($foto['f2']))
                        <div class="col-3">
                            <div class="card border-dark h-100" style="font-size: 10px;">
                                <div class="card-header bg-light py-1 fw-bold text-center border-dark border-bottom" style="font-size: 11px;">
                                    {{ $label }} (Skala: {{ $foto['nilai'] ?? '0' }})
                                </div>
                                <div class="card-body p-1 d-flex justify-content-center align-items-center gap-1 bg-white" style="min-height: 90px;">
                                    @if(!empty($foto['f1']))
                                        <img src="{{ asset($foto['f1']) }}" class="img-thumbnail img-trigger-modal border-secondary" style="height: 80px; width: 48%; object-fit: cover; cursor: pointer;">
                                    @else
                                        <div class="text-muted text-center small border border-dashed rounded p-2" style="width: 48%;">Tidak Ada Foto</div>
                                    @endif

                                    @if(!empty($foto['f2']))
                                        <img src="{{ asset($foto['f2']) }}" class="img-thumbnail img-trigger-modal border-secondary" style="height: 80px; width: 48%; object-fit: cover; cursor: pointer;">
                                    @else
                                        <div class="text-muted text-center small border border-dashed rounded p-2" style="width: 48%;">Tidak Ada Foto</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <div class="mt-4 text-end text-muted px-2" style="font-size: 9px; font-family: Arial, sans-serif;">
                Lembar 2: Lampiran Dokumen Teknis Dinas Pekerjaan Umum Kabupaten Blora
            </div>

        </div>

    </div>
</div>

<div class="modal fade d-print-none" id="imagePreviewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold">Detail Bukti Visual</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center bg-dark p-2">
                <img id="modalLargeImage" src="" class="img-fluid rounded" style="max-height: 75vh;">
            </div>
        </div>
    </div>
</div>

<style>
    /* Styling standar tampilan web */
    .cetak-wrapper {
        background: #fff;
        font-family: 'Arial', sans-serif !important;
    }
    .halaman-cetak-landscape {
        background: #fff;
        border: 1px solid #dee2e6;
        padding: 20px;
        margin-bottom: 30px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.05);
        border-radius: 4px;
    }
    .tabel-form th, .tabel-form td {
        border: 1px solid #000 !important;
        padding: 4px 6px !important;
    }

    /* Target cetak khusus ke PDF / Printer */
    @media print {
        body {
            background-color: #fff !important;
            color: #000 !important;
            margin: 0 !important;
            padding: 0 !important;
        }
        .container-fluid {
            padding: 0 !important;
            margin: 0 !important;
        }
        .halaman-cetak-landscape {
            border: none !important;
            box-shadow: none !important;
            padding: 0 !important;
            margin: 0 !important;
            page-break-inside: avoid;
        }
        .pemisah-halaman {
            page-break-before: always; /* MEMAKSA HALAMAN BARU UNTUK FOTO */
        }
        .d-print-none {
            display: none !important;
        }
        .tabel-form th {
            background-color: #f8f9fa !important;
            -webkit-print-color-adjust: exact;
            print-color-adjust: exact;
        }
        @page {
            size: A4 landscape; /* SET KERTAS A4 LANDSCAPE */
            margin: 10mm 10mm 10mm 10mm;
        }
    }
</style>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const modalEl = document.getElementById('imagePreviewModal');
    if (typeof bootstrap !== 'undefined' && modalEl) {
        const imageModal = new bootstrap.Modal(modalEl);
        const modalImg = document.getElementById('modalLargeImage');
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('img-trigger-modal')) {
                const src = e.target.getAttribute('src');
                if (src) {
                    modalImg.src = src;
                    imageModal.show();
                }
            }
        });
    }
});
</script>
