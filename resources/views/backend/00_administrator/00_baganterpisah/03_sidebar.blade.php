<style>
    /* Background sidebar dengan animasi */
    .app-sidebar {
        background:
            linear-gradient(45deg,
                rgba(0, 0, 128, 0.9) 30%,
                rgba(0, 0, 128, 0.7)),
            repeating-linear-gradient(-45deg,
                rgba(255, 209, 0, 0.1) 0px,
                rgba(255, 209, 0, 0.1) 2px,
                transparent 2px,
                transparent 5px),
            url('data:image/svg+xml,<svg viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><rect width="100" height="100" fill="%23000080"/><path d="M20 20L50 5L80 20V35L50 50L20 35V20Z" fill="%23ffd100" opacity="0.1"/><path d="M20 65L50 50L80 65V80L50 95L20 80V65Z" fill="%23ffd100" opacity="0.1"/></svg>');
        background-size: cover;
        background-position: center;
        position: relative;
        overflow: hidden;
        animation: buildingPan 20s linear infinite;
    }

    /* Animasi background */
    @keyframes buildingPan {
        0% {
            background-position: 0% 0%;
        }
        50% {
            background-position: 100% 100%;
        }
        100% {
            background-position: 0% 0%;
        }
    }

    /* Efek shimmer */
    .app-sidebar::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: linear-gradient(
            45deg,
            transparent 25%,
            rgba(255, 209, 0, 0.1) 50%,
            transparent 75%
        );
        animation: shimmer 5s infinite linear;
    }

    @keyframes shimmer {
        0% {
            transform: translate(-25%, -25%);
        }
        100% {
            transform: translate(25%, 25%);
        }
    }

    /* Border aksen kuning */
    .app-sidebar::after {
        content: '';
        position: absolute;
        top: 0;
        right: 0;
        width: 3px;
        height: 100%;
        background: linear-gradient(
            to bottom,
            transparent,
            #ffd100,
            transparent
        );
        animation: borderGlow 3s ease-in-out infinite;
    }

    @keyframes borderGlow {
        0%, 100% {
            opacity: 0.5;
        }
        50% {
            opacity: 1;
        }
    }

    /* Efek hover menu yang sudah ada sebelumnya */
    .nav-item > .nav-link:hover {
        background-color: #ffd100 !important;
        color: black !important;
        transition: all 0.3s ease-in-out;
        transform: translateX(5px);
    }
</style>

<style>
    /* 3D BUILDING ENHANCED VISIBILITY */
    .floating-building {
        position: absolute;
        transform-style: preserve-3d;
        animation: buildingFloat 18s infinite linear;
        background: rgba(0, 0, 128, 0.6);
        border: 2px solid #ffd100;
        box-shadow: 0 0 30px rgba(255, 209, 0, 0.3);
        perspective: 1000px;
    }

    /* Enhanced Building Details */
    .floating-building::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 15%;
        background: linear-gradient(to bottom,
            transparent,
            rgba(255, 209, 0, 0.4) 60%,
            transparent);
        bottom: 0;
        transform: translateZ(25px);
    }

    .floating-building::after {
        content: '';
        position: absolute;
        width: 90%;
        height: 50%;
        background: linear-gradient(45deg,
            rgba(255, 255, 255, 0.15),
            rgba(255, 209, 0, 0.1));
        left: 5%;
        top: 25%;
        transform: translateZ(15px);
        box-shadow: 0 0 40px rgba(255,209,0,0.3);
    }

    /* Stronger Animation */
    @keyframes buildingFloat {
        0% {
            transform:
                translateZ(-1500px)
                rotateY(20deg)
                rotateX(10deg)
                scale(0.3);
            opacity: 0;
        }
        20% {
            opacity: 1;
            transform:
                translateZ(-800px)
                rotateY(90deg)
                scale(0.8);
        }
        80% {
            opacity: 1;
            transform:
                translateZ(800px)
                rotateY(270deg)
                scale(1.2);
        }
        100% {
            transform:
                translateZ(1500px)
                rotateY(380deg)
                rotateX(-10deg)
                scale(1.5);
            opacity: 0;
        }
    }

    /* Glowing Windows */
    .building-windows {
        width: 20px;
        height: 30px;
        background:
            radial-gradient(circle at center,
                #ffd100 20%,
                transparent 70%);
        box-shadow: 0 0 20px #ffd100;
        animation: windowGlow 2s infinite alternate;
    }

    @keyframes windowGlow {
        from {
            opacity: 0.6;
        }
        to {
            opacity: 1;
        }
    }

    /* Particle Trail Effect */
    .building-particle {
        position: absolute;
        width: 4px;
        height: 4px;
        background: #ffd100;
        border-radius: 50%;
        animation: particleFade 1s infinite;
    }

    @keyframes particleFade {
        from {
            opacity: 1;
            transform: translateZ(0);
        }
        to {
            opacity: 0;
            transform: translateZ(50px);
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const container = document.createElement('div');
        container.className = 'floating-3d-container';

        // Generate buildings with better visibility
        for(let i = 0; i < 6; i++) {
            const building = document.createElement('div');
            building.className = 'floating-building';

            // Larger base size
            const width = Math.random() * 120 + 80;
            const height = Math.random() * 300 + 200;

            building.style.cssText = `
                width: ${width}px;
                height: ${height}px;
                left: ${Math.random() * 100}%;
                filter: brightness(${Math.random() * 0.5 + 0.8});
                animation-delay: ${i * -2}s;
            `;

            // Add glowing windows
            const windowCols = Math.floor(width / 30);
            const windowRows = Math.floor(height / 50);

            for(let r = 0; r < windowRows; r++) {
                for(let c = 0; c < windowCols; c++) {
                    const window = document.createElement('div');
                    window.className = 'building-windows';
                    window.style.cssText = `
                        left: ${(c * 100/windowCols) + 5}%;
                        top: ${(r * 100/windowRows) + 10}%;
                    `;

                    // Add particles
                    if(Math.random() > 0.8) {
                        const particle = document.createElement('div');
                        particle.className = 'building-particle';
                        particle.style.cssText = `
                            left: ${Math.random() * 100}%;
                            top: ${Math.random() * 100}%;
                        `;
                        window.appendChild(particle);
                    }

                    building.appendChild(window);
                }
            }

            container.appendChild(building);
        }

        document.querySelector('.app-sidebar').appendChild(container);
    });
