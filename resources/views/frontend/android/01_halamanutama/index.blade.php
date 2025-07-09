@include('frontend.android.00_fiturmenu.01_header')
@include('frontend.android.00_fiturmenu.06_alert')

<body class="font-poppins text-[#070625]">
  <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[122px] relative">
  <header class="flex justify-center h-[376px] px-[18px] relative overflow-hidden -mb-[106px] rounded-b-[20px] rounded-bl-[20px] rounded-br-[20px]">
  <img
    src="/assets/android/iconmenu/bangunangedungapp.jpg"
    class="absolute object-cover w-full h-full rounded-b-[20px] rounded-bl-[20px] rounded-br-[20px]"
    alt="backgrounds"
    loading="lazy"
  >
      <div class="fixed top-0 w-full max-w-[640px] px-[18px] z-30" style="margin-top: -25px;">
<nav style="background-color: rgba(255, 255, 255, 0.3); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);" class="p-3 sm:p-[10px_16px] h-fit w-full flex items-center justify-between rounded-full shadow-[0_8px_30px_0_#0A093212] z-10 mt-[60px]">
  <!-- Logo Kiri -->
  <a href="signup.html" class="shrink-0">
    <div class="w-12 h-12 sm:w-[54px] sm:h-[54px] flex overflow-hidden rounded-full items-center justify-center">
      <img src="/assets/abgblora/logo/logokabupatenblora.png" alt="icon" class="w-[80%]" loading="lazy">
    </div>
  </a>

  <!-- Teks Tengah -->
  <div class="flex-1 mx-2 sm:mx-4 min-w-0">
    <div class="flex flex-col items-center sm:items-start text-center sm:text-left">
      <p class="font-semibold text-sm sm:text-base leading-tight text-[#4041DA] truncate w-full" style="font-size:12px;">
        ABG Blora Bangunan Gedung
      </p>
      <div class="flex items-center justify-center sm:justify-start">
        <p class="font-semibold text-sm sm:text-base leading-tight whitespace-normal" style="font-size:12px;">
          Dinas Pekerjaan Umum Dan
          <br> Penataan Ruang <br> Kabupaten Blora Jawa Tengah
        </p>
      </div>
    </div>
  </div>

  <!-- Logo Kanan -->
  <a href="" class="shrink-0">
    <div class="w-12 h-12 sm:w-[54px] sm:h-[54px] flex overflow-hidden rounded-full items-center justify-center">
      <img src="/assets/abgblora/logo/pupr.png" alt="icon" class="w-[80%]">
    </div>
  </a>
</nav>
      </div>
    </header>

    @include('frontend.android.00_fiturmenu.04_menunavigasi')

    <div id="Promo" class="promo-section">
  <div class="promo-header">
    <h6 class="promo-title">Agenda Sosialisasi</h6>
    <a href="#" class="promo-link">Lihat Semua</a>
  </div>

  <div class="promo-carousel">
    <!-- Card 1 -->
    <div class="promo-card">
      <div class="card-image-container">
        <img src="/assets/android/thumbnails/gambar001.png" class="card-image" alt="Agenda Sosialisasi">
        <div class="card-overlay"></div>
        <div class="card-badge">12 Jun 2023</div>
      </div>
      <div class="card-content">
        <h3 class="card-title">Pelatihan IMB Digital</h3>
        <p class="card-description">Sosialisasi pengajuan IMB secara digital untuk masyarakat</p>
      </div>
    </div>

    <!-- Card 2 -->
    <div class="promo-card">
      <div class="card-image-container">
        <img src="/assets/android/thumbnails/gambar002.png" class="card-image" alt="Agenda Sosialisasi">
        <div class="card-overlay"></div>
        <div class="card-badge">25 Jul 2023</div>
      </div>
      <div class="card-content">
        <h3 class="card-title">Workshop KRK</h3>
        <p class="card-description">Pemahaman tentang Ketentuan Rencana Kota</p>
      </div>
    </div>

    <!-- Card 3 -->
    <div class="promo-card">
      <div class="card-image-container">
        <img src="/assets/android/thumbnails/gambar003.png" class="card-image" alt="Agenda Sosialisasi">
        <div class="card-overlay"></div>
        <div class="card-badge">15 Agu 2023</div>
      </div>
      <div class="card-content">
        <h3 class="card-title">Seminar Bangunan Tahan Gempa</h3>
        <p class="card-description">Teknik konstruksi untuk daerah rawan gempa</p>
      </div>
    </div>
  </div>
</div>

<style>
.promo-section {
  margin: 1.5rem 0;
  width: 100%;
  padding: 1.5rem 1rem;
  border-radius: 16px;
  color: white;
  font-family: 'Segoe UI', system-ui, sans-serif;
  position: relative;
  overflow: hidden;
  background: url("/assets/android/iconmenu/belakangnew.jpg") no-repeat center center;
  background-size: cover;
}

.promo-section::before {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(24,40,72,0.85) 0%, rgba(42,58,106,0.85) 100%);
  z-index: 0;
}

.promo-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1.5rem;
  position: relative;
  z-index: 1;
}

.promo-title {
  font-size: 1.1rem;
  font-weight: 600;
  color: white;
  margin: 0;
}

.promo-link {
  font-size: 0.85rem;
  font-weight: 500;
  color: rgba(255,255,255,0.9);
  text-decoration: none;
  transition: color 0.2s;
}

.promo-link:hover {
  color: white;
  text-decoration: underline;
}

.promo-carousel {
  display: flex;
  gap: 1rem;
  overflow-x: auto;
  padding-bottom: 0.5rem;
  position: relative;
  z-index: 1;
  scrollbar-width: none;
}

.promo-carousel::-webkit-scrollbar {
  display: none;
}

