<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::rename('card_decks', 'card_deck');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::rename('card_deck', 'card_decks');

    }
};
