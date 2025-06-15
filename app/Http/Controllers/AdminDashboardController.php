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

    // ---------------------------------------------------
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

    $datajumlahdinas_dikembalikan = [];

for ($i = 1; $i <= 9; $i++) {
    $datajumlahdinas_dikembalikan['jumlahdatadinas_dikembalikan' . $i] = bantuanteknis::where('validasiberkas1', 'dikembalikan')
        ->whereHas('dinas.statusadmin', function ($query) {
            $query->where('id', 6);
        })->whereHas('jenispengajuanbantek', function ($query) use ($i) {
            $query->where('id', $i);
        })->whereHas('dinas', function ($query) use ($user) {
            $query->where('id', $user->id);
        })->count();
}

    $datajumlahdinas_selesai = [];

for ($i = 1; $i <= 9; $i++) {
    $datajumlahdinas_selesai['jumlahdatadinas_selesai' . $i] = bantuanteknis::where('validasiberkas3', 'sudah')
        ->whereHas('dinas.statusadmin', function ($query) {
            $query->where('id', 6);
        })->whereHas('jenispengajuanbantek', function ($query) use ($i) {
            $query->where('id', $i);
        })->whereHas('dinas', function ($query) use ($user) {
            $query->where('id', $user->id);
        })->count();
}

$datajumlahdinas_terbit = [];

for ($i = 1; $i <= 9; $i++) {
    $datajumlahdinas_terbit['jumlahdatadinas_terbit' . $i] = bantuanteknis::where('validasiberkas4', 'sudah')
        ->whereHas('dinas.statusadmin', function ($query) {
            $query->where('id', 6);
        })->whereHas('jenispengajuanbantek', function ($query) use ($i) {
            $query->where('id', $i);
        })->whereHas('dinas', function ($query) use ($user) {
            $query->where('id', $user->id);
        })->count();
}



    $jumlahdataasistensi = [];

for ($i = 1; $i <= 9; $i++) {
    $jumlahdataasistensi['jumlahdataasistensi' . $i] = bantuanteknis::whereHas('bujkkonsultan.user.statusadmin', function ($query) {
        $query->where('id', 4); // hanya statusadmin id 4
    })->whereHas('jenispengajuanbantek', function ($query) use ($i) {
        $query->where('id', $i); // jenis pengajuan sesuai index
    })->whereHas('bujkkonsultan.user', function ($query) use ($user) {
        $query->where('id', $user->id); // hanya data milik user yang login
    })->count();
}

    return view('backend.00_administrator.01_halamanutama.dashboard', array_merge([
        'title' => 'Admin Dashboard ABG Blora Bangunan Gedung',
        'user' => $user,
    ],
    $jumlahdatadinas,
    $jumlahdataasistensi,
    $jumlahdata,
    $datajumlahdinas_dikembalikan,
    $datajumlahdinas_selesai,
    $datajumlahdinas_terbit,
    // $datajumlahdinasdikembalikan,
));
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
