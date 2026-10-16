<?php

namespace App\Providers;

use App\Models\Application;
use App\Observers\ApplicationObserver;
use Illuminate\Support\ServiceProvider;

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
    }
}
