<?php

namespace App\Http\Controllers;

use App\Models\agendastatus;
use App\Models\asosiasipengusaha;
use App\Models\bantuanteknis;
use App\Models\kecamatanblora;
use App\Models\rencanagsbblora;
use App\Models\uijk;
use App\Models\undangundang;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class DatabaseAbgController extends Controller
{

public function datagsbblora(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    $query = rencanagsbblora::query();

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('ruasjalan', 'like', "%{$search}%")
              ->orWhere('jenisjalan', 'like', "%{$search}%");

            // Jika ingin pencarian numerik di kolom float seperti gsb
            if (is_numeric($search)) {
                $q->orWhere('gsb', $search);
            }
        });
    }

    $bujk = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.99_databaseabg.01_gsbblora.01_gsbblora', [
        'title' => 'Daftar Garis Sempadan Bangunan Jalan Kabupaten Blora ',
        'data'  => $bujk,
        'user'  => $user,
    ]);
}


public function bedatagsbbloradelete($id)
{
    // Cari item berdasarkan judul
    $entry = rencanagsbblora::where('id', $id)->first();

    if ($entry) {
        // Jika ada file header yang terdaftar, hapus dari storage
        // if (Storage::disk('public')->exists($entry->header)) {
            //     Storage::disk('public')->delete($entry->header);
            // }

            // Hapus entri dari database
            $entry->delete();

            // Redirect atau memberi respons sesuai kebutuhan
            return redirect('/datagsbblora')->with('delete', 'Data Berhasil Di Hapus !');

        }

        return redirect()->back()->with('error', 'Item not found');
    }


    public function datagsbbloraupdate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = rencanagsbblora::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.99_databaseabg.01_gsbblora.02_updategsbblota', [
        'title' => 'Perbaikan Data Garis Sempadan Bangunan !',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function datagsbbloraupdatenew(Request $request, $id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $bantuan = rencanagsbblora::findOrFail($id);

    // Validasi input
    $request->validate([
        'ruasjalan' => 'required|string|max:255',
        'jenisjalan' => 'required|string|max:255',
        'gsb' => 'required|numeric',
    ], [
        'ruasjalan.required' => 'Ruas Jalan wajib diisi!',
        'jenisjalan.required' => 'Jenis Jalan wajib diisi!',
        'gsb.required' => 'Garis Sempadan Bangunan wajib diisi!',
        'gsb.numeric' => 'GSB harus berupa angka.',
    ]);

    // Update data input
    $bantuan->ruasjalan = $request->ruasjalan;
    $bantuan->jenisjalan = $request->jenisjalan;
    $bantuan->gsb = $request->gsb;

    // Simpan perubahan
    $bantuan->save();

    // Flash pesan sukses & redirect ke halaman detail
    session()->flash('update', 'Data GSB berhasil diperbarui!');
    return redirect()->route('datagsbbloraindex');
}


public function datakecblora(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    $query = kecamatanblora::query();

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('kecamatanblora', 'like', "%{$search}%");
        });

        $query->orWhereHas('kelurahandesa', function ($q) use ($search) {
            $q->where('desa', 'like', "%{$search}%");
        });
    }

    $data = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.99_databaseabg.02_kecamatanblora.01_kecamatanblora', [
        'title' => 'Daftar Kecamatan dan Kelurahan/Desa di Kabupaten Blora',
        'data'  => $data,
        'user'  => $user,
    ]);
}


public function datakecbloradelete($id)
{
    // Cari item berdasarkan judul
    $entry = kecamatanblora::where('id', $id)->first();

    if ($entry) {
        // Jika ada file header yang terdaftar, hapus dari storage
        // if (Storage::disk('public')->exists($entry->header)) {
            //     Storage::disk('public')->delete($entry->header);
            // }

            // Hapus entri dari database
            $entry->delete();

            // Redirect atau memberi respons sesuai kebutuhan
            return redirect('/datakecblora')->with('delete', 'Data Berhasil Di Hapus !');

        }

        return redirect()->back()->with('error', 'Item not found');
    }



}

