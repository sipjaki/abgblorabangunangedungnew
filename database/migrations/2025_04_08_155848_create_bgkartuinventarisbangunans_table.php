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
        Schema::create('bgkartuinventarisbangunans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kedinasan_id')->nullable()->index();
            $table->foreignId('kodelokasibangunangedung_id')->nullable()->index();
            $table->string('namabangunandinas', 255)->nullable();       // nama bangunan
            $table->text('namabangunan')->nullable();       // nama barang
            $table->text('kodebarang')->nullable();          // kode katalog/klasifikasi
            $table->text('registrasi')->nullable();          // nomor registrasi
            $table->string('kondisi', 20)->nullable();             // Baik / Rusak Ringan / Berat
            $table->string('bertingkat', 20)->nullable();             // true/false
            $table->string('beton', 20)->nullable();                  // true/false
            $table->float('luaslantai')->nullable();               // dalam m²
            $table->text('lokasi')->nullable();                    // alamat/lokasi lengkap
            $table->date('tanggal')->nullable();                   // tanggal perolehan
            $table->string('nomor', 100)->nullable();              // no. sertifikat/dokumen
            $table->float('luasbangunan')->nullable();             // luas bangunan
            $table->string('statustanah', 50)->nullable();         // Hak Pakai, Sewa, dll
            $table->string('nomorkodetanah', 100)->nullable();     // nomor kode tanah
            $table->string('asalusul', 50)->nullable();            // Hibah, Pembelian, dll
            $table->decimal('harga', 20, 2)->nullable();           // harga perolehan
            $table->string('keterangan', 255)->nullable();         // keterangan tambahan
            $table->string('nomorlanjutan', 100)->nullable();      // untuk data tambahan
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bgkartuinventarisbangunans');
    }
};
