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
                    Upload Persetujuan Bupati
                    </a>
                </div>

                @endcan

                @canany(['pemohon', 'dinas'])
<div class="d-block">

    <!-- Berkas Konsultasi (cadangan1) -->
    <button type="button"
        class="button-baru {{ $data->cadangan1 ? '' : 'disabled' }}"
        style="{{ $data->cadangan1 ? '' : 'pointer-events: none; opacity: 0.5;' }}"
        data-bs-toggle="modal" data-bs-target="#modalKonsultasi">
        Berkas Konsultasi
    </button>

    <!-- Berkas Rekomtek (cadangan2) -->
    <button type="button"
        class="button-baru {{ $data->cadangan2 ? '' : 'disabled' }}"
        style="{{ $data->cadangan2 ? '' : 'pointer-events: none; opacity: 0.5;' }}"
        data-bs-toggle="modal" data-bs-target="#modalRekomtek">
        Berkas Rekomtek
    </button>

    <!-- Berkas Per Bupati (cadangan3) -->
    <button type="button"
        class="button-baru {{ $data->cadangan3 ? '' : 'disabled' }}"
        style="{{ $data->cadangan3 ? '' : 'pointer-events: none; opacity: 0.5;' }}"
        data-bs-toggle="modal" data-bs-target="#modalPerBupati">
        Berkas Per Bupati
    </button>

</div>

<!-- Modal Berkas Konsultasi -->
<div class="modal fade" id="modalKonsultasi" tabindex="-1" aria-labelledby="modalKonsultasiLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalKonsultasiLabel">Berkas Konsultasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if($data->cadangan1)
          <iframe src="{{ asset($data->cadangan1) }}" style="width:100%; height:400px; border:1px solid #ccc; border-radius:6px;"></iframe>
        @else
          <p class="text-muted">Berkas belum tersedia.</p>
        @endif
      </div>
      <div class="modal-footer">
        @if($data->cadangan1)
          <a href="{{ asset($data->cadangan1) }}" download class="button-berkas">Download</a>
        @endif
        <button type="button" class="button-modern" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Berkas Rekomtek -->
<div class="modal fade" id="modalRekomtek" tabindex="-1" aria-labelledby="modalRekomtekLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalRekomtekLabel">Berkas Rekomtek</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if($data->cadangan2)
          <iframe src="{{ asset($data->cadangan2) }}" style="width:100%; height:400px; border:1px solid #ccc; border-radius:6px;"></iframe>
        @else
          <p class="text-muted">Berkas belum tersedia.</p>
        @endif
      </div>
      <div class="modal-footer">
        @if($data->cadangan2)
          <a href="{{ asset($data->cadangan2) }}" download class="button-berkas">Download</a>
        @endif
        <button type="button" class="button-modern" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Berkas Per Bupati -->
<div class="modal fade" id="modalPerBupati" tabindex="-1" aria-labelledby="modalPerBupatiLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalPerBupatiLabel">Berkas Per Bupati</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        @if($data->cadangan3)
          <iframe src="{{ asset($data->cadangan3) }}" style="width:100%; height:400px; border:1px solid #ccc; border-radius:6px;"></iframe>
        @else
          <p class="text-muted">Berkas belum tersedia.</p>
        @endif
      </div>
      <div class="modal-footer">
        @if($data->cadangan3)
          <a href="{{ asset($data->cadangan3) }}" download class="button-berkas">Download</a>
        @endif
        <button type="button" class="button-modern" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>

@endcanany

<!-- Surat Pemberitahuan (2) -->
<div class="d-block">
    @if($data->validasiberkas2 === 'sudah')
        <!-- 1. SUDAH LOLOS (TIDAK BISA DIKLIK) -->
        <button class="button-hijau" type="button" disabled>
            <i class="bi bi-patch-check-fill me-1"></i> Lolos Administrasi
        </button>

    @elseif($data->validasiberkas2 === 'belum')
        <!-- 2. DIKEMBALIKAN (BISA DIKLIK) -->
        <button type="button"
                class="button-merah"
                onclick="showModalCard({{ $data->id }})">
            <i class="bi bi-arrow-clockwise me-1"></i> Berkas Dikembalikan
        </button>

    @else
        <!-- 3. NULL/KOSONG (TIDAK BISA DIKLIK) -->
        <button class="button-modern" type="button" disabled>
            <i class="bi bi-hourglass-split me-1"></i> Menunggu DPUPR Kab Blora
        </button>
    @endif
</div>

