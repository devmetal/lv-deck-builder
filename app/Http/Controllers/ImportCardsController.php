<?php

namespace App\Http\Controllers;

use App\Jobs\ProcessImportedCard;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rules\File;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

class ImportCardsController extends Controller
{
    public function upload(Request $request): RedirectResponse
    {
        $request->validate([
            'file' => ['required', File::types('text/csv')->max(12 * 1024)],
        ]);

        $csv = $request->file('file')->get();

        $lines = array_filter(
            explode(PHP_EOL, $csv),
            fn ($line) => strlen($line) > 0
        );

        if (count($lines) <= 1) {
            throw ValidationException::withMessages([
                'file' => ['Csv file has to be a header'],
            ]);
        }

        $header = collect(str_getcsv(array_shift($lines)));

        collect($lines)
            ->map(fn ($row) => $header->combine(str_getcsv($row)))
            ->map(fn ($row) => $row['scry_id'])
            ->each(
                fn ($id) => ProcessImportedCard::dispatch($id, $request->user())
            );

        return Redirect::route('import.cards.status');
    }

    public function status(): Response
    {
        return Inertia::render('Import/ImportProgress');
    }
}
