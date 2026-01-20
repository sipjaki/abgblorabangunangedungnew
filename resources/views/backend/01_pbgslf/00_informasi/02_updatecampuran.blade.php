@include('backend.00_administrator.00_baganterpisah.01_header')

<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

<div class="app-wrapper">

    {{-- ================= NAVBAR ================= --}}
    @include('backend.00_administrator.00_baganterpisah.04_navbar')
    @include('backend.00_administrator.00_baganterpisah.09_button')

    {{-- ================= SIDEBAR & ALERT ================= --}}
    @include('backend.00_administrator.00_baganterpisah.03_sidebar')
    @include('frontend.android.00_fiturmenu.06_alert')

    {{-- ================= APP MAIN ================= --}}
    <main class="app-main" style="background:#fff; margin:0; padding:0;">

        {{-- ================= HEADER ================= --}}
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    @include('backend.00_administrator.00_baganterpisah.10_selamatdatang')
                </div>
            </div>
        </div>

        <br>

        {{-- ================= CONTENT ================= --}}
        <div class="container-fluid">
            <div class="row putih mx-2">

                <div class="card mb-4">

                    <div class="card-header">
                        @include('backend.00_administrator.00_baganterpisah.11_judulhalaman')
                    </div>

                    {{-- ================= BUTTON KEMBALI ================= --}}
                    <div class="d-flex justify-content-end mb-2">
                        <button class="button-modern"
                                type="button"
                                onclick="window.location.href='{{ url('/bepbgslfinformasi') }}'">
                            <i class="bi bi-arrow-left me-1"></i> Kembali
                        </button>
                    </div>

                    <hr>

                    {{-- ================= FORM ================= --}}
                    <div class="card-body p-0">
                        <form action="{{ route('updatefungsicampurannew', $data->id) }}"
                              method="POST"
                              enctype="multipart/form-data">
                            @csrf

                            <div class="card-body">

                                {{-- ===== INFORMASI UTAMA ===== --}}
                                <div class="row">

                                    {{-- Judul --}}
                                    <div class="form-modern col-md-6">
                                        <label class="form-label-modern">
                                            <i class="bi bi-type me-2 text-primary"></i> Judul
                                        </label>
                                        <input type="text" name="judul"
                                               value="{{ old('judul', $data->judul) }}"
                                               class="form-control @error('judul') is-invalid @enderror">
                                        @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>

                                    {{-- Keterangan --}}
                                    <div class="form-modern col-md-6">
                                        <label class="form-label-modern">
                                            <i class="bi bi-card-text me-2 text-primary"></i> Keterangan
                                        </label>
                                        <textarea name="keterangan"
                                                  rows="5"
                                                  class="form-control @error('keterangan') is-invalid @enderror">{{ old('keterangan', $data->keterangan) }}</textarea>
                                        @error('keterangan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>

                                    {{-- Info Lanjut --}}
                                    <div class="form-modern col-md-12">
                                        <label class="form-label-modern">
                                            <i class="bi bi-info-circle me-2 text-primary"></i> Info Lanjut
                                        </label>
                                        <textarea name="infolanjut"
                                                  rows="5"
                                                  class="form-control @error('infolanjut') is-invalid @enderror">{{ old('infolanjut', $data->infolanjut) }}</textarea>
                                        @error('infolanjut')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                    </div>
                                </div>

                                {{-- ===== PARAGRAF ===== --}}
                                <div class="row">
                                    @for ($i = 1; $i <= 7; $i++)
                                        <div class="form-modern col-md-6">
                                            <label class="form-label-modern">
                                                <i class="bi bi-file-text me-2 text-primary"></i> Paragraf {{ $i }}
                                            </label>
                                            <textarea name="cadangan{{ $i }}"
                                                      rows="5"
                                                      class="form-control @error('cadangan'.$i) is-invalid @enderror">{{ old('cadangan'.$i, $data->{'cadangan'.$i}) }}</textarea>
                                            @error('cadangan'.$i)<div class="invalid-feedback">{{ $message }}</div>@enderror
                                        </div>
                                    @endfor
                                </div>

                                {{-- ===== UPLOAD ===== --}}
                                <div class="text-center my-4">
                                    <hr class="border-primary border-2 w-50 mx-auto">
                                    <h6 class="text-primary fw-bold">
                                        <i class="bi bi-upload me-2"></i> Upload Informasi
                                    </h6>
                                    <hr class="border-primary border-2 w-50 mx-auto">
                                </div>

                                <div class="form-modern col-md-6">
                                    <label class="form-label-modern">
                                        <i class="bi bi-file-earmark-pdf text-danger me-2"></i> Upload Berkas
                                    </label>
                                    <input type="file"
                                           name="berkas"
                                           class="form-control @error('berkas') is-invalid @enderror"
                                           accept="application/pdf,image/*">
                                    @error('berkas')<div class="invalid-feedback">{{ $message }}</div>@enderror
                                </div>

                                {{-- ===== SUBMIT ===== --}}
                                <div class="d-flex justify-content-end mt-4">
                                    <button type="button"
                                            class="button-berkas"
                                            onclick="openModal()">
                                        <i class="bi bi-arrow-repeat me-2"></i> Perbaikan Data ?
                                    </button>
                                </div>

                            </div>

                            {{-- ===== MODAL KONFIRMASI ===== --}}
                            <div id="confirmModal" class="modal-overlay">
                                <div class="modal-box">
                                    <p class="fw-semibold mb-3">Perbaiki data ini?</p>
                                    <div class="d-flex justify-content-center gap-3">
                                        <button type="button" onclick="submitForm()" class="btn btn-success">
                                            <i class="bi bi-check-circle"></i> Ya
                                        </button>
                                        <button type="button" onclick="closeModal()" class="btn btn-danger">
                                            <i class="bi bi-x-circle"></i> Batal
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>
</div>

@include('backend.00_administrator.00_baganterpisah.02_footer')
