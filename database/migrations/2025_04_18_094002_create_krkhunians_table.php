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
        Schema::create('krkhunians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('krkusahaadmin_id')->nullable()->index(); // BELUM DI BUATKAN
            $table->foreignId('krkusahasurat_id')->nullable()->index(); // BELUM DI BUATKAN
            $table->foreignId('kecamatanblora_id', 255)->nullable();
            $table->foreignId('kelurahandesa_id', 255)->nullable();
            $table->string('perorangan', 255)->nullable();
            $table->string('perusahaan', 255)->nullable();
            $table->string('nik', 16)->nullable();
            $table->text('koordinatlokasi')->nullable();
            $table->date('tanggalpermohonan')->nullable();
            $table->string('notelepon')->nullable();
            $table->unsignedInteger('luastanah')->nullable();
            $table->string('jumlahlantai', 10)->nullable();
            $table->string('rt', 10)->nullable();
            $table->string('rw', 10)->nullable();
            $table->string('kabupaten', 255)->nullable();
            $table->text('lokasibangunan')->nullable();
            $table->string('ktp')->nullable();
            // $table->string('npwp')->nullable();
            $table->string('sertifikattanah')->nullable();
            // $table->string('lampiranoss')->nullable();
            $table->string('buktipbb')->nullable();
            $table->string('dokvalidasi')->nullable();
            // $table->string('siteplan')->nullable();
            $table->string('tandatangan')->nullable();
            $table->boolean('is_validated')->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('krkhunians');
    }
};
