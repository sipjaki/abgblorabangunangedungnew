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

    <div class="container">

        <div class="content">
            <!-- SURAT KELAYAKAN KAJIAN BANGUNAN GEDUNG -->
<div class="section">
    <div class="section-header">
        <i class="bi bi-clipboard-check"></i> SURAT KELAYAKAN KAJIAN BANGUNAN GEDUNG
    </div>
    <div class="section-content">
        <div class="data-card">
            <div class="data-label"><i class="bi bi-building"></i> Nama Bangunan</div>
            <div class="data-value">{{ $data->cadangan1 ?? 'Data Tidak Ditemukan' }}</div>
        </div>
        <div class="data-card">
            <div class="data-label"><i class="bi bi-journal-text"></i> Jenis Kajian Bangunan</div>
            <div class="data-value">{{ $data->cadangan2 ?? 'Data Tidak Ditemukan' }}</div>
        </div>
        <div class="data-card">
            <div class="data-label"><i class="bi bi-file-earmark-text"></i> Surat Kelayakan Kajian Bangunan Gedung</div>
            <div class="data-value">
                @if($data->cadangan3)
                    <button class="file-badge view-pdf"
                            data-url="{{ asset('public/' . $data->cadangan3) }}"
                            data-title="Surat Kelayakan Kajian Bangunan Gedung"
                            data-filename="surat_kelayakan_kajian.pdf">
                        <i class="bi bi-eye"></i> Lihat PDF
                    </button>
                @else
                    Data Tidak Ditemukan
                @endif
            </div>
        </div>
    </div>
</div>

<!-- DOKUMEN ANALISA BANGUNAN GEDUNG -->
<div class="section">
    <div class="section-header">
        <i class="bi bi-clipboard-data"></i> DOKUMEN ANALISA BANGUNAN GEDUNG
    </div>
    <div class="section-content">
        <div class="data-card">
            <div class="data-label"><i class="bi bi-percent"></i> Tingkat Kerusakan</div>
            <div class="data-value">{{ $data->tingkat_kerusakan ? $data->tingkat_kerusakan . ' %' : 'Data Tidak Ditemukan' }}</div>
        </div>
        <div class="data-card">
            <div class="data-label"><i class="bi bi-exclamation-triangle"></i> Status Kerusakan</div>
            <div class="data-value">{{ $data->status_kerusakan ?? 'Data Tidak Ditemukan' }}</div>
        </div>
        <div class="data-card">
            <div class="data-label"><i class="bi bi-file-earmark-text"></i> Dokumen Analisa Kerusakan Bangunan</div>
            <div class="data-value">
                @if($data->dok_kerusakan_bangunan)
                    <button class="file-badge view-pdf"
                            data-url="{{ asset('public/' . $data->dok_kerusakan_bangunan) }}"
                            data-title="Dokumen Analisa Kerusakan Bangunan"
                            data-filename="dokumen_analisa_kerusakan.pdf">
                        <i class="bi bi-eye"></i> Lihat PDF
                    </button>
                @else
                    Data Tidak Ditemukan
                @endif
            </div>
        </div>
    </div>
</div>

<!-- SURAT KAJIAN TEKNIS BANGUNAN GEDUNG -->
<div class="section">
    <div class="section-header">
        <i class="bi bi-file-text"></i> SURAT KAJIAN TEKNIS BANGUNAN GEDUNG
    </div>
    <div class="section-content">
        <div class="data-card">
            <div class="data-label"><i class="bi bi-hash"></i> Nomor Surat</div>
            <div class="data-value">{{ $data->nosurat ?? 'Data Tidak Ditemukan' }}</div>
        </div>
        <div class="data-card">
            <div class="data-label"><i class="bi bi-calendar-date"></i> Tanggal Surat</div>
            <div class="data-value">
                @if($data->tanggalsurat)
                    {{ \Carbon\Carbon::parse($data->tanggalsurat)->format('d F Y') }}
                @else
                    Data Tidak Ditemukan
                @endif
            </div>
        </div>
        <div class="data-card">
            <div class="data-label"><i class="bi bi-check-circle"></i> Status Penilaian Teknis</div>
            <div class="data-value">{{ $data->status_penilaian_teknis ?? 'Data Tidak Ditemukan' }}</div>
        </div>
        <div class="data-card">
            <div class="data-label"><i class="bi bi-file-earmark-text"></i> Surat Pernyataan Kelaikan</div>
            <div class="data-value">
                @if($data->suratpernyataankelaikan)
                    <button class="file-badge view-pdf"
                            data-url="{{ asset('public/' . $data->suratpernyataankelaikan) }}"
                            data-title="Surat Pernyataan Kelaikan"
                            data-filename="surat_pernyataan_kelaikan.pdf">
                        <i class="bi bi-eye"></i> Lihat PDF
                    </button>
                @else
                    Data Tidak Ditemukan
                @endif
            </div>
        </div>
    </div>
</div>

<!-- AS BUILT DRAWING -->
<div class="section">
    <div class="section-header">
        <i class="bi bi-building"></i> AS BUILT DRAWING
    </div>
    <div class="section-content">
        <div class="data-card">
            <div class="data-label"><i class="bi bi-file-earmark-text"></i> Gambar As Built Drawing</div>
            <div class="data-value">
                @if($data->gambar_asd)
                    <button class="file-badge view-pdf"
                            data-url="{{ asset('public/' . $data->gambar_asd) }}"
                            data-title="Gambar As Built Drawing"
                            data-filename="gambar_as_built_drawing.pdf">
                        <i class="bi bi-eye"></i> Lihat PDF
                    </button>
                @else
                    Data Tidak Ditemukan
                @endif
            </div>
        </div>
        <div class="data-card">
            <div class="data-label"><i class="bi bi-card-text"></i> Keterangan</div>
            <div class="data-value">{{ $data->keterangan ?? 'Data Tidak Ditemukan' }}</div>
        </div>
    </div>
</div>

<!-- METODE PEMBONGKARAN -->
<div class="section">
    <div class="section-header">
        <i class="bi bi-tools"></i> METODE PEMBONGKARAN
    </div>
    <div class="section-content">
        <div class="data-card">
            <div class="data-label"><i class="bi bi-person-badge"></i> Pelaksana</div>
            <div class="data-value">{{ $data->pelaksana ?? 'Data Tidak Ditemukan' }}</div>
        </div>
        <div class="data-card">
            <div class="data-label"><i class="bi bi-person"></i> Nama Penanggung Jawab</div>
            <div class="data-value">{{ $data->namapenanggungjawab ?? 'Data Tidak Ditemukan' }}</div>
        </div>
        <div class="data-card">
            <div class="data-label"><i class="bi bi-telephone"></i> No. Telepon</div>
            <div class="data-value">{{ $data->notelepon ?? 'Data Tidak Ditemukan' }}</div>
        </div>
        <div class="data-card">
            <div class="data-label"><i class="bi bi-file-earmark-text"></i> Dokumen Metode Pembongkaran</div>
            <div class="data-value">
                @if($data->berkaspembongkaran)
                    <button class="file-badge view-pdf"
                            data-url="{{ asset('public/' . $data->berkaspembongkaran) }}"
                            data-title="Dokumen Metode Pembongkaran"
                            data-filename="dokumen_metode_pembongkaran.pdf">
                        <i class="bi bi-eye"></i> Lihat PDF
                    </button>
                @else
                    Data Tidak Ditemukan
                @endif
            </div>
        </div>
    </div>
</div>

