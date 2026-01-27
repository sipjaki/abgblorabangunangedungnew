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
        Schema::create('bantekpembongkaraninduk', function (Blueprint $table) {
            $table->id();
            $table->string('namapemilik')->nullable();
            $table->foreignId('user_id')->nullable(); // as instansi
            $table->string('namabangunan')->nullable();
            $table->string('alamat')->nullable();
            $table->string('keterangan')->nullable();

            $table->string('validasiberkas1')->nullable();
            $table->string('validasiberkas2')->nullable();
            $table->string('validasiberkas3')->nullable();
            $table->string('validasiberkas4')->nullable();
            $table->string('validasiberkas5')->nullable();
            $table->string('validasiberkas6')->nullable();

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
        Schema::dropIfExists('bantekpembongkaraninduk');
    }
};
