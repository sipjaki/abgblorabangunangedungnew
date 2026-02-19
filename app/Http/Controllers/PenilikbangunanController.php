<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use App\Models\banhibahberkas;
use App\Models\banhibahlapangan;
use App\Models\banhibahskbupati;
use App\Models\bantuanhibahbg;
use App\Models\dokpemohonpenilik;
use App\Models\fotopascapenilik;
use App\Models\fotoprapenilik;
use App\Models\kecamatanblora;
use App\Models\kelurahandesa;
use App\Models\pascapenilikdok;
use App\Models\penilikbangunan;
use App\Models\petugaspenilik;
use App\Models\prapenilikdok;
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
            'title' => 'Input Data Baru Inspeksi Bangunan Gedung',
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
        'nik' => 'nullable|string|max:255',
        'fungsibangunan' => 'required|string|max:255',
        'subfungsibangunan' => 'required|string|max:255',
        'nomortelepon' => 'required|string|max:255',
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
        // 'nik.required' => 'NIK wajib diisi.',
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
        'namapemohon' => $validated['namapemohon'] ?? null,
        'nik' => $validated['nik'] ?? null,
        'fungsibangunan' => $validated['fungsibangunan'] ?? null,
        'subfungsibangunan' => $validated['subfungsibangunan'] ?? null,
        'nomortelepon' => $validated['nomortelepon'] ?? null,

        'namabangunan' => $validated['namabangunan'] ?? null,
        'luasbangunan' => $validated['luasbangunan'] ?? null,
        'jumlahlantai' => $validated['jumlahlantai'] ?? null,
        'gsb' => $validated['gsb'] ?? null,

        'provinsi' => $validated['provinsi'] ?? null,
        'kabupaten' => $validated['kabupaten'] ?? null,
        'kecamatanblora_id' => $validated['kecamatanblora_id'] ?? null,
        'kelurahandesa_id' => $validated['kelurahandesa_id'] ?? null,
        'alamatlengkap' => $validated['alamatlengkap'] ?? null,
        'koordinat' => $validated['koordinat'] ?? null,

        'user_id' => $validated['user_id'] ?? null,
    ]);

    session()->flash('create', 'Data Penilik Bangunan berhasil disimpan!');
    return redirect()->route('dataallpenilikbg.index');
}

// public function dataallpenilikbg(Request $request)
// {
//     $user = Auth::user();
//     $search = $request->input('search');
//     $perPage = $request->input('perPage', 15);

//     // Query dasar dengan eager loading relasi (user, kecamatanblora, kelurahandesa)
//     $query = penilikbangunan::with(['user', 'kecamatanblora', 'kelurahandesa']);

//     // Filter pencarian jika ada input 'search'
//     if ($search) {
//         $query->where(function ($q) use ($search) {
//             $q->where('fungsibangunan', 'like', "%{$search}%")
//               ->orWhere('subfungsibangunan', 'like', "%{$search}%")
//               ->orWhere('namabangunan', 'like', "%{$search}%")
//               ->orWhere('luasbangunan', 'like', "%{$search}%")
//               ->orWhere('ketinggianbangunan', 'like', "%{$search}%")
//               ->orWhere('jumlahlantai', 'like', "%{$search}%")
//               ->orWhere('jumlahlapisbasemen', 'like', "%{$search}%")
//               ->orWhere('luasbasemen', 'like', "%{$search}%")
//               ->orWhere('jumlahunit', 'like', "%{$search}%")
//               ->orWhere('estimasijumlahpenghuni', 'like', "%{$search}%")
//               ->orWhere('nomorkkpr', 'like', "%{$search}%")
//               ->orWhere('provinsi', 'like', "%{$search}%")
//               ->orWhere('kabupaten', 'like', "%{$search}%")
//               ->orWhere('alamatlengkap', 'like', "%{$search}%")
//               ->orWhere('koordinat', 'like', "%{$search}%")
//               ->orWhereHas('user', function ($sub) use ($search) {
//                   $sub->where('name', 'like', "%{$search}%")
//                       ->orWhere('email', 'like', "%{$search}%");
//               })
//               ->orWhereHas('kecamatanblora', function ($sub) use ($search) {
//                   $sub->where('nama', 'like', "%{$search}%"); // Asumsi nama kecamatan ada kolom 'nama'
//               })
//               ->orWhereHas('kelurahandesa', function ($sub) use ($search) {
//                   $sub->where('nama', 'like', "%{$search}%"); // Asumsi nama kelurahan ada kolom 'nama'
//               });
//         });
//     }

