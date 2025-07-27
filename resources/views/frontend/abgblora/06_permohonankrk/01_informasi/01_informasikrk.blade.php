<!-- CSS Libraries -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<style>
    /* Base Styles */
    body {
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        line-height: 1.6;
        color: #333;
        background: linear-gradient(to bottom, #7de3f1, #ffffff);
        margin: 0;
        padding: 0;
        min-height: 100vh;
    }

    /* Main Content Container */
    .main-container {
        background: white;
        border-radius: 15px;
        box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        margin: 20px auto;
        padding: 20px;
        max-width: 1200px;
    }

    /* Header Styles */
    .header-banner {
        background: linear-gradient(to bottom, #7de3f1, #ffffff);
        width: 100%;
        margin: 0;
        padding: 20px 0;
        position: relative;
    }

    /* Card Styles */
    .card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        padding: 20px;
        margin-bottom: 20px;
        border: none;
    }

    .card-title {
        color: #002366;
        font-size: 18px;
        font-weight: 600;
        margin-bottom: 15px;
        padding-bottom: 10px;
        border-bottom: 1px solid #eee;
    }

    .card-img-container {
        width: 100%;
        height: 700px;
        overflow: hidden;
        border-radius: 8px;
        margin-bottom: 15px;
    }

    .card-img-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .card-img-container img:hover {
        transform: scale(1.03);
    }

    /* Content Styles */
    .content-section {
        font-size: 15px;
        color: #333;
    }

    .content-section p {
        margin-bottom: 12px;
        text-align: justify;
    }

    .content-section ul,
    .content-section ol {
        margin-bottom: 12px;
        padding-left: 20px;
    }

    .content-section li {
        margin-bottom: 8px;
    }

    .content-section .font-bold {
        font-weight: 600;
        color: #002366;
    }

    /* Contact Section */
    .contact-section {
        background-color: #4041DA;
        color: white;
        padding: 20px;
        border-radius: 10px;
        margin: 20px 0;
    }

    /* Information Content Styles */
    .info-container {
        max-width: 900px;
        margin: 40px auto;
        padding: 30px;
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.08);
        font-family: 'Poppins', sans-serif;
        font-size: 15px;
        color: #333;
        line-height: 1.8;
    }

    .info-title {
        font-size: 20px;
        font-weight: 600;
        margin-bottom: 20px;
        color: #1a1a1a;
    }

    .info-subtitle {
        font-size: 16px;
        font-weight: 600;
        margin: 25px 0 10px;
        color: #002366;
        padding-left: 10px;
        border-left: 4px solid #4041DA;
    }

    .info-list {
        margin-left: 20px;
        margin-bottom: 30px;
    }

    .info-list li {
        margin-bottom: 10px;
        position: relative;
        padding-left: 25px;
    }

    .info-list li:before {
        content: "";
        position: absolute;
        left: 0;
        top: 8px;
        width: 8px;
        height: 8px;
        background-color: #4041DA;
        border-radius: 50%;
    }

    .info-list ol {
        counter-reset: item;
        padding-left: 25px;
    }

    .info-list ol li {
        counter-increment: item;
        margin-bottom: 10px;
    }

    .info-list ol li:before {
        content: counter(item) ".";
        position: absolute;
        left: 0;
        font-weight: bold;
        color: #4041DA;
        background: none;
        width: auto;
        height: auto;
    }

    .info-link {
        color: #007bff;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .info-link:hover {
        color: #0056b3;
        text-decoration: underline;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .card-img-container {
            height: 200px;
        }

        .main-container {
            margin: 10px;
            padding: 15px;
        }

        .content-section {
            font-size: 14px;
        }

        .info-container {
            padding: 20px;
            margin: 20px auto;
        }

        .info-title {
            font-size: 18px;
        }

        .info-subtitle {
            font-size: 15px;
        }
    }
