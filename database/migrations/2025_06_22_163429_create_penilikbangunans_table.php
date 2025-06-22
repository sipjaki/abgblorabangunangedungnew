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
        Schema::create('penilikbangunans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dokpemohonpenilik_id')->nullable()->index(); // YANG MEMBUAT DOKUMEN
            $table->foreignId('penilikdasilitator_id')->nullable()->index(); // YANG MEMBUAT DOKUMEN
            $table->foreignId('lapanganpenilik_id')->nullable()->index(); // YANG MEMBUAT DOKUMEN
            $table->foreignId('uploadberpenilik_id')->nullable()->index(); // YANG MEMBUAT DOKUMEN
            $table->foreignId('rencanagsbblora_id')->nullable()->index(); // YANG MEMBUAT DOKUMEN

    // DATA UMUM BANGUNAN
    $table->string('fungsibangunan')->nullable();
    $table->string('subfungsibangunan')->nullable();

    // DETAILS BANGUNAN DAN SPESIFIKASI
    $table->string('namabangunan')->nullable();
    $table->string('luasbangunan')->nullable();         // luas dalam satuan m2, misal
    $table->string('ketinggianbangunan')->nullable();    // tinggi bangunan (meter)
    $table->string('jumlahlantai')->nullable();
    $table->string('jumlahlapisbasemen')->nullable();
    $table->string('luasbasemen')->nullable();
    $table->string('jumlahunit')->nullable();
    $table->string('estimasijumlahpenghuni')->nullable();

    // SPESIFIKASI BANGUNAN
    $table->string('nomorkkpr')->nullable();
    $table->decimal('gsb', 5, 2)->nullable();    // Garis Sempadan Bangunan (misal dalam meter)
    $table->decimal('kdb', 5, 2)->nullable();    // Koefisien Dasar Bangunan (%)
    $table->decimal('klb', 5, 2)->nullable();    // Koefisien Lantai Bangunan
    $table->decimal('kdh', 5, 2)->nullable();    // Koefisien Dasar Hijau (%)

    // INTERNSITAS BANGUNAN GEDUNG
    $table->string('provinsi')->nullable();
    $table->string('kabupaten')->nullable();
    $table->foreignId('user_id')->nullable()->index(); // YANG MEMBUAT DOKUMEN
    $table->foreignId('kecamatanblora_id', 255)->nullable()->index();
    $table->foreignId('kelurahandesa_id', 255)->nullable()->index();
    $table->text('alamatlengkap')->nullable();
    $table->string('koordinat')->nullable();

    $table->string('verifikasi1')->nullable();
    $table->string('verifikasi2')->nullable();
    $table->string('verifikasi3')->nullable();
    $table->string('verifikasi4')->nullable();

    $table->string('cadpenilikbangunan1')->nullable();
    $table->string('cadpenilikbangunan2')->nullable();
    $table->string('cadpenilikbangunan3')->nullable();
    $table->string('cadpenilikbangunan4')->nullable();
    $table->string('cadpenilikbangunan5')->nullable();


    $table->softDeletes();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilikbangunans');
    }
};
