<?php

namespace App\Http\Controllers;
use App\Models\bantuanteknis;
use App\Models\bujkkonsultan;
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
    $datakelurahan = kelurahandesa::all();
    $datapilihanpengajuan = jenispengajuanbantek::all();
    $datakonsultan = bujkkonsultan::all();

    $user = Auth::user();
    $dinas_id = Auth::id(); // ambil hanya ID akun yang login

    $statusadimindinas = User::with('statusadmin')
        ->where('statusadmin_id', 6)
        ->get();

    return view('frontend.abgblora.04_bantuanteknis.01_bantuanteknisindex', [
        'title' => 'Jenis Permohonan Bantuan Teknis',
        'datakecamatan' => $datakecamatan,
        'datakelurahan' => $datakelurahan,
        'datapilihanpengajuan' => $datapilihanpengajuan,
        'datakonsultanbantek' => $datakonsultan,
        'user' => $user,
        'dinas_id' => $dinas_id, // dikirim ke view
        'statusadimindinas' => $statusadimindinas,
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
    'bujkkonsultan_id' => 'nullable|string',
    'dinas_id' => 'nullable|string',
    'jenispengajuanbantek_id' => 'required|string',

    // 'nosurat' => 'nullable|string|max:255',
    'tanggalsurat' => 'nullable|date',
    'nama_pemohon' => 'required|string|max:255',
    'no_telepon' => 'required|string|max:20',

    'nosuratdinas' => 'required|string|max:255',
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

    'suratpermohonan' => 'required|file|mimes:pdf|max:10120',
    'kic' => 'required|file|mimes:pdf|max:10120',
    'fotokondisi' => 'required|file|mimes:pdf|max:10120',
    'rab' => 'nullable|file|mimes:pdf|max:10120',
    'asbuilt' => 'nullable|file|mimes:pdf|max:10120',

], [
    'bujkkonsultan_id.required' => 'Pemohon Wajib Di Isi !.',
    'dinas_id.required' => 'Pilihan Dinas Wajib Di Isi !.',
    'jenispengajuanbantek_id.required' => 'Jenis pengajuan wajib dipilih.',
    'jenispengajuanbantek_id.exists' => 'Jenis pengajuan tidak valid.',

    'nosuratdinas.required' => 'Nomor surat maksimal 255 karakter.',
    // 'nosurat.required' => 'Nomor surat maksimal 255 karakter.',
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
    'suratpermohonan.max' => 'Ukuran file surat permohonan maksimal 10 MB.',

    'kic.required' => 'File KIC Wajib di Upload !',
    'kic.file' => 'File KIC tidak valid.',
    'kic.mimes' => 'KIC harus berupa PDF.',
    'kic.max' => 'Ukuran file KIC maksimal 10 MB.',

    'fotokondisi.required' => 'File foto kondisi Wajib di Upload !',
    'fotokondisi.file' => 'File foto kondisi tidak valid.',
    'fotokondisi.mimes' => 'Foto kondisi harus berupa PDF',
    'fotokondisi.max' => 'Ukuran file KIC maksimal 10 MB.',

    'rab.file' => 'File foto kondisi tidak valid.',
    'rab.mimes' => 'Foto kondisi harus berupa PDF',
    'rab.max' => 'Ukuran file foto kondisi maksimal 10 MB.',

    'asbuilt.file' => 'File foto kondisi tidak valid.',
    'asbuilt.mimes' => 'Foto kondisi harus berupa PDF',
    'asbuilt.max' => 'Ukuran file foto kondisi maksimal 10 MB.',
]);

    // Buat direktori manual jika belum ada
    $paths = [
        'suratpermohonan' => '06_bantuanteknis/01_suratpermohonan',
        'kic' => '06_bantuanteknis/02_kartuinventaris',
        'fotokondisi' => '06_bantuanteknis/03_fotokondisi',
        'rab' => '06_bantuanteknis/04_rab',
        'asbuilt' => '06_bantuanteknis/05_asbuilt',
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

    $rabPath = null;
    if ($request->hasFile('rab')) {
        $file = $request->file('rab');
        $filename = 'rab_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path($paths['rab']), $filename);
        $rabPath = $paths['rab'] . '/' . $filename;
    }

    $asbuiltPath = null;
        if ($request->hasFile('asbuilt')) {
            $file = $request->file('asbuilt');
            $filename = 'asbuilt_' . time() . '_' . Str::random(5) . '.' . $file->getClientOriginalExtension();
            $file->move(public_path($paths['asbuilt']), $filename);
            $asbuiltPath = $paths['asbuilt'] . '/' . $filename;
        }



    // Simpan data
    $bantek = new bantuanteknis();
    $bantek->bujkkonsultan_id = $validated['bujkkonsultan_id'];
    $bantek->dinas_id = $validated['dinas_id'] ?? null;
    $bantek->jenispengajuanbantek_id = $validated['jenispengajuanbantek_id'];

    $bantek->nosurat = $validated['nosuratdinas'] ?? null;
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
    $bantek->rab = $rabPath;
    $bantek->asbuilt = $asbuiltPath;

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

    $jumlahDataIdDua = bantuanteknis::whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', 2);
    })->count();

    $jumlahDataIdTiga = bantuanteknis::whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', 3);
    })->count();

    $jumlahDataIdEmpat = bantuanteknis::whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', 4);
    })->count();

    $jumlahDataIdLima = bantuanteknis::whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', 5);
    })->count();

    $jumlahDataIdEnam = bantuanteknis::whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', 6);
    })->count();

    $jumlahDataIdDelapan = bantuanteknis::whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', 8);
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
        'jumlahDataIdDua' => $jumlahDataIdDua,
        'jumlahDataIdTiga' => $jumlahDataIdTiga,
        'jumlahDataIdEmpat' => $jumlahDataIdEmpat,
        'jumlahDataIdLima' => $jumlahDataIdLima,
        'jumlahDataIdEnam' => $jumlahDataIdEnam,
        'jumlahDataIdDelapan' => $jumlahDataIdDelapan,
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

  public function valsuratpermohonan1(Request $request, $id)
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
           return redirect('/bebantuanteknisassistensi');

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
    session()->flash('update', 'Asistensi Bantuan Teknis Berhasil Di Validasi !');

    // Redirect ke route bernama bebantuanteknis.show
    return redirect()->route('beasistensishowberkas1.show', ['id' => $id]);
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
        'title' => 'Dokumentasi Permohonan Bantuan Teknis',
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
        'title' => 'Form Dokumentasi Asistensi Bantuan Teknis Penyelenggaran Bangunan Gedung',
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
        'tanggalkegiatan' => 'required|date',
        'foto1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
    ], [
        'bantuanteknis_id.required' => 'bantuanteknis_id wajib diisi.',
        'kegiatan.required' => 'Nama Kegiatan wajib diisi.',
        'tanggalkegiatan.required' => 'Tanggal kegiatan wajib diisi.',
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
    $data->tanggalkegiatan = $validated['tanggalkegiatan'] ?? null;

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

    session()->flash('create', 'Dokumentasi Berhasil Di Buat !');

    // *** PENTING ***
    // Variabel $id harus kamu ambil dari request atau dari $validated['bantuanteknis_id']
    // supaya redirect ke route berikut ini bisa benar
    $id = $validated['bantuanteknis_id']; // <--- *** ID INI BERWARNA MERAH ***

    return redirect()->route('bebantuanasistensilap.show', ['id' => $id]);
}

// VERIFIKASI KE 2 BANTUAN TEKNIS PERMOHONAN

public function valsuratpermohonan2(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas2' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas2 = $request->validasiberkas2;
    $data->save();

      if ($request->validasiberkas2 === 'sudah') {
        session()->flash('create', '✅ Berkas Perencanaan Sudah Cek !');
    } else {
        session()->flash('gagal', '❌ Berkas Perencanaan Belum di Cek !');
    }
    return redirect('/bebantuanteknisassistensi');
}

public function valsuratpermohonan3(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas3' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas3 = $request->validasiberkas3;
    $data->save();

      if ($request->validasiberkas3 === 'sudah') {
        session()->flash('create', '✅ Asistensi Sudah Selesai !');
    } else {
        session()->flash('gagal', '❌ Berkas Asistensi belum selesai !');
    }
    return redirect('/bebantuanteknisassistensi');
}

