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
Schema::create('databgstrukturbangunans', function (Blueprint $table) {
    $table->id();
    $table->foreignId('databgkepemilikan_id')->nullable()->index();
 // Struktur Bangunan
    $table->string('struktur_bawah')->nullable();       // Struktur Bawah
    $table->string('struktur_atas')->nullable();        // Struktur Atas
    $table->string('struktur_atap')->nullable();        // Struktur Atap
    $table->string('rangka_atap')->nullable();          // Rangka Atap
    $table->string('balok')->nullable();                // Balok
    $table->string('kolom')->nullable();                // Kolom
    $table->string('pondasi')->nullable();              // Pondasi
    $table->string('dinding')->nullable();              // Dinding
    $table->string('genteng')->nullable();              // Genteng
    $table->string('plafon')->nullable();               // Plafon
    $table->string('lantai')->nullable();               // Lantai
    $table->string('pintu')->nullable();                // Pintu
    $table->string('jendela')->nullable();              // Jendela

    $table->softDeletes();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('databgstrukturbangunans');
    }
};
