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
        Schema::create('suratpemberitahuanpbgs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('pbgslfbangunan_id')->nullable()->index();

            $table->foreignId('datapemilik_id')->nullable()->index();
            $table->foreignId('databangunanpbg_id')->nullable()->index();
            $table->foreignId('datatanahpbg_id')->nullable()->index();
            $table->foreignId('dataumumpbg_id')->nullable()->index();
            $table->foreignId('dokumenteknisarsi_id')->nullable()->index();
            $table->foreignId('dokumenteknisstruk_id')->nullable()->index();
            $table->foreignId('dokumenteknismep_id')->nullable()->index();
            $table->foreignId('dokumenteknisslfpbg_id')->nullable()->index();

            $table->string('tanggalpemberitahuan')->nullable();
            $table->string('pemberitahuanke')->nullable();
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
        Schema::dropIfExists('suratpemberitahuanpbgs');
    }
};
