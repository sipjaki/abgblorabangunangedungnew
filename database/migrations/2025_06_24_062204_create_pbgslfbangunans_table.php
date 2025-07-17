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
        Schema::create('pbgslfbangunans', function (Blueprint $table) {
                $table->id();
                $table->foreignId('datapemilik_id')->nullable()->index();
                $table->foreignId('databangunanpbg_id')->nullable()->index();
                $table->foreignId('datatanahpbg_id')->nullable()->index();
                $table->foreignId('dataumumpbg_id')->nullable()->index();
                $table->foreignId('dokumenteknisarsi_id')->nullable()->index();
                $table->foreignId('dokumenteknisstruk_id')->nullable()->index();
                $table->foreignId('dokumenteknismep_id')->nullable()->index();
                $table->foreignId('dokumenteknisslfpbg_id')->nullable()->index();
                $table->foreignId('surattugaspbg_id')->nullable()->index();
                $table->foreignId('tpatpt_id')->nullable()->index();
                $table->foreignId('suratudanganpbg_id')->nullable()->index();
                $table->foreignId('suratpemberitahuanpbg_id')->nullable()->index();
                // $table->foreignId('suratpemberitahuanpbg_id')->nullable()->index();
            $table->foreignId('suratundangan_id')->nullable()->index();
            $table->foreignId('beritaacaraslf_id')->nullable()->index();
            // JENIS PENGAJUAN PBG SLF
            $table->foreignId('jenispengajuanpbgslf_id')->nullable()->index(); // tidad digunakan

            $table->foreignId('user_id')->nullable()->index();
            $table->foreignId('jenispengajuanpbgslfper_id')->nullable()->index();
            // NOMOR REGISTRASI SIM BG
            $table->string('noregissimbg')->nullable();
            $table->string('tanggalpermohonan')->nullable();

            $table->string('namapemohon')->nullable();

            $table->string('validasiberkas1')->nullable();
            $table->string('validasiberkas2')->nullable();
            $table->string('validasiberkas3')->nullable();
            $table->string('validasiberkas4')->nullable();
            $table->string('validasiberkas5')->nullable();
            $table->string('validasiberkas6')->nullable();
            $table->string('validasiberkas7')->nullable();

            $table->string('validasiberkas8')->nullable();
            $table->string('validasiberkas9')->nullable();

            // PERHITUNGAN RETRIBUSI
            $table->integer('rupiah')->nullable();
            $table->string('buktipembayaran')->nullable();
            $table->string('validasiberkas8')->nullable();

            // UPLOAD BERKAS
            $table->string('berkasskrd')->nullable();
            $table->string('validasiberkas9')->nullable();


            // $table->string('validasiberkas1')->nullable();

            // CADANGAN DATABASE YANG AKAN DI LAKUKAN PENGEMBANGAN
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
        Schema::dropIfExists('pbgslfbangunans');
    }
};
