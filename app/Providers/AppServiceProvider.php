<?php

declare(strict_types=1);

namespace App\Providers;

use Carbon\CarbonImmutable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Vite;
use Illuminate\Support\ServiceProvider;

final class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->configureCommands();
        $this->configureDates();
        $this->configureModels();
        $this->configureVite();
        $this->configureSecureUrl();
    }

    /**
     * Configure commands.
     */
    private function configureCommands(): void
    {
        DB::prohibitDestructiveCommands(
            $this->app->isProduction()
        );
    }

    /**
     * Configure dates.
     */
    private function configureDates(): void
    {
        Date::use(CarbonImmutable::class);
    }

    /**
     * Configure models.
     */
    private function configureModels(): void
    {
        Model::shouldBeStrict();
    }

    /**
     * Configure vite.
     */
    private function configureVite(): void
    {
        Vite::useAggressivePrefetching();
    }

    /**
     * Configure secure url.
     */
    private function configureSecureUrl(): void
    {
        if ($this->app->isProduction()) {
            URL::forceScheme('https');
        }
    }
}
