<?php

namespace App\Http\Controllers;
use App\Models\pbgslfbangunan;
use App\Models\bujkkonsultan;
use App\Models\ceklapanganbantek;
use App\Models\databangunangedung;
use App\Models\databangunanpbg;
use App\Models\datapemilik;
use App\Models\datatanahpbg;
use App\Models\dataumumpbg;
use App\Models\dokumenteknisars;
use App\Models\dokumenteknisarsi;
use App\Models\dokumenteknismep;
use App\Models\dokumenteknisslfpbg;
use App\Models\dokumenteknisstruk;
use App\Models\fasilitatorpbg;
use App\Models\fungsibangunanpbg;
use App\Models\jenispengajuanpbgslfper;
use App\Models\jenisperkonsultasi;
use App\Models\kecamatanblora;
use App\Models\kelurahandesa;
use App\Models\pengawasatpt;
use App\Models\suratpemberitahuanpbg;
use App\Models\surattugaspbg;
use App\Models\suratudanganpbg;
use App\Models\tempatkonsultasi;
use App\Models\tpatpt;
// use App\Models\pbgslfbangunan;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class PbgslfController extends Controller
{
    //

    public function bepbgslfindexmenu(Request $request)
{
    $user = Auth::user();
    $perPage = $request->input('perPage', 20);

    // Ambil jumlah data dengan jenispengajuanpbgslfper id = 1
    $jumlahDataIdSatu = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
        $q->where('id', 1);
    })->count();

    $jumlahDataIdDua = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
        $q->where('id', 2);
    })->count();

    $jumlahDataIdTiga = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
        $q->where('id', 3);
    })->count();

    $jumlahDataIdEmpat = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
        $q->where('id', 4);
    })->count();

    $jumlahDataIdLima = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
        $q->where('id', 5);
    })->count();


    // Ambil semua data KECUALI yang punya relasi id = 1
    $dataTanpaIdSatu = pbgslfbangunan::whereDoesntHave('jenispengajuanpbgslfper', function ($q) {
        $q->where('id', 1);
    })->latest()->paginate($perPage);

    $jumlahDataIdSatu_dikembalikan    = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
    $q->where('id', 1);
})->where('validasiberkas1', 'dikembalikan')->count();


$jumlahDataIdDua_dikembalikan     = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
    $q->where('id', 2);
})->where('validasiberkas1', 'dikembalikan')->count();

$jumlahDataIdTiga_dikembalikan    = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
    $q->where('id', 3);
})->where('validasiberkas1', 'dikembalikan')->count();

$jumlahDataIdEmpat_dikembalikan   = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
    $q->where('id', 4);
})->where('validasiberkas1', 'dikembalikan')->count();

$jumlahDataIdLima_dikembalikan    = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
    $q->where('id', 5);
})->where('validasiberkas1', 'dikembalikan')->count();

// --------------------------------

$jumlahDataIdSatu_doklapangan     = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
    $q->where('id', 1);
})->where('validasiberkas2', 'sudah')->count();

$jumlahDataIdDua_doklapangan      = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
    $q->where('id', 2);
})->where('validasiberkas2', 'sudah')->count();

$jumlahDataIdTiga_doklapangan     = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
    $q->where('id', 3);
})->where('validasiberkas2', 'sudah')->count();

$jumlahDataIdEmpat_doklapangan    = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
    $q->where('id', 4);
})->where('validasiberkas2', 'sudah')->count();

$jumlahDataIdLima_doklapangan     = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
    $q->where('id', 5);
})->where('validasiberkas2', 'sudah')->count();

// ---------------------------------------------------------------------

$jumlahDataIdSatu_olahdata     = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
    $q->where('id', 1);
})->where('validasiberkas3', 'sudah')->count();

$jumlahDataIdDua_olahdata      = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
    $q->where('id', 2);
})->where('validasiberkas3', 'sudah')->count();

$jumlahDataIdTiga_olahdata     = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
    $q->where('id', 3);
})->where('validasiberkas3', 'sudah')->count();

$jumlahDataIdEmpat_olahdata    = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
    $q->where('id', 4);
})->where('validasiberkas3', 'sudah')->count();

$jumlahDataIdLima_olahdata     = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
    $q->where('id', 5);
})->where('validasiberkas3', 'sudah')->count();

// -----------------------------------------

$jumlahDataIdSatu_terbit     = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
    $q->where('id', 1);
})->where('validasiberkas4', 'sudah')->count();

$jumlahDataIdDua_terbit      = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
    $q->where('id', 2);
})->where('validasiberkas4', 'sudah')->count();

$jumlahDataIdTiga_terbit     = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
    $q->where('id', 3);
})->where('validasiberkas4', 'sudah')->count();

$jumlahDataIdEmpat_terbit    = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
    $q->where('id', 4);
})->where('validasiberkas4', 'sudah')->count();

$jumlahDataIdLima_terbit     = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
    $q->where('id', 5);
})->where('validasiberkas4', 'sudah')->count();

// -----------------------------------------

    return view('backend.01_pbgslf.01_permohonanpbgslf.00_utamapbgslf', [
        'title' => 'Permohonan PBG/SLF Bangunan Gedung',
        // 'data' => $dataTanpaIdSatu,
        'user' => $user,

        'jumlahDataIdSatu_terbit' => $jumlahDataIdSatu_terbit,
        'jumlahDataIdDua_terbit' => $jumlahDataIdDua_terbit,
        'jumlahDataIdTiga_terbit' => $jumlahDataIdTiga_terbit,
        'jumlahDataIdEmpat_terbit' => $jumlahDataIdEmpat_terbit,
        'jumlahDataIdLima_terbit' => $jumlahDataIdLima_terbit,

        'jumlahDataIdSatu_doklapangan' => $jumlahDataIdSatu_doklapangan,
        'jumlahDataIdDua_doklapangan' => $jumlahDataIdDua_doklapangan,
        'jumlahDataIdTiga_doklapangan' => $jumlahDataIdTiga_doklapangan,
        'jumlahDataIdEmpat_doklapangan' => $jumlahDataIdEmpat_doklapangan,
        'jumlahDataIdLima_doklapangan' => $jumlahDataIdLima_doklapangan,

        'jumlahDataIdSatu_dikembalikan' => $jumlahDataIdSatu_dikembalikan,
        'jumlahDataIdDua_dikembalikan' => $jumlahDataIdDua_dikembalikan,
        'jumlahDataIdTiga_dikembalikan' => $jumlahDataIdTiga_dikembalikan,
        'jumlahDataIdEmpat_dikembalikan' => $jumlahDataIdEmpat_dikembalikan,
        'jumlahDataIdLima_dikembalikan' => $jumlahDataIdLima_dikembalikan,

        'jumlahDataIdSatu_olahdata' => $jumlahDataIdSatu_olahdata,
        'jumlahDataIdDua_olahdata' => $jumlahDataIdDua_olahdata,
        'jumlahDataIdTiga_olahdata' => $jumlahDataIdTiga_olahdata,
        'jumlahDataIdEmpat_olahdata' => $jumlahDataIdEmpat_olahdata,
        'jumlahDataIdLima_olahdata' => $jumlahDataIdLima_olahdata,

        'jumlahDataIdSatu' => $jumlahDataIdSatu,
        'jumlahDataIdDua' => $jumlahDataIdDua,
        'jumlahDataIdTiga' => $jumlahDataIdTiga,
        'jumlahDataIdEmpat' => $jumlahDataIdEmpat,
        'jumlahDataIdLima' => $jumlahDataIdLima,

        'datasemua' => $dataTanpaIdSatu,
    ]);
}

public function bepbgslfindexslf(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 25);

    // Query awal: filter berdasarkan jenispengajuanbantek_id = 1
    $query = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
        $q->where('id', 1);
    });

    // Jika ada pencarian
    if ($search) {
        $query->where(function ($q) use ($search) {
            // Pencarian utama berdasarkan nomor registrasi
            $q->where('noregissimbg', 'like', "%{$search}%")
              ->orWhere('tanggalpermohonan', 'like', "%{$search}%") // Tambahkan pencarian tanggal biasa

              // Pencarian ke relasi user
              ->orWhereHas('user', function ($sub) use ($search) {
                  $sub->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
              })

              // Pencarian ke relasi jenis pengajuan
              ->orWhereHas('jenispengajuanpbgslfper', function ($sub) use ($search) {
                  $sub->where('jenispengajuan', 'like', "%{$search}%");
              });

            // Tambahan: jika input search terlihat seperti format tanggal (YYYY-MM-DD), gunakan whereDate
            if (preg_match('/\d{4}-\d{2}-\d{2}/', $search)) {
                $q->orWhereDate('tanggalpermohonan', $search);
            }
        });
    }

    // Ambil hasil akhir
    $berkasbantek = $query->latest()->paginate($perPage)->appends($request->all());

    // Tampilkan ke view
    return view('backend.01_pbgslf.01_permohonanpbgslf.01_pbgpermohonan', [
        'title' => 'Permohonan (PBG) Persetujuan Bangunan Gedung ',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}


public function bepbgslfindexslfdelete($id)
{
    // Cari item berdasarkan judul
    $entry = pbgslfbangunan::where('id', $id)->first();

    if ($entry) {
        // Jika ada file header yang terdaftar, hapus dari storage
        // if (Storage::disk('public')->exists($entry->header)) {
            //     Storage::disk('public')->delete($entry->header);
            // }

            // Hapus entri dari database
            $entry->delete();

            // Redirect atau memberi respons sesuai kebutuhan
            return redirect('/bepbgslfindexslf')->with('delete', 'Data Berhasil Di Hapus !');

        }

        return redirect()->back()->with('error', 'Item not found');
    }

    public function bepbgslflihatper($id)
{
    // Cari data berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Tampilkan ke view dengan key-value
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_menuutamaberkas', [
        'title' => 'Informasi Registrasi SIMBG Bangunan Gedung',
        'data' => $data,
        'user' => $user
    ]);
}

