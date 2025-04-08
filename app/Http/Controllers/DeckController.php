<?php

namespace App\Http\Controllers;

use App\Domain\Dto\BeDeck;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use Redirect;

class DeckController extends Controller
{
    public function list(Request $req): Response
    {
        return Inertia::render('Decks/DeckList');
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
        $deck = $req->user()->decks()->where('id', $id)->first();

        return Inertia::render('Decks/EditDeck', [
            'deck' => BeDeck::from($deck),
        ]);
    }
}
