<?php

namespace App\Http\Controllers;

use App\Models\lapperjalanandinas;
use App\Models\perjalanandinas;
use App\Models\petugasdinas;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Auth;

class PerjalanandinasController extends Controller
{
    /**
     * Menampilkan form perbaikan dokumen hibah berdasarkan user yang login
     */
public function bepetugasdinas(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    $query = petugasdinas::query();

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('namalengkap', 'like', "%{$search}%")
              ->orWhere('nip', 'like', "%{$search}%")
              ->orWhere('pangkat', 'like', "%{$search}%")
              ->orWhere('jabatan', 'like', "%{$search}%")
              ->orWhere('tingkatbiaya', 'like', "%{$search}%");
        });
    }

    $bujk = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.11_perjalanandinas.01_daftarpetugas', [
        'title' => 'Daftar Internal Bidang Bangunan Gedung DPUPR Kab Blora',
        'data'  => $bujk,
        'user'  => $user,
    ]);
}

public function bepetugasdinasdelete($id)
{
    // Cari item berdasarkan judul
    $entry = petugasdinas::where('id', $id)->first();

    if ($entry) {
        // Jika ada file header yang terdaftar, hapus dari storage
        // if (Storage::disk('public')->exists($entry->header)) {
            //     Storage::disk('public')->delete($entry->header);
            // }

            // Hapus entri dari database
            $entry->delete();

            // Redirect atau memberi respons sesuai kebutuhan
            return redirect('/bepetugasdinas')->with('delete', 'Data Berhasil Di Hapus !');

        }

        return redirect()->back()->with('error', 'Item not found');
    }


public function beperjalanandinas()
{
    // Ambil user login
    $user = Auth::user();
    $datapetugas = petugasdinas::all();

    // Kirim data ke view tanpa ambil dari database bantuanhibahbg
    return view('backend.11_perjalanandinas.02_createperjalanan', [
        'title' => 'Form Pembuatan Perjalanan Dinas',
        'user' => $user,
        'datapetugas' => $datapetugas
    ]);
}

public function beperjalanandinasnew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'namapetugas_id' => 'nullable|string',
        'dinasluasdalam' => 'required|string',
        'tanggalsuratterbit' => 'required|date',
        'maksudperjalanan' => 'required|string|max:255',
        'angkutan' => 'required|string|max:255',
        'tempatberangkat' => 'required|string|max:255',
        'tempattujuan' => 'required|string|max:255',
        'lamaperjalanan' => 'required|string|max:255',
        'mulaiperjalanan' => 'required|date',
        'selesaiperjalanan' => 'required|date|after_or_equal:mulaiperjalanan',
        'pendamping_id' => 'nullable|string',
        'ketkegiatan' => 'nullable|string|max:255',
    ], [
        'dinasluasdalam.required' => 'Silakan pilih Dinas Dalam atau Luar.',
        'tanggalsuratterbit.required' => 'Tanggal surat wajib diisi.',
        'mulaiperjalanan.required' => 'Tanggal mulai wajib diisi.',
        'selesaiperjalanan.after_or_equal' => 'Tanggal selesai tidak boleh sebelum tanggal mulai.',
    ]);

    // Simpan data ke database
    perjalanandinas::create([
        'namapetugas_id'    => $validated['namapetugas_id'] ?? null,
        'dinasluasdalam'    => $validated['dinasluasdalam'],
        'tanggalsuratterbit'=> $validated['tanggalsuratterbit'],
        'maksudperjalanan'  => $validated['maksudperjalanan'],
        'angkutan'          => $validated['angkutan'],
        'tempatberangkat'   => $validated['tempatberangkat'],
        'tempattujuan'      => $validated['tempattujuan'],
        'lamaperjalanan'    => $validated['lamaperjalanan'],
        'mulaiperjalanan'   => $validated['mulaiperjalanan'],
        'selesaiperjalanan' => $validated['selesaiperjalanan'],
        'pendamping_id'     => $validated['pendamping_id'] ?? null,
        'ketkegiatan'       => $validated['ketkegiatan'] ?? null,
    ]);

    session()->flash('create', 'Data Perjalanan Dinas berhasil disimpan!');
    return redirect()->route('dataalldinassurat.index');
}

public function dataalldinassurat(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 15);

    // Query dasar dengan eager loading relasi yang benar
    $query = perjalanandinas::with(['namapetugas', 'pendampingdinas']);

    // Pencarian jika keyword diinput
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('dinasluasdalam', 'like', "%{$search}%")
              ->orWhere('maksudperjalanan', 'like', "%{$search}%")
              ->orWhere('angkutan', 'like', "%{$search}%")
              ->orWhere('tempatberangkat', 'like', "%{$search}%")
              ->orWhere('tempattujuan', 'like', "%{$search}%")
              ->orWhere('lamaperjalanan', 'like', "%{$search}%")
              ->orWhereHas('namapetugas', function ($sub) use ($search) {
                  $sub->where('name', 'like', "%{$search}%");
              })
              ->orWhereHas('pendampingdinas', function ($sub) use ($search) {
                  $sub->where('name', 'like', "%{$search}%");
              });
        });
    }

    // Pagination + kirim data ke view
    $datadinas = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.11_perjalanandinas.03_dataalldinas', [
        'title' => 'Data Surat Perjalanan Dinas',
        'data' => $datadinas,
        'user' => $user,
    ]);
}



