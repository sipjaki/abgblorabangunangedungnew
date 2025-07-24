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
        Schema::create('kicdokumens', function (Blueprint $table) {
            $table->id();

            $table->foreignId('kicinduk_id')->nullable()->index();
            $table->string('jenisbarang')->nullable();
            $table->string('kodebarang')->nullable();
            $table->string('register')->nullable();
            $table->string('kondisibangunan')->nullable();
            $table->string('bertingkat')->nullable(); // true = ya, false = tidak
            $table->string('beton')->nullable(); // true = ya, false = tidak
            $table->string('luaslantai')->nullable(); // Luas lantai dalam m²
            $table->text('alamat')->nullable();


            $table->string('tanggal')->nullable();
            $table->string('nomor')->nullable();
            $table->string('luas')->nullable(); // dalam m²
            $table->string('status_tanah')->nullable();
            $table->string('nomor_kode_tanah')->nullable();
            $table->string('asal_usul')->nullable();
            $table->string('harga')->nullable();
            $table->text('keterangan')->nullable();
            $table->text('nosertifikat')->nullable();


            $table->text('cadangan1')->nullable();
            $table->text('cadangan2')->nullable();
            $table->text('cadangan3')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kicdokumens');
    }
};
