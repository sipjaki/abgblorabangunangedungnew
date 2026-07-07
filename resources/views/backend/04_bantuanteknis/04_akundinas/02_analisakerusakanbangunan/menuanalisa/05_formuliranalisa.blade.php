<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-white text-center py-3">
            <h5 class="mb-0">FORMULIR PENILAIAN KERUSAKAN BANGUNAN</h5>
        </div>
        <div class="card-body">
            {{-- <form action="{{ route('penilaian.store') }}" method="POST" enctype="multipart/form-data"> --}}
                <form action="" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row mb-4">
                    <div class="col-md-4">
                        <label class="form-label font-weight-bold">Tanggal Terbit</label>
                        <input type="date" name="tanggalterbit" class="form-control" required>
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
                                <th style="width: 35%;">LAMPIRAN BUKTI FOTO</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                // Array data komponen untuk looping view beserta display persentase bobotnya
                                $daftarKomponen = [
                                    ['label' => 'PONDASI', 'key' => 'pondasi', 'bobot_text' => '10.00%'],
                                    ['label' => 'STRUKTUR', 'key' => 'struktur', 'bobot_text' => '33.00%'],
                                    ['label' => 'ATAP', 'key' => 'atap', 'bobot_text' => '10.00%'],
                                    ['label' => 'LANTAI', 'key' => 'lantai', 'bobot_text' => '7.00%'],
                                    ['label' => 'DINDING', 'key' => 'dinding', 'bobot_text' => '10.00%'],
                                    ['label' => 'PLAFON', 'key' => 'plafon', 'bobot_text' => '7.00%'],
                                    ['label' => 'UTILITAS', 'key' => 'utilitas', 'bobot_text' => '8.00%'],
                                    ['label' => 'FINISHING', 'key' => 'finishing', 'bobot_text' => '15.00%'],
                                ];
                            @endphp

                            @foreach($daftarKomponen as $index => $item)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td class="font-weight-bold">{{ $item['label'] }}</td>
                                <td class="text-center bg-light">{{ $item['bobot_text'] }}</td>

                                <td>
                                    <select name="pilihan_{{ $item['key'] }}" class="form-select" required>
                                        <option value="tidak_rusak">Tidak Rusak (Skala 0.00)</option>
                                        <option value="ringan">Rusak Ringan (Skala 0.20)</option>
                                        <option value="sedang">Rusak Sedang (Skala 0.35)</option>
                                        <option value="berat">Rusak Berat (Skala 0.70)</option>
                                    </select>
                                </td>

                                <td>
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <input type="file" name="foto_{{ $item['key'] }}_1" class="form-control form-control-sm" placeholder="Foto 1">
                                        </div>
                                        <div class="col-6">
                                            <input type="file" name="foto_{{ $item['key'] }}_2" class="form-control form-control-sm" placeholder="Foto 2">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
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
