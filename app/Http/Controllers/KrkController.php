<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;  // Tambahkan ini untuk mengimpor kelas Str
use Illuminate\Support\Facades\File;
use App\Models\kecamatanblora;
use App\Models\kelurahandesa;
use Illuminate\Http\Request;

use App\Models\krk;
use App\Models\krkhunian;
use App\Models\krkusaha;
use App\Models\krkusahacek;
use App\Models\krkusahasurat;
use App\Models\rencanagsbblora;
use Illuminate\Support\Facades\Auth;

class KrkController extends Controller
{

    public function permohonankrk(Request $request)
    {
        // Kalau request-nya AJAX (dari dropdown Kecamatan)
        if ($request->ajax() && $request->has('kecamatan_id')) {
            $desa = kelurahandesa::where('kecamatanblora_id', $request->kecamatan_id)->get();
            return response()->json($desa);
        }

        // Kalau request biasa (GET halaman utama)
        $user = Auth::user();
        $datakrk = krk::all();
        $datakecamatan = kecamatanblora::all();
        $datakelurahan = kelurahandesa::all(); // Bisa kamu kosongkan kalau mau preload dinamis pakai JS

        return view('frontend.abgblora.06_permohonankrk.02_permohonankrkpemohon.00_index', [
            'user' => $user,
            'data' => $datakrk,
            'datakecamatan' => $datakecamatan,
            'datakelurahan' => $datakelurahan,
            'title' => 'Permohonan KRK Bangunan Gedung'
        ]);
    }

    public function permohonankrkusaha(Request $request)
    {
        // Kalau request-nya AJAX (dari dropdown Kecamatan)
        if ($request->ajax() && $request->has('kecamatan_id')) {
            $desa = kelurahandesa::where('kecamatanblora_id', $request->kecamatan_id)->get();
            return response()->json($desa);
        }

        // Kalau request biasa (GET halaman utama)
        $user = Auth::user();
        $datakrk = krkusaha::all();
        $datakecamatan = kecamatanblora::all();
        $datakelurahan = kelurahandesa::all(); // Bisa kamu kosongkan kalau mau preload dinamis pakai JS

        return view('frontend.abgblora.06_permohonankrk.02_permohonankrkpemohon.01_krkusahapercobaan', [
            'user' => $user,
            'data' => $datakrk,
            'datakecamatan' => $datakecamatan,
            'datakelurahan' => $datakelurahan,
            'title' => 'Permohonan KRK Bangunan Gedung'
        ]);
    }

