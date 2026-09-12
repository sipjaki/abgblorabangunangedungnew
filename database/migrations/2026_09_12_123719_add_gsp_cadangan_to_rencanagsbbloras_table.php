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
    Schema::table('rencanagsbbloras', function (Blueprint $table) {
        $table->string('gsp')->nullable()->after('gsb');
        $table->string('cadangan1')->nullable()->after('gsp');
        $table->string('cadangan2')->nullable()->after('cadangan1');
        $table->string('cadangan3')->nullable()->after('cadangan2');
        $table->string('cadangan4')->nullable()->after('cadangan3');
    });
}

public function down(): void
{
    Schema::table('rencanagsbbloras', function (Blueprint $table) {
        $table->dropColumn([
            'gsp',
            'cadangan1',
            'cadangan2',
            'cadangan3',
            'cadangan4',
        ]);
    });
}

};
