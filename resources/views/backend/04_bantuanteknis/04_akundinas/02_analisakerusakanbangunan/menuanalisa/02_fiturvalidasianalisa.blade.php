@canany(['superadmin', 'admin'])
{{-- @canany(['admindinas']) --}}

<table class="table table-bordered w-100" style="font-size: 13px;">
    <thead>
        <tr>
            <th style="text-align: center;">Verifikasi Berkas</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="text-align: center; padding: 16px;">
                <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 12px;">

                    <!-- Dokumen Lengkap (1) -->
                    @if($data->validasiberkas1 == 'sudah')
                        <button class="button-hijau" type="button" onclick="openModal1({{ $data->id }})">
                            <i class="bi bi-patch-check-fill me-1"></i> Dokumen Lengkap
                        </button>
                    @elseif($data->validasiberkas1 == 'belum')
                        <button class="button-merah" type="button" onclick="openModal1({{ $data->id }})">
                            <i class="bi bi-x-circle me-1"></i> Dokumen Tidak Lengkap
                        </button>
                    @else
                        <button class="button-modern" type="button" onclick="openModal1({{ $data->id }})">
                            <i class="bi bi-patch-check me-1"></i> Dokumen Terverifikasi
                        </button>
                    @endif

                    <!-- Surat Pemberitahuan (2) -->
                    @if($data->validasiberkas2 == 'sudah')
                        <button class="button-hijau" type="button" onclick="openModal2({{ $data->id }})">
                            <i class="bi bi-patch-check-fill me-1"></i> Lolos
                        </button>
                    @elseif($data->validasiberkas2 == 'belum')
                        <button class="button-merah" type="button" onclick="openModal2({{ $data->id }})">
                            <i class="bi bi-x-circle me-1"></i> Dikembalikan
                        </button>
                    @else
                        <button class="button-modern" type="button" onclick="openModal2({{ $data->id }})">
                            <i class="bi bi-patch-check me-1"></i> Verifikasi Berkas
                        </button>
                    @endif

                    <!-- TPA/TPT (3) -->
                    @if($data->validasiberkas3 == 'sudah')
                        <button class="button-hijau" type="button" onclick="openModal3({{ $data->id }})">
                            <i class="bi bi-patch-check-fill me-1"></i> Selesai
                        </button>
                    @elseif($data->validasiberkas3 == 'belum')
                        <button class="button-merah" type="button" onclick="openModal3({{ $data->id }})">
                            <i class="bi bi-x-circle me-1"></i> Dibatalkan
                        </button>
                    @else
                        <button class="button-modern" type="button" onclick="openModal3({{ $data->id }})">
                            <i class="bi bi-patch-check me-1"></i> Pengolahan Data
                        </button>
                    @endif

                    <!-- Surat Undangan (4) -->
                    @if($data->validasiberkas4 == 'sudah')
                        <button class="button-hijau" type="button" onclick="openModal4({{ $data->id }})">
                            <i class="bi bi-patch-check-fill me-1"></i> Selesai
                        </button>
                    @elseif($data->validasiberkas4 == 'belum')
                        <button class="button-merah" type="button" onclick="openModal4({{ $data->id }})">
                            <i class="bi bi-x-circle me-1"></i> Dibatalkan
                        </button>
                    @else
                        <button class="button-modern" type="button" onclick="openModal4({{ $data->id }})">
                            <i class="bi bi-patch-check me-1"></i> Status Permohonan
                        </button>
                    @endif

                    <!-- Berita Acara (5) -->
                    @if($data->validasiberkas5 == 'sudah')
                        <button class="button-hijau" type="button" onclick="openModal5({{ $data->id }})">
                            <i class="bi bi-patch-check-fill me-1"></i> Selesai
                        </button>
                    @elseif($data->validasiberkas5 == 'belum')
                        <button class="button-merah" type="button" onclick="openModal5({{ $data->id }})">
                            <i class="bi bi-x-circle me-1"></i> Dibatalkan
                        </button>
                    @else
                        <button class="button-modern" type="button" onclick="openModal5({{ $data->id }})">
                            <i class="bi bi-patch-check me-1"></i> Rekom Teknis
                        </button>
                    @endif

                </div>
            </td>
        </tr>
    </tbody>
</table>

<!-- ===================== MODAL 1 ===================== -->
<div id="confirmModal1" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah berkas sudah sesuai (Dokumen Lengkap)?</p>
        <form id="validasiForm1" method="POST" action="">
            @csrf
            @method('PUT')
            <button type="submit" name="validasiberkas1" value="sudah" class="button-hijau">
                <i class="bi bi-check2-circle me-1"></i> Sudah
            </button>
            <button type="submit" name="validasiberkas1" value="belum" class="button-merah">
                <i class="bi bi-x-circle me-1"></i> Belum
            </button>
        </form>
        <br><br>
        <button type="button" onclick="closeModal1()" class="button-modern">
            <i class="bi bi-x-circle me-1"></i> Batal
        </button>
    </div>
</div>

<!-- ===================== MODAL 2 ===================== -->
<div id="confirmModal2" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah berkas sudah sesuai?</p>
        <form id="validasiForm2" method="POST" action="/validasianalisa2/{{ $data->id }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="document_type" value="2">
            <button type="submit" name="validasiberkas2" value="sudah" class="button-hijau">
                <i class="bi bi-check2-circle me-1"></i> Sudah
            </button>
            <button type="submit" name="validasiberkas2" value="belum" class="button-merah">
                <i class="bi bi-x-circle me-1"></i> Belum
            </button>
        </form>
        <br><br>
        <button type="button" onclick="closeModal2()" class="button-modern">
            <i class="bi bi-x-circle me-1"></i> Batal
        </button>
    </div>
