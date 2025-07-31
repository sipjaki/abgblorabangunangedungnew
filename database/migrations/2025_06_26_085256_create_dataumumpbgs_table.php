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
        Schema::create('dataumumpbgs', function (Blueprint $table) {
            // $table->id();
            $table->unsignedBigInteger('id')->primary();

            $table->foreignId('suratpemberitahuanpbg_id')->nullable()->index();
                $table->foreignId('pbgslfbangunan_id')->nullable()->index();
                $table->string('berkas1')->nullable();
                $table->string('berkas2')->nullable();
                $table->string('berkas3')->nullable();
                $table->string('berkas4')->nullable();
                $table->string('berkas5')->nullable();

                $table->string('catatanberkas1')->nullable();
                $table->string('catatanberkas2')->nullable();
                $table->string('catatanberkas3')->nullable();
                $table->string('catatanberkas4')->nullable();
                $table->string('catatanberkas5')->nullable();


                $table->string('pilihancatatan')->nullable();
                $table->text('catatan')->nullable();

                $table->string('berkas6')->nullable();
                $table->string('berkas7')->nullable();
                $table->string('berkas8')->nullable();

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
        Schema::dropIfExists('dataumumpbgs');
    }
};
