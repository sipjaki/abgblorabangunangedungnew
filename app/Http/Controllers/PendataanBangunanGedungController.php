<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

// use App\Models\Databgtingkatkerusahan;
// use App\Models\Databgstrukturbangunan;
use App\Models\bgkartuinventarisbangunan;
use App\Models\databangunangedung;
use App\Models\databgdokumenmepbangunan;
use App\Models\databgintensitasbangunan;
use App\Models\databgkepemilikan;
use App\Models\databgklasifikasi;
use App\Models\databgpeprofilbangunangedung;
use App\Models\databgstatus;
use App\Models\databgstrukturbangunan;
use App\Models\databgtanah;
use App\Models\databgtingkatkerusahan;
use App\Models\datastrukturbangunangedung;
use App\Models\kecamatanblora;
use App\Models\kelurahandesa;
use App\Models\kepemilikanbangunangedung;
use App\Models\kicdokumen;
use App\Models\kicinduk;
use App\Models\kicstruktur;
use App\Models\pbgslfbangunan;
use App\Models\pengkajiteknis;
use App\Models\satuankerja;
use Illuminate\Support\Facades\Auth;

class PendataanBangunanGedungController extends Controller
{

public function datakicbangunan(Request $request)
{
    $perPage = $request->input('perPage', 15);
    $search = $request->input('search');

    $query = kicinduk::query()
        ->with(['satuankerja', 'kicdokumen']) // eager load relasi
        ->orderBy('created_at', 'desc');

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('kodelokasi', 'LIKE', "%{$search}%")
              ->orWhere('bidang', 'LIKE', "%{$search}%")
              ->orWhere('subbidang', 'LIKE', "%{$search}%")
              ->orWhereHas('satuankerja', function($k) use ($search) {
                  $k->where('satuankerja', 'LIKE', "%{$search}%");
              });
        });
    }

    $data = $query->paginate($perPage);

    // Hitung total jumlah kicdokumen dari semua kicinduk
    $jumlahkic = KicDokumen::count();

    if ($request->ajax()) {
        return response()->json([
            'html' => view('frontend.abgblora.03_pendataanbangunangedung.02_kicbangunangedung.partials.table', compact('data'))->render(),
            'jumlahkic' => $jumlahkic
        ]);
    }

    return view('frontend.abgblora.03_pendataanbangunangedung.02_kicbangunangedung.index', [
        'title' => 'Kartu Inventaris Gedung & Bangunan Kabupaten Blora',
        'data' => $data,
        'perPage' => $perPage,
        'search' => $search,
        'jumlahkic' => $jumlahkic
    ]);
}

