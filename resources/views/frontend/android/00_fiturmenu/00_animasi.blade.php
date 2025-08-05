<div class="w-full h-[184px] absolute top-0 overflow-hidden">
    <!-- Animated Navy Waves -->
    <div class="absolute inset-0 bg-navy-900 opacity-95">
        <div class="wave-animation">
            <!-- Wave elements will be added via CSS/JS -->
        </div>
    </div>

    <!-- Subtle Particle Animation -->
    <div class="particles-container">
        <!-- Particles will be added via JS -->
    </div>

    <!-- Elegant Shimmer Effect -->
    <div class="shimmer-overlay"></div>
</div>

<style>
    /* Navy Color Palette */
    :root {
        --navy-900: #0a192f;
        --navy-800: #172a45;
        --navy-700: #303f60;
        --accent-blue: #64ffda;
    }

    .wave-animation {
        position: absolute;
        bottom: 0;
        width: 200%;
        height: 100%;
        background: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="rgba(10,25,47,0.7)" d="M0,192L48,197.3C96,203,192,213,288,229.3C384,245,480,267,576,250.7C672,235,768,181,864,181.3C960,181,1056,235,1152,234.7C1248,235,1344,181,1392,154.7L1440,128L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg>') repeat-x;
        animation: wave 15s linear infinite;
        transform: translate3d(0, 0, 0);
    }

    @keyframes wave {
        0% { transform: translateX(0); }
        100% { transform: translateX(-50%); }
    }

    .shimmer-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 100%;
        background: linear-gradient(135deg, rgba(100,255,218,0.1) 0%, rgba(10,25,47,0) 50%, rgba(100,255,218,0.1) 100%);
        animation: shimmer 8s ease infinite;
    }

    @keyframes shimmer {
        0% { background-position: -200% 0; }
        100% { background-position: 200% 0; }
    }

    .particles-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }
</style>

<script>
    // Optional: Add floating particles (lightweight)
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.querySelector('.particles-container');
        const particleCount = window.innerWidth < 768 ? 20 : 30;

        for (let i = 0; i < particleCount; i++) {
            const particle = document.createElement('div');
            particle.className = 'particle';

            // Random properties
            const size = Math.random() * 3 + 1;
            const posX = Math.random() * 100;
            const posY = Math.random() * 100;
            const delay = Math.random() * 5;
            const duration = 10 + Math.random() * 20;

            particle.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                background-color: rgba(100, 255, 218, ${Math.random() * 0.5});
                border-radius: 50%;
                left: ${posX}%;
                top: ${posY}%;
                animation: float ${duration}s ease-in-out ${delay}s infinite;
                opacity: ${Math.random() * 0.5 + 0.1};
            `;

            container.appendChild(particle);
        }

        // Add keyframes dynamically
        const style = document.createElement('style');
        style.textContent = `
            @keyframes float {
                0%, 100% { transform: translate(0, 0); }
                25% { transform: translate(${Math.random() * 50 - 25}px, ${Math.random() * 20 - 10}px); }
                50% { transform: translate(${Math.random() * 50 - 25}px, ${Math.random() * 20 - 10}px); }
                75% { transform: translate(${Math.random() * 50 - 25}px, ${Math.random() * 20 - 10}px); }
            }
        `;
        document.head.appendChild(style);
    });
</script>
