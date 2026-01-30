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
        }


        .header h1 {
            margin: 0;
            font-size: 28px;
            font-weight: 700;
        }

        .content {
            padding: 30px;
        }

        .section {
            margin-bottom: 25px;
            border: 2px solid var(--abu);
            border-radius: 12px;
            background: var(--putih);
            overflow: hidden;
        }

        .section-header {
            background: linear-gradient(90deg, var(--biru-muda) 0%, var(--biru-cerah) 100%);
            color: var(--putih);
            padding: 15px 25px;
            font-weight: 600;
            font-size: 18px;
        }

        .section-content {
            padding: 25px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
        }

        .data-row {
            margin-bottom: 15px;
        }

        .data-label {
            font-weight: 600;
            color: var(--biru-tua);
            margin-bottom: 5px;
            font-size: 14px;
        }

        .data-value {
            background: var(--abu-muda);
            padding: 10px 15px;
            border-radius: 8px;
            border: 1px solid var(--abu);
            font-size: 15px;
            min-height: 40px;
            display: flex;
            align-items: center;
        }

        .file-badge {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: linear-gradient(135deg, var(--biru-muda) 0%, var(--biru-cerah) 100%);
            color: var(--putih);
            padding: 8px 16px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .file-badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        @media (max-width: 768px) {
            .content {
                padding: 20px;
            }

            .section-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1><i class="fas fa-building"></i> DETAIL DATA PERMOHONAN BANGUNAN</h1>
        </div>

        <div class="content">
            <!-- INFORMASI SURAT -->
            <div class="section">
                <div class="section-header">
                    INFORMASI SURAT
                </div>
                <div class="section-content">
                    <div>
                        <div class="data-label">Nomor Surat</div>
                        <div class="data-value">{{$data->nosurat ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Tanggal Surat</div>
                        <div class="data-value">{{$data->tanggalsurat ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Surat Permohonan</div>
                        <div class="data-value">
                            @if($data->suratpermohonan)
                                <a href="{{ asset('public/' . $data->suratpermohonan) }}" target="_blank" class="file-badge">
                                    <i class="fas fa-file-pdf"></i> Lihat PDF
                                </a>
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
                    DATA BANGUNAN
                </div>
                <div class="section-content">
                    <div>
                        <div class="data-label">Nama Bangunan</div>
                        <div class="data-value">{{$data->namabangunan ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Pilihan Bangunan</div>
                        <div class="data-value">{{$data->pilihanbangunan ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Surat Kelayakan</div>
                        <div class="data-value">
                            @if($data->suratkelayakan)
                                <a href="{{ asset('public/' . $data->suratkelayakan) }}" target="_blank" class="file-badge">
                                    <i class="fas fa-file-pdf"></i> Lihat PDF
                                </a>
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
                    SURAT KESANGGUPAN
                </div>
                <div class="section-content">
                    <div>
                        <div class="data-label">Pilihan Sanggup</div>
                        <div class="data-value">{{$data->pilihansanggup ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Surat Kesanggupan</div>
                        <div class="data-value">
                            @if($data->suratkesanggupan)
                                <a href="{{ asset('public/' . $data->suratkesanggupan) }}" target="_blank" class="file-badge">
                                    <i class="fas fa-file-pdf"></i> Lihat PDF
                                </a>
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
                    DATA PEMILIK
                </div>
                <div class="section-content">
                    <div>
                        <div class="data-label">Nama Lengkap</div>
                        <div class="data-value">{{$data->namalengkap ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Jabatan</div>
                        <div class="data-value">{{$data->jabatan ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Alamat Pemilik</div>
                        <div class="data-value">{{$data->alamatpemilik ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">No Telepon</div>
                        <div class="data-value">{{$data->notelepon ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">KTP</div>
                        <div class="data-value">
                            @if($data->ktp)
                                <a href="{{ asset('public/' . $data->ktp) }}" target="_blank" class="file-badge">
                                    <i class="fas fa-file-pdf"></i> Lihat PDF
                                </a>
                            @else
                                Data Tidak Ditemukan
                            @endif
                        </div>
                    </div>
                    <div>
                        <div class="data-label">SK</div>
                        <div class="data-value">
                            @if($data->sk)
                                <a href="{{ asset('public/' . $data->sk) }}" target="_blank" class="file-badge">
                                    <i class="fas fa-file-pdf"></i> Lihat PDF
                                </a>
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
                    DATA TANAH
                </div>
                <div class="section-content">
                    <div>
                        <div class="data-label">Luas Tanah</div>
                        <div class="data-value">{{$data->luastanah ?? 'Data Tidak Ditemukan'}} m²</div>
                    </div>
                    <div>
                        <div class="data-label">Status Tanah</div>
                        <div class="data-value">{{$data->statustanah ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Nama Pemegang Hak</div>
                        <div class="data-value">{{$data->namapemeganghak ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Sertifikat Tanah</div>
                        <div class="data-value">
                            @if($data->sertifikattanah)
                                <a href="{{ asset('public/' . $data->sertifikattanah) }}" target="_blank" class="file-badge">
                                    <i class="fas fa-file-pdf"></i> Lihat PDF
                                </a>
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
                    DATA TEKNIS BANGUNAN
                </div>
                <div class="section-content">
                    <div>
                        <div class="data-label">Legalitas Bangunan</div>
                        <div class="data-value">{{$data->legalitasbangunan ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Nomor PBG</div>
                        <div class="data-value">{{$data->nomorpbg ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Pemilik Bangunan</div>
                        <div class="data-value">{{$data->pemilikbangunan ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Kode Barang</div>
                        <div class="data-value">{{$data->kodebarang ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Alamat Bangunan</div>
                        <div class="data-value">{{$data->alamatbangunan ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Koordinat Bangunan</div>
                        <div class="data-value">{{$data->koordinatbangunan ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Fungsi Bangunan</div>
                        <div class="data-value">{{$data->fungsibangunan ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Jumlah Lantai</div>
                        <div class="data-value">{{$data->jumlahlantai ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Ketinggian Bangunan</div>
                        <div class="data-value">{{$data->ketinggianbangunan ?? 'Data Tidak Ditemukan'}} m</div>
                    </div>
                    <div>
                        <div class="data-label">Luas Bangunan</div>
                        <div class="data-value">{{$data->luasbangunan ?? 'Data Tidak Ditemukan'}} m²</div>
                    </div>
                    <div>
                        <div class="data-label">Kompleksitas Bangunan</div>
                        <div class="data-value">{{$data->kompleksitasbangunan ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Tingkat Permanensi</div>
                        <div class="data-value">{{$data->tingkatpermanensi ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Kepadatan</div>
                        <div class="data-value">{{$data->kepadatan ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Tanggal Dibangun</div>
                        <div class="data-value">{{$data->tanggaldibangun ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Tanggal Renovasi</div>
                        <div class="data-value">{{$data->tanggalrevovasi ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">Nilai Bangunan Baru</div>
                        <div class="data-value">Rp {{ number_format($data->nilaibangunanbaru ?? 0, 2, ',', '.') }}</div>
                    </div>
                    <div>
                        <div class="data-label">Nilai Bangunan Lama</div>
                        <div class="data-value">Rp {{ number_format($data->nilaibangunanlama ?? 0, 2, ',', '.') }}</div>
                    </div>
                </div>
            </div>

            <!-- DOKUMEN PENDUKUNG -->
            <div class="section">
                <div class="section-header">
                    DOKUMEN PENDUKUNG
                </div>
                <div class="section-content">
                    <div>
                        <div class="data-label">KIB</div>
                        <div class="data-value">
                            @if($data->kib)
                                <a href="{{ asset('public/' . $data->kib) }}" target="_blank" class="file-badge">
                                    <i class="fas fa-file-pdf"></i> Lihat PDF
                                </a>
                            @else
                                Data Tidak Ditemukan
                            @endif
                        </div>
                    </div>
                    <div>
                        <div class="data-label">Apakah Ada PBG</div>
                        <div class="data-value">{{$data->apakahadapbg ?? 'Data Tidak Ditemukan'}}</div>
                    </div>
                    <div>
                        <div class="data-label">PBG</div>
                        <div class="data-value">
                            @if($data->pbg)
                                <a href="{{ asset('public/' . $data->pbg) }}" target="_blank" class="file-badge">
                                    <i class="fas fa-file-pdf"></i> Lihat PDF
                                </a>
                            @else
                                Data Tidak Ditemukan
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



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


