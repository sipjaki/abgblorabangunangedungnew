<?php

namespace App\Http\Controllers;
use App\Models\bantuanteknis;
use App\Models\ceklapanganbantek;
use App\Models\jenispengajuanbantek;
use App\Models\kecamatanblora;
use App\Models\kelurahandesa;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class BantuanteknisController extends Controller
{
    //
    public function index()
{
    $datakecamatan = kecamatanblora::all();
    $datakelurahan = kelurahandesa::all(); // Bisa kamu kosongkan kalau mau preload dinamis pakai JS
    $datapilihanpengajuan = jenispengajuanbantek::all(); // Bisa kamu kosongkan kalau mau preload dinamis pakai JS

    $user = Auth::user();

    // Ambil data user yang statusadmin_id = 3 beserta relasi statusadmin
    $statusadimindinas = User::with('statusadmin')
        ->where('statusadmin_id', 6)
        ->get();

    return view('frontend.abgblora.04_bantuanteknis.01_bantuanteknisindex', [
        'title' => 'Jenis Permohonan Bantuan Teknis',
        'datakecamatan' => $datakecamatan,
        'datakelurahan' => $datakelurahan,
        'datapilihanpengajuan' => $datapilihanpengajuan,
        'user' => $user,
        'statusadimindinas' => $statusadimindinas, // kirim ke view juga
    ]);
}

public function febantuantekniscreatepermohonan(Request $request)
{

      $today = Carbon::now();
    $bulanRomawi = ['I','II','III','IV','V','VI','VII','VIII','IX','X','XI','XII'];
    $bulan = $today->month - 1;
    $tahun = $today->year;

    // Ambil nomor urut terakhir untuk bulan dan tahun yang sama
    $last = bantuanteknis::whereYear('created_at', $tahun)
        ->whereMonth('created_at', $today->month)
        ->orderByDesc('id')
        ->first();

    $lastNumber = 0;
    if ($last && preg_match('/\/(\d{3})$/', $last->nosurat, $matches)) {
        $lastNumber = intval($matches[1]);
    }

    $nextNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
    $nomorSurat = "DPUPRBLORA/BANTEK/BG/" . $bulanRomawi[$bulan] . "/" . $tahun . "/" . $nextNumber;

    // Inject nosurat ke dalam request
    $request->merge(['nosurat' => $nomorSurat]);

$validated = $request->validate([
    'pemohon_id' => 'nullable|string',
    'dinas_id' => 'nullable|string',
    'jenispengajuanbantek_id' => 'required|string',

    'nosurat' => 'nullable|string|max:255',
    'tanggalsurat' => 'nullable|date',
    'nama_pemohon' => 'required|string|max:255',
    'no_telepon' => 'required|string|max:20',

    'namapaket' => 'required|string|max:255',
    'kategoribangunan' => 'required|string|max:255',
    'luasbangunan' => 'required|numeric',
    'luastanahtotal' => 'required|numeric',
    'jumlahlantai' => 'required|integer',
    'tinggibangunan' => 'required|numeric',
    'bassement' => 'required|string',
    'kepemilikan' => 'required|string|max:255',
    'tahunpembangunan' => 'required|digits:4|integer',
    'tahunrenovasi' => 'required|digits:4|integer',

    'pengelola' => 'required|string|max:255',
    'alamatlokasi' => 'required|string',
    'rt' => 'required|string|max:10',
    'rw' => 'required|string|max:10',
    'kabupaten' => 'required|string|max:255',
    'kecamatanblora_id' => 'required|string',
    'kelurahandesa_id' => 'required|string',

    'suratpermohonan' => 'required|file|mimes:pdf|max:5120',
    'kic' => 'required|file|mimes:pdf|max:5120',
    'fotokondisi' => 'required|file|mimes:pdf|max:5120',

], [
    'pemohon_id.required' => 'Pemohon Wajib Di Isi !.',
    'dinas_id.required' => 'Pilihan Dinas Wajib Di Isi !.',
    'jenispengajuanbantek_id.required' => 'Jenis pengajuan wajib dipilih.',
    'jenispengajuanbantek_id.exists' => 'Jenis pengajuan tidak valid.',

    'nosurat.required' => 'Nomor surat maksimal 255 karakter.',
    'tanggalsurat.required' => 'Tanggal surat harus berupa tanggal yang valid.',
    'nama_pemohon.required' => 'Nama pemohon wajib diisi.',
    'nama_pemohon.max' => 'Nama pemohon maksimal 255 karakter.',
    'no_telepon.required' => 'Nomor telepon wajib diisi.',
    'no_telepon.max' => 'Nomor telepon maksimal 20 karakter.',

    'namapaket.required' => 'Nama paket wajib diisi.',
    'kategoribangunan.required' => 'Kategori bangunan wajib diisi.',
    'luasbangunan.required' => 'Luas bangunan harus berupa angka.',
    'luastanahtotal.required' => 'Luas tanah total harus berupa angka.',
    'jumlahlantai.required' => 'Jumlah lantai harus berupa bilangan bulat.',
    'tinggibangunan.required' => 'Tinggi bangunan harus berupa angka.',
    'bassement.required' => 'Basement harus bernilai benar atau salah.',
    'kepemilikan.required' => 'Status kepemilikan wajib diisi.',
    'tahunpembangunan.required' => 'Tahun pembangunan harus 4 angka.',
    'tahunrenovasi.required' => 'Tahun renovasi harus 4 angka.',

    'pengelola.required' => 'Nama pengelola wajib diisi.',
    'alamatlokasi.required' => 'Alamat lokasi wajib diisi.',
    'rt.required' => 'RT maksimal 10 karakter.',
    'rw.required' => 'RW maksimal 10 karakter.',
    'kabupaten.required' => 'Kabupaten maksimal 255 karakter.',
    'kecamatanblora_id.required' => 'Kecamatan Wajib Di Pilih !',
    'kelurahandesa_id.required' => 'Kelurahan atau Desa Wajib Di Pilih !',

    'suratpermohonan.required' => 'File surat permohonan wajib di Upload !',
    'suratpermohonan.file' => 'File surat permohonan tidak valid.',
    'suratpermohonan.mimes' => 'Surat permohonan harus berupa PDF',
    'suratpermohonan.max' => 'Ukuran file surat permohonan maksimal 5MB.',

    'kic.required' => 'File KIC Wajib di Upload !',
    'kic.file' => 'File KIC tidak valid.',
    'kic.mimes' => 'KIC harus berupa PDF.',
    'kic.max' => 'Ukuran file KIC maksimal 5MB.',

    'fotokondisi.required' => 'File foto kondisi Wajib di Upload !',
    'fotokondisi.file' => 'File foto kondisi tidak valid.',
    'fotokondisi.mimes' => 'Foto kondisi harus berupa PDF',
    'fotokondisi.max' => 'Ukuran file foto kondisi maksimal 5MB.',
]);

    // Buat direktori manual jika belum ada
    $paths = [
        'suratpermohonan' => '06_bantuanteknis/01_suratpermohonan',
        'kic' => '06_bantuanteknis/02_kartuinventaris',
        'fotokondisi' => '06_bantuanteknis/03_fotokondisi',
    ];

    foreach ($paths as $path) {
        if (!file_exists(public_path($path))) {
            mkdir(public_path($path), 0777, true);
        }
    }

    // Upload manual ke folder public
    $suratpermohonanPath = null;
    if ($request->hasFile('suratpermohonan')) {
        $file = $request->file('suratpermohonan');
        $filename = 'suratpermohonan_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($paths['suratpermohonan']), $filename);
        $suratpermohonanPath = $paths['suratpermohonan'] . '/' . $filename;
    }

    $kicPath = null;
    if ($request->hasFile('kic')) {
        $file = $request->file('kic');
        $filename = 'kic_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($paths['kic']), $filename);
        $kicPath = $paths['kic'] . '/' . $filename;
    }

    $fotokondisiPath = null;
    if ($request->hasFile('fotokondisi')) {
        $file = $request->file('fotokondisi');
        $filename = 'fotokondisi_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($paths['fotokondisi']), $filename);
        $fotokondisiPath = $paths['fotokondisi'] . '/' . $filename;
    }

    // Simpan data
    $bantek = new bantuanteknis();
    $bantek->pemohon_id = $validated['pemohon_id'] ?? Auth::id();
    $bantek->dinas_id = $validated['dinas_id'] ?? null;
    $bantek->jenispengajuanbantek_id = $validated['jenispengajuanbantek_id'];

    $bantek->nosurat = $validated['nosurat'] ?? null;
    $bantek->tanggalsurat = $validated['tanggalsurat'] ?? null;
    $bantek->nama_pemohon = $validated['nama_pemohon'];
    $bantek->no_telepon = $validated['no_telepon'];

    $bantek->namapaket = $validated['namapaket'];
    $bantek->kategoribangunan = $validated['kategoribangunan'];
    $bantek->luasbangunan = $validated['luasbangunan'] ?? null;
    $bantek->luastanahtotal = $validated['luastanahtotal'] ?? null;
    $bantek->jumlahlantai = $validated['jumlahlantai'] ?? null;
    $bantek->tinggibangunan = $validated['tinggibangunan'] ?? null;
    $bantek->bassement = $validated['bassement'] ?? false;
    $bantek->kepemilikan = $validated['kepemilikan'];
    $bantek->tahunpembangunan = $validated['tahunpembangunan'] ?? null;
    $bantek->tahunrenovasi = $validated['tahunrenovasi'] ?? null;

    $bantek->pengelola = $validated['pengelola'];
    $bantek->alamatlokasi = $validated['alamatlokasi'];
    $bantek->rt = $validated['rt'] ?? null;
    $bantek->rw = $validated['rw'] ?? null;
    $bantek->kabupaten = $validated['kabupaten'] ?? null;
    $bantek->kecamatanblora_id = $validated['kecamatanblora_id'] ?? null;
    $bantek->kelurahandesa_id = $validated['kelurahandesa_id'] ?? null;

    $bantek->suratpermohonan = $suratpermohonanPath;
    $bantek->kic = $kicPath;
    $bantek->fotokondisi = $fotokondisiPath;

    $bantek->save();


        session()->flash('create', 'Permohonan Bantek Anda Berhasil Di Ajukan !');
        return redirect('/dashboard');
    // return redirect()->back()->with('success', 'Pengajuan bantuan teknis berhasil disimpan.');
}

public function bebantuanteknisberkas(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    // Awalnya filter semua kecuali id = 1
    $query = bantuanteknis::whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', '!=', 1);
    });

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('nama_pemohon', 'like', "%{$search}%")
              ->orWhere('no_telepon', 'like', "%{$search}%")
              ->orWhere('namapaket', 'like', "%{$search}%")
              ->orWhere('kategoribangunan', 'like', "%{$search}%")
              ->orWhere('kepemilikan', 'like', "%{$search}%")
              ->orWhere('pengelola', 'like', "%{$search}%")
              ->orWhere('alamatlokasi', 'like', "%{$search}%")
              ->orWhere('rt', 'like', "%{$search}%")
              ->orWhere('rw', 'like', "%{$search}%")
              ->orWhere('kabupaten', 'like', "%{$search}%")
              ->orWhere('nosurat', 'like', "%{$search}%")
              ->orWhereYear('tahunpembangunan', $search)
              ->orWhereYear('tahunrenovasi', $search);
        });

        $query->orWhereHas('pemohon', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%");
        });

        $query->orWhereHas('dinas', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%");
        });

        $query->orWhereHas('jenispengajuanbantek', function ($q) use ($search) {
            $q->where('jenispengajuan', 'like', "%{$search}%");
        });

        $query->orWhereHas('kecamatanblora', function ($q) use ($search) {
            $q->where('kecamatanblora', 'like', "%{$search}%");
        });

        $query->orWhereHas('kelurahandesa', function ($q) use ($search) {
            $q->where('desa', 'like', "%{$search}%");
        });
    }

    $berkasbantek = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.04_bantuanteknis.01_berkaspemohon.01_berkaspemohonindex', [
        'title' => 'Permohonan Bantuan Teknis Penyelenggaraan Bangunan Gedung',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}


