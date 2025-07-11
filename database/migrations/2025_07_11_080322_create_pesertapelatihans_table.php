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
        Schema::create('pesertapelatihans', function (Blueprint $table) {
            $table->id();
               $table->foreignId('agendapelatihanabg_id')->nullable();
            $table->string('namalengkap')->nullable();
            // nama lengkap
            $table->foreignId('jenjangpendidikan_id')->nullable();
            $table->string('nik')->nullable();
            $table->string('jeniskelamin')->nullable();
            $table->date('tanggallahir')->nullable();
            $table->string('notelepon')->nullable();
            $table->string('instansi')->nullable();
            $table->string('sertifikat')->nullable();
            $table->string('verifikasi')->nullable();
            $table->boolean('verifikasikehadiran')->default(false);
            $table->boolean('terbitkansertifikat')->default(false);

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertapelatihans');
    }
};
