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
        <i class="bi bi-patch-check me-1"></i> Berkas Masuk
    </button>
@endif



                    <!-- Surat Pemberitahuan (2) -->
                    @if($data->validasiberkas2 == 'sudah')
                        <button class="button-hijau" type="button" onclick="openModal2({{ $data->id }})" style=" " >
                            <i class="bi bi-patch-check-fill me-1"></i> Lolos
                        </button>
                    @elseif($data->validasiberkas2 == 'belum')
                        <button class="button-dikembalikan" type="button" onclick="openModal2({{ $data->id }})" style=" ">
                            <i class="bi bi-x-circle me-1"></i> Dikembalikan
                        </button>
                    @else
                        <button class="button-modern" type="button" onclick="openModal2({{ $data->id }})" style="">
                            <i class="bi bi-patch-check me-1"></i> Verifikasi Berkas
                        </button>
                    @endif

                    <!-- TPA/TPT (3) -->
                    @if($data->validasiberkas3 == 'sudah')
                        <button class="button-hijau" type="button" onclick="openModal3({{ $data->id }})" style=" " >
                            <i class="bi bi-patch-check-fill me-1"></i> Selesai
                        </button>
                    @elseif($data->validasiberkas3 == 'belum')
                        <button class="button-dikembalikan" type="button" onclick="openModal3({{ $data->id }})" style=" ">
                            <i class="bi bi-x-circle me-1"></i> Dibatalkan
                        </button>
                    @else
                        <button class="button-modern" type="button" onclick="openModal3({{ $data->id }})" style="">
                            <i class="bi bi-patch-check me-1"></i> Pengolahan Data
                        </button>
                    @endif

                    <!-- Surat Undangan (4) -->
                    @if($data->validasiberkas4 == 'sudah')
                        <button class="button-hijau" type="button" onclick="openModal4({{ $data->id }})" style=" " >
                            <i class="bi bi-patch-check-fill me-1"></i> Selesai
                        </button>
                    @elseif($data->validasiberkas4 == 'belum')
                        <button class="button-dikembalikan" type="button" onclick="openModal4({{ $data->id }})" style=" ">
                            <i class="bi bi-x-circle me-1"></i> Dibatalkan
                        </button>
                    @else
                        <button class="button-modern" type="button" onclick="openModal4({{ $data->id }})" style="">
                            <i class="bi bi-patch-check me-1"></i> Status Permohonan
                        </button>
                    @endif

                    <!-- Berita Acara (5) -->
                    {{-- @if($data->validasiberkas5 == 'sudah')
                        <button class="button-hijau" type="button" onclick="openModal5({{ $data->id }})" style=" " >
                            <i class="bi bi-patch-check-fill me-1"></i> Selesai
                        </button>
                    @elseif($data->validasiberkas5 == 'belum')
                        <button class="button-dikembalikan" type="button" onclick="openModal5({{ $data->id }})" style=" ">
                            <i class="bi bi-x-circle me-1"></i> Dibatalkan
                        </button>
                    @else
                        <button class="button-modern" type="button" onclick="openModal5({{ $data->id }})" style="">
                            <i class="bi bi-patch-check me-1"></i> Rekom Teknis
                        </button>
                    @endif

                    <!-- SKRD (6) -->
                    @if($data->validasiberkas6 == 'sudah')
                        <button class="button-hijau" type="button" onclick="openModal6({{ $data->id }})" style=" " >
                            <i class="bi bi-patch-check-fill me-1"></i> Terbit
                        </button>
                    @elseif($data->validasiberkas6 == 'belum')
                        <button class="button-dikembalikan" type="button" onclick="openModal6({{ $data->id }})" style=" ">
                            <i class="bi bi-x-circle me-1"></i> Tidak Terbit
                        </button>
                    @else
                        <button class="button-modern" type="button" onclick="openModal6({{ $data->id }})" style="">
                            <i class="bi bi-patch-check me-1"></i> Finalisasi
                        </button>
                    @endif --}}

                </div>
            </td>
        </tr>
    </tbody>
</table>

<!-- Modal for Dokumen Lengkap (1) -->
<div id="confirmModal1" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah berkas sudah sesuai (Dokumen Lengkap)?</p>
      <!-- Modal / Form Validasi Berkas 1 -->
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

    </div>
</div>

<!-- Modal for Surat Pemberitahuan (2) -->
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
        <button type="button" onclick="closeModal2()" class="button-merah">
            <i class="bi bi-x-circle me-1"></i> Batal
        </button>
    </div>
</div>


<!-- Modal Validasi Berkas 3 -->
<div id="confirmModal3" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah pengolahan data sudah selesai ?</p>
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
        <button type="button" onclick="closeModal3()" style="background-color: #D1D5DB; padding: 8px 16px; border-radius: 8px; border: none;  cursor: pointer;"
            onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
            onmouseout="this.style.backgroundColor='#D1D5DB'; this.style.color='black';">
            <i class="bi bi-x-circle me-1"></i> Batal
        </button>
    </div>
</div>

<!-- Modal Validasi Berkas 4 -->
<div id="confirmModal4" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah Permohonan sudah selesai ?</p>
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
        <button type="button" onclick="closeModal4()" style="background-color: #D1D5DB; padding: 8px 16px; border-radius: 8px; border: none;  cursor: pointer;"
            onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
            onmouseout="this.style.backgroundColor='#D1D5DB'; this.style.color='black';">
            <i class="bi bi-x-circle me-1"></i> Batal
        </button>
    </div>
</div>