// ==================================================
public function dataalldinassuratshow(Request $request, $id)
{
    // Ambil user login
    $user = Auth::user();
    // Cari data pbg berdasarkan ID
    $data = perjalanandinas::findOrFail($id);
    // Kirim data ke view
    return view('backend.11_perjalanandinas.04_suratperjalanandinas', [
        'title' => 'Surat Perjalanan Dinas',
        'title_halaman' => 'Surat Perjalanan Dinas',
        'user' => $user,
        'data' => $data,

    ]);
}



public function dataalldinassuratlap($id)
{
    $databantuanteknis = perjalanandinas::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = lapperjalanandinas::where('perjalanandinas_id', $databantuanteknis->id)->paginate(50);

    return view('backend.11_perjalanandinas.05_dokperjalanandinas', [
        'title' => 'Dokumentasi Perjalanan Dinas',
        'data' => $dataceklapangan,
        'subdata' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function dataalldinassuratdokcreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = perjalanandinas::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.11_perjalanandinas.06_uploaddoklapdinas', [
        'title' => 'Upload Dokumentasi Perjalanan Dinas ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);

}



public function dataalldinassuratdokcreatenew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'perjalanandinas_id' => 'required|string',
        'namakegiatan' => 'required|string|max:255',
        'tanggalkegiatan' => 'required|date',
        'foto1' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
        'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
        'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
        'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
        'foto5' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
    ], [
        'perjalanandinas_id.required' => 'Perjalanan Dinas wajib dipilih.',
        'namakegiatan.required' => 'Nama kegiatan wajib diisi.',
        'tanggalkegiatan.required' => 'Tanggal kegiatan wajib diisi.',
        'foto1.image' => 'Foto 1 harus berupa gambar.',
        'foto2.image' => 'Foto 2 harus berupa gambar.',
        'foto3.image' => 'Foto 3 harus berupa gambar.',
        'foto4.image' => 'Foto 4 harus berupa gambar.',
        'foto5.image' => 'Foto 5 harus berupa gambar.',
    ]);

    // Fungsi untuk menyimpan gambar
    function simpanFoto($request, $field, $folder)
    {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $filename = time() . "_{$field}." . $file->getClientOriginalExtension();
            $file->move(public_path($folder), $filename);
            return $folder . '/' . $filename;
        }
        return null;
    }

    // Simpan ke model, sesuaikan dengan model yang digunakan (misal: DinasDokumentasi)
    $data = new lapperjalanandinas(); // ganti sesuai model
    $data->perjalanandinas_id = $validated['perjalanandinas_id'];
    $data->namakegiatan = $validated['namakegiatan'];
    $data->tanggalkegiatan = $validated['tanggalkegiatan'];
    $data->foto1 = simpanFoto($request, 'foto1', '11_perjanandinas/01_file/foto1');
    $data->foto2 = simpanFoto($request, 'foto2', '11_perjanandinas/01_file/foto2');
    $data->foto3 = simpanFoto($request, 'foto3', '11_perjanandinas/01_file/foto3');
    $data->foto4 = simpanFoto($request, 'foto4', '11_perjanandinas/01_file/foto4');
    $data->foto5 = simpanFoto($request, 'foto5', '11_perjanandinas/01_file/foto5');
    $data->save();

    session()->flash('create', 'Data dokumentasi kegiatan berhasil disimpan!');
    return redirect()->route('dataalldinassuratlap.show', ['id' => $validated['perjalanandinas_id']]);
}


