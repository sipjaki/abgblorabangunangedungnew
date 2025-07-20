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
                  <img src="/assets/android/menunavigasi/02.png" class="object-cover w-full h-full" alt="photo">
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

<div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        @include('backend.00_administrator.00_baganterpisah.10_selamatdatang')
                    </div>
                </div>
            </div>
            <!--end::App Content Header-->

            <div class="container-fluid" style="color: black !important;">
    <div class="row" style="margin: 0 10px;">
        <div class="card mb-4" style="color: black !important;">
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

            <div class="card-body" style="background: white; color: black !important;">
                <!-- Judul -->
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-primary" style="color: black !important;">Tracking Berkas Permohonan PBG / SLF</h3>
                    <p class="text-muted" style="color: black !important;">Masukkan Nomor Registrasi SIMBG untuk melacak status permohonan Anda</p>
                </div>

                <!-- Form -->
                <form method="GET" action="{{ route('betrackingdatacari') }}" class="row g-3 justify-content-center mb-4">
                    <div class="col-md-6">
                        <input
                            type="text"
                            name="noregissimbg"
                            class="form-control @error('noregissimbg') is-invalid @enderror"
                            placeholder="Contoh: PBG-2024-XYZ"
                            value="{{ request('noregissimbg') }}"
                            required
                            style="color: black !important;"
                        >
                        @error('noregissimbg')
                            <div class="invalid-feedback" style="color: black !important;">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="button-baru">
                            <i class="bi bi-search" style="color: black !important;"></i> Cari
                        </button>
                    </div>
                </form>

                <!-- Hasil -->
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


                            {{-- Tambahan fiturstatus --}}
                            <div style="color: black !important;">
                                @include('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.00_fiturstatus')
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
</div>



      </form>

      @include('frontend.android.00_fiturmenu.05_keterangan')


    </div>

    @include('frontend.android.00_fiturmenu.03_android')

  </section>

  @include('frontend.android.00_fiturmenu.02_footer')