// -------------------------------------------------------------

public function createdatapbgslf()
{
    // Ambil user login
    $user = Auth::user();
    $datapbgslf = jenispengajuanpbgslfper::all();
    // Kirim data ke view tanpa ambil dari database bantuanhibahbg
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.01_createpbgslf', [
        'title' => 'Buat Data Baru Permohonan SIM-BG',
        'title_halaman' => 'Data Induk Permohonan SIM-BG',
        'user' => $user,
        'datapbgslf' => $datapbgslf
    ]);
}


public function createdatapbgslfnew(Request $request)
{
    // Validasi input dengan custom messages
    $validated = $request->validate([
        'user_id' => 'required|string',
        'jenispengajuanpbgslfper_id' => 'required|string',
        'noregissimbg' => 'required|string|max:255',
        'tanggalpermohonan' => 'required|date',
    ], [
        'user_id.required' => 'User ID wajib diisi.',
        'user_id.exists' => 'User tidak ditemukan.',

        'jenispengajuanpbgslfper_id.required' => 'Jenis pengajuan wajib dipilih.',
        'jenispengajuanpbgslfper_id.exists' => 'Jenis pengajuan tidak valid.',

        'noregissimbg.required' => 'Nomor registrasi SIMBG wajib diisi.',
        'noregissimbg.max' => 'Nomor registrasi terlalu panjang.',

        'tanggalpermohonan.required' => 'Tanggal permohonan wajib diisi.',
        'tanggalpermohonan.date' => 'Format tanggal permohonan tidak valid.',
    ]);

    // Simpan ke database
    pbgslfbangunan::create([
        'user_id' => $validated['user_id'],
        'jenispengajuanpbgslfper_id' => $validated['jenispengajuanpbgslfper_id'],
        'noregissimbg' => $validated['noregissimbg'],
        'tanggalpermohonan' => $validated['tanggalpermohonan'],
    ]);

    session()->flash('create', 'Data Pengajuan PBG/SLF berhasil disimpan!');
    return redirect()->route('bepbgslfindexslfindex');
}



public function bepbgdatapemilik($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);

    // Ambil data datapemilik berdasarkan foreign key pbgslfbangunan_id
    $subdatapemilik = datapemilik::where('pbgslfbangunan_id', $data->id)->paginate(15);

    // Hitung nomor urut mulai untuk paginasi
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Ambil data jenis pengajuan
    $datapbgslf = jenispengajuanpbgslfper::all();

    // Kirim data ke view
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.02_datatanahpemohon', [
        'title' => 'Informasi Data Pemilik',
        'title_halaman' => 'Data Pemilik',
        'user' => $user,
        'data' => $data,
        'datapbgslf' => $datapbgslf,
        'subdatapemilik' => $subdatapemilik,
        'start' => $start,
    ]);
}


public function bepbgdatapemilikcreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = pbgslfbangunan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.02_tambahdatapemilik', [
        'title' => 'Tambah Data Pemilik ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


 public function bepbgdatapemilikcreatenew(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|string',
            'pbgslfbangunan_id' => 'required|string',
            'namapemilik' => 'required|string|max:255',
            'alamatpemilik' => 'required|string|max:255',
            'nomortelepon' => 'required|string|max:50',
            'email' => 'required|email|max:100',
            'noidentitas' => 'required|string|max:100',
            'pilihancatatan' => 'required|in:lengkap,tidak lengkap',
            'catatan' => 'nullable|string',
        ], [
            'pbgslfbangunan_id.required' => 'ID bangunan wajib diisi.',
            'pbgslfbangunan_id.exists' => 'Data bangunan tidak ditemukan.',
            'namapemilik.required' => 'Nama pemilik wajib diisi.',
            'alamatpemilik.required' => 'Alamat pemilik wajib diisi.',
            'nomortelepon.required' => 'Nomor telepon wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'noidentitas.required' => 'No identitas wajib diisi.',
            'pilihancatatan.required' => 'Pilihan catatan wajib dipilih.',
            'pilihancatatan.in' => 'Pilihan catatan harus antara "lengkap" atau "tidak lengkap".',
        ]);

        datapemilik::create([
              'id' => $request->input('id'),
            'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'],
            'namapemilik' => $validated['namapemilik'],
            'alamatpemilik' => $validated['alamatpemilik'],
            'nomortelepon' => $validated['nomortelepon'],
            'email' => $validated['email'],
            'noidentitas' => $validated['noidentitas'],
            'pilihancatatan' => $validated['pilihancatatan'],
            'catatan' => $validated['catatan'] ?? null,
        ]);


        session()->flash('create', 'Data pemilik berhasil ditambahkan!');
        return redirect()->route('bepbgdatapemilik', ['id' => $validated['pbgslfbangunan_id']]);
        // return redirect()->route('bepbgdatapemilik', ['id' => $validated['pbgslfbangunan_id']]);

    }

 public function bepbgdatapemilikdelete($id)
{
    // Cari entri datapemilik berdasarkan id
    $entry = datapemilik::find($id);

    if ($entry) {
        // Simpan dulu id bangunan sebelum hapus
        $pbgslfbangunan_id = $entry->pbgslfbangunan_id;

        // Hapus entri
        $entry->delete();

        // Redirect ke route 'bepbgdatapemilik' dengan parameter id bangunan
        return redirect()->route('bepbgdatapemilik', ['id' => $pbgslfbangunan_id])
                         ->with('delete', 'Data Berhasil Di Hapus !');
    }

    return redirect()->back()->with('error', 'Item not found');
}


public function bepbgdatabangunan($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);

    // Ambil data datapemilik berdasarkan foreign key pbgslfbangunan_id
    $subdatapemilik = databangunanpbg::where('pbgslfbangunan_id', $data->id)->paginate(15);

    // Hitung nomor urut mulai untuk paginasi
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Ambil data jenis pengajuan
    $datapbgslf = jenispengajuanpbgslfper::all();
    $datajenisperkons = jenisperkonsultasi::all();
    $datafungsibgpbg = fungsibangunanpbg::all();

    // Kirim data ke view
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.02_databangunan.02_databangunangedung', [
        'title' => 'Informasi Data Bangunan',
        'title_halaman' => 'Data Bangunan Gedung',
        'user' => $user,
        'data' => $data,
        'datapbgslf' => $datapbgslf,
        'datajenisperkons' => $datajenisperkons,
        'datafungsibgpbg' => $datafungsibgpbg,
        'subdatapemilik' => $subdatapemilik,
        'start' => $start,
    ]);
}

// ----------------------------------------------------
public function bepbgdatabangunancreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = pbgslfbangunan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    $datapbgslf = jenispengajuanpbgslfper::all();
    $datajenisperkons = jenisperkonsultasi::all();
    $datafungsibgpbg = fungsibangunanpbg::all();

    $datakecamatan = kecamatanblora::all();
    $datakelurahandesa = kelurahandesa::all();

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.02_databangunan.02_tambahdatabangunan', [
        'title' => 'Tambah Data Bangunan Gedung ',
        'data' => $databantuanteknis,
        'datapbgslf' => $datapbgslf,
        'datajenisperkons' => $datajenisperkons,
        'datafungsibgpbg' => $datafungsibgpbg,
        'datakecamatan' => $datakecamatan,
        'datakelurahandesa' => $datakelurahandesa,
        'user' => Auth::user()
    ]);
}


