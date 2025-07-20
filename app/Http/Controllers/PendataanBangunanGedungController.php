<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\bgkartuinventarisbangunan;
use App\Models\databangunangedung;
use App\Models\databgkepemilikan;
use App\Models\databgklasifikasi;
use App\Models\databgpeprofilbangunangedung;
use App\Models\databgstatus;
use App\Models\databgstrukturbangunan;
use App\Models\databgtanah;
use App\Models\kepemilikanbangunangedung;
use App\Models\pbgslfbangunan;
use Illuminate\Support\Facades\Auth;

class PendataanBangunanGedungController extends Controller
{

    public function datakicbangunan(Request $request)
    {
        $perPage = $request->input('perPage', 15);
        $search = $request->input('search');

        $query = bgkartuinventarisbangunan::query()->orderBy('created_at', 'desc');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('namabangunandinas', 'LIKE', "%{$search}%")
                  ->orWhere('namabangunan', 'LIKE', "%{$search}%")
                  ->orWhere('kodebarang', 'LIKE', "%{$search}%")
                  ->orWhere('asalusul', 'LIKE', "%{$search}%")

                  ->orWhereHas('kedinasan', function($k) use ($search) {
                      $k->where('kedinasan', 'LIKE', "%{$search}%");
                  })

                  ->orWhereHas('kodelokasibangunangedung', function($k) use ($search) {
                      $k->where('kodelokasi', 'LIKE', "%{$search}%");
                  })
                  ;
            });
        }


        $data = $query->paginate($perPage);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('frontend.abgblora.03_pendataanbangunangedung.02_kicbangunangedung.partials.table', compact('data'))->render()
            ]);
        }

        return view('frontend.abgblora.03_pendataanbangunangedung.02_kicbangunangedung.index', [
            'title' => 'Kartu Inventaris Gedung & Bangunan Kabupaten Blora',
            'data' => $data,
            'perPage' => $perPage,
            'search' => $search
        ]);
    }
public function databangunangedung(Request $request)
{
    $perPage = $request->input('perPage', 15);
    $search = $request->input('search');

    $query = databgkepemilikan::query()->orderBy('created_at', 'desc');

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('tanggalinput', 'LIKE', "%{$search}%")
              ->orWhere('namainstitusi', 'LIKE', "%{$search}%")
              ->orWhere('nopengesahanusaha', 'LIKE', "%{$search}%")
              ->orWhere('alamat', 'LIKE', "%{$search}%")
              ->orWhere('notelepon', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%")
              ->orWhere('koordinat', 'LIKE', "%{$search}%")
              ->orWhereHas('user', function ($k) use ($search) {
                  $k->where('name', 'LIKE', "%{$search}%");
              })
              ->orWhereHas('kecamatanblora', function ($k) use ($search) {
                  $k->where('nama', 'LIKE', "%{$search}%");
              });
        });
    }

    $data = $query->paginate($perPage);

    if ($request->ajax()) {
        return response()->json([
            'html' => view('frontend.abgblora.03_pendataanbangunangedung.01_bangunangedung.partials.table', compact('data'))->render()
        ]);
    }

    return view('frontend.abgblora.03_pendataanbangunangedung.01_bangunangedung.index', [
        'title' => 'Data Bangunan Gedung Kabupaten Blora',
        'data' => $data,
        'perPage' => $perPage,
        'search' => $search
    ]);
}


    public function databangunangedungshow($id)
    {
        $databangunangedung = databangunangedung::where('id', $id)->first();

        if (!$databangunangedung) {
            // Tangani jika kegiatan tidak ditemukan
            return redirect()->back()->with('error', 'Kegiatan tidak ditemukan.');
        }

          // Menghitung nomor urut mulai
            // $start = ($subdata->currentPage() - 1) * $subdata->perPage() + 1;


    // Ambil data user saat ini
    $user = Auth::user();

    return view('frontend.abgblora.03_pendataanbangunangedung.01_bangunangedung.show', [
        'title' => 'Data Details Bangunan Gedung Kabupaten Blora',
        'data' => $databangunangedung,
        // 'subData' => $subdata,  // Jika Anda ingin mengirimkan data sub kontraktor juga
        'user' => $user,
        // 'start' => $start,
    ]);

}