    public function permohonankrkusahacreate(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'perorangan' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'nik' => 'required|digits:16|numeric',
            'koordinatlokasi' => 'required|string',
            'tanggalpermohonan' => 'required|date',
            'notelepon' => 'required|string|max:255',
            'luastanah' => 'required|numeric|max:1000000',
            'jumlahlantai' => 'required|string|max:10',
            'rt' => 'required|string|max:10',
            'rw' => 'required|string|max:10',
            'kabupaten' => 'required|string|max:255',
            'kecamatanblora_id' => 'required|string|max:255',
            'kelurahandesa_id' => 'required|string|max:255',
            'lokasibangunan' => 'required|string',
            'alamatpemohon' => 'required|string',

            // File validation
            'ktp' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:10048',
            'npwp' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:10048',
            'sertifikattanah' => 'nullable|file|mimes:pdf|max:10048',
            'lampiranoss' => 'nullable|file|mimes:pdf|max:10048',
            'buktipbb' => 'nullable|file|mimes:pdf|max:10048',
            'dokvalidasi' => 'nullable|file|mimes:pdf|max:10048',
            'siteplan' => 'nullable|file|mimes:pdf|max:10048',
            'tandatangan' => 'nullable|file|mimes:jpeg,png,jpg,pdf|max:10048',
            // 'tandatangan' => 'required|string',
        ], [
            // Custom error messages
            'perorangan.required' => 'Wajib diisi!',
            'perusahaan.required' => 'Wajib diisi!',
            'nik.required' => 'NIK 16 Digit Number!',
            'nik.digits' => 'NIK harus terdiri dari 16 digit!',
            'nik.numeric' => 'NIK hanya boleh angka!',
            'koordinatlokasi.required' => 'Koordinat lokasi wajib diisi!',
            'tanggalpermohonan.required' => 'Tanggal permohonan wajib diisi!',
            'luastanah.required' => 'Luas Tanah wajib diisi!',
            'notelepon.required' => 'Nomor telepon wajib diisi!',
            'jumlahlantai.required' => 'Jumlah Lantai wajib diisi!',
            'rt.required' => 'RT wajib diisi!',
            'rw.required' => 'RW wajib diisi!',
            'kabupaten.required' => 'Kabupaten wajib diisi!',
            'kecamatanblora_id.required' => 'Kecamatan wajib diisi!',
            'kelurahandesa_id.required' => 'Kelurahan/Desa wajib diisi!',
            'lokasibangunan.required' => 'Lokasi bangunan wajib diisi!',
            'ktp.required' => 'KTP Wajib di Upload!',
            'ktp.max' => 'Ukuran file Maksimal 10MB!',
            'ktp.mimes' => 'File Harus JPG/JPEG!',
            'npwp.required' => 'NPWP Wajib di Upload!',
            'npwp.max' => 'Ukuran file Maksimal 10MB!',
            'npwp.mimes' => 'File Harus JPG/JPEG!',
            'sertifikattanah.required' => 'Sertifikat Tanah Wajib di Upload!',
            'sertifikattanah.max' => 'Ukuran File Maksimal 10MB!',
            'sertifikattanah.mimes' => 'File Harus pdf!',
            'lampiranoss.required' => 'Lampiran OSS Wajib di Upload!',
            'lampiranoss.max' => 'Ukuran file Maksimal 10MB!',
            'lampiranoss.mimes' => 'File Harus pdf!',
            'buktipbb.required' => 'Bukti PBB Wajib di Upload!',
            'buktipbb.max' => 'Ukuran file Maksimal 10MB!',
            'buktipbb.mimes' => 'File Harus pdf!',
            'dokvalidasi.required' => 'Dokumen Wajib di Upload!',
            'dokvalidasi.max' => 'Ukuran file Maksimal 10MB!',
            'dokvalidasi.mimes' => 'File Harus pdf!',
            'siteplan.required' => 'Siteplan Wajib di Upload!',
            'siteplan.max' => 'Ukuran file Maksimal 10MB!',
            'siteplan.mimes' => 'File Harus pdf!',
            'tandatangan.required' => 'Tanda Tangan Belum di Upload!',
        ]);

        // Setup for file upload
        $filePaths = [];

        // Define the folder paths for each file field
        $fileFields = [
            'ktp' => '06_krk/01_krkusaha/01_ktp',
            'npwp' => '06_krk/01_krkusaha/02_npwp',
            'sertifikattanah' => '06_krk/01_krkusaha/03_sertifikattanah',
            'lampiranoss' => '06_krk/01_krkusaha/04_lampiranoss',
            'buktipbb' => '06_krk/01_krkusaha/05_buktipbb',
            'dokvalidasi' => '06_krk/01_krkusaha/06_dokvalidasi',
            'siteplan' => '06_krk/01_krkusaha/06_siteplan',
            'tandatangan' => '06_krk/01_krkusaha/07_tandatangan',
        ];

        // Loop through each file field and handle the upload
        foreach ($fileFields as $field => $folder) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
                $path = public_path($folder);
                // Create directory if it does not exist
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0775, true);
                }

                // Move the file to the correct folder
                $file->move($path, $filename);
                $filePaths[$field] = $folder . '/' . $filename;
            }
        }

        // Save all data to the database
        krkusaha::create([
            'perorangan' => $validatedData['perorangan'],
            'perusahaan' => $validatedData['perusahaan'],
            'nik' => $validatedData['nik'],
            'koordinatlokasi' => $validatedData['koordinatlokasi'],
            'tanggalpermohonan' => $validatedData['tanggalpermohonan'],
            'notelepon' => $validatedData['notelepon'],
            'luastanah' => $validatedData['luastanah'],
            'jumlahlantai' => $validatedData['jumlahlantai'],
            'rt' => $validatedData['rt'],
            'rw' => $validatedData['rw'],
            'kabupaten' => $validatedData['kabupaten'],
            'kecamatanblora_id' => $validatedData['kecamatanblora_id'],
            'kelurahandesa_id' => $validatedData['kelurahandesa_id'],
            'lokasibangunan' => $validatedData['lokasibangunan'],
            'ktp' => $filePaths['ktp'],
            'npwp' => $filePaths['npwp'],
            'sertifikattanah' => $filePaths['sertifikattanah'],
            'lampiranoss' => $filePaths['lampiranoss'],
            'buktipbb' => $filePaths['buktipbb'],
            'dokvalidasi' => $filePaths['dokvalidasi'],
            'siteplan' => $filePaths['siteplan'],
            'tandatangan' => $filePaths['tandatangan'],
        ]);

        session()->flash('create', 'Permohonan Anda Berhasil Dibuat!');
        return redirect('/dashboard');

    }


    // VALIDASI USAHA
    public function validateBerkasusaha($id)
{
    $data = krkusaha::findOrFail($id);

    if ($data->is_validated) {
        return back()->with('info', 'Berkas sudah di setujuai DPUPR Kab Blora.');
    }

    $data->update([
        'is_validated' => true,
        'validated_at' => now(),
        // 'validated_by' => auth()->id(), // asumsi user login
    ]);

    session()->flash('info', 'Berkas sudah di setujuai DPUPR Kab Blora!');
    return redirect('/bekrkusaha');


    // return redirect('/bekrkusaha')->with('success', 'Berkas berhasil divalidasi dan disetujui.');
}