</script>


      <!--begin::Sidebar-->
      <aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
        <!--begin::Sidebar Brand-->
        <div class="sidebar-brand">
          <!--begin::Brand Link-->
          <a href="./index.html" class="brand-link">
            <!--begin::Brand Image-->
            <img
              src="/assets/abgblora/logo/logokabupatenblora.png"
              alt="Logo Kabupaten Blora"
              class="brand-image opacity-75 shadow"
              style="margin-right:5px;"
            />
            <img
              src="/assets/icon/pupr.png"
              alt="Logo Kabupaten Blora"
              class="brand-image opacity-75 shadow"
            />
            <!--end::Brand Image-->
            <!--begin::Brand Text-->
            <span class="brand-text fw-light">ABG Blora</span>
            <!--end::Brand Text-->
          </a>
          <!--end::Brand Link-->
        </div>
        <!--end::Sidebar Brand-->
        <!--begin::Sidebar Wrapper-->
        <div class="sidebar-wrapper">
          <nav class="mt-2">
            <!--begin::Sidebar Menu-->
            <ul
              class="nav sidebar-menu flex-column"
              data-lte-toggle="treeview"
              role="menu"
              data-accordion="false"
            >
<li class="nav-item">
    <a href="#" class="nav-link" style="display: flex; align-items: center; padding: 0.5rem 1rem;">
        <!-- Icon Dashboard -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" viewBox="0 0 16 16" style="flex-shrink: 0;">
            <path d="M0 0h6v6H0V0zm10 0h6v6h-6V0zM0 10h6v6H0v-6zm10 0h6v6h-6v-6z"/>
        </svg>
        <p style="color: white; margin: 0 0 0 8px; flex-grow: 1;">Dashboard</p>
        <i class="nav-arrow bi bi-chevron-right" style="margin-left: auto; color: white;"></i>
    </a>

    <ul class="nav nav-treeview" style="margin-left: 15px;">
        <!-- Halaman Web -->
        <li class="nav-item">
            <a href="/web" target="_blank" class="nav-link" style="display: flex; align-items: center; padding: 0.5rem 1rem 0.5rem 2rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" viewBox="0 0 16 16" style="flex-shrink: 0;">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0zM4.285 12.433A6.987 6.987 0 0 1 1.528 8.25H4.07c.083 1.658.66 3.162 1.573 4.183l-.358.316zM8 14.5a6.486 6.486 0 0 1-2.22-.383c1.136-1.194 1.852-2.854 1.992-4.617h2.456c-.14 1.763-.856 3.423-1.992 4.617A6.486 6.486 0 0 1 8 14.5zm5.715-2.067A6.987 6.987 0 0 1 14.472 8.25H11.93c-.083 1.658-.66 3.162-1.573 4.183l.358.316zM8 1.5a6.486 6.486 0 0 1 2.22.383c-1.136 1.194-1.852 2.854-1.992 4.617H5.772c.14-1.763.856-3.423 1.992-4.617A6.486 6.486 0 0 1 8 1.5z"/>
                </svg>
                <p style="color: white; margin-left: 8px;">Halaman Web</p>
            </a>
        </li>

        <!-- Versi Android -->
        <li class="nav-item">
            <a href="/android" target="_blank" class="nav-link" style="display: flex; align-items: center; padding: 0.5rem 1rem 0.5rem 2rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" viewBox="0 0 16 16" style="flex-shrink: 0;">
                    <path d="M4.5 0a.5.5 0 0 1 .5.5V2h6V.5a.5.5 0 0 1 1 0V2a1 1 0 0 1 1 1v11a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V3a1 1 0 0 1 1-1V.5a.5.5 0 0 1 .5-.5zM6 4v9h4V4H6z"/>
                </svg>
                <p style="color: white; margin-left: 8px;">Versi Android</p>
            </a>
        </li>

        <!-- Administrator -->
        <li class="nav-item">
            <a href="/dashboard" class="nav-link" style="display: flex; align-items: center; padding: 0.5rem 1rem 0.5rem 2rem;">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" viewBox="0 0 16 16" style="flex-shrink: 0;">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                </svg>
                <p style="color: white; margin-left: 8px;">Administrator</p>
            </a>
        </li>
    </ul>
