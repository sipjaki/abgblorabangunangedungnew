<?php

namespace App\Http\Controllers;

use App\Models\agendapelatihanabg;
use App\Models\artikelabg;
use App\Models\beritaabg;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class NewUiController extends Controller
{

    public function index()
    {

        $user = Auth::user();
        return view('frontend.ui2026.01_halamanutama.newhalaman', [
            'title' => 'Penyelenggaraan Bangunan Gedung Kabupaten Blora | Dinas Pekerjaan Umum Dan Penataan Ruang Kabupaten Blora Provinsi Jawa Tengah',
            'user' => $user,
        ]);
    }


    // BAGIAN 6 UI BARU 2026
    public function informasimbr()
    {

        $user = Auth::user();
        return view('frontend.ui2026.06_mbr.informasimbr', [
            'title' => 'Penyelenggaraan Bangunan Gedung Kabupaten Blora | Dinas Pekerjaan Umum Dan Penataan Ruang Kabupaten Blora Provinsi Jawa Tengah',
            'user' => $user,
        ]);
    }

}

