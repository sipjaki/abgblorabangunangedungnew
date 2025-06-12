<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\DatajakonController;
use App\Http\Controllers\FedashboardController;
use App\Http\Controllers\GiskbbController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PeraturanController;
use App\Http\Controllers\SkktenagakerjaController;
use App\Http\Controllers\StrukturController;
use App\Http\Controllers\UijkController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\BantuanteknisController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\KrkController;
use App\Http\Controllers\PendataanBangunanGedungController;
use App\Http\Controllers\SettingmenuController;
use Illuminate\Support\Facades\Route;


use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ------------------------- FRONTEND HALAMAN UTAMA ABG BLORA BANGUNAN GEDUNG --------------------------

Route::get('/', [FedashboardController::class, 'index']);
Route::get('/web', [FedashboardController::class, 'web']);
// Route::post('/qapertanyaanstore', [FedashboardController::class, 'createbarustorepertanyaan'])->middleware('auth')->name('create.storeqapertanyaanbaru');
// Route::post('/qapertanyaanstorebaru', [FedashboardController::class, 'createstorepertanyaanpublik'])->middleware('auth')->name('createpertanyaanstorebaru');
// Route::post('/qapertanyaanstorebaru', [AdministratorController::class, 'createstorepertanyaanpublik'])->name('createpertanyaanstorebaru');

// 01_ MENU PBG SLF
// ----------------------------------------------------------------------------------------
Route::get('/respbgslfindex', [FedashboardController::class, 'menurespbgslfindex']);

// 03_ MENU BANGUNAN GEDUNG ANDROID
// ----------------------------------------------------------------------------------------
Route::get('/resbgindex', [FedashboardController::class, 'menuresbangunangedungindex']);

// 04_ MENU BANTUAN TEKNIS
// ----------------------------------------------------------------------------------------
Route::get('/resbantekindex', [FedashboardController::class, 'resbantekindex']);
Route::get('/resbantekpermohonan', [FedashboardController::class, 'resbantekpermohonan'])->middleware('auth');

// WEB 03_ MENU BANGUNAN GEDUNG ANDROID
// ----------------------------------------------------------------------------------------
Route::get('/pendataankicbangunangedung', [PendataanBangunanGedungController::class, 'datakicbangunan']);
Route::get('/databangunangedung', [PendataanBangunanGedungController::class, 'databangunangedung']);
Route::get('/databangunangedung/{namabangunan}', [PendataanBangunanGedungController::class, 'databangunangedungshow']);
Route::get('/statistikbg', [PendataanBangunanGedungController::class, 'statistikbg']);


// WEB 06_ MENU KRK BANGUNAN GEDUNG
// ----------------------------------------------------------------------------------------
Route::get('/informasikrk', [KrkController::class, 'informasikrk']);
Route::get('/permohonankrk', [KrkController::class, 'permohonankrk'])->middleware('auth');

Route::get('/pemohonkrk', [KrkController::class, 'pemohonkrk'])->middleware('auth');

// MENU 02 PERMOHONAN KRK USAHA
Route::get('/permohonankrkusaha', [KrkController::class, 'permohonankrkusaha'])->name('permohonan.krkusaha');
Route::post('/permohonankrkusaha/create', [KrkController::class, 'permohonankrkusahacreate'])->name('permohonan.krkusahacreate');
Route::post('/berkasusaha/{id}/validate', [KrkController::class, 'validateBerkasusaha'])->name('berkasusaha.validate');
Route::get('/permohonanpengesahanusaha/{id}', [KrkController::class, 'permohonanpengesahanusaha'])->name('permohonan.pengesahanusaha');
Route::post('/permohonanpengesahanusahacreate/{id}', [KrkController::class, 'permohonanpengesahanusahacreate'])->name('permohonan.pengesahanusahacreate');

// Route::get('/permohonankrk', [KrkController::class, 'permohonankrk'])->middleware('auth');

// MENU 02 PERMOHONAN KRK HUNIAN
Route::get('/permohonankrkhunian', [KrkController::class, 'permohonankrkhunian'])->name('permohonan.krkhunian');
Route::post('/permohonankrkhunian/create', [KrkController::class, 'permohonankrkhuniancreate'])->name('permohonan.krkhuniancreate');
Route::post('/berkashunian/{id}/validate', [KrkController::class, 'validateBerkashunian'])->name('berkashunian.validate');
// Route::get('/permohonankrk', [KrkController::class, 'permohonankrk'])->middleware('auth');


