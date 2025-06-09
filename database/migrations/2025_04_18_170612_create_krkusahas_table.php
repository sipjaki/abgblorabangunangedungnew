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
        Schema::create('krkusahas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('krkusahasurat_id')->nullable()->index(); // PEMOHON
            $table->foreignId('user_id')->nullable()->index(); // PEMOHON
            $table->foreignId('kecamatanblora_id', 255)->nullable()->index();
            $table->foreignId('kelurahandesa_id', 255)->nullable()->index();
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
            $table->string('npwp')->nullable();
            $table->string('sertifikattanah')->nullable();
            $table->string('lampiranoss')->nullable();
            $table->string('buktipbb')->nullable();
            $table->string('dokvalidasi')->nullable();
            $table->string('siteplan')->nullable();
            $table->string('tandatangan')->nullable();
            $table->boolean('is_validated')->default(false);

            // untuk verivikasi berkas
            $table->string('verifikasi1')->nullable();
            $table->string('verifikasi2')->nullable();
            $table->string('verifikasi3')->nullable();
            $table->string('verifikasi4')->nullable();
            // untuk cadangan data
            $table->string('cadangankrkusaha1')->nullable();
            $table->string('cadangankrkusaha2')->nullable();
            $table->string('cadangankrkusaha3')->nullable();
            $table->string('cadangankrkusaha4')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('krkusahas');
    }
};
