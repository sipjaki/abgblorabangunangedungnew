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
use App\Models\fungsibangunan;
use App\Models\fungsibangunanpbg;
use App\Models\gambarbantuan;
use App\Models\infopbg1;
use App\Models\infopbg2;
use App\Models\infopbg3;
use App\Models\infopbg4;
use App\Models\infopbg5;
use App\Models\infopbg6;
use App\Models\infopbg7;
use App\Models\infopbg8;
use App\Models\jenispengajuanpbgslfper;
use App\Models\jenisperkonsultasi;
use App\Models\kecamatanblora;
use App\Models\kelurahandesa;
use App\Models\mbrgambar;
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

use Illuminate\Support\Facades\DB;

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
    $perPage = $request->input('perPage', 10);

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
              ->orWhere('namapemohon', 'like', "%{$search}%") // Tambahkan pencarian tanggal biasa

              // Pencarian ke relasi user
              ->orWhereHas('user', function ($sub) use ($search) {
                  $sub->where('name', 'like', "%{$search}%");
                    //   ->orWhere('email', 'like', "%{$search}%");
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

public function bepbgslfindexsearch(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 10);

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
              ->orWhere('namapemohon', 'like', "%{$search}%") // Tambahkan pencarian tanggal biasa

              // Pencarian ke relasi user
              ->orWhereHas('user', function ($sub) use ($search) {
                  $sub->where('name', 'like', "%{$search}%");
                    //   ->orWhere('email', 'like', "%{$search}%");
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

    // Step 1: Buat record baru dengan ID sendiri sebagai default foreign key
    $bangunan = pbgslfbangunan::create([
        'user_id' => $user->id,
        'datapemilik_id' => null, // sementara null dulu
        'databangunanpbg_id' => null,
        'datatanahpbg_id' => null,
        'dataumumpbg_id' => null,
        'dokumenteknisarsi_id' => null,
        'dokumenteknisstruk_id' => null,
        'dokumenteknismep_id' => null,
        'dokumenteknisslfpbg_id' => null,
        'surattugaspbg_id' => null,
        'tpatpt_id' => null,
    ]);

    // Step 2: Update foreign key dengan ID-nya sendiri
    $bangunan->update([
        'datapemilik_id' => $bangunan->id,
        'databangunanpbg_id' => $bangunan->id,
        'datatanahpbg_id' => $bangunan->id,
        'dataumumpbg_id' => $bangunan->id,
        'dokumenteknisarsi_id' => $bangunan->id,
        'dokumenteknisstruk_id' => $bangunan->id,
        'dokumenteknismep_id' => $bangunan->id,
        'dokumenteknisslfpbg_id' => $bangunan->id,
        'surattugaspbg_id' => $bangunan->id,
        'tpatpt_id' => $bangunan->id,
    ]);

    // Ambil data pilihan jenis pengajuan
    $jenispengajuan = jenispengajuanpbgslfper::all();

    // Kirim ke view
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.01_createpbgslf', [
        'title' => 'Buat Data Baru Permohonan SIMBG',
        'title_halaman' => 'Data Induk Permohonan SIMBG',
        'user' => $user,
        'data' => $bangunan,
        'datapbgslf' => $jenispengajuan
    ]);
}

public function createdatapbgslfnew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'id' => 'required|string',
        'user_id' => 'required|string',
        'jenispengajuanpbgslfper_id' => 'required|string',
        'noregissimbg' => 'required|string|max:255',
        'tanggalpermohonan' => 'required|date',
        'namapemohon' => 'required|string',

        // foreign key (boleh nullable)
        'datapemilik_id' => 'nullable|string',
        'databangunanpbg_id' => 'nullable|string',
        'datatanahpbg_id' => 'nullable|string',
        'dataumumpbg_id' => 'nullable|string',
        'dokumenteknisarsi_id' => 'nullable|string',
        'dokumenteknisstruk_id' => 'nullable|string',
        'dokumenteknismep_id' => 'nullable|string',
        'dokumenteknisslfpbg_id' => 'nullable|string',
        'surattugaspbg_id' => 'nullable|string',
        'tpatpt_id' => 'nullable|string',
    ], [
        'user_id.required' => 'User ID wajib diisi.',
        'jenispengajuanpbgslfper_id.required' => 'Jenis pengajuan wajib dipilih.',
        'noregissimbg.required' => 'Nomor registrasi SIMBG wajib diisi.',
        'namapemohon.required' => 'Nomor Pemohon wajib diisi.',
        'noregissimbg.max' => 'Nomor registrasi terlalu panjang.',
        'tanggalpermohonan.required' => 'Tanggal permohonan wajib diisi.',
        'tanggalpermohonan.date' => 'Format tanggal permohonan tidak valid.',
    ]);

    // Update data yang sudah dibuat sebelumnya
    pbgslfbangunan::where('id', $validated['id'])->update([
        'user_id' => $validated['user_id'],
        'jenispengajuanpbgslfper_id' => $validated['jenispengajuanpbgslfper_id'],
        'noregissimbg' => $validated['noregissimbg'],
        'tanggalpermohonan' => $validated['tanggalpermohonan'],
        'namapemohon' => $validated['namapemohon'],

        'datapemilik_id' => $request->datapemilik_id,
        'databangunanpbg_id' => $request->databangunanpbg_id,
        'datatanahpbg_id' => $request->datatanahpbg_id,
        'dataumumpbg_id' => $request->dataumumpbg_id,
        'dokumenteknisarsi_id' => $request->dokumenteknisarsi_id,
        'dokumenteknisstruk_id' => $request->dokumenteknisstruk_id,
        'dokumenteknismep_id' => $request->dokumenteknismep_id,
        'dokumenteknisslfpbg_id' => $request->dokumenteknisslfpbg_id,
        'surattugaspbg_id' => $request->surattugaspbg_id,
        'tpatpt_id' => $request->tpatpt_id,
    ]);

    // Feedback ke user
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
            'namapemilik' => 'nullable|string|max:255',
            'alamatpemilik' => 'required|string|max:255',
            'nomortelepon' => 'required|string|max:50',
            'email' => 'required|email|max:100',
            'noidentitas' => 'required|string|max:100',
            'pilihancatatan' => 'required|in:lengkap,tidak lengkap',
            'catatan' => 'nullable|string',
        ], [
            'pbgslfbangunan_id.required' => 'ID bangunan wajib diisi.',
            'pbgslfbangunan_id.exists' => 'Data bangunan tidak ditemukan.',
            // 'namapemilik.required' => 'Nama pemilik wajib diisi.',
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
            'namapemilik' => $validated['namapemilik'] ?? null,
            'alamatpemilik' => $validated['alamatpemilik'] ?? null,
            'nomortelepon' => $validated['nomortelepon'] ?? null,
            'email' => $validated['email'] ?? null,
            'noidentitas' => $validated['noidentitas'] ?? null,
            'pilihancatatan' => $validated['pilihancatatan'] ?? null,
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
        'pbgslfbangunan_id' => 'nullable|string',
        'jenisperkonsultasi_id' => 'nullable|string',
        'namabangunan' => 'nullable|string|max:255',
        'lokasibangunan' => 'nullable|string|max:255',
        'klasifikasibangunan' => 'nullable|string|max:255',
        'fungsibangunanpbg_id' => 'nullable|string',
        'luasbangunan' => 'nullable|string|max:100',
        'jenispermohonan' => 'nullable|in:Lengkap,Tidak Lengkap',
        'fungsibangunan' => 'nullable|in:Lengkap,Tidak Lengkap',
        'tinggibangunan' => 'nullable|string|max:100',
        'jumlahlantai' => 'nullable|string|max:50',
        'internsitasbangunan' => 'nullable|string|max:100',

        // Tambahan Internsitas Detail
        'nomorpkkpr' => 'nullable|string|max:255',
        'gsb' => 'nullable|string|max:100',
        'kdb' => 'nullable|string|max:100',
        'klb' => 'nullable|string|max:100',
        'kdh' => 'nullable|string|max:100',

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
        'cadangan1' => 'nullable|string',
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
        'cadangan1.required' => 'Sub Fungsi Bangunan Wajib Di Pilih!',
    ]);

    databangunanpbg::create([
        // 'id' => $validated['pbgslfbangunan_id'],
        'id' => $request->input('id'),
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'] ?? null,
        'jenisperkonsultasi_id' => $validated['jenisperkonsultasi_id'] ?? null,
        'namabangunan' => $validated['namabangunan'] ?? null,
        'lokasibangunan' => $validated['lokasibangunan'] ?? null,
        'klasifikasibangunan' => $validated['klasifikasibangunan'] ?? null,
        'fungsibangunanpbg_id' => $validated['fungsibangunanpbg_id'] ?? null,
        'luasbangunan' => $validated['luasbangunan'] ?? null,
        'jenispermohonan' => $validated['jenispermohonan'] ?? null,
        'fungsibangunan' => $validated['fungsibangunan'] ?? null,
        'tinggibangunan' => $validated['tinggibangunan'] ?? null,
        'jumlahlantai' => $validated['jumlahlantai'] ?? null,
        'internsitasbangunan' => $validated['internsitasbangunan'] ?? null,

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
        'cadangan1' => $validated['cadangan1'] ?? null,
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
        'layout' => 'nullable|in:Lengkap,Tidak Lengkap',
        'penyelidikan' => 'nullable|in:Lengkap,Tidak Lengkap',
        'pilihancatatan' => 'nullable|in:lengkap,tidak lengkap',
        'berkas4' => 'nullable|string',
        'catatan' => 'nullable|string',
     'catatanberkas1' => 'nullable|string|max:255',
     'catatanberkas2' => 'nullable|string|max:255',
     'catatanberkas3' => 'nullable|string|max:255',
     'catatanberkas4' => 'nullable|string|max:255',
    ], [
        'pbgslfbangunan_id.required' => 'ID Bangunan harus dipilih.',
        'pbgslfbangunan_id.exists' => 'Data bangunan tidak ditemukan.',
        // 'isiandatatanah.required' => 'Isi Data Tanah wajib dipilih.',
        // 'isiandatatanah.in' => 'Isi Data Tanah harus Lengkap atau Tidak Lengkap.',
        // 'layout.required' => 'Layout wajib dipilih.',
        // 'layout.in' => 'Layout harus Lengkap atau Tidak Lengkap.',
        // 'penyelidikan.required' => 'Penyelidikan wajib dipilih.',
        // 'penyelidikan.in' => 'Penyelidikan harus Lengkap atau Tidak Lengkap.',
        // 'pilihancatatan.required' => 'Pilihan Catatan wajib dipilih.',
        // 'pilihancatatan.in' => 'Pilihan Catatan harus lengkap atau tidak lengkap.',
    ]);

    datatanahpbg::create([
        'id' => $request->input('id'),
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'] ?? null ,
        'isiandatatanah' => $validated['isiandatatanah'] ?? null ,
        'layout' => $validated['layout'] ?? null ,
        'penyelidikan' => $validated['penyelidikan'] ?? null ,
        'berkas4' => $validated['berkas4'] ?? null ,
        'pilihancatatan' => $validated['pilihancatatan'] ?? null ,
        'catatan' => $validated['catatan'] ?? null,
        'catatanberkas1' => $validated['catatanberkas1'] ?? null,
        'catatanberkas2' => $validated['catatanberkas2'] ?? null,
        'catatanberkas3' => $validated['catatanberkas3'] ?? null,
        'catatanberkas4' => $validated['catatanberkas4'] ?? null,
    ]);

    session()->flash('create', 'Data Tanah berhasil ditambahkan!');
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
        'berkas1' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas2' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas3' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas4' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas5' => 'nullable|string',
        'berkas6' => 'nullable|in:Lengkap,Tidak Lengkap',
        'cadangan1' => 'nullable|in:Lengkap,Tidak Lengkap',
        'pilihancatatan' => 'required|in:lengkap,tidak lengkap',
        'catatan' => 'nullable|string',
          'catatanberkas1' => 'nullable|string|max:255',
          'catatanberkas2' => 'nullable|string|max:255',
          'catatanberkas3' => 'nullable|string|max:255',
          'catatanberkas4' => 'nullable|string|max:255',
          'cadangan2' => 'nullable|string|max:255',

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
        'berkas5.in' => 'Berkas 5 harus Diisi.',
        'berkas6.required' => 'Informasi 6 wajib dipilih.',
        'berkas6.in' => 'Berkas 6 harus Lengkap atau Tidak Lengkap.',
        'pilihancatatan.required' => 'Pilihan Catatan wajib dipilih.',
        'pilihancatatan.in' => 'Pilihan Catatan harus lengkap atau tidak lengkap.',
    ]);

    dataumumpbg::create([
        'id' => $request->input('id'),
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'],
        'berkas1' => $validated['berkas1'] ?? null,
        'berkas2' => $validated['berkas2'] ?? null,
        'berkas3' => $validated['berkas3'] ?? null,
        'berkas4' => $validated['berkas4'] ?? null,
        'berkas5' => $validated['berkas5'] ?? null,
        'cadangan1' => $validated['cadangan1'] ?? null,
        // 'berkas6' => $validated['berkas6'],
        'pilihancatatan' => $validated['pilihancatatan'] ?? null,
        'catatan' => $validated['catatan'] ?? null,
        'catatanberkas1' => $validated['catatanberkas1'] ?? null,
        'catatanberkas2' => $validated['catatanberkas2'] ?? null,
        'catatanberkas3' => $validated['catatanberkas3'] ?? null,
        'catatanberkas4' => $validated['catatanberkas4'] ?? null,
        'catatanberkas5' => $validated['catatanberkas5'] ?? null,
        'cadangan2' => $validated['cadangan2'] ?? null,
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

        'berkas1' => 'nullable|string',
        'berkas2' => 'nullable|string',
        'berkas3' => 'nullable|string',
        'berkas4' => 'nullable|string',
        'berkas5' => 'nullable|string',
        'berkas6' => 'nullable|string',
        'berkas7' => 'nullable|string',
        'berkas8' => 'nullable|string',
        'berkas9' => 'nullable|string',
        'berkas10' => 'nullable|string',

          'catatanberkas1' => 'nullable|string|max:255',
          'catatanberkas2' => 'nullable|string|max:255',
          'catatanberkas3' => 'nullable|string|max:255',
          'catatanberkas4' => 'nullable|string|max:255',
          'catatanberkas5' => 'nullable|string|max:255',
          'catatanberkas6' => 'nullable|string|max:255',
          'catatanberkas7' => 'nullable|string|max:255',
          'catatanberkas8' => 'nullable|string|max:255',
          'catatanberkas9' => 'nullable|string|max:255',
          'catatanberkas10' => 'nullable|string|max:255',


        'pilihancatatan' => 'required|in:lengkap,tidak lengkap',
        'catatan' => 'nullable|string',
    ], [
        'pbgslfbangunan_id.required' => 'ID Bangunan harus dipilih.',

        // 'berkas1.required' => 'Rekomendasi Peil Banjir wajib dipilih.',
        // 'berkas1.in' => 'Rekomendasi Peil Banjir harus Lengkap atau Tidak Lengkap.',
        // 'berkas2.required' => 'Spesifikasi Teknis Arsitektur Bangunan wajib dipilih.',
        // 'berkas2.in' => 'Spesifikasi Teknis Arsitektur Bangunan harus Lengkap atau Tidak Lengkap.',
        // 'berkas3.required' => 'Gambar Rencana Detail Bangunan wajib dipilih.',
        // 'berkas3.in' => 'Gambar Rencana Detail Bangunan harus Lengkap atau Tidak Lengkap.',
        // 'berkas4.required' => 'Gambar Rencana Tata Ruang Luar wajib dipilih.',
        // 'berkas4.in' => 'Gambar Rencana Tata Ruang Luar harus Lengkap atau Tidak Lengkap.',
        // 'berkas5.required' => 'Gambar Rencana Tata Ruang Dalam wajib dipilih.',
        // 'berkas5.in' => 'Gambar Rencana Tata Ruang Dalam harus Lengkap atau Tidak Lengkap.',
        // 'berkas6.required' => 'Gambar Rencana Tampak Bangunan wajib dipilih.',
        // 'berkas6.in' => 'Gambar Rencana Tampak Bangunan harus Lengkap atau Tidak Lengkap.',
        // 'berkas7.required' => 'Gambar Rencana Potongan Bangunan wajib dipilih.',
        // 'berkas7.in' => 'Gambar Rencana Potongan Bangunan harus Lengkap atau Tidak Lengkap.',
        // 'berkas8.required' => 'Gambar Rencana Denah Bangunan wajib dipilih.',
        // 'berkas8.in' => 'Gambar Rencana Denah Bangunan harus Lengkap atau Tidak Lengkap.',
        // 'berkas9.required' => 'Gambar Rencana Tapak Bangunan wajib dipilih.',
        // 'berkas9.in' => 'Gambar Rencana Tapak Bangunan harus Lengkap atau Tidak Lengkap.',
        // 'berkas10.required' => 'Gambar Situasi wajib dipilih.',
        // 'berkas10.in' => 'Gambar Situasi harus Lengkap atau Tidak Lengkap.',

        'pilihancatatan.required' => 'Pilihan Catatan wajib dipilih.',
        'pilihancatatan.in' => 'Pilihan Catatan harus lengkap atau tidak lengkap.',
    ]);

    dokumenteknisarsi::create([
        'id' => $request->input('id'),
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'] ?? null,
        'berkas1' => $validated['berkas1'] ?? null,
        'berkas2' => $validated['berkas2'] ?? null,
        'berkas3' => $validated['berkas3'] ?? null,
        'berkas4' => $validated['berkas4'] ?? null,
        'berkas5' => $validated['berkas5'] ?? null,
        'berkas6' => $validated['berkas6'] ?? null,
        'berkas7' => $validated['berkas7'] ?? null,
        'berkas8' => $validated['berkas8'] ?? null,
        'berkas9' => $validated['berkas9'] ?? null,
        'berkas10' => $validated['berkas10'] ?? null,
        'catatanberkas1' => $validated['catatanberkas1'] ?? null,
        'catatanberkas2' => $validated['catatanberkas2'] ?? null,
        'catatanberkas3' => $validated['catatanberkas3'] ?? null,
        'catatanberkas4' => $validated['catatanberkas4'] ?? null,
        'catatanberkas5' => $validated['catatanberkas5'] ?? null,
        'catatanberkas6' => $validated['catatanberkas6'] ?? null,
        'catatanberkas7' => $validated['catatanberkas7'] ?? null,
        'catatanberkas8' => $validated['catatanberkas8'] ?? null,
        'catatanberkas9' => $validated['catatanberkas9'] ?? null,
        'catatanberkas10' => $validated['catatanberkas10'] ?? null,

        'pilihancatatan' => $validated['pilihancatatan'] ?? null,
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

        'berkas1' => 'nullable|string',
        'berkas2' => 'nullable|string',
        'berkas3' => 'nullable|string',
        'berkas4' => 'nullable|string',
        'berkas5' => 'nullable|string',
        'berkas6' => 'nullable|string',
        'berkas7' => 'nullable|string',
        'berkas8' => 'nullable|string',
        'berkas9' => 'nullable|string',

          'catatanberkas1' => 'nullable|string|max:255',
          'catatanberkas2' => 'nullable|string|max:255',
          'catatanberkas3' => 'nullable|string|max:255',
          'catatanberkas4' => 'nullable|string|max:255',
          'catatanberkas5' => 'nullable|string|max:255',
          'catatanberkas6' => 'nullable|string|max:255',
          'catatanberkas7' => 'nullable|string|max:255',
          'catatanberkas8' => 'nullable|string|max:255',
          'catatanberkas9' => 'nullable|string|max:255',
        // 'berkas10' => 'nullable|string',

        'pilihancatatan' => 'required|in:lengkap,tidak lengkap',
        'catatan' => 'nullable|string',
    ], [
        'pbgslfbangunan_id.required' => 'ID Bangunan harus dipilih.',

        // 'berkas1.required' => 'Spesifikasi Teknis Struktur Bangunan wajib dipilih.',
        // 'berkas1.in' => 'Spesifikasi Teknis Struktur Bangunan harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas2.required' => 'Perhitungan Teknis Struktur wajib dipilih.',
        // 'berkas2.in' => 'Perhitungan Teknis Struktur harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas3.required' => 'Gambar Tangga wajib dipilih.',
        // 'berkas3.in' => 'Gambar Tangga harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas4.required' => 'Gambar Pelat Lantai wajib dipilih.',
        // 'berkas4.in' => 'Gambar Pelat Lantai harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas5.required' => 'Gambar Penutup wajib dipilih.',
        // 'berkas5.in' => 'Gambar Penutup harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas6.required' => 'Gambar Rangka Atap wajib dipilih.',
        // 'berkas6.in' => 'Gambar Rangka Atap harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas7.required' => 'Gambar Balok wajib dipilih.',
        // 'berkas7.in' => 'Gambar Balok harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas8.required' => 'Gambar Kolom wajib dipilih.',
        // 'berkas8.in' => 'Gambar Kolom harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas9.required' => 'Gambar Fondasi dan Sloof wajib dipilih.',
        // 'berkas9.in' => 'Gambar Fondasi dan Sloof harus diisi Lengkap atau Tidak Lengkap.',

        'pilihancatatan.required' => 'Pilihan Catatan harus dipilih.',
        'pilihancatatan.in' => 'Pilihan Catatan hanya boleh "lengkap" atau "tidak lengkap".',
    ]);

    dokumenteknisstruk::create([
        'id' => $request->input('id'),
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'],
      'berkas1' => $validated['berkas1'] ?? null,
        'berkas2' => $validated['berkas2'] ?? null,
        'berkas3' => $validated['berkas3'] ?? null,
        'berkas4' => $validated['berkas4'] ?? null,
        'berkas5' => $validated['berkas5'] ?? null,
        'berkas6' => $validated['berkas6'] ?? null,
        'berkas7' => $validated['berkas7'] ?? null,
        'berkas8' => $validated['berkas8'] ?? null,
        'berkas9' => $validated['berkas9'] ?? null,

        'catatanberkas1' => $validated['catatanberkas1'] ?? null,
        'catatanberkas2' => $validated['catatanberkas2'] ?? null,
        'catatanberkas3' => $validated['catatanberkas3'] ?? null,
        'catatanberkas4' => $validated['catatanberkas4'] ?? null,
        'catatanberkas5' => $validated['catatanberkas5'] ?? null,
        'catatanberkas6' => $validated['catatanberkas6'] ?? null,
        'catatanberkas7' => $validated['catatanberkas7'] ?? null,
        'catatanberkas8' => $validated['catatanberkas8'] ?? null,
        'catatanberkas9' => $validated['catatanberkas9'] ?? null,

        // 'berkas10' => $validated['berkas10'],
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

        'berkas1' => 'nullable|string',
        'berkas2' => 'nullable|string',
        'berkas3' => 'nullable|string',
        'berkas4' => 'nullable|string',
        'berkas5' => 'nullable|string',
        'berkas6' => 'nullable|string',
        'berkas7' => 'nullable|string',
        'berkas8' => 'nullable|string',
        'berkas9' => 'nullable|string',
        'berkas10' => 'nullable|string',

          'catatanberkas1' => 'nullable|string|max:255',
          'catatanberkas2' => 'nullable|string|max:255',
          'catatanberkas3' => 'nullable|string|max:255',
          'catatanberkas4' => 'nullable|string|max:255',
          'catatanberkas5' => 'nullable|string|max:255',
          'catatanberkas6' => 'nullable|string|max:255',
          'catatanberkas7' => 'nullable|string|max:255',
          'catatanberkas8' => 'nullable|string|max:255',
          'catatanberkas9' => 'nullable|string|max:255',
          'catatanberkas10' => 'nullable|string|max:255',

        'pilihancatatan' => 'required|in:lengkap,tidak lengkap',
        'catatan' => 'nullable|string',
    ], [
        'pbgslfbangunan_id.required' => 'ID Bangunan harus dipilih.',

        // 'berkas1.required' => 'Spesifikasi Teknis MEP wajib dipilih.',
        // 'berkas1.in' => 'Spesifikasi Teknis MEP harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas2.required' => 'Perhitungan Teknis MEP wajib dipilih.',
        // 'berkas2.in' => 'Perhitungan Teknis MEP harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas3.required' => 'Gambar Sistem Proteksi Kebakaran wajib dipilih.',
        // 'berkas3.in' => 'Gambar Sistem Proteksi Kebakaran harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas4.required' => 'Gambar Pengelolaan Persampahan wajib dipilih.',
        // 'berkas4.in' => 'Gambar Pengelolaan Persampahan harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas5.required' => 'Gambar Pengelolaan Drainase wajib dipilih.',
        // 'berkas5.in' => 'Gambar Pengelolaan Drainase harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas6.required' => 'Gambar Pengelolaan Air Limbah wajib dipilih.',
        // 'berkas6.in' => 'Gambar Pengelolaan Air Limbah harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas7.required' => 'Gambar Pengelolaan Air Hujan wajib dipilih.',
        // 'berkas7.in' => 'Gambar Pengelolaan Air Hujan harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas8.required' => 'Gambar Pengelolaan Air Bersih wajib dipilih.',
        // 'berkas8.in' => 'Gambar Pengelolaan Air Bersih harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas9.required' => 'Gambar Pencahayaan wajib dipilih.',
        // 'berkas9.in' => 'Gambar Pencahayaan harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas10.required' => 'Gambar Sumber & Jaringan Listrik wajib dipilih.',
        // 'berkas10.in' => 'Gambar Sumber & Jaringan Listrik harus diisi Lengkap atau Tidak Lengkap.',

        'pilihancatatan.required' => 'Pilihan Catatan harus dipilih.',
        'pilihancatatan.in' => 'Pilihan Catatan hanya boleh "lengkap" atau "tidak lengkap".',
    ]);

    dokumenteknismep::create([
        'id' => $request->input('id'),
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'],
        // 'berkas2' => $validated['berkas2'] ?? null,
        'berkas1' => $validated['berkas1'] ?? null,
        'berkas2' => $validated['berkas2'] ?? null,
        'berkas3' => $validated['berkas3'] ?? null,
        'berkas4' => $validated['berkas4'] ?? null,
        'berkas5' => $validated['berkas5'] ?? null,
        'berkas6' => $validated['berkas6'] ?? null,
        'berkas7' => $validated['berkas7'] ?? null,
        'berkas8' => $validated['berkas8'] ?? null,
        'berkas9' => $validated['berkas9'] ?? null,
        'berkas10' => $validated['berkas10'] ?? null,

        'catatanberkas1' => $validated['catatanberkas1'] ?? null,
        'catatanberkas2' => $validated['catatanberkas2'] ?? null,
        'catatanberkas3' => $validated['catatanberkas3'] ?? null,
        'catatanberkas4' => $validated['catatanberkas4'] ?? null,
        'catatanberkas5' => $validated['catatanberkas5'] ?? null,
        'catatanberkas6' => $validated['catatanberkas6'] ?? null,
        'catatanberkas7' => $validated['catatanberkas7'] ?? null,
        'catatanberkas8' => $validated['catatanberkas8'] ?? null,
        'catatanberkas9' => $validated['catatanberkas9'] ?? null,
        'catatanberkas10' => $validated['catatanberkas10'] ?? null,

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

        'berkas1' => 'nullable|string',
        'berkas2' => 'nullable|string',
        'berkas3' => 'nullable|string',
        'berkas4' => 'nullable|string',
        'berkas5' => 'nullable|string',
        'berkas6' => 'nullable|string',

          'catatanberkas1' => 'nullable|string|max:255',
          'catatanberkas2' => 'nullable|string|max:255',
          'catatanberkas3' => 'nullable|string|max:255',
          'catatanberkas4' => 'nullable|string|max:255',
          'catatanberkas5' => 'nullable|string|max:255',
          'catatanberkas6' => 'nullable|string|max:255',


        'pilihancatatan' => 'required|in:lengkap,tidak lengkap',
        'catatan' => 'nullable|string',
    ], [
        'pbgslfbangunan_id.required' => 'ID Bangunan harus dipilih.',

        // 'berkas1.required' => 'Laporan Pemeriksaan Kelaikan Fungsi Bangunan Gedung wajib dipilih.',
        // 'berkas1.in' => 'Laporan Pemeriksaan Kelaikan Fungsi Bangunan Gedung harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas2.required' => 'Laporan Pemeriksaan Berkala Bangunan Gedung wajib dipilih.',
        // 'berkas2.in' => 'Laporan Pemeriksaan Berkala Bangunan Gedung harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas3.required' => 'Gambar Bangunan Gedung Terbangun (As Built Drawing) wajib dipilih.',
        // 'berkas3.in' => 'Gambar Bangunan Gedung Terbangun (As Built Drawing) harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas4.required' => 'Perhitungan Teknis dan Dokumen Rencana Teknis saat Pembangunan Gedung wajib dipilih.',
        // 'berkas4.in' => 'Perhitungan Teknis dan Dokumen Rencana Teknis saat Pembangunan Gedung harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas5.required' => 'Gambar Detail Struktur Terbangun wajib dipilih.',
        // 'berkas5.in' => 'Gambar Detail Struktur Terbangun harus diisi Lengkap atau Tidak Lengkap.',

        // 'berkas6.required' => 'Data Tenaga Ahli Pengkaji Teknis Bersertifikat wajib dipilih.',
        // 'berkas6.in' => 'Data Tenaga Ahli Pengkaji Teknis Bersertifikat harus diisi Lengkap atau Tidak Lengkap.',

        'pilihancatatan.required' => 'Pilihan Catatan harus dipilih.',
        'pilihancatatan.in' => 'Pilihan Catatan hanya boleh "lengkap" atau "tidak lengkap".',
    ]);

    dokumenteknisslfpbg::create([
        'id' => $request->input('id'),
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'],
        'berkas1' => $validated['berkas1'] ?? null,
        'berkas2' => $validated['berkas2'] ?? null,
        'berkas3' => $validated['berkas3'] ?? null,
        'berkas4' => $validated['berkas4'] ?? null,
        'berkas5' => $validated['berkas5'] ?? null,
        'berkas6' => $validated['berkas6'] ?? null,

        'catatanberkas1' => $validated['catatanberkas1'] ?? null,
        'catatanberkas2' => $validated['catatanberkas2'] ?? null,
        'catatanberkas3' => $validated['catatanberkas3'] ?? null,
        'catatanberkas4' => $validated['catatanberkas4'] ?? null,
        'catatanberkas5' => $validated['catatanberkas5'] ?? null,
        'catatanberkas6' => $validated['catatanberkas6'] ?? null,

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
    // $data = pbgslfbangunan::findOrFail($id);
   $surat = suratpemberitahuanpbg::findOrFail($id);

       $datapemilik = datapemilik::firstOrNew(['pbgslfbangunan_id' => $id]);

    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.09_suratpemberitahuan.02_showsurat', [
        'title' => 'Surat Pemberitahuan',
        'title_halaman' => 'Surat Pemberitahuan',
        'user' => $user,
        // 'data' => $data,
        'datapemilik' => $datapemilik,
        'subdatasuratpemberitahuan' => $surat,
        'surat' => $surat, // Kirim surat yang dipilih

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
    $data = gambarbantuan::findOrFail($id);
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
        'title' => 'Surat Tugas Fasilitator Bantuan Gambar',
        'title_halaman' => 'Surat Tugas Fasilitator Bantuan Gambar',
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
    $databantuanteknis = gambarbantuan::find($id);
    $fasilitators = fasilitatorpbg::all();

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.10_surattugas.03_tambahsuratfasilitator', [
        'title' => 'Buat Data Surat Tugas Fasilitator Bantuan Gambar',
        'data' => $databantuanteknis,
        'fasilitators' => $fasilitators,
        'user' => Auth::user()
    ]);
}