<!-- LAPORAN PEMERIKSAAN BANGUNAN GEDUNG -->
<div class="section">
    <div class="section-header">
        <i class="bi bi-clipboard-check"></i> LAPORAN PEMERIKSAAN BANGUNAN GEDUNG
    </div>
    <div class="section-content">
        <div class="data-card">
            <div class="data-label"><i class="bi bi-check2-circle"></i> Ketersediaan Dokumen</div>
            <div class="data-value">{{ $data->ketersediaan ?? 'Data Tidak Ditemukan' }}</div>
        </div>
        <div class="data-card">
            <div class="data-label"><i class="bi bi-file-earmark-text"></i> Laporan Pemeriksaan</div>
            <div class="data-value">
                @if($data->berkaspemeriksaan)
                    <button class="file-badge view-pdf"
                            data-url="{{ asset('public/' . $data->berkaspemeriksaan) }}"
                            data-title="Laporan Pemeriksaan Bangunan Gedung"
                            data-filename="laporan_pemeriksaan.pdf">
                        <i class="bi bi-eye"></i> Lihat PDF
                    </button>
                @else
                    Data Tidak Ditemukan
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Full Screen PDF Modal -->
<div id="pdfModal" class="modal">
    <div class="modal-card">
        <div class="modal-header">
            <div class="modal-title">
                <i class="bi bi-file-earmark-pdf"></i>
                <span id="modalTitle">Preview Dokumen</span>
            </div>
            <button class="modal-close" id="modalClose">&times;</button>
        </div>
        <div class="modal-body">
            <div class="pdf-container">
                <iframe id="pdfViewer" class="pdf-viewer" src=""></iframe>
            </div>
        </div>
        <div class="modal-footer">
            <div class="filename">
                <i class="bi bi-file-text"></i>
                <span id="fileName">Nama file akan muncul di sini</span>
            </div>
            <a href="#" id="downloadBtn" class="download-btn">
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
    const fileName = document.getElementById('fileName');
    const downloadBtn = document.getElementById('downloadBtn');
    const modalClose = document.getElementById('modalClose');

    // Open modal function
    function openModal(pdfUrl, title, filename) {
        modalTitle.textContent = title;
        pdfViewer.src = pdfUrl + '#view=FitH';
        fileName.textContent = filename;
        downloadBtn.href = pdfUrl;
        downloadBtn.download = filename;
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    // Close modal function
    function closeModal() {
        modal.classList.remove('active');
        pdfViewer.src = '';
        document.body.style.overflow = 'auto';
    }

    // Add event listeners to all PDF view buttons
    document.querySelectorAll('.view-pdf').forEach(button => {
        button.addEventListener('click', function() {
            const pdfUrl = this.getAttribute('data-url');
            const title = this.getAttribute('data-title');
            const filename = this.getAttribute('data-filename');
            openModal(pdfUrl, title, filename);
        });
    });

    // Close modal when clicking close button
    modalClose.addEventListener('click', closeModal);

    // Close modal when clicking outside the modal card
    modal.addEventListener('click', function(e) {
        if (e.target === modal) {
            closeModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && modal.classList.contains('active')) {
            closeModal();
        }
    });

    // Add hover effect to data cards
    const dataCards = document.querySelectorAll('.data-card');
    dataCards.forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-3px)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });
});
</script>

        </div>
    </div>

             </div>
             <!-- /.card -->
         </div>
         {{-- PEMBATAS DATA --}}

     <div class="container-fluid">
         <div class="row">
    <div class="col-12">
        <!-- isi konten di sini -->

         <h5 style="color: navy; font-weight:800; font-size:16px;">VERIFIKASI BERKAS KELENGKAPAN</h4>
    {{-- <h5>KEPALA DINAS</h5> --}}
    <br>
<div class="d-flex gap-2 mt-3">
    <!-- Kembali ke halaman sebelumnya -->
    <a href="{{ url()->previous() }}" class="button-modern">
        ← Kembali
    </a>

    <!-- Kembali ke Data Dasar -->
    <a href="{{ url('/bebantekpembongkaran') }}" class="button-berkas">
        ← Kembali ke Data Dasar
    </a>
</div>
    <hr>

    @canany(['superadmin', 'admin', 'dinas', 'pemohon'])

    @if ($data->verifikasi1 === 'dikembalikan')
    <div style="display: flex; justify-content: center; align-items: center; margin-top: 5px; margin-bottom: 5px;">
        <div style="display: flex; align-items: center; gap: 15px;">
                <p style="margin: 0;">
                    <strong>
                    Silahkan Lakukan Perbaikan Data <i class="bi bi-arrow-right"></i>
                    </strong>
                </p>

                <a href="/bekrksosbudperbaikan/{{$data->id}}" style="text-decoration: none;">
                    <button class="button-baru">
                        <i class="bi bi-pencil-square" style="margin-right:5px;"></i> Perbaikan Data
                    </button>
                </a>
            </div>
        </div>
        @endif
        @endcanany

<hr>

<form action="{{ route('validasiinformasipemilikbangunan', $data->id) }}" method="POST">
    @csrf
    @method('PUT')
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive" style="overflow-x: auto; white-space: nowrap;">
                            <table class="zebra-table table-striped">
<thead style="font-size: 16px; background-color: green; color: white;">

                                    <tr>
                                        {{-- <th style="width: 25px; text-align:center;"><i class="bi bi-hash"></i> No</th> --}}
                                        <th style="width: 400px; text-align:left; font-size: 16px; background-color: #e2e8f0; color: black;">
    <i class="bi bi-person-vcard-fill"></i> Surat Permohonan Izin Pembongkaran</span>
</th>

                                        <th class="text-center" style="background-color: #e2e8f0; color: black;">
<div style="display: flex; justify-content: center;">
    <button type="button" class="button-berkas"
        data-bs-toggle="modal" data-bs-target="#modalktp{{ $data->id }}">
        <i class="bi bi-eye" style="margin-right: 6px;"></i> Lihat
    </button>
</div>

                                            <!-- Modal KTP -->
                                            <div class="modal fade" id="modalktp{{ $data->id }}" tabindex="-1" aria-labelledby="modalktpLbl{{ $data->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <img src="/assets/abgblora/logo/logokabupatenblora.png" width="25" class="me-2">
                                                            <img src="/assets/icon/pupr.png" width="25" class="me-2">
                                                            <h5 class="modal-title" id="modalktpLbl{{ $data->id }}">SURAT PERMOHONAN IZIN PEMBONGKARAN</span>  </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>

<div class="modal-body text-left">
    @if ($data->suratpermohonan)
        @php
            $filePath = public_path($data->suratpermohonan);
            $fileUrl = asset($data->suratpermohonan);
            $extension = strtolower(pathinfo($data->suratpermohonan, PATHINFO_EXTENSION));
        @endphp

        @if (file_exists($filePath))
            @if ($extension === 'pdf')
                <iframe src="{{ $fileUrl }}" frameborder="0" width="100%" height="600px"></iframe>
            @else
                <img src="{{ $fileUrl }}" alt="Surat Permohonan" style="max-width:100%; max-height:600px;">
            @endif
            <div class="text-center">
                <a href="{{ $fileUrl }}" class="btn btn-primary mt-2" download>Download Surat Permohonan</a>
            </div>
        @else
            <p style="color: red; font-weight: bold;">File tidak ditemukan di server.</p>
        @endif
    @else
        <p style="color: red; font-weight: bold;">Data Belum Di Lengkapi !!.</p>
    @endif
</div>


                                                </div>
                                            </div>
                                        </th>
