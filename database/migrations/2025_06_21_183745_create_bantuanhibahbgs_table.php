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
        Schema::create('bantuanhibahbgs', function (Blueprint $table) {
            $table->id();

            // Foreign keys
            $table->foreignId('banhibahberkas_id')->nullable();
            $table->foreignId('banhibahlapangan_id')->nullable();
            $table->foreignId('banhibahskbupati_id')->nullable();
            $table->foreignId('user_id')->nullable();

            // Data proposal
            $table->string('nomorproposal')->nullable();
            $table->date('tanggalproposal')->nullable();
            $table->string('instansi')->nullable();
            $table->text('intiproposal')->nullable();
            $table->string('narahubung')->nullable();
            $table->string('kontakperson')->nullable();
            $table->string('dokumenproposal')->nullable(); // Simpan path file

            // Status verifikasi
            $table->string('verifikasi1')->nullable();
            $table->string('verifikasi2')->nullable();
            $table->string('verifikasi3')->nullable();
            $table->string('verifikasi4')->nullable();

            // Catatan
            $table->text('cadbantuanhibah1')->nullable();
            $table->text('cadbantuanhibah2')->nullable();
            $table->text('cadbantuanhibah3')->nullable();
            $table->text('cadbantuanhibah4')->nullable();
            $table->text('cadbantuanhibah5')->nullable();

            // $table->text('percobaan')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });

    }

         /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bantuanhibahbgs');
    }
};
