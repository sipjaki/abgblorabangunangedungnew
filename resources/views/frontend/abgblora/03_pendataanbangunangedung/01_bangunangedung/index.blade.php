@include('frontend.abgblora.00_fiturmenu.02_header')
@include('frontend.abgblora.00_fiturmenu.05_menunavigasweb')
@include('backend.00_administrator.00_baganterpisah.09_button')

<style>
    /* Table Styles */
    .zebra-table {
        width: 100%;
        border-collapse: collapse;
        font-family: 'Poppins', sans-serif;
        font-size: 12px;
        border-radius: 15px;
        overflow: hidden;
    }
    .zebra-table thead {
        background-color: #2E82FE;
        color: white;
    }
    .zebra-table th, .zebra-table td {
        padding: 8px 12px;
        text-align: left;
        border: 1px solid #e0e0e0;
    }
    .zebra-table tbody tr:nth-child(odd) {
        background-color: #ffffff;
    }
    .zebra-table tbody tr:nth-child(even) {
        background-color: #f9f9f9;
    }
    .zebra-table tbody tr:hover {
        background-color: #e6f7e9;
    }

    /* Search and Filter Section */
    .filter-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
        flex-wrap: wrap;
        gap: 15px;
    }
    .search-box {
        display: flex;
        align-items: center;
        background: white;
        border-radius: 8px;
        padding: 5px 10px;
        border: 1px solid #ddd;
        width: 100%;
        max-width: 300px;
    }
    .search-box input {
        border: none;
        outline: none;
        padding: 8px;
        width: 100%;
        font-size: 14px;
    }
    .entries-selector {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .entries-selector select {
        padding: 8px 12px;
        border-radius: 5px;
        border: 1px solid #ddd;
        font-size: 14px;
    }

    /* Utility Classes */
    .uppercase {
        text-transform: uppercase;
    }
    .text-center {
        text-align: center;
    }
    .button-berkas {
        background-color: #f0f0f0;
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 12px;
        cursor: default;
    }
    .view-icon {
        color: #2E82FE;
        cursor: pointer;
        font-size: 16px;
    }
</style>

<section id="breadcrumb" class="container max-w-[1130px] mx-auto" style="margin-top: 160px;">
    <div class="filter-section">
        <form id="searchForm" method="GET" action="{{ route('databangunangedung') }}">
            <div class="search-box">
                <input type="text" name="search" id="searchInput" placeholder="Cari data..."
                       value="{{ request('search') }}" oninput="debounceSearch()">
                <button type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>

            <div class="entries-selector">
                <span>Show:</span>
                <select name="perPage" id="entries" onchange="this.form.submit()">
                    <option value="25" {{ request('perPage') == 25 ? 'selected' : '' }}>25</option>
                    <option value="50" {{ request('perPage') == 50 ? 'selected' : '' }}>50</option>
                    <option value="75" {{ request('perPage') == 75 ? 'selected' : '' }}>75</option>
                    <option value="100" {{ request('perPage') == 100 ? 'selected' : '' }}>100</option>
                    <option value="200" {{ request('perPage') == 200 ? 'selected' : '' }}>200</option>
                    <option value="250" {{ request('perPage') == 250 ? 'selected' : '' }}>250</option>
                    <option value="500" {{ request('perPage') == 500 ? 'selected' : '' }}>500</option>
                    <option value="1000" {{ request('perPage') == 1000 ? 'selected' : '' }}>1000</option>
                    <option value="2000" {{ request('perPage') == 2000 ? 'selected' : '' }}>2000</option>
                </select>
                <span>entries</span>
            </div>
        </form>
    </div>
</section>

<section id="details" class="container max-w-[1130px] mx-auto">
    <div class="bg-white p-5 rounded-[20px] shadow-md">
        <div class="flex items-center gap-3 mb-4">
            <button class="p-[14px_20px] bg-white rounded-full font-semibold">
                📦 {{ $title }}
            </button>
        </div>

        <div class="overflow-x-auto rounded-[15px]">
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
                        <td class="text-center">{{ $data->firstItem() + $loop->iteration - 1 }}</td>
                        <td class="uppercase">{{ $item->namainstitusi ?? 'Data Tidak Ditemukan' }}</td>
                        <td>{{ $item->kecamatanblora->kecamatanblora ?? '-' }}</td>
                        <td>{{ $item->nopengesahanusaha ?? '-' }}</td>
                        <td>
                            @if ($item->koordinat)
                                {{ $item->koordinat }}
                            @else
                                <button class="button-berkas">Data Belum Diupdate</button>
                            @endif
                        </td>
                        <td class="text-center">
                            <a href="/databangunangedung/{{ $item->id }}">
                                <i class="fas fa-eye view-icon"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        {{ $data->appends(['search' => request('search'), 'perPage' => request('perPage')])->links() }}
    </div>
</section>

@include('frontend.abgblora.00_fiturmenu.03_footer')
@include('frontend.abgblora.00_fiturmenu.04_footer')

<script>
    // Debounce function to prevent too many requests
    let debounceTimer;
    function debounceSearch() {
        clearTimeout(debounceTimer);
        debounceTimer = setTimeout(() => {
            document.getElementById('searchForm').submit();
        }, 500);
    }

    // Set current entries value from URL
    document.addEventListener('DOMContentLoaded', function() {
        // Keep the search and perPage parameters in pagination links
        document.querySelectorAll('.pagination a').forEach(link => {
            const url = new URL(link.href);
            url.searchParams.set('search', '{{ request('search') }}');
            url.searchParams.set('perPage', '{{ request('perPage', 15) }}');
            link.href = url.toString();
        });
    });
</script>
