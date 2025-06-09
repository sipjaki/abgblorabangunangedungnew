@include('backend.00_administrator.00_baganterpisah.01_header')

<!--begin::Body-->
  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
{{-- ---------------------------------------------------------------------- --}}

@include('backend.00_administrator.00_baganterpisah.04_navbar')
@include('frontend.android.00_fiturmenu.06_alert')
{{-- ---------------------------------------------------------------------- --}}

      @include('backend.00_administrator.00_baganterpisah.03_sidebar')

      <!--begin::App Main-->
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
           @include('backend.00_administrator.00_baganterpisah.10_selamatdatang')
            <!--end::Row-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content Header-->
        <!--begin::App Content-->
        <div class="app-content">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                              </div>
              <!--end::Row-->
            </div>
            <!--end::Container-->
          </div>
          <div class="app-content">
            <!--begin::Container-->
            <div class="container-fluid">
              <!-- Info boxes -->

{{-- atas  --}}

{{-- -------------------------------------------------------- --}}
<div class="row">

   <div class="col-12 col-sm-6 col-md-3">
    <a href="/bebantuanteknisassistensi">

        <div class="info-box shadow-lg rounded-3 p-4" style="background: #000080; color: white; transition: all 0.3s ease;">
            <span class="info-box-icon d-flex justify-content-center align-items-center p-3 shadow-sm rounded" style="background-color: #ffd100; width: 60px; height: 60px;">
                <!-- Icon: Clipboard Check -->
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="green" class="bi bi-clipboard-check" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M10.854 6.354a.5.5 0 0 0-.708-.708L7.5 8.293 6.354 7.146a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z"/>
                    <path d="M4 1.5A1.5 1.5 0 0 0 2.5 3v10A1.5 1.5 0 0 0 4 14.5h8a1.5 1.5 0 0 0 1.5-1.5V3A1.5 1.5 0 0 0 12 1.5H4zm1 1a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 .5.5V3H5v-.5z"/>
                </svg>
            </span>
            <div class="info-box-content mt-3 text-center" style="font-family: 'Poppins', sans-serif;">
                <span class="info-box-text" style="color: white;">Berkas Asistensi</span>
                <span class="info-box-number fw-bold" style="font-size: 16px;">
                    {{ $jumlahDataIdSatu }} Permohonan
                </span>
            </div>
        </div>
    </a>
</div>


    <div class="col-12 col-sm-6 col-md-3">
        <a href="/bebantuanteknis">
            <div class="info-box shadow-lg rounded-3 p-4" style="background: #000080; color: white; transition: all 0.3s ease;">
                <span class="info-box-icon d-flex justify-content-center align-items-center p-3 shadow-sm rounded" style="background-color: #ffd100; width: 60px; height: 60px;">
                    <!-- SVG icon for Tracking -->
               <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="green" class="bi bi-journal-plus" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H6.5v1.5a.5.5 0 0 1-1 0V8H4a.5.5 0 0 1 0-1h1.5V5.5A.5.5 0 0 1 6 5z"/>
  <path d="M3 1.5A1.5 1.5 0 0 0 1.5 3v10A1.5 1.5 0 0 0 3 14.5H13a.5.5 0 0 0 .5-.5v-1h-1v.5H3V3h9.5v.5h1V3a.5.5 0 0 0-.5-.5H3z"/>
  <path d="M14 6.5a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0v-6a.5.5 0 0 1 .5-.5z"/>
  <path d="M12.5 8a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5z"/>
</svg>

                </span>
                <div class="info-box-content mt-3 text-center" style="font-family: 'Poppins', sans-serif;">
                    <span class="info-box-text" style="color:white;">Berkas Permohonan Bantek</span>
                    <span class="info-box-number fw-bold" style="font-size: 16px;"> {{$datasemua->total()}}  Permohonan</span>
                </div>
            </div>
        </a>
    </div>


  </div>

  <style>
    .info-box:hover {
      background-color: white !important;
      color: #000080 !important;
      transform: translateY(-10px);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
    }
    .info-box-icon svg {
      fill: green; /* Green color for SVG icons */
    }
    .info-box-text, .info-box-number {
      color: white;
    }
    .info-box:hover .info-box-text,
    .info-box:hover .info-box-number {
      color: #000080 !important;
    }
  </style>

              {{-- -------------------------------------------------------- --}}


              {{-- -------------------------------------------------------- --}}

              <!--begin::Row-->

          </div>
          <!--end::Container-->
        </div>
        <!--end::App Content-->

          <!--end::App Content-->
      </main>
      <!--end::App Main-->


      @include('backend.00_administrator.00_baganterpisah.02_footer')
