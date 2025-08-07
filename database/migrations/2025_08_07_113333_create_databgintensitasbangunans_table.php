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

        Schema::create('databgintensitasbangunans', function (Blueprint $table) {
    $table->id();
    $table->foreignId('databgkepemilikan_id')->nullable()->index(); // relasi ke data kepemilikan

    $table->string('nilaibgdidirikan')->nullable();
    $table->string('nilaibgsaatini')->nullable();
    $table->string('koefisien_dasar_bangunan')->nullable();
    $table->string('koefisien_lantai_bangunan')->nullable();
    $table->string('koefisien_daerah_hijau')->nullable();
    $table->string('koefisien_tapak_basement')->nullable();
    $table->string('garis_sempadan_bangunan')->nullable();
    $table->string('gambar_teknis_rencana')->nullable();
    $table->string('gambar_sesuai_pelaksana')->nullable();
    $table->string('ruang_terbuka_hijau')->nullable();
    $table->string('luas_rth')->nullable();
    $table->string('dokumen_rth')->nullable();
    $table->string('limbah_b3')->nullable();
    $table->string('sistem_penampungan_pengelolaan')->nullable();
    $table->string('dokumen_lingkungan_amdal')->nullable();
    $table->string('dokumen_aksesibilitas')->nullable();
    $table->string('jenis_transportasi_bg')->nullable();
    $table->string('dokumen_transport_bg')->nullable();
    $table->string('dokumen_teknis_tanah')->nullable();

    $table->softDeletes();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('databgintensitasbangunans');
    }
};
