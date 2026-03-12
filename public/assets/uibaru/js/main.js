// Main JavaScript File
// Initialize Lucide icons and basic functionality

document.addEventListener('DOMContentLoaded', function() {
    // Initialize Lucide icons
    lucide.createIcons();
    
    // Header scroll effect
    initHeaderScroll();
    
    // Mobile menu toggle
    initMobileMenu();
    
    // Initialize scroll animations
    initScrollAnimations();
});

// Header scroll effect
function initHeaderScroll() {
    const header = document.getElementById('header');
    let lastScrollY = window.scrollY;
    
    window.addEventListener('scroll', function() {
        const currentScrollY = window.scrollY;
        
        // Add/remove scrolled class
        if (currentScrollY > 10) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
        
        lastScrollY = currentScrollY;
    }, { passive: true });
}

// Mobile menu functionality
function initMobileMenu() {
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const navMobile = document.getElementById('navMobile');
    const submenuToggles = document.querySelectorAll('.submenu-toggle');
    
    // Toggle mobile menu
    if (mobileMenuBtn && navMobile) {
        mobileMenuBtn.addEventListener('click', function() {
            navMobile.classList.toggle('active');
            
            // Change icon
            const icon = mobileMenuBtn.querySelector('i');
            if (navMobile.classList.contains('active')) {
                icon.setAttribute('data-lucide', 'x');
            } else {
                icon.setAttribute('data-lucide', 'menu');
            }
            lucide.createIcons();
        });
    }
    
    // Submenu toggles
    submenuToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const submenu = this.nextElementSibling;
            this.classList.toggle('active');
            submenu.classList.toggle('active');
        });
    });
    
    // Close mobile menu when clicking outside
    document.addEventListener('click', function(e) {
        if (navMobile && navMobile.classList.contains('active')) {
            if (!navMobile.contains(e.target) && !mobileMenuBtn.contains(e.target)) {
                navMobile.classList.remove('active');
                const icon = mobileMenuBtn.querySelector('i');
                icon.setAttribute('data-lucide', 'menu');
                lucide.createIcons();
            }
        }
    });
}

// Scroll animations using Intersection Observer
function initScrollAnimations() {
    const animatedElements = document.querySelectorAll('[data-animate]');
    
    // Check if Intersection Observer is supported
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    // Add delay if specified
                    const delay = entry.target.getAttribute('data-delay') || 0;
                    
                    setTimeout(() => {
                        entry.target.classList.add('animated');
                    }, delay);
                    
                    // Unobserve after animation
                    observer.unobserve(entry.target);
                }
            });
        }, {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        });
        
        animatedElements.forEach(el => observer.observe(el));
    } else {
        // Fallback for browsers without Intersection Observer
        animatedElements.forEach(el => {
            el.classList.add('animated');
        });
    }
}

// Utility function: Debounce
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

// Utility function: Throttle
function throttle(func, limit) {
    let inThrottle;
    return function(...args) {
        if (!inThrottle) {
            func.apply(this, args);
            inThrottle = true;
            setTimeout(() => inThrottle = false, limit);
        }
    };
}

// Utility function: Format number with separators
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}

// Utility function: Smooth scroll to element
function scrollToElement(selector, offset = 80) {
    const element = document.querySelector(selector);
    if (element) {
        const elementPosition = element.getBoundingClientRect().top + window.pageYOffset;
        window.scrollTo({
            top: elementPosition - offset,
            behavior: 'smooth'
        });
    }
}