public function bepbgsurattugasnew(Request $request)
{
    $validated = $request->validate([
        'gambarbantuan_id' => 'required|string',
        // 'pbgslfbangunan_id' => 'required|string',
        // 'datapemilik_id' => 'required|string',
        'fasilitatorpbg_id' => 'required|string',
        'nomorsurat' => 'required|string|max:255',
        'nomorkontrak' => 'required|string|max:255',
        'tanggaltugas' => 'required|date',
    ], [
        'gambarbantuan_id.required' => 'ID Pemohon wajib diisi.',
        'pbgslfbangunan_id.required' => 'ID Bangunan wajib diisi.',
        'pbgslfbangunan_id.exists' => 'ID Bangunan tidak ditemukan.',

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

    surattugaspbg::create([
        'gambarbantuan_id' => $validated['gambarbantuan_id'],
        // 'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'],
        // 'datapemilik_id' => $validated['datapemilik_id'],
        'fasilitatorpbg_id' => $validated['fasilitatorpbg_id'],
        'nomorsurat' => $validated['nomorsurat'] ?? null,
        'nomorkontrak' => $validated['nomorkontrak'] ?? null,
        'tanggaltugas' => $validated['tanggaltugas'],
    ]);

    session()->flash('create', 'Surat Tugas Fasilitator bantuan gambar berhasil diterbitkan.');
    return redirect()->route('bepbgsurattugasgambar', ['id' => $validated['gambarbantuan_id']]);
}


public function bepbgsurattugasnewdelete($id)
{
    $entry = surattugaspbg::find($id); // pakai find aja dulu

    if (!$entry) {
        return redirect()->back()->with('error', 'Item not found');
    }

    $gambarbantuan_id = $entry->gambarbantuan_id;
    $entry->delete();

    return redirect()->route('bepbgsurattugasgambar', ['id' => $gambarbantuan_id])
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

        'pengawas8_id' => 'nullable|string',
        'pengawas9_id' => 'nullable|string',
        'pengawas10_id' => 'nullable|string',
        'pengawas11_id' => 'nullable|string',
        'pengawas12_id' => 'nullable|string',
        // 'pengawas7_id' => 'nullable|string',
        // 'pengawas7_id' => 'nullable|string',


    ], [
        'pbgslfbangunan_id.required' => 'ID Bangunan wajib diisi.',
        'pbgslfbangunan_id.exists' => 'ID Bangunan tidak ditemukan.',

        'timpenilai.required' => 'Tim Penilai wajib dipilih.',
        'nosk.required' => 'Nomor SK wajib diisi.',
        'nosk.max' => 'Nomor SK maksimal 255 karakter.',

        'pengawas1_id.requires' => 'Wajib Di Pilih.',
        // 'pengawas2_id.requires' => 'Wajib Di Pilih.',
        // 'pengawas3_id.requires' => 'Wajib Di Pilih.',
        // 'pengawas4_id.requires' => 'Wajib Di Pilih.',
        // 'pengawas5_id.requires' => 'Wajib Di Pilih.',
        // 'pengawas6_id.requires' => 'Wajib Di Pilih.',
        // 'pengawas7_id.requires' => 'Wajib Di Pilih.',
        // // 'pengawas1_id.requires' => 'Wajib Di Pilih.',
        // 'pengawas1_id.exists' => 'Pengawas 1 tidak valid.',
        // 'pengawas2_id.exists' => 'Pengawas 2 tidak valid.',
        // 'pengawas3_id.exists' => 'Pengawas 3 tidak valid.',
        // 'pengawas4_id.exists' => 'Pengawas 4 tidak valid.',
        // 'pengawas5_id.exists' => 'Pengawas 5 tidak valid.',
        // 'pengawas6_id.exists' => 'Pengawas 6 tidak valid.',
        // 'pengawas7_id.exists' => 'Pengawas 7 tidak valid.',
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
        'pengawas8_id' => $validated['pengawas8_id'] ?? null,
        'pengawas9_id' => $validated['pengawas9_id'] ?? null,
        'pengawas10_id' => $validated['pengawas10_id'] ?? null,
        'pengawas11_id' => $validated['pengawas11_id'] ?? null,
        'pengawas12_id' => $validated['pengawas12_id'] ?? null,
        // 'pengawas7_id' => $validated['pengawas7_id'] ?? null,
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
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.12_suratundangan.03_showundangan', [
        'title' => 'Surat Undangan ',
        'title_halaman' => 'Surat Undangan',
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

// public function validasipbgslf1(Request $request, $id)
//     {
//         $data = pbgslfbangunan::findOrFail($id);

//         $request->validate([
//             'validasiberkas1' => 'required|in:sudah,belum',
//         ]);

//         $data->validasiberkas1 = $request->validasiberkas1;
//         // $data->validasiberkas1 = $request->validasiberkas1;
//         $data->save();

//      if ($request->validasiberkas1 === 'sudah') {
//         session()->flash('create', '✅ Sudah Di Verifikasi !');
//     } else {
//         session()->flash('gagal', '❌ Belum Lengkap !');
//     }
//         //    return redirect('/beserahterima');

//            return redirect()->back();

//         // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
//     }


public function validasipbgslf1(Request $request, $id)
{
    $data = pbgslfbangunan::findOrFail($id);

    $request->validate([
        'validasiberkas1' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas1 = $request->validasiberkas1;
    $data->save();

    if ($request->validasiberkas1 === 'sudah') {
        session()->flash('create', '✅ Sudah Di Verifikasi!');
    } else {
        session()->flash('gagal', '❌ Belum Lengkap!');
    }

    return redirect()->back(); // kembali ke halaman semula
}


public function validasipbgslf2(Request $request, $id)
    {
        $data = pbgslfbangunan::findOrFail($id);

        $request->validate([
            'validasiberkas2' => 'required|in:sudah,belum',
        ]);

        $data->validasiberkas2 = $request->validasiberkas2;
        $data->save();

     if ($request->validasiberkas2 === 'sudah') {
        session()->flash('create', '✅ Sudah Di Verifikasi !');
    } else {
        session()->flash('gagal', '❌ Belum Lengkap !');
    }
        //    return redirect('/beserahterima');

           return redirect()->back();

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }

public function validasipbgslf3(Request $request, $id)
    {
        $data = pbgslfbangunan::findOrFail($id);

        $request->validate([
            'validasiberkas3' => 'required|in:sudah,belum',
        ]);

        $data->validasiberkas3 = $request->validasiberkas3;
        $data->save();

     if ($request->validasiberkas3 === 'sudah') {
        session()->flash('create', '✅ Sudah Di Verifikasi !');
    } else {
        session()->flash('gagal', '❌ Belum Lengkap !');
    }
        //    return redirect('/beserahterima');

           return redirect()->back();

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }

public function validasipbgslf4(Request $request, $id)
    {
        $data = pbgslfbangunan::findOrFail($id);

        $request->validate([
            'validasiberkas4' => 'required|in:sudah,belum',
        ]);

        $data->validasiberkas4 = $request->validasiberkas4;
        $data->save();

     if ($request->validasiberkas4 === 'sudah') {
        session()->flash('create', '✅ Sudah Di Verifikasi !');
    } else {
        session()->flash('gagal', '❌ Belum Lengkap !');
    }
        //    return redirect('/beserahterima');

           return redirect()->back();

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }

public function validasipbgslf5(Request $request, $id)
    {
        $data = pbgslfbangunan::findOrFail($id);

        $request->validate([
            'validasiberkas5' => 'required|in:sudah,belum',
        ]);

        $data->validasiberkas5 = $request->validasiberkas5;
        $data->save();

     if ($request->validasiberkas5 === 'sudah') {
        session()->flash('create', '✅ Sudah Di Verifikasi !');
    } else {
        session()->flash('gagal', '❌ Belum Lengkap !');
    }
        //    return redirect('/beserahterima');

           return redirect()->back();

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


public function validasipbgslf6(Request $request, $id)
    {
        $data = pbgslfbangunan::findOrFail($id);

        $request->validate([
            'validasiberkas6' => 'required|in:sudah,belum',
        ]);

        $data->validasiberkas6 = $request->validasiberkas6;
        $data->save();

     if ($request->validasiberkas6 === 'sudah') {
        session()->flash('create', '✅ Sudah Di Verifikasi !');
    } else {
        session()->flash('gagal', '❌ Belum Lengkap !');
    }
        //    return redirect('/beserahterima');

           return redirect()->back();

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }

public function validasipbgslf7(Request $request, $id)
    {
        $data = pbgslfbangunan::findOrFail($id);

        $request->validate([
            'validasiberkas7' => 'required|in:sudah,belum',
        ]);

        $data->validasiberkas7 = $request->validasiberkas7;
        $data->save();

     if ($request->validasiberkas7 === 'sudah') {
        session()->flash('create', '✅ Sudah Di Verifikasi !');
    } else {
        session()->flash('gagal', '❌ Belum Lengkap !');
    }
        //    return redirect('/beserahterima');

           return redirect()->back();

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }

public function betpatpt(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    $query = pengawasatpt::query();

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('namalengkap', 'like', "%{$search}%")
              ->orWhere('nosk', 'like', "%{$search}%")
              ->orWhere('status', 'like', "%{$search}%");
        });
    }

    $bujk = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.01_pbgslf.04_tpatpt.01_datatpatpt', [
        'title' => 'Daftar Pengawas TPA/TPT',
        'data'  => $bujk,
        'user'  => $user,
    ]);
}


public function betpatptdelete($id)
{
    // Cari item berdasarkan judul
    $entry = pengawasatpt::where('id', $id)->first();

    if ($entry) {
        // Jika ada file header yang terdaftar, hapus dari storage
        // if (Storage::disk('public')->exists($entry->header)) {
            //     Storage::disk('public')->delete($entry->header);
            // }

            // Hapus entri dari database
            $entry->delete();

            // Redirect atau memberi respons sesuai kebutuhan
            return redirect('/betpatpt')->with('delete', 'Data Berhasil Di Hapus !');

        }

        return redirect()->back()->with('error', 'Item not found');
    }

public function betpatptcreate()
{
    $user = Auth::user();
    // $dataakun = User::where('statusadmin_id', 4)->get();

    if (!$user) {
        return redirect()->route('login');
    }

    return view('backend.01_pbgslf.04_tpatpt.02_tambahdatatpatpt', [
        'title' => 'Tambahkan Petugas TPA/TPT',
        'user'  => $user,
        // 'dataakun'  => $dataakun
    ]);
}

public function betpatptcreatenew(Request $request)
{
    $user = Auth::user();

    $validated = $request->validate([
        // 'user_id' => 'required|string',
        'namalengkap' => 'required|string|max:255',
        'nosk' => 'required|string|max:255',
        'status' => 'required|string|max:255',
    ], [
        // 'user_id.required' => 'Akun wajib dipilih.',
        'namalengkap.required' => 'Nama Lengkap wajib diisi.',
        'nosk.required' => 'No SK wajib diisi.',
        'status.required' => 'Status Petugas wajib diisi.',
        // kamu bisa tambahkan pesan validasi lain jika perlu
    ]);

    $data = new pengawasatpt();

    // $data->user_id = $user->id ?? null;
    $data->namalengkap = $validated['namalengkap'];
    $data->nosk = $validated['nosk'] ?? null;
    $data->status = $validated['status'] ?? null;

    $data->save();

    session()->flash('create', 'Data berhasil disimpan.');

    return redirect()->route('betpatpt'); // Pastikan route ini benar
}

public function betempatkonsultasi(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    $query = tempatkonsultasi::query();

    if ($search) {
        $query->where('tempat', 'like', "%{$search}%");
    }

    $bujk = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.01_pbgslf.05_tempat.01_datatempatkonsultasi', [
        'title' => 'Daftar Tempat Konsultasi',
        'data'  => $bujk,
        'user'  => $user,
    ]);
}

