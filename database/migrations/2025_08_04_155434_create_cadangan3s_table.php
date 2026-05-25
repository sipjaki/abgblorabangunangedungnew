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


// INI DI GUNAKAN UNTUK ANALISA KERUSAKAN BANGUNAN GEDUNG DENGAN CADANGAN 4

        Schema::create('cadangan3s', function (Blueprint $table) {
            $table->id();
               $table->foreignId('kuncibaru_id')->index()->nullable();
            $table->foreignId('kuncibaru1_id')->index()->nullable();
            $table->string('cadangan1')->nullable(); // NAMA GEDUNG
            $table->string('cadangan2')->nullable(); // KODE BARANG
            $table->string('cadangan3')->nullable(); // ALAMAT
            $table->string('cadangan4')->nullable(); // KABUPATEN/KOTA
            $table->string('cadangan5')->nullable(); // KOORDINAT
            $table->string('cadangan6')->nullable(); // LUAS BANGUNAN
            $table->string('cadangan7')->nullable(); // FOTO 1
            $table->string('cadangan8')->nullable(); // FOTO 2
            $table->string('cadangan9')->nullable(); // FOTO 3
            $table->string('cadangan10')->nullable(); // FOTO 4

            $table->text('catatan1')->nullable(); // NAMA DINAS
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
        Schema::dropIfExists('cadangan3s');
    }
};