</li>


            @can('pemohonbantek')

            <li class="nav-header" style="color: white;">Dashboard Pemohon Bantek</li>
  <li class="nav-item has-treeview">
    <a href="/dashboard" class="nav-link">
        <!-- Icon Dokumen Checklist (Status Berkas) -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="nav-icon" viewBox="0 0 16 16">
            <path d="M10.854 6.146a.5.5 0 0 1 0 .708L7.707 10l-1.854-1.854a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zM13 5h-3a1 1 0 0 1-1-1V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V5z"/>
        </svg>
        <p style="color: white; margin-left: 8px; display: flex; align-items: center; justify-content: space-between; width: 100%;">
            Data Permohonan
            <i class="bi bi-chevron-right nav-arrow"></i>
        </p>
    </a>
    </li>
           <li class="nav-item has-treeview">

    <a href="#" class="nav-link">
        <!-- Icon Dokumen Checklist (Status Berkas) -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="nav-icon" viewBox="0 0 16 16">
            <path d="M10.854 6.146a.5.5 0 0 1 0 .708L7.707 10l-1.854-1.854a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zM13 5h-3a1 1 0 0 1-1-1V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V5z"/>
        </svg>
        <p style="color: white; margin-left: 8px; display: flex; align-items: center; justify-content: space-between; width: 100%;">
            Status Berkas
            <i class="bi bi-chevron-right nav-arrow"></i>
        </p>
    </a>

    <ul class="nav nav-treeview" style="margin-left: 15px;">
        <!-- Submenu: Asistensi -->
        <li class="nav-item">
            <a href="/bebantekpemohonasistensi" class="nav-link">
                <!-- Icon Clipboard (Asistensi) -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="nav-icon" viewBox="0 0 16 16">
                    <path d="M10 1.5v1h3a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-10a1 1 0 0 1 1-1h3v-1A1.5 1.5 0 0 1 7.5 0h1A1.5 1.5 0 0 1 10 1.5zM6 1.5V3h4V1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5z"/>
                </svg>
                <p style="color: white; margin-left: 8px;">Asistensi</p>
            </a>
        </li>


        <!-- Submenu: Permohonan -->
        <li class="nav-item">
            <a href="/bebantekpemohondinas" class="nav-link">
                <!-- Icon File EarMark (Permohonan) -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="nav-icon" viewBox="0 0 16 16">
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6.5L14 4.5zM9.5 0v4a1 1 0 0 0 1 1h4l-5-5z"/>
                </svg>
                <p style="color: white; margin-left: 8px;">Permohonan</p>
            </a>
        </li>
    </ul>
</li>


<li class="nav-item">
    <a href="/404" class="nav-link">
        <!-- Icon User -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="nav-icon" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3z"/>
            <path fill-rule="evenodd" d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        </svg>
        <p style="color: white; margin-left: 8px;">
            Profil Anda
            <i class="nav-arrow bi bi-chevron-right" style="margin-left: auto;"></i>
        </p>
    </a>
