<?php

namespace App\Http\Controllers;

use App\Models\bglapangan;
use App\Models\gambarbantuan;
use Illuminate\Support\Str;  // Tambahkan ini untuk mengimpor kelas Str
use Illuminate\Support\Facades\File;
use App\Models\kecamatanblora;
use App\Models\kelurahandesa;
use App\Models\surattugaspbg;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class GambarbantuanController extends Controller
{

public function bebantuangambar(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 15);

    $query = gambarbantuan::query();

    // Filter pencarian berdasarkan kolom sesuai yang kamu berikan
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('namapemohon', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('alamatpemohon', 'like', "%{$search}%")
              ->orWhere('nomortelepon', 'like', "%{$search}%");

            $q->orWhereHas('kecamatanblora', function ($sub) use ($search) {
                $sub->where('kecamatanblora', 'like', "%{$search}%");
            });

            $q->orWhereHas('kelurahandesa', function ($sub) use ($search) {
                $sub->where('desa', 'like', "%{$search}%");
            });

            $q->orWhereHas('user', function ($sub) use ($search) {
                $sub->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        });
    }

    $data = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.09_bantuangambar.01_berkaspermohonan.01_berkas', [
        'title' => 'Permohonan Bantuan Gambar Bangunan Gedung',
        'data' => $data,
        'user' => $user,
    ]);
}


        public function bebantuangambarshow($id)
{
    // Cari data berdasarkan ID
    $data = gambarbantuan::findOrFail($id);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Tampilkan ke view dengan key-value
    return view('backend.09_bantuangambar.01_berkaspermohonan.02_berkaspermohonanbantuangambar', [
        'title' => 'Berkas Permohonan Bantuan Gambar Pemohon',
        'data' => $data,
        'user' => $user
    ]);
}

  public function verifikasi1permohonan(Request $request, $id)
    {
        $data = gambarbantuan::findOrFail($id);

        $request->validate([
            'verifikasi1' => 'required|in:lolos,dikembalikan',
        ]);

        $data->verifikasi1 = $request->verifikasi1;
        $data->save();

     if ($request->verifikasi1 === 'lolos') {
        session()->flash('create', '✅ Data Lolos Verifikasi !');
    } else {
        session()->flash('gagal', '❌ Data Di Kembalikan Ke Pemohon !');
    }
           return redirect('/bebantuangambar');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


    public function bebantuangambarvalidasi(Request $request, $id)
{
    // Validasi input wajib & opsional
    $request->validate([
        'verifikasiktp' => 'required|in:sesuai,tidak_sesuai',
        'verifikasinpwp' => 'required|in:sesuai,tidak_sesuai',
        'verifikasisert' => 'required|in:sesuai,tidak_sesuai',
        'verifikasioss' => 'required|in:sesuai,tidak_sesuai',
        'verifikasipbb' => 'required|in:sesuai,tidak_sesuai',
        'verifikasidokval' => 'required|in:sesuai,tidak_sesuai',
        'verifikasisiteplan' => 'required|in:sesuai,tidak_sesuai',
        'verifikasittd' => 'required|in:sesuai,tidak_sesuai',
        'catatanvalidasi' => 'nullable|string',
    ]);

    // Cari peserta berdasarkan ID
    $item = gambarbantuan::findOrFail($id);

    // Simpan data
    $item->update([
        'verifikasiktp' => $request->verifikasiktp,
        'verifikasinpwp' => $request->verifikasinpwp,
        'verifikasisert' => $request->verifikasisert,
        'verifikasioss' => $request->verifikasioss,
        'verifikasipbb' => $request->verifikasipbb,
        'verifikasidokval' => $request->verifikasidokval,
        'verifikasisiteplan' => $request->verifikasisiteplan,
        'verifikasittd' => $request->verifikasittd,
        'catatanvalidasi' => $request->catatanvalidasi,
    ]);

    // Flash message
    session()->flash('update', 'Berkas ini sudah di verifikasi !');

    // Redirect ke route bernama bebantuanteknis.show
    return redirect()->route('bebantuangambar.show', ['id' => $id]);
}



public function bebantuangambarperbaikan($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = gambarbantuan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.09_bantuangambar.01_berkaspermohonan.03_perbaikanbantuangambar', [
        'title' => 'Perbaikan Data Permohonan Bantuan Gambar !',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebantuangambarperbaikannew(Request $request, $id)
{
    $bantuan = gambarbantuan::findOrFail($id);

    // Validasi input
    $request->validate([
        'luasbangunan' => 'nullable|string',
        'jumlahlantai' => 'nullable|string',

        'ktp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'npwp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'sertifikattanah' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'lampiranoss' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'buktipbb' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'dokvalidasi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'siteplan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'tandatangan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
    ]);

    // Update input utama
    $bantuan->luasbangunan = $request->luasbangunan;
    $bantuan->jumlahlantai = $request->jumlahlantai;

    // Mapping dokumen ke path (alamat baru)
    $dokumenMap = [
        'ktp' => '09_bantuangambar/01_pemohonberkas/01_ktp',
        'npwp' => '09_bantuangambar/01_pemohonberkas/02_npwp',
        'sertifikattanah' => '09_bantuangambar/01_pemohonberkas/03_sertifikattanah',
        'lampiranoss' => '09_bantuangambar/01_pemohonberkas/04_lampiranoss',
        'buktipbb' => '09_bantuangambar/01_pemohonberkas/05_buktipbb',
        'dokvalidasi' => '09_bantuangambar/01_pemohonberkas/06_dokvalidasi',
        'siteplan' => '09_bantuangambar/01_pemohonberkas/07_siteplan',
        'tandatangan' => '09_bantuangambar/01_pemohonberkas/08_tandatangan',
    ];

    foreach ($dokumenMap as $field => $path) {
        if ($request->hasFile($field)) {
            // Hapus file lama jika ada
            if ($bantuan->$field && file_exists(public_path($bantuan->$field))) {
                unlink(public_path($bantuan->$field));
            }

            $file = $request->file($field);
            $filename = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path($path);

            // Pastikan folder tujuan ada
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0755, true);
            }

            $file->move($destinationPath, $filename);
            $bantuan->$field = $path . '/' . $filename;
        }
    }

    // Reset status verifikasi agar diverifikasi ulang
    $bantuan->verifikasiktp = null;
    $bantuan->verifikasinpwp = null;
    $bantuan->verifikasisert = null;
    $bantuan->verifikasioss = null;
    $bantuan->verifikasipbb = null;
    $bantuan->verifikasidokval = null;
    $bantuan->verifikasisiteplan = null;
    $bantuan->verifikasittd = null;
    $bantuan->verifikasi1 = null;

    $bantuan->save();

    session()->flash('update', 'Perbaikan Berkas Anda Berhasil!');
    return redirect()->route('bebantuangambar.show', ['id' => $bantuan->id]);
}



