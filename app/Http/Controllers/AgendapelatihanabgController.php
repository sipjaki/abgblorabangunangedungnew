<?php

namespace App\Http\Controllers;

use App\Models\agendapelatihanabg;
use App\Models\banhibahberkas;
use App\Models\banhibahlapangan;
use App\Models\banhibahskbupati;
use App\Models\bantuanhibahbg;
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




}

