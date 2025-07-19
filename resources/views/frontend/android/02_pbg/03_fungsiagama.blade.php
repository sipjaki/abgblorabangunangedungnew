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
      <form action="success.html" id="Details" class="group result-card-container flex flex-col gap-6">
        <div id="Contact-details" class="bg-white rounded-xl overflow-hidden flex flex-col mx-[18px]">
          <div class="flex p-4 items-center gap-4">
            <button type="button" class="contact-name accordion-button flex items-center gap-2 w-full" data-accordion="accordion-1">
              <div class="flex items-center">
                <div class="w-12 h-12 flex shrink-0 rounded-full overflow-hidden">
                  <img src="/assets/android/menunavigasi/03.png" class="object-cover w-full h-full" alt="photo">
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
            <!-- Card 1 -->
<a href="#" class="bg-white rounded-xl flex flex-col p-4 hover:shadow-md transition">
  <!-- Gambar Thumbnail Penuh -->
 @foreach ($data as $item)

<div class="flex flex-col space-y-3 px-[18px]">
    <!-- Card 1 -->
    <a href="#" class="bg-white rounded-xl flex flex-col p-4 hover:shadow-md transition">
        <!-- Gambar Thumbnail Penuh -->
        <div class="w-full h-auto rounded-lg overflow-hidden">
       <div>
    @if($item->berkas && file_exists(public_path('storage/' . $item->berkas)))
        <img src="{{ asset('storage/' . $item->berkas) }}" alt="Berkas" style="width: 100%; height: 450px; object-fit: contain;" />
    @elseif($item->berkas)
        <img src="{{ asset($item->berkas) }}" alt="Berkas" style="width: 100%; height: 450px; object-fit: contain;" />
    @else
        <p style="font-family: 'Poppins', sans-serif; font-weight: 600;">Data belum diupdate</p>
    @endif
    </div>

@endforeach

  <br>

</a>
<div class="flex flex-col gap-4 mt-4 text-[15px] text-neutral-800">

  <!-- Judul -->
  <p class="font-bold text-[16px] leading-[24px]">
    Persetujuan Bangunan Gedung (PBG) - Fungsi Keagamaan
  </p>

  <!-- Deskripsi -->
  <p class="text-justify">
    Persetujuan Bangunan Gedung (PBG) adalah dokumen resmi yang dibutuhkan sebelum mendirikan bangunan. Untuk bangunan fungsi keagamaan seperti masjid, gereja, vihara, pura, dan lainnya, PBG diperlukan agar pembangunan sesuai dengan ketentuan teknis, lingkungan, dan tata ruang yang berlaku.
  </p>

  <!-- Klasifikasi -->
  <p class="font-bold leading-[22px]">Klasifikasi Bangunan Keagamaan:</p>
  <ul class="list-disc ml-5 text-justify space-y-1">
    <li><span class="font-bold">Sederhana</span>:
      <ul class="list-disc ml-5">
        <li>1 lantai &lt; 72 m²</li>
        <li>2 lantai &lt; 90 m²</li>
      </ul>
    </li>
    <li><span class="font-bold">Tidak Sederhana</span>:
      <ul class="list-disc ml-5">
        <li>1 lantai ≥ 72 m²</li>
        <li>2 lantai ≥ 90 m²</li>
      </ul>
    </li>
  </ul>

  <!-- Persyaratan Dokumen -->
  <p class="font-bold leading-[22px]">Persyaratan Dokumen:</p>
  <ol class="list-decimal ml-5 space-y-2 text-justify">
    <li>
      <span class="font-bold">Data Tanah:</span>
      <ul class="list-disc ml-5">
        <li>Sertifikat tanah</li>
        <li>Izin Pemanfaatan Tanah (jika nama pemohon tidak sesuai dengan sertifikat)</li>
        <li>Gambar kontur tanah dan sondir (untuk bangunan tidak sederhana)</li>
      </ul>
    </li>
    <li>
      <span class="font-bold">Data Umum:</span>
      <ul class="list-disc ml-5">
        <li>KTP/KITAS (Ketua Yayasan/Ormas/Lembaga)</li>
        <li>KRK/KKPR</li>
        <li>Dokumen lingkungan (SPPL atau dokumen dari DPMPTSP)</li>
        <li>Data penyedia jasa konstruksi (SBU/Arsitek bersertifikat)</li>
        <li>Surat Rekomendasi FKUB (Forum Kerukunan Umat Beragama)</li>
      </ul>
    </li>
    <li>
      <span class="font-bold">Data Teknis Arsitektur:</span>
      <ul class="list-disc ml-5">
        <li>Konsep arsitektur</li>
        <li>Gambar situasi, rencana tapak, potongan, tampak, dan detail</li>
        <li>Rencana tata ruang dalam & luar</li>
        <li>Spesifikasi teknis arsitektur</li>
        <li>Rekomendasi peta banjir (jika diperlukan)</li>
      </ul>
    </li>
    <li>
      <span class="font-bold">Data Teknis Struktur:</span>
      <ul class="list-disc ml-5">
        <li>Perhitungan struktur (untuk bangunan tidak sederhana)</li>
        <li>Gambar detail struktur</li>
        <li>Spesifikasi teknis struktur</li>
      </ul>
    </li>
    <li>
      <span class="font-bold">Data Teknis MEP:</span>
      <ul class="list-disc ml-5">
        <li>Gambar sistem jaringan listrik</li>
        <li>Gambar sistem jaringan sanitasi</li>
        <li>Gambar sistem proteksi kebakaran</li>
        <li>Data teknis MEP lainnya</li>
      </ul>
    </li>
  </ol>

  <!-- Tahapan Pengurusan -->
  <p class="font-bold leading-[22px] mt-3">Tahapan Pengurusan:</p>
  <ol class="list-decimal ml-5 text-justify space-y-1">
    <li>Menyiapkan dokumen tanah, KRK/KKPR, dan dokumen lingkungan</li>
    <li>Mendaftar, membuat permohonan, dan mengunggah dokumen ke <a href="https://simbg.pu.go.id" target="_blank" class="text-blue-600 underline">https://simbg.pu.go.id</a></li>
    <li>Menindaklanjuti hasil verifikasi operator dinas teknis</li>
    <li>Penjadwalan konsultasi permohonan</li>
    <li>Melakukan konsultasi bersama TPA/TPT</li>
    <li>Merevisi dokumen sesuai masukan dari TPA/TPT</li>
    <li>Dokumen disetujui oleh TPA/TPT</li>
    <li>Unggah dokumen final, perhitungan retribusi, dan validasi teknis</li>
    <li>Pembayaran retribusi via bank persepsi atau mobile banking</li>
    <li>Penerbitan dokumen PBG oleh DPMPTSP</li>
  </ol>

</div>


      </form>

      <br><br>
      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