public function bebantuanteknisindex(Request $request)
{
    $user = Auth::user();
    $perPage = $request->input('perPage', 20);

    // Ambil jumlah data dengan jenispengajuanbantek id = 1
    $jumlahDataIdSatu = bantuanteknis::whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', 1);
    })->count();

    // Ambil semua data KECUALI yang punya relasi id = 1
    $dataTanpaIdSatu = bantuanteknis::whereDoesntHave('jenispengajuanbantek', function ($q) {
        $q->where('id', 1);
    })->latest()->paginate($perPage);

    return view('backend.04_bantuanteknis.00_halamanutama', [
        'title' => 'Permohonan Bantuan Teknis Penyelenggaraan Bangunan Gedung',
        // 'data' => $dataTanpaIdSatu,
        'user' => $user,
        'jumlahDataIdSatu' => $jumlahDataIdSatu,
        'datasemua' => $dataTanpaIdSatu,
    ]);
}

public function bebantuanteknisdelete($id)
{
    // Cari item berdasarkan judul
    $entry = bantuanteknis::where('id', $id)->first();

    if ($entry) {
        // Jika ada file header yang terdaftar, hapus dari storage
        // if (Storage::disk('public')->exists($entry->header)) {
            //     Storage::disk('public')->delete($entry->header);
            // }

            // Hapus entri dari database
            $entry->delete();

            // Redirect atau memberi respons sesuai kebutuhan
            return redirect('/bebantuanteknisindex')->with('delete', 'Data Berhasil Di Hapus !');

        }

        return redirect()->back()->with('error', 'Item not found');
    }

