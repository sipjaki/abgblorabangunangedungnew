{{-- @canany(['superadmin', 'admin']) --}}
@canany(['admindinas'])

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


                    <!-- Berkas Selesai (7) -->
                    @if($data->validasiberkas1 == 'sudah')
                        <button class="button-hijau" type="button" onclick="openModal7({{ $data->id }})" style="background-color: #10B981; color: black;" >
                            <i class="bi bi-patch-check-fill me-1"></i> Dokumen Lengkap
                        </button>
                    @elseif($data->validasiberkas1 == 'belum')
                        <button class="button-merah" type="button" onclick="openModal7({{ $data->id }})" style="background-color: #0400ff; color: black;">
                            <i class="bi bi-x-circle me-1"></i> Dokumen Tidak Lengkap
                        </button>
                    @else
                        <button class="button-modern" type="button" onclick="openModal7({{ $data->id }})" style="color: black;">
                            <i class="bi bi-patch-check me-1"></i> Validasi Berkas
                        </button>
                    @endif

                    {{-- @if($data->validasiberkas1 == 'sudah')
                        <button class="button-lolos" type="button" style="background-color: #10B981; color: black;" >
                            <i class="bi bi-patch-check-fill me-1"></i> Dokumen Lengkap
                        </button>
                    @elseif($data->validasiberkas1 == 'belum')
                        <button class="button-dikembalikan" type="button" onclick="openModal1({{ $data->id }})" style="background-color: #0400ff; color: black;">
                            <i class="bi bi-x-circle me-1"></i> Dokumen Lengkap
                        </button>
                    @else
                        <button class="button-modern" type="button" onclick="openModal1({{ $data->id }})" style="color: black;">
                            <i class="bi bi-patch-check me-1"></i> Dokumen Lengkap
                        </button>
                    @endif --}}

                    <!-- Surat Pemberitahuan (2) -->
                    @if($data->validasiberkas2 == 'sudah')
                        <button class="button-lolos" type="button" onclick="openModal2({{ $data->id }})" style="background-color: #10B981; color: black;" >
                            <i class="bi bi-patch-check-fill me-1"></i> Surat Pemberitahuan Selesai
                        </button>
                    @elseif($data->validasiberkas2 == 'belum')
                        <button class="button-dikembalikan" type="button" onclick="openModal2({{ $data->id }})" style="background-color: #0400ff; color: black;">
                            <i class="bi bi-x-circle me-1"></i> Surat Pemberitahuan Batal
                        </button>
                    @else
                        <button class="button-modern" type="button" onclick="openModal2({{ $data->id }})" style="color: black;">
                            <i class="bi bi-patch-check me-1"></i> Status Surat Pemberitahuan
                        </button>
                    @endif

                    <!-- TPA/TPT (3) -->
                    @if($data->validasiberkas3 == 'sudah')
                        <button class="button-lolos" type="button" onclick="openModal3({{ $data->id }})" style="background-color: #10B981; color: black;" >
                            <i class="bi bi-patch-check-fill me-1"></i> TPA/TPT Selesai
                        </button>
                    @elseif($data->validasiberkas3 == 'belum')
                        <button class="button-dikembalikan" type="button" onclick="openModal3({{ $data->id }})" style="background-color: #0400ff; color: black;">
                            <i class="bi bi-x-circle me-1"></i> TPA/TPT Batal
                        </button>
                    @else
                        <button class="button-modern" type="button" onclick="openModal3({{ $data->id }})" style="color: black;">
                            <i class="bi bi-patch-check me-1"></i> Pemilihan TPA/TPT
                        </button>
                    @endif

                    <!-- Surat Undangan (4) -->
                    @if($data->validasiberkas4 == 'sudah')
                        <button class="button-lolos" type="button" onclick="openModal4({{ $data->id }})" style="background-color: #10B981; color: black;" >
                            <i class="bi bi-patch-check-fill me-1"></i> Surat Undangan Selesai
                        </button>
                    @elseif($data->validasiberkas4 == 'belum')
                        <button class="button-dikembalikan" type="button" onclick="openModal4({{ $data->id }})" style="background-color: #0400ff; color: black;">
                            <i class="bi bi-x-circle me-1"></i> Surat Undangan Batal
                        </button>
                    @else
                        <button class="button-modern" type="button" onclick="openModal4({{ $data->id }})" style="color: black;">
                            <i class="bi bi-patch-check me-1"></i> Status Surat Undangan
                        </button>
                    @endif

                    <!-- Berita Acara (5) -->
                    @if($data->validasiberkas5 == 'sudah')
                        <button class="button-lolos" type="button" onclick="openModal5({{ $data->id }})" style="background-color: #10B981; color: black;" >
                            <i class="bi bi-patch-check-fill me-1"></i> Berita Acara Selesai
                        </button>
                    @elseif($data->validasiberkas5 == 'belum')
                        <button class="button-dikembalikan" type="button" onclick="openModal5({{ $data->id }})" style="background-color: #0400ff; color: black;">
                            <i class="bi bi-x-circle me-1"></i> Berita Acara Batal
                        </button>
                    @else
                        <button class="button-modern" type="button" onclick="openModal5({{ $data->id }})" style="color: black;">
                            <i class="bi bi-patch-check me-1"></i> Status Berita Acara
                        </button>
                    @endif

                    <!-- SKRD (6) -->
                    @if($data->validasiberkas8 == 'sudah')
                        <button class="button-lolos" type="button" onclick="openModal8({{ $data->id }})" style="background-color: #10B981; color: black;" >
                            <i class="bi bi-patch-check-fill me-1"></i> Finalisasi Selesai
                        </button>
                    @elseif($data->validasiberkas8 == 'belum')
                        <button class="button-dikembalikan" type="button" onclick="openModal8({{ $data->id }})" style="background-color: #0400ff; color: black;">
                            <i class="bi bi-x-circle me-1"></i> Belum Selesai
                        </button>
                    @else
                        <button class="button-modern" type="button" onclick="openModal8({{ $data->id }})" style="color: black;">
                            <i class="bi bi-patch-check me-1"></i> Finalisasi
                        </button>
                    @endif

                    <!-- SKRD (6) -->
                    @if($data->validasiberkas6 == 'sudah')
                        <button class="button-lolos" type="button" onclick="openModal6({{ $data->id }})" style="background-color: #10B981; color: black;" >
                            <i class="bi bi-patch-check-fill me-1"></i> SKRD Selesai
                        </button>
                    @elseif($data->validasiberkas6 == 'belum')
                        <button class="button-dikembalikan" type="button" onclick="openModal6({{ $data->id }})" style="background-color: #0400ff; color: black;">
                            <i class="bi bi-x-circle me-1"></i> SKRD Tidak Terbit
                        </button>
                    @else
                        <button class="button-modern" type="button" onclick="openModal6({{ $data->id }})" style="color: black;">
                            <i class="bi bi-patch-check me-1"></i> Status SKRD
                        </button>
                    @endif

                </div>
            </td>
        </tr>
    </tbody>
