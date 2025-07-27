@include('frontend.android.00_fiturmenu.01_header')

<body class="font-poppins text-[#070625]">
  <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[120px] relative">
    <div class="w-full h-[184px] absolute top-0 bg-cover bg-center" style="background-image: url('/assets/android/iconmenu/belakangnew.jpg');" loading="lazy">
    </div>
     <div class="relative z-10 flex flex-col gap-6 mt-[60px]">
      <div class="top-menu flex justify-between items-center px-[18px]">
          <div class="w-[42px] h-[42px] flex shrink-0">
            <img src="/assets/abgblora/logo/logokabupatenblora.png" alt="icon">
          </div>
        <p class="font-semibold leading-[28px] text-white text-center" style="font-size: 18px;">Dinas Pekerjaan Umum Dan Penataan Ruang <br> Kabupaten Blora Provinsi Jawa Tengah </span></p>
        <div class="w-[42px] h-[42px] flex shrink-0">
            <img src="/assets/abgblora/logo/pupr.png" alt="icon">
          </div>
      </div>
      <form action="success.html" id="Details" class="group result-card-container flex flex-col gap-6">
        <div id="Contact-details" class="bg-white rounded-xl overflow-hidden flex flex-col mx-[18px]">
          <div class="flex p-4 items-center gap-4">
            <button type="button" class="contact-name accordion-button flex items-center gap-2 w-full" data-accordion="accordion-1">
              <div class="flex items-center">
                <div class="w-12 h-12 flex shrink-0 rounded-full overflow-hidden">
                  <img src="/assets/android/menunavigasi/08.png" class="object-cover w-full h-full" alt="photo">
                </div>
              </div>
              <div class="flex flex-col flex-1 gap-[2px] text-left">
                <p class="font-semibold">{{$title}}</p>
                {{-- <p class="font-medium text-xs leading-[18px] text-[#757C98]">Contact Details</p> --}}
              </div>
            </button>
          </div>

        </div>

<div class="flex flex-col space-y-3 px-[18px]">
<a href="#" class="bg-white rounded-xl flex flex-col p-4 hover:shadow-md transition">
  <div class="flex items-center gap-3 p-4 rounded-lg border border-[#DCDFE6]">
    <div class="flex flex-col gap-[2px]">
      <p class="font-semibold text-[16px] leading-[24px] text-[#4041DA]">
        Keterangan Informasi MBR Bantuan Gambar
      </p>
      <p class="text-[16px] text-gray-700" style="text-align: justify;">
        Program MBR merupakan program bantuan dari Kementerian PUPR yang bertujuan untuk menyediakan perencanaan teknis berupa gambar bangunan kepada masyarakat berpenghasilan rendah, guna mendukung pembangunan rumah yang layak huni dan sesuai standar konstruksi.
      </p>
    </div>
  </div>
