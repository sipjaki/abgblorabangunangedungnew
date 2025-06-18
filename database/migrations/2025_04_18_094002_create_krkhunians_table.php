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
            $table->foreignId('krkusahasurat_id')->nullable()->index(); // PEMOHON
            $table->foreignId('krkhuniancek_id')->nullable()->index(); // PEMOHON
            $table->foreignId('user_id')->nullable()->index(); // PEMOHON
            $table->foreignId('kecamatanblora_id', 255)->nullable()->index();
            $table->foreignId('kelurahandesa_id', 255)->nullable()->index();
            $table->string('nomordinasasal', 255)->nullable(); // nomor dinas asal
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
            $table->text('alamatpemohon')->nullable();
            $table->string('suratupload')->nullable();
            // berkas yang di upload
            $table->string('ktp')->nullable();
            // $table->string('npwp')->nullable();
            $table->string('sertifikattanah')->nullable();
            // $table->string('lampiranoss')->nullable();
            $table->string('buktipbb')->nullable();
            $table->string('dokvalidasi')->nullable();
            // $table->string('siteplan')->nullable();
            $table->string('tandatangan')->nullable();

            $table->string('verifikasiktp')->nullable();
            // $table->string('verifikasinpwp')->nullable();
            $table->string('verifikasisert')->nullable();
            // $table->string('verifikasioss')->nullable();
            $table->string('verifikasipbb')->nullable();
            $table->string('verifikasidokval')->nullable();
            // $table->string('verifikasisiteplan')->nullable();
            $table->string('verifikasittd')->nullable();

            $table->text('catatanvalidasi')->nullable();


            $table->boolean('is_validated')->default(false);

            // untuk verivikasi berkas
            $table->string('verifikasi1')->nullable();
            $table->string('verifikasi2')->nullable();
            $table->string('verifikasi3')->nullable();
            $table->string('verifikasi4')->nullable();
            // untuk cadangan data
            $table->string('cadangankrkhunian1')->nullable();
            $table->string('cadangankrkhunian2')->nullable();
            $table->string('cadangankrkhunian3')->nullable();
            $table->string('cadangankrkhunian4')->nullable();
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