//     // Ambil data dengan pagination
//     $datapenilik = $query->latest()->paginate($perPage)->appends($request->all());

//     return view('backend.07_penilikbangunan.02_alldatapenilik', [
//         'title' => 'Data Inspeksi Penilik Bangunan Gedung',
//         'data' => $datapenilik,
//         'user' => $user,
//     ]);
// }

public function dataallpenilikbg(Request $request)
{
    // Ambil data user yang sedang login
    $user = Auth::user();

    // Ambil parameter pencarian dan jumlah data per halaman
    $search = $request->input('search');
    $perPage = $request->input('perPage', 10);

    // Query dasar dengan relasi (user, kecamatanblora, kelurahandesa)
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
                  $sub->where('nama', 'like', "%{$search}%");
              })
              ->orWhereHas('kelurahandesa', function ($sub) use ($search) {
                  $sub->where('nama', 'like', "%{$search}%");
              });
        });
    }

    // Ambil data terbaru dulu (latest = urut dari created_at DESC)
    $datapenilik = $query->latest()->paginate($perPage)->appends($request->all());

    // Kirim ke view
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
        'nomorsurat' => 'nullable|string|max:255',
        'nomorkontrak' => 'nullable|string|max:255',
        'tanggaltugas' => 'nullable|date',
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
        'tanggaltugas' => $validated['tanggaltugas'] ?? null,
    ]);

    session()->flash('create', 'Surat Tugas Inspeksi Bangunan Gedung berhasil diterbitkan.');
    return redirect()->route('surattugaspenilik', ['id' => $validated['penilikbangunan_id']]);
}

public function suratpenilikdelete($id)
{
    $entry = surattugaspenilik::find($id); // pakai find aja dulu

    if (!$entry) {
        return redirect()->back()->with('error', 'Item not found');
    }

    $penilikbangunan_id = $entry->penilikbangunan_id;
    $entry->delete();

    return redirect()->route('surattugaspenilik', ['id' => $penilikbangunan_id])
                     ->with('delete', 'Data Berhasil Di Hapus !');
}

public function surattugaspenilikshow(Request $request, $id)
{
    // Ambil user login
    $user = Auth::user();
    // Cari data pbg berdasarkan ID
    $data = penilikbangunan::findOrFail($id);
    $surat = surattugaspenilik::findOrFail($id);
    // $surat = suratpemberitahuanpbg::findOrFail($id);
    // $surat = suratpemberitahuanpbg::where('pbgslfbangunan_id', $id)->first();

    // $surat = suratpemberitahuanpbg::where('pbgslfbangunan_id', $id)->get();

    // Ambil data relasi lain (sama seperti sebelumnya)
    // $subdatapemilik = datapemilik::where('pbgslfbangunan_id', $data->id)->get();
    // $subdatabangunan = databangunanpbg::where('pbgslfbangunan_id', $data->id)->get();
    // $subdatatanah = datatanahpbg::where('pbgslfbangunan_id', $data->id)->get();
    // $subdataumum = dataumumpbg::where('pbgslfbangunan_id', $data->id)->get();
    // $subdatadokumenteknisars = dokumenteknisarsi::where('pbgslfbangunan_id', $data->id)->get();
    // $subdatadokumenteknisstruk = dokumenteknisstruk::where('pbgslfbangunan_id', $data->id)->get();
    // $subdatadokumenteknismep = dokumenteknismep::where('pbgslfbangunan_id', $data->id)->get();
    // $subdatadokumenteknisslfpbg = dokumenteknisslfpbg::where('pbgslfbangunan_id', $data->id)->get();

    // Kirim data ke view
    return view('backend.07_penilikbangunan.07_showsuratpenilik', [
        'title' => 'Surat Tugas Inspeksi Bangunan Gedung',
        'title_halaman' => 'Surat Tugas Petugas Inspeksi Bangunan Gedung',
        'user' => $user,
        'data' => $data,
        'subdatasuratpemberitahuan' => $surat,
        'surat' => $surat, // Kirim surat yang dipilih
        // 'subdatapemilik' => $subdatapemilik,
        // 'subdatabangunan' => $subdatabangunan,
        // 'subdatatanah' => $subdatatanah,
        // 'subdataumum' => $subdataumum,
        // 'subdatadokumenteknisars' => $subdatadokumenteknisars,
        // 'subdatadokumenteknisstruk' => $subdatadokumenteknisstruk,
        // 'subdatadokumenteknismep' => $subdatadokumenteknismep,
        // 'subdatadokumenteknisslfpbg' => $subdatadokumenteknisslfpbg,
    ]);
}