</a>


    @foreach ($data as $item)

    {{-- Berkas 1 --}}
    @php
    $ext1 = strtolower(pathinfo($item->berkas1 ?? '', PATHINFO_EXTENSION));
    $path1 = $item->berkas1 && file_exists(public_path('storage/' . $item->berkas1))
    ? asset('storage/' . $item->berkas1)
    : ($item->berkas1 ? asset($item->berkas1) : null);
    @endphp

  <a href="{{ $path1 ?? '#' }}" target="_blank" class="bg-white rounded-xl flex flex-col p-4 hover:shadow-md transition">
      <div class="flex items-center gap-3 p-4 rounded-lg border border-[#DCDFE6]">
          <div class="w-[60px] h-[60px] flex shrink-0 rounded-lg overflow-hidden">
              @if ($path1)
              @if (in_array($ext1, ['jpg', 'jpeg', 'png', 'webp']))
              <img src="{{ $path1 }}" class="object-cover w-full h-full" alt="Berkas 1">
              @else
              <i class="bi bi-file-earmark-pdf text-danger text-3xl m-auto"></i>
              @endif
              @else
              <div class="bg-light text-center text-sm text-gray-500 w-full h-full flex items-center justify-center">Tidak Ada</div>
              @endif
            </div>
            <div class="flex flex-col gap-[2px]">
                <p  class="font-semibold text-sm leading-[21px] text-[#4041DA]">Informasi MBR Bantuan Gambar</p>
                <p class="font-semibold">File: Klik Untuk Melihat File Informasi</p>
            </div>
        </div>
    </a>

    {{-- Berkas 2 --}}
    @php
    $ext2 = strtolower(pathinfo($item->berkas2 ?? '', PATHINFO_EXTENSION));
    $path2 = $item->berkas2 && file_exists(public_path('storage/' . $item->berkas2))
    ? asset('storage/' . $item->berkas2)
    : ($item->berkas2 ? asset($item->berkas2) : null);
    @endphp
  <a href="{{ $path2 ?? '#' }}" target="_blank" class="bg-white rounded-xl flex flex-col p-4 hover:shadow-md transition">
      <div class="flex items-center gap-3 p-4 rounded-lg border border-[#DCDFE6]">
          <div class="w-[60px] h-[60px] flex shrink-0 rounded-lg overflow-hidden">
              @if ($path2)
              @if (in_array($ext2, ['jpg', 'jpeg', 'png', 'webp']))
              <img src="{{ $path2 }}" class="object-cover w-full h-full" alt="Berkas 2">
              @else
              <i class="bi bi-file-earmark-pdf text-danger text-3xl m-auto"></i>
              @endif
              @else
              <div class="bg-light text-center text-sm text-gray-500 w-full h-full flex items-center justify-center">Tidak Ada</div>
              @endif
            </div>
            <div class="flex flex-col gap-[2px]">
                <p class="font-semibold text-sm leading-[21px] text-[#4041DA]">Informasi MBR Bantuan Gambar</p>
                <p class="font-semibold">File: Klik Untuk Melihat File Informasi</p>
            </div>
        </div>
    </a>

    {{-- Berkas 3 --}}
    @php
    $ext3 = strtolower(pathinfo($item->berkas3 ?? '', PATHINFO_EXTENSION));
    $path3 = $item->berkas3 && file_exists(public_path('storage/' . $item->berkas3))
    ? asset('storage/' . $item->berkas3)
    : ($item->berkas3 ? asset($item->berkas3) : null);
    @endphp
  <a href="{{ $path3 ?? '#' }}" target="_blank" class="bg-white rounded-xl flex flex-col p-4 hover:shadow-md transition">
    <div class="flex items-center gap-3 p-4 rounded-lg border border-[#DCDFE6]">
        <div class="w-[60px] h-[60px] flex shrink-0 rounded-lg overflow-hidden">
            @if ($path3)
            @if (in_array($ext3, ['jpg', 'jpeg', 'png', 'webp']))
            <img src="{{ $path3 }}" class="object-cover w-full h-full" alt="Berkas 3">
            @else
            <i class="bi bi-file-earmark-pdf text-danger text-3xl m-auto"></i>
            @endif
            @else
            <div class="bg-light text-center text-sm text-gray-500 w-full h-full flex items-center justify-center">Tidak Ada</div>
            @endif
        </div>
      <div class="flex flex-col gap-[2px]">
        <p class="font-semibold text-sm leading-[21px] text-[#4041DA]">Informasi MBR Bantuan Gambar</p>
        <p class="font-semibold">File: Klik Untuk Melihat File Informasi</p>
    </div>
</div>
</a>

  {{-- Berkas 4 --}}
  @php
    $ext4 = strtolower(pathinfo($item->berkas4 ?? '', PATHINFO_EXTENSION));
    $path4 = $item->berkas4 && file_exists(public_path('storage/' . $item->berkas4))
    ? asset('storage/' . $item->berkas4)
    : ($item->berkas4 ? asset($item->berkas4) : null);
    @endphp
  <a href="{{ $path4 ?? '#' }}" target="_blank" class="bg-white rounded-xl flex flex-col p-4 hover:shadow-md transition">
      <div class="flex items-center gap-3 p-4 rounded-lg border border-[#DCDFE6]">
          <div class="w-[60px] h-[60px] flex shrink-0 rounded-lg overflow-hidden">
              @if ($path4)
          @if (in_array($ext4, ['jpg', 'jpeg', 'png', 'webp']))
          <img src="{{ $path4 }}" class="object-cover w-full h-full" alt="Berkas 4">
          @else
          <i class="bi bi-file-earmark-pdf text-danger text-3xl m-auto"></i>
          @endif
          @else
          <div class="bg-light text-center text-sm text-gray-500 w-full h-full flex items-center justify-center">Tidak Ada</div>
          @endif
        </div>
        <div class="flex flex-col gap-[2px]">
            <p class="font-semibold text-sm leading-[21px] text-[#4041DA]">Informasi MBR Bantuan Gambar</p>
        <p class="font-semibold">File: Klik Untuk Melihat File Informasi</p>
      </div>
    </div>
  </a>

  @endforeach
</div>

<div class="w-full px-4 py-6">
    <div class="bg-white rounded-xl shadow-md overflow-hidden">
        <!-- Header -->
        <div class="bg-[#4041DA] text-white text-lg font-semibold px-6 py-4">
            Tabel Data Pengkajian Teknis - MBR Bantuan Gambar
        </div>

        <!-- Scrollable Table Container -->
        <div class="overflow-x-auto p-2">
            <div class="min-w-full inline-block align-middle">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-[#F3F4F6]">
                        <tr>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">No</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Nama Badan Usaha</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Alamat</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Telepon</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Email</th>
                            <th scope="col" class="px-4 py-3 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Direktur</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($datapengkajiteknis as $index => $data)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $data->namabadanusaha ?? '-' }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $data->alamat ?? '-' }}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">{{ $data->telepon ?? '-' }}</td>
                            <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-900">{{ $data->email ?? '-' }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $data->direktur ?? '-' }}</td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-4 py-4 text-center text-sm text-gray-500">Data tidak tersedia.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


      </form>

      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