public function bebantuanteknisberkasshow($id)
{
    // Cari data berdasarkan ID
    $data = bantuanteknis::findOrFail($id);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Tampilkan ke view dengan key-value
    return view('backend.04_bantuanteknis.01_berkaspemohon.02_berkaspemohonshow', [
        'title' => 'Berkas Permohonan Bantuan Teknis Penyelenggaraan Bangunan Gedung',
        'data' => $data,
        'user' => $user
    ]);
}

public function beasistensishow($id)
{
    // Cari data berdasarkan ID
    $data = bantuanteknis::findOrFail($id);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Tampilkan ke view dengan key-value
    return view('backend.04_bantuanteknis.01_berkaspemohon.06_berkasasistensishow', [
        'title' => 'Berkas Permohonan Asistensi Penyelenggaraan Bangunan Gedung',
        'data' => $data,
        'user' => $user
    ]);
}



// verifikasi berkas ke 1

  public function validasiberkas1update(Request $request, $id)
    {
        $data = bantuanteknis::findOrFail($id);

        $request->validate([
            'validasiberkas1' => 'required|in:lolos,dikembalikan',
        ]);

        $data->validasiberkas1 = $request->validasiberkas1;
        $data->save();

     if ($request->validasiberkas1 === 'lolos') {
        session()->flash('create', '✅ Data Lolos Verifikasi !');
    } else {
        session()->flash('gagal', '❌ Data Di Kembalikan Ke Pemohon !');
    }
           return redirect('/bebantuanteknisindex');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


    public function validasidokumenberkasbantek(Request $request, $id)
{
    // Validasi input wajib & opsional
    $request->validate([
        'validasisuratpermohonan' => 'required|in:sesuai,tidak_sesuai',
        'validasikic' => 'required|in:sesuai,tidak_sesuai',
        'validasifotokondisi' => 'required|in:sesuai,tidak_sesuai',
        'catatanvalidasi' => 'nullable|string',
    ]);

    // Cari peserta berdasarkan ID
    $item = bantuanteknis::findOrFail($id);

    // Simpan data
    $item->update([
        'validasisuratpermohonan' => $request->validasisuratpermohonan,
        'validasikic' => $request->validasikic,
        'validasifotokondisi' => $request->validasifotokondisi,
        'catatanvalidasi' => $request->catatanvalidasi,
    ]);

    // Flash message
    session()->flash('update', 'Validasi Berkas Berhasil !');

    // Redirect ke route bernama bebantuanteknis.show
    return redirect()->route('bebantuanteknis.show', ['id' => $id]);
}


// VALIDASI CEK LAPANGAN


public function bebantuanteknisceklapangan($id)
{
    $databantuanteknis = bantuanteknis::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = ceklapanganbantek::where('bantuanteknis_id', $databantuanteknis->id)->paginate(50);

    return view('backend.04_bantuanteknis.01_berkaspemohon.03_berkasceklapangan', [
        'title' => 'Dokumentasi Cek Lapangan Permohonan Bantuan Teknis',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebantuanteknislapangancreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.02_createdata.create', [
        'title' => 'Form Tambah Dokumentasi Cek Lapangan',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebantuanteknislapangancreatenew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'bantuanteknis_id' => 'required|string',
        'kegiatan' => 'required|string',
        'foto1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
    ], [
        'bantuanteknis_id.required' => 'Field bantuanteknis_id wajib diisi.',
        'kegiatan.required' => 'Field kegiatan wajib diisi.',
        'foto1.required' => 'Foto Dokumentasi 1 wajib diunggah.',
        'foto1.image' => 'Foto Dokumentasi 1 harus berupa file gambar.',
        'foto1.mimes' => 'Foto Dokumentasi 1 harus berformat jpeg, png, jpg, gif, atau svg.',
        'foto1.max' => 'Ukuran foto Dokumentasi 1 maksimal 7MB.',
        'foto2.image' => 'Foto Dokumentasi 2 harus berupa file gambar.',
        'foto2.mimes' => 'Foto Dokumentasi 2 harus berformat jpeg, png, jpg, gif, atau svg.',
        'foto2.max' => 'Ukuran foto Dokumentasi 2 maksimal 7MB.',
        'foto3.image' => 'Foto Dokumentasi 3 harus berupa file gambar.',
        'foto3.mimes' => 'Foto Dokumentasi 3 harus berformat jpeg, png, jpg, gif, atau svg.',
        'foto3.max' => 'Ukuran foto Dokumentasi 3 maksimal 7MB.',
        'foto4.image' => 'Foto Dokumentasi 4 harus berupa file gambar.',
        'foto4.mimes' => 'Foto Dokumentasi 4 harus berformat jpeg, png, jpg, gif, atau svg.',
        'foto4.max' => 'Ukuran foto Dokumentasi 4 maksimal 7MB.',
        'foto5.image' => 'Foto Dokumentasi 5 harus berupa file gambar.',
        'foto5.mimes' => 'Foto Dokumentasi 5 harus berformat jpeg, png, jpg, gif, atau svg.',
        'foto5.max' => 'Ukuran foto Dokumentasi 5 maksimal 7MB.',
        'foto6.image' => 'Foto Dokumentasi 6 harus berupa file gambar.',
        'foto6.mimes' => 'Foto Dokumentasi 6 harus berformat jpeg, png, jpg, gif, atau svg.',
        'foto6.max' => 'Ukuran foto Dokumentasi 6 maksimal 7MB.',
    ]);

    $data = new ceklapanganbantek();

    $data->bantuanteknis_id = $validated['bantuanteknis_id'] ?? null;
    $data->kegiatan = $validated['kegiatan'] ?? null;

    // Upload foto1 sampai foto6 jika ada
    if ($request->hasFile('foto1')) {
        $file = $request->file('foto1');
        $filename = time() . '_foto1.' . $file->getClientOriginalExtension();
        $file->move(public_path('04_bantuanteknis/01_ceklapangan'), $filename);
        $data->foto1 = '04_bantuanteknis/01_ceklapangan/' . $filename;
    }

    if ($request->hasFile('foto2')) {
        $file = $request->file('foto2');
        $filename = time() . '_foto2.' . $file->getClientOriginalExtension();
        $file->move(public_path('04_bantuanteknis/02_ceklapangan'), $filename);
        $data->foto2 = '04_bantuanteknis/02_ceklapangan/' . $filename;
    }

    if ($request->hasFile('foto3')) {
        $file = $request->file('foto3');
        $filename = time() . '_foto3.' . $file->getClientOriginalExtension();
        $file->move(public_path('04_bantuanteknis/03_ceklapangan'), $filename);
        $data->foto3 = '04_bantuanteknis/03_ceklapangan/' . $filename;
    }

    if ($request->hasFile('foto4')) {
        $file = $request->file('foto4');
        $filename = time() . '_foto4.' . $file->getClientOriginalExtension();
        $file->move(public_path('04_bantuanteknis/04_ceklapangan'), $filename);
        $data->foto4 = '04_bantuanteknis/04_ceklapangan/' . $filename;
    }

    if ($request->hasFile('foto5')) {
        $file = $request->file('foto5');
        $filename = time() . '_foto5.' . $file->getClientOriginalExtension();
        $file->move(public_path('04_bantuanteknis/05_ceklapangan'), $filename);
        $data->foto5 = '04_bantuanteknis/05_ceklapangan/' . $filename;
    }

    if ($request->hasFile('foto6')) {
        $file = $request->file('foto6');
        $filename = time() . '_foto6.' . $file->getClientOriginalExtension();
        $file->move(public_path('06_bantuanteknis/06_ceklapangan'), $filename);
        $data->foto6 = '06_bantuanteknis/06_ceklapangan/' . $filename;
    }

    $data->save();

    session()->flash('create', 'Dokumentasi Cek Lapangan Berhasil Di Buat !');

    // *** PENTING ***
    // Variabel $id harus kamu ambil dari request atau dari $validated['bantuanteknis_id']
    // supaya redirect ke route berikut ini bisa benar
    $id = $validated['bantuanteknis_id']; // <--- *** ID INI BERWARNA MERAH ***

    return redirect()->route('bebantuanteknislapangan.show', ['id' => $id]);
}

// VERIFIKASI KE 2 BANTUAN TEKNIS PERMOHONAN
public function validasiberkas2update(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas2' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas2 = $request->validasiberkas2;
    $data->save();

      if ($request->validasiberkas2 === 'sudah') {
        session()->flash('create', '✅ Sudah Cek !');
    } else {
        session()->flash('gagal', '❌ Belum !');
    }
    return redirect('/bebantuanteknisindex');
}

public function validasiberkas3update(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas3' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas3 = $request->validasiberkas3;
    $data->save();

      if ($request->validasiberkas3 === 'sudah') {
        session()->flash('create', '✅ Data Selesai !');
    } else {
        session()->flash('gagal', '❌ Berkas di Pending !');
    }
    return redirect('/bebantuanteknisindex');
}

public function validasiberkas4update(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas4' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas4 = $request->validasiberkas4;
    $data->save();

    // Logika untuk pesan berdasarkan input
    if ($request->validasiberkas4 === 'sudah') {
        session()->flash('create', '✅ Berkas Sudah Di Terbitkan !');
    } else {
        session()->flash('gagal', '❌ Berkas Tidak Di Terbitkan !');
    }

    return redirect('/bebantuanteknisindex');
}



public function bebantuanteknislapanganupload($id)
{
    $databantuanteknis = bantuanteknis::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = ceklapanganbantek::where('bantuanteknis_id', $databantuanteknis->id)->paginate(50);

    return view('backend.04_bantuanteknis.02_createdata.uploadberkas', [
        'title' => 'Upload Berkas Surat Bantuan Teknis ',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebantuanteknisassistensi(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    // Filter hanya yang id = 1
    $query = bantuanteknis::whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', 1);
    });

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('nama_pemohon', 'like', "%{$search}%")
              ->orWhere('no_telepon', 'like', "%{$search}%")
              ->orWhere('namapaket', 'like', "%{$search}%")
              ->orWhere('kategoribangunan', 'like', "%{$search}%")
              ->orWhere('kepemilikan', 'like', "%{$search}%")
              ->orWhere('pengelola', 'like', "%{$search}%")
              ->orWhere('alamatlokasi', 'like', "%{$search}%")
              ->orWhere('rt', 'like', "%{$search}%")
              ->orWhere('rw', 'like', "%{$search}%")
              ->orWhere('kabupaten', 'like', "%{$search}%")
              ->orWhere('nosurat', 'like', "%{$search}%")
              ->orWhereYear('tahunpembangunan', $search)
              ->orWhereYear('tahunrenovasi', $search);
        });

        $query->orWhereHas('pemohon', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%");
        });

        $query->orWhereHas('dinas', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%");
        });

        $query->orWhereHas('jenispengajuanbantek', function ($q) use ($search) {
            $q->where('jenispengajuan', 'like', "%{$search}%");
        });

        $query->orWhereHas('kecamatanblora', function ($q) use ($search) {
            $q->where('kecamatanblora', 'like', "%{$search}%");
        });

        $query->orWhereHas('kelurahandesa', function ($q) use ($search) {
            $q->where('desa', 'like', "%{$search}%");
        });
    }

    $berkasbantek = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.04_bantuanteknis.01_berkaspemohon.05_berkaspemohonasistensi', [
        'title' => 'Permohonan Asistensi Bantuan Teknis',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}