public function betempatkonsultasidelete($id)
{
    // Cari item berdasarkan judul
    $entry = tempatkonsultasi::where('id', $id)->first();

    if ($entry) {
        // Jika ada file header yang terdaftar, hapus dari storage
        // if (Storage::disk('public')->exists($entry->header)) {
            //     Storage::disk('public')->delete($entry->header);
            // }

            // Hapus entri dari database
            $entry->delete();

            // Redirect atau memberi respons sesuai kebutuhan
            return redirect('/betempatkonsultasi')->with('delete', 'Data Berhasil Di Hapus !');

        }

        return redirect()->back()->with('error', 'Item not found');
    }

    public function betempatcreate()
{
    $user = Auth::user();
    // $dataakun = User::where('statusadmin_id', 4)->get();

    if (!$user) {
        return redirect()->route('login');
    }

    return view('backend.01_pbgslf.05_tempat.02_tambahtempat', [
        'title' => 'Tambahkan Tempat Konsultasi',
        'user'  => $user,
        // 'dataakun'  => $dataakun
    ]);
}


public function betempatcreatenew(Request $request)
{
    $user = Auth::user();

    $validated = $request->validate([
        // 'user_id' => 'required|string',
        'tempat' => 'required|string',
        // 'nosk' => 'required|string|max:255',
        // 'status' => 'required|string|max:255',
    ], [
        // 'user_id.required' => 'Akun wajib dipilih.',
        'tempat.required' => 'Tempat wajib diisi.',
        // 'nosk.required' => 'No SK wajib diisi.',
        // 'status.required' => 'Status Petugas wajib diisi.',
        // kamu bisa tambahkan pesan validasi lain jika perlu
    ]);

    $data = new tempatkonsultasi();

    // $data->user_id = $user->id ?? null;
    $data->tempat = $validated['tempat'];
    // $data->nosk = $validated['nosk'] ?? null;
    // $data->status = $validated['status'] ?? null;

    $data->save();

    session()->flash('create', 'Data berhasil disimpan.');

    return redirect()->route('betempatkonsultasi'); // Pastikan route ini benar
}



    public function bepbgslfkonsultasi(Request $request)
{
    $user = Auth::user();
    $perPage = $request->input('perPage', 10);

      $query = pbgslfbangunan::query();

      $data = $query->latest()->paginate($perPage)->appends($request->all());
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

    // -------------------------------------------------------------------------------
//     $jumlahsidangbulanan = pbgslfbangunan::selectRaw('MONTH(tanggalpermohonan) as bulan, COUNT(*) as jumlah')
//     ->groupBy('bulan')
//     ->orderBy('bulan')
//     ->pluck('jumlah', 'bulan')
//     ->toArray();

// // Konversi bulan angka ke nama bulan
// $bulanNama = [
//     1 => 'Januari', 2 => 'Februari', 3 => 'Maret', 4 => 'April',
//     5 => 'Mei', 6 => 'Juni', 7 => 'Juli', 8 => 'Agustus',
//     9 => 'September', 10 => 'Oktober', 11 => 'November', 12 => 'Desember',
// ];

// $jumlahsidangbulanan = array_map(function ($bulan) use ($jumlahsidangbulanan) {
//     return $jumlahsidangbulanan[$bulan] ?? 0;
// }, range(1, 12));

$tahunIni = Carbon::now()->year;


$data = pbgslfbangunan::with(['user', 'jenispengajuanpbgslfper']) // pastikan relasi dimuat
    ->where('validasiberkas5', 'sudah')
    ->whereYear('updated_at', $tahunIni)
    ->get(); // ✅ AMBIL OBJEK

$jumlahsidangbulananRaw = pbgslfbangunan::where('validasiberkas5', 'sudah')
    ->whereYear('updated_at', $tahunIni)
    ->selectRaw('MONTH(updated_at) as bulan, COUNT(*) as jumlah')
    ->groupBy('bulan')
    ->orderBy('bulan')
    ->pluck('jumlah', 'bulan')
    ->toArray();

$jumlahsidangbulanan = [];
for ($i = 1; $i <= 12; $i++) {
    $jumlahsidangbulanan[$i - 1] = $jumlahsidangbulananRaw[$i] ?? 0;
}

$bulanFilter = $request->input('bulan');

if ($bulanFilter) {
    $data = $data->filter(function ($item) use ($bulanFilter) {
        return optional($item->updated_at)->month == $bulanFilter;
    });
}

// ----------------------------------------------------------------------------

    return view('backend.01_pbgslf.06_konsultasi.01_konsultasi', [
        'title' => 'Konsultasi Teknis Permohonan PBG/SLF Bangunan Gedung',
        // 'data' => $dataTanpaIdSatu,
        'user' => $user,

        'jumlahDataIdSatu' => $jumlahDataIdSatu,
        'jumlahDataIdDua' => $jumlahDataIdDua,
        'jumlahDataIdTiga' => $jumlahDataIdTiga,
        'jumlahDataIdEmpat' => $jumlahDataIdEmpat,
        'jumlahDataIdLima' => $jumlahDataIdLima,

        'jumlahsidangbulanan' => $jumlahsidangbulanan,
        'bulanFilter' => $bulanFilter,
        'data' => $data,

        // 'datasemua' => $dataTanpaIdSatu,
    ]);
}

    public function bepbgslfskrd(Request $request)
{
    $user = Auth::user();
    $perPage = $request->input('perPage', 10);

     // Ambil keyword search dari request
    $search = $request->input('search');

    // Query data pbgslfbangunan
    $query = pbgslfbangunan::query();

    // Jika ada search, filter berdasarkan namapemohon
    if ($search) {
        $query->where('namapemohon', 'like', "%{$search}%");
    }

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

$tahunIni = Carbon::now()->year;


// $data = pbgslfbangunan::with(['user', 'jenispengajuanpbgslfper']) // pastikan relasi dimuat
//     ->where('validasiberkas5', 'sudah')
//     ->whereYear('updated_at', $tahunIni)
//   ->paginate($perPage);

$data = pbgslfbangunan::with(['user', 'jenispengajuanpbgslfper']) // pastikan relasi dimuat
    ->where('validasiberkas5', 'sudah')
    ->whereYear('updated_at', $tahunIni)
    ->latest('updated_at') // urutkan berdasarkan update terbaru
    ->paginate($perPage);

    // ->get(); // ✅ AMBIL OBJEK

$jumlahsidangbulananRaw = pbgslfbangunan::where('validasiberkas5', 'sudah')
    ->whereYear('updated_at', $tahunIni)
    ->selectRaw('MONTH(updated_at) as bulan, COUNT(*) as jumlah')
    ->groupBy('bulan')
    ->orderBy('bulan')
    ->pluck('jumlah', 'bulan')
    ->toArray();

$jumlahsidangbulanan = [];
for ($i = 1; $i <= 12; $i++) {
    $jumlahsidangbulanan[$i - 1] = $jumlahsidangbulananRaw[$i] ?? 0;
}

$bulanFilter = $request->input('bulan');

if ($bulanFilter) {
    $data = $data->filter(function ($item) use ($bulanFilter) {
        return optional($item->updated_at)->month == $bulanFilter;
    });
}

// ----------------------------------------------------------------------------

    return view('backend.01_pbgslf.07_skrd.01_skrd', [
        'title' => 'SKRD Permohonan PBG/SLF Bangunan Gedung',
        // 'data' => $dataTanpaIdSatu,
        'user' => $user,

        'jumlahDataIdSatu' => $jumlahDataIdSatu,
        'jumlahDataIdDua' => $jumlahDataIdDua,
        'jumlahDataIdTiga' => $jumlahDataIdTiga,
        'jumlahDataIdEmpat' => $jumlahDataIdEmpat,
        'jumlahDataIdLima' => $jumlahDataIdLima,

        'jumlahsidangbulanan' => $jumlahsidangbulanan,
        'bulanFilter' => $bulanFilter,
        'data' => $data,

        // 'datasemua' => $dataTanpaIdSatu,
    ]);
}