</li>


            @endcan

            @can('dinas')

            <li class="nav-header" style="color: white;">Dashboard Dinas</li>


           <li class="nav-item has-treeview">
    <a href="/datapermohonandinas" class="nav-link">
        <!-- Icon Dokumen Checklist (Status Berkas) -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="nav-icon" viewBox="0 0 16 16">
            <path d="M10.854 6.146a.5.5 0 0 1 0 .708L7.707 10l-1.854-1.854a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zM13 5h-3a1 1 0 0 1-1-1V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V5z"/>
        </svg>
        <p style="color: white; margin-left: 8px; display: flex; align-items: center; justify-content: space-between; width: 100%;">
            Data Permohonan
            <i class="bi bi-chevron-right nav-arrow"></i>
        </p>
    </a>
    </li>
           <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <!-- Icon Dokumen Checklist (Status Berkas) -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="nav-icon" viewBox="0 0 16 16">
            <path d="M10.854 6.146a.5.5 0 0 1 0 .708L7.707 10l-1.854-1.854a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zM13 5h-3a1 1 0 0 1-1-1V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V5z"/>
        </svg>
        <p style="color: white; margin-left: 8px; display: flex; align-items: center; justify-content: space-between; width: 100%;">
            Status Berkas
            <i class="bi bi-chevron-right nav-arrow"></i>
        </p>
    </a>

    <ul class="nav nav-treeview" style="margin-left: 15px;">
        <!-- Submenu: Asistensi -->
        <li class="nav-item">
            <a href="/bebantekakundinas" class="nav-link">
                <!-- Icon Clipboard (Asistensi) -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="nav-icon" viewBox="0 0 16 16">
                    <path d="M10 1.5v1h3a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-10a1 1 0 0 1 1-1h3v-1A1.5 1.5 0 0 1 7.5 0h1A1.5 1.5 0 0 1 10 1.5zM6 1.5V3h4V1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5z"/>
                </svg>
                <p style="color: white; margin-left: 8px;">Asistensi</p>
            </a>
        </li>

        <!-- Submenu: Permohonan -->
        <li class="nav-item">
            <a href="/bebantekakundinasberkas" class="nav-link">
                <!-- Icon File EarMark (Permohonan) -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="nav-icon" viewBox="0 0 16 16">
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6.5L14 4.5zM9.5 0v4a1 1 0 0 0 1 1h4l-5-5z"/>
                </svg>
                <p style="color: white; margin-left: 8px;">Permohonan</p>
            </a>
        </li>
    </ul>
</li>


<li class="nav-item">
    <a href="/404" class="nav-link">
        <!-- Icon User -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="nav-icon" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3z"/>
            <path fill-rule="evenodd" d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        </svg>
        <p style="color: white; margin-left: 8px;">
            Profil Dinas Anda
            <i class="nav-arrow bi bi-chevron-right" style="margin-left: auto;"></i>
        </p>
    </a>
</li>


            @endcan
            @can('konsultanbantek')

            <li class="nav-header" style="color: white;">Dashboard Konsultan Asistensi</li>


           <li class="nav-item has-treeview">
    <a href="/dashboard" class="nav-link">
        <!-- Icon Dokumen Checklist (Status Berkas) -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="nav-icon" viewBox="0 0 16 16">
            <path d="M10.854 6.146a.5.5 0 0 1 0 .708L7.707 10l-1.854-1.854a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zM13 5h-3a1 1 0 0 1-1-1V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V5z"/>
        </svg>
        <p style="color: white; margin-left: 8px; display: flex; align-items: center; justify-content: space-between; width: 100%;">
            Permohonan
            <i class="bi bi-chevron-right nav-arrow"></i>
        </p>
    </a>
    </li>
           <li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <!-- Icon Dokumen Checklist (Status Berkas) -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="nav-icon" viewBox="0 0 16 16">
            <path d="M10.854 6.146a.5.5 0 0 1 0 .708L7.707 10l-1.854-1.854a.5.5 0 1 1 .708-.708L7.5 8.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
            <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h5.5L14 4.5zM13 5h-3a1 1 0 0 1-1-1V1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V5z"/>
        </svg>
        <p style="color: white; margin-left: 8px; display: flex; align-items: center; justify-content: space-between; width: 100%;">
            Status Berkas
            <i class="bi bi-chevron-right nav-arrow"></i>
        </p>
    </a>

    <ul class="nav nav-treeview" style="margin-left: 15px;">
        <!-- Submenu: Asistensi -->
        <li class="nav-item">
            <a href="/bebantekdaftarkonsultan" class="nav-link">
                <!-- Icon Clipboard (Asistensi) -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="nav-icon" viewBox="0 0 16 16">
                    <path d="M10 1.5v1h3a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-10a1 1 0 0 1 1-1h3v-1A1.5 1.5 0 0 1 7.5 0h1A1.5 1.5 0 0 1 10 1.5zM6 1.5V3h4V1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5z"/>
                </svg>
                <p style="color: white; margin-left: 8px;">Daftar Asistensi</p>
            </a>
        </li>

        <li class="nav-item">
            <a href="/bebantekdaftarkonsultanproses" class="nav-link">
                <!-- Icon Clipboard (Asistensi) -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="nav-icon" viewBox="0 0 16 16">
                    <path d="M10 1.5v1h3a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1v-10a1 1 0 0 1 1-1h3v-1A1.5 1.5 0 0 1 7.5 0h1A1.5 1.5 0 0 1 10 1.5zM6 1.5V3h4V1.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5z"/>
                </svg>
                <p style="color: white; margin-left: 8px;">Kegiatan Asistensi</p>
            </a>
        </li>

        <!-- Submenu: Permohonan -->
        <li class="nav-item">
            <a href="/404" class="nav-link">
                <!-- Icon File EarMark (Permohonan) -->
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="nav-icon" viewBox="0 0 16 16">
                    <path d="M14 4.5V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h6.5L14 4.5zM9.5 0v4a1 1 0 0 0 1 1h4l-5-5z"/>
                </svg>
                <p style="color: white; margin-left: 8px;">Berkas Lainya</p>
            </a>
        </li>
    </ul>
