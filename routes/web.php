<?php

use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\FedashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdministratorController;
use App\Http\Controllers\AgendapelatihanabgController;
use App\Http\Controllers\akuncontroller;
use App\Http\Controllers\BantuanhibahbgController;
use App\Http\Controllers\BantuanhibahController;
use App\Http\Controllers\BantuanteknisController;
use App\Http\Controllers\DatabaseAbgController;
use App\Http\Controllers\GambarbantuanController;
use App\Http\Controllers\KrkController;
use App\Http\Controllers\PbgslfController;
use App\Http\Controllers\PendataanBangunanGedungController;
use App\Http\Controllers\PenilikbangunanController;
use App\Http\Controllers\PerjalanandinasController;
use App\Models\gambarbantuan;
use App\Models\pbgslfbangunan;
use App\Models\perjalanandinas;
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

Route::get('/', [FedashboardController::class, 'index'])->name('androidmenuutama');
Route::get('/web', [FedashboardController::class, 'web']);
// Route::post('/qapertanyaanstore', [FedashboardController::class, 'createbarustorepertanyaan'])->middleware('auth')->name('create.storeqapertanyaanbaru');
// Route::post('/qapertanyaanstorebaru', [FedashboardController::class, 'createstorepertanyaanpublik'])->middleware('auth')->name('createpertanyaanstorebaru');
// Route::post('/qapertanyaanstorebaru', [AdministratorController::class, 'createstorepertanyaanpublik'])->name('createpertanyaanstorebaru');

// 02_ MENU TRACKING BERKAS

Route::get('/betracking', [PbgslfController::class, 'betracking'])->middleware('auth')->name('betracking');
Route::get('/betrackingdata', [PbgslfController::class, 'betrackingdata'])->middleware('auth')->name('betrackingdata');
Route::get('/betrackingdatacari', [PbgslfController::class, 'betrackingdatacari'])->middleware('auth')->name('betrackingdatacari');
Route::get('/betrackingdatacarife', [PbgslfController::class, 'betrackingdatacarife'])->name('betrackingdatacarife');
Route::get('/betrackingdatacariweb', [PbgslfController::class, 'betrackingdatacariweb'])->name('betrackingdatacariweb');

// VERSI WEB
Route::get('/infotrakingweb', [FedashboardController::class, 'infotrakingweb']);
// 01_ MENU PBG SLF

Route::get('/infopbg', [FedashboardController::class, 'infopbgindex']);
Route::get('/infopbgcampuran', [FedashboardController::class, 'infopbgcampuran']);
Route::get('/infopbghunian', [FedashboardController::class, 'infopbghunian']);
Route::get('/infopbgagama', [FedashboardController::class, 'infopbgagama']);
Route::get('/infopbgprasarana', [FedashboardController::class, 'infopbgprasarana']);
Route::get('/infopbgsosialbudaya', [FedashboardController::class, 'infopbgsosialbudaya']);
Route::get('/infopbgusaha', [FedashboardController::class, 'infopbgusaha']);
Route::get('/infoslfusaha', [FedashboardController::class, 'infoslfusaha']);
Route::get('/infomenaratelkomunikasi', [FedashboardController::class, 'infomenaratelkomunikasi']);

// INFORMASI KRK
Route::get('/infokrkpermohonan', [FedashboardController::class, 'infokrkpermohonan']);
Route::get('/infobantuangambar', [FedashboardController::class, 'infobantuangambar']);
Route::get('/infombrgambar', [FedashboardController::class, 'infombrgambar']);
// ----------------------------------------------------------------------------------------
Route::get('/respbgslfindex', [FedashboardController::class, 'menurespbgslfindex']);
Route::get('/feinfocampuran', [FedashboardController::class, 'feinfocampuran']);
Route::get('/feinfohunian', [FedashboardController::class, 'feinfohunian']);
Route::get('/feinfoagama', [FedashboardController::class, 'feinfoagama']);
Route::get('/feinfoprasarana', [FedashboardController::class, 'feinfoprasarana']);
Route::get('/feinfososialbudaya', [FedashboardController::class, 'feinfososialbudaya']);
Route::get('/feinfofungsiusaha', [FedashboardController::class, 'feinfofungsiusaha']);
Route::get('/slffungsiusaha', [FedashboardController::class, 'slffungsiusaha']);
Route::get('/slfmenara', [FedashboardController::class, 'slfmenara']);

// 02_ MENU PENDATAAN BANGUNAN GEDUNG

Route::get('/datanewpendataanbg', [PendataanBangunanGedungController::class, 'datanewpendataanbg'])->middleware('auth')->name('datanewpendataanbg');
Route::post('/datanewpendataanbgnew', [PendataanBangunanGedungController::class, 'datanewpendataanbgnew'])->middleware('auth')->name('datanewpendataanbgnew');


// INFORMASI PENDATAAAN BANGUNAN GEDUNG BERDASARKAN KECAMATAN KAB BLORA
Route::get('/bangunan/kecamatan/{kecamatan_id}', [PendataanBangunanGedungController::class, 'perkecamatanbangunan'])
->name('bangunan.perkecamatan');



//  PERUBAHAN INI

Route::get('/bependataanbangunangedung', [PendataanBangunanGedungController::class, 'bependataanbangunangedung'])->middleware('auth')->name('bependataanbangunangedung');

Route::get('/bependataanbangunangedung/update/{id}', [PendataanBangunanGedungController::class, 'bependataanbangunangedungupdate'])->middleware('auth')->name('bependataanbangunangedungupdate');
Route::post('/datanewpendataanbgnewupdate/{id}', [PendataanBangunanGedungController::class, 'datanewpendataanbgnewupdate'])
    ->middleware('auth')
    ->name('datanewpendataanbgnewupdate');

Route::get('/bebangunangedung', [PendataanBangunanGedungController::class, 'bebangunangedung'])->middleware('auth')->name('bebangunangedung');
Route::get('/bebangunangedunginformasi/{id}', [PendataanBangunanGedungController::class, 'bebangunangedunginformasi'])->middleware('auth')->name('bebangunangedunginformasi');

Route::delete('/bebangunangedungdelete/{id}', [PendataanBangunanGedungController::class, 'bebangunangedungdelete'])->middleware('auth')->name('bebangunangedungdelete');

// DATA PROFIL TANAH
Route::get('/bependataanbgtanah/{id}', [PendataanBangunanGedungController::class, 'bependataanbgtanah'])->middleware('auth')->name('bependataanbgtanah');

// sarigit
// KIC PENDATAAN BANGUNAN GEDUNG
// Route::get('/bedatakic', [PendataanBangunanGedungController::class, 'bedatakic'])->middleware('auth')->name('bedatakic');
Route::get('/bedatabangunankic', [PendataanBangunanGedungController::class, 'bedatabangunankic'])->middleware('auth')->name('bedatabangunankic');
Route::delete('/bedatabangunankicdelete/{id}', [PendataanBangunanGedungController::class, 'bedatabangunankicdelete'])->middleware('auth')->name('bedatabangunankicdelete');
Route::get('/bedatabangunankicshow/{id}', [PendataanBangunanGedungController::class, 'bedatabangunankicshow'])->middleware('auth')->name('bedatabangunankicshow');
Route::delete('/bedatabangudokkicdelete/{id}', [PendataanBangunanGedungController::class, 'bedatabangudokkicdelete'])->middleware('auth')->name('bedatabangudokkicdelete');

Route::get('/datanewkic', [PendataanBangunanGedungController::class, 'datanewkic'])->middleware('auth')->name('datanewkic');
Route::post('/datanewkicnew', [PendataanBangunanGedungController::class, 'datanewkicnew'])->middleware('auth')->name('datanewkicnew');

Route::get('/datanewkicdokumen/{id}', [PendataanBangunanGedungController::class, 'datanewkicdokumen'])->middleware('auth')->name('datanewkicdokumen');
Route::post('/datanewkicdokumennew', [PendataanBangunanGedungController::class, 'datanewkicdokumennew'])->middleware('auth')->name('datanewkicdokumennew');

Route::get('/bedatakicstruktur/{id}', [PendataanBangunanGedungController::class, 'bedatakicstruktur'])->middleware('auth')->name('bedatakicstruktur');

// 01 PENDATAAN BANGUNAN GEDUNG PROFIL STATUS TANAH

Route::get(
    '/bedatabgprofiltanah/{kepemilikanId}',
    [PendataanBangunanGedungController::class, 'bedatabgprofiltanah']
)->middleware('auth')->name('bedatabgprofiltanah');


Route::delete('/bedatabgprofiltanahdelete/{id}', [PendataanBangunanGedungController::class, 'bedatabgprofiltanahdelete'])->middleware('auth')->name('bedatabgprofiltanahdelete');

// Route::get('/bedatabgprofiltanah/{id}', [PendataanBangunanGedungController::class, 'bedatabgprofiltanah'])->middleware('auth')->name('bedatabgprofiltanah');
Route::get('/bedatabgprofiltanahupdate/{id}', [PendataanBangunanGedungController::class, 'bedatabgprofiltanahupdate'])->middleware('auth')->name('bedatabgprofiltanahupdate');

Route::put('/bedatabgprofiltanahupdatenew/{id}', [PendataanBangunanGedungController::class, 'bedatabgprofiltanahupdatenew'])->middleware('auth')->name('bedatabgprofiltanahupdatenew');

Route::get('/bedatabgprofiltanahcreate/{id}', [PendataanBangunanGedungController::class, 'bedatabgprofiltanahcreate'])->middleware('auth')->name('bedatabgprofiltanahcreate');
Route::post('/bedatabgprofiltanahcreatenew', [PendataanBangunanGedungController::class, 'bedatabgprofiltanahcreatenew'])->middleware('auth')->name('bedatabgprofiltanahcreatenew');

// 02 PENDATAAN BANGUNAN GEDUNG PROFIL DATA BANGUNAN GEDUNG
Route::get(
    '/bedatabgprofilbangunan/{kepemilikanId}',
    [PendataanBangunanGedungController::class, 'bedatabgprofilbangunan']
)->middleware('auth')->name('bedatabgprofilbangunan');


Route::delete('/bedatabgprofilbangunandelete/{id}', [PendataanBangunanGedungController::class, 'bedatabgprofilbangunandelete'])->middleware('auth')->name('bedatabgprofilbangunandelete');

// Route::get('/bedatabgprofilbangunan/{id}', [PendataanBangunanGedungController::class, 'bedatabgprofilbangunan'])->middleware('auth')->name('bedatabgprofilbangunan');
Route::get('/bedatabgprofilbangunanupdate/{id}', [PendataanBangunanGedungController::class, 'bedatabgprofilbangunanupdate'])->middleware('auth')->name('bedatabgprofilbangunanupdate');
Route::put('/bedatabgprofilbangunanupdatenew/{id}', [PendataanBangunanGedungController::class, 'bedatabgprofilbangunanupdatenew'])->middleware('auth')->name('bedatabgprofilbangunanupdatenew');

Route::get('/bedatabgprofilbangunancreate/{id}', [PendataanBangunanGedungController::class, 'bedatabgprofilbangunancreate'])->middleware('auth')->name('bedatabgprofilbangunancreate');
Route::post('/bedatabgprofilbangunancreatenew', [PendataanBangunanGedungController::class, 'bedatabgprofilbangunancreatenew'])->middleware('auth')->name('bedatabgprofilbangunancreatenew');

// 03 PENDATAAN BANGUNAN GEDUNG KLASIFIKASI BANGUNAN GEDUNG

Route::get(
    '/bedatabgklasifikasi/{kepemilikanId}',
    [PendataanBangunanGedungController::class, 'bedatabgklasifikasi']
    )->middleware('auth')->name('bedatabgklasifikasi');

    Route::delete('/bedatabgklasifikasidelete/{id}', [PendataanBangunanGedungController::class, 'bedatabgklasifikasidelete'])->middleware('auth')->name('bedatabgklasifikasidelete');
    // Route::get('/bedatabgklasifikasi/{id}', [PendataanBangunanGedungController::class, 'bedatabgklasifikasi'])->middleware('auth')->name('bedatabgklasifikasi');

    Route::get('/bedatabgklasifikasiupdate/{id}', [PendataanBangunanGedungController::class, 'bedatabgklasifikasiupdate'])->middleware('auth')->name('bedatabgklasifikasiupdate');
    Route::put('/bedatabgklasifikasiupdatenew/{id}', [PendataanBangunanGedungController::class, 'bedatabgklasifikasiupdatenew'])->middleware('auth')->name('bedatabgklasifikasiupdatenew');

    Route::get('/bedatabgklasifikasicreate/{id}', [PendataanBangunanGedungController::class, 'bedatabgklasifikasicreate'])->middleware('auth')->name('bedatabgklasifikasicreate');
    Route::post('/bedatabgklasifikasicreatenew', [PendataanBangunanGedungController::class, 'bedatabgklasifikasicreatenew'])->middleware('auth')->name('bedatabgklasifikasicreatenew');
    // DATA DOKUMEN BG BANGUNAN GEDUNG

    Route::get(
        '/bedatabgdokumen/{kepemilikanId}',
        [PendataanBangunanGedungController::class, 'bedatabgdokumen']
        )->middleware('auth')->name('bedatabgdokumen');

        Route::delete('/bedatabgdokumendelete/{id}', [PendataanBangunanGedungController::class, 'bedatabgdokumendelete'])->middleware('auth')->name('bedatabgdokumendelete');

        // Route::get('/bedatabgdokumen/{id}', [PendataanBangunanGedungController::class, 'bedatabgdokumen'])->middleware('auth')->name('bedatabgdokumen');
        Route::get('/bedatabgdokumencreate/{id}', [PendataanBangunanGedungController::class, 'bedatabgdokumencreate'])->middleware('auth')->name('bedatabgdokumencreate');
        Route::post('/bedatabgdokumencreatenew', [PendataanBangunanGedungController::class, 'bedatabgdokumencreatenew'])->middleware('auth')->name('bedatabgdokumencreatenew');
        Route::get('/bedatabgdokumenupdate/{id}', [PendataanBangunanGedungController::class, 'bedatabgdokumenupdate'])->middleware('auth')->name('bedatabgdokumenupdate');
        Route::put('/bedatabgdokumenupdatenew/{id}', [PendataanBangunanGedungController::class, 'bedatabgdokumenupdatenew'])->middleware('auth')->name('bedatabgdokumenupdatenew');

        // DATA DOKUMEN MEP STATUS BANGUNAN GEDUNG
        Route::get(
            '/bedatabgmebangunan/{id}',
    [PendataanBangunanGedungController::class, 'bedatabgmebangunan']
)->middleware('auth')->name('bedatabgmebangunan');

Route::delete('/bedatabgmebangunandelete/{id}', [PendataanBangunanGedungController::class, 'bedatabgmebangunandelete'])->middleware('auth')->name('bedatabgmebangunandelete');

// Route::get('/bedatabgmebangunan/{id}', [PendataanBangunanGedungController::class, 'bedatabgmebangunan'])->middleware('auth')->name('bedatabgmebangunan');

Route::get('/bedatabgmebangunancreate/{id}', [PendataanBangunanGedungController::class, 'bedatabgmebangunancreate'])->middleware('auth')->name('bedatabgmebangunancreate');
Route::post('/bedatabgmebangunancreatenew', [PendataanBangunanGedungController::class, 'bedatabgmebangunancreatenew'])->middleware('auth')->name('bedatabgmebangunancreatenew');

Route::get('/bedatabgmebangunanupdate/{id}', [PendataanBangunanGedungController::class, 'bedatabgmebangunanupdate'])->middleware('auth')->name('bedatabgmebangunanupdate');
Route::put('/bedatabgmebangunanupdatenew/{id}', [PendataanBangunanGedungController::class, 'bedatabgmebangunanupdatenew'])->middleware('auth')->name('bedatabgmebangunanupdatenew');


// 04 PENDATAAN BANGUNAN GEDUNG STRUKTUR DAN TINGKAT KERUSAKAN BANGUNAN GEDUNG
Route::get(
    '/bedatabgstrukrrusak/{kepemilikanId}',
    [PendataanBangunanGedungController::class, 'bedatabgstrukrrusak']
)->middleware('auth')->name('bedatabgstrukrrusak');


    Route::delete('/bedatabgstrukrrusakdelete/{id}',
   [PendataanBangunanGedungController::class, 'bedatabgstrukrrusakdelete']
)->name('bedatabgstrukrrusakdelete');

    // Route::delete('/bedatabgstrukrrusakdelete/{id}', [PendataanBangunanGedungController::class, 'bedatabgstrukrrusakdelete'])->middleware('auth')->name('bedatabgstrukrrusakdelete');
    // Route::get('/bedatabgstrukrrusak/{id}', [PendataanBangunanGedungController::class, 'bedatabgstrukrrusak'])->middleware('auth')->name('bedatabgstrukrrusak');

Route::get('/bedatabgstrukrrusakcreate/{id}', [PendataanBangunanGedungController::class, 'bedatabgstrukrrusakcreate'])->middleware('auth')->name('bedatabgstrukrrusakcreate');
Route::post('/bedatabgstrukrrusakcreatenew', [PendataanBangunanGedungController::class, 'bedatabgstrukrrusakcreatenew'])->middleware('auth')->name('bedatabgstrukrrusakcreatenew');

Route::get('/bedatabgstrukrrusakupdate/{id}', [PendataanBangunanGedungController::class, 'bedatabgstrukrrusakupdate'])->middleware('auth')->name('bedatabgstrukrrusakupdate');
Route::put('/bedatabgstrukrrusakupdatenew/{id}', [PendataanBangunanGedungController::class, 'bedatabgstrukrrusakupdatenew'])->middleware('auth')->name('bedatabgstrukrrusakupdatenew');

