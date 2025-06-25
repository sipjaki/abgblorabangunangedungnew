<?php

namespace App\Http\Controllers;
use App\Models\pbgslfbangunan;
use App\Models\bujkkonsultan;
use App\Models\ceklapanganbantek;
use App\Models\datapemilik;
use App\Models\jenispengajuanpbgslfper;
use App\Models\kecamatanblora;
use App\Models\kelurahandesa;
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
        'title' => 'Informasi Data Tanah',
        'title_halaman' => 'Data Tanah Pemohon',
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

}