public function valsuratpermohonan4(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas4' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas4 = $request->validasiberkas4;
    $data->save();

    // Logika untuk pesan berdasarkan input
    if ($request->validasiberkas4 === 'sudah') {
        session()->flash('create', '✅ Berkas Bantek Sudah Di Terbitkan !');
    } else {
        session()->flash('gagal', '❌ Berkas Bantek Tidak Di Terbitkan !');
    }

    return redirect('/bebantuanteknisassistensi');
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

    // Query dasar: hanya data dengan jenispengajuanbantek_id = 1
    $query = bantuanteknis::whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', 1);
    });

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where(function ($sub) use ($search) {
                $sub->where('nama_pemohon', 'like', "%{$search}%")
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

            $q->orWhereHas('bujkkonsultan', function ($sub) use ($search) {
                $sub->where('namalengkap', 'like', "%{$search}%");
            });

            $q->orWhereHas('dinas', function ($sub) use ($search) {
                $sub->where('name', 'like', "%{$search}%");
            });

            $q->orWhereHas('jenispengajuanbantek', function ($sub) use ($search) {
                $sub->where('jenispengajuan', 'like', "%{$search}%")
                     ->where('id', 1); // Tetap pastikan ID = 1
            });

            $q->orWhereHas('kecamatanblora', function ($sub) use ($search) {
                $sub->where('kecamatanblora', 'like', "%{$search}%");
            });

            $q->orWhereHas('kelurahandesa', function ($sub) use ($search) {
                $sub->where('desa', 'like', "%{$search}%");
            });
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
    return view('backend.04_bantuanteknis.02_createdata.01_uploadberkasasistensi', [
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

    return view('backend.04_bantuanteknis.04_akundinas.02_berkaspermohonanindex', [
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
    // Ambil data bantuan teknis berdasarkan ID
    $bantuan = bantuanteknis::findOrFail($id);

    // Validasi input
    $request->validate([
        'tinggibangunan' => 'required|string',
        'jumlahlantai' => 'required|string',
        'luastanahtotal' => 'required|string',
        'luasbangunan' => 'required|string',

        'suratpermohonan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:7048',
        'kic' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:7048',
        'fotokondisi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:7048',
    ], [
        'tinggibangunan.required' => 'Tinggi Bangunan wajib diisi!',
        'jumlahlantai.required' => 'Jumlah Lantai wajib diisi!',
        'luastanahtotal.required' => 'Luas Tanah Total wajib diisi!',
        'luasbangunan.required' => 'Luas Bangunan wajib diisi!',

        'suratpermohonan.required' => 'Surat Permohonan wajib diunggah!',
        'suratpermohonan.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'suratpermohonan.max' => 'Ukuran maksimal 7MB.',

        'kic.required' => 'Kartu Identitas Bangunan wajib diunggah!',
        'kic.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'kic.max' => 'Ukuran maksimal 7MB.',

        'fotokondisi.required' => 'Foto Kondisi wajib diunggah!',
        'fotokondisi.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'fotokondisi.max' => 'Ukuran maksimal 7MB.',
    ]);

    // Update data input umum
    $bantuan->tinggibangunan = $request->tinggibangunan;
    $bantuan->jumlahlantai = $request->jumlahlantai;
    $bantuan->luastanahtotal = $request->luastanahtotal;
    $bantuan->luasbangunan = $request->luasbangunan;

    // Handle upload Surat Permohonan
    if ($request->hasFile('suratpermohonan')) {
        if ($bantuan->suratpermohonan && file_exists(public_path($bantuan->suratpermohonan))) {
            unlink(public_path($bantuan->suratpermohonan));
        }

        $file = $request->file('suratpermohonan');
        $filename = time() . '_suratpermohonan.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('06_bantuanteknis/01_suratpermohonan');
        $file->move($destinationPath, $filename);
        $bantuan->suratpermohonan = '06_bantuanteknis/01_suratpermohonan/' . $filename;
    }

    // Handle upload KIC
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

    // Handle upload Foto Kondisi
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

    // Reset status validasi agar diverifikasi ulang
    $bantuan->validasisuratpermohonan = null;
    $bantuan->validasikic = null;
    $bantuan->validasifotokondisi = null;
    $bantuan->validasiberkas1 = null;

    $bantuan->save();

    // Flash pesan sukses & redirect ke halaman detail
    session()->flash('update', 'Perbaikan Berkas Anda Berhasil!');
    return redirect()->route('beasistensishowberkas1.show', ['id' => $bantuan->id]);
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
        return redirect()->route('bebantuanasistensilap.show', ['id' => $lapanganId])
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
        'title' => 'Dokumentasi Asistensi Bantuan Teknis',
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

    // Query dasar: data milik user login, dengan pemohon statusadmin_id = 6
    $query = bantuanteknis::whereHas('dinas', function ($q) use ($user) {
        $q->where('dinas_id', $user->id)
          ->where('statusadmin_id', 6);  // <-- ubah dari 7 jadi 6
    })
    ->whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', '=', 1); // tetap id=1
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

    return view('backend.04_bantuanteknis.04_akundinas.01_berkasasistensi', [
        'title' => 'Permohonan Bantuan Teknis Asistensi Penyelenggaraan Bangunan Gedung',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}


// AKUN KONSULTAN ASISTENSI BANTEK

public function bebantekakunkonsultan(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    // Query dasar: data milik user login, dengan pemohon statusadmin_id = 6
    $query = bantuanteknis::whereHas('asistensibantek', function ($q) use ($user) {
        $q->where('asistensibantek_id', $user->id)
          ->where('statusadmin_id', 4);  // <-- ubah dari 7 jadi 6
    })
    ->whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', '=', 1); // tetap id=1
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

    return view('backend.04_bantuanteknis.04_akundinas.01_berkasasistensi', [
        'title' => 'Permohonan Bantuan Teknis Asistensi Penyelenggaraan Bangunan Gedung',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}

public function bebantekdaftarkonsultan(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    // Filter hanya yang id = 1
    $query = bantuanteknis::whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', [1, 4]);
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

    return view('backend.04_bantuanteknis.04_akunkonsultan.01_berkaspermohonanasistensi', [
        'title' => 'Permohonan Asistensi Bantuan Teknis',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}



public function bebantekdaftarkonsultapilih($id)
{
    $databantuanteknis = bantuanteknis::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = ceklapanganbantek::where('bantuanteknis_id', $databantuanteknis->id)->paginate(50);

    return view('backend.04_bantuanteknis.04_akunkonsultan.02_createpilihasistensi', [
        'title' => 'Pilih Asistensi Anda !',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebantekdaftarkonsultapilihnew(Request $request, $id)
{
    $bantek = bantuanteknis::findOrFail($id);
    $user = Auth::user();

    // Karena inputnya readonly, biasanya gak perlu validasi, tapi kalau mau bisa ditambahkan

    // Update field sesuai form
    $bantek->nosurat = $request->input('nosurat', $bantek->nosurat);
    $bantek->tanggalsurat = $request->input('tanggalsurat', $bantek->tanggalsurat);
    $bantek->nama_pemohon = $request->input('nama_pemohon', $bantek->nama_pemohon);
    $bantek->no_telepon = $request->input('no_telepon', $bantek->no_telepon);
    $bantek->asistensibantek_id = $request->input('asistensibantek_id', $bantek->asistensibantek_id);

    $bantek->save();

    session()->flash('create', 'Data Bantek berhasil diperbarui!');

    return redirect("/bebantekdaftarkonsultan");
}


public function bebantekdaftarkonsultanproses(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    // Query dasar: data dengan relasi asistensibantek yang id-nya sama dengan user login,
    // dan statusadmin_id = 4 pada asistensibantek, juga jenispengajuanbantek id = 1
    $query = bantuanteknis::whereHas('asistensibantek', function ($q) use ($user) {
        $q->where('id', $user->id)  // Filter yang sesuai user login
          ->where('statusadmin_id', 4);
    })
    ->whereHas('jenispengajuanbantek', function ($q) {
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

    $berkasbantek = $query->latest()->paginate($perPage)->appends($request->query());

    return view('backend.04_bantuanteknis.04_akundinas.01_berkasasistensi', [
        'title' => 'Permohonan Bantuan Teknis Asistensi Penyelenggaraan Bangunan Gedung',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}


public function bebantekakundinasberkas(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    // Query dasar: hanya data dengan statusadmin_id = 7, milik user yang login
    $query = bantuanteknis::whereHas('dinas', function ($q) use ($user) {
        $q->where('dinas_id', $user->id)
          ->where('statusadmin_id', 6);
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

    return view('backend.04_bantuanteknis.04_akundinas.02_berkaspermohonanindex', [
        'title' => 'Permohonan Bantuan Teknis Penyelenggaraan Bangunan Gedung',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}

public function bebantekkonsultandata(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    $query = bujkkonsultan::query();

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('namalengkap', 'like', "%{$search}%")
              ->orWhere('alamat', 'like', "%{$search}%")
              ->orWhere('no_telepon', 'like', "%{$search}%")
              ->orWhere('email', 'like', "%{$search}%")
              ->orWhere('nomorindukberusaha', 'like', "%{$search}%")
              ->orWhere('pju', 'like', "%{$search}%")
              ->orWhere('no_akte', 'like', "%{$search}%")
              ->orWhereDate('tanggal', $search)
              ->orWhere('nama_notaris', 'like', "%{$search}%")
              ->orWhere('no_pengesahan', 'like', "%{$search}%");
        });

        $query->orWhereHas('bujkkonsultansub', function ($q) use ($search) {
            $q->where('nama', 'like', "%{$search}%");
        });

        $query->orWhereHas('asosiasimasjaki', function ($q) use ($search) {
            $q->where('nama', 'like', "%{$search}%");
        });
    }

    $bujk = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.04_bantuanteknis.05_datakonsultan.01_datakonsultanbantek', [
        'title' => 'Daftar Konsultan Bantuan Teknis Asistensi',
        'data'  => $bujk,
        'user'  => $user,
    ]);
}



// ---------------------------------------------------------------


public function bepenelitikontrak(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    // Query dasar: hanya data dengan jenispengajuanbantek_id = 1
    $query = bantuanteknis::whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', 2);
    });

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where(function ($sub) use ($search) {
                $sub->where('nama_pemohon', 'like', "%{$search}%")
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

            $q->orWhereHas('bujkkonsultan', function ($sub) use ($search) {
                $sub->where('namalengkap', 'like', "%{$search}%");
            });

            $q->orWhereHas('dinas', function ($sub) use ($search) {
                $sub->where('name', 'like', "%{$search}%");
            });

            $q->orWhereHas('jenispengajuanbantek', function ($sub) use ($search) {
                $sub->where('jenispengajuan', 'like', "%{$search}%")
                     ->where('id', 1); // Tetap pastikan ID = 1
            });

            $q->orWhereHas('kecamatanblora', function ($sub) use ($search) {
                $sub->where('kecamatanblora', 'like', "%{$search}%");
            });

            $q->orWhereHas('kelurahandesa', function ($sub) use ($search) {
                $sub->where('desa', 'like', "%{$search}%");
            });
        });
    }

    $berkasbantek = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.04_bantuanteknis.01_berkaspemohon.02_penelitikontrak.01_berkaspermohonan', [
        'title' => 'Permohonan Bantuan Teknis Penliti Kontrak',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}




  public function valsurat2permohonan1(Request $request, $id)
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
           return redirect('/bepenelitikontrak');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }

    public function valsurat2permohonan2(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas2' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas2 = $request->validasiberkas2;
    $data->save();

      if ($request->validasiberkas2 === 'sudah') {
        session()->flash('create', '✅ Sudah Selesai Verifikasi Lapangan !');
    } else {
        session()->flash('gagal', '❌ Belum Selesai Verifikasi Lapangan !');
    }
    return redirect('/bepenelitikontrak');
}



public function valsurat2permohonan3(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas3' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas3 = $request->validasiberkas3;
    $data->save();

      if ($request->validasiberkas3 === 'sudah') {
        session()->flash('create', '✅ Pengolahan Data Sudah Selesai !');
    } else {
        session()->flash('gagal', '❌ Pengolahan Data Belum di lakukan !');
    }
    return redirect('/bepenelitikontrak');
}



public function valsurat2permohonan4(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas4' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas4 = $request->validasiberkas4;
    $data->save();

    // Logika untuk pesan berdasarkan input
    if ($request->validasiberkas4 === 'sudah') {
        session()->flash('create', '✅ Berkas Bantek Sudah Di Terbitkan !');
    } else {
        session()->flash('gagal', '❌ Berkas Bantek Tidak Di Terbitkan !');
    }

    return redirect('/bepenelitikontrak');
}


// ---------------------------------------------------------------


public function beperhitunganpenyusutan(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    // Query dasar: hanya data dengan jenispengajuanbantek_id = 1
    $query = bantuanteknis::whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', 3);
    });

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where(function ($sub) use ($search) {
                $sub->where('nama_pemohon', 'like', "%{$search}%")
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

            $q->orWhereHas('bujkkonsultan', function ($sub) use ($search) {
                $sub->where('namalengkap', 'like', "%{$search}%");
            });

            $q->orWhereHas('dinas', function ($sub) use ($search) {
                $sub->where('name', 'like', "%{$search}%");
            });

            $q->orWhereHas('jenispengajuanbantek', function ($sub) use ($search) {
                $sub->where('jenispengajuan', 'like', "%{$search}%")
                     ->where('id', 1); // Tetap pastikan ID = 1
            });

            $q->orWhereHas('kecamatanblora', function ($sub) use ($search) {
                $sub->where('kecamatanblora', 'like', "%{$search}%");
            });

            $q->orWhereHas('kelurahandesa', function ($sub) use ($search) {
                $sub->where('desa', 'like', "%{$search}%");
            });
        });
    }

    $berkasbantek = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.04_bantuanteknis.01_berkaspemohon.03_perhitunganpenyusutan.01_berkaspermohonan', [
        'title' => 'Permohonan Bantuan Teknis Perhitungan Penyusutan Bangunan Gedung',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}




  public function valsurat3permohonan1(Request $request, $id)
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
           return redirect('/beperhitunganpenyusutan');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }



    public function valsurat3permohonan2(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas2' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas2 = $request->validasiberkas2;
    $data->save();

      if ($request->validasiberkas2 === 'sudah') {
        session()->flash('create', '✅ Sudah Selesai Verifikasi Lapangan !');
    } else {
        session()->flash('gagal', '❌ Belum Selesai Verifikasi Lapangan !');
    }
    return redirect('/beperhitunganpenyusutan');
}



public function valsurat3permohonan3(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas3' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas3 = $request->validasiberkas3;
    $data->save();

      if ($request->validasiberkas3 === 'sudah') {
        session()->flash('create', '✅ Pengolahan Data Sudah Selesai !');
    } else {
        session()->flash('gagal', '❌ Pengolahan Data Belum di lakukan !');
    }
    return redirect('/beperhitunganpenyusutan');
}

public function valsurat3permohonan4(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas4' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas4 = $request->validasiberkas4;
    $data->save();

    // Logika untuk pesan berdasarkan input
    if ($request->validasiberkas4 === 'sudah') {
        session()->flash('create', '✅ Berkas Bantek Sudah Di Terbitkan !');
    } else {
        session()->flash('gagal', '❌ Berkas Bantek Tidak Di Terbitkan !');
    }

    return redirect('/beperhitunganpenyusutan');
}




// ---------------------------------------------------------------


public function beperhitungankerusakan(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    // Query dasar: hanya data dengan jenispengajuanbantek_id = 1
    $query = bantuanteknis::whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', 4);
    });

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where(function ($sub) use ($search) {
                $sub->where('nama_pemohon', 'like', "%{$search}%")
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

            $q->orWhereHas('bujkkonsultan', function ($sub) use ($search) {
                $sub->where('namalengkap', 'like', "%{$search}%");
            });

            $q->orWhereHas('dinas', function ($sub) use ($search) {
                $sub->where('name', 'like', "%{$search}%");
            });

            $q->orWhereHas('jenispengajuanbantek', function ($sub) use ($search) {
                $sub->where('jenispengajuan', 'like', "%{$search}%")
                     ->where('id', 1); // Tetap pastikan ID = 1
            });

            $q->orWhereHas('kecamatanblora', function ($sub) use ($search) {
                $sub->where('kecamatanblora', 'like', "%{$search}%");
            });

            $q->orWhereHas('kelurahandesa', function ($sub) use ($search) {
                $sub->where('desa', 'like', "%{$search}%");
            });
        });
    }

    $berkasbantek = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.04_bantuanteknis.01_berkaspemohon.04_perhitungankerusakan.01_berkaspermohonan', [
        'title' => 'Permohonan Bantuan Teknis Perhitungan Kerusakan Bangunan Gedung',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}


  public function valsurat4permohonan1(Request $request, $id)
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
           return redirect('/beperhitungankerusakan');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


    public function valsurat4permohonan2(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas2' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas2 = $request->validasiberkas2;
    $data->save();

      if ($request->validasiberkas2 === 'sudah') {
        session()->flash('create', '✅ Sudah Selesai Verifikasi Lapangan !');
    } else {
        session()->flash('gagal', '❌ Belum Selesai Verifikasi Lapangan !');
    }
    return redirect('/beperhitungankerusakan');
}


public function valsurat4permohonan3(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas3' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas3 = $request->validasiberkas3;
    $data->save();

      if ($request->validasiberkas3 === 'sudah') {
        session()->flash('create', '✅ Pengolahan Data Sudah Selesai !');
    } else {
        session()->flash('gagal', '❌ Pengolahan Data Belum di lakukan !');
    }
    return redirect('/beperhitungankerusakan');
}

public function valsurat4permohonan4(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas4' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas4 = $request->validasiberkas4;
    $data->save();

    // Logika untuk pesan berdasarkan input
    if ($request->validasiberkas4 === 'sudah') {
        session()->flash('create', '✅ Berkas Bantek Sudah Di Terbitkan !');
    } else {
        session()->flash('gagal', '❌ Berkas Bantek Tidak Di Terbitkan !');
    }

    return redirect('/beperhitungankerusakan');
}


// ---------------------------------------------------------------


public function beperhitunganbgn(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    // Query dasar: hanya data dengan jenispengajuanbantek_id = 1
    $query = bantuanteknis::whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', 5);
    });

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where(function ($sub) use ($search) {
                $sub->where('nama_pemohon', 'like', "%{$search}%")
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

            $q->orWhereHas('bujkkonsultan', function ($sub) use ($search) {
                $sub->where('namalengkap', 'like', "%{$search}%");
            });

            $q->orWhereHas('dinas', function ($sub) use ($search) {
                $sub->where('name', 'like', "%{$search}%");
            });

            $q->orWhereHas('jenispengajuanbantek', function ($sub) use ($search) {
                $sub->where('jenispengajuan', 'like', "%{$search}%")
                     ->where('id', 1); // Tetap pastikan ID = 1
            });

            $q->orWhereHas('kecamatanblora', function ($sub) use ($search) {
                $sub->where('kecamatanblora', 'like', "%{$search}%");
            });

            $q->orWhereHas('kelurahandesa', function ($sub) use ($search) {
                $sub->where('desa', 'like', "%{$search}%");
            });
        });
    }

    $berkasbantek = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.04_bantuanteknis.01_berkaspemohon.05_perhitunganbgn.01_berkaspermohonan', [
        'title' => 'Permohonan Bantuan Teknis Perhitungan Pemeliharaan Bangunan Gedung Negara',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}



  public function valsurat5permohonan1(Request $request, $id)
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
           return redirect('/beperhitunganbgn');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


    public function valsurat5permohonan2(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas2' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas2 = $request->validasiberkas2;
    $data->save();

      if ($request->validasiberkas2 === 'sudah') {
        session()->flash('create', '✅ Sudah Selesai Verifikasi Lapangan !');
    } else {
        session()->flash('gagal', '❌ Belum Selesai Verifikasi Lapangan !');
    }
    return redirect('/beperhitunganbgn');
}


public function valsurat5permohonan3(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas3' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas3 = $request->validasiberkas3;
    $data->save();

      if ($request->validasiberkas3 === 'sudah') {
        session()->flash('create', '✅ Pengolahan Data Sudah Selesai !');
    } else {
        session()->flash('gagal', '❌ Pengolahan Data Belum di lakukan !');
    }
    return redirect('/beperhitunganbgn');
}

public function valsurat5permohonan4(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas4' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas4 = $request->validasiberkas4;
    $data->save();

    // Logika untuk pesan berdasarkan input
    if ($request->validasiberkas4 === 'sudah') {
        session()->flash('create', '✅ Berkas Bantek Sudah Di Terbitkan !');
    } else {
        session()->flash('gagal', '❌ Berkas Bantek Tidak Di Terbitkan !');
    }

    return redirect('/beperhitunganbgn');
}


// ---------------------------------------------------------------


public function bekonstruksiperhitunganbgn(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    // Query dasar: hanya data dengan jenispengajuanbantek_id = 1
    $query = bantuanteknis::whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', 6);
    });

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where(function ($sub) use ($search) {
                $sub->where('nama_pemohon', 'like', "%{$search}%")
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

            $q->orWhereHas('bujkkonsultan', function ($sub) use ($search) {
                $sub->where('namalengkap', 'like', "%{$search}%");
            });

            $q->orWhereHas('dinas', function ($sub) use ($search) {
                $sub->where('name', 'like', "%{$search}%");
            });

            $q->orWhereHas('jenispengajuanbantek', function ($sub) use ($search) {
                $sub->where('jenispengajuan', 'like', "%{$search}%")
                     ->where('id', 1); // Tetap pastikan ID = 1
            });

            $q->orWhereHas('kecamatanblora', function ($sub) use ($search) {
                $sub->where('kecamatanblora', 'like', "%{$search}%");
            });

            $q->orWhereHas('kelurahandesa', function ($sub) use ($search) {
                $sub->where('desa', 'like', "%{$search}%");
            });
        });
    }

    $berkasbantek = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.04_bantuanteknis.01_berkaspemohon.06_konstruksibgn.01_berkaspermohonan', [
        'title' => 'Permohonan Bantuan Teknis Perhitungan Konstruksi Bangunan Gedung Negara',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}



  public function valsurat6permohonan1(Request $request, $id)
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
           return redirect('/bekonstruksiperhitunganbgn');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


        public function valsurat6permohonan2(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas2' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas2 = $request->validasiberkas2;
    $data->save();

      if ($request->validasiberkas2 === 'sudah') {
        session()->flash('create', '✅ Sudah Selesai Verifikasi Lapangan !');
    } else {
        session()->flash('gagal', '❌ Belum Selesai Verifikasi Lapangan !');
    }
    return redirect('/bekonstruksiperhitunganbgn');
}