public function surattugaspenilikshownew(Request $request, $id)
{
    // Ambil user login
    $user = Auth::user();
    // Cari data pbg berdasarkan ID
    // $data = penilikbangunan::findOrFail($id);
    $surat = surattugaspenilik::findOrFail($id);
    // $datapemilik = datapemilik::findOrFail($id);
    // $datapemilik = datapemilik::where('pbgslfbangunan_id', $id)->firstOrFail();
    // $datapemilik = datapemilik::where('pbgslfbangunan_id', $id)->first(); // tanpa fail
    // $datapemilik = datapemilik::firstOrNew(['pbgslfbangunan_id' => $id]);
// Kalau belum ada, ini akan buat instance baru tapi belum disimpan ke DB


    // $surat = suratpemberitahuanpbg::findOrFail($id);
    // $surat = suratpemberitahuanpbg::where('pbgslfbangunan_id', $id)->first();

    // $surat = suratpemberitahuanpbg::where('pbgslfbangunan_id', $id)->get();

    // Ambil data relasi lain (sama seperti sebelumnya)
    // $subdatapemilik = datapemilik::where('pbgslfbangunan_id', $data->id)->get();
    // $subdatabangunan = databangunanpbg::where('pbgslfbangunan_id', $data->id)->get();
    // $subdatatanah = datatanahpbg::where('pbgslfbangunan_id', $data->id)->get();
    // $subdataumum = dataumumpbg::where('pbgslfbangunan_id', $data->id)->get();
    // $subdatadokumenteknisars = dokumenteknisarsi::where('pbgslfbangunan_id', $data->id)->get();
    // $subdatadokumenteknisstruk = dokumenteknisstruk::where('pbgslfbangunan_id', $data->id)->get();
    // $subdatadokumenteknismep = dokumenteknismep::where('pbgslfbangunan_id', $data->id)->get();
    // $subdatadokumenteknisslfpbg = dokumenteknisslfpbg::where('pbgslfbangunan_id', $data->id)->get();

    // Kirim data ke view
    return view('backend.07_penilikbangunan.08_showsuratpenilik', [
        'title' => 'Surat Tugas Inspeksi Bangunan Gedung ',
        'title_halaman' => 'Surat Tugas Inspeksi Bangunan Gedung',
        'user' => $user,
        // 'data' => $data,
        // 'datapemilik' => $datapemilik,
        'subdatasuratpemberitahuan' => $surat,
        'surat' => $surat, // Kirim surat yang dipilih
        // 'subdatapemilik' => $subdatapemilik,
        // 'subdatabangunan' => $subdatabangunan,
        // 'subdatatanah' => $subdatatanah,
        // 'subdataumum' => $subdataumum,
        // 'subdatadokumenteknisars' => $subdatadokumenteknisars,
        // 'subdatadokumenteknisstruk' => $subdatadokumenteknisstruk,
        // 'subdatadokumenteknismep' => $subdatadokumenteknismep,
        // 'subdatadokumenteknisslfpbg' => $subdatadokumenteknisslfpbg,
    ]);
}


