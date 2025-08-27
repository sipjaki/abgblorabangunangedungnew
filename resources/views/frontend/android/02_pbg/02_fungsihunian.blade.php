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
  <!-- Info Teks -->

<div class="card-pbg">
  <h2>Persetujuan Bangunan Gedung (PBG) - Fungsi Hunian</h2>

  <p>
    Persetujuan Bangunan Gedung (PBG) adalah dokumen resmi yang diperlukan untuk setiap kegiatan pembangunan.
    Untuk bangunan dengan fungsi hunian, PBG memastikan rencana teknis telah sesuai ketentuan peraturan.
  </p>

  <p class="section-title">Klasifikasi Bangunan Hunian:</p>
  <ul>
    <li><span>Sederhana</span>:
      <ul class="sub-list">
        <li>1 lantai &lt; 72 m²</li>
        <li>2 lantai &lt; 90 m²</li>
      </ul>
    </li>
    <li><span>Tidak Sederhana</span>:
      <ul class="sub-list">
        <li>1 atau 2 lantai ≥ 72 m² / ≥ 90 m²</li>
      </ul>
    </li>
  </ul>

  <p class="section-title">Persyaratan Dokumen:</p>
  <p class="manual-number">1. <span>Data Tanah</span>: Sertifikat tanah, izin pemanfaatan tanah (jika nama pemohon tidak sesuai dengan sertifikat).</p>
  <p class="manual-number">2. <span>Data Umum</span>: KTP/KITAS, dokumen perizinan tata ruang, KRK/KKPR, data penyedia jasa konstruksi (SBU/arsitek berlisensi).</p>
  <p class="manual-number">3. <span>Data Teknis Arsitektur</span>: Gambar situasi, denah, potongan, tampak.</p>
  <p class="manual-number">4. <span>Data Teknis Struktur</span>: Gambar pondasi, rangka atap, struktur.</p>
  <p class="manual-number">5. <span>Data Teknis MEP</span>: Gambar jaringan listrik dan sanitasi.</p>

  <p class="section-title">Tahapan Pengurusan:</p>
  <p class="manual-number">1. Menyiapkan dokumen tanah, KRK/KKPR (dokumen tata ruang).</p>
  <p class="manual-number">2. Melakukan pendaftaran dan unggah dokumen di <a href="https://simbg.pu.go.id" target="_blank">simbg.pu.go.id</a></p>
  <p class="manual-number">3. Verifikasi dokumen oleh operator Dinas Teknis.</p>
  <p class="manual-number">4. Penjadwalan konsultasi permohonan.</p>
  <p class="manual-number">5. Konsultasi bersama TPA/TPT.</p>
  <p class="manual-number">6. Revisi dokumen sesuai masukan teknis TPA/TPT.</p>
  <p class="manual-number">7. TPA/TPT menyetujui dokumen perencanaan.</p>
  <p class="manual-number">8. Pengunggahan berkas final, validasi, dan perhitungan retribusi.</p>
  <p class="manual-number">9. Pembayaran retribusi melalui bank persepsi atau mobile banking.</p>
</div>

{{--
  <p class="text-[15px] text-neutral-700 mt-2">
    Untuk informasi lebih lengkap, kunjungi:
    <a href="https://linktr.ee/bidangbangunangedung" target="_blank" class="text-blue-600 underline">https://linktr.ee/bidangbangunangedung</a>
  </p> --}}
</div>

</a>


      </form>

      <br><br>
      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
