<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('bantekpembongkarannew2s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bantekpembongkaraninduk_id')->nullable();
 // dokumen analisa bangunan gedung
            tingkat kerusakan (dalam angka persen)
 status kerusakan
 dokkerusakanbangunan
 validasiberkas1
 catatan1
// surat kajian teknis bangunan gedung
nosurat
tanggalsurat
statuspenilaian teknis
suratpernyataankelaikan
validasiberkas2
catatan2
// asbuildrawing
gambarasd
keterangan
validasiberkas3
catatan3

// metode pembongkaran
pelaksana
namapenanggungjawab
notelepon
berkaspembongkaran
validasiberkas4
catatan4

// laporanpemeriksaanbangunan gedung
ketersediaan (ada tidak ada)
berkaspemeriksaan
validasiberkas5
catatan5

cadangan1
cadangan2
cadangan3
cadangan4
cadangan5

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bantekpembongkarannew2s');
    }
};