Route::get('/bedatabgstrukrrusakupdatefoto/{id}', [PendataanBangunanGedungController::class, 'bedatabgstrukrrusakupdatefoto'])->middleware('auth')->name('bedatabgstrukrrusakupdatefoto');

Route::put('/bedatabgstrukrrusakupdatefotonew/{id}', [PendataanBangunanGedungController::class, 'bedatabgstrukrrusakupdatefotonew'])->middleware('auth')->name('bedatabgstrukrrusakupdatenewfoto');

// Route::put('/bedatabgstrukrrusak/{datakerusakan}/{datastruktur}',
//     [PendataanBangunanGedungController::class, 'bedatabgstrukrrusakupdatenew']
// )->name('bedatabgstrukrrusakupdatenew');

// Route::put('/bedatabgstrukrrusak/{datakerusakan}/struktur/{datastruktur}',
//     [PendataanBangunanGedungController::class, 'bedatabgstrukrrusakupdatenew']
// )->name('bedatabgstrukrrusakupdatenew');

// Route::put(
//     '/bedatabgstrukrrusak/{datakerusakan}/struktur/{datastruktur}',
//     [PendataanBangunanGedungController::class, 'bedatabgstrukrrusakupdatenew']
// )->name('bedatabgstrukrrusakupdatenew');

// 04 PENDATAAN BANGUNAN GEDUNG STRUKTUR BANGUNAN GEDUNG
// DATA CONTOH VALIDASI KE 2

// Route::get('/bedatabgstruktur/{id}', [PendataanBangunanGedungController::class, 'bedatabgstruktur'])->middleware('auth')->name('bedatabgstruktur');
// Route::get('/bedatabgstrukturupdate/{id}', [PendataanBangunanGedungController::class, 'bedatabgstrukturupdate'])->middleware('auth')->name('bedatabgstrukturupdate');
// Route::put('/bedatabgstrukturupdatenew/{id}', [PendataanBangunanGedungController::class, 'bedatabgstrukturupdatenew'])->middleware('auth')->name('bedatabgstrukturupdatenew');

// Route::get('/bedatabgstrukturcreate/{id}', [PendataanBangunanGedungController::class, 'bedatabgstrukturcreate'])->middleware('auth')->name('bedatabgstrukturcreate');
// Route::post('/bedatabgstrukturcreatenew', [PendataanBangunanGedungController::class, 'bedatabgstrukturcreatenew'])->middleware('auth')->name('bedatabgstrukturcreatenew');

// 05 PENDATAAN BANGUNAN GEDUNG STATUS BANGUNAN GEDUNG
Route::get(
    '/bedatabgstatusbangunan/{kepemilikanId}',
    [PendataanBangunanGedungController::class, 'bedatabgstatusbangunan']
)->middleware('auth')->name('bedatabgstatusbangunan');

// Route::get('/bedatabgstatusbangunan/{id}', [PendataanBangunanGedungController::class, 'bedatabgstatusbangunan'])->middleware('auth')->name('bedatabgstatusbangunan');

        Route::delete('/bedatabgstatusbangunandelete/{id}', [PendataanBangunanGedungController::class, 'bedatabgstatusbangunandelete'])->middleware('auth')->name('bedatabgstatusbangunandelete');

Route::get('/bedatabgstatusbangunanupdate/{id}', [PendataanBangunanGedungController::class, 'bedatabgstatusbangunanupdate'])->middleware('auth')->name('bedatabgstatusbangunanupdate');
Route::put('/bedatabgstatusbangunanupdatenew/{id}', [PendataanBangunanGedungController::class, 'bedatabgstatusbangunanupdatenew'])->middleware('auth')->name('bedatabgstatusbangunanupdatenew');

Route::get('/bedatabgstatuscreate/{id}', [PendataanBangunanGedungController::class, 'bedatabgstatuscreate'])->middleware('auth')->name('bedatabgstatuscreate');
Route::post('/bedatabgstatuscreatenew', [PendataanBangunanGedungController::class, 'bedatabgstatuscreatenew'])->middleware('auth')->name('bedatabgstatuscreatenew');

// Route::delete('/bepbgdatapemilikdelete/{id}', [PbgslfController::class, 'bepbgdatapemilikdelete'])->middleware('auth')->name('bepbgdatapemilikdelete');



// 03_ MENU BANGUNAN GEDUNG ANDROID
// ----------------------------------------------------------------------------------------
Route::get('/resbgindex', [FedashboardController::class, 'menuresbangunangedungindex']);

// 02 MENU TRACKING BANGUNAN GEDUNG
Route::get('/resbgtracking', [FedashboardController::class, 'resbgtracking']);

// 04_ MENU BANTUAN TEKNIS
// ----------------------------------------------------------------------------------------
// Route::get('/respbgslfindex', [FedashboardController::class, 'menurespbgslfindex']);
Route::get('/resbantekindex', [FedashboardController::class, 'resbantekindex']);
Route::get('/resbantekpermohonan', [FedashboardController::class, 'resbantekpermohonan'])->middleware('auth');

Route::get('/febantekasistensi', [FedashboardController::class, 'febantekasistensi']);
Route::get('/febantekpenelitikontrak', [FedashboardController::class, 'febantekpenelitikontrak']);
Route::get('/febantekperasset', [FedashboardController::class, 'febantekperasset']);
Route::get('/febantekpermeliha', [FedashboardController::class, 'febantekpermeliha']);
Route::get('/febantekdamping', [FedashboardController::class, 'febantekdamping']);
Route::get('/febantektimteknis', [FedashboardController::class, 'febantektimteknis']);

// Route::get('/feinfocampuran', [FedashboardController::class, 'feinfocampuran']);

// MENU SOSIALISASI
Route::get('/resagendaabg', [FedashboardController::class, 'resagendaabg'])->name('resagendaabg');
Route::get('/ressosialisasiabg', [FedashboardController::class, 'ressosialisasiindex']);
// Route::get('/ressosialisasishow/{id}', [FedashboardController::class, 'ressosialisasishow'])->name('ressosialisasishow');
Route::get('/ressosialisasishow/{id}', [FedashboardController::class, 'ressosialisasishow'])->name('ressosialisasishow');

Route::get('/respesertaabg', [FedashboardController::class, 'respesertaabg']);

Route::get('/respesertashow/{id}', [FedashboardController::class, 'respesertashow'])->name('respesertashow');

// 08_ MENU MBR BANTUAN GAMBAR
// ----------------------------------------------------------------------------------------
Route::get('/resmbrgambarindex', [FedashboardController::class, 'resmbrgambarindex']);
Route::get('/mbrgambarupdate/{id}', [FedashboardController::class, 'mbrgambarupdate'])->middleware('auth')->name('mbrgambarupdate');
Route::post('/mbrgambarupdatenew/{id}', [PbgslfController::class, 'mbrgambarupdatenew'])->middleware('auth')->name('mbrgambarupdatenew');

// Route::post('/mbrgambarupdatenew/{id}', [BantuanhibahbgController::class, 'datanewhibahnew'])->middleware('auth')->name('dokhibahnew.create');

// Route::get('/resbantekpermohonan', [FedashboardController::class, 'resbantekpermohonan'])->middleware('auth');
// MENU MBR BANTUAN GAMBAR DAFTAR PENGKAJI TEKNIS
Route::get('/bembrpengkajiteknis', [PendataanBangunanGedungController::class, 'bembrpengkajiteknis']);
// WEB 03_ MENU BANGUNAN GEDUNG ANDROID
// ----------------------------------------------------------------------------------------
Route::get('/pendataankicbangunangedung', [PendataanBangunanGedungController::class, 'datakicbangunan']);
Route::get('/databangunangedung', [PendataanBangunanGedungController::class, 'databangunangedung']);
Route::get('/databangunangedungshow/{id}', [PendataanBangunanGedungController::class, 'databangunangedungshow']);
Route::get('/statistikbg', [PendataanBangunanGedungController::class, 'statistikbg']);

Route::get('/pendataankicbangunangedungshow/{id}', [PendataanBangunanGedungController::class, 'pendataankicbangunangedungshow']);

// WEB 06_ MENU KRK BANGUNAN GEDUNG
Route::get('/rescarigsb', [FedashboardController::class, 'rescarigsb'])->middleware('auth')->name('rescarigsb');

// ----------------------------------------------------------------------------------------
Route::get('/informasikrk', [KrkController::class, 'informasikrk']);
Route::get('/permohonankrk', [KrkController::class, 'permohonankrk'])->middleware('auth');


Route::get('/pemohonkrk', [KrkController::class, 'pemohonkrk'])->middleware('auth');

// PERMOHONAN KRK MENARA TELEKOMUNIKASI
Route::get('/permohonanmenara', [KrkController::class, 'permohonanmenara'])->middleware('auth')->name('permohonanmenara');
Route::post('/permohonanmenara/create', [KrkController::class, 'permohonanmenaracreate'])->name('permohonan.permohonanmenara');

// MENU 02 PERMOHONAN KRK USAHA
// Route::get('/permohonankrkusaha', [KrkController::class, 'permohonankrkusaha'])->name('permohonan.krkusaha');
Route::middleware(['auth'])->group(function () {
    Route::get('/permohonankrkusaha', [KrkController::class, 'permohonankrkusaha'])
        ->name('permohonan.krkusaha');
});

Route::post('/permohonankrkusaha/create', [KrkController::class, 'permohonankrkusahacreate'])->name('permohonan.krkusahacreate');
Route::post('/berkasusaha/{id}/validate', [KrkController::class, 'validateBerkasusaha'])->name('berkasusaha.validate');
Route::get('/permohonanpengesahanusaha/{id}', [KrkController::class, 'permohonanpengesahanusaha'])->name('permohonan.pengesahanusaha');
Route::post('/permohonanpengesahanusahacreate/{id}', [KrkController::class, 'permohonanpengesahanusahacreate'])->name('permohonan.pengesahanusahacreate');
Route::get('/permohonanpengesahanusahaber/{id}', [KrkController::class, 'permohonanpengesahanusahaber'])->name('permohonan.permohonanpengesahanusahaber');
Route::delete('/krkusahasuratdelete/{id}', [KrkController::class, 'destroykrkusahasurat'])->name('krkusahasurat.destroy');

Route::get('/perusahamanual/{id}', [KrkController::class, 'perusahamanual'])->name('perusahamanual');

// Route::get('/permohonankrk', [KrkController::class, 'permohonankrk'])->middleware('auth');
// -----------------------------------
Route::get('/besuratpemohonkrk/{id}', [KrkController::class, 'besuratpemohonkrk'])->middleware('auth')->name('besuratpemohonkrk');



// MENU 02 PERMOHONAN KRK HUNIAN
Route::get('/permohonankrkhunian', [KrkController::class, 'permohonankrkhunian'])->middleware('auth')->name('permohonan.krkhunian');
Route::post('/permohonankrkhunian/create', [KrkController::class, 'permohonankrkhuniancreate'])->name('permohonan.krkhuniancreate');
Route::post('/berkashunian/{id}/validate', [KrkController::class, 'validateBerkashunian'])->name('berkashunian.validate');
Route::post('/perpengesahankrkhunian/{id}', [KrkController::class, 'perpengesahankrkhunian'])->name('perpengesahankrkhunian');

Route::post('/perpengesahankrkagama/{id}', [KrkController::class, 'perpengesahankrkagama'])->name('perpengesahankrkagama');

Route::post('/perpengesahankrksosbud/{id}', [KrkController::class, 'perpengesahankrksosbud'])->name('perpengesahankrksosbud');


// MENU 03 PERMOHONAN KRK KEGAAMAAN
Route::get('/permohonankrkagama', [KrkController::class, 'permohonankrkagama'])->middleware('auth')->name('permohonan.krkagama');
Route::post('/permohonankrkagama/create', [KrkController::class, 'permohonankrkagamacreate'])->name('permohonan.krkagamacreate');

// MENU 03 PERMOHONAN KRK KEGAAMAAN
Route::get('/permohonankrksosbud', [KrkController::class, 'permohonankrksosbud'])->middleware('auth')->name('permohonan.krksosbud');
Route::post('/permohonankrksosbud/create', [KrkController::class, 'permohonankrksosbudcreate'])->name('permohonan.krksosbudcreate');


// =================================================================================================================================
// MENU BACKEND ABG BLORA BANGUNAN GEDUNG KABUPATEN BLORA
// MENU 06 KRK BANGUNAN GEDUNG

// AKUN PEMOHON KRK KETERANGAN RENCANA KOTA
Route::get('/bekrkusahapemohon', [KrkController::class, 'bekrkusahapemohon'])->name('bekrkusahapemohon.indexpemohon');
Route::get('/bekrkhunianpemohon', [KrkController::class, 'bekrkhunianpemohon'])->name('bekrkhunianpemohon.indexpemohon');
Route::get('/bekrkkeagamaanpemohon', [KrkController::class, 'bekrkkeagamaanpemohon'])->name('bekrkkeagamaanpemohon.indexpemohon');
Route::get('/bekrksosbudpemohon', [KrkController::class, 'bekrksosbudpemohon'])->name('bekrksosbud.indexpemohon');

// SARIGIT
Route::get('/bekrkmenaratelkom', [KrkController::class, 'bekrkmenaratelkom'])->name('bekrkmenaratelkom');
Route::get('/bekrkmenaratelkomshow/{id}', [KrkController::class, 'bekrkmenaratelkomshow'])->middleware('auth')->name('bekrkmenaratelkomshow');
Route::put('/validasikrkmenara/{id}', [KrkController::class, 'validasikrkmenara'])->middleware('auth')->name('validasikrkmenara');
Route::put('/validasikrkmenara1/{id}', [KrkController::class, 'validasikrkmenara1'])->name('validasikrkmenara1');
Route::put('/validasikrkmenara2/{id}', [KrkController::class, 'validasikrkmenara2'])->name('validasikrkmenara2');

Route::put('/validasikrkmenara3/{id}', [KrkController::class, 'validasikrkmenara3'])->name('validasikrkmenara3');
Route::put('/validasikrkmenara4/{id}', [KrkController::class, 'validasikrkmenara4'])->name('validasikrkmenara4');



Route::get('/bekrkmenaraperbaikan/{id}', [KrkController::class, 'bekrkmenaraperbaikan'])->middleware('auth')->name('bekrkmenaraperbaikan');
Route::post('/bekrkmenaraperbaikannew/{id}', [KrkController::class, 'bekrkmenaraperbaikannew'])->middleware('auth')->name('bekrkmenaraperbaikannew');

Route::get('/dokuploadkrkmenara/{id}', [KrkController::class, 'dokuploadkrkmenara'])->middleware('auth')->name('dokuploadkrkmenara');

Route::put('/dokuploadkrkmenaranew/{id}', [KrkController::class, 'dokuploadkrkmenaranew'])->middleware('auth')->name('dokuploadkrkmenaranew');


Route::delete('/bekrkmenaratelkomdelete/{id}', [KrkController::class, 'bekrkmenaratelkomdelete'])->middleware('auth')->name('bekrkmenaratelkomdelete');

Route::get('/bekrkmenarapemohon', [KrkController::class, 'bekrkmenarapemohon'])->name('bekrkmenarapemohon');




// MENU KRK USAHA
Route::get('/bekrkusaha', [KrkController::class, 'bekrkusaha'])->name('krkusaha.index');
Route::get('/bekrkshowpermohonan/{id}', [KrkController::class, 'bekrkshowpermohonan'])->middleware('auth')->name('bekrkshowpermohonan.show');
Route::put('/validasikrkusaha/{id}', [KrkController::class, 'validasikrkusaha'])->middleware('auth')->name('validasikrkusaha');
Route::put('/valberkasusaha/{id}', [KrkController::class, 'valberkasusaha1'])->name('valberkasusaha.update');
Route::get('/doklapkrkusaha/{id}', [KrkController::class, 'doklapkrkusaha'])->middleware('auth')->name('doklapkrkusaha.show');
Route::get('/dokuploadkrkusaha/{id}', [KrkController::class, 'dokuploadkrkusaha'])->middleware('auth')->name('dokuploadkrkusaha');

Route::put('/dokuploadkrkusahanew/{id}', [KrkController::class, 'dokuploadkrkusahanew'])->middleware('auth')->name('dokuploadkrkusahanew');

Route::get('/dokuploadkrkhunian/{id}', [KrkController::class, 'dokuploadkrkhunian'])->middleware('auth')->name('dokuploadkrkhunian');

Route::put('/dokuploadkrkhuniannew/{id}', [KrkController::class, 'dokuploadkrkhuniannew'])->middleware('auth')->name('dokuploadkrkhuniannew');

Route::get('/dokuploadkrkagama/{id}', [KrkController::class, 'dokuploadkrkagama'])->middleware('auth')->name('dokuploadkrkagama');

Route::put('/dokuploadkrkagamanew/{id}', [KrkController::class, 'dokuploadkrkagamanew'])->middleware('auth')->name('dokuploadkrkagamanew');


Route::get('/dokuploadkrksosbud/{id}', [KrkController::class, 'dokuploadkrksosbud'])->middleware('auth')->name('dokuploadkrksosbud');

Route::put('/dokuploadkrksosbudnew/{id}', [KrkController::class, 'dokuploadkrksosbudnew'])->middleware('auth')->name('dokuploadkrksosbudnew');


Route::get('/doklapkrkusahacreate/{id}', [KrkController::class, 'doklapkrkusahacreate'])->middleware('auth')->name('doklapkrkusahacreate.create');
Route::post('/doklapkrkusahacreatenew', [KrkController::class, 'doklapkrkusahacreatenew'])->middleware('auth')->name('create.doklapkrkusahacreatenew');

Route::delete('/doklapkrkusahacreatedelete/{id}', [KrkController::class, 'doklapkrkusahacreatedelete'])->middleware('auth')->name('delete.doklapkrkusahacreatedelete');

