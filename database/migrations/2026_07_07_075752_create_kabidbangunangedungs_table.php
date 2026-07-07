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
        Schema::create('kabidbangunangedungs', function (Blueprint $table) {
        $table->id();

            $table->string('namalengkap');
            $table->string('jabatan');
            $table->string('nip')->nullable();

            $table->string('tandatangan')->nullable(); // image tanda tangan
            $table->string('capblora')->nullable();    // image cap/stempel blora

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
        Schema::dropIfExists('kabidbangunangedungs');
    }
};
