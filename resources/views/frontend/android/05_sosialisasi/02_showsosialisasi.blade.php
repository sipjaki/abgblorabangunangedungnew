@include('frontend.android.00_fiturmenu.01_header')

<body class="font-poppins text-[#070625]">
  <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[120px] relative">
    <div class="w-full h-[184px] absolute top-0 bg-cover bg-center" style="background-image: url('/assets/android/iconmenu/belakangnew.jpg');">
    </div>
     <div class="relative z-10 flex flex-col gap-6 mt-[60px]">
      <div class="top-menu flex justify-between items-center px-[18px]">
          <div class="w-[42px] h-[42px] flex shrink-0">
            <img src="/assets/abgblora/logo/logokabupatenblora.png" alt="icon">
          </div>
        {{-- <p class="font-semibold leading-[28px] text-white text-center" style="font-size: 18px;">Dinas Pekerjaan Umum Dan Penataan Ruang <br> Kabupaten Blora Provinsi Jawa Tengah </span></p> --}}

        <p class="font-semibold leading-[28px] text-black text-center" style="font-size: 17px;">Dinas Pekerjaan Umum <br> Dan Penataan Ruang <br> Kabupaten Blora </span></p>

        <div class="w-[42px] h-[42px] flex shrink-0">
            <img src="/assets/abgblora/logo/pupr.png" alt="icon">
          </div>
      </div>

