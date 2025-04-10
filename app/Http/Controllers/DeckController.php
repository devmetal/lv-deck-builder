<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Domain\Dto\BeDeck;
use App\Domain\Dto\FeDeck;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Redirect;

class DeckController extends Controller
{
    public function list(Request $req): Response
    {
        $user = $req->user();

        return Inertia::render('Decks/DeckList', [
            'decks' => FeDeck::collect($user->decks()->get()),
        ]);
    }

    public function create(Request $req): RedirectResponse
    {
        $user = $req->user();

        $deck = $user->decks()
            ->create(BeDeck::from($req)->all());

        return Redirect::route('deck.edit', [
            'id' => $deck->id,
        ]);
    }

    public function edit(Request $req, int $id): Response
    {
        $deck = $req->user()->decks()->find($id);

        return Inertia::render('Decks/EditDeck', [
            'deck' => FeDeck::from($deck),
        ]);
    }

    public function update(Request $req, int $id): RedirectResponse
    {
        /**
         * @var \App\Models\Deck
         */
        $deck = $req->user()->decks()
            ->find($id);

        $deck->update(BeDeck::from($req)->all());

        return Redirect::route('deck.list');
    }
}
