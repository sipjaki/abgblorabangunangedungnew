    <style>
        .halaman-downloadperhitungan {
            width: 297mm;
            max-width: 100%;
            margin: 0 auto;
            background: white;
            padding: 12px 16px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            box-sizing: border-box;
        }
        .halaman-pdf-page {
            width: 100%;
            box-sizing: border-box;
        }
        .page-break-element {
            margin-top: 25px;
            padding-top: 15px;
            border-top: 2px dashed #aaa;
        }
        .style-judul-utama {
            font-weight: 700;
            font-size: 16px;
            border-bottom: 2px solid #000;
            padding-bottom: 6px;
            margin-bottom: 10px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        /* TABEL INFO GEDUNG */
        .table-info-gedung {
            width: 100%;
            font-size: 11px;
            margin-bottom: 8px;
            border-collapse: collapse;
        }
        .table-info-gedung td {
            padding: 2px 4px;
            vertical-align: top;
        }
        .table-info-gedung .label {
            font-weight: 600;
            white-space: nowrap;
        }
        .dasar-hukum {
            font-size: 9px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            padding: 6px 8px;
            background: #fafafa;
        }
        .dasar-hukum td {
            padding: 1px 2px;
            vertical-align: top;
        }
        /* TABEL UTAMA */
        .table-form-utama {
            width: 100%;
            border-collapse: collapse;
            table-layout: fixed;
            font-size: 8.5px;
            border: 1px solid #000;
        }
        .table-form-utama th,
        .table-form-utama td {
            border: 1px solid #000;
            padding: 3px 2px;
            vertical-align: middle;
            text-align: center;
            word-wrap: break-word;
            overflow-wrap: break-word;
        }
        .table-form-utama th {
            background-color: #e9ecef;
            font-weight: 700;
        }
        .table-form-utama .sub-numbers th,
        .table-form-utama .sub-numbers-header td {
            background: #fff;
            font-weight: normal;
            font-size: 7.5px;
        }
        .table-form-utama tbody td.fw-bold {
            text-align: left;
            padding-left: 6px;
        }
        .table-form-utama .visual-text {
            font-size: 7px;
            text-align: left !important;
            padding: 2px 4px !important;
            line-height: 1.2;
        }
        .table-form-utama .cell-check {
            font-weight: 700;
            font-size: 11px;
        }
        .table-form-utama .text-calc {
            font-size: 7.5px;
        }
        .table-form-utama .row-total td {
            background: #fff;
            font-size: 9px;
            font-weight: 700;
        }
        .table-form-utama .header-total-label {
            text-align: right !important;
            padding-right: 6px !important;
        }
        .table-form-utama .bg-pink-total {
            background-color: #ffe0e0 !important;
            border: 1.5px solid red !important;
        }
        /* FOOTER */
        .row-footer-container {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 18px;
            width: 100%;
        }
        .footer-sign-left {
            width: 44%;
            display: flex;
            justify-content: space-between;
        }
        .footer-sign-left .sign-block {
            width: 48%;
            text-align: center;
            font-size: 10px;
        }
        .footer-sign-left .space-ttd {
            height: 50px;
        }
        .footer-survey-center {
            width: 24%;
            font-size: 9px;
        }
        .footer-survey-center .table-surveyors td {
            padding: 1px 2px;
            font-size: 9px;
            border-bottom: 1px dotted #000;
        }
        .footer-param-right {
            width: 26%;
        }
        .table-box-parameter {
            border-collapse: collapse;
            border: 1px solid #000;
            width: 100%;
            font-size: 9px;
        }
        .table-box-parameter th,
        .table-box-parameter td {
            border: 1px solid #000;
            padding: 2px 4px;
        }
        .table-box-parameter .row-status-final td {
            background: #000 !important;
            color: #fff !important;
            font-weight: 700;
            text-align: center;
        }
        .catatan-kaki {
            margin-top: 12px;
            font-size: 8.5px;
            border-top: 1px solid #ccc;
            padding-top: 6px;
        }
        .catatan-kaki p {
            margin: 0;
        }
        /* LAMPIRAN FOTO */
        .foto-grid .card {
            border: 1px solid #000;
            border-radius: 0;
        }
        .foto-grid .card-header {
            background: #f1f1f1;
            font-weight: 700;
            font-size: 9px;
            border-bottom: 1px solid #000;
            padding: 4px 2px;
        }
        .foto-grid .card-body {
            padding: 4px;
            min-height: 90px;
        }
        .foto-grid img {
            width: 100%;
            height: 75px;
            object-fit: cover;
            border: 1px solid #ccc;
        }
        .foto-grid .empty-photo {
            height: 75px;
            background: #fafafa;
            border: 1px dashed #ccc;
            font-size: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
        }
        /* TOMBOL */
        .d-print-none {
            margin-bottom: 20px;
        }
        @media print {
            body { background: white; padding: 0; }
            .d-print-none { display: none !important; }
            .halaman-downloadperhitungan { box-shadow: none; padding: 10px; }
            .page-break-element { page-break-before: always; border-top: none; margin-top: 10px; }
        }
        @media (max-width: 767px) {
            .halaman-downloadperhitungan { width: 100%; padding: 8px; }
            .table-form-utama { font-size: 7px; }
            .table-form-utama th, .table-form-utama td { padding: 1px; }
        }
    </style>

    <!-- ========================================================= -->
    <!-- TOMBOL AKSI (DI LUAR AREA CETAK) -->
    <!-- ========================================================= -->
    <div class="d-print-none text-end mb-3">
        {{-- <button class="btn btn-secondary btn-sm me-2" onclick="window.history.back();">
            <i class="bi bi-arrow-left"></i> Kembali
        </button> --}}
        <button class="button-baru" data-bs-toggle="modal" data-bs-target="#modalPreviewCetak">
            <i class="bi bi-eye"></i> Preview
        </button>
        <button class="button-berkas" onclick="prosesUnduhPDF()">
            <i class="bi bi-file-earmark-pdf"></i> Download PDF
        </button>
    </div>

    <!-- ========================================================= -->
    <!-- AREA UTAMA YANG AKAN DI-CETAK / DI-PDF -->
    <!-- ========================================================= -->
    <div id="area-cetak-langsung" class="halaman-downloadperhitungan">

        <!-- ---- HALAMAN 1: FORMULIR UTAMA ---- -->
        <div class="halaman-pdf-page">

            <!-- JUDUL -->
            <div class="text-center style-judul-utama">
                FORMULIR PENILAIAN KERUSAKAN BANGUNAN
            </div>

            <!-- INFO GEDUNG -->
            <table class="table-info-gedung">
                <tr>
                    <td class="label">Nama Gedung</td><td>:</td><td class="fw-bold">{{ $data->induk->namagedung ?? '-' }}</td>
                    <td class="label">Provinsi</td><td>:</td><td>Jawa Tengah</td>
                </tr>
                <tr>
                    <td class="label">Kode Barang</td><td>:</td><td>{{ $data->induk->kodebarang ?? '-' }}</td>
                    <td class="label">Kabupaten/Kota</td><td>:</td><td>Blora</td>
                </tr>
                <tr>
                    <td class="label">Alamat</td><td>:</td><td>{{ $data->induk->alamat ?? '-' }}</td>
                    <td class="label">Koordinat</td><td>:</td><td>{{ $data->induk->koordinat ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Luas Bangunan</td><td>:</td><td>{{ $data->induk->luasbangunan ?? '-' }} m²</td>
                    <td class="label">Jumlah Lantai</td><td>:</td><td>{{ $data->induk->jumlah_lantai ?? '-' }}</td>
                </tr>
                <tr>
                    <td class="label">Tanggal Terbit</td><td>:</td><td>{{ $data->tanggalterbit ? \Carbon\Carbon::parse($data->tanggalterbit)->format('d-m-Y') : '-' }}</td>
                    <td class="label">Keterangan</td><td>:</td><td>{{ $data->cadangan1 ?? '-' }}</td>
                </tr>
            </table>

            <!-- DASAR HUKUM -->
            <div class="dasar-hukum">
                <table style="width:100%;">
                    <tr><td style="width:6%;">Dasar</td><td style="width:2%;">:</td><td style="width:3%;">1.</td><td>Peraturan Menteri Pekerjaan Umum dan Perumahan Rakyat RI No. 22/PRT/M/2018</td></tr>
                    <tr><td colspan="2"></td><td>2.</td><td>Keputusan Menteri PUPR No. 943/KPTS/M/2024 tentang Pedoman Perhitungan Standar Harga Satuan Tertinggi</td></tr>
                </table>
            </div>

            <!-- TABEL UTAMA (17 KOLOM) -->
            <table class="table-form-utama">
                <thead>
                    <tr>
                        <th rowspan="3" style="width:3%;">NO</th>
                        <th rowspan="3" style="width:10%;">KOMPONEN<br>STANDAR</th>
                        <th rowspan="3" style="width:4%;">Bobot</th>
                        <th rowspan="2" style="width:14%;">TAHAP 1<br><span style="font-weight:400; font-size:7px;">Pengamatan Visual Ada/Tidaknya Kerusakan & Indikasi Dampak Keselamatan</span></th>
                        <th colspan="5" style="width:15%;">TAHAP 2 – KLASIFIKASI KERUSAKAN</th>
                        <th colspan="7" style="width:18%;">PERHITUNGAN TINGKAT KERUSAKAN KOMPONEN</th>
                        <th rowspan="3" style="width:8%;">TINGKAT KERUSAKAN<br>(11)</th>
                    </tr>
                    <tr>
                        <th style="width:3%;">Tidak Rusak</th>
                        <th style="width:3%;">Ringan</th>
                        <th style="width:3%;">Sedang</th>
                        <th style="width:3%;">Berat</th>
                        <th style="width:3%;">Tdk Sesuai</th>
                        <th style="width:2.5%;">1</th>
                        <th style="width:2.5%;">2</th>
                        <th style="width:2.5%;">3</th>
                        <th style="width:2.5%;">4</th>
                        <th style="width:2.5%;">5</th>
                        <th style="width:2.5%;">6</th>
                        <th style="width:2.5%;">7</th>
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
                        <td colspan="4"></td>
                        <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
                        <td>(6)</td><td>(7)</td><td>(8)</td><td>(9)</td><td>(9)</td><td>(10)</td><td>(10)</td>
                        <td></td>
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
                            $hasil = ($nilai * $bobot) * 100;
                            $total += $hasil;

                            $visualDesc = 'ADA KERUSAKAN & INDIKASI BERBAHAYA';
                            if (in_array($nilai, [0.00, 0.20, 0.50])) {
                                $visualDesc = 'TIDAK ADA KERUSAKAN & TIDAK BERBAHAYA';
                            }
                        @endphp
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-bold text-start">{{ $item['label'] }}</td>
                            <td>{{ number_format($bobot*100, 0) }}%</td>
                            <td class="visual-text">{{ $visualDesc }}</td>

                            <td class="cell-check">{{ $nilai == 0.00 ? '✓' : '' }}</td>
                            <td class="cell-check">{{ in_array($nilai, [0.20,0.35]) ? '✓' : '' }}</td>
                            <td class="cell-check">{{ in_array($nilai, [0.50,0.70]) ? '✓' : '' }}</td>
                            <td class="cell-check">{{ $nilai == 0.85 ? '✓' : '' }}</td>
                            <td class="cell-check">{{ $nilai == 1.00 ? '✓' : '' }}</td>

                            <td class="text-calc">{{ $nilai == 0.00 ? number_format($hasil,2).'%' : '' }}</td>
                            <td class="text-calc">{{ $nilai == 0.20 ? number_format($hasil,2).'%' : '' }}</td>
                            <td class="text-calc">{{ $nilai == 0.35 ? number_format($hasil,2).'%' : '' }}</td>
                            <td class="text-calc">{{ $nilai == 0.50 ? number_format($hasil,2).'%' : '' }}</td>
                            <td class="text-calc">{{ $nilai == 0.70 ? number_format($hasil,2).'%' : '' }}</td>
                            <td class="text-calc">{{ $nilai == 0.85 ? number_format($hasil,2).'%' : '' }}</td>
                            <td class="text-calc">{{ $nilai == 1.00 ? number_format($hasil,2).'%' : '' }}</td>

                            <td class="fw-bold">{{ number_format($hasil,2) }}%</td>
                        </tr>
                    @endforeach

                    @php $totalFinal = min($total, 100); @endphp
                    <tr class="row-total">
                        <td colspan="2">TOTAL</td>
                        <td>100%</td>
                        <td colspan="13" class="header-total-label">TOTAL NILAI KERUSAKAN BANGUNAN</td>
                        <td class="bg-pink-total text-danger">{{ number_format($totalFinal,2) }}%</td>
                    </tr>
                </tbody>
            </table>

            <!-- FOOTER: TTD + SURVEY + PARAMETER -->
            <div class="row-footer-container">
                <div class="footer-sign-left">
                    <div class="sign-block">
                        <p class="fw-bold mb-0">Plt. Kepala Dinas PUPR<br>Kab. Blora</p>
                        <div class="space-ttd"></div>
                        <p class="fw-bold text-decoration-underline">{{ $data->kepaladinas->namalengkap ?? '................................' }}</p>
                    </div>
                    <div class="sign-block">
                        <p class="fw-bold mb-0">Kepala Bidang Bangunan Gedung</p>
                        <div class="space-ttd"></div>
                        <p class="fw-bold text-decoration-underline">{{ $data->kabidbangunangedung->namalengkap ?? '................................' }}</p>
                    </div>
                </div>

                <div class="footer-survey-center">
                    <p class="fw-bold text-decoration-underline">Tim Survey:</p>
                    <table class="table-surveyors w-100">
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
                            <tr><td style="width:8%;">{{ $i }}.</td><td style="width:92%;">{{ $petugas->namalengkap ?? '' }}</td></tr>
                        @endforeach
                    </table>
                </div>

                <div class="footer-param-right">
                    <table class="table-box-parameter">
                        <tr><th colspan="2">Tingkat Kerusakan</th></tr>
                        <tr><td>Ringan</td><td>: maksimal 30%</td></tr>
                        <tr><td>Sedang</td><td>: maksimal 45%</td></tr>
                        <tr><td>Berat</td><td>: maksimal 65%</td></tr>
                        <tr><td>Sangat Berat</td><td>: > 65%</td></tr>
                        <tr class="row-status-final">
                            <td>STATUS:</td>
                            <td class="text-uppercase">
                                @if($totalFinal == 0) TIDAK ADA
                                @elseif($totalFinal <= 30) RINGAN
                                @elseif($totalFinal <= 45) SEDANG
                                @elseif($totalFinal <= 65) BERAT
                                @else SANGAT BERAT
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="catatan-kaki">
                <p class="fw-bold">Note :</p>
                <p>* Dinas PU / Dinas yang menangani Bangunan Gedung</p>
            </div>
        </div>

        <!-- ---- HALAMAN 2: LAMPIRAN FOTO ---- -->
        <div class="halaman-pdf-page page-break-element">
            <div class="text-center style-judul-utama" style="border-bottom-color:#aaa;">
                LAMPIRAN BUKTI FOTO VISUAL KERUSAKAN
            </div>
            <p class="text-center small">Nama Gedung : {{ $data->induk->namagedung ?? '-' }}</p>

            <div class="row foto-grid g-2">
                @php
                    $fotoItems = [
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

                @foreach($fotoItems as $label => $f)
                    <div class="col-3">
                        <div class="card border-dark">
                            <div class="card-header text-center">{{ $label }} ({{ number_format(floatval($f['v'] ?? 0),2) }})</div>
                            <div class="card-body d-flex gap-1">
                                <div class="w-50">
                                    @if(!empty($f['f1']))
                                        <img src="{{ asset($f['f1']) }}" alt="Foto 1">
                                    @else
                                        <div class="empty-photo">Kosong</div>
                                    @endif
                                </div>
                                <div class="w-50">
                                    @if(!empty($f['f2']))
                                        <img src="{{ asset($f['f2']) }}" alt="Foto 2">
                                    @else
                                        <div class="empty-photo">Kosong</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
    <!-- ===== AKHIR AREA CETAK ===== -->

    <!-- ========================================================= -->
    <!-- MODAL PREVIEW (full-screen) -->
    <!-- ========================================================= -->
    <div class="modal fade" id="modalPreviewCetak" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content">
                <div class="modal-header bg-dark text-white py-1">
                    <h6 class="modal-title"><i class="bi bi-eye"></i> Preview Laporan</h6>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body bg-secondary p-3 d-flex justify-content-center" style="overflow:auto;">
                    <div id="area-preview-modal" class="bg-white shadow-lg p-3" style="width:297mm; min-height:210mm; transform:scale(0.95); transform-origin:top center;">
                        <!-- diisi javascript -->
                    </div>
                </div>
                <div class="modal-footer py-1">
                    <button class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Tutup</button>
                    <button class="btn btn-primary btn-sm" onclick="prosesUnduhPDF()"><i class="bi bi-download"></i> Download</button>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Copy konten ke modal preview
        document.getElementById('modalPreviewCetak').addEventListener('show.bs.modal', function() {
            const src = document.getElementById('area-cetak-langsung').innerHTML;
            document.getElementById('area-preview-modal').innerHTML = src;
        });

        function prosesUnduhPDF() {
            const element = document.querySelector('.halaman-downloadperhitungan');
            const opt = {
                margin: [8, 10, 8, 10],
                filename: 'Formulir_Penilaian_Kerusakan_{{ $data->induk->namagedung ?? "Gedung" }}.pdf',
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: {
                    scale: 2,
                    useCORS: true,
                    allowTaint: true,
                    backgroundColor: '#ffffff',
                    logging: false
                },
                jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' },
                pagebreak: { mode: ['avoid-all'], before: '.page-break-element' }
            };
            html2pdf().set(opt).from(element).save();
        }
    </script>

