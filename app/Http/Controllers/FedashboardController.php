<?php

namespace App\Http\Controllers;

use App\Models\agendapelatihanabg;
use App\Models\artikelabg;
use App\Models\beritaabg;
use Illuminate\Http\Request;

use App\Models\bgkartuinventarisbangunan;
use App\Models\bujkkonsultan;
use App\Models\infopbg1;
use App\Models\infopbg2;
use App\Models\infopbg3;
use App\Models\infopbg4;
use App\Models\infopbg5;
use App\Models\infopbg6;
use App\Models\infopbg7;
use App\Models\infopbg8;
use App\Models\jenispengajuanbantek;
use App\Models\kecamatanblora;
use App\Models\kelurahandesa;
use App\Models\materipelatihan;
use App\Models\mbrgambar;
use App\Models\pbgslfbangunan;
use App\Models\pesertapelatihan;
use App\Models\rencanagsbblora;
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
        $data = infopbg1::all();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.02_pbg.01_fungsicampuran', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi PBG Fungsi Campuran ',
            'user' => $user,
            'data' => $data,
        ]);
    }

    public function feinfohunian()
    {

        $user = Auth::user();
        $data = infopbg2::all();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.02_pbg.02_fungsihunian', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi PBG Fungsi Hunian ',
            'user' => $user,
            'data' => $data,
        ]);
    }

    public function feinfoagama()
    {

        $user = Auth::user();
        $data = infopbg3::all();

        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.02_pbg.03_fungsiagama', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi PBG Fungsi Keagamaan ',
            'user' => $user,
            'data' => $data,
        ]);
    }

    public function feinfoprasarana()
    {

        $user = Auth::user();
        $data = infopbg4::all();

        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.02_pbg.04_fungsiprasarana', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi PBG Fungsi Pra Sarana ',
            'user' => $user,
            'data' => $data,
        ]);
    }

    public function feinfososialbudaya()
    {

        $user = Auth::user();
        $data = infopbg5::all();

        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.02_pbg.05_fungsisosialbudaya', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi PBG Fungsi Sosial Budaya ',
            'user' => $user,
            'data' => $data,
        ]);
    }

    public function feinfofungsiusaha()
    {

        $user = Auth::user();
        $data = infopbg6::all();

        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.02_pbg.06_fungsiusaha', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi PBG Fungsi Usaha',
            'user' => $user,
            'data' => $data,
        ]);
    }

    public function slffungsiusaha()
    {

        $user = Auth::user();
        $data = infopbg7::all();

        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.02_pbg.07_slfmenara', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi SLF Fungsi Usaha',
            'user' => $user,
            'data' => $data,
        ]);
    }

    public function slfmenara()
    {

        $user = Auth::user();
        $data = infopbg8::all();

        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.02_pbg.08_slfmenaratelekomunikasi', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi SLF Menara Telekomunikasi',
            'user' => $user,
            'data' => $data,
        ]);
    }




    public function febantekasistensi()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.04_bantuanteknis.03_infobantuanasistensi', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi Permohonan Bantuan Asistensi Penyelenggaraan Gedung Negara ',
            'user' => $user,
        ]);
    }


    public function febantekpenelitikontrak()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.04_bantuanteknis.04_infopeneliti', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi Permohonan Bantuan Peneliti Kontrak Penyelenggaraan Gedung Negara ',
            'user' => $user,
        ]);
    }

    public function febantekperasset()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.04_bantuanteknis.05_infoperasset', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi Permohonan Bantuan Perhitungan Aset Penyelenggaraan Gedung Negara ',
            'user' => $user,
        ]);
    }

    public function febantekpermeliha()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.04_bantuanteknis.06_infopemelihara', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi Permohonan Bantuan Pemeliharaan dan Pelaksanaan Konstruksi Penyelenggaraan Gedung Negara ',
            'user' => $user,
        ]);
    }

    public function febantekdamping()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.04_bantuanteknis.06_infopemelihara', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi Permohonan Bantuan Pendampingan Serah Terima Pekerjaan Penyelenggaraan Gedung Negara ',
            'user' => $user,
        ]);
    }

    public function febantektimteknis()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.04_bantuanteknis.07_infotimteknis', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi Permohonan Bantuan TIm Teknis Penyelenggaraan Gedung Negara ',
            'user' => $user,
        ]);
    }


    public function infopbgindex()
{

    $user = Auth::user();

    return view('frontend.abgblora.01_pbgslf.00_informasi.01_infopbg', [
        'title' => 'Informasi Permohonan PBG SLF Bangunan Gedung',
        'user' => $user,
    ]);
}