// =================================================================================================================================
// MENU BACKEND ABG BLORA BANGUNAN GEDUNG KABUPATEN BLORA
// MENU 06 KRK BANGUNAN GEDUNG
Route::get('/bekrkindex', [KrkController::class, 'bekrkindex']);
Route::get('/bekrkusaha', [KrkController::class, 'bekrkusaha'])->name('krkusaha.index');
Route::get('/bekrkhunian', [KrkController::class, 'bekrkhunian']);


// MENU 04 BANTUAN TEKNIS
Route::get('/bebantuanteknisindex', [BantuanteknisController::class, 'bebantuanteknisindex'])->middleware('auth')->name('bebantuanteknisindexmenu');
Route::get('/bebantuanteknis', [BantuanteknisController::class, 'bebantuanteknisberkas'])->middleware('auth')->name('bebantuanteknissemua');
Route::get('/bebantuanteknisassistensi', [BantuanteknisController::class, 'bebantuanteknisassistensi'])->middleware('auth')->name('bebantuanteknisassistensi');
// Route::delete('/bebantuanteknisdelete/{id}', [AdministratorController::class, 'bebantuanteknisdelete'])->middleware('auth')->name('delete.bantuanteknis');
Route::delete('/bebantuanteknisdelete/{id}', [BantuanteknisController::class, 'bebantuanteknisdelete'])->middleware('auth')->name('delete.bantuanteknis');

Route::get('/beasistensishow/{id}', [BantuanteknisController::class, 'beasistensishow'])->middleware('auth')->name('beasistensishow.show');
Route::get('/bebantuanteknisshow/{id}', [BantuanteknisController::class, 'bebantuanteknisberkasshow'])->middleware('auth')->name('bebantuanteknis.show');
// Route::get('/bebantuanteknisshowvalidasi/{id}', [BantuanteknisController::class, 'bebantuanteknisberkasshow'])->middleware('auth')->name('validasidokumenbantek');
// VERIFIKASI BANTUAN TEKNIS
Route::put('/validasidokumenbantek/{id}', [BantuanteknisController::class, 'validasidokumenberkasbantek'])->middleware('auth')->name('validasidokumenbantek');


Route::put('/validasiberkas1permohonan1/{id}', [BantuanteknisController::class, 'valsuratpermohonan1'])->name('validasiberkas1.update');
Route::put('/validasiberkas1permohonan2/{id}', [BantuanteknisController::class, 'valsuratpermohonan2'])->name('validasiberkas2.update');
Route::put('/validasiberkas1permohonan3/{id}', [BantuanteknisController::class, 'valsuratpermohonan3'])->name('validasiberkas3.update');
Route::put('/validasiberkas1permohonan4/{id}', [BantuanteknisController::class, 'valsuratpermohonan4'])->name('validasiberkas4.update');

// SURAT PERMOHONAN 2
Route::get('/bepenelitikontrak', [BantuanteknisController::class, 'bepenelitikontrak'])->middleware('auth')->name('bepenelitikontrakindex');

Route::put('/validasiberkas2permohonan1/{id}', [BantuanteknisController::class, 'valsurat2permohonan1'])->name('valsurat2permohonan1.update');
Route::put('/validasiberkas2permohonan2/{id}', [BantuanteknisController::class, 'valsurat2permohonan2'])->name('valsurat2permohonan2.update');
Route::put('/validasiberkas2permohonan3/{id}', [BantuanteknisController::class, 'valsurat2permohonan3'])->name('valsurat2permohonan3.update');
Route::put('/validasiberkas2permohonan4/{id}', [BantuanteknisController::class, 'valsurat2permohonan4'])->name('valsurat2permohonan4.update');

// SURAT PERMOHONAN 3
Route::get('/beperhitunganpenyusutan', [BantuanteknisController::class, 'beperhitunganpenyusutan'])->middleware('auth')->name('beperhitunganpenyusutanindex');

