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

    /* Search Container Styles */
    .search-tools {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 20px;
    }

    .entries-selector {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .entries-selector label {
        font-weight: 600;
        font-size: 14px;
        white-space: nowrap;
    }

    .entries-selector select {
        padding: 8px 12px;
        border: 1px solid #ccc;
        border-radius: 8px;
        background-color: #f9f9f9;
        font-size: 14px;
        cursor: pointer;
    }

    .search-wrapper {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
    }

    .search-box {
        position: relative;
        display: inline-block;
    }

    .search-box input {
        border: 1px solid #ccc;
        padding: 10px 36px 10px 12px;
        font-size: 14px;
        border-radius: 10px;
        width: 250px;
        transition: all 0.3s;
    }

    .search-box input:focus {
        outline: none;
        border-color: #2E82FE;
        box-shadow: 0 0 0 2px rgba(46, 130, 254, 0.2);
    }

    .search-box i {
        position: absolute;
        right: 12px;
        top: 50%;
        transform: translateY(-50%);
        font-size: 16px;
        color: #888;
        pointer-events: none;
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

        .search-tools {
            flex-direction: column;
            align-items: stretch;
        }

        .search-wrapper {
            width: 100%;
        }

        .search-box input {
            width: 100%;
        }

        .entries-selector {
            width: 100%;
            justify-content: space-between;
        }
    }
</style>

<!-- Header Includes -->
@include('frontend.abgblora.00_fiturmenu.02_header')
@include('frontend.abgblora.00_fiturmenu.05_menunavigasweb')
@include('backend.00_administrator.00_baganterpisah.09_button')

<!-- Main Content -->
<section id="breadcrumb" class="container" style="margin-top: -100px;">
    <div class="search-tools">
        <div class="entries-selector">
            <label for="entries">Tampilkan data:</label>
            <select id="entries" onchange="updateEntries()">
                <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
                <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                <option value="75" {{ request('perPage') == 75 ? 'selected' : '' }}>75</option>
                <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100</option>
                <option value="150" {{ request('perPage') == 150 ? 'selected' : '' }}>150</option>
                <option value="200" {{ request('perPage') == 200 ? 'selected' : '' }}>200</option>
                <option value="500" {{ request('perPage') == 500 ? 'selected' : '' }}>500</option>
                <option value="1000" {{ request('perPage') == 1000 ? 'selected' : '' }}>1000</option>
                <option value="2000" {{ request('perPage') == 2000 ? 'selected' : '' }}>2000</option>
            </select>
        </div>

        <div class="search-wrapper">
            <div class="search-box">
                <input type="search"
                       id="generalSearch"
                       placeholder="Cari Berkas Permohonan..."
                       value="{{ request('search') }}"
                       onkeyup="searchTable()">
                <i class="fas fa-search"></i>
            </div>

            <div class="search-box">
                <input type="date"
                       id="dateSearch"
                       placeholder="Cari berdasarkan tanggal..."
                       onchange="searchByDate()">
                <i class="fas fa-calendar"></i>
            </div>
        </div>
    </div>
</section>

<section id="details" class="container">
    <div class="content-card">
        <div class="section-title" style="font-size: 14px;">
            📦 {{$title}}
        </div>

        <div class="table-responsive">
            <table class="zebra-table">
            <thead style="font-size: 14px;">
    <tr>
        <th style="text-align: center;">No</th>
        <th style="text-align: center;">Nama Institusi</th>
        <th style="text-align: center;">Kecamatan</th>
        <th style="text-align: center;">No HDNO</th>
        <th style="text-align: center;">Koordinat</th>
        <th style="text-align: center;">View</th>
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
                       <td style="text-align: center;">
    <a class="button-baru" href="/databangunangedungshow/{{ $item->id }}" style="font-size: 12px !important;">
        Lihat
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
        const selectedValue = document.getElementById("entries").value;
        const url = new URL(window.location.href);
        url.searchParams.set("perPage", selectedValue);
        window.location.href = url.toString();
    }

    function searchTable() {
        const input = document.getElementById("generalSearch").value;
        const url = new URL(window.location.href);

        if (input) {
            url.searchParams.set("search", input);
        } else {
            url.searchParams.delete("search");
        }

        // Reset date search when using general search
        document.getElementById("dateSearch").value = "";
        url.searchParams.delete("date");

        window.location.href = url.toString();
    }

    function searchByDate() {
        const dateInput = document.getElementById("dateSearch").value;
        const url = new URL(window.location.href);

        if (dateInput) {
            url.searchParams.set("date", dateInput);
        } else {
            url.searchParams.delete("date");
        }

        // Reset general search when using date search
        document.getElementById("generalSearch").value = "";
        url.searchParams.delete("search");

        window.location.href = url.toString();
    }

    // Initialize search inputs from URL parameters
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);

        if (urlParams.has('search')) {
            document.getElementById("generalSearch").value = urlParams.get('search');
        }

        if (urlParams.has('date')) {
            document.getElementById("dateSearch").value = urlParams.get('date');
        }
    });
</script>
