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
        padding: 20px;
        height: 100%;
        transition: all 0.3s ease;
        border: 2px solid #eef2ff;
        position: relative;
        overflow: hidden;
    }

    .doc-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(59, 130, 246, 0.15);
        border-color: #3b82f6;
    }

    .doc-card.status-empty:hover {
        border-color: #ef4444;
        box-shadow: 0 10px 25px rgba(239, 68, 68, 0.15);
    }

    .doc-card.status-repair:hover {
        border-color: #f59e0b;
        box-shadow: 0 10px 25px rgba(245, 158, 11, 0.15);
    }

    .doc-card.status-complete:hover {
        border-color: #10b981;
        box-shadow: 0 10px 25px rgba(16, 185, 129, 0.15);
    }

    .doc-icon {
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
        color: white;
        font-size: 1.5rem;
        box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
    }

    .doc-title h6 {
        font-weight: 600;
        color: #1f2937;
        font-size: 0.95rem;
        line-height: 1.4;
        margin-bottom: 20px;
        min-height: 40px;
    }

    .status-indicator {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 20px;
    }

    .status-light {
        width: 28px;
        height: 28px;
        border-radius: 50%;
        position: relative;
        opacity: 0.3;
        transition: all 0.3s;
        border: 2px solid transparent;
    }

    .status-light.active {
        opacity: 1;
        box-shadow: 0 0 15px currentColor;
        border-color: white;
    }

    .status-light.red {
        background: #ef4444;
        color: #ef4444;
    }

    .status-light.yellow {
        background: #f59e0b;
        color: #f59e0b;
    }

    .status-light.green {
        background: #10b981;
        color: #10b981;
    }

    .status-label {
        font-weight: 600;
        color: #6b7280;
        font-size: 0.85rem;
        margin-right: 10px;
    }

    .status-options {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-top: 10px;
    }

    .status-option {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 12px;
        border-radius: 8px;
        text-decoration: none;
        font-size: 0.85rem;
        font-weight: 500;
        transition: all 0.2s;
        background: #f9fafb;
    }

    .status-option:hover {
        background: #f3f4f6;
        transform: translateX(3px);
    }

    .status-option.red {
        color: #ef4444;
    }

    .status-option.yellow {
        color: #f59e0b;
    }

    .status-option.green {
        color: #10b981;
    }

    .status-text {
        font-weight: 600;
        font-size: 0.9rem;
        margin-left: 8px;
    }

    .doc-actions {
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px solid #f3f4f6;
    }

    .btn-action {
        width: 100%;
        padding: 10px;
        border: none;
        border-radius: 8px;
        font-weight: 500;
        font-size: 0.85rem;
        transition: all 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-action.upload {
        background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
        color: white;
    }

    .btn-action.upload:hover {
        background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
        transform: translateY(-2px);
    }

    .btn-action.edit {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
        color: white;
    }

    .btn-action.edit:hover {
        background: linear-gradient(135deg, #d97706 0%, #b45309 100%);
        transform: translateY(-2px);
    }

    .btn-action.view {
        background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        color: white;
    }

    .btn-action.view:hover {
        background: linear-gradient(135deg, #059669 0%, #047857 100%);
        transform: translateY(-2px);
    }

    .section-title {
        font-weight: 600;
        color: #374151;
        margin-bottom: 20px;
        padding-bottom: 10px;
        border-bottom: 2px solid #e5e7eb;
        font-size: 1.1rem;
    }

    .status-badge {
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 0.75rem;
        font-weight: 600;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .doc-card {
            padding: 15px;
        }

        .doc-icon {
            width: 50px;
            height: 50px;
            font-size: 1.2rem;
        }

        .doc-title h6 {
            font-size: 0.85rem;
        }
    }
</style>

<div class="col-md-12">
    <div class="doc-grid mb-5">
        <!-- Header Section -->
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4">
            <div class="d-flex align-items-center mb-3 mb-md-0">
                <div class="me-3">
                    <i class="bi bi-clipboard-data-fill text-primary" style="font-size: 1.8rem;"></i>
                </div>
               <div>
                <h4 class="mb-1" style="color: #1f2937; font-size: 20px;">Dokumen Persyaratan Pembongkaran</h4>
                <p class="text-muted mb-0" style="font-size: 16px;">Status Kelengkapan Dokumen Pembongkaran Bangunan Gedung Negara</p>
            </div>

            </div>

            <div class="status-overview d-flex gap-3">
                <div class="text-center">
                    <div class="status-light red active" style="margin: 0 auto 5px;"></div>
                    <span class="status-label">Data Kosong</span>
                </div>
                <div class="text-center">
                    <div class="status-light yellow active" style="margin: 0 auto 5px;"></div>
                    <span class="status-label">Verifikasi </span>
                </div>
                <div class="text-center">
                    <div class="status-light green active" style="margin: 0 auto 5px;"></div>
                    <span class="status-label">Lengkap</span>
                </div>
            </div>
        </div>

        <!-- Baris 1: 4 Dokumen -->
        <div class="row g-4 mb-4">
            <!-- 1. SURAT PERMOHONAN IZIN BONGKAR -->
            <div class="col-xl-3 col-lg-6">
                <div class="doc-card status-complete">
                    <div class="doc-icon">
                        <i class="bi bi-file-earmark-check-fill"></i>
                    </div>
                    <div class="doc-title">
                        <h6>SURAT PERMOHONAN IZIN BONGKAR</h6>
                    </div>

                    <div class="status-options">
                    @if (is_null($data->bantekbongkar1))
                                {{-- DATA KOSONG --}}
                                <a class="status-option red">
                                    <div class="status-light red active"></div>
                                    <span>Data Kosong</span>
                                </a>
                            @else
                                {{-- DATA ADA --}}
                                <a class="status-option green">
                                    <div class="status-light green active"></div>
                                    <span>Berkas Ada</span>
                                </a>
                            @endif
@php
    $bantek = $data->bantekbongkar1 ?? null;
@endphp

@if (is_null($bantek))
    {{-- Data belum diisi --}}
    <a class="status-option yellow">
        <div class="status-light yellow active"></div>
        <span>Verifikasi DPUPR</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'belum')
    {{-- Data ada tapi dikembalikan --}}
    <a class="status-option red">
        <div class="status-light red active"></div>
        <span>Dikembalikan</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'sudah')
    {{-- Data lolos --}}
    <a class="status-option green">
        <div class="status-light green active"></div>
        <span>Lolos Verifikasi</span>
    </a>
@endif

                    </div>

                 <div class="doc-actions">
                            @if($data->bantekbongkar1)
                                {{-- JIKA DATA SUDAH ADA --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.dokumen', $data->id) }}" class="btn-action view"> --}}
                                <a  class="btn-action view">
                                    <i class="bi bi-eye"></i> Lihat Dokumen
                                </a>
                            @else
                                {{-- JIKA DATA MASIH KOSONG --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.upload', $data->id) }}" class="btn-action edit"> --}}
                                <a  class="btn-action edit">
                                    <i class="bi bi-upload"></i> Upload Dokumen
                                </a>
                            @endif

                            @if($data->bantekbongkar1)
                            {{-- <a href="{{ route('bantekbongkar1.edit', $data->bantekbongkar1->id) }}" class="btn-action edit"> --}}
                            <a  class="btn-action edit">
                                <i class="bi bi-edit"></i> Perbaikan Data
                            </a>
                        @endif

                </div>


                </div>
            </div>

            <!-- 2. IDENTITAS PEMILIK BANGUNAN -->
            <div class="col-xl-3 col-lg-6">
                <div class="doc-card status-repair">
                    <div class="doc-icon">
                        <i class="bi bi-person-vcard-fill"></i>
                    </div>
                    <div class="doc-title">
                        <h6>IDENTITAS PEMILIK BANGUNAN</h6>
                    </div>
    <div class="status-options">
                    @if (is_null($data->bantekbongkar1))
                                {{-- DATA KOSONG --}}
                                <a class="status-option red">
                                    <div class="status-light red active"></div>
                                    <span>Data Kosong</span>
                                </a>
                            @else
                                {{-- DATA ADA --}}
                                <a class="status-option green">
                                    <div class="status-light green active"></div>
                                    <span>Berkas Ada</span>
                                </a>
                            @endif
@php
    $bantek = $data->bantekbongkar1 ?? null;
@endphp

@if (is_null($bantek))
    {{-- Data belum diisi --}}
    <a class="status-option yellow">
        <div class="status-light yellow active"></div>
        <span>Verifikasi DPUPR</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'belum')
    {{-- Data ada tapi dikembalikan --}}
    <a class="status-option red">
        <div class="status-light red active"></div>
        <span>Dikembalikan</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'sudah')
    {{-- Data lolos --}}
    <a class="status-option green">
        <div class="status-light green active"></div>
        <span>Lolos Verifikasi</span>
    </a>
@endif

                    </div>



                 <div class="doc-actions">
                            @if($data->bantekbongkar1)
                                {{-- JIKA DATA SUDAH ADA --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.dokumen', $data->id) }}" class="btn-action view"> --}}
                                <a  class="btn-action view">
                                    <i class="bi bi-eye"></i> Lihat Dokumen
                                </a>
                            @else
                                {{-- JIKA DATA MASIH KOSONG --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.upload', $data->id) }}" class="btn-action edit"> --}}
                                <a  class="btn-action edit">
                                    <i class="bi bi-upload"></i> Upload Dokumen
                                </a>
                            @endif

                            @if($data->bantekbongkar1)
                            {{-- <a href="{{ route('bantekbongkar1.edit', $data->bantekbongkar1->id) }}" class="btn-action edit"> --}}
                            <a  class="btn-action edit">
                                <i class="bi bi-edit"></i> Perbaikan Data
                            </a>
                        @endif

                </div>

                </div>

            </div>

            <!-- 3. DATA KEPIMILIKAN TANAH -->
            <div class="col-xl-3 col-lg-6">
                <div class="doc-card status-complete">
                    <div class="doc-icon">
                        <i class="bi bi-house-up-fill"></i>
                    </div>
                    <div class="doc-title">
                        <h6>DATA KEPIMILIKAN TANAH</h6>
                    </div>
    <div class="status-options">
                    @if (is_null($data->bantekbongkar1))
                                {{-- DATA KOSONG --}}
                                <a class="status-option red">
                                    <div class="status-light red active"></div>
                                    <span>Data Kosong</span>
                                </a>
                            @else
                                {{-- DATA ADA --}}
                                <a class="status-option green">
                                    <div class="status-light green active"></div>
                                    <span>Berkas Ada</span>
                                </a>
                            @endif
@php
    $bantek = $data->bantekbongkar1 ?? null;
@endphp

@if (is_null($bantek))
    {{-- Data belum diisi --}}
    <a class="status-option yellow">
        <div class="status-light yellow active"></div>
        <span>Verifikasi DPUPR</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'belum')
    {{-- Data ada tapi dikembalikan --}}
    <a class="status-option red">
        <div class="status-light red active"></div>
        <span>Dikembalikan</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'sudah')
    {{-- Data lolos --}}
    <a class="status-option green">
        <div class="status-light green active"></div>
        <span>Lolos Verifikasi</span>
    </a>
@endif

                    </div>




                 <div class="doc-actions">
                            @if($data->bantekbongkar1)
                                {{-- JIKA DATA SUDAH ADA --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.dokumen', $data->id) }}" class="btn-action view"> --}}
                                <a  class="btn-action view">
                                    <i class="bi bi-eye"></i> Lihat Dokumen
                                </a>
                            @else
                                {{-- JIKA DATA MASIH KOSONG --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.upload', $data->id) }}" class="btn-action edit"> --}}
                                <a  class="btn-action edit">
                                    <i class="bi bi-upload"></i> Upload Dokumen
                                </a>
                            @endif

                            @if($data->bantekbongkar1)
                            {{-- <a href="{{ route('bantekbongkar1.edit', $data->bantekbongkar1->id) }}" class="btn-action edit"> --}}
                            <a  class="btn-action edit">
                                <i class="bi bi-edit"></i> Perbaikan Data
                            </a>
                        @endif

                </div>

                </div>
            </div>

            <!-- 4. DATA KEPEMILIKAN BANGUNAN GEDUNG -->
            <div class="col-xl-3 col-lg-6">
                <div class="doc-card status-empty">
                    <div class="doc-icon">
                        <i class="bi bi-building-fill"></i>
                    </div>
                    <div class="doc-title">
                        <h6>DATA KEPEMILIKAN BANGUNAN GEDUNG</h6>
                    </div>

                    <div class="status-options">
                    @if (is_null($data->bantekbongkar1))
                                {{-- DATA KOSONG --}}
                                <a class="status-option red">
                                    <div class="status-light red active"></div>
                                    <span>Data Kosong</span>
                                </a>
                            @else
                                {{-- DATA ADA --}}
                                <a class="status-option green">
                                    <div class="status-light green active"></div>
                                    <span>Berkas Ada</span>
                                </a>
                            @endif
@php
    $bantek = $data->bantekbongkar1 ?? null;
@endphp

@if (is_null($bantek))
    {{-- Data belum diisi --}}
    <a class="status-option yellow">
        <div class="status-light yellow active"></div>
        <span>Verifikasi DPUPR</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'belum')
    {{-- Data ada tapi dikembalikan --}}
    <a class="status-option red">
        <div class="status-light red active"></div>
        <span>Dikembalikan</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'sudah')
    {{-- Data lolos --}}
    <a class="status-option green">
        <div class="status-light green active"></div>
        <span>Lolos Verifikasi</span>
    </a>
@endif

                    </div>




                 <div class="doc-actions">
                            @if($data->bantekbongkar1)
                                {{-- JIKA DATA SUDAH ADA --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.dokumen', $data->id) }}" class="btn-action view"> --}}
                                <a  class="btn-action view">
                                    <i class="bi bi-eye"></i> Lihat Dokumen
                                </a>
                            @else
                                {{-- JIKA DATA MASIH KOSONG --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.upload', $data->id) }}" class="btn-action edit"> --}}
                                <a  class="btn-action edit">
                                    <i class="bi bi-upload"></i> Upload Dokumen
                                </a>
                            @endif

                            @if($data->bantekbongkar1)
                            {{-- <a href="{{ route('bantekbongkar1.edit', $data->bantekbongkar1->id) }}" class="btn-action edit"> --}}
                            <a  class="btn-action edit">
                                <i class="bi bi-edit"></i> Perbaikan Data
                            </a>
                        @endif

                </div>

                </div>
            </div>
        </div>

        <!-- Baris 2: 4 Dokumen -->
        <div class="row g-4 mb-4">
            <!-- 5. DOKUMEN ANALISA KERUSAKAN BANGUNAN GEDUNG -->
            <div class="col-xl-3 col-lg-6">
                <div class="doc-card status-complete">
                    <div class="doc-icon">
                        <i class="bi bi-clipboard2-pulse-fill"></i>
                    </div>
                    <div class="doc-title">
                        <h6>DOKUMEN ANALISA KERUSAKAN BANGUNAN GEDUNG</h6>
                    </div>

                     <div class="status-options">
                    @if (is_null($data->bantekbongkar1))
                                {{-- DATA KOSONG --}}
                                <a class="status-option red">
                                    <div class="status-light red active"></div>
                                    <span>Data Kosong</span>
                                </a>
                            @else
                                {{-- DATA ADA --}}
                                <a class="status-option green">
                                    <div class="status-light green active"></div>
                                    <span>Berkas Ada</span>
                                </a>
                            @endif
@php
    $bantek = $data->bantekbongkar1 ?? null;
@endphp

@if (is_null($bantek))
    {{-- Data belum diisi --}}
    <a class="status-option yellow">
        <div class="status-light yellow active"></div>
        <span>Verifikasi DPUPR</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'belum')
    {{-- Data ada tapi dikembalikan --}}
    <a class="status-option red">
        <div class="status-light red active"></div>
        <span>Dikembalikan</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'sudah')
    {{-- Data lolos --}}
    <a class="status-option green">
        <div class="status-light green active"></div>
        <span>Lolos Verifikasi</span>
    </a>
@endif

                    </div>




                 <div class="doc-actions">
                            @if($data->bantekbongkar1)
                                {{-- JIKA DATA SUDAH ADA --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.dokumen', $data->id) }}" class="btn-action view"> --}}
                                <a  class="btn-action view">
                                    <i class="bi bi-eye"></i> Lihat Dokumen
                                </a>
                            @else
                                {{-- JIKA DATA MASIH KOSONG --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.upload', $data->id) }}" class="btn-action edit"> --}}
                                <a  class="btn-action edit">
                                    <i class="bi bi-upload"></i> Upload Dokumen
                                </a>
                            @endif

                            @if($data->bantekbongkar1)
                            {{-- <a href="{{ route('bantekbongkar1.edit', $data->bantekbongkar1->id) }}" class="btn-action edit"> --}}
                            <a  class="btn-action edit">
                                <i class="bi bi-edit"></i> Perbaikan Data
                            </a>
                        @endif

                </div>

                </div>
            </div>

            <!-- 6. DOKUMEN KAJIAN KELAYAKAN BANGUNAN GEDUNG -->
            <div class="col-xl-3 col-lg-6">
                <div class="doc-card status-repair">
                    <div class="doc-icon">
                        <i class="bi bi-clipboard2-check-fill"></i>
                    </div>
                    <div class="doc-title">
                        <h6>DOKUMEN KAJIAN KELAYAKAN BANGUNAN GEDUNG</h6>
                    </div>

                      <div class="status-options">
                    @if (is_null($data->bantekbongkar1))
                                {{-- DATA KOSONG --}}
                                <a class="status-option red">
                                    <div class="status-light red active"></div>
                                    <span>Data Kosong</span>
                                </a>
                            @else
                                {{-- DATA ADA --}}
                                <a class="status-option green">
                                    <div class="status-light green active"></div>
                                    <span>Berkas Ada</span>
                                </a>
                            @endif
@php
    $bantek = $data->bantekbongkar1 ?? null;
@endphp

@if (is_null($bantek))
    {{-- Data belum diisi --}}
    <a class="status-option yellow">
        <div class="status-light yellow active"></div>
        <span>Verifikasi DPUPR</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'belum')
    {{-- Data ada tapi dikembalikan --}}
    <a class="status-option red">
        <div class="status-light red active"></div>
        <span>Dikembalikan</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'sudah')
    {{-- Data lolos --}}
    <a class="status-option green">
        <div class="status-light green active"></div>
        <span>Lolos Verifikasi</span>
    </a>
@endif

                    </div>




                 <div class="doc-actions">
                            @if($data->bantekbongkar1)
                                {{-- JIKA DATA SUDAH ADA --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.dokumen', $data->id) }}" class="btn-action view"> --}}
                                <a  class="btn-action view">
                                    <i class="bi bi-eye"></i> Lihat Dokumen
                                </a>
                            @else
                                {{-- JIKA DATA MASIH KOSONG --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.upload', $data->id) }}" class="btn-action edit"> --}}
                                <a  class="btn-action edit">
                                    <i class="bi bi-upload"></i> Upload Dokumen
                                </a>
                            @endif

                            @if($data->bantekbongkar1)
                            {{-- <a href="{{ route('bantekbongkar1.edit', $data->bantekbongkar1->id) }}" class="btn-action edit"> --}}
                            <a  class="btn-action edit">
                                <i class="bi bi-edit"></i> Perbaikan Data
                            </a>
                        @endif

                </div>
                </div>
            </div>

            <!-- 7. GAMBAR BANGUNAN GEDUNG TERBANGUN -->
            <div class="col-xl-3 col-lg-6">
                <div class="doc-card status-complete">
                    <div class="doc-icon">
                        <i class="bi bi-building-gear-fill"></i>
                    </div>
                    <div class="doc-title">
                        <h6>GAMBAR BANGUNAN GEDUNG TERBANGUN (AS BUILT DRAWING)</h6>
                    </div>

                       <div class="status-options">
                    @if (is_null($data->bantekbongkar1))
                                {{-- DATA KOSONG --}}
                                <a class="status-option red">
                                    <div class="status-light red active"></div>
                                    <span>Data Kosong</span>
                                </a>
                            @else
                                {{-- DATA ADA --}}
                                <a class="status-option green">
                                    <div class="status-light green active"></div>
                                    <span>Berkas Ada</span>
                                </a>
                            @endif
@php
    $bantek = $data->bantekbongkar1 ?? null;
@endphp

@if (is_null($bantek))
    {{-- Data belum diisi --}}
    <a class="status-option yellow">
        <div class="status-light yellow active"></div>
        <span>Verifikasi DPUPR</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'belum')
    {{-- Data ada tapi dikembalikan --}}
    <a class="status-option red">
        <div class="status-light red active"></div>
        <span>Dikembalikan</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'sudah')
    {{-- Data lolos --}}
    <a class="status-option green">
        <div class="status-light green active"></div>
        <span>Lolos Verifikasi</span>
    </a>
@endif

                    </div>




                 <div class="doc-actions">
                            @if($data->bantekbongkar1)
                                {{-- JIKA DATA SUDAH ADA --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.dokumen', $data->id) }}" class="btn-action view"> --}}
                                <a  class="btn-action view">
                                    <i class="bi bi-eye"></i> Lihat Dokumen
                                </a>
                            @else
                                {{-- JIKA DATA MASIH KOSONG --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.upload', $data->id) }}" class="btn-action edit"> --}}
                                <a  class="btn-action edit">
                                    <i class="bi bi-upload"></i> Upload Dokumen
                                </a>
                            @endif

                            @if($data->bantekbongkar1)
                            {{-- <a href="{{ route('bantekbongkar1.edit', $data->bantekbongkar1->id) }}" class="btn-action edit"> --}}
                            <a  class="btn-action edit">
                                <i class="bi bi-edit"></i> Perbaikan Data
                            </a>
                        @endif

                </div>
                </div>
            </div>

            <!-- 8. DOKUMEN KAJIAN TEKNIS BONGKARAN -->
            <div class="col-xl-3 col-lg-6">
                <div class="doc-card status-empty">
                    <div class="doc-icon">
                        <i class="bi bi-tools"></i>
                    </div>
                    <div class="doc-title">
                        <h6>DOKUMEN KAJIAN TEKNIS BONGKARAN</h6>
                    </div>

                      <div class="status-options">
                    @if (is_null($data->bantekbongkar1))
                                {{-- DATA KOSONG --}}
                                <a class="status-option red">
                                    <div class="status-light red active"></div>
                                    <span>Data Kosong</span>
                                </a>
                            @else
                                {{-- DATA ADA --}}
                                <a class="status-option green">
                                    <div class="status-light green active"></div>
                                    <span>Berkas Ada</span>
                                </a>
                            @endif
@php
    $bantek = $data->bantekbongkar1 ?? null;
@endphp

@if (is_null($bantek))
    {{-- Data belum diisi --}}
    <a class="status-option yellow">
        <div class="status-light yellow active"></div>
        <span>Verifikasi DPUPR</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'belum')
    {{-- Data ada tapi dikembalikan --}}
    <a class="status-option red">
        <div class="status-light red active"></div>
        <span>Dikembalikan</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'sudah')
    {{-- Data lolos --}}
    <a class="status-option green">
        <div class="status-light green active"></div>
        <span>Lolos Verifikasi</span>
    </a>
@endif

                    </div>



                 <div class="doc-actions">
                            @if($data->bantekbongkar1)
                                {{-- JIKA DATA SUDAH ADA --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.dokumen', $data->id) }}" class="btn-action view"> --}}
                                <a  class="btn-action view">
                                    <i class="bi bi-eye"></i> Lihat Dokumen
                                </a>
                            @else
                                {{-- JIKA DATA MASIH KOSONG --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.upload', $data->id) }}" class="btn-action edit"> --}}
                                <a  class="btn-action edit">
                                    <i class="bi bi-upload"></i> Upload Dokumen
                                </a>
                            @endif

                            @if($data->bantekbongkar1)
                            {{-- <a href="{{ route('bantekbongkar1.edit', $data->bantekbongkar1->id) }}" class="btn-action edit"> --}}
                            <a  class="btn-action edit">
                                <i class="bi bi-edit"></i> Perbaikan Data
                            </a>
                        @endif

                </div>
                </div>
            </div>
        </div>

        <!-- Baris 3: 3 Dokumen -->
        <div class="row g-4">
            <!-- 9. DATA PERSETUJUAN BANGUNAN GEDUNG -->
            <div class="col-xl-4 col-lg-6">
                <div class="doc-card status-complete">
                    <div class="doc-icon">
                        <i class="bi bi-file-check-fill"></i>
                    </div>
                    <div class="doc-title">
                        <h6>DATA PERSETUJUAN BANGUNAN GEDUNG</h6>
                    </div>

                      <div class="status-options">
                    @if (is_null($data->bantekbongkar1))
                                {{-- DATA KOSONG --}}
                                <a class="status-option red">
                                    <div class="status-light red active"></div>
                                    <span>Data Kosong</span>
                                </a>
                            @else
                                {{-- DATA ADA --}}
                                <a class="status-option green">
                                    <div class="status-light green active"></div>
                                    <span>Berkas Ada</span>
                                </a>
                            @endif
@php
    $bantek = $data->bantekbongkar1 ?? null;
@endphp

@if (is_null($bantek))
    {{-- Data belum diisi --}}
    <a class="status-option yellow">
        <div class="status-light yellow active"></div>
        <span>Verifikasi DPUPR</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'belum')
    {{-- Data ada tapi dikembalikan --}}
    <a class="status-option red">
        <div class="status-light red active"></div>
        <span>Dikembalikan</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'sudah')
    {{-- Data lolos --}}
    <a class="status-option green">
        <div class="status-light green active"></div>
        <span>Lolos Verifikasi</span>
    </a>
@endif

                    </div>




                 <div class="doc-actions">
                            @if($data->bantekbongkar1)
                                {{-- JIKA DATA SUDAH ADA --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.dokumen', $data->id) }}" class="btn-action view"> --}}
                                <a  class="btn-action view">
                                    <i class="bi bi-eye"></i> Lihat Dokumen
                                </a>
                            @else
                                {{-- JIKA DATA MASIH KOSONG --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.upload', $data->id) }}" class="btn-action edit"> --}}
                                <a  class="btn-action edit">
                                    <i class="bi bi-upload"></i> Upload Dokumen
                                </a>
                            @endif

                            @if($data->bantekbongkar1)
                            {{-- <a href="{{ route('bantekbongkar1.edit', $data->bantekbongkar1->id) }}" class="btn-action edit"> --}}
                            <a  class="btn-action edit">
                                <i class="bi bi-edit"></i> Perbaikan Data
                            </a>
                        @endif

                </div>
                </div>
            </div>

            <!-- 10. LAPORAN PEMERIKSAAN BERKALA BANGUNAN GEDUNG -->
            <div class="col-xl-4 col-lg-6">
                <div class="doc-card status-repair">
                    <div class="doc-icon">
                        <i class="bi bi-clipboard2-data-fill"></i>
                    </div>
                    <div class="doc-title">
                        <h6>LAPORAN PEMERIKSAAN BERKALA BANGUNAN GEDUNG</h6>
                    </div>

                       <div class="status-options">
                    @if (is_null($data->bantekbongkar1))
                                {{-- DATA KOSONG --}}
                                <a class="status-option red">
                                    <div class="status-light red active"></div>
                                    <span>Data Kosong</span>
                                </a>
                            @else
                                {{-- DATA ADA --}}
                                <a class="status-option green">
                                    <div class="status-light green active"></div>
                                    <span>Berkas Ada</span>
                                </a>
                            @endif
@php
    $bantek = $data->bantekbongkar1 ?? null;
@endphp

@if (is_null($bantek))
    {{-- Data belum diisi --}}
    <a class="status-option yellow">
        <div class="status-light yellow active"></div>
        <span>Verifikasi DPUPR</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'belum')
    {{-- Data ada tapi dikembalikan --}}
    <a class="status-option red">
        <div class="status-light red active"></div>
        <span>Dikembalikan</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'sudah')
    {{-- Data lolos --}}
    <a class="status-option green">
        <div class="status-light green active"></div>
        <span>Lolos Verifikasi</span>
    </a>
@endif

                    </div>




                 <div class="doc-actions">
                            @if($data->bantekbongkar1)
                                {{-- JIKA DATA SUDAH ADA --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.dokumen', $data->id) }}" class="btn-action view"> --}}
                                <a  class="btn-action view">
                                    <i class="bi bi-eye"></i> Lihat Dokumen
                                </a>
                            @else
                                {{-- JIKA DATA MASIH KOSONG --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.upload', $data->id) }}" class="btn-action edit"> --}}
                                <a  class="btn-action edit">
                                    <i class="bi bi-upload"></i> Upload Dokumen
                                </a>
                            @endif

                            @if($data->bantekbongkar1)
                            {{-- <a href="{{ route('bantekbongkar1.edit', $data->bantekbongkar1->id) }}" class="btn-action edit"> --}}
                            <a  class="btn-action edit">
                                <i class="bi bi-edit"></i> Perbaikan Data
                            </a>
                        @endif

                </div>
                </div>
            </div>

            <!-- 11. SURAT PERNYATAAN KESANGGUPAN PEMILIK BANGUNAN -->
            <div class="col-xl-4 col-lg-12">
                <div class="doc-card status-complete">
                    <div class="doc-icon">
                        <i class="bi bi-file-earmark-medical-fill"></i>
                    </div>
                    <div class="doc-title">
                        <h6>SURAT PERNYATAAN KESANGGUPAN PEMILIK BANGUNAN</h6>
                    </div>

                      <div class="status-options">
                    @if (is_null($data->bantekbongkar1))
                                {{-- DATA KOSONG --}}
                                <a class="status-option red">
                                    <div class="status-light red active"></div>
                                    <span>Data Kosong</span>
                                </a>
                            @else
                                {{-- DATA ADA --}}
                                <a class="status-option green">
                                    <div class="status-light green active"></div>
                                    <span>Berkas Ada</span>
                                </a>
                            @endif
@php
    $bantek = $data->bantekbongkar1 ?? null;
@endphp

@if (is_null($bantek))
    {{-- Data belum diisi --}}
    <a class="status-option yellow">
        <div class="status-light yellow active"></div>
        <span>Verifikasi DPUPR</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'belum')
    {{-- Data ada tapi dikembalikan --}}
    <a class="status-option red">
        <div class="status-light red active"></div>
        <span>Dikembalikan</span>
    </a>

@elseif ($bantek->validasiberkas1 === 'sudah')
    {{-- Data lolos --}}
    <a class="status-option green">
        <div class="status-light green active"></div>
        <span>Lolos Verifikasi</span>
    </a>
@endif

                    </div>



                 <div class="doc-actions">
                            @if($data->bantekbongkar1)
                                {{-- JIKA DATA SUDAH ADA --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.dokumen', $data->id) }}" class="btn-action view"> --}}
                                <a  class="btn-action view">
                                    <i class="bi bi-eye"></i> Lihat Dokumen
                                </a>
                            @else
                                {{-- JIKA DATA MASIH KOSONG --}}
                                {{-- <a href="{{ route('bantek.pembongkaran.upload', $data->id) }}" class="btn-action edit"> --}}
                                <a  class="btn-action edit">
                                    <i class="bi bi-upload"></i> Upload Dokumen
                                </a>
                            @endif

                            @if($data->bantekbongkar1)
                            {{-- <a href="{{ route('bantekbongkar1.edit', $data->bantekbongkar1->id) }}" class="btn-action edit"> --}}
                            <a  class="btn-action edit">
                                <i class="bi bi-edit"></i> Perbaikan Data
                            </a>
                        @endif

                </div>
                </div>
            </div>
        </div>
    </div>
</div>
