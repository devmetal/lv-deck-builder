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
        Schema::table('cards', function (Blueprint $table) {
            $table->fullText('name')->language('english');
            $table->fullText('type_line')->language('english');
            $table->fullText('oracle_text')->language('english');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->dropFullText('name');
            $table->dropFullText('type_line');
            $table->dropFullText('oracle_text');
        });
    }
};
