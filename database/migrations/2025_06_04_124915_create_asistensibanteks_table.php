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

    Schema::create('asistensi_banteks', function (Blueprint $table) {
    $table->id();
    $table->foreignId('bantuanteknis_id'); // Nama konsultan
    $table->foreignId('konsultan_id'); // Nama konsultan
    $table->foreignId('dinas_id'); // Nama konsultan
    $table->text('kegiatan'); // Nama kegiatan
    $table->text('keterangan')->nullable(); // Keterangan kegiatan (boleh kosong)
    $table->string('foto')->nullable(); // Path file foto
    $table->string('lembarasistensi')->nullable(); // Path file lembar asistensi
    $table->softDeletes();
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asistensibanteks');
    }
};
