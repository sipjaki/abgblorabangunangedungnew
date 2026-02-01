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
<!-- Surat Pemberitahuan (2) -->

{{-- ===================== --}}
{{-- STATUS : LOLOS (NULL) --}}
{{-- ===================== --}}
@if(is_null($data->validasiberkas2))

    <div class="d-block">
        <button type="button"
                class="button-lolos"
                disabled
                style="background-color:#10B981;
                       color:black;
                       cursor:not-allowed;
                       opacity:0.7;">
            <i class="bi bi-patch-check-fill me-1"></i> Lolos
        </button>
    </div>


{{-- ========================= --}}
{{-- STATUS : DIKEMBALIKAN --}}
{{-- ========================= --}}
@elseif($data->validasiberkas2 === 'belum')

    <div class="d-block">
        <button type="button"
                class="button-dikembalikan"
                onclick="openModalVerifikasi(2, {{ $data->id }})"
                style="background-color:#0400ff;color:black;">
            <i class="bi bi-x-circle me-1"></i> Dikembalikan
        </button>

        <div class="mt-1">
            <small class="text-muted">
                Keterangan: Silakan klik tombol ini setelah seluruh berkas persyaratan diperbaiki.
            </small>
        </div>
    </div>


{{-- ========================= --}}
{{-- STATUS : BELUM DIVERIFIKASI --}}
{{-- ========================= --}}
@else

    <div class="d-block">
        <button type="button"
                class="button-modern"
                disabled
                style="color:black;
                       cursor:not-allowed;
                       opacity:0.6;">
            <i class="bi bi-patch-check me-1"></i> Verifikasi Berkas
        </button>
    </div>

@endif


<script>
function openModalVerifikasi(documentType, itemId) {
    const modal = document.getElementById('confirmModalVerifikasi');
    const form  = document.getElementById('validasiForm');

    form.action = `/validasipembongkaran${documentType}/${itemId}`;
    document.getElementById('document_type').value = documentType;

    modal.style.display = "flex";
    document.body.style.overflow = "hidden";
}

function closeModalVerifikasi() {
    const modal = document.getElementById('confirmModalVerifikasi');
    modal.style.display = "none";
    document.body.style.overflow = "auto";
}
</script>

<!-- Modal Verifikasi Berkas -->
<div id="confirmModalVerifikasi"
     style="display:none;position:fixed;inset:0;
            background-color:rgba(0,0,0,0.5);
            z-index:1000;justify-content:center;align-items:center;">

    <div style="background:white;padding:24px;border-radius:12px;
                width:90%;max-width:400px;text-align:center;">

        <p style="font-size:16px;font-weight:600;">
            Apakah berkas sudah sesuai?
        </p>
<form id="validasiForm" method="POST">
    @csrf
    @method('PUT')

    <input type="hidden" id="document_type" name="document_type">

    <!-- FIELD YANG DIKIRIM: NULL -->
    <input type="hidden" name="validasiberkas2" value="">

    <button type="submit"
            style="background:#10B981;color:white;
                   padding:8px 16px;margin-right:10px;
                   border-radius:8px;border:none;cursor:pointer;"
            onmouseover="this.style.backgroundColor='white';this.style.color='black';"
            onmouseout="this.style.backgroundColor='#10B981';this.style.color='white';">
        <i class="bi bi-check2-circle me-1"></i> Sudah
    </button>
</form>

<br>

<button type="button"
        onclick="closeModalVerifikasi()"
        style="background:#D1D5DB;padding:8px 16px;
               border-radius:8px;border:none;color:black;cursor:pointer;"
        onmouseover="this.style.backgroundColor='white';this.style.color='black';"
        onmouseout="this.style.backgroundColor='#D1D5DB';this.style.color='black';">
    <i class="bi bi-x-circle me-1"></i> Batal
</button>

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
                        <h4>INFORMASI PERMOHONAN PEMBONGKARAN BANGUNAN GEDUNG</h4>
                        <p>Data lengkap pemilik bangunan gedung</p>
                    </div>

                    <!-- Button Container -->
                    <div class="button-container">
                        <!-- Input Permohonan -->

@if($data->bantekpembongkarannew1->count() > 0)
    <a href="{{ route('bebantekpembongkarandokumen', $data->bantekpembongkarannew1->first()->id) }}"
       class="button-berkas">
        <i class="bi bi-eye"></i> Lihat Dokumen
    </a>
@else
    <a href="{{ route('informasipemilikbangunan', [$data->namapemilik, $data->id]) }}"
       class="button-baru">
        <i class="bi bi-upload"></i> Input Permohonan
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
                        <!-- Input Permohonan -->
                       @if($data->bantekpembongkarannew2->count() > 0)
                                <a href="{{ route('bebantekpembongkarandokumen', $data->bantekpembongkarannew2->first()->id) }}"
                                class="button-berkas">
                                    <i class="bi bi-eye"></i> Lihat Dokumen
                                </a>
                            @else
                                <a href="{{ route('informasibangunangedung', [$data->namapemilik, $data->id]) }}"
                                class="button-baru">
                                    <i class="bi bi-upload"></i> Input Permohonan
                                </a>
                            @endif


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