public function valsurat6permohonan3(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas3' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas3 = $request->validasiberkas3;
    $data->save();

      if ($request->validasiberkas3 === 'sudah') {
        session()->flash('create', '✅ Pengolahan Data Sudah Selesai !');
    } else {
        session()->flash('gagal', '❌ Pengolahan Data Belum di lakukan !');
    }
    return redirect('/bekonstruksiperhitunganbgn');
}


public function valsurat6permohonan4(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas4' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas4 = $request->validasiberkas4;
    $data->save();

    // Logika untuk pesan berdasarkan input
    if ($request->validasiberkas4 === 'sudah') {
        session()->flash('create', '✅ Berkas Bantek Sudah Di Terbitkan !');
    } else {
        session()->flash('gagal', '❌ Berkas Bantek Tidak Di Terbitkan !');
    }

    return redirect('/bekonstruksiperhitunganbgn');
}


// ---------------------------------------------------------------


public function beserahterima(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    // Query dasar: hanya data dengan jenispengajuanbantek_id = 1
    $query = bantuanteknis::whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', 8);
    });

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where(function ($sub) use ($search) {
                $sub->where('nama_pemohon', 'like', "%{$search}%")
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

            $q->orWhereHas('bujkkonsultan', function ($sub) use ($search) {
                $sub->where('namalengkap', 'like', "%{$search}%");
            });

            $q->orWhereHas('dinas', function ($sub) use ($search) {
                $sub->where('name', 'like', "%{$search}%");
            });

            $q->orWhereHas('jenispengajuanbantek', function ($sub) use ($search) {
                $sub->where('jenispengajuan', 'like', "%{$search}%")
                     ->where('id', 1); // Tetap pastikan ID = 1
            });

            $q->orWhereHas('kecamatanblora', function ($sub) use ($search) {
                $sub->where('kecamatanblora', 'like', "%{$search}%");
            });

            $q->orWhereHas('kelurahandesa', function ($sub) use ($search) {
                $sub->where('desa', 'like', "%{$search}%");
            });
        });
    }

    $berkasbantek = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.04_bantuanteknis.01_berkaspemohon.07_pendampinganserahterima.01_berkaspermohonan', [
        'title' => 'Permohonan Bantuan Teknis Pendampingan Serah Terima Pekerjaan ',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}



  public function valsurat7permohonan1(Request $request, $id)
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
           return redirect('/beserahterima');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


     public function valsurat7permohonan2(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas2' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas2 = $request->validasiberkas2;
    $data->save();

      if ($request->validasiberkas2 === 'sudah') {
        session()->flash('create', '✅ Sudah Selesai Verifikasi Lapangan !');
    } else {
        session()->flash('gagal', '❌ Belum Selesai Verifikasi Lapangan !');
    }
    return redirect('/beserahterima');
}


