@include('backend.00_administrator.00_baganterpisah.01_header')

<!--begin::Body-->
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">

        @include('backend.00_administrator.00_baganterpisah.04_navbar')
        @include('backend.00_administrator.00_baganterpisah.09_button')

        @include('backend.00_administrator.00_baganterpisah.03_sidebar')
        @include('frontend.android.00_fiturmenu.06_alert')

        <!--begin::App Main-->
        <main class="app-main" style="background: linear-gradient(to bottom, #ffffff, #ffffff); margin: 0; padding: 0; position: relative; left: 0;">

            <!--begin::App Content Header-->
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        @include('backend.00_administrator.00_baganterpisah.10_selamatdatang')
                    </div>
                </div>
            </div>

            <br>

            <div class="container-fluid">
                <div class="putih row" style="margin-right: 10px; margin-left:10px;">
                    <div class="card mb-4">

                        <div class="card-header">
                            <div>
                                @include('backend.00_administrator.00_baganterpisah.11_judulhalaman')
                            </div>

                            <div style="display: flex; justify-content: flex-end; margin-bottom: 5px;">
                                <!-- Tombol aksi (jika ada) -->
                            </div>
                        </div>

                        <hr>

                        <div class="card-body p-0">

                            <div class="col-md-12">
                                <!-- CSS Modern (digabung) -->
                                <div class="col-md-12">
                                    <div class="doc-grid mb-5">
                                        <!-- Header Section -->
                                        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">

                                            <!-- JUDUL -->
                                            <div class="d-flex align-items-center mb-3 mb-md-0">
                                                <div class="me-3">
                                                    <i class="bi bi-clipboard-data-fill text-primary" style="font-size: 2rem;"></i>
                                                </div>
                                                <div>
                                                    <h4 class="mb-1" style="color: #1f2937; font-size: 1.5rem;">
                                                        Hitung Analisa Tingkat Kerusakan Bangunan Gedung
                                                    </h4>
                                                </div>
                                            </div>

                                            <!-- BUTTON AKSI -->
                                            <div class="d-flex gap-2">
                                                <a href="{{ route('bebantekpembongkaranshow', [urlencode($data->namapemilik), $data->id]) }}" class="button-modern">
                                                    <i class="bi bi-arrow-left me-1"></i> Kembali
                                                </a>
                                                <a href="{{ route('bebantekpembongkaran') }}" class="button-berkas">
                                                    <i class="bi bi-folder2-open me-1"></i> Data Dasar
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div> <!-- /.card-body -->

{{-- ======================================================================================= --}}

<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white text-center py-3">
            <h4>FORMULIR PENILAIAN KERUSAKAN BANGUNAN</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('penilaian.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="mb-2">
                            <label class="form-label font-weight-bold">Tanggal Terbit</label>
                            <input type="date" name="tanggalterbit" class="form-control" required>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle text-center">
                        <thead class="table-light">
                            <tr>
                                <th rowspan="2" style="width: 5%;">NO</th>
                                <th rowspan="2" style="width: 15%;">KOMPONEN STANDAR</th>
                                <th rowspan="2" style="width: 8%;">BOBOT</th>
                                <th colspan="4">KLASIFIKASI KERUSAKAN (PILIH SALAH SATU)</th>
                                <th rowspan="2" style="width: 25%;">BUKTI FOTO KONDISI</th>
                            </tr>
                            <tr>
                                <th>Tidak Rusak (0.00)</th>
                                <th>Ringan (0.20)</th>
                                <th>Sedang (0.35)</th>
                                <th>Berat (0.70)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $komponents = [
                                    ['name' => 'PONDASI', 'field' => 'pondasi', 'bobot' => '10.00%'],
                                    ['name' => 'STRUKTUR', 'field' => 'struktur', 'bobot' => '33.00%'],
                                    ['name' => 'ATAP', 'field' => 'atap', 'bobot' => '10.00%'],
                                    ['name' => 'LANTAI', 'field' => 'lantai', 'bobot' => '7.00%'],
                                    ['name' => 'DINDING', 'field' => 'dinding', 'bobot' => '10.00%'],
                                    ['name' => 'PLAFON', 'field' => 'plafon', 'bobot' => '7.00%'],
                                    ['name' => 'UTILITAS', 'field' => 'utilitas', 'bobot' => '8.00%'],
                                    ['name' => 'FINISHING', 'field' => 'finishing', 'bobot' => '15.00%'],
                                ];
                            @endphp

                            @foreach($komponents as $index => $comp)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td class="text-start font-weight-bold">{{ $comp['name'] }}</td>
                                <td>{{ $comp['bobot'] }}</td>

                                <td><input type="radio" name="nilai{{ $comp['field'] }}" value="0.00" checked></td>
                                <td><input type="radio" name="nilai{{ $comp['field'] }}" value="0.20"></td>
                                <td><input type="radio" name="nilai{{ $comp['field'] }}" value="0.35"></td>
                                <td><input type="radio" name="nilai{{ $comp['field'] }}" value="0.70"></td>

                                <td>
                                    <div class="input-group input-group-sm mb-1">
                                        <span class="input-group-text">Foto 1</span>
                                        <input type="file" name="fotofor_{{ $comp['field'] }}1" class="form-control">
                                    </div>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">Foto 2</span>
                                        <input type="file" name="fotofor_{{ $comp['field'] }}2" class="form-control">
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row mt-4 pt-3 border-top">
                    <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold">Kepala Dinas Pekerjaan Umum</label>
                        <select name="kepaladinas_id" class="form-select" required>
                            <option value="">-- Pilih Kepala Dinas --</option>
                            @foreach($kepalaDinas as $kadin)
                                <option value="{{ $kadin->id }}">{{ $kadin->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label font-weight-bold">Tim Survey (Petugas Dinas)</label>
                        <div class="row g-2">
                            @for($i = 1; $i <= 4; $i++)
                            <div class="col-6 mb-2">
                                <select name="timsurvey{{ $i }_id}" class="form-select form-select-sm">
                                    <option value="">-- Petugas {{ $i }} --</option>
                                    @foreach($petugasDinas as $petugas)
                                        <option value="{{ $petugas->id }}">{{ $petugas->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="reset" class="btn btn-secondary me-2">Reset Formulir</button>
                    <button type="submit" class="btn btn-primary px-4">Simpan & Hitung Analisa</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ======================================================================================= --}}
                        <!-- Modal Konfirmasi Hapus -->
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <img src="/assets/icon/pupr.png" alt="" width="30" style="margin-right: 10px;">
                                        <h5 class="modal-title" id="deleteModalLabel">DPUPR Kabupaten Blora</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah Anda Ingin Menghapus Data : <span id="itemName"></span>?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                        <form id="deleteForm" method="POST" action="">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div> <!-- /.card -->
                </div> <!-- /.row -->
            </div> <!-- /.container-fluid -->

        </main>
        <!--end::App Main-->

    </div>
    <!--end::App Wrapper-->

    @include('backend.00_administrator.00_baganterpisah.02_footer')

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
    <script>
        function exportTableToExcel(tableID, filename = '') {
            var table = document.getElementById(tableID);
            var wb = XLSX.utils.table_to_book(table, { sheet: "Sheet 1" });
            return XLSX.writeFile(wb, filename + '.xlsx');
        }
    </script>

</body>