Route::put('/validasiberkas3permohonan1/{id}', [BantuanteknisController::class, 'valsurat3permohonan1'])->name('valsurat3permohonan1.update');
Route::put('/validasiberkas3permohonan2/{id}', [BantuanteknisController::class, 'valsurat3permohonan2'])->name('valsurat3permohonan2.update');
Route::put('/validasiberkas3permohonan3/{id}', [BantuanteknisController::class, 'valsurat3permohonan3'])->name('valsurat3permohonan3.update');
Route::put('/validasiberkas3permohonan4/{id}', [BantuanteknisController::class, 'valsurat3permohonan4'])->name('valsurat3permohonan4.update');

// SURAT PERMOHONAN 4
Route::get('/beperhitungankerusakan', [BantuanteknisController::class, 'beperhitungankerusakan'])->middleware('auth')->name('beperhitungankerusakanindex');

Route::put('/validasiberkas4permohonan1/{id}', [BantuanteknisController::class, 'valsurat4permohonan1'])->name('valsurat4permohonan1.update');
Route::put('/validasiberkas4permohonan2/{id}', [BantuanteknisController::class, 'valsurat4permohonan2'])->name('valsurat4permohonan2.update');
Route::put('/validasiberkas4permohonan3/{id}', [BantuanteknisController::class, 'valsurat4permohonan3'])->name('valsurat4permohonan3.update');
Route::put('/validasiberkas4permohonan4/{id}', [BantuanteknisController::class, 'valsurat4permohonan4'])->name('valsurat4permohonan4.update');

// SURAT PERMOHONAN 5
Route::get('/beperhitunganbgn', [BantuanteknisController::class, 'beperhitunganbgn'])->middleware('auth')->name('beperhitunganbgnindex');

Route::put('/validasiberkas5permohonan1/{id}', [BantuanteknisController::class, 'valsurat5permohonan1'])->name('valsurat5permohonan1.update');
Route::put('/validasiberkas5permohonan2/{id}', [BantuanteknisController::class, 'valsurat5permohonan2'])->name('valsurat5permohonan2.update');
Route::put('/validasiberkas5permohonan3/{id}', [BantuanteknisController::class, 'valsurat5permohonan3'])->name('valsurat5permohonan3.update');
Route::put('/validasiberkas5permohonan4/{id}', [BantuanteknisController::class, 'valsurat5permohonan4'])->name('valsurat5permohonan4.update');

// SURAT PERMOHONAN 6
Route::get('/bekonstruksiperhitunganbgn', [BantuanteknisController::class, 'bekonstruksiperhitunganbgn'])->middleware('auth')->name('bekonstruksiperhitunganbgnindex');

Route::put('/validasiberkas6permohonan1/{id}', [BantuanteknisController::class, 'valsurat6permohonan1'])->name('valsurat6permohonan1.update');
Route::put('/validasiberkas6permohonan2/{id}', [BantuanteknisController::class, 'valsurat6permohonan2'])->name('valsurat6permohonan2.update');
Route::put('/validasiberkas6permohonan3/{id}', [BantuanteknisController::class, 'valsurat6permohonan3'])->name('valsurat6permohonan3.update');
Route::put('/validasiberkas6permohonan4/{id}', [BantuanteknisController::class, 'valsurat6permohonan4'])->name('valsurat6permohonan4.update');


// SURAT PERMOHONAN 7
Route::get('/beserahterima', [BantuanteknisController::class, 'beserahterima'])->middleware('auth')->name('beserahterimaindex');

Route::put('/validasiberkas7permohonan1/{id}', [BantuanteknisController::class, 'valsurat7permohonan1'])->name('valsurat7permohonan1.update');
Route::put('/validasiberkas7permohonan2/{id}', [BantuanteknisController::class, 'valsurat7permohonan2'])->name('valsurat7permohonan2.update');
Route::put('/validasiberkas7permohonan3/{id}', [BantuanteknisController::class, 'valsurat7permohonan3'])->name('valsurat7permohonan3.update');
Route::put('/validasiberkas7permohonan4/{id}', [BantuanteknisController::class, 'valsurat7permohonan4'])->name('valsurat7permohonan4.update');