Route::put('/valberkasusaha2/{id}', [KrkController::class, 'valberkasusaha2'])->name('valberkasusaha2.update');

Route::put('/valberkasusaha3/{id}', [KrkController::class, 'valberkasusaha3'])->name('valberkasusaha3.update');
Route::put('/valberkasusaha4/{id}', [KrkController::class, 'valberkasusaha4'])->name('valberkasusaha4.update');

Route::get('/permohonankrkusahafinal/{id}', [KrkController::class, 'permohonankrkusahafinal'])->name('permohonan.permohonankrkusahafinal');
Route::get('/permohonankrkusahafinalmanual/{id}', [KrkController::class, 'permohonankrkusahafinalmanual'])->name('permohonankrkusahafinalmanual');

Route::get('/krkusahanoterbit/{id}', [KrkController::class, 'krkusahanoterbit'])->middleware('auth')->name('krkusahanoterbit.create');
Route::post('/krkusahanoterbitnew/{id}', [KrkController::class, 'krkusahanoterbitnew'])->middleware('auth')->name('create.krkusahanoterbitnew');

// PERBAIAKN DATA DARI SISI ADMIN UNTUK KRK USAHA
Route::get('/bekrkusahaperbaikanadmin/{id}', [KrkController::class, 'bekrkusahaperbaikanadmin'])->middleware('auth')->name('bekrkusahaperbaikan.perbaikanadmin');

Route::get('/bekrkusahaperbaikan/{id}', [KrkController::class, 'bekrkusahaperbaikan'])->middleware('auth')->name('bekrkusahaperbaikan.perbaikan');
Route::post('/bekrkusahaperbaikannew/{id}', [KrkController::class, 'bekrkusahaperbaikannewupdate'])->middleware('auth')->name('bekrkusahaperbaikannewupdate');

Route::delete('/dokbekrkusahadelete/{id}', [KrkController::class, 'dokbekrkusahadelete'])->middleware('auth')->name('delete.dokbekrkusahadelete');



// MENU KRK HUNIAN
Route::get('/bekrkindex', [KrkController::class, 'bekrkindex']);
Route::get('/bekrkindexnew', [KrkController::class, 'bekrkindexnew']);
// -------
Route::get('/bekrkhunian', [KrkController::class, 'bekrkhunian'])->name('bekrkhunianindex');

Route::get('/bekrkhunianpermohonan/{id}', [KrkController::class, 'bekrkhunianpermohonan'])->middleware('auth')->name('bekrkhunianpermohonan.show');
Route::put('/validasikrkhunian/{id}', [KrkController::class, 'validasikrkhunian'])->middleware('auth')->name('validasikrkhunian');
Route::put('/valberkashunian1/{id}', [KrkController::class, 'valberkashunian1'])->name('valberkashunian1.update');
Route::get('/doklapkrkhunian/{id}', [KrkController::class, 'doklapkrkhunian'])->middleware('auth')->name('doklapkrkhunian.show');

Route::get('/doklapkrkhuniancreate/{id}', [KrkController::class, 'doklapkrkhuniancreate'])->middleware('auth')->name('doklapkrkhuniancreate.create');
Route::post('/doklapkrkhuniancreatenew', [KrkController::class, 'doklapkrkhuniancreatenew'])->middleware('auth')->name('create.doklapkrkhuniancreatenew');

Route::delete('/doklapkrkhuniancreatedelete/{id}', [KrkController::class, 'doklapkrkhuniancreatedelete'])->middleware('auth')->name('delete.doklapkrkhuniancreatedelete');

Route::put('/valberkashunian2/{id}', [KrkController::class, 'valberkashunian2'])->name('valberkashunian2.update');
Route::post('/berkashunianval/{id}/validate', [KrkController::class, 'berkashunianval'])->name('berkashunianval.validate');

Route::get('/perpengesahanhunian/{id}', [KrkController::class, 'perpengesahanhunian'])->name('permohonan.perpengesahanhunian');
Route::get('/perpengesahanhuniannew/{id}', [KrkController::class, 'perpengesahanhuniannew'])->name('perpengesahanhuniannew');
Route::post('/perpengesahanhuniancreate/{id}', [KrkController::class, 'perpengesahanhuniancreate'])->name('permohonan.pengesahanhuniancreate');

Route::get('/perpengesahanhunianber/{id}', [KrkController::class, 'perpengesahanhunianber'])->name('berkas.perpengesahanhunianber');
Route::delete('/krkhuniansuratdelete/{id}', [KrkController::class, 'krkhuniansuratdelete'])->name('krkusahasuratsurat.destroy');


Route::put('/valberkashunian3/{id}', [KrkController::class, 'valberkashunian3'])->name('valberkashunian3.update');

Route::get('/permohonankrkhunianfinal/{id}', [KrkController::class, 'permohonankrkhunianfinal'])->name('permohonan.permohonankrkhunianfinal');
Route::get('/permohonankrkhunianfinalman/{id}', [KrkController::class, 'permohonankrkhunianfinalman'])->name('permohonan.permohonankrkhunianfinalmanual');

Route::get('/krkhuniannoterbit/{id}', [KrkController::class, 'krkhuniannoterbit'])->middleware('auth')->name('krkhuniannoterbit.create');
Route::post('/krkhuniannoterbitnew/{id}', [KrkController::class, 'krkhuniannoterbitnew'])->middleware('auth')->name('create.krkhuniannoterbitnew');

Route::put('/valberkashunian4/{id}', [KrkController::class, 'valberkashunian4'])->name('valberkashunian4.update');


Route::get('/bekrkhunianperbaikan/{id}', [KrkController::class, 'bekrkhunianperbaikan'])->middleware('auth')->name('bekrkhunianperbaikan.perbaikan');
Route::post('/bekrkhunianperbaikannew/{id}', [KrkController::class, 'bekrkhunianperbaikannewupdate'])->middleware('auth')->name('bekrkhunianperbaikannewupdate');

Route::delete('/dokbekrkhuniandelete/{id}', [KrkController::class, 'dokbekrkhuniandelete'])->middleware('auth')->name('delete.dokbekrkhuniandelete');

// -------
// MENU KRK KEAGAMAAN
Route::get('/bekrkkeagamaan', [KrkController::class, 'bekrkkeagamaan'])->name('bekrkkeagamaanindex');

Route::get('/bekrkkeagamaanpermohonan/{id}', [KrkController::class, 'bekrkkeagamaanpermohonan'])->middleware('auth')->name('bekrkkeagamaanpermohonan.show');
Route::put('/validasikrkkeagamaan/{id}', [KrkController::class, 'validasikrkkeagamaan'])->middleware('auth')->name('validasikrkkeagamaan');
Route::put('/valberkasagama1/{id}', [KrkController::class, 'valberkasagama1'])->name('valberkasagama1.update');
Route::get('/doklapkrkkeagamaan/{id}', [KrkController::class, 'doklapkrkkeagamaan'])->middleware('auth')->name('doklapkrkkeagamaan.show');

Route::get('/doklapkrkkeagamaancreate/{id}', [KrkController::class, 'doklapkrkkeagamaancreate'])->middleware('auth')->name('doklapkrkkeagamaancreate.create');
Route::post('/doklapkrkkeagamaancreatenew', [KrkController::class, 'doklapkrkkeagamaancreatenew'])->middleware('auth')->name('create.doklapkrkkeagamaancreatenew');

Route::delete('/doklapkrkkeagamaancreatedelete/{id}', [KrkController::class, 'doklapkrkkeagamaandelete'])->middleware('auth')->name('delete.doklapkrkkeagamaancreatedelete');

Route::put('/valberkasagama2/{id}', [KrkController::class, 'valberkasagama2'])->name('valberkasagama2.update');
Route::post('/berkaskeagamaanval/{id}/validate', [KrkController::class, 'berkaskeagamaanval'])->name('berkaskeagamaanval.validate');

Route::get('/perpengesahanagama/{id}', [KrkController::class, 'perpengesahanagama'])->name('permohonan.perpengesahanagama');
Route::get('/perpengesahanagamaman/{id}', [KrkController::class, 'perpengesahanagamaman'])->name('perpengesahanagamaman');

Route::post('/perpengesahanagamacreate/{id}', [KrkController::class, 'perpengesahanagamacreate'])->name('permohonan.perpengesahanagamacreate');

Route::get('/perpengesahanagamaber/{id}', [KrkController::class, 'perpengesahanagamaber'])->name('berkas.perpengesahanagamaber');
Route::delete('/krkagamasuratdelete/{id}', [KrkController::class, 'krkagamasuratdelete'])->name('krkagamasuratdelete.destroy');


Route::put('/valberkasagama3/{id}', [KrkController::class, 'valberkasagama3'])->name('valberkasagama3.update');

Route::get('/permohonankrkkeagamaanfinal/{id}', [KrkController::class, 'permohonankrkkeagamaanfinal'])->name('permohonan.permohonankrkkeagamaanfinal');
Route::get('/permohonankrkkeagamaanfinalman/{id}', [KrkController::class, 'permohonankrkkeagamaanfinalman'])->name('permohonankrkkeagamaanfinalman');

Route::get('/krkagamanoterbit/{id}', [KrkController::class, 'krkagamanoterbit'])->middleware('auth')->name('krkagamanoterbit.create');
Route::post('/krkagamanoterbitnew/{id}', [KrkController::class, 'krkagamanoterbitnew'])->middleware('auth')->name('create.krkagamanoterbitnew');

Route::put('/valberkasagama4/{id}', [KrkController::class, 'valberkasagama4'])->name('valberkasagama4.update');

Route::get('/bekrkkeagamaanperbaikan/{id}', [KrkController::class, 'bekrkkeagamaanperbaikan'])->middleware('auth')->name('bekrkkeagamaanperbaikan.perbaikan');
Route::post('/bekrkkeagamaanperbaikannew/{id}', [KrkController::class, 'bekrkkeagamaanperbaikannew'])->middleware('auth')->name('bekrkkeagamaanperbaikannewupdate');

Route::delete('/dokbekrkkeagamaandelete/{id}', [KrkController::class, 'dokbekrkkeagamaandelete'])->middleware('auth')->name('delete.dokbekrkkeagamaandelete');


// -------
// MENU KRK SOSIAL BUDAYA
Route::get('/bekrksosbud', [KrkController::class, 'bekrksosbud'])->name('bekrksosbudindex');
Route::get('/bekrksosbudnew', [KrkController::class, 'bekrksosbudnew'])->name('bekrksosbudindexnew');

Route::get('/bekrksosbudpermohonan/{id}', [KrkController::class, 'bekrksosbudpermohonan'])->middleware('auth')->name('bekrksosbudpermohonan.show');
Route::put('/validasikrksosbud/{id}', [KrkController::class, 'validasikrksosbud'])->middleware('auth')->name('validasikrksosbud');
Route::put('/valberkassosbud1/{id}', [KrkController::class, 'valberkassosbud1'])->name('valberkassosbud1.update');
Route::get('/doklapkrksosbud/{id}', [KrkController::class, 'doklapkrksosbud'])->middleware('auth')->name('doklapkrksosbud.show');

Route::get('/doklapkrksosbudcreate/{id}', [KrkController::class, 'doklapkrksosbudcreate'])->middleware('auth')->name('ddoklapkrksosbudcreate.create');
Route::post('/doklapkrksosbudcreatenew', [KrkController::class, 'doklapkrksosbudcreatenew'])->middleware('auth')->name('create.doklapkrksosbudcreatenew');

Route::delete('/doklapkrksosbudcreatedelete/{id}', [KrkController::class, 'doklapkrksosbudcreatedelete'])->middleware('auth')->name('delete.doklapkrksosbudcreatedelete');

Route::put('/valberkassosbud2/{id}', [KrkController::class, 'valberkassosbud2'])->name('valberkassosbud2.update');
Route::post('/berkassosbudval/{id}/validate', [KrkController::class, 'berkassosbudval'])->name('berkassosbudval.validate');

Route::get('/perpengesahansosbud/{id}', [KrkController::class, 'perpengesahansosbud'])->name('permohonan.perpengesahansosbud');
Route::post('/perpengesahansosbudcreate/{id}', [KrkController::class, 'perpengesahansosbudcreate'])->name('permohonan.perpengesahansosbudcreate');
Route::get('/perpengesahansosbudman/{id}', [KrkController::class, 'perpengesahansosbudman'])->name('perpengesahansosbudman');

Route::get('/perpengesahansosbudber/{id}', [KrkController::class, 'perpengesahansosbudber'])->name('berkas.perpengesahansosbudber');
Route::delete('/krksosbudsuratdelete/{id}', [KrkController::class, 'krksosbudsuratdelete'])->name('krksosbudsuratdelete.destroy');


Route::put('/valberkassosbud3/{id}', [KrkController::class, 'valberkassosbud3'])->name('valberkassosbud3.update');

Route::get('/permohonankrksosbudfinal/{id}', [KrkController::class, 'permohonankrksosbudfinal'])->name('permohonan.permohonankrksosbudfinal');
Route::get('/permohonankrksosbudfinalman/{id}', [KrkController::class, 'permohonankrksosbudfinalman'])->name('permohonankrksosbudfinalman');

Route::get('/krksosbufnoterbit/{id}', [KrkController::class, 'krksosbufnoterbit'])->middleware('auth')->name('krksosbufnoterbit.create');
Route::post('/krksosbufnoterbitnew/{id}', [KrkController::class, 'krksosbufnoterbitnew'])->middleware('auth')->name('create.krksosbufnoterbitnew');

Route::put('/valberkassosbud4/{id}', [KrkController::class, 'valberkassosbud4'])->name('valberkassosbud3.update');


Route::delete('/dokbekrksosbuddelete/{id}', [KrkController::class, 'dokbekrksosbuddelete'])->middleware('auth')->name('delete.dokbekrksosbuddelete');

// PERBAIAKN DARI SISI ADMIN
Route::get('/bekrksosbudperbaikanadmin/{id}', [KrkController::class, 'bekrksosbudperbaikanadmin'])->middleware('auth')->name('bekrksosbudperbaikan.perbaikan');
Route::post('/bekrksosbudperbaikannewadmin/{id}', [KrkController::class, 'bekrksosbudperbaikannewadmin'])->middleware('auth')->name('bekrksosbudperbaikannewupdateadmin');

Route::get('/bekrksosbudperbaikan/{id}', [KrkController::class, 'bekrksosbudperbaikan'])->middleware('auth')->name('bekrksosbudperbaikan.perbaikan');
Route::post('/bekrksosbudperbaikannew/{id}', [KrkController::class, 'bekrksosbudperbaikannew'])->middleware('auth')->name('bekrksosbudperbaikannewupdate');


// Route::delete('/dokbekrkkeagamaandelete/{id}', [KrkController::class, 'dokbekrkkeagamaandelete'])->middleware('auth')->name('delete.dokbekrkkeagamaandelete');


// MENU 04 BANTUAN TEKNIS
Route::get('/bebantuanteknisindex', [BantuanteknisController::class, 'bebantuanteknisindex'])->middleware('auth')->name('bebantuanteknisindexmenu');
Route::get('/bebantuanteknis', [BantuanteknisController::class, 'bebantuanteknisberkas'])->middleware('auth')->name('bebantuanteknissemua');
// Route::delete('/bebantuanteknisdelete/{id}', [AdministratorController::class, 'bebantuanteknisdelete'])->middleware('auth')->name('delete.bantuanteknis');
Route::delete('/bebantuanteknisdelete/{id}', [BantuanteknisController::class, 'bebantuanteknisdelete'])->middleware('auth')->name('delete.bantuanteknis');


// DAFTAR SURAT PERMOHONAN BERKAS 1
Route::get('/bebantuanteknisassistensi', [BantuanteknisController::class, 'bebantuanteknisassistensi'])->middleware('auth', 'can:superadmin')->name('bebantuanteknisassistensiindex');
Route::get('/beasistensishow/{id}', [BantuanteknisController::class, 'beasistensishow'])->middleware('auth')->name('beasistensishowberkas1.show');
Route::put('/validasidokumenbantek/{id}', [BantuanteknisController::class, 'validasidokumenberkasbantek'])->middleware('auth')->name('validasidokumenbantek');
Route::get('/bebantekpemohondinasperbaikan/{id}', [BantuanteknisController::class, 'bebantekpemohondinasperbaikan'])->middleware('auth')->name('bebantekpemohondinasperbaikan.perbaikan');
Route::post('/bebantekpemohondinasperbaikans/{id}', [BantuanteknisController::class, 'bebantuanteknislapanganberkasbaru'])->middleware('auth')->name('bebantekpemohondinasperbaikan.uploads');


// DAFTAR SURAT PERMOHONAN BERKAS 2
Route::get('/bepenelitikontrak', [BantuanteknisController::class, 'bepenelitikontrak'])->middleware('auth')->name('bepenelitikontrakindex');
Route::get('/bebantuanteknisshow/{id}', [BantuanteknisController::class, 'bebantuanteknisberkasshow'])->middleware('auth')->name('bebantuanteknis.show');
Route::put('/validasidokumenbantek2/{id}', [BantuanteknisController::class, 'validasidokumenberkasbantek2'])->middleware('auth')->name('validasidokumenbantek2');
Route::get('/bebantekperpeneliti/{id}', [BantuanteknisController::class, 'bebantekperpeneliti'])->middleware('auth')->name('bebantekperpeneliti.perbaikan');
Route::post('/bebantekperpenelitiperbaikan/{id}', [BantuanteknisController::class, 'bebantekperpenelitiperbaikan'])->middleware('auth')->name('bebantekperpenelitiperbaikan');