public function valsurat7permohonan3(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas3' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas3 = $request->validasiberkas3;
    $data->save();

      if ($request->validasiberkas3 === 'sudah') {
        session()->flash('create', '✅ Pengolahan Data Sudah Selesai !');
    } else {
        session()->flash('gagal', '❌ Pengolahan Data Belum di lakukan !');
    }
    return redirect('/beserahterima');
}



public function valsurat7permohonan4(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas4' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas4 = $request->validasiberkas4;
    $data->save();

    // Logika untuk pesan berdasarkan input
    if ($request->validasiberkas4 === 'sudah') {
        session()->flash('create', '✅ Berkas Bantek Sudah Di Terbitkan !');
    } else {
        session()->flash('gagal', '❌ Berkas Bantek Tidak Di Terbitkan !');
    }

    return redirect('/beserahterima');
}

// ---------------------------------------------------------------
public function bepersontimteknis(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 20);

    // Query dasar: hanya data dengan jenispengajuanbantek_id = 1
    $query = bantuanteknis::whereHas('jenispengajuanbantek', function ($q) {
        $q->where('id', 9);
    });

    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where(function ($sub) use ($search) {
                $sub->where('nama_pemohon', 'like', "%{$search}%")
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

            $q->orWhereHas('bujkkonsultan', function ($sub) use ($search) {
                $sub->where('namalengkap', 'like', "%{$search}%");
            });

            $q->orWhereHas('dinas', function ($sub) use ($search) {
                $sub->where('name', 'like', "%{$search}%");
            });

            $q->orWhereHas('jenispengajuanbantek', function ($sub) use ($search) {
                $sub->where('jenispengajuan', 'like', "%{$search}%")
                     ->where('id', 1); // Tetap pastikan ID = 1
            });

            $q->orWhereHas('kecamatanblora', function ($sub) use ($search) {
                $sub->where('kecamatanblora', 'like', "%{$search}%");
            });

            $q->orWhereHas('kelurahandesa', function ($sub) use ($search) {
                $sub->where('desa', 'like', "%{$search}%");
            });
        });
    }

    $berkasbantek = $query->latest()->paginate($perPage)->appends($request->all());

    return view('backend.04_bantuanteknis.01_berkaspemohon.08_permintaantimteknis.01_berkaspermohonan', [
        'title' => 'Permohonan Bantuan Teknis Permintaan Personil ',
        'data'  => $berkasbantek,
        'user'  => $user,
    ]);
}



  public function valsurat8permohonan1(Request $request, $id)
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
           return redirect('/bepersontimteknis');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


    public function valsurat8permohonan2(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas2' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas2 = $request->validasiberkas2;
    $data->save();

      if ($request->validasiberkas2 === 'sudah') {
        session()->flash('create', '✅ Sudah Selesai Verifikasi Lapangan !');
    } else {
        session()->flash('gagal', '❌ Belum Selesai Verifikasi Lapangan !');
    }
    return redirect('/bepersontimteknis');
}


public function valsurat8permohonan3(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas3' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas3 = $request->validasiberkas3;
    $data->save();

      if ($request->validasiberkas3 === 'sudah') {
        session()->flash('create', '✅ Pengolahan Data Sudah Selesai !');
    } else {
        session()->flash('gagal', '❌ Pengolahan Data Belum di lakukan !');
    }
    return redirect('/bepersontimteknis');
}



public function valsurat8permohonan4(Request $request, $id)
{
    $data = bantuanteknis::findOrFail($id);

    $request->validate([
        'validasiberkas4' => 'required|in:sudah,belum',
    ]);

    $data->validasiberkas4 = $request->validasiberkas4;
    $data->save();

    // Logika untuk pesan berdasarkan input
    if ($request->validasiberkas4 === 'sudah') {
        session()->flash('create', '✅ Berkas Bantek Sudah Di Terbitkan !');
    } else {
        session()->flash('gagal', '❌ Berkas Bantek Tidak Di Terbitkan !');
    }

    return redirect('/bepersontimteknis');
}



