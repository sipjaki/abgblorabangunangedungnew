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
        Schema::create('bantekanalisainduks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable(); // ATAS NAMA INSTANSI
            $table->string('namagedung')->nullable();
            $table->string('kabupaten')->nullable();
            $table->text('koordinat')->nullable();
            $table->text('alamat')->nullable();
            $table->string('luasbangunan')->nullable();

            // BERKAS PERMOHONAN
            $table->string('kodebarang')->nullable();
            $table->string('suratpermohonan')->nullable();

            // FOTO CADANGAN
            $table->string('fotocadangan1')->nullable();
            $table->string('fotocadangan2')->nullable();
            $table->string('fotocadangan3')->nullable();
            $table->string('fotocadangan4')->nullable();
            $table->string('fotocadangan5')->nullable();

            $table->string('validasiberkas1')->nullable();
            $table->string('validasiberkas2')->nullable();
            $table->string('validasiberkas3')->nullable();
            $table->string('validasiberkas4')->nullable();
            $table->string('validasiberkas5')->nullable();
            $table->string('validasiberkas6')->nullable();

            $table->string('cadangan1')->nullable(); //
            $table->string('cadangan2')->nullable(); //
            $table->string('cadangan3')->nullable(); //
            $table->string('cadangan4')->nullable(); //
            $table->string('cadangan5')->nullable(); //

            $table->softDeletes();
            $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bantekanalisainduks');
    }
};
