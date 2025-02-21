<?php

namespace App\Providers;

use App\Domain\Mapper\ScryResponseToCardModelMapper;
use App\Domain\Mapper\ScryResponseToFaceModelMapper;
use App\Domain\Mapper\ScryResponseToImageModelMapper;
use App\Domain\Mapper\ScryResponseToSetModelMapper;
use App\Domain\Scry\ScryRepository;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ScryRepository::class, function () {
            return new ScryRepository;
        });

        $this->app->singleton(ScryResponseToCardModelMapper::class, function () {
            return new ScryResponseToCardModelMapper;
        });

        $this->app->singleton(ScryResponseToImageModelMapper::class, function () {
            return new ScryResponseToImageModelMapper;
        });

        $this->app->singleton(ScryResponseToSetModelMapper::class, function () {
            return new ScryResponseToSetModelMapper;
        });

        $this->app->singleton(ScryResponseToFaceModelMapper::class, function () {
            return new ScryResponseToFaceModelMapper;
        });
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Vite::prefetch(concurrency: 3);
    }
}
