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

        Schema::create('bantekpembongkarannew1s', function (Blueprint $table) {
    $table->id();

    // Relasi Induk
    $table->foreignId('bantekpembongkaraninduk_id')->nullable();

    /* =========================
     * DATA SURAT PERMOHONAN
     * ========================= */
    $table->string('nosurat')->nullable();
    $table->date('tanggalsurat')->nullable();
    $table->string('suratpermohonan')->nullable();
    $table->string('validasiberkas1')->nullable();
    $table->text('catatan1')->nullable();

    /* =========================
     * DATA BANGUNAN (AWAL)
     * ========================= */
    $table->string('namabangunan')->nullable();
    $table->string('pilihanbangunan')->nullable();
    $table->string('suratkelayakan')->nullable();
    $table->string('validasiberkas2')->nullable();
    $table->text('catatan2')->nullable();

    /* =========================
     * SURAT KESANGGUPAN
     * ========================= */
    $table->string('pilihansanggup')->nullable();
    $table->string('suratkesanggupan')->nullable();
    $table->string('validasiberkas3')->nullable();
    $table->text('catatan3')->nullable();

    /* =========================
     * DATA PEMILIK
     * ========================= */
    $table->string('namalengkap')->nullable();
    $table->string('jabatan')->nullable();
    $table->text('alamatpemilik')->nullable();
    $table->string('notelepon')->nullable();
    $table->string('ktp')->nullable();
    $table->string('validasiberkas4')->nullable();
    $table->text('catatan4')->nullable();

    $table->string('sk')->nullable();
    $table->string('validasiberkas5')->nullable();
    $table->text('catatan5')->nullable();

    /* =========================
     * DATA TANAH
     * ========================= */
    $table->decimal('luastanah', 12, 2)->nullable();
    $table->string('statustanah')->nullable();
    $table->string('namapemeganghak')->nullable();
    $table->string('sertifikattanah')->nullable();
    $table->string('validasiberkas6')->nullable();
    $table->text('catatan6')->nullable();

    /* =========================
     * DATA TEKNIS BANGUNAN
     * ========================= */
    $table->string('legalitasbangunan')->nullable();
    $table->string('nomorpbg')->nullable();
    $table->string('pemilikbangunan')->nullable();
    $table->string('kodebarang')->nullable();
    $table->text('alamatbangunan')->nullable();
    $table->string('koordinatbangunan')->nullable();
    $table->string('fungsibangunan')->nullable();
    $table->integer('jumlahlantai')->nullable();
    $table->decimal('ketinggianbangunan', 8, 2)->nullable();
    $table->decimal('luasbangunan', 12, 2)->nullable();
    $table->string('kompleksitasbangunan')->nullable();
    $table->string('tingkatpermanensi')->nullable();
    $table->string('kepadatan')->nullable();
    $table->date('tanggaldibangun')->nullable();
    $table->date('tanggalrevovasi')->nullable();
    $table->decimal('nilaibangunanbaru', 15, 2)->nullable();
    $table->decimal('nilaibangunanlama', 15, 2)->nullable();

    /* =========================
     * KIB
     * ========================= */
    $table->string('kib')->nullable();
    $table->string('validasiberkas7')->nullable();
    $table->text('catatan7')->nullable();

    /* =========================
     * DATA PBG
     * ========================= */
    $table->string('apakahadapbg')->nullable();
    $table->string('pbg')->nullable();
    $table->string('validasiberkas8')->nullable();
    $table->text('catatan8')->nullable();

    /* =========================
     * CADANGAN
     * ========================= */
    $table->string('cadangan1')->nullable();
    $table->string('cadangan2')->nullable();
    $table->string('cadangan3')->nullable();
    $table->string('cadangan4')->nullable();
    $table->string('cadangan5')->nullable();

    $table->softDeletes();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bantekpembongkarannew1s');
    }
};