public function dokpenilikpra($id)
{
    $databantuanteknis = penilikbangunan::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = prapenilikdok::where('penilikbangunan_id', $databantuanteknis->id)->paginate(50);

    return view('backend.07_penilikbangunan.09_doklapprainspeksi', [
        'title' => 'Dokumentasi Cek Lapangan Pra Inspeksi Bangunan Gedung',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function dokpenilikpracreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = penilikbangunan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.07_penilikbangunan.10_uploadprakegiatan', [
        'title' => 'Catatan Kegiatan Dokumentasi Pra Inspeksi Bangunan Gedung',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function dokpenilikpracreatenew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'penilikbangunan_id' => 'required|integer',
        'tanggalkegiatan' => 'required|date',
        'kegiatan' => 'required|string',
        'kegiatanke' => 'required|string',
        'uraiankegiatan' => 'required|string',
        'catatankegiatan' => 'nullable|string',
    ], [
        'penilikbangunan_id.required' => 'ID Penilik Bangunan wajib diisi.',
        'tanggalkegiatan.required' => 'Tanggal kegiatan wajib diisi.',
        'kegiatan.required' => 'Nama kegiatan wajib diisi.',
        'kegiatanke.required' => 'Kegiatan ke-berapa wajib diisi.',
        'uraiankegiatan.required' => 'Uraian kegiatan wajib diisi.',
    ]);

    // Simpan ke database
    $data = new prapenilikdok(); // Ganti dengan nama model kamu jika berbeda
    $data->penilikbangunan_id = $validated['penilikbangunan_id'];
    $data->tanggalkegiatan = $validated['tanggalkegiatan'];
    $data->kegiatan = $validated['kegiatan'];
    $data->kegiatanke = $validated['kegiatanke'];
    $data->uraiankegiatan = $validated['uraiankegiatan'];
    $data->catatankegiatan = $validated['catatankegiatan'] ?? null;
    $data->save();

        // Flash dan redirect
        session()->flash('create', 'Data kegiatan penilik bangunan berhasil disimpan!');
        return redirect()->route('dokpenilikpra', ['id' => $validated['penilikbangunan_id']]);

}

public function dokpenilikprafoto($id)
{
    // Ambil data prapenilikdok berdasarkan ID
    $databantuanteknis = prapenilikdok::find($id);

    if (!$databantuanteknis) {
        abort(404, 'Data prapenilikdok tidak ditemukan');
    }

    // Ambil data foto dokumentasi lapangan, paginate 50 per halaman
    $dataceklapangan = fotoprapenilik::where('prapenilikdok_id', $id)->paginate(50);

    return view('backend.07_penilikbangunan.11_prafotoinspeksi', [
        'title' => 'Daftar Foto dan Berkas Hasil Pra inspeksi Dokumentasi Lapangan',
        'prapenilikdok' => $databantuanteknis,
        'data' => $dataceklapangan,
        'user' => Auth::user(),
    ]);
}

public function dokpenilikprafotoupload(Request $request)
{
    $validated = $request->validate([
        'prapenilikdok_id' => 'required|string',
        'foto' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:10240',
    ], [
        'prapenilikdok_id.required' => 'ID prapenilikdok wajib diisi.',
        'foto.required' => 'File wajib diunggah.',
        'foto.mimes' => 'File harus berupa gambar (jpeg, png, jpg, gif, svg) atau PDF.',
        'foto.max' => 'Ukuran maksimal file adalah 10MB.',
    ]);

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('07_penilikbangunan/01_berkasfotopra'), $filename);
        $path = '07_penilikbangunan/01_berkasfotopra/' . $filename;
    } else {
        $path = null;
    }

    $foto = new fotoprapenilik();
    $foto->prapenilikdok_id = $validated['prapenilikdok_id'];
    $foto->foto = $path;
    $foto->save();

    return redirect()->back()->with('create', 'File berhasil diunggah!');
}

