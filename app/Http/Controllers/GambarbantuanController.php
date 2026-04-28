<?php

namespace App\Http\Controllers;

use App\Models\bglapangan;
use App\Models\cadangan1;
use App\Models\fungsibangunangambar;
use App\Models\gambarbantuan;
use App\Models\jenispermohonangambar;
use Illuminate\Support\Str;  // Tambahkan ini untuk mengimpor kelas Str
use Illuminate\Support\Facades\File;
use App\Models\kecamatanblora;
use App\Models\kelurahandesa;
use App\Models\surattugaspbg;
use App\Models\User;
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
    $bantek = gambarbantuan::findOrFail($id);

    // Validasi semua berkas (boleh salah satu saja yang dikirim)
    $request->validate([
        'dokumengambar' => 'nullable|mimes:pdf|max:7048',
        'beritaacarasidang' => 'nullable|mimes:pdf|max:7048',
        'foto1' => 'nullable|image|mimes:jpg,jpeg,png|max:5048',
        'foto2' => 'nullable|image|mimes:jpg,jpeg,png|max:5048',
    ], [
        'dokumengambar.mimes' => 'Dokumen Gambar harus berupa file PDF.',
        'dokumengambar.max' => 'Ukuran maksimum untuk Dokumen Gambar adalah 7MB.',

        'beritaacarasidang.mimes' => 'Berita Acara Sidang harus berupa file PDF.',
        'beritaacarasidang.max' => 'Ukuran maksimum untuk Berita Acara Sidang adalah 7MB.',

        'foto1.mimes' => 'Foto 1 harus berupa file JPG, JPEG, atau PNG.',
        'foto1.max' => 'Ukuran maksimum untuk Foto 1 adalah 5MB.',

        'foto2.mimes' => 'Foto 2 harus berupa file JPG, JPEG, atau PNG.',
        'foto2.max' => 'Ukuran maksimum untuk Foto 2 adalah 5MB.',
    ]);

    // Upload dokumengambar
    if ($request->hasFile('dokumengambar')) {
        $file = $request->file('dokumengambar');
        $filename = 'dokumen-gambar-' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $path = '09_bantuangambar/02_berkassurat/';
        $file->move(public_path($path), $filename);
        $bantek->dokumengambar = $path . $filename;
    }

    // Upload beritaacarasidang
    if ($request->hasFile('beritaacarasidang')) {
        $file = $request->file('beritaacarasidang');
        $filename = 'berita-acara-' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $path = '09_bantuangambar/03_bertaacara_sidan/';
        $file->move(public_path($path), $filename);
        $bantek->beritaacarasidang = $path . $filename;
    }

    // Upload foto1
    if ($request->hasFile('foto1')) {
        $file = $request->file('foto1');
        $filename = 'foto1-' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $path = '09_bantuangambar/04_foto/';
        $file->move(public_path($path), $filename);
        $bantek->foto1 = $path . $filename;
    }

    // Upload foto2
    if ($request->hasFile('foto2')) {
        $file = $request->file('foto2');
        $filename = 'foto2-' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $path = '09_bantuangambar/04_foto/';
        $file->move(public_path($path), $filename);
        $bantek->foto2 = $path . $filename;
    }

    // Simpan semua perubahan
    $bantek->save();

    session()->flash('create', 'Dokumen berhasil diunggah!');
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

public function feformbantuangambar()
{
    $datakecamatan = kecamatanblora::all();
    $datakelurahan = kelurahandesa::all();
    $jenispermohonan = jenispermohonangambar::all();
    $fungsibangunan = fungsibangunangambar::all();

    // $user = Auth::user();
    $dinas_id = Auth::id(); // ambil hanya ID akun yang login

    // $statusadimindinas = User::with('statusadmin')
    //     ->where('statusadmin_id', 3)
    //     ->get();

    return view('frontend.abgblora.08_bantuangambar.02_formulir.02_pendaftaran', [
        'title' => 'Form Pengajuan Bantuan Teknis Gambar',
        'datakecamatan' => $datakecamatan,
        'datakelurahan' => $datakelurahan,
        'jenispermohonan' => $jenispermohonan,
        'fungsibangunan' => $fungsibangunan,
        // 'user' => $user,
        'dinas_id' => $dinas_id, // dikirim ke view
        // 'statusadimindinas' => $statusadimindinas,
    ]);
}


