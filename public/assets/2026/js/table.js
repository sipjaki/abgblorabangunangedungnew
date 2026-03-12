// Table Functionality
// Handles search, filtering, sorting, and pagination for the data table

document.addEventListener('DOMContentLoaded', function() {
    initTable();
});

// Sample data for the table
const buildingData = [
    { id: 1, name: 'Gedung Perkantoran Pemkab Blora', address: 'Jl. Nusantara No. 10, Blora', pbg: 'aktif', slf: 'aktif', year: 2018 },
    { id: 2, name: 'Rumah Sakit Umum Daerah Blora', address: 'Jl. Dr. Sutomo No. 42, Blora', pbg: 'aktif', slf: 'aktif', year: 2015 },
    { id: 3, name: 'Mall Blora Square', address: 'Jl. Sudirman No. 88, Blora', pbg: 'aktif', slf: 'aktif', year: 2020 },
    { id: 4, name: 'Hotel Grand Blora', address: 'Jl. Pemuda No. 25, Blora', pbg: 'aktif', slf: 'aktif', year: 2019 },
    { id: 5, name: 'Gedung Serbaguna Bahurekso', address: 'Jl. Veteran No. 15, Blora', pbg: 'aktif', slf: 'aktif', year: 2017 },
    { id: 6, name: 'Pasar Tradisional Blora', address: 'Jl. Pasar No. 1, Blora', pbg: 'aktif', slf: 'proses', year: 2016 },
    { id: 7, name: 'Gedung Olahraga Blora', address: 'Jl. Sport Center, Blora', pbg: 'aktif', slf: 'aktif', year: 2021 },
    { id: 8, name: 'Perpustakaan Daerah Blora', address: 'Jl. Pendidikan No. 5, Blora', pbg: 'aktif', slf: 'aktif', year: 2022 },
    { id: 9, name: 'Gedung DPRD Kabupaten Blora', address: 'Jl. Nusantara No. 12, Blora', pbg: 'aktif', slf: 'aktif', year: 2014 },
    { id: 10, name: 'Kantor Kecamatan Blora Kota', address: 'Jl. Pemuda No. 10, Blora', pbg: 'aktif', slf: 'aktif', year: 2013 },
    { id: 11, name: 'SPBU Pertamina Blora', address: 'Jl. Raya Blora-Cepu KM. 5', pbg: 'aktif', slf: 'aktif', year: 2018 },
    { id: 12, name: 'Gedung PGRI Blora', address: 'Jl. Pahlawan No. 8, Blora', pbg: 'aktif', slf: 'aktif', year: 2015 },
    { id: 13, name: 'Masjid Agung Blora', address: 'Jl. Jendral Sudirman, Blora', pbg: 'aktif', slf: 'aktif', year: 2010 },
    { id: 14, name: 'Gereja GKI Blora', address: 'Jl. Kartini No. 20, Blora', pbg: 'aktif', slf: 'aktif', year: 2012 },
    { id: 15, name: 'Klenteng Hok Tek Bio', address: 'Jl. Ketanggungan, Blora', pbg: 'aktif', slf: 'aktif', year: 2008 },
    { id: 16, name: 'Bank BRI Cabang Blora', address: 'Jl. Sudirman No. 45, Blora', pbg: 'aktif', slf: 'aktif', year: 2016 },
    { id: 17, name: 'Bank Mandiri Blora', address: 'Jl. Pemuda No. 30, Blora', pbg: 'aktif', slf: 'aktif', year: 2017 },
    { id: 18, name: 'Kantor Pos Blora', address: 'Jl. A. Yani No. 15, Blora', pbg: 'aktif', slf: 'aktif', year: 2014 },
    { id: 19, name: 'Terminal Bus Blora', address: 'Jl. Raya Cepu, Blora', pbg: 'aktif', slf: 'proses', year: 2019 },
    { id: 20, name: 'Stasiun KA Blora', address: 'Jl. Stasiun, Blora', pbg: 'aktif', slf: 'aktif', year: 2011 },
    { id: 21, name: 'SMA Negeri 1 Blora', address: 'Jl. Veteran No. 25, Blora', pbg: 'aktif', slf: 'aktif', year: 2013 },
    { id: 22, name: 'SMP Negeri 2 Blora', address: 'Jl. Kartini No. 15, Blora', pbg: 'aktif', slf: 'aktif', year: 2015 },
    { id: 23, name: 'SD Negeri Blora Kota 1', address: 'Jl. Pemuda No. 12, Blora', pbg: 'aktif', slf: 'aktif', year: 2012 },
    { id: 24, name: 'Puskesmas Blora Kota', address: 'Jl. Sudirman No. 60, Blora', pbg: 'aktif', slf: 'aktif', year: 2016 },
    { id: 25, name: 'Apotek Kimia Farma', address: 'Jl. Pemuda No. 35, Blora', pbg: 'aktif', slf: 'aktif', year: 2018 },
];

// Table state
let currentPage = 1;
const itemsPerPage = 10;
let filteredData = [...buildingData];
let sortColumn = null;
let sortDirection = 'asc';

function initTable() {
    renderTable();
    initSearch();
    initFilter();
    initSorting();
}

