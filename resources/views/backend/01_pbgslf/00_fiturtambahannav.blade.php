{{-- @canany(['superadmin', 'admin'])
<div class="card" style="background-color: #eaf6fb; border: 1px solid #d0e3ed; border-radius: 12px; padding: 20px; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05); margin-bottom: 30px;">
   <h6 style="text-align: center; color: #003049; margin-bottom: 15px; display: flex; justify-content: center; align-items: center; gap: 8px; font-family: 'Poppins', sans-serif; font-weight: 600;">
    <i class="bi bi-building" style="color:#0077b6;"></i>
    <span>Jenis Permohonan</span>
</h6>


<div class="form-modern shadow-sm border-0">
    <div class="card-body form-modern" style="overflow-x: auto; white-space: nowrap; padding: 16px; background: #f0f8ff; display: flex; flex-wrap: wrap; gap: 10px; justify-content: center;"
    >
        <a href="/bepbgslfindexslf" class="text-decoration-none">
            <div
                class="button-modern"
                >
                <i class="bi bi-building me-2"></i> PBG
            </div>
        </a>

        <a href="/bepbgslfindexslfper2" class="text-decoration-none">
            <div
            class="button-modern"
            >
            <i class="bi bi-check2-square me-2"></i> SLF
        </div>
        </a>

        <a href="/bepbgslfindexslfper3" class="text-decoration-none">
            <div
            class="button-modern"
            >
            <i class="bi bi-file-earmark-text me-2"></i> SBKBG
        </div>
    </a>

    <a href="/bepbgslfindexslfper4" class="text-decoration-none">
        <div
        class="button-modern"
        >
        <i class="bi bi-house-door me-2"></i> RTB
    </div>
</a>

<a href="/bepbgslfindexslfper5" class="text-decoration-none">
    <div
    class="button-modern"
            >
                <i class="bi bi-card-checklist me-2"></i> Pendataan
            </div>
        </a>
    </div>
</div>

</div>
@endcanany --}}

