<?php

namespace App\Http\Controllers;

use App\Models\banhibahberkas;
use App\Models\banhibahlapangan;
use App\Models\banhibahskbupati;
use App\Models\bantuanhibahbg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BantuanhibahbgController extends Controller
{
    /**
     * Menampilkan form perbaikan dokumen hibah berdasarkan user yang login
     */
   public function hibahdokcreate()
{
    // Ambil user login
    $user = Auth::user();

    // Kirim data ke view tanpa ambil dari database bantuanhibahbg
    return view('backend.10_bantuanhibah.01_createhibah', [
        'title' => 'Form Pengajuan Bantuan Hibah Baru',
        'user' => $user
    ]);
}

public function datanewhibahnew(Request $request)
{
    // Validasi input dengan custom messages
    $validated = $request->validate([
        'nomorproposal' => 'required|string|max:255',
        'tanggalproposal' => 'required|date',
        'instansi' => 'required|string|max:255',
        'intiproposal' => 'required|string',
        'narahubung' => 'required|string|max:255',
        'kontakperson' => 'required|string|max:255',
        'user_id' => 'required|string',
        'dokumenproposal' => 'nullable|file|mimes:pdf,doc,docx|max:15360', // 15MB in kilobytes
    ], [
        'nomorproposal.required' => 'Nomor proposal wajib diisi.',
        'nomorproposal.max' => 'Nomor proposal tidak boleh lebih dari 255 karakter.',

        'tanggalproposal.required' => 'Tanggal proposal wajib diisi.',
        'tanggalproposal.date' => 'Format tanggal proposal tidak valid.',

        'instansi.required' => 'Instansi yang mengajukan wajib diisi.',
        'instansi.max' => 'Nama instansi terlalu panjang.',

        'intiproposal.required' => 'Perihal/Isi proposal wajib diisi.',

        'narahubung.required' => 'Narahubung wajib diisi.',
        'narahubung.max' => 'Nama narahubung terlalu panjang.',

        'kontakperson.required' => 'Kontak person wajib diisi.',
        'kontakperson.max' => 'Nomor kontak terlalu panjang.',

        'user_id.required' => 'User ID tidak ditemukan.',
        'user_id.exists' => 'User tidak valid.',

        'dokumenproposal.file' => 'Dokumen harus berupa file.',
        'dokumenproposal.mimes' => 'Dokumen harus berupa PDF, DOC, atau DOCX.',
        'dokumenproposal.max' => 'Ukuran dokumen tidak boleh lebih dari 15MB.',
    ]);

    $dokumenPath = null;

    // Proses file upload
    if ($request->hasFile('dokumenproposal')) {
        $file = $request->file('dokumenproposal');
        $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

        $destinationPath = public_path('10_bantuanhibah/01_berkas');

        // Buat folder jika belum ada
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Pindahkan file ke folder public
        $file->move($destinationPath, $filename);

        // Simpan path relatif ke database
        $dokumenPath = '10_bantuanhibah/01_berkas/' . $filename;
    }

    // Simpan ke database
    bantuanhibahbg::create([
        'nomorproposal' => $validated['nomorproposal'],
        'tanggalproposal' => $validated['tanggalproposal'],
        'instansi' => $validated['instansi'],
        'intiproposal' => $validated['intiproposal'],
        'narahubung' => $validated['narahubung'],
        'kontakperson' => $validated['kontakperson'],
        'user_id' => $validated['user_id'],
        'dokumenproposal' => $dokumenPath,
    ]);


    session()->flash('create', 'Pengajuan Hibah Bangunan Berhasil!');
    return redirect()->route('dataallhibahbangunan.index');

}


public function dataallhibahbangunan(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 15);

    // Query dasar
    $query = bantuanhibahbg::query();

    // Filter pencarian jika ada input 'search'
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('nomorproposal', 'like', "%{$search}%")
              ->orWhere('tanggalproposal', 'like', "%{$search}%")
              ->orWhere('instansi', 'like', "%{$search}%")
              ->orWhere('intiproposal', 'like', "%{$search}%")
              ->orWhere('narahubung', 'like', "%{$search}%")
              ->orWhere('kontakperson', 'like', "%{$search}%")
              ->orWhereHas('user', function ($sub) use ($search) {
                  $sub->where('name', 'like', "%{$search}%")
                      ->orWhere('email', 'like', "%{$search}%");
              });
        });
    }

    // Ambil data utama paginasi
    $berkashibah = $query->latest()->paginate($perPage)->appends($request->all());

      $berkashibahIds = $berkashibah->pluck('id');

    // Ambil data sub dari relasi krkusahasurat
    $subdata1 = banhibahberkas::whereIn('bantuanhibahbg_id', $berkashibahIds)->get();

    return view('backend.10_bantuanhibah.02_alldatabantuanhibah', [
        'title' => 'Permohonan Hibah Bangunan Gedung',
        'data' => $berkashibah,
        'subdata' => $subdata1,
        'user' => $user,
    ]);
}

       public function banhibahpermohonan($id)
{
    // Cari data berdasarkan ID
    $data = bantuanhibahbg::findOrFail($id);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Tampilkan ke view dengan key-value
    return view('backend.10_bantuanhibah.03_permohonanhibah', [
        'title' => 'Informasi Proposal Bantuan Hibah Bangunan Gedung',
        'data' => $data,
        'user' => $user
    ]);
}


