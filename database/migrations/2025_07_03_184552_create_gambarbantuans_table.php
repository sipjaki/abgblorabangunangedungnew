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
            $table->foreignId('user_id')->nullable()->index(); // SUDAH

            $table->foreignId('kecamatanblora_id', 255)->nullable()->index(); // SUDAH
            $table->foreignId('kelurahandesa_id', 255)->nullable()->index(); // SUDAH
            $table->foreignId('jenispermohonangambar_id', 255)->nullable()->index(); // SUDAH
            $table->foreignId('fungsibangunangambar_id', 255)->nullable()->index(); // SUDAH

            $table->string('namapemohon')->nullable(); // SUDAH
            $table->string('email')->nullable(); // SUDAH
            // $table->string('tanggalpermohonan')->nullable();
            $table->string('alamatpemohon')->nullable(); // SUDAH
            $table->string('nomortelepon')->nullable(); // SUDAH
            $table->string('nikktp')->nullable(); // SUDAH
            $table->string('lokasibangunan')->nullable(); // SUDAH
            $table->string('koordinat')->nullable(); // SUDAH
            $table->string('klasifikasibangunan')->nullable(); // SUDAH
            $table->string('luasbangunan')->nullable(); // SUDAH
            $table->string('tinggibangunan')->nullable(); // SUDAH
            $table->string('tanggalpermohonan')->nullable();
            $table->string('jumlahlantai')->nullable(); // SUDAH
            $table->string('peruntukanuntuk')->nullable(); // SUDAH

            $table->string('ktp')->nullable(); // KTP /// SUDAH
            $table->string('npwp')->nullable(); //SURAT PENGAJUAN // SUDAH
            $table->string('lampiranoss')->nullable()   ; // KRK
            $table->string('dokvalidasi')->nullable();  // SURAT SEWA LAHAN
            $table->string('sertifikattanah')->nullable(); //SERTIFIKAT TANAH
            $table->string('buktipbb')->nullable(); // PAJAK BUMI
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


            $table->string('dokumengambar')->nullable();
            $table->string('beritaacarasidang')->nullable(); // uplodan baru
            $table->string('foto1')->nullable(); // uplodan baru
            $table->string('foto2')->nullable(); // uplodan baru
            // $table->string('dokumengambar')->nullable();

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
