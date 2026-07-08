<style>
    /* ========================================================= */
    /* STYLE KHUSUS UNTUK PDF 2 HALAMAN A4 LANDSCAPE            */
    /* ========================================================= */
    .pdf-wrapper {
        width: 297mm;
        max-width: 100%;
        margin: 0 auto;
        background: #ffffff;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Arial', sans-serif;
        color: #000000;
    }

    .pdf-page {
        width: 100%;
        min-height: 210mm; /* A4 Landscape height */
        padding: 12mm 10mm 10mm 10mm;
        box-sizing: border-box;
        background: #ffffff;
        page-break-after: avoid;
        break-after: avoid;
    }

    .page-1 {
        page-break-after: always;
        break-after: page;
    }

    .page-2 {
        page-break-before: always;
        break-before: page;
    }

    /* ---- HEADER ---- */
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

    /* ---- TABEL INFO GEDUNG ---- */
    .table-info-gedung {
        width: 100%;
        font-size: 9.5px;
        border-collapse: collapse;
        margin-bottom: 6px;
    }
    .table-info-gedung td {
        padding: 2px 4px;
        vertical-align: top;
    }
    .table-info-gedung .label {
        font-weight: 600;
        width: 12%;
    }

    /* ---- DASAR HUKUM ---- */
    .dasar-hukum {
        font-size: 8px;
        border: 1px solid #aaa;
        padding: 3px 6px;
        background: #f9f9f9;
        margin-bottom: 6px;
    }
    .dasar-hukum table {
        width: 100%;
    }
    .dasar-hukum td {
        padding: 1px 2px;
        vertical-align: top;
    }

    /* ---- TABEL UTAMA (17 KOLOM) ---- */
    .tabel-utama {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed;
        font-size: 7.5px;
        border: 1px solid #000;
    }
    .tabel-utama th,
    .tabel-utama td {
        border: 1px solid #000;
        padding: 2px 1px;
        vertical-align: middle;
        text-align: center;
        word-wrap: break-word;
        overflow-wrap: break-word;
    }
    .tabel-utama th {
        background-color: #e9ecef;
        font-weight: 700;
        font-size: 7px;
    }
    .tabel-utama .sub-header th {
        background: #fff;
        font-weight: 400;
        font-size: 6.5px;
        padding: 0 1px;
    }
    .tabel-utama .text-start {
        text-align: left !important;
        padding-left: 4px;
    }
    .tabel-utama .visual-text {
        font-size: 6.5px;
        text-align: left !important;
        padding: 1px 3px !important;
        line-height: 1.2;
    }
    .tabel-utama .cell-check {
        font-weight: 700;
        font-size: 10px;
    }
    .tabel-utama .text-calc {
        font-size: 6.5px;
    }
    .tabel-utama .total-row td {
        background: #fff3cd;
        font-weight: 700;
        font-size: 8px;
    }
    .tabel-utama .bg-pink-total {
        background: #f8d7da !important;
        border: 1.5px solid #a00 !important;
        color: #a00;
    }
    .tabel-utama .header-total-label {
        text-align: right !important;
        padding-right: 4px !important;
    }

    /* ---- FOOTER TTD & STATUS ---- */
    .footer-ttd {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-top: 12px;
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
    .ttd-left .space-ttd {
        height: 40px;
    }
    .ttd-center {
        width: 24%;
        font-size: 8.5px;
    }
    .ttd-center table {
        width: 100%;
        border-collapse: collapse;
    }
    .ttd-center td {
        padding: 1px 2px;
        border-bottom: 1px dotted #000;
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
    .box-status .status-final td {
        background: #000 !important;
        color: #fff !important;
        font-weight: 700;
        text-align: center;
    }

    .catatan-kaki {
        font-size: 7.5px;
        margin-top: 6px;
        border-top: 1px solid #aaa;
        padding-top: 4px;
    }
    .catatan-kaki p {
        margin: 0;
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

    /* ---- RESPONSIF ---- */
    @media (max-width: 767px) {
        .pdf-wrapper { width: 100%; }
        .pdf-page { padding: 8mm 5mm; min-height: 100vh; }
        .grid-foto { grid-template-columns: repeat(2, 1fr); }
        .tabel-utama { font-size: 6px; }
        .tabel-utama th, .tabel-utama td { padding: 1px; }
    }

    /* ---- PRINT ---- */
    @media print {
        body { background: #fff; margin: 0; }
        .pdf-wrapper { box-shadow: none; }
        .pdf-page { min-height: 100vh; }
        .d-print-none { display: none !important; }
        .page-1 { page-break-after: always; }
        .page-2 { page-break-before: always; }
    }
</style>

<!-- ========================================================= -->
<!-- TOMBOL AKSI (di luar area cetak) -->
<!-- ========================================================= -->
<div class="d-print-none text-end mb-3">
    <button class="btn btn-secondary btn-sm me-2" onclick="window.history.back();">
        <i class="bi bi-arrow-left"></i> Kembali
    </button>
    <button class="btn btn-info btn-sm me-2" data-bs-toggle="modal" data-bs-target="#modalPreviewCetak">
        <i class="bi bi-eye"></i> Preview
    </button>
    <button class="btn btn-primary btn-sm" onclick="prosesUnduhPDF()">
        <i class="bi bi-file-earmark-pdf"></i> Download PDF (2 Halaman)
    </button>
</div>

<!-- ========================================================= -->
<!-- AREA CETAK PDF (2 HALAMAN) -->
<!-- ========================================================= -->
<div id="area-cetak-pdf" class="pdf-wrapper">

    <!-- ========== HALAMAN 1 ========== -->
    <div class="pdf-page page-1">

        <!-- HEADER -->
        <div class="header-form">
            <div class="judul-utama">FORMULIR PENILAIAN KERUSAKAN BANGUNAN</div>
        </div>

        <!-- INFO GEDUNG -->
        <table class="table-info-gedung">
            <tr>
                <td class="label">Nama Gedung</td><td>:</td><td class="fw-bold">{{ $data->induk->namagedung ?? '-' }}</td>
                <td class="label" style="width:12%;">Provinsi</td><td>:</td><td>Jawa Tengah</td>
            </tr>
            <tr>
                <td class="label">Kode Barang</td><td>:</td><td>{{ $data->induk->kodebarang ?? '-' }}</td>
                <td class="label">Kabupaten</td><td>:</td><td>Blora</td>
            </tr>
            <tr>
                <td class="label">Alamat</td><td>:</td><td>{{ $data->induk->alamat ?? '-' }}</td>
                <td class="label">Koordinat</td><td>:</td><td>{{ $data->induk->koordinat ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Luas Bangunan</td><td>:</td><td>{{ $data->induk->luasbangunan ?? '-' }} m²</td>
                <td class="label">Jml Lantai</td><td>:</td><td>{{ $data->induk->jumlah_lantai ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Tanggal Terbit</td><td>:</td><td>{{ $data->tanggalterbit ? \Carbon\Carbon::parse($data->tanggalterbit)->format('d-m-Y') : '-' }}</td>
                <td class="label">Keterangan</td><td>:</td><td>{{ $data->cadangan1 ?? '-' }}</td>
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
                    <th rowspan="3" style="width:10%;">KOMPONEN</th>
                    <th rowspan="3" style="width:4%;">Bobot</th>
                    <th rowspan="2" style="width:14%;">TAHAP 1<br><span style="font-weight:400;font-size:6.5px;">Visual & Indikasi</span></th>
                    <th colspan="5" style="width:15%;">TAHAP 2 – KLASIFIKASI</th>
                    <th colspan="7" style="width:18%;">PERHITUNGAN</th>
                    <th rowspan="3" style="width:8%;">Tkt<br>Kerusakan</th>
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
                    $komponenData = [
                        'pondasi'   => ['label'=>'PONDASI','bobot'=>0.10,'nilai'=>$data->nilaipondasi],
                        'struktur'  => ['label'=>'STRUKTUR','bobot'=>0.33,'nilai'=>$data->nilaistruktur],
                        'atap'      => ['label'=>'ATAP','bobot'=>0.10,'nilai'=>$data->nilaiatap],
                        'lantai'    => ['label'=>'LANTAI','bobot'=>0.07,'nilai'=>$data->nilailantai],
                        'dinding'   => ['label'=>'DINDING','bobot'=>0.10,'nilai'=>$data->nilaidinding],
                        'plafon'    => ['label'=>'PLAFON','bobot'=>0.07,'nilai'=>$data->nilaiplafon],
                        'utilitas'  => ['label'=>'UTILITAS','bobot'=>0.08,'nilai'=>$data->nilaiutilitas],
                        'finishing' => ['label'=>'FINISHING','bobot'=>0.15,'nilai'=>$data->nilaifinishing],
                    ];
                    $total = 0;
                @endphp
                @foreach($komponenData as $key => $item)
                    @php
                        $nilai = floatval($item['nilai'] ?? 0);
                        $bobot = $item['bobot'];
                        $hasil = ($nilai * $bobot) * 100;
                        $total += $hasil;
                        $visual = (in_array($nilai, [0.00, 0.20, 0.50])) ? 'TIDAK ADA KERUSAKAN' : 'ADA KERUSAKAN';
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-start fw-bold">{{ $item['label'] }}</td>
                        <td>{{ number_format($bobot*100,0) }}%</td>
                        <td class="visual-text">{{ $visual }}</td>
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
                <tr class="total-row">
                    <td colspan="2">TOTAL</td>
                    <td>100%</td>
                    <td colspan="13" class="header-total-label">TOTAL NILAI KERUSAKAN BANGUNAN</td>
                    <td class="bg-pink-total">{{ number_format($totalFinal,2) }}%</td>
                </tr>
            </tbody>
        </table>

        <!-- FOOTER TTD DAN STATUS -->
        <div class="footer-ttd">
            <div class="ttd-left">
                <div>
                    <p class="fw-bold mb-0">Plt. Kepala Dinas PUPR<br>Kab. Blora</p>
                    <div class="space-ttd"></div>
                    <p class="fw-bold text-decoration-underline">{{ $data->kepaladinas->namalengkap ?? '................................' }}</p>
                </div>
                <div>
                    <p class="fw-bold mb-0">Kepala Bidang Bangunan Gedung</p>
                    <div class="space-ttd"></div>
                    <p class="fw-bold text-decoration-underline">{{ $data->kabidbangunangedung->namalengkap ?? '................................' }}</p>
                </div>
            </div>
            <div class="ttd-center">
                <p class="fw-bold text-decoration-underline">Tim Survey:</p>
                <table>
                    @for($i=1;$i<=4;$i++)
                        @php $petugas = $data->{"timsurvey{$i}"} ?? null; @endphp
                        <tr><td style="width:10%;">{{ $i }}.</td><td style="width:90%;">{{ $petugas->namalengkap ?? '_________________' }}</td></tr>
                    @endfor
                </table>
            </div>
            <div class="ttd-right">
                <table class="box-status">
                    <tr><th colspan="2">Tingkat Kerusakan</th></tr>
                    <tr><td>Ringan</td><td>≤ 30%</td></tr>
                    <tr><td>Sedang</td><td>≤ 45%</td></tr>
                    <tr><td>Berat</td><td>≤ 65%</td></tr>
                    <tr><td>Sangat Berat</td><td>> 65%</td></tr>
                    <tr class="status-final">
                        <td>STATUS</td>
                        <td>
                            @if($totalFinal==0) TIDAK ADA
                            @elseif($totalFinal<=30) RINGAN
                            @elseif($totalFinal<=45) SEDANG
                            @elseif($totalFinal<=65) BERAT
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

    </div> <!-- end page-1 -->

    <!-- ========== HALAMAN 2 ========== -->
    <div class="pdf-page page-2">

        <div class="header-form">
            <div class="judul-utama">LAMPIRAN BUKTI FOTO VISUAL KERUSAKAN</div>
            <p class="sub-judul">Nama Gedung: {{ $data->induk->namagedung ?? '-' }}</p>
        </div>

        <div class="grid-foto">
            @php
                $fotoItems = [
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
            @foreach($fotoItems as $lbl => $f)
                <div class="item-foto">
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
            @endforeach
        </div>

    </div> <!-- end page-2 -->

</div> <!-- end pdf-wrapper -->

<!-- ========================================================= -->
<!-- MODAL PREVIEW -->
<!-- ========================================================= -->
<div class="modal fade d-print-none" id="modalPreviewCetak" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header bg-dark text-white py-1">
                <h6 class="modal-title"><i class="bi bi-eye"></i> Preview Laporan</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body bg-secondary p-3 d-flex justify-content-center" style="overflow:auto;">
                <div id="area-preview-modal" class="bg-white shadow-lg p-3" style="width:297mm; min-height:210mm; transform:scale(0.95); transform-origin:top center;">
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
<script>
    // Copy konten ke modal preview
    document.getElementById('modalPreviewCetak').addEventListener('show.bs.modal', function() {
        document.getElementById('area-preview-modal').innerHTML = document.getElementById('area-cetak-pdf').innerHTML;
    });

    function prosesUnduhPDF() {
        const element = document.getElementById('area-cetak-pdf');
        const opt = {
            margin:       [6, 8, 6, 8],
            filename:     'Formulir_Penilaian_Kerusakan_{{ $data->induk->namagedung ?? "Gedung" }}.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  {
                scale: 2,
                useCORS: true,
                allowTaint: true,
                backgroundColor: '#ffffff',
                logging: false
            },
            jsPDF:        { unit: 'mm', format: 'a4', orientation: 'landscape' },
            pagebreak:    { mode: 'css' }
        };
        html2pdf().set(opt).from(element).save();
    }
</script>