</style>

    <!-- Header Includes -->
    @include('frontend.abgblora.00_fiturmenu.02_header')
    @include('frontend.abgblora.00_fiturmenu.05_menunavigasweb')
    @include('backend.00_administrator.00_baganterpisah.09_button')

    <!-- Banner Section -->
    <section class="header-banner" style="margin-top:65px;">
        <div class="container max-w-[1130px] mx-auto" style="padding-top: 50px;">
            <div class="flex items-center gap-[20px]">
                <!-- Content here -->
            </div>
        </div>
    </section>

    <!-- Main Content Section -->
    <div class="main-container">
        <section id="details" class="container-fluid flex flex-col sm:flex-row gap-5">
            <div class="flex flex-col gap-5 w-full">
                <div class="flex flex-col gap-5 p-5 rounded-[20px] w-full">
                    <div class="w-full bg-[#030303] flex items-center gap-[10px] p-[10px_14px] rounded-xl">
                        <div class="w-5 h-5 flex shrink-0">
                            <img src="/assets/new/icons/story.svg" alt="icon">
                        </div>
                        <p class="text-white font-normal text-sm">
                            <span class="font-bold">Informasi Permohonan (KRK) Keterangan Rencana Kota/Kabupaten </span>
                        </p>
                    </div>

                    <!-- Include Menu -->
                    {{-- @include('frontend.abgblora.01_pbgslf.00_informasi.fiturmenupbg') --}}

                    <!-- Information Cards -->
                    <div class="container-fluid px-0">
                        <!-- Lampiran Section -->
                        <div class="mb-5">
                            {{-- <h6 class="fw-semibold mb-4" style="font-size: 18px;">
                                <i class="bi bi-paperclip text-primary"></i> Lampiran Informasi
                            </h6> --}}

                            <div class="row g-4">
                                <div class="col-md-12">
                               <div class="info-container">
    {{-- <!-- Judul -->
    <h2 class="info-title">
        Pentingnya KRK (Keterangan Rencana Kabupaten) dalam Pengurusan PBG
    </h2> --}}

    <!-- Gambar -->
<div class="card-img-container">
  <img id="slideImage" src="" alt="Perencanaan Tata Ruang" />
</div>
<div class="caption" id="captionText">Perencanaan Tata Ruang</div>

<script>
  const images = [
    {
      url: "https://source.unsplash.com/900x700/?urban,planning",
      caption: "Perencanaan Tata Ruang"
    },
    {
      url: "https://source.unsplash.com/900x700/?city,architecture",
      caption: "Arsitektur Kota"
    },
    {
      url: "https://source.unsplash.com/900x700/?urban,design",
      caption: "Desain Urban"
    },
    {
      url: "https://source.unsplash.com/900x700/?cityscape,planning",
      caption: "Rencana Kota Masa Depan"
    }
  ];

  let currentIndex = 0;
  const imgElement = document.getElementById('slideImage');
  const captionElement = document.getElementById('captionText');

  function showSlide(index) {
    imgElement.src = images[index].url + "&" + new Date().getTime(); // cache-busting supaya gambar fresh
    imgElement.alt = images[index].caption;
    captionElement.textContent = images[index].caption;
  }

  function nextSlide() {
    currentIndex = (currentIndex + 1) % images.length;
    showSlide(currentIndex);
  }

  // Tampilkan gambar pertama saat halaman load
  showSlide(currentIndex);

  // Ganti gambar setiap 5 detik
  setInterval(nextSlide, 5000);