public function bepbgslfskrdcreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = pbgslfbangunan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.07_skrd.02_uploadskrd', [
        'title' => 'Upload Berkas SKRD PBG/SLF ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);

}

public function bepbgslfskrdcreatenew(Request $request, $id)
{
    // Validasi input
    $validated = $request->validate([
        'rupiah' => 'nullable|integer',
        'buktipembayaran' => 'nullable|file|mimes:pdf|max:10048',
        'berkasskrd' => 'nullable|file|mimes:pdf|max:10048',
    ], [
        'rupiah.required' => 'Masukan Nilai Rupiah Potensi Retribusi !',
        'buktipembayaran.mimes' => 'Bukti Pembayaran harus berupa file PDF.',
        'berkasskrd.mimes' => 'Berkas SKRD harus berupa file PDF.',
    ]);

    // Cari data lama berdasarkan $id
    $data = pbgslfbangunan::findOrFail($id);

    // Fungsi simpan file & hapus file lama jika ada file baru
    $simpanBerkasUpdate = function ($fieldName, $folderPath, $oldFilePath) use ($request) {
        if ($request->hasFile($fieldName)) {
            // Hapus file lama jika ada
            if ($oldFilePath && file_exists(public_path($oldFilePath))) {
                unlink(public_path($oldFilePath));
            }

            $file = $request->file($fieldName);
            $filename = time() . "_{$fieldName}." . $file->getClientOriginalExtension();

            $path = public_path($folderPath);
            if (!file_exists($path)) {
                mkdir($path, 0755, true);
            }

            $file->move($path, $filename);
            return $folderPath . '/' . $filename;
        }
        // Jika tidak upload baru, kembalikan path lama
        return $oldFilePath;
    };

    // Update field rupiah
    $data->rupiah = $validated['rupiah'];

    // Update buktipembayaran & berkasskrd dengan fungsi upload & hapus file lama
    $data->buktipembayaran = $simpanBerkasUpdate('buktipembayaran', '01_pbgslf/03_skrd/01_berkas', $data->buktipembayaran);
    $data->berkasskrd = $simpanBerkasUpdate('berkasskrd', '01_pbgslf/03_skrd/02_berkas', $data->berkasskrd);

    // Simpan perubahan ke database
    $data->save();

    session()->flash('update', 'Data SKRD dan Bukti Pembayaran berhasil diperbarui!');
    return redirect()->route('bepbgslfskrd');
}


    public function bepbgslfretribusi(Request $request)
{
    $user = Auth::user();
    $perPage = $request->input('perPage', 10);

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

$tahunIni = Carbon::now()->year;


// $data = pbgslfbangunan::with(['user', 'jenispengajuanpbgslfper']) // pastikan relasi dimuat
//     ->where('validasiberkas5', 'sudah')
//     ->whereYear('updated_at', $tahunIni)
//       ->paginate($perPage);

 $search = $request->search;

    // $data = pbgslfbangunan::with(['user', 'jenispengajuanpbgslfper'])
    //     ->where('validasiberkas5', 'sudah')
    //     ->whereYear('updated_at', $tahunIni)
    //     ->when($search, function ($query, $search) {
    //         $query->where('namapemohon', 'like', "%{$search}%");
    //     })
    //     ->paginate($perPage);

    $query = pbgslfbangunan::with(['user', 'jenispengajuanpbgslfper'])
    ->where('validasiberkas5', 'sudah')
    ->whereYear('updated_at', $tahunIni)
    ->when($search, function ($query, $search) {
        $query->where('namapemohon', 'like', "%{$search}%");
    });

$bulanFilter = $request->input('bulan');

if ($bulanFilter) {
    $query->whereMonth('updated_at', $bulanFilter);
}

$data = $query->paginate($perPage);
$data->appends($request->all());

    // ->get(); // ✅ AMBIL OBJEK

$jumlahsidangbulananRaw = pbgslfbangunan::where('validasiberkas5', 'sudah')
    ->whereYear('updated_at', $tahunIni)
    ->selectRaw('MONTH(updated_at) as bulan, COUNT(*) as jumlah')
    ->groupBy('bulan')
    ->orderBy('bulan')
    ->pluck('jumlah', 'bulan')
    ->toArray();

$jumlahsidangbulanan = [];
for ($i = 1; $i <= 12; $i++) {
    $jumlahsidangbulanan[$i - 1] = $jumlahsidangbulananRaw[$i] ?? 0;
}

$bulanFilter = $request->input('bulan');

if ($bulanFilter) {
    $data = $data->filter(function ($item) use ($bulanFilter) {
        return optional($item->updated_at)->month == $bulanFilter;
    });
}


// Hitung semua nominal retribusi
$nominalRetribusiTotal = pbgslfbangunan::whereNotNull('rupiah')->sum('rupiah');

// Hitung nominal yang sudah terbayar (validasiberkas8 == 'sudah')
$nominalSudahTerbayar = pbgslfbangunan::where('validasiberkas9', 'sudah')
    ->whereNotNull('rupiah')
    ->sum('rupiah');

// Hitung penerimaan = total - yang sudah terbayar
$nominalPenerimaan = $nominalSudahTerbayar;

// ----------------------------------------------------------------------------

    return view('backend.01_pbgslf.08_retribusi.01_retribusi', [
        'title' => 'Potensi Retribusi PBG/SLF Bangunan Gedung',
        // 'data' => $dataTanpaIdSatu,
        'user' => $user,

        'jumlahDataIdSatu' => $jumlahDataIdSatu,
        'jumlahDataIdDua' => $jumlahDataIdDua,
        'jumlahDataIdTiga' => $jumlahDataIdTiga,
        'jumlahDataIdEmpat' => $jumlahDataIdEmpat,
        'jumlahDataIdLima' => $jumlahDataIdLima,

        'jumlahsidangbulanan' => $jumlahsidangbulanan,
        'bulanFilter' => $bulanFilter,
        'data' => $data,

        'nominalRetribusiTotal' => $nominalRetribusiTotal,
'nominalSudahTerbayar' => $nominalSudahTerbayar,
'nominalPenerimaan' => $nominalPenerimaan,


        // 'datasemua' => $dataTanpaIdSatu,
    ]);
}



