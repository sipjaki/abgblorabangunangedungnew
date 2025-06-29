<table class="table table-bordered" style="font-size: 13px; text-align: center;">
    <thead>
        <tr>
            <th>Verifikasi 1</th>
            <th>Verifikasi 2</th>
            <th>Verifikasi 3</th>
            <th>Verifikasi 4</th>
            <th>Verifikasi 5</th>
            <th>Verifikasi 6</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            @for ($i = 1; $i <= 6; $i++)
                <td style="text-align: center; display: flex; justify-content: center; align-items: center; height: 60px;">
                    @php $status = $item['validasiberkas' . $i] ?? null; @endphp
                    @if ($status == 'lolos')
                        <button class="button-create" type="button" style="background-color: #10B981; color: black; cursor: not-allowed;" disabled>
                            <i class="bi bi-patch-check-fill me-1"></i> Lolos
                        </button>
                    @elseif ($status == 'dikembalikan')
                        <button class="button-dikembalikan" type="button" onclick="openModal{{ $i }}({{ $item->id }})" style="background-color: #0400ff; color: black;">
                            <i class="bi bi-x-circle me-1"></i> Dikembalikan
                        </button>
                    @else
                        <button class="button-kembali" type="button" onclick="openModal{{ $i }}({{ $item->id }})" style="color: black">
                            <i class="bi bi-patch-check me-1"></i> Validasi
                        </button>
                    @endif
                </td>
            @endfor
        </tr>
    </tbody>
</table>

@for ($i = 1; $i <= 6; $i++)
    <div id="confirmModal{{ $i }}" style="display: none; position: fixed; inset: 0; background-color: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center;">
        <div style="background: white; padding: 24px; border-radius: 12px; width: 90%; max-width: 400px; text-align: center;">
            <p style="font-size: 16px; font-weight: 600;">Apakah berkas sudah sesuai (Verifikasi {{ $i }})?</p>
            <form id="validasiForm{{ $i }}" method="POST">
                @csrf
                @method('PUT')

                <button type="submit" name="validasiberkas{{ $i }}" value="lolos" style="background-color: #10B981; color: white; padding: 8px 16px; margin-right: 10px; border-radius: 8px; border: none;" onmouseover="this.style.backgroundColor='white'; this.style.color='black';" onmouseout="this.style.backgroundColor='#10B981'; this.style.color='white';">
                    <i class="bi bi-check2-circle me-1"></i> Lolos
                </button>

                <button type="submit" name="validasiberkas{{ $i }}" value="dikembalikan" style="background-color: #0400ff; color: white; padding: 8px 16px; border-radius: 8px; border: none;" onmouseover="this.style.backgroundColor='white'; this.style.color='black';" onmouseout="this.style.backgroundColor='#0400ff'; this.style.color='white';">
                    <i class="bi bi-x-circle me-1"></i> Dikembalikan
                </button>
            </form>

            <br><br>
            <button type="button" onclick="closeModal{{ $i }}()" style="background-color: #D1D5DB; padding: 8px 16px; border-radius: 8px; border: none; color: black;" onmouseover="this.style.backgroundColor='white'; this.style.color='black';" onmouseout="this.style.backgroundColor='#D1D5DB'; this.style.color='black';">
                <i class="bi bi-x-circle me-1"></i> Batal
            </button>
        </div>
    </div>
@endfor

<script>
    @for ($i = 1; $i <= 6; $i++)
        function openModal{{ $i }}(itemId) {
            const form = document.getElementById("validasiForm{{ $i }}");
            form.action = "/validasiberkas7permohonan{{ $i }}/" + itemId;
            document.getElementById("confirmModal{{ $i }}").style.display = "flex";
        }

        function closeModal{{ $i }}() {
            document.getElementById("confirmModal{{ $i }}").style.display = "none";
        }
    @endfor
</script>
{{--
@include('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.00_fiturvalidasi') --}}
