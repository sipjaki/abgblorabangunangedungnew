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

            <div id="content" class="w-full bg-white rounded-t-[40px] flex flex-col gap-5 p-[30px_24px_60px]">

                <div class="container-surat">
                    <div>
                        <a href="/resdaftarpelatihanpeserta/create/{{$data->id}}">
                            <button
                            class="btn-navy"
                            onmouseover="this.style.backgroundColor='white'; this.style.color='black'; this.querySelector('i').style.color='black'; this.style.border='1px solid navy';"
                            onmouseout="this.style.backgroundColor='navy'; this.style.color='white'; this.querySelector('i').style.color='white'; this.style.border='none';"
                            onclick="window.location.href='your-link-here.html'"
                            >
                            <i class="bi bi-person-fill" style="color: white;"></i>
                            Daftar Pelatihan
                        </button>
                    </a>
                    </div>
                    <div class="header-surat">
                        <div class="header-text">
                            <h3>AGENDA PEMBINAAN JASA KONSTRUKSI</h3>
                            <h4>DPUPR KABUPATEN BLORA <br> PROVINSI JAWA TENGAH</h4>
                            {{-- <p>----------------------------</p> --}}
                        </div>
                    </div>

             <!-- Container agar elemen di tengah secara horizontal tanpa jarak atas-bawah -->
             <div class="flex justify-center">
                <div class="rounded-lg shadow-lg overflow-hidden w-fit">
                    <div style="margin-top: 10px;">
                        @if($data->foto && file_exists(public_path('storage/' . $data->foto)))
                            <img src="{{ asset('storage/' . $data->foto) }}" alt="Gambar Peraturan"
                                 style="width: 100%; max-height: 500px; object-fit: contain; border-radius: 20px;" loading="lazy">
                        @elseif($data->foto)
                            <img src="{{ asset($data->foto) }}" alt="Gambar Peraturan"
                                 style="width: 100%; max-height: 500px; object-fit: contain; border-radius: 20px;" loading="lazy">
                        @else
                            <p>Data belum diupdate</p>
                        @endif
                    </div>
                </div>
            </div>

                    <br>
                    <h4 style="font-weight:bold;">I. INFORMASI AGENDA PELATIHAN </h4>
                    <table class="table-identitas">
                        {{-- @foreach ($data as $item) --}}
                        <tr>
                            <td class="label">1</td>
                            <td class="label">Nama Kegiatan</td>
                            <td class="colon">:</td>
                            <td>{{$data->namakegiatan}}</td>
                        </tr>
                        <tr>
                            <td class="label">2</td>
                            <td class="label">Kategori</td>
                            <td class="colon">:</td>
                            <td>{{$data->kategoripelatihan->kategoripelatihan}}</td>
                        </tr>
                        <tr>
                            <td class="label">3</td>
                            <td class="label">Waktu Pelaksanaan</td>
                            <td class="colon">:</td>
                            <td>{{ \Carbon\Carbon::parse($data->waktupelaksanaan)->translatedFormat('d F Y') }}</td>
                        </tr>
                        <tr>
                            <td class="label">4</td>
                            <td class="label">Penyelenggara</td>
                            <td class="colon">:</td>
                            <td>{{$data->asosiasimasjaki->namaasosiasi ?? '-'}}</td>
                        </tr>
                        <tr>
                            <td class="label">5</td>
                            <td class="label">Lokasi</td>
                            <td class="colon">:</td>
                            <td>{{$data->lokasi}}</td>
                        </tr>
                        <tr>
                            <td class="label">6</td>
                            <td class="label">Jumlah Peserta</td>
                            <td class="colon">:</td>
                            <td>{{$data->jumlahpeserta}}</td>
                        </tr>
                        <tr>
                            <td class="label">7</td>
                            <td class="label">Undangan dan Daftar Peserta yg diundang </td>
                            <td class="colon">:</td>
                            <td>
                                <div style="margin-top: 10px; text-align: center;">
                                    @if($data->suratundangan && file_exists(public_path('storage/' . $data->suratundangan)))
                                        <iframe src="{{ asset('storage/' . $data->suratundangan) }}" frameborder="0" width="100%" height="300px"></iframe>
                                        <br>
                                        <a href="{{ asset('storage/' . $data->suratundangan) }}" download
                                           style="
                                               display: inline-block;
                                               margin-top: 10px;
                                               padding: 10px 25px;
                                               background: linear-gradient(45deg, #FFD700, #28a745); /* Emas ke hijau */
                                               color: white;
                                               text-decoration: none;
                                               border-radius: 8px;
                                               font-weight: bold;
                                               transition: all 0.3s ease;
                                           "
                                           onmouseover="this.style.background='white'; this.style.color='black';"
                                           onmouseout="this.style.background='linear-gradient(45deg, #FFD700, #28a745)'; this.style.color='white';"
                                        >
                                           ⬇️ Download File
                                        </a>

                                    @elseif($data->suratundangan)
                                        <iframe src="{{ asset($data->suratundangan) }}" frameborder="0" width="100%" height="300px"></iframe>
                                        <br>
                                        <a href="{{ asset($data->suratundangan) }}" download
                                           style="
                                               display: inline-block;
                                               margin-top: 10px;
                                               padding: 10px 25px;
                                               background: linear-gradient(45deg, #FFD700, #28a745);
                                               color: white;
                                               text-decoration: none;
                                               border-radius: 8px;
                                               font-weight: bold;
                                               transition: all 0.3s ease;
                                           "
                                           onmouseover="this.style.background='white'; this.style.color='black';"
                                           onmouseout="this.style.background='linear-gradient(45deg, #FFD700, #28a745)'; this.style.color='white';"
                                        >
                                           ⬇️ Download File
                                        </a>

                                    @else
                                        <p>Data belum diupdate</p>
                                    @endif
                                </div>
                            </td>

                        </tr>
                    </table>
                            <br>
                    <div class="portfolio-details-content">
                        <div class="flex flex-col gap-[2px]">
                            <h2 class="font-semibold" style="font-size: 16px; display: flex; align-items: center; gap: 6px;">
                                <i class="bi bi-journal-text" style="font-size: 18px;"></i> Isi Agenda:
                            </h2>
                                         <p class="desc-less text-sm leading-[26px]" style="text-align: justify; font-size:16px;">{!!$data->isiagenda!!}</p>
                        </div>
                        <br>

                        <div class="flex flex-col gap-[2px]">
                            <h2 class="font-semibold text-sm" style="font-size: 16px; display: flex; align-items: center; gap: 6px;">
                                <i class="bi bi-info-circle" style="font-size: 18px;"></i> Keterangan :
                            </h2>
                                                        <p class="desc-less text-sm leading-[26px]" style="text-align: justify; font-size:16px;">{!!$data->keterangan!!}</p>
                        </div>

                    </div><!-- portfolio-details-content -->

                    {{-- @endforeach --}}

                    <br>

                    <h4 style="font-weight:bold;">II. DOWNLOAD MATERI PELATIHAN</h4>
                    <div style="margin: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
                        <table class="custom-fl-table" id="sortableTable">
                            <thead>
                                <tr>
                                    <th onclick="sortTable(0)" style="cursor:pointer; width:100px;"> No </th>
                                    <th onclick="sortTable(1)" style="cursor:pointer; width:500px;"> Judul </th>
                                    <th onclick="sortTable(2)" style="cursor:pointer; width:800px;"> Materi </th>
                                </tr>
                            </thead>
                            <tbody id="tableBody">
                                @php
                                    $start = ($datamateripelatihan->currentPage() - 1) * $datamateripelatihan->perPage() + 1;
                                    $materiFound = false; // Variabel untuk mengecek apakah ada materi
                                    $dataAvailable = false; // Variabel untuk mengecek apakah ada data
                                @endphp

                                @foreach ($datamateripelatihan as $item)
                                <tr>
                                    <td style="text-align: center;">{{ $loop->iteration + $start - 1 }}</td>
                                    <td style="text-transform: capitalize;">{{ ucwords(strtolower($item->judulmateripelatihan)) }}</td>
                                    <td>
                                        @if($item->materipelatihan && file_exists(public_path('storage/' . $item->materipelatihan)))
                                            <!-- File ditemukan di penyimpanan -->
                                            <iframe src="{{ asset('storage/' . $item->materipelatihan) }}" frameborder="0" width="100%" height="200px"></iframe>
                                            <a href="{{ asset('storage/' . $item->materipelatihan) }}" download
                                                class="badge"
                                                style="background-color: navy; color: white; border: none; padding:10px 20px; font-size: 13px; border-radius:5px; display: inline-block; margin-top: 10px;">
                                                <i class="fas fa-download" style="margin-right:5px;"></i> Download .pdf
                                            </a>
                                        @elseif($item->materipelatihan)
                                            <!-- File ada tapi bukan di storage, tampilkan dari URL langsung -->
                                            <iframe src="{{ asset($item->materipelatihan) }}" frameborder="0" width="100%" height="100px"></iframe>
                                            <a href="{{ asset($item->materipelatihan) }}" download
                                                class="badge"
                                                style="background-color: navy; color: white; border: none; padding:10px 20px; font-size: 13px; border-radius:5px; display: inline-block; margin-top: 10px;">
                                                <i class="fas fa-download" style="margin-right:5px;"></i> Download .pdf
                                            </a>
                                        @else
                                            <!-- Tidak ada file -->
                                            <button class="badge"
                                                style="background-color: red; color: white; border: none; padding:10px 20px; font-size: 13px; border-radius:5px;">
                                                Materi Belum Di Upload
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                                @php $dataAvailable = true; @endphp <!-- Set variabel jadi true jika ada data -->
                                @endforeach

                            </tbody>
                        </table>

                        <!-- Jika tidak ada data sama sekali, tampilkan pesan di luar tabel -->
                        @if(!$dataAvailable)
                            <p class="no-data-message">MATERI BELUM DI UPLOAD</p>
                        @endif
                    </div>

                    <br>
                    </div>

            </div>
        </div>

      <br><br>

      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
