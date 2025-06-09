<!-- Modal Konfirmasi Hapus -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <img src="/assets/icon/pupr.png" alt="" width="30" style="margin-right: 10px;">
                <h5 class="modal-title" id="deleteModalLabel">DPUPR Kabupaten Blora</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda Ingin Menghapus Data : <span id="itemName"></span>?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE') <!-- Menetapkan metode DELETE untuk penghapusan -->
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>


<script>
function setDeleteUrl(button) {
    // Ambil data judul dari elemen yang diklik
    var judul = button.getAttribute('data-judul');

    // Perbarui teks di dalam modal dengan nama item
    document.getElementById('itemName').innerText = judul;

    // Atur URL penghapusan
    var deleteUrl = "/header/delete/" + encodeURIComponent(judul);
    document.getElementById('deleteForm').action = deleteUrl;
}


</script>
