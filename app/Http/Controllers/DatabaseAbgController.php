<?php

namespace App\Http\Controllers;

use App\Models\agendastatus;
use App\Models\asosiasipengusaha;
use App\Models\bantuangambarinfo;
use App\Models\bantuanteknis;
use App\Models\beritaabg;
use App\Models\cadangan1;
use App\Models\fasilitatorpbg;
use App\Models\fungsibangunangambar;
use App\Models\fungsibangunanpbg;
use App\Models\jenispermohonangambar;
use App\Models\kecamatanblora;
use App\Models\kelurahandesa;
use App\Models\mbrgambar;
use App\Models\rencanagsbblora;
use App\Models\ttdkepaladinas;
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

public function datainformasibantuangmbr(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    $query = bantuangambarinfo::query();

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

    return view('backend.09_bantuangambar.00_pemohon.02_informasi', [
        'title' => 'Informasi Bantuan Teknis Gambar',
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

 public function beberita(Request $request)
{
    $perPage = $request->input('perPage', 15);
    $search = $request->input('search');

    $query = beritaabg::query();

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('judulberita', 'LIKE', "%{$search}%")
              ->orWhere('keterangan', 'LIKE', "%{$search}%")
              ->orWhereDate('tanggal', $search);
        });
    }

    $data = $query->orderBy('tanggal', 'desc')->paginate($perPage);

    if ($request->ajax()) {
        return response()->json([
            'html' => view('backend.13_daftarakun.01_semuaakun.partials.table', compact('data'))->render()
        ]);
    }

    return view('backend.99_databaseabg.00_berita.01_databeritaabg', [
        'title' => 'Daftar Semua Berita ABG Blora Bangunan Gedung',
        'data' => $data,
        'perPage' => $perPage,
        'search' => $search,
    ]);
}

public function beberitadelete($id)
{
    // Cari item berdasarkan judul
    $entry = beritaabg::where('id', $id)->first();

    if ($entry) {
        // Jika ada file header yang terdaftar, hapus dari storage
        // if (Storage::disk('public')->exists($entry->header)) {
            //     Storage::disk('public')->delete($entry->header);
            // }

            // Hapus entri dari database
            $entry->delete();

            // Redirect atau memberi respons sesuai kebutuhan
            return redirect('/beberita')->with('delete', 'Data Berhasil Di Hapus !');

        }

        return redirect()->back()->with('error', 'Item not found');
    }



    public function beberitacreate()
{
    $user = Auth::user();
    // $dataakun = User::where('statusadmin_id', 8)->get();

    if (!$user) {
        return redirect()->route('login');
    }

    return view('backend.99_databaseabg.00_berita.02_bautberita', [
        'title' => 'Buat Berita ABG Blora',
        'user'  => $user,
        // 'dataakun'  => $dataakun
    ]);
}



public function beberitacreatenew(Request $request)
{
    // Validasi data input
    $validated = $request->validate([
        'user_id' => 'required|string',
        'judulberita' => 'required|string|max:500',
        'tanggal' => 'required|date',
        'keterangan' => 'required|string',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
        'foto1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
        'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
    ], [
        'user_id.required' => 'User wajib diisi.',
        'user_id.exists' => 'User tidak ditemukan.',
        'judulberita.required' => 'Judul berita wajib diisi.',
        'tanggal.required' => 'Tanggal wajib diisi.',
        'tanggal.date' => 'Format tanggal tidak valid.',
        'keterangan.required' => 'Keterangan wajib diisi.',
        'foto.image' => 'Foto utama harus berupa gambar.',
        'foto1.image' => 'Foto tambahan 1 harus berupa gambar.',
        'foto2.image' => 'Foto tambahan 2 harus berupa gambar.',
    ]);

    $data = new beritaabg(); // Ganti dengan nama model kamu yang benar

    $data->user_id = $validated['user_id'];
    $data->judulberita = $validated['judulberita'];
    $data->tanggal = $validated['tanggal'];
    $data->keterangan = $validated['keterangan'];

    // Folder target di public
    $basePath = public_path('99_beritaabg');

    // Pastikan folder target ada, kalau belum buat
    if (!file_exists($basePath)) {
        mkdir($basePath, 0755, true);
    }

    // Upload foto utama
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = 'foto_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($basePath, $filename);
        $data->foto = '99_beritaabg/' . $filename;
    }

    // Upload foto1
    if ($request->hasFile('foto1')) {
        $file = $request->file('foto1');
        $filename = 'foto1_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($basePath, $filename);
        $data->foto1 = '99_beritaabg/' . $filename;
    }

    // Upload foto2
    if ($request->hasFile('foto2')) {
        $file = $request->file('foto2');
        $filename = 'foto2_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($basePath, $filename);
        $data->foto2 = '99_beritaabg/' . $filename;
    }

    $data->save();

    session()->flash('create', 'Data berhasil disimpan.');
    return redirect()->route('beberita'); // Ganti dengan route index yang sesuai
}