</table>

<!-- Modal for Dokumen Lengkap (1) -->
<div id="confirmModal1" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah berkas sudah sesuai (Dokumen Lengkap)?</p>
        <form id="validasiForm1" method="POST" action="/validasipbgslf1/{{ $data->id }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="document_type" value="1">
            <button type="submit" name="validasiberkas1" value="sudah" style="background-color: #10B981; color: white; padding: 8px 16px; margin-right: 10px; border-radius: 8px; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#10B981'; this.style.color='white';">
                <i class="bi bi-check2-circle me-1"></i> Sudah
            </button>
            <button type="submit" name="validasiberkas1" value="belum" style="background-color: #0400ff; color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#0400ff'; this.style.color='white';">
                <i class="bi bi-x-circle me-1"></i> Belum
            </button>
        </form>
        <br><br>
        <button type="button" onclick="closeModal1()" style="background-color: #D1D5DB; padding: 8px 16px; border-radius: 8px; border: none; color: black; cursor: pointer;"
            onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
            onmouseout="this.style.backgroundColor='#D1D5DB'; this.style.color='black';">
            <i class="bi bi-x-circle me-1"></i> Batal
        </button>
    </div>
</div>

<!-- Modal for Surat Pemberitahuan (2) -->
<div id="confirmModal2" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah berkas sudah sesuai (Surat Pemberitahuan)?</p>
        <form id="validasiForm2" method="POST" action="/validasipbgslf2/{{ $data->id }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="document_type" value="2">
            <button type="submit" name="validasiberkas2" value="sudah" style="background-color: #10B981; color: white; padding: 8px 16px; margin-right: 10px; border-radius: 8px; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#10B981'; this.style.color='white';">
                <i class="bi bi-check2-circle me-1"></i> Sudah
            </button>
            <button type="submit" name="validasiberkas2" value="belum" style="background-color: #0400ff; color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#0400ff'; this.style.color='white';">
                <i class="bi bi-x-circle me-1"></i> Belum
            </button>
        </form>
        <br><br>
        <button type="button" onclick="closeModal2()" style="background-color: #D1D5DB; padding: 8px 16px; border-radius: 8px; border: none; color: black; cursor: pointer;"
            onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
            onmouseout="this.style.backgroundColor='#D1D5DB'; this.style.color='black';">
            <i class="bi bi-x-circle me-1"></i> Batal
        </button>
    </div>