<!-- Modal Validasi Berkas 5 -->
{{-- <div id="confirmModal5" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah Rekom Teknis Mau Diterbitkan ?</p>
        <form id="validasiForm5" method="POST" action="/validasianalisa5/{{ $data->id }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="document_type" value="5">
            <button type="submit" name="validasiberkas5" value="sudah" style=" color: white; padding: 8px 16px; margin-right: 10px; border-radius: 8px; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#10B981'; this.style.color='white';">
                <i class="bi bi-check2-circle me-1"></i> Sudah
            </button>
            <button type="submit" name="validasiberkas5" value="belum" style=" color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#0400ff'; this.style.color='white';">
                <i class="bi bi-x-circle me-1"></i> Belum
            </button>
        </form>
        <br><br>
        <button type="button" onclick="closeModal5()" style="background-color: #D1D5DB; padding: 8px 16px; border-radius: 8px; border: none;  cursor: pointer;"
            onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
            onmouseout="this.style.backgroundColor='#D1D5DB'; this.style.color='black';">
            <i class="bi bi-x-circle me-1"></i> Batal
        </button>
    </div>
</div>

<!-- Modal Validasi Berkas 6 -->
<div id="confirmModal6" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah Keputusan Bupati Sudah Terbit?</p>
        <form id="validasiForm6" method="POST" action="/validasianalisa6/{{ $data->id }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="document_type" value="6">
            <button type="submit" name="validasiberkas6" value="sudah" style=" color: white; padding: 8px 16px; margin-right: 10px; border-radius: 8px; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#10B981'; this.style.color='white';">
                <i class="bi bi-check2-circle me-1"></i> Sudah
            </button>
            <button type="submit" name="validasiberkas6" value="belum" style=" color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#0400ff'; this.style.color='white';">
                <i class="bi bi-x-circle me-1"></i> Belum
            </button>
        </form>
        <br><br>
        <button type="button" onclick="closeModal6()" style="background-color: #D1D5DB; padding: 8px 16px; border-radius: 8px; border: none;  cursor: pointer;"
            onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
            onmouseout="this.style.backgroundColor='#D1D5DB'; this.style.color='black';">
            <i class="bi bi-x-circle me-1"></i> Batal
        </button>
    </div>
</div> --}}




<script>
function openModal1(itemId) {
    const modal = document.getElementById('confirmModal1');
    const form = document.getElementById('validasiForm1');
    form.action = `/validasianalisa1/${itemId}`; // <- HARUS SAMA DENGAN ROUTE
    modal.style.display = "flex";
    document.body.style.overflow = 'hidden';
}

function closeModal1() {
    const modal = document.getElementById('confirmModal1');
    modal.style.display = "none";
    document.body.style.overflow = 'auto';
}

    // Surat Pemberitahuan (2)
    function openModal2(itemId) {
        const modal = document.getElementById('confirmModal2');
        const form = document.getElementById('validasiForm2');
        form.action = `/validasianalisa2/${itemId}`;
        modal.style.display = "flex";
        document.body.style.overflow = 'hidden';
    }

    function closeModal2() {
        const modal = document.getElementById('confirmModal2');
        modal.style.display = "none";
        document.body.style.overflow = 'auto';
    }

    // TPA/TPT (3)
    function openModal3(itemId) {
        const modal = document.getElementById('confirmModal3');
        const form = document.getElementById('validasiForm3');
        form.action = `/validasianalisa3/${itemId}`;
        modal.style.display = "flex";
        document.body.style.overflow = 'hidden';
    }

    function closeModal3() {
        const modal = document.getElementById('confirmModal3');
        modal.style.display = "none";
        document.body.style.overflow = 'auto';
    }

    // Surat Undangan (4)
    function openModal4(itemId) {
        const modal = document.getElementById('confirmModal4');
        const form = document.getElementById('validasiForm4');
        form.action = `/validasianalisa4/${itemId}`;
        modal.style.display = "flex";
        document.body.style.overflow = 'hidden';
    }

    function closeModal4() {
        const modal = document.getElementById('confirmModal4');
        modal.style.display = "none";
        document.body.style.overflow = 'auto';
    }

    // Berita Acara (5)
    function openModal5(itemId) {
        const modal = document.getElementById('confirmModal5');
        const form = document.getElementById('validasiForm5');
        form.action = `/validasianalisa5/${itemId}`;
        modal.style.display = "flex";
        document.body.style.overflow = 'hidden';
    }

    function closeModal5() {
        const modal = document.getElementById('confirmModal5');
        modal.style.display = "none";
        document.body.style.overflow = 'auto';
    }

    // SKRD (6)
    function openModal6(itemId) {
        const modal = document.getElementById('confirmModal6');
        const form = document.getElementById('validasiForm6');
        form.action = `/validasianalisa6/${itemId}`;
        modal.style.display = "flex";
        document.body.style.overflow = 'hidden';
    }

    function closeModal6() {
        const modal = document.getElementById('confirmModal6');
        modal.style.display = "none";
        document.body.style.overflow = 'auto';
    }

    // Close modals when clicking outside
    window.addEventListener('click', function(event) {
        if (event.target === document.getElementById('confirmModal1')) {
            closeModal1();
        }
        if (event.target === document.getElementById('confirmModal2')) {
            closeModal2();
        }
        if (event.target === document.getElementById('confirmModal3')) {
            closeModal3();
        }
        if (event.target === document.getElementById('confirmModal4')) {
            closeModal4();
        }
        if (event.target === document.getElementById('confirmModal5')) {
            closeModal5();
        }
        if (event.target === document.getElementById('confirmModal6')) {
            closeModal6();
        }

        if (event.target === document.getElementById('confirmModal7')) {
            closeModal7();
        }

        if (event.target === document.getElementById('confirmModal8')) {
            closeModal7();
        }
    });
</script>


@endcanany
