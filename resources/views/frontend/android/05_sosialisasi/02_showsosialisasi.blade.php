@include('frontend.android.00_fiturmenu.01_header')
@include('backend.00_administrator.00_baganterpisah.09_button')

<body class="font-poppins text-[#070625]">
  <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[120px] relative">
@include('frontend.abgblora.00_fiturmenu.07_coverdepan')

<div class="flex flex-col z-30">

      <div id="content" class="w-full max-w-7xl mx-auto bg-white rounded-t-[40px] flex flex-col gap-5 p-[30px_24px_60px]">

    <div class="container-surat px-6"> <!-- padding kiri kanan untuk jarak -->
<div class="container mx-auto px-4 py-6">

  <!-- Tombol Daftar Pelatihan -->
  <div class="flex justify-center my-6">
    <a href="/resagendapelatihan/{{$data->id}}">
      <button class="button-baru"
        type="button"
      >
        <i class="bi bi-person-fill mr-2"></i>
        Daftar Pelatihan
      </button>
    </a>
  </div>

  <!-- Header Surat -->
  <div class="header-surat text-center mb-8">
    <div class="header-text">
      <h6 style="
        font-size: 14px;
        font-weight: 100;
        color: #28A745;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 2px;
      ">
        AGENDA SOSIALISASI BANGUNAN GEDUNG
      </h6>
      <h4 style="
        font-size: 1.2rem;
        font-weight: 500;
        color: #444;
        line-height: 1.3;
      ">
        DPUPR KABUPATEN BLORA <br> PROVINSI JAWA TENGAH
      </h4>
    </div>
  </div>

