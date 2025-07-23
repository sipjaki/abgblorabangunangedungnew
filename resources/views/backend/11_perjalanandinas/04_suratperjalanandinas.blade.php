<!-- Tambahkan link Google Font Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
<!-- Link Font Poppins -->
<link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">


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
    background: linear-gradient(to bottom, #7de3f1, #ffffff);
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


         @canany(['superadmin', 'admin'])
    <div style="display: flex; justify-content: flex-end; margin-bottom:5px;">

       <a href="{{ url()->previous() }}">
    <button class="button-validasinew" type="button" style="cursor: pointer; color:white;">
        <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
    </button>
</a>

    </div>
@endcanany

@canany(['internal'])
    <div style="display: flex; justify-content: flex-end; margin-bottom:5px;">

       <a href="{{ url()->previous() }}">
    <button class="button-newvalidasi" type="button" style="cursor: pointer; color:black;">
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


<div style="text-align: center; margin: 20px;">
  <button onclick="downloadPDF()" style="background-color: #e3342f; color: white; padding: 10px 20px; border: none; border-radius: 5px; font-size: 14px; cursor: pointer;">
    📄 Download Surat Tugas (PDF)
  </button>
</div>

<body>
  <div class="halaman">
    <div class="kop" style="margin-top:-30px;">
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

<p style="font-size: 14px; font-weight: bold; text-align: center; text-transform: uppercase; margin-bottom: 8px; margin-top:-15px;">
  SURAT PERJALANAN DINAS
</p>

<table style="width: 100%; border-collapse: collapse; font-size: 12px;">
  @php
    $cellStyle = 'border: 1px solid black; padding: 6px; vertical-align: top;';
  @endphp

  <tr>
    <td style="{{ $cellStyle }} width: 25px;">1.</td>
    <td style="{{ $cellStyle }}">Pejabat Pembuat Komitmen</td>
    <td style="{{ $cellStyle }}" colspan="3">MOHAMAD ARIF HIDAYAT, ST</td>
  </tr>
  <tr>
    <td style="{{ $cellStyle }}">2.</td>
    <td style="{{ $cellStyle }}">Nama Pegawai yang Melaksanakan Perjalanan Dinas</td>
    <td style="{{ $cellStyle }}" colspan="3">{{ $data->namapetugas->namalengkap ?? '-' }}</td>
  </tr>
  <tr>
    <td style="{{ $cellStyle }}"></td>
    <td style="{{ $cellStyle }}">a. NIP</td>
    <td style="{{ $cellStyle }}" colspan="3">{{ $data->namapetugas->nip ?? '-' }}</td>
  </tr>
  <tr>
    <td style="{{ $cellStyle }}"></td>
    <td style="{{ $cellStyle }}">b. Pangkat/Golongan</td>
    <td style="{{ $cellStyle }}" colspan="3">{{ $data->namapetugas->pangkat ?? '-' }}</td>
  </tr>
  <tr>
    <td style="{{ $cellStyle }}"></td>
    <td style="{{ $cellStyle }}">c. Jabatan</td>
    <td style="{{ $cellStyle }}" colspan="3">{{ $data->namapetugas->jabatan ?? '-' }}</td>
  </tr>
  <tr>
    <td style="{{ $cellStyle }}"></td>
    <td style="{{ $cellStyle }}">d. Tingkat Biaya Perjalanan </td>
    <td style="{{ $cellStyle }}" colspan="3">{{ $data->namapetugas->tingkatbiaya ?? '-' }}</td>
  </tr>
  <tr>
    <td style="{{ $cellStyle }}">3.</td>
    <td style="{{ $cellStyle }}">Maksud Perjalanan Dinas</td>
    <td style="{{ $cellStyle }}" colspan="3">{{$data->maksudperjalanan ?? '-'}}</td>
  </tr>
  <tr>
    <td style="{{ $cellStyle }}">4.</td>
    <td style="{{ $cellStyle }}">Alat Angkutan yang Dipergunakan</td>
    <td style="{{ $cellStyle }}" colspan="3">{{$data->angkutan ?? '-'}}</td>
  </tr>
  <tr>
    <td style="{{ $cellStyle }}">5.</td>
    <td style="{{ $cellStyle }}">a. Tempat Berangkat</td>
    <td style="{{ $cellStyle }}" colspan="3">{{$data->tempatberangkat ?? '-'}}</td>
  </tr>
  <tr>
    <td style="{{ $cellStyle }}"></td>
    <td style="{{ $cellStyle }}">b. Tempat Tujuan</td>
    <td style="{{ $cellStyle }}" colspan="3">{{$data->tempattujuan ?? '-'}}</td>
  </tr>
  <tr>
    <td style="{{ $cellStyle }}">6.</td>
    <td style="{{ $cellStyle }}">a. Lama Perjalanan Dinas</td>
    <td style="{{ $cellStyle }}" colspan="3">{{$data->lamaperjalanan ?? '-'}}</td>
  </tr>
  <tr>
    <td style="{{ $cellStyle }}"></td>
    <td style="{{ $cellStyle }}">b. Tanggal Berangkat</td>
    <td style="{{ $cellStyle }}" colspan="3">{{ \Carbon\Carbon::parse($data->mulaiperjalanan)->translatedFormat('d F Y') ?? '-' }}</td>
  </tr>
  <tr>
    <td style="{{ $cellStyle }}"></td>
    <td style="{{ $cellStyle }}">c. Tanggal Harus Kembali</td>
    <td style="{{ $cellStyle }}" colspan="3">{{ \Carbon\Carbon::parse($data->selesaiperjalanan)->translatedFormat('d F Y') ?? '-' }}</td>
  </tr>
  <tr>
    <td style="{{ $cellStyle }}">7.</td>
    <td style="{{ $cellStyle }}" colspan="4" align="center"><strong>PENGIKUT</strong></td>
  </tr>
  <tr>
    <td style="{{ $cellStyle }}"></td>
    <td style="{{ $cellStyle }} width:225px;" align="center"><strong>Nama Lengkap</strong></td>
    <td style="{{ $cellStyle }}" align="center"><strong>NIP</strong></td>
    <td style="{{ $cellStyle }}" align="center"><strong>PANGKAT</strong></td>
    <td style="{{ $cellStyle }}" align="center"><strong>TANDA TANGAN</strong></td>
  </tr>
  <tr>
    <td style="{{ $cellStyle }}"></td>
    <td style="{{ $cellStyle }} height: 40px;">{{$data->pendampingdinas->namalengkap}}</td>
    <td style="{{ $cellStyle }}">{{$data->pendampingdinas->nip}}</td>
    <td style="{{ $cellStyle }}">{{$data->pendampingdinas->pangkat}}</td>
    <td style="{{ $cellStyle }}"></td>
  </tr>
  {{-- Baris untuk pendampingdinas2 --}}
@if($data->pendampingdinas2)
<tr>
    <td style="{{ $cellStyle }}"></td>
    <td style="{{ $cellStyle }} height: 40px;">{{ $data->pendampingdinas2->namalengkap }}</td>
    <td style="{{ $cellStyle }}">{{ $data->pendampingdinas2->nip }}</td>
    <td style="{{ $cellStyle }}">{{ $data->pendampingdinas2->pangkat }}</td>
    <td style="{{ $cellStyle }}"></td>
</tr>
@endif

{{-- Baris untuk pendampingdinas3 --}}
@if($data->pendampingdinas3)
<tr>
    <td style="{{ $cellStyle }}"></td>
    <td style="{{ $cellStyle }} height: 40px;">{{ $data->pendampingdinas3->namalengkap }}</td>
    <td style="{{ $cellStyle }}">{{ $data->pendampingdinas3->nip }}</td>
    <td style="{{ $cellStyle }}">{{ $data->pendampingdinas3->pangkat }}</td>
    <td style="{{ $cellStyle }}"></td>
</tr>
@endif

  <tr>
    <td style="{{ $cellStyle }}">8.</td>
    <td style="{{ $cellStyle }}">Pembebanan Anggaran <br> - Kegiatan </td>
    <td style="{{ $cellStyle }}" colspan="3">
      <strong>Kegiatan:</strong><br>
      <p>{{$data->ketkegiatan ?? '-'}}</p>
    </td>
  </tr>
  {{-- <tr>
    <td style="{{ $cellStyle }}">9.</td>
    <td style="{{ $cellStyle }}">Keterangan Lain-Lain</td>
    <td style="{{ $cellStyle }}" colspan="3">-</td>
  </tr> --}}
</table>

<!-- Global Style -->
<style>
  .poppins-12 {
    font-family: 'Poppins', sans-serif;
    font-size: 12px;
  }
</style>
<!-- Konten -->
    <!-- Tanda Tangan -->
    <div class="poppins-12">
      <div style="text-align: right; margin-bottom: 20px;">
    Ditetapkan di Blora, <br> pada tanggal {{ \Carbon\Carbon::parse($data->tanggalsuratterbit)->translatedFormat('d F Y') }}

    </div>

<div style="text-align: center;" style="margin-top:-10px;">
  <table style="width: 80%; margin: 0 auto; border-collapse: collapse;">
    <tr>
      <td style="width: 50%; vertical-align: top; text-align: center;">
        <div style="font-weight: bold; font-size:12px;">Pegawai yang diperintah</div>
        <div style="margin-top: 70px; font-weight: bold; font-size:12px;">MUHAMMAD YUSUF ZAQIE, SE</div>
        <div style="font-size:12px;">NIP 19920611 202221 1 030</div>
      </td>
      <td style="width: 50%; text-align: center;">
        <div style="font-weight: bold; font-size:12px;">Pejabat Pembuat Komitmen</div>
        <div style="margin-top: 70px; font-weight: bold; font-size:12px;">MOHAMAD ARIF HIDAYAT, ST</div>
        <div style="font-size:12px;">NIP 19710508 199803 1 011</div>
      </td>
    </tr>
  </table>
</div>

    </div>

</div>
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