public function validateBerkashunian($id)
{
    $data = krkhunian::findOrFail($id);

    if ($data->is_validated) {
        return back()->with('info', 'Berkas sudah disetujui DPUPR Kab Blora.');
    }

    $data->update([
        'is_validated' => true,
        'validated_at' => now(),
    ]);


    session()->flash('info', 'Berkas sudah disetujui DPUPR Kab Blora!');
    return redirect('/bekrkhunian');


    // return redirect('/bekrkhunian')->with('success', 'Berkas berhasil divalidasi dan disetujui.');
}


    // PERMOHONAN KRK HUNIAN
    public function permohonankrkhunian(Request $request)
    {
        // Kalau request-nya AJAX (dari dropdown Kecamatan)
        if ($request->ajax() && $request->has('kecamatan_id')) {
            $desa = kelurahandesa::where('kecamatanblora_id', $request->kecamatan_id)->get();
            return response()->json($desa);
        }

        // Kalau request biasa (GET halaman utama)
        $user = Auth::user();
        $datakrk = krkhunian::all();
        $datakecamatan = kecamatanblora::all();
        $datakelurahan = kelurahandesa::all(); // Bisa kamu kosongkan kalau mau preload dinamis pakai JS

        return view('frontend.abgblora.06_permohonankrk.02_permohonankrkpemohon.02_krkhunian', [
            'user' => $user,
            'data' => $datakrk,
            'datakecamatan' => $datakecamatan,
            'datakelurahan' => $datakelurahan,
            'title' => 'Permohonan KRK Bangunan Gedung'
        ]);
    }

    public function permohonankrkhuniancreate(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'perorangan' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'nik' => 'required|digits:16|numeric',
            'koordinatlokasi' => 'required|string',
            'tanggalpermohonan' => 'required|date',
            'notelepon' => 'required|string|max:255',
            'luastanah' => 'required|numeric|max:1000000',
            'jumlahlantai' => 'required|string|max:10',
            'rt' => 'required|string|max:10',
            'rw' => 'required|string|max:10',
            'kabupaten' => 'required|string|max:255',
            'kecamatanblora_id' => 'required|string|max:255',
            'kelurahandesa_id' => 'required|string|max:255',
            'lokasibangunan' => 'required|string',

            // File validation
            'ktp' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            // 'npwp' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            'sertifikattanah' => 'required|file|mimes:pdf|max:10240',
            // 'lampiranoss' => 'required|file|mimes:pdf|max:5120',
            'buktipbb' => 'required|file|mimes:pdf|max:5120',
            'dokvalidasi' => 'required|file|mimes:pdf|max:5120',
            // 'siteplan' => 'required|file|mimes:pdf|max:10240',
            'tandatangan' => 'required|file|mimes:jpeg,png,jpg,pdf|max:2048',
            // 'tandatangan' => 'required|string',
        ], [
            // Custom error messages
            'perorangan.required' => 'Wajib diisi!',
            'perusahaan.required' => 'Wajib diisi!',
            'nik.required' => 'NIK 16 Digit Number!',
            'nik.digits' => 'NIK harus terdiri dari 16 digit!',
            'nik.numeric' => 'NIK hanya boleh angka!',
            'koordinatlokasi.required' => 'Koordinat lokasi wajib diisi!',
            'tanggalpermohonan.required' => 'Tanggal permohonan wajib diisi!',
            'luastanah.required' => 'Luas Tanah wajib diisi!',
            'notelepon.required' => 'Nomor telepon wajib diisi!',
            'jumlahlantai.required' => 'Jumlah Lantai wajib diisi!',
            'rt.required' => 'RT wajib diisi!',
            'rw.required' => 'RW wajib diisi!',
            'kabupaten.required' => 'Kabupaten wajib diisi!',
            'kecamatanblora_id.required' => 'Kecamatan wajib diisi!',
            'kelurahandesa_id.required' => 'Kelurahan/Desa wajib diisi!',
            'lokasibangunan.required' => 'Lokasi bangunan wajib diisi!',
            'ktp.required' => 'KTP Wajib di Upload!',
            'ktp.max' => 'Ukuran file Maksimal 2MB!',
            'ktp.mimes' => 'File Harus JPG/JPEG!',
            // 'npwp.required' => 'NPWP Wajib di Upload!',
            // 'npwp.max' => 'Ukuran file Maksimal 2MB!',
            // 'npwp.mimes' => 'File Harus JPG/JPEG!',
            'sertifikattanah.required' => 'Sertifikat Tanah Wajib di Upload!',
            'sertifikattanah.max' => 'Ukuran File Maksimal 10MB!',
            'sertifikattanah.mimes' => 'File Harus pdf!',
            // 'lampiranoss.required' => 'Lampiran OSS Wajib di Upload!',
            // 'lampiranoss.max' => 'Ukuran file Maksimal 5MB!',
            // 'lampiranoss.mimes' => 'File Harus pdf!',
            'buktipbb.required' => 'Bukti PBB Wajib di Upload!',
            'buktipbb.max' => 'Ukuran file Maksimal 5MB!',
            'buktipbb.mimes' => 'File Harus pdf!',
            'dokvalidasi.required' => 'Dokumen Wajib di Upload!',
            'dokvalidasi.max' => 'Ukuran file Maksimal 5MB!',
            'dokvalidasi.mimes' => 'File Harus pdf!',
            // 'siteplan.required' => 'Siteplan Wajib di Upload!',
            // 'siteplan.max' => 'Ukuran file Maksimal 10MB!',
            // 'siteplan.mimes' => 'File Harus pdf!',
            'tandatangan.required' => 'Tanda Tangan Belum di Upload!',
        ]);

        // Setup for file upload
        $filePaths = [];

        // Define the folder paths for each file field
        $fileFields = [
            'ktp' => '06_krk/02_krkhunian/01_ktp',
            // 'npwp' => '06_krk/01_krkusaha/02_npwp',
            'sertifikattanah' => '06_krk/02_krkhunian/02_sertifikattanah',
            // 'lampiranoss' => '06_krk/01_krkusaha/04_lampiranoss',
            'buktipbb' => '06_krk/02_krkhunian/03_buktipbb',
            'dokvalidasi' => '06_krk/02_krkhunian/04_dokvalidasi',
            // 'siteplan' => '06_krk/01_krkusaha/06_siteplan',
            'tandatangan' => '06_krk/02_krkhunian/05_tandatangan',
        ];

        // Loop through each file field and handle the upload
        foreach ($fileFields as $field => $folder) {
            if ($request->hasFile($field)) {
                $file = $request->file($field);
                $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
                $path = public_path($folder);
                // Create directory if it does not exist
                if (!File::exists($path)) {
                    File::makeDirectory($path, 0775, true);
                }

                // Move the file to the correct folder
                $file->move($path, $filename);
                $filePaths[$field] = $folder . '/' . $filename;
            }
        }

        // Save all data to the database
        krkhunian::create([
            'perorangan' => $validatedData['perorangan'],
            'perusahaan' => $validatedData['perusahaan'],
            'nik' => $validatedData['nik'],
            'koordinatlokasi' => $validatedData['koordinatlokasi'],
            'tanggalpermohonan' => $validatedData['tanggalpermohonan'],
            'notelepon' => $validatedData['notelepon'],
            'luastanah' => $validatedData['luastanah'],
            'jumlahlantai' => $validatedData['jumlahlantai'],
            'rt' => $validatedData['rt'],
            'rw' => $validatedData['rw'],
            'kabupaten' => $validatedData['kabupaten'],
            'kecamatanblora_id' => $validatedData['kecamatanblora_id'],
            'kelurahandesa_id' => $validatedData['kelurahandesa_id'],
            'lokasibangunan' => $validatedData['lokasibangunan'],
            'ktp' => $filePaths['ktp'],
            // 'npwp' => $filePaths['npwp'],
            'sertifikattanah' => $filePaths['sertifikattanah'],
            // 'lampiranoss' => $filePaths['lampiranoss'],
            'buktipbb' => $filePaths['buktipbb'],
            'dokvalidasi' => $filePaths['dokvalidasi'],
            // 'siteplan' => $filePaths['siteplan'],
            'tandatangan' => $filePaths['tandatangan'],
        ]);

        session()->flash('create', 'Permohonan Anda Berhasil Dibuat!');
        return redirect('/web');

    }

