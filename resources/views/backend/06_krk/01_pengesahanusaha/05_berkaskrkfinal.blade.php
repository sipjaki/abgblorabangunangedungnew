<style>
    body {
        font-family: 'Poppins', sans-serif;
    }
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

<!-- Your existing header includes -->
@include('backend.00_administrator.00_baganterpisah.01_header')

<!--begin::Body-->
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        @include('backend.00_administrator.00_baganterpisah.04_navbar')
        @include('backend.00_administrator.00_baganterpisah.09_button')
        @include('backend.00_administrator.00_baganterpisah.03_sidebar')
        @include('frontend.android.00_fiturmenu.06_alert')

        <!--begin::App Main-->
        <main class="app-main" style="background: linear-gradient(to bottom, #7de3f1, #ffffff); margin: 0; padding: 0; position: relative; left: 0;">
            <!-- Your existing content header -->
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        @include('backend.00_administrator.00_baganterpisah.10_selamatdatang')
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="putih row" style="margin-right: 10px; margin-left:10px;">
                    <div class="card mb-4">
                        <div class="card-header">
                            @include('backend.00_administrator.00_baganterpisah.11_judulhalaman')
                        </div>

                        <!-- Back buttons based on user role -->
                        @canany(['konsultanbantek'])
                            <div style="display: flex; justify-content: flex-end; margin-bottom:10px;">
                                <button class="button-kembali" type="button" onclick="location.href='{{ url()->previous() }}';" style="cursor: pointer; color:black;">
                                    <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
                                </button>
                            </div>
                        @endcanany

                        @canany(['dinas'])
                            <div style="display: flex; justify-content: flex-end; margin-bottom:10px;">
                                <button class="button-kembali" type="button" onclick="location.href='{{ route('bebantekdinasasistensiindex') }}';" style="cursor: pointer; color:black;">
                                    <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
                                </button>
                            </div>
                        @endcanany

                        @canany(['pemohonbantek'])
                            <div style="display: flex; justify-content: flex-end; margin-bottom:10px;">
                                <button class="button-kembali" type="button" onclick="location.href='{{ route('bebantekpemohonasistensiindex') }}';" style="cursor: pointer; color:black;">
                                    <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
                                </button>
                            </div>
                        @endcanany

                        @canany(['superadmin', 'admin'])
                            <div style="display: flex; justify-content: flex-end; margin-bottom:5px;">
                                <button class="button-newvalidasi" type="button" onclick="location.href='{{ route('krkusaha.index') }}';" style="cursor: pointer; color:white;">
                                    <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
                                </button>
                            </div>
                        @endcanany
                        {{-- <hr> --}}

                        <!-- Main content container -->
                        <div class="container-fluid">
                            <div class="row" style="margin-right: 10px; margin-left:10px;">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <div style="display: flex; justify-content: flex-end; margin-bottom: 5px;">
                                            <!-- Your existing buttons -->
                                        </div>
                                    </div>

                                    <!-- PDF Download Button -->
                                    <div style="text-align: center; margin: 20px;">
                                        <button class="button-baru" onclick="downloadPDF()" style="background-color: #e3342f; color: black; padding: 10px 20px; border: none; border-radius: 5px; font-size: 14px; cursor: pointer;">
                                            📄 Download Berkas Final KRK (PDF)
                                        </button>
                                    </div>

                                    <!-- PDF Content Container -->
                                    <div id="pdf-content" style="font-family: 'Times New Roman', serif;">
                                        <!-- First Page -->
                                        <div class="halaman" style="width: 21cm; height: 29.7cm; margin: auto; background: white; padding: 2cm; box-sizing: border-box; border: 1px solid black; page-break-after: always;">
                                            <!-- Letterhead -->
                                            <div class="kop" style="text-align: center; border-bottom: 2px solid black; padding-bottom: 10px; margin-bottom: 20px;">
                                                <img src="/assets/abgblora/logo/logokabupatenblora.png" style="float: left; height: 80px;">
                                                <div style="display: inline-block;">
                                                    <h3 style="margin: 2px 0; font-size: 16px;">PEMERINTAH KABUPATEN BLORA</h3>
                                                    <h3 style="margin: 2px 0; font-size: 16px;">DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</h3>
                                                    <p style="margin: 4px 0; font-size: 13px;">Jl. Nusantara No. 62 Telp. (0296) 531004</p>
                                                    <h3 style="margin: 2px 0; font-size: 16px;">BLORA 58214</h3>
                                                </div>
                                                <div style="clear: both;"></div>
                                            </div>

                                            <!-- Title -->
                                            <div style="text-align: center; font-weight: bold; text-decoration: underline; margin-bottom: 20px; font-size: 14px;">
                                                KETERANGAN RENCANA KABUPATEN <br>
                                                Nomor: 640/{{ $data->id }}.FU/{{ date('Y') }}
                                            </div>

                                            <!-- Section I: Administrative Information -->
                                            <h5 class="section-title" style="font-size:12px;">I. INFORMASI ADMINISTRASI</h5>
                                          <table class="zebra-table table-striped" style="width: 100%; font-size: 12px; border-collapse: collapse; border: 1px solid #ddd;">
    <thead>
        <tr style="background-color: #f2f2f2; text-align: left;">
            <th style="width: 5%; border: 1px solid #ddd; padding: 8px;">No</th>
            <th style="width: 35%; border: 1px solid #ddd; padding: 8px;">Item</th>
            <th style="width: 5%; border: 1px solid #ddd; padding: 8px;">:</th>
            <th style="width: 55%; border: 1px solid #ddd; padding: 8px;">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @if($subdata->count())
            @foreach($subdata as $i => $item)
                <tr>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">1</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">Nomor Registrasi KRK</td>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">:</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">{{ $item->nomorregistrasi ?? '-' }}</td>
                </tr>
            @endforeach
        @endif

        <tr>
            <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">2</td>
            <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">Tanggal KRK Dibuat</td>
            <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">:</td>
            <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">
                {{ $data->tanggalpermohonan ? \Carbon\Carbon::parse($data->tanggalpermohonan)->translatedFormat('d F Y') : 'Belum Dibuatkan' }}
            </td>
        </tr>

        <tr>
            <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">3</td>
            <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">Nomor Induk Kependudukan (NIK)</td>
            <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">:</td>
            <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">{{ $data->nik ?? 'Belum Dibuatkan' }}</td>
        </tr>

        <tr>
            <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">4</td>
            <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">Nama Pemohon</td>
            <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">:</td>
            <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">{{ $data->perorangan ?? 'Belum Dibuatkan' }}</td>
        </tr>

        <tr>
            <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">5</td>
            <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">Nama Pemohon a/n Perusahaan</td>
            <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">:</td>
            <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">{{ $data->perusahaan ?? 'Belum Dibuatkan' }}</td>
        </tr>

        <tr>
            <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">6</td>
            <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">No Telepon</td>
            <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">:</td>
            <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">{{ $data->notelepon ?? 'Belum Dibuatkan' }}</td>
        </tr>

        <tr>
            <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">7</td>
            <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">Alamat Pemohon</td>
            <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">:</td>
            <td style="text-align: left; border: 1px solid #ddd; padding: 6px; white-space: normal; word-wrap: break-word; overflow-wrap: break-word;">
                {{ $data->alamatpemohon ? $data->alamatpemohon . ', Kabupaten Blora, Provinsi Jawa Tengah' : 'Belum Dibuatkan' }}
            </td>
        </tr>

        <tr>
            <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">8</td>
            <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">Lokasi Bangunan</td>
            <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">:</td>
            <td style="text-align: left; border: 1px solid #ddd; padding: 6px; white-space: normal; word-wrap: break-word; overflow-wrap: break-word;">
                {{ $data->lokasibangunan ? $data->lokasibangunan . ', Kabupaten Blora, Provinsi Jawa Tengah' : 'Belum Dibuatkan' }}
            </td>
        </tr>

        <tr>
            <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">9</td>
            <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">Koordinat Lokasi</td>
            <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">:</td>
            <td style="text-align: left; border: 1px solid #ddd; padding: 6px; white-space: normal; word-wrap: break-word; overflow-wrap: break-word;">
                {{ $data->koordinatlokasi ?? '-' }}
            </td>
        </tr>
    </tbody>
