@include('backend.00_administrator.00_baganterpisah.01_header')

<!-- ================= BODY ================= -->
<body class="layout-fixed sidebar-expand-lg bg-body-tertiary">

<div class="app-wrapper">

    {{-- ================= NAVBAR & BUTTON ================= --}}
    @include('backend.00_administrator.00_baganterpisah.04_navbar')
    @include('backend.00_administrator.00_baganterpisah.09_button')

    {{-- ================= SIDEBAR & ALERT ================= --}}
    @include('backend.00_administrator.00_baganterpisah.03_sidebar')
    @include('frontend.android.00_fiturmenu.06_alert')

    <!-- ================= APP MAIN ================= -->
    <main class="app-main" style="
        background: linear-gradient(to bottom, #7de3f1, #ffffff);
        margin: 0;
        padding: 0;
        position: relative;
        left: 0;
    ">

        <!-- ================= HEADER ================= -->
        <div class="app-content-header">
            <div class="container-fluid">
                <div class="row">
                    @include('backend.00_administrator.00_baganterpisah.10_selamatdatang')
                </div>
            </div>
        </div>

        <br>

        <!-- ================= CONTENT ================= -->
        <div class="container-fluid">

            @include('backend.00_administrator.00_baganterpisah.11_judulhalaman')
            @include('frontend.abgblora.01_pbgslf.00_informasi.backendfiturmenupbg')

            <br>

            {{-- ================= BUTTON UPDATE ================= --}}
            @foreach ($data as $item)
                <div class="d-flex justify-content-end mb-2">
                    <a href="{{ route('updatefungsicampuran', ['id' => $item->id]) }}"
                       class="button-berkas">
                        <i class="bi bi-arrow-repeat"></i> Update
                    </a>
                </div>
            @endforeach

            <hr>

            {{-- ================= DATA CARD ================= --}}
            @foreach ($data as $item)
                <div class="card mb-4 shadow-sm">

                    <div class="card-header bg-primary text-white">
                        <i class="bi bi-info-circle me-2"></i> {{ $title }}
                    </div>

                    {{-- ================= POSTER ================= --}}
                    <div class="p-3">
                        <label class="form-label form-label-modern mb-2 d-block">
                            <i class="bi bi-file-earmark-image text-success me-1"></i> Poster Gambar
                        </label>

                        @php
                            $ext = strtolower(pathinfo($item->berkas ?? '', PATHINFO_EXTENSION));
                            $filePath = $item->berkas && file_exists(public_path('storage/' . $item->berkas))
                                ? asset('storage/' . $item->berkas)
                                : ($item->berkas ? asset($item->berkas) : null);
                        @endphp

                        @if ($filePath)
                            @if (in_array($ext, ['jpg', 'jpeg', 'png', 'webp']))
                                <img src="{{ $filePath }}" class="img-fluid rounded border"
                                     style="max-height:300px; object-fit:contain;">
                            @else
                                <iframe src="{{ $filePath }}" width="100%" height="300"
                                        class="border rounded"></iframe>
                            @endif
                        @else
                            <div class="form-control bg-light">Belum diunggah</div>
                        @endif
                    </div>

                    {{-- ================= BODY ================= --}}
                    <div class="card-body">

                        {{-- ROW 1 --}}
                        <div class="row">
                            <div class="form-modern col-md-6 mb-3">
                                <label class="form-label-modern">
                                    <i class="bi bi-card-heading text-primary me-1"></i> Judul
                                </label>
                                <div class="p-2 bg-light border rounded min-h">
                                    {!! nl2br(e($item->judul ?? '-')) !!}
                                </div>
                            </div>

                            <div class="form-modern col-md-6 mb-3">
                                <label class="form-label-modern">
                                    <i class="bi bi-info-circle text-warning me-1"></i> Keterangan
                                </label>
                                <div class="p-2 bg-light border rounded min-h">
                                    {!! nl2br(e($item->keterangan ?? '-')) !!}
                                </div>
                            </div>
                        </div>

                        {{-- ROW 2 --}}
                        <div class="row">
                            <div class="form-modern col-md-6 mb-3">
                                <label class="form-label-modern">
                                    <i class="bi bi-link-45deg text-info me-1"></i> Info Lanjut
                                </label>
                                <div class="p-2 bg-light border rounded min-h">
                                    {!! nl2br(e($item->infolanjut ?? '-')) !!}
                                </div>
                            </div>

                            <div class="form-modern col-md-6 mb-3">
                                <label class="form-label-modern">
                                    <i class="bi bi-file-text text-secondary me-1"></i> Paragraf 1
                                </label>
                                <div class="p-2 bg-light border rounded min-h">
                                    {!! nl2br(e($item->cadangan1 ?? '-')) !!}
                                </div>
                            </div>
                        </div>

                        {{-- ROW 3 – 5 --}}
                        @for ($i = 2; $i <= 7; $i += 2)
                            <div class="row">
                                <div class="form-modern col-md-6 mb-3">
                                    <label class="form-label-modern">Paragraf {{ $i }}</label>
                                    <div class="p-2 bg-light border rounded min-h">
                                        {!! nl2br(e($item->{'cadangan'.$i} ?? '-')) !!}
                                    </div>
                                </div>

                                <div class="form-modern col-md-6 mb-3">
                                    <label class="form-label-modern">Paragraf {{ $i + 1 }}</label>
                                    <div class="p-2 bg-light border rounded min-h">
                                        {!! nl2br(e($item->{'cadangan'.($i+1)} ?? '-')) !!}
                                    </div>
                                </div>
                            </div>
                        @endfor

                    </div>
                </div>
            @endforeach

            <br><br>

            {{-- ================= MODAL DELETE ================= --}}
            <div class="modal fade" id="deleteModal" tabindex="-1">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <div class="modal-header">
                            <img src="/assets/icon/pupr.png" width="30" class="me-2">
                            <h5 class="modal-title">DPUPR Kabupaten Blora</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body">
                            Apakah Anda ingin menghapus data:
                            <strong id="itemName"></strong> ?
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <form id="deleteForm" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">Hapus</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </main>
</div>

@include('backend.00_administrator.00_baganterpisah.02_footer')
