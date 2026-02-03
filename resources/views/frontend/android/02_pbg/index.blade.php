@include('frontend.android.00_fiturmenu.01_header')

<body class="font-poppins text-[#070625]">
  <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[120px] relative">
<div class="w-full h-[190] absolute top-0 overflow-hidden">
  <img src="/assets/android/iconmenu/temabaru.png" alt="Bangunan Blora" class="w-full h-full object-cover" />
</div>

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
          <br> Penataan Ruang <br> Kabupaten Blora
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

      <form action="success.html" id="Details" class="group result-card-container flex flex-col gap-6">

        <div class="bg-white rounded-xl flex items-center p-4 hover:shadow-md transition border border-[#DCDFE6]">

    <!-- Icon kiri -->
    <div class="w-[60px] h-[60px] flex-shrink-0 mr-4">
        <img src="/assets/android/menunavigasi/NEW01.png"
             alt="Icon Berkas"
             class="w-full h-full object-cover rounded-lg">
    </div>

    <!-- Judul & tombol download -->
    <div class="flex flex-col justify-center gap-2">
        <p class="font-semibold text-sm text-[#4041DA] leading-[21px]">
            Konsultan Sertifikat Laik Fungsi
        </p>
        <button type="button"
                class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 flex items-center gap-2"
                onclick="window.open('/assets/abgblora/00_dokumen/02_pbgslf/KONSULTAN_SERTIFIKAT_LAIK_FUNGSI_(SLF)_.pdf','_blank')">
            <i class="bi bi-download"></i> Download Berkas
        </button>
    </div>

