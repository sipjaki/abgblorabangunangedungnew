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
        Schema::create('datastrukturbangunangedungs', function (Blueprint $table) {
            $table->id();
            $table->string('zona', 50)->nullable();
            $table->string('jenis_tanah', 25)->nullable();
            $table->string('tipe_fondasi', 25)->nullable();
            $table->string('bahan_fondasi', 25)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datastrukturbangunangedungs');
    }
};
