
<div class="container-fluid mt-4 px-4">

    <!-- TOMBOL AKSI (di luar area cetak) -->
    <div class="d-flex justify-content-end gap-2 mb-4 d-print-none">
        <a href="{{ route('bebantekanalisarusakshow', ['namagedung' => $data->induk->namagedung ?? 'tanpa-nama', 'id' => $data->induk->id ?? 0]) }}" class="btn btn-secondary shadow-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
        <button onclick="unduhPDF()" class="btn btn-primary shadow-sm fw-bold">
            <i class="bi bi-file-earmark-pdf-fill me-1"></i> Download PDF (2 Halaman)
        </button>
    </div>

    <!-- ========================================================= -->
    <!-- AREA CETAK PDF: 2 HALAMAN A4 LANDSCAPE                    -->
    <!-- ========================================================= -->
    <div id="area-cetak-pdf" class="pdf-wrapper">

        <!-- ============ HALAMAN 1 ============ -->
        <div class="pdf-page pdf-page-1">
            <!-- HEADER -->
            <div class="header-form">
                <div class="judul-utama">FORMULIR PENILAIAN KERUSAKAN BANGUNAN</div>
            </div>

            <!-- METADATA -->
            <table class="info-gedung">
                <tr>
                    <td style="width:12%;">Nama Gedung</td><td style="width:1%;">:</td><td style="width:37%;" class="fw-bold">{{ $data->induk->namagedung ?? '-' }}</td>
                    <td style="width:12%;">Provinsi</td><td style="width:1%;">:</td><td style="width:37%;">Jawa Tengah</td>
                </tr>
                <tr>
                    <td>Kode Barang</td><td>:</td><td>{{ $data->induk->kodebarang ?? '-' }}</td>
                    <td>Kabupaten</td><td>:</td><td>Blora</td>
                </tr>
                <tr>
                    <td>Alamat</td><td>:</td><td>{{ $data->induk->alamat ?? '-' }}</td>
                    <td>Koordinat</td><td>:</td><td>{{ $data->induk->koordinat ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Luas Bangunan</td><td>:</td><td>{{ $data->induk->luasbangunan ?? '-' }} m²</td>
                    <td>Jml Lantai</td><td>:</td><td>{{ $data->induk->jumlah_lantai ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Tanggal Terbit</td><td>:</td><td>{{ $data->tanggalterbit ? \Carbon\Carbon::parse($data->tanggalterbit)->format('d-m-Y') : '-' }}</td>
                    <td>Keterangan</td><td>:</td><td>{{ $data->cadangan1 ?? '-' }}</td>
                </tr>
            </table>

            <!-- DASAR HUKUM -->
            <div class="dasar-hukum">
                <table>
                    <tr><td style="width:6%;">Dasar</td><td style="width:2%;">:</td><td style="width:3%;">1.</td><td>Permen PUPR No. 22/PRT/M/2018</td></tr>
                    <tr><td colspan="2"></td><td>2.</td><td>Kepmen PUPR No. 943/KPTS/M/2024</td></tr>
                </table>
            </div>

            <!-- TABEL UTAMA -->
            <table class="tabel-utama">
                <thead>
                    <tr>
                        <th rowspan="3" style="width:3%;">NO</th>
                        <th rowspan="3" style="width:11%;">KOMPONEN</th>
                        <th rowspan="3" style="width:5%;">Bobot</th>
                        <th rowspan="2" style="width:16%;">TAHAP 1<br><span style="font-weight:400;">Visual & Indikasi</span></th>
                        <th colspan="5" style="width:20%;">TAHAP 2 – KLASIFIKASI</th>
                        <th colspan="7" style="width:25%;">PERHITUNGAN TINGKAT KERUSAKAN</th>
                        <th rowspan="3" style="width:10%;">Tkt Kerusakan<br>(11)</th>
                    </tr>
                    <tr>
                        <th>Tdk Rusak</th><th>Ringan</th><th>Sedang</th><th>Berat</th><th>Tdk Sesuai</th>
                        <th>1</th><th>2</th><th>3</th><th>4</th><th>5</th><th>6</th><th>7</th>
                    </tr>
                    <tr class="sub-header">
                        <th colspan="5">(1) (2) (3) - - - - - -</th>
                        <th>0,00</th><th>0,20</th><th>0,35</th><th>0,50</th><th>0,70</th><th>0,85</th><th>1,00</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $komponen = [
                            'pondasi'   => ['label'=>'PONDASI','bobot'=>0.10],
                            'struktur'  => ['label'=>'STRUKTUR','bobot'=>0.33],
                            'atap'      => ['label'=>'ATAP','bobot'=>0.10],
                            'lantai'    => ['label'=>'LANTAI','bobot'=>0.07],
                            'dinding'   => ['label'=>'DINDING','bobot'=>0.10],
                            'plafon'    => ['label'=>'PLAFON','bobot'=>0.07],
                            'utilitas'  => ['label'=>'UTILITAS','bobot'=>0.08],
                            'finishing' => ['label'=>'FINISHING','bobot'=>0.15],
                        ];
                        $total = 0;
                    @endphp
                    @foreach($komponen as $key => $item)
                        @php
                            $nilai = floatval($data->{"nilai$key"} ?? 0);
                            $bobot = $item['bobot'];
                            $hasil = ($nilai * $bobot) * 100;
                            $total += $hasil;
                            $visual = ($nilai == 0.00 || $nilai == 0.20 || $nilai == 0.50) ? 'TIDAK ADA KERUSAKAN' : 'ADA KERUSAKAN';
                        @endphp
                        <tr>
                            <td class="tc">{{ $loop->iteration }}</td>
                            <td class="tl fw-bold">{{ $item['label'] }}</td>
                            <td class="tc">{{ number_format($bobot*100,0) }}%</td>
                            <td class="tl kecil">{{ $visual }}</td>
                            <td class="tc">{{ $nilai == 0.00 ? '✓' : '' }}</td>
                            <td class="tc">{{ ($nilai == 0.20 || $nilai == 0.35) ? '✓' : '' }}</td>
                            <td class="tc">{{ ($nilai == 0.50 || $nilai == 0.70) ? '✓' : '' }}</td>
                            <td class="tc">{{ $nilai == 0.85 ? '✓' : '' }}</td>
                            <td class="tc">{{ $nilai == 1.00 ? '✓' : '' }}</td>
                            <td class="tc">{{ $nilai == 0.00 ? number_format($hasil,2).'%' : '' }}</td>
                            <td class="tc">{{ $nilai == 0.20 ? number_format($hasil,2).'%' : '' }}</td>
                            <td class="tc">{{ $nilai == 0.35 ? number_format($hasil,2).'%' : '' }}</td>
                            <td class="tc">{{ $nilai == 0.50 ? number_format($hasil,2).'%' : '' }}</td>
                            <td class="tc">{{ $nilai == 0.70 ? number_format($hasil,2).'%' : '' }}</td>
                            <td class="tc">{{ $nilai == 0.85 ? number_format($hasil,2).'%' : '' }}</td>
                            <td class="tc">{{ $nilai == 1.00 ? number_format($hasil,2).'%' : '' }}</td>
                            <td class="tc fw-bold">{{ number_format($hasil,2) }}%</td>
                        </tr>
                    @endforeach
                    @php $total = min($total,100); @endphp
                    <tr class="total-row">
                        <td colspan="2" class="tc">TOTAL</td>
                        <td class="tc">100%</td>
                        <td colspan="13" class="tr fw-bold">TOTAL NILAI KERUSAKAN</td>
                        <td class="tc bg-pink fw-bold">{{ number_format($total,2) }}%</td>
                    </tr>
                </tbody>
            </table>

            <!-- FOOTER TTD DAN STATUS -->
            <div class="footer-ttd">
                <div class="ttd-left">
                    <div>
                        <p class="mb-0 fw-bold">Plt. Kepala Dinas PUPR<br>Kab. Blora</p>
                        <div style="height:40px;"></div>
                        <p class="mb-0 text-decoration-underline fw-bold">{{ $data->kepaladinas->namalengkap ?? '........................................' }}</p>
                    </div>
                    <div>
                        <p class="mb-0 fw-bold">Kepala Bidang Bangunan Gedung</p>
                        <div style="height:40px;"></div>
                        <p class="mb-0 text-decoration-underline fw-bold">{{ $data->kabidbangunangedung->namalengkap ?? '........................................' }}</p>
                    </div>
                </div>
                <div class="ttd-center">
                    <p class="fw-bold mb-1 text-decoration-underline">Tim Survey:</p>
                    @for($i=1;$i<=4;$i++)
                        @php $petugas = $data->{"timsurvey{$i}"} ?? null; @endphp
                        <p class="mb-0" style="font-size:9px;">{{ $i }}. {{ $petugas->namalengkap ?? '_________________' }}</p>
                    @endfor
                </div>
                <div class="ttd-right">
                    <table class="box-status">
                        <tr><th colspan="2">Tingkat Kerusakan</th></tr>
                        <tr><td>Ringan</td><td>≤ 30%</td></tr>
                        <tr><td>Sedang</td><td>≤ 45%</td></tr>
                        <tr><td>Berat</td><td>≤ 65%</td></tr>
                        <tr><td>Sangat Berat</td><td>> 65%</td></tr>
                        <tr class="status-final">
                            <td style="background:#000;color:#fff;">STATUS</td>
                            <td style="background:#000;color:#fff;text-align:center;">
                                @if($total==0) TIDAK ADA
                                @elseif($total<=30) RINGAN
                                @elseif($total<=45) SEDANG
                                @elseif($total<=65) BERAT
                                @else SANGAT BERAT
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="catatan-kaki">
                <p class="mb-0 fw-bold">Note :</p>
                <p class="mb-0">* Dinas PU / Dinas yang menangani Bangunan Gedung</p>
            </div>
        </div>

        <!-- ============ HALAMAN 2 ============ -->
        <div class="pdf-page pdf-page-2 page-break">
            <div class="header-form">
                <div class="judul-utama">LAMPIRAN BUKTI FOTO VISUAL KERUSAKAN</div>
                <p class="sub-judul">Nama Gedung: {{ $data->induk->namagedung ?? '-' }}</p>
            </div>

            <div class="grid-foto">
                @php
                    $fotoKomponen = [
                        'PONDASI'   => [$data->fotopondasi1 ?? null, $data->fotopondasi2 ?? null, $data->nilaipondasi ?? 0],
                        'STRUKTUR'  => [$data->fotostruktur1 ?? null, $data->fotostruktur2 ?? null, $data->nilaistruktur ?? 0],
                        'ATAP'      => [$data->fotoatap1 ?? null, $data->fotoatap2 ?? null, $data->nilaiatap ?? 0],
                        'LANTAI'    => [$data->fotolantai1 ?? null, $data->fotolantai2 ?? null, $data->nilailantai ?? 0],
                        'DINDING'   => [$data->fotodinding1 ?? null, $data->fotodinding2 ?? null, $data->nilaidinding ?? 0],
                        'PLAFON'    => [$data->fotoplafon1 ?? null, $data->fotoplafon2 ?? null, $data->nilaiplafon ?? 0],
                        'UTILITAS'  => [$data->fotoutilitas1 ?? null, $data->fotoutilitas2 ?? null, $data->nilaiutilitas ?? 0],
                        'FINISHING' => [$data->fotofinishing1 ?? null, $data->fotofinishing2 ?? null, $data->nilaifinishing ?? 0],
                    ];
                @endphp
                @foreach($fotoKomponen as $lbl => $f)
                    <div class="item-foto">
                        <div class="card-foto">
                            <div class="card-header-foto">{{ $lbl }} ({{ number_format(floatval($f[2]),2) }})</div>
                            <div class="card-body-foto">
                                <div class="foto-box">
                                    @if($f[0])
                                        <img src="{{ asset($f[0]) }}" alt="{{ $lbl }} 1">
                                    @else
                                        <div class="no-foto">Kosong</div>
                                    @endif
                                </div>
                                <div class="foto-box">
                                    @if($f[1])
                                        <img src="{{ asset($f[1]) }}" alt="{{ $lbl }} 2">
                                    @else
                                        <div class="no-foto">Kosong</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

<!-- ========================================================= -->
<!-- MODAL PREVIEW (Opsional)                                  -->
<!-- ========================================================= -->

<!-- SCRIPTS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
function unduhPDF() {
    const element = document.getElementById('area-cetak-pdf');

    const opt = {
        margin:       [5, 5, 5, 5],
        filename:     'Formulir_Penilaian_Kerusakan_{{ $data->induk->namagedung ?? "Gedung" }}.pdf',
        image:        { type: 'jpeg', quality: 0.98 },
        html2canvas:  {
            scale: 2,
            useCORS: true,
            allowTaint: true,
            backgroundColor: '#ffffff',
            logging: false,
            windowWidth: element.scrollWidth,
            windowHeight: element.scrollHeight
        },
        jsPDF:        { unit: 'mm', format: 'a4', orientation: 'landscape' },
        pagebreak:    { mode: ['avoid-all', 'css', 'legacy'] }
    };

    html2pdf().set(opt).from(element).save();
}
</script>

<!-- ========================================================= -->
<!-- CSS KHUSUS UNTUK PDF 2 HALAMAN LANDSCAPE                  -->
<!-- ========================================================= -->
<style>
    /* ---- WRAPPER UTAMA ---- */
    .pdf-wrapper {
        width: 297mm;
        max-width: 100%;
        background: #fff;
        margin: 0 auto;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
        color: #000;
    }

    /* ---- SETIAP HALAMAN ---- */
    .pdf-page {
        width: 100%;
        min-height: 210mm;
        padding: 12mm 10mm 10mm 10mm;
        box-sizing: border-box;
        background: #fff;
        page-break-after: always;
        break-after: page;
        position: relative;
    }
    .pdf-page:last-child {
        page-break-after: avoid;
        break-after: avoid;
    }

    /* ---- HEADER FORM ---- */
    .header-form {
        text-align: center;
        border-bottom: 2px solid #000;
        padding-bottom: 4px;
        margin-bottom: 8px;
    }
    .judul-utama {
        font-size: 16px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .sub-judul {
        font-size: 12px;
        margin: 0;
        color: #333;
    }

    /* ---- METADATA ---- */
    .info-gedung {
        width: 100%;
        font-size: 9.5px;
        border-collapse: collapse;
        margin-bottom: 4px;
    }
    .info-gedung td {
        padding: 1px 2px;
        vertical-align: top;
    }
    .info-gedung .fw-bold {
        font-weight: 700;
    }

    /* ---- DASAR HUKUM ---- */
    .dasar-hukum {
        font-size: 8.5px;
        margin-bottom: 4px;
        border: 1px solid #aaa;
        padding: 3px 5px;
        background: #fafafa;
    }
    .dasar-hukum td {
        padding: 1px 2px;
        vertical-align: top;
    }

    /* ---- TABEL UTAMA ---- */
    .tabel-utama {
        width: 100%;
        border-collapse: collapse;
        font-size: 7.5px;
        border: 1px solid #000;
        table-layout: fixed;
    }
    .tabel-utama th,
    .tabel-utama td {
        border: 1px solid #000;
        padding: 1px 1px;
        vertical-align: middle;
        text-align: center;
        word-wrap: break-word;
        overflow: hidden;
    }
    .tabel-utama th {
        background: #f0f0f0;
        font-weight: 700;
        font-size: 7px;
    }
    .tabel-utama .sub-header th {
        background: #fff;
        font-weight: 400;
        font-size: 6.5px;
        padding: 0px 1px;
    }
    .tabel-utama .tl { text-align: left; padding-left: 3px; }
    .tabel-utama .tc { text-align: center; }
    .tabel-utama .tr { text-align: right; padding-right: 3px; }
    .tabel-utama .kecil { font-size: 6.5px; line-height: 1.2; }
    .tabel-utama .fw-bold { font-weight: 700; }
    .tabel-utama .total-row td {
        background: #fff3cd;
        font-weight: 700;
        font-size: 8px;
    }
    .tabel-utama .bg-pink {
        background: #f8d7da;
        color: #a00;
        border: 1.5px solid #a00;
    }

    /* ---- FOOTER TTD ---- */
    .footer-ttd {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-top: 10px;
        width: 100%;
        font-size: 9px;
    }
    .ttd-left {
        width: 44%;
        display: flex;
        justify-content: space-between;
    }
    .ttd-left > div {
        width: 48%;
        text-align: center;
    }
    .ttd-center {
        width: 24%;
        font-size: 8.5px;
    }
    .ttd-right {
        width: 28%;
    }
    .box-status {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #000;
        font-size: 8.5px;
    }
    .box-status th,
    .box-status td {
        border: 1px solid #000;
        padding: 1px 3px;
    }
    .box-status th {
        background: #eee;
        text-align: center;
    }
    .status-final td {
        font-weight: 700;
        padding: 2px 4px;
    }
    .catatan-kaki {
        font-size: 7.5px;
        margin-top: 6px;
        border-top: 1px solid #aaa;
        padding-top: 3px;
    }

    /* ---- HALAMAN 2 : GRID FOTO ---- */
    .grid-foto {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 6px;
        margin-top: 8px;
    }
    .item-foto {
        border: 1px solid #000;
        background: #fff;
        border-radius: 0;
    }
    .card-header-foto {
        background: #e9ecef;
        font-weight: 700;
        font-size: 8px;
        padding: 2px 4px;
        text-align: center;
        border-bottom: 1px solid #000;
    }
    .card-body-foto {
        display: flex;
        flex-direction: column;
        gap: 2px;
        padding: 3px;
        min-height: 80px;
    }
    .foto-box {
        flex: 1;
        min-height: 35px;
        display: flex;
        align-items: center;
        justify-content: center;
        background: #fafafa;
        border: 1px dashed #aaa;
        overflow: hidden;
    }
    .foto-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .no-foto {
        font-size: 7px;
        color: #aaa;
        text-align: center;
    }

    /* ---- PAGE BREAK ---- */
    .page-break {
        page-break-before: always;
        break-before: page;
    }

    /* ---- MEDIA PRINT (opsional) ---- */
    @media print {
        .pdf-wrapper {
            width: 100%;
            padding: 0;
        }
        .pdf-page {
            padding: 10mm 8mm;
            min-height: 100vh;
        }
        .d-print-none {
            display: none !important;
        }
        .page-break {
            page-break-before: always;
            break-before: page;
        }
    }
</style>