@canany(['superadmin', 'admin'])
<!-- Kartu utama dengan tema putih bersih dan aksen biru segar -->
<div class="card border-0 rounded-4 shadow-sm" style="background-color: #ffffff; margin-bottom: 30px; overflow: hidden;">
    <!-- Header dengan aksen biru gradien lembut -->
    <div class="card-header border-0 py-3 px-4" style="background: linear-gradient(98deg, #f1f9ff 0%, #ffffff 100%); border-bottom: 2px solid #e1f0fa;">
        <h6 class="mb-0 d-flex align-items-center gap-2" style="color: #0a2c3e; font-family: 'Poppins', sans-serif; font-weight: 600; font-size: 1.1rem; letter-spacing: 0.3px;">
            <i class="bi bi-building" style="color: #1e7bb0; font-size: 1.4rem;"></i>
            <span>Jenis Permohonan</span>
        </h6>
    </div>

    <!-- Badan kartu dengan container tombol fleksibel -->
    <div class="card-body bg-white py-4 px-3">
        <!-- Container tombol dengan scroll horizontal jika perlu, dan pembungkusan rapi -->
        <div class="d-flex flex-wrap gap-3 justify-content-center justify-content-md-start" style="min-height: 70px;">

            <!-- Tombol PBG -->
            <a href="/bepbgslfindexslf" class="text-decoration-none d-inline-block" title="PBG">
                <div class="d-flex align-items-center gap-2 px-4 py-3 rounded-4 shadow-sm border"
                     style="background-color: #ffffff; border-color: #d9eaf5 !important; transition: all 0.2s ease; color: #145a86; min-width: 120px; justify-content: center;"
                     onmouseover="this.style.backgroundColor='#f0f9ff'; this.style.borderColor='#7fc1e0'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 12px 20px -10px rgba(21,112,174,0.3)';"
                     onmouseout="this.style.backgroundColor='#ffffff'; this.style.borderColor='#d9eaf5'; this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 10px rgba(0,40,70,0.05)';">
                    <i class="bi bi-building fs-5" style="color: #1f78b4;"></i>
                    <span class="fw-semibold" style="font-size: 0.95rem; color: #144d6f;">PBG</span>
                </div>
            </a>

            <!-- Tombol SLF -->
            <a href="/bepbgslfindexslfper2" class="text-decoration-none d-inline-block" title="SLF">
                <div class="d-flex align-items-center gap-2 px-4 py-3 rounded-4 shadow-sm border"
                     style="background-color: #ffffff; border-color: #d9eaf5 !important; transition: all 0.2s ease; color: #145a86; min-width: 120px; justify-content: center;"
                     onmouseover="this.style.backgroundColor='#f0f9ff'; this.style.borderColor='#7fc1e0'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 12px 20px -10px rgba(21,112,174,0.3)';"
                     onmouseout="this.style.backgroundColor='#ffffff'; this.style.borderColor='#d9eaf5'; this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 10px rgba(0,40,70,0.05)';">
                    <i class="bi bi-check2-square fs-5" style="color: #1f78b4;"></i>
                    <span class="fw-semibold" style="font-size: 0.95rem; color: #144d6f;">SLF</span>
                </div>
            </a>

            <!-- Tombol SBKBG -->
            <a href="/bepbgslfindexslfper3" class="text-decoration-none d-inline-block" title="SBKBG">
                <div class="d-flex align-items-center gap-2 px-4 py-3 rounded-4 shadow-sm border"
                     style="background-color: #ffffff; border-color: #d9eaf5 !important; transition: all 0.2s ease; color: #145a86; min-width: 120px; justify-content: center;"
                     onmouseover="this.style.backgroundColor='#f0f9ff'; this.style.borderColor='#7fc1e0'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 12px 20px -10px rgba(21,112,174,0.3)';"
                     onmouseout="this.style.backgroundColor='#ffffff'; this.style.borderColor='#d9eaf5'; this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 10px rgba(0,40,70,0.05)';">
                    <i class="bi bi-file-earmark-text fs-5" style="color: #1f78b4;"></i>
                    <span class="fw-semibold" style="font-size: 0.95rem; color: #144d6f;">SBKBG</span>
                </div>
            </a>

            <!-- Tombol RTB -->
            <a href="/bepbgslfindexslfper4" class="text-decoration-none d-inline-block" title="RTB">
                <div class="d-flex align-items-center gap-2 px-4 py-3 rounded-4 shadow-sm border"
                     style="background-color: #ffffff; border-color: #d9eaf5 !important; transition: all 0.2s ease; color: #145a86; min-width: 120px; justify-content: center;"
                     onmouseover="this.style.backgroundColor='#f0f9ff'; this.style.borderColor='#7fc1e0'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 12px 20px -10px rgba(21,112,174,0.3)';"
                     onmouseout="this.style.backgroundColor='#ffffff'; this.style.borderColor='#d9eaf5'; this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 10px rgba(0,40,70,0.05)';">
                    <i class="bi bi-house-door fs-5" style="color: #1f78b4;"></i>
                    <span class="fw-semibold" style="font-size: 0.95rem; color: #144d6f;">RTB</span>
                </div>
            </a>

            <!-- Tombol Pendataan -->
            <a href="/bepbgslfindexslfper5" class="text-decoration-none d-inline-block" title="Pendataan">
                <div class="d-flex align-items-center gap-2 px-4 py-3 rounded-4 shadow-sm border"
                     style="background-color: #ffffff; border-color: #d9eaf5 !important; transition: all 0.2s ease; color: #145a86; min-width: 120px; justify-content: center;"
                     onmouseover="this.style.backgroundColor='#f0f9ff'; this.style.borderColor='#7fc1e0'; this.style.transform='translateY(-2px)'; this.style.boxShadow='0 12px 20px -10px rgba(21,112,174,0.3)';"
                     onmouseout="this.style.backgroundColor='#ffffff'; this.style.borderColor='#d9eaf5'; this.style.transform='translateY(0)'; this.style.boxShadow='0 4px 10px rgba(0,40,70,0.05)';">
                    <i class="bi bi-card-checklist fs-5" style="color: #1f78b4;"></i>
                    <span class="fw-semibold" style="font-size: 0.95rem; color: #144d6f;">Pendataan</span>
                </div>
            </a>
        </div>
    </div>
</div>

<!-- CSS tambahan untuk efek micro-interaction mulus (opsional, tetap bisa inline) -->
<style>
    /* Memastikan tombol memiliki transisi yang sudah didefinisikan inline,
       namun kita tambahkan fallback jika ingin lebih halus */
    .card .d-flex.align-items-center {
        transition: background-color 0.2s ease, border-color 0.2s ease, transform 0.2s ease, box-shadow 0.2s ease !important;
        cursor: pointer;
        border-width: 1.5px;
    }
    /* Menjaga font tetap konsisten */
    .card-header h6 {
        font-family: 'Poppins', system-ui, -apple-system, 'Segoe UI', Roboto, sans-serif;
    }
    /* Untuk layar kecil, padding tombol sedikit dikurangi */
    @media (max-width: 480px) {
        .card .d-flex.align-items-center {
            padding-left: 1rem !important;
            padding-right: 1rem !important;
            min-width: 100px !important;
        }
    }
</style>
@endcanany
