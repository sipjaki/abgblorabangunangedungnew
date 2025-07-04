<?php

namespace App\Http\Controllers;

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


}




