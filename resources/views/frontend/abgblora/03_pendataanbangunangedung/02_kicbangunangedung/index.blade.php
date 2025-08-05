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

    /* Search Tools Container */
    .search-tools {
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
        margin-bottom: 30px;
        padding: 15px;
        background-color: rgba(255, 255, 255, 0.9);
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    }

    /* Entries Selector */
    .entries-selector {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .entries-selector label {
        font-size: 14px;
        color: #555;
        font-weight: 500;
    }

    .entries-selector select {
        padding: 8px 15px;
        border: 1px solid #e0e0e0;
        border-radius: 20px;
        background-color: #f8f9fa;
        font-size: 14px;
        color: #333;
        cursor: pointer;
        transition: all 0.3s ease;
        appearance: none;
        background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
        background-repeat: no-repeat;
        background-position: right 10px center;
        background-size: 16px;
        padding-right: 35px;
    }

    .entries-selector select:hover {
        border-color: #2E82FE;
    }

    .entries-selector select:focus {
        outline: none;
        border-color: #2E82FE;
        box-shadow: 0 0 0 2px rgba(46, 130, 254, 0.2);
    }

    /* Search Box */
    .search-wrapper {
        flex-grow: 1;
        max-width: 400px;
    }

    .search-box {
        position: relative;
        width: 100%;
    }

    .search-box input {
        width: 100%;
        padding: 10px 40px 10px 15px;
        border: 1px solid #e0e0e0;
        border-radius: 20px;
        font-size: 14px;
        color: #333;
        transition: all 0.3s ease;
        background-color: #f8f9fa;
    }

    .search-box input:focus {
        outline: none;
        border-color: #2E82FE;
        box-shadow: 0 0 0 2px rgba(46, 130, 254, 0.2);
    }

    .search-box i {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        color: #888;
        font-size: 16px;
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

    .button-baru {
        display: inline-block;
        padding: 5px 10px;
        background-color: #2E82FE;
        color: white;
        border-radius: 4px;
        font-size: 12px;
        text-decoration: none;
        transition: background-color 0.3s;
    }

    .button-baru:hover {
        background-color: #1a5bbf;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        #breadcrumb {
            margin-top: 100px;
        }

        .search-tools {
            flex-direction: column;
            align-items: stretch;
            gap: 15px;
        }

        .entries-selector {
            width: 100%;
        }

        .search-wrapper {
            width: 100%;
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
    <div class="search-tools" style="margin-top: 200px;">
        <div class="entries-selector">
            <label for="entries">Tampilkan data:</label>
            <select id="entries" onchange="updateEntries()" class="button-baru" style="border-radius: 20px;">
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
                        class="button-baru"
                        style="border-radius: 20px;"
                       id="generalSearch"
                       placeholder="Cari KIC ..."
                       value="{{ request('search') }}"
                       oninput="debouncedSearch()">
                <i class="fas fa-search"></i>
            </div>
        </div>
    </div>
</section>

<section id="details" class="container" style="margin-top: -25px;">
    <div class="content-card">
        <div class="section-title" style="font-size: 14px;">
            📦 {{$title}}
        </div>

        <div class="table-responsive">
            <table class="zebra-table">
                <thead style="font-size: 14px;">
                    <tr>
                        <th style="text-align: center;">No</th>
                        {{-- <th style="text-align: center;">Nama Institusi</th> --}}
                        <th style="text-align: center;">Satuan Kerja</th>
                        <th style="text-align: center;">Kode Lokasi</th>
                        <th style="text-align: center;">Bidang</th>
                        <th style="text-align: center;">Sub Bidang</th>
                        <th style="text-align: center;">Jumlah Bangunan</th>
                        <th style="text-align: center;">View</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($data as $item)
                    <tr>
                        <td style="text-align: center;">
                            {{ $data->firstItem() + $loop->iteration - 1 }}
                        </td>
                        {{-- <td class="uppercase">
                            {{ $item->namainstitusi ?? 'Data Tidak Ditemukan' }}
                        </td> --}}
                        <td>{{ $item->satuankerja->satuankerja ?? '-' }}</td>
                        <td>{{ $item->kodelokasi ?? '-' }}</td>
             <td style="text-align: center;">
    @if ($item->bidang)
        {{ $item->bidang }}
    @else
        <span class="button-berkas">Data Belum Di Update</span>
    @endif
</td>
<td style="text-align: center;">
    @if ($item->subbidang)
        {{ $item->subbidang }}
    @else
        <span class="button-berkas">Data Belum Di Update</span>
    @endif
</td>

<td style="text-align: center;">
    <button class="button-hijau">
        {{ $item->kicdokumen->count() }}
    </button>
</td>

                        <td style="text-align: center;">
                            <a class="button-baru" href="/pendataankicbangunangedungshow/{{ $item->id }}" style="font-size: 12px !important;">
                                 Lihat
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <br><br><br>

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
    // Debounce function to limit how often search is executed
    function debounce(func, timeout = 500) {
        let timer;
        return (...args) => {
            clearTimeout(timer);
            timer = setTimeout(() => { func.apply(this, args); }, timeout);
        };
    }

    function updateEntries() {
        const selectedValue = document.getElementById("entries").value;
        const url = new URL(window.location.href);
        url.searchParams.set("perPage", selectedValue);
        window.location.href = url.toString();
    }

    // Instant search with debounce that points to /databangunangedung
    const performSearch = debounce(function() {
        const input = document.getElementById("generalSearch").value;
        const url = new URL('/pendataankicbangunangedung', window.location.origin);

        // Preserve pagination if exists
        if (document.getElementById("entries").value) {
            url.searchParams.set("perPage", document.getElementById("entries").value);
        }

        if (input) {
            url.searchParams.set("search", input);
        }

        window.location.href = url.toString();
    });

    function debouncedSearch() {
        performSearch();
    }

    // Initialize search input from URL parameters
    document.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);

        if (urlParams.has('search')) {
            document.getElementById("generalSearch").value = urlParams.get('search');
        }

        // Focus on search input when page loads
        document.getElementById("generalSearch").focus();
    });
</script>