</li>


<li class="nav-item">
    <a href="/404" class="nav-link">
        <!-- Icon User -->
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#ffffff" class="nav-icon" viewBox="0 0 16 16">
            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3z"/>
            <path fill-rule="evenodd" d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
        </svg>
        <p style="color: white; margin-left: 8px;">
            Profil Anda
            <i class="nav-arrow bi bi-chevron-right" style="margin-left: auto;"></i>
        </p>
    </a>
</li>


            @endcan

            @can('pemohon')

            <li class="nav-header" style="color: white;">Dashboard Pemohon</li>

            <li class="nav-item">

                <a href="#" class="nav-link">
                    <!-- Main Building Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="url(#deepseek-gradient)" class="nav-icon" viewBox="0 0 16 16">
                        <defs>
                            <linearGradient id="deepseek-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#0066FF;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#00BFFF;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
                        <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
                    </svg>
                    <p style="color: white; margin-left: 8px;">
                        Berkas Pemohon
                        <i class="nav-arrow bi bi-chevron-right" style="margin-left: auto;"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview" style="margin-left: 15px;">
    <li class="nav-item">
        <a href="/bestrukturdinas" class="nav-link">
            <i class="bi bi-geo-alt nav-icon" style="color: white;"></i>
            <p style="color: white; margin-left: 8px;">PBG/SLF</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/bestrukturdinas" class="nav-link">
            <i class="bi bi-journal-text nav-icon" style="color: white;"></i>
            <p style="color: white; margin-left: 8px;">Bantuan Teknis</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/pemohonkrk" class="nav-link">
            <i class="bi bi-card-list nav-icon" style="color: white;"></i>
            <p style="color: white; margin-left: 8px;">KRK</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/bestrukturdinas" class="nav-link">
            <i class="bi bi-house nav-icon" style="color: white;"></i>
            <p style="color: white; margin-left: 8px;">MBR</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/bestrukturdinas" class="nav-link">
            <i class="bi bi-image nav-icon" style="color: white;"></i>
            <p style="color: white; margin-left: 8px;">Bantuan Gambar</p>
        </a>
    </li>
</ul>

            </li>


              <li class="nav-item">

                <a href="/404" class="nav-link">
                    <!-- Main Building Icon -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="url(#deepseek-gradient)" class="nav-icon" viewBox="0 0 16 16">
                        <defs>
                            <linearGradient id="deepseek-gradient" x1="0%" y1="0%" x2="100%" y2="100%">
                                <stop offset="0%" style="stop-color:#0066FF;stop-opacity:1" />
                                <stop offset="100%" style="stop-color:#00BFFF;stop-opacity:1" />
                            </linearGradient>
                        </defs>
                        <path d="M14.763.075A.5.5 0 0 1 15 .5v15a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1-.5-.5V14h-1v1.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V10a.5.5 0 0 1 .342-.474L6 7.64V4.5a.5.5 0 0 1 .276-.447l8-4a.5.5 0 0 1 .487.022zM6 8.694 1 10.36V15h5V8.694zM7 15h2v-1.5a.5.5 0 0 1 .5-.5h2a.5.5 0 0 1 .5.5V15h2V1.309l-7 3.5V15z"/>
                        <path d="M2 11h1v1H2v-1zm2 0h1v1H4v-1zm-2 2h1v1H2v-1zm2 0h1v1H4v-1zm4-4h1v1H8V9zm2 0h1v1h-1V9zm-2 2h1v1H8v-1zm2 0h1v1h-1v-1zm2-2h1v1h-1V9zm0 2h1v1h-1v-1zM8 7h1v1H8V7zm2 0h1v1h-1V7zm2 0h1v1h-1V7zM8 5h1v1H8V5zm2 0h1v1h-1V5zm2 0h1v1h-1V5zm0-2h1v1h-1V3z"/>
                    </svg>
                    <p style="color: white; margin-left: 8px;">
                        Profil Anda
                        <i class="nav-arrow bi bi-chevron-right" style="margin-left: auto;"></i>
                    </p>
                </a>
