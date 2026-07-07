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
        Schema::table('bantekanalisanew1s', function (Blueprint $table) {

            $table->foreignId('kabidbangunangedung_id')
                ->nullable()
                ->after('tanggalterbit');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bantekanalisanew1s', function (Blueprint $table) {

            $table->dropColumn('kabidbangunangedung_id');

        });
    }
};
