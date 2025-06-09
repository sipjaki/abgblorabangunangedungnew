
{{-- <div id="Menu-bar" class="fixed bottom-[24px] px-[18px] max-w-[640px] w-full z-30" style="margin-bottom: -23px;"> --}}
    <div id="Menu-bar" style="position: fixed; bottom: 24px; left: 0; right: 0; z-index: 30; margin-bottom: -25px; max-width: 640px; width: 100%; margin-left: auto; margin-right: auto; padding: 0px 14px 0px 18px; background-color: white; display: flex; justify-content: space-between; align-items: center; border-radius: 0; box-shadow: 0 -2px 8px rgba(0,0,0,0.1); font-family: sans-serif;">

   <!-- Wrapper Navigasi Bawah -->
<div class="relative w-full max-w-md mx-auto">
  <div class="bg-white p-3 rounded-full flex items-center justify-between gap-4 shadow-[0_8px_30px_0_#0A093212]">

    <!-- Item 1 -->
    <a href="/dashboard">
      <div class="flex flex-col items-center gap-1">
        <div class="w-6 h-6">
          <img src="/assets/android/icons/setting-linear-grey.svg" alt="Berkas">
        </div>
        <p class="text-xs font-medium text-[#757C98]">Dashboard</p>
      </div>
    </a>

    <!-- Item 2 -->
    <a href="/404">
      <div class="flex flex-col items-center gap-1">
        <div class="w-6 h-6">
          <img src="/assets/android/icons/home-nonactive.svg" alt="Menu">
        </div>
        <p class="text-xs font-medium text-[#757C98]">Tracking</p>
      </div>
    </a>
    <a href="/">
        <div class="w-[60px] h-[60px] flex items-center justify-center rounded-lg bg-[#E8EDF5] shadow-[0_4px_12px_rgba(27,51,88,0.2)]">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="#1B3358" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 9.75L12 3l9 6.75v10.5a.75.75 0 01-.75.75H3.75A.75.75 0 013 20.25V9.75z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 22.5V12h6v10.5" />
            </svg>
        </div>
    </a>

    <!-- Item 4 -->
    <a href="/404">
      <div class="flex flex-col items-center gap-1">
        <div class="w-6 h-6">
          <img src="/assets/android/icons/gallery-export.svg" alt="Informasi">
        </div>
        <p class="text-xs font-medium text-[#757C98]">Informasi</p>
      </div>
    </a>

    <!-- Item 5 - Login -->
    <a href="/login" id="login-icon" style="display: none;">
      <div class="flex flex-col items-center gap-1">
        <div class="w-6 h-6">
          <img src="/assets/android/icons/key-grey.svg" alt="Login">
        </div>
        <p class="text-xs font-medium text-[#757C98]">Masuk</p>
      </div>
    </a>

    <!-- Item 6 - Pengaturan -->
    <a href="/404" id="settings-icon" style="display: none;">
      <div class="flex flex-col items-center gap-1">
        <div class="w-6 h-6">
          <img src="/assets/android/icons/settings-nonactive.svg" alt="Pengaturan">
        </div>
        <p class="text-xs font-medium text-[#757C98]">Pengaturan</p>
      </div>
    </a>
  </div>

  <!-- Ikon Tengah (MAP) - Floating -->
  <a href="/" class="absolute left-1/2 -translate-x-1/2 -top-4">
    <div class="w-[48px] h-[48px] rounded-full bg-white shadow-md flex items-center justify-center">
      <img src="/assets/android/icons/Map.svg" alt="Map" class="w-6 h-6">
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
