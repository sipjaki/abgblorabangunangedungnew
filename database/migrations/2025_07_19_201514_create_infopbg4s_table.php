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
        Schema::create('infopbg4s', function (Blueprint $table) {
            $table->id();

            $table->string('judul')->nullable();
            $table->string('berkas')->nullable();
             $table->text('keterangan')->nullable();
            $table->text('infolanjut')->nullable();

            $table->text('cadangan1')->nullable();
            $table->text('cadangan2')->nullable();
            $table->text('cadangan3')->nullable();
            $table->text('cadangan4')->nullable();
            $table->text('cadangan5')->nullable();
            $table->text('cadangan6')->nullable();
            $table->text('cadangan7')->nullable();
            $table->text('cadangan8')->nullable();
            $table->text('cadangan9')->nullable();
            $table->text('cadangan10')->nullable();
            $table->text('cadangan11')->nullable();
            $table->text('cadangan12')->nullable();

            $table->softDeletes();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('infopbg4s');
    }
};