public function fotopradelete($id)
{
    // Cari entri berdasarkan ID
    $entry = fotoprapenilik::where('id', $id)->first();

    if ($entry) {
        // Hapus file jika ada (aktifkan jika memang simpan file)
        // if (Storage::disk('public')->exists($entry->header)) {
        //     Storage::disk('public')->delete($entry->header);
        // }

        // Hapus data dari database
        $entry->delete();

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back()->with('delete', 'Foto berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}


public function prakegiatanfotopradelete($id)
{
    // Cari entri berdasarkan ID
    $entry = prapenilikdok::where('id', $id)->first();

    if ($entry) {
        // Simpan dulu lapangan_id sebelum entri dihapus
        $lapanganId = $entry->penilikbangunan_id;

        // Hapus file jika ada (aktifkan jika memang simpan file)
        // if (Storage::disk('public')->exists($entry->header)) {
        //     Storage::disk('public')->delete($entry->header);
        // }

        // Hapus data dari database
        $entry->delete();

        // Redirect ke halaman detail lapangan terkait
        return redirect()->route('dokpenilikpra', ['id' => $lapanganId])
                         ->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}


public function dokpenilikpasca($id)
{
    $databantuanteknis = penilikbangunan::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = pascapenilikdok::where('penilikbangunan_id', $databantuanteknis->id)->paginate(50);

    return view('backend.07_penilikbangunan.12_dokpascalapangan', [
        'title' => 'Dokumentasi Cek Lapangan Pasca Inspeksi Bangunan Gedung',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function dokpenilikpascacreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = penilikbangunan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.07_penilikbangunan.12_uploadkegiatanpasca', [
        'title' => 'Catatan Kegiatan Dokumentasi Pasca Inspeksi Bangunan Gedung',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}



public function dokpenilikpascacreatenew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'penilikbangunan_id' => 'required|integer',
        'tanggalkegiatan' => 'required|date',
        'kegiatan' => 'required|string',
        'kegiatanke' => 'required|string',
        'uraiankegiatan' => 'required|string',
        'catatankegiatan' => 'nullable|string',
        'tanggalmulai' => 'nullable|date',
        'tanggalselesai' => 'nullable|date',
        'hasilinspeksi' => 'nullable|string|in:Lengkap,Tidak Lengkap',
    ], [
        'penilikbangunan_id.required' => 'ID Penilik Bangunan wajib diisi.',
        'tanggalkegiatan.required' => 'Tanggal kegiatan wajib diisi.',
        'kegiatan.required' => 'Nama kegiatan wajib diisi.',
        'kegiatanke.required' => 'Kegiatan ke-berapa wajib diisi.',
        'uraiankegiatan.required' => 'Uraian kegiatan wajib diisi.',
    ]);

    // Simpan ke database
    $data = new pascapenilikdok(); // Ganti dengan model sesuai jika berbeda
    $data->penilikbangunan_id = $validated['penilikbangunan_id'];
    $data->tanggalkegiatan = $validated['tanggalkegiatan'];
    $data->kegiatan = $validated['kegiatan'];
    $data->kegiatanke = $validated['kegiatanke'];
    $data->uraiankegiatan = $validated['uraiankegiatan'];
    $data->catatankegiatan = $validated['catatankegiatan'] ?? null;
    $data->tanggalmulai = $validated['tanggalmulai'] ?? null;
    $data->tanggalselesai = $validated['tanggalselesai'] ?? null;
    $data->hasilinspeksi = $validated['hasilinspeksi'] ?? null;
    $data->save();

    // Flash dan redirect
    session()->flash('create', 'Data kegiatan penilik bangunan berhasil disimpan!');
    return redirect()->route('dokpenilikpasca', ['id' => $validated['penilikbangunan_id']]);
}

public function dokpenilikpascafoto($id)
{
    // Ambil data prapenilikdok berdasarkan ID
    $databantuanteknis = pascapenilikdok::find($id);

    if (!$databantuanteknis) {
        abort(404, 'Data prapenilikdok tidak ditemukan');
    }

    // Ambil data foto dokumentasi lapangan, paginate 50 per halaman
    $dataceklapangan = fotopascapenilik::where('pascapenilikdok_id', $id)->paginate(50);

    return view('backend.07_penilikbangunan.13_prafotoinspeksi', [
        'title' => 'Daftar Foto dan Berkas Hasil Pasca inspeksi Dokumentasi Lapangan',
        'prapenilikdok' => $databantuanteknis,
        'data' => $dataceklapangan,
        'user' => Auth::user(),
    ]);
}

public function dokpenilikpascafotoupload(Request $request)
{
    $validated = $request->validate([
        'pascapenilikdok_id' => 'required|string',
        'foto' => 'required|mimes:jpeg,png,jpg,gif,svg,pdf|max:10240',
    ], [
        'pascapenilikdok_id.required' => 'ID pascapenilikdok wajib diisi.',
        'foto.required' => 'File wajib diunggah.',
        'foto.mimes' => 'File harus berupa gambar (jpeg, png, jpg, gif, svg) atau PDF.',
        'foto.max' => 'Ukuran maksimal file adalah 10MB.',
    ]);

    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('07_penilikbangunan/02_berkasfotopasca'), $filename);
        $path = '07_penilikbangunan/02_berkasfotopasca/' . $filename;
    } else {
        $path = null;
    }

    $foto = new fotopascapenilik();
    $foto->pascapenilikdok_id = $validated['pascapenilikdok_id'];
    $foto->foto = $path;
    $foto->save();

    return redirect()->back()->with('create', 'File berhasil diunggah!');
}

public function fotopascadelete($id)
{
    // Cari entri berdasarkan ID
    $entry = fotopascapenilik::where('id', $id)->first();

    if ($entry) {
        // Hapus file jika ada (aktifkan jika memang simpan file)
        // if (Storage::disk('public')->exists($entry->header)) {
        //     Storage::disk('public')->delete($entry->header);
        // }

        // Hapus data dari database
        $entry->delete();

        // Redirect kembali ke halaman sebelumnya
        return redirect()->back()->with('delete', 'Foto berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}

public function dataallpenilikbgupdate(Request $request, $id)
{
    $user = Auth::user();
    $kecamatanList = kecamatanblora::all();
    $datakelurahan = kelurahandesa::all();

    // Handle AJAX permintaan data kelurahan
    if ($request->ajax() && $request->has('kecamatan_id')) {
        $desa = kelurahandesa::where('kecamatanblora_id', $request->kecamatan_id)->get();
        return response()->json($desa);
    }

    // Ambil data penilikbangunan berdasarkan ID
    $penilik = penilikbangunan::findOrFail($id);

    return view('backend.07_penilikbangunan.14_halamanperbaikanpenilik', [
        'title' => 'Perbaikan Data Penilik Bangunan',
        'user' => $user,
        'datakelurahan' => $datakelurahan,
        'kecamatanList' => $kecamatanList,
        'penilik' => $penilik
    ]);
}

public function dataallpenilikbgupdatenew(Request $request, $id)
{
    // Validasi input, semua nullable biar fleksibel
    $validated = $request->validate([
        'namapemohon' => 'nullable|string|max:255',
        'nik' => 'nullable|string|max:255',
        'fungsibangunan' => 'nullable|string|max:255',
        'subfungsibangunan' => 'nullable|string|max:255',

        'provinsi' => 'nullable|string|max:255',
        'kabupaten' => 'nullable|string|max:255',
        'kecamatanblora_id' => 'nullable|string',
        'kelurahandesa_id' => 'nullable|string',
        'alamatlengkap' => 'nullable|string',
        'koordinat' => 'nullable|string|max:255',

        'namabangunan' => 'nullable|string|max:255',
        'luasbangunan' => 'nullable|string|max:255',
        'jumlahlantai' => 'nullable|string|max:255',
        'gsb' => 'nullable|numeric',

        // 'noregsimbg' => 'nullable|string|max:255',
        // 'tanggalsimbg' => 'nullable|date',
        // 'nokrk' => 'nullable|string|max:255',
        // 'tanggalkrk' => 'nullable|date',
        // 'nopbg' => 'nullable|string|max:255',
        // 'tanggalpbg' => 'nullable|date',

        // 'berkaspbg' => 'nullable|file|mimes:pdf|max:10120', // max 5MB
    ]);

    $penilik = penilikbangunan::findOrFail($id);

    // Upload file berkas pbg jika ada
    // if ($request->hasFile('berkaspbg')) {
    //     $file = $request->file('berkaspbg');

    //     $destinationPath = public_path('07_penilikbangunan/03_berkaspbg');
    //     if (!file_exists($destinationPath)) {
    //         mkdir($destinationPath, 0755, true);
    //     }

    //     $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

    //     $file->move($destinationPath, $filename);

    //     // Hapus file lama jika ada
    //     if ($penilik->berkaspbg && file_exists(public_path($penilik->berkaspbg))) {
    //         unlink(public_path($penilik->berkaspbg));
    //     }

    //     $validated['berkaspbg'] = '07_penilikbangunan/03_berkaspbg/' . $filename;
    // }

    $penilik->update($validated);

    session()->flash('update', 'Perbaikan Data Penilik Bangunan berhasil diperbarui!');
    return redirect()->route('dataallpenilikbg.index');
}

public function bedatapetugaspenilik(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    $query = petugaspenilik::query();

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('namalengkap', 'like', "%{$search}%")
              ->orWhere('nip', 'like', "%{$search}%")
              ->orWhere('jabatan', 'like', "%{$search}%")
              ->orWhere('golongan', 'like', "%{$search}%")
              ->orWhere('skpenilik', 'like', "%{$search}%");
        });
    }

    $bujk = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.07_penilikbangunan.01_datapenilik.01_datapenilik', [
        'title' => 'Daftar Petugas Inspeksi Bangunan Gedung',
        'data'  => $bujk,
        'user'  => $user,
    ]);
}