public function statistikbg()
{
    // ========================================================================================
    // Ambil semua data bangunan gedung beserta relasi fungsibangunan
    $dataBangunan = databangunangedung::with('fungsibangunan')->get();

    // Inisialisasi array untuk menghitung jumlah masing-masing fungsi bangunan
    $fungsiCounts = [];

    foreach ($dataBangunan as $bangunan) {
        if ($bangunan->fungsibangunan && $bangunan->fungsibangunan->fungsibangunan) {
            $fungsi = $bangunan->fungsibangunan->fungsibangunan;
            if (!isset($fungsiCounts[$fungsi])) {
                $fungsiCounts[$fungsi] = 0;
            }
            $fungsiCounts[$fungsi]++;
        }
    }

    // Hitung total bangunan
    $total = array_sum($fungsiCounts);

  // Hitung persentase dan jumlah
        $fungsiPersentase = [];
        foreach ($fungsiCounts as $fungsi => $jumlah) {
            $fungsiPersentase[] = [
                'label' => $fungsi,
                'value' => round(($jumlah / $total) * 100, 2),
                'count' => $jumlah
            ];
        }

    // ========================================================================================
    // Ambil semua data kompleksitas bangunan gedung
    $dataBangunan2 = databangunangedung::with('klasifikasibangunangedung')->get();

    // Inisialisasi array untuk menghitung jumlah masing-masing fungsi bangunan
    $fungsiCounts2 = [];

    foreach ($dataBangunan2 as $bangunan) {
        if ($bangunan->klasifikasibangunangedung && $bangunan->klasifikasibangunangedung->kompleksitas) {
            $fungsi2 = $bangunan->klasifikasibangunangedung->kompleksitas;
            if (!isset($fungsiCounts2[$fungsi2])) {
                $fungsiCounts2[$fungsi2] = 0;
            }
            $fungsiCounts2[$fungsi2]++;
        }
    }

    // Hitung total bangunan
    $total = array_sum($fungsiCounts2);

  // Hitung persentase dan jumlah
        $fungsiPersentase2 = [];
        foreach ($fungsiCounts2 as $fungsi2 => $jumlah) {
            $fungsiPersentase2[] = [
                'label' => $fungsi2,
                'value' => round(($jumlah / $total) * 100, 2),
                'count' => $jumlah
            ];
        }


    return view('frontend.abgblora.03_pendataanbangunangedung.01_bangunangedung.statistik', [
        'title' => 'Statistik Data Bangunan Gedung',
        'fungsiPersentase' => $fungsiPersentase,
        'fungsiPersentase2' => $fungsiPersentase2,
        'total' => $total
    ]);
}
// ------------------
// format baru

