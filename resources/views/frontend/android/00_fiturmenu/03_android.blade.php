<div id="Menu-bar" style="position: fixed; bottom: 24px; left: 0; right: 0; z-index: 30; margin-bottom: -25px; max-width: 640px; width: 100%; margin-left: auto; margin-right: auto; padding: 0px 14px 0px 18px; background-color: transparent; display: flex; justify-content: space-between; align-items: center; border-radius: 0; font-family: 'Segoe UI', system-ui, sans-serif;">

   <!-- Wrapper Navigasi Bawah -->
<div class="relative w-full max-w-md mx-auto">
  <div class="bg-[#1B3358] p-3 rounded-full flex items-center justify-between gap-4 shadow-[0_8px_30px_0_rgba(10,25,70,0.25)] backdrop-blur-sm border border-[rgba(255,255,255,0.1)]">

    <!-- Item 1 -->
    <a href="/dashboard" class="group">
      <div class="flex flex-col items-center gap-1">
        <div class="w-6 h-6 flex items-center justify-center">
          <img src="/assets/android/icons/setting-linear-grey.svg" alt="Berkas" class="group-hover:brightness-125 transition-all">
        </div>
        <p class="text-xs font-medium text-[#A3B1D3] group-hover:text-white transition-colors">Dashboard</p>
      </div>
    </a>

    <!-- Item 2 -->
    <a href="/404" class="group">
      <div class="flex flex-col items-center gap-1">
        <div class="w-6 h-6 flex items-center justify-center">
          <img src="/assets/android/icons/home-nonactive.svg" alt="Menu" class="group-hover:brightness-125 transition-all">
        </div>
        <p class="text-xs font-medium text-[#A3B1D3] group-hover:text-white transition-colors">Tracking</p>
      </div>
    </a>

    <!-- Central Home Button -->
    <a href="/" class="relative -top-8 group">
        <div class="w-[60px] h-[60px] flex items-center justify-center rounded-full bg-[#2A4B8A] shadow-[0_4px_20px_rgba(42,75,138,0.5)] group-hover:shadow-[0_6px_24px_rgba(42,75,138,0.7)] transition-all">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#FFFFFF" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 9.75L12 3l9 6.75v10.5a.75.75 0 01-.75.75H3.75A.75.75 0 013 20.25V9.75z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 22.5V12h6v10.5" />
            </svg>
            <div class="absolute inset-0 rounded-full border-2 border-[rgba(255,255,255,0.2)] pointer-events-none"></div>
        </div>
    </a>

    <!-- Item 4 -->
    <a href="/404" class="group">
      <div class="flex flex-col items-center gap-1">
        <div class="w-6 h-6 flex items-center justify-center">
          <img src="/assets/android/icons/gallery-export.svg" alt="Informasi" class="group-hover:brightness-125 transition-all">
        </div>
        <p class="text-xs font-medium text-[#A3B1D3] group-hover:text-white transition-colors">Informasi</p>
      </div>
    </a>

    <!-- Item 5 - Login -->
    <a href="/login" id="login-icon" style="display: none;" class="group">
      <div class="flex flex-col items-center gap-1">
        <div class="w-6 h-6 flex items-center justify-center">
          <img src="/assets/android/icons/key-grey.svg" alt="Login" class="group-hover:brightness-125 transition-all">
        </div>
        <p class="text-xs font-medium text-[#A3B1D3] group-hover:text-white transition-colors">Masuk</p>
      </div>
    </a>

    <!-- Item 6 - Pengaturan -->
    <a href="/404" id="settings-icon" style="display: none;" class="group">
      <div class="flex flex-col items-center gap-1">
        <div class="w-6 h-6 flex items-center justify-center">
          <img src="/assets/android/icons/settings-nonactive.svg" alt="Pengaturan" class="group-hover:brightness-125 transition-all">
        </div>
        <p class="text-xs font-medium text-[#A3B1D3] group-hover:text-white transition-colors">Pengaturan</p>
      </div>
    </a>
  </div>

  <!-- Floating Map Button -->
  <a href="/" class="absolute left-1/2 -translate-x-1/2 -top-4 group">
    <div class="w-[48px] h-[48px] rounded-full bg-[#2A4B8A] shadow-[0_4px_12px_rgba(42,75,138,0.4)] flex items-center justify-center group-hover:bg-[#3A5B9A] transition-all border border-[rgba(255,255,255,0.15)]">
      <img src="/assets/android/icons/Map.svg" alt="Map" class="w-6 h-6 brightness-0 invert">
    </div>
  </a>
</div>

<!-- Script Login -->
<script>
  // Simulasi status login user (ubah sesuai dengan implementasi asli)
  var isLoggedIn = false;

  window.onload = function () {
    document.getElementById('login-icon').style.display = isLoggedIn ? 'none' : 'block';
    document.getElementById('settings-icon').style.display = isLoggedIn ? 'block' : 'none';
  };
</script>

</div>
