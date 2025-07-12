<?php

namespace App\Http\Controllers;

use App\Models\agendapelatihanabg;
use App\Models\banhibahberkas;
use App\Models\banhibahlapangan;
use App\Models\banhibahskbupati;
use App\Models\bantuanhibahbg;
use App\Models\kategoripelatihan;
use App\Models\User;
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
        'kategoripelatihan_id' => 'required|exists:kategoripelatihan,id',
        'namakegiatan' => 'required|string|max:255',
        'penutupan' => 'required|date',
        'waktupelaksanaan' => 'required|date',
        'jumlahpeserta' => 'required|integer|min:1',
        'lokasi' => 'required|string|max:255',
        'keterangan' => 'nullable|string|max:255',
        'isiagenda' => 'nullable|string',
        'barcodepelatihan' => 'nullable|string|max:255',
        'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'suratundangan' => 'nullable|mimes:pdf|max:4096',
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

    return redirect()->route('agendapelatihan.index')->with('success', 'Data agenda berhasil disimpan.');
}


}

