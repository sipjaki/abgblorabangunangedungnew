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
        Schema::create('rencanagsbbloras', function (Blueprint $table) {
            $table->id();
            $table->string('ruasjalan')->nullable()->index();
            $table->string('jenisjalan')->nullable()->index();
            $table->float('gsb')->nullable()->index();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rencanagsbbloras');
    }
};
