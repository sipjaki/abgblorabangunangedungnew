@include('frontend.android.00_fiturmenu.01_header')

<body class="font-poppins text-[#070625]">
  <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[120px] relative">
<div class="w-full h-[190] absolute top-0 overflow-hidden">
  <img src="/assets/android/iconmenu/temabaru.png" alt="Bangunan Blora" class="w-full h-full object-cover" />
</div>

     <div class="relative z-10 flex flex-col gap-6 mt-[60px]">

<div style="
  width: 100%;
  max-width: 400px;
  margin: 0 auto;
  background-color: rgba(255, 255, 255, 0.7);
  border-radius: 20px;
  padding: 20px;
  backdrop-filter: blur(2px);
  -webkit-backdrop-filter: blur(4px);
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 10px;
">
  <!-- Logo Kiri -->
  <div style="width: 42px; height: 42px; flex-shrink: 0;">
    <img src="/assets/abgblora/logo/logokabupatenblora.png" alt="icon" style="width: 100%; height: 100%; object-fit: contain;">
  </div>

  <!-- Teks Tengah -->
  <p style="
    font-size: 15px;
    font-weight: 500;
    line-height: 22px;
    color: #000;
    text-align: center;
    margin: 0;
    flex: 1;
  ">
    Dinas Pekerjaan Umum <br>
    Dan Penataan Ruang <br>
    Kabupaten Blora
  </p>

  <!-- Logo Kanan -->
  <div style="width: 42px; height: 42px; flex-shrink: 0;">
    <img src="/assets/abgblora/logo/pupr.png" alt="icon" style="width: 100%; height: 100%; object-fit: contain;">
  </div>
</div>

      <form action="success.html" id="Details" class="group result-card-container flex flex-col gap-6">
        {{-- <div id="Contact-details" class="bg-white rounded-xl overflow-hidden flex flex-col mx-[18px]"> --}}
          {{-- <div class="flex p-4 items-center gap-4">
            <button type="button" class="contact-name accordion-button flex items-center gap-2 w-full" data-accordion="accordion-1">
              <div class="flex items-center">
                <div class="w-12 h-12 flex shrink-0 rounded-full overflow-hidden">
                  <img src="/assets/android/menunavigasi/03.png" class="object-cover w-full h-full" alt="photo">
                </div>
              </div>
              <div class="flex flex-col flex-1 gap-[2px] text-left">
                <p class="font-semibold">{{$title}}</p>
                <p class="font-medium text-xs leading-[18px] text-[#757C98]">Contact Details</p>
              </div>
            </button>
          </div> --}}

        {{-- </div> --}}

        <div id="Contact-details" class="bg-white rounded-xl overflow-hidden flex flex-col mx-[18px]">
        <div class="flex items-center gap-4 p-4 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition duration-300">

    <!-- Icon kiri -->
    <div class="w-12 h-12 flex-shrink-0 rounded-full overflow-hidden bg-blue-50 flex items-center justify-center">
        <img src="/assets/android/menunavigasi/NEW01.png"
             alt="Icon Berkas"
             class="object-cover w-10 h-10">
    </div>

    <!-- Judul & info -->
    <div class="flex flex-col flex-1 gap-1">
        <p class="font-semibold text-gray-800 text-base">Konsultan Sertifikat Laik Fungsi</p>
    </div>

    <!-- Tombol download -->
    <div class="flex-shrink-0">
        <a href="/assets/abgblora/00_dokumen/02_pbgslf/KONSULTAN_SERTIFIKAT_LAIK_FUNGSI_(SLF)_.pdf"
           download
           class="button-baru"
           >
            <i class="bi bi-download"></i>
            <span class="font-medium text-sm">Download</span>
        </a>
    </div>

</div>


        </div>

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
