<style>
    /* ===== STYLING KHUSUS UNTUK PDF (dengan !important) ===== */
    .pdf-wrapper-2halaman {
        width: 297mm !important;
        max-width: 100% !important;
        margin: 0 auto !important;
        padding: 0 !important;
        background: #fff !important;
        font-family: 'Arial', sans-serif !important;
        box-sizing: border-box !important;
    }
    .pdf-halaman {
        width: 297mm !important;
        min-height: 210mm !important;
        padding: 8mm 10mm 8mm 10mm !important;
        box-sizing: border-box !important;
        background: #fff !important;
        page-break-after: always !important;
        break-after: page !important;
        overflow: hidden !important;
    }
    .pdf-halaman:last-child {
        page-break-after: avoid !important;
        break-after: avoid !important;
    }

    /* ---- HEADER JUDUL ---- */
    .pdf-judul-utama {
        font-size: 18px !important;
        font-weight: 700 !important;
        text-align: center !important;
        text-transform: uppercase !important;
        border-bottom: 2px solid #000 !important;
        padding-bottom: 4px !important;
        margin-bottom: 8px !important;
        letter-spacing: 0.5px !important;
    }
    .pdf-subjudul {
        font-size: 12px !important;
        text-align: center !important;
        margin: 0 0 6px 0 !important;
        color: #333 !important;
    }

    /* ---- TABEL INFO GEDUNG ---- */
    .pdf-info-gedung {
        width: 100% !important;
        font-size: 10px !important;
        border-collapse: collapse !important;
        margin-bottom: 6px !important;
    }
    .pdf-info-gedung td {
        padding: 2px 3px !important;
        vertical-align: top !important;
    }
    .pdf-info-gedung .label {
        font-weight: 600 !important;
        white-space: nowrap !important;
    }
    .pdf-info-gedung .colon {
        padding: 0 2px !important;
    }
    .pdf-info-gedung .value {
        font-weight: 500 !important;
    }

    /* ---- DASAR HUKUM ---- */
    .pdf-dasar-hukum {
        font-size: 8.5px !important;
        border: 1px solid #aaa !important;
        padding: 4px 6px !important;
        background: #fafafa !important;
        margin-bottom: 6px !important;
    }
    .pdf-dasar-hukum td {
        padding: 1px 2px !important;
        vertical-align: top !important;
    }

    /* ---- TABEL UTAMA ---- */
    .pdf-tabel-utama {
        width: 100% !important;
        border-collapse: collapse !important;
        font-size: 8px !important;
        border: 1px solid #000 !important;
        table-layout: fixed !important;
    }
    .pdf-tabel-utama th,
    .pdf-tabel-utama td {
        border: 1px solid #000 !important;
        padding: 2px 1px !important;
        vertical-align: middle !important;
        text-align: center !important;
        word-wrap: break-word !important;
        overflow-wrap: break-word !important;
    }
    .pdf-tabel-utama th {
        background: #e9ecef !important;
        font-weight: 700 !important;
    }
    .pdf-tabel-utama .sub-header th {
        background: #fff !important;
        font-weight: 400 !important;
        font-size: 7px !important;
    }
    .pdf-tabel-utama .sub-header2 td {
        background: #fff !important;
        font-weight: 400 !important;
        font-size: 6.5px !important;
    }
    .pdf-tabel-utama .tl {
        text-align: left !important;
        padding-left: 4px !important;
    }
    .pdf-tabel-utama .tc {
        text-align: center !important;
    }
    .pdf-tabel-utama .tr {
        text-align: right !important;
        padding-right: 4px !important;
    }
    .pdf-tabel-utama .visual-text {
        font-size: 6.5px !important;
        line-height: 1.2 !important;
        text-align: left !important;
        padding: 2px 3px !important;
    }
    .pdf-tabel-utama .cell-check {
        font-weight: 700 !important;
        font-size: 10px !important;
    }
    .pdf-tabel-utama .text-calc {
        font-size: 7px !important;
    }
    .pdf-tabel-utama .row-total td {
        background: #fff3cd !important;
        font-weight: 700 !important;
        font-size: 8.5px !important;
    }
    .pdf-tabel-utama .bg-pink {
        background: #f8d7da !important;
        color: #a00 !important;
        border: 1.5px solid #a00 !important;
    }

    /* ---- FOOTER ---- */
    .pdf-footer-ttd {
        display: flex !important;
        justify-content: space-between !important;
        align-items: flex-start !important;
        margin-top: 12px !important;
        width: 100% !important;
        font-size: 9px !important;
    }
    .pdf-ttd-left {
        width: 44% !important;
        display: flex !important;
        justify-content: space-between !important;
    }
    .pdf-ttd-left > div {
        width: 48% !important;
        text-align: center !important;
    }
    .pdf-ttd-center {
        width: 24% !important;
        font-size: 8.5px !important;
    }
    .pdf-ttd-right {
        width: 28% !important;
    }
    .pdf-box-status {
        width: 100% !important;
        border-collapse: collapse !important;
        border: 1px solid #000 !important;
        font-size: 8.5px !important;
    }
    .pdf-box-status th,
    .pdf-box-status td {
        border: 1px solid #000 !important;
        padding: 1px 3px !important;
    }
    .pdf-box-status th {
        background: #eee !important;
        text-align: center !important;
    }
    .pdf-box-status .status-final td {
        background: #000 !important;
        color: #fff !important;
        font-weight: 700 !important;
        padding: 2px 4px !important;
    }
    .pdf-catatan {
        font-size: 7.5px !important;
        margin-top: 6px !important;
        border-top: 1px solid #aaa !important;
        padding-top: 4px !important;
    }

    /* ---- LAMPIRAN FOTO (halaman 2) ---- */
    .pdf-grid-foto {
        display: grid !important;
        grid-template-columns: repeat(4, 1fr) !important;
        gap: 6px !important;
        margin-top: 10px !important;
    }
    .pdf-item-foto {
        border: 1px solid #000 !important;
        background: #fff !important;
    }
    .pdf-item-foto .header {
        background: #e9ecef !important;
        font-weight: 700 !important;
        font-size: 8px !important;
        padding: 2px 4px !important;
        text-align: center !important;
        border-bottom: 1px solid #000 !important;
    }
    .pdf-item-foto .body {
        display: flex !important;
        gap: 2px !important;
        padding: 3px !important;
        min-height: 70px !important;
    }
    .pdf-item-foto .body .box {
        flex: 1 !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        background: #fafafa !important;
        border: 1px dashed #aaa !important;
        overflow: hidden !important;
        min-height: 60px !important;
    }
    .pdf-item-foto .body .box img {
        width: 100% !important;
        height: 100% !important;
        object-fit: cover !important;
    }
    .pdf-item-foto .body .box .no-photo {
        font-size: 7px !important;
        color: #aaa !important;
        text-align: center !important;
    }
    .pdf-item-foto .body .box .no-photo {
        font-size: 7px !important;
        color: #aaa !important;
    }

    /* ---- MEDIA PRINT ---- */
    @media print {
        .pdf-halaman {
            page-break-after: always !important;
            break-after: page !important;
        }
        .pdf-halaman:last-child {
            page-break-after: avoid !important;
            break-after: avoid !important;
        }
        .d-print-none {
            display: none !important;
        }
    }
    @media (max-width: 767px) {
        .pdf-wrapper-2halaman { width: 100% !important; }
        .pdf-halaman { width: 100% !important; min-height: auto !important; padding: 6px !important; }
        .pdf-grid-foto { grid-template-columns: repeat(2, 1fr) !important; }
    }