// DAFTAR SURAT PERMOHONAN BERKAS 3
Route::get('/beperhitunganpenyusutan', [BantuanteknisController::class, 'beperhitunganpenyusutan'])->middleware('auth')->name('beperhitunganpenyusutanindex');
Route::get('/beperhitunganpenyusutanshow/{id}', [BantuanteknisController::class, 'beperhitunganpenyusutanshow'])->middleware('auth')->name('beperhitunganpenyusutan.show');
Route::put('/validasidokumenbantek3/{id}', [BantuanteknisController::class, 'validasidokumenberkasbantek3'])->middleware('auth')->name('validasidokumenbantek3');
Route::get('/beperhitunganpenyusutanper/{id}', [BantuanteknisController::class, 'beperhitunganpenyusutanper'])->middleware('auth')->name('beperhitunganpenyusutanper.perbaikan');
Route::post('/beperhitunganpenyusutanpernew/{id}', [BantuanteknisController::class, 'beperhitunganpenyusutanpernew'])->middleware('auth')->name('beperhitunganpenyusutanpernew');


// DAFTAR SURAT PERMOHONAN BERKAS 4
Route::get('/beperhitungankerusakan', [BantuanteknisController::class, 'beperhitungankerusakan'])->middleware('auth')->name('beperhitungankerusakanindex');
Route::get('/beperhitungankerusakanshow/{id}', [BantuanteknisController::class, 'beperhitungankerusakanshow'])->middleware('auth')->name('beperhitungankerusakan.show');
Route::put('/validasidokumenbantek4/{id}', [BantuanteknisController::class, 'validasidokumenberkasbantek4'])->middleware('auth')->name('validasidokumenbantek4');
Route::get('/beperhitungankerusakanper/{id}', [BantuanteknisController::class, 'beperhitungankerusakanper'])->middleware('auth')->name('beperhitungankerusakanper.perbaikan');
Route::post('/beperhitungankerusakanpernew/{id}', [BantuanteknisController::class, 'beperhitungankerusakanpernew'])->middleware('auth')->name('beperhitungankerusakanpernew');



// DAFTAR SURAT PERMOHONAN BERKAS 5
Route::get('/beperhitunganbgn', [BantuanteknisController::class, 'beperhitunganbgn'])->middleware('auth')->name('beperhitunganbgnindex');
Route::get('/beperhitunganbgnshow/{id}', [BantuanteknisController::class, 'beperhitunganbgnshow'])->middleware('auth')->name('beperhitunganbgnshow.show');
Route::put('/validasidokumenbantek5/{id}', [BantuanteknisController::class, 'validasidokumenberkasbantek5'])->middleware('auth')->name('validasidokumenbantek5');
Route::get('/beperhitunganbgnper/{id}', [BantuanteknisController::class, 'beperhitunganbgnper'])->middleware('auth')->name('beperhitunganbgnper.perbaikan');
Route::post('/beperhitunganbgnpernew/{id}', [BantuanteknisController::class, 'beperhitunganbgnpernew'])->middleware('auth')->name('beperhitunganbgnpernew');

// DAFTAR SURAT PERMOHONAN BERKAS 6
Route::get('/bekonstruksiperhitunganbgn', [BantuanteknisController::class, 'bekonstruksiperhitunganbgn'])->middleware('auth')->name('bekonstruksiperhitunganbgnindex');
Route::get('/bekonstruksiperhitunganbgnshow/{id}', [BantuanteknisController::class, 'bekonstruksiperhitunganbgnshow'])->middleware('auth')->name('bekonstruksiperhitunganbgn.show');
Route::put('/validasidokumenbantek6/{id}', [BantuanteknisController::class, 'validasidokumenberkasbantek6'])->middleware('auth')->name('validasidokumenbantek6');
Route::get('/bekonstruksiperhitunganbgnper/{id}', [BantuanteknisController::class, 'bekonstruksiperhitunganbgnper'])->middleware('auth')->name('bekonstruksiperhitunganbgnper.perbaikan');
Route::post('/bekonstruksiperhitunganbgnnew/{id}', [BantuanteknisController::class, 'bekonstruksiperhitunganbgnnew'])->middleware('auth')->name('bekonstruksiperhitunganbgnnew');

// DAFTAR SURAT PERMOHONAN BERKAS 7
Route::get('/beserahterima', [BantuanteknisController::class, 'beserahterima'])->middleware('auth')->name('beserahterimaindex');
Route::get('/beserahterimashow/{id}', [BantuanteknisController::class, 'beserahterimashow'])->middleware('auth')->name('beserahterima.show');
Route::put('/validasidokumenbantek7/{id}', [BantuanteknisController::class, 'validasidokumenberkasbantek7'])->middleware('auth')->name('validasidokumenbantek7');
Route::get('/beserahterimaper/{id}', [BantuanteknisController::class, 'beserahterimaper'])->middleware('auth')->name('beserahterimaper.perbaikan');
Route::post('/beserahterimapernew/{id}', [BantuanteknisController::class, 'beserahterimapernew'])->middleware('auth')->name('beserahterimapernew');

// SIGIT SURAT

// DAFTAR SURAT PERMOHONAN BERKAS 8
Route::get('/bepersontimteknis', [BantuanteknisController::class, 'bepersontimteknis'])->middleware('auth')->name('bepersontimteknisindex');
Route::get('/bepersontimteknisshow/{id}', [BantuanteknisController::class, 'bepersontimteknisshow'])->middleware('auth')->name('bepersontimteknis.show');
Route::put('/validasidokumenbantek8/{id}', [BantuanteknisController::class, 'validasidokumenberkasbantek8'])->middleware('auth')->name('validasidokumenbantek8');
Route::get('/bepersontimteknisper/{id}', [BantuanteknisController::class, 'bepersontimteknisper'])->middleware('auth')->name('bepersontimteknisper.perbaikan');
Route::post('/bepersontimteknispernew/{id}', [BantuanteknisController::class, 'bepersontimteknispernew'])->middleware('auth')->name('bepersontimteknispernew');

// SIGIT
// DAFTAR SURAT PERMOHONAN BERKAS 2

// Route::get('/bebantuanteknisshowvalidasi/{id}', [BantuanteknisController::class, 'bebantuanteknisberkasshow'])->middleware('auth')->name('validasidokumenbantek');
// VERIFIKASI BANTUAN TEKNIS


Route::put('/validasiberkas1permohonan1/{id}', [BantuanteknisController::class, 'valsuratpermohonan1'])->name('validasiberkas1.update');
Route::put('/validasiberkas1permohonan2/{id}', [BantuanteknisController::class, 'valsuratpermohonan2'])->name('validasiberkas2.update');
Route::put('/validasiberkas1permohonan3/{id}', [BantuanteknisController::class, 'valsuratpermohonan3'])->name('validasiberkas3.update');
Route::put('/validasiberkas1permohonan4/{id}', [BantuanteknisController::class, 'valsuratpermohonan4'])->name('validasiberkas4.update');

// SURAT PERMOHONAN 2

Route::put('/validasiberkas2permohonan1/{id}', [BantuanteknisController::class, 'valsurat2permohonan1'])->name('valsurat2permohonan1.update');
Route::put('/validasiberkas2permohonan2/{id}', [BantuanteknisController::class, 'valsurat2permohonan2'])->name('valsurat2permohonan2.update');
Route::put('/validasiberkas2permohonan3/{id}', [BantuanteknisController::class, 'valsurat2permohonan3'])->name('valsurat2permohonan3.update');
Route::put('/validasiberkas2permohonan4/{id}', [BantuanteknisController::class, 'valsurat2permohonan4'])->name('valsurat2permohonan4.update');

// SURAT PERMOHONAN 3

Route::put('/validasiberkas3permohonan1/{id}', [BantuanteknisController::class, 'valsurat3permohonan1'])->name('valsurat3permohonan1.update');
Route::put('/validasiberkas3permohonan2/{id}', [BantuanteknisController::class, 'valsurat3permohonan2'])->name('valsurat3permohonan2.update');
Route::put('/validasiberkas3permohonan3/{id}', [BantuanteknisController::class, 'valsurat3permohonan3'])->name('valsurat3permohonan3.update');
Route::put('/validasiberkas3permohonan4/{id}', [BantuanteknisController::class, 'valsurat3permohonan4'])->name('valsurat3permohonan4.update');

// SURAT PERMOHONAN 4

Route::put('/validasiberkas4permohonan1/{id}', [BantuanteknisController::class, 'valsurat4permohonan1'])->name('valsurat4permohonan1.update');
Route::put('/validasiberkas4permohonan2/{id}', [BantuanteknisController::class, 'valsurat4permohonan2'])->name('valsurat4permohonan2.update');
Route::put('/validasiberkas4permohonan3/{id}', [BantuanteknisController::class, 'valsurat4permohonan3'])->name('valsurat4permohonan3.update');
Route::put('/validasiberkas4permohonan4/{id}', [BantuanteknisController::class, 'valsurat4permohonan4'])->name('valsurat4permohonan4.update');

// SURAT PERMOHONAN 5

Route::put('/validasiberkas5permohonan1/{id}', [BantuanteknisController::class, 'valsurat5permohonan1'])->name('valsurat5permohonan1.update');
Route::put('/validasiberkas5permohonan2/{id}', [BantuanteknisController::class, 'valsurat5permohonan2'])->name('valsurat5permohonan2.update');
Route::put('/validasiberkas5permohonan3/{id}', [BantuanteknisController::class, 'valsurat5permohonan3'])->name('valsurat5permohonan3.update');
Route::put('/validasiberkas5permohonan4/{id}', [BantuanteknisController::class, 'valsurat5permohonan4'])->name('valsurat5permohonan4.update');

// SURAT PERMOHONAN 6
Route::put('/validasiberkas6permohonan1/{id}', [BantuanteknisController::class, 'valsurat6permohonan1'])->name('valsurat6permohonan1.update');
Route::put('/validasiberkas6permohonan2/{id}', [BantuanteknisController::class, 'valsurat6permohonan2'])->name('valsurat6permohonan2.update');
Route::put('/validasiberkas6permohonan3/{id}', [BantuanteknisController::class, 'valsurat6permohonan3'])->name('valsurat6permohonan3.update');
Route::put('/validasiberkas6permohonan4/{id}', [BantuanteknisController::class, 'valsurat6permohonan4'])->name('valsurat6permohonan4.update');


// SURAT PERMOHONAN 7

Route::put('/validasiberkas7permohonan1/{id}', [BantuanteknisController::class, 'valsurat7permohonan1'])->name('valsurat7permohonan1.update');
Route::put('/validasiberkas7permohonan2/{id}', [BantuanteknisController::class, 'valsurat7permohonan2'])->name('valsurat7permohonan2.update');
Route::put('/validasiberkas7permohonan3/{id}', [BantuanteknisController::class, 'valsurat7permohonan3'])->name('valsurat7permohonan3.update');
Route::put('/validasiberkas7permohonan4/{id}', [BantuanteknisController::class, 'valsurat7permohonan4'])->name('valsurat7permohonan4.update');


// SURAT PERMOHONAN 8
Route::put('/validasiberkas8permohonan1/{id}', [BantuanteknisController::class, 'valsurat8permohonan1'])->name('valsurat8permohonan1.update');
Route::put('/validasiberkas8permohonan2/{id}', [BantuanteknisController::class, 'valsurat8permohonan2'])->name('valsurat8permohonan2.update');
Route::put('/validasiberkas8permohonan3/{id}', [BantuanteknisController::class, 'valsurat8permohonan3'])->name('valsurat8permohonan3.update');
Route::put('/validasiberkas8permohonan4/{id}', [BantuanteknisController::class, 'valsurat8permohonan4'])->name('valsurat8permohonan4.update');


Route::get('/bebanteklap/{id}', [BantuanteknisController::class, 'bebanteklap'])->middleware('auth')->name('bebantuanteknislapa.show');

// UPLOAD CEK LAPANGAN KE SURAT KE 3
Route::get('/bebanteklapper3/{id}', [BantuanteknisController::class, 'bebanteklapper3'])->middleware('auth')->name('bebanteklapper3.show');
Route::get('/bebanteklapper3create/{id}', [BantuanteknisController::class, 'bebanteklapper3create'])->middleware('auth')->name('bebanteklapper3create.create');
Route::post('/bebanteklapper3createnew', [BantuanteknisController::class, 'bebanteklapper3createnew'])->middleware('auth')->name('create.bebanteklapper3create');
Route::delete('/bebanteklapper3delete/{id}', [BantuanteknisController::class, 'bebanteklapper3delete'])->middleware('auth')->name('delete.bebanteklapper3delete');

// UPLOAD CEK LAPANGAN KE SURAT KE 4
Route::get('/bebanteklapper4/{id}', [BantuanteknisController::class, 'bebanteklapper4'])->middleware('auth')->name('bebanteklapper4.show');
Route::get('/bebanteklapper4create/{id}', [BantuanteknisController::class, 'bebanteklapper4create'])->middleware('auth')->name('bebanteklapper4create.create');
Route::post('/bebanteklapper4createnew', [BantuanteknisController::class, 'bebanteklapper4createnew'])->middleware('auth')->name('create.bebanteklapper4create');
Route::delete('/bebanteklapper4delete/{id}', [BantuanteknisController::class, 'bebanteklapper4delete'])->middleware('auth')->name('delete.bebanteklapper4delete');

// UPLOAD CEK LAPANGAN KE SURAT KE 5
Route::get('/bebanteklapper5/{id}', [BantuanteknisController::class, 'bebanteklapper5'])->middleware('auth')->name('bebanteklapper5.show');
Route::get('/bebanteklapper5create/{id}', [BantuanteknisController::class, 'bebanteklapper5create'])->middleware('auth')->name('bebanteklapper5create.create');
Route::post('/bebanteklapper5createnew', [BantuanteknisController::class, 'bebanteklapper5createnew'])->middleware('auth')->name('create.bebanteklapper5create');
Route::delete('/bebanteklapper5delete/{id}', [BantuanteknisController::class, 'bebanteklapper5delete'])->middleware('auth')->name('delete.bebanteklapper5delete');

// UPLOAD CEK LAPANGAN KE SURAT KE 6
Route::get('/bebanteklapper6/{id}', [BantuanteknisController::class, 'bebanteklapper6'])->middleware('auth')->name('bebanteklapper6.show');
Route::get('/bebanteklapper6create/{id}', [BantuanteknisController::class, 'bebanteklapper6create'])->middleware('auth')->name('bebanteklapper6create.create');
Route::post('/bebanteklapper6createnew', [BantuanteknisController::class, 'bebanteklapper6createnew'])->middleware('auth')->name('create.bebanteklapper6create');
Route::delete('/bebanteklapper6delete/{id}', [BantuanteknisController::class, 'bebanteklapper6delete'])->middleware('auth')->name('delete.bebanteklapper6delete');

// UPLOAD CEK LAPANGAN KE SURAT KE 7
Route::get('/bebanteklapper7/{id}', [BantuanteknisController::class, 'bebanteklapper7'])->middleware('auth')->name('bebanteklapper7.show');
Route::get('/bebanteklapper7create/{id}', [BantuanteknisController::class, 'bebanteklapper7create'])->middleware('auth')->name('bebanteklapper7create.create');
Route::post('/bebanteklapper7createnew', [BantuanteknisController::class, 'bebanteklapper7createnew'])->middleware('auth')->name('create.bebanteklapper7create');
Route::delete('/bebanteklapper7delete/{id}', [BantuanteknisController::class, 'bebanteklapper7delete'])->middleware('auth')->name('delete.bebanteklapper7delete');
// SIGIT LAPANGAN

// UPLOAD CEK LAPANGAN KE SURAT KE 8
Route::get('/bebanteklapper8/{id}', [BantuanteknisController::class, 'bebanteklapper8'])->middleware('auth')->name('bebanteklapper8.show');
Route::get('/bebanteklapper8create/{id}', [BantuanteknisController::class, 'bebanteklapper8create'])->middleware('auth')->name('bebanteklapper8create.create');
Route::post('/bebanteklapper8createnew', [BantuanteknisController::class, 'bebanteklapper8createnew'])->middleware('auth')->name('create.bebanteklapper8create');
Route::delete('/bebanteklapper8delete/{id}', [BantuanteknisController::class, 'bebanteklapper8delete'])->middleware('auth')->name('delete.bebanteklapper8delete');



// VERIFIKASI DOKUMENTASI CEK LAPANGAN
Route::get('/bebantuanteknislapangan/{id}', [BantuanteknisController::class, 'bebantuanteknisceklapangan'])->middleware('auth')->name('bebantuanteknislapangan.show');
Route::get('/bebantuanteknislapangancreate/{id}', [BantuanteknisController::class, 'bebantuanteknislapangancreate'])->middleware('auth')->name('bebantuanteknislapangancreate.create');
Route::post('/bebantuanteknislapangancreate', [BantuanteknisController::class, 'bebantuanteknislapangancreatenew'])->middleware('auth')->name('create.ceklapanganbantektambah');

Route::delete('/bebantuanteknislapangandelete/{id}', [BantuanteknisController::class, 'bebantuanteknislapangandelete'])->middleware('auth')->name('delete.bebantuanteknislapangandelete');

Route::get('/bebantuanasistensilap/{id}', [BantuanteknisController::class, 'bebantuanasistensilap'])->middleware('auth')->name('bebantuanasistensilap.show');


Route::get('/bebantuanteknislapanganupload/{id}', [BantuanteknisController::class, 'bebantuanteknislapanganuploadnew'])->middleware('auth')->name('bebantuanteknislapangan.uploadberkas');
Route::get('/bebantuanteknislapanganuploads/{id}', [BantuanteknisController::class, 'bebantuanteknislapanganuploadnews'])->middleware('auth')->name('bebantuanteknislapangan.uploadberkasnew');


