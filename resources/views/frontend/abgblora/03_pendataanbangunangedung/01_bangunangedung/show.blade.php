<style>
    /* Global Styles */
    body {
        font-family: 'Poppins', sans-serif;
        background: linear-gradient(to bottom, #7de3f1, #ffffff);
        margin: 0;
        padding: 0;
        min-height: 100vh;
    }

    /* Zebra Table Styles */
    table.zebra-table {
        border-collapse: collapse;
        width: 100%;
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        border-radius: 15px;
        overflow: hidden;
    }

    .zebra-table thead {
        background-color: #2E82FE;
        color: white;
    }

    .zebra-table th,
    .zebra-table td {
        padding: 6px 12px;
        text-align: left;
    }

    .zebra-table tbody tr:nth-child(odd) {
        background-color: #ffffff;
    }

    .zebra-table tbody tr:nth-child(even) {
        background-color: #dfdddd;
    }

    .zebra-table tbody tr:hover {
        background-color: #0fb825;
    }

    /* Main Content Container */
    .main-container {
        max-width: 1130px;
        margin: 0 auto;
        padding: 20px;
    }

    /* Card Styles */
    .card {
        border-radius: 20px;
        text-decoration: none;
        color: inherit;
    }

    .card-content {
        padding: 16px;
        border-radius: 20px;
        background: white;
        display: flex;
        flex-direction: column;
        gap: 16px;
        transition: all 0.3s;
    }

    .card-content:hover {
        box-shadow: 0 0 0 2px #6635F1;
    }

    .card-image {
        width: 100%;
        height: 140px;
        border-radius: 20px;
        overflow: hidden;
        position: relative;
    }

    .card-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        cursor: pointer;
    }

    /* Modal Styles */
    #imageModal {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 50;
        background-color: rgba(0, 0, 0, 0.8);
        display: none;
        align-items: center;
        justify-content: center;
    }

    .modal-content {
        position: relative;
        max-width: 90%;
        max-height: 90%;
        border-radius: 20px;
        overflow: hidden;
    }

    .close-modal {
        position: absolute;
        top: -16px;
        right: -16px;
        background: white;
        color: black;
        border-radius: 50%;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        font-weight: bold;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        cursor: pointer;
    }

    /* Header Styles */
    .section-header {
        display: flex;
        flex-direction: column;
        gap: 10px;
        margin-top: 20px;
    }

    .header-content {
        display: flex;
        align-items: center;
        justify-content: space-between;
        flex-wrap: wrap;
        gap: 10px;
    }

    /* Breadcrumb Styles */
    .breadcrumb {
        margin-top: 185px;
        display: flex;
        gap: 30px;
        align-items: center;
    }

    .breadcrumb a {
        transition: all 0.3s;
    }

    /* Grid Layout */
    .image-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 12px;
    }

    /* Info Box */
    .info-box {
        width: 100%;
        background: #030303;
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 14px;
        border-radius: 12px;
    }

    .info-box p {
        color: white;
        font-size: 14px;
    }

    .info-box span {
        font-weight: bold;
    }
</style>

