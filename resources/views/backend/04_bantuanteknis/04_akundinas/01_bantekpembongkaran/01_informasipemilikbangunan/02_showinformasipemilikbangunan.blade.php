@include('backend.00_administrator.00_baganterpisah.01_header')

<!--begin::Body-->
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
 <!--begin::App Wrapper-->
 <div class="app-wrapper">
{{-- ---------------------------------------------------------------------- --}}

@include('backend.00_administrator.00_baganterpisah.04_navbar')
@include('backend.00_administrator.00_baganterpisah.09_button')
{{-- ---------------------------------------------------------------------- --}}

   @include('backend.00_administrator.00_baganterpisah.03_sidebar')
   @include('frontend.android.00_fiturmenu.06_alert')


   <!--begin::App Main-->
   <main class="app-main" style=" background: linear-gradient(to bottom, #ffffff, #ffffff); margin: 0; padding: 0; position: relative; left: 0; ">
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

     <!-- Menampilkan pesan sukses -->
<br>

     <div class="container-fluid">
         <!--begin::Row-->
         <div class="putih row" style="margin-right: 10px; margin-left:10px;">
             <!-- /.card -->
             <div class="card mb-4">
                 </div>
                 <!-- /.card-header -->
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            color: #1e293b;
            line-height: 1.6;
            padding: 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: var(--putih);
            border-radius: 20px;
            box-shadow: 0 10px 40px var(--shadow);
            overflow: hidden;
            border: 1px solid var(--abu);
        }

        .header {
            background: linear-gradient(135deg, var(--biru-persib) 0%, var(--biru-tua) 100%);
            color: var(--putih);
            padding: 30px 40px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 300px;
            height: 300px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
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
            font-size: 18px;
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
            from { opacity: 0; }
            to { opacity: 1; }
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
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="bi bi-building icon-title"></i> DETAIL DATA PERMOHONAN BANGUNAN</h1>
        </div>

        <div class="content">
            <!-- INFORMASI SURAT -->
            <div class="section">
                <div class="section-header">
                    <i class="bi bi-file-earmark-text"></i> INFORMASI SURAT
                </div>
                <div class="section-content">
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-hash"></i> Nomor Surat</div>
                        <div class="data-value">{{$data->nosurat ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-calendar-date"></i> Tanggal Surat</div>
                        <div class="data-value">{{$data->tanggalsurat ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-file-pdf"></i> Surat Permohonan</div>
                        <div class="data-value">
                            @if($data->suratpermohonan)
                                <button class="file-badge view-pdf"
                                        data-url="{{ asset('public/' . $data->suratpermohonan) }}"
                                        data-title="Surat Permohonan">
                                    <i class="bi bi-eye"></i> Lihat PDF
                                </button>
                            @else
                                Data Tidak Ditemukan
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- DATA BANGUNAN -->
            <div class="section">
                <div class="section-header">
                    <i class="bi bi-buildings"></i> DATA BANGUNAN
                </div>
                <div class="section-content">
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-tag"></i> Nama Bangunan</div>
                        <div class="data-value">{{$data->namabangunan ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-check-circle"></i> Pilihan Bangunan</div>
                        <div class="data-value">{{$data->pilihanbangunan ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-file-check"></i> Surat Kelayakan</div>
                        <div class="data-value">
                            @if($data->suratkelayakan)
                                <button class="file-badge view-pdf"
                                        data-url="{{ asset('public/' . $data->suratkelayakan) }}"
                                        data-title="Surat Kelayakan">
                                    <i class="bi bi-eye"></i> Lihat PDF
                                </button>
                            @else
                                Data Tidak Ditemukan
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- SURAT KESANGGUPAN -->
            <div class="section">
                <div class="section-header">
                    <i class="bi bi-hand-thumbs-up"></i> SURAT KESANGGUPAN
                </div>
                <div class="section-content">
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-check-square"></i> Pilihan Sanggup</div>
                        <div class="data-value">{{$data->pilihansanggup ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-file-earmark-text"></i> Surat Kesanggupan</div>
                        <div class="data-value">
                            @if($data->suratkesanggupan)
                                <button class="file-badge view-pdf"
                                        data-url="{{ asset('public/' . $data->suratkesanggupan) }}"
                                        data-title="Surat Kesanggupan">
                                    <i class="bi bi-eye"></i> Lihat PDF
                                </button>
                            @else
                                Data Tidak Ditemukan
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- DATA PEMILIK -->
            <div class="section">
                <div class="section-header">
                    <i class="bi bi-person-badge"></i> DATA PEMILIK
                </div>
                <div class="section-content">
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-person"></i> Nama Lengkap</div>
                        <div class="data-value">{{$data->namalengkap ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-briefcase"></i> Jabatan</div>
                        <div class="data-value">{{$data->jabatan ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-geo-alt"></i> Alamat Pemilik</div>
                        <div class="data-value">{{$data->alamatpemilik ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-telephone"></i> No Telepon</div>
                        <div class="data-value">{{$data->notelepon ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-card-text"></i> KTP</div>
                        <div class="data-value">
                            @if($data->ktp)
                                <button class="file-badge view-pdf"
                                        data-url="{{ asset('public/' . $data->ktp) }}"
                                        data-title="KTP">
                                    <i class="bi bi-eye"></i> Lihat PDF
                                </button>
                            @else
                                Data Tidak Ditemukan
                            @endif
                        </div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-file-earmark"></i> SK</div>
                        <div class="data-value">
                            @if($data->sk)
                                <button class="file-badge view-pdf"
                                        data-url="{{ asset('public/' . $data->sk) }}"
                                        data-title="SK">
                                    <i class="bi bi-eye"></i> Lihat PDF
                                </button>
                            @else
                                Data Tidak Ditemukan
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- DATA TANAH -->
            <div class="section">
                <div class="section-header">
                    <i class="bi bi-globe-asia-australia"></i> DATA TANAH
                </div>
                <div class="section-content">
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-rulers"></i> Luas Tanah</div>
                        <div class="data-value">{{$data->luastanah ?? 'Data Tidak Ditemukan'}} m²</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-tags"></i> Status Tanah</div>
                        <div class="data-value">{{$data->statustanah ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-person-check"></i> Nama Pemegang Hak</div>
                        <div class="data-value">{{$data->namapemeganghak ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-file-earmark-break"></i> Sertifikat Tanah</div>
                        <div class="data-value">
                            @if($data->sertifikattanah)
                                <button class="file-badge view-pdf"
                                        data-url="{{ asset('public/' . $data->sertifikattanah) }}"
                                        data-title="Sertifikat Tanah">
                                    <i class="bi bi-eye"></i> Lihat PDF
                                </button>
                            @else
                                Data Tidak Ditemukan
                            @endif
                        </div>
                    </div>
                </div>
            </div>

            <!-- DATA TEKNIS BANGUNAN -->
            <div class="section">
                <div class="section-header">
                    <i class="bi bi-tools"></i> DATA TEKNIS BANGUNAN
                </div>
                <div class="section-content">
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-shield-check"></i> Legalitas Bangunan</div>
                        <div class="data-value">{{$data->legalitasbangunan ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-hash"></i> Nomor PBG</div>
                        <div class="data-value">{{$data->nomorpbg ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-person-gear"></i> Pemilik Bangunan</div>
                        <div class="data-value">{{$data->pemilikbangunan ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-upc-scan"></i> Kode Barang</div>
                        <div class="data-value">{{$data->kodebarang ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-geo-alt-fill"></i> Alamat Bangunan</div>
                        <div class="data-value">{{$data->alamatbangunan ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-geo"></i> Koordinat Bangunan</div>
                        <div class="data-value">{{$data->koordinatbangunan ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-building"></i> Fungsi Bangunan</div>
                        <div class="data-value">{{$data->fungsibangunan ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-layers"></i> Jumlah Lantai</div>
                        <div class="data-value">{{$data->jumlahlantai ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-arrows-vertical"></i> Ketinggian Bangunan</div>
                        <div class="data-value">{{$data->ketinggianbangunan ?? 'Data Tidak Ditemukan'}} m</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-aspect-ratio"></i> Luas Bangunan</div>
                        <div class="data-value">{{$data->luasbangunan ?? 'Data Tidak Ditemukan'}} m²</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-diagram-3"></i> Kompleksitas Bangunan</div>
                        <div class="data-value">{{$data->kompleksitasbangunan ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-shield"></i> Tingkat Permanensi</div>
                        <div class="data-value">{{$data->tingkatpermanensi ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-people"></i> Kepadatan</div>
                        <div class="data-value">{{$data->kepadatan ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-calendar-plus"></i> Tanggal Dibangun</div>
                        <div class="data-value">{{$data->tanggaldibangun ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-calendar-check"></i> Tanggal Renovasi</div>
                        <div class="data-value">{{$data->tanggalrevovasi ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-cash-stack"></i> Nilai Bangunan Baru</div>
                        <div class="data-value">Rp {{ number_format($data->nilaibangunanbaru ?? 0, 2, ',', '.') }}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-cash"></i> Nilai Bangunan Lama</div>
                        <div class="data-value">Rp {{ number_format($data->nilaibangunanlama ?? 0, 2, ',', '.') }}</div>
                    </div>
                </div>
            </div>

            <!-- DOKUMEN PENDUKUNG -->
            <div class="section">
                <div class="section-header">
                    <i class="bi bi-folder2-open"></i> DOKUMEN PENDUKUNG
                </div>
                <div class="section-content">
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-file-zip"></i> KIB</div>
                        <div class="data-value">
                            @if($data->kib)
                                <button class="file-badge view-pdf"
                                        data-url="{{ asset('public/' . $data->kib) }}"
                                        data-title="KIB">
                                    <i class="bi bi-eye"></i> Lihat PDF
                                </button>
                            @else
                                Data Tidak Ditemukan
                            @endif
                        </div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-question-circle"></i> Apakah Ada PBG</div>
                        <div class="data-value">{{$data->apakahadapbg ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div class="data-card">
                        <div class="data-label"><i class="bi bi-file-earmark-medical"></i> PBG</div>
                        <div class="data-value">
                            @if($data->pbg)
                                <button class="file-badge view-pdf"
                                        data-url="{{ asset('public/' . $data->pbg) }}"
                                        data-title="PBG">
                                    <i class="bi bi-eye"></i> Lihat PDF
                                </button>
                            @else
                                Data Tidak Ditemukan
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal PDF Viewer - Full Screen -->
    <div class="modal" id="pdfModal">
        <div class="modal-card">
            <div class="modal-header">
                <div class="modal-title">
                    <i class="bi bi-file-earmark-pdf"></i>
                    <span id="modalTitle">Dokumen PDF</span>
                </div>
                <button class="modal-close" id="closeModal">
                    <i class="bi bi-x-lg"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="pdf-container">
                    <iframe class="pdf-viewer" id="pdfViewer" frameborder="0"></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <div class="filename">
                    <i class="bi bi-file-earmark"></i>
                    <span id="modalFilename">nama_file.pdf</span>
                </div>
                <a href="#" class="download-btn" id="downloadPdf">
                    <i class="bi bi-download"></i> Download PDF
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('pdfModal');
            const pdfViewer = document.getElementById('pdfViewer');
            const modalTitle = document.getElementById('modalTitle');
            const modalFilename = document.getElementById('modalFilename');
            const downloadPdf = document.getElementById('downloadPdf');
            const closeModal = document.getElementById('closeModal');

            // Get all view PDF buttons
            const viewPdfButtons = document.querySelectorAll('.view-pdf');

            // Add click event to each PDF button
            viewPdfButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const pdfUrl = this.getAttribute('data-url');
                    const title = this.getAttribute('data-title');
                    const filename = pdfUrl.split('/').pop();

                    // Set modal content
                    modalTitle.textContent = title;
                    modalFilename.textContent = filename;
                    pdfViewer.src = pdfUrl + '#toolbar=0&navpanes=0&scrollbar=0';
                    downloadPdf.href = pdfUrl;

                    // Show modal with full screen
                    modal.classList.add('active');
                    document.body.style.overflow = 'hidden';

                    // Force full view
                    setTimeout(() => {
                        pdfViewer.style.width = '100%';
                        pdfViewer.style.height = '100%';
                    }, 100);
                });
            });

            // Close modal when clicking X button
            closeModal.addEventListener('click', function() {
                modal.classList.remove('active');
                document.body.style.overflow = 'auto';
                pdfViewer.src = '';
            });

            // Close modal when clicking outside
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.classList.remove('active');
                    document.body.style.overflow = 'auto';
                    pdfViewer.src = '';
                }
            });

            // Close modal with Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape' && modal.classList.contains('active')) {
                    modal.classList.remove('active');
                    document.body.style.overflow = 'auto';
                    pdfViewer.src = '';
                }
            });
        });
    </script>



             </div>
             <!-- /.card -->
         </div>
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

   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.1/xlsx.full.min.js"></script>
   <script>
    function exportTableToExcel(tableID, filename = '') {
        var table = document.getElementById(tableID);
        var wb = XLSX.utils.table_to_book(table, {sheet:"Sheet 1"});
        return XLSX.writeFile(wb, filename + '.xlsx');
    }
    </script>


