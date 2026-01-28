@include('frontend.android.00_fiturmenu.01_header')
@include('frontend.android.00_fiturmenu.06_alert')

@include('backend.00_administrator.00_baganterpisah.09_button')

<body class="font-poppins text-[#070625]">
  <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[122px] relative">
  <header class="flex justify-center h-[376px] px-[18px] relative overflow-hidden -mb-[106px] rounded-b-[20px] rounded-bl-[20px] rounded-br-[20px]">
  <img
  src="/assets/android/iconmenu/temabaru.png"
  class="absolute top-0 left-0 object-cover w-full h-[20vh] rounded-b-[20px]"
  alt="backgrounds"
  loading="lazy"
/>

      <div class="fixed top-0 w-full max-w-[640px] px-[18px] z-30" style="margin-top: -25px;">
<nav style="background-color: rgba(255, 255, 255, 0.3); backdrop-filter: blur(10px); -webkit-backdrop-filter: blur(10px);" class="p-3 sm:p-[10px_16px] h-fit w-full flex items-center justify-between rounded-full shadow-[0_8px_30px_0_#0A093212] z-10 mt-[60px]">
  <!-- Logo Kiri -->
  <a href="signup.html" class="shrink-0">
    <div class="w-12 h-12 sm:w-[54px] sm:h-[54px] flex overflow-hidden rounded-full items-center justify-center">
      <img src="/assets/abgblora/logo/pupr.png" alt="icon" class="w-[80%]" loading="lazy">
    </div>
  </a>

  <!-- Teks Tengah -->
  <div class="flex-1 mx-2 sm:mx-4 min-w-0">
    <div class="flex flex-col items-center sm:items-start text-center sm:text-left">
      {{-- <p class="font-semibold text-sm sm:text-base leading-tight text-[#4041DA] truncate w-full" style="font-size:12px;">
        ABG Blora Bangunan Gedung
      </p> --}}
      <div class="flex items-center justify-center sm:justify-start">
        <p class="font-semibold text-sm sm:text-base leading-tight whitespace-normal" style="font-size:12px; color:white;">
          Dinas Pekerjaan Umum Dan
          <br> Penataan Ruang <br> Bangunan Gedung
        </p>
      </div>
    </div>
  </div>

  <!-- Logo Kanan -->
  <a href="" class="shrink-0">
    <div class="w-12 h-12 sm:w-[54px] sm:h-[54px] flex overflow-hidden rounded-full items-center justify-center">
      <img src="/assets/abgblora/logo/logokabupatenblora.png" alt="icon" class="w-[80%]">
    </div>
  </a>
</nav>
      </div>
    </header>

    @include('frontend.android.00_fiturmenu.04_menunavigasi')
<div id="Promo" class="promo-section" style="margin-top: 40px;">
    <div class="promo-header" style="display: flex; justify-content: space-between; align-items: center; padding: 0 16px; margin-bottom: 16px;">
        <h6 class="promo-title" style="font-size: 18px; font-weight: 700; color: #222; margin: 0;">Agenda Sosialisasi</h6>
        <a href="#" class="promo-link" style="color: navy; font-size: 14px; font-weight: 600; text-decoration: none;">Lihat Semua →</a>
    </div>

    <div class="promo-carousel" style="display: flex; overflow-x: auto; padding: 0 16px 16px 16px; gap: 16px; scrollbar-width: none; -ms-overflow-style: none;">
        @forelse ($agendapelatihan as $item)
            <div class="promo-card" style="flex: 0 0 auto; width: 280px; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08); background: white;">
                <div class="card-image-container" style="position: relative; height: 160px; overflow: hidden;">
                    <img src="{{ asset($item->foto) }}" class="card-image" alt="{{ $item->namakegiatan }}"
                         style="width: 100%; height: 100%; object-fit: cover;">
                    <div class="card-overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: linear-gradient(to bottom, transparent 50%, rgba(0,0,0,0.4) 100%);"></div>
                    <div class="card-badge" style="position: absolute; top: 12px; left: 12px; background: rgba(255,255,255,0.95); color: #222; padding: 6px 12px; border-radius: 20px; font-size: 12px; font-weight: 600; box-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                        {{ \Carbon\Carbon::parse($item->waktupelaksanaan)->translatedFormat('d M Y') }}
                    </div>
                </div>
                <div class="card-content" style="padding: 16px; display: flex; flex-direction: column; gap: 12px;">
                    <!-- Nama Kegiatan -->
                    <h3 class="card-title" style="font-size: 16px; font-weight: 600; color: #222; margin: 0; line-height: 1.4; height: 45px; overflow: hidden; display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;">
                        {{ $item->namakegiatan }}
                    </h3>

                    <!-- Tombol -->
                    @if(\Carbon\Carbon::now()->lessThanOrEqualTo(\Carbon\Carbon::parse($item->penutupan)))
                        <a href="{{ route('daftaragenda', $item->id) }}" style="text-decoration: none; display: block;">
                            <button class="button-modern"
                                style="width: 100%; padding: 12px; border: none; border-radius: 10px;
                                       background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
                                       color: white; font-weight: 700; font-size: 14px;
                                       cursor: pointer; transition: all 0.3s ease;
                                       display: flex; align-items: center; justify-content: center; gap: 8px;">
                                <svg style="width: 18px; height: 18px; fill: white;" viewBox="0 0 24 24">
                                    <path d="M19 3h-4.18C14.4 1.84 13.3 1 12 1c-1.3 0-2.4.84-2.82 2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 0c.55 0 1 .45 1 1s-.45 1-1 1-1-.45-1-1 .45-1 1-1zm2 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/>
                                </svg>
                                Daftar Sekarang
                            </button>
                        </a>
                    @else
                        <button class="button-dikembalikan"
                            style="width: 100%; padding: 12px; border: none; border-radius: 10px;
                                   background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
                                   color: white; font-weight: 700; font-size: 14px;
                                   cursor: not-allowed; opacity: 0.8;
                                   display: flex; align-items: center; justify-content: center; gap: 8px;" disabled>
                            <svg style="width: 18px; height: 18px; fill: white;" viewBox="0 0 24 24">
                                <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                            </svg>
                            Pendaftaran Ditutup
                        </button>
                    @endif
                </div>
            </div>
        @empty
            <div style="width: 100%; padding: 40px 20px; text-align: center; background: #f8f9fa; border-radius: 16px; border: 2px dashed #dee2e6; margin: 0 16px;">
                <div style="font-size: 48px; color: #6c757d; margin-bottom: 16px;">
                    <svg style="width: 48px; height: 48px; fill: #6c757d;" viewBox="0 0 24 24">
                        <path d="M20 6h-8l-2-2H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm0 12H4V8h16v10z"/>
                    </svg>
                </div>
                <p style="color: #6c757d; font-size: 16px; font-weight: 600; margin: 0;">Belum Ada Agenda Sosialisasi</p>
                <p style="color: #adb5bd; font-size: 14px; margin-top: 8px;">Agenda akan muncul di sini</p>
            </div>
        @endforelse
    </div>

    <style>
        /* Hide scrollbar for Chrome, Safari and Opera */
        .promo-carousel::-webkit-scrollbar {
            display: none;
        }

        /* Smooth scrolling */
        .promo-carousel {
            scroll-behavior: smooth;
        }

        /* Card hover effect */
        .promo-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .promo-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
        }

        /* Button hover effect */
        .button-modern:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 12px rgba(30, 60, 114, 0.25);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .promo-card {
            animation: fadeIn 0.5s ease-out;
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