public function valhibahbantuan1(Request $request, $id)
    {
        $data = bantuanhibahbg::findOrFail($id);

        $request->validate([
            'verifikasi1' => 'required|in:sudah,belum',
        ]);

        $data->verifikasi1 = $request->verifikasi1;
        $data->save();

     if ($request->verifikasi1 === 'sudah') {
        session()->flash('create', '✅ Berkas Dukung Lengkap !');
    } else {
        session()->flash('gagal', '❌ Berkas Tidak Lengkap !');
    }
           return redirect('/dataallhibahbangunan');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


    public function dokhibahbantuanberkas($id)
{
    $databantuanteknis = bantuanhibahbg::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = banhibahberkas::where('bantuanhibahbg_id', $databantuanteknis->id)->paginate(50);

    return view('backend.10_bantuanhibah.04_berkasdukungsurvey', [
        'title' => 'Dokumen Berkas Dukung Hasil Survey',
        'data' => $dataceklapangan,
        'subdata' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function dokberkashibah($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanhibahbg::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.10_bantuanhibah.05_uploadberkassurvey', [
        'title' => 'Upload Berkas Survey Hibah Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);

}


public function dokberkashibahcreatenew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'bantuanhibahbg_id' => 'required|string',
        'berkas1' => 'nullable|file|mimes:pdf|max:10048',
        'berkas2' => 'nullable|file|mimes:pdf|max:10048',
        'berkas3' => 'nullable|file|mimes:pdf|max:10048',
        'berkas4' => 'nullable|file|mimes:pdf|max:10048',
        'berkas5' => 'nullable|file|mimes:pdf|max:10048',
        'berkas6' => 'nullable|file|mimes:pdf|max:10048',
    ], [
        'bantuanhibahbg_id.required' => 'KRK Usaha wajib dipilih.',
        'berkas1.mimes' => 'Berkas 1 harus berupa file PDF.',
        'berkas2.mimes' => 'Berkas 2 harus berupa file PDF.',
        'berkas3.mimes' => 'Berkas 3 harus berupa file PDF.',
        'berkas4.mimes' => 'Berkas 4 harus berupa file PDF.',
        'berkas5.mimes' => 'Berkas 5 harus berupa file PDF.',
        'berkas6.mimes' => 'Berkas 6 harus berupa file PDF.',
    ]);

    // Fungsi untuk simpan file
    function simpanBerkas($request, $field, $folder)
    {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $filename = time() . "_{$field}." . $file->getClientOriginalExtension();
            $file->move(public_path($folder), $filename);
            return $folder . '/' . $filename;
        }
        return null;
    }

    // Simpan ke model banhibahberkas
    $data = new banhibahberkas();
    $data->bantuanhibahbg_id = $validated['bantuanhibahbg_id'];
    $data->berkas1 = simpanBerkas($request, 'berkas1', '10_bantuanhibah/02_berkasdukung/01_simpan');
    $data->berkas2 = simpanBerkas($request, 'berkas2', '10_bantuanhibah/02_berkasdukung/02_simpan');
    $data->berkas3 = simpanBerkas($request, 'berkas3', '10_bantuanhibah/02_berkasdukung/03_simpan');
    $data->berkas4 = simpanBerkas($request, 'berkas4', '10_bantuanhibah/02_berkasdukung/04_simpan');
    $data->berkas5 = simpanBerkas($request, 'berkas5', '10_bantuanhibah/02_berkasdukung/05_simpan');
    $data->berkas6 = simpanBerkas($request, 'berkas6', '10_bantuanhibah/02_berkasdukung/06_simpan');
    $data->save();

    session()->flash('create', 'Data berkas pendukung berhasil disimpan!');
    return redirect()->route('dokhibahbantuanberkas.show', ['id' => $validated['bantuanhibahbg_id']]);
}


