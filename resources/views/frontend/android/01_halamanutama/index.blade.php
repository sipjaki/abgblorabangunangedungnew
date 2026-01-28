@include('frontend.android.00_fiturmenu.01_header')
@include('frontend.android.00_fiturmenu.06_alert')

@include('backend.00_administrator.00_baganterpisah.09_button')

<body class="font-poppins text-[#070625]">
  <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[122px] relative">
<header class="relative navy-gradient h-[280px] overflow-hidden">
  <!-- Background -->
  <img
    src="/assets/android/iconmenu/4newbangunan.png"
    class="absolute object-cover w-full h-full"
    alt="backgrounds"
    loading="lazy"
  >

  <!-- Navbar Fixed -->
  <div class="fixed top-0 w-full max-w-[640px] z-30 px-[18px] left-1/2 transform -translate-x-1/2">
    <nav
      style="background-color: rgba(255, 255, 255, 0.3); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);"
      class="p-3 sm:p-[10px_16px] h-fit w-full flex items-center justify-between rounded-full shadow-[0_8px_30px_0_#0A093212] z-10 mt-4"
    >
      <!-- Logo Kiri -->
      <a href="signup.html" class="shrink-0">
        <div class="w-12 h-12 sm:w-[54px] sm:h-[54px] flex overflow-hidden rounded-full items-center justify-center bg-white">
          <img src="/assets/abgblora/logo/pupr.png" alt="icon" class="w-[80%]" loading="lazy">
        </div>
      </a>

      <!-- Teks Tengah -->
      <div class="flex-1 mx-2 sm:mx-4 min-w-0">
        <div class="flex flex-col items-center sm:items-start text-center sm:text-left">
          <div class="flex items-center justify-center sm:justify-start">
            <p class="font-semibold text-sm sm:text-base leading-tight whitespace-normal text-white" style="font-size:12px;">
              Dinas Pekerjaan Umum Dan
              <br> Penataan Ruang
            </p>
          </div>
        </div>
      </div>

      <!-- Logo Kanan -->
      <a href="" class="shrink-0">
        <div class="w-12 h-12 sm:w-[54px] sm:h-[54px] flex overflow-hidden rounded-full items-center justify-center bg-white">
          <img src="/assets/abgblora/logo/logokabupatenblora.png" alt="icon" class="w-[80%]">
        </div>
      </a>
    </nav>
  </div>

  <!-- Konten "Cari BBCA Q LITE PRO" -->
  <div class="relative z-10 pt-20 px-6">
    <div class="mb-4">
      <h1 class="text-white text-2xl font-bold mb-1">Cari </h1>
      <div class="flex items-center">
        <div class="bg-blue-400 text-white text-xs font-medium px-2 py-1 rounded mr-2">Q</div>
        {{-- <h2 class="text-white text-xl font-semibold">LITE PRO</h2> --}}
      </div>
    </div>

    <!-- Search Box -->
    <div class="bg-white rounded-2xl p-4 shadow-lg">
      <div class="flex items-center">
        <div class="mr-3 text-blue-600">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
          </svg>
        </div>
        <div class="flex-1">
          <p class="text-gray-800 font-medium text-sm">Cari Menu</p>
          <p class="text-gray-500 text-xs">.....</p>
        </div>
        <div class="ml-3">
          <div class="bg-blue-600 text-white p-2 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
    @include('frontend.android.00_fiturmenu.04_menunavigasi')
<div id="Promo" class="promo-section">
    <div class="promo-header">
        <h6 class="promo-title" style="font-size: 16px;">Agenda Sosialisasi</h6>
        <a href="#" class="promo-link">Lihat Semua</a>
    </div>

    <div class="promo-carousel">
    @forelse ($agendapelatihan as $item)
        <div class="promo-card">
            <div class="card-image-container">
                <img src="{{ asset($item->foto) }}" class="card-image" alt="{{ $item->namakegiatan }}">
                <div class="card-overlay"></div>
                <div class="card-badge">
                    {{ \Carbon\Carbon::parse($item->waktupelaksanaan)->translatedFormat('d M Y') }}
                </div>
            </div>
            <div class="card-content" style="display: flex; flex-direction: column; align-items: center; justify-content: space-between; padding: 12px; text-align: center;">
    <!-- Nama Kegiatan -->
    <h3 class="card-title"
        style="font-size: 16px; font-weight: 600; color: #222; margin-bottom: 12px; font-family: 'Poppins', sans-serif;">
        {{ $item->namakegiatan }}
    </h3>

    <!-- Tombol -->
    @if(\Carbon\Carbon::now()->lessThanOrEqualTo(\Carbon\Carbon::parse($item->penutupan)))
        <a href="{{ route('daftaragenda', $item->id) }}" style="text-decoration: none; width: 100%;">
            <button class="button-modern"
                style="display: flex; align-items: center; justify-content: center; gap: 6px;
                       width: 100%; padding: 8px 16px; border-radius: 8px;
                       background-color: navy; color: black; font-weight: bold;
                       font-size: 14px; transition: 0.3s;">
                <i class="bi bi-pencil-square" style="font-size: 16px;"></i> <span style="color:black;"></span> Daftar
            </button>
        </a>
    @else
        <button class="button-dikembalikan"
            style="display: flex; align-items: center; justify-content: center; gap: 6px;
                   width: 100%; padding: 8px 16px; border-radius: 8px;
                   background-color: #dc3545; color: white; font-weight: bold;
                   font-size: 14px;" disabled>
            <i class="bi bi-x-octagon" style="font-size: 16px;"></i> Ditutup
        </button>
    @endif