public function infopbgcampuran()
{
    $datakecamatan = kecamatanblora::all();
    $datakelurahan = kelurahandesa::all();
    $datapilihanpengajuan = jenispengajuanbantek::all();
    $datakonsultan = bujkkonsultan::all();

    $user = Auth::user();
    $dinas_id = Auth::id(); // ambil hanya ID akun yang login

    $statusadimindinas = User::with('statusadmin')
        ->where('statusadmin_id', 6)
        ->get();

    return view('frontend.abgblora.01_pbgslf.00_informasi.01_campuran', [
        'title' => 'Informasi PBG Fungsi Campuran',
        'datakecamatan' => $datakecamatan,
        'datakelurahan' => $datakelurahan,
        'datapilihanpengajuan' => $datapilihanpengajuan,
        'datakonsultanbantek' => $datakonsultan,
        'user' => $user,
        'dinas_id' => $dinas_id, // dikirim ke view
        'statusadimindinas' => $statusadimindinas,
    ]);
}

public function infopbghunian()
{
    $datakecamatan = kecamatanblora::all();
    $datakelurahan = kelurahandesa::all();
    $datapilihanpengajuan = jenispengajuanbantek::all();
    $datakonsultan = bujkkonsultan::all();

    $user = Auth::user();
    $dinas_id = Auth::id(); // ambil hanya ID akun yang login

    $statusadimindinas = User::with('statusadmin')
        ->where('statusadmin_id', 6)
        ->get();

    return view('frontend.abgblora.01_pbgslf.00_informasi.02_hunian', [
        'title' => 'Informasi PBG Fungsi Hunian',
        'datakecamatan' => $datakecamatan,
        'datakelurahan' => $datakelurahan,
        'datapilihanpengajuan' => $datapilihanpengajuan,
        'datakonsultanbantek' => $datakonsultan,
        'user' => $user,
        'dinas_id' => $dinas_id, // dikirim ke view
        'statusadimindinas' => $statusadimindinas,
    ]);
}

public function infopbgagama()
{
    $datakecamatan = kecamatanblora::all();
    $datakelurahan = kelurahandesa::all();
    $datapilihanpengajuan = jenispengajuanbantek::all();
    $datakonsultan = bujkkonsultan::all();

    $user = Auth::user();
    $dinas_id = Auth::id(); // ambil hanya ID akun yang login

    $statusadimindinas = User::with('statusadmin')
        ->where('statusadmin_id', 6)
        ->get();

    return view('frontend.abgblora.01_pbgslf.00_informasi.03_agamar', [
        'title' => 'Informasi PBG Fungsi Keagamaan',
        'datakecamatan' => $datakecamatan,
        'datakelurahan' => $datakelurahan,
        'datapilihanpengajuan' => $datapilihanpengajuan,
        'datakonsultanbantek' => $datakonsultan,
        'user' => $user,
        'dinas_id' => $dinas_id, // dikirim ke view
        'statusadimindinas' => $statusadimindinas,
    ]);
}

