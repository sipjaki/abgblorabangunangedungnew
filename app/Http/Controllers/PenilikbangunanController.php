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
use App\Models\petugaspenilik;
use App\Models\surattugaspenilik;
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
        // DATA PEMOHON & BANGUNAN
        'namapemohon' => 'required|string|max:255',
        'nik' => 'required|string|max:255',
        'fungsibangunan' => 'required|string|max:255',
        'subfungsibangunan' => 'required|string|max:255',

        // DETAIL BANGUNAN DAN SPESIFIKASI
        'namabangunan' => 'required|string|max:255',
        'luasbangunan' => 'required|string|max:255',
        'jumlahlantai' => 'required|string|max:255',
        'gsb' => 'required|numeric',

        // INTENSITAS & LOKASI
        'provinsi' => 'required|string|max:255',
        'kabupaten' => 'required|string|max:255',
        'kecamatanblora_id' => 'required|string',
        'kelurahandesa_id' => 'required|string',
        'alamatlengkap' => 'required|string',
        'koordinat' => 'nullable|string|max:255',

        // USER
        'user_id' => 'required|exists:users,id',
    ], [
        // Pesan error kustom
        'namapemohon.required' => 'Nama pemohon wajib diisi.',
        // 'nik.required' => 'NIK wajib diisi.',
        'nik.required' => 'NIK wajib diisi.',
        'nik.numeric' => 'NIK hanya boleh berisi angka.',
        'nik.digits' => 'NIK harus terdiri dari 16 digit.',
        'fungsibangunan.required' => 'Fungsi bangunan wajib diisi.',
        'subfungsibangunan.required' => 'Subfungsi bangunan wajib diisi.',
        'namabangunan.required' => 'Nama bangunan wajib diisi.',
        'luasbangunan.required' => 'Luas bangunan wajib diisi.',
        'jumlahlantai.required' => 'Jumlah lantai wajib diisi.',
        'gsb.required' => 'GSB wajib diisi dan harus berupa angka.',
        'gsb.numeric' => 'GSB harus berupa angka.',
        'provinsi.required' => 'Provinsi wajib diisi.',
        'kabupaten.required' => 'Kabupaten wajib diisi.',
        'alamatlengkap.required' => 'Alamat lengkap wajib diisi.',
        'kecamatanblora_id.required' => 'Kecamatan wajib dipilih.',
        'kecamatanblora_id.exists' => 'Kecamatan tidak ditemukan.',
        'kelurahandesa_id.required' => 'Kelurahan/Desa wajib dipilih.',
        'kelurahandesa_id.exists' => 'Kelurahan/Desa tidak ditemukan.',
        'user_id.required' => 'User tidak boleh kosong.',
        'user_id.exists' => 'User tidak valid.',
    ]);

    // Simpan ke database
    penilikbangunan::create([
        'namapemohon' => $validated['namapemohon'],
        'nik' => $validated['nik'],
        'fungsibangunan' => $validated['fungsibangunan'],
        'subfungsibangunan' => $validated['subfungsibangunan'],

        'namabangunan' => $validated['namabangunan'],
        'luasbangunan' => $validated['luasbangunan'],
        'jumlahlantai' => $validated['jumlahlantai'],
        'gsb' => $validated['gsb'],

        'provinsi' => $validated['provinsi'],
        'kabupaten' => $validated['kabupaten'],
        'kecamatanblora_id' => $validated['kecamatanblora_id'],
        'kelurahandesa_id' => $validated['kelurahandesa_id'],
        'alamatlengkap' => $validated['alamatlengkap'],
        'koordinat' => $validated['koordinat'] ?? null,

        'user_id' => $validated['user_id'],
    ]);

    session()->flash('create', 'Data Penilik Bangunan berhasil disimpan!');
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

public function surattugaspenilik($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = penilikbangunan::findOrFail($id);

    // Ambil semua data surat pemberitahuan berdasarkan pbgslfbangunan_id tanpa pagination
$subdatapemilik = surattugaspenilik::where('penilikbangunan_id', $data->id)->get();

    // Kirim data ke view
    return view('backend.07_penilikbangunan.05_surattugaspenilikbangunan', [
        'title' => 'Surat Tugas Penilik Bangunan Gedung',
        'title_halaman' => 'Surat Tugas Inspeksi (Penilik) Bangunan Gedung' ,
        'user' => $user,
        'data' => $data,
        // 'datafasi' => $data,
        'subdatapemilik' => $subdatapemilik,
    ]);
}

public function surattugaspenilikcreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = penilikbangunan::find($id);
    $fasilitators = petugaspenilik::all();

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.07_penilikbangunan.05_tambahpeniliksurat', [
        'title' => 'Buat Data Surat Tugas Penilik Inspeksi Bangunan Gedung',
        'data' => $databantuanteknis,
        'fasilitators' => $fasilitators,
        'user' => Auth::user()
    ]);
}

public function surattugaspeniliknew(Request $request)
{
    $validated = $request->validate([
        'penilikbangunan_id' => 'required|string',
        // 'pbgslfbangunan_id' => 'required|string',
        // 'datapemilik_id' => 'required|string',
        'petugaspenilik_id' => 'required|string',
        'nomorsurat' => 'required|string|max:255',
        'nomorkontrak' => 'required|string|max:255',
        'tanggaltugas' => 'required|date',
    ], [
        'penilikbangunan_id.required' => 'ID Pemohon wajib diisi.',
        'petugaspenilik_id.required' => 'ID Bangunan wajib diisi.',
        // 'pbgslfbangunan_id.exists' => 'ID Bangunan tidak ditemukan.',

        'nomorkontrak.required' => 'Nomor Kontrak wajib diisi.',
        'nomorkontrak.exists' => 'ID Pemilik tidak ditemukan.',

        'fasilitatorpbg_id.required' => 'Fasilitator wajib dipilih.',
        'fasilitatorpbg_id.exists' => 'Fasilitator tidak ditemukan.',

        'nomorsurat.required' => 'Nomor Surat tidak boleh kosong.',
        'nomorsurat.max' => 'Nomor Surat tidak boleh lebih dari 255 karakter.',
        'nomorkontrak.max' => 'Nomor Kontrak tidak boleh lebih dari 255 karakter.',

        // 'tanggaltugas.required' => 'Tanggal Tugas wajib diisi.',
        'tanggaltugas.required' => 'Tanggal Tugas wajib diisi.',
        'tanggaltugas.date' => 'Tanggal Tugas harus berupa format tanggal yang valid.',
    ]);

    surattugaspenilik::create([
        'penilikbangunan_id' => $validated['penilikbangunan_id'],
        // 'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'],
        // 'datapemilik_id' => $validated['datapemilik_id'],
        'petugaspenilik_id' => $validated['petugaspenilik_id'],
        'nomorsurat' => $validated['nomorsurat'] ?? null,
        'nomorkontrak' => $validated['nomorkontrak'] ?? null,
        'tanggaltugas' => $validated['tanggaltugas'],
    ]);

    session()->flash('create', 'Surat Tugas Inspeksi Bangunan Gedung berhasil diterbitkan.');
    return redirect()->route('surattugaspenilik', ['id' => $validated['penilikbangunan_id']]);
}


}
