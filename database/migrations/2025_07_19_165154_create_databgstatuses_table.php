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
        Schema::create('databgstatuses', function (Blueprint $table) {
    $table->id();
    $table->foreignId('databgkepemilikan_id')->nullable()->index();

    // Tambahan kolom sesuai permintaan
    $table->string('dokumen_teknis_tanah')->nullable(); // Dokumen Teknis Tanah
    $table->string('no_hdno')->nullable();              // No. HDNO
    $table->string('no_imbpbg')->nullable();           // No. IMB/PBG
    $table->string('no_slf')->nullable();

    $table->string('cadanga1')->nullable();
    $table->string('cadanga2')->nullable();
                   // No. SLF

    $table->softDeletes();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('databgstatuses');
    }
};