public function infopbgprasarana()
{
    $datakecamatan = kecamatanblora::all();
    $datakelurahan = kelurahandesa::all();
    $datapilihanpengajuan = jenispengajuanbantek::all();
    $datakonsultan = bujkkonsultan::all();

    $user = Auth::user();
    $dinas_id = Auth::id(); // ambil hanya ID akun yang login

    $statusadimindinas = User::with('statusadmin')
        ->where('statusadmin_id', 6)
        ->get();

    return view('frontend.abgblora.01_pbgslf.00_informasi.04_prasarana', [
        'title' => 'Informasi PBG Fungsi Prasarana',
        'datakecamatan' => $datakecamatan,
        'datakelurahan' => $datakelurahan,
        'datapilihanpengajuan' => $datapilihanpengajuan,
        'datakonsultanbantek' => $datakonsultan,
        'user' => $user,
        'dinas_id' => $dinas_id, // dikirim ke view
        'statusadimindinas' => $statusadimindinas,
    ]);
}


 public function ressosialisasiindex()
{
    $user = Auth::user();

    // Ambil data agenda pelatihan terbaru dengan pagination 8 data per halaman
    $agendapelatihan = agendapelatihanabg::orderBy('created_at', 'desc')->paginate(8);

    // Tampilkan ke view dengan judul dan data
    return view('frontend.android.05_sosialisasi.01_agendasosialisasi', [
        'title' => 'Informasi Agenda Sosialisasi',
        'user' => $user,
        'data' => $agendapelatihan,
    ]);
}


             public function ressosialisasishow($id)
             {
                 $dataagendapelatihan = agendapelatihanabg::where('id', $id)->first();

                 if (!$dataagendapelatihan) {
                     // Tangani jika kegiatan tidak ditemukan
                     return redirect()->back()->with('error', 'Kegiatan tidak ditemukan.');
                 }

                 // Menggunakan paginate() untuk pagination
                 $subdata = materipelatihan::where('agendapelatihan_id', $dataagendapelatihan->id)->paginate(50);

                   // Menghitung nomor urut mulai
                     $start = ($subdata->currentPage() - 1) * $subdata->perPage() + 1;

             $user = Auth::user();


             return view('frontend.android.05_sosialisasi.02_showsosialisasi', [
                 'title' => 'Agenda Pelatihan ABG Blora Bangunan gedung ',
                 'data' => $dataagendapelatihan,
                 'datamateripelatihan' => $subdata,
                 // 'subData' => $subdata,  // Jika Anda ingin mengirimkan data sub kontraktor juga
                 'user' => $user,
                 // 'start' => $start,
             ]);
             }

        public function resagendaabg()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.05_sosialisasi.00_halamansosialisasi', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi Agenda Sosialisasi ABG Blora ',
            'user' => $user,
        ]);
    }

     public function respesertaabg()
{
    $user = Auth::user();

    // Ambil data agenda pelatihan terbaru dengan pagination 8 data per halaman
    $agendapelatihan = agendapelatihanabg::orderBy('created_at', 'desc')->paginate(8);

    // Tampilkan ke view dengan judul dan data
    return view('frontend.android.05_sosialisasi.04_listpesertasosialisasi', [
        'title' => 'Informasi Peserta Sosialisasi',
        'user' => $user,
        'data' => $agendapelatihan,
    ]);
}

            public function respesertashow($id)
             {
                 $dataagendapelatihan = agendapelatihanabg::where('id', $id)->first();

                 if (!$dataagendapelatihan) {
                     // Tangani jika kegiatan tidak ditemukan
                     return redirect()->back()->with('error', 'Kegiatan tidak ditemukan.');
                 }

                 // Menggunakan paginate() untuk pagination
                 $subdata = pesertapelatihan::where('agendapelatihanabg_id', $dataagendapelatihan->id)->paginate(100);

                   // Menghitung nomor urut mulai
                     $start = ($subdata->currentPage() - 1) * $subdata->perPage() + 1;

             $user = Auth::user();


             return view('frontend.android.05_sosialisasi.05_showpesertapel', [
                 'title' => 'Daftar Peserta Pelatihan ABG Blora Bangunan gedung ',
                 'data' => $dataagendapelatihan,
                 'subdata' => $subdata,
                 // 'subData' => $subdata,  // Jika Anda ingin mengirimkan data sub kontraktor juga
                 'user' => $user,
                 // 'start' => $start,
             ]);
             }

