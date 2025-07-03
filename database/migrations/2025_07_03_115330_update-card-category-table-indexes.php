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
        Schema::table('card_category', function (Blueprint $table) {
            $table->dropPrimary(['card_id', 'category_id']);
            $table->id();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('card_category', function (Blueprint $table) {
            $table->dropColumn('id');
            $table->primary(['card_id', 'category_id']);
        });
    }
};
