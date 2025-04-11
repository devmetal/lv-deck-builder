<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Domain\Dto\FeCard;
use App\Domain\Dto\FeDeck;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DeckCardsController extends Controller
{
    public function show(Request $req, int $id): Response
    {
        $deck = $req->user()->decks()->find($id);

        $cards = $deck->cards()->get();

        return Inertia::render('DeckCards/Show', [
            'cards' => fn () => FeCard::collect($cards),
            'deck' => fn () => FeDeck::from($deck),
        ]);
    }
}
