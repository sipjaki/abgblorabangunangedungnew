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
        Schema::create('suratudanganpbgs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pbgslfbangunan_id')->nullable()->index();
            $table->foreignId('datapemilik_id')->nullable()->index();
            $table->foreignId('databangunanpbg_id')->nullable()->index();
            $table->foreignId('tempatkonsultasi_id')->nullable()->index();
            $table->foreignId('tpatpt_id')->nullable()->index();
            $table->string('konsultasike')->nullable();
            $table->string('tanggalundangan')->nullable();
            $table->string('tanggalkehadiran')->nullable();
            $table->string('jamundangan')->nullable();
            $table->string('catatan')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('suratudanganpbgs');
    }
};
