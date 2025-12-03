<style>
    .zebra-table {
    width: 100%;
    border-collapse: collapse;
    font-family: 'Poppins', sans-serif;
    font-size: 14px;
    border: 1px solid #e5e7eb;
}

.zebra-table th {
    background-color: #ADD8E6; /* biru muda */
    color: black;
    text-align: center;
    padding: 8px 12px;
    border: 1px solid #e5e7eb;
    white-space: nowrap;
}

.zebra-table td {
    text-align: center;
    padding: 8px 12px;
    border: 1px solid #e5e7eb;
    white-space: nowrap;
}

.zebra-table tbody tr:nth-child(odd) {
    background-color: #ffffff;
}

.zebra-table tbody tr:nth-child(even) {
    background-color: #f1f1f1;
}

.zebra-table tbody tr:hover {
    background-color: #ffd100 !important;
}

th {
    background-color: #ADD8E6;
}

</style>

@include('backend.00_administrator.00_baganterpisah.01_header')

<!--begin::Body-->
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
 <!--begin::App Wrapper-->
 <div class="app-wrapper">
{{-- ---------------------------------------------------------------------- --}}

@include('backend.00_administrator.00_baganterpisah.04_navbar')
@include('backend.00_administrator.00_baganterpisah.09_button')
{{-- ---------------------------------------------------------------------- --}}

   @include('backend.00_administrator.00_baganterpisah.03_sidebar')
   @include('frontend.android.00_fiturmenu.06_alert')
<style>
    @page {
      size: A4;
      margin: 0;
    }
    body {
      font-family: 'Poppins', sans-serif;
      margin: 0;
      background: #f2f2f2;
      font-size: 12px;
    }
    .halaman {
      width: 21cm;
      height: 29.7cm;
      margin: auto;
      background: white;
      padding: 2cm;
      box-sizing: border-box;
      border: 1px solid black;
    }
    .kop {
      text-align: center;
      border-bottom: 2px solid black;
      padding-bottom: 10px;
      margin-bottom: 20px;
    }
    .kop h3 {
      margin: 2px 0;
      font-size: 16px;
    }
    .kop p {
      margin: 4px 0;
      font-size: 13px;
    }
    .logo {
      height: 80px;
    }
    .judul-surat {
      text-align: center;
      font-weight: bold;
      text-decoration: underline;
      margin-bottom: 20px;
      font-size: 14px;
    }
    .isi-surat p {
      text-align: justify;
      line-height: 1.6;
      margin-bottom: 10px;
    }
    .tabel-info {
      width: 100%;
      margin-top: 20px;
      border-collapse: collapse;
      font-size: 12px;
    }
    .tabel-info td {
      padding: 4px;
    }
    .ttd {
      text-align: right;
      margin-top: 40px;
    }
    @media print {
      body {
        background: white;
      }
    }

  </style>
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!-- Navbar, Sidebar, dan komponen lainnya -->

        <!--begin::App Main-->
        <main class="app-main">
            <!--begin::App Content Header-->
            <!--begin::App Content-->
            <div class="container-fluid">
                <!--begin::Row-->
                <div class="row" style="margin-right: 10px; margin-left:10px;">
                    <div class="card mb-4">
                        <div class="card-header">
    <div class="no-print"
         style="display: flex; justify-content: flex-end; align-items: center; gap: 10px; margin-bottom: 5px;">


        <button class="button-modern" onclick="downloadPDF()" style="display: inline-flex; align-items: center;">
            <i class="bi bi-download" style="margin-right: 5px;"></i> Download Berita Acara (PDF)
        </button>

        <a href="{{ url()->previous() }}"
           class="button-modern"
           style="text-decoration: none; display: inline-flex; align-items: center;">
            <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
        </a>

    </div>