public function databangunangedung(Request $request)
{
    $perPage = $request->input('perPage', 15);
    $search = $request->input('search');

    $query = databgkepemilikan::query()
        ->orderBy('kecamatanblora_id', 'asc')
        ->orderBy('created_at', 'desc');

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('tanggalinput', 'LIKE', "%{$search}%")
              ->orWhere('namainstitusi', 'LIKE', "%{$search}%")
              ->orWhere('nopengesahanusaha', 'LIKE', "%{$search}%")
            //   ->orWhere('alamat', 'LIKE', "%{$search}%")
            //   ->orWhere('notelepon', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%")
              ->orWhere('koordinat', 'LIKE', "%{$search}%")
            //   ->orWhereHas('user', function ($k) use ($search) {
            //       $k->where('name', 'LIKE', "%{$search}%");
            //   })
              ->orWhereHas('kecamatanblora', function ($k) use ($search) {
                  $k->where('kecamatanblora', 'LIKE', "%{$search}%");
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
        $databangunangedung = databgkepemilikan::where('id', $id)->first();

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
    $jumlahDataTotal = databgkepemilikan::count();
    $jumlahDatatanah = databgtanah::count();
    $jumlahDataprofil = databgpeprofilbangunangedung::count();
    $jumlahDataklasifikasi = databgklasifikasi::count();
    $jumlahDatastruktur = databgintensitasbangunan::count();
    $jumlahDatamep = databgdokumenmepbangunan::count();
    $jumlahDatakerusakan = databgtingkatkerusahan::count();

    // Ambil jumlah data unik berdasarkan namainstitusi
    $jumlahPerInstitusi = databgkepemilikan::select('namainstitusi', DB::raw('count(*) as total'))
        ->groupBy('namainstitusi')
        ->orderByDesc('total')
        ->get();

    // Ambil jumlah data per kecamatanblora_id
    $jumlahPerKecamatan = databgkepemilikan::select('kecamatanblora_id', DB::raw('count(*) as total'))
        ->groupBy('kecamatanblora_id')
        ->orderByDesc('total')
        ->get();

    // ✅ Tambahan: ambil jumlah data ada dan kosong per kecamatan + persentase
    $dataPerKecamatan = $jumlahPerKecamatan->map(function($item) {
        $ada = databgkepemilikan::where('kecamatanblora_id', $item->kecamatanblora_id)
            ->whereNotNull('nopengesahanusaha')
            ->whereNotIn('nopengesahanusaha', ['-', '--'])
            ->count();

        $kosong = databgkepemilikan::where('kecamatanblora_id', $item->kecamatanblora_id)
            ->where(function($q) {
                $q->whereNull('nopengesahanusaha')
                  ->orWhereIn('nopengesahanusaha', ['-', '--']);
            })->count();

        $total = $item->total;
        $persen_ada = $total > 0 ? round(($ada / $total) * 100, 2) : 0;
        $persen_kosong = $total > 0 ? round(($kosong / $total) * 100, 2) : 0;

        $item->ada = $ada;
        $item->kosong = $kosong;
        $item->persen_ada = $persen_ada;
        $item->persen_kosong = $persen_kosong;

        return $item;
    });

    return view('backend.02_pendataanbangunangedung.01_databaseutama.01_pendataanbangunangedung', [
        'title' => 'Pendataan Bangunan Gedung',
        'user' => $user,
        'jumlahDataTotal' => $jumlahDataTotal,
        'jumlahPerInstitusi' => $jumlahPerInstitusi,
        'jumlahPerKecamatan' => $dataPerKecamatan, // sudah ada 'ada', 'kosong', 'persen_ada', 'persen_kosong'
        'jumlahDatatanah' => $jumlahDatatanah,
        'jumlahDataprofil' => $jumlahDataprofil,
        'jumlahDataklasifikasi' => $jumlahDataklasifikasi,
        'jumlahDatastruktur' => $jumlahDatastruktur,
        'jumlahDatamep' => $jumlahDatamep,
        'jumlahDatakerusakan' => $jumlahDatakerusakan,
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
    // $berkasbantek = $query->orderBy('kecamatanblora_id', 'asc')->paginate($perPage)->appends($request->all());
$berkasbantek = $query->orderBy('created_at', 'desc')->paginate($perPage)->appends($request->all());

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
    // $datakembali = databgkepemilikan::findOrFail($id);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Tampilkan ke view dengan key-value
    return view('backend.02_pendataanbangunangedung.01_databaseutama.03_informasidatabangunan', [
        'title' => 'Informasi Pendataan Bangunan Gedung Kabupaten Blora',
        'data' => $data,
        // 'datakembali' => $datakembali,
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

// public function bedatabgprofiltanah($id)
// {
//     // Ambil user login
//     $user = Auth::user();

//     // Cari data pbg berdasarkan ID
//     $data = databgkepemilikan::findOrFail($id);

//     // Ambil data datapemilik berdasarkan foreign key pbgslfbangunan_id
//     $subdatapemilik = databgtanah::where('databgkepemilikan_id', $data->id)->paginate(15);

//     // Hitung nomor urut mulai untuk paginasi
//     $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

//     // Ambil data jenis pengajuan
//     // $datapbgslf = jenispengajuanpbgslfper::all();

//     // Kirim data ke view
//     return view('backend.02_pendataanbangunangedung.02_datatanah.01_databgtanah', [
//         'title' => 'Informasi Data Status Hak Tanah Bangunan Gedung',
//         'title_halaman' => 'Data Pemilik',
//         'user' => $user,
//         'data' => $data,
//         // 'datapbgslf' => $datapbgslf,
//         'subdatapemilik' => $subdatapemilik,
//         'start' => $start,
//     ]);
// }


// public function bedatabgprofiltanah($kepemilikanId)
// {
//     $user = Auth::user();

//     // Cari data kepemilikan dulu
//     $data = databgkepemilikan::find($kepemilikanId);
//     // $datakembali = databgkepemilikan::all();

//     // Kalau tidak ketemu, bisa langsung kasih data kosong
//     if (!$data) {
//         return view('backend.02_pendataanbangunangedung.02_datatanah.01_databgtanah', [
//             'title' => 'Informasi Data Status Hak Tanah Bangunan Gedung',
//             'title_halaman' => 'Data Pemilik',
//             'user' => $user,
//             'data' => null,
//             'subdatapemilik' => collect([]),
//             'start' => 0,
//         ]);
//     }

//     // Ambil data tanah berdasarkan foreign key databgkepemilikan_id
//     $subdatapemilik = databgtanah::where('databgkepemilikan_id', $kepemilikanId)->paginate(15);

//     $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

//     return view('backend.02_pendataanbangunangedung.02_datatanah.01_databgtanah', [
//         'title' => 'Informasi Data Status Hak Tanah Bangunan Gedung',
//         'title_halaman' => 'Data Pemilik',
//         'user' => $user,
//         'data' => $data,
//         // 'datakembali' => $datakembali,
//         'subdatapemilik' => $subdatapemilik,
//         'start' => $start,
//     ]);
// }

public function bedatabgprofiltanah($kepemilikanId)
{
    // Cari data kepemilikan dulu
    $databgkepemilikan = databgkepemilikan::find($kepemilikanId);

    // Kalau tidak ada kepemilikan, tetap buat object kosong biar link tambah data tetap ada
    if (!$databgkepemilikan) {
        $databgkepemilikan = new databgkepemilikan();
        $databgkepemilikan->id = $kepemilikanId;
    }

    // Ambil data tanah berdasarkan parent
    $subdatapemilik = databgtanah::where('databgkepemilikan_id', $kepemilikanId)
                        ->paginate(10); // bisa atur perPage sesuai kebutuhan

    // Hitung nomor urut mulai
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Ambil user login
    $user = Auth::user();

    return view('backend.02_pendataanbangunangedung.02_datatanah.01_databgtanah', [
        'title' => 'Informasi Data Status Hak Tanah Bangunan Gedung',
        'title_halaman' => 'Data Pemilik',
        'user' => $user,
        'data' => $databgkepemilikan, // ini parent
        'subdatapemilik' => $subdatapemilik, // ini child
        'start' => $start,
    ]);
}


public function bedatabgprofiltanahupdate($id)
{
    // Cari data kepemilikan
    $databgkepemilikan = databgkepemilikan::findOrFail($id);

    // Cari data tanah berdasarkan parent id
    $datatanah = databgtanah::where('databgkepemilikan_id', $id)->first();

    if (!$datatanah) {
        return abort(404, 'Data tanah tidak ditemukan');
    }

    return view('backend.02_pendataanbangunangedung.02_datatanah.02_updatedatatanahbg', [
        'title' => 'Perbaikan Status Data Tanah',
        'data' => $databgkepemilikan, // parent
        'databangunan' => $datatanah, // child
        'user' => Auth::user(),
    ]);
}


public function bedatabgprofiltanahupdatenew(Request $request, $id)
{
    $validated = $request->validate([
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

    // Ambil data child berdasarkan ID
    $pemilik = databgtanah::findOrFail($id);

    // Update data child
    $pemilik->update([
        'statushaktanah'   => $validated['statushaktanah'],
        'statuskepemilikan'=> $validated['statuskepemilikan'],
        'nobuktikepemilikan'=> $validated['nobuktikepemilikan'],
        'alamattanah'      => $validated['alamattanah'],
    ]);

    // Ambil id parent dari child
    $parentId = $pemilik->databgkepemilikan_id;

    // Feedback
    session()->flash('update', 'Data kepemilikan tanah berhasil diperbarui!');
    return redirect()->route('bebangunangedunginformasi', $parentId);
}

// perbaruan
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
    // Validasi input
    $validated = $request->validate([
        'databgkepemilikan_id' => 'required|string',
        'statushaktanah' => 'required|string|max:100',
        'statuskepemilikan' => 'required|string|max:100',
        'nobuktikepemilikan' => 'required|string|max:100',
        'alamattanah' => 'required|string|max:255',
    ], [
        'databgkepemilikan_id.required' => 'ID Kepemilikan wajib diisi.',
        'databgkepemilikan_id.exists' => 'Data kepemilikan tidak ditemukan.',
    ]);

    // Simpan data ke tabel databgtanah
    databgtanah::create([
        'databgkepemilikan_id' => $validated['databgkepemilikan_id'],
        'statushaktanah' => $validated['statushaktanah'] ?? null,
        'statuskepemilikan' => $validated['statuskepemilikan'] ?? null,
        'nobuktikepemilikan' => $validated['nobuktikepemilikan'] ?? null,
        'alamattanah' => $validated['alamattanah'] ?? null,
    ]);

    // Flash message
    session()->flash('create', 'Data tanah berhasil ditambahkan!');

    // Redirect ke route bedatabgprofiltanah sesuai route parameter
    return redirect()->route('bedatabgprofiltanah', [
        'kepemilikanId' => $validated['databgkepemilikan_id']
    ]);
}


public function bedatabgprofilbangunan($kepemilikanId)
{
    // Cari data kepemilikan dulu
    $databgkepemilikan = databgkepemilikan::find($kepemilikanId);

    // Kalau tidak ada kepemilikan, tetap buat object kosong biar link tambah data tetap ada
    if (!$databgkepemilikan) {
        $databgkepemilikan = new databgkepemilikan();
        $databgkepemilikan->id = $kepemilikanId;
    }

    // Ambil data profil bangunan berdasarkan parent
    $subdatapemilik = databgpeprofilbangunangedung::where('databgkepemilikan_id', $kepemilikanId)
                        ->paginate(15);

    // Hitung nomor urut mulai
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Ambil user login
    $user = Auth::user();

    // Kirim data ke view
    return view('backend.02_pendataanbangunangedung.03_profilbangunangedung.01_dataprofilbangunan', [
        'title' => 'Informasi Data Profil Bangunan Gedung',
        'title_halaman' => 'Informasi Data Profil Bangunan Gedung',
        'user' => $user,
        'data' => $databgkepemilikan, // ini parent
        'subdatapemilik' => $subdatapemilik, // ini child
        'start' => $start,
    ]);
}



public function bedatabgprofilbangunanupdate($id)
{
    // Cari data kepemilikan (parent)
    $databgkepemilikan = databgkepemilikan::findOrFail($id);

    // Cari data profil bangunan berdasarkan parent id
    $dataprofilbangunan = databgpeprofilbangunangedung::where('databgkepemilikan_id', $id)->first();

    if (!$dataprofilbangunan) {
        return abort(404, 'Data profil bangunan tidak ditemukan');
    }

    // Kirim data ke view
    return view('backend.02_pendataanbangunangedung.03_profilbangunangedung.02_updateprofilbangunan', [
        'title' => 'Perbaikan Data Profil Bangunan Gedung',
        'data' => $databgkepemilikan,        // parent
        'databangunan' => $dataprofilbangunan, // child
        'user' => Auth::user(),
    ]);
}
public function bedatabgprofilbangunanupdatenew(Request $request, $id)
{
    $validated = $request->validate([
        // 'databgkepemilikan_id' => 'nullable|integer',
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
    ]);

    // Ambil data bangunan berdasarkan ID
    $bangunan = databgpeprofilbangunangedung::findOrFail($id);

    // Update data
    $bangunan->update([
        // 'databgkepemilikan_id' => $validated['databgkepemilikan_id'] ?? $bangunan->databgkepemilikan_id,
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

    // Ambil parent ID untuk redirect
    $parentId = $bangunan->databgkepemilikan_id;

    // Feedback
    session()->flash('update', 'Data profil bangunan berhasil diperbarui!');

    // Redirect ke route bedatabgprofilbangunan dengan parent ID
    return redirect()->route('bedatabgprofilbangunan', ['kepemilikanId' => $parentId]);
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
        'databgkepemilikan_id' => 'required|string',

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

    // Redirect ke route bedatabgprofilbangunan dengan parameter kepemilikanId
    return redirect()->route('bedatabgprofilbangunan', ['kepemilikanId' => $validated['databgkepemilikan_id']]);
}


public function bedatabgklasifikasi($kepemilikanId)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data kepemilikan dulu
    $data = databgkepemilikan::find($kepemilikanId);

    // Kalau tidak ada kepemilikan, tetap buat object kosong biar link tambah data tetap ada
    if (!$data) {
        $data = new databgkepemilikan();
        $data->id = $kepemilikanId;
    }

    // Ambil data klasifikasi berdasarkan parent
    $subdatapemilik = databgklasifikasi::where('databgkepemilikan_id', $kepemilikanId)
                        ->paginate(15);

    // Hitung nomor urut mulai
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Kirim data ke view
    return view('backend.02_pendataanbangunangedung.04_klasfikasi.01_dataklasifikasi', [
        'title' => 'Informasi Data Klasifikasi Bangunan Gedung',
        'title_halaman' => 'Informasi Data Klasifikasi Bangunan Gedung',
        'user' => $user,
        'data' => $data, // ini parent
        'subdatapemilik' => $subdatapemilik, // ini child
        'start' => $start,
    ]);
}

public function bedatabgklasifikasiupdate($id)
{
    // Cari data kepemilikan (parent)
    $databgkepemilikan = databgkepemilikan::findOrFail($id);

    // Cari data klasifikasi berdasarkan parent id
    $dataklasifikasi = databgklasifikasi::where('databgkepemilikan_id', $id)->first();

    if (!$dataklasifikasi) {
        return abort(404, 'Data klasifikasi bangunan tidak ditemukan');
    }

    // Kirim data ke view
    return view('backend.02_pendataanbangunangedung.04_klasfikasi.02_updateklasifikasi', [
        'title' => 'Perbaikan Data Klasifikasi Bangunan Gedung',
        'data' => $databgkepemilikan,   // parent
        'databangunan' => $dataklasifikasi, // child
        'user' => Auth::user(),
    ]);
}


// public function bedatabgklasifikasiupdatenew(Request $request, $id)
// {
//     $validated = $request->validate([
//         // 'databgkepemilikan_id' => 'nullable|string',
//         'tingkat_kompleksitas' => 'nullable|string|max:255',
//         'tingkat_permanensi' => 'nullable|string|max:255',
//         'resiko_kebakaran' => 'nullable|string|max:255',
//         'resiko_gempa' => 'nullable|string|max:255',
//         'kepadatan_lokasi' => 'nullable|string|max:255',
//     ], [
//         'tingkat_kompleksitas.max' => 'Maksimal 255 karakter.',
//         'tingkat_permanensi.max' => 'Maksimal 255 karakter.',
//         'resiko_kebakaran.max' => 'Maksimal 255 karakter.',
//         'resiko_gempa.max' => 'Maksimal 255 karakter.',
//         'kepadatan_lokasi.max' => 'Maksimal 255 karakter.',
//     ]);

//     // Ambil data berdasarkan ID
//     $klasifikasi = databgklasifikasi::findOrFail($id);

//     // Update data
//     $klasifikasi->update([
//         // 'databgkepemilikan_id' => $validated['databgkepemilikan_id'] ?? null,
//         'tingkat_kompleksitas' => $validated['tingkat_kompleksitas'] ?? null,
//         'tingkat_permanensi' => $validated['tingkat_permanensi'] ?? null,
//         'resiko_kebakaran' => $validated['resiko_kebakaran'] ?? null,
//         'resiko_gempa' => $validated['resiko_gempa'] ?? null,
//         'kepadatan_lokasi' => $validated['kepadatan_lokasi'] ?? null,
//     ]);

//     // Feedback
//     session()->flash('update', 'Data klasifikasi bangunan berhasil diperbarui!');
//     return redirect()->back();
// }

public function bedatabgklasifikasiupdatenew(Request $request, $id)
{
    $validated = $request->validate([
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

    // Ambil data klasifikasi
    $klasifikasi = databgklasifikasi::findOrFail($id);

    // Update data
    $klasifikasi->update([
        'tingkat_kompleksitas' => $validated['tingkat_kompleksitas'] ?? null,
        'tingkat_permanensi'   => $validated['tingkat_permanensi'] ?? null,
        'resiko_kebakaran'     => $validated['resiko_kebakaran'] ?? null,
        'resiko_gempa'         => $validated['resiko_gempa'] ?? null,
        'kepadatan_lokasi'     => $validated['kepadatan_lokasi'] ?? null,
    ]);

    // Redirect ke halaman klasifikasi sesuai parent ID
    session()->flash('update', 'Data klasifikasi bangunan berhasil diperbarui!');
    return redirect()->route('bedatabgklasifikasi', ['kepemilikanId' => $klasifikasi->databgkepemilikan_id]);
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
    // Validasi input
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

    // Simpan data ke tabel databgklasifikasi
    databgklasifikasi::create([
        'databgkepemilikan_id' => $validated['databgkepemilikan_id'],
        'tingkat_kompleksitas' => $validated['tingkat_kompleksitas'] ?? null,
        'tingkat_permanensi' => $validated['tingkat_permanensi'] ?? null,
        'resiko_kebakaran' => $validated['resiko_kebakaran'] ?? null,
        'resiko_gempa' => $validated['resiko_gempa'] ?? null,
        'kepadatan_lokasi' => $validated['kepadatan_lokasi'] ?? null,
    ]);

    // Flash message
    session()->flash('create', 'Data klasifikasi bangunan berhasil ditambahkan!');

    // Redirect ke route bedatabgklasifikasi dengan parameter kepemilikanId
    return redirect()->route('bedatabgklasifikasi', [
        'kepemilikanId' => $validated['databgkepemilikan_id']
    ]);
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

    // Cari data kepemilikan dulu
    $data = databgkepemilikan::find($id);

    // Kalau tidak ada kepemilikan, buat object kosong biar link tambah data tetap ada
    if (!$data) {
        $data = new databgkepemilikan();
        $data->id = $id;
    }

    // Ambil data status bangunan berdasarkan parent
    $subdatapemilik = databgstatus::where('databgkepemilikan_id', $id)
                        ->paginate(15);

    // Hitung nomor urut mulai untuk paginasi
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Kirim data ke view
    return view('backend.02_pendataanbangunangedung.06_statusbangunan.01_datastatusbangunan', [
        'title' => 'Informasi Data Status Bangunan Gedung',
        'title_halaman' => 'Informasi Data Status Bangunan Gedung',
        'user' => $user,
        'data' => $data,             // parent
        'subdatapemilik' => $subdatapemilik, // child
        'start' => $start,
    ]);
}

public function bedatabgstatusbangunanupdate($id)
{
    // Cari data kepemilikan (parent)
    $databgkepemilikan = databgkepemilikan::findOrFail($id);

    // Cari data status bangunan berdasarkan parent id
    $datastatus = databgstatus::where('databgkepemilikan_id', $id)->first();

    if (!$datastatus) {
        return abort(404, 'Data status bangunan gedung tidak ditemukan');
    }

    // Kirim data ke view form update status bangunan
    return view('backend.02_pendataanbangunangedung.06_statusbangunan.02_updatestatusbangunan', [
        'title' => 'Perbaikan Data Status Bangunan Gedung',
        'data' => $databgkepemilikan, // parent
        'datastatus' => $datastatus,  // child
        'user' => Auth::user(),
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
        'databgkepemilikan_id' => $validated['databgkepemilikan_id'] ?? $klasifikasi->databgkepemilikan_id,
        'dokumen_teknis_tanah' => $validated['dokumen_teknis_tanah'] ?? null,
        'no_hdno' => $validated['no_hdno'] ?? null,
        'no_imbpbg' => $validated['no_imbpbg'] ?? null,
        'no_slf' => $validated['no_slf'] ?? null,
    ]);

    session()->flash('update', 'Data berhasil diperbarui!');
    return redirect()->route('bedatabgstatusbangunan', [
        'kepemilikanId' => $klasifikasi->databgkepemilikan_id
    ]);
}



public function datanewpendataanbg(Request $request)
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
        return view('backend.02_pendataanbangunangedung.01_databaseutama.00_dataindukpendataanbg', [
            'title' => 'Buat Data Baru Pendataan Bangunan Gedung',
            'user' => $user,
            'datakelurahan' => $datakelurahan,
        'kecamatanList' => $kecamatanList
    ]);
}

public function datanewpendataanbgnew(Request $request)
{
    // Validasi input, sesuaikan sesuai kebutuhan
    $validated = $request->validate([
        'user_id' => 'nullable|string',
        'tanggalinput' => 'nullable|string|max:255',
        'namainstitusi' => 'nullable|string|max:255',
        'nopengesahanusaha' => 'nullable|string|max:255',
        'notelepon' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',

        'kecamatanblora_id' => 'required|string',
        'alamat' => 'nullable|string',
        'koordinat' => 'required|string|max:255',

        // file gambar opsional, tapi jika ada wajib berupa gambar dan max 5MB
        'tampakdepan' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:15120',
        'tampakbelakang' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:15120',
        'tampaksamping1' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:15120',
        'tampaksamping2' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:15120',
    ], [
        // Pesan error kustom
        'user_id.exists' => 'User tidak valid.',
        'email.email' => 'Format email tidak valid.',
        'kecamatanblora_id.exists' => 'Kecamatan tidak ditemukan.',
        'tampakdepan.image' => 'File tampak depan harus berupa gambar.',
        'tampakbelakang.image' => 'File tampak belakang harus berupa gambar.',
        'tampaksamping1.image' => 'File tampak samping 1 harus berupa gambar.',
        'tampaksamping2.image' => 'File tampak samping 2 harus berupa gambar.',
        'tampakdepan.max' => 'File tampak depan maksimal 5MB.',
        'tampakbelakang.max' => 'File tampak belakang maksimal 5MB.',
        'tampaksamping1.max' => 'File tampak samping 1 maksimal 5MB.',
        'tampaksamping2.max' => 'File tampak samping 2 maksimal 5MB.',
    ]);

    // Folder penyimpanan file
    $uploadPath = public_path('02_pendataan');

    // Buat folder jika belum ada
    if (!file_exists($uploadPath)) {
        mkdir($uploadPath, 0755, true);
    }

    // Fungsi helper simpan file jika ada
    $saveFile = function($file, $prefix) use ($uploadPath) {
        $filename = $prefix . '_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move($uploadPath, $filename);
        return '02_pendataan/' . $filename;
    };

    // Simpan file jika ada
    $tampakdepan = $request->hasFile('tampakdepan') ? $saveFile($request->file('tampakdepan'), 'tampakdepan') : null;
    $tampakbelakang = $request->hasFile('tampakbelakang') ? $saveFile($request->file('tampakbelakang'), 'tampakbelakang') : null;
    $tampaksamping1 = $request->hasFile('tampaksamping1') ? $saveFile($request->file('tampaksamping1'), 'tampaksamping1') : null;
    $tampaksamping2 = $request->hasFile('tampaksamping2') ? $saveFile($request->file('tampaksamping2'), 'tampaksamping2') : null;

    // Simpan data ke database
    databgkepemilikan::create([
        'user_id' => $validated['user_id'] ?? null,
        'tanggalinput' => $validated['tanggalinput'] ?? null,
        'namainstitusi' => $validated['namainstitusi'] ?? null,
        'nopengesahanusaha' => $validated['nopengesahanusaha'] ?? null,
        'notelepon' => $validated['notelepon'] ?? null,
        'email' => $validated['email'] ?? null,

        'kecamatanblora_id' => $validated['kecamatanblora_id'] ?? null,
        'alamat' => $validated['alamat'] ?? null,
        'koordinat' => $validated['koordinat'] ?? null,

        'tampakdepan' => $tampakdepan,
        'tampakbelakang' => $tampakbelakang,
        'tampaksamping1' => $tampaksamping1,
        'tampaksamping2' => $tampaksamping2,
    ]);

    session()->flash('create', 'Data Bangunan Baru disimpan!');
    return redirect()->route('bependataanbangunangedung');
}


public function bedatabgstatuscreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = databgkepemilikan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.02_pendataanbangunangedung.06_statusbangunan.03_tambahstatusbangunan', [
        'title' => 'Tambah Data Informasi Status Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bedatabgstatuscreatenew(Request $request)
{
    $validated = $request->validate([
        'databgkepemilikan_id' => 'required|string',
        'dokumen_teknis_tanah' => 'nullable|string|max:255',
        'no_hdno' => 'nullable|string|max:255',
        'no_imbpbg' => 'nullable|string|max:255',
        'no_slf' => 'nullable|string|max:255',
    ], [
        'databgkepemilikan_id.required' => 'ID Kepemilikan wajib diisi.',
        'databgkepemilikan_id.exists' => 'Data kepemilikan tidak ditemukan.',
    ]);

    databgstatus::create([
        'databgkepemilikan_id' => $validated['databgkepemilikan_id'],
        'dokumen_teknis_tanah' => $validated['dokumen_teknis_tanah'] ?? null,
        'no_hdno' => $validated['no_hdno'] ?? null,
        'no_imbpbg' => $validated['no_imbpbg'] ?? null,
        'no_slf' => $validated['no_slf'] ?? null,
    ]);

    // session()->flash('create', 'Data Status Bangunan Gedung berhasil ditambahkan!');
    // return redirect()->route('bedatabgstatusbangunan', ['id' => $validated['databgkepemilikan_id']]);

    session()->flash('create', 'Data Status Bangunan Gedung berhasil ditambahkan!');
return redirect()->route('bedatabgstatusbangunan', ['kepemilikanId' => $validated['databgkepemilikan_id']]);

}



// public function bedatakic(Request $request)
// {
//     $user = Auth::user();
//     $perPage = $request->input('perPage', 20);
//     $jumlahDataTotal = kicinduk::count();


//     // Ambil jumlah data unik berdasarkan namainstitusi dan hitung jumlahnya
//     // $jumlahPerInstitusi = kicinduk::select('namainstitusi', DB::raw('count(*) as total'))
//     // ->groupBy('namainstitusi')
//     // ->orderByDesc('total')
//     // ->get();

//     return view('backend.02_pendataanbangunangedung.07_datakic.01_datakic', [
//         'title' => 'Pendataan KIC Bangunan Gedung',
//         'user' => $user,
//         'jumlahDataTotal' => $jumlahDataTotal,
//         // 'jumlahPerInstitusi' => $jumlahPerInstitusi
//     ]);
// }

public function bedatabangunankic(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 50);

    // Tambahkan eager loading untuk relasi
    $query = kicinduk::query()
        ->with(['satuankerja', 'kicdokumen'])
        ->orderBy('created_at', 'desc');

    // Filter pencarian
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->orWhere('kodelokasi', 'like', "%{$search}%")
              ->orWhere('bidang', 'like', "%{$search}%")
              ->orWhere('subbidang', 'like', "%{$search}%")
              ->orWhereHas('satuankerja', function ($sub) use ($search) {
                  $sub->where('satuankerja', 'like', "%{$search}%");
              });
        });
    }

    // Paginate hasil query
    $berkasbantek = $query->paginate($perPage)->appends($request->all());

    // Hitung total jumlah KicDokumen
    $jumlahkic = kicdokumen::count();

    // Kirim data ke view
    return view('backend.02_pendataanbangunangedung.07_datakic.01_datakickabblora', [
        'title'      => 'Pendataan KIC Bangunan Gedung Kabupaten Blora',
        'data'       => $berkasbantek,
        'user'       => $user,
        'jumlahkic'  => $jumlahkic, // kirim jumlah dokumen
    ]);
}


public function bedatabangunankicdelete($id)
{
    // Cari item berdasarkan judul
    $entry = kicinduk::where('id', $id)->first();

    if ($entry) {
        // Jika ada file header yang terdaftar, hapus dari storage
        // if (Storage::disk('public')->exists($entry->header)) {
            //     Storage::disk('public')->delete($entry->header);
            // }

            // Hapus entri dari database
            $entry->delete();

            // Redirect atau memberi respons sesuai kebutuhan
            return redirect('/bedatabangunankic')->with('delete', 'Data Berhasil Di Hapus !');

        }

        return redirect()->back()->with('error', 'Item not found');
    }

    public function bedatabangunankicshow($id)
{
    $user = Auth::user();

    // Ambil data induk berdasarkan ID
    $subdatapemilik = kicinduk::findOrFail($id);

    // Ambil data dokumen terkait, urutkan berdasarkan waktu dibuat paling baru
    $data = kicdokumen::where('kicinduk_id', $subdatapemilik->id)
        ->latest() // sama dengan ->orderBy('created_at', 'desc')
        ->paginate(25);

    // Nomor urut untuk pagination
    $start = ($data->currentPage() - 1) * $data->perPage() + 1;

    return view('backend.02_pendataanbangunangedung.07_datakic.02_alldatakickabblora', [
        'title' => 'Informasi Data KIC Bangunan Gedung Kabupaten Blora',
        'title_halaman' => 'Informasi Data KIC Bangunan Gedung Kabupaten Blora',
        'user' => $user,
        'data' => $data,
        'subdatapemilik' => $subdatapemilik,
        'start' => $start,
    ]);
}

public function bedatabangudokkicdelete($id)
{
    // Cari item berdasarkan ID
    $entry = kicdokumen::find($id);

    if ($entry) {
        // Jika ingin hapus file dari storage, aktifkan bagian ini:
        // if (Storage::disk('public')->exists($entry->header)) {
        //     Storage::disk('public')->delete($entry->header);
        // }

        // Hapus entri dari database
        $entry->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('delete', 'Data Berhasil Di Hapus !');
    }

    // Jika data tidak ditemukan, kembali dengan pesan error
    return redirect()->back()->with('error', 'Item tidak ditemukan.');
}


public function datanewkic(Request $request)
{
    // Ambil user login
    $user = Auth::user();
    $satuankerja = satuankerja::all();
    $kecamatanList = kecamatanblora::all();
        $datakelurahan = kelurahandesa::all(); // Bisa kamu kosongkan kalau mau preload dinamis pakai JS

        if ($request->ajax() && $request->has('kecamatan_id')) {
            $desa = kelurahandesa::where('kecamatanblora_id', $request->kecamatan_id)->get();
            return response()->json($desa);
        }


        // Kirim data ke view tanpa ambil dari database bantuanhibahbg
        return view('backend.02_pendataanbangunangedung.07_datakic.03_buatdatakic', [
            'title' => 'Buat Data KIC Pendataan Bangunan Gedung',
            'user' => $user,
            'satuankerja' => $satuankerja,
            'datakelurahan' => $datakelurahan,
        'kecamatanList' => $kecamatanList
    ]);
}


public function datanewkicnew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'user_id' => 'nullable|string',
        'satuankerja_id' => 'nullable|string',
        'kodelokasi' => 'nullable|string|max:255',
        'bidang' => 'nullable|string|max:255',
        'subbidang' => 'nullable|string|max:255',
        'tanggalinput' => 'nullable|date',
    ], [
        'user_id.exists' => 'User tidak valid.',
        'satuankerja_id.exists' => 'Satuan kerja tidak valid.',
        'tanggalinput.date' => 'Format tanggal tidak valid.',
    ]);

    // Simpan data ke database
    kicinduk::create([
        'user_id' => $validated['user_id'] ?? null,
        'satuankerja_id' => $validated['satuankerja_id'] ?? null,
        'kodelokasi' => $validated['kodelokasi'] ?? null,
        'bidang' => $validated['bidang'] ?? null,
        'subbidang' => $validated['subbidang'] ?? null,
        'tanggalinput' => $validated['tanggalinput'] ?? now(),
    ]);

    session()->flash('create', 'Data KIC baru berhasil disimpan!');
    return redirect()->route('bedatabangunankic');
}


public function datanewkicdokumen(Request $request, $id)
{
    $user = Auth::user();
    $satuankerja = satuankerja::all();
    $kecamatanList = kecamatanblora::all();
    $datakelurahan = kelurahandesa::all();

    // Jika request ajax (misalnya untuk dynamic dropdown kelurahan)
    if ($request->ajax() && $request->has('kecamatan_id')) {
        $desa = kelurahandesa::where('kecamatanblora_id', $request->kecamatan_id)->get();
        return response()->json($desa);
    }

    // Kirim ID ke view agar bisa digunakan di form (misal hidden input)
    return view('backend.02_pendataanbangunangedung.07_datakic.04_buatdatakicdokumen', [
        'title' => 'Buat Data KIC Dokumen Pendataan Bangunan Gedung',
        'user' => $user,
        'satuankerja' => $satuankerja,
        'datakelurahan' => $datakelurahan,
        'kecamatanList' => $kecamatanList,
        'kicinduk_id' => $id, // <== ini penting
    ]);
}
public function datanewkicdokumennew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'kicinduk_id'       => 'required|string',
        'jenisbarang'       => 'nullable|string|max:255',
        'kodebarang'        => 'nullable|string|max:255',
        'register'          => 'nullable|string|max:255',
        'kondisibangunan'   => 'nullable|in:Baik,Tidak Baik',
        'bertingkat'        => 'nullable|in:Ya,Tidak',
        'beton'             => 'nullable|in:Ya,Tidak',
        'luaslantai'        => 'nullable|numeric',
        'alamat'            => 'nullable|string|max:500',

        // Tambahan
        'tanggal'           => 'nullable|date',
        'nomor'             => 'nullable|string|max:255',
        'luas'              => 'nullable|string|max:255',
        'status_tanah'      => 'nullable|string|max:255',
        'nomor_kode_tanah'  => 'nullable|string|max:255',
        'asal_usul'         => 'nullable|string|string',
        'harga'             => 'nullable|string|max:255',
        'keterangan'        => 'nullable|string',
        'nosertifikat'      => 'nullable|string|max:255',
    ], [
        'kicinduk_id.required'    => 'ID KIC induk wajib diisi.',
        'kicinduk_id.exists'      => 'KIC induk tidak valid.',
        'kondisibangunan.in'      => 'Pilih antara Baik atau Tidak Baik.',
        'bertingkat.in'           => 'Pilih antara Ya atau Tidak.',
        'beton.in'                => 'Pilih antara Ya atau Tidak.',
        'luaslantai.numeric'      => 'Luas lantai harus berupa angka.',
        'asal_usul.in'            => 'Pilih antara Pembelian, Inventaris, Mutasi, atau Hibah.',
    ]);

    // Simpan ke database
    $kicDokumen = kicdokumen::create($validated);

    // Redirect ke halaman detail
    return redirect()
        ->route('bedatabangunankicshow', ['id' => $kicDokumen->kicinduk_id])
        ->with('create', 'Data dokumen KIC berhasil disimpan!');
}


   public function bedatakicstruktur($id)
{
    // Cari data berdasarkan ID
    $data = kicdokumen::findOrFail($id);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Tampilkan ke view dengan key-value
    return view('backend.02_pendataanbangunangedung.07_datakic.05_kicdatastruktur', [
        'title' => 'Informasi Struktur Bangunan Gedung Kabupaten Blora',
        'data' => $data,
        'user' => $user
    ]);
}


