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
        Schema::create('card_decks', function (Blueprint $table) {
            $table->foreignId('card_id')
                ->constrained()
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreignId('deck_id')
                ->constrained()
                ->onDelete('cascade')
                ->onDelete('cascade');

            $table->smallInteger('column')->default(0);
            $table->smallInteger('row')->default(0);

            $table->unique(['card_id', 'deck_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_decks');
    }
};
