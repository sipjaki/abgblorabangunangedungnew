@include('frontend.android.00_fiturmenu.01_header')

<body class="font-poppins text-[#070625]">
  <section id="content" class="max-w-[640px] w-full min-h-screen mx-auto flex flex-col bg-[#F8F8F8] overflow-x-hidden pb-[120px] relative">
    <!-- Background Header -->
    <div class="w-full h-[184px] absolute top-0 bg-cover bg-center" style="background-image: url('/assets/android/iconmenu/belakangnew.jpg');"></div>

    <!-- Main Content -->
    <div class="relative z-10 flex flex-col gap-6 mt-[60px]">
      <!-- Top Menu with Logos -->
      <div class="top-menu flex justify-between items-center px-[18px]">
        <div class="w-[42px] h-[42px] flex shrink-0">
          <img src="/assets/abgblora/logo/logokabupatenblora.png" alt="Blora Logo">
        </div>
        <p class="font-semibold leading-[28px] text-black text-center" style="font-size: 17px;">
          Dinas Pekerjaan Umum <br> Dan Penataan Ruang <br> Kabupaten Blora
        </p>
        <div class="w-[42px] h-[42px] flex shrink-0">
          <img src="/assets/abgblora/logo/pupr.png" alt="PUPR Logo">
        </div>
      </div>

      <!-- User Profile Card -->
      <div id="Contact-details" class="bg-white rounded-xl overflow-hidden flex flex-col mx-[18px]">
        <div class="flex p-4 items-center gap-4">
          <button type="button" class="contact-name accordion-button flex items-center gap-2 w-full" data-accordion="accordion-1">
            <div class="flex items-center">
              <div class="w-12 h-12 flex shrink-0 rounded-full overflow-hidden">
                <img src="/assets/android/menunavigasi/02.png" class="object-cover w-full h-full" alt="User Photo">
              </div>
            </div>
            <div class="flex flex-col flex-1 gap-[2px] text-left">
              <p class="font-semibold">{{$title}}</p>
            </div>
          </button>
        </div>
      </div>

      <!-- Main Content Container -->
      <div class="flex flex-col space-y-3 px-[18px]">
        <!-- Tracking Card -->
        <div class="card mb-4" style="color: black !important;">
          <!-- Card Header -->
          <div class="card-header" style="
            font-weight: 900;
            font-size: 16px;
            text-align: center;
            background: linear-gradient(135deg, #000080, #000080);
            color: white;
            padding: 10px 25px;
            border-radius: 10px;
            box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
            width: 100%;
          ">
            <span style="font-family: 'Poppins', sans-serif;">📌 Halaman : Berkas Pencarian Permohonan PBG/SLF</span>
          </div>

          <!-- Card Body -->
          <div class="card-body" style="background: white; color: black !important;">
            <!-- Title Section -->
            <div class="text-center mb-4">
              <h3 class="fw-bold text-primary" style="color: black !important;">Tracking Berkas Permohonan PBG / SLF</h3>
              <p class="text-muted" style="color: black !important;">Masukkan Nomor Registrasi SIMBG Saudara</p>
            </div>

            <!-- Search Form -->
          <form method="GET" action="{{ route('betrackingdatacarife') }}" class="row g-3 justify-content-center mb-4">
    <div class="col-md-8" style="text-align: center;">  <!-- Changed from col-md-6 to col-md-8 for wider input -->
        <input
            type="text"
            name="noregissimbg"
            class="form-control form-control-lg @error('noregissimbg') is-invalid @enderror"
            placeholder="Contoh: PBG-2024-XYZ"
            value="{{ request('noregissimbg') }}"
            required
            style="
                color: black !important;
                border-radius: 8px;
                border: 2px solid #4a90e2;
                padding: 12px 20px;
                font-size: 1.1rem;
                box-shadow: 0 2px 5px rgba(0,0,0,0.1);
                transition: all 0.3s ease;
            "
            onfocus="this.style.borderColor='#2a6496'; this.style.boxShadow='0 0 8px rgba(74,144,226,0.5)';"
            onblur="this.style.borderColor='#4a90e2'; this.style.boxShadow='0 2px 5px rgba(0,0,0,0.1)';"
        >
        @error('noregissimbg')
            <div class="invalid-feedback" style="color: black !important; font-size: 0.9rem;">{{ $message }}</div>
        @enderror
    </div>
<div class="col-12 d-flex justify-content-center">
    <button type="submit" class="button-baru">
        <i class="bi bi-search" style="color: white !important;"></i> Cari Data
    </button>
</div>

</form>

<style>
    /* Optional: Add this to your CSS file for better consistency */
    .button-baru:active {
        transform: translateY(1px);
    }

    /* For the input focus effect */
    .form-control-lg:focus {
        border-color: #2a6496 !important;
        box-shadow: 0 0 8px rgba(74,144,226,0.5) !important;
    }
</style>

            <!-- Results Section -->
            @if(isset($data) && $data)
              <div class="card shadow border-0 mb-4" style="color: black !important;">
                <div class="card-body bg-white text-black">
                  <h5 class="card-title fw-bold text-center mb-4">
                    Status Permohonan SIMBG
                  </h5>

                  <div class="d-flex justify-content-center">
                    <div class="table-responsive" style="max-width: 600px;">
                      <table class="table table-bordered table-striped text-start mb-0">
                        <tbody>
                          <tr>
                            <th style="width: 200px;">Nomor Registrasi</th>
                            <td>{{ $data->noregissimbg }}</td>
                          </tr>
                          <tr>
                            <th>Nama Pemohon</th>
                            <td>{{ $data->namapemohon ?? 'Tidak Tersedia' }}</td>
                          </tr>
                          <tr>
                            <th>Status</th>
                            <td>{{ $data->status ?? 'Tidak tersedia' }}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>

                  <!-- Status Details -->
                  <div class="container mt-4 px-3">
                    <div class="row justify-content-center">
                      <div class="col-lg-10 col-md-11 col-sm-12">
                        <div class="card shadow-sm border-0">
                          <div class="card-header bg-primary text-white fw-bold text-center">
                            Status Detail Permohonan
                          </div>
                          <div class="card-body bg-light" style="color: black !important;">
                            @include('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.00_fiturstatus')
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            @elseif(request('noregissimbg'))
              <div class="alert alert-danger text-center" role="alert" style="color: black !important;">
                Data tidak ditemukan untuk nomor registrasi: <strong>{{ request('noregissimbg') }}</strong>
              </div>
            @endif
          </div>
        </div>
      </div>

      @include('frontend.android.00_fiturmenu.05_keterangan')
    </div>

    @include('frontend.android.00_fiturmenu.03_android')
  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
