<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Surat Perjalanan Dinas</title>

  <!-- Google Fonts - Poppins -->
  <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">

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
      border: 1px solid black;
      vertical-align: top;
    }

    .ttd {
      text-align: right;
      margin-top: 40px;
    }

    .download-btn {
      text-align: center;
      margin: 20px;
    }

    .download-btn button {
      background-color: #e3342f;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      font-size: 14px;
      cursor: pointer;
    }

    .poppins-12 {
      font-family: 'Poppins', sans-serif;
      font-size: 12px;
    }

    @media print {
      body {
        background: white;
      }
      .download-btn {
        display: none;
      }
    }
  </style>
</head>
<body>
  <div class="download-btn">
    <button onclick="downloadPDF()">📄 Download Surat Tugas (PDF)</button>
  </div>

  <div class="halaman">
    <!-- Kop Surat -->
    <div class="kop">
      <img src="/assets/abgblora/logo/logokabupatenblora.png" class="logo" style="float: left;">
      <div style="display: inline-block;">
        <h3>PEMERINTAH KABUPATEN BLORA</h3>
        <h3>DINAS PEKERJAAN UMUM DAN PENATAAN RUANG</h3>
        <p>Jl. Nusantara No. 62 Telp. (0296) 531004</p>
        <h3>BLORA 58214</h3>
      </div>
      <div style="clear: both;"></div>
    </div>

    <!-- Judul Surat -->
    <p class="judul-surat">SURAT PERJALANAN DINAS</p>

    <!-- Isi Surat -->
    <table class="tabel-info">
      <tr>
        <td style="width: 25px;">1.</td>
        <td>Pejabat Pembuat Komitmen</td>
        <td colspan="3">MOHAMAD ARIF HIDAYAT, ST</td>
      </tr>
      <tr>
        <td>2.</td>
        <td>Nama Pegawai yang Melaksanakan Perjalanan Dinas</td>
        <td colspan="3">{{ $data->namapetugas->namalengkap ?? '-' }}</td>
      </tr>
      <tr>
        <td></td>
        <td>a. NIP</td>
        <td colspan="3">{{ $data->namapetugas->nip ?? '-' }}</td>
      </tr>
      <tr>
        <td></td>
        <td>b. Pangkat/Golongan</td>
        <td colspan="3">{{ $data->namapetugas->pangkat ?? '-' }}</td>
      </tr>
      <tr>
        <td></td>
        <td>c. Jabatan</td>
        <td colspan="3">{{ $data->namapetugas->jabatan ?? '-' }}</td>
      </tr>
      <tr>
        <td></td>
        <td>d. Tingkat Biaya Perjalanan</td>
        <td colspan="3">{{ $data->namapetugas->tingkatbiaya ?? '-' }}</td>
      </tr>
      <tr>
        <td>3.</td>
        <td>Maksud Perjalanan Dinas</td>
        <td colspan="3">{{ $data->maksudperjalanan ?? '-' }}</td>
      </tr>
      <tr>
        <td>4.</td>
        <td>Alat Angkutan yang Dipergunakan</td>
        <td colspan="3">{{ $data->angkutan ?? '-' }}</td>
      </tr>
      <tr>
        <td>5.</td>
        <td>a. Tempat Berangkat</td>
        <td colspan="3">{{ $data->tempatberangkat ?? '-' }}</td>
      </tr>
      <tr>
        <td></td>
        <td>b. Tempat Tujuan</td>
        <td colspan="3">{{ $data->tempattujuan ?? '-' }}</td>
      </tr>
      <tr>
        <td>6.</td>
        <td>a. Lama Perjalanan Dinas</td>
        <td colspan="3">{{ $data->lamaperjalanan ?? '-' }}</td>
      </tr>
      <tr>
        <td></td>
        <td>b. Tanggal Berangkat</td>
        <td colspan="3">{{ \Carbon\Carbon::parse($data->mulaiperjalanan)->translatedFormat('d F Y') ?? '-' }}</td>
      </tr>
      <tr>
        <td></td>
        <td>c. Tanggal Harus Kembali</td>
        <td colspan="3">{{ \Carbon\Carbon::parse($data->selesaiperjalanan)->translatedFormat('d F Y') ?? '-' }}</td>
      </tr>
      <tr>
        <td>7.</td>
        <td colspan="4" align="center"><strong>PENGIKUT</strong></td>
      </tr>
      <tr>
        <td></td>
        <td align="center"><strong>Nama Lengkap</strong></td>
        <td align="center"><strong>NIP</strong></td>
        <td align="center"><strong>PANGKAT</strong></td>
        <td align="center"><strong>TANDA TANGAN</strong></td>
      </tr>
      <tr>
        <td></td>
        <td style="height: 40px;">{{ $data->pendampingdinas->namalengkap }}</td>
        <td>{{ $data->pendampingdinas->nip }}</td>
        <td>{{ $data->pendampingdinas->pangkat }}</td>
        <td></td>
      </tr>
      <tr>
        <td>8.</td>
        <td>Pembebanan Anggaran <br> - Kegiatan</td>
        <td colspan="3">
          <strong>Kegiatan:</strong><br>
          <p>{{ $data->ketkegiatan ?? '-' }}</p>
        </td>
      </tr>
    </table>

    <!-- Tanda Tangan -->
    <div class="poppins-12">
      <div style="text-align: right; margin-bottom: 20px;">
        Ditetapkan di Blora, pada tanggal [Tanggal Lengkap] 2025
      </div>

      <table style="width: 100%; border-collapse: collapse;">
        <tr>
          <td style="width: 50%; vertical-align: top;">
            <div style="margin-bottom: 6px;">Pegawai / Pegawai yang diperintah:</div>
            <div style="margin-top: 40px; font-weight: bold;">MUHAMMAD YUSUF ZAQIE, SE</div>
            <div>NIP 19920611 202221 1 030</div>
          </td>
          <td style="width: 50%; text-align: center;">
            <div style="font-weight: bold;">PEJABAT PEMBUAT KOMITMEN</div>
            <div style="height: 60px;"></div>
            <div style="font-weight: bold;">MOHAMAD ARIF HIDAYAT, ST</div>
            <div>NIP 19710508 199803 1 011</div>
          </td>
        </tr>
      </table>
    </div>
  </div>

  <!-- JavaScript Libraries -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>

  <script>
    const { jsPDF } = window.jspdf;

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
      pdf.save("surat-tugas-fasilitator.pdf");
    }
  </script>
</body>
</html>
