<style>
    /* CSS Modern */
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

    /* Button Styles */
    .button-container {
        display: flex;
        flex-direction: column;
        gap: 12px;
        margin-top: 20px;
    }


    /* Responsive */
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
            <div class="d-flex align-items-center mb-3 mb-md-0">
                <div class="me-3">
                    <i class="bi bi-clipboard-data-fill text-primary" style="font-size: 2rem;"></i>
                </div>
                <div>
                    <h4 class="mb-1" style="color: #1f2937; font-size: 1.5rem;">Dokumen Persyaratan Pembongkaran</h4>
                    <p class="text-muted mb-0" style="font-size: 0.95rem;">Manajemen Dokumen Pemilik dan Bangunan Gedung</p>
                </div>
            </div>
        </div>

        <!-- Baris: 2 Kartu Utama -->
        <div class="row g-4">
            <!-- 1. INFORMASI PEMILIK BANGUNAN -->
            <div class="col-lg-6">
                <div class="doc-card">
                    <div class="doc-icon">
                        <i class="bi bi-person-vcard-fill"></i>
                    </div>
                    <div class="doc-title">
                        <h4>INFORMASI PEMILIK BANGUNAN</h4>
                        <p>Data lengkap pemilik bangunan gedung</p>
                    </div>

                    <!-- Button Container -->
                    <div class="button-container">
                        <!-- Upload Dokumen -->

           @if($data)
    <a href="{{ route('bebantekpembongkarandokumen', $data->id) }}"
       class="button-berkas">
        <i class="bi bi-eye"></i> Lihat Dokumen
    </a>
@else
    <a href="{{ route('informasipemilikbangunan', [$data->namapemilik, $data->id]) }}"
       class="button-baru">
        <i class="bi bi-upload"></i> Upload Dokumen
    </a>
@endif





                        <!-- Perbaikan Dokumen -->
                        <a href="/perbaikan-pemilik" class="button-baru">
                            <i class="bi bi-pencil-square"></i> Perbaikan Dokumen
                        </a>
                    </div>
                </div>
            </div>

            <!-- 2. INFORMASI BANGUNAN GEDUNG -->
            <div class="col-lg-6">
                <div class="doc-card">
                    <div class="doc-icon">
                        <i class="bi bi-building-fill"></i>
                    </div>
                    <div class="doc-title">
                        <h4>INFORMASI BANGUNAN GEDUNG</h4>
                        <p>Detail dan spesifikasi bangunan yang akan dibongkar</p>
                    </div>

                    <!-- Button Container -->
                    <div class="button-container">
                        <!-- Upload Dokumen -->
                        <a href="/upload-gedung" class="button-baru">
                            <i class="bi bi-upload"></i> Upload Dokumen
                        </a>

                        <!-- Lihat Dokumen -->
                        <a href="/lihat-gedung" class="button-berkas">
                            <i class="bi bi-eye"></i> Lihat Dokumen
                        </a>

                        <!-- Perbaikan Dokumen -->
                        <a href="/perbaikan-gedung" class="button-modern">
                            <i class="bi bi-pencil-square"></i> Perbaikan Dokumen
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

