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
        Schema::create('databgtanahs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('databgkepemilikan_id')->nullable()->index();
            $table->string('statushaktanah')->nullable();
            $table->string('statuskepemilikan')->nullable();
            $table->string('nobuktikepemilikan')->nullable();
            $table->string('alamattanah')->nullable();

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
        Schema::dropIfExists('databgtanahs');
    }
};
