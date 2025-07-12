<?php

namespace App\Http\Controllers;

use App\Models\agendapelatihanabg;
use App\Models\artikelabg;
use App\Models\beritaabg;
use Illuminate\Http\Request;

use App\Models\bgkartuinventarisbangunan;
use App\Models\bujkkonsultan;
use App\Models\jenispengajuanbantek;
use App\Models\kecamatanblora;
use App\Models\kelurahandesa;
use App\Models\mbrgambar;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FedashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $databerita = beritaabg::all();
        $dataartikel = artikelabg::all();
        $agendapelatihan = agendapelatihanabg::all();


        // return view('/404', [
        // return view('frontend.00_full.index', [
        // return view('frontend.abgblora.00_beranda.01_beranda', [
        return view('frontend.android.01_halamanutama.index', [
            'title' => 'Abg Blora Bangunan Gedung',
            'user' => $user,
            'data' => $databerita,
            'dataartikel' => $dataartikel,
            'agendapelatihan' => $agendapelatihan,
        ]);
    }

    public function web()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        // return view('frontend.abgblora.00_beranda.01_beranda', [
        return view('frontend.abgblora.00_beranda.03_merge', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Abg Blora Bangunan Gedung',
        ]);
    }

    // MENU 01
    public function menurespbgslfindex()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.02_pbg.index', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi PBG/SLF Bangunan Gedung ',
            'user' => $user,
        ]);
    }

    public function menuresbangunangedungindex()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.03_bangunangedung.index', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Menu Pendataan Bangunan Gedung ',
            'user' => $user,
        ]);
    }

    public function menuresbangunangedungs(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        $search = $request->input('search');

        $query = bgkartuinventarisbangunan::query();

        if ($search) {
            $query->where('namalengkap', 'LIKE', "%{$search}%")
                  ->orWhere('alamat', 'LIKE', "%{$search}%")
                  ->orWhere('no_telepon', 'LIKE', "%{$search}%");
        }

        $data = $query->paginate($perPage);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('frontend.android.03_bangunangedung.01_kartuinventarisbangunan.partials.table', compact('data'))->render()
            ]);
        }

        return view('frontend.android.03_bangunangedung.01_kartuinventarisbangunan.index', [
            'title' => 'Kartu Inventaris Bangunan Gedung Kabupaten Blora',
            'data' => $data,
            'perPage' => $perPage,
            'search' => $search
        ]);
    }



    // MENU 04 BANTEK

        public function resbantekindex()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.04_bantuanteknis.00_halamanbantek', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi Permohonan Bantuan Teknis ',
            'user' => $user,
        ]);
    }


    public function resbantekpermohonan()
{
    $datakecamatan = kecamatanblora::all();
    $datakelurahan = kelurahandesa::all(); // Bisa kamu kosongkan kalau mau preload dinamis pakai JS
    $datapilihanpengajuan = jenispengajuanbantek::all(); // Bisa kamu kosongkan kalau mau preload dinamis pakai JS
    $datakonsultan = bujkkonsultan::all();

    $user = Auth::user();
    $dinas_id = Auth::id(); // ambil hanya ID akun yang login

    // Ambil data user yang statusadmin_id = 3 beserta relasi statusadmin
    $statusadimindinas = User::with('statusadmin')
        ->where('statusadmin_id', 6)
        ->get();

    return view('frontend.android.04_bantuanteknis.02_formpermohonanbantek', [
        'title' => 'Permohonan Bantuan Teknis',
        'datakecamatan' => $datakecamatan,
        'datakelurahan' => $datakelurahan,
        'datapilihanpengajuan' => $datapilihanpengajuan,
        'datakonsultanbantek' => $datakonsultan,
        'user' => $user,
        'dinas_id' => $dinas_id, // dikirim ke view
        'statusadimindinas' => $statusadimindinas, // kirim ke view juga
    ]);
}


        public function resmbrgambarindex()
    {

        $user = Auth::user();
        $data = mbrgambar::all();

        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.08_mbrgambar.01_resmbrgambar', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi MBR Bantuan Gambar ',
            'user' => $user,
            'data' => $data,
        ]);
    }


public function mbrgambarupdate($id)
{
    // Ambil user login
    $user = Auth::user();

    // Ambil data hibah berdasarkan ID
    $data = mbrgambar::findOrFail($id);

    // Kirim ke view
    return view('backend.08_mbr.02_updatembrgambar', [
        'title' => 'Form Update MBR Gambar',
        'user' => $user,
        'data' => $data
    ]);
}


    public function feinfocampuran()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.02_pbg.01_fungsicampuran', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi PBG Fungsi Campuran ',
            'user' => $user,
        ]);
    }

    public function feinfohunian()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.02_pbg.02_fungsihunian', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi PBG Fungsi Hunian ',
            'user' => $user,
        ]);
    }

    public function feinfoagama()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.02_pbg.03_fungsiagama', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi PBG Fungsi Keagamaan ',
            'user' => $user,
        ]);
    }

    public function feinfoprasarana()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.02_pbg.04_fungsiprasarana', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi PBG Fungsi Pra Sarana ',
            'user' => $user,
        ]);
    }

    public function feinfososialbudaya()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.02_pbg.05_fungsisosialbudaya', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi PBG Fungsi Sosial Budaya ',
            'user' => $user,
        ]);
    }

    public function feinfofungsiusaha()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.02_pbg.06_fungsiusaha', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi PBG Fungsi Usaha',
            'user' => $user,
        ]);
    }

    public function slffungsiusaha()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.02_pbg.07_slfmenara', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi SLF Fungsi Usaha',
            'user' => $user,
        ]);
    }

    public function slfmenara()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.02_pbg.08_slfmenaratelekomunikasi', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi SLF Menara Telekomunikasi',
            'user' => $user,
        ]);
    }

}