.promo-card {
  min-width: 280px;
  background: white;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  transition: transform 0.3s ease;
}

.promo-card:hover {
  transform: translateY(-5px);
}

.card-image-container {
  position: relative;
  height: 160px;
  overflow: hidden;
}

.card-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.promo-card:hover .card-image {
  transform: scale(1.05);
}

.card-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(to top, rgba(24,40,72,0.8) 0%, rgba(24,40,72,0) 50%);
}

.card-badge {
  position: absolute;
  top: 12px;
  right: 12px;
  background: rgba(255,255,255,0.9);
  color: #182848;
  padding: 4px 8px;
  border-radius: 20px;
  font-size: 0.7rem;
  font-weight: 600;
}

.card-content {
  padding: 1rem;
  background: white;
}

.card-title {
  font-size: 1rem;
  font-weight: 600;
  color: #182848;
  margin: 0 0 0.25rem 0;
}

.card-description {
  font-size: 0.8rem;
  color: #5a6a8a;
  margin: 0;
  line-height: 1.4;
}
</style>

<div id="NewsPromo" class="news-section">
  <div class="news-header">
    <h6 class="news-title">Berita Bangunan Gedung</h6>
    <a href="#" class="news-link">Lihat Semua</a>
  </div>

  <div class="news-carousel">
  @foreach ($data as $item)
    <div class="news-card">
      <div class="news-image-container">
        {{-- <img src="{{ asset('storage/' . $item->foto) }}" class="news-image" alt="Berita Bangunan" /> --}}
@if ($item->foto && file_exists(public_path('storage/' . $item->foto)))
    <!-- Gambar dari storage -->
    <img src="{{ asset('storage/' . $item->foto) }}" class="news-image" alt="Berita Bangunan" loading="lazy" />
@elseif ($item->foto)
    <!-- Gambar dari path luar storage -->
    <img src="{{ asset($item->foto) }}" class="news-image" alt="Berita Bangunan" loading="lazy" />
@else
    <!-- Gambar default atau kosong -->
    <img src="/assets/android/thumbnails/default.png" class="news-image" alt="Default Berita" loading="lazy" />
@endif

        <div class="news-overlay"></div>

    </div>
      <div class="news-content">
        <div class="news-meta">
          {{-- Jika ada kategori, bisa ditambahkan, kalau tidak hapus --}}
          {{-- <span class="news-category">{{ $item->kategori ?? 'Berita' }}</span> --}}
          <span class="news-date">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</span>
        </div>
        <h3 class="news-headline">{{ $item->judulberita }}</h3>
        <p class="news-excerpt">{{ Str::limit($item->keterangan, 100, '...') }}</p>
      </div>
    </div>
  @endforeach
</div>

</div>

<style>
.news-section {
  margin: 1.5rem 0;
  width: 100%;
  padding: 1.5rem 1rem;
  border-radius: 16px;
  color: white;
  font-family: 'Segoe UI', system-ui, sans-serif;
  position: relative;
  overflow: hidden;
  background: url("/assets/android/iconmenu/belakangnew.jpg") no-repeat center center;
  background-size: cover;
}

.news-section::before {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(135deg, rgba(24,40,72,0.85) 0%, rgba(42,58,106,0.85) 100%);
  z-index: 0;
}

.news-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 1.5rem;
  position: relative;
  z-index: 1;
}

.news-title {
  font-size: 1.1rem;
  font-weight: 600;
  color: white;
  margin: 0;
}

.news-link {
  font-size: 0.85rem;
  font-weight: 500;
  color: rgba(255,255,255,0.9);
  text-decoration: none;
  transition: color 0.2s;
}

.news-link:hover {
  color: white;
  text-decoration: underline;
}

.news-carousel {
  display: flex;
  gap: 1rem;
  overflow-x: auto;
  padding-bottom: 0.5rem;
  position: relative;
  z-index: 1;
  scrollbar-width: none;
}

.news-carousel::-webkit-scrollbar {
  display: none;
}

.news-card {
  min-width: 280px;
  background: white;
  border-radius: 12px;
  overflow: hidden;
  box-shadow: 0 4px 12px rgba(0,0,0,0.1);
  transition: transform 0.3s ease;
  display: flex;
  flex-direction: column;
}

.news-card:hover {
  transform: translateY(-5px);
}

.news-image-container {
  position: relative;
  height: 160px;
  overflow: hidden;
}

.news-image {
  width: 100%;
  height: 100%;
  object-fit: cover;
  transition: transform 0.5s ease;
}

.news-card:hover .news-image {
  transform: scale(1.05);
}

.news-overlay {
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: linear-gradient(to top, rgba(24,40,72,0.8) 0%, rgba(24,40,72,0) 50%);
}

.news-content {
  padding: 1rem;
  background: white;
  flex-grow: 1;
  display: flex;
  flex-direction: column;
}

.news-meta {
  display: flex;
  justify-content: space-between;
  margin-bottom: 0.5rem;
  font-size: 0.7rem;
}

.news-category {
  background: #4041DA;
  color: white;
  padding: 0.2rem 0.5rem;
  border-radius: 4px;
  font-weight: 500;
}

.news-date {
  color: #6b7280;
  align-self: center;
}

.news-headline {
  font-size: 1rem;
  font-weight: 600;
  color: #182848;
  margin: 0 0 0.5rem 0;
  line-height: 1.3;
}

.news-excerpt {
  font-size: 0.8rem;
  color: #5a6a8a;
  margin: 0;
  line-height: 1.4;
  flex-grow: 1;
}
</style>


    <br><br>

    @include('frontend.android.00_fiturmenu.05_keterangan')

    {{-- ================================================================== --}}


    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