public function bependataanbangunangedung(Request $request)
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

    return view('backend.02_pendataanbangunangedung.01_databaseutama.01_pendataanbangunangedung', [
        'title' => 'Pendataan Bangunan Gedung',
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

public function bebangunangedung(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 15);

    $query = databgkepemilikan::with('kecamatanblora');

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('namainstitusi', 'like', "%{$search}%")
              ->orWhere('alamat', 'like', "%{$search}%")
              ->orWhere('notelepon', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('nopengesahanusaha', 'like', "%{$search}%")
              ->orWhereHas('kecamatanblora', function ($sub) use ($search) {
                  $sub->where('kecamatanblora', 'like', "%{$search}%");
              });

            if (preg_match('/\d{4}-\d{2}-\d{2}/', $search)) {
                $q->orWhereDate('created_at', $search);
            }
        });
    }

    // Urutkan berdasarkan kecamatanblora_id ascending
    $berkasbantek = $query->orderBy('kecamatanblora_id', 'asc')->paginate($perPage)->appends($request->all());

    return view('backend.02_pendataanbangunangedung.01_databaseutama.02_databangunangedungnew', [
        'title' => 'Pendataan Bangunan Gedung Kabupaten Blora',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}

public function bebangunangedungdelete($id)
{
    // Cari item berdasarkan judul
    $entry = databgkepemilikan::where('id', $id)->first();

    if ($entry) {
        // Jika ada file header yang terdaftar, hapus dari storage
        // if (Storage::disk('public')->exists($entry->header)) {
            //     Storage::disk('public')->delete($entry->header);
            // }

            // Hapus entri dari database
            $entry->delete();

            // Redirect atau memberi respons sesuai kebutuhan
            return redirect('/bebangunangedung')->with('delete', 'Data Berhasil Di Hapus !');

        }

        return redirect()->back()->with('error', 'Item not found');
    }

        public function bebangunangedunginformasi($id)
{
    // Cari data berdasarkan ID
    $data = databgkepemilikan::findOrFail($id);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Tampilkan ke view dengan key-value
    return view('backend.02_pendataanbangunangedung.01_databaseutama.03_informasidatabangunan', [
        'title' => 'Informasi Pendataan Bangunan Gedung Kabupaten Blora',
        'data' => $data,
        'user' => $user
    ]);
}

public function bependataanbgtanah($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = databgkepemilikan::findOrFail($id);

    // Ambil data datapemilik berdasarkan foreign key pbgslfbangunan_id
    $subdatapemilik = databgtanah::where('pbgslfbangunan_id', $data->id)->paginate(15);

    // Hitung nomor urut mulai untuk paginasi
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Ambil data jenis pengajuan
    // $datapbgslf = jenispengajuanpbgslfper::all();

    // Kirim data ke view
    return view('backend.02_pendataanbangunangedung.01_databaseutama.04_dataprofiltanah', [
        'title' => 'Informasi Data Profil Tanah Bangunan Gedung',
        'title_halaman' => 'Informasi Data Profil Tanah Bangunan Gedung',
        'user' => $user,
        'data' => $data,
        // 'datapbgslf' => $datapbgslf,
        'subdatapemilik' => $subdatapemilik,
        'start' => $start,
    ]);
}

public function bedatabgprofiltanah($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = databgkepemilikan::findOrFail($id);

    // Ambil data datapemilik berdasarkan foreign key pbgslfbangunan_id
    $subdatapemilik = databgtanah::where('databgkepemilikan_id', $data->id)->paginate(15);

    // Hitung nomor urut mulai untuk paginasi
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Ambil data jenis pengajuan
    // $datapbgslf = jenispengajuanpbgslfper::all();

    // Kirim data ke view
    return view('backend.02_pendataanbangunangedung.02_datatanah.01_databgtanah', [
        'title' => 'Informasi Data Status Hak Tanah Bangunan Gedung',
        'title_halaman' => 'Data Pemilik',
        'user' => $user,
        'data' => $data,
        // 'datapbgslf' => $datapbgslf,
        'subdatapemilik' => $subdatapemilik,
        'start' => $start,
    ]);
}

public function bedatabgprofiltanahupdate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = databgkepemilikan::find($id);
    $databantuanteknis = databgtanah::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.02_pendataanbangunangedung.02_datatanah.02_updatedatatanahbg', [
        'title' => 'Perbaikan Status Data Tanah ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bedatabgprofiltanahupdatenew(Request $request, $id)
{
    $validated = $request->validate([
        'databgkepemilikan_id' => 'nullable|integer',
        'statushaktanah' => 'nullable|string|max:100',
        'statuskepemilikan' => 'nullable|string|max:100',
        'nobuktikepemilikan' => 'nullable|string|max:100',
        'alamattanah' => 'nullable|string|max:255',
    ], [
        'statushaktanah.max' => 'Maksimal 100 karakter.',
        'statuskepemilikan.max' => 'Maksimal 100 karakter.',
        'nobuktikepemilikan.max' => 'Maksimal 100 karakter.',
        'alamattanah.max' => 'Maksimal 255 karakter.',
    ]);

    // Ambil data berdasarkan ID
    $pemilik = databgtanah::findOrFail($id);

    // Update data
    $pemilik->update([
        'databgkepemilikan_id' => $validated['databgkepemilikan_id'],
        'statushaktanah' => $validated['statushaktanah'],
        'statuskepemilikan' => $validated['statuskepemilikan'],
        'nobuktikepemilikan' => $validated['nobuktikepemilikan'],
        'alamattanah' => $validated['alamattanah'],
    ]);

    // Feedback
    session()->flash('update', 'Data kepemilikan tanah berhasil diperbarui!');
    return redirect()->back();
}


public function bedatabgprofiltanahcreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = databgkepemilikan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.02_pendataanbangunangedung.02_datatanah.03_tambahdatatanah', [
        'title' => 'Tambah Data Informasi Profil Tanah Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bedatabgprofiltanahcreatenew(Request $request)
{
    $validated = $request->validate([
        // 'id' => 'required|string',
        'databgkepemilikan_id' => 'required|string',
        'statushaktanah' => 'required|string|max:100',
        'statuskepemilikan' => 'required|string|max:100',
        'nobuktikepemilikan' => 'required|string|max:100',
        'alamattanah' => 'required|string|max:255',
    ], [
        'databgkepemilikan_id.required' => 'ID Kepemilikan wajib diisi.',
        'databgkepemilikan_id.exists' => 'Data kepemilikan tidak ditemukan.',
    ]);

    databgtanah::create([
        // 'id' => $validated['id'],
        'databgkepemilikan_id' => $validated['databgkepemilikan_id'],
        'statushaktanah' => $validated['statushaktanah'] ?? null,
        'statuskepemilikan' => $validated['statuskepemilikan'] ?? null,
        'nobuktikepemilikan' => $validated['nobuktikepemilikan'] ?? null,
        'alamattanah' => $validated['alamattanah'] ?? null,
    ]);

    session()->flash('create', 'Data tanah berhasil ditambahkan!');
    return redirect()->route('bedatabgprofiltanah', ['id' => $validated['databgkepemilikan_id']]);
}

public function bedatabgprofilbangunan($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = databgkepemilikan::findOrFail($id);

    // Ambil data datapemilik berdasarkan foreign key pbgslfbangunan_id
    $subdatapemilik = databgpeprofilbangunangedung::where('databgkepemilikan_id', $data->id)->paginate(15);

    // Hitung nomor urut mulai untuk paginasi
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Ambil data jenis pengajuan
    // $datapbgslf = jenispengajuanpbgslfper::all();

    // Kirim data ke view
    return view('backend.02_pendataanbangunangedung.03_profilbangunangedung.01_dataprofilbangunan', [
        'title' => 'Informasi Data Profil Bangunan Gedung',
        'title_halaman' => 'Informasi Data Profil Bangunan Gedung',
        'user' => $user,
        'data' => $data,
        // 'datapbgslf' => $datapbgslf,
        'subdatapemilik' => $subdatapemilik,
        'start' => $start,
    ]);
}



public function bedatabgprofilbangunanupdate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = databgkepemilikan::find($id);
    $databantuanteknis = databgpeprofilbangunangedung::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.02_pendataanbangunangedung.03_profilbangunangedung.02_updateprofilbangunan', [
        'title' => 'Perbaikan Data Profil Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bedatabgprofilbangunanupdatenew(Request $request, $id)
{
    $validated = $request->validate([
        'databgkepemilikan_id' => 'nullable|integer',
        'luastanah' => 'nullable|string|max:255',
        'namabangunan' => 'nullable|string|max:255',
        'alamatbangunan' => 'nullable|string|max:255',
        'fungsibangunan' => 'nullable|string|max:255',
        'jumlahlantai' => 'nullable|string|max:100',
        'luaslantaildasar' => 'nullable|string|max:255',
        'totalluaslantai' => 'nullable|string|max:255',
        'tinggibangunan' => 'nullable|string|max:255',
        'luasbasement' => 'nullable|string|max:255',
        'koordinatbangunan' => 'nullable|string|max:255',
        'tanggalmulaikonstruksi' => 'nullable|date',
        'tanggalselesaikonstruksi' => 'nullable|date',
        'tanggalrehabilitasi' => 'nullable|date',
    ], [
        'luastanah.max' => 'Maksimal 255 karakter.',
        'namabangunan.max' => 'Maksimal 255 karakter.',
        'alamatbangunan.max' => 'Maksimal 255 karakter.',
        'fungsibangunan.max' => 'Maksimal 255 karakter.',
        'jumlahlantai.max' => 'Maksimal 100 karakter.',
        'luaslantaildasar.max' => 'Maksimal 255 karakter.',
        'totalluaslantai.max' => 'Maksimal 255 karakter.',
        'tinggibangunan.max' => 'Maksimal 255 karakter.',
        'luasbasement.max' => 'Maksimal 255 karakter.',
        'koordinatbangunan.max' => 'Maksimal 255 karakter.',
        'tanggalmulaikonstruksi.date' => 'Format tanggal tidak valid.',
        'tanggalselesaikonstruksi.date' => 'Format tanggal tidak valid.',
        'tanggalrehabilitasi.date' => 'Format tanggal tidak valid.',
    ]);

    // Ambil data berdasarkan ID
    $bangunan = databgpeprofilbangunangedung::findOrFail($id);

    // Update data
    $bangunan->update([
        'databgkepemilikan_id' => $validated['databgkepemilikan_id'] ?? null,
        'luastanah' => $validated['luastanah'] ?? null,
        'namabangunan' => $validated['namabangunan'] ?? null,
        'alamatbangunan' => $validated['alamatbangunan'] ?? null,
        'fungsibangunan' => $validated['fungsibangunan'] ?? null,
        'jumlahlantai' => $validated['jumlahlantai'] ?? null,
        'luaslantaildasar' => $validated['luaslantaildasar'] ?? null,
        'totalluaslantai' => $validated['totalluaslantai'] ?? null,
        'tinggibangunan' => $validated['tinggibangunan'] ?? null,
        'luasbasement' => $validated['luasbasement'] ?? null,
        'koordinatbangunan' => $validated['koordinatbangunan'] ?? null,
        'tanggalmulaikonstruksi' => $validated['tanggalmulaikonstruksi'] ?? null,
        'tanggalselesaikonstruksi' => $validated['tanggalselesaikonstruksi'] ?? null,
        'tanggalrehabilitasi' => $validated['tanggalrehabilitasi'] ?? null,
    ]);

    // Feedback
    session()->flash('update', 'Data profil bangunan berhasil diperbarui!');
    return redirect()->back();
}


public function bedatabgprofilbangunancreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = databgkepemilikan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.02_pendataanbangunangedung.03_profilbangunangedung.03_tambahdataprofil', [
        'title' => 'Tambah Data Informasi Profil Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bedatabgprofilbangunancreatenew(Request $request)
{
    $validated = $request->validate([
        'databgkepemilikan_id' => 'required|string|exists:databgkepemilikans,id',

        'luastanah' => 'nullable|string|max:100',
        'namabangunan' => 'nullable|string|max:255',
        'alamatbangunan' => 'nullable|string|max:255',
        'fungsibangunan' => 'nullable|string|max:100',
        'jumlahlantai' => 'nullable|string|max:10',
        'luaslantaildasar' => 'nullable|string|max:100',
        'totalluaslantai' => 'nullable|string|max:100',
        'tinggibangunan' => 'nullable|string|max:100',
        'luasbasement' => 'nullable|string|max:100',
        'koordinatbangunan' => 'nullable|string|max:255',
        'tanggalmulaikonstruksi' => 'nullable|date',
        'tanggalselesaikonstruksi' => 'nullable|date',
        'tanggalrehabilitasi' => 'nullable|date',
    ], [
        'databgkepemilikan_id.required' => 'ID Kepemilikan wajib diisi.',
        'databgkepemilikan_id.exists' => 'Data kepemilikan tidak ditemukan.',
    ]);

    databgpeprofilbangunangedung::create([
        'databgkepemilikan_id' => $validated['databgkepemilikan_id'],
        'luastanah' => $validated['luastanah'] ?? null,
        'namabangunan' => $validated['namabangunan'] ?? null,
        'alamatbangunan' => $validated['alamatbangunan'] ?? null,
        'fungsibangunan' => $validated['fungsibangunan'] ?? null,
        'jumlahlantai' => $validated['jumlahlantai'] ?? null,
        'luaslantaildasar' => $validated['luaslantaildasar'] ?? null,
        'totalluaslantai' => $validated['totalluaslantai'] ?? null,
        'tinggibangunan' => $validated['tinggibangunan'] ?? null,
        'luasbasement' => $validated['luasbasement'] ?? null,
        'koordinatbangunan' => $validated['koordinatbangunan'] ?? null,
        'tanggalmulaikonstruksi' => $validated['tanggalmulaikonstruksi'] ?? null,
        'tanggalselesaikonstruksi' => $validated['tanggalselesaikonstruksi'] ?? null,
        'tanggalrehabilitasi' => $validated['tanggalrehabilitasi'] ?? null,
    ]);

    session()->flash('create', 'Data profil bangunan berhasil ditambahkan!');
    return redirect()->route('bedatabgprofilbangunan', ['id' => $validated['databgkepemilikan_id']]);
}


public function bedatabgklasifikasi($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = databgkepemilikan::findOrFail($id);

    // Ambil data datapemilik berdasarkan foreign key pbgslfbangunan_id
    $subdatapemilik = databgklasifikasi::where('databgkepemilikan_id', $data->id)->paginate(15);

    // Hitung nomor urut mulai untuk paginasi
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Ambil data jenis pengajuan
    // $datapbgslf = jenispengajuanpbgslfper::all();

    // Kirim data ke view
    return view('backend.02_pendataanbangunangedung.04_klasfikasi.01_dataklasifikasi', [
        'title' => 'Informasi Data Klasifikasi Bangunan Gedung',
        'title_halaman' => 'Informasi Data Klasifikasi Bangunan Gedung',
        'user' => $user,
        'data' => $data,
        // 'datapbgslf' => $datapbgslf,
        'subdatapemilik' => $subdatapemilik,
        'start' => $start,
    ]);
}

public function bedatabgklasifikasiupdate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = databgkepemilikan::find($id);
    $databantuanteknis = databgklasifikasi::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.02_pendataanbangunangedung.04_klasfikasi.02_updateklasifikasi', [
        'title' => 'Perbaikan Data Klasifikasi Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bedatabgklasifikasiupdatenew(Request $request, $id)
{
    $validated = $request->validate([
        'databgkepemilikan_id' => 'nullable|string',
        'tingkat_kompleksitas' => 'nullable|string|max:255',
        'tingkat_permanensi' => 'nullable|string|max:255',
        'resiko_kebakaran' => 'nullable|string|max:255',
        'resiko_gempa' => 'nullable|string|max:255',
        'kepadatan_lokasi' => 'nullable|string|max:255',
    ], [
        'tingkat_kompleksitas.max' => 'Maksimal 255 karakter.',
        'tingkat_permanensi.max' => 'Maksimal 255 karakter.',
        'resiko_kebakaran.max' => 'Maksimal 255 karakter.',
        'resiko_gempa.max' => 'Maksimal 255 karakter.',
        'kepadatan_lokasi.max' => 'Maksimal 255 karakter.',
    ]);

    // Ambil data berdasarkan ID
    $klasifikasi = databgklasifikasi::findOrFail($id);

    // Update data
    $klasifikasi->update([
        'databgkepemilikan_id' => $validated['databgkepemilikan_id'] ?? null,
        'tingkat_kompleksitas' => $validated['tingkat_kompleksitas'] ?? null,
        'tingkat_permanensi' => $validated['tingkat_permanensi'] ?? null,
        'resiko_kebakaran' => $validated['resiko_kebakaran'] ?? null,
        'resiko_gempa' => $validated['resiko_gempa'] ?? null,
        'kepadatan_lokasi' => $validated['kepadatan_lokasi'] ?? null,
    ]);

    // Feedback
    session()->flash('update', 'Data klasifikasi bangunan berhasil diperbarui!');
    return redirect()->back();
}


public function bedatabgklasifikasicreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = databgkepemilikan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.02_pendataanbangunangedung.04_klasfikasi.03_tambahdataklasifikasi', [
        'title' => 'Tambah Data Informasi Klasifikasi Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bedatabgklasifikasicreatenew(Request $request)
{
    $validated = $request->validate([
        'databgkepemilikan_id' => 'required|string',
        'tingkat_kompleksitas' => 'nullable|string|max:100',
        'tingkat_permanensi' => 'nullable|string|max:100',
        'resiko_kebakaran' => 'nullable|string|max:100',
        'resiko_gempa' => 'nullable|string|max:100',
        'kepadatan_lokasi' => 'nullable|string|max:100',
    ], [
        'databgkepemilikan_id.required' => 'ID Kepemilikan wajib diisi.',
        'databgkepemilikan_id.exists' => 'Data kepemilikan tidak ditemukan.',
    ]);

    databgklasifikasi::create([
        'databgkepemilikan_id' => $validated['databgkepemilikan_id'],
        'tingkat_kompleksitas' => $validated['tingkat_kompleksitas'] ?? null,
        'tingkat_permanensi' => $validated['tingkat_permanensi'] ?? null,
        'resiko_kebakaran' => $validated['resiko_kebakaran'] ?? null,
        'resiko_gempa' => $validated['resiko_gempa'] ?? null,
        'kepadatan_lokasi' => $validated['kepadatan_lokasi'] ?? null,
    ]);

    session()->flash('create', 'Data klasifikasi bangunan berhasil ditambahkan!');
    return redirect()->route('bedatabgklasifikasi', ['id' => $validated['databgkepemilikan_id']]);
}


public function bedatabgstruktur($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = databgkepemilikan::findOrFail($id);

    // Ambil data datapemilik berdasarkan foreign key pbgslfbangunan_id
    $subdatapemilik = databgstrukturbangunan::where('databgkepemilikan_id', $data->id)->paginate(15);

    // Hitung nomor urut mulai untuk paginasi
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Ambil data jenis pengajuan
    // $datapbgslf = jenispengajuanpbgslfper::all();

    // Kirim data ke view
    return view('backend.02_pendataanbangunangedung.05_strukturbangunan.01_datatstrukturbangunan', [
        'title' => 'Informasi Data Struktur Bangunan Gedung',
        'title_halaman' => 'Informasi Data Struktur Bangunan Gedung',
        'user' => $user,
        'data' => $data,
        // 'datapbgslf' => $datapbgslf,
        'subdatapemilik' => $subdatapemilik,
        'start' => $start,
    ]);
}



public function bedatabgstrukturupdate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = databgkepemilikan::find($id);
    $databantuanteknis = databgstrukturbangunan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.02_pendataanbangunangedung.05_strukturbangunan.02_updatestrukturbangunan', [
        'title' => 'Perbaikan Data Struktur Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bedatabgstrukturupdatenew(Request $request, $id)
{
    $validated = $request->validate([
        'databgkepemilikan_id' => 'nullable|integer',
        'struktur_bawah' => 'nullable|string|max:255',
        'struktur_atas' => 'nullable|string|max:255',
        'struktur_atap' => 'nullable|string|max:255',
        'rangka_atap' => 'nullable|string|max:255',
        'balok' => 'nullable|string|max:255',
        'kolom' => 'nullable|string|max:255',
        'pondasi' => 'nullable|string|max:255',
        'dinding' => 'nullable|string|max:255',
        'genteng' => 'nullable|string|max:255',
        'plafon' => 'nullable|string|max:255',
        'lantai' => 'nullable|string|max:255',
        'pintu' => 'nullable|string|max:255',
        'jendela' => 'nullable|string|max:255',
    ], [
        '*.max' => 'Maksimal 255 karakter.',
        'databgkepemilikan_id.integer' => 'ID Kepemilikan harus berupa angka.',
    ]);

    $klasifikasi = databgstrukturbangunan::findOrFail($id);

    $klasifikasi->update([
        'databgkepemilikan_id' => $validated['databgkepemilikan_id'] ?? null,
        'struktur_bawah' => $validated['struktur_bawah'] ?? null,
        'struktur_atas' => $validated['struktur_atas'] ?? null,
        'struktur_atap' => $validated['struktur_atap'] ?? null,
        'rangka_atap' => $validated['rangka_atap'] ?? null,
        'balok' => $validated['balok'] ?? null,
        'kolom' => $validated['kolom'] ?? null,
        'pondasi' => $validated['pondasi'] ?? null,
        'dinding' => $validated['dinding'] ?? null,
        'genteng' => $validated['genteng'] ?? null,
        'plafon' => $validated['plafon'] ?? null,
        'lantai' => $validated['lantai'] ?? null,
        'pintu' => $validated['pintu'] ?? null,
        'jendela' => $validated['jendela'] ?? null,
    ]);

    session()->flash('update', 'Data struktur bangunan berhasil diperbarui!');
    return redirect()->back();
}


public function bedatabgstrukturcreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = databgkepemilikan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.02_pendataanbangunangedung.05_strukturbangunan.03_tambahstrukturbangunan', [
        'title' => 'Tambah Data Informasi Status Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bedatabgstrukturcreatenew(Request $request)
{
    $validated = $request->validate([
        'databgkepemilikan_id' => 'required|string',
        'struktur_bawah' => 'nullable|string|max:100',
        'struktur_atas' => 'nullable|string|max:100',
        'struktur_atap' => 'nullable|string|max:100',
        'rangka_atap' => 'nullable|string|max:100',
        'balok' => 'nullable|string|max:100',
        'kolom' => 'nullable|string|max:100',
        'pondasi' => 'nullable|string|max:100',
        'dinding' => 'nullable|string|max:100',
        'genteng' => 'nullable|string|max:100',
        'plafon' => 'nullable|string|max:100',
        'lantai' => 'nullable|string|max:100',
        'pintu' => 'nullable|string|max:100',
        'jendela' => 'nullable|string|max:100',
    ], [
        'databgkepemilikan_id.required' => 'ID Kepemilikan wajib diisi.',
        'databgkepemilikan_id.exists' => 'Data kepemilikan tidak ditemukan.',
    ]);

    databgstrukturbangunan::create([
        'databgkepemilikan_id' => $validated['databgkepemilikan_id'],
        'struktur_bawah' => $validated['struktur_bawah'] ?? null,
        'struktur_atas' => $validated['struktur_atas'] ?? null,
        'struktur_atap' => $validated['struktur_atap'] ?? null,
        'rangka_atap' => $validated['rangka_atap'] ?? null,
        'balok' => $validated['balok'] ?? null,
        'kolom' => $validated['kolom'] ?? null,
        'pondasi' => $validated['pondasi'] ?? null,
        'dinding' => $validated['dinding'] ?? null,
        'genteng' => $validated['genteng'] ?? null,
        'plafon' => $validated['plafon'] ?? null,
        'lantai' => $validated['lantai'] ?? null,
        'pintu' => $validated['pintu'] ?? null,
        'jendela' => $validated['jendela'] ?? null,
    ]);

    session()->flash('create', 'Data struktur bangunan berhasil ditambahkan!');
    return redirect()->route('bedatabgstruktur', ['id' => $validated['databgkepemilikan_id']]);
}

public function bedatabgstatusbangunan($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = databgkepemilikan::findOrFail($id);

    // Ambil data datapemilik berdasarkan foreign key pbgslfbangunan_id
    $subdatapemilik = databgstatus::where('databgkepemilikan_id', $data->id)->paginate(15);

    // Hitung nomor urut mulai untuk paginasi
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Ambil data jenis pengajuan
    // $datapbgslf = jenispengajuanpbgslfper::all();

    // Kirim data ke view
    return view('backend.02_pendataanbangunangedung.06_statusbangunan.01_datastatusbangunan', [
        'title' => 'Informasi Data Status Bangunan Gedung',
        'title_halaman' => 'Informasi Data Status Bangunan Gedung',
        'user' => $user,
        'data' => $data,
        // 'datapbgslf' => $datapbgslf,
        'subdatapemilik' => $subdatapemilik,
        'start' => $start,
    ]);
}

public function bedatabgstatusbangunanupdate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = databgkepemilikan::find($id);
    $databantuanteknis = databgstatus::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.02_pendataanbangunangedung.06_statusbangunan.02_updatestatusbangunan', [
        'title' => 'Perbaikan Data Status Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bedatabgstatusbangunanupdatenew(Request $request, $id)
{
    $validated = $request->validate([
        'databgkepemilikan_id' => 'nullable|string',
        'dokumen_teknis_tanah' => 'nullable|string|max:255',
        'no_hdno' => 'nullable|string|max:255',
        'no_imbpbg' => 'nullable|string|max:255',
        'no_slf' => 'nullable|string|max:255',
    ], [
        '*.max' => 'Maksimal 255 karakter.',
        'databgkepemilikan_id.integer' => 'ID Kepemilikan harus berupa angka.',
    ]);

    $klasifikasi = databgstatus::findOrFail($id);

    $klasifikasi->update([
        'databgkepemilikan_id' => $validated['databgkepemilikan_id'] ?? null,
        'dokumen_teknis_tanah' => $validated['dokumen_teknis_tanah'] ?? null,
        'no_hdno' => $validated['no_hdno'] ?? null,
        'no_imbpbg' => $validated['no_imbpbg'] ?? null,
        'no_slf' => $validated['no_slf'] ?? null,
    ]);

    session()->flash('update', 'Data berhasil diperbarui!');
    return redirect()->back();
}


}

