<!-- =========================================================== -->
<!-- VIEW: 06_hitunganalisarusak.blade.php -->
<!-- =========================================================== -->

<div class="container-fluid mt-4 px-4">
    <div class="card shadow-sm">
        <div class="card-header text-white py-3" style="background: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%); border-bottom: 4px solid #ffc107; border-radius: 0;">
            <div class="d-flex align-items-center justify-content-center gap-3 flex-wrap">
                <i class="bi bi-building fs-2 text-warning"></i>
                <div class="text-center">
                    <h5 class="mb-0 fw-bold" style="letter-spacing: 0.5px;">
                        <i class="bi bi-clipboard-check me-2"></i>FORMULIR PENILAIAN KERUSAKAN BANGUNAN
                    </h5>
                    <p class="mb-0 small mt-1" style="opacity: 0.9;">
                        <i class="bi bi-geo-alt me-1"></i> Nama Gedung:
                        <span class="fw-semibold text-warning">{{ $data->namagedung ?? '-' }}</span>
                    </p>
                </div>
                <i class="bi bi-clipboard-data fs-2 text-warning"></i>
            </div>
        </div>

        <div class="card-body">

            <form action="{{ route('bantekkerusakanhitungcreate') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <input type="hidden" name="bantekanalisainduk_id" value="{{ $data->id }}">

                {{-- Tanggal dan Keterangan --}}
                <div class="row mb-4">
                    <div class="col-12 mb-3">
                        <label class="form-label font-weight-bold">Tanggal Terbit</label>
                        <input type="date" name="tanggalterbit" class="form-control" style="max-width: 300px;" required>
                    </div>
                    <div class="col-12 mb-2">
                        <label class="form-label font-weight-bold">Keterangan</label>
                        <textarea name="cadangan1" class="form-control" rows="4" placeholder="Masukkan keterangan tambahan..."></textarea>
                    </div>
                </div>

                {{-- Tabel Penilaian --}}
                <div class="table-responsive">
                    <table class="table table-bordered align-middle w-100">
                        <thead class="table-light text-center">
                            <tr>
                                <th style="width: 4%;">NO</th>
                                <th style="width: 16%;">KOMPONEN STANDAR</th>
                                <th style="width: 8%;">BOBOT</th>
                                <th style="width: 25%;">TINGKAT KERUSAKAN (1 INPUT)</th>
                                <th style="width: 11%;">SKALA PILIHAN (%)</th>
                                <th style="width: 11%;">NILAI × BOBOT (%)</th>
                                <th style="width: 25%;">LAMPIRAN BUKTI FOTO & PREVIEW</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $komponen = [
                                    ['label' => 'PONDASI', 'key' => 'pondasi', 'bobot' => 0.10, 'bobot_text' => '10.00%'],
                                    ['label' => 'STRUKTUR', 'key' => 'struktur', 'bobot' => 0.33, 'bobot_text' => '33.00%'],
                                    ['label' => 'ATAP', 'key' => 'atap', 'bobot' => 0.10, 'bobot_text' => '10.00%'],
                                    ['label' => 'LANTAI', 'key' => 'lantai', 'bobot' => 0.07, 'bobot_text' => '7.00%'],
                                    ['label' => 'DINDING', 'key' => 'dinding', 'bobot' => 0.10, 'bobot_text' => '10.00%'],
                                    ['label' => 'PLAFON', 'key' => 'plafon', 'bobot' => 0.07, 'bobot_text' => '7.00%'],
                                    ['label' => 'UTILITAS', 'key' => 'utilitas', 'bobot' => 0.08, 'bobot_text' => '8.00%'],
                                    ['label' => 'FINISHING', 'key' => 'finishing', 'bobot' => 0.15, 'bobot_text' => '15.00%'],
                                ];
                            @endphp

                            @foreach($komponen as $index => $item)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="font-weight-bold">{{ $item['label'] }}</td>
                                <td class="text-center bg-light font-weight-bold">{{ $item['bobot_text'] }}</td>

                                {{-- Dropdown pilihan kerusakan – name="nilaixxx" --}}
                                <td>
                                    <select name="nilai{{ $item['key'] }}"
                                            class="form-select skala-select"
                                            data-bobot="{{ $item['bobot'] }}"
                                            data-skala="skala_{{ $item['key'] }}"
                                            data-target="hasil_{{ $item['key'] }}"
                                            required>
                                        <option value="0.00">0,00 - Tidak Rusak</option>
                                        <option value="0.20">0,20 - Ringan</option>
                                        <option value="0.35">0,35 - Ringan</option>
                                        <option value="0.50">0,50 - Sedang</option>
                                        <option value="0.70">0,70 - Sedang</option>
                                        <option value="0.85">0,85 - Berat</option>
                                        <option value="1.00">1,00 - Komponen Tidak Ada</option>
                                    </select>
                                </td>

                                {{-- Skala pilihan (otomatis) --}}
                                <td class="text-center text-secondary bg-light font-weight-bold">
                                    <span id="skala_{{ $item['key'] }}">0.00</span> %
                                </td>

                                {{-- Nilai × Bobot (otomatis) --}}
                                <td class="text-center font-weight-bold text-primary bg-light">
                                    <span id="hasil_{{ $item['key'] }}">0.00</span> %
                                </td>

                                {{-- Upload foto – name="fotoxxx1" dan "fotoxxx2" --}}
                                <td>
                                    <div class="row g-2">
                                        <div class="col-6 text-center">
                                            <input type="file"
                                                   name="foto{{ $item['key'] }}1"
                                                   class="form-control form-control-sm preview-input"
                                                   data-preview="pv_{{ $item['key'] }}_1"
                                                   accept="image/*">
                                            <div class="mt-2 border rounded p-1 bg-light" style="min-height: 65px; display: flex; align-items: center; justify-content: center;">
                                                <img id="pv_{{ $item['key'] }}_1"
                                                     src=""
                                                     alt="Preview 1"
                                                     class="img-fluid rounded d-none img-trigger-modal"
                                                     style="max-height: 60px; cursor: pointer;">
                                                <small class="text-muted placeholder-text" id="text_pv_{{ $item['key'] }}_1">No Photo</small>
                                            </div>
                                        </div>
                                        <div class="col-6 text-center">
                                            <input type="file"
                                                   name="foto{{ $item['key'] }}2"
                                                   class="form-control form-control-sm preview-input"
                                                   data-preview="pv_{{ $item['key'] }}_2"
                                                   accept="image/*">
                                            <div class="mt-2 border rounded p-1 bg-light" style="min-height: 65px; display: flex; align-items: center; justify-content: center;">
                                                <img id="pv_{{ $item['key'] }}_2"
                                                     src=""
                                                     alt="Preview 2"
                                                     class="img-fluid rounded d-none img-trigger-modal"
                                                     style="max-height: 60px; cursor: pointer;">
                                                <small class="text-muted placeholder-text" id="text_pv_{{ $item['key'] }}_2">No Photo</small>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            {{-- Total --}}
                            <tr class="table-warning font-weight-bold">
                                <td colspan="4" class="text-end">TOTAL TINGKAT KERUSAKAN BANGUNAN :</td>
                                <td colspan="2" class="text-center text-danger fs-5" id="total_skor_akhir">0.00 %</td>
                                <td></td>
                            </tr>

                            {{-- Klasifikasi --}}
                            <tr class="table-light">
                                <td colspan="4" class="small text-muted">
                                    <strong>Ketentuan Klasifikasi Kerusakan:</strong><br>
                                    - Rusak Ringan : ≤ 30%<br>
                                    - Rusak Sedang : ≤ 45%<br>
                                    - Rusak Berat  : ≤ 65%<br>
                                    - Rusak Sangat Berat : > 65%
                                </td>
                                <td colspan="2" class="text-center align-middle bg-white">
                                    <div class="text-muted small font-weight-bold mb-1">STATUS AKHIR:</div>
                                    <span id="status_kerusakan_text" class="badge bg-secondary p-2 fs-6">-</span>
                                </td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                {{-- Penandatangan --}}
                <div class="row mt-4 pt-3 border-top">
                    <div class="col-md-4 mb-3">
                        <label class="form-label font-weight-bold">Kepala Dinas Pekerjaan Umum</label>
                        <select name="kepaladinas_id" class="form-select" required>
                            <option value="">-- Pilih Kepala Dinas --</option>
                            @foreach($kepalaDinas as $kadin)
                                <option value="{{ $kadin->id }}">{{ $kadin->namalengkap }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label font-weight-bold">Kepala Bidang Bangunan Gedung</label>
                        <select name="kabidbangunangedung_id" class="form-select" required>
                            <option value="">-- Pilih Kepala Bidang --</option>
                            @foreach($kabidbangunangedung as $kabid)
                                <option value="{{ $kabid->id }}">{{ $kabid->namalengkap }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label font-weight-bold">Tim Survey (Petugas Dinas)</label>
                        <div class="row g-2">
                            @for($i = 1; $i <= 4; $i++)
                            <div class="col-6 mb-2">
                                <select name="timsurvey{{ $i }}_id" class="form-select form-select-sm">
                                    <option value="">-- Petugas {{ $i }} --</option>
                                    @foreach($petugasDinas as $petugas)
                                        <option value="{{ $petugas->id }}">{{ $petugas->namalengkap }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endfor
                        </div>
                    </div>
                </div>

                <div class="text-end mt-4">
                    <button type="submit" class="button-baru"><i class="bi bi-save"></i>Simpan Analisa</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- Modal Preview Foto --}}
<div class="modal fade" id="imagePreviewModal" tabindex="-1" aria-labelledby="imagePreviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imagePreviewModalLabel">Bukti Foto Kerusakan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center bg-dark rounded-bottom p-2">
                <img id="modalLargeImage" src="" class="img-fluid rounded" alt="Bukti Foto Besar" style="max-height: 80vh;">
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    const selects = document.querySelectorAll('.skala-select');

    function hitungTotal() {
        let total = 0;
        selects.forEach(select => {
            const skala = parseFloat(select.value) || 0;
            const bobot = parseFloat(select.getAttribute('data-bobot')) || 0;
            const skalaId = select.getAttribute('data-skala');
            const targetId = select.getAttribute('data-target');

            document.getElementById(skalaId).innerText = (skala * 100).toFixed(2);
            const hasil = (skala * bobot) * 100;
            total += hasil;
            document.getElementById(targetId).innerText = hasil.toFixed(2);
        });

        if (total > 100) total = 100;
        document.getElementById('total_skor_akhir').innerText = total.toFixed(2) + ' %';

        const badge = document.getElementById('status_kerusakan_text');
        badge.className = "badge p-2 fs-6";
        if (total === 0) {
            badge.innerText = "Tidak Ada Kerusakan";
            badge.classList.add('bg-success');
        } else if (total <= 30) {
            badge.innerText = "Rusak Ringan";
            badge.classList.add('bg-info', 'text-dark');
        } else if (total <= 45) {
            badge.innerText = "Rusak Sedang";
            badge.classList.add('bg-warning', 'text-dark');
        } else if (total <= 65) {
            badge.innerText = "Rusak Berat";
            badge.classList.add('bg-danger');
        } else {
            badge.innerText = "Rusak Sangat Berat";
            badge.classList.add('bg-dark');
        }
    }

    selects.forEach(select => select.addEventListener('change', hitungTotal));
    hitungTotal();

    // Preview foto
    document.querySelectorAll('.preview-input').forEach(input => {
        input.addEventListener('change', function () {
            const previewId = this.getAttribute('data-preview');
            const img = document.getElementById(previewId);
            const placeholder = document.getElementById('text_' + previewId);

            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    img.src = e.target.result;
                    img.classList.remove('d-none');
                    if (placeholder) placeholder.classList.add('d-none');
                };
                reader.readAsDataURL(file);
            } else {
                img.src = "";
                img.classList.add('d-none');
                if (placeholder) placeholder.classList.remove('d-none');
            }
        });
    });

    // Modal perbesar
    const modalEl = document.getElementById('imagePreviewModal');
    if (typeof bootstrap !== 'undefined') {
        const imageModal = new bootstrap.Modal(modalEl);
        const modalImg = document.getElementById('modalLargeImage');
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('img-trigger-modal')) {
                const src = e.target.getAttribute('src');
                if (src && src !== "") {
                    modalImg.src = src;
                    imageModal.show();
                }
            }
        });
    } else {
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('img-trigger-modal')) {
                const src = e.target.getAttribute('src');
                if (src && src !== "") window.open(src, '_blank');
            }
        });
    }
});
</script>