public function bepbgsurattugasgambar($id)
{
    // Ambil user login
    $user = Auth::user();

    // Cari data pbg berdasarkan ID
    $data = gambarbantuan::findOrFail($id);

    // Ambil semua data surat pemberitahuan berdasarkan pbgslfbangunan_id tanpa pagination
$subdatapemilik = surattugaspbg::where('gambarbantuan_id', $data->id)->get();

    // Kirim data ke view
    return view('backend.09_bantuangambar.01_berkaspermohonan.04_surattugas', [
        'title' => 'Surat Tugas Permohonan Bantuan Gambar',
        'title_halaman' => 'Surat Tugas Permohonan Bantuan Gambar' ,
        'user' => $user,
        'data' => $data,
        // 'datafasi' => $data,
        'subdatapemilik' => $subdatapemilik,
    ]);
}



  public function verifikasi1permohonan2(Request $request, $id)
    {
        $data = gambarbantuan::findOrFail($id);

        $request->validate([
            'verifikasi2' => 'required|in:sudah,belum',
        ]);

        $data->verifikasi2 = $request->verifikasi2;
        $data->save();

     if ($request->verifikasi2 === 'sudah') {
        session()->flash('create', '✅ Surat Tugas Selesai!');
    } else {
        session()->flash('gagal', '❌ Surat Tugas Di Batalkan !');
    }
           return redirect('/bebantuangambar');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }

    public function bebantuangambarlap($id)
{
    $databantuanteknis = gambarbantuan::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = bglapangan::where('gambarbantuan_id', $databantuanteknis->id)->paginate(50);

    return view('backend.09_bantuangambar.01_berkaspermohonan.05_ceklapanganbantuangam', [
        'title' => 'Dokumentasi Lapangan Bantuan Gambar',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebantuangambarlapcreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = gambarbantuan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.09_bantuangambar.01_berkaspermohonan.06_createlapbantuangambar', [
        'title' => 'Form Dokumentasi Lapangan Bantuan Gambar',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bebantuangambarlapcreatenew(Request $request)
{
    $validated = $request->validate([
        'gambarbantuan_id' => 'required|string',
        'kegiatan' => 'required|string',
        'tanggalkegiatan' => 'required|date',
        'berkasdukung1' => 'nullable|mimes:pdf|max:10240',
        'berkasdukung2' => 'nullable|mimes:pdf|max:10240',
        'foto1' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
    ], [
        'gambarbantuan_id.required' => 'bantuanteknis_id wajib diisi.',
        'kegiatan.required' => 'Nama Kegiatan wajib diisi.',
        'tanggalkegiatan.required' => 'Tanggal kegiatan wajib diisi.',
        // 'foto1.required' => 'Foto Dokumentasi 1 wajib diunggah.',
        // 'foto1.image' => 'Foto Dokumentasi 1 harus berupa file gambar.',
        // 'foto1.mimes' => 'Foto Dokumentasi 1 harus berformat jpeg, png, jpg, gif, atau svg.',
        // 'foto1.max' => 'Ukuran foto Dokumentasi 1 maksimal 7MB.',
        // tambahkan pesan validasi lainnya jika perlu
    ]);

    $data = new bglapangan();
    $data->gambarbantuan_id = $validated['gambarbantuan_id'];
    $data->kegiatan = $validated['kegiatan'];
    $data->tanggalkegiatan = $validated['tanggalkegiatan'];

    // Upload berkasdukung1
    if ($request->hasFile('berkasdukung1')) {
        $file = $request->file('berkasdukung1');
        $filename = time() . '_01_file.' . $file->getClientOriginalExtension();
        $file->move(public_path('09_bantuangambar/01_berkaslapangan'), $filename);
        $data->berkasdukung1 = '09_bantuangambar/01_berkaslapangan/' . $filename;
    }

    // Upload berkasdukung2
    if ($request->hasFile('berkasdukung2')) {
        $file = $request->file('berkasdukung2');
        $filename = time() . '_02_file.' . $file->getClientOriginalExtension();
        $file->move(public_path('09_bantuangambar/01_berkaslapangan'), $filename);
        $data->berkasdukung2 = '09_bantuangambar/01_berkaslapangan/' . $filename;
    }

    // Upload foto1
    if ($request->hasFile('foto1')) {
        $file = $request->file('foto1');
        $filename = time() . '_03_file.' . $file->getClientOriginalExtension();
        $file->move(public_path('09_bantuangambar/01_berkaslapangan'), $filename);
        $data->foto1 = '09_bantuangambar/01_berkaslapangan/' . $filename;
    }

    // Upload foto2
    if ($request->hasFile('foto2')) {
        $file = $request->file('foto2');
        $filename = time() . '_04_file.' . $file->getClientOriginalExtension();
        $file->move(public_path('09_bantuangambar/01_berkaslapangan'), $filename);
        $data->foto2 = '09_bantuangambar/01_berkaslapangan/' . $filename;
    }

    // Upload foto3
    if ($request->hasFile('foto3')) {
        $file = $request->file('foto3');
        $filename = time() . '_05_file.' . $file->getClientOriginalExtension();
        $file->move(public_path('09_bantuangambar/01_berkaslapangan'), $filename);
        $data->foto3 = '09_bantuangambar/01_berkaslapangan/' . $filename;
    }

    // Upload foto4
    if ($request->hasFile('foto4')) {
        $file = $request->file('foto4');
        $filename = time() . '_06_file.' . $file->getClientOriginalExtension();
        $file->move(public_path('09_bantuangambar/01_berkaslapangan'), $filename);
        $data->foto4 = '09_bantuangambar/01_berkaslapangan/' . $filename;
    }

    // Upload foto5
    if ($request->hasFile('foto5')) {
        $file = $request->file('foto5');
        $filename = time() . '_07_file.' . $file->getClientOriginalExtension();
        $file->move(public_path('09_bantuangambar/01_berkaslapangan'), $filename);
        $data->foto5 = '09_bantuangambar/01_berkaslapangan/' . $filename;
    }

    // Upload foto6
    if ($request->hasFile('foto6')) {
        $file = $request->file('foto6');
        $filename = time() . '_08_file.' . $file->getClientOriginalExtension();
        $file->move(public_path('09_bantuangambar/01_berkaslapangan'), $filename);
        $data->foto6 = '09_bantuangambar/01_berkaslapangan/' . $filename;
    }

    $data->save();

    session()->flash('create', 'Dokumentasi Berhasil Di Buat !');

    return redirect()->route('bebantuangambarlap.show', ['id' => $validated['gambarbantuan_id']]);
}



// DELETE CEK LAPANGAN
public function bebantuangambarlapdelete($id)
{
    // Cari entri berdasarkan ID
    $entry = bglapangan::where('id', $id)->first();

    if ($entry) {
        // Simpan dulu lapangan_id sebelum entri dihapus
        $lapanganId = $entry->gambarbantuan_id;

        // Hapus file jika ada (aktifkan jika memang simpan file)
        // if (Storage::disk('public')->exists($entry->header)) {
        //     Storage::disk('public')->delete($entry->header);
        // }

        // Hapus data dari database
        $entry->delete();

        // Redirect ke halaman detail lapangan terkait
        return redirect()->route('bebantuangambarlap.show', ['id' => $lapanganId])
                         ->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}




  public function verifikasi1permohonan3(Request $request, $id)
    {
        $data = gambarbantuan::findOrFail($id);

        $request->validate([
            'verifikasi3' => 'required|in:sudah,belum',
        ]);

        $data->verifikasi3 = $request->verifikasi3;
        $data->save();

     if ($request->verifikasi3 === 'sudah') {
        session()->flash('create', '✅ Dok Lapangan Sudah Selesai!');
    } else {
        session()->flash('gagal', '❌ Dok Lapangan Di Batalkan !');
    }
           return redirect('/bebantuangambar');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }



  public function verifikasi1permohonan4(Request $request, $id)
    {
        $data = gambarbantuan::findOrFail($id);

        $request->validate([
            'verifikasi4' => 'required|in:sudah,belum',
        ]);

        $data->verifikasi4 = $request->verifikasi4;
        $data->save();

     if ($request->verifikasi4 === 'sudah') {
        session()->flash('create', '✅ Gambar di Terbitkan!');
    } else {
        session()->flash('gagal', '❌ Permohonan ini Di batalkan !');
    }
           return redirect('/bebantuangambar');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


    public function bebantuangambarupload($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = gambarbantuan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.09_bantuangambar.01_berkaspermohonan.07_uploadbantuangambar', [
        'title' => 'Upload Berkas Gambar Permohonan Bantuan Gambar Bangunan Gedung',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}
public function bebantuangambaruploadnew(Request $request, $id)
{
    $bantek = gambarbantuan::findOrFail($id); // Tetap digunakan

    // Validasi
    $request->validate([
        'dokumengambar' => 'required|mimes:pdf|max:7048',
    ], [
        'dokumengambar.required' => 'File Dokumen Gambar wajib diunggah.',
        'dokumengambar.mimes' => 'File harus berupa format PDF.',
        'dokumengambar.max' => 'Ukuran file maksimal 7MB.',
    ]);

    if ($request->hasFile('dokumengambar')) {
        $file = $request->file('dokumengambar');

        $filename = 'dokumen-gambar-' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('09_bantuangambar/02_berkassurat');

        // Buat folder jika belum ada
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $filename);
        $filePath = '09_bantuangambar/02_berkassurat/' . $filename;

        // Update kolom di database
        $bantek->dokumengambar = $filePath;
        $bantek->save();
    }

    session()->flash('create', 'Dokumen Bantuan Gambar berhasil diunggah!');
    return redirect("/bebantuangambarupload/{$bantek->id}");
}



public function bebantuangambardelete($id)
{
    // Cari item berdasarkan judul
    $entry = gambarbantuan::where('id', $id)->first();

    if ($entry) {
        // Jika ada file header yang terdaftar, hapus dari storage
        // if (Storage::disk('public')->exists($entry->header)) {
            //     Storage::disk('public')->delete($entry->header);
            // }

            // Hapus entri dari database
            $entry->delete();

            // Redirect atau memberi respons sesuai kebutuhan
            return redirect('/bebantuangambar')->with('delete', 'Data Berhasil Di Hapus !');

        }

        return redirect()->back()->with('error', 'Item not found');
    }

    public function bepbgsurattugasuploadnbro(Request $request, $id)
{
    $request->validate([
        'uploadsurattugas' => 'required|mimes:pdf|max:20480', // max 20MB
    ]);

    $data = surattugaspbg::findOrFail($id); // ganti YourModel sesuai model kamu

    if ($request->hasFile('uploadsurattugas')) {
        $file = $request->file('uploadsurattugas');
        $filename = 'surat_tugas_' . time() . '.' . $file->getClientOriginalExtension();
        $path = $file->move(public_path('uploads/surattugas'), $filename);

        $data->uploadsurattugas = 'uploads/surattugas/' . $filename;
        $data->save();
    }

    return back()->with('create', 'Surat tugas berhasil diupload.');
}


}




