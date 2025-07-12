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




}

