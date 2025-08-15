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
        Schema::create('bantuangambarinfos', function (Blueprint $table) {
            $table->id();
              $table->text('judul1')->nullable();
            $table->text('judul2')->nullable();
            $table->string('berkas1')->nullable();
            $table->string('berkas2')->nullable();
            $table->string('berkas3')->nullable();
            $table->string('berkas4')->nullable();

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
        Schema::dropIfExists('bantuangambarinfos');
    }
};