public function feformbantuangambarcreate(Request $request)
{
    $validated = $request->validate([
        'user_id' => 'nullable|string',
        'kecamatanblora_id' => 'nullable|string',
        'kelurahandesa_id' => 'nullable|string',
        'jenispermohonangambar_id' => 'nullable|string',
        'fungsibangunangambar_id' => 'nullable|string',

        'namapemohon' => 'required|string',
        'email' => 'nullable|email',
        'alamatpemohon' => 'nullable|string',
        'nomortelepon' => 'required|string',
        'nikktp' => 'nullable|string',
        'lokasibangunan' => 'nullable|string',
        'koordinat' => 'nullable|string',
        'klasifikasibangunan' => 'nullable|string',
        'luasbangunan' => 'nullable|string',
        'tinggibangunan' => 'nullable|string',
        'tanggalpermohonan' => 'nullable|string',
        'jumlahlantai' => 'nullable|string',
        'peruntukanuntuk' => 'nullable|string',

        'ktp' => 'nullable|file|mimes:pdf|max:15120',
        'npwp' => 'nullable|file|mimes:pdf|max:15120',
        'lampiranoss' => 'nullable|file|mimes:pdf|max:15120',
        'dokvalidasi' => 'nullable|file|mimes:pdf|max:15120',
        'sertifikattanah' => 'nullable|file|mimes:pdf|max:15120',
        'buktipbb' => 'nullable|file|mimes:pdf|max:15120',
        'siteplan' => 'nullable|file|mimes:pdf|max:15120',
        'tandatangan' => 'nullable|file|mimes:pdf|max:15120',
    ]);

    // Folder penyimpanan
    $folders = [
        'ktp' => '09_bantuangambar/01_ktp',
        'npwp' => '09_bantuangambar/02_npwp',
        'lampiranoss' => '09_bantuangambar/03_lampiranoss',
        'dokvalidasi' => '09_bantuangambar/04_dokvalidasi',
        'sertifikattanah' => '09_bantuangambar/05_sertifikattanah',
        'buktipbb' => '09_bantuangambar/06_buktipbb',
        'siteplan' => '09_bantuangambar/07_siteplan',
        'tandatangan' => '09_bantuangambar/08_tandatangan',
    ];

    // Buat folder jika belum ada
    foreach ($folders as $folder) {
        if (!file_exists(public_path($folder))) {
            mkdir(public_path($folder), 0777, true);
        }
    }

    // Upload berkas dan simpan path-nya
    $uploadedFiles = [];
    foreach ($folders as $field => $path) {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $filename = $field . '_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($path), $filename);
            $uploadedFiles[$field] = $path . '/' . $filename;
        } else {
            $uploadedFiles[$field] = null;
        }
    }

    // Simpan ke database
    $data = new gambarbantuan(); // ganti dengan model sesuai
    $data->user_id = $validated['user_id'] ?? null;
    $data->kecamatanblora_id = $validated['kecamatanblora_id'] ?? null;
    $data->kelurahandesa_id = $validated['kelurahandesa_id'] ?? null;
    $data->jenispermohonangambar_id = $validated['jenispermohonangambar_id'] ?? null;
    $data->fungsibangunangambar_id = $validated['fungsibangunangambar_id'] ?? null;
    $data->namapemohon = $validated['namapemohon'] ?? null;
    $data->email = $validated['email'] ?? null;
    $data->alamatpemohon = $validated['alamatpemohon'] ?? null;
    $data->nomortelepon = $validated['nomortelepon'] ?? null;
    $data->nikktp = $validated['nikktp'] ?? null;
    $data->lokasibangunan = $validated['lokasibangunan'] ?? null;
    $data->koordinat = $validated['koordinat'] ?? null;
    $data->klasifikasibangunan = $validated['klasifikasibangunan'] ?? null;
    $data->luasbangunan = $validated['luasbangunan'] ?? null;
    $data->tinggibangunan = $validated['tinggibangunan'] ?? null;
    $data->tanggalpermohonan = $validated['tanggalpermohonan'] ?? null;
    $data->jumlahlantai = $validated['jumlahlantai'] ?? null;
    $data->peruntukanuntuk = $validated['peruntukanuntuk'] ?? null;

    $data->ktp = $uploadedFiles['ktp'] ?? null;
    $data->npwp = $uploadedFiles['npwp'] ?? null;
    $data->lampiranoss = $uploadedFiles['lampiranoss'] ?? null;
    $data->dokvalidasi = $uploadedFiles['dokvalidasi'] ?? null;
    $data->sertifikattanah = $uploadedFiles['sertifikattanah'] ?? null;
    $data->buktipbb = $uploadedFiles['buktipbb'] ?? null;
    $data->siteplan = $uploadedFiles['siteplan'] ?? null;
    $data->tandatangan = $uploadedFiles['tandatangan'] ?? null;

    $data->save();

    session()->flash('create', 'Permohonan bantuan teknis gambar berhasil diajukan!');
    return redirect('/dashboard');
}

