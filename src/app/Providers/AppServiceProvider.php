<?php

namespace App\Providers;

use App\Models\Event;
use App\Models\Supplier;
use App\Observers\EventObserver;
use App\Observers\SupplierObserver;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
        Supplier::observe(SupplierObserver::class);
        Event::observe(EventObserver::class);
    }
}
