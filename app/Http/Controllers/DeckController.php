<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Domain\Dto\BeDeck;
use App\Domain\Dto\FeDeck;
use App\Domain\Dto\FeDeckView;
use App\Models\Deck;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;
use Inertia\Response;
use Redirect;

class DeckController extends Controller
{
    public function list(Request $req): Response
    {
        $user = $req->user();

        return Inertia::render('Decks/DeckList', [
            'decks' => fn () => FeDeck::collect($user->decks()->get()),
        ]);
    }

    public function show(Deck $deck): Response
    {
        return Inertia::render('Decks/Show', [

        ]);
    }

    public function create(Request $req): RedirectResponse
    {
        $user = $req->user();

        $deck = DB::transaction(function () use (&$user, &$req) {
            $deck = $user->decks()
                ->create(BeDeck::from($req)->all());

            // create a default deck view
            $view = $deck->views()->create([
                'name' => 'Default',
            ]);

            // create some default categories
            $view->categories()->createMany([
                ['name' => 'Creatures'],
                ['name' => 'Instants'],
                ['name' => 'Sorceries'],
                ['name' => 'Enchantments'],
                ['name' => 'Artifacts'],
                ['name' => 'Planeswalkers'],
                ['name' => 'Lands'],
                ['name' => 'Sideboard'],
                ['name' => 'Other'],
            ]);

            return $deck;
        });

        return Redirect::route('decks.edit', [
            'deck' => $deck->id,
        ]);
    }

    public function edit(Deck $deck): Response
    {
        return Inertia::render('Decks/EditDeck', [
            'deck' => fn () => FeDeck::from($deck),
            'views' => fn () => FeDeckView::collect(
                $deck->views()->get()
            ),
        ]);
    }

    public function update(Deck $deck, Request $req): RedirectResponse
    {
        $deck->update(BeDeck::from($req)->all());

        return Redirect::route('decks.list');
    }
}
