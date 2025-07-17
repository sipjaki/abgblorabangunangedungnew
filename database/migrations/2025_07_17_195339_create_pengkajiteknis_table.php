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
        Schema::create('pengkajiteknis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('apapunitu_id')->nullable()->index();
            $table->string('namabadanusaha')->nullable();
            $table->string('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->text('email')->nullable();
            $table->text('direktur')->nullable();
            $table->text('subklasifikasi')->nullable();
            $table->text('pengalaman')->nullable();

            $table->string('cadangan1')->nullable();
            $table->string('cadangan2')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengkajiteknis');
    }
};
