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
            \App\UseCase\MasterDataUseCaseInterface::class,
            \App\UseCase\MasterDataUseCase::class
        );
        $this->app->singleton(
            \App\UseCase\ImportGateInOutUseCaseInterface::class,
            \App\UseCase\ImportGateInOutUseCase::class
        );
        $this->app->singleton(
            \App\UseCase\ExportGateInOutUseCaseInterface::class,
            \App\UseCase\ExportGateInOutUseCase::class
        );
        $this->app->singleton(
            \App\UseCase\TpsPdfUseCaseInterface::class,
            \App\UseCase\TpsPdfUseCase::class
        );
        $this->app->singleton(
            \App\UseCase\DashboardUseCaseInterface::class,
            \App\UseCase\DashboardUseCase::class
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
