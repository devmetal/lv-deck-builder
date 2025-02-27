<?php

namespace App\Http\Controllers;

use App\Domain\Dto\FeCard;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class DashboardController extends Controller
{
    public function show(Request $req): Response
    {
        $user = $req->user();

        $cards = $user->cards()
            ->withMaxPrice('cardmarket')
            ->with('image')
            ->with('faces')
            ->with('faces.image')
            ->limit(20)->get();

        return Inertia::render('Dashboard/Show', [
            'cards' => FeCard::collect($cards),
            'sets' => fn () => Inertia::defer(
                fn () => $user->sets()->get(['id', 'name'])
            ),
        ]);
    }
}
