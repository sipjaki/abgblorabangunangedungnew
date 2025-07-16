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
        Schema::create('databgkepemilikans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('datainstitusibangunangedung_id')->nullable();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('tanggalinput')->nullable();
            $table->foreignId('kecamatanblora_id')->nullable()->index();
            $table->string('namainstitusi')->nullable();
            $table->string('alamat')->nullable();
            $table->string('notelepon')->nullable();
            $table->string('email')->nullable();
            $table->string('nopengesahanusaha')->nullable();

            $table->string('tampakdepan')->nullable();
            $table->string('tampakbelakang')->nullable();
            $table->string('tampaksamping1')->nullable();
            $table->string('tampaksamping2')->nullable();

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
        Schema::dropIfExists('databgkepemilikans');
    }
};
