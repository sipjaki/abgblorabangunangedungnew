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
                        </div>
                        <div class="card-body p-0">

                            <style>
                                :root {
                                    --biru-persib: #1e3a8a;
                                    --biru-tua: #1e40af;
                                    --biru-muda: #3b82f6;
                                    --biru-cerah: #60a5fa;
                                    --putih: #ffffff;
                                    --abu-muda: #f8fafc;
                                    --abu: #e2e8f0;
                                    --shadow: rgba(30, 58, 138, 0.1);
                                }

                                .header h1 {
                                    margin: 0;
                                    font-size: 32px;
                                    font-weight: 700;
                                    letter-spacing: -0.5px;
                                    position: relative;
                                    z-index: 1;
                                }

                                .header .icon-title {
                                    font-size: 36px;
                                    margin-right: 15px;
                                }

                                .content {
                                    padding: 40px;
                                }

                                .section {
                                    margin-bottom: 35px;
                                    border: 2px solid var(--abu);
                                    border-radius: 16px;
                                    background: var(--putih);
                                    overflow: hidden;
                                    transition: all 0.3s ease;
                                }

                                .section:hover {
                                    border-color: var(--biru-muda);
                                    box-shadow: 0 8px 25px rgba(59, 130, 246, 0.1);
                                }

                                .section-header {
                                    background: linear-gradient(90deg, var(--biru-muda) 0%, var(--biru-cerah) 100%);
                                    color: var(--putih);
                                    padding: 20px 30px;
                                    font-weight: 600;
                                    font-size: 14px;
                                    display: flex;
                                    align-items: center;
                                    gap: 12px;
                                }

                                .section-header i {
                                    font-size: 22px;
                                }

                                .section-content {
                                    padding: 30px;
                                    display: grid;
                                    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
                                    gap: 25px;
                                }

                                .data-card {
                                    background: linear-gradient(135deg, var(--abu-muda) 0%, #f1f5f9 100%);
                                    padding: 20px;
                                    border-radius: 12px;
                                    border-left: 4px solid var(--biru-muda);
                                    transition: all 0.3s ease;
                                }

                                .data-card:hover {
                                    transform: translateY(-3px);
                                    box-shadow: 0 5px 15px rgba(59, 130, 246, 0.15);
                                }

                                .data-label {
                                    font-weight: 600;
                                    color: var(--biru-tua);
                                    margin-bottom: 8px;
                                    font-size: 14px;
                                    display: flex;
                                    align-items: center;
                                    gap: 8px;
                                }

                                .data-label i {
                                    color: var(--biru-muda);
                                }

                                .data-value {
                                    background: var(--putih);
                                    padding: 14px 18px;
                                    border-radius: 10px;
                                    border: 1px solid var(--abu);
                                    font-size: 16px;
                                    min-height: 52px;
                                    display: flex;
                                    align-items: center;
                                    word-break: break-word;
                                }

                                .file-badge {
                                    display: inline-flex;
                                    align-items: center;
                                    justify-content: center;
                                    gap: 10px;
                                    background: linear-gradient(135deg, var(--biru-muda) 0%, var(--biru-cerah) 100%);
                                    color: var(--putih);
                                    padding: 12px 24px;
                                    border-radius: 12px;
                                    text-decoration: none;
                                    font-weight: 600;
                                    transition: all 0.3s ease;
                                    cursor: pointer;
                                    border: none;
                                    width: 100%;
                                    font-size: 15px;
                                    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.2);
                                }

                                .file-badge:hover {
                                    transform: translateY(-3px);
                                    box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
                                }

                                .file-badge i {
                                    font-size: 18px;
                                }

                                /* Modal Styles - Full Screen */
                                .modal {
                                    display: none;
                                    position: fixed;
                                    top: 0;
                                    left: 0;
                                    width: 100%;
                                    height: 100%;
                                    background: rgba(0, 0, 0, 0.95);
                                    z-index: 9999;
                                    justify-content: center;
                                    align-items: center;
                                }

                                .modal.active {
                                    display: flex;
                                    animation: fadeIn 0.3s ease;
                                }

                                @keyframes fadeIn {
                                    from {
                                        opacity: 0;
                                    }
                                    to {
                                        opacity: 1;
                                    }
                                }

                                .modal-card {
                                    background: var(--putih);
                                    border-radius: 20px;
                                    width: 95%;
                                    height: 95vh;
                                    overflow: hidden;
                                    display: flex;
                                    flex-direction: column;
                                    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
                                    animation: slideUp 0.4s ease;
                                }

                                @keyframes slideUp {
                                    from {
                                        opacity: 0;
                                        transform: translateY(50px);
                                    }
                                    to {
                                        opacity: 1;
                                        transform: translateY(0);
                                    }
                                }

                                .modal-header {
                                    background: linear-gradient(135deg, var(--biru-persib) 0%, var(--biru-tua) 100%);
                                    color: var(--putih);
                                    padding: 25px 30px;
                                    display: flex;
                                    justify-content: space-between;
                                    align-items: center;
                                    flex-shrink: 0;
                                }

                                .modal-title {
                                    font-size: 22px;
                                    font-weight: 700;
                                    display: flex;
                                    align-items: center;
                                    gap: 12px;
                                }

                                .modal-title i {
                                    font-size: 26px;
                                }

                                .modal-close {
                                    background: rgba(255, 255, 255, 0.2);
                                    border: none;
                                    color: var(--putih);
                                    width: 45px;
                                    height: 45px;
                                    border-radius: 50%;
                                    display: flex;
                                    align-items: center;
                                    justify-content: center;
                                    cursor: pointer;
                                    transition: all 0.3s;
                                    font-size: 22px;
                                }

                                .modal-close:hover {
                                    background: rgba(255, 255, 255, 0.3);
                                    transform: rotate(90deg) scale(1.1);
                                }

                                .modal-body {
                                    flex: 1;
                                    padding: 0;
                                    display: flex;
                                    flex-direction: column;
                                    min-height: 0;
                                }

                                .pdf-container {
                                    flex: 1;
                                    position: relative;
                                    min-height: 0;
                                }

                                .pdf-viewer {
                                    width: 100%;
                                    height: 100%;
                                    border: none;
                                    border-radius: 0 0 20px 20px;
                                }

                                .modal-footer {
                                    padding: 20px 30px;
                                    background: linear-gradient(135deg, #f8fafc 0%, var(--abu-muda) 100%);
                                    border-top: 1px solid var(--abu);
                                    display: flex;
                                    justify-content: space-between;
                                    align-items: center;
                                    flex-shrink: 0;
                                }

                                .download-btn {
                                    background: linear-gradient(135deg, var(--biru-muda) 0%, var(--biru-cerah) 100%);
                                    color: var(--putih);
                                    padding: 14px 28px;
                                    border-radius: 12px;
                                    text-decoration: none;
                                    font-weight: 600;
                                    display: flex;
                                    align-items: center;
                                    gap: 10px;
                                    transition: all 0.3s;
                                    font-size: 16px;
                                    box-shadow: 0 4px 15px rgba(59, 130, 246, 0.2);
                                }

                                .download-btn:hover {
                                    transform: translateY(-3px);
                                    box-shadow: 0 8px 20px rgba(59, 130, 246, 0.3);
                                    color: var(--putih);
                                }

                                .download-btn i {
                                    font-size: 20px;
                                }

                                .filename {
                                    color: var(--biru-tua);
                                    font-size: 15px;
                                    font-weight: 500;
                                    background: var(--putih);
                                    padding: 10px 20px;
                                    border-radius: 10px;
                                    border: 1px solid var(--abu);
                                }

                                .filename i {
                                    margin-right: 8px;
                                    color: var(--biru-muda);
                                }

                                @media (max-width: 768px) {
                                    .content {
                                        padding: 25px;
                                    }

                                    .section-content {
                                        grid-template-columns: 1fr;
                                        padding: 20px;
                                    }

                                    .header {
                                        padding: 25px 20px;
                                    }

                                    .header h1 {
                                        font-size: 24px;
                                    }

                                    .modal-card {
                                        width: 100%;
                                        height: 100vh;
                                        border-radius: 0;
                                    }

                                    .modal-header {
                                        padding: 20px;
                                    }

                                    .modal-footer {
                                        padding: 15px 20px;
                                        flex-direction: column;
                                        gap: 15px;
                                    }

                                    .download-btn {
                                        width: 100%;
                                        justify-content: center;
                                    }
                                }
                            </style>

                            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

                            <div class="container">
                                <div class="content">





                                </div>
                            </div>

                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div> <!-- end row -->
            </div> <!-- end container-fluid -->

            <!-- VERIFIKASI BERKAS -->
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <h5 style="color: navy; font-weight:800; font-size:16px;">VERIFIKASI BERKAS KELENGKAPAN</h5>
                        <br>
                        <div class="d-flex gap-2 mt-3">
                            <a href="{{ url()->previous() }}" class="button-modern">
                                ← Kembali
                            </a>
                            <a href="{{ url('/bebantekanalisabgn') }}" class="button-berkas">
                                ← Kembali ke Data Dasar
                            </a>
                        </div>
                        <hr>
                    </div>
                </div>
            </div>

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
