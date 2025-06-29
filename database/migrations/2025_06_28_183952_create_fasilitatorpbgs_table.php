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
        Schema::create('fasilitatorpbgs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surattugaspbg_id')->nullable()->index();
            $table->string('namalengkap')->nullable();
            $table->string('alamat')->nullable();
            $table->string('nik')->nullable();
            $table->string('jabatan')->nullable();

            $table->string('cadangan1')->nullable();
            $table->string('cadangan2')->nullable();
            $table->string('cadangan3')->nullable();

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fasilitatorpbgs');
    }
};
