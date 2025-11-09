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
                                <button class="button-modern" type="button" onclick="location.href='{{ url()->previous() }}';" style="cursor: pointer; color:black;">
                                    <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
                                </button>
                            </div>
                        @endcanany

                        @canany(['dinas'])
                            <div style="display: flex; justify-content: flex-end; margin-bottom:10px;">
                                <button class="button-modern" type="button" onclick="location.href='{{ route('bebantekdinasasistensiindex') }}';" style="cursor: pointer; color:black;">
                                    <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
                                </button>
                            </div>
                        @endcanany

                        @canany(['pemohonbantek'])
                            <div style="display: flex; justify-content: flex-end; margin-bottom:10px;">
                                <button class="button-modern" type="button" onclick="location.href='{{ route('bebantekpemohonasistensiindex') }}';" style="cursor: pointer; color:black;">
                                    <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
                                </button>
                            </div>
                        @endcanany

                        @canany(['superadmin', 'admin'])
                            <div style="display: flex; justify-content: flex-end; margin-bottom:5px;">
                                <button class="button-modern" type="button" onclick="location.href='{{ route('bekrkhunianindex') }}';" style="cursor: pointer; color:black;">
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
                                        <button class="button-modern" onclick="downloadPDF()" style="background-color: #e3342f; color: black; padding: 10px 20px; border: none; border-radius: 5px; font-size: 14px; cursor: pointer;">
                                            📄 Download Berkas Final KRK (PDF)
                                        </button>
                                    </div>

                                    <!-- PDF Content Container -->
                                    <div id="pdf-content" style="font-family: 'Times New Roman', serif;">
                                        <!-- First Page -->
                                        <div class="halaman" style="width: 21cm; height: 29.7cm; margin: auto; background: white; padding: 2cm; box-sizing: border-box; border: 1px solid black; page-break-after: always;">
                                            <!-- Letterhead -->
                                            <div class="kop" style="text-align: center; border-bottom: 2px solid black; padding-bottom: 10px; margin-bottom: 20px; margin-top: -30px;">
                                                <img src="/assets/abgblora/logo/logokabupatenblora.png" style="float: left; height: 80px;">
         <div style="
    display: inline-block;
    text-align: center;
    font-family: 'Times New Roman', Times, serif !important;
    font-weight: normal;
    line-height: 1;
">
    <h3 style="margin: 2px 0; font-size: 18px; font-weight: normal;">
        <strong style=" font-family: 'Times New Roman', Times, serif !important;">PEMERINTAH KABUPATEN BLORA</strong>
    </h3>
    <h3 style="margin: 2px 0; font-size: 18px; font-weight: normal;">
        <strong style=" font-family: 'Times New Roman', Times, serif !important;">DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</strong>
    </h3>
    <p style="margin: 4px 0; font-size: 14px; font-weight: normal;">
        <strong style=" font-family: 'Times New Roman', Times, serif !important;">Jl. Nusantara No. 62 Telp. (0296) 531004</strong>
    </p>
    <h3 style="margin: 2px 0; font-size: 18px; font-weight: normal;">
        <strong style=" font-family: 'Times New Roman', Times, serif !important;">BLORA 58214</strong>
    </h3>
</div>


                                                <div style="clear: both;"></div>
                                            </div>

                                            <!-- Title -->
                                            <div style="
    text-align: center;
    font-weight: bold;
    margin-bottom: 20px;
    font-size: 14px;
    font-family: 'Times New Roman', Times, serif !important;
">
    KETERANGAN RENCANA KABUPATEN <br>
    Nomor: 640/{{ $data->id }}.FH/{{ date('Y') }}
</div>

                                            <!-- Section I: Administrative Information -->
                             <h5 class="section-title" style="font-size: 14px; font-weight: bold; font-family: 'Times New Roman', Times, serif !important; margin-bottom: 6px;">
    I. INFORMASI ADMINISTRASI
</h5>

<table class="table-striped" style="width: 100%; font-size: 12px; border-collapse: collapse; border: 1px solid #ddd; font-family: 'Times New Roman', Times, serif;">
    <thead>
