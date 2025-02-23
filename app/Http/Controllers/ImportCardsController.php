<?php

namespace App\Http\Controllers;

use App\Http\Requests\CsvFileImportRequest;
use App\Jobs\ProcessImportedCard;
use Illuminate\Contracts\Filesystem\FileNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ImportCardsController extends Controller
{
    /**
     * @throws FileNotFoundException
     */
    public function upload(CsvFileImportRequest $request): RedirectResponse
    {
        $ids = $request->getScryIdsFromFile();

        $ids->each(
            fn ($id) => ProcessImportedCard::dispatch($id, $request->user())
        );

        return Redirect::route('import.cards.status');
    }

    public function status(): Response
    {
        return Inertia::render('Import/ImportProgress');
    }
}