// SURAT PERMOHONAN 8
Route::get('/bepersontimteknis', [BantuanteknisController::class, 'bepersontimteknis'])->middleware('auth')->name('bepersontimteknisindex');

Route::put('/validasiberkas8permohonan1/{id}', [BantuanteknisController::class, 'valsurat8permohonan1'])->name('valsurat8permohonan1.update');
Route::put('/validasiberkas8permohonan2/{id}', [BantuanteknisController::class, 'valsurat8permohonan2'])->name('valsurat8permohonan2.update');
Route::put('/validasiberkas8permohonan3/{id}', [BantuanteknisController::class, 'valsurat8permohonan3'])->name('valsurat8permohonan3.update');
Route::put('/validasiberkas8permohonan4/{id}', [BantuanteknisController::class, 'valsurat8permohonan4'])->name('valsurat8permohonan4.update');




// VERIFIKASI DOKUMENTASI CEK LAPANGAN
Route::get('/bebantuanteknislapangan/{id}', [BantuanteknisController::class, 'bebantuanteknisceklapangan'])->middleware('auth')->name('bebantuanteknislapangan.show');
Route::get('/bebantuanteknislapangancreate/{id}', [BantuanteknisController::class, 'bebantuanteknislapangancreate'])->middleware('auth')->name('bebantuanteknislapangancreate.create');
Route::post('/bebantuanteknislapangancreate', [BantuanteknisController::class, 'bebantuanteknislapangancreatenew'])->middleware('auth')->name('create.ceklapanganbantektambah');

Route::delete('/bebantuanteknislapangandelete/{id}', [BantuanteknisController::class, 'bebantuanteknislapangandelete'])->middleware('auth')->name('delete.bebantuanteknislapangandelete');
Route::get('/bebantuanasistensilap/{id}', [BantuanteknisController::class, 'bebantuanasistensilap'])->middleware('auth')->name('bebantuanasistensilap.show');


Route::get('/bebantuanteknislapanganupload/{id}', [BantuanteknisController::class, 'bebantuanteknislapanganuploadnew'])->middleware('auth')->name('bebantuanteknislapangan.uploadberkas');
Route::get('/bebantuanteknislapanganuploads/{id}', [BantuanteknisController::class, 'bebantuanteknislapanganuploadnews'])->middleware('auth')->name('bebantuanteknislapangan.uploadberkasnew');
// BANTUAN TEKNIS TERBITKAN SERTIFIKAT
// Route::get('/bebantuanteknissertifikat/{id}', [BantuanteknisController::class, 'bebantuanteknislapangancreate'])->middleware('auth')->name('bebantuanteknissertifikat.upload');
Route::post('/bebantuanteknislapanganuploadnew/{id}', [BantuanteknisController::class, 'bebantuanteknislapanganberkas'])->middleware('auth')->name('upload.bebantuanteknislapanganuploadnew');

// AKUN PEMOHON BANTEK
Route::get('/bebantekpemohondinas', [BantuanteknisController::class, 'bebantekpemohondinas'])->middleware('auth')->name('bebantekpemohondinasindex');
Route::get('/bebantekpemohonasistensi', [BantuanteknisController::class, 'bebantekpemohonasistensi'])->middleware('auth')->name('bebantekpemohonasistensiindex');
// PERBAIKAN DATA BERKAS

Route::get('/bebantekpemohondinasperbaikan/{id}', [BantuanteknisController::class, 'bebantekpemohondinasperbaikan'])->middleware('auth')->name('bebantekpemohondinasperbaikan.perbaikan');
Route::post('/bebantekpemohondinasperbaikans/{id}', [BantuanteknisController::class, 'bebantuanteknislapanganberkasbaru'])->middleware('auth')->name('bebantekpemohondinasperbaikan.uploads');

// AKUN DINAS BANTUAN TEKNIS
Route::get('/bebantekakundinas', [BantuanteknisController::class, 'bebantekakundinasistensi'])->middleware('auth')->name('bebantekakundinasindex');
Route::get('/bebantekakunkonsultan', [BantuanteknisController::class, 'bebantekakunkonsultan'])->middleware('auth')->name('bebantekakunkonsultanindex');
Route::get('/bebantekakundinasberkas', [BantuanteknisController::class, 'bebantekakundinasberkas'])->middleware('auth')->name('bebantekakundinasberkasindex');

