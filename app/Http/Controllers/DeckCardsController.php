<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Domain\Dto\BeSearch;
use App\Domain\Dto\FeCardPagination;
use App\Domain\Dto\FeDeckCards;
use App\Services\CardSearchService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DeckCardsController extends Controller
{
    public function __construct(
        private readonly CardSearchService $cardSearchService
    ) {}

    public function show(Request $req, int $id): Response
    {
        $user = $req->user();

        $query = BeSearch::from($req);

        return Inertia::render('DeckCards/Show', [
            'query' => fn () => $query,

            'cards' => fn () => FeCardPagination::from(
                $this->cardSearchService
                    ->search($user, $query)
                    ->paginate(16)
                    ->appends($_GET)
            ),

            'deck' => fn () => FeDeckCards::from($user->decks()->find($id)),

            'sets' => fn () => Inertia::defer(
                fn () => $user->sets()->get(['id', 'name'])
            ),
        ]);
    }
}