<div class="flex flex-col z-30">

      <div class="w-full bg-white rounded-t-[40px] flex flex-col gap-5 px-6 py-10">
  <div class="max-w-5xl mx-auto">
    <!-- Tombol Daftar Pelatihan -->
    <div class="mb-6 flex justify-end">
      <a href="/resdaftarpelatihanpeserta/create/{{$data->id}}">
        <button
          class="btn-navy px-4 py-2 text-white font-semibold rounded-md border border-transparent transition"
          onmouseover="this.style.backgroundColor='white'; this.style.color='black'; this.querySelector('i').style.color='black'; this.style.border='1px solid navy';"
          onmouseout="this.style.backgroundColor='navy'; this.style.color='white'; this.querySelector('i').style.color='white'; this.style.border='none';">
          <i class="bi bi-person-fill mr-2" style="color: white;"></i>
          Daftar Pelatihan
        </button>
      </a>
    </div>

    <!-- Header -->
    <div class="text-center mb-8">
      <h3 class="text-xl font-bold">AGENDA SOSIALISASI BANGUNAN GEDUNG</h3>
      <h4 class="text-lg font-medium">DPUPR KABUPATEN BLORA <br> PROVINSI JAWA TENGAH</h4>
    </div>

    <!-- Gambar -->
    <div class="flex justify-center mb-8">
      <div class="rounded-xl overflow-hidden shadow-lg max-w-lg">
        @if($data->foto && file_exists(public_path('storage/' . $data->foto)))
          <img src="{{ asset('storage/' . $data->foto) }}" alt="Gambar Peraturan" class="w-full object-contain max-h-[400px]">
        @elseif($data->foto)
          <img src="{{ asset($data->foto) }}" alt="Gambar Peraturan" class="w-full object-contain max-h-[400px]">
        @else
          <p class="text-center p-4">Data belum diupdate</p>
        @endif
      </div>
    </div>

    <!-- Informasi Agenda Pelatihan -->
    <h4 class="font-bold mb-2">I. INFORMASI AGENDA PELATIHAN</h4>
    <table class="w-full table-auto border-collapse mb-6">
      <tbody>
        <tr><td class="pr-2">1</td><td class="font-semibold">Nama Kegiatan</td><td>:</td><td>{{ $data->namakegiatan }}</td></tr>
        <tr><td>2</td><td class="font-semibold">Kategori</td><td>:</td><td>{{ $data->kategoripelatihan->kategoripelatihan }}</td></tr>
        <tr><td>3</td><td class="font-semibold">Waktu Pelaksanaan</td><td>:</td><td>{{ \Carbon\Carbon::parse($data->waktupelaksanaan)->translatedFormat('d F Y') }}</td></tr>
        <tr><td>4</td><td class="font-semibold">Penyelenggara</td><td>:</td><td>{{ $data->asosiasimasjaki->namaasosiasi ?? '-' }}</td></tr>
        <tr><td>5</td><td class="font-semibold">Lokasi</td><td>:</td><td>{{ $data->lokasi }}</td></tr>
        <tr><td>6</td><td class="font-semibold">Jumlah Peserta</td><td>:</td><td>{{ $data->jumlahpeserta }}</td></tr>
        <tr><td>7</td><td class="font-semibold">Undangan & Peserta</td><td>:</td>
          <td>
            @if($data->suratundangan && file_exists(public_path('storage/' . $data->suratundangan)))
              <iframe src="{{ asset('storage/' . $data->suratundangan) }}" class="w-full h-64"></iframe>
              <a href="{{ asset('storage/' . $data->suratundangan) }}" download class="inline-block mt-2 bg-yellow-500 hover:bg-white hover:text-black text-white font-bold py-2 px-4 rounded">
                ⬇️ Download File
              </a>
            @elseif($data->suratundangan)
              <iframe src="{{ asset($data->suratundangan) }}" class="w-full h-64"></iframe>
              <a href="{{ asset($data->suratundangan) }}" download class="inline-block mt-2 bg-yellow-500 hover:bg-white hover:text-black text-white font-bold py-2 px-4 rounded">
                ⬇️ Download File
              </a>
            @else
              <p class="text-sm text-gray-500">Data belum diupdate</p>
            @endif
          </td>
        </tr>
      </tbody>
    </table>

    <!-- Isi Agenda -->
    <div class="mb-6">
      <h4 class="font-semibold mb-1 text-base"><i class="bi bi-journal-text mr-2"></i> Isi Agenda:</h4>
      <p class="text-justify leading-relaxed">{!! $data->isiagenda !!}</p>
    </div>

    <!-- Keterangan -->
    <div class="mb-6">
      <h4 class="font-semibold mb-1 text-base"><i class="bi bi-info-circle mr-2"></i> Keterangan:</h4>
      <p class="text-justify leading-relaxed">{!! $data->keterangan !!}</p>
    </div>

    <!-- Materi Pelatihan -->
    <h4 class="font-bold mb-2">II. DOWNLOAD MATERI PELATIHAN</h4>
    <div class="border border-gray-200 rounded-lg p-4 bg-gray-50">
      <table class="w-full text-sm text-left">
        <thead>
          <tr class="bg-gray-100">
            <th class="p-2">No</th>
            <th class="p-2">Judul</th>
            <th class="p-2">Materi</th>
          </tr>
        </thead>
        <tbody>
          @php $start = ($datamateripelatihan->currentPage() - 1) * $datamateripelatihan->perPage() + 1; $dataAvailable = false; @endphp
          @foreach ($datamateripelatihan as $item)
            <tr class="border-t">
              <td class="p-2 text-center">{{ $loop->iteration + $start - 1 }}</td>
              <td class="p-2">{{ ucwords(strtolower($item->judulmateripelatihan)) }}</td>
              <td class="p-2">
                @if($item->materipelatihan && file_exists(public_path('storage/' . $item->materipelatihan)))
                  <iframe src="{{ asset('storage/' . $item->materipelatihan) }}" class="w-full h-32"></iframe>
                  <a href="{{ asset('storage/' . $item->materipelatihan) }}" download class="mt-2 inline-block bg-navy text-white px-4 py-2 rounded">
                    <i class="fas fa-download mr-2"></i> Download .pdf
                  </a>
                @elseif($item->materipelatihan)
                  <iframe src="{{ asset($item->materipelatihan) }}" class="w-full h-32"></iframe>
                  <a href="{{ asset($item->materipelatihan) }}" download class="mt-2 inline-block bg-navy text-white px-4 py-2 rounded">
                    <i class="fas fa-download mr-2"></i> Download .pdf
                  </a>
                @else
                  <button class="bg-red-500 text-white px-4 py-2 rounded">Materi Belum Di Upload</button>
                @endif
              </td>
            </tr>
            @php $dataAvailable = true; @endphp
          @endforeach
        </tbody>
      </table>
      @if(!$dataAvailable)
        <p class="text-center mt-4 text-gray-500">Materi belum diupload.</p>
      @endif
    </div>
  </div>
</div>
        </div>

      <br><br>

      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
