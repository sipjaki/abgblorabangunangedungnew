@include('backend.00_administrator.00_baganterpisah.01_header')

<!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
{{-- ---------------------------------------------------------------------- --}}

@include('backend.00_administrator.00_baganterpisah.04_navbar')
{{-- ---------------------------------------------------------------------- --}}

      @include('backend.00_administrator.00_baganterpisah.03_sidebar')

      <!--begin::App Main-->
      <main class="app-main"
         style="
    background: linear-gradient(to bottom, #7de3f1, #ffffff);
    margin: 0;
    padding: 0;
    position: relative;
    left: 0;
  ">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">

                    @include('backend.00_administrator.00_baganterpisah.10_selamatdatang')

              {{-- <div class="col-sm-12"><h3 class="mb-0">Selamat datang ! <span style="color: black; font-weight:800;" > {{ Auth::user()->name }}</span> di Dashboard <span style="color: black; font-weight:800;"> {{ Auth::user()->statusadmin->statusadmin }} </span>  Sistem Informasi Pembina Jasa Konstruksi Kab Blora</h3></div> --}}

            </div>
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <br>

        <!-- Menampilkan pesan sukses -->

        {{-- ======================================================= --}}
        {{-- ALERT --}}

        @include('backend.00_administrator.00_baganterpisah.06_alert')

        {{-- ======================================================= --}}

        <div class="container-fluid">
            <!--begin::Row-->
  <!-- =========================================================== -->
  {{-- <h5 class="mt-4 mb-2">Info Box With <code>bg-*</code></h5> --}}
  <!--begin::Row-->

  <div class="row">
    <div class="col-md-3 col-sm-6 col-12">
        <a href="/bekrkusaha">
            <div class="info-box shadow-lg rounded-3 p-4" style="background: #000080; color: white; transition: all 0.3s ease;"
                 onmouseover="this.style.backgroundColor='white'; this.style.color='black'; this.querySelector('.info-box-text').style.color='black'; this.querySelector('.info-box-number').style.color='black';"
                 onmouseout="this.style.backgroundColor='#000080'; this.style.color='white'; this.querySelector('.info-box-text').style.color='white'; this.querySelector('.info-box-number').style.color='white';">
                <span class="info-box-icon d-flex justify-content-center align-items-center p-3 shadow-sm rounded" style="background-color: #ffd100; width: 60px; height: 60px;">
                    <!-- SVG icon for Fungsi Usaha -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green" class="bi bi-briefcase" viewBox="0 0 16 16">
                        <path d="M0 4a2 2 0 0 1 2-2h3V1a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v1h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zM4 3V2h8v1H4zm10 1H2v8h12V4z"/>
                    </svg>
                </span>
                <div class="info-box-content mt-3 text-center" style="font-family: 'Poppins', sans-serif;">
                    <span class="info-box-text" style="color: white;">Fungsi Usaha</span>
                    <span class="info-box-number fw-bold" style="font-size: 16px;">{{$datajumlahkrkusaha}} Berkas Permohonan</span>
                </div>
            </div>
        </a>
    </div>

    <div class="col-md-3 col-sm-6 col-12">
        <a href="/bekrkhunian">
            <div class="info-box shadow-lg rounded-3 p-4" style="background: #000080; color: white; transition: all 0.3s ease;"
                 onmouseover="this.style.backgroundColor='white'; this.style.color='black'; this.querySelector('.info-box-text').style.color='black'; this.querySelector('.info-box-number').style.color='black';"
                 onmouseout="this.style.backgroundColor='#000080'; this.style.color='white'; this.querySelector('.info-box-text').style.color='white'; this.querySelector('.info-box-number').style.color='white';">
                <span class="info-box-icon d-flex justify-content-center align-items-center p-3 shadow-sm rounded" style="background-color: #ffd100; width: 60px; height: 60px;">
                    <!-- SVG icon for Fungsi Hunian -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green" class="bi bi-house-door" viewBox="0 0 16 16">
                        <path d="M8 3.293l6 6V13h-2v-2a1 1 0 0 0-1-1h-2V6h-4v3H3a1 1 0 0 0-1 1v2H0v-3l8-7.707zM8 1.5l7 7V14a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8.5l7-7z"/>
                    </svg>
                </span>
                <div class="info-box-content mt-3 text-center" style="font-family: 'Poppins', sans-serif;">
                    <span class="info-box-text" style="color: white;">Fungsi Hunian</span>
                    <span class="info-box-number fw-bold" style="font-size: 16px;">70% Tercapai</span>
                </div>
            </div>
        </a>
    </div>

    <!-- Fungsi Keagamaan -->
    <div class="col-md-3 col-sm-6 col-12">
        <a href="/404">
            <div class="info-box shadow-lg rounded-3 p-4" style="background: #000080; color: white; transition: all 0.3s ease;"
                 onmouseover="this.style.backgroundColor='white'; this.style.color='black'; this.querySelector('.info-box-text').style.color='black'; this.querySelector('.info-box-number').style.color='black';"
                 onmouseout="this.style.backgroundColor='#000080'; this.style.color='white'; this.querySelector('.info-box-text').style.color='white'; this.querySelector('.info-box-number').style.color='white';">
                <span class="info-box-icon d-flex justify-content-center align-items-center p-3 shadow-sm rounded" style="background-color: #ffd100; width: 60px; height: 60px;">
                    <!-- SVG icon for Fungsi Keagamaan -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green" class="bi bi-church" viewBox="0 0 16 16">
                        <path d="M8 0L6 2h2v5H4V2h2l2-2h2l2 2h2v5h-6V2h2L8 0zM3 7v8h1V7H3zm10 0v8h-1V7h1z"/>
                    </svg>
                </span>
                <div class="info-box-content mt-3 text-center" style="font-family: 'Poppins', sans-serif;">
                    <span class="info-box-text" style="color: white;">Fungsi Keagamaan</span>
                    <span class="info-box-number fw-bold" style="font-size: 16px;">70% Tercapai</span>
                </div>
            </div>
        </a>
    </div>

    <!-- Fungsi Sosial Budaya -->
    <div class="col-md-3 col-sm-6 col-12">
        <a href="/404">
            <div class="info-box shadow-lg rounded-3 p-4" style="background: #000080; color: white; transition: all 0.3s ease;"
                 onmouseover="this.style.backgroundColor='white'; this.style.color='black'; this.querySelector('.info-box-text').style.color='black'; this.querySelector('.info-box-number').style.color='black';"
                 onmouseout="this.style.backgroundColor='#000080'; this.style.color='white'; this.querySelector('.info-box-text').style.color='white'; this.querySelector('.info-box-number').style.color='white';">
                <span class="info-box-icon d-flex justify-content-center align-items-center p-3 shadow-sm rounded" style="background-color: #ffd100; width: 60px; height: 60px;">
                    <!-- SVG icon for Fungsi Sosial Budaya -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green" class="bi bi-person-circle" viewBox="0 0 16 16">
                        <path d="M3 14s-1 0-1-1 1-3 4-3 4 3 4 3-1 1-1 1H3z"/>
                        <path d="M8 0a7 7 0 1 1 0 14A7 7 0 0 1 8 0zM8 1a6 6 0 1 0 0 12A6 6 0 0 0 8 1z"/>
                    </svg>
                </span>
                <div class="info-box-content mt-3 text-center" style="font-family: 'Poppins', sans-serif;">
                    <span class="info-box-text" style="color: white;">Fungsi Sosial Budaya</span>
                    <span class="info-box-number fw-bold" style="font-size: 16px;">70% Tercapai</span>
                </div>
            </div>
        </a>
    </div>
</div>

                <!-- /.col -->


            </div>

  {{-- ================================================================================== --}}
            <!-- /.col -->
        </div>
        <!--end::Row-->
        </div>
                  <!--end::Container-->
        <!--end::App Content Header-->
        <!--begin::App Content-->
          <!--end::App Content-->
      </main>
      <!--end::App Main-->
    </div>
    </div>


      @include('backend.00_administrator.00_baganterpisah.02_footer')
