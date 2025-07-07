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
        Schema::create('bglapangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gambarbantuan_id')->nullable()->index();
            $table->string('kegiatan')->nullable();
            $table->date('tanggalkegiatan')->nullable();
            $table->string('berkasdukung1')->nullable();
            $table->string('berkasdukung2')->nullable();
            $table->string('foto1')->nullable();
            $table->string('foto2')->nullable();
            $table->string('foto3')->nullable();
            $table->string('foto4')->nullable();
            $table->string('foto5')->nullable();
            $table->string('foto6')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bglapangans');
    }
};
