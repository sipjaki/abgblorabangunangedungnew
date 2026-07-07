<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white text-center py-3">
            <h5 class="mb-0">FORMULIR PENILAIAN KERUSAKAN BANGUNAN</h5>
        </div>
        <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <label class="form-label font-weight-bold">Tanggal Terbit</label>
                        <input type="date" name="tanggalterbit" class="form-control" required>
                    </div>
                    <div class="col-md-8 mb-3">
                        <label class="form-label font-weight-bold">Keterangan (Cadangan)</label>
                        <input type="text" name="cadangan1" class="form-control" placeholder="Masukkan keterangan tambahan atau catatan lapangan...">
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light text-center">
                            <tr>
                                <th style="width: 5%;">NO</th>
                                <th style="width: 20%;">KOMPONEN STANDAR</th>
                                <th style="width: 10%;">BOBOT</th>
                                <th style="width: 30%;">TINGKAT KERUSAKAN (1 INPUT AUTOMATIC)</th>
                                <th style="width: 10%;">HASIL HITUNG</th>
                                <th style="width: 25%;">LAMPIRAN BUKTI FOTO & PREVIEW</th>
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
                                    <select name="pilihan_{{ $item['key'] }}" class="form-select skala-select" data-bobot="{{ $item['bobot_val'] }}" data-target="hasil_{{ $item['key'] }}" required>
                                        <option value="0.00">0,00 - Tidak Rusak</option>
                                        <option value="0.20">0,20 - Ringan</option>
                                        <option value="0.35">0,35 - Ringan</option>
                                        <option value="0.50">0,50 - Sedang</option>
                                        <option value="0.70">0,70 - Sedang</option>
                                        <option value="0.85">0,85 - Berat</option>
                                        <option value="1.00">1,00 - Komponen Tidak Ada</option>
                                    </select>
                                </td>

                                <td class="text-center font-weight-bold text-primary bg-light">
                                    <span id="hasil_{{ $item['key'] }}">0.000</span>
                                </td>

                                <td>
                                    <div class="row g-2">
                                        <div class="col-6 text-center">
                                            <input type="file" name="foto_{{ $item['key'] }}_1" class="form-control form-control-sm preview-input" data-preview="pv_{{ $item['key'] }}_1">
                                            <div class="mt-2 border rounded p-1 bg-light" style="min-height: 75px; display: flex; align-items: center; justify-content: center;">
                                                <img id="pv_{{ $item['key'] }}_1" src="" alt="Preview 1" class="img-fluid rounded d-none" style="max-height: 70px;">
                                                <small class="text-muted placeholder-text" id="text_pv_{{ $item['key'] }}_1">Belum ada foto</small>
                                            </div>
                                        </div>
                                        <div class="col-6 text-center">
                                            <input type="file" name="foto_{{ $item['key'] }}_2" class="form-control form-control-sm preview-input" data-preview="pv_{{ $item['key'] }}_2">
                                            <div class="mt-2 border rounded p-1 bg-light" style="min-height: 75px; display: flex; align-items: center; justify-content: center;">
                                                <img id="pv_{{ $item['key'] }}_2" src="" alt="Preview 2" class="img-fluid rounded d-none" style="max-height: 70px;">
                                                <small class="text-muted placeholder-text" id="text_pv_{{ $item['key'] }}_2">Belum ada foto</small>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            <tr class="table-warning font-weight-bold">
                                <td colspan="4" class="text-end">TOTAL TINGKAT KERUSAKAN BANGUNAN :</td>
                                <td class="text-center text-danger" id="total_skor_akhir">0.000 %</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="row mt-4 pt-3 border-top">
                    <div class="col-md-6 mb-3">
                        <label class="form-label font-weight-bold">Kepala Dinas Pekerjaan Umum</label>
                        <select name="kepaladinas_id" class="form-select" required>
                            <option value="">-- Pilih Kepala Dinas --</option>
                            @foreach($kepalaDinas as $kadin)
                                <option value="{{ $kadin->id }}">{{ $kadin->namalengkap }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label font-weight-bold">Tim Survey (Petugas Dinas)</label>
                        <div class="row g-2">
                            @for($i = 1; $i <= 4; $i++)
                            <div class="col-6 mb-2">
                                <select name="timsurvey{{ $i }}_id" class="form-select form-select-sm">
                                    <option value="">-- Pilih Petugas Dinas {{ $i }} --</option>
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

<script>
document.addEventListener("DOMContentLoaded", function () {

    // --- 1. LOGIKA HITUNG OTOMATIS (REAL-TIME CALCULATION) ---
    const selects = document.querySelectorAll('.skala-select');

    function hitungTotal() {
        let totalSkor = 0;

        selects.forEach(select => {
            const skala = parseFloat(select.value) || 0;
            const bobot = parseFloat(select.getAttribute('data-bobot')) || 0;
            const targetId = select.getAttribute('data-target');

            // Rumus: Skala Input x Bobot Komponen
            const hasilKomponen = skala * bobot;
            totalSkor += hasilKomponen;

            // Tampilkan hasil komponen dengan format 3 angka desimal
            document.getElementById(targetId).innerText = hasilKomponen.toFixed(3);
        });

        // Tampilkan total skor akhir dalam bentuk persentase (%)
        const totalPersen = totalSkor * 100;
        document.getElementById('total_skor_akhir').innerText = totalPersen.toFixed(3) + ' %';
    }

    // Jalankan kalkulasi setiap dropdown diubah nilai skalanya
    selects.forEach(select => {
        select.addEventListener('change', hitungTotal);
    });

    // Jalankan kalkulasi pertama kali saat halaman dimuat
    hitungTotal();


    // --- 2. LOGIKA INSTANT IMAGE PREVIEW ---
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
});
</script>