public function validasipbgslfbukti(Request $request, $id)
    {
        $data = pbgslfbangunan::findOrFail($id);

        $request->validate([
            'validasiberkas9' => 'required|in:sudah,belum',
        ]);

        $data->validasiberkas9 = $request->validasiberkas9;
        $data->save();

     if ($request->validasiberkas9 === 'sudah') {
        session()->flash('create', '✅ Sudah Bayar Retribusi !');
    } else {
        session()->flash('gagal', '❌ Belum Lengkap !');
    }
        //    return redirect('/beserahterima');

           return redirect()->back();

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


    public function bepbgslfindexslfper2(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 25);

    // Query awal: filter berdasarkan jenispengajuanbantek_id = 1
    $query = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
        $q->where('id', 2);
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
        'title' => 'Permohonan (SLF) Sertifikat Laik Fungsi ',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}

    public function bepbgslfindexslfper3(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 25);

    // Query awal: filter berdasarkan jenispengajuanbantek_id = 1
    $query = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
        $q->where('id', 3);
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
        'title' => 'Permohonan (SBKBG) Surat Bukti Kepemilikan Bangunan Gedung ',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}

    public function bepbgslfindexslfper4(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 25);

    // Query awal: filter berdasarkan jenispengajuanbantek_id = 1
    $query = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
        $q->where('id', 4);
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
        'title' => 'Permohonan (RTB) Rencana Teknis Pembongkaran ',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}

    public function bepbgslfindexslfper5(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 25);

    // Query awal: filter berdasarkan jenispengajuanbantek_id = 1
    $query = pbgslfbangunan::whereHas('jenispengajuanpbgslfper', function ($q) {
        $q->where('id', 5);
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
        'title' => 'Permohonan Pendataan Bangunan Gedung ',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}

public function bekecamatan(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    $query = kecamatanblora::query();

    if ($search) {
        $query->where('kecamatanblora', 'like', "%{$search}%");
    }

    $bujk = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.01_pbgslf.05_tempat.01_datatempatkonsultasi', [
        'title' => 'Daftar Kecamatan Kabupatan Blora',
        'data'  => $bujk,
        'user'  => $user,
    ]);
}


public function mbrgambarupdatenew(Request $request, $id)
{
    $data = mbrgambar::findOrFail($id);

    // Validasi input
    $request->validate([
        'judul1' => 'nullable|string|max:255',
        'judul2' => 'nullable|string|max:255',
        'berkas1' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'berkas2' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'berkas3' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'berkas4' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
    ]);

    // Simpan judul
    $data->judul1 = $request->judul1;
    $data->judul2 = $request->judul2;

    // Map berkas ke path tujuan
    $fileMap = [
        'berkas1' => '09_mbrgambar/01_file/01_berkas1',
        'berkas2' => '09_mbrgambar/01_file/02_berkas2',
        'berkas3' => '09_mbrgambar/01_file/03_berkas3',
        'berkas4' => '09_mbrgambar/01_file/04_berkas4',
    ];

    foreach ($fileMap as $field => $dir) {
        if ($request->hasFile($field)) {
            // Hapus file lama kalau ada
            if ($data->$field && file_exists(public_path($data->$field))) {
                @unlink(public_path($data->$field));
            }

            $file = $request->file($field);
            $filename = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
            $destination = public_path($dir);

            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }

            $file->move($destination, $filename);
            $data->$field = $dir . '/' . $filename;
        }
    }

    $data->save();

    session()->flash('update', 'Informasi berhasil diperbarui!');
    return redirect()->route('datambrblora');
}

public function updatedatapemilik($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = datapemilik::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.00_perbaikandata.01_updatedatapemilik', [
        'title' => 'Perbaikan Data Pemilik ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function updatedatapemiliknew(Request $request, $id)
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
        'namapemilik.required' => 'Nama pemilik wajib diisi.',
        'alamatpemilik.required' => 'Alamat pemilik wajib diisi.',
        'nomortelepon.required' => 'Nomor telepon wajib diisi.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'noidentitas.required' => 'No identitas wajib diisi.',
        'pilihancatatan.required' => 'Pilihan catatan wajib dipilih.',
        'pilihancatatan.in' => 'Pilihan catatan harus antara "lengkap" atau "tidak lengkap".',
    ]);

    // Cari data berdasarkan ID
    $pemilik = datapemilik::findOrFail($id);

    // Lakukan update
    $pemilik->update([
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'],
        'namapemilik' => $validated['namapemilik'],
        'alamatpemilik' => $validated['alamatpemilik'],
        'nomortelepon' => $validated['nomortelepon'],
        'email' => $validated['email'],
        'noidentitas' => $validated['noidentitas'],
        'pilihancatatan' => $validated['pilihancatatan'],
          'catatan' => null, // FORCE KOSONG
        // 'catatan' => $validated['catatan'] ?? null,
    ]);

// Kirim pesan sukses
session()->flash('update', 'Data pemilik berhasil diperbarui!');
return redirect()->back();

}



public function updatedatabangunan($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = databangunanpbg::find($id);

     $datapbgslf = jenispengajuanpbgslfper::all();
    $datajenisperkons = jenisperkonsultasi::all();
    $datafungsibgpbg = fungsibangunanpbg::all();

    $datakecamatan = kecamatanblora::all();
    $datakelurahandesa = kelurahandesa::all();

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.00_perbaikandata.02_updatedatabangunan', [
        'title' => 'Perbaikan Data Bangunan',
        'data' => $databantuanteknis,

        'datapbgslf' => $datapbgslf,
        'datajenisperkons' => $datajenisperkons,
        'datafungsibgpbg' => $datafungsibgpbg,
        'datakecamatan' => $datakecamatan,
        'datakelurahandesa' => $datakelurahandesa,
        'user' => Auth::user()
    ]);
}

public function updatedatabangunannew(Request $request, $id)
{
    // Validasi input
    $validated = $request->validate([
        'pbgslfbangunan_id' => 'nullable|string',
        'jenisperkonsultasi_id' => 'nullable|string',
        'namabangunan' => 'nullable|string|max:255',
        'lokasibangunan' => 'nullable|string|max:255',
        'klasifikasibangunan' => 'nullable|string',
        'fungsibangunanpbg_id' => 'nullable|string',
        'luasbangunan' => 'nullable|string',
        'jenispermohonan' => 'nullable|in:Lengkap,Tidak Lengkap',
        'fungsibangunan' => 'nullable|in:Lengkap,Tidak Lengkap',
        'tinggibangunan' => 'nullable|numeric|min:0',
        'jumlahlantai' => 'nullable|integer|min:1|max:10',
        'internsitasbangunan' => 'nullable|in:Ada,Tidak Ada',
        'nomorpkkpr' => 'nullable|string|max:255',
        'gsb' => 'nullable|string|max:100',
        'kdb' => 'nullable|string|max:100',
        'klb' => 'nullable|string|max:100',
        'kdh' => 'nullable|string|max:100',
        'provinsi' => 'nullable|string|max:100',
        'kabupaten' => 'nullable|string|max:100',
        'kecamatanblora_id' => 'nullable|exists:kecamatanbloras,id',
        'kelurahandesa_id' => 'nullable|exists:kelurahandesas,id',
        'alamatlengkap' => 'nullable|string|max:255',
        'koordinat' => 'nullable|string|max:100',
        'pilihancatatan' => 'nullable|in:lengkap,tidak lengkap',
        'catatan' => 'nullable|string|required_if:pilihancatatan,tidak lengkap',
        'cadangan1' => 'nullable|string|max:255',
    ]);

    // Cari dan update data
    $data = databangunanpbg::find($id);

    if (!$data) {
        return redirect()->back()->with('error', 'Data tidak ditemukan!');
    }

    $validated['catatan'] = null;

    $data->update($validated);

    return redirect()->back()->with('update', 'Data Bangunan berhasil diperbarui!');
}