public function bebantuanteknislapanganuploadnew($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.02_createdata.uploadberkas', [
        'title' => 'Upload Surat Terbit Bantuan Teknis Penyelenggaraan Bangunan Negara',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bebantuanteknislapanganberkas(Request $request, $id)
{
    $bantek = bantuanteknis::findOrFail($id); // Ini sudah benar

    // Validasi
    $request->validate([
        'uploadsuratbantek' => 'required|mimes:pdf|max:7048',
    ], [
        'uploadsuratbantek.required' => 'File Surat Bantek wajib diunggah.',
        'uploadsuratbantek.mimes' => 'File harus berupa format PDF.',
        'uploadsuratbantek.max' => 'Ukuran file maksimal 7MB.',
    ]);

    if ($request->hasFile('uploadsuratbantek')) {
        $file = $request->file('uploadsuratbantek');

        $filename = 'surat-bantek-' . Str::random(10) . '.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('04_bantuanteknis/07_berkassurat');

        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        $file->move($destinationPath, $filename);
        $filePath = '04_bantuanteknis/07_berkassurat/' . $filename;

        // ❗ Update ke record lama, bukan bikin baru
        $bantek->uploadsuratbantek = $filePath;
        $bantek->save();
    }

    session()->flash('create', 'Berkas Bantek Berhasil di Terbitkan !');
    return redirect("/bebantuanteknislapanganupload/{$bantek->id}");
}



public function bebantuanteknislapanganuploadnews($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.02_createdata.uploadberkaslainnya', [
        'title' => 'Upload Surat Terbit Bantuan Teknis Penyelenggaraan Bangunan Negara',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebantekpemohondinas(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    // Query dasar: hanya data dengan statusadmin_id = 7, milik user yang login
    $query = bantuanteknis::whereHas('pemohon', function ($q) use ($user) {
        $q->where('pemohon_id', $user->id)
          ->where('statusadmin_id', 7);
    })
    ->whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', '!=', 1); // mengecualikan id = 1
    });

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('nama_pemohon', 'like', "%{$search}%")
              ->orWhere('no_telepon', 'like', "%{$search}%")
              ->orWhere('namapaket', 'like', "%{$search}%")
              ->orWhere('kategoribangunan', 'like', "%{$search}%")
              ->orWhere('kepemilikan', 'like', "%{$search}%")
              ->orWhere('pengelola', 'like', "%{$search}%")
              ->orWhere('alamatlokasi', 'like', "%{$search}%")
              ->orWhere('rt', 'like', "%{$search}%")
              ->orWhere('rw', 'like', "%{$search}%")
              ->orWhere('kabupaten', 'like', "%{$search}%")
              ->orWhere('nosurat', 'like', "%{$search}%")
              ->orWhereYear('tahunpembangunan', $search)
              ->orWhereYear('tahunrenovasi', $search);
        });

        $query->orWhereHas('pemohon', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%");
        });

        $query->orWhereHas('dinas', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%");
        });

        $query->orWhereHas('jenispengajuanbantek', function ($q) use ($search) {
            $q->where('jenispengajuan', 'like', "%{$search}%");
        });

        $query->orWhereHas('kecamatanblora', function ($q) use ($search) {
            $q->where('kecamatanblora', 'like', "%{$search}%");
        });

        $query->orWhereHas('kelurahandesa', function ($q) use ($search) {
            $q->where('desa', 'like', "%{$search}%");
        });
    }

    $berkasbantek = $query->latest()->paginate($perPage)->appends($request->query());

    return view('backend.04_bantuanteknis.03_akunpemohonbantek.01_berkaspemohonindex', [
        'title' => 'Permohonan Bantuan Teknis Penyelenggaraan Bangunan Gedung',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}


public function bebantekpemohondinasperbaikan($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.03_akunpemohonbantek.02_perbaikandata', [
        'title' => 'Perbaikan Data Bantuan Teknis Saudara !',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bebantuanteknislapanganberkasbaru(Request $request, $id)
{
    $bantuan = bantuanteknis::findOrFail($id);

    // Validasi file upload (nullable karena gak wajib)
    $request->validate([
        'suratpermohonan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:7048',
        'kic' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:7048',
        'fotokondisi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:7048',
    ], [
        'suratpermohonan.mimes' => 'Surat Permohonan harus berupa file: pdf, jpg, jpeg, png.',
        'suratpermohonan.max' => 'Ukuran Surat Permohonan maksimal 7MB.',

        'kic.mimes' => 'File Kartu Identitas Bangunan harus berupa file: pdf, jpg, jpeg, png.',
        'kic.max' => 'Ukuran file Kartu Identitas Bangunan maksimal 7MB.',

        'fotokondisi.mimes' => 'File Foto Kondisi harus berupa file: pdf, jpg, jpeg, png.',
        'fotokondisi.max' => 'Ukuran file Foto Kondisi maksimal 7MB.',
    ]);

    // Surat Permohonan
    if ($request->hasFile('suratpermohonan')) {
        // Hapus file lama kalau ada
        if ($bantuan->suratpermohonan && file_exists(public_path($bantuan->suratpermohonan))) {
            unlink(public_path($bantuan->suratpermohonan));
        }

        $file = $request->file('suratpermohonan');
        $filename = time() . '_suratpermohonan.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('06_bantuanteknis/01_suratpermohonan');
        $file->move($destinationPath, $filename);

        $bantuan->suratpermohonan = '06_bantuanteknis/01_suratpermohonan/' . $filename;
    }

    // KIC
    if ($request->hasFile('kic')) {
        if ($bantuan->kic && file_exists(public_path($bantuan->kic))) {
            unlink(public_path($bantuan->kic));
        }

        $file = $request->file('kic');
        $filename = time() . '_kic.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('06_bantuanteknis/02_kartuinventaris');
        $file->move($destinationPath, $filename);

        $bantuan->kic = '06_bantuanteknis/02_kartuinventaris/' . $filename;
    }

    // Foto Kondisi
    if ($request->hasFile('fotokondisi')) {
        if ($bantuan->fotokondisi && file_exists(public_path($bantuan->fotokondisi))) {
            unlink(public_path($bantuan->fotokondisi));
        }

        $file = $request->file('fotokondisi');
        $filename = time() . '_fotokondisi.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('06_bantuanteknis/03_fotokondisi');
        $file->move($destinationPath, $filename);

        $bantuan->fotokondisi = '06_bantuanteknis/03_fotokondisi/' . $filename;
    }

    // Set validasi jadi null otomatis
    $bantuan->validasisuratpermohonan = null;
    $bantuan->validasikic = null;
    $bantuan->validasifotokondisi = null;
    $bantuan->validasiberkas1 = null;

    $bantuan->save();

    session()->flash('create', 'Perbaikan Berkas Anda Berhasil !');
    return redirect('/bebantekpemohondinas');
}

// DELETE CEK LAPANGAN
public function bebantuanteknislapangandelete($id)
{
    // Cari entri berdasarkan ID
    $entry = ceklapanganbantek::where('id', $id)->first();

    if ($entry) {
        // Simpan dulu lapangan_id sebelum entri dihapus
        $lapanganId = $entry->bantuanteknis_id;

        // Hapus file jika ada (aktifkan jika memang simpan file)
        // if (Storage::disk('public')->exists($entry->header)) {
        //     Storage::disk('public')->delete($entry->header);
        // }

        // Hapus data dari database
        $entry->delete();

        // Redirect ke halaman detail lapangan terkait
        return redirect()->route('bebantuanteknislapangan.show', ['id' => $lapanganId])
                         ->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}



public function bebantuanasistensilap($id)
{
    $databantuanteknis = bantuanteknis::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = ceklapanganbantek::where('bantuanteknis_id', $databantuanteknis->id)->paginate(50);

    return view('backend.04_bantuanteknis.01_berkaspemohon.07_berkasceklapanganasistensi', [
        'title' => 'Dokumentasi Cek Lapangan Permohonan Bantuan Teknis',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebantekpemohonasistensi(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    // Query dasar: hanya data dengan statusadmin_id = 7, milik user yang login
    $query = bantuanteknis::whereHas('pemohon', function ($q) use ($user) {
        $q->where('pemohon_id', $user->id)
          ->where('statusadmin_id', 7);
    })
    ->whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', '=', 1); // mengecualikan id = 1
    });

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('nama_pemohon', 'like', "%{$search}%")
              ->orWhere('no_telepon', 'like', "%{$search}%")
              ->orWhere('namapaket', 'like', "%{$search}%")
              ->orWhere('kategoribangunan', 'like', "%{$search}%")
              ->orWhere('kepemilikan', 'like', "%{$search}%")
              ->orWhere('pengelola', 'like', "%{$search}%")
              ->orWhere('alamatlokasi', 'like', "%{$search}%")
              ->orWhere('rt', 'like', "%{$search}%")
              ->orWhere('rw', 'like', "%{$search}%")
              ->orWhere('kabupaten', 'like', "%{$search}%")
              ->orWhere('nosurat', 'like', "%{$search}%")
              ->orWhereYear('tahunpembangunan', $search)
              ->orWhereYear('tahunrenovasi', $search);
        });

        $query->orWhereHas('pemohon', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%");
        });

        $query->orWhereHas('dinas', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%");
        });

        $query->orWhereHas('jenispengajuanbantek', function ($q) use ($search) {
            $q->where('jenispengajuan', 'like', "%{$search}%");
        });

        $query->orWhereHas('kecamatanblora', function ($q) use ($search) {
            $q->where('kecamatanblora', 'like', "%{$search}%");
        });

        $query->orWhereHas('kelurahandesa', function ($q) use ($search) {
            $q->where('desa', 'like', "%{$search}%");
        });
    }

    $berkasbantek = $query->latest()->paginate($perPage)->appends($request->query());

    return view('backend.04_bantuanteknis.03_akunpemohonbantek.03_berkaspermohonanasistensi', [
        'title' => 'Permohonan Bantuan Teknis Asistensi Penyelenggaraan Bangunan Gedung',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}


public function bebantekakundinasistensi(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    // Cek apakah user punya relasi dinas dan statusadmin_id-nya 7
    if (!$user->dinas || $user->dinas->statusadmin_id != 7) {
        abort(403, 'Akses ditolak. Anda tidak memiliki izin.');
    }

    // Query data bantuanteknis dengan jenis pengajuan id = 1
    $query = bantuanteknis::whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', 1);
    });

    // Filter pencarian jika ada keyword
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('nama_pemohon', 'like', "%{$search}%")
              ->orWhere('no_telepon', 'like', "%{$search}%")
              ->orWhere('namapaket', 'like', "%{$search}%")
              ->orWhere('kategoribangunan', 'like', "%{$search}%")
              ->orWhere('kepemilikan', 'like', "%{$search}%")
              ->orWhere('pengelola', 'like', "%{$search}%")
              ->orWhere('alamatlokasi', 'like', "%{$search}%")
              ->orWhere('rt', 'like', "%{$search}%")
              ->orWhere('rw', 'like', "%{$search}%")
              ->orWhere('kabupaten', 'like', "%{$search}%")
              ->orWhere('nosurat', 'like', "%{$search}%")
              ->orWhereYear('tahunpembangunan', $search)
              ->orWhereYear('tahunrenovasi', $search);
        });

        $query->orWhereHas('pemohon', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%");
        });

        $query->orWhereHas('dinas', function ($q) use ($search) {
            $q->where('name', 'like', "%{$search}%");
        });

        $query->orWhereHas('jenispengajuanbantek', function ($q) use ($search) {
            $q->where('jenispengajuan', 'like', "%{$search}%");
        });

        $query->orWhereHas('kecamatanblora', function ($q) use ($search) {
            $q->where('kecamatanblora', 'like', "%{$search}%");
        });

        $query->orWhereHas('kelurahandesa', function ($q) use ($search) {
            $q->where('desa', 'like', "%{$search}%");
        });
    }

    $berkasbantek = $query->latest()->paginate($perPage)->appends($request->query());

    return view('backend.04_bantuanteknis.04_akundinas.01_berkasasistensi', [
        'title' => 'Akun Dinas | Permohonan Bantuan Teknis Asistensi Penyelenggaraan Bangunan Gedung',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}


}
