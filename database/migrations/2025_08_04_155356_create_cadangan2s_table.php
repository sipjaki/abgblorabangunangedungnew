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


    // DIGUNAKAN UNTUK DATA PENILIK BANGUNAN UNTUK INPUT DATA PEMBONGKARAN BANGUNAN GEDUNG

        Schema::create('cadangan2s', function (Blueprint $table) {
            $table->id();
               $table->foreignId('kuncibaru_id')->index()->nullable();
            $table->foreignId('kuncibaru1_id')->index()->nullable();
            $table->string('cadangan1')->nullable(); // NAMA INSTANSI
            $table->string('cadangan2')->nullable(); // NAMA PEMILIK
            $table->string('cadangan3')->nullable(); // NAMA BANGUNAN
            $table->string('cadangan4')->nullable(); // LOKASI BANGUNAN
            $table->string('cadangan5')->nullable(); // TITIK KOORDINAT
            $table->string('cadangan6')->nullable(); // FUNGSI BANGUNAN
            $table->string('cadangan7')->nullable(); // JUMLAH LANTAI
            $table->string('cadangan8')->nullable(); // LUAS BANGUNAN
            $table->string('cadangan9')->nullable(); // KETERANGAN
            $table->string('cadangan10')->nullable(); // BERKAS DUKUNG

            $table->text('catatan1')->nullable();
            $table->text('catatan2')->nullable();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadangan2s');
    }
};
