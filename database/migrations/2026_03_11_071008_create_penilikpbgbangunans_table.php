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
        Schema::create('penilikpbgbangunans', function (Blueprint $table) {
            $table->id();

            $table->string('notanggalsk')->nullable(); // no registrasi pbg
            $table->string('namapemohon')->nullable(); // nama pemohon
            $table->string('alamatpemohon')->nullable(); // alamat pemohon
            $table->string('fungsibangunan')->nullable(); // fungsi bangunan
            $table->string('lokasibangunan')->nullable(); // lokasi bangunan
            $table->string('keterangan')->nullable(); // keterangan

            $table->string('cadangan1')->nullable(); // tahun terbit 
            $table->string('cadangan2')->nullable();
            $table->string('cadangan3')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilikpbgbangunans');
    }
};