public function pendataankicbangunangedungshow(Request $request, $id)
{
    $user = Auth::user();
    $perPage = $request->input('perPage', 25);
    $search = $request->input('search');

    // Ambil data induk berdasarkan ID
    $subdatapemilik = kicinduk::findOrFail($id);

    // Query untuk ambil data kicdokumen berdasarkan induk
    $query = kicdokumen::where('kicinduk_id', $subdatapemilik->id)
        ->orderBy('created_at', 'desc');

    // Pencarian berdasarkan field-field dari tabel kicdokumen
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('jenisbarang', 'LIKE', "%{$search}%")
              ->orWhere('kodebarang', 'LIKE', "%{$search}%")
              ->orWhere('register', 'LIKE', "%{$search}%")
              ->orWhere('kondisibangunan', 'LIKE', "%{$search}%")
              ->orWhere('bertingkat', 'LIKE', "%{$search}%")
              ->orWhere('beton', 'LIKE', "%{$search}%")
              ->orWhere('luaslantai', 'LIKE', "%{$search}%")
              ->orWhere('alamat', 'LIKE', "%{$search}%")
              ->orWhere('tanggal', 'LIKE', "%{$search}%")
              ->orWhere('nomor', 'LIKE', "%{$search}%")
              ->orWhere('luas', 'LIKE', "%{$search}%")
              ->orWhere('status_tanah', 'LIKE', "%{$search}%")
              ->orWhere('nomor_kode_tanah', 'LIKE', "%{$search}%")
              ->orWhere('asal_usul', 'LIKE', "%{$search}%")
              ->orWhere('harga', 'LIKE', "%{$search}%")
              ->orWhere('keterangan', 'LIKE', "%{$search}%")
              ->orWhere('nosertifikat', 'LIKE', "%{$search}%");
        });
    }

    // Pagination hasil
    $data = $query->paginate($perPage);
    $start = ($data->currentPage() - 1) * $data->perPage() + 1;

    if ($request->ajax()) {
        return response()->json([
            'html' => view('backend.02_pendataanbangunangedung.07_datakic.partials.table', compact('data'))->render(),
            'start' => $start
        ]);
    }

    return view('frontend.abgblora.03_pendataanbangunangedung.02_kicbangunangedung.show', [
        'title' => 'Informasi Data KIC Bangunan Gedung Kabupaten Blora',
        'title_halaman' => 'Informasi Data KIC Bangunan Gedung Kabupaten Blora',
        'user' => $user,
        'data' => $data,
        'subdatapemilik' => $subdatapemilik,
        'start' => $start,
        'search' => $search,
        'perPage' => $perPage
    ]);
}

