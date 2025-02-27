<?php

namespace App\Http\Controllers;

use App\Domain\Dto\BeSearch;
use App\Domain\Dto\FeCard;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class CardController extends Controller
{
    public function list(Request $req): Response
    {
        /** @var User */
        $user = $req->user();

        $query = BeSearch::from($req);

        $cards = $user->cards()
            ->when($query->term, function (Builder $builder, $term) {
                $builder->where(function (Builder $builder) use (&$term) {
                    $builder
                        ->whereFullText(['name', 'type_line'], $term)
                        ->orWhereFullText(['name', 'type_line', 'oracle_text'], $term);
                });
            })
            ->when($query->colors, function (Builder $builder, $colors) {
                if (in_array('C', $colors)) {
                    $builder->whereJsonLength('colors', '=', 0);
                } else {
                    $builder
                        ->whereJsonLength('colors', '=', count($colors))
                        ->whereJsonContains('colors', $colors);
                }
            })
            ->when($query->setId, function (Builder $builder, string $setId) {
                $builder->where('set_id', $setId);
            })
            ->withMaxPrice('cardmarket')
            ->with('image')
            ->with('faces')
            ->with('faces.image')
            ->get();

        return Inertia::render('Cards/List', [
            'query' => fn () => $query,
            'cards' => fn () => FeCard::collect($cards),
            'sets' => fn () => Inertia::defer(
                fn () => $user->sets()->get(['id', 'name'])
            ),
        ]);
    }
}