public function bedatapetugaspenilikcreate()
{
    $user = Auth::user();
    // $dataakun = User::where('statusadmin_id', 4)->get();

    if (!$user) {
        return redirect()->route('login');
    }

    return view('backend.07_penilikbangunan.01_datapenilik.02_tambahdatapenilik', [
        'title' => 'Form Tambah Data Petugas Inspeksi Bangunan Gedung',
        'user'  => $user,
        // 'dataakun'  => $dataakun
    ]);
}

public function bedatapetugaspenilikcreatenew(Request $request)
{
    $user = Auth::user();

    $validated = $request->validate([
        // 'user_id'    => 'required|integer',      // sesuaikan tipe data user_id biasanya integer
        'namalengkap'=> 'required|string|max:255',
        'nip'        => 'nullable|string|max:50',
        'jabatan'    => 'nullable|string|max:255',
        'golongan1'  => 'nullable|string|max:100',
        'skpenilik'  => 'nullable|string|max:255',
        'golongan2'  => 'nullable|string|max:100',
    ], [
        // 'user_id.required'     => 'Akun wajib dipilih.',
        'namalengkap.required' => 'Nama Lengkap wajib diisi.',
    ]);

    $data = new petugaspenilik();

    // $data->user_id     = $validated['user_id'];
    $data->namalengkap = $validated['namalengkap'];
    $data->nip         = $validated['nip'] ?? null;
    $data->jabatan     = $validated['jabatan'] ?? null;
    $data->golongan1   = $validated['golongan1'] ?? null;
    $data->skpenilik   = $validated['skpenilik'] ?? null;
    $data->golongan2   = $validated['golongan2'] ?? null;

    $data->save();

    session()->flash('create', 'Data petugas penilik berhasil ditambahkan.');

    return redirect()->route('bedatapetugaspenilik'); // Ganti dengan route yang sesuai
}