public function bembrpengkajiteknis(Request $request)
{
    $perPage = $request->input('perPage', 15);
    $search = $request->input('search');

    $query = pengkajiteknis::query()
        ->orderBy('created_at', 'desc');

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('namabadanusaha', 'LIKE', "%{$search}%")
              ->orWhere('alamat', 'LIKE', "%{$search}%")
              ->orWhere('telepon', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%")
              ->orWhere('direktur', 'LIKE', "%{$search}%")
              ->orWhere('subklasifikasi', 'LIKE', "%{$search}%")
              ->orWhere('pengalaman', 'LIKE', "%{$search}%");
        });
    }

    $data = $query->paginate($perPage);
    $jumlahkic = pengkajiteknis::count(); // jumlah total data

    if ($request->ajax()) {
        return response()->json([
            'html' => view('frontend.abgblora.07_mbr.02_pengkajiteknis.partials.table', compact('data'))->render(),
            'jumlahkic' => $jumlahkic
        ]);
    }

    return view('frontend.abgblora.07_mbr.02_pengkajiteknis.01_daftarpengkaji', [
        'title' => 'Data Konsultan Pengkaji Teknis',
        'data' => $data,
        'perPage' => $perPage,
        'search' => $search,
        'jumlahkic' => $jumlahkic
    ]);
}


// public function bedatabgdokumen($id)
// {
//     // Ambil user login
//     $user = Auth::user();

//     // Cari data pbg berdasarkan ID
//     $data = databgkepemilikan::findOrFail($id);

//     // Ambil data datapemilik berdasarkan foreign key pbgslfbangunan_id
//     $subdatapemilik = databgintensitasbangunan::where('databgkepemilikan_id', $data->id)->paginate(15);

//     // Hitung nomor urut mulai untuk paginasi
//     $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

//     // Ambil data jenis pengajuan
//     // $datapbgslf = jenispengajuanpbgslfper::all();

