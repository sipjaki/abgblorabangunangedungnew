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
        Schema::create('fotobongkarlaps', function (Blueprint $table) {
            $table->id();

            $table->foreignId('bantekpembongkaraninduk_id')->nullable();
                    // DATA UTAMA
                    $table->string('lokasi')->nullable();
                    $table->string('namabangunan')->nullable();
                    $table->text('keterangan')->nullable();
                    $table->date('tanggal')->nullable();

                    // FOTO DOKUMENTASI
                    $table->string('foto1')->nullable();
                    $table->string('foto2')->nullable();
                    $table->string('foto3')->nullable();
                    $table->string('foto4')->nullable();
                    $table->string('foto5')->nullable();
                    $table->string('foto6')->nullable();
                    $table->string('foto7')->nullable();
                    $table->string('foto8')->nullable();

                    // CADANGAN / FIELD TAMBAHAN
                    $table->string('cadangan1')->nullable();
                    $table->string('cadangan2')->nullable();
                    $table->string('cadangan3')->nullable();

                    // SOFT DELETE & TIMESTAMP
                    $table->softDeletes();
                    $table->timestamps();
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fotobongkarlaps');
    }
};
