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
        Schema::create('cadangan1s', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kuncibaru_id')->index()->nullable();
            $table->foreignId('kuncibaru1_id')->index()->nullable();
            $table->string('cadangan1')->nullable(); // JUDUL
            $table->string('cadangan2')->nullable(); // KETERANGAN
            $table->string('cadangan3')->nullable(); // BERKAS
            $table->string('cadangan4')->nullable(); // FOTO 1
            $table->string('cadangan5')->nullable(); // FOTO 2
            $table->string('cadangan6')->nullable(); // FOTO 3
            $table->string('cadangan7')->nullable();
            $table->string('cadangan8')->nullable();
            $table->string('cadangan9')->nullable();
            $table->string('cadangan10')->nullable();

            $table->text('catatan1')->nullable();
            $table->text('catatan2')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cadangan1s');
    }
};