public function updatedatatanah($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = datatanahpbg::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.00_perbaikandata.03_updatedatatanah', [
        'title' => 'Perbaikan Data Tanah ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function updatedatatanahnew(Request $request, $id)
{
    $validated = $request->validate([
        'pbgslfbangunan_id' => 'nullable|string',
        'isiandatatanah' => 'nullable|in:Lengkap,Tidak Lengkap',
        'layout' => 'nullable|in:Lengkap,Tidak Lengkap',
        'penyelidikan' => 'nullable|in:Lengkap,Tidak Lengkap',
        'pilihancatatan' => 'nullable|in:lengkap,tidak lengkap',
        'berkas4' => 'nullable|string',
        'catatan' => 'nullable|string',
        'catatanberkas1' => 'nullable|string|max:255',
        'catatanberkas2' => 'nullable|string|max:255',
        'catatanberkas3' => 'nullable|string|max:255',
        'catatanberkas4' => 'nullable|string|max:255',
    ], [
        // 'pbgslfbangunan_id.required' => 'ID Bangunan harus dipilih.',
        // 'pbgslfbangunan_id.exists' => 'Data bangunan tidak ditemukan.',
        // 'isiandatatanah.required' => 'Isi Data Tanah wajib dipilih.',
        // 'isiandatatanah.in' => 'Isi Data Tanah harus Lengkap atau Tidak Lengkap.',
        // 'layout.in' => 'Layout harus Lengkap atau Tidak Lengkap.',
        // 'penyelidikan.in' => 'Penyelidikan harus Lengkap atau Tidak Lengkap.',
        // 'pilihancatatan.in' => 'Pilihan Catatan harus lengkap atau tidak lengkap.',
    ]);

    $data = datatanahpbg::findOrFail($id);

    $data->update([
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'] ?? null,
        'isiandatatanah' => $validated['isiandatatanah'] ?? null,
        'layout' => $validated['layout'] ?? null,
        'penyelidikan' => $validated['penyelidikan'] ?? null,
        'berkas4' => $validated['berkas4'] ?? null,
        'pilihancatatan' => $validated['pilihancatatan'] ?? null,
        // 'catatan' => $validated['catatan'] ?? null,
         'catatan' => null, // FORCE KOSONG
        'catatanberkas1' => $validated['catatanberkas1'] ?? null,
        'catatanberkas2' => $validated['catatanberkas2'] ?? null,
        'catatanberkas3' => $validated['catatanberkas3'] ?? null,
        'catatanberkas4' => $validated['catatanberkas4'] ?? null,
    ]);
session()->flash('update', 'Data Tanah berhasil diperbarui!');
return redirect()->back();

}


public function updatedataumum($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = dataumumpbg::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.00_perbaikandata.04_updatedataumum', [
        'title' => 'Perbaikan Data Umum',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function updatedataumumnew(Request $request, $id)
{
    $validated = $request->validate([
        'pbgslfbangunan_id' => 'nullable|integer',
        'berkas1' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas2' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas3' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas4' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas5' => 'nullable|in:Lengkap,Tidak Lengkap',
        'pilihancatatan' => 'nullable|in:lengkap,tidak lengkap',
        'catatan' => 'nullable|string',
        'catatanberkas1' => 'nullable|string|max:255',
        'catatanberkas2' => 'nullable|string|max:255',
        'catatanberkas3' => 'nullable|string|max:255',
        'catatanberkas4' => 'nullable|string|max:255',
        'catatanberkas5' => 'nullable|string|max:255',

    ]);

    $data = dataumumpbg::findOrFail($id);

    $data->update([
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'] ?? null,
        'berkas1' => $validated['berkas1'] ?? null,
        'berkas2' => $validated['berkas2'] ?? null,
        'berkas3' => $validated['berkas3'] ?? null,
        'berkas4' => $validated['berkas4'] ?? null,
        'berkas5' => $validated['berkas5'] ?? null,
        'pilihancatatan' => $validated['pilihancatatan'] ?? null,
        // 'catatan' => $validated['catatan'] ?? null,
        'catatan' => null, // FORCE KOSONG
        'catatanberkas1' => $validated['catatanberkas1'] ?? null,
        'catatanberkas2' => $validated['catatanberkas2'] ?? null,
        'catatanberkas3' => $validated['catatanberkas3'] ?? null,
        'catatanberkas4' => $validated['catatanberkas4'] ?? null,
        'catatanberkas5' => $validated['catatanberkas5'] ?? null,
    ]);

    session()->flash('update', 'Data Umum berhasil diperbarui!');
    return redirect()->back();
}


public function updatedataarsitektur($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = dokumenteknisarsi::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.00_perbaikandata.05_updatedataarsitektur', [
        'title' => 'Perbaikan Data Dokumen Teknis Arsitektur',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function updatedataarsitekturnew(Request $request, $id)
{
    $validated = $request->validate([
        'pbgslfbangunan_id' => 'nullable|string',
        'berkas1' => 'nullable|string',
        'berkas2' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas3' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas4' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas5' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas6' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas7' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas8' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas9' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas10' => 'nullable|in:Lengkap,Tidak Lengkap',

        'catatanberkas1' => 'nullable|string|max:255',
        'catatanberkas2' => 'nullable|string|max:255',
        'catatanberkas3' => 'nullable|string|max:255',
        'catatanberkas4' => 'nullable|string|max:255',
        'catatanberkas5' => 'nullable|string|max:255',
        'catatanberkas6' => 'nullable|string|max:255',
        'catatanberkas7' => 'nullable|string|max:255',
        'catatanberkas8' => 'nullable|string|max:255',
        'catatanberkas9' => 'nullable|string|max:255',
        'catatanberkas10' => 'nullable|string|max:255',

        'pilihancatatan' => 'nullable|in:lengkap,tidak lengkap',
        'catatan' => 'nullable|string',
    ]);

    $data = dokumenteknisarsi::findOrFail($id);

    $data->update([
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'] ?? null,
        'berkas1' => $validated['berkas1'] ?? null,
        'berkas2' => $validated['berkas2'] ?? null,
        'berkas3' => $validated['berkas3'] ?? null,
        'berkas4' => $validated['berkas4'] ?? null,
        'berkas5' => $validated['berkas5'] ?? null,
        'berkas6' => $validated['berkas6'] ?? null,
        'berkas7' => $validated['berkas7'] ?? null,
        'berkas8' => $validated['berkas8'] ?? null,
        'berkas9' => $validated['berkas9'] ?? null,
        'berkas10' => $validated['berkas10'] ?? null,

        'catatanberkas1' => $validated['catatanberkas1'] ?? null,
        'catatanberkas2' => $validated['catatanberkas2'] ?? null,
        'catatanberkas3' => $validated['catatanberkas3'] ?? null,
        'catatanberkas4' => $validated['catatanberkas4'] ?? null,
        'catatanberkas5' => $validated['catatanberkas5'] ?? null,
        'catatanberkas6' => $validated['catatanberkas6'] ?? null,
        'catatanberkas7' => $validated['catatanberkas7'] ?? null,
        'catatanberkas8' => $validated['catatanberkas8'] ?? null,
        'catatanberkas9' => $validated['catatanberkas9'] ?? null,
        'catatanberkas10' => $validated['catatanberkas10'] ?? null,

        // 'berkas5' => $validated['berkas5'] ?? null,
        'pilihancatatan' => $validated['pilihancatatan'] ?? null,
        // 'catatan' => $validated['catatan'] ?? null,
            'catatan' => null, // FORCE KOSONG
    ]);

    session()->flash('update', 'Data Dokumen Teknis Arsitektur berhasil diperbarui!');
    return redirect()->back();
}


public function updatedatastruktur($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = dokumenteknisstruk::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.00_perbaikandata.06_updatedatastruktur', [
        'title' => 'Perbaikan Data Dokumen Teknis Struktur',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function updatedatastrukturnew(Request $request, $id)
{
    $validated = $request->validate([
        'pbgslfbangunan_id' => 'nullable|string',
        // 'berkas1' => 'nullable|string',
        'berkas1' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas2' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas3' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas4' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas5' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas6' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas7' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas8' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas9' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas10' => 'nullable|in:Lengkap,Tidak Lengkap',

        'catatanberkas1' => 'nullable|string|max:255',
        'catatanberkas2' => 'nullable|string|max:255',
        'catatanberkas3' => 'nullable|string|max:255',
        'catatanberkas4' => 'nullable|string|max:255',
        'catatanberkas5' => 'nullable|string|max:255',
        'catatanberkas6' => 'nullable|string|max:255',
        'catatanberkas7' => 'nullable|string|max:255',
        'catatanberkas8' => 'nullable|string|max:255',
        'catatanberkas9' => 'nullable|string|max:255',

        'pilihancatatan' => 'nullable|in:lengkap,tidak lengkap',
        'catatan' => 'nullable|string',
    ]);

    $data = dokumenteknisstruk::findOrFail($id);

    $data->update([
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'] ?? null,
        'berkas1' => $validated['berkas1'] ?? null,
        'berkas2' => $validated['berkas2'] ?? null,
        'berkas3' => $validated['berkas3'] ?? null,
        'berkas4' => $validated['berkas4'] ?? null,
        'berkas5' => $validated['berkas5'] ?? null,
        'berkas6' => $validated['berkas6'] ?? null,
        'berkas7' => $validated['berkas7'] ?? null,
        'berkas8' => $validated['berkas8'] ?? null,
        'berkas9' => $validated['berkas9'] ?? null,
        'berkas10' => $validated['berkas10'] ?? null,

        'catatanberkas1' => $validated['catatanberkas1'] ?? null,
        'catatanberkas2' => $validated['catatanberkas2'] ?? null,
        'catatanberkas3' => $validated['catatanberkas3'] ?? null,
        'catatanberkas4' => $validated['catatanberkas4'] ?? null,
        'catatanberkas5' => $validated['catatanberkas5'] ?? null,
        'catatanberkas6' => $validated['catatanberkas6'] ?? null,
        'catatanberkas7' => $validated['catatanberkas7'] ?? null,
        'catatanberkas8' => $validated['catatanberkas8'] ?? null,
        'catatanberkas9' => $validated['catatanberkas9'] ?? null,
        'catatanberkas10' => $validated['catatanberkas10'] ?? null,

        // 'berkas5' => $validated['berkas5'] ?? null,
        'pilihancatatan' => $validated['pilihancatatan'] ?? null,
        // 'catatan' => $validated['catatan'] ?? null,
         'catatan' => null, // FORCE KOSONG
    ]);

    session()->flash('update', 'Data Dokumen Teknis Struktur berhasil diperbarui!');
    return redirect()->back();
}

public function updatedatamep($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = dokumenteknismep::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.00_perbaikandata.07_updatedatamep', [
        'title' => 'Perbaikan Data Dokumen Teknis Mekanikal Elektrikal Plumbing',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function updatedatamepnew(Request $request, $id)
{
    $validated = $request->validate([
        'pbgslfbangunan_id' => 'nullable|string',
        // 'berkas1' => 'nullable|string',
        'berkas1' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas2' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas3' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas4' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas5' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas6' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas7' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas8' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas9' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas10' => 'nullable|in:Lengkap,Tidak Lengkap',

        'catatanberkas1' => 'nullable|string|max:255',
        'catatanberkas2' => 'nullable|string|max:255',
        'catatanberkas3' => 'nullable|string|max:255',
        'catatanberkas4' => 'nullable|string|max:255',
        'catatanberkas5' => 'nullable|string|max:255',
        'catatanberkas6' => 'nullable|string|max:255',
        'catatanberkas7' => 'nullable|string|max:255',
        'catatanberkas8' => 'nullable|string|max:255',
        'catatanberkas9' => 'nullable|string|max:255',
        'catatanberkas10' => 'nullable|string|max:255',

        'pilihancatatan' => 'nullable|in:lengkap,tidak lengkap',
        'catatan' => 'nullable|string',
    ]);

    $data = dokumenteknismep::findOrFail($id);

    $data->update([
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'] ?? null,
        'berkas1' => $validated['berkas1'] ?? null,
        'berkas2' => $validated['berkas2'] ?? null,
        'berkas3' => $validated['berkas3'] ?? null,
        'berkas4' => $validated['berkas4'] ?? null,
        'berkas5' => $validated['berkas5'] ?? null,
        'berkas6' => $validated['berkas6'] ?? null,
        'berkas7' => $validated['berkas7'] ?? null,
        'berkas8' => $validated['berkas8'] ?? null,
        'berkas9' => $validated['berkas9'] ?? null,
        'berkas10' => $validated['berkas10'] ?? null,

        'catatanberkas1' => $validated['catatanberkas1'] ?? null,
        'catatanberkas2' => $validated['catatanberkas2'] ?? null,
        'catatanberkas3' => $validated['catatanberkas3'] ?? null,
        'catatanberkas4' => $validated['catatanberkas4'] ?? null,
        'catatanberkas5' => $validated['catatanberkas5'] ?? null,
        'catatanberkas6' => $validated['catatanberkas6'] ?? null,
        'catatanberkas7' => $validated['catatanberkas7'] ?? null,
        'catatanberkas8' => $validated['catatanberkas8'] ?? null,
        'catatanberkas9' => $validated['catatanberkas9'] ?? null,
        'catatanberkas10' => $validated['catatanberkas10'] ?? null,
        // 'berkas5' => $validated['berkas5'] ?? null,
        'pilihancatatan' => $validated['pilihancatatan'] ?? null,
        // 'catatan' => $validated['catatan'] ?? null,
         'catatan' => null, // FORCE KOSONG
    ]);

    session()->flash('update', 'Data Dokumen Teknis MEP berhasil diperbarui!');
    return redirect()->back();
}

public function updatedataslf($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = dokumenteknisslfpbg::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.00_perbaikandata.08_updatedataslf', [
        'title' => 'Perbaikan Data Dokumen Teknis SLF',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function updatedataslfnew(Request $request, $id)
{
    $validated = $request->validate([
        'pbgslfbangunan_id' => 'nullable|string',
        // 'berkas1' => 'nullable|string',
        'berkas1' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas2' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas3' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas4' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas5' => 'nullable|in:Lengkap,Tidak Lengkap',
        'berkas6' => 'nullable|in:Lengkap,Tidak Lengkap',

        'catatanberkas1' => 'nullable|string|max:255',
        'catatanberkas2' => 'nullable|string|max:255',
        'catatanberkas3' => 'nullable|string|max:255',
        'catatanberkas4' => 'nullable|string|max:255',
        'catatanberkas5' => 'nullable|string|max:255',
        'catatanberkas6' => 'nullable|string|max:255',

        // 'berkas7' => 'nullable|in:Lengkap,Tidak Lengkap',
        // 'berkas8' => 'nullable|in:Lengkap,Tidak Lengkap',
        // 'berkas9' => 'nullable|in:Lengkap,Tidak Lengkap',
        // 'berkas10' => 'nullable|in:Lengkap,Tidak Lengkap',
        'pilihancatatan' => 'nullable|in:lengkap,tidak lengkap',
        'catatan' => 'nullable|string',
    ]);

    $data = dokumenteknisslfpbg::findOrFail($id);

    $data->update([
        'pbgslfbangunan_id' => $validated['pbgslfbangunan_id'] ?? null,
        'berkas1' => $validated['berkas1'] ?? null,
        'berkas2' => $validated['berkas2'] ?? null,
        'berkas3' => $validated['berkas3'] ?? null,
        'berkas4' => $validated['berkas4'] ?? null,
        'berkas5' => $validated['berkas5'] ?? null,
        'berkas6' => $validated['berkas6'] ?? null,

        'catatanberkas1' => $validated['catatanberkas1'] ?? null,
        'catatanberkas2' => $validated['catatanberkas2'] ?? null,
        'catatanberkas3' => $validated['catatanberkas3'] ?? null,
        'catatanberkas4' => $validated['catatanberkas4'] ?? null,
        'catatanberkas5' => $validated['catatanberkas5'] ?? null,
        'catatanberkas6' => $validated['catatanberkas6'] ?? null,

        // 'berkas7' => $validated['berkas7'] ?? null,
        // 'berkas8' => $validated['berkas8'] ?? null,
        // 'berkas9' => $validated['berkas9'] ?? null,
        // 'berkas10' => $validated['berkas10'] ?? null,
        // 'berkas5' => $validated['berkas5'] ?? null,
        'pilihancatatan' => $validated['pilihancatatan'] ?? null,
        // 'catatan' => $validated['catatan'] ?? null,
         'catatan' => null, // FORCE KOSONG
    ]);

    session()->flash('update', 'Data Dokumen Teknis SLF berhasil diperbarui!');
    return redirect()->back();
}



public function betracking(Request $request)
{
    $user = Auth::user();
    $perPage = $request->input('perPage', 20);
    $noreg = $request->input('noregissimbg');

    $data = null;

    if ($noreg) {
        $data = pbgslfbangunan::where('noregissimbg', $noreg)->first();
    }

    return view('backend.02_trakingberkas.01_pencarian', [
        'title' => 'Tracking Berkas Permohonan PBG SLF',
        'data'  => $data,
        'user'  => $user,
    ]);
}


    public function betrackingdatacari(Request $request)
    {
        $noreg = $request->query('noregissimbg');
        $data = null;

        if ($noreg) {
            // Cari data sesuai nomor registrasi SIMBG
            $data = pbgslfbangunan::where('noregissimbg', $noreg)->first();
        }

        return view('backend.02_trakingberkas.01_pencarian', compact('data'));
    }

    public function validasipbgslf8(Request $request, $id)
    {
        $data = pbgslfbangunan::findOrFail($id);

        $request->validate([
            'validasiberkas8' => 'required|in:sudah,belum',
        ]);

        $data->validasiberkas8 = $request->validasiberkas8;
        $data->save();

     if ($request->validasiberkas8 === 'sudah') {
        session()->flash('create', '✅ Sudah Di Verifikasi !');
    } else {
        session()->flash('gagal', '❌ Belum Lengkap !');
    }
        //    return redirect('/beserahterima');

           return redirect()->back();

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


    public function bepbgbeuploadberkas($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);

    // Ambil semua data surat pemberitahuan berdasarkan pbgslfbangunan_id tanpa pagination
    // $subdatapemilik = suratudanganpbg::where('pbgslfbangunan_id', $data->id)->get();

    // Kirim data ke view
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.13_beritaacara.03_uploadberkaslainnya', [
        'title' => 'Uploas Berkas',
        'title_halaman' => 'Upload Berkas',
        'user' => $user,
        'data' => $data,
        // 'subdatapemilik' => $subdatapemilik,
    ]);
}

public function bepbgbeuploadberkasnew($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = pbgslfbangunan::find($id);
    // $tempatkonsultasi = tempatkonsultasi::all();

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.13_beritaacara.04_berkasuploadpdf', [
        'title' => 'Upload Berkas Permohonan',
        'data' => $databantuanteknis,
        // 'tempatkonsultasi' => $tempatkonsultasi,
        'user' => Auth::user()
    ]);
}

public function bepbgbeuploadberkasnewberkas(Request $request, $id)
{
    $request->validate([
        'uploadberkaslainnya' => 'required|file|mimes:pdf,jpg,jpeg,png,doc,docx|max:20480', // Maks 20MB
    ]);

    $data = pbgslfbangunan::findOrFail($id);

    if ($request->hasFile('uploadberkaslainnya')) {
        $file = $request->file('uploadberkaslainnya');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = '01_pbgsslg/01_berkasbaru';
        $file->move(public_path($path), $filename);

        $data->uploadberkaslainnya = $path . '/' . $filename;
        $data->save();
    }

    return redirect()->back()->with('create', 'Upload Berkas Lainnya berhasil diperbarui.');
}

// app/Http/Controllers/LogDownloadController.php
public function history(Request $request)
{
 DB::table('download_logs')->insert([
        'item_id' => $request->id,
        'waktu_download' => now(),
        'ip_address' => $request->ip(),
        'user_id' => auth()->id(),
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return response()->json(['status' => 'ok']);
}


    public function bepbgslfinformasi(Request $request)
{
    $user = Auth::user();
    $data = infopbg1::all();
    // $perPage = $request->input('perPage', 20);


// -----------------------------------------

    return view('backend.01_pbgslf.00_informasi.01_fungsicampuran', [
        'title' => 'Informasi Permohonan PBG Fungsi Campuran',
        // 'data' => $dataTanpaIdSatu,
        'user' => $user,
        'data' => $data,

        // 'datasemua' => $dataTanpaIdSatu,
    ]);

}



public function updatefungsicampuran($id)
{
    // Ambil user login
    $user = Auth::user();

    // Ambil data hibah berdasarkan ID
    $data = infopbg1::findOrFail($id);

    // Kirim ke view
    return view('backend.01_pbgslf.00_informasi.02_updatecampuran', [
        'title' => 'Perubahan Informasi PBG Fungsi Campuran',
        'user' => $user,
        'data' => $data
    ]);
}

public function updatefungsicampurannew(Request $request, $id)
{
    $data = infopbg1::findOrFail($id);

    // Validasi input
    $request->validate([
        'judul'      => 'nullable|string|max:255',
        'berkas'     => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:15048',
        'keterangan' => 'nullable|string',
        'infolanjut' => 'nullable|string',

        'cadangan1'  => 'nullable|string',
        'cadangan2'  => 'nullable|string',
        'cadangan3'  => 'nullable|string',
        'cadangan4'  => 'nullable|string',
        'cadangan5'  => 'nullable|string',
        'cadangan6'  => 'nullable|string',
        'cadangan7'  => 'nullable|string',
    ]);

    // Simpan data teks
    $data->judul      = $request->judul;
    $data->keterangan = $request->keterangan;
    $data->infolanjut = $request->infolanjut;

    // Simpan cadangan1–7
    for ($i = 1; $i <= 7; $i++) {
        $field = "cadangan{$i}";
        $data->$field = $request->$field;
    }

    // Handle file upload
    if ($request->hasFile('berkas')) {
        // Hapus file lama jika ada
        if ($data->berkas && file_exists(public_path($data->berkas))) {
            @unlink(public_path($data->berkas));
        }

        $file = $request->file('berkas');
        $filename = time() . '_berkas.' . $file->getClientOriginalExtension();
        $destination = public_path('00_berkasinformasi/01_brosur');

        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        $file->move($destination, $filename);
        $data->berkas = '00_berkasinformasi/01_brosur/' . $filename;
    }

    $data->save();

    session()->flash('update', 'Informasi berhasil diperbarui!');
    return back();
}

    public function bepbghunian(Request $request)
{
    $user = Auth::user();
    $data = infopbg2::all();
    // $perPage = $request->input('perPage', 20);


// -----------------------------------------

    return view('backend.01_pbgslf.00_informasi.03_befungsihunian', [
        'title' => 'Informasi Permohonan PBG Fungsi Hunian',
        // 'data' => $dataTanpaIdSatu,
        'user' => $user,
        'data' => $data,

        // 'datasemua' => $dataTanpaIdSatu,
    ]);

}


public function bepbghunianupdate($id)
{
    // Ambil user login
    $user = Auth::user();

    // Ambil data hibah berdasarkan ID
    $data = infopbg2::findOrFail($id);

    // Kirim ke view
    return view('backend.01_pbgslf.00_informasi.04_updatehunian', [
        'title' => 'Perubahan Informasi PBG Fungsi Hunian',
        'user' => $user,
        'data' => $data
    ]);
}

public function bepbghunianupdatenew(Request $request, $id)
{
    $data = infopbg2::findOrFail($id);

    // Validasi input
    $request->validate([
        'judul'      => 'nullable|string|max:255',
        'berkas'     => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'keterangan' => 'nullable|string',
        'infolanjut' => 'nullable|string',

        'cadangan1'  => 'nullable|string',
        'cadangan2'  => 'nullable|string',
        'cadangan3'  => 'nullable|string',
        'cadangan4'  => 'nullable|string',
        'cadangan5'  => 'nullable|string',
        'cadangan6'  => 'nullable|string',
        'cadangan7'  => 'nullable|string',
    ]);

    // Simpan data teks
    $data->judul      = $request->judul;
    $data->keterangan = $request->keterangan;
    $data->infolanjut = $request->infolanjut;

    // Simpan cadangan1–7
    for ($i = 1; $i <= 7; $i++) {
        $field = "cadangan{$i}";
        $data->$field = $request->$field;
    }

    // Handle file upload
    if ($request->hasFile('berkas')) {
        // Hapus file lama jika ada
        if ($data->berkas && file_exists(public_path($data->berkas))) {
            @unlink(public_path($data->berkas));
        }

        $file = $request->file('berkas');
        $filename = time() . '_berkas.' . $file->getClientOriginalExtension();
        $destination = public_path('00_berkasinformasi/01_brosur');

        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        $file->move($destination, $filename);
        $data->berkas = '00_berkasinformasi/01_brosur/' . $filename;
    }

    $data->save();

    session()->flash('update', 'Informasi berhasil diperbarui!');
    return back();
}


   public function bepbgkeagamaan(Request $request)
{
    $user = Auth::user();
    $data = infopbg3::all();
    // $perPage = $request->input('perPage', 20);


// -----------------------------------------

    return view('backend.01_pbgslf.00_informasi.05_befungsiagama', [
        'title' => 'Informasi Permohonan PBG Fungsi Keagamaan',
        // 'data' => $dataTanpaIdSatu,
        'user' => $user,
        'data' => $data,

        // 'datasemua' => $dataTanpaIdSatu,
    ]);

}

public function bepbgkeagamaanupdate($id)
{
    // Ambil user login
    $user = Auth::user();

    // Ambil data hibah berdasarkan ID
    $data = infopbg3::findOrFail($id);

    // Kirim ke view
    return view('backend.01_pbgslf.00_informasi.06_updateagama', [
        'title' => 'Perubahan Informasi PBG Fungsi Kegaamaan',
        'user' => $user,
        'data' => $data
    ]);
}


public function bepbgkeagamaanupdatenew(Request $request, $id)
{
    $data = infopbg3::findOrFail($id);

    // Validasi input
    $request->validate([
        'judul'      => 'nullable|string|max:255',
        'berkas'     => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'keterangan' => 'nullable|string',
        'infolanjut' => 'nullable|string',

        'cadangan1'  => 'nullable|string',
        'cadangan2'  => 'nullable|string',
        'cadangan3'  => 'nullable|string',
        'cadangan4'  => 'nullable|string',
        'cadangan5'  => 'nullable|string',
        'cadangan6'  => 'nullable|string',
        'cadangan7'  => 'nullable|string',
    ]);

    // Simpan data teks
    $data->judul      = $request->judul;
    $data->keterangan = $request->keterangan;
    $data->infolanjut = $request->infolanjut;

    // Simpan cadangan1–7
    for ($i = 1; $i <= 7; $i++) {
        $field = "cadangan{$i}";
        $data->$field = $request->$field;
    }

    // Handle file upload
    if ($request->hasFile('berkas')) {
        // Hapus file lama jika ada
        if ($data->berkas && file_exists(public_path($data->berkas))) {
            @unlink(public_path($data->berkas));
        }

        $file = $request->file('berkas');
        $filename = time() . '_berkas.' . $file->getClientOriginalExtension();
        $destination = public_path('00_berkasinformasi/01_brosur');

        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        $file->move($destination, $filename);
        $data->berkas = '00_berkasinformasi/01_brosur/' . $filename;
    }

    $data->save();

    session()->flash('update', 'Informasi berhasil diperbarui!');
    return back();
}


   public function bepbgprasarana(Request $request)
{
    $user = Auth::user();
    $data = infopbg4::all();
    // $perPage = $request->input('perPage', 20);


// -----------------------------------------

    return view('backend.01_pbgslf.00_informasi.07_befungsiprasarana', [
        'title' => 'Informasi Permohonan PBG Fungsi Prasarana',
        // 'data' => $dataTanpaIdSatu,
        'user' => $user,
        'data' => $data,

        // 'datasemua' => $dataTanpaIdSatu,
    ]);

}

public function bepbgprasaranaupdate($id)
{
    // Ambil user login
    $user = Auth::user();

    // Ambil data hibah berdasarkan ID
    $data = infopbg4::findOrFail($id);

    // Kirim ke view
    return view('backend.01_pbgslf.00_informasi.08_updateprasarana', [
        'title' => 'Perubahan Informasi PBG Fungsi Prasarana',
        'user' => $user,
        'data' => $data
    ]);
}

public function bepbgprasaranaupdatenew(Request $request, $id)
{
    $data = infopbg4::findOrFail($id);

    // Validasi input
    $request->validate([
        'judul' => 'nullable|string|max:255',
        'berkas' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'keterangan' => 'nullable|string',
        'infolanjut' => 'nullable|string',
    ]);

    // Simpan data teks
    $data->judul = $request->judul;
    $data->keterangan = $request->keterangan;
    $data->infolanjut = $request->infolanjut;

    // Handle file upload
    if ($request->hasFile('berkas')) {
        // Hapus file lama jika ada
        if ($data->berkas && file_exists(public_path($data->berkas))) {
            @unlink(public_path($data->berkas));
        }

        $file = $request->file('berkas');
        $filename = time() . '_berkas.' . $file->getClientOriginalExtension();
        $destination = public_path('00_berkasinformasi/01_brosur');

        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        $file->move($destination, $filename);
        $data->berkas = '00_berkasinformasi/01_brosur/' . $filename;
    }

    $data->save();
session()->flash('update', 'Informasi berhasil diperbarui!');
return back();

}


   public function bepbgsosialbudaya(Request $request)
{
    $user = Auth::user();
    $data = infopbg5::all();
    // $perPage = $request->input('perPage', 20);


// -----------------------------------------

    return view('backend.01_pbgslf.00_informasi.09_befungsisosialbudaya', [
        'title' => 'Informasi Permohonan PBG Fungsi Sosial Budaya',
        // 'data' => $dataTanpaIdSatu,
        'user' => $user,
        'data' => $data,

        // 'datasemua' => $dataTanpaIdSatu,
    ]);

}


public function bepbgsosialbudayaupdate($id)
{
    // Ambil user login
    $user = Auth::user();

    // Ambil data hibah berdasarkan ID
    $data = infopbg5::findOrFail($id);

    // Kirim ke view
    return view('backend.01_pbgslf.00_informasi.10_updatesosialbudaya', [
        'title' => 'Perubahan Informasi PBG Fungsi Sosial Budaya',
        'user' => $user,
        'data' => $data
    ]);
}

public function bepbgsosialbudayaupdatenew(Request $request, $id)
{
    $data = infopbg5::findOrFail($id);

    // Validasi input
    $request->validate([
        'judul' => 'nullable|string|max:255',
        'berkas' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'keterangan' => 'nullable|string',
        'infolanjut' => 'nullable|string',
    ]);

    // Simpan data teks
    $data->judul = $request->judul;
    $data->keterangan = $request->keterangan;
    $data->infolanjut = $request->infolanjut;

    // Handle file upload
    if ($request->hasFile('berkas')) {
        // Hapus file lama jika ada
        if ($data->berkas && file_exists(public_path($data->berkas))) {
            @unlink(public_path($data->berkas));
        }

        $file = $request->file('berkas');
        $filename = time() . '_berkas.' . $file->getClientOriginalExtension();
        $destination = public_path('00_berkasinformasi/01_brosur');

        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        $file->move($destination, $filename);
        $data->berkas = '00_berkasinformasi/01_brosur/' . $filename;
    }

    $data->save();
session()->flash('update', 'Informasi berhasil diperbarui!');
return back();

}


   public function beslffungsiusaha(Request $request)
{
    $user = Auth::user();
    $data = infopbg6::all();
    // $perPage = $request->input('perPage', 20);


// -----------------------------------------

    return view('backend.01_pbgslf.00_informasi.11_befungsiusaha', [
        'title' => 'Informasi Permohonan PBG Fungsi Usaha',
        // 'data' => $dataTanpaIdSatu,
        'user' => $user,
        'data' => $data,

        // 'datasemua' => $dataTanpaIdSatu,
    ]);

}


public function beslffungsiusahaupdate($id)
{
    // Ambil user login
    $user = Auth::user();

    // Ambil data hibah berdasarkan ID
    $data = infopbg6::findOrFail($id);

    // Kirim ke view
    return view('backend.01_pbgslf.00_informasi.12_updateusaha', [
        'title' => 'Perubahan Informasi PBG Fungsi Sosial Budaya',
        'user' => $user,
        'data' => $data
    ]);
}

public function beslffungsiusahaupdatenew(Request $request, $id)
{
    $data = infopbg6::findOrFail($id);

    // Validasi input
    $request->validate([
        'judul'      => 'nullable|string|max:255',
        'berkas'     => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'keterangan' => 'nullable|string',
        'infolanjut' => 'nullable|string',

        'cadangan1'  => 'nullable|string',
        'cadangan2'  => 'nullable|string',
        'cadangan3'  => 'nullable|string',
        'cadangan4'  => 'nullable|string',
        'cadangan5'  => 'nullable|string',
        'cadangan6'  => 'nullable|string',
        'cadangan7'  => 'nullable|string',
    ]);

    // Simpan data teks
    $data->judul      = $request->judul;
    $data->keterangan = $request->keterangan;
    $data->infolanjut = $request->infolanjut;

    // Simpan cadangan1–7
    for ($i = 1; $i <= 7; $i++) {
        $field = "cadangan{$i}";
        $data->$field = $request->$field;
    }

    // Handle file upload
    if ($request->hasFile('berkas')) {
        // Hapus file lama jika ada
        if ($data->berkas && file_exists(public_path($data->berkas))) {
            @unlink(public_path($data->berkas));
        }

        $file = $request->file('berkas');
        $filename = time() . '_berkas.' . $file->getClientOriginalExtension();
        $destination = public_path('00_berkasinformasi/01_brosur');

        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        $file->move($destination, $filename);
        $data->berkas = '00_berkasinformasi/01_brosur/' . $filename;
    }

    $data->save();

    session()->flash('update', 'Informasi berhasil diperbarui!');
    return back();
}

   public function bgslffungsiusahanew(Request $request)
{
    $user = Auth::user();
    $data = infopbg7::all();
    // $perPage = $request->input('perPage', 20);


// -----------------------------------------

    return view('backend.01_pbgslf.00_informasi.13_beslffungsiusaha', [
        'title' => 'Informasi Permohonan SLF Fungsi Usaha',
        // 'data' => $dataTanpaIdSatu,
        'user' => $user,
        'data' => $data,

        // 'datasemua' => $dataTanpaIdSatu,
    ]);

}


public function bgslffungsiusahanewupdate($id)
{
    // Ambil user login
    $user = Auth::user();

    // Ambil data hibah berdasarkan ID
    $data = infopbg7::findOrFail($id);

    // Kirim ke view
    return view('backend.01_pbgslf.00_informasi.14_updateslfusaha', [
        'title' => 'Perubahan Informasi SLF Fungsi Usaha',
        'user' => $user,
        'data' => $data
    ]);
}

public function bgslffungsiusahanewupdatenew(Request $request, $id)
{
    $data = infopbg7::findOrFail($id);

    // Validasi input
    $request->validate([
        'judul'      => 'nullable|string|max:255',
        'berkas'     => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'keterangan' => 'nullable|string',
        'infolanjut' => 'nullable|string',

        'cadangan1'  => 'nullable|string',
        'cadangan2'  => 'nullable|string',
        'cadangan3'  => 'nullable|string',
        'cadangan4'  => 'nullable|string',
        'cadangan5'  => 'nullable|string',
        'cadangan6'  => 'nullable|string',
        'cadangan7'  => 'nullable|string',
    ]);

    // Simpan data teks
    $data->judul      = $request->judul;
    $data->keterangan = $request->keterangan;
    $data->infolanjut = $request->infolanjut;

    // Simpan cadangan1–7
    for ($i = 1; $i <= 7; $i++) {
        $field = "cadangan{$i}";
        $data->$field = $request->$field;
    }

    // Handle file upload
    if ($request->hasFile('berkas')) {
        // Hapus file lama jika ada
        if ($data->berkas && file_exists(public_path($data->berkas))) {
            @unlink(public_path($data->berkas));
        }

        $file = $request->file('berkas');
        $filename = time() . '_berkas.' . $file->getClientOriginalExtension();
        $destination = public_path('00_berkasinformasi/01_brosur');

        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        $file->move($destination, $filename);
        $data->berkas = '00_berkasinformasi/01_brosur/' . $filename;
    }

    $data->save();

    session()->flash('update', 'Informasi berhasil diperbarui!');
    return back();
}

   public function bgslfmenaratelkom(Request $request)
{
    $user = Auth::user();
    $data = infopbg8::all();
    // $perPage = $request->input('perPage', 20);


// -----------------------------------------

    return view('backend.01_pbgslf.00_informasi.15_beslfmenaratelkom', [
        'title' => 'Informasi Permohonan SLF Menara Telekomunikasi',
        // 'data' => $dataTanpaIdSatu,
        'user' => $user,
        'data' => $data,

        // 'datasemua' => $dataTanpaIdSatu,
    ]);

}

public function bgslfmenaratelkomupdate($id)
{
    // Ambil user login
    $user = Auth::user();

    // Ambil data hibah berdasarkan ID
    $data = infopbg8::findOrFail($id);

    // Kirim ke view
    return view('backend.01_pbgslf.00_informasi.16_updatemenara', [
        'title' => 'Perubahan Informasi SLF Menara Telekomunikasi',
        'user' => $user,
        'data' => $data
    ]);
}

public function bgslfmenaratelkomupdatenew(Request $request, $id)
{
    $data = infopbg8::findOrFail($id);

    // Validasi input
    $request->validate([
        'judul'      => 'nullable|string|max:255',
        'berkas'     => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'keterangan' => 'nullable|string',
        'infolanjut' => 'nullable|string',

        'cadangan1'  => 'nullable|string',
        'cadangan2'  => 'nullable|string',
        'cadangan3'  => 'nullable|string',
        'cadangan4'  => 'nullable|string',
        'cadangan5'  => 'nullable|string',
        'cadangan6'  => 'nullable|string',
        'cadangan7'  => 'nullable|string',
    ]);

    // Simpan data teks
    $data->judul      = $request->judul;
    $data->keterangan = $request->keterangan;
    $data->infolanjut = $request->infolanjut;

    // Simpan cadangan1–7
    for ($i = 1; $i <= 7; $i++) {
        $field = "cadangan{$i}";
        $data->$field = $request->$field;
    }

    // Handle file upload
    if ($request->hasFile('berkas')) {
        // Hapus file lama jika ada
        if ($data->berkas && file_exists(public_path($data->berkas))) {
            @unlink(public_path($data->berkas));
        }

        $file = $request->file('berkas');
        $filename = time() . '_berkas.' . $file->getClientOriginalExtension();
        $destination = public_path('00_berkasinformasi/01_brosur');

        if (!file_exists($destination)) {
            mkdir($destination, 0777, true);
        }

        $file->move($destination, $filename);
        $data->berkas = '00_berkasinformasi/01_brosur/' . $filename;
    }

    $data->save();

    session()->flash('update', 'Informasi berhasil diperbarui!');
    return back();
}

    public function betrackingdatacarife(Request $request)
    {
        $noreg = $request->query('noregissimbg');
        $data = null;

        if ($noreg) {
            // Cari data sesuai nomor registrasi SIMBG
            $data = pbgslfbangunan::where('noregissimbg', $noreg)->first();
        }

return view('frontend.android.02_traking.01_halamantracking', [
    'data' => $data,
    'title' => 'Form Tracking Pencarian PBG/SLF'
]);

    }

       public function betrackingdatacariweb(Request $request)
    {
        $noreg = $request->query('noregissimbg');
        $data = null;

        if ($noreg) {
            // Cari data sesuai nomor registrasi SIMBG
            $data = pbgslfbangunan::where('noregissimbg', $noreg)->first();
        }

return view('frontend.abgblora.02_trakingweb.01_infotraking', [
    'data' => $data,
    'title' => 'Form Tracking Pencarian PBG/SLF'
]);

    }



public function bepbgsuratundangantpatpt($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);

    // Ambil semua data surat pemberitahuan berdasarkan pbgslfbangunan_id tanpa pagination
    $subdatapemilik = suratudanganpbg::where('pbgslfbangunan_id', $data->id)->get();

    // Kirim data ke view
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.12_suratundangan.04_datasuratundangantptatpt', [
        'title' => 'Surat Undangan TPA/TPT',
        'title_halaman' => 'Surat Undangan TPA/TPT',
        'user' => $user,
        'data' => $data,
        'subdatapemilik' => $subdatapemilik,
    ]);
}

public function bepbgsuratundangantpatptshow(Request $request, $id)
{
    // Ambil user login
    $user = Auth::user();
    // Cari data pbg berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);
    $surat = suratudanganpbg::findOrFail($id);

    // $subdatapemilik = tpatpt::where('pbgslfbangunan_id', $data->id)->paginate(15);

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
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.12_suratundangan.05_showundangantpa', [
        'title' => 'Surat Undangan TPA/TPT',
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


public function bepbgberitaacaraonline($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = pbgslfbangunan::findOrFail($id);

    // Ambil semua data surat pemberitahuan berdasarkan pbgslfbangunan_id tanpa pagination
    $subdatapemilik = suratudanganpbg::where('pbgslfbangunan_id', $data->id)->get();

    // Kirim data ke view
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.13_beritaacara.01_beritaacaraonline', [
        'title' => 'Berita Acara Konsultasi Online',
        'title_halaman' => 'Berita Acara Konsultasi',
        'user' => $user,
        'data' => $data,
        'subdatapemilik' => $subdatapemilik,
    ]);
}



