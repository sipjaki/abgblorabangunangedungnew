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

            @can('admindpupr')

            <div class="d-block">
                <a href="{{ route('berkaskonsultasipembongkaran', ['id' => $data->id]) }}"
                    class="button-modern">
                    Upload BA Konsultasi
                </a>
                <a href="{{ route('berkasbarekomtekpembongkaran', ['id' => $data->id]) }}"
                    class="button-modern">
                    Upload BA Rekomtek
                </a>
                <a href="{{ route('berkaspersetujuanbupembongkaran', ['id' => $data->id]) }}"
                    class="button-modern">
                    Upload Per Bupati
                    </a>
                </div>

                @endcan
@canany(['pemohon', 'dinas'])
<div class="d-block">

    <!-- Berkas Konsultasi (cadangan1) -->
    <a href="{{ $data->cadangan1 ? route('berkaskonsultasipembongkaran', ['id' => $data->id]) : '#' }}"
       class="button-modern {{ $data->cadangan1 ? '' : 'disabled' }}"
       style="{{ $data->cadangan1 ? '' : 'pointer-events: none; opacity: 0.5;' }}">
       Berkas Konsultasi
    </a>

    <!-- Berkas Rekomtek (cadangan2) -->
    <a href="{{ $data->cadangan2 ? route('berkasbarekomtekpembongkaran', ['id' => $data->id]) : '#' }}"
       class="button-modern {{ $data->cadangan2 ? '' : 'disabled' }}"
       style="{{ $data->cadangan2 ? '' : 'pointer-events: none; opacity: 0.5;' }}">
       Berkas Rekomtek
    </a>

    <!-- Berkas Per Bupati (cadangan3) -->
    <a href="{{ $data->cadangan3 ? route('berkaspersetujuanbupembongkaran', ['id' => $data->id]) : '#' }}"
       class="button-modern {{ $data->cadangan3 ? '' : 'disabled' }}"
       style="{{ $data->cadangan3 ? '' : 'pointer-events: none; opacity: 0.5;' }}">
       Berkas Per Bupati
    </a>

</div>
@endcanany


<!-- Surat Pemberitahuan (2) -->
<div class="d-block">
    @if($data->validasiberkas2 === 'sudah')
        <!-- LOLOS (TIDAK BISA DIKLIK) -->
        <button class="button-lolos"
                type="button"
                disabled
                style="background-color:#10B981;color:black;cursor:not-allowed;">
            <i class="bi bi-patch-check-fill me-1"></i> Lolos
        </button>

    @elseif($data->validasiberkas2 === 'belum')
        <!-- DIKEMBALIKAN (MASIH BISA DIKLIK) -->
        <button class="button-dikembalikan"
                type="button"
                onclick="openModalPemohon2({{ $data->id }})"
                style="background-color:#0400ff;color:black;">
            <i class="bi bi-x-circle me-1"></i> Dikembalikan
        </button>

        <div class="mt-1">
            <small class="text-muted">
                Keterangan: Silakan klik tombol ini setelah seluruh berkas persyaratan diperbaiki.
            </small>
        </div>

    @else
        <!-- VERIFIKASI DPUPR (NULL) -->
        <button class="button-modern"
                type="button"
                disabled
                style="color:black;cursor:not-allowed;">
            <i class="bi bi-patch-check me-1"></i> Verifikasi DPUPR
        </button>
    @endif
</div>
<script>
function openModalPemohon2(itemId) {
    const modal = document.getElementById('confirmModalPemohon2');
    const form  = document.getElementById('validasiFormPemohon2');

    form.action = "{{ route('validasipembongkaranpemohon.update', ':id') }}"
                    .replace(':id', itemId);

    modal.style.display = "flex";
    document.body.style.overflow = 'hidden';
}

function closeModalPemohon2() {
    document.getElementById('confirmModalPemohon2').style.display = "none";
    document.body.style.overflow = 'auto';
}
</script>

<!-- Modal Surat Pemberitahuan (2) -->
<div id="confirmModalPemohon2"
     style="display:none;position:fixed;inset:0;
            background-color:rgba(0,0,0,0.5);
            z-index:1000;justify-content:center;align-items:center;">

    <div style="background:white;padding:24px;border-radius:12px;
                width:90%;max-width:400px;text-align:center;">

        <p style="font-size:16px;font-weight:600;">
            Apakah berkas sudah sesuai?
        </p>

        <form id="validasiFormPemohon2" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="document_type" value="2">

            <!-- KIRIM NULL (LOLOS) -->
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

        <br><br>

        <button type="button"
                onclick="closeModalPemohon2()"
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
    <a href="{{ route(
            'bebantekpembongkarandokumen',
            [
                'namabangunan' => Str::slug($data->namabangunan),
                'id' => $data->bantekpembongkarannew1->first()->id
            ]
        ) }}"
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
@if($data->bantekpembongkarannew1->count() > 0)
    <!-- DATA ADA → BISA DIKLIK -->
    <a href="{{ route(
            'perbaikan.pemilik',
            [
                'namabangunan' => Str::slug($data->namabangunan),
                'id' => $data->bantekpembongkarannew1->first()->id
            ]
        ) }}"
       class="button-baru">
        <i class="bi bi-pencil-square"></i> Perbaikan Dokumen
    </a>
@else
    <!-- DATA KOSONG → TIDAK BISA DIKLIK -->
    <button type="button"
            class="button-baru"
            disabled
            style="opacity:0.6;cursor:not-allowed;">
        <i class="bi bi-pencil-square"></i> Perbaikan Dokumen
    </button>

    <small class="text-muted d-block mt-1">
        Perbaikan hanya dapat dilakukan setelah data permohonan tersedia.
    </small>
@endif

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

