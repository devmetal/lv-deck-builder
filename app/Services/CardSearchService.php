<?php

declare(strict_types=1);

namespace App\Services;

use App\Domain\Dto\BeSearch;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;

class CardSearchService
{
    /**
     * @return Collection<\App\Models\Card>
     */
    public function search(User $user, BeSearch $query): Collection
    {
        $term = $query->term;
        $setId = $query->setId;
        $colors = $query->colors;

        return $user->cards()
            ->when($term, $this->addFullTextSearchToQuery(...))
            ->when($colors, $this->addColorsFilterToQuery(...))
            ->when($setId, $this->addSetIdFilterToQuery(...))
            ->withMaxPrice('cardmarket')
            ->with('faces.image')
            ->with('image')
            ->get();
    }

    private function addFullTextSearchToQuery(Builder $builder, string $term): void
    {
        $builder->where(
            function (Builder $group) use (&$term) {
                $group
                    ->whereFullText(['name', 'type_line'], $term)
                    ->orWhereFullText(['name', 'type_line', 'oracle_text'], $term);
            }
        );
    }

    private function addColorsFilterToQuery(Builder $builder, array $colors): void
    {
        if (! is_null($colors) && in_array('C', $colors)) {
            $colors = [];
        }

        $builder
            ->whereJsonLength('colors', '=', count($colors))
            ->whereJsonContains('colors', $colors);
    }

    private function addSetIdFilterToQuery(Builder $builder, string $setId): void
    {
        $builder->where('set_id', $setId);
    }
}