Route::get('/datapermohonandinas', [AdminDashboardController::class, 'dashboarddinas']);

// AKUN JASA KONSULTAN ASISTENSI

Route::get('/bebantekdaftarkonsultan', [BantuanteknisController::class, 'bebantekdaftarkonsultan'])->middleware('auth')->name('bebantekdaftarkonsultanindex');
Route::get('/bebantekdaftarkonsultapilih/{id}', [BantuanteknisController::class, 'bebantekdaftarkonsultapilih'])->middleware('auth')->name('bebantekdaftarkonsultapilih.show');

Route::post('/bebantekdaftarkonsultapilihnew/{id}', [BantuanteknisController::class, 'bebantekdaftarkonsultapilihnew'])->middleware('auth')->name('update.bebantekdaftarkonsultapilihnew');
Route::get('/bebantekdaftarkonsultanproses', [BantuanteknisController::class, 'bebantekdaftarkonsultanproses'])->middleware('auth')->name('bebantekdaftarkonsultanproses');

Route::get('/bebantekkonsultan', [BantuanteknisController::class, 'bebantekkonsultandata'])->middleware('auth')->name('bebantekkonsultanindex');


// MENU 06 KRK BACKEND
Route::get('/bekrkshowpermohonan/{id}', [KrkController::class, 'bekrkshowpermohonan'])->middleware('auth')->name('bekrkshowpermohonan.show');

// saat ini
// Route::get('/portalberita', function ()
//     // return view('welcome');
//     return view('portalberita', [
    //         'title' => 'Portal Berita',
    //     ]);
    // });


Route::get('/404', function () {
    // return view('welcome');
    return view('404', [
        'title' => 'Under Constructions',
    ]);
});

Route::get('/bahan2', function () {
    // return view('welcome');
    return view('frontend.00_full.bahan2');
});


// -------------------------------------------------------------------------------------------------------------------------------------------
// MENU FRONTEND WEB ---------------------------------
// -------------------------------------------------------------------------------------------------------------------------------------------

// 04. MENU BANTUAN TEKNIS

Route::get('/febantuanteknis', [BantuanteknisController::class, 'index'])->middleware('auth');
Route::post('/febantuanteknis/create', [BantuanteknisController::class, 'febantuantekniscreatepermohonan'])->name('permohonan.bantekcreate');







// ================================================================================================================================================
// ================================================================================================================================================
// ================================================================================================================================================

// Route::get('/dashboard', [AdminDashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard', [AdminDashboardController::class, 'index']);

// ------------------- BACKEND QA PERTANYAAN ---------------------------

// KATEGORI ADMIN
Route::get('/qapertanyaan', [AdministratorController::class, 'qapertanyaan'])->middleware('auth');
Route::get('/qapertanyaancreate', [AdministratorController::class, 'createqapertanyaan'])->middleware('auth');
Route::post('/qapertanyaanstore', [AdministratorController::class, 'createstoreqapertanyaan'])->name('create.qapertanyaan');
Route::post('/qapertanyaan/{id}', [AdministratorController::class, 'deleteqapertanyaan'])
->middleware('auth')
->name('delete.qapertanyaan');

// ------------------- BACKEND BAGIAN HIMBAUAN DINAS ---------------------------

// KATEGORI HIMBAUAN DINAS
Route::get('/himbauandinas', [AdministratorController::class, 'himbauandinas'])->middleware('auth');
Route::get('/himbauandinas/{nama_lengkap}', [AdministratorController::class, 'himbauandinasshowbyname'])->middleware('auth');
Route::get('/himbauandinas/update/{nama_lengkap}', [AdministratorController::class, 'updatehimbauandinas'])->middleware('auth')->name('updateshow.himbauandinas');
Route::post('/himbauandinas/{nama_lengkap}', [AdministratorController::class, 'createupdatehimbauandinas'])->middleware('auth')->name('update.himbauandinas');

// Route::get('/$login', function () {
//     // return view('welcome');
//     return view('login.index',
//         'title' => 'Halaman Login'
//     ]);
// });

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/daftar', [LoginController::class, 'showRegisterForm']);
Route::post('/daftar', [LoginController::class, 'register']);

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