public function dokberkashibahcreatedelete($id)
{
    // Cari entri berdasarkan ID
    $entry = banhibahberkas::where('id', $id)->first();

    if ($entry) {
        // Simpan dulu lapangan_id sebelum entri dihapus
        $lapanganId = $entry->bantuanhibahbg_id;

        // Hapus file jika ada (aktifkan jika memang simpan file)
        // if (Storage::disk('public')->exists($entry->header)) {
        //     Storage::disk('public')->delete($entry->header);
        // }

        // Hapus data dari database
        $entry->delete();

        // Redirect ke halaman detail lapangan terkait
        return redirect()->route('dokhibahbantuanberkas.show', ['id' => $lapanganId])
                         ->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}


public function doklapbanhibah($id)
{
    $databantuanteknis = bantuanhibahbg::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = banhibahlapangan::where('bantuanhibahbg_id', $databantuanteknis->id)->paginate(50);

    return view('backend.10_bantuanhibah.06_doklapanganhibah', [
        'title' => 'Dokumentasi Cek Lapangan Hibah Bangunan',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function doklapbanhibahcreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanhibahbg::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.10_bantuanhibah.07_uploadfotohibah', [
        'title' => 'Form Dokumentasi Foto Cek Lapangan Bantuan Hibah ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function doklapbanhibahcreatenew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'bantuanhibahbg_id' => 'required|integer',
        'kegiatan' => 'required|string',
        'tanggalkegiatan' => 'required|date',
        'foto1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        'foto5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        'foto6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
    ], [
        'bantuanhibahbg_id.required' => 'ID Bantuan Hibah Bangunan wajib diisi.',
        'kegiatan.required' => 'Nama kegiatan wajib diisi.',
        'tanggalkegiatan.required' => 'Tanggal kegiatan wajib diisi.',
        'foto1.required' => 'Foto dokumentasi 1 wajib diunggah.',
        'foto1.image' => 'Foto 1 harus berupa gambar.',
        'foto1.mimes' => 'Format foto 1 harus jpeg, png, jpg, gif, svg.',
        'foto1.max' => 'Ukuran maksimum foto 1 adalah 10MB.',
        // Validasi lainnya otomatis mengikuti pola
    ]);

    // Simpan ke model banhibahlapangan
    $data = new banhibahlapangan(); // ganti dengan model kamu yang sesuai
    $data->bantuanhibahbg_id = $validated['bantuanhibahbg_id'];
    $data->kegiatan = $validated['kegiatan'];
    $data->tanggalkegiatan = $validated['tanggalkegiatan'];

    // Helper upload
    function simpanFilelapangan($request, $field, $folder)
    {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $filename = time() . "_{$field}." . $file->getClientOriginalExtension();
            $file->move(public_path($folder), $filename);
            return $folder . '/' . $filename;
        }
        return null;
    }

    // Simpan foto ke masing-masing folder
    $data->foto1 = simpanFilelapangan($request, 'foto1', '10_bantuanhibah/03_banhibahlapangan/01_simpan');
    $data->foto2 = simpanFilelapangan($request, 'foto2', '10_bantuanhibah/03_banhibahlapangan/02_simpan');
    $data->foto3 = simpanFilelapangan($request, 'foto3', '10_bantuanhibah/03_banhibahlapangan/03_simpan');
    $data->foto4 = simpanFilelapangan($request, 'foto4', '10_bantuanhibah/03_banhibahlapangan/04_simpan');
    $data->foto5 = simpanFilelapangan($request, 'foto5', '10_bantuanhibah/03_banhibahlapangan/05_simpan');
    $data->foto6 = simpanFilelapangan($request, 'foto6', '10_bantuanhibah/03_banhibahlapangan/06_simpan');

    $data->save();

        session()->flash('create', 'Dok Cek Lapangan Hibah Bangunan berhasil dibuat!');

    $id = $validated['bantuanhibahbg_id'];

    return redirect()->route('doklapbanhibah.show', ['id' => $id]);
}


