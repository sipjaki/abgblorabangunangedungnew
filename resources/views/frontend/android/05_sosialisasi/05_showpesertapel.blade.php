@include('frontend.android.00_fiturmenu.01_header')
@include('backend.00_administrator.00_baganterpisah.09_button')

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

      <div id="content" class="w-full max-w-7xl mx-auto bg-white rounded-t-[40px] flex flex-col gap-5 p-[30px_24px_60px]">

    <div class="container-surat px-6"> <!-- padding kiri kanan untuk jarak -->

        <br>

        <h4 style="font-weight:bold;">DAFTAR PESERTA PELATIHAN</h4>
        <div style="margin: 20px; padding: 15px; border: 1px solid #ddd; border-radius: 8px; background-color: #f9f9f9;">
            <table class="custom-fl-table" id="sortableTable" style="width: 100%; border-collapse: collapse;">


                <tbody id="tableBody">
                    @php
                        $start = ($subdata->currentPage() - 1) * $subdata->perPage() + 1;
                        $dataAvailable = false;
                    @endphp
<table style="width: 100%; border-collapse: collapse;">
    <thead>
        <tr style="background-color: #f0f0f0;">
            <th style="border: 1px solid #ccc; padding: 8px;">No</th>
            <th style="border: 1px solid #ccc; padding: 8px;">Nama Lengkap</th>
            <th style="border: 1px solid #ccc; padding: 8px;">Jenjang Pendidikan</th>
            <th style="border: 1px solid #ccc; padding: 8px;">NIK</th>
            <th style="border: 1px solid #ccc; padding: 8px;">Jenis Kelamin</th>
            <th style="border: 1px solid #ccc; padding: 8px;">Tanggal Lahir</th>
            <th style="border: 1px solid #ccc; padding: 8px;">No. Telepon</th>
            <th style="border: 1px solid #ccc; padding: 8px;">Instansi</th>
            <th style="border: 1px solid #ccc; padding: 8px;">Verifikasi</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($subdata as $item)
        <tr>
            <td style="border: 1px solid #ccc; padding: 8px; text-align: center;">
                {{ $loop->iteration + $start - 1 }}
            </td>
            <td style="border: 1px solid #ccc; padding: 8px;">{{ $item->namalengkap }}</td>
            <td style="border: 1px solid #ccc; padding: 8px;">
                {{ optional($item->jenjangpendidikan)->jenjangpendidikan ?? '-' }}
            </td>
            <td style="border: 1px solid #ccc; padding: 8px;">{{ $item->nik }}</td>
            <td style="border: 1px solid #ccc; padding: 8px;">{{ $item->jeniskelamin }}</td>
            <td style="border: 1px solid #ccc; padding: 8px;">
                {{ \Carbon\Carbon::parse($item->tanggallahir)->translatedFormat('d F Y') }}
            </td>
            <td style="border: 1px solid #ccc; padding: 8px;">{{ $item->notelepon }}</td>
            <td style="border: 1px solid #ccc; padding: 8px;">{{ $item->instansi }}</td>
            <td style="border: 1px solid #ccc; padding: 8px;">
                @if ($item->verifikasi === 'Sudah')
                    <span class="badge" style="background-color: green; color: white; padding: 4px 10px; border-radius: 4px;">
                        Sudah
                    </span>
                @else
                    <span class="badge" style="background-color: orange; color: white; padding: 4px 10px; border-radius: 4px;">
                        Belum
                    </span>
                @endif
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="9" style="text-align: center; padding: 15px; color: red;">
                Tidak ada data peserta.
            </td>
        </tr>
        @endforelse
    </tbody>
</table>

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
