<style>
  body {
    font-family: 'Times New Roman', serif !important;
  }

  .zebra-table {
    width: 100%;
    border-collapse: collapse;
    font-family: 'Times New Roman', serif !important;
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

  @page {
    size: A4;
    margin: 0;
  }

  body {
    font-family: 'Times New Roman', serif !important;
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
    margin-bottom: 20px;
    font-family: 'Times New Roman', serif !important;
  }

  .kop {
    text-align: center;
    border-bottom: 2px solid black;
    padding-bottom: 10px;
    margin-bottom: 20px;
    font-family: 'Times New Roman', serif !important;
  }

  .kop h3 {
    margin: 2px 0;
    font-size: 16px;
    font-family: 'Times New Roman', serif !important;
  }

  .kop p {
    margin: 4px 0;
    font-size: 13px;
    font-family: 'Times New Roman', serif !important;
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
    font-family: 'Times New Roman', serif !important;
  }

  .isi-surat p {
    text-align: justify;
    line-height: 1.6;
    margin-bottom: 10px;
    font-family: 'Times New Roman', serif !important;
  }

  .tabel-info {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
    font-size: 12px;
    font-family: 'Times New Roman', serif !important;
  }

  .tabel-info td {
    padding: 4px;
    font-family: 'Times New Roman', serif !important;
  }

  .ttd {
    text-align: right;
    margin-top: 40px;
    font-family: 'Times New Roman', serif !important;
  }

  .tabel-penerima {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    font-size: 12px;
    font-family: 'Times New Roman', serif !important;
  }

  .tabel-penerima th, .tabel-penerima td {
    border: 1px solid black;
    padding: 8px;
    text-align: left;
    font-family: 'Times New Roman', serif !important;
  }

  .tabel-penerima th {
    background-color: #f2f2f2;
  }

  @media print {
    body {
      background: white;
      font-family: 'Times New Roman', serif !important;
    }
  }
</style>

@include('backend.00_administrator.00_baganterpisah.01_header')

<!--begin::Body-->
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary" style="font-family: 'Times New Roman', serif !important;">
 <!--begin::App Wrapper-->
 <div class="app-wrapper" style="font-family: 'Times New Roman', serif !important;">
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
    font-family: 'Times New Roman', serif !important;
  ">
     <!--begin::App Content Header-->
     <div class="app-content-header" style="font-family: 'Times New Roman', serif !important;">
       <!--begin::Container-->
       <div class="container-fluid" style="font-family: 'Times New Roman', serif !important;">
         <!--begin::Row-->
         <div class="row" style="font-family: 'Times New Roman', serif !important;">

@include('backend.00_administrator.00_baganterpisah.10_selamatdatang')

         </div>
         <!--end::Row-->
       </div>
       <!--end::Container-->
     </div>

     <div class="container-fluid" style="font-family: 'Times New Roman', serif !important;">
         <!--begin::Row-->
         <div class="putih row" style="margin-right: 10px; margin-left:10px; font-family: 'Times New Roman', serif !important;">
             <!-- /.card -->
             <div class="card mb-4" style="font-family: 'Times New Roman', serif !important;">

</div>
<!-- /.card-header -->
<div class="card-header" style="font-family: 'Times New Roman', serif !important;">

    @include('backend.00_administrator.00_baganterpisah.11_judulhalaman')
</div>

@canany(['dinas'])
    <div style="display: flex; justify-content: flex-end; margin-bottom:10px; font-family: 'Times New Roman', serif !important;">
        <button class="button-kembali"
                type="button"
                onclick="location.href='{{ route('bebantekdinasasistensiindex') }}';"
                style="cursor: pointer; color:black; font-family: 'Times New Roman', serif !important;">
            <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
        </button>
    </div>
@endcanany

@canany(['pemohonbantek'])
    <div style="display: flex; justify-content: flex-end; margin-bottom:10px; font-family: 'Times New Roman', serif !important;">
        <button class="button-kembali"
                type="button"
                onclick="location.href='{{ route('bebantekpemohonasistensiindex') }}';"
                style="cursor: pointer; color:black; font-family: 'Times New Roman', serif !important;">
            <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
        </button>
    </div>
@endcanany

@canany(['superadmin', 'admin'])
    <div style="display: flex; justify-content: flex-end; margin-bottom:5px; font-family: 'Times New Roman', serif !important;">
       <a href="{{ url()->previous() }}">
    <button class="button-newvalidasi" type="button" style="cursor: pointer; color:white; font-family: 'Times New Roman', serif !important;">
        <i class="bi bi-arrow-left" style="margin-right: 5px;"></i> Kembali
    </button>
</a>
    </div>
@endcanany

<br>
<br>
<hr>

<div class="container-fluid" style="font-family: 'Times New Roman', serif !important;">
    <!--begin::Row-->
    <div class="row" style="margin-right: 10px; margin-left:10px; font-family: 'Times New Roman', serif !important;">
        <!-- /.card -->
        <div class="card mb-4" style="font-family: 'Times New Roman', serif !important;">
            <div class="card-header" style="font-family: 'Times New Roman', serif !important;">
                <div style="display: flex; justify-content: flex-end; margin-bottom: 5px; font-family: 'Times New Roman', serif !important;">
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
                            font-family: 'Times New Roman', serif !important;
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
                        style="background: linear-gradient(to right, black, white); color: white; border: none; margin-right: 10px; padding: 10px 20px; border-radius: 15px; font-size: 16px; cursor: pointer; display: flex; align-items: center; transition: background-color 0.3s, color 0.3s; font-family: 'Times New Roman', serif !important;">
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

<div style="text-align: center; margin: 20px; font-family: 'Times New Roman', serif !important;">
  <button class="button-baru" onclick="downloadPDF()" style="background-color: #e3342f; color: black; padding: 10px 20px; border: none; border-radius: 5px; font-size: 14px; cursor: pointer; font-family: 'Times New Roman', serif !important;">
    📄 Download Surat Undangan (PDF)
  </button>
</div>

<!-- HALAMAN PERTAMA -->
<div class="halaman" id="halaman-pertama" style="font-family: 'Times New Roman', serif !important;">
    <div class="kop" style="font-family: 'Times New Roman', serif !important;">
      <img src="/assets/abgblora/logo/logokabupatenblora.png" class="logo" style="float: left;">
      <div style="display: inline-block; font-family: 'Times New Roman', serif !important;">
        <h3 style="font-family: 'Times New Roman', serif !important;">PEMERINTAH KABUPATEN BLORA</h3>
        <h3 style="font-family: 'Times New Roman', serif !important;">DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</h3>
        <p style="font-family: 'Times New Roman', serif !important;">Jl. Nusantara No. 62 Telp. (0296) 531004</p>
        <h3 style="font-family: 'Times New Roman', serif !important;">BLORA 58214</h3>
      </div>
      <div style="clear: both;"></div>
    </div>

    <p style="text-align: right; margin-top: 20px; font-size:12px; font-family: 'Times New Roman', serif !important;">Blora, {{ $surat ? \Carbon\Carbon::parse($surat->tanggalundangan)->translatedFormat('d F Y') : '-' }}</p>

    <div style="font-size: 12px; font-family: 'Times New Roman', serif !important;">
      <p style="font-size: 12px; font-family: 'Times New Roman', serif !important;">
          <strong style="font-size: 12px; font-family: 'Times New Roman', serif !important;">Nomor</strong> : 050 / UND-{{ $surat->pbgslfbangunan->noregissimbg ?? '-' }}/{{ $surat->konsultasike ?? '-' }}/2025<br>
          <strong style="font-size: 12px; font-family: 'Times New Roman', serif !important;">Lampiran</strong> : -<br>
          <strong style="font-size: 12px; font-family: 'Times New Roman', serif !important;">Perihal</strong> : <u style="text-decoration: none;" style="font-size: 12px; font-family: 'Times New Roman', serif !important;">Undangan Konsultasi</u>
      </p>

      <p style="font-size: 12px; font-family: 'Times New Roman', serif !important;">
          Kepada Yth:<br>
          Tim Profesi Ahli {{$surat->tpatpt->timpenilai ?? '-'}} <br>
          Di<br>
          Tempat
      </p>

      <p style="font-size: 12px; font-family: 'Times New Roman', serif !important;">Mengharap dengan hormat atas kehadiran Bapak/Ibu Saudara Pada : </p>

      <table style="font-size: 12px; width: 100%; font-family: 'Times New Roman', serif !important;">
          <tr>
              <td style="padding: 4px 8px; vertical-align: top; font-family: 'Times New Roman', serif !important;">Hari / Tanggal</td>
          <td style="padding: 4px 8px; font-family: 'Times New Roman', serif !important;">
    : {{ $surat->tanggalkehadiran ? \Carbon\Carbon::parse($surat->tanggalkehadiran)->translatedFormat('F d Y') : '-' }}
  </td>
          </tr>
          <tr>
      <td style="padding: 4px 8px; vertical-align: top; font-family: 'Times New Roman', serif !important;">Waktu</td>
      <td style="padding: 4px 8px; font-family: 'Times New Roman', serif !important;">
          @if($surat->jamundangan == 'lainnya')
              : {{ $surat->catatan ?? '-' }}
          @else
              : {{ $surat->jamundangan ?? '-' }}
          @endif
      </td>
  </tr>
          <tr>
              <td style="padding: 4px 8px; vertical-align: top; font-family: 'Times New Roman', serif !important;">Tempat</td>
       <td style="padding: 4px 8px; font-family: 'Times New Roman', serif !important;">: {{ $surat->tempatkonsultasi->tempat ?? '-' }}</td>
       </tr>
          <tr>
              <td style="padding: 4px 8px; vertical-align: top; font-family: 'Times New Roman', serif !important;">Acara</td>
              <td style="padding: 4px 8px; font-family: 'Times New Roman', serif !important;">: Konsultasi Teknis PBG/SLF</td>
          </tr>
      </table>

      <p style="margin-top: 10px; font-size: 12px; font-family: 'Times New Roman', serif !important;">
          Mengingat pentingnya acara tersebut mohon Bapak/Ibu/Saudara hadir tepat waktu. Demikian atas perhatian dan kehadirannya disampaikan terima kasih.
      </p>
  </div>
  <br>
     <div style="width: 100%; display: flex; justify-content: flex-end; margin-top: 40px; font-family: 'Times New Roman', serif !important;">
                                      <div style="text-align: left; font-size: 12px; font-family: 'Times New Roman', serif !important;">
                                          Plt. KEPALA DINAS PEKERJAAN UMUM DAN  <br>
                                          PENATAAN RUANG KABUPATEN BLORA<br>
                                          <br><br><br><br><br><br><br>
                                          <div style="display: inline-flex; flex-direction: column; gap: 0; font-family: 'Times New Roman', serif !important;">
                                              <strong style="margin-top: -25px; text-decoration: underline; line-height: 1; font-family: 'Times New Roman', serif !important;">
                                                  NIDZAMUDIN AL HUDDA, ST
                                              </strong>
                                              <span style="line-height: 1; margin-top: 0; font-family: 'Times New Roman', serif !important;">
                                                  NIP. 19720326 200604 1 005
                                              </span>
                                          </div>
                                      </div>
                                  </div>
  </div>

  <!-- HALAMAN KEDUA -->
  <div class="halaman" id="halaman-kedua" style="font-family: 'Times New Roman', serif !important;">

    <p style="text-align: center; font-weight: bold; margin-top: 20px; font-size: 14px; font-family: 'Times New Roman', serif !important;">
      LAMPIRAN SURAT UNDANGAN<br>
      Nomor: 050 / UND-{{ $surat->pbgslfbangunan->noregissimbg ?? '-' }}/{{ $surat->konsultasike ?? '-' }}/2025<br>
      Tanggal: {{ $surat ? \Carbon\Carbon::parse($surat->tanggalundangan)->translatedFormat('d F Y') : '-' }}
    </p>

    <table class="tabel-penerima" style="font-family: 'Times New Roman', serif !important;">
      <thead>
        <tr>
          <th style="font-family: 'Times New Roman', serif !important;">No</th>
          <th style="font-family: 'Times New Roman', serif !important;">Nama</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td style="font-family: 'Times New Roman', serif !important;">1</td>
          <td style="font-family: 'Times New Roman', serif !important;">Plt. Kepala DPUPR Kab. Blora</td>
        </tr>
        <tr>
          <td style="font-family: 'Times New Roman', serif !important;">2</td>
          <td style="font-family: 'Times New Roman', serif !important;">PPKom Bidang Bangunan Gedung</td>
        </tr>
        <tr>
          <td style="font-family: 'Times New Roman', serif !important;">3</td>
          <td style="font-family: 'Times New Roman', serif !important;">PPTK Bidang Bangunan Gedung</td>
        </tr>
        <tr>
          <td style="font-family: 'Times New Roman', serif !important;">4</td>
          <td style="font-family: 'Times New Roman', serif !important;">Muhammad Yusuf Zaqi E., S.E</td>
        </tr>
        <tr>
          <td style="font-family: 'Times New Roman', serif !important;">5</td>
          <td style="font-family: 'Times New Roman', serif !important;">Tresilia Diah Silviati, S.T</td>
        </tr>
        <tr>
          <td style="font-family: 'Times New Roman', serif !important;">6</td>
          <td style="font-family: 'Times New Roman', serif !important;">Novembri Putrilianawati, A.Md</td>
        </tr>
        <tr>
          <td style="font-family: 'Times New Roman', serif !important;">7</td>
          <td style="font-family: 'Times New Roman', serif !important;">Menda Finanto, S.Kom</td>
        </tr>
      </tbody>
    </table>

    <div style="margin-top: 30px; font-size: 12px; font-family: 'Times New Roman', serif !important;">
      <p style="font-family: 'Times New Roman', serif !important;">Demikian lampiran ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>
    </div>
  </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
  const { jsPDF } = window.jspdf;

  async function downloadPDF() {
    // Buat PDF baru
    const pdf = new jsPDF({
      orientation: 'portrait',
      unit: 'mm',
      format: 'a4'
    });

    // Fungsi untuk menambahkan halaman ke PDF
    const addPageToPDF = async (elementId) => {
      const element = document.getElementById(elementId);
      if (!element) return;

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

      // Jika bukan halaman pertama, tambahkan halaman baru
      if (elementId !== 'halaman-pertama') {
        pdf.addPage();
      }

      pdf.addImage(imgData, 'JPEG', x, y, imgWidth, imgHeight);
    };

    // Tambahkan kedua halaman ke PDF
    await addPageToPDF('halaman-pertama');
    await addPageToPDF('halaman-kedua');

    // Simpan PDF
    pdf.save("surat-undangan-tpatpt.pdf");
  }
</script>

<br><br><br>
</div>
</div>
<br><br><br>
</form>

<br>
</div>
</div>

<br><br>
</div>
</div>
</div>
</div>
</main>

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
