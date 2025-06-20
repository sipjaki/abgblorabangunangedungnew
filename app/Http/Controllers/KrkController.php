<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;  // Tambahkan ini untuk mengimpor kelas Str
use Illuminate\Support\Facades\File;
use App\Models\kecamatanblora;
use App\Models\kelurahandesa;
use Illuminate\Http\Request;

use App\Models\krk;
use App\Models\krkhunian;
use App\Models\krkhuniancek;
use App\Models\krkkeagamaan;
use App\Models\krkkeagamaancek;
use App\Models\krksosbud;
use App\Models\krksosbudcek;
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
    $datajumlahkrkkeagamaan = krkkeagamaan::count(); // Hitung total semua data
    $datajumlahkrksosbud = krksosbud::count(); // Hitung total semua data

      $datajumlahkrkusaha_dikembalikan = krkusaha::where('verifikasi1', 'dikembalikan')->count();
      $datajumlahkrkhunian_dikembalikan = krkhunian::where('verifikasi1', 'dikembalikan')->count();
      $datajumlahkrkagama_dikembalikan = krkkeagamaan::where('verifikasi1', 'dikembalikan')->count();
      $datajumlahkrksosbud_dikembalikan = krksosbud::where('verifikasi1', 'dikembalikan')->count();

$datajumlahkrkusaha_lapangan = krkusaha::where('verifikasi2', 'sudah')->count();
$datajumlahkrkhunian_lapangan = krkhunian::where('verifikasi2', 'sudah')->count();
$datajumlahkrkagama_lapangan = krkkeagamaan::where('verifikasi2', 'sudah')->count();
$datajumlahkrksosbud_lapangan = krksosbud::where('verifikasi2', 'sudah')->count();

