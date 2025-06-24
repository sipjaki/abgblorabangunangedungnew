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
            $table->foreignId('user_id')->nullable()->index();
            $table->foreignId('datapemilik_id')->nullable()->index();
            $table->foreignId('databangunan_id')->nullable()->index();
            $table->foreignId('datatanah_id')->nullable()->index();
            $table->foreignId('dataumum_id')->nullable()->index();
            $table->foreignId('dokumenteknis_id')->nullable()->index();
            $table->foreignId('suratpemberitahuan_id')->nullable()->index();
            $table->foreignId('tpatpt_id')->nullable()->index();
            $table->foreignId('suratundangan_id')->nullable()->index();
            $table->foreignId('beritaacaraslf_id')->nullable()->index();
            // JENIS PENGAJUAN PBG SLF
            $table->foreignId('jenispengajuanpbgslf_id')->nullable()->index();

            // NOMOR REGISTRASI SIM BG
            $table->string('noregissimbg')->nullable();

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