public function bepbgdatabangunancreatenew(Request $request)
{
    $validated = $request->validate([
        'id' => 'required|string',
        'pbgslfbangunan_id' => 'required|string',
        'jenisperkonsultasi_id' => 'required|string',
        'namabangunan' => 'required|string|max:255',
        'lokasibangunan' => 'required|string|max:255',
        'klasifikasibangunan' => 'required|string|max:255',
        'fungsibangunanpbg_id' => 'required|string',
        'luasbangunan' => 'required|string|max:100',
        'jenispermohonan' => 'required|in:Lengkap,Tidak Lengkap',
        'fungsibangunan' => 'required|in:Lengkap,Tidak Lengkap',
        'tinggibangunan' => 'required|string|max:100',
        'jumlahlantai' => 'required|string|max:50',
        'internsitasbangunan' => 'required|string|max:100',

        // Tambahan Internsitas Detail
        'nomorpkkpr' => 'required|string|max:255',
        'gsb' => 'required|string|max:100',
        'kdb' => 'required|string|max:100',
        'klb' => 'required|string|max:100',
        'kdh' => 'required|string|max:100',

        // Lokasi Bangunan
        'provinsi' => 'required|string|max:100',
        'kabupaten' => 'required|string|max:100',
        'kecamatanblora_id' => 'required|string',
        'kelurahandesa_id' => 'required|string',
        'alamatlengkap' => 'nullable|string|max:255',
        'koordinat' => 'nullable|string|max:100',

        // Catatan
        'pilihancatatan' => 'required|in:lengkap,tidak lengkap',
        'catatan' => 'nullable|string',
    ], [
        'pbgslfbangunan_id.required' => 'ID harus di pilih.',
        'jenisperkonsultasi_id.required' => 'Jenis Konsultasi Permohonan wajib diisi.',
        'namabangunan.required' => 'Nama Bangunan wajib diisi.',
        'lokasibangunan.required' => 'Lokasi Bangunan wajib diisi.',
        'klasifikasibangunan.required' => 'Klasifikasi Bangunan wajib diisi.',
        'fungsibangunanpbg_id.required' => 'Fungsi Bangunan wajib diisi.',
        'luasbangunan.required' => 'Luas Bangunan wajib diisi.',
        'jenispermohonan.required' => 'Jenis Permohonan wajib dipilih.',
        'fungsibangunan.required' => 'Fungsi Bangunan wajib dipilih.',
        'tinggibangunan.required' => 'Tinggi Bangunan wajib diisi.',
        'jumlahlantai.required' => 'Jumlah Lantai wajib diisi.',
        'internsitasbangunan.required' => 'Internsitas Bangunan wajib diisi.',
        'pilihancatatan.required' => 'Pilihan Catatan wajib dipilih!',
    ]);

    databangunanpbg::create([
        // 'id' => $validated['pbgslfbangunan_id'],
        'id' => $request->input('id'),
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'],
        'jenisperkonsultasi_id' => $validated['jenisperkonsultasi_id'],
        'namabangunan' => $validated['namabangunan'],
        'lokasibangunan' => $validated['lokasibangunan'],
        'klasifikasibangunan' => $validated['klasifikasibangunan'],
        'fungsibangunanpbg_id' => $validated['fungsibangunanpbg_id'],
        'luasbangunan' => $validated['luasbangunan'],
        'jenispermohonan' => $validated['jenispermohonan'],
        'fungsibangunan' => $validated['fungsibangunan'],
        'tinggibangunan' => $validated['tinggibangunan'],
        'jumlahlantai' => $validated['jumlahlantai'],
        'internsitasbangunan' => $validated['internsitasbangunan'],

        // Data Tambahan Internsitas
        'nomorpkkpr' => $validated['nomorpkkpr'] ?? null,
        'gsb' => $validated['gsb'] ?? null,
        'kdb' => $validated['kdb'] ?? null,
        'klb' => $validated['klb'] ?? null,
        'kdh' => $validated['kdh'] ?? null,

        // Data Lokasi
        'provinsi' => $validated['provinsi'] ?? 'Jawa Tengah',
        'kabupaten' => $validated['kabupaten'] ?? 'Kabupaten Blora',
        'kecamatanblora_id' => $validated['kecamatanblora_id'] ?? null,
        'kelurahandesa_id' => $validated['kelurahandesa_id'] ?? null,
        'alamatlengkap' => $validated['alamatlengkap'] ?? null,
        'koordinat' => $validated['koordinat'] ?? null,

        // Catatan
        'pilihancatatan' => $validated['pilihancatatan'],
        'catatan' => $validated['catatan'] ?? null,
    ]);

    session()->flash('create', 'Data Bangunan berhasil ditambahkan!');
    return redirect()->route('bepbgdatabangunan', ['id' => $validated['pbgslfbangunan_id']]);
}


 public function bepbgdatabangunandelete($id)
{
    // Cari entri datapemilik berdasarkan id
    $entry = databangunanpbg::find($id);

    if ($entry) {
        // Simpan dulu id bangunan sebelum hapus
        $pbgslfbangunan_id = $entry->pbgslfbangunan_id;

        // Hapus entri
        $entry->delete();

        // Redirect ke route 'bepbgdatapemilik' dengan parameter id bangunan
        return redirect()->route('bepbgdatabangunan', ['id' => $pbgslfbangunan_id])
                         ->with('delete', 'Data Berhasil Di Hapus !');
    }

    return redirect()->back()->with('error', 'Item not found');
}


public function bepbgdatatanah($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);

    // Ambil data datapemilik berdasarkan foreign key pbgslfbangunan_id
    $subdatapemilik = datatanahpbg::where('pbgslfbangunan_id', $data->id)->paginate(15);

    // Hitung nomor urut mulai untuk paginasi
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Kirim data ke view
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.03_datatanahbangunan.01_datatanah', [
        'title' => 'Informasi Data Tanah',
        'title_halaman' => 'Data Tanah Bangunan Gedung',
        'user' => $user,
        'data' => $data,
        'subdatapemilik' => $subdatapemilik,
        'start' => $start,
    ]);
}


public function bepbgdatatanahcreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = pbgslfbangunan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.03_datatanahbangunan.02_tambahdatatanah', [
        'title' => 'Tambah Data Tanah Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bepbgdatatanahcreatenew(Request $request)
{
    $validated = $request->validate([
        'id' => 'required|string',
        'pbgslfbangunan_id' => 'required|string',
        'isiandatatanah' => 'required|in:Lengkap,Tidak Lengkap',
        'layout' => 'required|in:Lengkap,Tidak Lengkap',
        'penyelidikan' => 'required|in:Lengkap,Tidak Lengkap',
        'pilihancatatan' => 'required|in:lengkap,tidak lengkap',
        'catatan' => 'nullable|string',
    ], [
        'pbgslfbangunan_id.required' => 'ID Bangunan harus dipilih.',
        'pbgslfbangunan_id.exists' => 'Data bangunan tidak ditemukan.',
        'isiandatatanah.required' => 'Isi Data Tanah wajib dipilih.',
        'isiandatatanah.in' => 'Isi Data Tanah harus Lengkap atau Tidak Lengkap.',
        'layout.required' => 'Layout wajib dipilih.',
        'layout.in' => 'Layout harus Lengkap atau Tidak Lengkap.',
        'penyelidikan.required' => 'Penyelidikan wajib dipilih.',
        'penyelidikan.in' => 'Penyelidikan harus Lengkap atau Tidak Lengkap.',
        'pilihancatatan.required' => 'Pilihan Catatan wajib dipilih.',
        'pilihancatatan.in' => 'Pilihan Catatan harus lengkap atau tidak lengkap.',
    ]);

    datatanahpbg::create([
        'id' => $request->input('id'),
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'],
        'isiandatatanah' => $validated['isiandatatanah'],
        'layout' => $validated['layout'],
        'penyelidikan' => $validated['penyelidikan'],
        'pilihancatatan' => $validated['pilihancatatan'],
        'catatan' => $validated['catatan'] ?? null,
    ]);

    session()->flash('create', 'Data Bangunan berhasil ditambahkan!');
    return redirect()->route('bepbgdatatanah', ['id' => $validated['pbgslfbangunan_id']]);
}



 public function bepbgdatatanahdelete($id)
{
    // Cari entri datapemilik berdasarkan id
    $entry = datatanahpbg::find($id);

    if ($entry) {
        // Simpan dulu id bangunan sebelum hapus
        $pbgslfbangunan_id = $entry->pbgslfbangunan_id;

        // Hapus entri
        $entry->delete();

        // Redirect ke route 'bepbgdatapemilik' dengan parameter id bangunan
        return redirect()->route('bepbgdatatanah', ['id' => $pbgslfbangunan_id])
                         ->with('delete', 'Data Berhasil Di Hapus !');
    }

    return redirect()->back()->with('error', 'Item not found');
}