</li>

            @endcan


            @can('superadmin')
            <li class="nav-header" style="color: white;">MAIN MENU</li>
            <li class="nav-item">

              <a href="#" class="nav-link">
    <!-- Ganti SVG dengan Bootstrap Icon -->
    <i class="bi bi-building nav-icon" style="color: white; font-size: 16px;"></i>

    <p style="color: white; margin-left: 8px;">
        PBG/SLF
        <i class="nav-arrow bi bi-chevron-right" style="margin-left: auto;"></i>
    </p>
</a>

                <ul class="nav nav-treeview" style="margin-left: 15px;">

    <li class="nav-item">
        <a href="/bestrukturdinas" class="nav-link">
            <i class="bi bi-info-circle nav-icon" style="color: white;"></i>
            <p style="color: white; margin-left: 8px;">Informasi SLF</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="/bekrkindex" class="nav-link">
            <i class="bi bi-card-list nav-icon" style="color: white;"></i>
            <p style="color: white; margin-left: 8px;">Permohonan PBG</p>
        </a>
    </li>

    <li class="nav-item">
        <a href="/bestrukturdinas" class="nav-link">
            <i class="bi bi-building nav-icon" style="color: white;"></i>
            <p style="color: white; margin-left: 8px;">Permohonan SLF</p>
        </a>
    </li>

</ul>

            </li>

            <!-- Tracking PBG -->
            <li class="nav-item">
             <a href="#" class="nav-link">
    <i class="bi bi-search nav-icon" style="color: white;"></i>
    <p style="color: white; margin-left: 8px; display: flex; align-items: center; justify-content: space-between; width: 100%;">
        Tracking Berkas
        <i class="nav-arrow bi bi-chevron-right" style="color: white;"></i>
    </p>
</a>

                <ul class="nav nav-treeview" style="margin-left: 15px;">
                     <li class="nav-item">
        <a href="/bestrukturdinas" class="nav-link">
            <i class="bi bi-geo-alt nav-icon" style="color: white;"></i>
            <p style="color: white; margin-left: 8px;">PBG/SLF</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/bestrukturdinas" class="nav-link">
            <i class="bi bi-journal-text nav-icon" style="color: white;"></i>
            <p style="color: white; margin-left: 8px;">Bantuan Teknis</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/pemohonkrk" class="nav-link">
            <i class="bi bi-card-list nav-icon" style="color: white;"></i>
            <p style="color: white; margin-left: 8px;">KRK</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/bestrukturdinas" class="nav-link">
            <i class="bi bi-house nav-icon" style="color: white;"></i>
            <p style="color: white; margin-left: 8px;">MBR</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/bestrukturdinas" class="nav-link">
            <i class="bi bi-image nav-icon" style="color: white;"></i>
            <p style="color: white; margin-left: 8px;">Bantuan Gambar</p>
        </a>
    </li>
                </ul>
            </li>

            <!-- Pendataan -->
            <li class="nav-item">
                <a href="#" class="nav-link">
    <i class="bi bi-folder nav-icon" style="color: white; font-size: 16px;"></i>
    <p style="color: white; margin-left: 8px; display: flex; align-items: center; justify-content: space-between; width: 100%;">
        Pendataan
        <i class="nav-arrow bi bi-chevron-right" style="margin-left: auto;"></i>
    </p>
</a>

                <ul class="nav nav-treeview" style="margin-left: 15px;">
    <li class="nav-item">
        <a href="/404" class="nav-link">
            <i class="bi bi-info-circle nav-icon" style="color: white; font-size: 16px;"></i>
            <p style="color: white; margin-left: 8px;">Informasi</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/404" class="nav-link">
            <i class="bi bi-building nav-icon" style="color: white; font-size: 16px;"></i>
            <p style="color: white; margin-left: 8px;">Pendataan</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/404" class="nav-link">
            <i class="bi bi-columns-gap nav-icon" style="color: white; font-size: 16px;"></i>
            <p style="color: white; margin-left: 8px;">Kartu Identitas</p>
        </a>
    </li>
</ul>

            </li>

            <!-- Bantek -->
            <li class="nav-item">
             <a href="#" class="nav-link">
    <i class="bi bi-tools nav-icon" style="color: white; font-size: 16px;"></i>
    <p style="color: white; margin-left: 8px;">
        Bantek
        <i class="nav-arrow bi bi-chevron-right" style="margin-left: auto;"></i>
    </p>
</a>

