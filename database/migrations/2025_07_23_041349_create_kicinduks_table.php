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
        Schema::create('kicinduks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('satuankerja_id')->nullable()->index();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('kodelokasi')->nullable();
            $table->string('bidang')->nullable();
            $table->string('subbidang')->nullable();

            $table->string('cadangan1')->nullable();
            $table->string('cadangan2')->nullable();
            $table->string('cadangan3')->nullable();
            $table->string('cadangan4')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kicinduks');
    }
};