public function bepbgdataumum($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);

    // Ambil data datapemilik berdasarkan foreign key pbgslfbangunan_id
    $subdatapemilik = dataumumpbg::where('pbgslfbangunan_id', $data->id)->paginate(15);

    // Hitung nomor urut mulai untuk paginasi
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Kirim data ke view
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.04_dataumum.01_dataumum', [
        'title' => 'Informasi Data Umum',
        'title_halaman' => 'Data Umum Bangunan Gedung',
        'user' => $user,
        'data' => $data,
        'subdatapemilik' => $subdatapemilik,
        'start' => $start,
    ]);
}

public function bepbgdataumumcreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = pbgslfbangunan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.04_dataumum.02_tambahdataumum', [
        'title' => 'Tambah Informasi Data Umum Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bepbgdataumumcreatenew(Request $request)
{
    $validated = $request->validate([
        'id' => 'required|string',
        'pbgslfbangunan_id' => 'required|string',
        'berkas1' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas2' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas3' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas4' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas5' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas6' => 'nullable|in:Lengkap,Tidak Lengkap',
        'pilihancatatan' => 'required|in:lengkap,tidak lengkap',
        'catatan' => 'nullable|string',
    ], [
        'pbgslfbangunan_id.required' => 'ID Bangunan harus dipilih.',
        'pbgslfbangunan_id.exists' => 'Data bangunan tidak ditemukan.',
        'berkas1.required' => 'Informasi 1 wajib dipilih.',
        'berkas1.in' => 'Berkas 1 harus Lengkap atau Tidak Lengkap.',
        'berkas2.required' => 'Informasi  2 wajib dipilih.',
        'berkas2.in' => 'Berkas 2 harus Lengkap atau Tidak Lengkap.',
        'berkas3.required' => 'Informasi  3 wajib dipilih.',
        'berkas3.in' => 'Berkas 3 harus Lengkap atau Tidak Lengkap.',
        'berkas4.required' => 'Informasi 4 wajib dipilih.',
        'berkas4.in' => 'Berkas 4 harus Lengkap atau Tidak Lengkap.',
        'berkas5.required' => 'Informasi 5 wajib dipilih.',
        'berkas5.in' => 'Berkas 5 harus Lengkap atau Tidak Lengkap.',
        'berkas6.required' => 'Informasi 6 wajib dipilih.',
        'berkas6.in' => 'Berkas 6 harus Lengkap atau Tidak Lengkap.',
        'pilihancatatan.required' => 'Pilihan Catatan wajib dipilih.',
        'pilihancatatan.in' => 'Pilihan Catatan harus lengkap atau tidak lengkap.',
    ]);

    dataumumpbg::create([
        'id' => $request->input('id'),
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'],
        'berkas1' => $validated['berkas1'],
        'berkas2' => $validated['berkas2'],
        'berkas3' => $validated['berkas3'],
        'berkas4' => $validated['berkas4'],
        // 'berkas5' => $validated['berkas5'],
        // 'berkas6' => $validated['berkas6'],
        'pilihancatatan' => $validated['pilihancatatan'],
        'catatan' => $validated['catatan'] ?? null,
    ]);

    session()->flash('create', 'Informasi Data Umum berhasil ditambahkan!');
    return redirect()->route('bepbgdataumum', ['id' => $validated['pbgslfbangunan_id']]);
}


 public function bepbgdataumumdelete($id)
{
    // Cari entri datapemilik berdasarkan id
    $entry = dataumumpbg::find($id);

    if ($entry) {
        // Simpan dulu id bangunan sebelum hapus
        $pbgslfbangunan_id = $entry->pbgslfbangunan_id;

        // Hapus entri
        $entry->delete();

        // Redirect ke route 'bepbgdatapemilik' dengan parameter id bangunan
        return redirect()->route('bepbgdataumum', ['id' => $pbgslfbangunan_id])
                         ->with('delete', 'Data Berhasil Di Hapus !');
    }

    return redirect()->back()->with('error', 'Item not found');
}


public function bepbgdokumeteknisars($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);

    // Ambil data datapemilik berdasarkan foreign key pbgslfbangunan_id
    $subdatapemilik = dokumenteknisarsi::where('pbgslfbangunan_id', $data->id)->paginate(15);

    // Hitung nomor urut mulai untuk paginasi
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Kirim data ke view
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.05_dokumenarsitektur.01_dataarsitektur', [
        'title' => 'Informasi Data Dokumen Teknis Arsitektur',
        'title_halaman' => 'Data Dokumen Teknis Arsitektur',
        'user' => $user,
        'data' => $data,
        'subdatapemilik' => $subdatapemilik,
        'start' => $start,
    ]);
}



public function bepbgdokumeteknisarscreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = pbgslfbangunan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.05_dokumenarsitektur.02_tambahdataarsi', [
        'title' => 'Tambah Informasi Dokumen Teknis Arsitektur ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bepbgdokumeteknisarscreatenew(Request $request)
{
    $validated = $request->validate([
        'id' => 'required|string',
        'pbgslfbangunan_id' => 'required|string',

        'berkas1' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas2' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas3' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas4' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas5' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas6' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas7' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas8' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas9' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas10' => 'required|in:Lengkap,Tidak Lengkap',

        'pilihancatatan' => 'required|in:lengkap,tidak lengkap',
        'catatan' => 'nullable|string',
    ], [
        'pbgslfbangunan_id.required' => 'ID Bangunan harus dipilih.',

        'berkas1.required' => 'Rekomendasi Peil Banjir wajib dipilih.',
        'berkas1.in' => 'Rekomendasi Peil Banjir harus Lengkap atau Tidak Lengkap.',
        'berkas2.required' => 'Spesifikasi Teknis Arsitektur Bangunan wajib dipilih.',
        'berkas2.in' => 'Spesifikasi Teknis Arsitektur Bangunan harus Lengkap atau Tidak Lengkap.',
        'berkas3.required' => 'Gambar Rencana Detail Bangunan wajib dipilih.',
        'berkas3.in' => 'Gambar Rencana Detail Bangunan harus Lengkap atau Tidak Lengkap.',
        'berkas4.required' => 'Gambar Rencana Tata Ruang Luar wajib dipilih.',
        'berkas4.in' => 'Gambar Rencana Tata Ruang Luar harus Lengkap atau Tidak Lengkap.',
        'berkas5.required' => 'Gambar Rencana Tata Ruang Dalam wajib dipilih.',
        'berkas5.in' => 'Gambar Rencana Tata Ruang Dalam harus Lengkap atau Tidak Lengkap.',
        'berkas6.required' => 'Gambar Rencana Tampak Bangunan wajib dipilih.',
        'berkas6.in' => 'Gambar Rencana Tampak Bangunan harus Lengkap atau Tidak Lengkap.',
        'berkas7.required' => 'Gambar Rencana Potongan Bangunan wajib dipilih.',
        'berkas7.in' => 'Gambar Rencana Potongan Bangunan harus Lengkap atau Tidak Lengkap.',
        'berkas8.required' => 'Gambar Rencana Denah Bangunan wajib dipilih.',
        'berkas8.in' => 'Gambar Rencana Denah Bangunan harus Lengkap atau Tidak Lengkap.',
        'berkas9.required' => 'Gambar Rencana Tapak Bangunan wajib dipilih.',
        'berkas9.in' => 'Gambar Rencana Tapak Bangunan harus Lengkap atau Tidak Lengkap.',
        'berkas10.required' => 'Gambar Situasi wajib dipilih.',
        'berkas10.in' => 'Gambar Situasi harus Lengkap atau Tidak Lengkap.',

        'pilihancatatan.required' => 'Pilihan Catatan wajib dipilih.',
        'pilihancatatan.in' => 'Pilihan Catatan harus lengkap atau tidak lengkap.',
    ]);

    dokumenteknisarsi::create([
        'id' => $request->input('id'),
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'],
        'berkas1' => $validated['berkas1'],
        'berkas2' => $validated['berkas2'],
        'berkas3' => $validated['berkas3'],
        'berkas4' => $validated['berkas4'],
        'berkas5' => $validated['berkas5'],
        'berkas6' => $validated['berkas6'],
        'berkas7' => $validated['berkas7'],
        'berkas8' => $validated['berkas8'],
        'berkas9' => $validated['berkas9'],
        'berkas10' => $validated['berkas10'],
        'pilihancatatan' => $validated['pilihancatatan'],
        'catatan' => $validated['catatan'] ?? null,
    ]);

    session()->flash('create', 'Dokumen Teknis Arsitektur berhasil ditambahkan!');
    return redirect()->route('bepbgdokumeteknisars', ['id' => $validated['pbgslfbangunan_id']]);
}



 public function bepbgdokumeteknisarsdelete($id)
{
    // Cari entri datapemilik berdasarkan id
    $entry = dokumenteknisars::find($id);

    if ($entry) {
        // Simpan dulu id bangunan sebelum hapus
        $pbgslfbangunan_id = $entry->pbgslfbangunan_id;

        // Hapus entri
        $entry->delete();

        // Redirect ke route 'bepbgdatapemilik' dengan parameter id bangunan
        return redirect()->route('bepbgdokumeteknisars', ['id' => $pbgslfbangunan_id])
                         ->with('delete', 'Data Berhasil Di Hapus !');
    }

    return redirect()->back()->with('error', 'Item not found');
}

 public function bepbgdataarsitekturdel($id)
{
    // Cari entri datapemilik berdasarkan id
    $entry = dokumenteknisarsi::find($id);

    if ($entry) {
        // Simpan dulu id bangunan sebelum hapus
        $pbgslfbangunan_id = $entry->pbgslfbangunan_id;

        // Hapus entri
        $entry->delete();

        // Redirect ke route 'bepbgdatapemilik' dengan parameter id bangunan
        return redirect()->route('bepbgdokumeteknisars', ['id' => $pbgslfbangunan_id])
                         ->with('delete', 'Data Berhasil Di Hapus !');
    }

    return redirect()->back()->with('error', 'Item not found');
}