public function bepbgberitaacaraonlineshow(Request $request, $id)
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
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.13_beritaacara.02_beritaacarashowonline', [
        'title' => 'Berita Acara Online',
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



public function updatedatatpatpt($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = tpatpt::find($id);
        $pengawasList = pengawasatpt::all();

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.01_pbgslf.01_permohonanpbgslf.00_datainduk.11_tpatpt.03_updatetpatpt', [
        'title' => 'Perbaikan Data Penugasan TPA TPT',
        'data' => $databantuanteknis,
        'pengawasList' => $pengawasList,

        'user' => Auth::user()
    ]);
}

public function bepbgtpatptupdatenew(Request $request)
{
    $validated = $request->validate([
        'id' => 'required|string',
        'pbgslfbangunan_id' => 'required|string',
        'timpenilai' => 'nullable|string',
        'nosk' => 'nullable|string',
        'pengawas1_id' => 'nullable|string',
        'pengawas2_id' => 'nullable|string',
        'pengawas3_id' => 'nullable|string',
        'pengawas4_id' => 'nullable|string',
        'pengawas5_id' => 'nullable|string',
        'pengawas6_id' => 'nullable|string',
        'pengawas7_id' => 'nullable|string',
        'pengawas8_id' => 'nullable|string',
        'pengawas9_id' => 'nullable|string',
        'pengawas10_id' => 'nullable|string',
        'pengawas11_id' => 'nullable|string',
        'pengawas12_id' => 'nullable|string',
    ], [
        'pbgslfbangunan_id.required' => 'ID Bangunan wajib diisi.',
        'pbgslfbangunan_id.exists' => 'ID Bangunan tidak ditemukan.',

        'timpenilai.required' => 'Tim Penilai wajib dipilih.',
        'nosk.required' => 'Nomor SK wajib diisi.',
        'nosk.max' => 'Nomor SK maksimal 255 karakter.',

        'pengawas1_id.required' => 'Wajib dipilih.',
    ]);

    // cari data berdasarkan id
    $tpatpt = tpatpt::findOrFail($validated['id']);

    // update data
    $tpatpt->update([
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
        'pengawas8_id' => $validated['pengawas8_id'] ?? null,
        'pengawas9_id' => $validated['pengawas9_id'] ?? null,
        'pengawas10_id' => $validated['pengawas10_id'] ?? null,
        'pengawas11_id' => $validated['pengawas11_id'] ?? null,
        'pengawas12_id' => $validated['pengawas12_id'] ?? null,
    ]);

    session()->flash('update', 'Perbaikan Penugasan TPA/TPT berhasil diperbarui.');
    return redirect()->route('bepbgtpatpt', ['id' => $validated['pbgslfbangunan_id']]);
}


