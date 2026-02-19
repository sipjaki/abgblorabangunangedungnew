
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        @include('backend.00_administrator.00_baganterpisah.04_navbar')
        @include('backend.00_administrator.00_baganterpisah.09_button')
        @include('backend.00_administrator.00_baganterpisah.03_sidebar')
        @include('frontend.android.00_fiturmenu.06_alert')

        <!--begin::App Main-->
        <main class="app-main">
            <!--begin::App Content Header-->
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
                    <div>
                    @include('backend.00_administrator.00_baganterpisah.11_judulhalaman')
            </div>

            <div class="card-body" style="background: white; color: black !important;">
                <!-- Judul -->
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-primary" style="color: black !important;">Tracking Berkas Permohonan PBG / SLF</h3>
                    <p class="text-muted" style="color: black !important;">Masukkan Nomor Registrasi SIMBG Saudara</p>
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

        </main>
        <!--end::App Main-->
    </div>
    <!--end::App Wrapper-->

    @include('backend.00_administrator.00_baganterpisah.02_footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
    <script>
        function exportTableToExcel(tableID, filename = '') {
            var table = document.getElementById(tableID);
            var wb = XLSX.utils.table_to_book(table, {sheet:"Sheet 1"});
            return XLSX.writeFile(wb, filename + '.xlsx');
        }
    </script>
