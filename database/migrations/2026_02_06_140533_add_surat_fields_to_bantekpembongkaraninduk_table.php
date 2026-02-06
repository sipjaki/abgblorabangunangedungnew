<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('bantekpembongkaraninduk', function (Blueprint $table) {

            // =====================
            // SURAT KONSULTASI
            // =====================
            $table->string('nomorsuratkonsul')->nullable()->after('cadangan1');
            $table->date('tanggalsuratkonsul')->nullable();
            $table->string('fotokonsul')->nullable();

            $table->string('fotokonsul1')->nullable();
            $table->string('fotokonsul2')->nullable();
            $table->string('fotokonsul3')->nullable();
            $table->string('fotokonsul4')->nullable();

            // =====================
            // SURAT REKOMENDASI
            // =====================
            $table->string('nomorsuratrekom')->nullable()->after('cadangan2');
            $table->date('tanggalsuratrekom')->nullable();

            // =====================
            // PERSETUJUAN BUPATI
            // =====================
            $table->string('nomorsuratbup')->nullable()->after('cadangan3');
            $table->date('tanggalsuratbup')->nullable();

            // =====================
            // CADANGAN TAMBAHAN
            // =====================
            $table->string('cadangantambahan1')->nullable();
            $table->string('cadangantambahan2')->nullable();
            $table->string('cadangantambahan3')->nullable();
            $table->string('cadangantambahan4')->nullable();
        });
    }

    public function down()
    {
        Schema::table('bantekpembongkaraninduk', function (Blueprint $table) {
            $table->dropColumn([
                'nomorsuratkonsul',
                'tanggalsuratkonsul',
                'fotokonsul',
                'fotokonsul1',
                'fotokonsul2',
                'fotokonsul3',
                'fotokonsul4',
                'nomorsuratrekom',
                'tanggalsuratrekom',
                'nomorsuratbup',
                'tanggalsuratbup',
                'cadangantambahan1',
                'cadangantambahan2',
                'cadangantambahan3',
                'cadangantambahan4',
            ]);
        });
    }
};