</div>

<!-- Modal for TPA/TPT (3) -->
<div id="confirmModal3" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah berkas sudah sesuai (TPA/TPT)?</p>
        <form id="validasiForm3" method="POST" action="/validasipbgslf3/{{ $data->id }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="document_type" value="3">
            <button type="submit" name="validasiberkas3" value="sudah" style="background-color: #10B981; color: white; padding: 8px 16px; margin-right: 10px; border-radius: 8px; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#10B981'; this.style.color='white';">
                <i class="bi bi-check2-circle me-1"></i> Sudah
            </button>
            <button type="submit" name="validasiberkas3" value="belum" style="background-color: #0400ff; color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#0400ff'; this.style.color='white';">
                <i class="bi bi-x-circle me-1"></i> Belum
            </button>
        </form>
        <br><br>
        <button type="button" onclick="closeModal3()" style="background-color: #D1D5DB; padding: 8px 16px; border-radius: 8px; border: none; color: black; cursor: pointer;"
            onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
            onmouseout="this.style.backgroundColor='#D1D5DB'; this.style.color='black';">
            <i class="bi bi-x-circle me-1"></i> Batal
        </button>
    </div>
</div>

<!-- Modal for Surat Undangan (4) -->
<div id="confirmModal4" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah berkas sudah sesuai (Surat Undangan)?</p>
        <form id="validasiForm4" method="POST" action="/validasipbgslf4/{{ $data->id }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="document_type" value="4">
            <button type="submit" name="validasiberkas4" value="sudah" style="background-color: #10B981; color: white; padding: 8px 16px; margin-right: 10px; border-radius: 8px; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#10B981'; this.style.color='white';">
                <i class="bi bi-check2-circle me-1"></i> Sudah
            </button>
            <button type="submit" name="validasiberkas4" value="belum" style="background-color: #0400ff; color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#0400ff'; this.style.color='white';">
                <i class="bi bi-x-circle me-1"></i> Belum
            </button>
        </form>
        <br><br>
        <button type="button" onclick="closeModal4()" style="background-color: #D1D5DB; padding: 8px 16px; border-radius: 8px; border: none; color: black; cursor: pointer;"
            onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
            onmouseout="this.style.backgroundColor='#D1D5DB'; this.style.color='black';">
            <i class="bi bi-x-circle me-1"></i> Batal
        </button>
    </div>
</div>

<!-- Modal for Berita Acara (5) -->
<div id="confirmModal5" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah berkas sudah sesuai (Berita Acara)?</p>
        <form id="validasiForm5" method="POST" action="/validasipbgslf5/{{ $data->id }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="document_type" value="5">
            <button type="submit" name="validasiberkas5" value="sudah" style="background-color: #10B981; color: white; padding: 8px 16px; margin-right: 10px; border-radius: 8px; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#10B981'; this.style.color='white';">
                <i class="bi bi-check2-circle me-1"></i> Sudah
            </button>
            <button type="submit" name="validasiberkas5" value="belum" style="background-color: #0400ff; color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#0400ff'; this.style.color='white';">
                <i class="bi bi-x-circle me-1"></i> Belum
            </button>
        </form>
        <br><br>
        <button type="button" onclick="closeModal5()" style="background-color: #D1D5DB; padding: 8px 16px; border-radius: 8px; border: none; color: black; cursor: pointer;"
            onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
            onmouseout="this.style.backgroundColor='#D1D5DB'; this.style.color='black';">
            <i class="bi bi-x-circle me-1"></i> Batal
        </button>
    </div>
</div>

<!-- Modal for SKRD (6) -->
<div id="confirmModal6" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah berkas sudah sesuai (SKRD)?</p>
        <form id="validasiForm6" method="POST" action="/validasipbgslf6/{{ $data->id }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="document_type" value="6">
            <button type="submit" name="validasiberkas6" value="sudah" style="background-color: #10B981; color: white; padding: 8px 16px; margin-right: 10px; border-radius: 8px; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#10B981'; this.style.color='white';">
                <i class="bi bi-check2-circle me-1"></i> Sudah
            </button>
            <button type="submit" name="validasiberkas6" value="belum" style="background-color: #0400ff; color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#0400ff'; this.style.color='white';">
                <i class="bi bi-x-circle me-1"></i> Belum
            </button>
        </form>
        <br><br>
        <button type="button" onclick="closeModal6()" style="background-color: #D1D5DB; padding: 8px 16px; border-radius: 8px; border: none; color: black; cursor: pointer;"
            onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
            onmouseout="this.style.backgroundColor='#D1D5DB'; this.style.color='black';">
            <i class="bi bi-x-circle me-1"></i> Batal
        </button>
    </div>