<tr style="background-color: #f2f2f2; font-family: 'Times New Roman', Times, serif !important; font-size: 14px;">
    <th style="width: 5%; text-align: center; border: 1px solid #ddd; padding: 6px; font-weight: bold; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">
        No
    </th>
    <th style="width: 35%; text-align: center; border: 1px solid #ddd; padding: 6px; font-weight: bold; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">
        Informasi
    </th>
    <th style="width: 5%; text-align: center; border: 1px solid #ddd; padding: 6px; font-weight: bold; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">
        :
    </th>
    <th style="width: 55%; text-align: center; border: 1px solid #ddd; padding: 6px; font-weight: bold; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">
        Keterangan
    </th>
</tr>
</tr>
    </thead>
    <tbody>
        @if($subdata->count())
            @foreach($subdata as $i => $item)
         <tr>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">1</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">Nomor Registrasi KRK</td>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">:</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">
        {{ $item->nomorregistrasi ?? '-' }}
    </td>
</tr>


            @endforeach
        @endif
<tr>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">2</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">Tanggal KRK Dibuat</td>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">:</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">
        {{ $data->tanggalpermohonan ? \Carbon\Carbon::parse($data->tanggalpermohonan)->translatedFormat('d F Y') : 'Belum Dibuatkan' }}
    </td>
</tr>

<tr>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">3</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">Nomor Induk Kependudukan (NIK)</td>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">:</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">{{ $data->nik ?? 'Belum Dibuatkan' }}</td>
</tr>

<tr>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">4</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">Nama Pemohon</td>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">:</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">{{ $data->perorangan ?? 'Belum Dibuatkan' }}</td>
</tr>

<tr>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">5</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">Nama Pemohon a/n Perusahaan</td>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">:</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">{{ $data->perusahaan ?? 'Belum Dibuatkan' }}</td>
</tr>

<tr>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">6</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">No Telepon</td>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">:</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">{{ $data->notelepon ?? 'Belum Dibuatkan' }}</td>
</tr>

<tr>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">7</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">Alamat Pemohon</td>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">:</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; white-space: normal; word-wrap: break-word; overflow-wrap: break-word; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">
        {{ $data->alamatpemohon ?? '-' }}
    </td>
</tr>

<tr>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">8</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">Lokasi Bangunan</td>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">:</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; white-space: normal; word-wrap: break-word; overflow-wrap: break-word; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">
        {{ $data->lokasibangunan ?? '-' }}
    </td>
</tr>

<tr>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">9</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">Koordinat Lokasi</td>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">:</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; white-space: normal; word-wrap: break-word; overflow-wrap: break-word; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">
        {{ $data->koordinatlokasi ?? '-' }}
    </td>
</tr>

    </tbody>
</table>

                                            <br>

                                            <!-- Section II: Building Information -->
<h5 class="section-title" style="font-size: 14px; font-family: 'Times New Roman', Times, serif !important; font-weight: normal; margin: 0;">
    II. INFORMASI INTENSITAS BANGUNAN GEDUNG
</h5>


<table class="table-striped" style="width: 100%; font-size: 12px; border-collapse: collapse; border: 1px solid #ddd; font-family: 'Times New Roman', Times, serif;">
    <thead>
<tr style="background-color: #f2f2f2; font-family: 'Times New Roman', Times, serif !important; font-size: 14px;">
    <th style="width: 5%; text-align: center; border: 1px solid #ddd; padding: 6px; font-weight: bold; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">
        No
    </th>
    <th style="width: 35%; text-align: center; border: 1px solid #ddd; padding: 6px; font-weight: bold; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">
        Informasi
    </th>
    <th style="width: 5%; text-align: center; border: 1px solid #ddd; padding: 6px; font-weight: bold; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">
        :
    </th>
    <th style="width: 55%; text-align: center; border: 1px solid #ddd; padding: 6px; font-weight: bold; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">
        Keterangan
    </th>
</tr>

    </thead>
    <tbody>
        @if($subdata->count())
            @foreach($subdata as $item)
