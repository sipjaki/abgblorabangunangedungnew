

<div class="button-group-container">
    <div class="button-scroll-wrapper">
        <div class="button-group">
            <a href="/permohonankrkusaha" class="button-link">
                <button type="button" class="button-baru">
                    <i class="fas fa-briefcase"></i>
                    Fungsi Usaha
                </button>
            </a>

            <a href="/permohonankrkhunian" class="button-link">
                <button type="button" class="button-baru">
                    <i class="fas fa-home"></i>
                    Fungsi Hunian
                </button>
            </a>

            <a href="/permohonankrkagama" class="button-link">
                <button type="button" class="button-baru">
                    <i class="fas fa-praying-hands"></i>
                    Fungsi Keagamaan
                </button>
            </a>

            <a href="/permohonankrksosbud" class="button-link">
                <button type="button" class="button-baru">
                    <i class="fas fa-theater-masks"></i>
                    Fungsi Sosial Budaya
                </button>
            </a>

            <a href="/permohonanmenara" class="button-link">
                <button type="button" class="button-baru">
                    <i class="fas fa-broadcast-tower"></i>
                    Menara Telekomunikasi
                </button>
            </a>
        </div>
    </div>
</div>

<style>
    /* Container utama */
    .button-group-container {
        width: 100%;
        padding: 0 10px;
        margin: 10px 0;
    }

    /* Wrapper untuk scroll */
    .button-scroll-wrapper {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch; /* Smooth scrolling on iOS */
        scrollbar-width: none; /* Hide scrollbar Firefox */
        padding-bottom: 10px; /* Space untuk scroll */
    }

    .button-scroll-wrapper::-webkit-scrollbar {
        display: none; /* Hide scrollbar Chrome/Safari */
    }

    /* Grup tombol */
    .button-group {
        display: inline-flex;
        gap: 12px;
        padding: 5px 5px 15px; /* Extra bottom padding untuk scroll */
        min-width: min-content; /* Pastikan tidak wrap */
    }

    /* Link tombol */
    .button-link {
        flex: 0 0 auto; /* Tidak boleh shrink */
        text-decoration: none;
    }

    /* Style tombol */
    .button-baru {
        background-color: #000080;
        color: white;
        padding: 10px 16px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
        white-space: nowrap;
        font-size: 14px;
    }

    .button-baru:hover {
        background-color: white;
        color: #000080;
        border: 1px solid #000080;
    }

    .button-baru i {
        font-size: 16px;
    }

    /* Responsive adjustments */
    @media (max-width: 768px) {
        .button-baru {
            padding: 8px 12px;
            font-size: 13px;
        }

        .button-group {
            gap: 8px;
        }
    }
</style>

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

