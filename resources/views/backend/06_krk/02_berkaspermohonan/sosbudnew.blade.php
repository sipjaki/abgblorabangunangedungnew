    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        /* Gaya untuk container tabel */
        .table-container {
            overflow-x: auto;
            white-space: nowrap;
            position: relative;
            max-height: 80vh;
            border: 1px solid #dee2e6;
        }

        /* Gaya untuk tabel */
        .zebra-table {
            border-collapse: separate;
            border-spacing: 0;
            border-radius: 20px;
            overflow: hidden;
            width: auto;
            min-width: 100%;
            margin-bottom: 0;
        }

        .zebra-table th {
            background-color: #ADD8E6;
            padding: 12px 15px;
            position: relative;
            border-bottom: 1px solid #dee2e6;
            font-weight: 600;
        }

        .zebra-table td {
            padding: 10px 15px;
            border-bottom: 1px solid #dee2e6;
            background-color: inherit;
        }

        .zebra-table tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .zebra-table tbody tr:hover {
            background-color: #e9ecef;
        }

        /* Gaya untuk kolom tetap - SOLUSI UTAMA */
        .sticky-column {
            position: sticky;
            left: 0;
            z-index: 10;
            background-color: #f8f9fa !important;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        .sticky-column-header {
            position: sticky;
            left: 0;
            z-index: 20;
            background-color: #ADD8E6 !important;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        .sticky-column-2 {
            position: sticky;
            left: var(--col1-width, 80px);
            z-index: 10;
            background-color: #f8f9fa !important;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        .sticky-column-header-2 {
            position: sticky;
            left: var(--col1-width, 80px);
            z-index: 20;
            background-color: #ADD8E6 !important;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        .sticky-column-3 {
            position: sticky;
            left: calc(var(--col1-width, 80px) + var(--col2-width, 200px));
            z-index: 10;
            background-color: #f8f9fa !important;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        .sticky-column-header-3 {
            position: sticky;
            left: calc(var(--col1-width, 80px) + var(--col2-width, 200px));
            z-index: 20;
            background-color: #ADD8E6 !important;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }

        /* Pastikan kolom tetap memiliki lebar yang konsisten */
        .sticky-column,
        .sticky-column-header {
            min-width: 80px;
            max-width: 80px;
            width: 80px;
        }

        .sticky-column-2,
        .sticky-column-header-2 {
            min-width: 200px;
            max-width: 200px;
            width: 200px;
        }

        .sticky-column-3,
        .sticky-column-header-3 {
            min-width: 250px;
            max-width: 250px;
            width: 250px;
        }

        /* Gaya untuk tombol */
        .button-modern {
            background-color: #00378a;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            transition: background-color 0.3s, color 0.3s;
            text-decoration: none;
            white-space: nowrap;
        }

        .button-modern:hover {
            background-color: white;
            color: black;
            border: 1px solid #00378a;
        }

        .button-hijau {
            background-color: #10B981;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            transition: background-color 0.3s, color 0.3s;
            white-space: nowrap;
        }

        .button-merah {
            background-color: #EF4444;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 8px;
            font-size: 14px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            transition: background-color 0.3s, color 0.3s;
            white-space: nowrap;
        }

        /* Animasi untuk data kosong */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .empty-data {
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 30px;
            font-weight: 600;
            font-family: 'Poppins', sans-serif;
            color: #6c757d;
            background-color: #f8f9fa;
            border: 2px dashed #ced4da;
            border-radius: 12px;
            font-size: 16px;
            animation: fadeIn 0.5s ease-in-out;
        }

        /* Pastikan konten di dalam kolom tetap rapi */
        .sticky-column,
        .sticky-column-2,
        .sticky-column-3 {
            white-space: normal;
            word-wrap: break-word;
        }
    </style>
</head>
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
    <!--begin::App Wrapper-->
    <div class="app-wrapper">
        <!-- Header, Navbar, Sidebar, dll -->
        @include('backend.00_administrator.00_baganterpisah.01_header')
        @include('backend.00_administrator.00_baganterpisah.04_navbar')
        @include('backend.00_administrator.00_baganterpisah.09_button')
        @include('backend.00_administrator.00_baganterpisah.03_sidebar')
        @include('frontend.android.00_fiturmenu.06_alert')

        <!--begin::App Main-->
        <main class="app-main" style="
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
                    </div>
                    <!--end::Row-->
                </div>
                <!--end::Container-->
            </div>

            <div class="container-fluid">
                <!--begin::Row-->
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
                                <span style="font-family: 'Poppins', sans-serif;">📌 Halaman : {{$title}}</span>
                            </div>

                            <div style="display: flex; justify-content: flex-end; margin-bottom: 5px;">
                                <div style="display: flex; align-items: center; gap: 8px; margin-right:10px;">
                                    <label for="entries" style="font-weight: 600; font-size: 14px;">Tampilkan data : </label>
                                    <select id="entries" onchange="updateEntries()" style="padding: 8px 12px; border: 1px solid #ccc; border-radius: 8px; background-color: #f9f9f9; font-size: 14px; cursor: pointer;">
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="75">75</option>
                                        <option value="100">100</option>
                                        <option value="150">150</option>
                                        <option value="200">200</option>
                                        <option value="500">500</option>
                                        <option value="1000">1000</option>
                                        <option value="2000">2000</option>
                                    </select>
                                </div>

                                <div style="position: relative; display: inline-block; margin-right:10px;">
                                    <input type="search" id="searchInput" placeholder="Cari Berkas Permohonan ...." onkeyup="searchTable()" style="border: 1px solid #ccc; padding: 10px 20px; font-size: 14px; border-radius: 10px; width: 300px;">
                                    <i class="bi bi-search" style="position: absolute; right: 10px; top: 50%; transform: translateY(-50%); font-size: 16px; color: #888;"></i>
                                </div>

                                <a href="/bekrkindex" style="text-decoration: none;">
                                    <button class="button-modern" style="color: white;">
                                        <i class="bi bi-house-door" style="margin-right: 8px;"></i> Menu Utama
                                    </button>
                                </a>
                                <a href="/bekrkindex" style="text-decoration: none; margin-left: 10px;">
                                    <button class="button-modern" style="color: white;">
                                        <i class="bi bi-arrow-left-circle" style="margin-right: 8px;"></i> Kembali
                                    </button>
                                </a>
                            </div>
                        </div>

                        <div class="card-body p-0">
                            <div class="table-container">
                                <table class="zebra-table">
                                    <thead>
                                        <tr>
                                            <th class="sticky-column-header"><i class="bi bi-list-ol" style="margin-right: 6px;"></i> No</th>
                                            <th class="sticky-column-header-2"><i class="bi bi-person-fill" style="margin-right: 6px;"></i> Pemohon</th>
                                            <th class="sticky-column-header-3"><i class="bi bi-building" style="margin-right: 6px;"></i> Perusahaan/Instansi</th>
                                            <th><i class="bi bi-calendar-event" style="margin-right: 6px;"></i> Tanggal Permohonan</th>
                                            <th><i class="bi bi-telephone-fill" style="margin-right: 6px;"></i> Whatsapp</th>
                                            <th><i class="bi bi-aspect-ratio" style="margin-right: 6px;"></i> Luas Tanah</th>
                                            <th><i class="bi bi-geo-alt-fill" style="margin-right: 6px;"></i> Lokasi Bangunan</th>
                                            <th><i class="bi bi-eye-fill" style="margin-right: 6px;"></i> Lihat Permohonan</th>
                                            <th><i class="bi bi-check2-square" style="margin-right: 6px;"></i> Verifikasi DPUPR</th>
                                            <th><i class="bi bi-file-earmark-text" style="margin-right: 6px;"></i> Dok Lapangan</th>
                                            <th><i class="bi bi-clipboard-check" style="margin-right: 6px;"></i> Status Cek Lapangan</th>
                                            <th><i class="bi bi-database-fill-gear" style="margin-right: 6px;"></i> Olah Data KRK</th>
                                            <th><i class="bi bi-pencil-square" style="margin-right: 6px;"></i> Buat Data KRK</th>
                                            <th><i class="bi bi-database-fill" style="margin-right: 6px;"></i> Status Olah Data</th>
                                            <th><i class="bi bi-archive-fill" style="margin-right: 6px;"></i> Berkas Final KRK</th>
                                            <th><i class="bi bi-check-circle-fill" style="margin-right: 6px;"></i> Selesai</th>
                                            <th><i class="bi bi-gear-fill" style="margin-right: 6px;"></i> Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody id="tableBody">

                                        @forelse ($data as $item)
                                        <tr class="align-middle">
                                            <td class="sticky-column" style="text-align: center;">{{ $loop->iteration }}</td>
                                            <td class="sticky-column-2" style="text-align: left;">{{$item->perorangan}}</td>
                                            <td class="sticky-column-3" style="text-align: left;">{{$item->perusahaan}}</td>
                                        <td style="text-align: center;">
                                        {{ \Carbon\Carbon::parse($item->tanggalpermohonan)->translatedFormat('d F Y') }}
                                    </td>
                                    <td style="text-align: left;">{{$item->notelepon}}</td>
                                    <td style="text-align: center;">
                                        {{ number_format($item->luastanah, 0, ',', '.') }} M²
                                    </td>

                                    <td style="text-align: left;">{{$item->lokasibangunan}}</td>

                                       <td style="text-align: center;">
                <a href="{{ route('bekrksosbudpermohonan.show', $item->id) }}"
                    class="button-modern">
                    <i class="bi bi-eye" style="margin-right: 5px;"></i> LIhat Permohonan
                </a>
            </td>

<!-- Tombol Validasi -->
<td style="text-align: center; display: flex; justify-content: center; align-items: center; height: 60px;">
  @if($item->verifikasi1 == 'lolos')
    <button
        class="button-hijau"
        type="button"
        style="background-color: #10B981; cursor: not-allowed;"
        disabled
    >
        <i class="bi bi-patch-check-fill" style="margin-right: 5px;"></i> Lolos
    </button>
    @elseif($item->verifikasi1 == 'dikembalikan')
        <button class="button-merah" type="button" onclick="openModal({{ $item->id }})" style="background-color: #f8f8fa;">
            <i class="bi bi-x-circle" style="margin-right: 5px;"></i> Dikembalikan
        </button>
    @else
        <button class="button-modern" type="button" onclick="openModal({{ $item->id }})" class="btn btn-secondary">
            <i class="bi bi-patch-check" style="margin-right: 5px;"></i> Validasi
        </button>
    @endif
</td>

<!-- Modal Konfirmasi -->
<div id="confirmModal" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah berkas sudah sesuai?</p>

        <form id="validasiForm" method="POST">
            @csrf
            @method('PUT')

<!-- Tombol Lolos -->
<button
    type="submit"
    name="verifikasi1"
    value="lolos"
    style="background-color: #10B981; color: white; padding: 8px 16px; margin-right: 10px; border-radius: 8px; border: none;"
    onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
    onmouseout="this.style.backgroundColor='#10B981'; this.style.color='white';"
>
    <i class="bi bi-check2-circle" style="margin-right: 6px;"></i> Lolos
</button>

<!-- Tombol Dikembalikan -->
<button
    type="submit"
    name="verifikasi1"
    value="dikembalikan"
    style="background-color: #0400ff; color: white; padding: 8px 16px; border-radius: 8px; border: none;"
    onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
    onmouseout="this.style.backgroundColor='#0400ff'; this.style.color='white';"
>
    <i class="bi bi-x-circle" style="margin-right: 6px;"></i> Dikembalikan
</button>

        </form>

        <br><br>

        <!-- Tombol Batal -->
        <button
    type="button"
    onclick="closeModal()"
    style="background-color: #D1D5DB; padding: 8px 16px; border-radius: 8px; border: none; color: black;"
    onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
    onmouseout="this.style.backgroundColor='#D1D5DB'; this.style.color='black';"
>
    <i class="bi bi-x-circle" style="margin-right: 6px;"></i> Batal
</button>

    </div>
</div>

<script>
    function openModal(itemId) {
        const form = document.getElementById("validasiForm");
        form.action = `/valberkassosbud1/${itemId}`;
        document.getElementById("confirmModal").style.display = "flex";
    }

    function closeModal() {
        document.getElementById("confirmModal").style.display = "none";
    }
</script>

  <td style="text-align: center;">
                <a href="{{ route('doklapkrksosbud.show', $item->id) }}"
                    class="button-modern">
                <i class="bi bi-folder" style="margin-right: 5px;"></i> Lihat Dok Lapangan

                </a>
            </td>

            <td style="text-align: center; display: flex; justify-content: center; align-items: center; height: 60px;">
  @if($item->verifikasi2 == 'sudah')
    <button
        class="button-hijau"
        type="button"
        style="background-color: #10B981; color: white; cursor: not-allowed;"
        disabled
    >
        <i class="bi bi-patch-check-fill" style="margin-right: 5px;"></i> Sudah
    </button>
  @elseif($item->verifikasi2 == 'belum')
    <button class="button-merah" type="button" onclick="openModalVerifikasi2({{ $item->id }})">
        <i class="bi bi-x-circle" style="margin-right: 5px;"></i> Belum
    </button>
  @else
    <button class="button-modern" type="button" onclick="openModalVerifikasi2({{ $item->id }})">
        <i class="bi bi-patch-check" style="margin-right: 5px;"></i> Verifikasi
    </button>
  @endif
</td>

<!-- Modal Verifikasi2 -->
<div id="confirmModalVerifikasi2" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1001; justify-content: center; align-items: center;">
  <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
    <p style="font-size: 16px; font-weight: 600;">Apakah status verifikasi sudah sesuai?</p>

    <form id="verifikasi2Form" method="POST">
      @csrf
      @method('PUT')

      <!-- Tombol Sudah -->
      <button
          type="submit"
          name="verifikasi2"
          value="sudah"
          style="background-color: #10B981; color: white; padding: 8px 16px; margin-right: 10px; border-radius: 8px; border: none;"
          onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
          onmouseout="this.style.backgroundColor='#10B981'; this.style.color='white';"
      >
        <i class="bi bi-check2-circle" style="margin-right: 6px;"></i> Sudah
      </button>

      <!-- Tombol Belum -->
      <button
          type="submit"
          name="verifikasi2"
          value="belum"
          style="background-color: #EF4444; color: white; padding: 8px 16px; border-radius: 8px; border: none;"
          onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
          onmouseout="this.style.backgroundColor='#EF4444'; this.style.color='white';"
      >
        <i class="bi bi-x-circle" style="margin-right: 6px;"></i> Belum
      </button>
    </form>

    <br><br>

    <!-- Tombol Batal -->
    <button
        type="button"
        onclick="closeModalVerifikasi2()"
        style="background-color: #D1D5DB; padding: 8px 16px; border-radius: 8px; border: none; color: black;"
        onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
        onmouseout="this.style.backgroundColor='#D1D5DB'; this.style.color='black';"
    >
      <i class="bi bi-x-circle" style="margin-right: 6px;"></i> Batal
    </button>
  </div>
</div>

<script>
  function openModalVerifikasi2(itemId) {
    const form = document.getElementById("verifikasi2Form");
    form.action = `/valberkassosbud2/${itemId}`;
    document.getElementById("confirmModalVerifikasi2").style.display = "flex";
  }

  function closeModalVerifikasi2() {
    document.getElementById("confirmModalVerifikasi2").style.display = "none";
  }
</script>




            <!-- Tombol Validasi -->



                            <td>
                                  <div style="display: flex; flex-direction: column; align-items: center;">
                                @if (!$item->is_validated)
                                <!-- Tombol Triger Modal -->
                                <button type="button"
                                    onclick="openValidationModal({{ $item->id }})"
                                    class="button-merah">
                                    <i class="bi bi-file-earmark-check" style="margin-right: 5px;"></i> Belum di Setujui !
                                </button>
                                @else
                                <!-- Tombol SUDAH Validasi -->
                                <button class="button-hijau">
                                    <i class="bi bi-check-circle-fill" style="margin-right: 5px;"></i> Silahkan Buat Dok KRK
                                </button>
                                @endif
                                </div>
                            </td>

                            <!-- Modal Validasi -->
<!-- Modal Validasi -->
<div id="validationModal" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px 30px; border-radius: 12px; max-width: 400px; width: 90%; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
        <p style="font-size: 16px; font-weight: 600; margin-bottom: 20px;">
            Apakah Anda yakin <br> ingin menyetujui berkas ini?
        </p>

        <!-- Checkbox -->
        <div style="display: flex; align-items: flex-start; gap: 10px; margin-bottom: 16px; text-align: left;">
            <input type="checkbox" id="confirmValidationCheckbox" style="margin-top: 3px;" onchange="toggleValidationButton()">
            <label for="confirmValidationCheckbox" style="font-size: 14px; color: #6b7280;">
                Saya menyatakan bahwa saya telah <br> memeriksa seluruh data berkas dan <br> menyetujuinya.
            </label>
        </div>

        <!-- Form Submit -->
        <form id="validationForm" method="POST">
            @csrf
            <button id="confirmValidationBtn"
                    type="submit"
                    disabled
                    class="btn-kirim"
                    style="background-color: #dc3545; color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: not-allowed; transition: all 0.3s ease;">
                <i class="bi bi-x-circle-fill" style="margin-right: 5px;"></i> Tidak Bisa Dikirim
            </button>
            <button type="button"
                    onclick="closeValidationModal()"
                    class="btn-cancel-hover"
                    style="background-color: #9CA3AF; color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer; margin-left: 10px;">
                Batal
            </button>
        </form>
    </div>
</div>

<script>
    function openValidationModal(id) {
        const form = document.getElementById('validationForm');
        form.action = `/berkassosbudval/${id}/validate`; // atau route laravel
        document.getElementById('validationModal').style.display = 'flex';
        resetValidationButton(); // reset ke posisi awal
    }

    function closeValidationModal() {
        document.getElementById('validationModal').style.display = 'none';
    }

    function toggleValidationButton() {
        const checkbox = document.getElementById('confirmValidationCheckbox');
        const button = document.getElementById('confirmValidationBtn');

        if (checkbox.checked) {
            button.disabled = false;
            button.style.cursor = 'pointer';
            button.style.backgroundColor = '#1e3a8a'; // navy
            button.innerHTML = '<i class="bi bi-send-fill" style="margin-right: 5px;"></i> Ya, Setujui';
        } else {
            button.disabled = true;
            button.style.cursor = 'not-allowed';
            button.style.backgroundColor = '#dc3545'; // merah
            button.innerHTML = '<i class="bi bi-x-circle-fill" style="margin-right: 5px;"></i> Tidak Bisa Dikirim';
        }
    }

    function resetValidationButton() {
        const checkbox = document.getElementById('confirmValidationCheckbox');
        const button = document.getElementById('confirmValidationBtn');
        checkbox.checked = false;
        button.disabled = true;
        button.style.cursor = 'not-allowed';
        button.style.backgroundColor = '#dc3545';
        button.innerHTML = '<i class="bi bi-x-circle-fill" style="margin-right: 5px;"></i> Tidak Bisa Dikirim';
    }

    // Tutup modal jika klik luar area
    window.addEventListener('click', function(e) {
        const modal = document.getElementById('validationModal');
        if (e.target === modal) {
            closeValidationModal();
        }
    });
</script>
<td style="text-align: center; vertical-align: middle; width: 100%;">
    <div style="display: flex; flex-direction: row; align-items: center; justify-content: center; gap: 10px;">

        @if (!$item->is_validated)
    <!-- BELUM DIVALIDASI, tombol nonaktif merah -->
    <button class="button-merah"
        disabled
        title="Silakan validasi terlebih dahulu"
    >
        <i class="bi bi-pencil-fill" style="margin-right: 5px;"></i> Otomatis
    </button>
@else
    @if($subdata->where('krksosbud_id', $item->id)->count() > 0)
        <!-- SUDAH DIVALIDASI tapi data pengesahan sudah ada, tombol hijau tapi nonaktif -->
        <button class="button-download"
            disabled
            title="Dokumen pengesahan sudah ada"
        >
            <i class="bi bi-pencil-fill" style="margin-right: 5px;"></i> Otomatis
        </button>
    @else
        <!-- SUDAH DIVALIDASI dan data pengesahan belum ada, tombol aktif dan bisa diklik -->
        <a href="{{ route('permohonan.perpengesahansosbud', $item->id) }}" style="text-decoration: none;">
            <button class="button-hijau">
                <i class="bi bi-pencil-fill" style="margin-right: 8px;"></i> Otomatis
            </button>
        </a>
    @endif
@endif

@if (!$item->is_validated)
    <!-- BELUM DIVALIDASI, tombol nonaktif merah -->
    <button class="button-merah"
        disabled
       title="Silakan validasi terlebih dahulu"
    >
        <i class="bi bi-pencil-fill" style="margin-right: 5px;"></i> Manual
    </button>
@else
    @if($subdata->where('krksosbud_id', $item->id)->count() > 0)
        <!-- SUDAH DIVALIDASI tapi data pengesahan sudah ada, tombol hijau tapi nonaktif -->
        <button class="button-download"
            disabled
            title="Dokumen pengesahan sudah ada"
        >
            <i class="bi bi-pencil-fill" style="margin-right: 5px;"></i> Manual
        </button>
    @else
        <!-- SUDAH DIVALIDASI dan data pengesahan belum ada, tombol aktif dan bisa diklik -->
        <a href="{{ route('perpengesahansosbudman', $item->id) }}" style="text-decoration: none;">
            <button class="button-hijau">
                <i class="bi bi-pencil-fill" style="margin-right: 8px;"></i> Manual
            </button>
        </a>
    @endif
@endif


@if($subdata->where('krksosbud_id', $item->id)->count() > 0)
    <a href="{{ route('berkas.perpengesahansosbudber', $item->id) }}"
        class="button-hijau">
        <i class="bi bi-folder" style="margin-right: 5px;"></i> Lihat Dok Pengesahan
    </a>
@else
    <button
        class="button-merah"
        disabled>
        <i class="bi bi-folder-x" style="margin-right: 5px;"></i> Dokumen Belum Ada
    </button>
@endif

    </div>
</td>

<!-- Tombol Validasi -->
<td style="text-align: center; display: flex; justify-content: center; align-items: center; height: 60px;">
  @if($item->verifikasi3 == 'sudah')
    <button
        class="button-hijau"
        type="button"
        style="background-color: #10B981; cursor: not-allowed;"
        disabled
    >
        <i class="bi bi-check2-circle" style="margin-right: 5px;"></i> Sudah
    </button>
  @elseif($item->verifikasi3 == 'belum')
    <button class="button-merah" type="button" onclick="openModal3({{ $item->id }})" style="background-color: #f8f8fa;">
        <i class="bi bi-x-circle" style="margin-right: 5px;"></i> Belum
    </button>
  @else
    <button class="button-modern" type="button" onclick="openModal3({{ $item->id }})">
        <i class="bi bi-patch-check" style="margin-right: 5px;"></i> Validasi
    </button>
  @endif
</td>

<!-- Modal Konfirmasi untuk verifikasi3 -->
<div id="confirmModal3" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah olah data sudah dilakukan?</p>

        <form id="validasiForm3" method="POST">
            @csrf
            @method('PUT')

            <!-- Tombol Sudah -->
            <button
                type="submit"
                name="verifikasi3"
                value="sudah"
                style="background-color: #10B981; color: white; padding: 8px 16px; margin-right: 10px; border-radius: 8px; border: none;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#10B981'; this.style.color='white';"
            >
                <i class="bi bi-check2-circle" style="margin-right: 6px;"></i> Sudah
            </button>

            <!-- Tombol Belum -->
            <button
                type="submit"
                name="verifikasi3"
                value="belum"
                style="background-color: #EF4444; color: white; padding: 8px 16px; border-radius: 8px; border: none;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#EF4444'; this.style.color='white';"
            >
                <i class="bi bi-x-circle" style="margin-right: 6px;"></i> Belum
            </button>
        </form>

        <br><br>

        <!-- Tombol Batal -->
        <button
            type="button"
            onclick="closeModal3()"
            style="background-color: #D1D5DB; padding: 8px 16px; border-radius: 8px; border: none; color: black;"
            onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
            onmouseout="this.style.backgroundColor='#D1D5DB'; this.style.color='black';"
        >
            <i class="bi bi-x-circle" style="margin-right: 6px;"></i> Batal
        </button>
    </div>
</div>

<script>
    function openModal3(itemId) {
        const form = document.getElementById("validasiForm3");
        form.action = `/valberkassosbud3/${itemId}`;
        document.getElementById("confirmModal3").style.display = "flex";
    }

    function closeModal3() {
        document.getElementById("confirmModal3").style.display = "none";
    }
</script>


<td style="text-align: center; vertical-align: middle; width: 100%;">
    <div style="display: flex; flex-direction: row; align-items: center; justify-content: center; gap: 10px;">


@if($subdata->where('krksosbud_id', $item->id)->count() > 0)
    <a href="{{ route('permohonan.permohonankrksosbudfinal', $item->id) }}"
        class="button-hijau">
        <i class="bi bi-folder" style="margin-right: 5px;"></i> Dok TTD Otomatis
    </a>
@else
    <button
        class="button-merah"
        disabled>
        <i class="bi bi-folder-x" style="margin-right: 5px;"></i> Berkas Final Belum Ada
    </button>
@endif

@if($subdata->where('krksosbud_id', $item->id)->count() > 0)
    <a href="{{ route('permohonankrksosbudfinalman', $item->id) }}"
        class="button-hijau">
        <i class="bi bi-folder" style="margin-right: 5px;"></i> Dok TTD Manual
    </a>
@else
    <button
        class="button-merah"
        disabled>
        <i class="bi bi-folder-x" style="margin-right: 5px;"></i> Berkas Final Belum Ada
    </button>
@endif

<a href="{{ route('dokuploadkrksosbud', $item->id) }}"
    class="button-modern">
    <i class="bi bi-folder" style="margin-right: 5px;"></i> Upload Berkas Final

</a>

</div>
</td>


<!-- Tombol Validasi -->
<td style="text-align: center; display: flex; justify-content: center; align-items: center; height: 60px;">
  @if($item->verifikasi4 == 'sudah')
    <button
        class="button-lolos"
        type="button"
        style="background-color: #10B981; cursor: not-allowed;"
        disabled
    >
        <i class="bi bi-check2-circle" style="margin-right: 5px;"></i> Sudah
    </button>
  @elseif($item->verifikasi4 == 'belum')
    <button class="button-dikembalikan" type="button" onclick="openModal4({{ $item->id }})" style="background-color: #f8f8fa;">
        <i class="bi bi-x-circle" style="margin-right: 5px;"></i> Belum
    </button>
  @else
    <button class="button-modern" type="button" onclick="openModal4({{ $item->id }})">
        <i class="bi bi-patch-check" style="margin-right: 5px;"></i> Validasi
    </button>
  @endif
</td>

<!-- Modal Konfirmasi untuk verifikasi4 -->
<div id="confirmModal4" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah permohonan ini sudah selesai?</p>

        <form id="validasiForm4" method="POST">
            @csrf
            @method('PUT')

            <!-- Tombol Sudah -->
            <button
                type="submit"
                name="verifikasi4"
                value="sudah"
                style="background-color: #10B981; color: white; padding: 8px 16px; margin-right: 10px; border-radius: 8px; border: none;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#10B981'; this.style.color='white';"
            >
                <i class="bi bi-check2-circle" style="margin-right: 6px;"></i> Sudah
            </button>

            <!-- Tombol Belum -->
            <button
                type="submit"
                name="verifikasi4"
                value="belum"
                style="background-color: #EF4444; color: white; padding: 8px 16px; border-radius: 8px; border: none;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#EF4444'; this.style.color='white';"
            >
                <i class="bi bi-x-circle" style="margin-right: 6px;"></i> Belum
            </button>
        </form>

        <br><br>

        <!-- Tombol Batal -->
        <button
            type="button"
            onclick="closeModal4()"
            style="background-color: #D1D5DB; padding: 8px 16px; border-radius: 8px; border: none; color: black;"
            onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
            onmouseout="this.style.backgroundColor='#D1D5DB'; this.style.color='black';"
        >
            <i class="bi bi-x-circle" style="margin-right: 6px;"></i> Batal
        </button>
    </div>
</div>

<!-- Script Modal verifikasi4 -->
<script>
    function openModal4(itemId) {
        const form = document.getElementById("validasiForm4");
        form.action = `/valberkassosbud4/${itemId}`;
        document.getElementById("confirmModal4").style.display = "flex";
    }

    function closeModal4() {
        document.getElementById("confirmModal4").style.display = "none";
    }
</script>



                                    <td style="text-align: center; vertical-align: middle;">
                                        {{-- <a href="/bebujkkonstruksi/show/{{$item->namalengkap}}" class="btn btn-sm btn-info me-2" title="Show">
                                            <i class="bi bi-eye"></i>
                                        </a> --}}
                                        {{-- <a href="/bebujkkonstruksi/update/{{$item->id}}" class="btn btn-sm btn-warning me-2" title="Update">
                                            <i class="bi bi-pencil-square"></i>
                                        </a> --}}
                                        <a href="javascript:void(0)" class="button-merah" title="Delete"
                                           data-bs-toggle="modal" data-bs-target="#deleteModal"
                                           data-judul="{{ $item->id }}"
                                           onclick="setDeleteUrl(this)">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>

                                </tr>
                                  @empty
    <tr>
    <td colspan="100%"> {{-- Memenuhi semua kolom --}}
            <div style="
                width: 100%;
                display: flex;
                justify-content: center;
                align-items: center;
                padding: 30px;
                font-weight: 600;
                font-family: 'Poppins', sans-serif;
                color: #6c757d;
                background-color: #f8f9fa;
                border: 2px dashed #ced4da;
                border-radius: 12px;
                font-size: 16px;
                animation: fadeIn 0.5s ease-in-out;
            ">
                <i class="bi bi-folder-x" style="margin-right: 8px; font-size: 20px; color: #dc3545;"></i>
                Belum Ada Permohonan !!
            </div>
        </td>
    </tr>
@endforelse

<style>
@keyframes fadeIn {
    from { opacity: 0; transform: translateY(10px); }
    to { opacity: 1; transform: translateY(0); }
}
</style>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        @include('backend.00_administrator.00_baganterpisah.07_paginations')
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
                    </div>
                </div>
            </div>
        </main>
    </div>

    @include('backend.00_administrator.00_baganterpisah.02_footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Fungsi untuk update entries per halaman
        function updateEntries() {
            let selectedValue = document.getElementById("entries").value;
            let url = new URL(window.location.href);
            url.searchParams.set("perPage", selectedValue);
            window.location.href = url.toString();
        }

        // Fungsi untuk pencarian tabel
        function searchTable() {
            let input = document.getElementById("searchInput").value;
            fetch(`/bekrksosbud?search=${input}`)
                .then(response => response.text())
                .then(html => {
                    let parser = new DOMParser();
                    let doc = parser.parseFromString(html, "text/html");
                    let newTableBody = doc.querySelector("#tableBody").innerHTML;
                    document.querySelector("#tableBody").innerHTML = newTableBody;
                    // Setelah update konten, hitung ulang lebar kolom
                    calculateColumnWidths();
                })
                .catch(error => console.error("Error fetching search results:", error));
        }

        // Fungsi untuk set URL delete
        function setDeleteUrl(button) {
            var id = button.getAttribute('data-judul');
            document.getElementById('itemName').innerText = id;
            var deleteUrl = "/dokbekrksosbuddelete/" + encodeURIComponent(id);
            document.getElementById('deleteForm').action = deleteUrl;
        }

        // FUNGSI UTAMA: Hitung lebar kolom secara dinamis
        function calculateColumnWidths() {
            const table = document.querySelector('.zebra-table');
            if (!table) return;

            // Dapatkan elemen header untuk mengukur lebar
            const headerRow = table.querySelector('thead tr');
            if (!headerRow) return;

            const col1 = headerRow.querySelector('.sticky-column-header');
            const col2 = headerRow.querySelector('.sticky-column-header-2');
            const col3 = headerRow.querySelector('.sticky-column-header-3');

            if (col1 && col2 && col3) {
                const col1Width = col1.offsetWidth;
                const col2Width = col2.offsetWidth;
                const col3Width = col3.offsetWidth;

                // Set CSS custom properties
                document.documentElement.style.setProperty('--col1-width', col1Width + 'px');
                document.documentElement.style.setProperty('--col2-width', col2Width + 'px');
                document.documentElement.style.setProperty('--col3-width', col3Width + 'px');

                console.log('Column widths calculated:', { col1Width, col2Width, col3Width });
            }
        }

        // Inisialisasi saat dokumen siap
        document.addEventListener('DOMContentLoaded', function() {
            calculateColumnWidths();

            // Hitung ulang setelah semua gambar dimuat
            window.addEventListener('load', calculateColumnWidths);

            // Hitung ulang saat window di-resize
            window.addEventListener('resize', calculateColumnWidths);

            // Hitung ulang setelah transisi/animasi selesai
            setTimeout(calculateColumnWidths, 100);
        });

        // Juga hitung ulang ketika konten tabel berubah
        const observer = new MutationObserver(function(mutations) {
            mutations.forEach(function(mutation) {
                if (mutation.type === 'childList') {
                    calculateColumnWidths();
                }
            });
        });

        // Mulai observasi setelah DOM siap
        document.addEventListener('DOMContentLoaded', function() {
            const tableBody = document.getElementById('tableBody');
            if (tableBody) {
                observer.observe(tableBody, {
                    childList: true,
                    subtree: true
                });
            }
        });
    </script>