<tr>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">1</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">Kepadatan</td>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">:</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">{{ $item->kepadatan ?? '-' }}</td>
</tr>
<tr>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">2</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">Jumlah Lantai</td>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">:</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">{{ $item->luaslantaimaksimal ?? '-' }} Lantai</td>
</tr>
<tr>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">3</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">Luas Bangunan Maksimal</td>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">:</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">{{ $item->luasbangunan ? $item->luasbangunan . ' M²' : '-' }}</td>
</tr>
<tr>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">4</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">Luas Lantai Maksimal</td>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">:</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">{{ $item->luaslantaimaksimal ?? 'Belum Dibuatkan' }} Lantai</td>
</tr>
<tr>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">5</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">Fungsi Utama Bangunan</td>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">:</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">{{ $item->fungsibangunan ?? 'Belum Dibuatkan' }}</td>
</tr>
<tr>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">6</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">(GSB) Garis Sempadan Bangunan</td>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">:</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">{{ $item->gsb ?? 'Belum Dibuatkan' }} Meter</td>
</tr>
<tr>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">7</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">(KLB) Koefisien Lantai Bangunan</td>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">:</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">{{ $item->kdb ?? 'Belum Dibuatkan' }}</td>
</tr>
<tr>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">8</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">(KDB) Koefisien Dasar Bangunan</td>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">:</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">{{ $item->klb ?? 'Belum Dibuatkan' }}</td>
</tr>
<tr>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">9</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">(KDH) Koefisien Dasar Hijau</td>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">:</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">{{ $item->kdh ? $item->kdh . '%' : 'Belum Dibuatkan' }}</td>
</tr>
<tr>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">10</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">Jaringan Utilitas Kota</td>
    <td style="text-align: center; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">:</td>
    <td style="text-align: left; border: 1px solid #ddd; padding: 6px; font-size: 14px; font-family: 'Times New Roman', Times, serif !important;">{{ $item->jaringanutilitas ?? 'Belum Dibuatkan' }}</td>
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
<div class="content" style="font-size: 14px; font-family: 'Times New Roman', Times, serif !important; line-height: 1.2; text-align: justify; font-weight: normal;">
    <div class="section-title" style="font-size: 14px; font-family: 'Times New Roman', Times, serif !important; margin-bottom: 4px; text-align: left; font-weight: normal;">
        Dasar Pertimbangan
    </div>
    <ol style="font-size: 14px; line-height: 1.2; margin-top: 0; margin-bottom: 10px; padding-left: 20px; text-align: justify; font-weight: normal;">
        <li style="font-family: 'Times New Roman', Times, serif !important; font-weight: normal;">Keputusan Menteri Pekerjaan Umum dan Perumahan Rakyat Nomor 1688/KPTS/M/2022 tentang Penetapan Ruas Jalan Menurut Statusnya sebagai Jalan Nasional.</li>
        <li style="font-family: 'Times New Roman', Times, serif !important; font-weight: normal;">Keputusan Gubernur Jawa Tengah Nomor 622 / 12 Tahun 2023 tentang Penetapan Ruas Jalan dalam Jaringan Jalan Kolektor Primer - 4, Jalan Lokal Primer, Jalan Lingkungan Primer, Jalan Arteri Sekunder, Jalan Kolektor Sekunder, Jalan Lokal Sekunder dan Jalan Lingkungan Sekunder di Provinsi Jawa Tengah.</li>
        <li style="font-family: 'Times New Roman', Times, serif !important; font-weight: normal;">Peraturan Daerah Kabupaten Blora Nomor 1 Tahun 2016 tentang Bangunan Gedung.</li>
        <li style="font-family: 'Times New Roman', Times, serif !important; font-weight: normal;">Peraturan Daerah Kabupaten Blora Nomor 11 Tahun 2018 tentang Perubahan atas Peraturan Daerah Kabupaten Blora Nomor 1 Tahun 2016 tentang Bangunan Gedung.</li>
        <li style="font-family: 'Times New Roman', Times, serif !important; font-weight: normal;">Peraturan Daerah Kabupaten Blora Nomor 5 Tahun 2021 tentang Rencana Tata Ruang Wilayah Kabupaten Blora.</li>
        <li style="font-family: 'Times New Roman', Times, serif !important; font-weight: normal;">SK Bupati No. 620/175/2023 tentang Penetapan Status Ruas Jalan sebagai Jalan Kabupaten di Wilayah Kabupaten Blora.</li>
    </ol>

    <hr style="margin: 8px 0; border: 0; border-top: 1px solid #000;">

    <div class="section-title" style="font-size: 14px; font-family: 'Times New Roman', Times, serif !important; margin-bottom: 4px; text-align: left; font-weight: normal;">
        Ketentuan Lain-Lain
    </div>
    <ol style="font-size: 14px; font-family: 'Times New Roman', Times, serif !important; line-height: 1.2; margin-top: 0; padding-left: 20px; text-align: justify; font-weight: normal;">
        <li style="font-family: 'Times New Roman', Times, serif !important; font-weight: normal;">Harus menyediakan Ruang Terbuka Hijau (RTH) privat minimal seluas 10% dari luas persil.</li>
        <li style="font-family: 'Times New Roman', Times, serif !important; font-weight: normal;">Dilarang memperkecil atau memperbesar volume debit kapasitas saluran umum (drainase kota) dan/atau menutup saluran umum.</li>
        <li style="font-family: 'Times New Roman', Times, serif !important; font-weight: normal;">Rencana bangunan menyesuaikan dengan ketentuan teknik yang tercantum dalam lembar ini.</li>
        <li style="font-family: 'Times New Roman', Times, serif !important; font-weight: normal;">Rencana bangunan mempertimbangkan faktor keselamatan, kenyamanan, kesehatan dan kemudahan bagi pengguna bangunan.</li>
        <li style="font-family: 'Times New Roman', Times, serif !important; font-weight: normal;">Keharusan membuat lubang resapan biopori.</li>
        <li style="font-family: 'Times New Roman', Times, serif !important; font-weight: normal;">Keharusan menanam pohon pelindung dan pembuatan sumur resapan air hujan.</li>
        <li style="font-family: 'Times New Roman', Times, serif !important; font-weight: normal;">Perkerasan halaman harus dengan struktur yang kuat.</li>
        <li style="font-family: 'Times New Roman', Times, serif !important; font-weight: normal;">Wajib menyediakan tempat/area parkir.</li>
        <li style="font-family: 'Times New Roman', Times, serif !important; font-weight: normal;">Bidang tanah yang terkena GSB dipergunakan untuk kepentingan umum.</li>
        <li style="font-family: 'Times New Roman', Times, serif !important; font-weight: normal;">Semua ketentuan dalam KRK ini didasarkan pada peraturan yang berlaku di Kabupaten Blora pada saat ini. Apabila dikemudian hari terdapat ketentuan yang tidak sesuai, maka akan diperbaiki sesuai dengan peraturan yang ada. KRK ini bersifat sementara.</li>
    </ol>
