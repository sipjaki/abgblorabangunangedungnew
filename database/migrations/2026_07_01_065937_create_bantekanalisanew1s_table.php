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
        Schema::create('bantekanalisanew1s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bantekanalisainduk_id')->nullable();

            // PONDASI
            $table->string('nilaipondasi')->nullable(); //
            $table->string('fotopondasi1')->nullable(); //
            $table->string('fotopondasi2')->nullable(); //

            // STRUKTUR
            $table->string('nilaistruktur')->nullable(); //
            $table->string('fotostruktur1')->nullable(); //
            $table->string('fotostruktur2')->nullable(); //

            // ATAP
            $table->string('nilaiatap')->nullable(); //
            $table->string('fotoatap1')->nullable(); //
            $table->string('fotoatap2')->nullable(); //

            // LANTAI
            $table->string('nilailantai')->nullable(); //
            $table->string('fotolantai1')->nullable(); //
            $table->string('fotolantai2')->nullable(); //

            // DINDING
            $table->string('nilaidinding')->nullable(); //
            $table->string('fotodinding1')->nullable(); //
            $table->string('fotodinding2')->nullable(); //

            // PLAFON
            $table->string('nilaiplafon')->nullable(); //
            $table->string('fotoplafon1')->nullable(); //
            $table->string('fotoplafon2')->nullable(); //

            // UTILITAS
            $table->string('nilaiutilitas')->nullable(); //
            $table->string('fotoutilitas1')->nullable(); //
            $table->string('fotoutilitas2')->nullable(); //

            // FINISHING
            $table->string('nilaifinishing')->nullable(); //
            $table->string('fotofinishing1')->nullable(); //
            $table->string('fotofinishing2')->nullable(); //

            $table->foreignId('kepaladinas_id')->nullable(); // KEPALA DINAS

            $table->foreignId('timsurvey1_id')->nullable(); // PETUGAS DINAS
            $table->foreignId('timsurvey2_id')->nullable(); // PETUGAS DINAS
            $table->foreignId('timsurvey3_id')->nullable(); // PETUGAS DINAS
            $table->foreignId('timsurvey4_id')->nullable(); // PETUGAS DINAS


            $table->date('tanggalterbit')->nullable(); //

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
        Schema::dropIfExists('bantekanalisanew1s');
    }
};
