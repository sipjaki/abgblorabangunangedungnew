<style>
    /* Base Styles */
    body {
        font-family: 'Poppins', sans-serif;
        font-size: 16px;
        line-height: 1.6;
        color: #333;
        background: linear-gradient(to bottom, #7de3f1, #ffffff);
        margin: 0;
        padding: 0;
        min-height: 100vh;
    }

    /* Table Styles */
    table.zebra-table {
        border-collapse: collapse;
        width: 100%;
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .zebra-table thead {
        background-color: #2E82FE;
        color: white;
    }

    .zebra-table th,
    .zebra-table td {
        padding: 6px 12px;
        text-align: left;
        border: 1px solid #e0e0e0;
    }

    .zebra-table tbody tr:nth-child(odd) {
        background-color: #ffffff;
    }

    .zebra-table tbody tr:nth-child(even) {
        background-color: #f5f5f5;
    }

    .zebra-table tbody tr:hover {
        background-color: #0fb825;
        color: white;
        transition: all 0.3s ease;
    }

    /* Layout Styles */
    .container {
        max-width: 1130px;
        margin: 0 auto;
        padding: 0 15px;
    }

    /* Breadcrumb Styles */
    #breadcrumb {
        margin-top: 120px;
        padding: 15px 0;
    }

    /* Content Section Styles */
    #details {
        margin: 20px auto;
        padding: 0 15px;
    }

    .content-card {
        background-color: white;
        border-radius: 20px;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        padding: 25px;
        width: 100%;
    }

    /* Search Bar Styles */
    .search-container {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 20px;
    }

    .search-box {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 8px 12px;
        background-color: white;
        border-radius: 12px;
        border: 1px solid #ddd;
        width: 100%;
        max-width: 260px;
        transition: all 0.3s;
    }

    .search-box:focus-within {
        box-shadow: 0 0 0 2px rgba(46, 130, 254, 0.2);
    }

    .search-input {
        width: 100%;
        border: none;
        outline: none;
        font-size: 14px;
        background: transparent;
    }

    /* Button Styles */
    .section-title {
        display: inline-flex;
        align-items: center;
        gap: 10px;
        padding: 10px 20px;
        background-color: white;
        border-radius: 30px;
        font-weight: 600;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        margin-bottom: 20px;
    }

    .button-berkas {
        padding: 5px 10px;
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 12px;
        cursor: default;
    }

    /* Icon Styles */
    .view-icon {
        color: #2E82FE;
        font-size: 16px;
        cursor: pointer;
        transition: color 0.3s;
    }

    .view-icon:hover {
        color: #1a5bbf;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        #breadcrumb {
            margin-top: 100px;
        }

        .search-container {
            justify-content: center;
        }

        .search-box {
            max-width: 100%;
        }
    }
</style>

<!-- Header Includes -->
@include('frontend.abgblora.00_fiturmenu.02_header')
@include('frontend.abgblora.00_fiturmenu.05_menunavigasweb')
@include('backend.00_administrator.00_baganterpisah.09_button')

<!-- Main Content -->
<section id="breadcrumb" class="container">
    <div class="search-container">
        <div class="search-box">
            <input
                type="text"
                id="searchInput"
                placeholder="Cari data..."
                oninput="searchTable()"
                class="search-input"
            />
            <button onclick="searchTable()">
                <img src="/assets/new/icons/search.svg" alt="Search icon" width="16" height="16" />
            </button>
        </div>
    </div>
</section>

<section id="details" class="container">
    <div class="content-card">
        <div class="section-title">
            📦 {{$title}}
        </div>

        <div class="table-responsive">
            <table class="zebra-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Institusi</th>
                        <th>Kecamatan</th>
                        <th>No Pengesahan Usaha</th>
                        <th>Koordinat</th>
                        <th>View</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($data as $item)
                    <tr>
                        <td style="text-align: center;">
                            {{ $data->firstItem() + $loop->iteration - 1 }}
                        </td>
                        <td class="uppercase">
                            {{ $item->namainstitusi ?? 'Data Tidak Ditemukan' }}
                        </td>
                        <td>{{ $item->kecamatanblora->kecamatanblora ?? '-' }}</td>
                        <td>{{ $item->nopengesahanusaha ?? '-' }}</td>
                        <td>
                            @if ($item->koordinat)
                                {{ $item->koordinat }}
                            @else
                                <span class="button-berkas">Data Belum Diupdate</span>
                            @endif
                        </td>
                        <td style="text-align: center">
                            <a href="/databangunangedungshow/{{ $item->id }}">
                                <i class="fas fa-eye view-icon"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        @include('frontend.abgblora.00_fiturmenu.06_paginations')
    </div>
</section>

<!-- Footer Includes -->
@include('frontend.abgblora.00_fiturmenu.03_footer')

<!-- Back to Top Button -->
<div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
</div>

@include('frontend.abgblora.00_fiturmenu.04_footer')

<script>
    function toggleDropdown(event) {
        event.preventDefault();
        const dropdown = event.target.closest('.dropdown');
        dropdown.classList.toggle('show');
    }

    // Close dropdown when clicking outside
    window.addEventListener('click', function(e) {
        document.querySelectorAll('.dropdown').forEach(drop => {
            if (!drop.contains(e.target)) {
                drop.classList.remove('show');
            }
        });
    });

    function updateEntries() {
        let selectedValue = document.getElementById("entries").value;
        let url = new URL(window.location.href);
        url.searchParams.set("perPage", selectedValue);
        window.location.href = url.toString();
    }

    function searchTable() {
        let input = document.getElementById("searchInput").value.toLowerCase();
        let table = document.getElementById("tableBody");
        let rows = table.getElementsByTagName("tr");

        for (let i = 0; i < rows.length; i++) {
            let cells = rows[i].getElementsByTagName("td");
            let found = false;

            for (let j = 0; j < cells.length; j++) {
                if (cells[j]) {
                    let text = cells[j].textContent || cells[j].innerText;
                    if (text.toLowerCase().indexOf(input) > -1) {
                        found = true;
                        break;
                    }
                }
            }

            rows[i].style.display = found ? "" : "none";
        }
    }
</script>
