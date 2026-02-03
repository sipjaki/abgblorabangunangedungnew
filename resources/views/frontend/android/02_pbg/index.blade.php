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
        <div class="flex p-4 items-center gap-4 bg-white rounded-xl shadow-sm border border-gray-100 hover:shadow-md transition-shadow duration-300">
    <button type="button"
            class="contact-name accordion-button flex items-center gap-2 w-full group"
            data-accordion="accordion-1">

        <!-- Icon kiri dengan efek hover -->
        <div class="flex items-center">
            <div class="w-12 h-12 flex shrink-0 rounded-full overflow-hidden bg-gradient-to-br from-blue-50 to-blue-100 border border-blue-100 group-hover:from-blue-100 group-hover:to-blue-200 transition-all duration-300">
                <img src="/assets/android/menunavigasi/NEW01.png"
                     class="object-cover w-full h-full p-1.5"
                     alt="Icon Berkas">
            </div>
        </div>

        <!-- Judul & info berkas -->
        <div class="flex flex-col flex-1 gap-[2px] text-left">
            <p class="font-semibold text-gray-800 text-base group-hover:text-blue-700 transition-colors duration-300">Konsultan Sertifikat Laik Fungsi</p>
            <div class="flex items-center gap-2 text-sm text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <span>PDF Document</span>
                <span class="text-gray-400">•</span>
                <span>2.4 MB</span>
            </div>
        </div>

        <!-- Tombol download di kanan dengan path yang benar -->
        <div class="flex-shrink-0">
            <button type="button"
                    onclick="window.open('assets/abgblora/00_dokumen/02_pbgslf/KONSULTAN_SERTIFIKAT_LAIK_FUNGSI_(SLF)_.pdf','_blank')"
                    class="bg-gradient-to-r from-blue-500 to-blue-600 text-white px-4 py-2.5 rounded-lg hover:from-blue-600 hover:to-blue-700 flex items-center gap-2 shadow-sm hover:shadow transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-blue-300 focus:ring-opacity-50 active:scale-95">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15V3m0 0L8 7m4-4l4 4m5 4a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span class="font-medium text-sm">Download</span>
            </button>
        </div>

    </button>
</div>

<!-- Tambahan: Jika ingin ada efek loading saat download -->
<div id="download-toast" class="hidden fixed bottom-4 right-4 bg-blue-600 text-white px-4 py-3 rounded-lg shadow-lg flex items-center gap-2">
    <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
    </svg>
    <span>Mengunduh berkas...</span>
</div>

<script>
// Optional: Tambahan efek untuk download
document.addEventListener('DOMContentLoaded', function() {
    const downloadBtn = document.querySelector('button[onclick*="KONSULTAN_SERTIFIKAT_LAIK_FUNGSI"]');
    const toast = document.getElementById('download-toast');

    if (downloadBtn) {
        // Ganti event onclick dengan fungsi yang lebih terkontrol
        const originalOnClick = downloadBtn.getAttribute('onclick');
        downloadBtn.removeAttribute('onclick');

        downloadBtn.addEventListener('click', function() {
            // Tampilkan toast loading
            if (toast) {
                toast.classList.remove('hidden');

                // Simulasi loading
                setTimeout(() => {
                    // Eksekusi download asli
                    eval(originalOnClick);

                    // Sembunyikan toast setelah 2 detik
                    setTimeout(() => {
                        toast.classList.add('hidden');
                    }, 2000);
                }, 500);
            } else {
                // Jika toast tidak ada, langsung download
                eval(originalOnClick);
            }
        });
    }
});
</script>

<style>
/* Animasi untuk icon download */
@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-2px); }
}

.group:hover button svg {
    animation: bounce 0.5s ease-in-out;
}

/* Efek untuk seluruh card */
.contact-name {
    transition: all 0.3s ease;
}

.contact-name:hover {
    transform: translateX(2px);
}

/* Efek untuk tombol aktif */
button:active {
    transform: scale(0.98);
}

/* Style untuk accordion jika diperlukan */
.accordion-button[aria-expanded="true"] .font-semibold {
    color: #1d4ed8;
}

.accordion-button[aria-expanded="true"] .flex.items-center {
    background: linear-gradient(to bottom right, #eff6ff, #dbeafe);
}
</style>

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
