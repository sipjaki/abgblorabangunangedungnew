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

        Schema::create('databgtingkatkerusahans', function (Blueprint $table) {
    $table->id();

    $table->foreignId('databgkepemilikan_id')->nullable()->index(); // relasi ke data kepemilikan

    // BAGIAN 1
    $table->string('struktur_bangunan_bawah')->nullable();
    $table->string('struktur_bangunan_atas')->nullable();
    $table->string('struktur_atap')->nullable();

    $table->string('indikasi_kerusakan1')->nullable();
    $table->string('tingkat_kerusakan1')->nullable();

    // BAGIAN 2
    $table->string('pondasi')->nullable(); // struktur_bawah
    $table->string('indikasi_kerusakan2')->nullable();
    $table->string('tingkat_kerusakan2')->nullable();

    // BAGIAN 3
    $table->string('struktur')->nullable(); // struktur_atas
    $table->string('indikasi_kerusakan3')->nullable();
    $table->string('tingkat_kerusakan3')->nullable();

    // BAGIAN 4
    $table->string('atap')->nullable(); // struktur_atap
    $table->string('indikasi_kerusakan4')->nullable();
    $table->string('tingkat_kerusakan4')->nullable();

    // BAGIAN 5
    $table->string('lantai')->nullable(); //rangka_atap
    $table->string('indikasi_kerusakan5')->nullable();
    $table->string('tingkat_kerusakan5')->nullable();

    // BAGIAN 6
    $table->string('dinding')->nullable(); // cadangan 1
    $table->string('indikasi_kerusakan6')->nullable();
    $table->string('tingkat_kerusakan6')->nullable();

    // BAGIAN 7
    $table->string('plafond')->nullable(); // cadangan 2
    $table->string('indikasi_kerusakan7')->nullable();
    $table->string('tingkat_kerusakan7')->nullable();

    // BAGIAN 8
    $table->string('utilitas')->nullable(); // balok
    $table->string('indikasi_kerusakan8')->nullable();
    $table->string('tingkat_kerusakan8')->nullable();

    // bagian 9
    $table->string('finishing')->nullable(); // kolom
    $table->string('total_nilai_kerusakan')->nullable();

    $table->string('cadangan1')->nullable();
    $table->string('cadangan2')->nullable();

    $table->softDeletes();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('databgtingkatkerusahans');
    }
};