//     // Kirim data ke view
//     return view('backend.02_pendataanbangunangedung.05_dokumen.01_datadokumen', [
//         'title' => 'Informasi Data Dokumen Bangunan Gedung',
//         'title_halaman' => 'Informasi Data Dokumen Bangunan Gedung',
//         'user' => $user,
//         'data' => $data,
//         // 'datapbgslf' => $datapbgslf,
//         'subdatapemilik' => $subdatapemilik,
//         'start' => $start,
//     ]);
// }


public function bedatabgdokumen($kepemilikanId)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data kepemilikan dulu
    $data = databgkepemilikan::find($kepemilikanId);

    // Kalau tidak ada kepemilikan, buat object kosong biar link tambah data tetap ada
    if (!$data) {
        $data = new databgkepemilikan();
        $data->id = $kepemilikanId;
    }

    // Ambil data dokumen berdasarkan parent
    $subdatapemilik = databgintensitasbangunan::where('databgkepemilikan_id', $kepemilikanId)
                        ->paginate(15);

    // Hitung nomor urut mulai untuk paginasi
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Kirim data ke view
    return view('backend.02_pendataanbangunangedung.05_dokumen.01_datadokumen', [
        'title' => 'Informasi Data Dokumen Bangunan Gedung',
        'title_halaman' => 'Informasi Data Dokumen Bangunan Gedung',
        'user' => $user,
        'data' => $data,            // ini parent
        'subdatapemilik' => $subdatapemilik, // ini child
        'start' => $start,
    ]);
}

public function bedatabgdokumencreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = databgkepemilikan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.02_pendataanbangunangedung.05_dokumen.02_tambahdokumebangunangedung', [
        'title' => 'Tambah Data Informasi Dokumen Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bedatabgdokumencreatenew(Request $request)
{
    $validated = $request->validate([
        'databgkepemilikan_id' => 'required|string',

        'nilaibgdidirikan' => 'nullable|string',
        'nilaibgsaatini' => 'nullable|string',
        'koefisien_dasar_bangunan' => 'nullable|string',
        'koefisien_lantai_bangunan' => 'nullable|string',
        'koefisien_daerah_hijau' => 'nullable|string',
        'koefisien_tapak_basement' => 'nullable|string',
        'garis_sempadan_bangunan' => 'nullable|string',

        'gambar_teknis_rencana' => 'nullable|string',
        'gambar_sesuai_pelaksana' => 'nullable|string',
        'ruang_terbuka_hijau' => 'nullable|string',
        'luas_rth' => 'nullable|string',
        'dokumen_rth' => 'nullable|string',
        'limbah_b3' => 'nullable|string',
        'sistem_penampungan_pengelolaan' => 'nullable|string',
        'dokumen_lingkungan_amdal' => 'nullable|string',
        'dokumen_aksesibilitas' => 'nullable|string',
        'jenis_transportasi_bg' => 'nullable|string',
        'dokumen_transport_bg' => 'nullable|string',
        'dokumen_teknis_tanah' => 'nullable|string',
    ], [
        'databgkepemilikan_id.required' => 'ID Kepemilikan wajib diisi.',
        'databgkepemilikan_id.numeric' => 'ID Kepemilikan harus berupa angka.',
    ]);

    databgintensitasbangunan::create([
        'databgkepemilikan_id' => $validated['databgkepemilikan_id'],
        'nilaibgdidirikan' => $validated['nilaibgdidirikan'] ?? null,
        'nilaibgsaatini' => $validated['nilaibgsaatini'] ?? null,
        'koefisien_dasar_bangunan' => $validated['koefisien_dasar_bangunan'] ?? null,
        'koefisien_lantai_bangunan' => $validated['koefisien_lantai_bangunan'] ?? null,
        'koefisien_daerah_hijau' => $validated['koefisien_daerah_hijau'] ?? null,
        'koefisien_tapak_basement' => $validated['koefisien_tapak_basement'] ?? null,
        'garis_sempadan_bangunan' => $validated['garis_sempadan_bangunan'] ?? null,

        'gambar_teknis_rencana' => $validated['gambar_teknis_rencana'] ?? null,
        'gambar_sesuai_pelaksana' => $validated['gambar_sesuai_pelaksana'] ?? null,
        'ruang_terbuka_hijau' => $validated['ruang_terbuka_hijau'] ?? null,
        'luas_rth' => $validated['luas_rth'] ?? null,
        'dokumen_rth' => $validated['dokumen_rth'] ?? null,
        'limbah_b3' => $validated['limbah_b3'] ?? null,
        'sistem_penampungan_pengelolaan' => $validated['sistem_penampungan_pengelolaan'] ?? null,
        'dokumen_lingkungan_amdal' => $validated['dokumen_lingkungan_amdal'] ?? null,
        'dokumen_aksesibilitas' => $validated['dokumen_aksesibilitas'] ?? null,
        'jenis_transportasi_bg' => $validated['jenis_transportasi_bg'] ?? null,
        'dokumen_transport_bg' => $validated['dokumen_transport_bg'] ?? null,
        'dokumen_teknis_tanah' => $validated['dokumen_teknis_tanah'] ?? null,
    ]);


    session()->flash('create', 'Data dokumen bangunan gedung berhasil ditambahkan!');
    // return redirect()->route('bedatabgdokumen', ['id' => $validated['databgkepemilikan_id']]);
return redirect()->route('bedatabgdokumen', [
    'kepemilikanId' => $validated['databgkepemilikan_id']
]);

}

public function bedatabgdokumenupdate($id)
{
    // Cari data kepemilikan (parent)
    $databgkepemilikan = databgkepemilikan::findOrFail($id);

    // Cari data dokumen/intensitas bangunan berdasarkan parent id
    $datadokumen = databgintensitasbangunan::where('databgkepemilikan_id', $id)->first();

    if (!$datadokumen) {
        return abort(404, 'Data dokumen bangunan tidak ditemukan');
    }

    // Kirim data ke view form update dokumen
    return view('backend.02_pendataanbangunangedung.05_dokumen.03_updatedokumenbangunan', [
        'title' => 'Perbaikan Data Dokumen Bangunan Gedung',
        'data' => $databgkepemilikan,   // parent
        'databangunan' => $datadokumen, // child
        'user' => Auth::user(),
    ]);
}

public function bedatabgdokumenupdatenew(Request $request, $id)
{
    $validated = $request->validate([
        'nilaibgdidirikan' => 'nullable|string|max:255',
        'nilaibgsaatini' => 'nullable|string|max:255',
        'koefisien_dasar_bangunan' => 'nullable|string|max:255',
        'koefisien_lantai_bangunan' => 'nullable|string|max:255',
        'koefisien_daerah_hijau' => 'nullable|string|max:255',
        'koefisien_tapak_basement' => 'nullable|string|max:255',
        'garis_sempadan_bangunan' => 'nullable|string|max:255',
        'gambar_teknis_rencana' => 'nullable|string|max:255',
        'gambar_sesuai_pelaksana' => 'nullable|string|max:255',
        'ruang_terbuka_hijau' => 'nullable|string|max:255',
        'luas_rth' => 'nullable|string|max:255',
        'dokumen_rth' => 'nullable|string|max:255',
        'limbah_b3' => 'nullable|string|max:255',
        'sistem_penampungan_pengelolaan' => 'nullable|string|max:255',
        'dokumen_lingkungan_amdal' => 'nullable|string|max:255',
        'dokumen_aksesibilitas' => 'nullable|string|max:255',
        'jenis_transportasi_bg' => 'nullable|string|max:255',
        'dokumen_transport_bg' => 'nullable|string|max:255',
        'dokumen_teknis_tanah' => 'nullable|string|max:255',
    ], [
        '*.max' => 'Maksimal 255 karakter.',
    ]);

    // cari data intensitas
    $klasifikasi = databgintensitasbangunan::findOrFail($id);

    // update data
    $klasifikasi->update([
        'nilaibgdidirikan' => $validated['nilaibgdidirikan'] ?? null,
        'nilaibgsaatini' => $validated['nilaibgsaatini'] ?? null,
        'koefisien_dasar_bangunan' => $validated['koefisien_dasar_bangunan'] ?? null,
        'koefisien_lantai_bangunan' => $validated['koefisien_lantai_bangunan'] ?? null,
        'koefisien_daerah_hijau' => $validated['koefisien_daerah_hijau'] ?? null,
        'koefisien_tapak_basement' => $validated['koefisien_tapak_basement'] ?? null,
        'garis_sempadan_bangunan' => $validated['garis_sempadan_bangunan'] ?? null,
        'gambar_teknis_rencana' => $validated['gambar_teknis_rencana'] ?? null,
        'gambar_sesuai_pelaksana' => $validated['gambar_sesuai_pelaksana'] ?? null,
        'ruang_terbuka_hijau' => $validated['ruang_terbuka_hijau'] ?? null,
        'luas_rth' => $validated['luas_rth'] ?? null,
        'dokumen_rth' => $validated['dokumen_rth'] ?? null,
        'limbah_b3' => $validated['limbah_b3'] ?? null,
        'sistem_penampungan_pengelolaan' => $validated['sistem_penampungan_pengelolaan'] ?? null,
        'dokumen_lingkungan_amdal' => $validated['dokumen_lingkungan_amdal'] ?? null,
        'dokumen_aksesibilitas' => $validated['dokumen_aksesibilitas'] ?? null,
        'jenis_transportasi_bg' => $validated['jenis_transportasi_bg'] ?? null,
        'dokumen_transport_bg' => $validated['dokumen_transport_bg'] ?? null,
        'dokumen_teknis_tanah' => $validated['dokumen_teknis_tanah'] ?? null,
    ]);

    // ambil kepemilikan_id buat redirect
    $kepemilikanId = $klasifikasi->databgkepemilikan_id;

    session()->flash('update', 'Data dokumen bangunan berhasil diperbarui!');
    return redirect()->route('bedatabgdokumen', $kepemilikanId);
}



public function bedatabgmebangunan($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data kepemilikan dulu
    $data = databgkepemilikan::find($id);

    // Kalau tidak ada kepemilikan, buat object kosong biar link tambah data tetap ada
    if (!$data) {
        $data = new databgkepemilikan();
        $data->id = $id;
    }

    // Ambil data dokumen MEP berdasarkan parent
    $subdatapemilik = databgdokumenmepbangunan::where('databgkepemilikan_id', $id)
                        ->paginate(15);

    // Hitung nomor urut mulai untuk paginasi
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Kirim data ke view
    return view('backend.02_pendataanbangunangedung.05_mep.01_datameppendataan', [
        'title' => 'Informasi Data Dokumen MEP Bangunan Gedung',
        'title_halaman' => 'Informasi Data Dokumen MEP Bangunan Gedung',
        'user' => $user,
        'data' => $data,            // ini parent
        'subdatapemilik' => $subdatapemilik, // ini child
        'start' => $start,
    ]);
}

