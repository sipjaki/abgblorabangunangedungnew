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

    Schema::create('bantekbongkar1s', function (Blueprint $table) {
    $table->id();

    // Relasi induk (tanpa constraint dulu)
    $table->foreignId('bantekpembongkaraninduk_id')->nullable();

    // Nomor surat
    $table->string('nomorsurat')->nullable();

    // File surat pernyataan (PDF)
    $table->string('suratpernyataan')->nullable();

    // Catatan umum
    $table->text('catatan')->nullable();

    // Status verifikasi surat (bebas / nullable)
    $table->string('verifikasisurat')->nullable();

    // Validasi berkas
    $table->string('validasiberkas1')->nullable();

    // Catatan tambahan
    $table->text('catatan1')->nullable();
    $table->text('catatan2')->nullable();
    $table->text('catatan3')->nullable();

    $table->softDeletes();
    $table->timestamps();
});

        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bantekbongkar1s');
    }
};
