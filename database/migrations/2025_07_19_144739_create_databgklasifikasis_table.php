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
        Schema::create('databgklasifikasis', function (Blueprint $table) {
    $table->id();

    // Relasi ke tabel kepemilikan
    $table->foreignId('databgkepemilikan_id')->nullable()->index();

    // Field klasifikasi yang diminta
    $table->string('tingkat_kompleksitas')->nullable();     // Tingkat Kompleksitas
    $table->string('tingkat_permanensi')->nullable();       // Tingkat Permanensi
    $table->string('resiko_kebakaran')->nullable();         // Resiko Kebakaran
    $table->string('resiko_gempa')->nullable();             // Resiko Gempa
    $table->string('kepadatan_lokasi')->nullable();
      // Kepadatan Lokasi
    $table->string('cadangan1')->nullable();         // Kepadatan Lokasi
    $table->string('cadangan2')->nullable();         // Kepadatan Lokasi
    $table->string('cadangan3')->nullable();         // Kepadatan Lokasi

    // Tambahan standar Laravel
    $table->softDeletes();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('databgklasifikasis');
    }
};
