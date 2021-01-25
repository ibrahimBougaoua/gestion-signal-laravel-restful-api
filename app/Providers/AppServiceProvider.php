<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\SignalisationObserver;
use App\Signalisation;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Signalisation::observe(SignalisationObserver::class);
        Schema::defaultStringLength(191);
        //
    }
}
