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
        Schema::create('pascapenilikdoks', function (Blueprint $table) {
            $table->id();
              $table->foreignId('penilikbangunan_id')->nullable()->index();
            $table->string('tanggalkegiatan')->nullable();
            $table->string('kegiatan')->nullable();
            $table->string('kegiatanke')->nullable();
            $table->string('uraiankegiatan')->nullable();
            $table->string('catatankegiatan')->nullable();

            $table->date('tanggalmulai')->nullable();
            $table->date('tanggalselesai')->nullable();
            $table->string('hasilinspeksi')->nullable();

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
        Schema::dropIfExists('pascapenilikdoks');
    }
};