public function beberitacreateupdate($id)
{
    $user = Auth::user();

    if (!$user) {
        return redirect()->route('login');
    }

    // Ambil data berita berdasarkan ID
    $data = beritaabg::findOrFail($id);

    return view('backend.99_databaseabg.00_berita.03_updateberita', [
        'title' => 'Update Berita ABG Blora',
        'user'  => $user,
        'data'  => $data,
    ]);
}

public function beberitacreateupdatenew(Request $request, $id)
{
    // Cari data berita berdasarkan ID
    $data = beritaabg::findOrFail($id);

    // Validasi data input
    $validated = $request->validate([
        'user_id'     => 'nullable|string',
        'judulberita' => 'nullable|string|max:500',
        'tanggal'     => 'nullable|date',
        'keterangan'  => 'nullable|string',
        'foto'        => 'nullable|image|mimes:jpeg,png,jpg,gif|max:15048',
        'foto1'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:15048',
        'foto2'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:15048',
    ], [
        'user_id.required' => 'User wajib diisi.',
        'judulberita.required' => 'Judul berita wajib diisi.',
        'tanggal.required' => 'Tanggal wajib diisi.',
        'tanggal.date' => 'Format tanggal tidak valid.',
        'keterangan.required' => 'Keterangan wajib diisi.',
        'foto.image' => 'Foto utama harus berupa gambar.',
        'foto1.image' => 'Foto tambahan 1 harus berupa gambar.',
        'foto2.image' => 'Foto tambahan 2 harus berupa gambar.',
    ]);

    // Update data teks
    $data->user_id     = $validated['user_id'];
    $data->judulberita = $validated['judulberita'];
    $data->tanggal     = $validated['tanggal'];
    $data->keterangan  = $validated['keterangan'];

    // Folder target di public
    $basePath = public_path('99_beritaabg');
    if (!file_exists($basePath)) {
        mkdir($basePath, 0755, true);
    }

    // Upload foto utama
    if ($request->hasFile('foto')) {
        if ($data->foto && file_exists(public_path($data->foto))) {
            @unlink(public_path($data->foto));
        }
        $file = $request->file('foto');
        $filename = 'foto_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($basePath, $filename);
        $data->foto = '99_beritaabg/' . $filename;
    }

    // Upload foto1
    if ($request->hasFile('foto1')) {
        if ($data->foto1 && file_exists(public_path($data->foto1))) {
            @unlink(public_path($data->foto1));
        }
        $file = $request->file('foto1');
        $filename = 'foto1_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($basePath, $filename);
        $data->foto1 = '99_beritaabg/' . $filename;
    }

    // Upload foto2
    if ($request->hasFile('foto2')) {
        if ($data->foto2 && file_exists(public_path($data->foto2))) {
            @unlink(public_path($data->foto2));
        }
        $file = $request->file('foto2');
        $filename = 'foto2_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($basePath, $filename);
        $data->foto2 = '99_beritaabg/' . $filename;
    }

    $data->save();

    session()->flash('update', 'Data berita berhasil diperbarui.');
    return redirect()->route('beberita'); // Ganti dengan route index yang sesuai
}



