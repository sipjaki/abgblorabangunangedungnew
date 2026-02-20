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


   <!--begin::App Main-->
   <main class="app-main"
      style="
    background: linear-gradient(to bottom, #ffffff, #ffffff);
    margin: 0;
    padding: 0;
    position: relative;
    left: 0;
  ">
     <!--begin::App Content Header-->
     <div class="app-content-header">
       <!--begin::Container-->
       <div class="container-fluid">
         <!--begin::Row-->
         <div class="row">

@include('backend.00_administrator.00_baganterpisah.10_selamatdatang')

           {{-- <div class="col-sm-12"><h3 class="mb-0">Selamat datang ! <span style="color: black; font-weight:800;" > {{ Auth::user()->name }}</span> di Dashboard <span style="color: black; font-weight:800;"> {{ Auth::user()->statusadmin->statusadmin }} </span>  Sistem Informasi Pembina Jasa Konstruksi Kab Blora</h3></div> --}}

         </div>
         <!--end::Row-->
       </div>
       <!--end::Container-->
     </div>

     <!-- Menampilkan pesan sukses -->
<br>
     {{-- ======================================================= --}}
     {{-- ALERT --}}

     {{-- @include('backend.00_administrator.00_baganterpisah.06_alert') --}}

     {{-- ======================================================= --}}

     <div class="container-fluid">
         <!--begin::Row-->
         <div class="putih row" style="margin-right: 10px; margin-left:10px;">
             <!-- /.card -->
             <div class="card mb-4">
  {{-- @include('backend.00_administrator.00_baganterpisah.10_selamatdatang') --}}

</div>
<!-- /.card-header -->
<div class="card-header">

    @include('backend.00_administrator.00_baganterpisah.11_judulhalaman')
                     </div>

         @canany(['dinas'])
    <div style="display: flex; justify-content: flex-end; margin-bottom:10px;">
        <button class="button-kembali"
                type="button"
                onclick="location.href='{{ route('bebantekdinasasistensiindex') }}';"
                style="cursor: pointer; color:black;">
            <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
        </button>
    </div>

@endcanany

         @canany(['pemohonbantek'])
    <div style="display: flex; justify-content: flex-end; margin-bottom:10px;">
        <button class="button-kembali"
                type="button"
                onclick="location.href='{{ route('bebantekpemohonasistensiindex') }}';"
                style="cursor: pointer; color:black;">
            <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
        </button>
    </div>

@endcanany

         @canany(['superadmin', 'admin'])
    <div style="display: flex; justify-content: flex-end; margin-bottom:5px;">

       <a href="{{ url()->previous() }}">
    <button class="button-newvalidasi" type="button">
        <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
    </button>
</a>

    </div>
@endcanany

<br>
<br>
      <hr>
                 <!-- /.card-header -->

                         <div class="container-fluid">
            <!--begin::Row-->
            <div class="row" style="margin-right: 10px; margin-left:10px;">
                <!-- /.card -->
                <div class="card mb-4">
                    <div class="card-header">
                <div style="display: flex; justify-content: flex-end; margin-bottom: 5px;">


{{-- @canany(['super_admin', 'admin', 'lsppenerbit'])

<form action="{{ route('peserta.downloadSemua', $data->id) }}" method="POST">
    @csrf
<button type="submit"
    onmouseover="this.style.background='white'; this.style.color='black'; this.style.transform='scale(1.05)'"
    onmouseout="this.style.background='linear-gradient(135deg, #d4af37, #4CAF50)'; this.style.color='white'; this.style.transform='scale(1)'"
    style="
        background: linear-gradient(135deg, #d4af37, #4CAF50);
        color: white;
        border: none;
        margin-right: 10px;
        padding: 10px 20px;
        border-radius: 15px;
        font-size: 16px;
        font-weight: bold;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    "
>
    <!-- Ikon Download -->
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        viewBox="0 0 16 16">
        <path d="M.5 9.9v2.6c0 .6.5 1 1 1h13c.6 0 1-.4 1-1V9.9c0-.5-.4-1-1-1s-1 .5-1 1v1.6H2.5V9.9c0-.5-.5-1-1-1s-1 .5-1 1z"/>
        <path d="M7.646 11.854a.5.5 0 0 0 .708 0l3.182-3.182a.5.5 0 1 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.172 7.964a.5.5 0 1 0-.708.708l3.182 3.182z"/>
    </svg>
    Download Berkas .zip/.rar Peserta
</button>


</form>

@endcanany --}}


@can('pemohon')

           <a href="/bekrkusahapemohon">
    <button
  style="
    background: linear-gradient(45deg, #6c757d, #adb5bd);
    color: white;
    padding: 10px 20px;
    border: none;
    border-radius: 10px;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    display: inline-flex;
    align-items: center;
    gap: 8px;
    margin-right:10px;
  "
  onmouseover="this.style.background='white'; this.style.color='black'; this.style.transform='scale(1.05)'"
  onmouseout="this.style.background='linear-gradient(45deg, #6c757d, #adb5bd)'; this.style.color='white'; this.style.transform='scale(1)'"
>
  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
    viewBox="0 0 16 16">
    <path fill-rule="evenodd"
      d="M15 8a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 0 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z" />
  </svg>
  Kembali
</button>

</a>


@endcan

@can('lsppenerbit')
   <button
    onclick="history.back();"
    onmouseover="this.style.background = 'white'; this.style.color = 'black';"
    onmouseout="this.style.background = 'linear-gradient(to right, black, white)'; this.style.color = 'white';"
    style="background: linear-gradient(to right, black, white); color: white; border: none; margin-right: 10px; padding: 10px 20px; border-radius: 15px; font-size: 16px; cursor: pointer; display: flex; align-items: center; transition: background-color 0.3s, color 0.3s;">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
        viewBox="0 0 16 16" style="margin-right: 8px;">
        <path fill-rule="evenodd"
            d="M15 8a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 0 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 7.5H14.5A.5.5 0 0 1 15 8z"/>
    </svg>
    Kembali
</button>

@endcan



                 </div>

                    </div>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Surat Tugas Fasilitator</title>
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
</head>

<div style="text-align: center; margin: 20px;">
  <button onclick="downloadPDF()" class="button-baru">
    📄 Download Surat Tugas Inspeksi Bangunan Gedung (PDF)
  </button>
</div>

<body>
  <div class="halaman">
    <div class="kop">
      <img src="/assets/abgblora/logo/logokabupatenblora.png" class="logo" style="float: left;">
      {{-- <img src="/assets/icon/pupr.png" class="logo" style="float: right;"> --}}
      <div style="display: inline-block;">
        <h3>PEMERINTAH KABUPATEN BLORA</h3>
        <h3>DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</h3>
        <p>Jl. Nusantara No. 62 Telp. (0296) 531004</p>
        <h3>BLORA 58214</h3>
      </div>
      <div style="clear: both;"></div>
    </div>
<div class="judul-surat" style="font-size: 12px; text-align: center; font-weight: bold;">
  SURAT TUGAS<br>
  <span style="text-decoration: none; font-weight: normal;">Nomor : {{ $surat->nomorsurat ?? '-' }}</span>
</div>

<p style="font-size: 12px; margin-top: 5px;"><strong>DASAR</strong> : PP 16 Tahun 2021 Tentang Peraturan Pelaksanaan undang-undang Tentang Bangunan Gedung Perda No 1 tahun 2016 Tentang Bangunan Gedung.</p>

<div style="font-size: 12px; text-align: center; font-weight: bold; margin-top: 10px 0;">
  MENUGASKAN
</div>

<div style="font-size: 12px; margin-top: -20px;">
  <p><strong>KEPADA :</strong></p>
  <table class="tabel-info" style="margin-top: -20px;">
    <tr><td style="width: 180px;">Nama</td><td>: {{ $surat->petugaspenilik->namalengkap ?? '-' }}</td></tr>
    <tr><td>NIP</td><td>: {{ $surat->petugaspenilik->nip ?? '-' }}</td></tr>
    <tr><td>Jabatan</td><td>: {{ $surat->petugaspenilik->jabatan ?? '-' }}</td></tr>
  </table>

  <style>
  .text-kecil {
    font-size: 12px !important;
  }
</style>

<p style="margin-top: 12px; font-size: 12px !important;"><strong>UNTUK</strong> :</p>

<ol style="margin-left: 30px; padding-left: 10px; font-size: 12px !important; margin-top:-10px;">
  <li style="font-size: 12px !important;">
    Melakukan pemeriksaan Bangunan Gedung secara Administratif agar penyelenggaraan Bangunan Gedung yang dilaksanakan oleh penyelenggara Bangunan Gedung sesuai dengan ketentuan peraturan perundang-undangan.
  </li>
  <li style="font-size: 12px !important;">
    Melaksanakan tugas pada masa konstruksi dan pemanfaatan serta pembongkaran Bangunan Gedung.
  </li>
  <li style="font-size: 12px !important;">
    Melaksanakan Fungsi : Pemantauan, Pemeriksaan, dan Evaluasi.
    <table style="margin-top: 10px; margin-left: 10px; font-size: 12px !important;">
      <tr>
        <td style="width: 130px;">Lokasi Bangunan</td>
        <td>: {{ $surat->penilikbangunan->alamatlengkap ?? 'Otomatis' }}</td>
      </tr>
      <tr>
        <td>Hari/Tanggal</td>
        <td>: {{ $surat->tanggaltugas ?? 'Manual' }}</td>
      </tr>
      <tr>
        <td>Nama Bangunan</td>
        <td>: {{ $surat->penilikbangunan->namabangunan ?? 'Manual' }}</td>
      </tr>
      <tr>
        <td>No Registrasi</td>
        <td>: {{ $surat->penilikbangunan->noregistrasi ?? 'Belum Terbit' }}</td>
      </tr>
    </table>
  </li>
</ol>

  <p style="margin-top: -10px;"><strong>DENGAN</strong> :</p>
  <p style="margin-left: 30px; margin-top: -10px;">
    1. Melaporkan Hasilnya kepada Kepala Dinas Pekerjaan Umum dan Penataan Ruang melalui Kepala Bidang Bangunan Gedung Dinas Pekerjaan Umum dan Penataan Ruang.
  </p>

  <p style="margin-top: -5px;"><strong>KETENTUAN</strong> :</p>
  <p style="margin-left: 30px;">
    1. Agar dilaksanakan dengan penuh tanggung jawab.
  </p>
</div>
<div class="ttd" style="font-size: 12px; margin-top: 2px; line-height: 1.6; margin-left: 200px;">
  <div style="margin-left: 180px; width: 60%; text-align: center;">

    <p>
      Ditetapkan di : Blora<br>
      pada tanggal : {{ \Carbon\Carbon::parse($surat->tanggaltugas)->translatedFormat('d F Y') }}
    </p>

    <p style="margin-top: 5px;">
      Kepala Bidang Bangunan Gedung
    </p>

    <div style="position: relative; display: inline-block; height: 100px; width: auto; margin-top: -20px;">
      <!-- Stempel di atas, lebih dominan -->
      <img src="/assets/abgblora/logo/ttdkabblora.png" alt="Stempel"
           style="position: absolute; top: 0; left: -20px; height: 100px; opacity: 0.95; z-index: 2;">

      <!-- Tanda tangan di bawah -->
      <img src="/assets/abgblora/logo/tandatanganpaarif.png" alt="Tanda Tangan"
           style="position: relative; height: 100px; opacity: 1; z-index: 1;">
    </div>

    <p style="margin-top: 10px;">
      <strong><u>MOHAMAD ARIF HIDAYAT, ST</u></strong><br>
      Pembina IV/a<br>
      NIP. 19710506 199403 1 011
    </p>

  </div>
</div>
<br><br><br>
</body>
</html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
  const { jsPDF } = window.jspdf;

  async function downloadPDF() {
    const element = document.querySelector('.halaman'); // ✅ UBAH DARI .halaman-pertama KE .halaman
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
    pdf.save("surat-tugas-fasilitator.pdf");
  }
</script>

                      <br><br><br>
                        </div>
                    </div>
</form>

<br>
<!-- Modal untuk preview dokumen -->

                    <!-- /.card-body -->
                </div>


                 {{-- @include('backend.00_administrator.00_baganterpisah.07_paginations') --}}

                 <br><br>

             </div>
             <!-- /.card -->
         </div>
         <!-- /.col -->
     </div>
     <!--end::Row-->
     </div>
               <!--end::Container-->
     <!--end::App Content Header-->
     <!--begin::App Content-->
       <!--end::App Content-->
   </main>
   <!--end::App Main-->
 </div>
 </div>


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
