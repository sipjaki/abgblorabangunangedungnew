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

    // RELASI KE INDUK
    $table->foreignId('bantekpembongkaraninduk_id')->nullable();
    /*

    |--------------------------------------------------------------------------
    | DOKUMEN ANALISA BANGUNAN GEDUNG BERKAS 2
    |--------------------------------------------------------------------------
    */
    $table->decimal('tingkat_kerusakan', 5, 2)->nullable(); // persen
    $table->string('status_kerusakan')->nullable();
    $table->string('dok_kerusakan_bangunan')->nullable();
    $table->string('validasiberkas1')->nullable();
    $table->text('catatan1')->nullable();

    /*
    |--------------------------------------------------------------------------
    | SURAT KAJIAN TEKNIS BANGUNAN GEDUNG BERKAS 3
    |--------------------------------------------------------------------------
    */
    $table->string('nosurat')->nullable();
    $table->date('tanggalsurat')->nullable();
    $table->string('status_penilaian_teknis')->nullable();
    $table->string('suratpernyataankelaikan')->nullable();
    $table->string('validasiberkas2')->nullable();
    $table->text('catatan2')->nullable();

    /*
    |--------------------------------------------------------------------------
    | AS BUILT DRAWING BERKAS 4
    |--------------------------------------------------------------------------
    */
    $table->string('gambar_asd')->nullable();
    $table->text('keterangan')->nullable();
    $table->string('validasiberkas3')->nullable();
    $table->text('catatan3')->nullable();

    /*
    |--------------------------------------------------------------------------
    | METODE PEMBONGKARAN BERKAS 5
    |--------------------------------------------------------------------------
    */
    $table->string('pelaksana')->nullable();
    $table->string('namapenanggungjawab')->nullable();
    $table->string('notelepon')->nullable();
    $table->string('berkaspembongkaran')->nullable();
    $table->string('validasiberkas4')->nullable();
    $table->text('catatan4')->nullable();

    /*
    |--------------------------------------------------------------------------
    | LAPORAN PEMERIKSAAN BANGUNAN GEDUNG BERKAS 6
    |--------------------------------------------------------------------------
    */
    $table->string('ketersediaan')->nullable();
    $table->string('berkaspemeriksaan')->nullable();
    $table->string('validasiberkas5')->nullable();
    $table->text('catatan5')->nullable();

    /*
    |--------------------------------------------------------------------------
    | CADANGAN
    |--------------------------------------------------------------------------
    */
    $table->string('cadangan1')->nullable();
    $table->string('cadangan2')->nullable();
    $table->string('cadangan3')->nullable();
    $table->string('cadangan4')->nullable();
    $table->string('cadangan5')->nullable();

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