public function beartikel(Request $request)
{
    $perPage = $request->input('perPage', 15);
    $search = $request->input('search');

    $query = cadangan1::query();

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('cadangan1', 'LIKE', "%{$search}%")
              ->orWhere('cadangan2', 'LIKE', "%{$search}%")
              ->orWhere('cadangan3', 'LIKE', "%{$search}%")
              ->orWhere('cadangan4', 'LIKE', "%{$search}%")
              ->orWhere('cadangan5', 'LIKE', "%{$search}%")
              ->orWhere('cadangan6', 'LIKE', "%{$search}%")
              ->orWhere('cadangan7', 'LIKE', "%{$search}%");
        });
    }

    // kalau mau tetap urutkan pakai created_at, karena tanggal sudah diganti
    $data = $query->orderBy('created_at', 'desc')->paginate($perPage);

    if ($request->ajax()) {
        return response()->json([
            'html' => view('backend.13_daftarakun.01_semuaakun.partials.table', compact('data'))->render()
        ]);
    }

    return view('backend.99_databaseabg.00_artikel.01_dataartikelblora', [
        'title' => 'Daftar Artikel Bangunan Gedung Kabupaten Blora',
        'data' => $data,
        'perPage' => $perPage,
        'search' => $search,
    ]);
}


public function beartikelcreate()
{
    $user = Auth::user();
    // $dataakun = User::where('statusadmin_id', 8)->get();

    if (!$user) {
        return redirect()->route('login');
    }

    return view('backend.99_databaseabg.00_artikel.02_buatartikel', [
        'title' => 'Buat Artikel Bangunan Gedung Kab Blora',
        'user'  => $user,
        // 'dataakun'  => $dataakun
    ]);
}

public function beartikelcreatenew(Request $request)
{
    // Validasi data input
    $validated = $request->validate([
        // 'user_id'    => 'required|string',
        'cadangan1'  => 'nullable|string|max:500', // Judul
        'cadangan2'  => 'nullable|string',         // Keterangan
        'cadangan3'  => 'nullable|file|max:15360', // Berkas (15 MB)
        'cadangan4'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:15360', // Foto 1
        'cadangan5'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:15360', // Foto 2
        'cadangan6'  => 'nullable|image|mimes:jpeg,png,jpg,gif|max:15360', // Foto 3
    ], [
        // 'user_id.required'   => 'User wajib diisi.',
        'cadangan1.required' => 'Judul wajib diisi.',
        'cadangan2.required' => 'Keterangan wajib diisi.',
        'cadangan3.file'     => 'Berkas harus berupa file yang valid.',
        'cadangan4.image'    => 'Foto 1 harus berupa gambar.',
        'cadangan5.image'    => 'Foto 2 harus berupa gambar.',
        'cadangan6.image'    => 'Foto 3 harus berupa gambar.',
    ]);

    $data = new cadangan1(); // ganti sesuai nama model kamu

    // $data->user_id   = $validated['user_id'];
    $data->cadangan1 = $validated['cadangan1']; // Judul
    $data->cadangan2 = $validated['cadangan2']; // Keterangan

    // Folder target di public
    $basePath = public_path('99_beritaabg');
    if (!file_exists($basePath)) {
        mkdir($basePath, 0755, true);
    }

    // Upload cadangan3 (Berkas)
    if ($request->hasFile('cadangan3')) {
        $file = $request->file('cadangan3');
        $filename = 'cadangan3_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($basePath, $filename);
        $data->cadangan3 = '99_beritaabg/' . $filename;
    }

    // Upload cadangan4 (Foto 1)
    if ($request->hasFile('cadangan4')) {
        $file = $request->file('cadangan4');
        $filename = 'cadangan4_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($basePath, $filename);
        $data->cadangan4 = '99_beritaabg/' . $filename;
    }

    // Upload cadangan5 (Foto 2)
    if ($request->hasFile('cadangan5')) {
        $file = $request->file('cadangan5');
        $filename = 'cadangan5_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($basePath, $filename);
        $data->cadangan5 = '99_beritaabg/' . $filename;
    }

    // Upload cadangan6 (Foto 3)
    if ($request->hasFile('cadangan6')) {
        $file = $request->file('cadangan6');
        $filename = 'cadangan6_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
        $file->move($basePath, $filename);
        $data->cadangan6 = '99_beritaabg/' . $filename;
    }

    $data->save();

    session()->flash('create', 'Data berhasil disimpan.');
    return redirect()->route('beartikel');
}


