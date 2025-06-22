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
        Schema::create('banhibahskbupatis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bantuanhibahbg_id')->nullable()->index();
            $table->string('berkas1')->nullable();
            $table->string('berkas2')->nullable();
            $table->string('berkas3')->nullable();
            $table->string('berkas4')->nullable();
            $table->string('berkas5')->nullable();
            $table->string('berkas6')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banhibahskbupatis');
    }
};