</div>


                        <div class="card-body">
                            <!-- Halaman Berita Acara -->
                            <div class="halaman">
                                <div class="kop" style="margin-top: -55px;">
                                    <img src="/assets/abgblora/logo/logokabupatenblora.png" class="logo" style="float: left;">
                                    <div style="display: inline-block;">
                                        <h3><strong style="font-size: 18px; margin: 0; font-family: 'Times New Roman', Times, serif;">PEMERINTAH KABUPATEN BLORA</strong></h3>
                                        <h3><strong style="font-size: 18px; margin: 0; font-family: 'Times New Roman', Times, serif;">DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</strong></h3>
                                        <p><strong style="font-size: 18px; margin: 0; font-family: 'Times New Roman', Times, serif;">Jl. Nusantara No. 62 Telp. (0296) 531004</strong></p>
                                        <h3><strong style="font-size: 18px; margin: 0; font-family: 'Times New Roman', Times, serif;">BLORA 58214</strong></h3>
                                    </div>
                                    <div style="clear: both;"></div>
                                </div>

                                <div style="font-family: 'Times New Roman', serif; font-size: 12px; line-height: 1.0; margin-bottom:4px;">
                                    <!-- Judul -->
                                    <div style="text-align: center; font-weight: bold; font-size: 14px; margin-top: -15px; font-family: 'Times New Roman', Times, serif;">
                                        BERITA ACARA HASIL KONSULTASI ke-{{ $surat->konsultasike ?? '-' }}<br>
                                        Nomor: 050/{{ $surat->tpatpt->timpenilai ?? '-' }}-{{ $surat->pbgslfbangunan->noregissimbg ?? 'Data Kosong' }}/{{ $surat->konsultasike ?? '1' }}/2025
                                    </div>

                                    <!-- Paragraf Pembuka -->
                                    <br>
                                    <p style="margin-top: -15px; font-size: 14px; line-height: 1.5;  font-family: 'Times New Roman', Times, serif;">
                                        Konsultasi {{ $surat->tpatpt->timpenilai ?? '-' }} Kabupaten Blora yang memeriksa dokumen rencana teknis pada hari
                                        {{ \Carbon\Carbon::parse($surat->tanggalkehadiran ?? now())->translatedFormat('l') }}
                                        {{-- <span id="tanggal-terbilang" style="font-size: 14px;font-family: 'Times New Roman', Times, serif;"></span> --}}
                                        bulan {{ \Carbon\Carbon::parse($surat->tanggalkehadiran ?? now())->translatedFormat('F') }}
                                        tahun Dua Ribu Dua Puluh Lima untuk :
                                    </p>

                                    <!-- Tabel Data Informasi Umum -->
                                    <table style="width: 100%; border-collapse: collapse; font-size: 14px; margin-top:5px;">
                                        <tr>
                                            <td style="width: 35%; border: 1px solid #000; padding: 2px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                No. Registrasi
                                            </td>
                                            <td style="border: 1px solid #000; padding: 2px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                {{ $surat->pbgslfbangunan->noregissimbg ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; padding: 2px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                Nama Pemohon
                                            </td>
                                            <td style="border: 1px solid #000; padding: 2px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                {{ $surat->datapemilik->namapemilik ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; padding: 2px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                Alamat Pemohon
                                            </td>
                                            <td style="border: 1px solid #000; padding: 2px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                {{ $surat->datapemilik->alamatpemilik ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; padding: 2px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                Jenis Permohonan
                                            </td>
                                            <td style="border: 1px solid #000; padding: 2px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                {{ $surat->databangunanpbg->jenisperkonsultasi->jenis ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; padding: 2px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                Nama Bangunan
                                            </td>
                                            <td style="border: 1px solid #000; padding: 2px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                {{ $surat->databangunanpbg->namabangunan ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; padding: 2px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                Fungsi Bangunan
                                            </td>
                                            <td style="border: 1px solid #000; padding: 2px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                {{ $surat->databangunanpbg->fungsibangunanpbg->fungsi ?? '-' }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; padding: 2px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                Luas Bangunan
                                            </td>
                                            <td style="border: 1px solid #000; padding: 2px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                {{ $surat->databangunanpbg->luasbangunan ?? '-' }} m&sup2;
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="border: 1px solid #000; padding: 2px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                Lokasi Bangunan
                                            </td>
                                            <td style="border: 1px solid #000; padding: 2px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                {{ $surat->databangunanpbg->lokasibangunan ?? '-' }}
                                            </td>
                                        </tr>
                                    </table>

                                    <br>
                                    <!-- Tabel Pemeriksaan Teknis -->
                                    <table style="width: 100%; border: 1px solid #000; border-collapse: collapse; font-size: 14px; margin-top: -10px;">
                                        <thead>
                                            <tr>
                                                <th style="border: 1px solid #000; padding: 1.75px; text-align:center; font-size: 14px; font-family: 'Times New Roman', Times, serif;" >
                                                    No
                                                </th>
                                                <th style="border: 1px solid #000; padding: 1.75px; text-align:center; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                    URAIAN DOKUMEN TEKNIS
                                                </th>
                                                <th style="border: 1px solid #000; padding: 1.75px; text-align:center; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                    ADA
                                                </th>
                                                <th style="border: 1px solid #000; padding: 1.75px; text-align:center; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                    TIDAK ADA
                                                </th>
                                                <th style="border: 1px solid #000; padding: 1.75px; text-align:center; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                    SESUAI
                                                </th>
                                                <th style="border: 1px solid #000; padding: 1.75px; text-align:center; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                    TIDAK SESUAI
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: center; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">1</td>
                                                <td style="border: 1px solid #000; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">Pemeriksaan Arsitektur</td>
                                                <td style="border: 1px solid #000; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;"></td>
                                                <td style="border: 1px solid #000; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;"></td>
                                                <td style="border: 1px solid #000; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;"></td>
                                                <td style="border: 1px solid #000; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;"></td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: center; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">2</td>
                                                <td style="border: 1px solid #000; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">Pemeriksaan Struktur</td>
                                                <td style="border: 1px solid #000; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;"></td>
                                                <td style="border: 1px solid #000; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;"></td>
                                                <td style="border: 1px solid #000; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;"></td>
                                                <td style="border: 1px solid #000; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;"></td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: center; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">3</td>
                                                <td style="border: 1px solid #000; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">Pemeriksaan M E P</td>
                                                <td style="border: 1px solid #000; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;"></td>
                                                <td style="border: 1px solid #000; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;"></td>
                                                <td style="border: 1px solid #000; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;"></td>
                                                <td style="border: 1px solid #000; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;"></td>
                                            </tr>
                                            <tr>
                                                <td style="border: 1px solid #000; text-align: center; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">4</td>
                                                <td style="border: 1px solid #000; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">Data Teknis Gedung Eksisting</td>
                                                <td style="border: 1px solid #000; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;"></td>
                                                <td style="border: 1px solid #000; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;"></td>
                                                <td style="border: 1px solid #000; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;"></td>
                                                <td style="border: 1px solid #000; padding: 1.75px; font-size: 14px; font-family: 'Times New Roman', Times, serif;"></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <br>
                                    <!-- Rekomendasi -->
                                    <div style="width: 100%; max-width: 700px; margin: 0 auto; margin-top: -10px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                        <p><strong style="margin-top: 5px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">Rekomendasi:</strong></p>
                                        <table style="border-collapse: collapse; width: 100%; font-size: 14px; margin-top: -15px; font-family: 'Times New Roman', Times, serif;">
                                            <tbody>
                                                <tr style="border: 1px solid #444;">
                                                    <td style="border: 1px solid #444; padding: 2px; width: 50px; text-align: center; font-size: 14px; font-family: 'Times New Roman', Times, serif;">☐</td>
                                                    <td style="border: 1px solid #444; padding: 2px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">Tanpa Perbaikan</td>
                                                </tr>
                                                <tr style="border: 1px solid #444; background-color: #f9f9f9;">
                                                    <td style="border: 1px solid #444; padding: 2px; text-align: center; font-size: 14px; font-family: 'Times New Roman', Times, serif;">☐</td>
                                                    <td style="border: 1px solid #444; padding: 2px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">Dengan Perbaikan</td>
                                                </tr>
                                                <tr style="border: 1px solid #444;">
                                                    <td style="border: 1px solid #444; padding: 2px; text-align: center; font-size: 14px; font-family: 'Times New Roman', Times, serif;">☐</td>
                                                    <td style="border: 1px solid #444; padding: 2px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">Permohonan Ditolak/Dikembalikan</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Catatan & Tabel Pengawas -->
                                    @php
                                        $listPengawas = [];
                                        for ($i = 1; $i <= 12; $i++) {
                                            $nama = $surat->tpatpt->{'pengawas'.$i}->namalengkap ?? null;
                                            if (!empty($nama)) {
                                                $listPengawas[] = [
                                                    'no' => $i,
                                                    'pengawas' => [
                                                        1 => 'M. ARIF HIDAYAT, ST',
                                                        2 => 'ANEX FACHRIAN ST. MT.'
                                                    ][$i] ?? '',
                                                    'tpa' => $nama
                                                ];
                                            }
                                        }
                                        $jumlahBaris = count($listPengawas);
                                    @endphp

                                    <p>
                                        <strong style="margin-top: 5px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">Catatan:</strong>
                                    </p>
                                    <div style="border: 1px solid #000; min-height: {{ 50 + (12 - $jumlahBaris) * 20 }}px; padding: 8px; margin-top:-15px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                    </div>
                                    <br>

                                    <!-- Tabel Tanda Tangan -->
                                    <table style="width: 100%; border-collapse: collapse; font-size: 14px; margin-top: -15px;">
                                        <thead>
                                            <tr>
                                                <th style="border: 1px solid #000; text-align: center; padding: 3px; width: 125px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                    Pemohon
                                                </th>
                                                <th style="border: 1px solid #000; text-align: center; padding: 3px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                    Pengawas
                                                </th>
                                                <th style="border: 1px solid #000; text-align: center; padding: 3px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                    TTD
                                                </th>
                                                <th style="border: 1px solid #000; text-align: center; padding: 3px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                    Nama TPA/TPT
                                                </th>
                                                <th style="border: 1px solid #000; text-align: center; padding: 3px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                    TTD
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($listPengawas as $index => $row)
                                                <tr>
                                                    @if ($index === 0)
                                                        <td style="border: 1px solid #000; padding: 3px; font-size: 14px; font-family: 'Times New Roman', Times, serif;" rowspan="{{ $jumlahBaris }}"></td>
                                                    @endif
                                                    <td style="border: 1px solid #000; padding: 3px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                        {{ $row['no'] }}. {{ $row['pengawas'] }}
                                                    </td>
                                                    <td style="border: 1px solid #000; padding: 3px; font-size: 14px; font-family: 'Times New Roman', Times, serif;"></td>
                                                    <td style="border: 1px solid #000; padding: 3px; font-size: 14px; font-family: 'Times New Roman', Times, serif;">
                                                        {{ $row['no'] }}. {{ $row['tpa'] }}
                                                    </td>
                                                    <td style="border: 1px solid #000; padding: 3px; font-size: 14px; font-family: 'Times New Roman', Times, serif;"></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end::Row-->
            </div>
            <!--end::App Content-->
        </main>
        <!--end::App Main-->
    </div>
    <!--end::App Wrapper-->

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        const { jsPDF } = window.jspdf;

        // Fungsi untuk konversi angka ke terbilang
        function terbilang(angka) {
            const huruf = ["", "satu", "dua", "tiga", "empat", "lima", "enam", "tujuh", "delapan", "sembilan", "sepuluh", "sebelas"];
            if (angka < 12) {
                return huruf[angka];
            } else if (angka < 20) {
                return terbilang(angka - 10) + " belas";
            } else if (angka < 100) {
                let satuan = angka % 10;
                let puluhan = Math.floor(angka / 10);
                return terbilang(puluhan) + " puluh" + (satuan !== 0 ? " " + terbilang(satuan) : "");
            } else {
                return "";
            }
        }

        // Set tanggal terbilang
        const tanggalAngka = parseInt("{{ \Carbon\Carbon::parse($surat->tanggalkehadiran ?? now())->format('d') }}");
        document.getElementById('tanggal-terbilang').textContent = "tanggal " + terbilang(tanggalAngka);

        // Fungsi untuk download PDF
        async function downloadPDF() {
            const element = document.querySelector('.halaman');
            if (!element) return alert('Halaman tidak ditemukan.');

            const canvas = await html2canvas(element, {
                scale: 2,
                logging: false,
                useCORS: true,
                allowTaint: true,
                scrollX: 0,
                scrollY: 0,
                windowWidth: element.scrollWidth,
                windowHeight: element.scrollHeight
            });

            const imgData = canvas.toDataURL('image/jpeg', 0.95);
            const imgWidthPx = canvas.width;
            const imgHeightPx = canvas.height;

            const pdf = new jsPDF({
                orientation: imgWidthPx > imgHeightPx ? 'landscape' : 'portrait',
                unit: 'mm',
                format: 'a4'
            });

            const pageWidth = pdf.internal.pageSize.getWidth();
            const pageHeight = pdf.internal.pageSize.getHeight();

            const ratio = Math.min(
                pageWidth / (imgWidthPx / 2.8346),
                pageHeight / (imgHeightPx / 2.8346)
            );

            const imgWidth = (imgWidthPx / 2.8346) * ratio;
            const imgHeight = (imgHeightPx / 2.8346) * ratio;

            const x = (pageWidth - imgWidth) / 2;
            const y = (pageHeight - imgHeight) / 2;

            pdf.addImage(imgData, 'JPEG', x, y, imgWidth, imgHeight);
            pdf.save("Berita-Acara.pdf");
        }
    </script>

   @include('backend.00_administrator.00_baganterpisah.02_footer')

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
   <script>
    function exportTableToExcel(tableID, filename = '') {
        var table = document.getElementById(tableID);
        var wb = XLSX.utils.table_to_book(table, {sheet:"Sheet 1"});
        return XLSX.writeFile(wb, filename + '.xlsx');
    }
    </script>
