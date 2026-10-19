<?php

namespace App\Providers;

use App\Models\Application;
use App\Observers\ApplicationObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use App\Filament\Widgets\StatsOverview;
use App\Filament\Widgets\ApplicationStatusChart;
use Filament\Panel;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Pemicu otomatis untuk notifikasi email saat status lamaran diubah
        Application::observe(ApplicationObserver::class);
        Schema::defaultStringLength(191);
    }

    public function panel(Panel $panel): Panel
{
    return $panel
        // ... konfigurasi lain ...
        ->widgets([
            StatsOverview::class,
            ApplicationStatusChart::class,
        ]);
}
}