function renderTable() {
    const tableBody = document.getElementById('tableBody');
    const pagination = document.getElementById('pagination');
    
    if (!tableBody) return;
    
    // Calculate pagination
    const totalPages = Math.ceil(filteredData.length / itemsPerPage);
    const startIndex = (currentPage - 1) * itemsPerPage;
    const endIndex = startIndex + itemsPerPage;
    const pageData = filteredData.slice(startIndex, endIndex);
    
    // Render table rows
    tableBody.innerHTML = pageData.map((item, index) => `
        <tr>
            <td>${startIndex + index + 1}</td>
            <td>${item.name}</td>
            <td>${item.address}</td>
            <td><span class="status-badge ${item.pbg}">${getStatusLabel(item.pbg)}</span></td>
            <td><span class="status-badge ${item.slf}">${getStatusLabel(item.slf)}</span></td>
            <td>${item.year}</td>
        </tr>
    `).join('');
    
    // Render pagination
    if (pagination) {
        renderPagination(pagination, totalPages);
    }
    
    // Re-initialize Lucide icons for new content
    lucide.createIcons();
}

function getStatusLabel(status) {
    const labels = {
        'aktif': 'Aktif',
        'proses': 'Dalam Proses',
        'nonaktif': 'Nonaktif'
    };
    return labels[status] || status;
}

function renderPagination(pagination, totalPages) {
    if (totalPages <= 1) {
        pagination.innerHTML = '';
        return;
    }
    
    let html = '';
    
    // Previous button
    html += `
        <button class="page-btn" ${currentPage === 1 ? 'disabled' : ''} onclick="goToPage(${currentPage - 1})">
            <i data-lucide="chevron-left"></i>
        </button>
    `;
    
    // Page numbers
    const maxVisiblePages = 5;
    let startPage = Math.max(1, currentPage - Math.floor(maxVisiblePages / 2));
    let endPage = Math.min(totalPages, startPage + maxVisiblePages - 1);
    
    if (endPage - startPage < maxVisiblePages - 1) {
        startPage = Math.max(1, endPage - maxVisiblePages + 1);
    }
    
    if (startPage > 1) {
        html += `<button class="page-btn" onclick="goToPage(1)">1</button>`;
        if (startPage > 2) {
            html += `<span class="page-btn" disabled>...</span>`;
        }
    }
    
    for (let i = startPage; i <= endPage; i++) {
        html += `<button class="page-btn ${i === currentPage ? 'active' : ''}" onclick="goToPage(${i})">${i}</button>`;
    }
    
    if (endPage < totalPages) {
        if (endPage < totalPages - 1) {
            html += `<span class="page-btn" disabled>...</span>`;
        }
        html += `<button class="page-btn" onclick="goToPage(${totalPages})">${totalPages}</button>`;
    }
    
    // Next button
    html += `
        <button class="page-btn" ${currentPage === totalPages ? 'disabled' : ''} onclick="goToPage(${currentPage + 1})">
            <i data-lucide="chevron-right"></i>
        </button>
    `;
    
    pagination.innerHTML = html;
}

function goToPage(page) {
    currentPage = page;
    renderTable();
    
    // Scroll to table top
    const tableSection = document.getElementById('data-table');
    if (tableSection) {
        tableSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
    }
}

function initSearch() {
    const searchInput = document.getElementById('tableSearch');
    
    if (searchInput) {
        searchInput.addEventListener('input', debounce(function() {
            const query = this.value.toLowerCase().trim();
            filterData(query);
        }, 300));
    }
}

function initFilter() {
    const filterSelect = document.getElementById('filterStatus');
    
    if (filterSelect) {
        filterSelect.addEventListener('change', function() {
            const status = this.value;
            filterDataByStatus(status);
        });
    }
}

function filterData(query) {
    if (!query) {
        filteredData = [...buildingData];
    } else {
        filteredData = buildingData.filter(item => 
            item.name.toLowerCase().includes(query) ||
            item.address.toLowerCase().includes(query)
        );
    }
    
    currentPage = 1;
    applySort();
    renderTable();
}

function filterDataByStatus(status) {
    if (!status) {
        filteredData = [...buildingData];
    } else {
        filteredData = buildingData.filter(item => 
            item.pbg === status || item.slf === status
        );
    }
    
    currentPage = 1;
    applySort();
    renderTable();
}

function initSorting() {
    const sortableHeaders = document.querySelectorAll('.th-sortable');
    
    sortableHeaders.forEach(header => {
        header.addEventListener('click', function() {
            const column = this.getAttribute('data-sort');
            
            // Toggle direction if same column
            if (sortColumn === column) {
                sortDirection = sortDirection === 'asc' ? 'desc' : 'asc';
            } else {
                sortColumn = column;
                sortDirection = 'asc';
            }
            
            // Update visual indicators
            sortableHeaders.forEach(h => h.classList.remove('sorted-asc', 'sorted-desc'));
            this.classList.add(`sorted-${sortDirection}`);
            
            applySort();
            renderTable();
        });
    });
}

function applySort() {
    if (!sortColumn) return;
    
    filteredData.sort((a, b) => {
        let valueA = a[sortColumn];
        let valueB = b[sortColumn];
        
        // Handle string comparison
        if (typeof valueA === 'string') {
            valueA = valueA.toLowerCase();
            valueB = valueB.toLowerCase();
        }
        
        if (valueA < valueB) {
            return sortDirection === 'asc' ? -1 : 1;
        }
        if (valueA > valueB) {
            return sortDirection === 'asc' ? 1 : -1;
        }
        return 0;
    });
}

// Debounce utility
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func.apply(this, args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}