<!-- HTML Structure -->
<div class="main-container">
    @include('frontend.abgblora.00_fiturmenu.02_header')
    @include('frontend.abgblora.00_fiturmenu.05_menunavigasweb')
    @include('backend.00_administrator.00_baganterpisah.09_button')

    <!-- Breadcrumb Section -->
    <section class="breadcrumb">
        <div class="flex gap-[30px] items-center">
            <a href="/databangunangedung" class="last-of-type:font-bold transition-all duration-300" style="color: black;">
                Data Bangunan Gedung
            </a>
            <span>/</span>
            <a href="" class="last-of-type:font-bold transition-all duration-300" style="color: blue;">
                Data {{$title}}
            </a>
        </div>
    </section>

    <!-- Header Section -->
    <section class="section-header">
        <div class="header-content">
            <div class="flex items-center gap-3">
                <button class="p-[14px_20px] bg-white rounded-full font-semibold">
                    📦 {{$title}}
                </button>
            </div>
        </div>
    </section>

    <!-- Image Modal -->
    <div id="imageModal" class="hidden items-center justify-center">
        <div class="modal-content">
            <button onclick="closeModal()" class="close-modal">&times;</button>
            <img id="modalImage" src="" class="w-full h-full object-contain" style="border-radius: 20px;">
        </div>
    </div>

    <!-- Main Content Section -->
    <section class="flex flex-col gap-5">
        <div class="bg-white flex flex-col gap-5 p-5 rounded-[20px] w-full">
            <div class="image-grid">
                <!-- Tampak Depan Card -->
                @if (!empty($item->tampakdepan))
                <a href="#" class="card">
                    <div class="card-content">
                        <div class="card-image">
                            <img onclick="openModal(this.src)" src="{{ asset($item->tampakdepan) }}" alt="Tampak Depan">
                        </div>
                        <div class="flex flex-col">
                            <p class="title font-semibold text-sm line-clamp-2 hover:line-clamp-none">Tampak Depan</p>
                        </div>
                    </div>
                </a>
                @endif

                <!-- Tampak Samping 1 Card -->
                @if (!empty($item->tampaksamping1))
                <a href="#" class="card">
                    <div class="card-content">
                        <div class="card-image">
                            <img onclick="openModal(this.src)" src="{{ asset($item->tampaksamping1) }}" alt="Tampak Samping 1">
                        </div>
                        <div class="flex flex-col">
                            <p class="title font-semibold text-sm line-clamp-2 hover:line-clamp-none">Tampak Samping 1</p>
                        </div>
                    </div>
                </a>
                @endif

                <!-- Tampak Samping 2 Card -->
                @if (!empty($item->tampaksamping2))
                <a href="#" class="card">
                    <div class="card-content">
                        <div class="card-image">
                            <img onclick="openModal(this.src)" src="{{ asset($item->tampaksamping2) }}" alt="Tampak Samping 2">
                        </div>
                        <div class="flex flex-col">
                            <p class="title font-semibold text-sm line-clamp-2 hover:line-clamp-none">Tampak Samping 2</p>
                        </div>
                    </div>
                </a>
                @endif

                <!-- Tampak Belakang Card -->
                @if (!empty($item->tampakbelakang))
                <a href="#" class="card">
                    <div class="card-content">
                        <div class="card-image">
                            <img onclick="openModal(this.src)" src="{{ asset($item->tampakbelakang) }}" alt="Tampak Belakang">
                        </div>
                        <div class="flex flex-col">
                            <p class="title font-semibold text-sm line-clamp-2 hover:line-clamp-none">Tampak Belakang</p>
                        </div>
                    </div>
                </a>
                @endif
            </div>

            <!-- Info Box -->
            <div class="info-box">
                <div class="w-5 h-5 flex shrink-0">
                    <img src="/assets/new/icons/story.svg" alt="icon">
                </div>
                <p>
                    <span>Informasi Bangunan Gedung</span>
                </p>
            </div>

            @include('backend.02_pendataanbangunangedung.00_fiturbg.01_status')
        </div>
    </section>
</div>

<!-- Footer and Scripts -->
@include('frontend.abgblora.00_fiturmenu.03_footer')

<!-- Back to Top Button -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>

@include('frontend.abgblora.00_fiturmenu.04_footer')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Modal Functions
    function openModal(src) {
        document.getElementById('modalImage').src = src;
        document.getElementById('imageModal').style.display = 'flex';
    }

    function closeModal() {
        document.getElementById('imageModal').style.display = 'none';
    }

    // Dropdown Functions
    function toggleDropdown(event) {
        event.preventDefault();
        const dropdown = event.target.closest('.dropdown');
        dropdown.classList.toggle('show');
    }

    window.addEventListener('click', function(e) {
        document.querySelectorAll('.dropdown').forEach(drop => {
            if (!drop.contains(e.target)) {
                drop.classList.remove('show');
            }
        });
    });

    // Table Functions
    function updateEntries() {
        let selectedValue = document.getElementById("entries").value;
        let url = new URL(window.location.href);
        url.searchParams.set("perPage", selectedValue);
        window.location.href = url.toString();
    }

    function searchTable() {
        let input = document.getElementById("searchInput").value;
        fetch(`/databangunangedung?search=${input}`)
            .then(response => response.text())
            .then(html => {
                let parser = new DOMParser();
                let doc = parser.parseFromString(html, "text/html");
                let newTableBody = doc.querySelector("#tableBody").innerHTML;
                document.querySelector("#tableBody").innerHTML = newTableBody;
            })
            .catch(error => console.error("Error fetching search results:", error));
    }
</script>
