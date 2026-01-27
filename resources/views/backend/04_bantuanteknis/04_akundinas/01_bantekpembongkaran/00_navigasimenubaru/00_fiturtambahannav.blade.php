@canany(['superadmin', 'admin'])
<div class="card" style="background-color: #eaf6fb; border: 1px solid #d0e3ed; border-radius: 12px; padding: 20px; box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05); margin-bottom: 30px;">
   <h6 style="text-align: center; color: #003049; margin-bottom: 15px; display: flex; justify-content: center; align-items: center; gap: 8px; font-family: 'Poppins', sans-serif; font-weight: 600;">
    <i class="bi bi-building" style="color:#0077b6;"></i>
    <span>Jenis Permohonan</span>
</h6>


<div class="form-modern shadow-sm border-0">
    <div class="card-body" style="overflow-x: auto; white-space: nowrap; padding: 16px; background: #f0f8ff; display: flex; flex-wrap: wrap; gap: 10px; justify-content: center;">
        {{-- <a href="#" class="text-decoration-none">
            <div
                class="px-3 py-2 rounded shadow-sm d-flex align-items-center"
                style="
                    background: linear-gradient(145deg, #e1f0ff, #d6e9ff);
                    color: #003366;
                    transition: all 0.3s ease;
                    border: 1px solid #c8dfff;
                    border-radius: 12px;
                    min-width: max-content;
                "
                onmouseover="this.style.background='white'; this.style.color='black';"
                onmouseout="this.style.background='linear-gradient(145deg, #e1f0ff, #d6e9ff)'; this.style.color='#003366';"
            >
                <i class="bi bi-collection me-2"></i> Semua Data
            </div>
        </a> --}}

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
@endcanany