</div>

        <div id="Contact-details" class="bg-white rounded-xl overflow-hidden flex flex-col mx-[18px]">


        <div class="flex flex-col space-y-3 px-[18px]">
            <!-- Card 1 -->
            <a href="/feinfocampuran" class="bg-white rounded-xl flex flex-col p-4 hover:shadow-md transition">
              <div class="flex items-center gap-3 p-4 rounded-lg border border-[#DCDFE6]">
                <div class="w-[60px] h-[60px] flex shrink-0 rounded-lg overflow-hidden">
                    @foreach ($data1 as $item)

                    <div style="margin-top: 10px;">
                        @if($item->berkas && file_exists(public_path('storage/' . $item->berkas)))
                            <!-- Jika file ada di storage -->
                            <img src="{{ asset('storage/' . $item->berkas) }}" alt="Berkas Gambar" class="img-fluid rounded" style="max-height:300px;">
                        @elseif($item->berkas)
                            <!-- Jika file sudah dipindah / updated -->
                            <img src="{{ asset($item->berkas) }}" alt="Berkas Gambar" class="img-fluid rounded" style="max-height:300px;">
                        @else
                            <!-- Jika tidak ada file, tampilkan tombol -->
                            <button type="button" class="btn btn-secondary" disabled>
                                <i class="bi bi-file-earmark-image"></i> Berkas
                            </button>
                        @endif
                    </div>

                    @endforeach
                </div>
                <div class="flex flex-col gap-[2px]">
                  <p class="font-semibold text-sm leading-[21px] text-[#4041DA]">Informasi (PBG) Persetujuan Bangunan Gedung</p>
                  <p class="font-semibold">PBG Fungsi Campuran</p>
                </div>
              </div>
            </a>

            <a href="/feinfohunian" class="bg-white rounded-xl flex flex-col p-4 hover:shadow-md transition">
              <div class="flex items-center gap-3 p-4 rounded-lg border border-[#DCDFE6]">
                <div class="w-[60px] h-[60px] flex shrink-0 rounded-lg overflow-hidden">

                    @foreach ($data2 as $item)

                    <div style="margin-top: 10px;">
                        @if($item->berkas && file_exists(public_path('storage/' . $item->berkas)))
                            <!-- Jika file ada di storage -->
                            <img src="{{ asset('storage/' . $item->berkas) }}" alt="Berkas Gambar" class="img-fluid rounded" style="max-height:300px;">
                        @elseif($item->berkas)
                            <!-- Jika file sudah dipindah / updated -->
                            <img src="{{ asset($item->berkas) }}" alt="Berkas Gambar" class="img-fluid rounded" style="max-height:300px;">
                        @else
                            <!-- Jika tidak ada file, tampilkan tombol -->
                            <button type="button" class="btn btn-secondary" disabled>
                                <i class="bi bi-file-earmark-image"></i> Berkas
                            </button>
                        @endif
                    </div>

                    @endforeach
                </div>
                <div class="flex flex-col gap-[2px]">
                  <p class="font-semibold text-sm leading-[21px] text-[#4041DA]">Informasi (PBG) Persetujuan Bangunan Gedung</p>
                  <p class="font-semibold">PBG Fungsi Hunian</p>
                </div>
              </div>
            </a>

            <a href="/feinfoagama" class="bg-white rounded-xl flex flex-col p-4 hover:shadow-md transition">
              <div class="flex items-center gap-3 p-4 rounded-lg border border-[#DCDFE6]">
                <div class="w-[60px] h-[60px] flex shrink-0 rounded-lg overflow-hidden">
    @foreach ($data3 as $item)

                    <div style="margin-top: 10px;">
                        @if($item->berkas && file_exists(public_path('storage/' . $item->berkas)))
                            <!-- Jika file ada di storage -->
                            <img src="{{ asset('storage/' . $item->berkas) }}" alt="Berkas Gambar" class="img-fluid rounded" style="max-height:300px;">
                        @elseif($item->berkas)
                            <!-- Jika file sudah dipindah / updated -->
                            <img src="{{ asset($item->berkas) }}" alt="Berkas Gambar" class="img-fluid rounded" style="max-height:300px;">
                        @else
                            <!-- Jika tidak ada file, tampilkan tombol -->
                            <button type="button" class="btn btn-secondary" disabled>
                                <i class="bi bi-file-earmark-image"></i> Berkas
                            </button>
                        @endif
                    </div>

                    @endforeach
                </div>
                <div class="flex flex-col gap-[2px]">
                  <p class="font-semibold text-sm leading-[21px] text-[#4041DA]">Informasi (PBG) Persetujuan Bangunan Gedung</p>
                  <p class="font-semibold">PBG Fungsi Keagamaan</p>
                </div>
              </div>
            </a>

            <a href="/feinfoprasarana" class="bg-white rounded-xl flex flex-col p-4 hover:shadow-md transition">
              <div class="flex items-center gap-3 p-4 rounded-lg border border-[#DCDFE6]">
                <div class="w-[60px] h-[60px] flex shrink-0 rounded-lg overflow-hidden">
    @foreach ($data4 as $item)

                    <div style="margin-top: 10px;">
                        @if($item->berkas && file_exists(public_path('storage/' . $item->berkas)))
                            <!-- Jika file ada di storage -->
                            <img src="{{ asset('storage/' . $item->berkas) }}" alt="Berkas Gambar" class="img-fluid rounded" style="max-height:300px;">
                        @elseif($item->berkas)
                            <!-- Jika file sudah dipindah / updated -->
                            <img src="{{ asset($item->berkas) }}" alt="Berkas Gambar" class="img-fluid rounded" style="max-height:300px;">
                        @else
                            <!-- Jika tidak ada file, tampilkan tombol -->
                            <button type="button" class="btn btn-secondary" disabled>
                                <i class="bi bi-file-earmark-image"></i> Berkas
                            </button>
                        @endif
                    </div>

                    @endforeach

                </div>
                <div class="flex flex-col gap-[2px]">
                  <p class="font-semibold text-sm leading-[21px] text-[#4041DA]">Informasi (PBG) Persetujuan Bangunan Gedung</p>
                  <p class="font-semibold">PBG Fungsi Prasarana</p>
                </div>
              </div>
            </a>

            <a href="/feinfososialbudaya" class="bg-white rounded-xl flex flex-col p-4 hover:shadow-md transition">
              <div class="flex items-center gap-3 p-4 rounded-lg border border-[#DCDFE6]">
                <div class="w-[60px] h-[60px] flex shrink-0 rounded-lg overflow-hidden">
    @foreach ($data5 as $item)

                    <div style="margin-top: 10px;">
                        @if($item->berkas && file_exists(public_path('storage/' . $item->berkas)))
                            <!-- Jika file ada di storage -->
                            <img src="{{ asset('storage/' . $item->berkas) }}" alt="Berkas Gambar" class="img-fluid rounded" style="max-height:300px;">
                        @elseif($item->berkas)
                            <!-- Jika file sudah dipindah / updated -->
                            <img src="{{ asset($item->berkas) }}" alt="Berkas Gambar" class="img-fluid rounded" style="max-height:300px;">
                        @else
                            <!-- Jika tidak ada file, tampilkan tombol -->
                            <button type="button" class="btn btn-secondary" disabled>
                                <i class="bi bi-file-earmark-image"></i> Berkas
                            </button>
                        @endif
                    </div>

                    @endforeach

                </div>
                <div class="flex flex-col gap-[2px]">
                  <p class="font-semibold text-sm leading-[21px] text-[#4041DA]">Informasi (PBG) Persetujuan Bangunan Gedung</p>
                  <p class="font-semibold">PBG Fungsi Sosial Budaya</p>
                </div>
              </div>
            </a>

            <a href="/feinfofungsiusaha" class="bg-white rounded-xl flex flex-col p-4 hover:shadow-md transition">
              <div class="flex items-center gap-3 p-4 rounded-lg border border-[#DCDFE6]">
                <div class="w-[60px] h-[60px] flex shrink-0 rounded-lg overflow-hidden">
    @foreach ($data6 as $item)

                    <div style="margin-top: 10px;">
                        @if($item->berkas && file_exists(public_path('storage/' . $item->berkas)))
                            <!-- Jika file ada di storage -->
                            <img src="{{ asset('storage/' . $item->berkas) }}" alt="Berkas Gambar" class="img-fluid rounded" style="max-height:300px;">
                        @elseif($item->berkas)
                            <!-- Jika file sudah dipindah / updated -->
                            <img src="{{ asset($item->berkas) }}" alt="Berkas Gambar" class="img-fluid rounded" style="max-height:300px;">
                        @else
                            <!-- Jika tidak ada file, tampilkan tombol -->
                            <button type="button" class="btn btn-secondary" disabled>
                                <i class="bi bi-file-earmark-image"></i> Berkas
                            </button>
                        @endif
                    </div>

                    @endforeach
            </div>
                <div class="flex flex-col gap-[2px]">
                  <p class="font-semibold text-sm leading-[21px] text-[#4041DA]">Informasi (PBG) Persetujuan Bangunan Gedung</p>
                  <p class="font-semibold">PBG Fungsi Usaha</p>
                </div>
              </div>
            </a>

            <a href="/slffungsiusaha" class="bg-white rounded-xl flex flex-col p-4 hover:shadow-md transition">
              <div class="flex items-center gap-3 p-4 rounded-lg border border-[#DCDFE6]">
                <div class="w-[60px] h-[60px] flex shrink-0 rounded-lg overflow-hidden">
    @foreach ($data7 as $item)

                    <div style="margin-top: 10px;">
                        @if($item->berkas && file_exists(public_path('storage/' . $item->berkas)))
                            <!-- Jika file ada di storage -->
                            <img src="{{ asset('storage/' . $item->berkas) }}" alt="Berkas Gambar" class="img-fluid rounded" style="max-height:300px;">
                        @elseif($item->berkas)
                            <!-- Jika file sudah dipindah / updated -->
                            <img src="{{ asset($item->berkas) }}" alt="Berkas Gambar" class="img-fluid rounded" style="max-height:300px;">
                        @else
                            <!-- Jika tidak ada file, tampilkan tombol -->
                            <button type="button" class="btn btn-secondary" disabled>
                                <i class="bi bi-file-earmark-image"></i> Berkas
                            </button>
                        @endif
                    </div>

                    @endforeach
                </div>
                <div class="flex flex-col gap-[2px]">
                  <p class="font-semibold text-sm leading-[21px] text-[#4041DA]">Informasi (SLF) Sertifikat Laik Fungsi</p>
                  <p class="font-semibold">SLF Fungsi Usaha</p>
                </div>
              </div>
            </a>

            <a href="/slfmenara" class="bg-white rounded-xl flex flex-col p-4 hover:shadow-md transition">
              <div class="flex items-center gap-3 p-4 rounded-lg border border-[#DCDFE6]">
                <div class="w-[60px] h-[60px] flex shrink-0 rounded-lg overflow-hidden">
    @foreach ($data8 as $item)

                    <div style="margin-top: 10px;">
                        @if($item->berkas && file_exists(public_path('storage/' . $item->berkas)))
                            <!-- Jika file ada di storage -->
                            <img src="{{ asset('storage/' . $item->berkas) }}" alt="Berkas Gambar" class="img-fluid rounded" style="max-height:300px;">
                        @elseif($item->berkas)
                            <!-- Jika file sudah dipindah / updated -->
                            <img src="{{ asset($item->berkas) }}" alt="Berkas Gambar" class="img-fluid rounded" style="max-height:300px;">
                        @else
                            <!-- Jika tidak ada file, tampilkan tombol -->
                            <button type="button" class="btn btn-secondary" disabled>
                                <i class="bi bi-file-earmark-image"></i> Berkas
                            </button>
                        @endif
                    </div>

                    @endforeach
                </div>
                <div class="flex flex-col gap-[2px]">
                  <p class="font-semibold text-sm leading-[21px] text-[#4041DA]">Informasi (SLF) Sertifikat Laik Fungsi</p>
                  <p class="font-semibold">SLF Menara Telekomunikasi</p>
                </div>
              </div>
            </a>

      </form>

      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
