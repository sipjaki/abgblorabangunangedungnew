@include('frontend.android.00_fiturmenu.01_header')
@include('backend.00_administrator.00_baganterpisah.09_button')

<body class="font-poppins text-[#070625]">
  <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[120px] relative">
<div class="w-full h-[190] absolute top-0 overflow-hidden">
  <img src="/assets/android/iconmenu/bangunanbarublora.png" alt="Bangunan Blora" class="w-full h-full object-cover" />
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
                <img src="{{ asset('storage/' . $item->berkas) }}" alt="Berkas" style="width: 100%; height: 450px; object-fit: contain; border-radius: 8px; margin-top:-80px; margin-bottom:-60px;" />
                <div style="text-align: center; margin-top: 2px; margin-bottom: 3px;">
                    <a href="{{ asset('storage/' . $item->berkas) }}" download class="button-baru">Download Informasi</a>
                </div>
            @elseif ($item->berkas)
                <img src="{{ asset($item->berkas) }}" alt="Berkas" style="width: 100%; height: 450px; object-fit: contain; border-radius: 8px; margin-top:-80px; margin-bottom:-60px;" />
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
<style>
  .card-usaha {
    background-color: #fff;
    border-radius: 12px;
    padding: 20px;
    /* font-family: 'Segoe UI', sans-serif; */
      font-family: 'Poppins', sans-serif;
    font-size: 15px;
    color: #333;
    line-height: 1.6;
    max-width: 850px;
    margin: auto;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
  }

  .card-usaha .title {
    font-size: 16px;
    font-weight: 600;
    color: #4041DA;
    margin-bottom: 10px;
  }

  .card-usaha .section {
    margin-bottom: 20px;
  }

  .card-usaha .manual-number {
    margin-bottom: 10px;
    text-align: justify;
  }

  .card-usaha .manual-number span {
    font-weight: 600;
  }

  .card-usaha a {
    color: #1D4ED8;
    text-decoration: underline;
  }
</style>

<div class="card-usaha">

  <div class="section">
    <p class="title">Persetujuan Bangunan Gedung (PBG) – Fungsi Usaha</p>
    <p class="manual-number">
      Bangunan Gedung Fungsi Usaha meliputi: Perkantoran, perdagangan, perindustrian, wisata dan rekreasi, pertemuan, penginapan, penyimpanan, dan peternakan.
    </p>
  </div>

  <div class="section">
    <p class="title">1. Klasifikasi Bangunan Gedung</p>
    <p class="manual-number">- <span>Sederhana:</span> 1 lantai &lt; 72m²</p>
    <p class="manual-number">- <span>Tidak Sederhana:</span></p>
    <p class="manual-number">&nbsp;&nbsp;• 1 lantai &gt; 72m²</p>
    <p class="manual-number">&nbsp;&nbsp;• 2 lantai &lt; 90m²</p>
    <p class="manual-number">&nbsp;&nbsp;• Lebih dari 2 lantai &gt; 90m²</p>
  </div>

  <div class="section">
    <p class="title">2. Persyaratan Dokumen</p>

    <p class="manual-number">1. <span>Data Tanah:</span></p>
    <p class="manual-number">- Sertifikat Tanah<br>
      - Izin Pemanfaatan Tanah (apabila nama pemohon berbeda dengan di sertifikat)<br>
      - Gambar Kontur Tanah dan Sondir (khusus bangunan tidak sederhana)</p>

    <p class="manual-number">2. <span>Data Umum:</span></p>
    <p class="manual-number">- KTP / KITAS / NIB (OSS)<br>
      - Dokumen Perizinan Tata Ruang<br>
      - Dokumen Lingkungan sesuai peraturan (SPPL, UKL/UPL, AMDAL)<br>
      - KRK (Keterangan Rencana Kota/Kabupaten)<br>
      - Data Penyedia Jasa Perencana Konstruksi: SBU / Arsitek Berlisensi</p>

    <p class="manual-number">3. <span>Data Teknis Arsitektur:</span></p>
    <p class="manual-number">- Konsep arsitektur<br>
      - Gambar situasi, rencana tapak, potongan, tampak, dan gambar detail<br>
      - Gambar rencana tata ruang dalam dan luar<br>
      - Spesifikasi teknis arsitektur<br>
      - Rekomendasi peil banjir (jika diperlukan)</p>

    <p class="manual-number">4. <span>Data Teknis Struktur:</span></p>
    <p class="manual-number">- Perhitungan struktur (untuk bangunan tidak sederhana)<br>
      - Gambar detail struktur<br>
      - Spesifikasi teknis struktur</p>

    <p class="manual-number">5. <span>Data Teknis MEP:</span></p>
    <p class="manual-number">- Gambar sistem jaringan listrik<br>
      - Gambar sistem jaringan sanitasi</p>
  </div>

  <div class="section">
    <p class="title">3. Tahapan Pengurusan</p>

    <p class="manual-number">1. Menyiapkan dokumen tanah, KRK/KKPR, dan dokumen lingkungan</p>
    <p class="manual-number">2. Mendaftar, membuat permohonan, dan mengunggah dokumen di
      <a href="https://simbg.pu.go.id" target="_blank">https://simbg.pu.go.id</a></p>
    <p class="manual-number">3. Menindaklanjuti hasil verifikasi oleh operator Dinas Teknis</p>
    <p class="manual-number">4. Penjadwalan konsultasi permohonan</p>
    <p class="manual-number">5. Konsultasi bersama TPA/TPT</p>
    <p class="manual-number">6. Revisi dokumen sesuai masukan teknis dari TPA/TPT</p>
    <p class="manual-number">7. TPA/TPT menyetujui dokumen perencanaan</p>
    <p class="manual-number">8. Pengunggahan berkas final, perhitungan retribusi, dan validasi oleh Dinas Teknis</p>
    <p class="manual-number">9. Pembayaran retribusi melalui bank persepsi / mobile banking</p>
    <p class="manual-number">10. Penerbitan dokumen PBG oleh DPMPTSP</p>
  </div>

  <!-- Optional Footer -->
  <!--
  <div class="section">
    <p>Untuk informasi mendetail, silakan kunjungi:
      <a href="https://linktr.ee/bidangbangunangedung" target="_blank">https://linktr.ee/bidangbangunangedung</a>
    </p>
  </div>
  -->

</div>


      </form>

      <br><br>
      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