</div>

<!-- Modal for Berkas Selesai (7) -->
<div id="confirmModal7" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah semua berkas sudah sesuai?</p>
        <form id="validasiForm7" method="POST" action="/validasipembongkaran7/{{ $data->id }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="document_type" value="7">
            <button type="submit" name="validasiberkas7" value="sudah" style="background-color: #10B981; color: white; padding: 8px 16px; margin-right: 10px; border-radius: 8px; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#10B981'; this.style.color='white';">
                <i class="bi bi-check2-circle me-1"></i> Sudah
            </button>
            <button type="submit" name="validasiberkas7" value="belum" style="background-color: #0400ff; color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#0400ff'; this.style.color='white';">
                <i class="bi bi-x-circle me-1"></i> Belum
            </button>
        </form>

    </div>
</div>

<!-- Modal for Berkas Selesai (7) -->
<div id="confirmModal8" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
    <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
        <p style="font-size: 16px; font-weight: 600;">Apakah semua berkas sudah selesai?</p>
        <form id="validasiForm8" method="POST" action="/validasipbgslf8/{{ $data->id }}">
            @csrf
            @method('PUT')
            <input type="hidden" name="document_type" value="8">
            <button type="submit" name="validasiberkas8" value="sudah" style="background-color: #10B981; color: white; padding: 8px 16px; margin-right: 10px; border-radius: 8px; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#10B981'; this.style.color='white';">
                <i class="bi bi-check2-circle me-1"></i> Sudah
            </button>
            <button type="submit" name="validasiberkas8" value="belum" style="background-color: #0400ff; color: white; padding: 8px 16px; border-radius: 8px; border: none; cursor: pointer;"
                onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
                onmouseout="this.style.backgroundColor='#0400ff'; this.style.color='white';">
                <i class="bi bi-x-circle me-1"></i> Belum
            </button>
        </form>
        <br><br>
        <button type="button" onclick="closeModal8()" style="background-color: #D1D5DB; padding: 8px 16px; border-radius: 8px; border: none; color: black; cursor: pointer;"
            onmouseover="this.style.backgroundColor='white'; this.style.color='black';"
            onmouseout="this.style.backgroundColor='#D1D5DB'; this.style.color='black';">
            <i class="bi bi-x-circle me-1"></i> Batal
        </button>
    </div>
</div>

<script>
    // Dokumen Lengkap (1)
    function openModal1(itemId) {
        const modal = document.getElementById('confirmModal1');
        const form = document.getElementById('validasiForm1');
        form.action = `/validasipbgslf1/${itemId}`;
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
        form.action = `/validasipbgslf2/${itemId}`;
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
        form.action = `/validasipbgslf3/${itemId}`;
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
        form.action = `/validasipbgslf4/${itemId}`;
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
        form.action = `/validasipbgslf5/${itemId}`;
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
        form.action = `/validasipbgslf6/${itemId}`;
        modal.style.display = "flex";
        document.body.style.overflow = 'hidden';
    }

    function closeModal6() {
        const modal = document.getElementById('confirmModal6');
        modal.style.display = "none";
        document.body.style.overflow = 'auto';
    }

    // Berkas Selesai (7)
    function openModal7(itemId) {
        const modal = document.getElementById('confirmModal7');
        const form = document.getElementById('validasiForm7');
        form.action = `/validasipembongkaran7/${itemId}`;
        modal.style.display = "flex";
        document.body.style.overflow = 'hidden';
    }

    function closeModal7() {
        const modal = document.getElementById('confirmModal7');
        modal.style.display = "none";
        document.body.style.overflow = 'auto';
    }

    // Berkas Selesai (7)
    function openModal8(itemId) {
        const modal = document.getElementById('confirmModal8');
        const form = document.getElementById('validasiForm8');
        form.action = `/validasipbgslf8/${itemId}`;
        modal.style.display = "flex";
        document.body.style.overflow = 'hidden';
    }

    function closeModal8() {
        const modal = document.getElementById('confirmModal8');
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