$datajumlahkrkusaha_terbit = krkusaha::where('verifikasi4', 'sudah')->count();
$datajumlahkrkhunian_terbit = krkhunian::where('verifikasi4', 'sudah')->count();
$datajumlahkrkagama_terbit = krkkeagamaan::where('verifikasi4', 'sudah')->count();
$datajumlahkrksosbud_terbit = krksosbud::where('verifikasi4', 'sudah')->count();

    return view('backend.06_krk.02_berkaspermohonan.index', [
        'title' => 'Permohonan KRK Bangunan Gedung',
        'data' => $data,
        'user' => $user,
        'datajumlahkrkusaha' => $datajumlahkrkusaha,
        'datajumlahkrkhunian' => $datajumlahkrkhunian,
        'datajumlahkrkkeagamaan' => $datajumlahkrkkeagamaan,
        'datajumlahkrksosbud' => $datajumlahkrksosbud,

        'datajumlahkrkusaha_dikembalikan' => $datajumlahkrkusaha_dikembalikan,
        'datajumlahkrkhunian_dikembalikan' => $datajumlahkrkhunian_dikembalikan,
        'datajumlahkrkagama_dikembalikan' => $datajumlahkrkagama_dikembalikan,
        'datajumlahkrksosbud_dikembalikan' => $datajumlahkrksosbud_dikembalikan,

        'datajumlahkrkusaha_lapangan' => $datajumlahkrkusaha_lapangan,
        'datajumlahkrkhunian_lapangan' => $datajumlahkrkhunian_lapangan,
        'datajumlahkrkagama_lapangan' => $datajumlahkrkagama_lapangan,
        'datajumlahkrksosbud_lapangan' => $datajumlahkrksosbud_lapangan,

        'datajumlahkrkusaha_terbit' => $datajumlahkrkusaha_terbit,
        'datajumlahkrkhunian_terbit' => $datajumlahkrkhunian_terbit,
        'datajumlahkrkagama_terbit' => $datajumlahkrkagama_terbit,
        'datajumlahkrksosbud_terbit' => $datajumlahkrksosbud_terbit,

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



        // public function pemohonkrk(Request $request)
        // {
        //     // // Kalau request-nya AJAX (dari dropdown Kecamatan)
        //     // if ($request->ajax() && $request->has('kecamatan_id')) {
        //     //     $desa = kelurahandesa::where('kecamatanblora_id', $request->kecamatan_id)->get();
        //     //     return response()->json($desa);
        //     // }

        //     // Kalau request biasa (GET halaman utama)
        //     $user = Auth::user();
        //     $datakrk = krkusaha::all(); //('user_id', Auth::id())->get();
        //     $datakecamatan = kecamatanblora::all();
        //     $datakelurahan = kelurahandesa::all(); // Bisa kamu kosongkan kalau mau preload dinamis pakai JS

        //     return view('backend.00_pemohon.06_krk.01_fungsiusaha.01_fungsiusahapemohon', [
        //         'user' => $user,
        //         'data' => $datakrk,
        //         'datakecamatan' => $datakecamatan,
        //         'datakelurahan' => $datakelurahan,
        //         'title' => 'Data Berkas Anda'
        //     ]);
        // }

        public function pemohonkrk()
{
    $user = Auth::user();
    $userId = $user->id;

    $data = krkusaha::where('user_id', $userId)->paginate(15); // Data paginasi hanya milik user login

    // Total data berdasarkan user login
    $datajumlahkrkusaha = krkusaha::where('user_id', $userId)->count();
    $datajumlahkrkhunian = krkhunian::where('user_id', $userId)->count();
    $datajumlahkrkkeagamaan = krkkeagamaan::where('user_id', $userId)->count();
    $datajumlahkrksosbud = krksosbud::where('user_id', $userId)->count();

    // Data 'dikembalikan' berdasarkan user login
    $datajumlahkrkusaha_dikembalikan = krkusaha::where('user_id', $userId)->where('verifikasi1', 'dikembalikan')->count();
    $datajumlahkrkhunian_dikembalikan = krkhunian::where('user_id', $userId)->where('verifikasi1', 'dikembalikan')->count();
    $datajumlahkrkagama_dikembalikan = krkkeagamaan::where('user_id', $userId)->where('verifikasi1', 'dikembalikan')->count();
    $datajumlahkrksosbud_dikembalikan = krksosbud::where('user_id', $userId)->where('verifikasi1', 'dikembalikan')->count();

    // Data 'verifikasi lapangan' berdasarkan user login
    $datajumlahkrkusaha_lapangan = krkusaha::where('user_id', $userId)->where('verifikasi2', 'sudah')->count();
    $datajumlahkrkhunian_lapangan = krkhunian::where('user_id', $userId)->where('verifikasi2', 'sudah')->count();
    $datajumlahkrkagama_lapangan = krkkeagamaan::where('user_id', $userId)->where('verifikasi2', 'sudah')->count();
    $datajumlahkrksosbud_lapangan = krksosbud::where('user_id', $userId)->where('verifikasi2', 'sudah')->count();

    // Data 'terbit' berdasarkan user login
    $datajumlahkrkusaha_terbit = krkusaha::where('user_id', $userId)->where('verifikasi4', 'sudah')->count();
    $datajumlahkrkhunian_terbit = krkhunian::where('user_id', $userId)->where('verifikasi4', 'sudah')->count();
    $datajumlahkrkagama_terbit = krkkeagamaan::where('user_id', $userId)->where('verifikasi4', 'sudah')->count();
    $datajumlahkrksosbud_terbit = krksosbud::where('user_id', $userId)->where('verifikasi4', 'sudah')->count();

    return view('backend.00_pemohon.06_krk.01_fungsiusaha.01_fungsiusahapemohon', [
        'title' => 'Permohonan Keterangan Rencana Kota (KRK) Bangunan Gedung',
        'data' => $data,
        'user' => $user,

        'datajumlahkrkusaha' => $datajumlahkrkusaha,
        'datajumlahkrkhunian' => $datajumlahkrkhunian,
        'datajumlahkrkkeagamaan' => $datajumlahkrkkeagamaan,
        'datajumlahkrksosbud' => $datajumlahkrksosbud,

        'datajumlahkrkusaha_dikembalikan' => $datajumlahkrkusaha_dikembalikan,
        'datajumlahkrkhunian_dikembalikan' => $datajumlahkrkhunian_dikembalikan,
        'datajumlahkrkagama_dikembalikan' => $datajumlahkrkagama_dikembalikan,
        'datajumlahkrksosbud_dikembalikan' => $datajumlahkrksosbud_dikembalikan,

        'datajumlahkrkusaha_lapangan' => $datajumlahkrkusaha_lapangan,
        'datajumlahkrkhunian_lapangan' => $datajumlahkrkhunian_lapangan,
        'datajumlahkrkagama_lapangan' => $datajumlahkrkagama_lapangan,
        'datajumlahkrksosbud_lapangan' => $datajumlahkrksosbud_lapangan,

        'datajumlahkrkusaha_terbit' => $datajumlahkrkusaha_terbit,
        'datajumlahkrkhunian_terbit' => $datajumlahkrkhunian_terbit,
        'datajumlahkrkagama_terbit' => $datajumlahkrkagama_terbit,
        'datajumlahkrksosbud_terbit' => $datajumlahkrksosbud_terbit,
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

    public function doklapkrkhunian($id)
{
    $databantuanteknis = krkhunian::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = krkhuniancek::where('krkhunian_id', $databantuanteknis->id)->paginate(50);

    return view('backend.06_krk.02_berkasfungsihunian.02_ceklapkrkhunian', [
        'title' => 'Dokumentasi Cek Lapangan KRK Fungsi Hunian Bangunan Gedung',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}



public function doklapkrkhuniancreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = krkhunian::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.06_krk.02_berkasfungsihunian.03_createkrkhunian', [
        'title' => 'Form Dokumentasi Cek Lapangan KRK Fungsi Hunian Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function doklapkrkhuniancreatenew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'krkhunian_id' => 'required|string',
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
        'krkhunian_id.required' => 'KRK Hunian wajib diisi.',
        'kegiatan.required' => 'Nama Kegiatan wajib diisi.',
        'tanggalkegiatan.required' => 'Tanggal kegiatan wajib diisi.',
        'foto1.required' => 'Foto Dokumentasi 1 wajib diunggah.',
        'foto1.image' => 'Foto Dokumentasi 1 harus berupa file gambar.',
        'foto1.mimes' => 'Foto Dokumentasi 1 harus berformat jpeg, png, jpg, gif, atau svg.',
        'foto1.max' => 'Ukuran foto Dokumentasi 1 maksimal 10MB.',
        'foto2.image' => 'Foto Dokumentasi 2 harus berupa file gambar.',
        'foto2.mimes' => 'Format gambar tidak sesuai.',
        'foto3.image' => 'Foto Dokumentasi 3 harus berupa file gambar.',
        'foto4.image' => 'Foto Dokumentasi 4 harus berupa file gambar.',
        'foto5.image' => 'Foto Dokumentasi 5 harus berupa file gambar.',
        'foto6.image' => 'Foto Dokumentasi 6 harus berupa file gambar.',
        'berkas1.mimes' => 'Berkas 1 harus berupa file PDF.',
        'berkas2.mimes' => 'Berkas 2 harus berupa file PDF.',
    ]);

    // Simpan ke model krkhuniancek
    $data = new krkhuniancek();
    $data->krkhunian_id = $validated['krkhunian_id'];
    $data->kegiatan = $validated['kegiatan'];
    $data->tanggalkegiatan = $validated['tanggalkegiatan'];

    // Helper upload file
    function simpanFilehunian($request, $field, $folder)
    {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $filename = time() . "_{$field}." . $file->getClientOriginalExtension();
            $file->move(public_path($folder), $filename);
            return $folder . '/' . $filename;
        }
        return null;
    }

    // Upload ke folder 06_krkhunian sesuai permintaan
    $data->berkas1 = simpanFilehunian($request, 'berkas1', '06_krkhunian/00_berkas1');
    $data->berkas2 = simpanFilehunian($request, 'berkas2', '06_krkhunian/00_berkas2');

    $data->foto1 = simpanFilehunian($request, 'foto1', '06_krkhunian/01_ceklapangan');
    $data->foto2 = simpanFilehunian($request, 'foto2', '06_krkhunian/02_ceklapangan');
    $data->foto3 = simpanFilehunian($request, 'foto3', '06_krkhunian/03_ceklapangan');
    $data->foto4 = simpanFilehunian($request, 'foto4', '06_krkhunian/04_ceklapangan');
    $data->foto5 = simpanFilehunian($request, 'foto5', '06_krkhunian/05_ceklapangan');
    $data->foto6 = simpanFilehunian($request, 'foto6', '06_krkhunian/06_ceklapangan');

    $data->save();

    session()->flash('create', 'Dok Cek Lapangan KRK Hunian berhasil dibuat!');

    return redirect()->route('doklapkrkhunian.show', ['id' => $validated['krkhunian_id']]);
}

public function doklapkrkhuniancreatedelete($id)
{
    // Cari entri berdasarkan ID
    $entry = krkhuniancek::where('id', $id)->first();

    if ($entry) {
        // Simpan dulu lapangan_id sebelum entri dihapus
        $lapanganId = $entry->krkhunian_id;

        // Hapus file jika ada (aktifkan jika memang simpan file)
        // if (Storage::disk('public')->exists($entry->header)) {
        //     Storage::disk('public')->delete($entry->header);
        // }

        // Hapus data dari database
        $entry->delete();

        // Redirect ke halaman detail lapangan terkait
        return redirect()->route('doklapkrkhunian.show', ['id' => $lapanganId])
                         ->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}

public function valberkashunian2(Request $request, $id)
    {
        $data = krkhunian::findOrFail($id);

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
           return redirect('/bekrkhunian');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


    public function berkashunianval($id)
{
    $data = krkhunian::findOrFail($id);

    if ($data->is_validated) {
        return back()->with('info', 'Berkas sudah di setujuai DPUPR Kab Blora.');
    }

    $data->update([
        'is_validated' => true,
        'validated_at' => now(),
        // 'validated_by' => auth()->id(), // asumsi user login
    ]);

    session()->flash('info', 'Berkas sudah di setujuai DPUPR Kab Blora!');
    return redirect('/bekrkhunian');


    // return redirect('/bekrkusaha')->with('success', 'Berkas berhasil divalidasi dan disetujui.');
}


public function perpengesahanhunian($id)
{
    // Ambil data KRK Usaha berdasarkan ID atau gagal 404
    $datakrkusaha = krkhunian::findOrFail($id);

    // Ambil semua data GSB kabupaten dari rencanagsbblora tanpa scope/filter
$datagsbkabblora = rencanagsbblora::withoutGlobalScopes()
    ->orderByRaw("COALESCE(ruasjalan, '') ASC")
    ->get();


    // Ambil data user yang sedang login
    $user = Auth::user();

    // Kirimkan data ke view
    return view('backend.06_krk.02_berkasfungsihunian.04_berkaskrkhuniansurat', [
        'title' => 'Lembar Pengesahan Permohonan KRK Fungsi Hunian',
        'data' => $datakrkusaha,
        'datagsb' => $datagsbkabblora,
        'user' => $user,
    ]);
}


public function perpengesahanhuniancreate(Request $request, $id)
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
    $mainData = krkhunian::findOrFail($id);

    // Simpan data pengesahan
    $pengesahan = new krkusahasurat();
    $pengesahan->krkhunian_id = $mainData->id;
    $pengesahan->fill($validated);
    $pengesahan->save();

    return redirect('/bekrkhunian')->with('pengesahankrk',
        'Surat Permohonan KRK berhasil disetujui!');
}


public function perpengesahanhunianber($id)
{
    // Ambil data utama krkusaha berdasarkan ID
    $datausaha = krkhunian::where('id', $id)->first();

    // Kalau data usaha tidak ditemukan, tampilkan 404
    if (!$datausaha) {
        return abort(404, 'Data usaha tidak ditemukan');
    }

    // Ambil data sub: krkusahasurat (relasi dari krkusaha)
    $datasurat = krkusahasurat::where('krkhunian_id', $datausaha->id)->paginate(50);

    // Ambil data GSB Kabupaten Blora
    $datagsb = rencanagsbblora::orderBy('ruasjalan', 'asc')->get();

    // Return ke view
    return view('backend.06_krk.02_berkasfungsihunian.05_berkaskrkhunian', [
        'title' => 'Lembar Pengesahan Permohonan KRK Fungsi Hunian',
        'data' => $datausaha,       // Data utama krkusaha
        'subdata' => $datasurat,    // Data sub krkusahasurat
        'datagsb' => $datagsb,      // Data dropdown/GSB
        'user' => Auth::user()
    ]);
}

public function krkhuniansuratdelete($id)
{
    // Cari data berdasarkan ID
    $data = krkusahasurat::find($id);

    if ($data) {
        $data->delete();
        // Redirect dengan flash message sukses
        return redirect()->route('bekrkhunianindex')->with('delete', 'Data berhasil dihapus.');
    } else {
        // Redirect dengan flash message error
        return redirect()->route('bekrkhunianindex')->with('error', 'Data tidak ditemukan.');
    }
}



public function valberkashunian3(Request $request, $id)
    {
        $data = krkhunian::findOrFail($id);

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
           return redirect('/bekrkhunian');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }

    public function permohonankrkhunianfinal($id)
{
    // Ambil data utama krkusaha berdasarkan ID
    $datausaha = krkhunian::where('id', $id)->first();

    // Kalau data usaha tidak ditemukan, tampilkan 404
    if (!$datausaha) {
        return abort(404, 'Data usaha tidak ditemukan');
    }

    // Ambil data sub: krkusahasurat (relasi dari krkusaha)
    $datasurat = krkusahasurat::where('krkhunian_id', $datausaha->id)->paginate(50);

    // Ambil data GSB Kabupaten Blora
    $datagsb = rencanagsbblora::orderBy('ruasjalan', 'asc')->get();

    // Return ke view
    return view('backend.06_krk.02_berkasfungsihunian.06_berkaskrkfinalhunian', [
        'title' => 'Berkas Final Permohonan KRK Fungsi Hunian',
        'data' => $datausaha,       // Data utama krkusaha
        'subdata' => $datasurat,    // Data sub krkusahasurat
        'datagsb' => $datagsb,      // Data dropdown/GSB
        'user' => Auth::user()
    ]);
}


public function krkhuniannoterbit($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = krkhunian::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.06_krk.02_berkasfungsihunian.07_createnosurathunian', [
        'title' => 'Terbitkan Nomor Dinas KRK Fungsi Hunian ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function krkhuniannoterbitnew(Request $request, $id)
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
    $krkUsaha = krkhunian::findOrFail($id);

    // Update data
    $krkUsaha->nomordinasasal = $request->nomordinasasal;
    $krkUsaha->save();

    // Redirect ke halaman final dengan membawa ID krkusaha
    session()->flash('create', 'Permohonan Anda Berhasil Dibuat!');
    return redirect()->route('permohonan.permohonankrkhunianfinal', ['id' => $krkUsaha->id]);
}


    public function valberkashunian4(Request $request, $id)
    {
        $data = krkhunian::findOrFail($id);

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
           return redirect('/bekrkhunian');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


    // ========================================================

public function bekrkkeagamaan(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 15);

    // Query dasar
    $query = krkkeagamaan::query();

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
    $subdata = krkusahasurat::whereIn('krkkeagamaan_id', $krkusahaIds)->get();

    return view('backend.06_krk.02_berkaspermohonan.keagamaan', [
        'title' => 'Permohonan KRK Fungsi Keagamaan Bangunan Gedung',
        'data' => $berkasusaha,
        'subdata' => $subdata,
        'user' => $user,
    ]);
}



// -=---------------------------------------------------------

        public function bekrkkeagamaanpermohonan($id)
{
    // Cari data berdasarkan ID
    $data = krkkeagamaan::findOrFail($id);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Tampilkan ke view dengan key-value
    return view('backend.06_krk.03_berkasfungsikeagamaan.01_berkaspermohonankeagamaan', [
        'title' => 'Berkas Permohonan KRK Fungsi Keagamaan Bangunan Gedung',
        'data' => $data,
        'user' => $user
    ]);
}


public function validasikrkkeagamaan(Request $request, $id)
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
    $item = krkkeagamaan::findOrFail($id);

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
    session()->flash('update', 'Data Verifikasi KRK Keagamaan Berhasil !');

    // Redirect ke route bernama bebantuanteknis.show
    return redirect()->route('bekrkkeagamaanpermohonan.show', ['id' => $id]);
}



public function valberkasagama1(Request $request, $id)
    {
        $data = krkkeagamaan::findOrFail($id);

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
           return redirect('/bekrkkeagamaan');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }

    public function doklapkrkkeagamaan($id)
{
    $databantuanteknis = krkkeagamaan::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = krkkeagamaancek::where('krkkeagamaan_id', $databantuanteknis->id)->paginate(50);

    return view('backend.06_krk.03_berkasfungsikeagamaan.02_ceklapkrkkeagamaan', [
        'title' => 'Dokumentasi Cek Lapangan KRK Fungsi Keagamaan Bangunan Gedung',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function doklapkrkkeagamaancreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = krkkeagamaan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.06_krk.03_berkasfungsikeagamaan.03_createkrkagama', [
        'title' => 'Form Dokumentasi Cek Lapangan KRK Fungsi Keagamaan Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function doklapkrkkeagamaancreatenew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'krkkeagamaan_id' => 'required|string',
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
        'krkkeagamaan_id.required' => 'KRK Hunian wajib diisi.',
        'kegiatan.required' => 'Nama Kegiatan wajib diisi.',
        'tanggalkegiatan.required' => 'Tanggal kegiatan wajib diisi.',
        'foto1.required' => 'Foto Dokumentasi 1 wajib diunggah.',
        'foto1.image' => 'Foto Dokumentasi 1 harus berupa file gambar.',
        'foto1.mimes' => 'Foto Dokumentasi 1 harus berformat jpeg, png, jpg, gif, atau svg.',
        'foto1.max' => 'Ukuran foto Dokumentasi 1 maksimal 10MB.',
        'foto2.image' => 'Foto Dokumentasi 2 harus berupa file gambar.',
        'foto2.mimes' => 'Format gambar tidak sesuai.',
        'foto3.image' => 'Foto Dokumentasi 3 harus berupa file gambar.',
        'foto4.image' => 'Foto Dokumentasi 4 harus berupa file gambar.',
        'foto5.image' => 'Foto Dokumentasi 5 harus berupa file gambar.',
        'foto6.image' => 'Foto Dokumentasi 6 harus berupa file gambar.',
        'berkas1.mimes' => 'Berkas 1 harus berupa file PDF.',
        'berkas2.mimes' => 'Berkas 2 harus berupa file PDF.',
    ]);

    // Simpan ke model krkhuniancek
    $data = new krkkeagamaancek();
    $data->krkkeagamaan_id = $validated['krkkeagamaan_id'];
    $data->kegiatan = $validated['kegiatan'];
    $data->tanggalkegiatan = $validated['tanggalkegiatan'];

    // Helper upload file
    function simpanFileAgama($request, $field, $folder)
    {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $filename = time() . "_{$field}." . $file->getClientOriginalExtension();
            $file->move(public_path($folder), $filename);
            return $folder . '/' . $filename;
        }
        return null;
    }

    // Upload ke folder 06_krkagama sesuai permintaan
    $data->berkas1 = simpanFileAgama($request, 'berkas1', '06_krkagama/00_berkas1');
    $data->berkas2 = simpanFileAgama($request, 'berkas2', '06_krkagama/00_berkas2');

    $data->foto1 = simpanFileAgama($request, 'foto1', '06_krkagama/01_ceklapangan');
    $data->foto2 = simpanFileAgama($request, 'foto2', '06_krkagama/02_ceklapangan');
    $data->foto3 = simpanFileAgama($request, 'foto3', '06_krkagama/03_ceklapangan');
    $data->foto4 = simpanFileAgama($request, 'foto4', '06_krkagama/04_ceklapangan');
    $data->foto5 = simpanFileAgama($request, 'foto5', '06_krkagama/05_ceklapangan');
    $data->foto6 = simpanFileAgama($request, 'foto6', '06_krkagama/06_ceklapangan');

    $data->save();

    session()->flash('create', 'Dok Cek Lapangan KRK Keagamaan berhasil dibuat!');

    return redirect()->route('doklapkrkkeagamaan.show', ['id' => $validated['krkkeagamaan_id']]);
}


public function doklapkrkkeagamaandelete($id)
{
    // Cari entri berdasarkan ID
    $entry = krkkeagamaancek::where('id', $id)->first();

    if ($entry) {
        // Simpan dulu lapangan_id sebelum entri dihapus
        $lapanganId = $entry->krkkeagamaan_id;

        // Hapus file jika ada (aktifkan jika memang simpan file)
        // if (Storage::disk('public')->exists($entry->header)) {
        //     Storage::disk('public')->delete($entry->header);
        // }

        // Hapus data dari database
        $entry->delete();

        // Redirect ke halaman detail lapangan terkait
        return redirect()->route('doklapkrkkeagamaan.show', ['id' => $lapanganId])
                         ->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}


public function valberkasagama2(Request $request, $id)
    {
        $data = krkkeagamaan::findOrFail($id);

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
           return redirect('/bekrkkeagamaan');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }

    public function berkaskeagamaanval($id)
{
    $data = krkkeagamaan::findOrFail($id);

    if ($data->is_validated) {
        return back()->with('info', 'Berkas sudah di setujuai DPUPR Kab Blora.');
    }

    $data->update([
        'is_validated' => true,
        'validated_at' => now(),
        // 'validated_by' => auth()->id(), // asumsi user login
    ]);

    session()->flash('info', 'Berkas sudah di setujuai DPUPR Kab Blora!');
    return redirect('/bekrkkeagamaan');


    // return redirect('/bekrkusaha')->with('success', 'Berkas berhasil divalidasi dan disetujui.');
}


public function perpengesahanagama($id)
{
    // Ambil data KRK Usaha berdasarkan ID atau gagal 404
    $datakrkusaha = krkkeagamaan::findOrFail($id);

    // Ambil semua data GSB kabupaten dari rencanagsbblora tanpa scope/filter
$datagsbkabblora = rencanagsbblora::withoutGlobalScopes()
    ->orderByRaw("COALESCE(ruasjalan, '') ASC")
    ->get();


    // Ambil data user yang sedang login
    $user = Auth::user();

    // Kirimkan data ke view
    return view('backend.06_krk.03_berkasfungsikeagamaan.04_berkaskrkagamasurat', [
        'title' => 'Lembar Pengesahan Permohonan KRK Fungsi Keagamaan Bangunan Gedung',
        'data' => $datakrkusaha,
        'datagsb' => $datagsbkabblora,
        'user' => $user,
    ]);
}


public function perpengesahanagamacreate(Request $request, $id)
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
    $mainData = krkkeagamaan::findOrFail($id);

    // Simpan data pengesahan
    $pengesahan = new krkusahasurat();
    $pengesahan->krkkeagamaan_id = $mainData->id;
    $pengesahan->fill($validated);
    $pengesahan->save();

    return redirect('/bekrkkeagamaan')->with('pengesahankrk',
        'Surat Permohonan KRK berhasil disetujui!');
}


public function perpengesahanagamaber($id)
{
    // Ambil data utama krkusaha berdasarkan ID
    $datausaha = krkkeagamaan::where('id', $id)->first();

    // Kalau data usaha tidak ditemukan, tampilkan 404
    if (!$datausaha) {
        return abort(404, 'Data usaha tidak ditemukan');
    }

    // Ambil data sub: krkusahasurat (relasi dari krkusaha)
    $datasurat = krkusahasurat::where('krkkeagamaan_id', $datausaha->id)->paginate(50);

    // Ambil data GSB Kabupaten Blora
    $datagsb = rencanagsbblora::orderBy('ruasjalan', 'asc')->get();

    // Return ke view
    return view('backend.06_krk.03_berkasfungsikeagamaan.05_berkaskrkagama', [
        'title' => 'Lembar Pengesahan Permohonan KRK Fungsi Keagamaan Bangunan Gedung',
        'data' => $datausaha,       // Data utama krkusaha
        'subdata' => $datasurat,    // Data sub krkusahasurat
        'datagsb' => $datagsb,      // Data dropdown/GSB
        'user' => Auth::user()
    ]);
}



public function krkagamasuratdelete($id)
{
    // Cari data berdasarkan ID
    $data = krkusahasurat::find($id);

    if ($data) {
        $data->delete();
        // Redirect dengan flash message sukses
        return redirect()->route('bekrkkeagamaanindex')->with('delete', 'Data berhasil dihapus.');
    } else {
        // Redirect dengan flash message error
        return redirect()->route('bekrkkeagamaanindex')->with('error', 'Data tidak ditemukan.');
    }
}



public function valberkasagama3(Request $request, $id)
    {
        $data = krkkeagamaan::findOrFail($id);

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
           return redirect('/bekrkkeagamaan');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


    public function permohonankrkkeagamaanfinal($id)
{
    // Ambil data utama krkusaha berdasarkan ID
    $datausaha = krkkeagamaan::where('id', $id)->first();

    // Kalau data usaha tidak ditemukan, tampilkan 404
    if (!$datausaha) {
        return abort(404, 'Data usaha tidak ditemukan');
    }

    // Ambil data sub: krkusahasurat (relasi dari krkusaha)
    $datasurat = krkusahasurat::where('krkkeagamaan_id', $datausaha->id)->paginate(50);

    // Ambil data GSB Kabupaten Blora
    $datagsb = rencanagsbblora::orderBy('ruasjalan', 'asc')->get();

    // Return ke view
    return view('backend.06_krk.03_berkasfungsikeagamaan.06_berkaskrkfinalagama', [
        'title' => 'Berkas Final Permohonan KRK Fungsi Keagamaan',
        'data' => $datausaha,       // Data utama krkusaha
        'subdata' => $datasurat,    // Data sub krkusahasurat
        'datagsb' => $datagsb,      // Data dropdown/GSB
        'user' => Auth::user()
    ]);
}


public function krkagamanoterbit($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = krkkeagamaan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.06_krk.03_berkasfungsikeagamaan.07_createnosuratagama', [
        'title' => 'Terbitkan Nomor Dinas KRK Fungsi Keagamaan Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function krkagamanoterbitnew(Request $request, $id)
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
    $krkUsaha = krkkeagamaan::findOrFail($id);

    // Update data
    $krkUsaha->nomordinasasal = $request->nomordinasasal;
    $krkUsaha->save();

    // Redirect ke halaman final dengan membawa ID krkusaha
    session()->flash('create', 'Permohonan Anda Berhasil Dibuat!');
    return redirect()->route('permohonan.permohonankrkkeagamaanfinal', ['id' => $krkUsaha->id]);
}


public function valberkasagama4(Request $request, $id)
    {
        $data = krkkeagamaan::findOrFail($id);

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
           return redirect('/bekrkkeagamaan');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


    // ========================================================

public function bekrksosbud(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 15);

    // Query dasar
    $query = krksosbud::query();

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
    $subdata = krkusahasurat::whereIn('krksosbud_id', $krkusahaIds)->get();

    return view('backend.06_krk.02_berkaspermohonan.sosbud', [
        'title' => 'Permohonan KRK Fungsi Sosial Budaya Bangunan Gedung',
        'data' => $berkasusaha,
        'subdata' => $subdata,
        'user' => $user,
    ]);
}


 public function bekrksosbudpermohonan($id)
{
    // Cari data berdasarkan ID
    $data = krksosbud::findOrFail($id);

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Tampilkan ke view dengan key-value
    return view('backend.06_krk.04_berkassosbud.01_berkaspersosbud', [
        'title' => 'Berkas Permohonan KRK Fungsi Sosial Budaya Bangunan Gedung',
        'data' => $data,
        'user' => $user
    ]);
}


public function validasikrksosbud(Request $request, $id)
{
    // Validasi input wajib & opsional
    $request->validate([
        'verifikasiktp' => 'required|in:sesuai,tidak_sesuai',
        'verifikasinpwp' => 'required|in:sesuai,tidak_sesuai',
        'verifikasisert' => 'required|in:sesuai,tidak_sesuai',
        // 'verifikasioss' => 'required|in:sesuai,tidak_sesuai',
        'verifikasipbb' => 'required|in:sesuai,tidak_sesuai',
        'verifikasidokval' => 'required|in:sesuai,tidak_sesuai',
        'verifikasisiteplan' => 'required|in:sesuai,tidak_sesuai',
        'verifikasittd' => 'required|in:sesuai,tidak_sesuai',
        'catatanvalidasi' => 'nullable|string',
    ]);

    // Cari peserta berdasarkan ID
    $item = krksosbud::findOrFail($id);

    // Simpan data
    $item->update([
        'verifikasiktp' => $request->verifikasiktp,
        'verifikasinpwp' => $request->verifikasinpwp,
        'verifikasisert' => $request->verifikasisert,
        // 'verifikasioss' => $request->verifikasioss,
        'verifikasipbb' => $request->verifikasipbb,
        'verifikasidokval' => $request->verifikasidokval,
        'verifikasisiteplan' => $request->verifikasisiteplan,
        'verifikasittd' => $request->verifikasittd,
        'catatanvalidasi' => $request->catatanvalidasi,
    ]);

    // Flash message
    session()->flash('update', 'Data Verifikasi KRK Sosial Budaya Berhasil !');

    // Redirect ke route bernama bebantuanteknis.show
    return redirect()->route('bekrksosbudpermohonan.show', ['id' => $id]);
}



public function valberkassosbud1(Request $request, $id)
    {
        $data = krksosbud::findOrFail($id);

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
           return redirect('/bekrksosbud');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


    public function doklapkrksosbud($id)
{
    $databantuanteknis = krksosbud::where('id', $id)->first();

    if (!$databantuanteknis) {
        return abort(404, 'Data sub-klasifikasi tidak ditemukan');
    }

        // Menggunakan paginate() untuk pagination
        $dataceklapangan = krksosbudcek::where('krksosbud_id', $databantuanteknis->id)->paginate(50);

    return view('backend.06_krk.04_berkassosbud.02_ceklapkrksosbud', [
        'title' => 'Dokumentasi Cek Lapangan KRK Fungsi Sosial Budaya Bangunan Gedung',
        'subdata' => $dataceklapangan,
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function doklapkrksosbudcreate($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = krksosbud::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.06_krk.04_berkassosbud.03_createkrksosbud', [
        'title' => 'Form Dokumentasi Cek Lapangan KRK Fungsi Sosial Budaya Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function doklapkrksosbudcreatenew(Request $request)
{
    // Validasi input
    $validated = $request->validate([
        'krksosbud_id' => 'required|string',
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
        'krksosbud_id.required' => 'KRK Sosbud wajib diisi.',
        'kegiatan.required' => 'Nama Kegiatan wajib diisi.',
        'tanggalkegiatan.required' => 'Tanggal kegiatan wajib diisi.',
        'foto1.required' => 'Foto Dokumentasi 1 wajib diunggah.',
        'foto1.image' => 'Foto Dokumentasi 1 harus berupa file gambar.',
        'foto1.mimes' => 'Foto Dokumentasi 1 harus berformat jpeg, png, jpg, gif, atau svg.',
        'foto1.max' => 'Ukuran foto Dokumentasi 1 maksimal 10MB.',
        'foto2.image' => 'Foto Dokumentasi 2 harus berupa file gambar.',
        'foto2.mimes' => 'Format gambar tidak sesuai.',
        'foto3.image' => 'Foto Dokumentasi 3 harus berupa file gambar.',
        'foto4.image' => 'Foto Dokumentasi 4 harus berupa file gambar.',
        'foto5.image' => 'Foto Dokumentasi 5 harus berupa file gambar.',
        'foto6.image' => 'Foto Dokumentasi 6 harus berupa file gambar.',
        'berkas1.mimes' => 'Berkas 1 harus berupa file PDF.',
        'berkas2.mimes' => 'Berkas 2 harus berupa file PDF.',
    ]);

    // Simpan ke model krksosbudcek
    $data = new krksosbudcek();
    $data->krksosbud_id = $validated['krksosbud_id'];
    $data->kegiatan = $validated['kegiatan'];
    $data->tanggalkegiatan = $validated['tanggalkegiatan'];

    // Helper upload file
    function simpanFileSosbud($request, $field, $folder)
    {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            $filename = time() . "_{$field}." . $file->getClientOriginalExtension();
            $file->move(public_path($folder), $filename);
            return $folder . '/' . $filename;
        }
        return null;
    }

    // Upload ke folder 06_krksosbud sesuai permintaan
    $data->berkas1 = simpanFileSosbud($request, 'berkas1', '06_krksosbud/00_berkas1');
    $data->berkas2 = simpanFileSosbud($request, 'berkas2', '06_krksosbud/00_berkas2');

    $data->foto1 = simpanFileSosbud($request, 'foto1', '06_krksosbud/01_ceklapangan');
    $data->foto2 = simpanFileSosbud($request, 'foto2', '06_krksosbud/02_ceklapangan');
    $data->foto3 = simpanFileSosbud($request, 'foto3', '06_krksosbud/03_ceklapangan');
    $data->foto4 = simpanFileSosbud($request, 'foto4', '06_krksosbud/04_ceklapangan');
    $data->foto5 = simpanFileSosbud($request, 'foto5', '06_krksosbud/05_ceklapangan');
    $data->foto6 = simpanFileSosbud($request, 'foto6', '06_krksosbud/06_ceklapangan');

    $data->save();

    session()->flash('create', 'Dok Cek Lapangan KRK Sosial Budaya berhasil dibuat!');

    return redirect()->route('doklapkrksosbud.show', ['id' => $validated['krksosbud_id']]);
}


public function doklapkrksosbudcreatedelete($id)
{
    // Cari entri berdasarkan ID
    $entry = krksosbudcek::where('id', $id)->first();

    if ($entry) {
        // Simpan dulu lapangan_id sebelum entri dihapus
        $lapanganId = $entry->krksosbud_id;

        // Hapus file jika ada (aktifkan jika memang simpan file)
        // if (Storage::disk('public')->exists($entry->header)) {
        //     Storage::disk('public')->delete($entry->header);
        // }

        // Hapus data dari database
        $entry->delete();

        // Redirect ke halaman detail lapangan terkait
        return redirect()->route('doklapkrksosbud.show', ['id' => $lapanganId])
                         ->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}


public function valberkassosbud2(Request $request, $id)
    {
        $data = krksosbud::findOrFail($id);

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
           return redirect('/bekrksosbud');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }


    public function berkassosbudval($id)
{
    $data = krksosbud::findOrFail($id);

    if ($data->is_validated) {
        return back()->with('info', 'Berkas sudah di setujuai DPUPR Kab Blora.');
    }

    $data->update([
        'is_validated' => true,
        'validated_at' => now(),
        // 'validated_by' => auth()->id(), // asumsi user login
    ]);

    session()->flash('info', 'Berkas sudah di setujuai DPUPR Kab Blora!');
    return redirect('/bekrksosbud');


    // return redirect('/bekrkusaha')->with('success', 'Berkas berhasil divalidasi dan disetujui.');
}

public function perpengesahansosbud($id)
{
    // Ambil data KRK Usaha berdasarkan ID atau gagal 404
    $datakrkusaha = krksosbud::findOrFail($id);

    // Ambil semua data GSB kabupaten dari rencanagsbblora tanpa scope/filter
$datagsbkabblora = rencanagsbblora::withoutGlobalScopes()
    ->orderByRaw("COALESCE(ruasjalan, '') ASC")
    ->get();


    // Ambil data user yang sedang login
    $user = Auth::user();

    // Kirimkan data ke view
    return view('backend.06_krk.04_berkassosbud.04_berkaskrksosbudsurat', [
        'title' => 'Lembar Pengesahan Permohonan KRK Fungsi Sosial Budaya Bangunan Gedung',
        'data' => $datakrkusaha,
        'datagsb' => $datagsbkabblora,
        'user' => $user,
    ]);
}


public function perpengesahansosbudcreate(Request $request, $id)
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
    $mainData = krksosbud::findOrFail($id);

    // Simpan data pengesahan
    $pengesahan = new krkusahasurat();
    $pengesahan->krksosbud_id = $mainData->id;
    $pengesahan->fill($validated);
    $pengesahan->save();

    return redirect('/bekrksosbud')->with('pengesahankrk',
        'Surat Permohonan KRK berhasil disetujui!');
}


public function perpengesahansosbudber($id)
{
    // Ambil data utama krkusaha berdasarkan ID
    $datausaha = krksosbud::where('id', $id)->first();

    // Kalau data usaha tidak ditemukan, tampilkan 404
    if (!$datausaha) {
        return abort(404, 'Data usaha tidak ditemukan');
    }

    // Ambil data sub: krkusahasurat (relasi dari krkusaha)
    $datasurat = krkusahasurat::where('krksosbud_id', $datausaha->id)->paginate(50);

    // Ambil data GSB Kabupaten Blora
    $datagsb = rencanagsbblora::orderBy('ruasjalan', 'asc')->get();

    // Return ke view
    return view('backend.06_krk.04_berkassosbud.05_berkaskrksosbud', [
        'title' => 'Lembar Pengesahan Permohonan KRK Fungsi Sosial Budaya Bangunan Gedung',
        'data' => $datausaha,       // Data utama krkusaha
        'subdata' => $datasurat,    // Data sub krkusahasurat
        'datagsb' => $datagsb,      // Data dropdown/GSB
        'user' => Auth::user()
    ]);
}

public function krksosbudsuratdelete($id)
{
    // Cari data berdasarkan ID
    $data = krksosbud::find($id);

    if ($data) {
        $data->delete();
        // Redirect dengan flash message sukses
        return redirect()->route('bekrksosbudindex')->with('delete', 'Data berhasil dihapus.');
    } else {
        // Redirect dengan flash message error
        return redirect()->route('bekrksosbudindex')->with('error', 'Data tidak ditemukan.');
    }
}




public function valberkassosbud3(Request $request, $id)
    {
        $data = krksosbud::findOrFail($id);

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
           return redirect('/bekrksosbud');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }



    public function permohonankrksosbudfinal($id)
{
    // Ambil data utama krkusaha berdasarkan ID
    $datausaha = krksosbud::where('id', $id)->first();

    // Kalau data usaha tidak ditemukan, tampilkan 404
    if (!$datausaha) {
        return abort(404, 'Data usaha tidak ditemukan');
    }

    // Ambil data sub: krkusahasurat (relasi dari krkusaha)
    $datasurat = krkusahasurat::where('krksosbud_id', $datausaha->id)->paginate(50);

    // Ambil data GSB Kabupaten Blora
    $datagsb = rencanagsbblora::orderBy('ruasjalan', 'asc')->get();

    // Return ke view
    return view('backend.06_krk.04_berkassosbud.06_berkaskrkfinalsosbud', [
        'title' => 'Berkas Final Permohonan KRK Fungsi Sosial Budaya Keagamaan',
        'data' => $datausaha,       // Data utama krkusaha
        'subdata' => $datasurat,    // Data sub krkusahasurat
        'datagsb' => $datagsb,      // Data dropdown/GSB
        'user' => Auth::user()
    ]);
}

public function krksosbufnoterbit($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = krksosbud::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.06_krk.04_berkassosbud.07_createnosuratsosbud', [
        'title' => 'Terbitkan Nomor Dinas KRK Fungsi Sosial Budaya Bangunan Gedung ',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}

public function krksosbufnoterbitnew(Request $request, $id)
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
    $krkUsaha = krksosbud::findOrFail($id);

    // Update data
    $krkUsaha->nomordinasasal = $request->nomordinasasal;
    $krkUsaha->save();

    // Redirect ke halaman final dengan membawa ID krkusaha
    session()->flash('create', 'Permohonan Anda Berhasil Dibuat!');
    return redirect()->route('permohonan.permohonankrksosbudfinal', ['id' => $krkUsaha->id]);
}


public function valberkassosbud4(Request $request, $id)
    {
        $data = krksosbud::findOrFail($id);

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
           return redirect('/bekrksosbud');

        // return redirect()->back()->with('success', 'Status validasi tahap 1 berhasil diperbarui.');
    }

// MENU AKUN PEMOHON KRK

      public function bekrkusahapemohon(Request $request)
{
    $user = Auth::user(); // User yang sedang login
    $search = $request->input('search');
    $perPage = $request->input('perPage', 15);

    // Query dasar: hanya data milik user yang login
    $query = krkusaha::where('user_id', $user->id);

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

    // Ambil data utama paginasi (hanya milik user)
    $berkasusaha = $query->latest()->paginate($perPage)->appends($request->all());

    // Ambil semua ID krkusaha yang muncul di hasil paginasi
    $krkusahaIds = $berkasusaha->pluck('id');

    // Ambil data sub dari relasi krkusahasurat
    $subdata = krkusahasurat::whereIn('krkusaha_id', $krkusahaIds)->get();

    return view('backend.00_pemohon.06_krk.01_fungsiusaha.02_fungsiusahapemohon', [
        'title' => 'Permohonan KRK Fungsi Usaha Bangunan Gedung',
        'data' => $berkasusaha,
        'subdata' => $subdata,
        'user' => $user,
    ]);
}


// ========================================================

public function bekrkhunianpemohon(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 15);

    // Query dasar: hanya data milik user yang login
    $query = krkhunian::where('user_id', $user->id);

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

    // Ambil semua ID krkhunian yang muncul di hasil paginasi
    $krkhunianIds = $berkasusaha->pluck('id');

    // Ambil data sub dari relasi krkusahasurat berdasarkan krkhunian_id
    $subdata = krkusahasurat::whereIn('krkhunian_id', $krkhunianIds)->get();

    return view('backend.00_pemohon.06_krk.02_fungsihunian.01_berkaspemohonhunian', [
        'title' => 'Permohonan KRK Fungsi Hunian Bangunan Gedung',
        'data' => $berkasusaha,
        'subdata' => $subdata,
        'user' => $user,
    ]);
}



    public function bekrkkeagamaanpemohon(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 15);

    // Query dasar: hanya data milik user yang login
    $query = krkkeagamaan::where('user_id', $user->id);

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

    // Ambil data utama paginasi (hanya milik user)
    $berkasusaha = $query->latest()->paginate($perPage)->appends($request->all());

    // Ambil semua ID krkkeagamaan yang muncul di hasil paginasi
    $krkkeagamaanIds = $berkasusaha->pluck('id');

    // Ambil data sub dari relasi krkusahasurat berdasarkan krkkeagamaan_id
    $subdata = krkusahasurat::whereIn('krkkeagamaan_id', $krkkeagamaanIds)->get();

    return view('backend.00_pemohon.06_krk.03_fungsikeagamaan.01_berkaskeagamaan', [
        'title' => 'Permohonan KRK Fungsi Keagamaan Bangunan Gedung',
        'data' => $berkasusaha,
        'subdata' => $subdata,
        'user' => $user,
    ]);
}


public function bekrksosbudpemohon(Request $request)
{
    $user = Auth::user();
    $search = $request->input('search');
    $perPage = $request->input('perPage', 15);

    // Query dasar: hanya data milik user yang login
    $query = krksosbud::where('user_id', $user->id);

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

    // Ambil data utama paginasi (hanya milik user)
    $berkasusaha = $query->latest()->paginate($perPage)->appends($request->all());

    // Ambil semua ID krksosbud yang muncul di hasil paginasi
    $krksosbudIds = $berkasusaha->pluck('id');

    // Ambil data sub dari relasi krkusahasurat berdasarkan krksosbud_id
    $subdata = krkusahasurat::whereIn('krksosbud_id', $krksosbudIds)->get();

    return view('backend.00_pemohon.06_krk.04_fungsisosbud.01_berkassosbud', [
        'title' => 'Permohonan KRK Fungsi Sosial Budaya Bangunan Gedung',
        'data' => $berkasusaha,
        'subdata' => $subdata,
        'user' => $user,
    ]);
}


public function bekrkusahaperbaikan($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = krkusaha::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.06_krk.01_pengesahanusaha.07_perbaikanusaha', [
        'title' => 'Perbaikan Data KRK Fungsi Usaha !',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bekrkusahaperbaikannewupdate(Request $request, $id)
{
    $bantuan = krkusaha::findOrFail($id);

    // Validasi input
    $request->validate([
        'luastanah' => 'required|numeric',
        'jumlahlantai' => 'required|string',

        'ktp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'npwp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'sertifikattanah' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'lampiranoss' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'buktipbb' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'dokvalidasi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'siteplan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'tandatangan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
    ]);

    // Update input utama
    $bantuan->luastanah = $request->luastanah;
    $bantuan->jumlahlantai = $request->jumlahlantai;

    // Mapping dokumen ke path
    $dokumenMap = [
        'ktp' => '06_krk/01_krkusaha/01_ktp',
        'npwp' => '06_krk/01_krkusaha/02_npwp',
        'sertifikattanah' => '06_krk/01_krkusaha/03_sertifikattanah',
        'lampiranoss' => '06_krk/01_krkusaha/04_lampiranoss',
        'buktipbb' => '06_krk/01_krkusaha/05_buktipbb',
        'dokvalidasi' => '06_krk/01_krkusaha/06_dokvalidasi',
        'siteplan' => '06_krk/01_krkusaha/06_siteplan',
        'tandatangan' => '06_krk/01_krkusaha/07_tandatangan',
    ];

    foreach ($dokumenMap as $field => $path) {
        if ($request->hasFile($field)) {
            if ($bantuan->$field && file_exists(public_path($bantuan->$field))) {
                unlink(public_path($bantuan->$field));
            }

            $file = $request->file($field);
            $filename = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path($path);
            $file->move($destinationPath, $filename);
            $bantuan->$field = $path . '/' . $filename;
        }
    }

    // Reset status verifikasi agar diverifikasi ulang
    $bantuan->verifikasiktp = null;
    $bantuan->verifikasinpwp = null;
    $bantuan->verifikasisert = null;
    $bantuan->verifikasioss = null;
    $bantuan->verifikasipbb = null;
    $bantuan->verifikasidokval = null;
    $bantuan->verifikasisiteplan = null;
    $bantuan->verifikasittd = null;
    $bantuan->verifikasi1 = null;

    $bantuan->save();

    session()->flash('update', 'Perbaikan Berkas Anda Berhasil!');
    return redirect()->route('bekrkshowpermohonan.show', ['id' => $bantuan->id]);
}


public function dokbekrkusahadelete($id)
{
    // Cari entri berdasarkan ID
    $entry = krkusaha::find($id);

    if ($entry) {
        // Hapus file jika ada (jika menyimpan file)
        // if (Storage::disk('public')->exists($entry->header)) {
        //     Storage::disk('public')->delete($entry->header);
        // }

        // Hapus data dari database
        $entry->delete();

        // Redirect ke halaman index krkusaha
        return redirect()->route('krkusaha.index')->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}


public function bekrkhunianperbaikan($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = krkhunian::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.06_krk.02_berkasfungsihunian.08_perbaikanhunian', [
        'title' => 'Perbaikan Data KRK Fungsi Hunian Bangunan Gedung !',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bekrkhunianperbaikannewupdate(Request $request, $id)
{
    $bantuan = krkhunian::findOrFail($id);

    // Validasi input
    $request->validate([
        'luastanah' => 'required|numeric',
        'jumlahlantai' => 'required|string',

        'ktp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        // 'npwp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'sertifikattanah' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        // 'lampiranoss' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'buktipbb' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'dokvalidasi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        // 'siteplan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'tandatangan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
    ]);

    // Update input utama
    $bantuan->luastanah = $request->luastanah;
    $bantuan->jumlahlantai = $request->jumlahlantai;

    // Mapping dokumen ke path
    $dokumenMap = [
        'ktp' => '06_krk/02_krkhunian/01_ktp',
        'sertifikattanah' => '06_krk/02_krkhunian/03_sertifikattanah',
        'buktipbb' => '06_krk/02_krkhunian/05_buktipbb',
        'dokvalidasi' => '06_krk/02_krkhunian/06_dokvalidasi',
        'tandatangan' => '06_krk/02_krkhunian/07_tandatangan',
        // 'lampiranoss' => '06_krk/01_krkusaha/04_lampiranoss',
        // 'siteplan' => '06_krk/01_krkusaha/06_siteplan',
        // 'npwp' => '06_krk/01_krkusaha/02_npwp',
    ];

    foreach ($dokumenMap as $field => $path) {
        if ($request->hasFile($field)) {
            if ($bantuan->$field && file_exists(public_path($bantuan->$field))) {
                unlink(public_path($bantuan->$field));
            }

            $file = $request->file($field);
            $filename = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path($path);
            $file->move($destinationPath, $filename);
            $bantuan->$field = $path . '/' . $filename;
        }
    }

    // Reset status verifikasi agar diverifikasi ulang
    $bantuan->verifikasiktp = null;
    // $bantuan->verifikasinpwp = null;
    $bantuan->verifikasisert = null;
    // $bantuan->verifikasioss = null;
    $bantuan->verifikasipbb = null;
    $bantuan->verifikasidokval = null;
    // $bantuan->verifikasisiteplan = null;
    $bantuan->verifikasittd = null;
    $bantuan->verifikasi1 = null;

    $bantuan->save();

    session()->flash('update', 'Perbaikan Berkas Anda Berhasil!');
    return redirect()->route('bekrkhunianpermohonan.show', ['id' => $bantuan->id]);
}

public function dokbekrkhuniandelete($id)
{
    // Cari entri berdasarkan ID
    $entry = krkhunian::find($id);

    if ($entry) {
        // Hapus file jika ada (jika menyimpan file)
        // if (Storage::disk('public')->exists($entry->header)) {
        //     Storage::disk('public')->delete($entry->header);
        // }

        // Hapus data dari database
        $entry->delete();

        // Redirect ke halaman index krkusaha
        return redirect()->route('bekrkhunianindex')->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}



public function bekrkkeagamaanperbaikan($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = krkkeagamaan::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.06_krk.03_berkasfungsikeagamaan.08_perbaikankeagamaan', [
        'title' => 'Perbaikan Data KRK Fungsi Keagamaan Bangunan Gedung !',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bekrkkeagamaanperbaikannew(Request $request, $id)
{
    $bantuan = krkkeagamaan::findOrFail($id);

    // Validasi input
    $request->validate([
        'luastanah' => 'required|numeric',
        'jumlahlantai' => 'required|string',

        'ktp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'npwp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'sertifikattanah' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'lampiranoss' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'buktipbb' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'dokvalidasi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'siteplan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'tandatangan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
    ]);

    // Update input utama
    $bantuan->luastanah = $request->luastanah;
    $bantuan->jumlahlantai = $request->jumlahlantai;

    // Mapping dokumen ke path
    $dokumenMap = [
        'ktp' => '06_krk/03_krkkeagamaan/01_ktp',
        'npwp' => '06_krk/03_krkkeagamaan/02_npwp',
        'sertifikattanah' => '06_krk/03_krkkeagamaan/03_sertifikattanah',
        'lampiranoss' => '06_krk/03_krkkeagamaan/04_lampiranoss',
        'buktipbb' => '06_krk/03_krkkeagamaan/05_buktipbb',
        'dokvalidasi' => '06_krk/03_krkkeagamaan/06_dokvalidasi',
        'siteplan' => '06_krk/03_krkkeagamaan/06_siteplan',
        'tandatangan' => '06_krk/03_krkkeagamaan/07_tandatangan',
    ];

    foreach ($dokumenMap as $field => $path) {
        if ($request->hasFile($field)) {
            if ($bantuan->$field && file_exists(public_path($bantuan->$field))) {
                unlink(public_path($bantuan->$field));
            }

            $file = $request->file($field);
            $filename = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path($path);
            $file->move($destinationPath, $filename);
            $bantuan->$field = $path . '/' . $filename;
        }
    }

    // Reset status verifikasi agar diverifikasi ulang
    $bantuan->verifikasiktp = null;
    $bantuan->verifikasinpwp = null;
    $bantuan->verifikasisert = null;
    $bantuan->verifikasioss = null;
    $bantuan->verifikasipbb = null;
    $bantuan->verifikasidokval = null;
    $bantuan->verifikasisiteplan = null;
    $bantuan->verifikasittd = null;
    $bantuan->verifikasi1 = null;

    $bantuan->save();

    session()->flash('update', 'Perbaikan Berkas Anda Berhasil!');
    return redirect()->route('bekrkkeagamaanpermohonan.show', ['id' => $bantuan->id]);
}


public function dokbekrkkeagamaandelete($id)
{
    // Cari entri berdasarkan ID
    $entry = krkkeagamaan::find($id);

    if ($entry) {
        // Hapus file jika ada (jika menyimpan file)
        // if (Storage::disk('public')->exists($entry->header)) {
        //     Storage::disk('public')->delete($entry->header);
        // }

        // Hapus data dari database
        $entry->delete();

        // Redirect ke halaman index krkusaha
        return redirect()->route('bekrkkeagamaanindex')->with('delete', 'Data berhasil dihapus!');
    }

    // Jika tidak ditemukan
    return redirect()->back()->with('error', 'Data tidak ditemukan.');
}


public function bekrksosbudperbaikan($id)
{
    // Ambil data bantuan teknis berdasarkan ID
    $databantuanteknis = krksosbud::find($id);

    if (!$databantuanteknis) {
        return abort(404, 'Data bantuan teknis tidak ditemukan');
    }

    // Kirim data ke view form pembuatan dokumentasi cek lapangan
    return view('backend.06_krk.04_berkassosbud.08_perbaikansosbud', [
        'title' => 'Perbaikan Data KRK Fungsi Sosial Budaya Bangunan Gedung !',
        'data' => $databantuanteknis,
        'user' => Auth::user()
    ]);
}


public function bekrksosbudperbaikannew(Request $request, $id)
{
    $bantuan = krksosbud::findOrFail($id);

    // Validasi input
    $request->validate([
        'luastanah' => 'required|numeric',
        'jumlahlantai' => 'required|string',

        'ktp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'npwp' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'sertifikattanah' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        // 'lampiranoss' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'buktipbb' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'dokvalidasi' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'siteplan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
        'tandatangan' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:10048',
    ]);

    // Update input utama
    $bantuan->luastanah = $request->luastanah;
    $bantuan->jumlahlantai = $request->jumlahlantai;

    // Mapping dokumen ke path
    $dokumenMap = [
        'ktp' => '06_krk/04_krksosbud/01_ktp',
        'npwp' => '06_krk/04_krksosbud/02_npwp',
        'sertifikattanah' => '06_krk/04_krksosbud/03_sertifikattanah',
        // 'lampiranoss' => '06_krk/04_krksosbud/04_lampiranoss',
        'buktipbb' => '06_krk/04_krksosbud/05_buktipbb',
        'dokvalidasi' => '06_krk/04_krksosbud/06_dokvalidasi',
        'siteplan' => '06_krk/04_krksosbud/06_siteplan',
        'tandatangan' => '06_krk/04_krksosbud/07_tandatangan',
    ];

    foreach ($dokumenMap as $field => $path) {
        if ($request->hasFile($field)) {
            if ($bantuan->$field && file_exists(public_path($bantuan->$field))) {
                unlink(public_path($bantuan->$field));
            }

            $file = $request->file($field);
            $filename = time() . '_' . $field . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path($path);
            $file->move($destinationPath, $filename);
            $bantuan->$field = $path . '/' . $filename;
        }
    }

    // Reset status verifikasi agar diverifikasi ulang
    $bantuan->verifikasiktp = null;
    $bantuan->verifikasinpwp = null;
    $bantuan->verifikasisert = null;
    // $bantuan->verifikasioss = null;
    $bantuan->verifikasipbb = null;
    $bantuan->verifikasidokval = null;
    $bantuan->verifikasisiteplan = null;
    $bantuan->verifikasittd = null;
    $bantuan->verifikasi1 = null;

    $bantuan->save();

    session()->flash('update', 'Perbaikan Berkas Anda Berhasil!');
    return redirect()->route('bekrksosbudpermohonan.show', ['id' => $bantuan->id]);
}



}

