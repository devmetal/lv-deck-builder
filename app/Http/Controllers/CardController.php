<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Domain\Dto\BeSearch;
use App\Domain\Dto\FeCard;
use App\Domain\Dto\FeCardPagination;
use App\Services\CardSearchService;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CardController extends Controller
{
    public function __construct(
        private readonly CardSearchService $cardSearchService
    ) {}

    public function list(Request $req): Response
    {
        $user = $req->user();

        $query = BeSearch::from($req);

        $cards = $this->cardSearchService
            ->search($user, $query)
            ->paginate(16)
            ->appends($_GET);

        return Inertia::render('Cards/List', [
            'query' => fn () => $query,
            'cards' => fn () => FeCard::collect($cards->items()),
            'pagination' => fn () => FeCardPagination::from($cards),
            'sets' => fn () => Inertia::defer(
                fn () => $user->sets()->get(['id', 'name'])
            ),
        ]);
    }
}