// UPLOAD SURAT BANTEK 2
Route::get('/bebantekupload2/{id}', [BantuanteknisController::class, 'bebantekupload2berkas'])->middleware('auth')->name('bebantuanteknislapangan.uploadberkasnew2');
Route::post('/bebantekupload2new/{id}', [BantuanteknisController::class, 'bebantekupload2new'])->middleware('auth')->name('upload.bebantekupload2new');

// UPLOAD SURAT BANTEK 3
Route::get('/bebantekupload3/{id}', [BantuanteknisController::class, 'bebantekupload3berkas'])->middleware('auth')->name('bebantek3.uploadberkasnew3');
Route::post('/bebantekupload3new/{id}', [BantuanteknisController::class, 'bebantekupload3new'])->middleware('auth')->name('upload.bebantekupload3new');

// UPLOAD SURAT BANTEK 4
Route::get('/bebantekupload4/{id}', [BantuanteknisController::class, 'bebantekupload4berkas'])->middleware('auth')->name('bebantek4.uploadberkasnew4');
Route::post('/bebantekupload4new/{id}', [BantuanteknisController::class, 'bebantekupload4new'])->middleware('auth')->name('upload.bebantekupload4new');

// UPLOAD SURAT BANTEK 5
Route::get('/bebantekupload5/{id}', [BantuanteknisController::class, 'bebantekupload5berkas'])->middleware('auth')->name('bebantek5.uploadberkasnew5');
Route::post('/bebantekupload5new/{id}', [BantuanteknisController::class, 'bebantekupload5new'])->middleware('auth')->name('upload.bebantekupload5new');

// UPLOAD SURAT BANTEK 6
Route::get('/bebantekupload6/{id}', [BantuanteknisController::class, 'bebantekupload6berkas'])->middleware('auth')->name('bebantek6.uploadberkasnew6');
Route::post('/bebantekupload6new/{id}', [BantuanteknisController::class, 'bebantekupload6new'])->middleware('auth')->name('upload.bebantekupload6new');

// UPLOAD SURAT BANTEK 7
Route::get('/bebantekupload7/{id}', [BantuanteknisController::class, 'bebantekupload7berkas'])->middleware('auth')->name('bebantek7.uploadberkasnew7');
Route::post('/bebantekupload7new/{id}', [BantuanteknisController::class, 'bebantekupload7new'])->middleware('auth')->name('upload.bebantekupload7new');

// UPLOAD SURAT BANTEK 8
Route::get('/bebantekupload8/{id}', [BantuanteknisController::class, 'bebantekupload8berkas'])->middleware('auth')->name('bebantek8.uploadberkasnew8');
Route::post('/bebantekupload7new/{id}', [BantuanteknisController::class, 'bebantekupload7new'])->middleware('auth')->name('upload.bebantekupload7new');


// BANTUAN TEKNIS TERBITKAN SERTIFIKAT
// Route::get('/bebantuanteknissertifikat/{id}', [BantuanteknisController::class, 'bebantuanteknislapangancreate'])->middleware('auth')->name('bebantuanteknissertifikat.upload');
Route::post('/bebantuanteknislapanganuploadnew/{id}', [BantuanteknisController::class, 'bebantuanteknislapanganberkas'])->middleware('auth')->name('upload.bebantuanteknislapanganuploadnew');

// AKUN PEMOHON BANTEK
Route::get('/bebantekpemohondinas', [BantuanteknisController::class, 'bebantekpemohondinas'])->middleware('auth')->name('bebantekpemohondinasindex');
Route::get('/bebantekpemohonasistensi', [BantuanteknisController::class, 'bebantekpemohonasistensi'])->middleware('auth')->name('bebantekpemohonasistensiindex');
// PERBAIKAN DATA BERKAS

Route::get('/bebantekceklapangan/{id}', [BantuanteknisController::class, 'bebantekceklapangandok'])->middleware('auth')->name('bebantekceklapangan.show');

// AKUN DINAS BANTUAN TEKNIS
Route::get('/bebantekakundinas', [BantuanteknisController::class, 'bebantekakundinasistensi'])->middleware('auth')->name('bebantekakundinasindex');
Route::get('/bebantekakunkonsultan', [BantuanteknisController::class, 'bebantekakunkonsultan'])->middleware('auth')->name('bebantekakunkonsultanindex');


// SIGIT DINAS

Route::get('/bebantekdinasasistensi', [BantuanteknisController::class, 'bebantekdinasasistensi'])->middleware('auth', 'can:dinas-atau-pemohon')->name('bebantekdinasasistensiindex');

Route::get('/bebantekakundinasberkas', [BantuanteknisController::class, 'bebantekakundinasberkas'])->middleware('auth', 'can:dinas-atau-pemohon')->name('bebantekakundinasberkasindex');
Route::get('/bebantekdinaspenyusutan', [BantuanteknisController::class, 'bebantekdinaspenyusutan'])->middleware('auth', 'can:dinas-atau-pemohon')->name('bebantekdinaspenyusutanindex');
Route::get('/bebantekdinaskerusakan', [BantuanteknisController::class, 'bebantekdinaskerusakan'])->middleware('auth', 'can:dinas-atau-pemohon')->name('bebantekdinaskerusakanindex');
Route::get('/bebantekdinaspemeliharaan', [BantuanteknisController::class, 'bebantekdinaspemeliharaan'])->middleware('auth', 'can:dinas-atau-pemohon')->name('bebantekdinaspemeliharaanindex');
Route::get('/bebantekdinasperhibgn', [BantuanteknisController::class, 'bebantekdinasperhibgn'])->middleware('auth', 'can:dinas-atau-pemohon')->name('bebantekdinasperhibgnindex');
Route::get('/bebantekdinasserahterima', [BantuanteknisController::class, 'bebantekdinasserahterima'])->middleware('auth', 'can:dinas-atau-pemohon')->name('bebantekdinasserahterimaindex');
Route::get('/bebantekdinaspersonil', [BantuanteknisController::class, 'bebantekdinaspersonil'])->middleware('auth', 'can:dinas-atau-pemohon')->name('bebantekdinaspersonilindex');

Route::get('/datapermohonandinas', [AdminDashboardController::class, 'dashboarddinas']);
Route::get('/beakunkonsultanasistensi', [BantuanteknisController::class, 'bebantekkonsultandataakun'])->middleware('auth')->name('bebantekkonsultanindex');

// AKUN JASA KONSULTAN ASISTENSI

Route::get('/bebantekdaftarkonsultan', [BantuanteknisController::class, 'bebantekdaftarkonsultan'])->middleware('auth')->name('bebantekdaftarkonsultanindex');
Route::get('/bebantekdaftarkonsultapilih/{id}', [BantuanteknisController::class, 'bebantekdaftarkonsultapilih'])->middleware('auth')->name('bebantekdaftarkonsultapilih.show');

Route::post('/bebantekdaftarkonsultapilihnew/{id}', [BantuanteknisController::class, 'bebantekdaftarkonsultapilihnew'])->middleware('auth')->name('update.bebantekdaftarkonsultapilihnew');
Route::get('/bebantekdaftarkonsultanproses', [BantuanteknisController::class, 'bebantekdaftarkonsultanproses'])->middleware('auth')->name('bebantekdaftarkonsultanproses');

Route::get('/bebantekdaftarkonsultanproses', [BantuanteknisController::class, 'bebantekdaftarkonsultanproses'])->middleware('auth')->name('bebantekdaftarceklapangan');

Route::get('/bebantekkonsultan', [BantuanteknisController::class, 'bebantekkonsultandata'])->middleware('auth')->name('bebantekkonsultanindex');
Route::get('/bebantekkonsultannew', [BantuanteknisController::class, 'bebantekkonsultannew'])->middleware('auth')->name('bebantekkonsultannew.create');
Route::post('/bebantekkonsultannewjasa', [BantuanteknisController::class, 'bebantekkonsultannewjasa'])->middleware('auth')->name('create.bebantekkonsultannewjasa');

Route::get('/bebanteklapcekdokcreate/{id}', [BantuanteknisController::class, 'bebanteklapcekdokcreate'])->middleware('auth')->name('bebanteklapcekdokcreate.create');
Route::post('/bebanteklapcekdokcreatenew', [BantuanteknisController::class, 'bebanteklapcekdokcreatenew'])->middleware('auth')->name('create.bebanteklapcekdokcreate');
Route::delete('/bebanteklapcekdokcredelete/{id}', [BantuanteknisController::class, 'bebanteklapcekdokcredelete'])->middleware('auth')->name('delete.bebanteklapcekdokcredelete');

Route::get('/bepengkajiteknis', [BantuanteknisController::class, 'bepengkajiteknis'])->middleware('auth')->name('bepengkajiteknis');
Route::delete('/bepengkajiteknisdelete/{id}', [BantuanteknisController::class, 'bepengkajiteknisdelete'])->middleware('auth')->name('bepengkajiteknisdelete');
Route::get('/bepengkajiteknisnew', [BantuanteknisController::class, 'bepengkajiteknisnew'])->middleware('auth')->name('bepengkajiteknisnew');
Route::post('/bepengkajiteknisnewcreate', [BantuanteknisController::class, 'bepengkajiteknisnewcreate'])->middleware('auth')->name('bepengkajiteknisnewcreate');



Route::get('/allakun', [akuncontroller::class, 'allakun'])->middleware('auth')->name('allakun.showdata');
Route::delete('/allakundelete/{id}', [akuncontroller::class, 'allakundelete'])->middleware('auth')->name('delete.allakundelete');

Route::get('/allakundinas', [akuncontroller::class, 'allakundinas'])->middleware('auth')->name('allakundinas.showdata');
Route::get('/allakunkonsultan', [akuncontroller::class, 'allakunkonsultan'])->middleware('auth')->name('allakunkonsultan.showdata');
Route::get('/allakuninternal', [akuncontroller::class, 'allakuninternal'])->middleware('auth')->name('allakuninternal.showdata');


Route::get('/allakuncreate', [akuncontroller::class, 'allakuncreate'])->middleware('auth')->name('allakuncreate.create');
Route::post('/allakuncreatenew', [akuncontroller::class, 'allakuncreatenew'])->middleware('auth')->name('create.allakuncreatenew');
// MENU AKUN SEMUA


// MENU BACKEND PERJALANAN DINAS
Route::get('/bepetugasdinas', [PerjalanandinasController::class, 'bepetugasdinas'])->middleware('auth')->name('bepetugasdinasindex');
Route::delete('/bepetugasdinasdelete/{id}', [PerjalanandinasController::class, 'bepetugasdinasdelete'])->middleware('auth')->name('delete.bepetugasdinasdelete');


Route::get('/beperjalanandinas', [PerjalanandinasController::class, 'beperjalanandinas'])->middleware('auth')->name('beperjalanandinasindex');
Route::get('/beperjalanandinasin', [PerjalanandinasController::class, 'beperjalanandinasin'])->middleware('auth')->name('beperjalanandinasinindex');
Route::post('/beperjalanandinasnew', [PerjalanandinasController::class, 'beperjalanandinasnew'])->middleware('auth')->name('beperjalanandinasnew');

Route::get('/cek-jadwal-perjalanan', [PerjalananDinasController::class, 'cekTanggal'])->name('cek.tanggal.perjalanan');
Route::get('/cek-rentang-perjalanan', [PerjalananDinasController::class, 'cekRentang'])->name('cek.rentang.perjalanan');

Route::get('/dataalldinassurat', [PerjalanandinasController::class, 'dataalldinassurat'])->name('dataalldinassurat.index');
Route::get('/dataalldinassuratin', [PerjalanandinasController::class, 'dataalldinassuratin'])->name('dataalldinassuratin.index');

Route::get('/datastatistiksuratdinas', [PerjalanandinasController::class, 'datastatistiksuratdinas'])->name('datastatistiksuratdinas');

Route::get('/dataalldinassuratshow/{id}', [PerjalanandinasController::class, 'dataalldinassuratshow'])->middleware('auth')->name('dataalldinassuratshow.detail');

Route::get('/dataalldinassuratlap/{id}', [PerjalanandinasController::class, 'dataalldinassuratlap'])->middleware('auth')->name('dataalldinassuratlap.show');

Route::get('/databadokdinasint/{id}', [PerjalanandinasController::class, 'databadokdinasint'])->middleware('auth')->name('databadokdinasint');

Route::delete('/dataalldinassuratdelete/{id}', [PerjalanandinasController::class, 'dataalldinassuratdelete'])->middleware('auth')->name('dataalldinassuratdelete');

Route::get('/dataalldinassuratdokcreate/{id}', [PerjalanandinasController::class, 'dataalldinassuratdokcreate'])->middleware('auth')->name('dataalldinassuratdokcreate');
Route::post('/dataalldinassuratdokcreatenew', [PerjalanandinasController::class, 'dataalldinassuratdokcreatenew'])->middleware('auth')->name('dataalldinassuratdokcreatenew');


Route::delete('/dataalldinasdelete/{id}', [PerjalanandinasController::class, 'dataalldinasdelete'])->middleware('auth')->name('dataalldinasdelete');

Route::get('/beperjalanadinasba/{id}', [PerjalanandinasController::class, 'beperjalanadinasba'])->middleware('auth')->name('beperjalanadinasba');

Route::post('/beperjalanadinasbaupload/{id}', [PerjalanandinasController::class, 'beperjalanadinasbaupload'])->middleware('auth')->name('beperjalanadinasbaupload');

Route::get('/beperjalanadinasbainternal/{id}', [PerjalanandinasController::class, 'beperjalanadinasbainternal'])->middleware('auth')->name('beperjalanadinasbainternal');

Route::post('/beperjalanadinasbainternalnew/{id}', [PerjalanandinasController::class, 'beperjalanadinasbainternalnew'])->middleware('auth')->name('beperjalanadinasbainternalnew');

Route::get('/bedinaspetugasupdate/{id}', [PerjalanandinasController::class, 'bedinaspetugasupdate'])->middleware('auth')->name('bedinaspetugasupdate');
Route::post('/bedinaspetugasnewupdate/{id}', [PerjalanandinasController::class, 'bedinaspetugasnewupdate'])->middleware('auth')->name('bedinaspetugasnewupdate');

Route::get('/bedinaspetugas', [PerjalanandinasController::class, 'bedinaspetugas'])->middleware('auth')->name('bedinaspetugas');
Route::post('/bedinaspetugasnew', [PerjalanandinasController::class, 'bedinaspetugasnew'])->middleware('auth')->name('bedinaspetugasnew');

// MENU 06 KRK BACKEND

// MENU BERITA ABG BLORA BANGUNAN GEDUNG

Route::get('/beberita', [DatabaseAbgController::class, 'beberita'])->middleware('auth')->name('beberita');
Route::delete('/beberitadelete/{id}', [DatabaseAbgController::class, 'beberitadelete'])->middleware('auth')->name('beberitadelete');

Route::get('/beberitacreate', [DatabaseAbgController::class, 'beberitacreate'])->middleware('auth')->name('beberitacreate');
Route::post('/beberitacreatenew', [DatabaseAbgController::class, 'beberitacreatenew'])->middleware('auth')->name('beberitacreatenew');

Route::get('/beberitacreate/update/{id}', [DatabaseAbgController::class, 'beberitacreateupdate'])->middleware('auth')->name('beberitacreateupdate');
Route::put('/beberitacreate/updatenew/{id}', [DatabaseAbgController::class, 'beberitacreateupdatenew'])->middleware('auth')->name('beberitacreateupdatenew');


// MENU ARTIKEL BANGUNAN GEDUNG
Route::get('/beartikel', [DatabaseAbgController::class, 'beartikel'])->middleware('auth')->name('beartikel');

Route::get('/beartikelcreate', [DatabaseAbgController::class, 'beartikelcreate'])->middleware('auth')->name('beartikelcreate');
Route::post('/beartikelcreatenew', [DatabaseAbgController::class, 'beartikelcreatenew'])->middleware('auth')->name('beartikelcreatenew');

Route::delete('/beartikeldelete/{id}', [DatabaseAbgController::class, 'beartikeldelete'])->middleware('auth')->name('beartikeldelete');

// MENU AGENDA PELATIHAN BANGUNAN GEDUNG
Route::get('/daftaragenda/{id}', [AgendapelatihanabgController::class, 'daftaragendapelatihan'])->name('daftaragenda');
// Route::post('/pendaftaranpesertanew', [AgendapelatihanabgController::class, 'pendaftaranpesertanew'])->name('pendaftaranpesertanew');
Route::post('/pendaftaranpesertanew', [AgendapelatihanabgController::class, 'pendaftaranpesertanew'])->name('pendaftaranpesertanew');
Route::get('/beagendapelatihanabg', [AgendapelatihanabgController::class, 'beagendapelatihanabg'])->middleware('auth')->name('beagendapelatihanabg');

Route::get('/resagendapelatihan/{id}', [AgendapelatihanabgController::class, 'resagendapelatihan'])->middleware('auth');

// EDIT AGENDA PELATIHAN BRO
Route::get('/beagendapelatihanedit/{id}', [AgendapelatihanabgController::class, 'beagendapelatihanedit'])->middleware('auth')->name('agendapelatihanedit');
Route::post('/beagendapelatihaneditnew/{id}', [AgendapelatihanabgController::class, 'beagendapelatihaneditnew'])->middleware('auth')->name('agendapelatihaneditnew');

Route::delete('/beagendapelatihanabgdelete/{id}', [AgendapelatihanabgController::class, 'beagendapelatihanabgdelete'])->middleware('auth')->name('delete.beagendapelatihanabgdelete');

Route::get('/beagendapelatihanabgcreate', [AgendapelatihanabgController::class, 'beagendapelatihanabgcreate'])->middleware('auth')->name('beagendapelatihanabgcreate');
Route::post('/beagendapelatihanabgcreatenew', [AgendapelatihanabgController::class, 'beagendapelatihanabgcreatenew'])->middleware('auth')->name('beagendapelatihanabgcreatenew');


