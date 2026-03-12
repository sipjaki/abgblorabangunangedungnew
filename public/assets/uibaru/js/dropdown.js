// Dropdown Menu Functionality
// Handles desktop dropdown menus with click-to-toggle behavior

document.addEventListener('DOMContentLoaded', function() {
    initDropdowns();
});

function initDropdowns() {
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const dropdownId = this.getAttribute('data-dropdown');
            const parentItem = this.closest('.nav-item');
            const dropdownMenu = document.getElementById(`dropdown-${dropdownId}`);
            
            // Close all other dropdowns
            closeAllDropdowns();
            
            // Toggle current dropdown
            if (parentItem && !parentItem.classList.contains('active')) {
                parentItem.classList.add('active');
                
                // Add animation class
                if (dropdownMenu) {
                    dropdownMenu.classList.add('animate-slide-down');
                }
            }
        });
    });
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function(e) {
        if (!e.target.closest('.nav-item.has-dropdown')) {
            closeAllDropdowns();
        }
    });
    
    // Close dropdowns on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeAllDropdowns();
        }
    });
    
    // Handle dropdown link clicks
    const dropdownLinks = document.querySelectorAll('.dropdown-link');
    dropdownLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Close dropdown after link click
            setTimeout(closeAllDropdowns, 100);
        });
    });
}

function closeAllDropdowns() {
    const activeItems = document.querySelectorAll('.nav-item.active');
    activeItems.forEach(item => {
        item.classList.remove('active');
    });
}

// Handle window resize - close dropdowns on mobile breakpoint
window.addEventListener('resize', debounce(function() {
    if (window.innerWidth <= 1023) {
        closeAllDropdowns();
    }
}, 250));

// Debounce utility function
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
