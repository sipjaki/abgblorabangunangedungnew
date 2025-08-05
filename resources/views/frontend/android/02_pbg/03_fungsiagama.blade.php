@include('frontend.android.00_fiturmenu.01_header')
@include('backend.00_administrator.00_baganterpisah.09_button')

<body class="font-poppins text-[#070625]">
  <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[120px] relative">
    <div class="w-full h-[190] absolute top-0 overflow-hidden">
  <img src="/assets/android/iconmenu/bangunanbarublora.png" alt="Bangunan Blora" class="w-full h-full object-cover" />
</div>

     <div class="relative z-10 flex flex-col gap-6 mt-[60px]">
      <div class="top-menu flex justify-between items-center px-[18px]">
          <div class="w-[42px] h-[42px] flex shrink-0">
            <img src="/assets/abgblora/logo/logokabupatenblora.png" alt="icon">
          </div>
        {{-- <p class="font-semibold leading-[28px] text-white text-center" style="font-size: 18px;">Dinas Pekerjaan Umum Dan Penataan Ruang <br> Kabupaten Blora Provinsi Jawa Tengah </span></p> --}}
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
">
  <p style="
    font-size: 17px;
    font-weight: 600;
    line-height: 28px;
    color: #000;
    text-align: center;
    margin: 0;
  ">
    Dinas Pekerjaan Umum <br>
    Dan Penataan Ruang <br>
    Kabupaten Blora
  </p>
</div>

        <div class="w-[42px] h-[42px] flex shrink-0">
            <img src="/assets/abgblora/logo/pupr.png" alt="icon">
          </div>
      </div>
      <form id="Details" class="group result-card-container flex flex-col gap-6">
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
<div class="flex flex-col space-y-[0px] px-[0px] py-[0px]">
    @foreach ($data as $item)
        <div class="bg-white rounded-xl p-[8px] shadow-sm">
            @if ($item->berkas && file_exists(public_path('storage/' . $item->berkas)))
                <img src="{{ asset('storage/' . $item->berkas) }}" alt="Berkas" style="width: 100%; height: 450px; object-fit: contain; border-radius: 8px;" />
                <div style="text-align: center; margin-top: 2px; margin-bottom: 3px;">
                    <a href="{{ asset('storage/' . $item->berkas) }}" download class="button-baru">Download Informasi</a>
                </div>
            @elseif ($item->berkas)
                <img src="{{ asset($item->berkas) }}" alt="Berkas" style="width: 100%; height: 450px; object-fit: contain; border-radius: 8px;" />
                <div style="text-align: center; margin-top: 2px; margin-bottom: 3px;">
                    <a href="{{ asset($item->berkas) }}" download class="button-baru">Download Informasi</a>
                </div>
            @else
                <p style="font-family: 'Poppins', sans-serif; font-weight: 600; margin: 0;">Data belum diupdate</p>
            @endif
        </div>
    @endforeach
</div>

  <br>

</a>
<style>
  .card-keagamaan {
    background-color: #ffffff;
    border-radius: 12px;
    padding: 20px;
    max-width: 850px;
    margin: 0 auto;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    /* font-family: 'Segoe UI', sans-serif; */
      font-family: 'Poppins', sans-serif;
    font-size: 15px;
    color: #333;
  }

  .card-keagamaan p {
    margin-bottom: 12px;
    text-align: justify;
    line-height: 1.6;
  }

  .card-keagamaan .title {
    font-size: 16px;
    font-weight: bold;
    margin-bottom: 8px;
    line-height: 1.5;
  }

  .card-keagamaan ul {
    padding-left: 20px;
    margin-bottom: 12px;
  }

  .card-keagamaan ul li {
    margin-bottom: 6px;
    list-style-type: disc;
  }

  .card-keagamaan .numbered {
    margin-bottom: 10px;
    text-align: justify;
  }

  .card-keagamaan .numbered span {
    font-weight: bold;
  }
</style>

