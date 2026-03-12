/**
 * SISTEM INFORMASI PENYELENGGARAAN BANGUNAN GEDUNG
 * KABUPATEN BLORA - MAIN JAVASCRIPT
 */

// ========================================
// DATA
// ========================================

// Building Data for Table
const buildingData = [
    { id: 1, name: "Gedung Perkantoran Pemda Blora", address: "Jl. Sudirman No. 123, Blora", statusPBG: "aktif", statusSLF: "aktif", year: 2025 },
    { id: 2, name: "RSUD Dr. R. Soetijono", address: "Jl. Dr. Sutomo No. 45, Blora", statusPBG: "aktif", statusSLF: "aktif", year: 2024 },
    { id: 3, name: "Gedung SMP Negeri 1 Blora", address: "Jl. Pemuda No. 78, Blora", statusPBG: "aktif", statusSLF: "proses", year: 2025 },
    { id: 4, name: "Mall Blora Square", address: "Jl. Ahmad Yani No. 56, Blora", statusPBG: "aktif", statusSLF: "aktif", year: 2023 },
    { id: 5, name: "Hotel Grand Blora", address: "Jl. Diponegoro No. 89, Blora", statusPBG: "proses", statusSLF: "pending", year: 2026 },
    { id: 6, name: "Gedung Serbaguna Blora", address: "Jl. Veteran No. 12, Blora", statusPBG: "aktif", statusSLF: "aktif", year: 2024 },
    { id: 7, name: "Pasar Tradisional Blora", address: "Jl. Pasar No. 34, Blora", statusPBG: "aktif", statusSLF: "aktif", year: 2022 },
    { id: 8, name: "Gedung SMA Negeri 2 Blora", address: "Jl. Pahlawan No. 67, Blora", statusPBG: "aktif", statusSLF: "aktif", year: 2023 },
    { id: 9, name: "Bank BRI Cabang Blora", address: "Jl. Merdeka No. 23, Blora", statusPBG: "aktif", statusSLF: "aktif", year: 2024 },
    { id: 10, name: "Pabrik Tekstil Jaya", address: "Jl. Industri No. 90, Blora", statusPBG: "proses", statusSLF: "pending", year: 2026 },
    { id: 11, name: "Gedung DPRD Kabupaten Blora", address: "Jl. Sudirman No. 234, Blora", statusPBG: "aktif", statusSLF: "aktif", year: 2023 },
    { id: 12, name: "Rumah Sakit Ibu dan Anak", address: "Jl. Kesehatan No. 45, Blora", statusPBG: "aktif", statusSLF: "aktif", year: 2025 },
    { id: 13, name: "Gedung SMK Negeri 1 Blora", address: "Jl. Pendidikan No. 78, Blora", statusPBG: "aktif", statusSLF: "proses", year: 2024 },
    { id: 14, name: "Supermarket Sumber Rejeki", address: "Jl. Ahmad Yani No. 123, Blora", statusPBG: "aktif", statusSLF: "aktif", year: 2023 },
    { id: 15, name: "Gedung Olahraga Blora", address: "Jl. Sport No. 56, Blora", statusPBG: "aktif", statusSLF: "aktif", year: 2024 },
    { id: 16, name: "Apartemen Blora Residence", address: "Jl. Mawar No. 89, Blora", statusPBG: "proses", statusSLF: "pending", year: 2026 },
    { id: 17, name: "Kantor Pos Blora", address: "Jl. Pos No. 34, Blora", statusPBG: "aktif", statusSLF: "aktif", year: 2022 },
    { id: 18, name: "Gedung SD Negeri 3 Blora", address: "Jl. Pelajar No. 67, Blora", statusPBG: "aktif", statusSLF: "aktif", year: 2023 },
    { id: 19, name: "Restoran Sederhana Blora", address: "Jl. Kuliner No. 12, Blora", statusPBG: "aktif", statusSLF: "aktif", year: 2024 },
    { id: 20, name: "Gedung Perpustakaan Daerah", address: "Jl. Budaya No. 45, Blora", statusPBG: "aktif", statusSLF: "aktif", year: 2025 },
];

