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
        Schema::create('databangunangedungs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fungsibangunan_id')->nullable()->index();
            $table->foreignId('kepemilikanbangunangedung_id')->nullable()->index();
            $table->foreignId('profiltanahbangunangedung_id')->nullable()->index();
            $table->foreignId('klasifikasibangunangedung_id')->nullable()->index();
            $table->foreignId('datastrukturbangunangedung_id')->nullable()->index();
            $table->foreignId('statusbangunangedung_id')->nullable()->index();
            $table->string('luastanah', 50)->nullable();
            $table->string('namabangunan', 255)->nullable();
            $table->string('alamatbangunan', 255)->nullable();
            $table->string('jumlahlantai', 25)->nullable();
            $table->string('luaslantaidasar', 25)->nullable();
            $table->string('luastotallantaidasargedung', 255)->nullable();
            $table->string('ketinggianbangunan', 255)->nullable();
            $table->string('luasbasement', 255)->nullable();
            $table->text('koordinatbangunan', 255)->nullable();
            $table->text('koordinatbangunan2', 255)->nullable();
            $table->string('tanggalmulaikonstruksi', 255)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('databangunangedungs');
    }
};
