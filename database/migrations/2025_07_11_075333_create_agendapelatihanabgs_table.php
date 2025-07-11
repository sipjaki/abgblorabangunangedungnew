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
        Schema::create('agendapelatihanabgs', function (Blueprint $table) {
            // $table->foreignId('pesertapelatihan_id')->nullable();
            // $table->foreignId('jampelajaran_id')->nullable();
            $table->id();
               // -------------------------------------------------------------------------
            $table->foreignId('materipelatihan_id')->nullable();
            $table->foreignId('kategoripelatihan_id')->nullable();
            $table->foreignId('user_id')->nullable();
            // -------------------------------------------------------------------------
            $table->string('namakegiatan')->nullable();
            // $table->foreignId('asosiasimasjaki_id')->nullable();
            $table->date('penutupan')->nullable();
            $table->date('waktupelaksanaan')->nullable();
            $table->integer('jumlahpeserta')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('keterangan')->nullable();
            $table->text('isiagenda')->nullable();
            $table->string('foto')->nullable();
            $table->string('barcodepelatihan')->nullable();
            $table->string('suratundangan')->nullable(); // ini belm di masukan ke dalam create dan update dan show
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendapelatihanabgs');
    }
};
