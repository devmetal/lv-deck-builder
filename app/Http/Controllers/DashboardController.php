<?php

namespace App\Http\Controllers;

use App\Domain\Dto\FeCard;
use App\Models\Card;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function show(): Response
    {
        $cards = Card::withMaxPrice('cardmarket')
            ->with('image')
            ->with('faces')
            ->with('faces.image')
            ->limit(21)->get();

        return Inertia::render('Dashboard', [
            'cards' => FeCard::collect($cards),
        ]);
    }
}