public function bedatapetugaspenilikdelete($id)
{
    // Cari item berdasarkan judul
    $entry = petugaspenilik::where('id', $id)->first();

    if ($entry) {
        // Jika ada file header yang terdaftar, hapus dari storage
        // if (Storage::disk('public')->exists($entry->header)) {
            //     Storage::disk('public')->delete($entry->header);
            // }

            // Hapus entri dari database
            $entry->delete();

            // Redirect atau memberi respons sesuai kebutuhan
            return redirect('/bedatapetugaspenilik')->with('delete', 'Data Berhasil Di Hapus !');

        }

        return redirect()->back()->with('error', 'Item not found');
    }


public function dataallpenilikbgregsimbg(Request $request, $id)
{
    $user = Auth::user();
    $kecamatanList = kecamatanblora::all();
    $datakelurahan = kelurahandesa::all();

    // Handle AJAX permintaan data kelurahan
    if ($request->ajax() && $request->has('kecamatan_id')) {
        $desa = kelurahandesa::where('kecamatanblora_id', $request->kecamatan_id)->get();
        return response()->json($desa);
    }

    // Ambil data penilikbangunan berdasarkan ID
    $penilik = penilikbangunan::findOrFail($id);

    return view('backend.07_penilikbangunan.15_inputregsimbg', [
        'title' => 'Input Data Reg SIMBG Inspeksi Bangunan Gedung',
        'user' => $user,
        'datakelurahan' => $datakelurahan,
        'kecamatanList' => $kecamatanList,
        'penilik' => $penilik
    ]);
}



