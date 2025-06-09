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
      <main class="app-main">
        <!--begin::App Content Header-->
        <div class="app-content-header">
          <!--begin::Container-->
          <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">

              <div class="col-sm-12"><h3 class="mb-0">Selamat datang ! <span style="color: black; font-weight:800;" > {{ Auth::user()->name }}</span> di Dashboard <span style="color: black; font-weight:800;"> {{ Auth::user()->statusadmin->statusadmin }} </span>  Sistem Informasi Pembina Jasa Konstruksi Kab Blora</h3></div>

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
                    <a href="/beinformasiopd">
                        <div class="info-box"
                             style="transition: background-color 0.3s, color 0.3s; background-color: #156f2a; color: white;"
                             onmouseover="this.style.backgroundColor='#ffffff'; this.style.color='black'; this.querySelector('.info-box-text').style.color='black'; this.querySelector('.progress-description').style.color='black';"
                             onmouseout="this.style.backgroundColor='#156f2a'; this.style.color='white'; this.querySelector('.info-box-text').style.color='white'; this.querySelector('.progress-description').style.color='white';">
                            <span class="info-box-icon">
                                <img src="/assets/icon/pupr.png" alt="" width="40">
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Informasi Judul OPD</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description"> Pengaturan </span>
                            </div>
                        </div>
                    </a>

                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-12">
                    <a href="/beinfoopd">
                        <div class="info-box"
                             style="transition: background-color 0.3s, color 0.3s; background-color: #156f2a; color: white;"
                             onmouseover="this.style.backgroundColor='#ffffff'; this.style.color='black'; this.querySelector('.info-box-text').style.color='black'; this.querySelector('.progress-description').style.color='black';"
                             onmouseout="this.style.backgroundColor='#156f2a'; this.style.color='white'; this.querySelector('.info-box-text').style.color='white'; this.querySelector('.progress-description').style.color='white';">
                            <span class="info-box-icon">
                                <img src="/assets/icon/pupr.png" alt="" width="40">
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Informasi OPD</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description"> Pengaturan </span>
                            </div>
                        </div>
                    </a>

                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-12">
                    <a href="/bekepaladinas">
                        <div class="info-box"
                             style="transition: background-color 0.3s, color 0.3s; background-color: #156f2a; color: white;"
                             onmouseover="this.style.backgroundColor='#ffffff'; this.style.color='black'; this.querySelector('.info-box-text').style.color='black'; this.querySelector('.progress-description').style.color='black';"
                             onmouseout="this.style.backgroundColor='#156f2a'; this.style.color='white'; this.querySelector('.info-box-text').style.color='white'; this.querySelector('.progress-description').style.color='white';">
                            <span class="info-box-icon">
                                <img src="/assets/icon/pupr.png" alt="" width="40">
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Informasi Kepala Dinas</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description"> Pengaturan </span>
                            </div>
                        </div>
                    </a>

                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-12">
                    <a href="/bekabid">
                        <div class="info-box"
                             style="transition: background-color 0.3s, color 0.3s; background-color: #156f2a; color: white;"
                             onmouseover="this.style.backgroundColor='#ffffff'; this.style.color='black'; this.querySelector('.info-box-text').style.color='black'; this.querySelector('.progress-description').style.color='black';"
                             onmouseout="this.style.backgroundColor='#156f2a'; this.style.color='white'; this.querySelector('.info-box-text').style.color='white'; this.querySelector('.progress-description').style.color='white';">
                            <span class="info-box-icon">
                                <img src="/assets/icon/pupr.png" alt="" width="40">
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Informasi Kepala Bidang</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description"> Pengaturan </span>
                            </div>
                        </div>
                    </a>

                </div>
                <!-- /.col -->


            </div>


            {{-- ================================================================================================= --}}

            <div class="row">

                <div class="col-md-3 col-sm-6 col-12">
                    <a href="/besubbid">
                        <div class="info-box"
                             style="transition: background-color 0.3s, color 0.3s; background-color: #156f2a; color: white;"
                             onmouseover="this.style.backgroundColor='#ffffff'; this.style.color='black'; this.querySelector('.info-box-text').style.color='black'; this.querySelector('.progress-description').style.color='black';"
                             onmouseout="this.style.backgroundColor='#156f2a'; this.style.color='white'; this.querySelector('.info-box-text').style.color='white'; this.querySelector('.progress-description').style.color='white';">
                            <span class="info-box-icon">
                                <img src="/assets/icon/pupr.png" alt="" width="40">
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Informasi Sub Koord Bangunan Gedung</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description"> Pengaturan </span>
                            </div>
                        </div>
                    </a>

                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-12">
                    <a href="/beinformasi">
                        <div class="info-box"
                             style="transition: background-color 0.3s, color 0.3s; background-color: #156f2a; color: white;"
                             onmouseover="this.style.backgroundColor='#ffffff'; this.style.color='black'; this.querySelector('.info-box-text').style.color='black'; this.querySelector('.progress-description').style.color='black';"
                             onmouseout="this.style.backgroundColor='#156f2a'; this.style.color='white'; this.querySelector('.info-box-text').style.color='white'; this.querySelector('.progress-description').style.color='white';">
                            <span class="info-box-icon">
                                <img src="/assets/icon/pupr.png" alt="" width="40">
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Keterangan OPD</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description"> Pengaturan </span>
                            </div>
                        </div>
                    </a>

                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-12">
                    <a href="/besipjaki">
                        <div class="info-box"
                             style="transition: background-color 0.3s, color 0.3s; background-color: #156f2a; color: white;"
                             onmouseover="this.style.backgroundColor='#ffffff'; this.style.color='black'; this.querySelector('.info-box-text').style.color='black'; this.querySelector('.progress-description').style.color='black';"
                             onmouseout="this.style.backgroundColor='#156f2a'; this.style.color='white'; this.querySelector('.info-box-text').style.color='white'; this.querySelector('.progress-description').style.color='white';">
                            <span class="info-box-icon">
                                <img src="/assets/icon/pupr.png" alt="" width="40">
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Operator SIPJAKI</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description"> Pengaturan </span>
                            </div>
                        </div>
                    </a>

                </div>
                <!-- /.col -->

                <div class="col-md-3 col-sm-6 col-12">
                    <a href="/bejabatan">
                        <div class="info-box"
                             style="transition: background-color 0.3s, color 0.3s; background-color: #156f2a; color: white;"
                             onmouseover="this.style.backgroundColor='#ffffff'; this.style.color='black'; this.querySelector('.info-box-text').style.color='black'; this.querySelector('.progress-description').style.color='black';"
                             onmouseout="this.style.backgroundColor='#156f2a'; this.style.color='white'; this.querySelector('.info-box-text').style.color='white'; this.querySelector('.progress-description').style.color='white';">
                            <span class="info-box-icon">
                                <img src="/assets/icon/pupr.png" alt="" width="40">
                            </span>
                            <div class="info-box-content">
                                <span class="info-box-text">Personil Jabatan Fungsional</span>
                                <div class="progress">
                                    <div class="progress-bar" style="width: 70%"></div>
                                </div>
                                <span class="progress-description"> Pengaturan </span>
                            </div>
                        </div>
                    </a>

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
