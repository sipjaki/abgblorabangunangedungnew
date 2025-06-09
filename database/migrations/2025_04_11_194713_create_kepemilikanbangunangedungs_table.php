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
        Schema::create('kepemilikanbangunangedungs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('datainstitusibangunangedung_id')->nullable()->index();
            $table->text('alamat')->nullable()->index();
            $table->string('no_telepon')->nullable()->index();
            $table->string('email')->nullable()->index();
            $table->string('nousaha')->nullable()->index();
            $table->string('nohdno')->nullable()->index();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datakepemilikanbangunangedungs');
    }
};