public function bekrkindex()
{
    $user = Auth::user();
    $data = krkusaha::paginate(15); // Data paginasi
    $datajumlahkrkusaha = krkusaha::count(); // Hitung total semua data
    $datajumlahkrkhunian = krkhunian::count(); // Hitung total semua data

    return view('backend.06_krk.02_berkaspermohonan.index', [
        'title' => 'Permohonan KRK Bangunan Gedung',
        'data' => $data,
        'user' => $user,
        'datajumlahkrkusaha' => $datajumlahkrkusaha,
        'datajumlahkrkhunian' => $datajumlahkrkhunian,
    ]);
}

      public function bekrkusaha(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 15);

    // Query dasar
    $query = krkusaha::query();

    // Filter pencarian jika ada input 'search'
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('perorangan', 'like', "%{$search}%")
              ->orWhere('perusahaan', 'like', "%{$search}%")
              ->orWhere('nik', 'like', "%{$search}%")
              ->orWhere('koordinatlokasi', 'like', "%{$search}%")
              ->orWhere('notelepon', 'like', "%{$search}%")
              ->orWhere('luastanah', 'like', "%{$search}%")
              ->orWhere('jumlahlantai', 'like', "%{$search}%")
              ->orWhere('rt', 'like', "%{$search}%")
              ->orWhere('rw', 'like', "%{$search}%")
              ->orWhere('kabupaten', 'like', "%{$search}%")
              ->orWhere('lokasibangunan', 'like', "%{$search}%")
              ->orWhereDate('tanggalpermohonan', $search);

            $q->orWhereHas('kecamatanblora', function ($sub) use ($search) {
                $sub->where('kecamatanblora', 'like', "%{$search}%");
            });

            $q->orWhereHas('kelurahandesa', function ($sub) use ($search) {
                $sub->where('desa', 'like', "%{$search}%");
            });

            $q->orWhereHas('user', function ($sub) use ($search) {
                $sub->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        });
    }

    // Ambil data utama paginasi
    $berkasusaha = $query->latest()->paginate($perPage)->appends($request->all());

    // Ambil semua ID krkusaha yang muncul di hasil paginasi
    $krkusahaIds = $berkasusaha->pluck('id');

    // Ambil data sub dari relasi krkusahasurat
    $subdata = krkusahasurat::whereIn('krkusaha_id', $krkusahaIds)->get();

    return view('backend.06_krk.02_berkaspermohonan.usaha', [
        'title' => 'Permohonan KRK Fungsi Usaha Bangunan Gedung',
        'data' => $berkasusaha,
        'subdata' => $subdata,
        'user' => $user,
    ]);
}


