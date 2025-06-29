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
        Schema::create('tpatpts', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('id')->primary();
            $table->foreignId('pbgslfbangunan_id')->nullable()->index();
            $table->string('timpenilai')->nullable();
            $table->string('nosk')->nullable();
            $table->foreignId('pengawas1_id')->nullable();
            $table->foreignId('pengawas2_id')->nullable();
            $table->foreignId('pengawas3_id')->nullable();
            $table->foreignId('pengawas4_id')->nullable();
            $table->foreignId('pengawas5_id')->nullable();
            $table->foreignId('pengawas6_id')->nullable();
            $table->foreignId('pengawas7_id')->nullable();

            $table->string('cadangan1')->nullable();
            $table->string('cadangan2')->nullable();
            // $table->foreignId('pengawas7_id')->nullable();
            // $table->foreignId('pengawas8_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tpatpts');
    }
};