public function rescarigsb()
    {

        $user = Auth::user();
        $rencanagsb = rencanagsbblora::all();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.00_gsb.01_pencariangsb', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Informasi Pencarian GSB Kabupaten Blora ',
            'user' => $user,
            'rencanagsb' => $rencanagsb,
        ]);
    }


    public function infopbgsosialbudaya()
{
    $datakecamatan = kecamatanblora::all();
    $datakelurahan = kelurahandesa::all();
    $datapilihanpengajuan = jenispengajuanbantek::all();
    $datakonsultan = bujkkonsultan::all();

    $user = Auth::user();
    $dinas_id = Auth::id(); // ambil hanya ID akun yang login

    $statusadimindinas = User::with('statusadmin')
        ->where('statusadmin_id', 6)
        ->get();

    return view('frontend.abgblora.01_pbgslf.00_informasi.05_sosialbudaya', [
        'title' => 'Informasi PBG Fungsi Sosial Budaya',
        'datakecamatan' => $datakecamatan,
        'datakelurahan' => $datakelurahan,
        'datapilihanpengajuan' => $datapilihanpengajuan,
        'datakonsultanbantek' => $datakonsultan,
        'user' => $user,
        'dinas_id' => $dinas_id, // dikirim ke view
        'statusadimindinas' => $statusadimindinas,
    ]);
}

public function infopbgusaha()
{
    $datakecamatan = kecamatanblora::all();
    $datakelurahan = kelurahandesa::all();
    $datapilihanpengajuan = jenispengajuanbantek::all();
    $datakonsultan = bujkkonsultan::all();

    $user = Auth::user();
    $dinas_id = Auth::id(); // ambil hanya ID akun yang login

    $statusadimindinas = User::with('statusadmin')
        ->where('statusadmin_id', 6)
        ->get();

    return view('frontend.abgblora.01_pbgslf.00_informasi.06_usaha', [
        'title' => 'Informasi PBG Fungsi Usaha',
        'datakecamatan' => $datakecamatan,
        'datakelurahan' => $datakelurahan,
        'datapilihanpengajuan' => $datapilihanpengajuan,
        'datakonsultanbantek' => $datakonsultan,
        'user' => $user,
        'dinas_id' => $dinas_id, // dikirim ke view
        'statusadimindinas' => $statusadimindinas,
    ]);
}


public function infoslfusaha()
{
    $datakecamatan = kecamatanblora::all();
    $datakelurahan = kelurahandesa::all();
    $datapilihanpengajuan = jenispengajuanbantek::all();
    $datakonsultan = bujkkonsultan::all();

    $user = Auth::user();
    $dinas_id = Auth::id(); // ambil hanya ID akun yang login

    $statusadimindinas = User::with('statusadmin')
        ->where('statusadmin_id', 6)
        ->get();

    return view('frontend.abgblora.01_pbgslf.00_informasi.07_slfusaha', [
        'title' => 'Informasi SLF Fungsi Usaha',
        'datakecamatan' => $datakecamatan,
        'datakelurahan' => $datakelurahan,
        'datapilihanpengajuan' => $datapilihanpengajuan,
        'datakonsultanbantek' => $datakonsultan,
        'user' => $user,
        'dinas_id' => $dinas_id, // dikirim ke view
        'statusadimindinas' => $statusadimindinas,
    ]);
}