public function doklapbanhibahcreatenewdelete($id)
{
    // Cari entri berdasarkan ID
    $entry = banhibahlapangan::where('id', $id)->first();

    if ($entry) {
        // Simpan dulu lapangan_id sebelum entri dihapus
        $lapanganId = $entry->bantuanhibahbg_id;

        // Hapus file jika ada (aktifkan jika memang simpan file)
        // if (Storage::disk('public')->exists($entry->header)) {
        //     Storage::disk('public')->delete($entry->header);
        // }

        // Hapus data dari database
        $entry->delete();

        // Redirect ke halaman detail lapangan terkait
        return redirect()->route('doklapbanhibah.show', ['id' => $lapanganId])
                         ->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}


  public function valberkashibah2(Request $request, $id)
    {
        $data = bantuanhibahbg::findOrFail($id);

        $request->validate([
            'verifikasi2' => 'required|in:sudah,belum',
        ]);

        $data->verifikasi2 = $request->verifikasi2;
        $data->save();

     if ($request->verifikasi2 === 'sudah') {
        session()->flash('create', '✅ Cek Lapangan Selesai !');
    } else {
        session()->flash('gagal', '❌ Cek Lapangan Di Hentikan !');
    }
           return redirect('/dataallhibahbangunan');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


    public function dokuploadskhibah($id)
{
    $databantuanteknis = bantuanhibahbg::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = banhibahskbupati::where('bantuanhibahbg_id', $databantuanteknis->id)->paginate(50);

    return view('backend.10_bantuanhibah.08_dokskbupati', [
        'title' => 'Berkas SK Bupati Bantuan Hibah Bangunan Gedung',
        'data' => $dataceklapangan,
        'subdata' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function dokuploadhibahskcreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanhibahbg::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.10_bantuanhibah.09_uploadskbupati', [
        'title' => 'Upload SK Bupati Hibah Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);

}


public function dokuploadhibahskcreatenew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'bantuanhibahbg_id' => 'required|string',
        'berkas1' => 'nullable|file|mimes:pdf|max:10048',
        'berkas2' => 'nullable|file|mimes:pdf|max:10048',
        'berkas3' => 'nullable|file|mimes:pdf|max:10048',
        'berkas4' => 'nullable|file|mimes:pdf|max:10048',
        'berkas5' => 'nullable|file|mimes:pdf|max:10048',
        'berkas6' => 'nullable|file|mimes:pdf|max:10048',
    ], [
        'bantuanhibahbg_id.required' => 'KRK Usaha wajib dipilih.',
        'berkas1.mimes' => 'Berkas 1 harus berupa file PDF.',
        'berkas2.mimes' => 'Berkas 2 harus berupa file PDF.',
        'berkas3.mimes' => 'Berkas 3 harus berupa file PDF.',
        'berkas4.mimes' => 'Berkas 4 harus berupa file PDF.',
        'berkas5.mimes' => 'Berkas 5 harus berupa file PDF.',
        'berkas6.mimes' => 'Berkas 6 harus berupa file PDF.',
    ]);

    // Fungsi untuk simpan file
    function simpanBerkasskbupati($request, $field, $folder)
    {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $filename = time() . "_{$field}." . $file->getClientOriginalExtension();
            $file->move(public_path($folder), $filename);
            return $folder . '/' . $filename;
        }
        return null;
    }

    // Simpan ke model banhibahberkas
    $data = new banhibahskbupati();
    $data->bantuanhibahbg_id = $validated['bantuanhibahbg_id'];
    $data->berkas1 = simpanBerkasskbupati($request, 'berkas1', '10_bantuanhibah/04_skberkas/01_simpan');
    $data->berkas2 = simpanBerkasskbupati($request, 'berkas2', '10_bantuanhibah/04_skberkas/02_simpan');
    $data->berkas3 = simpanBerkasskbupati($request, 'berkas3', '10_bantuanhibah/04_skberkas/03_simpan');
    $data->berkas4 = simpanBerkasskbupati($request, 'berkas4', '10_bantuanhibah/04_skberkas/04_simpan');
    $data->berkas5 = simpanBerkasskbupati($request, 'berkas5', '10_bantuanhibah/04_skberkas/05_simpan');
    $data->berkas6 = simpanBerkasskbupati($request, 'berkas6', '10_bantuanhibah/04_skberkas/06_simpan');
    $data->save();

    session()->flash('create', 'Data berkas pendukung berhasil disimpan!');
    return redirect()->route('dokuploadskhibah.show', ['id' => $validated['bantuanhibahbg_id']]);
}


