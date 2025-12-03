<div class="button-modern">
    <span style="position: relative; z-index: 2;">
        📌 Halaman : {{$title}}
    </span>

    <!-- Layer putih bergerak -->
    <div style="
        position: absolute;
        top: 0; left: -50%;
        width: 50%;
        height: 100%;
        background: linear-gradient(90deg, rgba(255,255,255,0) 0%, rgba(255,255,255,0.5) 50%, rgba(255,255,255,0) 100%);
        animation: shine 2.5s linear infinite;
        z-index: 1;
        pointer-events: none;
    "></div>

    <style>
        @keyframes shine {
            0% {
                left: -50%;
            }
            100% {
                left: 100%;
            }
        }
    </style>
</div>
