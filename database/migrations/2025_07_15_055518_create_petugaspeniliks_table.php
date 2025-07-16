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
        Schema::create('petugaspeniliks', function (Blueprint $table) {
            $table->id();
            $table->string('namalengkap')->nullable()->index();
            $table->string('nip')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('golongan1')->nullable();
            $table->string('skpenilik')->nullable();
            $table->string('golongan2')->nullable();

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
        Schema::dropIfExists('petugaspeniliks');
    }
};
