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
        Schema::create('datapemiliks', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('id')->primary();
            
            $table->foreignId('pbgslfbangunan_id')->nullable()->index();
              $table->foreignId('suratpemberitahuanpbg_id')->nullable()->index();
            $table->string('namapemilik')->nullable();
            $table->string('alamatpemilik')->nullable();
            $table->string('nomortelepon')->nullable();
            $table->string('email')->nullable();
            $table->string('noidentitas')->nullable();
            $table->string('pilihancatatan')->nullable();
            $table->text('catatan')->nullable();

            $table->string('cadangan1')->nullable();
            $table->string('cadangan2')->nullable();
            $table->string('cadangan3')->nullable();
            $table->string('cadangan4')->nullable();
            $table->string('cadangan5')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datapemiliks');
    }
};
