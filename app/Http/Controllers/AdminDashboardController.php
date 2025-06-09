<?php

namespace App\Http\Controllers;

use App\Models\agendastatus;
use App\Models\asosiasipengusaha;
use App\Models\bantuanteknis;
use App\Models\uijk;
use App\Models\undangundang;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;


class AdminDashboardController extends Controller
{
    //
 public function index()
{
    $user = Auth::user();

    $jumlahdata = [];

    for ($i = 1; $i <= 9; $i++) {
        $jumlahdata['jumlahdata' . $i] = bantuanteknis::whereHas('pemohon.statusadmin', function ($query) {
            $query->where('id', 7);
        })->whereHas('jenispengajuanbantek', function ($query) use ($i) {
            $query->where('id', $i);
        })->whereHas('pemohon', function ($query) use ($user) {
            $query->where('id', $user->id); // langsung cek pemohon.id user login
        })->count();
    }

    $jumlahdatadinas = [];

    for ($i = 1; $i <= 9; $i++) {
        $jumlahdata['jumlahdatadinas' . $i] = bantuanteknis::whereHas('dinas.statusadmin', function ($query) {
            $query->where('id', 6);
        })->whereHas('jenispengajuanbantek', function ($query) use ($i) {
            $query->where('id', $i);
        })->whereHas('dinas', function ($query) use ($user) {
            $query->where('id', $user->id); // langsung cek pemohon.id user login
        })->count();
    }

    $jumlahdataasistensi = [];

    for ($i = 1; $i <= 9; $i++) {
        $jumlahdata['jumlahdataasistensi' . $i] = bantuanteknis::whereHas('asistensibantek.statusadmin', function ($query) {
            $query->where('id', 4);
        })->whereHas('jenispengajuanbantek', function ($query) use ($i) {
            $query->where('id', $i);
        })->whereHas('asistensibantek', function ($query) use ($user) {
            $query->where('id', $user->id); // langsung cek pemohon.id user login
        })->count();
    }

    return view('backend.00_administrator.01_halamanutama.dashboard', array_merge([
        'title' => 'Admin Dashboard ABG Blora Bangunan Gedung',
        'user' => $user,
    ],
    $jumlahdatadinas,
    $jumlahdataasistensi,
    $jumlahdata,));
}

public function dashboarddinas()
{
    $user = Auth::user();

    $jumlahdata = [];

    for ($i = 1; $i <= 9; $i++) {
        $jumlahdata['jumlahdata' . $i] = bantuanteknis::whereHas('dinas.statusadmin', function ($query) {
            $query->where('id', 6);
        })->whereHas('jenispengajuanbantek', function ($query) use ($i) {
            $query->where('id', $i);
        })->whereHas('dinas', function ($query) use ($user) {
            $query->where('id', $user->id); // langsung cek pemohon.id user login
        })->count();
    }

    return view('backend.00_administrator.01_halamanutama.dashboarddinas', array_merge([
        'title' => 'Admin Dashboard ABG Blora Bangunan Gedung',
        'user' => $user,
    ], $jumlahdata));
}


}