</div>

                                            <!-- Signature section -->
                                            <div style="width: 100%; display: flex; justify-content: flex-end; margin-top: 40px;">
    <div style="text-align: left; font-size: 14px; font-family: 'Times New Roman', Times, serif !important; line-height: 1;">
        {{-- Kabupaten Blora<br> --}}
        Plt. KEPALA DINAS<br>
        PEKERJAAN UMUM DAN PENATAAN RUANG<br>
        KABUPATEN BLORA<br><br>

        <div style="position: relative; width: 220px; height: 100px; margin-top:-15px;">
            <!-- TTD Kabupaten Blora agak ke kanan -->
            <img src="/assets/abgblora/logo/ttdkabblora.png" alt=""
                 style="position: absolute; left: 10px; top: 0; height: 90px; z-index: 1;">

            <!-- TTD PA Huda di kanan -->
            <img src="/assets/abgblora/logo/ttdpahuda.png" alt=""
                 style="position: absolute; right: 0; top: 0; height: 80px; z-index: 2;">
        </div>
        <br>
<div style="display: inline-flex; flex-direction: column; line-height: 1; margin-top: -10px; font-family: 'Times New Roman', Times, serif !important; font-size: 14px;">
    <span style="text-decoration: underline; line-height: 1; font-family: 'Times New Roman', Times, serif !important;">
        NIDZAMUDIN AL HUDDA, S.T
    </span>
    <span style="line-height: 1; font-family: 'Times New Roman', Times, serif !important;">
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
            pdf.save("berkas-final_krk_hunian.pdf");
        }
    </script>
