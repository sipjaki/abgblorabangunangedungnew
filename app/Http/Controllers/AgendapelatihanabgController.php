<?php

namespace App\Http\Controllers;

use App\Models\agendapelatihanabg;
use App\Models\jenjangpendidikan;
use Illuminate\Support\Str;
use App\Models\kategoripelatihan;
use App\Models\materipelatihan;
use App\Models\pesertapelatihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AgendapelatihanabgController extends Controller
{
    /**
     * Menampilkan form perbaikan dokumen hibah berdasarkan user yang login
     */

public function beagendapelatihanabg(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 15);

    $query = agendapelatihanabg::query();

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('namakegiatan', 'like', "%{$search}%")
              ->orWhere('lokasi', 'like', "%{$search}%")
              ->orWhere('keterangan', 'like', "%{$search}%")
              ->orWhere('isiagenda', 'like', "%{$search}%")
              ->orWhere('foto', 'like', "%{$search}%")
              ->orWhere('barcodepelatihan', 'like', "%{$search}%")
              ->orWhere('suratundangan', 'like', "%{$search}%")
              ->orWhereDate('penutupan', $search)
              ->orWhereDate('waktupelaksanaan', $search);
        });

        $query->orWhereHas('materipelatihan', function ($q) use ($search) {
            $q->where('nama', 'like', "%{$search}%");
        });

        $query->orWhereHas('kategoripelatihan', function ($q) use ($search) {
            $q->where('kategoripelatihan', 'like', "%{$search}%");
        });

        $query->orWhereHas('user', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");
        });
    }

    $data = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.05_agendapelatihan.01_dataagendapelatihan', [
        'title' => 'Daftar Agenda Pelatihan dan Sosialisasi',
        'data'  => $data,
        'user'  => $user,
    ]);
}

public function beagendapelatihanabgdelete($id)
{
    // Cari item berdasarkan judul
    $entry = agendapelatihanabg::where('id', $id)->first();

    if ($entry) {
        // Jika ada file header yang terdaftar, hapus dari storage
        // if (Storage::disk('public')->exists($entry->header)) {
            //     Storage::disk('public')->delete($entry->header);
            // }

            // Hapus entri dari database
            $entry->delete();

            // Redirect atau memberi respons sesuai kebutuhan
            return redirect('/beagendapelatihanabg')->with('delete', 'Data Berhasil Di Hapus !');

        }

        return redirect()->back()->with('error', 'Item not found');
    }


public function beagendapelatihanabgcreate()
{
    $user = Auth::user();
    // $dataakun = User::where('statusadmin_id', 4)->get();
    $kategori = kategoripelatihan::all();

    if (!$user) {
        return redirect()->route('login');
    }

    return view('backend.05_agendapelatihan.02_createagendapelatihan', [
        'title' => 'Create Agenda Pelatihan ABG Blora Bangunan Gedung',
        'user'  => $user,
        'kategori'  => $kategori,
        // 'dataakun'  => $dataakun
    ]);
}


public function beagendapelatihanabgcreatenew(Request $request)
{
    $user = Auth::user();

    $validated = $request->validate([
        'kategoripelatihan_id' => 'required|string',
        'namakegiatan' => 'required|string|max:255',
        'penutupan' => 'required|date',
        'waktupelaksanaan' => 'required|date',
        'jumlahpeserta' => 'required|integer|min:1',
        'lokasi' => 'required|string|max:255',
        'keterangan' => 'nullable|string|max:255',
        'isiagenda' => 'nullable|string',
        'barcodepelatihan' => 'nullable|string|max:255',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:10048',
        'suratundangan' => 'nullable|mimes:pdf|max:10096',
    ]);

    $data = new agendapelatihanabg();
    $data->kategoripelatihan_id = $validated['kategoripelatihan_id'];
    $data->user_id = $user->id;
    $data->namakegiatan = $validated['namakegiatan'];
    $data->penutupan = $validated['penutupan'];
    $data->waktupelaksanaan = $validated['waktupelaksanaan'];
    $data->jumlahpeserta = $validated['jumlahpeserta'];
    $data->lokasi = $validated['lokasi'];
    $data->keterangan = $validated['keterangan'] ?? null;
    $data->isiagenda = $validated['isiagenda'];
    $data->barcodepelatihan = $validated['barcodepelatihan'] ?? null;

    // ========== Simpan Gambar ke public/05_agendapelatihan/01_berkas
    if ($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = public_path('05_agendapelatihan/01_berkas');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file->move($path, $filename);
        $data->foto = '05_agendapelatihan/01_berkas/' . $filename;
    }

    // ========== Simpan PDF ke public/05_agendapelatihan/02_berkas
    if ($request->hasFile('suratundangan')) {
        $file = $request->file('suratundangan');
        $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $path = public_path('05_agendapelatihan/02_berkas');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file->move($path, $filename);
        $data->suratundangan = '05_agendapelatihan/02_berkas/' . $filename;
    }

    $data->save();

    return redirect()->route('beagendapelatihanabg')->with('success', 'Data agenda berhasil disimpan.');
}


