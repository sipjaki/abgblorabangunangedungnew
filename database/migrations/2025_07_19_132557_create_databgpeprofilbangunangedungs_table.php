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
       Schema::create('databgpeprofilbangunangedungs', function (Blueprint $table) {
    $table->id();
    $table->foreignId('databgkepemilikan_id')->nullable()->index(); // relasi ke data kepemilikan

    $table->string('luastanah')->nullable(); // Luas Tanah
    $table->string('namabangunan')->nullable(); // Nama Bangunan Gedung
    $table->string('alamatbangunan')->nullable(); // Alamat Bangunan
    $table->string('fungsibangunan')->nullable(); // Fungsi Bangunan
    $table->string('jumlahlantai')->nullable(); // Jumlah Lantai
    $table->string('luaslantaildasar')->nullable(); // Luas Lantai Dasar
    $table->string('totalluaslantai')->nullable(); // Total Luas Lantai Gedung
    $table->string('tinggibangunan')->nullable(); // Ketinggian Bangunan
    $table->string('luasbasement')->nullable(); // Luas Basement
    $table->string('koordinatbangunan')->nullable(); // Koordinat Bangunan
    $table->string('tanggalmulaikonstruksi')->nullable(); // bisa isi: null, '2020', atau '2020-07-23'
$table->string('tanggalselesaikonstruksi')->nullable();
$table->string('tanggalrehabilitasi')->nullable();
// $table->string('column12')->nullable(); // Column12 (tidak jelas, bisa diubah nama jika diketahui)

    $table->softDeletes();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('databgpeprofilbangunangedungs');
    }
};