public function dokuploadhibahskcrdelete($id)
{
    // Cari entri berdasarkan ID
    $entry = banhibahskbupati::where('id', $id)->first();

    if ($entry) {
        // Simpan dulu lapangan_id sebelum entri dihapus
        $lapanganId = $entry->bantuanhibahbg_id;

        // Hapus file jika ada (aktifkan jika memang simpan file)
        // if (Storage::disk('public')->exists($entry->header)) {
        //     Storage::disk('public')->delete($entry->header);
        // }

        // Hapus data dari database
        $entry->delete();

        // Redirect ke halaman detail lapangan terkait
        return redirect()->route('dokuploadskhibah.show', ['id' => $lapanganId])
                         ->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}


public function valberkashibah3(Request $request, $id)
    {
        $data = bantuanhibahbg::findOrFail($id);

        $request->validate([
            'verifikasi3' => 'required|in:sudah,belum',
        ]);

        $data->verifikasi3 = $request->verifikasi3;
        $data->save();

     if ($request->verifikasi3 === 'sudah') {
        session()->flash('create', '✅ SK Bupati Terbit !');
    } else {
        session()->flash('gagal', '❌ SK Bupati Tidak Terbit !');
    }
           return redirect('/dataallhibahbangunan');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }

        public function valberkashibah4(Request $request, $id)
    {
        $data = bantuanhibahbg::findOrFail($id);

        $request->validate([
            'verifikasi4' => 'required|in:sudah,belum',
        ]);

        $data->verifikasi4 = $request->verifikasi4;
        $data->save();

     if ($request->verifikasi4 === 'sudah') {
        session()->flash('create', '✅ Proses Selesai !');
    } else {
        session()->flash('gagal', '❌ Dihentikan !');
    }
           return redirect('/dataallhibahbangunan');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }

public function dokbebanhibahdelete($id)
{
    // Cari entri berdasarkan ID
    $entry = bantuanhibahbg::find($id);

    if ($entry) {
        // Hapus file jika ada (jika menyimpan file)
        // if (Storage::disk('public')->exists($entry->header)) {
        //     Storage::disk('public')->delete($entry->header);
        // }

        // Hapus data dari database
        $entry->delete();

        // Redirect ke halaman index krkusaha
        return redirect()->route('dataallhibahbangunan.index')->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}


public function bestatistikhibah()
{
    $user = Auth::user();
    $data = bantuanhibahbg::paginate(15); // Data paginasi

      $jumlahPerInstansi = bantuanhibahbg::select('instansi')
            ->selectRaw('COUNT(*) as total')
            ->groupBy('instansi')
            ->get();

    $datajumlahbantuanhibahdinas = bantuanhibahbg::where('instansi')->count();

    $datajumlahbantuanhibah = bantuanhibahbg::count(); // Hitung total semua data

      $datajumlahbantuanhibah_dikembalikan = bantuanhibahbg::where('verifikasi1', 'belum')->count();

        $datajumlahdok_lapangan = bantuanhibahbg::where('verifikasi2', 'sudah')->count();

            $datajumlahsk_terbit = bantuanhibahbg::where('verifikasi3', 'sudah')->count();

                $datajumlahsk_selesai = bantuanhibahbg::where('verifikasi4', 'sudah')->count();

    return view('backend.10_bantuanhibah.10_datastatistik', [
        'title' => 'Data Statistika Permohonan Bantuan Hibah Bangunan Gedung',
        'data' => $data,
        'user' => $user,

        'datajumlahbantuanhibah' => $datajumlahbantuanhibah,

        'datajumlahbantuanhibah_dikembalikan' => $datajumlahbantuanhibah_dikembalikan,

        'datajumlahdok_lapangan' => $datajumlahdok_lapangan,

        'datajumlahsk_terbit' => $datajumlahsk_terbit,

        'datajumlahsk_selesai' => $datajumlahsk_selesai,
        'datajumlahbantuanhibahdinas' => $datajumlahbantuanhibahdinas,
        'jumlahPerInstansi' => $jumlahPerInstansi,

    ]);
}





}
