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
        Schema::create('databangunanpbgs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pbgslfbangunan_id')->nullable()->index();
            $table->foreignId('jenisperkonsultasi_id')->nullable()->index();
            $table->string('namabangunan')->nullable();
            $table->string('lokasibangunan')->nullable();
            $table->string('klasifikasibangunan')->nullable();
            $table->foreignId('fungsibangunanpbg_id')->nullable();
            $table->string('luasbangunan')->nullable();
            // DATA BANGUNAN
            $table->string('jenispermohonan')->nullable();
            $table->string('fungsibangunan')->nullable();
            $table->string('tinggibangunan')->nullable();
            $table->string('jumlahlantai')->nullable();
            $table->string('internsitasbangunan')->nullable();

            $table->string('pilihancatatan')->nullable();
            $table->text('catatan')->nullable();

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
        Schema::dropIfExists('databangunanpbgs');
    }
};
