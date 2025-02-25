<?php

namespace App\Http\Controllers;

use App\Domain\Dto\FeCard;
use App\Models\Card;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function show(Request $req): Response
    {
        $user = $req->user();

        $cards = Card::withMaxPrice('cardmarket')
            ->with('image')
            ->with('faces')
            ->with('faces.image')
            ->limit(21)->get();

        return Inertia::render('Dashboard', [
            'cards' => FeCard::collect($cards),
            'sets' => Inertia::defer(
                fn () => $user->sets()->get(['id', 'name'])
            ),
        ]);
    }
}
