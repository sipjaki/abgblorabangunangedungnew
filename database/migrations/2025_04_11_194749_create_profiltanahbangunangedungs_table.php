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
        Schema::create('profiltanahbangunangedungs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('statushaktanahbangunangedung_id')->nullable()->index();
            $table->string('statuskepemilikan', 50)->nullable()->index();
            $table->string('nobuktitanah', 50)->nullable()->index();
            $table->text('alamat')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiltanahbangunangedungs');
    }
};
