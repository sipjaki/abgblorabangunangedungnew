

<div class="flex flex-col gap-5 w-full">
    <div class="putih flex flex-col gap-5 p-5 rounded-[20px] w-full">
            <div class="w-full bg-[#030303] flex items-center gap-[10px] p-[10px_14px] rounded-xl">
        <div class="w-5 h-5 flex shrink-0">
            <img src="/assets/new/icons/story.svg" alt="icon">
        </div>
        <p class="text-white font-normal text-sm">
            <span class="font-bold">Pilih Salah Satu Jenis Permohonan Anda ! </span>
        </p>
    </div><div style="overflow-x: auto; padding-bottom: 8px;">
    <div style="display: inline-flex; gap: 16px; white-space: nowrap; padding: 10px;">

        <a href="/permohonankrkusaha">
            <button type="button" class="button-baru">
                <i class="fas fa-briefcase" style="margin-right:10px;"></i>
                Fungsi Usaha
            </button>
        </a>

        <a href="/permohonankrkhunian">
            <button type="button" class="button-baru">
                <i class="fas fa-home" style="margin-right: 10px;"></i>
                Fungsi Hunian
            </button>
        </a>

        <a href="/permohonankrkagama">
            <button type="button" class="button-baru">
                <i class="fas fa-praying-hands" style="margin-right: 10px;"></i>
                Fungsi Keagamaan
            </button>
        </a>

        <a href="/permohonankrksosbud">
            <button type="button" class="button-baru">
                <i class="fas fa-theater-masks" style="margin-right:10px;"></i>
                Fungsi Sosial Budaya
            </button>
        </a>

        <a href="/permohonanmenara">
            <button type="button" class="button-baru">
                <i class="fas fa-broadcast-tower" style="margin-right:10px;"></i>
                Fungsi Menara
            </button>
        </a>

    </div>
</div>

<style>
    .button-baru {
        background-color: #000080;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 10px;
        font-size: 14px;
        white-space: nowrap;
        display: flex;
        align-items: center;
        transition: all 0.3s ease;
    }

    .button-baru:hover {
        background-color: white;
        color: #000080;
        border: 1px solid #000080;
    }

    .button-baru i {
        font-size: 16px;
    }

    /* Scrollbar styling (opsional) */
    div[style*="overflow-x: auto"]::-webkit-scrollbar {
        height: 6px;
    }

    div[style*="overflow-x: auto"]::-webkit-scrollbar-thumb {
        background-color: #ccc;
        border-radius: 4px;
    }
</style>
    <!-- CSS untuk Hover dan Style -->
    <style>
        .btn-submit {
            background-color: #000080; /* Warna biru */
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px; /* Jarak antara ikon dan teks */
            transition: all 0.3s ease-in-out;
        }

        .btn-submit:hover {
            background-color: white; /* Warna putih saat hover */
            color: black; /* Tulisan hitam */
            border: 1px solid #000080; /* Border biru */
        }

        .btn-submit i {
            font-size: 18px; /* Ukuran ikon */
        }
    </style>

</div>


<script>
    function selectButton(selectedButtonId) {
        // Matikan semua tombol
        const buttons = document.querySelectorAll('.btn-submit');
        buttons.forEach(button => {
            button.disabled = true; // Nonaktifkan tombol
        });

        // Hanya tombol yang dipilih yang tetap aktif
        const selectedButton = document.getElementById(selectedButtonId);
        selectedButton.querySelector('button').disabled = false; // Tombol yang dipilih tetap aktif
    }
</script>