public function bepbgdokumearsidelete($id)
{
    $entry = dokumenteknisarsi::find($id); // pakai find aja dulu

    if (!$entry) {
        return redirect()->back()->with('error', 'Item not found');
    }

    $pbgslfbangunan_id = $entry->pbgslfbangunan_id;
    $entry->delete();

    return redirect()->route('bepbgdokumeteknisars', ['id' => $pbgslfbangunan_id])
                     ->with('delete', 'Data Berhasil Di Hapus !');
}


public function bepbgdokumeteknisstrk($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);

    // Ambil data datapemilik berdasarkan foreign key pbgslfbangunan_id
    $subdatapemilik = dokumenteknisstruk::where('pbgslfbangunan_id', $data->id)->paginate(15);

    // Hitung nomor urut mulai untuk paginasi
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Kirim data ke view
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.06_dokumenstruktur.01_datastruktur', [
        'title' => 'Informasi Data Dokumen Teknis Struktur',
        'title_halaman' => 'Data Dokumen Teknis Struktur',
        'user' => $user,
        'data' => $data,
        'subdatapemilik' => $subdatapemilik,
        'start' => $start,
    ]);
}


public function bepbgdokumeteknisstrkcreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = pbgslfbangunan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.06_dokumenstruktur.02_tambahdatastruktur', [
        'title' => 'Tambah Informasi Dokumen Teknis Struktur ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bepbgdokumeteknisstrkcreatenew(Request $request)
{
    $validated = $request->validate([
        'id' => 'required|string',
        'pbgslfbangunan_id' => 'required|string',

        'berkas1' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas2' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas3' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas4' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas5' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas6' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas7' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas8' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas9' => 'required|in:Lengkap,Tidak Lengkap',

        'pilihancatatan' => 'required|in:lengkap,tidak lengkap',
        'catatan' => 'nullable|string',
    ], [
        'pbgslfbangunan_id.required' => 'ID Bangunan harus dipilih.',

        'berkas1.required' => 'Spesifikasi Teknis Struktur Bangunan wajib dipilih.',
        'berkas1.in' => 'Spesifikasi Teknis Struktur Bangunan harus diisi Lengkap atau Tidak Lengkap.',

        'berkas2.required' => 'Perhitungan Teknis Struktur wajib dipilih.',
        'berkas2.in' => 'Perhitungan Teknis Struktur harus diisi Lengkap atau Tidak Lengkap.',

        'berkas3.required' => 'Gambar Tangga wajib dipilih.',
        'berkas3.in' => 'Gambar Tangga harus diisi Lengkap atau Tidak Lengkap.',

        'berkas4.required' => 'Gambar Pelat Lantai wajib dipilih.',
        'berkas4.in' => 'Gambar Pelat Lantai harus diisi Lengkap atau Tidak Lengkap.',

        'berkas5.required' => 'Gambar Penutup wajib dipilih.',
        'berkas5.in' => 'Gambar Penutup harus diisi Lengkap atau Tidak Lengkap.',

        'berkas6.required' => 'Gambar Rangka Atap wajib dipilih.',
        'berkas6.in' => 'Gambar Rangka Atap harus diisi Lengkap atau Tidak Lengkap.',

        'berkas7.required' => 'Gambar Balok wajib dipilih.',
        'berkas7.in' => 'Gambar Balok harus diisi Lengkap atau Tidak Lengkap.',

        'berkas8.required' => 'Gambar Kolom wajib dipilih.',
        'berkas8.in' => 'Gambar Kolom harus diisi Lengkap atau Tidak Lengkap.',

        'berkas9.required' => 'Gambar Fondasi dan Sloof wajib dipilih.',
        'berkas9.in' => 'Gambar Fondasi dan Sloof harus diisi Lengkap atau Tidak Lengkap.',

        'pilihancatatan.required' => 'Pilihan Catatan harus dipilih.',
        'pilihancatatan.in' => 'Pilihan Catatan hanya boleh "lengkap" atau "tidak lengkap".',
    ]);

    dokumenteknisstruk::create([
        'id' => $request->input('id'),
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'],
        'berkas1' => $validated['berkas1'],
        'berkas2' => $validated['berkas2'],
        'berkas3' => $validated['berkas3'],
        'berkas4' => $validated['berkas4'],
        'berkas5' => $validated['berkas5'],
        'berkas6' => $validated['berkas6'],
        'berkas7' => $validated['berkas7'],
        'berkas8' => $validated['berkas8'],
        'berkas9' => $validated['berkas9'],
        'pilihancatatan' => $validated['pilihancatatan'],
        'catatan' => $validated['catatan'] ?? null,
    ]);

    session()->flash('create', 'Data Dokumen Teknis Struktur berhasil disimpan.');
    return redirect()->route('bepbgdokumeteknisstrk', ['id' => $validated['pbgslfbangunan_id']]);
}



public function bepbgdokumeteknisstrkdelete($id)
{
    $entry = dokumenteknisstruk::find($id); // pakai find aja dulu

    if (!$entry) {
        return redirect()->back()->with('error', 'Item not found');
    }

    $pbgslfbangunan_id = $entry->pbgslfbangunan_id;
    $entry->delete();

    return redirect()->route('bepbgdokumeteknisstrk', ['id' => $pbgslfbangunan_id])
                     ->with('delete', 'Data Berhasil Di Hapus !');
}


public function bepbgdokumeteknismep($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);

    // Ambil data datapemilik berdasarkan foreign key pbgslfbangunan_id
    $subdatapemilik = dokumenteknismep::where('pbgslfbangunan_id', $data->id)->paginate(15);

    // Hitung nomor urut mulai untuk paginasi
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Kirim data ke view
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.07_dokumenmep.01_datamep', [
        'title' => 'Informasi Data Dokumen Teknis Mekanikal Elektrikal Plumbing',
        'title_halaman' => 'Data Dokumen Teknis Mekanikal Elektrikal Plumbing',
        'user' => $user,
        'data' => $data,
        'subdatapemilik' => $subdatapemilik,
        'start' => $start,
    ]);
}


public function bepbgdokumeteknismepcreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = pbgslfbangunan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.07_dokumenmep.02_tambahdatamep', [
        'title' => 'Tambah Informasi Dokumen Teknis Mekanikal Elektrikal Plumbing ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bepbgdokumeteknismepcreatenew(Request $request)
{
    $validated = $request->validate([
        'id' => 'required|string',
        'pbgslfbangunan_id' => 'required|string',

        'berkas1' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas2' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas3' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas4' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas5' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas6' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas7' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas8' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas9' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas10' => 'required|in:Lengkap,Tidak Lengkap',

        'pilihancatatan' => 'required|in:lengkap,tidak lengkap',
        'catatan' => 'nullable|string',
    ], [
        'pbgslfbangunan_id.required' => 'ID Bangunan harus dipilih.',

        'berkas1.required' => 'Spesifikasi Teknis MEP wajib dipilih.',
        'berkas1.in' => 'Spesifikasi Teknis MEP harus diisi Lengkap atau Tidak Lengkap.',

        'berkas2.required' => 'Perhitungan Teknis MEP wajib dipilih.',
        'berkas2.in' => 'Perhitungan Teknis MEP harus diisi Lengkap atau Tidak Lengkap.',

        'berkas3.required' => 'Gambar Sistem Proteksi Kebakaran wajib dipilih.',
        'berkas3.in' => 'Gambar Sistem Proteksi Kebakaran harus diisi Lengkap atau Tidak Lengkap.',

        'berkas4.required' => 'Gambar Pengelolaan Persampahan wajib dipilih.',
        'berkas4.in' => 'Gambar Pengelolaan Persampahan harus diisi Lengkap atau Tidak Lengkap.',

        'berkas5.required' => 'Gambar Pengelolaan Drainase wajib dipilih.',
        'berkas5.in' => 'Gambar Pengelolaan Drainase harus diisi Lengkap atau Tidak Lengkap.',

        'berkas6.required' => 'Gambar Pengelolaan Air Limbah wajib dipilih.',
        'berkas6.in' => 'Gambar Pengelolaan Air Limbah harus diisi Lengkap atau Tidak Lengkap.',

        'berkas7.required' => 'Gambar Pengelolaan Air Hujan wajib dipilih.',
        'berkas7.in' => 'Gambar Pengelolaan Air Hujan harus diisi Lengkap atau Tidak Lengkap.',

        'berkas8.required' => 'Gambar Pengelolaan Air Bersih wajib dipilih.',
        'berkas8.in' => 'Gambar Pengelolaan Air Bersih harus diisi Lengkap atau Tidak Lengkap.',

        'berkas9.required' => 'Gambar Pencahayaan wajib dipilih.',
        'berkas9.in' => 'Gambar Pencahayaan harus diisi Lengkap atau Tidak Lengkap.',

        'berkas10.required' => 'Gambar Sumber & Jaringan Listrik wajib dipilih.',
        'berkas10.in' => 'Gambar Sumber & Jaringan Listrik harus diisi Lengkap atau Tidak Lengkap.',

        'pilihancatatan.required' => 'Pilihan Catatan harus dipilih.',
        'pilihancatatan.in' => 'Pilihan Catatan hanya boleh "lengkap" atau "tidak lengkap".',
    ]);

    dokumenteknismep::create([
        'id' => $request->input('id'),
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'],
        'berkas1' => $validated['berkas1'],
        'berkas2' => $validated['berkas2'],
        'berkas3' => $validated['berkas3'],
        'berkas4' => $validated['berkas4'],
        'berkas5' => $validated['berkas5'],
        'berkas6' => $validated['berkas6'],
        'berkas7' => $validated['berkas7'],
        'berkas8' => $validated['berkas8'],
        'berkas9' => $validated['berkas9'],
        'berkas10' => $validated['berkas10'],
        'pilihancatatan' => $validated['pilihancatatan'],
        'catatan' => $validated['catatan'] ?? null,
    ]);

    session()->flash('create', 'Data Dokumen Teknis MEP berhasil disimpan.');
    return redirect()->route('bepbgdokumeteknismep', ['id' => $validated['pbgslfbangunan_id']]);
}


public function bepbgdokumeteknismepdelete($id)
{
    $entry = dokumenteknismep::find($id); // pakai find aja dulu

    if (!$entry) {
        return redirect()->back()->with('error', 'Item not found');
    }

    $pbgslfbangunan_id = $entry->pbgslfbangunan_id;
    $entry->delete();

    return redirect()->route('bepbgdokumeteknismep', ['id' => $pbgslfbangunan_id])
                     ->with('delete', 'Data Berhasil Di Hapus !');
}


public function dokumenteknisslf($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);

    // Ambil data datapemilik berdasarkan foreign key pbgslfbangunan_id
    $subdatapemilik = dokumenteknisslfpbg::where('pbgslfbangunan_id', $data->id)->paginate(15);

    // Hitung nomor urut mulai untuk paginasi
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Kirim data ke view
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.08_dokumenslf.01_dataslf', [
        'title' => 'Informasi Data Dokumen Teknis Jika Bangunan SLF',
        'title_halaman' => 'Data Dokumen Teknis (Jika) SLF',
        'user' => $user,
        'data' => $data,
        'subdatapemilik' => $subdatapemilik,
        'start' => $start,
    ]);
}


public function dokumenteknisslfcreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = pbgslfbangunan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.08_dokumenslf.02_tambahdataslf', [
        'title' => 'Tambah Informasi Dokumen Teknis (Jika) SLF ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function dokumenteknisslfcreatenew(Request $request)
{
    $validated = $request->validate([
        'id' => 'required|string',
        'pbgslfbangunan_id' => 'required|string',

        'berkas1' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas2' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas3' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas4' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas5' => 'required|in:Lengkap,Tidak Lengkap',
        'berkas6' => 'required|in:Lengkap,Tidak Lengkap',

        'pilihancatatan' => 'required|in:lengkap,tidak lengkap',
        'catatan' => 'nullable|string',
    ], [
        'pbgslfbangunan_id.required' => 'ID Bangunan harus dipilih.',

        'berkas1.required' => 'Laporan Pemeriksaan Kelaikan Fungsi Bangunan Gedung wajib dipilih.',
        'berkas1.in' => 'Laporan Pemeriksaan Kelaikan Fungsi Bangunan Gedung harus diisi Lengkap atau Tidak Lengkap.',

        'berkas2.required' => 'Laporan Pemeriksaan Berkala Bangunan Gedung wajib dipilih.',
        'berkas2.in' => 'Laporan Pemeriksaan Berkala Bangunan Gedung harus diisi Lengkap atau Tidak Lengkap.',

        'berkas3.required' => 'Gambar Bangunan Gedung Terbangun (As Built Drawing) wajib dipilih.',
        'berkas3.in' => 'Gambar Bangunan Gedung Terbangun (As Built Drawing) harus diisi Lengkap atau Tidak Lengkap.',

        'berkas4.required' => 'Perhitungan Teknis dan Dokumen Rencana Teknis saat Pembangunan Gedung wajib dipilih.',
        'berkas4.in' => 'Perhitungan Teknis dan Dokumen Rencana Teknis saat Pembangunan Gedung harus diisi Lengkap atau Tidak Lengkap.',

        'berkas5.required' => 'Gambar Detail Struktur Terbangun wajib dipilih.',
        'berkas5.in' => 'Gambar Detail Struktur Terbangun harus diisi Lengkap atau Tidak Lengkap.',

        'berkas6.required' => 'Data Tenaga Ahli Pengkaji Teknis Bersertifikat wajib dipilih.',
        'berkas6.in' => 'Data Tenaga Ahli Pengkaji Teknis Bersertifikat harus diisi Lengkap atau Tidak Lengkap.',

        'pilihancatatan.required' => 'Pilihan Catatan harus dipilih.',
        'pilihancatatan.in' => 'Pilihan Catatan hanya boleh "lengkap" atau "tidak lengkap".',
    ]);

    dokumenteknisslfpbg::create([
        'id' => $request->input('id'),
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'],
        'berkas1' => $validated['berkas1'],
        'berkas2' => $validated['berkas2'],
        'berkas3' => $validated['berkas3'],
        'berkas4' => $validated['berkas4'],
        'berkas5' => $validated['berkas5'],
        'berkas6' => $validated['berkas6'],
        'pilihancatatan' => $validated['pilihancatatan'],
        'catatan' => $validated['catatan'] ?? null,
    ]);

    session()->flash('create', 'Data Dokumen Teknis SLF berhasil disimpan.');
    return redirect()->route('dokumenteknisslf', ['id' => $validated['pbgslfbangunan_id']]);
}

public function dokumenteknisslfdelete($id)
{
    $entry = dokumenteknisslfpbg::find($id); // pakai find aja dulu

    if (!$entry) {
        return redirect()->back()->with('error', 'Item not found');
    }

    $pbgslfbangunan_id = $entry->pbgslfbangunan_id;
    $entry->delete();

    return redirect()->route('dokumenteknisslf', ['id' => $pbgslfbangunan_id])
                     ->with('delete', 'Data Berhasil Di Hapus !');
}


public function bepbgsuratpemberitahuan($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);

    // Ambil semua data surat pemberitahuan berdasarkan pbgslfbangunan_id tanpa pagination
    $subdatapemilik = suratpemberitahuanpbg::where('pbgslfbangunan_id', $data->id)->get();

    // Kirim data ke view
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.09_suratpemberitahuan.01_datasuratpemberitahuan', [
        'title' => 'Surat Pemberitahuan',
        'title_halaman' => 'Surat Pemberitahuan',
        'user' => $user,
        'data' => $data,
        'subdatapemilik' => $subdatapemilik,
    ]);
}


public function bepbgsuratpemberitahuandel($id)
{
    $entry = suratpemberitahuanpbg::find($id); // pakai find aja dulu

    if (!$entry) {
        return redirect()->back()->with('error', 'Item not found');
    }

    $pbgslfbangunan_id = $entry->pbgslfbangunan_id;
    $entry->delete();

    return redirect()->route('bepbgsuratpemberitahuan', ['id' => $pbgslfbangunan_id])
                     ->with('delete', 'Data Berhasil Di Hapus !');
}


public function bepbgsuratpemberitahuancreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = pbgslfbangunan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.08_dokumenslf.03_tambahsuratpemberitahuan', [
        'title' => 'Buat Data Surat Pemberitahuan',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bepbgsuratnew(Request $request)
{

    $validated = $request->validate([
    'pbgslfbangunan_id' => 'required|string',
    'tanggalpemberitahuan' => 'required|date',
    'pemberitahuanke' => 'required|string|max:255',
    'pilihancatatan' => 'required|in:lengkap,tidak lengkap',
    'catatan' => 'nullable|string',

    // Foreign key tambahan
    'datapemilik_id' => 'nullable|string',
    'databangunanpbg_id' => 'nullable|string',
    'datatanahpbg_id' => 'nullable|string',
    'dataumumpbg_id' => 'nullable|string',
    'dokumenteknisarsi_id' => 'nullable|string',
    'dokumenteknisstruk_id' => 'nullable|string',
    'dokumenteknismep_id' => 'nullable|string',
    'dokumenteknisslfpbg_id' => 'nullable|string',
    ],[
        'pbgslfbangunan_id.required' => 'ID Bangunan wajib diisi.',
        'pbgslfbangunan_id.exists' => 'ID Bangunan tidak ditemukan.',

        'tanggalpemberitahuan.required' => 'Tanggal Pemberitahuan wajib diisi.',
        'tanggalpemberitahuan.date' => 'Tanggal Pemberitahuan harus berupa format tanggal yang valid.',

        'pemberitahuanke.required' => 'Kolom Pemberitahuan Ke wajib diisi.',
        'pemberitahuanke.string' => 'Pemberitahuan Ke harus berupa teks.',
        'pemberitahuanke.max' => 'Pemberitahuan Ke tidak boleh lebih dari 255 karakter.',

        'pilihancatatan.required' => 'Pilihan Catatan wajib diisi.',
        'pilihancatatan.in' => 'Pilihan Catatan hanya boleh "lengkap" atau "tidak lengkap".',

        'catatan.string' => 'Catatan harus berupa teks.',
    ]);

suratpemberitahuanpbg::create([
    'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'],
    'tanggalpemberitahuan' => $validated['tanggalpemberitahuan'],
    'pemberitahuanke' => $validated['pemberitahuanke'],
    'pilihancatatan' => $validated['pilihancatatan'],
    'catatan' => $validated['catatan'] ?? null,

    // Foreign key tambahan
    'datapemilik_id' => $validated['datapemilik_id'] ?? null,
    'databangunanpbg_id' => $validated['databangunanpbg_id'] ?? null,
    'datatanahpbg_id' => $validated['datatanahpbg_id'] ?? null,
    'dataumumpbg_id' => $validated['dataumumpbg_id'] ?? null,
    'dokumenteknisarsi_id' => $validated['dokumenteknisarsi_id'] ?? null,
    'dokumenteknisstruk_id' => $validated['dokumenteknisstruk_id'] ?? null,
    'dokumenteknismep_id' => $validated['dokumenteknismep_id'] ?? null,
    'dokumenteknisslfpbg_id' => $validated['dokumenteknisslfpbg_id'] ?? null,
]);

    session()->flash('create', 'Data Surat Pemberitahuan berhasil disimpan.');
    return redirect()->route('bepbgsuratpemberitahuan', ['id' => $validated['pbgslfbangunan_id']]);
}

public function bepbgsuratpemberitahuanshow(Request $request, $id)
{
    // Ambil user login
    $user = Auth::user();
    // Cari data pbg berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);
    $surat = suratpemberitahuanpbg::findOrFail($id);
    // $datapemilik = datapemilik::findOrFail($id);
    // $datapemilik = datapemilik::where('pbgslfbangunan_id', $id)->firstOrFail();
    // $datapemilik = datapemilik::where('pbgslfbangunan_id', $id)->first(); // tanpa fail
    $datapemilik = datapemilik::firstOrNew(['pbgslfbangunan_id' => $id]);
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
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.09_suratpemberitahuan.02_showsurat', [
        'title' => 'Surat Pemberitahuan',
        'title_halaman' => 'Surat Pemberitahuan',
        'user' => $user,
        'data' => $data,
        'datapemilik' => $datapemilik,
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


public function bepbgsurattugas($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);

    // Ambil semua data surat pemberitahuan berdasarkan pbgslfbangunan_id tanpa pagination
    $subdatapemilik = surattugaspbg::where('pbgslfbangunan_id', $data->id)->get();

    // Kirim data ke view
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.10_surattugas.01_datasurattugas', [
        'title' => 'Surat Tugas',
        'title_halaman' => 'Surat Tugas',
        'user' => $user,
        'data' => $data,
        // 'datafasi' => $data,
        'subdatapemilik' => $subdatapemilik,
    ]);
}

// ==================================================
public function bepbgsurattugasshow(Request $request, $id)
{
    // Ambil user login
    $user = Auth::user();
    // Cari data pbg berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);
    $surat = surattugaspbg::findOrFail($id);
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
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.10_surattugas.02_showsurattugas', [
        'title' => 'Surat Tugas Fasilitator',
        'title_halaman' => 'Surat Tugas Fasilitator',
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



public function bepbgsurattugascreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = pbgslfbangunan::find($id);
    $fasilitators = fasilitatorpbg::all();

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.10_surattugas.03_tambahsuratfasilitator', [
        'title' => 'Buat Data Surat Tugas Fasilitator',
        'data' => $databantuanteknis,
        'fasilitators' => $fasilitators,
        'user' => Auth::user()
    ]);
}

public function bepbgsurattugasnew(Request $request)
{
    $validated = $request->validate([
        'pbgslfbangunan_id' => 'required|string',
        'datapemilik_id' => 'required|string',
        'fasilitatorpbg_id' => 'required|string',
        'nomorsurat' => 'required|string|max:255',
        'nomorkontrak' => 'required|string|max:255',
        'tanggaltugas' => 'required|date',
    ], [
        'pbgslfbangunan_id.required' => 'ID Bangunan wajib diisi.',
        'pbgslfbangunan_id.exists' => 'ID Bangunan tidak ditemukan.',

        'datapemilik_id.required' => 'ID Pemilik wajib diisi.',
        'datapemilik_id.exists' => 'ID Pemilik tidak ditemukan.',

        'fasilitatorpbg_id.required' => 'Fasilitator wajib dipilih.',
        'fasilitatorpbg_id.exists' => 'Fasilitator tidak ditemukan.',

        'nomorsurat.max' => 'Nomor Surat tidak boleh lebih dari 255 karakter.',
        'nomorkontrak.max' => 'Nomor Kontrak tidak boleh lebih dari 255 karakter.',

        'tanggaltugas.required' => 'Tanggal Tugas wajib diisi.',
        'tanggaltugas.date' => 'Tanggal Tugas harus berupa format tanggal yang valid.',
    ]);

    surattugaspbg::create([
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'],
        'datapemilik_id' => $validated['datapemilik_id'],
        'fasilitatorpbg_id' => $validated['fasilitatorpbg_id'],
        'nomorsurat' => $validated['nomorsurat'] ?? null,
        'nomorkontrak' => $validated['nomorkontrak'] ?? null,
        'tanggaltugas' => $validated['tanggaltugas'],
    ]);

    session()->flash('create', 'Surat Tugas Fasilitator berhasil disimpan.');
    return redirect()->route('bepbgsurattugas', ['id' => $validated['pbgslfbangunan_id']]);
}


public function bepbgsurattugasnewdelete($id)
{
    $entry = surattugaspbg::find($id); // pakai find aja dulu

    if (!$entry) {
        return redirect()->back()->with('error', 'Item not found');
    }

    $pbgslfbangunan_id = $entry->pbgslfbangunan_id;
    $entry->delete();

    return redirect()->route('bepbgsurattugas', ['id' => $pbgslfbangunan_id])
                     ->with('delete', 'Data Berhasil Di Hapus !');
}


public function bepbgtpatpt($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);

    // Ambil semua data surat pemberitahuan berdasarkan pbgslfbangunan_id tanpa pagination
    $subdatapemilik = tpatpt::where('pbgslfbangunan_id', $data->id)->get();

    // Kirim data ke view
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.11_tpatpt.01_datatpatpt', [
        'title' => 'Pemilihan TPT/TPA',
        'title_halaman' => 'Pemilihan TPT/TPA',
        'user' => $user,
        'data' => $data,
        // 'datafasi' => $data,
        'subdatapemilik' => $subdatapemilik,
    ]);
}


public function bepbgtpatptcreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = pbgslfbangunan::find($id);
    $pengawasList = pengawasatpt::all();

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.11_tpatpt.02_tambahfasilitatorbaru', [
        'title' => 'Pilih Petugas TPT/TPA',
        'data' => $databantuanteknis,
        'pengawasList' => $pengawasList,
        'user' => Auth::user()
    ]);
}


