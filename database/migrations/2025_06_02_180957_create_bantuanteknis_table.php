<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
      public function up()
    {
        Schema::create('bantuanteknis', function (Blueprint $table) {
            $table->id();

            $table->foreignId('asistensibantek_id')->nullable()->index(); // user
            $table->foreignId('ceklapanganbantek_id')->nullable()->index(); // user

            $table->foreignId('bujkkonsultan_id')->nullable()->index(); // user
            // PENGAMBILAN DATA UNTUK KONSULTAN YANG AKAN MENGISI ASISTENSI
            $table->foreignId('pemohon_id')->nullable()->index(); // user
            $table->foreignId('dinas_id')->nullable()->index(); // user

            $table->foreignId('jenispengajuanbantek_id')->nullable()->index(); // sudah

            $table->string('nosurat')->nullable(); // sudah
            $table->string('nosuratdinas')->nullable(); // sudah
            $table->date('tanggalsurat')->nullable(); // sudah
            $table->string('nama_pemohon')->nullable(); // sudah
            $table->string('no_telepon')->nullable(); // sudah

            // NAMA PAKET PEKERJAAN
            $table->string('namapaket')->nullable(); // sudah
            $table->string('kategoribangunan')->nullable(); // sudah
            $table->float('luasbangunan')->nullable(); // sudah
            $table->float('luastanahtotal')->nullable(); // sudah
            $table->integer('jumlahlantai')->nullable(); // sudah
            $table->float('tinggibangunan')->nullable(); // sudah
            $table->boolean('bassement')->nullable(); // diasumsikan true/false
            $table->string('kepemilikan')->nullable(); // sudah
            $table->year('tahunpembangunan')->nullable(); // sudah
            $table->year('tahunrenovasi')->nullable(); // sudah

            $table->string('pengelola')->nullable(); // sudah
            $table->text('alamatlokasi')->nullable(); // sudah
            $table->text('rt')->nullable(); // sudah
            $table->text('rw')->nullable(); // sudah
            $table->text('kabupaten')->nullable(); // sudah
               $table->foreignId('kecamatanblora_id')->nullable()->index();
            $table->foreignId('kelurahandesa_id')->nullable()->index();

            // upload dokumen
            $table->string('suratpermohonan')->nullable();
            $table->string('kic')->nullable();
            $table->string('fotokondisi')->nullable();
            $table->string('rab')->nullable();
            $table->string('asbuilt')->nullable();

            $table->string('uploadsuratbantek')->nullable();

            $table->string('validasisuratpermohonan')->nullable(); // VALIDASI UNTUK BERKAS SURAT PERMOHONAN
            $table->string('validasikic')->nullable(); // VALIDASI UNTUK BERKAS KARTU IDENTITAS BANGUNAN
            $table->string('validasifotokondisi')->nullable(); // VALIDASI UNTUK BERKAS FOTO KONDISI
            $table->string('validasirab')->nullable(); // VALIDASI UNTUK BERKAS FOTO KONDISI
            $table->string('validasiasbuilt')->nullable(); // VALIDASI UNTUK BERKAS FOTO KONDISI

            $table->string('validasiberkas1')->nullable(); // verifikasi pu
            $table->string('validasiberkas2')->nullable(); // cek lapangan
            $table->string('validasiberkas3')->nullable(); // pengolahan data
            $table->string('validasiberkas4')->nullable(); // berkas terbit

            $table->text('catatanvalidasi')->nullable();

            // $table->string('validasi1')->nullable();
            // $table->string('validasi2')->nullable();
            // $table->string('validasi3')->nullable();
            // $table->string('validasi4')->nullable();

            $table->string('cadanganbantek1')->nullable();
            $table->string('cadanganbantek2')->nullable();
            $table->string('cadanganbantek3')->nullable();

            $table->softDeletes();
            $table->timestamps();

            // Opsional: tambahkan foreign key jika dibutuhkan
            // $table->foreign('pemohon_id')->references('id')->on('pemohon');
            // $table->foreign('dinas_id')->references('id')->on('dinas');
            // $table->foreign('jenispengajuanbantek_id')->references('id')->on('jenispengajuanbantek');
            // $table->foreign('kecamatanblora_id')->references('id')->on('kecamatanblora');
            // $table->foreign('kelurahandesa_id')->references('id')->on('kelurahandesa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bantuanteknis');
    }
};
