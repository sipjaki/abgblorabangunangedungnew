<!doctype html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Pencarian Berkas Permohonan PBG/SLF</title>
    <!--begin::Primary Meta Tags-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="title" content="Bangunan Gedung  Kabupaten Blora Provinsi Jawa Tengah" />
    <meta name="author" content="ColorlibHQ" />
    <meta name="description" content="Bangunan Gedung Kabupaten Blora Provinsi Jawa Tengah" />
    <meta name="keywords" content="Bangunan Gedung Kabupaten Blora Provinsi Jawa Tengah" />
    <!--end::Primary Meta Tags-->

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous" />
    <!--end::Fonts-->

    <!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.10.1/styles/overlayscrollbars.min.css" integrity="sha256-tZHrRjVqNSRyWg2wbppGnT833E/Ys0DHWGwT04GiqQg=" crossorigin="anonymous" />
    <!--end::Third Party Plugin(OverlayScrollbars)-->

    <!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" integrity="sha256-9kPW/n5nn53j4WMRYAxe9c1rCY96Oogo/MKSVdKzPmI=" crossorigin="anonymous" />
    <!--end::Third Party Plugin(Bootstrap Icons)-->

    <!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="/assets/00_administrator/dist/css/adminlte.css" />
    <!--end::Required Plugin(AdminLTE)-->

    <!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous" />

    <!-- jsvectormap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="icon" href="/assets/abgblora/logo/logokabupatenblora.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1e3a8a 0%, #1e40af 50%, #3b82f6 100%);
            min-height: 100vh;
            color: #ffffff;
        }

        .container {
            max-width: 1400px;
            margin: 0 auto;
            padding: 20px;
        }

        .zebra-table {
            width: 100%;
            border-collapse: collapse;
            font-family: 'Poppins', sans-serif;
            font-size: 14px;
            border: 1px solid #e5e7eb;
        }

        .zebra-table th {
            background-color: #ADD8E6; /* biru muda */
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

        .app-main {
            background: linear-gradient(to bottom, #7de3f1, #ffffff);
            margin: 0;
            padding: 0;
            position: relative;
            left: 0;
        }

        .button-baru {
            background-color: #000080;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button-baru:hover {
            background-color: #1e40af;
        }
    </style>
</head>

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

          <div class="container-fluid">
    <div class="putih row" style="margin-right: 10px; margin-left:10px;">
        <div class="card mb-4">
            <div class="card-header">
                <div style="
                    margin-bottom:10px;
                    font-weight: 900;
                    font-size: 16px;
                    text-align: center;
                    background: linear-gradient(135deg, #000080, #000080);
                    color: white;
                    padding: 10px 25px;
                    border-radius: 10px;
                    display: inline-block;
                    box-shadow: 3px 3px 10px rgba(0, 0, 0, 0.2);
                    width: 100%;
                ">
                    <span style="font-family: 'Poppins', sans-serif;">📌 Halaman : Berkas Pencarian Permohonan PBG/SLF</span>
                </div>
            </div>

            <div class="container py-4">
                <!-- Title Halaman -->
                <div class="text-center mb-4">
                    <h3 class="fw-bold text-primary">Tracking Berkas Permohonan PBG / SLF</h3>
                    <p class="text-muted">Masukkan Nomor Registrasi SIMBG untuk melacak status permohonan Anda</p>
                </div>

                <!-- Form Pencarian -->
                <form id="formPencarian" class="row g-3 justify-content-center mb-4">
                    <div class="col-md-6">
                        <input type="text" name="noregissimbg" id="noregissimbg"
                               class="form-control"
                               placeholder="Contoh: PBG-2024-XYZ"
                               required>
                        <div id="errorNoreg" class="invalid-feedback d-none"></div>
                    </div>
                    <div class="col-auto">
                        <button type="submit" class="button-baru btn btn-primary">
                            <i class="bi bi-search"></i> Cari
                        </button>
                    </div>
                </form>

                <!-- Tempat hasil pencarian akan tampil -->
                <div id="hasilPencarian"></div>
            </div>
        </div>
    </div>
</div>

{{-- JavaScript --}}
<script>
document.getElementById('formPencarian').addEventListener('submit', function(e) {
    e.preventDefault();

    const noregInput = document.getElementById('noregissimbg');
    const noreg = noregInput.value.trim();
    const hasilDiv = document.getElementById('hasilPencarian');
    const errorDiv = document.getElementById('errorNoreg');

    // Reset error message & styling
    errorDiv.classList.add('d-none');
    noregInput.classList.remove('is-invalid');
    hasilDiv.innerHTML = '';

    if (!noreg) {
        errorDiv.textContent = 'Nomor registrasi wajib diisi!';
        errorDiv.classList.remove('d-none');
        noregInput.classList.add('is-invalid');
        return;
    }

    hasilDiv.innerHTML = '<p class="text-center">Loading...</p>';

    fetch(`/api/tracking-pbg?noregissimbg=${encodeURIComponent(noreg)}`, {
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(response => {
        if (!response.ok) {
            if(response.status === 404) throw new Error('Data tidak ditemukan untuk nomor registrasi: ' + noreg);
            else throw new Error('Terjadi kesalahan saat mengambil data');
        }
        return response.json();
    })
    .then(data => {
        let html = `
            <div class="card shadow-lg border-0 mb-4">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4 text-success fw-bold">Status Permohonan</h5>
                    <div class="text-center mb-4">
                        <p><strong>Nomor Registrasi:</strong> ${data.noregissimbg}</p>
                        <p><strong>Nama Pemohon:</strong> ${data.namapemohon || 'Tidak Tersedia'}</p>
                    </div>
                    <div>
                        <p><strong>Status:</strong> ${data.status || 'Tidak tersedia'}</p>
                        <!-- Kalau ada detail lain bisa ditambah di sini -->
                    </div>
                </div>
            </div>
        `;
        hasilDiv.innerHTML = html;
    })
    .catch(err => {
        hasilDiv.innerHTML = `<div class="alert alert-danger text-center">${err.message}</div>`;
    });
});
</script>
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
</body>
</html>
