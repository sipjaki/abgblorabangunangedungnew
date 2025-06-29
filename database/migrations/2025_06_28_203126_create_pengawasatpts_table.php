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
        Schema::create('pengawasatpts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tpatpt_id')->nullable()->index();
            $table->string('nosk')->nullable();
            $table->string('status')->nullable();
            $table->string('namalengkap')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengawasatpts');
    }
};
