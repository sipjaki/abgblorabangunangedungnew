<?php

namespace App\Http\Controllers;

use App\Models\agendastatus;
use App\Models\asosiasipengusaha;
use App\Models\bantuanteknis;
use App\Models\fasilitatorpbg;
use App\Models\fungsibangunangambar;
use App\Models\fungsibangunanpbg;
use App\Models\jenispermohonangambar;
use App\Models\kecamatanblora;
use App\Models\kelurahandesa;
use App\Models\mbrgambar;
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
        'title' => 'Daftar Kecamatan di Kabupaten Blora',
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


public function datadesablora(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 50);

    $query = kelurahandesa::query();

    if ($search) {
        $query->where(function ($q) use ($search) {
            // Cari berdasarkan nama desa
            $q->where('desa', 'like', "%{$search}%");
        })
        ->orWhereHas('kecamatanblora', function ($q) use ($search) {
            // Cari berdasarkan nama kecamatan yang relasinya di tabel kecamatanblora
            $q->where('kecamatanblora', 'like', "%{$search}%");
        });
    }

    $data = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.99_databaseabg.02_kecamatanblora.02_desa', [
        'title' => 'Daftar Desa/Kelurahan di Kabupaten Blora',
        'data'  => $data,
        'user'  => $user,
    ]);
}


public function datambrblora(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    $query = mbrgambar::query();

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('judul1', 'like', "%{$search}%")
              ->orWhere('judul2', 'like', "%{$search}%")
              ->orWhere('berkas1', 'like', "%{$search}%")
              ->orWhere('berkas2', 'like', "%{$search}%")
              ->orWhere('berkas3', 'like', "%{$search}%")
              ->orWhere('berkas4', 'like', "%{$search}%");
        });
    }

    $data = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.08_mbr.01_halamanmbr', [
        'title' => 'Informasi MBR Bangunan Gedung',
        'data'  => $data,
        'user'  => $user,
    ]);
}

public function datajenispermohonan(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 50);

    $query = jenispermohonangambar::query();

    if ($search) {
        $query->where('jenis', 'like', "%{$search}%");
    }

    $data = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.99_databaseabg.08_bantuangambar.01_datajenispermohonan', [
        'title' => 'Jenis Permohonan Bantuan Gambar',
        'data'  => $data,
        'user'  => $user,
    ]);
}

public function datajenispermohonandelete($id)
{
    // Cari item berdasarkan judul
    $entry = jenispermohonangambar::where('id', $id)->first();

    if ($entry) {
        // Jika ada file header yang terdaftar, hapus dari storage
        // if (Storage::disk('public')->exists($entry->header)) {
            //     Storage::disk('public')->delete($entry->header);
            // }

            // Hapus entri dari database
            $entry->delete();

            // Redirect atau memberi respons sesuai kebutuhan
            return redirect('/datajenispermohonan')->with('delete', 'Data Berhasil Di Hapus !');

        }

        return redirect()->back()->with('error', 'Item not found');
    }

    public function datajenispermohonancreate()
{
    $user = Auth::user();
    // $dataakun = User::where('statusadmin_id', 8)->get();

    if (!$user) {
        return redirect()->route('login');
    }

    return view('backend.99_databaseabg.08_bantuangambar.02_buatbaru', [
        'title' => 'Buat Jenis Permohonan Baru Bantuan Gambar',
        'user'  => $user,
        // 'dataakun'  => $dataakun
    ]);
}

public function datajenispermohonancreatenew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'jenis' => 'required|string|max:255',
    ], [
        'jenis.required' => 'Jenis permohonan wajib diisi.',
    ]);

    // Simpan ke database
    $data = new jenispermohonangambar();
    $data->jenis = $validated['jenis'];
    $data->save();

    session()->flash('create', 'Data jenis permohonan berhasil disimpan.');
    return redirect()->route('datajenispermohonanindex'); // Ganti sesuai nama rute index kamu
}


public function datafungsibangunan(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 50);

    $query = fungsibangunangambar::query();

    if ($search) {
        $query->where('fungsibangunan', 'like', "%{$search}%");
    }

    $data = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.99_databaseabg.08_bantuangambar.03_jenisfungsibangunan', [
        'title' => 'Jenis Fungsi Bangunan Bantuan Gambar',
        'data'  => $data,
        'user'  => $user,
    ]);
}

