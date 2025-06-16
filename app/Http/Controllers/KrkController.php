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

    return view('backend.06_krk.02_berkaspermohonan.index', [
        'title' => 'Permohonan KRK Bangunan Gedung',
        'data' => $data,
        'user' => $user,
        'datajumlahkrkusaha' => $datajumlahkrkusaha,
    ]);
}

        public function bekrkusaha()
        {
            $user = Auth::user();
            $berkasusaha = krkusaha::latest()->paginate(15); // ambil data terbaru dan paginate

            return view('backend.06_krk.02_berkaspermohonan.usaha', [
                'title' => 'Permohonan KRK Usaha Bangunan Gedung',
                'data' => $berkasusaha, // data untuk looping
                'user' => $user,
            ]);
        }

// BERKAS PENGESAHAN FUNGSI USAHA BANGUNAN GEDUNG
public function permohonanpengesahanusaha($id)
{
    // Ambil data usaha berdasarkan ID atau return 404 jika tidak ditemukan
    $datakrkusaha = krkusaha::findOrFail($id); // findOrFail secara otomatis akan melempar error 404 jika data tidak ditemukan

    // Ambil semua ruas jalan dari rencanagsbblora
    $datagsbkabblora = rencanagsbblora::orderBy('ruasjalan', 'asc')->get();

    // Ambil data user yang sedang login
    $user = Auth::user();

    // Mengirimkan data ke view
    return view('backend.06_krk.02_berkaspermohonan.01_pengesahanusaha.index', [
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
        'jumlahlantai' => 'required|string|max:20',
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


        public function bekrkhunian()
        {

            $user = Auth::user();
            $data = krkhunian::latest()->paginate(15); // ambil data terbaru dan paginate

            return view('backend.06_krk.02_berkaspermohonan.hunian', [
                'title' => 'Permohonan KRK Hunian Bangunan Gedung',
                'data' => $data, // Mengirimkan data paginasi ke view
                'user' => $user, // Mengirimkan data paginasi ke view
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

}

