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
        Schema::create('klasifikasibangunangedungs', function (Blueprint $table) {
            $table->id();
            $table->date('tanggalselesai')->nullable();
            $table->date('tanggalrehab')->nullable();
            $table->string('kompleksitas', 50)->nullable();
            $table->string('tingkatpermanen', 50)->nullable()->index();
            $table->string('resikokebakaran', 50)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klasifikasibangunangedungs');
    }
};