// BERKAS PENGESAHAN FUNGSI USAHA BANGUNAN GEDUNG
public function permohonanpengesahanusaha($id)
{
    // Ambil data KRK Usaha berdasarkan ID atau gagal 404
    $datakrkusaha = krkusaha::findOrFail($id);

    // Ambil semua data GSB kabupaten dari rencanagsbblora tanpa scope/filter
$datagsbkabblora = rencanagsbblora::withoutGlobalScopes()
    ->orderByRaw("COALESCE(ruasjalan, '') ASC")
    ->get();


    // Ambil data user yang sedang login
    $user = Auth::user();

    // Kirimkan data ke view
    return view('backend.06_krk.01_pengesahanusaha.index', [
        'title' => 'Lembar Pengesahan Permohonan KRK Fungsi Usaha',
        'data' => $datakrkusaha,
        'datagsb' => $datagsbkabblora,
        'user' => $user,
    ]);
}


public function permohonanpengesahanusahacreate(Request $request, $id)
{
    $validated = $request->validate([
        'nomorregistrasi' => 'required|string|max:50',
        'tanggalpermohonan' => 'required|date',
        'kepadatan' => 'required|in:RENDAH,SEDANG,TINGGI',
        'luaslantaimaksimal' => 'required|string',
        'luasbangunan' => 'required|numeric|min:0',
        'fungsibangunan' => 'required|string|max:255',
        'lokasibangunan' => 'required|string|max:255',
        'rencanagsbblora_id' => 'required|integer',
        'jenisjalan' => 'required|string|max:50',
        'gsb' => 'required|numeric|min:0',
        'klb' => 'required|string|max:20',
        'kdh' => 'required|numeric|in:10,20,30',
        'jaringanutilitas' => 'required|string|max:255',
    ], [
        // Custom error messages
        'required' => 'Kolom :attribute wajib diisi.',
        'in' => 'Nilai :attribute tidak valid.',
        'numeric' => 'Kolom :attribute harus berupa angka.',
        'exists' => 'Ruas jalan tidak valid.',
        'max' => 'Kolom :attribute maksimal :max karakter.',
    ]);

    // Dapatkan data utama
    $mainData = krkusaha::findOrFail($id);

    // Simpan data pengesahan
    $pengesahan = new krkusahasurat();
    $pengesahan->krkusaha_id = $mainData->id;
    $pengesahan->fill($validated);
    $pengesahan->save();

    return redirect('/bekrkusaha')->with('pengesahankrk',
        'Surat Permohonan KRK berhasil disetujui!');
}


// ========================================================

public function bekrkhunian(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 15);

    // Query dasar
    $query = krkhunian::query();

    // Filter pencarian jika ada input 'search'
    if ($search) {
        $query->where(function ($q) use ($search) {
            $q->where('perorangan', 'like', "%{$search}%")
              ->orWhere('perusahaan', 'like', "%{$search}%")
              ->orWhere('nik', 'like', "%{$search}%")
              ->orWhere('koordinatlokasi', 'like', "%{$search}%")
              ->orWhere('notelepon', 'like', "%{$search}%")
              ->orWhere('luastanah', 'like', "%{$search}%")
              ->orWhere('jumlahlantai', 'like', "%{$search}%")
              ->orWhere('rt', 'like', "%{$search}%")
              ->orWhere('rw', 'like', "%{$search}%")
              ->orWhere('kabupaten', 'like', "%{$search}%")
              ->orWhere('lokasibangunan', 'like', "%{$search}%")
              ->orWhereDate('tanggalpermohonan', $search);

            $q->orWhereHas('kecamatanblora', function ($sub) use ($search) {
                $sub->where('kecamatanblora', 'like', "%{$search}%");
            });

            $q->orWhereHas('kelurahandesa', function ($sub) use ($search) {
                $sub->where('desa', 'like', "%{$search}%");
            });

            $q->orWhereHas('user', function ($sub) use ($search) {
                $sub->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%");
            });
        });
    }

    // Ambil data utama paginasi
    $berkasusaha = $query->latest()->paginate($perPage)->appends($request->all());

    // Ambil semua ID krkusaha yang muncul di hasil paginasi
    $krkusahaIds = $berkasusaha->pluck('id');

    // Ambil data sub dari relasi krkusahasurat
    $subdata = krkusahasurat::whereIn('krkhunian_id', $krkusahaIds)->get();

    return view('backend.06_krk.02_berkaspermohonan.hunian', [
        'title' => 'Permohonan KRK Fungsi Hunian Bangunan Gedung',
        'data' => $berkasusaha,
        'subdata' => $subdata,
        'user' => $user,
    ]);
}



        // ============================================
        // BACKEND PEMOHON KRK



        public function pemohonkrk(Request $request)
        {
            // // Kalau request-nya AJAX (dari dropdown Kecamatan)
            // if ($request->ajax() && $request->has('kecamatan_id')) {
            //     $desa = kelurahandesa::where('kecamatanblora_id', $request->kecamatan_id)->get();
            //     return response()->json($desa);
            // }

            // Kalau request biasa (GET halaman utama)
            $user = Auth::user();
            $datakrk = krkusaha::all(); //('user_id', Auth::id())->get();
            $datakecamatan = kecamatanblora::all();
            $datakelurahan = kelurahandesa::all(); // Bisa kamu kosongkan kalau mau preload dinamis pakai JS

            return view('backend.00_pemohon.06_krk.showsurat', [
                'user' => $user,
                'data' => $datakrk,
                'datakecamatan' => $datakecamatan,
                'datakelurahan' => $datakelurahan,
                'title' => 'Data Berkas Anda'
            ]);
        }