Route::get('/beagendapelatihanabgmateri/{id}', [AgendapelatihanabgController::class, 'beagendapelatihanabgmateri'])->middleware('auth')->name('beagendapelatihanabgmateri.show');
Route::get('/beagendapelatihanabgupload/{id}', [AgendapelatihanabgController::class, 'beagendapelatihanabgupload'])->middleware('auth')->name('beagendapelatihanabgupload');
Route::post('/beagendapelatihanabguploadnew', [AgendapelatihanabgController::class, 'beagendapelatihanabguploadnew'])->middleware('auth')->name('beagendapelatihanabguploadnew');

// sigit bro
Route::get('/beagendapeserta', [AgendapelatihanabgController::class, 'beagendapeserta'])->middleware('auth')->name('beagendapeserta');
Route::get('/beagendapesertalist/{id}', [AgendapelatihanabgController::class, 'beagendapesertalist'])->middleware('auth')->name('beagendapesertalist');

Route::delete('/beagendapesertadelete/{id}', [AgendapelatihanabgController::class, 'beagendapesertadelete'])->middleware('auth')->name('beagendapesertadelete');

Route::put('/verifikasipesertapelatihan/{id}', [AgendapelatihanabgController::class, 'verifikasipesertapelatihan'])->middleware('auth')->name('verifikasi.updatepesertapelatihan');

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

Route::get('/infobantek', [BantuanteknisController::class, 'infobantek']);
Route::get('/infobanteklampiran', [BantuanteknisController::class, 'infobanteklampiran']);
Route::get('/infobantekpetunjuk', [BantuanteknisController::class, 'infobantekpetunjuk']);
Route::get('/infobantekasistensi', [BantuanteknisController::class, 'infobantekasistensi']);
Route::get('/infobantekpeneliti', [BantuanteknisController::class, 'infobantekpeneliti']);
Route::get('/infobantekperhitungan', [BantuanteknisController::class, 'infobantekperhitungan']);
Route::get('/infobantekpemeliharaan', [BantuanteknisController::class, 'infobantekpemeliharaan']);
Route::get('/infobantekpendampingan', [BantuanteknisController::class, 'infobantekpendampingan']);
Route::get('/infobantektimteknis', [BantuanteknisController::class, 'infobantektimteknis']);

// DATABASE ABG BLORA ---------------------------------------------
Route::get('/datagsbblora', [DatabaseAbgController::class, 'datagsbblora'])->middleware('auth')->name('datagsbbloraindex');
Route::delete('/bedatagsbbloradelete/{id}', [DatabaseAbgController::class, 'bedatagsbbloradelete'])->middleware('auth')->name('delete.bedatagsbbloradelete');

Route::get('/datagsbbloraupdate/{id}', [DatabaseAbgController::class, 'datagsbbloraupdate'])->middleware('auth')->name('datagsbbloraupdate.perbaikan');
Route::post('/datagsbbloraupdatenew/{id}', [DatabaseAbgController::class, 'datagsbbloraupdatenew'])->middleware('auth')->name('datagsbbloraupdatenew.update');

// DATA KECAMATAN DAN DESA
Route::get('/datakecblora', [DatabaseAbgController::class, 'datakecblora'])->middleware('auth')->name('datakecbloraindex');
Route::delete('/datakecbloradelete/{id}', [DatabaseAbgController::class, 'datakecbloradelete'])->middleware('auth')->name('delete.datakecbloradelete');

// DATA KECAMATAN DAN DESA
Route::get('/datadesablora', [DatabaseAbgController::class, 'datadesablora'])->middleware('auth')->name('datadesabloraindex');
// Route::delete('/datakecbloradelete/{id}', [DatabaseAbgController::class, 'datakecbloradelete'])->middleware('auth')->name('delete.datakecbloradelete');

// DATA UNTUK JENIS PERMOHONAN BARU BANTUAN GAMBAR
Route::get('/datajenispermohonan', [DatabaseAbgController::class, 'datajenispermohonan'])->middleware('auth')->name('datajenispermohonanindex');
Route::delete('/datajenispermohonandelete/{id}', [DatabaseAbgController::class, 'datajenispermohonandelete'])->middleware('auth')->name('datajenispermohonandelete');

Route::get('/datajenispermohonancreate', [DatabaseAbgController::class, 'datajenispermohonancreate'])->middleware('auth')->name('datajenispermohonancreate');
Route::post('/datajenispermohonancreatenew', [DatabaseAbgController::class, 'datajenispermohonancreatenew'])->middleware('auth')->name('datajenispermohonancreatenew');

// DATA UNTUK FUNGSI BANGUNAN BANTUAN GAMBAR
Route::get('/datafungsibangunan', [DatabaseAbgController::class, 'datafungsibangunan'])->middleware('auth')->name('datafungsibangunanindex');
Route::delete('/datafungsibangunandelete/{id}', [DatabaseAbgController::class, 'datafungsibangunandelete'])->middleware('auth')->name('datafungsibangunandelete');

Route::get('/datafungsibangunancreate', [DatabaseAbgController::class, 'datafungsibangunancreate'])->middleware('auth')->name('datafungsibangunancreate');
Route::post('/datafungsibangunancreatenew', [DatabaseAbgController::class, 'datafungsibangunancreatenew'])->middleware('auth')->name('datafungsibangunancreatenew');

// DATA UNTUK FASILITATOR PBG BANGUNAN GEDUNG
Route::get('/datafasilitator', [DatabaseAbgController::class, 'datafasilitator'])->middleware('auth')->name('datafasilitatorindex');
Route::delete('/datafasilitatordelete/{id}', [DatabaseAbgController::class, 'datafasilitatordelete'])->middleware('auth')->name('datafasilitatordelete');

Route::get('/datafasilitatorcreate', [DatabaseAbgController::class, 'datafasilitatorcreate'])->middleware('auth')->name('datafasilitatorcreate');
Route::post('/datafasilitatorcreatenew', [DatabaseAbgController::class, 'datafasilitatorcreatenew'])->middleware('auth')->name('datafasilitatorcreatenew');


Route::get('/datainformasibantuangmbr', [DatabaseAbgController::class, 'datainformasibantuangmbr'])->middleware('auth')->name('datainformasibantuangmbr');
Route::get('/datambrblora', [DatabaseAbgController::class, 'datambrblora'])->middleware('auth')->name('datambrblora');
// Route::get('/datagsbbloraupdate/{id}', [DatabaseAbgController::class, 'datagsbbloraupdate'])->middleware('auth')->name('datagsbbloraupdate.perbaikan');
// Route::post('/datagsbbloraupdatenew/{id}', [DatabaseAbgController::class, 'datagsbbloraupdatenew'])->middleware('auth')->name('datagsbbloraupdatenew.update');

// MENU 07 PENILIK BANGUNAN
Route::get('/bedatapetugaspenilik', [PenilikbangunanController::class, 'bedatapetugaspenilik'])->middleware('auth')->name('bedatapetugaspenilik');
Route::get('/bedatapetugaspenilikcreate', [PenilikbangunanController::class, 'bedatapetugaspenilikcreate'])->middleware('auth')->name('bedatapetugaspenilikcreate');

Route::post('/bedatapetugaspenilikcreatenew', [PenilikbangunanController::class, 'bedatapetugaspenilikcreatenew'])->middleware('auth')->name('bedatapetugaspenilikcreatenew');

Route::delete('/bedatapetugaspenilikdelete/{id}', [PenilikbangunanController::class, 'bedatapetugaspenilikdelete'])->middleware('auth')->name('bedatapetugaspenilikdelete');

Route::get('/datanewpenilik', [PenilikbangunanController::class, 'datanewpenilik'])->middleware('auth')->name('datanewpenilik.create');
Route::post('/datanewpeniliknew', [PenilikbangunanController::class, 'datanewpeniliknew'])->middleware('auth')->name('datanewpeniliknew.create');

Route::get('/dataallpenilikbg', [PenilikbangunanController::class, 'dataallpenilikbg'])->name('dataallpenilikbg.index');
Route::get('/dataallpenilikbgupdate/{id}', [PenilikbangunanController::class, 'dataallpenilikbgupdate'])->name('dataallpenilikbgupdate');
Route::put('/dataallpenilikbgupdatenew/{id}', [PenilikbangunanController::class, 'dataallpenilikbgupdatenew'])->middleware('auth')->name('dataallpenilikbgupdatenew');

Route::get('/dataallpenilikbgregsimbg/{id}', [PenilikbangunanController::class, 'dataallpenilikbgregsimbg'])->name('dataallpenilikbgregsimbg');
Route::put('/dataallpenilikbgregsimbgnew/{id}', [PenilikbangunanController::class, 'dataallpenilikbgregsimbgnew'])->middleware('auth')->name('dataallpenilikbgregsimbgnew');

Route::get('/dataallpenilikuploadpbg/{id}', [PenilikbangunanController::class, 'dataallpenilikuploadpbg'])->name('dataallpenilikuploadpbg');
Route::put('/dataallpenilikuploadpbgnew/{id}', [PenilikbangunanController::class, 'dataallpenilikuploadpbgnew'])->middleware('auth')->name('dataallpenilikuploadpbgnew');

Route::get('/surattugaspenilik/{id}', [PenilikbangunanController::class, 'surattugaspenilik'])->middleware('auth')->name('surattugaspenilik');
Route::get('/surattugaspenilikcreate/{id}', [PenilikbangunanController::class, 'surattugaspenilikcreate'])->middleware('auth')->name('surattugaspenilikcreate');

Route::post('/surattugaspeniliknew', [PenilikbangunanController::class, 'surattugaspeniliknew'])->middleware('auth')->name('surattugaspeniliknew');

Route::delete('/suratpenilikdelete/{id}', [PenilikbangunanController::class, 'suratpenilikdelete'])->middleware('auth')->name('suratpenilikdelete');

Route::get('/surattugaspenilikshownew/{id}', [PenilikbangunanController::class, 'surattugaspenilikshownew'])->middleware('auth')->name('surattugaspenilikshownew.detail');

// Route::get('/surattugaspenilikshow/{id}', [PbgslfController::class, 'surattugaspenilikshow'])->middleware('auth')->name('surattugaspenilikshow');
Route::get('/bedatadasarpenilik/{id}', [PenilikbangunanController::class, 'bedatadasarpenilik'])->middleware('auth')->name('bedatadasarpenilik.show');
// Route::get('/bedatadasarpenilikberkas/{id}', [PenilikbangunanController::class, 'bedatadasarpenilikberkas'])->middleware('auth')->name('bedatadasarpenilikberkas.show');

Route::get('/bedatapeniliksurvey/{id}', [PenilikbangunanController::class, 'bedatapeniliksurvey'])->middleware('auth')->name('bedatapeniliksurvey.show');

Route::get('/dokpenilikpra/{id}', [PenilikbangunanController::class, 'dokpenilikpra'])->middleware('auth')->name('dokpenilikpra');

Route::get('/dokpenilikpracreate/{id}', [PenilikbangunanController::class, 'dokpenilikpracreate'])->middleware('auth')->name('dokpenilikpracreate');
Route::post('/dokpenilikpracreatenew', [PenilikbangunanController::class, 'dokpenilikpracreatenew'])->middleware('auth')->name('dokpenilikpracreatenew');

Route::get('/dokpenilikprafoto/{id}', [PenilikbangunanController::class, 'dokpenilikprafoto'])->middleware('auth')->name('dokpenilikprafoto');
Route::post('/dokpenilikprafotoupload', [PenilikbangunanController::class, 'dokpenilikprafotoupload'])->middleware('auth')->name('dokpenilikprafotoupload');

Route::delete('/fotopradelete/{id}', [PenilikbangunanController::class, 'fotopradelete'])->middleware('auth')->name('fotopradelete');
Route::delete('/prakegiatanfotopradelete/{id}', [PenilikbangunanController::class, 'prakegiatanfotopradelete'])->middleware('auth')->name('prakegiatanfotopradelete');

Route::get('/dokpenilikpasca/{id}', [PenilikbangunanController::class, 'dokpenilikpasca'])->middleware('auth')->name('dokpenilikpasca');

Route::get('/dokpenilikpascafoto/{id}', [PenilikbangunanController::class, 'dokpenilikpascafoto'])->middleware('auth')->name('dokpenilikpascafoto');
Route::post('/dokpenilikpascafotoupload', [PenilikbangunanController::class, 'dokpenilikpascafotoupload'])->middleware('auth')->name('dokpenilikpascafotoupload');

// in brot ----------
Route::delete('/fotopascadelete/{id}', [PenilikbangunanController::class, 'fotopascadelete'])->middleware('auth')->name('fotopascadelete');

Route::get('/dokpenilikpascacreate/{id}', [PenilikbangunanController::class, 'dokpenilikpascacreate'])->middleware('auth')->name('dokpenilikpascacreate');
Route::post('/dokpenilikpascacreatenew', [PenilikbangunanController::class, 'dokpenilikpascacreatenew'])->middleware('auth')->name('dokpenilikpascacreatenew');

// MENU 10 BACKEND DANA BANTUAN HIBAH

Route::get('/datanewhibah', [BantuanhibahbgController::class, 'hibahdokcreate'])->middleware('auth')->name('hibahdok.create');
Route::post('/datanewhibahnew', [BantuanhibahbgController::class, 'datanewhibahnew'])->middleware('auth')->name('dokhibahnew.create');
Route::get('/dataallhibahbangunan', [BantuanhibahbgController::class, 'dataallhibahbangunan'])->name('dataallhibahbangunan.index');
Route::get('/banhibahpermohonan/{id}', [BantuanhibahbgController::class, 'banhibahpermohonan'])->middleware('auth')->name('banhibahpermohonan.show');

Route::put('/valhibahbantuan1/{id}', [BantuanhibahbgController::class, 'valhibahbantuan1'])->name('valhibahbantuan1.update');
Route::get('/dokhibahbantuanberkas/{id}', [BantuanhibahbgController::class, 'dokhibahbantuanberkas'])->middleware('auth')->name('dokhibahbantuanberkas.show');

Route::get('/dokberkashibah/{id}', [BantuanhibahbgController::class, 'dokberkashibah'])->middleware('auth')->name('dokberkashibah.create');
Route::post('/dokberkashibahcreatenew', [BantuanhibahbgController::class, 'dokberkashibahcreatenew'])->middleware('auth')->name('create.dokberkashibahcreatenew');

Route::delete('/dokberkashibahcreatedelete/{id}', [BantuanhibahbgController::class, 'dokberkashibahcreatedelete'])->middleware('auth')->name('delete.dokberkashibahcreatedelete');

Route::get('/doklapbanhibah/{id}', [BantuanhibahbgController::class, 'doklapbanhibah'])->middleware('auth')->name('doklapbanhibah.show');

Route::get('/doklapbanhibahcreate/{id}', [BantuanhibahbgController::class, 'doklapbanhibahcreate'])->middleware('auth')->name('doklapbanhibahcreate.create');
Route::post('/doklapbanhibahcreatenew', [BantuanhibahbgController::class, 'doklapbanhibahcreatenew'])->middleware('auth')->name('create.doklapbanhibahcreatenew');

Route::delete('/doklapbanhibahcreatenewdelete/{id}', [BantuanhibahbgController::class, 'doklapbanhibahcreatenewdelete'])->middleware('auth')->name('delete.doklapbanhibahcreatenewdelete');
Route::put('/valberkashibah2/{id}', [BantuanhibahbgController::class, 'valberkashibah2'])->name('valberkashibah2.update');

Route::get('/dokuploadskhibah/{id}', [BantuanhibahbgController::class, 'dokuploadskhibah'])->middleware('auth')->name('dokuploadskhibah.show');

Route::get('/dokuploadhibahskcreate/{id}', [BantuanhibahbgController::class, 'dokuploadhibahskcreate'])->middleware('auth')->name('dokuploadhibahskcreate.create');
Route::post('/dokuploadhibahskcreatenew', [BantuanhibahbgController::class, 'dokuploadhibahskcreatenew'])->middleware('auth')->name('create.dokuploadhibahskcreatenew');

Route::delete('/dokuploadhibahskcrdelete/{id}', [BantuanhibahbgController::class, 'dokuploadhibahskcrdelete'])->middleware('auth')->name('delete.dokuploadhibahskcrdelete');

Route::put('/valberkashibah3/{id}', [BantuanhibahbgController::class, 'valberkashibah3'])->name('valberkashibah3.update');
Route::put('/valberkashibah4/{id}', [BantuanhibahbgController::class, 'valberkashibah4'])->name('valberkashibah4.update');

Route::get('/bestatistikhibah', [BantuanhibahbgController::class, 'bestatistikhibah']);

Route::delete('/dokbebanhibahdelete/{id}', [BantuanhibahbgController::class, 'dokbebanhibahdelete'])->middleware('auth')->name('delete.dokbebanhibahdelete');
Route::delete('/dokinspeksibangunandelete/{id}', [BantuanhibahbgController::class, 'dokinspeksibangunandelete'])->middleware('auth')->name('dokinspeksibangunandelete');

// -----------------------------------------------------------------
// MENU 01 PBG SLF
Route::get('/bepbgslfinformasi', [PbgslfController::class, 'bepbgslfinformasi'])->middleware('auth', 'can:admindpupr')->name('bepbgslfinformasi');

// -----------------------------------
Route::get('/bepbghunian', [PbgslfController::class, 'bepbghunian'])->middleware('auth', 'can:superadmin')->name('bepbghunian');
Route::get('/bepbghunianupdate/{id}', [PbgslfController::class, 'bepbghunianupdate'])->middleware('auth', 'can:superadmin')->name('bepbghunianupdate');
Route::post('/bepbghunianupdatenew/{id}', [PbgslfController::class, 'bepbghunianupdatenew'])->middleware('auth', 'can:superadmin')->name('bepbghunianupdatenew');

