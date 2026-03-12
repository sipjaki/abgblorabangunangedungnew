// Number Counter Animation
// Animates numbers counting up when they come into view

document.addEventListener('DOMContentLoaded', function() {
    initCounters();
});

function initCounters() {
    const counters = document.querySelectorAll('.stat-number[data-count]');
    
    // Check if Intersection Observer is supported
    if ('IntersectionObserver' in window) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const counter = entry.target;
                    const target = parseInt(counter.getAttribute('data-count'));
                    
                    animateCounter(counter, target);
                    
                    // Unobserve after animation starts
                    observer.unobserve(counter);
                }
            });
        }, {
            threshold: 0.5
        });
        
        counters.forEach(counter => observer.observe(counter));
    } else {
        // Fallback: animate all counters immediately
        counters.forEach(counter => {
            const target = parseInt(counter.getAttribute('data-count'));
            animateCounter(counter, target);
        });
    }
}

function animateCounter(element, target) {
    const duration = 2000; // 2 seconds
    const startTime = performance.now();
    const startValue = 0;
    
    function updateCounter(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        
        // Easing function (ease-out)
        const easeOut = 1 - Math.pow(1 - progress, 3);
        
        const currentValue = Math.floor(startValue + (target - startValue) * easeOut);
        
        // Format number with thousand separators
        element.textContent = formatNumber(currentValue);
        
        if (progress < 1) {
            requestAnimationFrame(updateCounter);
        } else {
            element.textContent = formatNumber(target);
        }
    }
    
    requestAnimationFrame(updateCounter);
}

function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ',');
}
