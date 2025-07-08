<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\bgkartuinventarisbangunan;
use App\Models\databangunangedung;
use App\Models\kepemilikanbangunangedung;
use App\Models\statusadmin;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class akuncontroller extends Controller
{

    public function allakun(Request $request)
{
    $perPage = $request->input('perPage', 15);
    $search = $request->input('search');

    $query = User::query();

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('name', 'LIKE', "%{$search}%")
              ->orWhere('username', 'LIKE', "%{$search}%")
              ->orWhere('phone_number', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%")
              ->orWhere('avatar', 'LIKE', "%{$search}%");
        });
    }

    $data = $query->orderBy('created_at', 'desc')->paginate($perPage);

    // Hitung jumlah user per statusadmin (berdasarkan id statusadmin dari 1 sampai 9)
    $jumlahStatus1 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 1);
    })->count();

    $jumlahStatus2 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 2);
    })->count();

    $jumlahStatus3 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 3);
    })->count();

    $jumlahStatus4 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 4);
    })->count();

    $jumlahStatus5 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 5);
    })->count();

    $jumlahStatus6 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 6);
    })->count();

    $jumlahStatus7 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 7);
    })->count();

    $jumlahStatus8 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 8);
    })->count();

    $jumlahStatus9 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 9);
    })->count();

    if ($request->ajax()) {
        return response()->json([
            'html' => view('backend.13_daftarakun.01_semuaakun.partials.table', compact('data'))->render()
        ]);
    }

    return view('backend.99_databaseabg.03_akun.01_semuaakun.allakunindex', [
        'title' => 'Daftar Semua Akun',
        'data' => $data,
        'perPage' => $perPage,
        'search' => $search,
        'jumlahStatus1' => $jumlahStatus1, // Super Admin
        'jumlahStatus2' => $jumlahStatus2, // Admin
        'jumlahStatus3' => $jumlahStatus3, // Pekerja
        'jumlahStatus4' => $jumlahStatus4, // Supp Pabrik
        'jumlahStatus5' => $jumlahStatus5, // Sup Peralatan
        'jumlahStatus6' => $jumlahStatus6, // Sup Toko Bangunan
        'jumlahStatus7' => $jumlahStatus7, // LSP Penerbit
        'jumlahStatus8' => $jumlahStatus8, // Operator
        'jumlahStatus9' => $jumlahStatus9, // Dinas
    ]);
}



public function allakundelete($id)
{
    // Cari item berdasarkan judul
    $entry = User::where('id', $id)->first();

    if ($entry) {
        // Jika ada file header yang terdaftar, hapus dari storage
        // if (Storage::disk('public')->exists($entry->header)) {
            //     Storage::disk('public')->delete($entry->header);
            // }

            // Hapus entri dari database
            $entry->delete();

            // Redirect atau memberi respons sesuai kebutuhan
            return redirect('/allakun')->with('delete', 'Data Berhasil Di Hapus !');

        }

        return redirect()->back()->with('error', 'Item not found');
    }


    public function allakuncreate()
{
    $user = Auth::user();
$statusadmins = statusadmin::whereIn('id', [2, 3, 4, 5, 6, 7, 8, 9, 10])->get();

    if (!$user) {
        return redirect()->route('login');
    }

    return view('backend.99_databaseabg.03_akun.01_semuaakun.tambahakun', [
        'title' => 'Buat Akun Abg Blora Bangunan Gedung',
        'user'  => $user,
        'statusadmins'  => $statusadmins
    ]);
}