public function dataallpenilikbgregsimbgnew(Request $request, $id)
{
    // Validasi input, semua nullable biar fleksibel
    $validated = $request->validate([
        // 'namapemohon' => 'nullable|string|max:255',
        // 'nik' => 'nullable|string|max:255',
        // 'fungsibangunan' => 'nullable|string|max:255',
        // 'subfungsibangunan' => 'nullable|string|max:255',

        // 'provinsi' => 'nullable|string|max:255',
        // 'kabupaten' => 'nullable|string|max:255',
        // 'kecamatanblora_id' => 'nullable|string',
        // 'kelurahandesa_id' => 'nullable|string',
        // 'alamatlengkap' => 'nullable|string',
        // 'koordinat' => 'nullable|string|max:255',

        // 'namabangunan' => 'nullable|string|max:255',
        // 'luasbangunan' => 'nullable|string|max:255',
        // 'jumlahlantai' => 'nullable|string|max:255',
        // 'gsb' => 'nullable|numeric',

        'noregsimbg' => 'nullable|string|max:255',
        'tanggalsimbg' => 'nullable|date',
        'nokrk' => 'nullable|string|max:255',
        'tanggalkrk' => 'nullable|date',
        // 'nopbg' => 'nullable|string|max:255',
        // 'tanggalpbg' => 'nullable|date',

        // 'berkaspbg' => 'nullable|file|mimes:pdf|max:10120', // max 5MB
    ]);

    $penilik = penilikbangunan::findOrFail($id);

    // if ($request->hasFile('berkaspbg')) {
    //     $file = $request->file('berkaspbg');

    //     $destinationPath = public_path('07_penilikbangunan/03_berkaspbg');
    //     if (!file_exists($destinationPath)) {
    //         mkdir($destinationPath, 0755, true);
    //     }

    //     $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

    //     $file->move($destinationPath, $filename);

    //     // Hapus file lama jika ada
    //     if ($penilik->berkaspbg && file_exists(public_path($penilik->berkaspbg))) {
    //         unlink(public_path($penilik->berkaspbg));
    //     }

    //     $validated['berkaspbg'] = '07_penilikbangunan/03_berkaspbg/' . $filename;
    // }

    $penilik->update($validated);

    session()->flash('update', 'Input NO Reg SIM BG Berhasil !');
    return redirect()->route('dataallpenilikbg.index');
}


public function dataallpenilikuploadpbg(Request $request, $id)
{
    $user = Auth::user();
    $kecamatanList = kecamatanblora::all();
    $datakelurahan = kelurahandesa::all();

    // Handle AJAX permintaan data kelurahan
    if ($request->ajax() && $request->has('kecamatan_id')) {
        $desa = kelurahandesa::where('kecamatanblora_id', $request->kecamatan_id)->get();
        return response()->json($desa);
    }

    // Ambil data penilikbangunan berdasarkan ID
    $penilik = penilikbangunan::findOrFail($id);

    return view('backend.07_penilikbangunan.16_inputberkaspbg', [
        'title' => 'Input Berkas Dokumen PBG Hasil Inspeksi Bangunan Gedung',
        'user' => $user,
        'datakelurahan' => $datakelurahan,
        'kecamatanList' => $kecamatanList,
        'penilik' => $penilik
    ]);
}

public function dataallpenilikuploadpbgnew(Request $request, $id)
{
    // Validasi input, semua nullable biar fleksibel
    $validated = $request->validate([
        // 'namapemohon' => 'nullable|string|max:255',
        // 'nik' => 'nullable|string|max:255',
        // 'fungsibangunan' => 'nullable|string|max:255',
        // 'subfungsibangunan' => 'nullable|string|max:255',

        // 'provinsi' => 'nullable|string|max:255',
        // 'kabupaten' => 'nullable|string|max:255',
        // 'kecamatanblora_id' => 'nullable|string',
        // 'kelurahandesa_id' => 'nullable|string',
        // 'alamatlengkap' => 'nullable|string',
        // 'koordinat' => 'nullable|string|max:255',

        // 'namabangunan' => 'nullable|string|max:255',
        // 'luasbangunan' => 'nullable|string|max:255',
        // 'jumlahlantai' => 'nullable|string|max:255',
        // 'gsb' => 'nullable|numeric',

        // 'noregsimbg' => 'nullable|string|max:255',
        // 'tanggalsimbg' => 'nullable|date',
        // 'nokrk' => 'nullable|string|max:255',
        // 'tanggalkrk' => 'nullable|date',
        'nopbg' => 'nullable|string|max:255',
        'tanggalpbg' => 'nullable|date',

        'berkaspbg' => 'nullable|file|mimes:pdf|max:10120', // max 5MB
    ]);

    $penilik = penilikbangunan::findOrFail($id);

    if ($request->hasFile('berkaspbg')) {
        $file = $request->file('berkaspbg');

        $destinationPath = public_path('07_penilikbangunan/03_berkaspbg');
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

        $file->move($destinationPath, $filename);

        // Hapus file lama jika ada
        if ($penilik->berkaspbg && file_exists(public_path($penilik->berkaspbg))) {
            unlink(public_path($penilik->berkaspbg));
        }

        $validated['berkaspbg'] = '07_penilikbangunan/03_berkaspbg/' . $filename;
    }

    $penilik->update($validated);

    session()->flash('update', 'Upload Berkas PBG Berhasil !');
    return redirect()->route('dataallpenilikbg.index');
}


}
