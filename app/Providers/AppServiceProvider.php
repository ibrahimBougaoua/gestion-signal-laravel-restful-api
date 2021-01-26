<?php

namespace App\Providers;

use App\Comments;
use App\Intervention;
use App\Membre;
use App\Observers\InterventionObserver;
use Illuminate\Support\ServiceProvider;
use App\Observers\SignalisationObserver;
use App\Observers\SignalerObserver;
use App\Observers\MembreObserver;
use App\Observers\CommentsObserver;
use App\Signalisation;
use App\Signaler;
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
        Signaler::observe(SignalerObserver::class);
        Membre::observe(MembreObserver::class);
        Comments::observe(CommentsObserver::class);
        Intervention::observe(InterventionObserver::class);

        Schema::defaultStringLength(191);
        //
    }
}