<!-- MODAL CARD -->
<div id="modalCard" style="display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background-color: rgba(0,0,0,0.5); z-index: 9999; justify-content: center; align-items: center;">

    <div style="background: white; width: 90%; max-width: 400px; border-radius: 12px; box-shadow: 0 10px 30px rgba(0,0,0,0.2); overflow: hidden;">

        <!-- HEADER MODAL -->
        <div style="background: #f8f9fa; padding: 20px; border-bottom: 1px solid #e9ecef;">
            <div style="display: flex; align-items: center;">
                <div style="background: #007bff; width: 40px; height: 40px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 15px;">
                    <i class="bi bi-question-circle-fill" style="color: white; font-size: 20px;"></i>
                </div>
                <div>
                    <h5 style="margin: 0; font-weight: 600; color: #333;">Konfirmasi Pengajuan Ulang</h5>
                    <small style="color: #6c757d;">Surat Pemberitahuan (2)</small>
                </div>
            </div>
        </div>

        <!-- BODY MODAL -->
        <div style="padding: 25px;">
            <p style="margin-bottom: 15px; color: #333; line-height: 1.5;">
                Apakah Anda yakin ingin mengajukan ulang berkas <strong>Surat Pemberitahuan (2)</strong>?
            </p>

            <div style="background: #f8f9fa; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                <div style="display: flex; align-items: center; margin-bottom: 8px;">
                    <i class="bi bi-arrow-left-right" style="color: #007bff; margin-right: 10px;"></i>
                    <span style="font-weight: 500; color: #333;">Perubahan Status:</span>
                </div>
                <div style="display: flex; align-items: center; justify-content: space-between; padding-left: 30px;">
                    <span style="color: #dc3545; font-weight: 500;">"Berkas Dikembalikan"</span>
                    <i class="bi bi-arrow-right" style="color: #6c757d; margin: 0 10px;"></i>
                    <span style="color: #28a745; font-weight: 500;">"Menunggu DPUPR Kab Blora"</span>
                </div>
            </div>

            <p style="font-size: 14px; color: #6c757d; margin-bottom: 0;">
                <i class="bi bi-info-circle me-1"></i>
                Status akan dikembalikan ke proses verifikasi DPUPR
            </p>
        </div>

        <!-- FOOTER MODAL -->
        <div style="padding: 20px; background: #f8f9fa; border-top: 1px solid #e9ecef; display: flex; justify-content: flex-end; gap: 10px;">

            <!-- FORM UNTUK SUBMIT -->
            <form id="submitForm" method="POST" style="display: flex; gap: 10px;">
                @csrf
                <input type="hidden" name="validasiberkas2" value="">

                <!-- TOMBOL BATAL -->
                <button type="button"
                        onclick="closeModalCard()"
                        style="background: #6c757d; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: 500; display: flex; align-items: center;">
                    <i class="bi bi-x-circle me-2"></i>
                    Batal
                </button>

                <!-- TOMBOL YA, AJUKAN -->
                <button type="submit"
                        style="background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: 500; display: flex; align-items: center;">
                    <i class="bi bi-check-circle me-2"></i>
                    Ya, Ajukan Ulang
                </button>
            </form>

        </div>
    </div>
</div>

<script>
// Variabel untuk menyimpan ID
let currentItemId = null;

// Fungsi untuk menampilkan modal card
function showModalCard(itemId) {
    currentItemId = itemId;

    // Set action form dengan route yang benar
    const form = document.getElementById('submitForm');
    form.action = "/validasibongkarkembali/" + itemId;

    // Tampilkan modal
    document.getElementById('modalCard').style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

// Fungsi untuk menutup modal card
function closeModalCard() {
    document.getElementById('modalCard').style.display = 'none';
    document.body.style.overflow = 'auto';
    currentItemId = null;
}

// Tutup modal jika klik di luar area card
document.getElementById('modalCard').addEventListener('click', function(event) {
    if (event.target === this) {
        closeModalCard();
    }
});

// Tutup modal dengan tombol ESC
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeModalCard();
    }
});

// Handle form submit
document.getElementById('submitForm').addEventListener('submit', function(e) {
    // Optional: Tambahkan loading state
    const submitBtn = this.querySelector('button[type="submit"]');
    submitBtn.innerHTML = '<i class="bi bi-hourglass me-2"></i>Memproses...';
    submitBtn.disabled = true;
});
</script>

<style>

/* Efek hover untuk tombol di modal */
#submitForm button[type="submit"]:hover {
    background-color: #218838;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(40, 167, 69, 0.2);
}

#submitForm button[type="button"]:hover {
    background-color: #5a6268;
    transform: translateY(-1px);
    box-shadow: 0 4px 8px rgba(108, 117, 125, 0.2);
}

/* Animasi untuk modal */
#modalCard > div {
    animation: modalSlideIn 0.3s ease-out;
}

@keyframes modalSlideIn {
    from {
        opacity: 0;
        transform: translateY(-30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>


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
                        <h4>INFORMASI PERMOHONAN KELAYAKAN BANGUNAN GEDUNG</h4>
                        <p>Detail dan spesifikasi bangunan yang akan dibongkar</p>
                    </div>

                    <!-- Button Container -->
                    <div class="button-container">
                        <!-- Input Permohonan -->
                @if($data->bantekpembongkarannew2->count() > 0)
                    @php
                        $item = $data->bantekpembongkarannew2->first(); // ambil item pertama
                    @endphp

                    <a href="{{ route(
                            'bebantekpembongkaranbangunandetail',
                            [
                                'pelaksana' => Str::slug($item->pelaksana ?? 'tidak-diketahui'),
                                'id' => $item->id
                            ]
                        ) }}"
                    class="button-berkas">
                        <i class="bi bi-eye"></i> Lihat Dokumen
                    </a>
                @else
                    <a href="{{ route('informasibangunangedung', [$data->namapemilik, $data->id]) }}"
                    class="button-baru">
                        <i class="bi bi-upload"></i> Input Permohonan
                    </a>
                @endif

@php
    $item = $data->bantekpembongkarannew2->first();
    $induk = $item;
@endphp

@if($induk)
<a href="{{ route(
    'perbaikan.informasibangunangedung',
    [
        'pelaksana' => urlencode($item->pelaksana),
        'id' => $item->id
    ]
) }}" class="button-baru">
    <i class="bi bi-eye"></i> Perbaikan Dokumen
</a>
@else
    <button type="button" class="button-baru" disabled style="opacity:0.6; cursor:not-allowed;">
        <i class="bi bi-pencil-square"></i> Perbaikan Dokumen
    </button>
    <small class="text-muted d-block mt-1">
        Perbaikan hanya dapat dilakukan setelah data permohonan tersedia.
    </small>
@endif

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