public function bepbgtpatptcreatenew(Request $request)
{
    $validated = $request->validate([
        'id' => 'required|string',
        'pbgslfbangunan_id' => 'required|string',
        'timpenilai' => 'required|string',
        'nosk' => 'required|string',
        'pengawas1_id' => 'required|string',
        'pengawas2_id' => 'nullable|string',
        'pengawas3_id' => 'nullable|string',
        'pengawas4_id' => 'nullable|string',
        'pengawas5_id' => 'nullable|string',
        'pengawas6_id' => 'nullable|string',
        'pengawas7_id' => 'nullable|string',
    ], [
        'pbgslfbangunan_id.required' => 'ID Bangunan wajib diisi.',
        'pbgslfbangunan_id.exists' => 'ID Bangunan tidak ditemukan.',

        'timpenilai.required' => 'Tim Penilai wajib dipilih.',
        'nosk.required' => 'Nomor SK wajib diisi.',
        'nosk.max' => 'Nomor SK maksimal 255 karakter.',

        'pengawas1_id.requires' => 'Wajib Di Pilih.',
        'pengawas2_id.requires' => 'Wajib Di Pilih.',
        'pengawas3_id.requires' => 'Wajib Di Pilih.',
        'pengawas4_id.requires' => 'Wajib Di Pilih.',
        'pengawas5_id.requires' => 'Wajib Di Pilih.',
        'pengawas6_id.requires' => 'Wajib Di Pilih.',
        'pengawas7_id.requires' => 'Wajib Di Pilih.',
        // 'pengawas1_id.requires' => 'Wajib Di Pilih.',
        'pengawas1_id.exists' => 'Pengawas 1 tidak valid.',
        'pengawas2_id.exists' => 'Pengawas 2 tidak valid.',
        'pengawas3_id.exists' => 'Pengawas 3 tidak valid.',
        'pengawas4_id.exists' => 'Pengawas 4 tidak valid.',
        'pengawas5_id.exists' => 'Pengawas 5 tidak valid.',
        'pengawas6_id.exists' => 'Pengawas 6 tidak valid.',
        'pengawas7_id.exists' => 'Pengawas 7 tidak valid.',
    ]);

    tpatpt::create([
        'id' => $request->input('id'),
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'],
        'timpenilai' => $validated['timpenilai'],
        'nosk' => $validated['nosk'],
        'pengawas1_id' => $validated['pengawas1_id'] ?? null,
        'pengawas2_id' => $validated['pengawas2_id'] ?? null,
        'pengawas3_id' => $validated['pengawas3_id'] ?? null,
        'pengawas4_id' => $validated['pengawas4_id'] ?? null,
        'pengawas5_id' => $validated['pengawas5_id'] ?? null,
        'pengawas6_id' => $validated['pengawas6_id'] ?? null,
        'pengawas7_id' => $validated['pengawas7_id'] ?? null,
    ]);

    session()->flash('create', 'Surat Tugas TPA/TPT berhasil disimpan.');
    return redirect()->route('bepbgtpatpt', ['id' => $validated['pbgslfbangunan_id']]);
}



public function bepbgtpatptdelete($id)
{
    $entry = tpatpt::find($id); // pakai find aja dulu

    if (!$entry) {
        return redirect()->back()->with('error', 'Item not found');
    }

    $pbgslfbangunan_id = $entry->pbgslfbangunan_id;
    $entry->delete();

    return redirect()->route('bepbgtpatpt', ['id' => $pbgslfbangunan_id])
                     ->with('delete', 'Data Berhasil Di Hapus !');
}


public function bepbgsuratundangan($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);

    // Ambil semua data surat pemberitahuan berdasarkan pbgslfbangunan_id tanpa pagination
    $subdatapemilik = suratudanganpbg::where('pbgslfbangunan_id', $data->id)->get();

    // Kirim data ke view
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.12_suratundangan.01_datasuratundangan', [
        'title' => 'Surat Undangan',
        'title_halaman' => 'Surat Undangan',
        'user' => $user,
        'data' => $data,
        'subdatapemilik' => $subdatapemilik,
    ]);
}


public function bepbgsuratundangancreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = pbgslfbangunan::find($id);
    $tempatkonsultasi = tempatkonsultasi::all();

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.12_suratundangan.02_tambahsuratundangan', [
        'title' => 'Buat Surat Undangan Baru',
        'data' => $databantuanteknis,
        'tempatkonsultasi' => $tempatkonsultasi,
        'user' => Auth::user()
    ]);
}

public function bepbgsuratundangannew(Request $request)
{
    $validated = $request->validate([
        'pbgslfbangunan_id'   => 'required|string',
        'datapemilik_id'   => 'required|string',
        'databangunanpbg_id'   => 'required|string',
        'tempatkonsultasi_id'   => 'required|string',
        'tpatpt_id'   => 'required|string',
        'konsultasike'        => 'required|string',
        'tanggalundangan'     => 'required|date',
        'tanggalkehadiran'    => 'required|date',
        'jamundangan'         => 'required|string',
        'catatan'             => 'nullable|string',
    ], [
        'pbgslfbangunan_id.required' => 'ID Bangunan wajib diisi.',
        'pbgslfbangunan_id.exists'   => 'ID Bangunan tidak ditemukan.',

        'konsultasike.required'      => 'Konsultasi Ke wajib dipilih.',
        'konsultasike.max'           => 'Konsultasi Ke maksimal 10 karakter.',

        'tanggalundangan.required'  => 'Tanggal Undangan wajib diisi.',
        'tanggalundangan.date'      => 'Tanggal Undangan harus berupa tanggal yang valid.',

        'tanggalkehadiran.required' => 'Tanggal Kehadiran wajib diisi.',
        'tanggalkehadiran.date'     => 'Tanggal Kehadiran harus berupa tanggal yang valid.',

        'jamundangan.required'      => 'Jam Undangan wajib dipilih.',
        'jamundangan.max'           => 'Jam Undangan maksimal 255 karakter.',

        'catatan.string'            => 'Catatan harus berupa teks.',
    ]);

    // Simpan ke database
    suratudanganpbg::create([
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'],
        'datapemilik_id' => $validated['datapemilik_id'],
        'databangunanpbg_id' => $validated['databangunanpbg_id'],
        'tempatkonsultasi_id' => $validated['tempatkonsultasi_id'],
        'tpatpt_id' => $validated['tpatpt_id'],
        'konsultasike'      => $validated['konsultasike'],
        'tanggalundangan'   => $validated['tanggalundangan'],
        'tanggalkehadiran'  => $validated['tanggalkehadiran'],
        'jamundangan'       => $validated['jamundangan'],
        'catatan'           => $validated['catatan'] ?? null,
    ]);

//     session()->flash('create', 'Data Surat Undangan berhasil disimpan.');
//     return redirect()->to(url()->previous());
// // return redirect()->back(); // atau: return redirect()->to(url()->previous());


    session()->flash('create', 'Data Surat Undangan berhasil disimpan.');
    return redirect()->route('bepbgsuratundangan', ['id' => $validated['pbgslfbangunan_id']]);
}


public function bepbgsuratundanganshow(Request $request, $id)
{
    // Ambil user login
    $user = Auth::user();
    // Cari data pbg berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);
    $surat = suratudanganpbg::findOrFail($id);
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
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.12_suratundangan.03_showundangan', [
        'title' => 'Surat Undangan ',
        'title_halaman' => 'Surat Undangan',
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


public function bepbgsuratundangandelete($id)
{
    $entry = suratudanganpbg::find($id); // pakai find aja dulu

    if (!$entry) {
        return redirect()->back()->with('error', 'Item not found');
    }

    $pbgslfbangunan_id = $entry->pbgslfbangunan_id;
    $entry->delete();

    return redirect()->route('bepbgsuratundangan', ['id' => $pbgslfbangunan_id])
                     ->with('delete', 'Data Berhasil Di Hapus !');
}



public function bepbgberitaacaraslf($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);

    // Ambil semua data surat pemberitahuan berdasarkan pbgslfbangunan_id tanpa pagination
    $subdatapemilik = suratudanganpbg::where('pbgslfbangunan_id', $data->id)->get();

    // Kirim data ke view
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.13_beritaacara.01_beritaacara', [
        'title' => 'Berita Acara Konsultasi',
        'title_halaman' => 'Berita Acara Konsultasi',
        'user' => $user,
        'data' => $data,
        'subdatapemilik' => $subdatapemilik,
    ]);
}


public function bepbgberitaacaraslfshow(Request $request, $id)
{
    // Ambil user login
    $user = Auth::user();
    // Cari data pbg berdasarkan ID
    // $data = pbgslfbangunan::findOrFail($id);
    $surat = suratudanganpbg::findOrFail($id);
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
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.13_beritaacara.02_beritaacarashow', [
        'title' => 'Berita Acara',
        'title_halaman' => 'Berita Acara',
        'user' => $user,
        // 'data' => $data,
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


}
