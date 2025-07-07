<?php

use App\Http\Controllers\DeckCardsController;
use App\Http\Controllers\DeckController;

Route::middleware(['auth'])
    ->prefix('decks')
    ->name('decks.')
    ->group(function () {
        Route::get('/', [DeckController::class, 'list'])
            ->name('list');

        Route::post('/', [DeckController::class, 'create'])
            ->name('create');

        Route::get('/{deck}/edit', [DeckController::class, 'edit'])
            ->name('edit');

        Route::patch('/{deck}', [DeckController::class, 'update'])
            ->name('update');

        Route::get('/{deck}', [DeckController::class, 'show'])
            ->name('show');

        Route::post('{deck}/cards', [DeckCardsController::class, 'addCardToDeck'])
            ->name('cards.add');
    });