public function beagendapelatihanabgmateri($id)
{
    $databantuanteknis = agendapelatihanabg::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = materipelatihan::where('agendapelatihan_id', $databantuanteknis->id)->paginate(50);

    return view('backend.05_agendapelatihan.03_uploadmateripel', [
        'title' => 'Upload Materi Pelatihan ABG Blora',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function beagendapelatihanabgupload($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = agendapelatihanabg::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.05_agendapelatihan.04_uploadmatpelatihan', [
        'title' => 'Silahkan Upload Materi Pelatihan  ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function beagendapelatihanabguploadnew(Request $request)
{
    // Validasi
    $validated = $request->validate([
        'agendapelatihan_id' => 'required|string',
        'judulmateripelatihan' => 'required|string|max:255',
        'materipelatihan1' => 'required|file|mimes:pdf|max:10240',
        'materipelatihan2' => 'nullable|file|mimes:pdf|max:10240',
    ], [
        'judulmateripelatihan.required' => 'Judul materi wajib diisi.',
        'materipelatihan1.required' => 'Materi pelatihan 1 wajib diunggah.',
        'materipelatihan1.mimes' => 'Materi 1 harus berupa file PDF.',
        'materipelatihan2.mimes' => 'Materi 2 harus berupa file PDF.',
    ]);

    // Simpan file
    $folder = '05_agendapelatihan/02_berkasmateri';

    $file1 = $request->file('materipelatihan1');
    $file1Name = time() . '_materi1.' . $file1->getClientOriginalExtension();
    $file1->move(public_path($folder), $file1Name);

    $file2Path = null;
    if ($request->hasFile('materipelatihan2')) {
        $file2 = $request->file('materipelatihan2');
        $file2Name = time() . '_materi2.' . $file2->getClientOriginalExtension();
        $file2->move(public_path($folder), $file2Name);
        $file2Path = $folder . '/' . $file2Name;
    }

    // Simpan ke DB
    $materi = new materipelatihan();
    $materi->agendapelatihan_id = $validated['agendapelatihan_id'];
    $materi->judulmateripelatihan = $validated['judulmateripelatihan'];
    $materi->materipelatihan1 = $folder . '/' . $file1Name;
    $materi->materipelatihan2 = $file2Path;
    $materi->save();

    session()->flash('create', 'Materi pelatihan berhasil diunggah.');

    return redirect()->route('beagendapelatihanabgmateri.show', ['id' => $validated['agendapelatihan_id']]);
}

public function beagendapeserta(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 15);

    // $query = agendapelatihanabg::query();
$query = agendapelatihanabg::withCount('pesertapelatihan');

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('namakegiatan', 'like', "%{$search}%")
              ->orWhere('lokasi', 'like', "%{$search}%")
              ->orWhere('keterangan', 'like', "%{$search}%")
              ->orWhere('isiagenda', 'like', "%{$search}%")
              ->orWhere('foto', 'like', "%{$search}%")
              ->orWhere('barcodepelatihan', 'like', "%{$search}%")
              ->orWhere('suratundangan', 'like', "%{$search}%")
              ->orWhereDate('penutupan', $search)
              ->orWhereDate('waktupelaksanaan', $search);
        });

        $query->orWhereHas('materipelatihan', function ($q) use ($search) {
            $q->where('nama', 'like', "%{$search}%");
        });

        $query->orWhereHas('kategoripelatihan', function ($q) use ($search) {
            $q->where('kategoripelatihan', 'like', "%{$search}%");
        });

        $query->orWhereHas('user', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%");
        });
    }


    $data = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.05_agendapelatihan.01_peserta.01_daftarpeserta', [
        'title' => 'Daftar Peserta Pelatihan dan Sosialisasi',
        'data'  => $data,
        'user'  => $user,
    ]);
}


public function beagendapesertalist(Request $request, $id)
    {
        $perPage = $request->input('perPage', 200);
        $search = $request->input('search');

        // Pastikan agenda pelatihan dengan ID ini ada
        $agendapelatihan = agendapelatihanabg::findOrFail($id);

        // Ambil user login saat ini
        $user = Auth::user();

        // Ambil peserta yang hanya terkait dengan agenda pelatihan ini
        $query = pesertapelatihan::where('agendapelatihanabg_id', $id)
                    ->select(['id', 'namalengkap', 'jeniskelamin', 'instansi', 'jenjangpendidikan_id', 'nik', 'tanggallahir', 'notelepon', 'sertifikat', 'verifikasi']);

        // Filter pencarian (jika ada)
        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('jeniskelamin', 'LIKE', "%{$search}%")
                  ->orWhere('instansi', 'LIKE', "%{$search}%")
                  ->orWhere('namalengkap', 'LIKE', "%{$search}%")
                //   ->orWhereHas('user', function ($sub) use ($search) {
                //       $sub->where('name', 'LIKE', "%{$search}%");
                //   })
                  ;
            });
        }

        $datapesertapelatihan = $query->orderBy('created_at', 'desc')->paginate($perPage);

        // Untuk request Ajax (misal filter dinamis via JS)
        if ($request->ajax()) {
            return response()->json([
                'html' => view('backend.05_agendapelatihan.02_daftarpesertashow.partials.table', compact('datapesertapelatihan'))->render()
            ]);
        }

        return view('backend.05_agendapelatihan.01_peserta.02_daftarpesertashow', [
            'title' => 'Daftar Peserta Agenda Pelatihan',
            'data' => $agendapelatihan,
            'datapeserta' => $datapesertapelatihan,
            'perPage' => $perPage,
            'search' => $search,
            'user' => $user
        ]);
    }



