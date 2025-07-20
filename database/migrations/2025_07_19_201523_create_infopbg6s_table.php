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
        Schema::create('infopbg6s', function (Blueprint $table) {
            $table->id();

            $table->string('judul')->nullable();
            $table->string('berkas')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('infolanjut')->nullable();

             $table->string('cadangan1')->nullable();
            $table->string('cadangan2')->nullable();
            $table->string('cadangan3')->nullable();
            $table->string('cadangan4')->nullable();
            $table->string('cadangan5')->nullable();
            $table->string('cadangan6')->nullable();
            $table->string('cadangan7')->nullable();
            $table->string('cadangan8')->nullable();
            $table->string('cadangan9')->nullable();
            $table->string('cadangan10')->nullable();
            $table->string('cadangan11')->nullable();
            $table->string('cadangan12')->nullable();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infopbg6s');
    }
};
