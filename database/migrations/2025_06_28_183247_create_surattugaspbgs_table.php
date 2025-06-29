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
        Schema::create('surattugaspbgs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pbgslfbangunan_id');
            $table->foreignId('datapemilik_id');
            $table->foreignId('fasilitatorpbg_id');
            $table->string('nomorsurat')->nullable();
            $table->string('nomorkontrak')->nullable();
            $table->date('tanggaltugas')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('surattugaspbgs');
    }
};