<ul class="nav nav-treeview" style="margin-left: 15px;">
    <li class="nav-item">
        <a href="/404" class="nav-link">
            <i class="bi bi-info-circle nav-icon" style="color: white; font-size: 16px;"></i>
            <p style="color: white; margin-left: 8px;">Informasi</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/bebantuanteknisindex" class="nav-link">
            <i class="bi bi-journal-text nav-icon" style="color: white; font-size: 16px;"></i>
            <p style="color: white; margin-left: 8px;">Permohonan</p>
        </a>
    </li>
</ul>
            </li>

            {{-- =====================================  --}}
         <!-- Sosialisasi -->
<!-- Sosialisasi -->
<li class="nav-item">
   <a href="#" class="nav-link" style="display: flex; align-items: center;">
    <i class="bi bi-megaphone nav-icon" style="color: white; font-size: 16px; flex-shrink: 0;"></i>
    <p style="color: white; margin: 0 0 0 8px; flex-grow: 1;">Sosialisasi</p>
    <i class="nav-arrow bi bi-chevron-right" style="color: white; margin-left: auto;"></i>
</a>


<ul class="nav nav-treeview" style="margin-left: 15px;">
   <li class="nav-item">
      <a href="/404" class="nav-link" style="display: flex; align-items: center;">
          <i class="bi bi-calendar-event nav-icon" style="color: white; font-size: 16px; flex-shrink: 0;"></i>
          <p style="color: white; margin: 0 0 0 8px;">Agenda</p>
      </a>
   </li>
   <li class="nav-item">
      <a href="/404" class="nav-link" style="display: flex; align-items: center;">
          <i class="bi bi-people nav-icon" style="color: white; font-size: 16px; flex-shrink: 0;"></i>
          <p style="color: white; margin: 0 0 0 8px;">Peserta</p>
      </a>
   </li>
</ul>

</li>

<!-- KRK -->
<li class="nav-item">
    <a href="#" class="nav-link" style="display: flex; align-items: center;">
    <i class="bi bi-journal-text nav-icon" style="color: white; font-size: 16px; flex-shrink: 0;"></i>
    <p style="color: white; margin: 0 0 0 8px; flex-grow: 1;">KRK</p>
    <i class="nav-arrow bi bi-chevron-right" style="color: white; margin-left: auto;"></i>
</a>

<ul class="nav nav-treeview" style="margin-left: 15px;">
    <li class="nav-item">
        <a href="/404" class="nav-link" style="display: flex; align-items: center;">
            <i class="bi bi-info-circle nav-icon" style="color: white; font-size: 16px; flex-shrink: 0;"></i>
            <p style="color: white; margin: 0 0 0 8px;">Informasi KRK</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/bekrkindex" class="nav-link" style="display: flex; align-items: center;">
            <i class="bi bi-folder2-open nav-icon" style="color: white; font-size: 16px; flex-shrink: 0;"></i>
            <p style="color: white; margin: 0 0 0 8px;">Berkas Pemohon</p>
        </a>
    </li>
</ul>

</li>

<!-- Penilik Bangunan Gedung -->
<li class="nav-item">
    <a href="#" class="nav-link" style="display: flex; align-items: center;">
    <i class="bi bi-person-circle nav-icon" style="color: white; font-size: 16px; flex-shrink: 0;"></i>
    <p style="color: white; margin: 0 0 0 8px; flex-grow: 1;">Penilik</p>
    <i class="nav-arrow bi bi-chevron-right" style="color: white; margin-left: auto;"></i>
</a>

    <ul class="nav nav-treeview" style="margin-left: 15px;">
    <li class="nav-item">
        <a href="/404" class="nav-link" style="display: flex; align-items: center;">
            <i class="bi bi-person-badge nav-icon" style="color: white; font-size: 16px; flex-shrink: 0;"></i>
            <p style="color: white; margin: 0 0 0 8px;">Informasi Penilik</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/404" class="nav-link" style="display: flex; align-items: center;">
            <i class="bi bi-folder2-open nav-icon" style="color: white; font-size: 16px; flex-shrink: 0;"></i>
            <p style="color: white; margin: 0 0 0 8px;">Berkas Penilik</p>
        </a>
    </li>
</ul>

</li>
<!-- MBG Gambar -->
<li class="nav-item">
    <a href="#" class="nav-link" style="display: flex; align-items: center; padding: 0.5rem 1rem;">
    <i class="bi bi-file-text nav-icon" style="color: white; font-size: 16px; flex-shrink: 0;"></i>
    <p style="color: white; margin: 0 0 0 8px; flex-grow: 1;">MBR Gambar</p>
    <i class="nav-arrow bi bi-chevron-right" style="margin-left: auto; color: white;"></i>
