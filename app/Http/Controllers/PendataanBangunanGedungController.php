<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\bgkartuinventarisbangunan;
use App\Models\databangunangedung;
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

        $query = databangunangedung::query()->orderBy('created_at', 'desc');

        if ($search) {
            $query->where(function($q) use ($search) {
                $q->where('namabangunan', 'LIKE', "%{$search}%")
                  ->orWhere('luastanah', 'LIKE', "%{$search}%")
                  ->orWhere('alamatbangunan', 'LIKE', "%{$search}%")

                  ->orWhereHas('fungsibangunan', function($k) use ($search) {
                      $k->where('fungsibangunan', 'LIKE', "%{$search}%");
                    })

                    ->orWhereHas('kepemilikanbangunangedung', function($k) use ($search) {
                        $k->where('datainstitusibangunangedung->institusi', 'LIKE', "%{$search}%");
                    })

                    ->orWhereHas('profiltanahbangunangedung', function($k) use ($search) {
                        $k->where('statushaktanahbangunangedung->status', 'LIKE', "%{$search}%");
                    })

                  ->orWhereHas('klasifikasibangunangedung', function($k) use ($search) {
                    $k->where('tingkatpermanen', 'LIKE', "%{$search}%");
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

    public function databangunangedungshow($namabangunan)
    {
        $databangunangedung = databangunangedung::where('namabangunan', $namabangunan)->first();

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


}