<div class="card-keagamaan">

  <p class="title">Persetujuan Bangunan Gedung (PBG) - Fungsi Keagamaan</p>

  <p>
    Persetujuan Bangunan Gedung (PBG) adalah dokumen resmi yang dibutuhkan sebelum mendirikan bangunan.
    Untuk bangunan fungsi keagamaan seperti masjid, gereja, vihara, pura, dan lainnya,
    PBG diperlukan agar pembangunan sesuai dengan ketentuan teknis, lingkungan, dan tata ruang yang berlaku.
  </p>

  <p class="title">Klasifikasi Bangunan Keagamaan:</p>
  <ul>
    <li><span style="font-weight:bold;">Sederhana:</span>
      <ul style="padding-left: 20px;">
        <li>1 lantai &lt; 72 m²</li>
        <li>2 lantai &lt; 90 m²</li>
      </ul>
    </li>
    <li><span style="font-weight:bold;">Tidak Sederhana:</span>
      <ul style="padding-left: 20px;">
        <li>1 lantai ≥ 72 m²</li>
        <li>2 lantai ≥ 90 m²</li>
      </ul>
    </li>
  </ul>

  <p class="title">Persyaratan Dokumen:</p>

  <p class="numbered">1. <span>Data Tanah:</span></p>
  <ul>
    <li>Sertifikat tanah</li>
    <li>Izin Pemanfaatan Tanah (jika nama pemohon tidak sesuai dengan sertifikat)</li>
    <li>Gambar kontur tanah dan sondir (untuk bangunan tidak sederhana)</li>
  </ul>

  <p class="numbered">2. <span>Data Umum:</span></p>
  <ul>
    <li>KTP/KITAS (Ketua Yayasan/Ormas/Lembaga)</li>
    <li>KRK/KKPR</li>
    <li>Dokumen lingkungan (SPPL atau dokumen dari DPMPTSP)</li>
    <li>Data penyedia jasa konstruksi (SBU/Arsitek bersertifikat)</li>
    <li>Surat Rekomendasi FKUB (Forum Kerukunan Umat Beragama)</li>
  </ul>

  <p class="numbered">3. <span>Data Teknis Arsitektur:</span></p>
  <ul>
    <li>Konsep arsitektur</li>
    <li>Gambar situasi, rencana tapak, potongan, tampak, dan detail</li>
    <li>Rencana tata ruang dalam & luar</li>
    <li>Spesifikasi teknis arsitektur</li>
    <li>Rekomendasi peta banjir (jika diperlukan)</li>
  </ul>

  <p class="numbered">4. <span>Data Teknis Struktur:</span></p>
  <ul>
    <li>Perhitungan struktur (untuk bangunan tidak sederhana)</li>
    <li>Gambar detail struktur</li>
    <li>Spesifikasi teknis struktur</li>
  </ul>

  <p class="numbered">5. <span>Data Teknis MEP:</span></p>
  <ul>
    <li>Gambar sistem jaringan listrik</li>
    <li>Gambar sistem jaringan sanitasi</li>
    <li>Gambar sistem proteksi kebakaran</li>
    <li>Data teknis MEP lainnya</li>
  </ul>

  <p class="title">Tahapan Pengurusan:</p>

  <p class="numbered">1. Menyiapkan dokumen tanah, KRK/KKPR, dan dokumen lingkungan</p>
  <p class="numbered">2. Mendaftar, membuat permohonan, dan mengunggah dokumen ke
    <a href="https://simbg.pu.go.id" target="_blank" style="color: #1D4ED8; text-decoration: underline;">https://simbg.pu.go.id</a>
  </p>
  <p class="numbered">3. Menindaklanjuti hasil verifikasi operator dinas teknis</p>
  <p class="numbered">4. Penjadwalan konsultasi permohonan</p>
  <p class="numbered">5. Melakukan konsultasi bersama TPA/TPT</p>
  <p class="numbered">6. Merevisi dokumen sesuai masukan dari TPA/TPT</p>
  <p class="numbered">7. Dokumen disetujui oleh TPA/TPT</p>
  <p class="numbered">8. Unggah dokumen final, perhitungan retribusi, dan validasi teknis</p>
  <p class="numbered">9. Pembayaran retribusi via bank persepsi atau mobile banking</p>
  <p class="numbered">10. Penerbitan dokumen PBG oleh DPMPTSP</p>

</div>


      </form>

      <br><br>
      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