public function datafungsibangunandelete($id)
{
    // Cari item berdasarkan judul
    $entry = fungsibangunangambar::where('id', $id)->first();

    if ($entry) {
        // Jika ada file header yang terdaftar, hapus dari storage
        // if (Storage::disk('public')->exists($entry->header)) {
            //     Storage::disk('public')->delete($entry->header);
            // }

            // Hapus entri dari database
            $entry->delete();

            // Redirect atau memberi respons sesuai kebutuhan
            return redirect('/datafungsibangunan')->with('delete', 'Data Berhasil Di Hapus !');

        }

        return redirect()->back()->with('error', 'Item not found');
    }


       public function datafungsibangunancreate()
{
    $user = Auth::user();
    // $dataakun = User::where('statusadmin_id', 8)->get();

    if (!$user) {
        return redirect()->route('login');
    }

    return view('backend.99_databaseabg.08_bantuangambar.04_buatfungsibaru', [
        'title' => 'Buat Jenis Fungsi Bangunan Baru',
        'user'  => $user,
        // 'dataakun'  => $dataakun
    ]);
}

public function datafungsibangunancreatenew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'fungsibangunan' => 'required|string|max:255',
    ], [
        'fungsibangunan.required' => 'Fungsi bangunan wajib diisi.',
    ]);

    // Simpan ke database
    $data = new fungsibangunangambar();
    $data->fungsibangunan = $validated['fungsibangunan'];
    $data->save();

    session()->flash('create', 'Data fungsi bangunan berhasil disimpan.');
    return redirect()->route('datafungsibangunanindex'); // Ganti sesuai route index fungsi bangunan
}


public function datafasilitator(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 50);

    $query = fasilitatorpbg::query();

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('namalengkap', 'like', "%{$search}%")
              ->orWhere('alamat', 'like', "%{$search}%")
              ->orWhere('nik', 'like', "%{$search}%")
              ->orWhere('jabatan', 'like', "%{$search}%");
        });
    }

    $data = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.99_databaseabg.08_bantuangambar.05_daftarfasilitator', [
        'title' => 'Daftar Fasilitator Bantuan Gambar',
        'data'  => $data,
        'user'  => $user,
    ]);
}

public function datafasilitatordelete($id)
{
    // Cari item berdasarkan judul
    $entry = fasilitatorpbg::where('id', $id)->first();

    if ($entry) {
        // Jika ada file header yang terdaftar, hapus dari storage
        // if (Storage::disk('public')->exists($entry->header)) {
            //     Storage::disk('public')->delete($entry->header);
            // }

            // Hapus entri dari database
            $entry->delete();

            // Redirect atau memberi respons sesuai kebutuhan
            return redirect('/datafasilitator')->with('delete', 'Data Berhasil Di Hapus !');

        }

        return redirect()->back()->with('error', 'Item not found');
    }


       public function datafasilitatorcreate()
{
    $user = Auth::user();
    // $dataakun = User::where('statusadmin_id', 8)->get();

    if (!$user) {
        return redirect()->route('login');
    }

    return view('backend.99_databaseabg.08_bantuangambar.06_buatbarudasilitaror', [
        'title' => 'Tambah Fasilitator Bantuan Gambar',
        'user'  => $user,
        // 'dataakun'  => $dataakun
    ]);
}
public function datafasilitatorcreatenew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'namalengkap' => 'required|string|max:255',
        'alamat'      => 'required|string|max:255',
        'nik'         => 'required|string|max:50',
        'jabatan'     => 'required|string|max:100',
    ], [
        'namalengkap.required' => 'Nama lengkap wajib diisi.',
        'alamat.required'      => 'Alamat wajib diisi.',
        'nik.required'         => 'NIK wajib diisi.',
        'jabatan.required'     => 'Jabatan wajib diisi.',
    ]);

    // Simpan ke database
    $data = new fasilitatorpbg();
    $data->namalengkap = $validated['namalengkap'];
    $data->alamat = $validated['alamat'];
    $data->nik = $validated['nik'];
    $data->jabatan = $validated['jabatan'];
    $data->save();

    session()->flash('create', 'Data fasilitator berhasil disimpan.');
    return redirect()->route('datafasilitatorindex'); // Ganti sesuai route index fasilitator
}


}