public function dataalldinasdelete($id)
{
    // Cari entri berdasarkan ID
    $entry = lapperjalanandinas::where('id', $id)->first();

    if ($entry) {
        // Simpan dulu lapangan_id sebelum entri dihapus
        $lapanganId = $entry->perjalanandinas_id;

        // Hapus file jika ada (aktifkan jika memang simpan file)
        // if (Storage::disk('public')->exists($entry->header)) {
        //     Storage::disk('public')->delete($entry->header);
        // }

        // Hapus data dari database
        $entry->delete();

        // Redirect ke halaman detail lapangan terkait
        return redirect()->route('dataalldinassuratlap.show', ['id' => $lapanganId])
                         ->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}


public function beperjalanadinasba($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = perjalanandinas::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.11_perjalanandinas.07_baperjalanandinas', [
        'title' => 'Upload Berita Acara Perjalanan Dinas',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function beperjalanadinasbaupload(Request $request, $id)
{
    $bantek = perjalanandinas::findOrFail($id);

    // Validasi
    $request->validate([
        'berkasberitaacara' => 'required|mimes:pdf|max:10048',
    ], [
        'berkasberitaacara.required' => 'File Berita Acara wajib diunggah.',
        'berkasberitaacara.mimes' => 'File harus berupa format PDF.',
        'berkasberitaacara.max' => 'Ukuran file maksimal 7MB.',
    ]);

    if ($request->hasFile('berkasberitaacara')) {
        $file = $request->file('berkasberitaacara');

        $filename = 'beritaacara-' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('11_perjalanandinasberkasberita');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $filename);
        $filePath = '11_perjalanandinasberkasberita/' . $filename;

        // Update record dengan path baru
        $bantek->berkasberitaacara = $filePath;
        $bantek->save();
    }

    session()->flash('create', 'Berita Acara perjalanan berhasil diunggah!');
    return redirect("/beperjalanadinasba/{$bantek->id}");
}



public function bedinaspetugas()
{
    $user = Auth::user();
    $dataakun = User::where('statusadmin_id', 8)->get();

    if (!$user) {
        return redirect()->route('login');
    }

    return view('backend.11_perjalanandinas.08_buatpetugasdinas', [
        'title' => 'Buat Petugas Dinas DPUPR Kab Blora',
        'user'  => $user,
        'dataakun'  => $dataakun
    ]);
}

public function bedinaspetugasnew(Request $request)
{
    // Ambil user yang sedang login
    // $user = Auth::user();

    // Validasi data input
    $validated = $request->validate([
        'user_id' => 'required|string',
        'namalengkap' => 'required|string|max:255',
        'nip' => 'required|string|max:100',
        'pangkat' => 'required|string|max:100',
        'jabatan' => 'required|string|max:100',
        'tingkatbiaya' => 'required|string|max:100',
    ], [
        'user_id.required' => 'Akun wajib dipilih.',
        'user_id.exists' => 'User tidak ditemukan.',
        'namalengkap.required' => 'Nama lengkap wajib diisi.',
        'nip.required' => 'NIP wajib diisi.',
        'pangkat.required' => 'Pangkat wajib diisi.',
        'jabatan.required' => 'Jabatan wajib diisi.',
        'tingkatbiaya.required' => 'Tingkat biaya wajib diisi.',
    ]);

    // Simpan data ke database
    $data = new petugasdinas();
    $data->user_id = $validated['user_id'];
    $data->namalengkap = $validated['namalengkap'];
    $data->nip = $validated['nip'];
    $data->pangkat = $validated['pangkat'];
    $data->jabatan = $validated['jabatan'];
    $data->tingkatbiaya = $validated['tingkatbiaya'];
    $data->save();

    session()->flash('create', 'Data berhasil disimpan.');
    return redirect()->route('bepetugasdinasindex'); // Ganti dengan nama route index yang sesuai
}


public function bedinaspetugasupdate($id)
{
    $user = Auth::user();
    $dataakun = User::where('statusadmin_id', 8)->get();

    if (!$user) {
        return redirect()->route('login');
    }

    // Ambil data petugas berdasarkan ID
    $data = petugasdinas::findOrFail($id); // Ganti 'PetugasDinas' dengan nama model sesuai tabel kamu

    return view('backend.11_perjalanandinas.09_updatepetugasdinas', [
        'title' => 'Update Petugas Dinas DPUPR Kab Blora',
        'user'  => $user,
        'dataakun'  => $dataakun,
        'data' => $data
    ]);
}

public function bedinaspetugasnewupdate(Request $request, $id)
{
    // Validasi data input
    $validated = $request->validate([
        'user_id' => 'required|string',
        'namalengkap' => 'required|string|max:255',
        'nip' => 'required|string|max:100',
        'pangkat' => 'required|string|max:100',
        'jabatan' => 'required|string|max:100',
        'tingkatbiaya' => 'required|string|max:100',
    ], [
        'user_id.required' => 'Akun wajib dipilih.',
        'user_id.exists' => 'User tidak ditemukan.',
        'namalengkap.required' => 'Nama lengkap wajib diisi.',
        'nip.required' => 'NIP wajib diisi.',
        'pangkat.required' => 'Pangkat wajib diisi.',
        'jabatan.required' => 'Jabatan wajib diisi.',
        'tingkatbiaya.required' => 'Tingkat biaya wajib diisi.',
    ]);

    // Ambil data berdasarkan ID
    $data = petugasdinas::findOrFail($id);

    // Update data
    $data->user_id = $validated['user_id'];
    $data->namalengkap = $validated['namalengkap'];
    $data->nip = $validated['nip'];
    $data->pangkat = $validated['pangkat'];
    $data->jabatan = $validated['jabatan'];
    $data->tingkatbiaya = $validated['tingkatbiaya'];
    $data->save();

    session()->flash('update', 'Data berhasil diperbarui.');
    return redirect()->route('bepetugasdinasindex'); // Ganti dengan nama route index yang sesuai
}


}



