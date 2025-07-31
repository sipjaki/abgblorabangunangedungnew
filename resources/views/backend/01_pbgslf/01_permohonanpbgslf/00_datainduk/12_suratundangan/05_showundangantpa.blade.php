<style>
  body {
    font-family: 'Times New Roman', serif !important;
  }

  .zebra-table {
    width: 100% !important;
    border-collapse: collapse !important;
    font-family: 'Times New Roman', serif !important;
    font-size: 14px !important;
    border: 1px solid #e5e7eb !important;
  }

  .zebra-table th {
    background-color: #ADD8E6 !important;
    color: black !important;
    text-align: center !important;
    padding: 8px 12px !important;
    border: 1px solid #e5e7eb !important;
    white-space: nowrap !important;
  }

  .zebra-table td {
    text-align: center !important;
    padding: 8px 12px !important;
    border: 1px solid #e5e7eb !important;
    white-space: nowrap !important;
  }

  .zebra-table tbody tr:nth-child(odd) {
    background-color: #ffffff !important;
  }

  .zebra-table tbody tr:nth-child(even) {
    background-color: #f1f1f1 !important;
  }

  .zebra-table tbody tr:hover {
    background-color: #ffd100 !important;
  }

  th {
    background-color: #ADD8E6 !important;
  }

  /* Additional styles for the document */
  @page {
    size: A4;
    margin: 0;
  }

  .halaman {
    width: 21cm !important;
    height: 29.7cm !important;
    margin: auto !important;
    background: white !important;
    padding: 2cm !important;
    box-sizing: border-box !important;
    border: 1px solid black !important;
    margin-bottom: 20px !important;
    font-family: 'Times New Roman', serif !important;
  }

  .kop {
    text-align: center !important;
    border-bottom: 2px solid black !important;
    padding-bottom: 10px !important;
    margin-bottom: 20px !important;
    font-family: 'Times New Roman', serif !important;
  }

  .kop h3 {
    margin: 2px 0 !important;
    font-size: 16px !important;
    font-family: 'Times New Roman', serif !important;
  }

  .kop p {
    margin: 4px 0 !important;
    font-size: 13px !important;
    font-family: 'Times New Roman', serif !important;
  }

  .logo {
    height: 80px !important;
  }

  .judul-surat {
    text-align: center !important;
    font-weight: bold !important;
    text-decoration: underline !important;
    margin-bottom: 20px !important;
    font-size: 14px !important;
    font-family: 'Times New Roman', serif !important;
  }

  .isi-surat p {
    text-align: justify !important;
    line-height: 1.6 !important;
    margin-bottom: 10px !important;
    font-family: 'Times New Roman', serif !important;
  }

  .tabel-info {
    width: 100% !important;
    margin-top: 20px !important;
    border-collapse: collapse !important;
    font-size: 12px !important;
    font-family: 'Times New Roman', serif !important;
  }

  .tabel-info td {
    padding: 4px !important;
    font-family: 'Times New Roman', serif !important;
  }

  .ttd {
    text-align: right !important;
    margin-top: 40px !important;
    font-family: 'Times New Roman', serif !important;
  }

  .tabel-penerima {
    width: 100% !important;
    border-collapse: collapse !important;
    margin-top: 20px !important;
    font-size: 12px !important;
    font-family: 'Times New Roman', serif !important;
  }

  .tabel-penerima th,
  .tabel-penerima td {
    border: 1px solid black !important;
    padding: 8px !important;
    text-align: left !important;
    font-family: 'Times New Roman', serif !important;
  }

  .tabel-penerima th {
    background-color: #f2f2f2 !important;
    font-family: 'Times New Roman', serif !important;
  }

  @media print {
    body {
      background: white !important;
      font-family: 'Times New Roman', serif !important;
    }
  }

  /* Button styles */
  .button-baru {
    background-color: #e3342f !important;
    color: black !important;
    padding: 10px 20px !important;
    border: none !important;
    border-radius: 5px !important;
    font-size: 14px !important;
    cursor: pointer !important;
    font-family: 'Times New Roman', serif !important;
  }

  .button-kembali {
    background: linear-gradient(to right, black, white) !important;
    color: white !important;
    border: none !important;
    margin-right: 10px !important;
    padding: 10px 20px !important;
    border-radius: 15px !important;
    font-size: 16px !important;
    cursor: pointer !important;
    display: flex !important;
    align-items: center !important;
    transition: background-color 0.3s, color 0.3s !important;
    font-family: 'Times New Roman', serif !important;
  }

  .button-kembali:hover {
    background: white !important;
    color: black !important;
  }
</style>

<!-- Rest of your HTML content remains the same -->
<div class="halaman" id="halaman-pertama">
  <!-- Your content here -->
</div>

<div class="halaman" id="halaman-kedua">
  <!-- Your content here -->
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
  const { jsPDF } = window.jspdf;

  async function downloadPDF() {
    const pdf = new jsPDF({
      orientation: 'portrait',
      unit: 'mm',
      format: 'a4'
    });

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

      if (elementId !== 'halaman-pertama') {
        pdf.addPage();
      }

      pdf.addImage(imgData, 'JPEG', x, y, imgWidth, imgHeight);
    };

    await addPageToPDF('halaman-pertama');
    await addPageToPDF('halaman-kedua');
    pdf.save("surat-undangan-tpatpt.pdf");
  }
</script>