</div>

<!-- ===================== MODAL 3 ===================== -->
<div id="confirmModal3" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah survey lapangan sudah selesai ?</p>
        <form id="validasiForm3" method="POST" action="/validasianalisa3/{{ $data->id }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="document_type" value="3">
            <button type="submit" name="validasiberkas3" value="sudah" class="button-hijau">
                <i class="bi bi-check2-circle me-1"></i> Sudah
            </button>
            <button type="submit" name="validasiberkas3" value="belum" class="button-merah">
                <i class="bi bi-x-circle me-1"></i> Belum
            </button>
        </form>
        <br><br>
        <button type="button" onclick="closeModal3()" class="button-modern">
            <i class="bi bi-x-circle me-1"></i> Batal
        </button>
    </div>
</div>

<!-- ===================== MODAL 4 ===================== -->
<div id="confirmModal4" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah pengolahan data sudah selesai ?</p>
        <form id="validasiForm4" method="POST" action="/validasianalisa4/{{ $data->id }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="document_type" value="4">
            <button type="submit" name="validasiberkas4" value="sudah" class="button-hijau">
                <i class="bi bi-check2-circle me-1"></i> Sudah
            </button>
            <button type="submit" name="validasiberkas4" value="belum" class="button-merah">
                <i class="bi bi-x-circle me-1"></i> Belum
            </button>
        </form>
        <br><br>
        <button type="button" onclick="closeModal4()" class="button-modern">
            <i class="bi bi-x-circle me-1"></i> Batal
        </button>
    </div>
</div>

<!-- ===================== MODAL 5 ===================== -->
<div id="confirmModal5" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah Permohonan Sudah Selesai ?</p>
        <form id="validasiForm5" method="POST" action="/validasianalisa5/{{ $data->id }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="document_type" value="5">
            <button type="submit" name="validasiberkas5" value="sudah" class="button-hijau">
                <i class="bi bi-check2-circle me-1"></i> Sudah
            </button>
            <button type="submit" name="validasiberkas5" value="belum" class="button-merah">
                <i class="bi bi-x-circle me-1"></i> Belum
            </button>
        </form>
        <br><br>
        <button type="button" onclick="closeModal5()" class="button-modern">
            <i class="bi bi-x-circle me-1"></i> Batal
        </button>
    </div>
</div>

<!-- ===================== SCRIPT ===================== -->
<script>
    // ===== OPEN MODAL =====
    function openModal1(itemId) {
        document.getElementById('validasiForm1').action = `/validasianalisa1/${itemId}`;
        document.getElementById('confirmModal1').style.display = "flex";
        document.body.style.overflow = 'hidden';
    }
    function openModal2(itemId) {
        document.getElementById('validasiForm2').action = `/validasianalisa2/${itemId}`;
        document.getElementById('confirmModal2').style.display = "flex";
        document.body.style.overflow = 'hidden';
    }
    function openModal3(itemId) {
        document.getElementById('validasiForm3').action = `/validasianalisa3/${itemId}`;
        document.getElementById('confirmModal3').style.display = "flex";
        document.body.style.overflow = 'hidden';
    }
    function openModal4(itemId) {
        document.getElementById('validasiForm4').action = `/validasianalisa4/${itemId}`;
        document.getElementById('confirmModal4').style.display = "flex";
        document.body.style.overflow = 'hidden';
    }
    function openModal5(itemId) {
        document.getElementById('validasiForm5').action = `/validasianalisa5/${itemId}`;
        document.getElementById('confirmModal5').style.display = "flex";
        document.body.style.overflow = 'hidden';
    }

    // ===== CLOSE MODAL =====
    function closeModal1() {
        document.getElementById('confirmModal1').style.display = "none";
        document.body.style.overflow = 'auto';
    }
    function closeModal2() {
        document.getElementById('confirmModal2').style.display = "none";
        document.body.style.overflow = 'auto';
    }
    function closeModal3() {
        document.getElementById('confirmModal3').style.display = "none";
        document.body.style.overflow = 'auto';
    }
    function closeModal4() {
        document.getElementById('confirmModal4').style.display = "none";
        document.body.style.overflow = 'auto';
    }
    function closeModal5() {
        document.getElementById('confirmModal5').style.display = "none";
        document.body.style.overflow = 'auto';
    }

    // ===== KLIK DI LUAR MODAL UNTUK MENUTUP =====
    window.addEventListener('click', function (event) {
        for (let i = 1; i <= 5; i++) {
            const modal = document.getElementById('confirmModal' + i);
            if (modal && event.target === modal) {
                modal.style.display = "none";
                document.body.style.overflow = 'auto';
            }
        }
    });

    // ===== TUTUP MODAL DENGAN TOMBOL ESC =====
    document.addEventListener('keydown', function (event) {
        if (event.key === "Escape") {
            for (let i = 1; i <= 5; i++) {
                const modal = document.getElementById('confirmModal' + i);
                if (modal && modal.style.display === "flex") {
                    modal.style.display = "none";
                    document.body.style.overflow = 'auto';
                }
            }
        }
    });
</script>

@endcanany