</a>


    <ul class="nav nav-treeview" style="margin-left: 15px;">
    <li class="nav-item">
        <a href="/404" class="nav-link" style="display: flex; align-items: center;">
            <i class="bi bi-person-badge nav-icon" style="color: white; font-size: 16px; flex-shrink: 0;"></i>
            <p style="color: white; margin: 0 0 0 8px;">Informasi MBR</p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/404" class="nav-link" style="display: flex; align-items: center;">
            <i class="bi bi-folder2-open nav-icon" style="color: white; font-size: 16px; flex-shrink: 0;"></i>
            <p style="color: white; margin: 0 0 0 8px;">Berkas Pemohon</p>
        </a>
    </li>
</ul>
</li>

<!-- Bantuan Gambar -->
<li class="nav-item">
  <a href="#" class="nav-link" style="display: flex; align-items: center; padding: 0.5rem 1rem;">
    <i class="bi bi-info-circle nav-icon" style="color: white; font-size: 16px; flex-shrink: 0;"></i>
    <p style="color: white; margin: 0 0 0 8px; flex-grow: 1;">Bantuan Gambar</p>
    <i class="nav-arrow bi bi-chevron-right" style="color: white; margin-left: auto;"></i>
</a>
    <ul class="nav nav-treeview" style="margin-left: 15px;">
    <li class="nav-item">
        <a href="/404" class="nav-link" style="display: flex; align-items: center;">
            <i class="bi bi-person-badge nav-icon" style="color: white; font-size: 16px; flex-shrink: 0;"></i>
            <p style="color: white; margin: 0 0 0 8px;">Informasi </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/404" class="nav-link" style="display: flex; align-items: center;">
            <i class="bi bi-folder2-open nav-icon" style="color: white; font-size: 16px; flex-shrink: 0;"></i>
            <p style="color: white; margin: 0 0 0 8px;">Berkas Pemohon</p>
        </a>
    </li>
</ul>


</li>

<!-- Hibah Bangunan -->
<li class="nav-item">
  <a href="#" class="nav-link" style="display: flex; align-items: center; padding: 0.5rem 1rem;">
    <i class="bi bi-info-circle nav-icon" style="color: white; font-size: 16px; flex-shrink: 0;"></i>
    <p style="color: white; margin: 0 0 0 8px; flex-grow: 1;">Hibah Bangunan</p>
    <i class="nav-arrow bi bi-chevron-right" style="margin-left: auto; color: white;"></i>
</a>
  <ul class="nav nav-treeview" style="margin-left: 15px;">
    <li class="nav-item">
        <a href="/404" class="nav-link" style="display: flex; align-items: center;">
            <i class="bi bi-person-badge nav-icon" style="color: white; font-size: 16px; flex-shrink: 0;"></i>
            <p style="color: white; margin: 0 0 0 8px;">Informasi </p>
        </a>
    </li>
    <li class="nav-item">
        <a href="/404" class="nav-link" style="display: flex; align-items: center;">
            <i class="bi bi-folder2-open nav-icon" style="color: white; font-size: 16px; flex-shrink: 0;"></i>
            <p style="color: white; margin: 0 0 0 8px;">Berkas Pemohon</p>
        </a>
    </li>
</ul>
</li>

@endcan
            {{-- ---------------------------------------------  --}}

            <li class="nav-header" style="color: white;">LOGOUT</li>

            <li class="nav-item">
                {{-- <li class="nav-item"> --}}
                    <li class="nav-item">
                        <form action="/logout" method="POST" style="display: inline;">
                            @csrf  <!-- This is for CSRF protection -->
                            <button type="submit" class="nav-link" style="background: none; border: none; color: red;">
                                <!-- Ikon untuk Logout -->
                                <i class="nav-icon bi bi-box-arrow-right text-danger"></i> <!-- Ikon untuk Logout -->
                                <p style="color: red">Logout</p>
                            </button>
                        </form>
                    </li>

                  {{-- </li> --}}
                  </li>

            </ul>
            <!--end::Sidebar Menu-->
          </nav>
        </div>
        <!--end::Sidebar Wrapper-->
      </aside>
      <!--end::Sidebar-->

      <script>
        // Toggle sub-menu saat item Dashboard diklik
        $(".nav-item > a").click(function (e) {
          // Pastikan kita hanya menampilkan sub-menu yang terkait dengan item yang diklik
          var $this = $(this).next(".nav-treeview");

          // Cek apakah sub-menu sudah terbuka
          if ($this.is(":visible")) {
            $this.slideUp(); // Tutup jika terbuka
          } else {
            $(".nav-treeview").slideUp(); // Tutup semua sub-menu lainnya
            $this.slideDown(); // Buka sub-menu yang diklik
          }
        });
      </script>