public function beartikeldelete($id)
{
    // Cari item berdasarkan judul
    $entry = cadangan1::where('id', $id)->first();

    if ($entry) {
        // Jika ada file header yang terdaftar, hapus dari storage
        // if (Storage::disk('public')->exists($entry->header)) {
            //     Storage::disk('public')->delete($entry->header);
            // }

            // Hapus entri dari database
            $entry->delete();

            // Redirect atau memberi respons sesuai kebutuhan
            return redirect('/beartikel')->with('delete', 'Data Berhasil Di Hapus !');

        }

        return redirect()->back()->with('error', 'Item not found');
    }

public function ttdkepaladinasblora()
{
    $user = Auth::user();

    $data = ttdkepaladinas::orderBy('id', 'desc')->get();

    return view('backend.99_databaseabg.04_ttdkepaladinas.01_ttdkepaladinas', [
        'title' => 'Tanda Tangan Kepala Dinas Kabupaten Blora',
        'data'  => $data,
        'user'  => $user,
    ]);
}

// BUAT TANDA TANGAN KEPALA DINAS


       public function ttdkepaladinasbloracreate()
{
    $user = Auth::user();
    // $dataakun = User::where('statusadmin_id', 8)->get();

    if (!$user) {
        return redirect()->route('login');
    }

    return view('backend.99_databaseabg.04_ttdkepaladinas.02_masukan', [
        'title' => 'Tambah Pejabat',
        'user'  => $user,
        // 'dataakun'  => $dataakun
    ]);
}


public function ttdkepaladinasbloracreatenew(Request $request)
{
    // VALIDASI
    $validated = $request->validate([
        'namalengkap' => 'required|string|max:255',
        'jabatan'     => 'required|string|max:255',
        'nip'         => 'nullable|string|max:50',

        // upload image max 15MB
        'tandatangan' => 'nullable|image|mimes:png,jpg,jpeg|max:15360',
        'capblora'    => 'nullable|image|mimes:png,jpg,jpeg|max:15360',
    ], [
        'namalengkap.required' => 'Nama lengkap wajib diisi.',
        'jabatan.required'     => 'Jabatan wajib diisi.',
        'tandatangan.max'      => 'Ukuran tanda tangan maksimal 15 MB.',
        'capblora.max'         => 'Ukuran cap Blora maksimal 15 MB.',
        'tandatangan.image'    => 'Tanda tangan harus berupa gambar.',
        'capblora.image'       => 'Cap Blora harus berupa gambar.',
    ]);

    // SIMPAN FILE KE PUBLIC (BUKAN STORAGE)
    $tandatanganUrl = null;
    if ($request->hasFile('tandatangan')) {
        $file = $request->file('tandatangan');
        $filename = 'ttd_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/ttd'), $filename);
        $tandatanganUrl = '/assets/ttd/' . $filename;
    }

    $capBloraUrl = null;
    if ($request->hasFile('capblora')) {
        $file = $request->file('capblora');
        $filename = 'cap_' . time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('assets/cap'), $filename);
        $capBloraUrl = '/assets/cap/' . $filename;
    }

    // SIMPAN KE DATABASE
    ttdkepaladinas::create([
        'namalengkap' => $validated['namalengkap'],
        'jabatan'     => $validated['jabatan'],
        'nip'         => $validated['nip'] ?? null,
        'tandatangan' => $tandatanganUrl,
        'capblora'    => $capBloraUrl,
    ]);

    session()->flash('create', 'Data TTD Kepala Dinas berhasil disimpan.');
    return redirect()->route('ttdkepaladinasblora');
}



    public function ttdkepaladinasbloraupdate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = ttdkepaladinas::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.99_databaseabg.04_ttdkepaladinas.03_updatekepaladinas', [
        'title' => 'Perbaikan Data Kepala Dinas !',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


}