</table>

                                            <br>

                                            <!-- Section II: Building Information -->
                                            <h5 class="section-title" style="font-size: 12px;">II. INFORMASI INTENSITAS BANGUNAN GEDUNG</h5>
<table class="zebra-table table-striped" style="width: 100%; font-size: 12px; border-collapse: collapse; border: 1px solid #ddd;">
    <thead>
        <tr style="background-color: #f2f2f2;">
            <th style="width: 5%; border: 1px solid #ddd; padding: 8px;">No</th>
            <th style="width: 35%; border: 1px solid #ddd; padding: 8px;">Item</th>
            <th style="width: 5%; border: 1px solid #ddd; padding: 8px;">:</th>
            <th style="width: 55%; border: 1px solid #ddd; padding: 8px;">Keterangan</th>
        </tr>
    </thead>
    <tbody>
        @if($subdata->count())
            @foreach($subdata as $item)
                <tr>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">1</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">Kepadatan</td>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">:</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">{{ $item->kepadatan ?? '-' }}</td>
                </tr>
                <tr>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">2</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">Jumlah Lantai</td>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">:</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">{{ $item->luaslantaimaksimal ?? '-' }} Lantai</td>
                </tr>
                <tr>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">3</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">Luas Bangunan Maksimal</td>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">:</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">{{ $item->luasbangunan ? $item->luasbangunan . ' M²' : '-' }}</td>
                </tr>
                <tr>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">4</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">Luas Lantai Maksimal</td>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">:</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">{{ $item->luaslantaimaksimal ?? 'Belum Dibuatkan' }} Lantai</td>
                </tr>
                <tr>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">5</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">Fungsi Utama Bangunan</td>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">:</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">{{ $item->fungsibangunan ?? 'Belum Dibuatkan' }}</td>
                </tr>
                <tr>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">6</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">(GSB) Garis Sempadan Bangunan</td>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">:</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">{{ $item->gsb ?? 'Belum Dibuatkan' }} Meter</td>
                </tr>
                <tr>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">7</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">(KLB) Koefisien Lantai Bangunan</td>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">:</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">{{ $item->kdb ?? 'Belum Dibuatkan' }}</td>
                </tr>
                <tr>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">8</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">(KDB) Koefisien Dasar Bangunan</td>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">:</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">{{ $item->klb ?? 'Belum Dibuatkan' }}</td>
                </tr>
                <tr>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">9</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">(KDH) Koefisien Dasar Hijau</td>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">:</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">{{ $item->kdh ? $item->kdh . '%' : 'Belum Dibuatkan' }}</td>
                </tr>
                <tr>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">10</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">Jaringan Utilitas Kota</td>
                    <td style="text-align: center; border: 1px solid #ddd; padding: 6px;">:</td>
                    <td style="text-align: left; border: 1px solid #ddd; padding: 6px;">{{ $item->jaringanutilitas ?? 'Belum Dibuatkan' }}</td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
                                        </div>

                                        <!-- Second Page -->
                                        <div class="halaman" style="width: 21cm; height: 29.7cm; margin: auto; background: white; padding: 2cm; box-sizing: border-box; border: 1px solid black;">
                                            <!-- Letterhead (same as first page) -->
                                            {{-- <div class="kop" style="text-align: center; border-bottom: 2px solid black; padding-bottom: 10px; margin-bottom: 20px;">
                                                <img src="/assets/abgblora/logo/logokabupatenblora.png" style="float: left; height: 80px;">
                                                <div style="display: inline-block;">
                                                    <h3 style="margin: 2px 0; font-size: 16px;">PEMERINTAH KABUPATEN BLORA</h3>
                                                    <h3 style="margin: 2px 0; font-size: 16px;">DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</h3>
                                                    <p style="margin: 4px 0; font-size: 13px;">Jl. Nusantara No. 62 Telp. (0296) 531004</p>
                                                    <h3 style="margin: 2px 0; font-size: 16px;">BLORA 58214</h3>
                                                </div>
                                                <div style="clear: both;"></div>
                                            </div> --}}

                                            <!-- Content for second page -->
                                            <div class="content" style="font-size: 12px;">
                                                <div class="section-title" style="font-size:12px;">Dasar Pertimbangan</div>
                                                <ol style="font-size:12px;">
                                                    <li>Keputusan Menteri Pekerjaan Umum dan Perumahan Rakyat Nomor 1688/KPTS/M/2022 tentang Penetapan Ruas Jalan Menurut Statusnya sebagai Jalan Nasional.</li>
                                                    <li>Keputusan Gubernur Jawa Tengah Nomor 622 / 12 Tahun 2023 tentang Penetapan Ruas Jalan dalam Jaringan Jalan Kolektor Primer - 4, Jalan Lokal Primer, Jalan Lingkungan Primer, Jalan Arteri Sekunder, Jalan Kolektor Sekunder, Jalan Lokal Sekunder dan Jalan Lingkungan Sekunder di Provinsi Jawa Tengah.</li>
                                                    <li>Peraturan Daerah Kabupaten Blora Nomor 1 Tahun 2016 tentang Bangunan Gedung.</li>
                                                    <li>Peraturan Daerah Kabupaten Blora Nomor 11 Tahun 2018 tentang Perubahan atas Peraturan Daerah Kabupaten Blora Nomor 1 Tahun 2016 tentang Bangunan Gedung.</li>
                                                    <li>Peraturan Daerah Kabupaten Blora Nomor 5 Tahun 2021 tentang Rencana Tata Ruang Wilayah Kabupaten Blora.</li>
                                                    <li>SK Bupati No. 620/175/2023 tentang Penetapan Status Ruas Jalan sebagai Jalan Kabupaten di Wilayah Kabupaten Blora.</li>
                                                </ol>

                                                <hr>

                                                <div class="section-title" style="font-size:12px;">Ketentuan Lain-Lain</div>
                                                <ol style="font-size:12px;">
                                                    <li>Harus menyediakan Ruang Terbuka Hijau (RTH) privat minimal seluas 10% dari luas persil.</li>
                                                    <li>Dilarang memperkecil atau memperbesar volume debit kapasitas saluran umum (drainase kota) dan/atau menutup saluran umum.</li>
                                                    <li>Rencana bangunan menyesuaikan dengan ketentuan teknik yang tercantum dalam lembar ini.</li>
                                                    <li>Rencana bangunan mempertimbangkan faktor keselamatan, kenyamanan, kesehatan dan kemudahan bagi pengguna bangunan.</li>
                                                    <li>Keharusan membuat lubang resapan biopori.</li>
                                                    <li>Keharusan menanam pohon pelindung dan pembuatan sumur resapan air hujan.</li>
                                                    <li>Perkerasan halaman harus dengan struktur yang kuat.</li>
                                                    <li>Wajib menyediakan tempat/area parkir.</li>
                                                    <li>Bidang tanah yang terkena GSB dipergunakan untuk kepentingan umum.</li>
                                                    <li>Semua ketentuan dalam KRK ini didasarkan pada peraturan yang berlaku di Kabupaten Blora pada saat ini. Apabila dikemudian hari terdapat ketentuan yang tidak sesuai, maka akan diperbaiki sesuai dengan peraturan yang ada. KRK ini bersifat sementara.</li>
                                                </ol>
                                            </div>

                                            <!-- Signature section -->
                                            <div style="width: 100%; display: flex; justify-content: flex-end; margin-top: 40px;">
                                                <div style="text-align: left; font-size: 12px;">
                                                    Kabupaten Blora<br>
                                                    Plt. KEPALA DINAS<br>
                                                    DINAS PEKERJAAN UMUM DAN PENATAAN RUANG<br>
                                                    KABUPATEN BLORA<br><br>

                                                    <div style="position: relative; width: 220px; height: 100px; margin-top:-15px;">
                                                        <!-- TTD Kabupaten Blora agak ke kanan -->
                                                        <img src="/assets/abgblora/logo/ttdkabblora.png" alt=""
                                                             style="position: absolute; left: 10px; top: 0; height: 90px; z-index: 1;">

                                                        <!-- TTD PA Huda di kanan -->
                                                        <img src="/assets/abgblora/logo/ttdpahuda.png" alt=""
                                                             style="position: absolute; right: 0; top: 0; height: 80px; z-index: 2;">
                                                    </div><br><br>
                                                    <div style="display: inline-flex; flex-direction: column; gap: 0;">
                                                        <strong style="margin-top: -25px; text-decoration: underline; line-height: 1;">
                                                            NIDZAMUDIN AL HUDDA, ST
                                                        </strong>
                                                        <span style="line-height: 1; margin-top: 0;">
                                                            NIP. 19720326 200604 1 005
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    @include('backend.00_administrator.00_baganterpisah.02_footer')

    <!-- PDF Generation Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script>
        const { jsPDF } = window.jspdf;

        async function downloadPDF() {
            // Create a new PDF with landscape orientation
            const pdf = new jsPDF({
                orientation: 'portrait',
                unit: 'mm',
                format: 'a4'
            });

            // Get the PDF content container
            const element = document.getElementById('pdf-content');

            // Get all pages
            const pages = element.getElementsByClassName('halaman');

            // Process each page
            for (let i = 0; i < pages.length; i++) {
                const page = pages[i];

                // Convert page to canvas
                const canvas = await html2canvas(page, {
                    scale: 2,
                    logging: false,
                    useCORS: true,
                    allowTaint: true,
                    scrollX: 0,
                    scrollY: 0,
                    windowWidth: page.scrollWidth,
                    windowHeight: page.scrollHeight
                });

                // Convert canvas to image data
                const imgData = canvas.toDataURL('image/jpeg', 0.95);

                // Calculate dimensions
                const pageWidth = pdf.internal.pageSize.getWidth();
                const pageHeight = pdf.internal.pageSize.getHeight();

                const imgWidth = pageWidth;
                const imgHeight = (canvas.height * pageWidth) / canvas.width;

                // Add image to PDF
                pdf.addImage(imgData, 'JPEG', 0, 0, imgWidth, imgHeight);

                // Add new page if not the last page
                if (i < pages.length - 1) {
                    pdf.addPage();
                }
            }

            // Save the PDF
            pdf.save("berkas-final_krk_usaha.pdf");
        }
    </script>
</body>
</html>