public function beagendapesertadelete($id)
{
    // Cari data peserta
    $entry = pesertapelatihan::find($id);

    if ($entry) {
        // Simpan agendanya dulu sebelum hapus
        $agendaId = $entry->agendapelatihanabg_id;

        // Hapus entri
        $entry->delete();

        // Redirect ke list peserta dari agenda yang sesuai
        return redirect()->route('beagendapesertalist', ['id' => $agendaId])
                         ->with('delete', 'Data Berhasil Dihapus!');
    }

    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}

public function verifikasipesertapelatihan(Request $request, $id)
    {
        // Validasi input verifikasi
        $request->validate([
            'verifikasi' => 'required|in:lolos,gugur',
        ]);

        // Temukan peserta berdasarkan ID
        $item = pesertapelatihan::findOrFail($id);

        // Simpan nilai verifikasi
        $item->verifikasi = $request->input('verifikasi');
        $item->save();

        // Ambil ID agenda
        $agendaId = $item->agendapelatihanabg_id;

        // Flash message
        $pesan = $item->verifikasi === 'lolos'
            ? 'Selamat Peserta Lolos Seleksi!'
            : 'Peserta dinyatakan Gugur.';
        session()->flash('verifikasipesertapelatihan', $pesan);

        // Redirect
        return redirect("/beagendapesertalist/{$agendaId}");
    }


public function resagendapelatihan($id)
{

    $user = Auth::user();
$jenjangpendidikan = jenjangpendidikan::orderBy('jenjangpendidikan', 'asc')->get();

    // Ambil data user yang statusadmin_id = 6 beserta relasi statusadmin

    // Ambil data agenda pelatihan berdasarkan ID
    $agendapelatihan = agendapelatihanabg::findOrFail($id);

    return view('frontend.android.05_sosialisasi.03_formpendaftransosialisasi', [
        'title' => 'Formulir Pendaftaran Agenda Sosialisasi Bangunan Gedung',
        'user' => $user,
        'agendapelatihan' => $agendapelatihan, // dikirim ke view
        'jenjangpendidikan' => $jenjangpendidikan, // dikirim ke view

    ]);
}


public function pendaftaranpesertanew(Request $request)
{
    $validated = $request->validate([
        'agendapelatihanabg_id' => 'required|string',
        'namalengkap' => 'required|string|max:255',
        'jenjangpendidikan_id' => 'required|string',
        'nik' => 'required|string|size:16',
        'jeniskelamin' => 'required|in:Laki-laki,Perempuan',
        'tanggallahir' => 'required|date',
        'notelepon' => 'required|string|max:20',
        'instansi' => 'required|string',
    ], [
        'agendapelatihanabg_id.required' => 'Agenda pelatihan harus dipilih.',
        'namalengkap.required' => 'Nama lengkap wajib diisi.',
        'namalengkap.max' => 'Nama lengkap maksimal 255 karakter.',
        'jenjangpendidikan_id.required' => 'Jenjang pendidikan harus dipilih.',
        'nik.required' => 'NIK wajib diisi.',
        'nik.size' => 'NIK harus terdiri dari 16 digit.',
        'jeniskelamin.required' => 'Jenis kelamin wajib dipilih.',
        'jeniskelamin.in' => 'Jenis kelamin harus Laki-laki atau Perempuan.',
        'tanggallahir.required' => 'Tanggal lahir wajib diisi.',
        'tanggallahir.date' => 'Format tanggal lahir tidak valid.',
        'notelepon.required' => 'Nomor telepon wajib diisi.',
        'notelepon.max' => 'Nomor telepon maksimal 20 karakter.',
        'instansi.required' => 'Nama instansi asal wajib diisi.',
        'instansi.max' => 'Nama instansi maksimal 255 karakter.',
    ]);

    // Simpan ke database
    pesertapelatihan::create($validated);

    // Redirect ke route beagendapelatihanabg
    return redirect()->route('resagendaabg')->with('create', 'Pendaftaran Anda Berhasil!');
}



public function beagendapelatihanedit($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = agendapelatihanabg::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.05_agendapelatihan.05_perbaikanagendapelatihan', [
        'title' => 'Admin Perbaikan Agenda Pelatihan Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

}