public function bedatabgmebangunancreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = databgkepemilikan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.02_pendataanbangunangedung.05_mep.02_tambahdatamep', [
        'title' => 'Tambah Data Informasi Dokumen MEP Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bedatabgmebangunancreatenew(Request $request)
{
    $validated = $request->validate([
        'databgkepemilikan_id' => 'required|string',

        // Lampiran dokumen
        'dokumen_lampiran_struktur' => 'nullable|string|max:100',
        'mpk_rdkt' => 'nullable|string|max:100',
        'dokumen_lampiran' => 'nullable|string|max:100',
        'penangkal_kebakaran' => 'nullable|string|max:100',
        'no_bundel_dok_teknis' => 'nullable|string|max:100',
        'daya_listrik' => 'nullable|string|max:100',
        'dokumen_instalasi_listrik' => 'nullable|string|max:100',
        'instalasi_penangkal_listrik' => 'nullable|string|max:100',
        'dokumen_pencahayaan' => 'nullable|string|max:100',
        'dokumen_instalasi_komunikasi' => 'nullable|string|max:100',
        'instalasi_komunikasi' => 'nullable|string|max:100',
        'pengolahan_limbah_domestik' => 'nullable|string|max:100',
        'sistem_sanitasi' => 'nullable|string|max:100',
        'pengolahan_air_hujan' => 'nullable|string|max:100',
        'sistem_drainase' => 'nullable|string|max:100',
        'instalasi_gas' => 'nullable|string|max:100',
        'dokumen_lampiran_sanitasi' => 'nullable|string|max:100',
        'sumber_air' => 'nullable|string|max:100',
        'biaya_retribusi' => 'nullable|string|max:100',
        'surat_advis_krk' => 'nullable|string|max:100',
        'surat_permohonan_imb' => 'nullable|string|max:100',
        'surat_permohonan_slf' => 'nullable|string|max:100',
        'fotocopy_identitas_pemohon' => 'nullable|string|max:100',

        // Ya/Tidak
        'surat_kuasa_imb' => 'nullable|string|max:100',
        'surat_k3' => 'nullable|string|max:100',
        'rekomendasi_desa' => 'nullable|string|max:100',
        'rekom_kecamatan' => 'nullable|string|max:100',
        'surat_kepemilikan_tanah_sewa' => 'nullable|string|max:100',
        'copy_sertif_tanah' => 'nullable|string|max:100',
        'surat_pajak' => 'nullable|string|max:100',
        'sippt' => 'nullable|string|max:100',
        'tabel_ceklis_dokumen' => 'nullable|string|max:100',
        'tabel_ceklis_teknis' => 'nullable|string|max:100',
        'surat_setoran_retribusi_daerah' => 'nullable|string|max:100',
        'surat_ketetapan_retribusi_daerah' => 'nullable|string|max:100',
        'berita_acara_pemeriksaan' => 'nullable|string|max:100',
    ], [
        'databgkepemilikan_id.required' => 'ID Kepemilikan wajib diisi.',
    ]);

    databgdokumenmepbangunan::create($validated);

    session()->flash('create', 'Data MEP Bangunan Gedung berhasil ditambahkan!');
    return redirect()->route('bedatabgmebangunan', ['id' => $validated['databgkepemilikan_id']]);
}

public function bedatabgmebangunanupdate($id)
{
    // Cari data kepemilikan (parent)
    $databgkepemilikan = databgkepemilikan::findOrFail($id);

    // Cari data dokumen MEP bangunan berdasarkan parent id
    $datamep = databgdokumenmepbangunan::where('databgkepemilikan_id', $id)->first();

    if (!$datamep) {
        return abort(404, 'Data dokumen MEP bangunan tidak ditemukan');
    }

    // Kirim data ke view form update dokumen MEP
    return view('backend.02_pendataanbangunangedung.05_mep.03_updatemepdokumen', [
        'title' => 'Perbaikan Data Dokumen MEP Bangunan Gedung',
        'data' => $databgkepemilikan, // parent
        'databangunan' => $datamep,   // child
        'user' => Auth::user(),
    ]);
}

// public function bedatabgmebangunanupdatenew(Request $request, $id)
// {
//     $validated = $request->validate([
//         // 'databgkepemilikan_id' => 'nullable|integer',

//         'dokumen_lampiran_struktur' => 'nullable|string|max:255',
//         'mpk_rdkt' => 'nullable|string|max:255',
//         'dokumen_lampiran' => 'nullable|string|max:255',
//         'penangkal_kebakaran' => 'nullable|string|max:255',
//         'no_bundel_dok_teknis' => 'nullable|string|max:255',
//         'daya_listrik' => 'nullable|string|max:255',
//         'dokumen_instalasi_listrik' => 'nullable|string|max:255',
//         'instalasi_penangkal_listrik' => 'nullable|string|max:255',
//         'dokumen_pencahayaan' => 'nullable|string|max:255',
//         'dokumen_instalasi_komunikasi' => 'nullable|string|max:255',
//         'instalasi_komunikasi' => 'nullable|string|max:255',
//         'pengolahan_limbah_domestik' => 'nullable|string|max:255',
//         'sistem_sanitasi' => 'nullable|string|max:255',
//         'pengolahan_air_hujan' => 'nullable|string|max:255',
//         'sistem_drainase' => 'nullable|string|max:255',
//         'instalasi_gas' => 'nullable|string|max:255',
//         'dokumen_lampiran_sanitasi' => 'nullable|string|max:255',
//         'sumber_air' => 'nullable|string|max:255',
//         'biaya_retribusi' => 'nullable|string|max:255',
//         'surat_advis_krk' => 'nullable|string|max:255',
//         'surat_permohonan_imb' => 'nullable|string|max:255',
//         'surat_permohonan_slf' => 'nullable|string|max:255',
//         'fotocopy_identitas_pemohon' => 'nullable|string|max:255',

//         // Pilihan YA/TIDAK
//         'surat_kuasa_imb' => 'nullable|string|max:255',
//         'surat_k3' => 'nullable|string|max:255',
//         'rekomendasi_desa' => 'nullable|string|max:255',
//         'rekom_kecamatan' => 'nullable|string|max:255',
//         'surat_kepemilikan_tanah_sewa' => 'nullable|string|max:255',
//         'copy_sertif_tanah' => 'nullable|string|max:255',
//         'surat_pajak' => 'nullable|string|max:255',
//         'sippt' => 'nullable|string|max:255',
//         'tabel_ceklis_dokumen' => 'nullable|string|max:255',
//         'tabel_ceklis_teknis' => 'nullable|string|max:255',
//         'surat_setoran_retribusi_daerah' => 'nullable|string|max:255',
//         'surat_ketetapan_retribusi_daerah' => 'nullable|string|max:255',
//         'berita_acara_pemeriksaan' => 'nullable|string|max:255',
//     ], [
//         '*.max' => 'Maksimal 255 karakter.',
//         // 'databgkepemilikan_id.integer' => 'ID Kepemilikan harus berupa angka.',
//     ]);

//     $data = databgdokumenmepbangunan::findOrFail($id);

//     $data->update($validated);

//     session()->flash('update', 'Data MEP bangunan berhasil diperbarui!');
//     return redirect()->back();
// }


public function bedatabgmebangunanupdatenew(Request $request, $id)
{
    $validated = $request->validate([
        'dokumen_lampiran_struktur' => 'nullable|string|max:255',
        'mpk_rdkt' => 'nullable|string|max:255',
        'dokumen_lampiran' => 'nullable|string|max:255',
        'penangkal_kebakaran' => 'nullable|string|max:255',
        'no_bundel_dok_teknis' => 'nullable|string|max:255',
        'daya_listrik' => 'nullable|string|max:255',
        'dokumen_instalasi_listrik' => 'nullable|string|max:255',
        'instalasi_penangkal_listrik' => 'nullable|string|max:255',
        'dokumen_pencahayaan' => 'nullable|string|max:255',
        'dokumen_instalasi_komunikasi' => 'nullable|string|max:255',
        'instalasi_komunikasi' => 'nullable|string|max:255',
        'pengolahan_limbah_domestik' => 'nullable|string|max:255',
        'sistem_sanitasi' => 'nullable|string|max:255',
        'pengolahan_air_hujan' => 'nullable|string|max:255',
        'sistem_drainase' => 'nullable|string|max:255',
        'instalasi_gas' => 'nullable|string|max:255',
        'dokumen_lampiran_sanitasi' => 'nullable|string|max:255',
        'sumber_air' => 'nullable|string|max:255',
        'biaya_retribusi' => 'nullable|string|max:255',
        'surat_advis_krk' => 'nullable|string|max:255',
        'surat_permohonan_imb' => 'nullable|string|max:255',
        'surat_permohonan_slf' => 'nullable|string|max:255',
        'fotocopy_identitas_pemohon' => 'nullable|string|max:255',

        // Pilihan YA/TIDAK
        'surat_kuasa_imb' => 'nullable|string|max:255',
        'surat_k3' => 'nullable|string|max:255',
        'rekomendasi_desa' => 'nullable|string|max:255',
        'rekom_kecamatan' => 'nullable|string|max:255',
        'surat_kepemilikan_tanah_sewa' => 'nullable|string|max:255',
        'copy_sertif_tanah' => 'nullable|string|max:255',
        'surat_pajak' => 'nullable|string|max:255',
        'sippt' => 'nullable|string|max:255',
        'tabel_ceklis_dokumen' => 'nullable|string|max:255',
        'tabel_ceklis_teknis' => 'nullable|string|max:255',
        'surat_setoran_retribusi_daerah' => 'nullable|string|max:255',
        'surat_ketetapan_retribusi_daerah' => 'nullable|string|max:255',
        'berita_acara_pemeriksaan' => 'nullable|string|max:255',
    ], [
        '*.max' => 'Maksimal 255 karakter.',
    ]);

    // Cari child data MEP
    $datamep = databgdokumenmepbangunan::findOrFail($id);

    // Update data child
    $datamep->update($validated);

    // Ambil parent_id untuk redirect
    $parentId = $datamep->databgkepemilikan_id;

    // Flash message sukses
    session()->flash('update', 'Data MEP bangunan berhasil diperbarui!');

    // Redirect ke route bedatabgmebangunan dengan parentId
    return redirect()->route('bedatabgmebangunan', $parentId);
}

// public function bedatabgstrukrrusak($id)
// {
//     // Ambil user login
//     $user = Auth::user();

//     // Cari data kepemilikan dulu
//     $data = databgkepemilikan::find($id);

//     // Kalau tidak ada kepemilikan, buat object kosong biar link tambah data tetap ada
//     if (!$data) {
//         $data = new databgkepemilikan();
//         $data->id = $id;
//     }

//     // Ambil data tingkat kerusakan berdasarkan parent
//     $subdatapemilik = databgtingkatkerusahan::where('databgkepemilikan_id', $id)
//                         ->paginate(15);

//     // Hitung nomor urut mulai untuk paginasi
//     $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

//     // Kirim data ke view
//     return view('backend.02_pendataanbangunangedung.05_tingkatkerusakan.01_datatingkatkerusakan', [
//         'title' => 'Informasi Data Struktur & Tingkat Kerusakan Bangunan Gedung',
//         'title_halaman' => 'Informasi Data Struktur & Tingkat Kerusakan Bangunan Gedung',
//         'user' => $user,
//         'data' => $data,             // ini parent
//         'subdatapemilik' => $subdatapemilik, // ini child
//         'start' => $start,
//     ]);
// }


