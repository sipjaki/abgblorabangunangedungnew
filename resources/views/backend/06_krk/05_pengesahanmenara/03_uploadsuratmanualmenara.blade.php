<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Document' }}</title>

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .zebra-table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            border: 1px solid #e5e7eb;
        }

        .zebra-table th {
            background-color: #ADD8E6;
            color: black;
            text-align: center;
            padding: 8px 12px;
            border: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        .zebra-table td {
            text-align: center;
            padding: 8px 12px;
            border: 1px solid #e5e7eb;
            white-space: nowrap;
        }

        .zebra-table tbody tr:nth-child(odd) {
            background-color: #ffffff;
        }

        .zebra-table tbody tr:nth-child(even) {
            background-color: #f1f1f1;
        }

        .zebra-table tbody tr:hover {
            background-color: #ffd100 !important;
        }

        th {
            background-color: #ADD8E6;
        }

        /* Button Styles */
        .button-baru {
            background: linear-gradient(135deg, #4CAF50, #2E7D32);
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
        }

        .button-baru:hover {
            background: linear-gradient(135deg, #2E7D32, #4CAF50);
            transform: translateY(-2px);
        }

        .button-baru i {
            margin-right: 8px;
        }

        /* Modal Styles */
        #confirmModal {
            display: none;
            position: fixed;
            inset: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background: white;
            padding: 24px 30px;
            border-radius: 12px;
            max-width: 400px;
            width: 90%;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        }

        /* Form Styles */
        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }

        .form-control {
            width: 100%;
            padding: 8px 12px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 14px;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 12px;
            margin-top: 4px;
        }

        /* Preview Container */
        #previewContainer {
            margin-top: 16px;
            border: 1px solid #ddd;
            border-radius: 6px;
            padding: 12px;
        }

        #previewIframe {
            width: 100%;
            height: 400px;
            border: none;
        }

        /* Section Header */
        .section-header {
            text-align: center;
            margin: 20px 0;
        }

        .section-header h5 {
            color: #0d6efd;
            font-weight: bold;
            font-size: 16px;
        }

        .hr-custom {
            border-top: 2px dashed #0d6efd;
            width: 60%;
            margin: auto;
        }
    </style>
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!-- Header Includes -->
    @include('backend.00_administrator.00_baganterpisah.01_header')

    <!-- App Wrapper -->
    <div class="app-wrapper">
        <!-- Navigation Includes -->
        @include('backend.00_administrator.00_baganterpisah.04_navbar')
        @include('backend.00_administrator.00_baganterpisah.09_button')

        <!-- Sidebar Includes -->
        @include('backend.00_administrator.00_baganterpisah.03_sidebar')
        @include('frontend.android.00_fiturmenu.06_alert')

        <!-- Main Content -->
        <main class="app-main" style="background: linear-gradient(to bottom, #7de3f1, #ffffff); margin: 0; padding: 0; position: relative; left: 0;">
            <!-- Content Header -->
            <div class="app-content-header">
                <div class="container-fluid">
                    <div class="row">
                        @include('backend.00_administrator.00_baganterpisah.10_selamatdatang')
                    </div>
                </div>
            </div>

            <!-- Main Content Container -->
            <div class="container-fluid">
                <div class="putih row" style="margin-right: 10px; margin-left:10px;">
                    <div class="card mb-4">
                        <!-- Card Header -->
                        <div class="card-header">
                            <div style="margin-bottom:10px; font-weight: 900; font-size: 16px; text-align: center; background: linear-gradient(135deg, #000080, #000080); color: white; padding: 10px 25px; border-radius: 10px; display: inline-block; box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2); width: 100%;">
                                <span style="font-family: 'Poppins', sans-serif;">📌 Halaman : {{$title}}</span>
                            </div>

                            <!-- Back Button -->
                            <div style="display: flex; justify-content: flex-end; margin-bottom: 5px;">
                                @canany(['pemohon'])
                                    <button type="button" onclick="window.location.href='{{ url('/bekrkmenarapemohon') }}';" class="button-newvalidasi">
                                        <i class="bi bi-arrow-left mr-2"></i> Kembali
                                    </button>
                                @endcanany

                                @canany(['superadmin', 'admin'])
                                    <button type="button" onclick="window.location.href='{{ url('/bekrkmenaratelkom') }}';" class="button-newvalidasi">
                                        <i class="bi bi-arrow-left mr-2"></i> Kembali
                                    </button>
                                @endcanany
                            </div>
                        </div>

                        <br>
                        <hr>

                        <!-- Card Body -->
                        <div class="card-body p-0">
                            <div class="col-md-12">
                                <!-- Form -->
                                <form action="{{ route('dokuploadkrkusahanew', $data->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="card-body">
                                        <div class="row">
                                            <!-- Section Header -->
                                            @canany(['pemohon'])
                                                <div class="section-header">
                                                    <hr class="hr-custom my-4">
                                                    <h5>
                                                        <i class="bi bi-file-earmark-text" style="margin-right: 6px;"></i>
                                                        Dokumen KRK Saudara
                                                    </h5>
                                                    <hr class="hr-custom my-4">
                                                </div>
                                            @endcanany

                                            @canany(['superadmin', 'admin'])
                                                <div class="section-header">
                                                    <hr class="hr-custom my-4">
                                                    <h5>
                                                        <i class="bi bi-upload" style="margin-right: 6px;"></i>
                                                        Upload Surat
                                                    </h5>
                                                    <hr class="hr-custom my-4">
                                                </div>
                                            @endcanany

                                            <!-- Form Input -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        @canany(['superadmin', 'admin'])
                                                            <label class="form-label" for="suratuploadmanual">
                                                                <i class="bi bi-file-earmark-pdf" style="color: darkred; margin-right: 8px;"></i>
                                                                Upload Dokumen Final KRK
                                                            </label>

                                                            <input type="file" id="suratuploadmanual" name="suratuploadmanual" accept="application/pdf"
                                                                   class="form-control @error('suratuploadmanual') is-invalid @enderror"
                                                                   onchange="previewPDF(event)" />
                                                        @endcanany

                                                        @error('suratuploadmanual')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @enderror

                                                        <!-- PDF Preview -->
                                                        <div class="mt-3" id="previewContainer" style="display: none;">
                                                            <label class="fw-bold">Preview Dokumen Final KRK</label>
                                                            <iframe id="previewIframe" src="" style="width: 100%; height: 400px; border: 1px solid #ccc; border-radius: 6px;"></iframe>
                                                        </div>

                                                        <!-- Existing Document -->
                                                        <div id="previewMessage" class="mt-3" style="color: grey; font-style: italic;">
                                                            @if (!empty($data->suratuploadmanual))
                                                                <div class="space-y-2">
                                                                    <label class="fw-bold">Dokumen Final KRK (Tersimpan)</label>
                                                                    <iframe src="{{ asset($data->suratuploadmanual) }}" style="width: 100%; height: 400px; border: 1px solid #ccc; border-radius: 6px;"></iframe>

                                                                    <br>
                                                                    <!-- Download Button -->
                                                                    <a href="{{ asset($data->suratuploadmanual) }}" download class="button-berkas">
                                                                        <i class="bi bi-download mr-2"></i> Download Berkas KRK
                                                                    </a>
                                                                </div>
                                                            @else
                                                                @canany(['superadmin', 'admin'])
                                                                    Belum Upload Berkas, Silahkan Upload Dokumen Final KRK.
                                                                @endcanany

                                                                @canany(['pemohon'])
                                                                    Belum Ada Dokumen KRK Saudara, Silahkan Menunggu DPUPR Kabupaten Blora.
                                                                @endcanany
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div style="display: flex; justify-content: flex-end; margin-bottom:20px;">
                                        <div class="flex justify-end">
                                            <button class="button-baru" type="button" onclick="openModal()">
                                                <i class="bi bi-save" style="margin-right: 5px;"></i>
                                                <span style="font-family: 'Poppins', sans-serif;">Simpan</span>
                                            </button>
                                        </div>
                                    </div>

                                    <!-- Confirmation Modal -->
                                    <div id="confirmModal">
                                        <div class="modal-content">
                                            <p style="font-size: 16px; font-weight: 600; margin-bottom: 20px;">
                                                Apakah Anda ingin upload Dok Final KRK ?
                                            </p>

                                            <!-- Buttons -->
                                            <div style="display: flex; justify-content: center; gap: 12px;">
                                                <button id="confirmSubmitBtn" onclick="submitForm()"
                                                        style="background-color: #10B981; color: white; padding: 8px 16px; border-radius: 8px; border: none; transition: 0.3s; display: flex; align-items: center; gap: 6px;"
                                                        onmouseover="this.style.backgroundColor='white'; this.style.color='black'; this.querySelector('svg').style.fill='black';"
                                                        onmouseout="this.style.backgroundColor='#10B981'; this.style.color='white'; this.querySelector('svg').style.fill='white';">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 448 512" fill="white">
                                                        <path d="M446.7 68.8c-5.7-4.8-13.8-5.7-20.3-2.2L26.1 263.5c-7.2 3.7-11.4 11.5-10.4 19.5s6.7 14.5 14.4 16.5l85.1 23.3 40.6 98.8c2.9 7.1 9.6 11.7 17.1 11.7h.4c7.7-.2 14.4-5.1 16.8-12.3l33.2-96.5 109.7 88.1c3.5 2.8 7.9 4.3 12.3 4.3 2.5 0 5-.5 7.4-1.4 6.4-2.5 11.2-8.2 12.7-15.1L448 89.4c1.3-7.6-1.6-15.3-7.3-20.6z"/>
                                                    </svg>
                                                    Ya
                                                </button>

                                                <button type="button" onclick="closeModal()"
                                                        style="background-color: #EF4444; color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer; transition: 0.3s; display: flex; align-items: center; gap: 6px;"
                                                        onmouseover="this.style.backgroundColor='white'; this.style.color='black'; this.querySelector('svg').style.fill='black';"
                                                        onmouseout="this.style.backgroundColor='#EF4444'; this.style.color='white'; this.querySelector('svg').style.fill='white';">
                                                    <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 384 512" fill="white">
                                                        <path d="M231.6 256l142.7-142.7c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L186.3 210.7 43.6 68c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L141 256 0 397.7c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L186.3 301.3l142.7 142.7c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L231.6 256z"/>
                                                    </svg>
                                                    Batal
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Footer Include -->
    @include('backend.00_administrator.00_baganterpisah.02_footer')

    <!-- Scripts -->
    <script>
        // PDF Preview Function
        function previewPDF(event) {
            const file = event.target.files[0];
            const container = document.getElementById('previewContainer');
            const iframe = document.getElementById('previewIframe');
            const message = document.getElementById('previewMessage');

            if (file && file.type === "application/pdf") {
                const fileURL = URL.createObjectURL(file);
                iframe.src = fileURL;
                container.style.display = 'block';
                message.style.display = 'none';
            } else {
                iframe.src = '';
                container.style.display = 'none';
                message.style.display = 'block';
                message.textContent = 'File harus berupa format PDF.';
            }
        }

        // Modal Functions
        function openModal() {
            const modal = document.getElementById("confirmModal");
            if (modal) modal.style.display = "flex";
        }

        function closeModal() {
            const modal = document.getElementById("confirmModal");
            if (modal) modal.style.display = "none";
        }

        function submitForm() {
            document.querySelector('form').submit();
        }
    </script>

    <!-- Bootstrap JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
