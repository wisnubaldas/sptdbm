<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        
        $this->app->bind(\App\Domain\ReportDomainInterface::class,\App\Domain\ReportDomain::class);
        $this->app->bind(\App\UseCase\ReportCurrentNowUseCaseInterface::class,\App\UseCase\ReportCurrentNowUseCase::class);
        //:end-bindings:
    }
}