public function bedatabgstrukrrusak($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data kepemilikan (parent)
    $data = databgkepemilikan::find($id);

    // Kalau tidak ada kepemilikan, buat object kosong biar link tambah data tetap ada
    if (!$data) {
        $data = new databgkepemilikan();
        $data->id = $id;
    }

    // Ambil data tingkat kerusakan (child 1)
    $subdatapemilik = databgtingkatkerusahan::where('databgkepemilikan_id', $id)
                        ->paginate(15);

    // Ambil data struktur bangunan (child 2)
    // $datastruktur = databgstrukturbangunan::where('databgkepemilikan_id', $id)
    //                     ->paginate(15);

    $datastruktur = databgstrukturbangunan::where('databgkepemilikan_id', $id)->first();


    // Hitung nomor urut mulai untuk paginasi
    $start = ($subdatapemilik->currentPage() - 1) * $subdatapemilik->perPage() + 1;

    // Kirim data ke view
    return view('backend.02_pendataanbangunangedung.05_tingkatkerusakan.01_datatingkatkerusakan', [
        'title'          => 'Informasi Data Struktur & Tingkat Kerusakan Bangunan Gedung',
        'title_halaman'  => 'Informasi Data Struktur & Tingkat Kerusakan Bangunan Gedung',
        'user'           => $user,
        'data'           => $data,            // parent
        'subdatapemilik' => $subdatapemilik,  // child 1
        'datastruktur'   => $datastruktur,    // child 2
        'start'          => $start,
    ]);
}


public function bedatabgstrukrrusakcreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = databgkepemilikan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.02_pendataanbangunangedung.05_tingkatkerusakan.02_tambahdatatingkatkerusakan', [
        'title' => 'Tambah Data Informasi Struktur & Tingkat Kerusakan Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bedatabgstrukrrusakcreatenew(Request $request)
{
    // Validasi request
    $validated = $request->validate([
        'databgkepemilikan_id' => 'required|string',

        // BAGIAN 1
        'struktur_bangunan_bawah' => 'nullable|string|max:100',
        'struktur_bangunan_atas' => 'nullable|string|max:100',
        'struktur_atap' => 'nullable|string|max:100',
        'indikasi_kerusakan1' => 'nullable|string|max:255',
        'tingkat_kerusakan1' => 'nullable|string|max:100',

        // BAGIAN 2
        'pondasi' => 'nullable|string|max:100',
        'indikasi_kerusakan2' => 'nullable|string|max:255',
        'tingkat_kerusakan2' => 'nullable|string|max:100',

        // BAGIAN 3
        'struktur' => 'nullable|string|max:100',
        'indikasi_kerusakan3' => 'nullable|string|max:255',
        'tingkat_kerusakan3' => 'nullable|string|max:100',

        // BAGIAN 4
        'atap' => 'nullable|string|max:100',
        'indikasi_kerusakan4' => 'nullable|string|max:255',
        'tingkat_kerusakan4' => 'nullable|string|max:100',

        // BAGIAN 5
        'lantai' => 'nullable|string|max:100',
        'indikasi_kerusakan5' => 'nullable|string|max:255',
        'tingkat_kerusakan5' => 'nullable|string|max:100',

        // BAGIAN 6
        'dinding' => 'nullable|string|max:100',
        'indikasi_kerusakan6' => 'nullable|string|max:255',
        'tingkat_kerusakan6' => 'nullable|string|max:100',

        // BAGIAN 7
        'plafond' => 'nullable|string|max:100',
        'indikasi_kerusakan7' => 'nullable|string|max:255',
        'tingkat_kerusakan7' => 'nullable|string|max:100',

        // BAGIAN 8
        'utilitas' => 'nullable|string|max:100',
        'indikasi_kerusakan8' => 'nullable|string|max:255',
        'tingkat_kerusakan8' => 'nullable|string|max:100',

        // BAGIAN 9
        'finishing' => 'nullable|string|max:100',
        'total_nilai_kerusakan' => 'nullable|string|max:100',

        // // FOTO FOTO TABEL UTAMA
        // 'cadangan1' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15048',
        // 'cadangan2' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15048',

                // FOTO FOTO TABEL UTAMA

                // FOTO FOTO TABEL KEDUA
                'struktur_bawah' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
                'struktur_atas' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
                'genteng' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
                'rangka_atap' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',

                // PERUBAHAN BARU
                'pintu' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
                'jendela' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',

                // PERUBAHAN YANG LAMA
                'balok' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
                'kolom' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',

    ], [
        'databgkepemilikan_id.required' => 'ID Kepemilikan wajib diisi.',
        'databgkepemilikan_id.exists' => 'Data kepemilikan tidak ditemukan.',

        // 'cadangan1.image' => 'File harus berupa Foto atau Gambar.',
        // 'cadangan1.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan: jpeg, png, jpg, gif, webp.',
        // 'cadangan1.max' => 'Ukuran gambar terlalu besar. Maksimal 15 MB.',

        // 'cadangan2.image' => 'File harus berupa Foto atau Gambar.',
        // 'cadangan2.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan: jpeg, png, jpg, gif, webp.',
        // 'cadangan2.max' => 'Ukuran gambar terlalu besar. Maksimal 15 MB.',

        // 'struktur_bawah.image' => 'File harus berupa Foto atau Gambar.',
        // 'struktur_bawah.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan: jpeg, png, jpg, gif, webp.',
        // 'struktur_bawah.max' => 'Ukuran gambar terlalu besar. Maksimal 15 MB.',

        // 'struktur_atas.image' => 'File harus berupa Foto atau Gambar.',
        // 'struktur_atas.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan: jpeg, png, jpg, gif, webp.',
        // 'struktur_atas.max' => 'Ukuran gambar terlalu besar. Maksimal 15 MB.',

        // 'genteng.image' => 'File harus berupa Foto atau Gambar.',
        // 'genteng.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan: jpeg, png, jpg, gif, webp.',
        // 'genteng.max' => 'Ukuran gambar terlalu besar. Maksimal 15 MB.',

        // 'rangka_atap.image' => 'File harus berupa Foto atau Gambar.',
        // 'rangka_atap.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan: jpeg, png, jpg, gif, webp.',
        // 'rangka_atap.max' => 'Ukuran gambar terlalu besar. Maksimal 15 MB.',

        // 'balok.image' => 'File harus berupa Foto atau Gambar.',
        // 'balok.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan: jpeg, png, jpg, gif, webp.',
        // 'balok.max' => 'Ukuran gambar terlalu besar. Maksimal 15 MB.',

        // 'kolom.image' => 'File harus berupa Foto atau Gambar.',
        // 'kolom.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan: jpeg, png, jpg, gif, webp.',
        // 'kolom.max' => 'Ukuran gambar terlalu besar. Maksimal 15 MB.',

    ]);

    // Upload foto otomatis
    $uploadFields = [
        // 'cadangan1', 'cadangan2',       // tabel pertama
        'struktur_bawah', 'struktur_atas', 'genteng', 'pintu', 'jendela',
        'rangka_atap', 'balok', 'kolom' // tabel kedua
    ];

    foreach ($uploadFields as $field) {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $filename = $field . '_' . time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('fotofaktualbg'), $filename);
            $validated[$field] = 'fotofaktualbg/' . $filename;
        }
    }

    // Simpan ke tabel pertama (tingkat kerusakan)
    databgtingkatkerusahan::create($validated);

    // Simpan ke tabel kedua (struktur bangunan), tanpa cadangan1 & cadangan2
    databgstrukturbangunan::create([
        'databgkepemilikan_id' => $validated['databgkepemilikan_id'],
        'struktur_bawah' => $validated['struktur_bawah'] ?? null,
        'struktur_atas' => $validated['struktur_atas'] ?? null,
        'pintu' => $validated['pintu'] ?? null,
        'jendela' => $validated['jendela'] ?? null,
        'genteng' => $validated['genteng'] ?? null,
        'rangka_atap' => $validated['rangka_atap'] ?? null,
        'balok' => $validated['balok'] ?? null,
        'kolom' => $validated['kolom'] ?? null,
    ]);

//    session()->flash('create', 'Data struktur bangunan beserta foto berhasil ditambahkan ke kedua tabel!');
//     return redirect()->route('bedatabgstrukrrusak', [
//         'id' => $validated['databgkepemilikan_id']
//     ]);

session()->flash('create', 'Data struktur bangunan beserta foto berhasil ditambahkan ke kedua tabel!');
return redirect()->route('bedatabgstrukrrusak', $validated['databgkepemilikan_id']);

}


public function bedatabgstrukrrusakupdate($id)
{
    // Parent = kepemilikan
    $databgkepemilikan = databgkepemilikan::findOrFail($id);

    // Child 1 = data struktur bangunan
    $datakerusakan = databgstrukturbangunan::where('databgkepemilikan_id', $id)->first();

    // Child 2 = data tingkat kerusakan
    $datastruktur = databgtingkatkerusahan::where('databgkepemilikan_id', $id)->first();

    if (!$datastruktur || !$datastruktur) {
        return abort(404, 'Data struktur atau tingkat kerusakan tidak ditemukan');
    }

    // Kirim ke view
    return view('backend.02_pendataanbangunangedung.05_tingkatkerusakan.03_updatetingkatkerusakan', [
        'title'        => 'Perbaikan Data Struktur & Tingkat Kerusakan Bangunan Gedung',
        'data'         => $databgkepemilikan, // parent
        'datastruktur' => $datastruktur,      // child struktur
        'datakerusakan'=> $datakerusakan,     // child kerusakan
        'user'         => Auth::user(),
    ]);
}