@canany(['dinas', 'pemohon'])
<th class="text-center" style="background-color: #e2e8f0; color: black;">
    <div style="display: flex; justify-content: center; gap: 20px; padding: 10px 0;">
        <style>
            .custom-status {
                position: relative;
                padding-left: 35px;
                padding-right: 15px;
                padding-top: 10px;
                padding-bottom: 10px;
                background-color: #fff;
                border: 2px solid #cbd5e0;
                border-radius: 12px;
                font-weight: 600;
                user-select: none;
                display: inline-block;
                min-width: 130px;
                color: #555;
            }
            .custom-status .custom-box {
                position: absolute;
                top: 10px;
                left: 10px;
                height: 18px;
                width: 18px;
                background-color: #fff;
                border: 2px solid #cbd5e0;
                border-radius: 4px;
            }
            .custom-status.sesuai {
                border-color: #3b82f6;
                background-color: #bfdbfe;
                color: #1d4ed8;
            }
            .custom-status.sesuai .custom-box {
                border-color: #3b82f6;
                background-color: #bfdbfe;
            }
            .custom-status.sesuai .custom-box::after {
                content: '';
                position: absolute;
                left: 5px;
                top: 1px;
                width: 5px;
                height: 10px;
                border: solid #1d4ed8;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }
            .custom-status.tidak_sesuai {
                border-color: #ef4444;
                background-color: #fecaca;
                color: #b91c1c;
            }
            .custom-status.tidak_sesuai .custom-box {
                border-color: #ef4444;
                background-color: #fecaca;
            }
            .custom-status.tidak_sesuai .custom-box::after {
                content: '';
                position: absolute;
                left: 5px;
                top: 1px;
                width: 5px;
                height: 10px;
                border: solid #b91c1c;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }
            .custom-status.pending {
                border-color: #f59e0b;
                background-color: #fef3c7;
                color: #b45309;
            }
            .custom-status.pending .custom-box {
                border-color: #f59e0b;
                background-color: #fef3c7;
            }
        </style>

        @php
            $status = $data->validasiberkas1;
        @endphp

        <div class="custom-status {{ $status == 'sesuai' ? 'sesuai' : ($status == 'tidak_sesuai' ? 'tidak_sesuai' : 'pending') }}">
            <span class="custom-box"></span>
            @if ($status === 'tidak_sesuai')
                Silahkan Lakukan Perbaikan
            @elseif ($status === 'sesuai')
                Berkas Anda Sudah Sesuai
            @else
                Sedang Di Verifikasi DPUPR
            @endif
        </div>
    </div>
</th>
@endcanany

@canany(['superadmin', 'admin', 'pemohon'])
    <th class="text-center" style="background-color: #e2e8f0; color: black;">
        <div style="display: flex; justify-content: center; gap: 20px;">
            <style>
                .custom-radio {
                    position: relative;
                    padding-left: 35px;
                    padding-right: 15px;
                    padding-top: 10px;
                    padding-bottom: 10px;
                    background-color: #fff;
                    border: 2px solid #cbd5e0;
                    border-radius: 12px;
                    font-weight: 600;
                    cursor: pointer;
                    user-select: none;
                    transition: border-color 0.3s, background-color 0.3s;
                    display: inline-block;
                }

                .custom-radio input[type="radio"] {
                    position: absolute;
                    opacity: 0;
                    cursor: pointer;
                }

                .custom-box {
                    position: absolute;
                    top: 10px;
                    left: 10px;
                    height: 18px;
                    width: 18px;
                    background-color: #fff;
                    border: 2px solid #cbd5e0;
                    border-radius: 4px;
                    transition: background-color 0.3s ease, border-color 0.3s ease;
                }

                .custom-radio input[type="radio"]:checked ~ .custom-box::after {
                    content: '';
                    position: absolute;
                    left: 5px;
                    top: 1px;
                    width: 5px;
                    height: 10px;
                    border: solid;
                    border-width: 0 2px 2px 0;
                    transform: rotate(45deg);
                    animation: checkmarkFade 0.3s ease forwards;
                }

                .custom-radio input[type="radio"]:checked[value="sesuai"] ~ .custom-box {
                    border-color: #3b82f6;
                    background-color: #bfdbfe;
                }

                .custom-radio input[type="radio"]:checked[value="sesuai"] ~ .custom-box::after {
                    border-color: #1d4ed8;
                }

                .custom-radio input[type="radio"]:checked[value="tidak_sesuai"] ~ .custom-box {
                    border-color: #ef4444;
                    background-color: #fecaca;
                }

                .custom-radio input[type="radio"]:checked[value="tidak_sesuai"] ~ .custom-box::after {
                    border-color: #b91c1c;
                }

                @keyframes checkmarkFade {
                    0% {
                        opacity: 0;
                        transform: scale(0.5) rotate(45deg);
                    }
                    100% {
                        opacity: 1;
                        transform: scale(1) rotate(45deg);
                    }
                }
            </style>

            <label class="custom-radio">
                <input type="radio" name="validasiberkas1" value="sesuai"
                    {{ $data->validasiberkas1 == 'sesuai' ? 'checked' : '' }}>
                <span class="custom-box"></span>
                Sesuai
            </label>

            <label class="custom-radio">
                <input type="radio" name="validasiberkas1" value="tidak_sesuai"
                    {{ $data->validasiberkas1 == 'tidak_sesuai' ? 'checked' : '' }}>
                <span class="custom-box"></span>
                Tidak Sesuai
            </label>
        </div>
    </th>
@endcanany

                                    </tr>



                                    {{-- <tr>
                                       <th style="width: 400px; text-align:left; font-size: 16px; background-color: #e2e8f0; color: black;">
    <i class="bi bi-file-earmark-person-fill"></i> Surat Kelayakan Kajian Teknis Bangunan Gedung
</th>

                                        <th class="text-center" style="background-color: #e2e8f0; color: black;">
                                        <div style="display: flex; justify-content: center;">
    <button type="button" class="button-berkas"
        data-bs-toggle="modal" data-bs-target="#modalFoto{{ $data->id }}">
        <i class="bi bi-eye" style="margin-right: 6px;"></i> Lihat
    </button>
</div>


                                            <!-- Modal Foto -->
                                            <div class="modal fade" id="modalFoto{{ $data->id }}" tabindex="-1" aria-labelledby="modalFotoLbl{{ $data->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-xl modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <img src="/assets/abgblora/logo/logokabupatenblora.png" width="25" class="me-2">
                                                            <img src="/assets/icon/pupr.png" width="25" class="me-2">
                                                            <h5 class="modal-title" id="modalFotoLbl{{ $data->id }}">Surat Kelayakan Kajian Teknis Bangunan Gedung </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                        </div>
<div class="modal-body text-left">
    @if ($data->suratkelayakan)
        @php
            $filePath = public_path($data->suratkelayakan); // langsung cek di public/
            $fileUrl = asset($data->suratkelayakan); // URL akses publik
            $extension = strtolower(pathinfo($data->suratkelayakan, PATHINFO_EXTENSION));
        @endphp

        @if (file_exists($filePath))
            @if ($extension === 'pdf')
                <iframe src="{{ $fileUrl }}" frameborder="0" width="100%" height="600px"></iframe>
            @else
                <img src="{{ $fileUrl }}" alt="Dokumen" style="max-width:100%; max-height:600px;">
            @endif
            <div class="text-center">
                <a href="{{ $fileUrl }}" class="button-abgblora mt-2" download>Download Dokumen</a>
            </div>
        @else
            <p style="color: red; font-weight: bold;">File tidak ditemukan di server.</p>
        @endif
    @else
        <p style="color: red; font-weight: bold;">Data Belum Di Lengkapi !!</p>
    @endif
</div>

                                                    </div>
                                                </div>
                                            </div>
                                        </th>


@canany(['dinas', 'pemohon'])
<th class="text-center" style="background-color: #e2e8f0; color: black;">
    <div style="display: flex; justify-content: center; gap: 20px; padding: 10px 0;">
        <style>
            .custom-status {
                position: relative;
                padding-left: 35px;
                padding-right: 15px;
                padding-top: 10px;
                padding-bottom: 10px;
                background-color: #fff;
                border: 2px solid #cbd5e0;
                border-radius: 12px;
                font-weight: 600;
                user-select: none;
                display: inline-block;
                min-width: 130px;
                color: #555;
            }
            .custom-status .custom-box {
                position: absolute;
                top: 10px;
                left: 10px;
                height: 18px;
                width: 18px;
                background-color: #fff;
                border: 2px solid #cbd5e0;
                border-radius: 4px;
            }
            .custom-status.sesuai {
                border-color: #3b82f6;
                background-color: #bfdbfe;
                color: #1d4ed8;
            }
            .custom-status.sesuai .custom-box {
                border-color: #3b82f6;
                background-color: #bfdbfe;
            }
            .custom-status.sesuai .custom-box::after {
                content: '';
                position: absolute;
                left: 5px;
                top: 1px;
                width: 5px;
                height: 10px;
                border: solid #1d4ed8;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }
            .custom-status.tidak_sesuai {
                border-color: #ef4444;
                background-color: #fecaca;
                color: #b91c1c;
            }
            .custom-status.tidak_sesuai .custom-box {
                border-color: #ef4444;
                background-color: #fecaca;
            }
            .custom-status.tidak_sesuai .custom-box::after {
                content: '';
                position: absolute;
                left: 5px;
                top: 1px;
                width: 5px;
                height: 10px;
                border: solid #b91c1c;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }
            .custom-status.pending {
                border-color: #f59e0b;
                background-color: #fef3c7;
                color: #b45309;
            }
            .custom-status.pending .custom-box {
                border-color: #f59e0b;
                background-color: #fef3c7;
            }
        </style>

        @php
            $status = $data->validasiberkas2;
        @endphp

        <div class="custom-status {{ $status == 'sesuai' ? 'sesuai' : ($status == 'tidak_sesuai' ? 'tidak_sesuai' : 'pending') }}">
            <span class="custom-box"></span>
            @if ($status === 'tidak_sesuai')
                Silahkan Lakukan Perbaikan
            @elseif ($status === 'sesuai')
                Berkas Anda Sudah Sesuai
            @else
                Sedang Di Verifikasi DPUPR
            @endif
        </div>
    </div>
</th>
@endcanany


                                            @canany(['superadmin', 'admin'])
                                                <th class="text-center" style="background-color: #e2e8f0; color: black;">
                                                    <div style="display: flex; justify-content: center; gap: 20px;">
                                                        <label class="custom-radio">
                                                            <input type="radio" name="validasiberkas2" value="sesuai"
                                                                {{ $data->validasiberkas2 == 'sesuai' ? 'checked' : '' }}>
                                                            <span class="custom-box"></span>
                                                            Sesuai
                                                        </label>

                                                        <label class="custom-radio">
                                                            <input type="radio" name="validasiberkas2" value="tidak_sesuai"
                                                                {{ $data->validasiberkas2 == 'tidak_sesuai' ? 'checked' : '' }}>
                                                            <span class="custom-box"></span>
                                                            Tidak Sesuai
                                                        </label>
                                                    </div>
                                                </th>
                                            @endcanany

                                    </tr> --}}


                                    <tr>
                                        <th style="width: 400px; text-align:left; font-size: 16px; background-color: #e2e8f0; color: black;">
    <i class="bi bi-house-fill"></i> Surat Kesanggupan Pembongkaran Bangunan Gedung
</th>

                                        <th class="text-center" style="background-color: #e2e8f0; color: black;">
<div style="display: flex; justify-content: center;">
    <button type="button" class="button-berkas"
        data-bs-toggle="modal" data-bs-target="#modalsertifikattanah{{ $data->id }}">
        <i class="bi bi-eye" style="margin-right: 6px;"></i> Lihat
    </button>
</div>


                                                <!-- Modal Ijazah -->
                                                <div class="modal fade" id="modalsertifikattanah{{ $data->id }}" tabindex="-1" aria-labelledby="modalsertifikattanahLbl{{ $data->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <img src="/assets/abgblora/logo/logokabupatenblora.png" width="25" class="me-2">
                                                                <img src="/assets/icon/pupr.png" width="25" class="me-2">
                                                                <h5 class="modal-title" id="modalsertifikattanahLbl{{ $data->id }}">Sertifikat Tanah .pdf</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <div style="margin-top: 10px;">
                                                                    @if($data->suratkesanggupan && file_exists(public_path('storage/' . $data->suratkesanggupan)))
                                                                    <!-- Display the default iframe when the file exists in the storage -->
                                                                    <iframe src="{{ asset('storage/' . $data->suratkesanggupan) }}" frameborder="0" width="100%" height="750px"></iframe>
                                                                @elseif($data->suratkesanggupan)
                                                                    <!-- Display the iframe with the updated file -->
                                                                    <iframe src="{{ asset($data->suratkesanggupan) }}" frameborder="0" width="100%" height="750px"></iframe>
                                                                @else
                                                                    <!-- Optional:  Show a placeholder if there's no file available -->
                                                                    <p>Data Belum Di Lengkapi !!</p>
                                                                @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </th>

                                             @canany(['dinas', 'pemohon'])
<th class="text-center" style="background-color: #e2e8f0; color: black;">
    <div style="display: flex; justify-content: center; padding: 10px 0;">
        <style>
            .custom-status {
                position: relative;
                padding-left: 35px;
                padding-right: 15px;
                padding-top: 10px;
                padding-bottom: 10px;
                background-color: #fff;
                border: 2px solid #cbd5e0;
                border-radius: 12px;
                font-weight: 600;
                user-select: none;
                display: inline-block;
                min-width: 180px;
                color: #555;
                text-align: center;
            }
            .custom-status .custom-box {
                position: absolute;
                top: 10px;
                left: 10px;
                height: 18px;
                width: 18px;
                background-color: #fff;
                border: 2px solid #cbd5e0;
                border-radius: 4px;
            }
            .custom-status.sesuai {
                border-color: #3b82f6;
                background-color: #bfdbfe;
                color: #1d4ed8;
            }
            .custom-status.sesuai .custom-box {
                border-color: #3b82f6;
                background-color: #bfdbfe;
            }
            .custom-status.sesuai .custom-box::after {
                content: '';
                position: absolute;
                left: 5px;
                top: 1px;
                width: 5px;
                height: 10px;
                border: solid #1d4ed8;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }
            .custom-status.tidak_sesuai {
                border-color: #ef4444;
                background-color: #fecaca;
                color: #b91c1c;
            }
            .custom-status.tidak_sesuai .custom-box {
                border-color: #ef4444;
                background-color: #fecaca;
            }
            .custom-status.tidak_sesuai .custom-box::after {
                content: '';
                position: absolute;
                left: 5px;
                top: 1px;
                width: 5px;
                height: 10px;
                border: solid #b91c1c;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }
            .custom-status.pending {
                border-color: #f59e0b;
                background-color: #fef3c7;
                color: #b45309;
            }
            .custom-status.pending .custom-box {
                border-color: #f59e0b;
                background-color: #fef3c7;
            }
        </style>

        @php
            $status = $data->validasiberkas3;
        @endphp

        <div class="custom-status {{ $status == 'sesuai' ? 'sesuai' : ($status == 'tidak_sesuai' ? 'tidak_sesuai' : 'pending') }}">
            <span class="custom-box"></span>
            @if ($status === 'tidak_sesuai')
                Silahkan Lakukan Perbaikan
            @elseif ($status === 'sesuai')
                Berkas Anda Sudah Sesuai
            @else
                Sedang Di Verifikasi DPUPR
            @endif
        </div>
    </div>
</th>
@endcanany

                                            @canany(['superadmin', 'admin'])
                                                <th class="text-center" style="background-color: #e2e8f0; color: black;">
                                                    <div style="display: flex; justify-content: center; gap: 20px;">
                                                        <label class="custom-radio">
                                                            <input type="radio" name="validasiberkas3" value="sesuai"
                                                                {{ $data->validasiberkas3 == 'sesuai' ? 'checked' : '' }}>
                                                            <span class="custom-box"></span>
                                                            Sesuai
                                                        </label>

                                                        <label class="custom-radio">
                                                            <input type="radio" name="validasiberkas3" value="tidak_sesuai"
                                                                {{ $data->validasiberkas3 == 'tidak_sesuai' ? 'checked' : '' }}>
                                                            <span class="custom-box"></span>
                                                            Tidak Sesuai
                                                        </label>
                                                    </div>
                                                </th>
                                            @endcanany

                                    </tr>



                                    {{-- -------------------------------- --}}
                                    {{-- VERIFIKASI OSS --}}
                                    {{-- <tr>
                                        <th style="width: 400px; text-align:left; font-size: 16px; background-color: #e2e8f0; color: black;">
    <i class="bi bi-briefcase-fill"></i> FKUB Kemenag Blora
</th>

                                        <th class="text-center" style="background-color: #e2e8f0; color: black;">
<div style="display: flex; justify-content: center;">
    <button type="button" class="button-modern"
        style="
            border-radius: 15px;
            padding: 8px 20px;
            background-color: #929ba3;
            color: white;
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            transition: all 0.3s ease;
            transform: translateY(0);
        "
        onmouseover="this.style.backgroundColor='#ffffff'; this.style.color='#6c757d'; this.style.border='1px solid #6c757d'; this.style.boxShadow='0 6px 10px rgba(0, 0, 0, 0.25)'; this.style.transform='translateY(-2px)'"
        onmouseout="this.style.backgroundColor='#6c757d'; this.style.color='white'; this.style.border='none'; this.style.boxShadow='0 4px 6px rgba(0, 0, 0, 0.2)'; this.style.transform='translateY(0)'"
        data-bs-toggle="modal" data-bs-target="#modalLampiranoss{{ $data->id }}">
        <i class="bi bi-eye" style="margin-right: 6px;"></i> Lihat
    </button>
</div>


                                                <!-- Modal Ijazah -->
                                                <div class="modal fade" id="modalLampiranoss{{ $data->id }}" tabindex="-1" aria-labelledby="modalLampiranossLbl{{ $data->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <img src="/assets/abgblora/logo/logokabupatenblora.png" width="25" class="me-2">
                                                                <img src="/assets/icon/pupr.png" width="25" class="me-2">
                                                                <h5 class="modal-title" id="modalLampiranossLbl{{ $data->id }}">FKUB Kemanag Blora .pdf</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <div style="margin-top: 10px;">
                                                                    @if($data->lampiranoss && file_exists(public_path('storage/' . $data->lampiranoss)))
                                                                    <!-- Display the default iframe when the file exists in the storage -->
                                                                    <iframe src="{{ asset('storage/' . $data->lampiranoss) }}" frameborder="0" width="100%" height="750px"></iframe>
                                                                @elseif($data->lampiranoss)
                                                                    <!-- Display the iframe with the updated file -->
                                                                    <iframe src="{{ asset($data->lampiranoss) }}" frameborder="0" width="100%" height="750px"></iframe>
                                                                @else
                                                                    <!-- Optional: Show a placeholder if there's no file available -->
                                                                    <p>Data Belum Di Lengkapi !!</p>
                                                                @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </th>

                                             @canany(['dinas'])
<th class="text-center" style="background-color: #e2e8f0; color: black;">
    <div style="display: flex; justify-content: center; padding: 10px 0;">
        <style>
            .custom-status {
                position: relative;
                padding-left: 35px;
                padding-right: 15px;
                padding-top: 10px;
                padding-bottom: 10px;
                background-color: #fff;
                border: 2px solid #cbd5e0;
                border-radius: 12px;
                font-weight: 600;
                user-select: none;
                display: inline-block;
                min-width: 180px;
                color: #555;
                text-align: center;
            }
            .custom-status .custom-box {
                position: absolute;
                top: 10px;
                left: 10px;
                height: 18px;
                width: 18px;
                background-color: #fff;
                border: 2px solid #cbd5e0;
                border-radius: 4px;
            }
            .custom-status.sesuai {
                border-color: #3b82f6;
                background-color: #bfdbfe;
                color: #1d4ed8;
            }
            .custom-status.sesuai .custom-box {
                border-color: #3b82f6;
                background-color: #bfdbfe;
            }
            .custom-status.sesuai .custom-box::after {
                content: '';
                position: absolute;
                left: 5px;
                top: 1px;
                width: 5px;
                height: 10px;
                border: solid #1d4ed8;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }
            .custom-status.tidak_sesuai {
                border-color: #ef4444;
                background-color: #fecaca;
                color: #b91c1c;
            }
            .custom-status.tidak_sesuai .custom-box {
                border-color: #ef4444;
                background-color: #fecaca;
            }
            .custom-status.tidak_sesuai .custom-box::after {
                content: '';
                position: absolute;
                left: 5px;
                top: 1px;
                width: 5px;
                height: 10px;
                border: solid #b91c1c;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }
            .custom-status.pending {
                border-color: #f59e0b;
                background-color: #fef3c7;
                color: #b45309;
            }
            .custom-status.pending .custom-box {
                border-color: #f59e0b;
                background-color: #fef3c7;
            }
        </style>

        @php
            $status = $data->verifikasioss;
        @endphp

        <div class="custom-status {{ $status == 'sesuai' ? 'sesuai' : ($status == 'tidak_sesuai' ? 'tidak_sesuai' : 'pending') }}">
            <span class="custom-box"></span>
            @if ($status === 'tidak_sesuai')
                Silahkan Lakukan Perbaikan
            @elseif ($status === 'sesuai')
                Berkas Anda Sudah Sesuai
            @else
                Sedang Di Verifikasi DPUPR
            @endif
        </div>
    </div>
</th>
@endcanany

                                            @canany(['superadmin', 'admin'])
                                                <th class="text-center" style="background-color: #e2e8f0; color: black;">
                                                    <div style="display: flex; justify-content: center; gap: 20px;">
                                                        <label class="custom-radio">
                                                            <input type="radio" name="verifikasioss" value="sesuai"
                                                                {{ $data->verifikasioss == 'sesuai' ? 'checked' : '' }}>
                                                            <span class="custom-box"></span>
                                                            Sesuai
                                                        </label>

                                                        <label class="custom-radio">
                                                            <input type="radio" name="verifikasioss" value="tidak_sesuai"
                                                                {{ $data->verifikasioss == 'tidak_sesuai' ? 'checked' : '' }}>
                                                            <span class="custom-box"></span>
                                                            Tidak Sesuai
                                                        </label>
                                                    </div>
                                                </th>
                                            @endcanany

                                    </tr> --}}

                                    {{-- -------------------------------- --}}
                                    {{-- BUKTI PBB --}}
                                    <tr>
                                        <th style="width: 400px; text-align:left; font-size: 16px; background-color: #e2e8f0; color: black;">
    <i class="bi bi-receipt-cutoff"></i> KTP
</th>

                                        <th class="text-center" style="background-color: #e2e8f0; color: black;">
<div style="display: flex; justify-content: center;">
    <button type="button" class="button-berkas"
        data-bs-toggle="modal" data-bs-target="#modalBuktipbb{{ $data->id }}">
        <i class="bi bi-eye" style="margin-right: 6px;"></i> Lihat
    </button>
</div>


                                                <!-- Modal Ijazah -->
                                                <div class="modal fade" id="modalBuktipbb{{ $data->id }}" tabindex="-1" aria-labelledby="modalBuktipbbLbl{{ $data->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <img src="/assets/abgblora/logo/logokabupatenblora.png" width="25" class="me-2">
                                                                <img src="/assets/icon/pupr.png" width="25" class="me-2">
                                                                <h5 class="modal-title" id="modalBuktipbbLbl{{ $data->id }}">KTP.pdf</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <div style="margin-top: 10px;">
                                                                    @if($data->ktp && file_exists(public_path('storage/' . $data->ktp)))
                                                                    <!-- Display the default iframe when the file exists in the storage -->
                                                                    <iframe src="{{ asset('storage/' . $data->ktp) }}" frameborder="0" width="100%" height="750px"></iframe>
                                                                @elseif($data->ktp)
                                                                    <!-- Display the iframe with the updated file -->
                                                                    <iframe src="{{ asset($data->ktp) }}" frameborder="0" width="100%" height="750px"></iframe>
                                                                @else
                                                                    <!-- Optional: Show a placeholder if there's no file available -->
                                                                    <p>Data Belum Di Lengkapi !!</p>
                                                                @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </th>

                                             @canany(['dinas', 'pemohon'])
<th class="text-center" style="background-color: #e2e8f0; color: black;">
    <div style="display: flex; justify-content: center; padding: 10px 0;">
        <style>
            .custom-status {
                position: relative;
                padding-left: 35px;
                padding-right: 15px;
                padding-top: 10px;
                padding-bottom: 10px;
                background-color: #fff;
                border: 2px solid #cbd5e0;
                border-radius: 12px;
                font-weight: 600;
                user-select: none;
                display: inline-block;
                min-width: 180px;
                color: #555;
                text-align: center;
            }
            .custom-status .custom-box {
                position: absolute;
                top: 10px;
                left: 10px;
                height: 18px;
                width: 18px;
                background-color: #fff;
                border: 2px solid #cbd5e0;
                border-radius: 4px;
            }
            .custom-status.sesuai {
                border-color: #3b82f6;
                background-color: #bfdbfe;
                color: #1d4ed8;
            }
            .custom-status.sesuai .custom-box {
                border-color: #3b82f6;
                background-color: #bfdbfe;
            }
            .custom-status.sesuai .custom-box::after {
                content: '';
                position: absolute;
                left: 5px;
                top: 1px;
                width: 5px;
                height: 10px;
                border: solid #1d4ed8;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }
            .custom-status.tidak_sesuai {
                border-color: #ef4444;
                background-color: #fecaca;
                color: #b91c1c;
            }
            .custom-status.tidak_sesuai .custom-box {
                border-color: #ef4444;
                background-color: #fecaca;
            }
            .custom-status.tidak_sesuai .custom-box::after {
                content: '';
                position: absolute;
                left: 5px;
                top: 1px;
                width: 5px;
                height: 10px;
                border: solid #b91c1c;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }
            .custom-status.pending {
                border-color: #f59e0b;
                background-color: #fef3c7;
                color: #b45309;
            }
            .custom-status.pending .custom-box {
                border-color: #f59e0b;
                background-color: #fef3c7;
            }
        </style>

        @php
            $status = $data->validasiberkas4;
        @endphp

        <div class="custom-status {{ $status == 'sesuai' ? 'sesuai' : ($status == 'tidak_sesuai' ? 'tidak_sesuai' : 'pending') }}">
            <span class="custom-box"></span>
            @if ($status === 'tidak_sesuai')
                Silahkan Lakukan Perbaikan
            @elseif ($status === 'sesuai')
                Berkas Anda Sudah Sesuai
            @else
                Sedang Di Verifikasi DPUPR
            @endif
        </div>
    </div>
</th>
@endcanany

                                            @canany(['superadmin', 'admin'])
                                                <th class="text-center" style="background-color: #e2e8f0; color: black;">
                                                    <div style="display: flex; justify-content: center; gap: 20px;">
                                                        <label class="custom-radio">
                                                            <input type="radio" name="validasiberkas4" value="sesuai"
                                                                {{ $data->validasiberkas4 == 'sesuai' ? 'checked' : '' }}>
                                                            <span class="custom-box"></span>
                                                            Sesuai
                                                        </label>

                                                        <label class="custom-radio">
                                                            <input type="radio" name="validasiberkas4" value="tidak_sesuai"
                                                                {{ $data->validasiberkas4 == 'tidak_sesuai' ? 'checked' : '' }}>
                                                            <span class="custom-box"></span>
                                                            Tidak Sesuai
                                                        </label>
                                                    </div>
                                                </th>
                                            @endcanany

                                    </tr>

                                    {{-- -------------------------------- --}}
                                    {{-- DOKUMEN Validasi Tata Ruang --}}
                                    <tr>
                                        <th style="width: 400px; text-align:left; font-size: 16px; background-color: #e2e8f0; color: black;">
    <i class="bi bi-check2-square"></i> SK Bupati
</th>

                                        <th class="text-center" style="background-color: #e2e8f0; color: black;">
<div style="display: flex; justify-content: center;">
    <button type="button" class="button-berkas"
        data-bs-toggle="modal" data-bs-target="#modalValdpupr{{ $data->id }}">
        <i class="bi bi-eye" style="margin-right: 6px;"></i> Lihat
    </button>
</div>


                                                <!-- Modal Ijazah -->
                                                <div class="modal fade" id="modalValdpupr{{ $data->id }}" tabindex="-1" aria-labelledby="modalValdpuprLbl{{ $data->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <img src="/assets/abgblora/logo/logokabupatenblora.png" width="25" class="me-2">
                                                                <img src="/assets/icon/pupr.png" width="25" class="me-2">
                                                                <h5 class="modal-title" id="modalValdpuprLbl{{ $data->id }}">SK Bupati.pdf</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <div style="margin-top: 10px;">
                                                                    @if($data->sk && file_exists(public_path('storage/' . $data->sk)))
                                                                    <!-- Display the default iframe when the file exists in the storage -->
                                                                    <iframe src="{{ asset('storage/' . $data->sk) }}" frameborder="0" width="100%" height="750px"></iframe>
                                                                @elseif($data->sk)
                                                                    <!-- Display the iframe with the updated file -->
                                                                    <iframe src="{{ asset($data->sk) }}" frameborder="0" width="100%" height="750px"></iframe>
                                                                @else
                                                                    <!-- Optional: Show a placeholder if there's no file available -->
                                                                    <p>Data Belum Di Lengkapi !!</p>
                                                                @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </th>

                                             @canany(['dinas', 'pemohon'])
<th class="text-center" style="background-color: #e2e8f0; color: black;">
    <div style="display: flex; justify-content: center; padding: 10px 0;">
        <style>
            .custom-status {
                position: relative;
                padding-left: 35px;
                padding-right: 15px;
                padding-top: 10px;
                padding-bottom: 10px;
                background-color: #fff;
                border: 2px solid #cbd5e0;
                border-radius: 12px;
                font-weight: 600;
                user-select: none;
                display: inline-block;
                min-width: 180px;
                color: #555;
                text-align: center;
            }
            .custom-status .custom-box {
                position: absolute;
                top: 10px;
                left: 10px;
                height: 18px;
                width: 18px;
                background-color: #fff;
                border: 2px solid #cbd5e0;
                border-radius: 4px;
            }
            .custom-status.sesuai {
                border-color: #3b82f6;
                background-color: #bfdbfe;
                color: #1d4ed8;
            }
            .custom-status.sesuai .custom-box {
                border-color: #3b82f6;
                background-color: #bfdbfe;
            }
            .custom-status.sesuai .custom-box::after {
                content: '';
                position: absolute;
                left: 5px;
                top: 1px;
                width: 5px;
                height: 10px;
                border: solid #1d4ed8;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }
            .custom-status.tidak_sesuai {
                border-color: #ef4444;
                background-color: #fecaca;
                color: #b91c1c;
            }
            .custom-status.tidak_sesuai .custom-box {
                border-color: #ef4444;
                background-color: #fecaca;
            }
            .custom-status.tidak_sesuai .custom-box::after {
                content: '';
                position: absolute;
                left: 5px;
                top: 1px;
                width: 5px;
                height: 10px;
                border: solid #b91c1c;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }
            .custom-status.pending {
                border-color: #f59e0b;
                background-color: #fef3c7;
                color: #b45309;
            }
            .custom-status.pending .custom-box {
                border-color: #f59e0b;
                background-color: #fef3c7;
            }
        </style>

        @php
            $status = $data->validasiberkas5;
        @endphp

        <div class="custom-status {{ $status == 'sesuai' ? 'sesuai' : ($status == 'tidak_sesuai' ? 'tidak_sesuai' : 'pending') }}">
            <span class="custom-box"></span>
            @if ($status === 'tidak_sesuai')
                Silahkan Lakukan Perbaikan
            @elseif ($status === 'sesuai')
                Berkas Anda Sudah Sesuai
            @else
                Sedang Di Verifikasi DPUPR
            @endif
        </div>
    </div>
</th>
@endcanany

                                            @canany(['superadmin', 'admin'])
                                                <th class="text-center" style="background-color: #e2e8f0; color: black;">
                                                    <div style="display: flex; justify-content: center; gap: 20px;">
                                                        <label class="custom-radio">
                                                            <input type="radio" name="validasiberkas5" value="sesuai"
                                                                {{ $data->validasiberkas5 == 'sesuai' ? 'checked' : '' }}>
                                                            <span class="custom-box"></span>
                                                            Sesuai
                                                        </label>

                                                        <label class="custom-radio">
                                                            <input type="radio" name="validasiberkas5" value="tidak_sesuai"
                                                                {{ $data->validasiberkas5 == 'tidak_sesuai' ? 'checked' : '' }}>
                                                            <span class="custom-box"></span>
                                                            Tidak Sesuai
                                                        </label>
                                                    </div>
                                                </th>
                                            @endcanany

                                    </tr>

                                    {{-- -------------------------------- --}}
                                    {{-- DOKUMEN SITEPLAN --}}
                                    <tr>
                                        <th style="width: 400px; text-align:left; font-size: 16px; background-color: #e2e8f0; color: black;">
    <i class="bi bi-map-fill"></i> Sertifikat Tanah
</th>

                                        <th class="text-center" style="background-color: #e2e8f0; color: black;">
<div style="display: flex; justify-content: center;">
    <button type="button" class="button-berkas"
        data-bs-toggle="modal" data-bs-target="#modalSiteplan{{ $data->id }}">
        <i class="bi bi-eye" style="margin-right: 6px;"></i> Lihat
    </button>
</div>


                                                <!-- Modal Ijazah -->
                                                <div class="modal fade" id="modalSiteplan{{ $data->id }}" tabindex="-1" aria-labelledby="modalSiteplanLbl{{ $data->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <img src="/assets/abgblora/logo/logokabupatenblora.png" width="25" class="me-2">
                                                                <img src="/assets/icon/pupr.png" width="25" class="me-2">
                                                                <h5 class="modal-title" id="modalSiteplanLbl{{ $data->id }}">Sertifikat Tanah .pdf</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <div style="margin-top: 10px;">
                                                                    @if($data->sertifikattanah && file_exists(public_path('storage/' . $data->sertifikattanah)))
                                                                    <!-- Display the default iframe when the file exists in the storage -->
                                                                    <iframe src="{{ asset('storage/' . $data->sertifikattanah) }}" frameborder="0" width="100%" height="750px"></iframe>
                                                                @elseif($data->sertifikattanah)
                                                                    <!-- Display the iframe with the updated file -->
                                                                    <iframe src="{{ asset($data->sertifikattanah) }}" frameborder="0" width="100%" height="750px"></iframe>
                                                                @else
                                                                    <!-- Optional: Show a placeholder if there's no file available -->
                                                                    <p>Data Belum Di Lengkapi !!</p>
                                                                @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </th>

                                             @canany(['dinas', 'pemohon'])
<th class="text-center" style="background-color: #e2e8f0; color: black;">
    <div style="display: flex; justify-content: center; padding: 10px 0;">
        <style>
            .custom-status {
                position: relative;
                padding-left: 35px;
                padding-right: 15px;
                padding-top: 10px;
                padding-bottom: 10px;
                background-color: #fff;
                border: 2px solid #cbd5e0;
                border-radius: 12px;
                font-weight: 600;
                user-select: none;
                display: inline-block;
                min-width: 180px;
                color: #555;
                text-align: center;
            }
            .custom-status .custom-box {
                position: absolute;
                top: 10px;
                left: 10px;
                height: 18px;
                width: 18px;
                background-color: #fff;
                border: 2px solid #cbd5e0;
                border-radius: 4px;
            }
            .custom-status.sesuai {
                border-color: #3b82f6;
                background-color: #bfdbfe;
                color: #1d4ed8;
            }
            .custom-status.sesuai .custom-box {
                border-color: #3b82f6;
                background-color: #bfdbfe;
            }
            .custom-status.sesuai .custom-box::after {
                content: '';
                position: absolute;
                left: 5px;
                top: 1px;
                width: 5px;
                height: 10px;
                border: solid #1d4ed8;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }
            .custom-status.tidak_sesuai {
                border-color: #ef4444;
                background-color: #fecaca;
                color: #b91c1c;
            }
            .custom-status.tidak_sesuai .custom-box {
                border-color: #ef4444;
                background-color: #fecaca;
            }
            .custom-status.tidak_sesuai .custom-box::after {
                content: '';
                position: absolute;
                left: 5px;
                top: 1px;
                width: 5px;
                height: 10px;
                border: solid #b91c1c;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }
            .custom-status.pending {
                border-color: #f59e0b;
                background-color: #fef3c7;
                color: #b45309;
            }
            .custom-status.pending .custom-box {
                border-color: #f59e0b;
                background-color: #fef3c7;
            }
        </style>

        @php
            $status = $data->validasiberkas6;
        @endphp

        <div class="custom-status {{ $status == 'sesuai' ? 'sesuai' : ($status == 'tidak_sesuai' ? 'tidak_sesuai' : 'pending') }}">
            <span class="custom-box"></span>
            @if ($status === 'tidak_sesuai')
                Silahkan Lakukan Perbaikan
            @elseif ($status === 'sesuai')
                Berkas Anda Sudah Sesuai
            @else
                Sedang Di Verifikasi DPUPR
            @endif
        </div>
    </div>
</th>
@endcanany

                                            @canany(['superadmin', 'admin'])
                                                <th class="text-center" style="background-color: #e2e8f0; color: black;">
                                                    <div style="display: flex; justify-content: center; gap: 20px;">
                                                        <label class="custom-radio">
                                                            <input type="radio" name="validasiberkas6" value="sesuai"
                                                                {{ $data->validasiberkas6 == 'sesuai' ? 'checked' : '' }}>
                                                            <span class="custom-box"></span>
                                                            Sesuai
                                                        </label>

                                                        <label class="custom-radio">
                                                            <input type="radio" name="validasiberkas6" value="tidak_sesuai"
                                                                {{ $data->validasiberkas6 == 'tidak_sesuai' ? 'checked' : '' }}>
                                                            <span class="custom-box"></span>
                                                            Tidak Sesuai
                                                        </label>
                                                    </div>
                                                </th>
                                            @endcanany

                                    </tr>

                                    {{-- -------------------------------- --}}
                                    {{-- DOKUMEN TANDA TANGAN --}}
                                    <tr>
                                      <th style="width: 400px; text-align:left; font-size: 16px; background-color: #e2e8f0; color: black;">
    <i class="bi bi-pencil-fill"></i> Kartu Inventaris Barang
</th>

                                        <th class="text-center" style="background-color: #e2e8f0; color: black;">
<div style="display: flex; justify-content: center;">
    <button type="button" class="button-berkas"
        data-bs-toggle="modal" data-bs-target="#modalTandatangan{{ $data->id }}">
        <i class="bi bi-eye" style="margin-right: 6px;"></i> Lihat
    </button>
</div>


                                                <!-- Modal Ijazah -->
                                                <div class="modal fade" id="modalTandatangan{{ $data->id }}" tabindex="-1" aria-labelledby="modalTandatanganLbl{{ $data->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <img src="/assets/abgblora/logo/logokabupatenblora.png" width="25" class="me-2">
                                                                <img src="/assets/icon/pupr.png" width="25" class="me-2">
                                                                <h5 class="modal-title" id="modalTandatanganLbl{{ $data->id }}">Kartu Inventaris Barang</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <div style="margin-top: 10px;">
                                                                    @if($data->kib && file_exists(public_path('storage/' . $data->kib)))
                                                                    <!-- Display the default iframe when the file exists in the storage -->
                                                                    <iframe src="{{ asset('storage/' . $data->kib) }}" frameborder="0" width="100%" height="750px"></iframe>
                                                                @elseif($data->kib)
                                                                    <!-- Display the iframe with the updated file -->
                                                                    <iframe src="{{ asset($data->kib) }}" frameborder="0" width="100%" height="750px"></iframe>
                                                                @else
                                                                    <!-- Optional: Show a placeholder if there's no file available -->
                                                                    <p>Data Belum Di Lengkapi !!</p>
                                                                @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </th>

                                             @canany(['dinas', 'pemohon'])
<th class="text-center" style="background-color: #e2e8f0; color: rgb(100, 45, 45);">
    <div style="display: flex; justify-content: center; padding: 10px 0;">
        <style>
            .custom-status {
                position: relative;
                padding-left: 35px;
                padding-right: 15px;
                padding-top: 10px;
                padding-bottom: 10px;
                background-color: #fff;
                border: 2px solid #cbd5e0;
                border-radius: 12px;
                font-weight: 600;
                user-select: none;
                display: inline-block;
                min-width: 180px;
                color: #555;
                text-align: center;
            }
            .custom-status .custom-box {
                position: absolute;
                top: 10px;
                left: 10px;
                height: 18px;
                width: 18px;
                background-color: #fff;
                border: 2px solid #cbd5e0;
                border-radius: 4px;
            }
            .custom-status.sesuai {
                border-color: #3b82f6;
                background-color: #bfdbfe;
                color: #1d4ed8;
            }
            .custom-status.sesuai .custom-box {
                border-color: #3b82f6;
                background-color: #bfdbfe;
            }
            .custom-status.sesuai .custom-box::after {
                content: '';
                position: absolute;
                left: 5px;
                top: 1px;
                width: 5px;
                height: 10px;
                border: solid #1d4ed8;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }
            .custom-status.tidak_sesuai {
                border-color: #ef4444;
                background-color: #fecaca;
                color: #b91c1c;
            }
            .custom-status.tidak_sesuai .custom-box {
                border-color: #ef4444;
                background-color: #fecaca;
            }
            .custom-status.tidak_sesuai .custom-box::after {
                content: '';
                position: absolute;
                left: 5px;
                top: 1px;
                width: 5px;
                height: 10px;
                border: solid #b91c1c;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }
            .custom-status.pending {
                border-color: #f59e0b;
                background-color: #fef3c7;
                color: #b45309;
            }
            .custom-status.pending .custom-box {
                border-color: #f59e0b;
                background-color: #fef3c7;
            }
        </style>

        @php
            $status = $data->validasiberkas7;
        @endphp

        <div class="custom-status {{ $status == 'sesuai' ? 'sesuai' : ($status == 'tidak_sesuai' ? 'tidak_sesuai' : 'pending') }}">
            <span class="custom-box"></span>
            @if ($status === 'tidak_sesuai')
                Silahkan Lakukan Perbaikan
            @elseif ($status === 'sesuai')
                Berkas Anda Sudah Sesuai
            @else
                Sedang Di Verifikasi DPUPR
            @endif
        </div>
    </div>
</th>
@endcanany

                                            @canany(['superadmin', 'admin'])
                                                <th class="text-center" style="background-color: #e2e8f0; color: black;">
                                                    <div style="display: flex; justify-content: center; gap: 20px;">
                                                        <label class="custom-radio">
                                                            <input type="radio" name="validasiberkas7" value="sesuai"
                                                                {{ $data->validasiberkas7 == 'sesuai' ? 'checked' : '' }}>
                                                            <span class="custom-box"></span>
                                                            Sesuai
                                                        </label>

                                                        <label class="custom-radio">
                                                            <input type="radio" name="validasiberkas7" value="tidak_sesuai"
                                                                {{ $data->validasiberkas7 == 'tidak_sesuai' ? 'checked' : '' }}>
                                                            <span class="custom-box"></span>
                                                            Tidak Sesuai
                                                        </label>
                                                    </div>
                                                </th>
                                            @endcanany

                                    </tr>

                                    {{-- -------------------------------- --}}
                                    {{-- DOKUMEN TANDA TANGAN --}}
                                    <tr>
                                      <th style="width: 400px; text-align:left; font-size: 16px; background-color: #e2e8f0; color: black;">
    <i class="bi bi-pencil-fill"></i> PBG/ Surat Tidak Memiliki PBG
</th>

                                        <th class="text-center" style="background-color: #e2e8f0; color: black;">
<div style="display: flex; justify-content: center;">
    <button type="button" class="button-berkas"
        data-bs-toggle="modal" data-bs-target="#modalPBG{{ $data->id }}">
        <i class="bi bi-eye" style="margin-right: 6px;"></i> Lihat
    </button>
</div>


                                                <!-- Modal Ijazah -->
                                                <div class="modal fade" id="modalPBG{{ $data->id }}" tabindex="-1" aria-labelledby="modalPBGLbl{{ $data->id }}" aria-hidden="true">
                                                    <div class="modal-dialog modal-xl modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <img src="/assets/abgblora/logo/logokabupatenblora.png" width="25" class="me-2">
                                                                <img src="/assets/icon/pupr.png" width="25" class="me-2">
                                                                <h5 class="modal-title" id="modalPBGLbl{{ $data->id }}">PBG/ Surat Tidak Memiliki PBG</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                            </div>
                                                            <div class="modal-body text-center">
                                                                <div style="margin-top: 10px;">
                                                                    @if($data->pbg && file_exists(public_path('storage/' . $data->pbg)))
                                                                    <!-- Display the default iframe when the file exists in the storage -->
                                                                    <iframe src="{{ asset('storage/' . $data->pbg) }}" frameborder="0" width="100%" height="750px"></iframe>
                                                                @elseif($data->pbg)
                                                                    <!-- Display the iframe with the updated file -->
                                                                    <iframe src="{{ asset($data->pbg) }}" frameborder="0" width="100%" height="750px"></iframe>
                                                                @else
                                                                    <!-- Optional: Show a placeholder if there's no file available -->
                                                                    <p>Data Belum Di Lengkapi !!</p>
                                                                @endif

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </th>

                                             @canany(['dinas', 'pemohon'])
<th class="text-center" style="background-color: #e2e8f0; color: rgb(100, 45, 45);">
    <div style="display: flex; justify-content: center; padding: 10px 0;">
        <style>
            .custom-status {
                position: relative;
                padding-left: 35px;
                padding-right: 15px;
                padding-top: 10px;
                padding-bottom: 10px;
                background-color: #fff;
                border: 2px solid #cbd5e0;
                border-radius: 12px;
                font-weight: 600;
                user-select: none;
                display: inline-block;
                min-width: 180px;
                color: #555;
                text-align: center;
            }
            .custom-status .custom-box {
                position: absolute;
                top: 10px;
                left: 10px;
                height: 18px;
                width: 18px;
                background-color: #fff;
                border: 2px solid #cbd5e0;
                border-radius: 4px;
            }
            .custom-status.sesuai {
                border-color: #3b82f6;
                background-color: #bfdbfe;
                color: #1d4ed8;
            }
            .custom-status.sesuai .custom-box {
                border-color: #3b82f6;
                background-color: #bfdbfe;
            }
            .custom-status.sesuai .custom-box::after {
                content: '';
                position: absolute;
                left: 5px;
                top: 1px;
                width: 5px;
                height: 10px;
                border: solid #1d4ed8;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }
            .custom-status.tidak_sesuai {
                border-color: #ef4444;
                background-color: #fecaca;
                color: #b91c1c;
            }
            .custom-status.tidak_sesuai .custom-box {
                border-color: #ef4444;
                background-color: #fecaca;
            }
            .custom-status.tidak_sesuai .custom-box::after {
                content: '';
                position: absolute;
                left: 5px;
                top: 1px;
                width: 5px;
                height: 10px;
                border: solid #b91c1c;
                border-width: 0 2px 2px 0;
                transform: rotate(45deg);
            }
            .custom-status.pending {
                border-color: #f59e0b;
                background-color: #fef3c7;
                color: #b45309;
            }
            .custom-status.pending .custom-box {
                border-color: #f59e0b;
                background-color: #fef3c7;
            }
        </style>

        @php
            $status = $data->validasiberkas8;
        @endphp

        <div class="custom-status {{ $status == 'sesuai' ? 'sesuai' : ($status == 'tidak_sesuai' ? 'tidak_sesuai' : 'pending') }}">
            <span class="custom-box"></span>
            @if ($status === 'tidak_sesuai')
                Silahkan Lakukan Perbaikan
            @elseif ($status === 'sesuai')
                Berkas Anda Sudah Sesuai
            @else
                Sedang Di Verifikasi DPUPR
            @endif
        </div>
    </div>
</th>
@endcanany

                                            @canany(['superadmin', 'admin'])
                                                <th class="text-center" style="background-color: #e2e8f0; color: black;">
                                                    <div style="display: flex; justify-content: center; gap: 20px;">
                                                        <label class="custom-radio">
                                                            <input type="radio" name="validasiberkas8" value="sesuai"
                                                                {{ $data->validasiberkas8 == 'sesuai' ? 'checked' : '' }}>
                                                            <span class="custom-box"></span>
                                                            Sesuai
                                                        </label>

                                                        <label class="custom-radio">
                                                            <input type="radio" name="validasiberkas8" value="tidak_sesuai"
                                                                {{ $data->validasiberkas8 == 'tidak_sesuai' ? 'checked' : '' }}>
                                                            <span class="custom-box"></span>
                                                            Tidak Sesuai
                                                        </label>
                                                    </div>
                                                </th>
                                            @endcanany

                                    </tr>


                                </thead>
                            </table>
                            <br><br><br>
                        </div>
                    </div>

                    @canany(['dinas', 'pemohon'])

<div class="mb-3" style="margin-top: -50px;">
    <label for="catatan1" class="form-label" style="color: navy">
        <i class="bi bi-card-text me-1" style="color: navy;"></i>
        <span style="color: navy;">Catatan Keterangan Berkas</span>
    </label>
    <div class="form-control" style="min-height: 400px; white-space: pre-wrap; background-color: #f8f9fa; color: red;">
        {{ $data->catatan1 ?? '-' }}
    </div>
</div>


                    @endcan

                    @canany(['superadmin', 'admin'])


<div class="mb-3" style="margin-top: -50px;">
    <label for="catatan1" class="form-label">
        <i class="bi bi-card-text me-1"></i> Catatan Keterangan Berkas
    </label>

    <textarea name="catatan1" id="catatan1" class="form-control"
        rows="10"
        style="resize: vertical; width: 100%; color: red;"
        placeholder="Tulis catatan jika diperlukan...">{{ old('catatan1', $data->catatan1 ?? '') }}</textarea>
</div>

                    @endcanany

                </td>

    </div>
</div>
</div>

                @canany(['superadmin', 'admin'])

                <div style="display: flex; justify-content: flex-end; margin-bottom:20px;">
                                    <div class="flex justify-end">
                                      <button class="button-modern" type="button" onclick="openModal()">
                                            <i class="bi bi-save2" style="margin-right: 8px;"></i> Simpan Validasi
                                        </button>


                                    </div>
                                    <!-- Modal Konfirmasi -->
                                    <div id="confirmModal" style="display: none; position: fixed; inset: 0; background-color: rgba(0, 0, 0, 0.5); z-index: 1000; justify-content: center; align-items: center;">
                                        <div style="background: white; padding: 24px 30px; border-radius: 12px; max-width: 400px; width: 90%; text-align: center; box-shadow: 0 10px 25px rgba(0,0,0,0.2);">
                                          <p style="font-size: 16px; font-weight: 600; margin-bottom: 20px;">
                                            Apakah Anda ingin memvalidasi berkas permohonan ini?
                                        </p>

                                          <!-- Tombol -->
                                          <div style="display: flex; justify-content: center; gap: 12px;">
                                            <button id="confirmSubmitBtn"
                                            onclick="submitForm()"
                                            style="background-color: #10B981; color: white; padding: 8px 16px; border-radius: 8px; border: none; transition: 0.3s; display: flex; align-items: center; gap: 6px;"
                                            onmouseover="this.style.backgroundColor='white'; this.style.color='black'; this.querySelector('svg').style.fill='black';"
                                            onmouseout="this.style.backgroundColor='#10B981'; this.style.color='white'; this.querySelector('svg').style.fill='white';">
                                        <!-- Telegram SVG -->
                                        <svg xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 448 512" fill="white">
                                            <path d="M446.7 68.8c-5.7-4.8-13.8-5.7-20.3-2.2L26.1 263.5c-7.2 3.7-11.4 11.5-10.4 19.5s6.7 14.5 14.4 16.5l85.1 23.3 40.6 98.8c2.9 7.1 9.6 11.7 17.1 11.7h.4c7.7-.2 14.4-5.1 16.8-12.3l33.2-96.5 109.7 88.1c3.5 2.8 7.9 4.3 12.3 4.3 2.5 0 5-.5 7.4-1.4 6.4-2.5 11.2-8.2 12.7-15.1L448 89.4c1.3-7.6-1.6-15.3-7.3-20.6z"/>
                                        </svg>
                                        Ya
                                    </button>

                                    <!-- Tombol Batal dengan ikon X (SVG) -->
                                    <button type="button"
                                            onclick="closeModal()"
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

                                    <!-- Script -->
                                    <script>
                                    function openModal() {
                                        const modal = document.getElementById("confirmModal");
                                        if (modal) modal.style.display = "flex";
                                    }

                                    function closeModal() {
                                        const modal = document.getElementById("confirmModal");
                                        if (modal) modal.style.display = "none";
                                    }

                                    </script>


                @endcanany

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


