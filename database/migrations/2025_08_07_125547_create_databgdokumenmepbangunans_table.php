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

        Schema::create('databgdokumenmepbangunans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('databgkepemilikan_id')->nullable()->index(); // relasi ke data kepemilikan

            $table->string('dokumen_lampiran_struktur')->nullable();
            $table->string('mpk_rdkt')->nullable();
            $table->string('dokumen_lampiran')->nullable();
            $table->string('penangkal_kebakaran')->nullable();
            $table->string('no_bundel_dok_teknis')->nullable();
            $table->string('daya_listrik')->nullable();
            $table->string('dokumen_instalasi_listrik')->nullable();
            $table->string('instalasi_penangkal_listrik')->nullable();
            $table->string('dokumen_pencahayaan')->nullable();
            $table->string('dokumen_instalasi_komunikasi')->nullable();
            $table->string('instalasi_komunikasi')->nullable();
            $table->string('pengolahan_limbah_domestik')->nullable();
            $table->string('sistem_sanitasi')->nullable();
            $table->string('pengolahan_air_hujan')->nullable();
            $table->string('sistem_drainase')->nullable();
            $table->string('instalasi_gas')->nullable();
            $table->string('dokumen_lampiran_sanitasi')->nullable();
            $table->string('sumber_air')->nullable();
            $table->string('biaya_retribusi')->nullable();
            $table->string('surat_advis_krk')->nullable();
            $table->string('surat_permohonan_imb')->nullable();
            $table->string('surat_permohonan_slf')->nullable();
            $table->string('fotocopy_identitas_pemohon')->nullable();
            $table->string('surat_kuasa_imb')->nullable();
            $table->string('surat_k3')->nullable();
            $table->string('rekomendasi_desa')->nullable();
            $table->string('rekom_kecamatan')->nullable();
            $table->string('surat_kepemilikan_tanah_sewa')->nullable();
            $table->string('copy_sertif_tanah')->nullable();
            $table->string('surat_pajak')->nullable();
            $table->string('sippt')->nullable();
            $table->string('tabel_ceklis_dokumen')->nullable();
            $table->string('tabel_ceklis_teknis')->nullable();
            $table->string('surat_setoran_retribusi_daerah')->nullable();
            $table->string('surat_ketetapan_retribusi_daerah')->nullable();
            $table->string('berita_acara_pemeriksaan')->nullable();

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
        Schema::dropIfExists('databgdokumenmepbangunans');
    }
};
