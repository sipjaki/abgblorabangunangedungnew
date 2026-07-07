<div class="container-fluid mt-4 px-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white text-center py-3">
            <h5 class="mb-1">FORMULIR PENILAIAN KERUSAKAN BANGUNAN</h5>
            <p class="text-muted mb-0 font-weight-bold">Nama Gedung: {{ $data->namagedung }}</p>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-4">
                    <div class="col-12 mb-3">
                        <label class="form-label font-weight-bold">Tanggal Terbit</label>
                        <input type="date" name="tanggalterbit" class="form-control" style="max-width: 300px;" required>
                    </div>
                    <div class="col-12 mb-2">
                        <label class="form-label font-weight-bold">Keterangan (Cadangan)</label>
                        <textarea name="cadangan1" class="form-control" rows="4" placeholder="Masukkan keterangan tambahan, catatan detail kerusakan, atau rekomendasi teknis lapangan di sini..."></textarea>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle w-100">
                        <thead class="table-light text-center">
                            <tr>
                                <th style="width: 4%;">NO</th>
                                <th style="width: 16%;">KOMPONEN STANDAR</th>
                                <th style="width: 8%;">BOBOT</th>
                                <th style="width: 25%;">TINGKAT KERUSAKAN (1 INPUT)</th>
                                <th style="width: 11%;">SKALA PILIHAN (%)</th>
                                <th style="width: 11%;">NILAI X BOBOT (%)</th>
                                <th style="width: 25%;">LAMPIRAN BUKTI FOTO & PREVIEW (KLIK FOTO UNTUK MEMPERBESAR)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $daftarKomponen = [
                                    ['label' => 'PONDASI', 'key' => 'pondasi', 'bobot_text' => '10.00%', 'bobot_val' => 0.10],
                                    ['label' => 'STRUKTUR', 'key' => 'struktur', 'bobot_text' => '33.00%', 'bobot_val' => 0.33],
                                    ['label' => 'ATAP', 'key' => 'atap', 'bobot_text' => '10.00%', 'bobot_val' => 0.10],
                                    ['label' => 'LANTAI', 'key' => 'lantai', 'bobot_text' => '7.00%', 'bobot_val' => 0.07],
                                    ['label' => 'DINDING', 'key' => 'dinding', 'bobot_text' => '10.00%', 'bobot_val' => 0.10],
                                    ['label' => 'PLAFON', 'key' => 'plafon', 'bobot_text' => '7.00%', 'bobot_val' => 0.07],
                                    ['label' => 'UTILITAS', 'key' => 'utilitas', 'bobot_text' => '8.00%', 'bobot_val' => 0.08],
                                    ['label' => 'FINISHING', 'key' => 'finishing', 'bobot_text' => '15.00%', 'bobot_val' => 0.15],
                                ];
                            @endphp

                            @foreach($daftarKomponen as $index => $item)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="font-weight-bold">{{ $item['label'] }}</td>
                                <td class="text-center bg-light font-weight-bold">
                                    {{ $item['bobot_text'] }}
                                </td>

                                <td>
                                    <select name="pilihan_{{ $item['key'] }}" class="form-select skala-select" data-bobot="{{ $item['bobot_val'] }}" data-skala="skala_{{ $item['key'] }}" data-target="hasil_{{ $item['key'] }}" required>
                                        <option value="0.00">0,00 - Tidak Rusak</option>
                                        <option value="0.20">0,20 - Ringan</option>
                                        <option value="0.35">0,35 - Ringan</option>
                                        <option value="0.50">0,50 - Sedang</option>
                                        <option value="0.70">0,70 - Sedang</option>
                                        <option value="0.85">0,85 - Berat</option>
                                        <option value="1.00">1,00 - Komponen Tidak Ada</option>
                                    </select>
                                </td>

                                <td class="text-center text-secondary bg-light font-weight-bold">
                                    <span id="skala_{{ $item['key'] }}">0.00</span> %
                                </td>

                                <td class="text-center font-weight-bold text-primary bg-light">
                                    <span id="hasil_{{ $item['key'] }}">0.00</span> %
                                </td>

                                <td>
                                    <div class="row g-2">
                                        <div class="col-6 text-center">
                                            <input type="file" name="foto_{{ $item['key'] }}_1" class="form-control form-control-sm preview-input" data-preview="pv_{{ $item['key'] }}_1">
                                            <div class="mt-2 border rounded p-1 bg-light" style="min-height: 65px; display: flex; align-items: center; justify-content: center;">
                                                <img id="pv_{{ $item['key'] }}_1" src="" alt="Preview 1" class="img-fluid rounded d-none img-trigger-modal" style="max-height: 60px; cursor: pointer;">
                                                <small class="text-muted placeholder-text" id="text_pv_{{ $item['key'] }}_1">No Photo</small>
                                            </div>
                                        </div>
                                        <div class="col-6 text-center">
                                            <input type="file" name="foto_{{ $item['key'] }}_2" class="form-control form-control-sm preview-input" data-preview="pv_{{ $item['key'] }}_2">
                                            <div class="mt-2 border rounded p-1 bg-light" style="min-height: 65px; display: flex; align-items: center; justify-content: center;">
                                                <img id="pv_{{ $item['key'] }}_2" src="" alt="Preview 2" class="img-fluid rounded d-none img-trigger-modal" style="max-height: 60px; cursor: pointer;">
                                                <small class="text-muted placeholder-text" id="text_pv_{{ $item['key'] }}_2">No Photo</small>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                            <tr class="table-warning font-weight-bold">
                                <td colspan="4" class="text-end">TOTAL TINGKAT KERUSAKAN BANGUNAN :</td>
                                <td colspan="2" class="text-center text-danger fs-5" id="total_skor_akhir">0.00 %</td>
                                <td></td>
                            </tr>
                            <tr class="table-light">
                                <td colspan="4" class="small text-muted">
                                    <strong>Ketentuan Klasifikasi Kerusakan:</strong><br>
                                    - Rusak Ringan: Maksimal 30%<br>
                                    - Rusak Sedang: Maksimal 45%<br>
                                    - Rusak Berat: Maksimal 65%<br>
                                    - Rusak Sangat Berat: Lebih dari 65%
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
                    <button type="submit" class="btn btn-primary px-4">Simpan Analisa</button>
                </div>
            </form>
        </div>
    </div>
