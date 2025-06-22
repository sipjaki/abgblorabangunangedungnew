<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\banhibahberkas;
use App\Models\banhibahlapangan;
use App\Models\banhibahskbupati;
use App\Models\bantuanhibahbg;
use App\Models\dokpemohonpenilik;
use App\Models\kecamatanblora;
use App\Models\kelurahandesa;
use App\Models\penilikbangunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenilikbangunanController extends Controller
{
    //

       public function datanewpenilik(Request $request)
{
    // Ambil user login
    $user = Auth::user();
    $kecamatanList = kecamatanblora::all();
        $datakelurahan = kelurahandesa::all(); // Bisa kamu kosongkan kalau mau preload dinamis pakai JS

        if ($request->ajax() && $request->has('kecamatan_id')) {
            $desa = kelurahandesa::where('kecamatanblora_id', $request->kecamatan_id)->get();
            return response()->json($desa);
        }


        // Kirim data ke view tanpa ambil dari database bantuanhibahbg
        return view('backend.07_penilikbangunan.01_createpenilikbangunan', [
            'title' => 'Buat Data Baru Inspeksi Bangunan Gedung',
            'user' => $user,
            'datakelurahan' => $datakelurahan,
        'kecamatanList' => $kecamatanList
    ]);
}


public function datanewpeniliknew(Request $request)
{
    $validated = $request->validate([
        // DATA UMUM BANGUNAN
        'fungsibangunan' => 'required|string|max:255',
        'subfungsibangunan' => 'required|string|max:255',

        // DETAIL BANGUNAN DAN SPESIFIKASI
        'namabangunan' => 'required|string|max:255',
        'luasbangunan' => 'required|string|max:255',
        'ketinggianbangunan' => 'required|string|max:255',
        'jumlahlantai' => 'required|string|max:255',
        'jumlahlapisbasemen' => 'required|string|max:255',
        'luasbasemen' => 'required|string|max:255',
        'jumlahunit' => 'required|string|max:255',
        'estimasijumlahpenghuni' => 'required|string|max:255',

        // SPESIFIKASI
        'nomorkkpr' => 'required|string|max:255',
        'gsb' => 'required|numeric',
        'kdb' => 'required|numeric',
        'klb' => 'required|numeric',
        'kdh' => 'required|numeric',

        // LOKASI
        'provinsi' => 'required|string|max:255',
        'kabupaten' => 'required|string|max:255',
        'kecamatanblora_id' => 'required|string',
        'kelurahandesa_id' => 'required|string',
        'alamatlengkap' => 'required|string',
        'koordinat' => 'nullable|string|max:255',

        // USER
        'user_id' => 'required|string',
    ], [
        // Custom messages
        'fungsibangunan.required' => 'Fungsi bangunan wajib diisi.',
        'subfungsibangunan.required' => 'Subfungsi bangunan wajib diisi.',
        'namabangunan.required' => 'Nama bangunan wajib diisi.',
        'luasbangunan.required' => 'Luas bangunan wajib diisi.',
        'ketinggianbangunan.required' => 'Ketinggian bangunan wajib diisi.',
        'jumlahlantai.required' => 'Jumlah lantai wajib diisi.',
        'jumlahlapisbasemen.required' => 'Jumlah lapis basemen wajib diisi.',
        'luasbasemen.required' => 'Luas basemen wajib diisi.',
        'jumlahunit.required' => 'Jumlah unit wajib diisi.',
        'estimasijumlahpenghuni.required' => 'Estimasi jumlah penghuni wajib diisi.',
        'provinsi.required' => 'Provinsi wajib diisi.',
        'kabupaten.required' => 'Kabupaten/Kota wajib diisi.',
        'alamatlengkap.required' => 'Alamat lengkap wajib diisi.',
        'kecamatanblora_id.required' => 'Kecamatan wajib dipilih.',
        'kecamatanblora_id.exists' => 'Kecamatan tidak ditemukan.',
        'kelurahandesa_id.required' => 'Kelurahan/Desa wajib dipilih.',
        'kelurahandesa_id.exists' => 'Kelurahan/Desa tidak ditemukan.',
        'user_id.required' => 'User tidak boleh kosong.',
        'user_id.exists' => 'User tidak valid.',
        'gsb.numeric' => 'GSB harus berupa angka.',
        'kdb.numeric' => 'KDB harus berupa angka.',
        'klb.numeric' => 'KLB harus berupa angka.',
        'kdh.numeric' => 'KDH harus berupa angka.',
    ]);

    // Simpan ke database
    penilikbangunan::create([
        'fungsibangunan' => $validated['fungsibangunan'],
        'subfungsibangunan' => $validated['subfungsibangunan'],
        'namabangunan' => $validated['namabangunan'],
        'luasbangunan' => $validated['luasbangunan'],
        'ketinggianbangunan' => $validated['ketinggianbangunan'],
        'jumlahlantai' => $validated['jumlahlantai'],
        'jumlahlapisbasemen' => $validated['jumlahlapisbasemen'],
        'luasbasemen' => $validated['luasbasemen'],
        'jumlahunit' => $validated['jumlahunit'],
        'estimasijumlahpenghuni' => $validated['estimasijumlahpenghuni'],
        'nomorkkpr' => $validated['nomorkkpr'] ?? null,
        'gsb' => $validated['gsb'] ?? null,
        'kdb' => $validated['kdb'] ?? null,
        'klb' => $validated['klb'] ?? null,
        'kdh' => $validated['kdh'] ?? null,
        'provinsi' => $validated['provinsi'],
        'kabupaten' => $validated['kabupaten'],
        'kecamatanblora_id' => $validated['kecamatanblora_id'],
        'kelurahandesa_id' => $validated['kelurahandesa_id'],
        'alamatlengkap' => $validated['alamatlengkap'],
        'koordinat' => $validated['koordinat'] ?? null,
        'user_id' => $validated['user_id'],
    ]);

    session()->flash('create', 'Data Penilik Bangunan Berhasil Di Buat !');
    return redirect()->route('dataallpenilikbg.index');
}


public function dataallpenilikbg(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 15);

    // Query dasar dengan eager loading relasi (user, kecamatanblora, kelurahandesa)
    $query = penilikbangunan::with(['user', 'kecamatanblora', 'kelurahandesa']);

    // Filter pencarian jika ada input 'search'
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('fungsibangunan', 'like', "%{$search}%")
              ->orWhere('subfungsibangunan', 'like', "%{$search}%")
              ->orWhere('namabangunan', 'like', "%{$search}%")
              ->orWhere('luasbangunan', 'like', "%{$search}%")
              ->orWhere('ketinggianbangunan', 'like', "%{$search}%")
              ->orWhere('jumlahlantai', 'like', "%{$search}%")
              ->orWhere('jumlahlapisbasemen', 'like', "%{$search}%")
              ->orWhere('luasbasemen', 'like', "%{$search}%")
              ->orWhere('jumlahunit', 'like', "%{$search}%")
              ->orWhere('estimasijumlahpenghuni', 'like', "%{$search}%")
              ->orWhere('nomorkkpr', 'like', "%{$search}%")
              ->orWhere('provinsi', 'like', "%{$search}%")
              ->orWhere('kabupaten', 'like', "%{$search}%")
              ->orWhere('alamatlengkap', 'like', "%{$search}%")
              ->orWhere('koordinat', 'like', "%{$search}%")
              ->orWhereHas('user', function ($sub) use ($search) {
                  $sub->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
              })
              ->orWhereHas('kecamatanblora', function ($sub) use ($search) {
                  $sub->where('nama', 'like', "%{$search}%"); // Asumsi nama kecamatan ada kolom 'nama'
              })
              ->orWhereHas('kelurahandesa', function ($sub) use ($search) {
                  $sub->where('nama', 'like', "%{$search}%"); // Asumsi nama kelurahan ada kolom 'nama'
              });
        });
    }

    // Ambil data dengan pagination
    $datapenilik = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.07_penilikbangunan.02_alldatapenilik', [
        'title' => 'Data Inspeksi Penilik Bangunan Gedung',
        'data' => $datapenilik,
        'user' => $user,
    ]);
}


  public function bedatadasarpenilik($id)
{
    // Cari data berdasarkan ID
    $data = penilikbangunan::findOrFail($id);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Tampilkan ke view dengan key-value
    return view('backend.07_penilikbangunan.03_datadasar', [
        'title' => 'Data Dasar Inspeksi Bangunan Gedung',
        'data' => $data,
        'user' => $user
    ]);
}


public function bedatapeniliksurvey($id)
{
    $databantuanteknis = penilikbangunan::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = dokpemohonpenilik::where('penilikbangunan_id', $databantuanteknis->id)->paginate(50);

    return view('backend.07_penilikbangunan.04_berkaspemohon', [
        'title' => 'Dokumen Berkas Pemohon ',
        'data' => $dataceklapangan,
        'subdata' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


}