public function infomenaratelkomunikasi()
{
    $datakecamatan = kecamatanblora::all();
    $datakelurahan = kelurahandesa::all();
    $datapilihanpengajuan = jenispengajuanbantek::all();
    $datakonsultan = bujkkonsultan::all();

    $user = Auth::user();
    $dinas_id = Auth::id(); // ambil hanya ID akun yang login

    $statusadimindinas = User::with('statusadmin')
        ->where('statusadmin_id', 6)
        ->get();

    return view('frontend.abgblora.01_pbgslf.00_informasi.08_menara', [
        'title' => 'Informasi PBG Fungsi Prasarana',
        'datakecamatan' => $datakecamatan,
        'datakelurahan' => $datakelurahan,
        'datapilihanpengajuan' => $datapilihanpengajuan,
        'datakonsultanbantek' => $datakonsultan,
        'user' => $user,
        'dinas_id' => $dinas_id, // dikirim ke view
        'statusadimindinas' => $statusadimindinas,
    ]);
}


// --------------------------------
public function resbgtracking(Request $request)
    {

        // $user = Auth::user();
        // $data = pbgslfbangunan::all();
            $user = Auth::user();
    // $perPage = $request->input('perPage', 20);
    $noreg = $request->input('noregissimbg');

    $data = null;

    if ($noreg) {
        $data = pbgslfbangunan::where('noregissimbg', $noreg)->first();
    }



        // return view('/404', [
        // return view('frontend.00_full.index', [
    return view('frontend.android.02_traking.01_halamantracking', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Menu Tracking Permohonan PBG/SLF ',
            'user' => $user,
            'data' => $data,
        ]);
    }

      public function infotrakingweb(Request $request)
{


            // $user = Auth::user();
        // $data = pbgslfbangunan::all();
            $user = Auth::user();
    // $perPage = $request->input('perPage', 20);
    $noreg = $request->input('noregissimbg');

    $data = null;

    if ($noreg) {
        $data = pbgslfbangunan::where('noregissimbg', $noreg)->first();
    }

    $user = Auth::user();

    return view('frontend.abgblora.02_trakingweb.01_infotraking', [
        'title' => 'Informasi Tracking Permohonan PBG SLF Bangunan Gedung',
        'user' => $user,
        'data' => $data,
    ]);
}



public function infokrkpermohonan()
{
    $datakecamatan = kecamatanblora::all();
    $datakelurahan = kelurahandesa::all();
    $datapilihanpengajuan = jenispengajuanbantek::all();
    $datakonsultan = bujkkonsultan::all();

    $user = Auth::user();
    $dinas_id = Auth::id(); // ambil hanya ID akun yang login

    $statusadimindinas = User::with('statusadmin')
        ->where('statusadmin_id', 6)
        ->get();

    return view('frontend.abgblora.06_permohonankrk.01_informasi.01_informasikrk', [
        'title' => 'Informasi Permohonan KRK',
        'datakecamatan' => $datakecamatan,
        'datakelurahan' => $datakelurahan,
        'datapilihanpengajuan' => $datapilihanpengajuan,
        'datakonsultanbantek' => $datakonsultan,
        'user' => $user,
        'dinas_id' => $dinas_id, // dikirim ke view
        'statusadimindinas' => $statusadimindinas,
    ]);
}

public function infombrgambar()
{
    $datakecamatan = kecamatanblora::all();
    $datakelurahan = kelurahandesa::all();
    $datapilihanpengajuan = jenispengajuanbantek::all();
    $datakonsultan = bujkkonsultan::all();
    $data = mbrgambar::all();

    $user = Auth::user();
    $dinas_id = Auth::id(); // ambil hanya ID akun yang login

    $statusadimindinas = User::with('statusadmin')
        ->where('statusadmin_id', 6)
        ->get();

    return view('frontend.abgblora.07_mbr.00_informasi.01_informasimbr', [
        'title' => 'Informasi MBR Gambar Bangunan Gedung',
        'datakecamatan' => $datakecamatan,
        'datakelurahan' => $datakelurahan,
        'datapilihanpengajuan' => $datapilihanpengajuan,
        'datakonsultanbantek' => $datakonsultan,
        'user' => $user,
        'dinas_id' => $dinas_id, // dikirim ke view
        'statusadimindinas' => $statusadimindinas,
        'data' => $data,
    ]);
}

}

