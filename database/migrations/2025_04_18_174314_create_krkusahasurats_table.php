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
        Schema::create('krkusahasurats', function (Blueprint $table) {
            $table->id();
            $table->foreignId('krkusaha_id')->nullable()->index();    // Ruas Jalan (relasi ke tabel lain)
            $table->foreignId('rencanagsbblora_id')->nullable()->index();    // Ruas Jalan (relasi ke tabel lain)
            $table->string('nomorregistrasi')->nullable();          // Nomor Registrasi KRK
            $table->date('tanggalpermohonan')->nullable();          // Tanggal Dibuat KRK
            $table->string('kepadatan')->nullable();                // Kepadatan
            $table->string('jumlahlantai')->nullable();             // Jumlah Lantai Maksimal
            $table->integer('luasbangunan')->nullable();            // Luas Bangunan Maksimal (m²)
            $table->string('fungsibangunan')->nullable();           // Fungsi Utama Bangunan
            $table->string('lokasibangunan')->nullable();           // Lokasi Bangunan

            $table->string('jenisjalan')->nullable();               // Jenis Ruas Jalan
            $table->float('gsb')->nullable();                     // GSB

            $table->string('klb')->nullable();                      // KLB
            $table->integer('kdh')->nullable();                     // KDH (10, 20, 30 persen)
            $table->string('jaringanutilitas')->nullable();         // Jaringan Utilitas Kota

            $table->softDeletes();
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('krkusahasurats');
    }
};
