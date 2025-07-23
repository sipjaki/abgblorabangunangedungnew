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
        Schema::create('perjalanandinas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('namapetugas_id')->nullable()->index();
            $table->string('dinasluasdalam')->nullable();
            $table->date('tanggalsuratterbit')->nullable();
            $table->string('maksudperjalanan')->nullable();
            $table->string('angkutan')->nullable();
            $table->string('tempatberangkat')->nullable();
            $table->string('tempattujuan')->nullable();
            $table->string('lamaperjalanan')->nullable();
            $table->date('mulaiperjalanan')->nullable();
            $table->date('selesaiperjalanan')->nullable();
            $table->foreignId('pendamping_id')->nullable();
            $table->foreignId('pendamping2_id')->nullable();
            $table->foreignId('pendamping3_id')->nullable();
            $table->string('ketkegiatan')->nullable();

            $table->string('keteranganba1')->nullable();
            $table->string('keteranganba2')->nullable();
            $table->string('keteranganba3')->nullable();
            $table->string('keteranganba4')->nullable();
            $table->string('keteranganba5')->nullable();
            $table->string('keteranganba6')->nullable();
            $table->string('keteranganba7')->nullable();

            $table->string('berkasberitaacara')->nullable();

            $table->string('cadangan1')->nullable();
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
        Schema::dropIfExists('perjalanandinas');
    }
};
