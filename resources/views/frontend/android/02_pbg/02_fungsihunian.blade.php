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
<a href="/feinfocampuran" class="bg-white rounded-xl flex flex-col p-4 hover:shadow-md transition">
  <!-- Gambar Thumbnail Penuh -->
  <div class="w-full h-auto rounded-lg overflow-hidden">
    <img src="/assets/android/pbgslf/PBG_FUNGSI_HUNIAN.jpg" class="object-cover w-full h-full" alt="thumbnail">
  </div>

  <br>
  <!-- Info Teks -->
<div class="flex flex-col gap-2 mt-4">
  <p class="font-semibold text-[16px] leading-[24px] text-[#4041DA]">
    Persetujuan Bangunan Gedung (PBG)
  </p>
  <p class="text-[16px] text-neutral-700" style="text-align: justify;">
    Persetujuan Bangunan Gedung (PBG) adalah dokumen resmi yang dikeluarkan oleh pemerintah untuk memberikan persetujuan terhadap rencana teknis bangunan gedung. PBG wajib dimiliki sebelum memulai pembangunan, termasuk untuk fungsi hunian baik sederhana maupun tidak sederhana.
  </p>

  <p class="font-semibold text-[16px] leading-[24px] text-[#4041DA] mt-2">Klasifikasi Bangunan Hunian:</p>
  <ul class="list-disc list-inside text-[16px] text-neutral-700" style="text-align: justify;">
    <li><strong>Sederhana</strong>:
      <ul class="list-disc list-inside ml-4">
        <li>1 Lantai: &lt; 72 m²</li>
        <li>2 Lantai: &lt; 90 m²</li>
      </ul>
    </li>
    <li><strong>Tidak Sederhana</strong>:
      <ul class="list-disc list-inside ml-4">
        <li>1 atau 2 lantai: ≥ 72 m² atau ≥ 90 m²</li>
      </ul>
    </li>
  </ul>

  <p class="font-semibold text-[16px] leading-[24px] text-[#4041DA] mt-2">Persyaratan:</p>
  <ol class="list-decimal list-inside text-[16px] text-neutral-700" style="text-align: justify;">
    <li><strong>Data Tanah</strong>: Sertifikat tanah dan Izin Pemanfaatan Tanah (jika nama pemohon berbeda).</li>
    <li><strong>Data Umum</strong>: KTP/KITAS, dokumen perizinan tata ruang, KRK/KKPR, dan data penyedia jasa perencana konstruksi (SBU/arsitek bersertifikat).</li>
    <li><strong>Data Teknis Arsitektur</strong>: Gambar situasi, denah, potongan, tampak.</li>
    <li><strong>Data Teknis Struktur</strong>: Gambar pondasi, rangka atap, struktur.</li>
    <li><strong>Data Teknis MEP</strong>: Gambar jaringan listrik dan sanitasi.</li>
  </ol>

  <p class="font-semibold text-[16px] leading-[24px] text-[#4041DA] mt-2">Tahapan Pengurusan:</p>
  <ol class="list-decimal list-inside text-[16px] text-neutral-700" style="text-align: justify;">
    <li>Menyiapkan dokumen tanah, KRK/KKPR (tata ruang).</li>
    <li>Mendaftar, membuat permohonan, dan mengunggah dokumen di website <a href="https://simbg.pu.go.id" class="text-blue-600 underline" target="_blank">https://simbg.pu.go.id</a>.</li>
    <li>Menindaklanjuti hasil verifikasi dari operator dinas teknis.</li>
    <li>Penjadwalan konsultasi permohonan.</li>
    <li>Konsultasi teknis bersama TPA/TPT.</li>
    <li>Revisi dokumen sesuai masukan teknis TPA/TPT.</li>
    <li>Revisi final dan persetujuan dokumen oleh TPA/TPT.</li>
    <li>Pengunggahan berkas final, perhitungan retribusi, dan validasi teknis.</li>
    <li>Pembayaran retribusi melalui bank persepsi atau mobile banking.</li>
  </ol>

  <p class="text-[16px] text-neutral-700 mt-4">
    Untuk informasi lebih lanjut dan akses ke panduan lengkap, silakan kunjungi:
    <a href="https://linktr.ee/bidangbangunangedung" class="text-blue-600 underline" target="_blank">https://linktr.ee/bidangbangunangedung</a>
  </p>
</div>

</a>


      </form>

      <br><br>
      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
