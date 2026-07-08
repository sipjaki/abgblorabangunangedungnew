<!-- =========================================================== -->
<!-- VIEW: 05_lihatperhitungananalisa.blade.php                   -->
<!-- Menampilkan data hasil penilaian kerusakan bangunan          -->
<!-- Output: Download PDF A4 Landscape Sekali Klik (2 Halaman)   -->
<!-- =========================================================== -->

<div class="container-fluid mt-4 px-4">
    <!-- Tombol Navigasi & Download (Disembunyikan dari area cetak PDF) -->
    <div class="d-flex justify-content-end gap-2 mb-4">
        <a href="{{ route('bebantekanalisarusakshow', ['namagedung' => $data->induk->namagedung ?? 'tanpa-nama', 'id' => $data->induk->id ?? 0]) }}" class="btn btn-secondary shadow-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Detail
        </a>
        <button onclick="downloadPDF()" class="btn btn-primary shadow-sm fw-bold">
            <i class="bi bi-file-earmark-pdf-fill me-1"></i> Download PDF (A4 Landscape)
        </button>
    </div>

    <!-- AREA UTAMA YANG AKAN DI-DOWNLOAD -->
    <div id="dokumen-download" class="pdf-container">

        <!-- ======================================================= -->
        <!-- HALAMAN 1: FORMULIR UTAMA                               -->
        <!-- ======================================================= -->
        <div class="halaman-pdf-page">
            <!-- HEADER FORMULIR -->
            <div class="text-center mb-3">
                <h5 class="fw-bold text-uppercase m-0 style-judul">FORMULIR PENILAIAN KERUSAKAN BANGUNAN</h5>
            </div>

            <!-- METADATA GEDUNG -->
            <table class="table-info-gedung w-100 mb-2">
                <tr>
                    <td style="width: 14%;">Nama Gedung</td>
                    <td style="width: 1%;">:</td>
                    <td style="width: 45%;" class="fw-bold">{{ $data->induk->namagedung ?? '-' }}</td>
                    <td style="width: 14%;">Provinsi</td>
                    <td style="width: 1%;">:</td>
                    <td style="width: 25%;">Jawa Tengah</td>
                </tr>
                <tr>
                    <td>Kode Barang</td>
                    <td>:</td>
                    <td>{{ $data->induk->kodebarang ?? '-' }}</td>
                    <td>Kabupaten/Kota</td>
                    <td>:</td>
                    <td>Blora</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td>{{ $data->induk->alamat ?? '-' }}</td>
                    <td>Koordinat</td>
                    <td>:</td>
                    <td>{{ $data->induk->koordinat ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Luas Bangunan</td>
                    <td>:</td>
                    <td>{{ $data->induk->luasbangunan ?? '-' }} m²</td>
                    <td>Jumlah Lantai</td>
                    <td>:</td>
                    <td>{{ $data->induk->jumlah_lantai ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Tanggal Terbit</td>
                    <td>:</td>
                    <td>{{ $data->tanggalterbit ? \Carbon\Carbon::parse($data->tanggalterbit)->format('d-m-Y') : '-' }}</td>
                    <td>Keterangan</td>
                    <td>:</td>
                    <td>{{ $data->cadangan1 ?? '-' }}</td>
                </tr>
            </table>

            <!-- DASAR HUKUM -->
            <div class="dasar-hukum mb-3">
                <table class="w-100">
                    <tr class="align-top">
                        <td style="width: 6%;">Dasar</td>
                        <td style="width: 2%;">:</td>
                        <td style="width: 3%;">1.</td>
                        <td style="padding-bottom: 2px;">Peraturan Menteri Pekerjaan Umum Dan Perumahan Rakyat Republik Indonesia Nomor 22/PRT/M/2018 Tentang Pembangunan Bangunan Gedung Negara</td>
                    </tr>
                    <tr class="align-top">
                        <td colspan="2"></td>
                        <td>2.</td>
                        <td>Keputusan Menteri Pekerjaan Umum Dan Perumahan Rakyat Nomor 943/KPTS/M/2024 Tentang Pedoman Perhitungan Standar Harga Satuan Tertinggi Dan Tabel Daftar Komponen Biaya Pembangunan Bangunan Gedung Negara</td>
                    </tr>
                </table>
            </div>

            <!-- TABEL FORM UTAMA (STRUKTUR SAMA PERSIS DENGAN GAMBAR) -->
            <table class="table-form-utama w-100 mb-3">
                <thead>
                    <tr>
                        <th rowspan="3" style="width: 3%;">NO</th>
                        <th rowspan="3" style="width: 13%;">KOMPONEN STANDAR</th>
                        <th rowspan="3" style="width: 6%;">Bobot</th>
                        <th rowspan="2" style="width: 15%;">TAHAP 1 - PENGAMATAN VISUAL ADA/TIDAKNYA KERUSAKAN DAN INDIKASI DAMPAK KESELAMATAN PEMANFAATAN RUANGAN/BANGUNAN</th>
                        <th colspan="5" style="width: 23%;">TAHAP 2 - KLASIFIKASI KERUSAKAN BERDASARKAN KLASIFIKASI KERUSAKAN</th>
                        <th colspan="7" style="width: 27%;">PERHITUNGAN TINGKAT KERUSAKAN KOMPONEN</th>
                        <th rowspan="3" style="width: 13%;">TINGKAT KERUSAKAN</th>
                    </tr>
                    <tr>
                        <th>Tidak Rusak</th>
                        <th>Ringan</th>
                        <th>Sedang</th>
                        <th>Berat</th>
                        <th>Komponen Tidak Sesuai/Tidak Ada</th>
                        <th>1</th>
                        <th>2</th>
                        <th>3</th>
                        <th>4</th>
                        <th>5</th>
                        <th>6</th>
                        <th>7</th>
                    </tr>
                    <tr class="sub-numbers">
                        <th>(1)</th>
                        <th>(2)</th>
                        <th>(3)</th>
                        <th>-</th>
                        <th>-</th>
                        <th>-</th>
                        <th>-</th>
                        <th>-</th>
                        <th>0,00</th>
                        <th>0,20</th>
                        <th>0,35</th>
                        <th>0,50</th>
                        <th>0,70</th>
                        <th>0,85</th>
                        <th>1,00</th>
                    </tr>
                    <tr class="sub-numbers-header">
                        <td colspan="9"></td>
                        <td>(6)</td>
                        <td>(7)</td>
                        <td>(8)</td>
                        <td>(9)</td>
                        <td>(9)</td>
                        <td>(10)</td>
                        <td>(10)</td>
                        <td>(11)</td>
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
                            $hasilPersen = ($nilai * $bobot) * 100;
                            $total += $hasilPersen;

                            // Teks deskripsi visual otomatis berdasarkan nilai/kondisi komponen
                            $visualDesc = 'ADA KERUSAKAN DAN INDIKASI MEMBAHAYAKAN';
                            if($nilai == 0.00 || $nilai == 0.20 || $nilai == 0.50) {
                                $visualDesc = 'TIDAK ADA KERUSAKAN DAN TIDAK ADA INDIKASI MEMBAHAYAKAN';
                            }
                        @endphp
                        <tr>
                            <td class="text-center font-normal">{{ $loop->iteration }}</td>
                            <td class="fw-bold uppercase-text">{{ $item['label'] }}</td>
                            <td class="text-center">{{ number_format($bobot * 100, 2) }}%</td>
                            <td class="visual-text">{{ $visualDesc }}</td>

                            <!-- Checkbox Klasifikasi -->
                            <td class="text-center cell-check">{{ $nilai == 0.00 ? '✓' : '-' }}</td>
                            <td class="text-center cell-check">{{ ($nilai == 0.20 || $nilai == 0.35) ? '✓' : '-' }}</td>
                            <td class="text-center cell-check">{{ ($nilai == 0.50 || $nilai == 0.70) ? '✓' : '-' }}</td>
                            <td class="text-center cell-check">{{ $nilai == 0.85 ? '✓' : '-' }}</td>
                            <td class="text-center cell-check">{{ $nilai == 1.00 ? '✓' : '-' }}</td>

                            <!-- Perhitungan Skala Nilai -->
                            <td class="text-center text-calc">{{ $nilai == 0.00 ? number_format($hasilPersen, 2).'%' : '' }}</td>
                            <td class="text-center text-calc">{{ $nilai == 0.20 ? number_format($hasilPersen, 2).'%' : '' }}</td>
                            <td class="text-center text-calc">{{ $nilai == 0.35 ? number_format($hasilPersen, 2).'%' : '' }}</td>
                            <td class="text-center text-calc">{{ $nilai == 0.50 ? number_format($hasilPersen, 2).'%' : '' }}</td>
                            <td class="text-center text-calc">{{ $nilai == 0.70 ? number_format($hasilPersen, 2).'%' : '' }}</td>
                            <td class="text-center text-calc">{{ $nilai == 0.85 ? number_format($hasilPersen, 2).'%' : '' }}</td>
                            <td class="text-center text-calc">{{ $nilai == 1.00 ? number_format($hasilPersen, 2).'%' : '' }}</td>

                            <!-- Nilai Akhir Komponen -->
                            <td class="text-center fw-bold text-primary">{{ number_format($hasilPersen, 2) }}%</td>
                        </tr>
                    @endforeach

                    <!-- TOTAL VALUE -->
                    @php $totalFinal = min($total, 100); @endphp
                    <tr class="fw-bold row-total">
                        <td colspan="2" class="text-center">TOTAL</td>
                        <td class="text-center">100%</td>
                        <td colspan="12" class="text-end text-uppercase header-total-label">TOTAL NILAI KERUSAKAN BANGUNAN</td>
                        <td class="text-center bg-pink-total text-danger fs-6">{{ number_format($totalFinal, 2) }}%</td>
                    </tr>
                </tbody>
            </table>

            <!-- BAGIAN DATA BAWAH (TANDA TANGAN & PARAMETER) -->
            <div class="row-footer-container">
                <!-- Sisi Kiri: Struktur TTD Pejabat Dinas -->
                <div class="footer-sign-left">
                    <div class="sign-block">
                        <p class="mb-0 fw-bold">Plt. Kepala Dinas Pekerjaan Umum dan Penataan Ruang<br>Kabupaten Blora</p>
                        <div class="space-ttd"></div>
                        <p class="fw-bold mb-0 text-decoration-underline">{{ $data->kepaladinas->namalengkap ?? '...................................................' }}</p>
                    </div>
                    <div class="sign-block">
                        <p class="mb-0 fw-bold">Kepala Bidang Bangunan Gedung<br>&nbsp;</p>
                        <div class="space-ttd"></div>
                        <p class="fw-bold mb-0 text-decoration-underline">{{ $data->kabidbangunangedung->namalengkap ?? '...................................................' }}</p>
                    </div>
                </div>

                <!-- Sisi Tengah: Tim Survey -->
                <div class="footer-survey-center">
                    <p class="fw-bold mb-1 text-decoration-underline">Tim Survey:</p>
                    <table class="w-100 table-surveyors">
                        @php
                            $surveys = [
                                1 => $data->timsurvey1,
                                2 => $data->timsurvey2,
                                3 => $data->timsurvey3,
                                4 => $data->timsurvey4,
                                5 => $data->timsurvey5 ?? null,
                            ];
                        @endphp
                        @foreach($surveys as $i => $petugas)
                            <tr>
                                <td style="width: 8%;">{{ $i }}.</td>
                                <td style="width: 92%; border-bottom: 1px dotted #000;">{{ $petugas->namalengkap ?? '' }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>

                <!-- Sisi Kanan: Kotak Parameter Klasifikasi -->
                <div class="footer-param-right">
                    <table class="table-box-parameter w-100">
                        <thead>
                            <tr>
                                <th colspan="2">Tingkat Kerusakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr><td>Ringan</td><td>: maksimal 30%</td></tr>
                            <tr><td>Sedang</td><td>: maksimal 45%</td></tr>
                            <tr><td>Berat</td><td>: maksimal 65%</td></tr>
                            <tr><td>Sangat Berat</td><td>: lebih dari 65%</td></tr>
                            <tr class="row-status-final text-white fw-bold">
                                <td>STATUS:</td>
                                <td class="text-center text-uppercase">
                                    @if ($totalFinal == 0) TIDAK ADA
                                    @elseif ($totalFinal <= 30) RINGAN
                                    @elseif ($totalFinal <= 45) SEDANG
                                    @elseif ($totalFinal <= 65) BERAT
                                    @else SANGAT BERAT
                                    @endif
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- CATATAN KAKI (NOTE) -->
            <div class="catatan-kaki mt-2">
                <p class="m-0 fw-bold">Note :</p>
                <p class="m-0">* Dinas PU/Dinas yang menangani Bangunan Gedung</p>
            </div>
        </div>

        <!-- ======================================================= -->
        <!-- HALAMAN 2: LAMPIRAN FOTO BUKTI                          -->
        <!-- ======================================================= -->
        <div class="halaman-pdf-page page-break-element">
            <!-- HEADER LAMPIRAN -->
            <div class="text-center mb-3">
                <h5 class="fw-bold text-uppercase m-0 style-judul">LAMPIRAN BUKTI FOTO VISUAL KERUSAKAN</h5>
                <p class="m-0 small text-muted" style="font-size: 11px;">Gedung: {{ $data->induk->namagedung ?? '-' }}</p>
                <div style="border-bottom: 2px solid #000; width: 100%; margin-top: 5px;"></div>
            </div>

            <!-- GRID FOTO LAMPIRAN -->
            @php
                $komponenFoto = [
                    'PONDASI'   => ['f1' => $data->fotopondasi1, 'f2' => $data->fotopondasi2, 'v' => $data->nilaipondasi],
                    'STRUKTUR'  => ['f1' => $data->fotostruktur1, 'f2' => $data->fotostruktur2, 'v' => $data->nilaistruktur],
                    'ATAP'      => ['f1' => $data->fotoatap1, 'f2' => $data->fotoatap2, 'v' => $data->nilaiatap],
                    'LANTAI'    => ['f1' => $data->fotolantai1, 'f2' => $data->fotolantai2, 'v' => $data->nilailantai],
                    'DINDING'   => ['f1' => $data->fotodinding1, 'f2' => $data->fotodinding2, 'v' => $data->nilaidinding],
                    'PLAFON'    => ['f1' => $data->fotoplafon1, 'f2' => $data->fotoplafon2, 'v' => $data->nilaiplafon],
                    'UTILITAS'  => ['f1' => $data->fotoutilitas1, 'f2' => $data->fotoutilitas2, 'v' => $data->nilaiutilitas],
                    'FINISHING' => ['f1' => $data->fotofinishing1, 'f2' => $data->fotofinishing2, 'v' => $data->nilaifinishing],
                ];
            @endphp

            <div class="row g-2">
                @foreach($komponenFoto as $lbl => $f)
                    <div class="col-3">
                        <div class="card border-dark h-100" style="font-size: 10px; border-radius: 0;">
                            <div class="card-header bg-light py-1 fw-bold text-center border-dark border-bottom small rounded-0">
                                {{ $lbl }} (Skala: {{ number_format(floatval($f['v'] ?? 0), 2) }})
                            </div>
                            <div class="card-body p-1 d-flex justify-content-center align-items-center gap-1 bg-white" style="min-height: 100px;">
                                <div class="w-50 text-center">
                                    @if(!empty($f['f1']))
                                        <img src="{{ asset($f['f1']) }}" class="img-fluid border" style="height: 85px; width: 100%; object-fit: cover;">
                                    @else
                                        <div class="text-muted border border-dashed p-2 small" style="height: 85px; font-size: 9px; line-height: 70px;">Kosong</div>
                                    @endif
                                </div>
                                <div class="w-50 text-center">
                                    @if(!empty($f['f2']))
                                        <img src="{{ asset($f['f2']) }}" class="img-fluid border" style="height: 85px; width: 100%; object-fit: cover;">
                                    @else
                                        <div class="text-muted border border-dashed p-2 small" style="height: 85px; font-size: 9px; line-height: 70px;">Kosong</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4 text-end text-muted small" style="font-size: 10px;">
                Dokumen Hasil Analisis Penilaian Kerusakan Fisik Bangunan Gedung Negara - Blora
            </div>
        </div>

    </div>
</div>

<!-- =========================================================== -->
<!-- SCRIPT & CSS REKAYASA STRUKTUR A4 LANDSCAPE                 -->
<!-- =========================================================== -->
<!-- Library HTML2PDF CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

<script>
function downloadPDF() {
    const element = document.getElementById('dokumen-download');

    // Konfigurasi konversi HTML ke PDF
    const opt = {
        margin:       [8, 8, 8, 8], // margin atas, kiri, bawah, kanan (mm)
        filename:     'Formulir_Penilaian_Kerusakan_{{ $data->induk->namagedung ?? "Bangunan" }}.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  { scale: 2, useCORS: true, logging: false },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'landscape' },
        pagebreak:    { mode: ['avoid-all'], before: '.page-break-element' }
    };

    // Eksekusi Download
    html2pdf().set(opt).from(element).save();
}
</script>

<style>
    /* Reset & Dasar Dokumen agar Presisi */
    .pdf-container {
        background: #fff;
        color: #000;
        font-family: 'Arial', 'Helvetica', sans-serif !important;
        padding: 5px;
    }
    .halaman-pdf-page {
        background: #fff;
        box-sizing: border-box;
        width: 100%;
        margin: 0 auto;
    }
    .style-judul {
        font-family: 'Arial Black', Gadget, sans-serif;
        font-size: 15px;
        letter-spacing: 0.5px;
        border-bottom: 2px solid #000;
        padding-bottom: 5px;
        display: inline-block;
        width: 100%;
    }

    /* Tabel Metadata Atas */
    .table-info-gedung td {
        font-size: 10.5px;
        padding: 1px 2px;
        vertical-align: top;
    }

    /* Dasar Hukum */
    .dasar-hukum td {
        font-size: 9.5px;
        line-height: 1.2;
        padding: 0;
    }

    /* Tabel Form Utama Penilaian */
    .table-form-utama {
        border-collapse: collapse;
        width: 100%;
    }
    .table-form-utama th, .table-form-utama td {
        border: 1px solid #000 !important;
        padding: 3px 4px !important;
        vertical-align: middle;
    }
    .table-form-utama th {
        font-size: 9px;
        text-align: center;
        background-color: #f2f2f2 !important;
        font-weight: bold;
    }
    .table-form-utama .sub-numbers th, .table-form-utama .sub-numbers-header td {
        font-size: 8px;
        padding: 1px !important;
        background-color: #fff !important;
        color: #000;
        font-weight: normal;
        text-align: center;
    }
    .table-form-utama tbody td {
        font-size: 10px;
    }
    .table-form-utama .visual-text {
        font-size: 8.5px;
        line-height: 1.1;
    }
    .table-form-utama .cell-check {
        font-size: 11px;
    }
    .table-form-utama .text-calc {
        font-size: 8px;
        color: #555;
    }
    .table-form-utama .row-total td {
        font-size: 10px;
        background-color: #fff !important;
    }
    .table-form-utama .header-total-label {
        font-size: 9.5px;
    }
    .table-form-utama .bg-pink-total {
        background-color: #ffe6e6 !important;
    }

    /* Row Layout Bawah (Signatures, Survey, Parameter) */
    .row-footer-container {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-top: 10px;
        width: 100%;
    }
    .footer-sign-left {
        width: 48%;
        display: flex;
        justify-content: space-between;
        text-center: center;
    }
    .footer-sign-left .sign-block {
        width: 48%;
        text-align: center;
        font-size: 10px;
        line-height: 1.2;
    }
    .footer-sign-left .space-ttd {
        height: 55px;
    }
    .footer-survey-center {
        width: 24%;
        font-size: 9.5px;
        padding-left: 10px;
    }
    .table-surveyors td {
        padding: 1px 2px;
        font-size: 9.5px;
    }
    .footer-param-right {
        width: 25%;
    }
    .table-box-parameter {
        border-collapse: collapse;
        border: 1px solid #000;
    }
    .table-box-parameter th, .table-box-parameter td {
        border: 1px solid #000;
        padding: 2px 4px;
        font-size: 9.5px;
    }
    .table-box-parameter th {
        background-color: #f2f2f2;
        text-align: center;
    }
    .table-box-parameter .row-status-final td {
        background-color: #212529 !important;
    }

    /* Catatan Kaki */
    .catatan-kaki p {
        font-size: 9px;
    }
</style>
