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

    return view('backend.00_administrator.01_halamanutama.dashboard', array_merge([
        'title' => 'Admin Dashboard ABG Blora Bangunan Gedung',
        'user' => $user,
    ], $jumlahdata));
}


}