// Marketplace Cards Data
const marketplaceData = [
    { id: 1, name: "Gedung Perkantoran Modern", category: "perkantoran", location: "Kecamatan Blora", year: 2025, status: "SLF Aktif", image: "images/building-1.jpg" },
    { id: 2, name: "Rumah Sakit Umum Daerah", category: "kesehatan", location: "Kecamatan Blora", year: 2024, status: "PBG & SLF", image: "images/building-2.jpg" },
    { id: 3, name: "Pusat Perbelanjaan Blora", category: "komersial", location: "Kecamatan Blora", year: 2023, status: "SLF Aktif", image: "images/building-3.jpg" },
    { id: 4, name: "Sekolah Menengah Atas", category: "pendidikan", location: "Kecamatan Jepon", year: 2024, status: "PBG Aktif", image: "images/building-4.jpg" },
    { id: 5, name: "Hotel Bintang Tiga", category: "komersial", location: "Kecamatan Blora", year: 2025, status: "Dalam Proses", image: "images/building-5.jpg" },
    { id: 6, name: "Gedung Serbaguna", category: "perkantoran", location: "Kecamatan Randublatung", year: 2023, status: "SLF Aktif", image: "images/building-6.jpg" },
    { id: 7, name: "Puskesmas Kecamatan", category: "kesehatan", location: "Kecamatan Todanan", year: 2024, status: "PBG & SLF", image: "images/building-7.jpg" },
    { id: 8, name: "Sekolah Dasar Negeri", category: "pendidikan", location: "Kecamatan Cepu", year: 2022, status: "SLF Aktif", image: "images/building-8.jpg" },
];

// ========================================
// UTILITY FUNCTIONS
// ========================================

// Debounce function for search
function debounce(func, wait) {
    let timeout;
    return function executedFunction(...args) {
        const later = () => {
            clearTimeout(timeout);
            func(...args);
        };
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
    };
}

// Format number with thousand separator
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
}

// Get status badge HTML
function getStatusBadge(status) {
    const statusMap = {
        'aktif': { class: 'status-aktif', text: 'Aktif' },
        'proses': { class: 'status-proses', text: 'Dalam Proses' },
        'pending': { class: 'status-pending', text: 'Menunggu' },
        'ditolak': { class: 'status-ditolak', text: 'Ditolak' }
    };
    const s = statusMap[status] || statusMap['pending'];
    return `<span class="status-badge ${s.class}">${s.text}</span>`;
}

// ========================================
// HEADER & NAVIGATION
// ========================================