// show permohonan

        public function bekrkshowpermohonan($id)
{
    // Cari data berdasarkan ID
    $data = krkusaha::findOrFail($id);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Tampilkan ke view dengan key-value
    return view('backend.06_krk.01_pengesahanusaha.01_berkaspermohonankrkusaha', [
        'title' => 'Berkas Permohonan KRK Fungsi Usaha',
        'data' => $data,
        'user' => $user
    ]);
}

public function validasikrkusaha(Request $request, $id)
{
    // Validasi input wajib & opsional
    $request->validate([
        'verifikasiktp' => 'required|in:sesuai,tidak_sesuai',
        'verifikasinpwp' => 'required|in:sesuai,tidak_sesuai',
        'verifikasisert' => 'required|in:sesuai,tidak_sesuai',
        'verifikasioss' => 'required|in:sesuai,tidak_sesuai',
        'verifikasipbb' => 'required|in:sesuai,tidak_sesuai',
        'verifikasidokval' => 'required|in:sesuai,tidak_sesuai',
        'verifikasisiteplan' => 'required|in:sesuai,tidak_sesuai',
        'verifikasittd' => 'required|in:sesuai,tidak_sesuai',
        'catatanvalidasi' => 'nullable|string',
    ]);

    // Cari peserta berdasarkan ID
    $item = krkusaha::findOrFail($id);

    // Simpan data
    $item->update([
        'verifikasiktp' => $request->verifikasiktp,
        'verifikasinpwp' => $request->verifikasinpwp,
        'verifikasisert' => $request->verifikasisert,
        'verifikasioss' => $request->verifikasioss,
        'verifikasipbb' => $request->verifikasipbb,
        'verifikasidokval' => $request->verifikasidokval,
        'verifikasisiteplan' => $request->verifikasisiteplan,
        'verifikasittd' => $request->verifikasittd,
        'catatanvalidasi' => $request->catatanvalidasi,
    ]);

    // Flash message
    session()->flash('update', 'Data Verifikasi KRK Usaha Berhasil !');

    // Redirect ke route bernama bebantuanteknis.show
    return redirect()->route('bekrkshowpermohonan.show', ['id' => $id]);
}



  public function valberkasusaha1(Request $request, $id)
    {
        $data = krkusaha::findOrFail($id);

        $request->validate([
            'verifikasi1' => 'required|in:lolos,dikembalikan',
        ]);

        $data->verifikasi1 = $request->verifikasi1;
        $data->save();

     if ($request->verifikasi1 === 'lolos') {
        session()->flash('create', '✅ Berkas Lolos Verifikasi !');
    } else {
        session()->flash('gagal', '❌ Berkas Di Kembalikan Ke Pemohon !');
    }
           return redirect('/bekrkusaha');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }

public function doklapkrkusaha($id)
{
    $databantuanteknis = krkusaha::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = krkusahacek::where('krkusaha_id', $databantuanteknis->id)->paginate(50);

    return view('backend.06_krk.01_pengesahanusaha.02_ceklapkrkusaha', [
        'title' => 'Dokumentasi Cek Lapangan KRK Fungsi Usaha',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}



public function doklapkrkusahacreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = krkusaha::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.06_krk.01_pengesahanusaha.03_createkrkusaha', [
        'title' => 'Form Dokumentasi Cek Lapangan KRK Fungsi Usaha ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function doklapkrkusahacreatenew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'krkusaha_id' => 'required|string',
        'kegiatan' => 'required|string',
        'tanggalkegiatan' => 'required|date',
        'foto1' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        'foto2' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        'foto3' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        'foto4' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        'foto5' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        'foto6' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10048',
        'berkas1' => 'nullable|file|mimes:pdf|max:10048',
        'berkas2' => 'nullable|file|mimes:pdf|max:10048',
    ], [
        'krkusaha_id.required' => 'krkusaha_id wajib diisi.',
        'kegiatan.required' => 'Nama Kegiatan wajib diisi.',
        'tanggalkegiatan.required' => 'Tanggal kegiatan wajib diisi.',
        'foto1.required' => 'Foto Dokumentasi 1 wajib diunggah.',
        'foto1.image' => 'Foto Dokumentasi 1 harus berupa file gambar.',
        'foto1.mimes' => 'Foto Dokumentasi 1 harus berformat jpeg, png, jpg, gif, atau svg.',
        'foto1.max' => 'Ukuran foto Dokumentasi 1 maksimal 7MB.',
        'foto2.image' => 'Foto Dokumentasi 2 harus berupa file gambar.',
        'foto2.mimes' => 'Format gambar tidak sesuai.',
        'foto3.image' => 'Foto Dokumentasi 3 harus berupa file gambar.',
        'foto4.image' => 'Foto Dokumentasi 4 harus berupa file gambar.',
        'foto5.image' => 'Foto Dokumentasi 5 harus berupa file gambar.',
        'foto6.image' => 'Foto Dokumentasi 6 harus berupa file gambar.',
        'berkas1.mimes' => 'Berkas 1 harus berupa file PDF.',
        'berkas2.mimes' => 'Berkas 2 harus berupa file PDF.',
    ]);

    // Simpan ke model krkusahacek
    $data = new krkusahacek();
    $data->krkusaha_id = $validated['krkusaha_id'];
    $data->kegiatan = $validated['kegiatan'];
    $data->tanggalkegiatan = $validated['tanggalkegiatan'];

    // Helper untuk upload file
    function simpanFile($request, $field, $folder)
    {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $filename = time() . "_{$field}." . $file->getClientOriginalExtension();
            $file->move(public_path($folder), $filename);
            return $folder . '/' . $filename;
        }
        return null;
    }

    // Upload berkas1 & berkas2
    $data->berkas1 = simpanFile($request, 'berkas1', '06_krkusaha/00_berkas1');
    $data->berkas2 = simpanFile($request, 'berkas2', '06_krkusaha/00_berkas2');

    // Upload foto1 - foto6
    $data->foto1 = simpanFile($request, 'foto1', '06_krkusaha/01_ceklapangan');
    $data->foto2 = simpanFile($request, 'foto2', '06_krkusaha/02_ceklapangan');
    $data->foto3 = simpanFile($request, 'foto3', '06_krkusaha/03_ceklapangan');
    $data->foto4 = simpanFile($request, 'foto4', '06_krkusaha/04_ceklapangan');
    $data->foto5 = simpanFile($request, 'foto5', '06_krkusaha/05_ceklapangan');
    $data->foto6 = simpanFile($request, 'foto6', '06_krkusaha/06_ceklapangan');

    $data->save();

    session()->flash('create', 'Dok Cek Lapangan KRK Usaha berhasil dibuat!');

    $id = $validated['krkusaha_id'];

    return redirect()->route('doklapkrkusaha.show', ['id' => $id]);
}