// -----------------------------------
Route::get('/bepbgkeagamaan', [PbgslfController::class, 'bepbgkeagamaan'])->middleware('auth', 'can:superadmin')->name('bepbgkeagamaan');
Route::get('/bepbgkeagamaanupdate/{id}', [PbgslfController::class, 'bepbgkeagamaanupdate'])->middleware('auth', 'can:superadmin')->name('bepbgkeagamaanupdate');
Route::post('/bepbgkeagamaanupdatenew/{id}', [PbgslfController::class, 'bepbgkeagamaanupdatenew'])->middleware('auth', 'can:superadmin')->name('bepbgkeagamaanupdatenew');

// -----------------------------------
Route::get('/bepbgprasarana', [PbgslfController::class, 'bepbgprasarana'])->middleware('auth', 'can:superadmin')->name('bepbgprasarana');
Route::get('/bepbgprasaranaupdate/{id}', [PbgslfController::class, 'bepbgprasaranaupdate'])->middleware('auth', 'can:superadmin')->name('bepbgprasaranaupdate');
Route::post('/bepbgprasaranaupdatenew/{id}', [PbgslfController::class, 'bepbgprasaranaupdatenew'])->middleware('auth', 'can:superadmin')->name('bepbgprasaranaupdatenew');

// -----------------------------------
Route::get('/bepbgsosialbudaya', [PbgslfController::class, 'bepbgsosialbudaya'])->middleware('auth', 'can:superadmin')->name('bepbgsosialbudaya');
Route::get('/bepbgsosialbudayaupdate/{id}', [PbgslfController::class, 'bepbgsosialbudayaupdate'])->middleware('auth', 'can:superadmin')->name('bepbgsosialbudayaupdate');
Route::post('/bepbgsosialbudayaupdatenew/{id}', [PbgslfController::class, 'bepbgsosialbudayaupdatenew'])->middleware('auth', 'can:superadmin')->name('bepbgsosialbudayaupdatenew');

// -----------------------------------
Route::get('/bepbgfungsiusaha', [PbgslfController::class, 'beslffungsiusaha'])->middleware('auth', 'can:superadmin')->name('beslffungsiusaha');
Route::get('/beslffungsiusahaupdate/{id}', [PbgslfController::class, 'beslffungsiusahaupdate'])->middleware('auth', 'can:superadmin')->name('beslffungsiusahaupdate');
Route::post('/beslffungsiusahaupdatenew/{id}', [PbgslfController::class, 'beslffungsiusahaupdatenew'])->middleware('auth', 'can:superadmin')->name('beslffungsiusahaupdatenew');

// -----------------------------------
Route::get('/bgslffungsiusaha', [PbgslfController::class, 'bgslffungsiusahanew'])->middleware('auth', 'can:superadmin')->name('bgslffungsiusahanew');
Route::get('/bgslffungsiusahanewupdate/{id}', [PbgslfController::class, 'bgslffungsiusahanewupdate'])->middleware('auth', 'can:superadmin')->name('bgslffungsiusahanewupdate');
Route::post('/bgslffungsiusahanewupdatenew/{id}', [PbgslfController::class, 'bgslffungsiusahanewupdatenew'])->middleware('auth', 'can:superadmin')->name('bgslffungsiusahanewupdatenew');


// -----------------------------------
Route::get('/bgslfmenaratelkom', [PbgslfController::class, 'bgslfmenaratelkom'])->middleware('auth', 'can:superadmin')->name('bgslfmenaratelkom');
Route::get('/bgslfmenaratelkomupdate/{id}', [PbgslfController::class, 'bgslfmenaratelkomupdate'])->middleware('auth', 'can:superadmin')->name('bgslfmenaratelkomupdate');
Route::post('/bgslfmenaratelkomupdatenew/{id}', [PbgslfController::class, 'bgslfmenaratelkomupdatenew'])->middleware('auth', 'can:superadmin')->name('bgslfmenaratelkomupdatenew');



Route::get('/fungsicampuran', [PbgslfController::class, 'fungsicampuran'])->middleware('auth', 'can:superadmin')->name('fungsicampuran');

Route::get('/bepbgslfindex', [PbgslfController::class, 'bepbgslfindexmenu'])->middleware('auth', 'can:superadmin')->name('bepbgslfindexindexmenu');
Route::get('/bepbgslfindexsearch', [PbgslfController::class, 'bepbgslfindexsearch'])->middleware('auth', 'can:superadmin')->name('bepbgslfindexslfindex');
Route::get('/bepbgslfindexslf', [PbgslfController::class, 'bepbgslfindexslf'])->middleware('auth', 'can:superadmin')->name('bepbgslfindexslfindex');
Route::get('/bepbgslfindexslfper2', [PbgslfController::class, 'bepbgslfindexslfper2'])->middleware('auth', 'can:superadmin')->name('bepbgslfindexslfper2');
Route::get('/bepbgslfindexslfper3', [PbgslfController::class, 'bepbgslfindexslfper3'])->middleware('auth', 'can:superadmin')->name('bepbgslfindexslfper3');
Route::get('/bepbgslfindexslfper4', [PbgslfController::class, 'bepbgslfindexslfper4'])->middleware('auth', 'can:superadmin')->name('bepbgslfindexslfper4');
Route::get('/bepbgslfindexslfper5', [PbgslfController::class, 'bepbgslfindexslfper5'])->middleware('auth', 'can:superadmin')->name('bepbgslfindexslfper5');
// Route::get('/bepbgslfindexslfper2', [PbgslfController::class, 'bepbgslfindexslfper2'])->middleware('auth')->name('bepbgslfindexslfper2');

Route::delete('/bepbgslfindexslfdelete/{id}', [PbgslfController::class, 'bepbgslfindexslfdelete'])->middleware('auth', 'can:superadmin')->name('delete.bepbgslfindexslfdelete');

Route::get('/bepbgslflihatper/{id}', [PbgslfController::class, 'bepbgslflihatper'])->middleware('auth', 'can:superadmin')->name('bepbgslflihatper.show');

// MENU UNTUK UPDATE BRO
Route::get('/updatefungsicampuran/{id}', [PbgslfController::class, 'updatefungsicampuran'])->middleware('auth', 'can:superadmin')->name('updatefungsicampuran');
Route::post('/updatefungsicampurannew/{id}', [PbgslfController::class, 'updatefungsicampurannew'])->middleware('auth', 'can:superadmin')->name('updatefungsicampurannew');

// TAHAP INDUK ----------------
Route::get('/createdatapbgslf', [PbgslfController::class, 'createdatapbgslf'])->middleware('auth')->name('createdatapbgslf.create');
Route::post('/createdatapbgslfnew', [PbgslfController::class, 'createdatapbgslfnew'])->middleware('auth')->name('createdatapbgslf.create');

// DATA PEMILIK
Route::get('/bepbgdatapemilik/{id}', [PbgslfController::class, 'bepbgdatapemilik'])->middleware('auth')->name('bepbgdatapemilik');
Route::get('/updatedatapemilik/{id}', [PbgslfController::class, 'updatedatapemilik'])->middleware('auth')->name('updatedatapemilikupdate');
Route::put('/updatedatapemiliknew/{id}', [PbgslfController::class, 'updatedatapemiliknew'])->middleware('auth')->name('updatedatapemiliknew');

Route::get('/bepbgdatapemilikcreate/{id}', [PbgslfController::class, 'bepbgdatapemilikcreate'])->middleware('auth')->name('datapemilik.create');
Route::post('/bepbgdatapemilikcreatenew', [PbgslfController::class, 'bepbgdatapemilikcreatenew'])->middleware('auth')->name('bepbgdatapemilikcreatenew');

Route::delete('/bepbgdatapemilikdelete/{id}', [PbgslfController::class, 'bepbgdatapemilikdelete'])->middleware('auth')->name('bepbgdatapemilikdelete');

// DATA BANGUNAN
Route::get('/bepbgdatabangunan/{id}', [PbgslfController::class, 'bepbgdatabangunan'])->middleware('auth')->name('bepbgdatabangunan');
Route::get('/updatedatabangunan/{id}', [PbgslfController::class, 'updatedatabangunan'])->middleware('auth')->name('updatedatabangunan');
Route::put('/updatedatabangunannew/{id}', [PbgslfController::class, 'updatedatabangunannew'])->middleware('auth')->name('updatedatabangunannew');


Route::get('/bepbgdatabangunancreate/{id}', [PbgslfController::class, 'bepbgdatabangunancreate'])->middleware('auth')->name('bepbgdatabangunancreate');
Route::post('/bepbgdatabangunancreatenew', [PbgslfController::class, 'bepbgdatabangunancreatenew'])->middleware('auth')->name('bepbgdatabangunancreatenew');
Route::delete('/bepbgdatabangunandelete/{id}', [PbgslfController::class, 'bepbgdatabangunandelete'])->middleware('auth')->name('bepbgdatabangunandelete');

// DATA TANAH
Route::get('/bepbgdatatanah/{id}', [PbgslfController::class, 'bepbgdatatanah'])->middleware('auth')->name('bepbgdatatanah');

Route::get('/updatedatatanah/{id}', [PbgslfController::class, 'updatedatatanah'])->middleware('auth')->name('updatedatatanah');
Route::post('/updatedatatanahnew/{id}', [PbgslfController::class, 'updatedatatanahnew'])->middleware('auth')->name('updatedatatanahnew');

Route::get('/bepbgdatatanahcreate/{id}', [PbgslfController::class, 'bepbgdatatanahcreate'])->middleware('auth')->name('bepbgdatatanahcreate');
Route::post('/bepbgdatatanahcreatenew', [PbgslfController::class, 'bepbgdatatanahcreatenew'])->middleware('auth')->name('bepbgdatatanahnew');
Route::delete('/bepbgdatatanahdelete/{id}', [PbgslfController::class, 'bepbgdatatanahdelete'])->middleware('auth')->name('bepbgdatatanahdelete');

// DATA UMUM
Route::get('/bepbgdataumum/{id}', [PbgslfController::class, 'bepbgdataumum'])->middleware('auth')->name('bepbgdataumum');
Route::get('/bepbgdataumumcreate/{id}', [PbgslfController::class, 'bepbgdataumumcreate'])->middleware('auth')->name('bepbgdataumumcreate');
Route::post('/bepbgdataumumcreatenew', [PbgslfController::class, 'bepbgdataumumcreatenew'])->middleware('auth')->name('bepbgdataumumcreatenew');
Route::delete('/bepbgdataumumdelete/{id}', [PbgslfController::class, 'bepbgdataumumdelete'])->middleware('auth')->name('bepbgdataumumdelete');


Route::get('/updatedataumum/{id}', [PbgslfController::class, 'updatedataumum'])->middleware('auth')->name('updatedataumum');
Route::post('/updatedataumumnew/{id}', [PbgslfController::class, 'updatedataumumnew'])->middleware('auth')->name('updatedataumumnew');

// DATA TEKNIS ARSITEKTUR
Route::get('/bepbgdokumeteknisars/{id}', [PbgslfController::class, 'bepbgdokumeteknisars'])->middleware('auth')->name('bepbgdokumeteknisars');
Route::get('/bepbgdokumeteknisarscreate/{id}', [PbgslfController::class, 'bepbgdokumeteknisarscreate'])->middleware('auth')->name('bepbgdokumeteknisarscreate');
Route::post('/bepbgdokumeteknisarscreatenew', [PbgslfController::class, 'bepbgdokumeteknisarscreatenew'])->middleware('auth')->name('bepbgdokumeteknisarscreatenew');

Route::get('/updatedataarsitektur/{id}', [PbgslfController::class, 'updatedataarsitektur'])->middleware('auth')->name('updatedataarsitektur');
Route::post('/updatedataarsitekturnew/{id}', [PbgslfController::class, 'updatedataarsitekturnew'])->middleware('auth')->name('updatedataarsitekturnew');

// Route::delete('/bepbgdokumearsidelete/{id}', [PbgslfController::class, 'bepbgdokumearsidelete'])->middleware('auth')->name('bepbgdokumearsidelete');
Route::delete('/bepbgdokumearsidelete/{id}', [PbgslfController::class, 'bepbgdokumearsidelete'])->middleware('auth')->name('bepbgdokumearsidelete');

// DATA TEKNIS ARSITEKTUR
Route::get('/bepbgdokumeteknisstrk/{id}', [PbgslfController::class, 'bepbgdokumeteknisstrk'])->middleware('auth')->name('bepbgdokumeteknisstrk');
Route::get('/bepbgdokumeteknisstrkcreate/{id}', [PbgslfController::class, 'bepbgdokumeteknisstrkcreate'])->middleware('auth')->name('bepbgdokumeteknisstrkcreate');
Route::post('/bepbgdokumeteknisstrkcreatenew', [PbgslfController::class, 'bepbgdokumeteknisstrkcreatenew'])->middleware('auth')->name('bepbgdokumeteknisstrkcreatenew');
Route::delete('/bepbgdokumeteknisstrkdelete/{id}', [PbgslfController::class, 'bepbgdokumeteknisstrkdelete'])->middleware('auth')->name('bepbgdokumeteknisstrkdelete');

Route::get('/updatedatastruktur/{id}', [PbgslfController::class, 'updatedatastruktur'])->middleware('auth')->name('updatedatastruktur');
Route::post('/updatedatastrukturnew/{id}', [PbgslfController::class, 'updatedatastrukturnew'])->middleware('auth')->name('updatedatastrukturnew');

// DATA TEKNIS MEKANIKAL DAN ELEKTRIKAL
Route::get('/bepbgdokumeteknismep/{id}', [PbgslfController::class, 'bepbgdokumeteknismep'])->middleware('auth')->name('bepbgdokumeteknismep');
Route::get('/bepbgdokumeteknismepcreate/{id}', [PbgslfController::class, 'bepbgdokumeteknismepcreate'])->middleware('auth')->name('bepbgdokumeteknismepcreate');
Route::post('/bepbgdokumeteknismepcreatenew', [PbgslfController::class, 'bepbgdokumeteknismepcreatenew'])->middleware('auth')->name('bepbgdokumeteknismepcreatenew');
Route::delete('/bepbgdokumeteknismepdelete/{id}', [PbgslfController::class, 'bepbgdokumeteknismepdelete'])->middleware('auth')->name('bepbgdokumeteknismepdelete');

Route::get('/updatedatamep/{id}', [PbgslfController::class, 'updatedatamep'])->middleware('auth')->name('updatedatamep');
Route::post('/updatedatamepnew/{id}', [PbgslfController::class, 'updatedatamepnew'])->middleware('auth')->name('updatedatamepnew');

// PERBAIKAN TPA TPT
Route::get('/updatedatatpatpt/{id}', [PbgslfController::class, 'updatedatatpatpt'])->middleware('auth')->name('updatedatatpatpt');
// Route::post('/bepbgtpatptupdatenew/{id}', [PbgslfController::class, 'bepbgtpatptupdatenew'])->middleware('auth')->name('bepbgtpatptupdatenew');

Route::put('/bepbgtpatptupdatenew/{id}', [PbgslfController::class, 'bepbgtpatptupdatenew'])
    ->middleware('auth')
    ->name('bepbgtpatptupdatenew');

// Route::post('/updatedatatpatptnew/{id}', [PbgslfController::class, 'updatedatamepnew'])->middleware('auth')->name('updatedatamepnew');


// DATA DOKUMEN TEKNIS JIKA DATA BANGUNAN SKL
Route::get('/dokumenteknisslf/{id}', [PbgslfController::class, 'dokumenteknisslf'])->middleware('auth')->name('dokumenteknisslf');
Route::get('/dokumenteknisslfcreate/{id}', [PbgslfController::class, 'dokumenteknisslfcreate'])->middleware('auth')->name('dokumenteknisslfcreate');
Route::post('/dokumenteknisslfcreatenew', [PbgslfController::class, 'dokumenteknisslfcreatenew'])->middleware('auth')->name('dokumenteknisslfcreatenew');
Route::delete('/dokumenteknisslfdelete/{id}', [PbgslfController::class, 'dokumenteknisslfdelete'])->middleware('auth')->name('dokumenteknisslfdelete');


Route::get('/updatedataslf/{id}', [PbgslfController::class, 'updatedataslf'])->middleware('auth')->name('updatedataslf');
Route::post('/updatedataslfnew/{id}', [PbgslfController::class, 'updatedataslfnew'])->middleware('auth')->name('updatedataslfnew');


// DATA VALIDASI
// Route::put('/datanewhibahnew/validasipbgslf1/{id}', [PbgslfController::class, 'validasipbgslf1'])
//     ->name('validasipbgslf1.update');

Route::put('/validasipbgslf1/{id}', [PbgslfController::class, 'validasipbgslf1'])->name('validasipbgslf1.update');
Route::put('/validasipbgslf2/{id}', [PbgslfController::class, 'validasipbgslf2'])->name('validasipbgslf2.update');
Route::put('/validasipbgslf3/{id}', [PbgslfController::class, 'validasipbgslf3'])->name('validasipbgslf3.update');
Route::put('/validasipbgslf4/{id}', [PbgslfController::class, 'validasipbgslf4'])->name('validasipbgslf4.update');
Route::put('/validasipbgslf5/{id}', [PbgslfController::class, 'validasipbgslf5'])->name('validasipbgslf5.update');
Route::put('/validasipbgslf6/{id}', [PbgslfController::class, 'validasipbgslf6'])->name('validasipbgslf6.update');
Route::put('/validasipbgslf7/{id}', [PbgslfController::class, 'validasipbgslf7'])->name('validasipbgslf7.update');
Route::put('/validasipbgslf8/{id}', [PbgslfController::class, 'validasipbgslf8'])->name('validasipbgslf8.update');

