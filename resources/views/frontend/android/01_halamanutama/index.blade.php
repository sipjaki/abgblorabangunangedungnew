@include('frontend.android.00_fiturmenu.01_header')
@include('frontend.android.00_fiturmenu.06_alert')

@include('backend.00_administrator.00_baganterpisah.09_button')

<body class="font-poppins text-[#070625]">
  <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[122px] relative">

    <header class="relative h-[380px] bg-gradient-to-b from-[#0F172A] via-[#1E293B] to-[#334155] rounded-b-3xl overflow-hidden">

  <!-- Background dengan pola gelap -->
  <div class="absolute inset-0 opacity-10">
    <div class="absolute top-10 left-10 w-64 h-64 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
    <div class="absolute bottom-10 right-10 w-64 h-64 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
  </div>

  <!-- Konten utama -->
  <div class="relative z-10 pt-6 px-4">

    <!-- Navbar Floating -->
    <div class="mb-4">
      {{-- <nav class="bg-white/95 backdrop-blur-lg rounded-2xl p-3 shadow-xl">
        <div class="flex items-center justify-between">

          <!-- Logo Kiri -->
          <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center shadow-md">
            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center">
              <img src="/assets/abgblora/logo/pupr.png" alt="PUPR" class="w-8 h-8">
            </div>
          </div>

          <!-- Teks Tengah -->
          <div class="flex-1 mx-3 text-center">
            <p class="text-[10px] font-medium text-gray-600">Dinas Pekerjaan Umum Dan</p>
            <p class="text-xs font-bold text-gray-800">Penataan Ruang</p>
            <p class="text-[9px] text-gray-500 mt-0.5">ABG Blora Bangunan Gedung</p>
          </div>

          <!-- Logo Kanan -->
          <div class="w-12 h-12 rounded-full bg-gradient-to-br from-blue-500 to-blue-700 flex items-center justify-center shadow-md">
            <div class="w-10 h-10 rounded-full bg-white flex items-center justify-center">
              <img src="/assets/abgblora/logo/logokabupatenblora.png" alt="Blora" class="w-8 h-8">
            </div>
          </div>

        </div>
      </nav> --}}
    </div>

    <!-- Portfolio Card -->
    <div class="bg-white rounded-2xl shadow-xl p-5">

      <!-- Bagian Atas: Total Aset -->
      <div class="flex justify-between items-start mb-4">
        <div>
          <p class="text-sm text-gray-500 font-medium">ABG Blora Bangunan Gedung</p>
        </div>

        <!-- Hadiah Box -->
        <div class="bg-gradient-to-r from-blue-600 to-blue-800 text-white px-3 py-2 rounded-xl shadow-md">
          {{-- <p class="text-[10px] font-semibold uppercase tracking-wider">HADIAH</p> --}}
          {{-- <p class="text-lg font-bold">RP100JT</p> --}}
        </div>
      </div>

      <!-- Separator -->
      {{-- <div class="border-t border-gray-100 pt-4">
        <p class="text-sm text-gray-500 font-medium">Total Cash</p>
        <div class="flex justify-between items-center mt-2">
          <p class="text-xl font-bold text-gray-800">Rp9.993</p>
          <button class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2.5 rounded-xl text-sm font-semibold shadow-md hover:shadow-lg active:scale-95 transition-all duration-200">
            Deposit
          </button>
        </div>
        <p class="text-xs text-gray-400 mt-2">Buying Power: <span class="text-blue-600 font-medium">Rp1.782.630</span></p>
      </div> --}}

    </div>

  </div>

</header>

<style>
  /* Smooth transitions */
  button {
    transition: all 0.2s ease;
  }

  /* Card shadow effect */
  .shadow-xl {
    box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.05);
  }
</style>
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