public function bebantuangambarpemohon(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 15);

    // Hanya ambil data milik user yang login
    $query = gambarbantuan::where('user_id', $user->id);

    // Filter pencarian
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

    return view('backend.09_bantuangambar.00_pemohon.01_berkaspemohon', [
        'title' => 'Permohonan Bantuan Teknis Gambar Bangunan Gedung Saudara',
        'data' => $data,
        'user' => $user,
    ]);
}



public function perkonsultanperencana(Request $request)
    {

        // Kalau request biasa (GET halaman utama)
        $user = Auth::user();

        return view('frontend.abgblora.09_fiturbaru.01_konsultanperencana.01_konsultanperencana', [
            'user' => $user,
            'title' => 'Permohonan Konsultan Perencana Teknis'
        ]);
    }


    public function perkonsultanperencanacreate(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([

            'cadangan1' => 'required|string|max:255',
            'cadangan2' => 'required|string|max:255',
            'cadangan3' => 'required|string|max:255',
            'cadangan4' => 'required|string|max:255',

            'cadangan5' => 'nullable|file|mimes:pdf|max:20048',
            'cadangan6' => 'nullable|file|mimes:pdf|max:20048',

            ], [
            // Custom error messages
            'cadangan1.required' => 'Nama Badan Usaha Wajib Diisi !',
            'cadangan2.required' => 'Nama Direktur Utama Wajib Diisi !',
            'cadangan3.required' => 'No Telepon Wajib Diisi !',
            'cadangan4.required' => 'Alamat Badan Usaha Wajib Diisi !',

            'cadangan5.required' => 'Company Profile Wajib di Upload!',
            'cadangan5.max' => 'Ukuran file Maksimal 20MB!',
            'cadangan5.mimes' => 'File Harus PDF !',

            'cadangan6.required' => 'Surat Permohonan Wajib di Upload!',
            'cadangan6.max' => 'Ukuran file Maksimal 20MB!',
            'cadangan6.mimes' => 'File Harus PDF !',

            ]);

        // Setup for file upload
        $filePaths = [];

        // Define the folder paths for each file field
        $fileFields = [
            'cadangan5' => '09_konsultanperencana/01_berkascp',
            'cadangan6' => '09_konsultanperencana/02_suratpermohonankonsultan',

            ];

        // Loop through each file field and handle the upload
        foreach ($fileFields as $field => $folder) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
                $path = public_path($folder);
                // Create directory if it does not exist
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0775, true);
                }

                // Move the file to the correct folder
                $file->move($path, $filename);
                $filePaths[$field] = $folder . '/' . $filename;
            }
        }

        // Save all data to the database
        cadangan1::create([

            'cadangan1' => $validatedData['cadangan1'] ?? null,
            'cadangan2' => $validatedData['cadangan2'] ?? null,
            'cadangan3' => $validatedData['cadangan3'] ?? null,
            'cadangan4' => $validatedData['cadangan4'] ?? null,

            'cadangan5' => $filePaths['cadangan5'] ?? null,
            'cadangan6' => $filePaths['cadangan6'] ?? null,

            ]);

        session()->flash('create', 'Permohonan Anda Berhasil Dibuat!');
        return redirect('/');

        }



        public function bedataperkonsultan(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 10);

    $query = cadangan1::query();

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('cadangan1', 'like', "%{$search}%")
              ->orWhere('cadangan2', 'like', "%{$search}%")
              ->orWhere('cadangan3', 'like', "%{$search}%")
              ->orWhere('cadangan4', 'like', "%{$search}%");
        });
    }

    $bujk = $query->latest()->paginate($perPage)->appends($request->all());

    return view('frontend.abgblora.09_fiturbaru.01_konsultanperencana.02_datapermohonanpengkajiteknis', [
        'title' => 'Daftar Permohonan Konsultan Pengkaji Teknis',
        'data'  => $bujk,
        'user'  => $user,
    ]);
}


}