public function bedatabgstrukrrusakupdatenew(Request $request, $datakerusakan, $datastruktur)
{
    // Validasi input
    $validated = $request->validate([
        // struktur
        'struktur_bangunan_bawah' => 'nullable|string|max:100',
        'struktur_bangunan_atas'  => 'nullable|string|max:100',
        'struktur_atap'           => 'nullable|string|max:100',
        'pondasi'                 => 'nullable|string|max:100',
        'struktur'                => 'nullable|string|max:100',
        'atap'                    => 'nullable|string|max:100',
        'lantai'                  => 'nullable|string|max:100',
        'dinding'                 => 'nullable|string|max:100',
        'plafond'                 => 'nullable|string|max:100',
        'utilitas'                => 'nullable|string|max:100',
        'finishing'               => 'nullable|string|max:100',

        // kerusakan
        'indikasi_kerusakan1' => 'nullable|string|max:255',
        'tingkat_kerusakan1'  => 'nullable|string|max:100',
        'indikasi_kerusakan2' => 'nullable|string|max:255',
        'tingkat_kerusakan2'  => 'nullable|string|max:100',
        'indikasi_kerusakan3' => 'nullable|string|max:255',
        'tingkat_kerusakan3'  => 'nullable|string|max:100',
        'indikasi_kerusakan4' => 'nullable|string|max:255',
        'tingkat_kerusakan4'  => 'nullable|string|max:100',
        'indikasi_kerusakan5' => 'nullable|string|max:255',
        'tingkat_kerusakan5'  => 'nullable|string|max:100',
        'indikasi_kerusakan6' => 'nullable|string|max:255',
        'tingkat_kerusakan6'  => 'nullable|string|max:100',
        'indikasi_kerusakan7' => 'nullable|string|max:255',
        'tingkat_kerusakan7'  => 'nullable|string|max:100',
        'indikasi_kerusakan8' => 'nullable|string|max:255',
        'tingkat_kerusakan8'  => 'nullable|string|max:100',

        'total_nilai_kerusakan' => 'nullable|numeric',

        // foto
        'struktur_bawah' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
        'struktur_atas'  => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
        'genteng'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
        'rangka_atap'    => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
        'pintu'          => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
        'jendela'        => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
        'balok'          => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
        'kolom'          => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:15360',
    ]);

    // Ambil data
    $dataKerusakan = databgtingkatkerusahan::findOrFail($datakerusakan);
    $dataStruktur  = databgstrukturbangunan::findOrFail($datastruktur);

    // Daftar field file upload
    $uploadFields = [
        'struktur_bawah', 'struktur_atas', 'genteng', 'rangka_atap',
        'pintu', 'jendela', 'balok', 'kolom'
    ];

    foreach ($uploadFields as $field) {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $filename = $field . '_' . time() . '.' . $file->getClientOriginalExtension();
            $destination = public_path('fotofaktualbg');

            if (!file_exists($destination)) {
                mkdir($destination, 0777, true);
            }

            // Hapus lama kalau ada
            if ($dataKerusakan->$field && file_exists(public_path($dataKerusakan->$field))) {
                unlink(public_path($dataKerusakan->$field));
            }

            // Simpan baru
            $file->move($destination, $filename);
            $dataKerusakan->$field = 'fotofaktualbg/' . $filename;
        }
    }

    // Simpan perubahan
    $dataKerusakan->fill($validated);
    $dataKerusakan->save();

    $dataStruktur->update($validated);

    // return redirect()
    //     ->route('bedatabgstrukrrusak', ['id' => $dataKerusakan->databgkepemilikan_id])
    //     ->with('update', 'Data struktur bangunan berhasil diperbarui!');

    return redirect()
    ->back()
    ->with('update', 'Data struktur bangunan berhasil diperbarui!');

    }


public function perkecamatanbangunan(Request $request, $kecamatan_id)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 10);

    $query = databgkepemilikan::with('kecamatanblora')
                ->where('kecamatanblora_id', $kecamatan_id); // ✅ filter berdasarkan kecamatan

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

            // Jika format search adalah tanggal (YYYY-MM-DD)
            if (preg_match('/\d{4}-\d{2}-\d{2}/', $search)) {
                $q->orWhereDate('created_at', $search);
            }
        });
    }

    // Urutkan berdasarkan created_at terbaru
    $berkasbantek = $query->orderBy('created_at', 'desc')
        ->paginate($perPage)
        ->appends($request->all());

    return view('backend.02_pendataanbangunangedung.01_databaseutama.02_databangunangedungnew', [
        'title' => 'Pendataan Bangunan Gedung Per Kecamatan Kabupaten Blora',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}


 public function bependataanbangunangedungupdate(Request $request, $id)
    {
        // Ambil user login
        $user = Auth::user();

        // Ambil data kecamatan & kelurahan
        $kecamatanList = kecamatanblora::all();
        $datakelurahan = kelurahandesa::all();

        // Jika request ajax untuk ambil data desa berdasarkan kecamatan
        if ($request->ajax() && $request->has('kecamatan_id')) {
            $desa = kelurahandesa::where('kecamatanblora_id', $request->kecamatan_id)->get();
            return response()->json($desa);
        }

        // Cari data berdasarkan ID dari tabel databgkepemilikan
        $datapbg = databgkepemilikan::findOrFail($id);

        // Kirim data ke view
        return view('backend.02_pendataanbangunangedung.01_databaseutama.05_updatependataanbangunan', [
            'title'        => 'Perbaikan Data Pendataan Bangunan Gedung',
            'user'         => $user,
            'datakelurahan'=> $datakelurahan,
            'kecamatanList'=> $kecamatanList,
            'data'      => $datapbg
        ]);
    }


    public function datanewpendataanbgnewupdate(Request $request, $id)
{
    // Cari data lama
    $data = databgkepemilikan::findOrFail($id);

    // Validasi input
    $validated = $request->validate([
        'user_id' => 'nullable|string',
        'tanggalinput' => 'nullable|string|max:255',
        'namainstitusi' => 'nullable|string|max:255',
        'nopengesahanusaha' => 'nullable|string|max:255',
        'notelepon' => 'nullable|string|max:255',
        'email' => 'nullable|email|max:255',

        'kecamatanblora_id' => 'required|string',
        'alamat' => 'nullable|string',
        'koordinat' => 'required|string|max:255',

        // file gambar opsional, max 15MB
        'tampakdepan' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:15120',
        'tampakbelakang' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:15120',
        'tampaksamping1' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:15120',
        'tampaksamping2' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:15120',
    ], [
        'email.email' => 'Format email tidak valid.',
        'kecamatanblora_id.required' => 'Kecamatan tidak ditemukan.',
        'tampakdepan.image' => 'File tampak depan harus berupa gambar.',
        'tampakbelakang.image' => 'File tampak belakang harus berupa gambar.',
        'tampaksamping1.image' => 'File tampak samping 1 harus berupa gambar.',
        'tampaksamping2.image' => 'File tampak samping 2 harus berupa gambar.',
        'tampakdepan.max' => 'File tampak depan maksimal 15MB.',
        'tampakbelakang.max' => 'File tampak belakang maksimal 15MB.',
        'tampaksamping1.max' => 'File tampak samping 1 maksimal 15MB.',
        'tampaksamping2.max' => 'File tampak samping 2 maksimal 15MB.',
    ]);

    // Folder penyimpanan file
    $uploadPath = public_path('02_pendataan');
    if (!file_exists($uploadPath)) mkdir($uploadPath, 0755, true);

    $saveFile = function($file, $prefix, $oldFile = null) use ($uploadPath) {
        // hapus file lama jika ada
        if ($oldFile && file_exists(public_path($oldFile))) unlink(public_path($oldFile));

        $filename = $prefix . '_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move($uploadPath, $filename);
        return '02_pendataan/' . $filename;
    };

    // Update file jika ada upload baru
    if ($request->hasFile('tampakdepan')) {
        $data->tampakdepan = $saveFile($request->file('tampakdepan'), 'tampakdepan', $data->tampakdepan);
    }
    if ($request->hasFile('tampakbelakang')) {
        $data->tampakbelakang = $saveFile($request->file('tampakbelakang'), 'tampakbelakang', $data->tampakbelakang);
    }
    if ($request->hasFile('tampaksamping1')) {
        $data->tampaksamping1 = $saveFile($request->file('tampaksamping1'), 'tampaksamping1', $data->tampaksamping1);
    }
    if ($request->hasFile('tampaksamping2')) {
        $data->tampaksamping2 = $saveFile($request->file('tampaksamping2'), 'tampaksamping2', $data->tampaksamping2);
    }

    // Update field lain
    $data->user_id = $validated['user_id'] ?? $data->user_id;
    $data->tanggalinput = $validated['tanggalinput'] ?? $data->tanggalinput;
    $data->namainstitusi = $validated['namainstitusi'] ?? $data->namainstitusi;
    $data->nopengesahanusaha = $validated['nopengesahanusaha'] ?? $data->nopengesahanusaha;
    $data->notelepon = $validated['notelepon'] ?? $data->notelepon;
    $data->email = $validated['email'] ?? $data->email;

    $data->kecamatanblora_id = $validated['kecamatanblora_id'];
    $data->alamat = $validated['alamat'] ?? $data->alamat;
    $data->koordinat = $validated['koordinat'];

    $data->save();

session()->flash('update', 'Data Bangunan berhasil diperbarui!');
return back();

}


public function bedatabgprofilbangunandelete($id)
{
    // Cari entri datapemilik berdasarkan id
    $entry = databgpeprofilbangunangedung::find($id);

    if ($entry) {
        // Hapus entri
        $entry->delete();

        // Redirect back ke halaman sebelumnya
        return redirect()->back()->with('delete', 'Data Berhasil Dihapus!');
    }

    return redirect()->back()->with('error', 'Item tidak ditemukan');
}

public function bedatabgprofiltanahdelete($id)
{
    // Cari entri datapemilik berdasarkan id
    $entry = databgtanah::find($id);

    if ($entry) {
        // Hapus entri
        $entry->delete();

        // Redirect back ke halaman sebelumnya
        return redirect()->back()->with('delete', 'Data Berhasil Dihapus!');
    }

    return redirect()->back()->with('error', 'Item tidak ditemukan');
}


public function bedatabgklasifikasidelete($id)
{
    // Cari entri datapemilik berdasarkan id
    $entry = databgpeprofilbangunangedung::find($id);

    if ($entry) {
        // Hapus entri
        $entry->delete();

        // Redirect back ke halaman sebelumnya
        return redirect()->back()->with('delete', 'Data Berhasil Dihapus!');
    }

    return redirect()->back()->with('error', 'Item tidak ditemukan');
}

public function bedatabgdokumendelete($id)
{
    // Cari entri datapemilik berdasarkan id
    $entry = databgintensitasbangunan::find($id);

    if ($entry) {
        // Hapus entri
        $entry->delete();

        // Redirect back ke halaman sebelumnya
        return redirect()->back()->with('delete', 'Data Berhasil Dihapus!');
    }

    return redirect()->back()->with('error', 'Item tidak ditemukan');
}

public function bedatabgmebangunandelete($id)
{
    // Cari entri datapemilik berdasarkan id
    $entry = databgdokumenmepbangunan::find($id);

    if ($entry) {
        // Hapus entri
        $entry->delete();

        // Redirect back ke halaman sebelumnya
        return redirect()->back()->with('delete', 'Data Berhasil Dihapus!');
    }

    return redirect()->back()->with('error', 'Item tidak ditemukan');
}

public function bedatabgstrukrrusakdelete($id)
{
    try {
        // hapus berdasarkan foreign key databgkepemilikan_id
        databgtingkatkerusahan::where('databgkepemilikan_id', $id)->delete();
        databgstrukturbangunan::where('databgkepemilikan_id', $id)->delete();

        return redirect()->back()->with('delete', 'Data Struktur Bangunan Gedung berhasil dihapus!');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}


public function bedatabgstatusbangunandelete($id)
{
    // Cari entri datapemilik berdasarkan id
    $entry = databgstatus::find($id);

    if ($entry) {
        // Hapus entri
        $entry->delete();

        // Redirect back ke halaman sebelumnya
        return redirect()->back()->with('delete', 'Data Berhasil Dihapus!');
    }

    return redirect()->back()->with('error', 'Item tidak ditemukan');
}

}

