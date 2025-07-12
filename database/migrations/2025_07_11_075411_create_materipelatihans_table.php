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
        Schema::create('materipelatihans', function (Blueprint $table) {
            $table->id();
               $table->foreignId('agendapelatihan_id')->nullable()->index();
            $table->string('judulmateripelatihan')->nullable();
            $table->string('materipelatihan1')->nullable();
            $table->string('materipelatihan2')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materipelatihans');
    }
};
