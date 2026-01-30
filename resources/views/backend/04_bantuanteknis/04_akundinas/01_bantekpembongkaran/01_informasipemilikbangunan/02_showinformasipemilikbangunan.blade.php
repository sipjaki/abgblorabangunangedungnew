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

        .container {
            max-width: 1200px;
            margin: 0 auto;
            background: var(--putih);
            border-radius: 16px;
            box-shadow: 0 8px 32px rgba(30, 58, 138, 0.1);
            overflow: hidden;
            border: 1px solid var(--abu);
        }

        .header {
            background: linear-gradient(135deg, var(--biru-persib) 0%, var(--biru-tua) 100%);
            color: var(--putih);
            padding: 25px 30px;
            text-align: center;
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
            cursor: pointer;
            border: none;
        }

        .file-badge:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-card {
            background: var(--putih);
            border-radius: 16px;
            width: 90%;
            max-width: 900px;
            max-height: 90vh;
            overflow: hidden;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            display: flex;
            flex-direction: column;
        }

        .modal-header {
            background: linear-gradient(135deg, var(--biru-persib) 0%, var(--biru-tua) 100%);
            color: var(--putih);
            padding: 20px 25px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-title {
            font-size: 18px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .modal-close {
            background: rgba(255, 255, 255, 0.2);
            border: none;
            color: var(--putih);
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 18px;
        }

        .modal-close:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: rotate(90deg);
        }

        .modal-body {
            flex: 1;
            padding: 0;
            display: flex;
            flex-direction: column;
        }

        .pdf-container {
            flex: 1;
            position: relative;
            min-height: 500px;
        }

        .pdf-viewer {
            width: 100%;
            height: 100%;
            border: none;
        }

        .modal-footer {
            padding: 15px 25px;
            background: var(--abu-muda);
            border-top: 1px solid var(--abu);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .download-btn {
            background: linear-gradient(135deg, var(--biru-muda) 0%, var(--biru-cerah) 100%);
            color: var(--putih);
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: all 0.3s;
        }

        .download-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
            color: var(--putih);
        }

        .filename {
            color: var(--abu-gelap);
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .content {
                padding: 20px;
            }

            .section-content {
                grid-template-columns: 1fr;
            }

            .modal-card {
                width: 95%;
                max-height: 85vh;
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
                                <button class="file-badge view-pdf"
                                        data-url="{{ asset('public/' . $data->suratpermohonan) }}"
                                        data-title="Surat Permohonan">
                                    <i class="fas fa-eye"></i> Lihat PDF
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
                                <button class="file-badge view-pdf"
                                        data-url="{{ asset('public/' . $data->suratkelayakan) }}"
                                        data-title="Surat Kelayakan">
                                    <i class="fas fa-eye"></i> Lihat PDF
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
                                <button class="file-badge view-pdf"
                                        data-url="{{ asset('public/' . $data->suratkesanggupan) }}"
                                        data-title="Surat Kesanggupan">
                                    <i class="fas fa-eye"></i> Lihat PDF
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
                                <button class="file-badge view-pdf"
                                        data-url="{{ asset('public/' . $data->ktp) }}"
                                        data-title="KTP">
                                    <i class="fas fa-eye"></i> Lihat PDF
                                </button>
                            @else
                                Data Tidak Ditemukan
                            @endif
                        </div>
                    </div>
                    <div>
                        <div class="data-label">SK</div>
                        <div class="data-value">
                            @if($data->sk)
                                <button class="file-badge view-pdf"
                                        data-url="{{ asset('public/' . $data->sk) }}"
                                        data-title="SK">
                                    <i class="fas fa-eye"></i> Lihat PDF
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
                                <button class="file-badge view-pdf"
                                        data-url="{{ asset('public/' . $data->sertifikattanah) }}"
                                        data-title="Sertifikat Tanah">
                                    <i class="fas fa-eye"></i> Lihat PDF
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
                                <button class="file-badge view-pdf"
                                        data-url="{{ asset('public/' . $data->kib) }}"
                                        data-title="KIB">
                                    <i class="fas fa-eye"></i> Lihat PDF
                                </button>
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
                                <button class="file-badge view-pdf"
                                        data-url="{{ asset('public/' . $data->pbg) }}"
                                        data-title="PBG">
                                    <i class="fas fa-eye"></i> Lihat PDF
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

    <!-- Modal PDF Viewer -->
    <div class="modal" id="pdfModal">
        <div class="modal-card">
            <div class="modal-header">
                <div class="modal-title">
                    <i class="fas fa-file-pdf"></i>
                    <span id="modalTitle">Dokumen PDF</span>
                </div>
                <button class="modal-close" id="closeModal">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="pdf-container">
                    <iframe class="pdf-viewer" id="pdfViewer" frameborder="0"></iframe>
                </div>
            </div>
            <div class="modal-footer">
                <div class="filename" id="modalFilename"></div>
                <a href="#" class="download-btn" id="downloadPdf">
                    <i class="fas fa-download"></i> Download PDF
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
                    pdfViewer.src = pdfUrl + '#view=FitH';
                    downloadPdf.href = pdfUrl;

                    // Show modal
                    modal.classList.add('active');
                    document.body.style.overflow = 'hidden';
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