public function allakuncreatenew(Request $request)
{
    $validated = $request->validate([
        'statusadmin_id' => 'required|string',
        'name' => 'required|string|max:255',
        'username' => 'required|string|max:255|unique:users,username',
        'phone_number' => 'required|string|max:20',
        'email' => 'required|email|max:255|unique:users,email',
        'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        'password' => 'required|string|min:6|confirmed',
    ], [
        'statusadmin_id.required' => 'Status admin wajib dipilih.',
        'name.required' => 'Nama lengkap wajib diisi.',
        'username.required' => 'Username wajib diisi.',
        'email.required' => 'Email wajib diisi.',
        'email.email' => 'Format email tidak valid.',
        'email.unique' => 'Email sudah digunakan.',
        'username.unique' => 'Username sudah digunakan.',
        'phone_number.required' => 'Nomor telepon wajib diisi.',
        'password.required' => 'Password wajib diisi.',
        'password.confirmed' => 'Konfirmasi password tidak cocok.',
    ]);

    $user = new User();

    $user->statusadmin_id = $validated['statusadmin_id'];
    $user->name = $validated['name'];
    $user->username = $validated['username'];
    $user->phone_number = $validated['phone_number'];
    $user->email = $validated['email'];

    // Upload avatar langsung ke public/99_akun/01_daftarakun
    if ($request->hasFile('avatar')) {
        $avatar = $request->file('avatar');
        $filename = time() . '_' . uniqid() . '.' . $avatar->getClientOriginalExtension();
        $avatar->move(public_path('99_akun/01_daftarakun'), $filename);
        $user->avatar = '99_akun/01_daftarakun/' . $filename;
    } else {
        $user->avatar = 'assets/abgblora/logo/iconabgblora.png'; // default avatar
    }

    $user->password = bcrypt($validated['password']);
    $user->save();

    session()->flash('create', 'Akun berhasil dibuat.');
return redirect()->back();

}


    public function allakundinas(Request $request)
{
    $perPage = $request->input('perPage', 15);
    $search = $request->input('search');

    $query = User::whereHas('statusadmin', function ($q) {
    $q->where('id', 6);
        });

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('name', 'LIKE', "%{$search}%")
              ->orWhere('username', 'LIKE', "%{$search}%")
              ->orWhere('phone_number', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%")
              ->orWhere('avatar', 'LIKE', "%{$search}%");
        });
    }

    $data = $query->orderBy('created_at', 'desc')->paginate($perPage);

    // Hitung jumlah user per statusadmin (berdasarkan id statusadmin dari 1 sampai 9)
    $jumlahStatus1 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 1);
    })->count();

    $jumlahStatus2 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 2);
    })->count();

    $jumlahStatus3 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 3);
    })->count();

    $jumlahStatus4 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 4);
    })->count();

    $jumlahStatus5 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 5);
    })->count();

    $jumlahStatus6 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 6);
    })->count();

    $jumlahStatus7 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 7);
    })->count();

    $jumlahStatus8 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 8);
    })->count();

    $jumlahStatus9 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 9);
    })->count();

    if ($request->ajax()) {
        return response()->json([
            'html' => view('backend.13_daftarakun.01_semuaakun.partials.table', compact('data'))->render()
        ]);
    }

    return view('backend.99_databaseabg.03_akun.01_semuaakun.allakunindex', [
        'title' => 'Daftar Semua Akun Dinas',
        'data' => $data,
        'perPage' => $perPage,
        'search' => $search,
        'jumlahStatus1' => $jumlahStatus1, // Super Admin
        'jumlahStatus2' => $jumlahStatus2, // Admin
        'jumlahStatus3' => $jumlahStatus3, // Pekerja
        'jumlahStatus4' => $jumlahStatus4, // Supp Pabrik
        'jumlahStatus5' => $jumlahStatus5, // Sup Peralatan
        'jumlahStatus6' => $jumlahStatus6, // Sup Toko Bangunan
        'jumlahStatus7' => $jumlahStatus7, // LSP Penerbit
        'jumlahStatus8' => $jumlahStatus8, // Operator
        'jumlahStatus9' => $jumlahStatus9, // Dinas
    ]);
}



    public function allakunkonsultan(Request $request)
{
    $perPage = $request->input('perPage', 15);
    $search = $request->input('search');

    $query = User::whereHas('statusadmin', function ($q) {
    $q->where('id', 4);
        });

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('name', 'LIKE', "%{$search}%")
              ->orWhere('username', 'LIKE', "%{$search}%")
              ->orWhere('phone_number', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%")
              ->orWhere('avatar', 'LIKE', "%{$search}%");
        });
    }

    $data = $query->orderBy('created_at', 'desc')->paginate($perPage);

    // Hitung jumlah user per statusadmin (berdasarkan id statusadmin dari 1 sampai 9)
    $jumlahStatus1 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 1);
    })->count();

    $jumlahStatus2 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 2);
    })->count();

    $jumlahStatus3 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 3);
    })->count();

    $jumlahStatus4 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 4);
    })->count();

    $jumlahStatus5 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 5);
    })->count();

    $jumlahStatus6 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 6);
    })->count();

    $jumlahStatus7 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 7);
    })->count();

    $jumlahStatus8 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 8);
    })->count();

    $jumlahStatus9 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 9);
    })->count();

    if ($request->ajax()) {
        return response()->json([
            'html' => view('backend.13_daftarakun.01_semuaakun.partials.table', compact('data'))->render()
        ]);
    }

    return view('backend.99_databaseabg.03_akun.01_semuaakun.allakunindex', [
        'title' => 'Daftar Semua Akun Dinas',
        'data' => $data,
        'perPage' => $perPage,
        'search' => $search,
        'jumlahStatus1' => $jumlahStatus1, // Super Admin
        'jumlahStatus2' => $jumlahStatus2, // Admin
        'jumlahStatus3' => $jumlahStatus3, // Pekerja
        'jumlahStatus4' => $jumlahStatus4, // Supp Pabrik
        'jumlahStatus5' => $jumlahStatus5, // Sup Peralatan
        'jumlahStatus6' => $jumlahStatus6, // Sup Toko Bangunan
        'jumlahStatus7' => $jumlahStatus7, // LSP Penerbit
        'jumlahStatus8' => $jumlahStatus8, // Operator
        'jumlahStatus9' => $jumlahStatus9, // Dinas
    ]);
}

    public function allakuninternal(Request $request)
{
    $perPage = $request->input('perPage', 15);
    $search = $request->input('search');

    $query = User::whereHas('statusadmin', function ($q) {
    $q->where('id', 8);
        });

    if ($search) {
        $query->where(function($q) use ($search) {
            $q->where('name', 'LIKE', "%{$search}%")
              ->orWhere('username', 'LIKE', "%{$search}%")
              ->orWhere('phone_number', 'LIKE', "%{$search}%")
              ->orWhere('email', 'LIKE', "%{$search}%")
              ->orWhere('avatar', 'LIKE', "%{$search}%");
        });
    }

    $data = $query->orderBy('created_at', 'desc')->paginate($perPage);

    // Hitung jumlah user per statusadmin (berdasarkan id statusadmin dari 1 sampai 9)
    $jumlahStatus1 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 1);
    })->count();

    $jumlahStatus2 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 2);
    })->count();

    $jumlahStatus3 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 3);
    })->count();

    $jumlahStatus4 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 4);
    })->count();

    $jumlahStatus5 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 5);
    })->count();

    $jumlahStatus6 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 6);
    })->count();

    $jumlahStatus7 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 7);
    })->count();

    $jumlahStatus8 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 8);
    })->count();

    $jumlahStatus9 = User::whereHas('statusadmin', function ($q) {
        $q->where('id', 9);
    })->count();

    if ($request->ajax()) {
        return response()->json([
            'html' => view('backend.13_daftarakun.01_semuaakun.partials.table', compact('data'))->render()
        ]);
    }

    return view('backend.99_databaseabg.03_akun.01_semuaakun.allakunindex', [
        'title' => 'Daftar Semua Akun Dinas',
        'data' => $data,
        'perPage' => $perPage,
        'search' => $search,
        'jumlahStatus1' => $jumlahStatus1, // Super Admin
        'jumlahStatus2' => $jumlahStatus2, // Admin
        'jumlahStatus3' => $jumlahStatus3, // Pekerja
        'jumlahStatus4' => $jumlahStatus4, // Supp Pabrik
        'jumlahStatus5' => $jumlahStatus5, // Sup Peralatan
        'jumlahStatus6' => $jumlahStatus6, // Sup Toko Bangunan
        'jumlahStatus7' => $jumlahStatus7, // LSP Penerbit
        'jumlahStatus8' => $jumlahStatus8, // Operator
        'jumlahStatus9' => $jumlahStatus9, // Dinas
    ]);
}


}




