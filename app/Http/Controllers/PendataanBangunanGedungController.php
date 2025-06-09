<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\bgkartuinventarisbangunan;
use App\Models\databangunangedung;
use App\Models\kepemilikanbangunangedung;
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


}