</div>


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
        <table class="table-identitas" style="width: 100%; border-collapse: collapse;">

            <tr>
                <td class="label" style="border: 1px solid #ccc; padding: 8px; width: 30px;">1</td>
                <td class="label" style="border: 1px solid #ccc; padding: 8px; width: 180px;">Nama Kegiatan</td>
                <td class="colon" style="border: 1px solid #ccc; padding: 8px; width: 20px;">:</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{$data->namakegiatan}}</td>
            </tr>
            <tr>
                <td class="label" style="border: 1px solid #ccc; padding: 8px;">2</td>
                <td class="label" style="border: 1px solid #ccc; padding: 8px;">Kategori</td>
                <td class="colon" style="border: 1px solid #ccc; padding: 8px;">:</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{$data->kategoripelatihan->kategoripelatihan}}</td>
            </tr>
            <tr>
                <td class="label" style="border: 1px solid #ccc; padding: 8px;">3</td>
                <td class="label" style="border: 1px solid #ccc; padding: 8px;">Waktu Pelaksanaan</td>
                <td class="colon" style="border: 1px solid #ccc; padding: 8px;">:</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{ \Carbon\Carbon::parse($data->waktupelaksanaan)->translatedFormat('d F Y') }}</td>
            </tr>
            <tr>
                <td class="label" style="border: 1px solid #ccc; padding: 8px;">4</td>
                <td class="label" style="border: 1px solid #ccc; padding: 8px;">Penyelenggara</td>
                <td class="colon" style="border: 1px solid #ccc; padding: 8px;">:</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{$data->asosiasimasjaki->namaasosiasi ?? '-'}}</td>
            </tr>
            <tr>
                <td class="label" style="border: 1px solid #ccc; padding: 8px;">5</td>
                <td class="label" style="border: 1px solid #ccc; padding: 8px;">Lokasi</td>
                <td class="colon" style="border: 1px solid #ccc; padding: 8px;">:</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{$data->lokasi}}</td>
            </tr>
            <tr>
                <td class="label" style="border: 1px solid #ccc; padding: 8px;">6</td>
                <td class="label" style="border: 1px solid #ccc; padding: 8px;">Jumlah Peserta</td>
                <td class="colon" style="border: 1px solid #ccc; padding: 8px;">:</td>
                <td style="border: 1px solid #ccc; padding: 8px;">{{$data->jumlahpeserta}}</td>
            </tr>
            <tr>
                <td class="label" style="border: 1px solid #ccc; padding: 8px;">7</td>
                <td class="label" style="border: 1px solid #ccc; padding: 8px;">Undangan dan Daftar Peserta yg diundang</td>
                <td class="colon" style="border: 1px solid #ccc; padding: 8px;">:</td>
                <td style="border: 1px solid #ccc; padding: 8px;">
                    <div style="margin-top: 10px; text-align: center;">
                        @if($data->suratundangan && file_exists(public_path('storage/' . $data->suratundangan)))
                            <iframe src="{{ asset('storage/' . $data->suratundangan) }}" frameborder="0" width="100%" height="300px"></iframe>
                            <br>
                            <a href="{{ asset('storage/' . $data->suratundangan) }}" download
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
                <p class="desc-less text-sm leading-[26px]" style="text-align: justify; font-size:16px;">{!! $data->isiagenda !!}</p>
            </div>
            <br>

            <div class="flex flex-col gap-[2px]">
                <h2 class="font-semibold text-sm" style="font-size: 16px; display: flex; align-items: center; gap: 6px;">
                    <i class="bi bi-info-circle" style="font-size: 18px;"></i> Keterangan :
                </h2>
                <p class="desc-less text-sm leading-[26px]" style="text-align: justify; font-size:16px;">{!! $data->keterangan !!}</p>
            </div>

        </div><!-- portfolio-details-content -->

        <br>

        <h4 style="font-weight:bold;">II. DOWNLOAD MATERI PELATIHAN</h4>
        <div style="margin: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
            <table class="custom-fl-table" id="sortableTable" style="width: 100%; border-collapse: collapse;">

                <thead>
                    <tr>
                        <th style="cursor:pointer; width:100px; border: 1px solid #ccc; padding: 8px;">No</th>
                        <th style="cursor:pointer; width:500px; border: 1px solid #ccc; padding: 8px;">Judul</th>
                        <th style="cursor:pointer; width:800px; border: 1px solid #ccc; padding: 8px;">Materi</th>
                    </tr>
                </thead>

                <tbody id="tableBody">
                    @php
                        $start = ($datamateripelatihan->currentPage() - 1) * $datamateripelatihan->perPage() + 1;
                        $dataAvailable = false;
                    @endphp

                    @foreach ($datamateripelatihan as $item)
                    <tr>
                        <td style="text-align: center; border: 1px solid #ccc; padding: 8px;">{{ $loop->iteration + $start - 1 }}</td>
                        <td style="text-transform: capitalize; border: 1px solid #ccc; padding: 8px;">{{ ucwords(strtolower($item->judulmateripelatihan)) }}</td>
                        <td style="border: 1px solid #ccc; padding: 8px;">
                            @if($item->materipelatihan1 && file_exists(public_path('storage/' . $item->materipelatihan1)))
                                <iframe src="{{ asset('storage/' . $item->materipelatihan1) }}" frameborder="0" width="100%" height="200px"></iframe>
                                <a href="{{ asset('storage/' . $item->materipelatihan1) }}" download
                                   class="badge"
                                   style="background-color: navy; color: white; border: none; padding:10px 20px; font-size: 13px; border-radius:5px; display: inline-block; margin-top: 10px;">
                                   <i class="fas fa-download" style="margin-right:5px;"></i> Download .pdf
                                </a>
                            @elseif($item->materipelatihan1)
                                <iframe src="{{ asset($item->materipelatihan1) }}" frameborder="0" width="100%" height="100px"></iframe>
                                <a href="{{ asset($item->materipelatihan1) }}" download
                                   class="badge"
                                   style="background-color: navy; color: white; border: none; padding:10px 20px; font-size: 13px; border-radius:5px; display: inline-block; margin-top: 10px;">
                                   <i class="fas fa-download" style="margin-right:5px;"></i> Download .pdf
                                </a>
                            @else
                                <button class="badge"
                                        style="background-color: red; color: white; border: none; padding:10px 20px; font-size: 13px; border-radius:5px;">
                                    Materi Belum Di Upload
                                </button>
                            @endif
                        </td>
                    </tr>
                    @php $dataAvailable = true; @endphp
                    @endforeach

                </tbody>
            </table>

            @if(!$dataAvailable)
                <p class="no-data-message" style="text-align: center; font-weight: bold; margin-top: 20px;">MATERI BELUM DI UPLOAD</p>
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
