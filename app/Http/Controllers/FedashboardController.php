<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\bgkartuinventarisbangunan;

use Illuminate\Support\Facades\Auth;

class FedashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();


        // return view('/404', [
        // return view('frontend.00_full.index', [
        // return view('frontend.abgblora.00_beranda.01_beranda', [
        return view('frontend.android.01_halamanutama.index', [
            'title' => 'Abg Blora Bangunan Gedung',
        ]);
    }

    public function web()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        // return view('frontend.abgblora.00_beranda.01_beranda', [
        return view('frontend.abgblora.00_beranda.03_merge', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Abg Blora Bangunan Gedung',
        ]);
    }

    // MENU 01
    public function menurespbgslfindex()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.02_pbg.index', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Menu PBG/SLF Bangunan Gedung ',
            'user' => $user,
        ]);
    }

    public function menuresbangunangedungindex()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.03_bangunangedung.index', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Menu Pendataan Bangunan Gedung ',
            'user' => $user,
        ]);
    }

    public function menuresbangunangedungs(Request $request)
    {
        $perPage = $request->input('perPage', 10);
        $search = $request->input('search');

        $query = bgkartuinventarisbangunan::query();

        if ($search) {
            $query->where('namalengkap', 'LIKE', "%{$search}%")
                  ->orWhere('alamat', 'LIKE', "%{$search}%")
                  ->orWhere('no_telepon', 'LIKE', "%{$search}%");
        }

        $data = $query->paginate($perPage);

        if ($request->ajax()) {
            return response()->json([
                'html' => view('frontend.android.03_bangunangedung.01_kartuinventarisbangunan.partials.table', compact('data'))->render()
            ]);
        }

        return view('frontend.android.03_bangunangedung.01_kartuinventarisbangunan.index', [
            'title' => 'Kartu Inventaris Bangunan Gedung Kabupaten Blora',
            'data' => $data,
            'perPage' => $perPage,
            'search' => $search
        ]);
    }



    // MENU 04 BANTEK

        public function resbantekindex()
    {

        $user = Auth::user();
        // return view('/404', [
        // return view('frontend.00_full.index', [
        return view('frontend.android.04_bantuanteknis.01_indexhalamanutama', [
        // return view('frontend.android.01_halamanutama.index', [
            'title' => 'Menu Pendataan Bangunan Gedung ',
            'user' => $user,
        ]);
    }


}