public function bebantekceklapangandok($id)
{
    $databantuanteknis = bantuanteknis::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = ceklapanganbantek::where('bantuanteknis_id', $databantuanteknis->id)->paginate(50);

    return view('backend.04_bantuanteknis.01_berkaspemohon.08_berkasceklapangan', [
        'title' => 'Dokumentasi Cek Lapangan Bantuan Teknis',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebanteklap($id)
{
    $databantuanteknis = bantuanteknis::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = ceklapanganbantek::where('bantuanteknis_id', $databantuanteknis->id)->paginate(50);

    return view('backend.04_bantuanteknis.01_berkaspemohon.09_berkasceklap', [
        'title' => 'Dokumentasi Cek Lapangan Permohonan Bantuan Teknis Penyelenggaraan Bangunan Gedung ',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebanteklapcekdokcreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.02_createdata.createceklapangan', [
        'title' => 'Form Dokumentasi Cek Lapangan Bantuan Teknis Penyelenggaran Bangunan Gedung',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebanteklapcekdokcreatenew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'bantuanteknis_id' => 'required|string',
        'kegiatan' => 'required|string',
        'tanggalkegiatan' => 'required|date',
        'foto1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
    ], [
        'bantuanteknis_id.required' => 'bantuanteknis_id wajib diisi.',
        'kegiatan.required' => 'Nama Kegiatan wajib diisi.',
        'tanggalkegiatan.required' => 'Tanggal kegiatan wajib diisi.',
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
    $data->tanggalkegiatan = $validated['tanggalkegiatan'] ?? null;

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

    session()->flash('create', 'Dokumentasi Berhasil Di Buat !');

    // *** PENTING ***
    // Variabel $id harus kamu ambil dari request atau dari $validated['bantuanteknis_id']
    // supaya redirect ke route berikut ini bisa benar
    $id = $validated['bantuanteknis_id']; // <--- *** ID INI BERWARNA MERAH ***

    return redirect()->route('bebantuanteknislapa.show', ['id' => $id]);
}



public function bebantekupload2berkas($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.02_createdata.02_uploadberkas', [
        'title' => 'Upload Surat Terbit Bantuan Teknis Peniti Kontrak',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}



public function bebantekupload2new(Request $request, $id)
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

    session()->flash('create', 'Berkas Bantek Peneliti Kontrak Berhasil di Terbitkan !');
    return redirect("/bebantekupload2/{$bantek->id}");
}


public function bebantekupload3berkas($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.02_createdata.03_uploadberkas', [
        'title' => 'Upload Surat Terbit Bantuan Teknis Perhitungan Penyusutan Bangunan Gedung',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bebantekupload4berkas($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.02_createdata.04_uploadberkas', [
        'title' => 'Upload Surat Terbit Bantuan Teknis Perhitungan Tingkat Kerusakan Bangunan Gedung',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebantekupload4new(Request $request, $id)
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

    session()->flash('create', 'Berkas Bantek Peneliti Kontrak Berhasil di Terbitkan !');
    return redirect("/bebantekupload4/{$bantek->id}");
}


public function bebantekupload3new(Request $request, $id)
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

    session()->flash('create', 'Berkas Bantek Perhitungan Penyusutan Berhasil di Terbitkan !');
    return redirect("/bebantekupload3/{$bantek->id}");
}


public function bebantekupload5berkas($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.02_createdata.05_uploadberkas', [
        'title' => 'Upload Surat Terbit Bantuan Teknis Perhitungan Biaya Pemeliharaan Bangunan Gedung Negara',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}



public function bebantekupload5new(Request $request, $id)
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

    session()->flash('create', 'Berkas Bantek Perhitungan Biaya Pemeliharaan BGN Berhasil di Terbitkan !');
    return redirect("/bebantekupload5/{$bantek->id}");
}



public function bebantekupload6berkas($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.02_createdata.06_uploadberkas', [
        'title' => 'Upload Surat Terbit Bantuan Teknis Perhitungan Biaya Konstruksi Pembangunan Bangunan Gedung Negara',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}



public function bebantekupload6new(Request $request, $id)
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

    session()->flash('create', 'Berkas Bantek Perhitungan Biaya Konstruksi Pembangunan BGN Berhasil di Terbitkan !');
    return redirect("/bebantekupload6/{$bantek->id}");
}


public function bebantekupload7berkas($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.02_createdata.07_uploadberkas', [
        'title' => 'Upload Surat Terbit Bantuan Teknis Pendampingan Serah Terima Pekerjaan',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebantekupload7new(Request $request, $id)
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

    session()->flash('create', 'Berkas Bantek Pendampingan Serah Terima Pekerjaan Berhasil di Terbitkan !');
    return redirect("/bebantekupload7/{$bantek->id}");
}


public function bebantekupload8berkas($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.02_createdata.08_uploadberkas', [
        'title' => 'Upload Surat Terbit Bantuan Teknis Permintaan Tim Personil',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebanteklapper3($id)
{
    $databantuanteknis = bantuanteknis::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = ceklapanganbantek::where('bantuanteknis_id', $databantuanteknis->id)->paginate(50);

    return view('backend.04_bantuanteknis.01_berkaspemohon.10_berkasceklap', [
        'title' => 'Dokumentasi Cek Lapangan Permohonan Bantuan Teknis Perhitungan Penyusutan Bangunan Gedung ',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebanteklapper3create($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.02_createdata.00_createdok.03_ceklapangan', [
        'title' => 'Form Dokumentasi Cek Lapangan Bantuan Teknis Perhitungan Penyusutan Bangunan Gedung',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}



public function bebanteklapper3createnew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'bantuanteknis_id' => 'required|string',
        'kegiatan' => 'required|string',
        'tanggalkegiatan' => 'required|date',
        'foto1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
    ], [
        'bantuanteknis_id.required' => 'bantuanteknis_id wajib diisi.',
        'kegiatan.required' => 'Nama Kegiatan wajib diisi.',
        'tanggalkegiatan.required' => 'Tanggal kegiatan wajib diisi.',
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
    $data->tanggalkegiatan = $validated['tanggalkegiatan'] ?? null;

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

    session()->flash('create', 'Dokumentasi Berhasil Di Buat !');

    // *** PENTING ***
    // Variabel $id harus kamu ambil dari request atau dari $validated['bantuanteknis_id']
    // supaya redirect ke route berikut ini bisa benar
    $id = $validated['bantuanteknis_id']; // <--- *** ID INI BERWARNA MERAH ***

    return redirect()->route('bebanteklapper3.show', ['id' => $id]);
}


public function bebanteklapper3delete($id)
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
        return redirect()->route('bebanteklapper3.show', ['id' => $lapanganId])
                         ->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}


// BERKAS CEK LAPANGAN PERMOHONAN KE 4 FULL PAKET

public function bebanteklapper4($id)
{
    $databantuanteknis = bantuanteknis::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = ceklapanganbantek::where('bantuanteknis_id', $databantuanteknis->id)->paginate(50);

    return view('backend.04_bantuanteknis.01_berkaspemohon.11_berkasceklap', [
        'title' => 'Dokumentasi Cek Lapangan Permohonan Bantuan Teknis Perhitungan Tingkat Kerusakan Bangunan Gedung ',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebanteklapper4create($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.02_createdata.00_createdok.04_ceklapangan', [
        'title' => 'Form Dokumentasi Cek Lapangan Bantuan Teknis Perhitungan Tingkat Kerusakan Bangunan Gedung',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}



public function bebanteklapper4createnew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'bantuanteknis_id' => 'required|string',
        'kegiatan' => 'required|string',
        'tanggalkegiatan' => 'required|date',
        'foto1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
    ], [
        'bantuanteknis_id.required' => 'bantuanteknis_id wajib diisi.',
        'kegiatan.required' => 'Nama Kegiatan wajib diisi.',
        'tanggalkegiatan.required' => 'Tanggal kegiatan wajib diisi.',
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
    $data->tanggalkegiatan = $validated['tanggalkegiatan'] ?? null;

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

    session()->flash('create', 'Dokumentasi Berhasil Di Buat !');

    // *** PENTING ***
    // Variabel $id harus kamu ambil dari request atau dari $validated['bantuanteknis_id']
    // supaya redirect ke route berikut ini bisa benar
    $id = $validated['bantuanteknis_id']; // <--- *** ID INI BERWARNA MERAH ***

    return redirect()->route('bebanteklapper4.show', ['id' => $id]);
}



public function bebanteklapper4delete($id)
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
        return redirect()->route('bebanteklapper4.show', ['id' => $lapanganId])
                         ->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}

// BERKAS CEK LAPANGAN PERMOHONAN KE 5 FULL PAKET

public function bebanteklapper5($id)
{
    $databantuanteknis = bantuanteknis::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = ceklapanganbantek::where('bantuanteknis_id', $databantuanteknis->id)->paginate(50);

    return view('backend.04_bantuanteknis.01_berkaspemohon.12_berkasceklap', [
        'title' => 'Dokumentasi Cek Lapangan Permohonan Bantuan Teknis Perhitungan Pemeliharaan Bangunan Gedung Negara ',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebanteklapper5create($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.02_createdata.00_createdok.05_ceklapangan', [
        'title' => 'Form Dokumentasi Cek Lapangan Bantuan Teknis Perhitungan Pemeliharaan Bangunan Gedung Negara',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bebanteklapper5createnew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'bantuanteknis_id' => 'required|string',
        'kegiatan' => 'required|string',
        'tanggalkegiatan' => 'required|date',
        'foto1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
    ], [
        'bantuanteknis_id.required' => 'bantuanteknis_id wajib diisi.',
        'kegiatan.required' => 'Nama Kegiatan wajib diisi.',
        'tanggalkegiatan.required' => 'Tanggal kegiatan wajib diisi.',
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
    $data->tanggalkegiatan = $validated['tanggalkegiatan'] ?? null;

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

    session()->flash('create', 'Dokumentasi Berhasil Di Buat !');

    // *** PENTING ***
    // Variabel $id harus kamu ambil dari request atau dari $validated['bantuanteknis_id']
    // supaya redirect ke route berikut ini bisa benar
    $id = $validated['bantuanteknis_id']; // <--- *** ID INI BERWARNA MERAH ***

    return redirect()->route('bebanteklapper5.show', ['id' => $id]);
}



public function bebanteklapper5delete($id)
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
        return redirect()->route('bebanteklapper5.show', ['id' => $lapanganId])
                         ->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}

// BERKAS CEK LAPANGAN PERMOHONAN KE 6 FULL PAKET

public function bebanteklapper6($id)
{
    $databantuanteknis = bantuanteknis::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = ceklapanganbantek::where('bantuanteknis_id', $databantuanteknis->id)->paginate(50);

    return view('backend.04_bantuanteknis.01_berkaspemohon.13_berkasceklap', [
        'title' => 'Dokumentasi Cek Lapangan Permohonan Bantuan Teknis Perhitungan Konstruksi Pembangunan Bangunan Gedung Negara ',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebanteklapper6create($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.02_createdata.00_createdok.06_ceklapangan', [
        'title' => 'Form Dokumentasi Cek Lapangan Bantuan Teknis Perhitungan Konstruksi Bangunan Gedung Negara',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bebanteklapper6createnew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'bantuanteknis_id' => 'required|string',
        'kegiatan' => 'required|string',
        'tanggalkegiatan' => 'required|date',
        'foto1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
    ], [
        'bantuanteknis_id.required' => 'bantuanteknis_id wajib diisi.',
        'kegiatan.required' => 'Nama Kegiatan wajib diisi.',
        'tanggalkegiatan.required' => 'Tanggal kegiatan wajib diisi.',
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
    $data->tanggalkegiatan = $validated['tanggalkegiatan'] ?? null;

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

    session()->flash('create', 'Dokumentasi Berhasil Di Buat !');

    // *** PENTING ***
    // Variabel $id harus kamu ambil dari request atau dari $validated['bantuanteknis_id']
    // supaya redirect ke route berikut ini bisa benar
    $id = $validated['bantuanteknis_id']; // <--- *** ID INI BERWARNA MERAH ***

    return redirect()->route('bebanteklapper6.show', ['id' => $id]);
}



public function bebanteklapper6delete($id)
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
        return redirect()->route('bebanteklapper6.show', ['id' => $lapanganId])
                         ->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}


// BERKAS CEK LAPANGAN PERMOHONAN KE 7 FULL PAKET

public function bebanteklapper7($id)
{
    $databantuanteknis = bantuanteknis::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = ceklapanganbantek::where('bantuanteknis_id', $databantuanteknis->id)->paginate(50);

    return view('backend.04_bantuanteknis.01_berkaspemohon.14_berkasceklap', [
        'title' => 'Dokumentasi Cek Lapangan Permohonan Bantuan Teknis Pendampingan Serah Terima Bangunan Gedung Negara ',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebanteklapper7create($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.02_createdata.00_createdok.07_ceklapangan', [
        'title' => 'Form Dokumentasi Cek Lapangan Bantuan Teknis Pendampingan Serah Terima Bangunan Gedung Negara',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bebanteklapper7createnew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'bantuanteknis_id' => 'required|string',
        'kegiatan' => 'required|string',
        'tanggalkegiatan' => 'required|date',
        'foto1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
    ], [
        'bantuanteknis_id.required' => 'bantuanteknis_id wajib diisi.',
        'kegiatan.required' => 'Nama Kegiatan wajib diisi.',
        'tanggalkegiatan.required' => 'Tanggal kegiatan wajib diisi.',
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
    $data->tanggalkegiatan = $validated['tanggalkegiatan'] ?? null;

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

    session()->flash('create', 'Dokumentasi Berhasil Di Buat !');

    // *** PENTING ***
    // Variabel $id harus kamu ambil dari request atau dari $validated['bantuanteknis_id']
    // supaya redirect ke route berikut ini bisa benar
    $id = $validated['bantuanteknis_id']; // <--- *** ID INI BERWARNA MERAH ***

    return redirect()->route('bebanteklapper7.show', ['id' => $id]);
}



public function bebanteklapper7delete($id)
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
        return redirect()->route('bebanteklapper7.show', ['id' => $lapanganId])
                         ->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}
// BERKAS CEK LAPANGAN PERMOHONAN KE 8 FULL PAKET

public function bebanteklapper8($id)
{
    $databantuanteknis = bantuanteknis::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = ceklapanganbantek::where('bantuanteknis_id', $databantuanteknis->id)->paginate(50);

    return view('backend.04_bantuanteknis.01_berkaspemohon.15_berkasceklap', [
        'title' => 'Dokumentasi Cek Lapangan Permohonan Bantuan Teknis Permintaan Personil Tim Teknis ',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebanteklapper8create($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.02_createdata.00_createdok.08_ceklapangan', [
        'title' => 'Form Dokumentasi Cek Lapangan Bantuan Teknis Permintaan Personil Tim Teknis',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bebanteklapper8createnew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'bantuanteknis_id' => 'required|string',
        'kegiatan' => 'required|string',
        'tanggalkegiatan' => 'required|date',
        'foto1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
        'foto6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:7048',
    ], [
        'bantuanteknis_id.required' => 'bantuanteknis_id wajib diisi.',
        'kegiatan.required' => 'Nama Kegiatan wajib diisi.',
        'tanggalkegiatan.required' => 'Tanggal kegiatan wajib diisi.',
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
    $data->tanggalkegiatan = $validated['tanggalkegiatan'] ?? null;

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

    session()->flash('create', 'Dokumentasi Berhasil Di Buat !');

    // *** PENTING ***
    // Variabel $id harus kamu ambil dari request atau dari $validated['bantuanteknis_id']
    // supaya redirect ke route berikut ini bisa benar
    $id = $validated['bantuanteknis_id']; // <--- *** ID INI BERWARNA MERAH ***

    return redirect()->route('bebanteklapper8.show', ['id' => $id]);
}



public function bebanteklapper8delete($id)
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
        return redirect()->route('bebanteklapper8.show', ['id' => $lapanganId])
                         ->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}



    public function validasidokumenberkasbantek2(Request $request, $id)
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
    session()->flash('update', 'Bantek Peneliti Kontrak Berhasil Di Validasi !');

    // Redirect ke route bernama bebantuanteknis.show
    return redirect()->route('bebantuanteknis.show', ['id' => $id]);
}



public function bebantekperpeneliti($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.03_akunpemohonbantek.00_perbaikan.02_perbaikandata', [
        'title' => 'Perbaikan Data Bantuan Teknis Peneliti Kontrak !',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bebantekperpenelitiperbaikan(Request $request, $id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $bantuan = bantuanteknis::findOrFail($id);

    // Validasi input
    $request->validate([
        'tinggibangunan' => 'required|string',
        'jumlahlantai' => 'required|string',
        'luastanahtotal' => 'required|string',
        'luasbangunan' => 'required|string',

        'suratpermohonan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'kic' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'fotokondisi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
    ], [
        'tinggibangunan.required' => 'Tinggi Bangunan wajib diisi!',
        'jumlahlantai.required' => 'Jumlah Lantai wajib diisi!',
        'luastanahtotal.required' => 'Luas Tanah Total wajib diisi!',
        'luasbangunan.required' => 'Luas Bangunan wajib diisi!',

        'suratpermohonan.required' => 'Surat Permohonan wajib diunggah!',
        'suratpermohonan.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'suratpermohonan.max' => 'Ukuran maksimal 10MB.',

        'kic.required' => 'Kartu Identitas Bangunan wajib diunggah!',
        'kic.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'kic.max' => 'Ukuran maksimal 10MB.',

        'fotokondisi.required' => 'Foto Kondisi wajib diunggah!',
        'fotokondisi.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'fotokondisi.max' => 'Ukuran maksimal 10MB.',
    ]);

    // Update data input umum
    $bantuan->tinggibangunan = $request->tinggibangunan;
    $bantuan->jumlahlantai = $request->jumlahlantai;
    $bantuan->luastanahtotal = $request->luastanahtotal;
    $bantuan->luasbangunan = $request->luasbangunan;

    // Handle upload Surat Permohonan
    if ($request->hasFile('suratpermohonan')) {
        if ($bantuan->suratpermohonan && file_exists(public_path($bantuan->suratpermohonan))) {
            unlink(public_path($bantuan->suratpermohonan));
        }

        $file = $request->file('suratpermohonan');
        $filename = time() . '_suratpermohonan.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('06_bantuanteknis/01_suratpermohonan');
        $file->move($destinationPath, $filename);
        $bantuan->suratpermohonan = '06_bantuanteknis/01_suratpermohonan/' . $filename;
    }

    // Handle upload KIC
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

    // Handle upload Foto Kondisi
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

    // Reset status validasi agar diverifikasi ulang
    $bantuan->validasisuratpermohonan = null;
    $bantuan->validasikic = null;
    $bantuan->validasifotokondisi = null;
    $bantuan->validasiberkas1 = null;

    $bantuan->save();

    // Flash pesan sukses & redirect ke halaman detail
    session()->flash('update', 'Perbaikan Berkas Anda Berhasil!');
    return redirect()->route('bebantuanteknis.show', ['id' => $bantuan->id]);
}

// ------------------------- BERKAS PERMOHONAN PERHITUNGAN BANGUNAN GEDUNG ----------------------
public function beperhitunganpenyusutanshow($id)
{
    // Cari data berdasarkan ID
    $data = bantuanteknis::findOrFail($id);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Tampilkan ke view dengan key-value
    return view('backend.04_bantuanteknis.00_berkaspermohonan.03_berkas', [
        'title' => 'Berkas Permohonan Bantuan Teknis Perhitungan Penyusutan Bangunan Gedung Negara',
        'data' => $data,
        'user' => $user
    ]);
}


public function validasidokumenberkasbantek3(Request $request, $id)
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
    session()->flash('update', 'Bantek Perhitungan Penyusutan Berhasil Di Validasi !');

    // Redirect ke route bernama bebantuanteknis.show
    return redirect()->route('beperhitunganpenyusutan.show', ['id' => $id]);
}

public function beperhitunganpenyusutanper($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.03_akunpemohonbantek.00_perbaikan.03_perbaikandata', [
        'title' => 'Perbaikan Data Bantuan Teknis Perhitungan Penyusutan Bangunan Gedung Negara !',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function beperhitunganpenyusutanpernew(Request $request, $id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $bantuan = bantuanteknis::findOrFail($id);

    // Validasi input
    $request->validate([
        'tinggibangunan' => 'required|string',
        'jumlahlantai' => 'required|string',
        'luastanahtotal' => 'required|string',
        'luasbangunan' => 'required|string',

        'suratpermohonan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'kic' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'fotokondisi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
    ], [
        'tinggibangunan.required' => 'Tinggi Bangunan wajib diisi!',
        'jumlahlantai.required' => 'Jumlah Lantai wajib diisi!',
        'luastanahtotal.required' => 'Luas Tanah Total wajib diisi!',
        'luasbangunan.required' => 'Luas Bangunan wajib diisi!',

        'suratpermohonan.required' => 'Surat Permohonan wajib diunggah!',
        'suratpermohonan.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'suratpermohonan.max' => 'Ukuran maksimal 10MB.',

        'kic.required' => 'Kartu Identitas Bangunan wajib diunggah!',
        'kic.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'kic.max' => 'Ukuran maksimal 10MB.',

        'fotokondisi.required' => 'Foto Kondisi wajib diunggah!',
        'fotokondisi.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'fotokondisi.max' => 'Ukuran maksimal 10MB.',
    ]);

    // Update data input umum
    $bantuan->tinggibangunan = $request->tinggibangunan;
    $bantuan->jumlahlantai = $request->jumlahlantai;
    $bantuan->luastanahtotal = $request->luastanahtotal;
    $bantuan->luasbangunan = $request->luasbangunan;

    // Handle upload Surat Permohonan
    if ($request->hasFile('suratpermohonan')) {
        if ($bantuan->suratpermohonan && file_exists(public_path($bantuan->suratpermohonan))) {
            unlink(public_path($bantuan->suratpermohonan));
        }

        $file = $request->file('suratpermohonan');
        $filename = time() . '_suratpermohonan.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('06_bantuanteknis/01_suratpermohonan');
        $file->move($destinationPath, $filename);
        $bantuan->suratpermohonan = '06_bantuanteknis/01_suratpermohonan/' . $filename;
    }

    // Handle upload KIC
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

    // Handle upload Foto Kondisi
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

    // Reset status validasi agar diverifikasi ulang
    $bantuan->validasisuratpermohonan = null;
    $bantuan->validasikic = null;
    $bantuan->validasifotokondisi = null;
    $bantuan->validasiberkas1 = null;

    $bantuan->save();

    // Flash pesan sukses & redirect ke halaman detail
    session()->flash('update', 'Perbaikan Berkas Anda Berhasil!');
    return redirect()->route('beperhitunganpenyusutan.show', ['id' => $bantuan->id]);
}


// ------------------------- BERKAS PERMOHONAN PERHITUNGAN TINGKAT KERUSAKAN BANGUNAN GEDUNG NEGARA ----------------------
public function beperhitungankerusakanshow($id)
{
    // Cari data berdasarkan ID
    $data = bantuanteknis::findOrFail($id);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Tampilkan ke view dengan key-value
    return view('backend.04_bantuanteknis.00_berkaspermohonan.04_berkas', [
        'title' => 'Berkas Permohonan Bantuan Teknis Perhitungan Tingkat Kerusakan Bangunan Gedung Negara',
        'data' => $data,
        'user' => $user
    ]);
}

public function validasidokumenberkasbantek4(Request $request, $id)
{
    // Validasi input wajib & opsional
    $request->validate([
        'validasisuratpermohonan' => 'required|in:sesuai,tidak_sesuai',
        'validasikic' => 'required|in:sesuai,tidak_sesuai',
        'validasifotokondisi' => 'required|in:sesuai,tidak_sesuai',
        'validasirab' => 'required|in:sesuai,tidak_sesuai',
        'validasiasbuilt' => 'required|in:sesuai,tidak_sesuai',
        'catatanvalidasi' => 'nullable|string',
    ]);

    // Cari peserta berdasarkan ID
    $item = bantuanteknis::findOrFail($id);

    // Simpan data
    $item->update([
        'validasisuratpermohonan' => $request->validasisuratpermohonan,
        'validasikic' => $request->validasikic,
        'validasifotokondisi' => $request->validasifotokondisi,
        'validasirab' => $request->validasirab,
        'validasiasbuilt' => $request->validasiasbuilt,
        'catatanvalidasi' => $request->catatanvalidasi,
    ]);

    // Flash message
    session()->flash('update', 'Perhitungan Tingkat Kerusakan Di Validasi !');

    // Redirect ke route bernama bebantuanteknis.show
    return redirect()->route('beperhitungankerusakan.show', ['id' => $id]);
}


public function beperhitungankerusakanper($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.03_akunpemohonbantek.00_perbaikan.04_perbaikandata', [
        'title' => 'Perbaikan Data Bantuan Teknis Perhitungan Tingkat Kerusakan Bangunan Gedung Negara !',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function beperhitungankerusakanpernew(Request $request, $id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $bantuan = bantuanteknis::findOrFail($id);

    // Validasi input
    $request->validate([
        'tinggibangunan' => 'required|string',
        'jumlahlantai' => 'required|string',
        'luastanahtotal' => 'required|string',
        'luasbangunan' => 'required|string',

        'suratpermohonan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'kic' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'fotokondisi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'rab' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'asbuilt' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
    ], [
        'tinggibangunan.required' => 'Tinggi Bangunan wajib diisi!',
        'jumlahlantai.required' => 'Jumlah Lantai wajib diisi!',
        'luastanahtotal.required' => 'Luas Tanah Total wajib diisi!',
        'luasbangunan.required' => 'Luas Bangunan wajib diisi!',

        'suratpermohonan.required' => 'Surat Permohonan wajib diunggah!',
        'suratpermohonan.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'suratpermohonan.max' => 'Ukuran maksimal 10MB.',

        'kic.required' => 'Kartu Identitas Bangunan wajib diunggah!',
        'kic.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'kic.max' => 'Ukuran maksimal 10MB.',

        'fotokondisi.required' => 'Foto Kondisi wajib diunggah!',
        'fotokondisi.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'fotokondisi.max' => 'Ukuran maksimal 10MB.',

        'rab.required' => 'Foto Kondisi wajib diunggah!',
        'rab.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'rab.max' => 'Ukuran maksimal 10MB.',

        'asbuilt.required' => 'Foto Kondisi wajib diunggah!',
        'asbuilt.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'asbuilt.max' => 'Ukuran maksimal 10MB.',

    ]);

    // Update data input umum
    $bantuan->tinggibangunan = $request->tinggibangunan;
    $bantuan->jumlahlantai = $request->jumlahlantai;
    $bantuan->luastanahtotal = $request->luastanahtotal;
    $bantuan->luasbangunan = $request->luasbangunan;

    // Handle upload Surat Permohonan
    if ($request->hasFile('suratpermohonan')) {
        if ($bantuan->suratpermohonan && file_exists(public_path($bantuan->suratpermohonan))) {
            unlink(public_path($bantuan->suratpermohonan));
        }

        $file = $request->file('suratpermohonan');
        $filename = time() . '_suratpermohonan.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('06_bantuanteknis/01_suratpermohonan');
        $file->move($destinationPath, $filename);
        $bantuan->suratpermohonan = '06_bantuanteknis/01_suratpermohonan/' . $filename;
    }

    // Handle upload KIC
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

    // Handle upload Foto Kondisi
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

    // Handle upload RAB
if ($request->hasFile('rab')) {
    if ($bantuan->rab && file_exists(public_path($bantuan->rab))) {
        unlink(public_path($bantuan->rab));
    }

    $file = $request->file('rab');
    $filename = time() . '_rab.' . $file->getClientOriginalExtension();
    $destinationPath = public_path('06_bantuanteknis/04_rab');
    $file->move($destinationPath, $filename);
    $bantuan->rab = '06_bantuanteknis/04_rab/' . $filename;
}

// Handle upload Asbuilt
if ($request->hasFile('asbuilt')) {
    if ($bantuan->asbuilt && file_exists(public_path($bantuan->asbuilt))) {
        unlink(public_path($bantuan->asbuilt));
    }

    $file = $request->file('asbuilt');
    $filename = time() . '_asbuilt.' . $file->getClientOriginalExtension();
    $destinationPath = public_path('06_bantuanteknis/05_asbuilt');
    $file->move($destinationPath, $filename);
    $bantuan->asbuilt = '06_bantuanteknis/05_asbuilt/' . $filename;
}


    // Reset status validasi agar diverifikasi ulang
    $bantuan->validasisuratpermohonan = null;
    $bantuan->validasikic = null;
    $bantuan->validasifotokondisi = null;

    $bantuan->validasirab = null;
    $bantuan->validasiasbuilt = null;

    $bantuan->validasiberkas1 = null;

    $bantuan->save();

    // Flash pesan sukses & redirect ke halaman detail
    session()->flash('update', 'Perbaikan Berkas Anda Berhasil!');
    return redirect()->route('beperhitungankerusakan.show', ['id' => $bantuan->id]);
}


// ------------------------- BERKAS PERMOHONAN PERHITUNGAN PEMELIHARAAN BANGUNAN GEDUNG ----------------------
public function beperhitunganbgnshow($id)
{
    // Cari data berdasarkan ID
    $data = bantuanteknis::findOrFail($id);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Tampilkan ke view dengan key-value
    return view('backend.04_bantuanteknis.00_berkaspermohonan.05_berkas', [
        'title' => 'Berkas Permohonan Bantuan Teknis Perhitungan Pemeliharaan Bangunan Gedung Negara',
        'data' => $data,
        'user' => $user
    ]);
}

public function validasidokumenberkasbantek5(Request $request, $id)
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
    session()->flash('update', 'Bantek Perhitungan Pemeliharaan BGN Berhasil Di Validasi !');

    // Redirect ke route bernama bebantuanteknis.show
    return redirect()->route('beperhitunganbgnshow.show', ['id' => $id]);
}


public function beperhitunganbgnper($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.03_akunpemohonbantek.00_perbaikan.05_perbaikandata', [
        'title' => 'Perbaikan Data Bantuan Teknis Perhitungan Pemeliharaan Bangunan Gedung Negara !',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function beperhitunganbgnpernew(Request $request, $id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $bantuan = bantuanteknis::findOrFail($id);

    // Validasi input
    $request->validate([
        'tinggibangunan' => 'required|string',
        'jumlahlantai' => 'required|string',
        'luastanahtotal' => 'required|string',
        'luasbangunan' => 'required|string',

        'suratpermohonan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'kic' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'fotokondisi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
    ], [
        'tinggibangunan.required' => 'Tinggi Bangunan wajib diisi!',
        'jumlahlantai.required' => 'Jumlah Lantai wajib diisi!',
        'luastanahtotal.required' => 'Luas Tanah Total wajib diisi!',
        'luasbangunan.required' => 'Luas Bangunan wajib diisi!',

        'suratpermohonan.required' => 'Surat Permohonan wajib diunggah!',
        'suratpermohonan.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'suratpermohonan.max' => 'Ukuran maksimal 10MB.',

        'kic.required' => 'Kartu Identitas Bangunan wajib diunggah!',
        'kic.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'kic.max' => 'Ukuran maksimal 10MB.',

        'fotokondisi.required' => 'Foto Kondisi wajib diunggah!',
        'fotokondisi.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'fotokondisi.max' => 'Ukuran maksimal 10MB.',
    ]);

    // Update data input umum
    $bantuan->tinggibangunan = $request->tinggibangunan;
    $bantuan->jumlahlantai = $request->jumlahlantai;
    $bantuan->luastanahtotal = $request->luastanahtotal;
    $bantuan->luasbangunan = $request->luasbangunan;

    // Handle upload Surat Permohonan
    if ($request->hasFile('suratpermohonan')) {
        if ($bantuan->suratpermohonan && file_exists(public_path($bantuan->suratpermohonan))) {
            unlink(public_path($bantuan->suratpermohonan));
        }

        $file = $request->file('suratpermohonan');
        $filename = time() . '_suratpermohonan.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('06_bantuanteknis/01_suratpermohonan');
        $file->move($destinationPath, $filename);
        $bantuan->suratpermohonan = '06_bantuanteknis/01_suratpermohonan/' . $filename;
    }

    // Handle upload KIC
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

    // Handle upload Foto Kondisi
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

    // Reset status validasi agar diverifikasi ulang
    $bantuan->validasisuratpermohonan = null;
    $bantuan->validasikic = null;
    $bantuan->validasifotokondisi = null;
    $bantuan->validasiberkas1 = null;

    $bantuan->save();

    // Flash pesan sukses & redirect ke halaman detail
    session()->flash('update', 'Perbaikan Berkas Anda Berhasil!');
    return redirect()->route('beperhitunganbgnshow.show', ['id' => $bantuan->id]);
}



// ------------------------- BERKAS PERMOHONAN PERHITUNGAN PEMELIHARAAN BANGUNAN GEDUNG ----------------------
public function bekonstruksiperhitunganbgnshow($id)
{
    // Cari data berdasarkan ID
    $data = bantuanteknis::findOrFail($id);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Tampilkan ke view dengan key-value
    return view('backend.04_bantuanteknis.00_berkaspermohonan.06_berkas', [
        'title' => 'Berkas Permohonan Bantuan Teknis Perhitungan Konstruksi Bangunan Gedung Negara',
        'data' => $data,
        'user' => $user
    ]);
}

public function validasidokumenberkasbantek6(Request $request, $id)
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
    session()->flash('update', 'Bantek Perhitungan Konstruksi BGN Berhasil Di Validasi !');

    // Redirect ke route bernama bebantuanteknis.show
    return redirect()->route('bekonstruksiperhitunganbgn.show', ['id' => $id]);
}

public function bekonstruksiperhitunganbgnper($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.03_akunpemohonbantek.00_perbaikan.06_perbaikandata', [
        'title' => 'Perbaikan Data Bantuan Teknis Perhitungan Konstruksi Bangunan Gedung Negara !',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bekonstruksiperhitunganbgnnew(Request $request, $id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $bantuan = bantuanteknis::findOrFail($id);

    // Validasi input
    $request->validate([
        'tinggibangunan' => 'required|string',
        'jumlahlantai' => 'required|string',
        'luastanahtotal' => 'required|string',
        'luasbangunan' => 'required|string',

        'suratpermohonan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'kic' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'fotokondisi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
    ], [
        'tinggibangunan.required' => 'Tinggi Bangunan wajib diisi!',
        'jumlahlantai.required' => 'Jumlah Lantai wajib diisi!',
        'luastanahtotal.required' => 'Luas Tanah Total wajib diisi!',
        'luasbangunan.required' => 'Luas Bangunan wajib diisi!',

        'suratpermohonan.required' => 'Surat Permohonan wajib diunggah!',
        'suratpermohonan.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'suratpermohonan.max' => 'Ukuran maksimal 10MB.',

        'kic.required' => 'Kartu Identitas Bangunan wajib diunggah!',
        'kic.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'kic.max' => 'Ukuran maksimal 10MB.',

        'fotokondisi.required' => 'Foto Kondisi wajib diunggah!',
        'fotokondisi.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'fotokondisi.max' => 'Ukuran maksimal 10MB.',
    ]);

    // Update data input umum
    $bantuan->tinggibangunan = $request->tinggibangunan;
    $bantuan->jumlahlantai = $request->jumlahlantai;
    $bantuan->luastanahtotal = $request->luastanahtotal;
    $bantuan->luasbangunan = $request->luasbangunan;

    // Handle upload Surat Permohonan
    if ($request->hasFile('suratpermohonan')) {
        if ($bantuan->suratpermohonan && file_exists(public_path($bantuan->suratpermohonan))) {
            unlink(public_path($bantuan->suratpermohonan));
        }

        $file = $request->file('suratpermohonan');
        $filename = time() . '_suratpermohonan.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('06_bantuanteknis/01_suratpermohonan');
        $file->move($destinationPath, $filename);
        $bantuan->suratpermohonan = '06_bantuanteknis/01_suratpermohonan/' . $filename;
    }

    // Handle upload KIC
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

    // Handle upload Foto Kondisi
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

    // Reset status validasi agar diverifikasi ulang
    $bantuan->validasisuratpermohonan = null;
    $bantuan->validasikic = null;
    $bantuan->validasifotokondisi = null;
    $bantuan->validasiberkas1 = null;

    $bantuan->save();

    // Flash pesan sukses & redirect ke halaman detail
    session()->flash('update', 'Perbaikan Berkas Anda Berhasil!');
    return redirect()->route('bekonstruksiperhitunganbgn.show', ['id' => $bantuan->id]);
}

// ------------------------- BERKAS PERMOHONAN PERHITUNGAN PEMELIHARAAN BANGUNAN GEDUNG ----------------------
public function beserahterimashow($id)
{
    // Cari data berdasarkan ID
    $data = bantuanteknis::findOrFail($id);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Tampilkan ke view dengan key-value
    return view('backend.04_bantuanteknis.00_berkaspermohonan.07_berkas', [
        'title' => 'Berkas Permohonan Bantuan Teknis Serah Terima',
        'data' => $data,
        'user' => $user
    ]);
}


public function validasidokumenberkasbantek7(Request $request, $id)
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
    session()->flash('update', 'Bantek Serah Terima Berhasil Di Validasi !');

    // Redirect ke route bernama bebantuanteknis.show
    return redirect()->route('beserahterima.show', ['id' => $id]);
}

public function beserahterimaper($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.03_akunpemohonbantek.00_perbaikan.07_perbaikandata', [
        'title' => 'Perbaikan Data Bantuan Teknis Serah Terima !',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function beserahterimapernew(Request $request, $id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $bantuan = bantuanteknis::findOrFail($id);

    // Validasi input
    $request->validate([
        'tinggibangunan' => 'required|string',
        'jumlahlantai' => 'required|string',
        'luastanahtotal' => 'required|string',
        'luasbangunan' => 'required|string',

        'suratpermohonan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'kic' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'fotokondisi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
    ], [
        'tinggibangunan.required' => 'Tinggi Bangunan wajib diisi!',
        'jumlahlantai.required' => 'Jumlah Lantai wajib diisi!',
        'luastanahtotal.required' => 'Luas Tanah Total wajib diisi!',
        'luasbangunan.required' => 'Luas Bangunan wajib diisi!',

        'suratpermohonan.required' => 'Surat Permohonan wajib diunggah!',
        'suratpermohonan.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'suratpermohonan.max' => 'Ukuran maksimal 10MB.',

        'kic.required' => 'Kartu Identitas Bangunan wajib diunggah!',
        'kic.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'kic.max' => 'Ukuran maksimal 10MB.',

        'fotokondisi.required' => 'Foto Kondisi wajib diunggah!',
        'fotokondisi.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'fotokondisi.max' => 'Ukuran maksimal 10MB.',
    ]);

    // Update data input umum
    $bantuan->tinggibangunan = $request->tinggibangunan;
    $bantuan->jumlahlantai = $request->jumlahlantai;
    $bantuan->luastanahtotal = $request->luastanahtotal;
    $bantuan->luasbangunan = $request->luasbangunan;

    // Handle upload Surat Permohonan
    if ($request->hasFile('suratpermohonan')) {
        if ($bantuan->suratpermohonan && file_exists(public_path($bantuan->suratpermohonan))) {
            unlink(public_path($bantuan->suratpermohonan));
        }

        $file = $request->file('suratpermohonan');
        $filename = time() . '_suratpermohonan.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('06_bantuanteknis/01_suratpermohonan');
        $file->move($destinationPath, $filename);
        $bantuan->suratpermohonan = '06_bantuanteknis/01_suratpermohonan/' . $filename;
    }

    // Handle upload KIC
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

    // Handle upload Foto Kondisi
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

    // Reset status validasi agar diverifikasi ulang
    $bantuan->validasisuratpermohonan = null;
    $bantuan->validasikic = null;
    $bantuan->validasifotokondisi = null;
    $bantuan->validasiberkas1 = null;

    $bantuan->save();

    // Flash pesan sukses & redirect ke halaman detail
    session()->flash('update', 'Perbaikan Berkas Anda Berhasil!');
    return redirect()->route('beserahterima.show', ['id' => $bantuan->id]);
}


// ------------------------- BERKAS PERMOHONAN PERHITUNGAN PEMELIHARAAN BANGUNAN GEDUNG ----------------------
public function bepersontimteknisshow($id)
{
    // Cari data berdasarkan ID
    $data = bantuanteknis::findOrFail($id);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Tampilkan ke view dengan key-value
    return view('backend.04_bantuanteknis.00_berkaspermohonan.08_berkas', [
        'title' => 'Berkas Permohonan Bantuan Teknis Personil Tim Teknis',
        'data' => $data,
        'user' => $user
    ]);
}


public function validasidokumenberkasbantek8(Request $request, $id)
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
    session()->flash('update', 'Bantek Personil Tim Teknis Berhasil Di Validasi !');

    // Redirect ke route bernama bebantuanteknis.show
    return redirect()->route('bepersontimteknis.show', ['id' => $id]);
}

public function bepersontimteknisper($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = bantuanteknis::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.04_bantuanteknis.03_akunpemohonbantek.00_perbaikan.08_perbaikandata', [
        'title' => 'Perbaikan Data Bantuan Teknis Personil Tim Teknis !',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function bepersontimteknispernew(Request $request, $id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $bantuan = bantuanteknis::findOrFail($id);

    // Validasi input
    $request->validate([
        'tinggibangunan' => 'required|string',
        'jumlahlantai' => 'required|string',
        'luastanahtotal' => 'required|string',
        'luasbangunan' => 'required|string',

        'suratpermohonan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'kic' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'fotokondisi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
    ], [
        'tinggibangunan.required' => 'Tinggi Bangunan wajib diisi!',
        'jumlahlantai.required' => 'Jumlah Lantai wajib diisi!',
        'luastanahtotal.required' => 'Luas Tanah Total wajib diisi!',
        'luasbangunan.required' => 'Luas Bangunan wajib diisi!',

        'suratpermohonan.required' => 'Surat Permohonan wajib diunggah!',
        'suratpermohonan.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'suratpermohonan.max' => 'Ukuran maksimal 10MB.',

        'kic.required' => 'Kartu Identitas Bangunan wajib diunggah!',
        'kic.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'kic.max' => 'Ukuran maksimal 10MB.',

        'fotokondisi.required' => 'Foto Kondisi wajib diunggah!',
        'fotokondisi.mimes' => 'Format harus pdf/jpg/jpeg/png.',
        'fotokondisi.max' => 'Ukuran maksimal 10MB.',
    ]);

    // Update data input umum
    $bantuan->tinggibangunan = $request->tinggibangunan;
    $bantuan->jumlahlantai = $request->jumlahlantai;
    $bantuan->luastanahtotal = $request->luastanahtotal;
    $bantuan->luasbangunan = $request->luasbangunan;

    // Handle upload Surat Permohonan
    if ($request->hasFile('suratpermohonan')) {
        if ($bantuan->suratpermohonan && file_exists(public_path($bantuan->suratpermohonan))) {
            unlink(public_path($bantuan->suratpermohonan));
        }

        $file = $request->file('suratpermohonan');
        $filename = time() . '_suratpermohonan.' . $file->getClientOriginalExtension();
        $destinationPath = public_path('06_bantuanteknis/01_suratpermohonan');
        $file->move($destinationPath, $filename);
        $bantuan->suratpermohonan = '06_bantuanteknis/01_suratpermohonan/' . $filename;
    }

    // Handle upload KIC
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

    // Handle upload Foto Kondisi
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

    // Reset status validasi agar diverifikasi ulang
    $bantuan->validasisuratpermohonan = null;
    $bantuan->validasikic = null;
    $bantuan->validasifotokondisi = null;
    $bantuan->validasiberkas1 = null;

    $bantuan->save();

    // Flash pesan sukses & redirect ke halaman detail
    session()->flash('update', 'Perbaikan Berkas Anda Berhasil!');
    return redirect()->route('bepersontimteknis.show', ['id' => $bantuan->id]);
}


}