public function doklapkrkusahacreatedelete($id)
{
    // Cari entri berdasarkan ID
    $entry = krkusahacek::where('id', $id)->first();

    if ($entry) {
        // Simpan dulu lapangan_id sebelum entri dihapus
        $lapanganId = $entry->krkusaha_id;

        // Hapus file jika ada (aktifkan jika memang simpan file)
        // if (Storage::disk('public')->exists($entry->header)) {
        //     Storage::disk('public')->delete($entry->header);
        // }

        // Hapus data dari database
        $entry->delete();

        // Redirect ke halaman detail lapangan terkait
        return redirect()->route('doklapkrkusaha.show', ['id' => $lapanganId])
                         ->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}


  public function valberkasusaha2(Request $request, $id)
    {
        $data = krkusaha::findOrFail($id);

        $request->validate([
            'verifikasi2' => 'required|in:sudah,belum',
        ]);

        $data->verifikasi2 = $request->verifikasi2;
        $data->save();

     if ($request->verifikasi2 === 'sudah') {
        session()->flash('create', '✅ Cek Lapangan Selesai !');
    } else {
        session()->flash('gagal', '❌ Cek Lapangan Di Hentikan !');
    }
           return redirect('/bekrkusaha');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


public function permohonanpengesahanusahaber($id)
{
    // Ambil data utama krkusaha berdasarkan ID
    $datausaha = krkusaha::where('id', $id)->first();

    // Kalau data usaha tidak ditemukan, tampilkan 404
    if (!$datausaha) {
        return abort(404, 'Data usaha tidak ditemukan');
    }

    // Ambil data sub: krkusahasurat (relasi dari krkusaha)
    $datasurat = krkusahasurat::where('krkusaha_id', $datausaha->id)->paginate(50);

    // Ambil data GSB Kabupaten Blora
    $datagsb = rencanagsbblora::orderBy('ruasjalan', 'asc')->get();

    // Return ke view
    return view('backend.06_krk.01_pengesahanusaha.04_berkaskrk', [
        'title' => 'Lembar Pengesahan Permohonan KRK Fungsi Usaha',
        'data' => $datausaha,       // Data utama krkusaha
        'subdata' => $datasurat,    // Data sub krkusahasurat
        'datagsb' => $datagsb,      // Data dropdown/GSB
        'user' => Auth::user()
    ]);
}

public function destroykrkusahasurat($id)
{
    // Cari data berdasarkan ID
    $data = krkusahasurat::find($id);

    if ($data) {
        $data->delete();
        // Redirect dengan flash message sukses
        return redirect()->route('krkusaha.index')->with('delete', 'Data berhasil dihapus.');
    } else {
        // Redirect dengan flash message error
        return redirect()->route('krkusaha.index')->with('error', 'Data tidak ditemukan.');
    }
}

public function valberkasusaha3(Request $request, $id)
    {
        $data = krkusaha::findOrFail($id);

        $request->validate([
            'verifikasi3' => 'required|in:sudah,belum',
        ]);

        $data->verifikasi3 = $request->verifikasi3;
        $data->save();

     if ($request->verifikasi3 === 'sudah') {
        session()->flash('create', '✅ Olah Data Selesai !');
    } else {
        session()->flash('gagal', '❌ Olah data dihentikan !');
    }
           return redirect('/bekrkusaha');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


    public function valberkasusaha4(Request $request, $id)
    {
        $data = krkusaha::findOrFail($id);

        $request->validate([
            'verifikasi4' => 'required|in:sudah,belum',
        ]);

        $data->verifikasi4 = $request->verifikasi4;
        $data->save();

     if ($request->verifikasi4 === 'sudah') {
        session()->flash('create', '✅ Proses Selesai !');
    } else {
        session()->flash('gagal', '❌ Dihentikan !');
    }
           return redirect('/bekrkusaha');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }



    public function permohonankrkusahafinal($id)
{
    // Ambil data utama krkusaha berdasarkan ID
    $datausaha = krkusaha::where('id', $id)->first();

    // Kalau data usaha tidak ditemukan, tampilkan 404
    if (!$datausaha) {
        return abort(404, 'Data usaha tidak ditemukan');
    }

    // Ambil data sub: krkusahasurat (relasi dari krkusaha)
    $datasurat = krkusahasurat::where('krkusaha_id', $datausaha->id)->paginate(50);

    // Ambil data GSB Kabupaten Blora
    $datagsb = rencanagsbblora::orderBy('ruasjalan', 'asc')->get();

    // Return ke view
    return view('backend.06_krk.01_pengesahanusaha.05_berkaskrkfinal', [
        'title' => 'Berkas Final Permohonan KRK Fungsi Usaha',
        'data' => $datausaha,       // Data utama krkusaha
        'subdata' => $datasurat,    // Data sub krkusahasurat
        'datagsb' => $datagsb,      // Data dropdown/GSB
        'user' => Auth::user()
    ]);
}

public function krkusahanoterbit($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = krkusaha::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.06_krk.01_pengesahanusaha.06_createnosurat', [
        'title' => 'Terbitkan Nomor Dinas KRK Fungsi Usaha ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function krkusahanoterbitnew(Request $request, $id)
{
    // Validasi input
    $request->validate([
    'nomordinasasal' => 'required|string|max:255',
], [
    'nomordinasasal.required' => 'Nomor Dinas Asal wajib diisi.',
    'nomordinasasal.string'   => 'Nomor Dinas Asal harus berupa teks.',
    'nomordinasasal.max'      => 'Nomor Dinas Asal tidak boleh lebih dari 255 karakter.',
]);

    // Ambil data krkusaha berdasarkan ID
    $krkUsaha = krkusaha::findOrFail($id);

    // Update data
    $krkUsaha->nomordinasasal = $request->nomordinasasal;
    $krkUsaha->save();

    // Redirect ke halaman final dengan membawa ID krkusaha
    session()->flash('create', 'Permohonan Anda Berhasil Dibuat!');
    return redirect()->route('permohonan.permohonankrkusahafinal', ['id' => $krkUsaha->id]);
}

// -=---------------------------------------------------------

        public function bekrkhunianpermohonan($id)
{
    // Cari data berdasarkan ID
    $data = krkhunian::findOrFail($id);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Tampilkan ke view dengan key-value
    return view('backend.06_krk.02_berkasfungsihunian.01_berkaspermohonanhunian', [
        'title' => 'Berkas Permohonan KRK Fungsi Hunian Bangunan Gedung',
        'data' => $data,
        'user' => $user
    ]);
}


public function validasikrkhunian(Request $request, $id)
{
    // Validasi input wajib & opsional
    $request->validate([
        'verifikasiktp' => 'required|in:sesuai,tidak_sesuai',
        // 'verifikasinpwp' => 'required|in:sesuai,tidak_sesuai',
        'verifikasisert' => 'required|in:sesuai,tidak_sesuai',
        // 'verifikasioss' => 'required|in:sesuai,tidak_sesuai',
        'verifikasipbb' => 'required|in:sesuai,tidak_sesuai',
        'verifikasidokval' => 'required|in:sesuai,tidak_sesuai',
        // 'verifikasisiteplan' => 'required|in:sesuai,tidak_sesuai',
        'verifikasittd' => 'required|in:sesuai,tidak_sesuai',
        'catatanvalidasi' => 'nullable|string',
    ]);

    // Cari peserta berdasarkan ID
    $item = krkhunian::findOrFail($id);

    // Simpan data
    $item->update([
        'verifikasiktp' => $request->verifikasiktp,
        // 'verifikasinpwp' => $request->verifikasinpwp,
        'verifikasisert' => $request->verifikasisert,
        // 'verifikasioss' => $request->verifikasioss,
        'verifikasipbb' => $request->verifikasipbb,
        'verifikasidokval' => $request->verifikasidokval,
        // 'verifikasisiteplan' => $request->verifikasisiteplan,
        'verifikasittd' => $request->verifikasittd,
        'catatanvalidasi' => $request->catatanvalidasi,
    ]);

    // Flash message
    session()->flash('update', 'Data Verifikasi KRK Hunian Berhasil !');

    // Redirect ke route bernama bebantuanteknis.show
    return redirect()->route('bekrkhunianpermohonan.show', ['id' => $id]);
}


public function valberkashunian1(Request $request, $id)
    {
        $data = krkhunian::findOrFail($id);

        $request->validate([
            'verifikasi1' => 'required|in:lolos,dikembalikan',
        ]);

        $data->verifikasi1 = $request->verifikasi1;
        $data->save();

     if ($request->verifikasi1 === 'lolos') {
        session()->flash('create', '✅ Berkas Lolos Verifikasi !');
    } else {
        session()->flash('gagal', '❌ Berkas Di Kembalikan Ke Pemohon !');
    }
           return redirect('/bekrkhunian');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


}

