    <style>
        .surat-kajian-section {
            background: white;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            margin-bottom: 30px;
            animation: muncul 0.8s ease-out;
        }

        @keyframes muncul {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .surat-kajian-header {
            background: linear-gradient(135deg, #2c3e50, #4a6582);
            color: white;
            padding: 20px 25px;
            font-size: 1.4rem;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid #eaeaea;
        }

        .surat-kajian-header i {
            font-size: 1.6rem;
            color: #f39c12;
        }

        .surat-kajian-isi {
            padding: 25px;
        }

        .pembongkaran-wrapper {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 25px;
            margin-top: 15px;
        }

        .pembongkaran-item {
            background: #fff;
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border-left: 5px solid #e74c3c;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .pembongkaran-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 18px rgba(0, 0, 0, 0.1);
        }

        .pembongkaran-selesai {
            border-left-color: #27ae60;
        }

        .pembongkaran-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(90deg, #e74c3c, #f39c12);
            animation: garis-berjalan 2s infinite alternate;
        }

        @keyframes garis-berjalan {
            0% { background-position: 0% 50%; }
            100% { background-position: 100% 50%; }
        }

        .pembongkaran-selesai::before {
            background: linear-gradient(90deg, #27ae60, #2ecc71);
        }

        .pembongkaran-judul {
            display: flex;
            align-items: center;
            margin-bottom: 15px;
            color: #2c3e50;
        }

        .pembongkaran-judul i {
            font-size: 1.8rem;
            margin-right: 12px;
            color: #e74c3c;
        }

        .pembongkaran-selesai .pembongkaran-judul i {
            color: #27ae60;
        }

        .pembongkaran-label {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: #2c3e50;
        }

        .pembongkaran-nilai {
            font-size: 1.8rem;
            font-weight: 700;
            color: #e74c3c;
            padding: 10px 0;
            animation: angka-muncul 1s ease-out;
            min-height: 60px;
            display: flex;
            align-items: center;
        }

        @keyframes angka-muncul {
            0% { opacity: 0; transform: scale(0.8); }
            100% { opacity: 1; transform: scale(1); }
        }

        .pembongkaran-selesai .pembongkaran-nilai {
            color: #27ae60;
        }

        .pembongkaran-keterangan {
            font-size: 0.95rem;
            color: #7f8c8d;
            margin-top: 10px;
            padding-top: 10px;
            border-top: 1px dashed #eee;
        }

        .pembongkaran-status {
            display: inline-block;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 600;
            margin-top: 10px;
            animation: status-berkedip 2s infinite;
        }

        @keyframes status-berkedip {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.8; }
        }

        .status-aktif {
            background-color: rgba(231, 76, 60, 0.1);
            color: #e74c3c;
        }

        .status-selesai {
            background-color: rgba(39, 174, 96, 0.1);
            color: #27ae60;
        }

        .pembongkaran-icon-wrapper {
            position: absolute;
            bottom: 15px;
            right: 15px;
            opacity: 0.1;
            font-size: 4rem;
            z-index: 0;
        }

        .pembongkaran-progress-container {
            margin-top: 15px;
        }

        .pembongkaran-progress-label {
            display: flex;
            justify-content: space-between;
            margin-bottom: 5px;
            font-size: 0.9rem;
            color: #7f8c8d;
        }

        .pembongkaran-progress-bar {
            height: 8px;
            background-color: #ecf0f1;
            border-radius: 4px;
            overflow: hidden;
        }

        .pembongkaran-progress {
            height: 100%;
            background: linear-gradient(90deg, #e74c3c, #f39c12);
            border-radius: 4px;
            width: 0;
            animation: isi-progress 2s ease-out forwards;
        }

        @keyframes isi-progress {
            to { width: var(--progress-width); }
        }

        .pembongkaran-selesai .pembongkaran-progress {
            background: linear-gradient(90deg, #27ae60, #2ecc71);
        }

        .data-tidak-ada {
            color: #95a5a6 !important;
            font-style: italic;
            font-weight: normal;
            font-size: 1.4rem;
        }

        @media (max-width: 768px) {
            .pembongkaran-wrapper {
                grid-template-columns: 1fr;
            }

            .surat-kajian-header {
                padding: 15px 20px;
                font-size: 1.2rem;
            }

            .surat-kajian-isi {
                padding: 20px;
            }

            .pembongkaran-item {
                padding: 20px;
            }

            .pembongkaran-nilai {
                font-size: 1.5rem;
                min-height: 50px;
            }
        }
    </style>

    <div class="section">
        <div class="section-header">
            <i class="bi bi-clipboard-check"></i> JADWAL PEMBONGKARAN BANGUNAN
        </div>

        <div class="surat-kajian-isi">

            <!-- Nama Bangunan (READ ONLY) -->
            <div style="margin-bottom: 30px; padding: 20px; background: #f8f9fa; border-radius: 8px; border-left: 4px solid #3498db;">
                <div style="font-weight: 600; color: #2c3e50; margin-bottom: 5px;">
                    <i class="bi bi-building"></i> Nama Bangunan
                </div>
                <div style="font-size: 1.3rem;">
                    {{ $data->cadangan1 ?? 'Data Tidak Ditemukan' }}
                </div>
            </div>

            <div class="pembongkaran-wrapper">

                <!-- TANGGAL MULAI -->
                <div class="pembongkaran-item">
                    <label class="pembongkaran-label">
                        <i class="bi bi-calendar-check"></i> Tanggal Mulai Pembongkaran
                    </label>

                    <input type="date"
                           name="cadangan5"
                           class="form-control mt-2 @error('cadangan5') is-invalid @enderror"
                           value="{{ old('cadangan5', $data->cadangan5) }}">

                    @error('cadangan5')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if($data->cadangan5)
                        <small class="text-muted d-block mt-2">
                            Data sebelumnya: <strong>{{ $data->cadangan5 }}</strong>
                        </small>
                    @endif
                </div>

                <!-- TANGGAL SELESAI -->
                <div class="pembongkaran-item pembongkaran-selesai">
                    <label class="pembongkaran-label">
                        <i class="bi bi-calendar-event"></i> Tanggal Selesai Pembongkaran
                    </label>

                    <input type="date"
                           name="catatan5"
                           class="form-control mt-2 @error('catatan5') is-invalid @enderror"
                           value="{{ old('catatan5', $data->catatan5) }}">

                    @error('catatan5')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if($data->catatan5)
                        <small class="text-muted d-block mt-2">
                            Data sebelumnya: <strong>{{ $data->catatan5 }}</strong>
                        </small>
                    @endif
                </div>
            </div>

            <!-- TOMBOL SIMPAN -->
            <div class="text-end mt-4">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="bi bi-save me-1"></i> Simpan Perubahan
                </button>
            </div>

        </div>
    </div>

    <script>
        // Fungsi untuk animasi progress bar saat scroll
        document.addEventListener('DOMContentLoaded', function() {
            // Animasi progress bar saat scroll
            const observerOptions = {
                threshold: 0.3
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animationPlayState = 'running';
                    }
                });
            }, observerOptions);

            // Terapkan observer pada progress bars
            document.querySelectorAll('.pembongkaran-progress').forEach(progress => {
                progress.style.animationPlayState = 'paused';
                observer.observe(progress);
            });

            // Efek hover yang lebih smooth
            document.querySelectorAll('.pembongkaran-item').forEach(item => {
                item.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px) scale(1.02)';
                });

                item.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0) scale(1)';
                });
            });

            // Hitung durasi pembongkaran jika kedua tanggal ada
            const tanggalMulai = document.getElementById('mulaiPembongkaran').textContent;
            const tanggalSelesai = document.getElementById('selesaiPembongkaran').textContent;

            // Cek jika kedua tanggal valid (bukan "Belum Ditentukan")
            if (!tanggalMulai.includes('Belum') && !tanggalSelesai.includes('Belum')) {
                // Di sini bisa ditambahkan logika untuk menghitung durasi
                // dan menampilkan informasi durasi yang lebih akurat
                console.log('Kedua tanggal tersedia:', tanggalMulai, 'hingga', tanggalSelesai);
            }
        });
    </script>