</style>

{{-- ========================================================= --}}
{{-- TOMBOL AKSI (HANYA DI WEB) --}}
{{-- ========================================================= --}}
<div class="d-print-none text-end mb-3">
    <button class="btn btn-secondary btn-sm me-2" onclick="window.history.back();">
        <i class="bi bi-arrow-left"></i> Kembali
    </button>
    <button class="btn btn-primary btn-sm" onclick="unduhPDF2Halaman()">
        <i class="bi bi-file-earmark-pdf"></i> Download PDF (2 Halaman)
    </button>
</div>

{{-- ========================================================= --}}
{{-- AREA YANG DI-PDF (2 HALAMAN) --}}
{{-- ========================================================= --}}
<div id="pdf-area" class="pdf-wrapper-2halaman">

    {{-- ---- HALAMAN 1 ---- --}}
    <div id="halaman1" class="pdf-halaman">
        {{-- JUDUL --}}
        <div class="pdf-judul-utama">FORMULIR PENILAIAN KERUSAKAN BANGUNAN</div>

        {{-- INFO GEDUNG --}}
        <table class="pdf-info-gedung">
            <tr>
                <td class="label">Nama Gedung</td>
                <td class="colon">:</td>
                <td class="value">{{ $data->induk->namagedung ?? '-' }}</td>
                <td class="label">Provinsi</td>
                <td class="colon">:</td>
                <td class="value">Jawa Tengah</td>
            </tr>
            <tr>
                <td class="label">Kode Barang</td>
                <td class="colon">:</td>
                <td class="value">{{ $data->induk->kodebarang ?? '-' }}</td>
                <td class="label">Kabupaten</td>
                <td class="colon">:</td>
                <td class="value">Blora</td>
            </tr>
            <tr>
                <td class="label">Alamat</td>
                <td class="colon">:</td>
                <td class="value">{{ $data->induk->alamat ?? '-' }}</td>
                <td class="label">Koordinat</td>
                <td class="colon">:</td>
                <td class="value">{{ $data->induk->koordinat ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Luas Bangunan</td>
                <td class="colon">:</td>
                <td class="value">{{ $data->induk->luasbangunan ?? '-' }} m²</td>
                <td class="label">Jml Lantai</td>
                <td class="colon">:</td>
                <td class="value">{{ $data->induk->jumlah_lantai ?? '-' }}</td>
            </tr>
            <tr>
                <td class="label">Tanggal Terbit</td>
                <td class="colon">:</td>
                <td class="value">{{ $data->tanggalterbit ? \Carbon\Carbon::parse($data->tanggalterbit)->format('d-m-Y') : '-' }}</td>
                <td class="label">Keterangan</td>
                <td class="colon">:</td>
                <td class="value">{{ $data->cadangan1 ?? '-' }}</td>
            </tr>
        </table>

        {{-- DASAR HUKUM --}}
        <table class="pdf-dasar-hukum">
            <tr><td style="width:6%;">Dasar</td><td style="width:2%;">:</td><td style="width:3%;">1.</td><td>Permen PUPR No. 22/PRT/M/2018</td></tr>
            <tr><td colspan="2"></td><td>2.</td><td>Kepmen PUPR No. 943/KPTS/M/2024</td></tr>
        </table>

        {{-- TABEL UTAMA --}}
        <table class="pdf-tabel-utama">
            <thead>
                <tr>
                    <th rowspan="3" style="width:3%;">NO</th>
                    <th rowspan="3" style="width:10%;">KOMPONEN</th>
                    <th rowspan="3" style="width:4%;">Bobot</th>
                    <th rowspan="2" style="width:14%;">TAHAP 1<br><span style="font-weight:400;font-size:7px;">Visual & Indikasi</span></th>
                    <th colspan="5" style="width:15%;">TAHAP 2 – KLASIFIKASI</th>
                    <th colspan="7" style="width:18%;">PERHITUNGAN</th>
                    <th rowspan="3" style="width:8%;">Tkt<br>Rusak</th>
                </tr>
                <tr>
                    <th>Tdk Rusak</th><th>Ringan</th><th>Sedang</th><th>Berat</th><th>Tdk Sesuai</th>
                    <th>1</th><th>2</th><th>3</th><th>4</th><th>5</th><th>6</th><th>7</th>
                </tr>
                <tr class="sub-header">
                    <th>(1)</th><th>(2)</th><th>(3)</th><th>-</th><th>-</th><th>-</th><th>-</th><th>-</th>
                    <th>0,00</th><th>0,20</th><th>0,35</th><th>0,50</th><th>0,70</th><th>0,85</th><th>1,00</th>
                </tr>
                <tr class="sub-header2">
                    <td colspan="4"></td>
                    <td>-</td><td>-</td><td>-</td><td>-</td><td>-</td>
                    <td>(6)</td><td>(7)</td><td>(8)</td><td>(9)</td><td>(9)</td><td>(10)</td><td>(10)</td>
                    <td></td>
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
                        $visual = (in_array($nilai, [0.00, 0.20, 0.50])) ? 'TIDAK ADA KERUSAKAN' : 'ADA KERUSAKAN';
                    @endphp
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="tl fw-bold">{{ $item['label'] }}</td>
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
                @php $totalFinal = min($total,100); @endphp
                <tr class="row-total">
                    <td colspan="2">TOTAL</td>
                    <td>100%</td>
                    <td colspan="13" class="tr">TOTAL NILAI KERUSAKAN</td>
                    <td class="bg-pink">{{ number_format($totalFinal,2) }}%</td>
                </tr>
            </tbody>
        </table>

        {{-- FOOTER --}}
        <div class="pdf-footer-ttd">
            <div class="pdf-ttd-left">
                <div>
                    <p class="fw-bold mb-0">Plt. Kepala Dinas PUPR<br>Kab. Blora</p>
                    <div style="height:45px;"></div>
                    <p class="fw-bold text-decoration-underline">{{ $data->kepaladinas->namalengkap ?? '................................' }}</p>
                </div>
                <div>
                    <p class="fw-bold mb-0">Kepala Bidang BG</p>
                    <div style="height:45px;"></div>
                    <p class="fw-bold text-decoration-underline">{{ $data->kabidbangunangedung->namalengkap ?? '................................' }}</p>
                </div>
            </div>
            <div class="pdf-ttd-center">
                <p class="fw-bold text-decoration-underline">Tim Survey:</p>
                @for($i=1; $i<=4; $i++)
                    @php $petugas = $data->{"timsurvey{$i}"} ?? null; @endphp
                    <p style="font-size:8.5px; margin:2px 0;">{{ $i }}. {{ $petugas->namalengkap ?? '_________________' }}</p>
                @endfor
            </div>
            <div class="pdf-ttd-right">
                <table class="pdf-box-status">
                    <tr><th colspan="2">Tingkat Kerusakan</th></tr>
                    <tr><td>Ringan</td><td>≤ 30%</td></tr>
                    <tr><td>Sedang</td><td>≤ 45%</td></tr>
                    <tr><td>Berat</td><td>≤ 65%</td></tr>
                    <tr><td>Sgt Berat</td><td>> 65%</td></tr>
                    <tr class="status-final">
                        <td>STATUS</td>
                        <td style="text-align:center; text-transform:uppercase;">
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
        <div class="pdf-catatan">
            <p class="fw-bold mb-0">Note :</p>
            <p class="mb-0">* Dinas PU / Dinas yang menangani Bangunan Gedung</p>
        </div>
    </div>

    {{-- ---- HALAMAN 2: LAMPIRAN FOTO ---- --}}
    <div id="halaman2" class="pdf-halaman">
        <div class="pdf-judul-utama">LAMPIRAN BUKTI FOTO VISUAL KERUSAKAN</div>
        <p class="pdf-subjudul">Nama Gedung: {{ $data->induk->namagedung ?? '-' }}</p>

        <div class="pdf-grid-foto">
            @php
                $fotoItems = [
                    'PONDASI'   => ['f1'=>$data->fotopondasi1,'f2'=>$data->fotopondasi2,'v'=>$data->nilaipondasi],
                    'STRUKTUR'  => ['f1'=>$data->fotostruktur1,'f2'=>$data->fotostruktur2,'v'=>$data->nilaistruktur],
                    'ATAP'      => ['f1'=>$data->fotoatap1,'f2'=>$data->fotoatap2,'v'=>$data->nilaiatap],
                    'LANTAI'    => ['f1'=>$data->fotolantai1,'f2'=>$data->fotolantai2,'v'=>$data->nilailantai],
                    'DINDING'   => ['f1'=>$data->fotodinding1,'f2'=>$data->fotodinding2,'v'=>$data->nilaidinding],
                    'PLAFON'    => ['f1'=>$data->fotoplafon1,'f2'=>$data->fotoplafon2,'v'=>$data->nilaiplafon],
                    'UTILITAS'  => ['f1'=>$data->fotoutilitas1,'f2'=>$data->fotoutilitas2,'v'=>$data->nilaiutilitas],
                    'FINISHING' => ['f1'=>$data->fotofinishing1,'f2'=>$data->fotofinishing2,'v'=>$data->nilaifinishing],
                ];
            @endphp
            @foreach($fotoItems as $label => $f)
                <div class="pdf-item-foto">
                    <div class="header">{{ $label }} ({{ number_format(floatval($f['v'] ?? 0),2) }})</div>
                    <div class="body">
                        <div class="box">
                            @if(!empty($f['f1']))
                                <img src="{{ asset($f['f1']) }}" alt="Foto 1">
                            @else
                                <span class="no-photo">Kosong</span>
                            @endif
                        </div>
                        <div class="box">
                            @if(!empty($f['f2']))
                                <img src="{{ asset($f['f2']) }}" alt="Foto 2">
                            @else
                                <span class="no-photo">Kosong</span>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

{{-- ========================================================= --}}
{{-- SCRIPT UNTUK UNDUH PDF 2 HALAMAN --}}
{{-- ========================================================= --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
    async function unduhPDF2Halaman() {
        const { jsPDF } = window.jspdf;

        // Ambil kedua elemen halaman
        const halaman1 = document.getElementById('halaman1');
        const halaman2 = document.getElementById('halaman2');

        if (!halaman1 || !halaman2) {
            alert('Elemen halaman tidak ditemukan!');
            return;
        }

        // Sembunyikan tombol (opsional)
        // Tidak perlu

        // Render halaman 1
        const canvas1 = await html2canvas(halaman1, {
            scale: 2,
            useCORS: true,
            allowTaint: true,
            backgroundColor: '#ffffff',
            logging: false,
            width: halaman1.scrollWidth,
            height: halaman1.scrollHeight,
        });

        // Render halaman 2
        const canvas2 = await html2canvas(halaman2, {
            scale: 2,
            useCORS: true,
            allowTaint: true,
            backgroundColor: '#ffffff',
            logging: false,
            width: halaman2.scrollWidth,
            height: halaman2.scrollHeight,
        });

        // Buat PDF ukuran A4 Landscape (297 x 210 mm)
        const pdf = new jsPDF({
            orientation: 'landscape',
            unit: 'mm',
            format: 'a4',
        });

        // Dapatkan ukuran halaman PDF
        const pdfWidth = pdf.internal.pageSize.getWidth();
        const pdfHeight = pdf.internal.pageSize.getHeight();

        // Fungsi untuk menambahkan gambar ke halaman PDF
        function addImageToPage(canvas) {
            const imgData = canvas.toDataURL('image/jpeg', 0.95);
            const imgWidth = canvas.width;
            const imgHeight = canvas.height;

            // Hitung rasio agar gambar muat dalam halaman PDF
            const ratio = Math.min(pdfWidth / (imgWidth / 2.8346), pdfHeight / (imgHeight / 2.8346));
            const finalWidth = (imgWidth / 2.8346) * ratio;
            const finalHeight = (imgHeight / 2.8346) * ratio;
            const x = (pdfWidth - finalWidth) / 2;
            const y = (pdfHeight - finalHeight) / 2;

            pdf.addImage(imgData, 'JPEG', x, y, finalWidth, finalHeight);
        }

        // Tambahkan halaman 1
        addImageToPage(canvas1);

        // Tambahkan halaman 2 (halaman baru)
        pdf.addPage();
        addImageToPage(canvas2);

        // Simpan PDF
        pdf.save('Formulir_Penilaian_Kerusakan_{{ $data->induk->namagedung ?? "Gedung" }}.pdf');
    }
</script>

