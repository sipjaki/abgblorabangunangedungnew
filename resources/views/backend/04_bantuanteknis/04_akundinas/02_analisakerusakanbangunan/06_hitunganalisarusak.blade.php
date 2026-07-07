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
                                <style>
                                    .doc-grid {
                                        background: #ffffff;
                                        border-radius: 15px;
                                        padding: 25px;
                                        box-shadow: 0 5px 20px rgba(0,0,0,0.08);
                                        border: 1px solid #e3e6f0;
                                    }

                                    .doc-card {
                                        background: #fff;
                                        border-radius: 12px;
                                        padding: 25px;
                                        height: 100%;
                                        transition: all 0.3s ease;
                                        border: 2px solid #eef2ff;
                                        position: relative;
                                        overflow: hidden;
                                        margin-bottom: 20px;
                                    }

                                    .doc-card:hover {
                                        transform: translateY(-5px);
                                        box-shadow: 0 10px 25px rgba(59, 130, 246, 0.15);
                                        border-color: #3b82f6;
                                    }

                                    .doc-icon {
                                        width: 70px;
                                        height: 70px;
                                        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
                                        border-radius: 12px;
                                        display: flex;
                                        align-items: center;
                                        justify-content: center;
                                        margin-bottom: 20px;
                                        color: white;
                                        font-size: 1.8rem;
                                        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
                                    }

                                    .doc-title {
                                        margin-bottom: 25px;
                                    }

                                    .doc-title h4 {
                                        font-weight: 600;
                                        color: #1f2937;
                                        font-size: 1.3rem;
                                        line-height: 1.4;
                                        margin-bottom: 5px;
                                    }

                                    .doc-title p {
                                        color: #6b7280;
                                        font-size: 0.9rem;
                                        margin: 0;
                                    }

                                    .button-container {
                                        display: flex;
                                        flex-direction: column;
                                        gap: 12px;
                                        margin-top: 20px;
                                    }

                                    .form-modern {
                                        margin-bottom: 1.5rem;
                                    }

                                    .form-label-modern {
                                        display: flex;
                                        align-items: center;
                                        font-weight: 500;
                                        color: #374151;
                                        margin-bottom: 0.5rem;
                                        font-size: 0.9rem;
                                    }

                                    .form-label-modern i {
                                        margin-right: 0.5rem;
                                        font-size: 1.1rem;
                                    }

                                    .form-control {
                                        border: 1px solid #d1d5db;
                                        border-radius: 8px;
                                        padding: 0.75rem 1rem;
                                        transition: all 0.3s;
                                    }

                                    .form-control:focus {
                                        border-color: #3b82f6;
                                        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
                                    }

                                    .form-select {
                                        border: 1px solid #d1d5db;
                                        border-radius: 8px;
                                        padding: 0.75rem 1rem;
                                        transition: all 0.3s;
                                    }

                                    .form-select:focus {
                                        border-color: #3b82f6;
                                        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
                                    }

                                    .section-header {
                                        font-weight: 600;
                                        color: #1f2937;
                                        margin: 2rem 0 1.5rem 0;
                                        padding-bottom: 0.75rem;
                                        border-bottom: 2px solid #e5e7eb;
                                        font-size: 1.1rem;
                                    }

                                    @media (max-width: 768px) {
                                        .doc-card {
                                            padding: 20px;
                                        }
                                        .doc-icon {
                                            width: 60px;
                                            height: 60px;
                                            font-size: 1.5rem;
                                        }
                                        .doc-title h4 {
                                            font-size: 1.1rem;
                                        }
                                        .button-container {
                                            flex-direction: column;
                                        }
                                    }
                                </style>

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
                                                        Dokumen Informasi Details Data Bangunan Gedung
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

                        <br><br>

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