function initHeader() {
    const header = document.getElementById('header');
    const menuToggle = document.getElementById('menuToggle');
    const mobileNav = document.getElementById('mobileNav');
    const mobileNavOverlay = document.getElementById('mobileNavOverlay');
    const mobileNavClose = document.getElementById('mobileNavClose');
    const mobileNavLinks = document.querySelectorAll('.mobile-nav-link');

    // Header scroll effect
    let lastScroll = 0;
    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;
        
        if (currentScroll > 50) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
        
        lastScroll = currentScroll;
    }, { passive: true });

    // Mobile menu toggle
    function openMobileNav() {
        mobileNav.classList.add('active');
        mobileNavOverlay.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeMobileNav() {
        mobileNav.classList.remove('active');
        mobileNavOverlay.classList.remove('active');
        document.body.style.overflow = '';
    }

    menuToggle.addEventListener('click', openMobileNav);
    mobileNavClose.addEventListener('click', closeMobileNav);
    mobileNavOverlay.addEventListener('click', closeMobileNav);

    // Close mobile nav on link click
    mobileNavLinks.forEach(link => {
        link.addEventListener('click', closeMobileNav);
    });

    // Active nav link on scroll
    const sections = document.querySelectorAll('section[id]');
    const navLinks = document.querySelectorAll('.nav-link');

    function updateActiveNav() {
        const scrollPos = window.scrollY + 100;

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');

            if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${sectionId}`) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }

    window.addEventListener('scroll', updateActiveNav, { passive: true });
}

// ========================================
// ANIMATED COUNTERS
// ========================================

function initCounters() {
    const counters = document.querySelectorAll('.stat-number, .stat-mini-number');
    
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const target = parseInt(counter.getAttribute('data-target'));
                animateCounter(counter, target);
                observer.unobserve(counter);
            }
        });
    }, observerOptions);

    counters.forEach(counter => observer.observe(counter));
}

function animateCounter(element, target) {
    const duration = 2000;
    const start = 0;
    const startTime = performance.now();

    function update(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        // Easing function (ease-out)
        const easeOut = 1 - Math.pow(1 - progress, 3);
        const current = Math.floor(start + (target - start) * easeOut);
        
        element.textContent = formatNumber(current);
        
        if (progress < 1) {
            requestAnimationFrame(update);
        } else {
            element.textContent = formatNumber(target);
        }
    }

    requestAnimationFrame(update);
}

// ========================================
// DATA TABLE
// ========================================

let currentPage = 1;
const itemsPerPage = 5;
let filteredData = [...buildingData];

function initTable() {
    const tableBody = document.getElementById('tableBody');
    const tableSearch = document.getElementById('tableSearch');
    const filterStatus = document.getElementById('filterStatus');
    const filterYear = document.getElementById('filterYear');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');

    // Initial render
    renderTable();
    renderPagination();

    // Search functionality
    const debouncedSearch = debounce((query) => {
        filterData();
    }, 300);

    tableSearch.addEventListener('input', (e) => {
        debouncedSearch(e.target.value);
    });

    // Filter functionality
    filterStatus.addEventListener('change', filterData);
    filterYear.addEventListener('change', filterData);

    // Pagination buttons
    prevBtn.addEventListener('click', () => {
        if (currentPage > 1) {
            currentPage--;
            renderTable();
            renderPagination();
        }
    });

    nextBtn.addEventListener('click', () => {
        const totalPages = Math.ceil(filteredData.length / itemsPerPage);
        if (currentPage < totalPages) {
            currentPage++;
            renderTable();
            renderPagination();
        }
    });
}

function filterData() {
    const searchQuery = document.getElementById('tableSearch').value.toLowerCase();
    const statusFilter = document.getElementById('filterStatus').value;
    const yearFilter = document.getElementById('filterYear').value;

    filteredData = buildingData.filter(item => {
        const matchesSearch = 
            item.name.toLowerCase().includes(searchQuery) ||
            item.address.toLowerCase().includes(searchQuery) ||
            item.statusPBG.toLowerCase().includes(searchQuery) ||
            item.statusSLF.toLowerCase().includes(searchQuery);
        
        const matchesStatus = !statusFilter || 
            item.statusPBG === statusFilter || 
            item.statusSLF === statusFilter;
        
        const matchesYear = !yearFilter || item.year.toString() === yearFilter;

        return matchesSearch && matchesStatus && matchesYear;
    });

    currentPage = 1;
    renderTable();
    renderPagination();
}

function renderTable() {
    const tableBody = document.getElementById('tableBody');
    const start = (currentPage - 1) * itemsPerPage;
    const end = start + itemsPerPage;
    const pageData = filteredData.slice(start, end);

    if (pageData.length === 0) {
        tableBody.innerHTML = `
            <tr>
                <td colspan="7" style="text-align: center; padding: 3rem;">
                    <i class="ph ph-magnifying-glass" style="font-size: 2rem; color: var(--color-gray-400); margin-bottom: 1rem;"></i>
                    <p style="color: var(--color-gray-500);">Tidak ada data yang ditemukan</p>
                </td>
            </tr>
        `;
        return;
    }

    tableBody.innerHTML = pageData.map((item, index) => `
        <tr>
            <td class="td-number">${start + index + 1}</td>
            <td><strong>${item.name}</strong></td>
            <td>${item.address}</td>
            <td>${getStatusBadge(item.statusPBG)}</td>
            <td>${getStatusBadge(item.statusSLF)}</td>
            <td class="td-year">${item.year}</td>
            <td class="td-action">
                <button class="action-btn" title="Lihat Detail">
                    <i class="ph ph-eye"></i>
                </button>
            </td>
        </tr>
    `).join('');
}

function renderPagination() {
    const paginationNumbers = document.getElementById('paginationNumbers');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const totalPages = Math.ceil(filteredData.length / itemsPerPage);

    // Update button states
    prevBtn.disabled = currentPage === 1;
    nextBtn.disabled = currentPage === totalPages || totalPages === 0;

    if (totalPages <= 1) {
        paginationNumbers.innerHTML = '';
        return;
    }

    // Generate page numbers
    let pages = [];
    const maxVisible = 5;
    
    if (totalPages <= maxVisible) {
        for (let i = 1; i <= totalPages; i++) {
            pages.push(i);
        }
    } else {
        if (currentPage <= 3) {
            pages = [1, 2, 3, 4, '...', totalPages];
        } else if (currentPage >= totalPages - 2) {
            pages = [1, '...', totalPages - 3, totalPages - 2, totalPages - 1, totalPages];
        } else {
            pages = [1, '...', currentPage - 1, currentPage, currentPage + 1, '...', totalPages];
        }
    }

    paginationNumbers.innerHTML = pages.map(page => {
        if (page === '...') {
            return `<span class="pagination-number" style="cursor: default; border: none;">...</span>`;
        }
        return `
            <button class="pagination-number ${page === currentPage ? 'active' : ''}" 
                    onclick="goToPage(${page})">
                ${page}
            </button>
        `;
    }).join('');
}

function goToPage(page) {
    currentPage = page;
    renderTable();
    renderPagination();
}

// ========================================
// MARKETPLACE CARDS
// ========================================

function initMarketplace() {
    const grid = document.getElementById('marketplaceGrid');
    const tabBtns = document.querySelectorAll('.tab-btn');
    const loadMoreBtn = document.getElementById('loadMoreBtn');

    let currentFilter = 'all';
    let visibleCount = 8;

    // Render initial cards
    renderCards();

    // Tab filtering
    tabBtns.forEach(btn => {
        btn.addEventListener('click', () => {
            tabBtns.forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            currentFilter = btn.getAttribute('data-tab');
            visibleCount = 8;
            renderCards();
        });
    });

    // Load more
    loadMoreBtn.addEventListener('click', () => {
        visibleCount += 4;
        renderCards();
    });

    function renderCards() {
        const filteredCards = currentFilter === 'all' 
            ? marketplaceData 
            : marketplaceData.filter(card => card.category === currentFilter);

        const cardsToShow = filteredCards.slice(0, visibleCount);

        grid.innerHTML = cardsToShow.map(card => `
            <div class="marketplace-card" data-category="${card.category}">
                <div class="card-image">
                    <img src="${card.image}" alt="${card.name}" loading="lazy" 
                         onerror="this.src='https://via.placeholder.com/400x300/080741/ffffff?text=${encodeURIComponent(card.name)}'">
                    <span class="card-badge">
                        <i class="ph ph-check-circle"></i>
                        Terverifikasi
                    </span>
                </div>
                <div class="card-content">
                    <span class="card-category">${getCategoryLabel(card.category)}</span>
                    <h3 class="card-title">${card.name}</h3>
                    <div class="card-location">
                        <i class="ph ph-map-pin"></i>
                        <span>${card.location}</span>
                    </div>
                    <div class="card-meta">
                        <span class="card-year">
                            <i class="ph ph-calendar"></i>
                            ${card.year}
                        </span>
                        <span class="card-status ${getCardStatusClass(card.status)}">
                            ${card.status}
                        </span>
                    </div>
                </div>
            </div>
        `).join('');

        // Hide load more if all cards shown
        loadMoreBtn.style.display = visibleCount >= filteredCards.length ? 'none' : 'flex';

        // Animate cards
        const cards = grid.querySelectorAll('.marketplace-card');
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            setTimeout(() => {
                card.style.transition = 'all 0.3s ease';
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 50);
        });
    }
}

function getCategoryLabel(category) {
    const labels = {
        'komersial': 'Komersial',
        'perkantoran': 'Perkantoran',
        'pendidikan': 'Pendidikan',
        'kesehatan': 'Kesehatan'
    };
    return labels[category] || category;
}

function getCardStatusClass(status) {
    const classes = {
        'SLF Aktif': 'status-aktif',
        'PBG Aktif': 'status-proses',
        'PBG & SLF': 'status-aktif',
        'Dalam Proses': 'status-pending'
    };
    return classes[status] || 'status-pending';
}

// ========================================
// SCROLL TO TOP
// ========================================

function initScrollToTop() {
    const scrollTopBtn = document.getElementById('scrollTop');

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 500) {
            scrollTopBtn.classList.add('visible');
        } else {
            scrollTopBtn.classList.remove('visible');
        }
    }, { passive: true });

    scrollTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
}

// ========================================
// SCROLL ANIMATIONS
// ========================================

function initScrollAnimations() {
    const animatedElements = document.querySelectorAll('.service-card, .stat-card, .info-card, .info-item, .quick-link');

    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 50);
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    animatedElements.forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(20px)';
        el.style.transition = 'all 0.5s ease';
        observer.observe(el);
    });
}

// ========================================
// INITIALIZATION
// ========================================

document.addEventListener('DOMContentLoaded', () => {
    initHeader();
    initCounters();
    initTable();
    initMarketplace();
    initScrollToTop();
    initScrollAnimations();

    // Add smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const headerOffset = 80;
                const elementPosition = target.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - headerOffset;

                window.scrollTo({
                    top: offsetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    console.log('🏛️ Sistem Informasi Penyelenggaraan Bangunan Gedung - Kabupaten Blora');
    console.log('✅ Application initialized successfully');
});

// Handle window resize
let resizeTimer;
window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
        // Re-render table on resize for responsive adjustments
        renderTable();
    }, 250);
});
