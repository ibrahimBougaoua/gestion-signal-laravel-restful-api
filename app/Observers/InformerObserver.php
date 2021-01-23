<?php

namespace App\Observers;

use App\Informer;

class InformerObserver
{
    /**
     * Handle the informer "created" event.
     *
     * @param  \App\Informer  $informer
     * @return void
     */
    public function created(Informer $informer)
    {
        //
    }

    /**
     * Handle the informer "updated" event.
     *
     * @param  \App\Informer  $informer
     * @return void
     */
    public function updated(Informer $informer)
    {
        //
    }

    /**
     * Handle the informer "deleted" event.
     *
     * @param  \App\Informer  $informer
     * @return void
     */
    public function deleted(Informer $informer)
    {
        //
    }

    /**
     * Handle the informer "restored" event.
     *
     * @param  \App\Informer  $informer
     * @return void
     */
    public function restored(Informer $informer)
    {
        //
    }

    /**
     * Handle the informer "force deleted" event.
     *
     * @param  \App\Informer  $informer
     * @return void
     */
    public function forceDeleted(Informer $informer)
    {
        //
    }
}
