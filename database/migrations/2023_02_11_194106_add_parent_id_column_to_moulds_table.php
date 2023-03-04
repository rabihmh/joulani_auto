<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::table('moulds', function (Blueprint $table) {
            $table->foreignId('parent_id')
                ->after('made_id')
                ->nullable()
                ->constrained('moulds', 'id')
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('moulds', function (Blueprint $table) {
            $table->dropColumn('parent_id');
        });
    }
};
