<?php

namespace App\Http\Controllers;

use App\Models\bantuanhibahbg;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BantuanhibahbgController extends Controller
{
    /**
     * Menampilkan form perbaikan dokumen hibah berdasarkan user yang login
     */
   public function hibahdokcreate()
{
    // Ambil user login
    $user = Auth::user();

    // Kirim data ke view tanpa ambil dari database bantuanhibahbg
    return view('backend.10_bantuanhibah.01_createhibah', [
        'title' => 'Form Pengajuan Bantuan Hibah Baru',
        'user' => $user
    ]);
}

public function datanewhibahnew(Request $request)
{
    // Validasi input dengan custom messages
    $validated = $request->validate([
        'nomorproposal' => 'required|string|max:255',
        'tanggalproposal' => 'required|date',
        'instansi' => 'required|string|max:255',
        'intiproposal' => 'required|string',
        'narahubung' => 'required|string|max:255',
        'kontakperson' => 'required|string|max:255',
        'user_id' => 'required|string',
        'dokumenproposal' => 'nullable|file|mimes:pdf,doc,docx|max:15360', // 15MB in kilobytes
    ], [
        'nomorproposal.required' => 'Nomor proposal wajib diisi.',
        'nomorproposal.max' => 'Nomor proposal tidak boleh lebih dari 255 karakter.',

        'tanggalproposal.required' => 'Tanggal proposal wajib diisi.',
        'tanggalproposal.date' => 'Format tanggal proposal tidak valid.',

        'instansi.required' => 'Instansi yang mengajukan wajib diisi.',
        'instansi.max' => 'Nama instansi terlalu panjang.',

        'intiproposal.required' => 'Perihal/Isi proposal wajib diisi.',

        'narahubung.required' => 'Narahubung wajib diisi.',
        'narahubung.max' => 'Nama narahubung terlalu panjang.',

        'kontakperson.required' => 'Kontak person wajib diisi.',
        'kontakperson.max' => 'Nomor kontak terlalu panjang.',

        'user_id.required' => 'User ID tidak ditemukan.',
        'user_id.exists' => 'User tidak valid.',

        'dokumenproposal.file' => 'Dokumen harus berupa file.',
        'dokumenproposal.mimes' => 'Dokumen harus berupa PDF, DOC, atau DOCX.',
        'dokumenproposal.max' => 'Ukuran dokumen tidak boleh lebih dari 15MB.',
    ]);

    $dokumenPath = null;

    // Proses file upload
    if ($request->hasFile('dokumenproposal')) {
        $file = $request->file('dokumenproposal');
        $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());

        $destinationPath = public_path('10_bantuanhibah/01_berkas');

        // Buat folder jika belum ada
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0755, true);
        }

        // Pindahkan file ke folder public
        $file->move($destinationPath, $filename);

        // Simpan path relatif ke database
        $dokumenPath = '10_bantuanhibah/01_berkas/' . $filename;
    }

    // Simpan ke database
    bantuanhibahbg::create([
        'nomorproposal' => $validated['nomorproposal'],
        'tanggalproposal' => $validated['tanggalproposal'],
        'instansi' => $validated['instansi'],
        'intiproposal' => $validated['intiproposal'],
        'narahubung' => $validated['narahubung'],
        'kontakperson' => $validated['kontakperson'],
        'user_id' => $validated['user_id'],
        'dokumenproposal' => $dokumenPath,
    ]);


    session()->flash('create', 'Pengajuan Hibah Bangunan Berhasil!');
    return redirect()->route('hibahdok.create');

}

}
