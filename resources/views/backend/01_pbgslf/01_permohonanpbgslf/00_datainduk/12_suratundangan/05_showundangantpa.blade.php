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
      margin-bottom: 20px;
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
    .tabel-penerima {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      font-size: 12px;
    }
    .tabel-penerima th, .tabel-penerima td {
      border: 1px solid black;
      padding: 8px;
      text-align: left;
    }
    .tabel-penerima th {
      background-color: #f2f2f2;
    }
    @media print {
      body {
        background: white;
      }
    }
  </style>
</head>

<div style="text-align: center; margin: 20px;">
  <button class="button-baru" onclick="downloadPDF()" style="background-color: #e3342f; color: black; padding: 10px 20px; border: none; border-radius: 5px; font-size: 14px; cursor: pointer;">
    📄 Download Surat Undangan (PDF)
  </button>
</div>

<body>
  <!-- HALAMAN PERTAMA -->
  <div class="halaman" id="halaman-pertama">
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

    <p style="text-align: right; margin-top: 20px; font-size:12px;">Blora, {{ $surat ? \Carbon\Carbon::parse($surat->tanggalundangan)->translatedFormat('d F Y') : '-' }}</p>

    <div style="font-size: 12px;">
      <p style="font-size: 12px;">
          <strong>Nomor</strong> : 050 / UND-{{ $surat->pbgslfbangunan->noregissimbg ?? '-' }}/{{ $surat->konsultasike ?? '-' }}/2025<br>
          <strong>Lampiran</strong> : -<br>
          <strong>Perihal</strong> : <u style="text-decoration: none;">Undangan Konsultasi</u>
      </p>

      <p style="font-size: 12px;">
          Kepada Yth:<br>
          Tim Profesi Ahli {{$surat->tpatpt->timpenilai ?? '-'}} <br>
          Di<br>
          Tempat
      </p>

      <p style="font-size: 12px;">Mengharap dengan hormat atas kehadiran Bapak/Ibu Saudara Pada : </p>

      <table style="font-size: 12px; width: 100%;">
          <tr>
              <td style="padding: 4px 8px; vertical-align: top;">Hari / Tanggal</td>
          <td style="padding: 4px 8px;">
    : {{ $surat->tanggalkehadiran ? \Carbon\Carbon::parse($surat->tanggalkehadiran)->translatedFormat('F d Y') : '-' }}
  </td>
          </tr>
          <tr>
      <td style="padding: 4px 8px; vertical-align: top;">Waktu</td>
      <td style="padding: 4px 8px;">
          @if($surat->jamundangan == 'lainnya')
              : {{ $surat->catatan ?? '-' }}
          @else
              : {{ $surat->jamundangan ?? '-' }}
          @endif
      </td>
  </tr>
          <tr>
              <td style="padding: 4px 8px; vertical-align: top;">Tempat</td>
       <td style="padding: 4px 8px;">: {{ $surat->tempatkonsultasi->tempat ?? '-' }}</td>
       </tr>
          <tr>
              <td style="padding: 4px 8px; vertical-align: top;">Acara</td>
              <td style="padding: 4px 8px;">: Konsultasi Teknis PBG/SLF</td>
          </tr>
      </table>

      <p style="margin-top: 10px; font-size: 12px;">
          Mengingat pentingnya acara tersebut mohon Bapak/Ibu/Saudara hadir tepat waktu. Demikian atas perhatian dan kehadirannya disampaikan terima kasih.
      </p>
  </div>
  <br>
     <div style="width: 100%; display: flex; justify-content: flex-end; margin-top: 40px;">
                                      <div style="text-align: left; font-size: 12px;">
                                          Plt. Kepala Dinas Pekerjaan Umum <br>
                                          Dan Penataan Ruang Kabupaten Blora<br>
                                          <br><br><br><br><br><br><br>
                                          <div style="display: inline-flex; flex-direction: column; gap: 0;">
                                              <strong style="margin-top: -25px; text-decoration: underline; line-height: 1;">
                                                  NIDZAMUDIN AL HUDA, ST
                                              </strong>
                                              <span style="line-height: 1; margin-top: 0;">
                                                  NIP. 19720326 200604 1 005
                                              </span>
                                          </div>
                                      </div>
                                  </div>
  </div>

  <!-- HALAMAN KEDUA -->
  <div class="halaman" id="halaman-kedua">
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

    <p style="text-align: center; font-weight: bold; margin-top: 20px; font-size: 14px;">
      LAMPIRAN SURAT UNDANGAN<br>
      Nomor: 050 / UND-{{ $surat->pbgslfbangunan->noregissimbg ?? '-' }}/{{ $surat->konsultasike ?? '-' }}/2025<br>
      Tanggal: {{ $surat ? \Carbon\Carbon::parse($surat->tanggalundangan)->translatedFormat('d F Y') : '-' }}
    </p>

    <p style="font-size: 12px; margin-top: 20px;">
      <strong>Daftar Penerima Undangan:</strong>
    </p>

    <table class="tabel-penerima">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Jabatan</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>1</td>
          <td>Plt. Kepala DPUPR Kab. Blora</td>
          <td>Penanggung Jawab</td>
        </tr>
        <tr>
          <td>2</td>
          <td>PPKom Bidang Bangunan Gedung</td>
          <td>Penanggung Jawab Kompetensi</td>
        </tr>
        <tr>
          <td>3</td>
          <td>PPTK Bidang Bangunan Gedung</td>
          <td>Penanggung Jawab Teknis</td>
        </tr>
        <tr>
          <td>4</td>
          <td>Muhammad Yusuf Zaqi E., S.E</td>
          <td>Ketua Tim Teknis Kegiatan</td>
        </tr>
        <tr>
          <td>5</td>
          <td>Tresilia Diah Silviati, S.T</td>
          <td>Sekretaris Tim Teknis Kegiatan</td>
        </tr>
        <tr>
          <td>6</td>
          <td>Novembri Putrilianawati, A.Md</td>
          <td>Anggota Tim Teknis Kegiatan</td>
        </tr>
        <tr>
          <td>7</td>
          <td>Menda Finanto, S.Kom</td>
          <td>Anggota Tim Teknis Kegiatan</td>
        </tr>
      </tbody>
    </table>

    <div style="margin-top: 30px; font-size: 12px;">
      <p>Demikian lampiran ini dibuat untuk dapat dipergunakan sebagaimana mestinya.</p>
    </div>

    <div style="width: 100%; display: flex; justify-content: flex-end; margin-top: 40px;">
      <div style="text-align: left; font-size: 12px;">
        Plt. Kepala Dinas Pekerjaan Umum <br>
        Dan Penataan Ruang Kabupaten Blora<br>
        <br><br><br><br><br><br><br>
        <div style="display: inline-flex; flex-direction: column; gap: 0;">
          <strong style="margin-top: -25px; text-decoration: underline; line-height: 1;">
            NIDZAMUDIN AL HUDA, ST
          </strong>
          <span style="line-height: 1; margin-top: 0;">
            NIP. 19720326 200604 1 005
          </span>
        </div>
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
    pdf.save("surat-undangan-TPATPT.pdf");
  }
</script>
