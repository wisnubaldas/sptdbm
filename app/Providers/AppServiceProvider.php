<?php

namespace App\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(
            \App\UseCase\GateInOutDatatablesUseCaseInterface::class,
            \App\UseCase\GateInOutDatatablesUseCase::class
        );
        $this->app->singleton(
            \App\UseCase\MasterDataUseCaseInterface::class,
            \App\UseCase\MasterDataUseCase::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
