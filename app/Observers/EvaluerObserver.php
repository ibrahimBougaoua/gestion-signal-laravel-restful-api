<?php

namespace App\Observers;

use App\Evaluer;

class EvaluerObserver
{
    /**
     * Handle the evaluer "created" event.
     *
     * @param  \App\Evaluer  $evaluer
     * @return void
     */
    public function created(Evaluer $evaluer)
    {
        //
    }

    /**
     * Handle the evaluer "updated" event.
     *
     * @param  \App\Evaluer  $evaluer
     * @return void
     */
    public function updated(Evaluer $evaluer)
    {
        //
    }

    /**
     * Handle the evaluer "deleted" event.
     *
     * @param  \App\Evaluer  $evaluer
     * @return void
     */
    public function deleted(Evaluer $evaluer)
    {
        //
    }

    /**
     * Handle the evaluer "restored" event.
     *
     * @param  \App\Evaluer  $evaluer
     * @return void
     */
    public function restored(Evaluer $evaluer)
    {
        //
    }

    /**
     * Handle the evaluer "force deleted" event.
     *
     * @param  \App\Evaluer  $evaluer
     * @return void
     */
    public function forceDeleted(Evaluer $evaluer)
    {
        //
    }
}
