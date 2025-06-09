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
        Schema::create('statusbangunangedungs', function (Blueprint $table) {
            $table->id();

            $table->string('strukturatas', 50)->nullable()->index();
            $table->string('rangkaatap', 50)->nullable();
            $table->string('balok', 50)->nullable();
            $table->string('kolom', 50)->nullable();
            $table->string('pondasi', 50)->nullable();
            $table->string('dinding', 50)->nullable();
            $table->string('genteng', 50)->nullable();
            $table->string('plafon', 50)->nullable();
            $table->string('lantai', 50)->nullable();
            $table->string('pintu', 50)->nullable();
            $table->string('jendela', 50)->nullable();

            $table->string('dokumenteknistanah')->nullable();
            $table->string('nohdno')->nullable();
            $table->string('noimb')->nullable();
            $table->string('noslf')->nullable();

            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('statusbangunangedungs');
    }
};