// PENGATURAN MENU TPA TPT
Route::get('/betpatpt', [PbgslfController::class, 'betpatpt'])->middleware('auth', 'can:admindpupr')->name('betpatpt');
Route::delete('/betpatptdelete/{id}', [PbgslfController::class, 'betpatptdelete'])->middleware('auth', 'can:admindpupr')->name('betpatptdelete');
Route::get('/betpatptcreate', [PbgslfController::class, 'betpatptcreate'])->middleware('auth', 'can:admindpupr')->name('betpatptcreate');
Route::post('/betpatptcreatenew', [PbgslfController::class, 'betpatptcreatenew'])->middleware('auth', 'can:admindpupr')->name('create.betpatptcreatenew');

Route::get('/betpatptupdatenew/{id}', [PbgslfController::class, 'betpatptupdatenew'])->middleware('auth', 'can:admindpupr')->name('update.betpatptnew');
Route::get('/betpatptupdatenewcreate/{id}', [PbgslfController::class, 'betpatptupdatestore'])->middleware('auth', 'can:admindpupr')->name('update.betpatptupdatenew');

// PENGATURAN MENU TEMPAT KONSULTASI
Route::get('/betempatkonsultasi', [PbgslfController::class, 'betempatkonsultasi'])->middleware('auth')->name('betempatkonsultasi');
Route::delete('/betempatkonsultasidelete/{id}', [PbgslfController::class, 'betempatkonsultasidelete'])->middleware('auth')->name('betempatkonsultasidelete');
Route::get('/betempatcreate', [PbgslfController::class, 'betempatcreate'])->middleware('auth')->name('betempatcreate');
Route::post('/betempatcreatenew', [PbgslfController::class, 'betempatcreatenew'])->middleware('auth')->name('create.betempatcreatenew');

// PENGATURAN FUNGSI BANGUNAN GEDUNG
Route::get('/befungsibangunan', [PbgslfController::class, 'befungsibangunan'])->middleware('auth')->name('befungsibangunan');
Route::delete('/befungsibangunandelete/{id}', [PbgslfController::class, 'befungsibangunandelete'])->middleware('auth')->name('befungsibangunandelete');
Route::get('/befungsibangunancreate', [PbgslfController::class, 'befungsibangunancreate'])->middleware('auth')->name('befungsibangunancreate');
Route::post('/befungsibangunancreatenew', [PbgslfController::class, 'befungsibangunancreatenew'])->middleware('auth')->name('befungsibangunancreatenew');

// KONSULTASI TEKNIS
Route::get('/bepbgslfkonsultasi', [PbgslfController::class, 'bepbgslfkonsultasi'])->middleware('auth')->name('bepbgslfkonsultasi');
Route::put('/validasipbgslfbukti/{id}', [PbgslfController::class, 'validasipbgslfbukti'])->name('validasipbgslfbukti.update');


// SKRD
Route::get('/bepbgslfskrd', [PbgslfController::class, 'bepbgslfskrd'])->middleware('auth')->name('bepbgslfskrd');

Route::get('/bepbgslfskrdcreate/{id}', [PbgslfController::class, 'bepbgslfskrdcreate'])->middleware('auth')->name('bepbgslfskrdcreate');
Route::post('/bepbgslfskrdcreatenew/{id}', [PbgslfController::class, 'bepbgslfskrdcreatenew'])->middleware('auth')->name('create.bepbgslfskrdcreatenew');

// RETRIBUSI
Route::get('/bepbgslfretribusi', [PbgslfController::class, 'bepbgslfretribusi'])->middleware('auth')->name('bepbgslfretribusi');
Route::post('/log-download', [PbgslfController::class, 'history'])->name('log.download');

// ------------------------------------------------------
// MENU BANTUAN GAMBAR
Route::get('/bebantuangambarpemohon', [GambarbantuanController::class, 'bebantuangambarpemohon'])->name('bebantuangambarpemohon');
Route::get('/bebantuangambar', [GambarbantuanController::class, 'bebantuangambar'])->name('bebantuangambar.index');
Route::get('/bebantuangambarshow/{id}', [GambarbantuanController::class, 'bebantuangambarshow'])->middleware('auth')->name('bebantuangambar.show');
Route::put('/bebantuangambarvalidasi/{id}', [GambarbantuanController::class, 'bebantuangambarvalidasi'])->middleware('auth')->name('bebantuangambarvalidasi');

// SURAT TUGAS
Route::post('/bepbgsurattugasuploadnbro/{id}', [GambarbantuanController::class, 'bepbgsurattugasuploadnbro'])->middleware('auth')->name('bepbgsurattugasuploadnbro');
Route::get('/bepbgsurattugasgambar/{id}', [GambarbantuanController::class, 'bepbgsurattugasgambar'])->middleware('auth')->name('bepbgsurattugasgambar');

Route::get('/bebantuangambarlap/{id}', [GambarbantuanController::class, 'bebantuangambarlap'])->middleware('auth')->name('bebantuangambarlap.show');

Route::get('/bebantuangambarlapcreate/{id}', [GambarbantuanController::class, 'bebantuangambarlapcreate'])->middleware('auth')->name('bebantuangambarlapcreate');
Route::post('/bebantuangambarlapcreatenew', [GambarbantuanController::class, 'bebantuangambarlapcreatenew'])->middleware('auth')->name('bebantuangambarlapcreatenew');


Route::delete('/bebantuangambarlapdelete/{id}', [GambarbantuanController::class, 'bebantuangambarlapdelete'])->middleware('auth')->name('delete.bebantuangambarlapdelete');
Route::delete('/bebantuangambardelete/{id}', [GambarbantuanController::class, 'bebantuangambardelete'])->middleware('auth')->name('bebantuangambardelete');

// PENDAFTARAN BANTUAN GAMBAR
Route::get('/feformbantuangambar', [GambarbantuanController::class, 'feformbantuangambar'])->middleware('auth')->name('feformbantuangambar');
Route::post('/feformbantuangambarcreate', [GambarbantuanController::class, 'feformbantuangambarcreate'])->name('feformbantuangambarcreate');

// Route::post('/febantuanteknis/create', [BantuanteknisController::class, 'febantuantekniscreatepermohonan'])->name('permohonan.bantekcreate');

// Route::put('/valberkasusaha/{id}', [KrkController::class, 'valberkasusaha1'])->name('valberkasusaha.update');
// Route::get('/doklapkrkusaha/{id}', [KrkController::class, 'doklapkrkusaha'])->middleware('auth')->name('doklapkrkusaha.show');

// Route::get('/doklapkrkusahacreate/{id}', [KrkController::class, 'doklapkrkusahacreate'])->middleware('auth')->name('doklapkrkusahacreate.create');
// Route::post('/doklapkrkusahacreatenew', [KrkController::class, 'doklapkrkusahacreatenew'])->middleware('auth')->name('create.doklapkrkusahacreatenew');

// Route::delete('/doklapkrkusahacreatedelete/{id}', [KrkController::class, 'doklapkrkusahacreatedelete'])->middleware('auth')->name('delete.doklapkrkusahacreatedelete');

// VALIDASI PERMOHONAN PROSES

Route::put('/verifikasi1permohonan/{id}', [GambarbantuanController::class, 'verifikasi1permohonan'])->name('verifikasi1permohonan.update');
Route::put('/verifikasi1permohonan2/{id}', [GambarbantuanController::class, 'verifikasi1permohonan2'])->name('verifikasi1permohonan2.update');
Route::put('/verifikasi1permohonan3/{id}', [GambarbantuanController::class, 'verifikasi1permohonan3'])->name('verifikasi1permohonan3.update');
Route::put('/verifikasi1permohonan4/{id}', [GambarbantuanController::class, 'verifikasi1permohonan4'])->name('verifikasi1permohonan4.update');
// Route::put('/validasiberkas1permohonan3/{id}', [BantuanteknisController::class, 'valsuratpermohonan3'])->name('validasiberkas3.update');
// Route::put('/validasiberkas1permohonan4/{id}', [BantuanteknisController::class, 'valsuratpermohonan4'])->name('validasiberkas4.update');

Route::get('/bebantuangambarupload/{id}', [GambarbantuanController::class, 'bebantuangambarupload'])->middleware('auth')->name('bebantuangambarupload');
Route::post('/bebantuangambaruploadnew/{id}', [GambarbantuanController::class, 'bebantuangambaruploadnew'])->middleware('auth')->name('upload.bebantuangambaruploadnew');


// Route::put('/valberkasusaha2/{id}', [KrkController::class, 'valberkasusaha2'])->name('valberkasusaha2.update');
// Route::put('/valberkasusaha3/{id}', [KrkController::class, 'valberkasusaha3'])->name('valberkasusaha3.update');
// Route::put('/valberkasusaha4/{id}', [KrkController::class, 'valberkasusaha4'])->name('valberkasusaha4.update');

// Route::get('/permohonankrkusahafinal/{id}', [KrkController::class, 'permohonankrkusahafinal'])->name('permohonan.permohonankrkusahafinal');

// Route::get('/krkusahanoterbit/{id}', [KrkController::class, 'krkusahanoterbit'])->middleware('auth')->name('krkusahanoterbit.create');
// Route::post('/krkusahanoterbitnew/{id}', [KrkController::class, 'krkusahanoterbitnew'])->middleware('auth')->name('create.krkusahanoterbitnew');


Route::get('/bebantuangambarperbaikan/{id}', [GambarbantuanController::class, 'bebantuangambarperbaikan'])->middleware('auth')->name('bebantuangambarperbaikan.perbaikan');
Route::post('/bebantuangambarperbaikannew/{id}', [GambarbantuanController::class, 'bebantuangambarperbaikannew'])->middleware('auth')->name('bebantuangambarperbaikannew');
// gitgit

// Route::delete('/dokbekrkusahadelete/{id}', [KrkController::class, 'dokbekrkusahadelete'])->middleware('auth')->name('delete.dokbekrkusahadelete');



// saat ini git

// PENGATURAN MENU TEMPAT KONSULTASI
Route::get('/bekecamatan', [PbgslfController::class, 'bekecamatan'])->middleware('auth')->name('bekecamatan');

// Route::delete('/betempatkonsultasidelete/{id}', [PbgslfController::class, 'betempatkonsultasidelete'])->middleware('auth')->name('betempatkonsultasidelete');
// Route::get('/betempatcreate', [PbgslfController::class, 'betempatcreate'])->middleware('auth')->name('betempatcreate');
// Route::post('/betempatcreatenew', [PbgslfController::class, 'betempatcreatenew'])->middleware('auth')->name('create.betempatcreatenew');



// DATA DOKUMEN SURAT PEMBERITAHUAN
Route::get('/bepbgsuratpemberitahuan/{id}', [PbgslfController::class, 'bepbgsuratpemberitahuan'])->middleware('auth')->name('bepbgsuratpemberitahuan');
Route::delete('/bepbgsuratpemberitahuandel/{id}', [PbgslfController::class, 'bepbgsuratpemberitahuandel'])->middleware('auth')->name('bepbgsuratpemberitahuandel');
Route::get('/bepbgsuratpemberitahuancreate/{id}', [PbgslfController::class, 'bepbgsuratpemberitahuancreate'])->middleware('auth')->name('bepbgsuratpemberitahuancreate');
Route::post('/bepbgsuratnew', [PbgslfController::class, 'bepbgsuratnew'])->middleware('auth')->name('bepbgsuratnew');

Route::get('/bepbgsuratpemberitahuanshow/{id}', [PbgslfController::class, 'bepbgsuratpemberitahuanshow'])->middleware('auth')->name('suratpemberitahuan.detail');

// DATA SURAT TUGAS
Route::get('/bepbgsurattugas/{id}', [PbgslfController::class, 'bepbgsurattugas'])->middleware('auth')->name('bepbgsurattugas');
Route::get('/bepbgsurattugascreate/{id}', [PbgslfController::class, 'bepbgsurattugascreate'])->middleware('auth')->name('bepbgsurattugascreate');

Route::get('/bepbgsurattugasshow/{id}', [PbgslfController::class, 'bepbgsurattugasshow'])->middleware('auth')->name('bepbgsurattugasshow.detail');
Route::post('/bepbgsurattugasnew', [PbgslfController::class, 'bepbgsurattugasnew'])->middleware('auth')->name('bepbgsurattugasnew');

Route::delete('/bepbgsurattugasnewdelete/{id}', [PbgslfController::class, 'bepbgsurattugasnewdelete'])->middleware('auth')->name('bepbgsurattugasnewdelete');

// DATA SURAT TPA TPT
Route::get('/bepbgtpatpt/{id}', [PbgslfController::class, 'bepbgtpatpt'])->middleware('auth')->name('bepbgtpatpt');
Route::get('/bepbgtpatptcreate/{id}', [PbgslfController::class, 'bepbgtpatptcreate'])->middleware('auth')->name('bepbgtpatptcreate');
Route::post('/bepbgtpatptcreatenew', [PbgslfController::class, 'bepbgtpatptcreatenew'])->middleware('auth')->name('bepbgtpatptcreatenew');

Route::delete('/bepbgtpatptdelete/{id}', [PbgslfController::class, 'bepbgtpatptdelete'])->middleware('auth')->name('bepbgtpatptdelete');

Route::get('/bepbgsuratundangantpatpt/{id}', [PbgslfController::class, 'bepbgsuratundangantpatpt'])->middleware('auth')->name('bepbgsuratundangantpatpt');
Route::get('/bepbgsuratundangantpatptshow/{id}', [PbgslfController::class, 'bepbgsuratundangantpatptshow'])->middleware('auth')->name('bepbgsuratundangantpatptshow');

// DATA DOKUMEN SURAT PEMBERITAHUAN
Route::get('/bepbgsuratundangan/{id}', [PbgslfController::class, 'bepbgsuratundangan'])->middleware('auth')->name('bepbgsuratundangan');
Route::get('/bepbgsuratundangancreate/{id}', [PbgslfController::class, 'bepbgsuratundangancreate'])->middleware('auth')->name('bepbgsuratundangancreate');
Route::post('/bepbgsuratundangannew', [PbgslfController::class, 'bepbgsuratundangannew'])->middleware('auth')->name('bepbgsuratundangannew');

Route::get('/bepbgsuratundanganshow/{id}', [PbgslfController::class, 'bepbgsuratundanganshow'])->middleware('auth')->name('bepbgsuratundanganshow.detail');
Route::delete('/bepbgsuratundangandelete/{id}', [PbgslfController::class, 'bepbgsuratundangandelete'])->middleware('auth')->name('bepbgsuratundangandelete');
// Route::get('/bepbgsuratpemberitahuanshow/{id}', [PbgslfController::class, 'bepbgsuratpemberitahuanshow'])->middleware('auth')->name('suratpemberitahuan.detail');

// DATA DOKUMEN SURAT PEMBERITAHUAN
Route::get('/bepbgberitaacaraslf/{id}', [PbgslfController::class, 'bepbgberitaacaraslf'])->middleware('auth')->name('bepbgberitaacaraslf');
Route::get('/bepbgberitaacaraslfshow/{id}', [PbgslfController::class, 'bepbgberitaacaraslfshow'])->middleware('auth')->name('bepbgberitaacaraslf.detail');

Route::get('/bepbgberitaacaraonline/{id}', [PbgslfController::class, 'bepbgberitaacaraonline'])->middleware('auth')->name('bepbgberitaacaraonline');
Route::get('/bepbgberitaacaraonlineshow/{id}', [PbgslfController::class, 'bepbgberitaacaraonlineshow'])->middleware('auth')->name('bepbgberitaacaraonlineshow.detials');

Route::get('/bepbgbeuploadberkas/{id}', [PbgslfController::class, 'bepbgbeuploadberkas'])->middleware('auth')->name('bepbgbeuploadberkas');
Route::get('/bepbgbeuploadberkasnew/{id}', [PbgslfController::class, 'bepbgbeuploadberkasnew'])->middleware('auth')->name('bepbgbeuploadberkasnew');
Route::put('/bepbgbeuploadberkasnewberkas/{id}', [PbgslfController::class, 'bepbgbeuploadberkasnewberkas'])->middleware('auth')->name('bepbgbeuploadberkasnewberkas');


// Route::get('/bepbgsuratundangancreate/{id}', [PbgslfController::class, 'bepbgsuratundangancreate'])->middleware('auth')->name('bepbgsuratundangancreate');

// Route::delete('/bepbgsuratundangandelete/{id}', [PbgslfController::class, 'bepbgsuratundangandelete'])->middleware('auth')->name('bepbgsuratundangandelete');

// TAHAP 1---------------
// Route::get('/bekrkusahaperbaikan/{id}', [KrkController::class, 'bekrkusahaperbaikan'])->middleware('auth')->name('bekrkusahaperbaikan.perbaikan');

// ================================================================================================================================================
// ================================================================================================================================================
// ================================================================================================================================================

// Route::get('/dashboard', [AdminDashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard', [AdminDashboardController::class, 'index'])->middleware('auth');
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



/// PEMBAHARUAN BARU LAGI
Route::get('/bantekpembongkaranbgn', [BantuanteknisController::class, 'bantekpembongkaranbgn'])->middleware('auth', 'can:admindinas')->name('bepbgslfindexslfindex');


Route::get('/bebantekpembongkaran', [BantuanteknisController::class, 'bebantekpembongkaran'])->middleware('auth', 'can:admindinas')->name('bebantekpembongkaran');
Route::get('/bebantekpembongkaran/create', [BantuanteknisController::class, 'bebantekpembongkarancreate'])->middleware('auth', 'can:admindinas')->name('bebantekpembongkarancreate');
Route::post('/bebantekpembongkaran/createnew', [BantuanteknisController::class, 'bebantekpembongkarancreatenew'])->middleware('auth', 'can:admindinas')->name('bebantekpembongkarancreatenew');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