public function befungsibangunan(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    $query = fungsibangunanpbg::query();

    if ($search) {
        $query->where('fungsi', 'like', "%{$search}%");
    }

    $bujk = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.01_pbgslf.09_fungsibangunan.01_fungsibangunan', [
        'title' => 'Data Fungsi Bangunan Gedung',
        'data'  => $bujk,
        'user'  => $user,
    ]);
}


public function befungsibangunandelete($id)
{
    // Cari item berdasarkan judul
    $entry = fungsibangunanpbg::where('id', $id)->first();

    if ($entry) {
        // Jika ada file header yang terdaftar, hapus dari storage
        // if (Storage::disk('public')->exists($entry->header)) {
            //     Storage::disk('public')->delete($entry->header);
            // }

            // Hapus entri dari database
            $entry->delete();

            // Redirect atau memberi respons sesuai kebutuhan
            return redirect('/befungsibangunan')->with('delete', 'Data Berhasil Di Hapus !');

        }

        return redirect()->back()->with('error', 'Item not found');
    }


    public function befungsibangunancreate()
{
    $user = Auth::user();
    // $dataakun = User::where('statusadmin_id', 4)->get();

    if (!$user) {
        return redirect()->route('login');
    }

    return view('backend.01_pbgslf.09_fungsibangunan.02_tambahfungsi', [
        'title' => 'Tambahkan Fungsi Bangunan Gedung ',
        'user'  => $user,
        // 'dataakun'  => $dataakun
    ]);
}



public function befungsibangunancreatenew(Request $request)
{
    $user = Auth::user();

    $validated = $request->validate([
        // 'user_id' => 'required|string',
        'fungsi' => 'required|string',
        // 'nosk' => 'required|string|max:255',
        // 'status' => 'required|string|max:255',
    ], [
        // 'user_id.required' => 'Akun wajib dipilih.',
        'fungsi.required' => 'Fungsi Bangunan wajib diisi.',
        // 'nosk.required' => 'No SK wajib diisi.',
        // 'status.required' => 'Status Petugas wajib diisi.',
        // kamu bisa tambahkan pesan validasi lain jika perlu
    ]);

    $data = new fungsibangunanpbg();

    // $data->user_id = $user->id ?? null;
    $data->fungsi = $validated['fungsi'];
    // $data->nosk = $validated['nosk'] ?? null;
    // $data->status = $validated['status'] ?? null;

    $data->save();

    session()->flash('create', 'Data berhasil disimpan.');

    return redirect()->route('befungsibangunan'); // Pastikan route ini benar
}
}
