<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImportCardsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/import/cards', fn () => Inertia::render('Import/ImportCards'))->name('import.cards');
    Route::post('/import/cards/upload', [ImportCardsController::class, 'upload'])->name('import.cards.upload');
    Route::get('/import/cards/status', [ImportCardsController::class, 'status'])->name('import.cards.status');

    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
});

require __DIR__.'/auth.php';