</div>

        </div>
    @empty
        <div style="
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            color: #6c757d;
            background-color: #f8f9fa;
            border: 2px dashed #ced4da;
            border-radius: 12px;
            font-size: 16px;
            animation: fadeIn 0.5s ease-in-out;
        ">
            <i class="bi bi-folder-x" style="margin-right: 8px; font-size: 20px; color: #dc3545;"></i>
            Belum Ada Agenda Sosialisasi !
        </div>
    @endforelse
</div>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

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
    <h6 class="news-title" style="font-size: 16px;">Berita Bangunan Gedung</h6>
    <a href="#" class="news-link">Lihat Semua</a>
  </div>
<div class="news-carousel">
  @forelse ($data as $item)
    <div class="news-card">
      <div class="news-image-container">
        @if ($item->foto && file_exists(public_path('storage/' . $item->foto)))
            <!-- Gambar dari storage -->
            <img src="{{ asset('storage/' . $item->foto) }}" class="news-image" alt="Berita Bangunan" loading="lazy" />
        @elseif ($item->foto)
            <!-- Gambar dari path luar storage -->
            <img src="{{ asset($item->foto) }}" class="news-image" alt="Berita Bangunan" loading="lazy" />
        @else
            <!-- Gambar default -->
            <img src="/assets/android/thumbnails/default.png" class="news-image" alt="Default Berita" loading="lazy" />
        @endif

        <div class="news-overlay"></div>
      </div>

      <div class="news-content">
        <div class="news-meta">
          {{-- <span class="news-category">{{ $item->kategori ?? 'Berita' }}</span> --}}
          <span class="news-date">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</span>
        </div>
        <h3 class="news-headline">{{ $item->judulberita }}</h3>
        <p class="news-excerpt">{{ Str::limit($item->keterangan, 100, '...') }}</p>
      </div>
    </div>
  @empty
    <div style="
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px;
        font-weight: 600;
        font-family: 'Poppins', sans-serif;
        color: #6c757d;
        background-color: #f8f9fa;
        border: 2px dashed #ced4da;
        border-radius: 12px;
        font-size: 16px;
        animation: fadeIn 0.5s ease-in-out;
    ">
        <i class="bi bi-folder-x" style="margin-right: 8px; font-size: 20px; color: #dc3545;"></i>
        Belum Ada Berita di Terbitkan !
    </div>
  @endforelse
</div>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>


</div>
<div id="NewsPromo" class="news-section">
  <div class="news-header">
    <h6 class="news-title" style="font-size: 16px;">Artikel Bangunan Gedung </h6>
    <a href="#" class="news-link">Lihat Semua</a>
  </div>

<div class="news-carousel">
  @forelse ($dataartikel as $item)
    <div class="news-card">
      <div class="news-pdf-container" style="width: 100%; height: 200px; margin-bottom: 12px;">
        @if ($item->berkas1 && file_exists(public_path($item->berkas1)))
          <iframe src="{{ asset($item->berkas1) }}"
                  style="width: 100%; height: 100%; border: none;"
                  loading="lazy"></iframe>
        @elseif ($item->berkas1)
          <iframe src="{{ asset($item->berkas1) }}"
                  style="width: 100%; height: 100%; border: none;"
                  loading="lazy"></iframe>
        @else
          <div style="
              width: 100%;
              height: 100%;
              display: flex;
              justify-content: center;
              align-items: center;
              font-weight: 500;
              font-family: 'Poppins', sans-serif;
              color: #6c757d;
              background-color: #f8f9fa;
              border: 1px dashed #ced4da;
              border-radius: 8px;
          ">
              <i class="bi bi-file-earmark-pdf" style="margin-right: 6px; font-size: 18px; color: #dc3545;"></i>
              Tidak ada berkas PDF
          </div>
        @endif
      </div>

      <div class="news-content">
        <div class="news-meta">
          <span class="news-date">{{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('d M Y') }}</span>
        </div>
        <h3 class="news-headline">{{ $item->judul }}</h3>
      </div>
    </div>
  @empty
    <div style="
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 30px;
        font-weight: 600;
        font-family: 'Poppins', sans-serif;
        color: #6c757d;
        background-color: #f8f9fa;
        border: 2px dashed #ced4da;
        border-radius: 12px;
        font-size: 16px;
        animation: fadeIn 0.5s ease-in-out;
    ">
        <i class="bi bi-folder-x" style="margin-right: 8px; font-size: 20px; color: #dc3545;"></i>
        Belum Ada Artikel di Terbitkan !
    </div>
  @endforelse
</div>

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>

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