</div>

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
        let totalSkorPersen = 0;

        selects.forEach(select => {
            const skala = parseFloat(select.value) || 0;
            const bobot = parseFloat(select.getAttribute('data-bobot')) || 0;
            const skalaId = select.getAttribute('data-skala');
            const targetId = select.getAttribute('data-target');

            const skalaPersen = skala * 100;
            document.getElementById(skalaId).innerText = skalaPersen.toFixed(2);

            const hasilKomponenPersen = (skala * bobot) * 100;
            totalSkorPersen += hasilKomponenPersen;

            document.getElementById(targetId).innerText = hasilKomponenPersen.toFixed(2);
        });

        if (totalSkorPersen > 100) {
            totalSkorPersen = 100;
        }

        document.getElementById('total_skor_akhir').innerText = totalSkorPersen.toFixed(2) + ' %';

        const statusBadge = document.getElementById('status_kerusakan_text');
        statusBadge.className = "badge p-2 fs-6";

        if (totalSkorPersen === 0) {
            statusBadge.innerText = "Tidak Ada Kerusakan";
            statusBadge.classList.add('bg-success');
        } else if (totalSkorPersen <= 30) {
            statusBadge.innerText = "Rusak Ringan";
            statusBadge.classList.add('bg-info', 'text-dark');
        } else if (totalSkorPersen <= 45) {
            statusBadge.innerText = "Rusak Sedang";
            statusBadge.classList.add('bg-warning', 'text-dark');
        } else if (totalSkorPersen <= 65) {
            statusBadge.innerText = "Rusak Berat";
            statusBadge.classList.add('bg-danger');
        } else {
            statusBadge.innerText = "Rusak Sangat Berat";
            statusBadge.classList.add('bg-dark');
        }
    }

    selects.forEach(select => {
        select.addEventListener('change', hitungTotal);
    });

    hitungTotal();

    // --- LOGIKA INSTANT IMAGE PREVIEW ---
    const imageInputs = document.querySelectorAll('.preview-input');
    imageInputs.forEach(input => {
        input.addEventListener('change', function () {
            const previewId = this.getAttribute('data-preview');
            const previewImg = document.getElementById(previewId);
            const placeholderText = document.getElementById('text_' + previewId);

            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    previewImg.src = e.target.result;
                    previewImg.classList.remove('d-none');
                    if(placeholderText) placeholderText.classList.add('d-none');
                }
                reader.readAsDataURL(file);
            } else {
                previewImg.src = "";
                previewImg.classList.add('d-none');
                if(placeholderText) placeholderText.classList.remove('d-none');
            }
        });
    });

    // --- LOGIKA KLIK FOTO UNTUK MEMBUKA MODAL BESAR ---
    const imageModalElement = document.getElementById('imagePreviewModal');

    if (typeof bootstrap !== 'undefined') {
        const imageModal = new bootstrap.Modal(imageModalElement);
        const modalLargeImage = document.getElementById('modalLargeImage');

        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('img-trigger-modal')) {
                const srcGambar = e.target.getAttribute('src');
                if (srcGambar && srcGambar !== "") {
                    modalLargeImage.src = srcGambar;
                    imageModal.show();
                }
            }
        });
    } else {
        document.addEventListener('click', function (e) {
            if (e.target && e.target.classList.contains('img-trigger-modal')) {
                const srcGambar = e.target.getAttribute('src');
                if (srcGambar && srcGambar !== "") {
                    window.open(srcGambar, '_blank');
                }
            }
        });
    }
});
</script>