</script>
<!-- Container Utama -->
<div style="font-family: 'Poppins', sans-serif; background-color: #f9fafb; color: #333; line-height: 1.65; padding: 30px 25px; border-radius: 12px; box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1); max-width: 900px; margin: auto;">

  <!-- Judul -->
  <h2 style="font-size: 22px; font-weight: 700; margin-bottom: 25px; color: #0a2540; text-align: center;">
    Penjelasan Tentang KRK (Keterangan Rencana Kabupaten)
  </h2>

  <!-- Paragraf 1 -->
  <p style="text-align: justify; margin-bottom: 1.6rem; font-size: 16px;">
    KRK atau Keterangan Rencana Kabupaten merupakan dokumen yang memberikan kejelasan dan kepastian mengenai rencana tata ruang suatu wilayah pada tingkat kabupaten. Dalam konteks pengurusan izin bangunan, seperti Persetujuan Bangunan Gedung (PBG), KRK memiliki peran yang sangat fundamental karena menjadi acuan utama dalam menentukan kesesuaian lokasi pembangunan dengan peraturan tata ruang yang berlaku.
  </p>

  <!-- Paragraf 2 -->
  <p style="text-align: justify; margin-bottom: 1.6rem; font-size: 16px;">
    Tanpa adanya KRK, proses perizinan bangunan akan terhambat karena tidak ada kejelasan apakah lokasi tersebut diperbolehkan untuk fungsi bangunan yang direncanakan. KRK membantu pemerintah daerah dalam memastikan bahwa pembangunan tidak melanggar zonasi, tidak berada di kawasan lindung, serta sesuai dengan RTRW (Rencana Tata Ruang Wilayah) yang telah disusun.
  </p>

  <!-- Paragraf 3 -->
  <p style="text-align: justify; margin-bottom: 1.6rem; font-size: 16px;">
    Dalam proses pengajuan PBG, keberadaan KRK diperlukan sejak awal sebagai prasyarat administrasi. KRK menjadi dokumen dasar yang menentukan langkah selanjutnya, seperti perencanaan desain bangunan, penghitungan retribusi, hingga analisis dampak lingkungan. Oleh karena itu, pemohon wajib menyertakan KRK agar permohonan PBG dapat diproses secara teknis oleh dinas terkait.
  </p>

  <!-- Paragraf 4 -->
  <p style="text-align: justify; margin-bottom: 1.6rem; font-size: 16px;">
    Selain sebagai persyaratan administratif, KRK juga berperan strategis dalam mewujudkan pembangunan yang berkelanjutan. Dokumen ini memastikan pembangunan tidak hanya legal, tapi juga berwawasan lingkungan dan terintegrasi dengan kebutuhan kawasan sekitarnya. KRK menjadi jembatan antara perencanaan pembangunan mikro (per individu) dan kebijakan pembangunan makro oleh pemerintah.
  </p>

  <!-- Paragraf 5 -->
  <p style="text-align: justify; margin-bottom: 1.6rem; font-size: 16px;">
    Pemerintah daerah berkewajiban menyediakan layanan penerbitan KRK melalui sistem digital seperti
    <a href="https://simbg.pu.go.id" target="_blank" style="color: #0077cc; text-decoration: none; font-weight: 600; border-bottom: 2px solid transparent;" onmouseover="this.style.color='#004a80'; this.style.borderColor='#0077cc';" onmouseout="this.style.color='#0077cc'; this.style.borderColor='transparent';">simbg.pu.go.id</a>.
    Melalui sistem ini, masyarakat dapat mengakses informasi tata ruang secara transparan dan efisien. Digitalisasi KRK juga mendukung komitmen pemerintah dalam memberikan pelayanan publik yang cepat, tepat, dan akuntabel.
  </p>

  <!-- Paragraf 6 -->
  <p style="text-align: justify; margin-bottom: 1.6rem; font-size: 16px;">
    Kesimpulannya, KRK bukan hanya sekadar dokumen pelengkap, melainkan fondasi utama dalam sistem perizinan bangunan modern. Keberadaannya memperkuat legalitas dan arah pembangunan sesuai dengan perencanaan wilayah. Setiap pemilik bangunan wajib memahami dan memenuhi persyaratan KRK untuk menjamin pembangunan yang tertib, aman, dan sesuai regulasi.
  </p>
</div>

</div>

                                </div>
                            </div>
                        </div>

                        <!-- Contact Section -->
                        {{-- <div class="contact-section">
                            <h5 class="fw-semibold mb-2"><i class="bi bi-headset"></i> Layanan dan Pengaduan</h5>
                            <p class="mb-1">Untuk permohonan bantuan, pengaduan, saran, atau masukan terkait pelayanan kami:</p>
                            <a href="mailto:bid.bangunan.gedung.blora@gmail.com" class="text-white text-decoration-underline">
                                <i class="bi bi-envelope"></i> bid.bangunan.gedung.blora@gmail.com
                            </a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer Includes -->
    @include('frontend.abgblora.00_fiturmenu.03_footer')
    @include('frontend.abgblora.00_fiturmenu.04_footer')

    <!-- Back to Top Button -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

