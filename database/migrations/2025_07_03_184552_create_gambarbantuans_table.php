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
        Schema::create('gambarbantuans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kecamatanblora_id', 255)->nullable()->index();
            $table->foreignId('kelurahandesa_id', 255)->nullable()->index();
            $table->foreignId('user_id')->nullable()->index(); // PEMOHON
            $table->foreignId('jenispermohonangambar_id', 255)->nullable()->index();
            $table->foreignId('fungsibangunangambar_id', 255)->nullable()->index();

            $table->string('namapemohon')->nullable();
            $table->string('email')->nullable();
            $table->string('alamatpemohon')->nullable();
            $table->string('nomortelepon')->nullable();
            $table->string('nikktp')->nullable();
            $table->string('lokasibangunan')->nullable();
            $table->string('koordinat')->nullable();
            $table->string('klasifikasibangunan')->nullable();
            $table->string('luasbangunan')->nullable();
            $table->string('tinggibangunan')->nullable();
            $table->string('tanggalpermohonan')->nullable();
            $table->string('jumlahlantai')->nullable();
            $table->string('peruntukanuntuk')->nullable();

            $table->string('dokumengambar')->nullable();

            $table->string('ktp')->nullable(); // KTP
            $table->string('npwp')->nullable(); //SURAT PENGAJUAN
            $table->string('lampiranoss')->nullable()   ; // KRK
            $table->string('sertifikattanah')->nullable(); //SERTIFIKAT TANAH
            $table->string('buktipbb')->nullable(); // PAJAK BUMI
            $table->string('dokvalidasi')->nullable();  // SURAT SEWA LAHAN
            $table->string('siteplan')->nullable(); // NIB
            $table->string('tandatangan')->nullable(); // DOKUMEN KAJIAN TATA RUANG

            $table->string('verifikasiktp')->nullable();
            $table->string('verifikasinpwp')->nullable();
            $table->string('verifikasisert')->nullable();
            $table->string('verifikasioss')->nullable();
            $table->string('verifikasipbb')->nullable();
            $table->string('verifikasidokval')->nullable();
            $table->string('verifikasisiteplan')->nullable();
            $table->string('verifikasittd')->nullable();

            $table->string('verifikasi1')->nullable();
            $table->string('verifikasi2')->nullable();
            $table->string('verifikasi3')->nullable();
            $table->string('verifikasi4')->nullable();

            $table->text('catatanvalidasi')->nullable();

            $table->string('cadangan1')->nullable();
            $table->string('cadangan2')->nullable();
            $table->string('cadangan3')->nullable();
            $table->string('cadangan4')->nullable();



            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gambarbantuans');
    }
};
