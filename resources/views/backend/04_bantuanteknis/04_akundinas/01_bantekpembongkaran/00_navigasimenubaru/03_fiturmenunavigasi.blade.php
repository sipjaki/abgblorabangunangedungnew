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
    <i class="bi bi-chat-left-text me-1"></i> Berkas Konsultasi
</button>

<!-- Berkas Rekomtek (cadangan2) -->
<button type="button"
    class="button-baru {{ $data->cadangan2 ? '' : 'disabled' }}"
    style="{{ $data->cadangan2 ? '' : 'pointer-events: none; opacity: 0.5;' }}"
    data-bs-toggle="modal" data-bs-target="#modalRekomtek">
    <i class="bi bi-file-earmark-check me-1"></i> Berkas Rekomtek
</button>

<!-- Berkas Per Bupati (cadangan3) -->
<button type="button"
    class="button-baru {{ $data->cadangan3 ? '' : 'disabled' }}"
    style="{{ $data->cadangan3 ? '' : 'pointer-events: none; opacity: 0.5;' }}"
    data-bs-toggle="modal" data-bs-target="#modalPerBupati">
    <i class="bi bi-person-badge me-1"></i> Berkas Per Bupati
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
        <div style="text-align:right; display:inline-block;">
    <a href="javascript:void(0)"
       class="button-merah"
       onclick="showModalCard({{ $data->id }})"
       style="text-decoration: none; display:inline-block; padding:8px 16px; border-radius:8px;">
        <i class="bi bi-arrow-clockwise me-1"></i> Berkas Dikembalikan
    </a>
    <br>
    <small style="display:block; margin-top:4px; color:#6B7280;">
        Klik tombol ini untuk mengajukan ulang setelah berkas persyaratan diperbaiki.
    </small>
</div>

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
            <h5 style="margin: 0; font-weight: 600; color: #333; display: flex; align-items: center;">
                <i class="bi bi-question-circle-fill me-2" style="color: #007bff;"></i>
                Konfirmasi Pengajuan Ulang
            </h5>
        </div>

        <!-- BODY MODAL -->
        <div style="padding: 25px;">
            <p style="margin-bottom: 15px; color: #333;">
                Apakah Anda yakin ingin mengajukan ulang berkas ini?
            </p>
        </div>

        <!-- FOOTER MODAL -->
        <div style="padding: 20px; background: #f8f9fa; border-top: 1px solid #e9ecef; display: flex; justify-content: flex-end; gap: 10px;">

            <!-- TOMBOL BATAL -->
            <button type="button"
                    onclick="closeModalCard()"
                    style="background: #6c757d; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: 500; display: flex; align-items: center;">
                <i class="bi bi-x-circle me-2"></i>
                Batal
            </button>

            <!-- TOMBOL YA, AJUKAN -->
            <button type="button"
                    onclick="submitForm()"
                    style="background: #28a745; color: white; border: none; padding: 10px 20px; border-radius: 6px; cursor: pointer; font-weight: 500; display: flex; align-items: center;">
                <i class="bi bi-check-circle me-2"></i>
                Ya, Ajukan Ulang
            </button>

        </div>
    </div>
</div>

<!-- HIDDEN FORM -->
<form id="hiddenForm" method="POST" style="display: none;">
    @csrf
    <input type="hidden" name="validasiberkas2" value="">
</form>

<script>
// Variabel global untuk menyimpan ID
let currentItemId = null;

// Fungsi untuk menampilkan modal card
function showModalCard(itemId) {
    console.log('Tombol diklik! ID:', itemId);
    currentItemId = itemId;

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

// Fungsi untuk submit form
function submitForm() {
    if (!currentItemId) {
        alert('Error: ID tidak ditemukan');
        return;
    }

    console.log('Submit form untuk ID:', currentItemId);

    // Buat form baru
    const form = document.createElement('form');
    form.method = 'POST';
    form.action = '/validasibongkarkembali/' + currentItemId;

    // CSRF Token
    const csrf = document.createElement('input');
    csrf.type = 'hidden';
    csrf.name = '_token';
    csrf.value = '{{ csrf_token() }}';

    // Field validasiberkas2 dengan value kosong
    const field = document.createElement('input');
    field.type = 'hidden';
    field.name = 'validasiberkas2';
    field.value = '';

    // Tambahkan ke form
    form.appendChild(csrf);
    form.appendChild(field);

    // Tambahkan ke body dan submit
    document.body.appendChild(form);
    console.log('Form akan disubmit ke:', form.action);
    form.submit();
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

// Debug: Cek apakah script berjalan
console.log('Script Surat Pemberitahuan (2) loaded');
</script>

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
                              'pelaksana' => urlencode($item->pelaksana),
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

